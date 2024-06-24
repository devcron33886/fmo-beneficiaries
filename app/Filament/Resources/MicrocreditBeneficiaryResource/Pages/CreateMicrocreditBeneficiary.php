<?php

namespace App\Filament\Resources\MicrocreditBeneficiaryResource\Pages;

use App\Filament\Resources\MicrocreditBeneficiaryResource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;

class CreateMicrocreditBeneficiary extends CreateRecord
{
    use HasWizard;

    protected static string $resource = MicrocreditBeneficiaryResource::class;

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
                    Section::make()->schema(MicrocreditBeneficiaryResource::getBeneficiaryInformations())->columns(),
                ]),
            Step::make('Project Details')
                ->schema([
                    Section::make()->schema(MicrocreditBeneficiaryResource::getBeneficiaryDetails())->columns(),
                ]),
        ];
    }
}
