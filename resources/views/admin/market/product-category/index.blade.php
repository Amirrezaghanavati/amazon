@extends('admin.layouts.app')

@section('title', 'دسته بندی محصولات')

@section('content')

    <section class="main-body-container">
        <section class="main-body-container-header d-flex justify-content-between align-items-center">
            <div>
                <h5>
                    دسته بندی محصولات
                </h5>
                <p>
                    در این بخش اطلاعاتی در مورد دسته بندی به شما داده می شود
                </p>
            </div>
            <div>
                <a href="{{ route('admin.market.product-categories.create') }}" class="btn btn-success">ساخت</a>
            </div>
        </section>
        <section class="body-content">

            <table class="table">
                <thead class="table-info">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">نام</th>
                    <th scope="col">اسلاگ</th>
                    <th scope="col">وضعیت</th>
                    <th scope="col">تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $category)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            @if ($category->status)
                                <span>فعال</span>
                            @else
                                <span>غیر فعال</span>
                            @endif

                        </td>
                        <td>
                            <div class="d-flex">
                                <div class="mx-2">
                                    <a href="http://localhost/php-shop/admin/market/product-category/delete/10"
                                       class="text-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                                <div class="mx-2">
                                    <a href="http://localhost/php-shop/admin/market/product-category/edit/10"
                                       class="text-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty

                @endforelse


                </tbody>
            </table>

        </section>
    </section>

@endsection
