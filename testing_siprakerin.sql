-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 17, 2020 at 12:27 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing_siprakerin`
--
CREATE DATABASE IF NOT EXISTS `testing_siprakerin` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `testing_siprakerin`;

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `created_by`, `name`, `address`, `city`, `phone`, `detail`, `created_at`, `updated_at`) VALUES
(1, 1, 'Antariksa Net', 'Ngalian', 'Sleman', 628889, 'networking', '2020-01-05 02:29:33', '2020-02-09 23:29:18'),
(2, 1, 'PT. Gamatechno', 'Jl. Cik Di Tiro No.34 Terban Gondokusuman', 'Yogyakarta', 6288, 'web, networking', '2020-01-05 02:54:41', '2020-03-12 02:56:40'),
(3, 1, 'PT. Jogja Media Net', 'Jl. Bhineka Tunggal Ika K – 2 Sekip Bulaksumur', 'Yogyakarta', 6288, 'networking', '2020-01-05 02:55:41', '2020-01-05 02:55:41'),
(4, 1, 'FIB UGM', 'Jl. Sosio Humaniora Bulaksumur Caturtunggal Depok', 'Yogyakarta', 6288, 'Networking administration and maintenance', '2020-01-05 02:56:28', '2020-03-12 02:56:29'),
(5, 1, 'Universitas Janabadra', 'Jl. Tentara Rakyat Mataram No.58 Bumijo Jetis', 'Yogyakarta', 62878, 'Networking administration and maintenance', '2020-01-05 02:57:17', '2020-03-12 02:56:50'),
(8, 1, 'vbdsjhvbs', 'dfksdjv', 'dsnbhds', 6288, 'svs', '2020-01-06 02:57:38', '2020-01-06 02:57:38');

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
(3, '2019_10_03_042214_create_students_table', 1),
(4, '2019_10_05_065956_create_industries_table', 1),
(5, '2019_10_05_070027_create_teachers_table', 1),
(6, '2019_10_05_070602_create_statuses_table', 1),
(7, '2019_10_05_095412_create_submissions_table', 2),
(8, '2020_01_16_022001_laratrust_setup_tables', 3),
(16, '2020_01_21_042451_create_submission_details_table', 4),
(17, '2020_03_05_102544_teams', 5);

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
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'menu-pengajuan', NULL, NULL, '2020-01-16 03:31:08', '2020-02-13 00:23:26'),
(2, 'menu-user', NULL, NULL, '2020-01-16 03:31:17', '2020-02-13 00:23:32'),
(3, 'menu-industri', NULL, NULL, '2020-01-16 03:31:41', '2020-02-13 00:23:16'),
(4, 'validasi-pengajuan', NULL, NULL, '2020-01-16 03:32:06', '2020-02-13 01:01:12'),
(7, 'input-nilai', NULL, NULL, '2020-01-16 03:39:35', '2020-01-16 03:39:35'),
(8, 'menu-role-permission', NULL, NULL, '2020-02-13 00:17:37', '2020-02-13 02:16:40'),
(9, 'upload-laporan', NULL, NULL, '2020-02-13 00:18:06', '2020-02-13 00:25:15'),
(10, 'menu-status', NULL, NULL, '2020-02-13 00:20:03', '2020-02-13 00:24:56'),
(11, 'menu-guru-petugas', NULL, NULL, '2020-02-13 01:55:10', '2020-02-17 10:13:46'),
(14, 'profil', NULL, NULL, '2020-02-14 02:18:57', '2020-02-14 02:18:57'),
(15, 'cetak', NULL, NULL, '2020-02-14 02:19:40', '2020-02-14 02:19:40');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(2, 1),
(3, 1),
(4, 1),
(8, 1),
(10, 1),
(11, 1),
(1, 3),
(3, 3),
(9, 3),
(7, 4),
(4, 5),
(4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', NULL, '2020-01-15 20:51:30', '2020-01-20 20:08:25'),
(2, 'petugas', 'Petugas', NULL, '2020-01-15 21:01:51', '2020-02-14 02:10:12'),
(3, 'siswa', 'Siswa', NULL, '2020-01-15 21:01:58', '2020-01-20 20:04:16'),
(4, 'pembimbing_industri', 'Pembimbing Industri', NULL, '2020-01-15 21:03:32', '2020-01-20 20:03:46'),
(5, 'wks', 'Wakil Kepala Sekolah', NULL, '2020-02-14 02:08:48', '2020-02-14 02:09:43'),
(6, 'kepsek', 'Kepala Sekolah', NULL, '2020-02-14 02:09:23', '2020-02-14 02:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(2, 14, 'App\\User'),
(2, 16, 'App\\User'),
(2, 17, 'App\\User'),
(2, 18, 'App\\User'),
(2, 19, 'App\\User'),
(2, 20, 'App\\User'),
(3, 6, 'App\\User'),
(3, 15, 'App\\User'),
(5, 21, 'App\\User'),
(6, 22, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Menunggu persetujuan', '2019-12-11 06:20:07', '2020-02-10 03:35:55'),
(4, 'Pengajuan disetujui', '2019-12-13 09:25:43', '2020-02-14 01:02:23'),
(5, 'Surat Pengantar belum diunggah', '2019-12-13 09:26:22', '2019-12-13 09:26:22'),
(6, 'Surat dari Industri belum diunggah', '2019-12-13 09:26:42', '2020-02-14 05:39:01'),
(7, 'Berkas lengkap', '2019-12-13 09:26:55', '2019-12-13 09:26:55'),
(8, 'Pengajuan ditolak', '2019-12-13 09:27:09', '2020-02-14 01:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `start_date`, `finish_date`, `username`, `industry_id`, `teacher_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, '2020-07-01', '2020-12-26', 'shawnferry', 1, NULL, 7, '2020-02-09 23:22:29', '2020-02-13 06:16:55'),
(3, '2020-07-01', '2020-09-30', 'shawnferry', 4, NULL, 7, '2020-02-12 19:27:52', '2020-03-10 06:19:46'),
(4, '2020-02-14', '2020-02-29', 'shawnferry', 2, NULL, 6, '2020-02-14 04:19:43', '2020-03-12 05:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `submission_details`
--

CREATE TABLE `submission_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `submission_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_type` enum('suratpengantar','suratbalasan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submission_details`
--

INSERT INTO `submission_details` (`id`, `submission_id`, `name`, `upload_type`, `full_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'surat-pengantar-wks-sample.jpg', 'suratpengantar', '/Applications/MAMP/htdocs/testing/public/images/suratpengantar/', '2020-03-10 02:25:40', '2020-03-10 02:25:40'),
(2, 1, 'surat-pengantar-wks-sample.jpg', 'suratpengantar', '/Applications/MAMP/htdocs/testing/public/images/suratpengantar/', '2020-03-10 02:25:59', '2020-03-10 02:25:59'),
(3, 1, '9487-40240-5-PB.pdf', 'suratbalasan', '/Applications/MAMP/htdocs/testing/public/images/suratbalasan/', '2020-03-10 02:43:10', '2020-03-10 02:43:10'),
(4, 3, '1172-Article Text-3149-1-10-20180621.pdf', 'suratpengantar', '/Applications/MAMP/htdocs/testing/public/images/suratpengantar/', '2020-03-10 06:11:26', '2020-03-10 06:11:26'),
(5, 3, 'PengumumanPembayaranGenap_2020.pdf', 'suratbalasan', '/Applications/MAMP/htdocs/testing/public/images/suratbalasan/', '2020-03-10 06:19:46', '2020-03-10 06:19:46'),
(6, 4, 'cetak_krs_10.pdf', 'suratpengantar', '/Applications/MAMP/htdocs/testing/public/images/suratpengantar/', '2020-03-12 05:15:21', '2020-03-12 05:15:21'),
(7, 4, 'WhatsApp Image 2020-01-10 at 14.19.20 (1).jpeg', 'suratpengantar', '/Applications/MAMP/htdocs/testing/public/images/suratpengantar/', '2020-03-12 05:19:17', '2020-03-12 05:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `submission_student`
--

CREATE TABLE `submission_student` (
  `submission_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'Sugiarto', 'male', '2019-12-17 06:31:30', '2020-01-02 23:25:06'),
(2, 'Rr. Retna Trimantariningsih', 'male', '2019-12-17 06:36:25', '2019-12-17 20:14:19'),
(3, 'M. Endah Titisari', 'male', '2019-12-17 06:36:34', '2019-12-17 17:03:42'),
(4, 'Yunianto Hermawan', 'male', '2019-12-17 16:47:46', '2019-12-17 20:14:40'),
(5, 'E. Sigit Kuncoro', 'male', '2019-12-17 19:38:05', '2019-12-17 20:15:03'),
(7, 'Ratna Yunita Sari', 'male', '2019-12-17 20:15:17', '2019-12-17 20:15:17'),
(8, 'Bambang Dwi Sanyata', 'male', '2019-12-17 20:15:46', '2019-12-17 20:15:46'),
(16, 'adssggss', 'male', '2020-01-13 07:19:52', '2020-01-13 07:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `gender`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'male', 'admin@local.host', '2019-10-10 08:15:57', '$2y$10$PqT/ucrW5n13KNpRXkmvJO0P.04HAhfPttpEbUomCSGnsyEzTDccK', 'YZ1sVCbsEAAwgWwCYelpjj5fX7DkKIqYcQQCKdZBgV9ykyTgupuow6RiRb9H', '2019-10-10 08:15:58', '2020-02-19 02:38:55'),
(6, 'shawnferry', 'Shawn Ferry V', 'male', 'shawnferryv@gmail.com', '2019-10-10 08:16:00', '$2y$10$yi531uMJOZyt6XJ3RiHUn.S2ErhRLMK9TBsr45q7XU9Y1N0kgaD72', 'zLwzZttIdsJxfyeaSBPXqMvZJA1ddoVqha9mc4xcgEaXdCGXgBFX5PasDWJ8', '2019-10-10 08:16:03', '2020-01-14 02:35:37'),
(14, 'ugik', 'Sugiarto, S.T.', 'male', 'mrantazy@gmail.com', NULL, '$2y$10$5o6YacDf/4fpLZuJHky/Wuyq9BqDaJEDvQKh7XyT6yx.gLreAV.B6', NULL, '2020-02-04 00:57:16', '2020-02-04 02:57:51'),
(15, 'raraa', 'Rara Amilia', 'female', 'aya12496@gmail.com', NULL, '$2y$10$CiG4rOB3Ojyx74anTNHRRODwUF/ytaKVhgLfUqHWuDvAvRmwRJHti', NULL, '2020-02-04 02:58:56', '2020-02-04 02:59:10'),
(16, 'sigitk', 'E. Sigit Kuncoro', 'male', 'sigit@gmail.com', NULL, '$2y$10$N.6A82BBT7ZnxdU5Toni0.tqJXKg3Rqw0zpBgW8jfPIe/BOlWvU5G', NULL, '2020-02-04 03:00:15', '2020-02-04 03:00:15'),
(17, 'endaht', 'M. Endah Titisari', 'female', 'endah@gmail.com', NULL, '$2y$10$dNz.ehbr12qlPJgnXxDsdO0vtqnRTKtC0hN3lTJy5xiMhZLQbV1H6', NULL, '2020-02-04 03:01:10', '2020-02-04 03:01:10'),
(18, 'ratnays', 'Ratna Yunita Sari', 'female', 'ratna@gmail.com', NULL, '$2y$10$ELe3Qak62gdfTEwaY9YlGupgpUtRUkjUHuPtdDprXYoG2m1J/FkM2', NULL, '2020-02-04 03:01:45', '2020-02-04 03:01:45'),
(19, 'retna', 'Rr. Retna Trimantariningsih', 'male', 'retna@gmail.com', NULL, '$2y$10$2N6ZJkJAfUkCGf.4aCYrLuE/y8lIjYNQxwjd2p632WhW9y5jEuMxG', NULL, '2020-02-04 03:02:14', '2020-02-04 03:02:14'),
(20, 'yunianto', 'Yunianto Hermawan', 'male', 'yuniantohermawan@gmail.com', NULL, '$2y$10$TKS0LHax5yRabgTnw1ypzOQwZ6i2rKLrG2tjb0oGEKUzas23YJn.C', NULL, '2020-02-04 03:02:42', '2020-06-12 16:39:01'),
(21, 'wks', 'WKS', 'male', 'wks@gmail.com', NULL, '$2y$10$vrzrEoXQxLVgMrkTInK7VeWdrhsr2VLl9RRgr3Abj28mLXg7z0hti', NULL, '2020-02-14 02:13:24', '2020-02-14 02:13:24'),
(22, 'kepsek', 'Kepala Sekolah', 'male', 'kepsek@gmail.com', NULL, '$2y$10$ATOdEpcgXrutrCrbOFXLE./dbFRSM81laoh14orENcfA/wWvnm/7q', NULL, '2020-02-14 02:14:19', '2020-02-14 02:14:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `industries_username_foreign` (`created_by`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_ibfk_1` (`username`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submissions_industry_id_foreign` (`industry_id`),
  ADD KEY `submissions_teacher_id_foreign` (`teacher_id`),
  ADD KEY `submissions_status_id_foreign` (`status_id`),
  ADD KEY `submissions_ibfk_1` (`username`);

--
-- Indexes for table `submission_details`
--
ALTER TABLE `submission_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submission_details_submission_id_foreign` (`submission_id`);

--
-- Indexes for table `submission_student`
--
ALTER TABLE `submission_student`
  ADD KEY `submission_student_submission_id_foreign` (`submission_id`),
  ADD KEY `submission_student_ibfk1` (`username`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `submission_details`
--
ALTER TABLE `submission_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `industries`
--
ALTER TABLE `industries`
  ADD CONSTRAINT `industries_username_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE,
  ADD CONSTRAINT `submissions_industry_id_foreign` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `submissions_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `submissions_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `submission_details`
--
ALTER TABLE `submission_details`
  ADD CONSTRAINT `submission_details_submission_id_foreign` FOREIGN KEY (`submission_id`) REFERENCES `submissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `submission_student`
--
ALTER TABLE `submission_student`
  ADD CONSTRAINT `submission_student_ibfk1` FOREIGN KEY (`username`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `submission_student_submission_id_foreign` FOREIGN KEY (`submission_id`) REFERENCES `submissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
