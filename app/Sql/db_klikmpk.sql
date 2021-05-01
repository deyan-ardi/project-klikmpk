-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Apr 2021 pada 12.17
-- Versi server: 5.7.24
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_klikmpk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', 'e88cc376da0f079df6d1dc74d3e59d89', '2021-04-19 22:12:46'),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', 'eecd14042f48326d46d6df8df86cad42', '2021-04-20 00:41:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'riyan.clsg11@gmail.com', 1, '2021-04-19 22:04:39', 0),
(2, '::1', 'riyan.clsg11@gmail.com', 1, '2021-04-19 22:07:14', 0),
(3, '::1', 'riyan.clsg11@gmail.com', NULL, '2021-04-19 22:12:51', 0),
(4, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-19 22:12:58', 1),
(5, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-20 00:27:25', 1),
(6, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-20 00:34:31', 1),
(7, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-20 00:36:04', 1),
(8, '::1', 'riyan@undiksha.ac.id', 3, '2021-04-20 00:41:53', 1),
(9, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-20 00:52:47', 0),
(10, '::1', 'riyan@undiksha.ac.id', 3, '2021-04-20 00:52:55', 1),
(11, '::1', 'rada', NULL, '2021-04-20 00:55:50', 0),
(12, '::1', 'riyan.clsg11@gmail.com', NULL, '2021-04-20 12:26:09', 0),
(13, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-20 12:26:18', 0),
(14, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-20 12:26:24', 0),
(15, '::1', 'riyan@undiksha.ac.id', 3, '2021-04-20 12:26:31', 1),
(16, '::1', 'riyan.clsg11@gmail.com', NULL, '2021-04-20 21:24:59', 0),
(17, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-20 21:25:04', 1),
(18, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-20 22:51:49', 1),
(19, '::1', 'riyan.clsg11@gmail.com', NULL, '2021-04-21 10:16:46', 0),
(20, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-21 10:16:51', 1),
(21, '::1', 'riyan.clsg11@gmail.com', NULL, '2021-04-21 21:38:01', 0),
(22, '::1', 'riyan.clsg11@gmail.com', NULL, '2021-04-21 21:38:06', 0),
(23, '::1', 'riyan.clsg11@gmail.com', NULL, '2021-04-21 21:38:11', 0),
(24, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-21 21:38:16', 1),
(25, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-22 20:37:21', 1),
(26, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-23 00:40:48', 0),
(27, '::1', 'riyan.clsg11@gmail.com', NULL, '2021-04-23 00:40:51', 0),
(28, '::1', 'riyan.clsg11@gmail.com', NULL, '2021-04-23 00:40:56', 0),
(29, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-23 00:41:04', 1),
(30, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-23 00:42:03', 1),
(31, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-23 02:15:25', 1),
(32, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-23 02:16:11', 1),
(33, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-23 02:17:04', 1),
(34, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-23 02:18:08', 1),
(35, '::1', 'riyan.clsg11@gmail.com', NULL, '2021-04-23 02:35:23', 0),
(36, '::1', 'riyan.clsg11@gmail.com', NULL, '2021-04-23 02:35:33', 0),
(37, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-23 02:35:40', 1),
(38, '::1', 'riyan.clsg12@gmail.com', NULL, '2021-04-23 12:50:11', 0),
(39, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-23 12:50:30', 1),
(40, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-23 20:07:08', 1),
(41, '::1', 'riyan.clsg11@gmail.com', NULL, '2021-04-24 22:58:35', 0),
(42, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-24 22:58:44', 1),
(43, '::1', 'deyan ardi', NULL, '2021-04-25 12:47:34', 0),
(44, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-25 12:47:41', 1),
(45, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-26 00:03:32', 1),
(46, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-26 18:57:14', 1),
(47, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-26 23:30:38', 1),
(48, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-27 20:20:00', 1),
(49, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-28 11:42:22', 1),
(50, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-29 19:27:20', 1),
(51, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-30 12:41:26', 1),
(52, '::1', 'riyan@undiksha.ac.id', NULL, '2021-04-30 13:23:40', 0),
(53, '::1', 'riyan@undiksha.ac.id', 3, '2021-04-30 13:24:31', 1),
(54, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-30 18:37:33', 1),
(55, '::1', 'riyan@undiksha.ac.id', 3, '2021-04-30 18:39:57', 1),
(56, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-30 18:53:17', 1),
(57, '::1', 'riyan@undiksha.ac.id', 3, '2021-04-30 19:15:42', 1),
(58, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-30 19:48:54', 1),
(59, '::1', 'riyan@undiksha.ac.id', 3, '2021-04-30 19:51:06', 1),
(60, '::1', 'riyan.clsg11@gmail.com', 2, '2021-04-30 19:52:41', 1),
(61, '::1', 'riyan@undiksha.ac.id', 3, '2021-04-30 19:52:53', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_reset_attempts`
--

INSERT INTO `auth_reset_attempts` (`id`, `email`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, 'riyan@undiksha.ac.id', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', ' 3a753052ce3c1b8c3732d1f9031c3c9b', '2021-04-20 00:50:42'),
(2, 'riyan@undiksha.ac.id', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', ' 3a753052ce3c1b8c3732d1f9031c3c9b', '2021-04-20 00:51:16'),
(3, 'riyan@undiksha.ac.id', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '85ed9cce8a3ade29a2f5b5d5d90c5c84', '2021-04-20 00:52:39'),
(4, 'riyan@undiksha.ac.id', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '7ea27767eeb43fbc2c03882650310585', '2021-04-30 13:24:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kelas`
--

CREATE TABLE `detail_kelas` (
  `id_detail_kelas` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_kelas`
--

INSERT INTO `detail_kelas` (`id_detail_kelas`, `id_mahasiswa`, `id_kelas`) VALUES
(3, 26, 6),
(4, 27, 6),
(5, 28, 6),
(12, 35, 8),
(13, 36, 8),
(16, 39, 10),
(17, 40, 10),
(18, 41, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_uas`
--

CREATE TABLE `kegiatan_uas` (
  `id_kegiatan_uas` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `kategori_uas` varchar(50) NOT NULL,
  `nama_uas` varchar(250) NOT NULL,
  `tgl_uas` date NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan_uas`
--

INSERT INTO `kegiatan_uas` (`id_kegiatan_uas`, `id_kelas`, `kategori_uas`, `nama_uas`, `tgl_uas`, `created_at`, `created_by`) VALUES
(2, 4, 'Praktek', 'UAS Pemrograman Mobile', '2021-04-28', '2021-04-27 00:10:21', 'Deyan Gede'),
(5, 4, 'Teori', 'UAS Pemrograman Mobile', '2021-04-29', '2021-04-27 01:37:20', 'Deyan Gede');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_uts`
--

CREATE TABLE `kegiatan_uts` (
  `id_kegiatan_uts` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `kategori_uts` varchar(50) NOT NULL,
  `nama_uts` varchar(250) NOT NULL,
  `tgl_uts` date NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `sampul_kelas` varchar(100) DEFAULT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL,
  `mata_kuliah` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_user`, `sampul_kelas`, `nama_kelas`, `semester`, `mata_kuliah`, `created_at`, `created_by`) VALUES
(6, 2, NULL, 'PTI 5B', 5, 'Pemrograman Mobile', '2021-04-30 19:13:15', 'Deyan Gede'),
(8, 3, NULL, 'SI 5B', 5, 'Matematika', '2021-04-30 19:26:37', 'ardi darmawan'),
(10, 3, NULL, 'ada', 6, 'ada', '2021-04-30 20:08:01', 'Ardi Darmawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim_mahasiswa` varchar(15) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `nilai_sikap` int(11) DEFAULT '0',
  `nilai_uts` int(11) DEFAULT '0',
  `nilai_uas` int(11) DEFAULT '0',
  `nilai_akhir` int(11) DEFAULT '0',
  `skala` varchar(5) DEFAULT '0',
  `karakter` varchar(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim_mahasiswa`, `nama_mahasiswa`, `nilai_sikap`, `nilai_uts`, `nilai_uas`, `nilai_akhir`, `skala`, `karakter`, `created_at`, `created_by`) VALUES
(26, '1915051080', 'Vina Velina', 0, 0, 0, 0, '0,00', 'E', '2021-04-30 19:14:05', '0000-00-00 00:00:00'),
(27, '1815091037', 'I Gede Riyan Ardi Darmawan', 0, 0, 0, 0, '0,00', 'E', '2021-04-30 19:14:56', '0000-00-00 00:00:00'),
(28, '1915091037', 'Vina Velina', 0, 0, 0, 0, '0,00', 'E', '2021-04-30 19:14:56', '0000-00-00 00:00:00'),
(35, '1815091037', 'I Gede Riyan Ardi Darmawan', 0, 0, 0, 0, '0,00', 'E', '2021-04-30 19:28:45', '0000-00-00 00:00:00'),
(36, '1915091037', 'Vina Velina', 0, 0, 0, 0, '0,00', 'E', '2021-04-30 19:28:45', '0000-00-00 00:00:00'),
(39, '1815091037', 'I Gede Riyan Ardi Darmawan', 0, 0, 0, 0, '0,00', 'E', '2021-04-30 20:08:17', '0000-00-00 00:00:00'),
(40, '1915091037', 'Vina Velina', 0, 0, 0, 0, '0,00', 'E', '2021-04-30 20:08:17', '0000-00-00 00:00:00'),
(41, '1815091021', 'Dena', 0, 0, 0, 0, '0,00', 'E', '2021-04-30 20:08:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1618840811, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sikap_partisipasi`
--

CREATE TABLE `sikap_partisipasi` (
  `id_sikap_partisipasi` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `nilai_santun` int(11) NOT NULL,
  `nilai_disiplin` int(11) NOT NULL,
  `nilai_berani` int(11) NOT NULL,
  `hasil_nilai_sikap` int(11) NOT NULL,
  `nilai_kehadiran` int(11) NOT NULL,
  `nilai_kepatuhan` int(11) NOT NULL,
  `nilai_keaktifan` int(11) NOT NULL,
  `hasil_nilai_partisipasi` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `uas`
--

CREATE TABLE `uas` (
  `id_uas` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_kegiatan_uas` int(11) NOT NULL,
  `tanggal_uas` datetime NOT NULL,
  `nilai_uas` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `foto_profil` varchar(100) DEFAULT NULL,
  `foto_sampul` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(500) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `foto_profil`, `foto_sampul`, `deskripsi`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'riyan.clsg11@gmail.com', 'Deyan Gede', '1619699191_ee00bc6733930954f33c.png', '1619699210_17b01ca32d725f930d6a.jpg', 'adada', '$2y$10$PIIFky7b2A5csfP37oPrAeNQZ4NBfbHqfiUaCsRJvwsixLRRUHJAu', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-04-19 22:12:27', '2021-04-29 20:26:59', NULL),
(3, 'riyan@undiksha.ac.id', 'Ardi Darmawan', NULL, NULL, 'Halo, nama saya I Gede Riyan Ardi Darmawan, biasa dipanggil De Yan, saya suka bersepeda terutama turunan', '$2y$10$ZBmnaV9TelFf7lH3yeNWRuI.2AhN8bwMK01ZL5UmfCeQnkRXFNRDO', NULL, '2021-04-30 13:24:25', NULL, NULL, NULL, NULL, 1, 0, '2021-04-20 00:41:10', '2021-04-30 19:54:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `uts`
--

CREATE TABLE `uts` (
  `id_uts` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_kegiatan_uts` int(11) NOT NULL,
  `nilai_uts` varchar(3) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `detail_kelas`
--
ALTER TABLE `detail_kelas`
  ADD PRIMARY KEY (`id_detail_kelas`),
  ADD KEY `fk_detail_kelas` (`id_kelas`),
  ADD KEY `fk_detail_mahasiswa` (`id_mahasiswa`);

--
-- Indeks untuk tabel `kegiatan_uas`
--
ALTER TABLE `kegiatan_uas`
  ADD PRIMARY KEY (`id_kegiatan_uas`);

--
-- Indeks untuk tabel `kegiatan_uts`
--
ALTER TABLE `kegiatan_uts`
  ADD PRIMARY KEY (`id_kegiatan_uts`),
  ADD KEY `fk_kegiatan_uts_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `fk_user_kelas` (`id_user`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sikap_partisipasi`
--
ALTER TABLE `sikap_partisipasi`
  ADD PRIMARY KEY (`id_sikap_partisipasi`),
  ADD KEY `fk_sikap_partisipasi_mahasiswa` (`id_mahasiswa`);

--
-- Indeks untuk tabel `uas`
--
ALTER TABLE `uas`
  ADD PRIMARY KEY (`id_uas`),
  ADD KEY `fk_uas_mahasiswa` (`id_mahasiswa`),
  ADD KEY `fk_kegiatan_uas_uas` (`id_kegiatan_uas`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `uts`
--
ALTER TABLE `uts`
  ADD PRIMARY KEY (`id_uts`),
  ADD KEY `fk_uts_mahasiswa` (`id_mahasiswa`),
  ADD KEY `fk_uts_kegiatan` (`id_kegiatan_uts`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_kelas`
--
ALTER TABLE `detail_kelas`
  MODIFY `id_detail_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kegiatan_uas`
--
ALTER TABLE `kegiatan_uas`
  MODIFY `id_kegiatan_uas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kegiatan_uts`
--
ALTER TABLE `kegiatan_uts`
  MODIFY `id_kegiatan_uts` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sikap_partisipasi`
--
ALTER TABLE `sikap_partisipasi`
  MODIFY `id_sikap_partisipasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `uas`
--
ALTER TABLE `uas`
  MODIFY `id_uas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `uts`
--
ALTER TABLE `uts`
  MODIFY `id_uts` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_kelas`
--
ALTER TABLE `detail_kelas`
  ADD CONSTRAINT `fk_detail_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detail_mahasiswa` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kegiatan_uts`
--
ALTER TABLE `kegiatan_uts`
  ADD CONSTRAINT `fk_kegiatan_uts_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `fk_user_kelas` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sikap_partisipasi`
--
ALTER TABLE `sikap_partisipasi`
  ADD CONSTRAINT `fk_sikap_partisipasi_mahasiswa` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `uas`
--
ALTER TABLE `uas`
  ADD CONSTRAINT `fk_kegiatan_uas_uas` FOREIGN KEY (`id_kegiatan_uas`) REFERENCES `kegiatan_uas` (`id_kegiatan_uas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_uas_mahasiswa` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `uts`
--
ALTER TABLE `uts`
  ADD CONSTRAINT `fk_uts_kegiatan` FOREIGN KEY (`id_kegiatan_uts`) REFERENCES `kegiatan_uts` (`id_kegiatan_uts`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_uts_mahasiswa` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
