-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 11, 2012 at 10:13 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tester_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `tester_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `click_answer`
--

CREATE TABLE IF NOT EXISTS `click_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(40) NOT NULL,
  `click_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `click_answer`
--

INSERT INTO `click_answer` (`id`, `answer`, `click_id`, `student_id`) VALUES
(26, 'odg3', 4, 1),
(27, 'Миле Јанев', 10, 1),
(28, 'книга', 11, 1),
(29, 'Дете', 12, 1),
(30, 'Програмер', 13, 1),
(31, 'Прв', 15, 1),
(32, 'Прв', 14, 1),
(33, 'Втор', 18, 1),
(34, 'Втор', 17, 1),
(35, 'Прв', 19, 1),
(36, 'Втор', 16, 1),
(37, 'Миле Јанев', 10, 2),
(38, 'оди', 11, 2),
(39, 'Дете', 12, 2),
(40, 'Програмер', 13, 2),
(41, 'Прв', 14, 2),
(42, 'Втор', 15, 2),
(43, 'Втор', 16, 2),
(44, 'Втор', 17, 2),
(45, 'Втор', 18, 2),
(46, 'Прв', 19, 2);

-- --------------------------------------------------------

--
-- Table structure for table `click_question`
--

CREATE TABLE IF NOT EXISTS `click_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer1` varchar(256) NOT NULL,
  `answer2` varchar(256) NOT NULL,
  `answer3` varchar(256) NOT NULL,
  `correct` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `click_question`
--

INSERT INTO `click_question` (`id`, `test_id`, `question`, `answer1`, `answer2`, `answer3`, `correct`) VALUES
(4, 2, 'Prvo tocen 2', 'odg1', 'odg2', 'odg3', 'answer2'),
(5, 16, 'dsfds', 'fsfasdf', 'da', 'dsfsdf', 'answer2'),
(6, 2, 'Prasanje 1 точен 2', 'дсад', 'дсад', 'дсад', 'answer2'),
(7, 17, 'садасд', 'дсадсад', 'садсад', 'сад', 'answer3'),
(8, 2, 'асдасд', 'садасдасд', 'асдасд', 'сад', 'answer1'),
(9, 18, 'vcxv', 'xcvxcv', 'xvxv', 'xvxc', 'answer1'),
(10, 21, 'Kако е правилно:', 'Миле Јанев', 'Миле', 'Јанев', 'answer1'),
(11, 21, 'Кој збор е именка', 'книга', 'оди', 'пее', 'answer1'),
(12, 21, 'Кој збор е придавка?', 'Маса', 'Дете', 'Убав', 'answer3'),
(13, 21, 'Кој збор е придавка второ прашање?', 'Цреша', 'Зелен', 'Програмер', 'answer2'),
(14, 21, 'Точен одговор е вториот?', 'Прв', 'Втор', 'Трет', 'answer2'),
(15, 21, 'Точен одговор е првиот?', 'Прв', 'Втор', 'Трет', 'answer1'),
(16, 21, 'Точен одговор е третиот?', 'Прв', 'Втор', 'Трет', 'answer3'),
(17, 21, 'Точен одговор е вториот?', 'Прв', 'Втор', 'Трет', 'answer2'),
(18, 21, 'Точен одговор е третиот?', 'Прв', 'Втор', 'Трет', 'answer3'),
(19, 21, 'Точен е првиот', 'Прв', 'Втор', 'Трет', 'answer1');

-- --------------------------------------------------------

--
-- Table structure for table `complete_answer`
--

CREATE TABLE IF NOT EXISTS `complete_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` text NOT NULL,
  `complete_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `complete_answer`
--

INSERT INTO `complete_answer` (`id`, `answer`, `complete_id`, `student_id`) VALUES
(1, 'dsfsdf', 12, 1),
(2, 'sadasd', 8, 1),
(3, 'јсјдс', 14, 1),
(4, 'сдксдјкф', 15, 1),
(5, 'дкфјкдсјкфл', 16, 1),
(6, 'дјсфкјдкслф', 17, 1),
(7, 'дкјфклсдф', 18, 1),
(8, 'sdfsdf', 14, 2),
(9, 'weqwe', 15, 2),
(10, 'sdfsd', 16, 2),
(11, 'dg''', 17, 2),
(12, 'gf', 18, 2);

-- --------------------------------------------------------

--
-- Table structure for table `complete_question`
--

CREATE TABLE IF NOT EXISTS `complete_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `correct` text NOT NULL,
  `test_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `complete_question`
--

