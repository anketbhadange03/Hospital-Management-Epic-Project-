-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 11, 2023 at 04:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `train` text NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `station` text NOT NULL,
  `bags` int(11) NOT NULL,
  `coach` text NOT NULL,
  `seat` text NOT NULL,
  `email` text NOT NULL,
  `date` text NOT NULL,
  `time` time NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `train`, `name`, `phone`, `station`, `bags`, `coach`, `seat`, `email`, `date`, `time`, `cost`) VALUES
(1, 'e503392e-9741-11ee-a128-e6350eabd8de', 'nora', 'brij', 'doc', 10, 'saman', 'paracetamol', ' high fever,nasea', '2023-12-11', '17:40:00', 100),
(2, 'e503392e-9741-11ee-a128-e6350eabd8de', 'nora', 'brij', 'doc', 10, 'sama', 'paracetamol', ' high fever', '2023-12-10', '18:24:00', 100);

-- --------------------------------------------------------

--
-- Table structure for table `coolie`
--

CREATE TABLE `coolie` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` int(11) NOT NULL,
  `profession` text NOT NULL,
  `password` text NOT NULL,
  `registration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coolie`
--

INSERT INTO `coolie` (`id`, `name`, `email`, `phone`, `profession`, `password`, `registration`) VALUES
(1, 'brijbhushan', 'brij@gmail.com', 1234567890, 'DDU', 'brij123', 432156757),
(2, 'brijbhushan', 'brij@gmail.com', 1234567889, 'DDU', 'brij@123', 98768765),
(3, 'brijbhushan', 'brij@gmail.com', 1234567890, 'DDU', 'brij123', 432156757),
(4, 'bipasha roy', 'roy@villa.com', 77777, 'DDU', '345456567', 777770000),
(5, 'vipra', 'vipra@gmail.com', 1020304050, 'DDU', 'vipra123', 1029384867),
(6, 'rita', 'rita@gmail.com', 1232344322, 'DDU', 'rita123', 123334454);

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` int(10) NOT NULL,
  `registration` int(11) NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `name`, `phone`, `registration`, `password`, `email`) VALUES
(1, 'sama', 1234567891, 234567890, 'sama123', 'sama@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `feed` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `name`, `feed`) VALUES
(1, 'TWISHA', 'good service'),
(2, 'TWISHA', 'good service'),
(3, 'meena', 'good servics'),
(4, 'barbie', 'good'),
(5, 'barbie', 'good'),
(19, 'lana dey ray', 'yolo'),
(20, 'lana dey ray', 'yolo'),
(21, 'satya', 'nice service'),
(22, 'satya', 'nice service'),
(23, 'kujar', 'good service');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `user_id` char(36) NOT NULL DEFAULT uuid()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_id`) VALUES
(1, 'nora', 'nora@gmail.com', 'nora@123', 'e503392e-9741-11ee-a128-e6350eabd8de'),
(2, 'rima', 'rima@gmail.com', 'rima123', '39556c3a-9752-11ee-a128-e6350eabd8de');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coolie`
--
ALTER TABLE `coolie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coolie`
--
ALTER TABLE `coolie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
