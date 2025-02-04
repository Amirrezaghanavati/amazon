@extends('admin.layouts.app')
@section('title', 'تصاویر کالا')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12">
                <i class="fa fa-home text-muted"></i><a href="{{ route('admin.') }}">خانه</a>
            </li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="{{ route('admin.market.products.index') }}">کالا
                    ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> تصاویر کالا</li>
        </ol>
    </nav>

    <section class="main-body-container">
        <section class="main-body-container-header">
            <h4>تصاویر کالا: {{ $product->name }}</h4>
        </section>
        <section class="body-content d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
            <div class="max-width-16-rem">
                <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
            </div>
        </section>
        <form action="{{ route('admin.market.product-images.store', $product) }}" method="post"
              enctype="multipart/form-data" id="form">
            @csrf
            <section class="row">
                <section class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="image" class="font-weight-bold">تصویر</label>
                        @error('image')
                        <span class="alert_required text-danger" role="alert">
                                <small>
                                    <b>{{ $message }}</b>
                                </small>
                            </span>
                        @enderror
                        <input type="file"
                               class="form-control form-control-sm @error('image') border border-danger @enderror"
                               name="image" id="image">
                    </div>
                </section>
                <section class="py-4">
                    <button class="btn btn-primary border rounded-lg  btn-hover color-9">ثبت</button>
                </section>
            </section>
        </form>

        <section class="table-responsive">
            <table class="table table-striped table-hover h-150">
                <thead>
                <tr>
                    <th>#</th>
                    <th>نام کالا</th>
                    <th>تصویر کالا</th>
                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @if ($product->productImages->isNotEmpty())
                    @forelse ($product->productImages as $productImage)
                        <tr class="">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td><img src="{{ asset($productImage->image) }}" alt="عکس" width="80" height=70"
                                     class="border rounded shadow-sm"></td>

                            <td class="width-8-rem text-center">
                                <form class="d-inline"
                                      action="{{ route('admin.market.product-images.destroy', ['product' => $product, 'productImage' => $productImage]) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-danger delete border rounded-lg  btn-hover color-11"><i
                                                class="fa fa-times rounded-lg"></i>حذف
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty @endforelse
                @endif

                </tbody>
            </table>
        </section>
    </section>
@endsection
@section('scripts')
    @parent
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
