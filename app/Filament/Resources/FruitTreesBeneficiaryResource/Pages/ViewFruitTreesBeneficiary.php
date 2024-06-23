<?php

namespace App\Filament\Resources\FruitTreesBeneficiaryResource\Pages;

use App\Filament\Resources\FruitTreesBeneficiaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFruitTreesBeneficiary extends ViewRecord
{
    protected static string $resource = FruitTreesBeneficiaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
