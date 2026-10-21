<?php

namespace App\Filament\Resources\Comments\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CommentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('article_id')
                    ->relationship('article', 'title')
                    ->disabled()
                    ->dehydrated(false),
                TextInput::make('fullname')
                    ->disabled()
                    ->dehydrated(false),
                TextInput::make('email')
                    ->disabled()
                    ->dehydrated(false),
                Textarea::make('comment')
                    ->disabled()
                    ->dehydrated(false)
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])
                    ->required()
                    ->default('pending'),
            ]);
    }
}
