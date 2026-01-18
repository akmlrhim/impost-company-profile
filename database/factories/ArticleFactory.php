<?php

namespace Database\Factories;

use App\Models\ArticleCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		$title = fake()->sentence(6, true);
		$categoryId = ArticleCategory::inRandomOrder()->first()->id ?? null;

		return [
			'title' => $title,
			'slug' => Str::slug($title),
			'category_id' => $categoryId,
			'content' => '<p>' . fake()->paragraphs(5, true) . '</p>',
			'cover_path' => null,
			'excerpt' => fake()->sentence(12, true),
			'meta_title' => fake()->sentence(6, true),
			'meta_description' => fake()->sentence(20, true),
			'status' => 'published',
			'written_by' => fake()->name()
		];
	}
}
