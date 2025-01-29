<?php

namespace App\Enums;

enum FaqStatus : int
{
    case ACTIVE = 1;
    case DISABLE = 0;

    public function getLabel() : ?string
    {
        return match ($this){
            self::ACTIVE => 'فعال',
            self::DISABLE => 'غیر فعال'
        };
    }

    public function getColor(): ?string
    {
        return match ($this){
            self::ACTIVE => 'text-success',
            self::DISABLE => 'text-danger'
        };
    }
}
