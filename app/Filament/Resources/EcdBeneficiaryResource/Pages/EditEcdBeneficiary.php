<?php

namespace App\Filament\Resources\EcdBeneficiaryResource\Pages;

use App\Filament\Resources\EcdBeneficiaryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEcdBeneficiary extends EditRecord {
	protected static string $resource = EcdBeneficiaryResource::class;

	protected function getHeaderActions(): array {
		return [
			Actions\ViewAction::make(),
			Actions\DeleteAction::make(),
		];
	}
}
