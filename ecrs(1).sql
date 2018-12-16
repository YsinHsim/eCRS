-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2018 at 06:22 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `room_num` varchar(12) NOT NULL,
  `stu_id` varchar(6) DEFAULT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`room_num`, `stu_id`, `status`) VALUES
('SP 1101 A', '0004', 'Occupied'),
('SP 1101 B', NULL, 'Reserved'),
('SP 1101 C', NULL, 'Available'),
('Sp 1101 D', NULL, 'Available'),
('SP 1102 A', NULL, 'Available'),
('SP 1102 B', NULL, 'Available'),
('SP 1102 C', NULL, 'Not Available'),
('SP 1102 D', NULL, 'Not Available'),
('SP 1103 A', NULL, 'Not Available'),
('SP 1103 B', NULL, 'Not Available'),
('SP 1103 C', NULL, 'Not Available'),
('SP 1103 D', NULL, 'Not Available'),
('SP 1104 A', NULL, 'Reserved'),
('SP 1104 B', NULL, 'Reserved'),
('SP 1104 C', NULL, 'Reserved'),
('SP 1104 D', NULL, 'Reserved'),
('SP 1201 A', NULL, 'Reserved'),
('SP 1201 B', NULL, 'Reserved');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `sta_id` varchar(10) NOT NULL,
  `sta_name` text NOT NULL,
  `sta_gender` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`sta_id`, `sta_name`, `sta_gender`, `pass`) VALUES
('0000', 'admin', 'male', '0000'),
('112', 'yasin', 'Male', '112'),
('123', 'newStaff', 'Male', '123'),
('22', 'adamko', 'Male', '22'),
('33', 'dodol', 'Female', '33'),
('staff', 'steffany', 'Female', 'staff'),
('test', 'The Absolute Administrator', 'Female', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stu_id` varchar(10) NOT NULL,
  `stu_ic` varchar(12) NOT NULL,
  `stu_name` text NOT NULL,
  `stu_gender` text NOT NULL,
  `program` text NOT NULL,
  `detail` text NOT NULL,
  `stu_report` text NOT NULL,
  `room_num` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `stu_ic`, `stu_name`, `stu_gender`, `program`, `detail`, `stu_report`, `room_num`) VALUES
('0002', '0002', 'Arif Rabani', 'Male', 'GG321', 'The Great Arch Wizard.', '', NULL),
('0003', '0003', 'Lucy Gerald', 'Female', 'BB330', 'Her father from Moscow.', 'Someone try to jump from the rooftop. So i decide to push her.  :-)', NULL),
('0004', '0004', 'Koko Hekmakyer', 'Female', 'DD333', 'Europe arm dealer.', 'How do i connect to UiTM wifi at college?', 'SP 1101 A'),
('0005', '0005', 'Vladimir Engis', 'Male', 'EE300', 'Drug addict.', '', NULL),
('0006', '0006', 'Vera', 'Female', 'CS110', '', '', NULL),
('0007', '0007', 'John', 'Male', 'AM220', '', '', NULL),
('0008', '0008', 'Houstin', 'Male', 'DC231', '', '', NULL),
('0009', '0009', 'Ravinesh', 'Male', 'CS112', '', '', NULL),
('0010', '0010', 'Farhan', 'Male', 'FG211', 'autism', '', NULL),
('test00', 'test00', 'test00', 'Male', 'CC000', '', '', NULL),
('test01', 'test01', 'test01', 'Male', 'CD333', '', '', NULL),
('test03', 'test03', 'test03', 'Male', 'GG111', '', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`room_num`),
  ADD UNIQUE KEY `stu_id` (`stu_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`sta_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`),
  ADD UNIQUE KEY `room_num` (`room_num`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
