<?php

namespace Database\Factories\Setting;

use App\Models\Setting\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SettingFactory extends Factory
{
    protected $model = Setting::class;

    public function definition(): array
    {
        return [
            'title' => 'page title',
            'description' => 'page description',
            'keywords' => 'keywords',
            'logo' => 'logo.png',
            'icon' => 'icon.png'
        ];
    }
}
