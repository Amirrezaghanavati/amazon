<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\StoreProductRequest;
use App\Http\Requests\Admin\Market\UpdateBrandRequest;
use App\Http\Requests\Admin\Market\UpdateProductRequest;
use App\Models\Market\Brand;
use App\Models\Market\Product;
use App\Models\Market\ProductCategory;
use App\Services\ImageUploadService;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('brand', 'productCategory')->get();
        return view('admin.market.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = ProductCategory::all();
        $brands = Brand::all();
        return view('admin.market.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request, ImageUploadService $imageUploadService): RedirectResponse
    {
        $inputs = $request->validated();


        if ($request->hasFile('image')) {
            $inputs['image'] = app(ImageUploadService::class)->upload($request);
        }
        Product::query()->create($inputs);
        return to_route('admin.market.products.index')->with('swal-success', 'محصول با موفقیت ساخته شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        $brands = Brand::all();
        return view('admin.market.product.edit', compact('product', 'categories', 'brands'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product, ImageUploadService $imageUploadService): RedirectResponse
    {
        $inputs = $request->validated();


        if ($request->hasFile('image')) {
            $inputs['image'] = app(ImageUploadService::class)->upload($request, 'image', $product);
        }
        $product->update($inputs);
        return to_route('admin.market.products.index')->with('swal-success', 'محصول با موفقیت ساخته شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('admin.market.products.index')->with('swal-success', 'محصول با موفقیت حذف شد');
    }
}
