@extends('app.layouts.app')

@section('title', 'سبد خرید')

@section('content')
    <!-- start main one col -->

    <!-- start cart -->
    <section class="mb-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>سبد خرید شما</span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>


                    <section class="row mt-4">
                        <section class="col-md-9 mb-3">
                            <section class="content-wrapper bg-white p-3 rounded-2">

                                @foreach ($cart?->cartItems as $item)

                                    <section class="cart-item d-md-flex py-3">
                                        <section class="cart-img align-self-start flex-shrink-1"><img
                                                src="{{ asset($item->product->image) }}" alt=""></section>
                                        <section class="align-self-start w-100">
                                            <p class="fw-bold">{{ $item->product->name }}</p>

                                            <section>
                                                <section class="cart-product-number d-inline-block ">
                                                    <form action="{{ route('cart.add-product', $item->product) }}"
                                                          method="POST" class="d-inline">
                                                        @csrf
                                                        <button class="cart-number-up" type="submit">+</button>
                                                    </form>
                                                    <input class="" type="number" step="1"
                                                           value="{{ $item->quantity }}" readonly="readonly">
                                                    @if ($item->quantity > 1)
                                                        <form action="{{ route('cart.decrease', $item) }}"
                                                              class="d-inline" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button class="cart-number-down" type="submit">-</button>
                                                        </form>
                                                    @endif

                                                </section>
                                                <form action="{{ route('cart.remove-product', ['cartItem' => $item]) }}" method="POST"
                                                      class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-link ms-4 cart-delete text-decoration-none"
                                                            type="submit"><i class="fa fa-trash-alt"></i> حذف از
                                                        سبد</button>
                                                </form>
                                            </section>
                                        </section>
                                        <section class="align-self-end flex-shrink-1">
                                            <section class="text-nowrap fw-bold">{{ $item->product->price }} تومان</section>
                                        </section>
                                    </section>
                                @endforeach





                            </section>
                        </section>
                        <section class="col-md-3">
                            <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">قیمت کالاها ({{ $cart->cart_items_count }})</p>
                                    <p class="text-muted">{{ number_format($cart->total_price) }} تومان</p>
                                </section>

                                <section class="border-bottom mb-3"></section>
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">جمع سبد خرید</p>
                                    <p class="fw-bolder">{{ number_format($cart->total_price) }} تومان</p>
                                </section>

                                <p class="my-3">
                                    <i class="fa fa-info-circle me-1"></i>کاربر گرامی خرید شما هنوز نهایی نشده است. برای
                                    ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب
                                    کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت
                                    پرداخت این سفارش صورت میگیرد.
                                </p>

                                @if($cart->cartItems->isNotEmpty())
                                <section class="">
                                    <a href="{{ route('checkout.', $cart) }}" class="btn btn-danger d-block">تکمیل فرآیند خرید</a>
                                </section>
                                @endif

                            </section>
                        </section>
                    </section>
                </section>
            </section>

        </section>
    </section>
    <!-- end cart -->






    <!-- end main one col -->

@endsection
