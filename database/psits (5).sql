-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2024 at 01:56 AM
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
  `Position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_number`, `password`, `name`, `Position`) VALUES
(19835641, '$2y$10$4XaoX5F8aho1xLXWrnWGE.PFq7pHv3gY0IJokFE9/Ru2HMDxMCee.', 'Marlou Tadlip', 'Secretary'),
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
(27, '3XxrYe.jpg', 'image/jpeg', '../assets/uploads/6640ba6967631_3XxrYe.jpg', 881518),
(32, 'PH_001_1946x.webp', 'image/webp', '../assets/uploads/66511d7d34a26_PH_001_1946x.webp', 243472),
(33, 'rose.jpg', 'image/jpeg', '../assets/uploads/6651244fee178_rose.jpg', 322647),
(34, '474488283.jpg', 'image/jpeg', '../assets/uploads/665124ede4e27_474488283.jpg', 203344);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `log_name` varchar(100) NOT NULL,
  `log_details` varchar(255) NOT NULL,
  `log_date` varchar(20) NOT NULL,
  `log_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `log_name`, `log_details`, `log_date`, `log_time`) VALUES
(1, 'Marlou Tadlip', 'Secretary Login!', '0000-00-00', '00:00:07'),
(2, 'Marlou Tadlip', 'Secretary Login!', '05-25-2024', '07-28-21'),
(3, 'Marlou Tadlip', 'Secretary Login!', '05-25-2024', '07-35-19'),
(4, '', 'Added a Merchandise! Product ID:322647', '05-25-2024', '07-35-44'),
(5, 'Marlou Tadlip', 'Logged Out!', '05-25-2024', '07-37-47'),
(6, 'Marlou Tadlip', 'Secretary Login!', '05-25-2024', '07-37-58'),
(7, 'Marlou Tadlip', 'Added a Merchandise! Product ID:203344', '05-25-2024', '07-38-22'),
(8, 'Marlou Tadlip', 'Edited Student 2', '05-25-2024', '07-45-54'),
(9, 'Marlou Tadlip', 'Logged Out!', '05-25-2024', '07-54-15'),
(10, 'Anton James J. Genabio', 'Developer Login!', '05-25-2024', '07-54-17');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `id_number` int(11) NOT NULL,
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

INSERT INTO `orders` (`order_id`, `id_number`, `rfid`, `name`, `size`, `quantity`, `price`, `total`, `product_id`, `status`) VALUES
(28, 19835641, '09021930', 'Hutao', 'None', 1, 12, 12, 762027, 'Paid'),
(29, 19835642, '0772875089', 'Red Horse Rice', 'None', 1, 50, 50, 927970, 'Paid');

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

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `id_number`, `order_name`, `size`, `quantity`, `money`, `changeCoins`, `profit`, `admin_name`, `date`) VALUES
(5, 0, 'Happy Dog', 'None', 2, 5, 1, 4, 'Anton James J. Genabio', '2024-05-19'),
(6, 19835642, 'Red Horse Rice', 'None', 1, 100, 50, 50, 'Anton James J. Genabio', '2024-05-19');

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
(203344, 'PSITS Building', 'Building', 12000, 1),
(243472, 'Psits Flowers', 'Flower', 120, 2),
(322647, 'PSITS Rose', 'Rose', 120, 6),
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
(25, 19835641, 'Activate', 'None', 'None'),
(26, 19835642, 'Deactivate', 'None', 'None'),
(27, 21, 'Deactivate', 'None', 'None'),
(28, 232, 'Deactivate', 'None', 'None'),
(29, 2, 'Deactivate', 'None', 'None'),
(30, 19835649, 'Deactivate', 'None', 'None');

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
(2, '123', 'sultana', 's', 'kudarat', 'sultankudarat83@gmail.com', 'BSIT', 1, '$2y$10$XkxlHMDcySbtMA7fuv4TtOqyvfOzQrrQzgoSOCr16/URIbN8Wo2Bu', 'TRUE', 'Approve'),
(21, '12345', 'awdawddawd', 'dwad', 'ddawd', 'DAWDWD@GMAIL.com', 'BSIT', 4, '$2y$10$oEI28qD1AlJNy6HYrh4aI.tp0igvG3dQZlAkJltLaqFZbxKru86Vi', 'TRUE', 'Approve'),
(232, '1234', 's', 's', 's', 'sultankudarat83@gmail.com', 'BSIT', 2, '$2y$10$Bruui/V2oKuZg44Dm2RwFupbdHQ27tDG1FKi6yrc0hsOEpPCu4moa', 'TRUE', 'Approve'),
(19835641, '123123', 'Cat', 'B', 'Bread', 'catbread@gmail.com', 'BSIT', 3, '$2y$10$5L5y2ia8p/yPyAGDAmptnOkQlGCsHYNbsrh.R1fItuq.x2yj/Jara', 'TRUE', 'Approve'),
(19835642, '0772875089', 'Anton James', 'Jala', 'Genabio', 'jamesgenabio90@gmail.com', 'BSIT', 3, '$2y$10$kqiMQ7PdCsmBj.Lf7fJ0iutxpU8CIHm135BpB1/efpqXc2STfmZI.', 'TRUE', 'Approve'),
(19835649, '', 'Jims', 'Jims', 'Jims', 'jims@gmail.com', 'BSIT', 4, '$2y$10$Scqlr6xitmk18Mzeqrk8tOqQKLSDWQ8cejA5T9mqLOaDGX.Qgrrw.', 'TRUE', 'Approve');

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
(26, '19835641', 'Anton James J. Genabio', 'May-11-2024', '04:05:59pm'),
(27, '19835642', 'Anton James J. Genabio', 'May-12-2024', '10:05:08pm'),
(28, '21', 'Anton James J. Genabio', 'May-14-2024', '11:05:47am'),
(29, '2', 'Anton James J. Genabio', 'May-19-2024', '09:05:07pm'),
(30, '232', 'Anton James J. Genabio', 'May-19-2024', '09:05:14pm'),
(31, '19835649', 'Marlou Tadlip', 'May-25-2024', '07:05:00am');

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
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `id_number` (`id_number`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `renewal`
--
ALTER TABLE `renewal`
  MODIFY `renewal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sub_report`
--
ALTER TABLE `sub_report`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `Delete` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_number`) REFERENCES `students` (`id_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `renewal`
--
ALTER TABLE `renewal`
  ADD CONSTRAINT `renewal_ibfk_1` FOREIGN KEY (`id_number`) REFERENCES `students` (`id_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
