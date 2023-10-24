-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 03:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wvrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123'),
(2, 'Penina', '123');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `code` varchar(100) NOT NULL,
  `type` varchar(500) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `adatetime` varchar(100) NOT NULL,
  `patient` varchar(100) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`code`, `type`, `status`, `adatetime`, `patient`, `deleted`) VALUES
('1685474237', 'Domestic Violence', 1, '30/05/2023 21:17', '8', 0),
('1685474397', 'Gender Based Violence', 1, '30/05/2023 21:19', '9', 0),
('1685479751', 'Domestic Violence', 1, '30/05/2023 22:49', '10', 0),
('1685480243', 'Gender Based Violence', 1, '30/05/2023 22:57', '10', 0),
('1685480503', 'Domestic Violence', 1, '30/05/2023 23:01', '11', 0),
('1685480641', 'Gender Based Violence', 2, '30/05/2023 23:04', '11', 0),
('1685481566', 'Gender Based Violence', 1, '30/05/2023 23:19', '11', 0),
('1685481689', 'Domestic Violence', 1, '30/05/2023 23:21', '11', 0),
('1685483479', 'Psychological Violence', 2, '30/05/2023 23:51', '12', 0),
('1685483486', 'Other', 1, '30/05/2023 23:51', '12', 0),
('1685485047', 'Physical Violence', 1, '31/05/2023 00:17', '12', 0),
('1685485057', 'Emotional Violence', 1, '31/05/2023 00:17', '12', 0),
('1685489262', 'Psychological Violence', 1, '31/05/2023 01:27', '12', 0),
('1685493997', 'Verbal Abuse', 1, '31/05/2023 02:46', '11', 0),
('1685494898', 'Other', 1, '31/05/2023 03:01', '12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `receiver` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `mdt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender`, `receiver`, `message`, `mdt`) VALUES
(16, '1685474054', '8', 'Hello', '1685474267');

-- --------------------------------------------------------

--
-- Table structure for table `citizens`
--

CREATE TABLE `citizens` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `citizens`
--

INSERT INTO `citizens` (`id`, `fullname`, `phone`, `email`, `password`, `deleted`) VALUES
(8, 'Melchi Roger', '0788838828', 'm@gmail.com', '123', 0),
(9, 'Nelly', '0788838828', 'n@gmail.com', '123', 0),
(10, 'Christos nolan', '0788599306', 'christos@gmail.com', '123', 0),
(11, 'lucie gaelle', '0728097824', 'lucie@gmail.com', '123', 0),
(12, 'Miguel impano', '0785442069', 'migi@gmail.com', '123', 0),
(13, 'niyikiza', '0782145311', 'n@g', '123456', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `mdatetime` varchar(100) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `mdatetime`, `deleted`) VALUES
(6, 'lili', 'lucie@gmail.com', '0788888888', 'hello', '30/05/2023 23:43', 1),
(7, 'Ngabonziza patrick', 'patrick1@gmail.com', '0785434567', 'gffjhk,bmnv ', '31/05/2023 03:34', 1),
(8, 'Nkuriza stephanie', 'nkustephanie@gmail.com', '0786509454', 'tdgvhj', '31/05/2023 03:35', 1),
(9, 'gh', 'nono@gmail.com', '0788888888', 'ghtrefscvnm', '31/05/2023 03:35', 1),
(10, 'nnnnn', 'rogerirakoze@yahoo.com', '0787736688', 'thank you !', '31/05/2023 04:02', 1),
(11, 'zera', 'zera@yahoo.com', '0798356463', 'i\'m greatfull', '31/05/2023 04:06', 1),
(12, 'beni', 'beni@gmail.com', '0788865439', 'i have a problem', '31/05/2023 04:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `phone`, `email`, `password`, `deleted`) VALUES
('1685479590', 'Nkuriza stephanie', '0786509454', 'nkustephanie@gmail.com', '123', 0),
('1685479629', 'Ngabonziza patrick', '0785434567', 'patrick1@gmail.com', '123', 0),
('1685479672', 'Uwase oliva', '0798426145', 'uwase@gmail.com', '123', 0),
('1685497023', 'mona', '9999999999', 'o@gmail.com', '123', 0),
('1686336307', 'fs', '1233333333', 'nkustephanie@gmail.com', '123', 0),
('1686336341', 'gdfs', '6666666666', 'patrick1@gmail.com', '123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `citizens`
--
ALTER TABLE `citizens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `citizens`
--
ALTER TABLE `citizens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
