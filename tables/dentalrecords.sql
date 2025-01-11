-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2025 at 09:28 AM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `dentalrecords`
--

CREATE TABLE `dentalrecords` (
  `id` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `toothId` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `surgery` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dentalrecords`
--

INSERT INTO `dentalrecords` (`id`, `patientId`, `toothId`, `price`, `surgery`) VALUES
(1, 101, 'tooth-16', 100.00, 'Dental exams'),
(2, 101, 'tooth-36', 120.00, 'Dental sealants'),
(3, 101, 'tooth-16', 100.00, 'Dental exams'),
(4, 101, 'tooth-36', 120.00, 'Dental sealants'),
(5, 101, 'tooth-16', 100.00, 'Dental exams)'),
(6, 101, 'tooth-36', 120.00, 'Dental sealants)'),
(7, 101, 'tooth-42', 450.00, 'Root canal therapy (endodontics))'),
(8, 314036, 'tooth-16', 100.00, 'Dental exams)'),
(9, 314036, 'tooth-36', 120.00, 'Dental sealants)'),
(10, 314036, 'tooth-42', 450.00, 'Root canal therapy (endodontics))'),
(11, 0, 'tooth-16', 100.00, 'Dental exams)'),
(12, 0, 'tooth-36', 75.00, 'Fluoride treatments)'),
(13, 0, 'tooth-17', 120.00, 'Dental sealants)'),
(14, 0, 'tooth-16', 120.00, 'Dental sealants)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dentalrecords`
--
ALTER TABLE `dentalrecords`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dentalrecords`
--
ALTER TABLE `dentalrecords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
