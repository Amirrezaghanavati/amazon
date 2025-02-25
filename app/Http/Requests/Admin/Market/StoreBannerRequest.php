<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title'    => ['required', 'string', 'filled', 'max:255'],
            'image'    => ['required', 'image', 'mimes:png,jpg,jpeg,gif'],
            'url'      => ['required', 'url', 'max:500'],
            'position' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
