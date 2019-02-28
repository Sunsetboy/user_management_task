-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 28, 2019 at 01:50 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.1.26-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'primary key',
  `name` varchar(255) NOT NULL COMMENT 'user name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`) VALUES
(1, 'Michael'),
(2, 'Vladimir'),
(3, 'Donald');

-- --------------------------------------------------------

--
-- Table structure for table `user2group`
--

CREATE TABLE `user2group` (
  `uid` int(11) NOT NULL COMMENT 'user id',
  `gid` int(11) NOT NULL COMMENT 'group id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user2group`
--

INSERT INTO `user2group` (`uid`, `gid`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL COMMENT 'primary key',
  `name` varchar(255) NOT NULL COMMENT 'group name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `name`) VALUES
(1, 'presidents'),
(2, 'admins'),
(4, 'Superheroes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user2group`
--
ALTER TABLE `user2group`
  ADD UNIQUE KEY `uid_gid` (`uid`,`gid`) USING BTREE;

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
