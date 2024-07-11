<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum StatusEnum: string implements HasLabel
{
    case NoStatus = '';
    case Graduated = 'graduated';
    case InProgress = 'Not yet';

    public function getLabel(): string
    {
        return match ($this) {
            self::NoStatus => 'No status provided',
            self::InProgress => 'Not yet',
            self::Graduated => 'Graduated',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::NoStatus => 'danger',
            self::InProgress => 'warning',
            self::Graduated => 'success',

        };
    }
}
