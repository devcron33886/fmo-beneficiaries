<?php

namespace App\Filament\Resources\SchoolFeedingBeneficiaryResource\Pages;

use App\Filament\Resources\SchoolFeedingBeneficiaryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSchoolFeedingBeneficiary extends EditRecord
{
    protected static string $resource = SchoolFeedingBeneficiaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
