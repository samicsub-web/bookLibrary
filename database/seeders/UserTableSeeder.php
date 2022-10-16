<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Admin",
            'email' => "admin@admin.com",
            'role' => "admin",
            'password'=> bcrypt('password')
        ]);

        User::create([
            'name' => "User",
            'email' => "user@user.com",
            'role' => "user",
            'password'=> bcrypt('password')
        ]);
    }
}
