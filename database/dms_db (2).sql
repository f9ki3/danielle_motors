-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 06:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 3 COMMENT 'default 3= admin = 1\r\ncashier = 2',
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `date`, `username`, `password`, `fname`, `lname`, `email`, `contact`, `img`, `role`, `status`) VALUES
(1, '2024-02-25', 'fyke', 'fyke', 'Fyke', 'Lleva', 'floterina@gmail.com', '09707658383', 'profile.png', 3, 0),
(2, '2024-02-25', 'alex', 'alex', 'Alexander', 'Inciong', 'alex@gmail.com', '09120912091', 'profile.png', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_data`
--

CREATE TABLE `attribute_data` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_attribute` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_id` int(11) NOT NULL,
  `batch_date` date NOT NULL,
  `batch_price` double NOT NULL,
  `rack_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `brand_name` varchar(20) NOT NULL,
  `publish_by` varchar(20) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `date_added`, `brand_name`, `publish_by`, `status`) VALUES
(1, '2024-03-07', 'YSS', 'admin', 1),
(2, '2024-03-07', 'Bendix', 'admin', 1),
(3, '2024-03-07', 'Vee Rubber', 'admin', 1),
(4, '2024-03-07', 'Quick Phoenix', 'admin', 1),
(5, '2024-03-07', 'GPC', 'admin', 1),
(6, '2024-03-07', 'Racing Monkey', 'admin', 1),
(7, '2024-03-07', 'Michiba', 'admin', 1),
(8, '2024-03-07', 'Hansa Parts', 'admin', 1),
(9, '2024-03-07', 'Aspira', 'admin', 1),
(10, '2024-03-07', 'Koby', 'admin', 1),
(11, '2024-03-07', 'MOTMOT', 'admin', 1),
(12, '2024-03-07', 'Osram', 'admin', 1),
(13, '2024-03-07', 'Kixx', 'admin', 1),
(14, '2024-03-07', 'Quantum', 'admin', 1),
(15, '2024-03-07', 'Eneos', 'admin', 1),
(16, '2024-03-07', 'E Power', 'admin', 1),
(17, '2024-03-07', 'TAKASAGO', 'admin', 1),
(18, '2024-03-07', 'Koyo', 'admin', 1),
(19, '2024-03-07', 'CSL', 'admin', 1),
(20, '2024-03-07', 'Domino', 'admin', 1),
(21, '2024-03-07', 'Mokoto', 'admin', 1),
(22, '2024-03-07', 'RS8', 'admin', 1),
(23, '2024-03-07', 'Yakimoto', 'admin', 1),
(24, '2024-03-07', 'APIOO', 'admin', 1),
(25, '2024-03-07', 'Speed Power', 'admin', 1),
(26, '2024-03-07', 'CVT', 'admin', 1),
(27, '2024-03-07', 'Tiger', 'admin', 1),
(28, '2024-03-07', 'Join New Motion', 'admin', 1),
(29, '2024-03-07', 'MLKNUL', 'admin', 1),
(30, '2024-03-07', 'Koso', 'admin', 1),
(31, '2024-03-07', '4S1M', 'admin', 1),
(32, '2024-03-07', 'KRS', 'admin', 1),
(33, '2024-03-07', 'DWIN', 'admin', 1),
(34, '2024-03-07', 'Mutaru', 'admin', 1),
(35, '2024-03-07', 'Kryon', 'admin', 1),
(36, '2024-03-07', 'iPart', 'admin', 1),
(37, '2024-03-07', 'Parts A Grade', 'admin', 1),
(38, '2024-03-07', 'G-Ren', 'admin', 1),
(39, '2024-03-07', 'Kobraa-X', 'admin', 1),
(40, '2024-03-07', 'Mishiba', 'admin', 1),
(41, '2024-03-07', 'Samco', 'admin', 1),
(42, '2024-03-07', 'Faito', 'admin', 1),
(43, '2024-03-07', 'Honda', 'admin', 1),
(44, '2024-03-07', 'VIZA', 'admin', 1),
(45, '2024-03-07', 'JVT', 'admin', 1),
(46, '2024-03-07', 'TSR', 'admin', 1),
(47, '2024-03-07', 'CHOHO', 'admin', 1),
(48, '2024-03-07', 'i-Mot', 'admin', 1),
(49, '2024-03-07', 'Yaguso', 'admin', 1),
(50, '2024-03-07', 'MKN', 'admin', 1),
(51, '2024-03-07', 'Owens', 'admin', 1),
(52, '2024-03-07', 'ZIC', 'admin', 1),
(53, '2024-03-07', 'Powertec', 'admin', 1),
(54, '2024-03-07', 'Sun', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `category_name` varchar(20) NOT NULL,
  `publish_by` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `date_added`, `category_name`, `publish_by`, `status`) VALUES
