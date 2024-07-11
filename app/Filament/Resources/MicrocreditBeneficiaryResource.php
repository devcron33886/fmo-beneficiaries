<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MicrocreditBeneficiaryResource\Pages;
use App\Models\MicrocreditBeneficiary;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MicrocreditBeneficiaryResource extends Resource
{
    protected static ?string $model = MicrocreditBeneficiary::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationLabel = 'Microcredit';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Beneficiary Informations')
                    ->schema(static::getBeneficiaryInformations())
                    ->columns(2),
                Forms\Components\Section::make('Project Details')
                    ->schema(static::getBeneficiaryDetails())
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('vsla_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('requested_loan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('approved_loan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMicrocreditBeneficiaries::route('/'),
            'create' => Pages\CreateMicrocreditBeneficiary::route('/create'),
            'view' => Pages\ViewMicrocreditBeneficiary::route('/{record}'),
            'edit' => Pages\EditMicrocreditBeneficiary::route('/{record}/edit'),
        ];
    }

    public static function getBeneficiaryInformations(): array
    {
        return [
            Forms\Components\Select::make('project_id')
                ->label('Project Name')
                ->options(Project::all()->pluck('name', 'id'))
                ->searchable()
                ->native(false),
            Forms\Components\TextInput::make('vsla_name'),
            Forms\Components\TextInput::make('name')
                ->required(),
            Forms\Components\TextInput::make('gender'),
            Forms\Components\TextInput::make('id_number'),
        ];
    }

    public static function getBeneficiaryDetails(): array
    {
        return [

            Forms\Components\TextInput::make('sector'),
            Forms\Components\TextInput::make('cell'),
            Forms\Components\TextInput::make('village'),
            Forms\Components\TextInput::make('requested_loan'),
            Forms\Components\TextInput::make('approved_loan'),

        ];

    }
}
