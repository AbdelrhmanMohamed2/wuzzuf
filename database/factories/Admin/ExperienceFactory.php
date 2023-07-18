<?php

namespace Database\Factories\Admin;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $from = fake()->dateTimeBetween('-1 year', 'now');
        $to = fake()->dateTimeBetween($from, '+6 months');
        $status = $to > now();
        return [
            'job_type_id' => fake()->numberBetween(1,5),
            'job_category_id' => fake()->numberBetween(1,34),
            'title' => fake()->word(),
            'company' => fake()->name(),
            'from' => $from,
            'to' => $to,
            'status' =>  $status,
        ];
    }
}
