-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 12, 2015 at 09:55 
-- Server version: 5.5.31
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `repair`
--
CREATE DATABASE IF NOT EXISTS `repair` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `repair`;

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
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'images/demo.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `created`, `price`, `description`, `image`) VALUES
(1, 'Lenovo idea', '2015-09-30 00:53:54', 0.78, 'Lorem ipsum dolor sit amet, consul ignota facilisis usu eu, vix ne omittantur dissentiunt. Elit facilis liberavisse vix eu, te atomorum expetendis mei. Mea nullam disputando delicatissimi eu. Solet alienum vim at, errem ponderum qualisque in qui. Per rebum hendrerit et, ut eos debet putant persecuti, nec quas reque audire ad. Per te elit eruditi oportere, no natum apeirian conclusionemque has.\r\n\r\nQuot labores volumus vix in. Pro in senserit vituperatoribus. Aeque dissentias cotidieque usu no, vix ex magna utamur epicuri. Ex nec legere ornatus, ne erroribus efficiendi vis, et platonem delicata hendrerit mea. Dico mediocrem theophrastus cum cu. Pro primis oblique vivendo ex.', 'images/demo.jpg'),
(2, 'Morphine', '2015-09-30 01:04:01', 0.9, 'Lorem ipsum dolor sit amet, consul ignota facilisis usu eu, vix ne omittantur dissentiunt. Elit facilis liberavisse vix eu, te atomorum expetendis mei. Mea nullam disputando delicatissimi eu. Solet alienum vim at, errem ponderum qualisque in qui. Per rebum hendrerit et, ut eos debet putant persecuti, nec quas reque audire ad. Per te elit eruditi oportere, no natum apeirian conclusionemque has.\r\n\r\nQuot labores volumus vix in. Pro in senserit vituperatoribus. Aeque dissentias cotidieque usu no, vix ex magna utamur epicuri. Ex nec legere ornatus, ne erroribus efficiendi vis, et platonem delicata hendrerit mea. Dico mediocrem theophrastus cum cu. Pro primis oblique vivendo ex.', 'images/demo.jpg');

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
-- Table structure for table `response`
--

