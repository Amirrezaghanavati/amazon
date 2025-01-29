@extends('admin.layouts.app')
@section('title', 'ساخت پرسش و پاسخ')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><i class="fa fa-home text-muted"></i><a
                    href="{{ route('admin.') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12 p-0" aria-current="page"><a
                    href="{{ route('admin.content.faqs.index') }}">
                    سوالات متداول</a></li>
            <li class="breadcrumb-item font-size-12 p-0"> ایجاد پرسش و پاسخ جدید</li>
        </ol>
    </nav>
    <section class="main-body-container">
        <section class="main-body-container-header"><h4>ایجاد پرسش و پاسخ</h4></section>
        <section class="body-content d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
            <a href="{{ route('admin.content.faqs.index') }}"
               class="btn btn-info  border rounded-pill  btn-hover color-8">« بازگشت</a>
        </section>
        <section>
            <form action="{{ route('admin.content.faqs.store') }}" method="post" id="form">
                @csrf
                <section class="row">

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="faq_question" class="font-weight-bold">پرسش</label>
                            @error('question')
                            <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                            @enderror
                            <textarea name="question" id="faq_question"
                                      class="form-control form-control-sm @error('question') border border-danger @enderror"
                                      rows=15">{{ old('question') }}</textarea>
                        </div>
                    </section>

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="faq_answer" class="font-weight-bold">پاسخ</label>
                            @error('answer')
                            <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                            @enderror
                            <textarea name="answer" id="faq_answer"
                                      class="form-control form-control-sm @error('answer') border border-danger @enderror"
                                      rows="10">
                              {{ old('answer') }}
                            </textarea>
                        </div>
                    </section>

                    <section class="col-12">
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
                                <option value="0" @if( old('status') === \App\Enums\FaqStatus::DISABLE) selected @endif>
                                    غیر فعال
                                </option>
                                <option value="1" @if(old('status') === \App\Enums\FaqStatus::ACTIVE) selected @endif>
                                    فعال
                                </option>
                            </select>
                        </div>
                    </section>

                    <section class="col-12 col-md-6">
                        <button class="btn btn-primary border rounded-pill btn-hover color-9">ثبت</button>
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
        CKEDITOR.replace('answer', {
            language: 'fa'
        });
        CKEDITOR.replace('question', {
            language: 'fa'
        });
    </script>

@endsection
