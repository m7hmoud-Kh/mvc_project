-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2021 at 02:17 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc_porject`
--

-- --------------------------------------------------------

--
-- Table structure for table `categor`
--

CREATE TABLE `categor` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(11) CHARACTER SET utf8 NOT NULL,
  `cat_status` int(11) NOT NULL DEFAULT 0,
  `cat_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(11) NOT NULL,
  `com_details` varchar(255) NOT NULL,
  `com_date` varchar(55) NOT NULL,
  `com_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `com_not`
--

CREATE TABLE `com_not` (
  `com_not_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `com_status_not` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `meg_not`
--

CREATE TABLE `meg_not` (
  `meg_not_id` int(11) NOT NULL,
  `meg_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `meg_not_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `meg_id` int(11) NOT NULL,
  `meg_details` varchar(255) NOT NULL,
  `meg_status` int(11) NOT NULL DEFAULT 0,
  `meg_date` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(50) NOT NULL,
  `post_details` text NOT NULL,
  `post_tag` varchar(255) NOT NULL,
  `post_status` int(11) NOT NULL,
  `post_photo` varchar(255) NOT NULL,
  `post_views` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_date` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `re_id` int(11) NOT NULL,
  `re_details` varchar(255) NOT NULL,
  `meg_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `re_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_frist` varchar(50) CHARACTER SET utf8 NOT NULL,
  `user_last` varchar(50) CHARACTER SET utf8 NOT NULL,
  `user_img` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `user_email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_pass` varchar(55) CHARACTER SET utf8 NOT NULL,
  `user_regist` int(11) NOT NULL DEFAULT 0,
  `user_date_on` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categor`
--
ALTER TABLE `categor`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `com_not`
--
ALTER TABLE `com_not`
  ADD PRIMARY KEY (`com_not_id`);

--
-- Indexes for table `meg_not`
--
ALTER TABLE `meg_not`
  ADD PRIMARY KEY (`meg_not_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`meg_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`re_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categor`
--
ALTER TABLE `categor`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `com_not`
--
ALTER TABLE `com_not`
  MODIFY `com_not_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meg_not`
--
ALTER TABLE `meg_not`
  MODIFY `meg_not_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `meg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `re_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