(1, '2024-03-07', 'Accessories', 'admin', 1),
(2, '2024-03-07', 'Car Sprocket', 'admin', 1),
(3, '2024-03-07', 'Crank Shaft', 'admin', 1),
(4, '2024-03-07', 'Cap Tappet', 'admin', 1),
(5, '2024-03-07', 'Crankcase', 'admin', 1),
(6, '2024-03-07', 'Carbon Brush', 'admin', 1),
(7, '2024-03-07', 'Cylinder Block Kit', 'admin', 1),
(8, '2024-03-07', 'Carburetor', 'admin', 1),
(9, '2024-03-07', 'Cylinder Cover', 'admin', 1),
(10, '2024-03-07', 'Adhesive', 'admin', 1),
(11, '2024-03-07', 'Cylinder Head', 'admin', 1),
(12, '2024-03-07', 'Carburetor Assy', 'admin', 1),
(13, '2024-03-07', 'Carburetor Parts', 'admin', 1),
(14, '2024-03-07', 'Castle Nut', 'admin', 1),
(15, '2024-03-07', 'CDI', 'admin', 1),
(16, '2024-03-07', 'CDI Socket', 'admin', 1),
(17, '2024-03-07', 'Cylinder Head Packin', 'admin', 1),
(18, '2024-03-07', 'Center Spring', 'admin', 1),
(19, '2024-03-07', 'Damper', 'admin', 1),
(20, '2024-03-07', 'Center Stand', 'admin', 1),
(21, '2024-03-07', 'Diesel Oil', 'admin', 1),
(22, '2024-03-07', 'Center Stand S', 'admin', 1),
(23, '2024-03-07', 'Air Filter Element', 'admin', 1),
(24, '2024-03-07', 'Dip Stick', 'admin', 1),
(25, '2024-03-07', 'Disk Plate', 'admin', 1),
(26, '2024-03-07', 'Drain Plug', 'admin', 1),
(27, '2024-03-07', 'Drive Belt', 'admin', 1),
(28, '2024-03-07', 'Drive Face', 'admin', 1),
(29, '2024-03-07', 'Drive Gear', 'admin', 1),
(30, '2024-03-07', 'Drive Pulley', 'admin', 1),
(31, '2024-03-07', 'Dust Seal', 'admin', 1),
(32, '2024-03-07', 'Electrical', 'admin', 1),
(33, '2024-03-07', '--Arm', 'admin', 1),
(34, '2024-03-07', 'Axle', 'admin', 1),
(35, '2024-03-07', 'Axle Cap', 'admin', 1),
(36, '2024-03-07', 'Axle Sleeve', 'admin', 1),
(37, '2024-03-07', 'Engine Parts', 'admin', 1),
(38, '2024-03-07', '--Ball Race', 'admin', 1),
(39, '2024-03-07', 'Engine Valve', 'admin', 1),
(40, '2024-03-07', 'Chain', 'admin', 1),
(41, '2024-03-07', 'Exhaust', 'admin', 1),
(42, '2024-03-07', '--Ball Race (Knuckle', 'admin', 1),
(43, '2024-03-07', 'Chain Adjuster', 'admin', 1),
(44, '2024-03-07', 'Fairing', 'admin', 1),
(45, '2024-03-07', 'Chain Guide', 'admin', 1),
(46, '2024-03-07', 'Fairings', 'admin', 1),
(47, '2024-03-07', 'Chain Lock', 'admin', 1),
(48, '2024-03-07', 'Fender', 'admin', 1),
(49, '2024-03-07', 'Chain Set', 'admin', 1),
(50, '2024-03-07', 'Flange', 'admin', 1),
(51, '2024-03-07', 'Ball Race Bearing', 'admin', 1),
(52, '2024-03-07', '--Change Gear', 'admin', 1),
(53, '2024-03-07', '--Change Pedal', 'admin', 1),
(54, '2024-03-07', 'Flange hub', 'admin', 1),
(55, '2024-03-07', '--Change Shaft', 'admin', 1),
(56, '2024-03-07', 'Flasher', 'admin', 1),
(57, '2024-03-07', '--Chassis', 'admin', 1),
(58, '2024-03-07', 'Choke Cable', 'admin', 1),
(59, '2024-03-07', 'Fly Ball', 'admin', 1),
(60, '2024-03-07', '--Cleaner', 'admin', 1),
(61, '2024-03-07', '--Clip', 'admin', 1),
(62, '2024-03-07', 'Clutch', 'admin', 1),
(63, '2024-03-07', 'Clutch Bell', 'admin', 1),
(64, '2024-03-07', 'Flywheel', 'admin', 1),
(65, '2024-03-07', 'Footrest', 'admin', 1),
(66, '2024-03-07', 'Clutch Boss', 'admin', 1),
(67, '2024-03-07', 'Fork Boots', 'admin', 1),
(68, '2024-03-07', 'Clutch Cable', 'admin', 1),
(69, '2024-03-07', 'Fork Oil', 'admin', 1),
(70, '2024-03-07', 'Clutch Center', 'admin', 1),
(71, '2024-03-07', 'Front', 'admin', 1),
(72, '2024-03-07', 'Clutch Damper', 'admin', 1),
(73, '2024-03-07', 'Front Arm', 'admin', 1),
(74, '2024-03-07', 'Clutch Disc', 'admin', 1),
(75, '2024-03-07', 'Clutch Drive', 'admin', 1),
(76, '2024-03-07', 'Front Axle', 'admin', 1),
(77, '2024-03-07', 'Clutch Housing', 'admin', 1),
(78, '2024-03-07', 'Front Body', 'admin', 1),
(79, '2024-03-07', 'Clutch kit', 'admin', 1),
(80, '2024-03-07', 'Clutch Lining', 'admin', 1),
(81, '2024-03-07', 'Clutch Parts', 'admin', 1),
(82, '2024-03-07', 'Front Fork', 'admin', 1),
(83, '2024-03-07', 'Front Front S', 'admin', 1),
(84, '2024-03-07', 'Clutch Release', 'admin', 1),
(85, '2024-03-07', '--Clutch S', 'admin', 1),
(86, '2024-03-07', 'Clutch Shoe', 'admin', 1),
(87, '2024-03-07', 'Clutch pringS', 'admin', 1),
(88, '2024-03-07', 'Clutch Steel Metal', 'admin', 1),
(89, '2024-03-07', 'Collar', 'admin', 1),
(90, '2024-03-07', '--Base', 'admin', 1),
(91, '2024-03-07', 'Compressor Parts', 'admin', 1),
(92, '2024-03-07', '--Connecting Rod', 'admin', 1),
(93, '2024-03-07', '--Coolant', 'admin', 1),
(94, '2024-03-07', 'Battery', 'admin', 1),
(95, '2024-03-07', 'Counter Shaft', 'admin', 1),
(96, '2024-03-07', '--Cover', 'admin', 1),
(97, '2024-03-07', 'Battery Solution', 'admin', 1),
(98, '2024-03-07', 'Bearing', 'admin', 1),
(99, '2024-03-07', '--Front Hub', 'admin', 1),
(100, '2024-03-07', 'BMX Assy', 'admin', 1),
(101, '2024-03-07', 'Fuel Cock', 'admin', 1),
(102, '2024-03-07', 'Bolt', 'admin', 1),
(103, '2024-03-07', 'Bracket', 'admin', 1),
(104, '2024-03-07', 'Fuel Filter', 'admin', 1),
(105, '2024-03-07', 'Fuel Hose', 'admin', 1),
(106, '2024-03-07', '--Fuse', 'admin', 1),
(107, '2024-03-07', '--Brake', 'admin', 1),
(108, '2024-03-07', 'Gasket', 'admin', 1),
(109, '2024-03-07', 'Brake Arm', 'admin', 1),
(110, '2024-03-07', '--Gasoline Oil', 'admin', 1),
(111, '2024-03-07', 'Gear', 'admin', 1),
(112, '2024-03-07', 'Brake Cable', 'admin', 1),
(113, '2024-03-07', '--Brake Cable S', 'admin', 1),
(114, '2024-03-07', 'Brake Caliper', 'admin', 1),
(115, '2024-03-07', 'Brake Cam', 'admin', 1),
(116, '2024-03-07', '--Gear Oil', 'admin', 1),
(117, '2024-03-07', '--Grease', 'admin', 1),
(118, '2024-03-07', '--Brake Fluid', 'admin', 1),
(119, '2024-03-07', 'Brake Hose', 'admin', 1),
(120, '2024-03-07', 'Brake Master', 'admin', 1),
(121, '2024-03-07', 'Brake Pad', 'admin', 1),
(122, '2024-03-07', 'Brake Pedal', 'admin', 1),
(123, '2024-03-07', '--Brake Pedal S', 'admin', 1),
(124, '2024-03-07', 'Brake Rod', 'admin', 1),
(125, '2024-03-07', '--Brake Rod S', 'admin', 1),
(126, '2024-03-07', 'Brake Shoe', 'admin', 1),
(127, '2024-03-07', '--Brake Shoe S', 'admin', 1),
(128, '2024-03-07', '--Brake Switch', 'admin', 1),
(129, '2024-03-07', 'Bulb', 'admin', 1),
(130, '2024-03-07', 'Bushing', 'admin', 1),
(131, '2024-03-07', 'Cable', 'admin', 1),
(132, '2024-03-07', '--Caliper', 'admin', 1),
(133, '2024-03-07', '--Cam', 'admin', 1),
(134, '2024-03-07', 'Cam Chain Guide', 'admin', 1),
(135, '2024-03-07', 'Cam Follower', 'admin', 1),
(136, '2024-03-07', 'Cam Lobe', 'admin', 1),
(137, '2024-03-07', 'Cam Shaft', 'admin', 1),
(138, '2024-03-07', 'Cam Shaft Head', 'admin', 1),
(139, '2024-03-07', 'Cam Shaft Pin', 'admin', 1),
(140, '2024-03-07', 'Handle Bar', 'admin', 1),
(141, '2024-03-07', 'Handle Crown', 'admin', 1),
(142, '2024-03-07', 'Handle Grip', 'admin', 1),
(143, '2024-03-07', 'Handle Lever', 'admin', 1),
(144, '2024-03-07', 'Handle Switch', 'admin', 1),
(145, '2024-03-07', 'Harness', 'admin', 1),
(146, '2024-03-07', '--Head', 'admin', 1),
(147, '2024-03-07', '--Head Cover', 'admin', 1),
(148, '2024-03-07', '--Head Cowling', 'admin', 1),
(149, '2024-03-07', 'Headlight Assy', 'admin', 1),
(150, '2024-03-07', 'Helmet', 'admin', 1),
(151, '2024-03-07', '--Hex', 'admin', 1),
(152, '2024-03-07', 'Horn', 'admin', 1),
(153, '2024-03-07', 'Hose Clip', 'admin', 1),
(154, '2024-03-07', 'Hub', 'admin', 1),
(155, '2024-03-07', 'Ignition Coil', 'admin', 1),
(156, '2024-03-07', 'Ignition Switch', 'admin', 1),
(157, '2024-03-07', 'Injection Pump', 'admin', 1),
(158, '2024-03-07', '--Inner Tube', 'admin', 1),
(159, '2024-03-07', 'Insulator', 'admin', 1),
(160, '2024-03-07', 'Intake', 'admin', 1),
(161, '2024-03-07', 'Interior Tube', 'admin', 1),
(162, '2024-03-07', '--Kick', 'admin', 1),
(163, '2024-03-07', 'Kick Gear', 'admin', 1),
(164, '2024-03-07', 'Kick Start Arm', 'admin', 1),
(165, '2024-03-07', '--Kick Starter S', 'admin', 1),
(166, '2024-03-07', 'Knuckle Bearing', 'admin', 1),
(167, '2024-03-07', '--Overhauling', 'admin', 1),
(168, '2024-03-07', 'Panel', 'admin', 1),
(169, '2024-03-07', 'Pibra', 'admin', 1),
(170, '2024-03-07', '--Pinion', 'admin', 1),
(171, '2024-03-07', 'Piston Kit', 'admin', 1),
(172, '2024-03-07', 'Piston Pin', 'admin', 1),
(173, '2024-03-07', 'Piston Ring', 'admin', 1),
(174, '2024-03-07', '--Pivot', 'admin', 1),
(175, '2024-03-07', 'Pivot Axle', 'admin', 1),
(176, '2024-03-07', 'Pressure Plate', 'admin', 1),
(177, '2024-03-07', 'Primary Clutch', 'admin', 1),
(178, '2024-03-07', '--Led', 'admin', 1),
(179, '2024-03-07', '--LED Peanut', 'admin', 1),
(180, '2024-03-07', 'Light Coil', 'admin', 1),
(181, '2024-03-07', '--Lights', 'admin', 1),
(182, '2024-03-07', 'Lubricant', 'admin', 1),
(183, '2024-03-07', 'Mag Wheel', 'admin', 1),
(184, '2024-03-07', '--Magneto', 'admin', 1),
(185, '2024-03-07', 'Magneto Kit', 'admin', 1),
(186, '2024-03-07', 'Manifold', 'admin', 1),
(187, '2024-03-07', '--Middle Body', 'admin', 1),
(188, '2024-03-07', 'Muffler', 'admin', 1),
(189, '2024-03-07', '--Muffler S', 'admin', 1),
(190, '2024-03-07', '--Multi Purpose', 'admin', 1),
(191, '2024-03-07', 'Nut', 'admin', 1),
(192, '2024-03-07', '--Nut & Screw', 'admin', 1),
(193, '2024-03-07', 'O-ring', 'admin', 1),
(194, '2024-03-07', 'Oil Cap', 'admin', 1),
(195, '2024-03-07', 'Oil Filter', 'admin', 1),
(196, '2024-03-07', 'Oil Pump', 'admin', 1),
(197, '2024-03-07', 'Oil Seal', 'admin', 1),
(198, '2024-03-07', 'Primary Coil', 'admin', 1),
(199, '2024-03-07', 'Pulley', 'admin', 1),
(200, '2024-03-07', 'Pulley Set', 'admin', 1),
(201, '2024-03-07', 'Pulser', 'admin', 1),
(202, '2024-03-07', 'Push Rod', 'admin', 1),
(203, '2024-03-07', '--Read', 'admin', 1),
(204, '2024-03-07', 'Rear Axle', 'admin', 1),
(205, '2024-03-07', 'Rear Clutch', 'admin', 1),
(206, '2024-03-07', 'Rear Hub', 'admin', 1),
(207, '2024-03-07', 'Rear Mirror', 'admin', 1),
(208, '2024-03-07', 'Rear Panel', 'admin', 1),
(209, '2024-03-07', 'Rear Set', 'admin', 1),
(210, '2024-03-07', 'Rear Sprocket', 'admin', 1),
(211, '2024-03-07', 'Recharge Coil', 'admin', 1),
(212, '2024-03-07', 'Rectifier', 'admin', 1),
(213, '2024-03-07', 'Relay', 'admin', 1),
(214, '2024-03-07', 'Repair Kit', 'admin', 1),
(215, '2024-03-07', 'Rim', 'admin', 1),
(216, '2024-03-07', 'Rivet', 'admin', 1),
(217, '2024-03-07', 'Rocket Arm', 'admin', 1),
(218, '2024-03-07', 'Rubber Damper', 'admin', 1),
(219, '2024-03-07', 'Sandpaper', 'admin', 1),
(220, '2024-03-07', 'Screw', 'admin', 1),
(221, '2024-03-07', 'Screw Knob', 'admin', 1),
(222, '2024-03-07', 'Sealant', 'admin', 1),
(223, '2024-03-07', 'Seat Assembly', 'admin', 1),
(224, '2024-03-07', 'Seat Cover', 'admin', 1),
(225, '2024-03-07', 'Secondary Clutch', 'admin', 1),
(226, '2024-03-07', 'Secondary Spring', 'admin', 1),
(227, '2024-03-07', 'Shaft Stand', 'admin', 1),
(228, '2024-03-07', 'Shock Absorber', 'admin', 1),
(229, '2024-03-07', '--Side Cover', 'admin', 1),
(230, '2024-03-07', 'Side Mirror', 'admin', 1),
(231, '2024-03-07', 'Side Stand', 'admin', 1),
(232, '2024-03-07', '--Side Stand S', 'admin', 1),
(233, '2024-03-07', '--Side Wheel', 'admin', 1),
(234, '2024-03-07', 'Signal Light', 'admin', 1),
(235, '2024-03-07', '--Socket', 'admin', 1),
(236, '2024-03-07', 'Spark Plug', 'admin', 1),
(237, '2024-03-07', 'Spark Plug', 'admin', 1),
(238, '2024-03-07', '--Sparkplug Cap', 'admin', 1),
(239, '2024-03-07', '--Sparkplug Cord', 'admin', 1),
(240, '2024-03-07', 'Speedometer Cable', 'admin', 1),
(241, '2024-03-07', 'Speedometer Gauge', 'admin', 1),
(242, '2024-03-07', 'Speedometer Gear', 'admin', 1),
(243, '2024-03-07', 'Spokes', 'admin', 1),
(244, '2024-03-07', 'Spray Paint', 'admin', 1),
(245, '2024-03-07', 'Spring', 'admin', 1),
(246, '2024-03-07', '--Sprocket', 'admin', 1),
(247, '2024-03-07', 'Sprocket Bolt', 'admin', 1),
(248, '2024-03-07', 'Sprocket Front', 'admin', 1),
(249, '2024-03-07', '--Starter', 'admin', 1),
(250, '2024-03-07', 'Starter Clutch Hub', 'admin', 1),
(251, '2024-03-07', 'Starter Kit', 'admin', 1),
(252, '2024-03-07', 'Starter Motor', 'admin', 1),
(253, '2024-03-07', 'Stator Assembly', 'admin', 1),
(254, '2024-03-07', 'Steering Post', 'admin', 1),
(255, '2024-03-07', 'Sticker', 'admin', 1),
(256, '2024-03-07', '--Swing Arm', 'admin', 1),
(257, '2024-03-07', '--Switch', 'admin', 1),
(258, '2024-03-07', '--Tail Light', 'admin', 1),
(259, '2024-03-07', 'Tail Light Assembly', 'admin', 1),
(260, '2024-03-07', 'Tail Light Cover', 'admin', 1),
(261, '2024-03-07', 'Tank Cap', 'admin', 1),
(262, '2024-03-07', 'Tensioner', 'admin', 1),
(263, '2024-03-07', '--Terminal', 'admin', 1),
(264, '2024-03-07', 'Throttle Cable', 'admin', 1),
(265, '2024-03-07', 'Throttle Pipe', 'admin', 1),
(266, '2024-03-07', '--Timing Chain', 'admin', 1),
(267, '2024-03-07', 'Timing Gear', 'admin', 1),
(268, '2024-03-07', 'Tire', 'admin', 1),
(269, '2024-03-07', 'Tire Valve', 'admin', 1),
(270, '2024-03-07', 'Tools', 'admin', 1),
(271, '2024-03-07', '--Top Overhauling', 'admin', 1),
(272, '2024-03-07', 'Transmission', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `permission_name` varchar(255) NOT NULL,
  `position_name` varchar(20) NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(20) NOT NULL,
  `logo_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `publish_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `logo_name`, `status`, `publish_by`) VALUES
