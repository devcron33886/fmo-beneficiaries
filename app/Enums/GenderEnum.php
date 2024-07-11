<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum GenderEnum: string implements HasColor, HasLabel
{
    case Fill = '';
    case Female = 'female';
    case Male = 'male';

    public function getLabel(): string
    {
        return match ($this) {
            self::Fill => 'No gender provided',
            self::Female => 'Female',
            self::Male => 'Male',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Fill => 'danger',
            self::Female => 'info',
            self::Male => 'success',

        };
    }
}
