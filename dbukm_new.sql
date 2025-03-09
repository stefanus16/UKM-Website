-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Mar 2025 pada 06.52
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbukm_new`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`password`) VALUES
('ukm@2025badmin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran`
--

CREATE TABLE `kehadiran` (
  `idhadir` int(11) NOT NULL,
  `idpeserta` int(11) DEFAULT NULL,
  `tanggalhadir` datetime DEFAULT NULL,
  `jumlahhadir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kehadiran`
--

INSERT INTO `kehadiran` (`idhadir`, `idpeserta`, `tanggalhadir`, `jumlahhadir`) VALUES
(1, 1, '2025-02-18 14:43:30', 1),
(2, 1, '2025-02-18 14:45:19', 1),
(3, 1, '2025-02-18 14:49:33', 1),
(4, 2, '2025-03-09 06:03:23', 1),
(5, 3, '2025-03-09 06:05:18', 1),
(6, 1, '2025-03-09 06:09:51', 1),
(7, 4, '2025-03-09 06:24:34', 1),
(8, 4, '2025-03-09 06:24:55', 1),
(9, 1, '2025-03-09 06:44:37', 1),
(10, 3, '2025-03-09 06:48:01', 1),
(11, 5, '2025-03-09 06:48:27', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `idpeserta` int(11) NOT NULL,
  `nim` int(8) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`idpeserta`, `nim`, `nama`) VALUES
(1, 71220831, 'steven'),
(2, 61230892, 'agus'),
(3, 71220999, 'james'),
(4, 41230000, 'babi'),
(5, 71263972, 'rudi');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `peserta_kehadiran`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `peserta_kehadiran` (
`idpeserta` int(11)
,`nim` int(8)
,`nama` varchar(255)
,`jumlah_kehadiran` bigint(21)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `peserta_kehadiran`
--
DROP TABLE IF EXISTS `peserta_kehadiran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `peserta_kehadiran`  AS SELECT `p`.`idpeserta` AS `idpeserta`, `p`.`nim` AS `nim`, `p`.`nama` AS `nama`, count(`k`.`idhadir`) AS `jumlah_kehadiran` FROM (`peserta` `p` left join `kehadiran` `k` on(`p`.`idpeserta` = `k`.`idpeserta`)) GROUP BY `p`.`idpeserta`, `p`.`nim`, `p`.`nama` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`idhadir`),
  ADD KEY `idpeserta` (`idpeserta`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`idpeserta`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `idhadir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `idpeserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `kehadiran_ibfk_1` FOREIGN KEY (`idpeserta`) REFERENCES `peserta` (`idpeserta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
