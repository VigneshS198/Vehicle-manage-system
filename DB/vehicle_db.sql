-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 22, 2025 at 03:03 PM
-- Server version: 9.1.0
-- PHP Version: 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2025-05-21-051331', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1747831423, 1),
(2, '2025-05-21-063421', 'App\\Database\\Migrations\\CreatePermissionsTable', 'default', 'App', 1747831423, 1),
(3, '2025-05-21-063424', 'App\\Database\\Migrations\\CreateRolesTable', 'default', 'App', 1747831423, 1),
(4, '2025-05-21-063425', 'App\\Database\\Migrations\\CreateRolePermissionsTable', 'default', 'App', 1747831423, 1),
(5, '2025-05-21-063649', 'App\\Database\\Migrations\\AddRoleIdForeignKeyToUsers', 'default', 'App', 1747831423, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `display_name` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'add_vehicle', 'web', 'Permission to add a new vehicle', '2025-05-21 07:13:44', '2025-05-21 07:13:44'),
(2, 'edit_vehicle', 'web', 'Permission to edit vehicle details', '2025-05-21 07:13:44', '2025-05-21 07:13:44'),
(3, 'delete_vehicle', 'web', 'Permission to delete a vehicle', '2025-05-21 07:13:44', '2025-05-21 07:13:44'),
(4, 'view_vehicle', 'web', 'Permission to view vehicle details', '2025-05-21 07:13:44', '2025-05-21 07:13:44'),
(5, 'check_security', 'web', 'Permission for security team to perform checks', '2025-05-21 07:13:44', '2025-05-21 07:13:44'),
(6, 'mark_checked_out', 'web', 'Permission to mark vehicle as checked out', '2025-05-21 07:13:44', '2025-05-21 07:13:44'),
(7, 'view_vendor', 'web', 'Permission to view vendor details', '2025-05-21 07:13:44', '2025-05-21 07:13:44'),
(8, 'view_product', 'web', 'Permission to view product details', '2025-05-21 07:13:44', '2025-05-21 07:13:44'),
(9, 'generate_reports', 'web', 'Permission to generate reports', '2025-05-21 07:13:44', '2025-05-21 07:13:44'),
(10, 'upload_documents', 'web', 'Permission to upload documents (D.C. or P.O.)', '2025-05-21 07:13:44', '2025-05-21 07:13:44'),
(11, 'view_vehicle_history', 'web', 'Permission to view vehicle history', '2025-05-21 07:13:44', '2025-05-21 07:13:44'),
(12, 'manage_users', 'web', 'Permission to manage users (CRUD operations)', '2025-05-21 07:13:44', '2025-05-21 07:13:44'),
(13, 'approve_vendor', 'web', 'Permission to approve or manage vendor status', '2025-05-21 07:13:44', '2025-05-21 07:13:44'),
(14, 'download_documents', 'web', 'Permission to download uploaded documents', '2025-05-21 07:13:44', '2025-05-21 07:13:44'),
(15, 'view_notifications', 'web', 'Permission to view notifications or alerts', '2025-05-21 07:13:44', '2025-05-21 07:13:44'),
(16, 'assign_roles', 'web', 'Permission to assign roles to users', '2025-05-21 07:13:44', '2025-05-21 07:13:44'),
(17, 'view_logs', 'web', 'Permission to view logs related to vehicle actions', '2025-05-21 07:13:44', '2025-05-21 07:13:44'),
(18, 'access_settings', 'web', 'Permission to access system settings', '2025-05-21 07:13:44', '2025-05-21 07:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `purchase_order_id` int DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_code` varchar(100) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_order_id` (`purchase_order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `purchase_order_id`, `product_name`, `product_code`, `quantity`, `price`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 2, '1', '1', 1, 1.00, '2025-05-22 13:18:55', '2025-05-22 13:18:55', ''),
(2, 3, 'stell', '1', 2, 200.00, '2025-05-22 13:22:09', '2025-05-22 13:22:09', ''),
(3, 3, 'silver', '1', 3, 100.00, '2025-05-22 13:22:09', '2025-05-22 13:22:09', ''),
(4, 4, 'stell', '3', 2, 20.00, '2025-05-22 14:52:27', '2025-05-22 14:52:27', ''),
(5, 4, 'try', '3', 3, 10.00, '2025-05-22 14:52:27', '2025-05-22 14:52:27', '');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

DROP TABLE IF EXISTS `purchase_order`;
CREATE TABLE IF NOT EXISTS `purchase_order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(255) DEFAULT NULL,
  `vendor_company` varchar(255) DEFAULT NULL,
  `address` text,
  `mobile` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `vendor_name`, `vendor_company`, `address`, `mobile`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 'dafsd', 'afdd', 'afsgdf453', 'sfgdhfg', '2025-05-22 07:25:18', '2025-05-22 12:55:18', ''),
(2, 'dsfd', 'dafs', 'adfsd', 'q34355432', '2025-05-22 07:48:55', '2025-05-22 13:18:55', ''),
(3, 'mano', 'manoger', 'dsfvdgfgbdfv', '9585059198', '2025-05-22 07:52:08', '2025-05-22 13:22:08', ''),
(4, 'dfsgdf', 'fsgdhfg', 'fsgdfhg', 'q34355432', '2025-05-22 09:22:27', '2025-05-22 14:52:27', '');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `is_service_staff` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `is_default`, `is_service_staff`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', 1, 0, '2025-05-21 07:13:44', '2025-05-21 07:13:44'),
(2, 'Admin', 'web', 0, 0, '2025-05-21 07:13:44', '2025-05-21 07:13:44'),
(3, 'User', 'web', 0, 0, '2025-05-21 07:13:44', '2025-05-21 07:13:44'),
(4, 'Viewer', 'web', 0, 0, '2025-05-21 07:13:44', '2025-05-21 07:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

DROP TABLE IF EXISTS `role_permissions`;
CREATE TABLE IF NOT EXISTS `role_permissions` (
  `role_id` int UNSIGNED NOT NULL,
  `permission_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`permission_id`),
  KEY `role_permissions_permission_id_foreign` (`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobile_number` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `profile_photo` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive','banned') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_users_role_id` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `mobile_number`, `profile_photo`, `password`, `role_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Super', 'Admin', 'superadmin', 'superadmin@example.com', '1234567890', NULL, '$2y$10$e01z/0FfBy6fY.Pia.rCE.ojCpc5UQYteW.oXm/xkIhx//rGwKUBG', 1, 'active', '2025-05-21 07:13:44', '2025-05-21 07:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vehicle_name` varchar(255) NOT NULL,
  `vehicle_photo` blob,
  `dc_number` varchar(100) NOT NULL,
  `po_number` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL,
  `status` enum('checkin','checkout') NOT NULL,
  `checkout_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `vehicle_name`, `vehicle_photo`, `dc_number`, `po_number`, `date_time`, `status`, `checkout_time`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 'name', NULL, '1234', '1234', '2025-05-22 06:48:07', 'checkout', '0000-00-00 00:00:00', '2025-05-22 06:48:33', '2025-05-22 11:46:07', 'adsfd'),
(2, 'sad', 0x313734373931323239395f39313332623166383531303731316638363837652e706e67, 'cdsvfdsfvsdfv', 'cavs', '0000-00-00 00:00:00', 'checkout', '0000-00-00 00:00:00', '2025-05-22 05:41:39', '2025-05-22 11:51:18', ''),
(3, 'dsf', 0x313734373931323630355f65313166353136646635356435346130643662342e706e67, '1234', '12334', '0000-00-00 00:00:00', 'checkout', '0000-00-00 00:00:00', '2025-05-22 05:46:45', '2025-05-22 14:50:48', ''),
(4, 'dsf', 0x313734373931323634375f39643635633633663032366531346333346338652e706e67, '1234', '12334', '0000-00-00 00:00:00', 'checkout', '0000-00-00 00:00:00', '2025-05-22 05:47:27', '2025-05-22 11:48:54', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
