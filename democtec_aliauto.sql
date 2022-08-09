-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2021 at 11:18 AM
-- Server version: 10.5.10-MariaDB-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `democtec_aliauto`
--

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE `alert` (
  `id` int(11) NOT NULL,
  `contact_category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alert`
--

INSERT INTO `alert` (`id`, `contact_category`, `name`, `email`, `payment`, `time`, `date`, `status`, `description`) VALUES
(1, 'supplier', 'Ali Supplier', 'alikhan@gmail.com', '1500', '11:58:00', '2021-10-18', 'received', 'supplier,ali supplier 1500 recv');

-- --------------------------------------------------------

--
-- Table structure for table `bonus`
--

CREATE TABLE `bonus` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `bonus` varchar(255) NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bonus`
--

INSERT INTO `bonus` (`id`, `date`, `bonus`, `emp_id`) VALUES
(1, '2021-09-18', '500', 3),
(2, '2021-10-18', '500', 4);

-- --------------------------------------------------------

--
-- Table structure for table `buying`
--

CREATE TABLE `buying` (
  `id` int(11) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(1, 'ready', 'active'),
(2, 'raw', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`id`, `name`, `category`, `product`, `price`, `date`) VALUES
(1, 'ali', 'raw', 'p1 raw', '7', '2021-09-18'),
(2, 'Sheri', 'ready', 'p1 ready', '80', '2021-09-18');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `picture`, `business_name`, `cnic`, `mobile`, `address`) VALUES
(1, 'Hashim Customer', 'hashim@gmail.com', 'customers/men.jpg', 'hashim bb', '123456', '654321', 'grw'),
(3, 'New Asia ', 'newasia@gmail.com', 'customers/pexels-burst-374710.jpg', 'New Asia', '34101-317111-3', '0311-2222222', 'Lahore');

-- --------------------------------------------------------

--
-- Table structure for table `customer_remaining_pay`
--

CREATE TABLE `customer_remaining_pay` (
  `id` int(11) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `pay` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `daily`
--

CREATE TABLE `daily` (
  `id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daily`
--

INSERT INTO `daily` (`id`, `amount`, `type`, `description`, `date`) VALUES
(5, '700', 'payment', 'Buy Gloves\r\n', '2021-10-23'),
(6, '6200', 'payment', 'Coil', '2021-10-12'),
(7, '4600', 'payment', 'Welding Rod', '2021-02-10'),
(8, '500', 'recovery', '', '2021-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `deduction`
--

CREATE TABLE `deduction` (
  `id` int(11) NOT NULL,
  `deduction` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deduction`
--

INSERT INTO `deduction` (`id`, `deduction`, `date`, `emp_id`) VALUES
(1, '200', '2021-09-18', 3),
(2, '200', '2021-10-18', 4);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contract` varchar(255) NOT NULL,
  `paying_term` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_name`, `cnic`, `mobile`, `address`, `contract`, `paying_term`, `salary`, `date`, `profile`) VALUES
(1, 'ali', '34101-0200414-8', '652153', 'Mohala chah sarafa st#5 Hafizabad road gujranwala', 'contract', 'contract', '0', '2021-09-12', 'employee/download (1).png'),
(2, 'Sheri', '9874566', '123345', 'isb', 'c2', 'contract', '0', '2021-09-18', 'employee/download.png'),
(3, 'Ahmed', '34643634', '123456', 'isb', 'c3', 'monthly', '10000', '2021-09-18', 'employee/download.png'),
(4, 'test employee', '123654', '6542231', ' lahore ,Pakistan', 'con test', 'monthly', '50000', '2021-10-18', 'employee/download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employeework`
--

CREATE TABLE `employeework` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeework`
--

INSERT INTO `employeework` (`id`, `category`, `product`, `quantity`, `total`, `date`, `emp_id`) VALUES
(3, 'ready', 'p1 ready', '10', '800', '2021-09-18', 2),
(4, 'ready', 'p1 raw', '400', '2800', '2021-10-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `final_stock`
--

CREATE TABLE `final_stock` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `final_stock`
--

INSERT INTO `final_stock` (`id`, `name`, `category`, `quantity`) VALUES
(1, 'p1 ready', 'ready', 300),
(2, 'p1 raw', 'raw', 68982),
(4, 'p2', 'ready', -34515),
(6, 'test', 'ready', -34505),
(7, 'p1 raw', 'Select Category', 0),
(8, 'Hr Coil', 'raw', 69110);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `bill_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `supplier`, `bill_id`, `status`, `item_name`, `quantity`, `price`, `date`, `total`) VALUES
(6, 'Ali Supplier', '104', 'paid', 'p1 raw', '10', '50', '2021-09-17', '500.00'),
(8, 'mini supplier', '105', 'paid', 'p1 raw', '10', '10', '2021-10-18', '100.00'),
(9, 'Ali Supplier', '106', 'unpaid', 'p1 raw', '69110', '220', '2021-10-23', '15,204,200.00'),
(10, 'Mohsin Sb', '107', 'unpaid', 'Hr Coil', '69110', '10', '2021-10-23', '691,100.00');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`) VALUES
(1, 'ali@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `loss`
--

CREATE TABLE `loss` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loss`
--

