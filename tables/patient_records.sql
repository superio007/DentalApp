-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2025 at 11:29 AM
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
-- Table structure for table `patient_records`
--

CREATE TABLE `patient_records` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` enum('Male','Female','Other') NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `serious_illness` text DEFAULT NULL,
  `bad_breath` tinyint(1) DEFAULT 0,
  `bleeding_gums` tinyint(1) DEFAULT 0,
  `clicking_jaw` tinyint(1) DEFAULT 0,
  `food_collecting` tinyint(1) DEFAULT 0,
  `grinding_teeth` tinyint(1) DEFAULT 0,
  `loose_teeth` tinyint(1) DEFAULT 0,
  `pain` tinyint(1) DEFAULT 0,
  `sensitivity_cold` tinyint(1) DEFAULT 0,
  `sensitivity_hot` tinyint(1) DEFAULT 0,
  `sensitivity_sweets` tinyint(1) DEFAULT 0,
  `sores_mouth` tinyint(1) DEFAULT 0,
  `swelling` tinyint(1) DEFAULT 0,
  `reaction_anesthetic` tinyint(1) DEFAULT 0,
  `pregnant` tinyint(1) DEFAULT 0,
  `birth_control` tinyint(1) DEFAULT 0,
  `nursing` tinyint(1) DEFAULT 0,
  `anemia` tinyint(1) DEFAULT 0,
  `arthritis` tinyint(1) DEFAULT 0,
  `artificial_devices` tinyint(1) DEFAULT 0,
  `asthma` tinyint(1) DEFAULT 0,
  `autoimmune` tinyint(1) DEFAULT 0,
  `bleeding_problem` tinyint(1) DEFAULT 0,
  `cancer` tinyint(1) DEFAULT 0,
  `hiv_aids` tinyint(1) DEFAULT 0,
  `jaw_pain` tinyint(1) DEFAULT 0,
  `kidney_disease` tinyint(1) DEFAULT 0,
  `liver_disease` tinyint(1) DEFAULT 0,
  `osteoporosis` tinyint(1) DEFAULT 0,
  `psychiatric_treatment` tinyint(1) DEFAULT 0,
  `respiratory_disease` tinyint(1) DEFAULT 0,
  `local_anesthetic` tinyint(1) DEFAULT 0,
  `nsaid` tinyint(1) DEFAULT 0,
  `penicillin` tinyint(1) DEFAULT 0,
  `latex` tinyint(1) DEFAULT 0,
  `others` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patient_records`
--

INSERT INTO `patient_records` (`id`, `name`, `age`, `sex`, `patient_id`, `email`, `phone`, `address`, `reason`, `serious_illness`, `bad_breath`, `bleeding_gums`, `clicking_jaw`, `food_collecting`, `grinding_teeth`, `loose_teeth`, `pain`, `sensitivity_cold`, `sensitivity_hot`, `sensitivity_sweets`, `sores_mouth`, `swelling`, `reaction_anesthetic`, `pregnant`, `birth_control`, `nursing`, `anemia`, `arthritis`, `artificial_devices`, `asthma`, `autoimmune`, `bleeding_problem`, `cancer`, `hiv_aids`, `jaw_pain`, `kidney_disease`, `liver_disease`, `osteoporosis`, `psychiatric_treatment`, `respiratory_disease`, `local_anesthetic`, `nsaid`, `penicillin`, `latex`, `others`) VALUES
(1, 'Kiran dhoke', 21, '', '933474', 'dhokekiran98@gmail.com', '08097972852', 'vaman bhaskar koli chawl r', 'dd', 'aaa', 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient_records`
--
ALTER TABLE `patient_records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient_records`
--
ALTER TABLE `patient_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
