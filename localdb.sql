-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Nov 16, 2016 at 05:10 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `paint`
--

-- --------------------------------------------------------

--
-- Table structure for table `paints`
--

CREATE TABLE `paints` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` varchar(4) NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `img` varchar(90) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paints`
--

INSERT INTO `paints` (`ID`, `title`, `year`, `height`, `width`, `img`) VALUES
(1, 'Cherry Lips', '2014', 12, 24, 'img/cherrylips.jpg'),
(2, 'Grandbaby Purp  ', '2014', 18, 18, 'img/grandbabypurp.jpg'),
(3, 'Blues ', '2014', 20, 16, 'img/blues.jpg'),
(4, '1000 Yard Stare', '2015', 20, 16, 'img/1000yardstare.jpg'),
(5, 'Surprise!', '2015', 20, 16, 'img/surprize.jpg'),
(6, 'The Clown', '2015', 20, 16, 'img/clown.jpg'),
(7, 'Broken Sadness', '2015', 20, 16, 'img/teardrop.jpg'),
(8, 'The Bird King', '2014', 30, 30, 'img/birdking.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paints`
--
ALTER TABLE `paints`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paints`
--
ALTER TABLE `paints`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;