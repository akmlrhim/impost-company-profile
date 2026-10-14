<?php

use App\Models\Portfolio;
use App\Models\PortfolioCategory;

it('lists portfolios on the portfolio index', function () {
    $portfolio = Portfolio::factory()->create();

    $this->get(route('portfolio.index'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page
            ->component('Portfolio/Index')
            ->has('portfolios.data')
        );
});

it('filters portfolios by category', function () {
    $category = PortfolioCategory::factory()->create();
    $otherCategory = PortfolioCategory::factory()->create();

    $portfolio = Portfolio::factory()->create(['category_id' => $category->id]);
    Portfolio::factory()->count(3)->create(['category_id' => $otherCategory->id]);

    $this->get(route('portfolio.index', ['category' => $category->slug]))
        ->assertOk()
        ->assertInertia(fn ($page) => $page
            ->component('Portfolio/Index')
            ->where('filters.category', $category->slug)
            ->has('portfolios.data', 1)
        );
});

it('shows a portfolio detail page', function () {
    $portfolio = Portfolio::factory()->create();

    $this->get(route('portfolio.show', $portfolio))
        ->assertOk()
        ->assertInertia(fn ($page) => $page
            ->component('Portfolio/Show')
            ->where('portfolio.title', $portfolio->title)
        );
});
