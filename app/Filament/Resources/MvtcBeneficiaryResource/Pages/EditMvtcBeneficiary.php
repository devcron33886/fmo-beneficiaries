<?php

namespace App\Filament\Resources\MvtcBeneficiaryResource\Pages;

use App\Filament\Resources\MvtcBeneficiaryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMvtcBeneficiary extends EditRecord
{
    protected static string $resource = MvtcBeneficiaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
