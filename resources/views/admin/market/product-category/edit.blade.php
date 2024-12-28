@extends('admin.layouts.app')

@section('title', 'دسته بندی محصولات')

@section('content')

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5>
                            ویرایش دسته بندی
                        </h5>

                    </div>
                    <div>
                        <a href="{{ route('admin.market.product-categories.index') }}"
                           class="btn btn-warning">بازگشت</a>
                    </div>
                </section>
                <section class="body-content">

                    <form class="row g-3"
                          action="{{ route('admin.market.product-categories.update', $productCategory) }}"
                          method="post">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6 mb-2">
                            <label for="name" class="form-label">نام</label>
                            <input type="text" name="name" class="form-control" id="name"
                                   value="{{ old('name', $productCategory) }}">
                            @error('name')
                            <small class="text-danger text-sm">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="status" class="form-label">وضعیت</label>
                            <select class="form-control" name="status" id="status">
                                @foreach(\App\Enums\CategoryStatus::cases() as $status)
                                    <option value="{{ $status->value }}" @selected($productCategory->status === $status->value)>{{ $status->getLabel() }}</option>
                                @endforeach
                            </select>
                            @error('status')
                            <small class="text-danger text-sm">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="col-12">
                            <button type="submit" class="btn btn-success">ثبت</button>
                        </div>
                    </form>

                </section>
            </section>
        </section>
    </section>

@endsection
