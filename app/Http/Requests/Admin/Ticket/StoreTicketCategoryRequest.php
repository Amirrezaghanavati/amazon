<?php

namespace App\Http\Requests\Admin\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'   => ['required', 'string', 'filled', 'max:255'],
            'status' => ['required', 'integer', 'in:0,1'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
