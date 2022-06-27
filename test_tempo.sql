-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2022 pada 00.44
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_tempo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `login` char(30) NOT NULL,
  `pswd` char(100) NOT NULL,
  `email` char(50) NOT NULL,
  `deskripsi` char(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`login`, `pswd`, `email`, `deskripsi`) VALUES
('sdsdsds', '$argon2i$v=19$m=65536,t=4,p=1$WS83YnE5L2dXR1gwRFFkeA$JALjNJk5EfspK4uDDyeuoz4OE7wSrfrfN/XuYc9EDQI', 'muhammadagiandii@gmail.com', '123456'),
('sdsdsdsaa', '$argon2i$v=19$m=65536,t=4,p=1$cFAwWE8vaE0uYzJvcncuYg$7//Jxvk+1GaUGAx8x22JqX/pqKaksDBD+ExTCiojT4c', 'muhammadagiandiii@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`login`,`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
