<?php

namespace App\Enums;

enum BannerPositionEnum: int
{
    case SLIDESHOW = 0;
    case LEFT_TOP = 1;
    case LEFT_BOTTOM = 2;
    case BETWEEN_SLIDER = 3;
    case FOOTER_BANNER = 4;

    public function getLabel(): ?string
    {
        return match ($this) {
            self::SLIDESHOW => 'اسلاید شو (صفحه اصلی)',
            self::LEFT_TOP => 'کنار اسلاید شو بالا (صفحه اصلی)',
            self::LEFT_BOTTOM => 'کنار اسلاید شو پایین (صفحه اصلی)',
            self::BETWEEN_SLIDER => 'بنر تبلیغاتی بین دو اسلایدر (صفحه اصلی)',
            self::FOOTER_BANNER => 'بنر تبلیغاتی بزرگ پایین دو اسلایدر (صفحه اصلی)',
        };
    }



}
