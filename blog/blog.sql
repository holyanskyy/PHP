-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2016 at 07:16 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `ID` int(11) NOT NULL,
  `authorID` int(11) NOT NULL,
  `pubDate` date NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `imagePath` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`ID`, `authorID`, `pubDate`, `title`, `body`, `imagePath`) VALUES
(2, 1, '2016-09-23', 'go to school', 'Lorep ipsum go to school Lorep ipsum go to school Lorep ipsum go to school Lorep ipsum go to school', ''),
(3, 1, '2016-09-23', 'how to grow flowers', 'lorep ipsum how to grow flowers lorep ipsum how to grow flowers lorep ipsum how to grow flowers lorep ipsum how to grow flowers', 'uploads/a12272005d534380b903bb41f0ac5d35.jpeg'),
(4, 1, '2016-09-23', 'how to grow  a flowers', 'how to grow  a flowershow to grow  a flowersvhow to grow  a flowershow to grow  a flowershow to grow  a flowers', 'uploads/bc208754d342c63399ae3b08f22e7edb.jpeg'),
(5, 1, '2016-09-23', 'how to see a coala', 'how to see a coala how to see a coalahow to see a coalahow to see a coalahow to see a coalahow to see a coala', 'uploads/26aa287d117f1c0b994cc81440e0d9c7.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `articleID` int(11) NOT NULL,
  `authorID` int(11) NOT NULL,
  `body` varchar(1000) NOT NULL,
  `pubTimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `name`, `email`, `password`) VALUES
(1, 'nazar', 'gol@gol.gmail', 'abcABC123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `authorID` (`authorID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `articleID` (`articleID`),
  ADD KEY `authorID` (`authorID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`authorID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`articleID`) REFERENCES `articles` (`ID`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`authorID`) REFERENCES `users` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
