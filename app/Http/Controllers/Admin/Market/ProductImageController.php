<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\StoreProductImageRequest;
use App\Models\Market\Product;
use App\Models\Market\ProductImage;
use App\Services\ImageUploadService;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        return view('admin.market.product.product-image.index', compact('product'));
    }

    public function store(StoreProductImageRequest $request, Product $product, ImageUploadService $imageUploadService): RedirectResponse
    {
        $inputs = $request->validated();

        if ($request->hasFile('image')) {
            $inputs['image'] = app(ImageUploadService::class)->upload($request);
        }

        $product->productImages()->create($inputs);
        return to_route('admin.market.product-images.index', $product)->with('swal-success', 'تصویر محصول با موفقیت حذف شد');
    }


    public function destroy(Product $product, ProductImage $productImage): RedirectResponse
    {
        $productImage->delete();
        return to_route('admin.market.product-images.index', $product)->with('swal-success', 'تصویر محصول با موفقیت حذف شد');
    }
}
