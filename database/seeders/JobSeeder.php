<?php

namespace Database\Seeders;

use App\Models\Admin\Job;
use App\Models\Admin\Skill;
use App\Models\Admin\Employee;
use App\Models\Admin\Language;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = Job::factory(30)->create();
        foreach($jobs as $job)
        {
            $job->skills()->attach(Skill::inRandomOrder()->first()->id);
            $job->skills()->attach(Skill::inRandomOrder()->first()->id);
            $job->skills()->attach(Skill::inRandomOrder()->first()->id);

            $job->languages()->attach(Language::inRandomOrder()->first()->id);
            $job->languages()->attach(Language::inRandomOrder()->first()->id);

            $job->employees()->attach(Employee::inRandomOrder()->first()->id);
            $job->employees()->attach(Employee::inRandomOrder()->first()->id);
            $job->employees()->attach(Employee::inRandomOrder()->first()->id);
            $job->employees()->attach(Employee::inRandomOrder()->first()->id);
            $job->employees()->attach(Employee::inRandomOrder()->first()->id);
        }
    }
}
