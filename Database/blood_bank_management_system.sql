-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2024 at 01:05 PM
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
(29, 'hari', 47, 'O-', 'hariprasad@gmail.com', '7845458784', 'g', '2024-03-16', 'Completed', '2024-03-14 04:19:32', '2024-03-14 05:52:34'),
(31, 'kunalss', 31, 'AB-', '31@gmail.com', '9812330710', 'brt', '2024-03-15', 'Completed', '2024-03-14 05:46:31', '2024-03-14 05:52:31'),
(34, 'kunal', 31, 'B-', 'sanjaybista86@gmail.com', '9812330710', 'brt', '2024-03-30', 'Completed', '2024-03-14 05:54:45', '2024-03-14 05:55:20'),
(35, 'fas', 44, 'AB+', '31@gmail.com', '9878998789', 'brt', '2024-03-20', 'Completed', '2024-03-15 14:27:24', '2024-04-01 01:36:33'),
(36, 'kunal', 31, 'B-', 'kunalbhattarai001@gmail.com', '9812330710', 'brt', '2024-03-19', 'Not completed', '2024-03-18 11:19:15', '2024-03-18 11:19:15'),
(37, 'ram shah', 24, 'AB+', 'sanjaybista86@gmail.com', '9842031756', 'brt', '2024-03-20', 'Not completed', '2024-03-18 15:02:35', '2024-03-18 15:02:35'),
(38, 'Menuka bhattarai', 22, 'A+', 'kunalbhattarai911@gmail.com', '9863236666', 'biratnagar', '2024-03-22', 'Not completed', '2024-03-18 15:31:23', '2024-03-18 15:31:23');

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
(7, 'A+', 5488),
(8, 'B+', 686),
(11, 'B-', 2024),
(12, 'O+', 864),
(15, 'A-', 1407),
(16, 'AB-', 264),
(17, 'AB+', 588),
(18, 'O-', 513);

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
(86, 'Hatkhola', '2024-03-15', '02:00 PM', 'CBR, Hatkhola', '9812330710', ' Hari Shrestha'),
(87, 'Devkota ', '2024-03-15', '00:00 AM', 'Devkota Chowk, BRT', '9812212010', ' Red Cross '),
(88, 'koshi', '2024-03-13', '00:00 AM', 'sfa', '9812330710', ' kunal'),
(89, 'krishma', '2024-03-12', '00:00 AM', 'sfa', '9812330710', ' gsd'),
(90, 'Hoklabari', '2024-03-20', '11:00 AM', 'Hoklabari School', '9878998789', ' VDC Hoklabari');

-- --------------------------------------------------------

--
-- Table structure for table `camp_inventory`
--

