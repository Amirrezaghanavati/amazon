<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMenuRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'parent_id' => ['nullable', 'numeric', 'exists:menus,id'],
            'name'      => ['required', 'string', 'max:255', 'filled'],
            'url'       => ['nullable', 'url', 'max:500'],
            'status'    => ['required', 'numeric', Rule::in(['0', '1'])],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
