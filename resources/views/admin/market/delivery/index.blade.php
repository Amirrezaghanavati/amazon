@extends('admin.layouts.app')
@section('title', 'روش های ارسال')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><i class="fa fa-home text-muted"></i><a href="{{ route('admin.') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> روش ارسال</li>
        </ol>
    </nav>

    <section class="main-body-container">
        <section class="main-body-container-header"><h4>روش های ارسال</h4></section>
        <section class="body-content d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
            <a href="{{ route('admin.market.deliveries.create') }}" class="btn btn-info  border rounded-lg  btn-hover color-8">ایجاد روش ارسال جدید</a>
            <div class="max-width-16-rem">
                <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
            </div>
        </section>

        <section class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>نام روش ارسال</th>
                    <th>هزینه ارسال</th>
                    <th>زمان ارسال</th>
                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @forelse($deliveryMethods as $deliveryMethod)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $deliveryMethod->name }}</td>
                        <td>{{ $deliveryMethod->amount }} تومان</td>
                        <td>{{ $deliveryMethod->delivery_time }} {{ $deliveryMethod->delivery_time_unit }}</td>

                        <td class="width-16-rem text-center">
                            <a href="{{ route('admin.market.deliveries.edit', $deliveryMethod) }}" class="btn btn-primary  border rounded-lg btn-sm btn-hover color-9"><i class="fa fa-pen font-size-12"></i></a>
                            <form class="d-inline" action="{{ route('admin.market.deliveries.destroy', $deliveryMethod) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm delete border rounded-lg  btn-hover color-11">
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
