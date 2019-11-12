-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 12, 2019 at 06:24 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_reddit`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(1, 'java'),
(2, 'python'),
(3, 'c++'),
(4, 'java script'),
(5, 'Angular'),
(6, 'react'),
(7, 'php'),
(8, 'Unity3D'),
(9, 'PC Gaming'),
(10, 'Laravel'),
(11, 'Jango'),
(12, 'C'),
(13, 'C#'),
(14, 'Algorithms'),
(15, 'Data Structures'),
(16, 'Operating System'),
(17, 'Codechef'),
(18, 'Programming'),
(19, 'Phaser');

-- --------------------------------------------------------

--
-- Table structure for table `pivot`
--

CREATE TABLE `pivot` (
  `uid` int(11) DEFAULT NULL,
  `follow` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pivot`
--

INSERT INTO `pivot` (`uid`, `follow`) VALUES
(1, 7),
(8, 12),
(8, 15),
(8, 5),
(8, 7),
(8, 9),
(11, 7);

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `tid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `body` varchar(300) DEFAULT NULL,
  `dateOfCreation` date DEFAULT NULL,
  `creatorId` int(11) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `vote` int(11) DEFAULT '0',
  `status` binary(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`tid`, `title`, `body`, `dateOfCreation`, `creatorId`, `categoryId`, `vote`, `status`) VALUES
(10, 'third', '<p><strong>checking text area</strong></p>\r\n\r\n<p><em>its free and easy to use</em></p>\r\n\r\n<p><em>naice!</em></p>\r\n', '2019-10-30', 1, 7, 0, 0x30),
(11, 'fourth', '<p><strong>checking special characters</strong></p>\r\n\r\n<p>&Ntilde;&frac12;&eth;&ograve;&igrave;</p>\r\n\r\n<ul>\r\n	<li>first</li>\r\n	<li>second</li>\r\n	<li>third</li>\r\n</ul>\r\n', '2019-10-30', 1, 7, 0, 0x30),
(13, 'fifth', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>1</td>\r\n			<td>2</td>\r\n		</tr>\r\n		<tr>\r\n			<td>3</td>\r\n			<td>4</td>\r\n		</tr>\r\n		<tr>\r\n			<td>5</td>\r\n			<td>6</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', '2019-10-30', 1, 7, 0, 0x30),
(14, '6th', '<p>todays posth</p>\r\n', '2019-10-31', 1, 1, 2, 0x30),
(15, 'test', '<p>fhfhjl today php</p>\r\n', '2019-10-31', 1, 7, 0, 0x30),
(16, 'test2', '<p>another today java</p>\r\n', '2019-10-31', 1, 1, 0, 0x30),
(17, 'My first post', '<p>React is awesome</p>\r\n', '2019-11-05', 2, 6, 1, 0x31),
(18, 'PHP_lobe', '<p>PHP is lub</p>\r\n', '2019-11-06', 8, 7, 2, 0x31),
(19, 'Witcher', '<p>Witcher 3 is Awesome af</p>\r\n', '2019-11-06', 8, 9, 0, 0x31),
(20, 'GOW5', '<p>I wanna play god of war 5 :(<strong> :(</strong></p>\r\n', '2019-11-06', 8, 9, 0, 0x31),
(22, 'Gods', '<p><img alt=\"\" src=\"https://cdn.hiptoro.com/wp-content/uploads/2019/04/God-of-War-2018-711x400.jpg\" /></p>\r\n', '2019-11-06', 8, 9, 1, 0x31);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mobile` int(10) NOT NULL,
  `country` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `username`, `password`, `email`, `name`, `mobile`, `country`, `gender`) VALUES
(1, 'anurag', '1234', 'anuragbmore@gmail.com', '', 0, '', ''),
(2, 'kira020', '1234', 'amanagarwal020@gmail.com', '', 0, '', ''),
(8, 'rahul', '1234', 'rahulhambarde300@gamil.com', '', 0, '', ''),
(9, 'prajakta', '5678', 'sonvane.p.r@gmail.com', '', 0, '', ''),
(10, 'vedant-rd', '1234', 'vedant.debadwar@gmail.com', '', 0, '', ''),
(11, 'anurag2', '1234', '2017bcs100@sggs.ac.in', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE `voting` (
  `uid` int(11) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  `upvoted` bit(1) DEFAULT b'0',
  `downvoted` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voting`
--

INSERT INTO `voting` (`uid`, `tid`, `upvoted`, `downvoted`) VALUES
(1, 10, b'0', b'0'),
(1, 15, b'0', b'0'),
(1, 14, b'1', b'0'),
(1, 16, b'0', b'0'),
(2, 14, b'0', b'0'),
(8, 14, b'1', b'0'),
(8, 15, b'0', b'0'),
(8, 17, b'1', b'0'),
(8, 18, b'1', b'0'),
(1, 18, b'1', b'0'),
(1, 22, b'1', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `pivot`
--
ALTER TABLE `pivot`
  ADD KEY `uid` (`uid`),
  ADD KEY `follow` (`follow`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `creatorId` (`creatorId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `voting`
--
ALTER TABLE `voting`
  ADD KEY `uid` (`uid`),
  ADD KEY `tid` (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pivot`
--
ALTER TABLE `pivot`
  ADD CONSTRAINT `pivot_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE,
  ADD CONSTRAINT `pivot_ibfk_2` FOREIGN KEY (`follow`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE;

--
-- Constraints for table `thread`
--
ALTER TABLE `thread`
  ADD CONSTRAINT `thread_ibfk_1` FOREIGN KEY (`creatorId`) REFERENCES `user` (`uid`) ON DELETE CASCADE,
  ADD CONSTRAINT `thread_ibfk_2` FOREIGN KEY (`categoryId`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE;

--
-- Constraints for table `voting`
--
ALTER TABLE `voting`
  ADD CONSTRAINT `voting_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE,
  ADD CONSTRAINT `voting_ibfk_2` FOREIGN KEY (`tid`) REFERENCES `thread` (`tid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
