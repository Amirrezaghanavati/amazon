<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\StoreBrandRequest;
use App\Http\Requests\Admin\Market\UpdateBrandRequest;
use App\Models\Market\Brand;
use App\Services\ImageUploadService;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::paginate(5);
        return view('admin.market.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.market.brand.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request, ImageUploadService $imageUploadService): \Illuminate\Http\RedirectResponse
    {
        $inputs = $request->validated();


        if ($request->hasFile('logo')) {
            $inputs['logo'] = app(ImageUploadService::class)->upload($request, 'logo');
        }
        Brand::query()->create($inputs);
        return to_route('admin.market.brands.index')->with('swal-success', 'برند با موفقیت ساخته شد');
    }


    public function edit(Brand $brand)
    {
        return view('admin.market.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, ImageUploadService $imageUploadService, Brand $brand)
    {
        $inputs = $request->validated();

        if ($request->hasFile('logo')) {
            $inputs['logo'] = app(ImageUploadService::class)->upload(request: $request, attribute: 'logo', record:$brand);
        }

        $brand->update($inputs);
        return to_route('admin.market.brands.index')->with('swal-success', 'برند با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return to_route('admin.market.brands.index')->with('swal-success', 'برند با موفقیت حذف شد');

    }
}
