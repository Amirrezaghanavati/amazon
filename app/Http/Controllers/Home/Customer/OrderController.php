<?php

namespace App\Http\Controllers\Home\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class OrderController extends Controller
{
    public function index()
    {
        // user orders, `orderItems` eager loaded by default in User model
        $query = auth()->user()->orders();

        $orders = request()->status
            ? $query->where('order_status', request()->status)->get()
            : $query->get();

        return view('app.profile.my-orders', compact('orders'));
    }

}
