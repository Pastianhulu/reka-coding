<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('tbl_produk')) {
            $this->dropForeignKey('tbl_produk', 'id_source_code');

            if (Schema::hasColumn('tbl_produk', 'id_source_code')) {
                DB::statement('ALTER TABLE `tbl_produk` DROP COLUMN `id_source_code`');
            }
        }

        Schema::dropIfExists('m_source_code');

        if (Schema::hasTable('tbl_produk')) {
            if (! Schema::hasColumn('tbl_produk', 'link_github')) {
                DB::statement('ALTER TABLE `tbl_produk` ADD COLUMN `link_github` VARCHAR(255) NULL DEFAULT NULL AFTER `id_kategori`');
            }

            $this->prepareLinkDrive();
            $this->prepareStatus();
            $this->prepareIdHapus();
            $this->prepareTipe();

            if (Schema::hasColumn('tbl_produk', 'gambar')) {
                DB::statement('ALTER TABLE `tbl_produk` DROP COLUMN `gambar`');
            }

            if (Schema::hasColumn('tbl_produk', 'file_produk')) {
                DB::statement('ALTER TABLE `tbl_produk` DROP COLUMN `file_produk`');
            }

            DB::statement('ALTER TABLE `tbl_produk` MODIFY `id_kategori` BIGINT UNSIGNED NULL DEFAULT NULL');
            DB::statement('ALTER TABLE `tbl_produk` MODIFY `harga` INT UNSIGNED NULL DEFAULT NULL');
            DB::statement('UPDATE `tbl_produk` p LEFT JOIN `m_kategori` k ON k.id = p.id_kategori SET p.id_kategori = NULL WHERE p.id_kategori IS NOT NULL AND k.id IS NULL');
            DB::statement('UPDATE `tbl_produk` p LEFT JOIN `users` u ON u.id = p.id_user SET p.id_user = NULL WHERE p.id_user IS NOT NULL AND u.id IS NULL');

            $this->addIndex('tbl_produk', 'tbl_produk_id_user_index', 'id_user');
            $this->addIndex('tbl_produk', 'tbl_produk_id_kategori_index', 'id_kategori');
            $this->addIndex('tbl_produk', 'tbl_produk_status_index', 'status');
            $this->addIndex('tbl_produk', 'tbl_produk_id_hapus_index', 'id_hapus');

            $this->addForeignKey(
                'tbl_produk',
                'tbl_produk_id_user_foreign',
                'id_user',
                'users',
                'id',
                'set null'
            );

            $this->addForeignKey(
                'tbl_produk',
                'tbl_produk_id_kategori_foreign',
                'id_kategori',
                'm_kategori',
                'id',
                'set null'
            );
        }

        if (Schema::hasTable('users') && ! Schema::hasColumn('users', 'membership_until')) {
            Schema::table('users', function (Blueprint $table) {
                $table->timestamp('membership_until')->nullable()->after('password');
            });
        }

        if (Schema::hasTable('m_profil') && ! Schema::hasColumn('m_profil', 'harga_membership')) {
            Schema::table('m_profil', function (Blueprint $table) {
                $table->unsignedBigInteger('harga_membership')->nullable()->after('deskripsi');
            });
        }

        if (! Schema::hasTable('pembelian')) {
            Schema::create('pembelian', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_user');
                $table->unsignedBigInteger('id_produk');
                $table->enum('status', ['pending', 'lunas'])->default('pending');
                $table->timestamps();

                $table->index('id_user');
                $table->index('id_produk');
                $table->foreign('id_user')->references('id')->on('users')->cascadeOnDelete();
                $table->foreign('id_produk')->references('id')->on('tbl_produk')->cascadeOnDelete();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('pembelian');

        if (Schema::hasTable('m_profil') && Schema::hasColumn('m_profil', 'harga_membership')) {
            Schema::table('m_profil', function (Blueprint $table) {
                $table->dropColumn('harga_membership');
            });
        }

        if (Schema::hasTable('tbl_produk')) {
            $this->dropForeignKey('tbl_produk', 'id_user');
            $this->dropForeignKey('tbl_produk', 'id_kategori');
        }
    }

    private function prepareLinkDrive(): void
    {
        if (Schema::hasColumn('tbl_produk', 'link_drive')) {
            if (Schema::hasColumn('tbl_produk', 'link_download')) {
                DB::statement('UPDATE `tbl_produk` SET `link_drive` = COALESCE(`link_drive`, `link_download`)');
                DB::statement('ALTER TABLE `tbl_produk` DROP COLUMN `link_download`');
            }

            return;
        }

        if (Schema::hasColumn('tbl_produk', 'link_download')) {
            DB::statement('ALTER TABLE `tbl_produk` CHANGE `link_download` `link_drive` VARCHAR(255) NULL DEFAULT NULL');
        } else {
            DB::statement('ALTER TABLE `tbl_produk` ADD COLUMN `link_drive` VARCHAR(255) NULL DEFAULT NULL AFTER `link_github`');
        }
    }

    private function prepareTipe(): void
    {
        $column = $this->columnDefinition('tbl_produk', 'tipe');

        if (! $column) {
            DB::statement("ALTER TABLE `tbl_produk` ADD COLUMN `tipe` ENUM('gratis','premium') NOT NULL DEFAULT 'gratis' AFTER `id_kategori`");

            return;
        }

        if (stripos($column->COLUMN_TYPE, "enum('gratis','premium')") === false) {
            DB::statement("ALTER TABLE `tbl_produk` MODIFY `tipe` ENUM('gratis','premium') NOT NULL DEFAULT 'gratis'");
        }
    }

    private function prepareStatus(): void
    {
        $column = $this->columnDefinition('tbl_produk', 'status');

        if (! $column) {
            DB::statement("ALTER TABLE `tbl_produk` ADD COLUMN `status` ENUM('Y','T') NOT NULL DEFAULT 'T'");

            return;
        }

        if (stripos($column->COLUMN_TYPE, "enum('y','t')") === false) {
            DB::statement("ALTER TABLE `tbl_produk` MODIFY `status` VARCHAR(20) NULL DEFAULT 'T'");
            DB::statement("UPDATE `tbl_produk` SET `status` = CASE WHEN `status` IN ('1', 'Y', 'y', 'aktif', 'Aktif') THEN 'Y' ELSE 'T' END");
        }

        DB::statement("ALTER TABLE `tbl_produk` MODIFY `status` ENUM('Y','T') NOT NULL DEFAULT 'T'");
    }

    private function prepareIdHapus(): void
    {
        $column = $this->columnDefinition('tbl_produk', 'id_hapus');

        if (! $column) {
            DB::statement('ALTER TABLE `tbl_produk` ADD COLUMN `id_hapus` TIMESTAMP NULL DEFAULT NULL');

            return;
        }

        if (strtolower($column->DATA_TYPE) === 'timestamp') {
            return;
        }

        if (! Schema::hasColumn('tbl_produk', 'id_hapus_at')) {
            DB::statement('ALTER TABLE `tbl_produk` ADD COLUMN `id_hapus_at` TIMESTAMP NULL DEFAULT NULL');
        }

        DB::statement('UPDATE `tbl_produk` SET `id_hapus_at` = CASE WHEN `id_hapus` IS NULL OR `id_hapus` = 0 THEN NULL ELSE COALESCE(`updated_at`, `created_at`, NOW()) END');
        DB::statement('ALTER TABLE `tbl_produk` DROP COLUMN `id_hapus`');
        DB::statement('ALTER TABLE `tbl_produk` CHANGE `id_hapus_at` `id_hapus` TIMESTAMP NULL DEFAULT NULL');
    }

    private function columnDefinition(string $table, string $column): ?object
    {
        return DB::selectOne(
            'SELECT COLUMN_TYPE, DATA_TYPE FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ? AND COLUMN_NAME = ?',
            [$table, $column]
        );
    }

    private function dropForeignKey(string $table, string $column): void
    {
        $foreignKey = DB::selectOne(
            'SELECT CONSTRAINT_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ? AND COLUMN_NAME = ? AND REFERENCED_TABLE_NAME IS NOT NULL LIMIT 1',
            [$table, $column]
        );

        if ($foreignKey) {
            DB::statement("ALTER TABLE `{$table}` DROP FOREIGN KEY `{$foreignKey->CONSTRAINT_NAME}`");
        }
    }

    private function addIndex(string $table, string $name, string $column): void
    {
        $index = DB::selectOne(
            'SELECT INDEX_NAME FROM information_schema.STATISTICS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ? AND COLUMN_NAME = ? LIMIT 1',
            [$table, $column]
        );

        if (! $index) {
            DB::statement("ALTER TABLE `{$table}` ADD INDEX `{$name}` (`{$column}`)");
        }
    }

    private function addForeignKey(string $table, string $name, string $column, string $foreignTable, string $foreignColumn, string $onDelete): void
    {
        $foreignKey = DB::selectOne(
            'SELECT CONSTRAINT_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ? AND COLUMN_NAME = ? AND REFERENCED_TABLE_NAME IS NOT NULL LIMIT 1',
            [$table, $column]
        );

        if (! $foreignKey) {
            DB::statement("ALTER TABLE `{$table}` ADD CONSTRAINT `{$name}` FOREIGN KEY (`{$column}`) REFERENCES `{$foreignTable}` (`{$foreignColumn}`) ON DELETE ".strtoupper($onDelete));
        }
    }
};
