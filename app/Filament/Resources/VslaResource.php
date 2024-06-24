<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VslaResource\Pages;
use App\Models\Vsla;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class VslaResource extends Resource {
	protected static ?string $model = Vsla::class;

	protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

	public static function form(Form $form): Form {
		return $form
			->schema([
				Forms\Components\TextInput::make('code')
					->required(),
				Forms\Components\TextInput::make('name')
					->required(),
				Forms\Components\TextInput::make('represeter_name'),
				Forms\Components\TextInput::make('representer_id_number'),
				Forms\Components\TextInput::make('represnter_phone')
					->tel()
					->required(),
				Forms\Components\TextInput::make('sector')
					->required(),
				Forms\Components\TextInput::make('cell')
					->required(),
				Forms\Components\TextInput::make('village'),
				Forms\Components\TextInput::make('year_of_entry')
					->required()
					->numeric(),
			]);
	}

	public static function table(Table $table): Table {
		return $table
			->columns([
				Tables\Columns\TextColumn::make('code')
					->searchable(),
				Tables\Columns\TextColumn::make('name')
					->searchable(),
				Tables\Columns\TextColumn::make('represeter_name')
					->searchable(),

				Tables\Columns\TextColumn::make('sector')
					->sortable()
					->searchable(),

				Tables\Columns\TextColumn::make('year_of_entry')
					->numeric()
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

	public static function getRelations(): array {
		return [
			//
		];
	}

	public static function getPages(): array {
		return [
			'index' => Pages\ListVslas::route('/'),
			'create' => Pages\CreateVsla::route('/create'),
			'view' => Pages\ViewVsla::route('/{record}'),
			'edit' => Pages\EditVsla::route('/{record}/edit'),
		];
	}
}
