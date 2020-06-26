-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 17, 2020 at 06:53 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `innerwor_innerwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

DROP TABLE IF EXISTS `agency`;
CREATE TABLE IF NOT EXISTS `agency` (
  `userid` int(5) NOT NULL AUTO_INCREMENT,
  `companyname` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `mobile` text NOT NULL,
  `address` varchar(500) NOT NULL,
  `state` text NOT NULL,
  `city` text NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `contactperson` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL,
  `noofstaffs` int(20) NOT NULL,
  `noofoffices` int(20) NOT NULL,
  `noofplacements` int(20) NOT NULL,
  `privacy` text NOT NULL,
  `terms` text NOT NULL,
  `comment` varchar(100) NOT NULL,
  `sector` varchar(100) NOT NULL,
  `experience` varchar(10) NOT NULL,
  `keyword` varchar(30) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`userid`, `companyname`, `website`, `mobile`, `address`, `state`, `city`, `postcode`, `contactperson`, `email`, `password`, `noofstaffs`, `noofoffices`, `noofplacements`, `privacy`, `terms`, `comment`, `sector`, `experience`, `keyword`, `image`) VALUES
(1, 'innerwork.com', 'travels', '7896541238', '     kolhapur', '     Delhi', '      New Delhi ', '     4', '    samikshavanjole', 'aaaa@gmail.com', '1234', 12, 12, 12, '0', '0', 'welcome', '', '', '', ''),
(2, 'mindwings', 'zz', '8795478512', 'ppp', 'Dadra & Nagar Haveli', ' Luari ', '987589', 'ppppppppp', 'qqqq@gmail.com', '1111', 2, 5, 45, '0', '0', '', '', '', '', ''),
(3, 'innerworkindia.com', 'lll', '8475961254', 'bangolore', 'Chhattisgarh', ' Baikunthpur ', '416210', 'Bela', 'pratiksha@gmail.com', '2222', 85, 55, 125, '0', '0', '', '', '', '', ''),
(4, 'innerwork.com', ' bbggg', '7896541238', ' kolhapur', ' Delhi', '  New Delhi ', ' 47895', ' tytyt', 'axax@gmail.com', '3333', 85, 45, 400, '0', '0', '', 'Agriculture, Fishing, Forestry', '', '', ''),
(5, 'innerworkindia.com', ' tttt', '8475961254', ' bangolore', ' Chhattisgarh', '  Baikunthpur ', ' 41621', ' ggg', 'pratiksha1029@gmail.com', '1029', 2, 23, 51, '0', '0', '', 'Agriculture, Fishing, Forestry', '12', ' IT', ''),
(6, 'a', 'a', '1', 'a', 'Gujarat', ' Amod ', '1', 'a', 'xyz@gmail.com', '1', 1, 1, 1, 'on', 'on', 'qqq', 'Aerospace', '2', 'it', '80139449.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `img` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `publishdate` date NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `freelancer`
--

DROP TABLE IF EXISTS `freelancer`;
CREATE TABLE IF NOT EXISTS `freelancer` (
  `userid` int(5) NOT NULL AUTO_INCREMENT,
  `companyname` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `mobile` text NOT NULL,
  `address` varchar(500) NOT NULL,
  `state` text NOT NULL,
  `city` text NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `contactperson` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL,
  `noofstaffs` int(20) NOT NULL,
  `noofoffices` int(20) NOT NULL,
  `noofplacements` int(20) NOT NULL,
  `privacy` text NOT NULL,
  `terms` text NOT NULL,
  `comment` varchar(100) NOT NULL,
  `sector` varchar(100) NOT NULL,
  `experience` varchar(10) NOT NULL,
  `keyword` varchar(30) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `freelancer`
--

INSERT INTO `freelancer` (`userid`, `companyname`, `website`, `mobile`, `address`, `state`, `city`, `postcode`, `contactperson`, `email`, `password`, `noofstaffs`, `noofoffices`, `noofplacements`, `privacy`, `terms`, `comment`, `sector`, `experience`, `keyword`, `image`) VALUES
(1, 'innerwork.com', 'travels', '7896541238', '     kolhapur', '     Delhi', '      New Delhi ', '     4', '    samikshavanjole', 'aaaa@gmail.com', '1234', 12, 12, 12, '0', '0', 'welcome', '', '', '', ''),
(2, 'mindwings', 'zz', '8795478512', 'ppp', 'Dadra & Nagar Haveli', ' Luari ', '987589', 'ppppppppp', 'qqqq@gmail.com', '1111', 2, 5, 45, '0', '0', '', '', '', '', ''),
(3, 'innerworkindia.com', 'lll', '8475961254', 'bangolore', 'Chhattisgarh', ' Baikunthpur ', '416210', 'Bela', 'pratiksha@gmail.com', '2222', 85, 55, 125, '0', '0', '', '', '', '', ''),
(4, 'innerwork.com', ' bbggg', '7896541238', ' kolhapur', ' Delhi', '  New Delhi ', ' 47895', ' tytyt', 'axax@gmail.com', '3333', 85, 45, 400, '0', '0', '', 'Agriculture, Fishing, Forestry', '', '', ''),
(5, 'innerworkindia.com', ' tttt', '8475961254', ' bangolore', ' Chhattisgarh', '  Baikunthpur ', ' 41621', ' ggg', 'pratiksha1029@gmail.com', '1029', 2, 23, 51, '0', '0', '', 'Agriculture, Fishing, Forestry', '12', ' IT', ''),
(6, 'a', 'a', '1', 'a', 'Assam', ' Bijni ', '1', 'a', 'sss@gmail.com', '1', 1, 1, 12, 'on', 'on', 'qqq', 'Aerospace', '1', 'it', '1587741660Innerwork4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jobpost`
--

DROP TABLE IF EXISTS `jobpost`;
CREATE TABLE IF NOT EXISTS `jobpost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobTitle` varchar(30) NOT NULL,
  `company` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `jobType` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `minSalary` double NOT NULL,
  `maxSalary` double NOT NULL,
  `cpname` varchar(20) NOT NULL,
  `cpnum` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

DROP TABLE IF EXISTS `jobseeker`;
CREATE TABLE IF NOT EXISTS `jobseeker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `city` varchar(10) NOT NULL,
  `education` varchar(100) NOT NULL,
  `email` varchar(80) NOT NULL,
  `mobileNum` varchar(15) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `pass` varchar(90) NOT NULL,
  `role` varchar(10) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `pass`, `role`, `dateTime`) VALUES
(1, 'admin@gmail.com', '$2y$10$RCS87YXnjmW3UuL6yAEzmeqW8x/2OGOMPvPYDg/WO/P7NBf3F4.jG', 'ADMIN', '2020-03-07 10:28:56');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