(1, 'logo.png', 'active', '');

-- --------------------------------------------------------

--
-- Table structure for table `logo_text`
--

CREATE TABLE `logo_text` (
  `id` int(20) NOT NULL,
  `logo_text` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `publish_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logo_text`
--

INSERT INTO `logo_text` (`id`, `logo_text`, `status`, `publish_by`) VALUES
(1, 'Danielle Motor Parts', 'active', '');

-- --------------------------------------------------------

--
-- Table structure for table `material_transfer`
--

CREATE TABLE `material_transfer` (
  `id` int(11) NOT NULL,
  `material_invoice` varchar(10) NOT NULL,
  `material_date` date NOT NULL,
  `material_cashier` varchar(255) NOT NULL,
  `material_recieved_by` varchar(255) NOT NULL,
  `material_inspected_by` varchar(255) NOT NULL,
  `material_verified_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `material_transfer`
--

INSERT INTO `material_transfer` (`id`, `material_invoice`, `material_date`, `material_cashier`, `material_recieved_by`, `material_inspected_by`, `material_verified_by`) VALUES
(1, '', '2024-03-12', 'Alex Dummy', 'Fyke Dummy', 'Joemari Dummy', 'Louis Dummy'),
(2, '', '2024-03-09', 'John lang', 'Arnold Swachenegger', 'Ronald mcdonalds', 'Jabilee bida angsaya');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `model_name` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `date_added`, `model_name`, `status`) VALUES
(1, '2024-03-07', 'MIO 115', 1),
(2, '2024-03-07', 'MIO ', 1),
(3, '2024-03-07', 'SNIPER 150', 1),
(4, '2024-03-07', 'C-100', 1),
(5, '2024-03-07', 'SMASH', 1),
(6, '2024-03-07', 'CT100', 1),
(7, '2024-03-07', 'RAIDER 150', 1),
(8, '2024-03-07', 'ADX/200', 1),
(9, '2024-03-07', 'GP 125', 1),
(10, '2024-03-07', 'HONDA DASH 110', 1),
(11, '2024-03-07', 'AEROX155', 1),
(12, '2024-03-07', 'NMAX V2', 1),
(13, '2024-03-07', 'AEROX', 1),
(14, '2024-03-07', 'BEAT FI', 1),
(15, '2024-03-07', 'BEAT FI  2016(K81)', 1),
(16, '2024-03-07', 'RS150', 1),
(17, '2024-03-07', 'TMX', 1),
(18, '2024-03-07', 'CB125', 1),
(19, '2024-03-07', 'SKYDRIVE', 1),
(20, '2024-03-07', 'YTX125', 1),
(21, '2024-03-07', 'MIO SPORTY', 1),
(22, '2024-03-07', 'MIO SOULTY', 1),
(23, '2024-03-07', 'MIO SOUL', 1),
(24, '2024-03-07', 'NINJA 250', 1),
(25, '2024-03-07', 'CFMOTO', 1),
(26, '2024-03-07', 'MIO 100', 1),
(27, '2024-03-07', 'BEAT FI 2016', 1),
(28, '2024-03-07', 'CLICK 125', 1),
(29, '2024-03-07', 'HONDA WAVE 110', 1),
(30, '2024-03-07', 'EURO150', 1),
(31, '2024-03-07', 'XRM', 1),
(32, '2024-03-07', 'XRM-S', 1),
(33, '2024-03-07', 'NINJA 250 FI', 1),
(34, '2024-03-07', 'MOTORSTAR CR150', 1),
(35, '2024-03-08', 'MIO i 125', 1),
(36, '2024-03-08', 'MIO SOUL i 125', 1),
(37, '2024-03-08', 'CLICK 125i', 1),
(38, '2024-03-08', 'CLICK 150i', 1),
(39, '2024-03-08', 'NMAX 155', 1),
(40, '2024-03-09', 'Click i125(V2)', 1),
(41, '2024-03-12', 'VESPA 125', 1),
(42, '2024-03-12', 'VESPA 150', 1),
(43, '2024-03-12', 'VESPA300', 1),
(44, '2024-03-12', 'KRV180', 1),
(45, '2024-03-12', 'NMAX', 1),
(46, '2024-03-12', 'PCX150', 1),
(47, '2024-03-12', 'PCX160', 1),
(48, '2024-03-12', 'BEAT CARB', 1),
(49, '2024-03-12', 'MIO 110', 1),
(50, '2024-03-12', 'MIO 125', 1),
(51, '2024-03-12', 'MIO FAZZIO 125', 1),
(52, '2024-03-12', 'CLICK 160', 1),
(53, '2024-03-12', 'CLICK 150', 1),
(54, '2024-03-12', 'ADV 150', 1),
(55, '2024-03-12', 'KYMCO LIKE G5', 1),
(56, '2024-03-12', 'BEAT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL,
  `gross` int(11) NOT NULL,
  `delivery_fee` int(11) DEFAULT NULL,
  `vat` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `net` int(11) NOT NULL,
  `transaction_type_id` int(11) NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `paid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_terms`
--

CREATE TABLE `payment_terms` (
  `id` int(11) NOT NULL,
  `terms_name` varchar(20) NOT NULL,
  `publish_date` date NOT NULL DEFAULT current_timestamp(),
  `publish_by_id` int(7) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `id` int(11) NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `payment_mode` varchar(20) NOT NULL,
  `payment_img` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `supplier_code` varchar(255) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `models` varchar(255) DEFAULT NULL,
  `unit_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `code`, `supplier_code`, `barcode`, `image`, `models`, `unit_id`, `brand_id`, `category_id`, `active`) VALUES
(1, 'CVT Pulley Set Assembly', 'CVT-PSA', 'HCS-402-10', '', 'products/CVT-Pulley-Set-Assembly.png', 'VESPA 125', 11, 57, 200, 1),
(2, 'CVT Pulley Set', 'PS-01', 'HCS-402-8', '', 'products/CVT-Pulley-Set.jpg', 'VESPA 150', 11, 57, 200, 1),
(3, 'CVT Pulley Set', 'PS-02', 'HCS-402-9', '', 'products/CVT-Pulley-Set.jpg', 'VESPA300', 11, 57, 200, 1),
(4, 'CVT Pulley Set', 'PS-03', 'HCS-402-11', '', 'products/CVT-Pulley-Set.jpg', 'KRV180', 11, 57, 200, 1),
(5, 'Pulley Set', 'PS-04', 'HPS-803', '', 'products/Pulley-Set.jpg', 'AEROX, BEAT FI, CLICK 125, NMAX, PCX150, PCX160, BEAT CARB, MIO 110, MIO 125, MIO FAZZIO 125, CLICK 160, CLICK 150, ADV 150, KYMCO LIKE G5', 11, 57, 200, 1),
(6, 'Back Plate', 'BP-01', 'HBP-161-1', '', 'products/Back-Plate.jpg', 'AEROX, NMAX', 10, 57, 25, 1),
(7, 'Back Plate', 'BP-02', 'HBP-161-2', '', 'products/Back-Plate.jpg', 'MIO 125', 10, 57, 25, 1),
(8, 'Back Plate', 'BP-03', 'HBP-161-3', '', 'products/Back-Plate.jpg', 'PCX160', 10, 57, 25, 1),
(9, 'Back Plate', 'BP-04', 'HBP-161-4', '', 'products/Back-Plate.jpg', 'PCX150', 10, 57, 25, 1),
(10, 'Back Plate', 'BP-05', 'HBP-161-5', '', 'products/Back-Plate.jpg', 'CLICK 125, CLICK 150', 10, 57, 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rack`
--

CREATE TABLE `rack` (
  `id` int(11) NOT NULL,
  `rack_admin_id` int(11) NOT NULL,
  `rack_date` date NOT NULL,
  `rack_name` varchar(50) NOT NULL,
  `rack_description` varchar(50) NOT NULL,
  `rack_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `replacement`
--

CREATE TABLE `replacement` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restock`
--

CREATE TABLE `restock` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `restock_no` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_net` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shelf`
--

CREATE TABLE `shelf` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `shelf_rack_id` int(11) NOT NULL,
  `shelf_admin_id` int(11) NOT NULL,
  `shelf_name` varchar(50) NOT NULL,
  `shelf_description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `supplier_fname` varchar(20) NOT NULL,
  `supplier_lname` varchar(20) NOT NULL,
  `supplier_email` varchar(50) NOT NULL,
  `supplier_address_id` int(11) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_product`
--

CREATE TABLE `supplier_product` (
  `id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `product_code` varchar(20) NOT NULL,
  `size` varchar(10) NOT NULL,
  `brand_id` int(7) NOT NULL,
  `categpry_id` int(7) NOT NULL,
  `model_id` int(7) NOT NULL,
  `expiration` date NOT NULL,
  `quantity` int(7) NOT NULL,
  `store_price` double NOT NULL,
  `rack_id` int(7) NOT NULL,
  `status` tinytext NOT NULL,
  `description` varchar(255) NOT NULL,
  `supplier_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_type`
--

CREATE TABLE `transaction_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`, `active`) VALUES
(1, 11, 1),
(2, 12, 1),
(3, 16, 1),
(4, 15, 1),
(5, 18, 1),
(6, 19, 1),
(7, 20, 1),
(8, 14, 1),
(9, 17, 1),
(10, 0, 1),
(11, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `position` tinyint(1) NOT NULL DEFAULT 9 COMMENT 'admin = 1\r\ncashier = 2\r\nstockman = 3\r\n',
  `sex` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_position`
--

CREATE TABLE `user_position` (
  `id` int(11) NOT NULL,
  `position_name` varchar(20) NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ware_location`
--

CREATE TABLE `ware_location` (
  `id` int(11) NOT NULL,
  `location_name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `publish_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_data`
--
ALTER TABLE `attribute_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `material_transfer`
--
ALTER TABLE `material_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_terms`
--
ALTER TABLE `payment_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rack`
--
ALTER TABLE `rack`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rack_admin_id` (`rack_admin_id`);

--
-- Indexes for table `replacement`
--
ALTER TABLE `replacement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restock`
--
ALTER TABLE `restock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shelf`
--
ALTER TABLE `shelf`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rack_id` (`shelf_rack_id`),
  ADD UNIQUE KEY `admin_id` (`shelf_admin_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_product`
--
ALTER TABLE `supplier_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_type`
--
ALTER TABLE `transaction_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `address_id` (`address_id`),
  ADD KEY `address_id_2` (`address_id`);

--
-- Indexes for table `user_position`
--
ALTER TABLE `user_position`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attribute_data`
--
ALTER TABLE `attribute_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material_transfer`
--
ALTER TABLE `material_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_terms`
--
ALTER TABLE `payment_terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rack`
--
ALTER TABLE `rack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `replacement`
--
ALTER TABLE `replacement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restock`
--
ALTER TABLE `restock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shelf`
--
ALTER TABLE `shelf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_product`
--
ALTER TABLE `supplier_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_type`
--
ALTER TABLE `transaction_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_position`
--
ALTER TABLE `user_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`address_id`) ON UPDATE CASCADE;

--
-- Constraints for table `shelf`
--
ALTER TABLE `shelf`
  ADD CONSTRAINT `shelf_ibfk_1` FOREIGN KEY (`shelf_admin_id`) REFERENCES `admin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
