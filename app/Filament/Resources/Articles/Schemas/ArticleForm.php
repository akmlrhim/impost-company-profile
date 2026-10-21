<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->placeholder('Select a category'),
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, callable $set) => $operation === 'create' ? $set('slug', str($state)->slug()) : null)
                    ->placeholder('e.g. 10 Tips Content Marketing'),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->placeholder('e.g. 10-tips-content-marketing'),
                TextInput::make('written_by')
                    ->required()
                    ->maxLength(130)
                    ->placeholder('e.g. Jane Doe'),
                Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                    ])
                    ->required()
                    ->default('draft')
                    ->placeholder('Select status'),
                FileUpload::make('cover_path')
                    ->image()
                    ->disk('public')
                    ->directory('articles')
                    ->maxSize(4096),
                Textarea::make('excerpt')
                    ->maxLength(255)
                    ->columnSpanFull()
                    ->placeholder('Short summary for cards and previews…'),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull()
                    ->placeholder('Write the article content…'),
                Section::make('SEO')
                    ->schema([
                        TextInput::make('meta_title')
                            ->maxLength(255)
                            ->placeholder('SEO title…'),
                        Textarea::make('meta_description')
                            ->maxLength(65535)
                            ->columnSpanFull()
                            ->placeholder('SEO description…'),
                    ])
                    ->collapsed()
                    ->columnSpanFull(),
            ]);
    }
}
