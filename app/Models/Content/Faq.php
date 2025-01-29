<?php

namespace App\Models\Content;

use App\Enums\FaqStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    use SoftDeletes;

//    protected function casts(): array
//    {
//        return [
//            'status' => FaqStatus::class
//        ];
//    }

    protected $fillable = ['question', 'answer', 'status'];
}
