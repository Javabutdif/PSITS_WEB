-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 02:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psits`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_number` int(11) NOT NULL,
  `password` varchar(150) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_number`, `password`, `name`, `role`) VALUES
(1, '$2y$10$4w1Vm.IpI3.nRF4XajlA2uN/B5/h3.YC6As1JBtvuWL9K8E.Y6PgW', 'dawd', ''),
(19835644, '$2y$10$7p2NwxVsmBz7dI.e0hEa3.QdzXfhINYQER6QWCDrKTfBFNihY5Heq', 'Anton James J. Genabio', 'Developer');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `name`, `type`, `filepath`, `product_id`) VALUES
(25, '1343193.jpeg', 'image/jpeg', '6640b6d67a886_1343193.jpeg', 182868),
(26, '1343193.jpeg', 'image/jpeg', '../assets/uploads/6640b8466f32a_1343193.jpeg', 762027),
(27, '3XxrYe.jpg', 'image/jpeg', '../assets/uploads/6640ba6967631_3XxrYe.jpg', 881518);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `rfid` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `size` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `rfid`, `name`, `size`, `quantity`, `price`, `total`, `product_id`, `status`) VALUES
(17, '198356', 'Mr Bean', 'None', 1, 12, 12, 468725, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(11) NOT NULL,
  `id_number` int(11) NOT NULL,
  `order_name` varchar(90) NOT NULL,
  `size` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `money` double NOT NULL,
  `changeCoins` double NOT NULL,
  `profit` double NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `product_price` double NOT NULL,
  `product_stocks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_type`, `product_price`, `product_stocks`) VALUES
(123, 'Hutao', 'Human', 12, 2),
(182868, 'Hutao', 'Human', 12, 2),
(762027, 'Hutao', 'Human', 12, 2),
(881518, 'Dog', 'Dog', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `renewal`
--

CREATE TABLE `renewal` (
  `renewal_id` int(11) NOT NULL,
  `id_number` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `renewal_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `renewal`
--

INSERT INTO `renewal` (`renewal_id`, `id_number`, `status`, `admin_name`, `renewal_date`) VALUES
(24, 19835641, 'Paid', 'Anton James J. Genabio', '2024-05-11'),
(25, 19835641, 'Deactivate', 'None', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id_number` int(10) NOT NULL,
  `rfid` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `course` varchar(5) NOT NULL,
  `year` int(11) NOT NULL,
  `password` varchar(150) NOT NULL,
  `status` varchar(5) NOT NULL,
  `membership` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id_number`, `rfid`, `first_name`, `middle_name`, `last_name`, `email`, `course`, `year`, `password`, `status`, `membership`) VALUES
(19835641, '123123', 'Cat', 'B', 'Bread', 'catbread@gmail.com', 'BSIT', 3, '$2y$10$5L5y2ia8p/yPyAGDAmptnOkQlGCsHYNbsrh.R1fItuq.x2yj/Jara', 'TRUE', 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `sub_report`
--

CREATE TABLE `sub_report` (
  `sub_id` int(11) NOT NULL,
  `id_number` varchar(20) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_report`
--

INSERT INTO `sub_report` (`sub_id`, `id_number`, `admin_name`, `date`, `time`) VALUES
(20, '19835641', 'Anton James J. Genabio', 'May-11-2024', '02:05:14pm'),
(21, '19835644', 'Anton James J. Genabio', 'May-11-2024', '03:05:48pm'),
(22, '198356', 'Anton James J. Genabio', 'May-11-2024', '03:05:23pm'),
(23, '[object HTMLInputEle', 'Anton James J. Genabio', 'May-11-2024', '04:05:54pm'),
(24, '[object HTMLInputEle', 'Anton James J. Genabio', 'May-11-2024', '04:05:37pm'),
(25, '198356449', 'Anton James J. Genabio', 'May-11-2024', '04:05:33pm'),
(26, '19835641', 'Anton James J. Genabio', 'May-11-2024', '04:05:59pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_number`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Delete` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `renewal`
--
ALTER TABLE `renewal`
  ADD PRIMARY KEY (`renewal_id`),
  ADD KEY `renewal_ibfk_1` (`id_number`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_number`);

--
-- Indexes for table `sub_report`
--
ALTER TABLE `sub_report`
  ADD PRIMARY KEY (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `renewal`
--
ALTER TABLE `renewal`
  MODIFY `renewal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sub_report`
--
ALTER TABLE `sub_report`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `Delete` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `renewal`
--
ALTER TABLE `renewal`
  ADD CONSTRAINT `renewal_ibfk_1` FOREIGN KEY (`id_number`) REFERENCES `students` (`id_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
