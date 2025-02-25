<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use SoftDeletes;

    protected $table = 'copans';


    protected $fillable = ['code', 'amount', 'discount_ceiling', 'amount_type', 'status', 'start_date', 'end_date'];

    protected function casts(): array
    {
        return [
            'start_date' => 'datetime',
            'end_date'   => 'datetime'
        ];
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }
    public function isValid(): bool
    {
        return $this->status == 1 && now()->between($this->start_date, $this->end_date);
    }


}
