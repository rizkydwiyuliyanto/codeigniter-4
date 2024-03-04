-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 01:18 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `box`
--

CREATE TABLE `box` (
  `id_box` varchar(27) NOT NULL,
  `id_stuff` varchar(27) NOT NULL,
  `status` enum('active','not active') NOT NULL DEFAULT 'active',
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `create_edit_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `box`
--

INSERT INTO `box` (`id_box`, `id_stuff`, `status`, `create_date`, `create_edit_date`) VALUES
('1709155633-2103999109', '1708792536-1235439696', 'not active', '2024-02-29 06:27:13', '0000-00-00 00:00:00'),
('1709155633-29872105', '1708792536-1235439696', 'not active', '2024-02-29 06:27:13', '2024-03-01 07:02:09'),
('1709156334-1787979797', '1708792536-1235439696', 'active', '2024-02-29 06:38:54', NULL),
('1709167941-1641724930', '1709068109-1035728351', 'active', '2024-02-29 09:52:21', NULL),
('1709167941-936263071', '1709068109-1035728351', 'active', '2024-02-29 09:52:21', NULL),
('1709206450-1681943267', '1709068109-1035728351', 'active', '2024-02-29 20:34:10', NULL),
('1709373365-1574174904', '1709068109-1035728351', 'active', '2024-03-02 18:56:05', NULL),
('1709373365-1594416385', '1709215925-655977712', 'active', '2024-03-02 18:56:05', NULL),
('1709373365-1839807253', '1708792536-1235439696', 'active', '2024-03-02 18:56:05', NULL),
('1709373365-1963477510', '2', 'active', '2024-03-02 18:56:05', NULL),
('1709373365-561620468', '1709068109-1035728351', 'active', '2024-03-02 18:56:05', NULL),
('1709522593-1109336617', '1709215925-655977712', 'active', '2024-03-04 12:23:13', NULL),
('1709522593-2017136181', '1709215925-655977712', 'active', '2024-03-04 12:23:13', NULL),
('1709522593-2107420141', '1709215925-655977712', 'active', '2024-03-04 12:23:13', NULL),
('1709522593-359714120', '1709215925-655977712', 'active', '2024-03-04 12:23:13', NULL),
('1709522593-654790', '1709215925-655977712', 'active', '2024-03-04 12:23:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` varchar(27) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL DEFAULT 'aktif',
  `category_name` varchar(25) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `create_edit_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `status`, `category_name`, `create_date`, `create_edit_date`) VALUES
('1', 'aktif', 'Vegetable', '2024-02-24 12:58:36', '2024-02-25 16:21:33'),
('1708838813-1115229760', 'aktif', 'Bathing equipment', '2024-02-25 14:26:53', '2024-02-25 16:49:57'),
('1708838921-248116820', 'tidak aktif', 'Dish washing equipment', '2024-02-25 14:28:41', '2024-02-25 16:23:05'),
('1709068042-1805442242', 'aktif', 'Drink', '2024-02-28 06:07:22', NULL),
('1709206564-312514706', 'aktif', 'Snack', '2024-02-29 20:36:04', NULL),
('1709215451-1215746598', 'aktif', 'Pet food', '2024-02-29 23:04:11', NULL),
('1709385811-465783621', 'aktif', 'Food', '2024-03-02 22:23:31', NULL),
('1709386044-12448571', 'aktif', 'Healthy drink', '2024-03-02 22:27:24', NULL),
('1709386077-460130915', 'aktif', 'Rub oil', '2024-03-02 22:27:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items_list`
--

CREATE TABLE `items_list` (
  `id_item_list` varchar(27) NOT NULL,
  `id_shopping_list` varchar(27) NOT NULL,
  `id_stuff` varchar(27) NOT NULL,
  `sum` int(3) NOT NULL,
  `discount` int(3) DEFAULT NULL,
  `total_price` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items_list`
--

INSERT INTO `items_list` (`id_item_list`, `id_shopping_list`, `id_stuff`, `sum`, `discount`, `total_price`) VALUES
('1708870349-901094493', '1708855349-332286962', '1708792536-1235439696', 1, NULL, 20),
('1708871224-512926155', '1708855349-332286962', '1', 2, NULL, 4000),
('1708871963-1357219990', '1708855349-332286962', '1708847451-155980160', 2, NULL, 24000),
('1708915811-2137124718', '1708860345-1998102314', '1708792536-1235439696', 2, NULL, 40000),
('1708915824-1106638711', '1708860345-1998102314', '1708847451-155980160', 5, NULL, 60000),
('1708945863-1767540173', '1708860345-1998102314', '1708791955-534808968', 2, NULL, 5000),
('1708947885-1632435120', '1708860357-1829553058', '1708847556-76541088', 2, 40, 10800),
('1708947987-450367974', '1708860357-1829553058', '1708847451-155980160', 2, 10, 10800),
('1708960005-2105927354', '1708855349-332286962', '1708847451-155980160', 2, 0, 12000),
('1709075046-1410322574', '1709027609-1716093262', '1709068109-1035728351', 2, 0, 20000),
('1709075072-1039739430', '1709027609-1716093262', '1708791604-380096178', 1, 0, 22),
('1709156806-1479870336', '1709027609-1716093262', '1708847451-155980160', 2, 0, 24000),
('1709206343-95961004', '1709206042-479140031', '1', 1, 0, 2000),
('1709206394-158254202', '1709206042-479140031', '1709068109-1035728351', 1, 0, 10000),
('1709276632-1653342175', '1709276617-432055743', '1709068109-1035728351', 1, 0, 10000),
('1709276656-915160804', '1709276617-432055743', '1709215925-655977712', 1, 0, 6000),
('1709276918-1324644829', '1709276617-432055743', '2', 1, 0, 2000),
('1709330587-1697974424', '1709276617-432055743', '1709068109-1035728351', 1, 0, 10000),
('1709347497-1817556977', '1709276617-432055743', '1708792536-1235439696', 1, 0, 20000),
('1709374065-1417049472', '1709347237-1319401337', '1', 1, 0, 2000),
('1709374079-285878430', '1709347237-1319401337', '1709215925-655977712', 1, 0, 6000),
('1709386214-1927821849', '1709375237-107930563', '1709385850-1477790468', 1, 0, 20000),
('1709386332-1775690715', '1709375237-107930563', '1709386183-1209029566', 1, 0, 40000),
('1709386354-1250044989', '1709375237-107930563', '1709386110-1687632048', 4, 0, 12000),
('1709518760-1993130861', '1709445489-1267969317', '1', 1, 0, 2000),
('1709519536-868619273', '1709445489-1267969317', '1708791604-380096178', 1, 0, 22),
('1709522381-1464886383', '1709517903-1999258395', '1709215925-655977712', 5, 0, 30000),
('1709533221-1843265790', '1709533128-1473992615', '1708792536-1235439696', 1, 0, 20000),
('1709533243-1057456098', '1709533128-1473992615', '1709068109-1035728351', 1, 0, 10000),
('1709539396-542694777', '1709533128-1473992615', '1708847451-155980160', 1, 0, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id_shop` varchar(27) NOT NULL,
  `shop_name` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `create_edit_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id_shop`, `shop_name`, `address`, `create_date`, `create_edit_date`) VALUES
('1708747545-1739259861', 'Bintang mas', 'Di dalam PTC', '2024-02-24 13:05:45', '2024-02-29 22:56:04'),
('1708747578-1676617757', 'Alfamidi', '3333', '2024-02-24 13:06:18', '2024-02-24 21:42:16'),
('1708748727-529978710', 'Mama anang', 'Jaya Asri', '2024-02-24 13:25:27', NULL),
('1708759281-1935306729', 'Kios Mama dia', 'Jaya Asri Blok AF', '2024-02-24 16:21:21', '2024-02-24 19:48:59'),
('1709168158-1596817980', 'Indomaret', 'Depan SD Negeri Entrop', '2024-02-29 09:55:58', NULL),
('1709215410-694112500', 'SAGA Abe', 'Abepura', '2024-02-29 23:03:30', NULL),
('1709385779-1299304001', 'Nasi Uduk mandra', '', '2024-03-02 22:22:59', NULL),
('1709385885-563771639', 'Apotek Pelita Jaya', 'Jl. Kelapa 2 Entrop', '2024-03-02 22:24:45', '2024-03-02 22:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_list`
--

CREATE TABLE `shopping_list` (
  `id_shopping_list` varchar(27) NOT NULL,
  `date` date NOT NULL,
  `total` int(12) NOT NULL,
  `status` enum('finish','not finish','moved') DEFAULT 'not finish',
  `money_have` int(12) NOT NULL,
  `money_left` int(12) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `create_edit_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopping_list`
--

INSERT INTO `shopping_list` (`id_shopping_list`, `date`, `total`, `status`, `money_have`, `money_left`, `create_date`, `create_edit_date`) VALUES
('1708855349-332286962', '2024-02-12', 40020, 'moved', 50000, 9980, '2024-02-25 00:00:00', '2024-02-29 06:38:54'),
('1708860345-1998102314', '2024-02-12', 105000, 'moved', 110000, 5000, '2024-02-25 00:00:00', '2024-02-27 00:07:56'),
('1708860357-1829553058', '2024-02-15', 21600, 'moved', 25000, 3400, '2024-02-25 00:00:00', '2024-02-26 23:59:32'),
('1709027609-1716093262', '2024-02-19', 44022, 'moved', 50000, 5978, '2024-02-27 00:00:00', '2024-02-29 09:52:21'),
('1709206042-479140031', '2024-02-29', 12000, 'moved', 15000, 3000, '2024-02-29 00:00:00', '2024-02-29 20:34:10'),
('1709276617-432055743', '2024-03-01', 48000, 'moved', 50000, 2000, '2024-03-01 00:00:00', '2024-03-02 18:56:05'),
('1709347237-1319401337', '2024-03-03', 8000, 'finish', 9000, 1000, '2024-03-02 00:00:00', '2024-03-02 19:08:29'),
('1709375237-107930563', '2024-03-01', 0, 'not finish', 0, 0, '2024-03-02 00:00:00', NULL),
('1709445489-1267969317', '2024-02-11', 2022, 'moved', 3000, -69000, '2024-03-03 00:00:00', '2024-03-04 12:14:23'),
('1709517903-1999258395', '2024-03-04', 30000, 'moved', 35000, 5000, '2024-03-04 11:05:03', '2024-03-04 12:23:13'),
('1709522899-1660214449', '2024-03-05', 0, 'not finish', 0, 0, '2024-03-04 12:28:19', NULL),
('1709533128-1473992615', '2024-03-05', 0, 'not finish', 0, 0, '2024-03-04 15:18:48', NULL),
('1709539286-1230194586', '2024-03-04', 0, 'not finish', 0, 0, '2024-03-04 17:01:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stuff`
--

CREATE TABLE `stuff` (
  `id_stuff` varchar(27) NOT NULL,
  `stuff_name` varchar(30) NOT NULL,
  `id_shop` varchar(27) NOT NULL,
  `size` enum('kecil','sedang','besar','') NOT NULL,
  `id_category` varchar(27) NOT NULL,
  `price` int(12) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `create_edit_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stuff`
--

INSERT INTO `stuff` (`id_stuff`, `stuff_name`, `id_shop`, `size`, `id_category`, `price`, `create_date`, `create_edit_date`) VALUES
('1', 'Bayam', '1708747545-1739259861', 'kecil', '1', 2000, '2024-02-24 12:59:20', NULL),
('1708791604-380096178', 'awdawd', '1708748727-529978710', 'kecil', '1', 22, '2024-02-25 01:20:04', NULL),
('1708791955-534808968', 'xxx22', '1708748727-529978710', '', '1', 2500, '2024-02-25 01:25:55', '2024-02-25 11:00:11'),
('1708792536-1235439696', 'Rinso', '1708747578-1676617757', 'kecil', '1708838921-248116820', 20000, '2024-02-25 01:35:36', '2024-02-25 14:29:28'),
('1708847451-155980160', 'Shampo Head & Shoulder', '1708747578-1676617757', 'sedang', '1708838813-1115229760', 12000, '2024-02-25 16:50:51', '2024-02-25 20:31:57'),
('1708847556-76541088', 'Sabun Lifebuoy', '1708747578-1676617757', 'sedang', '1708838813-1115229760', 18000, '2024-02-25 16:52:36', '2024-02-25 20:10:52'),
('1709068109-1035728351', 'Milo Kaleng', '1708747545-1739259861', 'kecil', '1709068042-1805442242', 10000, '2024-02-28 06:08:29', NULL),
('1709206590-982824354', 'Kusuka', '1708759281-1935306729', 'sedang', '1709206564-312514706', 8000, '2024-02-29 20:36:30', NULL),
('1709215925-655977712', 'Bayam', '1708748727-529978710', '', '1', 6000, '2024-02-29 23:12:05', '2024-02-29 23:12:53'),
('1709385850-1477790468', 'Telur', '1709385779-1299304001', 'sedang', '1709385811-465783621', 20000, '2024-03-02 22:24:10', NULL),
('1709386110-1687632048', 'Vegeta harbel 1 Sachet', '1709385885-563771639', 'kecil', '1709386044-12448571', 3000, '2024-03-02 22:28:30', NULL),
('1709386183-1209029566', 'Minyak tawon', '1709385885-563771639', 'sedang', '1709386077-460130915', 40000, '2024-03-02 22:29:43', NULL),
('2', 'Kangkung', '1708747545-1739259861', 'kecil', '1', 2000, '2024-02-24 13:00:51', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `box`
--
ALTER TABLE `box`
  ADD PRIMARY KEY (`id_box`),
  ADD KEY `box_ibfk1` (`id_stuff`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `items_list`
--
ALTER TABLE `items_list`
  ADD PRIMARY KEY (`id_item_list`),
  ADD KEY `item_list_ibfk1` (`id_stuff`),
  ADD KEY `item_list_ibfk2` (`id_shopping_list`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id_shop`);

--
-- Indexes for table `shopping_list`
--
ALTER TABLE `shopping_list`
  ADD PRIMARY KEY (`id_shopping_list`);

--
-- Indexes for table `stuff`
--
ALTER TABLE `stuff`
  ADD PRIMARY KEY (`id_stuff`),
  ADD KEY `stuff_ibfk_1` (`id_shop`),
  ADD KEY `stuff_ibfk_2` (`id_category`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `box`
--
ALTER TABLE `box`
  ADD CONSTRAINT `box_ibfk1` FOREIGN KEY (`id_stuff`) REFERENCES `stuff` (`id_stuff`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items_list`
--
ALTER TABLE `items_list`
  ADD CONSTRAINT `item_list_ibfk1` FOREIGN KEY (`id_stuff`) REFERENCES `stuff` (`id_stuff`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_list_ibfk2` FOREIGN KEY (`id_shopping_list`) REFERENCES `shopping_list` (`id_shopping_list`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stuff`
--
ALTER TABLE `stuff`
  ADD CONSTRAINT `stuff_ibfk_1` FOREIGN KEY (`id_shop`) REFERENCES `shop` (`id_shop`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stuff_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
