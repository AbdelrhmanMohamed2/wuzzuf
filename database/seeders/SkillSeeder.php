<?php

namespace Database\Seeders;

use App\Models\Admin\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $skills = [
            "HTML",
            "CSS",
            "JavaScript",
            "React",
            "Angular",
            "Vue.js",
            "Bootstrap",
            "Material Design",
            "Sass",
            "Less",
            "SCSS",
            "Git",
            "GitHub",
            "UX/UI Design",
            "Prototyping",
            "Wireframing",
            "Accessibility",
            "SEO",
            "Performance Optimization",
            "Cross-browser Compatibility",
            "Responsive Design",
            "PHP",
            "Python",
            "Java",
            "Node.js",
            "Ruby on Rails",
            ".NET",
            "MySQL",
            "PostgreSQL",
            "MongoDB",
            "SQL",
            "NoSQL",
            "RESTful APIs",
            "MVC",
            "Unit Testing",
            "Continuous Integration/Continuous Delivery (CI/CD)",
            "Deployment",
            "Security"
        ];

        foreach ($skills as $skill) {
            Skill::factory(1)->create(['name' => $skill]);
        }
    }
}
