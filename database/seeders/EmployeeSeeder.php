<?php

namespace Database\Seeders;

use App\Models\Admin\Education;
use App\Models\User;
use App\Models\Admin\Employee;
use Illuminate\Database\Seeder;
use App\Models\Admin\Experience;
use App\Models\Admin\Language;
use App\Models\Admin\Skill;
use App\Models\Admin\University;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory(10)->create(['role'=> 'employee']);

        foreach($users as $user)
        {
            $employee = Employee::factory(1)->create(['user_id' => $user->id])->first();
            Experience::factory(5)->create(['employee_id' => $employee->id]);
            Education::factory(1)->create(['employee_id' => $employee->id]);

            $employee->skills()->attach(Skill::inRandomOrder()->first()->id);
            $employee->skills()->attach(Skill::inRandomOrder()->first()->id);
            $employee->skills()->attach(Skill::inRandomOrder()->first()->id);
            $employee->skills()->attach(Skill::inRandomOrder()->first()->id);

            $employee->languages()->attach(Language::inRandomOrder()->first()->id);
            $employee->languages()->attach(Language::inRandomOrder()->first()->id);
            $employee->languages()->attach(Language::inRandomOrder()->first()->id);
        }
    }
}
