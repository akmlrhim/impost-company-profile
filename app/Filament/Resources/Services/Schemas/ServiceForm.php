<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('service_name')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('e.g. Web Development'),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->placeholder('e.g. web-development'),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull()
                    ->placeholder('Describe the service…'),
                TextInput::make('category')
                    ->maxLength(255)
                    ->placeholder('e.g. Digital Marketing'),
                FileUpload::make('cover_path')
                    ->image()
                    ->disk('public')
                    ->directory('services')
                    ->maxSize(4096),
                TextInput::make('sort')
                    ->required()
                    ->integer()
                    ->minValue(0)
                    ->default(0)
                    ->placeholder('0'),
            ]);
    }
}
