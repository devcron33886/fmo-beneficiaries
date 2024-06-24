<?php

namespace App\Filament\Resources\MvtcBeneficiaryResource\Pages;

use App\Filament\Resources\MvtcBeneficiaryResource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;

class CreateMvtcBeneficiary extends CreateRecord
{
    use HasWizard;

    protected static string $resource = MvtcBeneficiaryResource::class;

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
                    Section::make()->schema(MvtcBeneficiaryResource::getBeneficiaryInformations())->columns(),
                ]),
            Step::make('Beneficiary Details')
                ->schema([
                    Section::make()->schema(MvtcBeneficiaryResource::getBeneficiaryDetails())->columns(),
                ]),
        ];
    }
}
