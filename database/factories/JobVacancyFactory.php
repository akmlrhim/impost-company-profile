<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobVacancy>
 */
class JobVacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->jobTitle();

        return [
            'title' => $title,
            'slug' => str($title)->slug().'-'.fake()->unique()->numberBetween(100, 999),
            'employment_type' => fake()->randomElement(['Full-time', 'Part-time', 'Contract', 'Internship']),
            'work_arrangements' => fake()->randomElements(['On-site', 'Hybrid', 'Remote'], 2),
            'apply_email' => fake()->companyEmail(),
            'apply_subject' => 'Lamaran '.$title,
            'duration' => fake()->optional()->randomElement(['3 bulan', '6 bulan', '12 bulan']),
            'poster' => null,
            'status' => fake()->randomElement(['open', 'closed']),
        ];
    }
}
