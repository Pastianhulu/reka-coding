-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dbrekac_dev
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('spatie.permission.cache','a:3:{s:5:\"alias\";a:5:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"d\";s:5:\"jenis\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:12:{i:0;a:5:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"Master User\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:4:\"User\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:1;a:5:{s:1:\"a\";i:2;s:1:\"b\";s:17:\"Master Permission\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:10:\"Permission\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:5:{s:1:\"a\";i:3;s:1:\"b\";s:11:\"Master Role\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:4:\"Role\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:3;a:5:{s:1:\"a\";i:64;s:1:\"b\";s:14:\"Halaman Publik\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:4:\"Home\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:5:{s:1:\"a\";i:65;s:1:\"b\";s:13:\"Halaman Quesr\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:5:\"Quest\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:5:{s:1:\"a\";i:66;s:1:\"b\";s:13:\"Navigasi User\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:4:\"Menu\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:5:{s:1:\"a\";i:70;s:1:\"b\";s:11:\"Master Data\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:11:\"Master Data\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:7;a:5:{s:1:\"a\";i:71;s:1:\"b\";s:15:\"Master Kategori\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:11:\"Master Data\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:8;a:5:{s:1:\"a\";i:73;s:1:\"b\";s:17:\"Master Cara Bayar\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:6:\"Master\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:5:{s:1:\"a\";i:74;s:1:\"b\";s:13:\"Master Profil\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:6:\"Master\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:5:{s:1:\"a\";i:75;s:1:\"b\";s:15:\"Navigasi Produk\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:11:\"Source Code\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:5:{s:1:\"a\";i:76;s:1:\"b\";s:18:\"Master Source Code\";s:1:\"c\";s:3:\"web\";s:1:\"d\";s:11:\"Source Code\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:4:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:5:\"Quest\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:6:\"member\";s:1:\"c\";s:3:\"web\";}i:3;a:3:{s:1:\"a\";i:4;s:1:\"b\";s:11:\"Master Data\";s:1:\"c\";s:3:\"web\";}}}',1793035078);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_activity`
--

DROP TABLE IF EXISTS `log_activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_activity` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `subject` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `log_activity_user_id_foreign` (`user_id`),
  KEY `log_activity_created_at_index` (`created_at`),
  CONSTRAINT `log_activity_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_activity`
--

LOCK TABLES `log_activity` WRITE;
/*!40000 ALTER TABLE `log_activity` DISABLE KEYS */;
INSERT INTO `log_activity` VALUES (4,1,'Tambah User w - wwwwww',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','http://127.0.0.1:8000/admin/user','POST','2026-10-23 04:35:42','2026-10-23 04:35:42'),(5,1,'Tambah User pastian - pastian',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','http://127.0.0.1:8000/admin/user','POST','2026-10-23 04:39:50','2026-10-23 04:39:50'),(6,1,'Tambah User pastian - pastians',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','http://127.0.0.1:8000/admin/user','POST','2026-10-23 04:44:48','2026-10-23 04:44:48'),(7,1,'Tambah User ssss - sssss',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','http://127.0.0.1:8000/admin/user','POST','2026-10-23 09:32:40','2026-10-23 09:32:40'),(8,1,'Hapus Data User ssss - sssss',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','http://127.0.0.1:8000/admin/user/11','DELETE','2026-10-23 09:34:28','2026-10-23 09:34:28'),(9,1,'Hapus Data User s - s',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','http://127.0.0.1:8000/admin/user/7','DELETE','2026-10-23 09:34:46','2026-10-23 09:34:46'),(10,1,'Hapus Data User w - wwwwww',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','http://127.0.0.1:8000/admin/user/8','DELETE','2026-10-23 09:34:55','2026-10-23 09:34:55'),(11,1,'Hapus Data User RekaC - test@gmail.com',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','http://127.0.0.1:8000/admin/user/6','DELETE','2026-10-23 09:35:52','2026-10-23 09:35:52'),(12,1,'Hapus Data User pastian - pastian',NULL,'127.0.0.1','Mozilla/5.0 (Linux; Android 16; Pixel 10) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Mobile Safari/537.36','http://127.0.0.1:8000/admin/user/9','DELETE','2026-10-23 09:39:44','2026-10-23 09:39:44'),(13,1,'Hapus Data User pastian - pastians',NULL,'127.0.0.1','Mozilla/5.0 (Linux; Android 16; Pixel 10) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Mobile Safari/537.36','http://127.0.0.1:8000/admin/user/10','DELETE','2026-10-23 09:39:54','2026-10-23 09:39:54'),(14,1,'Tambah User s - ss',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','http://127.0.0.1:8000/admin/user','POST','2026-10-23 09:40:44','2026-10-23 09:40:44'),(15,1,'Hapus Data User s - ss',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','http://127.0.0.1:8000/admin/user/12','DELETE','2026-10-23 09:40:47','2026-10-23 09:40:47'),(16,1,'Tambah User s - s',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','http://127.0.0.1:8000/admin/user','POST','2026-10-23 09:43:07','2026-10-23 09:43:07'),(17,1,'Hapus Data User s - s',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','http://127.0.0.1:8000/admin/user/13','DELETE','2026-10-23 09:43:26','2026-10-23 09:43:26'),(18,1,'Tambah User s - s',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','http://127.0.0.1:8000/admin/user','POST','2026-10-23 09:43:45','2026-10-23 09:43:45'),(19,1,'Ubah Data User s - s',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','http://127.0.0.1:8000/admin/user/14','PUT','2026-10-23 09:50:43','2026-10-23 09:50:43'),(20,1,'Tambah User s - ss',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','http://127.0.0.1:8000/admin/user','POST','2026-10-23 09:51:05','2026-10-23 09:51:05'),(21,1,'Ubah Data User s - ss',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','http://127.0.0.1:8000/admin/user/15','PUT','2026-10-23 09:52:31','2026-10-23 09:52:31'),(22,1,'Tambah User jefi jefi - 1',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','http://127.0.0.1:8000/admin/user','POST','2026-10-24 02:10:36','2026-10-24 02:10:36');
/*!40000 ALTER TABLE `log_activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_cara_bayar`
--

DROP TABLE IF EXISTS `m_cara_bayar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_cara_bayar` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_rekening` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `atas_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_cara_bayar`
--

