-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: adminpymes
-- ------------------------------------------------------
-- Server version	5.7.17-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `branchoffices`
--

DROP TABLE IF EXISTS `branchoffices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branchoffices` (
  `BranchOfficeID` int(11) NOT NULL AUTO_INCREMENT,
  `companyID` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`BranchOfficeID`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `brandID` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(50) DEFAULT NULL,
  `companyID` int(11) DEFAULT NULL,
  PRIMARY KEY (`brandID`),
  UNIQUE KEY `brand` (`brand`,`companyID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `category_customer`
--

DROP TABLE IF EXISTS `category_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_customer` (
  `businessID` int(11) NOT NULL AUTO_INCREMENT,
  `companyID` int(11) NOT NULL,
  `business` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`businessID`,`companyID`),
  UNIQUE KEY `business` (`business`),
  KEY `companyID` (`companyID`),
  CONSTRAINT `category_customer_ibfk_1` FOREIGN KEY (`companyID`) REFERENCES `company` (`companyID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `categorys`
--

DROP TABLE IF EXISTS `categorys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorys` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,
  `companyID` int(11) DEFAULT NULL,
  PRIMARY KEY (`categoryID`),
  UNIQUE KEY `category` (`category`,`companyID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `companyID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `owner` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `cell_phone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`companyID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `customerID` int(11) NOT NULL AUTO_INCREMENT,
  `companyID` int(11) NOT NULL,
  `businessID` int(11) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `cedula` varchar(16) DEFAULT NULL,
  `cell_phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `saldo` decimal(10,0) NOT NULL DEFAULT '0',
  PRIMARY KEY (`customerID`,`companyID`),
  KEY `companyID` (`companyID`),
  KEY `businessID` (`businessID`,`companyID`),
  CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`companyID`) REFERENCES `company` (`companyID`),
  CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`businessID`, `companyID`) REFERENCES `category_customer` (`businessID`, `companyID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `companyID` int(11) DEFAULT NULL,
  `codigo` varchar(50) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `codigo_barra` varchar(50) DEFAULT NULL,
  `brandID` int(11) DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `service` bit(1) NOT NULL,
  `taxFree` bit(1) DEFAULT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `ProductID` (`ProductID`,`companyID`),
  UNIQUE KEY `codigo_barra` (`codigo_barra`,`companyID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `saleID` bigint(20) NOT NULL AUTO_INCREMENT,
  `companyID` int(11) NOT NULL,
  `usercompanyID` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `SubTotal` decimal(10,0) DEFAULT NULL,
  `Iva` decimal(10,0) DEFAULT NULL,
  `Total` decimal(10,0) DEFAULT NULL,
  `customerID` int(11) DEFAULT NULL,
  `cancelada` bit(1) NOT NULL DEFAULT b'1',
  `contado` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`saleID`,`companyID`),
  KEY `fk_sales_customers` (`customerID`,`companyID`),
  KEY `fk_sales_users_company_idx` (`usercompanyID`,`companyID`),
  CONSTRAINT `fk_sales_customers` FOREIGN KEY (`customerID`, `companyID`) REFERENCES `customers` (`customerID`, `companyID`),
  CONSTRAINT `fk_sales_users_company` FOREIGN KEY (`usercompanyID`, `companyID`) REFERENCES `users_company` (`usercompanyID`, `companyID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `salesdetails`
--

DROP TABLE IF EXISTS `salesdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salesdetails` (
  `saleDetailID` bigint(20) NOT NULL AUTO_INCREMENT,
  `saleID` bigint(20) DEFAULT NULL,
  `companyID` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`saleDetailID`),
  KEY `saleID` (`saleID`,`companyID`),
  CONSTRAINT `salesdetails_ibfk_1` FOREIGN KEY (`saleID`, `companyID`) REFERENCES `sales` (`saleID`, `companyID`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users_company`
--

DROP TABLE IF EXISTS `users_company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_company` (
  `usercompanyID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `companyID` int(11) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `administrator` bit(1) DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  PRIMARY KEY (`usercompanyID`,`companyID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users_company_branch_offices`
--

DROP TABLE IF EXISTS `users_company_branch_offices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_company_branch_offices` (
  `usercompanyID` int(11) NOT NULL,
  `BranchOfficeID` int(11) NOT NULL,
  PRIMARY KEY (`usercompanyID`,`BranchOfficeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuers_permits`
--

DROP TABLE IF EXISTS `usuers_permits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuers_permits` (
  `usercompanyID` int(11) NOT NULL,
  `companyID` int(11) NOT NULL,
  `bodega_v` bit(1) DEFAULT NULL,
  `bodega_n` bit(1) DEFAULT NULL,
  `bodega_m` bit(1) DEFAULT NULL,
  `bodega_e` bit(1) DEFAULT NULL,
  `marca_v` bit(1) DEFAULT NULL,
  `marca_n` bit(1) DEFAULT NULL,
  `marca_m` bit(1) DEFAULT NULL,
  `marca_e` bit(1) DEFAULT NULL,
  `categoria_v` bit(1) DEFAULT NULL,
  `categoria_n` bit(1) DEFAULT NULL,
  `categoria_m` bit(1) DEFAULT NULL,
  `categoria_e` bit(1) DEFAULT NULL,
  `producto_v` bit(1) DEFAULT NULL,
  `producto_n` bit(1) DEFAULT NULL,
  `producto_m` bit(1) DEFAULT NULL,
  `producto_e` bit(1) DEFAULT NULL,
  `categoria_cliente_v` bit(1) DEFAULT NULL,
  `categoria_cliente_n` bit(1) DEFAULT NULL,
  `categoria_cliente_m` bit(1) DEFAULT NULL,
  `categoria_cliente_e` bit(1) DEFAULT NULL,
  `cliente_v` bit(1) DEFAULT NULL,
  `cliente_n` bit(1) DEFAULT NULL,
  `cliente_m` bit(1) DEFAULT NULL,
  `cliente_e` bit(1) DEFAULT NULL,
  `factura_v` bit(1) DEFAULT NULL,
  `factura_n` bit(1) DEFAULT NULL,
  `factura_anular` bit(1) DEFAULT NULL,
  PRIMARY KEY (`usercompanyID`,`companyID`),
  CONSTRAINT `usuers_permits_ibfk_1` FOREIGN KEY (`usercompanyID`, `companyID`) REFERENCES `users_company` (`usercompanyID`, `companyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `verify_account`
--

DROP TABLE IF EXISTS `verify_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `verify_account` (
  `usercompanyID` int(11) NOT NULL,
  `companyID` int(11) NOT NULL,
  `code` varchar(200) DEFAULT NULL,
  `Verified` bit(1) DEFAULT NULL,
  `date_verified` datetime DEFAULT NULL,
  PRIMARY KEY (`usercompanyID`,`companyID`),
  UNIQUE KEY `code` (`code`),
  CONSTRAINT `verify_account_ibfk_1` FOREIGN KEY (`usercompanyID`, `companyID`) REFERENCES `users_company` (`usercompanyID`, `companyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wineries`
--

DROP TABLE IF EXISTS `wineries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wineries` (
  `cellarID` int(11) NOT NULL AUTO_INCREMENT,
  `cellar` varchar(50) DEFAULT NULL,
  `companyID` int(11) DEFAULT NULL,
  PRIMARY KEY (`cellarID`),
  UNIQUE KEY `cellar` (`cellar`,`companyID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-19 20:39:10
