<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use App\Filament\Resources\ArticleResource;
use Filament\Actions;
use App\Filament\Resources\Pages\BaseCreateRecord;

class CreateArticle extends BaseCreateRecord
{
    protected static string $resource = ArticleResource::class;
}
