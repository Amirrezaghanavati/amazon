<?php

namespace App\Models\Content;

use App\Enums\CommentStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = ['parent_id', 'user_id', 'commentable_id', 'commentable_type', 'body', 'status'];

    protected function casts(): array
    {
        return [
            'status' => CommentStatus::class
        ];
    }

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(__CLASS__, 'parent_id');
    }

    public function scopeBlogModel(Builder $query): void
    {
        $query->where('commentable_type', 'App\Models\Content\Post');
    }

    public function scopeProductModel(Builder $query): void
    {
        $query->where('commentable_type', 'App\Models\Market\Product');
    }
}
