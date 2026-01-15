<?php

namespace Database\Factories;

use App\Models\PortfolioCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Portfolio>
 */
class PortfolioFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		$category = PortfolioCategory::inRandomOrder()->first();
		$title = $this->faker->unique()->sentence(3);

		return [
			'title' => $title,
			'slug' => Str::slug($title),
			'description' => $this->faker->paragraph(),
			'category_id' => $category ? $category->id : null,
			'cover_path' => NULL,
		];
	}
}
