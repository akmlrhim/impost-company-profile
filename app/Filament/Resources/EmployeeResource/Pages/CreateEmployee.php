<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource;
use Filament\Actions;
use App\Filament\Resources\Pages\BaseCreateRecord;

class CreateEmployee extends BaseCreateRecord
{
    protected static string $resource = EmployeeResource::class;
}
