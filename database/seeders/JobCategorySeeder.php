<?php

namespace Database\Seeders;

use App\Models\Admin\Industry;
use App\Models\Admin\JobCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // $jobCategories = [
        //     "Accounting and Finance",
        //     "Administration",
        //     "Analyst and Research",
        //     "Android",
        //     "Banking",
        //     "Business Development",
        //     "C-Level Executive/GM/Director",
        //     "Creative/Design/Art",
        //     "Customer Service and Support",
        //     "Education and Teaching",
        //     "Engineering - Construction/Civil/Architecture",
        //     "Engineering - Mechanical/Electrical",
        //     "Engineering - Oil and Gas/Energy",
        //     "Engineering - Other",
        //     "Engineering - Telecom/Technology",
        //     "Fashion",
        //     "Hospitality/Hotels/Food Services",
        //     "Human Resources",
        //     "IT and Software Development",
        //     "Installation and Maintenance/Repair",
        //     "Internships in Egypt",
        //     "Legal",
        //     "Logistics and Supply Chain",
        //     "Manufacturing and Production",
        //     "Marketing/PR/Advertising",
        //     "Purchasing/Procurement",
        //     "Quality",
        //     "R&D/Science",
        //     "Sales and Retail",
        //     "Sports and Leisure",
        //     "Startup Jobs",
        //     "Strategy and Consulting",
        //     "Tourism and Travel",
        //     "Training and Instructor",
        //     "Writing and Editorial"
        // ];


        $industry_categories = [
            "Accounting & Finance" => [
                "Accounting",
                "Auditing",
                "Finance",
                "Banking"
            ],
            "Admin & Support" => [
                "Administration",
                "Customer Service",
                "Human Resources"
            ],
            "Creative & Design" => [
                "Advertising",
                "Design",
                "Media"
            ],
            "Education" => [
                "Teaching",
                "Training",
                "Research"
            ],
            "Engineering" => [
                "Engineering",
                "Architecture",
                "Construction"
            ],
            "Healthcare" => [
                "Medicine",
                "Nursing",
                "Healthcare Administration"
            ],
            "Human Resources" => [
                "Recruiting",
                "Staffing",
                "Training"
            ],
            "Information Technology" => [
                "Software Development",
                "IT Support",
                "Networking"
            ],
            "Legal" => [
                "Law",
                "Legal Research",
                "Compliance"
            ],
            "Sales & Marketing" => [
                "Sales",
                "Marketing",
                "Public Relations"
            ],
            "Telecom & IT" => [
                "Telecommunications",
                "Networking",
                "IT Security"
            ],
            "Other" => [
                "Other"
            ]
        ];

        foreach ($industry_categories as $name => $categories) {
            $industry_element = Industry::factory(1)->create(['name' => $name])->first();

            foreach ($categories as $category) {
                JobCategory::factory(1)->create(['name' => $category, 'industry_id' => $industry_element->id]);
            }
        }
    }
}
