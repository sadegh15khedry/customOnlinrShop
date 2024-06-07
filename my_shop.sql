-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2021 at 11:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `seller_phone` varchar(15) NOT NULL,
  `item_cat` varchar(15) NOT NULL,
  `item_des` varchar(200) NOT NULL,
  `item_title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `seller_id`, `seller_phone`, `item_cat`, `item_des`, `item_title`) VALUES
(29, 7, 'gdsfgsdfgd', '1', 'gfgfgfg', 'fdgsdg'),
(30, 5, 'Zsdfdsvfdv', '1', 'lsdjhnkabdjbcsd', 'EDFAW'),
(31, 5, '4554', '2', 'sadddfdfdfdsasd', 'ADFA'),
(32, 5, '4565', '2', 'sadasd', 'asdasd'),
(33, 5, 'sadsad', '3', 'asdasdas', 'sadasd'),
(34, 5, 'xzvcxc', '4', 'xzvcxzvczxc', 'sacasdc'),
(35, 5, 'dasfasd', '9', 'asdfsadf', 'ADFAfdsga'),
(36, 5, 'dasf', '8', 'dasfasdfsafasd', 'sdafasf'),
(37, 5, 'rgegreg', '7', 'regregreg', 'asdfasfasdfgteg'),
(38, 5, 'egsergerg', '6', 'rsgergserg', 'grergreagawerg'),
(39, 5, 'dfsgsdfgsdfg', '5', 'sdfgsdfgsdfg', 'sfdgsdfgsdfg'),
(40, 5, '5545555444', '8', 'KJDSJHFJKDHFKJAHDSKJF', 'ADDDDDD'),
(41, 5, '54564458888', '4', 'KDJAOFHDUHWIDHALJDFHUA', 'FFFALIDHFIOAS');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(15) NOT NULL,
  `user_lname` varchar(15) NOT NULL,
  `user_uname` varchar(15) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_uname`, `user_email`, `user_password`) VALUES
(1, '', '', '', '', ''),
(2, '', '', '', '', ''),
(3, '', '', '', '', ''),
(4, '', '', '', '', ''),
(5, '', '', '1', '1', '1'),
(6, '', '', '1', '1', '1'),
(7, '2', '2', '2', '2', '2'),
(8, '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `seller` (`seller_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `seller` FOREIGN KEY (`seller_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
