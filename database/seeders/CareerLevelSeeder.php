<?php

namespace Database\Seeders;

use App\Models\Admin\CareerLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CareerLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $careerLevels = [
            "Entry-level",
            "Junior",
            "Mid-level",
            "Senior",
            "Executive"
        ];

        foreach($careerLevels as $level)
        {
            CareerLevel::factory(1)->create(['name' => $level]);
        }
    }
}
