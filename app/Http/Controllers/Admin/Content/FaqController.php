<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\StoreFaqRequest;
use App\Http\Requests\Admin\Content\StorePostRequest;
use App\Http\Requests\Admin\Content\UpdateFaqRequest;
use App\Models\Content\Faq;
use App\Models\Market\Brand;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::paginate(10);
        return view('admin.content.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.content.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFaqRequest $request): \Illuminate\Http\RedirectResponse
    {
        Faq::query()->create($request->validated());
        return to_route('admin.content.faqs.index')->with('swal-success', 'سوال متداول با موفقیت ساخته شد');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        return view('admin.content.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFaqRequest $request, Faq $faq)
    {
        $faq->update($request->validated());
        return to_route('admin.content.faqs.index')->with('swal-success', 'سوال متداول با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return to_route('admin.content.faqs.index')->with('swal-success', 'سوال متداول با موفقیت حذف شد');
    }

    public function status(Faq $faq): \Illuminate\Http\JsonResponse
    {

        $faq->status = $faq->status === 0 ? 1 : 0;
        $result = $faq->save();
        if ($result) {
            if ($faq->status === 0) {
                return response()->json([
                    'status'  => true,
                    'checked' => false,
                ]);
            }
            return response()->json([
                'status'  => true,
                'checked' => true,
            ]);
        }

        return response()->json(['status' => false]);
    }
}
