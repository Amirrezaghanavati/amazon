<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Content\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::query()
            ->with(['user', 'commentable', 'parent'])
            ->productModel()->get();

        $comments
            ->where('status', 0)
            ->each(fn($comment) => $comment->update(['status' => 1]));

        return view('admin.market.comment.index', compact('comments'));
    }


    public function show(Comment $comment)
    {
        $comment->load('children');
        if ($comment->seen === 0) {
            $comment->update(['status' => 1]);
        }
        return view('admin.market.comment.show', compact('comment'));
    }


    public function status(Comment $comment)
    {
        $comment->status = $comment->status->value === 1 ? 2 : 1;
        $comment->save();
        return to_route('admin.market.comments.index')->with('swal-success', 'وضعیت نظر با موفقیت تغییر کرد');

    }
}
