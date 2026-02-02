<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
    [
        'name' => 'Admin',
        'email' => 'admin@catering.test',
        'password' => bcrypt('admin123'),
        'level' => 'admin'
    ],
    [
        'name' => 'Owner',
        'email' => 'owner@catering.test',
        'password' => bcrypt('owner123'),
        'level' => 'owner'
    ],
    [
        'name' => 'Kurir',
        'email' => 'kurir@catering.test',
        'password' => bcrypt('kurir123'),
        'level' => 'kurir'
    ],
]);

    }
}
