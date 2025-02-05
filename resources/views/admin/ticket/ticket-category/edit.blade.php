@extends('admin.layouts.app')
@section('title', 'ویرایش دسته بندی تیکت')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش تیکت ها</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.ticket.ticket-categories.index') }}">دسته بندی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش دسته بندی</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h4>ویرایش دسته بندی</h4>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.ticket.ticket-categories.index') }}" class="btn btn-info rounded-pill btn-hover color-8">« بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.ticket.ticket-categories.update', $ticketCategory) }}" method="post" id="form">
                        @csrf
                        @method('PUT')
                        <section class="row">
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="name">نام دسته</label>
                                    @error('name')
                                    <span class="alert_required text-danger" role="alert">
                                <small>
                                 <b>{{ $message }}</b>
                                </small>
                            </span>
                                    @enderror
                                    <input type="text" class="form-control form-control-sm @error('name') border border-danger @enderror" name="name" id="name" value="{{ old('name', $ticketCategory->name) }}">
                                </div>

                            </section>

                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    @error('status')
                                    <span class="alert_required text-danger" role="alert">
                                <small>
                                    <b>{{ $message }}</b>
                                </small>
                            </span>
                                    @enderror
                                    <select name="status" class="form-control form-control-sm @error('status') border border-danger @enderror" id="status">
                                        <option value="0" @selected(old('status', $ticketCategory->status) == 0)>غیرفعال</option>
                                        <option value="1" @selected(old('status', $ticketCategory->status) == 1)>فعال</option>
                                    </select>
                                </div>
                            </section>

                            <section class="col-12 my-3">
                                <button class="btn btn-primary  rounded-pill btn-hover color-9">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>

@endsection
