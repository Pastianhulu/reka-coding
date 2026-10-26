<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'Master User'       => 'User',
            'Master Permission' => 'Permission',
            'Master Role'       => 'Role',
            'Master Produk'     => 'Produk',
        ];

        foreach ($permissions as $name => $jenis) {
            Permission::findOrCreate($name, 'web')->update(['jenis' => $jenis]);
        }
    }
}
