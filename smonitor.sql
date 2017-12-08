-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2017 at 12:02 AM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smonitor`
--
CREATE DATABASE IF NOT EXISTS `smonitor` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `smonitor`;

-- --------------------------------------------------------

--
-- Table structure for table `sensors`
--

CREATE TABLE IF NOT EXISTS `sensors` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'transaction ID',
  `sID` tinyint(4) NOT NULL,
  `sStatus` varchar(3) NOT NULL,
  `SValue` tinyint(4) NOT NULL,
  `sTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `sensors`
--

INSERT INTO `sensors` (`ID`, `sID`, `sStatus`, `SValue`, `sTime`) VALUES
(20, 1, 'NOK', 0, '2017-10-04 20:56:33'),
(21, 2, 'OK', 1, '2017-10-04 20:56:33'),
(22, 3, 'NOK', 0, '2017-10-04 20:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(1) NOT NULL DEFAULT 'U',
  `gID` int(11) NOT NULL DEFAULT '1',
  `uname` varchar(16) NOT NULL,
  `pwd` varchar(16) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `role`, `gID`, `uname`, `pwd`) VALUES
(1, 'U', 1, 'test', 'test'),
(2, 'U', 1, 'test2', 'test2');

-- --------------------------------------------------------

--
-- Table structure for table `users2`
--

CREATE TABLE IF NOT EXISTS `users2` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users2`
--

INSERT INTO `users2` (`ID`, `name`) VALUES
(1, 'test'),
(2, 'test2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
