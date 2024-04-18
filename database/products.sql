-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 10:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jontrodokan`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price_type` varchar(255) DEFAULT NULL,
  `Description` varchar(1000) DEFAULT NULL,
  `Time_stamp` int(30) DEFAULT NULL,
  `Category` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `price_type`, `Description`, `Time_stamp`, `Category`, `user_id`) VALUES
(16, 'Arduino nano', '445', 'product22.png', 'Fixed price', 'sdfgfsdgdffsffb fdsgfs fsgfs ', 1682224147, 'Micro processor/Micro controler', NULL),
(18, 'Arduino uno', '890', 'product27.png', 'Negotiable', 'fdgsgfssf\r\nsgfgsgf  sdfgsfs\r\nsfsgfs fsgfsbvf gsfgserfr', 1682233802, 'Micro processor/Micro controler', NULL),
(19, 'Arduino mega', '2010', 'f1.png', 'Fixed price', 'afsfsgfs\r\nfgsgfs\r\nfsfgfffffff  fsgfs\r\nsfgsf sfgfsr', 1682233867, 'Micro processor/Micro controler', NULL),
(21, 'Ultrasonic sensor', '150', 'sensor.png', 'Fixed price', 'fgfgffgd rtrgffd\r\ntergf fdgdg fggf fgfd\r\nfgghf', 1682249266, 'Sensor', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
