<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EcdBeneficiaryResource\Pages;
use App\Filament\Resources\EcdBeneficiaryResource\Widgets\EcdWidget;
use App\Models\EcdBeneficiary;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EcdBeneficiaryResource extends Resource
{
    protected static ?string $model = EcdBeneficiary::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Child Informations')
                    ->schema(static::getFormDetails())
                    ->columns(2),
                Forms\Components\Section::make('Parents Informations')
                    ->schema(static::getParentInformations())
                    ->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('grade')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('academic_year')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
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

    public static function getWidgets(): array
    {
        return [
            EcdWidget::class,
        ];
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
            'index' => Pages\ListEcdBeneficiaries::route('/'),
            'create' => Pages\CreateEcdBeneficiary::route('/create'),
            'view' => Pages\ViewEcdBeneficiary::route('/{record}'),
            'edit' => Pages\EditEcdBeneficiary::route('/{record}/edit'),
        ];
    }

    public static function getFormDetails(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->required(),
            Forms\Components\TextInput::make('grade')
                ->required(),
            Forms\Components\TextInput::make('gender'),
            Forms\Components\TextInput::make('academic_year')
                ->required(),
            Forms\Components\TextInput::make('home_phone')
                ->tel(),
            Forms\Components\TextInput::make('status'),
        ];
    }

    public static function getParentInformations(): array
    {
        return [

            Forms\Components\TextInput::make('father_name'),
            Forms\Components\TextInput::make('father_id')
                ->numeric(),
            Forms\Components\TextInput::make('mother_name'),

            Forms\Components\TextInput::make('sector'),
            Forms\Components\TextInput::make('cell'),
            Forms\Components\TextInput::make('village'),

        ];
    }
}
