-- MySQL dump 10.13  Distrib 8.0.15, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: new_project
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_name` varchar(45) NOT NULL,
  `text` varchar(500) NOT NULL,
  `date` datetime NOT NULL,
  `likes` int(11) DEFAULT NULL,
  `user_id` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (1,1,'User User','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid architecto assumenda corporis debitis, delectus dignissimos explicabo illum, impedit ipsa itaque.','2019-05-23 00:00:00',2,'1','confirm'),(2,1,'User1 User1','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid architecto assumenda corporis debitis, delectus dignissimos explicabo illum, impedit ipsa itaque','2019-05-23 00:00:00',3,'2','new'),(3,1,'Helen Hunt','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid architecto assumenda corporis debitis, delectus dignissimos explicabo illum, impedit ipsa itaque.','2019-05-23 22:16:11',4,'1','new'),(4,1,'Helen Hunt','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid architecto assumenda corporis debitis, delectus dignissimos explicabo illum, impedit ipsa itaque.','2019-05-23 22:16:58',5,'1','new'),(5,1,'Helen Hunt','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid architecto assumenda corporis debitis, delectus dignissimos explicabo illum, impedit ipsa itaque.','2019-05-23 22:19:43',6,'1','new'),(6,2,'User User','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad at minus odio praesentium! Aperiam, autem deserunt dolores dolorum fuga labore odit quo.','2019-06-03 16:19:56',NULL,'7','new'),(7,3,'User5 User5','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad at minus odio praesentium! Aperiam, autem deserunt dolores dolorum fuga labore odit quo.','2019-06-06 16:14:10',NULL,'1','new'),(8,3,'User User','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad at minus odio praesentium! Aperiam, autem deserunt dolores dolorum fuga labore odit quo.','2019-06-06 16:16:02',NULL,'7','new'),(9,3,'User User','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad at minus odio praesentium! Aperiam, autem deserunt dolores dolorum fuga labore odit quo.','2019-06-06 16:21:47',NULL,'Guest','new'),(10,3,'User User','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad at minus odio praesentium! Aperiam, autem deserunt dolores dolorum fuga labore odit quo.','2019-06-06 16:22:13',NULL,'Guest','new');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_login` varchar(45) DEFAULT NULL,
  `status` varchar(45) NOT NULL,
  `telephone` varchar(45) NOT NULL,
  `delivery` varchar(45) NOT NULL,
  `total` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (8,8649,'2019-06-05 16:24:55','9jd5f2n9kp96bdd03u5n266sdij5r0ei',7,'admin','new','+7(999) 999-99-99','Bangladesh',''),(9,637,'2019-06-05 20:01:14','9jd5f2n9kp96bdd03u5n266sdij5r0ei',8,'new_user','confirm','+7(999) 999-99-99','Brazil',''),(10,9068,'2019-06-05 21:34:40','9jd5f2n9kp96bdd03u5n266sdij5r0ei',8,'new_user','new','+7(999) 999-99-99','Brazil',''),(11,2854,'2019-06-06 15:44:48','9jd5f2n9kp96bdd03u5n266sdij5r0ei',7,'admin','new','+7(999) 999-99-99','Brazil','11'),(12,5951,'2019-06-06 16:23:55','9jd5f2n9kp96bdd03u5n266sdij5r0ei',10,'new_user5','new','+7(999) 999-99-99','USA','61');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `order_pos` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `positions`
--

LOCK TABLES `positions` WRITE;
/*!40000 ALTER TABLE `positions` DISABLE KEYS */;
INSERT INTO `positions` VALUES (1,8649,0,3,2,'246'),(2,8649,1,6,2,'246'),(3,637,1,2,2,'100'),(4,9068,1,3,2,'246'),(5,9068,2,1,1,'11'),(6,2854,1,1,1,'11'),(7,5951,1,2,1,'50'),(8,5951,2,1,1,'11');
/*!40000 ALTER TABLE `positions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `photo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'T-shirt','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad at minus odio praesentium! Aperiam, autem deserunt dolores dolorum fuga labore odit quo.',11,NULL,'Layer_2.jpg'),(2,'Dress','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad at minus odio praesentium! Aperiam, autem deserunt dolores dolorum fuga labore odit quo.',50,NULL,'Layer_2.jpg'),(3,'Suite','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad at minus odio praesentium! Aperiam, autem deserunt dolores dolorum fuga labore odit quo.',123,NULL,'Layer_2.jpg'),(4,'T-sirt 2','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad at minus odio praesentium! Aperiam, autem deserunt dolores dolorum fuga labore odit quo.',11,NULL,'Layer_2.jpg'),(5,'Dress 2','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad at minus odio praesentium! Aperiam, autem deserunt dolores dolorum fuga labore odit quo.',50,NULL,'Layer_2.jpg'),(6,'Suite 2','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad at minus odio praesentium! Aperiam, autem deserunt dolores dolorum fuga labore odit quo.',123,NULL,'Layer_2.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `nick_name` varchar(45) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `is_confirmed` varchar(45) DEFAULT NULL,
  `role` varchar(45) NOT NULL,
  `hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'new_user1','User User1','$2y$10$SNhsB4JuEKsZhVDUn1pxvuGhrOV4nOA14Euokibv3beUcdaRrAK.m','new_user1@mail.ru','2019-05-31 14:05:35','','user','hash1'),(2,'new_user2','User User2','$2y$10$Acv4OXlmwx3/yh5T.eV.fe4hxmwJ2m1fBDdYCJdRRVRUzKXx1tHaG','new_user2@mail.ru','2019-05-31 14:06:26','','user','hash2'),(7,'admin','Admin','$2y$10$4C2MHy3EqaK0gvZ8C3SGMeVjW2u767ITdLa2o6WKkoPNZKAdE1phK','admin@mail.ru','2019-06-05 11:10:49','','admin','17781234145cf77909082ae0.25408292'),(8,'new_user','User User','$2y$10$IX/to7Wz8kkh.NFNo70w0OyHDA6sw089cB7lAYegIkz902nOYb/Xa','new_user@mail.ru','2019-06-05 19:51:06','','user','2341015035cf7f2fa358fa4.10371199'),(9,'new_user4','User4 User4','$2y$10$NPGEP2RafJhSzTy/2DKVPu.yyFSRl7drmfQfDg3v2L81gKAym9mdK','new_user4@mail.ru','2019-06-05 22:29:55','','user','7346423985cf818348a8c28.29838581'),(10,'new_user5','User5 User5','$2y$10$uccLqkGpTioUWpaJrw7MXedWGdsZTj/U0u/DP5jZ3G0TxFK3MXaai','new_user5@mail.ru','2019-06-06 16:23:23','','user','10614252825cf913cc082cb7.88872386');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-06 17:30:15
