-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2016 at 08:04 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todorest`
--

-- --------------------------------------------------------

--
-- Table structure for table `todoitems`
--

CREATE TABLE `todoitems` (
  `ID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `dueDate` date NOT NULL,
  `isDone` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `todoitems`
--

INSERT INTO `todoitems` (`ID`, `title`, `dueDate`, `isDone`) VALUES
(1, 'buy TV', '2016-10-01', 'false'),
(3, 'go home NEW and UPDATED', '2016-09-30', 'false'),
(4, 'go to home', '0000-00-00', ''),
(5, 'finally go home', '2016-10-10', 'false');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todoitems`
--
ALTER TABLE `todoitems`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todoitems`
--
ALTER TABLE `todoitems`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
