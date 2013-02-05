-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2013 at 01:43 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gao`
--
DROP DATABASE `gao`;
CREATE DATABASE `gao` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gao`;

-- --------------------------------------------------------

--
-- Table structure for table `fundcontrol`
--

DROP TABLE IF EXISTS `fundcontrol`;
CREATE TABLE IF NOT EXISTS `fundcontrol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `targetAmout` int(10) NOT NULL,
  `collectedAmount` int(10) NOT NULL,
  `templateTableName` varchar(50) NOT NULL,
  `templateId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

DROP TABLE IF EXISTS `templates`;
CREATE TABLE IF NOT EXISTS `templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `templateName` varchar(50) NOT NULL,
  `userView` text NOT NULL,
  `cmsView` text NOT NULL,
  `tableName` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tableName` (`tableName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `usercontrol`
--

DROP TABLE IF EXISTS `usercontrol`;
CREATE TABLE IF NOT EXISTS `usercontrol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `accesscode` varchar(100) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `fundId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `fundId` (`fundId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `usercontrol`
--

INSERT INTO `usercontrol` (`id`, `username`, `accesscode`, `salt`, `fundId`) VALUES
(1, 'admin', '20ccff588bd5bd5effe31b88967e36c156e2926c', 'Xlnz6s2', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
