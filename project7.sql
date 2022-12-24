-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2022 at 04:04 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project7`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` char(50) DEFAULT NULL,
  `UserName` char(50) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  `adminimage` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `adminimage`) VALUES
(1, 'AdeyemoOlamilekan', 'Adeyemo', 7898799798, 'adeyemoolamilekan08@gmail.com', 'ade', '2019-07-25 06:21:50', 'IMG_0284.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `tblappointment`
--

CREATE TABLE `tblappointment` (
  `ID` int(10) NOT NULL,
  `AptNumber` varchar(80) DEFAULT NULL,
  `Name` varchar(120) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `PhoneNumber` bigint(11) DEFAULT NULL,
  `AptDate` varchar(120) DEFAULT NULL,
  `AptTime` varchar(120) DEFAULT NULL,
  `Staffs` varchar(255) NOT NULL,
  `Services` varchar(120) DEFAULT NULL,
  `Expired` varchar(250) NOT NULL,
  `ApplyDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `RemarkDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblholiday`
--

CREATE TABLE `tblholiday` (
  `id` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblholiday`
--

INSERT INTO `tblholiday` (`id`, `reason`, `date`) VALUES
(5, 'Month end holiday', '2022-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `tblinvoice`
--

CREATE TABLE `tblinvoice` (
  `id` int(11) NOT NULL,
  `Userid` int(11) DEFAULT NULL,
  `ServiceId` int(11) DEFAULT NULL,
  `BillingId` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinvoice`
--

INSERT INTO `tblinvoice` (`id`, `Userid`, `ServiceId`, `BillingId`, `PostingDate`) VALUES
(1, 2, 2, 621839533, '2022-06-01 15:33:22'),
(2, 2, 5, 621839533, '2022-06-01 15:33:22'),
(4, 2, 7, 621839533, '2022-06-01 09:33:22'),
(5, 1, 1, 904156433, '2022-05-31 15:40:42');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `StaffName` varchar(255) NOT NULL,
  `Message` varchar(250) NOT NULL,
  `date_send` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `ID` int(10) NOT NULL,
  `StaffName` varchar(200) DEFAULT NULL,
  `ServiceName` varchar(250) NOT NULL,
  `Cost` int(10) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `Expired` varchar(250) NOT NULL,
  `today` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`ID`, `StaffName`, `ServiceName`, `Cost`, `CreationDate`, `Expired`, `today`) VALUES
(1, 'Babalola', 'Deluxe Menicure', 1200, '2022-07-25 11:22:38', '2', '2022-10-27'),
(4, 'Jumoke', 'Deluxe Pedicure', 2000, '2022-07-25 11:23:34', '2', '2022-10-29'),
(5, 'Lolade', 'Normal Menicure', 15000, '2022-07-25 11:23:47', '11', '2022-10-31'),
(6, 'Bolaji', 'Normal Pedicure', 1200, '2022-07-25 11:24:01', '4', '2022-10-24'),
(7, 'Olaide', 'Barbing', 1200, '2022-07-25 11:24:19', '1', '2022-09-27'),
(9, 'Shuaib', 'Body Spa', 1000, '2022-07-25 11:24:53', '3', '2022-10-28'),
(12, 'Lolade', 'U-Shape Hair Cut', 1500, '2022-08-19 13:36:27', '1', '2022-06-06'),
(19, 'Muller', 'Hair Testing', 10000, '2022-09-30 20:32:10', '6', '2022-10-31'),
(20, 'Adigun', 'Barbing', 15000, '2022-09-30 20:32:59', '', '0000-00-00'),
(21, 'Moses', 'paint', 200, '2022-10-03 22:44:39', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tblsets`
--

CREATE TABLE `tblsets` (
  `id` int(11) NOT NULL,
  `Staff` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsets`
--

INSERT INTO `tblsets` (`id`, `Staff`, `Time`) VALUES
(1, 'Tomiwa', '17:00'),
(2, 'Olaide', ''),
(3, 'Jumoke', ''),
(4, 'Tomiwa', '10:00'),
(5, 'Jumoke', '09:00'),
(6, 'Jumoke', '10:00'),
(7, 'Jumoke', '11:00'),
(8, 'Olaide', '1'),
(9, 'Olaide', '09:00'),
(10, 'Olaide', '12:00'),
(11, 'Olaide', '13:00'),
(12, 'Olaide', '14:00'),
(13, 'Olaide', '15:00'),
(14, 'Olaide', '09:00'),
(15, 'Olaide', '12:00'),
(16, 'Olaide', '13:00'),
(17, 'Olaide', '14:00'),
(18, 'Olaide', '15:00'),
(19, 'Olaide', '14:00'),
(20, 'Tomiwa', '16:00'),
(21, 'Bolaji', '09:00'),
(22, 'Bolaji', '10:00'),
(23, 'Bolaji', '11:00'),
(24, 'Bolaji', '12:00'),
(25, 'Bolaji', '13:00'),
(26, 'Bolaji', '14:00'),
(27, 'Bolaji', '15:00'),
(28, 'Bolaji', '16:00'),
(29, 'Bolaji', '17:00'),
(30, 'Bolaji', '18:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblstaffs`
--

CREATE TABLE `tblstaffs` (
  `ID` int(10) NOT NULL,
  `Name` varchar(120) DEFAULT NULL,
  `UserName` varchar(250) NOT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(250) NOT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Gender` enum('Female','Male','Transgender') DEFAULT NULL,
  `Details` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `staffimage` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstaffs`
--

INSERT INTO `tblstaffs` (`ID`, `Name`, `UserName`, `Email`, `Password`, `MobileNumber`, `Gender`, `Details`, `CreationDate`, `UpdationDate`, `staffimage`) VALUES
(7, 'Adeyemo', 'Moses', 'adeyemomoses@gmail.com', '123', 9133808000, 'Male', 'No,43 Awowo Apete zone5 Ibadan', '2022-10-26 23:30:15', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbltime`
--

CREATE TABLE `tbltime` (
  `id` int(100) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltime`
--

INSERT INTO `tbltime` (`id`, `time`) VALUES
(1, '09:00'),
(2, '10:00'),
(3, '11:00'),
(4, '12:00'),
(5, '13:00'),
(6, '14:00'),
(7, '15:00'),
(8, '16:00'),
(9, '17:00'),
(10, '18:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `userimage` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `CreationDate` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblappointment`
--
ALTER TABLE `tblappointment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblholiday`
--
ALTER TABLE `tblholiday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblsets`
--
ALTER TABLE `tblsets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstaffs`
--
ALTER TABLE `tblstaffs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltime`
--
ALTER TABLE `tbltime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblappointment`
--
ALTER TABLE `tblappointment`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tblholiday`
--
ALTER TABLE `tblholiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tblsets`
--
ALTER TABLE `tblsets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblstaffs`
--
ALTER TABLE `tblstaffs`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbltime`
--
ALTER TABLE `tbltime`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
