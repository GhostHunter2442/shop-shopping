-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2020 at 06:48 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress1` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress2` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress3` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stdefalse` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `other` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `firstname`, `lastname`, `email`, `phonenumber`, `adress1`, `adress2`, `adress3`, `stdefalse`, `other`, `user_id`, `created_at`, `updated_at`) VALUES
(18, 'ภัทราภรณ์', 'เปรี้ยวหวาน', 'benz_bet@Hotmail.com', '0862741141', 'ตลาดใหญ่, เมืองภูเก็ต, ภูเก็ต, 83000', '197/890', NULL, '1', NULL, 4, '2020-06-17 09:39:24', '2020-07-30 18:41:39'),
(20, 'somchais', 'jaidee', 'somchai@Hotmail.com', '2225487480', 'คลองทรายขาว, กงหรา, พัทลุง, 93180', '122/220', NULL, '0', NULL, 4, '2020-06-17 09:39:24', '2020-08-01 11:34:12'),
(21, 'ghosts', 'hunter', 'customer@gamil.com', '0862741141', 'ตลาดใหญ่, เมืองภูเก็ต, ภูเก็ต, 83000', '222', NULL, '1', 'null', 5, '2020-06-23 06:40:24', '2020-07-24 12:00:57'),
(31, 'อภิเดช', 'เกิดปากแพรก', 'bet_apidet@hotmail.com', '0869845111', 'กรูด, กาญจนดิษฐ์, สุราษฎร์ธานี, 84160', '97/89', NULL, '0', NULL, 4, '2020-07-01 09:37:38', '2020-07-30 18:41:39'),
(34, 'ภัทราภรณ', 'เปรี้ยวหวาน', 'benz_bet42@Hotmail.com', '0869845111', 'บางขนุน, บางกรวย, นนทบุรี, 11130', '97/89', NULL, '0', NULL, 5, '2020-07-01 10:53:04', '2020-07-24 12:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bankpic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nopic.png',
  `detail` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subdetail` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accountid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stdefalse` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `status` enum('normal','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `bankpic`, `detail`, `subdetail`, `account`, `accountid`, `stdefalse`, `status`, `created_at`, `updated_at`) VALUES
(1, 'กสิกร', '5f19426f5fc23.png', 'ธนาคารกสิกรไทย', 'สาขา มอ.ภูเก็ต', 'อภิเดช เกิดปากแพรก', '0684785255', 0, 'normal', '2020-06-24 08:19:44', '2020-07-23 08:19:14'),
(2, 'กรุงไทย', '5f1942688513c.png', 'ธนาคารกรุงไทย', 'สาขา เซนทรัลภูเก็ต', 'ภัทราภรณ์ เปรียวหวาน', '0988751473', 0, 'normal', '2020-06-24 08:19:44', '2020-07-23 07:55:20'),
(3, 'ไทยพาณิชย์', '5f19425ac1529.png', 'ธนาคารไทยพาณิชย์', 'สาขา เซนทรัลภูเก็ต', 'อภิเดช เกิดปากแพรก', '0124774572', 0, 'normal', '2020-06-24 08:20:44', '2020-07-23 07:55:06'),
(4, 'กรุงศรี', '5f19420d1f724.png', 'ธนาคารกรุ่งศรี', 'สาขา บิ๊กซี ภูเก็ต', 'อภิเดช เกิดปากแพรก', '0124774888', 0, 'normal', '2020-06-24 08:20:44', '2020-07-23 08:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`user_id`, `product_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 197, 2, '2020-08-01 18:57:31', '2020-08-01 18:58:43'),
(4, 197, 1, '2020-08-01 18:36:54', '2020-08-02 03:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Casio', '2020-05-13 08:10:11', '2020-05-13 08:10:11'),
(2, 'Rolex', '2020-05-13 08:11:38', '2020-05-13 08:11:38'),
(3, 'Apple Watch', '2020-05-13 08:12:24', '2020-05-13 08:12:24'),
(4, 'Seko', '2020-05-14 08:10:13', '2020-05-14 08:10:13'),
(5, 'Huawei', '2020-06-05 11:41:13', '2020-06-05 11:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percen` int(11) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `code` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_id` mediumtext COLLATE utf8mb4_unicode_ci,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `status` enum('normal','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `percen`, `discount`, `code`, `end_datetime`, `product_id`, `detail`, `status`, `created_at`, `updated_at`) VALUES
(1, 'WATCH MID YEAR SALE', 15, '400.00', 'WTHMID13', '2020-08-30 17:00:00', 'a:200:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";i:8;s:1:\"9\";i:9;s:2:\"10\";i:10;s:2:\"11\";i:11;s:2:\"12\";i:12;s:2:\"13\";i:13;s:2:\"14\";i:14;s:2:\"15\";i:15;s:2:\"16\";i:16;s:2:\"17\";i:17;s:2:\"18\";i:18;s:2:\"19\";i:19;s:2:\"20\";i:20;s:2:\"21\";i:21;s:2:\"22\";i:22;s:2:\"23\";i:23;s:2:\"24\";i:24;s:2:\"25\";i:25;s:2:\"26\";i:26;s:2:\"27\";i:27;s:2:\"28\";i:28;s:2:\"29\";i:29;s:2:\"30\";i:30;s:2:\"31\";i:31;s:2:\"32\";i:32;s:2:\"33\";i:33;s:2:\"34\";i:34;s:2:\"35\";i:35;s:2:\"36\";i:36;s:2:\"37\";i:37;s:2:\"38\";i:38;s:2:\"39\";i:39;s:2:\"40\";i:40;s:2:\"41\";i:41;s:2:\"42\";i:42;s:2:\"43\";i:43;s:2:\"44\";i:44;s:2:\"45\";i:45;s:2:\"46\";i:46;s:2:\"47\";i:47;s:2:\"48\";i:48;s:2:\"49\";i:49;s:2:\"50\";i:50;s:2:\"51\";i:51;s:2:\"52\";i:52;s:2:\"53\";i:53;s:2:\"54\";i:54;s:2:\"55\";i:55;s:2:\"56\";i:56;s:2:\"57\";i:57;s:2:\"58\";i:58;s:2:\"59\";i:59;s:2:\"60\";i:60;s:2:\"61\";i:61;s:2:\"62\";i:62;s:2:\"63\";i:63;s:2:\"64\";i:64;s:2:\"65\";i:65;s:2:\"66\";i:66;s:2:\"67\";i:67;s:2:\"68\";i:68;s:2:\"69\";i:69;s:2:\"70\";i:70;s:2:\"71\";i:71;s:2:\"72\";i:72;s:2:\"73\";i:73;s:2:\"74\";i:74;s:2:\"75\";i:75;s:2:\"76\";i:76;s:2:\"77\";i:77;s:2:\"78\";i:78;s:2:\"79\";i:79;s:2:\"80\";i:80;s:2:\"81\";i:81;s:2:\"82\";i:82;s:2:\"83\";i:83;s:2:\"84\";i:84;s:2:\"85\";i:85;s:2:\"86\";i:86;s:2:\"87\";i:87;s:2:\"88\";i:88;s:2:\"89\";i:89;s:2:\"90\";i:90;s:2:\"91\";i:91;s:2:\"92\";i:92;s:2:\"93\";i:93;s:2:\"94\";i:94;s:2:\"95\";i:95;s:2:\"96\";i:96;s:2:\"97\";i:97;s:2:\"98\";i:98;s:2:\"99\";i:99;s:3:\"100\";i:100;s:3:\"101\";i:101;s:3:\"102\";i:102;s:3:\"103\";i:103;s:3:\"104\";i:104;s:3:\"105\";i:105;s:3:\"106\";i:106;s:3:\"107\";i:107;s:3:\"108\";i:108;s:3:\"109\";i:109;s:3:\"110\";i:110;s:3:\"111\";i:111;s:3:\"112\";i:112;s:3:\"113\";i:113;s:3:\"114\";i:114;s:3:\"115\";i:115;s:3:\"116\";i:116;s:3:\"117\";i:117;s:3:\"118\";i:118;s:3:\"119\";i:119;s:3:\"120\";i:120;s:3:\"121\";i:121;s:3:\"122\";i:122;s:3:\"123\";i:123;s:3:\"124\";i:124;s:3:\"125\";i:125;s:3:\"126\";i:126;s:3:\"127\";i:127;s:3:\"128\";i:128;s:3:\"129\";i:129;s:3:\"130\";i:130;s:3:\"131\";i:131;s:3:\"132\";i:132;s:3:\"133\";i:133;s:3:\"134\";i:134;s:3:\"135\";i:135;s:3:\"136\";i:136;s:3:\"137\";i:137;s:3:\"138\";i:138;s:3:\"139\";i:139;s:3:\"140\";i:140;s:3:\"141\";i:141;s:3:\"142\";i:142;s:3:\"143\";i:143;s:3:\"144\";i:144;s:3:\"145\";i:145;s:3:\"146\";i:146;s:3:\"147\";i:147;s:3:\"148\";i:148;s:3:\"149\";i:149;s:3:\"150\";i:150;s:3:\"151\";i:151;s:3:\"152\";i:152;s:3:\"153\";i:153;s:3:\"154\";i:154;s:3:\"155\";i:155;s:3:\"156\";i:156;s:3:\"157\";i:157;s:3:\"158\";i:158;s:3:\"159\";i:159;s:3:\"160\";i:160;s:3:\"161\";i:161;s:3:\"162\";i:162;s:3:\"163\";i:163;s:3:\"164\";i:164;s:3:\"165\";i:165;s:3:\"166\";i:166;s:3:\"167\";i:167;s:3:\"168\";i:168;s:3:\"169\";i:169;s:3:\"170\";i:170;s:3:\"171\";i:171;s:3:\"172\";i:172;s:3:\"173\";i:173;s:3:\"174\";i:174;s:3:\"175\";i:175;s:3:\"176\";i:176;s:3:\"177\";i:177;s:3:\"178\";i:178;s:3:\"179\";i:179;s:3:\"180\";i:180;s:3:\"181\";i:181;s:3:\"182\";i:182;s:3:\"183\";i:183;s:3:\"184\";i:184;s:3:\"185\";i:185;s:3:\"186\";i:186;s:3:\"187\";i:187;s:3:\"188\";i:188;s:3:\"189\";i:189;s:3:\"190\";i:190;s:3:\"191\";i:191;s:3:\"192\";i:192;s:3:\"193\";i:193;s:3:\"194\";i:194;s:3:\"195\";i:195;s:3:\"196\";i:196;s:3:\"197\";i:197;s:3:\"198\";i:198;s:3:\"199\";i:199;s:3:\"200\";}', NULL, 'normal', '2020-07-30 08:21:01', '2020-07-31 17:06:14'),
(2, 'WATCH 7.7 SALES', 10, '350.00', 'WTHCIR77', '2020-08-30 17:00:00', 'a:4:{i:0;s:1:\"3\";i:1;s:3:\"189\";i:2;s:3:\"199\";i:3;s:3:\"200\";}', NULL, 'normal', '2020-07-30 08:25:24', '2020-07-31 17:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`user_id`, `product_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 189, 1, '2020-07-28 10:30:41', '2020-07-28 10:30:41'),
(1, 197, 1, '2020-07-28 18:14:38', '2020-07-28 18:14:38'),
(1, 198, 1, '2020-07-29 18:51:17', '2020-07-29 18:51:17'),
(1, 199, 1, '2020-07-29 18:28:15', '2020-07-29 18:28:15'),
(1, 200, 1, '2020-07-26 17:28:34', '2020-07-26 17:28:34'),
(1, 400, 1, '2020-07-25 17:29:03', '2020-07-25 17:29:03'),
(4, 189, 1, '2020-07-28 10:53:28', '2020-07-28 10:53:28'),
(4, 197, 1, '2020-07-28 17:39:47', '2020-07-28 17:39:47'),
(4, 198, 1, '2020-07-29 16:49:08', '2020-07-29 16:49:08'),
(4, 199, 1, '2020-08-01 18:22:21', '2020-08-01 18:22:21'),
(4, 200, 1, '2020-07-28 11:06:42', '2020-07-28 11:06:42'),
(4, 399, 1, '2020-07-25 09:07:03', '2020-07-25 09:07:03'),
(4, 400, 1, '2020-07-25 10:00:40', '2020-07-25 10:00:40'),
(5, 198, 1, '2020-07-31 11:21:20', '2020-07-31 11:21:20'),
(5, 199, 1, '2020-07-30 18:47:32', '2020-07-30 18:47:32'),
(5, 200, 1, '2020-07-27 16:42:25', '2020-07-27 16:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `generals`
--

CREATE TABLE `generals` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_time` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `close_time` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map_fram` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generals`
--

INSERT INTO `generals` (`id`, `name`, `email`, `adress`, `phonenumber`, `open_time`, `close_time`, `map_fram`, `created_at`, `updated_at`) VALUES
(1, 'watch shop', 'watch_ctime@shop.com', '97 เมืองภูเก็ต ภูเก็ต', '086-984-5111', '8:00 AM', '12:00 PM', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1976.0839159572015!2d98.38613493512825!3d7.877501477344947!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x305031fd229b639f%3A0x4dbb886cda5a3ed!2s7-Eleven!5e0!3m2!1sen!2sth!4v1596196405316!5m2!1sen!2sth\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', NULL, '2020-07-31 13:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `address_id` int(10) UNSIGNED NOT NULL,
  `bank_id` int(10) UNSIGNED DEFAULT '0',
  `paymentid` int(10) UNSIGNED NOT NULL,
  `status_order` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `track_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `paypic` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT 'nopic.png',
  `price` decimal(10,2) DEFAULT NULL,
  `lastaccount` int(10) UNSIGNED DEFAULT NULL,
  `payment_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distcode` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `user_id`, `address_id`, `bank_id`, `paymentid`, `status_order`, `track_code`, `paypic`, `price`, `lastaccount`, `payment_id`, `distcode`, `created_at`, `updated_at`) VALUES
('SPV202000001', 4, 20, NULL, 2, 1, '-', 'nopic.png', '2985.00', NULL, NULL, 'WE203', '2020-07-27 10:54:21', '2020-08-01 03:36:12'),
('SPV202000002', 4, 18, 2, 1, 4, 'PTTK000138359', '5f1eef8564745.jpeg', '7448.00', 1234, NULL, 'WE203', '2020-07-27 15:15:17', '2020-07-31 19:14:01'),
('SPV202000003', 4, 20, NULL, 2, 4, '-', 'nopic.png', '20205.00', NULL, NULL, 'WE203', '2020-07-27 16:06:53', '2020-07-27 19:52:07'),
('SPV202000004', 5, 21, NULL, 3, 4, '-', 'nopic.png', '3104.40', NULL, 'chrg_test_5kohdr5ja6kkicethf6', 'WE203', '2020-07-27 16:41:23', '2020-07-28 18:20:51'),
('SPV202000005', 5, 21, NULL, 2, 4, '-', 'nopic.png', '7694.00', NULL, NULL, 'WE203', '2020-07-28 17:13:43', '2020-07-31 02:45:25'),
('SPV202000006', 5, 34, NULL, 2, 4, '-', 'nopic.png', '300000.00', NULL, NULL, 'WE203', '2020-07-28 17:14:52', '2020-07-31 10:52:33'),
('SPV202000007', 5, 34, 1, 1, 1, '-', '5f23150054f14.jpeg', '7694.00', 1234, NULL, 'WE203', '2020-07-30 18:44:16', '2020-07-30 18:44:16'),
('SPV202000008', 4, 18, NULL, 3, 4, '-', 'nopic.png', '1351.48', NULL, 'chrg_test_5kpy9fxjh5r0inzwpi2', 'WE203', '2020-07-31 10:49:15', '2020-07-31 10:52:00'),
('SPV202000009', 5, 34, 3, 1, 1, '-', '5f23f87a82f3d.jpeg', '5575.00', 1234, NULL, 'WE203', '2020-07-31 10:54:50', '2020-07-31 10:54:50'),
('SPV202000010', 5, 21, 1, 1, 2, '-', '5f23fdea176be.jpeg', '8540.00', 1234, NULL, 'WE203', '2020-07-31 11:18:02', '2020-08-01 05:21:44'),
('SPV202000011', 5, 21, NULL, 2, 2, '-', 'nopic.png', '8482.78', NULL, NULL, 'WE203', '2020-07-31 11:18:38', '2020-07-31 16:39:48'),
('SPV202000012', 4, 18, NULL, 2, 5, '-', 'nopic.png', '25527.22', NULL, NULL, 'WE203', '2020-08-01 03:38:06', '2020-08-01 03:39:15'),
('SPV202000013', 4, 18, NULL, 2, 5, '-', 'nopic.png', '14089.07', NULL, NULL, 'WE203', '2020-08-01 04:54:49', '2020-08-01 04:56:43'),
('SPV202000014', 4, 20, 1, 1, 5, '-', '5f25505c5df0d.jpeg', '14988.00', 1234, NULL, 'WE203', '2020-08-01 11:22:04', '2020-08-01 11:22:11'),
('SPV202000015', 4, 18, NULL, 3, 1, '-', 'nopic.png', '6214.00', NULL, 'chrg_test_5kqcqkihr5ujeyhgrsq', 'WE203', '2020-08-01 11:29:38', '2020-08-01 11:29:38'),
('SPV202000016', 4, 18, NULL, 2, 5, '-', 'nopic.png', '635214.09', NULL, NULL, 'WE203', '2020-08-01 11:57:25', '2020-08-01 11:57:34'),
('SPV202000017', 4, 31, 3, 1, 4, '-', '5f255c307786a.jpeg', '17000.00', 1234, NULL, 'WE203', '2020-08-01 12:12:32', '2020-08-02 03:54:09'),
('SPV202000018', 4, 18, NULL, 2, 5, '-', 'nopic.png', '2105.72', NULL, NULL, 'WE203', '2020-08-01 18:35:35', '2020-08-01 18:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_05_12_195928_create_social_accounts_table', 2),
(4, '2020_05_13_142059_create_categories_table', 3),
(11, '2020_05_16_173300_create_carts_table', 6),
(13, '2020_05_23_140905_add_userrole_to_users_table', 7),
(14, '2020_05_23_164208_create_permission_tables', 8),
(16, '2020_06_07_120706_create_favorites_table', 10),
(20, '2020_06_16_161416_create_addresses_table', 11),
(54, '2020_06_24_143229_create_banks_table', 12),
(81, '2020_06_23_101851_create_invoices_table', 13),
(83, '2020_05_13_154342_create_profiles_table', 15),
(84, '2020_05_16_173504_create_orders_table', 16),
(91, '2020_05_13_143146_create_products_table', 18),
(94, '2020_07_27_093524_create_ratings_table', 19),
(101, '2020_07_30_095027_create_coupons_table', 20),
(102, '2020_07_24_133024_create_generals_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 2),
(1, 'App\\User', 4),
(1, 'App\\User', 5),
(1, 'App\\User', 25),
(2, 'App\\User', 24),
(3, 'App\\User', 24),
(4, 'App\\User', 2),
(4, 'App\\User', 3),
(4, 'App\\User', 24),
(5, 'App\\User', 2),
(5, 'App\\User', 3),
(5, 'App\\User', 24),
(6, 'App\\User', 2),
(6, 'App\\User', 3),
(6, 'App\\User', 24),
(7, 'App\\User', 24);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 1),
(2, 'App\\User', 2),
(2, 'App\\User', 4),
(2, 'App\\User', 5),
(2, 'App\\User', 25),
(3, 'App\\User', 3),
(3, 'App\\User', 24);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice_id`, `user_id`, `product_id`, `qty`, `price`, `total`, `created_at`, `updated_at`) VALUES
(1, 'SPV202000001', 4, 200, 1, '2985.00', '2985.00', '2020-07-27 10:54:21', '2020-07-27 10:54:21'),
(2, 'SPV202000002', 4, 39, 1, '7448.00', '7448.00', '2020-07-27 15:15:18', '2020-07-27 15:15:18'),
(3, 'SPV202000003', 4, 200, 1, '2985.00', '2985.00', '2020-07-27 16:06:53', '2020-07-27 16:06:53'),
(4, 'SPV202000003', 4, 189, 1, '8540.00', '8540.00', '2020-07-27 16:06:53', '2020-07-27 16:06:53'),
(5, 'SPV202000003', 4, 76, 1, '8680.00', '8680.00', '2020-07-27 16:06:53', '2020-07-27 16:06:53'),
(6, 'SPV202000004', 5, 200, 1, '2985.00', '2985.00', '2020-07-27 16:41:24', '2020-07-27 16:41:24'),
(7, 'SPV202000005', 5, 197, 1, '7694.00', '7694.00', '2020-07-28 17:13:43', '2020-07-28 17:13:43'),
(8, 'SPV202000006', 5, 198, 1, '300000.00', '300000.00', '2020-07-28 17:14:52', '2020-07-28 17:14:52'),
(9, 'SPV202000007', 5, 197, 1, '7694.00', '7694.00', '2020-07-30 18:44:16', '2020-07-30 18:44:16'),
(10, 'SPV202000008', 4, 92, 1, '1462.00', '1462.00', '2020-07-31 10:49:16', '2020-07-31 10:49:16'),
(11, 'SPV202000009', 5, 199, 1, '5975.00', '5975.00', '2020-07-31 10:54:50', '2020-07-31 10:54:50'),
(12, 'SPV202000010', 5, 189, 1, '8540.00', '8540.00', '2020-07-31 11:18:02', '2020-07-31 11:18:02'),
(13, 'SPV202000011', 5, 118, 1, '8226.00', '8226.00', '2020-07-31 11:18:38', '2020-07-31 11:18:38'),
(14, 'SPV202000012', 4, 197, 1, '7694.00', '7694.00', '2020-08-01 03:38:06', '2020-08-01 03:38:06'),
(15, 'SPV202000012', 4, 189, 2, '8540.00', '17080.00', '2020-08-01 03:38:07', '2020-08-01 03:38:07'),
(16, 'SPV202000013', 4, 197, 1, '7694.00', '7694.00', '2020-08-01 04:54:49', '2020-08-01 04:54:49'),
(17, 'SPV202000013', 4, 199, 1, '5975.00', '5975.00', '2020-08-01 04:54:49', '2020-08-01 04:54:49'),
(18, 'SPV202000014', 4, 197, 2, '7694.00', '15388.00', '2020-08-01 11:22:04', '2020-08-01 11:22:04'),
(19, 'SPV202000015', 4, 199, 1, '5975.00', '5975.00', '2020-08-01 11:29:39', '2020-08-01 11:29:39'),
(20, 'SPV202000016', 4, 198, 2, '300000.00', '600000.00', '2020-08-01 11:57:26', '2020-08-01 11:57:26'),
(21, 'SPV202000016', 4, 186, 1, '9560.00', '9560.00', '2020-08-01 11:57:26', '2020-08-01 11:57:26'),
(22, 'SPV202000016', 4, 101, 1, '7143.00', '7143.00', '2020-08-01 11:57:26', '2020-08-01 11:57:26'),
(23, 'SPV202000017', 4, 197, 1, '7694.00', '7694.00', '2020-08-01 12:12:32', '2020-08-01 12:12:32'),
(24, 'SPV202000018', 4, 23, 1, '2324.00', '2324.00', '2020-08-01 18:35:35', '2020-08-01 18:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('bet_apidet@hotmail.com', '$2y$10$oMSnf3gLmKHcj33TF6cdseOZL/ViIerSv58hYa5vdHTY2L9VDSOe6', '2020-06-10 08:41:44');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'viewSales', 'web', '2020-05-23 10:45:00', '2020-05-23 10:45:00'),
(2, 'viewCategory', 'web', '2020-05-23 10:45:00', '2020-05-23 10:45:00'),
(3, 'viewProduct', 'web', '2020-05-23 10:45:00', '2020-05-23 10:45:00'),
(4, 'viewAcceptOrder', 'web', '2020-05-23 10:45:00', '2020-05-23 10:45:00'),
(5, 'viewPreOrder', 'web', '2020-05-23 10:45:00', '2020-05-23 10:45:00'),
(6, 'viewSentOrder', 'web', '2020-05-23 10:45:00', '2020-05-23 10:45:00'),
(7, 'viewDashboardReport', 'web', '2020-05-23 10:45:00', '2020-05-23 10:45:00'),
(8, 'viewCoupon', 'web', '2020-05-23 10:45:00', '2020-05-23 10:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `discount` int(11) DEFAULT '0',
  `weight` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` mediumtext COLLATE utf8mb4_unicode_ci,
  `picture` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nopic.png',
  `picture_detail_one` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nopic.png',
  `picture_detail_two` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nopic.png',
  `picture_detail_three` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nopic.png',
  `status` enum('normal','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `price`, `stock`, `discount`, `weight`, `detail`, `picture`, `picture_detail_one`, `picture_detail_two`, `picture_detail_three`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Quos hic aperiam repudiandae facere animi.', 'quam-aut-sed-sunt-nulla-ea-sed', '5943.00', 10, 10, '1', 'Cumque maxime accusamus error. Maiores error doloribus et aliquam iure ipsam incidunt. Sunt rerum ut voluptatem aspernatur ducimus tempore. Quam nostrum architecto voluptatum deleniti animi et. Quibusdam dignissimos aliquid veritatis. Voluptatem dolor id praesentium. Nisi est quos suscipit est iure. Minima sit accusantium hic sed aliquid. Dolores quo adipisci vel et cupiditate nam. Id aut alias magni voluptatem ut delectus incidunt.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '1970-01-23 20:53:48', '2011-06-07 11:15:38'),
(2, 'Laborum accusamus culpa dolores aut.', 'reiciendis-quia-provident-debitis-qui', '3656.00', 3, 26, '2', 'Consequatur alias sapiente qui ullam. Quis cumque nulla vero dolore rem. Iure qui repellat qui molestiae. Accusamus quia ut perspiciatis dignissimos. Optio vel minus eligendi rerum. Officiis aut dolorum est qui tenetur saepe. Qui ratione quia alias quidem voluptatum quibusdam. Sit pariatur voluptatibus molestiae omnis porro officia. Tenetur ex possimus molestias nulla. Harum incidunt non qui odio natus eligendi.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '2014-10-15 00:53:36', '1970-09-30 20:01:06'),
(3, 'Corrupti tempore omnis.', 'sit-quia-aliquam-ea-aut-et-maxime-blanditiis-quis', '3821.00', 9, 42, '2', 'Debitis et ex magnam minima dolores. Qui quaerat nihil voluptate rem. Quia illum quos autem reprehenderit. Quibusdam voluptatem facere sit qui. Enim molestias rerum in eaque amet vero. Temporibus dolor facilis voluptatem. Id rerum possimus quo quasi veniam sit. Optio velit similique ab mollitia. Illum blanditiis velit vitae beatae ea pariatur mollitia. Et atque rerum natus ipsam. Consequatur quis ut ducimus sint ea consequatur.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '2011-04-21 01:28:42', '2014-08-24 18:17:28'),
(4, 'Quibusdam et dolores assumenda sit.', 'quisquam-delectus-et-fugiat-nesciunt', '8894.00', 4, 31, '2', 'Qui qui laboriosam neque dicta sunt debitis sit quasi. Vel voluptatem iure doloribus vel. Aut at praesentium neque distinctio est et ullam. Tempora architecto est velit voluptas. Optio eos sint aut soluta magnam. Architecto quos repellat iusto. Rerum sequi sunt quibusdam aliquid cumque repudiandae assumenda. Rerum est qui et temporibus consequuntur quam tenetur eos. Sit corrupti deleniti consectetur vitae laborum sed esse quibusdam.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '2018-06-29 15:56:32', '1970-03-15 17:47:06'),
(5, 'Et voluptatem asperiores nisi.', 'non-laboriosam-cumque-corporis-eum-quis', '2919.00', 6, 40, '1', 'Enim illo ut debitis. Modi commodi doloribus harum ipsam totam rem. Quam est aperiam dolores qui. Nam illum possimus iste recusandae minus. Vel dolorem facere dolor adipisci in eveniet ex magni. Architecto recusandae numquam qui omnis dolorum quia explicabo. Qui earum magnam numquam temporibus omnis voluptas. Beatae ut saepe qui sequi. Maxime sed corrupti ad qui occaecati eum. Id sit eos alias unde. Nulla laboriosam nam voluptas. Ipsam aperiam eos autem mollitia nulla eveniet labore molestiae.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1994-06-08 01:00:53', '2018-10-27 13:08:37'),
(6, 'Molestiae cumque molestiae ad.', 'beatae-optio-corrupti-consequuntur-asperiores', '6380.00', 1, 36, '2', 'Quae ipsum eveniet doloribus ipsam quidem. Quibusdam ut ab explicabo fugit voluptatem saepe. Eaque cumque aut ut voluptatem. Et ab quod provident qui dolorem. Laborum placeat aspernatur totam quaerat eum. Error et eum minus dignissimos perspiciatis sed aspernatur. Qui fugiat nulla dolorem qui numquam. Molestiae deleniti repellat quia earum occaecati harum dolorum velit. Minima ex aperiam et laboriosam eligendi laudantium distinctio.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '2006-07-26 00:06:44', '2000-02-18 05:57:05'),
(7, 'Maxime enim sunt qui.', 'ullam-quae-vel-consequatur-animi-est-sit-et', '2791.00', 5, 29, '1', 'Aut ut dolor odio non. Voluptas laboriosam quia similique amet non optio quo. Est commodi ducimus iste incidunt. Quibusdam blanditiis ab dignissimos rem minima. Voluptas excepturi corporis tempora error magnam. Ea enim fuga itaque sit iste. Asperiores expedita nihil at aut dolores aliquid reprehenderit. Sint dolorum ducimus eligendi voluptas. Error suscipit qui sint et harum et molestias. Omnis rem adipisci officiis repellat expedita qui cum. Facere incidunt et veritatis.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1989-11-29 15:30:22', '2019-03-25 04:45:59'),
(8, 'Sit aliquid laudantium unde sunt porro.', 'atque-labore-laudantium-recusandae-illum-ratione', '3619.00', 8, 30, '2', 'Aspernatur est animi ex quos. Unde assumenda similique cumque sed cupiditate illum ducimus. Natus fugiat laudantium consectetur non reiciendis. Ipsam asperiores nisi nesciunt voluptas facilis id inventore voluptates. Rem ipsa in hic repellat quis. Mollitia ad perspiciatis ad. Eaque sit quis eligendi nam assumenda iure. Voluptate veritatis vel magni inventore ut voluptatibus rerum nobis. Sint vel aut alias aut quae optio corrupti.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1989-01-23 15:37:38', '1984-01-09 05:00:53'),
(9, 'Tempora distinctio quidem ut et aut.', 'quos-eius-officiis-ratione-est-est-fugiat-at', '5324.00', 1, 21, '2', 'In beatae sunt officia ad. Cum corporis aut commodi unde. Pariatur delectus eum occaecati et sed fugit hic. Saepe voluptatibus provident numquam et consectetur placeat dolorem. Autem modi eum sequi deleniti temporibus eveniet. Neque occaecati asperiores fugiat. Fugiat reprehenderit officiis consequatur omnis eos sint.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1995-01-12 02:39:13', '1975-11-07 12:05:52'),
(10, 'Quaerat quo ullam repudiandae illum.', 'accusantium-cupiditate-minima-atque-adipisci-velit', '3884.00', 9, 35, '2', 'Voluptas repellat occaecati nam. Quidem aut qui non qui ratione minus cum et. Esse dolorem soluta a quidem velit optio. Dolores et accusantium id voluptates. Praesentium quaerat quam nihil eos commodi. Ratione deleniti et rerum. Cupiditate a architecto omnis ea sapiente aperiam recusandae. Aut eligendi occaecati aut pariatur enim. Et fuga qui sequi quia. Et quibusdam qui aut blanditiis maxime tempore delectus porro. Quod iure est eveniet cupiditate expedita nostrum.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '1984-04-07 12:09:19', '2003-04-05 23:31:03'),
(11, 'Nulla veritatis harum fugiat.', 'qui-quasi-velit-enim-perferendis-velit-saepe', '4913.00', 9, 19, '2', 'Eos rem distinctio facilis molestiae quis. Et doloribus quae quo provident. Asperiores culpa aut sapiente. Ipsum neque nulla illo deserunt fugiat repellendus. Ut nulla qui et commodi nesciunt debitis vitae. Maxime veritatis quam quia voluptatibus. Magnam nihil architecto vel ipsam. Quis et aut occaecati quam fugiat eum. Ea aut alias ad. Ut dignissimos eveniet facilis esse.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1992-09-29 05:07:42', '1992-06-21 04:22:43'),
(12, 'Qui id atque adipisci aut.', 'dolor-corrupti-quod-similique-quas', '9182.00', 10, 38, '1', 'Rerum ipsam eos veniam. Voluptates ut non nihil ut inventore recusandae voluptates dolores. Veritatis repellat recusandae eaque omnis sint aut architecto perspiciatis. Voluptate veniam id accusantium maiores. Ea harum quos ad assumenda dicta. Beatae eum ut velit molestiae quia architecto minus.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1989-07-03 20:51:52', '1981-04-05 18:51:44'),
(13, 'Et quod rerum omnis.', 'omnis-saepe-qui-ut-quis-quia', '5559.00', 4, 40, '2', 'Facilis ea odio laboriosam et sit fuga voluptatum qui. Ut totam accusamus odio nemo iusto. Sit dolores rerum minima quae quis impedit hic. Non dolorem aut laborum adipisci amet. Similique excepturi numquam quidem. Aliquam dolore ut distinctio unde est cum. Voluptatibus necessitatibus distinctio ullam aut maiores debitis quis optio. Sapiente omnis animi provident earum natus. Unde nisi impedit voluptate reprehenderit doloribus beatae.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1995-07-24 12:06:04', '1973-04-06 08:59:45'),
(14, 'Incidunt aliquam distinctio corrupti nulla adipisci.', 'id-aut-iure-excepturi-vero', '4884.00', 10, 47, '2', 'Id saepe dolor dolorum expedita mollitia. Autem et quis qui ut suscipit eos accusantium omnis. Corrupti numquam neque hic sit. Consequatur quibusdam dolores in nobis debitis. Et consequatur accusamus odit culpa nihil occaecati omnis ut. Et quo sint nobis perspiciatis atque quod. Culpa et rerum aut ullam vitae. Recusandae sed quia porro deserunt molestias et ipsam neque. Reprehenderit sint ut facere magnam ducimus.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1971-02-01 04:27:05', '1979-11-29 12:26:16'),
(15, 'Eius eos saepe voluptatem.', 'suscipit-et-nihil-pariatur-vel', '4669.00', 4, 48, '2', 'Qui modi eos voluptatem officia iste et. Eos vero nostrum ut delectus temporibus vero sed. Consequuntur sequi vel impedit quia. Consequatur praesentium ratione aliquid qui maiores facilis facilis. Aut tempora quia omnis eius sed ipsum ut optio. Libero ut consequatur eligendi. Et doloremque optio placeat ut in. Reprehenderit et molestiae sint non sunt. Quia id quas numquam suscipit ut expedita.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1985-01-04 05:11:55', '1981-11-15 19:20:37'),
(16, 'Nobis perferendis et similique repellat dicta.', 'natus-sunt-possimus-sapiente-nisi-ipsam', '7955.00', 6, 43, '2', 'Ut dolor ipsa in officiis quasi quisquam. Quam pariatur repudiandae illo iste eum perferendis nobis. Cupiditate cum est ut sint. Nostrum recusandae numquam velit. Dolor voluptatem incidunt accusamus exercitationem dolores veritatis. Voluptatem soluta odit praesentium quos vel quia aspernatur. Animi rem accusantium ut magni. Ea voluptatem expedita aliquid nam ducimus accusantium. Dolorem dolores aspernatur provident ea est omnis nam.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 1, '2010-12-17 16:26:47', '2014-11-11 23:41:03'),
(17, 'Sed consequatur illo doloribus amet.', 'et-eos-repudiandae-ea-ut-sapiente-voluptates', '2168.00', 8, 20, '2', 'Consequuntur sint consequuntur dolorum architecto aperiam. Expedita explicabo est vel quos voluptates tempora aut. Ratione beatae atque qui nihil. Quo qui quae debitis esse quia. Voluptate et voluptate aut deserunt repellat. Eligendi qui laborum maiores et quo ex totam. Praesentium repellat quidem asperiores et. Qui laborum corporis est est illo et iure blanditiis.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 1, '1988-04-01 10:40:48', '2006-10-19 16:02:29'),
(18, 'Optio est sunt consectetur sequi.', 'at-pariatur-autem-illum-facere-veniam-voluptatem-ratione', '5784.00', 10, 27, '1', 'Dolores tempore occaecati mollitia sint dolorem magnam consequatur quia. Aut eligendi qui quae nostrum asperiores. Quia non ipsa vel repellat soluta libero vitae nesciunt. Qui qui eum omnis sit voluptatibus exercitationem facilis id. Magnam amet perspiciatis doloremque. Deserunt illum est porro alias reiciendis dolor. Et illum officiis ea quos saepe similique. Ut sint vitae non ex rerum impedit.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 1, '2018-07-20 05:00:02', '1975-01-13 02:16:11'),
(19, 'Aut non quos deserunt.', 'voluptatem-consequatur-quis-nisi', '6868.00', 8, 50, '2', 'In animi voluptatibus dolore placeat omnis. Accusantium reprehenderit odio corporis cupiditate tenetur. Eum mollitia porro ratione excepturi quos. In nulla possimus blanditiis nam. Et laboriosam est expedita. Sed corrupti odit dolor fugit voluptates quis. Quaerat commodi quia et qui atque perspiciatis exercitationem. Nihil ad pariatur vel voluptatum harum in.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '2014-02-14 14:01:52', '2016-02-21 03:23:45'),
(20, 'Consequatur sed maiores quas dolorem placeat.', 'ut-et-repellendus-consequatur-sequi-et-quia-aperiam-repellendus', '3719.00', 10, 48, '2', 'Rerum consequatur cumque ducimus dolores aliquid. Ipsa placeat voluptatem omnis possimus voluptatem et ratione deleniti. Dolores aperiam tempore dolorum dolore ut quos illum voluptas. Nesciunt vel et consectetur deserunt mollitia nesciunt. Harum officiis officia impedit sit nostrum rerum. Sed facilis et temporibus alias. Atque minus repudiandae voluptatem nihil ut aut.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1982-03-01 11:56:12', '1996-08-01 07:55:01'),
(21, 'Similique quasi enim sunt vel commodi.', 'odio-porro-aut-quas-voluptas-est-non-animi', '8295.00', 6, 36, '2', 'Id sunt nisi voluptatem et qui. A tenetur eveniet enim animi quos ut. Recusandae maxime a fugit autem nam dolorem ea. Architecto hic officiis ut natus vel aut. Autem et corrupti ipsam adipisci. Et ipsum optio omnis cumque vitae. Quam dignissimos inventore ea non neque. Accusantium molestiae voluptatem nostrum commodi libero incidunt. Assumenda dolor consequatur ut totam hic aut. Sit iusto quis dolores libero. Deserunt ducimus recusandae aut sapiente.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1975-09-01 13:03:37', '1990-06-04 18:43:35'),
(22, 'Quam ut enim.', 'dolor-quo-recusandae-velit-totam-nobis-aut-cumque', '7560.00', 6, 15, '1', 'Et porro iure quasi consectetur placeat et nulla. Beatae occaecati et quia illum qui et qui qui. Est eos corporis molestiae. Quia aut molestias et officia velit qui odit. Pariatur et a rerum et quis ipsam quia. Voluptatem pariatur quis repellendus eaque cupiditate in. Pariatur qui ullam amet nulla labore dolore aliquam. Omnis in deserunt incidunt consequatur pariatur nihil.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '2004-10-20 07:40:54', '1982-07-16 18:35:50'),
(23, 'Voluptatem distinctio vero aut nulla.', 'magni-est-voluptas-at-neque-iusto-ipsam-facere', '2324.00', 3, 13, '2', 'Commodi vero provident voluptate cumque tempore quod nemo. Atque consequatur delectus voluptatem quia totam. Illum aliquam voluptas officiis recusandae ut corrupti. Ducimus hic fugiat sequi voluptatum enim sit. Perspiciatis dolore non qui libero quia voluptate quasi non. Quo facere doloremque animi aut aspernatur accusantium. Sit occaecati ex unde. Quia quibusdam minus doloribus porro velit sunt. Aliquam magnam ipsum omnis dolor.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '2015-05-02 11:23:30', '2020-08-01 18:35:47'),
(24, 'Ducimus et vitae non delectus.', 'voluptatem-facere-blanditiis-voluptas-enim-ut', '2657.00', 7, 7, '1', 'Eos consequatur aut qui suscipit id. Quos suscipit quo quis nam voluptas tenetur. Commodi ipsum possimus odit veniam voluptates aut ut. Expedita itaque expedita quod sunt voluptatum. Omnis voluptatem excepturi iste quam id numquam. Natus ipsa unde quos minus qui minima. Omnis ratione optio optio illo natus odio.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 1, '1986-11-08 18:31:15', '2018-12-05 13:25:10'),
(25, 'Non facere autem modi.', 'iste-praesentium-in-odit-qui-eaque', '6987.00', 10, 35, '2', 'Ducimus sapiente provident voluptatem. Culpa sunt et animi velit repudiandae veniam. Provident esse voluptates repudiandae recusandae et sint. In sapiente rerum omnis cum voluptatibus. Qui earum est vero ut. Tenetur earum expedita voluptatibus temporibus. Reiciendis veniam et voluptatum quidem a delectus quos. Reprehenderit quaerat explicabo quo et porro eveniet. Quod tempora praesentium quae modi tempore iste consequatur.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '1997-02-07 21:14:55', '2006-12-29 18:01:11'),
(26, 'Nulla dolor voluptate nisi.', 'est-velit-quaerat-quo-molestiae-et', '3214.00', 8, 45, '2', 'Aut asperiores laborum qui molestiae laboriosam ab mollitia. Excepturi doloribus quo neque libero magnam. Nulla magni velit dolorem ut ut. Qui ipsa repellat illo sapiente nesciunt aut quia dolores. Rem inventore delectus beatae quod et autem. Deleniti reprehenderit nulla enim quo consequatur. Omnis repellendus quis reiciendis quidem rem et dolores. Voluptatem atque dolorum totam laborum. Cum velit nam illo qui blanditiis non vero. Doloremque molestiae nihil aut voluptate officia qui ipsa.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '2003-11-15 20:06:39', '1978-10-29 07:25:48'),
(27, 'Optio a et qui.', 'explicabo-nam-iste-voluptatem', '8011.00', 6, 11, '2', 'Harum amet vel nihil rerum provident illo. Impedit distinctio ea quis et error sint. Natus aut tempora alias qui et vero. Dolorum nostrum eum eum vel perspiciatis. Et est consectetur iusto ab tempore dolores qui. Consequatur quos nihil quasi dolorum. Eos est necessitatibus ut facere. Quas dolorum est rerum voluptatibus excepturi.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1970-08-20 17:49:26', '1970-07-01 04:35:49'),
(28, 'Quasi mollitia corrupti.', 'voluptates-delectus-laborum-voluptatibus-nobis-explicabo', '9623.00', 10, 7, '1', 'Iste explicabo debitis harum qui. Error iste omnis nisi aperiam est sint. Facere consequuntur et sint et nisi. Et praesentium inventore modi qui facilis aut. Autem dolor distinctio non totam fuga voluptas culpa. Est exercitationem eveniet incidunt eveniet tempore sed aliquid. Dolorum impedit ad consequatur. Error quo quo incidunt ab. Autem ut eum omnis totam harum nobis similique. Quia aliquam quo aliquid facilis totam. Magnam illum quis voluptatem hic aut magnam dolorem laboriosam.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1976-03-20 10:15:41', '2003-06-30 22:07:18'),
(29, 'Alias accusamus atque qui quibusdam aut.', 'nisi-sed-ut-velit-consequatur-quia-ipsa-quia-sequi', '8142.00', 4, 38, '1', 'Iusto odit impedit ipsum sed. Eum et id earum in ut eos qui. Nam modi et tenetur et aut veritatis quia. Totam molestiae sapiente eius ad. Expedita officiis architecto repudiandae aut. Exercitationem pariatur est ipsa omnis aut. Repellat fuga eveniet voluptatem. Omnis aut sit facere. Magnam nostrum est eveniet aut. Totam in fugiat voluptatem delectus illo aut quas delectus.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '2011-01-19 16:42:18', '1993-01-26 02:01:15'),
(30, 'Soluta laudantium earum qui.', 'qui-modi-et-velit-et-quo-facere-ea-voluptates', '9117.00', 9, 23, '2', 'Est nam quos nam non quasi nobis sint. Fugiat quos et dolore illo inventore quaerat. Et omnis est labore illo doloribus cumque ea. Dignissimos quis consequatur aut repudiandae autem adipisci officiis. Praesentium nam ratione magni vel quod ducimus voluptatem suscipit. Dolorem corporis minus officiis commodi est et. Possimus nisi vel dolores est sit inventore illo. Sit cum ut omnis enim. Voluptatem dolore qui saepe sit est voluptas. Quod numquam accusantium eligendi est delectus vel.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '1978-08-01 16:55:24', '1984-08-01 17:52:14'),
(31, 'Nesciunt cumque reprehenderit earum iste.', 'officia-libero-ut-debitis-labore-provident', '1152.00', 4, 50, '2', 'Quis autem consequatur eum error explicabo et. Repellendus officiis quia provident neque iste quis et. Consequatur est quaerat nostrum officiis perspiciatis dolorem qui. Et mollitia hic beatae molestiae aut quia. Maxime reprehenderit aut nisi rerum quia. Molestiae sit asperiores corrupti non aut aliquid expedita. Iure ea libero doloremque veritatis voluptate a dolor. Maxime aut odio ut porro optio dolore. Nostrum qui ea aut. Culpa suscipit itaque dolorum dignissimos sed dolorem.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '1976-07-31 20:30:04', '1984-03-03 06:34:00'),
(32, 'Omnis dignissimos enim eligendi est sequi.', 'aliquam-et-ex-autem-quis-sed', '9890.00', 1, 9, '2', 'Deserunt et corporis est voluptatem. Rerum tenetur minus vitae vero id nihil beatae. Amet sapiente repellat velit eum. Non ea sed et distinctio. Et culpa accusantium est quisquam et. Molestiae veniam suscipit cumque sapiente qui officia eos. Labore minima minus qui sunt quia. Et placeat natus ipsam repudiandae dolorem. Aspernatur voluptatem natus tenetur est tenetur vel. Quasi est quis consequuntur nulla adipisci molestiae. Quaerat autem quidem animi. Nulla tenetur suscipit unde libero quia.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '2016-06-18 10:11:25', '1974-01-16 05:51:12'),
(33, 'Aut aspernatur numquam adipisci deleniti.', 'saepe-temporibus-placeat-qui-sequi', '9415.00', 5, 46, '2', 'Et eum dicta cum deleniti. Accusantium et qui ducimus est. Dolorum et rerum id omnis labore ut eveniet. Consequatur excepturi pariatur deleniti unde dolores harum. Explicabo aspernatur repudiandae sit quisquam facere. Nesciunt est quo aspernatur eos animi quo doloribus. Delectus adipisci occaecati quia. Sit nostrum eligendi velit laudantium sequi consequatur. Atque distinctio voluptatem repellat reprehenderit aut adipisci. Nulla hic sapiente ut.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1978-12-16 09:28:52', '1995-03-30 12:29:04'),
(34, 'Esse ratione autem omnis et.', 'ut-praesentium-a-neque-qui-sunt-non-est', '9464.00', 4, 24, '2', 'Quidem ut voluptate repellat omnis dolorem et voluptatem. Minima quae similique vitae repudiandae modi. Fugit voluptate sint ratione. Id officiis blanditiis iusto recusandae perferendis quasi. Nihil corporis rerum assumenda. Suscipit pariatur ea illo ducimus necessitatibus blanditiis. Est quaerat voluptate non quisquam debitis. Iste nulla sequi saepe omnis consequatur modi.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '2014-06-10 15:41:30', '1981-11-27 22:04:16'),
(35, 'Laudantium aliquam et recusandae.', 'aspernatur-eum-enim-quis-nesciunt-sunt-dignissimos-reprehenderit', '1353.00', 1, 25, '2', 'Beatae sit animi laborum pariatur saepe eos neque. Reiciendis reprehenderit ut nostrum id est vero dolorum. Omnis laudantium fugit qui qui. Nesciunt provident earum animi itaque et voluptate dolorem animi. Sunt maxime id rerum. Ab consequatur rerum et iusto quis ipsum. Deleniti voluptas qui cumque labore necessitatibus. Asperiores vel debitis vel deleniti impedit. Earum animi eum et nihil saepe.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '2010-05-16 20:31:51', '2020-03-23 00:38:55'),
(36, 'Esse sunt vel minima error.', 'qui-dignissimos-debitis-quos-explicabo-at-magni-at', '5328.00', 10, 42, '2', 'Accusantium aspernatur consequuntur aut quas deserunt. Voluptatem consequatur sunt ipsa consequuntur saepe. Vero a aut aut quidem. Vitae eum dignissimos blanditiis. Accusamus aspernatur aut libero necessitatibus et odit earum. Est optio occaecati dignissimos nostrum optio. A quam voluptates et praesentium dicta beatae nam. Delectus et pariatur cum. Impedit reiciendis id maiores est id consequuntur. Fuga et est ut ut modi eum. Et tempore consectetur tenetur non ipsa sed ut.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '1989-11-27 19:47:12', '1992-03-06 01:25:52'),
(37, 'Doloremque error aliquid aliquid.', 'eum-voluptatibus-ut-dignissimos-et-omnis-rerum', '7559.00', 6, 28, '2', 'Beatae quas doloremque est laboriosam. Hic nulla et aperiam optio voluptates inventore amet sit. Aut cupiditate assumenda soluta vitae repellat velit aut. Repellendus assumenda dolor sit voluptatem doloremque voluptas fuga. Est vero culpa doloribus suscipit. Est assumenda nulla laborum nesciunt nihil quos minus. Modi ducimus nihil et distinctio eligendi. Qui in enim dolore dolor at similique. Quaerat dolorem ut sed consequuntur et ut temporibus.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1986-07-09 04:16:42', '2001-09-02 16:23:28'),
(38, 'Quis itaque mollitia quo.', 'modi-blanditiis-rem-debitis-ipsum', '9856.00', 1, 31, '2', 'Ea doloremque reprehenderit voluptatem rerum dolorum reprehenderit. Velit velit quia vitae sunt sit. Ex necessitatibus quam consequatur perspiciatis nesciunt. Id qui velit non dolorem. Excepturi consequatur eum debitis assumenda facilis et error. Accusantium asperiores rerum accusantium. Atque hic explicabo laborum molestiae. Enim sequi totam accusamus expedita et impedit nobis. Amet et odio consequatur ea. Earum maxime nobis laboriosam rerum pariatur tempora magnam.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1983-04-07 00:41:25', '1994-04-20 10:15:30'),
(39, 'Modi iste quos aut suscipit.', 'qui-rem-voluptate-non-qui', '7448.00', 6, 45, '1', 'Rerum rerum fugit dolor vitae rerum. Impedit eos pariatur omnis consequatur nulla eos sed. Aut nisi incidunt non dignissimos et quis. Rerum sint voluptatum aut at. Eos qui pariatur quasi perferendis iste qui suscipit dolorem. Odit minima animi laudantium voluptatem natus velit ea. Debitis qui quia quo ipsam aliquam qui qui. Ut in dolor nisi laudantium est quae sunt. Maiores tempora dicta aut ea sit ea. Voluptates ut laboriosam nesciunt sunt dolor distinctio quasi.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '2014-07-17 23:10:02', '2020-07-27 15:15:18'),
(40, 'Rem facilis incidunt explicabo.', 'est-aliquam-dolorum-ab-expedita-quaerat', '4248.00', 3, 27, '1', 'Cupiditate sunt et minima dolore qui quia. Quia quis asperiores sed blanditiis. Non aliquid ut architecto cum ut laboriosam quia. Vitae inventore voluptas amet. Vero laborum assumenda enim qui ea nesciunt hic. Et qui repellendus autem odio incidunt odit. Veritatis iusto placeat nemo voluptatem reprehenderit harum illo. Odio atque quidem fugiat cum in. Tempore ut eum iure. Animi repudiandae aperiam voluptas quod harum corrupti.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '1987-04-21 15:53:49', '1983-03-08 07:33:22'),
(41, 'Officiis est modi et.', 'sit-rerum-laborum-cupiditate-dignissimos-eos', '3855.00', 0, 40, '1', 'Sed rerum veritatis iure doloribus et. Modi porro adipisci dolorum similique id. Non dolor et ut necessitatibus ipsa similique deserunt. Velit in eius quasi eos eos sit omnis. Molestiae voluptatem fugiat beatae omnis ut est. Rerum aut asperiores perspiciatis officia et quam facere optio. Quia odio qui mollitia quas. Consectetur fugiat numquam et sit. Voluptatibus velit quia fugit nesciunt odit nobis omnis.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 1, '1973-01-22 06:36:21', '2010-06-11 06:32:49'),
(42, 'Enim porro veniam maiores.', 'aspernatur-officiis-commodi-enim', '2559.00', 10, 39, '1', 'Eum quia fugiat a culpa ea. Sint iste itaque sit tempore distinctio. Quis pariatur tempora rem non consequatur. Laborum ea labore suscipit nobis ullam ut nobis. Animi et et omnis impedit in rem. Ut a consectetur quod optio nemo. Cupiditate esse ducimus dolore labore sit suscipit. Quis saepe eum omnis ipsum sed neque. Fugit omnis dolorem enim voluptatem voluptas quasi quo.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '1991-08-05 00:57:14', '2014-09-11 18:57:15'),
(43, 'Sed voluptatem cumque.', 'nemo-ut-qui-amet-consequatur-ipsum-adipisci', '5470.00', 10, 42, '1', 'Voluptatem neque consequatur libero eum aliquam eum ullam error. Optio provident fugiat doloribus vel illo. Rerum sed aut ut sed et enim. Beatae explicabo distinctio placeat sed ullam eum. Non non quas hic fugit repudiandae dolores exercitationem non. Minima ut ut et quaerat.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '2013-08-29 07:08:15', '1975-11-10 21:04:02'),
(44, 'Odit quia nihil omnis explicabo.', 'quis-libero-et-dicta', '8741.00', 8, 26, '1', 'Qui ducimus est sit voluptatem. Quas est ea aut aperiam. Recusandae praesentium cupiditate qui et qui omnis. Sunt sequi assumenda dolore. Quis totam sint nisi. Velit at sint aut amet veniam corrupti. Commodi ex consequatur libero veritatis minus fugit sit. Ratione eligendi odio et dignissimos. Placeat quia eius qui vero amet libero. Molestiae repellendus cum assumenda. Quo corporis enim nam recusandae. Eum dolor rerum cumque sed quia harum. Libero laborum at hic neque sint.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1997-09-21 05:42:38', '2008-09-22 04:53:58'),
(45, 'Repellendus mollitia minus unde.', 'molestiae-facilis-aut-omnis-fugit-quia-esse-in-recusandae', '4357.00', 3, 32, '2', 'Et eius aut nemo consequatur reprehenderit nulla. Molestiae at quis rem et dolore. Harum cupiditate velit dolorem omnis. Maiores consequatur dolor numquam nostrum. Et quisquam odio eum ut. Natus optio sit consequuntur ab vero qui expedita. Eligendi id molestiae in dolorum. Est officia sit excepturi dolores. Velit nam optio ipsa rerum voluptatem tenetur rerum.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1981-09-20 15:30:29', '2010-05-30 07:27:22'),
(46, 'Pariatur ipsam repellendus amet.', 'aperiam-pariatur-a-quisquam-qui-necessitatibus-ex-eius-voluptatum', '6651.00', 6, 45, '1', 'Praesentium aut facere distinctio minima qui ex. Nam amet iste consequatur dolorem veritatis corrupti. Praesentium ex rerum dolores neque. Quod nam adipisci quis at minima. Rem tempore consequatur aut molestiae qui. Nihil culpa deserunt vel optio et. Dolorum voluptas accusamus id in. Repudiandae voluptas maxime nam omnis delectus. Libero qui non sequi ex. Voluptate totam quibusdam molestiae.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '2013-06-06 08:38:13', '1971-10-24 11:02:41'),
(47, 'Natus provident ullam maxime dolores facilis.', 'provident-dolor-fugit-aut-eos-est-placeat-quo', '9566.00', 5, 20, '1', 'Porro ex quia vero ut veritatis ducimus. Esse sunt atque omnis voluptatum voluptatem sed quis. Asperiores aliquam dolores aliquid dolor. Placeat ab delectus harum nihil commodi voluptatem. Blanditiis nemo sit quia qui eos. Exercitationem et aut tempora quas sit. Modi suscipit natus in eligendi consequatur reiciendis. Atque ullam mollitia sapiente nihil. Consequatur doloremque fugit eius voluptatum non et.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1974-02-26 07:58:05', '2007-05-13 04:19:38'),
(48, 'Sunt ut et quis quasi.', 'aut-adipisci-sed-non-facilis', '7125.00', 6, 35, '2', 'Aut autem adipisci sed ducimus est magni. Fugiat aperiam est vitae. Dignissimos consectetur perspiciatis rem reiciendis libero esse ut. Mollitia fugiat consequatur nesciunt et et. Corrupti saepe veritatis et voluptatem. Sit quasi temporibus cupiditate non est deserunt. Et non praesentium molestiae ad esse doloremque dolorem ut.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '1984-03-26 07:10:26', '1987-07-13 10:16:53'),
(49, 'Unde et sint corrupti veniam.', 'ut-sit-eveniet-quam-perferendis-eum-consequatur-ipsum-et', '6083.00', 5, 16, '1', 'Vel quam est doloremque at sunt voluptas. Repellat voluptas repudiandae repellat inventore nam eos. Eligendi commodi explicabo dicta et culpa. Magnam ut sit et distinctio dolorem qui ipsa occaecati. Ab nesciunt et tempore nisi harum placeat sed qui. Pariatur ullam similique doloremque nobis. Illo repellendus ea consectetur adipisci consequatur itaque. Dolore ut sint necessitatibus est voluptatem. Et porro omnis perferendis eveniet. Est ut sed dolores similique alias numquam corrupti.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 1, '2008-06-06 23:15:55', '2003-03-23 23:12:38'),
(50, 'Maxime facilis qui.', 'nobis-at-aut-maiores-dicta-et-nostrum-minus', '9624.00', 8, 19, '2', 'Asperiores repellendus accusamus aliquid incidunt ea. Est ad ullam minima aperiam nostrum dolorem voluptatem. Qui sed vitae consectetur ut consequatur ut. Voluptatem corporis ipsa neque id rerum. Et in nihil voluptas et accusantium veniam. Omnis officiis commodi quae et beatae enim et. Delectus qui et eos deserunt ex mollitia. Molestiae voluptatibus asperiores qui id sunt labore. Ut natus mollitia similique. Vel animi et omnis blanditiis. Cum est nam nisi tenetur et quidem.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '1970-04-15 23:15:25', '2020-01-16 23:33:23'),
(51, 'Pariatur quia perferendis.', 'deleniti-eum-voluptas-neque', '9693.00', 2, 36, '1', 'Ea ut animi minima ipsa suscipit non. Id perspiciatis nam officiis ut ea voluptate. Est quia doloribus est aliquam itaque magnam vero. Nobis dicta non labore temporibus natus. Et et laudantium et vel. Ut sequi earum ullam excepturi. Veritatis necessitatibus vitae placeat error. Qui non est eum. Dolorem pariatur aperiam ipsam eaque. Mollitia eos facilis ea est dolore aut fugiat.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '1987-04-29 07:14:56', '2014-07-24 10:29:54'),
(52, 'Et in quae dolorem ab.', 'porro-officia-adipisci-totam', '3682.00', 8, 41, '2', 'Aut laboriosam distinctio eos quia. Dolor ut omnis doloremque nisi saepe at. Molestiae modi sit delectus ex saepe id sapiente. Et rerum maiores iusto consequuntur voluptatem. Esse qui harum eaque vero. Ut occaecati ut voluptas quisquam deleniti. A eius placeat quis iure. Optio est aut optio fugiat dolor pariatur eius. Aperiam quos ut id dolores molestiae totam. Quam sunt maxime quia quibusdam voluptatem.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '1985-12-11 16:35:05', '1993-08-03 12:32:21'),
(53, 'Explicabo iure laudantium.', 'fuga-aut-illo-cupiditate-autem-perferendis-eius-ducimus', '4591.00', 4, 48, '2', 'Et consequatur perspiciatis ipsam laudantium. Est est voluptates accusamus nihil repellat ut et. Molestiae hic ea repellat est similique beatae necessitatibus. Nesciunt qui incidunt est nulla earum. Ab dicta et ipsa ut rerum fugit. Optio voluptas eveniet officiis reiciendis voluptatem alias nihil. Hic voluptatem quasi id consectetur. Occaecati soluta quis facere molestiae. Voluptatum aut deserunt facere aliquid. Quia sequi eum odit illum. Facere sunt enim itaque voluptatem et aperiam ducimus.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1981-05-26 12:39:55', '1981-10-28 01:13:49'),
(54, 'Officia et nulla ea rerum.', 'et-beatae-ipsam-quam', '4280.00', 7, 39, '1', 'Error mollitia dolores neque id aspernatur odit. Libero amet consequatur quia eaque voluptatem. Eos ab quod ratione unde ex. Illum omnis laboriosam quasi facilis. Minima quibusdam unde nisi qui consequuntur. Sit aut in voluptatem ipsum. Provident sapiente architecto assumenda atque. Laboriosam error iure aut quisquam ut sed. Voluptates laudantium ab ut fugiat. Dolores aut error unde nemo error ut ut. Atque suscipit omnis eos aperiam qui totam.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '2013-12-04 14:34:24', '2018-12-13 19:20:39'),
(55, 'Dolorem tempora harum voluptatem dolor voluptate.', 'optio-corporis-porro-saepe-earum-eius-quaerat', '9229.00', 8, 19, '2', 'Dicta consequatur veritatis occaecati ut. Ratione in excepturi non. Perferendis culpa facilis iste voluptatum officiis repellat dolorem. Maxime beatae perspiciatis ut. Nulla id est autem veniam consequatur sit. Praesentium eaque deleniti est quia exercitationem beatae. Vero nihil sunt consequuntur autem. Exercitationem non sed beatae at. Delectus voluptatem dolorem minima iure consectetur ad eum iure.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '2012-03-11 23:38:53', '1984-10-08 17:30:03'),
(56, 'Rem ut distinctio nihil at.', 'eaque-repellat-aut-molestiae-delectus-quia-totam-qui', '7282.00', 6, 11, '1', 'Praesentium omnis dolor est est perferendis. Provident itaque et totam deserunt impedit quis repudiandae quo. Culpa omnis molestias asperiores natus deserunt sapiente ut. Eum molestias quibusdam et omnis. Consectetur qui officiis ab sint aut aliquid sint explicabo. Quibusdam fugiat nostrum itaque. Ullam commodi ipsa quas est qui accusantium.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1979-12-20 12:29:12', '1988-03-12 16:46:10'),
(57, 'Molestiae dolore quae sapiente nemo.', 'aliquid-dolorem-porro-neque-blanditiis-beatae-ut', '9788.00', 9, 36, '2', 'Atque libero dolorem similique magni est. Accusantium eius pariatur possimus a quis dolorem. Quia illo eum vel. Omnis illum voluptatum adipisci ut voluptatem dolor. Et adipisci enim maxime distinctio neque. Consectetur sed rerum ipsum dolor totam dolores est enim. Unde deserunt minus in numquam dolores. Unde nihil enim exercitationem culpa aliquid. Autem assumenda illum nemo enim autem voluptatem accusantium. Fugiat aut in rem rerum ab vero pariatur culpa.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '1971-03-10 00:12:10', '2006-10-04 09:31:24'),
(58, 'Velit ut libero fugit ut itaque.', 'quod-blanditiis-voluptatem-harum-velit-ducimus-eos-nihil', '7545.00', 5, 29, '1', 'Sunt facere ad similique eius et ex sapiente quidem. Veniam autem excepturi neque nisi. Repudiandae repellendus suscipit veritatis. Magni autem totam sit laudantium porro distinctio. Sed et rerum esse in sapiente. Eius ut aliquid quos tempora est voluptates. Eligendi quo quia voluptate non adipisci doloribus. Praesentium non voluptatum cumque sed ipsa. Aut sit nihil voluptatem distinctio expedita voluptas laborum ut.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1979-07-22 20:38:38', '1984-08-12 00:29:11'),
(59, 'Minima asperiores illum dignissimos perferendis.', 'eligendi-qui-nobis-dolorum-voluptas-quos-sed', '6585.00', 2, 31, '2', 'Est voluptas aspernatur repellat et. Qui cum architecto dolorem. Minus qui ducimus ut occaecati est tempora. Quasi voluptatem et deleniti architecto amet. Recusandae possimus dolor fuga. Voluptas fugit voluptatum expedita molestiae corporis sit pariatur voluptatem. Vel corporis qui accusantium eveniet vero nesciunt. Sed dignissimos quia aut placeat aspernatur eligendi ut. Harum repudiandae hic voluptas architecto. Quibusdam exercitationem consequuntur quod pariatur suscipit.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 1, '2010-06-22 07:41:13', '2011-08-21 17:30:15'),
(60, 'Perferendis eum dolor delectus.', 'consequatur-nulla-assumenda-eum-distinctio-deleniti', '8061.00', 6, 33, '2', 'Facere assumenda nihil voluptas praesentium ut doloribus rerum. Et et nulla neque nemo consectetur ut. Consequatur ullam autem molestias. Rerum beatae voluptatem itaque earum voluptatem. Facere voluptate ut laborum molestiae optio debitis at. Quis ea recusandae et et quia consectetur. Dignissimos corporis ipsam dignissimos eum et est unde. Excepturi aut molestiae aliquid nihil qui.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1972-12-18 19:14:12', '1998-01-30 06:09:54'),
(61, 'Inventore aut iste necessitatibus quaerat.', 'pariatur-eius-provident-corrupti-qui-officiis', '7489.00', 8, 41, '2', 'Aut voluptas molestiae delectus quos id veniam nisi. Molestiae ut repudiandae odit enim possimus. Architecto unde quam labore doloribus. Cumque ut voluptas expedita voluptatum impedit. Nesciunt aspernatur blanditiis ratione totam. Iusto dolor sed officia dolore. Est autem reprehenderit dolore. Delectus repellat totam iste est et eaque. Molestias id quas dolorem in qui et voluptas. Distinctio est ullam occaecati harum eum sint tenetur. Dolorem rerum nemo in non. Saepe at error illum.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '2005-07-01 18:19:58', '2013-02-13 00:43:19'),
(62, 'Eos et dolore laborum.', 'aperiam-autem-accusantium-aut-quia-ab', '9945.00', 7, 20, '1', 'Velit repellendus dicta sint numquam ipsum repellendus iusto. Illo rerum eos nihil ut et eum. Fuga et optio placeat nihil ut. Commodi enim quas veritatis. Ut sunt delectus id velit rem rem qui. A ipsum qui adipisci aut itaque et. Voluptas ut quis vero quia soluta. Ut nemo fugiat perferendis quam placeat molestiae. Dicta deserunt dolorem iure odit laboriosam deserunt a. Unde dolores quas quisquam aut. Qui harum vel laudantium dolorum. Dolorem distinctio aspernatur aliquam molestiae quia.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '1978-06-18 17:59:44', '1989-05-01 09:31:20'),
(63, 'Optio dolorem corrupti adipisci aut.', 'omnis-incidunt-voluptas-architecto-omnis-exercitationem', '5970.00', 8, 17, '2', 'Est odit omnis tempora facilis vel. Sed est et nulla amet est sed. Eligendi consequatur voluptatum et aut qui voluptatibus. Id sapiente ullam odit sunt eius enim quia. Ipsa ex qui ullam asperiores magnam quo. Consequatur sunt perspiciatis aut soluta velit neque aperiam. Ut non cupiditate sit qui. Veritatis ratione libero amet consectetur. Hic esse sit corporis possimus fuga nam odit ut. Ut itaque pariatur dolore voluptate et velit ex. Et doloribus ea distinctio assumenda nemo ex et.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 1, '1992-01-06 20:55:30', '1995-06-30 09:37:53'),
(64, 'Quibusdam ullam accusantium est.', 'atque-iure-atque-enim-culpa-dolorem-temporibus-aliquid', '7327.00', 5, 30, '2', 'Eligendi quasi cum aut vero aperiam velit ex. Expedita possimus architecto veniam sit. Autem iure ut nihil deleniti illum minus et. Dolores deserunt harum quam iure doloremque veritatis maiores. Magnam amet minus quasi in nulla expedita sit fuga. Non aut placeat nihil minima distinctio. Laborum aperiam possimus et ad autem culpa vel. Aperiam facilis consectetur ipsa vitae ut numquam. Quo dignissimos minus reiciendis incidunt.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '2007-03-27 16:58:39', '1971-04-13 06:57:34'),
(65, 'Minus ipsum dolores est praesentium occaecati.', 'voluptate-aut-sunt-cumque-quaerat', '9699.00', 10, 33, '2', 'Magnam eum quam rerum reiciendis. Temporibus quo dolore mollitia laudantium aspernatur voluptate perspiciatis. Debitis aut explicabo quae in voluptates saepe. Repellat et ullam aliquid nam libero sit sapiente. At qui amet vero quis perspiciatis qui corrupti. Atque ipsa non omnis ullam consequatur culpa. Id deleniti neque veniam aut cupiditate sunt repellat laboriosam. Quo est sequi quia et. Voluptates veritatis perferendis quia odit ut. Tenetur sint quam necessitatibus et aperiam.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '1991-11-21 16:03:06', '2004-09-02 09:16:31'),
(66, 'Beatae laudantium eos et sequi.', 'est-aut-sint-dolor-eum-aspernatur-non', '2469.00', 9, 26, '2', 'Reiciendis cum excepturi qui esse molestiae. Id autem voluptas quam nihil impedit laudantium alias. Porro a aut et. Magni culpa facere enim ratione error non. Placeat voluptates similique voluptas aut doloremque dolor laboriosam. Voluptatem beatae architecto quia aperiam vel reprehenderit rerum. Sed natus commodi ratione doloremque iusto eligendi facilis.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '2007-09-17 04:27:19', '1993-10-13 18:30:50'),
(67, 'Unde qui molestiae.', 'vel-eius-consequatur-sunt-incidunt-sit-sed-nesciunt', '5715.00', 2, 38, '2', 'Laborum quod distinctio nulla nostrum accusamus quidem. Ut voluptatem libero qui ducimus veritatis omnis. Quia qui quis doloribus unde non nulla et ut. Doloremque eum qui porro est. Quam et sed quae maxime. Earum inventore nulla omnis enim. Laboriosam rerum quis quam reprehenderit sunt aliquam autem. Illo non possimus qui ut esse. Sed sequi molestiae labore autem illum. Nesciunt ducimus eos harum hic sunt aut id. Nihil id ut minima et aut praesentium molestiae alias.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1975-04-24 00:47:07', '1978-04-29 16:37:25'),
(68, 'Temporibus velit non.', 'dicta-enim-autem-qui-vitae', '9844.00', 10, 45, '2', 'Fugiat qui accusantium vel dignissimos laboriosam iure. Quae dignissimos incidunt dolores dolore sapiente. Dolores fugit itaque ut. Earum quam qui iusto blanditiis. Et culpa voluptas ut sit est nisi. Ratione est molestiae provident dolores. Neque architecto est facilis incidunt provident eaque iusto. Praesentium sed rerum voluptas dolor. Minima saepe ut possimus consectetur inventore. Quis odit totam veniam et similique.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '2002-04-05 09:38:28', '2003-11-29 01:03:19'),
(69, 'Sapiente consectetur sit id.', 'doloribus-veniam-omnis-rerum-dolorem', '3576.00', 9, 5, '2', 'Dolorem voluptas sit veniam quidem similique quas et. Nihil reprehenderit nam repudiandae unde delectus dolor autem. Omnis modi quia nostrum minus ullam. Omnis impedit in exercitationem deserunt nobis voluptatem nobis. Eos et fugit odit excepturi. Minus sed doloribus voluptatum omnis quisquam. Et assumenda sunt saepe. Quae iure eveniet soluta ut rerum.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '2018-05-06 01:41:49', '1992-09-18 13:09:58'),
(70, 'Magni illum eius ipsum et dolorum.', 'ut-eaque-cupiditate-velit-distinctio-voluptas-officia-velit-sed', '8185.00', 10, 30, '2', 'Et dolores quos iste numquam. Eum culpa laboriosam ipsam maiores atque fugit. Quidem magnam voluptate laborum excepturi doloremque velit. Aliquam aspernatur praesentium et natus. Qui ut architecto est provident magnam qui quaerat. At praesentium dolorum tempore voluptas et sit laboriosam. Nobis consectetur et dolores aliquid magnam nesciunt. Ipsum quibusdam nam autem aut tempore. Rem qui quam cupiditate vitae blanditiis. Optio voluptatibus nulla sunt unde.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '2003-09-08 18:11:52', '2014-07-18 10:06:24'),
(71, 'Cum et quam.', 'autem-enim-iure-quasi-adipisci', '8398.00', 10, 34, '2', 'Qui corrupti facere fugit quam. Et laborum qui unde dolorum aut. Voluptatum voluptatum quo autem at numquam quia. Dolores ea pariatur ducimus aut non. Mollitia iste architecto et sed dignissimos ut. Non nesciunt vitae sequi earum. Modi voluptas ut nisi voluptas mollitia quia. Hic asperiores similique laboriosam ab esse. Vitae nihil nisi consectetur laudantium cumque possimus. Voluptatum repellendus consequuntur eaque quasi.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '2006-09-08 12:55:41', '1971-11-12 05:04:30'),
(72, 'Quis voluptatibus et aperiam dolores.', 'ut-sed-aut-ad-temporibus', '5521.00', 10, 24, '2', 'Culpa rerum mollitia in ut id odit. Et mollitia beatae fugit quod rerum commodi eveniet. Autem quam enim est et omnis sed itaque. Eius vel et quo rerum incidunt ratione magnam. Quo provident dolor explicabo animi blanditiis nesciunt. Nobis sit qui molestiae suscipit accusantium necessitatibus. Rerum atque rem ea omnis iusto cumque. Fuga blanditiis aliquid eligendi est dolores. Magnam magnam assumenda dolorem harum expedita. Delectus labore non minus cumque.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1990-01-01 16:01:16', '1986-11-12 05:22:36'),
(73, 'Libero totam sint.', 'tempore-quos-eligendi-tempora-repellendus-nam-aut', '5744.00', 9, 14, '1', 'Iste perspiciatis tenetur optio voluptates voluptas cupiditate. Eum assumenda quas nihil itaque inventore nemo voluptatum. Quas dolore suscipit optio earum. Totam fugiat delectus quam fuga a molestiae. Tempore quia quasi eos saepe rerum impedit. Voluptatem expedita et ut maiores necessitatibus recusandae. Eos quo aliquam vitae quia. Iusto voluptatem impedit temporibus at. Et incidunt numquam id consequatur ut.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '2004-03-24 13:37:34', '2012-02-04 19:12:23'),
(74, 'Omnis non nam quod quasi hic.', 'sint-odit-excepturi-accusamus-deserunt-eaque-consequatur-dignissimos-voluptatem', '5898.00', 10, 16, '2', 'Qui molestiae neque culpa aperiam ratione. Eos architecto ut expedita vitae cupiditate dolorem doloremque. Aspernatur repellat sint consequatur ut et. Soluta ducimus quasi in. Libero et numquam laborum officia fugit qui. Porro porro molestias eligendi quis quia tempore. Omnis quam eligendi omnis vitae. Non eius incidunt voluptatibus nulla sunt quae eaque. Aut mollitia numquam molestiae maiores placeat ipsum quia.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '2018-08-11 09:40:13', '2007-09-24 14:57:50'),
(75, 'Nostrum et maiores.', 'debitis-aliquid-impedit-ex-labore-facilis-quo', '3340.00', 2, 34, '2', 'Laudantium sit nostrum laudantium eveniet ratione libero. Quo possimus quia autem dolorem enim aut illo quasi. Inventore eligendi et ea sit. Ut architecto eaque doloribus quia quam asperiores totam occaecati. Quo sed ut occaecati facere sed voluptatem. Consectetur sint accusantium numquam et laudantium in. Exercitationem non a cumque debitis.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1988-04-30 02:53:57', '2020-06-21 18:46:00'),
(76, 'Velit quam iure assumenda.', 'aut-est-minima-at-quas-aut-veritatis-maiores-non', '8680.00', 8, 38, '2', 'Esse iste optio quis debitis non consectetur. Quisquam est sit aperiam nulla natus. Quis quae quam itaque quos mollitia. Quae illo deserunt magnam non exercitationem sed. Quo quo delectus quia ea. Voluptatem sequi aut aut rerum voluptatem unde aliquam. Hic placeat alias maxime qui commodi sapiente. Vel non nulla placeat recusandae quidem quibusdam.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '2019-04-08 03:40:58', '2020-07-27 16:06:54'),
(77, 'Doloremque debitis consectetur et similique.', 'quo-quam-quae-ea', '9832.00', 1, 26, '1', 'Quibusdam labore est ut placeat vitae placeat aut. Reprehenderit debitis quo libero dolor quo ipsum. Ratione unde necessitatibus ex cupiditate qui aut nulla possimus. Molestiae nihil sit dolore officiis. Eveniet debitis magni enim cupiditate minus est. Eius perspiciatis labore ipsam eaque. Id ut maiores magnam omnis id. Est quia earum fugiat nihil dolor. Nemo consequatur iusto modi nobis quidem animi ut.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1972-02-17 07:20:57', '1971-01-22 14:32:40');
INSERT INTO `products` (`id`, `name`, `slug`, `price`, `stock`, `discount`, `weight`, `detail`, `picture`, `picture_detail_one`, `picture_detail_two`, `picture_detail_three`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(78, 'Quam rerum ipsam.', 'error-sequi-enim-delectus-vero-consequuntur-facilis-voluptatem', '4582.00', 10, 20, '1', 'Rerum at sed magni laudantium. Modi sit odio consequatur rerum. Illo nihil beatae minima exercitationem aut libero aut quos. Cupiditate sit soluta autem aliquam sit. Aperiam aut ad quo nam quia nihil vel. Est ipsam est perspiciatis ullam magni libero. Officia est omnis repellat repellat rerum voluptates. In et eaque delectus aspernatur iste.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1971-06-05 00:19:57', '1994-09-04 14:02:38'),
(79, 'Iure qui harum.', 'exercitationem-dolore-laboriosam-ad-exercitationem-ipsam', '5698.00', 5, 39, '2', 'At debitis quos et tempore molestias aut nostrum magnam. Rerum aliquid id quia aspernatur beatae placeat. Voluptatem ut quis ullam illo aliquam. Quasi nostrum omnis occaecati adipisci ea. Aliquid earum dolorum magni alias beatae. Ipsam hic debitis sunt. Eligendi et rerum eius voluptatem qui vel quia. Repellat cum labore molestiae aliquam error vero.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 1, '2015-06-02 07:17:19', '1986-06-10 04:56:55'),
(80, 'Ea iusto molestiae eaque.', 'rerum-rerum-quis-dolores-quia-quia-vel', '8599.00', 9, 22, '2', 'Placeat doloribus ut perferendis iusto culpa nemo. Molestiae consequatur necessitatibus itaque et. Ullam expedita explicabo repellat aliquid aut consequuntur. Deserunt velit temporibus perspiciatis et possimus voluptatem ut. Cupiditate et id nihil et nemo. Molestiae maxime necessitatibus rerum voluptas quidem voluptatem maiores. Excepturi quis provident asperiores ut et. Iste vero ipsam quia dolor voluptatem numquam est. Ut id quas ad temporibus itaque. Aut quae laborum qui aut.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1990-08-14 16:52:23', '1984-07-02 14:09:02'),
(81, 'Suscipit beatae inventore perspiciatis.', 'cumque-omnis-dolorum-ratione-alias-laborum-ut-consequuntur', '6728.00', 8, 46, '2', 'Non unde commodi minus assumenda debitis. Rerum eligendi velit ea harum nulla minima soluta. Voluptatem voluptas itaque blanditiis odio commodi dignissimos accusamus. Labore voluptas dolorem dolorum eveniet sunt ipsum nemo. Itaque consequuntur earum voluptate id. Et ipsum in qui repellat. Reprehenderit vel quo dolores tempora et eos.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1999-12-19 16:37:45', '2016-11-21 10:50:28'),
(82, 'Recusandae deserunt dolor molestiae dolorem.', 'doloremque-ea-rerum-illum-exercitationem-ut', '7941.00', 10, 21, '1', 'Blanditiis quis dolore aperiam ullam iste qui quo necessitatibus. Nisi quaerat ut ratione quidem non. Ex consequatur omnis nihil corporis nulla. Qui temporibus praesentium qui in quis. Aut enim voluptas et omnis. Enim qui numquam praesentium est. Repellat distinctio ratione id enim quia illo. Est molestiae voluptas eaque facere ipsam nemo sapiente. Dolores voluptatem veritatis officia illum quo sapiente.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '1997-08-24 10:29:53', '1989-05-07 15:23:44'),
(83, 'Totam velit saepe quae id temporibus.', 'sed-rerum-sequi-architecto-aut', '8154.00', 6, 36, '1', 'Assumenda velit delectus unde aspernatur et perferendis omnis doloremque. Eos at voluptatibus aut ut suscipit qui consectetur quisquam. Inventore maxime non reprehenderit ut. Quia ipsum doloremque repudiandae deleniti. Rerum qui minima ut assumenda consequatur est sapiente. Sed repudiandae sed natus. Quos rerum similique iusto aut. Iste et aut consequuntur temporibus ut. Possimus non id qui laboriosam quia.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '1990-02-18 06:07:04', '1984-05-12 22:04:45'),
(84, 'Totam laboriosam debitis et.', 'repellat-voluptas-enim-corporis-officia-incidunt', '9740.00', 5, 39, '2', 'Sit quia quidem nesciunt fugiat enim temporibus adipisci. Non saepe enim deserunt id nisi tempore eos quod. At eveniet est totam fuga rem. Et aut accusamus quo nihil. Id similique consequatur atque exercitationem eos. Expedita dolores nihil omnis repellendus id harum consectetur. Aliquid rerum sed soluta est cum nobis et eveniet. Et molestiae non iure consequatur harum. Aut quia id ut aliquam ipsa voluptatem ut. Ea aliquam harum ut distinctio et eos. Molestiae ab vitae vel nulla voluptatem.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '1988-05-02 01:33:50', '2009-09-16 14:37:25'),
(85, 'Hic doloremque alias molestias tempora.', 'neque-neque-a-nesciunt-error-qui', '6297.00', 4, 2, '2', 'Fugit repudiandae sunt aspernatur eveniet. Nihil esse dolorem est laudantium qui accusamus quas. Voluptatibus deleniti voluptas facilis ut nam. Aut tempora incidunt beatae voluptatem rerum. Sed eum consequatur omnis. Quo necessitatibus saepe dolor dolorem voluptas consequatur eligendi odit.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1978-12-08 08:19:07', '1993-08-21 12:22:12'),
(86, 'A facilis eos fugiat atque quasi.', 'aut-ut-distinctio-labore-nobis-reprehenderit', '4180.00', 5, 34, '2', 'Fugit et dolorem rem officiis velit. Enim voluptates ab odio similique nemo blanditiis. Aut numquam fuga error magni nesciunt. Laborum voluptates nostrum sed delectus enim consequatur. Aut est et excepturi omnis sunt omnis dicta. Incidunt iste delectus et. Qui voluptate nam quisquam veniam ab et dolorem. Pariatur odio quisquam alias aut minima. Doloribus unde numquam aut in et et. Tempora libero iure nihil aut sunt ut ut aut.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '2012-11-11 02:50:27', '1975-11-17 02:33:23'),
(87, 'Et qui eos sit.', 'est-facilis-voluptatem-itaque-eius', '9642.00', 10, 27, '2', 'Quis natus non molestias eos corporis. Aut omnis ut explicabo est repudiandae placeat. Et explicabo atque quaerat deserunt corporis cum accusantium reprehenderit. Eaque labore molestias dolorum perferendis qui. Sit sequi quod quas quia debitis ea ad. Est asperiores occaecati ut possimus quia non. Dolorem nisi necessitatibus provident sunt quis. Autem harum assumenda voluptatem aut amet. Dolores qui consequatur aspernatur est recusandae repellat similique veniam.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '2005-12-02 08:59:27', '1973-08-30 15:40:20'),
(88, 'Et aperiam dolore velit.', 'numquam-sint-autem-deserunt-ipsa-illum-repellendus-qui', '9124.00', 3, 41, '2', 'Aut optio dolores quod numquam. Itaque consequatur pariatur tenetur nam ipsa quisquam eligendi. Incidunt consequatur quis et. Est fuga sed sed minima velit vel. Quam ut incidunt occaecati molestias. Iusto et sapiente quaerat ducimus. Qui ut vel doloribus aut impedit laboriosam harum. Excepturi quia et deserunt et porro. Voluptates sapiente fugiat saepe voluptatum aut ut cum omnis. Officiis sequi voluptas ducimus modi. Et quo dolorem eaque consequatur qui omnis.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '2018-11-07 00:32:26', '1979-12-14 14:12:15'),
(89, 'Error sit consequatur sit.', 'sed-eius-tenetur-quis-architecto', '9332.00', 4, 50, '1', 'Tempora in sed minus assumenda perspiciatis est. Repudiandae ipsam in sit laudantium eius provident. Et accusamus aliquid aperiam laudantium. Corrupti impedit ut repudiandae totam. Labore ad cupiditate est quam. Voluptates exercitationem sit aspernatur inventore. Quaerat expedita quasi nihil et. Enim maxime sed deserunt voluptate dolorem quisquam.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1981-03-06 18:14:48', '2008-02-13 13:29:56'),
(90, 'Ipsam non enim dolores.', 'porro-quos-et-a-quos-ut-aut', '7437.00', 5, 30, '1', 'Eum sint voluptatem alias. Voluptatem nesciunt eius sunt qui qui voluptatem omnis magnam. Ipsum fuga voluptates quo temporibus repudiandae quisquam. Et animi dolore consequatur laudantium voluptas et eligendi et. Magnam rerum nostrum nulla facilis voluptatibus. Non sapiente similique ut quia rerum ut. Nesciunt debitis vitae ducimus voluptate corporis. Laborum suscipit nam voluptates rem. Unde animi sunt aut dolorem quia laboriosam nesciunt. Ut perferendis ea minima ea eligendi animi.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '2007-05-27 06:27:12', '1989-06-30 22:01:29'),
(91, 'Occaecati id sequi non impedit.', 'nihil-minus-aliquid-voluptatum-accusantium', '7777.00', 8, 17, '2', 'Quisquam assumenda consectetur facilis facilis omnis soluta voluptates. Molestiae et aut necessitatibus ipsa numquam est adipisci. Rem sit occaecati numquam perferendis ipsam nulla et. Tenetur eligendi nihil quia. Quae molestiae non voluptatem non harum ducimus sunt et. Et odit aut voluptates porro quia voluptas esse asperiores. A voluptas nulla atque est hic. Ex nam iste aut sapiente est. Cupiditate sit aspernatur expedita eos. Est id ipsam laborum quia natus aliquid.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1999-10-25 20:01:28', '1989-05-15 23:21:25'),
(92, 'Sint autem et dicta.', 'molestias-natus-id-quia-dolores', '1462.00', 5, 33, '2', 'Voluptatibus quaerat ipsam sed officia sint. Alias rem autem doloribus et nostrum nesciunt dolor. Rerum occaecati voluptatem modi laudantium hic dolor. Est qui velit velit odio. Amet repellat et a quia sed natus repellat dolores. Quia nihil tempora iste in sequi. Natus facilis nulla accusantium consequatur est blanditiis id. Necessitatibus et ut dolor ut quia praesentium quisquam. Explicabo mollitia nam ab et porro laborum. Et odio dolore aut.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 1, '1970-03-18 12:22:15', '2020-07-31 10:49:16'),
(93, 'Voluptas ex fugit nihil beatae.', 'a-totam-nemo-ut-ut', '6879.00', 9, 9, '1', 'Voluptas laborum consequuntur velit dolor. Veniam nisi aut non quo vero eos. Atque provident architecto ut. Odio esse praesentium natus porro quia. Distinctio enim reprehenderit qui repellat architecto architecto eaque. Ipsum doloribus ut aspernatur nulla iste id voluptatibus. Nisi quo sed delectus corporis. Sequi sunt dolorum ab numquam facere nesciunt alias. Corporis asperiores sed nihil consequatur.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '1977-10-21 18:32:02', '1979-06-21 17:14:39'),
(94, 'Accusantium saepe repellat ipsam.', 'voluptate-ut-corrupti-omnis', '7641.00', 8, 7, '2', 'Harum libero quis et placeat. Odio exercitationem consequatur temporibus dolores. Qui sint aliquid at doloribus sit omnis labore. Quia consequatur aliquid harum atque. Eligendi repellendus tenetur dolorem unde iusto. Voluptatem quia fugiat sit veritatis velit similique. Qui quia ducimus sapiente hic aut expedita. Quaerat earum et veritatis et. Similique delectus rem ut qui eum ipsam praesentium omnis.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '2012-01-18 23:03:11', '2020-05-23 16:38:49'),
(95, 'Quis voluptas ea.', 'aut-impedit-laudantium-provident-rerum-maiores-deserunt-ipsa', '9746.00', 2, 38, '1', 'Ab id qui libero quia ut consequatur placeat earum. Autem voluptates ratione quisquam aliquam possimus dolores. Odit ipsum doloribus odio modi qui asperiores sunt. Voluptate aut consequuntur vel vero. Id optio qui est et. Rerum nostrum quod et cumque quod aut facere. Dolorem eum debitis ut quas nihil et. Laboriosam consequatur provident numquam ullam voluptas officia pariatur voluptas.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '2002-04-12 13:10:10', '1989-02-05 11:28:51'),
(96, 'Ex aliquid autem fuga expedita laudantium.', 'sed-nam-officiis-repudiandae-magnam', '8828.00', 10, 44, '2', 'Eum enim at asperiores quia pariatur. Laborum sit id quasi quisquam dolor rerum. Eius sapiente porro placeat sed et. Autem debitis aut quis assumenda ut cum natus. Doloribus aliquid et quis rerum beatae. Corrupti tempore itaque id earum est. Voluptatem unde iusto dolores perferendis debitis. Suscipit consequatur voluptatem eveniet libero. At nam culpa dolorem. Suscipit ab sit aut eveniet assumenda. Cupiditate facere voluptas porro fugit tenetur perferendis labore.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '2002-08-08 19:02:19', '2011-03-11 09:02:44'),
(97, 'Quam aut odit at.', 'deserunt-sed-doloribus-tenetur-ut', '7361.00', 9, 17, '2', 'Assumenda dolores cum optio doloribus et dolores. Aspernatur quis quasi totam rerum nesciunt voluptatem. Non aut earum iure impedit nihil consequuntur quaerat ea. Tenetur qui dolore nisi odio impedit. Qui exercitationem voluptate maiores eum porro. Accusantium rerum et magni maxime laborum ipsum suscipit. Nulla voluptatibus architecto quia amet mollitia. Magnam alias ipsum aperiam distinctio ipsum est modi.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '1992-11-20 11:25:01', '2003-07-10 22:46:28'),
(98, 'Expedita at dolore.', 'in-iure-praesentium-quasi-unde-architecto-exercitationem', '3256.00', 2, 41, '2', 'Doloremque officia saepe totam harum ad molestias. Et sed tempore praesentium optio in tempora. Odit laboriosam explicabo officia neque itaque accusamus laboriosam voluptas. Occaecati architecto aut non nihil perspiciatis sunt dolore. Quam at cumque accusantium occaecati provident ullam. Nostrum quo porro reiciendis nisi quia sapiente. Voluptates facere enim natus.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1990-03-23 01:23:32', '2008-10-27 00:34:43'),
(99, 'Sapiente recusandae similique ut non.', 'voluptatum-eaque-tempora-quae-consectetur-inventore', '3037.00', 5, 41, '1', 'Quis quia sed possimus ducimus ut itaque facere. Autem itaque quibusdam facilis laboriosam natus tempore placeat. Qui sapiente sed expedita molestias ipsam asperiores. Perferendis accusamus et reiciendis blanditiis eveniet. Aut reiciendis provident aut. Pariatur quisquam ipsam nobis voluptatibus repellendus natus. Vitae quos laudantium veniam. Voluptas omnis voluptas excepturi sint et ipsum quis. Aliquam at vel aut pariatur.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '2008-08-07 12:42:16', '1994-10-27 10:23:57'),
(100, 'Voluptates distinctio molestiae veritatis nobis numquam.', 'deleniti-nulla-doloremque-et-aut-odio', '1454.00', 5, 7, '1', 'Unde aut sint accusamus eaque dolor qui earum. Id aut possimus dignissimos corporis minus voluptatibus. Autem aut molestiae et praesentium dolor assumenda. Eos deleniti temporibus vel architecto qui quo. Aspernatur consequatur maiores iste et. Laudantium porro id dolorum recusandae non et voluptatem. Architecto quis quo porro voluptates architecto suscipit.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '1997-11-20 15:14:41', '2001-03-18 20:47:51'),
(101, 'Repudiandae dolor unde ea.', 'aperiam-cupiditate-quia-fugiat-quos', '7143.00', 6, 10, '2', 'Saepe enim numquam sit quis culpa. Id ut rem at velit. Et quae est autem. Cupiditate ducimus ad unde cupiditate soluta ea molestiae nesciunt. Quo reiciendis animi sunt dolorum. Hic nam qui libero commodi officia. Inventore culpa distinctio aperiam dignissimos sequi laboriosam quo. Doloribus mollitia sed enim facere deserunt. Fugiat repellat impedit et veritatis vero amet.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '2017-05-24 10:57:21', '2020-08-01 11:57:34'),
(102, 'Fugiat placeat mollitia dolor perspiciatis.', 'aperiam-voluptatem-illum-quo-laudantium-repellendus-sed-nam', '6167.00', 10, 42, '2', 'Veritatis atque distinctio beatae sed voluptatem eos soluta delectus. Libero consequuntur nihil sunt voluptatem. Qui animi ut et enim est non reiciendis ut. Tenetur soluta quas ut et qui. Dolorum quo laboriosam consectetur temporibus. Qui nam et veniam ipsum voluptatem saepe. Modi sint aut ex inventore recusandae est. Minus ut quia expedita occaecati magnam nam illum. Unde commodi iure aut magnam. Eum porro id sunt repellendus minus enim et. Et modi odio et. Voluptatem quibusdam eaque quod est.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '1974-02-16 02:25:48', '1984-10-24 21:48:26'),
(103, 'Quaerat distinctio debitis culpa.', 'dolores-quidem-maxime-aut-iure-iure-nihil', '8333.00', 4, 40, '2', 'Nemo asperiores omnis numquam ipsa quam. Eos magni dolorum commodi quis. Quia id doloremque nihil occaecati consequatur at explicabo. Praesentium atque enim qui. Quam nemo accusantium deleniti. Deserunt error ducimus provident saepe nam. Pariatur assumenda beatae qui est modi modi. Quaerat sunt harum nisi sunt magni ducimus. Pariatur laborum porro tempora.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '1991-08-22 22:09:16', '1977-07-12 09:48:51'),
(104, 'At dolor qui.', 'modi-exercitationem-fugit-accusamus-assumenda-et-dolor', '4080.00', 7, 18, '2', 'Iure dolores accusamus quia amet soluta. Quod exercitationem a voluptas debitis rerum. Voluptatem ut tenetur et itaque sunt non magnam. Qui facere molestiae aut. In tempore aut eius optio rerum porro odio molestiae. Deleniti officiis sit architecto quas dolores impedit facere. Qui corporis maiores voluptas qui nobis quibusdam nesciunt aut. Ipsam et architecto explicabo quasi neque. Suscipit molestiae ut molestiae consequatur non quia. Aut laudantium aut minus.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '1986-04-25 04:09:05', '1988-05-31 02:09:21'),
(105, 'Laboriosam ratione deleniti.', 'voluptates-deserunt-nemo-libero-maxime-numquam-minima', '9442.00', 5, 50, '2', 'Non nobis doloremque voluptas ut voluptatum deserunt aut. Quasi labore doloremque eos nostrum. Qui sit explicabo magni et. Qui qui pariatur nulla officia aliquid et magnam. Iure ea repudiandae et odio sed nisi aut cum. Quia accusamus facere odio est non consequuntur. Voluptatem ut cumque itaque voluptatibus. Labore labore numquam ullam reprehenderit dolorem. Possimus omnis numquam suscipit animi nemo vitae sit. Deserunt ratione esse magnam hic amet inventore.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '1988-10-30 09:00:17', '1994-10-17 13:42:30'),
(106, 'Debitis numquam quae sunt eos.', 'possimus-et-quos-aut-voluptas-autem-sed', '9021.00', 10, 4, '2', 'Recusandae omnis voluptas accusamus cumque dolorem sit voluptatem blanditiis. Hic sint natus quidem et. Accusamus laborum aliquam voluptas atque dolore enim asperiores. Rerum pariatur veritatis consequatur quod eaque quae nulla nesciunt. Enim fuga reiciendis quia commodi voluptas laudantium architecto facere. Aperiam ex laudantium eum et asperiores. Cupiditate debitis modi error nihil cum sapiente aut amet.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1997-05-01 02:16:55', '2010-09-13 14:05:52'),
(107, 'Fuga est porro recusandae.', 'corporis-autem-magni-neque-quod', '7384.00', 10, 32, '2', 'Consequatur repudiandae ducimus consectetur eveniet et. Enim est enim dolor molestiae dicta saepe. Aut perferendis nam voluptatem itaque. Optio expedita dignissimos repellat unde sed. Nulla quis hic iure autem eum eos. Qui sed eum est aut qui quasi. Reprehenderit excepturi corrupti aliquid et illo. Molestiae vel provident reprehenderit voluptatibus id. Delectus occaecati quia voluptates. Aliquid minima consequatur nihil est. Adipisci error qui est non.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '2006-12-22 04:01:17', '1971-01-09 16:44:33'),
(108, 'Rerum quam fugit.', 'ut-a-iure-magnam', '8630.00', 1, 23, '2', 'Quas et eos dolorum odit veniam et qui. Ea facere et nesciunt officiis ut. Sunt ut modi eveniet quod quisquam. Vel incidunt et earum mollitia sed. Numquam rerum blanditiis debitis laudantium. Accusantium harum vel aut beatae. Accusamus cumque qui ipsum maxime aliquid suscipit sed. Ipsam et veritatis ut corporis doloremque. Illo temporibus sed fugit molestiae sequi architecto. Aut quia eum magnam fugit adipisci sint occaecati. Quia enim veritatis sit.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '2010-02-06 12:47:10', '2018-10-15 00:30:21'),
(109, 'Id voluptas et voluptatem ducimus commodi.', 'tempore-nostrum-quam-neque-amet-veritatis-natus-pariatur', '6158.00', 0, 34, '2', 'Autem eius ipsa quas qui illo. Placeat libero dicta quam tenetur aperiam. Quia dolores dolores occaecati provident sunt ducimus molestiae ipsum. Consequuntur error vel reprehenderit sequi nostrum dolorum at. Voluptatem aliquid sit temporibus maxime. Nihil nostrum dicta incidunt omnis rem quae. Nam voluptatem ad exercitationem. Ea vel molestias quo tempora ut. Vero qui non voluptas quisquam quae.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '2005-05-11 02:24:35', '2020-01-18 16:34:50'),
(110, 'Ut id quam ducimus assumenda ad.', 'ea-minima-at-nostrum', '6988.00', 10, 13, '2', 'Impedit tempora deleniti provident voluptatibus voluptatibus et. Officiis saepe corporis veritatis ullam non minima quis. Ullam voluptas cupiditate vero occaecati. Libero quisquam consequatur aliquam quo. Illo assumenda numquam sapiente nobis ut impedit. Maiores nam sapiente odio aut. Autem dolorem ipsa aut consequuntur vel aliquid quis. Minus labore quo necessitatibus est. Non voluptatum quis est est adipisci eos sint.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '1992-12-03 02:27:57', '1974-07-09 02:30:33'),
(111, 'Dolorem sint autem delectus quod.', 'qui-quia-aliquam-inventore-cum', '4613.00', 2, 32, '2', 'Quos necessitatibus et praesentium excepturi ratione veniam quibusdam ad. Et velit error molestiae ea similique ut hic. Omnis a adipisci est quia magnam quos dolor est. Ut sunt labore quas et doloremque est sit. Sunt ullam numquam aut ratione quaerat. Eum possimus et officiis beatae. Quis non enim incidunt optio laborum sed est.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '2000-09-18 07:25:46', '2006-11-12 10:18:03'),
(112, 'Numquam eos tenetur voluptatem ut.', 'odio-tempore-error-voluptas-ea', '7360.00', 8, 48, '1', 'Facere amet minus voluptate adipisci aut ut eveniet. Et et ab reprehenderit hic et. In id ut labore eos quis. Debitis beatae dolor vero minima quas maxime. Recusandae et tenetur omnis deleniti rerum totam esse. Consequatur dolores occaecati sint rerum. Voluptatem molestiae qui rerum eveniet consequatur consequatur. Molestiae esse est corrupti quod. Et voluptas error dicta ut quod. Quisquam soluta placeat dolores quia et ratione. Quisquam qui est amet soluta. Est quia dicta corrupti aliquam.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '2011-03-31 11:27:02', '1992-02-03 04:04:02'),
(113, 'Iusto unde iure repellendus explicabo.', 'explicabo-eum-hic-impedit-aperiam-sunt-cumque-est', '5776.00', 6, 20, '2', 'Ex ut sed omnis adipisci velit debitis praesentium magni. Quo voluptatum et ut quidem. Officia ad magni qui quia quia. Quibusdam aperiam ipsum animi magni suscipit tempora. Tempore error iste iste asperiores est sint id. Repellendus ipsam quaerat magni et cum provident rerum. Expedita est officia esse omnis id repellat possimus. Voluptatem et sunt est.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '2001-06-04 22:49:11', '1979-09-13 04:12:15'),
(114, 'Commodi similique a.', 'ipsum-magnam-et-modi-id', '8586.00', 1, 13, '2', 'Eaque et unde veritatis possimus ut et omnis. Quia doloremque eligendi assumenda. Earum eveniet quis dolorem odio quis dignissimos ut. Eaque quia tempora repellat voluptas similique. Id aspernatur quo aut. Dolore provident est quisquam illo reiciendis. Voluptatem ipsam et laborum laudantium.', '5f1db8ecedec5.jpeg', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '1976-02-12 03:45:07', '2020-07-26 17:10:05'),
(115, 'Corporis dolore et ex.', 'alias-nulla-vel-necessitatibus-quis-quia', '7271.00', 8, 38, '2', 'Dolor sapiente soluta quia expedita voluptas. Mollitia sit et sunt dolor aut. Est consequatur possimus dolore exercitationem. Eaque maiores asperiores nesciunt natus. Similique laboriosam tenetur sit eveniet. Incidunt enim beatae libero quis qui aliquam culpa quos. Velit ipsam et laborum. Quae doloribus molestiae corporis ab ab praesentium harum.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '1972-09-04 04:00:45', '1997-08-29 04:03:04'),
(116, 'Illum suscipit natus nostrum quis quia.', 'et-quae-et-id-occaecati', '3808.00', 7, 38, '2', 'Sunt non voluptas velit voluptate et quo quis. Culpa nihil aut quia aut quis. Sed itaque corrupti aspernatur. Et dolorem non facere facilis ut sit. Numquam nobis eius facilis veritatis ab. Maxime voluptatem perferendis deserunt maxime. Velit autem et sed facere. Dolore ea eos et harum voluptas fuga odit tenetur. Sapiente autem quam quia. Illum quia ut sequi et molestiae. Voluptas et consequatur non suscipit magnam quo hic. Id temporibus autem sed placeat et.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1976-01-04 07:13:43', '1991-12-06 19:52:36'),
(117, 'Laboriosam eveniet quae enim voluptatem.', 'laborum-voluptatem-assumenda-officia-quia', '2503.00', 8, 8, '1', 'Id aut et sint ut eaque. Eum velit id doloribus aut. Dolor vero minima vel nemo deleniti magnam rerum. Sed earum tempore qui aliquam omnis cum. Voluptates tempore molestiae eos dolores asperiores impedit aut. Esse reprehenderit ut molestiae. Est odio nihil ducimus omnis rerum aliquam. Praesentium unde eum quia corrupti reiciendis numquam facilis. Fugit cum et illum qui voluptatum placeat nemo. Omnis debitis deserunt sed porro illum qui exercitationem. Ut ut dolorem minima.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1994-08-01 02:30:48', '1979-01-06 10:52:55'),
(118, 'Hic veritatis rerum vel voluptatem.', 'et-eum-nobis-veritatis-sed-rerum-et-amet-at', '8226.00', 9, 35, '2', 'Beatae a atque qui ut. Porro voluptatem qui qui voluptates inventore. Nesciunt consectetur voluptas maiores nostrum consequatur. Eum eveniet dolores ratione ducimus quasi numquam. Aut et magni porro ipsa inventore sed facere. Distinctio architecto error sit odio consequatur ut. Velit error consequatur nihil minus dolores facere. Corrupti nihil voluptatibus itaque natus illum pariatur. Aut ea at ratione nisi dolores.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '2018-08-13 09:50:51', '2020-07-31 11:18:38'),
(119, 'Doloribus sed provident aspernatur.', 'eius-culpa-autem-esse-molestias-dolores', '4297.00', 9, 29, '2', 'Quam nostrum repellendus incidunt qui labore iste. Aut aliquam dicta quibusdam ab deserunt. Suscipit magni beatae suscipit vel laboriosam et. Debitis soluta necessitatibus deserunt et tenetur voluptatem. Veritatis voluptatum totam dignissimos. Ut optio enim sit odio eaque aut tempore. Dolor autem expedita soluta animi mollitia quam tempora. Sapiente sint voluptas voluptate consequatur.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '1996-11-22 16:01:33', '1984-05-07 14:08:38'),
(120, 'Quidem occaecati dicta incidunt voluptatum.', 'similique-id-explicabo-pariatur-animi-est', '1470.00', 10, 36, '2', 'Aut minima voluptatem explicabo maxime laborum eaque eaque. Et aspernatur nisi ad soluta et et. Quas optio vero ipsam reiciendis dolores. Ducimus sit autem eligendi aut dolore quidem. Dolorem pariatur porro odio perspiciatis qui tenetur possimus. Quidem blanditiis iure sit aspernatur incidunt voluptatem sint. Aspernatur quae voluptas et quae dolorem. Enim libero accusamus nostrum. Sit delectus quia cumque a explicabo reiciendis modi. Et voluptates voluptatum ea qui deserunt.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1992-05-19 10:21:24', '1997-04-08 09:19:51'),
(121, 'Aut sequi cum est quis.', 'assumenda-perferendis-quibusdam-ut-laboriosam-cumque', '6370.00', 5, 41, '2', 'Hic nostrum animi ut quas expedita alias dolor. Quia iure quia facilis porro nemo est consequatur. Ea et minima molestiae non. Delectus ducimus quisquam est. Voluptas perspiciatis eos dolorum sint sint iure. Est ipsa quis et at culpa. Nihil adipisci eum accusamus. Earum ea occaecati sit accusantium neque itaque alias. Velit suscipit deserunt eum non natus voluptas possimus placeat. Veritatis itaque est nulla ex dicta sed similique. Voluptatibus doloremque rem in qui voluptate.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '2006-04-04 09:18:30', '1992-02-11 12:20:47'),
(122, 'Earum velit hic optio tempora corrupti.', 'et-voluptas-repellendus-et', '8404.00', 8, 30, '2', 'Iure assumenda dicta rerum non. Qui hic unde in ad veritatis accusantium. Expedita eaque sed qui est. Maxime voluptatem voluptatum iure repellendus magnam. Facilis laboriosam quam aut nobis dolores omnis. Dolores ipsa libero necessitatibus sint soluta dolor laudantium. Cumque ea illum ex quas fugit. Quas ipsa ut ipsa rerum reprehenderit. Magni sint vel cum dicta facilis nam ea alias. Odit quis similique culpa facilis beatae sit quos eveniet. Officia optio dolor in est provident.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '2013-04-24 08:36:58', '1989-10-02 02:56:35'),
(123, 'Eveniet eum in consequatur dolor perspiciatis.', 'maxime-saepe-voluptas-et-temporibus-fugiat-quo', '9244.00', 8, 13, '2', 'Fuga vel a ut dolorum magnam. Temporibus qui maiores distinctio tempora. Ducimus ullam facilis dignissimos. Perspiciatis nesciunt ipsum et distinctio est rerum dolor. Nisi officia sit sed enim maxime mollitia et. Commodi nam non dicta voluptas perferendis. Numquam temporibus velit temporibus. Sit est aut aut quaerat repellat. Non repudiandae minima sit temporibus molestiae maiores repudiandae. Id dolor adipisci amet dolores doloremque harum qui.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '1980-09-30 16:21:09', '2005-05-20 11:22:11'),
(124, 'Et architecto aperiam natus.', 'aut-itaque-voluptas-esse-ducimus-nemo', '5940.00', 10, 14, '2', 'Perferendis ut voluptas est fuga aliquid labore. Laborum modi magnam corrupti voluptatibus et natus. Ut rerum debitis eius qui omnis officia doloremque. Quidem eum officia officiis ut. Delectus ut est accusamus atque rerum. Quia aut quisquam numquam officiis sapiente vero error. Facilis quo ratione recusandae modi rerum. Id in nobis atque optio. Doloremque harum autem reiciendis deleniti. Maiores et dolorem quasi voluptate occaecati. Consectetur adipisci enim eos eaque qui.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1970-11-17 12:05:02', '2007-03-15 17:41:05'),
(125, 'Laudantium repellat ut sed.', 'recusandae-nisi-provident-at-dolorem-veritatis', '8520.00', 10, 20, '2', 'Non aliquid provident sed qui voluptatem sint ea. Tempora provident inventore dolores officiis ullam omnis alias. Nisi iste qui eum. Illo saepe id velit eius et aut. Officiis corporis consequuntur quidem tempore aperiam nihil voluptatem. Quia consectetur velit animi in quibusdam eos consequatur. Vitae unde atque voluptas et commodi nesciunt. Blanditiis hic id laboriosam adipisci. Delectus nulla quo eos accusantium minus molestiae quo. Ut nemo cupiditate magnam cumque dolorem atque consequuntur.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1997-09-17 08:12:28', '2006-07-06 22:19:20'),
(126, 'Dolores autem voluptatem deleniti id.', 'et-velit-aut-enim-omnis', '5147.00', 7, 39, '2', 'Dolor quia consequatur magni vero qui. Et modi et ut beatae. Quo error exercitationem voluptatem et facilis consectetur cumque. Et nesciunt odit suscipit laborum voluptatem. Alias cupiditate et qui inventore optio. Odio laboriosam numquam qui quae dolorem. Dolorum itaque temporibus enim laudantium. Dolorem dolorum quam qui nesciunt voluptatem omnis. Voluptas unde id iusto cupiditate quia sint. Enim tempora occaecati dolorum veniam nam.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1977-09-13 22:39:24', '2013-11-04 18:45:18'),
(127, 'Consectetur ut ea beatae.', 'et-tenetur-sint-et-alias-autem', '8655.00', 6, 24, '2', 'Aperiam deleniti explicabo est libero. Veritatis eum voluptatibus eum saepe corrupti. Sunt eaque eligendi nemo ea. Qui voluptatem et et rem accusamus laborum. Velit blanditiis voluptatem veritatis voluptate. Illo vero qui eos. Omnis autem laborum eos et porro. Adipisci vitae et molestiae magnam rerum. Deleniti dolore dolorem assumenda ad molestiae. Est quaerat sequi voluptas et quasi.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '1996-01-24 03:53:04', '2019-01-05 01:24:09'),
(128, 'Tempora animi sed id.', 'temporibus-ut-consequatur-veniam-et-enim-sint', '4849.00', 6, 35, '2', 'Quaerat quis et ipsum harum. Deleniti ullam cupiditate quaerat in rerum quos. Dolorum praesentium vel fugiat eveniet. Blanditiis dicta qui est. Laudantium dolore ex quo rerum cupiditate. Reiciendis quia repellendus eaque vitae. Assumenda incidunt dolore et in. Recusandae vel possimus nisi placeat dolorum. Est maiores aut sequi vero. Aut eaque a eligendi omnis non repellat. Reprehenderit et doloribus delectus perferendis nulla sunt expedita nostrum. Nihil non impedit ut in ratione et.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '2011-01-19 00:33:12', '2014-04-13 18:48:22'),
(129, 'Nisi quia deleniti officiis recusandae.', 'molestiae-delectus-ipsam-odit-natus-tempora-et', '7387.00', 3, 32, '2', 'Impedit dolor quidem sint molestiae incidunt. Rerum labore excepturi ducimus. Aut et quod rem quaerat. Iure aut officia illo sint sed libero minus aliquam. Soluta sed aut omnis incidunt dolorem iusto. Explicabo sunt nesciunt quia illum tenetur. Qui et in omnis est porro.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1997-04-04 20:24:38', '1975-01-14 06:29:03'),
(130, 'Recusandae corrupti ut.', 'temporibus-facilis-distinctio-vel-quis-tempora-voluptas-qui', '6484.00', 6, 11, '2', 'Corporis inventore et tenetur magni. Consequatur optio ad aliquid possimus dolorem est dolor aut. Tenetur impedit dolorum omnis delectus ex aut quibusdam. Adipisci voluptas harum officiis aut omnis. Earum quaerat vero commodi velit sint nisi necessitatibus. Maiores illo ut tenetur aut ad officia minus.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '2011-11-12 14:19:59', '1984-01-12 20:37:10'),
(131, 'Consequatur unde quas eligendi placeat aliquam.', 'perspiciatis-exercitationem-incidunt-est-voluptatum-ut-molestiae-et', '8886.00', 5, 49, '2', 'A odit voluptatum qui enim. Et dolorem sit sit sunt. Quod et tenetur optio facilis minus veritatis optio. Debitis et consectetur in quos molestiae sunt expedita. Quia iste rem odio rerum eos. Voluptas earum quo accusantium quos eum. Dolor et dolor aut blanditiis aut. Minima autem et ut vitae minima et. Ea totam et cupiditate ipsum blanditiis est inventore. Et necessitatibus officiis ut nam non velit. Possimus nulla doloribus ratione quidem consequatur. Ea est eligendi et quas.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '2006-08-04 21:48:21', '1985-05-10 15:24:58'),
(132, 'Corrupti sunt qui dolorem et possimus.', 'velit-molestias-id-facilis-molestias-sed', '5041.00', 6, 27, '2', 'Soluta architecto necessitatibus id nisi. Voluptas quibusdam consequatur mollitia earum possimus. Saepe est omnis unde voluptatem in consequuntur expedita. Consequatur fugiat saepe iusto. Nihil amet qui aliquid. Architecto minima fugiat quia alias. Molestiae officia modi quos et est praesentium. Nulla in voluptas modi autem rerum excepturi harum. Explicabo sunt non voluptas necessitatibus consequatur accusantium dignissimos aliquam. Accusantium esse et ipsum laudantium et.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '2002-05-28 07:05:01', '1988-06-29 15:31:22'),
(133, 'Modi aut exercitationem.', 'hic-veritatis-dolorum-nihil-nesciunt', '5474.00', 7, 34, '2', 'Labore adipisci consequatur libero enim consequuntur. Quibusdam numquam veritatis nam aliquam. Corporis inventore quos aut consequatur molestias mollitia. Sed cupiditate vel sunt deleniti vel ut est. Rerum est qui earum quis blanditiis tempore. Distinctio aut quasi aspernatur quia sit ut temporibus quas. Magni nulla eius aut ex. Voluptatem recusandae quia doloribus. Aut magni laudantium sapiente fugit. Quaerat earum ullam culpa. Voluptatem sed rerum eveniet.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '2015-03-31 03:03:55', '1996-09-19 07:38:54'),
(134, 'Ea ex natus corporis.', 'quaerat-dicta-aperiam-et-sint-suscipit-quia-nihil', '4528.00', 3, 26, '2', 'Cum culpa incidunt officia porro consequatur. Dignissimos quasi atque expedita non. Qui suscipit est molestias soluta exercitationem. Commodi rerum aliquid ipsa est assumenda aut cupiditate. Fuga in vitae inventore reiciendis velit dolor esse. Enim alias earum velit id. Ratione accusamus sunt ex corrupti numquam ratione. Voluptatem officiis aut sed aut perspiciatis. Quibusdam commodi ea quas dolorem qui et. Non id esse nulla deserunt error adipisci sed.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '2000-10-10 17:30:21', '2013-04-26 02:50:14'),
(135, 'Nihil quia quaerat.', 'ut-id-deserunt-rem-nostrum-magnam-commodi-perspiciatis', '4814.00', 9, 24, '2', 'Deleniti beatae reprehenderit inventore. Quaerat doloribus dolorem aliquam non impedit. Voluptatem dolor in commodi in explicabo id aut. Praesentium et quis ipsam necessitatibus minus dolore. Delectus et est sed exercitationem et. Aperiam rem itaque molestias quia ducimus dolor nostrum. Voluptatum recusandae quia nesciunt perferendis aut ut sit. At illo voluptatem voluptatem sequi. Quod possimus explicabo qui in quidem odit nemo. Accusantium beatae quaerat ut natus.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '2004-08-16 16:53:36', '2010-08-23 13:22:27'),
(136, 'Molestiae ad accusamus quia quis.', 'fugit-sequi-nihil-sit-et-eum', '7647.00', 9, 20, '2', 'Eveniet distinctio nulla qui voluptatem vitae. Tenetur voluptates numquam quia. Voluptatibus quas minus sed commodi maxime. Veritatis ea provident odit et quo. Qui voluptatem impedit quibusdam ipsam est vero. Saepe praesentium dolorem sit quis quas molestiae. Ut quia vero voluptatem et aliquid est qui sunt.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '2011-07-16 04:05:41', '2002-01-16 15:49:50'),
(137, 'Magnam sit ipsum exercitationem fugit.', 'ipsum-rerum-quasi-tempore-atque-quos-non', '2787.00', 10, 20, '2', 'Repellat vel doloribus nulla rem non omnis. Earum molestiae saepe aut. Qui est enim velit aliquam vero. Quis vel aut magni neque nostrum fuga aut. Voluptatem voluptatem impedit dicta quam mollitia commodi aliquam. Temporibus nesciunt officiis quod maxime est dolor aliquam. Perferendis dolorum inventore et illum ex et. Est sed ipsa excepturi voluptas qui laudantium. Nihil est cupiditate at itaque eum. Explicabo cum qui commodi id consequatur tempore.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '2004-09-22 20:42:17', '1981-08-15 10:25:21'),
(138, 'Deleniti rerum non omnis facere.', 'eligendi-voluptatibus-voluptates-minus-voluptatem-molestiae-dolor-qui', '8322.00', 2, 17, '2', 'Sed debitis quo atque ut. Quae corporis expedita nisi incidunt. Perferendis deserunt totam animi pariatur cupiditate sapiente nobis. Exercitationem aut commodi quam numquam voluptatem reiciendis delectus. Voluptatibus nihil consequatur ut nisi qui culpa ut. Vel ea animi ipsa quam. Quos voluptas dignissimos veniam sunt et. Blanditiis ut nulla minima quibusdam ratione. Autem est sit praesentium animi. Explicabo explicabo nemo eos aut qui.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '1992-03-10 02:03:36', '2015-02-21 11:07:14'),
(139, 'Tempore iure perspiciatis est.', 'vitae-voluptates-repellendus-laudantium-accusamus-quis', '974.00', 3, 25, '1', 'Sint amet eos voluptas error neque. In qui assumenda earum quis placeat officiis voluptas. Et sint eum voluptas assumenda autem beatae culpa. Maxime doloribus voluptatem est. Odit qui eos ex in. Ad aut maiores nemo quia quod. Facilis ratione sed fuga itaque sunt. Consequatur nesciunt in nostrum nobis minus saepe modi. Ea fugiat illo quis repellendus. Ut sint unde aperiam nihil tempore occaecati. Vitae ducimus voluptate aliquid doloremque nemo iusto. Possimus soluta quia nam saepe.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 1, '2000-10-07 15:51:59', '1976-04-27 20:32:05'),
(140, 'Quae ut et qui quisquam.', 'quia-fuga-vel-dolor-debitis-ut', '8607.00', 8, 27, '1', 'Temporibus in ea beatae accusantium quod tempore. Voluptatem exercitationem debitis sapiente dicta. Quia eos et rerum harum enim. Est fuga quo neque omnis eveniet aliquid sapiente. Provident architecto consequatur omnis cum porro. Voluptatem reiciendis odit unde odit vel eum ipsa. Mollitia ea ut eaque. Numquam et optio alias maiores.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1981-08-07 19:17:04', '1997-09-06 11:39:59'),
(141, 'Explicabo qui consequatur.', 'voluptatem-libero-nesciunt-voluptas-reiciendis-mollitia-eum', '8120.00', 2, 43, '1', 'Quisquam quae sit impedit distinctio quidem est ipsam. Nisi ad rerum officiis vel rem. Vero minima doloribus dicta dolorem fugiat tempore. Omnis necessitatibus et est voluptatem beatae. Iste dolorum aspernatur perferendis quidem. Odit molestiae deserunt nesciunt qui numquam. Quia inventore et cum officiis quia omnis molestiae.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1999-07-07 21:48:22', '2012-08-10 12:54:55'),
(142, 'Sint occaecati eum tempora qui doloremque.', 'tempore-delectus-rem-nisi-similique-neque-aspernatur-debitis-dolores', '5179.00', 1, 32, '2', 'Sapiente sunt debitis adipisci tempora assumenda et. Quam quidem nam iusto distinctio ducimus repellat. Quidem ut perferendis tenetur eum ab cum iste. Dolorem omnis dolorem sint debitis. Debitis quod rerum voluptas expedita porro vero. Quae veniam soluta aperiam praesentium et. Vel architecto dolore architecto non maiores voluptatem. Optio vel qui vitae distinctio officia. Omnis nulla aliquid reiciendis.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '1980-03-31 22:39:33', '1970-05-30 19:21:23'),
(143, 'Modi praesentium ut in ea culpa.', 'reiciendis-quaerat-rerum-doloribus-rerum-aut-corporis-voluptatem', '8869.00', 4, 38, '1', 'Deserunt facilis est cupiditate earum fuga. Nisi voluptatem et dolorem ducimus delectus qui. Eius sed minus modi. Sit dolorum est dolor enim. Quas in dolorum vitae debitis quas ea quas dolores. Ea doloremque dolores et mollitia neque ipsam ut rerum. Et nobis nostrum eligendi et. Provident eaque cupiditate quis sed pariatur qui quae dolorum. In aut illum facilis veritatis omnis accusamus. Laudantium asperiores doloribus et.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '2001-01-15 00:38:06', '1981-06-30 22:27:49'),
(144, 'Repellendus qui cupiditate molestiae deleniti delectus.', 'odio-sit-quia-omnis-debitis-omnis', '4752.00', 9, 24, '2', 'Quia nulla consequuntur ut eum vero. Debitis sit ut voluptate consequatur saepe cupiditate eum. Accusamus aut repellendus totam dignissimos. Et enim nostrum sed amet. Inventore quis blanditiis atque quae corrupti est. Eaque inventore quos voluptates molestias nam voluptatem ex ipsa. Consequatur beatae nulla ratione ex. Aut quibusdam voluptatum aut iure aut. Qui aut ex voluptas sunt a inventore id.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '1983-11-30 20:35:53', '2009-06-12 06:44:40'),
(145, 'Tempora minima id vitae quisquam.', 'aut-esse-aut-repellendus-quae-aut-fugiat-deserunt', '6627.00', 4, 7, '1', 'Possimus optio facere ipsam est suscipit vero dolor quo. Id totam non sunt porro unde. Quisquam facere sequi reprehenderit labore vitae. Tempora veniam qui ut dolores velit repudiandae. Sunt sed repellat culpa commodi quis impedit quidem maiores. Quaerat dolores aspernatur atque. Ea esse at qui reiciendis asperiores non dolorum. Id blanditiis alias id nam. Animi dolorem corrupti est sequi.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '2017-10-25 22:00:26', '1998-03-26 19:26:43'),
(146, 'Omnis omnis voluptatem.', 'asperiores-est-aut-omnis-doloribus', '6233.00', 7, 44, '2', 'Quis illum et eos harum consequatur dolores ad. Earum error dolores debitis maxime qui nihil. Qui delectus officiis reiciendis unde quibusdam debitis accusamus ut. Laboriosam pariatur corrupti laborum fugiat. Quisquam quia deserunt culpa molestiae adipisci minus in. Accusantium dolore deleniti fugiat nam enim est reprehenderit sed. Perferendis tenetur quae ducimus. Ut error et et officiis quidem aut. Et non tempore labore consequatur.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '2003-02-20 09:04:59', '1995-01-11 07:23:31'),
(147, 'Ex consequuntur voluptatibus occaecati et veniam.', 'iure-sapiente-aut-eum-qui', '3591.00', 8, 42, '2', 'Voluptas debitis quia sed neque. Tenetur voluptatem ea est ut cumque itaque. Perspiciatis corrupti laboriosam animi esse. Rerum deserunt vitae et enim ipsa aperiam consequatur aut. Corrupti eligendi sed sunt eos at et doloremque. Qui dolor qui quo eveniet. Adipisci sint suscipit possimus tempora sint iure. Quo culpa asperiores ullam consequatur explicabo ea ratione. Iusto qui odit temporibus eos. Illum rerum et voluptate quae.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '2008-03-09 14:37:28', '1977-01-05 13:43:22'),
(148, 'Voluptates sit ea reprehenderit.', 'voluptas-optio-debitis-minima-quae', '5819.00', 10, 42, '2', 'Adipisci omnis fugiat est nesciunt repellendus quia iusto. Repellendus delectus et rerum vel eaque consequatur dolor. Vel adipisci quaerat et doloremque repellendus officiis. Consequuntur illo ratione enim fugit quia. Id id natus esse repellendus. Provident ipsum amet fuga ipsam assumenda qui dolorem. Labore iusto dolores iste. Eligendi sint occaecati dolore minus possimus. A hic quibusdam quia alias quis odit culpa architecto.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '1971-11-19 12:14:27', '1974-03-16 09:41:19'),
(149, 'Qui ipsa non.', 'id-blanditiis-et-voluptas-commodi-maiores', '8991.00', 5, 31, '2', 'Nostrum sit omnis laborum fuga qui maxime. Quas omnis reprehenderit optio harum et eaque quo. Neque praesentium eligendi soluta. Expedita tenetur qui esse at cumque. Laudantium id dolorem quasi laudantium ut mollitia iusto autem. Ea expedita voluptatem nam rerum officiis enim voluptatem inventore. Ea voluptas molestiae et quidem rerum eos libero.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '2001-03-19 20:23:27', '2012-01-24 01:46:28'),
(150, 'Harum quidem error molestias.', 'nisi-ut-ipsa-temporibus-fugiat', '1896.00', 9, 49, '2', 'Aut ipsum officiis possimus ut tempore. Odit et quo reiciendis quibusdam eum doloremque. Quasi voluptas asperiores molestias voluptatum totam officiis laboriosam. Iusto vero voluptatibus perferendis fugit dolorem quibusdam sit. Ipsa nisi natus ut libero. Commodi sed doloribus minus quo ex. Fugit corporis distinctio blanditiis eum. Laboriosam voluptatem sequi earum facilis rerum aliquam aut. Dolores amet iusto est vel unde dignissimos. Excepturi cumque fugiat dicta non.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 1, '2017-07-01 17:06:40', '1996-10-22 13:10:27'),
(151, 'Sapiente corrupti voluptate est.', 'cumque-ducimus-ducimus-earum-facilis-explicabo-et', '8365.00', 10, 37, '2', 'Deleniti temporibus in iste culpa nihil recusandae asperiores. Velit est ducimus rerum perferendis porro officiis consectetur occaecati. Consequatur maiores ea ad sit. Harum quia architecto cupiditate voluptas laborum est. Omnis ut iure nihil placeat et tempore. Et vel rerum et. Natus quia aut porro aut delectus. Nihil ipsam ab minus. Sit qui eum quas. Officiis corrupti sapiente ut deserunt placeat. Consequatur consequatur et quia ipsa tempore.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1994-02-02 06:23:34', '2018-10-06 14:45:58'),
(152, 'Maxime deserunt eum in laboriosam architecto.', 'et-vel-dolorem-repudiandae-aliquid-consequatur-voluptatem-odio', '7493.00', 6, 47, '2', 'Tempore consequatur occaecati omnis aliquid officiis molestiae consequuntur. Ratione incidunt cumque sit atque vitae. Eum beatae modi asperiores in illo. Sit magni dignissimos totam officia. Libero quibusdam praesentium optio. Sit voluptatem eaque soluta repellendus.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '2016-01-05 14:23:52', '2003-02-26 08:21:14'),
(153, 'Voluptatem facilis explicabo numquam.', 'delectus-qui-quia-sed-aut', '4771.00', 10, 44, '1', 'Quaerat est rem rerum. Quo accusamus voluptatem voluptas quis hic ullam sapiente. Alias libero sunt animi necessitatibus aut ab. Dolore aut excepturi repudiandae voluptatem praesentium non. Tenetur voluptas molestiae recusandae modi. Fugiat est saepe a veritatis rem. Nobis explicabo laboriosam ut ut aut magni id.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1987-03-16 05:05:49', '2012-02-10 11:10:42'),
(154, 'Voluptatem facere dolor ab eligendi.', 'in-et-et-neque-doloremque-ut', '5122.00', 4, 24, '1', 'Provident laboriosam quia vitae id aut alias facere suscipit. Ipsum eaque impedit autem dolorum dolores vitae vero. Et nostrum eum nulla. Eaque aspernatur facere aperiam deleniti ea aut. Doloremque quidem facilis minus totam nihil quae. Consectetur blanditiis aliquam deserunt iste. Distinctio quae et ex eligendi in ab voluptatum ea. Rem autem eveniet officia omnis repellendus. Dolorem ut voluptates id. Eos nostrum eos aut quo. Aut placeat velit rem eos quam qui qui reprehenderit.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 1, '1984-03-21 16:16:39', '2006-12-19 20:10:27');
INSERT INTO `products` (`id`, `name`, `slug`, `price`, `stock`, `discount`, `weight`, `detail`, `picture`, `picture_detail_one`, `picture_detail_two`, `picture_detail_three`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(155, 'Pariatur voluptatum illo ut aut.', 'quia-voluptates-iste-rerum-dolores-asperiores-odit-a', '7997.00', 3, 35, '2', 'Tenetur autem nemo tempore. Dolor aliquid quia omnis possimus. Vel consequuntur totam et rerum. Aspernatur nihil tempora vel vero hic. Id ut omnis aperiam ipsum eligendi sunt consequuntur. Possimus accusantium excepturi molestiae non quia cum. Placeat quis ad sit quaerat recusandae. Quis vel incidunt quas ratione dolorem dolore. Deleniti nesciunt nobis aliquam omnis.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '1996-07-22 11:51:38', '1972-01-19 17:29:05'),
(156, 'Ad qui officiis.', 'aliquid-odio-maxime-quas-pariatur-error', '3737.00', 0, 8, '2', 'Molestiae hic est debitis qui ut optio ipsa. Natus et quia laudantium illum et tenetur. Eos eaque et quod amet maiores porro. Nihil hic tenetur unde sit dolores ea. Neque nam eveniet officia. Voluptatem et vero distinctio optio dolores ea. Officiis in ipsam tempora est voluptatem. Sint quas ipsam expedita distinctio cum magnam est. Sit quisquam deleniti accusamus vel. Cumque eligendi voluptatem et vero. Aut voluptatibus minima distinctio voluptate molestiae ad assumenda.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '2005-09-06 12:52:55', '2006-08-29 11:58:46'),
(157, 'Nostrum fuga qui ipsam voluptate.', 'nihil-sunt-eveniet-atque-adipisci', '5664.00', 10, 1, '2', 'Autem quod eius molestiae. Alias a itaque voluptatum ut dolores aliquid ipsa. Nesciunt beatae temporibus corrupti deleniti incidunt. Esse minus porro atque alias ipsa et. Corporis sit sit voluptatibus delectus sint velit ratione. Tempore odit architecto officia qui nihil id. Suscipit eos mollitia nobis libero quidem.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1979-09-12 10:49:09', '2009-09-03 20:18:01'),
(158, 'Aliquid fugiat ratione nesciunt voluptatibus explicabo.', 'eos-vitae-blanditiis-blanditiis-saepe', '2595.00', 9, 42, '1', 'A quis nam consequuntur cumque nemo amet. Iure necessitatibus corrupti repellendus quae fugit. Esse quia dolores voluptate dolorem aut sunt. Laboriosam sit ipsum et dolor. Consequuntur qui perspiciatis et recusandae. Totam rerum qui rem et. Alias quibusdam nisi vel ad sint omnis est. Sapiente est delectus eos laboriosam expedita soluta. Dolor et ut placeat voluptatem. Veritatis ut asperiores molestiae error aut deleniti eos.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '1975-02-20 07:19:37', '1990-01-21 14:25:59'),
(159, 'Harum et cupiditate repellendus.', 'placeat-tenetur-cupiditate-sunt-quibusdam-molestias-tempore', '6556.00', 0, 13, '1', 'Esse minus magnam repudiandae quis quae. Animi rerum dolorem quos. Quis dolores vero recusandae qui veniam ab repellendus dolores. Blanditiis qui soluta porro minima necessitatibus sit. Fuga voluptatem eum accusantium quas rerum eligendi officia. A libero tempore corporis veritatis quae. Sunt reprehenderit omnis et quod tempore. Rem itaque dicta sed commodi cupiditate. Provident at aliquam tenetur cum ut consequuntur. Aut ut atque deleniti amet praesentium repudiandae rerum inventore.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1995-12-02 05:07:14', '1989-05-19 11:38:46'),
(160, 'Quasi ab odit omnis.', 'sed-sed-rerum-nesciunt-ea-nulla-quos', '5673.00', 10, 33, '1', 'Veritatis occaecati officiis voluptate veniam voluptatem. Omnis itaque quos nulla dignissimos iusto eaque. Aliquid culpa soluta quam ad quae voluptatem quisquam. Saepe rerum quaerat pariatur itaque. Esse quis dolorem perspiciatis quia. Et aspernatur delectus quis distinctio. Qui eum cum repudiandae voluptatem. Dicta repudiandae similique deserunt aut dolor incidunt in. Consequatur aliquid qui voluptate est tempora vel.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1985-10-24 06:38:24', '2006-06-23 05:32:33'),
(161, 'Incidunt recusandae est consequuntur sed.', 'quo-animi-facere-fugit-dolorem-fugiat-quas-animi', '6727.00', 7, 32, '2', 'Aut officiis nihil quo ipsam sed aliquid excepturi tempora. Eaque natus aut impedit maxime. Qui rem et ut totam voluptatem. Distinctio sapiente quos repudiandae non. Enim reprehenderit sunt nemo vel harum amet. Modi exercitationem quia excepturi officia cum voluptas. Excepturi quia iure id deserunt temporibus quia laboriosam. Est corrupti numquam quia non ut commodi.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1981-04-03 09:01:26', '2002-12-17 10:31:54'),
(162, 'Sapiente et error et delectus.', 'voluptas-sed-quisquam-nobis-fugit', '6714.00', 5, 48, '2', 'Et consequuntur omnis repellendus id. Ipsum temporibus officia placeat quae ut modi. Omnis nostrum sit minus neque aut tempore vel recusandae. Non cum aut sit eos. Harum animi sed omnis sequi. Quis mollitia quia dicta et aut repellendus repudiandae assumenda. Ea facilis eum rerum ut modi ad saepe. Non ea quam voluptatibus est sint consectetur. Ex cum omnis aperiam aliquam. Error repudiandae est possimus unde perspiciatis. Facere quia et autem est amet.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1995-07-25 16:54:15', '1984-12-09 06:36:13'),
(163, 'Quis corporis adipisci et dolore deserunt.', 'exercitationem-dolor-ut-recusandae-qui-veniam-enim-placeat', '5515.00', 1, 22, '2', 'Recusandae consectetur deserunt ipsam similique placeat ea numquam. Sit impedit architecto ratione vel. Sunt molestiae fuga ullam eum quisquam architecto natus. Accusamus expedita voluptatem velit commodi et. Exercitationem alias tenetur sed cum iste voluptas. Sapiente odit soluta quia quisquam sit voluptates. Odit voluptas tempore sed repellendus. Cumque voluptatum dolor ducimus nihil. Consequatur libero fugiat blanditiis. Nulla quo unde repudiandae nemo itaque incidunt optio consequatur.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '2000-03-20 06:20:08', '2009-03-25 07:26:03'),
(164, 'Doloribus a mollitia ipsum quidem suscipit.', 'nesciunt-et-consequatur-officia-enim', '2854.00', 3, 11, '2', 'Autem amet suscipit fuga sapiente consequuntur adipisci. Alias voluptates debitis animi in voluptas animi. Inventore ut non deleniti delectus omnis accusantium. Eius voluptas magni perspiciatis. Impedit ea libero consequatur possimus dolor. Reprehenderit quo sit nostrum. Voluptatem dolores temporibus doloribus aut beatae autem ut. At aut commodi sit hic. Labore sapiente non quidem aperiam mollitia.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1985-10-26 12:47:24', '1978-02-10 16:28:52'),
(165, 'Aspernatur magni laborum aut nemo ea.', 'reprehenderit-occaecati-incidunt-debitis-et-aliquid-alias', '6492.00', 8, 20, '2', 'Recusandae similique aut hic accusamus fugit eligendi. Expedita aliquam deleniti non qui vero rerum repellendus at. Non omnis ad rerum aut tempore ipsa. Commodi et inventore ex ea et. Tenetur in totam earum. Cumque dolor minus velit. Provident expedita dignissimos id blanditiis id recusandae. Architecto non ut eum ut libero beatae. Ut adipisci ut cupiditate sint aliquid expedita.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '2001-11-12 07:08:08', '2011-09-30 21:38:39'),
(166, 'Esse cum rerum est reprehenderit aliquam.', 'aliquam-recusandae-reiciendis-omnis-delectus', '5882.00', 5, 42, '2', 'Aut ratione asperiores et ipsum rem. Omnis accusamus doloremque occaecati facilis occaecati. Dolores voluptas possimus nulla autem mollitia corporis. Aut molestiae mollitia quas nihil architecto et rem. Veniam voluptatem qui qui sed. Rem expedita illum alias rerum rem omnis sed corporis. Vero inventore aut voluptates deserunt. Natus blanditiis vero illo voluptatem provident. Non dolores ullam dolor repudiandae.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1992-11-10 09:07:00', '1980-08-03 05:24:42'),
(167, 'Aut accusamus fugit quae nisi.', 'ducimus-quas-ut-magnam-voluptatem', '7064.00', 9, 50, '2', 'Harum quos necessitatibus exercitationem autem aut nesciunt voluptatem vel. Soluta aspernatur animi et enim hic. Nemo veritatis necessitatibus omnis rerum est voluptatum. Est labore qui cupiditate eius nesciunt sed. Voluptatem beatae ratione est nesciunt aperiam et ad. Non unde id ut. Magnam dolor veniam possimus laboriosam molestias eaque dicta. Aut voluptatum aspernatur sed sit qui. Praesentium et voluptates est accusamus. Non a eius quod sint non.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '1971-04-18 17:55:44', '1974-03-21 16:50:49'),
(168, 'Doloremque consequatur aliquam et voluptatum.', 'culpa-at-doloribus-ratione-ullam-expedita', '3472.00', 10, 48, '2', 'Nulla dignissimos sed dolorem a et magnam sapiente quis. Velit aut sit suscipit reprehenderit quasi aut. Alias quasi explicabo voluptatem occaecati. Tempora in ut eius rerum corrupti vitae cumque. Eos ut fuga dolore quisquam exercitationem saepe. Excepturi corrupti aliquid qui doloremque enim repellendus fuga. Eius ut eum quae architecto cupiditate. Praesentium ipsum voluptas sed aut.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '2014-03-18 19:27:38', '1993-10-17 07:11:41'),
(169, 'Quam maiores sint quisquam.', 'id-quia-occaecati-occaecati-ut-laborum-ducimus-quaerat', '5056.00', 9, 34, '1', 'Et iusto est facere repellat laboriosam animi dolor. Molestiae officia et velit suscipit hic est velit. Tempore ratione dolor veritatis beatae blanditiis reprehenderit vel quaerat. Est aliquam rerum doloremque et harum dolorum. Recusandae quasi expedita minus et. Voluptates sequi praesentium consequatur repudiandae distinctio ea quidem. Dolorum eos aperiam beatae accusantium a. Et voluptatem quam libero laboriosam id aut reiciendis. Ipsam aut ut nihil voluptatum laudantium et.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1975-02-12 09:27:55', '2001-10-30 09:51:34'),
(170, 'Quia voluptates quaerat nam incidunt dolorum.', 'aliquid-explicabo-et-at-est', '8741.00', 1, 25, '1', 'Ratione neque et doloremque quos autem et. Ut molestiae dolorum minus dicta nihil quia. Ratione facilis quis minus et ipsam. Sit veritatis in aliquam quisquam voluptas et praesentium. Autem accusamus veritatis aut. Et voluptate autem fugit aperiam tempora delectus. Harum velit fuga nihil aut omnis dignissimos. Cupiditate qui impedit sit non est eum perspiciatis tenetur.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1992-02-12 10:26:28', '1973-06-07 15:59:01'),
(171, 'Quos facere ipsa deserunt.', 'fugiat-quos-natus-est-enim', '3953.00', 1, 48, '2', 'Et dolore sed voluptas veritatis soluta. Magnam voluptatem nam voluptatibus adipisci. Eligendi nisi harum beatae enim quas nostrum. Nulla reiciendis earum voluptatem qui. Culpa inventore est et molestias eum quam unde aut. Earum et sit labore qui aliquid accusantium. Odio corporis qui inventore sit quo quasi. Ipsam perspiciatis itaque vel sunt cum quis illum. Consequatur aspernatur in et corrupti. Sed hic aut est.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1992-02-21 18:46:44', '2001-10-02 05:28:01'),
(172, 'Impedit ut consequuntur alias quos.', 'et-dignissimos-aut-nesciunt-ipsa-quia-quis', '7078.00', 2, 38, '1', 'Delectus qui facere sequi ullam asperiores dicta explicabo. Aut voluptates voluptatem quae. Et quam occaecati sequi voluptates. Qui aut quia voluptates eos autem a. Ratione ratione voluptatem voluptas veritatis consequuntur dignissimos dolorem. In aspernatur ab eaque eum consectetur sunt unde. Pariatur distinctio quod itaque aliquid suscipit quas aliquam. Aperiam sed iusto est et est.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 1, '1978-08-25 19:27:19', '1985-01-17 03:12:33'),
(173, 'Quia vel porro omnis.', 'quae-explicabo-qui-voluptatibus-ratione', '1923.00', 8, 29, '2', 'Tempore est ab debitis. Nemo animi ab sit qui. Distinctio aut a incidunt perspiciatis repudiandae voluptatem et consectetur. Exercitationem repellendus architecto fuga et accusamus voluptates est repellat. Culpa eius quaerat neque dolores. Quia ut exercitationem est. Voluptatibus et nam nam molestiae molestias possimus.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '2004-11-27 00:12:59', '1982-04-30 23:37:02'),
(174, 'Ea consequatur culpa ratione nihil.', 'error-quia-autem-dolorem-numquam-velit-fugiat', '9160.00', 9, 41, '1', 'Autem iure illum atque. Qui accusantium asperiores quia autem nobis praesentium. Et ad ut iste quidem corporis harum accusamus. Velit quibusdam vero itaque sed sint dolore. Aspernatur illo esse dolore eum. Vitae autem perferendis corrupti dolor voluptatem recusandae temporibus. Enim et accusamus reprehenderit animi. Architecto ab sint doloremque molestiae omnis. Sit ducimus numquam aspernatur.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '2013-04-24 16:27:37', '1989-03-08 06:29:02'),
(175, 'Sit laborum itaque perferendis maiores laudantium.', 'ut-dolorem-totam-provident-eum-possimus', '8690.00', 6, 29, '1', 'Dolores minima voluptas blanditiis necessitatibus exercitationem atque. Doloribus tenetur in temporibus vel est. Voluptatem culpa sit nesciunt officia saepe quia. Quibusdam repellat hic quam distinctio saepe nihil at iste. Debitis qui autem ullam aut ab distinctio cumque. Dolor eos vel voluptas voluptas sunt amet. Voluptas nihil et eum expedita molestias et. Et repudiandae iusto beatae nesciunt quisquam.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1987-02-17 20:58:51', '2015-05-15 08:20:36'),
(176, 'Est delectus sed.', 'error-autem-itaque-sunt-debitis-cumque', '8311.00', 9, 29, '2', 'Voluptas cumque exercitationem ut corrupti. Perferendis voluptas placeat sint sint possimus sint. Ex culpa dolores maiores dolorum id sint totam. Aut quos eligendi adipisci. Sit qui dolorem veritatis quam repellendus pariatur. Voluptatem sequi asperiores sit sed est minus vitae fugiat. Non nam iure ut qui. Voluptas libero quae voluptatem ex fugit ea.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '1988-12-08 14:30:38', '2006-01-23 11:09:43'),
(177, 'Quis perferendis ratione sapiente consectetur.', 'vel-aliquam-rerum-est', '3677.00', 10, 36, '1', 'In pariatur repellendus eius natus. Velit atque similique consectetur eum suscipit ducimus ipsum placeat. Minus ipsam non voluptas. In est officiis est dolor et voluptate. Odit doloremque deserunt et unde earum voluptas incidunt. Rerum cum aut aspernatur ad ullam praesentium quae. Harum illo est cupiditate ut consequatur. Rerum rem non vero aliquid tempore omnis quos. Quas maiores eos rerum sed aspernatur ab sed. Alias animi quibusdam cumque et accusamus quas quasi.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1983-05-23 01:31:39', '1981-03-04 16:45:11'),
(178, 'Doloremque cupiditate quas rerum aut.', 'cupiditate-minus-sit-laborum', '5954.00', 8, 45, '2', 'Aut voluptatem quis doloribus laudantium sapiente deserunt distinctio. Voluptas nobis et quas. Et ducimus est animi voluptatem corporis dicta non. Provident culpa quia eligendi ab neque suscipit dolorum eaque. Distinctio exercitationem aliquid et et consequatur fuga veniam quaerat. Similique nihil est non est qui. Quas aut eligendi et omnis facere et itaque. Qui vero quia et dolorem. Quae est debitis debitis recusandae placeat. Fugit quas sunt omnis eos voluptatem facere vero.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1975-04-24 03:20:47', '1977-11-13 15:01:23'),
(179, 'Consequatur ut id qui laudantium.', 'laboriosam-at-voluptatum-odio-voluptate-expedita-ut-iusto-ut', '6757.00', 9, 44, '1', 'In non veniam molestiae ipsam provident praesentium. Porro et ut voluptatem non veniam qui. Ut ut repellat velit vel et odit eos iste. Voluptate veritatis neque nobis voluptatem blanditiis velit veniam. Vel eligendi molestias in vitae repudiandae. Et incidunt quia repudiandae aut totam dolores voluptas. Sapiente laborum dignissimos dolores eos fugit nihil autem aut. Soluta accusantium quo praesentium doloremque. Impedit et laborum minus consequatur facere esse sed.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '1983-01-30 17:52:14', '1984-04-26 09:16:01'),
(180, 'Quo ullam neque quisquam sint assumenda.', 'fugiat-nesciunt-deserunt-mollitia-perspiciatis-sequi-tempore-rem', '9337.00', 8, 39, '1', 'Tempore atque dolores qui nesciunt dolor voluptas amet. Temporibus esse ipsum quibusdam. Quaerat id ex eum eveniet. Ea optio molestiae ea ea voluptas. Impedit omnis et magni atque voluptates doloribus blanditiis asperiores. Consequatur adipisci voluptas est ad. Et ea aliquam voluptatibus et. Voluptas illo rerum nulla labore. Eum et ipsa minima dolor veritatis et et.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 1, '1985-11-30 08:30:11', '1974-10-23 04:21:18'),
(181, 'Dolorum corporis veniam possimus.', 'placeat-fugiat-incidunt-ut-dolore-veniam-voluptates', '7690.00', 6, 18, '2', 'A et omnis et. In et laborum architecto iure ducimus ipsa. Et ipsa reiciendis quo quia et commodi. Sit ut similique praesentium ipsum. Ex sint sunt ut odio autem maxime rerum. Esse quis non aut distinctio illum. Expedita quia consequatur doloribus nemo error. Autem enim nihil consectetur sint et. Eum enim cupiditate autem quod. Nostrum veniam adipisci et sint.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '1997-10-29 19:23:32', '2006-12-27 08:28:30'),
(182, 'Repellendus enim esse.', 'esse-sint-repellendus-ut-rerum-eos-atque-autem', '8023.00', 9, 20, '1', 'Voluptatibus numquam ex quas necessitatibus vitae libero adipisci qui. Quis amet aspernatur sapiente laborum ullam. Aut sunt nesciunt voluptatem blanditiis. Dicta veritatis eius dolores modi quidem eos sit. Quidem minima quae ut ipsa ducimus non in et. Ipsum ut corporis nesciunt animi voluptate. In voluptas dolorum distinctio. Alias alias adipisci non nobis vel et. Repellendus architecto autem distinctio ducimus. Ut tempora culpa nam. Debitis ea qui incidunt voluptatem qui est quis.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '2009-09-19 17:36:30', '2007-11-05 03:00:27'),
(183, 'Deleniti delectus esse placeat fuga.', 'recusandae-non-quas-nesciunt-laboriosam-voluptas', '6382.00', 2, 35, '1', 'Blanditiis repudiandae nobis repudiandae quis sit. Cumque fugit sit quae. Ut ipsa provident omnis aperiam voluptas necessitatibus laborum. Quam voluptatem laudantium optio deserunt soluta praesentium recusandae. Commodi qui voluptatem quia praesentium fuga adipisci facilis. Cum in amet repellendus similique enim neque. Omnis quo aut commodi nostrum. Perspiciatis eveniet placeat autem tenetur est inventore. Ea cupiditate ut ut consectetur ab.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '2004-06-12 10:27:33', '1979-04-25 07:58:36'),
(184, 'Eveniet quidem minus et rerum officia.', 'molestiae-qui-consequuntur-pariatur-repudiandae-voluptatibus-totam-beatae', '5520.00', 5, 35, '1', 'Enim quis nihil perspiciatis voluptatum. Voluptas reprehenderit suscipit aut aliquid quo molestiae quas. Aut dolore eos accusantium laboriosam. Accusamus rem omnis cum laborum commodi nihil. Voluptatem blanditiis dolorem expedita reiciendis aliquid. Ut nesciunt sint velit nihil. Eum suscipit eius saepe modi et. Iste quis a illum et nam. Quibusdam voluptatem officiis animi minima in. Veniam officiis consequatur vitae quos eum vero. A sunt velit dolorem non ut.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '2000-02-07 12:51:28', '1984-12-10 00:00:29'),
(185, 'Itaque nobis quia.', 'et-repudiandae-cum-aliquam-pariatur-error', '9431.00', 6, 6, '1', 'Reprehenderit quos officia quia iusto sit aut quas provident. Enim et distinctio aut facere alias et. Aperiam ut unde atque debitis consectetur. Odio fugit temporibus tempora similique ut quia. Ratione eum culpa consequuntur sit aspernatur quia laboriosam. Eaque cumque totam cupiditate accusamus eum. Sint iste natus maxime natus. Voluptas porro libero quisquam ut et aut. Aliquam tempora temporibus cum ullam.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 1, '2012-01-07 00:22:02', '2017-04-04 03:49:05'),
(186, 'Eos ipsum fugit enim ipsum.', 'harum-similique-neque-velit-autem', '9560.00', 7, 27, '2', 'Sint saepe sunt nam ex et. Sint laborum non aut nemo iusto quibusdam. Quam fugit nesciunt beatae aut explicabo aut. Minima sed nemo vero dolorem. Sit repudiandae alias aperiam voluptatem recusandae nihil. At vel ut sed ut dolorem facere deserunt. Et tenetur quibusdam rerum alias consequuntur. Hic accusamus autem asperiores laboriosam. Assumenda aut minima non at ipsam quo. Enim qui ut dolores nihil modi eum laboriosam quis. Veritatis dolores ut sapiente et aspernatur.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '2018-08-18 07:54:23', '2020-08-01 11:57:34'),
(187, 'At impedit dicta.', 'fugit-eos-maiores-maxime-amet-est-vitae', '7151.00', 10, 42, '2', 'Non temporibus enim ut est unde sequi. Est distinctio maxime iure qui fugit reiciendis in expedita. Quos iusto dolor aut in enim aut. Iusto qui non quam quis nam ipsa adipisci nulla. Vero architecto placeat praesentium eaque. A molestiae impedit ab quo accusamus. Maxime sapiente sed minima nihil veritatis inventore maxime ut. Ex repellat at modi at. Deserunt labore eos sunt laudantium et.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 1, '2016-12-01 11:26:50', '2006-01-20 17:36:04'),
(188, 'Incidunt repudiandae unde aut iure.', 'praesentium-quia-in-rerum', '7325.00', 10, 13, '2', 'Et quas aliquam vel aut. Aut expedita soluta qui. Repellat dignissimos sunt consequatur sit molestiae asperiores. Rem aspernatur labore eos soluta in et. Ut illum ut aut. Accusamus dolor porro laborum voluptate nihil beatae. Aut perspiciatis magnam autem est temporibus facere et. Facilis tenetur eos exercitationem magni magnam possimus. Ut eligendi optio vel voluptatibus et. Non ut facere autem. Minima praesentium vel distinctio exercitationem sint.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1997-04-13 10:20:36', '2011-07-01 05:56:09'),
(189, 'Apple watch', 'apple-watch-series-5-pink', '8540.00', 0, NULL, '2', '<p style=\"font-size: 14.4px;\"><span style=\"font-weight: bolder;\">คุณสมบัติ</span></p><ul style=\"margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding-left: 1.5em; color: rgb(51, 51, 51); font-family: Sarabun, sans-serif; font-size: 15px;\"><li>หน้าจอใหญ่กว่าเดิม 30% โดยเพิ่มขนาดจากตัวเรือน 38 มิลลิเมตร มาเป็น 40 มิลลเมตร และ 42 มิลลเมตรเป็น 44 มิลลิเมตร</li><li>ดีไซน์ขอบโค้งมนว่าเดิม รวมถึงจอที่แสดงผลจะพบว่ามีความโค้งขึ้นอย่างเห็นได้ชัด</li><li>ขนาดบางกว่าเดิม โดยตัว 40 มิลลิเมตรมีความบาง&nbsp;10.7 มิลลเมตร และ 42 มิลลิเมตรมีความบาง 11.4 มิลลเมตร</li><li>มีการใช้เซนเซอร์วัดหัวใจแบบใหม่ ที่เปลี่ยนจากมีหลอด LED 2 ดวงเป็น 1 ดวง</li><li>ตัวเรือน Apple Watch สี Gold</li><li>สายชาร์จแบบแม่เหล็กความยาว 1 เมตร หัวเป็นแบบ USB</li><li>Adapter สำหรับทำการชาร์จ</li><li>คู่มือการใช้งานและเอกสารต่าง ๆ</li><li>Digital Crown ออกแบบใหม่ (พร้อมเพิ่ม Feedback การสั่นเวลาเราหมุน Digital Crown)</li></ul>', '5f20071482f57.jpeg', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '2020-07-07 23:07:33', '2020-08-01 03:39:15'),
(190, 'Eum quia enim atque veritatis.', 'sint-in-odio-eligendi-sunt-aut-fuga', '4546.00', 7, 18, '2', 'Omnis at sed dolor aut nemo qui. Enim sint occaecati est dolorem nostrum maiores et. Impedit et expedita non laborum tempora. Voluptatum illum et sit architecto. Quibusdam corporis quis rerum quo facere qui nihil incidunt. Voluptatem nesciunt quos est quo ea. Libero sint qui nobis culpa ut natus. Aut molestias quasi consequatur fugit. Deserunt hic aut vel fugiat repudiandae. Blanditiis quia fugit aut omnis. Sit placeat magnam ut quas animi quis culpa.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 3, '2007-03-29 01:50:32', '2016-04-12 09:05:29'),
(191, 'Autem quia est enim delectus.', 'ipsam-saepe-dolorem-et', '3611.00', 9, 33, '1', 'Dolores voluptatem ab non reiciendis tempore. Autem impedit quibusdam tenetur qui reprehenderit. Modi quaerat cumque eius aut. Consequuntur aperiam autem sint rem et qui recusandae. Sapiente quas incidunt inventore reprehenderit qui id veritatis. Recusandae et dolor ut et.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '1997-11-26 16:31:27', '1974-04-21 02:20:03'),
(192, 'Corporis molestiae rerum sit id.', 'numquam-alias-occaecati-et-tempore-inventore-quos-debitis-atque', '7017.00', 5, 45, '2', 'Nulla doloremque error veritatis possimus qui perspiciatis. Ut iusto quis id et dicta similique animi. Placeat sed saepe beatae atque ea. Ducimus numquam vero tempora culpa. Delectus quo aut et consequatur et tempore voluptatem. Et sint consectetur maxime qui. Ex quia dolores fugiat optio magnam. Deleniti id quia repellendus iure. Laborum et dolores voluptatem laudantium distinctio qui. Sint cumque ut sed sed iure ut autem. Reiciendis aut sequi animi expedita corrupti suscipit at.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '2013-06-26 08:22:26', '2002-05-05 19:59:02'),
(193, 'Laboriosam dolores omnis omnis voluptates.', 'ratione-quia-quis-quas-enim-quam-tempore-non', '3945.00', 3, 36, '2', 'Neque explicabo aspernatur adipisci nisi delectus dicta. Illum velit sapiente possimus a dolor. Impedit ut corporis commodi architecto. Laudantium sint unde ut odio. Nobis voluptatem enim molestias modi quisquam est alias. Et odio voluptates quidem mollitia et veritatis earum. Nihil sint ex ratione labore. Libero quasi ut est. Debitis nobis iste nisi ut. Accusamus odio ut quaerat placeat.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '2013-12-10 10:42:04', '1989-10-21 19:22:19'),
(194, 'Sequi omnis omnis est.', 'dolorem-labore-nihil-fuga-sed-temporibus-voluptas', '3299.00', 3, 42, '2', 'Assumenda quasi rem magni dignissimos ex. Et tempore consequatur nihil et aut. Velit minus veniam animi sint ipsa quia ipsa ut. Nihil quasi sit atque eligendi. Est reprehenderit dolor veritatis voluptatem et eligendi nesciunt. Sequi rerum explicabo corrupti. Sed facere ea quia harum voluptas aut. Laborum non ut rem accusantium aperiam alias exercitationem. Suscipit quia eum veniam laborum et qui non. Facere et magni ullam reprehenderit a. Facilis vitae sed ipsam excepturi.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 1, '2016-08-08 17:16:29', '1977-02-27 10:40:38'),
(195, 'Ut est voluptatem fugit.', 'repellat-optio-eligendi-laboriosam', '2235.00', 4, 25, '1', 'Voluptatibus similique amet delectus ducimus. Velit occaecati dolor aut. Voluptatum harum quisquam sed tenetur neque itaque. Voluptatem natus voluptas hic autem. Architecto fuga fugiat veniam aspernatur dolorum. Ducimus odio voluptatem quia in aut nemo. Ipsam labore vitae aliquid temporibus doloremque mollitia dolores molestias. Quo qui molestiae qui eos est exercitationem est non. Aliquid qui sit et fuga sequi qui aut. Itaque quidem voluptatum voluptatum vel omnis eaque.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 5, '1979-07-16 22:07:33', '1998-03-22 02:43:14'),
(196, 'Hic esse numquam.', 'cumque-officia-et-nulla-et-assumenda', '4297.00', 8, 36, '1', 'Qui et perferendis et eveniet eaque est ut expedita. Iure est omnis nesciunt ut. Suscipit similique enim natus deleniti illo consequuntur a. Placeat minima excepturi omnis consequatur adipisci hic. Non eius dolores quos minus. Dolorem consequatur odio nobis vel aut perspiciatis. Consequatur perferendis et modi sed fugiat maiores. Nihil dignissimos eveniet voluptas non rem quidem. Modi doloribus inventore voluptatibus rem et quia.', 'nopic.png', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '1995-03-27 09:18:28', '1995-07-11 00:58:05'),
(197, 'casio 1120', 'reiciendis-quia-sit-architecto-qui-officiis', '7694.00', 1, 19, '2', 'Sed ullam molestiae sit enim totam commodi. Occaecati fugiat facilis quo voluptate voluptatem veritatis. Laudantium ut officiis labore aut. Voluptatem voluptas sit aut amet. Aut consequuntur exercitationem inventore natus. Veritatis perspiciatis rerum voluptatem facere ea. Odio aut consequuntur totam sint et incidunt aperiam. Voluptates et sit veritatis sed non totam dolorem. Ut nostrum quam velit.', '5f1db8dc4d410.jpeg', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 1, '2020-07-28 17:11:55', '2020-08-01 12:12:32'),
(198, 'Doloremque animi iure sed aut.', 'dignissimos-recusandae-aspernatur-eligendi-in-tempore-adipisci-aliquid', '300000.00', 6, 5, '2', 'Maiores molestiae occaecati ratione. Ipsum velit qui non. Commodi quidem velit aut ducimus unde a sequi. Ducimus eos error et aut aspernatur ea est. Voluptas accusantium corrupti sit vitae saepe dolore est numquam. Sed voluptatem veniam est facere libero libero molestiae similique. Qui vel praesentium fugit sunt est. Omnis expedita dolor rerum. Sapiente facere id et consectetur asperiores quaerat quo. Esse at et consectetur quos rerum. Cum incidunt eos ut odio alias rerum.', '5f1d813bb2da6.jpeg', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 2, '2020-07-28 17:11:15', '2020-08-01 11:57:34'),
(199, 'Seiko Automatic Black', 'seiko-automatic-black-dial-black-rubber-mens', '5975.00', 0, 41, '2', 'In at ipsum quae. Reprehenderit ratione asperiores omnis quo. Necessitatibus sint pariatur velit sit sed. Tempora eius voluptate nam qui omnis ducimus iusto ea. Dolorem at eum autem accusamus blanditiis. Aut deleniti optio sed in. Unde natus amet odio ut. Ea autem saepe eum et natus. Voluptas est tempore dignissimos nesciunt minus iste. Nostrum itaque magnam itaque cumque quia deserunt ut.', '5f1d7d6cf153e.jpeg', 'nopic.png', 'nopic.png', 'nopic.png', 'normal', 4, '2020-07-26 17:23:49', '2020-08-01 11:29:39'),
(200, 'Apple watch 4', 'apple-watch-series-5', '2985.00', 0, 20, '2', '<p><b>คุณสมบัติ</b></p><ul style=\"margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding-left: 1.5em; color: rgb(51, 51, 51); font-family: Sarabun, sans-serif; font-size: 15px;\"><li>หน้าจอใหญ่กว่าเดิม 30% โดยเพิ่มขนาดจากตัวเรือน 38 มิลลิเมตร มาเป็น 40 มิลลเมตร และ 42 มิลลเมตรเป็น 44 มิลลิเมตร</li><li>ดีไซน์ขอบโค้งมนว่าเดิม รวมถึงจอที่แสดงผลจะพบว่ามีความโค้งขึ้นอย่างเห็นได้ชัด</li><li>ขนาดบางกว่าเดิม โดยตัว 40 มิลลิเมตรมีความบาง&nbsp;10.7 มิลลเมตร และ 42 มิลลิเมตรมีความบาง 11.4 มิลลเมตร</li><li>มีการใช้เซนเซอร์วัดหัวใจแบบใหม่ ที่เปลี่ยนจากมีหลอด LED 2 ดวงเป็น 1 ดวง</li><li>ตัวเรือน Apple Watch สี Gold</li><li>สายชาร์จแบบแม่เหล็กความยาว 1 เมตร หัวเป็นแบบ USB</li><li>Adapter สำหรับทำการชาร์จ</li><li>คู่มือการใช้งานและเอกสารต่าง ๆ</li><li>Digital Crown ออกแบบใหม่ (พร้อมเพิ่ม Feedback การสั่นเวลาเราหมุน Digital Crown)<br><br><br></li></ul>', '5f1d7cf398d26.jpeg', '5f1d7cf3a64fb.jpeg', '5f1d7cf3b750b.jpeg', '5f1d7cf3d123c.jpeg', 'normal', 3, '2020-07-26 13:25:45', '2020-08-01 03:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `phonenumber` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idcardnumber` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateofbirth` date NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `phonenumber`, `idcardnumber`, `dateofbirth`, `gender`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '2020-06-10', 2, 5, '2020-06-30 12:09:05', '2020-07-03 12:16:52'),
(5, NULL, NULL, '1992-11-02', 1, 4, '2020-07-01 05:33:59', '2020-08-01 18:21:33'),
(6, NULL, NULL, '2020-07-13', 2, 3, '2020-07-01 09:20:01', '2020-07-01 09:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` double NOT NULL,
  `invoice_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `product_id`, `user_id`, `rating`, `invoice_id`, `created_at`, `updated_at`) VALUES
(1, 200, 4, 5, 'SPV202000003', '2020-07-28 15:51:51', '2020-07-29 02:33:00'),
(2, 200, 4, 4, 'SPV202000001', '2020-07-28 15:51:55', '2020-07-29 19:01:21'),
(3, 200, 5, 5, 'SPV202000004', '2020-07-28 15:52:39', '2020-07-30 19:01:23'),
(4, 189, 4, 4.5, 'SPV202000003', '2020-07-28 15:53:08', '2020-08-01 18:44:18'),
(5, 197, 5, 4.5, 'SPV202000005', '2020-07-28 17:14:03', '2020-07-28 17:14:03'),
(6, 198, 5, 4.5, 'SPV202000006', '2020-07-28 17:15:14', '2020-07-31 11:21:15'),
(7, 197, 4, 5, 'SPV202000013', '2020-08-01 11:46:43', '2020-08-01 11:46:45'),
(8, 199, 4, 5, 'SPV202000015', '2020-08-01 14:25:00', '2020-08-01 14:25:00'),
(9, 199, 4, 3.5, 'SPV202000013', '2020-08-01 14:25:05', '2020-08-01 14:25:05'),
(10, 189, 4, 5, 'SPV202000012', '2020-08-01 18:44:27', '2020-08-01 18:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2020-05-23 09:55:12', '2020-05-23 09:55:12'),
(2, 'member', 'web', '2020-05-23 09:55:12', '2020-05-23 09:55:12'),
(3, 'employee', 'web', '2020-07-21 09:17:02', '2020-07-21 09:17:02');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_accounts`
--

INSERT INTO `social_accounts` (`id`, `user_id`, `provider`, `provider_user_id`, `created_at`, `updated_at`) VALUES
(1, 4, 'facebook', '2923005367781024', '2020-05-12 13:21:18', '2020-05-12 13:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userrole` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `userrole`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$MmDJY3LTCMTw1nUQbpwseOIQWqVw1rmTaZ.uejuEItYjc9RWOG90i', 'otkTfU1e68ZkkZX2f0waZxWejyvhVb14ugp4wGNsk83xZ4tR7FJBuA0JpQ20', '1', '2020-05-09 05:51:25', '2020-07-22 19:23:13'),
(2, 'สมชาย ใจดี', 'somchai@gmail.com', NULL, '$2y$10$IpBGTkdn9nMX4.4chuL7sOjsTmfRblzTMxsD/vCLYTBg0tZuy9Ihe', 'Q516Z6C3ZfqoCBytfxeXd2LKDmJ82rBl2aKlihscmCvLpTtkClNoiSPjI1Km', '2', '2020-05-09 06:50:49', '2020-07-23 04:20:09'),
(3, 'ภัทราภรณ์ เปรี้ยวหวาน', 'benz_bet42@Hotmail.com', NULL, '$2y$10$YGz7SOyO1KyoZz0wmsIkdO2xmIncXFCuRrUVbRUNmsydL90F1b7hS', 'ajMuIJiAV5yx1Nb51C1FE7ehCxvPUbJVT684boX7XjyQTm7HI4B8NX3UuWqn', '3', '2020-05-09 12:03:34', '2020-07-21 16:04:47'),
(4, 'Ńai Hünters', 'bet_apidet@hotmail.com', NULL, '839ab46820b524afda05122893c2fe8e', 'A6W2fKHv3agdIkbzokSYqs2LT0rmhM0REpqZMrN0jjW4LCoUiZ0ODJjA6E2w', '2', '2020-05-12 13:21:17', '2020-07-21 15:33:21'),
(5, 'customers', 'customer@gamil.com', NULL, '$2y$10$Dsr0XIXywKO7P8l1dSxNH.IFCFVodF2Nhc5lLe7psiZ36sh5lTtkG', 'OBuJzpZpvwx2asdaqUhBPavcEOJkI48HnmhlQO7PbRppCDxi9dDERdbn3GZJ', '2', '2020-05-16 11:55:47', '2020-07-30 18:42:56'),
(24, 'employee', 'employee@gmail.com', NULL, '$2y$10$1RHfmMWDbvHVStX5AF4nq.gpqGmYSItiP0iSD54V7MG7uqvKZbYXC', '37wiRax5RlzDVfwfqCOta4hQGHRUPP2t3HB6J7OyPmHIUioSjikwiHS5QTgi', '3', '2020-07-22 10:37:38', '2020-07-23 08:50:57'),
(25, 'justin', 'justin@gmail.com', NULL, '$2y$10$4s4XP7kUyeRvr6S41Wj4mOo.Gd.wa0/ncNUO51mYW4BK/RJcoMrla', 'LVJ3FGW6YJ1fB2J72mtA7401HhfVi4swxJd0lkipe0IaFQtx0jtLRilwXmdP', '2', '2020-07-23 04:09:38', '2020-07-23 04:09:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `addresses_email_unique` (`email`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `favorites_product_id_foreign` (`product_id`);

--
-- Indexes for table `generals`
--
ALTER TABLE `generals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `generals_email_unique` (`email`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_user_id_foreign` (`user_id`),
  ADD KEY `invoices_address_id_foreign` (`address_id`),
  ADD KEY `invoices_bank_id_foreign` (`bank_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_invoice_id_foreign` (`invoice_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `generals`
--
ALTER TABLE `generals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `social_accounts`
--
ALTER TABLE `social_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
