<?php

namespace App\Filament\Resources\EcdBeneficiaryResource\Widgets;

use App\Filament\Resources\EcdBeneficiaryResource\Pages\ListEcdBeneficiaries;
use App\Models\EcdBeneficiary;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Flowframe\Trend\Trend;

class EcdWidget extends BaseWidget {
	use InteractsWithPageTable;

	protected static ?string $pollingInterval = null;

	protected function getTablePage(): string {
		return ListEcdBeneficiaries::class;
	}

	protected function getStats(): array {

		$beneficiaryData = Trend::model(EcdBeneficiary::class)
			->between(
				start: now()->subYear(),
				end: now(),
			)
			->perYear()
			->count();

		return [

		];
	}
}
