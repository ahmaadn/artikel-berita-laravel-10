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
        User::create([
            'name' => 'admin',
            "email" => "admin@gmail.com",
            "password" => Hash::make('admin123'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'agisni',
            "email" => "agisni@gmail.com",
            "password" => Hash::make('agisni123'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'test',
            "email" => "test@gmail.com",
            "password" => Hash::make('test12345'),
            'role' => 'user'
        ]);
    }

}
