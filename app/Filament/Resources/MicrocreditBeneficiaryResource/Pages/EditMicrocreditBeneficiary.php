<?php

namespace App\Filament\Resources\MicrocreditBeneficiaryResource\Pages;

use App\Filament\Resources\MicrocreditBeneficiaryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMicrocreditBeneficiary extends EditRecord
{
    protected static string $resource = MicrocreditBeneficiaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
