<?php

namespace App\Filament\Resources\StudyCases\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class StudyCaseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(140)
                    ->unique(ignoreRecord: true)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, callable $set) => $operation === 'create' ? $set('slug', str($state)->slug()) : null)
                    ->placeholder('e.g. Campaign for Aurora'),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->placeholder('e.g. campaign-for-aurora'),
                FileUpload::make('cover_path')
                    ->image()
                    ->disk('public')
                    ->directory('study_cases')
                    ->maxSize(4096),
                Section::make('Detail')
                    ->schema([
                        Textarea::make('situation')
                            ->required()
                            ->columnSpanFull()
                            ->placeholder('Describe the client’s situation…'),
                        Textarea::make('solution')
                            ->required()
                            ->columnSpanFull()
                            ->placeholder('Describe the solution you delivered…'),
                        Textarea::make('result')
                            ->required()
                            ->columnSpanFull()
                            ->placeholder('Describe the results achieved…'),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
