<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SchoolFeedingBeneficiaryResource\Pages;
use App\Models\Project;
use App\Models\SchoolFeedingBeneficiary;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SchoolFeedingBeneficiaryResource extends Resource
{
    protected static ?string $model = SchoolFeedingBeneficiary::class;

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
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('grade')
                    ->searchable(),
                Tables\Columns\TextColumn::make('school_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('trimester')
                    ->searchable(),
                Tables\Columns\TextColumn::make('school_phone')
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSchoolFeedingBeneficiaries::route('/'),
            'create' => Pages\CreateSchoolFeedingBeneficiary::route('/create'),
            'view' => Pages\ViewSchoolFeedingBeneficiary::route('/{record}'),
            'edit' => Pages\EditSchoolFeedingBeneficiary::route('/{record}/edit'),
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
            Forms\Components\TextInput::make('grade'),
            Forms\Components\TextInput::make('gender'),
            Forms\Components\TextInput::make('school_name'),
            Forms\Components\TextInput::make('academic_year'),
            Forms\Components\TextInput::make('trimester'),
            Forms\Components\TextInput::make('school_phone')
                ->tel(),
            Forms\Components\TextInput::make('status'),
        ];
    }

    public static function getBeneficiaryDetails(): array
    {
        return [
            Forms\Components\TextInput::make('district'),
            Forms\Components\TextInput::make('sector'),
            Forms\Components\TextInput::make('cell'),
            Forms\Components\TextInput::make('village'),
            Forms\Components\TextInput::make('father_name'),
            Forms\Components\TextInput::make('mother_name'),
            Forms\Components\TextInput::make('home_phone')
                ->tel(),

        ];

    }
}
