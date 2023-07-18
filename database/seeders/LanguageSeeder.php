<?php

namespace Database\Seeders;

use App\Models\Admin\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [
            [
                'name' => 'country_name_here',
                'cities' =>  [
                    'name' => 'city_name_here',
                    'areas' => [
                        'area_one',
                        'area_two',
                    ]
                ]
            ],
        ];
        $top10Languages = [
            "Chinese",
            "Spanish",
            "English",
            "Hindi",
            "Arabic",
            "Bengali",
            "Portuguese",
            "Russian",
            "Japanese",
            "French"
        ];

        foreach ($top10Languages as $language) {
            Language::factory(1)->create(['name' => $language]);
        }
    }
}
