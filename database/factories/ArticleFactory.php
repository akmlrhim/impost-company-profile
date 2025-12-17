<?php

namespace Database\Factories;

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

		return [
			'title' => $title,
			'slug' => Str::slug($title),
			'content' => fake()->paragraphs(5, true),
			'cover_path' => null,
			'excerpt' => fake()->sentence(12, true),
			'meta_title' => fake()->sentence(6, true),
			'meta_description' => fake()->sentence(20, true),
			'status' => 'draft',
		];
	}
}
