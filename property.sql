-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2018 at 06:44 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homeelite`
--

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE IF NOT EXISTS `property` (
  `id` int(10) NOT NULL,
  `details` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `ranges` varchar(100) NOT NULL,
  `contactno` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `details`, `city`, `type`, `ranges`, `contactno`, `email`, `image`) VALUES
(47, 'Home for renta,, No 123 adyar', 'Chennai', 'Residetal', '45000-60000', '232323', 'aasif@gmail.com', 'upload/hm1.jpg'),
(48, 'aasdf', 'Chennai', 'Commercial', '30000-45000', '46565', 'sfgfgfh', 'upload/sh2.jpg'),
(49, 'no 111 central', 'Chennai', 'Commercial', '15000-30000', '8765556', 'abc@gmail.com', 'upload/sh1.jpg'),
(50, 'no 1442', 'Chennai', 'Residetal', '5000-15000', '8765556', 'abc@gmail.com', 'upload/hm3.jpg'),
(51, 'no12 central chennai', 'Chennai', 'Residetal', '45000-60000', '45676556', 'aaa@gmail.com', 'upload/bg2.jpg'),
(52, 'no.144 mosque st,egmore,chennai', 'Chennai', 'Residential', '15000-30000', '9585640025', 'aaa@gmail.com', 'upload/aaa.JPG'),
(53, 'no 122 peter road,chennai', 'Chennai', 'Residential', '15000-30000', '2345656', 'af@gmail.com', 'upload/bg1.jpg'),
(54, 'no 150 peter road,chennai', 'Chennai', 'Residetal', '30000-45000', '23456', 'a@gmail.com', 'upload/hm4.jpg'),
(55, 'no 133 sssss', 'Chennai', 'Residetal', '60000-75000', '3534545', 'aaa@gmail.com', 'upload/hm10.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
