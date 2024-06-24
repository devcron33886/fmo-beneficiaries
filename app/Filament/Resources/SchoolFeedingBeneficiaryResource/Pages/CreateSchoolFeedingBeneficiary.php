<?php

namespace App\Filament\Resources\SchoolFeedingBeneficiaryResource\Pages;

use App\Filament\Resources\SchoolFeedingBeneficiaryResource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;

class CreateSchoolFeedingBeneficiary extends CreateRecord
{
    use HasWizard;

    protected static string $resource = SchoolFeedingBeneficiaryResource::class;

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
                    Section::make()->schema(SchoolFeedingBeneficiaryResource::getBeneficiaryInformations())->columns(),
                ]),
            Step::make('Beneficiary Details')
                ->schema([
                    Section::make()->schema(SchoolFeedingBeneficiaryResource::getBeneficiaryDetails())->columns(),
                ]),
        ];
    }
}
