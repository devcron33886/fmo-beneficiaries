<?php

namespace App\Filament\Resources\FruitTreesBeneficiaryResource\Pages;

use App\Filament\Resources\FruitTreesBeneficiaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFruitTreesBeneficiaries extends ListRecords
{
    protected static string $resource = FruitTreesBeneficiaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
