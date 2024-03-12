-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 03:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ad_min`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_collect`
--

CREATE TABLE `blood_collect` (
  `sno` int(11) NOT NULL,
  `blood_type` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_collect`
--

INSERT INTO `blood_collect` (`sno`, `blood_type`, `quantity`) VALUES
(1, 'O+', 500);

-- --------------------------------------------------------

--
-- Table structure for table `blood_requests`
--

CREATE TABLE `blood_requests` (
  `sno` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `blood_type` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `date_requests` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_requests`
--

INSERT INTO `blood_requests` (`sno`, `org_id`, `org_name`, `blood_type`, `quantity`, `date_requests`, `status`) VALUES
(0, 1, 'Koshi Hospital', 'B+', 120, '2024-02-28 14:04:17', 'Pending'),
(0, 2, 'Rangeli Hospital', 'A+', 120, '2024-02-28 14:05:09', 'Pending'),
(0, 3, 'EASCOLL', 'A+', 220, '2024-02-28 14:05:38', 'Pending'),
(0, 4, 'Kathmandu Cancer Care', 'AB+', 340, '2024-02-28 14:09:04', 'Pending'),
(0, 5, 'Katahari Health Care', 'O+', 330, '2024-02-28 14:09:32', 'Pending'),
(0, 6, 'Biratnagar Eye Hospital', 'O+', 44, '2024-02-28 14:09:57', 'Pending'),
(0, 7, 'Golcha Eye Hospital', 'A-', 54, '2024-02-28 14:10:22', 'Pending'),
(0, 8, 'Red cross', 'B-', 65, '2024-02-28 14:12:05', 'Pending'),
(0, 9, 'PUSET', 'O-', 99, '2024-02-28 14:13:04', 'Pending'),
(0, 10, 'Divya Jyoti Hospital', 'B-', 36, '2024-02-28 14:13:45', 'Pending'),
(0, 11, 'Google', 'O+', 333, '2024-02-28 21:13:34', 'Pending'),
(0, 55, 'Koshi Hospital', 'B+', 120, '2024-02-28 14:04:17', 'Pending'),
(0, 56, 'Rangeli Hospital', 'A+', 120, '2024-02-28 14:05:09', 'Pending'),
(0, 57, 'EASCOLL', 'A+', 220, '2024-02-28 14:05:38', 'Pending'),
(0, 58, 'Kathmandu Cancer Care', 'AB+', 340, '2024-02-28 14:09:04', 'Pending'),
(0, 59, 'Katahari Health Care', 'O+', 330, '2024-02-28 14:09:32', 'Pending'),
(0, 60, 'Biratnagar Eye Hospital', 'O+', 44, '2024-02-28 14:09:57', 'Pending'),
(0, 61, 'Golcha Eye Hospital', 'A-', 54, '2024-02-28 14:10:22', 'Pending'),
(0, 62, 'Red cross', 'B-', 65, '2024-02-28 14:12:05', 'Pending'),
(0, 63, 'PUSET', 'O-', 99, '2024-02-28 14:13:04', 'Pending'),
(0, 64, 'Divya Jyoti Hospital', 'B-', 36, '2024-02-28 14:13:45', 'Pending'),
(0, 65, 'Google', 'O+', 333, '2024-02-28 21:13:34', 'Pending'),
(0, 66, 'Rajbiraj Health Care', 'A+', 320, '2024-02-28 23:07:40', 'Pending'),
(0, 67, 'Biratnagar Hospital', 'B+', 220, '2024-02-28 23:09:34', 'Pending'),
(0, 68, 'Koshi Cancer Care', 'O+', 310, '2024-02-28 23:20:04', 'Pending'),
(0, 69, 'Rajbiraj Health Care', 'B-', 220, '2024-02-28 23:23:48', 'Pending'),
(0, 70, 'Koshi Hospital', 'B+', 120, '2024-03-08 19:56:18', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `blood_request_category`
--

CREATE TABLE `blood_request_category` (
  `sno` int(11) NOT NULL,
  `blood_type` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_request_category`
--

INSERT INTO `blood_request_category` (`sno`, `blood_type`, `quantity`) VALUES
(1, 'A+', 220),
(2, 'B+', 320),
(3, 'O+', 220);

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `sno` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`sno`, `id`, `name`, `address`, `email`, `gender`) VALUES
(0, 1, 'Rupesh Choudhary', 'Katahari', 'rupevilary1010@gmail.com', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_collect`
--
ALTER TABLE `blood_collect`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `blood_requests`
--
ALTER TABLE `blood_requests`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `blood_request_category`
--
ALTER TABLE `blood_request_category`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_collect`
--
ALTER TABLE `blood_collect`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blood_requests`
--
ALTER TABLE `blood_requests`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `blood_request_category`
--
ALTER TABLE `blood_request_category`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
