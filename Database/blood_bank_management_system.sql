-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 03:46 PM
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
-- Database: `blood_bank_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

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
(6, 'kunal', 21, 'A+', 'kunalbhattarai911@gmail.com', '9863236666', 'biratnagar', '2024-02-27', 'Completed', '2024-03-05 14:10:39', '2024-03-05 14:29:19');

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
(7, 'A+', 4640),
(8, 'B+', 304),
(11, 'B-', 1276),
(12, 'O+', 775),
(14, 'O-', 329),
(15, 'A-', 626),
(16, 'AB-', 201),
(17, 'AB+', 27);

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
  `campConductedBy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `camps`
--

INSERT INTO `camps` (`id`, `name`, `date`, `time`, `location`, `contact`, `campConductedBy`) VALUES
(69, 'koshi', '2024-03-01', '00:00 AM', 'biratnagar', '9812330710', ' kunal'),
(71, 'neuro', '2024-03-11', '00:00 AM', 'brt', '90', ' neuro'),
(72, 'brt', '2024-03-08', '00:00 AM', 'brt', '31', ' brt');

-- --------------------------------------------------------

--
-- Table structure for table `camp_inventory`
--

CREATE TABLE `camp_inventory` (
  `id` int(11) NOT NULL,
  `blood_type` varchar(5) DEFAULT NULL,
  `available_units` int(11) DEFAULT NULL,
  `attendees` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `camp_inventory`
--

INSERT INTO `camp_inventory` (`id`, `blood_type`, `available_units`, `attendees`) VALUES
(1, 'A+', 21, 12),
(2, 'A-', 0, 12),
(3, 'B+', 0, 12),
(4, 'B-', 0, 12),
(5, 'AB+', 0, 12),
(6, 'AB-', 0, 12),
(7, 'O+', 0, 12),
(8, 'O-', 0, 12),
(9, 'A+', 30, 0),
(10, 'A-', 0, 0),
(11, 'B+', 0, 0),
(12, 'B-', 0, 0),
(13, 'AB+', 0, 0),
(14, 'AB-', 0, 0),
(15, 'O+', 0, 0),
(16, 'O-', 0, 0),
(17, 'A+', 20, 0),
(18, 'A-', 10, 0),
(19, 'B+', 10, 0),
(20, 'B-', 0, 0),
(21, 'AB+', 0, 0),
(22, 'AB-', 0, 0),
(23, 'O+', 0, 0),
(24, 'O-', 0, 0),
(25, 'A+', 20, 0),
(26, 'A-', 10, 0),
(27, 'B+', 10, 0),
(28, 'B-', 0, 0),
(29, 'AB+', 0, 0),
(30, 'AB-', 0, 0),
(31, 'O+', 0, 0),
(32, 'O-', 0, 0),
(33, 'A+', 20, 0),
(34, 'A-', 10, 0),
(35, 'B+', 10, 0),
(36, 'B-', 0, 0),
(37, 'AB+', 0, 0),
(38, 'AB-', 0, 0),
(39, 'O+', 0, 0),
(40, 'O-', 0, 0),
(41, 'A+', 20, 0),
(42, 'A-', 10, 0),
(43, 'B+', 10, 0),
(44, 'B-', 0, 0),
(45, 'AB+', 0, 0),
(46, 'AB-', 0, 0),
(47, 'O+', 0, 0),
(48, 'O-', 0, 0);

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
(74, 'Kunal Bhattarai', 21, 'kunalbhattarai911@gmail.com', '9863236666', 'biratnagar', '2024-03-05 08:28:34', 'A+', 0),
(94, 'Saugat Kunwar', 42, 'asfrqwfasfasfasf@gmail.com', 'fas42', 'fas', '2024-03-05 09:50:56', 'B+', 0),
(95, 'Sweaksha Jha', 42, 'asfrqwfasfasfasf@gmail.com', 'fas42', 'fas', '2024-03-05 09:52:01', 'B+', 0),
(96, 'Rahila Eram', 42, 'asfrqwfasfasfasf@gmail.com', 'fas42', 'fas', '2024-03-05 09:52:16', 'B+', 0),
(99, 'Jagmohan Majhi', 42, 'k@gmail.com', '423', 'vq', '2024-03-05 09:56:55', 'B+', 0),
(102, 'Rupesh Choudhary', 24, 'rupevilary1010@gmail.com', '9827305930', 'Katahari', '2024-03-08 07:34:29', 'B+', 0);

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
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `reset_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor_register_data`
--

INSERT INTO `donor_register_data` (`id`, `blood_type`, `first_name`, `middle_name`, `last_name`, `dob`, `gender`, `email`, `phone`, `current_address`, `permanent_address`, `username`, `password`, `registration_date`, `reset_token`) VALUES
(5, 'A+', 'kunal ', '', 'bhattarai', '2024-02-25', 'male', 'kunalbhattarai911@gmail.com', '9863236666', 'biratnagar', 'biratnagar', 'kunal', '$2y$10$0eHVr9MaaJkQkxWb2MOuGu07e4x6ug2CThgUFuTojl/8y1buifHyC', '2024-03-05 14:09:34', NULL),
(6, 'A+', 'rupesh', '', 'chaudhary', '1997-02-03', 'male', 'rupevilary1010@gmail.com', '0000000000', 'katahari', 'katahari', 'rupesh', '$2y$10$SZjNPoh7I1fdblnJTC3QYOVUmx9Y4EpjJeEhbPTZsWODpVWX7VoE.', '2024-03-06 09:38:54', NULL);

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
(13, 'a', 21, '31@gmail.com', '98', 'g', 'A+', 10, 'Approved'),
(14, 'kumar', 41, 'kumar@gmail.com', '9842031756', 'brt', 'A+', 2, 'Pending'),
(16, 'kunal', 21, '31@gmail.com', '9842031756', 'brt', 'AB-', 20, 'Pending');

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
(22, 'fghjk', 'A+', 79, '2024-03-12 16:20:38', 'Approved'),
(27, 'bmc', 'AB+', 100, '2024-03-12 16:20:38', 'Not Approved'),
(28, 'abc', 'A+', 100, '2024-03-12 16:20:38', 'Approved'),
(29, 'abc', 'A+', 100, '2024-03-12 16:20:38', 'Approved'),
(30, 'aarushi', 'A-', 200, '2024-03-12 16:20:38', 'Approved'),
(31, 'raisha', 'AB-', 200, '2024-03-12 16:20:38', 'Not Approved');

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
  `reset_token` varchar(100) DEFAULT NULL,
  `approval_status` enum('pending','approved','not_approved') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `position`, `first_name`, `middle_name`, `last_name`, `dob`, `gender`, `email`, `phone`, `current_address`, `permanent_address`, `username`, `password`, `registration_date`, `reset_token`, `approval_status`) VALUES
