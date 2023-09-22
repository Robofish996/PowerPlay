-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2023 at 08:58 AM
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
-- Database: `powerplay`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `payment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `quantity`, `price`, `payment`) VALUES
(4, 'Logitech G502 Lightspeed Wireless Gaming Mouse', 1, 2100, '2099.99'),
(5, 'MARVO G941 RGB Optical Gaming Mouse', 1, 249, '249.00'),
(6, 'SteelSeries Aerox 5 Wireless – Diablo IV Edition', 1, 3400, '3399.99'),
(7, 'Razer Viper Ultimate Ambidextrous Optical Wireless Gaming Mouse', 1, 2850, '2849.99'),
(8, 'Razer Viper Ultimate Ambidextrous Optical Wireless Gaming Mouse', 1, 2850, '2849.99'),
(9, 'Razer Naga V2 Pro Wireless Gaming Mouse', 1, 3800, '3799.99');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT curtime(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `created_at`, `status`) VALUES
(1, 'mice', '/mouse.png', '2023-09-19 15:24:55', 1),
(2, 'keyboard', 'keyboard.png', '2023-09-19 15:54:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `combined_orders`
--

CREATE TABLE `combined_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_image_path` varchar(255) DEFAULT NULL,
  `product_category` varchar(50) NOT NULL,
  `product_description` text DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_image_path`, `product_category`, `product_description`, `status`, `category_id`) VALUES
(1, 'MARVO Sunspot S2 ML-G946 Gaming Mouse', 499.99, '../css/images/storeProducts/mice/marvo_Sunspot_S2_Gaming_Mouse-removebg-preview.png', 'Mice', 'Lightweight Gaming Mouse: Taking lightweight, durable and sturdy honeycomb shell design, offers you better touch experience. Advanced ventilation and flexible paracord material, assure your soft feeling and excellent gaming experience even a long-period using.', 'available', 1),
(2, 'Razer Naga V2 Pro Wireless Gaming Mouse', 3799.99, '../css/images/storeProducts/mice/razer_naga_v2_pro_wireless_gaming_mouse_v01-removebg-preview.png', 'Mice', 'Absolute Adaptability and Control: This mouse comes with a set of 12, 6 and 2-button magnetic side plates, allowing you adapt to any game genre with control of up to 19+1 programmable, backlit buttons', 'available', 1),
(3, 'SteelSeries Aerox 5 Wireless – Diablo IV Edition', 3399.99, '../css/images/storeProducts/mice/steelseries_aerox_5_wireless_diablo_iv_edition_gaming_mouse_v1-removebg-preview.png', 'Mice', 'Quantum 2.0 Wireless - Ultra-lightweight 76g gaming mouse designed for speed and precision, perfect for all RPG, MMO, FPS, MOBA, Battle Royale and other fast-paced games', 'available', 1),
(4, 'Razer Viper Ultimate Ambidextrous Optical Wireless Gaming Mouse', 2849.99, '../css/images/storeProducts/mice/razer_viper_ultimate_wireless_gaming_v2-removebg-preview.png', 'Mice', '25% Quicker Than Competing Wireless Mice: Razer HyperSpeed wireless technology brings together extreme low-latency and interference reduction for true wireless freedom.', 'available', 1),
(5, 'Logitech G502 Lightspeed Wireless Gaming Mouse', 2099.99, '../css/images/storeProducts/mice/logitech_g502_wireless_gaming_mouse_v2-removebg-preview.png', 'Mice', 'PowerPlay wireless charging: Never worry about your battery life again. Add the power play wireless charging system to keep your G502 Lightspeed Wireless Mouse and other compatible G mice charged while at rest and at play. Powerplay wireless charging system sold separately.', 'available', 1),
(6, 'Logitech G G502 X Wired Gaming Mouse', 1749.99, '../css/images/storeProducts/mice/logitech_g_G502_x_wired_gaming_mouse_v1-removebg-preview.png', 'Mice', 'High-precision gaming sensor with 1:1 accuracy at sub-micron levels and zero smoothing, filtering or acceleration. Choose up to 5 preferred sensitivities with G HUB software.', 'available', 1),
(7, 'SteelSeries Rival 3 Wireless Gaming Mouse', 1249.00, '../css/images/storeProducts/mice/steelseries_rival_3_wireless_gaming_mouse_v2-removebg-preview.png', 'Mice', 'The Rival 3 Wireless utilizes brand new Quantum 2.0 Dual Wireless technology to provide ultra-low latency wireless with up to 400+ hours, plus two types of wireless connectivity for precision performance and versatility year-round.', 'available', 1),
(8, 'Gamdias AURA GS2 Optical Gaming Mouse', 149.00, '../css/images/storeProducts/mice/gamdias_aura_gs2_optical_gaming_mouse_v1-removebg-preview.png', 'Mice', 'The AURA GS2 multi-color lighting gaming mouse is designed to fit the needs of all gamers with its advanced ergonomic design along with a gaming-grade optical sensor, giving you the edge over your opponents.', 'available', 1),
(9, 'MARVO M422 Optical RGB Gaming Mouse', 149.00, '../css/images/storeProducts/mice/marvo_m422_optical_gaming_mouse_v1-removebg-preview.png', 'Mice', 'The awesome M422 gaming mouse by Marvo offers you incredible overall performance and remarkable value for money.', 'available', 1),
(10, 'MARVO G941 RGB Optical Gaming Mouse', 249.00, '../css/images/storeProducts/mice/marvo_g941_optical_gaming_mouse_v2-removebg-preview.png', 'Mice', 'High-precision 12,000 DPI optical sensor. Ambidextrous ergonomic design for both left and right-handed gamers.', 'available', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'mat', '1234@gmail.com', '$2y$10$Slpzk.xXCvh0rp7yXVnQL.x/nHcBXAYERbp.ggsH9nXtkccWZv/sW', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `combined_orders`
--
ALTER TABLE `combined_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `combined_orders`
--
ALTER TABLE `combined_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
