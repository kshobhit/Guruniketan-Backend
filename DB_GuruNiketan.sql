-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 26, 2017 at 01:59 AM
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
  `user_name` varchar(220) NOT NULL,
  `user_pwd` varchar(40) NOT NULL,
  `activated` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_login`
--

INSERT INTO `table_login` (`reg_id`, `reg_type`, `user_email`, `user_name`, `user_pwd`, `activated`) VALUES
(58, 'teacher', 'sharmashobhit009@gmail.com', '', 'c33b970daa5de8f69feef9b649b96fdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `table_payment`
--

CREATE TABLE IF NOT EXISTS `table_payment` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `user_name` varchar(220) NOT NULL,
  `user_dob` date NOT NULL,
  `user_qualification` varchar(220) NOT NULL,
  `user_experience_years` int(11) NOT NULL,
  `user_experience_months` int(11) NOT NULL,
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
  `user_gfname` varchar(255) NOT NULL,
  `user_gmname` varchar(255) NOT NULL,
  `user_glname` varchar(255) NOT NULL,
  `user_board` enum('CBSE','ICSE') NOT NULL,
  `user_class` enum('IX','X','XI','XII') NOT NULL,
  `user_city` varchar(15) NOT NULL,
  `user_state` varchar(15) NOT NULL,
  `user_country` varchar(15) NOT NULL,
  `user_pincode` int(6) NOT NULL,
  `activated` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_registration`
--

INSERT INTO `table_registration` (`reg_id`, `oauth_provider`, `oauth_uid`, `reg_type`, `user_email`, `user_name`, `user_dob`, `user_qualification`, `user_experience_years`, `user_experience_months`, `user_gender`, `user_locale`, `user_picture_url`, `user_profile_url`, `created`, `modified`, `user_pwd`, `user_contact`, `user_fname`, `user_mname`, `user_lname`, `user_gfname`, `user_gmname`, `user_glname`, `user_board`, `user_class`, `user_city`, `user_state`, `user_country`, `user_pincode`, `activated`) VALUES
(99, '', '', 'student', 'shobhit.kumar2410@gmail.com', '', '1970-01-01', '', 0, 0, 'male', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'c33b970daa5de8f69feef9b649b96fdf', 1234567891, 'john', 'k', 'duda', 'mahesh', 'w', 'pandey', 'CBSE', 'IX', 'karolbagh', 'andra', 'India', 300400, 1),
(106, '', '', 'teacher', 'sharmashobhit009@gmail.com', '', '0000-00-00', '', 0, 0, NULL, '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'c33b970daa5de8f69feef9b649b96fdf', 0, '', '', '', '', '', '', 'CBSE', 'IX', '', '', '', 0, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE IF NOT EXISTS `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `reg_id` int(10) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `reg_id`, `created`) VALUES
(36, '1212323518289bec4f6ba3b7fc6c2f', 86, '2017-03-25'),
(37, 'd67a13c946252b12bd45114e3cfeb5', 90, '2017-03-25'),
(38, '19fa5bf2c97893bf289923b3eb8f41', 92, '2017-03-25'),
(39, '32de241c90a1e7dfcad4e4f0c75a19', 93, '2017-03-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_login`
--
ALTER TABLE `table_login`
  ADD PRIMARY KEY (`reg_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `table_payment`
--
ALTER TABLE `table_payment`
  ADD PRIMARY KEY (`payment_id`);

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
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_login`
--
ALTER TABLE `table_login`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `table_payment`
--
ALTER TABLE `table_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `table_registration`
--
ALTER TABLE `table_registration`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `table_student`
--
ALTER TABLE `table_student`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `table_teacher`
--
ALTER TABLE `table_teacher`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
