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
-- Dumping data for table `branchoffices`
--

LOCK TABLES `branchoffices` WRITE;
/*!40000 ALTER TABLE `branchoffices` DISABLE KEYS */;
INSERT INTO `branchoffices` VALUES (1,1,'San Judas');
/*!40000 ALTER TABLE `branchoffices` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (2,'Bic',1),(3,'Cancan',1),(4,'Diana',1),(1,'Sin Marca',1),(21,'Sin Marca',2),(12,'Valle',1);
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `business`
--

DROP TABLE IF EXISTS `business`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `business` (
  `businessID` int(11) NOT NULL AUTO_INCREMENT,
  `companyID` int(11) NOT NULL,
  `business` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`businessID`,`companyID`),
  UNIQUE KEY `business` (`business`),
  KEY `companyID` (`companyID`),
  CONSTRAINT `business_ibfk_1` FOREIGN KEY (`companyID`) REFERENCES `company` (`companyID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business`
--

LOCK TABLES `business` WRITE;
/*!40000 ALTER TABLE `business` DISABLE KEYS */;
INSERT INTO `business` VALUES (3,1,'Banpro'),(1,1,'Universidad de Managua');
/*!40000 ALTER TABLE `business` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorys`
--

LOCK TABLES `categorys` WRITE;
/*!40000 ALTER TABLE `categorys` DISABLE KEYS */;
INSERT INTO `categorys` VALUES (2,'Galletas',1),(1,'Jugos',1),(5,'Lapiceros',1),(4,'Sin categoria',1),(7,'Sin Categoria',2);
/*!40000 ALTER TABLE `categorys` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'Torno San Judas','Sara Florez','asdasdad','22334455','88776655'),(2,'Famaras','Felix Ramirez','eerrtt','22446677','77886655'),(3,NULL,'zohan','ksdjsda fjsdf j','889922',NULL);
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

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
  PRIMARY KEY (`customerID`,`companyID`),
  KEY `companyID` (`companyID`),
  KEY `businessID` (`businessID`,`companyID`),
  CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`companyID`) REFERENCES `company` (`companyID`),
  CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`businessID`, `companyID`) REFERENCES `business` (`businessID`, `companyID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (2,1,1,'Felix Javier','Ramirez','0012207890042r','85173270','felixramirez19892015@gmail.com'),(3,1,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (8,2,'01','Desarrollo Pagina WordPress','01',21,7,'','\0',10000),(2,1,'G002','Galleta cancan de 4 unidades','SDSUYU76767',3,2,'','\0',2),(1,1,'J001','Jugo del valle de naranja medio litro','786678988787',12,1,'\0','\0',15),(3,1,'L003','Lapicero Azul normal','8978798ASDSD',2,5,'\0','\0',2),(4,1,'R001','Recarga Movistar','R1',1,4,'\0','\0',50),(5,1,'R002','Recarga Claro','R2',1,4,'\0','\0',50);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

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
  PRIMARY KEY (`saleID`,`companyID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,1,2,'0000-00-00 00:00:00',38,0,38),(2,1,2,'0000-00-00 00:00:00',38,0,38),(3,1,2,'0000-00-00 00:00:00',238,0,238),(4,1,2,'0000-00-00 00:00:00',238,0,238),(5,1,2,'0000-00-00 00:00:00',688,0,688),(6,1,2,'0000-00-00 00:00:00',2,0,2),(7,1,2,'0000-00-00 00:00:00',2,0,2),(8,1,2,'0000-00-00 00:00:00',2,0,2),(9,1,2,'0000-00-00 00:00:00',2,0,2),(10,1,2,'0000-00-00 00:00:00',4,0,4),(11,1,2,'2017-03-29 00:00:00',600,0,600),(12,1,2,'0000-00-00 00:00:00',19,0,19),(13,1,2,'2017-03-29 21:54:19',844,0,844),(14,1,2,'2017-03-29 21:57:14',844,0,844),(15,1,2,'2017-03-29 21:57:22',38,0,38),(16,1,2,'2017-04-01 23:41:26',55,0,55),(17,1,1,'2017-04-05 21:36:43',19,0,19),(18,1,1,'2017-04-05 21:36:47',4,0,4),(19,1,2,'2017-04-06 23:25:44',119,0,119),(20,1,2,'2017-04-10 17:54:56',40,0,40),(21,2,3,'2017-04-13 11:30:47',10000,0,10000),(22,1,2,'2017-04-13 16:07:26',14,0,14),(23,1,2,'2017-04-13 16:07:32',303,0,303);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salesdetails`
--

LOCK TABLES `salesdetails` WRITE;
/*!40000 ALTER TABLE `salesdetails` DISABLE KEYS */;
INSERT INTO `salesdetails` VALUES (1,2,1,2,2,2),(2,2,1,1,15,2),(3,2,1,3,2,2),(4,3,1,2,2,2),(5,3,1,1,15,2),(6,3,1,3,2,2),(7,3,1,5,50,2),(8,3,1,4,50,2),(9,4,1,2,2,2),(10,4,1,1,15,2),(11,4,1,3,2,2),(12,4,1,4,50,2),(13,4,1,5,50,2),(14,5,1,2,2,2),(15,5,1,1,15,2),(16,5,1,3,2,2),(17,5,1,4,50,2),(18,5,1,5,50,11),(19,6,1,2,2,1),(20,7,1,2,2,1),(21,8,1,2,2,1),(22,9,1,2,2,1),(23,10,1,2,2,2),(24,11,1,5,50,9),(25,11,1,4,50,3),(26,12,1,2,2,1),(27,12,1,1,15,1),(28,12,1,3,2,1),(29,13,1,5,50,5),(30,13,1,4,50,11),(31,13,1,3,2,5),(32,13,1,1,15,2),(33,13,1,2,2,2),(34,14,1,5,50,5),(35,14,1,4,50,11),(36,14,1,3,2,5),(37,14,1,1,15,2),(38,14,1,2,2,2),(39,15,1,2,2,2),(40,15,1,3,2,2),(41,15,1,1,15,2),(42,16,1,2,2,5),(43,16,1,1,15,3),(44,17,1,2,2,1),(45,17,1,1,15,1),(46,17,1,3,2,1),(47,18,1,2,2,2),(48,19,1,2,2,1),(49,19,1,1,15,1),(50,19,1,3,2,1),(51,19,1,4,50,1),(52,19,1,5,50,1),(53,20,1,2,2,2),(54,20,1,1,15,2),(55,20,1,3,2,3),(56,21,2,8,10000,1),(57,22,1,2,2,7),(58,23,1,1,15,3),(59,23,1,2,2,2),(60,23,1,4,50,2),(61,23,1,3,2,2),(62,23,1,5,50,3);
/*!40000 ALTER TABLE `salesdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_company`
--

DROP TABLE IF EXISTS `users_company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_company` (
  `usercompanyID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `companyID` int(11) DEFAULT NULL,
  `password` varchar(1000) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `administrator` bit(1) DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  PRIMARY KEY (`usercompanyID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_company`
--

LOCK TABLES `users_company` WRITE;
/*!40000 ALTER TABLE `users_company` DISABLE KEYS */;
INSERT INTO `users_company` VALUES (1,'felixramirez1989@hotmail.es',1,'40bd001563085fc35165329ea1ff5c5ecbdbbeef','Félix Javier','Ramírez','',''),(2,'felixramirez19892015@gmail.com',1,'40bd001563085fc35165329ea1ff5c5ecbdbbeef','Javier','Garcia','\0',''),(3,'programacionudem@gmail.com',2,'40bd001563085fc35165329ea1ff5c5ecbdbbeef','Felix Javier','Ramirez','',''),(6,'carlos@pinolerosoftware.com',2,'bfe54caa6d483cc3887dce9d1b8eb91408f1ea7a','Carlos Antonio','Hernandez Dominguez','\0',''),(9,'johang77@hotmail.com',3,'40bd001563085fc35165329ea1ff5c5ecbdbbeef','Johan','Godinez','','');
/*!40000 ALTER TABLE `users_company` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `users_company_branch_offices`
--

LOCK TABLES `users_company_branch_offices` WRITE;
/*!40000 ALTER TABLE `users_company_branch_offices` DISABLE KEYS */;
INSERT INTO `users_company_branch_offices` VALUES (2,1);
/*!40000 ALTER TABLE `users_company_branch_offices` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wineries`
--

LOCK TABLES `wineries` WRITE;
/*!40000 ALTER TABLE `wineries` DISABLE KEYS */;
INSERT INTO `wineries` VALUES (4,'San Judas',1),(5,'Sin Bodega',2);
/*!40000 ALTER TABLE `wineries` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-18 23:46:21
