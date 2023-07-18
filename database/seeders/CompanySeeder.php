<?php

namespace Database\Seeders;

use App\Models\Admin\Company;
use App\Models\Admin\CompanyRole;
use App\Models\Admin\Industry;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory(10)->create(['role' => 'company']);

        foreach ($users as $user) {
            $companies =  Company::factory(1)->create([
                'user_id' => $user->id,
                'industry_id' => Industry::inRandomOrder()->first()->id,
            ]);

            foreach ($companies as $company) {
                $company->company_roles()->attach(CompanyRole::inRandomOrder()->first()->id);
                $company->company_roles()->attach(CompanyRole::inRandomOrder()->first()->id);
                $company->company_roles()->attach(CompanyRole::inRandomOrder()->first()->id);
            }
        }
    }
}
