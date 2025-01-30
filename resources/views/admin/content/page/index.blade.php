@extends('admin.layouts.app')
@section('title', 'صفحه ساز')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><i class="fa fa-home text-muted"></i><a
                    href="{{ route('admin.') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> پیج ساز</li>
        </ol>
    </nav>

    <section class="main-body-container">
        <section class="main-body-container-header"><h4>پیج ساز</h4></section>
        <section class="body-content d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
            <a href="{{ route('admin.content.pages.create') }}"
               class="btn btn-info  border rounded-pill  btn-hover color-8">ایجاد پیج جدید</a>
            <div class="max-width-16-rem">
                <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
            </div>
        </section>

        <section class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>عنوان</th>
                    <th>اسلاگ</th>
                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @forelse($pages as $page)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->slug }}</td>
                        <td class="width-16-rem text-center">
                            <a href="{{ route('admin.content.pages.edit', $page) }}"
                               class="btn btn-primary btn-sm border rounded-lg  btn-hover color-9"><i
                                    class="fa fa-pen font-size-12"></i>
                            </a>
                            <form action="{{ route('admin.content.pages.destroy', $page->id) }}" class="d-inline"
                                  method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-danger btn-sm  delete border rounded-lg  btn-hover color-11"><i
                                        class="fa fa-times"></i>
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
@section('scripts')
    @parent
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
