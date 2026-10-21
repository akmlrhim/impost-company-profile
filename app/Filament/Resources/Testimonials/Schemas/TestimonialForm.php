<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Get;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('e.g. John Doe'),
                TextInput::make('company_name')
                    ->maxLength(255)
                    ->placeholder('e.g. Acme Corp'),
                Select::make('type')
                    ->options([
                        'text' => 'Teks',
                        'photo' => 'Foto',
                        'video' => 'Video',
                    ])
                    ->required()
                    ->default('text')
                    ->live()
                    ->placeholder('Select type'),
                Textarea::make('content')
                    ->required()
                    ->columnSpanFull()
                    ->placeholder('Write the testimonial…'),
                FileUpload::make('media_path')
                    ->label('Media')
                    ->disk('public')
                    ->directory('testimonials')
                    ->maxSize(51200)
                    ->acceptedFileTypes(fn (Get $get): array => $get('type') === 'video'
                        ? ['video/mp4', 'video/webm', 'video/quicktime']
                        : ['image/jpeg', 'image/png', 'image/webp', 'image/avif'])
                    ->visible(fn (Get $get): bool => in_array($get('type'), ['photo', 'video'])),
            ]);
    }
}
