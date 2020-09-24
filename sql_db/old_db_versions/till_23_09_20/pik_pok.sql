-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 16 Ιουν 2020 στις 16:54:39
-- Έκδοση διακομιστή: 10.4.11-MariaDB
-- Έκδοση PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `pik_pok`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `comment_likes`
--

CREATE TABLE `comment_likes` (
  `comment_like_id` int(11) NOT NULL,
  `liked_by` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `hashtags`
--

CREATE TABLE `hashtags` (
  `hashtag_id` int(11) NOT NULL,
  `hashtag` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `images`
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
-- Άδειασμα δεδομένων του πίνακα `images`
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
-- Δομή πίνακα για τον πίνακα `ip_addresses`
--

CREATE TABLE `ip_addresses` (
  `IP_id` int(50) NOT NULL,
  `IP_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `members`
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
-- Άδειασμα δεδομένων του πίνακα `members`
--

INSERT INTO `members` (`username`, `password`, `fname`, `lname`, `email`, `date_of_registration`, `id`, `sex`, `date_of_birth`, `profile_pic`, `picture_path`) VALUES
('thn12', '202cb962ac59075b964b07152d234b70', 'Μιχάλης', 'Πανταζής', 'asd@uop.gr', '2020-05-21', 40, 0, '1987-06-18', 'anonymous_hacker.jpg', 'uploads/users/40/'),
('mara10', '202cb962ac59075b964b07152d234b70', 'μαρια', 'αντεπαλοβ', 'mrt@iop.com', '2020-06-02', 45, 1, '1987-10-29', 'Screenshot_160.png', 'uploads/users/45/'),
('opl', '202cb962ac59075b964b07152d234b70', 'mlo', 'klo', 'gnasos219@gmail.com', '2020-06-06', 47, 0, '2020-06-02', 'ekthema.png', 'uploads/users/47/'),
('makis', '827ccb0eea8a706c4c34a16891f84e7b', 'makis', 'makis', 'makis@makis.gr', '2020-06-06', 48, 0, '2020-06-30', 'ekthema.png', 'uploads/users/48/'),
('marigeorgitsa', '202cb962ac59075b964b07152d234b70', 'Γιωργίτσα', 'Μακριγεώργου', 'maritsa@maritso.uiop', '2020-06-06', 49, 1, '2020-06-18', 'tupisa.png', 'uploads/users/49/'),
('kostas1234', '81dc9bdb52d04dc20036dbd8313ed055', 'jkfhg', 'fgh', 'sitetest23456@gmail.com', '2020-06-11', 50, 0, '2020-06-17', 'lias.jpg', 'uploads/users/50/'),
('omar', '202cb962ac59075b964b07152d234b70', 'asd', 'asd', 'asda@dfg.gt', '2020-06-11', 51, 0, '2020-06-08', 'wolf2.jpg', 'uploads/users/51/'),
('john2', '12ae8bc20db709fb98c365d1bcc7d7c4', 'john', 'johnson', 'klo@we.ht', '2020-06-11', 52, 0, '1995-02-11', 'default-avatar.jpg', 'images/');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `post_comments`
--

CREATE TABLE `post_comments` (
  `post_comments_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_text` text CHARACTER SET utf8 DEFAULT NULL,
  `time_commented` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `post_comments`
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
-- Δομή πίνακα για τον πίνακα `post_likes`
--

CREATE TABLE `post_likes` (
  `post_likes_id` int(11) NOT NULL,
  `liked_by_user` int(11) DEFAULT NULL,
  `posted_photo_id` int(11) DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `post_likes`
--

INSERT INTO `post_likes` (`post_likes_id`, `liked_by_user`, `posted_photo_id`, `time`) VALUES
(187, 50, 7, '2020-06-11 16:32:50'),
(199, 51, 12, '2020-06-11 19:42:38'),
(673, 40, 10, '2020-06-14 00:22:01'),
(676, 45, 16, '2020-06-14 00:23:00'),
(677, 40, 13, '2020-06-14 00:23:33'),
(685, 40, 16, '2020-06-14 14:54:37'),
(729, 40, 12, '2020-06-14 22:19:20'),
(740, 40, 17, '2020-06-16 17:31:13');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD PRIMARY KEY (`comment_like_id`);

--
-- Ευρετήρια για πίνακα `hashtags`
--
ALTER TABLE `hashtags`
  ADD PRIMARY KEY (`hashtag_id`);

--
-- Ευρετήρια για πίνακα `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `username` (`username`);

--
-- Ευρετήρια για πίνακα `ip_addresses`
--
ALTER TABLE `ip_addresses`
  ADD PRIMARY KEY (`IP_id`);

--
-- Ευρετήρια για πίνακα `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`post_comments_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Ευρετήρια για πίνακα `post_likes`
--
ALTER TABLE `post_likes`
  ADD PRIMARY KEY (`post_likes_id`),
  ADD KEY `posted_photo_id` (`posted_photo_id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `comment_likes`
--
ALTER TABLE `comment_likes`
  MODIFY `comment_like_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT για πίνακα `hashtags`
--
ALTER TABLE `hashtags`
  MODIFY `hashtag_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT για πίνακα `images`
--
ALTER TABLE `images`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT για πίνακα `ip_addresses`
--
ALTER TABLE `ip_addresses`
  MODIFY `IP_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT για πίνακα `members`
--
ALTER TABLE `members`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT για πίνακα `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `post_comments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT για πίνακα `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `post_likes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=741;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `images` (`photo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `post_likes`
--
ALTER TABLE `post_likes`
  ADD CONSTRAINT `post_likes_ibfk_1` FOREIGN KEY (`posted_photo_id`) REFERENCES `images` (`photo_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
