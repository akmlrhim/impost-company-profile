<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\ArticleResource;
use App\Filament\Resources\CommentResource;
use App\Filament\Resources\JobVacancyResource;
use App\Filament\Resources\PortfolioResource;
use App\Filament\Resources\StudyCaseResource;
use App\Models\Article;
use App\Models\Comment;
use App\Models\JobVacancy;
use App\Models\Lead;
use App\Models\Portfolio;
use App\Models\StudyCase;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected int | string | array $columnSpan = 'full';

    protected function getColumns(): int
    {
        return 3;
    }

    protected function getStats(): array
    {
        $leadsThisMonth = Lead::whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])->count();

        $pendingComments = Comment::where('status', 'pending')->count();

        return [
            Stat::make('Artikel', Article::count())
                ->description(Article::where('status', 'published')->count() . ' published')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('success')
                ->url(ArticleResource::getUrl('index')),

            Stat::make('Leads bulan ini', $leadsThisMonth)
                ->description('Total ' . Lead::count() . ' leads')
                ->descriptionIcon('heroicon-m-user-plus')
                ->color('primary'),

            Stat::make('Komentar pending', $pendingComments)
                ->description($pendingComments > 0 ? 'Perlu ditinjau' : 'Semua sudah ditinjau')
                ->descriptionIcon('heroicon-m-chat-bubble-bottom-center-text')
                ->color($pendingComments > 0 ? 'warning' : 'success')
                ->url(CommentResource::getUrl('index', [
                    'tableFilters' => ['status' => ['value' => 'pending']],
                ])),

            Stat::make('Portfolio', Portfolio::count())
                ->description('Karya yang tampil di website')
                ->descriptionIcon('heroicon-m-photo')
                ->color('gray')
                ->url(PortfolioResource::getUrl('index')),

            Stat::make('Study Case', StudyCase::count())
                ->description('Studi kasus terpublikasi')
                ->descriptionIcon('heroicon-m-presentation-chart-line')
                ->color('gray')
                ->url(StudyCaseResource::getUrl('index')),

            Stat::make('Lowongan aktif', JobVacancy::where('status', 'open')->count())
                ->description('Dari ' . JobVacancy::count() . ' lowongan')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('gray')
                ->url(JobVacancyResource::getUrl('index')),
        ];
    }
}
