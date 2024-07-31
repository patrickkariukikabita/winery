-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 22, 2023 at 03:55 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `winery`
--
CREATE DATABASE IF NOT EXISTS winery;
-- --------------------------------------------------------

--
-- Table structure for table `Bills`
--

CREATE TABLE `Bills` (
  `BillID` int(50) NOT NULL,
  `OrderID` int(50) NOT NULL,
  `Total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Bills`
--

INSERT INTO `Bills` (`BillID`, `OrderID`, `Total`) VALUES
(1, 11, 12320),
(2, 12, 1800),
(3, 13, 1120),
(4, 14, 12320),
(5, 15, 12320),
(6, 16, 6160),
(7, 17, 42528),
(8, 18, 64272),
(9, 19, 6470),
(10, 20, 1092),
(11, 21, 7590),
(12, 22, 1638),
(13, 23, 1092),
(14, 24, 18480),
(15, 25, 116952),
(16, 26, 116952),
(17, 27, 27821),
(18, 28, 117832),
(19, 29, 10712),
(20, 30, 121212),
(21, 31, 2440),
(22, 32, 19040),
(23, 33, 1120),
(24, 34, 647),
(25, 35, 1120),
(26, 36, 1941),
(27, 37, 6160),
(28, 38, 1120),
(29, 39, 647),
(30, 40, 12320),
(31, 41, 12012),
(32, 42, 5176),
(33, 44, 11418);

-- --------------------------------------------------------

--
-- Table structure for table `Customers`
--

CREATE TABLE `Customers` (
  `CustomerID` int(50) NOT NULL,
  `CustomerName` varchar(30) NOT NULL,
  `CustomerAddress` varchar(30) NOT NULL,
  `CustomerContact` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Customers`
--

INSERT INTO `Customers` (`CustomerID`, `CustomerName`, `CustomerAddress`, `CustomerContact`, `Password`) VALUES
(1, 'eric Marshall', '10300-DC', 'eric@gmail.com', 'b59c67bf196a4758191e42f76670ceba'),
(2, 'julia Welsy', '108-377 NY', 'julia@gmail.com', 'b59c67bf196a4758191e42f76670ceba'),
(3, 'Ali Rajeet', '132 RD strt', 'abc@gmail.com', 'b59c67bf196a4758191e42f76670ceba');

-- --------------------------------------------------------

--
-- Table structure for table `Employees`
--

CREATE TABLE `Employees` (
  `EmployeeID` int(20) NOT NULL,
  `EmployeeName` varchar(50) NOT NULL,
  `EmployeeContact` varchar(50) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Employees`
--

INSERT INTO `Employees` (`EmployeeID`, `EmployeeName`, `EmployeeContact`, `Designation`, `Password`) VALUES
(2, 'light.inc', 'light@gmail.com', 'Bursar', 'b59c67bf196a4758191e42f76670ceba'),
(4, 'Rajeshi K', 'raj@gmail.com', 'Cashier', 'b59c67bf196a4758191e42f76670ceba'),
(5, 'Mackinnon Bundi', 'bundi@gmail.com', 'Supplier', 'b59c67bf196a4758191e42f76670ceba');

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `OrderID` int(50) NOT NULL,
  `CustomerID` int(50) NOT NULL,
  `TransactionCode` varchar(150) DEFAULT NULL,
  `ProductID` int(50) NOT NULL,
  `AmountOrdered` int(10) NOT NULL,
  `OrderStatus` varchar(20) NOT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`OrderID`, `CustomerID`, `TransactionCode`, `ProductID`, `AmountOrdered`, `OrderStatus`, `OrderDate`) VALUES
(21, 2, '454545iyt', 6, 22, 'processed', '2022-12-05 10:16:42'),
(29, 1, NULL, 4, 2, 'unpocessed', '2022-12-06 00:06:57'),
(37, 3, 'RWE54REs', 1, 11, 'processed', '2022-12-06 18:48:02'),
(39, 3, 'RWe435FD', 3, 1, 'processed', '2022-12-06 18:48:07'),
(40, 3, 'TYTYTFG', 1, 22, 'processed', '2022-12-06 18:49:13'),
(42, 3, NULL, 3, 8, 'unpocessed', '2022-12-07 22:04:04'),
(43, 3, NULL, 7, 33433433, 'unpocessed', '2022-12-07 22:04:16'),
(44, 3, NULL, 7, 33, 'unpocessed', '2022-12-07 22:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `ProductID` int(50) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `ProductPrice` int(50) NOT NULL,
  `Quantity` int(50) NOT NULL,
  `SupplierID` int(50) NOT NULL,
  `image` varchar(50) DEFAULT 'noimage.jpg',
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`ProductID`, `ProductName`, `ProductPrice`, `Quantity`, `SupplierID`, `image`, `description`) VALUES
(1, 'Jameson', 100, 22, 3, 'wine.638f8f4e1b859.jpeg', 'Tastes better than looks'),
(2, 'Jameson', 560, 22, 1, 'wine.638e004d7a55a.jpeg', 'Sweet and smooth'),
(3, 'four cousins', 647, 32, 1, 'four cousins.jpeg', 'Sweet Red Wine'),
(4, 'Chardonnay', 5356, 234, 2, 'Chardonnay.jpg', 'White Wine'),
(5, 'Garnacha ', 546, 54, 2, 'Garnacha.jpg', 'Sweet Red Wine'),
(6, 'California Pinot Gris 2019', 345, 221, 1, 'California Pinot Gris 2019.png', 'California Pinot Gris 2019'),
(7, 'Founders\' Estate Pinot Noir', 346, 323, 2, 'pinot.jpg', 'Founders\' Estate Pinot Noir'),
(8, 'glenfiddich', 233, 32, 2, 'wine.638c605a6207e.jpeg', 'glenfiddich'),
(9, 'Penfolds', 122, 545, 1, 'wine.638c62931e83b.jpeg', 'Penfolds Wine'),
(10, 'Chrome', 900, 223, 1, 'wine.638c63b94e530.jpg', 'Dry Chrome Gin'),
(11, 'Some new Wine', 54, 22, 3, 'wine.638f8f9188995.jpg', 'red wine'),
(12, 'wine 2', 23, 22, 3, 'wine.63910e2387c3b.jpeg', '222dffghtjujj');

-- --------------------------------------------------------

--
-- Table structure for table `Suppliers`
--

CREATE TABLE `Suppliers` (
  `SupplierID` int(50) NOT NULL,
  `SupplierName` varchar(50) NOT NULL,
  `SupplierLocation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Suppliers`
--

INSERT INTO `Suppliers` (`SupplierID`, `SupplierName`, `SupplierLocation`) VALUES
(2, 'Fourth Street Supplier', '2223-98 NY '),
(3, 'Marcos wines', 'resTr strt 34'),
(4, 'Better Wine Supplier', '54-65 NY');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Bills`
--
ALTER TABLE `Bills`
  ADD PRIMARY KEY (`BillID`);

--
-- Indexes for table `Customers`
--
ALTER TABLE `Customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `Employees`
--
ALTER TABLE `Employees`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `Suppliers`
--
ALTER TABLE `Suppliers`
  ADD PRIMARY KEY (`SupplierID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Bills`
--
ALTER TABLE `Bills`
  MODIFY `BillID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `Customers`
--
ALTER TABLE `Customers`
  MODIFY `CustomerID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Employees`
--
ALTER TABLE `Employees`
  MODIFY `EmployeeID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `OrderID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `ProductID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Suppliers`
--
ALTER TABLE `Suppliers`
  MODIFY `SupplierID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
