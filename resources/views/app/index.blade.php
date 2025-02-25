@extends('app.layouts.app')

@section('title', 'صفحه اصلی')

@section('content')
    <!-- start slideshow -->
    <section class="container-xxl my-4">
        <section class="row">
            <section class="col-md-8 pe-md-1 ">
                <section id="slideshow" class="owl-carousel owl-theme">
                    @forelse($slideShow as $slide)
                    <section class="item"><a class="w-100 d-block h-auto text-decoration-none" href="{{ $slide->url }}"><img
                                class="w-100 rounded-2 d-block h-auto" src="{{ $slide->image }}" alt="{{ $slide->title }}"></a>
                    </section>
                    @empty @endforelse
                </section>
            </section>
            <section class="col-md-4 ps-md-1 mt-2 mt-md-0">
                    <section class="mb-2">
                        <a href="{{ $topLeftBanner->url }}" class="d-block">
                            <img class="w-100 rounded-2" src="{{ $topLeftBanner->image }}" alt="{{ $topLeftBanner->title }}">
                        </a>
                    </section>
                <section class="mb-2">
                    <a href="{{ $bottomLeftBanner->url }}" class="d-block">
                        <img class="w-100 rounded-2" src="{{ $bottomLeftBanner->image }}" alt="{{ $bottomLeftBanner->title }}">
                    </a>
                </section>
            </section>
        </section>
    </section>
    <!-- end slideshow -->



    <!-- start product lazy load -->
    <section class="mb-3">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>پربازدیدترین کالاها</span>
                                </h2>
                                <section class="content-header-link">
                                    <a href="#">مشاهده همه</a>
                                </section>
                            </section>
                        </section>
                        <!-- start vontent header -->
                        <section class="lazyload-wrapper">
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">

                                @forelse($mostViewedProducts as $mostViewedProduct)
                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">
                                                <section class="product-add-to-cart"><a href=""
                                                                                        data-bs-toggle="tooltip" data-bs-placement="left"
                                                                                        title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a>
                                                </section>
                                                <section class="product-add-to-favorite"><a href="#"
                                                                                            data-bs-toggle="tooltip" data-bs-placement="left"
                                                                                            title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a>
                                                </section>
                                                <a class="product-link" href="{{ route('product', $mostViewedProduct) }}">
                                                    <section class="product-image">
                                                        <img class="" src="{{ $mostViewedProduct->image }}"
                                                             alt="">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name">
                                                        <h3>{{ $mostViewedProduct->name }}</h3>
                                                    </section>
                                                    <section class="product-price-wrapper">
                                                        <section class="product-price">
                                                            {{ number_format($mostViewedProduct->price) }} تومان</section>
                                                    </section>

                                                </a>
                                            </section>
                                        </section>
                                    </section>
                                @empty
                                @endforelse



                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end product lazy load -->



    <!-- start ads section -->
    <section class="mb-3">
        <section class="container-xxl">
            <!-- two column-->
            @forelse($middleBanners as $middleBanner)
            <section class="row py-4">
                <section class="col-12 col-md-6 mt-2 mt-md-0"><img class="d-block rounded-2 w-100"
                                                                   src="{{ $middleBanner->image }}" alt="{{ $middleBanner->title }}"></section>
                <section class="col-12 col-md-6 mt-2 mt-md-0"><img class="d-block rounded-2 w-100"
                                                                   src="{{ $middleBanner->image }}" alt="{{ $middleBanner->title }}"></section>
            </section>
            @empty @endforelse

        </section>
    </section>
    <!-- end ads section -->


    <!-- start product lazy load -->
    <section class="mb-3">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>پیشنهاد آمازون به شما</span>
                                </h2>
                                <section class="content-header-link">
                                    <a href="#">مشاهده همه</a>
                                </section>
                            </section>
                        </section>
                        <!-- start vontent header -->
                        <section class="lazyload-wrapper">
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">

                                @foreach ($popularProducts as $popularProduct)
                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">
                                                <section class="product-add-to-cart"><a href="#"
                                                                                        data-bs-toggle="tooltip" data-bs-placement="left"
                                                                                        title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a>
                                                </section>
                                                <section class="product-add-to-favorite"><a href="#"
                                                                                            data-bs-toggle="tooltip" data-bs-placement="left"
                                                                                            title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a>
                                                </section>
                                                <a class="product-link" href="{{ route('product', $popularProduct) }}">
                                                    <section class="product-image">
                                                        <img class="" src="{{ asset($popularProduct->image) }}"
                                                             alt="">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name">
                                                        <h3>{{ $popularProduct->name }}</h3>
                                                    </section>
                                                    <section class="product-price-wrapper">

                                                        <section class="product-price">{{ $popularProduct->price }} تومان
                                                        </section>
                                                    </section>

                                                </a>
                                            </section>
                                        </section>
                                    </section>
                                @endforeach


                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end product lazy load -->


    <!-- start ads section -->
    <section class="mb-3">
        <section class="container-xxl">
            <!-- one column -->
            <section class="row py-4">
                <section class="col"><img class="d-block rounded-2 w-100" src="{{ $footerBanner->image }}"
                                          alt="{{ $middleBanner->title }}"></section>
            </section>

        </section>
    </section>
    <!-- end ads section -->



    <!-- start brand part-->
    <section class="brand-part mb-4 py-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex align-items-center">
                            <h2 class="content-header-title">
                                <span>برندهای ویژه</span>
                            </h2>
                        </section>
                    </section>
                    <!-- start vontent header -->
                    <section class="brands-wrapper py-4">
                        <section class="brands dark-owl-nav owl-carousel owl-theme">

                            @foreach ($brands as $brand)
                                <section class="item">
                                    <section class="brand-item">
                                        <a href=""><img class="rounded-2" src="{{ asset($brand->logo) }}"
                                                         alt=""></a>
                                    </section>
                                </section>
                            @endforeach


                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end brand part-->
@endsection

@section('scripts')
    @parent

    @include('admin.alerts.sweetalert.success')
@endsection
