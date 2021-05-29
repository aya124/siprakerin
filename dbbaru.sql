-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 29, 2021 at 01:24 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `siprakerin`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_configs`
--

CREATE TABLE `add_configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_configs`
--

INSERT INTO `add_configs` (`id`, `tipe`, `isi`, `created_at`, `updated_at`) VALUES
(1, 'wks4', 'R. Totok Wisnutoro', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `original_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saved_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('disetujui','belum disetujui','tidak disetujui') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum disetujui',
  `check` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `user_id`, `name`, `address`, `city`, `phone`, `detail`, `created_at`, `updated_at`, `status`, `check`) VALUES
(1, 1, 'Antariksa Net', 'Ngalian', 'Sleman', '62888945435', 'https://antariksa.net/', '2020-01-05 02:29:33', '2021-05-28 11:56:39', 'disetujui', '1'),
(2, 1, 'PT. Gamatechno Indonesia', 'Jl. Cik Di Tiro No.34 Terban Gondokusuman', 'Yogyakarta', '0274566161', 'https://www.gamatechno.com/', '2020-01-05 02:54:41', '2021-04-21 06:07:13', 'disetujui', '1'),
(3, 1, 'PT. Jogja Media Net', 'Jl. Bhineka Tunggal Ika K – 2 Sekip Bulaksumur', 'Yogyakarta', '0274544000', 'http://web.jogjamedianet.com/', '2020-01-05 02:55:41', '2021-04-21 06:12:48', 'belum disetujui', NULL),
(4, 1, 'FIB UGM', 'Jl. Sosio Humaniora Bulaksumur Caturtunggal Depok', 'Sleman', '0274513096', 'https://fib.ugm.ac.id/', '2020-01-05 02:56:28', '2021-04-21 06:04:55', 'disetujui', '1'),
(5, 1, 'Universitas Janabadra', 'Jl. Tentara Rakyat Mataram No.58 Bumijo, Jetis', 'Yogyakarta', '0274561039', 'https://janabadra.ac.id/', '2020-01-05 02:57:17', '2021-04-21 06:14:40', 'belum disetujui', NULL),
(14, 6, 'DSSDI UGM', 'Jalan Pancasila No.1', 'Yogyakarta', '0274515660', 'https://dssdi.ugm.ac.id/', '2021-02-14 03:40:54', '2021-05-28 12:19:10', 'disetujui', '1'),
(16, 1, 'PT. SIMS Jogja Media Net', 'Jalan Kenari', 'Yogyakarta', '085123725423', NULL, '2021-03-09 20:45:56', '2021-05-28 11:36:32', 'belum disetujui', NULL),
(18, 1, 'Fakultas Filsafat UGM', 'Jl. Olahraga Caturtunggal Depok', 'Sleman', '085123725444', 'https://ff.ugm.ac.id/', '2021-05-28 07:14:35', '2021-05-28 07:14:35', 'belum disetujui', NULL);

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
(17, '2020_03_05_102544_teams', 5),
(18, '2020_03_11_183436_submission_student', 6),
(19, '2021_01_03_144058_add_status_to_industries_table', 6),
(20, '2021_01_04_132559_create_reports_table', 7),
(21, '2021_01_04_133248_create_scores_table', 7),
(22, '2021_03_15_044213_create_add_configs_table', 8),
(23, '2021_03_16_025619_create_suggestions_table', 9),
(24, '2021_03_16_030237_add_suggestions_to_industries', 9),
(25, '2021_03_29_104938_create_years_table', 10),
(26, '2021_03_29_104952_create_classes_table', 10),
(27, '2021_05_28_105805_create_students_table', 11),
(28, '2021_05_28_110342_create_submission_suggestions_table', 12),
(29, '2021_05_28_110506_add_suggestions_to_submissions', 12);

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
(1, 'buat-pengajuan', NULL, NULL, '2020-01-16 03:31:08', '2021-04-21 04:26:44'),
(2, 'menu-user', NULL, NULL, '2020-01-16 03:31:17', '2020-02-13 00:23:32'),
(3, 'menu-industri', NULL, NULL, '2020-01-16 03:31:41', '2020-02-13 00:23:16'),
(4, 'validasi-pengajuan', NULL, NULL, '2020-01-16 03:32:06', '2020-02-13 01:01:12'),
(7, 'input-nilai', NULL, NULL, '2020-01-16 03:39:35', '2020-01-16 03:39:35'),
(8, 'menu-role-permission', NULL, NULL, '2020-02-13 00:17:37', '2020-02-13 02:16:40'),
(9, 'upload-laporan-sertif', NULL, NULL, '2020-02-13 00:18:06', '2021-04-21 04:20:25'),
(10, 'menu-status', NULL, NULL, '2020-02-13 00:20:03', '2020-02-13 00:24:56'),
(16, 'rekap-pengajuan', NULL, NULL, '2021-04-21 04:27:11', '2021-04-21 04:27:11'),
(17, 'rekap-nilai', NULL, NULL, '2021-04-21 04:27:40', '2021-04-21 04:27:40'),
(18, 'rekap-laporan-sertif', NULL, NULL, '2021-04-21 04:27:56', '2021-04-21 04:27:56'),
(19, 'data-pengajuan', NULL, NULL, '2021-04-21 05:58:06', '2021-04-21 05:58:06'),
(20, 'menu-tahun', NULL, NULL, '2021-04-21 05:59:54', '2021-04-21 05:59:54');

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
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(7, 2),
(16, 2),
(17, 2),
(18, 2),
(1, 3),
(3, 3),
(9, 3),
(3, 5),
(4, 5),
(16, 5),
(17, 5),
(18, 5),
(3, 6),
(4, 6),
(16, 6),
(17, 6),
(18, 6),
(3, 7),
(4, 7),
(16, 7),
(17, 7),
(18, 7),
(19, 7),
(3, 11),
(4, 11),
(16, 11),
(17, 11),
(18, 11),
(4, 21);

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
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `original_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saved_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(2, 'wali-kelas', 'Wali Kelas', NULL, '2020-01-15 21:01:51', '2020-07-15 18:27:59'),
(3, 'siswa', 'Siswa', NULL, '2020-01-15 21:01:58', '2020-01-20 20:04:16'),
(5, 'wks1', 'Wakil Kepala Sekolah I', NULL, '2020-02-14 02:08:48', '2021-03-11 22:01:57'),
(6, 'kepsek', 'Kepala Sekolah', NULL, '2020-02-14 02:09:23', '2020-02-14 02:09:23'),
(7, 'kps', 'Kepala Program Studi', NULL, '2020-07-15 18:30:06', '2020-07-15 18:30:06'),
(11, 'wks4', 'Wakil Kepala Sekolah IV', NULL, '2021-03-11 20:52:29', '2021-03-11 22:02:11'),
(21, 'kaur-prakerin', 'Kaur Prakerin', NULL, '2021-03-11 21:34:12', '2021-03-11 22:00:50');

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
(2, 16, 'App\\User'),
(2, 17, 'App\\User'),
(2, 18, 'App\\User'),
(2, 19, 'App\\User'),
(2, 20, 'App\\User'),
(2, 32, 'App\\User'),
(3, 6, 'App\\User'),
(3, 57, 'App\\User'),
(3, 58, 'App\\User'),
(3, 71, 'App\\User'),
(5, 42, 'App\\User'),
(6, 38, 'App\\User'),
(7, 14, 'App\\User'),
(11, 43, 'App\\User'),
(21, 44, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `score_1` int(11) NOT NULL,
  `score_2` int(11) NOT NULL,
  `score_3` int(11) NOT NULL,
  `score_4` int(11) NOT NULL,
  `score_5` int(11) NOT NULL,
  `score_6` int(11) NOT NULL,
  `score_7` int(11) NOT NULL,
  `score_8` int(11) NOT NULL,
  `score_9` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `score_1`, `score_2`, `score_3`, `score_4`, `score_5`, `score_6`, `score_7`, `score_8`, `score_9`, `created_at`, `updated_at`) VALUES
(1, 82, 85, 82, 81, 82, 85, 88, 83, 88, '2021-05-25 10:18:28', '2021-05-26 00:20:34');

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
(8, 'Pengajuan ditolak', '2019-12-13 09:27:09', '2020-02-14 01:02:36'),
(9, 'asdasdzzrr', '2021-03-11 20:32:57', '2021-03-11 20:33:27');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nis` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `nis`, `name`, `class_id`, `created_at`, `updated_at`) VALUES
(1, 71, NULL, 'Rara Amilia', 1, '2021-05-28 05:37:08', '2021-05-28 05:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `name`, `accro`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Komputer dan Jaringan', 'TKJ', '2021-03-30 13:34:49', '2021-03-30 13:34:49'),
(2, 'Sistem Informasi, Jaringan dan Aplikasi', 'SIJA', '2021-04-01 01:55:11', '2021-04-01 01:55:11'),
(3, 'Teknik', 'T', '2021-04-01 02:25:01', '2021-04-01 02:25:01'),
(8, 'Teknik Audio Video', 'TAV', '2021-04-01 02:53:39', '2021-04-01 02:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(20) UNSIGNED DEFAULT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `report_id` bigint(20) UNSIGNED DEFAULT NULL,
  `certif_id` bigint(20) UNSIGNED DEFAULT NULL,
  `score_id` bigint(20) UNSIGNED DEFAULT NULL,
  `year_id` bigint(20) NOT NULL,
  `submit_type` int(2) NOT NULL DEFAULT '1' COMMENT '1=utama, 2=alternatif',
  `check` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `student_id`, `start_date`, `finish_date`, `username`, `industry_id`, `teacher_id`, `status_id`, `created_at`, `updated_at`, `report_id`, `certif_id`, `score_id`, `year_id`, `submit_type`, `check`) VALUES
