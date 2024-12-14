<?php

namespace App\Enums;

enum CommentStatus: int
{
    case UNSEEN = 0;
    case SEEN = 1;
    case APPROVED = 2;

    public function getLabel(): ?string
    {
        return match ($this) {
            self::UNSEEN => 'دیده نشده',
            self::SEEN => 'دیده شده',
            self::APPROVED => 'تایید شده',
        };
    }
}
