<?php

namespace App\Filament\Resources\SchoolFeedingBeneficiaryResource\Pages;

use App\Filament\Resources\SchoolFeedingBeneficiaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSchoolFeedingBeneficiary extends ViewRecord
{
    protected static string $resource = SchoolFeedingBeneficiaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
