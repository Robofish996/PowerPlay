-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 29, 2023 at 07:02 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `quantity`, `price`, `payment`) VALUES
(20, 'Corsair K100 AIR Wireless RGB Mechanical Gaming Keyboard', 1, 6399, '6399.00'),
(21, 'Razer Naga', 1, 3800, '3799.99'),
(22, 'Lenovo IdeaPad Gaming 3 15IHU6 82K101Q0SA', 1, 12499, '12499.00'),
(23, 'MARVO G941', 1, 249, '249.00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `created_at`, `status`) VALUES
(1, 'mice', '../css/category_images/mouse.png', '2023-09-20 17:11:08', 1),
(2, 'keyboard', '../css/category_images/keyboard.png', '2023-09-20 17:11:08', 1),
(3, 'monitor', '../css/category_images/monitor.png', '2023-09-20 19:36:45', 1),
(4, 'laptop', '../css/category_images/laptop.png', '2023-09-20 19:36:45', 1),
(5, 'headset', '../css/category_images/headset.png', '2023-09-24 06:00:10', 1),
(6, 'Gaming Chairs', '../css/category_images/chair.png', '2023-09-24 06:00:51', 1);

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
  `product_description` text,
  `status` varchar(50) NOT NULL,
  `category_id` int(10) NOT NULL,
  `product_featured` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_image_path`, `product_category`, `product_description`, `status`, `category_id`, `product_featured`) VALUES
(1, 'MARVO Sunspot', '499.99', '../css/images/storeProducts/mice/marvo_Sunspot_S2_Gaming_Mouse-removebg-preview.png', 'Mice', 'Discover precision with the MARVO Sunspot S2 ML-G946 gaming mouse. It\'s engineered for superior performance, featuring customizable RGB lighting and a comfortable grip.', 'available', 1, 'no'),
(2, 'Razer Naga', '3799.99', '../css/images/storeProducts/mice/razer_naga_v2_pro_wireless_gaming_mouse_v01-removebg-preview.png', 'Mice', 'Elevate your gaming with the Razer Naga V2 Pro. It\'s wireless, customizable, and built for competitive play, offering exceptional accuracy and comfort.', 'available', 1, 'no'),
(3, 'SteelSeries Aerox', '3399.99', '../css/images/storeProducts/mice/steelseries_aerox_5_wireless_diablo_iv_edition_gaming_mouse_v1-removebg-preview.png', 'Mice', 'The SteelSeries Aerox 5, Diablo IV Edition, is a wireless gaming mouse with lightning-fast speed and precision, designed for the ultimate gaming experience.', 'available', 1, 'no'),
(4, 'Razer Viper', '2849.99', '../css/images/storeProducts/mice/razer_viper_ultimate_wireless_gaming_v2-removebg-preview.png', 'Mice', 'Unleash your full potential with the Razer Viper Ultimate, a wireless gaming mouse that offers unrivaled speed, accuracy, and customization for both left and right-handed gamers.', 'available', 1, 'yes'),
(5, 'Logitech G502', '2099.99', '../css/images/storeProducts/mice/logitech_g502_wireless_gaming_mouse_v2-removebg-preview.png', 'Mice', 'The Logitech G502 Lightspeed is a wireless gaming mouse with high-performance features and customizable buttons, designed to enhance your gaming skills.', 'available', 1, 'no'),
(6, 'Logitech G', '1749.99', '../css/images/storeProducts/mice/logitech_g_G502_x_wired_gaming_mouse_v1-removebg-preview.png', 'Mice', 'Elevate your gameplay with the Logitech G G502 X wired gaming mouse. Its high-precision sensor and customizable weights make it perfect for any gaming situation.', 'available', 1, 'no'),
(7, 'SteelSeries Rival', '1249.00', '../css/images/storeProducts/mice/steelseries_rival_3_wireless_gaming_mouse_v2-removebg-preview.png', 'Mice', 'The SteelSeries Rival 3 wireless gaming mouse offers precise control and rapid response for gamers. Enjoy the freedom of wireless gaming without sacrificing performance.', 'available', 1, 'no'),
(8, 'Gamdias AURA', '149.00', '../css/images/storeProducts/mice/gamdias_aura_gs2_optical_gaming_mouse_v1-removebg-preview.png', 'Mice', 'The Gamdias AURA GS2 optical gaming mouse combines style and performance. With customizable lighting and precise tracking, it\'s a great choice for gamers.', 'available', 1, 'no'),
(9, 'MARVO M422', '149.00', '../css/images/storeProducts/mice/marvo_m422_optical_gaming_mouse_v1-removebg-preview.png', 'Mice', 'The MARVO M422 optical RGB gaming mouse offers responsive performance and customizable lighting to match your gaming setup. Get the competitive edge you need.', 'available', 1, 'no'),
(10, 'MARVO G941', '249.00', '../css/images/storeProducts/mice/marvo_g941_optical_gaming_mouse_v2-removebg-preview.png', 'Mice', 'Step into the gaming world with the MARVO G941 RGB optical gaming mouse. Experience precise tracking, comfortable design, and customizable RGB lighting.', 'available', 1, 'no'),
(11, 'MARVO KG880 Membrane Gaming Keyboard', '399.00', '../css/images/storeProducts/keyboards/marvo_kg880_membrane_gaming_keyboard_v21.jpg', 'Keyboards', 'The MARVO KG880 offers a comfortable gaming experience with anti-ghosting support for up to 19 keys and dedicated multimedia controls, all with a wide-edge palm rest.', 'available', 2, 'yes'),
(12, 'Gamdias AURA GK2 60% Multicolor Gaming Keyboard - Black & White', '499.00', '../css/images/storeProducts/keyboards/gamdias_hermes_e2_gaming_keyboard_black_white_v2.jpg', 'Keyboards', 'Gamdias AURA GK2 is a 61-key mechanical keyboard with dual-colorway keycaps, delivering tactile feedback for an immersive gaming experience in black and white.', 'available', 2, 'no'),
(13, 'Logitech G213 Gaming Keyboard with Dedicated Media Controls', '949.00', '../css/images/storeProducts/keyboards/logitech_g213_rgb_gaming_keyboard_v2.jpg', 'Keyboards', 'Logitech G213 features Mech-Dome keys for a mechanical keyboard feel. Its full-height keys, 4mm travel, 50g actuation force, and quiet operation enhance your gaming.', 'available', 2, 'no'),
(14, 'SteelSeries Apex 3 TKL RGB Gaming Keyboard', '1349.00', '../css/images/storeProducts/keyboards/steelseries_apex_3_tkl_rgb_gaming_keyboard_v1.jpg', 'Keyboards', 'The SteelSeries Apex 3 TKL offers a compact design favored by pros. Customize your gaming experience with RGB lighting and maximize in-game performance.', 'available', 2, 'no'),
(15, 'Razer Ornata V3 TKL Gaming Keyboard', '1599.00', '../css/images/storeProducts/keyboards/razer_ornata_v3_tkl_gaming_keyboard_v01.jpg', 'Keyboards', 'With low-profile keys and ergonomic design, the Razer Ornata V3 ensures long gaming sessions with comfort. Slim keycaps and shorter switches reduce strain during play.', 'available', 2, 'no'),
(16, 'Corsair K65 RGB MINI 60% Mechanical Gaming Keyboard', '1999.00', '../css/images/storeProducts/keyboards/corsair_k65_rgb_mini_gaming_keyboard_cherry_mx_red_v2.jpg', 'Keyboards', 'The K65 RGB MINI packs big features into a compact 60% form factor. Ideal for tight spaces, it offers a comfortable gaming experience with powerful capabilities.', 'available', 2, 'no'),
(17, 'Corsair K70 PRO RGB Optical-Mechanical Gaming Keyboard', '3199.00', '../css/images/storeProducts/keyboards/corsair_k70_pro_rgb_mechanical_gaming_keyboard_opx_linear_v1.jpg', 'Keyboards', 'The K70 PRO retains iconic features with durable aluminum, CHERRY MX switches, and per-key RGB backlighting. AXON tech, PBT keycaps, and tournament switches set new standards.', 'available', 2, 'no'),
(18, 'Logitech G815 Lightsync RGB Mechanical Gaming Keyboard', '3729.00', '../css/images/storeProducts/keyboards/logitech_g815_lightsync_rgb_mechanical_keyboard_clicky_switch_v2.jpg', 'Keyboards', 'Lightsync technology provides state-of-the-art RGB lighting that syncs with content. Customize keys or create animations from 16.8M colors using Logitech G Hub software.', 'available', 2, 'no'),
(19, 'Corsair K100 AIR Wireless RGB Mechanical Gaming Keyboard', '6399.00', '../css/images/storeProducts/keyboards/corsair_k100_air_wireless_mechanical_gaming_keyboard_black_v1.jpg', 'Keyboards', 'The K100 AIR is an ultra-thin wireless gaming keyboard with stunning design and everyday productivity in an elegant brushed aluminum frame.', 'available', 2, 'no'),
(20, 'Gamdias AURA GK1 Wired Mechanical Gaming Keyboard', '699.00', '../css/images/storeProducts/keyboards/gamdias_aura_gk1_mechanical_keyboard_copper_v1.jpg', 'Keyboards', 'The Gamdias AURA GK1 offers tactile mechanical switches in Classic Bronze or Pure White, along with 10 Fn + Function keys for multimedia control. Enjoy versatile gaming.', 'available', 2, 'no'),
(21, 'Samsung 19\" HD Flat Monitor', '1249.00', '../css/images/storeProducts/monitors/samsung_19_inch_hd_flat_monitor_v1.jpg', 'Monitors', 'Experience vibrant visuals with this 19-inch HD flat monitor. Its sleek design and crisp display make it perfect for work or entertainment.', 'available', 3, 'no'),
(22, 'DAHUA LM24-B200S 24\" FHD Monitor', '1899.00', '../css/images/storeProducts/monitors/dahua_lm24_b200s_24_fhd_monitor_v1.jpg', 'Monitors', 'Enjoy stunning visuals on this 24-inch FHD monitor by DAHUA. With sharp clarity and vibrant colors, it\'s ideal for work and play.', 'available', 3, 'no'),
(23, 'Cooler Master GA241 24” Gaming Monitor', '2299.00', '../css/images/storeProducts/monitors/lcooler_master_ga241_24_fhd_gaming_monitor.jpg', 'Monitors', 'Elevate your gaming experience with the 24-inch Cooler Master GA241 monitor. Featuring fast refresh rates and vivid colors, it\'s designed for gamers.', 'available', 3, 'no'),
(24, 'AOC 24B3HM, 24 Inch Full HD 1920 x 1080 Pixels Ultra Slim Monitor', '2499.00', '../css/images/storeProducts/monitors/aoc_24b3hm_full_hd_led_monitor_v1.jpg', 'Monitors', 'Get immersed in Full HD visuals on this ultra-slim 24-inch AOC monitor. Its sharp display and slim profile enhance your workspace.', 'available', 3, 'no'),
(25, 'Dell 24 Monitor - P2422H', '3999.00', '../css/images/storeProducts/monitors/dell_p2422h_full_hd_monitor_v1.jpg', 'Monitors', 'Enhance productivity with the Dell 24 P2422H monitor. With its 24-inch screen and crisp resolution, it\'s perfect for work tasks and multimedia.', 'available', 3, 'yes'),
(26, 'MSI Optix G24C4 23.6\" FHD (1920 x 1080) 144Hz Curved Gaming Monitor', '4549.00', '../css/images/storeProducts/monitors/msi_optix_g24c4_144hz_gaming_monitor_v1.jpg', 'Monitors', 'Immerse yourself in gaming with MSI\'s 23.6-inch Optix G24C4. Its curved screen and high refresh rate deliver a captivating experience.', 'available', 3, 'no'),
(27, 'Acer Predator XB3 XB253QGP 24.5\" FHD 1920x1080 144Hz IPS Gaming Monitor', '4999.00', '../css/images/storeProducts/monitors/acer_predator_xb3_xb253qgp_144hz_gaming_monitor_v1.jpg', 'Monitors', 'Join the gaming elite with Acer\'s Predator XB253QGP. This 24.5-inch monitor boasts high refresh rates and IPS technology for smooth gameplay.', 'available', 3, 'no'),
(28, 'Dell Curved Gaming Monitor 27 Inch Curved Monitor', '5499.00', '../css/images/storeProducts/monitors/dell_s2722dgm_27_165hz_gaming_monitor_v1.jpg', 'Monitors', 'Dell\'s 27-inch curved gaming monitor offers an immersive experience. Its curved design and large screen make it ideal for gaming and entertainment.', 'available', 3, 'no'),
(29, 'MSI G27C4X 27\" Gaming Monitor', '5499.00', '../css/images/storeProducts/monitors/msi_g27c4x_27_gaming_monitor_v1.jpg', 'Monitors', 'Elevate your gaming setup with MSI\'s 27-inch G27C4X monitor. Its large display, fast refresh rate, and vibrant colors enhance gameplay.', 'available', 3, 'no'),
(30, 'Samsung Odyssey LS27AG550EUXXU 27\" AG550 1000R QHD Curved Gaming Monitor', '6499.00', '../css/images/storeProducts/monitors/samsung_odyssey_g5_27_165hz_curved_gaming_monitor_v1.jpg', 'Monitors', 'Dive into gaming like never before with Samsung\'s Odyssey LS27AG550EUXXU. Its 27-inch QHD curved screen provides an immersive gaming experience.', 'available', 3, 'no'),
(32, 'Lenovo IdeaPad Gaming 3 15IHU6 82K101Q0SA', '12499.00', '../css/images/storeProducts/laptops/lenov_ideapad_gaming_3_ryzen_5_gtx_1650_laptop_v1.jpg', 'Laptops', 'Unleash gaming prowess with Lenovo\'s IdeaPad Gaming 3. Equipped with a 1TB SSD, 16GB RAM, and NVIDIA GTX 1650 GPU, its built for immersive gaming experiences.', 'available', 4, 'no'),
(33, 'ASUS TUF Gaming F15 FX506HF', '14999.00', '../css/images/storeProducts/laptops/asus_tuf_gaming_f15_11th_gen_rtx_3050_laptop_v1.jpg', 'Laptops', 'Dominate gaming and content creation with the ASUS TUF Gaming F15. Featuring a 512GB SSD, 32GB RAM, and NVIDIA RTX 3060 GPU, it delivers top-tier performance.', 'available', 4, 'no'),
(34, 'MSI GF63 Thin 11SC 11th Gen Intel Core i7-11800H', '15999.00', '../css/images/storeProducts/laptops/msi_gf63_thin_10scsr_gtx_1650_ti_gaming_laptop_v1.jpg', 'Laptops', 'Elevate productivity with the MSI GF63 Thin. Boasting a 512GB SSD, 16GB RAM, and NVIDIA GTX 1650 GPU, it\'s designed for multitasking and gaming.', 'available', 4, 'no'),
(35, 'Lenovo IdeaPad Gaming 3 16IAH7 82SA00GMFU', '16999.00', '../css/images/storeProducts/laptops/lenovo_ideapad_gaming_3_16iah7_laptop_v1.jpg', 'Laptops', 'Experience powerful computing with Lenovo\'s IdeaPad Gaming 3. Featuring a 256GB SSD, 8GB RAM, and NVIDIA GTX 1650 GPU, it offers portability and performance.', 'available', 4, 'no'),
(36, 'Lenovo IdeaPad Gaming 3 15ACH6 82K200U3SA', '16999.00', '../css/images/storeProducts/laptops/lenovo_ideapad_gaming_3_ryzen_5_gtx_1650_laptop_v1.jpg', 'Laptops', 'Explore creativity with the Lenovo IdeaPad Gaming 3. Packed with a 1TB SSD, 32GB RAM, and AMD Radeon Pro 5500M GPU, it\'s a creative powerhouse.', 'available', 4, 'no'),
(37, 'Dell Inspiron G15 15 5525', '19999.00', '../css/images/storeProducts/laptops/dell_inspiron_g15_5525_ryzen_7_rtx_3070_ti_gaming_laptop_v2.jpg', 'Laptops', 'Boost productivity with the Dell Inspiron G15. Equipped with a 512GB SSD, 16GB RAM, and AMD Radeon RX 4500M GPU, it\'s built for reliable performance.', 'available', 4, 'no'),
(38, 'ASUS TUF Gaming F17 FX707ZC4', '20499.00', '../css/images/storeProducts/laptops/asus_tuf_gaming_f17_core_i7_rtx_3050_gaming_laptop_v1.jpg', 'Laptops', 'Discover gaming versatility with the ASUS TUF Gaming F17. Featuring a 512GB SSD, 32GB RAM, and NVIDIA GTX 1660 Ti GPU, it excels in gaming and productivity.', 'available', 4, 'no'),
(39, 'MSI GF63 Thin 12VE', '22999.00', '../css/images/storeProducts/laptops/msi_gf63_thin_12ve_core_i7_rtx_4050_gaming_laptop_v1.jpg', 'Laptops', 'Immerse in gaming glory with the MSI GF63 Thin. Armed with a 512GB SSD, 16GB RAM, and NVIDIA RTX 3060 GPU, it\'s designed for victory.', 'available', 4, 'no'),
(40, 'Victus by HP Laptop 16-s0000ni', '23999.00', '../css/images/storeProducts/laptops/hp_victus_ryzen_7_gaming_laptop_v1.jpg', 'Laptops', 'Unleash gaming excellence with the Victus by HP Laptop 16. Powered by a 512GB SSD, 16GB RAM, and NVIDIA RTX 3050 GPU, it\'s built for immersive gaming.', 'available', 4, 'no'),
(41, 'MSI CreatorPro X17 A13VM', '14999.00', '../css/images/storeProducts/laptops/msi_creatorpro_x17_a13vm_rtx_5000_ada_core_i9_workstation_laptop_v1.jpg', 'Laptops', 'Elevate gaming and productivity with the MSI CreatorPro X17. Featuring a 1TB SSD, 32GB RAM, and NVIDIA RTX 3080 GPU, it\'s a powerhouse for creators.', 'available', 4, 'yes'),
(42, 'Logitech H151', '309.00', '../css/images/storeProducts/headsets/logitech_h151_v1.jpg', 'Headsets', 'Enjoy clear calls and immersive audio with Logitech H151. Comfortable design and noise-cancelling microphone make it ideal for work and play.', 'available', 5, 'no'),
(43, 'Gamdias Eros', '349.00', '../css/images/storeProducts/headsets/gamdias_eros_v1.jpg', 'Headsets', 'Gamdias Eros delivers powerful sound and RGB lighting, enhancing your gaming experience. Ergonomic design ensures hours of comfortable play.', 'available', 5, 'no'),
(44, 'COUGAR DIVE', '599.00', '../css/images/storeProducts/headsets/cougar_dive_v01.jpg', 'Headsets', 'Dive into the action with COUGAR DIVE. Immerse yourself in high-quality sound and enjoy extended gaming sessions in comfort.', 'available', 5, 'no'),
(45, 'Turtle Beach Recon', '799.00', '../css/images/storeProducts/headsets/turtle_beach_recon_v01.jpg', 'Headsets', 'Turtle Beach Recon offers immersive gaming audio and crystal-clear communication. Lightweight and comfortable, it\'s perfect for long gaming sessions.', 'available', 5, 'no'),
(46, 'HyperX Cloud', '1199.00', '../css/images/storeProducts/headsets/hyperx_cloud_v01.jpg', 'Headsets', 'HyperX Cloud provides premium comfort and sound quality for gamers. Experience an immersive audio experience and hours of gaming without fatigue.', 'available', 5, 'no'),
(47, 'ROCCAT Khan', '1299.00', '../css/images/storeProducts/headsets/roccat_khan_v2.jpg', 'Headsets', 'ROCCAT Khan delivers precision sound and supreme comfort. Its high-quality audio and ergonomic design are a gamer\'s dream.', 'available', 5, 'no'),
(48, 'Steelseries ARCTIS', '1699.00', '../css/images/storeProducts/headsets/steelseries_arctis_v2.jpg', 'Headsets', 'Steelseries ARCTIS offers premium audio and a sleek design. Crystal-clear communication and comfort make it a top choice for gamers.', 'available', 5, 'no'),
(49, 'Corsair HS55', '2079.00', '../css/images/storeProducts/headsets/corsair_hs55_v01.jpg', 'Headsets', 'Corsair HS55 delivers immersive sound and clear communication. Comfortable design and durable construction make it perfect for gaming marathons.', 'available', 5, 'no'),
(50, 'SteelSeries Nova', '7599.00', '../css/images/storeProducts/headsets/steelseries_arctis_v1.jpg', 'Headsets', 'SteelSeries Nova offers precise tracking and customizable RGB lighting. Elevate your gaming experience with this sleek and responsive mouse.', 'available', 5, 'no'),
(51, 'Corsair VIRTUOSO', '5249.00', '../css/images/storeProducts/headsets/corsair_virtuoso_v2.jpg', 'Headsets', 'Corsair VIRTUOSO combines high-fidelity sound with premium comfort. Enjoy immersive gaming and audio experiences in style.', 'available', 5, 'no'),
(52, 'HHGears SM-115 Black', '2499.00', '../css/images/storeProducts/gaming_chairs/hhgears-sm-115-pu-leather-black-gaming-chair-1000px-v1-0002.jpg', 'Chairs', 'Sleek and stylish, the HHGears SM-115 Black is a high-performance gaming mouse designed for precision and comfort. Dominate your game in style.', 'available', 6, 'no'),
(53, 'HHGears SM-115 Red', '2499.00', '../css/images/storeProducts/gaming_chairs/hhgears-sm-115-pu-leather-black-red-gaming-chair-1000px-v1-0002.jpg', 'Chairs', 'Experience gaming excellence with the HHGears SM-115 Red mouse. Precision tracking, customizable lighting, and ergonomic design make it a gamer\'s dream.', 'available', 6, 'no'),
(54, 'Gamdias Aura GF1', '2699.00', '../css/images/storeProducts/gaming_chairs/gamdias-aura-gf1-gaming-chair-black-1500px-v1-0002.jpg', 'Chairs', 'Elevate your gaming setup with the Gamdias Aura GF1. Enjoy vibrant RGB lighting and comfortable keypresses for an immersive gaming experience.', 'available', 6, 'no'),
(55, 'HHGears Gaming Chair', '3999.00', '../css/images/storeProducts/gaming_chairs/hhgears-xl-500-pu-leather-black-red-gaming-chair-1000px-v1-00021.jpg', 'Chairs', 'The HHGears Gaming Chair combines ergonomic design with premium comfort. It\'s built for long gaming sessions, offering support and style in one package.', 'available', 6, 'no'),
(56, 'WARP Gr Series', '4299.00', '../css/images/storeProducts/gaming_chairs/warp-gr-series-ergonomic-gaming-chair-black-white-1000px-v0001.jpg', 'Chairs', 'WARP Gr Series offers cutting-edge gaming performance. With high refresh rates and responsive displays, immerse yourself in the world of gaming like never before.', 'available', 6, 'no'),
(57, 'Vertagear Gaming Chair', '5999.00', '../css/images/storeProducts/gaming_chairs/vertagear-pl4500-gaming-chair-black-green-1000px-v1-0002.jpg', 'Chairs', 'The Vertagear Gaming Chair redefines comfort and style. Experience ergonomic support and luxury materials, making every gaming session a pleasure.', 'available', 6, 'no'),
(58, 'WARP Noir Edition', '6599.00', '../css/images/storeProducts/gaming_chairs/warp-xd-series-noir-edition-gaming-chair-black-white-1000px-v00001.jpg', 'Chairs', 'The WARP Noir Edition delivers a seamless gaming experience. Dive into your favorite titles with high-quality graphics and exceptional performance.', 'available', 6, 'no'),
(59, 'noblechairs DOOM Edition', '8999.00', '../css/images/storeProducts/gaming_chairs/noblechairs-hero-series-gaming-chair-doom-edition-1000px-v1-0002.jpg', 'Chairs', 'Unleash your inner demon with the noblechairs DOOM Edition. Its devilish design and exceptional comfort make it a must-have for DOOM fans.', 'available', 6, 'no'),
(60, 'noblechairs Elder Scrolls V', '9599.00', '../css/images/storeProducts/gaming_chairs/noblechairs-the-elder-scrolls-v-skyrim-10th-anniversary-gaming-chair-1000px-v10002.jpg', 'Chairs', 'Immerse yourself in the world of Elder Scrolls V with this noblechairs edition. Enjoy epic adventures in comfort and style.', 'available', 6, 'no'),
(61, 'noblechairs HERO Series', '11999.00', '../css/images/storeProducts/gaming_chairs/noblechairs-hero-series-real-leather-gaming-chair-black-1000px-v1-0001.jpg', 'Chairs', 'The noblechairs HERO Series chair is designed for champions. It offers unrivaled ergonomic support and luxurious materials for the ultimate gaming experience.', 'available', 6, 'no');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'mat', 'matthew@example.com', '$2y$10$VIX15L/XAsHGPpgbPWA3Jucr/pFBNdTJs4LDXeMrgXWmmat.DeLNS', 'customer');

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
