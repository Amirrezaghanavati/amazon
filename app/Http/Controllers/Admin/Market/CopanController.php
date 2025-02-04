<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\Market\Coupon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CopanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.market.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.market.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCouponRequest $request): RedirectResponse
    {
        $inputs = $request->validated();
        $inputs['start_date'] = str($inputs['start_date'])->take(10)->value();
        $inputs['end_date'] = str($inputs['end_date'])->take(10)->value();

        Coupon::create($inputs);
        return to_route('admin.market.coupons.index')->with('swal-success', 'کوپن تخفیف با موفقیت ساخته شد');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        return view('admin.market.coupon.edit', compact('coupon'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCouponRequest $request, Coupon $coupon): RedirectResponse
    {
        $inputs = $request->validated();
        $inputs['start_date'] = str($inputs['start_date'])->take(10)->value();
        $inputs['end_date'] = str($inputs['end_date'])->take(10)->value();

        $coupon->update($inputs);
        return to_route('admin.market.coupons.index')->with('swal-success', 'کوپن تخفیف با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon): RedirectResponse
    {
        $coupon->delete();
        return to_route('admin.market.coupons.index')->with('swal-success', 'کوپن با موفقیت حذف شد');

    }
}
