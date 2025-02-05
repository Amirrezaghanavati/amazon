<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeliveryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'               => ['required', 'string', 'filled', 'max:255'],
            'amount'             => ['required', 'numeric'],
            'delivery_time'      => ['required', 'numeric'],
            'delivery_time_unit' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
