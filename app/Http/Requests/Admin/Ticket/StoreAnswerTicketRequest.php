<?php

namespace App\Http\Requests\Admin\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnswerTicketRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'body' => ['required', 'string', 'filled'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
