<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected int | string | array $columnSpan = 'full';

    protected function getColumns(): int
    {
        return 2;
    }

    protected function getStats(): array
    {
        return [];
    }
}
