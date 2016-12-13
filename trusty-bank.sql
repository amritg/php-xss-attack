-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2016 at 09:18 AM
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
(1234567, 'a', 12, 'Amrit', 'Gautam', 1918),
(1234568, 'b', 12, 'Amit', 'Gautam', 2342),
(1234570, 'c', 12, 'Hacker', 'can Hack', 1234),
(1234571, '1', 1, 'a', 'a', 20);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `message_body` varchar(255) NOT NULL,
  `posted_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `message_body`, `posted_by`, `created_at`) VALUES
(1, 'This is first messaage', 1234567, '2016-12-12 13:36:29'),
(71, '<a href="http://localhost:8888/php-xss-attack/transfer.php?toAccount=b&amount=50">This link is awesome</a>', 1234567, '2016-12-12 13:36:29'),
(91, 'Hey ! Do you want to know about Hacking ??', 1234570, '2016-12-12 15:20:32');

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
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234572;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
