<?php

namespace App\Filament\Resources\Portfolios\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PortfolioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, callable $set) => $operation === 'create' ? $set('slug', str($state)->slug()) : null)
                    ->placeholder('e.g. Brand Redesign for Acme'),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->placeholder('e.g. brand-redesign-for-acme'),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->placeholder('Select a category'),
                FileUpload::make('media_path')
                    ->image()
                    ->disk('public')
                    ->directory('portfolios')
                    ->maxSize(8192),
                TextInput::make('media_type')
                    ->maxLength(255)
                    ->placeholder('e.g. Image'),
            ]);
    }
}