INSERT INTO `complete_question` (`id`, `question`, `correct`, `test_id`) VALUES
(1, 'cvbnm', 'xcvbnm', 4),
(2, 'df', 'fd', 4),
(3, 'sfet', 'reter', 4),
(4, 'Predsalfkdjксдјфкдјкф', 'дјфкјслфк\r\n', 4),
(5, 'сдафгхјкл', 'сдфгхј', 4),
(6, 'дфгхј', 'сдфгхј', 4),
(7, 'jkl;', 'fg', 2),
(8, '23', 'y', 2),
(9, 'ghjhg', 'jkyuiii', 2),
(10, 'ghjh', 'gjkjjk', 2),
(11, 'ghjgjkj', 'uiouoi', 2),
(12, 'gfhgj', 'hgjhgj', 1),
(13, 'hgfgh', 'fghfgh', 19),
(14, 'Прво прашање?', 'Прв одговор', 21),
(15, 'Второ прашање?', 'Втор одговор', 21),
(16, 'Трето прашање', 'Трет одговор', 21),
(17, 'Четврто прашање?', 'Четврт одговор', 21),
(18, 'Петто прашање', 'Петти одговор', 21);

-- --------------------------------------------------------

--
-- Table structure for table `complete_reply`
--

CREATE TABLE IF NOT EXISTS `complete_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `complete_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fill_answer`
--

CREATE TABLE IF NOT EXISTS `fill_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(256) NOT NULL,
  `fill_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `fill_answer`
--

INSERT INTO `fill_answer` (`id`, `answer`, `fill_id`, `student_id`) VALUES
(1, 'sd', 11, 1),
(2, 'r', 18, 1),
(3, 'mile', 17, 1),
(4, 'прашање', 22, 1),
(5, 'prasanje', 23, 1),
(6, 'recenicata', 24, 1),
(7, 'прашањето', 25, 1),
(8, 'садсадасд', 26, 1),
(9, 'sdsfs', 22, 2),
(10, 'dsfdsf', 23, 2),
(11, 'sdfsdf', 24, 2),
(12, 'dfsf', 25, 2),
(13, 'fdsf', 26, 2);

-- --------------------------------------------------------

--
-- Table structure for table `fill_question`
--

CREATE TABLE IF NOT EXISTS `fill_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `correct` varchar(256) NOT NULL,
  `test_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `fill_question`
--

INSERT INTO `fill_question` (`id`, `question`, `correct`, `test_id`) VALUES
(1, 'Koj e овој', 'Јас сум', 4),
(2, 'dfgh', 'dfghj', 4),
(3, 'dfghjkl;', 'sdfghjkl', 4),
(4, 'sdfg', 'sdfg', 4),
(5, 'sdfg', 'sdfghjkl', 4),
(6, 'asdfgh', 'xcv', 4),
(7, 'дфгх', 'дфгхј', 4),
(8, 'сдфгхј', 'фгхјк', 4),
(9, 'гфхјк', 'фгхјк', 4),
(10, 'гф', 'хгф', 4),
(11, 'df', 'fgd', 2),
(12, 'ghfgh', 'jhgj', 2),
(13, 'fk', 'kj', 2),
(14, 'jhkhgk', 'jk', 2),
(15, 'jhkgh', 'jkhjkhjk', 2),
(16, 'fdgfhgfh', 'ghfghfgh', 1),
(17, 'hgkj', 'hkhk', 1),
(18, 'jhkhjk', 'hjkhjk', 1),
(19, 'sdfg', 'fgdg', 19),
(20, 'ghg', 'dfghj', 19),
(21, 'gfhfgh', 'gfhgfh', 19),
(22, 'Моето ________ е следното?', 'прашање', 21),
(23, 'Кој е точниот _________ ?', 'одговор', 21),
(24, 'Дополни ја _____ ?', 'реченицата', 21),
(25, 'Постави го ____ ?', 'прашањето', 21),
(26, 'Ова е последно прашање од типот _____ ?', 'дополнување', 21);

-- --------------------------------------------------------

--
-- Table structure for table `fill_reply`
--

CREATE TABLE IF NOT EXISTS `fill_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fill_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `index` varchar(40) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `username`, `password`, `index`, `firstname`, `lastname`) VALUES
(1, 'student', '204036a1ef6e7360e536300ea78c6aeb4a9333dd', '', '', ''),
(2, 'mile', '6436f9f55f989763ee799cc23c99a8561b48051e', '10419', 'Mile', 'Janev');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `code` varchar(40) NOT NULL,
  `tester_id` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `click_num` int(11) NOT NULL,
  `fill_num` int(11) NOT NULL,
  `complete_num` int(11) NOT NULL,
  `average_grade` double NOT NULL DEFAULT '1',
  `checked` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `title`, `code`, `tester_id`, `start`, `end`, `click_num`, `fill_num`, `complete_num`, `average_grade`, `checked`) VALUES
