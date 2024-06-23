<?php

namespace App\Filament\Resources\MulnutritionControlBeneficiaryResource\Pages;

use App\Filament\Resources\MulnutritionControlBeneficiaryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMulnutritionControlBeneficiary extends EditRecord
{
    protected static string $resource = MulnutritionControlBeneficiaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
