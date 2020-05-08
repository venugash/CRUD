-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2020 at 04:37 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aut`
--

DROP TABLE IF EXISTS `tbl_aut`;
CREATE TABLE IF NOT EXISTS `tbl_aut` (
  `aut_id` int(50) NOT NULL AUTO_INCREMENT,
  `aut_name` varchar(50) NOT NULL,
  PRIMARY KEY (`aut_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_aut`
--

INSERT INTO `tbl_aut` (`aut_id`, `aut_name`) VALUES
(5, ' Robert Jr. F. Kennedy'),
(4, 'Judy Mikovits'),
(6, 'Kent Heckenlively'),
(7, 'Forrest Maready'),
(8, ' Priyanka Amarathunge');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

DROP TABLE IF EXISTS `tbl_book`;
CREATE TABLE IF NOT EXISTS `tbl_book` (
  `b_id` int(50) NOT NULL AUTO_INCREMENT,
  `b_name` varchar(100) NOT NULL,
  `b_pub` date NOT NULL,
  `b_price` int(50) NOT NULL,
  `b_isbn` varchar(50) NOT NULL,
  `b_medium` varchar(50) NOT NULL,
  `b_cat` int(50) NOT NULL,
  `b_auth` int(5) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  PRIMARY KEY (`b_id`),
  KEY `b_cat` (`b_cat`),
  KEY `b_auth` (`b_auth`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`b_id`, `b_name`, `b_pub`, `b_price`, `b_isbn`, `b_medium`, `b_cat`, `b_auth`, `image_name`) VALUES
(30, 'Kumarihami', '2012-12-16', 680, ' B00APLNKR4', 'Sinhala', 15, 8, '51AWrSJGd7L.jpg'),
(29, 'Ennai Ennidamae Thanthuvidu', '2020-04-11', 435, ' B0871K5BN5', 'Tamil', 15, 4, '41L1664wBkL.jpg'),
(28, 'Hapana', '2012-12-25', 250, 'B00ATCKK1I', 'Sinhala', 16, 7, '51Mb9hgc9cL.jpg'),
(26, 'Plague of Corruption', '2017-07-12', 1528, 'B07S5H6T4Q', 'English', 17, 5, '511QZFeKBGL.jpg'),
(27, 'Dissolving Illusions', '2013-12-12', 990, 'B00E7FOA0U', 'English', 14, 4, '51f-GSjysxL._SX331_BO1,204,203,200_.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cat`
--

DROP TABLE IF EXISTS `tbl_cat`;
CREATE TABLE IF NOT EXISTS `tbl_cat` (
  `cat_id` int(5) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(20) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cat`
--

INSERT INTO `tbl_cat` (`cat_id`, `cat_name`) VALUES
(17, 'Fiction'),
(14, 'Science'),
(15, 'Classics'),
(16, 'Short Stories');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `u_name` varchar(50) NOT NULL,
  `u_pass` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`u_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`u_name`, `u_pass`) VALUES
('venu', 'venugash');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
