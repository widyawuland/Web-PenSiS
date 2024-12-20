-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2024 pada 14.36
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transaksi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_01_095044_siswa', 2),
(6, '2024_12_01_095102_voucher', 2),
(7, '2024_12_01_095109_transaksi', 2),
(8, '2024_12_15_034605_create_permission_tables', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('wulandariwidya2005@gmail.com', '$2y$12$u6u60lDCvZGNtBQ3cmsmbu2XODcTxisy7FCF1zfAXXcXBVGTU2L.y', '2024-12-08 23:38:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Membuat Siswa', 'web', '2024-12-14 21:06:02', '2024-12-14 21:06:02'),
(2, 'Melihat Siswa', 'web', '2024-12-14 21:06:02', '2024-12-14 21:06:02'),
(3, 'Mengubah Siswa', 'web', '2024-12-14 21:06:02', '2024-12-14 21:06:02'),
(4, 'Menghapus Siswa', 'web', '2024-12-14 21:06:02', '2024-12-14 21:06:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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

--
-- Dumping data untuk tabel `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, 'auth_token', 'd9b46e002443933e137b741b0105d9e647f973bdd37cb2073887603940d6d535', '[\"Membuat Siswa\",\"Melihat Siswa\",\"Mengubah Siswa\",\"Menghapus Siswa\"]', NULL, NULL, '2024-12-14 21:32:45', '2024-12-14 21:32:45'),
(2, 'App\\Models\\User', 2, 'auth_token', '0ee3ca644e244fa3bcc21d7a50fb44a954d979ffac83dd36596e80e3f8f78930', '[\"Membuat Siswa\",\"Melihat Siswa\",\"Mengubah Siswa\",\"Menghapus Siswa\"]', '2024-12-14 22:56:01', NULL, '2024-12-14 22:28:13', '2024-12-14 22:56:01'),
(3, 'App\\Models\\User', 2, 'auth_token', '99ee0c092cc2d6f5a0ebd05448475f839f8554672e97b2c8d0363e50a9325146', '[\"Membuat Siswa\",\"Melihat Siswa\",\"Mengubah Siswa\",\"Menghapus Siswa\"]', '2024-12-14 22:58:13', NULL, '2024-12-14 22:44:15', '2024-12-14 22:58:13'),
(4, 'App\\Models\\User', 2, 'auth_token', '15add60084c56142cddd7e9e02bde5f8d9bfab15d454cdd87392bbb9f2b72972', '[\"Membuat Siswa\",\"Melihat Siswa\",\"Mengubah Siswa\",\"Menghapus Siswa\"]', '2024-12-14 23:31:07', NULL, '2024-12-14 23:25:18', '2024-12-14 23:31:07'),
(5, 'App\\Models\\User', 1, 'auth_token', '4fe28cb746d5b07c9905c69403b88af239b7afe66847e6085310d4e7b1975b15', '[\"Membuat Siswa\",\"Melihat Siswa\",\"Mengubah Siswa\",\"Menghapus Siswa\"]', NULL, NULL, '2024-12-14 23:34:26', '2024-12-14 23:34:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-12-14 21:06:02', '2024-12-14 21:06:02'),
(2, 'toko', 'web', '2024-12-14 21:06:02', '2024-12-14 21:06:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nama_siswa`, `foto`, `kelas`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'widya', 'foto_siswa/Anzzgr47bcr0wkEEjVUKHBvFCa0Ak5xLAX1XvvSD.png', '10A', NULL, NULL, '2024-12-13 22:40:47'),
(5, 'rizki', 'foto_siswa/oprPuSd1ylXrsmdbX66PXFHQKbiktNvAtSDp8DRR.png', '10B', NULL, '2024-12-04 04:56:03', '2024-12-13 21:56:45'),
(40, 'Tanner Morar', 'foto_siswa/RTArFO4m5PLr2skyAd9SUXcvSNaaWj5oBH9WDhHA.png', '10B', NULL, '2024-12-12 05:22:27', '2024-12-13 21:57:19'),
(43, 'Sylvia Rogahn', 'foto_siswa/23fCMKFcIUaJjLBkqNDLEhzT82KsLjuJ6Y4SiNFH.png', '12B', NULL, '2024-12-12 05:22:27', '2024-12-13 21:58:02'),
(44, 'Travis Effertz Jr.', 'foto_siswa/RjODDxWhdeLaCpvSdYLU5QxUiixLHvRGpTDUELRv.png', '12B', NULL, '2024-12-12 05:22:27', '2024-12-13 21:58:29'),
(45, 'jin', NULL, '13', NULL, '2024-12-12 05:22:27', '2024-12-14 22:53:00'),
(46, 'Marge Koss', 'foto_siswa/9X0HMR7qiOnTVeOjB1Cr4efane7GjtbHqEwBsuu3.png', '12B', NULL, '2024-12-12 05:22:27', '2024-12-13 21:59:14'),
(47, 'Loren Marquardt MD', 'foto_siswa/8WhXtbGLSCOtl0tUx3SxKOQJQd3ODR92QzlMPpAv.png', '11A', NULL, '2024-12-12 05:22:27', '2024-12-13 22:00:56'),
(48, 'Coleman Wilkinson DDS', 'foto_siswa/qaAG6WQ5qwDXe3DozR039JajiS6YQqdrIzPAUsfp.png', '12A', NULL, '2024-12-12 05:22:27', '2024-12-13 22:01:12'),
(50, 'Kyler Wiza', 'foto_siswa/sm22yWW0XHDaywtAFXULxeLo8SJOsdfV0k2I5aHL.png', '12B', NULL, '2024-12-12 05:22:27', '2024-12-15 03:54:57'),
(51, 'Orlo Lehner Jr.', 'foto_siswa/XwCMpiaqfQyEvoGjxB9Z3DMQ8EqBYnQrX37ygcCW.png', '10A', NULL, '2024-12-12 05:22:27', '2024-12-13 22:02:23'),
(52, 'Breana Kuhic III', 'foto_siswa/fSDmOmpkGSGYuaan6UB6JpwfDP9yrgSYrKshNag3.png', '8', NULL, '2024-12-12 05:22:27', '2024-12-15 03:57:29'),
(53, 'Queenie Kautzer', 'foto_siswa/ybqWubTNCUOwtOgjzBIMD3afxy8ZqyyyWn0ivebE.png', '10B', NULL, '2024-12-12 05:22:27', '2024-12-13 22:02:05'),
(56, 'Haylee Daniel', 'foto_siswa/n3jyA8ZN5L5jIiERJ3N1Kw4uWVo85j6QoOzAM3sk.png', '11B', '2024-12-14 23:29:44', '2024-12-13 21:46:39', '2024-12-14 23:29:44'),
(57, 'Twila Wolf PhD', 'foto_siswa/hfrwjXcV9MVx77rBl8SCDKiaRQEvEyNnUqyjss3v.png', '11A', NULL, '2024-12-13 21:46:39', '2024-12-13 22:00:40'),
(58, 'Camille Hill', 'foto_siswa/ASJWH6ugXgJjdzlBczWgPWo0E9iBE4GftfZ46knR.png', '10B', NULL, '2024-12-13 21:46:39', '2024-12-14 08:29:49'),
(59, 'Adrienne Jacobs', 'foto_siswa/XP7iS1nyi4HqkDpUlyl8gNFd5AOeD6YN6RKcncEa.png', '12B', '2024-12-14 08:29:35', '2024-12-13 21:46:39', '2024-12-14 08:29:35'),
(61, 'wulannnnn', 'foto_siswa/NoinhC3XRpTPDR38wLBtyc6enl5tlshVoInaFKFc.png', '10B', NULL, '2024-12-14 09:11:03', '2024-12-15 03:01:09'),
(62, 'coba132', 'foto_siswa/ACzA6tZCNkEahoMJyDsAFBqMqPascLTRH7ve7Tnz.png', '13', '2024-12-14 19:40:59', '2024-12-14 19:35:21', '2024-12-14 19:40:59'),
(63, 'coba postman', NULL, '15', NULL, '2024-12-14 23:25:39', '2024-12-14 23:25:39'),
(64, 'coba tombol', NULL, '1', NULL, '2024-12-15 03:08:45', '2024-12-15 03:08:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voucher_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_pengurangan` decimal(10,2) NOT NULL,
  `sisa_saldo` decimal(10,2) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','toko') NOT NULL DEFAULT 'toko',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'toko1', 'toko1@gmail.com', '2024-12-01 09:19:16', 'toko1', 'toko', NULL, NULL, NULL),
(2, 'admin', 'admin@gmail.com', '2024-12-01 09:44:42', 'admin', 'admin', NULL, NULL, NULL),
(4, 'toko2', 'toko2@gmail.com', NULL, 'toko2', 'toko', NULL, '2024-12-04 04:42:38', '2024-12-04 04:55:09'),
(6, 'toko3', 'toko3@gmail.com', NULL, 'toko3', 'toko', NULL, '2024-12-12 05:20:49', '2024-12-12 05:20:49'),
(7, 'coba1', 'coca1@gmail.com', NULL, 'coba123456', 'toko', NULL, '2024-12-13 20:38:21', '2024-12-13 20:38:21'),
(10, 'toko123', 'toko123@gmail.com', NULL, 'tokoduabelasss', 'toko', NULL, '2024-12-14 09:12:27', '2024-12-15 04:13:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `saldo` decimal(10,2) NOT NULL DEFAULT 15000.00,
  `sisa_saldo` decimal(10,2) NOT NULL DEFAULT 15000.00,
  `tanggal_berlaku` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vouchers`
--

INSERT INTO `vouchers` (`id`, `siswa_id`, `saldo`, `sisa_saldo`, `tanggal_berlaku`, `created_at`, `updated_at`) VALUES
(5, 2, 15000.00, 15000.00, '2024-12-15', '2024-12-06 21:28:21', '2024-12-15 04:39:52'),
(6, 5, 15000.00, 15000.00, '2024-12-15', '2024-12-06 22:17:59', '2024-12-15 04:39:52'),
(7, 40, 15000.00, 15000.00, '2024-12-15', '2024-12-13 22:03:02', '2024-12-15 04:39:52'),
(8, 43, 15000.00, 15000.00, '2024-12-15', '2024-12-13 22:03:12', '2024-12-15 04:39:52'),
(9, 44, 15000.00, 15000.00, '2024-12-15', '2024-12-13 22:03:22', '2024-12-15 04:39:52'),
(10, 45, 15000.00, 15000.00, '2024-12-15', '2024-12-13 22:03:55', '2024-12-15 04:39:52'),
(11, 46, 15000.00, 15000.00, '2024-12-15', '2024-12-13 22:04:02', '2024-12-15 04:39:52'),
(12, 47, 15000.00, 15000.00, '2024-12-15', '2024-12-13 22:04:09', '2024-12-15 04:39:52'),
(13, 48, 15000.00, 15000.00, '2024-12-15', '2024-12-13 22:04:16', '2024-12-15 04:39:52'),
(14, 50, 15000.00, 15000.00, '2024-12-15', '2024-12-13 22:04:24', '2024-12-15 04:39:52'),
(15, 51, 15000.00, 15000.00, '2024-12-15', '2024-12-13 22:04:31', '2024-12-15 04:39:52'),
(16, 52, 15000.00, 15000.00, '2024-12-15', '2024-12-13 22:04:40', '2024-12-15 04:39:52'),
(17, 53, 15000.00, 15000.00, '2024-12-15', '2024-12-13 22:04:49', '2024-12-15 04:39:52'),
(18, 56, 15000.00, 15000.00, '2024-12-15', '2024-12-13 22:04:59', '2024-12-15 04:39:52'),
(19, 57, 15000.00, 15000.00, '2024-12-15', '2024-12-13 22:05:10', '2024-12-15 04:39:52'),
(20, 58, 15000.00, 15000.00, '2024-12-15', '2024-12-13 22:05:19', '2024-12-15 04:39:52'),
(21, 59, 15000.00, 15000.00, '2024-12-15', '2024-12-13 22:05:33', '2024-12-15 04:39:52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_voucher_id_foreign` (`voucher_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voucher_siswa_id_foreign` (`siswa_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `vouchers`
--
ALTER TABLE `vouchers`
  ADD CONSTRAINT `voucher_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;

DELIMITER $$
--
-- Event
--
CREATE DEFINER=`root`@`localhost` EVENT `reset_voucher_saldo` ON SCHEDULE EVERY 1 DAY STARTS '2024-12-14 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    UPDATE vouchers
    SET saldo = 15000, 
        sisa_saldo = 15000;
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
