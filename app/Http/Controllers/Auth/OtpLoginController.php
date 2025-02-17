<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Random\RandomException;
use Str;

class OtpLoginController extends Controller
{
    protected $smsService;

    /**
     * @throws RandomException
     */
    public function sendOtp(Request $request)
    {

        $request->validate([
            'mobile' => 'required|regex:/^09[0-9]{9}$/',
        ]);

        $mobileNumber = $request->input('mobile');

        $user = User::firstOrCreate(['mobile' => $mobileNumber]);

        $user->otps()->delete();

//        Otp::where('user_id', $user->id)->delete();

        $otpCode = random_int(1000, 9999);
        $token = Str::random(32);

        $user->otps()->create([
            'token'    => $token,
            'otp_code' => $otpCode,
            'used'     => 0,
            'attempts' => 0,
        ]);


        try {
            $this->smsService->sendSmsOtp($mobileNumber, $otpCode);
            return to_route('otp.verify.form', compact('token'))->with('message', 'کد ارسال شد');
        } catch (\Exception $e) {
            return back()->with('error', 'خطا در ارسال کد' . $e->getMessage());
        }
    }

    public function showVerifyForm($token)
    {
        $otp = Otp::where('token', $token)->first();
        if (!$otp || $otp->used) {
            return to_route('login')->with('error', 'کد نامعتبر');
        }
        return view('auth.verify', compact('token'));
    }

    public function verifyOtp(Request $request)
    {

        $request->validate([
            'token' => ['required', '|exists:otps,token'],
            'otp'   => ['required', '|digits:4'],
        ]);


        $otp = Otp::where('token', $request->input('token'))->first();

        if (!$otp || $otp->used) {
            return to_route('login')->with('error', 'کد نامعتبر');
        }

        if ($otp->attempts >= 3) {
            return to_route('login')->with('error', 'تعداد تلاش های شما بیش از حد مجاز است');
        }

        if ($otp->otp_code != $request->input('otp')) {
            $otp->increment('attempts');
            return back()->with('error', 'کد وارد شده اشتباه است');
        }

        $otp->update(['used' => 1]);
        Auth::login($otp->user);

        return to_route('home');
    }
}
