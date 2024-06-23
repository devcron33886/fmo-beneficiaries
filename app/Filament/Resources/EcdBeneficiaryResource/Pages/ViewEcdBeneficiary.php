<?php

namespace App\Filament\Resources\EcdBeneficiaryResource\Pages;

use App\Filament\Resources\EcdBeneficiaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEcdBeneficiary extends ViewRecord
{
    protected static string $resource = EcdBeneficiaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
