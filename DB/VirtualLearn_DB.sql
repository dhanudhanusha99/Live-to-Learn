-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 08, 2011 at 12:48 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `virtuallrn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin'),
('bala', 'bala'),
('bala', 'bala');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `catid` int(25) NOT NULL auto_increment,
  `catname` varchar(500) NOT NULL,
  PRIMARY KEY  (`catid`),
  UNIQUE KEY `catname` (`catname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `catname`) VALUES
(7, 'IEEE-IT'),
(2, 'Information Technology'),
(3, 'Mechanical'),
(4, 'Civil Engg'),
(5, 'Electrical'),
(6, 'Mathematics'),
(8, 'Marine');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `from` varchar(255) NOT NULL default '',
  `to` varchar(255) NOT NULL default '',
  `message` text NOT NULL,
  `sent` datetime NOT NULL default '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `from`, `to`, `message`, `sent`, `recd`) VALUES
(1, 'bala', 'balaji', 'fine', '2010-04-05 23:24:21', 1),
(2, 'balaji', '', 'hi', '2010-04-05 23:24:27', 1),
(3, 'bala', 'balaji', 'hello', '2010-04-05 23:24:33', 1),
(4, 'balaji', '', 'aerew', '2010-04-05 23:24:37', 1),
(5, 'bala', 'balaji', 'eerwe', '2010-04-05 23:24:50', 1),
(6, 'balaji', '', 'hi', '2010-04-05 23:25:06', 1),
(7, 'balaji', 'bala', 'rtrt', '2010-04-05 23:25:14', 1),
(8, 'arun', 'prabu', 'hello prabu', '2011-02-25 23:37:15', 1),
(9, 'arun', 'arun', 'hi sir', '2011-02-25 23:37:31', 1),
(10, 'arun', 'arun', 'hello', '2011-02-25 23:37:41', 1),
(11, 'arun', 'prabu', 'can u hr me?', '2011-02-25 23:38:03', 1),
(12, 'arun', 'arun', 'ya', '2011-02-25 23:38:13', 1),
(13, 'arun', 'arun', 'wh r u?', '2011-02-25 23:38:20', 1),
(14, 'arun', 'arun', 'hello', '2011-02-25 23:38:34', 1),
(15, 'arun', 'arun', 'yah..', '2011-02-25 23:39:02', 1),
(16, 'arun', 'arun', 'i hve 1 doubt?', '2011-02-25 23:39:18', 1),
(17, 'arun', 'arun', 'tell me?', '2011-02-25 23:39:24', 1),
(18, 'arun', 'arun', 'rel grphs?', '2011-02-25 23:39:37', 1),
(19, '', 'balaji', 'hi', '2011-02-25 23:40:29', 0),
(20, 'prabu', 'balaji', 'hi', '2011-02-25 23:41:17', 0),
(21, 'arun', 'prabu', 'hello', '2011-02-25 23:41:35', 1),
(22, 'prabu', 'arun', 'hi sir', '2011-02-25 23:41:41', 1),
(23, 'arun', 'prabu', 'tel me prabu..', '2011-02-25 23:41:52', 1),
(24, 'prabu', 'arun', 'wh r u sir?', '2011-02-25 23:41:57', 1),
(25, 'arun', 'prabu', 'in college', '2011-02-25 23:42:06', 1),
(26, 'prabu', 'arun', 'oh ok sir get back u shortly', '2011-02-25 23:42:22', 1),
(27, 'arun', 'prabu', 'ok sure', '2011-02-25 23:42:27', 1),
(28, 'arun', 'prabu', 'all the best', '2011-02-25 23:42:29', 1),
(29, 'prabu', 'arun', 'bye sir', '2011-02-25 23:42:36', 1),
(30, 'arun', 'prabu', 'bye', '2011-02-25 23:42:38', 1),
(31, 'arun', 'bala', 'hai', '2011-03-08 15:43:01', 0),
(32, 'arun', 'bala', 'can u clarify my doubt?', '2011-03-08 15:43:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chatusers`
--

CREATE TABLE IF NOT EXISTS `chatusers` (
  `uname` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatusers`
--

INSERT INTO `chatusers` (`uname`, `type`) VALUES
('balaji', 'student'),
('bala', 'staff'),
('bala', 'staff'),
('balaji', 'student'),
('qwert', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `eqresults`
--

CREATE TABLE IF NOT EXISTS `eqresults` (
  `userid` varchar(40) NOT NULL,
  `quest` varchar(40) NOT NULL,
  `ans` varchar(40) NOT NULL,
  `cans` varchar(40) NOT NULL,
  `marls` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eqresults`
--

INSERT INTO `eqresults` (`userid`, `quest`, `ans`, `cans`, `marls`) VALUES
('balaji', '1', 'jmghj', '1', '1'),
('balaji', '2', 'jghg', '2', '2'),
('balaji', '3', 'hghj', '3', '3'),
('balaji', '4', 'hghj', '4', '4'),
('balaji', '5', 'hjgjh', '5', '5'),
('balaji', '6', 'hjghjg', '6', '6'),
('balaji', '7', 'hjgjh', '7', '7'),
('balaji', '8', 'hjghj', '8', '8'),
('balaji', '9', 'jgh', '9', '9'),
('balaji', '10', 'jhghj', '10', '10'),
('balaji', '1', 'hj', '1', '1'),
('balaji', '2', 'r', '2', '2'),
('balaji', '3', 'r', '3', '3'),
('balaji', '4', 'r', '4', '4'),
('balaji', '5', 'r', '5', '5'),
('balaji', '6', 'r', '6', '6'),
('balaji', '7', 'r', '7', '7'),
('balaji', '8', 'r', '8', '8'),
('balaji', '9', 'r', '9', '9'),
('balaji', '10', 'r', '10', '10'),
('bala', '1', '1', '1', '1'),
('bala', '2', '1', '2', '2'),
('bala', '3', '3', '3', '3'),
('bala', '4', '4', '4', '4'),
('bala', '5', '5', '5', '5'),
('bala', '6', '6', '6', '6'),
('bala', '7', '7', '7', '7'),
('bala', '8', '8', '8', '8'),
('bala', '9', '9', '9', '9'),
('bala', '10', '7', '10', '10'),
('qwert', 'What does PHP stand for?', 'qqwe', 'Hypertext Preprocessor', '3'),
('qwert', 'What does ASP stand for?', 'wer', 'Active Server Pages', '2'),
('qwert', 'What does SQL stand for?', 'wer', 'Structured Query Language', '3'),
('qwert', 'What does XHTML stand for?', 'wer', '	EXtensible HyperText Markup Language', '4'),
('qwert', 'What does XML stand for?', 'wer', 'Xtensible Markup Language', '5'),
('qwert', '6', 'wre', '6', '6'),
('qwert', '7', '7', '7', '7'),
('qwert', '8', '8', '8', '8'),
('qwert', '9', '9', '9', '9'),
('qwert', '10', '10', '10', '10');

-- --------------------------------------------------------

--
-- Table structure for table `eqtest`
--

CREATE TABLE IF NOT EXISTS `eqtest` (
  `fid` int(11) NOT NULL,
  `eqques` varchar(500) NOT NULL,
  `eqans` varchar(100) NOT NULL,
  `eqmark` varchar(15) NOT NULL,
  PRIMARY KEY  (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eqtest`
--

INSERT INTO `eqtest` (`fid`, `eqques`, `eqans`, `eqmark`) VALUES
(1, 'What does PHP stand for?', 'Hypertext Preprocessor', '3'),
(2, 'What does ASP stand for?', 'Active Server Pages', '2'),
(3, 'What does SQL stand for?', 'Structured Query Language', '3'),
(4, 'What does XHTML stand for?', '	EXtensible HyperText Markup Language', '4'),
(5, 'What does XML stand for?', 'Xtensible Markup Language', '5'),
(6, '6', '6', '6'),
(7, '7', '7', '7'),
(8, '8', '8', '8'),
(9, '9', '9', '9'),
(10, '10', '10', '10');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `fid` int(20) NOT NULL auto_increment,
  `fques` varchar(500) NOT NULL,
  PRIMARY KEY  (`fid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `fques`) VALUES
(1, 'College Environment Good ?kjnh'),
(2, 'Staff Teaching Service Good ?'),
(3, 'Other Facilities Good  ?'),
(4, 'Bus Service Good ?'),
(5, 'Lab  Service Goog ?'),
(6, 'Any New Service Reqd?'),
(7, 'How is Staff Relation?'),
(8, 'About Management?'),
(9, 'Need Uniform?'),
(10, 'Time Stipulation Needed?');

-- --------------------------------------------------------

--
-- Table structure for table `feedbackresults`
--

CREATE TABLE IF NOT EXISTS `feedbackresults` (
  `userid` varchar(200) NOT NULL,
  `fques` varchar(200) NOT NULL,
  `fand` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbackresults`
--

INSERT INTO `feedbackresults` (`userid`, `fques`, `fand`) VALUES
('balaji', 'fq2aed', 'Yes'),
('balaji', 'fq21', 'No'),
('balaji', 'fques32', 'Yes'),
('balaji', 'fques43', 'No'),
('balaji', 'fques54', 'Yes'),
('balaji', 'fques65', 'No'),
('balaji', 'fques76', 'Yes'),
('balaji', 'fques87', 'No'),
('balaji', 'fques90', 'Yes'),
('balaji', 'fques100', 'No'),
('qwert', 'College Environment Good ?kjnh', 'Yes'),
('qwert', 'Staff Teaching Service Good ?', 'No'),
('qwert', 'Other Facilities Good  ?', 'Yes'),
('qwert', 'Bus Service Good ?', 'No'),
('qwert', 'Lab  Service Goog ?', 'Yes'),
('qwert', 'hgf', 'No'),
('qwert', 'gd', 'Yes'),
('qwert', 'rde', 'No'),
('qwert', 'gdr', 'Yes'),
('qwert', 'gtd', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `qsetid` int(12) NOT NULL auto_increment,
  `question_title` varchar(300) NOT NULL,
  `catid` varchar(100) NOT NULL,
  `scatid` varchar(100) NOT NULL,
  PRIMARY KEY  (`qsetid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qsetid`, `question_title`, `catid`, `scatid`) VALUES
(4, 'Aptitute', '2', '6'),
(3, 'Technical Interview', '2', '6');

-- --------------------------------------------------------

--
-- Table structure for table `question_ans`
--

CREATE TABLE IF NOT EXISTS `question_ans` (
  `user_id` varchar(40) NOT NULL,
  `qset_id` varchar(40) NOT NULL,
  `qus_id` varchar(40) NOT NULL,
  `qus_ans` varchar(40) NOT NULL,
  `usr_ans` varchar(50) NOT NULL,
  `qus_crt` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_ans`
--

INSERT INTO `question_ans` (`user_id`, `qset_id`, `qus_id`, `qus_ans`, `usr_ans`, `qus_crt`) VALUES
('balaji', '4', '5', 'qanswer', 'qansone', 'In Correct'),
('balaji', '4', '5', 'qanswer', 'qanstwo', 'In Correct'),
('balaji', '4', '6', 'qanswer', 'qansone', 'In Correct'),
('balaji', '4', '6', 'qanswer', 'qanstwo', 'In Correct'),
('balaji', '1', '1', '1', '8 bit', 'In Correct'),
('balaji', '1', '2', '2', 'a1', 'In Correct'),
('prabu', '1', '1', '1', '8 bit', 'In Correct'),
('prabu', '1', '1', '1', '7 bit', 'In Correct'),
('prabu', '1', '2', '2', 'a2', 'In Correct'),
('prabu', '1', '2', '2', 'a1', 'In Correct'),
('prabu', '3', '5', '1', 'Kilo Bytes', 'In Correct'),
('prabu', '3', '6', '2', 'Charles Babbage', 'In Correct');

-- --------------------------------------------------------

--
-- Table structure for table `question_set`
--

CREATE TABLE IF NOT EXISTS `question_set` (
  `ques_atid` int(12) NOT NULL auto_increment,
  `qsetid` int(12) NOT NULL,
  `question` varchar(200) NOT NULL,
  `ans1` varchar(200) NOT NULL,
  `ans2` varchar(200) NOT NULL,
  `ans3` varchar(200) NOT NULL,
  `fans` varchar(200) NOT NULL,
  PRIMARY KEY  (`ques_atid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `question_set`
--

INSERT INTO `question_set` (`ques_atid`, `qsetid`, `question`, `ans1`, `ans2`, `ans3`, `fans`) VALUES
(1, 1, 'one byte equal to ?', '8 bit', '7 bit', '6 bit', '1'),
(2, 1, 'q2', 'a1', 'a2', 'a3', '2'),
(3, 2, 'one byte equal to ?', '8 bit', '7 bit', '6 bit', '1'),
(4, 2, 'q2', 'a1', 'a2', 'a3', '2'),
(5, 3, 'What is KB?', 'Kilo Bytes', 'Kilo Bits', 'Kilo Bulk', '1'),
(6, 3, 'Father of Computer', 'Dennis', 'Charles Babbage', 'Ritchie', '2'),
(7, 4, 'What is OOAD', 'Object Oriented Analysis Design', 'OOAnalysis', 'Object Analysis', '1'),
(8, 4, 'What is Value Type?', 'Nohting', 'Passing Value', 'Nil', '2');

-- --------------------------------------------------------

--
-- Table structure for table `registeration`
--

CREATE TABLE IF NOT EXISTS `registeration` (
  `stu_id` int(15) NOT NULL auto_increment,
  `first_name` varchar(35) NOT NULL,
  `Last_name` varchar(35) NOT NULL,
  `category` varchar(35) NOT NULL,
  `sub_category` varchar(35) NOT NULL,
  `year` varchar(15) NOT NULL,
  `mailid` varchar(250) NOT NULL,
  `regno` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  PRIMARY KEY  (`stu_id`),
  UNIQUE KEY `mailid` (`mailid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `registeration`
--

INSERT INTO `registeration` (`stu_id`, `first_name`, `Last_name`, `category`, `sub_category`, `year`, `mailid`, `regno`, `dob`, `password`) VALUES
(1, 'wfrwe', 'werwe', '2', '4', '2', 'balaji', 'werwer', '345', '123123'),
(2, 'edf', 'sdfsd', '1', '4', '1', 'wer2', '324', 'e', 'f'),
(3, 'abla', 'asdj', '2', '6', '2', 'qwert', '71612312312', '123123', 'qwert'),
(4, 'prabu', 'k', '2', '6', '2', 'prabu', '71656989912', '10/02/1986', '123'),
(5, 'arun', 'kumar', '2', '6', '2', 'arun', '71612312312', '05-05-1987', 'arun');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(15) NOT NULL auto_increment,
  `staff_name` varchar(100) NOT NULL,
  `staff_mailid` varchar(500) NOT NULL,
  `staff_username` varchar(100) NOT NULL,
  `staff_password` varchar(100) NOT NULL,
  `sub_cat` varchar(100) NOT NULL,
  `sub_subcat` varchar(100) NOT NULL,
  `staff_comments` varchar(500) NOT NULL,
  PRIMARY KEY  (`staff_id`),
  UNIQUE KEY `staff_username` (`staff_username`),
  UNIQUE KEY `staff_username_2` (`staff_username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_mailid`, `staff_username`, `staff_password`, `sub_cat`, `sub_subcat`, `staff_comments`) VALUES
(7, 'bala', 'bala@gmail.com', 'bala', 'bala', '1', '4,5', 'no'),
(8, 'awert', 'bala@mailid.com', '123123', '123123', '1', '4,5', 'dfdsf'),
(9, 'arun', 'arun.k@ymail.com', 'arun', '12345', '6', '7', 'selected'),
(10, 'Selvan', 'selvan.k@gmail.com', 'selvank', '223', '2', '6', 'New staff');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `catid` int(15) NOT NULL,
  `subcatid` int(15) NOT NULL auto_increment,
  `subcategory` varchar(50) NOT NULL,
  PRIMARY KEY  (`subcatid`,`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`catid`, `subcatid`, `subcategory`) VALUES
(1, 4, 'Doctor'),
(1, 5, 'Dental'),
(2, 6, 'Computer Science'),
(6, 7, 'Graph Theory'),
(7, 9, 'Data Mining'),
(8, 10, 'Computer science');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `up_id` int(25) NOT NULL auto_increment,
  `up_dep` varchar(25) NOT NULL,
  `up_sub` varchar(25) NOT NULL,
  `year` varchar(25) NOT NULL,
  `up_type` varchar(100) NOT NULL,
  `up_fname` varchar(500) NOT NULL,
  `up_ftyp` varchar(500) NOT NULL,
  `up_size` varchar(500) NOT NULL,
  PRIMARY KEY  (`up_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`up_id`, `up_dep`, `up_sub`, `year`, `up_type`, `up_fname`, `up_ftyp`, `up_size`) VALUES
(2, '1', '4', '1', 'htm', 'contents.htm', 'text/html', '342'),
(3, '1', '4', '1', 'htm', 'tryitbanner.asp@secid=trycss&rnd=0.5756037.htm', 'text/html', '1127'),
(4, '1', '4', '1', 'pdf', 'J K Rowling - Harry Potter and the half blood prince.pdf', 'application/download', '1962505'),
(5, '1', '4', '1', 'pdf', 'J.K. Rowling - Harry Potter and the Sorcerers Stone.pdf', 'application/download', '1082762'),
(6, '1', '4', '1', 'doc', 'balaganesh k.doc', 'application/msword', '56320'),
(7, '1', '4', '1', 'htm', 'Apple.com style suggestion search.html', 'text/html', '932'),
(8, '1', '4', '1', 'htm', 'Apple.com style suggestion search.html', 'text/html', '932'),
(9, '1', '4', '1', 'ppt', 'New Text Document.ppt', 'application/vnd.ms-powerpoint', '0'),
(10, '2', '6', '1', 'pdf', 'Base paper.pdf', 'application/pdf', '351656');
