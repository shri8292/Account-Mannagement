-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2018 at 03:07 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myaccount`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_book`
--

CREATE TABLE IF NOT EXISTS `bank_book` (
  `acid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(45) NOT NULL,
  `tran_date` date NOT NULL,
  `amount` double NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `operation` varchar(45) NOT NULL,
  PRIMARY KEY (`acid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `bank_book`
--

INSERT INTO `bank_book` (`acid`, `account`, `tran_date`, `amount`, `userid`, `operation`) VALUES
(1, 'Bank A/c', '2018-10-04', 150000, 1, 'receive'),
(2, 'Bank A/c', '2018-10-01', 12000, 1, 'receive'),
(3, 'Bank A/c', '2018-10-01', 5000, 1, 'pay'),
(4, 'Bank A/c', '2018-10-06', 50000, 1, 'receive');

-- --------------------------------------------------------

--
-- Table structure for table `cash_book`
--

CREATE TABLE IF NOT EXISTS `cash_book` (
  `acid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(45) NOT NULL,
  `tran_date` date NOT NULL,
  `amount` double NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `operation` varchar(45) NOT NULL,
  PRIMARY KEY (`acid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cash_book`
--

INSERT INTO `cash_book` (`acid`, `account`, `tran_date`, `amount`, `userid`, `operation`) VALUES
(1, 'Cash A/c', '2018-10-04', 35000, 1, 'pay'),
(2, 'Cash A/c', '2018-09-01', 500, 1, 'receive'),
(3, 'Cash A/c', '2018-09-10', 100, 1, 'receive'),
(4, 'Cash A/c', '2018-10-05', 1000, 1, 'receive'),
(5, 'Cash A/c', '2018-10-05', 3200, 1, 'pay'),
(6, 'Cash A/c', '2018-10-06', 150000, 1, 'pay');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `exp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `exp_ac` varchar(45) NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `exp_catid` int(10) unsigned NOT NULL,
  `amount` double NOT NULL,
  `tran_date` date NOT NULL,
  `payby` varchar(45) NOT NULL,
  `remark` varchar(45) NOT NULL,
  PRIMARY KEY (`exp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`exp_id`, `exp_ac`, `userid`, `exp_catid`, `amount`, `tran_date`, `payby`, `remark`) VALUES
(1, 'Furniture', 1, 1, 35000, '2018-10-04', 'cash', 'Office Furniture'),
(2, 'Vedisoft Fees', 1, 1, 3200, '2018-10-05', 'cash', 'PHP Vedisoft Fees'),
(3, 'Shopping', 1, 2, 5000, '2018-10-01', 'cheque', 'Shopping'),
(4, 'Buisness', 1, 2, 150000, '2018-10-06', 'cash', 'Buisness');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_category`
--

CREATE TABLE IF NOT EXISTS `expenses_category` (
  `exp_catid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `exp_catname` varchar(45) NOT NULL,
  `exp_catdetails` varchar(100) NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`exp_catid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `expenses_category`
--

INSERT INTO `expenses_category` (`exp_catid`, `exp_catname`, `exp_catdetails`, `userid`) VALUES
(1, 'Direct Expense', 'Direct Expense', 1),
(2, 'Indirect Expense', 'Indirect Expense', 1);

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE IF NOT EXISTS `income` (
  `inc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `inc_ac` varchar(45) NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  `inc_catid` int(10) unsigned NOT NULL,
  `amount` double NOT NULL,
  `tran_date` date NOT NULL,
  `receivby` varchar(45) NOT NULL,
  `remark` varchar(45) NOT NULL,
  PRIMARY KEY (`inc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`inc_id`, `inc_ac`, `userid`, `inc_catid`, `amount`, `tran_date`, `receivby`, `remark`) VALUES
(1, 'Business', 1, 1, 150000, '2018-10-04', 'cheque', 'Dairy Product Business '),
(2, 'Tution', 1, 2, 500, '2018-09-01', 'cash', 'Tution'),
(3, 'Sale Paper', 1, 2, 100, '2018-09-10', 'cash', 'Sale Paper'),
(4, 'Salary', 1, 1, 12000, '2018-10-01', 'cheque', 'Salary'),
(5, 'Tution', 1, 2, 1000, '2018-10-05', 'cash', 'Tution'),
(6, 'Buisness', 1, 1, 50000, '2018-10-06', 'cheque', 'Buisness');

-- --------------------------------------------------------

--
-- Table structure for table `income_category`
--

CREATE TABLE IF NOT EXISTS `income_category` (
  `inc_catid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `inc_catname` varchar(45) NOT NULL,
  `inc_catdetails` varchar(45) NOT NULL,
  `userid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`inc_catid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `income_category`
--

INSERT INTO `income_category` (`inc_catid`, `inc_catname`, `inc_catdetails`, `userid`) VALUES
(1, 'Direct Income', 'Direct Income', 1),
(2, 'Indirect Income', 'Indirect Income', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `profile_image` varchar(100) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `name`, `address`, `mobile`, `email`, `profile_image`) VALUES
(1, 'myuser', 'myuser@123', 'Preeti', 'Awadhpuri', '9087654321', 'preeti@mail.com', 'Thu_2018_10_04_15_24_45_img1.jpg'),
(2, 'aarti', 'aarti', 'Aarti Sharma', 'ABC', '9087654321', 'aarti@mail.com', 'Thu_2018_10_04_15_35_46_img10.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
