@extends('admin.layouts.app')
@section('title', 'برند ها')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><i class="fa fa-home text-muted"></i><a
                        href="{{ route('admin.') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">برند</li>
        </ol>
    </nav>


    <section class="main-body-container">
        <section class="main-body-container-header"><h4>برند ها</h4></section>
        <section class="body-content d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
            <a href="{{ route('admin.market.brands.create') }}"
               class="btn btn-info  border rounded-lg  btn-hover color-8">ایجاد برند</a>
            <div class="max-width-16-rem">
                <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
            </div>
        </section>

        <section class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>نام لاتین برند</th>
                    <th>نام برند</th>
                    <th>اسلاگ</th>
                    <th>لوگو</th>
                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @forelse($brands as $brand)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $brand->english_name }}</td>
                        <td>{{ $brand->persian_name }}</td>
                        <td>{{ $brand->slug }}</td>
                        <td class="shadow-sm text-center">
                            <img src="{{ asset($brand->logo) }}" alt="عکس" width="70" height="50" class="border rounded">
                        </td>


                        <td class="width-16-rem text-center">
                            <a href="{{ route('admin.market.brands.edit', $brand) }}"
                               class="btn btn-primary btn-sm border rounded-lg  btn-hover color-9"><i
                                        class="fa fa-pen"></i></a>
                            <form class="d-inline"
                                  action="{{ route('admin.market.brands.destroy', $brand->id) }}"
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
            {{ $brands->links() }}
        </section>
    </section>
@endsection
@section('script')

    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])

@endsection
