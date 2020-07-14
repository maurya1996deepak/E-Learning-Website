-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 15, 2018 at 04:19 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `CId` int(11) NOT NULL AUTO_INCREMENT,
  `CName` varchar(150) DEFAULT NULL,
  `CImage` varchar(150) DEFAULT NULL,
  `TEmail` varchar(60) NOT NULL,
  `CNumber` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `CDetail` varchar(30000) NOT NULL,
  `DVLocation` varchar(200) NOT NULL,
  PRIMARY KEY (`CId`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CId`, `CName`, `CImage`, `TEmail`, `CNumber`, `date`, `CDetail`, `DVLocation`) VALUES
(1, 'science', 'image/course/Screenshot (86).png', 'priya@gmail.com', 1, '2', '', ''),
(27, 'apkqw', 'image/course/Capture001.png', 'maurya@', 2, '5', '', ''),
(13, 'bams', 'image/course/Screenshot (48).png', 'priya@gmail.com', 2, '', '', ''),
(28, '34', 'image/course/Screenshot (3).png', 'maurya@', 2, '', '', ''),
(25, 'kk', 'image/course/Capture001.png', 'maurya@', 4, '', '', ''),
(29, 'Bams', 'image/course/Screenshot (3).png', 'maurya@', 2, '', '', ''),
(30, '123644', 'image/course/Capture001.png', 'maurya@', 1, '31-Aug-2018 06:29:00 PM', '', ''),
(31, 'apkmmm', 'image/course/Screenshot (3).png', 'deepak@', 1, '31-Aug-2018 11:32:35 PM', '', ''),
(32, '456', 'image/course/Screenshot (3).png', 'maurya@', 2, '31-Aug-2018 11:48:16 PM', 'abdct\r\n\r\nsrtec\r\n\r\ngty\r\n\r\ngy', ''),
(33, 'eeeeeeeeeeeeeeeeeeeeeeeeee', 'image/course/Screenshot (3).png', 'maurya@', 1, '07-Sep-2018', 'ghyyyyyyyyyy\r\nloiu\r\nhyu', 'video/Screen Recording 2018-07-26 at 06.00.50.40 PM.mp4'),
(34, '11111111111111111111111', 'image/course/Capture001.png', 'maurya@', 4, '13-Sep-2018', 'l\r\nddddddddddddd\r\nddddddddddddd\r\ndddddddddddddddddddd\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nsssssssssssseeeeeeeee\r\neeeeeeeer\r\nttttttttttttttt\r\nyyyyyyyyyyy\r\nzzzzzzzzzzzz\r\neeee\r\n', 'video/Screen Recording 2018-07-26 at 06.00.50.40 PM.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `TEmail` varchar(60) NOT NULL,
  `QId` int(11) NOT NULL AUTO_INCREMENT,
  `CId` int(11) DEFAULT NULL,
  `Question` varchar(5000) DEFAULT NULL,
  `OpA` varchar(500) DEFAULT NULL,
  `OpB` varchar(500) DEFAULT NULL,
  `OpC` varchar(500) DEFAULT NULL,
  `OpD` varchar(500) DEFAULT NULL,
  `Answer` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`QId`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`TEmail`, `QId`, `CId`, `Question`, `OpA`, `OpB`, `OpC`, `OpD`, `Answer`) VALUES
('', 1, 27, 'asdfgh', '1', '23', '4', '5', '23'),
('', 2, 27, 'asdfgg', '12', '2', '3', '4', '12'),
('', 3, 27, 'qwert', '3', '2', '1', '4', '4'),
('maurya@', 4, 27, '', 'a', 'bc', 'c', 'd', 'c'),
('maurya@', 14, 2, 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'q', 'qq', 'q', 'q', 'qq'),
('maurya@', 13, 27, 'how many ', '1', '2', '3', '45', '1'),
('maurya@', 8, 27, 'a', 'a', 's', 'f', 'e', 's'),
('maurya@', 9, 29, 'a', '3', 'j', 'f', 'fsq', '3'),
('maurya@', 10, 29, 'l', 'a', 'jsq', 'f', 'fsq', 's'),
('maurya@', 11, 29, 'sdaf', '1', '2', '3', '4', '1'),
('maurya@', 15, 27, 'qqqqqqqqq', 'qq', 'qqqqqqqqq', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 'qqqqqqqqqqqqqqqqqqqqqqqq', 'qq');

-- --------------------------------------------------------

--
-- Table structure for table `stc`
--

DROP TABLE IF EXISTS `stc`;
CREATE TABLE IF NOT EXISTS `stc` (
  `SEmail` varchar(60) DEFAULT NULL,
  `TEmail` varchar(60) DEFAULT NULL,
  `CourseId` int(11) DEFAULT NULL,
  `Q1M` int(5) NOT NULL,
  `Sdate` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stc`
--

INSERT INTO `stc` (`SEmail`, `TEmail`, `CourseId`, `Q1M`, `Sdate`) VALUES
('deepak@gmail.com', 'priya@gmail.com', 2, 17, ''),
('deepak@gmail.com', 'ms@gmail.com', 3, 17, ''),
('deep@', 'ms@gmail.com', 1, 0, ''),
('deepak@gmail.com', 'maurya@', 6, 17, ''),
('deepak@gmail.com', 'priya@gmail.com', 14, 17, ''),
('a', 'priya@gmail.com', 13, 0, ''),
('a', 'maurya@', 27, 0, ''),
('deepak@gmail.com', 'maurya@', 21, 17, ''),
('a', 'maurya@', 25, 0, ''),
('a', 'maurya@', 27, 0, ''),
('deepak@gmail.com', 'maurya@', 20, 17, ''),
('priya', 'priya@gmail.com', 13, 0, ''),
('priya', 'maurya@', 25, 0, ''),
('', 'priya@gmail.com', 13, 0, ''),
('', 'maurya@', 27, 0, ''),
('deepak@gmail.com', 'deepak@', 31, 0, '12-Sep-2018'),
('deepak@gmail.com', 'maurya@', 27, 0, '12-Sep-2018'),
('', 'maurya@', 28, 0, '25-Aug-2018 11:41:04 PM'),
('', 'maurya@', 25, 0, '25-Aug-2018 11:41:06 PM'),
('', 'priya@gmail.com', 1, 0, '25-Aug-2018 11:41:07 PM'),
('deepak@gmail.com', 'maurya@', 32, 0, '13-Sep-2018'),
('deepak@gmail.com', 'maurya@', 33, 0, '12-Sep-2018');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `SEmail` varchar(30) NOT NULL,
  `SName` varchar(39) DEFAULT NULL,
  `SPhone` int(11) DEFAULT NULL,
  `SGender` varchar(10) DEFAULT NULL,
  `SPassword` varchar(20) DEFAULT NULL,
  `SImage` varchar(90) NOT NULL,
  PRIMARY KEY (`SEmail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`SEmail`, `SName`, `SPhone`, `SGender`, `SPassword`, `SImage`) VALUES
('deepak@gmail.com', 'deepak', 1234567890, 'Male', '12345', 'image/student/WIN_20170116_17_13_16_Pro.jpg'),
('priya', 'priya', 12345, 'Female', '12345', 'image/student/Capture001.png'),
('deep@', 'deep', 1234, 'Male', '1234', 'image/student/Sri Ramachandra Kripalu - Suprabha KV_FHD(videoming).mp4'),
('priya@', 'priya', 233, 'Female', '55555', 'image/student/IMG_20150707_000332.JPG'),
('w', 'w', 2, 'Male', 'a', 'image/student/abac.pdf'),
('a', 'd', 33, 'Male', 'a', 'image/student/Screenshot (3).png');

-- --------------------------------------------------------

--
-- Table structure for table `studentcourse`
--

DROP TABLE IF EXISTS `studentcourse`;
CREATE TABLE IF NOT EXISTS `studentcourse` (
  `CId` varchar(10) DEFAULT NULL,
  `SEmail` varchar(70) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentcourse`
--

INSERT INTO `studentcourse` (`CId`, `SEmail`) VALUES
('dbms', 'deepak@gmail.com'),
('dsa', 'deepak@gmail.com'),
('science', 'deepak'),
('maths', 'deepak');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `TEmail` varchar(60) NOT NULL,
  `TName` varchar(50) DEFAULT NULL,
  `TImage` varchar(100) DEFAULT NULL,
  `TPassword` varchar(50) NOT NULL,
  `TGender` varchar(10) NOT NULL,
  `TPhone` int(15) NOT NULL,
  `TDetail` varchar(20000) NOT NULL,
  PRIMARY KEY (`TEmail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`TEmail`, `TName`, `TImage`, `TPassword`, `TGender`, `TPhone`, `TDetail`) VALUES
('maurya@', 'deepak', 'image/teacher/Capture001.png', '123456', 'Male', 12345, 'dejjjjjjjjjjjj4hc'),
('priya@gmail.com', 'priya', 'image/teacher/Screenshot (77).png', '12345', 'Female', 222, ''),
('deepak@', 'wqqq', 'image/teacher/Screenshot (98).png', '11111111', 'Male', 234, 'Enter text here...reyyyahh\r\n\r\nshbdjjjx');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `VId` int(11) NOT NULL AUTO_INCREMENT,
  `VName` varchar(150) DEFAULT NULL,
  `CourseId` int(11) DEFAULT NULL,
  `TEmail` varchar(60) DEFAULT NULL,
  `VLocation` varchar(150) DEFAULT NULL,
  `VImage` varchar(150) NOT NULL,
  `date` varchar(30) NOT NULL,
  PRIMARY KEY (`VId`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`VId`, `VName`, `CourseId`, `TEmail`, `VLocation`, `VImage`, `date`) VALUES
(11, 'geo', 11, 'maurya@', 'video/@19 Web Development Workshop _ jQuery _ Validation (Hindi).mp4', 'image/video/Screenshot (93).png', ''),
(9, 'biology', 14, 'priya@gmail.com', 'video/@6 Web Development Workshop _ CSS _ Part 2 (Hindi).mp4', 'image/video/Capture001.png', ''),
(10, 'zology', 13, 'priya@gmail.com', 'video/@1 Web Development Workshop _ Node.js Introduction & Setup (Hindi).mp4', 'image/video/Screenshot (60).png', ''),
(8, 'cordination compound', 14, 'priya@gmail.com', 'video/@4 Web Development Workshop _ HTML _ Cross Browser Support (Hindi).mp4', 'image/video/Screenshot (90).png', ''),
(12, 'add', 11, 'maurya@', 'video/Addressing Modes of 8051 Microcontroller - Microcontroller and Its Applications_HD.mp4', 'image/video/Screenshot (90).png', ''),
(13, 'CSS', 18, 'maurya@', 'video/@12 Web Development Workshop _ Javascript _ functions (Hindi).mp4', 'image/video/Capture001.png', ''),
(14, 'new', 18, 'maurya@', 'video/@6 Web Development Workshop _ CSS _ Part 2 (Hindi).mp4', 'image/video/Screenshot (77).png', ''),
(15, 'scr', 11, 'maurya@', 'video/@2 Web Development Workshop - Create Web server and First HTML ( Hindi ).mp4', 'image/video/Screenshot (85).png', ''),
(16, 'scr', 111, 'maurya@', 'video/@7 Web Development Workshop _ CSS _ Part 3 (Hindi).mp4', 'image/video/Capture001.png', ''),
(17, 'fgt', 111, 'maurya@', 'video/Screen Recording 2018-07-26 at 06.00.50.40 PM.mp4', 'image/video/Screenshot (7).png', ''),
(18, 'fgt', 11, 'maurya@', 'video/Screen Recording 2018-07-26 at 06.00.50.40 PM.mp4', 'image/video/Screenshot (104).png', ''),
(19, 'CSS', 19, 'maurya@', 'video/Screen Recording 2018-07-26 at 06.00.50.40 PM.mp4', 'image/video/Screenshot (1).png', ''),
(20, 'CSS', 19, 'maurya@', 'video/Screen Recording 2018-07-26 at 06.00.50.40 PM.mp4', 'image/video/Screenshot (1).png', ''),
(21, 'fgt', 19, 'maurya@', 'video/Screen Recording 2018-07-26 at 06.00.50.40 PM.mp4', 'image/video/Capture001.png', ''),
(22, 'CSS', 21, 'maurya@', 'video/Screen Recording 2018-07-26 at 06.00.50.40 PM.mp4', 'image/video/Capture001.png', ''),
(23, 'mmmmmm', 23, 'maurya@', 'video/Screen Recording 2018-07-26 at 06.00.50.40 PM.mp4', 'image/video/Screenshot (9).png', ''),
(29, 'CSS', 13, 'maurya@', 'video/Screen Recording 2018-07-26 at 06.00.50.40 PM.mp4', 'image/video/Screenshot (3).png', ''),
(39, 'add', 29, 'maurya@', 'video/Screen Recording 2018-07-26 at 06.00.50.40 PM.mp4', 'image/video/Capture001.png', ''),
(38, 'PHP', 29, 'maurya@', 'video/Screen Recording 2018-07-26 at 06.00.50.40 PM.mp4', 'image/video/Screenshot (1).png', ''),
(44, 'weeeeeeeeeeeeeerrrrrrrrrrrrrrrrrrrrrrr', 27, 'maurya@', 'video/Screen Recording 2018-07-26 at 06.00.50.40 PM.mp4', 'image/video/Capture001.png', '07-Sep-2018'),
(43, 'qqqqqqqqqqqqqqqqqqqqqqqq', 27, 'maurya@', 'video/Screen Recording 2018-07-26 at 06.00.50.40 PM.mp4', 'image/video/Capture001.png', '07-Sep-2018 09:10:49 PM'),
(40, 'CSS', 29, 'maurya@', 'video/Screen Recording 2018-07-26 at 06.00.50.40 PM.mp4', 'image/video/Screenshot (99).png', ''),
(45, 'gggggggggggg', 28, 'maurya@', 'video/Screen Recording 2018-07-26 at 06.00.50.40 PM.mp4', 'image/video/Capture001.png', '13-Sep-2018'),
(42, 'internet of things', 27, 'maurya@', 'video/HTML 5 Tutorial Progress Bar For Progressive Javascript Events Processing or Fil_HD.mp4', 'image/video/Capture001.png', '07-Sep-2018 07:48:02 PM');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
