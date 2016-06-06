-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 30, 2016 at 10:40 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `im`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Idnum` varchar(30) NOT NULL,
  `Schedule` varchar(100) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Fname` varchar(30) NOT NULL,
  `Lname` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Rpassword` varchar(30) NOT NULL,
  `Phonenumber` varchar(15) NOT NULL,
  `flag` int(11) NOT NULL,
  `privilege` varchar(20) NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer` varchar(500) NOT NULL,
  PRIMARY KEY (`Idnum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Idnum`, `Schedule`, `Email`, `Fname`, `Lname`, `Username`, `Gender`, `Password`, `Rpassword`, `Phonenumber`, `flag`, `privilege`, `question`, `answer`) VALUES
('1209321', '     8:00AM-5:00PM     ', 'dsawfea@gmail.com', 'Anne', 'Bolarde', 'Annichan', 'Male', 'zxcvb', 'zxcvb', '09231432425', 1, 'Editor', '', ''),
('120994387', '        8:00AM-5:00PM        ', 'mkmcfiu@gmail.com', 'Annchan', 'Bolarde', 'Annichan', 'Female', 'zxcvb', 'ZXCVB', '09123143421', 1, 'Editor', '', ''),
('12103906', '8:30AM-5:00PM', 'dkrpdog101@yahoo.com', 'Dean', 'Polancos', 'deasj', 'Male', 'davion', 'davion', '09233766266', 1, 'Full access', '', ''),
('3412432', ' adsawds ', 'adwea@yahoo.com', 'afdawfds', 'adsawds', 'dsdawds', 'Male', 'dswadsa', 'sdawsdawd', '413453453', 2, 'Full access', '', ''),
('95325844', ' 9:00AM-5:00PM ', 'dwasd@gmail.com', 'Dean', 'Polancos', 'Dean', 'Male', 'qwert', 'qwer', '09432425', 1, 'Editor', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `courseID` varchar(30) NOT NULL,
  `courseDescription` varchar(100) NOT NULL,
  `courseStatus` varchar(100) NOT NULL,
  `courseType` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `Date_release` datetime NOT NULL,
  `category` varchar(30) NOT NULL,
  `CourseName` varchar(100) NOT NULL,
  `flag` varchar(30) NOT NULL,
  PRIMARY KEY (`courseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseID`, `courseDescription`, `courseStatus`, `courseType`, `price`, `Date_release`, `category`, `CourseName`, `flag`) VALUES
('09213', '  fweafafdsa  ', 'Regular', 'free', 20000, '2015-09-23 21:00:00', 'Deck', 'dean', '1'),
('21349', 'I don''t really know', 'Regular', 'paid', 19000, '2015-12-10 21:00:00', 'Engine', 'Marine Engineering ', '1'),
('23413', 'sdasdsf', 'regular', 'paid', 2000, '2015-12-27 09:40:44', 'dsfs', 'cisco', '1'),
('41743', 'This is the new free course for testing.', 'Regular', 'free', 4000, '2016-01-30 09:22:30', 'web', 'website developer', '1');

-- --------------------------------------------------------

--
-- Table structure for table `course_rating`
--

CREATE TABLE IF NOT EXISTS `course_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course` int(11) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `rate` int(11) NOT NULL,
  `dt_rated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `course_rating`
--

INSERT INTO `course_rating` (`id`, `course`, `ip`, `rate`, `dt_rated`) VALUES
(1, 9213, '127.0.0.1', 5, '2016-01-29 01:04:41'),
(2, 21349, '127.0.0.1', 3, '2016-01-29 01:04:58'),
(3, 9213, '127.0.0.1', 2, '2016-01-30 10:49:22'),
(4, 41743, '127.0.0.1', 3, '2016-01-30 15:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE IF NOT EXISTS `instructors` (
  `Idnum` varchar(30) NOT NULL,
  `Schedule` varchar(100) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Fname` varchar(30) NOT NULL,
  `Lname` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Rpassword` varchar(30) NOT NULL,
  `Phonenumber` varchar(15) NOT NULL,
  `flag` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer` varchar(500) NOT NULL,
  PRIMARY KEY (`Idnum`),
  UNIQUE KEY `Idnum` (`Idnum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`Idnum`, `Schedule`, `Email`, `Fname`, `Lname`, `Username`, `Gender`, `Password`, `Rpassword`, `Phonenumber`, `flag`, `question`, `answer`) VALUES
('12010889', '', 'dwasdaw@gmail.com', 'Will', 'Tui', 'WillTui', 'Male', 'Deadnako', 'deadnako', '09237403981', 2, '', ''),
('1209302', '     9:00AM-6:00PM   ', 'dsads@gmail.com', 'dsawds', 'dsawd', 'eawdswa', 'Male', 'davion', 'davion', '09183746521', 1, '', ''),
('12103906', ' 9:00AM-6:00PM ', 'dswada@gmail.com', 'Dean', 'polancos', 'deankrp', 'Male', 'john1171995', 'john1171995', '09233766266', 1, '', ''),
('12104042', '8:00AM-5:00PM', 'dhsaja@gmail.com', 'Christian', 'Pingkian', 'Christ101', 'Male', 'davion3454392', 'davion3454392', '09235111971', 2, '', ''),
('1298028', '   8:30AM-9:30PM   ', 'ddsawds@gmail.com', 'wafervdfsa', 'dsda', 'localhost', 'Female', '1234', '1234', '09234382942', 2, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `instruct_course`
--

CREATE TABLE IF NOT EXISTS `instruct_course` (
  `instruct_course_id` int(11) NOT NULL,
  `course_id` varchar(35) NOT NULL,
  `IdNum` varchar(35) NOT NULL,
  `date_instruct` datetime NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`instruct_course_id`),
  KEY `instruct_course_id` (`course_id`),
  KEY `IdNum` (`IdNum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instruct_course`
--

INSERT INTO `instruct_course` (`instruct_course_id`, `course_id`, `IdNum`, `date_instruct`, `flag`) VALUES
(1234, '21349', '12103906', '2015-10-08 02:38:00', 2),
(43124, '21349', '12103906', '2015-10-08 18:32:00', 1),
(123456, '21349', '12103906', '2015-10-08 02:04:00', 2),
(312412, '21349', '1209302', '2015-10-08 05:25:00', 1),
(314231, '09213', '1209302', '2015-10-08 05:42:00', 1),
(3412342, '21349', '12103906', '2015-10-08 05:34:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE IF NOT EXISTS `lectures` (
  `lecture_id` int(11) NOT NULL AUTO_INCREMENT,
  `licture_name` varchar(255) NOT NULL,
  `courseID` int(11) NOT NULL,
  PRIMARY KEY (`lecture_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`lecture_id`, `licture_name`, `courseID`) VALUES
(1, 'Lec1W-Intro.pptx', 9213),
(2, 'Lec2-Layered_Architecture.pptx', 9213),
(3, 'Lec4-Impairments.pptx', 9213);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Email` varchar(30) NOT NULL,
  `Fname` varchar(30) NOT NULL,
  `Lname` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `Rpassword` varchar(30) NOT NULL,
  `flag` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer` varchar(500) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Email`, `Fname`, `Lname`, `password`, `username`, `Rpassword`, `flag`, `question`, `answer`) VALUES
('cv_enriquez@rocketmail.com', 'Clak', 'Clark', 'clarkyclark123', 'intensity67', 'clarkyclark123', 1, '', ''),
('cv_enriquez@yahoo.com', 'Clak', 'Clark', 'lol', 'intensity67', 'lol', 1, '', ''),
('dkrp101@gmail.com', 'Dean', 'Polancos', 'davion', 'hahaha', 'davion', 2, '', ''),
('dkrp101dog@gmail.com', 'Dean', 'Polancos', 'davion', 'hahaha', 'davion', 1, '', ''),
('dkrp@gmail.com', 'Kurt', 'Polancos', 'davion', 'hehe', 'davion', 1, '', ''),
('dkrp@yahoo.com', 'dean', 'fsdadfa', 'joker', 'Keano', '', 0, '', ''),
('dkrpdog101@gmail.com', 'Dean', 'Polancos', 'davion', 'hahaha', 'davion', 1, '', ''),
('dkrPha@gmail.com', 'Dean', 'Hahaha', 'sadsad', 'dave', 'sadsad', 1, '', ''),
('dsad@yahoo.com', 'asda', 'asda', 'sadasd', 'sadsa', 'dsadsa', 1, '', ''),
('facade@yahoo.com', 'asdsadsad', 'sadasdsa', '123', 'dasdasd', '123', 2, '', ''),
('giannamarielanete@gmail.com', 'Gianna', 'Lanete', '10300946', 'ikashi', '10300946', 1, 'What is the name of your pet?', 'shiro'),
('jeje@yahoo.com', 'Keano', 'Polancos', 'davion', 'Kurt', 'davion', 1, '', ''),
('rotchel@yahoo.com', 'Rotchel', 'haah', 'keano', 'Rotchel123', 'keano', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_course`
--

CREATE TABLE IF NOT EXISTS `user_course` (
  `user_course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(35) NOT NULL,
  `course_type` varchar(255) NOT NULL,
  `Email` varchar(30) NOT NULL,
  PRIMARY KEY (`user_course_id`),
  KEY `course_id` (`course_id`),
  KEY `Email` (`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `user_course`
--

INSERT INTO `user_course` (`user_course_id`, `course_id`, `course_type`, `Email`) VALUES
(1, '09213', 'free', 'cv_enriquez@rocketmail.com'),
(2, '21349', 'paid', 'cv_enriquez@rocketmail.com'),
(6, '09213', 'free', 'dkrp101@gmail.com'),
(7, '21349', 'paid', 'dkrp101@gmail.com'),
(8, '09213', 'free', 'dkrPha@gmail.com'),
(9, '21349', 'paid', 'dkrPha@gmail.com'),
(10, '09213', 'free', 'jeje@yahoo.com'),
(11, '09213', 'free', 'dsad@yahoo.com'),
(13, '09213', 'free', 'giannamarielanete@gmail.com'),
(17, '41743', 'free', 'giannamarielanete@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `video_lectures`
--

CREATE TABLE IF NOT EXISTS `video_lectures` (
  `lec_video_id` int(11) NOT NULL AUTO_INCREMENT,
  `course` int(11) NOT NULL,
  `embed_url` varchar(255) NOT NULL,
  `lec_title` varchar(255) NOT NULL,
  `Idnum` int(11) NOT NULL,
  `lecture_name` varchar(255) NOT NULL,
  PRIMARY KEY (`lec_video_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `video_lectures`
--

INSERT INTO `video_lectures` (`lec_video_id`, `course`, `embed_url`, `lec_title`, `Idnum`, `lecture_name`) VALUES
(1, 21349, 'https://www.youtube.com/embed/fRHh_vgS2dFE', 'My new video', 12103906, 'library_managment_system3.pptx'),
(2, 23413, 'https://www.youtube.com/embed/sGHh_sdG4dEF', 'With beautiful features', 12103906, 'Lec1-Intro.pptx'),
(3, 9213, 'https://www.youtube.com/embed/hJKl_ufD2dFE', 'Good Features', 12103906, 'Lec1W-Intro.pptx'),
(4, 21349, 'https://www.youtube.com/embed/oUPl_ejH4sJG', 'Adding another course', 12103906, 'Lec3-datasignals.pptx'),
(5, 21349, 'https://www.youtube.com/embed/hJKl_ufD2dGN', 'Testing', 12103906, 'Lec4-Impairments.pptx'),
(6, 41743, 'https://www.youtube.com/embed/hJKl_juL1dGN', 'testing another course', 12103906, 'Lec5-Guided_Media.pptx');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `instruct_course`
--
ALTER TABLE `instruct_course`
  ADD CONSTRAINT `IdNum` FOREIGN KEY (`IdNum`) REFERENCES `instructors` (`Idnum`),
  ADD CONSTRAINT `instruct_course_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`courseID`);

--
-- Constraints for table `user_course`
--
ALTER TABLE `user_course`
  ADD CONSTRAINT `Email` FOREIGN KEY (`Email`) REFERENCES `user` (`Email`),
  ADD CONSTRAINT `user_course_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`courseID`);
