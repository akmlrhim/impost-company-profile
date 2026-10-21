<?php

namespace App\Filament\Resources\PortfolioCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PortfolioCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, callable $set) => $operation === 'create' ? $set('slug', str($state)->slug()) : null)
                    ->placeholder('e.g. Branding'),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->placeholder('e.g. branding'),
            ]);
    }
}
