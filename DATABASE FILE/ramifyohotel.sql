-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 04:19 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ramifyohotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` varchar(5) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `website` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `telephone`, `email`, `address`, `website`) VALUES
('c1', '+94 767 24 2153', 'ramifyo@yahoo.com', 'The Coco Beach Resort,No: 155,Poruthota Road,Palagathure,Kochchikade,Negombo,Sri Lanka.11540.', 'www.ramifyo.lk');

-- --------------------------------------------------------

--
-- Table structure for table `customer_feedback`
--

CREATE TABLE `customer_feedback` (
  `feedbackid` int(10) NOT NULL,
  `cusname` varchar(50) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_feedback`
--

INSERT INTO `customer_feedback` (`feedbackid`, `cusname`, `emailid`, `description`, `date_time`) VALUES
(39, 'Sameera Gurusinghe', 'sameeragurusinghe1@gmail.com', 'Thanks a lot. As a company you are provide good customer services.', '2021-08-28 06:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `foodorders`
--

CREATE TABLE `foodorders` (
  `foodorderid` int(11) NOT NULL,
  `customerid` varchar(255) NOT NULL,
  `foodname` varchar(255) NOT NULL,
  `foodid` varchar(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `orderstatus` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodorders`
--

INSERT INTO `foodorders` (`foodorderid`, `customerid`, `foodname`, `foodid`, `amount`, `price`, `date`, `orderstatus`) VALUES
(23, 'sameeragurusinghe1@gmail.com', 'Watermelon Juice', '27', 1, 150, '2021-08-30 19:34:24', 1),
(36, 'sameeragurusinghe1@gmail.com', 'Chicken Noodles', '12', 2, 280, '2021-08-30 18:57:29', 1),
(37, 'sameeragurusinghe1@gmail.com', 'Rice and Curry', '5', 2, 280, '2021-08-30 18:59:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `foodid` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `ftype` varchar(255) NOT NULL,
  `mealplantype` varchar(100) NOT NULL,
  `fdescription` varchar(500) NOT NULL,
  `fimage` varchar(500) NOT NULL,
  `foodstatus` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`foodid`, `name`, `price`, `ftype`, `mealplantype`, `fdescription`, `fimage`, `foodstatus`) VALUES
(1, 'Chicken Fried Rice', 450, 'rice', 'all', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Chicken Fried Rice.jpg', 0),
(2, 'Egg Fried Rice', 350, 'rice', 'all', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Egg Fried Rice.jpg', 0),
(3, 'Sea Food Fried Rice', 400, 'rice', 'all', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Sea Food Fried rice.jpg', 0),
(4, 'Vegetable Fride Rice', 400, 'rice', 'all', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Vegetable Friede Rice.jpg', 0),
(5, 'Rice and Curry', 280, 'rice', 'breakfast', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Rice and Curry.jpg', 0),
(6, 'Milk Rice', 150, 'rice', 'breakfast', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Milk Rice.jpg', 0),
(7, 'Cheese Koththu', 500, 'koththu', 'all', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Cheese Koththu.jpg', 0),
(8, 'Chicken Koththu', 400, 'koththu', 'all', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Chicken Koththu.jpg', 0),
(9, 'Egg Koththu', 300, 'koththu', 'all', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Egg Koththu.jpg', 1),
(10, 'Mixed Koththu', 600, 'koththu', 'all', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Mixed Koththu.jpg', 0),
(11, 'Beef Koththu', 400, 'koththu', 'all', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Beef Koththu.jpg', 0),
(12, 'Chicken Noodles', 280, 'noodles', 'dinner', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Chicken Noodles.jpg', 0),
(13, 'Egg Noodles', 250, 'noodles', 'dinner', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Egg Noodles.jpg', 0),
(14, 'Mixed Noodles', 320, 'noodles', 'dinner', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Mixed Noodles.jpg', 0),
(15, 'Sea Food Noodles', 280, 'noodles', 'dinner', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Sea Food Noodles.jpg', 0),
(16, 'Vegetable Noodles', 200, 'noodles', 'dinner', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Vegetable Noodles.jpg', 0),
(17, 'Chicken Soup', 200, 'soup', 'all', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Chicken Soup.jpg', 0),
(18, 'Tom Yurn Soup', 180, 'soup', 'all', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Tom Yurn Soup.jpg', 1),
(19, 'Vegetable Soup', 150, 'soup', 'all', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Vegetable Soup.jpg', 0),
(20, 'Mixed Soup', 180, 'soup', 'all', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Mixed Soup.jpg', 0),
(21, 'Chicken Curry', 150, 'curry', 'curry', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Chicken Curry.jpg', 0),
(22, 'Fish Curry', 150, 'curry', 'curry', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Fish Curry.jpg', 0),
(23, 'Dhal Curry', 100, 'curry', 'curry', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Dhal Curry.jpg', 0),
(24, 'Potato Curry', 80, 'curry', 'curry', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Potato Curry.jpg', 0),
(25, 'Egg curry', 80, 'curry', 'curry', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Egg curry.jpg', 0),
(26, 'Orange Juice', 150, 'drink', 'drink', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Orange Juice.jpg', 0),
(27, 'Watermelon Juice', 150, 'drink', 'drink', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Watermelon Juice.jpg', 0),
(28, 'Grape Juice', 200, 'drink', 'drink', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Grape Juice.jpg', 0),
(29, 'Ice Coffee', 100, 'drink', 'drink', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Ice Coffee.jpg', 0),
(30, 'Tea', 50, 'drink', 'drink', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Tea.jpg', 0),
(31, 'Coffee', 50, 'drink', 'drink', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Coffee.jpg', 0),
(32, 'Fruit Salad', 170, 'dessert', 'dessert', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Fruit Salad.jpg', 0),
(33, 'Ice Cream', 100, 'dessert', 'dessert', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Ice Cream.jpg', 0),
(34, 'Jelly', 80, 'dessert', 'dessert', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Jelly.jpg', 0),
(35, 'Watalappan', 100, 'dessert', 'dessert', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Watalappan.jpg', 0),
(36, 'Jelly Custard', 150, 'dessert', 'dessert', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Jelly Custard.jpg', 0),
(37, 'Bread', 70, 'various', 'breakfast', 'The meal description is here. We can add any description relevant to the meal.', 'images/food/Bread.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news_offer`
--

CREATE TABLE `news_offer` (
  `news_id` int(10) NOT NULL,
  `posttype` varchar(20) NOT NULL,
  `expiredate` datetime NOT NULL,
  `title` varchar(200) NOT NULL,
  `postdescription` longtext NOT NULL,
  `postimage` varchar(250) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_offer`
--

INSERT INTO `news_offer` (`news_id`, `posttype`, `expiredate`, `title`, `postdescription`, `postimage`, `datetime`) VALUES
(35, 'news', '2021-09-30 13:01:00', 'Initiate communication before arrival', 'As soon as our guests have booked their stay, our first instinct is to send them a booking confirmation mail or hotel reservation voucher.', 'images/postimages/21-08-21 01.02.03 PMAug.jpg', '2021-08-21 01:02:03'),
(39, 'offer', '2025-08-31 11:00:00', 'This is test News. (Project - ll - IIT 3rd Year (2016/17 Batch)- Group 03)', 'Hello everyone. This is test news. The Ramifyo Coco Beach Resort website is our 3rd year group project. Released date : 31st of August, 2021. Contibutors : Sameera Gurusinghe, Kelum Dilshan, Kaveesha Navanjani, Gayathri Dilrukshika.', 'images/postimages/21-09-02 06.03.12.jpg', '2021-09-02 06:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `food_id`, `rating`) VALUES
(1, 6, 3),
(45, 6, 5),
(46, 2, 4),
(47, 19, 3),
(48, 22, 4),
(49, 27, 4),
(50, 10, 4),
(51, 26, 3),
(52, 28, 4),
(53, 29, 2),
(54, 31, 1),
(55, 26, 4),
(56, 26, 3),
(57, 27, 3),
(58, 17, 3),
(59, 12, 3),
(60, 1, 4),
(61, 35, 4),
(62, 14, 4);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(10) NOT NULL,
  `room_no` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `adults` int(5) NOT NULL,
  `childs` int(5) NOT NULL,
  `advance_amount` int(100) NOT NULL,
  `check_in` datetime DEFAULT NULL,
  `check_out` datetime DEFAULT NULL,
  `nights` int(5) NOT NULL,
  `res_status` int(2) NOT NULL,
  `fullpayment` varchar(50) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `room_no`, `email`, `adults`, `childs`, `advance_amount`, `check_in`, `check_out`, `nights`, `res_status`, `fullpayment`, `date_time`) VALUES
(90, 18, 'sameeragurusinghe1@gmail.com', 2, 2, 1000, '2021-08-30 14:00:00', '2021-09-01 12:00:00', 2, 1, '12670', '2021-08-20 16:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(10) NOT NULL,
  `room_no` int(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `rate` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_no`, `description`, `rate`) VALUES
(1, 1, 'Ground Floor', 6000),
(2, 2, 'Ground Floor', 6000),
(3, 3, 'Ground Floor', 6000),
(4, 4, 'Ground Floor', 6000),
(5, 5, 'Ground Floor', 6000),
(6, 6, 'Ground Floor', 6000),
(7, 7, 'First Floor', 6000),
(8, 8, 'First Floor', 6000),
(9, 9, 'First Floor', 6000),
(10, 10, 'First Floor', 6000),
(11, 11, 'First Floor', 6000),
(12, 12, 'First Floor', 6000),
(13, 13, 'First Floor', 6000),
(14, 14, 'Second Floor', 6000),
(15, 15, 'Second Floor', 6000),
(16, 16, 'Second Floor', 6000),
(17, 17, 'Second Floor', 6000),
(18, 18, 'Second Floor', 6000),
(19, 19, 'Second Floor', 6000),
(20, 20, 'Second Floor', 6000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(15) NOT NULL,
  `usertype` int(5) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `phoneno` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `reset_link_token` varchar(255) NOT NULL,
  `exp_date` datetime NOT NULL DEFAULT current_timestamp(),
  `streete` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `propicture` mediumtext NOT NULL,
  `regdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `fullname`, `nic`, `phoneno`, `email`, `password`, `reset_link_token`, `exp_date`, `streete`, `city`, `state`, `propicture`, `regdate`) VALUES
(57, 1, 'sameera udayanga', '123456789v', 123456789, 'admin@gmail.com', '84594f7f73006a95762f6b4831135ab8', '', '2021-08-19 15:50:41', 'Kahaduwa', 'Elpitiya', 'Galle', 'profilepicture/123456789v.png', '2021-07-01 00:00:00'),
(58, 2, 'Asanka', '123456756v', 123456783, 'employee@gmail.com', '84594f7f73006a95762f6b4831135ab8', '', '2021-08-19 15:50:41', 'Thelwaththa', 'Hikkaduwa', 'Sri Lanka', 'profilepicture/123456789v.png', '2021-07-01 00:00:00'),
(96, 0, 'Sameera Gurusinghe', '964534233v', 766239095, 'sameeragurusinghe1@gmail.com', '84594f7f73006a95762f6b4831135ab8', '', '0000-00-00 00:00:00', 'Kahaduwa', 'Elpitiya', 'Sri Lanka', 'profilepicture/964534233v.png', '2021-08-20 10:14:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  ADD PRIMARY KEY (`feedbackid`);

--
-- Indexes for table `foodorders`
--
ALTER TABLE `foodorders`
  ADD PRIMARY KEY (`foodorderid`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`foodid`);

--
-- Indexes for table `news_offer`
--
ALTER TABLE `news_offer`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  MODIFY `feedbackid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `foodorders`
--
ALTER TABLE `foodorders`
  MODIFY `foodorderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `foodid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `news_offer`
--
ALTER TABLE `news_offer`
  MODIFY `news_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
