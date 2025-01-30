@extends('admin.layouts.app')
@section('title', 'نمایش نظر')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><i class="fa fa-home text-muted"></i><a
                    href="{{ route('admin.') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="{{ route('admin.market.comments.index') }}">نظرات</a>
            </li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> نمایش نظر</li>
        </ol>
    </nav>

    <section class="main-body-container">
        <section class="main-body-container-header"><h4>نمایش نظر</h4></section>
        <section class="body-content d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
            <a href="{{ route('admin.market.comments.index') }}"
               class="btn btn-info  border rounded-lg  btn-hover color-8">« بازگشت</a>
        </section>

        <section class="card mb-3 mx-5">
            <section class="card-header bg-gray-50">
                <span>{{ $comment->user->name }}</span>
            </section>
            <section class="card-body">
                <section class="d-flex justify-content-between">
                    <h5 class="card-title"><b>عنوان محصول :</b>
                        <a href="#" class="show-link"> {{ $comment->commentable->name }} </a>
                    </h5>
                    <p class="my-2 mx-2"><b> کد محصول :</b> {{ $comment->commentable_id }}</p>
                </section>
                <section class="card mx-chat shadow-sm bg-light">
                    <h6 class="mr-3 bg-custom-dark border shadow-sm text-white text-center py-1 rounded-bottom-pill w-2-h-2 mt-n1 rounded-top">
                        نظر</h6>
                    @if($comment->parent_id)
                        <section class="card-body">
                            <div class="float-left d-flex">
                                <span
                                    class="bg-gray-50 p-4 float-left chat-message-border-radius h6 shadow-sm">{{ $comment->parent->body }} </span>
                                <span><img class="notification-img rounded-circle mt-5 mr-1 border shadow-sm"
                                           src="{{ asset('admin-assets/images/avatar-2.jpg') }}" alt="عکس"
                                           style="width: 2.5rem"></span>
                            </div>
                        </section>

                        <section class="card-body">
                            <div class=" float-right d-flex">
                                <span><img class="notification-img rounded-circle mt-5 ml-1 border shadow-sm"
                                           src="{{ asset('admin-assets/images/avatar-2.jpg') }}" alt="عکس"
                                           style="width: 2.5rem"></span>
                                <p class="  bg-custom-blue-chat text-white p-4 chat-answer-border-radius h6 shadow-sm"> {{ $comment->body }} </p>
                            </div>
                        </section>

                    @else
                        <section class="card-body">
                            <div class=" float-left d-flex">
                                <span
                                    class="  bg-gray-50 p-4 float-left chat-message-border-radius h6 shadow-sm">{{ $comment->body }} </span>
                                <span><img class="notification-img rounded-circle mt-5 mr-1 border shadow-sm"
                                           src="{{ asset('admin-assets/images/avatar-2.jpg') }}" alt="عکس"
                                           style="width: 2.5rem"></span>
                            </div>
                        </section>
                        @forelse($comment->children as $child)
                            <section class="card-body">
                                <div class=" float-right d-flex">
                                    <span><img class="notification-img rounded-circle mt-5 ml-1 border shadow-sm"
                                               src="{{ asset('admin-assets/images/avatar-2.jpg') }}" alt="عکس"
                                               style="width: 2.5rem"></span>
                                    <p class="  bg-custom-blue-chat text-white p-4 chat-answer-border-radius h6 shadow-sm"> {{ $child->body }} </p>
                                </div>
                            </section>
                        @empty @endforelse
                    @endif
                </section>
            </section>
        </section>
    </section>
@endsection
