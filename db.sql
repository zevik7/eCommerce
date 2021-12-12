CREATE DATABASE  IF NOT EXISTS `ecommerce` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `ecommerce`;
-- MySQL dump 10.13  Distrib 8.0.24, for Win64 (x86_64)
--
-- Host: localhost    Database: ecommerce
-- ------------------------------------------------------
-- Server version	5.7.33

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
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `date` datetime DEFAULT NULL COMMENT 'Limit the days of item in cart',
  PRIMARY KEY (`id`),
  KEY `cart_fk1_idx` (`user_id`),
  CONSTRAINT `cart_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `cart_AFTER_INSERT` AFTER INSERT ON `carts` FOR EACH ROW BEGIN
	set @quantity = NEW.quantity;
    set @product_type_id = NEW.product_type_id;
	update product_types
		set quantity = quantity - @quantity
	where (id = @product_type_id);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `cart_BEFORE_UPDATE` BEFORE UPDATE ON `carts` FOR EACH ROW BEGIN
	set @product_type_id = NEW.product_type_id;
    set @user_id = NEW.user_id;
    set @quantityOld = (select quantity from carts where product_type_id = @product_type_id and user_id = @user_id);
	update product_types
		set quantity = quantity + @quantityOld
	where (id = @product_type_id);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `cart_AFTER_UPDATE` AFTER UPDATE ON `carts` FOR EACH ROW BEGIN
    set @product_type_id = NEW.product_type_id;
    set @quantityNew = NEW.quantity;
	update product_types
		set quantity = quantity - @quantityNew
	where (id = @product_type_id);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `cart_AFTER_DELETE` AFTER DELETE ON `carts` FOR EACH ROW BEGIN
	set @quantity = OLD.quantity;
    set @product_type_id = OLD.product_type_id;
	update product_types
		set quantity = quantity + @quantity
	where (id = @product_type_id);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imageable_id` int(11) NOT NULL,
  `imageable_type` varchar(200) DEFAULT NULL,
  `type` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,1,'product','thumb','public/img/giaybitas.jpg',NULL,NULL),(2,2,'product','thumb','public/img/aokhoac.jpg',NULL,NULL),(3,3,'product','thumb','public/img/chongnang.png',NULL,NULL),(4,4,'product','thumb','public/img/bitishunter.jpg',NULL,NULL),(5,5,'product','thumb','public/img/giaynika.jpg',NULL,NULL),(6,6,'product','thumb','public/img/loabluetooth.jpg',NULL,NULL),(7,7,'product','thumb','public/img/son1.png',NULL,NULL),(8,8,'product','thumb','public/img/suaruamat.png',NULL,NULL),(9,9,'product','thumb','public/img/tinhchat.png',NULL,NULL),(10,10,'product','thumb','public/img/quankaki.jpg',NULL,NULL),(11,11,'product','thumb','public/img/kem.png',NULL,NULL),(12,12,'product','thumb','public/img/balo.jpg',NULL,NULL),(13,1,'product','collection','public/img/giaybitas2.jpg',NULL,NULL),(14,1,'product','collection','public/img/giaybitas3.jpg',NULL,NULL),(15,1,'product','collection','public/img/giaybitas4.jpg',NULL,NULL),(16,2,'product','collection','public/img/aokhoac2.jpg',NULL,NULL),(17,2,'product','collection','public/img/aokhoac3.jpg',NULL,NULL),(18,2,'product','collection','public/img/aokhoac4.jpg',NULL,NULL),(19,2,'product','collection','public/img/aokhoac5.jpg',NULL,NULL),(20,4,'product','collection','public/img/bitishunter2.jpg',NULL,NULL),(21,4,'product','collection','public/img/bitishunter3.jpg',NULL,NULL),(22,4,'product','collection','public/img/bitishunter4.jpg',NULL,NULL),(23,4,'product','collection','public/img/bitishunter5.jpg',NULL,NULL),(24,5,'product','collection','public/img/giaynika2.jpg',NULL,NULL),(25,5,'product','collection','public/img/giaynika3.jpg',NULL,NULL),(26,5,'product','collection','public/img/giaynika4.jpg',NULL,NULL),(27,5,'product','collection','public/img/giaynika5.jpg',NULL,NULL),(28,3,'product','collection','public/img/chongnang2.png',NULL,NULL),(29,3,'product','collection','public/img/chongnang3.png',NULL,NULL),(30,3,'product','collection','public/img/chongnang4.png',NULL,NULL),(31,3,'product','collection','public/img/chongnang5.png',NULL,NULL),(32,5,'product','collection','public/img/giaynika6.jpg',NULL,NULL),(33,5,'product','collection','public/img/giaynika7.jpg',NULL,NULL),(34,6,'product','collection','public/img/loabluetooth2.jpg',NULL,NULL),(35,6,'product','collection','public/img/loabluetooth3.jpg',NULL,NULL),(36,6,'product','collection','public/img/loabluetooth4.jpg',NULL,NULL),(37,6,'product','collection','public/img/loabluetooth5.jpg',NULL,NULL),(38,6,'product','collection','public/img/loabluetooth6.jpg',NULL,NULL),(39,6,'product','collection','public/img/loabluetooth7.jpg',NULL,NULL),(40,7,'product','collection','public/img/son1.png',NULL,NULL),(41,7,'product','collection','public/img/son2.png',NULL,NULL),(42,7,'product','collection','public/img/son3.png',NULL,NULL),(43,8,'product','collection','public/img/suaruamat2.png',NULL,NULL),(44,8,'product','collection','public/img/suaruamat3.png',NULL,NULL),(45,9,'product','collection','public/img/tinhchat2.png',NULL,NULL),(46,9,'product','collection','public/img/tinhchat3.png',NULL,NULL),(47,9,'product','collection','public/img/tinhchat4.png',NULL,NULL),(48,10,'product','collection','public/img/quankaki2.jpg',NULL,NULL),(49,10,'product','collection','public/img/quankaki3.jpg',NULL,NULL),(50,10,'product','collection','public/img/quankaki4.jpg',NULL,NULL),(51,10,'product','collection','public/img/quankaki5.jpg',NULL,NULL),(52,10,'product','collection','public/img/quankaki6.jpg',NULL,NULL),(53,11,'product','thumb','public/img/kemohui.jpg',NULL,NULL),(54,11,'product','collection','public/img/kemohui2.jpg',NULL,NULL),(55,11,'product','collection','public/img/kemohui3.jpg',NULL,NULL),(56,11,'product','collection','public/img/kemohui4.jpg',NULL,NULL),(57,12,'product','thumb','public/img/balo.jpg',NULL,NULL),(58,12,'product','collection','public/img/balo2.jpg',NULL,NULL),(59,12,'product','collection','public/img/balo3.jpg',NULL,NULL),(60,12,'product','collection','public/img/balo4.jpg',NULL,NULL),(61,13,'product','thumb','public/img/but.jpg',NULL,NULL),(62,13,'product','collection','public/img/but2.jpg',NULL,NULL),(63,13,'product','collection','public/img/but3.jpg',NULL,NULL),(64,13,'product','collection','public/img/but4.jpg',NULL,NULL),(65,13,'product','collection','public/img/but5.jpg',NULL,NULL),(66,14,'product','thumb','public/img/balonf.jpg',NULL,NULL),(67,14,'product','collection','public/img/balonf2.jpg',NULL,NULL),(68,14,'product','collection','public/img/balonf3.jpg',NULL,NULL),(69,14,'product','collection','public/img/balonf4.jpg',NULL,NULL),(70,15,'product','thumb','public/img/aothun1.jpg',NULL,NULL),(71,15,'product','collection','public/img/aothun2.jpg',NULL,NULL),(72,15,'product','collection','public/img/aothun3.jpg',NULL,NULL),(73,15,'product','collection','public/img/aothun5.jpg',NULL,NULL),(74,15,'product','collection','public/img/aothun6.jpg',NULL,NULL),(75,15,'product','collection','public/img/aothun4.jpg',NULL,NULL),(76,16,'product','thumb','public/img/aothuncool1.jpg',NULL,NULL),(77,16,'product','collection','public/img/aothuncool2.jpg',NULL,NULL),(78,16,'product','collection','public/img/aothuncool3.jpg',NULL,NULL),(79,16,'product','collection','public/img/aothuncool4.jpg',NULL,NULL),(80,16,'product','collection','public/img/aothuncool5.jpg',NULL,NULL),(81,17,'product','thumb','public/img/quanthethao.jpg',NULL,NULL),(82,17,'product','collection','public/img/quanthethao2.jpg',NULL,NULL),(83,17,'product','collection','public/img/quanthethao3.jpg',NULL,NULL),(84,17,'product','collection','public/img/quanthethao4.jpg',NULL,NULL),(85,18,'product','thumb','public/img/mubaohiem.jpg',NULL,NULL),(86,18,'product','collection','public/img/mubaohiem2.jpg',NULL,NULL),(87,18,'product','collection','public/img/mubaohiem3.jpg',NULL,NULL),(88,18,'product','collection','public/img/mubaohiem4.jpg',NULL,NULL),(89,18,'product','collection','public/img/mubaohiem5.jpg',NULL,NULL),(90,18,'product','collection','public/img/mubaohiem6.jpg',NULL,NULL),(91,18,'product','collection','public/img/mubaohiem7.jpg',NULL,NULL),(92,1,'user','avatar','public/img/avatar.png',NULL,NULL);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `price` decimal(19,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_detail_fk1_idx` (`order_id`),
  KEY `oder_detail_fk1_idx` (`product_type_id`),
  CONSTRAINT `order_detail_fk1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `order_detail_fk2` FOREIGN KEY (`product_type_id`) REFERENCES `product_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` VALUES (1,1,1,10,10000.00),(2,2,5,10,340200.00),(3,2,6,3,340200.00),(4,2,96,1,607500.00),(5,3,1,1,340200.00),(6,3,1,1,340200.00),(7,3,1,5,340200.00),(8,4,10,1,257600.00),(9,4,14,1,152000.00),(10,4,7,1,740700.00),(11,4,9,1,740700.00),(12,4,6,1,340200.00),(13,5,1,1,340200.00),(14,6,15,4,1414000.00);
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `order_detail_AFTER_INSERT` AFTER INSERT ON `order_details` FOR EACH ROW BEGIN
	set @quantity = NEW.quantity;
    set @product_type_id = NEW.product_type_id;
	update product_types
		set quantity = quantity - @quantity
	where (id = @product_type_id);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `order_detail_BEFORE_UPDATE` BEFORE UPDATE ON `order_details` FOR EACH ROW BEGIN
	set @orderId = NEW.order_id;
	set @product_type_id = NEW.product_type_id;
    set @quantityOld = (select quantity from order_details where product_type_id = @product_type_id and order_id = @orderId);
	update product_types
		set quantity = quantity + @quantityOld
	where (id = @product_type_id);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `order_detail_AFTER_UPDATE` AFTER UPDATE ON `order_details` FOR EACH ROW BEGIN
	set @product_type_id = NEW.product_type_id;
    set @quantityNew = NEW.quantity;
	update product_types
		set quantity = quantity - @quantityNew
	where (id = @product_type_id);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `order_detail_AFTER_DELETE` AFTER DELETE ON `order_details` FOR EACH ROW BEGIN
	set @quantity = OLD.quantity;
    set @product_type_id = OLD.product_type_id;
	update product_types
		set quantity = quantity + @quantity
	where (id = @product_type_id);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orderId_UNIQUE` (`id`),
  KEY `MSKH` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,'0000-00-00 00:00:00','done'),(2,1,'2021-10-09 19:18:09','waiting'),(3,1,'2021-10-09 19:48:58','waiting'),(4,1,'2021-10-18 13:33:27','waiting'),(5,1,'2021-10-18 13:36:47','waiting'),(6,1,'2021-10-30 19:50:36','waiting');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `svg_icon` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_categories`
--

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
INSERT INTO `product_categories` VALUES (1,'Thời trang','<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"2 0 28 28\"><path fill=\"#ffcc5c\" d=\"M21.057 11.311L15.5 10l-5.502 1.3c-2.986.595-4.801 1.636-4.801 2.751 0 1.785 4.651 3.253 10.303 3.253s10.303-1.469 10.303-3.253c0-1.108-1.792-2.142-4.746-2.74z\"/><path fill=\"#f7b546\" d=\"M21.057 11.311L15.5 10l-1.999.472 3.555.839c2.954.597 4.746 1.632 4.746 2.74 0 1.569-3.594 2.893-8.303 3.19.648.041 1.316.063 2 .063 5.652 0 10.303-1.469 10.303-3.253.001-1.108-1.791-2.142-4.745-2.74z\"/><path fill=\"#ffcc5c\" d=\"M20.148 6.663a1.791 1.791 0 0 0-2.732-1.056l-.425.283a2.688 2.688 0 0 1-2.982 0l-.425-.283a1.792 1.792 0 0 0-2.732 1.056L9.677 13.48c0 1.016 2.607 1.839 5.823 1.839s5.823-.823 5.823-1.839l-1.175-6.817z\"/><path fill=\"#f7b546\" d=\"M20.148 6.663c-.244-.975-1.21-1.502-2.117-1.305.044.098.09.195.117.305l1.175 6.817c0 1.016-2.607 1.839-5.823 1.839-1.386 0-2.657-.153-3.656-.409.614.808 2.91 1.409 5.656 1.409 3.216 0 5.823-.823 5.823-1.839l-1.175-6.817z\"/><path fill=\"#4c6d86\" d=\"M20.995 11.578c-.049.946-2.489 1.708-5.495 1.708s-5.446-.762-5.495-1.708l-.328 1.902c0 1.016 2.607 1.839 5.823 1.839s5.823-.823 5.823-1.839l-.328-1.902z\"/><path fill=\"#41667d\" d=\"M20.995 11.578c-.026.493-.71.933-1.777 1.244-.509.852-2.873 1.497-5.719 1.497-1.386 0-2.657-.153-3.656-.409.228.3.689.571 1.318.793l.042.014c.205.071.426.137.663.198l.022.005a11.28 11.28 0 0 0 .787.166c.253.044.519.082.793.114l.141.016a17.297 17.297 0 0 0 1.891.101c3.216 0 5.823-.823 5.823-1.839l-.328-1.9z\"/><path fill=\"#d5e5f1\" d=\"M14.092 24c.207-.581.757-1 1.408-1s1.201.419 1.408 1h1.042c-.232-1.14-1.242-2-2.449-2s-2.217.86-2.449 2h1.04zM19.5 21.304h-8a.5.5 0 0 1 0-1h8a.5.5 0 0 1 0 1z\"/><path fill=\"#99b5ce\" d=\"M16.014 22.059c-.003.045-.014.088-.014.134v.333c0 .206.035.403.066.6a1.5 1.5 0 0 1 .841.874h1.042a2.502 2.502 0 0 0-1.935-1.941zM16.232 21.304H19.5a.5.5 0 0 0 0-1h-1.611c-.72 0-1.338.408-1.657 1zM11 20.804a.5.5 0 0 0 .5.5h3.268a1.88 1.88 0 0 0-1.657-1H11.5a.5.5 0 0 0-.5.5zM13.051 24h1.042c.143-.401.456-.715.847-.877.031-.196.06-.392.06-.597v-.333c0-.046-.01-.089-.014-.134A2.502 2.502 0 0 0 13.051 24z\"/><path fill=\"#3c3b42\" d=\"M20.278 26.304h1.667a1.89 1.89 0 0 0 1.889-1.889v-2.852a1.26 1.26 0 0 0-1.259-1.259H18.39a1.89 1.89 0 0 0-1.889 1.889v.333c0 1.143.508 2.168 1.31 2.86a3.756 3.756 0 0 0 2.467.918z\"/><path fill=\"#d5e5f1\" d=\"M24.333 22.138h-1a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1z\"/><path fill=\"#2b2a2f\" d=\"M17.65 20.454a1.89 1.89 0 0 0-.15.739v.333a3.778 3.778 0 0 0 3.778 3.778h1.667c.262 0 .512-.054.739-.15a1.89 1.89 0 0 1-1.739 1.15h-1.667a3.778 3.778 0 0 1-3.778-3.778v-.333a1.89 1.89 0 0 1 1.15-1.739z\"/><path fill=\"#3c3b42\" d=\"M10.722 26.304H9.056a1.89 1.89 0 0 1-1.889-1.889v-2.852a1.26 1.26 0 0 1 1.259-1.259h4.185a1.89 1.89 0 0 1 1.889 1.889v.333a3.777 3.777 0 0 1-3.778 3.778z\"/><path fill=\"#2b2a2f\" d=\"M13.35 20.454c.096.227.15.476.15.739v.333a3.778 3.778 0 0 1-3.778 3.778H8.056c-.262 0-.512-.054-.739-.15a1.89 1.89 0 0 0 1.739 1.15h1.667a3.778 3.778 0 0 0 3.778-3.778v-.333a1.892 1.892 0 0 0-1.151-1.739z\"/><path fill=\"#d5e5f1\" d=\"M7.667 22.138h-1a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1z\"/><path fill=\"#99b5ce\" d=\"M7.667 21.138h-.5a.5.5 0 0 1 0 1h.5a.5.5 0 0 0 0-1zM23.333 22.138h.5a.5.5 0 0 1 0-1h-.5a.5.5 0 0 0 0 1z\"/></svg>'),(2,'Giày','<svg xmlns=\"http://www.w3.org/2000/svg\" enable-background=\"new 0 0 47.5 47.5\" viewBox=\"-2 12 48 48\"><defs><clipPath id=\"a\" clipPathUnits=\"userSpaceOnUse\"><path d=\"M 0,38 38,38 38,0 0,0 0,38 Z\"/></clipPath></defs><g clip-path=\"url(#a)\" transform=\"matrix(1.25 0 0 -1.25 0 47.5)\"><path fill=\"#ccd6dd\" d=\"m 0,0 c 0,-0.828 -0.672,-1.5 -1.5,-1.5 l -33,0 c -0.829,0 -1.5,0.672 -1.5,1.5 0,0.828 0.671,1.5 1.5,1.5 l 33,0 C -0.672,1.5 0,0.828 0,0\" transform=\"translate(37 2.5)\"/><path fill=\"#55acee\" d=\"m 0,0 c 0,0 -0.522,-0.063 -1.05,-2.158 -0.526,-2.089 -0.342,-4.063 -0.344,-6.656 -0.001,-0.671 1.045,-1.082 1.045,-1.082 L 33.17,-9.937 c 0,0 1.048,0.443 1.048,1.079 0.003,1.354 -0.67,5.237 -5.071,5.237 -1.047,0 -5.27,-0.049 -8.537,2.341 -1.208,0.882 -5.86,2.852 -7.953,3.934 C 10.563,3.738 10.473,-1.094 6.283,-1.088 2.094,-1.082 2.095,-0.004 0,0\" transform=\"translate(2.452 13.613)\"/><path fill=\"#269\" d=\"M 0,0 -0.61,1.783 C 2.086,2.706 3.007,4.471 3.045,4.545 L 4.736,3.714 C 4.686,3.611 3.475,1.189 0,0\" transform=\"translate(13.312 9.98)\"/><path fill=\"#269\" d=\"M 0,0 -0.611,1.783 C 2.086,2.707 3.031,4.52 3.04,4.537 L 4.735,3.713 C 4.684,3.61 3.473,1.19 0,0\" transform=\"translate(18.043 7.697)\"/><path fill=\"#3b88c3\" d=\"m 0,0 -34,0 c -0.552,0 -1,0.447 -1,1 0,0.553 0.448,1 1,1 L 0,2 C 0.553,2 1,1.553 1,1 1,0.447 0.553,0 0,0\" transform=\"translate(36 3)\"/></g></svg>'),(3,'Đồ điện tử','<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"32\" height=\"3\" viewBox=\"0 0 32 32\"><g style=\"line-height:125%\" font-family=\"sans-serif\" font-size=\"45.121\" font-weight=\"400\" letter-spacing=\"0\" transform=\"translate(0 -1020.362)\" word-spacing=\"0\"><path style=\"isolation:auto;mix-blend-mode:normal\" fill=\"#f8b84e\" d=\"m 6.9999995,1030.0477 c -1.2995888,1.8494 -1.9979228,4.0542 -2,6.3145 0.00488,2.2556 0.7030862,4.4553 2,6.3008 z M 25,1030.0614 l 0,12.6153 c 1.299589,-1.8494 1.997923,-4.0542 2,-6.3145 -0.0049,-2.2556 -0.703086,-4.4553 -2,-6.3008 z\" color=\"#000\" overflow=\"visible\"/><path d=\"m 8.5,1022.3613 a 0.50005,0.50005 0 0 0 -0.5,0.5 l 0,27 a 0.50005,0.50005 0 0 0 0.5,0.5 l 15,0 a 0.50005,0.50005 0 0 0 0.5,-0.5 l 0,-27 a 0.50005,0.50005 0 0 0 -0.5,-0.5 l -15,0 z m 0.5,1 14,0 0,26 -14,0 0,-26 z\" color=\"#000\" font-size=\"medium\" overflow=\"visible\" style=\"line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal\"/><path style=\"line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal\" fill-rule=\"evenodd\" d=\"m 14,1024.3613 0,1 4,0 0,-1 -4,0 z\" color=\"#000\" font-size=\"medium\" overflow=\"visible\"/><path style=\"isolation:auto;mix-blend-mode:normal\" fill=\"#25b39e\" d=\"m 10,1026.3622 12,0 0,19 -12,0 z\" color=\"#000\" overflow=\"visible\"/><path d=\"m 17,1047.3622 a 1,1 0 0 1 -1,1 1,1 0 0 1 -1,-1 1,1 0 0 1 1,-1 1,1 0 0 1 1,1 z\" color=\"#000\" overflow=\"visible\" style=\"isolation:auto;mix-blend-mode:normal\"/><path style=\"isolation:auto;mix-blend-mode:normal\" fill=\"#f8b84e\" d=\"m 21.495404,1036.3634 a 4.9999871,4.9999871 0 0 1 -4.999987,5 4.9999871,4.9999871 0 0 1 -4.999987,-5 4.9999871,4.9999871 0 0 1 4.999987,-5 4.9999871,4.9999871 0 0 1 4.999987,5 z\" color=\"#000\" overflow=\"visible\"/><path d=\"m 10.503906,1031.375 0,1 0.5,0 0.703125,0 0.5,0 0,-1 -0.5,0 -0.703125,0 -0.5,0 z m 1.726563,0.9863 0,1 0.5,0 6.576172,0 -0.972657,3 -4.804687,0 -0.5,0 0,1 0.5,0 5.167969,0 a 0.50005,0.50005 0 0 0 0.474609,-0.3457 l 1.298828,-4 a 0.50005,0.50005 0 0 0 -0.474609,-0.6543 l -7.265625,0 -0.5,0 z\" color=\"#000\" font-size=\"medium\" overflow=\"visible\" style=\"line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal\"/><path d=\"m 12.138672,1031.3613 a 0.50005,0.50005 0 0 0 -0.458984,0.6231 l 1.679687,7 a 0.50005,0.50005 0 0 0 0.486328,0.3847 l 4.154297,0 a 0.50005,0.50005 0 1 0 0,-1 l -3.759766,0 -1.589843,-6.6171 a 0.50005,0.50005 0 0 0 -0.511719,-0.3907 z\" color=\"#000\" font-size=\"medium\" overflow=\"visible\" style=\"line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal\"/><path d=\"M13.960938 1038.3652c-.82209 0-1.498066.676-1.498047 1.4981-.000019.8221.675957 1.5 1.498047 1.5.822089 0 1.500018-.6779 1.5-1.5.000018-.8221-.677911-1.4981-1.5-1.4981zm0 1c.281375 0 .500006.2162.5.4981.000006.2819-.218625.5-.5.5-.281376 0-.498054-.2181-.498047-.5-.000007-.2819.216671-.4981.498047-.4981zM17.917969 1038.3652c-.82209 0-1.500018.676-1.5 1.4981-.000018.8221.67791 1.5 1.5 1.5.822089 0 1.498065-.6779 1.498047-1.5.000018-.8221-.675958-1.4981-1.498047-1.4981zm0 1c.281375 0 .498053.2162.498047.4981.000006.2819-.216672.5-.498047.5-.281375 0-.500006-.2181-.5-.5-.000006-.2819.218625-.4981.5-.4981z\" color=\"#000\" font-size=\"medium\" overflow=\"visible\" style=\"line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal\"/><path style=\"line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal\" fill-rule=\"evenodd\" d=\"m 15.859375,1034.3613 0,1 3.595703,0 0,-1 -3.595703,0 z\" color=\"#000\" font-size=\"medium\" overflow=\"visible\"/><path d=\"M25.886719 1029.8242l.261719.4278.464843.7636.0078.012.02148.047.226563.4453.892578-.4511-.226563-.4473-.04102-.08-.01953-.033-.472656-.7773-.261719-.4258zm1.371093 2.5332l.154297.4746.169922.5215.002 0 .0957.3985.117187.4863.972656-.2344-.117187-.4863-.09766-.4024-.0098-.037-.181641-.5586-.154297-.4746zm.671876 2.7988l.04297.4981.01563.1953.0059.7656.0059.5 1-.01-.0059-.5-.0059-.7812-.002-.037-.01758-.2188-.04297-.498zm-.140626 3.3321l-.152343.6816-.07617.25-.146485.4785.957032.293.144531-.4785.08203-.2695.0098-.037.158203-.7011.107422-.4883L27.898438 1038zm-.923828 2.7226l-.144531.3028-.0039.01-.310547.5312-.251953.4317.863281.5058.251953-.4316.314453-.5391.01758-.035.164063-.3379.21875-.4512-.900391-.4355zM6.1132812 1029.8242l-.2617187.4278-.4648437.7636-.00781.012-.021484.047-.2265625.4453-.8925782-.4511.2265626-.4473.041016-.08.019531-.033.4726563-.7773.2617187-.4258zm-1.3710937 2.5332l-.1542969.4746-.1699218.5215-.00195 0-.095703.3985-.1171875.4863-.9726562-.2344.1171874-.4863.097656-.4024.00977-.037.1816407-.5586.1542968-.4746zm-.671875 2.7988l-.042969.4981-.015625.1953-.00586.7656-.00586.5-1-.01.00586-.5.00586-.7812.00195-.037.017578-.2188.042969-.498zm.140625 3.3321l.1523437.6816.076172.25.1464844.4785-.9570313.293-.1445312-.4785-.082031-.2695-.00977-.037-.1582031-.7011-.1074219-.4883L4.1015625 1038zm.9238281 2.7226l.1445313.3028.00391.01.3105469.5312.2519531.4317-.8632812.5058-.2519531-.4316-.3144532-.5391-.017578-.035-.1640625-.3379-.21875-.4512.9003906-.4355z\" color=\"#000\" font-size=\"medium\" overflow=\"visible\" style=\"line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal\"/></g></svg>'),(4,'Sách','<svg xmlns=\"http://www.w3.org/2000/svg\" data-name=\"Layer 1\" viewBox=\"0 -5 76 76\"><path fill=\"#efd3b4\" stroke=\"#5f363a\" stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"3\" d=\"M24.33,31.85h12a0,0,0,0,1,0,0V69.5a6,6,0,0,1-6,6h0a6,6,0,0,1-6-6V31.85a0,0,0,0,1,0,0Z\" transform=\"rotate(90 30.345 53.685)\"/><path fill=\"#ffdd7d\" stroke=\"#5f363a\" stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"3\" d=\"M55.49,46.67a1,1,0,0,1-1,1h-40a6,6,0,0,0-6,6V10.32a6,6,0,0,1,6-6h40a1,1,0,0,1,1,1Z\"/><line x1=\"52.18\" x2=\"17.56\" y1=\"53.69\" y2=\"53.69\" fill=\"none\" stroke=\"#5f363a\" stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"3\"/><polygon fill=\"#cbc46d\" stroke=\"#5f363a\" stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"3\" points=\"29.55 21.96 24.05 18.01 18.55 21.96 18.55 4.3 29.55 4.3 29.55 21.96\"/><line x1=\"55.49\" x2=\"52.18\" y1=\"59.7\" y2=\"59.7\" fill=\"none\" stroke=\"#5f363a\" stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"3\"/></svg>'),(5,'Quà tặng','<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 37 37\"><g font-family=\"sans-serif\" font-size=\"45.121\" font-weight=\"400\" letter-spacing=\"0\" transform=\"translate(0 -1020.362)\" word-spacing=\"0\" style=\"line-height:125%\"><path fill=\"#25b39e\" stroke=\"#000\" stroke-dashoffset=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" style=\"isolation:auto;mix-blend-mode:normal\" d=\"M3.5 1027.8622l25 0 0 5-25 0zM4.5 1032.8622l23 0 0 16.9999-23 0z\" color=\"#000\" overflow=\"visible\"/><path fill=\"#f8b84e\" stroke=\"#000\" stroke-dashoffset=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" style=\"isolation:auto;mix-blend-mode:normal\" d=\"M14.5 1027.8622l3 0 0 21.9999-3 0zM18.174545 1023.8622a4.521091 4.5758314 0 0 1 2.325455 4l-4.521091 0z\" color=\"#000\" overflow=\"visible\"/><path fill=\"#f8b84e\" stroke=\"#000\" stroke-dashoffset=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" style=\"isolation:auto;mix-blend-mode:normal\" d=\"m 13.825456,1023.8622 a 4.521091,4.5758314 0 0 0 -2.325456,4 l 4.521091,0 z\" color=\"#000\" overflow=\"visible\"/><path fill=\"none\" stroke=\"#000\" d=\"m 14,1032.8622 4,0\"/></g></svg>'),(6,'Mỹ phẩm','<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 -5 52 52\"><symbol id=\"New_Symbol_14\" viewBox=\"-6.5 -6.5 13 13\"><path fill=\"#ffd4c3\" stroke=\"#504b46\" stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-miterlimit=\"10\" d=\"M0-6c2.2 0 4.1 1.5 4.7 3.5C6.3-2.5 6.4 0 5 0v1c0 2.8-2.2 5-5 5s-5-2.2-5-5V0c-1.4 0-1.3-2.5.2-2.5C-4.1-4.5-2.2-6 0-6z\"/><circle cx=\"-1.6\" cy=\"-.1\" r=\".1\" fill=\"#ffc258\"/><path fill=\"#4f4b45\" d=\"M-1.6.5c-.3 0-.6-.3-.6-.6s.2-.7.6-.7c.3 0 .6.3.6.7s-.3.6-.6.6z\"/><circle cx=\"1.6\" cy=\"-.1\" r=\".1\" fill=\"#ffc258\"/><path fill=\"#4f4b45\" d=\"M1.6.5C1.3.5 1 .2 1-.1s.3-.6.6-.6.6.3.6.6-.2.6-.6.6z\"/><circle cx=\"-3\" cy=\"-1.5\" r=\".5\" fill=\"#fabfa5\"/><circle cx=\"3\" cy=\"-1.5\" r=\".5\" fill=\"#fabfa5\"/><path fill=\"none\" stroke=\"#504b46\" stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-miterlimit=\"10\" d=\"M-1.2-3c.8-.5 1.7-.5 2.5 0\"/></symbol><g id=\"Icons\"><g id=\"XMLID_1868_\"><ellipse id=\"XMLID_6800_\" cx=\"24\" cy=\"40.8\" fill=\"#45413c\" opacity=\".15\" rx=\"13.6\" ry=\"1.9\"/><path id=\"XMLID_421_\" fill=\"#ff6196\" d=\"M24 35.2s-4.2.3-11.5-4.8c-4.5-3.1-7.7-4.9-9.2-5.7-.6-.3-1-.9-1-1.6 0-.6.3-1.2.8-1.5 2-1.3 7.5-5.3 11-10.9C20 1.4 24 7.1 24 7.1s4-5.7 9.8 3.6c3.5 5.6 9 9.6 11 10.9.5.3.8.9.8 1.5 0 .7-.4 1.3-1 1.6-1.5.8-4.7 2.6-9.2 5.7-7.2 5.1-11.4 4.8-11.4 4.8z\"/><path id=\"XMLID_515_\" fill=\"#ff87af\" d=\"M2.4 23.2c0 .4.4.7.9.8 1.5.4 4.7 1.4 9.2 3.2 7.3 2.9 11.5 2.7 11.5 2.7s4.2.2 11.5-2.7c4.5-1.8 7.7-2.8 9.2-3.2.6-.2.9-.5.9-.8H2.4z\"/><path id=\"XMLID_514_\" fill=\"#ff87af\" d=\"M3.3 24.7s.1 0 .1.1c2.2-1.5 7.4-5.3 10.7-10.7 3.5-5.6 6.3-5.8 8-5 1.1.5 2.4.5 3.5 0 1.7-.7 4.5-.5 8 5 3.4 5.4 8.5 9.3 10.7 10.7 0 0 .1 0 .1-.1.6-.3 1-.9 1-1.6 0-.6-.3-1.2-.8-1.5-2-1.3-7.5-5.3-11-10.9C28 1.4 24 7.1 24 7.1s-4-5.7-9.8 3.6c-3.5 5.6-9 9.6-11 10.9-.5.3-.8.9-.8 1.5 0 .7.4 1.3.9 1.6z\"/><path id=\"XMLID_420_\" fill=\"none\" stroke=\"#45413c\" stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-miterlimit=\"10\" d=\"M24 35.2s-4.2.3-11.5-4.8c-4.5-3.1-7.7-4.9-9.2-5.7-.6-.3-1-.9-1-1.6 0-.6.3-1.2.8-1.5 2-1.3 7.5-5.3 11-10.9C20 1.4 24 7.1 24 7.1s4-5.7 9.8 3.6c3.5 5.6 9 9.6 11 10.9.5.3.8.9.8 1.5 0 .7-.4 1.3-1 1.6-1.5.8-4.7 2.6-9.2 5.7-7.2 5.1-11.4 4.8-11.4 4.8z\"/><path id=\"XMLID_511_\" fill=\"#525252\" stroke=\"#45413c\" stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-miterlimit=\"10\" d=\"M24 23.2c3.5 0 4.6.1 10.8.7s10.8-.7 10.8-.7-5.3-.7-10.8-3.5-7.5-3.5-10.8-3.5c-3.3 0-5.3.8-10.8 3.5-5.5 2.8-10.8 3.5-10.8 3.5s4.6 1.3 10.8.7 7.3-.7 10.8-.7z\"/><path id=\"XMLID_510_\" fill=\"#fff\" stroke=\"#45413c\" stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-miterlimit=\"10\" d=\"M24 20.7c4.2 0 8.3-.1 12.1-.3-.4-.2-.9-.4-1.3-.6-5.5-2.8-7.5-3.5-10.8-3.5-3.3 0-5.3.8-10.8 3.5-.4.2-.9.4-1.3.6 3.8.2 7.9.3 12.1.3z\"/></g></g></svg>');
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_ratings`
--

DROP TABLE IF EXISTS `product_ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `star` tinyint(4) NOT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_rating_fk1_idx` (`user_id`),
  KEY `product_rating_fk2_idx` (`product_type_id`),
  CONSTRAINT `product_rating_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_ratings`
--

LOCK TABLES `product_ratings` WRITE;
/*!40000 ALTER TABLE `product_ratings` DISABLE KEYS */;
INSERT INTO `product_ratings` VALUES (1,1,1,4,'Tạm ổn, chất lượng vải khá tốt nhưng may chưa được đẹp',NULL,NULL),(2,1,1,5,'Áo đẹp nha mụi ngừ !!!',NULL,NULL),(3,1,1,3,'Buồn nên cho 3 sao',NULL,NULL),(4,7,1,4,'ok',NULL,NULL),(5,1,1,4,'2222',NULL,NULL);
/*!40000 ALTER TABLE `product_ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_types`
--

DROP TABLE IF EXISTS `product_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `label` varchar(20) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(19,2) NOT NULL,
  `freight_cost` decimal(19,2) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_type_fk1_idx` (`product_id`),
  CONSTRAINT `fk1_product_type` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_types`
--

LOCK TABLES `product_types` WRITE;
/*!40000 ALTER TABLE `product_types` DISABLE KEYS */;
INSERT INTO `product_types` VALUES (1,1,'Kích cỡ','Size 39',206,378000.00,NULL,NULL),(2,1,'Kích cỡ','Size 40',240,378000.00,NULL,NULL),(3,1,'Kích cỡ','Size 41',120,378000.00,NULL,NULL),(4,1,'Kích cỡ','Size 40',120,378000.00,NULL,NULL),(5,1,'Kích cỡ','Size 41',110,378000.00,NULL,NULL),(6,1,'Kích cỡ','Size 42',116,378000.00,NULL,NULL),(7,2,'Kích cỡ','Size M',49,823000.00,NULL,NULL),(8,2,'Kích cỡ','Size L',25,823000.00,NULL,NULL),(9,2,'Kích cỡ','Size XL',24,823000.00,NULL,NULL),(10,3,'Loại','300g',19,322000.00,NULL,NULL),(11,3,'Loại','400g',20,610000.00,NULL,NULL),(12,3,'Loại','500g',20,78100.00,NULL,NULL),(13,3,'Loại','200g',20,210000.00,NULL,NULL),(14,3,'Loại','100g',32,190000.00,NULL,NULL),(15,4,'Kích cỡ','Size 39',21,2020000.00,NULL,NULL),(16,4,'Kích cỡ','Size 40',25,2020000.00,NULL,NULL),(17,4,'Kích cỡ','Size 41',25,2020000.00,NULL,NULL),(18,4,'Kích cỡ','Size 42',25,2020000.00,NULL,NULL),(19,5,'Kích cỡ','Size 38',32,1521000.00,NULL,NULL),(20,5,'Kích cỡ','Size 39',230,1521000.00,NULL,NULL),(21,5,'Kích cỡ','Size 40',123,1521000.00,NULL,NULL),(22,5,'Kích cỡ','Size 41',322,1521000.00,NULL,NULL),(62,5,'Kích cỡ','Size 42',0,1521000.00,NULL,NULL),(63,6,'Nguồn gốc','Nhập khẩu',124,760000.00,NULL,NULL),(64,6,'Nguồn gốc','Chính hãng',752,980000.00,NULL,NULL),(65,7,'Màu sắc','Màu đỏ',74,340000.00,NULL,NULL),(66,7,'Màu sắc','Màu hồng',14,348000.00,NULL,NULL),(67,8,'Loại','Chai 200ml',23,150000.00,NULL,NULL),(68,8,'Loại','Chai 400ml',57,230000.00,NULL,NULL),(69,8,'Loại','Chai 700ml',98,340000.00,NULL,NULL),(70,9,'Kích cỡ','Size M',45,670000.00,NULL,NULL),(71,10,'Kích cỡ','Size 29',54,341000.00,NULL,NULL),(72,10,'Kích cỡ','Size 30',34,341000.00,NULL,NULL),(73,10,'Kích cỡ','Size 31',965,341000.00,NULL,NULL),(74,10,'Kích cỡ','Size 32',346,341000.00,NULL,NULL),(81,11,NULL,'',123,299000.00,NULL,NULL),(91,12,'Màu sắc','Màu đen',100,567000.00,NULL,NULL),(92,12,'Màu sắc','Màu bạc',100,567000.00,NULL,NULL),(93,12,'Màu sắc','Màu xanh',100,567000.00,NULL,NULL),(94,12,'Màu sắc','Màu đỏ',100,567000.00,NULL,NULL),(95,13,'Màu sắc','Vàng',100,890000.00,NULL,NULL),(96,13,'Màu sắc','Vàng + đen',99,810000.00,NULL,NULL),(97,13,'Màu sắc','Vàng + trắng',100,700000.00,NULL,NULL),(98,13,'Màu sắc','Vàng + bạc',100,760000.00,NULL,NULL),(99,14,NULL,NULL,300,978000.00,NULL,NULL),(100,15,'Kích cỡ','Size M',100,341000.00,NULL,NULL),(101,15,'Kích cỡ','Size L',100,341000.00,NULL,NULL),(102,15,'Kích cỡ','Size XL',100,341000.00,NULL,NULL),(103,15,'Kích cỡ','Size XXL',100,341000.00,NULL,NULL),(104,16,'Kích cỡ','Size M',100,341000.00,NULL,NULL),(105,16,'Kích cỡ','Size L',100,341000.00,NULL,NULL),(106,16,'Kích cỡ','Sile XL',100,341000.00,NULL,NULL),(107,16,'Kích cỡ','Size XXL',100,341000.00,NULL,NULL),(108,16,'Màu sắc','Màu đỏ',100,341000.00,NULL,NULL),(109,16,'Màu sắc','Màu đen',100,341000.00,NULL,NULL),(110,16,'Màu sắc','Màu xanh đậm',100,341000.00,NULL,NULL),(111,16,'Màu sắc','Màu tím than',100,341000.00,NULL,NULL),(112,16,'Màu sắc','Màu xám',100,341000.00,NULL,NULL),(113,16,'Màu sắc','Màu đỏ đô',100,341000.00,NULL,NULL),(114,17,'Kích cỡ','Size M',100,241000.00,NULL,NULL),(115,17,'Kích cỡ','Size L',100,241000.00,NULL,NULL),(116,17,'Kích cỡ','Size XL',100,241000.00,NULL,NULL),(117,17,'Kích cỡ','Size XXL',100,241000.00,NULL,NULL),(118,17,'Màu sắc','Màu đỏ',100,241000.00,NULL,NULL),(119,17,'Màu sắc','Màu đen',100,241000.00,NULL,NULL),(120,17,'Màu sắc','Màu xanh đậm',100,241000.00,NULL,NULL),(121,17,'Màu sắc','Màu tím than',100,241000.00,NULL,NULL),(122,17,'Màu sắc','Màu xám',100,241000.00,NULL,NULL),(123,17,'Màu sắc','Màu đỏ đô',100,241000.00,NULL,NULL),(124,18,'Kích cỡ','Size M',100,669000.00,NULL,NULL),(125,18,'Kích cỡ','Size L',100,669000.00,NULL,NULL),(126,18,'Kích cỡ','Size XL',100,669000.00,NULL,NULL),(127,18,'Kích cỡ','Size XXL',100,669000.00,NULL,NULL),(128,18,'Màu sắc','Màu đỏ',100,669000.00,NULL,NULL),(129,18,'Màu sắc','Màu đen',100,669000.00,NULL,NULL),(130,18,'Màu sắc','Màu xanh đậm',100,669000.00,NULL,NULL),(131,18,'Màu sắc','Màu tím than',100,669000.00,NULL,NULL),(132,18,'Màu sắc','Màu xám',100,669000.00,NULL,NULL),(133,18,'Màu sắc','Màu đỏ đô',100,669000.00,NULL,NULL);
/*!40000 ALTER TABLE `product_types` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `product_type_AFTER_INSERT` AFTER INSERT ON `product_types` FOR EACH ROW BEGIN
	set @product_id = NEW.product_id;
    set @quantityNew = NEW.quantity;
    -- Check null
    set @product_quantity = (select quantity from products where id = @product_id);
	IF @product_quantity IS NULL THEN
			update products
				set quantity = @quantityNew
			where (id = @product_id);
	ELSE
			update products
				set quantity = quantity + @quantityNew
			where (id = @product_id);
	END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `product_type_BEFORE_UPDATE` BEFORE UPDATE ON `product_types` FOR EACH ROW BEGIN
	set @id = NEW.id;
	set @product_id = NEW.product_id;
    set @quantityOld = (select quantity from product_types where id = @id);
	update products
		set quantity = quantity - @quantityOld
	where (id = @product_id);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `product_type_AFTER_UPDATE` AFTER UPDATE ON `product_types` FOR EACH ROW BEGIN
	set @id = NEW.id;
	set @product_id = NEW.product_id;
    set @quantityNew = NEW.quantity;
	update products
		set quantity = quantity + @quantityNew
	where (id = @product_id);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `product_type_AFTER_DELETE` AFTER DELETE ON `product_types` FOR EACH ROW BEGIN
	set @product_id = OLD.product_id;
    set @quantityOld = OLD.quantity;
	update products
		set quantity = quantity - @quantityOld
		where (id = @product_id);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_id` int(11) NOT NULL,
  `name` varchar(400) CHARACTER SET utf8mb4 NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 NOT NULL,
  `discount` decimal(3,2) DEFAULT NULL,
  `source` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `send_from` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `sold` int(11) DEFAULT '0',
  `brand` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `date` datetime DEFAULT NULL,
  `rating` float(2,1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_fk2_idx` (`product_category_id`),
  CONSTRAINT `fk1_product` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,'Giày thể thao Bitas Hunter X White Collection',744,'BỘ ĐẾ LITEFOAM 2.0 CÙNG CÔNG NGHỆ LITEKNIT SIÊU THOÁNG KHÍ ? Giày Thể Thao Biti\'s Hunter Core 2k20 với công nghệ LiteFoam độc quyền từ Biti\'s Hunter mang đến những cải tiến vượt bậc \"Nhẹ như bay\", chất liệu quen thuộc cải tiến với thiết kế cổ vớ mang đến vẻ ngoài thời trang, năng động, êm ái và tăng chiều cao đế đến 4.3cm mang đến cảm giác mới mẻ. ? Dòng sản phẩm cở bản vẫn tiếp tục giữ những ưu điểm trong tính năng được ưa chuộng: + Mũ quai dệt Liteknit nhẹ, siêu thoáng, co dãn tốt và ôm sát chân trong mỗi chuyển động, đem lại cảm giác vừa vặn với đôi chân. ? Đế tiếp LiteFoam 2.0 đảm bảo tính ma sát và trải nghiệm tuyệt vời hơn trên từng chuyển động: + Chất liệu Phylon: Nhẹ như bay. + Chiều cao có thể đạt tới 4.3cm. + Độ đàn hồi >40%. Điều kiện và thời gian bảo hành: Thời gian hỗ trợ bảo hành kể từ ngày mua hàng: 3 tháng kể từ ngày mua hàng. Điều kiện áp dụng: Khách hàng mua sản phẩm Biti’s sẽ được bảo hành miễn phí đối với các trường hợp sau: Hở keo, dứt chỉ, gãy móc khoá, bung hoạ tiết trang trí (nơ, nút, hoa, …) Khi bảo hành khách hàng phải cung cấp hóa đơn (phiếu xuất hàng) và phiếu bảo hành của sản phẩm. Thời gian xử lý bảo hành: Từ 1 đến 20 ngày làm việc kể từ ngày nhà máy nhận được sản phẩm tùy mức độ hư hỏng của giày dép. Không hỗ trợ đối với những sản phẩm có thông báo: không áp dụng đổi trả - bảo hành. Địa điểm tiếp nhận bảo hành: Tại tất cả các cửa hàng tiếp thị của Biti’s trên toàn quốc. Kho online của Biti’s tại địa chỉ: 95/6 Trần Văn Kiểu, P.10, Q.6 Lưu ý: Trường hợp hết thời gian bảo hành, giày dép hư hỏng do hao mòn tự nhiên hoặc bị tác động mạnh từ bên ngoài CHTT tiếp nhận bảo hành tuy nhiên chi phí sửa chữa và vận chuyển khách hàng thanh toán. Hàng chậm, Xu hướng chậm không được bảo hành. BẢNG SIZE CHART Độ dài chân 99-105mm : Size 18 Độ dài chân 106-112mm : Size 19 Độ dài chân 112-118mm : Size 20 Độ dài chân 119-125mm : Size 21 Độ dài chân 125-131mm : Size 22 Độ dài chân 132-138mm : Size 23 Độ dài chân 139-145mm : Size 24 Độ dài chân 145-151mm : Size 25 Độ dài chân 152-158mm : Size 26 Độ dài chân 159-165mm : Size 27 Độ dài chân 165-171mm : Size 28 Độ dài chân 172-178mm : Size 29 Độ dài chân 179-185mm : Size 30 Độ dài chân 185-191mm : Size 31 Độ dài chân 192-198mm : Size 32 Độ dài chân 199-205mm : Size 33 Độ dài chân 205-211mm : Size 34 Độ dài chân 212-218mm : Size 35 Độ dài chân 219-225mm : Size 36 Độ dài chân 225-231mm : Size 37 Độ dài chân 232-238mm : Size 38 Độ dài chân 239-245mm : Size 39 Độ dài chân 245-251mm : Size 40 Độ dài chân 252-258mm : Size 41 Độ dài chân 259-265mm : Size 42 Độ dài chân 266-272mm : Size 43 Độ dài chân 272-278mm : Size 44 Độ dài chân 279-285mm : Size 45',0.10,'Trung Quốc','TP. Hồ Chí Minh',1,'Bitas','2020-03-03 01:01:10',4.0),(2,1,'Áo Khoác Bomber Ny Full Da Unisex',NULL,'Áo, Quần form rộng, mặc cực thoải mái cho cả Nam lẫn Nữ.',0.10,'Việt Nam','TP. Hồ Chí Minh',0,'Laza','2020-03-03 01:01:10',4.0),(3,6,'Kem Chống Nắng Nâng Tone Innisfree Tone Up No Sebum Sunscreen SPF50/PA+++',NULL,'Kem chống nắng No Sebum chứa bột xốp giúp kiềm dầu và mồ hôi trên da, ngoài ra còn giúp nâng tone-giúp sáng da.',0.20,'Nhật Bản','TP. Hồ Chí Minh',0,'Orem','2020-03-03 01:01:10',NULL),(4,2,'Giày Bita\'s Hunter Street Black Line 2k20',NULL,'Đôi giày không chỉ vật thể hiện cá tính, mà còn là người bạn đồng hành trên mỗi hành trình trải nghiệm.',0.30,'Trung Quốc','TP. Hồ Chí Minh',0,'Bitas','2020-03-03 01:01:10',NULL),(5,2,'Giày Thể Thao Nike Nam Chạy Bộ CARRY OVER AIR MAX',0,'Chất liệu: Polyester, chất liệu tổng hợp, cao su',0.12,'Việt Nam','Q. Cái Răng, Cần Thơ',0,'Nike','2020-03-03 01:01:10',NULL),(6,3,'Loa Bluetooth Di Động LG Xboomgo PL2 - Hàng Chính Hãng',976,'Đơn giản mà thời trang',0.19,'Việt Nam','Q. Cầu Giấy, Hà Nội',0,'Ubl','2020-03-03 01:01:10',NULL),(7,6,'Son Môi Mini Garden Roses Matte Lipstick Version 2019 6ML PV993',188,'Roses Matte Lipstick với sáng chế Đột Phá Mới X3 Resin Technologies - Mỹ tạo lớp màng kháng nước tuyệt vời chống lem, chống trôi giúp tăng khả năng bám màu gấp 3 lần lên đến 24h.',0.31,'Hàn Quốc','TP. Bắc Ninh',0,'Beauful','2020-03-03 01:01:10',NULL),(8,6,'Sữa rửa mặt ngăn ngừa lão hóa Pond\'s Age Miracle 100g',278,'Với phức hợp Intelligent Pro-cell Complex gồm 6 dưỡng chất chuyên biệt giúp thúc đẩy quá trình tái tạo da tại tầng biểu bì, chống lão hóa da.',0.45,'Việt Nam','TP.Hồ Chí Minh',0,'Pond','2020-03-03 01:01:10',NULL),(9,6,'Bộ đôi tinh chất củng cố cốt lõi ngăn lão hóa OHUI Prime Advancer Ampoule Serum',145,'Prime Advancer Ampoule Serum có khả năng củng cố, tăng cường sức mạnh cho phần cốt lõi, đồng thời Prime Advancer Ampoule Serum sẽ đảm nhận nhiệm vụ duy trì làn da của ta ở trạng thái khỏe mạnh, tươi tắn và tràn trề sức sống nhất',0.40,'Việt Nam','Bắc Từ Liêm, Hà Nội',10,'Ohui','2020-03-03 01:01:10',NULL),(10,1,'Quần kaki dài nam chất vải cotton có giãn siêu đẹp LADOS ',1499,'Thiết kế theo form Slimfit , dáng gọn, tôn dám trẻ trung- thông số phù hợp với người việt nam',0.32,'Hàn Quốc','Q. Ninh Kiều, Cần Thơ',0,'Lados','2020-03-03 01:01:10',NULL),(11,6,'Kem dưỡng chống lão hoá trẻ hoá da Ohui Prime Advancer Ampoul Capture Cream/ Mỹ phẩm công ty chính h',223,'Kem dưỡng OHUI Prime Advancer Ampoule Capture Cream là một trong những sản phẩm có nhiều tính năng nhất. Rất được lòng giới chị em xứ sở Kim Chi.',0.23,'Nhật Bản','Đà Nẵng',0,'Ohui','2020-03-03 01:01:10',NULL),(12,1,'Balo nam Hàn Quốc Cao Cấp HARAS',500,'Balo nam HARAS được gia công bằng chất liệu vải đảm bảo độ bền chắc theo thời gian. Loại chất liệu này góp phần hạn chế tối đa tình trạng sờn cũ, phai màu sau một thời gian dài sử dụng.',0.43,'Trung Quốc','Ninh Bình',0,'Haras','2020-03-03 01:01:10',NULL),(13,1,'BÚT BI KÝ PARKER VECTOR CAO CẤP - NÉT 1.0mm',399,'Phong cách và sự ổn định là yếu tố giúp VECTOR trở thành sản phẩm được yêu thích của sinh viên và chuyên gia. Với mục tiêu cung cấp hiệu suất sử dụng cao, bút VECTOR đảm bảo sự ổn định và trải nghiệm viết mượt mà tại mọi thời điểm.',0.25,'Việt Nam','TP. Hồ Chí Minh',0,'Thiên Long','2020-03-03 01:01:10',NULL),(14,1,'Balo du lịch, balo laptop [ HÀNG XUẤT DƯ ] Balo TNF Refactor Dufflel Pack - Thiết kế thông minh CHỐNG NƯỚC CHỐNG BÁM BỤ',300,'☑️ Sức chứa lớn với khoang chứa đồ rộng: quần áo, đồ cá nhân,...cho chuyến đi 3-4 ngày',0.17,'Indonesia','Quận Hai Bà Trưng, Hà Nội',0,'TNF Refactor Dufflel Pack ','2020-03-03 01:01:10',NULL),(15,1,'Áo thun Polo nam GOBO hình Pugdog vải cá sấu Cotton xuất xịn - POLOMAN',NULL,'Nổi bật - Tinh tế trên từng chi tiết mà POLOMAN mang đến cho các bạn sự trải nghiệm đơn giản mà sang trọng. ',0.12,'Việt Nam','uận Quận Tân Phú, TP. Hồ Chí Minh',0,'GOBO ','2020-03-03 01:01:10',NULL),(16,1,'Áo thun nam Cotton Compact phiên bản Premium chống nhăn màu xanh lam thương hiệu Coolmate',NULL,'Áo thun nam Cotton Compact phiên bản Premium chống nhăn màu xanh lam - BlueBeauty Tee',0.39,'Việt Nam','Quận Hà Đông, Hà Nội',0,'Cotton Compact ','2020-03-03 01:01:10',NULL),(17,1,'Quần thể thao nam hàng vnxk cao cấp, quần short thun thể thao nam cực chất.',1000,'Quần thể thao nam hàng vnxk cao cấp, quần short thun thể thao nam cực chất.',0.26,'Mỹ','Quận Tân Bình, TP. Hồ Chí Minh',0,'No brand','2020-03-03 01:01:10',NULL),(18,1,'Mũ Bảo Hiểm 3/4 Royal M139 kính V5 bảo hành 12 tháng Shop mũ 192',1000,'ĐẶC ĐIỂM ROYAL M139: Năng động về ngoại hình không kén người đội. Sự lựa chọn tối ưu cho nhiều nam thanh nữ tú. ⚡ Phiên bản nâng cấp qua nhiều chi tiết ? Thiết kế đơn giản và tinh tế, phù hợp với mọi loại xe và màu xe. ? - Vỏ bằng nhựa ABS nguyên sinh - là loại nhựa tinh khiết chưa qua sử dụng, được sử dụng cho các sản phẩm tiêu chuẩn an toàn cao vỏ thiết bị y tế, dược phẩm, vỏ máy bay.... có độ bền cao và chịu va đập tốt. - Phần đệm lót bên trong nón còn có lớp vải kháng khuẩn, chống ẩm, rất tốt cho việc bảo vệ chiếc nón khỏi mùi hôi, ẩm mốc - Kính có thể kéo lên kéo xuống tiện lợi ? Vòng đầu từ 53-55cm: Chọn size M - Vòng đầu từ 56-57cm: Chọn size L - Vòng đầu từ 58-60cm: Chọn size XL Hướng dẫn xác định cỡ mũ phù hợp: + Vòng 1 sợi dây quanh đầu, ngay phía trên lông mày và tai. Xiết sợi dây sao cho ôm vừa đủ thoải mái lấy đầu và ghi lại số đo đó. Lặp lại như vậy để tìm được số đo mà bạn thấy đầu dễ chịu nhất và sử dụng số đo đó. ? Trọng lượng: 950g ± 50g ? Viền nón được thay thế bởi chất liệu mới, nổi bật hơn, dễ dàng vệ sinh, lau chùi khi có vết bẩn. ? Với ốp tai tháo rời thuận tiện cho việc vệ sinh chống ẩm ướt, mùi hôi khi sử dụng lâu ngày. ? Chất lượng đạt chuẩn quốc tế, với giá cực tốt. Royal là thương hiệu số 1 Việt Nam, các sản phẩm được kiểm tra kỹ càng qua công đoạn QC đảm bảo 100%. Khách hàng có thể thấy tem QC màu đỏ được dán đảm bảo 100% sản phẩm ra thị trường đều đạt chuẩn. Đồng thời, Royal M139 đạt chuẩn chất lượng theo tiêu chuẩn Quatest',0.12,'Việt Nam','Thành Phố Thủ Đức, TP. Hồ Chí Minh',0,'Royal','2020-03-03 01:01:10',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shopId_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin'),(2,'user');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userId_UNIQUE` (`id`),
  KEY `fk1_user_idx` (`role_id`),
  CONSTRAINT `fk1_user` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,2,'monnatyz@gmail.com','0898007389','12345678','hello','Xã nhơn nghĩa. Bạc Liêu, Huyện Hòa Bình'),(2,2,'phu@mgmail.com','0898007388','12312378','hello','Cần Thơ'),(5,2,'monnatyz@gmail.commm','0898007380','123123123','hello',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'ecommerce'
--

--
-- Dumping routines for database 'ecommerce'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-12 14:47:24
