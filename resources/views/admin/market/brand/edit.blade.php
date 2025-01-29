@extends('admin.layouts.app')
@section('title', 'ویرایش برند ها')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><i class="fa fa-home text-muted"></i><a
                    href="{{ route('admin.') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="{{ route('admin.market.brands.index') }}">برند</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش برند</li>
        </ol>
    </nav>
    <section class="main-body-container">
        <section class="main-body-container-header"><h4>ویرایش برند</h4></section>
        <section class="body-content d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
            <a href="{{ route('admin.market.brands.index') }}"
               class="btn btn-info  border rounded-lg  btn-hover color-8">« بازگشت</a>
        </section>
        <section>
            <form action="{{ route('admin.market.brands.update', $brand) }}" method="post" enctype="multipart/form-data" id="form">
                @csrf
                @method('PUT')
                <section class="row">
                    <section class="col-6 col-md-4">
                        <div class="form-group">
                            <label for="english_name" class="font-weight-bold">نام لاتین برند</label>
                            @error('english_name')
                            <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                            @enderror
                            <input type="text"
                                   class="form-control form-control-sm @error('english_name') border border-danger @enderror"
                                   name="english_name" id="english_name"
                                   value="{{ old('english_name', $brand->english_name) }}">
                        </div>
                    </section>

                    <section class="col-6 col-md-4">
                        <div class="form-group">
                            <label for="persian_name" class="font-weight-bold">نام فارسی برند</label>
                            @error('persian_name')
                            <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                            @enderror
                            <input type="text"
                                   class="form-control form-control-sm @error('persian_name') border border-danger @enderror"
                                   name="persian_name" id="persian_name"
                                   value="{{ old('persian_name', $brand->persian_name) }}">
                        </div>
                    </section>


                    <section class="col-6 col-md-4">
                        <div class="form-group">
                            <label for="logo" class="font-weight-bold">لوگو</label>
                            @error('logo')
                            <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                            @enderror
                            <input type="file"
                                   class="form-control form-control-sm @error('logo') border border-danger @enderror"
                                   name="logo" id="logo">
                            <label for="logo" class="mt-1 form-check-label mx-2 font-weight-bold">
                                <img src="{{ asset($brand->logo)}}" class="w-50 rounded " alt="عکس">
                            </label>
                        </div>
                    </section>




                    <section class="col-12 col-md-6">
                        <button class="btn btn-primary border rounded-lg  btn-hover color-9">ویرایش</button>
                    </section>


                </section>
            </form>
        </section>
    </section>
@endsection
