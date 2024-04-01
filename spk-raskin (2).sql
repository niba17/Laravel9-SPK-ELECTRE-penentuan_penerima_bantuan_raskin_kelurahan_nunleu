-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 09:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-raskin`
--

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `cost_benefit` varchar(128) NOT NULL,
  `nilai_preferensi` bigint(20) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `cost_benefit`, `nilai_preferensi`, `updated_at`, `created_at`) VALUES
(16, 'Penghasilan Per Bulan', 'Cost', 45, '2023-05-29 03:51:32', '2023-04-21 09:18:23'),
(18, 'Jumlah Tanggungan', 'Benefit', 10, '2023-05-29 03:51:58', '2023-04-24 00:21:05'),
(19, 'Jenis Dinding Rumah', 'Cost', 10, '2023-05-29 03:52:21', '2023-04-24 00:22:28'),
(20, 'Jenis Lantai', 'Cost', 10, '2023-05-29 08:25:51', '2023-04-24 00:25:50'),
(24, 'Sumber Air', 'Cost', 10, '2023-05-29 03:52:59', '2023-05-29 03:52:59'),
(25, 'Sumber Penerangan', 'Cost', 10, '2023-05-29 03:53:17', '2023-05-29 03:53:17'),
(26, 'Jumlah Tabungan', 'Cost', 5, '2023-05-29 03:58:12', '2023-05-29 03:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_sub_kriteria`
--

CREATE TABLE `kriteria_sub_kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_kriteria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bobot` double NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria_sub_kriteria`
--

INSERT INTO `kriteria_sub_kriteria` (`id`, `kriteria_id`, `sub_kriteria_id`, `bobot`, `updated_at`, `created_at`) VALUES
(51, 16, 23, 4, '2023-05-29 08:12:21', '2023-05-29 08:12:21'),
(52, 16, 24, 3, '2023-05-29 08:13:18', '2023-05-29 08:13:18'),
(53, 16, 25, 2, '2023-05-29 08:14:07', '2023-05-29 08:14:07'),
(54, 16, 26, 1, '2023-05-29 08:14:32', '2023-05-29 08:14:32'),
(55, 18, 27, 1, '2023-05-29 08:15:51', '2023-05-29 08:15:51'),
(56, 18, 28, 2, '2023-05-29 08:26:57', '2023-05-29 08:26:57'),
(57, 18, 29, 3, '2023-05-29 08:28:23', '2023-05-29 08:28:23'),
(58, 18, 30, 4, '2023-05-29 08:29:48', '2023-05-29 08:29:48'),
(59, 19, 31, 4, '2023-05-29 08:48:09', '2023-05-29 08:48:09'),
(60, 19, 32, 3, '2023-05-29 09:00:12', '2023-05-29 09:00:12'),
(61, 19, 33, 2, '2023-05-29 09:01:34', '2023-05-29 09:00:35'),
(62, 19, 34, 1, '2023-05-29 09:01:48', '2023-05-29 09:01:20'),
(63, 20, 35, 4, '2023-05-29 09:02:25', '2023-05-29 09:02:25'),
(64, 20, 36, 3, '2023-05-29 09:02:44', '2023-05-29 09:02:44'),
(65, 20, 37, 2, '2023-05-29 09:03:06', '2023-05-29 09:03:06'),
(66, 20, 38, 1, '2023-05-29 09:03:26', '2023-05-29 09:03:26'),
(67, 24, 39, 4, '2023-05-29 09:04:36', '2023-05-29 09:04:36'),
(68, 24, 40, 3, '2023-05-29 09:04:59', '2023-05-29 09:04:59'),
(69, 24, 41, 2, '2023-05-29 09:17:11', '2023-05-29 09:17:11'),
(70, 24, 42, 1, '2023-05-29 09:17:32', '2023-05-29 09:17:32'),
(71, 25, 43, 4, '2023-05-29 09:18:16', '2023-05-29 09:18:16'),
(72, 25, 45, 3, '2023-05-29 09:19:07', '2023-05-29 09:19:07'),
(73, 25, 44, 2, '2023-05-29 09:19:28', '2023-05-29 09:19:28'),
(74, 25, 46, 1, '2023-05-29 09:19:49', '2023-05-29 09:19:49'),
(75, 26, 47, 4, '2023-05-29 09:20:27', '2023-05-29 09:20:27'),
(76, 26, 48, 3, '2023-05-29 09:20:50', '2023-05-29 09:20:50'),
(77, 26, 49, 2, '2023-05-29 09:21:13', '2023-05-29 09:21:13'),
(78, 26, 50, 1, '2023-05-29 09:21:42', '2023-05-29 09:21:42');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_09_19_134504_make_kasus_table', 1),
(3, '2022_09_19_145703_create_puskesmas_table', 2),
(4, '2022_09_19_150923_create_kecamatan_table', 3),
(6, '2022_09_19_151045_create_kelurahan_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nik` varchar(128) NOT NULL,
  `jk` varchar(128) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id`, `nama`, `nik`, `jk`, `tgl_lahir`, `updated_at`, `created_at`) VALUES
(1, 'SILVESTER', '5304160107770010', 'Laki - Laki', '27/09/1971', '2023-05-30 02:44:02', '0000-00-00 00:00:00'),
(2, 'STEFANUS', '5304130104880102', 'Laki - Laki', '14/04/1992', '2023-05-30 02:44:36', '0000-00-00 00:00:00'),
(3, 'TRENSIUS', '5304130107700006', 'Laki - Laki', '31/03/1934', '2023-05-30 02:44:57', '0000-00-00 00:00:00'),
(4, 'AGUSTINA', '5304134107620006', 'Perempuan', '01/08/1969', '2023-05-30 02:45:21', '0000-00-00 00:00:00'),
(5, 'THERESIA', '5321110810790001', 'Perempuan', '01/07/1940', '2023-05-30 02:45:56', '0000-00-00 00:00:00'),
(6, 'FELIX', '5304132109630001', 'Laki - Laki', '07/10/1971', '2023-05-30 02:46:30', '0000-00-00 00:00:00'),
(7, 'MARIA', '5304131406590002', 'Perempuan', '12/01/1980', '2023-05-30 02:48:07', '0000-00-00 00:00:00'),
(8, 'YOSEPH', '5304132001900002', 'Laki - Laki', '08/05/1987', '2023-05-30 02:48:29', '0000-00-00 00:00:00'),
(9, 'YOHANES', '5304131503700001', 'Laki - Laki', '02/02/1973', '2023-05-30 02:48:54', '0000-00-00 00:00:00'),
(10, 'KLEMENTIANUS', '5304131502890001', 'Laki - Laki', '27/03/1984', '2023-05-30 02:49:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk_sub_kriteria`
--

