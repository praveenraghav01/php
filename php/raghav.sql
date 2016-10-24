-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2016 at 12:23 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raghav`
--

-- --------------------------------------------------------

--
-- Table structure for table `loveeconnect`
--

CREATE TABLE IF NOT EXISTS `loveeconnect` (
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `image` longblob,
  `log` tinyint(1) NOT NULL,
  `active` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loveeconnect`
--

INSERT INTO `loveeconnect` (`username`, `email`, `password`, `gender`, `dob`, `city`, `state`, `image`, `log`, `active`) VALUES
('Karishma', 'karishma@gmail.com', '123', 'Female', '28/08/1999', 'Gurgaon', 'Haryana', NULL, 0, '2016-01-20 03:58:36'),
('Md. Khalid', 'khalid@gmail.com', '123', 'Male', '16/02/1996', 'Begusarai', 'Bihar', NULL, 0, '2016-01-20 04:41:50'),
('Raghav', 'praveen01@gmail.com', '123', 'Male', '10/05/1996', 'Gurgaon', 'Haryana', NULL, 0, '2016-01-20 03:58:58'),
('PRAVEEN RAGHAV', 'praveen@gmail.com', '123', 'Male', '10/05/1996', 'Gurgaon', 'Haryana', 0x696d616765732f313435333232363536332e6a7067, 0, '2016-01-20 03:59:15'),
('Suraj Sugga', 'suraj@gmail.com', 'abc', 'Male', '09/09/1996', 'Ranchi', 'Jharkhand', NULL, 0, '2016-01-20 03:57:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loveeconnect`
--
ALTER TABLE `loveeconnect`
  ADD PRIMARY KEY (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
