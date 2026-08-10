<?php

namespace App\Filament\Widgets;

use App\Models\Lead;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class LatestLeads extends TableWidget
{
    protected static ?int $sort = 3;

    protected static ?string $heading = 'Leads terbaru';

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(Lead::query()->latest())
            ->paginated([5, 10, 25])
            ->defaultPaginationPageOption(5)
            ->emptyStateHeading('Belum ada leads masuk')
            ->emptyStateDescription('Leads dari form VSL akan tampil di sini.')
            ->emptyStateIcon('heroicon-o-inbox')
            ->columns([
                Tables\Columns\TextColumn::make('fullname')
                    ->label('Nama')
                    ->searchable()
                    ->weight('medium'),
                Tables\Columns\TextColumn::make('business_name')
                    ->label('Bisnis')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('No. HP')
                    ->copyable()
                    ->copyMessage('Nomor disalin'),
                Tables\Columns\TextColumn::make('income')
                    ->label('Omzet')
                    ->badge()
                    ->color('gray'),
                Tables\Columns\TextColumn::make('objective')
                    ->label('Tujuan')
                    ->limit(40)
                    ->tooltip(fn (Lead $record): ?string => $record->objective)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Masuk')
                    ->since()
                    ->sortable(),
            ]);
    }
}