(5, 1, '2021-06-01', '2021-08-31', 'raraa', 14, NULL, 4, '2021-05-28 08:50:25', '2021-05-28 12:04:58', NULL, NULL, NULL, 8, 1, '1'),
(6, NULL, '2021-05-01', '2021-07-31', 'shawnferry', 2, NULL, 8, '2021-05-28 09:21:12', '2021-05-28 11:10:10', NULL, NULL, NULL, 8, 1, NULL),
(7, NULL, '2021-07-01', '2021-12-31', 'raraa', 4, NULL, 1, '2021-05-28 13:26:15', '2021-05-28 13:26:15', NULL, NULL, NULL, 8, 2, NULL);

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
-- Table structure for table `submission_suggestions`
--

CREATE TABLE `submission_suggestions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `submission_id` int(11) NOT NULL,
  `info` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submission_suggestions`
--

INSERT INTO `submission_suggestions` (`id`, `user_id`, `submission_id`, `info`, `status`, `created_at`, `updated_at`) VALUES
(1, 71, 5, 'maaf pak, industri tidak menerima siswa prakerin perempuan', NULL, '2021-05-28 12:04:58', '2021-05-28 12:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `industry_id` int(11) NOT NULL,
  `saran` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`id`, `user_id`, `industry_id`, `saran`, `status`, `created_at`, `updated_at`) VALUES
