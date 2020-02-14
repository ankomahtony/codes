-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 13, 2019 at 08:53 PM
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
-- Database: `exeat_card`
--

-- --------------------------------------------------------

--
-- Table structure for table `exeat`
--

CREATE TABLE `exeat` (
  `id` int(11) NOT NULL,
  `name_of_student` varchar(200) NOT NULL,
  `current_class` varchar(20) NOT NULL,
  `date_of_issue` varchar(100) NOT NULL,
  `type_of_exeat` varchar(20) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `guardian` varchar(120) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `issuer` varchar(200) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `date_of_returning` varchar(100) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `date_returned` varchar(20) NOT NULL,
  `time_returned` varchar(20) NOT NULL,
  `confirm_by` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exeat`
--

INSERT INTO `exeat` (`id`, `name_of_student`, `current_class`, `date_of_issue`, `type_of_exeat`, `destination`, `guardian`, `contact`, `issuer`, `reason`, `date_of_returning`, `remark`, `date_returned`, `time_returned`, `confirm_by`) VALUES
(39, 'Michael Acheampong', '1sci 1', '12-11-2019  ( 18:19 PM )', 'Town Exeat', 'Goaso', 'Ankomah Anthony', '0540731665', 'Anthony Ankomah', 'To take School Fees', '2019-11-13', 'No', 'N/A', 'N/A', 'N/A'),
(40, 'Michael Acheampong', '1sci 1', '12-11-2019  ( 18:34 PM )', 'Town Exeat', 'Goaso', 'Ankomah Anthony', '0540731665', 'Anthony Ankomah', 'To take School Fees', '2019-11-13', 'No', 'N/A', 'N/A', 'N/A'),
(41, 'Michael Acheampong', '1sci 1', '12-11-2019  ( 18:35 PM )', 'Distance Exeat', 'Kumasi', 'Ankomah Anthony', '0540731665', 'Anthony Ankomah', 'To eat', '2019-11-15', 'No', 'N/A', 'N/A', 'N/A'),
(42, 'Michael Acheampong', '1sci 1', '12-11-2019  ( 18:38 PM )', 'Distance Exeat', 'Kumasi', 'Ankomah Anthony', '0540731665', 'Anthony Ankomah', 'To eat', '2019-11-15', 'No', 'N/A', 'N/A', 'N/A'),
(43, 'Michael Acheampong', '1sci 1', '12-11-2019  ( 18:43 PM )', 'Distance Exeat', 'Kumasi', 'Ankomah Anthony', '0540731665', 'Anthony Ankomah', 'To eat', '2019-11-15', 'No', 'N/A', 'N/A', 'N/A'),
(44, 'Michael Acheampong', '3 Sci 2', '12-11-2019  ( 18:58 PM )', 'Distance Exeat', 'Accra', 'Ankomah Anthony', '0540731665', 'Anthony Ankomah', 'i dont know', '2019-11-24', 'Yes', '2019-11-12', '23:49 PM', 'Anthony Ankomah'),
(45, 'Michael Acheampong', '3 Sci 2', '12-11-2019  ( 19:00 PM )', 'Distance Exeat', 'Accra', 'Ankomah Anthony', '0540731665', 'Anthony Ankomah', 'i dont know', '2019-11-24', 'No', 'N/A', 'N/A', 'N/A'),
(46, 'Kofi Apaloo', '3 Sci 2', '12-11-2019  ( 19:03 PM )', 'Town Exeat', '', 'Papa Tawiah', '+233540731665', 'Anthony Ankomah', 'tt', '2019-11-30', 'Yes', '2019-11-12', '23:38 PM', 'Anthony Ankomah'),
(47, 'Kofi Apaloo', '3 Sci 2', '12-11-2019  ( 19:03 PM )', 'Town Exeat', '', 'Papa Tawiah', '+233540731665', 'Anthony Ankomah', 'tt', '2019-11-30', 'Yes', '2019-11-12', '23:38 PM', 'Anthony Ankomah'),
(48, 'Kofi Apaloo', '3 Sci 2', '12-11-2019  ( 19:04 PM )', 'Town Exeat', '', 'Papa Tawiah', '0540731665', 'Anthony Ankomah', 'tt', '2019-11-30', 'Yes', '2019-11-12', '23:38 PM', 'Anthony Ankomah'),
(49, 'Emmanuel Boamah', 'Form 1', '12-11-2019  ( 19:07 PM )', 'Suspended', 'Kasoa', 'Papa Tawiah', '0540731665', 'Anthony Ankomah', 'Like learning', '2019-11-02', 'Yes', '2019-11-13', '20:34 PM', 'Anthony Ankomah'),
(50, 'Esi Ankomah', '2 Sci 1', '12-11-2019  ( 19:13 PM )', 'Suspended', 'Goaso', 'Papa Tawiah', '0540731665', 'Anthony Ankomah', 'Hmmm Moasem a', '2019-11-22', 'No', 'N/A', 'N/A', 'N/A'),
(51, 'Esi Ankomah', '2 Sci 1', '12-11-2019  ( 22:44 PM )', 'Suspended', 'Goaso', 'Papa Tawiah', '0540731665', 'Anthony Ankomah', 'Hmmm Moasem a', '2019-11-22', 'No', 'N/A', 'N/A', 'N/A'),
(52, 'Esi Ankomah', '2 Sci 1', '12-11-2019  ( 22:47 PM )', 'Suspended', 'Goaso', 'Papa Tawiah', '0540731665', 'Anthony Ankomah', 'Hmmm Moasem a', '2019-11-22', 'Yes', '2019-11-12', '23:31 PM', 'Anthony Ankomah'),
(53, 'Esi Ankomah', '3 Bus 1', '12-11-2019  ( 22:49 PM )', 'Suspended', 'Accra', 'Papa Tawiah', '+233540731665', 'Anthony Ankomah', 'bad boy', '2019-11-24', 'Yes', '2019-11-12', '23:32 PM', 'Anthony Ankomah'),
(54, 'Esi Ankomah', '2 Sci 1', '12-11-2019  ( 22:51 PM )', 'Suspended', 'Kumasi', 'Papa Tawiah', '0540731665', 'Anthony Ankomah', 'miok', '2019-12-01', 'Yes', '2019-11-12', '23:21 PM', 'Anthony Ankomah'),
(55, 'Anthony Ankomah', '2 Hom Sci', '13-11-2019  ( 00:00 AM )', 'Distance Exeat', 'kukurantumi', 'Michael Acheampong', '0206446949', 'Anthony Ankomah', 'To collect school fees: must return by 16 of Nov, 2019', '2019-11-16', 'Yes', '2019-11-13', '00:06 AM', 'Anthony Ankomah'),
(56, 'Kofi Apaloo', '3 Sci 2', '13-11-2019  ( 20:16 PM )', 'Distance Exeat', 'Kasoa', 'Papa Tawiah', '0206646949', 'Anthony Ankomah', 'To collect School Fees. Must returned 15 of Nov, 2019', '2019-11-15', 'No', 'N/A', 'N/A', 'N/A'),
(57, 'Kofi Apaloo', '3 Sci 2', '13-11-2019  ( 20:19 PM )', 'Distance Exeat', 'Kasoa', 'Papa Tawiah', '0206646949', 'Anthony Ankomah', 'To collect School Fees. Must returned 15 of Nov, 2019', '2019-11-15', 'Yes', '2019-11-13', '20:29 PM', 'Anthony Ankomah'),
(58, 'Anthony Ankomah', '3sci2', '13-11-2019  ( 20:25 PM )', 'Distance Exeat', 'Goaso', 'Michael Acheampong', '0206446949', 'Anthony Ankomah', 'To eat Fufu', '2019-11-15', 'No', 'N/A', 'N/A', 'N/A'),
(59, 'Anthony Ankomah', '3sci2', '13-11-2019  ( 20:27 PM )', 'Distance Exeat', 'Goaso', 'Michael Acheampong', '0206446949', 'Anthony Ankomah', 'To eat Fufu', '2019-11-15', 'No', 'N/A', 'N/A', 'N/A'),
(60, 'Michael Acheampong', '2 Sci 1', '13-11-2019  ( 20:31 PM )', 'Suspended', 'Goaso', 'Ankomah Anthony', '0540731665', 'Anthony Ankomah', 'hmmm ', '2019-11-14', 'No', 'N/A', 'N/A', 'N/A'),
(61, 'Kofi Apaloo', '3sci', '13-11-2019  ( 20:48 PM )', 'Town Exeat', 'Goaso', 'Papa Tawiah', '0206646949', 'Anthony Ankomah', 'To buy Stuffs', '2019-11-14', 'No', 'N/A', 'N/A', 'N/A'),
(62, 'Kofi Apaloo', '3sci', '13-11-2019  ( 20:50 PM )', 'Town Exeat', 'Goaso', 'Papa Tawiah', '0206646949', 'Anthony Ankomah', 'to buy things', '2019-11-14', 'No', 'N/A', 'N/A', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `author` varchar(20) NOT NULL,
  `message` varchar(500) NOT NULL,
  `receiver` varchar(20) NOT NULL,
  `msg_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `author`, `message`, `receiver`, `msg_time`) VALUES
