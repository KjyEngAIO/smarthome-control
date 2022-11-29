-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Agu 2021 pada 10.57
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `switch_x`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `saklar`
--

CREATE TABLE `saklar` (
  `ID_SAKLAR` varchar(9) NOT NULL,
  `WAKTU` datetime NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `saklar`
--

INSERT INTO `saklar` (`ID_SAKLAR`, `WAKTU`, `STATUS`) VALUES
('SWITCH_1', '2021-08-16 15:57:13', 1),
('SWITCH_2', '2021-08-16 15:56:05', 1),
('SWITCH_3', '2021-08-16 15:56:06', 1),
('SWITCH_4', '2021-08-16 15:56:06', 1),
('SWITCH_5', '2021-08-16 15:56:02', 1),
('SWITCH_6', '2021-08-16 15:57:15', 0),
('SWITCH_7', '2021-08-16 15:56:01', 1),
('SWITCH_8', '2021-08-16 15:57:18', 0),
('SWITCH_9', '2021-08-16 11:39:57', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
