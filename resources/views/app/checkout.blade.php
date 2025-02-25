@extends('app.layouts.app')

@section('title', 'سبد خرید')

@section('content')
    <!-- start cart -->
    <section class="mb-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>انتخاب نوع پرداخت </span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>

                    <section class="row mt-4">
                        <section class="col-md-9">
                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                <!-- start vontent header -->
                                <section class="content-header mb-3">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            کد تخفیف
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>

                                @session('error')
                                <div class="alert alert-danger">{{ $value }}</div>
                                @endsession
                                @if ($cart->coupon_id)
                                    <section class="alert alert-success">
                                        کد تخفیف با موفقیت اعمال شد. - {{ $cart->coupon->code }}
                                    </section>
                                @else
                                    <section class="payment-alert alert alert-primary d-flex align-items-center p-2"
                                             role="alert">
                                        <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                        <secrion>
                                            کد تخفیف خود را در این بخش وارد کنید.
                                        </secrion>
                                    </section>

                                    <form action="{{ route('checkout.apply-discount') }}" method="post">
                                        @csrf
                                        <section class="row">
                                            <section class="col-md-5">
                                                <section class="input-group input-group-sm">
                                                    <input type="text" name="code" class="form-control"
                                                           placeholder="کد تخفیف را وارد کنید">
                                                    <button class="btn btn-primary" type="submit">اعمال کد</button>
                                                </section>
                                            </section>

                                        </section>
                                    </form>
                                @endif
                            </section>


                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">
                                <form action="{{ route('order-complete', $cart) }}" method="post">
                                    @csrf
                                    <!-- start vontent header -->
                                    <section class="content-header mb-3">
                                        <section class="d-flex justify-content-between align-items-center">
                                            <h2 class="content-header-title content-header-title-small">
                                                انتخاب روش ارسال
                                            </h2>
                                            <section class="content-header-link">
                                                <!--<a href="#">مشاهده همه</a>-->
                                            </section>
                                        </section>
                                    </section>
                                    <section class="payment-select">

                                        @forelse ($deliveries as $delivery)
                                            <input type="radio" name="delivery_id" id="delivery{{ $delivery->id }}"
                                                   value="{{ $delivery->id }}" required/>
                                            <label for="delivery{{ $delivery->id }}"
                                                   class=" form-check-label col-12 col-md-4 payment-wrapper mb-2 p-4">
                                                {{ $delivery->name }} - {{ $delivery->amount }} تومان
                                                {{ $delivery->delivery_time }} {{ $delivery->delivery_time_unit }}
                                            </label>

                                            <section class="mb-2"></section>
                                        @empty
                                        @endforelse


                                    </section>
                            </section>


                        </section>
                        <section class="col-md-3">
                            <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">قیمت کالاها ({{ $cart->cart_items_count }})</p>
                                    <p class="text-muted">{{ number_format($cart->total_price) }} تومان</p>
                                </section>

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">تخفیف کالاها</p>
                                    <p class="text-danger fw-bolder">{{ $cart->total_off_price }} تومان</p>
                                </section>

                                <p class="my-3">
                                    <i class="fa fa-info-circle me-1"></i> کاربر گرامی کالاها بر اساس نوع ارسالی که
                                    انتخاب
                                    می کنید در مدت زمان ذکر شده ارسال می شود.
                                </p>

                                <section class="border-bottom mb-3"></section>

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">مبلغ قابل پرداخت</p>
                                    <p class="fw-bold">{{ number_format($cart->total_price - $cart->total_off_price) }}
                                        تومان</p>
                                </section>

                                <section class="">
                                    <button type="submit" class="btn btn-danger w-100">ثبت سفارش</button>
                                </section>

                            </section>
                        </section>
                        </form>
                    </section>

                </section>

            </section>

        </section>
    </section>
    <!-- end cart -->

@endsection
