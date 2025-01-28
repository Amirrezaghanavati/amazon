<?php

namespace App\Models\Market;

use App\Enums\CategoryStatus;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use SoftDeletes, Sluggable;

    protected $fillable = ['parent_id', 'name', 'slug', 'status'];

    protected function casts(): array
    {
        return [
            'status' => CategoryStatus::class
        ];
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source'   => 'name',
                'onUpdate' => true,
            ]
        ];
    }

    // Relations
    public function parent(): BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(__CLASS__, 'parent_id');
    }

    // Methods

    public function scopeParent(Builder $query, bool $ignoreRecord = false, $id = null): void
    {
        if (!$ignoreRecord) {
            $query->whereNull('parent_id');
        }
        $query->whereNull('parent_id')->whereNot('id', $id);
    }


}
