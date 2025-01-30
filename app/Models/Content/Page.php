<?php

namespace App\Models\Content;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes, Sluggable;

    protected $fillable = ['title', 'slug', 'body'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source'   => 'title',
                'onUpdate' => true,
            ]
        ];
    }




}
