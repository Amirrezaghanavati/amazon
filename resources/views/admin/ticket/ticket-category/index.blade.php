@extends('admin.layouts.app')
@section('title', 'دسته بندی تیکت')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="{{ route('admin.') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="#">بخش تیکت ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> دسته بندی</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>دسته بندی</h4>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.ticket.ticket-categories.create') }}"
                       class="btn btn-info btn-hover color-8 rounded-pill">ایجاد دسته بندی</a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام دسته بندی</th>
                            <th>وضعیت</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($ticketCategories as $key => $ticketCategory)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $ticketCategory->name }}</td>
                                <td>
                                    {{ $ticketCategory->status ? 'فعال' : 'غیرفعال' }}
                                </td>
                                <td class="width-16-rem text-center">
                                    <a href="{{ route('admin.ticket.ticket-categories.edit', $ticketCategory) }}"
                                       class="btn btn-primary btn-sm btn-hover border rounded-pill  color-9"><i
                                            class="fa fa-pen font-size-12"></i> </a>
                                    <form class="d-inline"
                                          action="{{ route('admin.ticket.ticket-categories.destroy', $ticketCategory) }}"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm delete btn-hover rounded-pill border color-11"
                                                type="submit">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty @endforelse
                        </tbody>
                    </table>
                </section>

            </section>
        </section>
    </section>
@endsection
@section('scripts')
    @parent
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
