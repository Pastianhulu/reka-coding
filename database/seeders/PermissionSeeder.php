<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // produk
        Permission::create(['name' => 'produk.index']);
        Permission::create(['name' => 'produk.create']);
        Permission::create(['name' => 'produk.edit']);
        Permission::create(['name' => 'produk.delete']);

        // kategori
        Permission::create(['name' => 'kategori.index']);
        Permission::create(['name' => 'kategori.create']);
        Permission::create(['name' => 'kategori.edit']);
        Permission::create(['name' => 'kategori.delete']);

        // blog
        Permission::create(['name' => 'blog.index']);
        Permission::create(['name' => 'blog.create']);
        Permission::create(['name' => 'blog.edit']);
        Permission::create(['name' => 'blog.delete']);

        // pesanan
        Permission::create(['name' => 'pesanan.index']);
        Permission::create(['name' => 'pesanan.edit']);

        // membership
        Permission::create(['name' => 'membership.index']);
        Permission::create(['name' => 'membership.edit']);

        // user
        Permission::create(['name' => 'user.index']);
        Permission::create(['name' => 'user.create']);
        Permission::create(['name' => 'user.edit']);
        Permission::create(['name' => 'user.delete']);

        // role dan permission
        Permission::create(['name' => 'role.index']);
        Permission::create(['name' => 'role.create']);
        Permission::create(['name' => 'role.edit']);
        Permission::create(['name' => 'role.delete']);
        Permission::create(['name' => 'permission.index']);
    }
}