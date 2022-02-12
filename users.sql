-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2022 at 09:14 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `protfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `profile_photo` varchar(80) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profile_photo`, `created_at`, `status`, `role`) VALUES
(1, 'Margaret Owens', 'qylan@mailinator.com', '$2y$10$265NXIDBiLyssP6CyDmyheMBlwzEg/ceeEgRwY4DYKdiwQtT7FXtK', '1.jpg', '2022-02-12 10:02:49', 0, 4),
(2, 'JUNAIYET', 'junaiyet@gmail.com', '$2y$10$1R3RTOfu2kaSOnk7fknjN.PiL3tqien5aV2.C26DIQ2smuEMw8JZ.', '2.jpg', '2022-02-12 10:03:58', 0, 1),
(3, 'Lisandra Gardner', 'rinim@mailinator.com', '$2y$10$SI/nv27APOmTjwhzscm52uBhXZ0oogScq3SOYaoTmNoZy9ttF9.wS', '3.jpg', '2022-02-13 12:59:48', 0, 2),
(4, 'Zelenia Ochoa', 'lohi@mailinator.com', '$2y$10$M.MXQ.qaC1jEb.dZsqPsmuFeQe2WTIl4zLyXZuhnmOrOuqZkCVTq2', '4.jpg', '2022-02-13 01:00:21', 0, 3);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
