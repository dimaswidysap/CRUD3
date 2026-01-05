-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2026 at 10:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alif`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` decimal(15,2) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `kategori`, `harga`, `stok`) VALUES
('BRG001', 'Laptop Asus ROG', 'Elektronik', 15000000.00, 5),
('BRG002', 'Mouse Wireless Logitech', 'Aksesoris', 150000.00, 20),
('BRG003', 'Keyboard Mechanical', 'Aksesoris', 450000.00, 10),
('BRG004', 'Monitor LG 24 Inch', 'Elektronik', 1800000.00, 7),
('BRG005', 'Kabel HDMI 2m', 'Aksesoris', 50000.00, 50),
('BRG006', 'Printer Epson L3110', 'Elektronik', 2500000.00, 3),
('BRG007', 'Tinta Printer Hitam', 'ATK', 85000.00, 100),
('BRG009', 'Flashdisk Sandisk 32GB', 'Aksesoris', 75000.00, 30),
('BRG010', 'Speaker Bluetooth JBL', 'Elektronik', 1200000.00, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
