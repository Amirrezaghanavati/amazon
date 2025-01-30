@extends('admin.layouts.app')
@section('title', 'نظرات')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><i class="fa fa-home text-muted"></i><a
                    href="{{ route('admin.') }}">خانه</a></li>
            <li class="breadcrumb-item font-size-12 p-0"><a href="">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> نظرات</li>
        </ol>
    </nav>

    <section class="main-body-container">
        <section class="main-body-container-header"><h4>نظرات</h4></section>
        <section class="body-content d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
            <a href="" class="btn btn-info  disabled border rounded-pill  btn-hover color-8">ایجاد نظر جدید</a>
            <div class="max-width-16-rem">
                <input type="text" placeholder="جستجو" class="form-control form-control-sm form-text">
            </div>
        </section>


        <section class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>نظر</th>
                    <th>پاسخ به</th>
                    <th>نویسنده نظر</th>
                    <th>عنوان</th>
                    <th>وضعیت کامنت</th>
                </tr>
                </thead>
                <tbody>
                @forelse($comments as $comment)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ str()->limit($comment->body, 20) }}</td>
                        <td>{{ $comment->parent_id ? str()->limit($comment->parent->body, 10) : ' نظر اصلی ' }}</td>
                        <td>{{ $comment->user->name }}</td>
                        <td>{{ $comment->commentable->title }}</td>
                        <td class="width-16-rem text-center">
                            <a href="{{ route('admin.content.comments.show', $comment) }}"
                               class="btn btn-info btn-sm border rounded-pill btn-hover color-9"><i
                                    class="fa fa-eye font-size-12"></i></a>
                            @if($comment->status->value === (\App\Enums\CommentStatus::APPROVED)->value)
                                <a type="submit" href="{{ route('admin.content.comments.status', $comment) }}"
                                   class="btn btn-warning btn-sm  border btn-hover color-4 rounded-pill"><i
                                        class="fa fa-clock"></i></a>
                            @elseif($comment->status->value === ((\App\Enums\CommentStatus::SEEN)->value))

                                <a type="submit" href="{{ route('admin.content.comments.status', $comment) }}"
                                   class="btn btn-success btn-sm btn-hover color-5 text-white border rounded-pill "><i
                                        class="fa fa-check"></i></a>
                            @endif
                        </td>
                    </tr>
                @empty @endforelse
                </tbody>
            </table>
        </section>
    </section>
@endsection
