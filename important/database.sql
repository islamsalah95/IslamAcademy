-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2022 at 07:18 AM
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
-- Database: `vue`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `course_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_price` smallint(6) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `playlist_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `playlist_id`, `user_id`, `user_name`, `created_at`, `updated_at`) VALUES
(1, 'fdfdfdfdf', 3, 7, 'User', '2022-10-11 08:44:19', '2022-10-11 08:44:19'),
(3, 'ecellent', 8, 7, 'User', '2022-10-11 09:24:38', '2022-10-11 09:24:38'),
(4, 'rrrrr', 7, 1, 'islam', '2022-10-11 10:25:47', '2022-10-11 10:25:47'),
(5, 'rrrrrsecond', 7, 1, 'islam', '2022-10-11 10:25:47', '2022-10-11 10:25:47'),
(6, 'new', 7, 1, 'islam', '2022-10-11 10:36:11', '2022-10-11 10:36:11'),
(7, 'bad', 7, 1, 'islam', '2022-10-11 10:40:02', '2022-10-11 10:40:02'),
(8, 'again', 7, 1, 'islam', '2022-10-11 10:41:37', '2022-10-11 10:41:37'),
(9, 'fffffffff', 8, 1, 'islam', '2022-10-11 10:42:36', '2022-10-11 10:42:36'),
(10, 'fdfdfdfff', 8, 1, 'islam', '2022-10-11 10:42:46', '2022-10-11 10:42:46'),
(11, 'excellent content', 7, 1, 'islam', '2022-10-13 08:07:29', '2022-10-13 08:07:29'),
(12, 'great', 9, 1, 'islam', '2022-10-13 09:02:53', '2022-10-13 09:02:53'),
(13, 'wow', 9, 7, 'User', '2022-10-13 09:04:12', '2022-10-13 09:04:12'),
(14, 'new', 10, 7, 'User', '2022-10-13 10:55:31', '2022-10-13 10:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coach` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `des_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` smallint(6) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `coach`, `title`, `desc_en`, `des_ar`, `price`, `image`, `created_at`) VALUES
(1, 'test1', 'VueJsyyyyy', 'vue from scratchy', 'فيو من البداية لاحتراف', 500, 'http://127.0.0.1:8000/assets/images/testImage.jpg', '2022-10-07 02:28:24'),
(2, 'test2', 'VueJsyyyyy', 'vue from scratchy', 'فيو من البداية لاحتراف', 100, 'http://127.0.0.1:8000/assets/images/testImage.jpg', '2022-10-07 02:31:28'),
(3, 'test3', 'VueJsyyyyy', 'vue from scratchy', 'فيو من البداية لاحتراف', 2000, 'http://127.0.0.1:8000/assets/images/testImage.jpg', '2022-10-08 23:55:26'),
(15, 'test9', 'node js', 'vue from scratchy', 'فيو من البداية لاحتراف', 500, 'http://127.0.0.1:8000/assets/images/test.jpg', '2022-10-13 08:49:24');

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
(5, '2022_10_03_011141_create_courses_table', 1),
(6, '2022_10_03_011413_create_carts_table', 1),
(7, '2022_10_03_011443_create_playlists_table', 1),
(8, '2022_10_03_011544_create_payings_table', 1),
(9, '2022_10_11_070000_create_viewers_table', 2),
(11, '2022_10_11_070621_create_comments_table', 3);

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
-- Table structure for table `payings`
--

CREATE TABLE `payings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `course_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_price` smallint(6) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payings`
--

