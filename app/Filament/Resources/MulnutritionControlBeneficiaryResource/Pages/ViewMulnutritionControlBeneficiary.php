<?php

namespace App\Filament\Resources\MulnutritionControlBeneficiaryResource\Pages;

use App\Filament\Resources\MulnutritionControlBeneficiaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMulnutritionControlBeneficiary extends ViewRecord
{
    protected static string $resource = MulnutritionControlBeneficiaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
