<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Copan extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];
}
