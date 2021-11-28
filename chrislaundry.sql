-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 08:46 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chrislaundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `KodeNota` int(5) NOT NULL,
  `TanggalNota` date NOT NULL,
  `PelangganID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`KodeNota`, `TanggalNota`, `PelangganID`) VALUES
(1, '2021-10-03', 1),
(2, '2021-10-04', 2),
(3, '2021-10-05', 3);

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `KodeLayanan` char(3) NOT NULL,
  `JenisLayanan` varchar(10) NOT NULL,
  `HargaLayanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`KodeLayanan`, `JenisLayanan`, `HargaLayanan`) VALUES
('KLT', 'Kilat', 8000),
('REG', 'Reguler', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `KodeNota` int(5) NOT NULL,
  `KodeLayanan` varchar(3) NOT NULL,
  `Qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`KodeNota`, `KodeLayanan`, `Qty`) VALUES
(1, 'REG', 4),
(2, 'KLT', 3),
(2, 'REG', 2),
(3, 'KLT', 4),
(3, 'REG', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `PelangganID` int(5) NOT NULL,
  `NamaPelanggan` varchar(40) NOT NULL,
  `AlamatPelanggan` varchar(50) NOT NULL,
  `NoTelp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`PelangganID`, `NamaPelanggan`, `AlamatPelanggan`, `NoTelp`) VALUES
(1, 'M Putra', 'Jalan Kenangan', '818222222'),
(2, 'Fernando', 'Jalan Sesama', '62855225'),
(3, 'Maximiliano', 'Jalan Pemuda', '838678888'),
(12, 'Coba123', 'jalan Sleman', '123446');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`KodeNota`),
  ADD KEY `FK_pelanggan_invoice` (`PelangganID`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`KodeLayanan`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`KodeNota`,`KodeLayanan`),
  ADD KEY `FK_layanan` (`KodeLayanan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`PelangganID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `KodeNota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `PelangganID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `FK_pelanggan_invoice` FOREIGN KEY (`PelangganID`) REFERENCES `pelanggan` (`PelangganID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_Nota_Order` FOREIGN KEY (`KodeNota`) REFERENCES `invoice` (`KodeNota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_layanan` FOREIGN KEY (`KodeLayanan`) REFERENCES `layanan` (`KodeLayanan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
