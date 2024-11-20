<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'user_type' => 'admin'
        ]);

        User::query()->create([
            'name' => 'Jhon Doe',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123456'),
            'user_type' => 'user'
        ]);
    }
}
