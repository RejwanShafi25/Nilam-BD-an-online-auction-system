-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2024 at 03:50 AM
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
-- Database: `nilam2`
--

-- --------------------------------------------------------

--
-- Table structure for table `auction_items`
--

CREATE TABLE `auction_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `starting_price` decimal(14,2) NOT NULL,
  `current_bid` decimal(14,2) DEFAULT NULL,
  `end_time` datetime NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 3 COMMENT '1 : Sold | 2 : Approved | 3: Waiting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auction_items`
--

INSERT INTO `auction_items` (`id`, `title`, `description`, `starting_price`, `current_bid`, `end_time`, `seller_id`, `created_at`, `updated_at`, `status`) VALUES
(19, 'Toyota LandCruiser 300 (LC300)', 'The 2022 Toyota Land Cruiser 300 armored all-wheel drive SUV is available to order. 10-speed automatic transmission, 3.5 liter (V6) gasoline engine, 409 hp. Dimensions: 4970 x 2006 x 1930 mm, wheelbase: 2844 mm.   Armor level: BR6 Engine bay armoring  Entire perimeter protection of the passenger compartment  Protection for battery and electronic control module  Reinforced door hinges and other critical structure points  Reinforced suspension  Runflat devices Light-weight armoring package Siren/PA/Intercom system Heavy duty brake system and components Emergency lights system Fire suppression system Heavy duty wheels The Toyota Land Cruiser 300 withstands the toughest situations and most challenging terrain, providing unmatched mobility in the field. Armoured to BR6 level, the Toyota Land Cruiser provides 360-degree protection from high-powered assault rifles and blasts up to two DM51 hand grenades.', 5000000.00, 5000001.00, '2024-09-21 16:30:00', 3, '2024-09-20 07:45:47', '2024-09-20 15:32:38', 2),
(20, 'House [10 Khata]', 'House with 10,000 Sqft  4 bedroom  4 bathroom  Almost new house with 10 khata land  Location: Green Road Green Garden Private Area', 35000000.00, NULL, '2024-09-21 15:40:00', 3, '2024-09-20 07:49:05', '2024-09-20 07:53:45', 2),
(21, 'Sea painting', 'Acrylic painting Canvus 30/40', 6130.00, NULL, '2024-09-26 19:49:00', 3, '2024-09-20 07:49:34', '2024-09-20 07:53:46', 2),
(22, '2003 Toyota Spacio Octane Fresh Condition', 'The Spacio comes with the seal of reliability that is the hallmark of all Toyota vehicles.A proper maintenance cycle can ensure that the Spacio can last for many years without issues. Furthermore, the vehicle is relatively easy and inexpensive to maintain.Toyota balances dependable vehicles with innovative technology, though this may affect long-term reliability.  Brand: Toyota Model: Spacio Trim / Edition: G  Year of Manufacture:2005 Registration year:2009 Condition: Used Transmission: Automatic Body type: Estate Fuel type: Octane Engine capacity:1,500 cc Kilometers run: 56320 km  Options :All Option Auto, Fresh interior, Built-in super original sound system. Original headlight and backlight with Fog lamp. Excellent AC Performance. Engine condition Suspension is also good, EBD, 4 Air Bag, 4 ABS,2 Disk Brake. Tilt Power Steering. Central Lock, UVS & Tempered Glass. Super performance engine. Disk Brake. Central Lock. Original Japanese Toyota Rim With New Tire, No any accidental history. All Papers are up-to-date', 850000.00, NULL, '2024-09-26 19:49:00', 3, '2024-09-20 07:50:29', '2024-09-20 07:53:47', 2),
(24, 'IPad Air 5', 'iPad Air 5th Generation M1 64 GB  iPad OS 17.0.2   Charge time - 136 Battery health - 96%  -- 3U Tools.  Full box with charger and cash memo available.  Apple Pencil 2nd Generation (10k) will be sold separately.  No dent. No scratch. Used with utmost care.   Hardly use this device.  Bought from Apple Gadgets last year.', 55500.00, NULL, '2024-09-27 20:14:00', 6, '2024-09-20 08:18:50', '2024-09-20 08:21:33', 2),
(25, '2024 Brand New- 2024 𝙈𝙤𝙙𝙚𝙡 Brand & Grade: 𝙈𝙚𝙧𝙘𝙚𝙙𝙚𝙨-𝘼𝙈𝙂 𝙎 63 𝙀 𝙋𝙚𝙧𝙛𝙤𝙧𝙢𝙖𝙣𝙘𝙚 𝙉𝙞𝙜𝙝𝙩 𝙀𝙙𝙞𝙩𝙞𝙤𝙣.. Fuel type - 𝙋𝙚𝙩𝙧𝙤𝙡 𝙋𝙡𝙪𝙜-𝙄𝙣 𝙃𝙮𝙗𝙧𝙞𝙙 Cylinder - V8 Engine size - 3,982 cc Country of Origin: UK. amg s 63', '♦ 𝙁𝙤𝙧 𝙎𝙖𝙡𝙚 ♦   𝙀𝙭𝙘𝙡𝙪𝙨𝙞𝙫𝙚 𝙊𝙛𝙛𝙚𝙧: 2024 Mercedes-AMG S 63 E Performance Night Edition in Golden Metallic.  Brand New- 2024 𝙈𝙤𝙙𝙚𝙡 Brand & Grade: 𝙈𝙚𝙧𝙘𝙚𝙙𝙚𝙨-𝘼𝙈𝙂 𝙎 63 𝙀 𝙋𝙚𝙧𝙛𝙤𝙧𝙢𝙖𝙣𝙘𝙚 𝙉𝙞𝙜𝙝𝙩 𝙀𝙙𝙞𝙩𝙞𝙤𝙣.. Fuel type - 𝙋𝙚𝙩𝙧𝙤𝙡 𝙋𝙡𝙪𝙜-𝙄𝙣 𝙃𝙮𝙗𝙧𝙞𝙙 Cylinder - V8 Engine size - 3,982 cc Country of Origin: UK.  This high-performance plug-in hybrid sedan features a 4.0-liter V8 Biturbo engine combined with an electric motor, delivering an astonishing 791 horsepower and a 0-60 mph time of just 3.2 seconds. With AMG’s cutting-edge technology and the supreme comfort of the S-Class, this vehicle redefines automotive excellence.  Unit Price: Negotiable.   𝙋𝙧𝙚-𝙊𝙧𝙙𝙚𝙧 𝙜𝙤𝙞𝙣𝙜 𝙤𝙣. Delivery Time- 65 𝘿𝙖𝙮𝙨 𝙛𝙧𝙤𝙢 𝙩𝙝𝙚 𝙙𝙖𝙩𝙚 𝙤𝙛 𝙘𝙤𝙣𝙛𝙞𝙧𝙢𝙖𝙩𝙞𝙤𝙣.', 17850000.00, NULL, '2024-09-27 20:19:00', 6, '2024-09-20 08:19:20', '2024-09-20 08:21:35', 2),
(27, 'Gulshan 1 FLAT SALE 3327 SQFT', 'Luxurious Home Auction in Gulshan, Dhaka – Your Dream Awaits!  Step into a world of elegance with this stunning 3,327 square foot home located in the prestigious Gulshan neighborhood of Dhaka. Known for its affluent lifestyle and vibrant community, Gulshan offers the perfect blend of luxury and convenience.  Key Features: Spacious Design: This exquisite property boasts generous living spaces, including a bright and airy living room, a modern kitchen, and multiple bedrooms, all designed with high-end finishes.  Prime Location: Nestled in one of Dhaka\'s most sought-after areas, you’ll enjoy easy access to upscale shopping, fine dining, and top-notch schools, making it perfect for families and professionals alike.  Luxurious Amenities: Experience comfort with features such as a beautifully landscaped garden, private parking, and state-of-the-art security systems that ensure peace of mind.  Ideal for Entertaining: The open-concept layout is perfect for hosting gatherings, while the serene outdoor space provides a tranquil retreat from the bustling city.  Investment Opportunity: With property values in Gulshan consistently on the rise, this home is not just a beautiful residence but also a smart investment.  Don’t miss this rare opportunity to own a piece of luxury in Gulshan! Join us for the auction and take the first step toward making this dream home yours. Contact us today for more details and to schedule a viewing.  Your New Life Awaits in Gulshan!', 4500000.00, NULL, '2024-09-23 20:23:00', 6, '2024-09-20 08:30:44', '2024-09-20 08:32:15', 2),
(28, 'Flat for sell at Bashundhara', 'Golden Opportunity Get a discount in this crisis moment!  In the Bashundhara Residential E Block, we have 100% ready flats in the Rupayan condominium project. You can start living in your chosen flat right now.  The project features 40% green area, along with:  Playground Mosque Swimming Pool Gym Supermarket Medicine Shop Convention Hall Park Salon Generator High Security Developer: Rupayan Housing Estate Ltd.', 1100000.00, 1100003.00, '2024-09-27 20:31:00', 6, '2024-09-20 08:31:31', '2024-09-20 09:18:47', 2),
(29, 'HI-TECH Sofa Adryel (Full Set)', 'SIZE & FIT: L-1420 x W– 910 x H– 980 Color: Antique Color Materials: Solid Beech wood Fabric: Upholstry', 118000.00, NULL, '2024-09-25 20:31:00', 6, '2024-09-20 08:32:09', '2024-09-20 08:32:18', 2),
(31, 'IELTS Book', 'IELTS Academic Book List  1.Cambridge lelts Academic official practice Book 9-18 with answer  2.Cambridge lelts Academic practice book Bangla solution and Explanation  3.Makkar lelts writing  Rachel Mitchell speaking, reading, writing and listening strategy  Cambridge lelts consultants Band 9   6.Simon Reading, writing and speaking  7.Tarik Hasan secret band 8 Speaking, writing, reading and listening   2 Box speaking qué card  Location: House no 23, Road 16 Sector 12 Uttara Dhaka 1230. Contact number:[hidden information] price Negotiable.', 1600.00, NULL, '2024-09-27 23:03:00', 6, '2024-09-20 17:04:11', '2024-09-20 17:06:29', 2),
(32, 'Logitech G402 Mouse', 'An exclusive gaming mouse', 6000.00, 6001.00, '2024-09-23 23:04:00', 6, '2024-09-20 17:04:53', '2024-09-21 01:16:29', 2),
(33, 'Casio FX991 ES', 'Casio Calculator', 1600.00, NULL, '2024-09-20 23:08:00', 6, '2024-09-20 17:06:05', '2024-09-20 17:40:12', 2),
(35, 'moo', 'cow', 1600.00, 2500.00, '2024-09-20 23:45:00', 3, '2024-09-20 17:42:55', '2024-09-20 17:43:35', 1),
(36, 'Ceramic Vase Pack 2, White Modern Bud Vase , Ceramic Modern Vase Decor , Sculpture Decor , Fire Place Decoration , Mid Century Modern Drip', 'Vase', 2000.00, 10020.00, '2024-09-21 02:52:00', 3, '2024-09-20 20:26:14', '2024-09-20 20:53:19', 1),
(39, 'Casio MTP-B145D-9AVDF Quartz Analog Dial Stainless Steel Unisex', 'Let\'s meet up with our brand new and latest collection. Introducing new watch series for You. Simple, easy-to-read face designs come in handy during work and hang out. These models are waterproof under normal daily use, which means you can wear them without a worry in the rain or when you wash your hands. This model is much gorgeous and comfortable.', 8000.00, 90000.00, '2024-09-21 07:28:00', 3, '2024-09-21 01:26:39', '2024-09-21 01:29:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auction_item_category`
--

CREATE TABLE `auction_item_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auction_item_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auction_item_category`
--

INSERT INTO `auction_item_category` (`id`, `auction_item_id`, `category_id`, `created_at`, `updated_at`) VALUES
(19, 19, 1, NULL, NULL),
(20, 20, 9, NULL, NULL),
(21, 21, 3, NULL, NULL),
(22, 22, 1, NULL, NULL),
(24, 24, 11, NULL, NULL),
(25, 25, 1, NULL, NULL),
(27, 27, 9, NULL, NULL),
(28, 28, 9, NULL, NULL),
(29, 29, 7, NULL, NULL),
(31, 31, 2, NULL, NULL),
(32, 32, 11, NULL, NULL),
(33, 33, 11, NULL, NULL),
(35, 35, 3, NULL, NULL),
(36, 36, 4, NULL, NULL),
(39, 39, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bid_records`
--

CREATE TABLE `bid_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auction_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(14,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bid_records`
--

INSERT INTO `bid_records` (`id`, `auction_id`, `customer_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 28, 5, 1100002.00, '2024-09-20 09:01:44', '2024-09-20 09:01:44'),
(2, 28, 5, 1100003.00, '2024-09-20 09:18:47', '2024-09-20 09:18:47'),
(3, 19, 5, 5000001.00, '2024-09-20 15:32:38', '2024-09-20 15:32:38'),
(6, 35, 4, 1800.00, '2024-09-20 17:43:18', '2024-09-20 17:43:18'),
(7, 35, 5, 2500.00, '2024-09-20 17:43:35', '2024-09-20 17:43:35'),
(8, 36, 5, 10020.00, '2024-09-20 20:50:22', '2024-09-20 20:50:22'),
(9, 32, 5, 6001.00, '2024-09-21 01:16:29', '2024-09-21 01:16:29'),
(10, 39, 5, 90000.00, '2024-09-21 01:27:08', '2024-09-21 01:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Vehicles', NULL, NULL),
(2, 'Book', NULL, NULL),
(3, 'Painting', NULL, NULL),
(4, 'Sculpture', NULL, NULL),
(5, 'Gemstone', NULL, NULL),
(6, 'Jewelery', NULL, NULL),
(7, 'Furniture', NULL, NULL),
(8, 'Collectibles', NULL, NULL),
(9, 'Real Estate', NULL, NULL),
(10, 'Cloth', NULL, NULL),
(11, 'Technology', NULL, NULL),
(12, 'Watch', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auction_item_id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `auction_item_id`, `url`, `created_at`, `updated_at`) VALUES
(38, 19, 'auction_images/cvFulCDWE9CW6zRzVypGt72NqRNfetq0kWUhjXTA.jpg', '2024-09-20 07:45:47', '2024-09-20 07:45:47'),
(39, 19, 'auction_images/LZUvlBTfoeSlM9mvcm37elX9KYh0Q0mp0CDiV8Mx.jpg', '2024-09-20 07:45:47', '2024-09-20 07:45:47'),
(40, 19, 'auction_images/rFYqF1n8sFVXUNRg9SaALA6OOp55H6p6V5oqtoYq.jpg', '2024-09-20 07:45:47', '2024-09-20 07:45:47'),
(41, 20, 'auction_images/m87RNs3z33Pb5TPbWSabdBrhPvhKbx52esqbQJhQ.png', '2024-09-20 07:49:05', '2024-09-20 07:49:05'),
(42, 20, 'auction_images/KsKEKm2ZDLeeS6pbgKaAv0xLg4x4oWmvsGtEowFK.png', '2024-09-20 07:49:05', '2024-09-20 07:49:05'),
(43, 20, 'auction_images/krWstq3PxZ4Ygg9nryeKVCXXYgvDjndgZt5DJ7mD.png', '2024-09-20 07:49:05', '2024-09-20 07:49:05'),
(44, 21, 'auction_images/Hh5pxgg0u2VZoPyvagTvxYVnEtPnzX81VQ2dfh30.jpg', '2024-09-20 07:49:34', '2024-09-20 07:49:34'),
(45, 22, 'auction_images/dyyTTwXyIhFh4xZQ9DS0wZgxjDp4xJqcKukH6xms.png', '2024-09-20 07:50:29', '2024-09-20 07:50:29'),
(47, 24, 'auction_images/mX8MdAPzcmL8HwK2XlFDuOgAQJ8EryEA8lMnqI9s.jpg', '2024-09-20 08:18:50', '2024-09-20 08:18:50'),
(48, 24, 'auction_images/qoXioAs6XzsCSGYLidyQlExJHHgCX9mNzcTFh4hL.jpg', '2024-09-20 08:18:50', '2024-09-20 08:18:50'),
(49, 24, 'auction_images/fFJR360W19p5Vslo5FsfF1kVwYQnepbAszq4BvsQ.jpg', '2024-09-20 08:18:50', '2024-09-20 08:18:50'),
(50, 25, 'auction_images/SRn7N5dgNyEcxMLGjCRmq9oW5O2bJgc0tHErztJR.jpg', '2024-09-20 08:19:20', '2024-09-20 08:19:20'),
(51, 25, 'auction_images/FfQQKjvGQNkNRw6H6iHVGLrfHzRFU17LaN8zncjD.jpg', '2024-09-20 08:19:20', '2024-09-20 08:19:20'),
(52, 25, 'auction_images/70uQM1ugFJXeO11hXSojiCLLRn4AiEtnGoWCgJV7.jpg', '2024-09-20 08:19:20', '2024-09-20 08:19:20'),
(56, 27, 'auction_images/I48qIrHcwry9PYulgGsnsZxlH4vYPw3NUke0EZcx.jpg', '2024-09-20 08:30:44', '2024-09-20 08:30:44'),
(57, 27, 'auction_images/8SYUzf3wbs1wSo9De3AqDib7FMF4wip9jAeeqOCN.jpg', '2024-09-20 08:30:44', '2024-09-20 08:30:44'),
(58, 27, 'auction_images/i5SaK9K58OMUUGmNGPLFc51LnEPzeqFw1JwoDcqn.jpg', '2024-09-20 08:30:44', '2024-09-20 08:30:44'),
(59, 28, 'auction_images/xQhC6fWeBOdw7xT4e20ssSUalCXAfI6IVAPb0Mhu.jpg', '2024-09-20 08:31:31', '2024-09-20 08:31:31'),
(60, 28, 'auction_images/ruwDXcPfxLqxFsjonCO3qjjffB1KbY17nnVBLlbU.jpg', '2024-09-20 08:31:31', '2024-09-20 08:31:31'),
(61, 28, 'auction_images/WcJQ3cV8lBlgpeFZ6KOCTItJ7M9iKo0bl88IPQcH.jpg', '2024-09-20 08:31:31', '2024-09-20 08:31:31'),
(62, 29, 'auction_images/k7YnNDSfYb9bW09XKBr8bTQTkkKyAQq2XXBMEVvM.jpg', '2024-09-20 08:32:09', '2024-09-20 08:32:09'),
(63, 29, 'auction_images/hWHzvTm04PzkpWouB961pFygpW2d2AWU4NA0IjIp.jpg', '2024-09-20 08:32:09', '2024-09-20 08:32:09'),
(66, 31, 'auction_images/kygWNQ1fa3HpTWXHDjVQMtB8rXN5hPgagS6oUB0z.png', '2024-09-20 17:04:12', '2024-09-20 17:04:12'),
(67, 32, 'auction_images/nnzyLuxxJwB0Qc4crwmcFMep3pC38Op84szJZYgp.jpg', '2024-09-20 17:04:53', '2024-09-20 17:04:53'),
(68, 32, 'auction_images/XZZ1Jo23JXcRtc6S9iQ9tnwdpX0SRa97G6attShF.jpg', '2024-09-20 17:04:53', '2024-09-20 17:04:53'),
(69, 32, 'auction_images/YVtada6YdAtCxmyiQ9RWZlha30xOhYqp3ZEgDvgY.jpg', '2024-09-20 17:04:53', '2024-09-20 17:04:53'),
(70, 33, 'auction_images/6Dp72Fi3AOKsaLxTl6z05CiShWBaNsq53Eb010SS.webp', '2024-09-20 17:06:05', '2024-09-20 17:06:05'),
(71, 33, 'auction_images/nPlRRGbamX4Je38dZpW3tNWEY3mipSkNutNSxDbl.webp', '2024-09-20 17:06:05', '2024-09-20 17:06:05'),
(73, 35, 'auction_images/jAJNqbUyfIVikFp6gelszJkXiVUJL2IBrR5bLjYy.jpg', '2024-09-20 17:42:55', '2024-09-20 17:42:55'),
(74, 36, 'auction_images/wAcJJEdlya7AqjIveyQW3nPuthSYGcBpTZSNhpej.webp', '2024-09-20 20:26:14', '2024-09-20 20:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_06_125533_create_google_id', 1),
(5, '2024_09_06_125641_add_avatars_to_users', 1),
(6, '2024_09_11_190636_create_auctions_table', 1),
(7, '2024_09_13_170855_add_status_to_auction_items_table', 1),
(8, '2024_09_13_172827_create_auction_item_category_table', 1),
(9, '2024_09_13_173235_create_auction_item_images', 1),
(10, '2024_09_18_174454_update_image_urls', 1),
(11, '2024_09_19_125015_create_bid_records_table', 2),
(12, '2024_09_20_111520_add_address_to_users_table', 3),
(13, '2024_09_21_001451_create__payment_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `auction_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(14,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `auction_id`, `amount`, `payment_method`, `token`, `status`, `created_at`, `updated_at`) VALUES
(2, 5, 35, 2500.00, 'cash_on_delivery', 'FFNErN5ppEb7x25', 'approved', '2024-09-20 20:03:19', '2024-09-21 01:04:27'),
(3, 5, 36, 10020.00, 'cash_on_delivery', 'eKPWS2BPrDoy0g6', 'approved', '2024-09-20 20:53:19', '2024-09-21 01:04:29'),
(4, 5, 39, 90000.00, 'cash_on_delivery', 'PV1xpGFHIgCWNrJ', 'pending', '2024-09-21 01:29:49', '2024-09-21 01:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0LE1wAkzvcOGVcHB7oQV5TND5HbPiDpUofKzOjWp', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiV25FM3owWVZLVm5yY0J5ODVId3RBMnZGUTlza1pHQUE1dFE3c1R2RyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wYXltZW50LWFwcHJvdmFsIjt9czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1726882203),
('5oLDcApQUo3SQ8F8NrQfSzUowmlQYdP2ExpfjgXu', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTTY1Tk00alNWdmtmTjNjV3NraDF6SFBvbkVOQzBOQ2lYUHBMNnZ5SiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTt9', 1726883433),
('gNIOgjwDIz6h6EUQ1wfVjYh7r5Ioy2NhP9LiirXy', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibXIzQWhWUEM2azROTmdUbUg2b0p0VzFDdEFYbVo3c1IxYklYVk0ySSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvc2VsbGVyL2VkaXQtaXRlbS1yZWNvcmRzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1726877109),
('RTQHL37Y8rNnHX6QTDKjcanSHHqJzZLTaPYxiPFx', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTmRhUXpLR2hjdUVNbzQ0TUhrVVVaM2N1MWlRS01mUFpGVk5lMTRrdCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvc2VsbGVyL3NvbGQtaXRlbS1yZWNvcmRzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Njt9', 1726878120),
('UFsKeoAUhOXL3ZDrEixuYLGUtq55L4iU9ldgxzIU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieDlieE1hajFFaDBEWUFRd2FUdWxOcDltSHNRaG5URVlyUzVFUjJDVSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1726882196);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 3 COMMENT '1 : Seller | 2 : Admin | 3: Normal',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `google_id`, `avatar`, `address`) VALUES
(1, 'Rejwan Shafi', 'Rejwan', 'rejwan.shafi@gmail.com', NULL, '$2y$12$2FROJEWZ/TqGuMwsW3oMaOustw6ytOUaLIyV.fnc7e0Ey.oVAqiUa', 2, NULL, '2024-09-19 10:24:55', '2024-09-19 10:24:55', NULL, NULL, NULL),
(2, 'Rejwan', 'Niloy', 'rejwanshafi.study@gmail.com', NULL, '$2y$12$fE.kgk0NQrejBQH/i3FJ0OPDs0olMuUm2fWqgWylWFbXqX8mobrC6', 3, NULL, '2024-09-19 10:27:33', '2024-09-20 19:50:20', NULL, 'NULL', 'Dhanmondi'),
(3, 'Sopnil Roy Niloy', 'Niloy', 'niloy@gmail.com', NULL, '$2y$12$tl1QFCZtOzv0aKCTtNkAneWrUMmQkbx9mFEVkWBqpd41v2xZK6SDa', 1, NULL, '2024-09-19 10:28:08', '2024-09-19 10:28:08', NULL, NULL, NULL),
(4, 'Homairah Ferdousia', 'Homaira', 'homaira@gmail.com', NULL, '$2y$12$Ov39rDEQvVtcuT9IPMhBROy5LHRTxkv0P7tnGpgoK5AR3VNmkw502', 3, NULL, '2024-09-19 10:28:45', '2024-09-19 10:28:45', NULL, NULL, NULL),
(5, 'Afif Rayhan Pranto', 'Pranto5', 'pranto@gmail.com', NULL, '$2y$12$gn..ddZaF9KWUT4LOrpdmur16/Fm.VSb67A571rAYagsfCsUMylw.', 3, NULL, '2024-09-19 10:29:24', '2024-09-20 19:39:47', NULL, '1726860966.jpg', 'Mirpur 12'),
(6, 'Kawsar Rahman', 'Kawsar12', 'kawsar@gmail.com', NULL, '$2y$12$1B8IAWtnt80XQVhHXN/Oj.u.rUtWP9FIr7cU/zQavBBLYht42vToO', 1, NULL, '2024-09-19 10:42:38', '2024-09-19 10:42:38', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auction_items`
--
ALTER TABLE `auction_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auction_items_seller_id_foreign` (`seller_id`);

--
-- Indexes for table `auction_item_category`
--
ALTER TABLE `auction_item_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auction_item_category_auction_item_id_foreign` (`auction_item_id`),
  ADD KEY `auction_item_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `bid_records`
--
ALTER TABLE `bid_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bid_records_customer_id_foreign` (`customer_id`),
  ADD KEY `bid_records_auction_id_foreign` (`auction_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_auction_item_id_foreign` (`auction_item_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`),
  ADD KEY `payments_auction_id_foreign` (`auction_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auction_items`
--
ALTER TABLE `auction_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `auction_item_category`
--
ALTER TABLE `auction_item_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `bid_records`
--
ALTER TABLE `bid_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auction_items`
--
ALTER TABLE `auction_items`
  ADD CONSTRAINT `auction_items_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auction_item_category`
--
ALTER TABLE `auction_item_category`
  ADD CONSTRAINT `auction_item_category_auction_item_id_foreign` FOREIGN KEY (`auction_item_id`) REFERENCES `auction_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auction_item_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bid_records`
--
ALTER TABLE `bid_records`
  ADD CONSTRAINT `bid_records_auction_id_foreign` FOREIGN KEY (`auction_id`) REFERENCES `auction_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bid_records_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_auction_item_id_foreign` FOREIGN KEY (`auction_item_id`) REFERENCES `auction_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_auction_id_foreign` FOREIGN KEY (`auction_id`) REFERENCES `auction_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
