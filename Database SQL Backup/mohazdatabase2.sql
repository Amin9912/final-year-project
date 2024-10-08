-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 01:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mohazdatabase2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` text NOT NULL,
  `adminName` text NOT NULL,
  `adminPassword` text NOT NULL,
  `adminEmail` text NOT NULL,
  `adminPhoneNum` text NOT NULL,
  `address_Line1` text NOT NULL,
  `address_Line2` text NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `country` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `adminPassword`, `adminEmail`, `adminPhoneNum`, `address_Line1`, `address_Line2`, `postcode`, `city`, `state`, `country`) VALUES
('admin', 'Mohd Amin', 'admin123', 'mohazmarketing@gmail.com', '0123456789', 'test1', 'test2', '1234', 'Bestari jaya', 'Selangor', 'Malaysia');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custID` varchar(100) NOT NULL,
  `custName` text DEFAULT NULL,
  `custFullName` varchar(100) DEFAULT NULL,
  `custEmail` text DEFAULT NULL,
  `custPassword` text DEFAULT NULL,
  `custPhoneNum` text DEFAULT NULL,
  `address_Line1` text DEFAULT NULL,
  `address_Line2` varchar(100) DEFAULT NULL,
  `postcode` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `profilePic` varchar(100) DEFAULT NULL,
  `dateCreate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custID`, `custName`, `custFullName`, `custEmail`, `custPassword`, `custPhoneNum`, `address_Line1`, `address_Line2`, `postcode`, `city`, `state`, `country`, `profilePic`, `dateCreate`) VALUES
