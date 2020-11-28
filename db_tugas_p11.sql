-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 29 Nov 2020 pada 02.03
-- Versi Server: 5.7.32-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tugas_p11`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mhs`
--

CREATE TABLE `tbl_mhs` (
  `mhs_id` int(11) NOT NULL,
  `nim` varchar(10) COLLATE utf8_bin NOT NULL,
  `nama` varchar(50) COLLATE utf8_bin NOT NULL,
  `prodi` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `tbl_mhs`
--

INSERT INTO `tbl_mhs` (`mhs_id`, `nim`, `nama`, `prodi`) VALUES
(1, '4191250004', 'Wahy Nur Fadillah', 'ilmu komputer'),
(7, '4191250034', 'Dini Yasya', 'Ekonomi Masyarakat'),
(17, '4191250034', 'Paijo Nur Waksono', 'Jualan'),
(19, '4191250034', 'WAHYU NUR FADILLAH', 'ilmu komputer'),
(20, '4191250034', 'Painah', 'Compuer Sience'),
(21, '4191250034', 'WAHYU NUR FADILLAH', 'Ekonomi Masyarakat'),
(22, '4191250034', 'WAHYU NUR FADILLAH', 'teknik bangunan'),
(23, '4191250034', 'Andi Sudipyo Yudiyono', 'ilmu komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mk`
--

CREATE TABLE `tbl_mk` (
  `mk_id` int(11) NOT NULL,
  `kode_mk` varchar(10) COLLATE utf8_bin NOT NULL,
  `nama_mk` varchar(50) COLLATE utf8_bin NOT NULL,
  `semester` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `tbl_mk`
--

INSERT INTO `tbl_mk` (`mk_id`, `kode_mk`, `nama_mk`, `semester`) VALUES
(1, '6273', 'Mobile Computing', 5),
(2, '2344', 'Perancangan dan Pemrograman Web', 3),
(3, '3456', 'Pendidikan Pancasila', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `nilai_id` int(11) NOT NULL,
  `mhs_id` int(11) NOT NULL,
  `mk_id` int(11) NOT NULL,
  `nilai` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`nilai_id`, `mhs_id`, `mk_id`, `nilai`) VALUES
(4, 1, 3, 100),
(7, 1, 1, 100),
(8, 23, 1, 100),
(9, 19, 2, 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `email` varchar(30) COLLATE utf8_bin NOT NULL,
  `password` varchar(225) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'wahyu.nf', 'fadil@kodingmt.com', '$2y$10$m6n2L9Tp85.eaLUgDRYiMuevhJ38vflQKpAfiLKL.KBy9/CeadiAa'),
(2, 'wahyu', 'fadil.keren1229@yahoo.com', '$2y$10$KuHv94s.PD.dz7NEKvDWiuuOKpKPm28Iojq1IpNQhVqVjbKge6zwi'),
(3, 'wahyu', 'wahyu.nf@gmail.com', '$2y$10$eoq/3JoFoV5YYFXjTtVLl.BqyU9Ve1Ya4BJIs3OxSlN3OQ1U4cKZ.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  ADD PRIMARY KEY (`mhs_id`);

--
-- Indexes for table `tbl_mk`
--
ALTER TABLE `tbl_mk`
  ADD PRIMARY KEY (`mk_id`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`nilai_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  MODIFY `mhs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_mk`
--
ALTER TABLE `tbl_mk`
  MODIFY `mk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
