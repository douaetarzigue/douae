-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 12:33 AM
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
-- Database: `shopee`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`) VALUES
(4, 1, 9),
(5, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_oldprice` double(10,2) DEFAULT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_oldprice`, `item_image`, `item_register`) VALUES
(1, 'MSI ', 'PC PORTABLE GAMER MSI KATANA ', 15499.00, 20000.00, './assets/products/1.png', '2023-06-03 11:08:57'),
(2, ' Lenovo', 'Lenovo yoga', 8590.00, 8700.00, './assets/products/2.png', '2023-06-03 11:08:57'),
(3, 'ASUS', 'PC PORTABLE ASUS', 3149.00, 3500.00, './assets/products/3.png', '2023-06-03 11:08:57'),
(4, 'VICTUS', 'VICTUS GAMING LAPTOP', 8750.00, 8950.00, './assets/products/4.png', '2023-06-03 11:08:57'),
(5, 'ASUS', 'Zenbook Pro 14 Duo OLED ', 19990.00, 20000.00, './assets/products/5.png', '2023-06-03 11:08:57'),
(6, 'Apple', 'MacBook Pro', 5681.00, 6000.00, './assets/products/6.png', '2023-06-03 11:08:57'),
(7, 'HP', 'HP ProBook', 6850.00, 7500.00, './assets/products/7.png', '2023-06-03 11:08:57'),
(8, 'HP', 'HP OMEN Gaming Lapto', 19410.00, 19945.00, './assets/products/8.png', '2023-06-03 11:08:57'),
(9, 'ASUS', 'ASUS Vivobook', 4850.00, 5100.00, './assets/products/9.png', '2023-06-03 11:08:57'),
(10, 'HP', 'HP Pavilion', 5799.00, 5999.00, './assets/products/10.png', '2023-06-03 11:08:57'),
(11, 'Apple', 'MacBook Pro 14-inch', 6840.00, 6985.00, './assets/products/11.png', '2023-06-03 11:08:57'),
(12, 'ASUS', 'ASUS Q524', 3590.00, 4000.00, './assets/products/12.png', '2023-06-03 11:08:57'),
(13, 'Acer', 'Acer Aspire', 9500.00, 10000.00, './assets/products/13.png', '2023-06-03 11:08:57'),
(14, 'ASUS', 'ASUS Zenbook 15 UX534', 16990.00, 17000.00, './assets/products/14.png', '2023-06-03 11:08:57'),
(15, 'Dell', 'Dell Vostro', 3890.00, 4000.00, './assets/products/15.png', '2023-06-03 11:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL DEFAULT 'user',
  `last_name` varchar(100) NOT NULL DEFAULT 'user',
  `register_date` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `register_date`, `password`, `username`) VALUES
(1, 'douae', 'tarzigue', '2023-06-03 11:08:57', 'douae', 'douae'),
(5, 'user', 'user', NULL, '123', 'guest'),
(6, 'user', 'user', NULL, 'doaa', 'doaa');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
