<?php

namespace App\Http\Controllers\Home\Customer;

use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $status = request()->query('status');
        if ($status) {
            $orders = auth()->user()->orders()->orderStatus($status)->with('orderItems')->get() ;
        } else {
            $orders = auth()->user()->orders()->with('orderItems')->get();
        }
        return view('app.profile.my-orders', compact('orders'));
    }

}