INSERT INTO `payings` (`id`, `course_id`, `course_title`, `course_price`, `user_id`, `user_name`, `course_image`, `created_at`) VALUES
(23, 1, 'VueJsyyyyy', 500, 1, 'islam', 'http://127.0.0.1:8000/assets/images/testImage.jpg', '2022-10-14 04:02:00'),
(24, 15, 'node js', 500, 7, 'User', 'http://127.0.0.1:8000/assets/images/test.jpg', '2022-10-14 04:15:43'),
(25, 3, 'VueJsyyyyy', 2000, 1, 'islam', 'http://127.0.0.1:8000/assets/images/testImage.jpg', '2022-10-14 04:51:14');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(3, 'App\\Models\\User', 2, 'Android', 'd2b6c688dea1cf4d80ac31988e0752c92ce0ebe25f30f9ea07ae387e7ce2ac7d', '[\"*\"]', '2022-10-09 21:33:53', '2022-10-09 21:29:25', '2022-10-09 21:33:53'),
(4, 'App\\Models\\User', 3, 'Android', 'addb2d3c178459fe7c2ca51a95f0cefa7432776f229a343da79b67c834ca1827', '[\"*\"]', '2022-10-09 21:34:39', '2022-10-09 21:33:35', '2022-10-09 21:34:39'),
(5, 'App\\Models\\User', 4, 'Android', 'a689e9cc77a28f85f023815cf2d83e80a962e6f0055b2b23a473f678ba5fab10', '[\"*\"]', NULL, '2022-10-09 21:37:45', '2022-10-09 21:37:45'),
(6, 'App\\Models\\User', 5, 'Android', '690db55c3144e399a84b82d99121b48e0b02dc8747ff00179344cc8e5459ea79', '[\"*\"]', NULL, '2022-10-09 21:39:02', '2022-10-09 21:39:02'),
(78, 'App\\Models\\User', 8, 'Android', 'a2b4a329024af549ad24e40ed5bae163350e4123e54bdf80e64c240a383ded5b', '[\"*\"]', NULL, '2022-10-13 10:11:51', '2022-10-13 10:11:51'),
(79, 'App\\Models\\User', 9, 'Android', '578ce338cfc06b1379d73e00d8543baac2f1452a387439b317129527856b5cdd', '[\"*\"]', NULL, '2022-10-13 10:17:51', '2022-10-13 10:17:51'),
(80, 'App\\Models\\User', 10, 'Android', 'f09451df26f7955f4191fc1efc40b626daaf8a6fabb6e0a98d360066420748fa', '[\"*\"]', NULL, '2022-10-13 10:25:06', '2022-10-13 10:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewers` int(6) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `course_id`, `video`, `viewers`, `content`, `created_at`, `updated_at`) VALUES
(3, 1, 'video.mp4', 39, 'introduction (2) about vueJs', '2022-10-09 09:41:20', '2022-10-14 02:02:54'),
(6, 3, 'playlis.mp4', 0, 'fggg', '2022-10-10 06:19:59', NULL),
(7, 2, 'playlis.mp4', 2, 'fdf', '2022-10-10 06:23:59', '2022-10-11 08:10:48'),
(8, 2, 'playlis.mp4', 2, 'test', '2022-10-10 06:45:32', '2022-10-11 08:10:50'),
(9, 15, 'http://127.0.0.1:8000/assets/videos/playlis.mp4', 2, 'good content', '2022-10-13 08:57:27', '2022-10-13 07:04:05'),
(10, 15, 'http://127.0.0.1:8000/assets/videos/VueJsyyyyy/playlis.mp4', 1, 'node course Js', '2022-10-13 10:53:42', '2022-10-13 08:55:18'),
(11, 15, 'http://127.0.0.1:8000/assets/videos/VueJsyyyyy/playlis.mp4', 1, 'uuuuuuuuuuuuuu', '2022-10-14 04:15:00', '2022-10-14 02:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `type`, `created_at`, `updated_at`, `code`) VALUES
(1, 'islam', 'islamm1995@gmail.com', '2022-10-07 00:26:13', '$2y$10$Ei0RVD2JmGygooVaIYVS/eZjh/JklPz.02VPbtq..WBrlYXxWF/JC', NULL, 'user', '2022-10-07 00:23:06', '2022-10-07 00:26:13', NULL),
(7, 'User', 'newuser@gmail.com', '2022-10-09 22:21:59', '$2y$10$Ei0RVD2JmGygooVaIYVS/eZjh/JklPz.02VPbtq..WBrlYXxWF/JC', NULL, 'admin', '2022-10-09 22:18:32', '2022-10-09 22:21:59', NULL),
(8, 'islamm', 'islamm@gmail.com', NULL, '$2y$10$QlP/CpbpLDgDbIQMwh9.teo6KiEplRPAG1eI9bn44rd.M5dLhmKAm', NULL, 'user', '2022-10-13 10:11:51', '2022-10-13 10:11:51', NULL),
(9, 'ttt', 'ttt@gmail.com', NULL, '$2y$10$GZzj2wGo8XXb7Kamc0oBK.p2FMVLRDxTBk4ey7AaPsOgbPyCzQc9K', NULL, 'user', '2022-10-13 10:17:51', '2022-10-13 10:17:51', NULL),
(10, 'xvv', 'islamm1xv995@gmail.com', NULL, '$2y$10$nW0.bulRujtgyGI3ZonZMOHyi5rycsTCSWzJEbpREBKL9HicqUg/W', NULL, 'user', '2022-10-13 10:25:06', '2022-10-13 10:25:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `viewers`
--

CREATE TABLE `viewers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `viewers_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `viewers`
--

INSERT INTO `viewers` (`id`, `viewers_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 3, 7, '2022-10-11 08:00:58', '2022-10-11 08:00:58'),
(2, 8, 7, '2022-10-11 08:04:59', '2022-10-11 08:04:59'),
(3, 7, 7, '2022-10-11 08:05:00', '2022-10-11 08:05:00'),
(4, 7, 1, '2022-10-11 10:10:48', '2022-10-11 10:10:48'),
(5, 8, 1, '2022-10-11 10:10:50', '2022-10-11 10:10:50'),
(6, 9, 1, '2022-10-13 09:02:43', '2022-10-13 09:02:43'),
(7, 9, 7, '2022-10-13 09:04:05', '2022-10-13 09:04:05'),
(8, 10, 7, '2022-10-13 10:55:18', '2022-10-13 10:55:18'),
(9, 3, 1, '2022-10-14 04:02:54', '2022-10-14 04:02:54'),
(10, 11, 7, '2022-10-14 04:15:55', '2022-10-14 04:15:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_course_id_foreign` (`course_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_playlist_id_foreign` (`playlist_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payings`
--
ALTER TABLE `payings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payings_course_id_foreign` (`course_id`),
  ADD KEY `payings_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `playlists_course_id_foreign` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `viewers`
--
ALTER TABLE `viewers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `viewers_viewers_id_foreign` (`viewers_id`),
  ADD KEY `viewers_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payings`
--
ALTER TABLE `payings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `viewers`
--
ALTER TABLE `viewers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_playlist_id_foreign` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payings`
--
ALTER TABLE `payings`
  ADD CONSTRAINT `payings_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `payings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `viewers`
--
ALTER TABLE `viewers`
  ADD CONSTRAINT `viewers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `viewers_viewers_id_foreign` FOREIGN KEY (`viewers_id`) REFERENCES `playlists` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
