<?php

namespace App\Filament\Resources\StudyCases;

use App\Filament\Resources\StudyCases\Pages\CreateStudyCase;
use App\Filament\Resources\StudyCases\Pages\EditStudyCase;
use App\Filament\Resources\StudyCases\Pages\ListStudyCases;
use App\Filament\Resources\StudyCases\Schemas\StudyCaseForm;
use App\Filament\Resources\StudyCases\Tables\StudyCasesTable;
use App\Models\StudyCase;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class StudyCaseResource extends Resource
{
    protected static ?string $model = StudyCase::class;

    public static function getNavigationGroup(): string|UnitEnum|null
    {
        return 'Konten';
    }

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChartBar;

    public static function form(Schema $schema): Schema
    {
        return StudyCaseForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StudyCasesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStudyCases::route('/'),
            'create' => CreateStudyCase::route('/create'),
            'edit' => EditStudyCase::route('/{record}/edit'),
        ];
    }
}
