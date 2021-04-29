-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Apr 2021 pada 18.34
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siapdik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_bantuan`
--

CREATE TABLE `laporan_bantuan` (
  `id` int(11) NOT NULL,
  `id_lembaga` int(11) DEFAULT NULL,
  `berkas` varchar(255) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan_bantuan`
--

INSERT INTO `laporan_bantuan` (`id`, `id_lembaga`, `berkas`, `tgl`, `status`) VALUES
(1, 1, 'asdasda.pdf', '2021-04-19 10:45:13', 'Dievaluasi'),
(2, 1, '1618993924_OAJIS_24_1466.pdf', '2021-04-21 03:32:04', 'Terverifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembaga`
--

CREATE TABLE `lembaga` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_lembaga` varchar(255) DEFAULT NULL,
  `jumlah_guru_lk` int(11) DEFAULT NULL,
  `jumlah_guru_pr` int(11) DEFAULT NULL,
  `jumlah_murid_lk` int(11) DEFAULT NULL,
  `jumlah_murid_pr` int(11) DEFAULT NULL,
  `akreditasi` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_izin_pendirian` varchar(255) DEFAULT NULL,
  `tahun_pendirian` varchar(255) DEFAULT NULL,
  `NPSN` varchar(255) DEFAULT NULL,
  `no_sk_kemenkumham` varchar(255) DEFAULT NULL,
  `nama_kepala_lembaga` varchar(255) DEFAULT NULL,
  `tlp` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lembaga`
--

INSERT INTO `lembaga` (`id`, `id_user`, `nama_lembaga`, `jumlah_guru_lk`, `jumlah_guru_pr`, `jumlah_murid_lk`, `jumlah_murid_pr`, `akreditasi`, `kecamatan`, `alamat`, `no_izin_pendirian`, `tahun_pendirian`, `NPSN`, `no_sk_kemenkumham`, `nama_kepala_lembaga`, `tlp`) VALUES
(1, 2, 'Madarasah Gembala Yang Baik', 25, 30, 40, 50, 'A+', 'Kalitengah', 'Jl. Tapi Tak Bergandengan', '000098347326246', '2015', '2147483647', '122352335463424', 'Anji Jumanji', '0817373345'),
(2, 7, 'PG Avenger End Game', 45, 87, 45, 55, 'SS+', 'Karangbinangun', 'Jl xyz No 37', '098653434346', '2077', '000123456', '0753452463525235', 'Bpk wahyudi', '0867564555'),
(3, 10, 'Madarasah Gembala Yang Baik II', 45, 87, 45, 55, 'SS+', 'Karangbinangun', 'Jl xyz No 37', '098653434346', '2077', '000123456', '0753452463525235', 'Bpk wahyudi', '0867564555');

-- --------------------------------------------------------

--
-- Struktur dari tabel `literasi`
--

CREATE TABLE `literasi` (
  `id` int(11) NOT NULL,
  `id_lembaga` int(11) DEFAULT NULL,
  `NIP` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `jenis_buku` varchar(255) DEFAULT NULL,
  `judul_buku` varchar(255) DEFAULT NULL,
  `berkas` varchar(255) DEFAULT NULL,
  `tlp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `literasi`
--

INSERT INTO `literasi` (`id`, `id_lembaga`, `NIP`, `nama`, `jenis_kelamin`, `alamat`, `jabatan`, `jenis_buku`, `judul_buku`, `berkas`, `tlp`) VALUES
(1, 1, '0000987765654543', 'Pamungkas To The Bone', 'Laki-laki', 'Jl. Kenangan Manis', 'Immortal', 'Musik', 'Flying Solo', 'example1.pdf', '083125467576'),
(5, 1, 'H96218058', 'David ddw', 'rtert', 'dfsfdsd', 'fsdfsdf', 'fsdfsdf', 'sdfsdf', 'example2.pdf', '0856325634'),
(6, 3, 'H96218058', 'asdasd', 'sadsdasd', 'asdasd', 'guru', 'fsdfsdf', 'sdfsdf', 'example3.pdf', '098982412'),
(7, 1, '87567343212', 'Joni', 'Laki-laki', 'Jl xyz No 37', 'guru', 'dsadsad', 'werwerewr', '1619603526_sample.pdf', '08767677777');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_bantuan`
--

CREATE TABLE `pengajuan_bantuan` (
  `id` int(11) NOT NULL,
  `id_lembaga` int(11) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `berkas` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan_bantuan`
--

INSERT INTO `pengajuan_bantuan` (`id`, `id_lembaga`, `tgl`, `jenis`, `berkas`, `status`) VALUES
(1, 1, '2021-04-19 09:53:09', 'APE', 'dsaasd.pdf', 'Terverifikasi'),
(2, 1, '2021-04-21 00:00:00', 'APE', '1618987238_1820-5628-2-SP.pdf', 'Dievaluasi'),
(3, 1, '2021-04-21 00:00:00', 'BOP', '1618988349_UTS Teknoprenur.pdf', 'Dievaluasi'),
(4, 1, '2021-04-21 02:07:06', 'BOP', '1618988826_IJRTE_Pereira_2020.pdf', 'Ditolak'),
(5, 1, '2021-04-21 08:21:47', 'APE', '1619011306_Financial_Management_in_Religious_Non-Profit_Organ.pdf', 'Terverifikasi'),
(6, 3, '2021-04-28 12:34:02', 'BOP', '1619588042_IJRTE_Pereira_2020.pdf', 'Terverifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perpanjangan`
--

CREATE TABLE `perpanjangan` (
  `id` int(11) NOT NULL,
  `id_lembaga` int(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `berkas` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perpanjangan`
--

INSERT INTO `perpanjangan` (`id`, `id_lembaga`, `tgl`, `berkas`, `status`) VALUES
(1, 1, '2021-04-13', 'asdasdasdasd.pdf', 'Ditolak'),
(2, 1, '2021-04-21', '1618982230_Financial_Management_in_Religious_Non-Profit_Organ.pdf', 'Terverifikasi'),
(3, 1, '2021-04-21', '1618983155_UTS Teknoprenur.pdf', 'Ditolak'),
(4, 3, '2021-04-28', '1619587941_IJRTE_Pereira_2020.pdf', 'Terverifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `persuratan`
--

CREATE TABLE `persuratan` (
  `id` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `id_lembaga` int(11) DEFAULT NULL,
  `prihal` varchar(255) DEFAULT NULL,
  `berkas` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `persuratan`
--

INSERT INTO `persuratan` (`id`, `tgl`, `id_lembaga`, `prihal`, `berkas`, `jenis`) VALUES
(1, '2021-04-28', 1, 'Buka bersama', 'fdsfdsfd.pdf', 'masuk'),
(2, '2021-04-28', 2, 'Undangan', '1619594258_Untitled Diagram.pdf', 'masuk'),
(4, '2021-04-28', 3, 'Sp 1', '1619595552_1820-5628-2-SP.pdf', 'keluar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` text,
  `is_admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `is_admin`) VALUES
(1, 'admin', '$2y$10$FRVCmifKRhyZdkRHVhV9eOWNGoTQJSMbuvXvzNacedX/6Yg.kyu4C', 1),
(2, 'user', '$2y$10$/HnzmuobuuzX6hq5T8CJ9OBLX5t6QRepivoTVyYq68tQSrvQIjj2u', 0),
(7, '000123456', '$2y$10$fA03a1N6HNBCgHhH6NB6v.tKEqN3XG2qUVVxeoJXZRJxVZvxYuR1m', 0),
(9, '00099999', '$2y$10$Gn05BRmCiQOtawzAXd6Fdec/RholWyjt1l9a6SyxJvnv0fT9gcTzK', 0),
(10, '00012333', '$2y$10$h30wryDWEXnOS79qXZmXbel6PfuNq5dDYtCwpFUNO4MLN9BI2h.w6', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `laporan_bantuan`
--
ALTER TABLE `laporan_bantuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lembaga` (`id_lembaga`);

--
-- Indeks untuk tabel `lembaga`
--
ALTER TABLE `lembaga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `literasi`
--
ALTER TABLE `literasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lembaga` (`id_lembaga`);

--
-- Indeks untuk tabel `pengajuan_bantuan`
--
ALTER TABLE `pengajuan_bantuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lembaga` (`id_lembaga`);

--
-- Indeks untuk tabel `perpanjangan`
--
ALTER TABLE `perpanjangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lembaga` (`id_lembaga`);

--
-- Indeks untuk tabel `persuratan`
--
ALTER TABLE `persuratan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lembaga` (`id_lembaga`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `laporan_bantuan`
--
ALTER TABLE `laporan_bantuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `lembaga`
--
ALTER TABLE `lembaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `literasi`
--
ALTER TABLE `literasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_bantuan`
--
ALTER TABLE `pengajuan_bantuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `perpanjangan`
--
ALTER TABLE `perpanjangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `persuratan`
--
ALTER TABLE `persuratan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `laporan_bantuan`
--
ALTER TABLE `laporan_bantuan`
  ADD CONSTRAINT `laporan_bantuan_ibfk_1` FOREIGN KEY (`id_lembaga`) REFERENCES `lembaga` (`id`);

--
-- Ketidakleluasaan untuk tabel `lembaga`
--
ALTER TABLE `lembaga`
  ADD CONSTRAINT `lembaga_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `literasi`
--
ALTER TABLE `literasi`
  ADD CONSTRAINT `literasi_ibfk_1` FOREIGN KEY (`id_lembaga`) REFERENCES `lembaga` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengajuan_bantuan`
--
ALTER TABLE `pengajuan_bantuan`
  ADD CONSTRAINT `pengajuan_bantuan_ibfk_1` FOREIGN KEY (`id_lembaga`) REFERENCES `lembaga` (`id`);

--
-- Ketidakleluasaan untuk tabel `perpanjangan`
--
ALTER TABLE `perpanjangan`
  ADD CONSTRAINT `perpanjangan_ibfk_1` FOREIGN KEY (`id_lembaga`) REFERENCES `lembaga` (`id`);

--
-- Ketidakleluasaan untuk tabel `persuratan`
--
ALTER TABLE `persuratan`
  ADD CONSTRAINT `persuratan_ibfk_1` FOREIGN KEY (`id_lembaga`) REFERENCES `lembaga` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
