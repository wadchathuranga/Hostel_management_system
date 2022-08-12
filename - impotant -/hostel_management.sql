-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 05:56 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `job_title`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@admin.com', '1', '0', '$2y$10$hV9LvR7yAVVBVAQ2sCzRBeaLolPVkEXpdR/OO3ibgMfBGYHIWG2T.', 'g8oFaF1feO8IAk7IQgQN5CIIw1x3GWkMdQbhIzKKjqSSS0xRoJ25ibmKhNky', NULL, '2020-04-23 05:28:09'),
(6, 'REGISTER', 'admin1@admin.com', 'REG', '0357896541', 'admin1', NULL, '2020-04-24 00:33:04', '2020-04-24 00:33:04'),
(7, 'SAR', 'sar@sar.com', 'SAR', '0359632548', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank_records`
--

CREATE TABLE `bank_records` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_of_paid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_records`
--

INSERT INTO `bank_records` (`id`, `transaction_no`, `amount_of_paid`, `bank_name`, `paid_date`, `created_at`, `updated_at`) VALUES
(2, '123', '500', 'BOC', '0000-00-00 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `uic_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isRead` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `uic_no`, `first_name`, `last_name`, `message`, `isRead`, `created_at`, `updated_at`) VALUES
(15, '16app2652', 'new', 'user', 'hello Hacker Dilshan', '1', '2020-04-26 07:29:32', '2020-04-26 07:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(10) UNSIGNED NOT NULL,
  `faculty_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `faculty_code`, `faculty_name`, `created_at`, `updated_at`) VALUES
(1, 'APP', 'Applied Sciences', '2020-04-26 10:08:24', '2020-04-26 10:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `hostels`
--

CREATE TABLE `hostels` (
  `id` int(10) UNSIGNED NOT NULL,
  `hostel_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hostel_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_students` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hostel_gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hostel_reserve_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hostel_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hostel_warden_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hostels`
--

INSERT INTO `hostels` (`id`, `hostel_name`, `hostel_type`, `no_of_students`, `hostel_gender`, `hostel_reserve_year`, `hostel_location`, `hostel_warden_id`, `created_at`, `updated_at`) VALUES
(1, 'Bandara', 'Rent', '45', 'Boy', '2nd Year', 'Sinharajaya', 'Jayasena', '2020-04-26 07:50:08', '2020-04-26 07:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_requests`
--

CREATE TABLE `hostel_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `std_uic_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `std_nic_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academic_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_date` datetime NOT NULL,
  `process` int(50) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hostel_requests`
--

INSERT INTO `hostel_requests` (`id`, `std_uic_no`, `std_nic_no`, `academic_year`, `email`, `method`, `bank_name`, `transaction_number`, `transaction_amount`, `transaction_date`, `process`, `created_at`, `updated_at`) VALUES
(2, '16app2650', '960360729', '1', 'admin@gmail.com', 'online', 'BOC', '123', '500', '2020-01-01 01:00:00', 1, '2020-04-26 07:21:34', '2020-04-26 07:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_04_09_055411_create_hostels_table', 1),
(5, '2020_04_10_154008_create_wardens_table', 3),
(6, '2020_04_11_160017_create_faculties_table', 4),
(7, '2020_04_13_154122_create_hostel_requests_table', 4),
(8, '2020_04_14_032539_create_bank_records_table', 5),
(9, '2020_04_15_052750_create_user_levels_table', 6),
(10, '2020_04_15_151841_create_contact_messages_table', 7),
(11, '2017_02_25_025103_create_admins_table', 8),
(13, '2020_04_23_111728_create_hostels_table', 9),
(14, '2020_04_23_111818_create_wardens_table', 10),
(15, '2020_04_23_111845_create_faculties_table', 11),
(16, '2020_04_23_120807_create_hostel_requests_table', 12),
(17, '2020_04_23_121237_create_bank_records_table', 13),
(18, '2020_04_23_122103_create_contact_messages_table', 14),
(19, '2020_04_26_033625_create_notifications_table', 14),
(20, '2020_04_26_052914_create_contact_messages', 15);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('user@user.com', '$2y$10$aguE08G8XaLg0Q97FUvkBuOKM5NM76QCBRuQYSIC45JwEzlI1PopW', '2020-04-25 02:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `std_first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `std_uic_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `std_last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `std_gender` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `std_birthday` date NOT NULL,
  `std_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `std_nic_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `std_mobile_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distance` int(100) NOT NULL,
  `std_admission_date` date NOT NULL,
  `std_admission_expire_date` date DEFAULT NULL,
  `std_faculty_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `std_first_name`, `std_uic_no`, `std_last_name`, `std_gender`, `std_birthday`, `std_address`, `std_nic_no`, `std_mobile_no`, `distance`, `std_admission_date`, `std_admission_expire_date`, `std_faculty_id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Dilshan', '16app2650', 'Chathuranga', 'Male', '2010-09-27', 'Matara', '960360730', '0716473980', 190, '2016-10-30', NULL, 'APP', 'user@user.com', '$2y$10$.XIIo2Jcm2ePeCG.T3amx.XUJ9WitbttbIf0lmfYz61NwElyGUFV6', 'CYrCa1sqdpAcMPWlXerkrBAMGBKH2oLEdqh1FxcIaPK2780CCnetVAKT4gw6', '2020-04-25 01:27:20', '2020-04-25 02:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `wardens`
--

CREATE TABLE `wardens` (
  `id` int(10) UNSIGNED NOT NULL,
  `warden_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warden_gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warden_mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warden_hostel_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wardens`
--

INSERT INTO `wardens` (`id`, `warden_name`, `warden_gender`, `warden_mobile_no`, `warden_hostel_id`, `created_at`, `updated_at`) VALUES
(1, 'Gopa', 'Male', '119', 'Mahweli', '2020-04-26 09:57:00', '2020-04-26 09:57:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `bank_records`
--
ALTER TABLE `bank_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostels`
--
ALTER TABLE `hostels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hostels_hostel_name_unique` (`hostel_name`);

--
-- Indexes for table `hostel_requests`
--
ALTER TABLE `hostel_requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hostel_requests_std_uic_no_unique` (`std_uic_no`),
  ADD UNIQUE KEY `hostel_requests_std_nic_no_unique` (`std_nic_no`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wardens`
--
ALTER TABLE `wardens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bank_records`
--
ALTER TABLE `bank_records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hostels`
--
ALTER TABLE `hostels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hostel_requests`
--
ALTER TABLE `hostel_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wardens`
--
ALTER TABLE `wardens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
