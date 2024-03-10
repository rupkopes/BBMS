-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 06:37 PM
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
CREATE DATABASE IF NOT EXISTS `ad_min` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ad_min`;

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
--
-- Database: `blood_bank_management_system`
--
CREATE DATABASE IF NOT EXISTS `blood_bank_management_system` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `blood_bank_management_system`;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `blood_group` varchar(3) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `status` enum('Completed','Not completed') DEFAULT 'Not completed',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `age`, `blood_group`, `email`, `contact_number`, `location`, `appointment_date`, `status`, `created_at`, `updated_at`) VALUES
(3, 'rajesh', 43, 'A+', 'raju@gmail.com', '981', 'biratnagar', '2024-03-12', 'Completed', '2024-03-04 07:22:08', '2024-03-04 08:09:50'),
(5, 'hari', 43, 'AB+', 'hari@gmail.com', '9812330710', 'biratnagar', '2024-03-19', 'Completed', '2024-03-04 07:41:12', '2024-03-04 08:00:16'),
(6, 'kunal', 21, 'A+', 'kunalbhattarai911@gmail.com', '9863236666', 'biratnagar', '2024-02-27', 'Completed', '2024-03-05 14:10:39', '2024-03-05 14:29:19'),
(12, 'Rupesh', 24, 'B-', 'rupevilary1010@gmail.com', '989674', 'brt', '2024-03-07', 'Completed', '2024-03-05 15:02:23', '2024-03-05 15:21:25'),
(18, 'ruprup', 24, 'B-', 'ruprup1010@gmail.com', '9811024588', 'Rangeli', '2024-03-09', 'Completed', '2024-03-08 18:01:32', '2024-03-08 18:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `blood_donors`
--

CREATE TABLE `blood_donors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `last_donation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blood_inventory`
--

