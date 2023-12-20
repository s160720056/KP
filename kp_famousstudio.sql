-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 04:30 AM
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
-- Database: `kp_famousstudio`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `no_hp` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `idAkun` int(11) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `idBooking` int(255) NOT NULL,
  `tanggalBooking` date NOT NULL,
  `waktuBooking` time(6) NOT NULL,
  `durasiBooking` int(255) NOT NULL,
  `namaBooking` varchar(255) NOT NULL,
  `statusBooking` enum('0','1','2','') NOT NULL,
  `idJasa` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`idBooking`, `tanggalBooking`, `waktuBooking`, `durasiBooking`, `namaBooking`, `statusBooking`, `idJasa`) VALUES
(1, '2023-11-29', '17:00:00.000000', 1, 'qrqrrqr', '0', 1),
(2, '2023-11-24', '18:30:00.000000', 1, 'queue', '0', 1),
(3, '2023-12-20', '14:00:00.000000', 1, 'ash', '0', 1),
(5, '2023-12-19', '15:30:00.000000', 1, 'abccc', '0', 2),
(6, '2023-12-19', '00:00:00.000000', 1, 'aaa', '0', 0),
(7, '2023-12-19', '15:00:00.000000', 1, 'aaa', '0', 2);

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `idFoto` int(255) NOT NULL,
  `idKategoriFoto` int(255) NOT NULL,
  `urlFoto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `idJasa` int(255) NOT NULL,
  `namaJasa` varchar(1000) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`idJasa`, `namaJasa`, `status`) VALUES
(1, 'as', 2),
(2, 'Best Friend', 2),
(3, 'Self Studio', 1),
(4, 'Wedding', 1),
(5, 'Graduation', 1),
(6, 'Product', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategorifoto`
--

CREATE TABLE `kategorifoto` (
  `idKategoriFoto` int(255) NOT NULL,
  `namaKategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `livechats`
--

CREATE TABLE `livechats` (
  `id` int(11) NOT NULL,
  `isi` varchar(45) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `img` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `no_hp` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` int(11) NOT NULL,
  `jumlah_biaya` int(11) DEFAULT NULL,
  `status` enum('lunas','belum lunas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanans`
--

CREATE TABLE `pemesanans` (
  `id` int(11) NOT NULL,
  `jenis_jasa` varchar(45) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `no_pemesanan` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `category` enum('Wedding','Product','Self Photo') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `jenis` enum('1') DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `inputFirstName` varchar(100) NOT NULL,
  `inputLastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `passwordConfirm` varchar(255) NOT NULL,
  `STATUS` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `inputFirstName`, `inputLastName`, `email`, `password`, `passwordConfirm`, `STATUS`) VALUES
(2, 'Fadli', 'Ramadhan', 'fadli@mail.com', '$2y$10$ipnaAcnAUdPE.THf2R7QnO0eEvDEGJV2YKbVHf', '$2y$10$aLbaYUNX4CmOOhB9zySm6uRWSnqO5V4gJ9mAkRXDqnX8Y8lJuACDC', ''),
(9, 'Fernando', 'Wilim', 'xtrac8996@gmail.com', '$2y$10$Mru1wsfCyvzlJ1pQ9xiIqeIp6ja65/EvadQNPcy3pdsULXB8Uu4qu', '$2y$10$X6s/u5kIjiMLSoYHcLqAMOcIMoK9/6dNWLCQSavOIDf0W660oTJEq', 'customer'),
(10, 'Fernando', 'Wilim', 'a@gmail.com', '$2y$10$3At/9jkxRxcDN0blyaGqd./tLVpbpF5vRFFkvA9UIafpSkgLl.jGi', '', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`idAkun`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`idBooking`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`idFoto`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`idJasa`);

--
-- Indexes for table `kategorifoto`
--
ALTER TABLE `kategorifoto`
  ADD PRIMARY KEY (`idKategoriFoto`);

--
-- Indexes for table `livechats`
--
ALTER TABLE `livechats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanans`
--
ALTER TABLE `pemesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `idAkun` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `idBooking` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `idFoto` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `idJasa` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategorifoto`
--
ALTER TABLE `kategorifoto`
  MODIFY `idKategoriFoto` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
