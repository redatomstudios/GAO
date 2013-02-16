-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2013 at 09:46 PM
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
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pageName` varchar(100) NOT NULL,
  `pageTitle` varchar(100) NOT NULL,
  `pageGroup` varchar(100) NOT NULL,
  `templateName` varchar(100) NOT NULL,
  `navOrder` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `pageName`, `pageTitle`, `pageGroup`, `templateName`, `navOrder`) VALUES
(1, 'index', 'Home', 'Index', 'skyblue', 1),
(2, 'Home', 'Test Title', 'Home', 'SkyBlue', 1);

-- --------------------------------------------------------

--
-- Table structure for table `skyblue`
--

DROP TABLE IF EXISTS `skyblue`;
CREATE TABLE IF NOT EXISTS `skyblue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pageTitle` varchar(50) DEFAULT NULL,
  `pageName` varchar(50) NOT NULL,
  `pageHeading` varchar(50) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pageContent` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pageName` (`pageName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `skyblue`
--

INSERT INTO `skyblue` (`id`, `pageTitle`, `pageName`, `pageHeading`, `timestamp`, `pageContent`) VALUES
(1, 'Home Page', 'index', 'Home Heading', '2013-02-12 19:35:40', 'gah =/'),
(3, 'Test Title', 'Home', 'Home Heading', '2013-02-16 20:42:28', 'asd');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `templateName`, `userView`, `cmsView`, `tableName`, `timestamp`) VALUES
(4, 'SkyBlue', 'index.php', 'view_cms.php', 'SkyBlue', '2013-02-12 18:16:47');

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
