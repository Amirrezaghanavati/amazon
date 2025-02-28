<?php

namespace App\Enums;

use Illuminate\Support\Arr;

enum OrderStatusEnum: int
{
    case PENDING = 0;
    case IN_PROGRESS = 1;
    case OK = 2;
    case REFUND = 3;
    case FAILED = 4;

    public function getLabel(): string
    {
        return match ($this) {
            self::PENDING => 'در انتظار پرداخت',
            self::IN_PROGRESS => 'در حال پردازش',
            self::OK => 'تحویل شده',
            self::REFUND => 'برگشت داده شده',
            self::FAILED => 'لغو شده',
            default => 'نا معتبر',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::PENDING => 'info',
            self::IN_PROGRESS => 'warning',
            self::OK => 'success',
            self::REFUND => 'danger',
            self::FAILED => 'dark',
        };
    }

    public static function getBy(string|int|null $value): ?self
    {
        if (is_null($value)) {
            return null;
        }

        return Arr::first(self::cases(), fn($case) => $case->value == $value);
    }

}
