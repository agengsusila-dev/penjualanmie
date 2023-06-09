-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 09, 2023 at 06:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpenjualanmie`
--
CREATE DATABASE IF NOT EXISTS `dbpenjualanmie` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbpenjualanmie`;

-- --------------------------------------------------------

--
-- Table structure for table `detailorder`
--

CREATE TABLE `detailorder` (
  `rcpt` varchar(12) DEFAULT NULL,
  `idproduk` varchar(12) DEFAULT NULL,
  `qtyproduk` int(11) DEFAULT NULL,
  `hargatotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detailorder`
--

INSERT INTO `detailorder` (`rcpt`, `idproduk`, `qtyproduk`, `hargatotal`) VALUES
('DD2300001474', 'P002', 2, 98180);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `rcpt` varchar(12) NOT NULL,
  `idstore` varchar(25) DEFAULT NULL,
  `ordertime` datetime DEFAULT NULL,
  `itemstotal` int(11) DEFAULT NULL,
  `promo` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `pajak` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`rcpt`, `idstore`, `ordertime`, `itemstotal`, `promo`, `subtotal`, `pajak`, `total`) VALUES
('', 'B03', '2023-04-12 12:00:00', 0, 0, 0, 0, 0),
('asdasd12', 'B03', '2023-06-05 14:50:50', 2, 0, 0, 0, 0),
('DD2300001474', 'B01', '2023-03-01 15:56:24', 94544, 45454, 49090, 4909, 54000),
('tes', 'B02', '2023-01-21 12:01:00', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `idstore` varchar(12) NOT NULL,
  `postitle` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pos`
--

INSERT INTO `pos` (`idstore`, `postitle`) VALUES
('B01', 'Raden Intan'),
('B02', 'Summarecon Mal Bekasi'),
('B03', 'Tebet');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idproduk` varchar(12) NOT NULL,
  `namaproduk` varchar(50) DEFAULT NULL,
  `hargaproduk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idproduk`, `namaproduk`, `hargaproduk`) VALUES
('P001', 'Cheese Spicy Soup', 49090),
('P002', 'Cheese Spicy Saus', 49090),
('P003', 'Extra Spicy Ayam Goreng L', 45454),
('P004', 'Extra Spicy Chicken Lamian', 49090),
('P005', 'Extra Spicy Beef lamian', 49090),
('P006', 'Lamian BBQ Combo', 47272),
('P007', 'Lamian Rica Rica', 43636),
('P008', 'Lamian Ayam Goreng', 34545),
('P009', 'Lamian Pangsit', 42727),
('P010', 'Lamian Honey BBQ Chicken', 45454),
('P011', 'Lamian Sapi', 47272);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailorder`
--
ALTER TABLE `detailorder`
  ADD KEY `fk_detailorder_order_1` (`rcpt`),
  ADD KEY `fk_detailorder_produk_1` (`idproduk`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`rcpt`),
  ADD KEY `fk_order_pos_1` (`idstore`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`idstore`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailorder`
--
ALTER TABLE `detailorder`
  ADD CONSTRAINT `fk_detailorder_order_1` FOREIGN KEY (`rcpt`) REFERENCES `order` (`rcpt`),
  ADD CONSTRAINT `fk_detailorder_produk_1` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`idproduk`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_pos_1` FOREIGN KEY (`idstore`) REFERENCES `pos` (`idstore`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
