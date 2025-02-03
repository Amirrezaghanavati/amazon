@extends('admin.layouts.app')
@section('title', 'نمایش کالا')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12">
                <i class="fa fa-home text-muted"></i><a href="{{ route('admin.') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="{{ route('admin.market.products.index') }}">کالا</a>
            </li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> نمایش کالا</li>
        </ol>
    </nav>
    <section class="main-body-container">
        <section class="main-body-container-header"><h3 class="font-weight-bold">نمایش کالا: {{ $product->name }}</h3>
        </section>
        <section class="body-content d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
            <a href="{{ route('admin.market.products.index') }}"
               class="btn btn-info  border rounded-lg  btn-hover color-8">« بازگشت</a>
        </section>
        <section>
            <section class="row">
                <section class="col-12 col-md-6 mb-4">
                    <div class="border rounded p-3 bg-light">
                        <section class="row">
                            <section class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">نام کالا:</label>
                                    <p class="form-control-static border-bottom pb-2">{{ $product->name }}</p>
                                </div>
                            </section>
                            <section class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">نامک:</label>
                                    <p class="form-control-static border-bottom pb-2">{{ $product->slug }}</p>
                                </div>
                            </section>
                            <section class="col-12">
                                <div class="form-group mt-3">
                                    <label class="font-weight-bold">توضیحات کالا:</label>
                                    <div class="border rounded p-3 bg-white">
                                        {!! $product->description !!}
                                    </div>
                                </div>
                            </section>
                        </section>
                    </div>
                </section>

                <section class="col-12 col-md-6 mb-4">
                    <div class="border rounded p-3 bg-light">
                        <section class="row">
                            <section class="col-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">برند کالا:</label>
                                    <p class="form-control-static border-bottom pb-2">{{ $product->brand->persian_name }}</p>
                                </div>
                            </section>
                            <section class="col-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">دسته بندی:</label>
                                    <p class="form-control-static border-bottom pb-2">{{ $product->productCategory->name }}</p>
                                </div>
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">تگ ها:</label>
                                    <p class="form-control-static border-bottom pb-2">{{ $product->tags }}</p>
                                </div>
                            </section>

                        </section>
                    </div>
                </section>

                <section class="col-12 col-md-6 mb-4">
                    <div class="border rounded p-3 bg-light">
                        <section class="row">
                            <section class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">قیمت کالا:</label>
                                    <p class="form-control-static border-bottom pb-2">{{ $product->price }}</p>
                                </div>
                            </section>
                            <section class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">موجودی کالا:</label>
                                    <p class="form-control-static border-bottom pb-2">{{ $product->marketable_number }}</p>
                                </div>
                            </section>
                            <section class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bold">تعداد کالای فروخته شده:</label>
                                    <p class="form-control-static border-bottom pb-2">{{ $product->sold_number }}</p>
                                </div>
                            </section>

                        </section>
                    </div>
                </section>

                <section class="col-12 col-md-6 mb-4">
                    <div class="border rounded p-3 bg-light">
                        <section class="row">
                            <section class="col-md-3">
                                <div class="form-group">
                                    <label class="font-weight-bold">وزن کالا:</label>
                                    <p class="form-control-static border-bottom pb-2">{{ $product->weight ?? 'ندارد' }}</p>
                                </div>
                            </section>
                            <section class="col-md-3">
                                <div class="form-group">
                                    <label class="font-weight-bold">ارتفاع کالا:</label>
                                    <p class="form-control-static border-bottom pb-2">{{ $product->height ?? 'ندارد' }}</p>
                                </div>
                            </section>
                            <section class="col-md-3">
                                <div class="form-group">
                                    <label class="font-weight-bold">عرض کالا:</label>
                                    <p class="form-control-static border-bottom pb-2">{{ $product->width ?? 'ندارد' }}</p>
                                </div>
                            </section>
                            <section class="col-md-3">
                                <div class="form-group">
                                    <label class="font-weight-bold">طول کالا:</label>
                                    <p class="form-control-static border-bottom pb-2">{{ $product->length ?? 'ندارد' }}</p>
                                </div>
                            </section>

                        </section>
                    </div>
                </section>

                <section class="col-12 col-md-6 mb-4">
                    <div class="border rounded p-3 bg-light">
                        <section class="row">
                            <section class="col-12">
                                <div class="form-group">
                                    <h3 class="font-weight-bold border-bottom pb-2">وضعیت</h3>
                                </div>
                            </section>
                            <section class="col-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">وضعیت کالا:</label>
                                    <p class="form-control-static border-bottom pb-2">{{ $product->status ? 'فعال' : 'غیرفعال' }}</p>
                                </div>
                            </section>
                            <section class="col-12">
                                <div class="form-group">
                                    <label class="font-weight-bold">قابل فروش:</label>
                                    <p class="form-control-static border-bottom pb-2">{{ $product->marketable ? 'قابل فروش' : 'غیرقابل فروش' }}</p>
                                </div>
                            </section>

                        </section>
                    </div>
                </section>

                <section class="col-12 col-md-6 mb-4">
                    <div class="border rounded p-3 bg-light">
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">تصویر:</label>
                                    <div class="mt-2">
                                        <img src="{{ asset($product->image) }}" class="img-fluid rounded border"
                                             alt="تصویر محصول" style="max-height: 150px;">
                                    </div>
                                </div>
                            </section>
                        </section>
                    </div>
                </section>


            </section>
@endsection
