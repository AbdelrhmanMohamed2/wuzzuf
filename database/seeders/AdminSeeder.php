<?php

namespace Database\Seeders;

use App\Models\Admin\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory(10)->create(['role' => 'admin']);
        $admin = User::factory(1)->create(['role' => 'admin', 'email' => 'admin@wuzzuf.com'])->first();

        Admin::factory(1)->create(['user_id' => $admin->id]);
        foreach ($users as $user) {
            Admin::factory(1)->create(['user_id' => $user->id]);
        }
    }
}
