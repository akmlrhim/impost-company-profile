<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Illuminate\Support\Facades\Auth;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $title = 'Dashboard';

    protected static ?string $navigationLabel = 'Dashboard';

    public function getHeading(): string
    {
        return 'Halo, ' . Auth::user()->name;
    }

    public function getSubheading(): ?string
    {
        return 'Ringkasan konten dan prospek Impostmedia.';
    }

    public function getColumns(): int | string | array
    {
        return 2;
    }
}
