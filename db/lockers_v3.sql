-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 11:07 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lockers`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrative`
--


DROP TABLE IF EXISTS `students`;
DROP TABLE IF EXISTS `lockers`;
DROP TABLE IF EXISTS `booking`;
DROP TABLE IF EXISTS `administrator`;
DROP TABLE IF EXISTS `administrative`;

CREATE TABLE `administrative` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `phone_number` varchar(25) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrative`
--

INSERT INTO `administrative` (`id`, `name`, `phone_number`, `username`, `password`) VALUES
(1, 'Mohmmed', '059856488', 'Ismael', '112233');

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `phone_number` varchar(25) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `name`, `username`, `phone_number`, `password`) VALUES
(1, 'test', 'test', '05787545', '123123'),
(2, 'Khaled', 'Rtt4', '0556874', '885522');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `locker_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `approved` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT 'Pending',
  `time_on` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `student_id`, `locker_id`, `employee_id`, `approved`, `time_on`) VALUES
(15, 5, 3, NULL, 'Pending', 1654290276);

-- --------------------------------------------------------

--
-- Table structure for table `lockers`
--

CREATE TABLE `lockers` (
  `id` int(11) NOT NULL,
  `locker_number` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lockers`
--

INSERT INTO `lockers` (`id`, `locker_number`, `building`, `status`) VALUES
(38, '1', 'A2', 1),
(39, '2', 'A1', 1),
(40, '3', 'A1', 2),
(41, '4', 'A1', 1),
(42, '5', 'A1', 1),
(43, '6', 'A1', 1),
(44, '7', 'A1', 1),
(45, '8', 'A1', 1),
(46, '9', 'A1', 1),
(47, '10', 'A1', 1),
(48, '12', 'A1', 1),
(49, '11', 'A2', 1),
(50, '21', 'X1', 1),
(51, '13', 'A2', 1),
(52, '14', 'Z1', 1),
(53, '15', 'Z1', 1),
(54, '16', 'Z1', 1),
(55, '17', 'Z1', 1),
(56, '18', 'Z1', 1),
(57, '20', 'Z1', 1),
(58, '19', 'Z1', 1),
(59, '22', 'A2', 1),
(60, '23', 'A1', 1),
(61, '24', 'A1', 1),
(62, '25', 'A1', 1),
(63, '26', 'A1', 1),
(64, '27', 'A1', 1),
(65, '28', 'A1', 1),
(66, '29', 'A1', 1),
(67, '30', 'A1', 1),
(68, '31', 'A1', 1),
(69, '32', 'A1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `phone_number`, `student_id`, `password`) VALUES
(2, 'Khaled', '0556874', '20186565', '885522'),
(3, 'Clooasd', '055555778', '202135666', '85208520'),
(5, 'Amnah', '055648615', '201952454', '112233'),
(6, 'Ricko', '0555454552', '20202285', '112233'),
(7, 'Test User', '056441545', '20202125', '1122'),
(8, 'Demo', '05646546546', '20202051', '1122');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrative`
--
ALTER TABLE `administrative`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lockers`
--
ALTER TABLE `lockers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrative`
--
ALTER TABLE `administrative`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lockers`
--
ALTER TABLE `lockers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
