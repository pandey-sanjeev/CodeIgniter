-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 06:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ciproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(5) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL,
  `active` varchar(5) NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `name`, `email`, `password`, `active`, `created_date`) VALUES
(1, 'sanjeev', 'sanjeev@gmail.com', 'Sanjeev', '1', '0000-00-00'),
(2, 'test', 'test@gmail.com', 'test', '1', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `allproduct`
--

CREATE TABLE `allproduct` (
  `productid` int(5) NOT NULL,
  `productname` varchar(25) NOT NULL,
  `aboutproduct` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `adminid` int(5) NOT NULL,
  `active` int(5) NOT NULL,
  `created_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allproduct`
--

INSERT INTO `allproduct` (`productid`, `productname`, `aboutproduct`, `image`, `adminid`, `active`, `created_date`) VALUES
(20, 'car', 'this is car', 'image/1.jpg', 0, 1, '2022-04-14 16:25:46'),
(21, 'bike', 'about bile', 'image/13.jpg', 2, 1, '2022-04-14 16:54:55'),
(22, 'laptop', 'this is laptop', 'image/39.jpg', 0, 1, '2022-04-14 21:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `fathername` varchar(30) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `adminid` varchar(5) NOT NULL,
  `active` varchar(5) NOT NULL,
  `created_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `name`, `fathername`, `dob`, `email`, `password`, `address`, `adminid`, `active`, `created_date`) VALUES
(17, 'test user', 'test father', '2022-04-14', 'testuser@gmail.com', 'testuser', 'testaddress', '1', '1', '2022-04-14 21:18:52'),
(18, 'pandey', 'pandeyfather', '2022-04-14', 'pandey@gmail.com', 'pandey', 'address of pandey', '', '1', '2022-04-14 16:34:39'),
(19, 'satyam', 'satyam father', '2022-04-14', 'satyam@gmail.com', 'satyam', 'lucknow', '1', '1', '2022-04-14 21:15:51'),
(20, 'skp', 'skp', '2022-04-14', 'skp@gmail.com', 'skpandey', 'lucknow', '', '1', '2022-04-14 21:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `userorderproduct`
--

CREATE TABLE `userorderproduct` (
  `orderid` int(5) NOT NULL,
  `productid` int(5) NOT NULL,
  `userid` int(5) NOT NULL,
  `is_deleted` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userorderproduct`
--

INSERT INTO `userorderproduct` (`orderid`, `productid`, `userid`, `is_deleted`) VALUES
(33, 20, 18, '1'),
(34, 21, 18, '1'),
(41, 22, 19, '1'),
(42, 20, 19, '1'),
(43, 20, 20, '0'),
(44, 21, 20, '0'),
(45, 21, 20, '1'),
(46, 20, 20, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `allproduct`
--
ALTER TABLE `allproduct`
  ADD PRIMARY KEY (`productid`),
  ADD KEY `adminid` (`adminid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `adminid` (`adminid`);

--
-- Indexes for table `userorderproduct`
--
ALTER TABLE `userorderproduct`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `productid` (`productid`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `allproduct`
--
ALTER TABLE `allproduct`
  MODIFY `productid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `userorderproduct`
--
ALTER TABLE `userorderproduct`
  MODIFY `orderid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
