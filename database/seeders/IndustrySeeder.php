<?php

namespace Database\Seeders;

use App\Models\Admin\Industry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $industries = [
            "Accounting & Finance",
            "Admin & Support",
            "Creative & Design",
            "Education",
            "Engineering",
            "Healthcare",
            "Human Resources",
            "Information Technology",
            "Legal",
            "Sales & Marketing",
            "Telecom & IT",
            "Other"
        ];
        foreach ($industries as $industry) {
            Industry::factory(1)->create([
                'name' => $industry
            ]);
        }
    }
}
