-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Mar 2024 pada 03.18
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_galery`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `AlbumID` int(11) NOT NULL,
  `NamaAlbum` varchar(255) NOT NULL,
  `Deskripsi` text NOT NULL,
  `TanggalDibuat` date NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`AlbumID`, `NamaAlbum`, `Deskripsi`, `TanggalDibuat`, `userID`) VALUES
(45, 'Tumbuhan ', 'tanaman peliharaan / tanaman liar', '2024-02-29', 25),
(46, 'hewan', 'anabul', '2024-02-29', 27);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `fotoid` int(11) NOT NULL,
  `judulfoto` varchar(255) NOT NULL,
  `deskripsifoto` text NOT NULL,
  `tanggalunggah` date NOT NULL,
  `lokasifile` varchar(255) NOT NULL,
  `AlbumID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`fotoid`, `judulfoto`, `deskripsifoto`, `tanggalunggah`, `lokasifile`, `AlbumID`, `userID`) VALUES
(78, 'bunga', 'bunga raflesiaa', '2024-02-29', '2060520735-Bunga Rafflesia,Sumatra,Indonesia.jpg', 45, 25),
(79, 'kucing', 'berbulu putih', '2024-02-29', '1705998562-Kucing Lucu 3d Terisolasi, Terisolasi Pada Kucing, Kucing Png, Kucing 3d PNG Transparan dan Clipart untuk Unduhan Gratis.jpg', 46, 27),
(82, 'buku', 'ftyd', '2024-03-01', '1993654533-Mau Kejutan Romantis Untuk Pasangan_ Coba Deh Ajakin ke Beberapa Gunung Indah yang Penuh Spot Romantis Ini.jpg', 46, 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `komentarid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `isikomentar` text NOT NULL,
  `tanggalunggah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`komentarid`, `fotoid`, `userID`, `isikomentar`, `tanggalunggah`) VALUES
(1, 14, 2, 'lucu sekali', '2024-02-16'),
(2, 13, 1, 'test', '2024-02-16'),
(3, 14, 1, 'P BALAP', '2024-02-17'),
(4, 13, 1, 'xtc boszzz', '2024-02-17'),
(5, 26, 1, 'halooooo!!!!!!!', '2024-02-20'),
(6, 27, 1, 'lucu sekali', '2024-02-20'),
(7, 29, 1, 'susu fav kuuuu', '2024-02-20'),
(8, 32, 0, 'bagus', '2024-02-20'),
(9, 33, 0, 'hai', '2024-02-20'),
(10, 47, 12, 'sangat cantik', '2024-02-22'),
(27, 76, 25, 'test', '0000-00-00'),
(35, 78, 27, 'p', '0000-00-00'),
(36, 78, 25, 'p', '0000-00-00'),
(37, 79, 25, 'p', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `likefoto`
--

CREATE TABLE `likefoto` (
  `likeid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `tanggallike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `likefoto`
--

INSERT INTO `likefoto` (`likeid`, `fotoid`, `userID`, `tanggallike`) VALUES
(61, 9, 1, '2024-02-13'),
(65, 6, 1, '2024-02-13'),
(68, 10, 1, '2024-02-13'),
(69, 11, 1, '2024-02-13'),
(71, 8, 1, '2024-02-13'),
(72, 12, 1, '2024-02-13'),
(88, 13, 2, '2024-02-16'),
(89, 14, 2, '2024-02-16'),
(91, 13, 1, '2024-02-16'),
(92, 14, 1, '2024-02-16'),
(93, 15, 2, '2024-02-19'),
(95, 15, 1, '2024-02-19'),
(96, 16, 1, '2024-02-19'),
(97, 17, 1, '2024-02-19'),
(98, 18, 1, '2024-02-19'),
(99, 19, 2, '2024-02-19'),
(100, 19, 1, '2024-02-19'),
(102, 20, 1, '2024-02-19'),
(103, 20, 2, '2024-02-20'),
(104, 21, 2, '2024-02-20'),
(105, 21, 1, '2024-02-20'),
(106, 22, 1, '2024-02-20'),
(107, 23, 1, '2024-02-20'),
(108, 24, 1, '2024-02-20'),
(109, 25, 1, '2024-02-20'),
(123, 26, 1, '2024-02-20'),
(124, 28, 1, '2024-02-20'),
(130, 29, 1, '2024-02-20'),
(141, 31, 1, '2024-02-20'),
(142, 27, 1, '2024-02-20'),
(143, 32, 12, '2024-02-20'),
(144, 36, 12, '2024-02-20'),
(145, 33, 12, '2024-02-20'),
(150, 36, 0, '2024-02-20'),
(151, 38, 0, '2024-02-20'),
(157, 32, 0, '2024-02-20'),
(158, 47, 11, '2024-02-22'),
(159, 47, 12, '2024-02-22'),
(160, 48, 12, '2024-02-22'),
(161, 51, 12, '2024-02-22'),
(162, 52, 12, '2024-02-22'),
(163, 53, 12, '2024-02-22'),
(164, 54, 12, '2024-02-22'),
(165, 55, 12, '2024-02-22'),
(166, 56, 12, '2024-02-22'),
(167, 48, 11, '2024-02-23'),
(172, 64, 11, '2024-02-23'),
(181, 0, 11, '2024-02-26'),
(188, 60, 21, '2024-02-28'),
(191, 60, 11, '2024-02-28'),
(192, 73, 11, '2024-02-28'),
(193, 61, 11, '2024-02-29'),
(194, 65, 11, '2024-02-29'),
(195, 76, 25, '2024-02-29'),
(196, 77, 25, '2024-02-29'),
(218, 79, 27, '2024-03-01'),
(219, 78, 27, '2024-03-01'),
(222, 79, 25, '2024-03-01'),
(224, 78, 25, '2024-03-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `report`
--

CREATE TABLE `report` (
  `fotoid` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `reason` text NOT NULL,
  `TanggalLapor` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `report`
--

INSERT INTO `report` (`fotoid`, `Username`, `reason`, `TanggalLapor`) VALUES
(78, 'amel', 'spam', '2024-03-01'),
(82, 'amel', 'test', '2024-03-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NamaLengkap` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `Role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userID`, `Username`, `Password`, `Email`, `NamaLengkap`, `Alamat`, `Role`) VALUES
(25, 'admin', '202cb962ac59075b964b07152d234b70', 'admin@gmail.com', 'admin', 'Banjar', 'Admin'),
(27, 'amel', 'caf1a3dfb505ffed0d024130f58c5cfa', 'amel@gmail.com', 'amel', 'banjar', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`AlbumID`),
  ADD KEY `userID` (`userID`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`fotoid`),
  ADD KEY `userID` (`userID`),
  ADD KEY `AlbumID` (`AlbumID`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`komentarid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userID` (`userID`);

--
-- Indeks untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`likeid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userID` (`userID`);

--
-- Indeks untuk tabel `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`fotoid`),
  ADD KEY `FotoID` (`fotoid`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `AlbumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `fotoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `komentarid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `likeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT untuk tabel `report`
--
ALTER TABLE `report`
  MODIFY `fotoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
