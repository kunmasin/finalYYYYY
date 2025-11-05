-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2025 at 04:33 PM
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
-- Database: `student_discipline`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `sN` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `usernames` varchar(60) DEFAULT NULL,
  `passwords` varchar(15) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `phone_number` varchar(12) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `position` varchar(60) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_joined` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`sN`, `fullname`, `usernames`, `passwords`, `email`, `phone_number`, `gender`, `position`, `address`, `image`, `date_joined`) VALUES
(1, '', '', '', '', '', '', '', '', '', '2025-11-05 13:01:35'),
(2, 'Eng Zhiri Kolo Samuel', 'Baba Ewe', 'zhiri', 'zhirikolosamuel@gmail.com', '08022349850', 'Male', 'Dean of Students Affairs', 'Patigi, Kwara State, Nigeria', 'uploaded_images/1762347773_slazzer-preview-ze5cq.png', '2025-11-05 13:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaint_id` int(11) NOT NULL,
  `lecturer_name` varchar(100) DEFAULT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `student_offence` varchar(255) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL,
  `complaint_details` varchar(255) DEFAULT NULL,
  `complaint_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `judgements`
--

CREATE TABLE `judgements` (
  `id` int(11) NOT NULL,
  `case_name` varchar(40) DEFAULT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `judgement_passed` text DEFAULT NULL,
  `notice_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lecturer_users`
--

CREATE TABLE `lecturer_users` (
  `id` int(11) NOT NULL,
  `lecturer_name` varchar(100) DEFAULT NULL,
  `passwords` varchar(15) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `phone_number` varchar(12) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `office` varchar(40) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL,
  `date_joined` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturer_users`
--

INSERT INTO `lecturer_users` (`id`, `lecturer_name`, `passwords`, `email`, `phone_number`, `gender`, `office`, `address`, `image`, `status`, `date_joined`) VALUES
(1, 'Mr. Mudashiru Ndako', 'ndako', 'ndakorasheed@gmail.com', '09015621519', 'Male', 'Head of Final Year Project', 'Ndako Villa, Eruda, Ilorin, Kwara State.', 'uploaded_images/1762347380_download (9).jpeg', NULL, '2025-11-05 12:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `notice_id` int(11) NOT NULL,
  `complaint_id` int(11) DEFAULT NULL,
  `notice_text` text DEFAULT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `notice_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_users`
--

CREATE TABLE `student_users` (
  `id` int(11) NOT NULL,
  `names` varchar(100) DEFAULT NULL,
  `lvl_admitted` varchar(60) DEFAULT NULL,
  `passwords` varchar(15) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `phoneNumber` varchar(12) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` varchar(15) DEFAULT NULL,
  `matric_no` varchar(15) DEFAULT NULL,
  `course` varchar(30) DEFAULT NULL,
  `faculty` varchar(40) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_joined` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_users`
--

INSERT INTO `student_users` (`id`, `names`, `lvl_admitted`, `passwords`, `email`, `phoneNumber`, `gender`, `dob`, `matric_no`, `course`, `faculty`, `address`, `image`, `date_joined`) VALUES
(1, 'Oniye Abdullahi Masud', '100 Level', 'kunmasin', 'oniyeabdullahi00@gmail.com', '09015634519', 'Male', '1998-06-10', '21/02/SE/2/001', 'Software Engineering', 'Science and Computing', NULL, 'uploaded_images/1762346774_undefined.jpeg', '2025-11-05 12:46:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`sN`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `judgements`
--
ALTER TABLE `judgements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturer_users`
--
ALTER TABLE `lecturer_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `student_users`
--
ALTER TABLE `student_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `sN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judgements`
--
ALTER TABLE `judgements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lecturer_users`
--
ALTER TABLE `lecturer_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_users`
--
ALTER TABLE `student_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
