-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2020 at 09:15 PM
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
-- Creation: May 28, 2020 at 07:11 PM
--

CREATE TABLE `organization`
(
  `org_id` int
(5) NOT NULL,
  `name` varchar
(30) NOT NULL,
  `description` varchar
(50) NOT NULL,
  `logo` varchar
(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `organization`:
--

-- --------------------------------------------------------

--
-- Table structure for table `review`
--
-- Creation: May 28, 2020 at 07:00 PM
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
(15) NOT NULL,
  `description` varchar
(500) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `review`:
--   `user_id`
--       `user` -> `user_id`
--   `org_id`
--       `organization` -> `org_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
-- Creation: May 28, 2020 at 06:03 PM
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
-- RELATIONSHIPS FOR TABLE `user`:
--

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--
-- Creation: May 28, 2020 at 07:04 PM
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
-- RELATIONSHIPS FOR TABLE `vote`:
--   `org_id`
--       `organization` -> `org_id`
--   `user_id`
--       `user` -> `user_id`
--

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
(5) NOT NULL AUTO_INCREMENT;

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
(5) NOT NULL AUTO_INCREMENT;

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


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table organization
--

--
-- Metadata for table review
--

--
-- Metadata for table user
--

--
-- Metadata for table vote
--

--
-- Metadata for database orgreview
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
