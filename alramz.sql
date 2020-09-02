-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table alramz.activities
DROP TABLE IF EXISTS `activities`;
CREATE TABLE IF NOT EXISTS `activities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activities_user_index` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table alramz.activities: ~0 rows (approximately)
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;

-- Dumping structure for table alramz.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table alramz.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table alramz.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table alramz.migrations: ~5 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2019_08_19_000000_create_failed_jobs_table', 1),
	(3, '2020_04_18_030219_add_role_field_to_users_table', 1),
	(4, '2020_04_18_030220_create_records_table', 1),
	(5, '2020_04_19_082242_create_activities_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table alramz.records
DROP TABLE IF EXISTS `records`;
CREATE TABLE IF NOT EXISTS `records` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `index1` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index2` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index3` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index4` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index5` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index6` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index7` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index8` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index9` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index10` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date1` datetime DEFAULT NULL,
  `date2` datetime DEFAULT NULL,
  `integer1` bigint(20) NOT NULL DEFAULT '0',
  `integer2` bigint(20) NOT NULL DEFAULT '0',
  `decimal1` decimal(11,3) NOT NULL DEFAULT '0.000',
  `decimal2` decimal(11,3) NOT NULL DEFAULT '0.000',
  `string1` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string2` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string3` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string4` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string5` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string6` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string7` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string8` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string9` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string10` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string11` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string12` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string13` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string14` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string15` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string16` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string17` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string18` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string19` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string20` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string21` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string22` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string23` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string24` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string25` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string26` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string27` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string28` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string29` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string30` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string31` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string32` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string33` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string34` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string35` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string36` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string37` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string38` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string39` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string40` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `records_index1_index` (`index1`),
  KEY `records_index2_index` (`index2`),
  KEY `records_index3_index` (`index3`),
  KEY `records_index4_index` (`index4`),
  KEY `records_index5_index` (`index5`),
  KEY `records_index6_index` (`index6`),
  KEY `records_index7_index` (`index7`),
  KEY `records_index8_index` (`index8`),
  KEY `records_index9_index` (`index9`),
  KEY `records_index10_index` (`index10`),
  KEY `records_date1_index` (`date1`),
  KEY `records_date2_index` (`date2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table alramz.records: ~0 rows (approximately)
/*!40000 ALTER TABLE `records` DISABLE KEYS */;
/*!40000 ALTER TABLE `records` ENABLE KEYS */;

-- Dumping structure for table alramz.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','broker','compliance') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'broker',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table alramz.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'admin@alramz.ae', 'admin', NULL, '$2y$10$SRkam5xSd.o3lXRVaNbo8er41NGPn7OQBxt1Z3MT0qculLeCRGUuS', NULL, 'Active', '2020-06-25 07:15:10', '2020-06-25 07:15:10');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
