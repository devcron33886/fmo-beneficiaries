<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MicrocreditBeneficiaryResource\Pages;
use App\Models\MicrocreditBeneficiary;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MicrocreditBeneficiaryResource extends Resource
{
    protected static ?string $model = MicrocreditBeneficiary::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('vsla_name'),
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('gender'),
                Forms\Components\TextInput::make('id_number'),
                Forms\Components\TextInput::make('sector'),
                Forms\Components\TextInput::make('cell'),
                Forms\Components\TextInput::make('village'),
                Forms\Components\TextInput::make('requested_loan'),
                Forms\Components\TextInput::make('approved_loan'),
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
}
