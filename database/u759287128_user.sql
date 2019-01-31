-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 31, 2019 at 06:04 AM
-- Server version: 10.2.17-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u759287128_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `tap_user`
--

CREATE TABLE `tap_user` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `highscore` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tap_user`
--

INSERT INTO `tap_user` (`id`, `name`, `email`, `password`, `highscore`) VALUES
(4, 'Admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 38),
(5, 'Admin2', 'admin@admin.com2', '21232f297a57a5a743894a0e4a801fc3', 0),
(6, 'Admin21', 'admin@admin.com1', '21232f297a57a5a743894a0e4a801fc3', 0),
(7, 'Admin212', 'admin@admin.com12', '21232f297a57a5a743894a0e4a801fc3', 0),
(8, 'Admin2122', 'admin@admin.com122', '21232f297a57a5a743894a0e4a801fc3', 0),
(9, 'Admin21222', 'admin@admin.com1222', '21232f297a57a5a743894a0e4a801fc3', 0),
(10, 'Admin212222', 'admin@admin.com12222', '21232f297a57a5a743894a0e4a801fc3', 5),
(11, 'adil', 'adil@adil.com', 'bb1ba5060d97ab96dc0ffb7c6c4163fe', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tap_user`
--
ALTER TABLE `tap_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tap_user`
--
ALTER TABLE `tap_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
