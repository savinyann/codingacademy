-- MySQL dump 10.13  Distrib 5.5.58, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: gecko
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
-- Table structure for table `filesystem_history`
--

DROP TABLE IF EXISTS `filesystem_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filesystem_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `function_name` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filesystem_history`
--

LOCK TABLES `filesystem_history` WRITE;
/*!40000 ALTER TABLE `filesystem_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `filesystem_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  CONSTRAINT `news_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (6,'invasion de chats','Les chats ont envahi NY',188,'2017-11-13'),(7,'Accident - Belgique','Un hélicoptère s\'est écrasé dans un cimetière cette nuit en Belgique. Les autorités ont déjà déterré de nombreux morts',188,'2017-11-14'),(8,'Gecko','Les Gekkota, ou geckos, sont un infra-ordre de reptiles dont on rencontre les espèces dans de très nombreux pays.',188,'2017-11-14'),(9,'bla','Les test sont funs.',2578,'2017-11-16');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2579 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Superwoman42','$2y$10$2z9MbfBr2nzhXvZ2wHypnulD2rwJ/oh6DqvAZnwIIB3TYj7kHOcwW','krypton@forever.dead','2017-11-09',1),(3,'Superwoman42','$2y$10$2z9MbfBr2nzhXvZ2wHypnulD2rwJ/oh6DqvAZnwIIB3TYj7kHOcwW','krypton@forever.dead','2017-11-09',1),(5,'Superwoman42','$2y$10$2z9MbfBr2nzhXvZ2wHypnulD2rwJ/oh6DqvAZnwIIB3TYj7kHOcwW','krypton@forever.dead','2017-11-09',1),(6,'Superwoman42','$2y$10$2z9MbfBr2nzhXvZ2wHypnulD2rwJ/oh6DqvAZnwIIB3TYj7kHOcwW','krypton@forever.dead','2017-11-09',1),(7,'Superwoman42','$2y$10$2z9MbfBr2nzhXvZ2wHypnulD2rwJ/oh6DqvAZnwIIB3TYj7kHOcwW','krypton@forever.dead','2017-11-10',0),(8,'Superwoman42','$2y$10$2z9MbfBr2nzhXvZ2wHypnulD2rwJ/oh6DqvAZnwIIB3TYj7kHOcwW','krypton@forever.dead','2017-11-10',0),(9,'Superwoman42','$2y$10$2z9MbfBr2nzhXvZ2wHypnulD2rwJ/oh6DqvAZnwIIB3TYj7kHOcwW','krypton@forever.dead','2017-11-10',0),(10,'Superwoman42','$2y$10$2z9MbfBr2nzhXvZ2wHypnulD2rwJ/oh6DqvAZnwIIB3TYj7kHOcwW','krypton@forever.dead','2017-11-10',0),(12,'Superwoman42','$2y$10$2z9MbfBr2nzhXvZ2wHypnulD2rwJ/oh6DqvAZnwIIB3TYj7kHOcwW','krypton@forever.dead','2017-11-11',1),(177,'Superwoman42','$2y$10$2z9MbfBr2nzhXvZ2wHypnulD2rwJ/oh6DqvAZnwIIB3TYj7kHOcwW','krypton@forever.dead','2017-11-13',0),(178,'Superwoman42','$2y$10$2z9MbfBr2nzhXvZ2wHypnulD2rwJ/oh6DqvAZnwIIB3TYj7kHOcwW','krypton@forever.dead','2017-11-13',0),(179,'Superwoman42','$2y$10$2z9MbfBr2nzhXvZ2wHypnulD2rwJ/oh6DqvAZnwIIB3TYj7kHOcwW','krypton@forever.dead','2017-11-13',0),(181,'Vanille42','$2y$10$XA0i/EXjLaYajLsN5/8.AOuGlltlO24PE5tsSs5AurJ/ZGGPf6Xvy','vanille@chocolat.fr','2017-11-13',1),(182,'Admin42','$2y$10$GTIHJ7nXP/0kzKAJp0VdS.sAGKyxpMyrN578cQjXWHCjOM6O0Pjfa','admin@admin.com','2017-11-13',1),(188,'norbert','$2y$10$XAFRTdc.ItRzzlNqWChPhO9N3FUWcvkEkd2NN4sJC1stFmBK3H2.m','admin@admin.com','0000-00-00',0),(2561,'menfou','$2y$10$4TrifUVTljwHoQmL4RdPtOEBnf5zI4wIJo4H6VySb.kP2aOCXAK96','bla@bla.fr','2017-11-13',1),(2562,'Yann24','789101','1','2017-11-14',0),(2563,'Yann252','789101','1','2017-11-14',0),(2564,'Yann26','789101','1','2017-11-14',0),(2565,'Yann332','789101','1','2017-11-14',0),(2566,'Yann58','789101','1','2017-11-14',0),(2567,'Yann402','789101','1','2017-11-14',0),(2568,'Yann04','789101','1','2017-11-14',0),(2569,'Yann122','789101','1','2017-11-14',0),(2570,'Yann66','789101','1','2017-11-14',0),(2571,'Yann702','789101','1','2017-11-14',0),(2572,'Yann41','789101','1','2017-11-14',0),(2573,'Yann187','789101','1','2017-11-14',0),(2574,'Yann28','789101','1','2017-11-14',0),(2577,'yann','$2y$10$6WteXnzKjXfCIzhVRFYEru.zZH6w8VfcOpf3bdNs7UxNuHYS78Kfe','savinyann@hotmail.com','2017-11-14',0),(2578,'testest','$2y$10$h/gp0ZagHbapNyDWjojyt.x8rrFo4y4oCIwRq/qD1KmBZk6bbNHpC','bla@bla.bla','2017-11-16',1);
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

-- Dump completed on 2017-12-16 18:07:14