INSERT INTO `loss` (`id`, `category`, `product`, `amount`, `description`) VALUES
(1, 'ready', 'p1 ready', '500', '1st'),
(2, 'raw', 'p1 raw', '200', 'raw,p1 raw los');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category`, `subcategory`, `unit`, `status`) VALUES
(1, 'p1 ready', 'ready', 'ready1', 'kg', 'active'),
(2, 'p1 raw', 'raw', 'raw1', 'g', 'active'),
(4, 'p2', 'ready', 'ready1', 'g', 'active'),
(5, 'min product', 'ready', 'ready1', 'kg', 'active'),
(6, 'test', 'ready', 'minready', 'g', 'active'),
(7, 'p1 raw', 'Select Category', '-- Select Sub Category --', 'Select Unit', 'active'),
(8, 'Hr Coil', 'raw', 'raw1', 'kg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `products_detail`
--

CREATE TABLE `products_detail` (
  `id` int(11) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `bill_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `discount_total` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `final_total` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `remaining` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_detail`
--

INSERT INTO `products_detail` (`id`, `supplier`, `bill_id`, `status`, `sub_total`, `discount_total`, `grand_total`, `final_total`, `paid`, `remaining`) VALUES
(4, 'Ali Supplier', '104', 'paid', '500.00', '500.00', '500.00', '500.00', '500', '0.00'),
(6, 'mini supplier', '105', 'paid', '100.00', '98.00', '98.98', '100.96', '100.96', '0.00'),
(7, 'Ali Supplier', '106', 'unpaid', '15,204,200.00', '', '', '', '0', ''),
(8, 'Mohsin Sb', '107', 'unpaid', '691,100.00', '', '', '', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `email`, `address`, `mobile`) VALUES
(1, 'Alihaiderautoengineeringco@gmail.com', 'GALA DARBAR QADIRIA.STREET NO-05 HAFIZABAD ROAD,GUJRANWALA', '0300-6412623');

-- --------------------------------------------------------

--
-- Table structure for table `readystock`
--

CREATE TABLE `readystock` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id` int(11) NOT NULL,
  `recipe_name` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `recipe_name`, `item_name`, `quantity`) VALUES
