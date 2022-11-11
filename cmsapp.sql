-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2022 at 02:24 PM
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
(1, 'Bahasa Malaysia Congregation', 'Bahasa Malaysia', '09:00:00', 'This is a location for congregation 1', 'Mr Bob', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(2, 'Chinese Congregation', 'Chinese', '09:00:00', 'This is a location for congregation 2', 'Mr Robert', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(3, 'English Congregation', 'English', '09:00:00', 'This is a location for congregation 3', 'Mr Builder', '2022-11-02 06:18:01', '2022-11-02 06:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventId` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime NOT NULL,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventtype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventId`, `name`, `start_datetime`, `end_datetime`, `venue`, `eventtype`, `pic`, `created_at`, `updated_at`) VALUES
('7b3909cc-8b4c-4de0-8c52-4fea488c4819', 'Event Uno', '2010-10-10 10:00:00', '2010-10-10 15:00:00', 'Hall A', 'Monthly services', 'Irvin', '2022-11-02 06:18:01', '2022-11-10 08:01:59'),
('8abc423a-67a0-4f01-9904-e5ead0fd6199', 'Sunday Services', '2022-10-02 09:00:00', '2022-10-30 09:00:00', 'Hall A', 'Weekly Services', 'Irvin', '2022-11-03 02:22:54', '2022-11-08 18:53:16');

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
('0b6173b7-1525-47ac-8b1c-7db5901f865a', 'John x', '012356789', '01284357', 'johndoe@eail.com', 'This is address text, can\'t think of one now', 'English Congregation', 'male', 'Mr', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
('115e6d2b-f2e8-4270-a99b-6f2225458e36', 'Jane Smith', '08421324987', '01234657987654', 'janesmith@email.com', 'Address for janesmith', 'Bahasa Malaysia Congregation', 'Female', 'Mrs', '2022-11-08 21:41:08', '2022-11-08 21:41:08'),
('31053304-7b57-49e0-9c36-f7d4da7f1034', 'Admin', '082123456', '0123456987', 'admin@cms.com', 'This is an address', 'English Congregation', 'Male', 'Mr', '2022-11-02 06:49:22', '2022-11-02 06:49:22'),
('6706edf5-187a-4cc9-8fe9-a04d56960576', 'John Doe', '0123456789', '012384357', 'johndoe@email.com', 'This is an address text, can\'t think of one now', 'English Congregation', 'male', 'Mr', '2022-11-02 06:18:01', '2022-11-02 06:18:01');

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
(10, '2022_10_18_032214_create_permission_tables', 1),
(11, '2022_11_03_074216_create_event_type', 2),
(13, '2022_11_03_013343_create_crud_events_table', 3),
(14, '2022_11_09_163835_create_schedule_table', 4);

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
(1, 'App\\Models\\User', 'e66c89ca-62fc-47ab-b21a-3a7981e316aa'),
(2, 'App\\Models\\User', '0'),
(2, 'App\\Models\\User', '7aec1c78-7c05-43a0-9c58-f08c8ca9f87f'),
(2, 'App\\Models\\User', '850ed003-00c3-43b0-bccf-b0134aa66278'),
(2, 'App\\Models\\User', 'bd80af20-edd7-46ac-91d5-cac2069d6b00');

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
(1, 'Show Role', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(2, 'Create Role', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(3, 'Edit Role', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(4, 'Delete Role', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(5, 'Show Profile', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(6, 'Create Profile', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(7, 'Edit Profile', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(8, 'Delete Profile', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(9, 'Show Event', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(10, 'Create Event', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(11, 'Edit Event', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(12, 'Delete Event', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(13, 'Show User', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(14, 'Create User', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(15, 'Edit User', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(16, 'Delete User', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(17, 'Show Volunteer Type', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(18, 'Create Volunteer Type', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(19, 'Edit Volunteer Type', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(20, 'Delete Volunteer Type', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(21, 'Show Event Types', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(22, 'Edit Event Types', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(23, 'Delete Event Types', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(24, 'Create Event Types', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01');

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
(1, 'Preacher', '2022-11-02 06:18:01', '2022-11-03 00:12:03'),
(2, 'Service Leader', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(3, 'Worship Leader', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(4, 'Backup Vocalist', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(5, 'Guitar', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(6, 'Piano', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(7, 'Bass', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(8, 'Drums', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(9, 'Sunday School Teacher', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(10, 'Usher', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(11, 'Member', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(12, 'Recurring Service', '2022-11-02 23:57:22', '2022-11-02 23:57:22'),
(13, 'Service', '2022-11-03 00:02:19', '2022-11-03 00:02:19'),
(14, 'Staff', '2022-11-10 05:41:30', '2022-11-10 05:41:30');

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
(1, 2),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(17, 3),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(19, 3),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(21, 3),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2);

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
('7aec1c78-7c05-43a0-9c58-f08c8ca9f87f', 'staff2@cms.com', NULL, '$2y$10$IofLkNGurywaFkegqP6I/ePBBR2.xkrl9Sm3TqgydEsG1F/yJhI2e', NULL, '2022-11-10 07:21:11', '2022-11-10 07:21:11'),
('850ed003-00c3-43b0-bccf-b0134aa66278', 'staff4@cms.com', NULL, '$2y$10$WVnsY65fSCSPHxbb.qtncO1Mi.ZnHK/P.nkR5Uv8vkAVX/7YRDEo.', NULL, '2022-11-10 08:00:42', '2022-11-10 08:00:42'),
('bd80af20-edd7-46ac-91d5-cac2069d6b00', 'staff3@cms.com', NULL, '$2y$10$T.e3hR1J1ve03L85fk10iOgVbYY0dAB0xwJ/DI/lM3KlG8RYtAxUO', NULL, '2022-11-10 07:56:11', '2022-11-10 07:56:11'),
('e66c89ca-62fc-47ab-b21a-3a7981e316aa', 'admin@cms.com', NULL, '$2y$10$2gzdqM8rSBYpCcJ3o.PWmeD9oyaF062aMv2d.Hedo7q5dJSB3Q70a', NULL, '2022-11-02 06:18:01', '2022-11-02 06:18:01');

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
(1, 'Admin', 'web', '2022-11-02 06:18:01', '2022-11-02 06:18:01'),
(2, 'Staff', 'web', '2022-11-10 05:46:20', '2022-11-10 05:46:20'),
(3, 'Volunteer', 'web', '2022-11-10 08:17:56', '2022-11-10 08:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_type`
--

CREATE TABLE `volunteer_type` (
  `profileId` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `volunteer_type`
--

INSERT INTO `volunteer_type` (`profileId`, `roles`) VALUES
('0b6173b7-1525-47ac-8b1c-7db5901f865a', 3),
('115e6d2b-f2e8-4270-a99b-6f2225458e36', 1),
('115e6d2b-f2e8-4270-a99b-6f2225458e36', 3),
('31053304-7b57-49e0-9c36-f7d4da7f1034', 1),
('31053304-7b57-49e0-9c36-f7d4da7f1034', 2),
('31053304-7b57-49e0-9c36-f7d4da7f1034', 3),
('31053304-7b57-49e0-9c36-f7d4da7f1034', 4),
('31053304-7b57-49e0-9c36-f7d4da7f1034', 5),
('6706edf5-187a-4cc9-8fe9-a04d56960576', 6),
('6706edf5-187a-4cc9-8fe9-a04d56960576', 7),
('6706edf5-187a-4cc9-8fe9-a04d56960576', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `congregations`
--
ALTER TABLE `congregations`
  ADD PRIMARY KEY (`congId`,`name`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventId`),
  ADD KEY `eventtype` (`eventtype`);

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
  ADD PRIMARY KEY (`profileId`),
  ADD KEY `congregation` (`congregation`),
  ADD KEY `profileId` (`profileId`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`eventtype`) REFERENCES `event_types` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member_profiles`
--
ALTER TABLE `member_profiles`
  ADD CONSTRAINT `member_profiles_ibfk_1` FOREIGN KEY (`congregation`) REFERENCES `congregations` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `volunteer_type_profileid_foreign` FOREIGN KEY (`profileId`) REFERENCES `member_profiles` (`profileId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `volunteer_type_roles_foreign` FOREIGN KEY (`roles`) REFERENCES `roles` (`roleId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
