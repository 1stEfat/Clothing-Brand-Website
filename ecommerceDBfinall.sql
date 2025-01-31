-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2025 at 07:50 AM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `quantity_stock` int(11) DEFAULT NULL,
  `size` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_price`, `quantity_stock`, `size`) VALUES
(1, 'Redhell Crewneck', 1000.00, 2, 'S'),
(2, 'Redhell Crewneck', 1000.00, 2, 'M'),
(3, 'Redhell Crewneck', 1000.00, 4, 'L'),
(4, 'Redhell Crewneck', 1000.00, 0, 'XL'),
(5, 'Innerdemons Hoodie', 950.00, 10, 'S'),
(6, 'Innerdemons Hoodie', 950.00, 8, 'M'),
(7, 'Innerdemons Hoodie', 950.00, 7, 'L'),
(8, 'Innerdemons Hoodie', 950.00, 7, 'XL'),
(9, 'Smookers T', 650.00, 8, 'S'),
(10, 'Smookers T', 650.00, 8, 'M'),
(11, 'Smookers T', 650.00, 8, 'L'),
(12, 'Smookers T', 650.00, 7, 'XL'),
(13, 'Multiple Faces Hoodie', 1100.00, 10, 'S'),
(14, 'Multiple Faces Hoodie', 1100.00, 9, 'M'),
(15, 'Multiple Faces Hoodie', 1100.00, 8, 'L'),
(16, 'Multiple Faces Hoodie', 1100.00, 7, 'XL'),
(17, 'Multiple Faces T', 500.00, 10, 'S'),
(18, 'Multiple Faces T', 500.00, 9, 'M'),
(19, 'Multiple Faces T', 500.00, 8, 'L'),
(20, 'Multiple Faces T', 500.00, 7, 'XL'),
(21, 'Washed Black T', 550.00, 10, 'S'),
(22, 'Washed Black T', 550.00, 9, 'M'),
(23, 'Washed Black T', 550.00, 8, 'L'),
(24, 'Washed Black T', 550.00, 7, 'XL'),
(25, 'Smokinkills Hoodie', 1500.00, 10, 'S'),
(26, 'Smokinkills Hoodie', 1500.00, 9, 'M'),
(27, 'Smokinkills Hoodie', 1500.00, 8, 'L'),
(28, 'Smokinkills Hoodie', 1500.00, 7, 'XL'),
(29, 'Prohibited Touches Hoodie', 1200.00, 10, 'S'),
(30, 'Prohibited Touches Hoodie', 1200.00, 9, 'M'),
(31, 'Prohibited Touches Hoodie', 1200.00, 8, 'L'),
(32, 'Prohibited Touches Hoodie', 1200.00, 7, 'XL'),
(33, 'FightClub Hoodie', 1000.00, 10, 'S'),
(34, 'FightClub Hoodie', 1000.00, 9, 'M'),
(35, 'FightClub Hoodie', 1000.00, 8, 'L'),
(36, 'FightClub Hoodie', 1000.00, 7, 'XL'),
(37, 'Touchhes Crewneck', 800.00, 10, 'S'),
(38, 'Touchhes Crewneck', 800.00, 9, 'M'),
(39, 'Touchhes Crewneck', 800.00, 8, 'L'),
(40, 'Touchhes Crewneck', 800.00, 7, 'XL'),
(41, 'LostInTheDesert T', 700.00, 10, 'S'),
(42, 'LostInTheDesert T', 700.00, 9, 'M'),
(43, 'LostInTheDesert T', 700.00, 8, 'L'),
(44, 'LostInTheDesert T', 700.00, 7, 'XL'),
(45, 'DancingSkulls T', 700.00, 10, 'S'),
(46, 'DancingSkulls T', 700.00, 9, 'M'),
(47, 'DancingSkulls T', 700.00, 8, 'L'),
(48, 'DancingSkulls T', 700.00, 7, 'XL'),
(49, 'Whogivesash!t T', 700.00, 10, 'S'),
(50, 'Whogivesash!t T', 700.00, 9, 'M'),
(51, 'Whogivesash!t T', 700.00, 8, 'L'),
(52, 'Whogivesash!t T', 700.00, 7, 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `order_address` varchar(100) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `order_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `order_date`, `order_address`, `payment_method`, `order_price`) VALUES
(71, 14, '2025-01-01 08:33:19', 'zzzzzzzzzzzzzz', 'cash-on-delivery', 1000.00),
(72, 14, '2025-01-01 08:33:59', 'zzzzzz', 'credit-card', 1000.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_id`, `item_id`, `quantity`) VALUES
(71, 2, 1),
(72, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payed_amount` decimal(10,2) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `order_id`, `payment_method`, `payed_amount`, `payment_date`) VALUES
(30, 71, 'cash-on-delivery', 1000.00, '2025-01-01 06:33:19'),
(31, 72, 'credit-card', 1000.00, '2025-01-01 06:33:59');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_date` datetime DEFAULT current_timestamp(),
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `user_email`, `user_date`, `user_password`) VALUES
(3, 'efat', 'efat@gmail.com', '2024-12-04 00:08:36', '202cb962ac59075b964b07152d234b70'),
(4, 'aaa', 'aaaaa@gmail.com', '2024-12-04 00:11:20', '202cb962ac59075b964b07152d234b70'),
(5, 'ali', 'ahmed@gmail.com', '2024-12-04 00:29:47', '$2y$10$5.bVt2g7O2U21S.Lcogtd.eeHw0tmLpxP1NOrVgkfGvYd.yK1fC8u'),
(6, 'zizoo', 'ziz@gmail.com', '2024-12-04 00:47:23', '$2y$10$Z5rnDoxLNJHsUjn4gh7jseS/4tcyNNpz4yZCsHUpruq6mAbGz4ZKK'),
(8, '7amo@gmail.com', '7amo@gmail.com', '2024-12-04 15:14:35', '$2y$10$TGGQ/3oQXM/0Ou/5PJN9KOejWY24Lcdn1f33NTSvYuGDItoa5mEqC'),
(9, 'ali', 'mmm@gmail.com', '2024-12-04 15:58:53', '$2y$10$vVFsz0gIffwdB0j8qHshXu5tXt2WFNAqvPCz1ex71kDxttUkUmsfW'),
(10, 'hussein', 'h@gmail.com', '2024-12-26 06:40:07', '$2y$10$GUXy2cdUktWSAbrAcSWfv.iENWY98DQghfVrLYUORJWn.VtIV5UVe'),
(11, 'allison', 'allison@gmail.com', '2024-12-26 13:42:07', '$2y$10$1rcHy3kNUjJ/XRONnzGmS.XAy3Y4t6ygn3cZvLN1hhGuY.GzVDkv2'),
(12, 'shat', 'shat@gmail.com', '2024-12-29 22:56:43', '$2y$10$OOAEn5EiSsMOKS3hWKuW0OJuOw7zX8By/d.gOF1vrGUNAgmqSqFaa'),
(14, 'youssef', 'yossefefat64@gmail.com', '2025-01-01 08:32:02', '$2y$10$6aTJkuUGPNY.P9XyuHL6eOOAtJiMsn4lQ.EvT7n1jOiX9OsRGkYmS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `FK_payment_order` (`order_id`);

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
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `FK_payment_order` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
