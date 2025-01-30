<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\StorePageRequest;
use App\Http\Requests\Admin\Content\UpdatePageRequest;
use App\Models\Content\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::paginate(5);
        return view('admin.content.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.content.page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePageRequest $request)
    {
        Page::query()->create($request->validated());
        return to_route('admin.content.pages.index')->with('swal-success', 'پیج با موفقیت ساخته شد');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('admin.content.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        $page->update($request->validated());
        return to_route('admin.content.pages.index')->with('swal-success', 'پیج با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Page $page)
    {
        $page->delete();
        return to_route('admin.content.pages.index')->with('swal-success', 'پیج با موفقیت حذف شد');
    }
}
