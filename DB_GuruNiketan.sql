-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 22, 2017 at 08:14 PM
-- Server version: 5.6.31-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DB_GuruNiketan`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_login`
--

CREATE TABLE IF NOT EXISTS `table_login` (
  `reg_id` int(11) NOT NULL,
  `reg_type` varchar(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pwd` varchar(40) NOT NULL,
  `activated` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_login`
--

INSERT INTO `table_login` (`reg_id`, `reg_type`, `user_email`, `user_pwd`, `activated`) VALUES
(2, 'student', 'ankush@gmail.com', '544894d3b1f5b4ed3ebebc3c0a59bc25', 1),
(3, 'teacher', 'shobhit.kumar2410@gmail.com', '544894d3b1f5b4ed3ebebc3c0a59bc25', 1),
(19, 'teacher', 'sharmashobhit009@gmail.com', '544894d3b1f5b4ed3ebebc3c0a59bc25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_registration`
--

CREATE TABLE IF NOT EXISTS `table_registration` (
  `reg_id` int(11) NOT NULL,
  `oauth_provider` varchar(255) NOT NULL,
  `oauth_uid` varchar(255) NOT NULL,
  `reg_type` varchar(50) NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_gender` varchar(10) DEFAULT NULL,
  `user_locale` varchar(10) NOT NULL,
  `user_picture_url` varchar(255) NOT NULL,
  `user_profile_url` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `user_contact` int(11) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_mname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `user_city` varchar(15) NOT NULL,
  `user_state` varchar(15) NOT NULL,
  `user_country` varchar(15) NOT NULL,
  `user_pincode` int(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_registration`
--

INSERT INTO `table_registration` (`reg_id`, `oauth_provider`, `oauth_uid`, `reg_type`, `user_email`, `user_gender`, `user_locale`, `user_picture_url`, `user_profile_url`, `created`, `modified`, `user_pwd`, `user_contact`, `user_fname`, `user_mname`, `user_lname`, `user_city`, `user_state`, `user_country`, `user_pincode`) VALUES
(25, 'facebook', '766415446859712', '', NULL, 'male', 'en_US', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/14102438_670698349764756_7480895332098720964_n.jpg?oh=a7936984a0e843a302124021de0ca4ff&oe=5927A7E9', 'https://www.facebook.com/766415446859712', '2017-02-22 01:29:42', '2017-02-22 01:29:42', '', 0, 'Chandu', '', 'Sharma', '', '', '', 0),
(26, 'google', '116471558643742500803', '', 'shobhit.kumar2410@gmail.com', 'male', 'en', 'https://lh6.googleusercontent.com/-4tAwSZlj6bA/AAAAAAAAAAI/AAAAAAAAAXQ/zYhy4hoNRFU/photo.jpg', 'https://plus.google.com/116471558643742500803', '2017-02-21 20:00:05', '2017-02-21 20:00:05', '', 0, 'shobhit', '', 'kumar', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `table_student`
--

CREATE TABLE IF NOT EXISTS `table_student` (
  `reg_id` int(11) NOT NULL,
  `user_fname` varchar(20) NOT NULL,
  `user_mname` varchar(20) NOT NULL,
  `user_lname` varchar(20) NOT NULL,
  `user_dob` date NOT NULL,
  `user_gfname` varchar(20) NOT NULL,
  `user_gmname` varchar(20) NOT NULL,
  `user_glname` varchar(20) NOT NULL,
  `user_gender` varchar(20) NOT NULL,
  `user_board` enum('CBSE','ICSE') NOT NULL,
  `user_city` varchar(20) NOT NULL,
  `user_state` varchar(20) NOT NULL,
  `user_country` varchar(20) NOT NULL,
  `user_pincode` int(6) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_contact` int(11) NOT NULL,
  `user_pwd` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_student`
--

INSERT INTO `table_student` (`reg_id`, `user_fname`, `user_mname`, `user_lname`, `user_dob`, `user_gfname`, `user_gmname`, `user_glname`, `user_gender`, `user_board`, `user_city`, `user_state`, `user_country`, `user_pincode`, `user_email`, `user_contact`, `user_pwd`) VALUES
(2, 'shobhit', 'k', 'sharma', '1970-01-01', 'robin', 'w', 'p', 'male', 'ICSE', 'patna', 'bihar', 'India', 803101, '', 989989876, '6a55719e502675d579d7082213be0d26'),
(3, 'shobhit', 'k', 'sharma', '1970-01-01', 'robin', 'w', 'p', 'male', 'ICSE', 'patna', 'bihar', 'India', 803101, '', 989989876, '6a55719e502675d579d7082213be0d26');

-- --------------------------------------------------------

--
-- Table structure for table `table_teacher`
--

CREATE TABLE IF NOT EXISTS `table_teacher` (
  `reg_id` int(11) NOT NULL,
  `user_fname` varchar(20) NOT NULL,
  `user_mname` varchar(20) NOT NULL,
  `user_lname` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `user_qualification` varchar(20) NOT NULL,
  `user_experience_years` int(2) NOT NULL,
  `user_experience_months` int(2) NOT NULL,
  `user_board` enum('CBSE','ICSE') NOT NULL,
  `user_class` enum('IX','X','XI','XII') NOT NULL,
  `user_city` varchar(20) NOT NULL,
  `user_state` varchar(20) NOT NULL,
  `user_country` varchar(20) NOT NULL,
  `user_pincode` int(8) NOT NULL,
  `user_contact` varchar(11) NOT NULL,
  `user_pwd` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_teacher`
--

INSERT INTO `table_teacher` (`reg_id`, `user_fname`, `user_mname`, `user_lname`, `DOB`, `user_qualification`, `user_experience_years`, `user_experience_months`, `user_board`, `user_class`, `user_city`, `user_state`, `user_country`, `user_pincode`, `user_contact`, `user_pwd`) VALUES
(16, 'shobhit', 'k', 'sharma', '1970-01-01', 'PHD', 8, 4, 'ICSE', 'XI', 'hyderabad', 'andra', 'India', 300100, '98765432', '544894d3b1f5b4ed3ebebc3c0a59bc25'),
(17, 'shobhit', 'k', 'sharma', '1970-01-01', 'PHD', 8, 4, 'ICSE', 'XI', 'hyderabad', 'andra', 'India', 300100, '98765432', '544894d3b1f5b4ed3ebebc3c0a59bc25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_login`
--
ALTER TABLE `table_login`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `table_registration`
--
ALTER TABLE `table_registration`
  ADD PRIMARY KEY (`reg_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `table_student`
--
ALTER TABLE `table_student`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `table_teacher`
--
ALTER TABLE `table_teacher`
  ADD PRIMARY KEY (`reg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_login`
--
ALTER TABLE `table_login`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `table_registration`
--
ALTER TABLE `table_registration`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `table_student`
--
ALTER TABLE `table_student`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `table_teacher`
--
ALTER TABLE `table_teacher`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
