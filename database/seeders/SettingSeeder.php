<?php

namespace Database\Seeders;

use App\Models\Admin\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'Wuzzuf', 'category' => 'general'],
            ['key' => 'site_logo', 'value' => 'logo.jpg', 'category' => 'general'],
            ['key' => 'site_version', 'value' => '1.0', 'category' => 'general'],

            ['key' => 'main_title', 'value' => 'The Eassiest Way to Get Your New Job', 'category' => 'hero'],
            ['key' => 'sub_title', 'value' => 'Find Job, Employment, and Career Opportunities', 'category' => 'hero'],

            ['key' => 'main_cards', 'value' => json_encode([
                'icon' => 'fa-solid fa-earth-africa',
                'name' => 'Countries',
                'number' => '46',
            ]), 'category' => 'hero'],

            ['key' => 'main_cards', 'value' => json_encode([
                'icon' => 'fa-solid fa-users',
                'name' => 'Active Employees',
                'number' => '5000',
            ]), 'category' => 'hero'],

            ['key' => 'main_cards', 'value' => json_encode([
                'icon' => 'fa-solid fa-rectangle-list',
                'name' => 'Companies',
                'number' => '460',
            ]), 'category' => 'hero'],

            ['key' => 'sub_cards', 'value' => json_encode([
                'icon' => 'fa-solid fa-computer',
                'name' => 'Website & Software',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione, nulla.',
            ]), 'category' => 'hero'],

            ['key' => 'sub_cards', 'value' => json_encode([
                'icon' => 'fa-solid fa-school',
                'name' => 'Education & Training',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione, nulla.',
            ]), 'category' => 'hero'],

            ['key' => 'sub_cards', 'value' => json_encode([
                'icon' => 'fa-solid fa-paint-roller',
                'name' => 'Graphic & UI/UX Design',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione, nulla.',
            ]), 'category' => 'hero'],

            ['key' => 'sub_cards', 'value' => json_encode([
                'icon' => 'fa-solid fa-chart-simple',
                'name' => 'Accounting & Finance',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione, nulla.',
            ]), 'category' => 'hero'],

            ['key' => 'service', 'value' => json_encode([
                'icon' => 'fa-solid fa-chart-simple',
                'name' => 'Accounting & Finance',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione, nulla.',
            ]), 'category' => 'services'],

            ['key' => 'service', 'value' => json_encode([
                'icon' => 'fa-solid fa-paint-roller',
                'name' => 'Graphic & UI/UX Design',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione, nulla.',
            ]), 'category' => 'services'],

            ['key' => 'service', 'value' => json_encode([
                'icon' => 'fa-solid fa-chart-simple',
                'name' => 'Accounting & Finance',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione, nulla.',
            ]), 'category' => 'services'],

            ['key' => 'description', 'value' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 'category' => 'footer'],
            ['key' => 'address', 'value' => 'Egypt, Ismailia', 'category' => 'footer'],
            ['key' => 'phone', 'value' => '01095434347', 'category' => 'footer'],
            ['key' => 'email', 'value' => 'abdo.mohamed22298@mail.com', 'category' => 'footer'],
            ['key' => 'copyright', 'value' => 'Copyright ©2023 All rights reserved', 'category' => 'footer'],

            ['key' => 'social_link', 'value' => json_encode([
                'icon' => 'fa-brands fa-facebook',
                'link' => 'https://www.facebook.com/',
            ]), 'category' => 'social_links'],

            ['key' => 'social_link', 'value' => json_encode([
                'icon' => 'fa-brands fa-twitter',
                'link' => 'https://twitter.com/',
            ]), 'category' => 'social_links'],


        ];

        foreach ($settings as $setting) {
            Setting::factory(1)->create(['key' => $setting['key'], 'value' => $setting['value'], 'category' => $setting['category']]);
        }
    }
}
