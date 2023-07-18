<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $areas = Location::where('type', 'area')->get();
        return [
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraph(),
            'requirements' => fake()->paragraph(),
            'opened_positions' => fake()->numberBetween(1, 10),
            'years_of_experience' => fake()->numberBetween(0, 10),
            'salary' => fake()->randomFloat(2, 5000, 10000),
            'job_category_id' => fake()->numberBetween(1,35),
            'job_type_id' => fake()->numberBetween(1,5),
            'company_id' => fake()->numberBetween(1,10),
            'career_level_id' => fake()->numberBetween(1,5),
            'location_id' => $areas->random()->id,
        ];
    }
}
