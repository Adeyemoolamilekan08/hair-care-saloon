-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 08:23 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
(1, 'AdeyemoOlamilekan', 'Adeyemo', 7898799798, 'adeyemoolamilekan08@gmail.com', 'ade', '2019-07-25 06:21:50', 'sheu faruk.jpg');

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
  `Month` varchar(255) NOT NULL,
  `Cost` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `Expired` varchar(250) NOT NULL,
  `ApplyDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `RemarkDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblappointment`
--

INSERT INTO `tblappointment` (`ID`, `AptNumber`, `Name`, `Email`, `PhoneNumber`, `AptDate`, `AptTime`, `Staffs`, `Services`, `Month`, `Cost`, `payment_method`, `Expired`, `ApplyDate`, `Remark`, `Status`, `RemarkDate`) VALUES
(106, '586291715', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-11-14', '14:00', 'Babalola', 'Deluxe Menicure', 'Nov', '1200', 'Array', '', '2022-11-14 23:42:46', '', '', '2022-11-14 23:42:46'),
(107, '994777846', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-11-15', '13:00', 'Lolade', 'Normal Menicure', 'Nov', '15000', 'Array', '', '2022-11-15 22:12:12', '', '', '2022-11-15 22:12:12'),
(108, '282518865', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-11-15', '14:00', 'Jumoke', 'Deluxe Pedicure', 'Nov', '2000', 'Array', '', '2022-11-15 22:12:29', '', '', '2022-11-15 22:12:29'),
(109, '350974744', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-11-17', '14:00', 'Jumoke', 'Deluxe Pedicure', 'Nov', '2000', 'pay_online', '', '2022-11-17 19:35:04', '', '', '2022-11-17 19:35:04'),
(110, '104109686', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-11-17', '14:00', 'Lolade', 'Normal Menicure', 'Nov', '15000', 'pay_offline', '', '2022-11-17 19:35:21', '', '', '2022-11-17 19:35:21'),
(111, '372943955', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-11-18', '16:00', 'Jumoke', 'Deluxe Pedicure', 'Nov', '2000', 'pay_offline', '', '2022-11-18 16:24:33', '', '', '2022-11-18 16:24:33'),
(112, '160757658', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-11-19', '15:00', 'Lolade', 'Normal Menicure', 'Nov', '15000', 'pay_online', '', '2022-11-18 16:31:40', '', '', '2022-11-18 16:31:40'),
(113, '655834255', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-11-20', '09:00', 'Shuaib', 'Body Spa', 'Nov', '1000', 'pay_online', '', '2022-11-18 16:37:26', '', '', '2022-11-18 16:37:26'),
(114, '727758116', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-11-21', '16:00', 'Lolade', 'Normal Menicure', 'Nov', '15000', 'pay_offline', '', '2022-11-18 16:43:59', '', '', '2022-11-18 16:43:59'),
(115, '791287886', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-11-18', '15:00', 'Olaide', 'Barbing', 'Nov', '15000', 'pay_offline', '', '2022-11-18 17:12:51', '', '', '2022-11-18 17:12:51'),
(116, '906663510', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-11-18', '13:00', 'Olaide', 'Barbing', 'Nov', '15000', 'pay_online', '', '2022-11-18 17:13:27', '', '', '2022-11-18 17:13:27'),
(117, '235831164', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-11-26', '13:00', 'Bolaji', 'Normal Pedicure', 'Nov', '1200', 'pay_offline', '', '2022-11-24 00:08:43', 'Sorry!!', '2', '2023-04-30 06:03:51'),
(118, '424607395', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-12-16', '12:00', 'Olaide', 'Barbing', 'Dec', '15000', 'pay_online', '', '2022-12-16 19:23:06', 'Approved', '1', '2022-12-16 19:24:35');

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
(5, 'Month end holiday', '2022-10-31'),
(6, 'December Holiday', '2022-12-16');

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
(5, 1, 1, 904156433, '2022-05-31 15:40:42'),
(19, 10, 7, 919502813, '2022-12-16 19:25:57');

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

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `Name`, `Email`, `StaffName`, `Message`, `date_send`) VALUES
(14, 'Moses', 'moses@gmail.com', 'Moses', 'Disrespect', '2023-04-29 21:59:51.288524');

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
(1, 'Lolade', 'Menicure', 2000, '2023-04-30 05:40:54', '0', '0000-00-00'),
(2, 'Blessing', 'Pedicure', 1200, '2023-04-30 05:41:15', '0', '0000-00-00'),
(3, 'Salah', 'Body Spa', 1000, '2023-04-30 05:41:41', '0', '0000-00-00'),
(4, 'Noheemot', 'Charcol Facial', 5000, '2023-04-30 05:42:24', '0', '0000-00-00'),
(5, 'Gabriel', 'Barbing', 500, '2023-04-30 05:43:05', '0', '0000-00-00'),
(6, 'Moses', 'Rebonding', 800, '2023-04-30 05:43:43', '0', '0000-00-00');

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
(1, 'Test Lolade', 'Lolade', 'lolade@gmail.com', '123', 9133808000, 'Female', 'No,4 Airport Alakia Ibadan', '2023-04-30 05:46:13', NULL, ''),
(2, 'Test Blessing', 'Blessing', 'blessing@gmail.com', '123', 8051727497, 'Male', 'No,43 Idanre Oke-Aro GarageAkure', '2023-04-30 05:47:30', '2023-04-30 06:11:54', 'FB_IMG_16248275009624170.jpg'),
(3, 'Test Salah', 'Salah', 'salah@gmail.com', '123', 9133808000, 'Male', 'Liverpool UK', '2023-04-30 05:48:31', '2023-04-30 06:13:47', 'IMG-20211101-WA0003.jpg'),
(4, 'Test Noheemot', 'Noheemot', 'noheemot@gmail.com', '123', 8051727497, 'Female', 'Akobo GRA Ibadan', '2023-04-30 05:49:22', '2023-04-30 06:15:00', 'IMG-20210728-WA0020.jpg'),
(5, 'Test Gabriel', 'Gabriel', 'gabriel@gmail.com', '123', 9133808000, 'Male', 'Ajegunle Apapa Lagos', '2023-04-30 05:50:11', '2023-04-30 06:15:54', '1657862468463.jpg'),
(6, 'Test Moses', 'Moses', 'moses@gmail.com', '123', 9133808000, 'Male', 'Bariga Shomolu Lagos', '2023-04-30 05:53:54', '2023-04-30 06:06:02', 'FB_IMG_16293929448898181.jpg');

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
  `ID` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `userimage` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `CreationDate` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`ID`, `name`, `lastname`, `UserName`, `email`, `sex`, `Password`, `mobile`, `details`, `userimage`, `status`, `CreationDate`) VALUES
(10, 'Adeyemo', 'Yusuff', 'B j', 'adeyemoyusuff@gmail.com', 'Male', '123', '07085081559', '', 'IMG_0292.JPG', '0', '2022-11-14 14:46:29.113836'),
(11, 'Kehinde', 'Opeyemi', 'Fawaz', 'muller@gmail.com', 'Male', '123', '07085081559', '', '1659206304399.jpg', '0', '2023-04-29 22:19:45.638201');

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
  ADD PRIMARY KEY (`ID`);

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `tblholiday`
--
ALTER TABLE `tblholiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblsets`
--
ALTER TABLE `tblsets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblstaffs`
--
ALTER TABLE `tblstaffs`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbltime`
--
ALTER TABLE `tbltime`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
