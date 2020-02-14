-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 14, 2020 at 01:27 AM
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
-- Database: `daycare`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `SN` int(11) NOT NULL,
  `classID` int(11) NOT NULL,
  `className` varchar(255) NOT NULL,
  `noOfKids` varchar(255) NOT NULL,
  `teacher1` varchar(255) NOT NULL,
  `teacher2` varchar(255) DEFAULT NULL,
  `teacher3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`SN`, `classID`, `className`, `noOfKids`, `teacher1`, `teacher2`, `teacher3`) VALUES
(1, 1, 'MariGold', '50', 'Kofi Mensah', 'Esi Mansa', ''),
(2, 2, 'Morning Glory', '46', 'Esi Adu', 'Kwaku Badu', 'Ama Esoun');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event` varchar(255) NOT NULL,
  `eventDate` varchar(255) NOT NULL,
  `startTime` varchar(255) NOT NULL,
  `endTime` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event`, `eventDate`, `startTime`, `endTime`, `location`) VALUES
(1, 'Upcoming Event', '2020-02-29', '15:00', '18:00', 'School Premises'),
(2, 'Second Coming Event', '2020-02-07', '07:00', '12:00', 'School Premises'),
(3, 'Valentine Day ', '2020-02-14', '15:00', '18:00', 'School Premises'),
(4, 'March Past', '2020-03-06', '06:00', '12:00', 'Amanhene Park'),
(5, 'Chocolate Day', '2020-02-14', '09:00', '12:00', 'School Premises');

-- --------------------------------------------------------

--
-- Table structure for table `gallary`
--

CREATE TABLE `gallary` (
  `id` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `classPic` int(11) NOT NULL,
  `datePosted` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallary`
--

INSERT INTO `gallary` (`id`, `picture`, `about`, `classPic`, `datePosted`) VALUES
(12, 'gallery/motivators.JPG.JPG', 'playing boy', 5, 'Feb 04, 2020'),
(13, 'gallery/morning-glory.JPG.JPG', 'Kids in learning', 2, 'February 04, 2020'),
(15, 'gallery/motivators.JPG.JPG', 'Kids in learning in their various class. Bring your kid to be part of the Motivators', 5, 'February 04, 2020'),
(17, 'gallery/DSC_0259.JPG.JPG', 'Wellbeing Kids Christmas Celebration', 6, 'February 10, 2020'),
(18, 'gallery/DSC_0029.JPG.JPG', 'Wellbeing Kids Christmas Celebration. Culture time', 6, 'February 10, 2020'),
(19, 'gallery/DSC_0098.JPG.JPG', '', 1, 'February 10, 2020'),
(20, 'gallery/2020_02_03_09_28_IMG_1566.JPG.JPG', 'Orange Day', 6, 'February 13, 2020'),
(21, 'gallery/2020_02_03_09_28_IMG_1567.JPG.JPG', 'Orange Day', 1, 'February 13, 2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`SN`),
  ADD UNIQUE KEY `classID` (`classID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallary`
--
ALTER TABLE `gallary`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gallary`
--
ALTER TABLE `gallary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
