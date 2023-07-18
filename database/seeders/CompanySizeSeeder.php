<?php

namespace Database\Seeders;

use App\Models\Admin\CompanySize;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanySize::factory(10)->create();
    }

}
