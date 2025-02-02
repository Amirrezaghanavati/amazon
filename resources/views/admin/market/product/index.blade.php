@extends('admin.layouts.app')
@section('title', 'برند ها')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12">
                <i class="fa fa-home text-muted"></i><a href="{{ route('admin.') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> کالا ها</li>
        </ol>
    </nav>

    <section class="main-body-container">
        <section class="main-body-container-header"><h4>کالا ها</h4></section>
        <section class="body-content d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
            <a href="{{ route('admin.market.products.create') }}" class="btn btn-info  border rounded-lg  btn-hover color-8">ایجاد
                کالای جدید</a>
            <div class="max-width-16-rem">
                <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
            </div>
        </section>

        <section class="table-responsive">
            <table class="table table-striped table-hover h-150">
                <thead>
                <tr>
                    <th>#</th>
                    <th> نام کالا</th>
                    <th>تصویر کالا</th>
                    <th>قیمت</th>
                    <th>برند</th>
                    <th>دسته</th>
                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @forelse($products as $product)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td class="shadow-sm text-center">
                            <img src="{{ asset($product->image) }}" alt="عکس" width="90" height="70" class="border rounded">
                        </td>
                        <td>{{ number_format($product->price) }} تومان</td>
                        <td>{{ $product->brand->persian_name }}</td>
                        <td>{{ $product->productCategory->name }}</td>
                        <td class="width-16-rem text-center">
                            <a href="{{ route('admin.market.products.show', $product) }}"
                               class="btn btn-info btn-sm border rounded-lg btn-hover color-10"><i
                                    class="fa fa-eye"></i></a>
                            <a href="{{ route('admin.market.products.edit', $product) }}"
                               class="btn btn-primary btn-sm border rounded-lg  btn-hover color-9"><i
                                    class="fa fa-pen"></i></a>
                            <form class="d-inline"
                                  action="{{ route('admin.market.products.destroy', $product->id) }}"
                                  method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                        class="btn btn-danger btn-sm delete border rounded-lg  btn-hover color-11">
                                    <i class="fa fa-times rounded-lg"></i>
                                </button>
                            </form>
                        </td>

                @empty @endforelse

                </tbody>
            </table>
        </section>
    </section>
@endsection
@section('scripts')
    @parent
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
