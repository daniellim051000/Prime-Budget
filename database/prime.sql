-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 06, 2020 at 06:07 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prime`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_name` varchar(50) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `account_no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`account_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `account_name`, `total_amount`, `account_no`, `user_id`) VALUES
(1, 'Maybank', 7760, 1, 2),
(2, 'citibank', 800, 2, 2),
(3, 'ambank', 9000, 3, 2),
(4, 'publicbank', 0, 4, 2),
(5, 'Account 1', 0, 1, 1),
(6, 'Account 2', 0, 2, 1),
(7, 'Account 3', 0, 3, 1),
(8, 'Account 4', 0, 4, 1),
(9, 'Wallet', 113, 1, 4),
(10, 'Account 2', 0, 2, 4),
(11, 'Account 3', 0, 3, 4),
(12, 'Account 4', 0, 4, 4),
(13, 'Account 1', 0, 1, 5),
(14, 'Account 2', 0, 2, 5),
(15, 'Account 3', 0, 3, 5),
(16, 'Account 4', 0, 4, 5),
(17, 'Account 1', 0, 1, 3),
(18, 'Account 2', 0, 2, 3),
(19, 'Account 3', 0, 3, 3),
(20, 'Account 4', 0, 4, 3),
(21, 'Maybank', 1900, 1, 6),
(22, 'Account 2', 0, 2, 6),
(23, 'Account 3', 0, 3, 6),
(24, 'Account 4', 0, 4, 6),
(25, 'Account 1', 0, 1, 7),
(26, 'Account 2', 0, 2, 7),
(27, 'Account 3', 0, 3, 7),
(28, 'Account 4', 0, 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `customer_support`
--

DROP TABLE IF EXISTS `customer_support`;
CREATE TABLE IF NOT EXISTS `customer_support` (
  `cus_sup_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `respond` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  PRIMARY KEY (`cus_sup_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_support`
--

INSERT INTO `customer_support` (`cus_sup_id`, `title`, `description`, `respond`, `status`, `user_id`) VALUES
(9, 'button', 'not responding', '', 'responded', 2),
(10, 'help', 'problem', 'testing', 'responded', 2),
(11, 'screen', 'blue screen', NULL, 'pending', 2),
(12, 'laptop spoil', 'buy me new one pls', NULL, 'pending', 2),
(13, 'amount', 'not showing', NULL, 'pending', 2),
(16, 'change password', 'dont know how', 'top right corner to chg password.', 'responded', 6);

-- --------------------------------------------------------

--
-- Table structure for table `debt`
--

DROP TABLE IF EXISTS `debt`;
CREATE TABLE IF NOT EXISTS `debt` (
  `debt_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `debt_name` varchar(200) NOT NULL,
  `cash_OutIn` int(200) DEFAULT NULL,
  `return_back` int(200) DEFAULT NULL,
  `remark` varchar(200) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`debt_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debt`
--

INSERT INTO `debt` (`debt_id`, `type`, `debt_name`, `cash_OutIn`, `return_back`, `remark`, `status`, `user_id`) VALUES
(3, 'Borrow', 'birthday chocolate cake', 22, 24, 'lend to friend', 'inactive', 2),
(4, 'Borrow', 'test', 5, 6, '', 'inactive', 2),
(5, 'Borrow', 'dd', 100, 5, 'house rent for friend', 'active', 2),
(6, 'Lent', 'for friend', 500, 100, 'lend from friend ', 'active', 2),
(7, 'Lent', 'for friend', 80, 0, 'parent borrow', 'active', 2),
(8, 'Lent', 'Chui Yee', 1000, 1000, '', 'inactive', 4),
(9, 'Lent', 'Chui Yee', 1000, 1450, '', 'inactive', 4),
(10, 'Borrow', 'to someone', 1000, 100, '', 'active', 4),
(11, 'Lent', 'Chui Yee', 500, 400, 'For fun', 'active', 4),
(13, 'Borrow', 'buy car', 100000, 1000, '', 'active', 6),
(14, 'Lent', 'for food', 20, 0, '', 'active', 6);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `rating` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`feedback_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `rating`, `description`, `user_id`) VALUES
(1, '5', 'very good', 6);

-- --------------------------------------------------------

--
-- Table structure for table `goal`
--

DROP TABLE IF EXISTS `goal`;
CREATE TABLE IF NOT EXISTS `goal` (
  `goal_id` int(11) NOT NULL AUTO_INCREMENT,
  `goal_name` varchar(200) NOT NULL,
  `amount_needed` int(11) DEFAULT NULL,
  `amount_hold` int(11) DEFAULT NULL,
  `remark` varchar(200) NOT NULL,
  `status` varchar(200) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`goal_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `goal`
--

INSERT INTO `goal` (`goal_id`, `goal_name`, `amount_needed`, `amount_hold`, `remark`, `status`, `user_id`) VALUES
(14, 'buy car', 250000, 1060, 'for 5 years', 'active', 2),
(15, 'Travel', 2000, 410, '', 'active', 2),
(17, 'birthday cake', 50, 50, 'for friend', 'inactive', 2),
(18, 'buy bags', 255, 255, 'before 4 April', 'inactive', 2),
(19, 'buy house', 505800, 5000, '10 years', 'active', 2),
(20, 'buy bag', 200, 40, '', 'active', 2),
(21, 'traveling', 500, 100, 'Redang', 'active', 2),
(22, 'Buy chocolate cake', 255, 100, '20 april for to get it', 'active', 2),
(23, 'buy bag', 200, 100, '', 'active', 2),
(24, 'buy bag', 50, 10, '', 'active', 2),
(25, 'buy bag', 50, 0, '', 'active', 2),
(26, 'buy bag', 200, NULL, 'present for own', 'active', 2),
(27, 'birthday chocolate cake', 56, NULL, '', 'active', 2),
(28, 'birthday chocolate cake', 56, NULL, '', 'active', 2),
(29, 'birthday chocolate cake', 56, NULL, '', 'active', 2),
(30, 'for friend', 10, NULL, '', 'active', 2),
(34, 'buy bag', 20, 0, '', 'active', 2),
(35, 'buy bag', 50, 0, '', 'active', 2),
(37, 'tes', 1000, 0, '', 'active', 2),
(38, 'twrew', 1000, 100, '', 'active', 2),
(39, 'twrew', 1000, 100, '', 'active', 2),
(40, 'p', 50, 0, '', 'active', 2),
(41, 'for friend', 255, 0, '', 'active', 2),
(42, 'for friend', 70, 0, '', 'active', 2),
(43, 'for friend', 70, 0, '', 'active', 2),
(44, 'for friend', 70, 0, '', 'active', 2),
(45, 'd', 50, 0, '', 'active', 2),
(46, 'd', 50, 0, '', 'active', 2),
(47, 'd', 50, 0, '', 'active', 2),
(48, 'k', 50, 0, '', 'active', 2),
(49, 'k', 50, 0, '', 'active', 2),
(50, 'buy bag', 50, 0, '', 'active', 2),
(51, 'for friend', 200, 0, '', 'active', 2),
(52, 'for friend', 200, 0, '', 'active', 2),
(53, 'buy bag', 200, 0, '', 'active', 2),
(54, 'buy bag', 50, 0, '', 'active', 2),
(55, 'buy bags', 250, 100, '', 'active', 2),
(56, '12345', 1000, 0, '', 'active', 2),
(57, '12345', 1000, 75, '', 'active', 2),
(58, 'for friend', 50, 0, '', 'active', 2),
(59, 'for friend', 33, 33, '', 'inactive', 2),
(60, 'gg', 50, 50, '', 'inactive', 2),
(61, 'buy bag', 200, 0, '', 'active', 2),
(62, 'Japan Trip', 5000, 5000, '', 'inactive', 4),
(63, 'PS5', 2500, 500, '', 'active', 4),
(66, 'buy car', 100000, 100010, '', 'inactive', 6),
(68, 'buy food', 233, 100, '', 'active', 6);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `category` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `description` varchar(20) NOT NULL,
  `account_id` int(11) NOT NULL,
  PRIMARY KEY (`record_id`),
  KEY `account_id` (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`record_id`, `type`, `date`, `category`, `amount`, `description`, `account_id`) VALUES
(2, 'income', '2020-01-20', 'Shopping', 200, 'problem', 1),
(3, 'expense', '2020-01-20', 'Shopping', 100, 'problem', 1),
(4, 'expense', '2020-01-20', 'Shopping', 200, 'problem', 1),
(5, 'income', '2020-01-20', 'Shopping', 20000, 'problem', 1),
(7, 'income', '2020-01-21', 'Shopping', 400, 'problem', 1),
(8, 'expense', '2020-01-16', 'Shopping', 1000, 'problem', 1),
(9, 'expense', '2020-01-16', 'Shopping', 1000, 'problem', 1),
(12, 'expense', '2020-02-01', 'Entertainment', 200, 'watch movie', 2),
(17, 'income', '2020-01-20', 'Food', 16000, 'hghg', 1),
(18, 'expense', '2020-02-05', 'Food', 1000, 'KFC', 1),
(19, 'expense', '2020-03-03', 'Shopping', 2000, 'shirt', 2),
(21, 'income', '2020-01-26', 'Income', 2000, 'Investment', 1),
(22, 'income', '2020-01-26', 'Income', 2000, 'Payroll', 1),
(23, 'expense', '2020-02-01', 'Food', 2000, 'japanese food', 3),
(24, 'expense', '2020-02-01', 'Food', 1000, '12345', 2),
(25, 'expense', '2020-02-01', 'Entertainment', 3000, 'watch movie', 4),
(26, 'Income', '2020-02-01', 'Income', 10000, 'payroll', 3),
(27, 'expense', '2020-02-01', 'Housing', 200, 'Rental', 1),
(28, 'income', '2020-02-02', 'Income', 1000, '', 1),
(29, 'expense', '2020-02-02', 'Food', 200, '', 1),
(30, 'expense', '2020-03-01', 'Food', 100, '', 1),
(31, 'expense', '2020-02-02', 'Transportation', 50, 'somthing', 1),
(38, 'income', '2020-02-03', 'Income', 123, '', 9),
(39, 'expense', '2020-02-03', 'Food', 0, 'testing', 9),
(40, 'expense', '2020-02-04', 'Food', 10, 'SBT', 9),
(41, 'income', '2020-02-05', 'Income', 0, '', 13),
(43, 'income', '2020-02-05', 'Income', 0, '', 21),
(46, 'income', '2020-02-05', 'Income', 1000, 'income', 21),
(47, 'income', '2020-03-11', 'Food', 3000, 'income', 21),
(48, 'expense', '2020-04-08', 'Transportation', 2000, 'car', 21),
(49, 'expense', '2020-02-12', 'Shopping', 100, '', 21);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `age`, `gender`, `email`, `phone_no`, `status`, `username`, `password`, `usertype`) VALUES
(1, 'Daniel', 19, 'male', 'daniellim0510@gmail.com', '0129532139', 'active', 'daniel', '202cb962ac59075b964b07152d234b70', 'admin'),
(2, 'Chong Chui Yee', 19, 'female', 'ccy030300@gmail.com', '0122955321', 'active', 'chuiyee', '202cb962ac59075b964b07152d234b70', 'user'),
(3, 'kelvin', 19, 'male', 'kelvinliewyaocong00@gmail.com', '0123456789', 'active', 'kel', '202cb962ac59075b964b07152d234b70', 'user'),
(4, 'Daniel Lim', 19, 'male', 'daniellim0510@smktbm.edu.my', '0129532139', 'active', 'daniellim0510', '202cb962ac59075b964b07152d234b70', 'user'),
(5, 'Denzel', 18, 'male', 'denzelim02@gmail.com', '012234567', 'inactive', 'denzelim02', '202cb962ac59075b964b07152d234b70', 'user'),
(6, 'Daniel Lim Zheng Yu', 20, 'male', 'tp051131@mail.apu.edu.my', '0129532139', 'inactive', 'daniellim', 'ae2b1fca515949e5d54fb22b8ed95575', 'user'),
(7, 'Daniel Lim Zheng Yu', 19, 'male', 'tp050848@mail.apu.edu.my', '0125436543', 'active', 'danielim', '202cb962ac59075b964b07152d234b70', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

DROP TABLE IF EXISTS `verification`;
CREATE TABLE IF NOT EXISTS `verification` (
  `verino` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `code` varchar(50) NOT NULL,
  PRIMARY KEY (`verino`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`verino`, `email`, `code`) VALUES
(20, 'ccy030300@gmail.com', 'vazMOm'),
(18, 'kelvinliewyaocong00@gmail.com', 'iDadhc'),
(23, 'daniellim0510@gmail.com', 'fQZjF3'),
(22, 'daniellim0510@smktbm.edu.my', 'TJNSzx'),
(24, 'tp051131@mail.apu.edu.my', '5wBUek');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `customer_support`
--
ALTER TABLE `customer_support`
  ADD CONSTRAINT `customer_support_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `debt`
--
ALTER TABLE `debt`
  ADD CONSTRAINT `debt_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `goal`
--
ALTER TABLE `goal`
  ADD CONSTRAINT `goal_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