(2, 16, 1, 'testing\r\ntestin\r\ntesti\r\ntest', NULL, '2021-03-15 20:43:16', '2021-03-15 20:43:16'),
(3, 16, 4, 'saran', NULL, '2021-03-15 20:49:15', '2021-03-15 20:49:15'),
(4, 16, 4, 'saran', NULL, '2021-03-15 20:49:18', '2021-03-15 20:49:18'),
(5, 6, 1, 'adhskd', NULL, '2021-03-17 00:16:00', '2021-03-17 00:16:00'),
(6, 6, 1, 'jqtsqwyu', NULL, '2021-03-17 07:41:35', '2021-03-17 07:41:35'),
(7, 6, 14, 'hhffchg', NULL, '2021-03-17 08:47:58', '2021-03-17 08:47:58'),
(8, 6, 14, 'hhffchg', NULL, '2021-03-17 08:48:01', '2021-03-17 08:48:01'),
(9, 6, 9, 'asgcdsg', NULL, '2021-03-17 08:49:37', '2021-03-17 08:49:37'),
(10, 6, 2, 'xkashcjv', NULL, '2021-03-17 08:50:34', '2021-03-17 08:50:34'),
(11, 6, 2, 'sdfghj', NULL, '2021-03-17 08:52:47', '2021-03-17 08:52:47'),
(12, 6, 2, 'xffbvfe', NULL, '2021-03-17 08:54:09', '2021-03-17 08:54:09'),
(13, 6, 2, 'gges', NULL, '2021-03-17 08:56:32', '2021-03-17 08:56:32'),
(14, 6, 2, 'espo', NULL, '2021-03-17 09:00:17', '2021-03-17 09:00:17'),
(15, 6, 14, 'coba', NULL, '2021-04-11 04:27:42', '2021-04-11 04:27:42'),
(16, 71, 1, 'edit alamat', NULL, '2021-05-28 11:56:39', '2021-05-28 11:56:39'),
(17, 71, 14, 'tes', NULL, '2021-05-28 12:19:10', '2021-05-28 12:19:10');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'jika bukan nip, isi dengan no id guru',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `name`, `nip`, `created_at`, `updated_at`) VALUES
(18, 32, 'Bambang Dwi Sanyata', '1', '2021-03-10 00:37:02', '2021-03-10 00:37:02'),
(19, 38, 'Drs. Agus Waluyo, M.Eng.', '19651227 199412 1 002', '2021-03-14 23:37:03', '2021-03-14 23:37:03'),
(20, 42, 'Drs. Sriyana', '19591126 198603 1 008', '2021-03-14 23:53:58', '2021-03-14 23:53:58'),
(21, 43, 'Drs. R. Totok Wisnutoro', '19650430 199003 1 005', '2021-03-14 23:56:39', '2021-03-14 23:56:39'),
(22, 44, 'Sulastri, M.Pd.', '19741020 200501 2 008', '2021-03-14 23:58:09', '2021-03-14 23:58:09');

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
  `submit_lock` int(2) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `gender`, `email`, `email_verified_at`, `submit_lock`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'male', 'admin@local.host', '2019-10-10 08:15:57', NULL, '$2y$10$PqT/ucrW5n13KNpRXkmvJO0P.04HAhfPttpEbUomCSGnsyEzTDccK', 'FHL7PrSHws5llziwOVgZ8AVl4OHf6iuF8tfymUFqEH3E6jXrdke6g2EWL4vt', '2019-10-10 08:15:58', '2020-02-19 02:38:55'),
