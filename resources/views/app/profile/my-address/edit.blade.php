@extends('app.layouts.app')

@section('title', 'ویرایش آدرس')

@section('content')
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
                                    <span>ویرایش آدرس</span>
                                </h2>
                                <section class="content-header-link">
                                    <a href="{{ route('profile.my-address.index') }}"
                                       class="btn btn-outline-secondary btn-sm">بازگشت</a>
                                </section>
                            </section>
                        </section>
                        <!-- end content header -->

                        <form action="{{ route('profile.my-address.update', $myAddress) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <!-- City -->
                                <div class="col-md-6">
                                    <label for="city_id" class="form-label">شهر</label>
                                    <select name="city_id" id="city_id"
                                            class="form-control form-control-sm @error('city_id') is-invalid @enderror">
                                        <option value="">شهر را انتخاب کنید</option>
                                        @forelse($cities as $city)
                                            <option value="{{ $city->id }}"
                                                    @selected( old('city_id', $myAddress->city_id) == $city->id)>{{ $city->name }}</option>
                                        @empty @endforelse
                                    </select>
                                    @error('city_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Postal Code -->
                                <div class="col-md-6">
                                    <label for="postal_code" class="form-label">کد پستی</label>
                                    <input type="text"
                                           class="form-control @error('postal_code') is-invalid @enderror"
                                           id="postal_code"
                                           name="postal_code"
                                           value="{{ old('postal_code', $myAddress->postal_code) }}"
                                           required>
                                    @error('postal_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Address -->
                                <div class="col-12">
                                    <label for="address" class="form-label">آدرس دقیق</label>
                                    <textarea class="form-control @error('address') is-invalid @enderror"
                                              id="address"
                                              name="address"
                                              rows="3"
                                              required>{{ old('address', $myAddress->address) }}</textarea>
                                    @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Unit -->
                                <div class="col-md-6">
                                    <label for="unit" class="form-label">واحد (اختیاری)</label>
                                    <input type="text"
                                           class="form-control @error('unit') is-invalid @enderror"
                                           id="unit"
                                           name="unit"
                                           value="{{ old('unit', $myAddress->unit) }}">
                                    @error('unit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="no" class="form-label">پلاک (اختیاری)</label>
                                    <input type="text"
                                           class="form-control @error('no') is-invalid @enderror"
                                           id="no"
                                           name="no"
                                           value="{{ old('no', $myAddress->no) }}">
                                    @error('no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">ذخیره آدرس</button>
                                    <a href="{{ route('profile.my-address.index') }}" class="btn btn-outline-secondary">لغو</a>
                                </div>
                            </div>
                        </form>

                    </section>
                </main>
            </section>
        </section>
    </section>
@endsection
