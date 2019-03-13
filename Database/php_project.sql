-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2019 at 10:48 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `ctg_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `ctg_title`) VALUES
(12, 'PHP5'),
(13, 'JAVA'),
(14, 'JAVASCRIPT'),
(15, 'Manoar');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(4) NOT NULL,
  `comment_post_id` int(4) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comment_content` text NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_date`, `comment_content`, `comment_email`, `comment_status`) VALUES
(1, 10, 'manoar', '2019-02-20 03:29:13', 'This is just testing purpose', 'tarikmanoar@gmail.com', 'approved '),
(2, 12, 'Tarik', '2019-02-20 03:30:17', 'This is an example', 'manoar@amil.com', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `post_ctg_id` varchar(255) NOT NULL,
  `post_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `post_author` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_ctg_id`, `post_title`, `post_author`, `date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(12, 'JAVA', 'Allah is Almighty I love Muhammad(SM) the god', 'manoar', '2019-02-18 22:43:55', 'upload/rose.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi ut quaerat error totam, nisi perspiciatis asperiores quisquam cum maiores consequuntur quam vero, nostrum esse quis minus repellat eum incidunt qui doloremque dignissimos! Sint quos fugiat harum officiis labore? Assumenda reprehenderit quos ad. Labore dolorem similique eum enim earum, ut quos?</p>', 'lorem.text,mac', 4, 'Publised'),
(13, 'JAVA', 'Allah is Almighty He is might', 'manoar', '2019-02-19 15:41:48', 'upload/shutterstock-1180883800.png', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi ut quaerat error totam, nisi perspiciatis asperiores quisquam cum maiores consequuntur quam vero, nostrum esse quis minus repellat eum incidunt qui doloremque dignissimos! Sint quos fugiat harum officiis labore? Assumenda reprehenderit quos ad. Labore dolorem similique eum enim earum, ut quos?</p>', 'Bangla Waz Mawlana Abdullah Al Amin', 4, 'Draft'),
(14, 'JAVASCRIPT', 'Java Script Tutorial', 'manoar', '2019-02-19 22:19:21', 'upload/gig images for abul hasan vaia.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi ut quaerat error totam, nisi perspiciatis asperiores quisquam cum maiores consequuntur quam vero, nostrum esse quis minus repellat eum incidunt qui doloremque dignissimos! Sint quos fugiat harum officiis labore? Assumenda reprehenderit quos ad. Labore dolorem similique eum enim earum, ut quos?</p>', 'post_imagepost', 4, 'Publised'),
(15, 'PHP5', 'Php 5 post test', 'à¦®à¦¨à§‹à§Ÿà¦¾à¦° manoar', '2019-02-19 15:42:31', 'upload/26231094_172615416830208_4885307584422235803_n.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi ut quaerat error totam, nisi perspiciatis asperiores quisquam cum maiores consequuntur quam vero, nostrum esse quis minus repellat eum incidunt qui doloremque dignissimos! Sint quos fugiat harum officiis labore? Assumenda reprehenderit quos ad. Labore dolorem similique eum enim earum, ut quos?</p>', 'à¦¬à¦¾à¦‚à¦²à¦¾', 4, 'Publised'),
(17, 'PHP5', 'PHP test 2', 'Tarik', '2019-02-19 00:04:45', 'upload/oE7rYRe.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi ut quaerat error totam, nisi perspiciatis asperiores quisquam cum maiores consequuntur quam vero, nostrum esse quis minus repellat eum incidunt qui doloremque dignissimos! Sint quos fugiat harum officiis labore? Assumenda reprehenderit quos ad. Labore dolorem similique eum enim earum, ut quos?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi ut quaerat error totam, nisi perspiciatis asperiores quisquam cum maiores consequuntur quam vero, nostrum esse quis minus repellat eum incidunt qui doloremque dignissimos! Sint quos fugiat harum officiis labore? Assumenda reprehenderit quos ad. Labore dolorem similique eum enim earum, ut quos?', 'allah,muhammad,sm,all', 4, 'Publised');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
