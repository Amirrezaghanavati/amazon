<?php

namespace App\Http\Requests\Admin\Market;

use App\Enums\CategoryStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateProductCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'      => ['required', 'filled', 'string', 'max:255'],
            'parent_id' => ['nullable', 'numeric', 'exists:product_categories,id'],
            'status'    => ['required', 'numeric', new Enum(CategoryStatus::class)]
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
