-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2021 at 08:22 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caffe_luccas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `surname`, `password`) VALUES
(76, 'aaa', 'aaa', '74b87337454200d4d33f80c4663dc5e5'),
(80, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(225) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image_name`, `active`) VALUES
(27, 'gratarel', 'Food_Category_999.png', 'Yes'),
(28, 'omlette', 'Food_Category_164.png', 'Yes'),
(33, 'offers', 'Food_category_177.png', 'Yes'),
(35, 'aaaaaaaaaaaaa', 'Food_category_550.jpg', 'Yes'),
(36, 'faina', 'Food_category_36.jpg', 'Yes'),
(37, 'aaaaaaaaaaaaaaaaaaaaaaa', 'Food_category_485.jpg', 'Yes'),
(38, 'durumaaaaa', 'Food_category_466.jpg', 'Yes'),
(39, 'leustean', 'Food_category_588.jpg', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(300) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `active` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `active`) VALUES
(7, 'salata beoufaaaaa', 'laaaaaaaaaaaaa', '10.00', 'Food-Name-734.png', 33, 'Yes'),
(12, 'pizza', 'lorem ipsum', '7.00', 'Food-Name-1761.png', 33, 'Yes'),
(13, 'piure', 'lorem ipsum', '7.00', 'Food-Name-6958.png', 27, 'Yes'),
(14, 'saorma', 'lorem', '5.00', 'Food-Name-6222.jpg', 27, 'Yes'),
(15, 'eeeeeeeeeeeeeeeee', 'eeeeeeeeeeee', '2.00', 'Food-Name-4141.jpg', 28, 'Yes'),
(16, 'spaghetti', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '6.00', 'Food-Name-7670.jpg', 27, 'Yes'),
(17, 'limonada', 'yummy yummyyummyyummyyummyyummyyummyyummyyummy', '90.00', 'Food-Name-3333.jpg', 27, 'Yes'),
(18, '', '', '5.00', '', 27, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(300) NOT NULL,
  `active` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `title`, `description`, `price`, `image_name`, `active`) VALUES
(5, 'paste ton', 'aaaaaaaaa', '8.00', 'Food-Name-9086.jpg', 'Yes'),
(6, 'uuuuuuu', 'uuuuuuu', '43.00', 'Food-Name-5687.jpg', 'Yes'),
(7, 'pizza', 'aaaa', '1111.00', 'Food-Name-6701.jpg', 'Yes'),
(8, 'aaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaa', '99.99', 'Food-Name-1829.jpg', 'Yes'),
(9, 'rosii', 'sos', '123123.00', 'Food-Name-5637.jpg', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(200) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`id`, `food`, `price`, `quantity`, `total`, `order_date`, `status`, `name`, `contact`, `email`, `address`) VALUES
(1, 'pizza', '100.00', 10, '300.00', '0000-00-00 00:00:00', 'string', 'john', 'string123', 'john@string', 'copenhagen'),
(2, 'pizza', '508.00', 4, '2032.00', '2021-07-27 09:32:41', 'Ordered', 'Ciprian Andrei Rosu', 'cvncncv', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(3, 'steak', '9.00', 8, '72.00', '2021-07-27 09:37:26', 'On Delivery', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(4, 'eeeeee', '5.00', 8, '40.00', '2021-07-28 03:11:53', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(21, 'salata beouf', '10.00', 1, '10.00', '2021-08-03 10:01:49', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(22, 'salata beouf', '10.00', 2, '20.00', '2021-08-03 10:04:48', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(23, 'qqqqqwewewewewewewew', '12345.00', 5, '61725.00', '2021-08-03 10:06:45', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(24, 'steak', '9.00', 2, '18.00', '2021-08-03 10:07:06', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(25, 'steak', '9.00', 2, '18.00', '2021-08-03 10:08:31', 'Delivered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(29, 'qqqqqwewewewewewewew', '345.00', 1, '345.00', '2021-08-05 04:00:02', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(30, 'steak', '9.00', 1, '9.00', '2021-08-05 04:29:03', 'Delivered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(31, 'paste ton', '8.00', 1, '8.00', '2021-08-05 04:29:38', 'Delivered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C Albertslund'),
(32, 'steak', '9.00', 1, '9.00', '2021-08-05 06:20:08', 'On Delivery', 'Ciprian ', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(33, 'qqqqqwewewewewewewew', '345.00', 1, '345.00', '2021-08-05 09:27:28', 'Delivered', 'Ciprian Andrei Rosu', '10000000', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(34, 'steak', '9.00', 5, '45.00', '2021-08-05 09:40:06', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'aaaaaaaaaaa\r\naaaaaaa'),
(35, 'fries', '33.00', 18, '594.00', '2021-08-06 02:51:53', 'Delivered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(36, 'limonada', '90.00', 16, '1440.00', '2021-08-06 07:47:27', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(37, 'paste ton', '8.00', 1, '8.00', '2021-08-07 05:21:55', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(38, 'uuuuuuu', '43.00', 1, '43.00', '2021-08-07 05:21:55', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(39, 'pizza', '1111.00', 6, '6666.00', '2021-08-07 05:21:55', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(40, 'paste ton', '8.00', 1, '8.00', '2021-08-07 05:22:06', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(41, 'uuuuuuu', '43.00', 1, '43.00', '2021-08-07 05:22:06', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(42, 'pizza', '1111.00', 6, '6666.00', '2021-08-07 05:22:06', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(43, 'paste ton', '8.00', 1, '8.00', '2021-08-07 05:26:17', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(44, 'uuuuuuu', '43.00', 1, '43.00', '2021-08-07 05:26:17', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(45, 'pizza', '1111.00', 6, '6666.00', '2021-08-07 05:26:17', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(46, 'paste ton', '8.00', 1, '8.00', '2021-08-07 05:42:26', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(47, 'uuuuuuu', '43.00', 1, '43.00', '2021-08-07 05:42:26', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(48, 'pizza', '1111.00', 4, '4444.00', '2021-08-07 05:42:26', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(49, 'paste ton', '8.00', 1, '8.00', '2021-08-07 05:45:34', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(50, 'paste ton', '8.00', 1, '8.00', '2021-08-07 06:12:08', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(51, 'rosii', '123123.00', 1, '123123.00', '2021-08-07 06:12:33', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(52, 'rosii', '123123.00', 1, '123123.00', '2021-08-07 06:14:32', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(53, 'paste ton', '8.00', 9, '72.00', '2021-08-07 06:17:18', 'Ordered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C'),
(54, 'rosii', '123123.00', 14, '1723722.00', '2021-08-07 06:17:18', 'Delivered', 'Ciprian Andrei Rosu', '71869791', 'cip.rosu@yahoo.com', 'Morbærhaven 3 C');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `persons` int(11) NOT NULL,
  `reservation_date` datetime NOT NULL,
  `reservation_time` datetime NOT NULL,
  `status` varchar(150) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `comment` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `name`, `persons`, `reservation_date`, `reservation_time`, `status`, `contact`, `email`, `comment`) VALUES
(1, 'Ciprian Andrei Rosu', 5, '2021-08-05 05:55:34', '0000-00-00 00:00:00', 'Reserved', '+4571869791', 'cip.rosu@yahoo.com', 'Lorem ipsum'),
(2, 'John Doe', 8, '2021-08-05 06:50:35', '0000-00-00 00:00:00', 'Reserved', '+4571869791', 'cip.rosu@yahoo.com', 'Lorem ipsum'),
(3, 'Ion Rotaru', 7, '2021-08-06 09:01:06', '0000-00-00 00:00:00', 'Reserved', '+4571869791', 'cip.rosu@yahoo.com', 'aaaaaaaaaaaa aaaaaaaaaaaaaaaa aaaaaaaaaaaaaa aaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaa aaaaaaaaaaaa aaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(4, 'Ciprian Andrei Rosu', 1, '2021-08-06 10:59:27', '0000-00-00 00:00:00', 'Reserved', '+4571869791', 'cip.rosu@yahoo.com', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
