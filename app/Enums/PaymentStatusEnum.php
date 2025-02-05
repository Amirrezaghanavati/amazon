<?php

namespace App\Enums;

enum PaymentStatusEnum: int
{
    case UNPAID = 0;
    case PAID = 1;
    case EXPIRED = 2;
    case RETURN = 3;

    public function getLabel(): string
    {
        return match ($this) {
            self::UNPAID => 'پرداخت نشده',
            self::PAID => 'پرداخت شده',
            self::EXPIRED => 'باطل شده',
            self::RETURN => 'برگشت داده شده',

        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::UNPAID => 'text-danger',
            self::PAID => 'text-success',
            self::EXPIRED => 'text-secondary',
            self::RETURN => 'text-warning',

        };
    }
}
