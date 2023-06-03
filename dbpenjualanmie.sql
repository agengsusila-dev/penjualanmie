-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2023 pada 07.50
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

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
-- Struktur dari tabel `detailorder`
--

CREATE TABLE `detailorder` (
  `rcpt#` varchar(12) DEFAULT NULL,
  `idproduk` varchar(12) DEFAULT NULL,
  `qtyproduk` int(11) DEFAULT NULL,
  `hargatotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `rcpt#` varchar(12) NOT NULL,
  `idstore` varchar(25) DEFAULT NULL,
  `ordertime` datetime DEFAULT NULL,
  `itemstotal` int(11) DEFAULT NULL,
  `promo` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `pajak` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`rcpt#`, `idstore`, `ordertime`, `itemstotal`, `promo`, `subtotal`, `pajak`, `total`) VALUES
('DD2300001474', 'B01', '2023-03-01 15:56:24', 94544, 45454, 49090, 4909, 54000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pos`
--

CREATE TABLE `pos` (
  `idstore` varchar(12) NOT NULL,
  `postitle` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pos`
--

INSERT INTO `pos` (`idstore`, `postitle`) VALUES
('B01', 'Raden Intan'),
('B02', 'Summarecon Mal Bekasi'),
('B03', 'Tebet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `idproduk` varchar(12) NOT NULL,
  `namaproduk` varchar(25) DEFAULT NULL,
  `hargaproduk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idproduk`, `namaproduk`, `hargaproduk`) VALUES
('P001', 'Cheese Spicy Soup', 49090),
('P002', 'Cheese Spicy Saus', 49090),
('P003', 'Extra Spicy Ayam Goreng L', 45454);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  ADD KEY `fk_detailorder_order_1` (`rcpt#`),
  ADD KEY `fk_detailorder_produk_1` (`idproduk`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`rcpt#`),
  ADD KEY `fk_order_pos_1` (`idstore`);

--
-- Indeks untuk tabel `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`idstore`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  ADD CONSTRAINT `fk_detailorder_order_1` FOREIGN KEY (`rcpt#`) REFERENCES `order` (`rcpt#`),
  ADD CONSTRAINT `fk_detailorder_produk_1` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`idproduk`);

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_pos_1` FOREIGN KEY (`idstore`) REFERENCES `pos` (`idstore`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
