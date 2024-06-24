<?php

namespace App\Filament\Resources\FruitTreesBeneficiaryResource\Pages;

use App\Filament\Resources\FruitTreesBeneficiaryResource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;

class CreateFruitTreesBeneficiary extends CreateRecord
{
    use HasWizard;

    protected static string $resource = FruitTreesBeneficiaryResource::class;

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
                    Section::make()->schema(FruitTreesBeneficiaryResource::getBeneficiaryInformations())->columns(),
                ]),
            Step::make('Project Details')
                ->schema([
                    Section::make()->schema(FruitTreesBeneficiaryResource::getBeneficiaryDetails())->columns(),
                ]),
        ];
    }
}
