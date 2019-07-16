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

-- Dumping structure for table booksharingsystem.tbcategoryinfo
DROP TABLE IF EXISTS `tbcategoryinfo`;
CREATE TABLE IF NOT EXISTS `tbcategoryinfo` (
  `iAutoId` int(11) NOT NULL AUTO_INCREMENT,
  `vCategoryName` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`iAutoId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table booksharingsystem.tbcategoryinfo: ~2 rows (approximately)
DELETE FROM `tbcategoryinfo`;
/*!40000 ALTER TABLE `tbcategoryinfo` DISABLE KEYS */;
INSERT INTO `tbcategoryinfo` (`iAutoId`, `vCategoryName`) VALUES
	(1, 'Science Fiction'),
	(2, 'History');
/*!40000 ALTER TABLE `tbcategoryinfo` ENABLE KEYS */;

-- Dumping structure for table booksharingsystem.tblogin
DROP TABLE IF EXISTS `tblogin`;
CREATE TABLE IF NOT EXISTS `tblogin` (
  `iAutoId` int(11) NOT NULL AUTO_INCREMENT,
  `vEmployeeName` varchar(50) DEFAULT NULL,
  `vGender` varchar(150) DEFAULT NULL,
  `vAddress` varchar(250) DEFAULT NULL,
  `vMobile` varchar(50) DEFAULT NULL,
  `vEmail` varchar(150) DEFAULT NULL,
  `vNationalId` varchar(250) DEFAULT NULL,
  `vImage` varchar(250) DEFAULT NULL,
  `vPassword` varchar(150) DEFAULT NULL,
  `vUserType` varchar(150) DEFAULT NULL,
  `vStatus` varchar(150) DEFAULT 'active',
  PRIMARY KEY (`iAutoId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table booksharingsystem.tblogin: ~2 rows (approximately)
DELETE FROM `tblogin`;
/*!40000 ALTER TABLE `tblogin` DISABLE KEYS */;
INSERT INTO `tblogin` (`iAutoId`, `vEmployeeName`, `vGender`, `vAddress`, `vMobile`, `vEmail`, `vNationalId`, `vImage`, `vPassword`, `vUserType`, `vStatus`) VALUES
	(1, 'admin', 'Male', 'GEC', '01829656582', 'admin@gmail.com', '123', 'Chrysanthemum.jpg', '123', 'admin', 'active'),
	(2, 'Soybal', 'Male', 'GEC', '01829663628', 's@gmail.com', '111', 'Chrysanthemum.jpg', 's', 'general', 'active');
/*!40000 ALTER TABLE `tblogin` ENABLE KEYS */;

-- Dumping structure for table booksharingsystem.tbproductinfo
DROP TABLE IF EXISTS `tbproductinfo`;
CREATE TABLE IF NOT EXISTS `tbproductinfo` (
  `iAutoId` int(11) NOT NULL AUTO_INCREMENT,
  `vCategory` varchar(50) NOT NULL DEFAULT '0',
  `vSharingType` varchar(50) NOT NULL,
  `vProductName` varchar(150) DEFAULT NULL,
  `vAuthorName` varchar(150) DEFAULT NULL,
  `vUploadBy` varchar(150) DEFAULT NULL,
  `vPrice` double DEFAULT NULL,
  `vImage1` varchar(150) DEFAULT NULL,
  `vImage2` varchar(150) DEFAULT NULL,
  `vImage3` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`iAutoId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table booksharingsystem.tbproductinfo: ~2 rows (approximately)
DELETE FROM `tbproductinfo`;
/*!40000 ALTER TABLE `tbproductinfo` DISABLE KEYS */;
INSERT INTO `tbproductinfo` (`iAutoId`, `vCategory`, `vSharingType`, `vProductName`, `vAuthorName`, `vUploadBy`, `vPrice`, `vImage1`, `vImage2`, `vImage3`) VALUES
	(3, '1', '0', 'test', 'test', 'test', 1213, 'Chrysanthemum.jpg', 'Desert.jpg', 'Hydrangeas.jpg'),
	(4, '2', 'Sale', 'sdf', 'sdf', 'sdfsdf', 987, 'bfs.PNG', 'dfs.PNG', 'heap(min).PNG');
/*!40000 ALTER TABLE `tbproductinfo` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
