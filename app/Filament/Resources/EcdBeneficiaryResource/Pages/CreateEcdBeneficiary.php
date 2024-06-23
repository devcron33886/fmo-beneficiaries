<?php

namespace App\Filament\Resources\EcdBeneficiaryResource\Pages;

use App\Filament\Resources\EcdBeneficiaryResource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;

class CreateEcdBeneficiary extends CreateRecord
{
    use HasWizard;

    protected static string $resource = EcdBeneficiaryResource::class;

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
            ])
            ->columns(null);
    }

    protected function afterCreate(): void
    {
        $child = $this->record;

        Notification::make()
            ->title('New child is registered')
            ->icon('heroicon-o-user')
            ->body("{$child->name} is registered successfully.")
            ->actions([
                Action::make('View')
                    ->url(EcdBeneficiaryResource::getUrl('edit', ['record' => $child])),
            ])
            ->color('success')
            ->sendToDatabase(auth()->user());
    }

    protected function getSteps(): array
    {
        return [

            Step::make('Child Informations')
                ->schema([
                    Section::make()->schema(EcdBeneficiaryResource::getFormDetails())->columns(),
                ]),
            Step::make('Parents Informations')
                ->schema([
                    Section::make()->schema(EcdBeneficiaryResource::getParentInformations())->columns(),
                ]),

        ];
    }
}
