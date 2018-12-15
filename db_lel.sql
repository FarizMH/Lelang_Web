-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2018 at 07:27 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lel`
--

-- --------------------------------------------------------

--
-- Table structure for table `auctioner`
--

CREATE TABLE `auctioner` (
  `username_auctioner` varchar(15) NOT NULL,
  `nama_auctioner` varchar(20) NOT NULL,
  `no_ktp` varchar(12) NOT NULL,
  `email_auctioner` varchar(15) NOT NULL,
  `alamat _auctioner` varchar(100) NOT NULL,
  `no_hp_auctioner` varchar(12) NOT NULL,
  `no_atm_auctioner` varchar(12) NOT NULL,
  `password_auctioner` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bidder`
--

CREATE TABLE `bidder` (
  `username_bidder` varchar(15) NOT NULL,
  `nama_bidder` varchar(20) NOT NULL,
  `email_bidder` varchar(15) NOT NULL,
  `password_bidder` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidder`
--

INSERT INTO `bidder` (`username_bidder`, `nama_bidder`, `email_bidder`, `password_bidder`) VALUES
('aiz_saja', 'fariz maulana herman', 'fariz.herman@gm', '$2y$10$cFsm6PjkJ7E4c'),
('kyou_hobby', 'fariz maulana herman', 'kaizaki.kaito@g', '123456'),
('mamatgrab', 'aditya', 'zona.animeku@gm', '$2y$10$PsQsOXr4TnoIc'),
('maz_azam', 'kabul ibnu suherman', 'farizmaulanaher', '$2y$10$48xPa.CBakTVN');

-- --------------------------------------------------------

--
-- Table structure for table `item_lelang`
--

CREATE TABLE `item_lelang` (
  `id_item` int(11) NOT NULL,
  `no_riwayat` int(11) DEFAULT NULL,
  `nama_item` varchar(20) NOT NULL,
  `judul_item` varchar(10) NOT NULL,
  `deskripsi_item` varchar(200) NOT NULL,
  `waktu_lelang` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_lelang`
--

CREATE TABLE `riwayat_lelang` (
  `no_riwayat` int(11) NOT NULL,
  `waktu` date NOT NULL,
  `username_auctioner` varchar(15) NOT NULL,
  `username_bidder` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auctioner`
--
ALTER TABLE `auctioner`
  ADD PRIMARY KEY (`username_auctioner`),
  ADD UNIQUE KEY `username_auctioner` (`username_auctioner`),
  ADD UNIQUE KEY `email_auctioner` (`email_auctioner`);

--
-- Indexes for table `bidder`
--
ALTER TABLE `bidder`
  ADD PRIMARY KEY (`username_bidder`),
  ADD UNIQUE KEY `username_bidder` (`username_bidder`),
  ADD UNIQUE KEY `emai_bidder` (`email_bidder`);

--
-- Indexes for table `item_lelang`
--
ALTER TABLE `item_lelang`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `deskripsi_item` (`deskripsi_item`);

--
-- Indexes for table `riwayat_lelang`
--
ALTER TABLE `riwayat_lelang`
  ADD PRIMARY KEY (`no_riwayat`),
  ADD UNIQUE KEY `username_auctioner` (`username_auctioner`),
  ADD UNIQUE KEY `username_bidder` (`username_bidder`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
