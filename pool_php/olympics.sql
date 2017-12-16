-- MySQL dump 10.13  Distrib 5.5.58, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: olympics
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
-- Table structure for table `bets`
--

DROP TABLE IF EXISTS `bets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `team_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_1_rating` decimal(8,2) unsigned NOT NULL,
  `team_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_2_rating` decimal(8,2) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bets`
--

LOCK TABLES `bets` WRITE;
/*!40000 ALTER TABLE `bets` DISABLE KEYS */;
/*!40000 ALTER TABLE `bets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fixtures`
--

DROP TABLE IF EXISTS `fixtures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fixtures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `scoreboard` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `winner_id` int(11) NOT NULL,
  `team1_id` int(11) NOT NULL,
  `team2_id` int(11) NOT NULL,
  `placement` int(11) NOT NULL,
  `meteo_id` int(11) NOT NULL,
  `goals` int(11) NOT NULL,
  `faults` int(11) NOT NULL,
  `referee_id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fixtures`
--

LOCK TABLES `fixtures` WRITE;
/*!40000 ALTER TABLE `fixtures` DISABLE KEYS */;
INSERT INTO `fixtures` VALUES (1,'2017-12-08 11:39:30','7-1',1,1,2,0,1,8,130,2,0),(2,'2017-12-08 00:00:00','3-7',1,1,1,1,1,10,130,3,0),(3,'2017-12-08 00:00:00','3-7',1,1,1,2,1,10,130,4,0),(4,'2017-12-08 00:00:00','3-7',1,1,1,3,1,10,130,1,0),(5,'2017-12-08 00:00:00','0-0',1,1,1,4,1,0,154,2,0),(6,'2017-12-08 00:00:00','0-0',1,1,1,5,1,0,154,3,0),(7,'2017-12-08 00:00:00','0-0',1,1,1,6,1,0,154,4,0),(8,'2017-12-08 00:00:00','0-0',1,1,1,7,1,0,154,1,0),(9,'2017-12-08 00:00:00','0-0',1,1,1,8,1,0,154,2,0),(10,'2017-12-08 00:00:00','0-0',1,1,1,9,1,0,154,3,0),(11,'2017-12-08 00:00:00','3-7',1,1,1,10,1,10,53,4,0),(12,'2017-12-08 00:00:00','3-7',2,4,4,11,5,10,53,1,0),(13,'2017-12-08 00:00:00','3-7',4,4,4,12,5,10,53,2,0),(14,'2017-12-08 00:00:00','3-7',1,9,2,13,5,10,3,3,0),(15,'2017-12-10 00:00:00','3-12',10,10,14,0,1,15,36,1,0);
/*!40000 ALTER TABLE `fixtures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meteo`
--

DROP TABLE IF EXISTS `meteo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meteo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `meteo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meteo`
--

LOCK TABLES `meteo` WRITE;
/*!40000 ALTER TABLE `meteo` DISABLE KEYS */;
INSERT INTO `meteo` VALUES (1,'Ensoleillé'),(2,'Nuageaux'),(3,'Pluvieux'),(4,'Tempète'),(5,'APOCALYPSE'),(6,'Beau temps'),(7,'Venteux');
/*!40000 ALTER TABLE `meteo` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_12_07_095445_create_teams_table',1),(4,'2017_12_07_100332_create_players_table',1),(5,'2017_12_07_100401_create_referees_table',1),(6,'2017_12_07_101646_create_fuxtures_table',1),(7,'2017_12_07_101800_create_meteo_table',1),(8,'2017_12_07_102649_create_players_history_table',1),(9,'2017_12_07_102807_create_team_stats_table',1),(10,'2017_12_08_075851_add_test_to_teams',2),(11,'2017_12_08_080330_add_test_to_teams',3),(12,'2017_12_08_080952_alter_team_table',4),(13,'2017_12_08_081611_add_softDeletes_to_users_players_referees',5),(14,'2017_12_08_081937_add_softDeletes_to_users_players_referees',6),(15,'2017_12_09_135930_players_stat_added',7),(16,'2017_12_09_143101_players_stat_added',8),(17,'2017_12_09_183303_players_column_modified',9),(18,'2017_12_09_183942_players_column_modified',10),(19,'2017_12_08_103226_alter_table_players_history_leaving_date_nullable',11),(20,'2017_12_10_140356_table_fixture_new_column_tournament',11),(21,'2017_12_10_143441_table_tournament_new_column_name',12),(22,'2017_12_10_122611_add_cashier_tables',13),(23,'2017_12_10_225804_create_bets_table',13),(24,'2017_12_11_133745_add_balance_to_users_table',13),(25,'2017_12_11_143345_create_orders_table',13);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bet_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `team_selected` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_selected_rating` decimal(8,2) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
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
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `players` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `goals` int(11) NOT NULL DEFAULT '0',
  `w` int(11) NOT NULL DEFAULT '0',
  `l` int(11) NOT NULL DEFAULT '0',
  `faults` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `HP` int(10) unsigned DEFAULT '0',
  `SP` tinyint(3) unsigned NOT NULL,
  `EN` tinyint(3) unsigned NOT NULL,
  `AT` tinyint(3) unsigned NOT NULL,
  `PA` tinyint(3) unsigned NOT NULL,
  `BL` tinyint(3) unsigned NOT NULL,
  `SH` tinyint(3) unsigned NOT NULL,
  `CA` tinyint(3) unsigned NOT NULL,
  `pict` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
INSERT INTO `players` VALUES (1,'Tidus',1,'2010-12-07',0,0,0,0,1,'2017-12-07 14:18:10','2017-12-07 14:18:10',NULL,9999,67,80,23,49,20,78,20,'tidus.png'),(2,'Yuna',1,'2017-12-10',0,0,0,0,1,'2017-12-07 14:18:40','2017-12-07 14:18:40',NULL,9999,30,41,28,84,73,42,65,'yuna.png'),(3,'Rikku',1,'2017-12-07',0,0,0,0,1,'2017-12-07 14:18:58','2017-12-07 14:18:58',NULL,9999,35,43,22,78,82,45,34,'rikku.png'),(4,'Paine',1,'2017-12-10',0,0,0,0,1,'2017-12-07 15:14:37','2017-12-07 15:14:37',NULL,9999,30,48,20,30,92,20,10,'paine.png'),(5,'Buddy',2,'2017-12-10',0,0,0,0,1,'2017-12-10 13:17:19','2017-12-10 13:17:19',NULL,9802,30,38,61,63,40,32,10,'default.png'),(6,'Abus',2,'2017-12-10',0,0,0,0,1,'2017-12-10 10:42:48','2017-12-10 10:42:48',NULL,6990,61,45,23,24,16,43,20,'default.png'),(7,'Argai Ronso',2,'2017-12-10',0,0,0,0,1,'2017-12-10 10:43:18','2017-12-10 10:43:18',NULL,5570,42,84,34,32,36,80,16,'default.png'),(8,'Auda Guado',2,'2017-12-10',0,0,0,0,1,'2017-12-10 10:43:55','2017-12-10 10:43:55',NULL,9513,72,65,57,57,78,9,23,'default.png'),(9,'Balgerda',3,'2017-12-10',0,0,0,0,1,'2017-12-10 10:44:24','2017-12-10 10:44:24',NULL,8523,60,36,38,38,29,19,20,'default.png'),(10,'Basik Ronso',3,'2017-12-10',0,0,0,0,1,'2017-12-10 10:44:47','2017-12-10 10:44:47',NULL,5515,43,88,47,16,31,80,12,'default.png'),(11,'Berrick',3,'2017-12-10',0,0,0,0,1,'2017-12-10 10:45:20','2017-12-10 10:45:20',NULL,9254,60,56,43,69,48,33,20,'default.png'),(12,'Bickson',3,'2017-12-10',0,0,0,0,1,'2017-12-10 10:45:38','2017-12-10 10:45:38',NULL,7000,60,40,33,25,19,45,20,'default.png'),(13,'Biggs',4,'2017-12-10',0,0,0,0,1,'2017-12-10 10:46:41','2017-12-10 10:46:41',NULL,9966,57,82,38,51,21,69,20,'default.png'),(14,'Wedge',4,'2017-12-10',0,0,0,0,1,'2017-12-10 10:46:54','2017-12-10 10:46:54',NULL,9966,57,82,38,51,21,69,20,'default.png'),(15,'Blappa',4,'2017-12-10',0,0,0,0,1,'2017-12-10 10:47:28','2017-12-10 10:47:28',NULL,9920,60,59,23,37,29,59,13,'default.png'),(16,'Botta',4,'2017-12-10',0,0,0,0,1,'2017-12-10 10:47:50','2017-12-10 10:47:50',NULL,9121,60,34,46,16,61,26,21,'default.png'),(17,'Brother',5,'2017-12-10',0,0,0,0,1,'2017-12-10 10:48:35','2017-12-10 10:48:35',NULL,9999,99,59,54,44,45,42,20,'default.png'),(18,'Datto',5,'2017-12-10',0,0,0,0,1,'2017-12-10 10:48:56','2017-12-10 10:48:56',NULL,8567,90,65,26,34,26,62,20,'default.png'),(19,'Deim',5,'2017-12-10',0,0,0,0,1,'2017-12-10 10:49:33','2017-12-10 10:49:33',NULL,9999,60,37,46,89,69,16,20,'default.png'),(20,'Doram',5,'2017-12-10',0,0,0,0,1,'2017-12-10 10:49:52','2017-12-10 10:49:52',NULL,7982,60,32,38,42,36,20,20,'default.png'),(21,'Durren',6,'2017-12-10',0,0,0,0,1,'2017-12-10 10:50:18','2017-12-10 10:50:18',NULL,8920,60,28,25,24,33,4,24,'default.png'),(22,'Eigaar',6,'2017-12-10',0,0,0,0,1,'2017-12-10 10:50:42','2017-12-10 10:50:42',NULL,9999,60,46,31,47,47,61,12,'default.png'),(23,'Gazna Ronso',6,'2017-12-10',0,0,0,0,1,'2017-12-10 10:51:00','2017-12-10 10:51:00',NULL,6600,42,59,56,59,47,24,20,'default.png'),(24,'Gierra Guado',6,'2017-12-10',0,0,0,0,1,'2017-12-10 10:51:28','2017-12-10 10:51:28',NULL,8930,77,51,22,79,41,70,12,'default.png'),(25,'Graav',7,'2017-12-10',0,0,0,0,1,'2017-12-10 10:51:47','2017-12-10 10:51:47',NULL,7485,62,46,28,44,36,33,21,'default.png'),(26,'Irga Ronso',7,'2017-12-10',0,0,0,0,1,'2017-12-10 10:52:13','2017-12-10 10:52:13',NULL,6600,42,92,67,85,55,17,20,'default.png'),(27,'Isken',7,'2017-12-10',0,0,0,0,1,'2017-12-10 10:52:40','2017-12-10 10:52:40',NULL,9999,60,99,33,30,18,81,20,'default.png'),(28,'Jassu',7,'2017-12-10',0,0,0,0,1,'2017-12-10 10:53:13','2017-12-10 10:53:13',NULL,9999,67,37,50,52,44,20,20,'default.png'),(29,'Judda',8,'2017-12-10',0,0,0,0,1,'2017-12-10 10:53:31','2017-12-10 10:53:31',NULL,9631,60,60,50,75,61,10,22,'default.png'),(30,'Jumal',8,'2017-12-10',0,0,0,0,1,'2017-12-10 10:53:52','2017-12-10 10:53:52',NULL,9999,60,29,59,83,16,21,41,'default.png'),(31,'Keepa',8,'2017-12-10',0,0,0,0,1,'2017-12-10 10:54:16','2017-12-10 10:54:16',NULL,8028,53,45,22,23,57,99,39,'default.png'),(32,'Kiyuri',8,'2017-12-10',0,0,0,0,1,'2017-12-10 10:54:35','2017-12-10 10:54:35',NULL,9999,60,69,66,90,51,56,20,'default.png'),(33,'Kulukan',9,'2017-12-10',0,0,0,0,1,'2017-12-10 10:54:54','2017-12-10 10:54:54',NULL,9317,60,35,64,96,64,18,12,'default.png'),(34,'Kyou',9,'2017-12-10',0,0,0,0,1,'2017-12-10 10:55:12','2017-12-10 10:55:12',NULL,9999,71,41,44,89,69,20,46,'default.png'),(35,'Lakkam',9,'2017-12-10',0,0,0,0,1,'2017-12-10 10:55:34','2017-12-10 10:55:34',NULL,9999,60,70,49,66,68,22,21,'default.png'),(36,'Larbeight',9,'2017-12-10',0,0,0,0,1,'2017-12-10 10:55:53','2017-12-10 10:55:53',NULL,9999,60,87,50,22,26,96,20,'default.png'),(37,'Letty',10,'2017-12-10',0,0,0,0,1,'2017-12-10 10:56:11','2017-12-10 10:56:11',NULL,9260,60,61,37,83,39,39,20,'default.png'),(38,'Linna',10,'2017-12-10',0,0,0,0,1,'2017-12-10 10:56:47','2017-12-10 10:56:47',NULL,9999,59,27,60,99,61,92,19,'default.png'),(39,'Mep',10,'2017-12-10',0,0,0,0,1,'2017-12-10 10:57:04','2017-12-10 10:57:04',NULL,8880,60,46,45,60,19,56,20,'default.png'),(40,'Mifurey',10,'2017-12-10',0,0,0,0,1,'2017-12-10 10:57:20','2017-12-10 10:57:20',NULL,7631,69,88,52,89,52,59,14,'default.png'),(41,'Miyu',11,'2017-12-10',0,0,0,0,1,'2017-12-10 10:57:39','2017-12-10 10:57:39',NULL,7940,65,74,63,16,7,14,37,'default.png'),(42,'Naida',11,'2017-12-10',0,0,0,0,1,'2017-12-10 10:57:57','2017-12-10 10:57:57',NULL,9999,77,45,36,81,61,25,20,'default.png'),(43,'Navaro Guado',11,'2017-12-10',0,0,0,0,1,'2017-12-10 10:58:20','2017-12-10 10:58:20',NULL,7440,84,65,54,65,82,33,12,'default.png'),(44,'Nedus',11,'2017-12-10',0,0,0,0,1,'2017-12-10 10:58:44','2017-12-10 10:58:44',NULL,8920,99,71,24,33,11,74,14,'default.png'),(45,'Nimrook',12,'2017-12-10',0,0,0,0,1,'2017-12-10 10:59:01','2017-12-10 10:59:01',NULL,8719,60,83,27,31,33,24,67,'default.png'),(46,'Nizarut',12,'2017-12-10',0,0,0,0,1,'2017-12-10 10:59:19','2017-12-10 10:59:19',NULL,7930,57,56,51,45,62,50,60,'default.png'),(47,'Noy Guado',12,'2017-12-10',0,0,0,0,1,'2017-12-10 11:00:05','2017-12-10 11:00:05',NULL,9999,64,60,41,31,23,1,43,'default.png'),(48,'Nuvy Ronso',12,'2017-12-10',0,0,0,0,1,'2017-12-10 11:00:28','2017-12-10 11:00:28',NULL,5408,42,79,62,79,43,16,18,'default.png'),(49,'Pah Guado',13,'2017-12-10',0,0,0,0,1,'2017-12-10 11:00:51','2017-12-10 11:00:51',NULL,9999,69,42,53,58,75,9,12,'default.png'),(50,'Raudy',13,'2017-12-10',0,0,0,0,1,'2017-12-10 11:01:07','2017-12-10 11:01:07',NULL,7002,69,63,16,21,37,30,46,'default.png'),(51,'Rin',13,'2017-12-10',0,0,0,0,1,'2017-12-10 11:01:40','2017-12-10 11:01:40',NULL,9999,60,66,44,59,72,33,12,'default.png'),(52,'Ropp',13,'2017-12-10',0,0,0,0,1,'2017-12-10 11:01:57','2017-12-10 11:01:57',NULL,8895,60,46,73,96,53,11,20,'default.png'),(53,'Shaami',14,'2017-12-10',0,0,0,0,1,'2017-12-10 11:02:14','2017-12-10 11:02:14',NULL,8920,66,68,39,34,31,88,14,'default.png'),(54,'Shuu',14,'2017-12-10',0,0,0,0,1,'2017-12-10 11:02:37','2017-12-10 11:02:37',NULL,8156,60,57,53,91,32,10,12,'default.png'),(55,'Svanda',14,'2017-12-10',0,0,0,0,1,'2017-12-10 11:02:57','2017-12-10 11:02:57',NULL,8920,60,85,42,92,38,50,15,'default.png'),(56,'Tatts',14,'2017-12-10',0,0,0,0,1,'2017-12-10 11:03:13','2017-12-10 11:03:13',NULL,9999,71,82,47,70,70,53,11,'default.png'),(57,'Vilucha',15,'2017-12-10',0,0,0,0,1,'2017-12-10 11:03:55','2017-12-10 11:03:55',NULL,9999,60,83,23,43,33,91,15,'default.png'),(58,'Yuma Guado',15,'2017-12-10',0,0,0,0,1,'2017-12-10 11:06:14','2017-12-10 11:06:14',NULL,8635,65,19,27,38,16,13,48,'default.png'),(59,'Zalitz',15,'2017-12-10',0,0,0,0,1,'2017-12-10 11:06:36','2017-12-10 11:06:36',NULL,8920,59,45,34,60,70,22,20,'default.png'),(60,'Zamzi Ronso',15,'2017-12-10',0,0,0,0,1,'2017-12-10 11:06:59','2017-12-10 11:06:59',NULL,6364,40,44,13,22,50,9,55,'default.png'),(61,'Zazi Guado',16,'2017-12-10',0,0,0,0,1,'2017-12-10 11:07:20','2017-12-10 11:07:20',NULL,8450,77,51,12,70,36,64,21,'default.png'),(62,'Zev Ronso',16,'2017-12-10',0,0,0,0,1,'2017-12-10 11:07:38','2017-12-10 11:07:38',NULL,6600,57,73,65,54,50,35,13,'default.png'),(63,'Lulu',16,'2017-12-10',0,0,0,0,1,'2017-12-10 13:19:36','2017-12-10 13:19:36',NULL,7450,45,41,28,84,97,42,65,'default.png'),(64,'Wakka',16,'2017-12-10',0,0,0,0,1,'2017-12-10 13:20:26','2017-12-10 13:20:26',NULL,8942,77,51,36,81,61,25,20,'default.png');
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `players_history`
--

DROP TABLE IF EXISTS `players_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `players_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `player_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `enrollment_date` datetime NOT NULL,
  `leaving_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players_history`
--

LOCK TABLES `players_history` WRITE;
/*!40000 ALTER TABLE `players_history` DISABLE KEYS */;
INSERT INTO `players_history` VALUES (1,65,6,'2017-12-10 13:54:20',NULL),(2,1,1,'2017-12-10 19:10:12',NULL),(3,2,1,'2017-12-10 19:10:31',NULL),(4,3,1,'2017-12-10 19:10:34',NULL),(5,4,1,'2017-12-10 19:10:39',NULL),(6,5,2,'2017-12-10 19:11:06',NULL),(7,6,2,'2017-12-10 19:11:09',NULL),(8,7,2,'2017-12-10 19:11:11',NULL),(9,8,2,'2017-12-10 19:11:13',NULL),(10,9,3,'2017-12-10 19:11:21',NULL),(11,10,3,'2017-12-10 19:11:23',NULL),(12,11,3,'2017-12-10 19:11:26',NULL),(13,12,3,'2017-12-10 19:11:28',NULL),(14,13,4,'2017-12-10 19:11:32',NULL),(15,15,4,'2017-12-10 19:11:35',NULL),(16,14,4,'2017-12-10 19:11:37',NULL),(17,16,4,'2017-12-10 19:11:40',NULL),(18,17,5,'2017-12-10 19:11:45',NULL),(19,18,5,'2017-12-10 19:11:47',NULL),(20,19,5,'2017-12-10 19:11:49',NULL),(21,20,5,'2017-12-10 19:11:52',NULL),(22,21,6,'2017-12-10 19:11:56',NULL),(23,22,6,'2017-12-10 19:11:58',NULL),(24,23,6,'2017-12-10 19:12:00',NULL),(25,24,6,'2017-12-10 19:12:02',NULL),(26,25,7,'2017-12-10 19:12:05',NULL),(27,26,7,'2017-12-10 19:12:09',NULL),(28,27,7,'2017-12-10 19:12:11',NULL),(29,28,7,'2017-12-10 19:12:13',NULL),(30,29,7,'2017-12-10 19:12:15',NULL),(31,29,8,'2017-12-10 19:12:22',NULL),(32,30,8,'2017-12-10 19:12:25',NULL),(33,31,8,'2017-12-10 19:12:27',NULL),(34,32,8,'2017-12-10 19:12:29',NULL),(35,33,9,'2017-12-10 19:12:32',NULL),(36,34,9,'2017-12-10 19:12:34',NULL),(37,35,9,'2017-12-10 19:12:36',NULL),(38,36,9,'2017-12-10 19:12:38',NULL),(39,37,10,'2017-12-10 19:12:43',NULL),(40,38,10,'2017-12-10 19:12:46',NULL),(41,39,10,'2017-12-10 19:12:48',NULL),(42,40,10,'2017-12-10 19:12:51',NULL),(43,41,11,'2017-12-10 19:13:14',NULL),(44,42,11,'2017-12-10 19:13:16',NULL),(45,43,11,'2017-12-10 19:13:19',NULL),(46,44,11,'2017-12-10 19:13:22',NULL),(47,45,12,'2017-12-10 19:13:24',NULL),(48,46,12,'2017-12-10 19:13:26',NULL),(49,47,12,'2017-12-10 19:13:28',NULL),(50,48,12,'2017-12-10 19:13:30',NULL),(51,49,13,'2017-12-10 19:13:34',NULL),(52,50,13,'2017-12-10 19:13:36',NULL),(53,51,13,'2017-12-10 19:13:38',NULL),(54,52,13,'2017-12-10 19:13:41',NULL),(55,53,14,'2017-12-10 19:13:44',NULL),(56,54,14,'2017-12-10 19:13:46',NULL),(57,55,14,'2017-12-10 19:13:48',NULL),(58,56,14,'2017-12-10 19:13:50',NULL),(59,57,15,'2017-12-10 19:13:58',NULL),(60,58,15,'2017-12-10 19:14:00',NULL),(61,59,15,'2017-12-10 19:14:02',NULL),(62,60,15,'2017-12-10 19:14:04',NULL),(63,61,16,'2017-12-10 19:14:07',NULL),(64,62,16,'2017-12-10 19:14:09',NULL),(65,63,16,'2017-12-10 19:14:12',NULL),(66,64,16,'2017-12-10 19:14:14',NULL),(67,66,14,'2017-12-11 08:10:04',NULL),(68,67,1,'2017-12-11 14:38:05',NULL),(69,67,8,'2017-12-11 19:39:37',NULL),(70,68,1,'2017-12-11 19:45:10',NULL),(71,68,1,'2017-12-11 19:46:15',NULL),(72,68,1,'2017-12-11 19:46:52',NULL),(73,68,1,'2017-12-11 19:47:18',NULL),(74,68,1,'2017-12-11 19:48:02',NULL),(75,68,1,'2017-12-11 19:49:03',NULL),(76,68,1,'2017-12-11 19:49:18',NULL),(77,68,1,'2017-12-11 19:49:55',NULL),(78,68,1,'2017-12-11 19:50:14',NULL),(79,68,1,'2017-12-11 19:51:03',NULL),(80,68,1,'2017-12-11 19:51:23',NULL),(81,68,1,'2017-12-11 19:53:10',NULL),(82,68,1,'2017-12-11 19:54:06',NULL),(83,68,1,'2017-12-11 19:54:58',NULL),(84,68,1,'2017-12-11 19:55:00',NULL),(85,68,1,'2017-12-11 19:55:26',NULL),(86,68,1,'2017-12-11 19:56:14',NULL),(87,68,1,'2017-12-11 19:57:03',NULL),(88,68,1,'2017-12-11 19:57:27',NULL),(89,68,1,'2017-12-11 19:58:36',NULL),(90,65,17,'2017-12-11 23:11:31',NULL);
/*!40000 ALTER TABLE `players_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `referees`
--

DROP TABLE IF EXISTS `referees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `referees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referees`
--

LOCK TABLES `referees` WRITE;
/*!40000 ALTER TABLE `referees` DISABLE KEYS */;
INSERT INTO `referees` VALUES (1,'Pikachu',NULL),(2,'Salamèche',NULL),(3,'Bublbizarre',NULL),(4,'Carapuce',NULL);
/*!40000 ALTER TABLE `referees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_stats`
--

DROP TABLE IF EXISTS `team_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_stats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `player_number` int(11) NOT NULL,
  `match_played` int(11) NOT NULL,
  `w` int(11) NOT NULL,
  `l` int(11) NOT NULL,
  `goal` int(11) NOT NULL,
  `ranking` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_stats`
--

LOCK TABLES `team_stats` WRITE;
/*!40000 ALTER TABLE `team_stats` DISABLE KEYS */;
/*!40000 ALTER TABLE `team_stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,'Gullwings','Besaid','gullwings.png',1,NULL),(2,'Besaid Aurochs','Besaid','besaid_aurochs.png',1,NULL),(3,'Guado Glories','Guadosalam','guado_glories.png',1,NULL),(4,'Kilika Beasts','Kilika','kilika_beasts.png',1,NULL),(5,'Luca Goers','Luca','luca_goers.png',1,NULL),(6,'Ronso Fangs','Mt. Gagazet','ronso_fangs.png',1,NULL),(7,'Zanarkand Abes','Zanarkand','zanarkand_abes.png',1,NULL),(8,'Mi\'ihen Tempest','Mi\'ihen Highroad','miihen_tempest.png',1,NULL),(9,'Moon Flow','Moonflow','moon_flow.png',1,NULL),(10,'Bikanel Dust','Bikanel Desert','bikanel_dust.png',1,NULL),(11,'Thunder Pain','Thunder Plain','thunder_pain.png',1,NULL),(12,'Macalania\'s Fury','Macalania','macalania_fury.png',1,NULL),(13,'Unbevellable','Bevelle','unbevellable.png',1,NULL),(14,'Mushroom Dop','Mushroom Road','mushroom_dop.png',1,NULL),(15,'Djose Technology','Djose','djose_technology.png',1,NULL),(16,'Calm Echo','Calm Plain','calm_echo.png',1,NULL);
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tournament`
--

DROP TABLE IF EXISTS `tournament`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tournament` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `teams_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tournament`
--

LOCK TABLES `tournament` WRITE;
/*!40000 ALTER TABLE `tournament` DISABLE KEYS */;
/*!40000 ALTER TABLE `tournament` ENABLE KEYS */;
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
  `age` int(11) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `balance` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Yann','yann.savin@coding-academy.fr','$2y$10$kr/gWbypmNpzIc.zsE0R8..qrujmohxg41guWrSORlPAmHrvAWfx6',0,1,1,'xOoL2QA3NmlHYz6j5MnrkLbryhGRAr2BACceJtt3lZ3ruTsYpvXir9elUaNE','2017-12-07 11:48:29','2017-12-07 11:48:29',NULL,NULL,NULL,NULL,NULL,NULL),(2,'Yann','savinyann@hotmail.com','$2y$10$u05VhFMPEfLvkeH6NLU34.qkk.CRsKmdfoLpHx8YQNc2Y/oN7AKl.',28,1,1,'99QNxPjKy7jqxwy1AnL7jWSdfrWIe61H1atT7sPavvTGq1w6mvC2h5w6N4Lz','2017-12-08 13:37:46','2017-12-08 13:37:46',NULL,NULL,NULL,NULL,NULL,NULL),(3,'Fannette','sniperfannette@hotmail.fr','$2y$10$Bug8TeDJC.afZoCo0MDNJuoFTAepnVpsRMRoc0OiSOjs1yUTcfKmC',28,0,1,'GNGUick6RGuZGGz6Ngo90n1JR5vFYEVPoYx73ju0doYikJaCZPArd5kMlAm4','2017-12-10 14:35:31','2017-12-10 14:35:31',NULL,NULL,NULL,NULL,NULL,NULL);
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

-- Dump completed on 2017-12-16 18:07:40
