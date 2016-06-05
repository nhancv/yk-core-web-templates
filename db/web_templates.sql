-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 05, 2016 at 03:33 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_templates`
--
CREATE DATABASE IF NOT EXISTS `web_templates` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `web_templates`;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'private id',
  `pid` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'public id',
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL COMMENT '0: owner, 1: assistant, 2: partner, 3: shipper',
  `block` int(11) NOT NULL DEFAULT '0' COMMENT '0: normal, 1: block, 2: wait accept',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='User table';

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`uid`, `pid`, `password`, `name`, `phone`, `address`, `type`, `block`, `create_date`, `update_date`, `author`) VALUES
('59BFB2B0-B593-3020-D09F-527F3FA29125', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Nhan Cao', '099', '', 0, 0, '2016-05-28 12:57:34', '2016-06-05 15:31:11', 'Nhan Cao');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `pid` (`pid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
