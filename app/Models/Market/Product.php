<?php

namespace App\Models\Market;

use App\Models\Content\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'brand_id',
        'product_category_id',
        'name',
        'description',
        'slug',
        'image',
        'tags',
        'price',
        'sold_number',
        'marketable_number',
        'weight',
        'length',
        'width',
        'height',
        'marketable',
        'status'];

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable')->chaperone();
    }
}
