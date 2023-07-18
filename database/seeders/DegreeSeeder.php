<?php

namespace Database\Seeders;

use App\Models\Admin\Degree;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            "Bachelor's Degree",
            "Master's Degree",
            "Doctorate Degree",
            "High School",
            "Diploma",
            "Vocational"
        ];
        foreach ($levels as $level) {
            Degree::factory(1)->create(['name' => $level]);
        }
    }
}
