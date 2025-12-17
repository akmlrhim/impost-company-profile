<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{

		$serviceName = $this->faker->unique()->words(3, true);

		return [
			'service_name' => $serviceName,
			'slug' => Str::slug($serviceName),
			'description' => $this->faker->paragraphs(1, true),
			'cover_path' => NULL,
		];
	}
}
