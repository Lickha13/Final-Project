-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jun 2021 pada 08.46
-- Versi server: 10.4.16-MariaDB
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datasiswaa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telpon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `nama`, `telpon`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Sarjono', '085689758768', 'Surabaya', NULL, NULL),
(2, 'Rizka', '081567897567', 'Sidoarjo', NULL, NULL),
(3, 'Bisri', '085678906547', 'Sidoarjo', NULL, NULL),
(4, 'Azimata', '085432567890', 'Surabaya', NULL, NULL),
(5, 'Akbar', '081345678987', 'Surabaya', NULL, NULL),
(6, 'Azizah', '086765890789', 'Sidoarjo', NULL, NULL),
(7, 'Maulana', '085678555444', 'Surabaya', NULL, NULL),
(8, 'Eka', '081234546567', 'Sidoarjo', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guru_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id`, `kode`, `nama`, `semester`, `guru_id`, `created_at`, `updated_at`) VALUES
(1, 'M-001', 'Matematika', 'Genap', 1, NULL, NULL),
(2, 'M-002', 'Bahasa Indonesia', 'Genap', 2, NULL, NULL),
(3, 'M-003', 'IPA', 'Genap', 3, NULL, NULL),
(4, 'M-004', 'IPS', 'Genap', 4, NULL, NULL),
(5, 'M-005', 'Pendidikan Agama', 'Genap', 5, NULL, NULL),
(6, 'M-006', 'Seni Budaya', 'Genap', 6, NULL, NULL),
(7, 'M-007', 'Pendidikan Jasmani', 'Genap', 7, NULL, NULL),
(8, 'M-008', 'Pendidikan Kewarganegaraan', 'Genap', 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel_siswa`
--

CREATE TABLE `mapel_siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `nilai` int(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mapel_siswa`
--

INSERT INTO `mapel_siswa` (`id`, `siswa_id`, `mapel_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 30, NULL, NULL),
(3, 1, 3, 100, NULL, NULL),
(4, 1, 4, 80, '2021-06-14 10:22:33', '2021-06-14 10:22:33'),
(9, 4, 1, 90, '2021-06-14 11:57:28', '2021-06-14 11:57:28'),
(10, 4, 2, 60, '2021-06-14 11:57:45', '2021-06-14 11:57:45'),
(11, 5, 1, 80, '2021-06-14 12:25:15', '2021-06-14 12:25:15'),
(12, 7, 1, 95, '2021-06-14 13:14:26', '2021-06-14 13:14:26'),
(13, 7, 2, 90, '2021-06-14 13:14:35', '2021-06-14 13:14:35'),
(14, 7, 3, 93, '2021-06-14 13:14:47', '2021-06-14 13:14:47'),
(15, 7, 4, 90, '2021-06-14 13:14:57', '2021-06-14 13:14:57'),
(16, 7, 5, 98, '2021-06-14 13:16:17', '2021-06-14 13:16:17'),
(17, 8, 1, 80, '2021-06-14 13:16:45', '2021-06-14 13:16:45'),
(18, 8, 2, 60, '2021-06-14 13:16:52', '2021-06-14 13:16:52'),
(19, 8, 3, 95, '2021-06-14 13:17:01', '2021-06-14 13:17:01'),
(20, 8, 4, 80, '2021-06-14 13:17:08', '2021-06-14 13:17:08'),
(22, 9, 1, 91, '2021-06-14 13:17:46', '2021-06-14 13:17:46'),
(23, 9, 2, 88, '2021-06-14 13:17:54', '2021-06-14 13:17:54'),
(24, 9, 3, 85, '2021-06-14 13:18:05', '2021-06-14 13:18:05'),
(25, 9, 4, 78, '2021-06-14 13:18:15', '2021-06-14 13:18:15'),
(26, 9, 5, 89, '2021-06-14 13:18:24', '2021-06-14 13:18:24'),
(29, 10, 1, 75, '2021-06-15 09:43:38', '2021-06-15 09:43:38'),
(30, 10, 2, 85, '2021-06-16 03:26:09', '2021-06-16 03:26:09'),
(31, 10, 3, 88, '2021-06-16 03:26:28', '2021-06-16 03:26:28'),
(32, 10, 4, 85, '2021-06-16 03:26:39', '2021-06-16 03:26:39'),
(33, 10, 5, 90, '2021-06-16 03:26:52', '2021-06-16 03:26:52'),
(34, 8, 5, 88, '2021-06-16 03:27:14', '2021-06-16 03:27:14'),
(35, 11, 1, 98, '2021-06-16 03:27:41', '2021-06-16 03:27:41'),
(36, 11, 2, 95, '2021-06-16 03:27:53', '2021-06-16 03:27:53'),
(37, 11, 3, 93, '2021-06-16 03:28:08', '2021-06-16 03:28:08'),
(38, 11, 4, 88, '2021-06-16 03:28:16', '2021-06-16 03:28:16'),
(39, 11, 5, 80, '2021-06-16 03:28:30', '2021-06-16 03:28:30'),
(40, 12, 1, 88, '2021-06-16 03:29:00', '2021-06-16 03:29:00'),
(41, 12, 2, 93, '2021-06-16 03:29:09', '2021-06-16 03:29:09'),
(42, 12, 3, 95, '2021-06-16 03:29:20', '2021-06-16 03:29:20'),
(43, 12, 4, 80, '2021-06-16 03:29:29', '2021-06-16 03:29:29'),
(44, 12, 5, 88, '2021-06-16 03:29:42', '2021-06-16 03:29:42'),
(45, 13, 1, 93, '2021-06-16 03:30:01', '2021-06-16 03:30:01'),
(46, 13, 2, 88, '2021-06-16 03:30:10', '2021-06-16 03:30:10'),
(47, 13, 3, 90, '2021-06-16 03:30:21', '2021-06-16 03:30:21'),
(48, 13, 4, 85, '2021-06-16 03:30:29', '2021-06-16 03:30:29'),
(49, 13, 5, 90, '2021-06-16 03:30:41', '2021-06-16 03:30:41'),
(50, 14, 1, 98, '2021-06-16 03:31:53', '2021-06-16 03:31:53'),
(53, 14, 2, 95, '2021-06-16 03:32:48', '2021-06-16 03:32:48'),
(54, 14, 3, 96, '2021-06-16 03:33:01', '2021-06-16 03:33:01'),
(55, 14, 4, 95, '2021-06-16 03:33:12', '2021-06-16 03:33:12'),
(56, 14, 5, 93, '2021-06-16 03:33:22', '2021-06-16 03:33:22'),
(57, 15, 1, 88, '2021-06-16 03:33:40', '2021-06-16 03:33:40'),
(58, 15, 2, 90, '2021-06-16 03:33:49', '2021-06-16 03:33:49'),
(59, 15, 3, 85, '2021-06-16 03:33:58', '2021-06-16 03:33:58'),
(60, 15, 4, 93, '2021-06-16 03:34:08', '2021-06-16 03:34:08'),
(61, 15, 5, 85, '2021-06-16 03:34:18', '2021-06-16 03:34:18'),
(62, 16, 1, 95, '2021-06-16 03:34:38', '2021-06-16 03:34:38'),
(63, 16, 2, 85, '2021-06-16 03:34:48', '2021-06-16 03:34:48'),
(64, 16, 3, 90, '2021-06-16 03:34:59', '2021-06-16 03:34:59'),
(65, 16, 4, 92, '2021-06-16 03:35:13', '2021-06-16 03:35:13'),
(66, 16, 5, 88, '2021-06-16 03:35:25', '2021-06-16 03:35:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel_siswas`
--

CREATE TABLE `mapel_siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `nilai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(31, '2021_06_07_164622_mapel_table', 1),
(33, '2014_10_12_000000_create_users_table', 2),
(34, '2014_10_12_100000_create_password_resets_table', 2),
(35, '2019_08_19_000000_create_failed_jobs_table', 2),
(36, '2021_05_23_070031_create_siswa_table', 2),
(38, '2021_06_09_154518_create_mapel_table', 2),
(39, '2021_06_14_121101_create_mapel_siswas_table', 3),
(40, '2021_06_15_171910_create_guru_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_depan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `agama`, `alamat`, `avatar`, `created_at`, `updated_at`) VALUES
(7, 'Adinda Rizky', 'Amalia', 'P', 'Islam', 'Sidoarjo', '7.jpg', NULL, NULL),
(8, 'Aisna Chusnun', 'Nisa\'', 'P', 'Islam', 'Sidoarjo', '8.jpg', NULL, NULL),
(9, 'Alifya Zhafira', 'Salsabila', 'L', 'Islam', 'Sidoarjo', '9.jpg', NULL, NULL),
(10, 'Arya', 'Lesmana', 'L', 'Islam', 'Sidoarjo', '10.jpg', NULL, NULL),
(11, 'Atiyah Meyla', 'Zita', 'P', 'Islam', 'Sidoarjo', '11.jpg', NULL, NULL),
(12, 'Bilal Abdullah', 'Siddiq', 'L', 'Islam', 'Sidoarjo', '12.jpg', NULL, NULL),
(13, 'Bunga Keyzia Putri', 'Sihans', 'P', 'Islam', 'Sidoarjo', '13.jpg', NULL, NULL),
(14, 'Dwi Miftakhul', 'Ilmi', 'L', 'Islam', 'Sidoarjo', '14.jpg', NULL, NULL),
(15, 'Dwi Rizqi', 'Oktavianto', 'L', 'Islam', 'Sidoarjo', '15.jpg', NULL, NULL),
(16, 'Fitria Ka\'ab', 'Oktaria', 'P', 'Islam', 'Sidoarjo', '16.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel_siswas`
--
ALTER TABLE `mapel_siswas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `mapel_siswas`
--
ALTER TABLE `mapel_siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
