-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2021 at 04:59 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc_porject`
--

-- --------------------------------------------------------

--
-- Table structure for table `categor`
--

CREATE TABLE `categor` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(11) CHARACTER SET utf8 NOT NULL,
  `cat_status` int(11) NOT NULL DEFAULT 0,
  `cat_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categor`
--

INSERT INTO `categor` (`cat_id`, `cat_name`, `cat_status`, `cat_user`) VALUES
(1, 'reading', 0, 1),
(2, 'fahsion', 0, 1),
(3, 'cooking', 0, 1),
(4, 'player', 0, 1),
(5, 'laptop', 0, 1),
(6, 'programing', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(11) NOT NULL,
  `com_details` varchar(255) NOT NULL,
  `com_date` varchar(55) NOT NULL,
  `com_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `com_details`, `com_date`, `com_status`, `user_id`, `post_id`) VALUES
(1, 'hello from روايه ', 'January 24, 2021 04:48 PM', 1, 1, 9),
(2, 'هي دي كوره ههه', 'January 24, 2021 04:48 PM', 1, 1, 6),
(3, 'لمين ده يا لمبي', 'January 24, 2021 04:49 PM', 0, 1, 1),
(4, 'شويه يعني مهلك', 'January 24, 2021 04:49 PM', 0, 1, 8),
(5, 'انتا عايز ايه حضرتك\r\n', 'January 24, 2021 04:57 PM', 0, 1, 3),
(6, 'خدها بخسمه جنيه علشان تطلع رحمه ونور عليه\r\n', 'January 24, 2021 04:59 PM', 0, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `com_not`
--

CREATE TABLE `com_not` (
  `com_not_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `com_status_not` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `com_not`
--

INSERT INTO `com_not` (`com_not_id`, `user_id`, `com_id`, `com_status_not`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 1, 5, 0),
(6, 1, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `meg_not`
--

CREATE TABLE `meg_not` (
  `meg_not_id` int(11) NOT NULL,
  `meg_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `meg_not_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meg_not`
--

INSERT INTO `meg_not` (`meg_not_id`, `meg_id`, `user_id`, `meg_not_status`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `meg_id` int(11) NOT NULL,
  `meg_details` varchar(255) NOT NULL,
  `meg_status` int(11) NOT NULL DEFAULT 0,
  `meg_date` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`meg_id`, `meg_details`, `meg_status`, `meg_date`, `user_id`) VALUES
(1, 'helllllllo from techbairk', 1, 'January 24, 04:50:PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(50) NOT NULL,
  `post_details` text NOT NULL,
  `post_tag` varchar(255) NOT NULL,
  `post_status` int(11) NOT NULL,
  `post_photo` varchar(255) NOT NULL,
  `post_views` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_date` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_details`, `post_tag`, `post_status`, `post_photo`, `post_views`, `cat_id`, `user_id`, `post_date`) VALUES
(1, 'iphone 6plus', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?', 'Lorem ipsum dolor sit amet consectetur ', 0, '594_82023737_179585280083881_2339355097131122688_o.jpg', 3, 1, 1, '24 Jan 2021'),
(2, 'jaket', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?', 'Lorem ipsum dolo', 0, '352_82241676_179585050083904_4641503824584900608_n.jpg', 1, 2, 1, '24 Jan 2021'),
(3, 'Andres Iniesta', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?', 'Lorem ipsum dolo', 0, '31_82072017_185714792620398_1064203144017215488_n.jpg', 2, 4, 1, '24 Jan 2021'),
(4, 'CR7', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?', 'Lorem ipsum dolor ', 0, '42_81922524_185714919287052_4543689440521879552_n.jpg', 0, 4, 1, '24 Jan 2021'),
(5, 'David Villa', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?', 'Lorem ipsum dolor', 0, '84_82932527_856478904796798_8531778741947334656_n.jpg', 0, 4, 1, '24 Jan 2021'),
(6, 't-shirt', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?', 'Lorem ipsum dolor', 0, '114_82271092_511908906349397_6742345794197651456_n.jpg', 3, 2, 1, '24 Jan 2021'),
(7, 'Iker Casillas', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?', 'Lorem ipsum ', 0, '370_82937139_3075790892646069_1797874186278928384_n.jpg', 2, 4, 1, '24 Jan 2021'),
(8, 'dell g5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?', 'Lorem ipsum ', 0, '637_82162832_2346121072160827_1891049455906455552_o.jpg', 2, 5, 1, '24 Jan 2021'),
(9, 'روايه', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?', 'Lorem ipsum d', 0, '393_84144799_2496105897321216_5112252439457693696_n.jpg', 4, 1, 1, '24 Jan 2021'),
(10, 'Wayne Rooney', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?', 'Lorem ipsum dolor', 0, '596_83645263_10220418184581346_655873310332026880_n.jpg', 1, 4, 1, '24 Jan 2021'),
(11, 'pizza', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, eius aliquam eum reiciendis accusantium dolor veritatis ratione minus eaque. Et illo omnis fugiat dolores nostrum numquam vel hic quibusdam amet?', 'Lorem ipsum ', 0, '728_86260409_2611566965835345_8081809101543178240_n.jpg', 0, 3, 1, '24 Jan 2021');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `re_id` int(11) NOT NULL,
  `re_details` varchar(255) NOT NULL,
  `meg_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `re_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`re_id`, `re_details`, `meg_id`, `user_id`, `re_date`) VALUES
(1, 'wlcome sir\r\ncan i help you', 1, 1, '24 January 2021 04:51:02 PM');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_frist` varchar(50) CHARACTER SET utf8 NOT NULL,
  `user_last` varchar(50) CHARACTER SET utf8 NOT NULL,
  `user_img` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `user_email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_pass` varchar(55) CHARACTER SET utf8 NOT NULL,
  `user_regist` int(11) NOT NULL DEFAULT 0,
  `user_date_on` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_frist`, `user_last`, `user_img`, `user_email`, `user_pass`, `user_regist`, `user_date_on`) VALUES
(1, 'mahmod', 'khairy', '876_125990516__n.jpg', 'mahmoud@gmail.com', '123', 1, '24 Jan 2021'),
(2, 'ahmed', 'mohmed', '559_بيهايم.jpg', 'ahmed@gmail.com', '123', 1, '24 Jan 2021'),
(3, 'norhan', 'sihap', '790_mood.jpg', 'nor@gmail.com', '123', 0, '24 Jan 2021'),
(4, 'ail', 'ahmed', '405_86730293_2560000490792695_2366600385382055936_n.jpg', 'ail@gmail.com', '123', 0, '24 Jan 2021'),
(5, 'heko', 'mohmmed', '486_89279687_505696603707559_6438129352201732096_n.jpg', 'heko@gmail.com', '123', 0, '24 Jan 2021'),
(6, 'hesham', 'ail', '926_81944576_185714955953715_1502629862244876288_n.jpg', 'hes@gmail.com', '123', 0, '24 Jan 2021'),
(7, 'madgy', 'hommed', '526_89537643_120477489537792_7307189012152713216_n.jpg', 'mefg@gmail.com', '123', 0, '24 Jan 2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categor`
--
ALTER TABLE `categor`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `com_not`
--
ALTER TABLE `com_not`
  ADD PRIMARY KEY (`com_not_id`);

--
-- Indexes for table `meg_not`
--
ALTER TABLE `meg_not`
  ADD PRIMARY KEY (`meg_not_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`meg_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`re_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categor`
--
ALTER TABLE `categor`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `com_not`
--
ALTER TABLE `com_not`
  MODIFY `com_not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `meg_not`
--
ALTER TABLE `meg_not`
  MODIFY `meg_not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `meg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `re_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
