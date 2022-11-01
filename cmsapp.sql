-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2022 at 07:19 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmsapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `congregations`
--

CREATE TABLE `congregations` (
  `congId` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serviceTime` time NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `congregations`
--

INSERT INTO `congregations` (`congId`, `name`, `language`, `serviceTime`, `location`, `pic`, `created_at`, `updated_at`) VALUES
(1, 'Bahasa Malaysia Congregation', 'Bahasa Malaysia', '09:00:00', 'This is a location for congregation 1', 'Mr Bob', '2022-10-18 23:03:08', '2022-10-18 23:03:08'),
(2, 'Chinese Congregation', 'Chinese', '09:00:00', 'This is a location for congregation 2', 'Mr Robert', '2022-10-18 23:03:08', '2022-10-18 23:03:08'),
(3, 'English Congregation', 'English', '09:00:00', 'This is a location for congregation 3', 'Mr Builder', '2022-10-18 23:03:08', '2022-10-18 23:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventId` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime NOT NULL,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventId`, `name`, `type`, `start_datetime`, `end_datetime`, `venue`, `pic`, `created_at`, `updated_at`) VALUES
('a3e452e0-4049-48df-b4fc-6749738476f4', 'This Event', 'Service', '2022-10-21 23:39:00', '2022-10-21 23:39:00', 'Hall Big', 'Mr A', '2022-10-20 07:41:33', '2022-10-20 07:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_profiles`
--

CREATE TABLE `member_profiles` (
  `profileId` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `handphoneNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `congregation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_profiles`
--

INSERT INTO `member_profiles` (`profileId`, `name`, `phone`, `handphoneNo`, `email`, `address`, `congregation`, `gender`, `designation`, `created_at`, `updated_at`) VALUES
('266d8ac4-fd95-4833-b4c6-ea2bdc35138a', 'User Two', '01239123312', '123123123132', 'usertwo@cms.com', 'sadsasa', 'Bahasa Malaysia Congregation', 'Male', 'Mr', '2022-10-31 00:42:18', '2022-10-31 00:42:18'),
('2f20fcae-1eb5-4759-9ac9-e37ffc9e2aca', 'Peter Ting', '01293123', '12312312312312', 'peterting@email.com', 'This is an email for Peter', 'English Congregation', 'Male', 'Mr', '2022-10-26 22:16:43', '2022-10-26 22:17:32'),
('5dc57c3a-6852-42a4-87a4-181c3d9a68ae', 'Irvin', '23123131', '2312312312312', 'sdfjdsk@dksfjsfd.com', 'sadasas', 'Bahasa Malaysia Congregation', 'Male', 'Mr', '2022-10-24 23:02:57', '2022-10-26 19:25:08'),
('e801a385-8e04-4228-9bcb-29d1be13cd1c', 'John Doe', '0821234', '012345677', 'johndoe@email.com', 'address for john doe', 'Chinese Congregation', 'Female', 'Mr', '2022-10-26 19:58:07', '2022-10-26 19:58:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_04_164930_create_member_profiles_table', 1),
(6, '2022_10_05_050042_create_congregation_table', 1),
(7, '2022_10_11_062500_create_event_table', 1),
(8, '2022_10_12_024630_create_roles_table', 1),
(9, '2022_10_12_030733_create_volunteer_type_table', 1),
(10, '2022_10_18_032214_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', '0'),
(1, 'App\\Models\\User', '50115ebf-c271-4237-9b69-1e564de81f18'),
(3, 'App\\Models\\User', '0'),
(3, 'App\\Models\\User', '012d29a2-e30a-4692-998f-3905596c2f6d'),
(3, 'App\\Models\\User', '76d04b49-122b-41b5-8507-5d41b8ae62a9'),
(3, 'App\\Models\\User', 'b4d56914-4c21-407f-a165-762c4272dbff');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2022-10-18 20:12:19', '2022-10-18 20:12:19'),
(2, 'role-create', 'web', '2022-10-18 20:12:19', '2022-10-18 20:12:19'),
(3, 'role-edit', 'web', '2022-10-18 20:12:19', '2022-10-18 20:12:19'),
(4, 'role-delete', 'web', '2022-10-18 20:12:19', '2022-10-18 20:12:19'),
(5, 'profile-list', 'web', '2022-10-18 20:12:19', '2022-10-18 20:12:19'),
(6, 'profile-create', 'web', '2022-10-18 20:12:19', '2022-10-18 20:12:19'),
(7, 'profile-edit', 'web', '2022-10-18 20:12:19', '2022-10-18 20:12:19'),
(8, 'profile-delete', 'web', '2022-10-18 20:12:19', '2022-10-18 20:12:19'),
(9, 'event-list', 'web', '2022-10-18 20:12:19', '2022-10-18 20:12:19'),
(10, 'event-create', 'web', '2022-10-18 20:12:19', '2022-10-18 20:12:19'),
(11, 'event-edit', 'web', '2022-10-18 20:12:19', '2022-10-18 20:12:19'),
(12, 'event-delete', 'web', '2022-10-18 20:12:19', '2022-10-18 20:12:19'),
(13, 'user-list', 'web', '2022-10-18 20:12:19', '2022-10-18 20:12:19'),
(14, 'user-create', 'web', '2022-10-18 20:12:19', '2022-10-18 20:12:19'),
(15, 'user-edit', 'web', '2022-10-18 20:12:19', '2022-10-18 20:12:19'),
(16, 'user-delete', 'web', '2022-10-18 20:12:19', '2022-10-18 20:12:19');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleId` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Preacher', '2022-10-20 07:42:40', '2022-10-24 22:24:50'),
(2, 'Service Leader', '2022-10-20 07:42:40', '2022-10-20 07:42:40'),
(3, 'Worship Leader', '2022-10-20 07:42:40', '2022-10-20 07:42:40'),
(4, 'Backup Vocalist', '2022-10-20 07:42:40', '2022-10-20 07:42:40'),
(5, 'Guitar', '2022-10-20 07:42:40', '2022-10-20 07:42:40'),
(6, 'Piano', '2022-10-20 07:42:40', '2022-10-20 07:42:40'),
(7, 'Bass', '2022-10-20 07:42:40', '2022-10-20 07:42:40'),
(8, 'Drums', '2022-10-20 07:42:40', '2022-10-20 07:42:40'),
(9, 'Sunday School Teacher', '2022-10-20 07:42:40', '2022-10-20 07:42:40'),
(10, 'Usher', '2022-10-20 07:42:40', '2022-10-20 07:42:40'),
(11, 'Member', '2022-10-20 07:42:40', '2022-10-20 07:42:40'),
(12, 'Soundman', '2022-10-24 01:27:27', '2022-10-24 01:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 3),
(6, 1),
(6, 3),
(7, 1),
(7, 3),
(8, 1),
(8, 3),
(9, 1),
(9, 3),
(10, 1),
(10, 3),
(11, 1),
(11, 3),
(12, 1),
(12, 3),
(13, 1),
(13, 3),
(14, 1),
(14, 3),
(15, 1),
(15, 3),
(16, 1),
(16, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `accountId` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`accountId`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('012d29a2-e30a-4692-998f-3905596c2f6d', 'usertwo@cms.com', NULL, '$2y$10$bq78sX2Nw8vB163OtiZhGOjkTLZJkyE10TlSd1DFejT67GEiC9wm.', NULL, '2022-10-26 19:37:20', '2022-10-26 19:37:20'),
('50115ebf-c271-4237-9b69-1e564de81f18', 'admin@cms.com', NULL, '$2y$10$IKY1ApizlBc.ndJlHr77eODgF3ViTDoKPJvr7xtF007hm1mgldVb2', 'F5ikTATNuMTiN4zvOrW1duWn1ZHPvBpbxWQz8TO2CkgpIySWjKEmKTRS6oWe', '2022-10-18 20:12:23', '2022-10-18 20:12:23'),
('76d04b49-122b-41b5-8507-5d41b8ae62a9', 'staff@cms.com', NULL, '$2y$10$sqpVrZSEf01we9vkW/LLKuCdT3qs3j7.gNz2EF0dKTZCQ.DOTJ8DG', NULL, '2022-10-18 22:26:06', '2022-10-18 22:47:40'),
('b4d56914-4c21-407f-a165-762c4272dbff', 'peterting@email.com', NULL, '$2y$10$ccAqEYZuOgY3NV8esdJdE.s7bmW.IVFLJhDrlsfg/oeCL.UO25TSC', NULL, '2022-10-30 07:56:52', '2022-10-30 08:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2022-10-18 20:12:23', '2022-10-18 20:12:23'),
(3, 'Staff', 'web', '2022-10-18 22:23:16', '2022-10-18 22:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_type`
--

CREATE TABLE `volunteer_type` (
  `profileId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `volunteer_type`
--

INSERT INTO `volunteer_type` (`profileId`, `roles`) VALUES
('266d8ac4-fd95-4833-b4c6-ea2bdc35138a', 2),
('266d8ac4-fd95-4833-b4c6-ea2bdc35138a', 4),
('266d8ac4-fd95-4833-b4c6-ea2bdc35138a', 7),
('2f20fcae-1eb5-4759-9ac9-e37ffc9e2aca', 2),
('2f20fcae-1eb5-4759-9ac9-e37ffc9e2aca', 3),
('2f20fcae-1eb5-4759-9ac9-e37ffc9e2aca', 4),
('2f20fcae-1eb5-4759-9ac9-e37ffc9e2aca', 5),
('2f20fcae-1eb5-4759-9ac9-e37ffc9e2aca', 6),
('5dc57c3a-6852-42a4-87a4-181c3d9a68ae', 1),
('5dc57c3a-6852-42a4-87a4-181c3d9a68ae', 2),
('5dc57c3a-6852-42a4-87a4-181c3d9a68ae', 3),
('5dc57c3a-6852-42a4-87a4-181c3d9a68ae', 4),
('5dc57c3a-6852-42a4-87a4-181c3d9a68ae', 5),
('5dc57c3a-6852-42a4-87a4-181c3d9a68ae', 6),
('5dc57c3a-6852-42a4-87a4-181c3d9a68ae', 7),
('5dc57c3a-6852-42a4-87a4-181c3d9a68ae', 8),
('5dc57c3a-6852-42a4-87a4-181c3d9a68ae', 10),
('5dc57c3a-6852-42a4-87a4-181c3d9a68ae', 11),
('5dc57c3a-6852-42a4-87a4-181c3d9a68ae', 12),
('ae4f430c-e9c5-4e03-881b-6fb473d78c31', 6),
('b2621370-fe6a-4538-bdf0-e275256c366a', 8),
('d82c0c74-b22a-4c5e-8b58-edb3f7dace14', 11),
('e801a385-8e04-4228-9bcb-29d1be13cd1c', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `congregations`
--
ALTER TABLE `congregations`
  ADD PRIMARY KEY (`congId`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `member_profiles`
--
ALTER TABLE `member_profiles`
  ADD UNIQUE KEY `member_profiles_profileid_unique` (`profileId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD UNIQUE KEY `user_account_accountid_unique` (`accountId`),
  ADD UNIQUE KEY `user_account_email_unique` (`email`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_type_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `volunteer_type`
--
ALTER TABLE `volunteer_type`
  ADD PRIMARY KEY (`profileId`,`roles`),
  ADD KEY `volunteer_type_roles_foreign` (`roles`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `congregations`
--
ALTER TABLE `congregations`
  MODIFY `congId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `user_type` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `user_type` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `volunteer_type`
--
ALTER TABLE `volunteer_type`
  ADD CONSTRAINT `volunteer_type_roles_foreign` FOREIGN KEY (`roles`) REFERENCES `roles` (`roleId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
