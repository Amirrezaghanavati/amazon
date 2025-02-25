@extends('admin.layouts.app')

@section('title', 'ویرایش بنر')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><i class="fa fa-home text-muted"></i><a
                        href="{{ route('admin.') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> بنر ها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ویرایش بنر</h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.market.banners.index') }}"
                       class="btn btn-info  border rounded-lg  btn-hover color-8">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.market.banners.update', $banner) }}" method="post"
                          enctype="multipart/form-data"
                          id="form">
                        @csrf
                        @method('PUT')
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="title">عنوان بنر</label>
                                    @error('title')
                                    <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                                    @enderror
                                    <input type="text" id="title"
                                           class="form-control form-control-sm @error('title') border border-danger @enderror"
                                           name="title" value="{{ old('title', $banner->title) }}">
                                </div>

                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تصویر </label>
                                    @error('image')
                                    <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                                    @enderror
                                    <input type="file" name="image"
                                           class="form-control form-control-sm @error('image') border border-danger @enderror">
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">آدرس URL</label>
                                    @error('url')
                                    <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                                    @enderror
                                    <input type="text" name="url" value="{{ old('url', $banner->url) }}"
                                           class="form-control form-control-sm @error('url') border border-danger @enderror">
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">موقعیت</label>
                                    @error('position')
                                    <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                                    @enderror
                                    <select name="position"
                                            class="form-control form-control-sm @error('position') border border-danger @enderror">
                                        @forelse(\App\Enums\BannerPositionEnum::cases() as $case)
                                            <option value="{{ $case->value }}"
                                                    @selected( old('position', $banner->position->value) == $case->value )>{{ $case->getLabel() }}</option>
                                        @empty @endforelse
                                    </select>
                                </div>
                            </section>

                            <section class="col-12">
                                <button class="btn btn-primary border rounded-lg  btn-hover color-9">ویرایش</button>
                            </section>
                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
@endsection
