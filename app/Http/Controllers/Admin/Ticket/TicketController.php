<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\StoreAnswerTicketRequest;
use App\Http\Requests\Admin\Ticket\UpdateAnswerTicketRequest;
use App\Http\Requests\Admin\Ticket\UpdateTicketCategoryRequest;
use App\Models\Ticket\Ticket;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('admin.ticket.ticket.index', compact('tickets'));
    }

    public function show(Ticket $ticket)
    {
        $ticket->load('children');
        return view('admin.ticket.ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        return view('admin.ticket.ticket.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnswerTicketRequest $request, Ticket $ticket): RedirectResponse
    {
        $ticket->update(['body' => $request->body]);
        return to_route('admin.ticket.tickets.index')->with('swal-success', 'تیکت با موفقیت ویرایش شد');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket): RedirectResponse
    {
        $ticket->delete();
        return to_route('admin.ticket.tickets.index')->with('swal-success', 'تیکت با موفقیت حذف شد');
    }

    public function answer(StoreAnswerTicketRequest $request, Ticket $ticket): RedirectResponse
    {
        $inputs = $request->validated();

        DB::transaction(static function () use ($inputs, $ticket) {
            auth()->user()->tickets()->create(
                $inputs +
                [
                    'subject'            => $ticket->subject,
                    'reference_id'       => auth()->user()->admin->id,
                    'ticket_category_id' => $ticket->ticket_category_id,
                    'parent_id'          => $ticket->parent_id ?? $ticket->id
                ]);

            $ticket->update(['reference_id' => auth()->user()->admin->id]);
        });
        return to_route('admin.ticket.tickets.index')->with('swal-success', 'پاسخ تیکت با موفقیت ثبت شد');

    }

    public function changeStatus(Ticket $ticket): RedirectResponse
    {
        $ticket->status = $ticket->status === 0 ? 1 : 0;
        if ($ticket->status) {
            $ticket?->children()->each(fn($ticket) => $ticket->update(['status' => 1]));
//            $ticket?->parent()->update(['status' => 1]);
        } else {
            $ticket?->children()->each(fn($ticket) => $ticket->update(['status' => 0]));
//            $ticket?->parent()->update(['status' => 0]);
        }
        $ticket->save();
        return to_route('admin.ticket.tickets.index')->with('swal-success', 'وضعیت تیکت با موفقیت تغییر کرد');
    }
}
