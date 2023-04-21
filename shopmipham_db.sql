-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2019 at 05:55 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopmipham_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `role_id` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avata` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_ad` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `role_id`, `name`, `email`, `phone`, `address`, `password`, `avata`, `status`, `created_at`, `updated_ad`) VALUES
(11, NULL, 'admin', 'admin@gmail.com', 4364564, ' gdfgdfgdf', '25d55ad283aa400af464c76d713c07ad', '2124065125_hoc_sinh_suy_nghi.png', 1, '2017-10-20 02:57:16', '2017-10-19 19:57:16');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` tinyint(4) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `sort_order`, `created_at`) VALUES
(46, 0, 'CHĂM SÓC DA', 1, '0000-00-00 00:00:00'),
(47, 46, 'Kem dưỡng da', 1, '0000-00-00 00:00:00'),
(48, 46, ' Chăm sóc da chuyên biệt ', 2, '0000-00-00 00:00:00'),
(49, 46, ' Sữa rửa mặt ', 3, '0000-00-00 00:00:00'),
(50, 46, ' Nước hoa hồng ', 4, '0000-00-00 00:00:00'),
(51, 46, ' Mặt nạ và tẩy tế bào chết ', 5, '0000-00-00 00:00:00'),
(53, 46, 'Dưỡng môi ', 6, '0000-00-00 00:00:00'),
(54, 0, 'TRANG ĐIỂM', 2, '0000-00-00 00:00:00'),
(55, 54, 'Kem nền', 1, '0000-00-00 00:00:00'),
(56, 54, ' Phấn phủ ', 2, '0000-00-00 00:00:00'),
(57, 54, ' Mascara, kẻ mắt môi ', 3, '0000-00-00 00:00:00'),
(58, 0, 'CHĂM SÓC CƠ THỂ', 3, '0000-00-00 00:00:00'),
(59, 0, 'CHĂM SÓC TÓC - MÓNG', 4, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ordere`
--

CREATE TABLE `ordere` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ordere`
--

INSERT INTO `ordere` (`id`, `product_id`, `qty`, `name`, `price`, `image`, `amount`, `transaction_id`, `status`, `created_at`) VALUES
(4, 1, 1, 'Sữa rửa mặt Sebo Végetal Gel Nettoyant Purifiant', 220000, 'ab1.jpg', 220000, 4, 0, '2017-11-05 17:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `buyed` int(5) DEFAULT NULL,
  `thunbar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `category_id`, `supplier`, `qty`, `buyed`, `thunbar`, `created_at`, `updated_at`) VALUES
(1, 'Sữa rửa mặt Sebo Végetal Gel Nettoyant Purifiant', 'Sữa rửa mặt Sebo Végetal Gel Nettoyant Purifiant dành cho da dầu và hỗn hợp - Sữa rửa mặt có tác dụng làm sạch, hút bụi bẩn tại các lỗ chân lông, làm sạch hoàn hảo mà không gây khô da, kết cấu không nhờn, lấy lại sự tươi mát cho làn da đồng thời có tác dụ', 220000, 49, ' Nettoyant Purifiant', 50, 1, 'ab1.jpg', '2017-10-24 16:28:33', '2017-10-24 16:28:33'),
(2, 'Kem dưỡng da Sebo Végetal Gel Creme Matifiant', ' Kem dưỡng da Sebo Végetal Gel Creme Matifiant dành cho da dầu và hỗn hợp - Kem có tác dụng hấp thụ bã nhờn dư thừa và giữ ẩm, làm cho làn da tươi sáng. - Dung tích 50ml\"', 320000, 47, 'Creme Matifiant', 15254, NULL, 'ab3.jpg', '2017-10-25 16:40:28', '2017-10-25 16:40:28'),
(3, ' Sữa rửa mặt Hydra Vegetal', 'Sữa rửa mặt Hydra Vegetal cung cấp nước, độ ẩm cho da, loại bỏ các tạp chất sâu và bã nhờn dư thừa, giữ cho làn da thoáng mát, sạch sẽ và rực rỡ. Đây là loại sữa rửa mặt cung cấp độ ẩm lý tưởng dành cho các bạn nữ phải thường xuyên trang điểm khi đi làm. ', 220000, 49, 'Hydra Vegetal', 89, NULL, 'ab5.jpg', '2017-10-27 17:20:22', '2017-10-27 17:20:22'),
(4, ' Nước hoa hồng Hydra Vegetal', ' Nước hoa hồng Hydra Vegetal: loại bỏ các tạp chất cho da, làm sáng và nuôi dưỡng da, dành cho da thường đến hỗn hợp - Dung tích: 200ml\"', 200000, 50, 'Hydra Vegetal', 32432, NULL, 'ab6.jpg', '2017-10-27 17:21:53', '2017-10-27 17:21:53'),
(5, 'Kem dưỡng da ban đêm Serum Vegetal', 'Kem dưỡng da ban đêm Serum vegetal làm GIẢM NẾP NHĂN, SÁNG DA VÀ SĂN CHẮC - Với chiết xuất Oligosides từ Táo Đỏ, tác dụng chống lại các nep nhăn và tái tạo lại độ tươi sáng của da, kết cấu với nhựa Acacia từ Senegal giúp khôi phục lại cấu trú và cho làn d', 500000, 47, 'Serum Vegetal', 250, NULL, 'ab8.jpg', '2017-10-27 17:23:06', '2017-10-27 17:23:06'),
(6, 'Kem dưỡng da ban ngày Anti Age Global', ' Kem dưỡng da ban đêm Serum vegetal làm GIẢM NẾP NHĂN, SÁNG DA VÀ SĂN CHẮC - Với chiết xuất Oligosides từ Táo Đỏ, tác dụng chống lại các nep nhăn và tái tạo lại độ tươi sáng của da, kết cấu với nhựa Acacia từ Senegal giúp khôi phục lại cấu trú và cho làn ', 900000, 47, ' Anti Age Global', 250, NULL, 'ab11.jpg', '2017-10-27 19:25:59', '2017-10-27 19:25:59'),
(7, 'Kem dưỡng da ban đêm Anti Age Global', ' Được chiết xuất từ những tinh dầu quý giá, kem dưỡng da Anti Age Global sẽ cung cấp độ ẩm, dưỡng da bạn, giúp cho làn da khỏe mạnh, tái sinh, mượt mà đồng thời có tác dụng chống nhăn, rất lý tưởng để cung cấp độ ẩm cho làn da bạn. - Dung tích: 50ml', 100000, 47, 'Anti Age Globa', 56, NULL, 'ab12.jpg', '2017-10-27 19:27:29', '2017-10-27 19:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `active` tinyint(5) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `name`, `email`, `address`, `phone`, `amount`, `message`, `active`, `created_at`) VALUES
(4, 'duọcw', 'nguyenduocit@gmail.com', 'sdfsdfsdfsdfsd', '01659020898', 220000, NULL, 0, '2017-11-05 17:24:10'),
(5, 'duọcw', 'nguyenduocit@gmail.com', 'sdfsdfsdfsdfsd', '01659020898', 220000, NULL, 0, '2017-11-05 17:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`, `address`, `created_at`) VALUES
(6, 'admin', 'admin123@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, '2017-10-19 15:03:50'),
(7, 'admin', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, '2017-10-28 17:31:01');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `ordere`
--
ALTER TABLE `ordere`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `ordere`
--
ALTER TABLE `ordere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordere`
--
ALTER TABLE `ordere`
  ADD CONSTRAINT `ordere_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordere_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
