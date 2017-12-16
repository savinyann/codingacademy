-- MySQL dump 10.13  Distrib 5.5.58, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: zoo
-- ------------------------------------------------------
-- Server version	5.5.58-0+deb8u1

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
-- Table structure for table `animal`
--

DROP TABLE IF EXISTS `animal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_id` int(10) unsigned DEFAULT NULL,
  `age` int(11) NOT NULL,
  `height` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animal`
--

LOCK TABLES `animal` WRITE;
/*!40000 ALTER TABLE `animal` DISABLE KEYS */;
INSERT INTO `animal` VALUES (1,'Hamster','Ribery',1,42,0.15,'2017-12-04 23:00:00','2017-12-04 23:00:00'),(2,'Platypus','Ewilan',2,21,0.40,'2017-12-04 23:00:00','2017-12-04 23:00:00'),(3,'Snail','Toto',NULL,5,0.04,'2017-12-04 23:00:00','2017-12-04 23:00:00'),(4,'Unicorn','Deadpool',NULL,1337,1.81,'2017-12-04 23:00:00','2017-12-04 23:00:00'),(5,'Gecko','Hugo',1,24,1.85,'2017-12-05 18:48:06','2017-12-05 18:48:15'),(6,'Gecko','Habib',1,23,1.83,'2017-12-05 18:48:06','2017-12-05 18:48:15'),(7,'elephant','Babar',1,25,3.20,'2017-12-04 23:00:00','2017-12-04 23:00:00'),(8,'Panther','Baguera',1,7,1.34,'2017-12-04 23:00:00','2017-12-04 23:00:00'),(9,'Panther','Baguera',1,7,1.34,'2017-12-04 23:00:00','2017-12-04 23:00:00'),(10,'Soricate','Timon',1,3,0.85,'2017-12-05 18:48:25','0000-00-00 00:00:00'),(11,'Jigglepuff','Shamallow',2,4,0.75,'2017-12-06 08:11:18','0000-00-00 00:00:00'),(12,'Tortoise','Franklin',1,355,0.30,'2017-12-06 08:23:11','0000-00-00 00:00:00'),(13,'Tortoise','Franklin',1,355,0.30,'2017-12-06 08:23:52','0000-00-00 00:00:00'),(14,'Tortoise','Franklin',1,355,0.30,'2017-12-06 08:24:04','0000-00-00 00:00:00'),(15,'Tortoise','Franklin',1,355,0.30,'2017-12-06 08:24:23','0000-00-00 00:00:00'),(16,'Tortoise','Franklin',1,355,0.30,'2017-12-06 08:25:26','0000-00-00 00:00:00'),(17,'Tortoise','Franklin',1,355,0.30,'2017-12-06 08:30:13','0000-00-00 00:00:00'),(18,'Tortoise','Franklin',1,355,0.30,'2017-12-06 08:30:27','0000-00-00 00:00:00'),(19,'Tortoise','Franklin',1,355,0.30,'2017-12-06 08:31:01','0000-00-00 00:00:00'),(20,'Tortoise','Franklin',1,355,0.30,'2017-12-06 08:36:18','0000-00-00 00:00:00'),(21,'Tortoise','Franklin',1,355,0.30,'2017-12-06 08:37:11','0000-00-00 00:00:00'),(22,'Tortoise','Franklin',1,355,0.30,'2017-12-06 08:37:20','0000-00-00 00:00:00'),(23,'Dog','Lassy',2,18,1.35,'2017-12-06 08:42:07','0000-00-00 00:00:00'),(24,'Dog','Lassy',2,18,1.35,'2017-12-06 08:42:41','0000-00-00 00:00:00'),(25,'Dog','Lassy',2,18,1.35,'2017-12-06 08:43:01','0000-00-00 00:00:00'),(26,'Dog','Lassy',2,18,1.35,'2017-12-06 08:43:07','0000-00-00 00:00:00'),(27,'Dog','Lassy',2,18,1.35,'2017-12-06 08:43:25','0000-00-00 00:00:00'),(28,'Nightmare','Terror',1,3500,3.10,'2017-12-06 08:43:49','0000-00-00 00:00:00'),(29,'Nightmare','Terror',1,3500,3.10,'2017-12-06 08:44:31','0000-00-00 00:00:00'),(30,'Poring','Blopy',1,3,0.15,'2017-12-06 08:45:00','0000-00-00 00:00:00'),(31,'Poring','Blopy',1,3,0.15,'2017-12-06 08:45:52','0000-00-00 00:00:00'),(32,'Poring','Blopy',1,3,0.15,'2017-12-06 08:49:11','0000-00-00 00:00:00'),(33,'Poring','Blopy',1,3,0.15,'2017-12-06 08:53:45','0000-00-00 00:00:00'),(34,'Poring','Blopy',1,3,0.15,'2017-12-06 08:54:07','0000-00-00 00:00:00'),(35,'Poring','Blopy',1,3,0.15,'2017-12-06 08:54:35','0000-00-00 00:00:00'),(36,'Poring','Blopy',1,3,0.15,'2017-12-06 08:54:46','0000-00-00 00:00:00'),(37,'Poring','Blopy',1,3,0.15,'2017-12-06 08:56:17','0000-00-00 00:00:00'),(38,'Poring','Blopy',1,3,0.15,'2017-12-06 09:00:40','0000-00-00 00:00:00'),(39,'vfiogja','gzrefzeg',2,23,1.50,'2017-12-06 09:01:00','0000-00-00 00:00:00'),(40,'vfiogja','gzrefzeg',2,23,1.50,'2017-12-06 09:02:13','0000-00-00 00:00:00'),(41,'vfiogja','gzrefzeg',2,23,1.50,'2017-12-06 09:02:34','0000-00-00 00:00:00'),(42,'vfiogja','gzrefzeg',2,23,1.50,'2017-12-06 09:03:37','0000-00-00 00:00:00'),(43,'vfiogja','gzrefzeg',2,23,1.50,'2017-12-06 09:03:59','0000-00-00 00:00:00'),(44,'vfiogja','gzrefzeg',2,23,1.50,'2017-12-06 09:04:32','0000-00-00 00:00:00'),(45,'vfiogja','gzrefzeg',2,23,1.50,'2017-12-06 09:04:36','0000-00-00 00:00:00'),(46,'vfiogja','gzrefzeg',2,23,1.50,'2017-12-06 09:04:43','0000-00-00 00:00:00'),(47,'vfiogja','gzrefzeg',2,23,1.50,'2017-12-06 09:05:32','0000-00-00 00:00:00'),(48,'vfiogja','gzrefzeg',2,23,1.50,'2017-12-06 09:05:55','0000-00-00 00:00:00'),(49,'vfiogja','gzrefzeg',2,23,1.50,'2017-12-06 09:06:07','0000-00-00 00:00:00'),(50,'Elephant','Alcesse',2,32,4.20,'2017-12-06 09:52:27','0000-00-00 00:00:00'),(51,'Cat','Kitten',2,7,0.45,'2017-12-06 09:57:06','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `animal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gender` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gender`
--

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` VALUES (1,'Male',NULL,NULL),(2,'Female',NULL,NULL);
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (3,'2017_12_05_104705_gender',1),(4,'2017_12_05_105738_animal',1),(7,'2014_10_12_000000_create_users_table',2),(8,'2014_10_12_100000_create_password_resets_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'yann','savinyann@hotmail.com','$2y$10$l7FKpFV6X3w9j1RLRbMkBe66.ROP0s5e6DTDyFLKJk6iTY3Uq5taO','MgDp9qu45E1iOw7plvcQMta7mTcPH7NLnEQu67TezuJRj8S1NgzKd66GeikO','2017-12-05 16:37:38','2017-12-05 16:37:38');
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

-- Dump completed on 2017-12-16 18:08:11
