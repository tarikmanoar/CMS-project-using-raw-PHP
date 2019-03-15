-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2019 at 12:44 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

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
(2, 12, 'Tarik', '2019-03-01 16:22:13', 'This is an example bla bla', 'manoar@mail.com', 'APPROVED'),
(3, 13, 'manoar', '2019-03-01 16:27:10', 'This is an example of this', 'thismail@gmail.com', 'APPROVED'),
(4, 13, 'shohan', '2019-03-01 05:56:16', 'Cras sit amet nibh libero,', 'ex@mail.com', 'APPROVED'),
(5, 14, 'Leave', '2019-03-01 05:56:17', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.', 'manoar@mail.com', 'APPROVED'),
(8, 12, 'Edwin', '2019-03-01 03:07:46', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.', 'edwin@mail.com', 'UNAPPROVED'),
(9, 12, 'Mnao', '2019-03-01 03:08:09', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.', 'mano@maoa.com', 'UNAPPROVED'),
(10, 12, 'Blog', '2019-03-01 03:08:28', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.', 'bl@bl.com', 'UNAPPROVED'),
(11, 12, 'Blog', '2019-03-01 16:22:34', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.', 'bl@bl.com', 'APPROVED'),
(12, 12, 'Blog', '2019-03-08 12:54:47', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.', 'bl@bl.com', 'UNAPPROVED'),
(15, 17, 'Manoar', '2019-03-01 16:41:32', 'post_comment_count\r\npost_comment_count\r\npost_comment_count\r\npost_comment_count\r\npost_comment_count', 'mano@gmail.com', 'APPROVED'),
(16, 17, 'Manoar', '2019-03-01 16:41:42', 'post_comment_count\r\npost_comment_count\r\npost_comment_count\r\npost_comment_count\r\npost_comment_count', 'mano@gmail.com', 'APPROVED');

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
(12, 'PHP5', 'Allah is Almighty I love Muhammad(SM) the god', 'manoar', '2019-03-09 20:20:23', 'upload/26231094_172615416830208_4885307584422235803_n.jpg', '<h3><font face=\"comic sans ms\" size=\"3\">Lorem ipsum dolor sit amet</font>, consectetur adipisicing elit. <font face=\"times new roman\">Modi </font>ut quaerat error totam, nisi perspiciatis asperiores <font face=\"impact\">quisquam </font>cum maiores consequuntur quam vero,&nbsp;<img src=\"https://pay.google.com/about/static/images/social/knowledge_graph_logo.png\" alt=\"No Image\" align=\"left\"><b><font face=\"England Hand DB\" size=\"6\">&nbsp;esse quis</font></b> minus repellat eum incidunt qui <a href=\"http://www.fb.com\" title=\"Click\" target=\"_blank\">doloremque</a> dignissimos! Sint quos fugiat harum officiis labore? Assumenda reprehenderit quos ad. Labore dolorem <font face=\"BatmanForeverAlternate\">similique</font> eum enim earum, <font face=\"BatmanForeverAlternate\">ut quos?</font></h3>', 'lorem.text,mac', 4, 'Publised'),
(13, 'PHP5', 'Allah is Almighty He is might', 'manoar', '2019-03-09 20:21:30', 'upload/gig images for abul hasan vai.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi ut quaerat error totam, nisi perspiciatis asperiores quisquam cum maiores consequuntur quam vero, nostrum esse quis minus repellat eum incidunt qui doloremque dignissimos! Sint quos fugiat harum officiis labore? Assumenda reprehenderit quos ad. Labore dolorem similique eum enim earum, ut quos?</p>', 'Bangla Waz Mawlana Abdullah Al Amin', 4, 'Publised'),
(14, 'JAVASCRIPT', 'Java Script Tutorial', 'manoar', '2019-02-19 22:19:21', 'upload/gig images for abul hasan vaia.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi ut quaerat error totam, nisi perspiciatis asperiores quisquam cum maiores consequuntur quam vero, nostrum esse quis minus repellat eum incidunt qui doloremque dignissimos! Sint quos fugiat harum officiis labore? Assumenda reprehenderit quos ad. Labore dolorem similique eum enim earum, ut quos?</p>', 'post_imagepost', 4, 'Publised'),
(15, 'PHP5', 'Php 5 post test', 'à¦®à¦¨à§‹à§Ÿà¦¾à¦° manoar', '2019-02-19 15:42:31', 'upload/26231094_172615416830208_4885307584422235803_n.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi ut quaerat error totam, nisi perspiciatis asperiores quisquam cum maiores consequuntur quam vero, nostrum esse quis minus repellat eum incidunt qui doloremque dignissimos! Sint quos fugiat harum officiis labore? Assumenda reprehenderit quos ad. Labore dolorem similique eum enim earum, ut quos?</p>', 'à¦¬à¦¾à¦‚à¦²à¦¾', 4, 'Publised'),
(17, 'PHP5', 'PHP test 2', 'Tarik', '2019-02-19 00:04:45', 'upload/oE7rYRe.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi ut quaerat error totam, nisi perspiciatis asperiores quisquam cum maiores consequuntur quam vero, nostrum esse quis minus repellat eum incidunt qui doloremque dignissimos! Sint quos fugiat harum officiis labore? Assumenda reprehenderit quos ad. Labore dolorem similique eum enim earum, ut quos?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi ut quaerat error totam, nisi perspiciatis asperiores quisquam cum maiores consequuntur quam vero, nostrum esse quis minus repellat eum incidunt qui doloremque dignissimos! Sint quos fugiat harum officiis labore? Assumenda reprehenderit quos ad. Labore dolorem similique eum enim earum, ut quos?', 'allah,muhammad,sm,all', 6, 'Publised'),
(18, 'PHP5', 'This is my first typing test', 'manaor', '2019-03-09 20:12:46', 'upload/shutterstock-342442637.png', '<h1><font color=\"#33ff99\" style=\"\"><font face=\"impact\">This </font><font face=\"comic sans ms\">is my </font><font face=\"BatmanForeverAlternate\">first</font><font face=\"comic sans ms\"> typing test I wish I </font><font face=\"England Hand DB\">will </font><font face=\"comic sans ms\">pass this test..</font></font><font face=\"comic sans ms\">.</font></h1><div><font face=\"comic sans ms\"><br></font></div><div><font face=\"comic sans ms\"><br></font></div><div><font face=\"comic sans ms\"><br></font></div><h5><font face=\"comic sans ms\"><font color=\"#ffffcc\"><span style=\"background-color: rgb(255, 51, 0);\">WOW</span> </font>great I made it The Cow is so vool&nbsp;teushjksdvklj wtarengjka</font></h5><div><img src=\"https://i.imgur.com/gAkShfD.jpg\" width=\"511\"></div><div><font face=\"comic sans ms\">The name of our scvool is samoan mara&nbsp;jdjkf&nbsp;aasd aaaa asdf&nbsp;asdf asdfa a dfasdf asdf asdfa fas dfasd fasdfa sdfasdf asdfasdf asfasdfa afaaaf asdfg&nbsp;asdf asdf asdfa asdf asffa&nbsp;asff as dfaff safaa sdf asdf asdf asdf asd fasdf asdfa sdfa sdfa sd fasdf asdfasdfa sdfasd fasdf asdf asdfasdf asdfg asdf asdf asdf adf adf asdf asdfa&nbsp;&nbsp;fasdf asdfa fadsfga&nbsp;adsf&nbsp;adf asdf asdf&nbsp;</font></div><div><font face=\"comic sans ms\"><br></font></div><div><font face=\"comic sans ms\"><br></font></div><div><font face=\"impact\" color=\"#66cc99\">This is too cool</font></div><div><font face=\"impact\"><br></font></div><div><font face=\"impact\"><br></font></div><div><font face=\"impact\" size=\"6\">No More </font><font size=\"6\" face=\"times new roman\">To Day...........</font></div>', 'test,manoar,code,dome', 0, 'Publised'),
(19, 'JAVA', 'à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿', 'à¦®à¦¨à§‹à§Ÿà¦¾à¦°', '2019-03-12 03:55:56', 'upload/rose.jpg', '<span style=\"font-family: bensen; font-size: x-large;\"><font color=\"#333300\">à¦†à¦®à¦¾à¦°</font> <font color=\"#33cc00\">à¦¸à§‹à¦¨à¦¾à¦°</font> <font color=\"#33ff00\">à¦¬à¦¾à¦‚à¦²à¦¾</font> <font color=\"#660000\">à¦†à¦®à¦¿</font> <font color=\"#999900\">à¦¤à§‹à¦®à¦¾à¦‡</font> <font color=\"#ff6600\">à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿</font><font color=\"#990033\">à¥¤</font></span><span style=\"font-family: bensen; font-size: x-large;\"><font color=\"#990033\">à¦†à¦®à¦¾à¦°</font> à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° <font color=\"#ff3300\">à¦¬à¦¾à¦‚à¦²à¦¾</font> à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\"><font color=\"#ff33cc\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿</font>à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span><span style=\"font-family: bensen; font-size: x-large;\">à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿à¥¤</span>', 'à¦†à¦®à¦¾à¦° à¦¸à§‹à¦¨à¦¾à¦° à¦¬à¦¾à¦‚à¦²à¦¾ à¦†à¦®à¦¿ à¦¤à§‹à¦®à¦¾à¦‡ à¦­à¦¾à¦²à§‹à¦¬à¦¾à¦¸à¦¿', 0, 'Publised');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(4) NOT NULL,
  `username` varchar(25) NOT NULL,
  `user_password` varchar(55) NOT NULL,
  `user_firstname` varchar(20) NOT NULL,
  `user_lastname` varchar(20) NOT NULL,
  `user_email` varchar(25) NOT NULL,
  `user_images` text NOT NULL,
  `user_role` varchar(55) NOT NULL,
  `randSalt` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_images`, `user_role`, `randSalt`) VALUES
(1, 'edwin', 'root', 'Edwin', 'Swan', 'edwinswan@gmail.com', 'upload/user/tarik.jpg', 'Subscriber', '1'),
(2, 'tmanoar', 'manoar', 'Tarik', 'Manoar', 'tarikmanoar@gmail.com', 'upload/user/allpro2.JPG', 'Admin', '1'),
(3, 'admin', 'admin', 'Tarik ', 'Manoar', 'admin@manoar.com', 'upload/user/shutterstock-1180883800.png', 'Admin', '');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

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
  MODIFY `comment_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