LOCK TABLES `m_cara_bayar` WRITE;
/*!40000 ALTER TABLE `m_cara_bayar` DISABLE KEYS */;
INSERT INTO `m_cara_bayar` VALUES (4,'BCA','0874883783','Pastian Hulu','1','2026-10-23 22:12:21','2026-10-23 22:14:49');
/*!40000 ALTER TABLE `m_cara_bayar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_kategori`
--

DROP TABLE IF EXISTS `m_kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_kategori` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_kategori`
--

LOCK TABLES `m_kategori` WRITE;
/*!40000 ALTER TABLE `m_kategori` DISABLE KEYS */;
INSERT INTO `m_kategori` VALUES (45,'PHP','2026-10-23 12:24:42','2026-10-25 01:27:33'),(48,'Laravel','2026-10-25 01:27:42','2026-10-25 01:27:42'),(49,'Boostrap','2026-10-25 01:27:55','2026-10-25 01:27:55'),(50,'JavaScript','2026-10-25 01:28:32','2026-10-25 01:28:32'),(51,'Python','2026-10-25 01:28:42','2026-10-25 01:28:42'),(52,'Java','2026-10-25 01:28:46','2026-10-25 01:28:46'),(53,'HTML','2026-10-25 01:28:51','2026-10-25 01:28:51'),(54,'Kotlin','2026-10-25 01:29:01','2026-10-25 01:29:01'),(55,'Ruby','2026-10-25 01:29:06','2026-10-25 01:29:06'),(56,'CodeIgniter','2026-10-25 01:29:11','2026-10-25 01:29:11'),(57,'Node','2026-10-25 01:29:23','2026-10-25 01:29:23'),(58,'Vue','2026-10-25 01:29:28','2026-10-25 01:29:28');
/*!40000 ALTER TABLE `m_kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_profil`
--

DROP TABLE IF EXISTS `m_profil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_profil` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `developer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_profil`
--

LOCK TABLES `m_profil` WRITE;
/*!40000 ALTER TABLE `m_profil` DISABLE KEYS */;
INSERT INTO `m_profil` VALUES (1,'Reka Coding','Pastian Hulu','admin@gmail.com','0821191919','Jalan Bilal Medan','https/','s','s','s',NULL,NULL,'2026-10-24 01:43:14','2026-10-24 01:45:30');
/*!40000 ALTER TABLE `m_profil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_source_code`
--

DROP TABLE IF EXISTS `m_source_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `m_source_code` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_source_code`
--

LOCK TABLES `m_source_code` WRITE;
/*!40000 ALTER TABLE `m_source_code` DISABLE KEYS */;
INSERT INTO `m_source_code` VALUES (1,'PastianDD','2026-10-24 11:54:42','2026-10-24 11:54:42'),(2,'TEST','2026-10-24 11:54:52','2026-10-24 11:54:52'),(3,'s','2026-10-24 11:59:49','2026-10-24 11:59:49'),(4,'Pastian','2026-10-24 11:59:52','2026-10-24 12:12:31'),(5,'jefika','2026-10-25 01:43:25','2026-10-25 01:43:25'),(6,'PASTIAN','2026-10-25 08:15:37','2026-10-25 08:15:37'),(7,'PASTIAN','2026-10-25 08:15:44','2026-10-25 08:15:44');
/*!40000 ALTER TABLE `m_source_code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_10_19_072925_create_permission_tables',1),(5,'2026_10_21_005319_create_log_activity_table',2),(6,'2026_10_21_120000_add_jenis_to_permissions_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
INSERT INTO `model_has_permissions` VALUES (2,'App\\Models\\User',1),(3,'App\\Models\\User',1);
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',15),(3,'App\\Models\\User',15),(2,'App\\Models\\User',16);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'Master User','web','User','2026-10-23 02:30:33','2026-10-23 02:30:33'),(2,'Master Permission','web','Permission','2026-10-21 04:40:15','2026-10-21 04:40:15'),(3,'Master Role','web','Role','2026-10-21 04:40:15','2026-10-21 04:40:15'),(64,'Halaman Publik','web','Home','2026-10-23 03:29:44','2026-10-23 03:29:44'),(65,'Halaman Quesr','web','Quest','2026-10-23 03:30:09','2026-10-23 03:30:09'),(66,'Navigasi User','web','Menu','2026-10-23 08:53:59','2026-10-23 08:53:59'),(70,'Master Data','web','Master Data','2026-10-23 10:27:03','2026-10-23 10:27:03'),(71,'Master Kategori','web','Master Data','2026-10-23 10:27:13','2026-10-23 10:27:13'),(73,'Master Cara Bayar','web','Master','2026-10-23 13:08:10','2026-10-23 13:08:10'),(74,'Master Profil','web','Master','2026-10-24 00:49:46','2026-10-24 00:49:46'),(75,'Navigasi Produk','web','Source Code','2026-10-24 04:24:04','2026-10-24 04:24:04'),(76,'Master Source Code','web','Source Code','2026-10-24 04:24:16','2026-10-24 05:45:06');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(64,1),(65,1),(66,1),(70,1),(71,1),(73,1),(74,1),(75,1),(76,1),(3,2),(1,3),(70,4),(71,4);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','web','2026-10-19 14:07:54','2026-10-19 14:07:54'),(2,'member','web','2026-10-19 14:07:55','2026-10-19 14:07:55'),(3,'Quest','web','2026-10-23 03:00:17','2026-10-23 03:03:56'),(4,'Master Data','web','2026-10-23 10:27:30','2026-10-23 10:27:30');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('9KXpIXF8acurXdxkjKh2rNJlg3kuMWiF8DL490Ad',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiOVFGOXdSaUozeFBxUndIZTlBMUs4bkFkR0FVcGZ3OUduQVNjZFB4NCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzkyOTUzMjA4O319',1792956439),('HoCCszyp7DxWlXyzHOLzLqzmJkizqlUPWB8fLJVW',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNHJ3U1FFeU5IQ2ViR25VSlJxSXBpbVR3WDBFMEVzVnQwMWtxVWdUZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTg6ImZsYXNoZXI6OmVudmVsb3BlcyI7YTowOnt9fQ==',1792941739),('Sz6EgDbRefh1HQrnptrE66mEgl6RSDyAYCLwzOla',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','YTo3OntzOjY6Il90b2tlbiI7czo0MDoiWjgwZ0FFeUtBS2QzQm5YNzNSS1BPNk15c2NGTzZkZEt3bkZ3dzk5SCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ4OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vc291cmNlLWNvZGUvNy9wcm9kdWsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE4OiJmbGFzaGVyOjplbnZlbG9wZXMiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzkyOTQ4Njc4O319',1792948678),('VfaiXXaHmzqM5i1pW1qNHtyyqSUFgnUY5bCN8UoJ',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','YTo3OntzOjY6Il90b2tlbiI7czo0MDoiTVF0Wjlpbno5WHZmbVFMdDlEblJmVEswVDNYaVhKRndlZlFrejd0MCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ4OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vc291cmNlLWNvZGUvNy9wcm9kdWsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE4OiJmbGFzaGVyOjplbnZlbG9wZXMiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzkyOTQxMzc5O319',1792941379),('zpazZwveUGFzegWjdVbdp6CfVyYA9snu0ONkQ3C1',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNTl4cXo1U3RUM0g5RHVVcXBmb0ViVFZIb1ZNS2lTTVY0R1Q3UHVNdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWdpc3RlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTg6ImZsYXNoZXI6OmVudmVsb3BlcyI7YTowOnt9fQ==',1792918063);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_produk`
--

DROP TABLE IF EXISTS `tbl_produk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_produk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint unsigned DEFAULT NULL,
  `id_source_code` bigint unsigned NOT NULL,
  `id_kategori` bigint unsigned NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `harga` int NOT NULL DEFAULT '0',
  `tipe` enum('gratis','premium') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'premium',
  `link_download` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_github` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_produk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_hapus` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_unique` (`slug`),
  KEY `tbl_source_code_id_source_code_foreign` (`id_source_code`),
  CONSTRAINT `tbl_source_code_id_source_code_foreign` FOREIGN KEY (`id_source_code`) REFERENCES `m_source_code` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_produk`
--

LOCK TABLES `tbl_produk` WRITE;
/*!40000 ALTER TABLE `tbl_produk` DISABLE KEYS */;
INSERT INTO `tbl_produk` VALUES (1,1,4,0,'te','te','e',NULL,NULL,NULL,0,'premium','e',NULL,NULL,1,'2026-10-24 12:35:50','2026-10-25 01:17:42'),(2,1,4,45,'a','a','s','1792874455_LOGO EDIT.jpg',NULL,1,0,'premium','te',NULL,'produk/zip/AfI57nGSBu4j8kS2MHBywKSPLdu8y53rzeKHZzPU.zip',1,'2026-10-24 13:40:55','2026-10-25 01:17:02'),(3,1,4,45,'q','q','q',NULL,NULL,1,0,'premium','q',NULL,NULL,1,'2026-10-25 00:01:15','2026-10-25 01:17:06'),(4,1,4,45,'Absensi siswa berbasis qrcode mengguanakan laravel','absensi-siswa-berbasis-qrcode-mengguanakan-laravel','d',NULL,NULL,0,1000000,'premium','https://laravel.io/forum/multiple-upload-images-in-laravel',NULL,NULL,1,'2026-10-25 00:54:10','2026-10-25 01:18:16'),(5,1,4,45,'d','d','d','1792914890_Dokumentasi_Hak_Akses_hal-4.jpg',NULL,1,0,'premium','d',NULL,NULL,1,'2026-10-25 00:54:50','2026-10-25 01:17:11'),(6,1,4,45,'w','w','w','1792915276_Dokumentasi_Hak_Akses_hal-2.jpg',NULL,1,0,'premium',NULL,NULL,'produk/zip/2Apfu4hNWNWhP007bkMvbc2AhucYqCPFTZqgL11t.zip',1,'2026-10-25 01:01:16','2026-10-25 01:18:22'),(7,1,4,45,'s','s','s','1792916172_Dokumentasi_Hak_Akses_hal-4.jpg',NULL,1,0,'premium','s',NULL,NULL,1,'2026-10-25 01:16:12','2026-10-25 01:18:27');
/*!40000 ALTER TABLE `tbl_produk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_produk_gambar`
--

DROP TABLE IF EXISTS `tbl_produk_gambar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_produk_gambar` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_produk` bigint unsigned NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_produk_gambar_id_produk_foreign` (`id_produk`),
  CONSTRAINT `tbl_produk_gambar_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `tbl_produk` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_produk_gambar`
--

LOCK TABLES `tbl_produk_gambar` WRITE;
/*!40000 ALTER TABLE `tbl_produk_gambar` DISABLE KEYS */;
INSERT INTO `tbl_produk_gambar` VALUES (1,2,'1792874455_6add17d7a90b3_LOGO EDIT.jpg',1,'2026-10-24 13:40:55','2026-10-24 13:40:55'),(11,4,'1792914867_6addb5b36ae51_apple-touch-icon-removebg-preview.png',1,'2026-10-25 00:54:27','2026-10-25 00:54:27'),(12,4,'1792914867_6addb5b36c38f_Dokumentasi_Hak_Akses_hal-5.jpg',2,'2026-10-25 00:54:27','2026-10-25 00:54:27'),(13,4,'1792914867_6addb5b36d150_Dokumentasi_Hak_Akses_hal-4.jpg',3,'2026-10-25 00:54:27','2026-10-25 00:54:27'),(14,4,'1792914867_6addb5b36df5a_Dokumentasi_Hak_Akses_hal-2.jpg',4,'2026-10-25 00:54:27','2026-10-25 00:54:27'),(18,6,'1792915577_6addb879c5be3_Dokumentasi_Hak_Akses_hal-5.jpg',1,'2026-10-25 01:06:17','2026-10-25 01:06:17'),(22,6,'1792915577_6addb879cd7a0_Dokumentasi_Hak_Akses_hal-1.jpg',5,'2026-10-25 01:06:17','2026-10-25 01:06:17'),(23,7,'1792916172_6addbacc90e47_apple-touch-icon-removebg-preview.png',1,'2026-10-25 01:16:12','2026-10-25 01:16:12'),(24,7,'1792916172_6addbacc91d6c_Dokumentasi_Hak_Akses_hal-5.jpg',2,'2026-10-25 01:16:12','2026-10-25 01:16:12'),(25,7,'1792916172_6addbacc931a0_Dokumentasi_Hak_Akses_hal-4.jpg',3,'2026-10-25 01:16:12','2026-10-25 01:16:12'),(26,7,'1792916172_6addbacc93ed7_Dokumentasi_Hak_Akses_hal-2.jpg',4,'2026-10-25 01:16:12','2026-10-25 01:16:12'),(27,7,'1792916172_6addbacc94c6e_Dokumentasi_Hak_Akses_hal-3.jpg',5,'2026-10-25 01:16:12','2026-10-25 01:16:12');
/*!40000 ALTER TABLE `tbl_produk_gambar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `membership_until` timestamp NULL DEFAULT NULL,
  `is_blocked` tinyint(1) NOT NULL DEFAULT '0',
  `blocked_at` timestamp NULL DEFAULT NULL,
  `login_attempts` int unsigned NOT NULL DEFAULT '0',
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Pastian Hulu','admin@gmail.com',NULL,'$2y$12$4irJQSK6Jt5RzZgHP4J86.S262VZPRPY7MSUDE0JBtbRJkhf5BoeG','aktif',NULL,0,NULL,0,NULL,NULL,NULL,'2026-10-19 14:14:29','2026-10-19 14:14:29',NULL),(14,'s','s',NULL,'$2y$12$uJ4dXLN/taJSTgD7BivcmuWvIVn.32Vgw0qjqX8e7mqPePKxeI8/C','aktif',NULL,0,NULL,0,NULL,NULL,NULL,'2026-10-23 09:43:45','2026-10-23 09:43:45',NULL),(15,'s','ss',NULL,'$2y$12$HsthR6iHu5qwlsH6fASDsOKD00zi5qXJaA4xU5djuMjyzD7z5CBMi','aktif',NULL,0,NULL,0,NULL,NULL,NULL,'2026-10-23 09:51:05','2026-10-23 09:51:05',NULL),(16,'jefi jefi','1',NULL,'$2y$12$PmDnBxJUFzIE9SPD7LGtR.iFbIXrxFwQSHRQQTMXg9No1wbG4sKGG','aktif',NULL,0,NULL,0,NULL,NULL,NULL,'2026-10-24 02:10:36','2026-10-24 02:10:36',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-10-26  2:27:53
