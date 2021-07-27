-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2020 at 12:30 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `rec_tbl`
--

CREATE TABLE `rec_tbl` (
  `rec_id` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `gender` char(10) NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rec_tbl`
--

INSERT INTO `rec_tbl` (`rec_id`, `f_name`, `l_name`, `gender`, `dob`, `pob`, `address`, `phone`, `email`, `note`) VALUES
(1, 'Mom', 'Vannak', 'Female', '1991-03-01', 'Takeo Province ', 'Phnom Penh', '088 9 666 120', 'vannakkmum@gmail.com ', 'Navy'),
(2, 'Chon', 'Phearak', 'Male', '1990-05-04', 'Takeo Province  ', 'Phnom Penh', '015 66 77 33', 'phearakchon@yahoo.com  ', 'Air Force'),
(3, 'Soa', 'Muny', 'Male', '1988-05-05', 'Takeo Province   ', 'Phnom Penh', '097 69 90 123', 'munysoa@gmail.com   ', 'Marine'),
(4, 'Sok', 'Cheatha', 'Female', '1989-06-06', 'Kompot', 'Phnom Penh', '099 77 66 55 ', 'cheatasok@gmail.com', 'Army');

-- --------------------------------------------------------

--
-- Table structure for table `req_tbl`
--

CREATE TABLE `req_tbl` (
  `req_id` int(10) UNSIGNED NOT NULL,
  `sup_id` int(10) NOT NULL,
  `sol_id` int(10) NOT NULL,
  `req_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `req_tbl`
--

INSERT INTO `req_tbl` (`req_id`, `sup_id`, `sol_id`, `req_name`) VALUES
(1, 2, 1, 'Weapons'),
(2, 1, 2, 'Equipments'),
(3, 2, 3, 'Weapons'),
(4, 3, 4, 'Medical Supplies'),
(5, 1, 5, 'Equipments'),
(6, 3, 6, 'Medical Supplies'),
(7, 2, 4, 'Weapons');

-- --------------------------------------------------------

--
-- Table structure for table `si_tb`
--

CREATE TABLE `si_tb` (
  `si_id` int(10) UNSIGNED NOT NULL,
  `si_name` varchar(100) NOT NULL,
  `quantity` text NOT NULL,
  `cost` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `si_tb`
--

INSERT INTO `si_tb` (`si_id`, `si_name`, `quantity`, `cost`) VALUES
(1, 'Weapons', '3000', 'Rs. 100000');

-- --------------------------------------------------------

--
-- Table structure for table `sol_tbl`
--

CREATE TABLE `sol_tbl` (
  `sol_id` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `gender` char(10) NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sol_tbl`
--

INSERT INTO `sol_tbl` (`sol_id`, `f_name`, `l_name`, `gender`, `dob`, `pob`, `address`, `phone`, `email`, `note`) VALUES
(1, 'Hang', 'Sovann', 'Male', '1985-03-05', ' Kandal Province', ' Phnom Penh', '015 871 787', 'sovannhang@gmail.com', 'Rescue'),
(2, 'Pheng', 'Tola', 'Male', '1986-03-08', 'Kompong Cham Province', 'Phnom Penh', '016 572 393', 'tolapheng@gmail.com', 'Patrol'),
(3, 'Sann', 'Vannthoeun', 'Male', '1990-07-03', 'Kandal Province', 'kankal', '087 666 55 ', 'vannthoeunsann@gmail.com', 'Guard'),
(4, 'Tang', 'Hay', 'Male', '0000-00-00', 'Kroches', 'Phnom Penh', '099 77 66 33', 'haytang@gmail.com', 'Rescue'),
(5, 'Chi', 'Kim  Y', 'Male', '0000-00-00', 'Phnom Penh', 'Phnom Penh', '097 66 55 423', 'kimychi@gmail.com', 'Guard'),
(6, 'Sann', 'Sotherath', 'Male', '1985-02-01', 'Kandal Province', 'Phnom Penh', '012 33 44 55', 'sotherathsann@gmail.com', 'Patrol');

-- --------------------------------------------------------

--
-- Table structure for table `sup_tbl`
--

CREATE TABLE `sup_tbl` (
  `sup_id` int(10) UNSIGNED NOT NULL,
  `sup_name` varchar(50) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sup_tbl`
--

INSERT INTO `sup_tbl` (`sup_id`, `sup_name`, `note`) VALUES
(1, 'Equinox', 'Equipments'),
(2, 'ArmsHouse', 'Weapons'),
(3, 'MedStore', 'Medical Supplies');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `u_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` char(10) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`u_id`, `username`, `password`, `type`, `note`) VALUES
(1, 'admin', 'admin', 'creator', 'creator'),
(8, 'almash', 'almash', 'Top-tier', 'Overview of the general'),
(9, 'mrudula', 'mrudula', 'Major', 'Overview of dula'),
(10, 'neil', 'neil', 'Minor', 'Overview of neil\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rec_tbl`
--
ALTER TABLE `rec_tbl`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indexes for table `req_tbl`
--
ALTER TABLE `req_tbl`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `si_tb`
--
ALTER TABLE `si_tb`
  ADD PRIMARY KEY (`si_id`);

--
-- Indexes for table `sol_tbl`
--
ALTER TABLE `sol_tbl`
  ADD PRIMARY KEY (`sol_id`);

--
-- Indexes for table `sup_tbl`
--
ALTER TABLE `sup_tbl`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rec_tbl`
--
ALTER TABLE `rec_tbl`
  MODIFY `rec_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `req_tbl`
--
ALTER TABLE `req_tbl`
  MODIFY `req_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `si_tb`
--
ALTER TABLE `si_tb`
  MODIFY `si_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sol_tbl`
--
ALTER TABLE `sol_tbl`
  MODIFY `sol_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sup_tbl`
--
ALTER TABLE `sup_tbl`
  MODIFY `sup_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `u_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
