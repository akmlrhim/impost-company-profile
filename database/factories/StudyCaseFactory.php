<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudyCase>
 */
class StudyCaseFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		$name = $this->faker->sentence(3);

		return [
			'name' => $name,
			'slug' => Str::slug($name),
			'situation' => '<p>' . $this->faker->sentence(3) . '</p>',
			'solution' => '<p>' . $this->faker->sentence(3) . '</p>',
			'result' => '<p>' . $this->faker->sentence(3) . '</p>',
			'cover_path' => NULL
		];
	}
}
