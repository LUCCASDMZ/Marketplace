<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstName' =>'Luccas',
            'lastName' => 'Duarte',
            'email' => 'lucasduarte2317@gmail.com',
            'password' => bcsqrt('1234'),
        ]);
    }
}
