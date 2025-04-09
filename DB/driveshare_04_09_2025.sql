-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2025 at 12:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `driveshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `car_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-04-08', '2025-04-09', '2025-04-09 01:41:41', '2025-04-09 01:41:41'),
(2, 1, 5, '2025-04-10', '2025-04-10', '2025-04-09 21:09:26', '2025-04-09 21:09:26'),
(3, 1, 5, '2025-04-10', '2025-04-10', '2025-04-09 21:10:47', '2025-04-09 21:10:47'),
(4, 1, 5, '2025-04-10', '2025-04-10', '2025-04-09 21:12:15', '2025-04-09 21:12:15'),
(5, 1, 5, '2025-04-10', '2025-04-10', '2025-04-09 21:14:21', '2025-04-09 21:14:21'),
(6, 1, 5, '2025-04-10', '2025-04-10', '2025-04-09 21:15:41', '2025-04-09 21:15:41'),
(7, 1, 5, '2025-04-10', '2025-04-10', '2025-04-09 21:21:30', '2025-04-09 21:21:30'),
(8, 1, 1, '2025-04-18', '2025-04-24', '2025-04-10 02:12:20', '2025-04-10 02:12:20');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `mileage` int(11) NOT NULL,
  `availability_calendar` varchar(255) NOT NULL,
  `pick_up_location` varchar(255) NOT NULL,
  `rental_pricing` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `user_id`, `model`, `year`, `mileage`, `availability_calendar`, `pick_up_location`, `rental_pricing`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Accord SE', 2015, 102000, '\"23\\/04\\/2025 - 23\\/05\\/2025\"', 'Location 20289', 100.00, 'cars/ytadbtJTn8fXjSujRfF11gtoQI8j5s38rRamxvDo.jpg', '2025-04-02 20:15:05', '2025-04-02 20:15:05', NULL),
(2, 1, 'Toyota AC', 2019, 47000, '\"22\\/04\\/2025 - 25\\/05\\/2025\"', 'Michgan', 120.00, NULL, '2025-04-02 20:51:51', '2025-04-02 20:51:51', NULL),
(3, 1, 'Accord ', 2015, 102000, '\"23\\/04\\/2025 - 23\\/05\\/2025\"', 'Location 20289', 100.00, 'cars/ytadbtJTn8fXjSujRfF11gtoQI8j5s38rRamxvDo.jpg', '2025-04-03 00:15:05', '2025-04-03 00:15:05', NULL),
(4, 1, 'Toyota', 2019, 47000, '\"22\\/04\\/2025 - 25\\/05\\/2025\"', 'Michgan', 120.00, NULL, '2025-04-03 00:51:51', '2025-04-03 00:51:51', NULL),
(5, 1, 'RAM', 2024, 10000, '\"05\\/20\\/2025 - 06\\/20\\/2025\"', 'ABC', 150.00, NULL, '2025-04-09 20:40:34', '2025-04-09 20:40:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2025_04_01_002056_create_carsgryjus_table', 2),
(6, '2025_04_01_002056_create_cars_table', 3),
(7, '2025_04_02_172433_add_deleted_at_to_cars_table', 4),
(8, '2025_04_07_213508_add_security_questions_to_users_table', 5),
(9, '2025_04_08_194735_create_bookings_table', 6),
(10, '2025_04_09_162456_add_user_id_to_cars_table', 7),
(11, '2025_04_09_162831_create_notifications_table', 8),
(12, '2025_04_09_183049_create_reviews_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `booking_id`, `title`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 'New Booking Received', 'Your car has been booked from 2025-04-10 to 2025-04-10.', 0, '2025-04-09 21:15:41', '2025-04-09 21:15:41'),
(2, 1, 6, 'Booking Confirmed', 'Your booking has been successfully placed from 2025-04-10 to 2025-04-10.', 0, '2025-04-09 21:15:41', '2025-04-09 21:15:41'),
(3, 1, 7, 'New Booking Received', 'Your car has been booked from 2025-04-10 to 2025-04-10.', 0, '2025-04-09 21:21:30', '2025-04-09 21:21:30'),
(4, 1, 7, 'Booking Confirmed', 'Your booking has been successfully placed from 2025-04-10 to 2025-04-10.', 0, '2025-04-09 21:21:30', '2025-04-09 21:21:30'),
(5, 1, 8, 'New Booking Received', 'Your car has been booked from 2025-04-18 to 2025-04-24.', 0, '2025-04-10 02:12:20', '2025-04-10 02:12:20'),
(6, 1, 8, 'Booking Confirmed', 'Your booking has been successfully placed from 2025-04-18 to 2025-04-24.', 0, '2025-04-10 02:12:20', '2025-04-10 02:12:20');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `booking_id`, `user_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 'qfjhuiwrtojpiyrpol[i', '2025-04-10 02:08:55', '2025-04-10 02:08:55'),
(2, 1, 1, 4, '23eruyrtoubchrey pitu45y', '2025-04-10 02:11:46', '2025-04-10 02:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `security_answer_1` varchar(250) DEFAULT NULL,
  `security_answer_2` varchar(250) DEFAULT NULL,
  `security_answer_3` varchar(250) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `security_answer_1`, `security_answer_2`, `security_answer_3`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Farhan', 'farhan@g.c', NULL, NULL, NULL, NULL, '$2y$10$PKd6YGZdF2QoWO0ypLp/ReP8ePDI.IbHLxym2HvERBsC6.ctvIab.', NULL, '2025-04-01 01:53:19', '2025-04-01 01:53:19'),
(2, NULL, 'farhan2@g.c', 'a', 'a', 'a', NULL, '$2y$10$UXWUBq6bVzJCI5.muWgPtepTi08kgnOI.m9qJ4AFLCiHo9JTwR2jC', NULL, '2025-04-08 01:54:27', '2025-04-08 01:54:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
