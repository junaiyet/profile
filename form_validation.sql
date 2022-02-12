-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2022 at 09:59 PM
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
-- Database: `form_validation`
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
  `profile_photo` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profile_photo`, `created_at`, `status`) VALUES
(2, 'Olga Tate', 'cykehokyvy@mailinator.com', '$2y$10$HGTKGEHytQ6Tdd6pvizqxuMqJBkm37sxXvBpim4Sej5RovKVkD.De', '2.png', '2022-02-07 02:54:32', 0),
(9, 'JUNAIYET MIA', 'junaiyet@gmail.com', '$2y$10$5d1xG6OvnElffp5wdR5qSO8peAhop0YBydaoxbJ1yvqZ0aWqO7R3S', '9.png', '2022-02-08 02:39:15', 0),
(10, 'fauleeeeeeeeeee', 'zeqoqabipi@mailinator.com', '$2y$10$QfpOBu1yH3obBQqiaFep7.0bUyMiRDdZmG7UDg13JikrpQe1OGyZu', '10.jpg', '2022-02-08 08:28:31', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
