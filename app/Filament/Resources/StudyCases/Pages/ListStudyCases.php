<?php

namespace App\Filament\Resources\StudyCases\Pages;

use App\Filament\Resources\StudyCases\StudyCaseResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStudyCases extends ListRecords
{
    protected static string $resource = StudyCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
