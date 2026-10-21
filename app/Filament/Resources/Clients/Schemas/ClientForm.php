<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('filename')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('e.g. Acme Corp'),
                FileUpload::make('client_logo')
                    ->image()
                    ->disk('public')
                    ->directory('client_logo')
                    ->required(),
            ]);
    }
}
