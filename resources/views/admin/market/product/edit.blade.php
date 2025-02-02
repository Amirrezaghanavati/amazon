@extends('admin.layouts.app')
@section('title', 'ویرایش کالا')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12">
                <i class="fa fa-home text-muted"></i><a href="{{ route('admin.') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="{{ route('admin.market.products.index') }}">کالا</a>
            </li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش کالای جدید</li>
        </ol>
    </nav>
    <section class="main-body-container">
        <section class="main-body-container-header"><h4>ویرایش کالا</h4></section>
        <section class="body-content d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
            <a href="{{ route('admin.market.products.index') }}"
               class="btn btn-info  border rounded-lg  btn-hover color-8">«
                بازگشت</a>
        </section>
        <section>

            <form action="{{ route('admin.market.products.update', $product) }}" method="post" enctype="multipart/form-data"
                  id="form">
                @csrf
                @method('PUT')
                <section class="row">
                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">نام کالا</label>
                            @error('name')
                            <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                            @enderror
                            <input type="text"
                                   class="form-control form-control-sm @error('name') border border-danger @enderror"
                                   name="name" id="name" value="{{ old('name', $product->name) }}">
                        </div>
                    </section>

                    <section class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="product_category_id" class="font-weight-bold">دسته کالا</label>
                            @error('product_category_id')
                            <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                            @enderror
                            <select name="product_category_id" id="product_category_id"
                                    class="form-control form-control-sm @error('product_category_id') border border-danger @enderror">
                                <option value="">دسته محصول را انتخاب کنید</option>
                                @forelse($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @selected( old('product_category_id', $product->product_category_id) == $category->id)>{{ $category->name }}</option>
                                @empty @endforelse
                            </select>
                        </div>
                    </section>
                    <section class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="brand_id" class="font-weight-bold">برند</label>
                            @error('brand_id')
                            <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                            @enderror
                            <select name="brand_id" id="brand_id"
                                    class="form-control form-control-sm @error('brand_id') border border-danger @enderror">
                                <option value="">برند محصول را انتخاب کنید</option>
                                @forelse($brands as $brand)
                                    <option value="{{ $brand->id }}"
                                        @selected( old('brand_id', $product->brand_id) == $brand->id)>{{ $brand->persian_name }}</option>
                                @empty @endforelse
                            </select>
                        </div>
                    </section>


                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="tags" class="font-weight-bold">تگ ها</label>
                            @error('tags')
                            <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                            @enderror
                            <input type="hidden"
                                   class="form-control form-control-sm @error('tags') border border-danger @enderror"
                                   name="tags" id="tags" value="{{ old('tags', $product->tags) }}">
                            <select id="select_tags"
                                    class="select2 form-control form-control-sm @error('tags') border border-danger @enderror"
                                    multiple></select>
                        </div>
                    </section>

                    <section class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="price" class="font-weight-bold">قیمت کالا</label>
                            @error('price')
                            <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                            @enderror
                            <input type="text"
                                   class="form-control form-control-sm @error('price') border border-danger @enderror"
                                   name="price" id="price" value="{{ old('price', $product->price) }}">
                        </div>
                    </section>
                    <section class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="marketable_number" class="font-weight-bold">موجودی کالا</label>
                            @error('marketable_number')
                            <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                            @enderror
                            <input type="number"
                                   class="form-control form-control-sm @error('price') border border-danger @enderror"
                                   name="marketable_number" id="marketable_number" value="{{ old('marketable_number', $product->marketable_number) }}">
                        </div>
                    </section>

                    <section class="col-md-6 pb-2">
                        <section class="col-md-12">
                            <section class="row border-right border-top radius-05t border-left p-2">
                                <section class="col-md-6">
                                    <div class="form-group">
                                        <label for="weight" class="font-weight-bold">وزن</label>
                                        @error('weight')
                                        <span class="alert_required text-danger" role="alert">
                                            <small>
                                                <b>{{ $message }}</b>
                                            </small>
                                        </span>
                                        @enderror
                                        <input type="text"
                                               class="form-control form-control-sm @error('weight', $product->weight) border border-danger @enderror"
                                               name="weight" id="weight" value="{{ old('weight') }}">
                                    </div>
                                </section>
                                <section class="col-md-6">
                                    <div class="form-group">
                                        <label for="length" class="font-weight-bold">طول</label>
                                        @error('length')
                                        <span class="alert_required text-danger" role="alert">
                                            <small>
                                                <b>{{ $message }}</b>
                                            </small>
                                        </span>
                                        @enderror
                                        <input type="text"
                                               class="form-control form-control-sm @error('length', $product->length) border border-danger @enderror"
                                               name="length" id="length" value="{{ old('length') }}">
                                    </div>
                                </section>
                            </section>
                        </section>
                        <section class="col-md-12">
                            <section class="row border-right border-left radius-05b border-bottom ">
                                <section class="col-md-6">
                                    <div class="form-group">
                                        <label for="width" class="font-weight-bold">عرض</label>
                                        @error('width')
                                        <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                                        @enderror
                                        <input type="text"
                                               class="form-control form-control-sm @error('width', $product->width) border border-danger @enderror"
                                               name="width" id="width" value="{{ old('width') }}">
                                    </div>
                                </section>
                                <section class="col-md-6">
                                    <div class="form-group">
                                        <label for="height" class="font-weight-bold">ارتفاع</label>
                                        @error('height')
                                        <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                                        @enderror
                                        <input type="text"
                                               class="form-control form-control-sm @error('height', $product->height) border border-danger @enderror"
                                               name="height" id="height" value="{{ old('height') }}">
                                    </div>
                                </section>
                            </section>
                        </section>

                    </section>
                    <section class="col-md-6">
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="image" class="font-weight-bold">تصویر</label>
                                    @error('image')
                                    <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                                    @enderror
                                    <input type="file"
                                           class="form-control form-control-sm @error('image') border border-danger @enderror"
                                           name="image" id="image">
                                    <label for="image" class="mt-1 form-check-label mx-2 font-weight-bold">
                                        <img src="{{ asset($product->image)}}" class="w-50 rounded " alt="عکس">
                                    </label>
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
                                        <option value="0" @selected( old('status', $product->status) == 0)>غیر فعال</option>
                                        <option value="1" @selected( old('status', $product->status) == 1)>فعال</option>
                                    </select>
                                </div>
                            </section>
                            <section class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="marketable" class="font-weight-bold">قابل فروش بودن</label>
                                    @error('marketable')
                                    <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                                    @enderror
                                    <select name="marketable" id="marketable"
                                            class="form-control form-control-sm @error('marketable') border border-danger @enderror">
                                        <option value="0" @selected( old('marketable', $product->marketable) == 0)>غیر فعال</option>
                                        <option value="1" @selected( old('marketable', $product->marketable) == 1)>فعال</option>
                                    </select>
                                </div>
                            </section>
                        </section>

                    </section>


                    <section class="col-12">
                        <div class="form-group">
                            <label for="description_body" class="font-weight-bold">توضیحات</label>
                            @error('description')
                            <span class="alert_required text-danger" role="alert">
                                    <small>
                                        <b>{{ $message }}</b>
                                    </small>
                                </span>
                            @enderror
                            <textarea type="text"
                                      class="form-control form-control-sm @error('description') border border-danger @enderror"
                                      name="description" id="description_body"> {{ old('description', $product->description) }} </textarea>
                        </div>
                    </section>


                    <section class="col-12">
                        <button class="btn btn-primary border rounded-lg  btn-hover color-9">ثبت</button>
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
        CKEDITOR.replace('description', {
            language: 'fa'
        });
    </script>

    <script>
        $(document).ready(function () {
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;

            if (tags_input.val() !== null && tags_input.val().length > 0)
                default_data = default_tags.split(',');

            select_tags.select2({
                placeholder: 'لطفا تگ های خود را وارد نمایید',
                tags: true,
                data: default_data
            });
            select_tags.children('option').attr('selected', true).trigger('change');
            $('#form').submit(function () {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource)
                }
            })
        })
    </script>
    <script>
        $(function () {
            $('#btn-copy').on('click', function () {
                var element = $(this).parent().prev().clone(true);
                $(this).before(element);
            })
        });
    </script>
@endsection
