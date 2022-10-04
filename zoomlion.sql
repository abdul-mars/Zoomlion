-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2022 at 09:42 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoomlion`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `surname`, `firstname`, `gender`, `role`, `date_created`) VALUES
(1, '4297f44b13955235245b2497399d7a93', 'Mustapha', 'Abdul-Rashid', 'M', 1, '2022-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `house_info`
--

CREATE TABLE `house_info` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `house_name` varchar(255) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `gps` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `house_info`
--

INSERT INTO `house_info` (`id`, `email`, `house_name`, `house_no`, `location`, `gps`, `landmark`, `region`, `district`, `town`, `area`, `desc`) VALUES
(3, 'testing@gmail.com', 'sangzee dooyili', 'z-104', 'kanvili', 'N-0000-6484', 'zolya', 'northern', 'mion', 'sang', 'zolya', 'Give A little description of your house'),
(4, 'mustapha@gmail.com', 'Doo Yili', 'test 987', 'tamale islamic senior high school', 'n554', 'central mosque', 'northern region', 'nanton', 'jana', 'jana', 'Green painted gate'),
(5, 'fatawu@gmail.com', 'sangdoyili', 'jn244', 'tamale technical university', 'n-00000-9876', 'central mosque', 'south', 'su\'ala', 'yekum', 'yanda', 'Give A little description of your house'),
(6, 'again@gmail.com', 'test', '800 blk b', 'sakaaka', '', 'central mosqu', 'Northern region', 'tamale district', ' sakasaka', 'sakasaka', 'storey building with 4 floors'),
(7, 'abdulmars1102@gmail.com', 'testing', 'debuging', 'josonayili', '', 'central mosque', 'northern region', 'sagnarigu', 'jisonayi', 'jisonayili', 'very beautiful house'),
(8, 'user@user.com', 'user house', 'k 254a', 'tamale technical university', '', 'assembly hall', 'northern region', 'sagnarigu', 'tamale', 'tatu', 'red painted with blue gate facing east'),
(9, 'testing7@user.com', 'tessdf', 'sfsfs', 'tamale technical university', '', 'ghg', 'ghgfhgf', 'ffghgh', 'ryry', 'hfhf', 'Give A little description of your house'),
(10, 'user2@user.com', 'test2', 'test2', 'sang', '', 'school', 'northern region', 'nanton', 'tamale', 'tamale', 'testing '),
(11, 'dgdfgf@df.com', 'drrs', 'c121', 'saboba', '', 'ghg', 'northern region', 'yendi', 'saboba', 'yfyf', 'xfhgfjfu ytrsydfh ');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `read` tinyint(4) NOT NULL DEFAULT 0,
  `date_sent` date NOT NULL DEFAULT current_timestamp(),
  `time_sent` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `read`, `date_sent`, `time_sent`) VALUES
(1, 'Abdul-rashid Mustapha', 'mustapha@gmail.com', 'First message', 0, '2022-08-18', '07:52:49'),
(2, 'Abdul-rashid Mustapha', 'mustapha@gmail.com', 'First message', 0, '2022-08-18', '07:52:57'),
(3, 'Abdul-rashid Mustapha', 'mustapha@gmail.com', 'First ajax message', 0, '2022-08-18', '08:14:38'),
(4, 'Abdul-rashid Mustapha', 'mustapha@gmail.com', 'fgdfgd', 0, '2022-08-18', '08:25:13'),
(5, 'Abdul-rashid Mustapha', 'mustapha@gmail.com', 'fgdfgd', 0, '2022-08-18', '08:25:17'),
(6, 'Abdul-rashid Mustapha', 'mustapha@gmail.com', 'fgdfgd', 0, '2022-08-18', '08:25:19'),
(7, 'Abdul-rashid Mustapha', 'mustapha@gmail.com', 'ertrtret', 0, '2022-08-18', '08:25:41'),
(8, 'Abdul-rashid Mustapha', 'mustapha@gmail.com', 'fgggf', 0, '2022-08-18', '08:26:15'),
(9, 'Abdul-rashid Mustapha', 'mustapha@gmail.com', 'kjldf  ndfkj dsf', 0, '2022-08-18', '08:33:40'),
(10, 'Abdul-rashid Mustapha', 'mustapha@gmail.com', 'message trial', 0, '2022-08-18', '08:57:31'),
(11, 'Mustapha Abdul-Rashid', 'abdulmars1102@gmail.com', 'testing debuging message', 0, '2022-08-20', '01:34:21'),
(12, 'Abdul-rashid Mustapha', 'mustapha@gmail.com', 'rgdfg', 0, '2022-08-21', '10:32:53'),
(13, 'Abdul-rashid Mustapha', 'mustapha@gmail.com', 'fgdfgdfg', 0, '2022-08-21', '10:33:14'),
(14, 'User Account', 'user@user.com', 'dfdfhfhgfhfhh', 0, '2022-08-22', '11:16:22'),
(15, 'User Test Second', 'user2@user.com', 'dggdf', 0, '2022-08-23', '16:11:13'),
(16, 'User Test Second', 'user2@user.com', 'dfgdfg', 0, '2022-08-23', '16:11:54'),
(17, 'User Test Second', 'user2@user.com', 'dfgdfg', 0, '2022-08-23', '16:11:55'),
(18, 'User Test Second', 'user2@user.com', 'dfgdfg', 0, '2022-08-23', '16:11:55'),
(19, 'User Test Second', 'user2@user.com', 'dfgdfg', 0, '2022-08-23', '16:11:55'),
(20, 'User Test Second', 'user2@user.com', 'dfdgdfgdfgfd', 0, '2022-08-23', '16:12:00'),
(21, 'User Test Second', 'user2@user.com', 'dfdsffds', 0, '2022-08-23', '16:23:24'),
(22, 'User Test Second', 'user2@user.com', 'dfdsffds', 0, '2022-08-23', '16:23:25'),
(23, 'User Test Second', 'user2@user.com', 'dfdsffds', 0, '2022-08-23', '16:23:25'),
(24, 'User Test Second', 'user2@user.com', 'dfdsffds', 0, '2022-08-23', '16:23:25'),
(25, 'User Test Second', 'user2@user.com', 'dfdsffds', 0, '2022-08-23', '16:23:25'),
(26, 'User Test Second', 'user2@user.com', 'dfdsffds', 0, '2022-08-23', '16:23:25'),
(27, 'User Test Second', 'user2@user.com', 'dfdsffds', 0, '2022-08-23', '16:23:26'),
(28, 'User Test Second', 'user2@user.com', 'feedback', 0, '2022-08-23', '16:24:01'),
(29, 'User Test Second', 'user2@user.com', 'ggdgdfsg', 0, '2022-08-23', '16:26:06'),
(30, 'User Test Second', 'user2@user.com', 'Please type in your message', 0, '2022-08-23', '16:30:38'),
(36, 'User Test Second', 'user2@user.com', 'Please type in y', 0, '2022-08-23', '16:46:11'),
(38, 'User Account', 'abdulmars1102@gmail.com', 'hi tesingsj ls', 0, '2022-08-29', '01:02:44'),
(39, 'Abdul-rashid Mustapha', 'mustapha@gmail.com', 'gyuhnjtrdtryi', 0, '2022-09-01', '09:37:37');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`) VALUES
(1, 'marssoftwares1@gmail.com'),
(2, 'mustapha@gmail.com'),
(3, '');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `reason_id` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `read` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `reason_id`, `reason`, `email`, `status`, `read`) VALUES
(1, 1, 'request', '', 1, 0),
(2, 11, 'payment', '', 1, 0),
(3, 10, 'request', '', 1, 1),
(4, 15, 'payment', '', 1, 0),
(5, 38, 'request', '', 1, 0),
(6, 20, 'payment', '', 1, 0),
(7, 2, 'postpone', '', 1, 0),
(8, 4, 'postpone', '', 1, 0),
(10, 19, 'postpone', '', 1, 0),
(11, 4, 'postpone', '', 1, 0),
(12, 33, 'postpone', 'user@user.com', 1, 1),
(13, 20, 'postpone', 'user2@user.com', 1, 0),
(14, 33, 'postpone', 'user@user.com', 1, 1),
(15, 21, 'payment', '', 1, 1),
(16, 22, 'payment', '', 1, 1),
(17, 34, 'postpone', 'user@user.com', 1, 1),
(18, 39, 'request', '', 1, 0),
(19, 40, 'request', '', 1, 0),
(20, 33, 'postpone', 'user@user.com', 1, 1),
(21, 23, 'payment', '', 1, 0),
(22, 41, 'request', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `for` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `email`, `for`, `amount`, `date`) VALUES
(11, 'mustapha@gmail.com', 'Waste of 90Kg Pick up', 450, '2022-08-26 10:17:02'),
(12, 'mustapha@gmail.com', '30Kg Waste Pick up', 150, '2022-08-26 10:20:14'),
(13, 'mustapha@gmail.com', '20Kg Waste Pick up', 100, '2022-08-26 11:14:14'),
(14, 'mustapha@gmail.com', '20Kg Waste Pick up', 100, '2022-08-26 11:16:27'),
(15, 'mustapha@gmail.com', '30Kg Waste Pick up', 150, '2022-08-26 11:18:47'),
(16, 'mustapha@gmail.com', '200Kg Waste Pick up', 600, '2022-08-26 11:19:44'),
(17, 'user@user.com', '100Kg Waste Pick up', 700, '2022-08-27 14:50:44'),
(18, 'user@user.com', '30Kg Waste Pick up', 210, '2022-08-27 15:06:02'),
(19, 'user@user.com', '30Kg Waste Pick up', 210, '2022-08-27 15:06:27'),
(20, 'user@user.com', '30Kg Waste Pick up', 210, '2022-08-27 15:07:06'),
(21, 'user@user.com', '20Kg Waste Pick up', 60, '2022-08-29 02:30:55'),
(22, 'user@user.com', '40Kg Waste Pick up', 120, '2022-08-29 02:07:31'),
(23, 'user@user.com', '23Kg Waste Pick up', 69, '2022-09-06 02:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `pickup_requests`
--

CREATE TABLE `pickup_requests` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `waste_type` varchar(255) NOT NULL,
  `waste_size` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `pay_method` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `payed` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pickup_requests`
--

INSERT INTO `pickup_requests` (`id`, `email`, `waste_type`, `waste_size`, `date`, `time`, `status`, `pay_method`, `amount`, `payed`) VALUES
(1, 'testing@gmail.com', 'Hazardious', 5, '2022-08-19', 'Afternoon', 1, 'momo', 102, 0),
(2, 'mustapha@gmail.com', 'Non Hazardious', 0, '2022-08-21', 'Afternoon', 1, 'momo', 22, 0),
(3, 'fatawu@gmail.com', 'Hazardious', 5, '2022-08-16', 'Evening', 1, 'momo', 25, 0),
(7, 'mustapha@gmail.com', 'Non Hazardious', 343, '2022-08-18', 'Afternoon', 0, 'momo', 1029, 1),
(10, 'mustapha@gmail.com', 'Bio Waste', 4, '2022-08-30', 'Morning', 1, 'manual', 28, 0),
(11, 'mustapha@gmail.com', 'Non Hazardious', 5, '2022-08-31', 'Afternoon', 1, 'momo', 15, 0),
(14, 'user@user.com', 'Hazardious', 23, '2022-08-23', 'Morning', 1, 'manual', 115, 0),
(15, 'user@user.com', 'Hazardious', 30, '2022-08-23', 'Morning', 1, 'momo', 150, 0),
(17, 'user@user.com', 'Non Hazardious', 90, '2022-08-23', 'Morning', 1, 'momo', 270, 0),
(18, 'user@user.com', 'Hazardious', 25, '2022-08-24', 'Evening', 1, 'momo', 125, 0),
(19, 'fatawu@gmail.com', 'Hazardious', 43, '2022-08-30', 'Afternoon', 1, 'momo', 215, 0),
(20, 'user2@user.com', 'Hazardious', 20, '2022-09-29', 'Afternoon', 1, 'momo', 100, 0),
(21, 'user2@user.com', 'Bio Waste', 30, '2022-08-25', 'Morning', 0, 'momo', 210, 0),
(22, 'user2@user.com', 'Hazardious', 9, '2022-09-29', 'Afternoon', 0, 'momo', 45, 0),
(23, 'user2@user.com', 'Hazardious', 50, '2022-08-28', 'Morning', 0, 'momo', 250, 1),
(24, 'mustapha@gmail.com', 'Non Hazardious', 22, '2022-08-24', 'Afternoon', 0, 'momo', 66, 0),
(25, 'mustapha@gmail.com', 'Hazardious', 22, '2022-08-26', 'Evening', 0, 'momo', 110, 0),
(26, 'mustapha@gmail.com', 'Hazardious', 30, '2022-09-08', 'Afternoon', 0, 'momo', 150, 1),
(27, 'mustapha@gmail.com', 'Hazardious', 90, '2022-08-25', 'Afternoon', 0, 'momo', 450, 0),
(29, 'mustapha@gmail.com', 'Bio Waste', 100, '2022-09-10', 'Evening', 0, 'momo', 700, 0),
(30, 'mustapha@gmail.com', 'Non Hazardious', 200, '2022-08-24', 'Afternoon', 0, 'momo', 600, 1),
(31, 'mustapha@gmail.com', 'Non Hazardious', 177, '2022-09-01', 'Evening', 0, 'momo', 531, 0),
(32, 'mustapha@gmail.com', 'Hazardious', 20, '2022-08-25', 'Morning', 0, 'momo', 100, 0),
(33, 'user@user.com', 'Non Hazardious', 20, '2022-09-30', 'Afternoon', 0, 'momo', 60, 1),
(34, 'user@user.com', 'Non Hazardious', 40, '2022-08-31', 'Morning', 0, 'momo', 120, 1),
(35, 'user@user.com', 'Bio Waste', 100, '2022-09-09', 'Morning', 0, 'momo', 700, 1),
(36, 'user@user.com', 'Bio Waste', 12, '2022-09-16', 'Evening', 0, 'momo', 84, 0),
(37, 'user@user.com', 'Bio Waste', 30, '2022-09-02', 'Afternoon', 0, 'momo', 210, 1),
(38, 'user@user.com', 'Non Hazardious', 23, '2022-09-10', 'Afternoon', 0, 'momo', 69, 1),
(40, 'dgdfgf@df.com', 'Hazardious', 20, '2022-09-01', 'Evening', 0, 'momo', 100, 0),
(41, 'user@user.com', 'Non Hazardious', 34, '2022-09-29', 'Evening', 0, 'momo', 102, 0);

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `id` int(11) NOT NULL,
  `waste_type` varchar(255) NOT NULL,
  `place_type` varchar(255) NOT NULL,
  `amout` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `waste_type`, `place_type`, `amout`) VALUES
(1, 'Non Hazardious', 'Home', 3),
(2, 'Hazardious', 'Home', 5),
(3, 'Bio Waste', 'Home', 7),
(4, 'Non Hazardious', 'Company', 4),
(5, 'Hazardious', 'Company', 6),
(6, 'Bio Waste', 'Company', 8);

-- --------------------------------------------------------

--
-- Table structure for table `userstable`
--

CREATE TABLE `userstable` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userstable`
--

INSERT INTO `userstable` (`id`, `email`, `surname`, `firstname`, `gender`, `phone`, `password`, `token`, `role`, `date_created`) VALUES
(2, 'mustapha@gmail.com', 'abdul-rashid', 'mustapha', 'M', '0249393898', '4297f44b13955235245b2497399d7a93', '', 0, '2022-08-12'),
(4, 'fatawu@gmail.com', 'fatawu', 'issah', 'F', '0249393898', '4297f44b13955235245b2497399d7a93', '', 0, '2022-08-12'),
(14, 'illiasu@gmail.com', 'abubakari', 'Illiasu', 'M', '345646756767', '10f7df2451ae3f3c02d31cbd1ee825f8', '', 1, '2022-08-18'),
(17, 'testing4@gmail.com', 'testing', 'testing', 'F', '0325588955', '', 'i09Nsrd7', 1, '2022-08-19'),
(18, 'again@gmail.com', 'testing ', 'again', 'f', '35465768798', '02c75fb22c75b23dc963c7eb91a062cc', '', 0, '2022-08-19'),
(19, 'abdulmars1102@gmail.com', 'Mustapha', 'Abdul-Rashid', 'm', '0551731827', '4297f44b13955235245b2497399d7a93', '', 0, '2022-08-20'),
(20, 'admin@admin.com', 'admin', 'update testing', 'M', '124879621', '4297f44b13955235245b2497399d7a93', '', 1, '2022-08-21'),
(21, 'user@user.com', 'User', 'Account', 'M', '0248565266', '4297f44b13955235245b2497399d7a93', '', 0, '2022-08-22'),
(23, 'testing7@user.com', 'test', 'test', 'm', '021588756545', '4531e8924edde928f341f7df3ab36c70', '', 0, '2022-08-22'),
(24, 'user2@user.com', 'user', 'test second', 'f', '02134564678', 'e10adc3949ba59abbe56e057f20f883e', '', 0, '2022-08-23'),
(25, 'dgdfgf@df.com', 'ABDUL-RASHID', 'ghgfhgfh', 'm', '02155846511', '4531e8924edde928f341f7df3ab36c70', '', 0, '2022-09-01'),
(26, 'sfsgf@dfd.cvgh', 'gff', 'dfgdfgdf', 'M', '5467567568', '02c75fb22c75b23dc963c7eb91a062cc', '', 1, '2022-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `verif_code`
--

CREATE TABLE `verif_code` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` varchar(15) NOT NULL,
  `time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house_info`
--
ALTER TABLE `house_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickup_requests`
--
ALTER TABLE `pickup_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userstable`
--
ALTER TABLE `userstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verif_code`
--
ALTER TABLE `verif_code`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `house_info`
--
ALTER TABLE `house_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pickup_requests`
--
ALTER TABLE `pickup_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userstable`
--
ALTER TABLE `userstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `verif_code`
--
ALTER TABLE `verif_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
