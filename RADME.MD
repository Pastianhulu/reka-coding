/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : localhost:3306
 Source Schema         : dbrekac_dev

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 24/10/2026 18:54:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cache
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(0) NOT NULL,
  PRIMARY KEY (`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cache
-- ----------------------------
INSERT INTO `cache` VALUES ('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:5:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"d\";s:5:\"jenis\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:12:{i:0;a:5:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"Master User\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:4:\"User\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:1;a:5:{s:1:\"a\";i:2;s:1:\"b\";s:17:\"Master Permission\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:10:\"Permission\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:5:{s:1:\"a\";i:3;s:1:\"b\";s:11:\"Master Role\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:4:\"Role\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:3;a:5:{s:1:\"a\";i:64;s:1:\"b\";s:14:\"Halaman Publik\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:4:\"Home\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:5:{s:1:\"a\";i:65;s:1:\"b\";s:13:\"Halaman Quesr\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:5:\"Quest\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:5:{s:1:\"a\";i:66;s:1:\"b\";s:13:\"Navigasi User\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:4:\"Menu\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:5:{s:1:\"a\";i:70;s:1:\"b\";s:11:\"Master Data\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:11:\"Master Data\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:7;a:5:{s:1:\"a\";i:71;s:1:\"b\";s:15:\"Master Kategori\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:11:\"Master Data\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:8;a:5:{s:1:\"a\";i:73;s:1:\"b\";s:17:\"Master Cara Bayar\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:6:\"Master\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:5:{s:1:\"a\";i:74;s:1:\"b\";s:13:\"Master Profil\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:6:\"Master\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:5:{s:1:\"a\";i:75;s:1:\"b\";s:15:\"Navigasi Produk\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:11:\"Source Code\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:5:{s:1:\"a\";i:76;s:1:\"b\";s:13:\"Master Produk\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:11:\"Source Code\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:4:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:5:\"Quest\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:6:\"member\";s:1:\"c\";s:3:\"web\";}i:3;a:3:{s:1:\"a\";i:4;s:1:\"b\";s:11:\"Master Data\";s:1:\"c\";s:3:\"web\";}}}', 1792927464);

-- ----------------------------
-- Table structure for cache_locks
-- ----------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(0) NOT NULL,
  PRIMARY KEY (`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for job_batches
-- ----------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(0) NOT NULL,
  `pending_jobs` int(0) NOT NULL,
  `failed_jobs` int(0) NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cancelled_at` int(0) NULL DEFAULT NULL,
  `created_at` int(0) NOT NULL,
  `finished_at` int(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(0) UNSIGNED NOT NULL,
  `reserved_at` int(0) UNSIGNED NULL DEFAULT NULL,
  `available_at` int(0) UNSIGNED NOT NULL,
  `created_at` int(0) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jobs_queue_index`(`queue`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for log_activity
-- ----------------------------
DROP TABLE IF EXISTS `log_activity`;
CREATE TABLE `log_activity`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(0) UNSIGNED NULL DEFAULT NULL,
  `subject` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `method` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `log_activity_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `log_activity_created_at_index`(`created_at`) USING BTREE,
  CONSTRAINT `log_activity_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_activity
-- ----------------------------
INSERT INTO `log_activity` VALUES (4, 1, 'Tambah User w - wwwwww', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/user', 'POST', '2026-10-23 11:35:42', '2026-10-23 11:35:42');
INSERT INTO `log_activity` VALUES (5, 1, 'Tambah User pastian - pastian', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/user', 'POST', '2026-10-23 11:39:50', '2026-10-23 11:39:50');
INSERT INTO `log_activity` VALUES (6, 1, 'Tambah User pastian - pastians', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/user', 'POST', '2026-10-23 11:44:48', '2026-10-23 11:44:48');
INSERT INTO `log_activity` VALUES (7, 1, 'Tambah User ssss - sssss', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/user', 'POST', '2026-10-23 16:32:40', '2026-10-23 16:32:40');
INSERT INTO `log_activity` VALUES (8, 1, 'Hapus Data User ssss - sssss', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/user/11', 'DELETE', '2026-10-23 16:34:28', '2026-10-23 16:34:28');
INSERT INTO `log_activity` VALUES (9, 1, 'Hapus Data User s - s', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/user/7', 'DELETE', '2026-10-23 16:34:46', '2026-10-23 16:34:46');
INSERT INTO `log_activity` VALUES (10, 1, 'Hapus Data User w - wwwwww', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/user/8', 'DELETE', '2026-10-23 16:34:55', '2026-10-23 16:34:55');
INSERT INTO `log_activity` VALUES (11, 1, 'Hapus Data User RekaC - test@gmail.com', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/user/6', 'DELETE', '2026-10-23 16:35:52', '2026-10-23 16:35:52');
INSERT INTO `log_activity` VALUES (12, 1, 'Hapus Data User pastian - pastian', NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 16; Pixel 10) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Mobile Safari/537.36', 'http://127.0.0.1:8000/admin/user/9', 'DELETE', '2026-10-23 16:39:44', '2026-10-23 16:39:44');
INSERT INTO `log_activity` VALUES (13, 1, 'Hapus Data User pastian - pastians', NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 16; Pixel 10) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Mobile Safari/537.36', 'http://127.0.0.1:8000/admin/user/10', 'DELETE', '2026-10-23 16:39:54', '2026-10-23 16:39:54');
INSERT INTO `log_activity` VALUES (14, 1, 'Tambah User s - ss', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/user', 'POST', '2026-10-23 16:40:44', '2026-10-23 16:40:44');
INSERT INTO `log_activity` VALUES (15, 1, 'Hapus Data User s - ss', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/user/12', 'DELETE', '2026-10-23 16:40:47', '2026-10-23 16:40:47');
INSERT INTO `log_activity` VALUES (16, 1, 'Tambah User s - s', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/user', 'POST', '2026-10-23 16:43:07', '2026-10-23 16:43:07');
INSERT INTO `log_activity` VALUES (17, 1, 'Hapus Data User s - s', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/user/13', 'DELETE', '2026-10-23 16:43:26', '2026-10-23 16:43:26');
INSERT INTO `log_activity` VALUES (18, 1, 'Tambah User s - s', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/user', 'POST', '2026-10-23 16:43:45', '2026-10-23 16:43:45');
INSERT INTO `log_activity` VALUES (19, 1, 'Ubah Data User s - s', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/user/14', 'PUT', '2026-10-23 16:50:43', '2026-10-23 16:50:43');
INSERT INTO `log_activity` VALUES (20, 1, 'Tambah User s - ss', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/user', 'POST', '2026-10-23 16:51:05', '2026-10-23 16:51:05');
INSERT INTO `log_activity` VALUES (21, 1, 'Ubah Data User s - ss', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/user/15', 'PUT', '2026-10-23 16:52:31', '2026-10-23 16:52:31');
INSERT INTO `log_activity` VALUES (22, 1, 'Tambah User jefi jefi - 1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'http://127.0.0.1:8000/admin/user', 'POST', '2026-10-24 09:10:36', '2026-10-24 09:10:36');

-- ----------------------------
-- Table structure for m_cara_bayar
-- ----------------------------
DROP TABLE IF EXISTS `m_cara_bayar`;
CREATE TABLE `m_cara_bayar`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_rekening` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `atas_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '1',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_cara_bayar
-- ----------------------------
INSERT INTO `m_cara_bayar` VALUES (4, 'BCA', '0874883783', 'Pastian Hulu', '1', '2026-10-24 05:12:21', '2026-10-24 05:14:49');

-- ----------------------------
-- Table structure for m_kategori
-- ----------------------------
DROP TABLE IF EXISTS `m_kategori`;
CREATE TABLE `m_kategori`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_kategori
-- ----------------------------
INSERT INTO `m_kategori` VALUES (45, 'sd', '2026-10-23 19:24:42', '2026-10-23 19:24:42');

-- ----------------------------
-- Table structure for m_pemilik
-- ----------------------------
DROP TABLE IF EXISTS `m_pemilik`;
CREATE TABLE `m_pemilik`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` bigint(0) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `id_hapus` bigint(0) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_profil
-- ----------------------------
DROP TABLE IF EXISTS `m_profil`;
CREATE TABLE `m_profil`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `developer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `youtube` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tiktok` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_profil
-- ----------------------------
INSERT INTO `m_profil` VALUES (1, 'Reka Coding', 'Pastian Hulu', 'admin@gmail.com', '0821191919', 'Jalan Bilal Medan', 'https/', 's', 's', 's', NULL, NULL, '2026-10-24 08:43:14', '2026-10-24 08:45:30');

-- ----------------------------
-- Table structure for m_source_code
-- ----------------------------
DROP TABLE IF EXISTS `m_source_code`;
CREATE TABLE `m_source_code`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_pemilik` bigint(0) UNSIGNED NOT NULL,
  `id_kategori` bigint(0) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `id_hapus` bigint(0) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO `migrations` VALUES (3, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2026_10_19_072925_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (5, '2026_10_21_005319_create_log_activity_table', 2);
INSERT INTO `migrations` VALUES (6, '2026_10_21_120000_add_jenis_to_permissions_table', 3);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` bigint(0) UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(0) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------
INSERT INTO `model_has_permissions` VALUES (2, 'App\\Models\\User', 1);
INSERT INTO `model_has_permissions` VALUES (3, 'App\\Models\\User', 1);

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` bigint(0) UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(0) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 1);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 15);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 15);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 16);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_guard_name_unique`(`name`, `guard_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 72 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'Master User', 'web', 'User', '2026-10-23 09:30:33', '2026-10-23 09:30:33');
INSERT INTO `permissions` VALUES (2, 'Master Permission', 'web', 'Permission', '2026-10-21 11:40:15', '2026-10-21 11:40:15');
INSERT INTO `permissions` VALUES (3, 'Master Role', 'web', 'Role', '2026-10-21 11:40:15', '2026-10-21 11:40:15');
INSERT INTO `permissions` VALUES (64, 'Halaman Publik', 'web', 'Home', '2026-10-23 10:29:44', '2026-10-23 10:29:44');
INSERT INTO `permissions` VALUES (65, 'Halaman Quesr', 'web', 'Quest', '2026-10-23 10:30:09', '2026-10-23 10:30:09');
INSERT INTO `permissions` VALUES (66, 'Navigasi User', 'web', 'Menu', '2026-10-23 15:53:59', '2026-10-23 15:53:59');
INSERT INTO `permissions` VALUES (70, 'Master Data', 'web', 'Master Data', '2026-10-23 17:27:03', '2026-10-23 17:27:03');
INSERT INTO `permissions` VALUES (71, 'Master Kategori', 'web', 'Master Data', '2026-10-23 17:27:13', '2026-10-23 17:27:13');
INSERT INTO `permissions` VALUES (73, 'Master Cara Bayar', 'web', 'Master', '2026-10-23 20:08:10', '2026-10-23 20:08:10');
INSERT INTO `permissions` VALUES (74, 'Master Profil', 'web', 'Master', '2026-10-24 07:49:46', '2026-10-24 07:49:46');
INSERT INTO `permissions` VALUES (75, 'Navigasi Produk', 'web', 'Source Code', '2026-10-24 11:24:04', '2026-10-24 11:24:04');
INSERT INTO `permissions` VALUES (76, 'Master Produk', 'web', 'Source Code', '2026-10-24 11:24:16', '2026-10-24 11:24:16');

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint(0) UNSIGNED NOT NULL,
  `role_id` bigint(0) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES (1, 1);
INSERT INTO `role_has_permissions` VALUES (2, 1);
INSERT INTO `role_has_permissions` VALUES (3, 1);
INSERT INTO `role_has_permissions` VALUES (64, 1);
INSERT INTO `role_has_permissions` VALUES (65, 1);
INSERT INTO `role_has_permissions` VALUES (66, 1);
INSERT INTO `role_has_permissions` VALUES (70, 1);
INSERT INTO `role_has_permissions` VALUES (71, 1);
INSERT INTO `role_has_permissions` VALUES (73, 1);
INSERT INTO `role_has_permissions` VALUES (74, 1);
INSERT INTO `role_has_permissions` VALUES (75, 1);
INSERT INTO `role_has_permissions` VALUES (76, 1);
INSERT INTO `role_has_permissions` VALUES (3, 2);
INSERT INTO `role_has_permissions` VALUES (1, 3);
INSERT INTO `role_has_permissions` VALUES (70, 4);
INSERT INTO `role_has_permissions` VALUES (71, 4);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_guard_name_unique`(`name`, `guard_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'admin', 'web', '2026-10-19 21:07:54', '2026-10-19 21:07:54');
INSERT INTO `roles` VALUES (2, 'member', 'web', '2026-10-19 21:07:55', '2026-10-19 21:07:55');
INSERT INTO `roles` VALUES (3, 'Quest', 'web', '2026-10-23 10:00:17', '2026-10-23 10:03:56');
INSERT INTO `roles` VALUES (4, 'Master Data', 'web', '2026-10-23 17:27:30', '2026-10-23 17:27:30');

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(0) UNSIGNED NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sessions_user_id_index`(`user_id`) USING BTREE,
  INDEX `sessions_last_activity_index`(`last_activity`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('mKlfMITJe4WASwKN2gdLGoCpeVOYnboeIoevt4PV', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiY0ZFRElhcGhxVUw4R2ZBQ3FYdnhCNTdEUVRPdUZHaEZ6SjU4TUQzZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9yb2xlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc5Mjg0MDM5Nzt9fQ==', 1792841064);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `membership_until` timestamp(0) NULL DEFAULT NULL,
  `is_blocked` tinyint(1) NOT NULL DEFAULT 0,
  `blocked_at` timestamp(0) NULL DEFAULT NULL,
  `login_attempts` int(0) UNSIGNED NOT NULL DEFAULT 0,
  `last_login_at` timestamp(0) NULL DEFAULT NULL,
  `last_login_ip` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Pastian Hulu', 'admin@gmail.com', NULL, '$2y$12$4irJQSK6Jt5RzZgHP4J86.S262VZPRPY7MSUDE0JBtbRJkhf5BoeG', 'aktif', NULL, 0, NULL, 0, NULL, NULL, NULL, '2026-10-19 21:14:29', '2026-10-19 21:14:29', NULL);
INSERT INTO `users` VALUES (14, 's', 's', NULL, '$2y$12$uJ4dXLN/taJSTgD7BivcmuWvIVn.32Vgw0qjqX8e7mqPePKxeI8/C', 'aktif', NULL, 0, NULL, 0, NULL, NULL, NULL, '2026-10-23 16:43:45', '2026-10-23 16:43:45', NULL);
INSERT INTO `users` VALUES (15, 's', 'ss', NULL, '$2y$12$HsthR6iHu5qwlsH6fASDsOKD00zi5qXJaA4xU5djuMjyzD7z5CBMi', 'aktif', NULL, 0, NULL, 0, NULL, NULL, NULL, '2026-10-23 16:51:05', '2026-10-23 16:51:05', NULL);
INSERT INTO `users` VALUES (16, 'jefi jefi', '1', NULL, '$2y$12$PmDnBxJUFzIE9SPD7LGtR.iFbIXrxFwQSHRQQTMXg9No1wbG4sKGG', 'aktif', NULL, 0, NULL, 0, NULL, NULL, NULL, '2026-10-24 09:10:36', '2026-10-24 09:10:36', NULL);

SET FOREIGN_KEY_CHECKS = 1;
