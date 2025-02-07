@extends('admin.layouts.app')
@section('title', 'تیکت ها')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="{{ route('admin.') }}"> خانه</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="{{ route('admin.ticket.tickets.index') }}"> بخش تیکت
                    ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> تیکت</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        تیکت
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="#" class="btn btn-info  disabled border rounded-pill  btn-hover color-8">ایجاد تیکت </a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>


                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>تیکت مرجع</th>
                            <th>عنوان تیکت</th>
                            <th>متن تیکت</th>
                            <th>نویسنده تیکت</th>
                            <th>دسته تیکت</th>
                            <th>پاسخ داده شده توسط</th>
                            <th>وضعیت</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($tickets as $ticket)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $ticket->parent->subject ?? 'تیکت اصلی' }}</td>
                                <td>{{ $ticket->subject }}</td>
                                <td>{{ str()->limit($ticket->body, 20) }}</td>
                                <td>{{ $ticket->user->name }}</td>
                                <td>{{ $ticket->ticketCategory->name }}</td>
                                <td>{{ $ticket->admin->user->name ?? '-' }}</td>
                                <td>{{ $ticket->status ? 'باز' : 'بسته' }}</td>
                                <td class="width-16-rem text-center">
                                    <a href="{{ route('admin.ticket.tickets.show', $ticket) }}"
                                       @class([
                                               'btn btn-secondary btn-sm border rounded-pill btn-hover color-8',
                                               'd-none' => !$ticket->status
                                                ])
                                       class=""><i
                                            class="fa fa-eye font-size-12"></i></a>
                                    <a href="{{ route('admin.ticket.tickets.changeStatus', $ticket) }}"
                                        @class([
                                                 'd-none' => $ticket->parent_id,
                                                 'btn btn-info btn-sm border rounded-pill btn-hover',
                                                 'color-5' =>!$ticket->status,
                                                 'color-4' =>$ticket->status
                                                ])>
                                        <i
                                            @class([
                                                    'fa',
                                                    'fa-check-circle' => !$ticket->status,
                                                    'fa-times-circle' => $ticket->status
                                                    ])>
                                        </i>
                                        تغییر وضعیت
                                    </a>
                                    <a href="{{ route('admin.ticket.tickets.edit', $ticket) }}"
                                       @class([
                                               'btn btn-primary btn-sm border rounded-pill  btn-hover color-9',
                                               'd-none' => !$ticket->parent_id || !$ticket->status,

                                               ])><i
                                            class="fa fa-pen"></i> ویرایش</a>
                                    <form class="d-inline"
                                          action="{{ route('admin.ticket.tickets.destroy', $ticket) }}"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                                class="btn btn-danger btn-sm delete border rounded-pill  btn-hover color-11">
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
        </section>
    </section>

@endsection

@section('scripts')
    @parent
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])

@endsection
