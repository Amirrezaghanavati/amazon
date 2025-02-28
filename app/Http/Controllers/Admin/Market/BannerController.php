<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\StoreBannerRequest;
use App\Http\Requests\Admin\Market\UpdateBannerRequest;
use App\Http\Requests\Admin\Market\UpdateProductRequest;
use App\Models\Market\Banner;
use App\Services\ImageUploadService;
use Illuminate\Http\RedirectResponse;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.market.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.market.banner.create');
    }

    public function store(StoreBannerRequest $request, ImageUploadService $imageUploadService): RedirectResponse
    {
        $inputs = $request->validated();


        if ($request->hasFile('image')) {
            $inputs['image'] = $imageUploadService->upload($request);
        }
        Banner::query()->create($inputs);
        return to_route('admin.market.banners.index')->with('swal-success', 'بنر با موفقیت ساخته شد');
    }


    public function edit(Banner $banner)
    {
        return view('admin.market.banner.edit', compact('banner'));

    }

    public function update(UpdateBannerRequest $request, Banner $banner, ImageUploadService $imageUploadService): RedirectResponse
    {
        $inputs = $request->validated();

        if ($request->hasFile('image')) {
            $inputs['image'] = $imageUploadService->upload($request);
        }
        $banner->update($inputs);
        return to_route('admin.market.banners.index')->with('swal-success', 'بنر با موفقیت ویرایش شد');
    }

    public function destroy(Banner $banner): RedirectResponse
    {
        $banner->delete();
        return to_route('admin.market.banners.index')->with('swal-success', 'بنر با موفقیت حذف شد');

    }
}
