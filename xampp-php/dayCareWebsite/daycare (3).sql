-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 20, 2020 at 10:57 AM
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
  `teacher3` varchar(255) DEFAULT NULL,
  `aboutClass` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`SN`, `classID`, `className`, `noOfKids`, `teacher1`, `teacher2`, `teacher3`, `aboutClass`) VALUES
(1, 1, 'MariGold', '50', 'Kofi Mensah', 'Esi Mansa', '', 'Baby of age 6 month to 1 year. Something more about them'),
(2, 2, 'Morning Glory', '46', 'Esi Adu', 'Kwaku Badu', 'Ama Esoun', 'Ages of 1 to 2 years kids. Something more to make it beatiful'),
(3, 3, 'Love', '15', 'Kofi Mensah', 'Esi Mansa', 'Ama Esoun', 'This class takes baby of age 2 to 3 years old. And many more things about them');

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
(2, 'Second Coming Event', '2020-03-01', '07:00', '12:00', 'School Premises'),
(3, 'Valentine Day ', '2020-02-14', '15:00', '18:00', 'School Premises'),
(4, 'March Past', '2020-03-06', '06:00', '12:00', 'Amanhene Park'),
(5, 'Chocolate Day', '2020-02-14', '09:00', '12:00', 'School Premises'),
(6, 'Easter Friday', '2020-04-10', '06:00', '18:00', 'Holiday'),
(7, 'Easter Sunday', '2020-04-12', '06:00', '18:00', 'Holiday'),
(8, 'Match Pass Rehearsal ', '2020-03-05', '08:00', '10:00', 'School Premises');

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
(21, 'gallery/2020_02_03_09_28_IMG_1567.JPG.JPG', 'Orange Day', 1, 'February 13, 2020'),
(22, 'gallery/IMG_0815.JPG.JPG', 'Kids Learning ', 5, 'March 05, 2020'),
(23, 'gallery/2020_02_03_10_40_IMG_1619.JPG.JPG', 'playing boy', 3, 'March 05, 2020'),
(24, 'gallery/IMG_0440.JPG.JPG', 'trying Singing', 4, 'March 05, 2020');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `shortName` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `mobileNumber` varchar(255) NOT NULL,
  `picture` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `fullName`, `email`, `shortName`, `department`, `mobileNumber`, `picture`) VALUES
(4, 'Anthony Ankomah', 'tonyankomah1@gmail.com', 'Sir Tony', '6', '0540731665', 'images/staffs/Anthony Ankomah.JPG'),
(5, 'Michael Acheampong', 'ache@gmail.com', 'Wonsano', 'Secretary', '+233540731665', 'images/staffs/Michael Acheampong.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `mobile_number`, `user_type`, `password`, `picture`) VALUES
(1, 'Anthony Ankomah', 'admin', 'tonyankomah1@gmail.com', '0540731665', 'Admin', 'ddc5f5e86d2f85e1b1ff763aff13ce0a', 'images/usersadmin.jpg'),
(2, 'Micheal Acheampong', 'won', 'ache@gmail.com', '0206646949', 'Admin', '7b63d1cafe15e5edab88a8e81de794b5', 'images/users/won.jpeg');

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
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
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
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gallary`
--
ALTER TABLE `gallary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
