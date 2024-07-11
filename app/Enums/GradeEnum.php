<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum GradeEnum: string implements HasColor, HasLabel
{
    case Baby = 'baby';

    case Middle = 'middle';

    case Top = 'top';

    public function getLabel(): string
    {
        return match ($this) {
            self::Baby => 'Baby',
            self::Middle => 'Middle',
            self::Top => 'Top',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Baby => 'info',
            self::Middle => 'warning',
            self::Top => 'success',

        };
    }
}
