-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.31-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5278
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for booksharingsystem
DROP DATABASE IF EXISTS `booksharingsystem`;
CREATE DATABASE IF NOT EXISTS `booksharingsystem` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `booksharingsystem`;

-- Dumping structure for table booksharingsystem.tbcart
DROP TABLE IF EXISTS `tbcart`;
CREATE TABLE IF NOT EXISTS `tbcart` (
  `iAutoId` int(11) NOT NULL AUTO_INCREMENT,
  `vUserIp` varchar(150) NOT NULL,
  `vProductId` varchar(150) NOT NULL,
  `vProductName` varchar(150) NOT NULL,
  `vUploadBy` varchar(150) NOT NULL,
  `vPrice` double NOT NULL,
  `vSharingType` varchar(150) NOT NULL,
  `dDate` date NOT NULL,
  PRIMARY KEY (`iAutoId`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- Dumping data for table booksharingsystem.tbcart: ~1 rows (approximately)
DELETE FROM `tbcart`;
/*!40000 ALTER TABLE `tbcart` DISABLE KEYS */;
INSERT INTO `tbcart` (`iAutoId`, `vUserIp`, `vProductId`, `vProductName`, `vUploadBy`, `vPrice`, `vSharingType`, `dDate`) VALUES
	(44, '::1', '36', 'Digital Logic and Computer Desing', '8', 120, 'Sale', '2019-09-02');
/*!40000 ALTER TABLE `tbcart` ENABLE KEYS */;

-- Dumping structure for table booksharingsystem.tbcategoryinfo
DROP TABLE IF EXISTS `tbcategoryinfo`;
CREATE TABLE IF NOT EXISTS `tbcategoryinfo` (
  `iAutoId` int(11) NOT NULL AUTO_INCREMENT,
  `vCategoryName` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`iAutoId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table booksharingsystem.tbcategoryinfo: ~8 rows (approximately)
DELETE FROM `tbcategoryinfo`;
/*!40000 ALTER TABLE `tbcategoryinfo` DISABLE KEYS */;
INSERT INTO `tbcategoryinfo` (`iAutoId`, `vCategoryName`) VALUES
	(1, 'Science Fiction'),
	(2, 'History'),
	(3, 'CSE'),
	(4, 'BBA'),
	(5, 'LLB'),
	(6, 'Admission Test'),
	(7, 'HSC');
/*!40000 ALTER TABLE `tbcategoryinfo` ENABLE KEYS */;

-- Dumping structure for table booksharingsystem.tbcheckout
DROP TABLE IF EXISTS `tbcheckout`;
CREATE TABLE IF NOT EXISTS `tbcheckout` (
  `iAutoId` int(11) NOT NULL AUTO_INCREMENT,
  `vUserId` varchar(150) NOT NULL,
  `vProductId` varchar(150) NOT NULL,
  `vProductName` varchar(150) NOT NULL,
  `vUploadBy` varchar(150) NOT NULL,
  `vCarrierId` varchar(150) NOT NULL,
  `vBkashNo` varchar(150) NOT NULL,
  `vTransactionId` varchar(150) NOT NULL,
  `vStatus` varchar(150) NOT NULL DEFAULT 'pending for user Approval',
  `vPrice` double NOT NULL,
  `vSharingType` varchar(150) NOT NULL,
  `dDate` date NOT NULL,
  PRIMARY KEY (`iAutoId`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 COMMENT='select iAutoId, vUserId, vProductId, vProductName, vUploadBy, vCarrierId, vBkashNo, vTransactionId, vStatus, vPrice, vSharingType, dDate from tbcheckout';

-- Dumping data for table booksharingsystem.tbcheckout: ~1 rows (approximately)
DELETE FROM `tbcheckout`;
/*!40000 ALTER TABLE `tbcheckout` DISABLE KEYS */;
INSERT INTO `tbcheckout` (`iAutoId`, `vUserId`, `vProductId`, `vProductName`, `vUploadBy`, `vCarrierId`, `vBkashNo`, `vTransactionId`, `vStatus`, `vPrice`, `vSharingType`, `dDate`) VALUES
	(28, '2', '41', 'Retina admission test General knolage', '9', 'delivered by courier service', 'N/A', 'N/A', 'delivered by courier service', 0, 'Borrow', '2019-08-26');
/*!40000 ALTER TABLE `tbcheckout` ENABLE KEYS */;

-- Dumping structure for table booksharingsystem.tbinbox
DROP TABLE IF EXISTS `tbinbox`;
CREATE TABLE IF NOT EXISTS `tbinbox` (
  `iAutoId` int(11) NOT NULL AUTO_INCREMENT,
  `vName` varchar(50) NOT NULL,
  `vEmail` varchar(50) NOT NULL,
  `vMessage` varchar(5000) NOT NULL,
  `vStatus` varchar(50) NOT NULL DEFAULT 'unread',
  `dDate` date NOT NULL,
  PRIMARY KEY (`iAutoId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='select iAutoId, vName, vEmail, vMessage, vStatus, dDate from tbInbox';

-- Dumping data for table booksharingsystem.tbinbox: ~0 rows (approximately)
DELETE FROM `tbinbox`;
/*!40000 ALTER TABLE `tbinbox` DISABLE KEYS */;
INSERT INTO `tbinbox` (`iAutoId`, `vName`, `vEmail`, `vMessage`, `vStatus`, `dDate`) VALUES
	(1, 'test', 'c@gmail.com', 'test', 'unread', '2019-09-02');
/*!40000 ALTER TABLE `tbinbox` ENABLE KEYS */;

-- Dumping structure for table booksharingsystem.tblogin
DROP TABLE IF EXISTS `tblogin`;
CREATE TABLE IF NOT EXISTS `tblogin` (
  `iAutoId` int(11) NOT NULL AUTO_INCREMENT,
  `vUserType` varchar(150) DEFAULT NULL,
  `vEmployeeName` varchar(50) DEFAULT NULL,
  `vGender` varchar(150) DEFAULT NULL,
  `vCountry` varchar(250) DEFAULT NULL,
  `vCity` varchar(250) DEFAULT NULL,
  `vThana` varchar(250) NOT NULL,
  `vZipCode` varchar(250) DEFAULT NULL,
  `vMobile` varchar(50) DEFAULT NULL,
  `vBkashNo` varchar(50) DEFAULT NULL,
  `vAddress` varchar(250) DEFAULT NULL,
  `vEmail` varchar(150) DEFAULT NULL,
  `vNationalId` varchar(250) DEFAULT NULL,
  `vImage` varchar(250) DEFAULT NULL,
  `vPassword` varchar(150) DEFAULT NULL,
  `vStatus` varchar(150) DEFAULT 'active',
  PRIMARY KEY (`iAutoId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COMMENT='select iAutoId, vUserType, vEmployeeName, vGender, vCountry, vCity, vThana, vZipCode, vMobile,vBkashNo, vAddress,  vEmail, vNationalId, vImage, vPassword, vStatus from tblogin';

-- Dumping data for table booksharingsystem.tblogin: ~8 rows (approximately)
DELETE FROM `tblogin`;
/*!40000 ALTER TABLE `tblogin` DISABLE KEYS */;
INSERT INTO `tblogin` (`iAutoId`, `vUserType`, `vEmployeeName`, `vGender`, `vCountry`, `vCity`, `vThana`, `vZipCode`, `vMobile`, `vBkashNo`, `vAddress`, `vEmail`, `vNationalId`, `vImage`, `vPassword`, `vStatus`) VALUES
	(1, 'admin', 'admin', 'Male', 'Bangladesh', 'Chittagong', 'Rangunia', '0088', '01830663166', '22222', 'GEC', 'admin@gmail.com', '123', 'Chrysanthemum.jpg', '123', 'active'),
	(2, 'user', 's', 'Female', 'Bangladesh', 'Chittagong', 'Rangunia', '0088', '01830663154', '123', 'Chittagong,Paslais', 's@gmail.com', '.', NULL, 's', 'active'),
	(3, 'carrier', 'Mohammad Hossain', 'Male', 'Bangladesh', 'Dhaka', 'Rangunia', '0088', '01830663133', NULL, 'Dhaka, New Market', 'hossain@yahoo.com', 's', NULL, '123', 'active'),
	(7, 'carrier', 'Misbah Uddin Bahar', 'Male', 'Bangladesh', 'Chittagong', 'Rangunia', '0088', '01830663166', NULL, 'chittagong,gec', 'bahar@yahoo.com', '5486899485645', NULL, '123', 'active'),
	(8, 'user', 'Misbah Uddin Chy', 'Male', 'Bangladesh', 'Chittagong', 'Rangunia', '0088', '01830663162', NULL, 'Chittagong,gec', 'misbah@yahoo.com', '.', NULL, '123', 'active'),
	(9, 'user', 'rajib', 'Male', 'Bangladesh', 'Dhaka', 'Rangunia', '0066', '01830663169', NULL, 'Dhaka', 'rajib21@gmail.com', 'ss', NULL, '123', 'active'),
	(10, 'carrier', 'Mohammad Ibrahim', 'Male', 'Bangladesh', 'Chittagong', 'Rangunia', '0088', '01830663133', NULL, 'Chittagong,New Market', 'ibrahimctg@yahoo.com', 's', NULL, '123', 'active'),
	(11, 'user', 'Hasan Reza', 'Male', 'Bangladesh', 'Chittagong', 'Rangunia', '0088', '01830663154', NULL, 'Chittagong,Paslais', 'hreza@gmail.com', '.', NULL, '123', 'active');
/*!40000 ALTER TABLE `tblogin` ENABLE KEYS */;

-- Dumping structure for table booksharingsystem.tbproductinfo
DROP TABLE IF EXISTS `tbproductinfo`;
CREATE TABLE IF NOT EXISTS `tbproductinfo` (
  `iAutoId` int(11) NOT NULL AUTO_INCREMENT,
  `vCategory` varchar(50) NOT NULL DEFAULT '0',
  `vSharingType` varchar(50) NOT NULL,
  `vProductName` varchar(150) DEFAULT NULL,
  `vAuthorName` varchar(150) DEFAULT NULL,
  `vDescription` varchar(550) DEFAULT NULL,
  `vUploadBy` varchar(150) DEFAULT NULL,
  `vPrice` double DEFAULT NULL,
  `vImage1` varchar(250) DEFAULT NULL,
  `vImage2` varchar(250) DEFAULT NULL,
  `vImage3` varchar(250) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'active',
  `dDate` date NOT NULL,
  PRIMARY KEY (`iAutoId`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- Dumping data for table booksharingsystem.tbproductinfo: ~10 rows (approximately)
DELETE FROM `tbproductinfo`;
/*!40000 ALTER TABLE `tbproductinfo` DISABLE KEYS */;
INSERT INTO `tbproductinfo` (`iAutoId`, `vCategory`, `vSharingType`, `vProductName`, `vAuthorName`, `vDescription`, `vUploadBy`, `vPrice`, `vImage1`, `vImage2`, `vImage3`, `status`, `dDate`) VALUES
	(35, '3', 'Sale', 'new book', 'Bahar', NULL, '8', 123, 'images/upload/imgOne066a5d0b12.jpg', 'images/upload/imgTwo066a5d0b12.jpg', 'images/upload/imgThree066a5d0b12.jpg', 'active', '0000-00-00'),
	(36, '3', 'Sale', 'Digital Logic and Computer Desing', 'M. MORRIS MANO', NULL, '8', 120, 'images/upload/imgOnefe73ba171b.jpg', 'images/upload/imgTwofe73ba171b.jpg', 'images/upload/imgThreefe73ba171b.jpg', 'active', '0000-00-00'),
	(37, '3', 'Sale', 'DISCRETE-EVENT SYSTEM SIMULATION', 'JERRY BANKS. JOHH S. CARSON BARRY L.NELSON. DAVID M. NICOL', NULL, '8', 150, 'images/upload/imgOned9285203f2.jpg', 'images/upload/imgTwod9285203f2.jpg', 'images/upload/imgThreed9285203f2.jpg', 'active', '0000-00-00'),
	(38, '3', 'Donate', 'DATA STRUCTURES', 'Adapted by:G A V PAI', NULL, '8', 100, 'images/upload/imgOne78ac3f819e.jpg', 'images/upload/imgTwo78ac3f819e.jpg', 'images/upload/imgThree78ac3f819e.jpg', 'active', '0000-00-00'),
	(39, '6', 'Borrow', 'Retina admission test book', 'Retina', ' ', '9', 0, 'images/upload/imgOne809d57b4ad.jpg', 'images/upload/imgTwo809d57b4ad.jpg', 'images/upload/imgThree809d57b4ad.jpg', 'active', '0000-00-00'),
	(40, '6', 'Sale', 'Retina admission test Question bank', 'Retina', NULL, '9', 100, 'images/upload/imgOne725537897b.jpg', 'images/upload/imgTwo725537897b.jpg', 'images/upload/imgThree725537897b.jpg', 'active', '0000-00-00'),
	(41, '6', 'Borrow', 'Retina admission test General knolage', 'Retina', NULL, '9', 0, 'images/upload/imgOneba368eb128.jpg', 'images/upload/imgTwoba368eb128.jpg', 'images/upload/imgThreeba368eb128.jpg', 'inactive', '0000-00-00'),
	(42, '7', 'Sale', 'Jib Biggan 2nd part', 'Gaji ajmol and gaji asmot', NULL, '11', 100, 'images/upload/imgOne8140e14e66.jpg', 'images/upload/imgTwo8140e14e66.jpg', 'images/upload/imgThree8140e14e66.jpg', 'active', '0000-00-00'),
	(43, '7', 'Donate', 'physics 1st', 'Dr. amir hossen khan,dr. md nojrol islam,professor mohammad ishaq', NULL, '11', 30, 'images/upload/imgOnec7f3d70102.jpg', 'images/upload/imgTwoc7f3d70102.jpg', 'images/upload/imgThreec7f3d70102.jpg', 'active', '0000-00-00'),
	(44, '7', 'Borrow', 'physics 2nd', 'professor md golam hossen promanic, Dayan nasir uddin, dr Robiul Isram', NULL, '11', 0, 'images/upload/imgOne4a2ab3accf.jpg', 'images/upload/imgTwo4a2ab3accf.jpg', 'images/upload/imgThree4a2ab3accf.jpg', 'active', '0000-00-00');
/*!40000 ALTER TABLE `tbproductinfo` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
