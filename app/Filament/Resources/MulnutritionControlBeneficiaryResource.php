<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MulnutritionControlBeneficiaryResource\Pages;
use App\Models\MulnutritionControlBeneficiary;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MulnutritionControlBeneficiaryResource extends Resource
{
    protected static ?string $model = MulnutritionControlBeneficiary::class;

    protected static ?string $navigationLabel = 'Malnutrition';

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Beneficiary Informations')
                    ->schema(static::getBeneficiaryInformations())
                    ->columns(2),
                Forms\Components\Section::make('Parents Informations')
                    ->schema(static::getBeneficiaryDetails())
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('age_or_months')
                    ->searchable(),
                Tables\Columns\TextColumn::make('associated_health_center')
                    ->searchable(),
                Tables\Columns\TextColumn::make('entry_muac')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('current_muac')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nutrition_status')
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
            'index' => Pages\ListMulnutritionControlBeneficiaries::route('/'),
            'create' => Pages\CreateMulnutritionControlBeneficiary::route('/create'),
            'view' => Pages\ViewMulnutritionControlBeneficiary::route('/{record}'),
            'edit' => Pages\EditMulnutritionControlBeneficiary::route('/{record}/edit'),
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
            Forms\Components\TextInput::make('name')
                ->required(),
            Forms\Components\TextInput::make('gender'),
            Forms\Components\TextInput::make('age_or_months'),
            Forms\Components\TextInput::make('associated_health_center'),
            Forms\Components\DatePicker::make('package_reception_date'),
            Forms\Components\TextInput::make('entry_muac')
                ->numeric(),
            Forms\Components\TextInput::make('current_muac')
                ->numeric(),
            Forms\Components\TextInput::make('nutrition_status'),
        ];
    }

    public static function getBeneficiaryDetails(): array
    {
        return [

            Forms\Components\TextInput::make('sector'),
            Forms\Components\TextInput::make('cell'),
            Forms\Components\TextInput::make('village'),
            Forms\Components\TextInput::make('father_name'),
            Forms\Components\TextInput::make('mother_name'),
            Forms\Components\TextInput::make('home_tel')
                ->tel(),

        ];

    }
}
