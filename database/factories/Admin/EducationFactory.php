<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Degree;
use App\Models\Admin\Grade;
use App\Models\Admin\University;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'field' => fake()->name(),
            'university_id' => University::inRandomOrder()->first()->id,
            'degree_id' => Degree::inRandomOrder()->first()->id,
            'grade_id' => Grade::inRandomOrder()->first()->id,
        ];
    }
}
