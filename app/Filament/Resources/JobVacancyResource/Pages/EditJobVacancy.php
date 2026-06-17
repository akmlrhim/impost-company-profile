<?php

namespace App\Filament\Resources\JobVacancyResource\Pages;

use App\Filament\Resources\JobVacancyResource;
use Filament\Actions;
use App\Filament\Resources\Pages\BaseEditRecord;

class EditJobVacancy extends BaseEditRecord
{
    protected static string $resource = JobVacancyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