CREATE TABLE `penduduk_sub_kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penduduk_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penduduk_sub_kriteria`
--

INSERT INTO `penduduk_sub_kriteria` (`id`, `penduduk_id`, `kriteria_id`, `sub_kriteria_id`, `updated_at`, `created_at`) VALUES
(7, 1, 16, 26, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 18, 29, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 1, 19, 34, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 20, 38, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 1, 24, 41, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 1, 25, 45, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 1, 26, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 2, 16, 23, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 2, 18, 28, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 2, 19, 31, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 2, 20, 35, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 2, 24, 39, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 2, 25, 45, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 2, 26, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 3, 16, 25, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 3, 18, 27, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 3, 19, 31, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 3, 20, 36, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 3, 24, 40, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 3, 25, 45, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 3, 26, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 4, 16, 26, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 4, 18, 29, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 4, 19, 32, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 4, 20, 36, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 4, 24, 41, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 4, 25, 43, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 4, 26, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 5, 16, 26, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 5, 18, 30, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 5, 19, 32, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 5, 20, 36, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 5, 24, 41, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 5, 25, 43, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 5, 26, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 6, 16, 24, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 6, 18, 29, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 6, 19, 32, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 6, 20, 36, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 6, 24, 40, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 6, 25, 43, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 6, 26, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 7, 16, 23, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 7, 18, 29, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 7, 19, 31, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 7, 20, 35, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 7, 24, 39, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 7, 25, 43, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 7, 26, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 8, 16, 24, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 8, 18, 28, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 8, 19, 31, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 8, 20, 36, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 8, 24, 39, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 8, 25, 43, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 8, 26, 47, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 9, 16, 26, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 9, 18, 29, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 9, 19, 32, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 9, 20, 36, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 9, 24, 41, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 9, 25, 43, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 9, 26, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 10, 16, 23, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 10, 18, 28, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 10, 19, 31, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 10, 20, 35, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 10, 24, 39, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 10, 25, 43, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 10, 26, 48, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id`, `nama`, `updated_at`, `created_at`) VALUES
(23, '>1.500.000  s/d  <=2.000.000', '2023-05-29 08:59:10', '2023-05-29 07:55:10'),
(24, '>1.000.000 s/d 1.500.000', '2023-05-29 07:55:49', '2023-05-29 07:55:49'),
(25, '>500.000 s/d 1. 000.000', '2023-05-29 07:56:21', '2023-05-29 07:56:21'),
(26, '<= 500.000', '2023-05-29 08:02:39', '2023-05-29 08:02:39'),
(27, 'Tidak ada tanggungan', '2023-05-29 08:04:23', '2023-05-29 08:04:23'),
(28, '1 s/d 2 Orang', '2023-05-29 08:04:49', '2023-05-29 08:04:49'),
(29, '3 s/d 4 Orang', '2023-05-29 08:05:35', '2023-05-29 08:05:35'),
(30, '>=5 Orang', '2023-05-30 02:38:54', '2023-05-29 08:06:55'),
(31, 'Tembok non plester', '2023-05-29 08:49:27', '2023-05-29 08:07:56'),
(32, 'Kayu', '2023-05-29 08:08:28', '2023-05-29 08:08:28'),
(33, 'Bambu', '2023-05-29 08:08:54', '2023-05-29 08:08:54'),
(34, 'Rumbia', '2023-05-29 08:09:17', '2023-05-29 08:09:17'),
(35, 'Keramik', '2023-05-29 08:10:19', '2023-05-29 08:10:19'),
(36, 'Semen', '2023-05-29 08:11:06', '2023-05-29 08:11:06'),
(37, 'Kayu murah', '2023-05-29 08:11:33', '2023-05-29 08:11:33'),
(38, 'Tanah', '2023-05-29 08:23:19', '2023-05-29 08:23:19'),
(39, 'PDAM', '2023-05-29 08:24:46', '2023-05-29 08:24:46'),
(40, 'sumur', '2023-05-29 08:52:42', '2023-05-29 08:52:42'),
(41, 'mata air', '2023-05-29 08:54:10', '2023-05-29 08:54:10'),
(42, 'air hujan', '2023-05-29 08:54:34', '2023-05-29 08:54:34'),
(43, 'listrik', '2023-05-29 08:55:18', '2023-05-29 08:55:18'),
(44, 'genset', '2023-05-29 08:55:30', '2023-05-29 08:55:30'),
(45, 'PLTS', '2023-05-29 08:55:48', '2023-05-29 08:55:48'),
(46, 'lilin', '2023-05-29 08:55:59', '2023-05-29 08:55:59'),
(47, '>3.000.000', '2023-05-29 08:56:46', '2023-05-29 08:56:46'),
(48, '>=2.000.000 s/d 3.000.000', '2023-05-29 08:57:18', '2023-05-29 08:57:18'),
(49, '< 2.000.000', '2023-05-29 08:57:36', '2023-05-29 08:57:36'),
(50, 'Tidak Memiliki Tabungan', '2023-05-29 08:57:55', '2023-05-29 08:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$sjWmdMvt.0bQg77O/iIaA.faFUEyusZ.GiBpRJTwc8WLUOFIVwVCC', 1, NULL, '2023-01-03 22:09:15'),
(15, 'a', '$2y$10$2nHrMssIHsy.qVb8bFgcIe.2iOLnh4iCSYuDmiBzSjda1duNNcTpu', NULL, '2023-04-08 18:42:31', '2023-04-08 18:42:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria_sub_kriteria`
--
ALTER TABLE `kriteria_sub_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_id` (`kriteria_id`,`sub_kriteria_id`),
  ADD KEY `sub_kriteria_id` (`sub_kriteria_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penduduk_sub_kriteria`
--
ALTER TABLE `penduduk_sub_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`penduduk_id`,`sub_kriteria_id`),
  ADD KEY `sub_kriteria_id` (`sub_kriteria_id`),
  ADD KEY `kriteria_id` (`kriteria_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kriteria_sub_kriteria`
--
ALTER TABLE `kriteria_sub_kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=447;

--
-- AUTO_INCREMENT for table `penduduk_sub_kriteria`
--
ALTER TABLE `penduduk_sub_kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1721;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kriteria_sub_kriteria`
--
ALTER TABLE `kriteria_sub_kriteria`
  ADD CONSTRAINT `kriteria_sub_kriteria_ibfk_1` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kriteria_sub_kriteria_ibfk_2` FOREIGN KEY (`sub_kriteria_id`) REFERENCES `sub_kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penduduk_sub_kriteria`
--
ALTER TABLE `penduduk_sub_kriteria`
  ADD CONSTRAINT `penduduk_sub_kriteria_ibfk_1` FOREIGN KEY (`penduduk_id`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penduduk_sub_kriteria_ibfk_2` FOREIGN KEY (`sub_kriteria_id`) REFERENCES `sub_kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penduduk_sub_kriteria_ibfk_3` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
