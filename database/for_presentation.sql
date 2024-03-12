-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 04:12 PM
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
-- Database: `for_presentation`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brands_id` int(20) NOT NULL,
  `brand_name` varchar(255) DEFAULT NULL,
  `active` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(20) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `active` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(20) NOT NULL,
  `logo_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `published_by` varchar(255) NOT NULL,
  `published_on` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `logo_name`, `status`, `published_by`, `published_on`) VALUES
(1, 'logo.png', 'active', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `logo_text`
--

CREATE TABLE `logo_text` (
  `id` int(20) NOT NULL,
  `logo_text` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `published_by` varchar(255) NOT NULL,
  `published_on` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logo_text`
--

INSERT INTO `logo_text` (`id`, `logo_text`, `status`, `published_by`, `published_on`) VALUES
(1, 'Danielle Motorshop', 'active', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `models_id` int(20) NOT NULL,
  `model_name` varchar(255) DEFAULT NULL,
  `active` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `products_id` int(20) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `unit_price` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_description` longtext DEFAULT NULL,
  `product_category` varchar(255) DEFAULT NULL,
  `product_brand` varchar(255) DEFAULT NULL,
  `product_model` varchar(255) DEFAULT NULL,
  `product_availability` varchar(255) DEFAULT NULL,
  `published_on` varchar(255) DEFAULT NULL,
  `published_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_id`, `product_name`, `product_code`, `unit_price`, `qty`, `product_image`, `product_description`, `product_category`, `product_brand`, `product_model`, `product_availability`, `published_on`, `published_by`) VALUES
(5, 'Hotdog', '0000000000', '1500', '4', '', 'asdasdasdasd', 'Oil', 'Muggsy', 'N-max', 'AVAILABLE', 'March 1,2024 11:49 AM', 'John Doe'),
(6, 'Cheesedog', '1111111111', '2000', '7', '', 'asdasdasdasdasd', '', '', '', 'AVAILABLE', 'March 1,2024 11:49 AM', 'John Doe'),
(7, 'Tasty', '2222222222', '2500', '8', '', 'asdasdasdasd', '', '', '', 'AVAILABLE', 'March 1,2024 11:49 AM', 'John Doe'),
(8, 'Baket', '5555555555', '1500', '1', '', 'asdasdasdasd asd asda sda sd', 'Oil', 'T1000', 'Honda Click(v2)', 'AVAILABLE', '', 'John Doe'),
(9, 'Baket', '5555555555', '1500', '1', '', 'asdasdasdasd asd asda sda sd', 'Oil', 'T1000', 'Honda Click(v2)', 'AVAILABLE', 'March 1,2024 11:52 AM', 'John Doe'),
(10, 'Baket', '5555555555', '1500', '1', '', 'asdasdasdasd asd asda sda sd', 'Oil', 'T1000', 'Honda Click(v2)', 'AVAILABLE', 'March 1,2024 11:52 AM', 'John Doe'),
(11, 'palaman', '7777777777777777', '123141', '11', '', 'asdasdasdasd', 'Oil', 'T1000', 'Honda Click(v2)', 'AVAILABLE', 'March 1,2024 11:55 AM', 'John Doe');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(20) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `user_position` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `permissions_id` int(20) NOT NULL,
  `position_name` varchar(50) DEFAULT NULL,
  `permission_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_positions`
--

CREATE TABLE `user_positions` (
  `positions_id` int(20) NOT NULL,
  `position_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brands_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo_text`
--
ALTER TABLE `logo_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`models_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`permissions_id`);

--
-- Indexes for table `user_positions`
--
ALTER TABLE `user_positions`
  ADD PRIMARY KEY (`positions_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logo_text`
--
ALTER TABLE `logo_text`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
