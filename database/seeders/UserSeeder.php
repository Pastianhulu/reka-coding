<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            ['name' => 'Pastian Hulu', 'password' => bcrypt('admin')]
        );

        $user->syncRoles(['admin']);
        $user->syncPermissions(Permission::all());
    }
}
