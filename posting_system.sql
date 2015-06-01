-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2015 at 04:01 PM
-- Server version: 5.5.41-cll-lve
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `posting_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `text` text NOT NULL,
  `image` text NOT NULL,
  `Video` text NOT NULL,
  `row` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `chat_member`
--

CREATE TABLE IF NOT EXISTS `chat_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_section` int(11) NOT NULL,
  `text` text NOT NULL,
  `show` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE IF NOT EXISTS `college` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`id`, `text`) VALUES
(15, 'Sharia law'),
(13, 'Business & Finance'),
(11, 'Information Technology'),
(12, 'arts');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `text` text NOT NULL,
  `display` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `mobile` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  `ip` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `media_value` text NOT NULL,
  `media_type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_section` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `type_members` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `id_section`, `id_user`, `type_members`) VALUES
(8, 10, 3, 0),
(7, 11, 2, 0),
(6, 10, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `text` text NOT NULL,
  `time_post` datetime NOT NULL,
  `media_id` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `id_user`, `text`, `time_post`, `media_id`) VALUES
(1, 2, 'Command Palette\n\nThe Command Palette holds infrequently used functionality, like sorting, changing the syntax and changing the indentation settings. With just a few keystrokes, you can search for what you want, without ever having to navigate through the menus or remember obscure key bindings.\n\nShow the Command Palette with Ctrl+Shift+P.', '2015-05-25 20:46:26', ''),
(15, 2, '34324324234', '2015-05-31 02:30:15', ''),
(13, 2, '213213213', '2015-05-31 01:48:39', 'assets/image_user/857bdf528d4ad868c1d1801a6da01660.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `id_college` int(11) NOT NULL,
  `id_specialty` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `title`, `id_college`, `id_specialty`) VALUES
(11, 'CNS 2', 11, 14),
(9, 'windows server', 11, 14),
(10, 'CNS 1', 11, 14);

-- --------------------------------------------------------

--
-- Table structure for table `slider_site`
--

CREATE TABLE IF NOT EXISTS `slider_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `title` text NOT NULL,
  `image` text NOT NULL,
  `display` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `slider_site`
--

INSERT INTO `slider_site` (`id`, `text`, `title`, `image`, `display`) VALUES
(3, '3', '2', 'assets/image_user/12ac01af665a32d69caf215b84c3a6a0.jpg', 0),
(2, 'asdsadasdasdasdasd', 'sadasdasdasd', 'assets/imageFile/2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `specialty`
--

CREATE TABLE IF NOT EXISTS `specialty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_college` int(11) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `specialty`
--

INSERT INTO `specialty` (`id`, `id_college`, `text`) VALUES
(17, 12, 'Arabic'),
(14, 11, 'computer network system'),
(21, 13, 'Accounting'),
(20, 12, 'Raise a child'),
(19, 12, 'Special Education'),
(18, 12, 'English'),
(15, 11, 'Computer science'),
(16, 11, 'Software Engineering'),
(22, 13, 'Banking and Financial Sciences'),
(23, 13, 'Islamic banks'),
(24, 15, 'Law'),
(25, 15, 'Sharia'),
(26, 15, 'Koranic readings'),
(27, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `system_requirements`
--

CREATE TABLE IF NOT EXISTS `system_requirements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `system_requirements`
--

INSERT INTO `system_requirements` (`id`, `type`, `value`) VALUES
(1, 'SITE_NAME', 'forum wise');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `college` text NOT NULL,
  `specialty` text NOT NULL,
  `password` text NOT NULL,
  `gender` text NOT NULL,
  `birthday` date NOT NULL,
  `mobile` text NOT NULL,
  `image` text NOT NULL,
  `isadmin` int(10) NOT NULL,
  `status` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `last_ip` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `college`, `specialty`, `password`, `gender`, `birthday`, `mobile`, `image`, `isadmin`, `status`, `level`, `last_ip`) VALUES
(6, '1', '2', '2@2.CONM', '1', '1', '2eee93b663ffaf6446707c41f130c555', 'Male', '2015-05-21', '123', '', 0, 1, 0, '94.249.88.146'),
(2, 'medosalahat salahat', 'medosalahat', 'mohammadsalahat@ymail.com', '1', '1', '14db0cb55d5ad8ef1a7344b8208e2526', 'Male', '2015-11-23', '23123123123', 'assets/image_user/72338dab05d6a2dde51b2ecca18fe8eb.jpg', 1, 0, 0, '79.173.223.117'),
(3, 'haitham', 'haitham', 'haytham.ayasrah@yahoo.com', '', '', '408f07ac06b0374dea9e5c849b0e6e8f', 'Male', '2015-07-02', '0779937922', 'assets/image_user/f3d9de86462c28781cbe5c47ef22c3e5.JPG', 1, 0, 0, '212.34.12.181'),
(4, 'rakan', 'rakan alhawadi', 'rakannawaf@yahoo.com', '', '', '99ae35fc2cf38615134464859ed2f692', 'Male', '2015-01-26', '0787445560', '', 0, 0, 0, '109.107.132.98'),
(5, 'omar', 'omar', 'omar.12@yahoo.com', '', '', '408f07ac06b0374dea9e5c849b0e6e8f', 'Male', '2015-05-05', '0779937911', '', 0, 1, 1, '212.34.12.181'),
(7, 'haitham1', 'haitham1', 'haytham1.ayasrah@yahoo.com', '12', '18', '408f07ac06b0374dea9e5c849b0e6e8f', 'Male', '1992-07-02', '0779937922', 'assets/image_user/d52d7aeaf42820be2cc18dd7915e3a2b.jpg', 0, 0, 0, '212.34.11.1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
