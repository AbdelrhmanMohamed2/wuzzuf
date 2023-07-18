<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Location;
use App\Models\Admin\CompanySize;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
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
            'name' => fake()->name(),
            'website'=> fake()->url(),
            'description' => fake()->paragraph(5),
            'founded_at' => fake()->date(),
            'company_size_id' => fake()->numberBetween(1,10),
            'location_id' => $areas->random()->id,
        ];
    }
}
