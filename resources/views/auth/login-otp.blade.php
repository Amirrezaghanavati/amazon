@extends('auth.layouts.app')

@section('title', 'ورود و ثبت نام')

@section('content')
    <section class="vh-100 d-flex justify-content-center align-items-center pb-5">
        <section class="login-wrapper mb-5">
            <section class="login-logo">
                <img src="{{ asset('assets/images/logo/4.png') }}" alt="">
            </section>
            <section class="login-title">ورود / ثبت نام</section>
            <section class="login-info">شماره موبایل یا پست الکترونیک خود را وارد کنید</section>
            <form action="{{ route('otp.send') }}" method="POST">
                @csrf
                <section class="login-input-text">
                    <input type="text" name="mobile" value="{{ old('mobile') }}" placeholder="شماره موبایل" required>
                    @error('mobile')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </section>
                <section class="login-btn d-grid g-2"><button class="btn btn-danger">ورود به آمازون</button></section>
            </form>
            <section class="login-terms-and-conditions"><a href="#">شرایط و قوانین</a> را خوانده ام و پذیرفته ام
            </section>
            @if (session('error'))
                <section class="alert alert-danger">
                    {{ session('error') }}
                </section>
            @endif
        </section>

    </section>
@endsection
