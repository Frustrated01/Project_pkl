-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2024 at 09:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipeta`
--

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `username_g` varchar(60) NOT NULL,
  `email_g` varchar(60) NOT NULL,
  `telephone_g` int(15) NOT NULL,
  `topik` varchar(60) NOT NULL,
  `pesan` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `id_user`, `username_g`, `email_g`, `telephone_g`, `topik`, `pesan`, `waktu`) VALUES
(1, 0, 'a', 'b@gmail.com', 2147483647, 'Persyaratan lainnya', 'TESTING', '2024-01-14 03:59:54'),
(2, 3, 'Reffa', 'reffa.kaila@gmail.com', 8999, 'Cara Penggunaan Website', 'asd', '2024-01-14 04:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `perencanaan`
--

CREATE TABLE `perencanaan` (
  `id_perencanaan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_i` varchar(60) NOT NULL,
  `pimpinan_i` varchar(60) NOT NULL,
  `peruntukan` varchar(60) NOT NULL,
  `kategori_proyek` varchar(60) NOT NULL,
  `kelurahan` varchar(60) NOT NULL,
  `kecamatan` varchar(60) NOT NULL,
  `koordinat_l` varchar(10) NOT NULL,
  `koordinat_b` varchar(10) NOT NULL,
  `lokasi` text NOT NULL,
  `rencana_tr` varchar(60) NOT NULL,
  `perkiraan_l` varchar(10) NOT NULL,
  `perkiraan_p` varchar(10) NOT NULL,
  `perkiraan_a` varchar(10) NOT NULL,
  `m_persiapan` varchar(60) NOT NULL,
  `m_pelaksanaan` varchar(60) NOT NULL,
  `dokumen` varchar(60) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `telepone` int(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `telepone`, `email`, `password`, `role`) VALUES
(1, 'admin', 0, 'admin@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 'admin'),
(3, 'Reffa Kaila', 0, 'reffa.kaila@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', 'user'),
(4, 'Kailaa', 2147483647, 'kaila@gmail.com', '7153735db2b2052c603ef3068c00d683', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indexes for table `perencanaan`
--
ALTER TABLE `perencanaan`
  ADD PRIMARY KEY (`id_perencanaan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `perencanaan`
--
ALTER TABLE `perencanaan`
  MODIFY `id_perencanaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
