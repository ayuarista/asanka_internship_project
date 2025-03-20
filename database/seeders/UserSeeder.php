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
            'name' => 'Ayu Arista',
            'username' => 'ayu-arista',
            'job' => 'Software Engineer',
            'avatar' => 'https://i.pinimg.com/736x/18/c7/04/18c7042c8d8aa9c3e9d9ae862744d84e.jpg',
            'email' => 'ayu@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);

        User::factory(10)->create();
    }
}
