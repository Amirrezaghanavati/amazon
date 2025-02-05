<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\StoreDeliveryRequest;
use App\Http\Requests\Admin\Market\UpdateDeliveryRequest;
use App\Models\Market\Delivery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveryMethods = Delivery::all();
        return view('admin.market.delivery.index', compact('deliveryMethods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.market.delivery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeliveryRequest $request): RedirectResponse
    {
        Delivery::create($request->validated());
        return to_route('admin.market.deliveries.index')->with('swal-success', 'روش ارسال با موفقیت ساخته شد');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delivery $delivery)
    {
        return view('admin.market.delivery.edit', compact('delivery'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeliveryRequest $request, Delivery $delivery): RedirectResponse
    {
        $delivery->update($request->validated());
        return to_route('admin.market.deliveries.index')->with('swal-success', 'روش ارسال با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery $delivery): RedirectResponse
    {
        $delivery->delete();
        return to_route('admin.market.deliveries.index')->with('swal-success', 'روش ارسال با موفقیت حذف شد');

    }
}
