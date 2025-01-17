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
-- Table structure for table `prescriptionmedicines`
--

CREATE TABLE `prescriptionmedicines` (
  `id` int(11) NOT NULL,
  `Medicine` varchar(255) DEFAULT NULL,
  `Dosage` varchar(50) DEFAULT NULL,
  `Timing` varchar(50) DEFAULT NULL,
  `Duration` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `prescriptionmedicines`
--

INSERT INTO `prescriptionmedicines` (`id`, `Medicine`, `Dosage`, `Timing`, `Duration`) VALUES
(1, 'TAB. AUGMENTIN - LB 625 MG', '1-0-1', 'AFTER MEAL', '5 DAYS'),
(2, 'TAB. AUGMENTIN 625 MG', '1-0-1', 'AFTER MEAL', '5 DAYS'),
(3, 'TAB. AUGMENTIN 375 MG', '1-0-1', 'AFTER MEAL', '5 DAYS'),
(4, 'TAB. AMOXICILLIN 500 MG', '1-0-1', 'AFTER MEAL', '5 DAYS'),
(5, 'TAB. AMOXICILLIN 250 MG', '1-0-1', 'AFTER MEAL', '5 DAYS'),
(6, 'TAB. ACYLAB - P', '1-0-1', 'AFTER MEAL', '5 DAYS'),
(7, 'SYP. KIDMOX 125 ML', '1-0-1', 'AFTER MEAL', '5 DAYS'),
(8, 'TAB. METRONIDAZOL 400 MG', '1-0-1', 'AFTER MEAL', '5 DAYS'),
(9, 'TAB. METRONIDAZOL 200 MG', '1-0-1', 'AFTER MEAL', '5 DAYS'),
(10, 'TAB. CEFIXIME 200 MG', '1-0-1', 'AFTER MEAL', '5 DAYS'),
(11, 'TAB. HALEWOOD ACECLO - SP', '1-0-1', 'AFTER MEAL', '5 DAYS'),
(12, 'CAP. RABITAC - DSR', '1-0-1', 'BEFORE MEAL', '5 DAYS'),
(13, 'TAB. ZERODOL - SP', '1-0-1', 'AFTER MEAL', '5 DAYS'),
(14, 'TAB. ZERODOL - P', '1-0-1', 'AFTER MEAL', '5 DAYS'),
(15, 'TAB. DICLOFENAC - SP', '1-0-1', 'AFTER MEAL', '5 DAYS'),
(16, 'TAB. DICLOFENAC - P', '1-0-1', 'AFTER MEAL', '5 DAYS'),
(17, 'TAB. PARACETAMOL 500 MG', '1-0-1', 'AFTER MEAL', '5 DAYS'),
(18, 'TAB. PARACETAMOL 250 MG', '1-0-1', 'AFTER MEAL', '5 DAYS'),
(19, 'TAB. KETOROL - DT', 'SOS', NULL, NULL),
(20, 'TAB. TRAMADOL 50 MG', '1-0-1', 'AFTER MEAL', '5 DAYS'),
(21, 'SYP. IBUGESIC', '1-0-1', 'AFTER MEAL', '5 DAYS'),
(22, 'TAB. THEOMAX - CV-LB', '1-0-1', 'AFTER MEAL', '5 DAYS'),
(23, 'CAP. PANTOPRAZOLE - DSR', '1-0-1', 'BEFORE MEAL', '5 DAYS'),
(24, 'CAP. RABEPRAZOLE - DSR', '1-0-1', 'BEFORE MEAL', '5 DAYS'),
(25, 'CAP. PANTOPRAZOLE 40 MG', '1-0-1', 'BEFORE MEAL', '5 DAYS'),
(26, 'CAP. RABEPRAZOLE 20 MG', '1-0-1', 'BEFORE MEAL', '5 DAYS'),
(27, 'TAB. VITAMIN - C', '1-0-1', 'AFTER MEAL', '10 DAYS'),
(28, 'TAB. VITAMIN B COMPLEX', '1-0-0', 'AFTER MEAL', '10 DAYS'),
(29, 'TAB. ACYCLOVIR 200 MG', '1-1-1', 'AFTER MEAL', '7 DAYS'),
(30, 'SYP. ACYCLOVIR 100 ML', '1-1-1', 'AFTER MEAL', '7 DAYS'),
(31, 'TOPICAL ACYCLOVIR', '1-1-1', NULL, '7 DAYS'),
(32, 'CAP. ITRACONAZOLE 200 MG', '1-0-1', 'AFTER MEAL', '5 DAYS'),
(33, 'ITRACONAZOLE MOUTHWASH 10 MG', '1-0-1', NULL, '7 DAYS'),
(34, 'CHLORHEXIDINE MOUTHWASH', '1-0-1', NULL, '1 MONTH'),
(35, 'BETADINE MOUTHWASH', '1-0-1', NULL, '1 MONTH'),
(36, 'ORALIFE MOUTHWASH', '1-0-1', NULL, '1 MONTH'),
(37, 'CLOHEX', '1-0-1', NULL, '1 MONTH'),
(38, 'VANTEJ TOOTHPASTE', '1-0-1', NULL, '1 MONTH'),
(39, 'SHY - NM TOOTHPASTE', '1-0-1', NULL, '1 MONTH'),
(40, 'SHY - XT TOOTHPASTE', '1-0-1', NULL, '1 MONTH'),
(41, 'ENAFIX TOOTHPASTE', '1-0-1', NULL, '1 MONTH'),
(42, 'OMNIDENT TOOTHPASTE', '1-0-1', NULL, '1 MONTH'),
(43, 'PEDIFLOR TOOTHPASTE', '1-0-1', NULL, '1 MONTH'),
(44, 'PEDIFLOR 1000 TOOTHPASTE', '1-0-1', NULL, '1 MONTH'),
(45, 'SMILEY GEL', '1-1-1', NULL, '7 DAYS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prescriptionmedicines`
--
ALTER TABLE `prescriptionmedicines`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prescriptionmedicines`
--
ALTER TABLE `prescriptionmedicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
