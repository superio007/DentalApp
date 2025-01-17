-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2025 at 03:43 PM
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
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `dosage` varchar(50) NOT NULL,
  `timing` varchar(50) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `patient_id`, `medicine_id`, `medicine_name`, `dosage`, `timing`, `duration`, `created_at`) VALUES
(29, 461963, 7, 'SYP. KIDMOX 125 ML', '1-0-1', 'AFTER MEAL', '5 DAYS', '2025-01-16 11:45:38'),
(30, 461963, 38, 'VANTEJ TOOTHPASTE', '1-0-1', NULL, '1 MONTH', '2025-01-16 11:45:38'),
(31, 870774, 1, 'TAB. AUGMENTIN - LB 625 MG', '1-0-1', 'AFTER MEAL', '5 DAYS', '2025-01-16 12:46:32'),
(32, 339485, 10, 'TAB. CEFIXIME 200 MG', '1-0-1', 'AFTER MEAL', '5 DAYS', '2025-01-16 13:00:01'),
(33, 288778, 9, 'TAB. METRONIDAZOL 200 MG', '1-0-1', 'AFTER MEAL', '5 DAYS', '2025-01-16 15:22:56'),
(34, 735952, 7, 'SYP. KIDMOX 125 ML', '1-0-1', 'AFTER MEAL', '5 DAYS', '2025-01-17 13:38:34'),
(35, 206152, 7, 'SYP. KIDMOX 125 ML', '1-0-1', 'AFTER MEAL', '5 DAYS', '2025-01-17 13:47:33'),
(36, 206152, 27, 'TAB. VITAMIN - C', '1-0-1', 'AFTER MEAL', '10 DAYS', '2025-01-17 13:47:33'),
(37, 206152, 12, 'CAP. RABITAC - DSR', '1-0-1', 'BEFORE MEAL', '5 DAYS', '2025-01-17 13:47:33'),
(38, 104347, 7, 'SYP. KIDMOX 125 ML', '1-0-1', 'AFTER MEAL', '5 DAYS', '2025-01-17 13:58:01'),
(39, 104347, 12, 'CAP. RABITAC - DSR', '1-0-1', 'BEFORE MEAL', '5 DAYS', '2025-01-17 13:58:01'),
(40, 104347, 2, 'TAB. AUGMENTIN 625 MG', '1-0-1', 'AFTER MEAL', '5 DAYS', '2025-01-17 13:58:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
