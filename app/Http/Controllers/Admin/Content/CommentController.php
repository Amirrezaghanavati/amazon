<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\Content\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::query()
            ->commentModel()->get();
        $comments
            ->where('status', 0)
            ->each(fn($comment) => $comment->update(['status', 1]));


        return view('admin.content.comment.index', compact('comments'));
    }


    public function show(Comment $comment)
    {
        if ($comment->seen === 0) {
            $comment->seen = 1;
            $comment->save();
        }

        return view('admin.content.comment.show', compact('comment'));
    }

    public function status(Comment $comment)
    {
        $comment->status = $comment->status->value === 1 ? 2 : 1;
        $comment->save();
        return to_route('admin.content.comments.index')->with('swal-success', 'وضعیت نظر با موفقیت تغییر کرد');

    }


}
