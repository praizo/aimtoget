-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2020 at 08:35 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `file_location` varchar(255) NOT NULL,
  `file_type` enum('public','private') NOT NULL DEFAULT 'public',
  `file_format` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `users_id`, `file_location`, `file_type`, `file_format`) VALUES
(17, 3, '16041740020.jpg', 'private', 'pictures'),
(18, 2, '16041740021.jpg', 'public', 'pictures'),
(19, 3, '16041740022.jpg', 'public', 'pictures'),
(20, 3, '16041740580.pdf', 'public', 'document'),
(21, 4, '16042790040.jpg', 'private', 'pictures'),
(22, 4, '16042790041.jpg', 'private', 'pictures'),
(23, 4, '16042790042.jpg', 'private', 'pictures'),
(24, 4, '16042790043.png', 'private', 'pictures'),
(25, 3, '16042811880.jpg', 'public', 'pictures'),
(26, 3, '16042811881.jpg', 'public', 'pictures'),
(27, 3, '16042811882.jpg', 'public', 'pictures');

-- --------------------------------------------------------

--
-- Table structure for table `sharedusers`
--

CREATE TABLE `sharedusers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `shareduser_id` bigint(20) UNSIGNED NOT NULL,
  `file_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sharedusers`
--

INSERT INTO `sharedusers` (`id`, `user_id`, `shareduser_id`, `file_id`) VALUES
(58, 3, 1, 17),
(59, 3, 2, 17),
(60, 4, 1, 21),
(61, 4, 2, 21),
(62, 4, 3, 21);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `pwd`) VALUES
(1, 'ade', 'ololade', 'test@example.com', 'a562cfa07c2b1213b3a5c99b756fc206'),
(2, 'adams', 'peju', 'peju@example.com', 'a562cfa07c2b1213b3a5c99b756fc206'),
(3, 'bis', 'ade', 'bis@test.com', 'a562cfa07c2b1213b3a5c99b756fc206'),
(4, 'benny', 'ayo', 'benny@test.com', 'a562cfa07c2b1213b3a5c99b756fc206');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sharedusers`
--
ALTER TABLE `sharedusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1` (`file_id`),
  ADD KEY `fk2` (`user_id`),
  ADD KEY `fk3` (`shareduser_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sharedusers`
--
ALTER TABLE `sharedusers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sharedusers`
--
ALTER TABLE `sharedusers`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`),
  ADD CONSTRAINT `fk2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk3` FOREIGN KEY (`shareduser_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
