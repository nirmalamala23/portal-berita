<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class JournalistUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Journalist',
            'email' => 'journalist@gmail.com', // Email yang berbeda
            'password' => Hash::make('journalist123'), // Password terenkripsi
            'role' => 'journalist', // Role yang sesuai
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
