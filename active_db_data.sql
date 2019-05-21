-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2019 at 02:14 AM
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
-- Database: `active_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `Month_Bill` int(11) NOT NULL,
  `Year_Bill` int(22) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `CustomerId`, `Month_Bill`, `Year_Bill`, `amount`) VALUES
(5, 5, 5, 2019, 3870),
(6, 4, 5, 2019, 810);

-- --------------------------------------------------------

--
-- Table structure for table `costplan`
--

CREATE TABLE `costplan` (
  `Code` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `costAtResponse` double NOT NULL,
  `costPerSecond` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `costplan`
--

INSERT INTO `costplan` (`Code`, `name`, `costAtResponse`, `costPerSecond`) VALUES
(1, 'Class A', 21, 45);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `name` varchar(44) DEFAULT NULL,
  `surname` varchar(44) DEFAULT NULL,
  `phoneNumber` varchar(44) DEFAULT NULL,
  `costPlan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `name`, `surname`, `phoneNumber`, `costPlan`) VALUES
(1, '0', 'Byam', '0780440474', 1),
(2, '0', 'Byam', '0780440474', 1),
(3, '0', 'Byam', '078', 1),
(4, 'Sumsung', 'Pumbu', '09009808000', 1),
(5, 'Kapiri', 'Joseph', '09009808000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phonecall`
--

CREATE TABLE `phonecall` (
  `CustomerId` int(11) NOT NULL,
  `Date_Call` date NOT NULL,
  `Time_Call` time NOT NULL,
  `calledNumber` varchar(16) NOT NULL,
  `duration` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phonecall`
--

INSERT INTO `phonecall` (`CustomerId`, `Date_Call`, `Time_Call`, `calledNumber`, `duration`) VALUES
(5, '2019-06-20', '23:04:00', '0780040474', 20),
(5, '2019-06-20', '23:04:00', '0780040474', 20),
(5, '2019-06-20', '23:04:00', '0780040474', 20),
(5, '2019-06-20', '23:04:00', '0780040474', 20),
(5, '2020-06-22', '11:12:00', '0780040474', 12),
(5, '2020-06-22', '11:12:00', '0780040474', 12),
(5, '2020-06-20', '13:16:00', '0780040474', 12),
(5, '2020-06-20', '13:16:00', '0780040474', 12),
(5, '2020-06-20', '13:16:00', '0780040474', 12),
(5, '2020-06-20', '13:16:00', '0780040474', 12),
(5, '2020-06-20', '13:16:00', '0780040474', 12),
(5, '2020-06-20', '13:16:00', '0780040474', 12),
(5, '2020-06-20', '13:16:00', '0780040474', 12),
(5, '2020-06-20', '13:16:00', '0780040474', 12),
(5, '2020-06-22', '01:37:00', '0780040474', 12),
(5, '2020-06-22', '01:37:00', '0780040474', 12),
(5, '2020-06-22', '01:37:00', '0780040474', 12),
(5, '2020-06-22', '01:37:00', '0780040474', 12),
(5, '2020-06-22', '01:37:00', '0780040474', 12),
(5, '2020-06-22', '01:42:00', '078000000', 20),
(5, '2020-06-20', '13:44:00', '1', 30),
(4, '2019-06-22', '13:53:00', '0780040474', 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fkcust` (`CustomerId`);

--
-- Indexes for table `costplan`
--
ALTER TABLE `costplan`
  ADD PRIMARY KEY (`Code`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `phonecall`
--
ALTER TABLE `phonecall`
  ADD KEY `fkcust` (`CustomerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `costplan`
--
ALTER TABLE `costplan`
  MODIFY `Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`CustomerId`) REFERENCES `customer` (`CustomerID`);

--
-- Constraints for table `phonecall`
--
ALTER TABLE `phonecall`
  ADD CONSTRAINT `phonecall_ibfk_1` FOREIGN KEY (`CustomerId`) REFERENCES `customer` (`CustomerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
