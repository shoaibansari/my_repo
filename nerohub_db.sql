-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2017 at 11:22 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nerohub_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `is_parent` int(2) NOT NULL DEFAULT '0' COMMENT '0=>No, 1=>Yes',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `meta_tag_title` varchar(500) NOT NULL,
  `meta_tag_description` varchar(500) NOT NULL,
  `meta_keywords` varchar(500) NOT NULL,
  `status` int(2) NOT NULL COMMENT '0=>Inactive, 1=>Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `is_parent`, `created_at`, `meta_tag_title`, `meta_tag_description`, `meta_keywords`, `status`) VALUES
(13, 'animal', 0, '2017-04-17 09:39:03', '', '', '', 1),
(14, 'cow', 13, '2017-04-17 09:39:12', '', '', '', 1),
(15, 'bull', 13, '2017-04-17 09:39:19', '', '', '', 1),
(16, 'goat', 13, '2017-04-17 11:49:36', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `conversation_id` int(11) NOT NULL,
  `learner_id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `status` int(2) NOT NULL COMMENT '0 => Inactive, 1 => Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conversation_reply`
--

CREATE TABLE `conversation_reply` (
  `conversation_reply_id` int(11) NOT NULL,
  `reply` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `status` int(2) NOT NULL COMMENT '0 => Inactive, 1 => Active',
  `conversation_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `country_code` varchar(10) NOT NULL,
  `status` int(2) NOT NULL COMMENT '0=>Inactive, 1=>Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `favorite_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `information_pages`
--

CREATE TABLE `information_pages` (
  `information_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `meta_tag_title` varchar(255) NOT NULL,
  `meta_tag_description` varchar(500) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `slug` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `status` int(2) NOT NULL COMMENT '0 => Inactive, 1 => Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `learner_ratings`
--

CREATE TABLE `learner_ratings` (
  `learner_rating_id` int(11) NOT NULL,
  `rating` int(2) NOT NULL,
  `review` varchar(500) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `learner_id` int(11) NOT NULL,
  `status` int(2) NOT NULL COMMENT '0=>Inactive, 1=>Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mentor_ratings`
--

CREATE TABLE `mentor_ratings` (
  `mentor_rating_id` int(11) NOT NULL,
  `rating` int(2) NOT NULL,
  `review` varchar(500) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `learner_id` int(11) NOT NULL,
  `status` int(2) NOT NULL COMMENT '0=>Inactive, 1=>Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(5) NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Mentor Individual'),
(3, 'Learner'),
(4, 'Mentor Bussiness');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `data_key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` int(2) NOT NULL COMMENT '0=>Inactive, 1=>Active',
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` int(2) NOT NULL COMMENT '0=>Inactive, 1=>Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `role_id`, `status`, `created_at`) VALUES
(1, 'admin', '', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0, '2017-04-05 07:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_detail_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `city` int(11) NOT NULL,
  `country` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`conversation_id`);

--
-- Indexes for table `conversation_reply`
--
ALTER TABLE `conversation_reply`
  ADD PRIMARY KEY (`conversation_reply_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`favorite_id`);

--
-- Indexes for table `information_pages`
--
ALTER TABLE `information_pages`
  ADD PRIMARY KEY (`information_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `learner_ratings`
--
ALTER TABLE `learner_ratings`
  ADD PRIMARY KEY (`learner_rating_id`);

--
-- Indexes for table `mentor_ratings`
--
ALTER TABLE `mentor_ratings`
  ADD PRIMARY KEY (`mentor_rating_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `conversation_reply`
--
ALTER TABLE `conversation_reply`
  MODIFY `conversation_reply_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `favorite_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `information_pages`
--
ALTER TABLE `information_pages`
  MODIFY `information_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `learner_ratings`
--
ALTER TABLE `learner_ratings`
  MODIFY `learner_rating_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mentor_ratings`
--
ALTER TABLE `mentor_ratings`
  MODIFY `mentor_rating_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_detail_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