CREATE TABLE `blood_inventory` (
  `id` int(11) NOT NULL,
  `blood_type` varchar(5) NOT NULL,
  `available_units` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_inventory`
--

INSERT INTO `blood_inventory` (`id`, `blood_type`, `available_units`) VALUES
(7, 'A+', 768),
(8, 'B+', 159),
(9, 'AB-', 94),
(11, 'B-', 1160),
(12, 'O+', 677),
(13, 'AB+', 81),
(14, 'O-', 144),
(15, 'A-', 956);

-- --------------------------------------------------------

--
-- Table structure for table `camps`
--

CREATE TABLE `camps` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL,
  `location` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `campConductedBy` varchar(255) NOT NULL,
  `flag` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `camps`
--

INSERT INTO `camps` (`id`, `name`, `date`, `time`, `location`, `contact`, `campConductedBy`, `flag`) VALUES
(69, 'koshi', '2024-03-01', '00:00 AM', 'biratnagar', '9812330710', ' kunal', 0),
(72, 'Jeevan', '2024-03-30', '10:00 AM', 'Biratnagar', '9862885899', ' Hari Ghimire', 0);

-- --------------------------------------------------------

--
-- Table structure for table `camp_inventory`
--

CREATE TABLE `camp_inventory` (
  `id` int(11) NOT NULL,
  `blood_type` varchar(5) DEFAULT NULL,
  `available_units` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `camp_inventory`
--

INSERT INTO `camp_inventory` (`id`, `blood_type`, `available_units`, `created_at`) VALUES
(1, 'A+', 50, '2024-03-02 14:27:49'),
(2, 'A-', 0, '2024-03-02 14:27:49'),
(3, 'B+', 0, '2024-03-02 14:27:50'),
(4, 'B-', 0, '2024-03-02 14:27:50'),
(5, 'AB+', 0, '2024-03-02 14:27:50'),
(6, 'AB-', 0, '2024-03-02 14:27:51'),
(7, 'O+', 0, '2024-03-02 14:27:51'),
(8, 'O-', 0, '2024-03-02 14:27:51'),
(9, 'A+', 20, '2024-03-06 09:19:48'),
(10, 'A-', 0, '2024-03-06 09:19:48'),
(11, 'B+', 0, '2024-03-06 09:19:48'),
(12, 'B-', 0, '2024-03-06 09:19:48'),
(13, 'AB+', 0, '2024-03-06 09:19:49'),
(14, 'AB-', 0, '2024-03-06 09:19:49'),
(15, 'O+', 0, '2024-03-06 09:19:49'),
(16, 'O-', 0, '2024-03-06 09:19:49'),
(17, 'A+', 0, '2024-03-08 05:29:00'),
(18, 'A-', 100, '2024-03-08 05:29:00'),
(19, 'B+', 0, '2024-03-08 05:29:00'),
(20, 'B-', 0, '2024-03-08 05:29:00'),
(21, 'AB+', 0, '2024-03-08 05:29:00'),
(22, 'AB-', 0, '2024-03-08 05:29:00'),
(23, 'O+', 0, '2024-03-08 05:29:00'),
(24, 'O-', 0, '2024-03-08 05:29:00'),
(25, 'A+', 0, '2024-03-08 05:29:22'),
(26, 'A-', 100, '2024-03-08 05:29:22'),
(27, 'B+', 0, '2024-03-08 05:29:22'),
(28, 'B-', 0, '2024-03-08 05:29:22'),
(29, 'AB+', 0, '2024-03-08 05:29:22'),
(30, 'AB-', 0, '2024-03-08 05:29:22'),
(31, 'O+', 0, '2024-03-08 05:29:22'),
(32, 'O-', 0, '2024-03-08 05:29:22'),
(33, 'A+', 0, '2024-03-08 05:29:37'),
(34, 'A-', 0, '2024-03-08 05:29:37'),
(35, 'B+', 20, '2024-03-08 05:29:37'),
(36, 'B-', 0, '2024-03-08 05:29:37'),
(37, 'AB+', 0, '2024-03-08 05:29:37'),
(38, 'AB-', 0, '2024-03-08 05:29:37'),
(39, 'O+', 0, '2024-03-08 05:29:37'),
(40, 'O-', 0, '2024-03-08 05:29:37'),
(41, 'A+', 0, '2024-03-08 05:29:48'),
(42, 'A-', 0, '2024-03-08 05:29:48'),
(43, 'B+', 20, '2024-03-08 05:29:48'),
(44, 'B-', 0, '2024-03-08 05:29:48'),
(45, 'AB+', 0, '2024-03-08 05:29:48'),
(46, 'AB-', 0, '2024-03-08 05:29:48'),
(47, 'O+', 0, '2024-03-08 05:29:48'),
(48, 'O-', 0, '2024-03-08 05:29:48'),
(49, 'A+', 0, '2024-03-08 05:31:11'),
(50, 'A-', 100, '2024-03-08 05:31:11'),
(51, 'B+', 0, '2024-03-08 05:31:11'),
(52, 'B-', 0, '2024-03-08 05:31:11'),
(53, 'AB+', 0, '2024-03-08 05:31:11'),
(54, 'AB-', 0, '2024-03-08 05:31:11'),
(55, 'O+', 0, '2024-03-08 05:31:11'),
(56, 'O-', 0, '2024-03-08 05:31:11'),
(57, 'A+', 0, '2024-03-08 17:46:15'),
(58, 'A-', 0, '2024-03-08 17:46:15'),
(59, 'B+', 122, '2024-03-08 17:46:15'),
(60, 'B-', 0, '2024-03-08 17:46:15'),
(61, 'AB+', 0, '2024-03-08 17:46:15'),
(62, 'AB-', 0, '2024-03-08 17:46:15'),
(63, 'O+', 0, '2024-03-08 17:46:15'),
(64, 'O-', 0, '2024-03-08 17:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `contactmessage`
--

CREATE TABLE `contactmessage` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactmessage`
--

INSERT INTO `contactmessage` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'kunal bhattarai', 'kunalbhattarai001@gmail.com', 'hello', '2023-12-13 07:12:41'),
(2, 'kunal bhattarai', 'kunalbhattarai001@gmail.com', 'hello', '2023-12-13 07:13:54'),
(3, 'kunal bhattarai', 'kunalbhattarai001@gmail.com', 'hello', '2023-12-13 07:16:12'),
(4, 'kunal bhattarai', 'your_email', 'hello', '2023-12-13 07:17:29'),
(5, 'kunal bhattarai', 'your_email', 'hello', '2023-12-13 07:17:39'),
(6, 'kunal bhattarai', 'kunalbhattarai911@gmail.com', 'hello', '2023-12-13 07:19:12'),
(7, 'kunal bhattarai', 'kunalbhattarai911@gmail.com', 'hello', '2023-12-13 07:22:39'),
(8, 'kunal bhattarai', 'kunalbhattarai911@gmail.com', 'hello', '2023-12-13 09:50:41'),
(9, 'kunal bhattarai', 'kunalbhattarai911@gmail.com', 'hello', '2023-12-13 10:17:41'),
(10, 'kunal bhattarai', 'kunalbhattarai911@gmail.com', 'hello', '2023-12-13 10:36:49'),
(11, 'kunal bhattarai', 'kunalbhattarai911@gmail.com', 'namaste', '2023-12-13 11:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `location` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `blood_group` varchar(10) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `name`, `age`, `email`, `contact`, `location`, `created_at`, `blood_group`, `status`) VALUES
(74, 'Kunal Bhattarai', 21, 'kunalbhattarai911@gmail.com', '9863236666', 'biratnagar', '2024-03-05 14:13:34', 'A+', 0),
(94, 'Saugat Kunwar', 42, 'asfrqwfasfasfasf@gmail.com', 'fas42', 'fas', '2024-03-05 15:35:56', 'B+', 0),
(95, 'Sweaksha Jha', 42, 'asfrqwfasfasfasf@gmail.com', 'fas42', 'fas', '2024-03-05 15:37:01', 'B+', 0),
(96, 'Rahila Eram', 42, 'asfrqwfasfasfasf@gmail.com', 'fas42', 'fas', '2024-03-05 15:37:16', 'B+', 0),
(99, 'Jagmohan Majhi', 42, 'k@gmail.com', '423', 'vq', '2024-03-05 15:41:55', 'B+', 0),
(102, 'Rupesh Choudhary', 24, 'rupevilary1010@gmail.com', '9827305930', 'Katahari', '2024-03-08 13:19:29', 'B+', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donor_register_data`
--

CREATE TABLE `donor_register_data` (
  `id` int(11) NOT NULL,
  `blood_type` varchar(5) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `current_address` text NOT NULL,
  `permanent_address` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor_register_data`
--

INSERT INTO `donor_register_data` (`id`, `blood_type`, `first_name`, `middle_name`, `last_name`, `dob`, `gender`, `email`, `phone`, `current_address`, `permanent_address`, `username`, `password`, `registration_date`) VALUES
(5, 'A+', 'kunal ', '', 'bhattarai', '2024-02-25', 'male', 'kunalbhattarai911@gmail.com', '9863236666', 'biratnagar', 'biratnagar', 'kunal', '$2y$10$/ZMcRk/CDXrPJeFA4ZCHtO.rgXCM7lcPWIhpJm8KdixxNlVSI.ysK', '2024-03-05 14:09:34'),
(6, 'A+', 'rupesh', '', 'chaudhary', '1997-02-03', 'male', 'rupevilary1010@gmail.com', '0000000000', 'katahari', 'katahari', 'rupesh', '$2y$10$SZjNPoh7I1fdblnJTC3QYOVUmx9Y4EpjJeEhbPTZsWODpVWX7VoE.', '2024-03-06 09:38:54'),
(7, 'B+', 'Rupesh', '', 'Choudhary', '2000-01-24', 'male', 'rupevilary1010@gmail.com', '9827305930', 'Katahari', 'Katahari', 'rupkopes', '$2y$10$cmVjreylC1xiwmgM9wWVA.T72H9BpNEARL47jCuzltqV0ZrqUcf36', '2024-03-08 13:17:26'),
(8, 'B-', 'Ram', '', 'Rai', '2008-06-24', 'male', 'ruprup1010@gmail.com', '98110784191', 'Rangeli', 'Rangeli', 'ruprup', '$2y$10$2Q/O.af0PjEHxIPeJlgD3OlC4R/XVsrORnrPUhehCOw03d.17QDym', '2024-03-08 17:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `receiver`
--

CREATE TABLE `receiver` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `location` varchar(255) NOT NULL,
  `bloodType` varchar(5) NOT NULL,
  `bloodUnits` int(11) NOT NULL,
  `status` enum('Pending','Approved','Not Approved') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receiver`
--

INSERT INTO `receiver` (`id`, `name`, `age`, `email`, `phone`, `location`, `bloodType`, `bloodUnits`, `status`) VALUES
(2, 'kunal bhattarai', 21, 'kunalbhattarai001@gmail.com', '9878984510', 'biratnagar', 'A+', 2, 'Approved'),
(3, 'hari', 33, 'hari@gmail.com', '9878984510', 'biratnagar', 'B+', 5, 'Approved'),
(5, 'kunal', 31, 'k@gmail.com', '9878984510', '21', 'A-', 4, 'Not Approved'),
(9, 'rupesh', 24, 'rupevilary1010@gmail.com', '9878984510', 'katahari', 'A-', 3, 'Approved'),
(10, 'hari', 21, 'hari@gmail.com', '9876545444', 'brt', 'AB+', 2, 'Approved'),
(12, 'Rupesh Choudhary', 24, 'rupevilary1010@gmail.com', '9827305930', 'Katahari', 'A+', 120, 'Pending'),
(13, 'Rupesh Choudhary', 24, 'rupevilary1010@gmail.com', '9827305930', 'Katahari', 'A+', 120, 'Pending'),
(14, 'Rupesh Choudhary', 24, 'rupevilary1010@gmail.com', '9827305930', 'Katahari', 'A+', 120, 'Pending'),
(15, 'Rupesh Choudhary', 24, 'rupevilary1010@gmail.com', '9827305930', 'Katahari', 'A+', 120, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `hospital` varchar(255) NOT NULL,
  `bloodType` varchar(50) NOT NULL,
  `bloodUnits` int(11) NOT NULL,
  `date_requests` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Approved','Not Approved') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `hospital`, `bloodType`, `bloodUnits`, `date_requests`, `status`) VALUES
(28, 'Koshi Hospital', 'B+', 120, '2024-03-08 20:03:48', 'Approved'),
(29, 'Rangeli Hospital', 'A+', 120, '2024-03-08 20:08:26', 'Pending'),
(30, 'Koshi Hospital', 'A+', 4000, '2024-03-08 23:06:50', 'Approved'),
(31, 'Koshi Cancer Care', 'O+', 220, '2024-03-10 00:06:36', 'Pending'),
(32, 'Hetauda Clinic', 'A-', 230, '2024-03-10 00:07:15', 'Pending'),
(33, 'Red Cross', 'AB-', 223, '2024-03-10 23:17:17', 'Pending'),
(34, 'Green Cross', 'AB-', 155, '2024-03-10 23:18:18', 'Pending'),
(35, 'Green Cross', 'O-', 155, '2024-03-10 23:18:50', 'Pending'),
(36, 'Katahari Healthpost', 'B-', 220, '2024-03-10 23:20:00', 'Pending'),
(37, 'Rajbiraj Clinic', 'AB+', 332, '2024-03-10 23:20:39', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `current_address` text NOT NULL,
  `permanent_address` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `reset_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `position`, `first_name`, `middle_name`, `last_name`, `dob`, `gender`, `email`, `phone`, `current_address`, `permanent_address`, `username`, `password`, `registration_date`, `reset_token`) VALUES
(1, 'doctor', 'kunal', 'b', 'bhattarai', '2002-03-05', 'male', 'kunalbhattarai911@gmail.com', '9812330710', 'biratnagar', 'dharan', 'kunal', '$2y$10$IWAupynQTJPiMkUMY9R/4OplfJxFwC5u3H918u.mE6rMtDgve7oxa', '2024-03-05 04:25:12', NULL),
(2, 'assistant', 'Rupesh', '', 'Choudhary', '2000-01-24', 'male', 'rupevilary1010@gmail.com', '9827305930', 'Katahari', 'Katahari', 'rupkopes', '$2y$10$hZjPDB9luCDw1j2X6e9SS.FUPXXqtO47YLHZFmAh71pAb.aE9SYcO', '2024-03-08 11:17:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_register_data`
--

CREATE TABLE `staff_register_data` (
  `id` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `current_address` text NOT NULL,
  `permanent_address` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `work_experience` text NOT NULL,
  `medical_certificate` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_register_data`
--

INSERT INTO `staff_register_data` (`id`, `position`, `first_name`, `middle_name`, `last_name`, `dob`, `gender`, `email`, `phone`, `current_address`, `permanent_address`, `username`, `password`, `work_experience`, `medical_certificate`, `cv`, `created_at`) VALUES
(1, 'doctor', 'kunal', 'bahadur', 'bhattarai', '2002-03-05', 'male', 'kunalbhattarai001@gmail.com', '9812330710', 'brt', 'brt', 'kunal', '$2y$10$hCmHO4BkW0MFRSjHP/DNuOuXK7Mqzj9JAtm4alhw8EcoasINLmyje', 'hello', 'uploads/CamScanner-11-23-2023-20.38.pdf', 'uploads/CamScanner-11-23-2023-20.38.pdf', '2024-02-24 14:43:44'),
(2, 'doctor', 'kunal', 'bahadur', 'bhattarai', '2002-03-05', 'male', 'kunalbhattarai001@gmail.com', '9812330710', 'brt', 'brt', 'kunal', '$2y$10$22ZwUYl5UwK5z0OE4SaYdOy0bCSiiDapu8lVFZbFbcMdjFlTLU2DK', 'hello', 'uploads/CamScanner-11-23-2023-20.38.pdf', 'uploads/CamScanner-11-23-2023-20.38.pdf', '2024-02-24 14:44:36'),
(3, 'doctor', 'kunal', 'bahadur', 'bhattarai', '2110-03-01', 'male', 'kunalbhattarai001@gmail.com', '9812330710', 'brt', 'brt', 'kunal', '$2y$10$RcHn1/WxHdAQPhnQi/PfourC7f9SyczyEyaz4peQK5nKQRZsCyAUC', 'gfsd', 'uploads/CamScanner-11-23-2023-20.38.pdf', 'uploads/CamScanner-11-23-2023-20.38.pdf', '2024-02-24 14:45:56'),
(4, 'doctor', 'kunal', 'bahadur', 'bhattarai', '2002-05-03', 'male', 'kunalbhattarai001@gmail.com', '9812330710', 'brt', 'brt', 'root', '', '1', 'CamScanner-11-23-2023-20.38.pdf', 'CamScanner-11-23-2023-20.38.pdf', '2024-02-25 05:29:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_donors`
--
ALTER TABLE `blood_donors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_inventory`
--
ALTER TABLE `blood_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camps`
--
ALTER TABLE `camps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camp_inventory`
--
ALTER TABLE `camp_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactmessage`
--
ALTER TABLE `contactmessage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor_register_data`
--
ALTER TABLE `donor_register_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receiver`
--
ALTER TABLE `receiver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `staff_register_data`
--
ALTER TABLE `staff_register_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `blood_donors`
--
ALTER TABLE `blood_donors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blood_inventory`
--
ALTER TABLE `blood_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `camps`
--
ALTER TABLE `camps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `camp_inventory`
--
ALTER TABLE `camp_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `contactmessage`
--
ALTER TABLE `contactmessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `donor_register_data`
--
ALTER TABLE `donor_register_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `receiver`
--
ALTER TABLE `receiver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff_register_data`
--
ALTER TABLE `staff_register_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Database: `comments`
--
CREATE DATABASE IF NOT EXISTS `comments` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `comments`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `message` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `photo`, `name`, `message`, `timestamp`) VALUES
(54, 'mrunal.jpg', 'Sweaksha Jha', 'never been happier like this before.', '2024-03-07 09:11:28'),
(55, 'jassita.jpg', 'Rahila Eram', 'liked the hard work of BBMS creators.', '2024-03-07 10:17:31'),
(60, 'rupkopes.jpg', 'Rupesh Choudhary', 'saved by BBMS, accident held on Biratnagar.', '2024-03-07 13:55:08'),
(61, 'srk.jpg', 'Kunal Bhattarai', 'keep on doing hard work guys and never give up.', '2024-03-07 13:56:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- Database: `d_reg_db`
--
CREATE DATABASE IF NOT EXISTS `d_reg_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `d_reg_db`;

-- --------------------------------------------------------

--
-- Table structure for table `d_user`
--

CREATE TABLE `d_user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone1` varchar(20) NOT NULL,
  `phone2` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `occup` varchar(100) NOT NULL,
  `blood_type` varchar(50) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `p_address` varchar(50) NOT NULL,
  `p_district` varchar(50) NOT NULL,
  `p_province` varchar(50) NOT NULL,
  `c_address` varchar(50) NOT NULL,
  `c_district` varchar(50) NOT NULL,
  `c_province` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `c_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `d_user`
--
ALTER TABLE `d_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `d_user`
--
ALTER TABLE `d_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"blood_bank_management_system\",\"table\":\"donors\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2024-03-10 12:24:09', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
