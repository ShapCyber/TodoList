-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2017 at 04:51 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `businessweek`
--

CREATE TABLE `businessweek` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `businessweek`
--

INSERT INTO `businessweek` (`id`, `name`, `created_at`) VALUES
(1, 'Week-32', '2017-08-07 12:35:34'),
(2, 'Week-33', '2017-08-07 12:37:47'),
(3, 'Week-34', '2017-08-07 12:40:53'),
(4, 'Week-35', '2017-08-07 13:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `taskposts`
--

CREATE TABLE `taskposts` (
  `taskId` int(11) NOT NULL,
  `businessWeekId` varchar(200) NOT NULL,
  `taskTitle` varchar(300) NOT NULL,
  `dateTime` varchar(255) NOT NULL,
  `taskPriority` varchar(255) NOT NULL,
  `taskStatus` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taskposts`
--

INSERT INTO `taskposts` (`taskId`, `businessWeekId`, `taskTitle`, `dateTime`, `taskPriority`, `taskStatus`, `createdAt`) VALUES
(1, 'Week-35', 'See mr geoge about the new plan', '26-09-2017@11:08', 'High', 0, '2017-08-07 12:35:34'),
(2, 'Week-32', 'Manage complexity by breaking big projects into smaller sub-projects (multi-level).', '07-08-2017@05:30', 'Medium', 0, '2017-08-07 12:36:21'),
(3, 'Week-32', 'Share projects, delegate tasks and discuss details - on any device or platform!', '07-08-2017@05:51', 'Medium', 0, '2017-08-07 12:37:02'),
(4, 'Week-33', 'Share projects, delegate tasks and discuss details - on any device or platform!', '15-08-2017@09:33', 'Medium', 0, '2017-08-07 12:37:47'),
(5, 'Week-33', 'Get notified when important changes happen via emails or push notifications.', '15-08-2017@09:15', 'Low', 0, '2017-08-07 12:38:15'),
(6, 'Week-33', 'Easily add due dates using normal language, such as “monday at 2pm”.', '15-08-2017@10:15', 'High', 0, '2017-08-07 12:38:57'),
(7, 'Week-33', 'Create repeating due dates naturally like typing “every friday at 8am”.', '15-08-2017@10:04', 'Medium', 0, '2017-08-07 12:39:27'),
(9, 'Week-34', 'Get reminded via email, push notification or SMS. Also receive location-based alerts when on?the?go.', '22-08-2017@10:10', 'High', 0, '2017-08-07 12:40:52'),
(10, 'Week-34', 'Add as many details as you want using task comments. Or attach PDFs, spreadsheets or photos.', '11-08-2017@18:10', 'Low', 0, '2017-08-07 12:41:24'),
(11, 'Week-34', 'Put tasks into contexts via labels, a great way to become even more organized. Create custom filters that fit your workflow.', '24-08-2017@08:00', 'Medium', 0, '2017-08-07 12:44:00'),
(13, 'Week-35', 'Draw site layout and speak to Mr John', '09-08-2017@10:10', 'Medium', 0, '2017-08-07 13:35:21'),
(14, 'Week-32', 'Photo ofManage complexity by breaking big projects into smaller sub-projects (multi-level).', '15-08-2017@14:00', 'Low', 0, '2017-08-07 13:37:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `businessweek`
--
ALTER TABLE `businessweek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taskposts`
--
ALTER TABLE `taskposts`
  ADD PRIMARY KEY (`taskId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `businessweek`
--
ALTER TABLE `businessweek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `taskposts`
--
ALTER TABLE `taskposts`
  MODIFY `taskId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
