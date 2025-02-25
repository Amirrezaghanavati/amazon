<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\ApplyDiscountRequest;
use App\Models\Market\Cart;
use App\Models\Market\Coupon;
use App\Models\Market\Delivery;
use Illuminate\Http\RedirectResponse;

class CheckOutController extends Controller
{


    public function show(Cart $cart)
    {
        $cart->load('cartItems.product')->loadCount('cartItems');
        $deliveries = Delivery::all();
        return view('app.checkout', compact('cart', 'deliveries'));
    }

    public function applyDiscount(ApplyDiscountRequest $request): RedirectResponse
    {
        $cart = auth()->user()->carts()->where('status', 0)->first();
        if (!$cart) {
            return back()->with('error', 'سبد خرید یافت نشد');
        }

        $coupon = Coupon::query()->where('code', $request->code)->first();

        if (!$coupon) {
            return back()->with('error', 'کد تخفیف یافت نشد');
        }

        $discountAmount = $coupon->amount_type == 0
            ? min($cart->total_price * $coupon->amount / 100, $coupon->discount_ceiling)
            : min($coupon->amount, $cart->total_price);


        $cart->update(['coupon_id' => $coupon->id, 'total_off_price' => $discountAmount, 'discount_status' => 1]);
        return back()->with('success', 'کد تخفیف با موفقیت اعمال شد');

    }
}
