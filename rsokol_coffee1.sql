-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 09, 2024 at 02:39 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rsokol_coffee1`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitytracker`
--

CREATE TABLE `activitytracker` (
  `at_id` int(6) NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activity` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `aid` int(6) DEFAULT NULL,
  `cid` int(6) DEFAULT NULL,
  `empid` char(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iid` char(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mfid` char(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pid` char(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `storeid` char(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeid` char(4) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activitytracker`
--

INSERT INTO `activitytracker` (`at_id`, `username`, `dateadded`, `activity`, `aid`, `cid`, `empid`, `iid`, `mfid`, `pid`, `storeid`, `typeid`) VALUES
(2, 'charlie', '0000-00-00 00:00:00', 'Updated a User\'s Admin Status', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'charlie', '0000-00-00 00:00:00', 'Updated a User\'s Admin Status', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'charlie', '0000-00-00 00:00:00', 'Updated a User\'s Admin Status', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'test', '2024-04-24 21:28:58', 'Updated Admin Status of User', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'test', '2024-04-24 21:31:15', 'Updated Admin Status of User', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'test', '2024-04-24 21:32:11', 'Updated Admin Status of charlie', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'test', '2024-04-24 21:35:01', 'Updated Announcement for ST04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'test', '2024-04-24 21:36:55', 'Updated Manager of ST01 to Josh Perez', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'test', '2024-04-24 21:42:26', 'Updated Inventory of PR05 to 5 for ST01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'test', '2024-04-24 21:44:47', 'Updated Employee Krista Williams , Barista, , 13.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'test', '2024-04-24 21:46:29', 'Updated Employee Krista Williams , Barista, , 13.75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'test', '2024-04-24 21:47:24', 'Updated Employee Krista Williams , Barista , 13.25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'test', '2024-04-24 21:49:15', 'Updated Store Address of ST02 to 	8347 Pine Road, Cedar Fall', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `aid` int(6) NOT NULL,
  `adescription` text COLLATE utf8_unicode_ci NOT NULL,
  `storeid` char(4) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`aid`, `adescription`, `storeid`) VALUES
(1, 'We will be switching from oat milk to soy milk as our dairy alternative starting February1st.', 'ST02'),
(2, 'Latte Art Competition will be June 2nd!', 'ST04'),
(3, '	New pay raise coming July 10th!!', 'ST05');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cid` int(6) NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `username`, `comment`) VALUES
(1, 'test', 'We should add soup and sandwiches to our lunch menu!'),
(2, 'test', 'I love the new art in the cedar falls Iowa shop!'),
(3, 'test', 'We are out of oatmilk');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empid` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `storeid` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `empname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `jobtype` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hiredate` date DEFAULT NULL,
  `payrate` decimal(4,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `storeid`, `empname`, `jobtype`, `hiredate`, `payrate`) VALUES
('EM01', 'ST01', 'Krista Williams', 'Barista', '2021-05-26', 13.3),
('EM02', 'ST01', 'Jane Erwin', 'Barista', '2020-07-13', 13.5),
('EM03', 'ST01', 'Joshua Perez', 'Manager', '2021-04-09', 15.0),
('EM04', 'ST02', 'Amara Johnson', 'Barista', '2020-05-22', 13.3),
('EM05', 'ST02', 'Matteo Torres', 'Barista', '2021-07-18', 12.3),
('EM06', 'ST02', 'Camila Garcia', 'Manager', '2020-12-18', 15.0),
('EM07', 'ST03', 'Logan Mitchell', 'Barista', '2022-05-06', 12.3),
('EM08', 'ST03', 'Journee Rivera', 'Barista', '2023-01-02', 12.3),
('EM09', 'ST03', 'Hadley Perez', 'Manager', '2022-05-09', 12.3),
('EM10', 'ST04', 'Ryleigh Nora', 'Manager', '2020-04-22', 15.0),
('EM11', 'ST04', 'Rachel Noel', 'Barista', '2021-09-03', 13.0),
('EM12', 'ST04', 'Alina Roberts', 'Barista', '2021-10-14', 13.5),
('EM13', 'ST05', 'Vincent Walker', 'Barista', '2021-03-11', 13.3),
('EM14', 'ST05', 'Paisley Peterson', 'Barista', '2022-12-12', 12.3),
('EM15', 'ST05', 'River Hall', 'Manager', '2022-07-29', 12.3),
('EM16', 'ST06', 'Braxton Carter', 'Barista', '2022-04-29', 12.3),
('EM17', 'ST06', 'Aiden Moore', 'Barista', '2021-08-15', 13.3),
('EM18', 'ST06', 'Ryan May', 'Manager', '2020-10-23', 15.0),
('EM19', 'ST07', 'Sage Moore', 'Barista', '2020-11-09', 12.5),
('EM20', 'ST07', 'Ryan Scott', 'Barista', '2023-02-17', 12.8),
('EM21', 'ST07', 'Isabelle Perez', 'Manager', '2019-11-03', 15.0),
('EM22', 'ST08', 'Samantha Hill', 'Barista', '2020-10-18', 13.8),
('EM23', 'ST08', 'Sawyer Mitchell', 'Barista', '2021-08-11', 12.5),
('EM24', 'ST08', 'Joseph Hernandez', 'Manager', '2019-11-09', 15.5);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `iid` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `pid` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `storeid` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`iid`, `pid`, `storeid`, `qty`) VALUES
('IN01', 'PR06', 'ST04', 2),
('IN02', 'PR20', 'ST04', 4),
('IN03', 'PR19', 'ST04', 1),
('IN04', 'PR05', 'ST01', 5),
('IN05', 'PR20', 'ST01', 4),
('IN06', 'PR11', 'ST01', 3),
('IN07', 'PR19', 'ST02', 1),
('IN08', 'PR20', 'ST02', 4),
('IN09', 'PR12', 'ST02', 2),
('IN10', 'PR05', 'ST03', 1),
('IN11', 'PR20', 'ST03', 5),
('IN12', 'PR09', 'ST03', 3),
('IN13', 'PR05', 'ST05', 1),
('IN14', 'PR20', 'ST05', 4),
('IN15', 'PR06', 'ST05', 3),
('IN16', 'PR19', 'ST06', 1),
('IN17', 'PR05', 'ST06', 4),
('IN18', 'PR18', 'ST06', 2),
('IN19', 'PR19', 'ST07', 1),
('IN20', 'PR13', 'ST07', 5),
('IN21', 'PR20', 'ST07', 2),
('IN22', 'PR05', 'ST08', 3),
('IN23', 'PR20', 'ST08', 2),
('IN24', 'PR10', 'ST08', 3);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `a_level` int(4) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `datecreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `a_level`, `email`, `datecreated`) VALUES
('charlie', '809a9150a6cfec3dc56be07d448bbe106217e9635db56ddba418f4bce00009852e9eaf3ac6880eed1c3754f308445b619f3da00351d12201221d12b3d2e3e416', 1, '', '0000-00-00'),
('test', '0119e237bdc0b07bc182b81865ad0db4f50807320b6546a2d8d60fb10d717e1a4ae9a403df871932daaf1961f71212a537c60d9d5b0ee57ef0057fdb2f61381a', 0, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `mfid` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `mfname` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`mfid`, `mfname`, `location`) VALUES
('CF01', 'Coffee Bean enterprises', 'Brazil'),
('CF02', 'The Beans Knees', 'Guatamala'),
('CF03', 'Bean Juice Inc.', 'Mexico'),
('CF04', 'Lil Beans', 'Argentina'),
('CF05', 'CoffeeBean Inc.', 'Colombia'),
('CF06', 'Genuine Origin', 'Poland'),
('CF07', 'Espressoland', 'Augsurg, Germany'),
('CF08', 'Beans and Brews', 'Argentina'),
('CF09', 'Heda KG', 'Berlin, Germany'),
('CF10', 'IDEE Coffee', 'Hamburg, Germany'),
('CF11', 'MEGA Coffee', 'Vietnam'),
('CF12', 'Raygil SA Le Monde du Cafe', 'Switzerland'),
('CF13', 'Modena Coffee', 'Austria'),
('CF14', 'Helmut Sachers', 'Czechia'),
('CF15', 'Illy', 'Italy');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `mfid` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `roast` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` decimal(4,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `mfid`, `roast`, `weight`) VALUES
('PR01', 'CF03', 'Light', 5.5),
('PR02', 'CF01', 'Dark', 5.0),
('PR03', 'CF02', 'Medium', 4.5),
('PR04', 'CF04', 'Light', 8.0),
('PR05', 'CF14', 'Dark', 10.0),
('PR06', 'CF14', 'Light', 1.5),
('PR07', 'CF10', 'Medium', 10.5),
('PR08', 'CF05', 'Dark', 6.5),
('PR09', 'CF13', 'Light', 3.0),
('PR10', 'CF11', 'Medium', 7.0),
('PR11', 'CF07', 'Dark', 8.0),
('PR12', 'CF10', 'Light', 2.0),
('PR13', 'CF11', 'Dark', 5.5),
('PR14', 'CF06', 'Medium', 4.0),
('PR15', 'CF08', 'Light', 8.0),
('PR16', 'CF09', 'Dark', 9.5),
('PR17', 'CF15', 'Medium', 5.5),
('PR18', 'CF15', 'Dark', 3.0),
('PR19', 'CF02', 'Light', 10.5),
('PR20', 'CF02', 'Medium', 1.0),
('PR21', 'CF03', 'Dark', 3.5);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `storeid` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manager` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`storeid`, `location`, `address`, `manager`) VALUES
('ST01', 'Iowa', '4786 W State St.,Fort Dodge IA, 50502', 'Josh Perez'),
('ST02', 'Iowa', '	8347 Pine Road, Cedar Falls  IA, 50613', 'Camila Garcia'),
('ST03', 'Iowa', '3749 W Seerley Blvd., Cedar Falls IA, 50613', 'Hadley Perez'),
('ST04', 'Nebraska', '2383 Waylen Lane, York NE, 68467', 'Ryleigh Nora'),
('ST05', 'Nebraska', '45739 Jonia St., Lincoln NE, 68516', 'River Hall'),
('ST06', 'Illinois', '9853 Ivy Blvd., Peria IL, 61605', 'Ryan May'),
('ST07', 'Illinois', '92740 Lent Rd., Spring IL 62546', 'Isabelle Perez'),
('ST08', 'Minnesota', '26484 Oak Ln., Minneapolis MN 45269', 'Joseph Hernandez');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `typeid` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `pid` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`typeid`, `pid`, `name`) VALUES
('TY01', 'PR03', 'House Blend'),
('TY02', 'PR02', 'Brazil'),
('TY03', 'PR03', 'Guatamala'),
('TY04', 'PR21', 'Mexico'),
('TY05', 'PR12', 'Breakfast Blend'),
('TY06', 'PR06', 'Holiday Blend'),
('TY07', 'PR10', 'La Minita'),
('TY08', 'PR20', 'Espresso'),
('TY09', 'PR17', 'Italia'),
('TY10', 'PR06', 'Czech'),
('TY11', 'PR09', 'Austria'),
('TY12', 'PR11', 'Mocha Java'),
('TY13', 'PR08', 'Sumatra'),
('TY14', 'PR19', 'Decaf Espresso'),
('TY15', 'PR05', 'Decaf House Blend'),
('TY16', 'PR18', 'French Roast'),
('TY17', 'PR13', 'Vietnamese');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitytracker`
--
ALTER TABLE `activitytracker`
  ADD PRIMARY KEY (`at_id`),
  ADD KEY `username` (`username`),
  ADD KEY `aid` (`aid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `empid` (`empid`),
  ADD KEY `iid` (`iid`),
  ADD KEY `mfid` (`mfid`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `storeid` (`storeid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empid`),
  ADD KEY `fk_storeid3` (`storeid`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`iid`),
  ADD KEY `fk_pid3` (`pid`),
  ADD KEY `fk_storeid2` (`storeid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`mfid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `fk_mfid` (`mfid`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`storeid`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`typeid`),
  ADD KEY `fk_pid2` (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activitytracker`
--
ALTER TABLE `activitytracker`
  MODIFY `at_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `aid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activitytracker`
--
ALTER TABLE `activitytracker`
  ADD CONSTRAINT `activitytracker_ibfk_1` FOREIGN KEY (`username`) REFERENCES `login` (`username`),
  ADD CONSTRAINT `activitytracker_ibfk_2` FOREIGN KEY (`aid`) REFERENCES `announcements` (`aid`),
  ADD CONSTRAINT `activitytracker_ibfk_3` FOREIGN KEY (`cid`) REFERENCES `comments` (`cid`),
  ADD CONSTRAINT `activitytracker_ibfk_4` FOREIGN KEY (`empid`) REFERENCES `employee` (`empid`),
  ADD CONSTRAINT `activitytracker_ibfk_5` FOREIGN KEY (`iid`) REFERENCES `inventory` (`iid`),
  ADD CONSTRAINT `activitytracker_ibfk_6` FOREIGN KEY (`mfid`) REFERENCES `manufacturer` (`mfid`);

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_ibfk_1` FOREIGN KEY (`storeid`) REFERENCES `store` (`storeid`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`username`) REFERENCES `login` (`username`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_storeid3` FOREIGN KEY (`storeid`) REFERENCES `store` (`storeid`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `fk_pid3` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`),
  ADD CONSTRAINT `fk_storeid2` FOREIGN KEY (`storeid`) REFERENCES `store` (`storeid`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_mfid` FOREIGN KEY (`mfid`) REFERENCES `manufacturer` (`mfid`);

--
-- Constraints for table `types`
--
ALTER TABLE `types`
  ADD CONSTRAINT `fk_pid2` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
