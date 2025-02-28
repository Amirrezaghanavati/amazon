<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Market\Cart;
use App\Models\Market\CartItem;
use App\Models\Market\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function cart()
    {
        $cart = auth()->user()->carts()->where('status', 0)->withCount('cartItems')->with('cartItems.product')->first();

        return view('app.cart', compact('cart'));
    }

    public function decreaseItem(CartItem $cartItem): RedirectResponse
    {

        if ($cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
            $cartItem->update(['total_price' => $cartItem->quantity * $cartItem->product->price]);
        } else {
            $this->removeProduct($cartItem);
            return back();
        }

        $this->updateCartTotalPrice($cartItem->cart);
        return back();

    }

    private function updateCartTotalPrice($cart): void
    {
        $cart->update(['total_price' => $cart->cartItems()->sum('total_price')]);
    }

    public function addProduct(Product $product): RedirectResponse
    {
        $cart = Cart::firstOrCreate(
            [
                'user_id' => auth()->user()->id,
                'status'  => 0
            ],
            [
                'total_price'     => 0,
                'total_off_price' => 0,
                'expired_at'      => now()->addDays(7)
            ]);


        $cartItem = $cart->cartItems()->where('product_id', $product->id)->first();


        if ($cartItem) {
            if ($cartItem->quantity < $product->marketable_number) {
                $cartItem->increment('quantity');
                $cartItem->update(['total_price' => $cartItem->quantity * $product->price]);
            }
        } else {

            $cartItem = $product->cartItem()->create([
                'cart_id'     => $cart->id,
                'quantity'    => 1,
                'total_price' => $product->price
            ]);
        }


        $cart->update(['total_price' => $cart->cartItems()->sum('total_price')]);

        return back()->with('swal-success', 'محصول با موفقیت به سبد خرید اضافه شد');

    }

    public function removeProduct(CartItem $cartItem): RedirectResponse
    {
        DB::transaction(function () use ($cartItem) {
            $cartItem->delete();
            $this->updateCartTotalPrice($cartItem->cart);
        });

        return back()->with('swal-success', 'محصول با موفقیت حذف شد');

    }

}
