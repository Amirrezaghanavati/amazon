@extends('app.layouts.app')

@section('title', 'سفارشات')

@section('content')
    <!-- start body -->
    <section class="">
        <section id="main-body-two-col" class="container-xxl body-container">
            <section class="row">

                @include('app.profile.partials.sidebar')

                <main id="main-body" class="main-body col-md-9">
                    <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

                        <!-- start content header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>تاریخچه سفارشات</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- end content header -->


                        <x-orders-filter/>

                        <!-- start content header -->
                        <section class="content-header mb-3">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title content-header-title-small">
                                    {{ \App\Enums\OrderStatusEnum::getBy(request()->status)?->getLabel() }}
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- end content header -->


                        <section class="order-wrapper">

                            @foreach ($orders as $order)
                                <section class="order-item">
                                    <section class="d-flex justify-content-between">
                                        <section>
                                            <section class="order-item-date"><i class="fa fa-calendar-alt"></i>
                                                {{ jDate($order->created_at) }}
                                            </section>
                                            <section class="order-item-id"><i class="fa fa-id-card-alt"></i>کد سفارش :
                                                {{ $order->id }}
                                            </section>
                                            <section class="order-item-status"><i class="fa fa-clock"></i>
                                                {{ $order->status }}
                                            </section>
                                            <section class="order-item-products mt-3">

                                                <h5>محصولات :</h5>

                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">تصویر</th>
                                                        <th scope="col">نام</th>
                                                        <th scope="col">تعداد</th>
                                                        <th scope="col">قیمت</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach ($order->orderItems as $item)
                                                        <tr>
                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                            <td>
                                                                <img src="{{ $item->product->image }}" alt=""
                                                                     style="width: 60px; height: 60px;">
                                                            </td>
                                                            <td>{{ $item->product->name }}</td>
                                                            <td>{{ $item->quantity }}</td>
                                                            <td>{{ number_format($item->total_price) }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>


                                            </section>
                                        </section>
                                        <section class="order-item-link"><a href="#">پرداخت سفارش</a></section>
                                    </section>
                                </section>
                            @endforeach


                        </section>


                    </section>
                </main>
            </section>
        </section>
    </section>
    <!-- end body -->

@endsection
