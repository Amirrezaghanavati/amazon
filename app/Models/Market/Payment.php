<?php

namespace App\Models\Market;

use App\Enums\PaymentStatusEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'amount', 'status', 'type', 'gateway', 'transaction_id', 'tracking_code'];

    protected function casts(): array
    {
        return [
            'status' => PaymentStatusEnum::class
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
