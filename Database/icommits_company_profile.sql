-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jul 2026 pada 05.43
-- Versi server: 10.4.32-MariaDB-log
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icommits_company_profile`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `status` enum('unread','read') DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hero_sections`
--

CREATE TABLE `hero_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` text DEFAULT NULL,
  `button_text` varchar(100) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hero_sections`
--

INSERT INTO `hero_sections` (`id`, `title`, `subtitle`, `button_text`, `button_link`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Build Your Digital Solution', 'Icommits IT Consultant Indonesia', 'Konsultasi Sekarang', '/contact', 'hero.jpg', '2026-07-28 03:42:17', '2026-07-28 03:42:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `client` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `project_url` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `client`, `description`, `image`, `project_url`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'WorkTrack', 'PT ABC', 'Sistem monitoring pekerjaan karyawan', NULL, 'https://example.com', 1, '2026-07-28 03:42:48', '2026-07-28 03:42:48'),
(2, 'E-Raport', 'SMA Negeri', 'Sistem e-raport sekolah', NULL, 'https://example.com', 1, '2026-07-28 03:42:48', '2026-07-28 03:42:48'),
(3, 'Company Profile', 'PT XYZ', 'Website profil perusahaan', NULL, 'https://example.com', 1, '2026-07-28 03:42:48', '2026-07-28 03:42:48'),
(4, 'Inventory System', 'PT Logistik', 'Sistem manajemen inventori', NULL, 'https://example.com', 1, '2026-07-28 03:42:48', '2026-07-28 03:42:48'),
(5, 'POS System', 'Toko Retail', 'Sistem kasir modern', NULL, 'https://example.com', 1, '2026-07-28 03:42:48', '2026-07-28 03:42:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `benefits` text DEFAULT NULL,
  `technologies` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `description`, `benefits`, `technologies`, `image`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Software Development', 'software-development', 'Pengembangan aplikasi berbasis web dan mobile.', NULL, NULL, NULL, 'active', 1, '2026-07-28 03:42:27', '2026-07-28 03:42:27'),
(2, 'Website CMS', 'website-cms', 'Pembuatan website company profile dan CMS.', NULL, NULL, NULL, 'active', 1, '2026-07-28 03:42:27', '2026-07-28 03:42:27'),
(3, 'E-Raport Sekolah', 'e-raport', 'Sistem raport digital untuk sekolah.', NULL, NULL, NULL, 'active', 1, '2026-07-28 03:42:27', '2026-07-28 03:42:27'),
(4, 'Kehosting.in', 'kehosting', 'Layanan domain dan hosting.', NULL, NULL, NULL, 'active', 1, '2026-07-28 03:42:27', '2026-07-28 03:42:27'),
(5, 'Legal Dari Kita', 'legal-dari-kita', 'Layanan legalitas usaha dan bisnis.', NULL, NULL, NULL, 'active', 1, '2026-07-28 03:42:27', '2026-07-28 03:42:27'),
(6, 'Training', 'training', 'Pelatihan teknologi informasi.', NULL, NULL, NULL, 'active', 1, '2026-07-28 03:42:27', '2026-07-28 03:42:27'),
(7, 'Balanja.id', 'balanja-id', 'Platform digital retail modern.', NULL, NULL, NULL, 'active', 1, '2026-07-28 03:42:27', '2026-07-28 03:42:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin') DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@icommits.id', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', '2026-07-28 03:40:52', '2026-07-28 03:40:52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hero_sections`
--
ALTER TABLE `hero_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_portfolio_user` (`created_by`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `fk_service_user` (`created_by`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hero_sections`
--
ALTER TABLE `hero_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `portfolios`
--
ALTER TABLE `portfolios`
  ADD CONSTRAINT `fk_portfolio_user` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `fk_service_user` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
