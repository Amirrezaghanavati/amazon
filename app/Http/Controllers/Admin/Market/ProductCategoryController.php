<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\StoreProductCategory;
use App\Http\Requests\Admin\Market\StoreProductCategoryRequest;
use App\Http\Requests\Admin\Market\UpdateProductCategoryRequest;
use App\Models\Market\ProductCategory;

class ProductCategoryController extends Controller
{

    public function index()
    {
        $categories = ProductCategory::all();
        return view('admin.market.product-category.index', compact('categories'));
    }


    public function create()
    {
        $parentCategories = ProductCategory::query()
            ->with('children')
            ->parent()
            ->get();
        return view('admin.market.product-category.create', compact('parentCategories'));
    }

    public function store(StoreProductCategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        ProductCategory::query()
            ->create($request->validated());
        return to_route('admin.market.product-categories.index')->with('swal-success', 'دسته بندی با موفقیت ساخته شد');
    }

    public function edit(ProductCategory $productCategory)
    {
        $parentCategories = ProductCategory::query()
            ->with('children')
            ->parent(true, $productCategory->id)
            ->get();

        return view('admin.market.product-category.edit', compact('productCategory', 'parentCategories'));
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
