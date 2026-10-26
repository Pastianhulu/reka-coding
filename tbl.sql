CREATE TABLE `m_pemilik` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_hapus` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) 


CREATE TABLE `m_source_code` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_pemilik` bigint unsigned NOT NULL,
  `id_kategori` bigint unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_hapus` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) 


CREATE TABLE `tbl_source_code` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT, 20
  `id_user` bigint unsigned DEFAULT NULL, 20
  `id_source_code` bigint unsigned NOT NULL, 20
  `id_kategori` bigint unsigned NOT NULL, baut 20 
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum(1) NOT NULL DEFAULT '1', -- <--- 1 = Aktif, 0 = Tidak Aktif
  `harga` int NOT NULL DEFAULT '0',
  `link_download` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_hapus` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;