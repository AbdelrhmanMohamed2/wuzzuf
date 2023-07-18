<?php

namespace Database\Seeders;

use App\Models\Admin\Skill;
use Illuminate\Database\Seeder;
use App\Models\Admin\CompanyRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanyRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company_roles =  CompanyRole::factory(20)->create();

        foreach($company_roles as $role)
        {
            $role->skills()->attach(Skill::inRandomOrder()->first()->id);
            $role->skills()->attach(Skill::inRandomOrder()->first()->id);
            $role->skills()->attach(Skill::inRandomOrder()->first()->id);
            $role->skills()->attach(Skill::inRandomOrder()->first()->id);
        }
    }
}
