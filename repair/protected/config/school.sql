-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 09, 2015 at 09:33 
-- Server version: 5.5.31
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school`
--
CREATE DATABASE IF NOT EXISTS `school` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `school`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `balance` double NOT NULL DEFAULT '0',
  `lastpayment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT 'School Fees',
  `student_id` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`balance`, `lastpayment`, `id`, `name`, `student_id`) VALUES
(121, '2015-09-02 20:57:11', 1, 'School Fees', 'S123456G');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE IF NOT EXISTS `assets` (
  `name` varchar(255) NOT NULL,
  `acquired_on` date NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE IF NOT EXISTS `charges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `period` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('a','i','','') NOT NULL,
  `amount` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`id`, `period`, `description`, `status`, `amount`, `date`, `name`) VALUES
(1, 'Term', 'School fees.', 'a', 350, '2015-04-14 18:54:10', 'School Fees'),
(2, 'Once', 'School trip t Vic Falls.', 'a', 500, '2015-04-14 18:54:10', 'School Trip-Vic Falls');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `name` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`name`, `id`) VALUES
('1 East', 1),
('1 West', 2),
('1 South', 3),
('1 North', 4),
('2 East', 5),
('2 West', 6),
('2 North', 7),
('2 South', 8),
('3 Green', 9),
('3 Yellow', 10),
('3 Red', 11),
('3 Pink', 12),
('4 Green', 13),
('4 Red', 14),
('4 Pink', 15),
('4 Yellow', 16),
('Lower Six Sciences', 17),
('Lower Six Commercials', 18),
('Lower Six Arts', 19),
('Upper Six Sciences', 20),
('Upper Six Commercials', 21),
('Upper Six Arts', 22);

-- --------------------------------------------------------

--
-- Table structure for table `class_teacher`
--

CREATE TABLE IF NOT EXISTS `class_teacher` (
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `class_teacher`
--

INSERT INTO `class_teacher` (`class_id`, `teacher_id`, `id`) VALUES
(1, 3, 3),
(0, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `message` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `student_id` varchar(20) NOT NULL,
  `amount` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `employee_id` int(20) NOT NULL,
  `charge_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`student_id`, `amount`, `date`, `employee_id`, `charge_id`, `id`) VALUES
('s123456g ', 89, '2015-04-14 19:51:01', 1, 1, 11),
('s123456g ', 78, '2015-04-14 20:21:50', 1, 1, 12),
('S123456G ', 78, '2015-04-14 20:23:44', 1, 1, 13),
('S123456G ', 78, '2015-04-14 20:28:40', 1, 1, 14),
('S123456G ', 200, '2015-04-14 20:30:06', 1, 1, 15),
('S123456G ', 54, '2015-09-02 20:57:11', 1, 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `class` varchar(30) NOT NULL,
  `subject` varchar(40) NOT NULL,
  `mark` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `name`, `class`, `subject`, `mark`) VALUES
(1, 'Delon Savanhu', '3 Pink', 'ggggg', 67),
(2, 'Delon Savanhu', '3 Pink', 'ggggg', 56),
(3, 'Delon Savanhu', '3 Pink', 'hhhh', 45),
(4, 'Delon Savanhu', '3 Pink', 'ffffff', 44),
(5, 'Delon Savanhu', '3 Pink', 'bbbb', 33),
(6, 'Delon Savanhu', '3 Pink', 'bbb', 89),
(7, 'Delon Savanhu', '3 Pink', 'ghh', 34);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `subject_id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `mark` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `period` varchar(20) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `comments` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `class` varchar(30) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `dob` varchar(255) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `surname`, `class`, `id`, `parent`, `phone`, `email`, `address`, `dob`, `student_id`) VALUES
('Delon', 'Savanhu', '3 Pink', 1, 'Rosie Savanhu', '0773553319', 'delon.savanhu@yahoo.com', '15706 71st Close', '23 October 2011', 'S123456G'),
('Mesai', 'Musa', '3 Pink', 2, 'Arthur', 'Musara', 'addlight@shanya.com', 'dsds sdcd sdcsdc', '7 March 2001', 'C38553T');

-- --------------------------------------------------------

--
-- Table structure for table `student_tracking`
--

CREATE TABLE IF NOT EXISTS `student_tracking` (
  `student_id` varchar(20) NOT NULL,
  `texts` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE IF NOT EXISTS `system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT 'Demo High School',
  `logo` varchar(255) NOT NULL DEFAULT 'assets/images/logo.jpg',
  `location` varchar(255) NOT NULL DEFAULT 'Harare',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`id`, `name`, `logo`, `location`) VALUES
(1, 'Computer Hubb', 'assets/images/logo.jpg', 'Harare');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `title` varchar(4) NOT NULL,
  `ecnumber` varchar(15) NOT NULL,
  `startdate` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `dob`, `address`, `title`, `ecnumber`, `startdate`) VALUES
(1, 'Tatenda Mushove', '8 April 1978', '123 Magamba Way.', 'Mr', '67SF55', '7 March 2009'),
(2, 'Neal Caffrey', '7 October 2007', '15706 71st Close ', 'Mr', '6767FFG', '6 April 2012'),
(3, 'nnnn', '2015/04/21 23:16', 'xxxxxxx', 'mr', 'gggg', '2015/04/21 23:16'),
(4, 'Deedza Musvove', '1991/03/12 00:00', '123 Magamba Way', 'Mr', 'T56RFD', '1993/07/24 00:00'),
(5, 'Tatenda Masvaya', '1991/03/19 00:00', 'nnnnnnnnnnnnnnnnn', 'Mr.', '67GH78J', '1995/02/12 00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'assets/img/profile.png',
  `role` varchar(255) NOT NULL DEFAULT 'Administrator',
  `lastlogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `email`, `id`, `password`, `image`, `role`, `lastlogin`) VALUES
('delon', 'delon@local.com', 1, 'delon', 'assets/img/profile.png', 'Administrator', '2015-09-02 20:52:00'),
('Tatenda Masvaya', '67GH78J', 3, '199167GH78J', 'assets/img/profile.png', 'Teacher', '2015-04-23 21:48:58');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
