<?php

namespace App\Filament\Widgets;

use App\Models\Lead;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class LeadsChart extends ChartWidget
{
    protected static ?int $sort = 2;

    protected static ?string $heading = 'Leads 6 bulan terakhir';

    protected static ?string $maxHeight = '260px';

    protected function getData(): array
    {
        $start = Carbon::now()->startOfMonth()->subMonths(5);

        $counts = Lead::query()
            ->where('created_at', '>=', $start)
            ->pluck('created_at')
            ->countBy(fn (Carbon $date): string => $date->format('Y-m'));

        $labels = [];
        $data = [];

        for ($month = $start->copy(); $month <= Carbon::now(); $month->addMonth()) {
            $labels[] = $month->translatedFormat('M Y');
            $data[] = $counts[$month->format('Y-m')] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Leads masuk',
                    'data' => $data,
                    'borderColor' => '#2563eb',
                    'backgroundColor' => 'rgba(37, 99, 235, 0.15)',
                    'fill' => true,
                    'tension' => 0.3,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => ['precision' => 0],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
