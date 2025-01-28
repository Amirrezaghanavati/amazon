@extends('admin.layouts.app')
@section('title', 'دسته بندی ها')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><i class="fa fa-home text-muted"></i><a
                        href="{{ route('admin.') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> دسته بندی</li>
        </ol>
    </nav>


    <section class="main-body-container">
        <section class="main-body-container-header"><h4>دسته بندی ها</h4></section>
        <section class="body-content d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
            <a href="{{ route('admin.market.product-categories.create') }}"
               class="btn btn-info  border rounded-lg  btn-hover color-8">ایجاد دسته بندی</a>
            <div class="max-width-16-rem">
                <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
            </div>
        </section>

        <section class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>نام دسته بندی</th>
                    <th>اسلاگ</th>
                    <th>دسته والد</th>
                    <th>وضعیت</th>
                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $category)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td @class(['text-secondary' => !$category->parent_id])>{{ $category->parent_id ? $category->parent->name : 'دسته اصلی' }}</td>
                        <td class="{{ $category->status->getColor() }}">{{ $category->status->getLabel() }}</td>


                        <td class="width-16-rem text-center">
                            <a href="{{ route('admin.market.product-categories.edit', $category) }}"
                               class="btn btn-primary btn-sm border rounded-lg  btn-hover color-9"><i
                                        class="fa fa-pen"></i></a>
                            <form class="d-inline"
                                  action="{{ route('admin.market.product-categories.destroy', $category->id) }}"
                                  method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                        class="btn btn-danger btn-sm delete border rounded-lg  btn-hover color-11">
                                    <i class="fa fa-times rounded-lg"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty @endforelse
                </tbody>
            </table>
        </section>
    </section>
@endsection
@section('script')

    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])

@endsection
