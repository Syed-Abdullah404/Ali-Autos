-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 24, 2021 at 04:37 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auto`
--

-- --------------------------------------------------------

--
-- Table structure for table `products_detail`
--

DROP TABLE IF EXISTS `products_detail`;
CREATE TABLE IF NOT EXISTS `products_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `suppler` text NOT NULL,
  `bill_id` text NOT NULL,
  `status` text NOT NULL,
  `sub_total` text NOT NULL,
  `paid` varchar(5000) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_detail`
--

INSERT INTO `products_detail` (`id`, `suppler`, `bill_id`, `status`, `sub_total`, `paid`) VALUES
(1, '2', 'one', 'paid', '4,000.00', '1000'),
(2, '2', 'two', 'unpaid', '9,000.00', '1000'),
(3, '2', 'one', 'paid', '2,400.00', '1000');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
