<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FruitTreesBeneficiaryResource\Pages;
use App\Models\FruitTreesBeneficiary;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FruitTreesBeneficiaryResource extends Resource
{
    protected static ?string $model = FruitTreesBeneficiary::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('gender'),
                Forms\Components\TextInput::make('id_number'),
                Forms\Components\TextInput::make('sector'),
                Forms\Components\TextInput::make('cell'),
                Forms\Components\TextInput::make('village'),
                Forms\Components\TextInput::make('avocado'),
                Forms\Components\TextInput::make('mangoes'),
                Forms\Components\TextInput::make('oranges'),
                Forms\Components\TextInput::make('papaya'),
                Forms\Components\TextInput::make('telephone')
                    ->tel(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telephone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('id_number'),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable()
                    ->sortable(),

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
            'index' => Pages\ListFruitTreesBeneficiaries::route('/'),
            'create' => Pages\CreateFruitTreesBeneficiary::route('/create'),
            'view' => Pages\ViewFruitTreesBeneficiary::route('/{record}'),
            'edit' => Pages\EditFruitTreesBeneficiary::route('/{record}/edit'),
        ];
    }
}
