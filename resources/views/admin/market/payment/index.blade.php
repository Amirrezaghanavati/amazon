@extends('admin.layouts.app')
@section('title', 'پرداخت ها')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><i class="fa fa-home text-muted"></i><a href="{{ route('admin.') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> پرداخت ها</li>
        </ol>
    </nav>

    <section class="main-body-container">
        <section class="main-body-container-header"><h4>پرداخت ها</h4></section>
        <section class="body-content d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
            <a href="#" class="btn btn-info  border rounded-lg  btn-hover color-8 disabled">ایجاد پرداخت جدید</a>
            <div class="max-width-16-rem">
                <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
            </div>
        </section>


        <section class="table-responsive">
            <table class="table table-striped table-hover h-150">
                <thead>
                <tr>
                    <th>#</th>
                    <th>پرداخت کننده</th>
                    <th>مبلغ</th>
                    <th>کد پیگیری</th>
                    <th>درگاه</th>
                    <th>وضعیت پرداخت</th>
                    <th>آی دی پرداخت</th>
                    <th>نوع پرداخت</th>
                </tr>
                </thead>
                <tbody>
                @forelse($payments as $payment)
                    <tr>
                        <td class="text-">{{ $loop->iteration }}</td>
                        <td>{{ $payment->user->name }}</td>
                        <td>{{ $payment->amount }}</td>
                        <td>{{ $payment->tracking_code }}</td>
                        <td>{{ $payment->gateway}}</td>
                        <td class="{{ $payment->status->getColor() }}">
                           {{ $payment->status->getLabel() }}
                        </td>
                        <td>{{ $payment->transaction_id}}</td>
                        <td>
                           {{ $payment->type ? 'آفلاین' : 'آنلاین'}}
                        </td>
                    </tr>
                @empty @endforelse
            </table>
        </section>
    </section>
@endsection
