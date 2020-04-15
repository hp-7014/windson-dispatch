-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 10, 2018 at 02:40 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stripeRecurring`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `plan` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `regDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `plan`, `password`, `regDate`) VALUES
(1, 'test@live.com', '2', '$2y$10$LMPWvjg2NxFh.BaNt.Kz7uAjD.cm2x4W3hmOF9h.FEghBJcnhd3Ma', '2018-12-08 12:20:53'),
(2, 'hello@codingpassiveincome.com', '3', '$2y$10$Jjj19VN52Giw/xH9bfvWP.pxvmG2eovdhVzA1mIhVwgmn09nHpD3W', '2018-12-08 12:28:46'),
(3, 'hello@codingpassiveincome.com', '3', '$2y$10$GLEiRppFSKURLPQ.7evVWO1tzznGbNoa.l3Ba4C9smqHbj351BYAq', '2018-12-08 12:29:59'),
(4, 'hello@codingpassiveincome.com', '3', '$2y$10$Togbn3zcwWF.RrcAAKiFdOiZC/.P7XTukgHpRy783Ad5l7cVEPZ8m', '2018-12-08 12:34:00'),
(5, 'hello@codingpassiveincome.com', '2', '$2y$10$mxmBHjQuxb.l48trrca9VueC66mqdtYxbkqnKxWsm02SiadOzvArK', '2018-12-08 12:37:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
