<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\StoreTicketCategoryRequest;
use App\Http\Requests\Admin\Ticket\UpdateTicketCategoryRequest;
use App\Models\Ticket\TicketCategory;
use Illuminate\Http\Request;

class TicketCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ticketCategories = TicketCategory::all();
        return view('admin.ticket.ticket-category.index', compact('ticketCategories'));
    }


    public function create()
    {
        return view('admin.ticket.ticket-category.create');
    }

    public function store(StoreTicketCategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        TicketCategory::query()
            ->create($request->validated());
        return to_route('admin.ticket.ticket-categories.index')->with('swal-success', 'دسته بندی تیکت با موفقیت ساخته شد');
    }

    public function edit(TicketCategory $ticketCategory)
    {


        return view('admin.ticket.ticket-category.edit', compact('ticketCategory'));
    }

    public function update(UpdateTicketCategoryRequest $request, TicketCategory $ticketCategory): \Illuminate\Http\RedirectResponse
    {
        $ticketCategory->update($request->validated());
        return to_route('admin.ticket.ticket-categories.index')->with('swal-success', 'دسته بندی تیکت با موفقیت ویرایش شد');
    }

    public function destroy(TicketCategory $ticketCategory): \Illuminate\Http\RedirectResponse
    {
        $ticketCategory->delete();
        return to_route('admin.ticket.ticket-categories.index')->with('swal-success', 'دسته بندی تیکت با موفقیت حذف شد');

    }
}
