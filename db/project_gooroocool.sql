-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2016 at 01:47 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_gooroocool`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `blog_title` text NOT NULL,
  `blog_description` text NOT NULL,
  `blog_content` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_title`, `blog_description`, `blog_content`, `username`, `time`) VALUES
(1, 'My First BlogSomething to be writen. Something to be writen. SSomething to be writen. Something to be writen. Something to be writen. Something to be writen. omething to be writen. ', ' Something to be writen. ', 'Something to be writen. Something to be writen. Something to be writen. Something to be writen. Something to be writen. Something to be writen. Something to be writen. Something to be writen. Something to be writen. Something to be writen. Something to be writen. Something to be writen. Something to be writen. Something to be writen. Something to be writen. Something to be writen. Something to be writen. ', 'sachinsapkal181@gmail.com', '2016-09-27 09:58:05'),
(2, ' ahshfgfhasgfd ', ' ahshfgfhasgfd  ahshfgfhasgfd ', ' ahshfgfhasgfd  ahshfgfhasgfd  ahshfgfhasgfd  ahshfgfhasgfd  ahshfgfhasgfd ', 'mahendra@gmail.com', '2016-09-27 13:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `chatting`
--

CREATE TABLE `chatting` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatting`
--

INSERT INTO `chatting` (`id`, `sender_id`, `receiver_id`, `message`, `time`) VALUES
(1, 2, 1, 'hi', '2016-09-27 10:02:10'),
(2, 0, 0, '', '2016-09-27 10:11:55'),
(3, 2, 1, 'hey', '2016-09-27 10:22:21'),
(4, 2, 1, 'asdf', '2016-09-27 10:41:51'),
(5, 2, 1, 'h', '2016-09-27 11:00:29'),
(6, 2, 1, 'a', '2016-09-27 11:19:23'),
(7, 2, 1, 'g', '2016-09-27 11:20:07'),
(8, 2, 1, 'hg', '2016-09-27 11:30:53'),
(9, 2, 1, 's', '2016-09-27 11:38:05'),
(10, 2, 1, 'erhg', '2016-09-27 11:52:33'),
(11, 2, 1, '', '2016-09-27 11:56:46'),
(12, 2, 1, '', '2016-09-27 11:56:49'),
(13, 2, 1, '', '2016-09-27 11:57:00'),
(14, 2, 1, '', '2016-09-27 11:57:01'),
(15, 2, 1, '', '2016-09-27 11:57:02'),
(16, 2, 1, '', '2016-09-27 11:57:02'),
(17, 2, 1, '', '2016-09-27 11:57:03'),
(18, 2, 1, '', '2016-09-27 11:57:11'),
(19, 2, 1, '', '2016-09-27 11:59:33'),
(20, 2, 1, '', '2016-09-27 11:59:34'),
(21, 2, 1, '', '2016-09-27 11:59:43'),
(22, 2, 1, '', '2016-09-27 12:01:08'),
(23, 2, 1, '', '2016-09-27 12:01:09'),
(24, 2, 1, 'hhdf', '2016-09-27 12:02:37'),
(25, 2, 1, 'AA', '2016-09-27 12:11:55'),
(26, 2, 1, '', '2016-09-27 12:11:56'),
(27, 2, 1, '', '2016-09-27 12:11:57'),
(28, 2, 1, 'HDFB', '2016-09-27 12:12:02'),
(29, 2, 1, 'jd', '2016-09-27 12:12:09'),
(30, 2, 2, 'sgd', '2016-09-27 12:13:20'),
(31, 2, 2, 'manda', '2016-09-27 12:15:55'),
(32, 1, 1, 'hey', '2016-09-27 12:17:20'),
(33, 2, 2, 'f', '2016-09-27 12:17:36'),
(34, 2, 1, 'hello', '2016-09-27 12:19:07'),
(35, 1, 2, 'hi', '2016-09-27 12:19:21'),
(36, 1, 2, 'kay krtos', '2016-09-27 12:19:37'),
(37, 1, 2, 'df', '2016-09-27 12:19:42'),
(38, 2, 1, 'df', '2016-09-27 12:19:47'),
(39, 2, 2, 'hbhy', '2016-09-27 12:24:25'),
(40, 2, 1, 'fb', '2016-09-27 12:24:47'),
(41, 2, 1, 'hi', '2016-09-27 23:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `dob` date NOT NULL,
  `college` text NOT NULL,
  `class` varchar(20) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `division` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `firstname`, `lastname`, `username`, `password`, `dob`, `college`, `class`, `branch`, `division`) VALUES
(1, 'Sachin', 'Sapkal', 'sachinsapkal181@gmail.com', 'OÑòVüôÄª³Ýz>ýFã/', '1995-11-12', 'STES''s SIT Lonavala', 'TE', 'Computer', 'Div-C'),
(2, 'Mahendra', 'Sapkal', 'mahendra@gmail.com', 'ƒü;²+±iXRŸR®j£ÆÕt›þ¦', '1984-01-10', 'STES''s SIT Lonavala', 'BE', 'Computer', 'Div-C'),
(3, 'Raj', 'Patil', 'raj@gmail.com', '.„`ô¹Aï¬ÜiIde´òˆµ´#', '1994-06-15', 'STES''s SIT Lonavala', 'SE', 'Computer', 'Div-A'),
(4, 'Satya', 'Patil', 'satya@gmail.com', 'T.&,Šî­À0•g‡ªÞ´äÍ;Õ>', '1996-12-02', 'STES''s SIT Lonavala', 'TE', 'Computer', 'Div-B');

-- --------------------------------------------------------

--
-- Table structure for table `user_post_upload`
--

CREATE TABLE `user_post_upload` (
  `id` int(11) NOT NULL,
  `pic_address` text NOT NULL,
  `description` text NOT NULL,
  `status` text,
  `likes` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_post_upload`
--

INSERT INTO `user_post_upload` (`id`, `pic_address`, `description`, `status`, `likes`, `username`, `date`) VALUES
(1, 'images/tnt1yetrmk07010kax79pi96rfn4tbozjx29nkkr.jpg', 'Bhushidam @ Lonavala', '0', 0, 'mahendra@gmail.com', '2016-09-27 10:30:18'),
(2, 'images/xyfo93w2z1ptsz81yb9adet1j7gdrdb5dq992l6x.jpg', '', '0', 0, 'mahendra@gmail.com', '2016-09-27 10:30:37'),
(3, '', '', '0', 0, 'mahendra@gmail.com', '2016-09-27 10:31:00'),
(4, 'images/rv1vlho0k5gykuiacyewcl32b8061vvch9obpgv6.jpg', '', '0', 0, 'mahendra@gmail.com', '2016-09-27 10:33:25'),
(5, 'images/tl612orqw9itdhjp086arl19mf0zoorcyoyo42bb.jpg', '', NULL, 0, 'mahendra@gmail.com', '2016-09-27 10:36:26'),
(6, '', '', '0', 0, 'mahendra@gmail.com', '2016-09-27 10:40:49'),
(7, 'images/19n6t0xdfosjrem0am5afl0j9fitg3t94cwo3dhr.jpg', 'Lonavala', NULL, 0, 'mahendra@gmail.com', '2016-09-27 10:41:19'),
(8, '', '', '0', 0, 'mahendra@gmail.com', '2016-09-27 13:13:29'),
(9, '', '', '0', 0, 'mahendra@gmail.com', '2016-09-27 13:13:43'),
(10, '', '', '0', 0, 'mahendra@gmail.com', '2016-09-27 13:14:28'),
(11, '', '', '0', 0, 'mahendra@gmail.com', '2016-09-27 13:15:03'),
(12, '', '', '0', 0, 'mahendra@gmail.com', '2016-09-27 13:16:47'),
(13, '', '', '0', 0, 'mahendra@gmail.com', '2016-09-27 13:17:11'),
(14, '', '', '0', 0, 'mahendra@gmail.com', '2016-09-27 13:32:47'),
(15, '', '', '0', 0, 'mahendra@gmail.com', '2016-09-27 13:33:58'),
(16, '', '', '0', 0, 'mahendra@gmail.com', '2016-09-27 13:34:16'),
(17, 'images/qa2tjnx7auokl687xl3z9jmohvr2uzp0tybmetxm.jpg', '', NULL, 0, 'mahendra@gmail.com', '2016-09-27 13:40:52'),
(18, '', '', '0', 0, 'mahendra@gmail.com', '2016-09-27 13:41:10'),
(19, '', '', '0', 0, 'mahendra@gmail.com', '0000-00-00 00:00:00'),
(20, '', '', '0', 0, 'mahendra@gmail.com', '0000-00-00 00:00:00'),
(21, '', '', '0', 0, 'mahendra@gmail.com', '0000-00-00 00:00:00'),
(22, '', '', 'hsfjhsdf', 0, 'mahendra@gmail.com', '0000-00-00 00:00:00'),
(23, '', '', 'jdshf', 0, 'mahendra@gmail.com', '0000-00-00 00:00:00'),
(24, '', '', 'sdffjsd', 0, 'mahendra@gmail.com', '2016-09-27 13:51:30'),
(25, '', '', 'new status', 0, 'mahendra@gmail.com', '2016-09-27 13:51:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatting`
--
ALTER TABLE `chatting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_post_upload`
--
ALTER TABLE `user_post_upload`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `chatting`
--
ALTER TABLE `chatting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_post_upload`
--
ALTER TABLE `user_post_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
