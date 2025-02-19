-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2025 at 05:35 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form_testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` int(10) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'Block 1', '2025-02-17 08:38:36', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `form1_data`
--

CREATE TABLE `form1_data` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `product_code` varchar(50) DEFAULT NULL,
  `stage` varchar(50) DEFAULT NULL,
  `block` varchar(50) DEFAULT NULL,
  `completed_batches` int(11) DEFAULT NULL,
  `wip_batches` int(11) DEFAULT NULL,
  `opening_stock` int(11) DEFAULT NULL,
  `closing_stock` int(11) DEFAULT NULL,
  `total_production` int(11) DEFAULT NULL,
  `total_dispatches` int(11) DEFAULT NULL,
  `std_yield` decimal(10,2) DEFAULT NULL,
  `target_yield` decimal(10,2) DEFAULT NULL,
  `actual_yield` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `form1_data`
--

INSERT INTO `form1_data` (`id`, `date`, `product_code`, `stage`, `block`, `completed_batches`, `wip_batches`, `opening_stock`, `closing_stock`, `total_production`, `total_dispatches`, `std_yield`, `target_yield`, `actual_yield`) VALUES
(4, '2025-02-14', '1', 'Stage 1', 'Block B', 12, 12, 12, 12, 12, 12, '12.00', '12.00', '12.00');

-- --------------------------------------------------------

--
-- Table structure for table `form2_data`
--

CREATE TABLE `form2_data` (
  `id` int(11) NOT NULL,
  `form1_id` int(11) DEFAULT NULL,
  `s_no` int(11) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `material_name` varchar(100) DEFAULT NULL,
  `uom` varchar(50) DEFAULT NULL,
  `sp_gr` varchar(50) DEFAULT NULL,
  `opening_balance` int(11) DEFAULT NULL,
  `receipts` int(11) DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `transfers` int(11) DEFAULT NULL,
  `physical_stock` int(11) DEFAULT NULL,
  `wip` int(11) DEFAULT NULL,
  `closing_balance` int(11) DEFAULT NULL,
  `net_consumption` int(11) DEFAULT NULL,
  `actual_cc` decimal(10,2) DEFAULT NULL,
  `std_cc` decimal(10,2) DEFAULT NULL,
  `std_inputs` int(11) DEFAULT NULL,
  `per_batch_consumption` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `form2_data`
--

INSERT INTO `form2_data` (`id`, `form1_id`, `s_no`, `code`, `material_name`, `uom`, `sp_gr`, `opening_balance`, `receipts`, `source`, `total`, `transfers`, `physical_stock`, `wip`, `closing_balance`, `net_consumption`, `actual_cc`, `std_cc`, `std_inputs`, `per_batch_consumption`) VALUES
(4, 4, 1, '12', '12', '12', '12', 12, 12, '12', 24, 21, 21, 21, -39, 63, '5.25', '21.00', 21, '21.00');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_code` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productdata`
--

CREATE TABLE `productdata` (
  `id` int(11) NOT NULL,
  `productCode` varchar(225) DEFAULT NULL,
  `materialCode` varchar(225) DEFAULT NULL,
  `material_Code_name` varchar(225) DEFAULT NULL,
  `blockId` varchar(100) DEFAULT NULL,
  `stageId` varchar(100) DEFAULT NULL,
  `unitId` varchar(100) DEFAULT NULL,
  `uomId` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productdata`
--

INSERT INTO `productdata` (`id`, `productCode`, `materialCode`, `material_Code_name`, `blockId`, `stageId`, `unitId`, `uomId`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, '5G', '352', 'JIO', '2', '2', '2', '2', '2025-02-19 09:11:14', 1, '2025-02-19 09:56:32', 1, 0),
(2, 'Relaince', 'RE23', 'Steel', '1,2', '2', '2', '2,3,4,5,7,8', '2025-02-19 09:19:25', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) NOT NULL,
  `role` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Employee'),
(3, 'Executive');

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` int(10) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`id`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'stage 1', '2025-02-17 08:38:42', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(10) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'Unit 2', '2025-02-16 22:40:26', 1, NULL, NULL),
(3, 'Unit 3', '2025-02-16 22:40:26', 1, NULL, NULL),
(4, 'Unit 4', '2025-02-16 23:11:00', 1, NULL, NULL),
(5, 'Unit 5', '2025-02-16 23:13:56', 1, NULL, NULL),
(7, 'Unit  18', '2025-02-16 23:56:08', 1, '2025-02-17 14:59:55', 1),
(8, 'unit 150', '2025-02-17 00:00:52', 1, '2025-02-17 00:06:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `uom`
--

CREATE TABLE `uom` (
  `id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` tinyint(23) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` tinyint(23) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uom`
--

INSERT INTO `uom` (`id`, `name`, `value`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'KGS', '1.21', NULL, 1, NULL, NULL),
(2, 'LTR', '2.4', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usersdata`
--

CREATE TABLE `usersdata` (
  `id` int(11) NOT NULL,
  `username` varchar(225) DEFAULT NULL,
  `employeeId` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `mobile` varchar(225) DEFAULT NULL,
  `roleId` int(11) DEFAULT NULL,
  `units` varchar(225) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usersdata`
--

INSERT INTO `usersdata` (`id`, `username`, `employeeId`, `password`, `email`, `mobile`, `roleId`, `units`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(11, 'admin@admin.com', '741', '741', 'bv@gmail.com', '9527528545', 1, '', '2025-02-19 00:06:59', 1, '2025-02-19 01:05:12', 1, 0),
(13, 'admin', '111', 'admin', 'vishal.kattera28@gmail.com', '7780290335', 1, NULL, '2025-02-19 00:25:06', 1, NULL, NULL, 0),
(15, 'info@glansa.com', '852', 'glansa@12345', 'vishal.kattera28@gmail.com', '99124372232', 1, '2,3,4', '2025-02-19 09:12:20', 1, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form1_data`
--
ALTER TABLE `form1_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form2_data`
--
ALTER TABLE `form2_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form1_id` (`form1_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productdata`
--
ALTER TABLE `productdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uom`
--
ALTER TABLE `uom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersdata`
--
ALTER TABLE `usersdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `form1_data`
--
ALTER TABLE `form1_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `form2_data`
--
ALTER TABLE `form2_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `productdata`
--
ALTER TABLE `productdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `uom`
--
ALTER TABLE `uom`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usersdata`
--
ALTER TABLE `usersdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `form2_data`
--
ALTER TABLE `form2_data`
  ADD CONSTRAINT `form2_data_ibfk_1` FOREIGN KEY (`form1_id`) REFERENCES `form1_data` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
