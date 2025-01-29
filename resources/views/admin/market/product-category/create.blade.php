@extends('admin.layouts.app')
@section('title', 'ساخت دسته بندی جدید')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><i class="fa fa-home text-muted"></i><a
                    href="{{ route('admin.') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="{{ route('admin.market.product-categories.index') }}">دسته
                    بندی</a>
            </li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد دسته بندی</li>
        </ol>
    </nav>
    <section class="main-body-container">
        <section class="main-body-container-header"><h4>ایجاد دسته بندی</h4></section>
        <section class="body-content d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
            <a href="{{ route('admin.market.product-categories.index') }}"
               class="btn btn-info  border rounded-lg  btn-hover color-8">« بازگشت</a>
        </section>
        <section>
            <form action="{{ route('admin.market.product-categories.store') }}" method="post"
                  id="form">
                @csrf
                <section class="row">
                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">نام دسته</label>
                            @error('name')
                            <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                            @enderror
                            <input type="text"
                                   class="form-control form-control-sm @error('name') border border-danger @enderror"
                                   name="name" id="name" value="{{ old('name') }}">
                        </div>
                    </section>

                    <section class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="" class="font-weight-bold">دسته والد</label>
                            @error('parent_id')
                            <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                            @enderror
                            <select name="parent_id" id="parent_id"
                                    class="form-control form-control-sm @error('parent_id') border border-danger @enderror">
                                <option value="" class="badge badge-light">منو اصلی</option>
                                @forelse($parentCategories as $parentCategory)
                                    <option value="{{ $parentCategory->id }}"
                                            @selected( old('parent_id') === $parentCategory->id) class="badge badge-info font-size-12">{{ $parentCategory->name }}</option>
                                    @forelse($parentCategory->children as $subCategory)
                                        <option value="{{ $subCategory->id }}"
                                                @selected( old('parent_id') === $parentCategory->id) class="badge badge-light font-size-12 border-dark">{{ $subCategory->name }}</option>
                                    @empty @endforelse
                                @empty @endforelse

                            </select>
                        </div>
                    </section>

                    <section class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="status" class="font-weight-bold">وضعیت</label>
                            @error('status')
                            <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                            @enderror
                            <select name="status" id="status"
                                    class="form-control form-control-sm @error('status') border border-danger @enderror">
                                @foreach(\App\Enums\CategoryStatus::cases() as $status)
                                    <option
                                        value="{{ $status->value }}" @selected( old('status') === $status->value ) >{{ $status->getLabel() }}</option>
                                @endforeach
                            </select>
                        </div>
                    </section>

                    <section class="col-12 col-md-6">
                        <button class="btn btn-primary border rounded-lg  btn-hover color-9">ثبت</button>
                    </section>
                </section>
            </form>
        </section>

    </section>
@endsection
