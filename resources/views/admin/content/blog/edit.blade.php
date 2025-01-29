@extends('admin.layouts.app')
@section('title', 'ویرایش بلاگ جدید')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><i class="fa fa-home text-muted"></i><a
                    href="{{ route('admin.') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="{{ route('admin.content.posts.index') }}">بلاگ</a>
            </li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد پست جدید</li>
        </ol>
    </nav>

    <section class="main-body-container">
        <section class="main-body-container-header"><h4>ایجاد پست</h4></section>
        <section class="body-content d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
            <a href="{{ route('admin.content.posts.index') }}"
               class="btn btn-info  border rounded-pill  btn-hover color-8">« بازگشت</a>
        </section>

        <section>
            <form action="{{ route('admin.content.posts.update', $post) }}" method="post" id="form">
                @csrf
                @method('PUT')
                <section class="row">
                    <section class="col-12 ">
                        <div class="form-group">
                            <label for="title" class="font-weight-bold">عنوان پست</label>
                            @error('title')
                            <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                            </span>
                            @enderror
                            <input type="text"
                                   class="form-control form-control-sm @error('title') border border-danger @enderror"
                                   name="title" id="title" value="{{ old('title', $post->title) }}">
                        </div>
                    </section>

                    <section class="col-12">
                        <div class="form-group">
                            <label for="post_body" class="font-weight-bold">متن بدنه</label>
                            @error('body')
                            <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                            @enderror
                            <textarea type="text"
                                      class="form-control form-control-sm @error('body') border border-danger @enderror"
                                      name="body" id="post_body">{{ old('body', $post->body) }}</textarea>
                        </div>
                    </section>

                    <section class="col-12 col-md-6">
                        <button class="btn btn-primary border rounded-pill btn-hover color-9">ویرایش</button>
                    </section>
                </section>
            </form>
        </section>
    </section>
@endsection
@section('scripts')
    @parent
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('post_body', {
            language: 'fa'
        });
    </script>

@endsection
