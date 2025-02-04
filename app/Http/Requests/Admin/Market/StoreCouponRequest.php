<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class StoreCouponRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'code'             => ['required', 'string', 'filled', 'max:255'],
            'amount'           => ['required', 'numeric'],
            'amount_type'      => ['required', 'numeric', 'in:0,1'],
            'discount_ceiling' => ['required_if:amount_type,0', 'numeric', 'nullable', 'max:100', 'min:0'],
            'status'           => ['required', 'numeric', 'in:0,1'],
            'start_date'       => ['required', 'numeric'],
            'end_date'         => ['required', 'numeric'],
        ];
    }


    public function authorize(): bool
    {
        return true;
    }
}
