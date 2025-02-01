<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting\Setting;
use App\Services\ImageUploadService;

class WebSettingController extends Controller
{
    public function index()
    {
        $setting = Setting::query()->firstOrFail();
        return view('admin.setting.web-setting.index', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function set(Setting $setting)
    {
        return view('admin.setting.web-setting.set', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingRequest $request, Setting $setting, ImageUploadService $imageUploadService): \Illuminate\Http\RedirectResponse
    {
        $inputs = $request->validated();

        if ($request->hasFile('logo')) {
            $inputs['logo'] = $imageUploadService->upload($request, 'logo', $setting);
        }

        if ($request->hasFile('icon')) {
            $inputs['icon'] = $imageUploadService->upload($request, 'icon', $setting);
        }

        $setting->update($inputs);
        return to_route('admin.setting.web-setting.index')->with('swal-success', 'تنظیمات با موفقیت ویرایش شد');

    }


}
