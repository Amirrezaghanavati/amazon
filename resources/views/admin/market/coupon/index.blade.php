@extends('admin.layouts.app')
@section('title', 'کوپن های تخفیف')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12">
                <i class="fa fa-home text-muted"></i><a href="{{ route('admin.') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> کوپن تخفیف</li>
        </ol>
    </nav>

    <section class="main-body-container">
        <section class="main-body-container-header"><h4>کوپن های تخفیف</h4></section>
        <section class="body-content d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
            <a href="{{ route('admin.market.coupons.create') }}"
               class="btn btn-info  border rounded-lg  btn-hover color-8">ایجاد
                کوپن تخفیف</a>
            <div class="max-width-16-rem">
                <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
            </div>
        </section>

        <section class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>کد تخفیف</th>
                    <th>میزان تخفیف</th>
                    <th>نوع تخفیف</th>
                    <th>سقف تخفیف</th>
                    <th>تاریخ شروع</th>
                    <th>تاریخ پایان</th>
                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @forelse($coupons as $coupon)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $coupon->code }}</td>
                        <td>{{ $coupon->amount }}{{$coupon->amount_type == 0 ? '%' : ' تومان'}}</td>
                        <td>{{ $coupon->amount_type === 0 ? '%' : 'واحد پول' }}</td>
                        <td>{{ number_format($coupon->discount_ceiling) ?? 'ندارد' }}</td>
                        <td>{{ jdate($coupon->start_date) }}</td>
                        <td>{{ jdate($coupon->end_date) }}</td>
                        <td class="width-16-rem text-center">
                            <a href="{{ route('admin.market.coupons.edit', $coupon) }}"
                               class="btn btn-primary btn-sm border rounded-lg  btn-hover color-9"><i
                                    class="fa fa-pen font-size-12"></i></a>
                            <form class="d-inline"
                                  action="{{ route('admin.market.coupons.destroy', $coupon) }}"
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
@section('scripts')
    @parent
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])

@endsection
