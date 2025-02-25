<?php

namespace App\Http\Requests\Home\Profile;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'city_id'     => ['required', 'exists:cities,id'],
            'address'     => ['required', 'string', 'filled'],
            'postal_code' => ['required'],
            'no'          => ['nullable', 'numeric'],
            'unit'        => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
