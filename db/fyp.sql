CREATE DATABASE  IF NOT EXISTS `fp_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `fp_db`;
-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: fp_db
-- ------------------------------------------------------
-- Server version	5.7.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `aID` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  PRIMARY KEY (`aID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'peter0123','cw2003');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `cID` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `PhoneNum` varchar(20) NOT NULL,
  PRIMARY KEY (`cID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (3,'hongabc','hong1234','aabbcc@gmail.com','68044751'),(2,'hong01','hong1234','kinghong_wong@yahoo.com.hk','96474327'),(1,'hong','hong1234','190086699@stu.vtc.edu.hk','91304532');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupon`
--

DROP TABLE IF EXISTS `coupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coupon` (
  `pID` int(11) NOT NULL,
  `GoodsID` int(11) NOT NULL,
  `cID` int(11) NOT NULL,
  `sID` int(11) NOT NULL,
  `Discount` decimal(2,1) NOT NULL,
  `Expirytion` date NOT NULL,
  PRIMARY KEY (`pID`,`cID`),
  KEY `FK_cp_GoodsID_idx` (`GoodsID`),
  KEY `FK_cp_sID_idx` (`sID`),
  KEY `FK_cp_cID_idx` (`cID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupon`
--

LOCK TABLES `coupon` WRITE;
/*!40000 ALTER TABLE `coupon` DISABLE KEYS */;
INSERT INTO `coupon` VALUES (1,2,3,1,0.5,'2021-05-20'),(2,6,1,2,0.8,'2021-05-19'),(1,2,1,1,0.5,'2021-05-20');
/*!40000 ALTER TABLE `coupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `goods` (
  `GoodsID` int(11) NOT NULL,
  `GoodsType` varchar(5) NOT NULL,
  `GoodsName` varchar(30) NOT NULL,
  `sID` int(11) NOT NULL,
  `Price` float(5,1) NOT NULL,
  `Qty` int(11) NOT NULL,
  PRIMARY KEY (`GoodsID`),
  KEY `FK_sID_idx` (`sID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods`
--

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` VALUES (4,'meat','mussels',1,57.0,23),(3,'meat','deer',1,70.0,51),(1,'meat','beef (kg)',1,22.5,12),(2,'meat','crab',1,350.0,11),(5,'fv','Apple',2,3.0,84),(6,'fv','banana',2,18.0,6),(7,'fv','Lettuce',2,15.0,78),(8,'fv','onion',2,7.0,12),(9,'dry','banana (dry)',3,25.0,117),(10,'dry','beans (pack)',3,19.9,32),(11,'dry','berries',3,20.0,33),(12,'dry','fish (dry)',3,43.0,5);
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_items` (
  `GoodsID` int(11) NOT NULL,
  `oID` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(5) NOT NULL,
  PRIMARY KEY (`oID`,`GoodsID`),
  KEY `FK_oi_GoodsID_idx` (`GoodsID`),
  KEY `FK_oi_oID_idx` (`oID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (2,3,1,'N'),(11,3,10,'N'),(5,3,2,'N'),(3,2,5,'N'),(9,2,3,'R'),(6,1,2,'N');
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `oID` int(11) NOT NULL,
  `cID` int(11) NOT NULL,
  `Price` decimal(10,1) NOT NULL,
  `OrderTime` date NOT NULL,
  `LastUpdate` date NOT NULL,
  PRIMARY KEY (`oID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (3,3,381.0,'2021-05-04','2021-05-04'),(2,2,425.0,'2021-05-04','2021-05-04'),(1,1,28.8,'2021-05-04','2021-05-04');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `promotion` (
  `pID` int(11) NOT NULL,
  `sID` int(11) NOT NULL,
  `GoodsID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Content` varchar(100) NOT NULL,
  `Discount` decimal(2,1) NOT NULL,
  `ExpiryDate` date NOT NULL,
  PRIMARY KEY (`pID`),
  KEY `FK_p_sID_idx` (`sID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotion`
--

LOCK TABLES `promotion` WRITE;
/*!40000 ALTER TABLE `promotion` DISABLE KEYS */;
INSERT INTO `promotion` VALUES (2,2,6,'It\'s banana season and give it a try immediately','It is the change to get the best banana on market by 20% off.',0.8,'2021-05-19'),(1,1,2,'Come get your 50% off discount for buying crab','It\'s time to enjoy some delicious crabs!',0.5,'2021-05-20'),(3,3,10,'Our beans become tastier after dried. Buy it with 30% off','The process to dry the beans takes 4 months. That\'s why it is so tasty!',0.7,'2021-06-24');
/*!40000 ALTER TABLE `promotion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopkeeper`
--

DROP TABLE IF EXISTS `shopkeeper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shopkeeper` (
  `skID` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `sID` int(11) NOT NULL,
  PRIMARY KEY (`skID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopkeeper`
--

LOCK TABLES `shopkeeper` WRITE;
/*!40000 ALTER TABLE `shopkeeper` DISABLE KEYS */;
INSERT INTO `shopkeeper` VALUES (3,'sk003','sk003',3),(2,'sk002','sk002',2),(1,'sk001','sk001',1);
/*!40000 ALTER TABLE `shopkeeper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stall`
--

DROP TABLE IF EXISTS `stall`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stall` (
  `sID` int(11) NOT NULL,
  `skID` int(11) NOT NULL,
  `StallName` varchar(20) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Tel` varchar(20) NOT NULL,
  `BusinessHours` varchar(20) NOT NULL,
  PRIMARY KEY (`sID`),
  KEY `FK_skID_idx` (`skID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stall`
--

LOCK TABLES `stall` WRITE;
/*!40000 ALTER TABLE `stall` DISABLE KEYS */;
INSERT INTO `stall` VALUES (1,1,'Shop 001 limited','Wan Chai','43214321','08:00-20:00'),(2,2,'Shop 002 unlimited','Chai Wan','98765432','10:00-12:00'),(3,3,'ShopStall 03','Aberdeen','68712234','14:00-20:00');
/*!40000 ALTER TABLE `stall` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-04 10:02:09
