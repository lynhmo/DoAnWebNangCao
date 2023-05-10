CREATE DATABASE  IF NOT EXISTS `botstore_test` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `botstore_test`;
-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: botstore_test
-- ------------------------------------------------------
-- Server version	8.0.31

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
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fullname` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `is_block` tinyint NOT NULL DEFAULT '0',
  `permision` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','admin','admin@gmail.com','AD Pro',0,1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checkout`
--

DROP TABLE IF EXISTS `checkout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `checkout` (
  `checkout_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone_nb` float DEFAULT NULL,
  `status` int DEFAULT NULL,
  `total_money` float DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`checkout_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checkout`
--

LOCK TABLES `checkout` WRITE;
/*!40000 ALTER TABLE `checkout` DISABLE KEYS */;
INSERT INTO `checkout` VALUES (18,1,'tao','Ha Noi',123,NULL,520,'2022-12-17 08:08:19','2022-12-17 08:08:19',''),(19,1,'longdeptrai','Ha Noi',123456,NULL,490,'2022-12-17 09:40:52','2022-12-17 09:40:52','hehehehe'),(23,21,'linh','hanoi',91237100,1,350,'2022-12-17 14:38:06','2022-12-17 14:38:06','asdasd'),(24,21,'123123','123123',123123,1,147,'2022-12-17 16:04:22','2022-12-17 16:04:22','1231231'),(25,21,'123123','231231',1231230,1,100,'2022-12-17 18:43:02','2022-12-17 18:43:02','231312312'),(26,19,'linh tu do','ha noi',123541,1,249,'2023-03-07 04:23:33','2023-03-07 04:23:33','51232'),(27,19,'Linh Do','Hanoi',1237420000,1,1500,'2023-03-07 14:08:30','2023-03-07 14:08:30','hello world');
/*!40000 ALTER TABLE `checkout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_checkout`
--

DROP TABLE IF EXISTS `detail_checkout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail_checkout` (
  `detail_reciept_id` int NOT NULL AUTO_INCREMENT,
  `checkout_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity_product` int DEFAULT NULL,
  `price` float DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  PRIMARY KEY (`detail_reciept_id`),
  KEY `detail_checkout_ibfk_1` (`checkout_id`),
  KEY `detail_checkout_ibfk_2` (`product_id`),
  CONSTRAINT `detail_checkout_ibfk_1` FOREIGN KEY (`checkout_id`) REFERENCES `checkout` (`checkout_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_checkout_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_checkout`
--

LOCK TABLES `detail_checkout` WRITE;
/*!40000 ALTER TABLE `detail_checkout` DISABLE KEYS */;
INSERT INTO `detail_checkout` VALUES (22,18,28,1,430,'2022-12-17 08:08:19','2022-12-17 08:08:19'),(23,18,37,1,90,'2022-12-17 08:08:19','2022-12-17 08:08:19'),(24,19,30,5,80,'2022-12-17 09:40:52','2022-12-17 09:40:52'),(25,19,37,1,90,'2022-12-17 09:40:52','2022-12-17 09:40:52'),(26,23,29,5,50,'2022-12-17 14:38:06','2022-12-17 14:38:06'),(27,23,36,1,100,'2022-12-17 14:38:06','2022-12-17 14:38:06'),(28,24,31,3,49,'2022-12-17 16:04:22','2022-12-17 16:04:22'),(29,25,27,1,100,'2022-12-17 18:43:02','2022-12-17 18:43:02'),(30,26,27,2,100,'2023-03-07 04:23:33','2023-03-07 04:23:33'),(31,26,31,1,49,'2023-03-07 04:23:33','2023-03-07 04:23:33'),(32,27,39,5,300,'2023-03-07 14:08:30','2023-03-07 14:08:30');
/*!40000 ALTER TABLE `detail_checkout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `posts_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `user_id` int NOT NULL,
  `is_public` tinyint DEFAULT '0',
  `createdate` datetime DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`posts_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'aa','a',1,1,NULL,NULL,'3.jpg'),(19,'FSDFSDF','<p>Ưfdsf</p>\r\n',1,1,'2022-11-26 00:47:17','2022-11-26 00:47:17',NULL),(25,'hẻgdf','<p>ưgsdagf</p>\r\n',2,1,'2022-12-05 21:46:47','2022-12-05 21:46:47',NULL),(26,'12','<p>ghdfsgsd</p>\r\n',1,1,'2022-12-15 20:45:48','2022-12-15 20:45:48',''),(35,'423','<p>5234</p>\r\n',1,1,'2022-12-15 21:22:08','2022-12-15 21:22:08',''),(36,'423','<p>5234</p>\r\n',1,1,'2022-12-15 21:22:13','2022-12-15 21:22:13',''),(37,'423','<p>5234</p>\r\n',1,1,'2022-12-15 21:23:26','2022-12-15 21:23:26','gearvn_g903_w_7a90e8a2113a45b09b80d390ae6a903f_grande_a232da09a20546cb9bbe4b2fca32c001.jpg'),(38,'guvm','<p>fgf</p>\r\n',1,1,'2022-12-15 21:23:43','2022-12-15 21:23:43','2_234086bd4aaa43b0884706ab148087fc.jpg'),(39,'hjdfgh','<p>sjgf</p>\r\n',1,1,'2022-12-15 21:24:46','2022-12-15 21:24:46',''),(40,'aergr','<p>aer</p>\r\n',1,1,'2022-12-15 21:25:59','2022-12-15 21:25:59','Case XIGMATEK X BATTLESHIP.jpg'),(43,'13123','<p>123123</p>\r\n',21,1,'2022-12-18 11:25:46','2022-12-18 11:25:46','brook.jpg');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `oldprice` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `star` float DEFAULT NULL,
  `image` varchar(500) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `trademark_id` int NOT NULL,
  `quantity` int DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `trademark_id` (`trademark_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`trademark_id`) REFERENCES `trademark` (`trademark_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (25,'Marada Uchiha 23','Là người có cuội nguồn của dòng họ uchiha',300,299,5,'Uchiha Madara (1).jpg','Mô hình',1,623),(26,'Mô hình Kaneki','Là thành viên của một tổ đọi săn quỷ',233,200,5,'kaneki (5).jpg','Mô hình để bàn',1,124),(27,'Iron Man','Là thành viên có công nghệ cao cấp của đội avenger',150,100,4,'ironman4.png','Mô hình để bàn',1,213),(28,'Set vũ khí avenger','Một set vũ khí của các thành viên trong tổ đọi AVENGER',500,430,5,'bg4.jpg','Vũ khí',2,124),(29,'Máy bay trực thăng lego','Set lego lắp giáp máy bay trực thăng',100,50,3,'lego.jpg','Máy bay',1,231),(30,'Lego Ship','Tàu làm bằng lego. Tàu sieu không gian',100,80,5,'legobg.jpg','LEGO',1,1534),(31,'Chopper','Chopper là bạn của luffy',50,49,3,'chopper.jpg','Mô hình',1,1768),(32,'Zero Two Studen Outfit','Nhân vật trong darling in franxx',244,200,4,'Figure DARLING IN THE FRANXX - ZERO TWO (2).jpeg','Mô hình',1,14),(33,'Zoro Chibi','Zoro',10,5,5,'zoro8.jpg','Chibi',1,42),(34,'Gogeta','Day la noi dung',200,140,3,'gogeta.jpg','Mo hinh',1,123),(35,'Bugati Divo','Noi dung sn pham',300,255,5,'bugati.jpg','Car',1,124),(36,'Minato','Nooij dung sanr pham',150,100,3,'minato.jpg','Mo hinh',1,22),(37,'Levi Achkerman','Noi dung san pham',100,90,4,'levi.png','mo hinh',1,12),(38,'Hulk Buster','No dung',200,192,3,'hulkbuster.png','mo hinh',1,123),(39,'NinjaGO Set','Ninja go set',400,300,5,'bgninja.jpg','Mo hinh',1,32),(40,'Okẻ ê','Đây là nội dung',3233,22,3,'bg8.jpg','4',2,233),(41,'Hee loo','Đây alf nọi dung',2313,123,5,'Figure DARLING IN THE FRANXX - ZERO TWO (2).jpeg','4',1,3123),(42,'Black Panther','abc xyz',100,99,5,'blackpanther.png','uudai',1,124);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trademark`
--

DROP TABLE IF EXISTS `trademark`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trademark` (
  `trademark_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `image` varchar(500) NOT NULL,
  PRIMARY KEY (`trademark_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trademark`
--

LOCK TABLES `trademark` WRITE;
/*!40000 ALTER TABLE `trademark` DISABLE KEYS */;
INSERT INTO `trademark` VALUES (1,'Marvel','Avengers.jpg'),(2,'Lego','legobg.jpg');
/*!40000 ALTER TABLE `trademark` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `is_block` tinyint NOT NULL DEFAULT '0',
  `permision` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'long','123','longdz@gmail.com','bui ha long',0,0),(2,'longdz','123','long@gmail.com','longbui',0,0),(19,'linh','123','Linh@gmail.com','Do Tu Linh',0,0),(21,'linhdeptrai','1','linh@gmai.com','linh',0,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vn_pay`
--

DROP TABLE IF EXISTS `vn_pay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vn_pay` (
  `id_vnpay` int NOT NULL AUTO_INCREMENT,
  `code_cart` varchar(50) NOT NULL,
  `vnp_amount` varchar(100) NOT NULL,
  `vnp_bankcode` varchar(100) NOT NULL,
  `vnp_banktranno` varchar(100) NOT NULL,
  `vnp_cardtype` varchar(100) NOT NULL,
  `vnp_orderinfo` varchar(100) NOT NULL,
  `vnp_paydate` varchar(100) NOT NULL,
  `vnp_tmncode` varchar(100) NOT NULL,
  `vnp_transactionno` varchar(100) NOT NULL,
  PRIMARY KEY (`id_vnpay`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vn_pay`
--

LOCK TABLES `vn_pay` WRITE;
/*!40000 ALTER TABLE `vn_pay` DISABLE KEYS */;
INSERT INTO `vn_pay` VALUES (5,'5190','240000000','NCB','VNP13907215','ATM','Thanh toán đơn hàng tại Website','20221217204406','13907215','00'),(6,'5190','240000000','NCB','VNP13907215','ATM','Thanh toán đơn hàng tại Website','20221217204406','13907215','00'),(7,'5190','240000000','NCB','VNP13907215','ATM','Thanh toán đơn hàng tại Website','20221217204406','13907215','00'),(8,'5190','240000000','NCB','VNP13907215','ATM','Thanh toán đơn hàng tại Website','20221217204406','13907215','00'),(9,'5190','240000000','NCB','VNP13907215','ATM','Thanh toán đơn hàng tại Website','20221217204406','13907215','00'),(10,'5190','240000000','NCB','VNP13907215','ATM','Thanh toán đơn hàng tại Website','20221217204406','13907215','00'),(11,'5190','240000000','NCB','VNP13907215','ATM','Thanh toán đơn hàng tại Website','20221217204406','13907215','00'),(12,'5190','240000000','NCB','VNP13907215','ATM','Thanh toán đơn hàng tại Website','20221217204406','13907215','00'),(13,'5190','240000000','NCB','VNP13907215','ATM','Thanh toán đơn hàng tại Website','20221217204406','13907215','00'),(14,'5190','240000000','NCB','VNP13907215','ATM','Thanh toán đơn hàng tại Website','20221217204406','13907215','00'),(15,'5190','240000000','NCB','VNP13907215','ATM','Thanh toán đơn hàng tại Website','20221217204406','13907215','00'),(16,'5190','240000000','NCB','VNP13907215','ATM','Thanh toán đơn hàng tại Website','20221217204406','13907215','00'),(17,'5190','240000000','NCB','VNP13907215','ATM','Thanh toán đơn hàng tại Website','20221217204406','13907215','00'),(18,'5190','240000000','NCB','VNP13907215','ATM','Thanh toán đơn hàng tại Website','20221217204406','13907215','00'),(19,'5190','240000000','NCB','VNP13907215','ATM','Thanh toán đơn hàng tại Website','20221217204406','13907215','00'),(20,'5190','240000000','NCB','VNP13907215','ATM','Thanh toán đơn hàng tại Website','20221217204406','13907215','00'),(21,'7608','240000000','NCB','VNP13907253','ATM','Thanh toán đơn hàng tại Website','20221217215931','13907253','00'),(22,'5563','240000000','NCB','VNP13907254','ATM','Thanh toán đơn hàng tại Website','20221217220256','13907254','00'),(23,'6793','240000000','NCB','VNP13907255','ATM','Thanh toán đơn hàng tại Website','20221217220538','13907255','00'),(24,'3490','240000000','VNPAY','','QRCODE','Thanh toán đơn hàng tại Website','20221218004235','0','02'),(25,'546','240000000','NCB','VNP13907305','ATM','Thanh toán đơn hàng tại Website','20221218004338','13907305','00'),(26,'3665','840000000','NCB','VNP13907306','ATM','Thanh toán đơn hàng tại Website','20221218004638','13907306','00'),(27,'6097','597600000','NCB','VNP13951664','ATM','Thanh toán đơn hàng tại Website','20230307102442','13951664','00'),(28,'8791','3600000000','NCB','VNP13952307','ATM','Thanh toán đơn hàng tại Website','20230307200924','13952307','00');
/*!40000 ALTER TABLE `vn_pay` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-07 20:28:53
