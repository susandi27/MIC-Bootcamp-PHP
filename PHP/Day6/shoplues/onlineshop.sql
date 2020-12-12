-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2020 at 11:54 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(4, 'Acer', 'image/brand/acer_logo.png', '2020-12-03 07:04:41', '2020-12-03 07:04:41'),
(5, 'Apple', 'image/brand/apple_logo.png', '2020-12-03 07:04:54', '2020-12-03 07:04:54'),
(6, 'Ariel', 'image/brand/ariel_logo.png', '2020-12-03 07:05:04', '2020-12-03 07:05:04'),
(7, 'Bella', 'image/brand/bella_logo.png', '2020-12-03 07:05:18', '2020-12-03 07:05:18'),
(8, 'Brands', 'image/brand/brands_logo.png', '2020-12-03 07:05:32', '2020-12-03 07:05:32'),
(9, 'Giordano', 'image/brand/giordano_logo.png', '2020-12-03 07:06:42', '2020-12-03 07:06:42'),
(10, 'Loacker', 'image/brand/loacker_logo.jpg', '2020-12-03 07:06:58', '2020-12-03 07:06:58'),
(11, 'Lock and Lock', 'image/brand/lockandlock_logo.png', '2020-12-03 07:07:25', '2020-12-03 07:07:25'),
(12, 'Sai Sai', 'image/brand/saisai_logo.png', '2020-12-03 07:07:41', '2020-12-03 07:07:41');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Baby Care', 'image/category/babymild.png', '2020-12-02 22:07:33', '2020-12-02 22:07:33'),
(2, 'Home Decor', 'image/category/homedecor.jpg', '2020-12-02 22:09:23', '2020-12-02 22:09:23'),
(3, 'Stationary', 'image/category/stationary.jpg', '2020-12-02 22:10:30', '2020-12-02 22:10:30'),
(4, 'Book', 'image/category/book.jpg', '2020-12-02 22:14:41', '2020-12-02 22:14:41'),
(5, 'Kitchen', 'image/category/kitchen.jpg', '2020-12-02 22:16:20', '2020-12-02 22:16:20'),
(6, 'Travel', 'image/category/travel.jpg', '2020-12-02 22:17:12', '2020-12-02 22:17:12'),
(7, 'Furniture', 'image/category/furniture.jpg', '2020-12-02 22:18:47', '2020-12-02 22:18:47'),
(8, 'Smart Home', 'image/category/smarthome.jpg', '2020-12-02 22:19:58', '2020-12-02 22:19:58'),
(9, 'Health', 'image/category/health.jpg', '2020-12-02 22:20:40', '2020-12-02 22:20:40'),
(10, 'Sports', 'image/category/sport.jpg', '2020-12-02 22:21:55', '2020-12-02 22:21:55'),
(11, 'Pets', 'image/category/pets.jpg', '2020-12-02 22:23:42', '2020-12-02 22:23:42'),
(12, 'Toys', 'image/category/toys.jpg', '2020-12-02 22:25:21', '2020-12-02 22:25:21'),
(13, 'Beauty', 'image/category/beauty.png', '2020-12-02 22:26:03', '2020-12-02 22:26:03'),
(14, 'Man Fashion', 'image/category/man.jpg', '2020-12-02 22:28:30', '2020-12-02 22:28:30'),
(15, 'Woman Fashion', 'image/category/woman.jpg', '2020-12-02 22:31:00', '2020-12-02 22:31:00'),
(16, 'Electronic Devices', 'image/category/electronicdevices.jpeg', '2020-12-02 22:32:00', '2020-12-02 22:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `codeno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` text COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `brand_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `codeno`, `name`, `photo`, `price`, `discount`, `description`, `created_at`, `updated_at`, `brand_id`, `subcategory_id`) VALUES
(5, '101', 'Apple Ear Phone', 'image/item/apple_four.jpeg', '25000', '', '-', '2020-12-03 07:08:22', '2020-12-03 07:08:22', 5, 32),
(11, '107', 'Giordano Shirt', 'image/item/giordano_one.jpg', '25000', '', '-', '2020-12-03 07:12:59', '2020-12-03 07:12:59', 9, 32),
(12, '108', 'Giordano', 'image/item/giordano_three.jpg', '40000', '390000', '-', '2020-12-03 07:13:51', '2020-12-03 07:13:51', 9, 32),
(15, '111', 'Sai Sai Two', 'image/item/saisai_two.jpg', '25000', '23000', '-', '2020-12-03 07:15:52', '2020-12-03 07:15:52', 12, 32),
(17, '113', 'Sai Sai Four', 'image/item/saisai_four.jpg', '23000', '', '-', '2020-12-03 07:16:49', '2020-12-03 07:16:49', 12, 32),
(22, '101', 'Phone', 'image/brand/apple_three.jpg', '500000', '490000', '', '2020-12-12 10:30:06', '2020-12-12 10:30:06', 5, 18),
(23, '102', 'Laptop', 'image/brand/71h6PpGaz9L._AC_SL1500_.jpg', '1500000', '', '', '2020-12-12 10:32:24', '2020-12-12 10:32:24', 4, 17),
(24, '111', 'baby toys', 'image/item/download.jfif', '23000', '22000', '', '2020-12-12 10:36:34', '2020-12-12 10:36:34', 8, 31),
(25, '112', 'Baby Mild', 'image/brand/31 Babi Mild Pure Natural Baby Oil Ultra Mild 100ml-1000x1000.jpg', '15000', '12000', '', '2020-12-12 10:37:49', '2020-12-12 10:37:49', 7, 33),
(26, '113', 'Backpack', 'image/item/GUEST_9c2a3793-30c8-4b85-af99-5a1806facf25.jfif', '40000', '35000', '', '2020-12-12 10:39:59', '2020-12-12 10:39:59', 6, 22);

-- --------------------------------------------------------

--
-- Table structure for table `item_order`
--

CREATE TABLE `item_order` (
  `id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_order`
--

INSERT INTO `item_order` (`id`, `qty`, `created_at`, `updated_at`, `item_id`, `order_id`) VALUES
(1, 1, '2020-12-08 06:31:17', '2020-12-08 06:31:17', 17, 1),
(2, 1, '2020-12-08 06:31:17', '2020-12-08 06:31:17', 15, 1),
(3, 1, '2020-12-08 06:31:17', '2020-12-08 06:31:17', 17, 2),
(4, 1, '2020-12-08 06:31:17', '2020-12-08 06:31:17', 15, 2),
(5, 3, '2020-12-08 06:47:24', '2020-12-08 06:47:24', 9, 3),
(6, 1, '2020-12-08 09:11:30', '2020-12-08 09:11:30', 16, 4),
(7, 1, '2020-12-08 09:11:30', '2020-12-08 09:11:30', 14, 4),
(8, 1, '2020-12-08 09:11:30', '2020-12-08 09:11:30', 11, 4),
(9, 1, '2020-12-08 09:11:30', '2020-12-08 09:11:30', 16, 5),
(10, 1, '2020-12-08 09:11:30', '2020-12-08 09:11:30', 14, 5),
(11, 1, '2020-12-08 09:11:30', '2020-12-08 09:11:30', 11, 5),
(12, 1, '2020-12-08 09:11:30', '2020-12-08 09:11:30', 16, 6),
(13, 1, '2020-12-08 09:11:30', '2020-12-08 09:11:30', 14, 6),
(14, 1, '2020-12-08 09:11:30', '2020-12-08 09:11:30', 11, 6),
(15, 1, '2020-12-08 14:38:48', '2020-12-08 14:38:48', 18, 7),
(16, 1, '2020-12-11 07:49:41', '2020-12-11 07:49:41', 9, 9),
(17, 1, '2020-12-11 07:49:41', '2020-12-11 07:49:41', 17, 9),
(18, 1, '2020-12-11 07:49:41', '2020-12-11 07:49:41', 9, 10),
(19, 1, '2020-12-11 07:49:41', '2020-12-11 07:49:41', 17, 10),
(20, 1, '2020-12-11 08:08:42', '2020-12-11 08:08:42', 0, 11),
(21, 1, '2020-12-11 08:08:42', '2020-12-11 08:08:42', 12, 11),
(22, 1, '2020-12-11 08:08:42', '2020-12-11 08:08:42', 0, 12),
(23, 1, '2020-12-11 08:08:42', '2020-12-11 08:08:42', 12, 12),
(24, 2, '2020-12-11 08:14:37', '2020-12-11 08:14:37', 12, 13),
(25, 1, '2020-12-11 08:19:12', '2020-12-11 08:19:12', 9, 14);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 1),
(4, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `voucherno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderdate` date NOT NULL,
  `voucherno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderdate`, `voucherno`, `total`, `note`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(1, '2020-12-08', '1607365877', '23000', '', 'Delete', '2020-12-08 06:31:17', '2020-12-08 06:31:17', 2),
(2, '2020-12-08', '1607365877', '46000', '', 'Delete', '2020-12-08 06:31:17', '2020-12-08 06:31:17', 2),
(3, '2020-12-08', '1607366844', '297000', '', 'Confirm', '2020-12-08 06:47:24', '2020-12-08 06:47:24', 2),
(4, '2020-12-08', '1607375490', '42000', '', 'Confirm', '2020-12-08 09:11:30', '2020-12-08 09:11:30', 2),
(5, '2020-12-08', '1607375490', '22000', '', 'Confirm', '2020-12-08 09:11:30', '2020-12-08 09:11:30', 2),
(6, '2020-12-08', '1607375490', '67000', '', 'Confirm', '2020-12-08 09:11:30', '2020-12-08 09:11:30', 2),
(9, '2020-12-11', '1607629781', '99000', '', 'Order', '2020-12-11 07:49:41', '2020-12-11 07:49:41', 4),
(10, '2020-12-11', '1607629781', '122000', '', 'Order', '2020-12-11 07:49:41', '2020-12-11 07:49:41', 4),
(13, '2020-12-11', '1607631277', '40000', '', 'Order', '2020-12-11 08:14:37', '2020-12-11 08:14:37', 4),
(14, '2020-12-11', '1607631551', '390000', '', 'Order', '2020-12-11 08:19:11', '2020-12-11 08:19:11', 4);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-12-07 03:35:58', '2020-12-07 03:35:58'),
(2, 'customer', '2020-12-07 03:35:58', '2020-12-07 03:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'Refrigerator', '2020-12-02 22:33:03', '2020-12-02 22:33:03', 16),
(2, 'Aircon', '2020-12-02 22:33:10', '2020-12-02 22:33:10', 16),
(3, 'Gown', '2020-12-03 05:15:22', '2020-12-03 05:15:22', 15),
(4, 'Shirt', '2020-12-03 05:15:34', '2020-12-03 05:15:34', 15),
(5, 'Stylepin', '2020-12-03 05:15:43', '2020-12-03 05:15:43', 14),
(6, 'Naketine', '2020-12-03 05:16:04', '2020-12-03 05:16:04', 14),
(7, 'Lipstick', '2020-12-03 05:16:11', '2020-12-03 05:16:11', 13),
(8, 'Skincare', '2020-12-03 05:16:18', '2020-12-03 05:16:18', 13),
(9, 'Cars', '2020-12-03 05:16:41', '2020-12-03 05:16:41', 12),
(10, 'doll', '2020-12-03 05:16:48', '2020-12-03 05:16:48', 12),
(11, 'Cat foods', '2020-12-03 05:16:54', '2020-12-03 05:16:54', 11),
(12, 'Dog Foods', '2020-12-03 05:17:01', '2020-12-03 05:17:01', 11),
(13, 'Ball', '2020-12-03 05:17:09', '2020-12-03 05:17:09', 10),
(14, 'Foods', '2020-12-03 05:17:21', '2020-12-03 05:17:21', 11),
(15, 'Injection needles', '2020-12-03 05:17:28', '2020-12-03 05:17:28', 9),
(16, 'Medicine', '2020-12-03 05:17:37', '2020-12-03 05:17:37', 9),
(17, 'Laptop', '2020-12-03 05:17:45', '2020-12-03 05:17:45', 8),
(18, 'Phone', '2020-12-03 05:17:59', '2020-12-03 05:17:59', 8),
(19, 'TV', '2020-12-03 05:18:20', '2020-12-03 05:18:20', 7),
(20, 'Chair', '2020-12-03 05:18:27', '2020-12-03 05:18:27', 7),
(21, 'Shoes', '2020-12-03 05:18:34', '2020-12-03 05:18:34', 6),
(22, 'Bags', '2020-12-03 05:18:41', '2020-12-03 05:18:41', 6),
(23, 'Pan', '2020-12-03 05:18:48', '2020-12-03 05:18:48', 5),
(24, 'Knife', '2020-12-03 05:18:58', '2020-12-03 05:18:58', 5),
(25, 'Top Choice', '2020-12-03 05:19:09', '2020-12-03 05:19:09', 4),
(26, 'Top Ten', '2020-12-03 05:19:19', '2020-12-03 05:19:19', 4),
(27, 'Accessories', '2020-12-03 05:19:37', '2020-12-03 05:19:37', 3),
(28, 'Table', '2020-12-03 05:19:44', '2020-12-03 05:19:44', 3),
(29, 'Wallpaper', '2020-12-03 05:19:53', '2020-12-03 05:19:53', 2),
(30, 'Light', '2020-12-03 05:20:00', '2020-12-03 05:20:00', 2),
(31, 'Baby Food', '2020-12-03 05:20:15', '2020-12-03 05:20:15', 1),
(33, 'Baby Mild', '2020-12-04 04:48:34', '2020-12-04 04:48:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `profile`, `email`, `password`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Su Sandi', 0, 'admin@gmail.com', '123456789', '9127836177', 'Yangon', 0, '2020-12-07 08:18:09', '2020-12-07 08:18:09'),
(2, 'Aye Aye', 0, 'ayeaye@gmail.com', '123456789', '9127836177', 'Yangon', 0, '2020-12-07 08:19:50', '2020-12-07 08:19:50'),
(3, 'koko', 0, 'koko@gmail.com', '123456789', '9127836177', 'Yangon', 0, '2020-12-07 08:22:51', '2020-12-07 08:22:51'),
(4, 'susu', 0, 'susu@gmail.com', '123456789', '9127836177', 'Yangon', 0, '2020-12-11 07:48:53', '2020-12-11 07:48:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_order`
--
ALTER TABLE `item_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `item_order`
--
ALTER TABLE `item_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
