<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'persian_name' => ['required', 'filled', 'string', 'max:255'],
            'english_name' => ['required', 'filled', 'string', 'max:255'],
            'logo'         => ['nullable', 'image', 'mimes:png,jpg,jpeg,gif'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
