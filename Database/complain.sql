-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2024 at 08:46 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complain`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `admin_name`, `pass`) VALUES
(1, 'jhtan588@gmail.com', 'Aaron', '123'),
(2, 'Nick123@gmail.com', 'Nicholas', '123'),
(3, 'teddy12@gmail.com', 'Teddy', '123'),
(4, 'wsy1@gmail.com', 'WSY', '123');

-- --------------------------------------------------------

--
-- Table structure for table `comp`
--

CREATE TABLE `comp` (
  `comp_id` int(16) NOT NULL,
  `uid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comp_title` varchar(255) NOT NULL,
  `comp_status` int(10) NOT NULL,
  `replymsg` varchar(4000) NOT NULL,
  `assign_to` varchar(255) NOT NULL,
  `comp_details` varchar(2046) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comp`
--

INSERT INTO `comp` (`comp_id`, `uid`, `email`, `comp_title`, `comp_status`, `replymsg`, `assign_to`, `comp_details`) VALUES
(1, 1, '1211201831@student.mmu.edu.my', 'Defective Wireless Headphones – Request for Replacement', 1, 'Dear TechGuru85,\r\n\r\nWe apologize for the defective XYZ Wireless Headphones. We will send a replacement immediately. If you prefer a refund, please let us know, and we will process it promptly. Thank you for your understanding.\r\n\r\nBest regards,\r\nWSY\r\nCustomer Support Team', '2', 'I recently purchased the XYZ Wireless Headphones, but they are defective. They fail to connect via Bluetooth and produce distorted sound. I request a replacement or a full refund. Please address this issue promptly.'),
(2, 1, '1211201831@student.mmu.edu.my', 'xxx', 1, 'xxx', '', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `uemail`, `password`) VALUES
(1, 'TechGuru85', '1211201831@student.mmu.edu.my', '$2y$10$t4bPQwIHrG.QoFDSJBA4V.DF1FzXbmeSS242USIRegICJeMiN1nD.'),
(2, '2B-G5', 'wuhoo0303@gmail.com', '$2y$10$4L9gKPGITcniH5XlT9bQF.cl2py0oYBDijs4iE0rwC/Aa40yxMLBG');

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `id` int(11) NOT NULL,
  `wid` int(11) NOT NULL,
  `worker_position` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`id`, `wid`, `worker_position`) VALUES
(9, 1, 'manager'),
(12, 2, 'Assistant'),
(13, 3, 'Supervisor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `comp`
--
ALTER TABLE `comp`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`uemail`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comp`
--
ALTER TABLE `comp`
  MODIFY `comp_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
