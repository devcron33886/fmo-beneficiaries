<?php

namespace App\Filament\Resources\MicrocreditBeneficiaryResource\Pages;

use App\Filament\Resources\MicrocreditBeneficiaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMicrocreditBeneficiaries extends ListRecords
{
    protected static string $resource = MicrocreditBeneficiaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