(15, 'rich', 'kjsdknvwg njjhnsdck', 'wonsano', '10:10:23'),
(16, 'tony', 'hi me bro\r\ni mean holla bro', 'kofi', '13:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `SN` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `sch_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name_of_student` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `residential_address` varchar(100) NOT NULL,
  `town` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `program_of_study` varchar(50) NOT NULL,
  `year_admitted` varchar(10) NOT NULL,
  `house_affiliation` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `emergency_contact_name` varchar(100) NOT NULL,
  `emergency_contact_1` varchar(100) NOT NULL,
  `emergency_contact_2` varchar(100) NOT NULL,
  `student_photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`SN`, `sid`, `sch_id`, `id`, `name_of_student`, `gender`, `dob`, `residential_address`, `town`, `region`, `class`, `program_of_study`, `year_admitted`, `house_affiliation`, `status`, `emergency_contact_name`, `emergency_contact_1`, `emergency_contact_2`, `student_photo`) VALUES
(1, 1, 101, 10100119, 'Anthony Ankomah', 'Male', '1993-08-04', 'Adrodanho, Pentecost Street', 'Goaso', 'Ahafo Region', 'Form 1', 'General Science', '2019', 'House 1', 'Boarding', 'Papa Tawiah', '+233540731665', '+233500648463', 'images/10100119.jpg'),
(2, 2, 101, 10100218, 'Kofi Apaloo', 'Male', '1993-01-01', 'Abrodanho, Pentecost Street', 'Goaso', 'Ahafo Region', 'Form 2', 'Business', '2018', 'House 2', 'Boarding', 'Papa Tawiah', '+233540731665', '+233500648463', 'images/10100218.png'),
(3, 3, 101, 10100319, 'Emmanuel Boamah', 'Male', '2000-12-12', 'Abrodanho, Pentecost Street', 'Goaso', 'Ahafo Region', 'Form 2', 'General Science', '2019', 'House 2', 'Boarding', 'Papa Tawiah', '+233540731665', '+233500648463', 'images/10100319.png'),
(4, 4, 101, 10100419, 'Esi Ankomah', 'Female', '1997-05-05', 'Adrodanho, Pentecost Street', 'Adum', 'Ashanti Region', 'Form 2', 'Technical', '2019', 'House 2', 'Boarding', 'Papa Tawiah', '+233540731665', '+233500648463', 'images/10100419.png'),
(5, 5, 101, 10100519, 'Isaac Amoah', 'Male', '1994-01-01', 'Adrodanho, Pentecost Street', 'Goaso', 'Ahafo Region', 'Form 1', 'General Science', '2019', 'House 2', 'Boarding', 'Ama Acheampong', '+233540731665', '+233500648463', ''),
(6, 6, 101, 10100619, 'Michael Acheampong', 'Male', '1993-08-04', 'Adrodanho, Pentecost Street', 'Goaso', 'Ahafo Region', 'Form 1', 'General Arts', '2019', 'House 1', 'Boarding', 'Ankomah Anthony', '0540731665', '0577388361', 'images/10100619.png'),
(7, 7, 101, 10100718, 'Anthony Ankomah', 'Male', '1993-08-04', 'Abrodanho, Pentecost Street', 'Goaso', 'Ahafo Region', 'Form 2', 'Home Science', '2018', 'House 1', 'Boarding', 'Michael Acheampong', '0206446949', '0577388361', 'images/10100718.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `task` varchar(500) NOT NULL,
  `author` varchar(200) NOT NULL,
  `task_time` time NOT NULL,
  `task_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task`, `author`, `task_time`, `task_date`, `status`) VALUES
(1, 'tony', 'justy', '14:33:00', '2019-10-29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `picture` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `mobile_number`, `user_type`, `password`, `picture`) VALUES
(2, 'Anthony Ankomah', 'tony', 'tonyankomah1@gmail.com', '0540731665', 'admin', 'ddc5f5e86d2f85e1b1ff763aff13ce0a', 'images/justy.jpg'),
(3, 'Micheal Acheampong', 'wonsano', 'tony1@omsda.com', '0540731665', 'user', 'ddc5f5e86d2f85e1b1ff763aff13ce0a', 'images/justy.jpg'),
(4, 'Justice Acheampong', 'justy', 'justiceach@gmail.com', '0540731665', 'user', 'ddc5f5e86d2f85e1b1ff763aff13ce0a', 'images/justy.jpg'),
(5, 'Kofi Apaloo', 'kofi', 'kofi@gmail.com', '0540731665', 'admin', 'ddc5f5e86d2f85e1b1ff763aff13ce0a', 'images/justy.jpg'),
(6, 'Richard Asamoah', 'rich', 'rich@gmail.com', '0540731665', 'admin', 'ddc5f5e86d2f85e1b1ff763aff13ce0a', 'images/rich.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exeat`
--
ALTER TABLE `exeat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
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
-- AUTO_INCREMENT for table `exeat`
--
ALTER TABLE `exeat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
