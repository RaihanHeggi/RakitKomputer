-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 03:25 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `id_admin` int(4) UNSIGNED NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `alamat_admin` varchar(100) NOT NULL,
  `id_user` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `alamat_admin`, `id_user`) VALUES
(1, 'Arga', 'Bogor', 4),
(2, 'Admin', 'Kota Admin ', 6),
(3, ' motion123', '123', 7);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(3) UNSIGNED NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `tipe_barang` varchar(100) NOT NULL,
  `merk_barang` varchar(100) NOT NULL,
  `harga_barang` varchar(100) NOT NULL,
  `stok_barang` varchar(4) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `tipe_barang`, `merk_barang`, `harga_barang`, `stok_barang`, `foto`, `deskripsi`) VALUES
(2, 'VGA 1GB', 'Graphic Card', 'NVIDIA', '25000', '19', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a orci quis.'),
(3, 'VGA 2GB', 'Graphic Card', 'NVIDIA', '40000', '41', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a orci quis.'),
(4, 'RAM 4GB', 'RAM', 'HYNIX', '30000', '7', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a orci quis.');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(3) UNSIGNED NOT NULL,
  `id_konsultasi` int(3) NOT NULL,
  `komentar` longtext NOT NULL,
  `id_user` int(3) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_konsultasi`, `komentar`, `id_user`, `timestamp`) VALUES
(1, 1, 'Minta Saran untuk Komputer Spek Dewa Bagaimana', 2, '2021-06-09 10:01:45'),
(2, 1, 'coba make hp spectre', 1, '2021-06-10 09:43:21'),
(3, 2, 'Minta sarannya untuk membuat server jkhkjhj', 2, '2021-06-12 13:58:54'),
(5, 2, 'coba dibuat dengan spek 16 JT-an', 1, '2021-06-15 00:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `konsultan`
--

CREATE TABLE `konsultan` (
  `id_konsultan` int(3) UNSIGNED NOT NULL,
  `nama_konsultan` varchar(100) NOT NULL,
  `alamat_konsultan` varchar(100) NOT NULL,
  `email_konsultan` varchar(100) NOT NULL,
  `id_user` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `konsultan`
--

INSERT INTO `konsultan` (`id_konsultan`, `nama_konsultan`, `alamat_konsultan`, `email_konsultan`, `id_user`) VALUES
(1, 'Sya Raihan Heggi', 'Vila Bogor Indah', 'heggi.sya@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(3) UNSIGNED NOT NULL,
  `id_user` int(3) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `id_user`, `judul`, `timestamp`) VALUES
(1, 2, 'Kenapa Saya Lag', '2021-06-09 10:01:45'),
(2, 2, 'Saran membuat server', '2021-06-12 13:58:54');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_keuangan`
--

CREATE TABLE `laporan_keuangan` (
  `id_laporan` int(3) UNSIGNED NOT NULL,
  `tanggal_laporan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laporan_keuangan`
--

INSERT INTO `laporan_keuangan` (`id_laporan`, `tanggal_laporan`) VALUES
(3, '2021-06-04'),
(4, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `manajer`
--

CREATE TABLE `manajer` (
  `id_manajer` int(3) UNSIGNED NOT NULL,
  `nama_manajer` varchar(100) NOT NULL,
  `alamat_manajer` varchar(100) NOT NULL,
  `id_user` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manajer`
--

INSERT INTO `manajer` (`id_manajer`, `nama_manajer`, `alamat_manajer`, `id_user`) VALUES
(1, 'Hindia', 'Jln Telekomunikasi', 4);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(10);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(3) UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat_pelanggan` varchar(100) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `id_user` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `email_pelanggan`, `id_user`) VALUES
(1, 'Hafidz Lazuardi', 'Banjar', 'hafidz123@gmail.com', 2),
(2, 'Fariz M R', 'Malang', 'farizmr@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(3) UNSIGNED NOT NULL,
  `metode_pembayaran` varchar(70) NOT NULL,
  `total_harga` varchar(10) NOT NULL,
  `id_barang` int(4) UNSIGNED NOT NULL,
  `id_pelanggan` int(4) UNSIGNED NOT NULL,
  `status` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `metode_pembayaran`, `total_harga`, `id_barang`, `id_pelanggan`, `status`, `tanggal`) VALUES
(1, 'Cash On Delivery', '10000', 1, 1, 'BARANG TIDAK TERSEDIA', '2021-06-04'),
(2, 'Transfer Bank', '40000', 3, 1, 'SUDAH BAYAR', '2021-06-04'),
(8, 'Cash On Delivery', '25000', 2, 1, 'SUDAH BAYAR', '2021-06-10'),
(9, '', '25000', 2, 1, 'BELUM BAYAR', '2021-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(3) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`) VALUES
(1, 'heggi123', '123', 'heggi.sya@gmail.com'),
(2, 'hafidz123', '123', 'hafidz123@gmail.com'),
(3, 'fariz123', '123', 'fariz123@gmail.com'),
(4, 'hindia123', '123', 'hindia123@gmail.com'),
(5, 'arga123', '123', 'arga123@gmail.com'),
(6, 'admin123', '123', 'Admin@admin.com'),
(7, 'motion123', '123', 'motion123@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `konsultan`
--
ALTER TABLE `konsultan`
  ADD PRIMARY KEY (`id_konsultan`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indexes for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `manajer`
--
ALTER TABLE `manajer`
  ADD PRIMARY KEY (`id_manajer`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `konsultan`
--
ALTER TABLE `konsultan`
  MODIFY `id_konsultan` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  MODIFY `id_laporan` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manajer`
--
ALTER TABLE `manajer`
  MODIFY `id_manajer` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
