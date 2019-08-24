-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 18, 2019 at 10:10 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bg_currency`
--

DROP TABLE IF EXISTS `bg_currency`;
CREATE TABLE IF NOT EXISTS `bg_currency` (
  `CURRENCY_ID` bigint(20) NOT NULL DEFAULT '0',
  `CURRENCY_NAME` varchar(100) COLLATE utf16_unicode_ci DEFAULT NULL,
  `SHORT_CODE` varchar(10) COLLATE utf16_unicode_ci DEFAULT NULL,
  `DEFAULT_FLAG` int(11) DEFAULT NULL,
  `REMARKS` varchar(2000) COLLATE utf16_unicode_ci DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` date DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` date DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) COLLATE utf16_unicode_ci DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) COLLATE utf16_unicode_ci DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) COLLATE utf16_unicode_ci DEFAULT NULL,
  `FLEX_FIELD4` varchar(500) COLLATE utf16_unicode_ci DEFAULT NULL,
  `FLEX_FIELD5` varchar(500) COLLATE utf16_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`CURRENCY_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `bg_currency`
--

INSERT INTO `bg_currency` (`CURRENCY_ID`, `CURRENCY_NAME`, `SHORT_CODE`, `DEFAULT_FLAG`, `REMARKS`, `ACTIVE_STATUS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`, `FLEX_FIELD4`, `FLEX_FIELD5`) VALUES
(20190001, 'BDT', NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20190002, 'USD', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nan_banner`
--

DROP TABLE IF EXISTS `nan_banner`;
CREATE TABLE IF NOT EXISTS `nan_banner` (
  `BANNER_ID` bigint(20) NOT NULL,
  `BANNER_TITLE` varchar(500) DEFAULT NULL,
  `BANNER_DESC` varchar(2000) DEFAULT NULL,
  `IMAGE_PATH` varchar(500) DEFAULT NULL,
  `IMAGE_PAGE` varchar(50) DEFAULT NULL,
  `PAGE_SHORT_CODE` varchar(10) DEFAULT NULL,
  `PAGE_LOC` varchar(100) DEFAULT NULL,
  `PAGE_LOC_SHORT_CODE` varchar(10) DEFAULT NULL,
  `SL_NO` int(11) DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` date DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` date DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) DEFAULT NULL,
  `FLEX_FIELD4` varchar(500) DEFAULT NULL,
  `FLEX_FIELD5` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`BANNER_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nan_banner`
--

INSERT INTO `nan_banner` (`BANNER_ID`, `BANNER_TITLE`, `BANNER_DESC`, `IMAGE_PATH`, `IMAGE_PAGE`, `PAGE_SHORT_CODE`, `PAGE_LOC`, `PAGE_LOC_SHORT_CODE`, `SL_NO`, `ACTIVE_STATUS`, `REMARKS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`, `FLEX_FIELD4`, `FLEX_FIELD5`) VALUES
(20190001, '10% Discount', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been', 'add03_1557641352.png', NULL, 'H', NULL, 'M', 1, 1, NULL, 1, '2019-05-08', 1, '2019-05-12', NULL, NULL, NULL, NULL, NULL),
(20190002, '15% Discount', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been', 'add03_1557642439.png', NULL, 'H', NULL, 'M', 2, 1, NULL, 1, '2019-05-11', 1, '2019-05-12', NULL, NULL, NULL, NULL, NULL),
(20190003, '25% Discount', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been', 'add02_1557641326.png', NULL, 'H', NULL, 'M', 3, 1, NULL, 1, '2019-05-11', 1, '2019-05-12', NULL, NULL, NULL, NULL, NULL),
(20190004, '20% Discount', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been', 'add03_1557641314.png', NULL, 'H', NULL, 'M', 4, 1, NULL, 1, '2019-05-11', 1, '2019-05-12', NULL, NULL, NULL, NULL, NULL),
(20190005, '25% Discount', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been', 'add02_1557641305.png', NULL, 'H', NULL, 'M', 5, 1, NULL, 1, '2019-05-12', 1, '2019-05-12', NULL, NULL, NULL, NULL, NULL),
(20190006, '10% Discount', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been', 'add02_1557641259.png', NULL, 'H', NULL, 'L', 1, 1, NULL, 1, '2019-05-12', 1, '2019-05-12', NULL, NULL, NULL, NULL, NULL),
(20190007, '15% Discount', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been', 'add03_1557641264.png', NULL, 'H', NULL, 'L', 2, 1, NULL, 1, '2019-05-12', 1, '2019-05-12', NULL, NULL, NULL, NULL, NULL),
(20190008, '20% Discount', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been', 'add02_1557642431.png', NULL, 'H', NULL, 'M', 0, 1, NULL, 1, '2019-05-12', 1, '2019-05-12', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nan_brand`
--

DROP TABLE IF EXISTS `nan_brand`;
CREATE TABLE IF NOT EXISTS `nan_brand` (
  `BRAND_ID` bigint(20) NOT NULL,
  `BRAND_NAME` varchar(20) DEFAULT NULL,
  `SHORT_CODE` varchar(10) DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` date DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` date DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`BRAND_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nan_brand`
--

INSERT INTO `nan_brand` (`BRAND_ID`, `BRAND_NAME`, `SHORT_CODE`, `ACTIVE_STATUS`, `REMARKS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`) VALUES
(20190001, 'Puma', 'P', 1, NULL, 1, '2019-04-07', NULL, NULL, NULL, NULL, NULL),
(20190002, 'Apex', 'A', 1, NULL, 1, '2019-04-07', NULL, NULL, NULL, NULL, NULL),
(20190003, 'Cats Eye', 'CE', 1, NULL, 1, '2019-04-24', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nan_cart`
--

DROP TABLE IF EXISTS `nan_cart`;
CREATE TABLE IF NOT EXISTS `nan_cart` (
  `CART_ID` bigint(20) NOT NULL,
  `CART_DATE` date DEFAULT NULL,
  `USER_ID` bigint(20) DEFAULT NULL,
  `SESSION_ID` varchar(500) DEFAULT NULL,
  `PRODUCT_ID` bigint(20) DEFAULT NULL,
  `PRODUCT_COLOR_ID` bigint(20) DEFAULT NULL,
  `PRODUCT_SIZE_ID` bigint(20) DEFAULT NULL,
  `QTY` decimal(10,2) DEFAULT NULL,
  `UOM_ID` bigint(20) DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` date DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` date DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) DEFAULT NULL,
  `FLEX_FIELD4` varchar(500) DEFAULT NULL,
  `FLEX_FIELD5` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`CART_ID`),
  KEY `FK_NC_BU` (`USER_ID`),
  KEY `FK_NC_NPC` (`PRODUCT_COLOR_ID`),
  KEY `FK_NC_NPS` (`PRODUCT_SIZE_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nan_color`
--

DROP TABLE IF EXISTS `nan_color`;
CREATE TABLE IF NOT EXISTS `nan_color` (
  `COLOR_ID` bigint(20) NOT NULL,
  `COLOR_NAME` varchar(20) DEFAULT NULL,
  `COLOR_CODE` varchar(10) DEFAULT NULL,
  `SHORT_CODE` varchar(10) DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` date DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` date DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`COLOR_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nan_color`
--

INSERT INTO `nan_color` (`COLOR_ID`, `COLOR_NAME`, `COLOR_CODE`, `SHORT_CODE`, `ACTIVE_STATUS`, `REMARKS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`) VALUES
(20190001, 'Blue', '#0000a0', 'B', 1, NULL, 1, '2019-04-07', 1, '2019-04-24', NULL, NULL, NULL),
(20190002, 'Red', '#ff0000', 'R', 1, NULL, 1, '2019-04-07', 1, '2019-04-24', NULL, NULL, NULL),
(20190003, 'Green', '#80ff80', 'GR', 1, NULL, 1, '2019-04-24', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nan_contact_email`
--

DROP TABLE IF EXISTS `nan_contact_email`;
CREATE TABLE IF NOT EXISTS `nan_contact_email` (
  `CONTACT_EMAIL_ID` bigint(20) NOT NULL,
  `FROM_EMAIL_ID` varchar(500) DEFAULT NULL,
  `SUBJECT` varchar(200) DEFAULT NULL,
  `EMAIL_CONTENT` text,
  `REMARKS` varchar(500) DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` date DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` date DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) DEFAULT NULL,
  `FLEX_FIELD4` varchar(500) DEFAULT NULL,
  `FLEX_FIELD5` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`CONTACT_EMAIL_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nan_contact_email`
--

INSERT INTO `nan_contact_email` (`CONTACT_EMAIL_ID`, `FROM_EMAIL_ID`, `SUBJECT`, `EMAIL_CONTENT`, `REMARKS`, `ACTIVE_STATUS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`, `FLEX_FIELD4`, `FLEX_FIELD5`) VALUES
(20190001, 'test@mail.com', 'Product Order', '<p>I want to buy a product, Please contact me.</p>', NULL, 0, NULL, '2019-04-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20190002, 'habibcse335@gmail.com', 'Sample Contact', '<p>Demo contant for order</p>', NULL, 1, NULL, '2019-04-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20190003, 'mymail@mail.com', 'Contact Subject', '<p>New test contant</p>', NULL, 1, NULL, '2019-04-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nan_offer`
--

DROP TABLE IF EXISTS `nan_offer`;
CREATE TABLE IF NOT EXISTS `nan_offer` (
  `OFFER_ID` bigint(20) NOT NULL,
  `OFFER_NAME` varchar(200) DEFAULT NULL,
  `OFFER_PERCENTAGE` decimal(10,2) DEFAULT NULL,
  `CHD_EXIST` int(11) DEFAULT NULL,
  `VALID_FROM_DATE` date DEFAULT NULL,
  `VALID_END_DATE` date DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` date DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` date DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`OFFER_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nan_offer`
--

INSERT INTO `nan_offer` (`OFFER_ID`, `OFFER_NAME`, `OFFER_PERCENTAGE`, `CHD_EXIST`, `VALID_FROM_DATE`, `VALID_END_DATE`, `ACTIVE_STATUS`, `REMARKS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`) VALUES
(20190001, 'Eid Offer', '20.00', NULL, '2019-04-12', '2019-05-31', 1, NULL, 1, '2019-04-11', 1, '2019-04-11', NULL, NULL, NULL),
(20190002, 'Pohela Boishakh Offer', '26.00', 1, '2019-04-11', '2019-04-30', 1, NULL, 1, '2019-04-11', 1, '2019-04-18', NULL, NULL, NULL),
(20190003, 'Ramadan Offer', '29.00', 1, '2019-04-17', '2019-06-30', 1, NULL, 1, '2019-04-17', 1, '2019-06-18', NULL, NULL, NULL),
(20190004, 'Discount', '10.00', 1, '2019-04-20', '2019-06-29', 0, NULL, 1, '2019-04-20', 1, '2019-06-18', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nan_offer_category`
--

DROP TABLE IF EXISTS `nan_offer_category`;
CREATE TABLE IF NOT EXISTS `nan_offer_category` (
  `OFFER_CATEGORY_ID` bigint(20) NOT NULL,
  `PRODUCT_CATEGORY_ID` bigint(20) DEFAULT NULL,
  `PRODUCT_OFFER_ID` bigint(20) DEFAULT NULL,
  `OFFER_PERCENTAGE` decimal(10,2) DEFAULT NULL,
  `OFFER_GROSS` decimal(10,2) DEFAULT NULL,
  `CHD_EXIST` int(11) DEFAULT NULL,
  `VALID_FROM_DATE` date DEFAULT NULL,
  `VALID_END_DATE` date DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` date DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` date DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`OFFER_CATEGORY_ID`),
  KEY `FK_NOC_NPC` (`PRODUCT_CATEGORY_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nan_offer_category`
--

INSERT INTO `nan_offer_category` (`OFFER_CATEGORY_ID`, `PRODUCT_CATEGORY_ID`, `PRODUCT_OFFER_ID`, `OFFER_PERCENTAGE`, `OFFER_GROSS`, `CHD_EXIST`, `VALID_FROM_DATE`, `VALID_END_DATE`, `ACTIVE_STATUS`, `REMARKS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`) VALUES
(20190001, 20190002, 20190003, '10.00', NULL, NULL, '2019-04-25', '2019-07-31', 1, NULL, 1, '2019-04-18', 1, '2019-06-18', NULL, NULL, NULL),
(20190002, 20190001, 20190003, '15.00', NULL, NULL, '2019-04-25', '2019-08-31', 1, NULL, 1, '2019-04-18', 1, '2019-06-18', NULL, NULL, NULL),
(20190003, 20190002, 20190002, '14.00', NULL, 1, '2019-04-18', '2019-05-31', 1, NULL, 1, '2019-04-18', 1, '2019-04-18', NULL, NULL, NULL),
(20190004, 20190001, 20190002, NULL, '20.00', NULL, '2019-04-25', '2019-06-30', 1, NULL, 1, '2019-04-18', 1, '2019-04-18', NULL, NULL, NULL),
(20190005, 20190001, 20190004, '15.00', NULL, NULL, '2019-04-20', '2019-06-27', 1, NULL, 1, '2019-04-20', 1, '2019-04-24', NULL, NULL, NULL),
(20190006, 20190003, 20190003, NULL, '20.00', NULL, '2019-06-18', '2019-08-10', 1, NULL, 1, '2019-06-18', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nan_offer_product`
--

DROP TABLE IF EXISTS `nan_offer_product`;
CREATE TABLE IF NOT EXISTS `nan_offer_product` (
  `OFFER_PRODUCT_ID` bigint(20) NOT NULL,
  `OFFER_CATEGORY_ID` bigint(20) DEFAULT NULL,
  `PRODUCT_ID` bigint(20) DEFAULT NULL,
  `OFFER_PERCENTAGE` decimal(10,2) DEFAULT NULL,
  `OFFER_GROSS` decimal(10,2) DEFAULT NULL,
  `VALID_FROM_DATE` date DEFAULT NULL,
  `VALID_END_DATE` date DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` date DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` date DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`OFFER_PRODUCT_ID`),
  KEY `FK_NOP_NOC` (`OFFER_CATEGORY_ID`),
  KEY `FK_NOP_NP` (`PRODUCT_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nan_product`
--

DROP TABLE IF EXISTS `nan_product`;
CREATE TABLE IF NOT EXISTS `nan_product` (
  `PRODUCT_ID` bigint(20) NOT NULL,
  `PRODUCT_NAME` varchar(300) DEFAULT NULL,
  `PRODUCT_CATEGORY_ID` bigint(20) DEFAULT NULL,
  `SHORT_CODE` varchar(10) DEFAULT NULL,
  `USER_PRODUCT_CODE` varchar(20) DEFAULT NULL,
  `PRODUCT_DETAILS` varchar(4000) DEFAULT NULL,
  `COLOR_EXIST` int(11) DEFAULT NULL,
  `SIZE_EXIST` int(11) DEFAULT NULL,
  `BRAND_ID` bigint(20) DEFAULT NULL,
  `DEFAULT_SHOW` int(11) DEFAULT NULL,
  `IMAGE_PATH` varchar(1000) DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` date DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` date DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`PRODUCT_ID`),
  KEY `FK_NP_NPC` (`PRODUCT_CATEGORY_ID`),
  KEY `FK_NP_NB` (`BRAND_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nan_product`
--

INSERT INTO `nan_product` (`PRODUCT_ID`, `PRODUCT_NAME`, `PRODUCT_CATEGORY_ID`, `SHORT_CODE`, `USER_PRODUCT_CODE`, `PRODUCT_DETAILS`, `COLOR_EXIST`, `SIZE_EXIST`, `BRAND_ID`, `DEFAULT_SHOW`, `IMAGE_PATH`, `ACTIVE_STATUS`, `REMARKS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`) VALUES
(20190001, 'Jamdani Sharee', 20190002, 'Jm', NULL, '<p>Demo Content</p>', NULL, NULL, 20190001, NULL, '20190001_1554636070.png', 1, NULL, 1, '2019-04-07', NULL, NULL, NULL, NULL, NULL),
(20190002, 'Roksy', 20190002, NULL, NULL, '<p>Sample Content</p>', NULL, NULL, 20190001, NULL, '20190002_1554694820.png', 1, NULL, 1, '2019-04-08', NULL, NULL, NULL, NULL, NULL),
(20190003, 'Blue Saree', 20190001, NULL, NULL, '<p>Demo Data</p>', NULL, NULL, 20190001, NULL, '20190003_1554806007.png', 1, NULL, 1, '2019-04-09', NULL, NULL, NULL, NULL, NULL),
(20190004, 'New Item', 20190001, NULL, NULL, '<p>Sample Content</p>', NULL, NULL, 20190001, NULL, '20190004_1554806052.png', 1, NULL, 1, '2019-04-09', NULL, NULL, NULL, NULL, NULL),
(20190005, 'Jamdani 2', 20190002, NULL, NULL, '<p>Sample Content</p>', NULL, NULL, 20190001, NULL, '20190005_1554807566.png', 1, NULL, 1, '2019-04-09', NULL, NULL, NULL, NULL, NULL),
(20190006, 'New Shirt', 20190001, NULL, NULL, '<p>New ITem</p>', NULL, NULL, 20190002, NULL, '20190006_1554807596.png', 1, NULL, 1, '2019-04-09', NULL, NULL, NULL, NULL, NULL),
(20190007, 'T Shirt', 20190001, NULL, NULL, '<p>Demo Data</p>', NULL, NULL, 20190002, NULL, '20190007_1554807626.png', 1, NULL, 1, '2019-04-09', NULL, NULL, NULL, NULL, NULL),
(20190008, 'Sample Item', 20190001, NULL, NULL, '<p>Sample Item</p>', NULL, NULL, 20190002, NULL, '20190008_1554807656.png', 1, NULL, 1, '2019-04-09', NULL, NULL, NULL, NULL, NULL),
(20190009, 'Suti Saree', 20190002, 'SS', 'S001', 'test', NULL, NULL, 20190001, NULL, '20190009_1556086395.jpg', 1, NULL, 1, '2019-04-24', NULL, NULL, NULL, NULL, NULL),
(20190010, 'Kurti', 20190003, NULL, NULL, '<p>Simple Item Details</p>', NULL, NULL, 20190003, NULL, '20190010_1557641865.png', 1, NULL, 1, '2019-05-04', 1, '2019-05-12', NULL, NULL, NULL),
(20190011, 'Fotua', 20190003, NULL, NULL, '<p>Simple Item Details</p>', NULL, NULL, 20190003, NULL, '20190011_1556953499.png', 1, NULL, 1, '2019-05-04', NULL, NULL, NULL, NULL, NULL),
(20190012, 'New Sharee', 20190002, NULL, NULL, '<p>Simple Item Details</p>', NULL, NULL, 20190003, NULL, '20190012_1556953600.jpg', 1, NULL, 1, '2019-05-04', NULL, NULL, NULL, NULL, NULL),
(20190013, 'Black Saree', 20190002, NULL, NULL, '<p>Simple Item Details</p>', NULL, NULL, 20190003, NULL, '20190013_1557641952.png', 1, NULL, 1, '2019-05-04', 1, '2019-05-12', NULL, NULL, NULL),
(20190014, 'New Kurti', 20190003, NULL, NULL, '<p>Simple Item Details</p>', NULL, NULL, 20190001, NULL, '20190014_1557641830.png', 1, NULL, 1, '2019-05-04', 1, '2019-05-12', NULL, NULL, NULL),
(20190015, 'Sample Image', 20190003, NULL, NULL, '<p>Simple Item Details</p>', NULL, NULL, 20190002, NULL, '20190015_1556953896.png', 1, NULL, 1, '2019-05-04', NULL, NULL, NULL, NULL, NULL),
(20190016, 'New T Shirt', 20190001, NULL, NULL, '<h2>This icon replaces Font Awesome 4&#39;s fa-hand-o-right</h2>', NULL, NULL, 20190001, NULL, '20190016_1557030502.png', 1, NULL, 1, '2019-05-05', NULL, NULL, NULL, NULL, NULL),
(20190017, 'Saree', 20190002, NULL, NULL, '<p>This icon replaces Font Awesome 4&#39;s fa-hand-o-right</p>', NULL, NULL, 20190003, NULL, '20190017_1557030607.png', 1, NULL, 1, '2019-05-05', NULL, NULL, NULL, NULL, NULL),
(20190018, 'New Sharee', 20190001, NULL, NULL, '<p>This icon replaces Font Awesome 4&#39;s fa-hand-o-right</p>', NULL, NULL, 20190003, NULL, '20190018_1557030669.png', 1, NULL, 1, '2019-05-05', NULL, NULL, NULL, NULL, NULL),
(20190019, 'Roksy', 20190002, NULL, NULL, '<p>This icon replaces Font Awesome 4&#39;s fa-hand-o-right</p>', NULL, NULL, 20190003, NULL, '20190019_1557641808.jpg', 1, NULL, 1, '2019-05-05', 1, '2019-05-12', NULL, NULL, NULL),
(20190020, 'Jamdani Sharee', 20190002, NULL, NULL, '<p>This icon replaces Font Awesome 4&#39;s fa-hand-o-right</p>', NULL, NULL, 20190001, NULL, '20190020_1557030785.png', 1, NULL, 1, '2019-05-05', NULL, NULL, NULL, NULL, NULL),
(20190021, 'Roksy', 20190003, NULL, NULL, '<p>This icon replaces Font Awesome 4&#39;s fa-hand-o-right</p>', NULL, NULL, 20190002, NULL, '20190021_1557030835.png', 1, NULL, 1, '2019-05-05', NULL, NULL, NULL, NULL, NULL),
(20190022, 'Fotua', 20190003, NULL, NULL, '<p>This icon replaces Font Awesome 4&#39;s fa-hand-o-right</p>', NULL, NULL, 20190001, NULL, '20190022_1557030885.png', 1, NULL, 1, '2019-05-05', NULL, NULL, NULL, NULL, NULL),
(20190023, 'T Shirt', 20190001, NULL, NULL, '<p>This icon replaces Font Awesome 4&#39;s fa-hand-o-right</p>', NULL, NULL, 20190001, NULL, '20190023_1557030938.png', 1, NULL, 1, '2019-05-05', NULL, NULL, NULL, NULL, NULL),
(20190024, 'shoes', 20190004, NULL, NULL, '<p>This icon replaces Font Awesome 4&#39;s fa-hand-o-right</p>', NULL, NULL, 20190001, NULL, '20190024_1557031137.jpg', 1, NULL, 1, '2019-05-05', NULL, NULL, NULL, NULL, NULL),
(20190025, 'Apex shoes', 20190004, NULL, NULL, '<p>dsgewgewtgwe wet</p>', NULL, NULL, 20190002, NULL, '20190025_1557125450.jpg', 1, NULL, 1, '2019-05-06', NULL, NULL, NULL, NULL, NULL),
(20190026, 'Apex shoes', 20190004, NULL, NULL, '<p>dsgewgewtgwe wet</p>', NULL, NULL, 20190002, NULL, '20190026_1557125539.jpg', 0, NULL, 1, '2019-05-06', NULL, NULL, NULL, NULL, NULL),
(20190027, 'Apex shoes', 20190004, NULL, NULL, '<p>dsgewgewtgwe wet</p>', NULL, NULL, 20190002, NULL, '20190027_1557126043.jpg', 1, NULL, 1, '2019-05-06', 1, '2019-05-06', NULL, NULL, NULL),
(20190028, 'New Shoes', 20190004, NULL, NULL, '<p>Closure callback defining constraints on the resize. It&#39;s possible to constraint the <strong>aspect-ratio</strong> and/or a unwanted <strong>upsizing</strong> of the image. See examples below.</p>', NULL, NULL, 20190002, NULL, '20190028_1557127154.jpg', 1, NULL, 1, '2019-05-06', NULL, NULL, NULL, NULL, NULL),
(20190029, 'Apex shoes', 20190004, NULL, NULL, '<p>Closure callback defining constraints on the resize. It&#39;s possible to constraint the <strong>aspect-ratio</strong> and/or a unwanted <strong>upsizing</strong> of the image. See examples below.</p>', NULL, NULL, 20190002, NULL, '20190029_1557642009.jpg', 1, NULL, 1, '2019-05-06', 1, '2019-05-12', NULL, NULL, NULL),
(20190030, 'Apex shoes', 20190004, NULL, NULL, '<p>Closure callback defining constraints on the resize. It&#39;s possible to constraint the <strong>aspect-ratio</strong> and/or a unwanted <strong>upsizing</strong> of the image. See examples below.</p>', NULL, NULL, 20190002, NULL, '20190030_1557128828.jpg', 1, NULL, 1, '2019-05-06', NULL, NULL, NULL, NULL, NULL),
(20190031, 'Roksy', 20190003, NULL, NULL, '<p>Two ways to get proportional sizing. Either set the container (in your case ul) to a fixed height and then set the image height to 100% - don&#39;t state a width - the width will then be proportional to the height (that&#39;s what you want, right?). Alternatively, just set the image height, and leave the width unstated - again, the width will be proportional.</p>', NULL, NULL, 20190003, NULL, '20190031_1557641993.jpg', 1, NULL, 1, '2019-05-06', 1, '2019-05-12', NULL, NULL, NULL),
(20190032, 'Roksy', 20190003, NULL, NULL, '<p>Two ways to get proportional sizing. Either set the container (in your case ul) to a fixed height and then set the image height to 100% - don&#39;t state a width - the width will then be proportional to the height (that&#39;s what you want, right?). Alternatively, just set the image height, and leave the width unstated - again, the width will be proportional.</p>', NULL, NULL, 20190003, NULL, '20190032_1557642062.png', 1, NULL, 1, '2019-05-06', 1, '2019-05-12', NULL, NULL, NULL),
(20190033, 'Roksy', 20190003, NULL, NULL, '<p>Two ways to get proportional sizing. Either set the container (in your case ul) to a fixed height and then set the image height to 100% - don&#39;t state a width - the width will then be proportional to the height (that&#39;s what you want, right?). Alternatively, just set the image height, and leave the width unstated - again, the width will be proportional.</p>', NULL, NULL, 20190003, NULL, '20190033_1557133916.jpg', 1, NULL, 1, '2019-05-06', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nan_product_category`
--

DROP TABLE IF EXISTS `nan_product_category`;
CREATE TABLE IF NOT EXISTS `nan_product_category` (
  `PRODUCT_CATEGORY_ID` bigint(20) NOT NULL,
  `CATEGORY_NAME` varchar(200) DEFAULT NULL,
  `SHORT_CODE` varchar(10) DEFAULT NULL,
  `PARENT_PRODUCT_CATEGORY_ID` bigint(20) DEFAULT NULL,
  `LEVEL_NO` int(11) DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` date DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` date DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) DEFAULT NULL,
  `SHOP_ID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`PRODUCT_CATEGORY_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nan_product_category`
--

INSERT INTO `nan_product_category` (`PRODUCT_CATEGORY_ID`, `CATEGORY_NAME`, `SHORT_CODE`, `PARENT_PRODUCT_CATEGORY_ID`, `LEVEL_NO`, `ACTIVE_STATUS`, `REMARKS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`, `SHOP_ID`) VALUES
(20190001, 'T Shirt', 'TS', NULL, NULL, 1, NULL, 1, '2019-04-07', 1, '2019-05-13', NULL, NULL, NULL, 20190001),
(20190002, 'Saree', 'SR', NULL, NULL, 1, NULL, 1, '2019-04-07', 1, '2019-05-13', NULL, NULL, NULL, 20190001),
(20190003, 'kurti', 'KT', NULL, NULL, 1, NULL, 1, '2019-04-24', 1, '2019-05-13', NULL, NULL, NULL, 20190001),
(20190004, 'Shoes', 'S', NULL, NULL, 1, NULL, 1, '2019-05-05', 1, '2019-05-13', NULL, NULL, NULL, 20190002),
(20190005, 'Jacket', 'JK', NULL, NULL, 0, NULL, 1, '2019-05-13', NULL, NULL, NULL, NULL, NULL, 20190001);

-- --------------------------------------------------------

--
-- Table structure for table `nan_product_color`
--

DROP TABLE IF EXISTS `nan_product_color`;
CREATE TABLE IF NOT EXISTS `nan_product_color` (
  `PRODUCT_COLOR_ID` bigint(20) NOT NULL,
  `PRODUCT_ID` bigint(20) DEFAULT NULL,
  `COLOR_ID` bigint(20) DEFAULT NULL,
  `IMAGE_PATH` varchar(1000) DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` date DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` date DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`PRODUCT_COLOR_ID`),
  KEY `FK_NPC_NC` (`COLOR_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nan_product_color`
--

INSERT INTO `nan_product_color` (`PRODUCT_COLOR_ID`, `PRODUCT_ID`, `COLOR_ID`, `IMAGE_PATH`, `ACTIVE_STATUS`, `REMARKS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`) VALUES
(20190001, 20190001, 20190001, '20190001_1554636146.png', 1, NULL, 1, '2019-04-07', 1, '2019-04-20', NULL, NULL, NULL),
(20190002, 20190001, 20190002, '20190001_1554637537.png', 1, NULL, 1, '2019-04-07', NULL, NULL, NULL, NULL, NULL),
(20190003, 20190002, 20190002, '20190002_1554699222.png', 1, NULL, 1, '2019-04-08', 1, '2019-04-09', NULL, NULL, NULL),
(20190004, 20190002, 20190001, '20190002_1554797741.png', 1, NULL, 1, '2019-04-09', 1, '2019-04-20', NULL, NULL, NULL),
(20190005, 20190006, 20190001, '20190006_1555919504.png', 1, NULL, 1, '2019-04-22', NULL, NULL, NULL, NULL, NULL),
(20190006, 20190007, 20190003, '20190007_1556077496.png', 1, NULL, 1, '2019-04-24', NULL, NULL, NULL, NULL, NULL),
(20190007, 20190009, 20190001, '20190009_1556086493.jpg', 1, NULL, 1, '2019-04-24', NULL, NULL, NULL, NULL, NULL),
(20190008, 20190033, 20190001, '20190033_1557135027.jpg', 1, NULL, 1, '2019-05-06', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nan_product_price`
--

DROP TABLE IF EXISTS `nan_product_price`;
CREATE TABLE IF NOT EXISTS `nan_product_price` (
  `PRODUCT_PRICE_ID` bigint(20) NOT NULL,
  `PRODUCT_ID` bigint(20) DEFAULT NULL,
  `PRICE` decimal(10,2) DEFAULT NULL,
  `CURRENCY_ID` bigint(20) DEFAULT NULL,
  `SIZE_PRICE_EXIST` int(11) DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` date DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` date DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`PRODUCT_PRICE_ID`),
  KEY `FK_NPP_NP` (`PRODUCT_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nan_product_price`
--

INSERT INTO `nan_product_price` (`PRODUCT_PRICE_ID`, `PRODUCT_ID`, `PRICE`, `CURRENCY_ID`, `SIZE_PRICE_EXIST`, `ACTIVE_STATUS`, `REMARKS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`) VALUES
(20190001, 20190001, '820.00', 20190002, NULL, 0, NULL, 1, '2019-04-10', 1, '2019-04-24', NULL, NULL, NULL),
(20190003, 20190008, '120.00', 20190001, NULL, 1, NULL, 1, '2019-04-10', 1, '2019-04-10', NULL, NULL, NULL),
(20190002, 20190001, '850.00', 20190001, NULL, 1, NULL, 1, '2019-04-10', 1, '2019-04-24', NULL, NULL, NULL),
(20190004, 20190007, '80.00', 20190001, NULL, 1, NULL, 1, '2019-04-10', 1, '2019-04-10', NULL, NULL, NULL),
(20190005, 20190006, '70.00', 20190001, NULL, 1, NULL, 1, '2019-04-10', 1, '2019-04-10', NULL, NULL, NULL),
(20190006, 20190005, '130.00', 20190001, NULL, 1, NULL, 1, '2019-04-10', 1, '2019-04-10', NULL, NULL, NULL),
(20190007, 20190004, '75.00', 20190001, NULL, 1, NULL, 1, '2019-04-10', 1, '2019-04-10', NULL, NULL, NULL),
(20190008, 20190003, '550.00', 20190001, NULL, 1, NULL, 1, '2019-04-10', 1, '2019-04-24', NULL, NULL, NULL),
(20190009, 20190002, '140.00', 20190001, NULL, 1, NULL, 1, '2019-04-10', 1, '2019-04-10', NULL, NULL, NULL),
(20190010, 20190006, '175.00', 20190002, NULL, 0, NULL, 1, '2019-04-10', 1, '2019-04-10', NULL, NULL, NULL),
(20190011, 20190009, '4000.00', 20190001, NULL, 1, NULL, 1, '2019-04-24', NULL, NULL, NULL, NULL, NULL),
(20190012, 20190010, '450.00', 20190001, NULL, 1, NULL, 1, '2019-05-04', NULL, NULL, NULL, NULL, NULL),
(20190013, 20190011, '660.00', 20190001, NULL, 1, NULL, 1, '2019-05-04', NULL, NULL, NULL, NULL, NULL),
(20190014, 20190012, '450.00', 20190001, NULL, 1, NULL, 1, '2019-05-04', NULL, NULL, NULL, NULL, NULL),
(20190015, 20190013, '725.00', 20190001, NULL, 1, NULL, 1, '2019-05-04', NULL, NULL, NULL, NULL, NULL),
(20190016, 20190014, '330.00', 20190001, NULL, 1, NULL, 1, '2019-05-04', NULL, NULL, NULL, NULL, NULL),
(20190017, 20190015, '870.00', 20190001, NULL, 1, NULL, 1, '2019-05-04', NULL, NULL, NULL, NULL, NULL),
(20190018, 20190016, '330.00', 20190001, NULL, 1, NULL, 1, '2019-05-05', NULL, NULL, NULL, NULL, NULL),
(20190019, 20190017, '460.00', 20190001, NULL, 1, NULL, 1, '2019-05-05', NULL, NULL, NULL, NULL, NULL),
(20190020, 20190018, '660.00', 20190001, NULL, 1, NULL, 1, '2019-05-05', NULL, NULL, NULL, NULL, NULL),
(20190021, 20190019, '740.00', 20190001, NULL, 1, NULL, 1, '2019-05-05', NULL, NULL, NULL, NULL, NULL),
(20190022, 20190020, '870.00', 20190001, NULL, 1, NULL, 1, '2019-05-05', NULL, NULL, NULL, NULL, NULL),
(20190023, 20190021, '260.00', 20190001, NULL, 1, NULL, 1, '2019-05-05', NULL, NULL, NULL, NULL, NULL),
(20190024, 20190022, '250.00', 20190001, NULL, 1, NULL, 1, '2019-05-05', NULL, NULL, NULL, NULL, NULL),
(20190025, 20190023, '175.00', 20190001, NULL, 1, NULL, 1, '2019-05-05', NULL, NULL, NULL, NULL, NULL),
(20190026, 20190024, '630.00', 20190001, NULL, 1, NULL, 1, '2019-05-05', NULL, NULL, NULL, NULL, NULL),
(20190027, 20190028, '80.00', 20190001, NULL, 1, NULL, 1, '2019-05-06', NULL, NULL, NULL, NULL, NULL),
(20190028, 20190029, '870.00', 20190001, NULL, 1, NULL, 1, '2019-05-06', NULL, NULL, NULL, NULL, NULL),
(20190029, 20190030, '660.00', 20190001, NULL, 1, NULL, 1, '2019-05-06', NULL, NULL, NULL, NULL, NULL),
(20190030, 20190031, '660.00', 20190001, NULL, 1, NULL, 1, '2019-05-06', NULL, NULL, NULL, NULL, NULL),
(20190031, 20190032, '330.00', 20190001, NULL, 1, NULL, 1, '2019-05-06', NULL, NULL, NULL, NULL, NULL),
(20190032, 20190033, '260.00', 20190001, NULL, 1, NULL, 1, '2019-05-06', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nan_product_size`
--

DROP TABLE IF EXISTS `nan_product_size`;
CREATE TABLE IF NOT EXISTS `nan_product_size` (
  `PRODUCT_SIZE_ID` bigint(20) NOT NULL,
  `PRODUCT_ID` bigint(20) DEFAULT NULL,
  `SIZE` varchar(100) DEFAULT NULL,
  `IMAGE_PATH` varchar(1000) DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` date DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` date DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`PRODUCT_SIZE_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nan_product_size`
--

INSERT INTO `nan_product_size` (`PRODUCT_SIZE_ID`, `PRODUCT_ID`, `SIZE`, `IMAGE_PATH`, `ACTIVE_STATUS`, `REMARKS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`) VALUES
(20190001, 20190001, 'XL', '20190001_1554637152.png', 1, NULL, 1, '2019-04-07', 1, '2019-04-09', NULL, NULL, NULL),
(20190002, 20190002, 'SM', '20190002_1554701518.png', 1, NULL, 1, '2019-04-08', 1, '2019-04-09', NULL, NULL, NULL),
(20190003, 20190002, '32', '20190002_1554783538.png', 1, NULL, 1, '2019-04-09', 1, '2019-04-09', NULL, NULL, NULL),
(20190004, 20190002, 'XS', '20190002_1554794654.png', 1, NULL, 1, '2019-04-09', 1, '2019-04-09', NULL, NULL, NULL),
(20190005, 20190002, '42', '20190002_1554794803.png', 1, NULL, 1, '2019-04-09', 1, '2019-04-09', NULL, NULL, NULL),
(20190006, 20190006, '28', '20190006_1555919534.jpg', 1, NULL, 1, '2019-04-22', NULL, NULL, NULL, NULL, NULL),
(20190007, 20190007, 'XL', '20190007_1556077701.png', 1, NULL, 1, '2019-04-24', NULL, NULL, NULL, NULL, NULL),
(20190008, 20190033, 'XL', '20190033_1557135048.jpg', 1, NULL, 1, '2019-05-06', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nan_shop`
--

DROP TABLE IF EXISTS `nan_shop`;
CREATE TABLE IF NOT EXISTS `nan_shop` (
  `SHOP_ID` bigint(20) NOT NULL DEFAULT '0',
  `SHOP_NAME` varchar(200) COLLATE utf16_unicode_ci DEFAULT NULL,
  `SHORT_CODE` varchar(10) COLLATE utf16_unicode_ci DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) COLLATE utf16_unicode_ci DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` date DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` date DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) COLLATE utf16_unicode_ci DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) COLLATE utf16_unicode_ci DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) COLLATE utf16_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`SHOP_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `nan_shop`
--

INSERT INTO `nan_shop` (`SHOP_ID`, `SHOP_NAME`, `SHORT_CODE`, `ACTIVE_STATUS`, `REMARKS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`) VALUES
(20190001, 'Clothing', 'CL', 1, NULL, 1, '2019-05-13', 1, '2019-05-13', NULL, NULL, NULL),
(20190002, 'Shoes', 'SH', 1, NULL, 1, '2019-05-13', 1, '2019-05-13', NULL, NULL, NULL),
(20190003, 'Life Style', 'LS', 1, NULL, 1, '2019-05-13', NULL, NULL, NULL, NULL, NULL),
(20190004, 'Home & Livings', 'HL', 1, NULL, 1, '2019-05-13', NULL, NULL, NULL, NULL, NULL),
(20190005, 'Health & Fitness', 'HF', 1, NULL, 1, '2019-05-13', NULL, NULL, NULL, NULL, NULL),
(20190006, 'Daily Needs', 'DN', 1, NULL, 1, '2019-05-13', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nan_slide_image`
--

DROP TABLE IF EXISTS `nan_slide_image`;
CREATE TABLE IF NOT EXISTS `nan_slide_image` (
  `SLIDE_IMAGE_ID` bigint(20) NOT NULL,
  `IMAGE_TITLE` varchar(500) DEFAULT NULL,
  `IMAGE_DESC` varchar(2000) DEFAULT NULL,
  `IMAGE_PATH` varchar(500) DEFAULT NULL,
  `IMAGE_PAGE` varchar(50) DEFAULT NULL,
  `PAGE_SHORT_CODE` varchar(10) DEFAULT NULL,
  `PAGE_LOC` varchar(100) DEFAULT NULL,
  `PAGE_LOC_SHORT_CODE` varchar(10) DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` date DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` date DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) DEFAULT NULL,
  `FLEX_FIELD4` varchar(500) DEFAULT NULL,
  `FLEX_FIELD5` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`SLIDE_IMAGE_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nan_slide_image`
--

INSERT INTO `nan_slide_image` (`SLIDE_IMAGE_ID`, `IMAGE_TITLE`, `IMAGE_DESC`, `IMAGE_PATH`, `IMAGE_PAGE`, `PAGE_SHORT_CODE`, `PAGE_LOC`, `PAGE_LOC_SHORT_CODE`, `ACTIVE_STATUS`, `REMARKS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`, `FLEX_FIELD4`, `FLEX_FIELD5`) VALUES
(20190001, 'Crepe Silk Saree', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 3</p>', 'banner-2 (1)_1554977594.jpg', NULL, NULL, NULL, NULL, 1, NULL, 2, '2019-03-09', 1, '2019-04-11', NULL, NULL, NULL, NULL, NULL),
(20190002, 'Crepe Silk Saree', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 2</p>', 'slider_1554977340.png', NULL, NULL, NULL, NULL, 1, NULL, 2, '2019-03-09', 1, '2019-04-11', NULL, NULL, NULL, NULL, NULL),
(20190003, 'Crepe Silk Saree', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1</p>', 'add01_1554977169.png', NULL, NULL, NULL, NULL, 1, NULL, 2, '2019-03-09', 1, '2019-04-11', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('test@mail.com', '$2y$10$7kjkvLkGbLlWgBwfYGKm5OH7qKTlaex6rnhZI3KweoTxmqNTMF.Pq', '2019-04-01 00:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'HR Rahman', 'test@mail.com', NULL, '$2y$10$pCHaVWFU448IA/Yl2/OxI.oaUfd.FMEo/o1iL2hNfKZ4Wfdx4VoSW', 'Mn9LF5oz36MnKADrgd09ovoQFcQ3lhSbK38UO4lvVupHH6IWbcWhEkj6FRNq', '2019-04-01 00:36:34', '2019-04-01 00:36:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