(1, 'doctor', 'kunal', 'b', 'bhattarai', '2002-03-05', 'male', 'kunalbhattarai911@gmail.com', '9812330710', 'biratnagar', 'dharan', 'kunal', '$2y$10$4GlKfP1JTdxCK9sWBB9juezXp.rAPaXhl9Cs6z5p4d2Ig0GA8v1tK', '2024-03-05 04:25:12', NULL, 'approved'),
(3, 'other', 'ram', 'kumar', 'shah', '2000-03-05', 'male', 'ram@gmail.com', '9876543456', 'brt', 'brt', 'ram', '$2y$10$kNlSg.Yn3PjzamwZfYpawelGXHPEbaaRlK9cx9ZTHeZS7f37NWhHW', '2024-03-09 19:29:33', NULL, 'approved'),
(4, 'assistant', 'kuldip', '', 'yadav', '2001-01-03', 'male', 'kuldip@gmail.com', '9', 'brt', 'brt', 'kuldip', '$2y$10$/o.VBA.tbKNnee6OBKyKvePSReUV9RiRqWAuPxm8mpuuHpQP04l6i', '2024-03-09 19:40:13', NULL, 'not_approved'),
(5, 'assistant', 'Rupesh', '', 'Choudhary', '2000-01-24', 'male', 'privacyme@gmail.com', '9862885899', 'katahari', 'katahari', 'hello', '$2y$10$7sMkL6wSYZGcXRySSidKJuS1E79SyyULqwHQRnjOoiQmR2MoWpMrK', '2024-03-12 10:54:21', '20da7e96a05e08a81c065bea85b2b7d0', 'approved');

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
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `blood_donors`
--
ALTER TABLE `blood_donors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blood_inventory`
--
ALTER TABLE `blood_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `camps`
--
ALTER TABLE `camps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `camp_inventory`
--
ALTER TABLE `camp_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `contactmessage`
--
ALTER TABLE `contactmessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `donor_register_data`
--
ALTER TABLE `donor_register_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `receiver`
--
ALTER TABLE `receiver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff_register_data`
--
ALTER TABLE `staff_register_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