(6, 'shawnferry', 'Shawn Ferry V', 'male', 'shawnferryv@gmail.com', '2019-10-10 08:16:00', 1, '$2y$10$yi531uMJOZyt6XJ3RiHUn.S2ErhRLMK9TBsr45q7XU9Y1N0kgaD72', 'Vgn1r8Pj7yrfLULtDTsKmU8Ze2Zz4nzi2nVemq4nC6A08OvNddUV3nMDpUHH', '2019-10-10 08:16:03', '2021-05-28 09:21:12'),
(14, 'ugik', 'Sugiarto, S.T.', 'male', 'mrantazy68@gmail.com', NULL, NULL, '$2y$10$5o6YacDf/4fpLZuJHky/Wuyq9BqDaJEDvQKh7XyT6yx.gLreAV.B6', NULL, '2020-02-04 00:57:16', '2021-03-15 00:02:34'),
(16, 'sigitk', 'E. Sigit Kuncoro', 'male', 'sigitk@gmail.com', NULL, NULL, '$2y$10$N.6A82BBT7ZnxdU5Toni0.tqJXKg3Rqw0zpBgW8jfPIe/BOlWvU5G', NULL, '2020-02-04 03:00:15', '2021-03-09 21:58:52'),
(17, 'endah', 'M. Endah Titisari', 'female', 'endah@gmail.com', NULL, NULL, '$2y$10$dNz.ehbr12qlPJgnXxDsdO0vtqnRTKtC0hN3lTJy5xiMhZLQbV1H6', NULL, '2020-02-04 03:01:10', '2020-02-04 03:01:10'),
(18, 'ratnays', 'Ratna Yunita Sari', 'female', 'ratna@gmail.com', NULL, NULL, '$2y$10$ELe3Qak62gdfTEwaY9YlGupgpUtRUkjUHuPtdDprXYoG2m1J/FkM2', NULL, '2020-02-04 03:01:45', '2020-02-04 03:01:45'),
(19, 'retna', 'Rr. Retna Trimantariningsih', 'female', 'retna@gmail.com', NULL, NULL, '$2y$10$2N6ZJkJAfUkCGf.4aCYrLuE/y8lIjYNQxwjd2p632WhW9y5jEuMxG', NULL, '2020-02-04 03:02:14', '2021-03-10 00:09:59'),
(20, 'yunianto', 'Yunianto Hermawan', 'male', 'yuniantohermawan@gmail.com', NULL, NULL, '$2y$10$TKS0LHax5yRabgTnw1ypzOQwZ6i2rKLrG2tjb0oGEKUzas23YJn.C', NULL, '2020-02-04 03:02:42', '2020-06-12 16:39:01'),
(32, 'bambangds', 'Bambang Dwi Sanyata', 'male', 'bambangds@gmail.com', NULL, NULL, '$2y$10$QasfKXvuQEetWta/mkXi3enFu8AccVHTyw4PSbP.We42f/9.IRhGO', NULL, '2021-03-10 00:37:02', '2021-04-21 04:24:28'),
(38, 'aguswaluyo', 'Drs. Agus Waluyo, M.Eng.', 'male', 'aguswaluyo@gmail.com', NULL, NULL, '$2y$10$FD1w656ggf3bLLINd2CxceV.nDivtaunYZRyRQ7JTItp/vuJ5QkuK', NULL, '2021-03-14 23:37:03', '2021-03-14 23:37:03'),
(42, 'sriyana', 'Drs. Sriyana', 'male', 'sriyana@gmail.com', NULL, NULL, '$2y$10$p9Io9IHmRWd8OVA4kX/b6ujGVrR.HvUS.lh7ZiSNTquhVQuVyNasS', NULL, '2021-03-14 23:53:58', '2021-03-14 23:53:58'),
(43, 'totokw', 'Drs. R. Totok Wisnutoro', 'male', 'totokw@gmail.com', NULL, NULL, '$2y$10$1Wesl91jMLYYGR2grBGsG.GUq8i754MBu90FsDM11Fvcpach.5hWu', NULL, '2021-03-14 23:56:39', '2021-03-14 23:56:39'),
(44, 'sulastri', 'Sulastri, M.Pd.', 'female', 'sulastri@gmail.com', NULL, NULL, '$2y$10$3.bn8c9MhP1Y3NoSfbc44up6sC2BaL1L4yYw36X.vExeDY5sYMkj2', NULL, '2021-03-14 23:58:09', '2021-03-14 23:58:09'),
(71, 'raraa', 'Rara Amilia', 'female', 'aya12496@gmail.com', NULL, 1, '$2y$10$RFcsF4dUaGdiedkOSPsV8eRadszlDD06V.qKAEa88CYbB7fhIpje2', NULL, '2021-05-28 05:37:08', '2021-05-28 13:26:15'),
(72, 'ayashofia', 'Aya Shofia', 'female', 'ayashofia@gmail.com', NULL, NULL, '$2y$10$1wm0SSKsWYU6wKp8ib2q6e1OTijJ3DierA31a9.vcqK3/pkCnS03e', NULL, '2021-05-29 00:15:51', '2021-05-29 00:15:51'),
(73, 'nouvalat', 'Nouval Arya', 'male', 'nouvalat27@gmail.com', NULL, NULL, '$2y$10$NwQ2WlIGFgrjcRpRxr8p1e1ybfg0D3FwEl2V5il7QgbuILsIvfnbu', NULL, '2021-05-29 00:29:02', '2021-05-29 00:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `year`, `active`, `created_at`, `updated_at`) VALUES
(2, 2020, 0, '2021-03-29 09:08:13', '2021-03-29 09:08:13'),
(4, 2016, 0, '2021-03-29 09:08:30', '2021-04-01 08:03:12'),
(5, 2017, 0, '2021-03-29 09:08:37', '2021-04-21 04:18:06'),
(6, 2018, 0, '2021-03-29 09:08:47', '2021-03-29 09:08:47'),
(7, 2019, 0, '2021-03-29 09:08:54', '2021-03-29 09:08:54'),
(8, 2021, 1, '2021-03-29 09:09:02', '2021-04-21 04:18:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_configs`
--
ALTER TABLE `add_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_user_id_foreign` (`user_id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `industries_user_id_foreign` (`user_id`) USING BTREE;

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
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_user_id_foreign` (`user_id`);

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
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `students_user_id_foreign` (`user_id`),
  ADD KEY `students_class_id_foreign` (`class_id`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submissions_industry_id_foreign` (`industry_id`),
  ADD KEY `submissions_teacher_id_foreign` (`teacher_id`),
  ADD KEY `submissions_status_id_foreign` (`status_id`),
  ADD KEY `submissions_ibfk_1` (`username`),
  ADD KEY `submissions_report_id_foreign` (`report_id`),
  ADD KEY `submissions_score_id_foreign` (`score_id`),
  ADD KEY `submissions_certif_id_foreign` (`certif_id`),
  ADD KEY `submissions_student_id_foreign` (`student_id`);

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
  ADD KEY `submission_student_username_foreign` (`username`);

--
-- Indexes for table `submission_suggestions`
--
ALTER TABLE `submission_suggestions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submission_suggestions_submission_id_foreign` (`submission_id`),
  ADD KEY `submission_suggestions_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_configs`
--
ALTER TABLE `add_configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `submission_details`
--
ALTER TABLE `submission_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submission_suggestions`
--
ALTER TABLE `submission_suggestions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `industries`
--
ALTER TABLE `industries`
  ADD CONSTRAINT `industries_username_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE,
  ADD CONSTRAINT `submissions_ibfk_2` FOREIGN KEY (`certif_id`) REFERENCES `certificates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submissions_industry_id_foreign` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `submissions_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submissions_score_id_foreign` FOREIGN KEY (`score_id`) REFERENCES `scores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `submission_student_submission_id_foreign` FOREIGN KEY (`submission_id`) REFERENCES `submissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submission_student_username_foreign` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
