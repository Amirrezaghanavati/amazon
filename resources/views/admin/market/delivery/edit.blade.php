@extends('admin.layouts.app')
@section('title', 'ویرایش روش ارسال')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><i class="fa fa-home text-muted"></i><a
                    href="{{ route('admin.') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="{{ route('admin.market.deliveries.index') }}">روش
                    ارسال</a>
            </li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش روش ارسال </li>
        </ol>
    </nav>
    <section class="main-body-container">
        <section class="main-body-container-header"><h4>ویرایش روش ارسال </h4></section>
        <section class="body-content d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
            <a href="{{ route('admin.market.deliveries.index') }}"
               class="btn btn-info  border rounded-lg  btn-hover color-8">« بازگشت</a>
        </section>
        <section>
            <form action="{{ route('admin.market.deliveries.update', $delivery) }}" method="post"
                  id="form">
                @csrf
                @method('PUT')
                <section class="row">
                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">روش ارسال</label>
                            @error('name')
                            <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                            @enderror
                            <input type="text"
                                   class="form-control form-control-sm @error('name') border border-danger @enderror"
                                   name="name" id="name" value="{{ old('name', $delivery->name) }}">
                        </div>
                    </section>

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="amount" class="font-weight-bold">هزینه روش ارسال</label>
                            @error('amount')
                            <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                            @enderror
                            <input type="text"
                                   class="form-control form-control-sm @error('amount') border border-danger @enderror"
                                   name="amount" id="amount" value="{{ old('amount', $delivery->amount) }}">
                        </div>
                    </section>
                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="delivery_time" class="font-weight-bold">زمان ارسال</label>
                            @error('delivery_time')
                            <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                            @enderror
                            <input type="text"
                                   class="form-control form-control-sm @error('delivery_time') border border-danger @enderror"
                                   name="delivery_time" id="delivery_time" value="{{ old('delivery_time', $delivery->delivery_time) }}">
                        </div>
                    </section>

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="delivery_time_unit" class="font-weight-bold">واحد زمان ارسال</label>
                            @error('delivery_time_unit')
                            <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                            @enderror
                            <input type="text"
                                   class="form-control form-control-sm @error('delivery_time_unit') border border-danger @enderror"
                                   name="delivery_time_unit" id="delivery_time_unit"
                                   value="{{ old('delivery_time_unit', $delivery->delivery_time_unit) }}">
                        </div>
                    </section>

                    <section class="col-12 col-md-6">
                        <button class="btn btn-primary border rounded-lg  btn-hover color-9">ویرایش</button>
                    </section>
                </section>
            </form>
        </section>
    </section>
@endsection
