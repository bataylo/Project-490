-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2021 at 02:09 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csci490`
--

-- --------------------------------------------------------

--
-- Table structure for table `cardcondition`
--

CREATE TABLE `cardcondition` (
  `cardConditionid` int(11) NOT NULL,
  `cardCondition` varchar(225) NOT NULL,
  `cardGrader` varchar(225) DEFAULT NULL,
  `cardGrade` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cardcondition`
--

INSERT INTO `cardcondition` (`cardConditionid`, `cardCondition`, `cardGrader`, `cardGrade`) VALUES
(1, 'Great', 'Beckett', 7.5),
(2, 'Good', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cardgame`
--

CREATE TABLE `cardgame` (
  `cardGameid` int(11) NOT NULL,
  `cardGameName` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cardgame`
--

INSERT INTO `cardgame` (`cardGameid`, `cardGameName`) VALUES
(1, 'Magic: The Gathering');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `cardid` int(6) NOT NULL,
  `cardName` varchar(255) NOT NULL,
  `cardGameid` int(2) NOT NULL,
  `cardConditionid` int(2) NOT NULL,
  `cardsetid` int(4) NOT NULL,
  `cardImage` varchar(255) DEFAULT NULL,
  `cardPrice` double(6,2) DEFAULT NULL,
  `cardQuantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`cardid`, `cardName`, `cardGameid`, `cardConditionid`, `cardsetid`, `cardImage`, `cardPrice`, `cardQuantity`) VALUES
(1, 'Tarmogoyf', 2, 3, 1, 'https://product-images.tcgplayer.com/fit-in/400x558/15004.jpg', 99.99, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cardset`
--

CREATE TABLE `cardset` (
  `cardsetid` int(11) NOT NULL,
  `cardsetname` varchar(225) NOT NULL,
  `cardsetReleaseYear` year(4) NOT NULL,
  `cardsetimage` varchar(225) DEFAULT NULL,
  `cardGameid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cardset`
--

INSERT INTO `cardset` (`cardsetid`, `cardsetname`, `cardsetReleaseYear`, `cardsetimage`, `cardGameid`) VALUES
(1, 'Arabian Nights', 1993, 'https://media.magic.wizards.com/images/featured/003_ARN_Header.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cardcondition`
--
ALTER TABLE `cardcondition`
  ADD PRIMARY KEY (`cardConditionid`);

--
-- Indexes for table `cardgame`
--
ALTER TABLE `cardgame`
  ADD PRIMARY KEY (`cardGameid`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`cardid`);

--
-- Indexes for table `cardset`
--
ALTER TABLE `cardset`
  ADD PRIMARY KEY (`cardsetid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cardcondition`
--
ALTER TABLE `cardcondition`
  MODIFY `cardConditionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cardgame`
--
ALTER TABLE `cardgame`
  MODIFY `cardGameid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cardset`
--
ALTER TABLE `cardset`
  MODIFY `cardsetid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
