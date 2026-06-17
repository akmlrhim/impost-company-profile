<?php

namespace App\Filament\Resources\StudyCaseResource\Pages;

use App\Filament\Resources\StudyCaseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStudyCases extends ListRecords
{
    protected static string $resource = StudyCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
