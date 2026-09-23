<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioCategoryResource\Pages;
use App\Models\PortfolioCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PortfolioCategoryResource extends Resource
{
	protected static ?string $model = PortfolioCategory::class;

	// protected static ?string $navigationIcon = 'heroicon-o-folder';

	// protected static ?string $navigationGroup = 'Konten';

	// protected static ?int $navigationSort = 4;

	protected static ?string $label = 'Kategori Portfolio';

	protected static ?string $pluralLabel = 'Kategori Portfolio';

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\TextInput::make('name')
					->label('Nama Kategori')
					->required()
					->maxLength(255)
					->placeholder('Nama kategori portfolio')
					->live(onBlur: true)
					->afterStateUpdated(fn($state, Forms\Set $set) => $set('slug', Str::slug($state))),
				Forms\Components\Hidden::make('slug'),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('name')
					->label('Nama')
					->searchable(),
				Tables\Columns\TextColumn::make('slug')
					->searchable(),
				Tables\Columns\TextColumn::make('created_at')
					->label('Dibuat')
					->dateTime('d M Y')
					->sortable()
					->toggleable(isToggledHiddenByDefault: true),
			])
			->actions([
				Tables\Actions\EditAction::make(),
				Tables\Actions\DeleteAction::make(),
			])
			->bulkActions([
				Tables\Actions\BulkActionGroup::make([
					Tables\Actions\DeleteBulkAction::make(),
				]),
			]);
	}

	public static function getPages(): array
	{
		return [
			'index' => Pages\ListPortfolioCategories::route('/'),
			'create' => Pages\CreatePortfolioCategory::route('/create'),
			'edit' => Pages\EditPortfolioCategory::route('/{record}/edit'),
		];
	}
}
