-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2015 at 05:13 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tours`
--

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
  `tour` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`, `tour`) VALUES
(30, 'khach san horizon hanoi', 'khach san horizon hanoi', 21.029364, 105.828850, '', NULL),
(29, 'hoc vien hanh chinh, hanoi', 'hoc vien hanh chinh, hanoi', 21.023411, 105.810608, '', NULL),
(28, 'hang day hanoi', 'hang day hanoi', 21.030766, 105.833832, '', NULL),
(27, 'Piroshky Piroshky', '1908 Pike pl, Seattle, WA', 47.610126, -122.342834, 'restaurant', 1),
(26, 'Wingdome', '1416 E Olive Way, Seattle, WA', 47.617214, -122.326584, 'bar', 1),
(25, 'Mama''s Mexican Kitchen', '2234 2nd Ave, Seattle, WA', 47.613976, -122.345467, 'bar', 1),
(23, 'Sake House', '2230 1st Ave, Seattle, WA', 47.612823, -122.345673, 'bar', 2),
(24, 'Crab Pot', '1301 Alaskan Way, Seattle, WA', 47.605961, -122.340363, 'restaurant', 4),
(19, 'Pan Africa Market', '1521 1st Ave, Seattle, WA', 47.608940, -122.340141, 'restaurant', 2),
(20, 'Buddha Thai & Bar', '2222 2nd Ave, Seattle, WA', 47.613590, -122.344391, 'bar', 3),
(21, 'The Melting Pot', '14 Mercer St, Seattle, WA', 47.624561, -122.356445, 'restaurant', 3),
(22, 'Ipanema Grill', '1225 1st Ave, Seattle, WA', 47.606365, -122.337654, 'restaurant', 4),
(32, 'Khách sạn La thành, Hà nội', 'Khách sạn La thành, Hà nội', 21.022516, 105.822815, '', NULL),
(31, 'nha tho lon hanoi', 'nha tho lon hanoi', 21.027763, 105.834160, '', NULL),
(33, 'Khách sạn Quảng Bá, Hà nội', 'Khách sạn Quảng Bá, Hà nội', 21.027763, 105.834160, '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
