<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MvtcBeneficiaryResource\Pages;
use App\Models\MvtcBeneficiary;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MvtcBeneficiaryResource extends Resource
{
    protected static ?string $model = MvtcBeneficiary::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Beneficiary Informations')
                    ->schema(static::getBeneficiaryInformations())
                    ->columns(2),
                Forms\Components\Section::make('Beneficiary Details')
                    ->schema(static::getBeneficiaryDetails())
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('reg_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('trade')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_mode')
                    ->searchable(),
                Tables\Columns\TextColumn::make('intake')
                    ->searchable(),
                Tables\Columns\TextColumn::make('graduation_date')
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
            'index' => Pages\ListMvtcBeneficiaries::route('/'),
            'create' => Pages\CreateMvtcBeneficiary::route('/create'),
            'view' => Pages\ViewMvtcBeneficiary::route('/{record}'),
            'edit' => Pages\EditMvtcBeneficiary::route('/{record}/edit'),
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
            Forms\Components\TextInput::make('reg_number'),
            Forms\Components\TextInput::make('name')
                ->required(),
            Forms\Components\TextInput::make('gender'),
            Forms\Components\DatePicker::make('dob'),
            Forms\Components\TextInput::make('student_id_number'),
            Forms\Components\TextInput::make('student_number'),
            Forms\Components\TextInput::make('education_level'),
            Forms\Components\TextInput::make('trade'),
        ];
    }

    public static function getBeneficiaryDetails(): array
    {
        return [
            Forms\Components\TextInput::make('residence_district'),
            Forms\Components\TextInput::make('sector'),
            Forms\Components\TextInput::make('cell'),
            Forms\Components\TextInput::make('village'),
            Forms\Components\TextInput::make('payment_mode'),
            Forms\Components\TextInput::make('intake'),
            Forms\Components\TextInput::make('graduation_date'),

        ];

    }
}
