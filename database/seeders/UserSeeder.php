<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userCreate = User::create([
            'name' => 'Pastian Hulu',
            'email' => 'admin@gmail.com',
            'password'  => bcrypt('admin@gmail.com')
        ]);
    }
}
