<?php

namespace App\Filament\Resources\MulnutritionControlBeneficiaryResource\Pages;

use App\Filament\Resources\MulnutritionControlBeneficiaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMulnutritionControlBeneficiaries extends ListRecords
{
    protected static string $resource = MulnutritionControlBeneficiaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
