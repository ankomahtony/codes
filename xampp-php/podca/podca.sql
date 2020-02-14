-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 31, 2020 at 07:45 AM
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
-- Database: `podca`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `password`) VALUES
(1, 'Anthony Ankomah', 'admin', 'longpwd');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `SN` int(11) NOT NULL,
  `seasonName` varchar(255) NOT NULL,
  `episodeNumber` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `datePosted` varchar(255) NOT NULL,
  `timePosted` varchar(255) NOT NULL,
  `audio` varchar(1000) NOT NULL,
  `picture` varchar(1000) NOT NULL,
  `content` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`SN`, `seasonName`, `episodeNumber`, `title`, `author`, `datePosted`, `timePosted`, `audio`, `picture`, `content`) VALUES
(1, 'Season1', 1, 'My First Podcast', 'Tony', '30 Jan 2020', '17:40', 'audios/Season14.mp3', 'images/Season14.jpg', 'This is about you knowing yourself. No one knows you more than you know you are you. And nothing change you, you remain you no matter what you think you are or other people think you are you are you. Get it!'),
(6, 'Season1', 2, 'I am me', 'Wonsano', '30 Jan 2020', '17:51', 'audios/Season12.mp3', 'images/Season12.jpg', 'This is about I am me. Know one knows me more than I know myself. And nothing change Me, I remain me no matter what you think am I or I think am I, I am still me. Get it!');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `sn` int(11) NOT NULL,
  `onContent` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`sn`, `onContent`, `author`, `message`) VALUES
(2, '1', 'Wonsano', 'I like your post'),
(3, '1', 'Tony', 'Thank You!');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `SN` int(11) NOT NULL,
  `blogSN` int(11) NOT NULL,
  `speaker` varchar(5000) NOT NULL,
  `message` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`SN`, `blogSN`, `speaker`, `message`) VALUES
(3, 1, 'Rich', 'hi'),
(4, 1, 'Tony', 'Hello Rich'),
(5, 1, 'Rich', 'I am very glad you are here bro'),
(6, 1, 'Tony', 'I am also Glad'),
(7, 1, 'Rich', 'Today, we will be talking about the nicest thing that happens to man who have left their wife and leaving a private life with other ladies.'),
(8, 1, 'Tony', 'The so called \"slay queens\" lol');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`SN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
