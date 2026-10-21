<?php

namespace App\Filament\Resources\Leads\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LeadsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('fullname')
                    ->disabled(),
                TextInput::make('email')
                    ->disabled(),
                TextInput::make('phone')
                    ->disabled(),
                TextInput::make('business_name')
                    ->disabled(),
                TextInput::make('income')
                    ->disabled(),
                TextInput::make('objective')
                    ->disabled(),
                Textarea::make('note')
                    ->disabled()
                    ->columnSpanFull(),
            ]);
    }
}
