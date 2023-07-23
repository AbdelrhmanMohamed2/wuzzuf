<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            SettingSeeder::class,
            AdminSeeder::class,
            SkillSeeder::class,
            IndustrySeeder::class,
            CareerLevelSeeder::class,
            JobTypeSeeder::class,
            JobCategorySeeder::class,
            LocationSeeder::class,
            LanguageSeeder::class,
            CompanySizeSeeder::class,
            DegreeSeeder::class,
            CompanyRoleSeeder::class,
            CompanySeeder::class,
            GradeSeeder::class,
            UniversitySeeder::class,
            EmployeeSeeder::class,
            PostCategorySeeder::class,
            JobSeeder::class,
        ]);
    }
}
