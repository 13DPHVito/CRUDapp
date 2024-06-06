-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.27-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for laravel
CREATE DATABASE IF NOT EXISTS `laravel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `laravel`;

-- Dumping structure for table laravel.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table laravel.goals
CREATE TABLE IF NOT EXISTS `goals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `due_date` date NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `goals_user_id_foreign` (`user_id`),
  CONSTRAINT `goals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.goals: ~1 rows (approximately)
INSERT INTO `goals` (`id`, `title`, `description`, `start_date`, `due_date`, `completed`, `user_id`, `created_at`, `updated_at`) VALUES
	(2, 'Tests.', 'ODOWO', '2024-01-12', '2025-03-23', 0, 4, '2024-06-06 14:51:31', '2024-06-06 14:51:31');

-- Dumping structure for table laravel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.migrations: ~13 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(10, '2014_10_12_000000_create_users_table', 1),
	(18, '2024_05_31_235510_create_goals_table', 1),
	(19, '2014_10_12_100000_create_password_reset_tokens_table', 2),
	(20, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
	(21, '2019_08_19_000000_create_failed_jobs_table', 2),
	(22, '2019_12_14_000001_create_personal_access_tokens_table', 2),
	(23, '2024_03_07_193452_create_posts', 2),
	(24, '2024_05_25_093152_add_image_to_users_table', 2),
	(25, '2024_05_31_144618_create_sessions_table', 2),
	(26, '2024_06_02_115922_create_usergoals_table', 3),
	(27, '2024_06_02_122640_add_user_id_to_goals_table', 4),
	(28, '2024_06_05_205405_add_completed_to_goals_table', 5),
	(30, '2024_06_06_172256_create_goals_table', 6);

-- Dumping structure for table laravel.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Title` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.posts: ~2 rows (approximately)
INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `Title`, `body`, `user_id`) VALUES
	(1, '2024-06-02 09:21:34', '2024-06-02 09:21:34', 'dwdwa', 'dw', 2),
	(2, '2024-06-05 16:59:51', '2024-06-06 06:25:52', 'Nosaukums 2', 'DO ODWOD OKAWDK AWPOKDAWK DOAWDAW\r\nDAWD\r\nAWDAWFEWFEWFEWAFEWFAEWFEWAFEW\r\nDAWDFEWFAEWFFFFW\r\n\r\nAWFEWKOAOKEWAFAFAEWF\r\nWAEFEWAFEWFAEWFESWFAEW', 1);

-- Dumping structure for table laravel.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('p2LwuUtij9Xoft1zCzuGKgQ95D8N4vySbiCbW9Ej', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:126.0) Gecko/20100101 Firefox/126.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWjNHYlg2TUgxbjhUTDJqaTVEcFpLSzQ0UFNtNFBCUDlyanI2ZlJSUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9nb2FscyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1717699483);

-- Dumping structure for table laravel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.users: ~4 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `profile_photo_path`, `created_at`, `updated_at`, `is_admin`) VALUES
	(1, 'Micheeae', 'MICHAELWittman@inbox.lv', NULL, NULL, '$2y$12$p7qU8SiIsb7TxffT2BHWhO8eygK3qw.ctcQSTK6K1gJ8E0s0a4vrq', NULL, NULL, '2024-05-31 20:59:22', '2024-05-31 20:59:22', 0),
	(2, 'bob123333', 'bob123@inbox.lv', NULL, NULL, '$2y$12$bFOKxibBm9WMW0K1C5/1P.lXSCKkoPgVsB1LmBH5P0NwDwaEcmeZi', NULL, NULL, '2024-06-02 09:15:34', '2024-06-02 09:15:34', 0),
	(3, 'admin', 'admin@inbox.lv', NULL, NULL, '$2y$12$0.9qAlEM.S.sbwLLiUyoZOENWoKEBbGg6vajAlsWXWjLcOFDqytpC', NULL, NULL, '2024-06-06 06:04:39', '2024-06-06 06:04:39', 1),
	(4, 'Thomas', 'THOMASDEIVIDOSN@INBOX.LV', NULL, NULL, '$2y$12$2Iu.cHcgAU0TIAjrXDEp1OgEj28AvqVkHhiQ3zVYqKpCmjTsWqY.S', NULL, NULL, '2024-06-06 14:20:22', '2024-06-06 14:20:22', 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
