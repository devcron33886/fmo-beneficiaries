<?php

namespace App\Filament\Resources\MicrocreditBeneficiaryResource\Pages;

use App\Filament\Resources\MicrocreditBeneficiaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMicrocreditBeneficiary extends ViewRecord
{
    protected static string $resource = MicrocreditBeneficiaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
