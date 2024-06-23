<?php

namespace App\Filament\Resources\SchoolFeedingBeneficiaryResource\Pages;

use App\Filament\Resources\SchoolFeedingBeneficiaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSchoolFeedingBeneficiaries extends ListRecords
{
    protected static string $resource = SchoolFeedingBeneficiaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
