<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Leon Dragonia Lionheart',
            'username' => 'lionheartking',
            'email' => 'lionheart@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),

        ]);

        User::create([
            'name' => 'Vikir Baskerville',
            'username' => 'vikirbaskerville',
            'email' => 'baskerville@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Lucas Traumann',
            'username' => 'lucastraumann',
            'email' => 'lucastraumann@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Kang Geomma',
            'username' => 'sashimimaster',
            'email' => 'sashimimaster@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
        ]);
    }
}
