@extends('auth.layouts.app')

@section('title', 'تایید کد')

@section('content')
    <section class="vh-100 d-flex justify-content-center align-items-center pb-5">
        <section class="login-wrapper mb-5">
            <section class="login-logo">
                <img src="{{ asset('assets/images/logo/4.png') }}" alt="">
            </section>
            <section class="login-title">تایید کد</section>
            <section class="login-info">لطفا کد تایید را وارد نمایید</section>
            <form action="{{ route('otp.verify') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <section class="login-input-text">
                    <input type="text" name="otp" value="{{ old('otp') }}" placeholder="کد" required>
                    @error('otp')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </section>
                <section class="login-btn d-grid g-2"><button class="btn btn-danger">تایید</button></section>
            </form>
            @if (session('error'))
                <section class="alert alert-danger">
                    {{ session('error') }}
                </section>
            @endif
        </section>

    </section>
@endsection
