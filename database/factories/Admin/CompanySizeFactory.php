<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\CompanySize>
 */
class CompanySizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->paragraph(1),
            'range_of_employees' => fake()->numberBetween(1, 500) . ' - ' . fake()->numberBetween(500, 999),
        ];
    }
}
