-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2013 at 09:32 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shareddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--
USE shareddb;

CREATE TABLE IF NOT EXISTS `book` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `publisher` text NOT NULL,
  `publish_date` text NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `lender_id` int(11) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `title`, `author`, `publisher`, `publish_date`, `borrower_id`, `lender_id`) VALUES
(8, 'lkjdsf', ';lskadfj', ';lksadjf', 'sal;kdfj', 0, 6),
(9, 'lkjdsfa', ';lskadfj', ';lksadjf', 'sal;kdfj', 0, 6),
(10, 'lkjds', ';lskadfj', ';lksadjf', 'sal;kdfj', 0, 6),
(11, 'lkjdssdkfjasd', ';lskadfj', ';lksadjf', 'sal;kdfj', 0, 6),
(12, 'lkjdssdkfjas', ';lskadfj', ';lksadjf', 'sal;kdfj', 0, 6),
(13, 'lkjdssdkfja', ';lskadfj', ';lksadjf', 'sal;kdfj', 0, 6),
(14, 'lkjdssdkfjasdf', ';lskadfj', ';lksadjf', 'sal;kdfj', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `circle`
--

CREATE TABLE IF NOT EXISTS `circle` (
  `circle_id` int(11) NOT NULL AUTO_INCREMENT,
  `circle_name` text NOT NULL,
  `circle_description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`circle_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `circle`
--

INSERT INTO `circle` (`circle_id`, `circle_name`, `circle_description`, `user_id`) VALUES
(1, 'nope', 'nope', 4),
(2, 'ancient', 'ancient', 4),
(3, 'a', 'v', 4),
(4, 'aa', 'bb', 4),
(5, 'b', 'b', 4),
(6, 'b', 'b', 5),
(7, 'vineet', 'vineet', 6),
(8, 'nice', 'nice', 6),
(9, 'n', 't', 6),
(10, 'wrong', 'hi', 6),
(11, 'ruin', 'it', 6),
(12, 'rat', 'a', 6),
(13, 'rate', 'a', 6),
(14, 'xyzq', 'xyz', 6),
(15, 'x', '', 6),
(16, 'r', 'a', 6),
(17, 'paw', 'paw', 6),
(18, 'raw', 'raw', 6),
(19, 'reno', 'aaa', 6),
(20, 'mein', 'hellow', 6),
(21, '33', '123', 6);

-- --------------------------------------------------------

--
-- Table structure for table `circle_book`
--

CREATE TABLE IF NOT EXISTS `circle_book` (
  `book_id` int(11) NOT NULL,
  `circle_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `circle_book`
--

INSERT INTO `circle_book` (`book_id`, `circle_id`) VALUES
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 20),
(9, 2),
(9, 3),
(9, 19),
(9, 4),
(9, 1),
(9, 17),
(8, 2),
(8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `circle_user`
--

CREATE TABLE IF NOT EXISTS `circle_user` (
  `circle_id` int(11) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `circle_user`
--

INSERT INTO `circle_user` (`circle_id`, `email`) VALUES
(18, 'binsmyth@gmail.com'),
(0, 'binsmyth@gmail.com'),
(19, 'binsmyth@gmail.com'),
(19, 'binsmyth@hot'),
(19, 'binsmyth@ho'),
(19, 'binsmyth@h'),
(19, 'rine'),
(19, 'nein'),
(20, 'eiiii'),
(20, 'eeee'),
(20, 'bib'),
(20, ''),
(20, 'eeeeeeee'),
(21, 'binnni'),
(21, 'aaaaa'),
(21, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `postcode` int(4) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `postcode`) VALUES
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'binsmyth@gmail.com', 1234);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
