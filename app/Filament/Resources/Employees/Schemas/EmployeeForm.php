<?php

namespace App\Filament\Resources\Employees\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('fullname')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, callable $set) => $operation === 'create' ? $set('slug', str($state)->slug()) : null)
                    ->placeholder('e.g. Budi Santoso'),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->placeholder('e.g. budi-santoso'),
                TextInput::make('employee_id')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->placeholder('e.g. IM-0001'),
                TextInput::make('position')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('e.g. Web Developer'),
                DatePicker::make('join_date'),
                TextInput::make('qr_code_id')
                    ->maxLength(255)
                    ->placeholder('e.g. IM-WD-AR-008'),
                FileUpload::make('photo')
                    ->image()
                    ->disk('public')
                    ->directory('team_photos')
                    ->maxSize(4096),
            ]);
    }
}
