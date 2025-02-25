<?php

namespace App\Models\Market;

use App\Enums\BannerPositionEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'image', 'url', 'position'];

    protected function casts(): array
    {
        return [
            'position' => BannerPositionEnum::class
        ];
    }

    protected function scopeSlideShow(Builder $query)
    {
        $query->where('position', 0);
    }

    protected function scopeTopLeftBanner(Builder $query)
    {
        $query->where('position', 1);
    }

    protected function scopeBottomLeftBanner(Builder $query)
    {
        $query->where('position', 2);
    }

    protected function scopeMiddleBanner(Builder $query)
    {
        $query->where('position', 3);
    }

    protected function scopeFooterBanner(Builder $query)
    {
        $query->where('position', 4);
    }
}
