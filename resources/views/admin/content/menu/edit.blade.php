@extends('admin.layouts.app')
@section('title', 'منو ها')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><i class="fa fa-home text-muted"></i><a
                    href="{{ route('admin.') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12 p-0" aria-current="page">
                <a href="{{ route('admin.content.menus.index') }}">منو</a></li>
            <li class="breadcrumb-item font-size-12 p-0"> ویرایش منو</li>
        </ol>
    </nav>
    <section class="main-body-container">
        <section class="main-body-container-header"><h4>ویرایش منو</h4></section>
        <section class="body-content d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
            <a href="{{ route('admin.content.menus.index') }}"
               class="btn btn-info  border rounded-pill  btn-hover color-8">« بازگشت</a>
        </section>
        <section>
            <form action="{{ route('admin.content.menus.update', $menu) }}" method="post" id="form">
                @csrf
                @method('PUT')
                <section class="row">
                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="" class="font-weight-bold">عنوان منو</label>
                            @error('name')
                            <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                            @enderror
                            <input type="text"
                                   class="form-control form-control @error('name') border border-danger @enderror"
                                   name="name" value="{{ old('name', $menu->name) }}">
                        </div>
                    </section>

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="" class="font-weight-bold">منو والد</label>
                            @error('parent_id')
                            <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                            @enderror
                            <select name="parent_id" id="parent_id"
                                    class="form-control form-control-sm @error('parent_id') border border-danger @enderror">
                                <option value="">منو اصلی</option>
                                @forelse($parentMenus as $parentMenu)
                                    <option @selected( old('parent_id', $menu->parent_id)  === $parentMenu->id)
                                            value="{{ $parentMenu->id }}">{{ $parentMenu->name }}</option>
                                @empty @endforelse
                            </select>
                        </div>
                    </section>

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="url" class="font-weight-bold">آدرس url</label>
                            @error('url')
                            <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                            @enderror
                            <input id="url" type="text"
                                   class="form-control form-control @error('url') border border-danger @enderror"
                                   name="url" value="{{ old('url', $menu->url) }}" placeholder="مثال: example.com">
                        </div>
                    </section>

                    <section class="col-12 col-md-6">
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
                                <option value="0" @selected( old('status', $menu->status) === 0) >غیر فعال</option>
                                <option value="1" @selected( old('status', $menu->status) === 1) >فعال</option>
                            </select>
                        </div>
                    </section>

                    <section class="col-12 col-md-6">
                        <button class="btn btn-primary border rounded-pill  btn-hover color-9">ویرایش</button>
                    </section>
                </section>
            </form>
        </section>
    </section>
@endsection
