-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 19, 2024 at 02:46 PM
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
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(23) NOT NULL,
  `pengirim` varchar(255) DEFAULT NULL,
  `penerima` varchar(50) NOT NULL,
  `chat` text DEFAULT NULL,
  `file` varchar(100) NOT NULL,
  `chatTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `pengirim`, `penerima`, `chat`, `file`, `chatTime`) VALUES
(269, 'customer@gmail.com', 'admin@mail.com', '', '', '2024-06-19 10:26:40'),
(268, 'customer@gmail.com', 'admin@mail.com', 'halo', '', '2024-06-19 10:24:37'),
(256, 'customer@gmail.com', 'admin@mail.com', 'halo kakk', '', '2024-06-19 10:17:34'),
(257, 'customer@gmail.com', 'admin@mail.com', 'halo kakk', '', '2024-06-19 10:17:35'),
(258, 'customer@gmail.com', 'admin@mail.com', 'halo kakk', '', '2024-06-19 10:17:35'),
(259, 'customer@gmail.com', 'admin@mail.com', 'halo kakk', '', '2024-06-19 10:17:35'),
(260, 'customer@gmail.com', 'admin@mail.com', 'halo kakk', '', '2024-06-19 10:17:36'),
(261, 'customer@gmail.com', 'admin@mail.com', 'halo kakk', '', '2024-06-19 10:17:36'),
(262, 'customer@gmail.com', 'admin@mail.com', 'halo kakk', '', '2024-06-19 10:17:36'),
(263, 'customer@gmail.com', 'admin@mail.com', 'halo kakk', '', '2024-06-19 10:17:36'),
(264, 'customer@gmail.com', 'admin@mail.com', '', '', '2024-06-19 10:17:55'),
(265, 'admin@mail.com', 'customer@gmail.com', 'ya halo', '', '2024-06-19 10:18:10'),
(266, 'customer@gmail.com', 'admin@mail.com', 'halo', '', '2024-06-19 10:18:15'),
(267, 'admin@mail.com', 'customer@gmail.com', 'halo customer', '', '2024-06-19 10:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `fotoDetail`
--

CREATE TABLE `fotoDetail` (
  `idFotoDetail` int(255) NOT NULL,
  `idFoto` int(255) NOT NULL,
  `urlGambar` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fotoDetail`
--

INSERT INTO `fotoDetail` (`idFotoDetail`, `idFoto`, `urlGambar`) VALUES
(10, 2, 'image/port2.jpg'),
(11, 2, 'image/port3.jpg'),
(12, 2, 'image/port4.jpg'),
(13, 3, 'image/port8.jpg'),
(14, 5, 'image/port7.jpg'),
(15, 5, 'image/port6.jpg'),
(16, 5, 'image/port1.jpg'),
(18, 5, 'image/dgdrgd.jpg');

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
(3, 'Self Studio 1', 1),
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

--
-- Dumping data for table `kategorifoto`
--

INSERT INTO `kategorifoto` (`idKategoriFoto`, `namaKategori`) VALUES
(2, 'SELF STUDIO'),
(3, 'WEDDING'),
(4, 'PRODUCT'),
(5, 'GRADUATION');

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

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `nama`, `alamat`, `no_hp`) VALUES
(0, 'ayam', 'abc@gmail.com', '0808');

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
(13, 'customer', 'c', 'customer@gmail.com', '$2y$10$EqtKiQSDdlG.RhlYM2u/c..DtbC7GroadIikvVuf46z2cZd.7IpXm', '', 'customer'),
(14, 'admin', 'admin', 'admin@mail.com', '$2y$10$xKGRrpy1MPPfc2TEC2jHXOaN5d3MjGDd5tbgrN89NNKdnNXjyGrUO', '$2y$10$xcpchk2okWsv7yAHsBZt/.GMglEgsXIJ2iu0ICGr3a5gHmJLxv0dy', ''),
(15, 'Fernando', 'Wilim', 'xtrac8996@gmail.com', '$2y$10$pq0Y9BhJBsUoWh0U15dYVu6OciuC6sZ8HRQIAhc2ykOFge8RAEkhS', '', 'customer'),
(16, 'fernando', 'wilim123', 'fernandowilim123@mail.com', '$2y$10$rOsU24ccllfdXfykIIYJSOiRVRs4iVT4IW7M7hAv8VrG3SoBxYouy', '', 'customer'),
(17, 'a', 'a', 'a@gmail.com', '$2y$10$IgxwE8HxkXs1dj0ttkjVQuiy.YV8otEk/8StaMvzwXSbW7KwjZkBu', '', 'customer'),
(18, 'admin', 'admin', 'aristo@admin.com', '$2y$10$xKGRrpy1MPPfc2TEC2jHXOaN5d3MjGDd5tbgrN89NNKdnNXjyGrUO', '$2y$10$xcpchk2okWsv7yAHsBZt/.GMglEgsXIJ2iu0ICGr3a5gHmJLxv0dy', '');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fotoDetail`
--
ALTER TABLE `fotoDetail`
  ADD PRIMARY KEY (`idFotoDetail`);

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
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(23) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT for table `fotoDetail`
--
ALTER TABLE `fotoDetail`
  MODIFY `idFotoDetail` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `idJasa` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategorifoto`
--
ALTER TABLE `kategorifoto`
  MODIFY `idKategoriFoto` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
