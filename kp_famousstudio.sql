-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2024 at 05:31 AM
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
(6, '2023-12-19', '00:00:00.000000', 1, 'aaa', '0', 0),
(8, '2024-02-21', '09:00:00.000000', 1, 'qrqrrqr', '0', 3),
(9, '2024-02-21', '09:00:00.000000', 1, 'rhrdhr', '0', 3),
(10, '2024-02-21', '09:00:00.000000', 1, 'qrqrrqr', '0', 3),
(11, '2024-02-21', '09:00:00.000000', 1, 'wrfwefe', '0', 3),
(12, '2024-02-21', '09:00:00.000000', 1, 'qrqrrqr', '0', 3),
(13, '2024-02-21', '09:00:00.000000', 5, 'qrqrrqr', '0', 3),
(14, '2024-02-21', '09:00:00.000000', 15, 'qrqrrqr', '0', 3),
(15, '2024-02-21', '09:00:00.000000', 15, 'qrqrrqr', '0', 3),
(16, '2024-02-21', '09:00:00.000000', 15, 'qrqrrqr', '0', 3);

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
(235, 'admin@mail.com', 'customer@gmail.com', 'drth', '', '2024-02-21 06:36:25'),
(233, 'customer@gmail.com', 'admin@mail.com', 'halo kask mau nanya', '', '2024-02-21 06:34:24'),
(231, 'admin@mail.com', 'customer@gmail.com', 'yes?', '', '2024-02-21 05:31:31'),
(234, 'customer@gmail.com', 'admin@mail.com', 'halo kask mau nanyaoooo', '', '2024-02-21 06:35:56'),
(229, 'customer@gmail.com', 'admin@mail.com', 'halo', '', '2024-02-21 05:31:10');

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
(14, 'admin', 'admin', 'admin@mail.com', '$2y$10$xKGRrpy1MPPfc2TEC2jHXOaN5d3MjGDd5tbgrN89NNKdnNXjyGrUO', '$2y$10$xcpchk2okWsv7yAHsBZt/.GMglEgsXIJ2iu0ICGr3a5gHmJLxv0dy', '');

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
  MODIFY `idBooking` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(23) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
