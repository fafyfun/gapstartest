-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2017 at 05:54 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 5.6.28-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `id` int(8) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permission` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `ip` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `sadmin` int(11) NOT NULL DEFAULT '0',
  `siteurl` varchar(255) NOT NULL,
  `sitename` varchar(255) NOT NULL,
  `login_attempts` int(10) NOT NULL,
  `login_attempts_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `login_attempts_ip` varchar(255) NOT NULL,
  `forget_pw_id` varchar(255) NOT NULL,
  `reset_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `company` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `showSettings` int(2) NOT NULL,
  `vision6Id` int(5) NOT NULL,
  `facebook` int(2) NOT NULL,
  `twitter` int(2) NOT NULL,
  `mailChimp` int(2) NOT NULL,
  `vision6` int(2) NOT NULL,
  `xero` int(2) NOT NULL,
  `otherservices` int(2) NOT NULL,
  `marketing_calendar` int(2) NOT NULL,
  `instagram_active` int(2) NOT NULL,
  `Vision6Sync` int(20) NOT NULL DEFAULT '0',
  `XeroSync` int(20) NOT NULL DEFAULT '0',
  `logoName` varchar(150) NOT NULL,
  `vision6_api` varchar(255) NOT NULL,
  `vision6_list` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`id`, `username`, `first_name`, `last_name`, `password`, `permission`, `email`, `date`, `ip`, `status`, `admin_id`, `sadmin`, `siteurl`, `sitename`, `login_attempts`, `login_attempts_date`, `login_attempts_ip`, `forget_pw_id`, `reset_time`, `company`, `contact`, `showSettings`, `vision6Id`, `facebook`, `twitter`, `mailChimp`, `vision6`, `xero`, `otherservices`, `marketing_calendar`, `instagram_active`, `Vision6Sync`, `XeroSync`, `logoName`, `vision6_api`, `vision6_list`) VALUES
(1, 'superadmin', 'superadmin', '', 'e10adc3949ba59abbe56e057f20f883e', 1, 'jainudeenf007@gmail.com', '2016-04-25', '', 1, 0, 1, '', '', 0, '2017-06-07 10:48:21', '123.231.15.95', '3807348412360745984', '0000-00-00 00:00:00', 'Digital Glare', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', ''),
(6, 'fawazj', 'Fawaz', 'Jainudeen', 'e10adc3949ba59abbe56e057f20f883e', 0, 'jainudeenf007@gmail.com', '2017-08-24', '123.231.11.149', 1, 2, 0, '', '', 0, '2017-12-11 04:40:56', '', '', '0000-00-00 00:00:00', 'DG', '0777303382', 1, 86, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, '', '', ''),
(21, 'fawj', 'Fawaz', 'Jainudeen', 'e10adc3949ba59abbe56e057f20f883e', 0, 'jainudeenf007@gmail.com', '2017-08-28', '123.231.11.149', 1, 2, 0, '', '', 0, '2017-11-23 04:21:36', '', '', '0000-00-00 00:00:00', 'DJ', '0777303384', 1, 88, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) NOT NULL,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instagram_data`
--

CREATE TABLE `instagram_data` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `insta_key` text NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instagram_data`
--

INSERT INTO `instagram_data` (`id`, `user_id`, `insta_key`, `user_name`, `status`) VALUES
(8, 6, '197508745.b008761.3ae1e32c5cf74f07bb701ad4c4556212', 'fafyfun', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `instagram_data`
--
ALTER TABLE `instagram_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `instagram_data`
--
ALTER TABLE `instagram_data`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
