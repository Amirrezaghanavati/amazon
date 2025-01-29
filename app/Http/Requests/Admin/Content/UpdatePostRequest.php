<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'filled', 'string', 'max:255'],
            'body'  => ['required', 'filled', 'string'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
