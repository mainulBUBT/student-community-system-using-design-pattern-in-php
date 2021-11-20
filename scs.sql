-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2020 at 10:01 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scs`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `facebook` text NOT NULL,
  `instagram` text NOT NULL,
  `google` text NOT NULL,
  `twitter` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `user_id`, `facebook`, `instagram`, `google`, `twitter`) VALUES
(84, 4, 'mahmud.prince.988', 'prince_mahmud_972', 'pmahmud972@gmail.com', 'pmahmud972'),
(85, 6, '', '', '', ''),
(86, 5, 'ShopnilMiha', '', 'mihan@gmail.com', ''),
(87, 7, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `feeds`
--

CREATE TABLE `feeds` (
  `feed_id` int(11) NOT NULL,
  `feed_user_id` int(11) NOT NULL,
  `feed_content` text NOT NULL,
  `feed_created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `feed_updated_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feeds`
--

INSERT INTO `feeds` (`feed_id`, `feed_user_id`, `feed_content`, `feed_created_time`, `feed_updated_time`) VALUES
(4, 6, 'single feed', '2020-07-09 05:15:29', NULL),
(5, 5, 'hello every one', '2020-07-12 16:41:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `follow_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `following_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `message_user_id` int(11) NOT NULL,
  `message_details` text NOT NULL,
  `message_created_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `message_user_id`, `message_details`, `message_created_time`) VALUES
(8, 4, 'hello', '2020-07-09 05:10:22'),
(9, 6, 'hello', '2020-07-09 05:12:11'),
(10, 4, 'hello', '2020-07-09 05:20:21'),
(11, 5, 'hello', '2020-07-09 05:21:35'),
(12, 7, 'hello mihan', '2020-07-09 05:22:08'),
(13, 6, 'last message', '2020-07-12 17:04:22'),
(14, 7, 'how are you?', '2020-07-13 07:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_user_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_price` int(11) NOT NULL,
  `post_image` text NOT NULL,
  `post_desc` text NOT NULL,
  `post_updated_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_created_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_user_id`, `post_title`, `post_price`, `post_image`, `post_desc`, `post_updated_time`, `post_created_time`) VALUES
(7, 5, 'mathemetic books', 1200, 'Screenshot (88).png', 'this is a valuable book\r\n', '2020-07-12 16:42:23', '2020-07-12 16:42:23'),
(8, 7, 'Algorithm', 200, 'download.jpg', 'Almost like new, no missing page', '2020-07-13 07:56:23', '2020-07-13 07:56:23'),
(9, 4, 'Java Programming', 250, '514axA2lwpL.jpg', 'New book', '2020-07-13 07:59:43', '2020-07-13 07:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `uni_id` int(11) NOT NULL,
  `uni_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`uni_id`, `uni_name`) VALUES
(1, 'Bangladesh University of Business and Technology'),
(2, 'National University, Bangladesh'),
(3, 'University of Dhaka'),
(4, 'Bangladesh University of Engineering and Technology'),
(5, 'BRAC University'),
(6, 'North South University'),
(7, 'American International University-Bangladesh'),
(8, 'Ahsanullah University of Science and Technology'),
(9, 'Bangladesh Agricultural University'),
(10, 'Independent University, Bangladesh'),
(11, 'East West University'),
(12, 'United International University'),
(13, 'Bangabandhu Sheikh Mujib Medical University'),
(14, 'Jahangirnagar University'),
(15, 'Bangladesh University of Professionals'),
(16, 'Daffodil International University'),
(17, 'Green University of Bangladesh'),
(18, 'Jagannath University'),
(19, 'University of Asia Pacific'),
(20, 'Islamic University of Technology');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_uni_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` text NOT NULL,
  `user_image` text NOT NULL,
  `user_about_me` text NOT NULL,
  `user_created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_uni_id`, `user_email`, `user_password`, `user_image`, `user_about_me`, `user_created_time`, `user_updated_time`) VALUES
(4, 'Prince Mahmud', 1, 'prince@gmail.com', '$2y$10$g2RiBbGzA6qL6NkyWnHDtO3wes/SZ8X0g.e7YicfFfHZtFJsl2.7y', '78-786207_user-avatar-png-user-avatar-icon-png-transparent.png', '', '2020-07-09 00:44:57', NULL),
(5, 'moinul islam', 2, 'moinul@gmail.com', '$2y$10$VkMW6Co0n/MM9eBLnwDulOVxaA6898jdhhKw4r32RbcAdkFkBzDvS', 'man-face-illustration-avatar-user-computer-icons-software-developer-avatar-png-clip-art.png', '', '2020-07-09 00:45:35', NULL),
(6, 'arafat ali sarkar', 1, 'arafat@gmail.com', '$2y$10$ZUDGukJeErU6.z7UlSs2reYo7..O5RQA5j/X/ToVxPsnY0/gGe6BS', 'png-transparent-man-s-face-avatar-computer-icons-user-profile-business-user-avatar-blue-face-heroes.png', '', '2020-07-09 00:45:53', NULL),
(7, 'yesmine seema', 2, 'sima@gmail.com', '$2y$10$B1SwQoc9HK8xxXvuVoKLG.w4evKdFZygshRQb3l0agpwkvz/uP/xO', 'download.png', '', '2020-07-09 00:46:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `feeds`
--
ALTER TABLE `feeds`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`follow_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`uni_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `feeds`
--
ALTER TABLE `feeds`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `uni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
