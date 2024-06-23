<?php

namespace App\Filament\Resources\FruitTreesBeneficiaryResource\Pages;

use App\Filament\Resources\FruitTreesBeneficiaryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFruitTreesBeneficiary extends EditRecord
{
    protected static string $resource = FruitTreesBeneficiaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
