-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 28, 2023 at 08:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(4, 'Java'),
(7, 'BootStrap'),
(8, 'Test'),
(9, 'React Js'),
(10, 'python');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(22, 12, 'Abhishek', 'asdasd@email.com', 'dfdgd', 'Approved', '2023-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` varchar(255) NOT NULL DEFAULT '0',
  `post_view_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_view_count`, `post_status`) VALUES
(12, 4, 'Artifical intelligence', 'kavya', '2023-05-10', 'ai.jpeg', '                dsadasdasdasda        ', 'java', '1', 4, 'Draft'),
(13, 10, 'Artifical intelligence', 'kavya', '2023-05-09', 'ai.jpeg', '        dsadasdasdasda', 'AI,ML,PYthon', '1', 2, 'Publish'),
(14, 10, 'Artifical intelligence', 'kavya', '2023-05-09', 'ai.jpeg', '        dsadasdasdasda', 'AI,ML,PYthon', '1', 2, 'Publish'),
(15, 10, 'Artifical intelligence', 'kavya', '2023-05-09', 'ai.jpeg', '        dsadasdasdasda', 'AI,ML,PYthon', '1', 2, 'Draft'),
(16, 4, 'Artifical intelligence', 'kavya', '2023-05-09', 'Screenshot from 2023-01-02 12-05-03.png', '                dsadasdasdasda        ', 'AI,ML,PYthon', '1', 2, 'Draft'),
(17, 10, 'Artifical intelligence', 'kavya', '2023-05-09', 'ai.jpeg', '        dsadasdasdasda', 'AI,ML,PYthon', '1', 2, 'Draft'),
(18, 10, 'Artifical intelligence', 'kavya', '2023-05-09', 'ai.jpeg', '        dsadasdasdasda', 'AI,ML,PYthon', '1', 2, 'Draft'),
(19, 10, 'Artifical intelligence', 'kavya', '2023-05-09', 'ai.jpeg', '        dsadasdasdasda', 'AI,ML,PYthon', '1', 2, 'Publish'),
(20, 4, 'Artifical intelligence', 'kavya', '2023-05-09', 'LY-153-S-1.jpg', '                dsadasdasdasda        ', 'AI,ML,PYthon', '1', 2, 'Publish'),
(21, 10, 'Artifical intelligence', 'kavya', '2023-05-09', 'ai.jpeg', '        dsadasdasdasda', 'AI,ML,PYthon', '1', 2, 'Draft'),
(22, 10, 'Artifical intelligence', 'kavya', '2023-05-09', 'ai.jpeg', '        dsadasdasdasda', 'AI,ML,PYthon', '1', 2, 'Publish'),
(23, 10, 'Artifical intelligence', 'kavya', '2023-05-09', 'ai.jpeg', '        dsadasdasdasda', 'AI,ML,PYthon', '1', 2, 'Publish'),
(25, 10, 'Artifical intelligence', 'kavya', '2023-05-09', 'ai.jpeg', '        dsadasdasdasda', 'AI,ML,PYthon', '1', 2, 'Publish'),
(26, 10, 'Artifical intelligence', 'kavya', '2023-05-09', 'ai.jpeg', '        dsadasdasdasda', 'AI,ML,PYthon', '1', 2, 'Publish'),
(27, 10, 'Artifical intelligence', 'kavya', '2023-05-09', 'ai.jpeg', '        dsadasdasdasda', 'AI,ML,PYthon', '1', 2, 'Publish'),
(28, 10, 'Artifical intelligence', 'kavya', '2023-05-10', 'ai.jpeg', '        dsadasdasdasda', 'AI,ML,PYthon', '1', 2, 'Draft'),
(29, 10, 'Artifical intelligence', 'kavya', '2023-05-10', 'ai.jpeg', '        dsadasdasdasda', 'AI,ML,PYthon', '1', 3, 'Draft'),
(30, 4, 'Artifical intelligence', 'kavya', '2023-05-10', 'Screenshot from 2023-01-02 12-05-03.png', '                dsadasdasdasda        ', 'AI,ML,PYthon', '1', 2, 'Draft'),
(31, 4, 'Artifical intelligence', 'kavya', '2023-05-10', 'LY-153-S-1.jpg', '                dsadasdasdasda        ', 'AI,ML,PYthon', '1', 2, 'Draft');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_pswrd` varchar(255) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_date` date NOT NULL,
  `randSalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_pswrd`, `user_fname`, `user_lname`, `user_mail`, `user_image`, `user_role`, `user_date`, `randSalt`) VALUES
(3, 'kavu', 'kavya@23', 'kavya', 'chaudhari', 'kavyachaudhari@gmail.com', '', 'Admin', '2023-05-08', '{hy}'),
(23, 'abhi', '12456789', 'Abhishek', 'Barot', 'abhishek@gmail.com', 'photo-1626464361024-c2bea1e9cd14.jpeg', 'Admin', '2023-05-09', '$2y$12$7b8z0qJbT8ra8eikEYf4wuKQSKy/iIdMRd.x2NlX0QvA1l08Rv0Qy'),
(24, 'shiven123', 'shiv123', 'Shiven', 'Shukla', 'shivenshukla@gmail.com', 'photo-1626464361024-c2bea1e9cd14.jpeg', 'Subscriber', '2023-05-09', '$2y$12$jGE0eJ22eVjsfy39kBqZOOS3AoeJPIpWCOssFI7Qft.exIBDNsb3.'),
(25, 'drson', '2468', 'Drs', 'qas', 'darshan@gmail.com', 'Screenshot from 2023-04-22 17-09-55.png', 'Subscriber', '2023-05-09', '$2y$12$fYoMVC0KqR1X3x3MjI1qtu79vtURJXYsGuBnm6wgxh8tO3XnqVBI2');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(3, 'jkcfmddvvnskl2lvsmsmqhu2n3', 1683629007),
(4, 'rirke4f6ur1nkfrnu9j6mmjo9j', 1683629033),
(5, 'd7bqa7q1mm7epfb3tk9q0g7nrn', 1683629219),
(6, 'qhg1egvfa4095nj72uc0i8m0g2', 1683694872),
(7, 'u5rr84oor0cda4t8e7h562v26q', 1683780552),
(8, 'muv4da4sj3e62obqbo5pucvog5', 1683782300),
(9, 'brqrqsmefmlnu9fmt1903g5st7', 1687932750);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
