-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2024 at 12:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `id` int(11) AUTO_INCREMENT NOT NULL,
  `Roll` varchar(100) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Course` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `response` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`id`, `Roll`, `Name`, `Course`, `Email`, `Phone`, `message`, `response`) VALUES
(1, 'A21126510027', 'Karthik', ' B tech', 'a@gmail.com', '9849417359', 'ada', 0),
(2, '14', 'bobby', ' cse', 'bobby@gmail.com', '123', '', 1),
(3, '123', 'sampletest1', ' cse', 'updated@gmail.com', '1234567890', 'hello', 0);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `material_id`) VALUES
(1, 6, 17),
(2, 5, 18),
(3, 5, 16),
(4, 5, 20);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `owner` varchar(100) DEFAULT NULL,
  `avail` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `Likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `name`, `file`, `owner`, `avail`, `year`, `Likes`) VALUES
(1, 'Nithin', 'materials/Annexure.pdf', 'A21126510018', 'NO', 3, 2),
(17, 'Karthik', 'materials/Annexure.pdf', 'A21126510027', 'YES', 3, 13),
(18, 'Balu', 'materials/Annexure.pdf', 'A21126510001', 'YES', 1, 3),
(19, 'Uday', 'materials/Annexure.pdf', 'A21126510013', 'NO', 2, 1),
(20, 'Bobby', 'materials/Annexure.pdf', 'A21126510014', 'YES', 1, 5),
(21, 'A21126510014', 'materials/HOD.pdf', '123', 'NO', 4, 0),
(23, 'demo2', 'downloads/Computer Networking Notes for Tech Placements (1).pdf', 'a21126510027', 'YES', 3, 0),
(24, 'A21126510014', 'materials/HOD.pdf', '123', 'YES', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `highest_education` varchar(100) NOT NULL,
  `experience` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `phone`, `email`, `image`, `highest_education`, `experience`) VALUES
(1, 'Smrithi Mandhana', '983647623', 'bobby123@gmail.com', 'image/T1.jpg', 'MTech', '3yrs'),
(2, 'Nithin', 'werd', 'Karthik123@gmail.com', 'image/T2.jpeg', 'sadv', 'efv'),
(3, 'Karthika', '123', 'a@gmail.com', 'image/T3.jpeg', 'sadv', 'efv');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `usertype` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `phone`, `email`, `usertype`, `password`, `Year`) VALUES
(1, 'ADMIN', '9849417359', 'admin@gmail.com', 'Admin', '123', 0),
(5, 'demo', '9849417359', 'demotest@gmail.com      ', 'student', '123', 3),
(6, 'A21126510001', '12345678', 'a@gmail.com', 'student', '123', 2),
(7, 'A21126510014', '12345', 'bobby123@gmail.com ', 'student', '123', 1),
(9, 'tdemo', '123', 'updated@gmail.com ', 'teacher', '123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
