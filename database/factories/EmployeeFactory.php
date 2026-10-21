<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fullname = fake()->unique()->name();

        return [
            'slug' => str($fullname)->slug(),
            'fullname' => $fullname,
            'employee_id' => 'IM-'.fake()->unique()->numberBetween(1000, 9999),
            'position' => fake()->randomElement(['Web Developer', 'Graphic Designer', 'Digital Marketer', 'Copywriter']),
            'photo' => null,
            'join_date' => fake()->date(),
            'qr_code_id' => null,
        ];
    }
}
