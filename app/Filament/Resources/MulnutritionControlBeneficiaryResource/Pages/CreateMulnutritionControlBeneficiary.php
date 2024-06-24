<?php

namespace App\Filament\Resources\MulnutritionControlBeneficiaryResource\Pages;

use App\Filament\Resources\MulnutritionControlBeneficiaryResource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;

class CreateMulnutritionControlBeneficiary extends CreateRecord
{
    use HasWizard;

    protected static string $resource = MulnutritionControlBeneficiaryResource::class;

    public function form(Form $form): Form
    {
        return parent::form($form)
            ->schema([
                Wizard::make($this->getSteps())
                    ->startOnStep($this->getStartStep())
                    ->cancelAction($this->getCancelFormAction())
                    ->submitAction($this->getSubmitFormAction())
                    ->skippable($this->hasSkippableSteps())
                    ->contained(),
            ])->columns(null);
    }

    protected function getSteps(): array
    {
        return [
            Step::make('Beneficiary Informations')
                ->schema([
                    Section::make()->schema(MulnutritionControlBeneficiaryResource::getBeneficiaryInformations())->columns(),
                ]),
            Step::make('Parents Informations')
                ->schema([
                    Section::make()->schema(MulnutritionControlBeneficiaryResource::getBeneficiaryDetails())->columns(),
                ]),
        ];
    }
}