(1, 'min product', 'p1 raw', '10'),
(2, 'min product', 'p1 raw', '10'),
(3, 'p2', 'p1 raw', '50'),
(4, 'p1 ready', 'p1 raw', '5'),
(5, 'p1 ready', 'p1 raw', '10');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `salary`, `date`, `emp_id`) VALUES
(1, '10000', '2021-09-18', 3),
(2, '25000', '2021-10-18', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

CREATE TABLE `sale_items` (
  `id` int(11) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `bill_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale_items`
--

INSERT INTO `sale_items` (`id`, `customer`, `bill_id`, `status`, `item_name`, `quantity`, `price`, `date`, `total`) VALUES
(7, 'Hashim Customer', '107', 'unpaid', 'p2', '20', '50', '2021-09-17', '1,000.00'),
(8, 'Hashim Customer', '108', 'paid', 'p2', '5', '5000', '2021-09-17', '25,000.00'),
(9, 'Hashim Customer', '109', 'unpaid', 'p2', '1', '50', '2021-09-17', '50.00'),
(10, 'mini customer', '110', 'paid', 'p2', '10', '20', '2021-10-18', '200.00'),
(11, 'Hashim Customer', '111', 'paid', 'p2', '34555', '300', '2021-10-23', '10,366,500.00'),
(12, 'Hashim Customer', '111', 'paid', 'p2', '', '300', '2021-10-23', ''),
(13, 'Hashim Customer', '112', 'paid', 'test', '34555', '300', '2021-10-23', '10,366,500.00');

-- --------------------------------------------------------

--
-- Table structure for table `sale_product_details`
--

CREATE TABLE `sale_product_details` (
  `id` int(11) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `bill_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `discount_total` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `final_total` bigint(20) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `remaining` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale_product_details`
--

INSERT INTO `sale_product_details` (`id`, `customer`, `bill_id`, `status`, `sub_total`, `discount_total`, `grand_total`, `final_total`, `paid`, `remaining`) VALUES
(6, 'Hashim Customer', '107', 'unpaid', '1,000.00', '950.00', '969.00', 988, '0', '988.38'),
(7, 'Hashim Customer', '108', 'paid', '25,000.00', '23,750.00', '24,225.00', 24, '24709.50', '0.00'),
(8, 'Hashim Customer', '109', 'unpaid', '50.00', '50.00', '50.00', 50, '0', '50.00'),
(9, 'mini customer', '110', 'paid', '200.00', '198.00', '199.98', 202, '201.98', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `bill_id` varchar(255) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `sub` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `sub`, `name`, `status`) VALUES
(1, 'ready1', 'ready', 'active'),
(2, 'raw1', 'raw', 'active'),
(4, 'minready', 'ready', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `email`, `picture`, `business_name`, `cnic`, `mobile`, `address`) VALUES
(1, 'Ali Supplier', 'ali@gmail.com', 'supplier/men.jpg', 'ali business', '1233', '321644', 'lahore'),
(2, 'mini supplier', 'mini@gmail.com', 'supplier/download.jpg', 'min business', '123', '090078601', 'Lahore'),
(3, 'Mohsin Sb', 'Mohsin@gmail.com', 'supplier/pexels-ella-olsson-1640773.jpg', 'Metlink Steel Industry', '34101-317111-3', '0311-2222222', 'Karachi');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_remaining_pay`
--

CREATE TABLE `supplier_remaining_pay` (
  `id` int(11) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `pay` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `unit`, `status`) VALUES
(1, 'kilogram', 'kg', 'active'),
(2, 'gram', 'g', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonus`
--
ALTER TABLE `bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buying`
--
ALTER TABLE `buying`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_remaining_pay`
--
ALTER TABLE `customer_remaining_pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily`
--
ALTER TABLE `daily`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deduction`
--
ALTER TABLE `deduction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeework`
--
ALTER TABLE `employeework`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_stock`
--
ALTER TABLE `final_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loss`
--
ALTER TABLE `loss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_detail`
--
ALTER TABLE `products_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `readystock`
--
ALTER TABLE `readystock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_product_details`
--
ALTER TABLE `sale_product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_remaining_pay`
--
ALTER TABLE `supplier_remaining_pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alert`
--
ALTER TABLE `alert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bonus`
--
ALTER TABLE `bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buying`
--
ALTER TABLE `buying`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_remaining_pay`
--
ALTER TABLE `customer_remaining_pay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daily`
--
ALTER TABLE `daily`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `deduction`
--
ALTER TABLE `deduction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employeework`
--
ALTER TABLE `employeework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `final_stock`
--
ALTER TABLE `final_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loss`
--
ALTER TABLE `loss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products_detail`
--
ALTER TABLE `products_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `readystock`
--
ALTER TABLE `readystock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sale_product_details`
--
ALTER TABLE `sale_product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier_remaining_pay`
--
ALTER TABLE `supplier_remaining_pay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
