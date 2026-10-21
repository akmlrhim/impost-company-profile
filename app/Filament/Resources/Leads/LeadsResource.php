<?php

namespace App\Filament\Resources\Leads;

use App\Filament\Resources\Leads\Pages\ListLeads;
use App\Filament\Resources\Leads\Pages\ViewLeads;
use App\Filament\Resources\Leads\Schemas\LeadsForm;
use App\Filament\Resources\Leads\Tables\LeadsTable;
use App\Models\Leads;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class LeadsResource extends Resource
{
    protected static ?string $model = Leads::class;

    public static function getNavigationGroup(): string|UnitEnum|null
    {
        return 'Interaksi';
    }

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEnvelope;

    public static function form(Schema $schema): Schema
    {
        return LeadsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LeadsTable::configure($table);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLeads::route('/'),
            'view' => ViewLeads::route('/{record}'),
        ];
    }
}
