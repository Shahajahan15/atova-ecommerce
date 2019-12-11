-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 28, 2017 at 11:31 AM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc__employee_salary`
--

CREATE TABLE `acc__employee_salary` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `employees_id` int(11) NOT NULL,
  `payment_methods_id` int(11) NOT NULL,
  `transaction_number` varchar(45) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `reason` varchar(250) DEFAULT NULL,
  `note` mediumtext,
  `expense_category_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `acc__payments`
--

CREATE TABLE `acc__payments` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `employees_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `payment_categories_id` int(11) NOT NULL,
  `payment_methods_id` int(11) NOT NULL,
  `transaction_number` varchar(45) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `reason` varchar(150) DEFAULT NULL,
  `note` mediumtext,
  `receiving__invoice_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc__payments`
--

INSERT INTO `acc__payments` (`id`, `date`, `employees_id`, `recipient_id`, `payment_categories_id`, `payment_methods_id`, `transaction_number`, `amount`, `reason`, `note`, `receiving__invoice_id`) VALUES
(26, '2017-08-03', 2, 10, 4, 3, '56464', 150, 'asf asdf asdf', 'sdf', NULL),
(27, '2017-08-03', 2, 10, 4, 2, NULL, 250, 'asf asdf asdf', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `acc__payment_categories`
--

CREATE TABLE `acc__payment_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `note` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc__payment_categories`
--

INSERT INTO `acc__payment_categories` (`id`, `title`, `note`) VALUES
(1, 'Purchase Invoice', NULL),
(2, 'Purchae', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(3, 'Sale', 'Hello word'),
(4, 'Text', NULL),
(5, 'hello', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `acc__payment_methods`
--

CREATE TABLE `acc__payment_methods` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `note` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc__payment_methods`
--

