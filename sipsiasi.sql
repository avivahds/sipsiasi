-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Des 2021 pada 09.52
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipsiasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jurusan`
--

CREATE TABLE `data_jurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_jurusan`
--

INSERT INTO `data_jurusan` (`id`, `nama_jurusan`) VALUES
(1, 'Akuntansi'),
(2, 'Kecantikan'),
(3, 'Tata Boga'),
(4, 'Tata Busana'),
(5, 'Perhotelan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kriteria`
--

CREATE TABLE `data_kriteria` (
  `id` int(11) NOT NULL,
  `kriteria` varchar(128) NOT NULL,
  `bobot` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_kriteria`
--

INSERT INTO `data_kriteria` (`id`, `kriteria`, `bobot`) VALUES
(1, 'Nilai Raport', '30'),
(2, 'Nilai Absensi', '25'),
(3, 'Nilai Ekstrakurikuler', '20'),
(4, 'Nilai Kepribadian', '25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa_berprestasi`
--

CREATE TABLE `data_siswa_berprestasi` (
  `id` int(11) NOT NULL,
  `tahun_id` int(128) NOT NULL,
  `nama_siswa` varchar(128) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nilai_rapot` varchar(128) NOT NULL,
  `nilai_absensi` varchar(128) NOT NULL,
  `nilai_ekskul` varchar(128) NOT NULL,
  `nilai_kepribadian` varchar(128) NOT NULL,
  `alt_rapot` int(11) NOT NULL,
  `alt_absensi` int(11) NOT NULL,
  `alt_ekskul` int(11) NOT NULL,
  `alt_kepribadian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_siswa_berprestasi`
--

INSERT INTO `data_siswa_berprestasi` (`id`, `tahun_id`, `nama_siswa`, `jurusan_id`, `kelas_id`, `nilai_rapot`, `nilai_absensi`, `nilai_ekskul`, `nilai_kepribadian`, `alt_rapot`, `alt_absensi`, `alt_ekskul`, `alt_kepribadian`) VALUES
(6, 2, 'Ade Fathur Kurnia Putra', 1, 1, '78', '0', '1', '80', 2, 4, 1, 3),
(8, 2, 'Agil Wulan Pangestuti', 1, 1, '80', '0', '1', '76', 3, 4, 1, 2),
(9, 2, 'Agustina', 1, 1, '78', '0', '1', '78', 2, 4, 1, 2),
(10, 2, 'Alfian Fadillah', 1, 1, '76', '1', '3', '67', 2, 3, 3, 1),
(11, 2, 'Anis Zahrotun Nisa', 1, 1, '76', '0', '1', '84', 2, 4, 1, 3),
(12, 2, 'Anjeni Neva Nurmaulidianti', 1, 1, '74', '0', '1', '60', 1, 4, 1, 1),
(13, 2, 'Chu\'Er Fandoralia April', 1, 1, '82', '0', '1', '80', 3, 4, 1, 3),
(14, 2, 'Desia', 1, 1, '82', '0', '1', '85', 3, 4, 1, 4),
(15, 2, 'Destia Putri Amanda', 1, 1, '77', '2', '1', '66', 2, 3, 1, 1),
(16, 2, 'Dina Verawati', 1, 1, '81', '0', '1', '70', 3, 4, 1, 1),
(18, 2, 'Dwi Utami', 2, 1, '83', '0', '1', '84', 3, 4, 1, 3),
(19, 2, 'Elvirenia Jesry', 2, 1, '77', '0', '1', '85', 2, 4, 1, 4),
(20, 2, 'Emi Amanda', 2, 1, '78', '0', '1', '78', 2, 4, 1, 2),
(21, 2, 'Fera Siska', 2, 1, '76', '0', '2', '78', 2, 4, 2, 2),
(22, 2, 'Gevira Aulia Putri', 2, 1, '76', '0', '1', '74', 2, 4, 1, 1),
(23, 2, 'Ghina Fadilah', 2, 1, '79', '0', '1', '73', 2, 4, 1, 1),
(24, 2, 'Gresnauli Purba', 2, 1, '83', '0', '2', '85', 3, 4, 2, 4),
(25, 2, 'Irma', 2, 1, '79', '2', '1', '81', 2, 3, 1, 3),
(26, 2, 'Karisma', 2, 1, '78', '0', '1', '72', 2, 4, 1, 1),
(27, 2, 'Maharani Septika Ningsih', 2, 1, '80', '0', '1', '84', 3, 4, 1, 3),
(33, 2, 'Monica Sastra', 3, 1, '79', '0', '1', '75', 2, 4, 1, 2),
(34, 2, 'Muhammad Eki Yuliansyah', 3, 1, '77', '0', '1', '72', 2, 4, 1, 1),
(35, 2, 'Nabila Arista', 3, 1, '73', '1', '1', '60', 1, 3, 1, 1),
(36, 2, 'Novi Rachmawati', 3, 1, '80', '0', '2', '83', 3, 4, 2, 3),
(37, 2, 'Paska Lioni', 3, 1, '80', '0', '1', '84', 3, 4, 1, 3),
(38, 2, 'Raudhatul Jannah', 3, 1, '84', '0', '1', '84', 3, 4, 1, 3),
(39, 2, 'Rinda Zahara Mahadewi', 3, 1, '72', '0', '1', '60', 1, 4, 1, 1),
(40, 2, 'Sahwa Nurhasanah', 3, 1, '81', '0', '1', '77', 3, 4, 1, 2),
(41, 2, 'Santi', 3, 1, '83', '0', '1', '82', 3, 4, 1, 3),
(42, 2, 'Siti Dzakiyyah', 3, 1, '80', '0', '1', '80', 3, 4, 1, 3),
(43, 2, 'Wahyu Nur\'Aina Al Giftia', 4, 1, '85', '0', '1', '82', 4, 4, 1, 3),
(44, 2, 'Vivi Andriani', 4, 1, '75', '0', '1', '67', 2, 4, 1, 1),
(45, 2, 'Venty', 4, 1, '80', '1', '1', '76', 3, 3, 1, 2),
(46, 2, 'Trifosa', 4, 1, '78', '0', '1', '83', 2, 4, 1, 3),
(47, 2, 'Tri Wahyuni', 4, 1, '79', '1', '1', '78', 2, 3, 1, 2),
(48, 2, 'Tarishah Aprilia', 4, 1, '75', '0', '1', '71', 2, 4, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_sub_kriteria`
--

CREATE TABLE `data_sub_kriteria` (
  `id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `rentang_nilai` varchar(128) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_sub_kriteria`
--

INSERT INTO `data_sub_kriteria` (`id`, `kriteria_id`, `rentang_nilai`, `nilai`) VALUES
(9, 1, '85-100', 4),
(10, 1, '80-84', 3),
(11, 1, '75-79', 2),
(12, 1, '<75', 1),
(13, 2, '<1', 4),
(14, 2, '1-2', 3),
(15, 2, '3-4', 2),
(16, 2, '>4', 1),
(17, 3, '3', 3),
(18, 3, '2', 2),
(19, 3, '1', 1),
(20, 4, '85-100', 4),
(21, 4, '80-84', 3),
(22, 4, '75-79', 2),
(23, 4, '<75', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id` int(11) NOT NULL,
  `tahun` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id`, `tahun`) VALUES
(1, '2019/2020'),
(2, '2020/2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` int(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(21, 'Avivah', 'avivah.sisfo@student.untan.ac.id', 0, '$2y$10$mO/ihHrKm3hyK1opmIYzze8PttI6eFueLslXnU5Ja0Sw3SkAaStQ6', 1, 1, 1634107977),
(23, 'Bintang', 'bintang@gmail.com', 0, '$2y$10$EGNK5XaDV9DnZ2Vnh8dffuFHfZiKhQkCluCQ1W2aW9UBHzjiuvOKy', 2, 1, 1634191991);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'DM'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Decission Maker');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Dashboard', 'user', 'fas fa-fw fa-tachometer-alt', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(8, 1, 'Kelola Data User', 'admin/datauser', 'fas fa-fw fa-users', 1),
(9, 1, 'Kelola Data Jurusan', 'admin/datajurusan', 'fas fa-fw fa-building', 1),
(10, 1, 'Kelola Data Kriteria', 'admin/datakriteria', 'fas fa-fw fa-clipboard-check', 1),
(11, 1, 'Kelola Data Nilai Kriteria', 'admin/datanilaikriteria', 'fas fa-fw fa-list-ol', 1),
(12, 1, 'Kelola Data Siswa Berprestasi', 'admin/datasiswa', 'fas fa-fw fa-user-graduate', 1),
(13, 2, 'Data Siswa Berprestasi', 'dm/datasiswa', 'fas fa-fw fa-user-tie', 1),
(14, 2, 'Kelola Bobot Kriteria', 'dm/databobot', 'fas fa-fw fa-list-ol', 1),
(15, 2, 'Perhitungan', 'dm/perhitungan', 'fas  fa-fw fa-square-root-alt', 1),
(16, 1, 'Laporan', 'admin/laporan', 'fas fa-fw fa-file-alt', 1),
(17, 2, 'Laporan', 'dm/laporan', 'fas fa-fw fa-file-alt', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_jurusan`
--
ALTER TABLE `data_jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_kriteria`
--
ALTER TABLE `data_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_siswa_berprestasi`
--
ALTER TABLE `data_siswa_berprestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_sub_kriteria`
--
ALTER TABLE `data_sub_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_jurusan`
--
ALTER TABLE `data_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_kriteria`
--
ALTER TABLE `data_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `data_siswa_berprestasi`
--
ALTER TABLE `data_siswa_berprestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `data_sub_kriteria`
--
ALTER TABLE `data_sub_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
