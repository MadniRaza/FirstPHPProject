-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 02, 2015 at 12:48 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bluepumpkin`
--
CREATE DATABASE `bluepumpkin` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bluepumpkin`;

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE IF NOT EXISTS `tbladmin` (
  `A_ID` int(11) NOT NULL AUTO_INCREMENT,
  `A_Name` varchar(20) DEFAULT NULL,
  `A_Email` varchar(30) DEFAULT NULL,
  `A_CellNo` varchar(20) DEFAULT NULL,
  `A_Address` varchar(100) DEFAULT NULL,
  `A_Img` varchar(10) DEFAULT NULL,
  `A_LoginName` varchar(20) DEFAULT NULL,
  `A_Loginpass` varchar(20) DEFAULT NULL,
  `A_JDate` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`A_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`A_ID`, `A_Name`, `A_Email`, `A_CellNo`, `A_Address`, `A_Img`, `A_LoginName`, `A_Loginpass`, `A_JDate`) VALUES
(1, 'Raza', 'mmr9226@gmail.com', '03009254033', 'Karachi Pakistan', '1', 'Raza', '123', '10-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE IF NOT EXISTS `tblemployees` (
  `Emp_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Emp_Name` varchar(20) DEFAULT NULL,
  `Emp_Email` varchar(20) DEFAULT NULL,
  `Emp_CellNo` varchar(20) DEFAULT NULL,
  `Emp_Address` varchar(100) DEFAULT NULL,
  `Emp_Img` varchar(10) DEFAULT NULL,
  `Emp_LoginName` varchar(20) DEFAULT NULL,
  `Emp_Loginpass` varchar(20) DEFAULT NULL,
  `Emp_JDate` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Emp_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`Emp_ID`, `Emp_Name`, `Emp_Email`, `Emp_CellNo`, `Emp_Address`, `Emp_Img`, `Emp_LoginName`, `Emp_Loginpass`, `Emp_JDate`) VALUES
(1, 'Umar Hanif', 'UH@bluepumpkin.com', '03001234567', 'Karachi pakistan', '1', 'Umar', '123', '11-12-14'),
(2, 'abdul Wahab', 'Aw@bluepumpkin.com', '03001234567', 'Karachi pakistan', '2', 'awahab', '123', '12-12-14'),
(3, 'Shahzaib', 's@bluepumpkin.com', '03001234567', 'Lahore Pakistan', '3', 'shahzaib', '123', '13-12-14'),
(4, 'Abdul Ghani', 'ag@bluepumkin.com', '03001234567', 'Peshawar Pakistan', '4', 'aghani', '123', '14-12-14'),
(5, 'Muhammad Madni Raza', 'mmr@bluepumpkin.com', '03001234567', 'Karachi Pakistan', '5', 'mmr9226', '123', '10-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbleventrequests`
--

CREATE TABLE IF NOT EXISTS `tbleventrequests` (
  `ER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Emp_ID` int(11) DEFAULT NULL,
  `E_Id` int(11) DEFAULT NULL,
  `ER_Date` varchar(10) DEFAULT NULL,
  `ER_Status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ER_ID`),
  KEY `Emp_ID` (`Emp_ID`),
  KEY `E_Id` (`E_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbleventrequests`
--

INSERT INTO `tbleventrequests` (`ER_ID`, `Emp_ID`, `E_Id`, `ER_Date`, `ER_Status`) VALUES
(1, 5, 1, '31-12-14', 'pending'),
(3, 5, 10, '31-12-14', 'pending'),
(4, 5, 9, '31-12-14', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `tblevents`
--

CREATE TABLE IF NOT EXISTS `tblevents` (
  `E_Id` int(11) NOT NULL AUTO_INCREMENT,
  `E_Name` varchar(30) DEFAULT NULL,
  `E_Date` varchar(10) DEFAULT NULL,
  `E_Desc` varchar(250) DEFAULT NULL,
  `EC_id` int(11) DEFAULT NULL,
  `E_Img` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`E_Id`),
  KEY `EC_id` (`EC_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tblevents`
--

INSERT INTO `tblevents` (`E_Id`, `E_Name`, `E_Date`, `E_Desc`, `EC_id`, `E_Img`) VALUES
(1, 'Target', '28-01-15', 'Bowling Competition organized on 28 january 2015. at 12:00 AM. Participate and be the Winner. ', 1, '1'),
(2, 'Encounter', '05-01-14', 'Counter Strike Game Competition  Organized on 05 january 14. at 12:00 AM. Participate and be a Winner. ', 1, '2'),
(3, 'CrickMaster', '01-02-14', 'Cricket Game Competition  Organized on 01 Feb 14. at 12:00 AM. Participate and be a Winner. ', 1, '3'),
(4, 'Try Ice on you', '01-01-15', 'Ice Bucket Challenge  Organized on 01 january 15. at 12:00 AM. Participate and be a Winner. ', 1, '4'),
(5, 'Speeders', '28-01-15', 'Need for speed Game Competition  Organized on 28 january 14. at 12:00 AM. Participate and be a Winner. ', 1, '5'),
(6, 'GTA 5', '25-02-14', 'Play GTA 5 and get an awesome prize by winning the Game', 1, '6'),
(7, 'GTA Vice City', '25-02-14', 'Play GTA 5 and get an awesome prize by winning the Game', 2, '7'),
(8, 'Speeders', '03-01-14', 'Play Need For Speed and get an awesome prize by winning the Game', 2, '8'),
(9, 'PoP', '01-03-14', 'Play Prince of Persia with xbox 360', 2, '9'),
(10, 'Its Bill Gates Time', '01-03-14', 'Arrange meeting with bill gates in order to discuss our new product "Sikon"', 3, '10'),
(11, 'HR Promotions', '01-03-14', 'All Employees are requested to join, dated: 01-03-14', 3, '11');

-- --------------------------------------------------------

--
-- Table structure for table `tbleventscategory`
--

CREATE TABLE IF NOT EXISTS `tbleventscategory` (
  `EC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EC_Name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`EC_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbleventscategory`
--

INSERT INTO `tbleventscategory` (`EC_ID`, `EC_Name`) VALUES
(1, 'Competitions'),
(2, 'Games'),
(3, 'Meetings');

-- --------------------------------------------------------

--
-- Table structure for table `tbleventwinnerdetails`
--

CREATE TABLE IF NOT EXISTS `tbleventwinnerdetails` (
  `EW_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Emp_Id` int(11) DEFAULT NULL,
  `EW_Desc` varchar(100) DEFAULT NULL,
  `E_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`EW_ID`),
  KEY `Emp_Id` (`Emp_Id`),
  KEY `E_ID` (`E_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbleventwinnerdetails`
--

INSERT INTO `tbleventwinnerdetails` (`EW_ID`, `Emp_Id`, `EW_Desc`, `E_ID`) VALUES
(1, 1, 'ICe Bucket Challenge Winner', 4),
(2, 2, 'Cricket Match Winner', 3),
(3, 4, 'Counter Strike Competition Winner', 2),
(4, 3, 'GTA 5 Game WInner', 6),
(5, 3, 'GTA 5 Game WInner', 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
