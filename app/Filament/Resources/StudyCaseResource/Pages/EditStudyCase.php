<?php

namespace App\Filament\Resources\StudyCaseResource\Pages;

use App\Filament\Resources\StudyCaseResource;
use Filament\Actions;
use App\Filament\Resources\Pages\BaseEditRecord;

class EditStudyCase extends BaseEditRecord
{
    protected static string $resource = StudyCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
