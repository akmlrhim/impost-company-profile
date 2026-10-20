<?php

use App\Models\Article;
use App\Models\ArticleCategory;

it('lists published articles on the article index', function () {
    $category = ArticleCategory::factory()->create();
    $article = Article::factory()->create(['category_id' => $category->id]);

    $this->get(route('articles.index'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page
            ->component('Articles/Index')
            ->has('articles.data', 1)
            ->where('articles.data.0.title', $article->title)
        );
});

it('hides draft articles from the article index', function () {
    $category = ArticleCategory::factory()->create();
    Article::factory()->create(['category_id' => $category->id]);
    Article::factory()->create(['category_id' => $category->id, 'status' => 'draft']);

    $this->get(route('articles.index'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page
            ->component('Articles/Index')
            ->has('articles.data', 1)
        );
});

it('filters articles by category', function () {
    $category = ArticleCategory::factory()->create();
    $otherCategory = ArticleCategory::factory()->create();

    Article::factory()->create(['category_id' => $category->id]);
    Article::factory()->count(3)->create(['category_id' => $otherCategory->id]);

    $this->get(route('articles.index', ['category' => $category->slug]))
        ->assertOk()
        ->assertInertia(fn ($page) => $page
            ->component('Articles/Index')
            ->where('filters.category', $category->slug)
            ->has('articles.data', 1)
        );
});

it('searches articles by title', function () {
    $category = ArticleCategory::factory()->create();
    Article::factory()->create(['category_id' => $category->id, 'title' => 'Strategi Konten Media Sosial', 'slug' => 'strategi-konten-media-sosial']);
    Article::factory()->create(['category_id' => $category->id, 'title' => 'Panduan Event Marketing', 'slug' => 'panduan-event-marketing']);

    $this->get(route('articles.index', ['search' => 'Strategi']))
        ->assertOk()
        ->assertInertia(fn ($page) => $page
            ->component('Articles/Index')
            ->where('filters.search', 'Strategi')
            ->has('articles.data', 1)
            ->where('articles.data.0.title', 'Strategi Konten Media Sosial')
        );
});

it('shows an article detail page', function () {
    $category = ArticleCategory::factory()->create();
    $article = Article::factory()->create(['category_id' => $category->id]);

    $this->get(route('articles.show', $article))
        ->assertOk()
        ->assertInertia(fn ($page) => $page
            ->component('Articles/Show')
            ->where('article.title', $article->title)
        );
});
