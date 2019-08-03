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
  PRIMARY KEY (`iAutoId`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table booksharingsystem.tbcart: ~1 rows (approximately)
DELETE FROM `tbcart`;
/*!40000 ALTER TABLE `tbcart` DISABLE KEYS */;
INSERT INTO `tbcart` (`iAutoId`, `vUserIp`, `vProductId`, `vProductName`, `vUploadBy`, `vPrice`) VALUES
	(16, '::1', '27', '111', '2', 4);
/*!40000 ALTER TABLE `tbcart` ENABLE KEYS */;

-- Dumping structure for table booksharingsystem.tbcategoryinfo
DROP TABLE IF EXISTS `tbcategoryinfo`;
CREATE TABLE IF NOT EXISTS `tbcategoryinfo` (
  `iAutoId` int(11) NOT NULL AUTO_INCREMENT,
  `vCategoryName` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`iAutoId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table booksharingsystem.tbcategoryinfo: ~2 rows (approximately)
DELETE FROM `tbcategoryinfo`;
/*!40000 ALTER TABLE `tbcategoryinfo` DISABLE KEYS */;
INSERT INTO `tbcategoryinfo` (`iAutoId`, `vCategoryName`) VALUES
	(1, 'Science Fiction'),
	(2, 'History');
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
  `vStatus` varchar(150) NOT NULL DEFAULT 'pending',
  `vPrice` double NOT NULL,
  PRIMARY KEY (`iAutoId`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table booksharingsystem.tbcheckout: ~0 rows (approximately)
DELETE FROM `tbcheckout`;
/*!40000 ALTER TABLE `tbcheckout` DISABLE KEYS */;
INSERT INTO `tbcheckout` (`iAutoId`, `vUserId`, `vProductId`, `vProductName`, `vUploadBy`, `vCarrierId`, `vBkashNo`, `vTransactionId`, `vStatus`, `vPrice`) VALUES
	(18, '6', '27', '111', '2', '', 'sfsf', 'sfsf', 'pending', 4);
/*!40000 ALTER TABLE `tbcheckout` ENABLE KEYS */;

-- Dumping structure for table booksharingsystem.tblogin
DROP TABLE IF EXISTS `tblogin`;
CREATE TABLE IF NOT EXISTS `tblogin` (
  `iAutoId` int(11) NOT NULL AUTO_INCREMENT,
  `vUserType` varchar(150) DEFAULT NULL,
  `vEmployeeName` varchar(50) DEFAULT NULL,
  `vGender` varchar(150) DEFAULT NULL,
  `vCountry` varchar(250) DEFAULT NULL,
  `vCity` varchar(250) DEFAULT NULL,
  `vZipCode` varchar(250) DEFAULT NULL,
  `vMobile` varchar(50) DEFAULT NULL,
  `vAddress` varchar(250) DEFAULT NULL,
  `vEmail` varchar(150) DEFAULT NULL,
  `vNationalId` varchar(250) DEFAULT NULL,
  `vImage` varchar(250) DEFAULT NULL,
  `vPassword` varchar(150) DEFAULT NULL,
  `vStatus` varchar(150) DEFAULT 'active',
  PRIMARY KEY (`iAutoId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='select iAutoId, vUserType, vEmployeeName, vGender, vCountry, vCity, vZipCode, vMobile, vAddress,  vEmail, vNationalId, vImage, vPassword, vStatus from tblogin';

-- Dumping data for table booksharingsystem.tblogin: ~4 rows (approximately)
DELETE FROM `tblogin`;
/*!40000 ALTER TABLE `tblogin` DISABLE KEYS */;
INSERT INTO `tblogin` (`iAutoId`, `vUserType`, `vEmployeeName`, `vGender`, `vCountry`, `vCity`, `vZipCode`, `vMobile`, `vAddress`, `vEmail`, `vNationalId`, `vImage`, `vPassword`, `vStatus`) VALUES
	(1, 'admin', 'admin', 'Male', NULL, NULL, NULL, '01829656582', 'GEC', 'admin@gmail.com', '123', 'Chrysanthemum.jpg', 's', 'active'),
	(2, 'user', 'u', 'Male', '1', '2', '3', '4', '5', 'u@gmail.com', '6', NULL, 'u', 'active'),
	(5, 'carrier', 'c', 'Male', 'c', 'c', 'c', '3', 'c', 'c@gmail.com', NULL, NULL, 'c', 'active'),
	(6, 'user', 's', 'Male', 's', 's', 's', '11', 's', 's@gmail.com', '32131', NULL, 's', 'active');
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
  PRIMARY KEY (`iAutoId`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Dumping data for table booksharingsystem.tbproductinfo: ~7 rows (approximately)
DELETE FROM `tbproductinfo`;
/*!40000 ALTER TABLE `tbproductinfo` DISABLE KEYS */;
INSERT INTO `tbproductinfo` (`iAutoId`, `vCategory`, `vSharingType`, `vProductName`, `vAuthorName`, `vDescription`, `vUploadBy`, `vPrice`, `vImage1`, `vImage2`, `vImage3`, `status`) VALUES
	(24, '1', 'Sale', '1', '1', 'sdfsdfsdfsfsf', '1', 1, 'images/upload/imgOne74f5cde606.jpg', 'images/upload/imgTwo74f5cde606.jpg', 'images/upload/imgThree74f5cde606.jpg', 'inactive'),
	(26, '1', 'Donate', '111', '111', 'sdfsdfsdfsfsf \r\nsfsdfsdfs  sdf\r\nsf\r\nsf\r\nsf\r\nsf\r\nsdf\r\nsf\r\nsf\r\nsd   ', '2', 4, 'images/upload/imgOne33d43ef678.jpg', 'images/upload/imgTwo1a76617dd4.jpg', 'images/upload/imgThreef5d4c9a2fd.jpg', 'active'),
	(27, '1', 'Borrow', '111', '111', ' ', '2', 4, 'images/upload/imgOne33d43ef678.jpg', 'images/upload/imgTwo3c6b85c1c5.jpg', 'images/upload/imgThreef5d4c9a2fd.jpg', 'inactive'),
	(28, '1', 'Donate', '111', '111', ' ', '2', 4, 'images/upload/imgOne33d43ef678.jpg', 'images/upload/imgTwoa9276254dd.jpg', 'images/upload/imgThreef5d4c9a2fd.jpg', 'active'),
	(29, '1', 'Borrow', '111', '111', ' ', '2', 4, 'images/upload/imgOne33d43ef678.jpg', 'images/upload/imgTwo9aa4b5fcca.jpg', 'images/upload/imgThreef5d4c9a2fd.jpg', 'active'),
	(30, '1', 'Sale', '111', '111', NULL, '2', 4, 'images/upload/imgOne33d43ef678.jpg', 'images/upload/imgTwo0a8e8bbfe5.jpg', 'images/upload/imgThreef5d4c9a2fd.jpg', 'active'),
	(31, '2', 'Donate', 'sfsdf', 'sdfsdfsf', NULL, '2', 12, 'images/upload/imgOneddddf0dd77.jpg', 'images/upload/imgTwoddddf0dd77.jpg', 'images/upload/imgThreeddddf0dd77.jpg', 'active');
/*!40000 ALTER TABLE `tbproductinfo` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
