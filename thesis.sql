-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 28, 2014 at 08:31 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thesis`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(100) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `address` varchar(150) default NULL,
  `contact` varchar(255) default NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `name`, `address`, `contact`, `username`, `password`, `type`) VALUES
(35, 'Ken Steven G. Olimba', 'Culaba, Biliran', '09107625742', 'admin', 'admin', 'Administrator'),
(49, 'Jerome Enage', 'Brgy. Sta. Fe Leyte', '3424242424', 'jce', 'admin1', 'Supplier'),
(50, 'Raniel S. Abejo', 'Brgy. Canticom Calbiga Eastern Samar', '09363493834', 'ranash', 'run', 'Employee'),
(51, 'Raniel Abejo', 'Brgy. Canticum Calbiga Samar', '09107625742', 'runash', 'runash', 'Supplier'),
(52, 'Klyde Almero', 'San Jose Tacloban City', '0910231322', 'klyde', 'klyde', 'Supplier'),
(53, 'Ken Steven G. Olimba', 'Brgy. Marvel Culaba, Biliran ', '09107625742', 'swaxx', 'swaxx', 'Supplier'),
(54, 'Jerome S. Enage', 'Sta. Fe Leyte', '0903873284', 'jce', 'jce', 'Supplier'),
(55, 'qwerty', 'qwerty', '123', 'qwerty', 'qwerty', 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `adminproduct`
--

CREATE TABLE `adminproduct` (
  `id` int(155) NOT NULL auto_increment,
  `sid` int(155) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `status` varchar(150) NOT NULL,
  `category` varchar(150) NOT NULL,
  `pname` varchar(150) NOT NULL,
  `detail` varchar(150) NOT NULL,
  `price` int(100) NOT NULL,
  `srp` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(150) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `adminproduct`
--

INSERT INTO `adminproduct` (`id`, `sid`, `sname`, `status`, `category`, `pname`, `detail`, `price`, `srp`, `quantity`, `total`, `date`, `image`) VALUES
(68, 66, 'Ken Steven G. Olimba', 'Available', 'Native delicacies', 'Bahalina', '(12)Made from coconut wine', 1000, 12, 0, 0, '0000-00-00', 'photos/ABCD0002.JPG'),
(69, 65, 'Ken Steven G. Olimba', 'Available', 'Native delicacies', 'Pili Tart', '(20)Made from Pili nuts', 250, 1, 0, 0, '0000-00-00', 'photos/pili tart.jpg'),
(70, 64, 'Ken Steven G. Olimba', 'Available', 'Native delicacies', 'Ube halaya', '(12 pcs) Made from Ube', 300, 315, 4, 6000, '2014-04-30', 'photos/images.jpg'),
(71, 62, 'Ken Steven G. Olimba', 'Available', 'Native delicacies', 'Patupat', '(12)Made from rice', 100, 105, 0, 0, '0000-00-00', 'photos/Patupat-4.jpg'),
(72, 63, 'Ken Steven G. Olimba', 'Available', 'Native delicacies', 'Bibinka', '(12 pcs) Made from rice', 120, 126, 20, 2400, '2014-04-30', 'photos/20.jpg'),
(73, 1, 'Jerome S. Enage', 'Available', 'Handicraft', 'Baskets', '(20 pcs.) Made from Rattan', 1500, 1575, 10, 15000, '2014-05-01', 'photos/6.jpg'),
(74, 2, 'Jerome S. Enage', 'Available', 'Handicraft', 'Accessories', '(20 pcs.) Made from native materials', 1000, 1050, 100, 100000, '2014-04-29', 'photos/french2 954.JPG'),
(75, 3, 'Ken Steven G. Olimba', 'Available', 'Native delicacies', 'asdasddad', 'asdadadsd', 100, 105, 10, 1000, '2014-04-28', 'photos/20.jpg'),
(76, 4, 'Ken Steven G. Olimba', 'Available', 'Native delicacies', 'nnnnn', 'nnnnn', 100, 105, 10, 1000, '2014-04-30', 'photos/2.jpg'),
(77, 5, 'Ken Steven G. Olimba', 'Available', 'Native delicacies', 'sample', 'sample', 100, 105, 3, 0, '2014-04-30', 'photos/Clay_Handicrafts.JPG'),
(78, 6, 'Klyde Almero', 'Coming soon', 'Handicraft', 'Klydeqwe', 'klyde', 1000, 2, 0, 0, '0000-00-00', 'photos/brocante.jpeg'),
(79, 7, 'Klyde Almero', 'Available', 'Native delicacies', 'Klyde2', 'klyde2', 100, 105, 6, 1050, '2014-04-25', 'photos/409472-HandembroideredSkullcapsinlayedwithmirrorcover-1342527067-948-640x480.jpg'),
(80, 4, 'Raniel Abejo', 'Available', 'Handicraft', 'Native Handicarfts', 'Native ', 700, 735, 20, 14700, '2014-04-30', 'photos/3.jpg'),
(81, 3, 'Raniel Abejo', 'Available', 'Handicraft', 'Native Handicarfts', 'Native ', 700, 735, 19, 14700, '2014-04-30', 'photos/3.jpg'),
(82, 2, 'Raniel Abejo', 'Available', 'Handicraft', 'Handicrafts', 'Handicrafts', 500, 525, 100, 52500, '2014-04-22', 'photos/Handicrafts.JPG'),
(83, 1, 'Raniel Abejo', 'Available', 'Handicraft', 'abejo', 'abejo', 100, 105, 9, 1050, '2014-04-15', 'photos/409472-HandembroideredSkullcapsinlayedwithmirrorcover-1342527067-948-640x480.jpg'),
(84, 6, 'Ken Steven G. Olimba', 'Available', 'Handicraft', 'Handicrafts Net', 'MAde from China', 120, 126, 1, 12600, '2014-04-30', 'photos/3.jpg'),
(85, 5, 'Ken Steven G. Olimba', 'Available', 'Native delicacies', 'asdasd', 'safasf', 119, 125, 11, 1499, '2001-12-12', 'photos/IMG_0004_1.jpg'),
(86, 1, 'Ken Steven G. Olimba', 'Available', 'Handicraft', 'Native Bag', 'Made from Fibers', 500, 525, 99, 52500, '2014-04-22', 'photos/Clay_Handicrafts.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(155) NOT NULL auto_increment,
  `productid` int(155) NOT NULL,
  `costumerid` int(155) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` int(100) NOT NULL,
  `category` varchar(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `srp` int(155) NOT NULL,
  `quantity` int(155) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`cartid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `productid`, `costumerid`, `name`, `address`, `contact`, `category`, `pname`, `detail`, `srp`, `quantity`, `date`) VALUES
(59, 82, 85, 'Raniel Abejo', 'Brgy. Calbiga ', 91028312, 'Handicraft', 'Handicrafts', 'Handicrafts', 525, 0, '2014-04-28'),
(60, 77, 85, 'Raniel Abejo', 'Brgy. Calbiga ', 91028312, 'Native delicacies', 'sample', 'sample', 105, 0, '2014-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `confirm_orders`
--

CREATE TABLE `confirm_orders` (
  `confirm_orderid` int(100) NOT NULL auto_increment,
  `productid` int(100) NOT NULL,
  `costumerid` int(100) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `srp` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`confirm_orderid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `confirm_orders`
--

INSERT INTO `confirm_orders` (`confirm_orderid`, `productid`, `costumerid`, `pname`, `detail`, `srp`, `quantity`, `date`) VALUES
(68, 79, 85, 'Klyde2', 'klyde2', 105, 0, '2014-04-28'),
(69, 84, 85, 'Handicrafts Net', 'MAde from China', 126, 0, '2014-04-28'),
(70, 85, 81, 'asdasd', 'safasf', 125, 0, '2014-04-28'),
(71, 79, 81, 'Klyde2', 'klyde2', 105, 0, '2014-04-28'),
(72, 84, 81, 'Handicrafts Net', 'MAde from China', 126, 0, '2014-04-28'),
(73, 83, 81, 'abejo', 'abejo', 105, 0, '2014-04-28'),
(74, 77, 81, 'sample', 'sample', 105, 0, '2014-04-28'),
(75, 81, 81, 'Native Handicarfts', 'Native ', 735, 0, '2014-04-28'),
(76, 79, 81, 'Klyde2', 'klyde2', 105, 0, '2014-04-28'),
(77, 86, 81, 'Native Bag', 'Made from Fibers', 525, 0, '2014-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `customeraccount`
--

CREATE TABLE `customeraccount` (
  `id` int(100) NOT NULL auto_increment,
  `name` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `cellphone` varchar(255) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customeraccount`
--

INSERT INTO `customeraccount` (`id`, `name`, `address`, `cellphone`, `username`, `password`) VALUES
(1, 'Ken', 'Brgy. Apitong Tacloban City', '2147483647', 'swaxx', 'swaxx'),
(2, 'mmmmm', 'mmm', '5', 'mmm', 'mmm');

-- --------------------------------------------------------

--
-- Table structure for table `myorder`
--

CREATE TABLE `myorder` (
  `myorderid` int(100) NOT NULL auto_increment,
  `productid` int(100) NOT NULL,
  `costumerid` int(100) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `srp` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`myorderid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `myorder`
--


-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(155) NOT NULL auto_increment,
  `productid` int(155) NOT NULL,
  `costumerid` int(155) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` int(100) NOT NULL,
  `category` varchar(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `srp` int(155) NOT NULL,
  `quantity` int(100) NOT NULL,
  `date` int(100) NOT NULL,
  PRIMARY KEY  (`orderid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `orders`
--


-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(50) NOT NULL auto_increment,
  `txnid` varchar(50) NOT NULL,
  `payment_amount` decimal(7,2) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `itemid` varchar(50) NOT NULL,
  `createdtime` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `payments`
--


-- --------------------------------------------------------

--
-- Table structure for table `recycle_adminproduct`
--

CREATE TABLE `recycle_adminproduct` (
  `sid` int(155) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `id` int(155) NOT NULL auto_increment,
  `status` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `price` int(155) NOT NULL,
  `quantity` int(155) NOT NULL,
  `total` int(155) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `recycle_adminproduct`
--


-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(100) NOT NULL auto_increment,
  `name` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `address`, `contact`, `username`, `password`) VALUES
(81, 'Ken steven Olimba', 'Brgy. Marvel Culaba Biliran', '094924837', 'swaxx', 'swaxx'),
(82, 'Aclc Gwaps', 'gwaps@yahoo.com', '09106969321', 'Gwaps123', 'gwaps'),
(83, 'Raniel Abejo', 'Brgy. Calbiga Samar', '092343424', 'ranash', 'pokemon'),
(84, 'Hunter X Hunter', 'Greed Island', '12345', 'Gon', 'hunt'),
(85, 'Raniel Abejo', 'Brgy. Calbiga ', '091028312', 'run', 'run');

-- --------------------------------------------------------

--
-- Table structure for table `supplierproduct`
--

CREATE TABLE `supplierproduct` (
  `sid` int(155) NOT NULL auto_increment,
  `sname` varchar(255) NOT NULL,
  `status` varchar(150) NOT NULL,
  `category` varchar(150) NOT NULL,
  `pname` varchar(150) NOT NULL,
  `detail` varchar(150) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY  (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `supplierproduct`
--

