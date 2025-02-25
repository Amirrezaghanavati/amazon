<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\OrderCompleteRequest;
use App\Models\Market\Cart;
use App\Models\Market\Delivery;
use App\Models\Market\OrderItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function orderComplete(OrderCompleteRequest $request, Cart $cart): RedirectResponse
    {
        $delivery = Delivery::findOrFail($request->delivery_id);
        DB::transaction(static function () use ($cart, $request, $delivery){

            $order = auth()->user()->orders()->create([
                'cart_id' => $cart->id,
                'delivery_id' => $delivery->id,
                'delivery_amount' => $delivery->amount,
                'coupon_id' => $cart->coupon_id ?? null,
                'order_final_amount' => $cart->total_price - $cart->total_off_price,
                'order_discount_amount' => $cart->total_off_price,
                'order_total_discount_amount' => $cart->total_off_price,
            ]);

            $cart->cartItems()->each(function ($item) use ($order){
               $order->orderItems()->create([
                  'product_id' => $item->product_id,
                  'product_object' => json_encode($item->product, JSON_THROW_ON_ERROR),
                  'quantity' => $item->quantity,
                  'price' => $item->product->price,
                  'total_price' => $item->total_price,
               ]);
            });

            $cart->update(['status' => 1]);

            return to_route('index')->with('swal-success', 'سفارش با موفقیت ذخیره شد');
        });

        return to_route('index')->with('swal-success', 'سفارش با موفقیت ذخیره شد');

    }
}
