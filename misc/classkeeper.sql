-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2014 at 07:19 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `classkeeper`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `totalstudents` int(11) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `routine` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `classhistory`
--

CREATE TABLE IF NOT EXISTS `classhistory` (
  `date` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `present` tinyint(1) NOT NULL,
  `nostudents` int(11) NOT NULL,
  `totalstudents` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `read` tinyint(1) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `scheduleinfo`
--

CREATE TABLE IF NOT EXISTS `scheduleinfo` (
  `id` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `teachercancel` tinyint(1) NOT NULL,
  `substituteid` int(11) NOT NULL,
  `attended` tinyint(1) NOT NULL,
  `nostudents` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `hid` int(11) NOT NULL DEFAULT '0',
  `totalclasses` int(11) NOT NULL,
  `lastrefresh` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `name`, `hid`, `totalclasses`, `lastrefresh`) VALUES
(43, 'Pulchowk Campus', 0, 3, '2014-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` tinyint(4) NOT NULL,
  `school_id` int(11) NOT NULL DEFAULT '0',
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `remember_token` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `school_id`, `username`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 2, 0, 'admin', '$2y$10$6NyXvFeSXrJ7tChKusi9oeowTJVSSOHclae3gSx65QeMAAjTjLEyC', '2014-06-27 17:24:18', '2014-06-28 03:31:39', 'H2zCtSgW2A9d2sSjIA14hEvtj19lxIp3mz7JZO1qwqXs43WDp6Jc3JNNNo32');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
