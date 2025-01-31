<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\StoreMenuRequest;
use App\Http\Requests\Admin\Content\UpdateMenuRequest;
use App\Models\Content\Menu;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.content.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentMenus = Menu::query()->parent()->get();
        return view('admin.content.menu.create', compact('parentMenus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request): RedirectResponse
    {
        Menu::query()->create($request->validated());
        return to_route('admin.content.menus.index')->with('swal-success', 'منو با موفقیت ساخته شد');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $parentMenus = Menu::query()->parent()->get()->except($menu->id);
        return view('admin.content.menu.edit', compact('menu', 'parentMenus'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu): RedirectResponse
    {
        $menu->update($request->validated());
        return to_route('admin.content.menus.index')->with('swal-success', 'منو با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu): RedirectResponse
    {
        $menu->delete();
        return to_route('admin.content.menus.index')->with('swal-success', 'منو با موفقیت حذف شد');
    }
}
