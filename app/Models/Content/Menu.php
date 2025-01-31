<?php

namespace App\Models\Content;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected array $cascadeDeletes = ['children'];


    protected $fillable = ['parent_id', 'name', 'url', 'status'];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(__CLASS__, 'parent_id');
    }

    public function scopeParent(Builder $query): Builder
    {
        return $query->whereNull('parent_id');
    }
}
