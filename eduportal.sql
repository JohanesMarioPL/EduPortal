-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 03:55 PM
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
-- Database: `eduportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_pengajuan`
--

CREATE TABLE `dokumen_pengajuan` (
  `dokumen_id` bigint(20) UNSIGNED NOT NULL,
  `pengajuan_id` bigint(20) UNSIGNED NOT NULL,
  `nama_dokumen` varchar(100) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `fakultas_id` bigint(20) UNSIGNED NOT NULL,
  `nama_fakultas` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`fakultas_id`, `nama_fakultas`, `created_at`, `updated_at`) VALUES
(1, 'Fakultas Kedokteran', NULL, NULL),
(2, 'Fakultas  Kedokteran Gigi', NULL, NULL),
(3, 'Fakultas Psikologi', NULL, NULL),
(4, 'Fakultas Humaniora dan Industri Kreatif', NULL, NULL),
(5, 'Fakultas Hukum dan Bisnis Digital', NULL, NULL),
(6, 'Fakultas Teknologi dan Rekayasa Cerdas', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_beasiswa`
--

CREATE TABLE `jenis_beasiswa` (
  `jenis_beasiswa_id` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis_beasiswa` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_beasiswa`
--

INSERT INTO `jenis_beasiswa` (`jenis_beasiswa_id`, `nama_jenis_beasiswa`, `created_at`, `updated_at`) VALUES
(1, 'Beasiswa Anak Pegawai', NULL, NULL),
(2, 'Beasiswa Prestasi Akademik', NULL, NULL),
(3, 'Beasiswa Prestasi Non-Akademik', NULL, NULL),
(4, 'Beasiswa Ekonomi Lemah', NULL, NULL),
(5, 'Beasiswa Gereja', NULL, NULL),
(6, 'Beasiswa Badan Pendukung', NULL, NULL);

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
(1, '1_create_fakultas_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2_create_prodi_table', 1),
(4, '3_create_role_table', 1),
(5, '4_create_users_table', 1),
(6, '5_create_jenisbeasiswa_table', 1),
(7, '6_create_periodepengajuan_table', 1),
(8, '7_create_pengajuanbeasiswa_table', 1),
(9, '8_create_dokumenpengajuan_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_beasiswa`
--

CREATE TABLE `pengajuan_beasiswa` (
  `pengajuan_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_beasiswa_id` bigint(20) UNSIGNED NOT NULL,
  `periode_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `status_pengajuan` enum('diajukan','disetujui_program_studi','disetujui_fakultas','ditolak_program_studi','ditolak_fakultas') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `periode_pengajuan`
--

CREATE TABLE `periode_pengajuan` (
  `periode_id` bigint(20) UNSIGNED NOT NULL,
  `nama_periode` varchar(100) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `fakultas_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `program_studi_id` bigint(20) UNSIGNED NOT NULL,
  `nama_program_studi` varchar(100) NOT NULL,
  `fakultas_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`program_studi_id`, `nama_program_studi`, `fakultas_id`, `created_at`, `updated_at`) VALUES
(1, 'S-1 Pendidikan Dokter', 1, NULL, NULL),
(2, 'S-1 Pendidikan Kedokteran Gigi', 2, NULL, NULL),
(3, 'S-1 Psikologi', 3, NULL, NULL),
(4, 'S-1 Sastra Inggris', 4, NULL, NULL),
(5, 'S-1 Sastra Jepang', 4, NULL, NULL),
(6, 'S-1 Sastra China', 4, NULL, NULL),
(7, 'S-1 Seni Rupa Murni', 4, NULL, NULL),
(8, 'S-1 Desain Interior', 4, NULL, NULL),
(9, 'S-1 Desain Komunikasi Visual', 4, NULL, NULL),
(10, 'S-1 Arsitektur', 4, NULL, NULL),
(11, 'S-1 Manajemen', 5, NULL, NULL),
(12, 'S-1 Akuntansi', 5, NULL, NULL),
(13, 'S-1 Hukum', 5, NULL, NULL),
(14, 'S-1 Teknik Sipil', 6, NULL, NULL),
(15, 'S-1 Teknik Elektro', 6, NULL, NULL),
(16, 'S-1 Teknik Industri', 6, NULL, NULL),
(17, 'S-1 Sistem Komputer', 6, NULL, NULL),
(18, 'S-1 Teknik Informatika', 6, NULL, NULL),
(19, 'S-1 Sistem Informasi', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `nama_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `nama_role`) VALUES
(1, 'Administrator'),
(2, 'Fakultas'),
(3, 'Program Studi'),
(4, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `nrp` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fakultas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `program_studi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`nrp`, `username`, `password`, `role_id`, `nama`, `email`, `fakultas_id`, `program_studi_id`, `created_at`, `updated_at`) VALUES
('0001', 'admin', '$2y$10$Iv/nVEGhOU7jLx09Zpai2.ZHH3AN24rXRK/tfuTTLIMkNBpYNDtA6', 1, 'Administrator', 'admin@admin.com', NULL, NULL, NULL, NULL),
('72002', 'jhondoi', '$2y$10$Iv/nVEGhOU7jLx09Zpai2.ZHH3AN24rXRK/tfuTTLIMkNBpYNDtA6', 3, 'Jhon Doi', 'jhondoi@maranatha.ac.id', 6, 18, NULL, NULL),
('72021', 'johndoe', '$2y$10$Iv/nVEGhOU7jLx09Zpai2.ZHH3AN24rXRK/tfuTTLIMkNBpYNDtA6', 1, 'john doe', 'johndoe@gmail.com', 1, 2, '2024-06-05 08:50:40', '2024-06-05 08:50:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumen_pengajuan`
--
ALTER TABLE `dokumen_pengajuan`
  ADD PRIMARY KEY (`dokumen_id`),
  ADD KEY `dokumen_pengajuan_pengajuan_id_foreign` (`pengajuan_id`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`fakultas_id`);

--
-- Indexes for table `jenis_beasiswa`
--
ALTER TABLE `jenis_beasiswa`
  ADD PRIMARY KEY (`jenis_beasiswa_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan_beasiswa`
--
ALTER TABLE `pengajuan_beasiswa`
  ADD PRIMARY KEY (`pengajuan_id`),
  ADD KEY `pengajuan_beasiswa_jenis_beasiswa_id_foreign` (`jenis_beasiswa_id`),
  ADD KEY `pengajuan_beasiswa_periode_id_foreign` (`periode_id`);

--
-- Indexes for table `periode_pengajuan`
--
ALTER TABLE `periode_pengajuan`
  ADD PRIMARY KEY (`periode_id`),
  ADD KEY `periode_pengajuan_fakultas_id_foreign` (`fakultas_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`program_studi_id`),
  ADD KEY `program_studi_fakultas_id_foreign` (`fakultas_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nrp`),
  ADD KEY `users_fakultas_id_foreign` (`fakultas_id`),
  ADD KEY `users_program_studi_id_foreign` (`program_studi_id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumen_pengajuan`
--
ALTER TABLE `dokumen_pengajuan`
  MODIFY `dokumen_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `fakultas_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis_beasiswa`
--
ALTER TABLE `jenis_beasiswa`
  MODIFY `jenis_beasiswa_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengajuan_beasiswa`
--
ALTER TABLE `pengajuan_beasiswa`
  MODIFY `pengajuan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `periode_pengajuan`
--
ALTER TABLE `periode_pengajuan`
  MODIFY `periode_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `program_studi_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokumen_pengajuan`
--
ALTER TABLE `dokumen_pengajuan`
  ADD CONSTRAINT `dokumen_pengajuan_pengajuan_id_foreign` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan_beasiswa` (`pengajuan_id`) ON DELETE CASCADE;

--
-- Constraints for table `pengajuan_beasiswa`
--
ALTER TABLE `pengajuan_beasiswa`
  ADD CONSTRAINT `pengajuan_beasiswa_jenis_beasiswa_id_foreign` FOREIGN KEY (`jenis_beasiswa_id`) REFERENCES `jenis_beasiswa` (`jenis_beasiswa_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan_beasiswa_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periode_pengajuan` (`periode_id`) ON DELETE CASCADE;

--
-- Constraints for table `periode_pengajuan`
--
ALTER TABLE `periode_pengajuan`
  ADD CONSTRAINT `periode_pengajuan_fakultas_id_foreign` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`fakultas_id`) ON DELETE CASCADE;

--
-- Constraints for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD CONSTRAINT `program_studi_fakultas_id_foreign` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`fakultas_id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fakultas_id_foreign` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`fakultas_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_program_studi_id_foreign` FOREIGN KEY (`program_studi_id`) REFERENCES `program_studi` (`program_studi_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
