<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|max:120|min:2',
            'description' => 'required|max:2048|min:10',
            'keywords' => 'required|max:120|min:2',
            'logo' => 'image|mimes:png,jpg,jpeg,gif',
            'icon' => 'image|mimes:png,jpg,jpeg,gif',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
