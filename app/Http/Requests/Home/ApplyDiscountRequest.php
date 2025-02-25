<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class ApplyDiscountRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'code' => ['required', 'string'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
