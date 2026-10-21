<?php

namespace App\Filament\Resources\StudyCases\Pages;

use App\Filament\Resources\StudyCases\StudyCaseResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditStudyCase extends EditRecord
{
    protected static string $resource = StudyCaseResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
