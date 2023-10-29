-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Sep 2023 pada 13.04
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form_data`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(8) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama`, `email`, `pesan`) VALUES
(3, 'Nabil', 'nabil@gmail.com', 'Apa kegunaan Website ini?'),
(4, 'Nabil', 'nabil@gmail.com', 'hore berhasil'),
(6, 'pablo', 'pablo233@gmail.com', 'oke'),
(7, 'nabil', 'nabilgilbranrm@gmail.com', 'Halo Selamat Siang Semuanya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perencanaan`
--

CREATE TABLE `perencanaan` (
  `id_formulir_perencanaan` int(8) NOT NULL,
  `nama_intansi` varchar(100) NOT NULL,
  `pimpinan_intansi` varchar(100) NOT NULL,
  `peruntukan_pembangunan` varchar(100) NOT NULL,
  `kategori_proyek` varchar(50) NOT NULL,
  `kelurahan_desa` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `koordinat_lintang` varchar(10) NOT NULL,
  `koordinat_bujur` varchar(10) NOT NULL,
  `alamat_lokasi_tanah` text NOT NULL,
  `rencana_tata_ruang` varchar(100) NOT NULL,
  `perkiraan_luas_tanah` varchar(100) NOT NULL,
  `perkiraan_panjang` varchar(100) NOT NULL,
  `perkiraan_alokasi` varchar(100) NOT NULL,
  `target_mulai_persiapan` varchar(100) NOT NULL,
  `target_mulai_pelaksanaan` varchar(100) NOT NULL,
  `dokumen_sumber_data` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perencanaan`
--

INSERT INTO `perencanaan` (`id_formulir_perencanaan`, `nama_intansi`, `pimpinan_intansi`, `peruntukan_pembangunan`, `kategori_proyek`, `kelurahan_desa`, `kecamatan`, `koordinat_lintang`, `koordinat_bujur`, `alamat_lokasi_tanah`, `rencana_tata_ruang`, `perkiraan_luas_tanah`, `perkiraan_panjang`, `perkiraan_alokasi`, `target_mulai_persiapan`, `target_mulai_pelaksanaan`, `dokumen_sumber_data`, `keterangan`) VALUES
(6, 'Toko Baju', 'Nabil', 'Pembangunan Toko Swata', 'Non PSN', 'Situdaun', 'Tenjolaya', '106.710399', '0', 'cikupa bogor', 'skip dulu', '1000', '5', '500.000.000', '15-Januari-2032', '19-Januari-2032', 'skip dulu', 'mohon permudah'),
(7, 'Dinas Pertanahan Dan Tata Ruang', 'Unknown', 'Pembangunan Gedung ', 'PSN', 'Cipanengah', 'Lembursitu', '-6.617937', '106.6789', 'JL. Pelabuhan 2, No. 479, Cipanengah, Dayeuhluhur, Sukabumi, Sindangsari, Kec. Lembursitu, Kota Sukabumi, Jawa Barat 43134', 'Kantor Dinas', '100.000', '10.000', '600.000', '14 Oktober 2090', '17 Oktober 2090', 'skippppp', 'Segera di  buat'),
(8, 'Situdaun Corporation', 'Nabil GIlbran Ramadhan Maulana', 'Gedung Swasta', 'Non PSN', 'Situdaun', 'Tenjolaya', '-6.617937', '106.6789', 'Jl. Situdaun kec. tenjolaya', 'Perusahaan', '500.000', '250.000', '1.000.000.000.000', '30 Febuari 3000', '31 Febuari 3000', 'ntar dulu', 'Segera di  buat'),
(9, 'satu', 'dua', 'tiga', 'Non PSN', 'empat', 'lima', '0', '0', 'delapan', 'sembilan', 'sepuluh', 'sebelas', 'dua belas', 'tiga belas', 'empat belas', 'lima belas', 'enam belas'),
(10, 'one', 'two', 'three', 'Non PSN', 'four', 'five', '0', '0', 'eight', 'nine', 'ten', 'sebelas', 'dua belas', 'three teen', 'four teen', 'five teen', 'six teen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `persiapan`
--

CREATE TABLE `persiapan` (
  `id_formulir_persiapan` int(8) NOT NULL,
  `nama_intansi` varchar(100) NOT NULL,
  `jenis_kepentingan_umum` varchar(50) NOT NULL,
  `kategori_proyek` varchar(50) NOT NULL,
  `kelurahan_desa` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `koordinat_centroid` varchar(100) NOT NULL,
  `rencana_tata_ruang` varchar(100) NOT NULL,
  `perkiraan_luas_tanah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `persiapan`
--

INSERT INTO `persiapan` (`id_formulir_persiapan`, `nama_intansi`, `jenis_kepentingan_umum`, `kategori_proyek`, `kelurahan_desa`, `kecamatan`, `koordinat_centroid`, `rencana_tata_ruang`, `perkiraan_luas_tanah`) VALUES
(1, 'PT. Sehat Selalu', 'Perusahaan Swasta', 'Non PSN', 'nosick', 'healty', '-290,490', 'idk ah', '10000000000 m2'),
(2, 'Dinas Pertanahan Dan Tata Ruang', 'Pembangunan Gedung', 'PSN', 'sukamaju', 'mundur', '-6.43215,106.43215', 'pedasaan', '1000 m2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pra_perencanaan`
--

CREATE TABLE `pra_perencanaan` (
  `id_formulir_pra_perencanaan` int(8) NOT NULL,
  `nama_intansi` varchar(100) NOT NULL,
  `jenis_kepentingan_umum` varchar(100) NOT NULL,
  `kelurahan_desa` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `koordinat_centroid` varchar(100) NOT NULL,
  `rencana_tata_ruang` varchar(100) NOT NULL,
  `perkiraan_luas_tanah` varchar(100) NOT NULL,
  `perkiraan_panjang` varchar(100) NOT NULL,
  `perkiraan_alokasi_anggaran` varchar(100) NOT NULL,
  `target_mulai_perencanaan` varchar(100) NOT NULL,
  `target_mulai_persiapan` varchar(100) NOT NULL,
  `target_mulai_pelaksanaan` varchar(100) NOT NULL,
  `dokumen_sumber_daya` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pra_perencanaan`
--

INSERT INTO `pra_perencanaan` (`id_formulir_pra_perencanaan`, `nama_intansi`, `jenis_kepentingan_umum`, `kelurahan_desa`, `kecamatan`, `koordinat_centroid`, `rencana_tata_ruang`, `perkiraan_luas_tanah`, `perkiraan_panjang`, `perkiraan_alokasi_anggaran`, `target_mulai_perencanaan`, `target_mulai_persiapan`, `target_mulai_pelaksanaan`, `dokumen_sumber_daya`, `keterangan`) VALUES
(6, 'pt.GamonSelalu', 'Perusahaan Swasta', 'SedihEuy', 'Sad', '-290,490', 'idk ah', '10000000000 m2', '10000000000000 m', '1900 Juta rupiah', '12-Agustus-3000', '13-agustus-3000', '18-agustus-3000', 'idk ah', 'capek sumpah'),
(8, 'PT. Sehat Selalu', 'Perusahaan Swasta', 'nosick', 'healty', '-290,490', 'idk ah', '10000000000 m2', '10000000000000 m', '1900 Juta rupiah', '12-Agustus-3000', '13-agustus-3000', '18-agustus-3000', 'idk ah', 'NO PAIN NO GAIN'),
(9, 'Dinas Pertanahan Dan Tata Ruang', 'Pembangunan Gedung', 'sukamaju', 'mundur', '-6.43215,106.43215', 'pedasaan', '1000 m2', '10000000000000 m', '19.000.000', '12-Agustus-3000', '13-agustus-3000', '18-agustus-3000', 'idk ah', 'capek sumpah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('user','admin','monitoring') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(2, 'Nabil', 'nabil@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'user'),
(3, 'Gilbran', 'gilbran@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
(4, 'Maulana', 'maulana@gmail.com', 'aff4b352312d5569903d88e0e68d3fbb', 'user'),
(5, 'Admin Nabil', 'adbil@gmail.com', 'd9e86430bf08d5f558188428efc677d3', 'admin'),
(6, 'Admin Nabil', 'percobaan@gmail.com', 'd9e86430bf08d5f558188428efc677d3', 'admin'),
(7, 'nabil', 'nabilgilbranrm@gmail.com', 'd6e861b84677ac054c77c3aca20f4d52', 'user'),
(8, 'Monitoring', 'monitoring@gmail.com', '1272274fc191d13b3805f3da2a4ee741', 'monitoring'),
(9, 'User Aldo', 'aldo@gmail.com', '610493336f971eafafee438b9841d601', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indeks untuk tabel `perencanaan`
--
ALTER TABLE `perencanaan`
  ADD PRIMARY KEY (`id_formulir_perencanaan`);

--
-- Indeks untuk tabel `persiapan`
--
ALTER TABLE `persiapan`
  ADD PRIMARY KEY (`id_formulir_persiapan`);

--
-- Indeks untuk tabel `pra_perencanaan`
--
ALTER TABLE `pra_perencanaan`
  ADD PRIMARY KEY (`id_formulir_pra_perencanaan`);

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
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `perencanaan`
--
ALTER TABLE `perencanaan`
  MODIFY `id_formulir_perencanaan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `persiapan`
--
ALTER TABLE `persiapan`
  MODIFY `id_formulir_persiapan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pra_perencanaan`
--
ALTER TABLE `pra_perencanaan`
  MODIFY `id_formulir_pra_perencanaan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
