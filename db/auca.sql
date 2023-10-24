-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2023 at 07:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auca`
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
(1, 'admin', '123');

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
('1638188745', 'Stress', 2, '29/11/2021 13:25', '2', 0),
('1638193494', 'Anger', 1, '29/11/2021 14:44', '2', 0),
('1666599378', 'Domestic Violence', 1, '24/10/2022 10:16', '5', 0),
('1692454614', 'Requesting information', 1, '19/08/2023 16:16', '6', 0),
('1694279743', 'Requesting information', 1, '09/09/2023 19:15', '8', 0),
('1694279994', 'Donation Request', 0, '09/09/2023 19:19', '7', 0);

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
(7, '2', '2', 'Salama', '1666598536'),
(8, '2', '3', 'Umeze ute?', '1666598548'),
(9, '2', '5', 'Vip Chance', '1666599586'),
(10, '5', '2', 'Ni sawa cyane', '1666599612'),
(11, '1692454677', '6', 'Hi Melchi!', '1692454782'),
(12, '6', '1692454677', 'Am good, just want info?', '1692454809'),
(13, '1692454677', '8', 'Hello!', '1694279810'),
(14, '8', '1692454677', 'Salama', '1694279839');

-- --------------------------------------------------------

--
-- Table structure for table `citizens`
--

CREATE TABLE `citizens` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `acctype` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `citizens`
--

INSERT INTO `citizens` (`id`, `fullname`, `phone`, `acctype`, `email`, `password`, `deleted`) VALUES
(2, 'Melchi Roger GIRINEZA', '0788620994', 'Family', 'melchiroger@gmail.com', '123', 0),
(3, 'Penina NTAGISANIMANA', '0789619170', 'Family', 'ntagisapenina@gmail.com', '1235', 0),
(5, 'Mugisha Chance', '0788620994', 'Family', 'chance@gmail.com', '123', 0),
(6, 'Melchi', '0788620994', 'Family', 'm@gmail.com', '123', 0),
(7, 'Isaac RUGIMBA', '0788620994', 'Donor', 'isoo@gmail.com', '123', 0),
(8, 'S', '0786058038', 'Family', 'sanaya@gmail.com', '123', 0);

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
(5, 'Josiane MUKANEZA', 'jo@gmail.com', '0780737050', 'Hello Team!', '29/11/2021 11:25', 0),
(6, 'S', 's@gmail.com', '0788838828', 'Hi Team!', '19/08/2023 16:10', 0),
(7, 'Sam', 'sam@gmail.com', '0788838828', 'Melchi yarasaza', '09/09/2023 19:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedid` int(11) NOT NULL,
  `patientid` varchar(100) NOT NULL,
  `feedback` varchar(100) NOT NULL,
  `fdatetime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedid`, `patientid`, `feedback`, `fdatetime`) VALUES
(2, 'P-007', 'Melchi Yarasaze', '1694277144'),
(3, 'P-007', 'Nubu Tuvugana ni igisazi\r\n', '1694277155');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `patient_code` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `av_age` varchar(100) NOT NULL,
  `av_height` varchar(100) NOT NULL,
  `pick_point` varchar(100) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0,
  `fullname` varchar(100) DEFAULT NULL,
  `idcard` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `sector` varchar(100) DEFAULT NULL,
  `cell` varchar(100) DEFAULT NULL,
  `village` varchar(100) DEFAULT NULL,
  `cpname` varchar(100) DEFAULT NULL,
  `cpphone` varchar(100) DEFAULT NULL,
  `addcomment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `patient_code`, `gender`, `av_age`, `av_height`, `pick_point`, `deleted`, `fullname`, `idcard`, `district`, `sector`, `cell`, `village`, `cpname`, `cpphone`, `addcomment`) VALUES
(3, 'P-005', 'Female', '27', '175 cm', 'Nyabugogo', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'P-006', 'Male', '30', '180 cm', 'Gikondo', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'P-007', 'Male', '28-35', '150 cm - 175cm', 'Remera', 0, 'Melchi', '', 'Musanze', 'Cyuve', '', '', '', '', 'Other Info');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `acctype` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `phone`, `acctype`, `email`, `password`, `deleted`) VALUES
(1692454677, 'J Darc', '0788858838', 'Social Affairs', 'jd@gmail.com', '123', 0),
(1693131454, 'Aline KAYIGANWA', '0788625990', 'Doctor', 'alikay@hotmail.com', '123', 0),
(1694068587, 'Jojo', '0788838828', 'Doctor', 'josiamu@gmail.com', '123', 0),
(1694068641, 'Jojo', '0788838828', 'Receptionist', 'josianeza@gmail.com', '123', 0);

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
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedid`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `citizens`
--
ALTER TABLE `citizens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1694068642;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
