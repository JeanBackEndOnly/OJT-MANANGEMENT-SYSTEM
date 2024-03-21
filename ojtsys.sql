-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 02:00 PM
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
-- Database: `ojtsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `request_status` varchar(11) NOT NULL,
  `request_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `stu_id`, `supervisor_id`, `request_status`, `request_at`) VALUES
(19, 1, 2, 'Enrolled', '2024-03-18 22:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stu_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `ImageData` varchar(55) NOT NULL,
  `firstname` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `middlename` varchar(55) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `year_level` varchar(30) NOT NULL,
  `course` varchar(255) NOT NULL,
  `department` varchar(55) NOT NULL,
  `duty_Status` varchar(15) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stu_id`, `users_id`, `student_id`, `ImageData`, `firstname`, `lastname`, `middlename`, `email`, `contact`, `address`, `year_level`, `course`, `department`, `duty_Status`, `gender`, `updated_at`) VALUES
(1, 5, 2200496, '?PNG\Z���IHDR��.���?��F>]���sRGB�???���gAMA�', 'Marco Jean', 'Pagotaisidro', 'Fernando', 'jean123@gamil.com', '097456382345', 'DSFSDF', '2nd year', 'BSINFOTECH', 'EDUCATION', 'OnDuty', 'male', '2024-03-17 14:09:18'),
(2, 8, 2200496, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0/\0\0\0?\0\0??6A\0\0\0sRGB\0???\0\0\0gAMA\0', '1', '1', '1', '1@gamil.com', '1', '1', '1', '1', '1', 'offDuty', 'Female', '2024-03-17 15:43:21'),
(3, 12, 2200496, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0.\0\0\0?\0\0F>]\0\0\0sRGB\0???\0\0\0gAMA\0', 'Brendo', 'Dellatan Jr.', 'dellatan', 'brenda@gamil.com', '097456382345', 'ADSFdsfasdf', '2nd year', 'BSINFOTECH', 'CICS', 'OnDuty', 'Male', '2024-03-18 09:49:34'),
(4, 16, 2200480, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0\0?\0\0\0?P??\0\0\0sRGB\0???\0\0 \0IDATx', 'Kristel', 'Dagalea', 'Pagotaisidro', 'kristel@gamil.com', '097456382345', 'sanroaque', '2nd year', 'BEED', 'EDUCATION', 'offDuty', 'Female', '2024-03-21 13:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `supervisor_info_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `position` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `room` varchar(50) NOT NULL,
  `profile_pic` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`supervisor_info_id`, `users_id`, `firstname`, `lastname`, `middlename`, `email`, `position`, `department`, `room`, `profile_pic`) VALUES
(1, 7, 'Algeo', 'Fernandez', 'Fernando', 'jeyo@gamil.com', 'VL - Lecturer', 'EDUCATION', '203', ''),
(2, 9, 'Marco Jean', 'Pagotaisidro', 'Fernando', 'jean123@gamil.com', 'VL - Lecturer', 'CICS', '203', ''),
(3, 10, 'Brendo', 'Dellatan Jr.', 'Fernandez', 'brenda@gamil.com', 'VL - Lecturer', 'CICS', '203', ''),
(4, 11, 'Incent', 'Ramillano', 'dellatan', 'cent@gamil.com', 'VL - Lecturer', 'CICS', '203', '');

-- --------------------------------------------------------

--
-- Table structure for table `trainee`
--

CREATE TABLE `trainee` (
  `trainee_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `supervisor_info_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainee`
--

INSERT INTO `trainee` (`trainee_id`, `stu_id`, `supervisor_info_id`) VALUES
(22, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `user_role`, `created_at`) VALUES
(3, 'vipAdmin', '$2y$12$k2Tj7I.G.LsWNWdaew2WheW3AT/UMyPHQCkZAzI8X9gq/h9/IRpMW', 'Administrator', '2024-03-17 14:00:16'),
(5, 'marco', '$2y$12$9cgkjKZphPPsyAcpUBtQh.PKfotSc6Z5y4zhNGTvtsefQ86rnxhPC', 'Student', '2024-03-17 14:09:18'),
(7, 'jeyo', '$2y$12$hq/RyJNtCPLVkcTjjyxUdeAcQdgzp26305ABUmBAXEaKpK8M5heYK', 'Supervisor', '2024-03-17 14:21:24'),
(8, '1', '$2y$12$1boUAobnvTT/VceoAjDzve71yUcQA3oDYY8PGaWeYpImaDsijsuFq', 'Student', '2024-03-17 15:43:21'),
(9, 'marcojean', '$2y$12$YnaRPsdPU5.ldi28jc7v8OOk9rqBwPHVgBezJ/OpzBAtWDg8YygXy', 'Supervisor', '2024-03-17 20:38:05'),
(10, 'brenda', '$2y$12$3grm4oBbezqB3OWMZt/h4eG4HG10TwPgKBf3gKvWxZUmqOYDfn.L6', 'Supervisor', '2024-03-18 09:43:29'),
(11, 'cent', '$2y$12$Bo6yIx99ZfwNv4skaK3nOeyDriBRg3EPnNOof6FeVK75XfZ0HvqFm', 'Supervisor', '2024-03-18 09:46:20'),
(12, 'brenda123', '$2y$12$bLauXtVk.utDff/5oLw3ue7ET.vnVnjAPZlckcvWHvuuDcMjlofKO', 'Student', '2024-03-18 09:49:34'),
(15, '5', '$2y$12$9cG4ayIInyNBPkl3Gvmr7OSy6OSzFJiC8REwbPtC.0ir3NJhiGDB2', 'Student', '2024-03-21 12:13:50'),
(16, 'kristel', '$2y$12$Rl7r2olmZn/EdPviX/uWe.Dzvt1HB4kishZOjWNTYY0Jlecs8gZZa', 'Student', '2024-03-21 13:54:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `stu_id` (`stu_id`),
  ADD KEY `supervisor_id` (`supervisor_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stu_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`supervisor_info_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `trainee`
--
ALTER TABLE `trainee`
  ADD PRIMARY KEY (`trainee_id`),
  ADD KEY `trainee_ibfk_1` (`stu_id`),
  ADD KEY `trainee_ibfk_2` (`supervisor_info_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `supervisor_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trainee`
--
ALTER TABLE `trainee`
  MODIFY `trainee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `students` (`stu_id`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisors` (`supervisor_info_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `student_info_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD CONSTRAINT `supervisor_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `trainee`
--
ALTER TABLE `trainee`
  ADD CONSTRAINT `trainee_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `students` (`stu_id`),
  ADD CONSTRAINT `trainee_ibfk_2` FOREIGN KEY (`supervisor_info_id`) REFERENCES `supervisors` (`supervisor_info_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
