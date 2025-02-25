<?php

namespace App\Enums;

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
            self::FAILED => 'لغو شده',
            self::REFUND => 'مرجوعی',

        };
    }

}
