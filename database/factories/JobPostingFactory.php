<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobPosting>
 */
class JobPostingFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		$title = $this->faker->unique()->jobTitle();

		return [
			'title' => $title,
			'slug' => Str::slug($title),
			'description' => $this->faker->paragraphs(3, true),
			'requirements' => '<p>' . $this->faker->paragraphs(3, true) . '</p>',
			'responsibilities' => '<p>' . $this->faker->paragraphs(3, true) . '</p>',
			'type' => $this->faker->randomElement(['Full-time', 'Part-time', 'Contract']),
			'status' => $this->faker->randomElement(['Open', 'Closed']),
			'closing_date' => $this->faker->dateTimeBetween('now', '+2 months')->format('Y-m-d'),
			'apply_link' => $this->faker->unique()->url()
		];
	}
}
