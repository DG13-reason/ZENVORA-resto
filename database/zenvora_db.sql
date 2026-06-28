-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2026 at 07:00 PM
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
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `id` int(11) NOT NULL,
  `area` enum('Indoor','Outdoor','VIP') NOT NULL,
  `nomor_meja` varchar(10) NOT NULL,
  `status` enum('Kosong','Terisi') DEFAULT 'Kosong'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id`, `area`, `nomor_meja`, `status`) VALUES
(1, 'Indoor', 'A01', 'Kosong'),
(2, 'Indoor', 'A02', 'Kosong'),
(3, 'Indoor', 'A03', 'Kosong'),
(4, 'Indoor', 'A04', 'Kosong'),
(5, 'Indoor', 'A05', 'Kosong'),
(6, 'Indoor', 'A06', 'Kosong'),
(7, 'Indoor', 'A07', 'Kosong'),
(8, 'Indoor', 'A08', 'Kosong'),
(9, 'Indoor', 'A09', 'Kosong'),
(10, 'Indoor', 'A10', 'Kosong'),
(11, 'Outdoor', 'B01', 'Kosong'),
(12, 'Outdoor', 'B02', 'Kosong'),
(13, 'Outdoor', 'B03', 'Kosong'),
(14, 'Outdoor', 'B04', 'Kosong'),
(15, 'Outdoor', 'B05', 'Kosong'),
(16, 'VIP', 'V01', 'Kosong'),
(17, 'VIP', 'V02', 'Kosong'),
(18, 'VIP', 'V03', 'Kosong'),
(19, 'VIP', 'V04', 'Kosong'),
(20, 'VIP', 'V05', 'Kosong');

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
  `stok` int(11) DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT 0.0,
  `total_review` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `category_id`, `nama_menu`, `deskripsi`, `harga`, `gambar`, `stok`, `rating`, `total_review`) VALUES
(53, 1, 'Nasi Goreng', 'Nasi goreng spesial', 20000, 'Nasgor.png', 92, 0.0, 0),
(54, 1, 'Bakso', 'Bakso sapi', 15000, 'bakso.png', 99, 0.0, 0),
(55, 1, 'Mie Ayam', 'Mie ayam lezat', 15000, 'MieAyam.png', 100, 0.0, 0),
(56, 1, 'Nila Bakar', 'Nila bakar madu', 25000, 'Nila Bakar.jpg', 100, 0.0, 0),
(57, 1, 'Rawon', 'Nasi rawon gurih', 25000, 'Rawon.jpg', 100, 0.0, 0),
(58, 1, 'Sate Lilit', 'Sate ayam lilit', 15000, 'Sate lilit.jpg', 100, 0.0, 0),
(59, 1, 'Seafood Mix', 'Kepiting, Kerang, Udang, Jagung', 35000, 'Seafoodmix.jpg', 100, 0.0, 0),
(60, 1, 'Steak', 'Steak meleleh dimulut', 55000, 'steak.jpg', 100, 0.0, 0),
(61, 1, 'Ayam betutu', 'Ayam goreng', 28000, 'ayam betutu.jpg', 100, 0.0, 0),
(62, 2, 'Kopi', 'Kopi hitam', 10000, 'kopi.jpg', 100, 0.0, 0),
(63, 2, 'Jus Alpukat', 'Jus alpukat segar', 12000, 'jusAlpukat.png', 100, 0.0, 0),
(64, 2, 'Matcha', 'Karamel matcha', 15000, 'Matcha.png', 100, 0.0, 0),
(65, 2, 'Boba Taro', 'Milkshack taro + Boba', 15000, 'Boba taro.jpg', 100, 0.0, 0),
(66, 2, 'Es Teler', 'Bikin nagih dan plenger', 13000, 'EsTeler.png', 100, 0.0, 0),
(67, 2, 'Lemon tea', 'Paduan teh dan kecut lemon', 10000, 'lemontea.jpg', 100, 0.0, 0),
(68, 2, 'Jus Mangga', 'Jus mangga segar', 12000, 'jus mangga.jpg', 100, 0.0, 0),
(69, 2, 'Coco Hazelnut', 'Coklat huzelnut', 15000, 'coco hazelnut.jpg', 100, 0.0, 0),
(70, 3, 'French Fries', 'kentang goreng crispy', 12000, 'French Fries.jpg', 100, 0.0, 0),
(71, 3, 'Fried Ice cream', 'es krim goreng', 13000, 'fried ice cream.jpg', 100, 0.0, 0),
(72, 3, 'Risol', 'keju mayo sosis', 10000, 'Risol.png', 100, 0.0, 0),
(73, 3, 'Pancake', 'kue softed', 12000, 'pancake.jpg', 100, 0.0, 0),
(74, 3, 'Sandwich', 'pake sarapan enak', 10000, 'sandwich.jpg', 100, 0.0, 0),
(75, 3, 'Strawberry Parfeit', 'kaya akan strawberry', 15000, 'strawberry parfait.jpg', 100, 0.0, 0),
(76, 3, 'Gyoza', 'makanan dari jepang', 20000, 'gyoza.jpg', 100, 0.0, 0),
(77, 3, 'Momo', 'isian daging', 13000, 'momo.jpg', 100, 0.0, 0),
(78, 3, 'Panna cota', 'seperti puding', 10000, 'panna cota.jpg', 100, 0.0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','diproses','dikirim','selesai') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_harga`, `order_date`, `status`, `created_at`) VALUES
(7, 5, 20000, '2026-06-17 04:11:15', 'selesai', '2026-06-28 11:33:20'),
(8, 5, 35000, '2026-06-20 13:57:37', 'selesai', '2026-06-28 11:33:20'),
(9, 5, 15000, '2026-06-28 06:38:20', 'selesai', '2026-06-28 11:33:20'),
(10, 5, 20000, '2026-06-28 07:03:22', 'selesai', '2026-06-28 11:33:20'),
(11, 5, 20000, '2026-06-28 07:03:44', 'selesai', '2026-06-28 11:33:20'),
(12, 5, 15000, '2026-06-28 07:33:40', 'selesai', '2026-06-28 11:33:20'),
(13, 5, 20000, '2026-06-28 10:38:53', 'dikirim', '2026-06-28 11:33:20'),
(14, 0, 20000, '2026-06-28 10:47:31', 'pending', '2026-06-28 11:33:20'),
(15, 0, 20000, '2026-06-28 12:04:12', 'pending', '2026-06-28 12:04:12'),
(16, 0, 20000, '2026-06-28 13:49:03', 'pending', '2026-06-28 13:49:03'),
(17, 0, 20000, '2026-06-28 13:50:40', 'pending', '2026-06-28 13:50:40'),
(18, 5, 35000, '2026-06-28 13:57:02', 'pending', '2026-06-28 13:57:02'),
(19, 5, 35000, '2026-06-28 13:57:02', 'pending', '2026-06-28 13:57:02'),
(20, 5, 20000, '2026-06-28 15:23:28', 'pending', '2026-06-28 15:23:28'),
(21, 5, 20000, '2026-06-28 15:23:28', 'pending', '2026-06-28 15:23:28'),
(22, 5, 20000, '2026-06-28 15:31:06', 'pending', '2026-06-28 15:31:06'),
(23, 5, 20000, '2026-06-28 15:31:06', 'pending', '2026-06-28 15:31:06');

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
(7, 7, 53, 1, 20000, 20000),
(8, 8, 54, 1, 15000, 15000),
(9, 8, 53, 1, 20000, 20000),
(10, 9, 54, 1, 15000, 15000),
(11, 10, 53, 1, 20000, 20000),
(12, 11, 53, 1, 20000, 20000),
(13, 12, 54, 1, 15000, 15000),
(15, 14, 53, 1, 20000, 20000),
(16, 15, 53, 1, 20000, 20000),
(17, 16, 53, 1, 20000, 20000),
(18, 17, 53, 1, 20000, 20000),
(19, 19, 53, 1, 20000, 20000),
(20, 19, 54, 1, 15000, 15000),
(21, 21, 53, 1, 20000, 20000),
(22, 23, 53, 1, 20000, 20000);

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

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `payment_method`, `proof_image`, `status`, `created_at`) VALUES
(1, 10, 'Tunai', '', 'Pending', '2026-06-28 07:03:22'),
(2, 14, 'Transfer', '', 'Pending', '2026-06-28 10:47:31'),
(3, 15, 'Tunai', '', 'Pending', '2026-06-28 12:04:12'),
(4, 16, 'Tunai', '', 'Pending', '2026-06-28 13:49:03'),
(5, 17, 'Tunai', '', 'Pending', '2026-06-28 13:50:40'),
(6, 19, 'Tunai', '', 'Pending', '2026-06-28 13:57:02'),
(7, 21, 'E-Wallet', '', 'Pending', '2026-06-28 15:23:28'),
(8, 23, 'QRIS', '', 'Pending', '2026-06-28 15:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `komentar` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `menu_id`, `order_id`, `rating`, `komentar`, `created_at`) VALUES
(1, 5, 53, 7, 4, 'rasanya enak', '2026-06-28 13:39:32'),
(2, 5, 54, 8, 4, 'enak banget', '2026-06-28 13:40:25'),
(3, 5, 53, 8, 4, 'sungguh mantap', '2026-06-28 13:40:39'),
(4, 5, 54, 9, 4, '2 kali tambah', '2026-06-28 13:40:58'),
(5, 5, 53, 10, 4, 'nasi goreng paling mantap', '2026-06-28 13:41:19'),
(6, 5, 54, 12, 4, 'baksonya the best', '2026-06-28 13:41:42');

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
(5, 'AdminZENVORA', 'damargiri13@gmail.com', '$2y$10$6ik941cwMsmmNNFTM4YUH.9kqneknSuBUltsvPDICQnb0g1RUwmIK', 'admin', '1781625063_f54a3e794f413fe99cd8d9a5377223e2.jpg', '2026-06-16 15:51:03'),
(6, 'damar', 'damar@gmail.com', '$2y$10$BX2dz2pWRUwlhHMg7EH3juZV1fixegKMb/sJziBJ0c7WueeNXjQFK', 'user', '', '2026-06-22 03:29:04');

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
-- Indexes for table `meja`
--
ALTER TABLE `meja`
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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `menu_id` (`menu_id`),
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
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
