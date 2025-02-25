<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'address_id',
        'payment_id',
        'delivery_id',
        'coupon_id',
        'cart_id',
        'address_object',
        'payment_object',
        'delivery_object',
        'order_final_amount',
        'order_discount_amount',
        'order_total_discount_amount',
        'delivery_amount',
        'payment_type',
        'payment_status',
        'delivery_status',
        'order_status',
        'delivery_date',];

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function status(): string
    {
        return match ($this->order_status) {
            0 => 'در انتظار پرداخت',
            1 => 'در حال پردازش',
            2 => 'تحویل شده',
            3 => 'لغو شده',
            4 => 'مرجوعی',
        };
    }

    public function scopeOrderStatus(Builder $query, $status)
    {
        $query->where('order_status', $status);
    }


}
