-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2020 at 09:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pik_pok`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment_likes`
--

CREATE TABLE `comment_likes` (
  `comment_like_id` int(11) NOT NULL,
  `liked_by` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hashtags`
--

CREATE TABLE `hashtags` (
  `hashtag_id` int(11) NOT NULL,
  `hashtag` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `photo_id` int(11) NOT NULL,
  `photo_name` varchar(100) DEFAULT NULL,
  `photo_likes` bigint(20) DEFAULT NULL,
  `photo_path` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `photo_tag` varchar(100) DEFAULT NULL,
  `date_posted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`photo_id`, `photo_name`, `photo_likes`, `photo_path`, `username`, `photo_tag`, `date_posted`) VALUES
(7, 'mod-wasd_2.png', 1, 'uploads/pik_pok_pics/', 'thn12', NULL, '2020-06-05 15:29:12'),
(10, 'kisspng-computer-keyboard-arrow-keys-clip-art-5adca3132730b7.8563640315244091071605.png', 1, 'uploads/pik_pok_pics/', 'thn12', NULL, '2020-06-05 18:35:25'),
(11, 'castaway0.png', 0, 'uploads/pik_pok_pics/', 'thn12', '#summer#beach', '2020-06-10 13:12:38'),
(12, 'corona-summer.jpg', 2, 'uploads/pik_pok_pics/', 'thn12', '#summer#corona', '2020-06-11 17:16:18'),
(13, 'sky2.jpg', 1, 'uploads/pik_pok_pics/', 'mara10', '#sky#summer#bright', '2020-06-12 01:49:13'),
(15, 'filter-sql.png', 0, 'uploads/pik_pok_pics/', 'opl', '#littleBobyTables#SQLjokes', '2020-06-12 02:02:59'),
(16, 'mlk.webp', 2, 'uploads/pik_pok_pics/', 'marigeorgitsa', '#funny#darkhumor', '2020-06-12 02:16:18'),
(17, 'ekthema.png', 2, 'uploads/pik_pok_pics/', 'opl', '#art#spartan#warrior', '2020-06-12 13:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `ip_mac_addresses`
--

CREATE TABLE `ip_mac_addresses` (
  `im_id` int(50) NOT NULL,
  `IP_address` varchar(50) NOT NULL,
  `mac_address` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `login_date` datetime NOT NULL,
  `mobile` tinyint(1) NOT NULL,
  `OS` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ip_mac_addresses`
--

INSERT INTO `ip_mac_addresses` (`im_id`, `IP_address`, `mac_address`, `user_name`, `login_date`, `mobile`, `OS`, `browser`) VALUES
(12, '::1', '3C-A0-67-C1-E3-B2', 'thn12', '2020-09-24 19:29:19', 0, '', ''),
(40, '::1', 'B0-6E-BF-D1-26-0A', 'kostas1234', '2020-09-28 18:58:58', 0, '', ''),
(44, '::1', 'B0-6E-BF-D1-26-0A', 'mara10', '2020-09-28 19:00:37', 0, '', ''),
(47, '::1', 'B0-6E-BF-D1-26-0A', 'opl', '2020-09-28 19:29:11', 0, '', ''),
(53, '::1', 'B0-6E-BF-D1-26-0A', 'asd123', '2020-09-28 20:30:14', 0, '', ''),
(59, '::1', 'B0-6E-BF-D1-26-0A', 'gkal2', '2020-09-28 22:47:57', 0, '', ''),
(66, '192.168.2.2', 'B0-6E-BF-D1-26-0A', 'thn12', '2020-09-29 22:45:33', 1, 'android', 'Google Chrome'),
(67, '::1', 'B0-6E-BF-D1-26-0A', 'thn12', '2020-09-29 22:46:03', 0, 'windows', 'Google Chrome');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `username` varchar(100) NOT NULL,
  `password` mediumtext NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_of_registration` date NOT NULL,
  `id` int(30) NOT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `profile_pic` varchar(100) DEFAULT NULL,
  `picture_path` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`username`, `password`, `fname`, `lname`, `email`, `date_of_registration`, `id`, `sex`, `date_of_birth`, `profile_pic`, `picture_path`) VALUES
('thn12', '202cb962ac59075b964b07152d234b70', 'Μιχάλης', 'Πανταζής', 'asd@uop.gr', '2020-05-21', 40, 0, '1989-06-11', 'anonymous_hacker.jpg', 'uploads/users/40/'),
('mara10', '202cb962ac59075b964b07152d234b70', 'μαρια', 'αντεπαλοβ', 'mrt@iop.com', '2020-06-02', 45, 1, '1987-10-29', 'Screenshot_160.png', 'uploads/users/45/'),
('opl', '202cb962ac59075b964b07152d234b70', 'mlo', 'klo', 'gnasos219@gmail.com', '2020-06-06', 47, 0, '2020-06-02', 'ekthema.png', 'uploads/users/47/'),
('makis', '827ccb0eea8a706c4c34a16891f84e7b', 'makis', 'makis', 'makis@makis.gr', '2020-06-06', 48, 0, '2020-06-30', 'ekthema.png', 'uploads/users/48/'),
('marigeorgitsa', '202cb962ac59075b964b07152d234b70', 'Γιωργίτσα', 'Μακριγεώργου', 'maritsa@maritso.uiop', '2020-06-06', 49, 1, '2020-06-18', 'tupisa.png', 'uploads/users/49/'),
('kostas1234', '81dc9bdb52d04dc20036dbd8313ed055', 'jkfhg', 'fgh', 'sitetest23456@gmail.com', '2020-06-11', 50, 0, '2020-06-17', 'lias.jpg', 'uploads/users/50/'),
('omar', '202cb962ac59075b964b07152d234b70', 'asd', 'asd', 'asda@dfg.gt', '2020-06-11', 51, 0, '2020-06-08', 'wolf2.jpg', 'uploads/users/51/'),
('john2', '12ae8bc20db709fb98c365d1bcc7d7c4', 'john', 'johnson', 'klo@we.ht', '2020-06-11', 52, 0, '1995-02-11', 'default-avatar.jpg', 'images/');

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `post_comments_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_text` text CHARACTER SET utf8 DEFAULT NULL,
  `time_commented` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` (`post_comments_id`, `post_id`, `user_id`, `comment_text`, `time_commented`) VALUES
(65, 7, 40, 'ti einai auto? :P', '2020-06-05 17:09:17'),
(67, 7, 45, 'asd', '2020-06-05 18:37:32'),
(68, 7, 40, 'u 4got w', '2020-06-06 21:03:50'),
(69, 10, 40, 'buttons', '2020-06-10 22:56:28'),
(70, 10, 50, 'βελάκια', '2020-06-11 16:31:38'),
(71, 7, 50, 'ποσο gamer?', '2020-06-11 16:31:57'),
(72, 10, 50, 'jaja', '2020-06-11 16:32:19'),
(73, 13, 45, 'look at the sky :->', '2020-06-12 01:50:23'),
(80, 17, 40, 'true art!! Is it Van Gogh or Picasso?', '2020-06-14 01:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE `post_likes` (
  `post_likes_id` int(11) NOT NULL,
  `liked_by_user` int(11) DEFAULT NULL,
  `posted_photo_id` int(11) DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_likes`
--

INSERT INTO `post_likes` (`post_likes_id`, `liked_by_user`, `posted_photo_id`, `time`) VALUES
(187, 50, 7, '2020-06-11 16:32:50'),
(199, 51, 12, '2020-06-11 19:42:38'),
(676, 45, 16, '2020-06-14 00:23:00'),
(745, 40, 10, '2020-09-20 22:39:48'),
(755, 40, 13, '2020-09-28 22:02:10'),
(757, 40, 16, '2020-09-28 22:02:28'),
(758, 40, 12, '2020-09-28 22:05:05'),
(766, 40, 17, '2020-09-28 22:09:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD PRIMARY KEY (`comment_like_id`);

--
-- Indexes for table `hashtags`
--
ALTER TABLE `hashtags`
  ADD PRIMARY KEY (`hashtag_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `ip_mac_addresses`
--
ALTER TABLE `ip_mac_addresses`
  ADD PRIMARY KEY (`im_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`post_comments_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD PRIMARY KEY (`post_likes_id`),
  ADD KEY `posted_photo_id` (`posted_photo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment_likes`
--
ALTER TABLE `comment_likes`
  MODIFY `comment_like_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hashtags`
--
ALTER TABLE `hashtags`
  MODIFY `hashtag_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `ip_mac_addresses`
--
ALTER TABLE `ip_mac_addresses`
  MODIFY `im_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `post_comments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `post_likes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=768;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `images` (`photo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD CONSTRAINT `post_likes_ibfk_1` FOREIGN KEY (`posted_photo_id`) REFERENCES `images` (`photo_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