(1, 'Prv', 'sifra', 1, '2012-08-19 00:32:01', '2012-08-19 02:44:15', 1, 77, 9, 1, 0),
(2, 'Test broj 2', 'sifra numero dos', 2, '2012-08-19 00:57:45', '2012-08-29 00:41:16', 5, 8, 10, 1, 0),
(3, 'Prv ekts', 'sifra', 2, '2012-08-30 03:45:25', '2012-08-29 05:22:34', 10, 5, 5, 1, 0),
(4, 'sdfg', 'dfg', 2, '2012-08-20 00:00:00', '2012-08-20 00:00:00', 10, 5, 5, 1, 0),
(5, 'dsfdsfsd', 'sdfghj', 2, '2012-08-20 00:00:00', '2012-08-20 00:00:00', 10, 5, 5, 1, 0),
(6, 'x', 'v', 1, '2012-08-20 00:00:00', '2012-08-20 00:00:00', 10, 5, 5, 1, 0),
(7, 'j', 'k', 2, '2012-08-20 00:00:00', '2012-08-20 00:00:00', 10, 5, 5, 1, 0),
(8, 'Ekts1', 'sifra', 2, '2012-08-20 00:00:00', '2012-08-20 00:00:00', 10, 5, 5, 1, 0),
(9, 'Ekts2', 'sifra', 2, '2012-08-20 00:00:00', '2012-08-20 00:00:00', 10, 5, 5, 1, 0),
(10, 'sdfgh', 'asdfgh', 1, '2012-08-20 00:00:00', '2012-08-20 00:00:00', 10, 5, 5, 1, 0),
(11, 'dsfg', 'fghjk', 2, '2012-08-20 00:00:00', '2012-08-20 00:00:00', 10, 5, 5, 1, 0),
(12, 'sadfgh', 'fghjk', 1, '2012-08-20 00:00:00', '2012-08-20 00:00:00', 10, 5, 5, 1, 0),
(13, 'ewr', 'ret', 1, '2012-08-20 00:00:00', '2012-08-20 00:00:00', 2, 3, 1, 1, 0),
(14, 'sdadf', 'cx', 1, '2012-08-28 05:30:00', '2012-08-20 00:00:00', 10, 1, 1, 1, 0),
(15, 'dsfdsfsdf', 'fdsfsdf', 1, '2012-08-20 00:00:00', '2012-08-20 00:00:00', 10, 5, 5, 1, 0),
(16, 'sadasd', 'sadasd', 1, '2012-08-20 00:00:00', '2012-08-20 00:00:00', 10, 5, 5, 1, 0),
(17, 'Prv', '8cade69a9bc7a8f6b2d9f36e1191a394b9957f9e', 1, '2012-08-21 00:00:00', '2012-08-21 00:00:00', 3, 2, 1, 1, 0),
(18, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 2, '2012-08-25 00:00:00', '2012-08-25 00:00:00', 2, 2, 1, 1, 0),
(19, 'Suzana', '482eeadaec2d26512f7323ab4f0804b887fe0acd', 2, '2012-08-25 00:00:00', '2012-08-25 00:00:00', 2, 3, 1, 1, 0),
(20, 'cvc', 'baf93c3394f2642163697372d36ba3d5fc3c8702', 2, '2012-08-26 00:00:00', '2012-08-26 00:00:00', 15, 0, 0, 1, 0),
(21, 'Македонски јазик 8 одделение', '66e582d1e66e7ee807dbd48db251fb8c0a5baaff', 2, '2012-09-30 12:00:00', '2012-09-30 14:00:00', 10, 5, 5, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tester`
--

CREATE TABLE IF NOT EXISTS `tester` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `institution` varchar(256) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `isadmin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tester`
--

INSERT INTO `tester` (`id`, `username`, `password`, `institution`, `firstname`, `lastname`, `isadmin`) VALUES
(1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Факултет', 'Миле', 'Јанев', 1),
(2, 'tester', 'ab4d8d2a5f480a137067da17100271cd176607a1', 'Мигникс', 'Јанев', 'Миле', 0);

-- --------------------------------------------------------

--
-- Table structure for table `test_student`
--

CREATE TABLE IF NOT EXISTS `test_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `grade` int(11) NOT NULL DEFAULT '1',
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `test_student`
--

INSERT INTO `test_student` (`id`, `test_id`, `student_id`, `points`, `grade`, `checked`) VALUES
(1, 14, 1, 0, 1, 0),
(2, 17, 1, 0, 1, 0),
(3, 15, 1, 0, 1, 0),
(4, 1, 1, 0, 1, 0),
(5, 5, 2, 0, 1, 0),
(6, 12, 2, 0, 1, 0),
(7, 6, 1, 0, 1, 0),
(8, 19, 1, 0, 1, 0),
(9, 2, 1, 0, 1, 0),
(10, 21, 1, 0, 1, 0),
(11, 21, 2, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE IF NOT EXISTS `tutorial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `location` varchar(256) NOT NULL,
  `explination` text NOT NULL,
  `test_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
