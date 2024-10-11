<?php

namespace App\Enums;

enum FineType: string
{
    case RED_LINE = 'red_line';
    case SPEED = 'speed';

    public function toString(): string
    {
        return match ($this) {
            self::RED_LINE => "Red line",
            self::SPEED => "Speed",
        };
    }
}
