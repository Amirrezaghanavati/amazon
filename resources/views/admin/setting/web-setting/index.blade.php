@extends('admin.layouts.app')
@section('title' , 'تنظیمات')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="{{ route('admin.') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="">بخش تنظیمات</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> تنظیمات</li>
        </ol>
    </nav>

    <section class="main-body-container">
        <section class="main-body-container-header"><h4>تنظیمات</h4></section>
        <section class="body-content d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
            <a href="#" class="btn btn-info disabled rounded-pill btn-hover color-8">ایجاد
                تنظیمات</a>
            <div class="max-width-16-rem">
                <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
            </div>
        </section>

        <section class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>عنوان سایت</th>
                    <th>توضیحات سایت</th>
                    <th>کلمات کلیدی</th>
                    <th>لوگو</th>
                    <th>آیکون</th>
                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>1</th>
                    <td>{{ str()->limit($setting->title, 10) }}</td>
                    <td>{{ str()->limit($setting->description, 30) }}</td>
                    <td>{{ $setting->keywords }}</td>
                    <td class="shadow-sm text-center">
                        <img src="{{ asset($setting->logo) }}" alt="عکس" width="70" height="50" class="border ">
                    </td>
                    <td class="shadow-sm text-center">
                        <img src="{{ asset($setting->icon) }}" alt="عکس" width="70" height="50" class="border rounded">
                    </td>
                    <td class="width-16-rem text-center">
                        <a href="{{ route('admin.setting.web-setting.set', $setting) }}"
                           class="btn btn-primary btn-sm rounded-lg btn-hover color-9"><i
                                    class="fa fa-pen font-size-12"></i> </a>
                        <button type="submit" class="btn btn-danger btn-sm disabled rounded-lg btn-hover color-11"><i
                                    class="fa fa-times"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </section>
    </section>

@endsection
