<?php

namespace App\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'body' => ['required', 'string', 'filled', 'max:1500']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
