<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required','filled', 'string', 'max:255'],
            'status' => ['required', 'in:0,1']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
