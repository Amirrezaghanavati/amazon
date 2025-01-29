<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\StorePostRequest;
use App\Http\Requests\Admin\Content\UpdatePostRequest;
use App\Models\Content\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        return view('admin.content.blog.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.content.blog.create');

    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        Post::query()->create($request->validated());
        return to_route('admin.content.posts.index')->with('swal-success', 'پست با موفقیت ساخته شد');
    }

    public function edit(Post $post)
    {
        return view('admin.content.blog.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $post->update($request->validated());
        return to_route('admin.content.posts.index')->with('swal-success', 'بلاگ با موفقیت ویرایش شد');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return to_route('admin.content.posts.index')->with('swal-success', 'بلاگ با موفقیت حذف شد');

    }

}
