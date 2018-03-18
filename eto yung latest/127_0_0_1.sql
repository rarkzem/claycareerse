-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 18, 2018 at 12:22 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `claycareer`
--
CREATE DATABASE IF NOT EXISTS `claycareer` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `claycareer`;

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

DROP TABLE IF EXISTS `carousel`;
CREATE TABLE IF NOT EXISTS `carousel` (
  `carousel_id` int(50) NOT NULL,
  `news_id` int(59) NOT NULL,
  PRIMARY KEY (`carousel_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`carousel_id`, `news_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `forum_id` int(50) NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` varchar(3000) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `forum_id`, `comment_date`, `comment`) VALUES
(1, 1, 1, '2018-03-11 00:00:00', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.'),
(2, 2, 1, '2018-03-11 02:00:00', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.'),
(3, 1, 1, '2018-03-14 09:53:22', 'hohoho');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(50) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_abbrv` varchar(50) NOT NULL,
  `course_description` varchar(5000) NOT NULL,
  `course_pic` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `course_department` int(50) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_abbrv`, `course_description`, `course_pic`, `course_department`) VALUES
(1, 'Bachelor of Science in Enviromental Science', 'BSES', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.', 'car1.jpg', 1),
(2, 'Bachelor of Science in Information System', 'BSIS', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.', 'car1.jpg', 1),
(3, 'Bachelor of Technology in Information Technology', 'BTIT', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.', 'car1.jpg', 1),
(4, 'Bachelor of Science in Information Technology', 'BSIT', 'Lorem Ipsum', 'bf1osbvddz6z4.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `featured`
--

DROP TABLE IF EXISTS `featured`;
CREATE TABLE IF NOT EXISTS `featured` (
  `featured_id` int(50) NOT NULL,
  `news_id` int(50) NOT NULL,
  PRIMARY KEY (`featured_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `featured`
--

INSERT INTO `featured` (`featured_id`, `news_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

DROP TABLE IF EXISTS `forums`;
CREATE TABLE IF NOT EXISTS `forums` (
  `forum_id` int(50) NOT NULL,
  `forum_title` varchar(100) NOT NULL,
  `forum_subtitle` varchar(50) NOT NULL,
  `forum_pic` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `forum_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `forum_description` varchar(3000) NOT NULL,
  PRIMARY KEY (`forum_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`forum_id`, `forum_title`, `forum_subtitle`, `forum_pic`, `forum_date`, `forum_description`) VALUES
(1, 'Programming Skills', 'Is it important?', '900x300.jpg', '2018-03-10 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.'),
(2, 'Knowledge in Java', 'Beginning Object-Oriented Programming', '900x300.jpg', '2018-03-10 00:01:00', 'hegafafas'),
(3, 'sample 3', 'is it important?', '900x300.jpg', '2018-03-10 00:02:00', 'hdakajdhxjaas'),
(4, 'sample 4', 'is it important?', '900x300.jpg', '2018-03-10 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.'),
(5, 'sample5', 'is it important?', '900x300.jpg', '2018-03-10 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.'),
(6, 'sample6', 'is it important?', '900x300.jpg', '2018-03-10 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.'),
(7, 'sample7', 'is it important?', '900x300.jpg', '2018-03-10 00:00:00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.'),
(9, '9', '9', '9', '2018-03-13 20:52:33', '9');

-- --------------------------------------------------------

--
-- Table structure for table `indemand`
--

DROP TABLE IF EXISTS `indemand`;
CREATE TABLE IF NOT EXISTS `indemand` (
  `indemand_id` int(50) NOT NULL,
  `course_id` int(50) NOT NULL,
  PRIMARY KEY (`indemand_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indemand`
--

INSERT INTO `indemand` (`indemand_id`, `course_id`) VALUES
(1, 1),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `institute`
--

DROP TABLE IF EXISTS `institute`;
CREATE TABLE IF NOT EXISTS `institute` (
  `school_id` int(50) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `school_description` varchar(5000) NOT NULL,
  `school_location` varchar(250) NOT NULL,
  `school_email` varchar(50) NOT NULL,
  `school_pic` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `school_contact` varchar(50) NOT NULL,
  `school_website` varchar(50) NOT NULL,
  PRIMARY KEY (`school_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institute`
--

INSERT INTO `institute` (`school_id`, `school_name`, `school_description`, `school_location`, `school_email`, `school_pic`, `school_contact`, `school_website`) VALUES
(1, 'Far Eastern University', 'FEU is located in the U-BELT', 'Nicanor Reyes St., Lerma, Manila', 'feu@edu.com', 'feu1.jpg', '09313 313 313', 'www.feu.com'),
(2, 'Ateneo De Manila University', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.', 'Morayta, Lerma St. etc', 'feu@edu.com', 'car1.jpg', '09013191571814', 'www.feu.com'),
(3, 'University of Santo Tomas', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.', 'Morayta, Lerma St. etc', 'feu@edu.com', 'car1.jpg', '09013191571814', 'www.feu.com'),
(4, 'Adamson University', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.', 'Morayta, Lerma St. etc', 'feu@edu.com', 'car1.jpg', '09013191571814', 'www.feu.com'),
(5, 'University of the Philippines', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.', 'Morayta, Lerma St. etc', 'feu@edu.com', 'car1.jpg', '09013191571814', 'www.feu.com'),
(6, 'National University', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.', 'Morayta, Lerma St. etc', 'feu@edu.com', 'car1.jpg', '09013191571814', 'www.feu.com'),
(7, 'University of the East', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.', 'Morayta, Lerma St. etc', 'feu@edu.com', 'car1.jpg', '09013191571814', 'www.feu.com'),
(8, 'De LaSalle University', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.', 'Morayta, Lerma St. etc', 'feu@edu.com', 'car1.jpg', '09013191571814', 'www.feu.com'),
(9, 'Technological University of the Philippines', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.', 'Morayta, Lerma St. etc', 'feu@edu.com', 'car1.jpg', '09013191571814', 'www.feu.com'),
(10, 'Colegio de San Juan de Letran', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.', 'Morayta, Lerma St. etc', 'feu@edu.com', 'car1.jpg', '09013191571814', 'www.feu.com');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(50) NOT NULL,
  `news_pic` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `news_title` varchar(50) NOT NULL,
  `news_subheading` varchar(50) NOT NULL,
  `news_content` varchar(30000) NOT NULL,
  `news_date` datetime NOT NULL,
  `news_heading` varchar(300) NOT NULL,
  `news_type` varchar(50) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_pic`, `news_title`, `news_subheading`, `news_content`, `news_date`, `news_heading`, `news_type`) VALUES
(1, 'car1.jpg', '1', 'h', '<p class=\"lead\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>\r\n\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>\r\n\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>\r\n\r\n          <blockquote class=\"blockquote\">\r\n            <p class=\"mb-0\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>\r\n            <footer class=\"blockquote-footer\">Someone famous in\r\n              <cite title=\"Source Title\">Source Title</cite>\r\n            </footer>\r\n          </blockquote>\r\n\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>\r\n\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>', '2018-03-10 20:51:55', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.', 'hirings'),
(2, 'car1.jpg', '2', 'h', '<p class=\"lead\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>\r\n\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>\r\n\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>\r\n\r\n          <blockquote class=\"blockquote\">\r\n            <p class=\"mb-0\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>\r\n            <footer class=\"blockquote-footer\">Someone famous in\r\n              <cite title=\"Source Title\">Source Title</cite>\r\n            </footer>\r\n          </blockquote>\r\n\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>\r\n\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>', '2018-03-10 20:52:55', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.', 'hirings'),
(3, 'car3.jpg', '3', 'fss', '<p class=\"lead\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>\r\n\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>\r\n\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>\r\n\r\n          <blockquote class=\"blockquote\">\r\n            <p class=\"mb-0\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>\r\n            <footer class=\"blockquote-footer\">Someone famous in\r\n              <cite title=\"Source Title\">Source Title</cite>\r\n            </footer>\r\n          </blockquote>\r\n\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>\r\n\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>', '2018-03-10 20:53:55', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.', 'hirings'),
(4, 'car1.jpg', '4', 'h', '<p class=\"lead\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>\r\n\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>\r\n\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>\r\n\r\n          <blockquote class=\"blockquote\">\r\n            <p class=\"mb-0\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>\r\n            <footer class=\"blockquote-footer\">Someone famous in\r\n              <cite title=\"Source Title\">Source Title</cite>\r\n            </footer>\r\n          </blockquote>\r\n\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>\r\n\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>', '2018-03-10 20:56:55', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.', 'blog'),
(6, 'car1.jpg', '5', 'h', '<p class=\"lead\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>\r\n\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>\r\n\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>\r\n\r\n          <blockquote class=\"blockquote\">\r\n            <p class=\"mb-0\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>\r\n            <footer class=\"blockquote-footer\">Someone famous in\r\n              <cite title=\"Source Title\">Source Title</cite>\r\n            </footer>\r\n          </blockquote>\r\n\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>\r\n\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>', '2018-03-10 20:52:55', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.', 'hirings'),
(5, 'car1.jpg', '6', 'h', '<p class=\"lead\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>\r\n\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>\r\n\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>\r\n\r\n          <blockquote class=\"blockquote\">\r\n            <p class=\"mb-0\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>\r\n            <footer class=\"blockquote-footer\">Someone famous in\r\n              <cite title=\"Source Title\">Source Title</cite>\r\n            </footer>\r\n          </blockquote>\r\n\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>\r\n\r\n          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>', '2018-03-10 20:56:55', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam eos, nam perspiciatis natus commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.', 'education');

-- --------------------------------------------------------

--
-- Table structure for table `trending`
--

DROP TABLE IF EXISTS `trending`;
CREATE TABLE IF NOT EXISTS `trending` (
  `trending_id` int(50) NOT NULL,
  `forum_id` int(50) NOT NULL,
  PRIMARY KEY (`trending_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trending`
--

INSERT INTO `trending` (`trending_id`, `forum_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tuition`
--

DROP TABLE IF EXISTS `tuition`;
CREATE TABLE IF NOT EXISTS `tuition` (
  `course_id` int(50) NOT NULL,
  `school_id` int(50) NOT NULL,
  `fee` decimal(25,2) NOT NULL,
  PRIMARY KEY (`course_id`,`school_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuition`
--

INSERT INTO `tuition` (`course_id`, `school_id`, `fee`) VALUES
(1, 1, '1.00'),
(1, 2, '2.00'),
(1, 3, '3.00'),
(1, 4, '4.00'),
(1, 5, '5.00'),
(1, 6, '6.00'),
(1, 7, '7.00'),
(1, 8, '8.00'),
(1, 9, '9.00'),
(1, 10, '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_pic` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_about` varchar(300) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `user_pic`, `user_about`) VALUES
(1, 'RarkZem', 'rr@yahoo.com', '12345', 'Martin_Garrix_Party.jpg', 'hohoho'),
(2, 'Suma1L', 'ss@yahoo.com', '12345', '900x300.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!'),
(3, 'hoho', 'he@yahoo.com', '1236', 'defaultpic.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `picture`, `created`, `modified`, `status`) VALUES
(1, 'he', 'he', '1200x630bb2.jpg', '2018-03-09 14:52:20', '2018-03-09 14:52:20', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
