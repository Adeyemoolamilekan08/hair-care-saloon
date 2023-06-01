-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2023 at 02:19 AM
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
  `adminId` int(10) NOT NULL,
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

INSERT INTO `tbladmin` (`adminId`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `adminimage`) VALUES
(1, 'AdeyemoOlamilekan1', 'Adeyemo', 7898799798, 'adeyemoolamilekan08@gmail.com', 'ade', '2019-07-25 06:21:50', 'sheu faruk.jpg');

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
  `Assign` varchar(250) NOT NULL,
  `ApplyDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `RemarkDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblappointment`
--

INSERT INTO `tblappointment` (`ID`, `AptNumber`, `Name`, `Email`, `PhoneNumber`, `AptDate`, `AptTime`, `Staffs`, `Services`, `Month`, `Cost`, `payment_method`, `Assign`, `ApplyDate`, `Remark`, `Status`, `RemarkDate`) VALUES
(106, '586291715', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-11-14', '14:00', 'Babalola', 'Deluxe Menicure', 'Nov', '1200', 'Array', '', '2022-11-14 23:42:46', 'bad', '2', '2023-05-03 20:59:11'),
(107, '994777846', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-11-15', '13:00', 'Lolade', 'Normal Menicure', 'Nov', '15000', 'Array', '', '2022-11-15 22:12:12', 'Thief', '2', '2023-05-03 20:59:30'),
(108, '282518865', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-11-15', '14:00', 'Jumoke', 'Deluxe Pedicure', 'Nov', '2000', 'Array', '1', '2022-11-15 22:12:29', 'Good', '1', '2023-05-05 18:20:39'),
(109, '350974744', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-11-17', '14:00', 'Jumoke', 'Deluxe Pedicure', 'Nov', '2000', 'pay_online', '', '2022-11-17 19:35:04', 'Alaye', '2', '2023-05-03 20:59:54'),
(110, '104109686', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-11-17', '14:00', 'Lolade', 'Normal Menicure', 'Nov', '15000', 'pay_offline', '', '2022-11-17 19:35:21', 'oLOSHO', '2', '2023-05-03 21:03:57'),
(111, '372943955', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-11-18', '16:00', 'Jumoke', 'Deluxe Pedicure', 'Nov', '2000', 'pay_offline', '', '2022-11-18 16:24:33', '', '', '2022-11-18 16:24:33'),
(112, '160757658', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-11-19', '15:00', 'Lolade', 'Normal Menicure', 'Nov', '15000', 'pay_online', '', '2022-11-18 16:31:40', '', '', '2022-11-18 16:31:40'),
(113, '655834255', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-11-20', '09:00', 'Shuaib', 'Body Spa', 'Nov', '1000', 'pay_online', '', '2022-11-18 16:37:26', '', '', '2022-11-18 16:37:26'),
(114, '727758116', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-11-21', '16:00', 'Lolade', 'Normal Menicure', 'Nov', '15000', 'pay_offline', '', '2022-11-18 16:43:59', '', '', '2022-11-18 16:43:59'),
(115, '791287886', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-11-18', '15:00', 'Olaide', 'Barbing', 'Nov', '15000', 'pay_offline', '', '2022-11-18 17:12:51', '', '', '2022-11-18 17:12:51'),
(116, '906663510', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-11-18', '13:00', 'Olaide', 'Barbing', 'Nov', '15000', 'pay_online', '', '2022-11-18 17:13:27', 'accept', '1', '2023-05-03 23:32:28'),
(117, '235831164', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-11-26', '13:00', 'Bolaji', 'Normal Pedicure', 'Nov', '1200', 'pay_offline', '', '2022-11-24 00:08:43', 'Sorry!!', '2', '2023-04-30 06:03:51'),
(118, '424607395', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2022-12-16', '12:00', 'Olaide', 'Barbing', 'Dec', '15000', 'pay_online', '1', '2022-12-16 19:23:06', 'Approved', '1', '2023-05-05 18:36:00'),
(119, '681436047', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2023-04-29', '18:00', 'Salah', 'Body Spa', 'Apr', '1000', 'pay_offline', '', '2023-04-30 06:48:00', '', '', '2023-04-30 06:48:00'),
(121, '807239909', 'Adeyemo Olamilekan', 'adeyemofarooq@gmail.com', 7086464732, '2023-05-01', '10:00', '', 'Pedicure', 'May', '1200', 'pay_offline', '', '2023-05-01 18:01:48', 'sdfghjkl', '1', '2023-05-03 23:33:03'),
(122, '782698618', 'Adeyemo Olamilekan', 'adeyemofarooq@gmail.com', 7053788836, '2023-05-01', '10:00', 'Noheemot', 'Charcol Facial', 'May', '5000', 'pay_offline', '', '2023-05-01 18:03:44', '', '', '2023-05-01 18:03:44'),
(123, '253197450', 'Adeyemo Olamilekan', 'muhyideenmujibat@gmail.com', 7053788836, '2023-06-11', '14:00', 'Blessing', 'Pedicure', 'May', '1200', 'pay_offline', '', '2023-05-01 18:08:33', '', '', '2023-05-01 18:08:33'),
(124, '236034286', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2023-05-01', '14:00', 'Noheemot', 'Charcol Facial', 'May', '5000', 'pay_offline', '', '2023-05-01 18:10:48', '', '', '2023-05-01 18:10:48'),
(125, '326301543', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2023-05-27', '12:00', 'Blessing', 'Pedicure', 'May', '1200', 'pay_online', '', '2023-05-01 18:12:21', '', '', '2023-05-01 18:12:21'),
(126, '747654934', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2023-05-28', '14:00', 'Noheemot', 'Charcol Facial', 'May', '5000', 'pay_online', '', '2023-05-01 18:15:29', '', '', '2023-05-01 18:15:29'),
(127, '339313177', 'Olamide Baddo', 'badoo@gmail.com', 803066016, '2023-05-07', '15:00', 'Gabriel', 'Barbing', 'May', '500', 'pay_online', '', '2023-05-01 18:32:30', '', '', '2023-05-01 18:32:30'),
(128, '923860400', 'Testing 	Outside', 'testing@test.com', 7053788836, '2023-05-07', '16:00', 'Moses', 'Rebonding', 'May', '800', 'pay_offline', '', '2023-05-01 18:35:01', '', '', '2023-05-01 18:35:01'),
(129, '161686493', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2023-05-08', '14:00', 'Salah', 'Body Spa', 'May', '1000', 'pay_online', '', '2023-05-01 18:44:05', '', '', '2023-05-01 18:44:05'),
(130, '635158335', 'B j', 'adeyemoyusuff@gmail.com', 7085081559, '2023-05-09', '10:00', 'Moses', 'Rebonding', 'May', '800', 'pay_offline', '', '2023-05-01 18:46:09', '', '', '2023-05-01 18:46:09'),
(131, '907015434', 'Coding', 'coding@gmail.com', 7053788836, '2023-05-08', '18:00', 'Gabriel', 'Barbing', 'May', '500', 'pay_offline', '', '2023-05-01 18:47:59', '', '', '2023-05-01 18:47:59'),
(132, '805174605', 'Sheriff', 'sheriff@gmail.com', 7065342748, '2023-05-04', '16:00', 'Lolade', 'Menicure', 'May', '2000', 'pay_offline', '', '2023-05-01 19:12:59', '', '', '2023-05-01 19:12:59'),
(133, '961993069', 'bayo', 'bayo@gmail.com', 8123456789, '2023-05-27', '12:00', 'Lolade', 'Menicure', 'May', '2000', 'pay_offline', '', '2023-05-01 20:33:44', '', '', '2023-05-01 20:33:44'),
(134, '539206886', 'Fawaz', 'muller@gmail.com', 7085081559, '2023-05-20', '16:00', 'Noheemot', 'Charcol Facial', 'May', '5000', 'pay_offline', '9', '2023-05-01 20:36:30', 'okay', '1', '2023-05-03 23:53:08'),
(135, '239266940', 'Fawaz', 'muller@gmail.com', 7085081559, '2023-05-18', '14:00', 'Salah', 'Body Spa', 'May', '1000', 'pay_offline', '1', '2023-05-01 20:50:07', 'tired', '2', '2023-05-03 23:49:35'),
(136, '627636061', 'Fateemah', 'fateemah@gmail.com', 70432782378, '2023-05-17', '14:00', 'Lolade', 'Menicure', 'May', '2000', 'pay_offline', '', '2023-05-01 20:53:11', '', '', '2023-05-01 20:53:11'),
(137, '663800190', 'Fateemah', 'fateemah@gmail.com', 70432782378, '2023-05-12', '17:00', 'Moses', 'Rebonding', 'May', '800', 'pay_offline', '', '2023-05-01 20:54:42', '', '', '2023-05-01 20:54:42'),
(138, '474014097', 'Fateemah', 'fateemah@gmail.com', 70432782378, '2023-05-11', '15:00', 'Noheemot', 'Charcol Facial', 'May', '5000', 'pay_offline', '', '2023-05-01 20:56:40', '', '', '2023-05-01 20:56:40'),
(139, '917093592', 'Fateemah', 'fateemah@gmail.com', 70432782378, '2023-05-09', '16:00', 'Gabriel', 'Barbing', 'May', '500', 'pay_offline', '', '2023-05-01 20:58:05', '', '', '2023-05-01 20:58:05'),
(140, '911331212', 'Adeyemo', 'Rachelclinton123@gmail.com', 9123456778, '2023-05-07', '18:00', 'Gabriel', 'Barbing', 'May', '500', 'pay_offline', '1', '2023-05-08 05:20:22', 'sunday', '1', '2023-05-08 05:43:53');

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
(19, 10, 7, 919502813, '2022-12-16 19:25:57'),
(20, 11, 5, 894997360, '2023-05-03 21:15:30'),
(21, 11, 3, 297286067, '2023-05-03 21:16:24'),
(22, 11, 4, 866237612, '2023-05-03 21:23:50'),
(23, 11, 4, 283492614, '2023-05-03 21:24:03'),
(24, 11, 4, 207309578, '2023-05-03 23:27:24'),
(25, 11, 4, 628479739, '2023-05-03 23:32:03'),
(26, 11, 2, 224745510, '2023-05-03 23:33:15'),
(27, 11, 3, 804900425, '2023-05-03 23:56:56'),
(28, 11, 2, 412520084, '2023-05-03 23:59:17'),
(29, 11, 3, 987849161, '2023-05-04 00:09:58'),
(30, 0, 3, 487966379, '2023-05-05 18:20:39'),
(31, 0, 5, 869426253, '2023-05-05 18:36:00'),
(32, 0, 5, 947377325, '2023-05-08 05:43:53'),
(33, 0, 2, 127337037, '2023-05-31 20:35:47');

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
(1, 'Lolade', 'Menicure', 2000, '2023-04-30 05:40:54', '3', '2023-05-01'),
(2, 'Blessing', 'Pedicure', 1200, '2023-04-30 05:41:15', '5', '2023-05-01'),
(3, 'Salah', 'Body Spa', 1000, '2023-04-30 05:41:41', '3', '2023-05-01'),
(4, 'Noheemot', 'Charcol Facial', 5000, '2023-04-30 05:42:24', '5', '2023-05-01'),
(5, 'Gabriel', 'Barbing', 500, '2023-04-30 05:43:05', '4', '2023-05-08'),
(6, 'Moses', 'Rebonding', 800, '2023-04-30 05:43:43', '3', '2023-05-01');

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
  `staffId` int(10) NOT NULL,
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

INSERT INTO `tblstaffs` (`staffId`, `Name`, `UserName`, `Email`, `Password`, `MobileNumber`, `Gender`, `Details`, `CreationDate`, `UpdationDate`, `staffimage`) VALUES
(1, 'AdeyemoOlamilekan', 'Adeyemo', 'adeyemoolamilekan08@gmail.com', 'adeone', 7898799798, 'Female', 'No,4 Airport Alakia Ibadan', '2023-04-30 05:46:13', '2023-05-19 21:01:28', ''),
(2, 'Test Blessing', 'Blessing', 'blessing@gmail.com', '123', 8051727497, 'Male', 'No,43 Idanre Oke-Aro GarageAkure', '2023-04-30 05:47:30', '2023-04-30 06:11:54', 'FB_IMG_16248275009624170.jpg'),
(3, 'Test Salah', 'Salah', 'salah@gmail.com', '123', 9133808000, 'Male', 'Liverpool UK', '2023-04-30 05:48:31', '2023-04-30 06:13:47', 'IMG-20211101-WA0003.jpg'),
(4, 'NoheemotAnike', 'Noheemot', 'noheemot@gmail.com', '1234', 8051727497, 'Female', 'Akobo GRA Ibadan', '2023-04-30 05:49:22', '2023-05-30 07:11:04', 'IMG-20210728-WA0020.jpg'),
(5, 'Test Gabriel', 'Gabriel', 'gabriel@gmail.com', '123', 9133808000, 'Male', 'Ajegunle Apapa Lagos', '2023-04-30 05:50:11', '2023-04-30 06:15:54', '1657862468463.jpg'),
(6, 'Test Moses99', 'Moses', 'moses@gmail.com', '123 ', 9133808000, 'Male', 'Bariga Shomolu Lagos', '2023-04-30 05:53:54', '2023-05-08 20:17:40', 'FB_IMG_16293929448898181.jpg');

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
  `userId` int(100) NOT NULL,
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

INSERT INTO `tblusers` (`userId`, `name`, `lastname`, `UserName`, `email`, `sex`, `Password`, `mobile`, `details`, `userimage`, `status`, `CreationDate`) VALUES
(10, 'Adeyemo', 'Yusuff', 'B j', 'adeyemoyusuff@gmail.com', 'Male', '123', '07085081559', '', 'IMG_0292.JPG', '0', '2022-11-14 14:46:29.113836'),
(11, 'Kehinde', 'Opeyemi', 'Fawaz', 'muller@gmail.com', 'Male', 'test', '007085081559', '', '1659206304399.jpg', '0', '2023-04-29 22:19:45.638201'),
(12, 'Fateemoh', 'Fcmb', 'Fateemah', 'fateemah@gmail.com', 'Female', '123', '070432782378', '', 'IMG-20220322-WA0012.jpg', '0', '2023-05-01 12:52:20.917783'),
(13, 'Adeyemo', 'Olamilekan', 'adeyemsula', 'sulaimanbaba@gmail.com', 'Male', '1234567890', '08032537141', '', 'img2.jpg', '0', '2023-05-08 11:55:31.102495'),
(14, 'Azeez', 'Azeez', 'Azeezone', 'Azeez@gmail.com', 'Female', '123', '780909568893', 'No,43 Awowo Apete zone5 Ibadan', 'patient.jpg', '0', '2023-05-17 13:06:51.969399'),
(16, 'olodo', 'olodo', 'olodo', 'muller@gmail.com', 'Female', '1234', '07085081559', '', 'patient.jpg', '0', '2023-05-19 13:11:22.400464'),
(17, 'Bello', 'Shuaib', 'BelloShuaib', 'BelloShuaib747@gmail.com', 'Male', 'ade', '07085081559', '', 'patient.jpg', '0', '2023-05-22 11:57:27.069527'),
(18, 'Adeyemo', 'Olamilekan', 'adeyemofarooq', 'AdeyemoOlamilekan81@gmail.com', 'Male', '123', '07088584647', '', 'patient.jpg', '0', '2023-05-22 11:58:53.444824'),
(19, 'Adeyemo', 'Olamilekan', 'admin', 'AdeyemoOlamilekan401@gmail.com', 'Male', '123', '07085081559', '', 'patient.jpg', '0', '2023-05-22 14:02:46.836623'),
(20, 'Adeyemo', 'Olamilekan', 'Mohammed', 'AdeyemoOlamilekan202@gmail.com', 'female', '123', '07085081559', '', 'patient.jpg', '0', '2023-05-23 13:50:08.856534'),
(21, 'Ade', 'Bayo', 'Faruk', 'faruk@gmail.com', 'male', '123', '07085081559', '', 'patient.jpg', '0', '2023-05-23 14:17:05.415732'),
(22, 'AdeyemoOla', 'Olamilekan', 'BelloShuaib', 'wasiusamad123@gmail.com', 'male', '1234', '007085081559', '', 'alone.jpg', '0', '2023-05-23 14:24:31.330489'),
(23, 'Adeyemo', 'Olamilekan', 'adeyemofarooq', 'AdeyemoOlamilekan129@gmail.com', 'male', '123', '070432782378', '', 'patient.jpg', '0', '2023-05-23 14:31:46.348515'),
(24, 'bello', 'Shuaib', 'BelloShuaib', 'Rachelclinton123@gmail.com', 'female', '123', '07088584647', '', 'patient.jpg', '0', '2023-05-23 14:38:26.648285'),
(25, 'bello', 'Shuaib', 'BelloShuaib', 'belloShuaib924@gmail.com', 'male', '123', '07088584647', '', 'patient.jpg', '0', '2023-05-23 14:39:18.840472'),
(26, 'Adeyemo', 'Olamilekanpoj', 'adeyemojllo', 'abdulmalijkk@gmail.com', 'male', '123', '07085081559', '', 'patient.jpg', '0', '2023-05-23 14:44:17.756378'),
(27, 'Adeyemo', 'Olamilekan', 'adeyemo', 'abdulmalilkjk@gmail.com', 'Male', '123', '07085081559', '', 'patient.jpg', '0', '2023-05-24 00:51:21.947700'),
(28, 'Adeyemo', 'Olamilekan', 'adeyemofarooq', 'AdeyemoOlamilekan193@gmail.com', '', '123', '07085081559', '', 'patient.jpg', '0', '2023-05-25 07:57:07.178553');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`adminId`);

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
  ADD PRIMARY KEY (`staffId`);

--
-- Indexes for table `tbltime`
--
ALTER TABLE `tbltime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `adminId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblappointment`
--
ALTER TABLE `tblappointment`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `tblholiday`
--
ALTER TABLE `tblholiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblsets`
--
ALTER TABLE `tblsets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblstaffs`
--
ALTER TABLE `tblstaffs`
  MODIFY `staffId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbltime`
--
ALTER TABLE `tbltime`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `userId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
