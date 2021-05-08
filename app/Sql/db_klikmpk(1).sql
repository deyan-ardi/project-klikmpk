-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 08 Bulan Mei 2021 pada 17.11
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
(1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', 'a1a72ae868859b1083b189732cde42f9', '2021-05-03 19:31:00'),
(2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '25bc74e2e1fdf4e1f2a87d364f83d7ad', '2021-05-08 00:48:20'),
(3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', 'e1f547d4a378741db003a5724134b6f4', '2021-05-08 13:20:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'member', 'for member user, default group'),
(2, 'admin', 'for admin user, can access anyone fiture');

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
  `id` int(11) NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`id`, `group_id`, `user_id`) VALUES
(4, 1, 4),
(5, 1, 5),
(1, 2, 1);

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
(1, '127.0.0.1', 'riyan.clsg11@gmail.com', NULL, '2021-05-03 19:29:54', 0),
(2, '127.0.0.1', 'riyan@undiksha.ac.id', 1, '2021-05-03 19:31:12', 1),
(3, '127.0.0.1', 'riyan@undiksha.ac.id', 1, '2021-05-04 10:13:59', 1),
(4, '127.0.0.1', 'riyan@undiksha.ac.id', 1, '2021-05-04 12:04:42', 1),
(5, '127.0.0.1', 'riyan@undiksha.ac.id', 1, '2021-05-04 12:47:36', 1),
(6, '127.0.0.1', 'riyan@undiksha.ac.id', 1, '2021-05-04 18:35:06', 1),
(7, '127.0.0.1', 'riyan.clsg11@gmail.com', NULL, '2021-05-04 18:52:13', 0),
(8, '127.0.0.1', 'riyan.clsg11@gmail.com', 2, '2021-05-04 18:52:19', 0),
(9, '127.0.0.1', 'riyan@undiksha.ac.id', 1, '2021-05-04 18:55:00', 1),
(10, '127.0.0.1', 'riyan@undiksha.ac.id', 1, '2021-05-07 19:05:31', 1),
(11, '127.0.0.1', 'ganatech.id@gmail.com', 2, '2021-05-08 00:48:35', 1),
(12, '127.0.0.1', 'riyan.clsg11@gmail.com', NULL, '2021-05-08 12:06:51', 0),
(13, '127.0.0.1', 'ganatech.id@gmail.com', 2, '2021-05-08 12:06:56', 1),
(14, '127.0.0.1', 'riyan.clsg11@gmail.com', 3, '2021-05-08 13:20:59', 1),
(15, '127.0.0.1', 'ganatech.id@gmail.com', 2, '2021-05-08 13:22:48', 1),
(16, '127.0.0.1', 'riyan.clsg11@gmail.com', 3, '2021-05-08 13:28:11', 1),
(17, '127.0.0.1', 'ganatech.id@gmail.com', 2, '2021-05-08 20:46:41', 1),
(18, '127.0.0.1', 'riyan@undiksha.ac.id', 1, '2021-05-08 20:53:12', 1),
(19, '127.0.0.1', 'ganatech.id@gmail.com', 2, '2021-05-08 20:57:42', 1),
(20, '127.0.0.1', 'riyan.clsg13@gmail.com', NULL, '2021-05-08 22:18:36', 0),
(21, '127.0.0.1', 'riyan.clsg11@gmail.com', 3, '2021-05-08 22:18:40', 1),
(22, '127.0.0.1', 'riyan@undiksha.ac.id', 1, '2021-05-08 22:18:58', 1),
(23, '127.0.0.1', 'riyan.clsg11@gmail.com', 3, '2021-05-08 22:52:24', 1),
(24, '127.0.0.1', 'ganatech.id@gmail.com', 2, '2021-05-08 22:52:30', 1),
(25, '127.0.0.1', 'riyan.clsg11@gmail.com', 3, '2021-05-08 22:56:06', 1),
(26, '127.0.0.1', 'ganatech.id@gmail.com', 2, '2021-05-08 22:56:20', 1),
(27, '::1', 'ganatech.id@gmail.com', 2, '2021-05-08 22:56:39', 1),
(28, '::1', 'riyan@undiksha.ac.id', 1, '2021-05-08 22:56:53', 1),
(29, '127.0.0.1', 'riyan@undiksha.ac.id', 1, '2021-05-09 00:53:34', 1);

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
-- Struktur dari tabel `bank_soal`
--

