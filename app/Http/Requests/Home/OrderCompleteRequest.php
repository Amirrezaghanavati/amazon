<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class OrderCompleteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'delivery_id' => ['required', 'exists:deliveries,id']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
