<?php

namespace Database\Factories;

use App\Models\JobVacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobVacancyDetail>
 */
class JobVacancyDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job_id' => JobVacancy::factory(),
            'section' => fake()->randomElement(['Tanggung Jawab', 'Kualifikasi', 'Benefit']),
            'content' => fake()->sentence(8),
            'sort_order' => fake()->numberBetween(1, 10),
        ];
    }
}
