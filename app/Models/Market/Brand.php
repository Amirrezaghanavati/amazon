<?php

namespace App\Models\Market;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes, Sluggable;

    protected $fillable = ['persian_name', 'english_name', 'slug', 'logo'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source'   => 'persian_name',
                'onUpdate' => true,
            ]
        ];
    }
}
