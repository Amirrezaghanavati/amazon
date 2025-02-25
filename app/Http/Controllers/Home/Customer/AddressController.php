<?php

namespace App\Http\Controllers\Home\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\Profile\StoreAddressRequest;
use App\Http\Requests\Home\Profile\UpdateAddressRequest;
use App\Models\User\Address;
use App\Models\User\City;
use Illuminate\Http\RedirectResponse;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::all();
        return view('app.profile.my-address.index', compact('addresses'));
    }

    public function create()
    {
        $cities = City::all();
        return view('app.profile.my-address.create', compact('cities'));
    }

    public function store(StoreAddressRequest $request): RedirectResponse
    {
        Address::query()->create($request->validated() + ['user_id' => auth()->id()]);
        return to_route('profile.my-address.index')->with('swal-success', 'آدرس با موفقیت اضافه شد');
    }

    public function edit(Address $myAddress)
    {
        $cities = City::all();
        return view('app.profile.my-address.edit', compact('cities', 'myAddress'));
    }

    public function update(UpdateAddressRequest $request, Address $myAddress): RedirectResponse
    {
        $myAddress->update($request->validated());
        return to_route('profile.my-address.index')->with('swal-success', 'آدرس با موفقیت ویرایش شد');
    }

    public function destroy(Address $myAddress): RedirectResponse
    {
        $myAddress->delete();
        return to_route('profile.my-address.index')->with('swal-success', 'آدرس با موفقیت حذف شد');

    }

}
