-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Mar 2024 pada 02.31
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.31

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
(57, 'moments ', 'bersama teman teman', '2024-03-06', 25),
(58, 'olahraga', 'bersama tim', '2024-03-06', 27),
(59, 'class meeting', 'pertandingan', '2024-03-06', 28);

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
(92, 'voly', 'tournamenn', '2024-03-06', '1612498973-WhatsApp Image 2024-03-04 at 11.50.42.jpeg', 58, 27),
(93, 'futsal', 'juara 3', '2024-03-06', '585443102-WhatsApp Image 2024-03-04 at 11.49.18 (1).jpeg', 59, 28),
(94, 'futsal', 'juara 3', '2024-03-06', '838286440-WhatsApp Image 2024-03-04 at 11.49.19.jpeg', 59, 28),
(95, 'futsal', 'juara 3', '2024-03-06', '1345761345-WhatsApp Image 2024-03-04 at 11.49.18.jpeg', 59, 28),
(96, 'futsal', 'juara 3', '2024-03-06', '1695973298-WhatsApp Image 2024-03-04 at 11.49.19 (1).jpeg', 59, 28),
(98, 'voly', 'tournamen', '2024-03-06', '437328303-WhatsApp Image 2024-03-04 at 11.50.41.jpeg', 58, 27),
(100, 'maulid nabi', '-', '2024-03-06', '1876829645-WhatsApp Image 2024-03-06 at 06.44.29.jpeg', 57, 25),
(101, 'maulid nabi', '-', '2024-03-06', '269670590-WhatsApp Image 2024-03-06 at 06.44.29 (1).jpeg', 58, 27);

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
(37, 79, 25, 'p', '0000-00-00'),
(38, 86, 27, 'test', '0000-00-00'),
(41, 87, 27, 'test', '0000-00-00'),
(43, 87, 25, 'p', '0000-00-00'),
(44, 89, 27, 'wah keren sekali', '0000-00-00'),
(45, 89, 25, 'oke juga', '0000-00-00'),
(46, 89, 28, 'ada pohon rambutan', '0000-00-00'),
(47, 92, 25, 'wah', '0000-00-00'),
(48, 92, 27, 'wah keren sekali', '0000-00-00');

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
(225, 78, 25, '2024-03-02'),
(229, 89, 27, '2024-03-06'),
(230, 89, 25, '2024-03-06'),
(232, 92, 27, '2024-03-06'),
(233, 93, 25, '2024-03-06'),
(234, 92, 25, '2024-03-06');

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
(91, 'amel', 'spam', '2024-03-06'),
(92, 'amel', 'spam', '2024-03-06'),
(93, 'amel', 'spam', '2024-03-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sampah`
--

CREATE TABLE `sampah` (
  `userID` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `tanggalhapus` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(27, 'amel', 'caf1a3dfb505ffed0d024130f58c5cfa', 'amel@gmail.com', 'amel', 'banjar', 'user'),
(28, 'intan', '81dc9bdb52d04dc20036dbd8313ed055', 'intan@gmail.com', 'intan', 'banjar kolot', 'user'),
(29, 'mela', '827ccb0eea8a706c4c34a16891f84e7b', 'mela@gmail.com', 'mela', 'mergo', 'user'),
(30, 'jirah', 'e10adc3949ba59abbe56e057f20f883e', 'jirah@gmail.com', 'jirah', 'dobo', 'user');

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
-- Indeks untuk tabel `sampah`
--
ALTER TABLE `sampah`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `fotoid` (`fotoid`);

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
  MODIFY `AlbumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `fotoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `komentarid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `likeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT untuk tabel `report`
--
ALTER TABLE `report`
  MODIFY `fotoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT untuk tabel `sampah`
--
ALTER TABLE `sampah`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
