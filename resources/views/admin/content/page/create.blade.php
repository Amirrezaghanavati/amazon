@extends('admin.layouts.app')

@section('title', 'ایجاد پیج جدید')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="{{ route('admin.') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12"><a href="{{ route('admin.content.pages.index') }}">پیج ساز</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد پیج جدید</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>ایجاد پیج</h4>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.content.pages.index') }}" class="btn btn-info  border rounded-pill  btn-hover color-8">« بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.content.pages.store') }}" method="post" id="form">
                        @csrf
                        <section class="row">
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="title" class="font-weight-bold">عنوان </label>
                                    @error('title')
                                    <span class="alert_required text-danger" role="alert">
                                        <small>
                                            <b>{{ $message }}</b>
                                        </small>
                                     </span>
                                    @enderror
                                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control form-control-sm @error('title') border border-danger @enderror">
                                </div>
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="body" class="font-weight-bold">محتوی</label>
                                    @error('body')
                                    <span class="alert_required text-danger" role="alert">
                                        <small>
                                            <b>{{ $message }}</b>
                                        </small>
                                     </span>
                                    @enderror
                                    <textarea name="body" id="body" class="form-control form-control-sm @error('body') border border-danger @enderror" rows="6">{{ old('body') }}</textarea>
                                </div>
                            </section>
                            <section class="col-12">
                                <button class="btn btn-primary  border rounded-pill  btn-hover color-9">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
@endsection
@section('scripts')
    @parent
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('body', {
            language: 'fa'
        });
    </script>
@endsection
