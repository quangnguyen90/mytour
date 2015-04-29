-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2015 at 10:44 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mytour`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE IF NOT EXISTS `carts` (
`id` int(11) NOT NULL,
  `json` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `json`) VALUES
(12, '5,6'),
(13, '5,6'),
(14, '5,6'),
(15, '5,6'),
(16, '1,2,3,4'),
(17, '1,2,3,6,7,6,1'),
(18, '7'),
(19, '1,4,5,7'),
(20, '1,2'),
(21, '2,1,3,4,5,6,7,7,5,4,3');

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE IF NOT EXISTS `markers` (
`id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tour` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`, `tour`) VALUES
(1, 'Pan Africa Market', '1521 1st Ave, Seattle, WA', 47.608940, -122.340141, 'restaurant', 1),
(2, 'Buddha Thai & Bar', '2222 2nd Ave, Seattle, WA', 47.613590, -122.344391, 'bar', 1),
(3, 'The Melting Pot', '14 Mercer St, Seattle, WA', 47.624561, -122.356445, 'restaurant', 2),
(4, 'Ipanema Grill', '1225 1st Ave, Seattle, WA', 47.606365, -122.337654, 'restaurant', 2),
(5, 'Sake House', '2230 1st Ave, Seattle, WA', 47.612823, -122.345673, 'bar', 3),
(6, 'Crab Pot', '1301 Alaskan Way, Seattle, WA', 47.605961, -122.340363, 'restaurant', 4),
(7, 'Mama''s Mexican Kitchen', '2234 2nd Ave, Seattle, WA', 47.613976, -122.345467, 'bar', 5),
(8, 'Wingdome', '1416 E Olive Way, Seattle, WA', 47.617214, -122.326584, 'bar', 6),
(9, 'Piroshky Piroshky', '1908 Pike pl, Seattle, WA', 47.610126, -122.342834, 'restaurant', 7);

-- --------------------------------------------------------

--
-- Table structure for table `pics`
--

CREATE TABLE IF NOT EXISTS `pics` (
`pic_id` int(11) NOT NULL,
  `pic_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pics`
--

INSERT INTO `pics` (`pic_id`, `pic_name`, `place_id`) VALUES
(1, 'p1.jpg', 1),
(2, 'p2.jpg', 1),
(3, 'p3.jpg', 2),
(4, 'p4.jpg', 2),
(5, 'p5.jpg', 3),
(6, 'p6.jpg', 3),
(7, 'p7.jpg', 4),
(8, 'p8.jpg', 4),
(9, 'p9.jpg', 5),
(10, 'p10.jpg', 5),
(11, 'p11.jpg', 6),
(12, 'p12.jpg', 6),
(13, 'p13.jpg', 7),
(14, 'p14.jpg', 7),
(15, 'p15.jpg', 8),
(16, 'p16.jpg', 8),
(17, 'p17.jpg', 9),
(18, 'p18.jpg', 9),
(19, 'p19.jpg', 1),
(20, 'p20.jpg', 2),
(21, 'p21.jpg', 3),
(22, 'p22.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE IF NOT EXISTS `tours` (
`tour_id` int(11) NOT NULL,
  `tour_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `tour_price` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`tour_id`, `tour_name`, `tour_price`) VALUES
(1, 'Nha Trang', 100),
(2, 'Da Lat', 200),
(3, 'Vung Tau', 300),
(4, 'Can Gio', 400),
(5, 'Hue', 500),
(6, 'Ha Long', 600),
(7, 'Ben Tre', 700);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pics`
--
ALTER TABLE `pics`
 ADD PRIMARY KEY (`pic_id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
 ADD PRIMARY KEY (`tour_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `pics`
--
ALTER TABLE `pics`
MODIFY `pic_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
