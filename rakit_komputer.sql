-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2021 at 03:17 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rakit_komputer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(3) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `alamat_admin` varchar(100) NOT NULL,
  `id_user` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(3) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `tipe_barang` varchar(50) NOT NULL,
  `merk_barang` varchar(100) NOT NULL,
  `harga_barang` varchar(100) NOT NULL,
  `stok_barang` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `konsultan`
--

CREATE TABLE `konsultan` (
  `id_konsultan` int(3) NOT NULL,
  `nama_konsultan` varchar(100) NOT NULL,
  `alamat_konsultan` varchar(100) NOT NULL,
  `email_konsultan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(3) NOT NULL,
  `data_konsultasi` varchar(255) NOT NULL,
  `id_pelanggan` int(3) NOT NULL,
  `id_konsultan` int(3) NOT NULL,
  `timestamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_keuangan`
--

CREATE TABLE `laporan_keuangan` (
  `id_laporan` int(3) NOT NULL,
  `tanggal_laporan` date NOT NULL,
  `data_laporan` varchar(255) NOT NULL,
  `id_pesanan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `manajer`
--

CREATE TABLE `manajer` (
  `id_manajer` int(3) NOT NULL,
  `nama_manajer` varchar(100) NOT NULL,
  `alamat_manajer` varchar(100) NOT NULL,
  `id_user` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(3) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat_pelanggan` varchar(100) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `id_user` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(3) NOT NULL,
  `metode_pembayaran` varchar(70) NOT NULL,
  `total_harga` varchar(100) NOT NULL,
  `id_barang` int(3) NOT NULL,
  `id_pelanggan` int(3) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `konsultan`
--
ALTER TABLE `konsultan`
  ADD PRIMARY KEY (`id_konsultan`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_konsultan` (`id_konsultan`);

--
-- Indexes for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `manajer`
--
ALTER TABLE `manajer`
  ADD PRIMARY KEY (`id_manajer`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konsultan`
--
ALTER TABLE `konsultan`
  MODIFY `id_konsultan` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  MODIFY `id_laporan` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manajer`
--
ALTER TABLE `manajer`
  MODIFY `id_manajer` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(3) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD CONSTRAINT `konsultasi_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE,
  ADD CONSTRAINT `konsultasi_ibfk_2` FOREIGN KEY (`id_konsultan`) REFERENCES `konsultan` (`id_konsultan`) ON DELETE CASCADE;

--
-- Constraints for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  ADD CONSTRAINT `laporan_keuangan_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE;

--
-- Constraints for table `manajer`
--
ALTER TABLE `manajer`
  ADD CONSTRAINT `manajer_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
