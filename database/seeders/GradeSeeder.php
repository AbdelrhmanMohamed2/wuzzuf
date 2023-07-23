<?php

namespace Database\Seeders;

use App\Models\Admin\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = [
            'Fresh Graduate',
            'Bachelor\'s',
            'Master\'s',
            'PhD',
            'Diploma',
            'Experience',
        ];

        foreach ($grades as $grade)
        {
            Grade::factory(1)->create([
                'name' => $grade,
            ]);

        }

    }
}
