-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 02 Ιουν 2020 στις 20:32:51
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
  `photo_name` varchar(50) DEFAULT NULL,
  `photo_likes` bigint(20) DEFAULT NULL,
  `photo_path` varchar(80) DEFAULT NULL,
  `username` varchar(80) DEFAULT NULL,
  `photo_tag` varchar(50) DEFAULT NULL,
  `date_posted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `images`
--

INSERT INTO `images` (`photo_id`, `photo_name`, `photo_likes`, `photo_path`, `username`, `photo_tag`, `date_posted`) VALUES
(1, '9f65d3bd25501cccc0238ae5301a330b.jpg', 28, 'uploads/pik_pok_pics/', 'thn12', NULL, '2020-05-20'),
(2, 'Screenshot_6.png', 31, 'uploads/pik_pok_pics/', 'thn12', NULL, '2020-05-20'),
(3, 'WheelsVar_unity.png', 0, 'uploads/pik_pok_pics/', 'as', NULL, '2020-05-27');

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
  `username` varchar(50) NOT NULL,
  `password` mediumtext NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
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
('thn12', '202cb962ac59075b964b07152d234b70', 'Μιχαλάκης', 'Πανταζής', 'asd@er.gr', '2020-05-21', 40, 0, '1989-02-08', '011_101_anonymous_anonym_hacker_vendetta_user_human_avatar-512.jpg', 'uploads/users/40/'),
('mara10', '202cb962ac59075b964b07152d234b70', 'μαρια', 'αντεπαλοβ', 'mrt@iop.com', '2020-06-02', 45, 1, '1987-10-29', 'Screenshot_160.png', 'uploads/users/45/');

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
(1, 3, 40, 'GEIA XARA BRO EDO GIANIS', '2020-06-01 21:43:49'),
(56, 3, 45, 'geia xara bro edo maria', '2020-06-02 16:54:25'),
(61, 1, 45, 'Ωραία φωτογραφία', '2020-06-02 18:30:40'),
(62, 2, 40, 'χαχα #php4ever', '2020-06-02 18:32:36'),
(63, 3, 45, 'τέλεια φωτο γεα', '2020-06-02 20:11:46');

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
  ADD PRIMARY KEY (`post_likes_id`);

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
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT για πίνακα `ip_addresses`
--
ALTER TABLE `ip_addresses`
  MODIFY `IP_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT για πίνακα `members`
--
ALTER TABLE `members`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT για πίνακα `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `post_comments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT για πίνακα `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `post_likes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `post_comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `images` (`photo_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
