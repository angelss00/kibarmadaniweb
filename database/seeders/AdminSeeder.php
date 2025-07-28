<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Attribute;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run( ): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'angel@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            ]);
    }
}
