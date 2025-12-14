-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2025 at 07:57 AM
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
-- Database: `couseregsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `units` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `enrolled_count` int(11) NOT NULL DEFAULT 0,
  `instructor_name` varchar(255) DEFAULT NULL,
  `schedule` varchar(255) DEFAULT NULL,
  `room` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_code`, `course_name`, `units`, `capacity`, `enrolled_count`, `instructor_name`, `schedule`, `room`, `semester`, `year`, `created_at`, `updated_at`) VALUES
(1, 'CS 301', 'Data Structures & Algorithms', 3, 40, 28, 'Dr. Sarah Johnson', 'MWF 10:00 AM - 11:30 AM', 'Room 204', 'Fall', 2025, '2025-12-05 14:49:40', '2025-12-05 14:51:39'),
(2, 'CS 305', 'Database Management Systems', 3, 35, 30, 'Prof. Michael Chen', 'TTh 2:00 PM - 3:30 PM', 'Room 301', 'Fall', 2025, '2025-12-05 14:49:40', '2025-12-05 14:49:40'),
(3, 'CS 320', 'Web Development', 3, 30, 22, 'Dr. Emily Rodriguez', 'MWF 1:00 PM - 2:30 PM', 'Lab 105', 'Fall', 2025, '2025-12-05 14:49:40', '2025-12-05 14:49:40'),
(4, 'CS 401', 'Software Engineering', 4, 25, 18, 'Dr. James Miller', 'MW 3:00 PM - 5:00 PM', 'Room 402', 'Fall', 2025, '2025-12-05 14:49:40', '2025-12-05 14:49:40'),
(5, 'CS 350', 'Operating Systems', 3, 30, 25, 'Prof. Lisa Anderson', 'TTh 10:00 AM - 11:30 AM', 'Room 305', 'Fall', 2025, '2025-12-05 14:49:40', '2025-12-05 14:49:40'),
(6, 'CS 410', 'Artificial Intelligence', 4, 35, 32, 'Dr. Robert Kim', 'MWF 9:00 AM - 10:30 AM', 'Lab 201', 'Fall', 2025, '2025-12-05 14:49:40', '2025-12-05 14:49:40'),
(7, 'CS 325', 'Mobile App Development', 3, 28, 20, 'Prof. Maria Garcia', 'TTh 1:00 PM - 2:30 PM', 'Lab 103', 'Fall', 2025, '2025-12-05 14:49:40', '2025-12-05 14:49:40'),
(8, 'CS 370', 'Computer Networks', 3, 32, 27, 'Dr. Thomas Lee', 'MW 11:00 AM - 12:30 PM', 'Room 308', 'Fall', 2025, '2025-12-05 14:49:40', '2025-12-05 14:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `course_user`
--

CREATE TABLE `course_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_30_000001_create_courses_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `role` enum('student','instructor','admin') NOT NULL DEFAULT 'student',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `google_id`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-12-05 14:49:40', '$2y$12$Wt39lkU5GTvPoVe/.IEE7OnIi.IDs3J1rjzTVxNrIT.XN1fJsxtJm', NULL, 'student', 'jyVi5m6o1x', '2025-12-05 14:49:40', '2025-12-05 14:49:40'),
(2, 'jovannnnebf pamesaaa', 'joobs@my.cspc.edu.ph', NULL, '$2y$12$2O4zqcx6H7PlEkfqZOm63ewClP9xRO7aZDmcTxxnGXqDntRhy9dTS', NULL, 'student', NULL, '2025-12-05 14:50:27', '2025-12-05 14:50:27'),
(3, 'ewkjghi ej', 'sarahgeeajelareyes08@gmail.com', NULL, '$2y$12$EyFgGKS1uO9SqXjrGokqB.MGtICP3OVyM7PnPAnq6rnMnw8W8iq86', NULL, 'student', NULL, '2025-12-13 22:45:00', '2025-12-13 22:45:00'),
(4, 'asdfrf sdfd', 'sarahgajelareyes08@gmail.com', NULL, '$2y$12$y82La28yS6ZlJakLi/oKauQWoLG8tTZSzk6ANQ6dhZ0E/mDcgLmHq', NULL, 'instructor', NULL, '2025-12-13 22:46:20', '2025-12-13 22:46:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_course_code_unique` (`course_code`);

--
-- Indexes for table `course_user`
--
ALTER TABLE `course_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_user_course_id_foreign` (`course_id`),
  ADD KEY `course_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_google_id_unique` (`google_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course_user`
--
ALTER TABLE `course_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_user`
--
ALTER TABLE `course_user`
  ADD CONSTRAINT `course_user_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
