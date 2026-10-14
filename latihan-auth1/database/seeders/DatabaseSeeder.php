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
        // User::factory(10)->create();
        $users = [
            [
                'name' => 'riski',
                'email' => 'riski@example.com',
                'password' => Hash::make('password123'),
                'role' => 'admin'
            ],
            [
                'name' => 'adit',
                'email' => 'adit@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user'
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
