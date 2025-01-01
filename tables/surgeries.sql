-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2025 at 11:30 AM
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
-- Table structure for table `surgeries`
--

CREATE TABLE `surgeries` (
  `id` int(11) NOT NULL,
  `surgery_name` varchar(255) NOT NULL,
  `price` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `surgeries`
--

INSERT INTO `surgeries` (`id`, `surgery_name`, `price`) VALUES
(1, 'Dental exams', 100.00),
(2, 'Fluoride treatments', 75.00),
(3, 'Dental sealants', 120.00),
(4, 'Oral cancer screening', 90.00),
(5, 'X-rays and imaging', 150.00),
(6, 'Fillings (composite or amalgam)', 200.00),
(7, 'Root canal therapy (endodontics)', 450.00),
(8, 'Crowns (tooth caps)', 800.00),
(9, 'Bridges', 1200.00),
(10, 'Dental implants', 1500.00),
(11, 'Dentures (full or partial)', 1000.00),
(12, 'Inlays and onlays', 700.00),
(13, 'Teeth whitening', 350.00),
(14, 'Veneers', 1000.00),
(15, 'Cosmetic bonding', 500.00),
(16, 'Gum contouring', 700.00),
(17, 'Tooth reshaping (enameloplasty)', 300.00),
(18, 'Braces (metal, ceramic, lingual)', 5000.00),
(19, 'Clear aligners (e.g., Invisalign)', 4000.00),
(20, 'Retainers', 300.00),
(21, 'Palatal expanders', 1500.00),
(22, 'Scaling and root planing (deep cleaning)', 600.00),
(23, 'Gum graft surgery', 1000.00),
(24, 'Periodontal pocket reduction', 1500.00),
(25, 'Laser gum treatment', 800.00),
(26, 'Tooth extraction (including wisdom teeth removal)', 250.00),
(27, 'Bone grafting', 1200.00),
(28, 'Sinus lift surgery', 2000.00),
(29, 'Oral biopsies', 800.00),
(30, 'Frenectomy (tongue-tie release)', 400.00),
(31, 'Space maintainers', 300.00),
(32, 'Pulpotomy (baby tooth root canal)', 300.00),
(33, 'Habit-breaking appliances (e.g., thumb sucking)', 250.00),
(34, 'Early orthodontic evaluations', 150.00),
(35, 'TMJ treatment', 500.00),
(36, 'Sleep apnea appliances', 1200.00),
(37, 'Full-mouth reconstruction', 15000.00),
(38, 'Jaw surgery (orthognathic surgery)', 5000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surgeries`
--
ALTER TABLE `surgeries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `surgeries`
--
ALTER TABLE `surgeries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
