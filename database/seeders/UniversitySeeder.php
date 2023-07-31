<?php

namespace Database\Seeders;

use App\Models\Admin\University;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $universities = [
            'Harvard University',
            'Stanford University',
            'Massachusetts Institute of Technology',
            'California Institute of Technology',
            'Yale University',
            'Princeton University',
            'University of Chicago',
            'Columbia University',
            'University of Pennsylvania',
            'University of California, Berkeley',
            'University of California, Los Angeles',
            'University of Michigan',
            'Duke University',
            'University of California, San Diego',
            'University of Virginia',
            'Northwestern University',
            'Johns Hopkins University',
            'Cornell University',
            'University of California, Santa Barbara',
            'University of Southern California',
            'Cairo University',
            'Alexandria University',
            'Ain Shams University',
            'University of Mansoura',
            'University of Assiut',
            'Zagazig University',
            'Helwan University',
            'University of Tanta',
            'Banha University',
            'Suez Canal University',
            'Beni-Suef University',
            'Sohag University',
            'Minia University',
            'Assiut University',
            'South Valley University',
            'Aswan University',
            'Mansoura University',
            'Damietta University',
            'Kafr Elsheikh University',
            'Fayoum University',

        ];
        foreach ($universities as $university) {
            University::factory(1)->create(['name' => $university]);
        }
    }
}