('cust_0000000001', 'amin', 'K.Amin', 'amin@gmail.com', 'amin123', '0171234567', 'Parit 2', 'Jalan Bangi', '32266', 'Teluk Intan', 'Kuala Lumpur', 'Malaysia', NULL, '2023-04-12 19:34:40'),
('cust_0000000125', 'Amin2', 'Khairul Amin', 'amin2@gmail.com', 'amin2', '0123456789', 'Jalan 1', 'Jalan 2', '36600', 'Bestari Jaya', 'Selangor', 'Malaysia', NULL, '2023-07-03 22:39:32'),
('cust_0000000126', 'zeeq', NULL, 'zeeqmuhd19@gmail.com', '0164669418', '0164669418', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-07 20:29:16'),
('cust_0000000127', 'Khairul', 'Khairul Amin', 'nshippuden21@gmail.com', 'khairul', '0173191936', 'Unisel', '', '42000', 'Bestari Jaya', 'Selangor', 'Malaysia', NULL, '2023-07-11 13:51:32'),
('cust_0000000128', 'anjit', 'anjir perawan merah', 'kucit@ayam.com', 'abc', '1233456789', 'dalam kubo', 'kubor baru', '41050', 'KLANG', 'SELANGOR', 'Malaysia', NULL, '2023-07-14 00:02:31');

--
-- Triggers `customer`
--
DELIMITER $$
CREATE TRIGGER `getCustID` BEFORE INSERT ON `customer` FOR EACH ROW BEGIN
INSERT INTO id_value_tbl VALUES (NULL);
SET NEW.custID = CONCAT("cust_", LPAD(LAST_INSERT_ID(), 10, "0"));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `id_value_tbl`
--

CREATE TABLE `id_value_tbl` (
  `ID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `id_value_tbl`
--

INSERT INTO `id_value_tbl` (`ID`) VALUES
(1),
(2),
(113),
(114),
(115),
(116),
(117),
(118),
(119),
(120),
(121),
(122),
(123),
(124),
(125),
(126),
(127),
(128);

-- --------------------------------------------------------

--
-- Table structure for table `id_value_tbl_order`
--

CREATE TABLE `id_value_tbl_order` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `id_value_tbl_order`
--

INSERT INTO `id_value_tbl_order` (`ID`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58),
(59),
(60),
(61),
(62),
(63),
(64),
(65),
(66),
(67),
(68),
(69),
(70),
(71),
(72),
(73),
(74),
(75),
(76),
(77),
(78),
(79),
(80),
(81),
(82);

-- --------------------------------------------------------

--
-- Table structure for table `id_value_tbl_product`
--

CREATE TABLE `id_value_tbl_product` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `id_value_tbl_product`
--

INSERT INTO `id_value_tbl_product` (`ID`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `orderID` varchar(100) NOT NULL,
  `custID` varchar(100) NOT NULL,
  `productID` varchar(100) NOT NULL,
  `shippingID` text NOT NULL,
  `deliveryType` text NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `payment_method` text NOT NULL,
  `total_Price` double NOT NULL,
  `address` text NOT NULL,
  `order_file_design` text NOT NULL,
  `orderDateCreate` datetime NOT NULL DEFAULT current_timestamp(),
  `orderStatusPayment` text NOT NULL DEFAULT 'UNPAID',
  `billCode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`orderID`, `custID`, `productID`, `shippingID`, `deliveryType`, `productQuantity`, `payment_method`, `total_Price`, `address`, `order_file_design`, `orderDateCreate`, `orderStatusPayment`, `billCode`) VALUES
('oid_0000000051', 'cust_0000000125', 'prod_0000000051', '', 'SELF-PICKUP', 1, 'fpx', 450, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', '', '2023-07-18 01:48:08', 'PAID', 's3sspis3'),
('oid_0000000052', 'cust_0000000125', 'prod_0000000030', '', 'DELIVERY', 1, 'fpx', 50.98, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', '', '2023-07-19 15:41:05', 'UNPAID', 'b45gt0p2'),
('oid_0000000053', 'cust_0000000125', 'prod_0000000051', '', 'SELF-PICKUP', 1, 'fpx', 450, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', '', '2023-07-19 15:41:24', 'PAID', 'oilwxm2c'),
('oid_0000000054', 'cust_0000000125', 'prod_0000000030', '', 'DELIVERY', 1, 'fpx', 50.98, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', '', '2023-07-19 17:05:47', 'UNPAID', 'y05sjex7'),
('oid_0000000055', 'cust_0000000125', 'prod_0000000030', '', 'DELIVERY', 1, 'fpx', 50.98, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', '', '2023-07-19 17:17:57', 'UNPAID', 'ez4ock5l'),
('oid_0000000056', 'cust_0000000125', 'prod_0000000049', '', 'DELIVERY', 1, 'fpx', 0.9, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', 'IMG-64b7abb573d4d8.35810543.jpeg', '2023-07-19 17:24:07', 'UNPAID', ''),
('oid_0000000057', 'cust_0000000125', 'prod_0000000051', '', 'DELIVERY', 1, 'fpx', 450, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', 'IMG-64b7ac12b3c613.01602140.jpg', '2023-07-19 17:25:39', 'UNPAID', 'si29vkxc'),
('oid_0000000058', 'cust_0000000125', 'prod_0000000049', '', 'DELIVERY', 1, 'fpx', 0.9, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', 'IMG-64b7ac2d97e043.93447442.jpeg', '2023-07-19 17:26:06', 'UNPAID', ''),
('oid_0000000059', 'cust_0000000125', 'prod_0000000054', '', 'SELF-PICKUP', 1, 'fpx', 0.45, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', 'IMG-64b7ac55eadc31.68540245.jpeg', '2023-07-19 17:26:46', 'UNPAID', ''),
('oid_0000000060', 'cust_0000000125', 'prod_0000000041', '', 'SELF-PICKUP', 1, 'fpx', 12, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', 'IMG-64b7ac80200754.82981001.jpeg', '2023-07-19 17:27:28', 'UNPAID', '1ha9bwrd'),
('oid_0000000061', 'cust_0000000125', 'prod_0000000030', '', 'DELIVERY', 1, 'fpx', 50.98, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', 'IMG-64b7adff31fce1.38748562.jpeg', '2023-07-19 17:33:51', 'UNPAID', 'u6qndrgj'),
('oid_0000000062', 'cust_0000000125', 'prod_0000000030', '', 'DELIVERY', 1, 'fpx', 50.98, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', 'IMG-64b7ae79aa1559.82798987.jpeg', '2023-07-19 17:35:54', 'UNPAID', 'dxp57rdh'),
('oid_0000000063', 'cust_0000000125', 'prod_0000000051', '', 'DELIVERY', 1, 'fpx', 450, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', 'IMG-64b7af20823020.58343923.jpeg', '2023-07-19 17:38:41', 'UNPAID', 't9sqfe7n'),
('oid_0000000064', 'cust_0000000125', 'prod_0000000051', '', 'DELIVERY', 1, 'fpx', 450, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', 'IMG-64b7af3d898bb2.87408634.jpeg', '2023-07-19 17:39:10', 'UNPAID', 'ttmr1qcy'),
('oid_0000000065', 'cust_0000000125', 'prod_0000000030', '', 'DELIVERY', 1, 'fpx', 50.98, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', 'IMG-64b7af4caac5e3.97411832.jpg', '2023-07-19 17:39:25', 'UNPAID', 'sjwl86nk'),
('oid_0000000066', 'cust_0000000125', 'prod_0000000030', '', 'DELIVERY', 1, 'fpx', 50.98, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', 'IMG-64b7af4d095571.36993976.jpg', '2023-07-19 17:39:26', 'UNPAID', 'ju4hvpcc'),
('oid_0000000067', 'cust_0000000125', 'prod_0000000053', '', 'DELIVERY', 1, 'fpx', 2.5, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', 'IMG-64b7afe7988145.79993100.jpeg', '2023-07-19 17:42:00', 'UNPAID', 'ig1sgag5'),
('oid_0000000068', 'cust_0000000125', 'prod_0000000053', '', 'DELIVERY', 1, 'fpx', 2.5, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', 'IMG-64b7aff0dac5f3.69172186.jpeg', '2023-07-19 17:42:09', 'UNPAID', 'uxaa70p5'),
('oid_0000000069', 'cust_0000000125', 'prod_0000000053', '', 'DELIVERY', 1, 'fpx', 2.5, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', 'IMG-64b7b0044b6302.93117099.jpeg', '2023-07-19 17:42:28', 'UNPAID', '9myvddai'),
('oid_0000000070', 'cust_0000000125', 'prod_0000000049', '', 'DELIVERY', 1, 'fpx', 0.9, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', 'IMG-64b7b0419c6bd3.77897008.jpeg', '2023-07-19 17:43:32', 'UNPAID', ''),
('oid_0000000071', 'cust_0000000125', 'prod_0000000049', '', 'DELIVERY', 1, 'fpx', 0.9, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', 'IMG-64b7b08450ac12.62144300.jpeg', '2023-07-19 17:44:36', 'UNPAID', ''),
('oid_0000000072', 'cust_0000000125', 'prod_0000000049', '', 'DELIVERY', 1, 'fpx', 0.9, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', 'IMG-64b7b097337ce4.03650999.jpeg', '2023-07-19 17:44:55', 'UNPAID', ''),
('oid_0000000074', 'cust_0000000125', 'prod_0000000030', '', 'DELIVERY', 1, 'fpx', 50.98, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', 'IMG-64b7b1a50d1bb0.85682377.jpg', '2023-07-19 17:49:25', 'UNPAID', 'sv2dnqel'),
('oid_0000000075', 'cust_0000000125', 'prod_0000000030', '', 'DELIVERY', 1, 'fpx', 50.98, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', 'IMG-64b7b1e63c2138.45691411.jpg', '2023-07-19 17:50:30', 'UNPAID', 'id3q9zhm'),
('oid_0000000076', 'cust_0000000125', 'prod_0000000030', '', 'DELIVERY', 1, 'fpx', 50.98, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', '', '2023-07-19 17:58:43', 'UNPAID', '6bm49eve'),
('oid_0000000077', 'cust_0000000125', 'prod_0000000051', '', 'SELF-PICKUP', 1, 'fpx', 450, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', '', '2023-07-19 20:40:49', 'UNPAID', 'kjx5qpa9'),
('oid_0000000078', 'cust_0000000125', 'prod_0000000056', '', 'SELF-PICKUP', 1, 'fpx', 123, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', '', '2023-07-19 20:41:51', 'UNPAID', 'jdc6k434'),
('oid_0000000079', 'cust_0000000125', 'prod_0000000041', '', 'SELF-PICKUP', 1, 'fpx', 12, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', '', '2023-07-19 20:42:52', 'UNPAID', '7umfn9um'),
('oid_0000000080', 'cust_0000000125', 'prod_0000000053', '', 'SELF-PICKUP', 1, 'fpx', 2.5, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', '', '2023-07-19 20:43:08', 'UNPAID', '4xlsnoeh'),
('oid_0000000081', 'cust_0000000125', 'prod_0000000052', '', 'DELIVERY', 1, 'fpx', 300, 'Jalan 1, Jalan 2, 36600, Bestari Jaya, Selangor, Malaysia', '', '2023-07-20 00:08:32', 'UNPAID', 'lrdvs0h3'),
('oid_0000000082', 'admin', 'prod_0000000051', '', 'DELIVERY', 1, 'fpx', 450, 'test1, test2, 1234, Bestari jaya, Selangor, Malaysia', '', '2023-07-20 01:11:17', 'PAID', 't45a2epi');

--
-- Triggers `order_item`
--
DELIMITER $$
CREATE TRIGGER `getOrderID` BEFORE INSERT ON `order_item` FOR EACH ROW BEGIN
INSERT INTO id_value_tbl_order VALUES (NULL);
SET NEW.orderID = CONCAT("oid_", LPAD(LAST_INSERT_ID(), 10, "0"));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `productID` varchar(100) NOT NULL,
  `productName` text NOT NULL,
  `productSize` int(11) DEFAULT NULL,
  `unitSize` varchar(20) NOT NULL,
  `productDescription` text DEFAULT NULL,
  `productPrice` double DEFAULT NULL,
  `productPic` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`productID`, `productName`, `productSize`, `unitSize`, `productDescription`, `productPrice`, `productPic`) VALUES
('prod_0000000030', 'Kain Suteraa', 12, 'feet', '\"Sutera liar\" dihasilkan oleh beluncas selain ulat sutera kertau dan tidak boleh diternak. Pelbagai sutera liar dikenali dan digunakan di China, Asia Selatan, dan Eropah sejak zaman silam, cuma penghasilannya sentiasa jauh lebih kecil berbanding sutera ternakan. Sutera liar berbeza dari sutera ternakan dari segi warna dan tekstur, dan kepompong-kepompong liar yang dikumpul selalunya sudah dirosakkan oleh rama-rama yang keluar sebelum dikumpuk, maka benang sutera yang membentuk kepompong itu sudah terputus menjadi pendek. ', 50.98, 'IMG-643c8ee5d15923.02718471.jpg'),
('prod_0000000041', 'Testing 2', 12, 'mm', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 12, 'IMG-647ee6b89850a9.33848303.png'),
('prod_0000000042', 'Testing 3', 10, 'mm', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 99, 'IMG-647ee7539afee5.40691670.png'),
('prod_0000000049', 'Wedding Card', 20, 'cm', 'Celebrate your special day with personalized wedding cards that reflect your love story. Our premium printing service offers an exquisite collection of designs and customization options to create the perfect invitation that sets the tone for your dream wedding. From elegant calligraphy to stunning illustrations, our expert team ensures every detail is meticulously crafted, making your wedding cards truly one-of-a-kind. Trust us to bring your vision to life and leave a lasting impression on your guests with our exceptional printing service for wedding cards. Let your love story shine through beautifully designed invitations - start creating your unique wedding cards today!', 0.9, 'IMG-64b49a66e973e3.71661052.jpg'),
('prod_0000000051', 'Photographer service', 0, 'mm', 'Capture your special moments with our professional photography service for any event. From weddings to birthdays and more, we create stunning images that will preserve your cherished memories forever. Book us now and let us capture the magic of your event!', 450, 'IMG-64b4a390b649c5.05142879.jpeg'),
('prod_0000000052', 'PA system (Any Event)', 0, 'mm', 'Elevate your event with our top-notch PA system rental service. Whether it\'s a corporate gathering, wedding, or party, our high-quality audio equipment will ensure crystal-clear sound and seamless communication. Leave the technical aspects to us and enjoy a flawless event experience. Book our PA service now to take your event to the next level!', 300, 'IMG-64b4a40736b858.07915358.jpeg'),
('prod_0000000053', 'Banner printing', 1, 'feet', 'Make a lasting impression with our professional banner printing service. From eye-catching designs to premium materials, we take pride in delivering banners that demand attention. Whether it\'s for a business promotion, event, or special occasion, our banners are tailored to your needs. Stand out from the crowd and showcase your message in bold and vibrant colors. Get noticed with our top-quality banner printing service today!', 2.5, 'IMG-64b4a4f79b96d8.14891227.jpg'),
('prod_0000000054', 'Brochure/Flyers printing', 1, 'feet', 'Transform your ideas into eye-catching realities with our top-notch brochure and flyer printing service. Let your message shine through stunning visuals and quality prints, making a memorable impact on your target audience. Elevate your marketing with us today!', 0.45, 'IMG-64b4a76c8468a0.52791028.jpg'),
('prod_0000000055', 'Name Card', 15, 'cm', 'Make your first impression unforgettable with our professional name card printing service. Create sleek and stylish name cards that reflect your brand\'s identity and leave a lasting impression on potential clients and partners. Stand out from the crowd with our high-quality prints, designed to elevate your networking game. Get your personalized name cards now!', 0.5, 'IMG-64b4a8eea41f36.37370685.jpg'),
('prod_0000000056', 'qwe', 123, 'unit', '123', 123, 'IMG-64b791f64f2f75.04460524.jpeg'),
('prod_0000000057', 'Suresh', 1, 'unit', 'ss', 12, 'IMG-64b8657e76b6c7.96017209.jpg');

--
-- Triggers `product_details`
--
DELIMITER $$
CREATE TRIGGER `getProductID` BEFORE INSERT ON `product_details` FOR EACH ROW BEGIN
INSERT INTO id_value_tbl_product VALUES (NULL);
SET NEW.productID = CONCAT("prod_", LPAD(LAST_INSERT_ID(), 10, "0"));
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custID`);

--
-- Indexes for table `id_value_tbl`
--
ALTER TABLE `id_value_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `id_value_tbl_order`
--
ALTER TABLE `id_value_tbl_order`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `id_value_tbl_product`
--
ALTER TABLE `id_value_tbl_product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `id_value_tbl`
--
ALTER TABLE `id_value_tbl`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `id_value_tbl_order`
--
ALTER TABLE `id_value_tbl_order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `id_value_tbl_product`
--
ALTER TABLE `id_value_tbl_product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
