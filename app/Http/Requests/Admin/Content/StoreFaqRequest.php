<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFaqRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'question' => ['required', 'filled', 'string'],
            'answer'   => ['required', 'filled', 'string'],
            'status'   => ['required', 'integer', Rule::in(0,1)],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
