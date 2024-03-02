-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 09:49 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `AlbumID` int(11) NOT NULL,
  `NamaAlbum` varchar(255) NOT NULL,
  `Deskripsi` text NOT NULL,
  `TanggalDibuat` date NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`AlbumID`, `NamaAlbum`, `Deskripsi`, `TanggalDibuat`, `userID`) VALUES
(44, 'tanaman', 'dshr', '2024-02-29', 26);

-- --------------------------------------------------------

--
-- Table structure for table `foto`
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
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`fotoid`, `judulfoto`, `deskripsifoto`, `tanggalunggah`, `lokasifile`, `AlbumID`, `userID`) VALUES
(77, 'teh', 'theah', '2024-02-29', '1317858503-Shop Houseplants _ Indoor Plants, Delivered To You _ The Sill.jpg', 44, 26);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `komentarid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `isikomentar` text NOT NULL,
  `tanggalunggah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
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
(27, 76, 25, 'test', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `likefoto`
--

CREATE TABLE `likefoto` (
  `likeid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `tanggallike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likefoto`
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
(195, 76, 25, '2024-02-29');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `FotoID` int(11) NOT NULL,
  `Username` int(11) NOT NULL,
  `reason` text NOT NULL,
  `TanggalLapor` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `Username`, `Password`, `Email`, `NamaLengkap`, `Alamat`, `Role`) VALUES
(25, 'admin', '202cb962ac59075b964b07152d234b70', 'admin@gmail.com', 'admin', 'Banjar', 'user'),
(26, 'user', '4297f44b13955235245b2497399d7a93', 'user@gmail.com', 'user', 'Sukarame', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`AlbumID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`fotoid`),
  ADD KEY `userID` (`userID`),
  ADD KEY `AlbumID` (`AlbumID`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`komentarid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`likeid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `FotoID` (`FotoID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `AlbumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `fotoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `komentarid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `likeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
