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
            ['key' => 'site_name', 'value' => 'Wuzzuf'],
            ['key' => 'site_logo', 'value' => 'logo.jpg'],
            ['key' => 'site_version', 'value' => '1.0'],
        ];

        foreach ($settings as $setting)
        {
            Setting::factory(1)->create(['key' => $setting['key'], 'value' => $setting['value']]);
        }
    }
}
