-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2016 at 12:36 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trusty-bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountinformation`
--

CREATE TABLE `accountinformation` (
  `id` bigint(10) NOT NULL,
  `accountNumber` varchar(255) NOT NULL,
  `password` int(4) NOT NULL,
  `accountHolderFirstName` char(255) NOT NULL,
  `accountHolderLastName` char(255) NOT NULL,
  `balance` bigint(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountinformation`
--

INSERT INTO `accountinformation` (`id`, `accountNumber`, `password`, `accountHolderFirstName`, `accountHolderLastName`, `balance`) VALUES
(1234567, 'a', 12, 'Amrit', 'Gautam', 1348),
(1234568, 'b', 12, 'No Name', 'had Name', 3444),
(1234569, '123', 123, '123', '321', 309);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `message_body` varchar(255) NOT NULL,
  `posted_by` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `message_body`, `posted_by`) VALUES
(1, 'new1', 'test'),
(2, 'test', 'test'),
(3, 'test', 'test'),
(10, 'This is another dirty posts !', 'test'),
(9, 'test', 'test'),
(11, 'This is another dirty posts !', 'test'),
(12, 'hey there', 'test'),
(13, 'hey there', 'test'),
(14, 'stupid', 'test'),
(15, 'i there', 'test'),
(16, 'i there', 'test'),
(17, 'no plm', 'test'),
(18, 'hey', 'test'),
(19, 'e', 'test'),
(20, 'up', 'test'),
(21, 'up', 'test'),
(22, 'no up', 'test'),
(23, 'no up', 'test'),
(24, 'hey', 'test'),
(25, 'tehe', 'test'),
(26, 'no te', 'test'),
(27, 'more tests', 'test'),
(28, 'no more test', 'test'),
(29, 'test', 'test'),
(30, 'why post !!', 'test'),
(31, 'new', 'test'),
(32, 'no ', 'test'),
(33, 'new 1', 'test'),
(34, 'old', 'test'),
(35, 'i am very unhappy with you all', 'test'),
(36, 'why not second time !!', 'test'),
(37, 'tes', 'test'),
(38, 'bo', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountinformation`
--
ALTER TABLE `accountinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountinformation`
--
ALTER TABLE `accountinformation`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234570;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
