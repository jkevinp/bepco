-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2015 at 11:50 PM
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
  `middlename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `cellphone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `firstname`, `lastname`, `middlename`, `email`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `cellphone`, `address`, `telephone`) VALUES
('201511090242', 'John Kevin', 'Peralta', 'De jesus', 'foo@bar.com', NULL, '2015-11-09 08:52:02', '2015-11-09 08:52:02', NULL, '0909090', 'foo', '09090909'),
('201511091373', 'John Kevin', 'Pogi', 'De Jesus', 'bluegate_2006@yahoo.com', NULL, '2015-11-09 08:47:13', '2015-11-09 08:47:13', NULL, '09056057553', '933', '7495081'),
('201511093926', 'John Kevin', 'Peralta', 'De jesus', 'xnalimits@gmail.com', NULL, '2015-11-09 08:41:39', '2015-11-09 08:41:39', NULL, '09056057553', '933-B M.Dela fuente St. SAmpaloc Manila', ''),
('201511094730', 'John Kevin', 'Pogi', 'De Jesus', 'bluegate_2006@yahoo.com', NULL, '2015-11-09 08:47:47', '2015-11-09 08:47:47', NULL, '09056057553', '933', '7495081'),
('201511095460', 'Mary Jane', 'Alfante', 'Martinez', 'shana.herai@facebook.com', NULL, '2015-11-09 08:45:54', '2015-11-09 08:45:54', NULL, '09056057553', '933-b m.dela fuente st. sampaloc manila', '7495081');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`id`, `recipe_id`, `name`, `description`, `item_id`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, '18', 'Pet bottle for ', '', '1', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(6, '18', 'Raw Egg for ', '', '3', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(7, '19', 'Pet bottle for Recipe for Pasteurized Luqied whole egg', '', '1', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(8, '19', 'Raw Egg for Recipe for Pasteurized Luqied whole egg', '', '3', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(9, '20', 'Pet bottle for Recipe for Liquid Egg yolk', '', '1', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(10, '20', 'Marlboro Lights for Recipe for Liquid Egg yolk', '', '21', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `inventorylog`
--

INSERT INTO `inventorylog` (`id`, `proccess`, `action`, `user_id`, `user_name`, `message`, `fired_at`, `field`, `param`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'induct', 'deposit', '2015100432147', 'John Kevin De Jesus Peralta', 'EIR:John Kevin De Jesus Peralta proccesed induct doing deposit changing Quantity value to 100', 'EIR', 'Quantity', '100', '2015-10-03 03:37:56', '2015-10-03 03:37:56', NULL),
(5, 'induct', 'withdraw', '2015100432147', 'John Kevin De Jesus Peralta', 'EIR:John Kevin De Jesus Peralta proccesed induct doing withdraw changing Quantity value to 10000', 'EIR', 'Quantity', '10', '2015-10-03 03:39:14', '2015-10-03 03:39:14', NULL),
(11, 'induct', 'withdraw', '2015100432147', 'John Kevin De Jesus Peralta', 'EIR:John Kevin De Jesus Peralta proccesed induct doing withdraw changing Quantity value to 10000', 'EIR', 'Quantity', '10', '2014-03-18 03:39:14', '2015-10-03 03:39:14', NULL),
(12, 'induct', 'withdraw', '2015100436107', 'John Kevin De jesus Peralta', 'EIR:John Kevin De jesus Peralta proccesed induct doing withdraw changing Quantity value to 11', 'EIR', 'Quantity', '11', '2015-11-13 20:30:56', '2015-11-13 20:30:56', NULL);

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
(1, 'Pet bottle', 'Used to pack small quantity of products', 0, 1, 115, '', '', '0000-00-00 00:00:00', '2015-11-14 14:00:34', NULL, 2),
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
('2015_10_20_225932_createcustomertable', 7),
('2015_10_22_203133_edit_customer_table_001', 8),
('2015_10_22_203453_edit_customer_table_002', 9),
('2015_10_22_203701_edit_customer_table_003', 10);

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

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `deliverydate`, `description`, `status`, `customer_id`, `creator_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('ORDER-2015-11-090YI', '2015-11-09', 'Auto Generated Order', 'items ordered', '201511095460', '2015102010329', '2015-11-09 10:01:06', '2015-11-11 16:18:20', NULL),
('ORDER-2015-11-09z2P', '2015-11-09', 'Auto Generated Order', 'items ordered', '201511093926', '2015102010329', '2015-11-09 10:00:43', '2015-11-11 16:18:20', NULL);

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
('ORDET-2015-11-092lS3L', 'ORDER-2015-11-090YI', '2', 10, '2015-11-09 10:01:06', '2015-11-09 10:01:06', NULL),
('ORDET-2015-11-09iVJbZ', 'ORDER-2015-11-09z2P', '1', 10, '2015-11-09 10:00:43', '2015-11-09 10:00:43', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `alert_quantity`, `imageurl`, `barcode_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pasteurized Liquid Egg White', '100.00', 10, 'img-product/Mn3G7k02feLAkhvw.jpg', '1', '2015-09-29 10:57:09', '2015-10-07 19:42:59', NULL),
(2, 'Pasteurized Liquid Whole Egg', '100.00', 10, 'img-product/f5Egsq1KWL0bzkWP.jpg', '2', '2015-09-29 10:57:28', '2015-10-07 19:43:05', NULL),
(3, 'Pasteurized Liquid Egg Yolk', '100.00', 10, 'img-product/052KFQvW0sR5Fu9w.jpg', '3', '2015-09-29 10:57:57', '2015-10-07 19:43:09', NULL),
(4, '10 KG Egg white 100', '100.00', 10, 'img-product/FDp1hIlQFy9xtqqb.jpg', NULL, '2015-11-11 13:17:18', '2015-11-11 13:17:18', NULL),
(5, '20 KG Egg white', '500.00', 10, 'img-product/V9e0qaTqkoBxLdtJ.tif', NULL, '2015-11-11 13:22:04', '2015-11-11 13:22:04', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `name`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(18, 'Recipe for egg white', '1', '2015-09-30 09:56:48', '2015-09-30 09:56:48', NULL),
(19, 'Recipe for Pasteurized Luqied whole egg', '2', '2015-09-30 10:13:43', '2015-09-30 10:13:43', NULL),
(20, 'Recipe for Liquid Egg yolk', '3', '2015-11-11 10:11:04', '2015-11-11 10:11:04', NULL);

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
(3, 'theme', 'violet', '0000-00-00 00:00:00', '2015-11-11 12:33:51');

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
('SUP2015-10-178jb', 'Egg Supplier Enterprise', '', 'activated', '2015-10-17 08:03:17', '2015-10-17 08:03:17', NULL),
('SUP2015-10-17o4E', 'Bottle Supplier Company', '', 'activated', '2015-10-17 08:04:07', '2015-10-17 08:04:07', NULL),
('SUP2015-10-17ROT', 'Chemical Supplier Inc', '', 'disabled', '2015-10-17 08:06:16', '2015-10-17 08:06:16', NULL),
('SUP2015-11-12fz7', 'Eggnok Enterprise', '', 'activated', '2015-11-11 16:09:09', '2015-11-11 16:09:09', NULL),
('SUP2015-11-12Oip', 'Pail And Bottle Maker', '', 'activated', '2015-11-11 16:07:27', '2015-11-11 16:07:27', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `supplieritem`
--

INSERT INTO `supplieritem` (`id`, `item_id`, `supplier_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'SUP2015-10-17o4E', 'activated', '2015-10-17 09:18:50', '2015-10-17 09:18:50', NULL),
(2, '3', 'SUP2015-10-178jb', 'activated', '2015-10-17 09:18:55', '2015-10-17 09:18:55', NULL),
(8, '4', 'SUP2015-10-17ROT', 'activated', '2015-11-11 16:06:29', '2015-11-11 16:06:29', NULL),
(9, '2', 'SUP2015-10-17o4E', 'activated', '2015-11-11 16:06:39', '2015-11-11 16:06:39', NULL),
(10, '1', 'SUP2015-11-12Oip', 'activated', '2015-11-11 16:08:43', '2015-11-11 16:08:43', NULL),
(11, '2', 'SUP2015-11-12Oip', 'activated', '2015-11-11 16:08:49', '2015-11-11 16:08:49', NULL),
(12, '3', 'SUP2015-11-12fz7', 'activated', '2015-11-11 16:09:29', '2015-11-11 16:09:29', NULL);

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
('2015100436107', 'John Kevin', 'Peralta', 'registration', 'De jesus', 'Registration@gmail.com', '$2y$10$X44SlCOuU9/sjo5/d/h9auGe5tWo1zv7m8Qha6oTOkO5PYUAYgwSe', '1', '3', 'Bl45m8P2Chk6N4cChEHlONy8M7M01BmBYIXZ5OftvuHEKbsFMUsPWHNqTP4f', '2015-10-04 10:34:36', '2015-11-11 12:32:27', NULL, 1),
('2015101314305', 'admin', 'bepco', 'bepcoadmin', 'of', 'bepco.admin@bepco.com', '$2y$10$ikm.WKq91keaoAwI.X2gyue8Irq7cLxrU7j/EFVk1KSJEyZ4wL6Im', '1', '5', NULL, '2015-10-12 20:07:15', '2015-10-18 09:26:44', NULL, 1),
('2015101331777', 'John Kevin', 'Peralta', 'rururhunie', 'De jesus', 'rururhunie@gmail.com', '$2y$10$ZCePvPVA35INZulNYoI4FOaPKMLfjLX.5P7Xi61MSrunOx5QAkFwK', '1', '4', NULL, '2015-10-12 20:06:31', '2015-10-12 20:06:32', NULL, 1),
('2015102010329', 'John Kevin', 'Peralta', 'admin123', 'De jesus', 'kianaudez5@gmail.com', '$2y$10$R3lj5ZcUOC89ck9bJVs3fOcv6tUDuc0tc4h6ESQd.H8VD89LyQjxK', '1', '6', 'rNHBlVO0jAwUHeICddyCTDvoaXG0clHWnb897uT8au1WkB7rimqfXPgaI46v', '2015-10-19 19:48:10', '2015-11-14 13:50:49', NULL, 1);

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