CREATE TABLE `camp_inventory` (
  `id` int(11) NOT NULL,
  `camp_id` int(11) NOT NULL,
  `camp_name` varchar(255) NOT NULL,
  `blood_type` varchar(5) NOT NULL,
  `available_units` int(11) NOT NULL,
  `attendees` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `camp_inventory`
--

INSERT INTO `camp_inventory` (`id`, `camp_id`, `camp_name`, `blood_type`, `available_units`, `attendees`, `created_at`) VALUES
(273, 88, '', 'A+', 21, 21, '2024-03-14 13:27:27'),
(274, 88, '', 'A-', 21, 21, '2024-03-14 13:27:27'),
(275, 88, '', 'B+', 12, 21, '2024-03-14 13:27:28'),
(276, 88, '', 'B-', 21, 21, '2024-03-14 13:27:28'),
(277, 88, '', 'AB+', 12, 21, '2024-03-14 13:27:28'),
(278, 88, '', 'AB-', 21, 21, '2024-03-14 13:27:28'),
(279, 88, '', 'O+', 12, 21, '2024-03-14 13:27:28'),
(280, 88, '', 'O-', 12, 21, '2024-03-14 13:27:29'),
(305, 88, '', 'A+', 21, 21, '2024-03-14 15:12:29'),
(306, 88, '', 'A-', 0, 21, '2024-03-14 15:12:29'),
(307, 88, '', 'B+', 0, 21, '2024-03-14 15:12:29'),
(308, 88, '', 'B-', 0, 21, '2024-03-14 15:12:29'),
(309, 88, '', 'AB+', 0, 21, '2024-03-14 15:12:30'),
(310, 88, '', 'AB-', 0, 21, '2024-03-14 15:12:30'),
(311, 88, '', 'O+', 0, 21, '2024-03-14 15:12:30'),
(312, 88, '', 'O-', 0, 21, '2024-03-14 15:12:30'),
(313, 88, '', 'A+', 0, 0, '2024-03-15 19:35:39'),
(314, 88, '', 'A-', 0, 0, '2024-03-15 19:35:40'),
(315, 88, '', 'B+', 0, 0, '2024-03-15 19:35:40'),
(316, 88, '', 'B-', 0, 0, '2024-03-15 19:35:40'),
(317, 88, '', 'AB+', 0, 0, '2024-03-15 19:35:40'),
(318, 88, '', 'AB-', 0, 0, '2024-03-15 19:35:41'),
(319, 88, '', 'O+', 0, 0, '2024-03-15 19:35:41'),
(320, 88, '', 'O-', 0, 0, '2024-03-15 19:35:41'),
(321, 88, '', 'A+', 0, 0, '2024-03-15 19:36:00'),
(322, 88, '', 'A-', 0, 0, '2024-03-15 19:36:00'),
(323, 88, '', 'B+', 0, 0, '2024-03-15 19:36:00'),
(324, 88, '', 'B-', 0, 0, '2024-03-15 19:36:00'),
(325, 88, '', 'AB+', 0, 0, '2024-03-15 19:36:01'),
(326, 88, '', 'AB-', 0, 0, '2024-03-15 19:36:01'),
(327, 88, '', 'O+', 0, 0, '2024-03-15 19:36:02'),
(328, 88, '', 'O-', 0, 0, '2024-03-15 19:36:02'),
(329, 88, '', 'A+', 0, 0, '2024-03-15 19:36:34'),
(330, 88, '', 'A-', 0, 0, '2024-03-15 19:36:34'),
(331, 88, '', 'B+', 0, 0, '2024-03-15 19:36:35'),
(332, 88, '', 'B-', 0, 0, '2024-03-15 19:36:35'),
(333, 88, '', 'AB+', 0, 0, '2024-03-15 19:36:35'),
(334, 88, '', 'AB-', 0, 0, '2024-03-15 19:36:36'),
(335, 88, '', 'O+', 0, 0, '2024-03-15 19:36:36'),
(336, 88, '', 'O-', 0, 0, '2024-03-15 19:36:36'),
(337, 87, '', 'A+', 12, 55, '2024-03-19 06:29:46'),
(338, 87, '', 'A-', 12, 55, '2024-03-19 06:29:46'),
(339, 87, '', 'B+', 12, 55, '2024-03-19 06:29:46'),
(340, 87, '', 'B-', 12, 55, '2024-03-19 06:29:46'),
(341, 87, '', 'AB+', 5, 55, '2024-03-19 06:29:47'),
(342, 87, '', 'AB-', 1, 55, '2024-03-19 06:29:47'),
(343, 87, '', 'O+', 1, 55, '2024-03-19 06:29:47'),
(344, 87, '', 'O-', 0, 55, '2024-03-19 06:29:47'),
(345, 86, '', 'A+', 31, 31, '2024-03-19 06:34:59'),
(346, 86, '', 'A-', 31, 31, '2024-03-19 06:34:59'),
(347, 86, '', 'B+', 0, 31, '2024-03-19 06:35:00'),
(348, 86, '', 'B-', 0, 31, '2024-03-19 06:35:00'),
(349, 86, '', 'AB+', 0, 31, '2024-03-19 06:35:00'),
(350, 86, '', 'AB-', 0, 31, '2024-03-19 06:35:00'),
(351, 86, '', 'O+', 0, 31, '2024-03-19 06:35:00'),
(352, 86, '', 'O-', 0, 31, '2024-03-19 06:35:00'),
(353, 86, '', 'A+', 31, 31, '2024-03-19 06:39:01'),
(354, 86, '', 'A-', 31, 31, '2024-03-19 06:39:01'),
(355, 86, '', 'B+', 0, 31, '2024-03-19 06:39:01'),
(356, 86, '', 'B-', 0, 31, '2024-03-19 06:39:02'),
(357, 86, '', 'AB+', 0, 31, '2024-03-19 06:39:02'),
(358, 86, '', 'AB-', 0, 31, '2024-03-19 06:39:02'),
(359, 86, '', 'O+', 0, 31, '2024-03-19 06:39:02'),
(360, 86, '', 'O-', 0, 31, '2024-03-19 06:39:02'),
(361, 86, '', 'A+', 1, 21, '2024-03-19 06:39:18'),
(362, 86, '', 'A-', 21, 21, '2024-03-19 06:39:18'),
(363, 86, '', 'B+', 0, 21, '2024-03-19 06:39:18'),
(364, 86, '', 'B-', 0, 21, '2024-03-19 06:39:19'),
(365, 86, '', 'AB+', 0, 21, '2024-03-19 06:39:19'),
(366, 86, '', 'AB-', 0, 21, '2024-03-19 06:39:19'),
(367, 86, '', 'O+', 0, 21, '2024-03-19 06:39:19'),
(368, 86, '', 'O-', 0, 21, '2024-03-19 06:39:20');

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
(99, 'kunal bhattarai', 42, 'k@gmail.com', '423', 'vq', '2024-03-05 15:41:55', 'B+', 1),
(102, 'kunal', 61, 'kunalbhattarai001@gmail.com', '424242424242', 'brt', '2024-03-12 08:37:25', 'B-', 1),
(103, 'kunal', 18, '31@gmail.com', '9812330710', 'brt', '2023-01-12 08:41:25', 'B+', 1),
(105, 'kunal bhattarai', 21, 'kunalbhattarai911@gmail.com', '9812330710', 'brt', '2024-03-13 19:12:08', 'B+', 1),
(106, 'kunal', 21, '31@gmail.com', '9812330710', 'brt', '2024-03-14 03:56:47', 'B-', 1),
(108, 'kunal', 12, 'kunalbhattarai001@gmail.com', '3535353535', 'brt', '2024-03-14 05:47:47', 'AB+', 1),
(109, 'kunal', 55, 'kumar@gmail.com', '9812330710', 'brt', '2024-03-14 05:48:29', 'B+', 1),
(110, 'kunal', 33, 'kumar@gmail.com', '3535353535', 'brt', '2024-03-14 05:48:34', 'O+', 1),
(111, 'kunalss', 31, '31@gmail.com', '9812330710', 'brt', '2024-03-14 05:52:31', 'AB-', 1),
(112, 'hari', 47, 'hariprasad@gmail.com', '7845458784', 'g', '2024-03-14 05:52:34', 'O-', 1),
(113, 'kunal', 44, 'raisha@gmail.com', '3131313131', '21', '2024-03-14 05:53:13', 'B+', 0),
(114, 'kunal', 31, 'sanjaybista86@gmail.com', '9812330710', 'brt', '2024-03-14 05:55:20', 'B-', 0),
(115, 'kunal bhattarai', 31, 'rajkumar@gmail.com', '1212121212', 'brt', '2024-03-18 17:32:26', 'AB+', 0),
(116, 'hari', 47, 'hariprasad@gmail.com', '7845458784', 'g', '2024-04-01 01:36:29', 'O-', 0),
(117, 'fas', 44, '31@gmail.com', '9878998789', 'brt', '2024-04-01 01:36:33', 'AB+', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donor_register_data`
--

CREATE TABLE `donor_register_data` (
  `Donor_id` int(11) NOT NULL,
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

INSERT INTO `donor_register_data` (`Donor_id`, `blood_type`, `first_name`, `middle_name`, `last_name`, `dob`, `gender`, `email`, `phone`, `current_address`, `permanent_address`, `username`, `password`, `registration_date`, `reset_token`) VALUES
(5, 'A+', 'Menuka', '', 'bhattarai', '2002-03-05', 'male', 'kunalbhattarai911@gmail.com', '9863236666', 'biratnagar', 'biratnagar', 'KOengine', '$2y$10$8B208cuOdkAWiA5nwGFaBu3bt/L4NGJ3JXOHtewM0/8lz9HMcY/ce', '2024-03-05 14:09:34', NULL),
(6, 'A+', 'rupesh', '', 'chaudhary', '1997-02-03', 'male', 'rupevilary1010@gmail.com', '0000000000', 'katahari', 'katahari', 'rupesh', '$2y$10$SZjNPoh7I1fdblnJTC3QYOVUmx9Y4EpjJeEhbPTZsWODpVWX7VoE.', '2024-03-06 09:38:54', NULL),
(7, 'AB+', 'ram', 'kumar', 'shah', '2000-02-05', 'male', 'sanjaybista86@gmail.com', '9842031756', 'brt', 'brt', 'ram', '$2y$10$ZAWZL7PimjSRLVOEGczllObFu515ksZNCWali9SIkvtBhaGD3XQby', '2024-03-15 05:33:10', '8f6c8a279a6ea3593ce437e3fea4ca4f'),
(8, 'B+', 'roman', '', 'chalise', '2001-02-05', 'male', 'roman@gmail.com', '9874554120', 'b', 't', 'roman', '$2y$10$T7PlerkptVd8MBb6uB6ZR.qhjYjnJx7JXYU.UVn8r3JgYubNlTnCS', '2024-03-15 19:50:23', '20374d382558f481d55bd8d80903c5db'),
(12, 'AB+', 'roman', 'kumar', 'shah', '2000-03-01', 'male', '31@gmail.com', '9842031756', 'f', 'f', 'admin', '$2y$10$49kgFuw0jvnYS5RP3VsGHe2ADAvhpdgkZlV/XzY.RJqT4MEAvdxWm', '2024-03-15 20:00:19', '3c22f38471008e706b0e5dcaa76567c8'),
(13, 'A+', 'Shashank ', '', 'Jha', '1996-03-31', 'male', 'shashankj677@gmail.com', '9807060707', 'Biratnagar', 'Biratnagar', 'shashank', '$2y$10$6tQsm8Wz1vSymRRiSMEuS.qv/neNcR66N05RqxRMGo8ue/URkgBeG', '2024-03-18 05:54:16', '94bdf30e9fdeb5ff9f8e6f2202272d18'),
(14, 'A-', 'Shashank_dai', '', 'Jha', '1996-03-30', 'male', 'shashank.jha@lbtechnology.co', '9807060707', 'Biratnagar', 'Biratnagar', 'shashank_dai', '$2y$10$.XveUgAHFHQsLtDogNK7j.fEYU5blbkkSOruuM2pI61CRWUhsD2u6', '2024-03-18 05:56:41', '2069113afd1fcecabd0a75e6e634513e'),
(15, 'A-', 'sita', '', 'mata', '1999-01-01', 'female', 'sitamata@gmail.com', '8888888888', 'aayodhya', 'janakpur', 'sitamata', '$2y$10$cka3yrJUIEOqxoi4eW3eW.xeXRN.fcn8kjsqzCvv1.eRRi.TPIyD2', '2024-03-18 11:30:34', '69374893b2d983ef53c44e295c850a51'),
(16, 'B+', 'Rupesh', '', 'Choudhary', '2000-01-24', 'male', 'rupevilary10@gmail.com', '9827305933', 'Katahari', 'Katahari', 'rupesh', '$2y$10$dNjrwFpkFE5mqCLA9v6yFejsPxf9c8rlwtbJvzNUMSegyP/8ScGNe', '2024-04-01 01:27:28', '1893b869909fcbb0254f6ba75d1f3ee0'),
(17, 'B+', 'Rupesh', '', 'Choudhary', '2000-01-24', 'male', 'rupevilary@gmail.com', '9827305920', 'Katahari', 'Katahari', 'rupesh', '$2y$10$OuarBP7p4Xuim6suNRP55.0XfRoKSJign7x3n65OcmUYdHw2qrlia', '2024-04-01 01:29:54', 'a0467b18b1c5c835fd6515d74b968ff8');

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
(5, 'kunal', 31, 'k@gmail.com', '9878984510', '21', 'A-', 4, 'Not Approved'),
(9, 'rupesh', 24, 'rupevilary1010@gmail.com', '9878984510', 'katahari', 'A-', 3, 'Approved'),
(10, 'hari', 21, 'hari@gmail.com', '9876545444', 'brt', 'AB+', 2, 'Approved'),
(13, 'a', 21, '31@gmail.com', '98', 'g', 'A+', 10, 'Approved'),
(14, 'kumar', 41, 'kumar@gmail.com', '9842031756', 'brt', 'A+', 2, 'Not Approved'),
(16, 'kunal', 21, '31@gmail.com', '9842031756', 'brt', 'AB-', 20, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `hospital` varchar(255) NOT NULL,
  `bloodType` varchar(50) NOT NULL,
  `bloodUnits` int(11) NOT NULL,
  `status` enum('Pending','Approved','Not Approved') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `hospital`, `bloodType`, `bloodUnits`, `status`) VALUES
(28, 'abc', 'A+', 100, 'Approved'),
(29, 'abc', 'A+', 100, 'Approved'),
(30, 'aarushi', 'A-', 200, 'Approved'),
(31, 'raisha', 'AB-', 200, 'Approved'),
(32, 'koshi hospital', 'AB-', 50, 'Approved'),
(34, 'abc', 'B+', 12, 'Pending'),
(35, 'gandaki hospital', 'O-', 1000, 'Approved'),
(36, 'aarushi', 'B+', 1000, 'Approved'),
(38, 'gandaki hospital', 'B+', 600, 'Pending'),
(39, 'gandaki hospital', 'B+', 600, 'Pending'),
(40, 'aarushi', 'O+', 1000, 'Pending'),
(41, 'gandaki hospital', 'A+', 21, 'Pending'),
(42, 'gandaki hospital', 'AB+', 21, 'Pending'),
(43, 'gandaki hospital', 'AB+', 12, 'Pending'),
(44, 'gandaki hospital', 'B-', 21, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
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

INSERT INTO `staff` (`staff_id`, `photo`, `position`, `first_name`, `middle_name`, `last_name`, `dob`, `gender`, `email`, `phone`, `current_address`, `permanent_address`, `username`, `password`, `registration_date`, `reset_token`, `approval_status`) VALUES
(15, '', 'doctor', 'kuldip', '', 'chalise', '2000-03-05', 'male', 'kunalbhattarai911@gmail.com', '8888888888', 'dharan', 'dharan', 'kunal', '$2y$10$XRMCz1yw1uIK2zZyhQnNiegrfJse33g1axAosed/eYV3Y3C6YnaXq', '2024-03-18 07:38:27', '212e6b95699928a6732054c3e9041e3e', 'approved'),
(16, '', 'assistant', 'bahadur', 'kumar', 'shah', '1999-01-01', 'male', 'ram@gmail.com', '8888888888', 'ithari', 'damak', 'bahadur', '$2y$10$xMVez.aKTyeZfGw1cX6KneT6CHzh1jrDu1EDhDk4PyYGu1cJ6AzCq', '2024-03-18 08:00:56', 'eb8afef43e865af7a08329fa3f78baf3', 'approved'),
(17, '', 'doctor', 'rajaram', '', 'krishna', '2000-02-11', 'male', 'rajaram@gmail.com', '9999999999', 'brt', 'brt', 'rajaram', '$2y$10$QfRBokfbpZT03m2/PbTd.ubYeXgG5JhbcOCd8CzbSiMT2qLrvcPO.', '2024-03-19 10:41:09', NULL, 'pending'),
(18, '', 'assistant', 'aarushi', '', 'budathoki', '1999-05-02', 'female', 'aarishi@gmail.com', '1212445784', 'dharan', 'dharan', 'aarushi', '$2y$10$hd57BuzGtofY5RobOEweJ.WZ4dfWC53M4JPPXmtgmPlCba1vru0A.', '2024-03-19 10:48:07', NULL, 'pending'),
(19, '', 'assistant', 'krishma', '', 'bhattarai', '2000-04-05', 'female', 'krishma@gmail.com', '0123698745', 'br', 'brt', 'krishma', '$2y$10$IMYVAxhTZnqj8BTGNdGTFObarps8VXPLmqZQO5hR.i9oTHVSjJihy', '2024-03-19 10:53:40', NULL, 'pending'),
(20, '', 'doctor', 'dil', 'bahadur', 'bhattarai', '1980-02-06', 'male', 'dilbahadur@gmail.com', '7896554132', 'hoklabari', 'hoklabari', 'dil1', '$2y$10$1e1QUWexiC0FViPx9R5vYOfJHRvfewpw4zfnSCbe8rg7E8IqZ4koK', '2024-03-19 11:04:44', NULL, 'approved'),
(21, '', 'assistant', 'anu', '', 'basnet', '1992-03-04', 'female', 'anu@gmail.com', '4444465874', 'brt', 'brt', 'anu', '$2y$10$ci/fLhMMLAUAJQ2SgY4oNeYfj83wALc4RlQpth8qCAOCIO9QrmBri', '2024-03-19 11:29:57', '8aa5b717e184589196c2f2a62399e23b', 'approved'),
(22, '', 'assistant', 'Rupesh', '', 'Choudhary', '2000-01-24', 'male', 'rupevilary1010@gmail.com', '9827305930', 'Katahari', 'Katahari', 'rupkopes', '$2y$10$vx7mfWFMbVKEzoRnWGGuq.9YuXQ11akR39dZrloSPfENha0L.DH/m', '2024-03-19 12:03:01', '28a06b15d1da9813d7d9c3c98b98980b', 'approved'),
(23, 'White_Snake.png', 'doctor', 'Rupesh', '', 'Choudhary', '2004-06-23', 'male', 'rupko10@gmail.com', '9812345678', 'Birtamod', 'Birtamod', 'rupko', '$2y$10$8PjAyCPE.J4w7C2mIPvrn.MSOTHqhbzi4uvJQltZ.bwQjHVqidoWW', '2024-03-25 16:00:40', 'e79a981d6a202c965ab699d1f42dc96b', 'approved'),
(25, 'IMG_20220917_093030.jpg', 'assistant', 'Saugat', '', 'Kunwar', '1999-06-16', 'male', 'saugat@gmail.com', '9812123434', 'Katahari', 'katahari', 'saugat', '$2y$10$ltAQzruMdaqRGoR1Qu5FL.Wshzzi7PV8KMqETrY.Weky0IKKoLQeC', '2024-03-25 16:30:01', '176b747079b4d80acce8781b15de4d59', 'approved'),
(26, 'Night Vision.png', 'doctor', 'Ram', '', 'Rai', '2002-07-18', 'male', 'ramrai10@gmail.com', '9825253636', 'Pokhara', 'Pokhara', 'ramrai', '$2y$10$fHWb6jcUpuF6ALvuvDmN..UypIultTGJ3vjktrYxAPoWMbS.P0VhG', '2024-03-30 05:01:40', '505b69bc97e29b1de717ea1b609df08e', 'approved');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `constraint_name` (`camp_id`);

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
  ADD PRIMARY KEY (`Donor_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `blood_donors`
--
ALTER TABLE `blood_donors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blood_inventory`
--
ALTER TABLE `blood_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `camps`
--
ALTER TABLE `camps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `camp_inventory`
--
ALTER TABLE `camp_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;

--
-- AUTO_INCREMENT for table `contactmessage`
--
ALTER TABLE `contactmessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `donor_register_data`
--
ALTER TABLE `donor_register_data`
  MODIFY `Donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `receiver`
--
ALTER TABLE `receiver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `staff_register_data`
--
ALTER TABLE `staff_register_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `camp_inventory`
--
ALTER TABLE `camp_inventory`
  ADD CONSTRAINT `constraint_name` FOREIGN KEY (`camp_id`) REFERENCES `camps` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
