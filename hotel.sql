-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Sep 2024 pada 08.59
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_hotel`
--

CREATE TABLE `daftar_hotel` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `daftar_hotel`
--

INSERT INTO `daftar_hotel` (`id`, `nama`, `harga`, `deskripsi`, `foto`) VALUES
(1, 'Deluxe', 1500000, 'Kamar mewah dengan fasilitas lengkap dan pemandangan indah', 'deluxe.jpeg'),
(2, 'Standar', 500000, 'Kamar standar dengan fasilitas dasar', 'standar.jpeg'),
(3, 'Family', 1000000, 'Kamar keluarga dengan tempat tidur ekstra', 'family.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `NIK` int(16) NOT NULL,
  `tipe` varchar(8) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal_pesanan` date NOT NULL,
  `durasi_menginap` int(11) NOT NULL,
  `breakfast` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama`, `jenis_kelamin`, `NIK`, `tipe`, `harga`, `tanggal_pesanan`, `durasi_menginap`, `breakfast`) VALUES
(1, 'Ridhuan', 'Laki-laki', 2147483647, 'Standar', 980000, '2023-12-03', 3, ''),
(2, '2wew', 'Laki-laki', 2147483647, 'Family', 2520000, '2024-09-18', 4, ''),
(3, 'Ridhuan', 'Perempuan', 2147483647, 'Family', 2520000, '2024-09-21', 4, ''),
(4, 'Ridhuan', 'Perempuan', 2147483647, 'Family', 2520000, '2024-09-21', 4, ''),
(5, 'Ridhuan', 'Perempuan', 2147483647, 'Family', 2520000, '2024-09-21', 4, ''),
(7, 'eeee', 'Laki-laki', 2147483647, 'Family', 2520000, '2024-09-21', 4, ''),
(8, 'Ridhuan', 'Laki-laki', 2147483647, 'Family', 3150000, '2024-09-21', 5, ''),
(9, 'Ridhuan', 'Perempuan', 2147483647, 'Deluxe', 1880000, '2024-09-21', 4, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_hotel`
--
ALTER TABLE `daftar_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_hotel`
--
ALTER TABLE `daftar_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
