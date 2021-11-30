-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2021 at 09:13 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_med`
--

CREATE TABLE `tbl_med` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `nic` varchar(255) DEFAULT NULL,
  `contact` int(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `hospital_name` varchar(255) DEFAULT NULL,
  `hospital_city` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `activity` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_med`
--

INSERT INTO `tbl_med` (`id`, `name`, `nic`, `contact`, `email`, `hospital_name`, `hospital_city`, `department`, `designation`, `activity`) VALUES
(1, 'M.G.R.Wickramasingha', '816122163V', 0, '', 'Divisional Hospital', '', '', '', 'Mannagiging COVID 19 out break'),
(2, 'T.S.Wijeenath', '700200400V', 0, '', 'Divisional Hospital', 'Neluwa', '', '', 'Mannagiging COVID 19 out break'),
(3, 'C.L.Jayasingha', '951640565V', 0, '', 'Divisional Hospital', 'Neluwa', '', '', 'Mannagiging COVID 19 out break'),
(4, 'W.A.Pathum Sameera', '880700685V', 0, '', 'Divisional Hospital', 'Neluwa', '', '', 'Mannagiging COVID 19 out break'),
(5, 'A.A.Thahir', '851910913V', 0, '', 'Divisional Hospital', 'IRAKKAMAM', '', '', 'Mannagiging COVID 19 out break'),
(6, 'W.K. Suranjith', '910943804V', 0, '', 'Divisional Hospital', 'IRAKKAMAM', '', '', 'Mannagiging COVID 19 out break'),



-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `user_name`, `password`) VALUES
(112, 'user', 'user', '81dc9bdb52d04dc20036dbd8313ed055'),
(120, 'admin', 'YassiKula@', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_med`
--
ALTER TABLE `tbl_med`
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
-- AUTO_INCREMENT for table `tbl_med`
--
ALTER TABLE `tbl_med`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15206;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
