-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 01:19 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT
= 0;
START TRANSACTION;
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orgreview`
--
CREATE DATABASE
IF NOT EXISTS `orgreview` DEFAULT CHARACTER
SET utf8mb4
COLLATE utf8mb4_general_ci;
USE `orgreview`;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization`
(
  `org_id` int
(5) NOT NULL,
  `name` varchar
(30) NOT NULL,
  `description` varchar
(250) NOT NULL,
  `logo` varchar
(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`
org_id`,
`name
`, `description`, `logo`) VALUES
(1, 'TestOrg1', 'Provides logistics and security to their clients, set up long-term teams to build rapport.', 'logo1.png'),
(2, 'TestOrg2', 'Doesn\'t do anything, this isn\'t a real organization and is just filler for now. But imagine the possibilities!', 'logo2.png'),
(3, 'TestOrg3', 'A pharmaceutical company from NE Asia that focuses on finding cures to infectious diseases.', 'logo3.png');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review`
(
  `review_id` int
(5) NOT NULL,
  `user_id` int
(5) NOT NULL,
  `org_id` int
(5) NOT NULL,
  `title` varchar
(25) NOT NULL,
  `description` varchar
(2000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp
() ON
UPDATE current_timestamp()
) ENGINE
=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user`
(
  `user_id` int
(5) NOT NULL,
  `fname` char
(20) NOT NULL,
  `lname` char
(20) NOT NULL,
  `username` varchar
(40) NOT NULL,
  `email` varchar
(40) NOT NULL,
  `password` varchar
(128) NOT NULL,
  `verification` tinyint
(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user`
  (`user_id`, `fname
`, `lname`, `username`, `email`, `password`, `verification`) VALUES
(1, 'test', 'test', 'tester', 'test@test.com', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote`
(
  `vote_id` tinyint
(1) NOT NULL,
  `org_id` int
(5) NOT NULL,
  `user_id` int
(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
ADD PRIMARY KEY
(`org_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
ADD PRIMARY KEY
(`review_id`),
ADD KEY `user_id`
(`user_id`),
ADD KEY `org_id`
(`org_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
ADD PRIMARY KEY
(`user_id`),
ADD UNIQUE KEY `username`
(`username`),
ADD UNIQUE KEY `email`
(`email`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
ADD PRIMARY KEY
(`vote_id`),
ADD KEY `org_id`
(`org_id`),
ADD KEY `user_id`
(`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `org_id` int
(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int
(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int
(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review`
--
ALTER TABLE `review`
ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY
(`user_id`) REFERENCES `user`
(`user_id`),
ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY
(`org_id`) REFERENCES `organization`
(`org_id`);

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY
(`org_id`) REFERENCES `organization`
(`org_id`),
ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY
(`user_id`) REFERENCES `user`
(`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