INSERT INTO `acc__payment_methods` (`id`, `title`, `note`) VALUES
(1, 'Cash', NULL),
(2, 'bKash', NULL),
(3, 'DBBL', NULL),
(4, 'Credit Card', NULL),
(5, 'DBBL', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(6, 'uKash', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `acc__receipts`
--

CREATE TABLE `acc__receipts` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `employees_id` int(11) DEFAULT NULL,
  `payer_id` int(11) NOT NULL,
  `payment_categories_id` int(11) NOT NULL,
  `payment_methods_id` int(11) NOT NULL,
  `transaction_number` varchar(45) DEFAULT NULL,
  `amount` double NOT NULL,
  `reason` varchar(250) DEFAULT NULL,
  `note` mediumtext,
  `deliver__invoice_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc__receipts`
--

INSERT INTO `acc__receipts` (`id`, `date`, `employees_id`, `payer_id`, `payment_categories_id`, `payment_methods_id`, `transaction_number`, `amount`, `reason`, `note`, `deliver__invoice_id`) VALUES
(1, '2017-09-14', 2, 7, 3, 3, NULL, 500, NULL, NULL, NULL),
(2, '2017-09-13', 2, 5, 5, 6, NULL, 950, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank__account`
--

CREATE TABLE `bank__account` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(200) DEFAULT NULL,
  `account_no` varchar(250) DEFAULT NULL,
  `branch` varchar(100) NOT NULL,
  `account_type` varchar(150) DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `description` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank__account`
--

INSERT INTO `bank__account` (`id`, `bank_name`, `account_no`, `branch`, `account_type`, `balance`, `description`) VALUES
(1, 'DBBL', '152-54-5641', '', 'Current', 5000, 'Nice bank'),
(2, 'DBBL', '152-54-5641', 'Mirpur - 10', 'Current', 5000, 'Nice bank'),
(4, 'DBBL', '4645863543654', 'Mirpur - 10', 'xcv', NULL, 'zf zdf SF dzsf');

-- --------------------------------------------------------

--
-- Table structure for table `bank__deposit`
--

CREATE TABLE `bank__deposit` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `employees_id` int(11) NOT NULL,
  `amount` double DEFAULT NULL,
  `note` mediumtext,
  `transaction_reason_id` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank__deposit`
--

INSERT INTO `bank__deposit` (`id`, `account_id`, `employees_id`, `amount`, `note`, `transaction_reason_id`, `date`) VALUES
(2, 1, 2, 5000, ' asdf asdf asdf', 1, '2017-08-30'),
(3, 4, 18, 505, 'How are you', 2, '2017-08-10'),
(4, 4, 2, 850, NULL, 2, '2017-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `bank__transaction_reason`
--

CREATE TABLE `bank__transaction_reason` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `note` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank__transaction_reason`
--

INSERT INTO `bank__transaction_reason` (`id`, `title`, `note`) VALUES
(1, 'sd fasf asf', 'nice to meet you'),
(2, 'Purchae', 'fas fasdf asdf s how are you good');

-- --------------------------------------------------------

--
-- Table structure for table `bank__withdraw`
--

CREATE TABLE `bank__withdraw` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `employees_id` int(11) NOT NULL,
  `amount` double DEFAULT NULL,
  `note` mediumtext,
  `transaction_reason_id` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank__withdraw`
--

INSERT INTO `bank__withdraw` (`id`, `account_id`, `employees_id`, `amount`, `note`, `transaction_reason_id`, `date`) VALUES
(1, 2, 2, 1000, ' sfg dfg', 1, '2017-08-14'),
(3, 1, 2, 1236, 'sdf sdfh ha ha', 1, '2017-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `deliver__addition`
--

CREATE TABLE `deliver__addition` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `type` enum('percentage','fixed') DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `nate` varchar(250) DEFAULT NULL,
  `deliver__invoice_id` int(11) NOT NULL,
  `status` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliver__addition`
--

INSERT INTO `deliver__addition` (`id`, `title`, `type`, `amount`, `nate`, `deliver__invoice_id`, `status`) VALUES
(1, 'Tax', 'percentage', 15, NULL, 3, '0'),
(2, 'Database', 'fixed', 50, NULL, 4, '0'),
(3, 'Tax', 'percentage', 15, NULL, 7, '0');

-- --------------------------------------------------------

--
-- Table structure for table `deliver__invoice`
--

CREATE TABLE `deliver__invoice` (
  `id` int(11) NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `challan_no` varchar(45) DEFAULT NULL,
  `note` mediumtext,
  `employees_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `status` enum('0','1') DEFAULT '0',
  `deliver__status_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliver__invoice`
--

INSERT INTO `deliver__invoice` (`id`, `type`, `date`, `challan_no`, `note`, `employees_id`, `users_id`, `status`, `deliver__status_id`) VALUES
(3, 'sale', '2017-07-18 09:26:15', '456465', 'saf sadfsf sf', 2, 15, '1', 4),
(4, 'sale', '2017-07-19 11:17:54', '456465', NULL, 2, 15, '1', 3),
(5, 'sale', '2017-08-21 10:55:15', '456465', '44564', 2, 15, '0', 1),
(6, 'transfer', '2017-08-23 11:44:26', '45654', NULL, 2, 2, '1', 1),
(7, 'return', '2017-08-29 09:17:12', '456465', NULL, 2, 13, '1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `deliver__invoice_item`
--

CREATE TABLE `deliver__invoice_item` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `free` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `deliver__invoice_id` int(11) NOT NULL,
  `stock_status` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliver__invoice_item`
--

INSERT INTO `deliver__invoice_item` (`id`, `product_id`, `quantity`, `free`, `price`, `discount`, `total`, `deliver__invoice_id`, `stock_status`) VALUES
(1, 10, '2', 0, 400, 0, 800, 3, '0'),
(2, 8, '1', 0, 1000, 0, 1000, 3, '0'),
(3, 8, '7', 0, 1000, 0, 7000, 4, '0'),
(4, 9, '2', 0, 10000, 0, 20000, 4, '0'),
(5, 12, '1', 0, 5000, 0, 5000, 5, '0'),
(6, 8, '1', 0, 1000, 0, 1000, 6, '0'),
(7, 9, '1', 0, 10000, 0, 10000, 6, '0'),
(8, 10, '1', 2, 400, 0, 400, 7, '0'),
(9, 12, '1', 0, 5000, 0, 5000, 7, '0');

-- --------------------------------------------------------

--
-- Table structure for table `deliver__reduction`
--

CREATE TABLE `deliver__reduction` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `type` enum('percentage','fixed') DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `deliver__invoice_id` int(11) NOT NULL,
  `status` enum('0','1') DEFAULT '0' COMMENT '1 => Quatation\n2 => Ordered\n3 => Delevired\n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliver__reduction`
--

INSERT INTO `deliver__reduction` (`id`, `title`, `type`, `amount`, `note`, `deliver__invoice_id`, `status`) VALUES
(1, 'Database', 'fixed', 50, NULL, 3, '0'),
(2, 'Database', 'fixed', 50, NULL, 4, '0'),
(3, 'Headline', 'fixed', 500, NULL, 7, '0');

-- --------------------------------------------------------

--
-- Table structure for table `deliver__status`
--

CREATE TABLE `deliver__status` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `stock_increase` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliver__status`
--

INSERT INTO `deliver__status` (`id`, `title`, `stock_increase`) VALUES
(1, 'Pending', '0'),
(2, 'Processing', '0'),
(3, 'Processed', '1'),
(4, 'Shipped', '1'),
(5, 'Delivered', '1'),
(6, 'Returned', '0'),
(7, 'Cancel', '0'),
(8, 'Completed', '1');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `employees_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `payment_methods_id` int(11) NOT NULL,
  `transaction_number` varchar(80) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `reason` varchar(250) DEFAULT NULL,
  `note` varchar(45) DEFAULT NULL,
  `expense_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `date`, `employees_id`, `recipient_id`, `payment_methods_id`, `transaction_number`, `amount`, `reason`, `note`, `expense_category_id`) VALUES
(2, '2017-08-08', 2, 7, 4, '4678784365', 1250, 'lhlsadf', 'fsas fasdf dsf', 1),
(3, '2017-08-31', 2, 5, 3, '500', 500, 'dfkljs', 'hello word', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expense__category`
--

CREATE TABLE `expense__category` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `note` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense__category`
--

INSERT INTO `expense__category` (`id`, `title`, `note`) VALUES
(1, 'Refreshment', 'This is description'),
(2, 'asfd', NULL),
(3, 'Paper bill', 'note for the paper bill');

-- --------------------------------------------------------

--
-- Table structure for table `hr__customers`
--

CREATE TABLE `hr__customers` (
  `users_id` int(11) NOT NULL,
  `present_address` varchar(200) DEFAULT NULL,
  `permanent_address` varchar(200) DEFAULT NULL,
  `post_code` varchar(10) DEFAULT NULL,
  `city` varchar(80) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `company_name` varchar(45) DEFAULT NULL,
  `company_phone` varchar(45) DEFAULT NULL,
  `company_mobile` varchar(45) DEFAULT NULL,
  `company_fax` varchar(45) DEFAULT NULL,
  `company_address` varchar(45) DEFAULT NULL,
  `tier_types_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr__customers`
--

INSERT INTO `hr__customers` (`users_id`, `present_address`, `permanent_address`, `post_code`, `city`, `country`, `state`, `company_name`, `company_phone`, `company_mobile`, `company_fax`, `company_address`, `tier_types_id`) VALUES
(15, 'Lalmatia', 'Lalmatia', '1207', 'Dhaka', 'Bangladesh', 'Dhaka', 'Atova', '54646', '796786', '564564', 'Lalmatia', 3),
(17, 'Lalmatia', NULL, '1207', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hr__designations`
--

CREATE TABLE `hr__designations` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr__designations`
--

INSERT INTO `hr__designations` (`id`, `title`) VALUES
(1, 'Charman'),
(2, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `hr__employees`
--

CREATE TABLE `hr__employees` (
  `users_id` int(11) NOT NULL,
  `religion` varchar(25) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `present_address` varchar(80) DEFAULT NULL,
  `permanent_address` varchar(80) DEFAULT NULL,
  `post_code` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `nid` varchar(45) DEFAULT NULL,
  `employee_id` varchar(45) DEFAULT NULL,
  `designation_id` int(11) NOT NULL,
  `qualification` tinytext,
  `hire_date` date DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `tier_types_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr__employees`
--

INSERT INTO `hr__employees` (`users_id`, `religion`, `dob`, `present_address`, `permanent_address`, `post_code`, `city`, `country`, `state`, `nid`, `employee_id`, `designation_id`, `qualification`, `hire_date`, `salary`, `tier_types_id`) VALUES
(2, 'Islam', '1993-09-20', 'Lalmatia', NULL, '1207', 'Dhaka', 'Bangladesh', 'Dhaka', NULL, '456456', 1, NULL, '2010-06-16', 456, 2),
(18, 'Islam', '2017-08-16', 'Lalmatia', 'Lalmatia', '1207', 'Dhaka', 'Bangladesh', 'Dhaka', '654645614514', '21', 1, NULL, '2017-08-08', 50000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hr__password_resets`
--

CREATE TABLE `hr__password_resets` (
  `users_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `token` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr__shipping_address`
--

CREATE TABLE `hr__shipping_address` (
  `users_id` int(11) NOT NULL,
  `sa_first_name` varchar(45) DEFAULT NULL,
  `sa_last_name` varchar(45) DEFAULT NULL,
  `sa_mobile` varchar(45) DEFAULT NULL,
  `sa_present_address` varchar(200) DEFAULT NULL,
  `sa_permanent_address` varchar(200) DEFAULT NULL,
  `sa_post_code` varchar(10) DEFAULT NULL,
  `sa_city` varchar(80) DEFAULT NULL,
  `sa_country` varchar(45) DEFAULT NULL,
  `sa_state` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr__shipping_address`
--

INSERT INTO `hr__shipping_address` (`users_id`, `sa_first_name`, `sa_last_name`, `sa_mobile`, `sa_present_address`, `sa_permanent_address`, `sa_post_code`, `sa_city`, `sa_country`, `sa_state`) VALUES
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr__suppliers`
--

CREATE TABLE `hr__suppliers` (
  `users_id` int(11) NOT NULL,
  `present_address` varchar(200) DEFAULT NULL,
  `permanent_address` varchar(200) DEFAULT NULL,
  `post_code` varchar(10) DEFAULT NULL,
  `city` varchar(80) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `company_name` varchar(45) DEFAULT NULL,
  `company_phone` varchar(45) DEFAULT NULL,
  `company_mobile` varchar(45) DEFAULT NULL,
  `company_fax` varchar(45) DEFAULT NULL,
  `company_address` varchar(45) DEFAULT NULL,
  `tier_types_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr__suppliers`
--

INSERT INTO `hr__suppliers` (`users_id`, `present_address`, `permanent_address`, `post_code`, `city`, `country`, `state`, `company_name`, `company_phone`, `company_mobile`, `company_fax`, `company_address`, `tier_types_id`) VALUES
(11, 'Lalmatia', 'Lalmatia', '1207', 'Dhaka', 'Bangladesh', 'Dhaka', 'Atova', '54646', '796786', '564564', 'Lalmatia', 2),
(13, 'Lalmatia', 'Lalmatia', '1207', 'Dhaka', 'Bangladesh', 'Dhaka', 'Atova', NULL, NULL, NULL, NULL, 4),
(16, 'Lalmatia', 'Lalmatia', '1207', 'Dhaka', 'Bangladesh', 'Dhaka', 'Atova', '1723682468', '1723682468', '1723682468', 'Lalmatia', 4);

-- --------------------------------------------------------

--
-- Table structure for table `hr__tier_types`
--

CREATE TABLE `hr__tier_types` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr__tier_types`
--

INSERT INTO `hr__tier_types` (`id`, `title`) VALUES
(1, 'Excellent'),
(2, 'Very Good'),
(3, 'Good'),
(4, 'Avarage');

-- --------------------------------------------------------

--
-- Table structure for table `hr__users`
--

CREATE TABLE `hr__users` (
  `id` int(11) NOT NULL,
  `type` enum('Customer','Supplier','Employee','Admin') DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `remember_token` varchar(200) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr__users`
--

INSERT INTO `hr__users` (`id`, `type`, `first_name`, `last_name`, `gender`, `mobile`, `email`, `password`, `image`, `remember_token`, `updated_at`, `created_at`) VALUES
(2, 'Employee', 'Mamun', 'Sarkar', 'Male', '01723682468', 'mamun.atova@gmail.com', '$2y$10$6m46sxoVpqTGojzmw9Rp/ulMNRW9AkrVyMzqMKnBZwgXd3WXmaqni', 'uploads/users/Mamun91079.jpg', 'nT0PT7DX4dFenNS2oNQ3tSHr54KJLEMsXsUH3ZYKmcCiBfAdyKiMoyxoR7y3', '2017-06-08 06:55:55', '2017-02-25 05:41:12'),
(5, 'Customer', 'Aman', 'Sarkar', 'Male', '01723682468', 'atova@gmail.com', NULL, NULL, NULL, '2017-02-25 08:47:27', '2017-02-25 08:47:27'),
(7, 'Customer', 'Shahin', 'Sarkar', 'Male', '01723682468', 'mamun.atovas@gmail.com', NULL, NULL, NULL, '2017-02-25 09:24:26', '2017-02-25 09:24:26'),
(9, 'Supplier', 'Mamun', 'Sarkar', 'Male', '01723682468', 'mamuna@gmail.com', NULL, NULL, NULL, '2017-02-25 09:58:56', '2017-02-25 09:58:56'),
(10, 'Supplier', 'Ridoy', 'Sarkar', 'Male', '01723682468', 'mamuna@gmail.com', NULL, NULL, NULL, '2017-02-25 09:59:49', '2017-02-25 09:59:49'),
(11, 'Supplier', 'Hasan', 'Khan', 'Male', '01723682468', 'mamuna@gmail.com', NULL, 'uploads/users/Mamun74914.png', NULL, '2017-02-25 10:02:06', '2017-02-25 10:00:25'),
(13, 'Supplier', 'Joshim', 'Chawdhori', 'Male', '01723682468', 'un.atova@gmail.com', NULL, NULL, NULL, '2017-09-12 05:40:00', '2017-02-27 05:09:09'),
(15, 'Customer', 'Ostad', 'Sarkar', 'Male', '01723682468', 'mamun.atova2@gmail.com', NULL, 'uploads/users/Mamun49474.jpg', NULL, '2017-08-01 06:56:45', '2017-02-27 06:55:16'),
(16, 'Supplier', 'Ridoy ', 'Nur', 'Male', '01723682468', 'mamun.atova8@gmail.com', NULL, 'uploads/users/Mamun20851.jpg', NULL, '2017-02-27 08:24:38', '2017-02-27 08:24:38'),
(17, 'Customer', 'Hritkik', 'Sarkar', 'Male', '01723682468', 'mamva@gmail.com', NULL, NULL, NULL, '2017-08-02 09:41:59', '2017-08-02 09:41:59'),
(18, 'Employee', 'Mamun', 'Sarkar', 'Male', '01723682468', 'mamusn.atova@gmail.com', NULL, NULL, NULL, '2017-08-02 09:49:53', '2017-08-02 09:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `invest__investors`
--

CREATE TABLE `invest__investors` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `father_name` varchar(150) DEFAULT NULL,
  `mother_name` varchar(150) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `religion` varchar(20) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nid` varchar(100) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `nominee_name` varchar(150) DEFAULT NULL,
  `nominee_address` varchar(250) DEFAULT NULL,
  `nominee_mobile` varchar(15) DEFAULT NULL,
  `nominee_nid` varchar(100) DEFAULT NULL,
  `nominee_relation` varchar(250) DEFAULT NULL,
  `nominee_image` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invest__investors`
--

INSERT INTO `invest__investors` (`id`, `name`, `father_name`, `mother_name`, `gender`, `religion`, `date_of_birth`, `mobile`, `email`, `nid`, `address`, `image`, `nominee_name`, `nominee_address`, `nominee_mobile`, `nominee_nid`, `nominee_relation`, `nominee_image`) VALUES
(1, 'Investor name', 'father name', 'mother name', 'male', 'Islam', '2017-08-01', '01726545786', 'madfsadfs@agm.com', '654645614514', 'Lalmatia', '/photos/2/17903826_390825617983394_5956446908426093587_n.jpg', 'Mamun Sarkar', 'Lalmatia', '1723682468', 'Mamun Sarkar', 'Mamun Sarkar', '/photos/2/Wordpress_bangla_tut57552.jpg'),
(4, 'Mamun Sarkar', 'Mamun Sarkar', 'Mamun Sarkar', 'male', 'Islam', '2017-09-20', '1723682468', 'utova@gmail.com', '654645614514', 'Lalmatia', NULL, 'Mamun Sarkar', 'Lalmatia', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invest__invests`
--

CREATE TABLE `invest__invests` (
  `id` int(11) NOT NULL,
  `investors_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `payment_methods_id` int(11) NOT NULL,
  `transaction_number` varchar(45) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invest__invests`
--

INSERT INTO `invest__invests` (`id`, `investors_id`, `employee_id`, `payment_methods_id`, `transaction_number`, `amount`, `note`, `date`) VALUES
(3, 1, 2, 3, '7654865475', 1000, 'as fasd fasdf', '2017-09-29');

-- --------------------------------------------------------

--
-- Table structure for table `invest__withdraw`
--

CREATE TABLE `invest__withdraw` (
  `id` int(11) NOT NULL,
  `investors_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `payment_methods_id` int(11) NOT NULL,
  `transaction_number` varchar(45) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invest__withdraw`
--

INSERT INTO `invest__withdraw` (`id`, `investors_id`, `employee_id`, `payment_methods_id`, `transaction_number`, `amount`, `note`, `date`) VALUES
(2, 1, 2, 2, '5464', 500, NULL, '2017-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `ISBN` varchar(45) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `description` longtext,
  `model` varchar(45) DEFAULT NULL,
  `product_code` varchar(45) DEFAULT NULL,
  `barcode` varchar(150) DEFAULT NULL,
  `unite` varchar(45) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `cost_price` double DEFAULT NULL,
  `thumbnail` varchar(250) DEFAULT NULL,
  `image` varchar(250) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `meta_tag` varchar(150) DEFAULT NULL,
  `meta_description` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `ISBN`, `title`, `description`, `model`, `product_code`, `barcode`, `unite`, `price`, `cost_price`, `thumbnail`, `image`, `supplier_id`, `brand_id`, `users_id`, `slug`, `meta_tag`, `meta_description`, `updated_at`, `created_at`) VALUES
(8, NULL, 'This will be products title Database', '<p>The first parameter is the route name, the second parameter is an array of route parameters, preferably using key value. Because you did not show your defined route, it&#39;s hard to guess what this associative array should look like:</p>\r\n\r\n<p>The first parameter is the route name, the second parameter is an array of route parameters, preferably using key value. Because you did not show your defined route, it&#39;s hard to guess what this associative array should look like:</p>\r\n\r\n<p>The first parameter is the route name, the second parameter is an array of route parameters, preferably using key value. Because you did not show your defined route, it&#39;s hard to guess what this associative array should look like:</p>', '5456', '1001', '5645645456', 'Kg', 1200, 1000, '/photos/2/thumbs/17903826_390825617983394_5956446908426093587_n.jpg', '/photos/2/17903826_390825617983394_5956446908426093587_n.jpg', 11, 1, 2, 'this-will-be-products-title-database', NULL, NULL, '2017-03-27 07:05:34', '2017-03-27 07:05:34'),
(9, '54', 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '5456', '1002', '5645645456', 'Kg', 12002, 10000, '/photos/2/thumbs/18813607_117400152110925_6120943431638445791_n.jpg', '/photos/2/18813607_117400152110925_6120943431638445791_n.jpg', 11, 1, 2, 'Basic-PHP', 'asdf', 'Basic PHP', '2017-03-27 13:04:39', '2017-03-27 13:04:39'),
(10, '54', 'Another Product title', NULL, '5456', '6873156456', '5645645456', 'pcs', 500, 400, '/photos/2/thumbs/Smash_wine_opener20401.jpg', '/photos/2/Smash_wine_opener20401.jpg', 13, 1, 2, 'another-product-title', NULL, NULL, '2017-04-25 11:02:11', '2017-04-25 11:02:11'),
(11, '54', 'How are you Friends', '<p>dfasdf</p>', '5456', '6873156456', '5645645456', NULL, 500, NULL, '/photos/2/thumbs/Wordpress_bangla_tut57552.jpg', '/photos/2/Wordpress_bangla_tut57552.jpg', 11, 1, 2, 'how-are-you-friends', NULL, NULL, '2017-04-25 11:05:02', '2017-04-25 11:05:02'),
(12, '54', 'Welcome to bangal desh my dear friends', '<p>ads</p>', '5456', '6873156456', '5645645456', 'Kg', 500, 5000, '/photos/2/thumbs/Smash_wine_opener20401.jpg', '/photos/2/Smash_wine_opener20401.jpg', 11, 1, 2, 'welcome-to-bangaldesh-my-dear-friends', NULL, NULL, '2017-04-26 08:59:59', '2017-04-26 08:59:59'),
(13, '54', 'This is a very nice product', '<p>asf</p>', '5456', '6873156456', '5645645456', 'Kg', 500, 5000, '/photos/2/thumbs/Smash_wine_opener20401.jpg', '/photos/2/Smash_wine_opener20401.jpg', 11, 1, 2, 'hwllo', NULL, NULL, '2017-05-09 06:55:17', '2017-05-09 06:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `product__attributes`
--

CREATE TABLE `product__attributes` (
  `id` int(11) NOT NULL,
  `attributes_group_id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product__attributes`
--

INSERT INTO `product__attributes` (`id`, `attributes_group_id`, `title`, `order`) VALUES
(1, 1, 'Men', 0),
(2, 1, 'Woment', 0),
(3, 1, 'Database', 0),
(4, 2, 'Basic PHP', 0),
(5, 2, 'Charman', 0),
(6, 3, 'Camera', 0),
(7, 3, 'Battery', 0),
(8, 4, 'Display', 0),
(9, 4, 'Processor', 0),
(10, 4, 'RAM', 0),
(11, 4, 'Mother Board', 0),
(12, 4, 'Hard Disk', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product__attributes_group`
--

CREATE TABLE `product__attributes_group` (
  `id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product__attributes_group`
--

INSERT INTO `product__attributes_group` (`id`, `title`) VALUES
(1, 'HTML'),
(2, 'facebook'),
(3, 'Mobile'),
(4, 'Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `product__brand`
--

CREATE TABLE `product__brand` (
  `id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `description` mediumtext,
  `image` varchar(100) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product__brand`
--

INSERT INTO `product__brand` (`id`, `title`, `description`, `image`, `country`) VALUES
(1, 'Database', 'Database', 'uploads/brands/Database12309.jpg', 'Bangladesh'),
(2, 'HTML', 'Database', 'uploads/brands/HTML92524.jpg', 'Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `product__category`
--

CREATE TABLE `product__category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `description` mediumtext,
  `image` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product__category`
--

INSERT INTO `product__category` (`id`, `parent_id`, `title`, `description`, `image`) VALUES
(1, NULL, 'HTML', 'Database', 'uploads/categories/HTML37314.jpg'),
(2, NULL, 'Basic PHP', NULL, NULL),
(3, NULL, 'Pant', NULL, NULL),
(4, 1, 'Welcome', NULL, NULL),
(5, 1, 'Good', NULL, NULL),
(6, 2, 'Nice', NULL, NULL),
(7, 6, 'Wow', NULL, NULL),
(8, 7, 'Hi how', NULL, NULL),
(9, NULL, 'Men', NULL, NULL),
(10, NULL, 'Women', NULL, NULL),
(11, 9, 'Cloth', NULL, NULL),
(12, 9, 'Cosmetics', NULL, NULL),
(13, 11, 'Shart', NULL, NULL),
(14, 11, 'Pant', NULL, NULL),
(15, 11, 'T-Shart', NULL, NULL),
(16, 12, 'Powder', NULL, NULL),
(17, NULL, 'Baby and Kids', NULL, NULL),
(18, NULL, 'Gadgets', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product__details`
--

CREATE TABLE `product__details` (
  `id` int(11) NOT NULL,
  `specification` longtext,
  `product_details` longtext,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product__details`
--

INSERT INTO `product__details` (`id`, `specification`, `product_details`, `product_id`) VALUES
(7, NULL, '{"One":"one 1"}', 9),
(12, NULL, '{"":null}', 10),
(13, NULL, '{"":null}', 11),
(14, NULL, '{"_empty_":null,"":null}', 11),
(15, NULL, '{"_empty_":null,"":null}', 11),
(16, NULL, '{"_empty_":null,"":null}', 11),
(18, NULL, '{"asdf":"ew","sdf":"asdf"}', 12),
(19, NULL, '{"asdf":"ew","sdf":"asdf","":null}', 12),
(20, NULL, '{"asdf":"ew","sdf":"asdf","":null}', 12),
(21, NULL, '{"asdf":"ew","sdf":"asdf","":null}', 12),
(22, NULL, '{"asdf":"ew","sdf":"asdf","":null}', 12),
(23, NULL, '{"asdf":"ew","sdf":"asdf","":null}', 12),
(24, NULL, '{"asdf":"ew","sdf":"asdf","":null}', 12),
(25, NULL, '{"asdf":"ew","sdf":"asdf","":null}', 12),
(42, NULL, '{"_empty_":null,"":null}', 10),
(43, NULL, '{"_empty_":null,"":null}', 11),
(44, NULL, '{"asdf":"ew","sdf":"asdf","":null}', 12),
(49, NULL, '{"One":"one 1","":null}', 9),
(50, NULL, '{"One":"one 1"}', 9),
(51, NULL, '{"One":"one 1"}', 9),
(52, NULL, '{"One":"one 1"}', 9),
(53, NULL, '{"One":"one 1"}', 9),
(54, NULL, '{"_empty_":null,"":null}', 10);

-- --------------------------------------------------------

--
-- Table structure for table `product__discount`
--

CREATE TABLE `product__discount` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product__has__category`
--

CREATE TABLE `product__has__category` (
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product__has__category`
--

INSERT INTO `product__has__category` (`category_id`, `product_id`) VALUES
(13, 8),
(15, 8),
(14, 9),
(1, 10),
(4, 11),
(1, 12),
(2, 12),
(4, 12),
(5, 12),
(8, 12);

-- --------------------------------------------------------

--
-- Table structure for table `product__images`
--

CREATE TABLE `product__images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `thumbnail` varchar(250) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product__images`
--

INSERT INTO `product__images` (`id`, `product_id`, `thumbnail`, `image`, `sort_order`) VALUES
(81, 11, '/photos/2/image/thumbs/58d90d1771b74.png', '/photos/2/image/58d90d1771b74.png', 0),
(82, 11, '/photos/2/image/thumbs/Smash_wine_opener20401.jpg', '/photos/2/image/Smash_wine_opener20401.jpg', 1),
(83, 11, '/photos/2/image/products/thumbs/Screenshot_from_2016-12-08_17-05-12.png', '/photos/2/image/products/Screenshot_from_2016-12-08_17-05-12.png', 2),
(84, 12, '/photos/2/thumbs/Wordpress_bangla_tut57552.jpg', '/photos/2/Wordpress_bangla_tut57552.jpg', 0),
(85, 12, '/photos/2/image/thumbs/58d90d1771b74.png', '/photos/2/image/58d90d1771b74.png', 1),
(86, 12, '/photos/2/image/thumbs/58d90d229f5ff.png', '/photos/2/image/58d90d229f5ff.png', 2),
(110, 9, '/photos/2/thumbs/Wordpress_bangla_tut57552.jpg', '/photos/2/Wordpress_bangla_tut57552.jpg', 0),
(111, 9, '/photos/2/image/thumbs/58d90d1771b74.png', '/photos/2/image/58d90d1771b74.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product__products_attributes`
--

CREATE TABLE `product__products_attributes` (
  `product_id` int(11) NOT NULL,
  `attributes_id` int(11) NOT NULL,
  `value` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product__products_attributes`
--

INSERT INTO `product__products_attributes` (`product_id`, `attributes_id`, `value`) VALUES
(12, 1, '545'),
(12, 2, '54'),
(12, 3, '54sdf'),
(8, 1, '545'),
(8, 2, '545'),
(8, 3, '54');

-- --------------------------------------------------------

--
-- Table structure for table `product__promotions`
--

CREATE TABLE `product__promotions` (
  `id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receiving__addition`
--

CREATE TABLE `receiving__addition` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `type` enum('percentage','fixed') DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `nate` varchar(45) DEFAULT NULL,
  `receiving__invoice_id` int(11) NOT NULL,
  `status` enum('1','2','3') DEFAULT NULL COMMENT '1 => quatation\n2 => ordered\n3 => received'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receiving__addition`
--

INSERT INTO `receiving__addition` (`id`, `title`, `type`, `amount`, `nate`, `receiving__invoice_id`, `status`) VALUES
(1, 'Tax', 'percentage', 15, NULL, 1, NULL),
(2, 'Tax', 'percentage', 15, NULL, 2, NULL),
(3, 'Tax', 'percentage', 15, NULL, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `receiving__invoice`
--

CREATE TABLE `receiving__invoice` (
  `id` int(11) NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `challan_no` varchar(45) DEFAULT NULL,
  `note` mediumtext,
  `employees_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `status` enum('1','2','3') NOT NULL COMMENT '1 => quatation\n2 => ordered\n3 => received'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receiving__invoice`
--

INSERT INTO `receiving__invoice` (`id`, `type`, `date`, `challan_no`, `note`, `employees_id`, `users_id`, `status`) VALUES
(1, 'purchase', '2017-07-18', '456465', 's dgfsgdfs gfdg', 2, 11, '3'),
(2, 'purchase', '2017-07-19', '456465', NULL, 2, 11, '3'),
(3, 'purchase', '2017-07-22', '456465', 'sfsdf', 2, 13, '3'),
(4, 'transfer', '2017-08-23', '456465', 'zsdf', 2, 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `receiving__invoice_item`
--

CREATE TABLE `receiving__invoice_item` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `free` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `receiving__invoice_id` int(11) NOT NULL,
  `status` enum('1','2','3') DEFAULT NULL COMMENT '1 => quatation\n2 => ordered\n3 => received'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receiving__invoice_item`
--

INSERT INTO `receiving__invoice_item` (`id`, `product_id`, `quantity`, `free`, `price`, `discount`, `total`, `receiving__invoice_id`, `status`) VALUES
(1, 8, '3', 0, 1000, 0, 3000, 1, NULL),
(2, 10, '10', 0, 400, 0, 4000, 1, NULL),
(3, 13, '2', 5, 5000, 0, 10000, 1, NULL),
(4, 8, '8', 0, 1000, 0, 8000, 2, NULL),
(5, 9, '8', 0, 10000, 0, 80000, 2, NULL),
(6, 10, '5', 0, 400, 0, 2000, 3, NULL),
(7, 8, '2', 0, 1000, 0, 2000, 3, NULL),
(9, 12, '1', 0, 5000, 0, 5000, 4, NULL),
(19, 8, '1', 0, 1000, 0, 1000, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `receiving__reduction`
--

CREATE TABLE `receiving__reduction` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `type` enum('percentage','fixed') DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `note` varchar(45) DEFAULT NULL,
  `receiving__invoice_id` int(11) NOT NULL,
  `status` enum('1','2','3') DEFAULT NULL COMMENT '1 => quatation\n2 => ordered\n3 => received'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receiving__reduction`
--

INSERT INTO `receiving__reduction` (`id`, `title`, `type`, `amount`, `note`, `receiving__invoice_id`, `status`) VALUES
(1, 'Headline', 'fixed', 500, NULL, 1, NULL),
(2, 'Discount', 'percentage', 10, NULL, 2, NULL),
(3, 'Discount', 'percentage', 10, NULL, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings__additions`
--

CREATE TABLE `settings__additions` (
  `id` int(11) NOT NULL,
  `behavior` enum('addition','reduction') DEFAULT NULL,
  `coupon_number` varchar(45) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` mediumtext,
  `type` enum('percentage','fixed') DEFAULT NULL,
  `value` double DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings__additions`
--

INSERT INTO `settings__additions` (`id`, `behavior`, `coupon_number`, `title`, `description`, `type`, `value`, `start_date`, `end_date`, `status`) VALUES
(1, 'reduction', '1256', 'Tax', 'asdf', 'percentage', 15, '2017-04-25', '2017-04-28', '0'),
(3, 'addition', '4215', 'Database', 'sdfdasf', 'fixed', 50, '2017-04-12', '2017-11-29', '1'),
(4, 'reduction', '564564', 'Headline', '454sd', 'fixed', 500, '2017-04-19', '2017-08-31', '1'),
(5, 'addition', '45', 'Discount', NULL, 'percentage', 10, '2017-06-01', '2019-12-31', '1');

-- --------------------------------------------------------

--
-- Table structure for table `settings__company`
--

CREATE TABLE `settings__company` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `logo` varchar(150) DEFAULT NULL,
  `post_code` varchar(10) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `currency` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings__company`
--

INSERT INTO `settings__company` (`id`, `title`, `email`, `mobile`, `fax`, `address`, `logo`, `post_code`, `city`, `state`, `country`, `currency`) VALUES
(1, 'Atova Tech', 'mamun.atova@gmail.com', '01723682468', '34529054534', 'Lalmatia', '/photos/2/Smash_wine_opener20401.jpg', '1207', 'Dhaka', 'Dhaka', 'Bangladesh', '$');

-- --------------------------------------------------------

--
-- Table structure for table `settings__gift_card`
--

CREATE TABLE `settings__gift_card` (
  `id` int(11) NOT NULL,
  `card_number` varchar(45) DEFAULT NULL,
  `gift_cardcol` varchar(45) DEFAULT NULL,
  `value` varchar(45) DEFAULT NULL,
  `active` varchar(45) DEFAULT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings__reductions`
--

CREATE TABLE `settings__reductions` (
  `id` int(11) NOT NULL,
  `coupon_number` varchar(45) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `type` enum('percentage','fixed') NOT NULL,
  `value` double DEFAULT NULL,
  `active` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` double DEFAULT NULL,
  `sub_stock` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `product_id`, `quantity`, `sub_stock`) VALUES
(2, 8, 11, NULL),
(3, 9, 9, NULL),
(4, 12, 15, NULL),
(5, 10, 32, NULL),
(6, 13, 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock__sub`
--

CREATE TABLE `stock__sub` (
  `id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `property` varchar(45) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc__employee_salary`
--
ALTER TABLE `acc__employee_salary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payments_payment_methods1_idx` (`payment_methods_id`),
  ADD KEY `fk_payments_copy1_expense_category1_idx` (`expense_category_id`);

--
-- Indexes for table `acc__payments`
--
ALTER TABLE `acc__payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payments_users1_idx` (`recipient_id`),
  ADD KEY `fk_payments_payment_categories1_idx` (`payment_categories_id`),
  ADD KEY `fk_payments_payment_methods1_idx` (`payment_methods_id`),
  ADD KEY `fk_acc__payments_receiving__invoice1_idx` (`receiving__invoice_id`);

--
-- Indexes for table `acc__payment_categories`
--
ALTER TABLE `acc__payment_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acc__payment_methods`
--
ALTER TABLE `acc__payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acc__receipts`
--
ALTER TABLE `acc__receipts`
  ADD PRIMARY KEY (`id`,`amount`),
  ADD KEY `fk_payments_users1_idx` (`payer_id`),
  ADD KEY `fk_payments_payment_categories1_idx` (`payment_categories_id`),
  ADD KEY `fk_payments_payment_methods1_idx` (`payment_methods_id`),
  ADD KEY `fk_receipts_deliver__invoice1_idx` (`deliver__invoice_id`);

--
-- Indexes for table `bank__account`
--
ALTER TABLE `bank__account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank__deposit`
--
ALTER TABLE `bank__deposit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bank__deposit_bank__account1_idx` (`account_id`),
  ADD KEY `fk_bank__deposit_bank__transection_reason1_idx` (`transaction_reason_id`),
  ADD KEY `fk_bank__deposit_hr__employees1_idx` (`employees_id`);

--
-- Indexes for table `bank__transaction_reason`
--
ALTER TABLE `bank__transaction_reason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank__withdraw`
--
ALTER TABLE `bank__withdraw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bank__deposit_bank__account1_idx` (`account_id`),
  ADD KEY `fk_bank__withdraw_bank__transection_reason1_idx` (`transaction_reason_id`),
  ADD KEY `fk_bank__withdraw_hr__employees1_idx` (`employees_id`);

--
-- Indexes for table `deliver__addition`
--
ALTER TABLE `deliver__addition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_deliver__addition_deliver__invoice1_idx` (`deliver__invoice_id`);

--
-- Indexes for table `deliver__invoice`
--
ALTER TABLE `deliver__invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_deliver__invoice_deliver__status1_idx` (`deliver__status_id`),
  ADD KEY `fk_deliver__invoice_hr__users1_idx` (`users_id`);

--
-- Indexes for table `deliver__invoice_item`
--
ALTER TABLE `deliver__invoice_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invoice_item_product1_idx` (`product_id`),
  ADD KEY `fk_deliver__invoice_item_deliver__invoice1_idx` (`deliver__invoice_id`);

--
-- Indexes for table `deliver__reduction`
--
ALTER TABLE `deliver__reduction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_deliver__reduction_deliver__invoice1_idx` (`deliver__invoice_id`);

--
-- Indexes for table `deliver__status`
--
ALTER TABLE `deliver__status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payments_users1_idx` (`recipient_id`),
  ADD KEY `fk_payments_payment_methods1_idx` (`payment_methods_id`),
  ADD KEY `fk_payments_copy1_expense_category1_idx` (`expense_category_id`);

--
-- Indexes for table `expense__category`
--
ALTER TABLE `expense__category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr__customers`
--
ALTER TABLE `hr__customers`
  ADD UNIQUE KEY `users_id_UNIQUE` (`users_id`),
  ADD KEY `fk_customer_users1_idx` (`users_id`),
  ADD KEY `fk_customer_tier_types1_idx` (`tier_types_id`);

--
-- Indexes for table `hr__designations`
--
ALTER TABLE `hr__designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr__employees`
--
ALTER TABLE `hr__employees`
  ADD UNIQUE KEY `users_id_UNIQUE` (`users_id`),
  ADD KEY `fk_employees_designation_idx` (`designation_id`),
  ADD KEY `fk_employees_users1_idx` (`users_id`),
  ADD KEY `fk_hr__employees_hr__tier_types1_idx` (`tier_types_id`);

--
-- Indexes for table `hr__password_resets`
--
ALTER TABLE `hr__password_resets`
  ADD PRIMARY KEY (`email`),
  ADD KEY `fk_hr__password_resets_hr__users1_idx` (`users_id`);

--
-- Indexes for table `hr__shipping_address`
--
ALTER TABLE `hr__shipping_address`
  ADD UNIQUE KEY `users_id_UNIQUE` (`users_id`),
  ADD KEY `fk_hr__shipping_address_hr__customers1_idx` (`users_id`);

--
-- Indexes for table `hr__suppliers`
--
ALTER TABLE `hr__suppliers`
  ADD UNIQUE KEY `users_id_UNIQUE` (`users_id`),
  ADD KEY `fk_customer_users1_idx` (`users_id`),
  ADD KEY `fk_customer_tier_types1_idx` (`tier_types_id`);

--
-- Indexes for table `hr__tier_types`
--
ALTER TABLE `hr__tier_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr__users`
--
ALTER TABLE `hr__users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invest__investors`
--
ALTER TABLE `invest__investors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invest__invests`
--
ALTER TABLE `invest__invests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invest__invests_invest__investors1_idx` (`investors_id`),
  ADD KEY `fk_invest__invests_hr__employees1_idx` (`employee_id`),
  ADD KEY `fk_invest__invests_acc__payment_methods1_idx` (`payment_methods_id`);

--
-- Indexes for table `invest__withdraw`
--
ALTER TABLE `invest__withdraw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invest__withdraw_invest__investors1_idx` (`investors_id`),
  ADD KEY `fk_invest__withdraw_hr__employees1_idx` (`employee_id`),
  ADD KEY `fk_invest__withdraw_acc__payment_methods1_idx` (`payment_methods_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_brand1_idx` (`brand_id`),
  ADD KEY `fk_product_hr__users1_idx` (`users_id`);

--
-- Indexes for table `product__attributes`
--
ALTER TABLE `product__attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product__attributes_product__attributes_group1_idx` (`attributes_group_id`);

--
-- Indexes for table `product__attributes_group`
--
ALTER TABLE `product__attributes_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product__brand`
--
ALTER TABLE `product__brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product__category`
--
ALTER TABLE `product__category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_category1_idx` (`parent_id`);

--
-- Indexes for table `product__details`
--
ALTER TABLE `product__details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_details_product1_idx` (`product_id`);

--
-- Indexes for table `product__discount`
--
ALTER TABLE `product__discount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_promotions_product1_idx` (`product_id`);

--
-- Indexes for table `product__has__category`
--
ALTER TABLE `product__has__category`
  ADD PRIMARY KEY (`category_id`,`product_id`),
  ADD KEY `fk_category_has_product_product1_idx` (`product_id`),
  ADD KEY `fk_category_has_product_category1_idx` (`category_id`);

--
-- Indexes for table `product__images`
--
ALTER TABLE `product__images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_images_product1_idx` (`product_id`);

--
-- Indexes for table `product__products_attributes`
--
ALTER TABLE `product__products_attributes`
  ADD KEY `fk_product__products_attributes_product1_idx` (`product_id`),
  ADD KEY `fk_product__products_attributes_product__attributes1_idx` (`attributes_id`);

--
-- Indexes for table `product__promotions`
--
ALTER TABLE `product__promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_promotions_product1_idx` (`product_id`);

--
-- Indexes for table `receiving__addition`
--
ALTER TABLE `receiving__addition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_receiving__addition_receiving__invoice1_idx` (`receiving__invoice_id`);

--
-- Indexes for table `receiving__invoice`
--
ALTER TABLE `receiving__invoice`
  ADD PRIMARY KEY (`id`,`status`),
  ADD KEY `fk_receiving__invoice_hr__users1_idx` (`users_id`);

--
-- Indexes for table `receiving__invoice_item`
--
ALTER TABLE `receiving__invoice_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invoice_item_product1_idx` (`product_id`),
  ADD KEY `fk_receiving__invoice_item_receiving__invoice1_idx` (`receiving__invoice_id`);

--
-- Indexes for table `receiving__reduction`
--
ALTER TABLE `receiving__reduction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_receiving__reduction_receiving__invoice1_idx` (`receiving__invoice_id`);

--
-- Indexes for table `settings__additions`
--
ALTER TABLE `settings__additions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupon_number` (`coupon_number`);

--
-- Indexes for table `settings__company`
--
ALTER TABLE `settings__company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings__gift_card`
--
ALTER TABLE `settings__gift_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings__reductions`
--
ALTER TABLE `settings__reductions`
  ADD PRIMARY KEY (`id`,`type`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stock_product1_idx` (`product_id`);

--
-- Indexes for table `stock__sub`
--
ALTER TABLE `stock__sub`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sub_stock_stock1_idx` (`stock_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc__employee_salary`
--
ALTER TABLE `acc__employee_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `acc__payments`
--
ALTER TABLE `acc__payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `acc__payment_categories`
--
ALTER TABLE `acc__payment_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `acc__payment_methods`
--
ALTER TABLE `acc__payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `acc__receipts`
--
ALTER TABLE `acc__receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bank__account`
--
ALTER TABLE `bank__account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bank__deposit`
--
ALTER TABLE `bank__deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bank__transaction_reason`
--
ALTER TABLE `bank__transaction_reason`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bank__withdraw`
--
ALTER TABLE `bank__withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `deliver__addition`
--
ALTER TABLE `deliver__addition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `deliver__invoice`
--
ALTER TABLE `deliver__invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `deliver__invoice_item`
--
ALTER TABLE `deliver__invoice_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `deliver__reduction`
--
ALTER TABLE `deliver__reduction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `deliver__status`
--
ALTER TABLE `deliver__status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `expense__category`
--
ALTER TABLE `expense__category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hr__designations`
--
ALTER TABLE `hr__designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hr__tier_types`
--
ALTER TABLE `hr__tier_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `hr__users`
--
ALTER TABLE `hr__users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `invest__investors`
--
ALTER TABLE `invest__investors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `invest__invests`
--
ALTER TABLE `invest__invests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `invest__withdraw`
--
ALTER TABLE `invest__withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `product__attributes`
--
ALTER TABLE `product__attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `product__attributes_group`
--
ALTER TABLE `product__attributes_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product__brand`
--
ALTER TABLE `product__brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product__category`
--
ALTER TABLE `product__category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `product__details`
--
ALTER TABLE `product__details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `product__discount`
--
ALTER TABLE `product__discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product__images`
--
ALTER TABLE `product__images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `product__promotions`
--
ALTER TABLE `product__promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `receiving__addition`
--
ALTER TABLE `receiving__addition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `receiving__invoice`
--
ALTER TABLE `receiving__invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `receiving__invoice_item`
--
ALTER TABLE `receiving__invoice_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `receiving__reduction`
--
ALTER TABLE `receiving__reduction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `settings__additions`
--
ALTER TABLE `settings__additions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `settings__company`
--
ALTER TABLE `settings__company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `settings__reductions`
--
ALTER TABLE `settings__reductions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `stock__sub`
--
ALTER TABLE `stock__sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `acc__employee_salary`
--
ALTER TABLE `acc__employee_salary`
  ADD CONSTRAINT `fk_payments_copy1_expense_category10` FOREIGN KEY (`expense_category_id`) REFERENCES `expense__category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payments_payment_methods110` FOREIGN KEY (`payment_methods_id`) REFERENCES `acc__payment_methods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `acc__payments`
--
ALTER TABLE `acc__payments`
  ADD CONSTRAINT `fk_acc__payments_receiving__invoice1` FOREIGN KEY (`receiving__invoice_id`) REFERENCES `receiving__invoice` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payments_payment_categories1` FOREIGN KEY (`payment_categories_id`) REFERENCES `acc__payment_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payments_payment_methods1` FOREIGN KEY (`payment_methods_id`) REFERENCES `acc__payment_methods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payments_users1` FOREIGN KEY (`recipient_id`) REFERENCES `hr__users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `acc__receipts`
--
ALTER TABLE `acc__receipts`
  ADD CONSTRAINT `fk_payments_payment_categories10` FOREIGN KEY (`payment_categories_id`) REFERENCES `acc__payment_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payments_payment_methods10` FOREIGN KEY (`payment_methods_id`) REFERENCES `acc__payment_methods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payments_users10` FOREIGN KEY (`payer_id`) REFERENCES `hr__users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_receipts_deliver__invoice1` FOREIGN KEY (`deliver__invoice_id`) REFERENCES `deliver__invoice` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bank__deposit`
--
ALTER TABLE `bank__deposit`
  ADD CONSTRAINT `fk_bank__deposit_bank__account1` FOREIGN KEY (`account_id`) REFERENCES `bank__account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bank__deposit_bank__transection_reason1` FOREIGN KEY (`transaction_reason_id`) REFERENCES `bank__transaction_reason` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bank__deposit_hr__employees1` FOREIGN KEY (`employees_id`) REFERENCES `hr__employees` (`users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bank__withdraw`
--
ALTER TABLE `bank__withdraw`
  ADD CONSTRAINT `fk_bank__deposit_bank__account10` FOREIGN KEY (`account_id`) REFERENCES `bank__account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bank__withdraw_bank__transection_reason1` FOREIGN KEY (`transaction_reason_id`) REFERENCES `bank__transaction_reason` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bank__withdraw_hr__employees1` FOREIGN KEY (`employees_id`) REFERENCES `hr__employees` (`users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `deliver__addition`
--
ALTER TABLE `deliver__addition`
  ADD CONSTRAINT `fk_deliver__addition_deliver__invoice1` FOREIGN KEY (`deliver__invoice_id`) REFERENCES `deliver__invoice` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `deliver__invoice`
--
ALTER TABLE `deliver__invoice`
  ADD CONSTRAINT `fk_deliver__invoice_deliver__status1` FOREIGN KEY (`deliver__status_id`) REFERENCES `deliver__status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_deliver__invoice_hr__users1` FOREIGN KEY (`users_id`) REFERENCES `hr__users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `deliver__invoice_item`
--
ALTER TABLE `deliver__invoice_item`
  ADD CONSTRAINT `fk_deliver__invoice_item_deliver__invoice1` FOREIGN KEY (`deliver__invoice_id`) REFERENCES `deliver__invoice` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_invoice_item_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `deliver__reduction`
--
ALTER TABLE `deliver__reduction`
  ADD CONSTRAINT `fk_deliver__reduction_deliver__invoice1` FOREIGN KEY (`deliver__invoice_id`) REFERENCES `deliver__invoice` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `fk_payments_copy1_expense_category1` FOREIGN KEY (`expense_category_id`) REFERENCES `expense__category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payments_payment_methods11` FOREIGN KEY (`payment_methods_id`) REFERENCES `acc__payment_methods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payments_users11` FOREIGN KEY (`recipient_id`) REFERENCES `hr__users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hr__customers`
--
ALTER TABLE `hr__customers`
  ADD CONSTRAINT `fk_customer_tier_types1` FOREIGN KEY (`tier_types_id`) REFERENCES `hr__tier_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_customer_users1` FOREIGN KEY (`users_id`) REFERENCES `hr__users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hr__employees`
--
ALTER TABLE `hr__employees`
  ADD CONSTRAINT `fk_employees_designation` FOREIGN KEY (`designation_id`) REFERENCES `hr__designations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employees_users1` FOREIGN KEY (`users_id`) REFERENCES `hr__users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hr__employees_hr__tier_types1` FOREIGN KEY (`tier_types_id`) REFERENCES `hr__tier_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hr__password_resets`
--
ALTER TABLE `hr__password_resets`
  ADD CONSTRAINT `fk_hr__password_resets_hr__users1` FOREIGN KEY (`users_id`) REFERENCES `hr__users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hr__shipping_address`
--
ALTER TABLE `hr__shipping_address`
  ADD CONSTRAINT `fk_hr__shipping_address_hr__customers1` FOREIGN KEY (`users_id`) REFERENCES `hr__customers` (`users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hr__suppliers`
--
ALTER TABLE `hr__suppliers`
  ADD CONSTRAINT `fk_customer_tier_types10` FOREIGN KEY (`tier_types_id`) REFERENCES `hr__tier_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_customer_users10` FOREIGN KEY (`users_id`) REFERENCES `hr__users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `invest__invests`
--
ALTER TABLE `invest__invests`
  ADD CONSTRAINT `fk_invest__invests_acc__payment_methods1` FOREIGN KEY (`payment_methods_id`) REFERENCES `acc__payment_methods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_invest__invests_hr__employees1` FOREIGN KEY (`employee_id`) REFERENCES `hr__employees` (`users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_invest__invests_invest__investors1` FOREIGN KEY (`investors_id`) REFERENCES `invest__investors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `invest__withdraw`
--
ALTER TABLE `invest__withdraw`
  ADD CONSTRAINT `fk_invest__withdraw_acc__payment_methods1` FOREIGN KEY (`payment_methods_id`) REFERENCES `acc__payment_methods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_invest__withdraw_hr__employees1` FOREIGN KEY (`employee_id`) REFERENCES `hr__employees` (`users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_invest__withdraw_invest__investors1` FOREIGN KEY (`investors_id`) REFERENCES `invest__investors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_brand1` FOREIGN KEY (`brand_id`) REFERENCES `product__brand` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_hr__users1` FOREIGN KEY (`users_id`) REFERENCES `hr__users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product__attributes`
--
ALTER TABLE `product__attributes`
  ADD CONSTRAINT `fk_product__attributes_product__attributes_group1` FOREIGN KEY (`attributes_group_id`) REFERENCES `product__attributes_group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product__category`
--
ALTER TABLE `product__category`
  ADD CONSTRAINT `fk_category_category1` FOREIGN KEY (`parent_id`) REFERENCES `product__category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product__details`
--
ALTER TABLE `product__details`
  ADD CONSTRAINT `fk_product_details_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product__discount`
--
ALTER TABLE `product__discount`
  ADD CONSTRAINT `fk_promotions_product10` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product__has__category`
--
ALTER TABLE `product__has__category`
  ADD CONSTRAINT `fk_category_has_product_category1` FOREIGN KEY (`category_id`) REFERENCES `product__category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_category_has_product_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product__images`
--
ALTER TABLE `product__images`
  ADD CONSTRAINT `fk_product_images_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product__promotions`
--
ALTER TABLE `product__promotions`
  ADD CONSTRAINT `fk_promotions_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `receiving__addition`
--
ALTER TABLE `receiving__addition`
  ADD CONSTRAINT `fk_receiving__addition_receiving__invoice1` FOREIGN KEY (`receiving__invoice_id`) REFERENCES `receiving__invoice` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `receiving__invoice`
--
ALTER TABLE `receiving__invoice`
  ADD CONSTRAINT `fk_receiving__invoice_hr__users1` FOREIGN KEY (`users_id`) REFERENCES `hr__users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `receiving__invoice_item`
--
ALTER TABLE `receiving__invoice_item`
  ADD CONSTRAINT `fk_invoice_item_product10` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_receiving__invoice_item_receiving__invoice1` FOREIGN KEY (`receiving__invoice_id`) REFERENCES `receiving__invoice` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `receiving__reduction`
--
ALTER TABLE `receiving__reduction`
  ADD CONSTRAINT `fk_receiving__reduction_receiving__invoice1` FOREIGN KEY (`receiving__invoice_id`) REFERENCES `receiving__invoice` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_stock_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stock__sub`
--
ALTER TABLE `stock__sub`
  ADD CONSTRAINT `fk_sub_stock_stock1` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
