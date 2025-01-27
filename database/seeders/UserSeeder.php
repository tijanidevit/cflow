<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'user@creatorflow.pro'],
            [
                'name' => 'Mustapha',
                'password' => 'password', // Password hashed from the model (using casts)
            ]
        );
    }
}
