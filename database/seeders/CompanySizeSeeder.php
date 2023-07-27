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
        $company_sizes = [
            '1-10 Employees' => [
                'name' => '1-10 Employees',
                'range' => '1 - 10',
            ],
            '11-50 Employees' => [
                'name' => '11-50 Employees',
                'range' => '11 - 50',
            ],
            '51-200 Employees' => [
                'name' => '51-200 Employees',
                'range' => '51 - 200',
            ],
            '201-500 Employees' => [
                'name' => '201-500 Employees',
                'range' => '201 - 500',
            ],
            '501-1,000 Employees' => [
                'name' => '501-1,000 Employees',
                'range' => '501 - 1,000',
            ],
            '1,001-5,000 Employees' => [
                'name' => '1,001-5,000 Employees',
                'range' => '1,001 - 5,000',
            ],
            '5,001-10,000 Employees' => [
                'name' => '5,001-10,000 Employees',
                'range' => '5,001 - 10,000',
            ],
            '10,001-50,000 Employees' => [
                'name' => '10,001-50,000 Employees',
                'range' => '10,001 - 50,000',
            ],
            '50,000+ Employees' => [
                'name' => '50,000+ Employees',
                'range' => '50,000 or more',
            ],
        ];

        foreach ($company_sizes as $company_size)
        {
            CompanySize::factory(1)->create([
                'name' => $company_size['name'],
                'range_of_employees' => $company_size['range']
            ]);

        }
    }
}
