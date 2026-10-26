<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();
        $permission = DB::table('permissions')->where('name', 'Master Produk')->first();

        if (! $permission) {
            $oldPermission = DB::table('permissions')->where('name', 'Master Source Code')->first();

            if ($oldPermission) {
                DB::table('permissions')->where('id', $oldPermission->id)->update([
                    'name' => 'Master Produk',
                    'jenis' => 'Produk',
                    'updated_at' => $now,
                ]);
            } else {
                DB::table('permissions')->insert([
                    'name' => 'Master Produk',
                    'guard_name' => 'web',
                    'jenis' => 'Produk',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }

            $permission = DB::table('permissions')->where('name', 'Master Produk')->first();
        }

        $adminRole = DB::table('roles')->where('name', 'admin')->first();

        if ($permission && $adminRole) {
            $exists = DB::table('role_has_permissions')
                ->where('role_id', $adminRole->id)
                ->where('permission_id', $permission->id)
                ->exists();

            if (! $exists) {
                DB::table('role_has_permissions')->insert([
                    'role_id' => $adminRole->id,
                    'permission_id' => $permission->id,
                ]);
            }
        }
    }

    public function down(): void
    {
        $permission = DB::table('permissions')->where('name', 'Master Produk')->first();

        if ($permission) {
            DB::table('permissions')->where('id', $permission->id)->update([
                'name' => 'Master Source Code',
                'jenis' => 'Produk',
                'updated_at' => now(),
            ]);
        }
    }
};
