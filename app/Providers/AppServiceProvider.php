<?php

namespace App\Providers;

use App\Models\Market\ProductCategory;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        Auth::loginUsingId(2);

        $productCategories = ProductCategory::all();
        $cart = Auth::check() ? auth()->user()->carts()
            ->where('status', 0)
            ->withCount('cartItems')
            ->with('cartItems.product')
            ->first() : [];
        $cartTotalPrice = $cart?->total_price ?? 0;


        View::share(compact('productCategories', 'cart', 'cartTotalPrice'));
    }
}
