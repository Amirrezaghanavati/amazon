<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'brand_id'            => ['required', 'exists:brands,id'],
            'product_category_id' => ['required', 'exists:product_categories,id'],
            'name'                => ['required', 'string', 'filled', 'max:255', 'min:2'],
            'description'         => ['nullable', 'string', 'filled', 'max:2000', 'min:2'],
            'slug'                => ['nullable'],
            'image'               => ['required', 'image', 'mimes:png,jpg,jpeg,gif'],
            'tags'                => ['nullable'],
            'price'               => ['required', 'integer'],
            'marketable_number'   => ['required', 'integer'],
            'weight'              => ['nullable', 'numeric'],
            'length'              => ['nullable', 'numeric'],
            'width'               => ['nullable', 'numeric'],
            'height'              => ['nullable', 'numeric'],
            'marketable'          => ['required', 'integer', 'in:0,1'],
            'status'              => ['required', 'integer', 'in:0,1'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function attributes(): array
    {
        return [
            'product_category_id' => 'دسته بندی',
        ];
    }
}
