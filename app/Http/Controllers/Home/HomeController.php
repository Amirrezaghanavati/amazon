<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\StoreCommentRequest;
use App\Models\Market\Banner;
use App\Models\Market\Brand;
use App\Models\Market\Product;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    public function index()
    {
        $slideShow = Banner::query()->slideShow()->get();
        $topLeftBanner = Banner::query()->topLeftBanner()->first();
        $bottomLeftBanner = Banner::query()->BottomLeftBanner()->first();
        $middleBanners = Banner::query()->middleBanner()->take(2)->get();
        $footerBanner = Banner::query()->footerBanner()->first();
        $brands = Brand::all();
        $mostViewedProducts = Product::where('marketable', 1)->orderByDesc('view_count')->take(8)->get();
        $popularProducts = Product::where('marketable', 1)->inRandomOrder()->take(8)->get();
        return view('app.index', compact('slideShow', 'topLeftBanner', 'bottomLeftBanner', 'middleBanners', 'footerBanner', 'brands', 'mostViewedProducts', 'popularProducts'));
    }

    public function product(Product $product)
    {
        $product->increment('view_count');
        $product->load(['productImages', 'comments']);

        $comments = $product->comments
            ->where('status', 2);

        $relatedProducts =
            Product::query()
                ->where('marketable', 1)
                ->where('brand_id', $product->brand_id)
                ->whereNot('id', $product->id)
                ->inRandomOrder()
                ->take(4)
                ->get();


        return view('app.product', compact('product', 'relatedProducts', 'comments'));
    }

    public function addComment(StoreCommentRequest $request, Product $product): RedirectResponse
    {
        $inputs = $request->validated();
        auth()->user()->comments()->create($inputs + ['commentable_id' => $product->id, 'commentable_type' => Product::class]);
        return back()->with('swal-success', 'نظر شما با موفقیت ثبت شد');
    }
}
