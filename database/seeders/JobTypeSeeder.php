<?php

namespace Database\Seeders;

use App\Models\Admin\JobType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobTypes = [
            "Full-time",
            "Part-time",
            "Contract",
            "Freelance",
            "Internship"
        ];

        foreach($jobTypes as $type)
        {
            JobType::factory(1)->create(['name' => $type]);
        }
    }
}
