-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2020 at 10:58 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project_ta_3`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggotas`
--

CREATE TABLE `anggotas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp_anggota` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp_anggota` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_anggota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi_id` bigint(20) UNSIGNED NOT NULL,
  `jabatan_id` bigint(20) UNSIGNED NOT NULL,
  `profile_anggota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_anggota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggotas`
--

INSERT INTO `anggotas` (`id`, `nama_anggota`, `hp_anggota`, `ktp_anggota`, `alamat_anggota`, `divisi_id`, `jabatan_id`, `profile_anggota`, `foto_anggota`, `tanggal_masuk`, `created_at`, `updated_at`) VALUES
(1, 'Cintaku', '1234567890', '1234567890', '<p>bismillah</p>', 3, 2, '<p>bismillah</p>', 'asset/product/RnnAtz53pMAgqVVqzd6bsZDUfHapb1gn7j0J0uZB.png', '2020-07-18', '2020-07-18 09:06:59', '2020-07-19 04:33:07'),
(2, 'Sudirman', '089765890987', '123456789', '<p>Jl&nbsp; Danau Laut tawar raya no 65 perumnas tangerang</p>', 3, 2, '<p>bisa jalan</p>', 'asset/anggota/Ibzp0eEsaxd4ZCrrRyEk8zZ797V7UL5lgryVFM2h.png', '2020-07-18', '2020-07-18 09:36:20', '2020-07-19 04:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `divisis`
--

CREATE TABLE `divisis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tufoksi_divisi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisis`
--

INSERT INTO `divisis` (`id`, `nama_divisi`, `tufoksi_divisi`, `created_at`, `updated_at`) VALUES
(1, 'test', '<p>testing</p>', '2020-07-11 21:08:36', '2020-07-14 09:28:03'),
(3, 'Pendidikan & Keorganisasian', '<p><em><strong>Fungsi </strong></em><strong>: </strong></p>\r\n\r\n<ol>\r\n	<li><strong>Sebagai tempat develpoing &amp; pengayoman terhadap anggota maupun masyarakat dalam segi wawasan maupun ilmu pengetahuan</strong></li>\r\n	<li><strong>Sebagai tempat pengembangan organisasi</strong></li>\r\n</ol>', '2020-07-13 15:57:14', '2020-07-14 09:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatans`
--

CREATE TABLE `jabatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_jabatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatans`
--

INSERT INTO `jabatans` (`id`, `nama_jabatan`, `keterangan_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'etst', '<p>testingting</p>', '2020-07-14 08:49:55', '2020-07-14 09:48:43'),
(2, 'Ketua Divisi Informasi & Komunikasi', '<p><em><strong>Tanggung Jawab :</strong></em></p>\r\n\r\n<ol>\r\n	<li>Menjalin komunikasi yang baik dengan anggota yang berada dalam naungannya</li>\r\n	<li>Menjalin kerja sama yang baik dengan divisi-divisi lain prihal kegiatan maupun pengurusan harian</li>\r\n</ol>', '2020-07-14 08:53:34', '2020-07-14 08:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kegiatans`
--

CREATE TABLE `jenis_kegiatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_jenis_kegiatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_kegiatans`
--

INSERT INTO `jenis_kegiatans` (`id`, `nama_jenis_kegiatan`, `keterangan_jenis_kegiatan`, `created_at`, `updated_at`) VALUES
(1, 'TEST', '<p><em>test nya susah juga</em></p>', '2020-07-16 08:25:58', '2020-07-16 08:46:32'),
(2, 'laravel', '<p><strong>test</strong></p>', '2020-07-16 08:27:15', '2020-07-16 08:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatans`
--

CREATE TABLE `kegiatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anggota_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_kegiatan_id` bigint(20) UNSIGNED NOT NULL,
  `summary_kegiatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_kegiatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `alamat_kegiatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatans`
--

INSERT INTO `kegiatans` (`id`, `nama_kegiatan`, `anggota_id`, `jenis_kegiatan_id`, `summary_kegiatan`, `foto_kegiatan`, `tanggal_kegiatan`, `alamat_kegiatan`, `created_at`, `updated_at`) VALUES
(2, 'Bakti sosial kepada korban banjir', 2, 2, '<p>banjiiiirrrr</p>', 'asset/kegiatan/lZHpVBOto4Od4EX1D34i3MPJaiMm335ivHpLEPos.jpeg', '2020-07-21', '<p>jakarda</p>', '2020-07-19 22:36:03', '2020-07-19 22:36:03'),
(3, 'Bantun sosial kepada korban gunung meletus', 2, 2, '<p>gunung meletus di merapi jogjakarta sangat dasyat membuat banyak dari mereka terpaksa harus mengungsi</p>', 'asset/kegiatan/di23XmU6zEUTq6vUF45j5iZDr1F5lY6sKdb4YVcs.jpeg', '2020-07-21', '<p>testststststststststtsttststts</p>', '2020-07-19 22:40:33', '2020-07-20 05:53:44');

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2020_07_10_150948_create_divisis_table', 2),
(5, '2020_07_10_151906_create_jabatans_table', 2),
(6, '2020_07_10_152247_create_jenis_kegiatans_table', 2),
(7, '2020_07_10_152830_create_anggotas_table', 3),
(8, '2020_07_10_154907_create_kegiatans_table', 4);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.admin', NULL, '$2y$10$vXfZRTcE4Vq8Srqi70v2GukU2OOQEgOdc8lJEVsaTO4J7Y8pTgw4G', NULL, '2020-07-09 17:33:30', '2020-07-09 17:33:30'),
(2, 'rafif', 'rafif.setia@gmail.com', NULL, '$2y$10$vKYjaAPmyxuw0r9MESOgv.nOOzVW8a0n4qvVBS5Jfc32ay/9Skfcu', NULL, '2020-07-20 20:16:34', '2020-07-20 20:16:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggotas`
--
ALTER TABLE `anggotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggotas_divisi_id_foreign` (`divisi_id`),
  ADD KEY `anggotas_jabatan_id_foreign` (`jabatan_id`);

--
-- Indexes for table `divisis`
--
ALTER TABLE `divisis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kegiatans`
--
ALTER TABLE `jenis_kegiatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kegiatans_anggota_id_foreign` (`anggota_id`),
  ADD KEY `kegiatans_jenis_kegiatan_id_foreign` (`jenis_kegiatan_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggotas`
--
ALTER TABLE `anggotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `divisis`
--
ALTER TABLE `divisis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_kegiatans`
--
ALTER TABLE `jenis_kegiatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kegiatans`
--
ALTER TABLE `kegiatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggotas`
--
ALTER TABLE `anggotas`
  ADD CONSTRAINT `anggotas_divisi_id_foreign` FOREIGN KEY (`divisi_id`) REFERENCES `divisis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anggotas_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD CONSTRAINT `kegiatans_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggotas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kegiatans_jenis_kegiatan_id_foreign` FOREIGN KEY (`jenis_kegiatan_id`) REFERENCES `jenis_kegiatans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
