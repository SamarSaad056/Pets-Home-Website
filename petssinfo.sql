-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308:3308
-- Generation Time: Apr 29, 2023 at 08:06 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshome`
--

-- --------------------------------------------------------

--
-- Table structure for table `petssinfo`
--

CREATE TABLE `petssinfo` (
  `petId` int(255) NOT NULL,
  `petName` varchar(255) NOT NULL,
  `petStat` varchar(255) NOT NULL,
  `ownerName` varchar(255) NOT NULL,
  `petType` varchar(255) NOT NULL,
  `petGender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `addres` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petssinfo`
--

INSERT INTO `petssinfo` (`petId`, `petName`, `petStat`, `ownerName`, `petType`, `petGender`, `phone`, `addres`, `email`, `image`, `date`) VALUES
(644, 'chona', 'lost', 'gone', ' Dog', 'male', '5012345667', 'Fanateer, Jubail Saudi Arabia', 'Gone123@gmail.com', 'images/7.jpg', '2029-04-23'),
(645, 'Mila', 'lost', 'Rashed', ' Cat', 'female', '+966094455676', 'Al Ferdos 20, Jubail Saudi Arabia', 'Rashedd455@hotmail.com', 'images/3.jpg', '2029-04-23'),
(646, 'Marlo', 'found', 'Ahmad Ali', ' Cat', 'male', '+966509876542', 'Jalmudah, Jubail Saudi Arabia', 'aa@gmail.com', 'images/5.jpg', '2029-04-23'),
(647, 'Bella', 'lost', 'stive', ' Dog', 'female', '+966554539221', 'Fanateer, Jubail Saudi Arabia', 'ss343@gmail.com', 'images/6.jpg', '2029-04-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `petssinfo`
--
ALTER TABLE `petssinfo`
  ADD PRIMARY KEY (`petId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `petssinfo`
--
ALTER TABLE `petssinfo`
  MODIFY `petId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=648;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
