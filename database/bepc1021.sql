-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2015 at 12:13 AM
-- Server version: 5.6.17-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bepc`
--

-- --------------------------------------------------------

--
-- Table structure for table `barcode`
--

CREATE TABLE IF NOT EXISTS `barcode` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `barcodekey` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imageurl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barcode_product_id_unique` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `barcode`
--

INSERT INTO `barcode` (`id`, `barcodekey`, `product_id`, `imageurl`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '0000001', '1', 'http://localhost:8000/img-barcode/0000001.png', '2015-10-07 19:42:59', '2015-10-07 19:42:59', NULL),
(2, '0000002', '2', 'http://localhost:8000/img-barcode/0000002.png', '2015-10-07 19:43:05', '2015-10-07 19:43:05', NULL),
(3, '0000003', '3', 'http://localhost:8000/img-barcode/0000003.png', '2015-10-07 19:43:09', '2015-10-07 19:43:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `usergroup_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `barcode_id` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `customer_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE IF NOT EXISTS `ingredient` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `recipe_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ingredient_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`id`, `recipe_id`, `name`, `description`, `item_id`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, '18', 'Pet bottle for ', '', '1', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(5, '18', 'Pail for ', '', '2', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(6, '18', 'Raw Egg for ', '', '3', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(7, '19', 'Pet bottle for Recipe for Pasteurized Luqied whole egg', '', '1', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(8, '19', 'Raw Egg for Recipe for Pasteurized Luqied whole egg', '', '3', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventorylog`
--

CREATE TABLE IF NOT EXISTS `inventorylog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `proccess` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fired_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `param` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `inventorylog`
--

INSERT INTO `inventorylog` (`id`, `proccess`, `action`, `user_id`, `user_name`, `message`, `fired_at`, `field`, `param`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '', 'add', '2015100432147', 'John Kevin De Jesus Peralta', 'EloquentItemRepository:John Kevin De Jesus Peralta proccesed induct doing add changing Quantity value to 500', '', 'Quantity', '500', '2015-10-03 03:08:45', '2015-10-03 03:08:45', NULL),
(2, 'induct', 'add', '2015100432147', 'John Kevin De Jesus Peralta', 'EloquentItemRepository:John Kevin De Jesus Peralta proccesed induct doing add changing Quantity value to 50', 'EloquentItemRepository', 'Quantity', '50', '2015-10-03 03:36:17', '2015-10-03 03:36:17', NULL),
(3, 'induct', 'deposit', '2015100432147', 'John Kevin De Jesus Peralta', 'EIR:John Kevin De Jesus Peralta proccesed induct doing deposit changing Quantity value to 100', 'EIR', 'Quantity', '100', '2015-10-03 03:37:56', '2015-10-03 03:37:56', NULL),
(4, 'induct', 'deposit', '2015100432147', 'John Kevin De Jesus Peralta', 'EIR:John Kevin De Jesus Peralta proccesed induct doing deposit changing Quantity value to 4950', 'EIR', 'Quantity', '4950', '2015-10-03 03:38:51', '2015-10-03 03:38:51', NULL),
(5, 'induct', 'withdraw', '2015100432147', 'John Kevin De Jesus Peralta', 'EIR:John Kevin De Jesus Peralta proccesed induct doing withdraw changing Quantity value to 10000', 'EIR', 'Quantity', '10000', '2015-10-03 03:39:14', '2015-10-03 03:39:14', NULL),
(6, 'induct', 'deposit', '2015100432147', 'John Kevin De Jesus Peralta', 'EIR:John Kevin De Jesus Peralta proccesed induct doing deposit changing Quantity value to 10', 'EIR', 'Quantity', '10', '2015-10-03 03:39:34', '2015-10-03 03:39:34', NULL),
(7, 'induct', 'withdraw', '2015100432147', 'John Kevin De Jesus Peralta', 'EIR:John Kevin De Jesus Peralta proccesed induct doing withdraw changing Quantity value to 10', 'EIR', 'Quantity', '10', '2015-10-03 03:39:56', '2015-10-03 03:39:56', NULL),
(8, 'induct', 'deposit', '2015100432147', 'John Kevin De Jesus Peralta', 'EIR:John Kevin De Jesus Peralta proccesed induct doing deposit changing Quantity value to 1', 'EIR', 'Quantity', '1', '2015-10-03 03:40:10', '2015-10-03 03:40:10', NULL),
(9, 'induct', 'withdraw', '2015100436107', 'Registration Registration Registration', 'EIR:Registration Registration Registration proccesed induct doing withdraw changing Quantity value to 500', 'EIR', 'Quantity', '500', '2015-10-07 21:11:33', '2015-10-07 21:11:33', NULL),
(10, 'induct', 'deposit', '2015100436107', 'John Kevin De jesus Peralta', 'EIR:John Kevin De jesus Peralta proccesed induct doing deposit changing Quantity value to 10', 'EIR', 'Quantity', '10', '2015-10-17 07:06:58', '2015-10-17 07:06:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(8) NOT NULL,
  `alert_quantity` int(11) NOT NULL DEFAULT '10',
  `safe_quantity` int(11) NOT NULL DEFAULT '10',
  `imageurl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `itemgroup_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `description`, `quantity`, `alert_quantity`, `safe_quantity`, `imageurl`, `supplier_id`, `created_at`, `updated_at`, `deleted_at`, `itemgroup_id`) VALUES
(1, 'Pet bottle', 'Used to pack small quantity of products', 11, 10, 10, '', '', '0000-00-00 00:00:00', '2015-10-17 07:06:58', NULL, 2),
(2, 'Pail', 'Used to pack large quantity of product', 1, 10, 10, '', '', '0000-00-00 00:00:00', '2015-10-07 21:42:57', NULL, 2),
(3, 'Raw Egg', '', 0, 10, 10, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 3),
(4, 'Muriatic Acid', 'Used to clean the floors of the plant', 1, 10, 10, '', '', '2015-10-01 07:56:18', '2015-10-07 21:45:54', NULL, 1),
(5, 'Zonrox', 'Used to clean the floor of the plant\r\n', 9, 10, 10, '', '', '2015-10-02 22:30:02', '2015-10-07 21:39:49', NULL, 1),
(21, 'Marlboro Lights', '', 1, 10, 10, '', '', '2015-10-07 21:14:30', '2015-10-07 21:14:30', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `itemgroup`
--

CREATE TABLE IF NOT EXISTS `itemgroup` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `formula` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `itemgroup`
--

INSERT INTO `itemgroup` (`id`, `name`, `description`, `formula`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Chemical Agents', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 'Packaging Materials', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 'Raw Materials', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1),
('2015_09_19_115018_create_settings_table', 1),
('2015_09_19_115027_create_barcode_table', 1),
('2015_09_19_153943_create_product_table', 1),
('2015_09_19_153952_create_ingredient_table', 1),
('2015_09_19_154242_create_recipe_table', 1),
('2015_09_20_134610_create_item_table', 1),
('2015_09_23_114622_create_order_table', 1),
('2015_09_23_114631_create_orderdetails_table', 1),
('2015_09_27_094343_create_user_table', 1),
('2015_09_27_094533_create_usergroup_table', 1),
('2015_09_29_133337_create_user_barcode', 1),
('2015_09_29_133347_create_user_id_card', 1),
('2015_10_01_153728_create_item_group_table', 2),
('2015_10_03_101808_create_inventorylog_table', 3),
('2015_10_04_093542_create_user_photo_table', 4),
('2015_10_04_093805_create_user_privilege_table', 4),
('2015_10_04_093947_create_privilege_table', 4),
('2015_10_05_200752_create_querylog_table', 5),
('2015_10_09_020606_create_user_contact_info', 6),
('2015_10_09_020646_create_item_supplier_info', 6),
('2015_10_09_021350_create_user_address', 6),
('2015_10_09_021829_crete_supplier_address', 6),
('2015_10_09_021850_create_supplier_contact', 6),
('2015_10_09_022351_create_supplier_item', 6),
('2015_10_20_225932_createcustomertable', 7);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deliverydate` date NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creator_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE IF NOT EXISTS `orderdetail` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `order_id`, `product_id`, `product_quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
('ORDET-2015-09-29dzTsc', 'ORDER-2015-09-29Br4', '2', 100, '2015-09-29 10:58:32', '2015-09-29 10:58:32', NULL),
('ORDET-2015-09-29dzTsx', 'ORDER-2015-09-29Br4', '3', 100, '2015-09-24 10:58:32', '2015-09-29 10:58:32', NULL),
('ORDET-2015-09-29x5qRk', 'ORDER-2015-09-29Br4', '1', 100, '2015-09-29 10:58:32', '2015-09-29 10:58:32', NULL),
('ORDET-2015-09-30dOFPb', 'ORDER-2015-09-30tEy', '1', 10, '2015-09-30 10:14:11', '2015-09-30 10:14:11', NULL),
('ORDET-2015-09-30RkJXR', 'ORDER-2015-09-30tEy', '1', 10, '2015-09-30 10:14:11', '2015-09-30 10:14:11', NULL),
('ORDET-2015-10-08cDqHf', 'ORDER-2015-10-08bOU', '2', 1, '2015-10-07 19:44:06', '2015-10-07 19:44:06', NULL),
('ORDET-2015-10-08fW13j', 'ORDER-2015-10-08bOU', '1', 1, '2015-10-07 19:44:06', '2015-10-07 19:44:06', NULL),
('ORDET-2015-10-18PxG1v', 'ORDER-2015-10-18uFD', '1', 100, '2015-10-18 08:42:45', '2015-10-18 08:42:45', NULL),
('ORDET-2015-10-201VTVs', 'ORDER-2015-10-20zXQ', '2', 1, '2015-10-20 14:47:52', '2015-10-20 14:47:52', NULL),
('ORDET-2015-10-20eFmBV', 'ORDER-2015-10-20YVO', '1', 1, '2015-10-19 20:39:47', '2015-10-19 20:39:47', NULL),
('ORDET-2015-10-20EtQQf', 'ORDER-2015-10-20rog', '2', 1, '2015-10-20 14:40:18', '2015-10-20 14:40:18', NULL),
('ORDET-2015-10-20kXYec', 'ORDER-2015-10-20rog', '3', 1, '2015-10-20 14:40:18', '2015-10-20 14:40:18', NULL),
('ORDET-2015-10-20UBJ4x', 'ORDER-2015-10-20riR', '1', 1, '2015-10-20 14:39:51', '2015-10-20 14:39:51', NULL),
('ORDET-2015-10-20W2Skr', 'ORDER-2015-10-20rYc', '1', 1, '2015-10-20 14:37:16', '2015-10-20 14:37:16', NULL),
('ORDET-2015-10-20xKFSU', 'ORDER-2015-10-20riR', '1', 1, '2015-10-20 14:39:51', '2015-10-20 14:39:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE IF NOT EXISTS `privilege` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `control` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`id`, `name`, `action`, `created_at`, `updated_at`, `deleted_at`, `control`) VALUES
(1, 'backup', 'download', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 5),
(2, 'backup', 'create', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 5),
(3, 'view', 'view', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 1),
(4, 'edit', 'edit', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 2),
(5, 'delete', 'delete', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 4),
(6, 'log', 'log', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `alert_quantity` int(11) NOT NULL DEFAULT '10',
  `imageurl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `barcode_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_barcode_id_unique` (`barcode_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `alert_quantity`, `imageurl`, `barcode_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pasteurized Liquid Egg White', '0.00', 10, 'img-product/Mn3G7k02feLAkhvw.jpg', '1', '2015-09-29 10:57:09', '2015-10-07 19:42:59', NULL),
(2, 'Pasteurized Liquid Whole Egg', '0.00', 10, 'img-product/f5Egsq1KWL0bzkWP.jpg', '2', '2015-09-29 10:57:28', '2015-10-07 19:43:05', NULL),
(3, 'Pasteurized Liquid Egg Yolk', '0.00', 10, 'img-product/052KFQvW0sR5Fu9w.jpg', '3', '2015-09-29 10:57:57', '2015-10-07 19:43:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `querylog`
--

CREATE TABLE IF NOT EXISTS `querylog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sql` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE IF NOT EXISTS `recipe` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `recipe_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `name`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(18, 'Recipe for egg white', '1', '2015-09-30 09:56:48', '2015-09-30 09:56:48', NULL),
(19, 'Recipe for Pasteurized Luqied whole egg', '2', '2015-09-30 10:13:43', '2015-09-30 10:13:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `keyname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_keyname_unique` (`keyname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `keyname`, `value`, `created_at`, `updated_at`) VALUES
(1, 'useridcardwidth', '336', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'useridcardheight', '220', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'theme', 'violet', '0000-00-00 00:00:00', '2015-10-07 11:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('SUP2015-10-178jb', 'test', '', 'activated', '2015-10-17 08:03:17', '2015-10-17 08:03:17', NULL),
('SUP2015-10-17o4E', 'test', '', 'activated', '2015-10-17 08:04:07', '2015-10-17 08:04:07', NULL),
('SUP2015-10-17ROT', 'test', '', 'disabled', '2015-10-17 08:06:16', '2015-10-17 08:06:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplieraddress`
--

CREATE TABLE IF NOT EXISTS `supplieraddress` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zippostal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `suppliercontact`
--

CREATE TABLE IF NOT EXISTS `suppliercontact` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `additionalemail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `supplieritem`
--

CREATE TABLE IF NOT EXISTS `supplieritem` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `supplieritem`
--

INSERT INTO `supplieritem` (`id`, `item_id`, `supplier_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'SUP2015-10-178jb', 'activated', '2015-10-17 09:18:50', '2015-10-17 09:18:50', NULL),
(2, '1', 'SUP2015-10-178jb', 'activated', '2015-10-17 09:18:55', '2015-10-17 09:18:55', NULL),
(3, '1', 'SUP2015-10-178jb', 'activated', '2015-10-17 09:18:56', '2015-10-17 09:18:56', NULL),
(4, '2', 'SUP2015-10-178jb', 'activated', '2015-10-17 09:21:38', '2015-10-17 09:21:38', NULL),
(5, '21', 'SUP2015-10-17o4E', 'activated', '2015-10-17 09:27:09', '2015-10-17 09:27:09', NULL),
(6, '5', 'SUP2015-10-17ROT', 'activated', '2015-10-17 09:27:15', '2015-10-17 09:27:15', NULL),
(7, '4', 'SUP2015-10-17o4E', 'activated', '2015-10-17 09:27:20', '2015-10-17 09:27:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `usergroup_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `barcode_id` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `middlename`, `email`, `password`, `usergroup_id`, `barcode_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `activated`) VALUES
('2015100436107', 'John Kevin', 'Peralta', 'registration', 'De jesus', 'Registration@gmail.com', '$2y$10$wuS6oDJTl85IBlLl8X49GuRWwLt76RMglGS3air50A6JQKVbMtVSS', '1', '3', 'ZKug0di6SikCydlULvQroJx4RQ4ZVio3inXdwgLMAo6hWZ5HjJUszc5ZRcTD', '2015-10-04 10:34:36', '2015-10-18 09:26:23', NULL, 1),
('2015101314305', 'admin', 'bepco', 'bepcoadmin', 'of', 'bepco.admin@bepco.com', '$2y$10$ikm.WKq91keaoAwI.X2gyue8Irq7cLxrU7j/EFVk1KSJEyZ4wL6Im', '1', '5', NULL, '2015-10-12 20:07:15', '2015-10-18 09:26:44', NULL, 1),
('2015101331777', 'John Kevin', 'Peralta', 'rururhunie', 'De jesus', 'rururhunie@gmail.com', '$2y$10$ZCePvPVA35INZulNYoI4FOaPKMLfjLX.5P7Xi61MSrunOx5QAkFwK', '1', '4', NULL, '2015-10-12 20:06:31', '2015-10-12 20:06:32', NULL, 1),
('2015102010329', 'John Kevin', 'Peralta', 'admin123', 'De jesus', 'kianaudez5@gmail.com', '$2y$10$R3lj5ZcUOC89ck9bJVs3fOcv6tUDuc0tc4h6ESQd.H8VD89LyQjxK', '1', '6', NULL, '2015-10-19 19:48:10', '2015-10-19 19:48:10', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `useraddress`
--

CREATE TABLE IF NOT EXISTS `useraddress` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zippostal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `useraddress`
--

INSERT INTO `useraddress` (`id`, `user_id`, `street`, `state`, `city`, `country`, `region`, `zippostal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '2015100436107', '933-B M.Dela fuente St.', 'Sampaloc', 'Manila', 'PH', 'National Capital Region', '1121', '2015-10-11 16:32:23', '2015-10-11 16:43:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userbarcode`
--

CREATE TABLE IF NOT EXISTS `userbarcode` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `barcodekey` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userbarcode_user_id_unique` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `userbarcode`
--

INSERT INTO `userbarcode` (`id`, `barcodekey`, `user_id`, `filename`, `path`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, '2015100436107', '2015100436107', '2015100436107.png', 'P:\\LaravelApps\\barcode\\laravel\\public\\img-id/', 'created', '2015-10-04 10:34:36', '2015-10-04 10:34:36', NULL),
(4, '2015101331777', '2015101331777', '2015101331777.png', 'P:\\LaravelApps\\barcode\\laravel\\public\\img-id/', 'created', '2015-10-12 20:06:32', '2015-10-12 20:06:32', NULL),
(5, '2015101314305', '2015101314305', '2015101314305.png', 'P:\\LaravelApps\\barcode\\laravel\\public\\img-id/', 'created', '2015-10-12 20:07:15', '2015-10-12 20:07:15', NULL),
(6, '2015102010329', '2015102010329', '2015102010329.png', 'P:\\LaravelApps\\barcode\\laravel\\public\\img-id/', 'created', '2015-10-19 19:48:10', '2015-10-19 19:48:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usercontact`
--

CREATE TABLE IF NOT EXISTS `usercontact` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `additionalemail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE IF NOT EXISTS `usergroup` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `control` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`id`, `name`, `description`, `control`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'All', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 'Employee', 'View', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `useridcard`
--

CREATE TABLE IF NOT EXISTS `useridcard` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `useridcard_user_id_unique` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `useridcard`
--

INSERT INTO `useridcard` (`id`, `user_id`, `path`, `filename`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2015100436107', 'P:\\LaravelApps\\barcode\\laravel\\public\\img-idcard/', 'Peralta2015100436107.png', 'updated', '2015-10-05 13:00:34', '2015-10-17 07:09:06', NULL),
(3, '2015101314305', 'P:\\LaravelApps\\barcode\\laravel\\public\\img-idcard/', 'bepco2015101314305.png', 'created', '2015-10-13 19:43:21', '2015-10-13 19:43:21', NULL),
(4, '2015101331777', 'P:\\LaravelApps\\barcode\\laravel\\public\\img-idcard/', 'Peralta2015101331777.png', 'created', '2015-10-18 09:04:03', '2015-10-18 09:04:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userphoto`
--

CREATE TABLE IF NOT EXISTS `userphoto` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userphoto`
--

INSERT INTO `userphoto` (`id`, `path`, `filename`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('gNMs0AuhRNELkZxO', 'P:\\LaravelApps\\barcode\\laravel\\public\\img-photo//', 'gNMs0AuhRNELkZxO.JPG', '2015101331777', '2015-10-17 07:08:56', '2015-10-17 07:08:56', NULL),
('wxk8RsRfqClQmZ0i', 'P:\\LaravelApps\\barcode\\laravel\\public\\img-photo//', 'wxk8RsRfqClQmZ0i.JPG', '2015101314305', '2015-10-13 19:32:28', '2015-10-13 19:32:28', NULL),
('XgiJNBgQHtIy0zUp', 'P:\\LaravelApps\\barcode\\laravel\\public\\img-photo//', 'XgiJNBgQHtIy0zUp.JPG', '2015100436107', '2015-10-05 11:54:27', '2015-10-05 11:54:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userprivilege`
--

CREATE TABLE IF NOT EXISTS `userprivilege` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `privilege_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
