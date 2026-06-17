-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2026 at 06:38 AM
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
-- Database: `zenvora_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Snack & Desert');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `nama_menu` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `category_id`, `nama_menu`, `deskripsi`, `harga`, `gambar`, `stok`) VALUES
(53, 1, 'Nasi Goreng', 'Nasi goreng spesial', 20000, 'Nasgor.png', 100),
(54, 1, 'Bakso', 'Bakso sapi', 15000, 'bakso.png', 100),
(55, 1, 'Mie Ayam', 'Mie ayam lezat', 15000, 'MieAyam.png', 100),
(56, 1, 'Nila Bakar', 'Nila bakar madu', 25000, 'Nila Bakar.jpg', 100),
(57, 1, 'Rawon', 'Nasi rawon gurih', 25000, 'Rawon.jpg', 100),
(58, 1, 'Sate Lilit', 'Sate ayam lilit', 15000, 'Sate lilit.jpg', 100),
(59, 1, 'Seafood Mix', 'Kepiting, Kerang, Udang, Jagung', 35000, 'Seafoodmix.jpg', 100),
(60, 1, 'Steak', 'Steak meleleh dimulut', 55000, 'steak.jpg', 100),
(61, 1, 'Ayam betutu', 'Ayam goreng', 28000, 'ayam betutu.jpg', 100),
(62, 2, 'Kopi', 'Kopi hitam', 10000, 'kopi.jpg', 100),
(63, 2, 'Jus Alpukat', 'Jus alpukat segar', 12000, 'jusAlpukat.png', 100),
(64, 2, 'Matcha', 'Karamel matcha', 15000, 'Matcha.png', 100),
(65, 2, 'Boba Taro', 'Milkshack taro + Boba', 15000, 'Boba taro.jpg', 100),
(66, 2, 'Es Teler', 'Bikin nagih dan plenger', 13000, 'EsTeler.png', 100),
(67, 2, 'Lemon tea', 'Paduan teh dan kecut lemon', 10000, 'lemontea.jpg', 100),
(68, 2, 'Jus Mangga', 'Jus mangga segar', 12000, 'jus mangga.jpg', 100),
(69, 2, 'Coco Hazelnut', 'Coklat huzelnut', 15000, 'coco hazelnut.jpg', 100),
(70, 3, 'French Fries', 'kentang goreng crispy', 12000, 'French Fries.jpg', 100),
(71, 3, 'Fried Ice cream', 'es krim goreng', 13000, 'fried ice cream.jpg', 100),
(72, 3, 'Risol', 'keju mayo sosis', 10000, 'Risol.png', 100),
(73, 3, 'Pancake', 'kue softed', 12000, 'pancake.jpg', 100),
(74, 3, 'Sandwich', 'pake sarapan enak', 10000, 'sandwich.jpg', 100),
(75, 3, 'Strawberry Parfeit', 'kaya akan strawberry', 15000, 'strawberry parfait.jpg', 100),
(76, 3, 'Gyoza', 'makanan dari jepang', 20000, 'gyoza.jpg', 100),
(77, 3, 'Momo', 'isian daging', 13000, 'momo.jpg', 100),
(78, 3, 'Panna cota', 'seperti puding', 10000, 'panna cota.jpg', 100);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','diproses','dikirim','selesai') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_harga`, `order_date`, `status`) VALUES
(7, 5, 20000, '2026-06-17 04:11:15', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `menu_id`, `quantity`, `harga`, `subtotal`) VALUES
(7, 7, 53, 1, 20000, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `proof_image` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `foto`, `created_at`) VALUES
(4, 'DamarGiri', 'damondgiri67@gmail.com', '$2y$10$H/cqW5zuhxBj2rcc2RMrYeZ5HwTdD7oPJnCl9waPORZ0JDUSr3u4.', 'user', '1781534875_DAMAR.jpg', '2026-06-15 14:47:55'),
(5, 'AdminZENVORA', 'damargiri13@gmail.com', '$2y$10$4jgREXJKQyQQu4w26hiAvuJ4TGOtlQntG3DiMEIZhsrpTYrL6kcuS', 'admin', '1781625063_f54a3e794f413fe99cd8d9a5377223e2.jpg', '2026-06-16 15:51:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