CREATE TABLE IF NOT EXISTS `response` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `tid` int(11) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`id`, `name`, `tid`, `text`) VALUES
(1, 'Technician', 10, 'Lorem ipsum dolor sit amet, adolescens quaerendum duo et, hinc altera pericula ne vim, saepe eripuit qui ut. Qui eros saperet eligendi at, eos cu mazim saperet. Ut errem dolores mei. Cum eu eripuit consulatu, an eum aeque saepe cetero. In movet evertitur nec. Eos tation nostrum platonem ne, ne has stet consul, suas invenire nec ea. Ad duo autem diceret adversarium. Electram rationibus nec te, vim ea vitae consequuntur, dolorem mnesarchum per cu. At primis ullamcorper his, ut omnesque argumentum inciderint eos. Eum luptatum invenire et, eius oportere mediocritatem vix in. Ex mea iisque fastidii maiestatis. Dico ubique duo ne, ei vis ferri dicit populo.'),
(2, 'Technician', 10, 'kkkkkkkkkkk jjjjjjjjjjjjjjjjj'),
(3, '0773553310', 10, 'japan amateur '),
(4, 'Technician', 10, 'ygi uig iiuhiggi u');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `name`, `description`, `status`, `created`, `phone`) VALUES
(8, 'Delon Savanhu', 'Lorem ipsum dolor sit amet, adolescens quaerendum duo et, hinc altera pericula ne vim, saepe eripuit qui ut. Qui eros saperet eligendi at, eos cu mazim saperet. Ut errem dolores mei. Cum eu eripuit consulatu, an eum aeque saepe cetero. In movet evertitur nec.\r\n\r\nEos tation nostrum platonem ne, ne has stet consul, suas invenire nec ea. Ad duo autem diceret adversarium. Electram rationibus nec te, vim ea vitae consequuntur, dolorem mnesarchum per cu. At primis ullamcorper his, ut omnesque argumentum inciderint eos. Eum luptatum invenire et, eius oportere mediocritatem vix in. Ex mea iisque fastidii maiestatis. Dico ubique duo ne, ei vis ferri dicit populo.', 'Done', '2015-09-30 21:03:43', '0773553310'),
(19, 'John Gore', 'HTML Tutorial\r\nCSS Tutorial\r\nJavaScript Tutorial\r\nSQL Tutorial\r\nPHP Tutorial\r\njQuery Tutorial\r\nBootstrap Tutorial\r\nAngular Tutorial\r\nASP.NET Tutorial\r\nXML Tutorial\r\nTop 10 References\r\n\r\nHTML Reference\r\nCSS Reference\r\nJavaScript Reference\r\nBrowser Statistics\r\nHTML DOM\r\nPHP Reference\r\njQuery Reference\r\nHTML Colors\r\nHTML Character Sets\r\nXML Reference\r\nTop 10 Examples\r\n\r\nHTML Examples\r\nCSS Examples\r\nJavaScript Examples\r\nHTML DOM Examples\r\nPHP Examples\r\njQuery Examples\r\nXML Examples\r\nASP Examples\r\nSVG Examples\r\nWeb Certificates\r\n\r\nHTML Certificate\r\nHTML5 Certificate\r\nCSS Certificate\r\nJavaScript Certificate\r\njQuery Certificate\r\nPHP Certificate\r\nBootstrap Certificate\r\nXML Certificate\r\n', 'Pending', '2015-10-03 21:10:12', '0773442211'),
(22, 'Richard Castle', 'HTML Tutorial\r\nCSS Tutorial\r\nJavaScript Tutorial\r\nSQL Tutorial\r\nPHP Tutorial\r\njQuery Tutorial\r\nBootstrap Tutorial\r\nAngular Tutorial\r\nASP.NET Tutorial\r\nXML Tutorial\r\nTop 10 References\r\n\r\nHTML Reference\r\nCSS Reference\r\nJavaScript Reference\r\nBrowser Statistics\r\nHTML DOM\r\nPHP Reference\r\njQuery Reference\r\nHTML Colors\r\nHTML Character Sets\r\nXML Reference\r\nTop 10 Examples\r\n\r\nHTML Examples\r\nCSS Examples\r\nJavaScript Examples\r\nHTML DOM Examples\r\nPHP Examples\r\njQuery Examples\r\nXML Examples\r\nASP Examples\r\nSVG Examples\r\nWeb Certificates\r\n\r\nHTML Certificate\r\nHTML5 Certificate\r\nCSS Certificate\r\nJavaScript Certificate\r\njQuery Certificate\r\nPHP Certificate\r\nBootstrap Certificate\r\nXML Certificate\r\n', 'Pending', '2015-10-03 21:27:58', '0773445566'),
(27, 'Agnes M', 'HTML Tutorial\r\nCSS Tutorial\r\nJavaScript Tutorial\r\nSQL Tutorial\r\nPHP Tutorial\r\njQuery Tutorial\r\nBootstrap Tutorial\r\nAngular Tutorial\r\nASP.NET Tutorial\r\nXML Tutorial\r\nTop 10 References\r\n\r\nHTML Reference\r\nCSS Reference\r\nJavaScript Reference\r\nBrowser Statistics\r\nHTML DOM\r\nPHP Reference\r\njQuery Reference\r\nHTML Colors\r\nHTML Character Sets\r\nXML Reference\r\nTop 10 Examples\r\n\r\nHTML Examples\r\nCSS Examples\r\nJavaScript Examples\r\nHTML DOM Examples\r\nPHP Examples\r\njQuery Examples\r\nXML Examples\r\nASP Examples\r\nSVG Examples\r\nWeb Certificates\r\n\r\nHTML Certificate\r\nHTML5 Certificate\r\nCSS Certificate\r\nJavaScript Certificate\r\njQuery Certificate\r\nPHP Certificate\r\nBootstrap Certificate\r\nXML Certificate\r\n', 'Done', '2015-10-03 21:49:47', '0773553319'),
(28, 'Takesure Mhonde', '/opt/lampp/htdocs/repair', 'Pending', '2015-10-03 22:10:34', '0773553315'),
(29, 'Archie Chete', 'HTML Tutorial\r\nCSS Tutorial\r\nJavaScript Tutorial\r\nSQL Tutorial\r\nPHP Tutorial\r\njQuery Tutorial\r\nBootstrap Tutorial\r\nAngular Tutorial\r\nASP.NET Tutorial\r\nXML Tutorial\r\nTop 10 References\r\n\r\nHTML Reference\r\nCSS Reference\r\nJavaScript Reference\r\nBrowser Statistics\r\nHTML DOM\r\nPHP Reference\r\njQuery Reference\r\nHTML Colors\r\nHTML Character Sets\r\nXML Reference\r\nTop 10 Examples\r\n\r\nHTML Examples\r\nCSS Examples\r\nJavaScript Examples\r\nHTML DOM Examples\r\nPHP Examples\r\njQuery Examples\r\nXML Examples\r\nASP Examples\r\nSVG Examples\r\nWeb Certificates\r\n\r\nHTML Certificate\r\nHTML5 Certificate\r\nCSS Certificate\r\nJavaScript Certificate\r\njQuery Certificate\r\nPHP Certificate\r\nBootstrap Certificate\r\nXML Certificate\r\n', 'Done', '2015-10-03 22:19:58', '0733123456'),
(30, 'CLIVE', 'Mukuvisi River\r\nPheasant Road\r\nLooe Lane\r\nCrane Crescent\r\nWren Lane\r\nGlencoe Road\r\nHilside Road\r\nRobert Drive\r\nGeorge Drive\r\nEconet Park Road\r\nGreendale Avenue\r\nRobert Mugabe Road\r\nRhodesville Avenue\r\nNorwich Avenue\r\nBoston Avenue\r\nAirdrie Road\r\nRhodesville Road\r\nTweed Road\r\nPoley Avenue\r\nRay Amm Road\r\nMac Arthur Road\r\nSaint Luke''s Road', 'Done', '2015-10-04 14:19:12', '0771222333');

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
(1, 'Litegel Technologies', 'assets/images/logo.png', 'Harare');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(20) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `number`, `text`) VALUES
(8, '888777666', 'ajar-next-please-'),
(9, '0773553310', 'tmd'),
(10, '0773553310', 'tmd delon@deedza.p ');

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
('delon', 'delon@local.com', 1, 'delon', 'assets/img/profile.png', 'Administrator', '2015-10-06 13:39:15'),
('Tatenda Masvaya', '67GH78J', 3, '199167GH78J', 'assets/img/profile.png', 'Teacher', '2015-04-23 21:48:58');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