CREATE TABLE `bank_soal` (
  `id_bank_soal` int(11) NOT NULL,
  `kode_soal` varchar(15) NOT NULL,
  `kategori_soal` varchar(150) NOT NULL,
  `mata_kuliah` varchar(150) NOT NULL,
  `deskripsi_soal` text NOT NULL,
  `file_pdf` varchar(150) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kelas`
--

CREATE TABLE `detail_kelas` (
  `id_detail_kelas` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_tugas`
--

CREATE TABLE `kegiatan_tugas` (
  `id_kegiatan_tugas` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `kategori_tugas` varchar(500) NOT NULL,
  `nama_tugas` varchar(250) NOT NULL,
  `tgl_tugas` date NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_uas`
--

CREATE TABLE `kegiatan_uas` (
  `id_kegiatan_uas` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `kategori_uas` varchar(500) NOT NULL,
  `nama_uas` varchar(250) NOT NULL,
  `tgl_uas` date NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_uts`
--

CREATE TABLE `kegiatan_uts` (
  `id_kegiatan_uts` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `kategori_uts` varchar(500) NOT NULL,
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
  `bagikan` int(11) DEFAULT '0',
  `tautan` varchar(25) DEFAULT NULL,
  `n_seluruh` int(11) DEFAULT '0',
  `n_tugas` int(11) DEFAULT '0',
  `n_uts` int(11) DEFAULT '0',
  `n_uas` int(11) DEFAULT '0',
  `n_sikap` int(11) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_user`, `sampul_kelas`, `nama_kelas`, `semester`, `mata_kuliah`, `bagikan`, `tautan`, `n_seluruh`, `n_tugas`, `n_uts`, `n_uas`, `n_sikap`, `created_at`, `created_by`) VALUES
(2, 5, NULL, 'Rombel45', 1, 'MPK Bahasa Indonesia', 0, NULL, 0, 0, 0, 0, 0, '2021-05-08 17:08:37', 'I NYOMAN SUDIANA'),
(3, 4, NULL, 'Rombel43', 2, 'MPK Bahasa Indonesia', 0, NULL, 0, 0, 0, 0, 0, '2021-05-08 17:08:37', 'Nengah Suandi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim_mahasiswa` varchar(15) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `nilai_tugas` varchar(5) DEFAULT '0',
  `nilai_sikap` varchar(5) DEFAULT '0',
  `nilai_uts` varchar(5) DEFAULT '0',
  `nilai_uas` varchar(5) DEFAULT '0',
  `nilai_akhir` varchar(5) DEFAULT '0',
  `skala` varchar(5) DEFAULT '0',
  `karakter` varchar(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_unduh`
--

CREATE TABLE `request_unduh` (
  `id_request` int(11) NOT NULL,
  `id_bank_soal` int(11) NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `status_unduh` int(11) NOT NULL DEFAULT '0',
  `pesan_pengajuan` text,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sikap_partisipasi`
--

CREATE TABLE `sikap_partisipasi` (
  `id_sikap_partisipasi` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `nilai_santun` varchar(5) NOT NULL,
  `nilai_disiplin` varchar(5) NOT NULL,
  `nilai_berani` varchar(5) NOT NULL,
  `hasil_nilai_sikap` varchar(5) NOT NULL,
  `nilai_kehadiran` varchar(5) NOT NULL,
  `nilai_kepatuhan` varchar(5) NOT NULL,
  `nilai_keaktifan` varchar(5) NOT NULL,
  `hasil_nilai_partisipasi` varchar(5) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_kegiatan_tugas` int(11) NOT NULL,
  `nilai_tugas` varchar(5) NOT NULL,
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
  `nilai_uas` varchar(5) NOT NULL,
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
(1, 'riyan@undiksha.ac.id', 'deyan ardi', NULL, NULL, NULL, '$2y$10$2hAY/oqJE.u1H5P/OU1cg.kR50JvNNrL/Ibsr6EbehWk.V8bfQqL.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-03 19:30:45', '2021-05-07 20:49:52', NULL),
(4, 'gek_chrysan@yahoo.co.id', 'Nengah Suandi', NULL, NULL, NULL, '$2y$10$.nDsJO3emrjCTywtx5AJAOqoYntSwyLLjHNYnmY6B/wcVVFKhy/XW', NULL, NULL, NULL, '', NULL, NULL, 1, 0, '2021-05-08 16:56:45', '2021-05-08 16:56:45', NULL),
(5, 'sudiana195723@gmail.com', 'I NYOMAN SUDIANA', NULL, NULL, NULL, '$2y$10$2o.89TSYFdJTvSPq4fFhWuBp9VdgFEkYHHJvx7iwaEHBayvW1jk0u', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-08 16:56:45', '2021-05-08 16:56:45', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `uts`
--

CREATE TABLE `uts` (
  `id_uts` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_kegiatan_uts` int(11) NOT NULL,
  `nilai_uts` varchar(5) NOT NULL,
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
  ADD PRIMARY KEY (`id`),
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
-- Indeks untuk tabel `bank_soal`
--
ALTER TABLE `bank_soal`
  ADD PRIMARY KEY (`id_bank_soal`);

--
-- Indeks untuk tabel `detail_kelas`
--
ALTER TABLE `detail_kelas`
  ADD PRIMARY KEY (`id_detail_kelas`),
  ADD KEY `fk_detail_kelas` (`id_kelas`),
  ADD KEY `fk_detail_mahasiswa` (`id_mahasiswa`);

--
-- Indeks untuk tabel `kegiatan_tugas`
--
ALTER TABLE `kegiatan_tugas`
  ADD PRIMARY KEY (`id_kegiatan_tugas`),
  ADD KEY `fk_tugas_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `kegiatan_uas`
--
ALTER TABLE `kegiatan_uas`
  ADD PRIMARY KEY (`id_kegiatan_uas`),
  ADD KEY `fk_uas_kelas` (`id_kelas`);

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
-- Indeks untuk tabel `request_unduh`
--
ALTER TABLE `request_unduh`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `fk_request_bank` (`id_bank_soal`),
  ADD KEY `fk_request_user` (`id_user`);

--
-- Indeks untuk tabel `sikap_partisipasi`
--
ALTER TABLE `sikap_partisipasi`
  ADD PRIMARY KEY (`id_sikap_partisipasi`),
  ADD KEY `fk_sikap_partisipasi_mahasiswa` (`id_mahasiswa`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `fk_tugas_mahasiswa` (`id_mahasiswa`),
  ADD KEY `fk_tugas_kegiatan_tugas` (`id_kegiatan_tugas`);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bank_soal`
--
ALTER TABLE `bank_soal`
  MODIFY `id_bank_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `detail_kelas`
--
ALTER TABLE `detail_kelas`
  MODIFY `id_detail_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `kegiatan_tugas`
--
ALTER TABLE `kegiatan_tugas`
  MODIFY `id_kegiatan_tugas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kegiatan_uas`
--
ALTER TABLE `kegiatan_uas`
  MODIFY `id_kegiatan_uas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kegiatan_uts`
--
ALTER TABLE `kegiatan_uts`
  MODIFY `id_kegiatan_uts` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `request_unduh`
--
ALTER TABLE `request_unduh`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `sikap_partisipasi`
--
ALTER TABLE `sikap_partisipasi`
  MODIFY `id_sikap_partisipasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `uas`
--
ALTER TABLE `uas`
  MODIFY `id_uas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Ketidakleluasaan untuk tabel `kegiatan_tugas`
--
ALTER TABLE `kegiatan_tugas`
  ADD CONSTRAINT `fk_tugas_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kegiatan_uas`
--
ALTER TABLE `kegiatan_uas`
  ADD CONSTRAINT `fk_uas_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Ketidakleluasaan untuk tabel `request_unduh`
--
ALTER TABLE `request_unduh`
  ADD CONSTRAINT `fk_request_bank` FOREIGN KEY (`id_bank_soal`) REFERENCES `bank_soal` (`id_bank_soal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_request_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sikap_partisipasi`
--
ALTER TABLE `sikap_partisipasi`
  ADD CONSTRAINT `fk_sikap_partisipasi_mahasiswa` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `fk_tugas_kegiatan_tugas` FOREIGN KEY (`id_kegiatan_tugas`) REFERENCES `kegiatan_tugas` (`id_kegiatan_tugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tugas_mahasiswa` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

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
