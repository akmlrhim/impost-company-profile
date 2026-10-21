<?php

namespace App\Filament\Resources\JobVacancies\Schemas;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class JobVacancyForm
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
                    ->placeholder('e.g. Web Developer'),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->placeholder('e.g. web-developer'),
                TextInput::make('employment_type')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Full-time / Part-time / Internship'),
                CheckboxList::make('work_arrangements')
                    ->options([
                        'On-site' => 'On-site',
                        'Hybrid' => 'Hybrid',
                        'Remote' => 'Remote',
                    ])
                    ->required()
                    ->columns(3),
                TextInput::make('duration')
                    ->maxLength(255)
                    ->placeholder('e.g. 3 months'),
                Select::make('status')
                    ->options([
                        'open' => 'Open',
                        'closed' => 'Closed',
                    ])
                    ->required()
                    ->default('open')
                    ->placeholder('Select status'),
                TextInput::make('apply_email')
                    ->required()
                    ->email()
                    ->maxLength(255)
                    ->placeholder('e.g. hr@company.com'),
                TextInput::make('apply_subject')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('e.g. Application for Web Developer'),
                FileUpload::make('poster')
                    ->image()
                    ->disk('public')
                    ->directory('job_posters')
                    ->maxSize(4096),
                Repeater::make('details')
                    ->relationship()
                    ->schema([
                        TextInput::make('section')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g. Qualifications'),
                        Textarea::make('content')
                            ->required()
                            ->columnSpanFull()
                            ->placeholder('Describe this section…'),
                        TextInput::make('sort_order')
                            ->required()
                            ->integer()
                            ->default(0)
                            ->placeholder('0'),
                    ])
                    ->columns(2)
                    ->itemLabel(fn (array $state): ?string => $state['section'] ?? null)
                    ->columnSpanFull(),
            ]);
    }
}
