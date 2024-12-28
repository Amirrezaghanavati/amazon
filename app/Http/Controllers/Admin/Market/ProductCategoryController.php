<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\StoreProductCategory;
use App\Http\Requests\Admin\Market\StoreProductCategoryRequest;
use App\Http\Requests\Admin\Market\UpdateProductCategoryRequest;
use App\Models\Market\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{

    public function index()
    {
        $categories = ProductCategory::all();
        return view('admin.market.product-category.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.market.product-category.create');
    }

    public function store(StoreProductCategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        ProductCategory::query()->create($request->validated());
        return to_route('admin.market.product-categories.index')->with('swal-success', 'دسته بندی با موفقیت ساخته شد');
    }

    public function edit(ProductCategory $productCategory)
    {
        return view('admin.market.product-category.edit', compact('productCategory'));
    }

    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory): \Illuminate\Http\RedirectResponse
    {
        $productCategory->update($request->validated());
        return to_route('admin.market.product-categories.index')->with('swal-success', 'دسته بندی با موفقیت ویرایش شد');
    }

    public function destroy(ProductCategory $productCategory): \Illuminate\Http\RedirectResponse
    {
        $productCategory->delete();
        return to_route('admin.market.product-categories.index')->with('swal-success', 'دسته بندی با موفقیت حذف شد');

    }
}
