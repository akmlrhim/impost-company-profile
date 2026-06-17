<?php

namespace App\Filament\Resources\CommentResource\Pages;

use App\Filament\Resources\CommentResource;
use Filament\Actions;
use App\Filament\Resources\Pages\BaseCreateRecord;

class CreateComment extends BaseCreateRecord
{
    protected static string $resource = CommentResource::class;
}
