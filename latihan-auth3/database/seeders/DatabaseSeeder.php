<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'bagas',
                'email' => 'bagas@example.com',
                'password' => Hash::make('password123'),
                'role' => 'Konsumen'
            ]
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
