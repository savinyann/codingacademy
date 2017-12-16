-- MySQL dump 10.13  Distrib 5.5.58, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: MVC_Rush
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
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creator_id` int(10) unsigned DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime NOT NULL,
  `modification_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (55,'Welcome','Hello everyone and welcome on this new site. The purpose of this site is to talk about a lot of thing, even when you are not close to us. Feel free to post comment, but please, stay open minded and do not flame each other.',54,16,'2017-12-04 22:44:21','2017-12-04 22:44:21'),(56,'My life as a jedi start now','Since I met Obiwan Kenobi, I was promise I will be soon a jedi. I have work all my life since, I have done many efforts, and finally, today, I have been rewarded. I want to thanks everyone, like Obiwan, who trained me, Rex, who was always with me on battlefield, Padme for being here, supporting me and so many people that I could not count.\r\nThanks a lot !',47,14,'2017-12-04 22:49:16','2017-12-04 22:49:16'),(57,'Great new !','Hey guyz, I have a great new for you: I am pregnant. I will have two child soon ;p',49,13,'2017-12-05 08:57:00','2017-12-05 08:57:00');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (13,'Clone Wars'),(14,'Jedi'),(15,'Sith'),(16,'Other');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `article_id` int(10) unsigned DEFAULT NULL,
  `creator_id` int(10) unsigned DEFAULT NULL,
  `creation_date` datetime NOT NULL,
  `modification_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (17,'Padme Like this',56,49,'2017-12-04 22:49:59',NULL),(18,'Good job, general Skywalker ! You deserve this. I hope we could fight together for a long time again.',56,56,'2017-12-04 22:53:12',NULL),(19,'Congratulation Anakin. I am pretty sure you will soon become a Jedi Master.\r\n(Or the most powerful Sith the galaxy has never knew..)',56,51,'2017-12-05 08:43:23',NULL),(20,'Yeah, you worked hard to get this, I am really proud of you. What do you think about celebrating your promotion ? I know a good pub on Mandalore where we can go after work with some friend.',56,48,'2017-12-05 08:47:21',NULL),(21,'Yeah... You just want to see again the mandalore princess, right ?\r\nFine, we will do this. But you invite me !',56,47,'2017-12-05 08:48:12',NULL),(22,'I want to come with you, can I ?',56,50,'2017-12-05 08:49:41',NULL),(23,'Obviously, it would not be the same without my apprentice, Snips.',56,47,'2017-12-05 08:52:22',NULL),(24,'Missa wanna be here too.',56,52,'2017-12-05 08:53:23',NULL),(25,'Go die !',56,48,'2017-12-05 08:53:55',NULL),(26,'Go die !',56,50,'2017-12-05 08:54:18',NULL),(27,'Go die !',56,47,'2017-12-05 08:54:41',NULL),(28,'Go die !',56,49,'2017-12-05 08:55:00',NULL),(29,'Go die !',56,51,'2017-12-05 08:55:24',NULL),(30,'Congratulation. I am dying to finally meet you and your son !',57,62,'2017-12-05 08:58:50',NULL),(31,'Yeah ! Me too. Except I hope this will be girls!',57,63,'2017-12-05 09:00:57',NULL);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (37,'first',55),(38,'JediMaster',56),(39,'pregnant',57),(40,'Leia',57),(41,'Luke',57);
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `group` tinyint(3) unsigned DEFAULT '0',
  `status` tinyint(3) unsigned DEFAULT '1',
  `creation_date` datetime NOT NULL,
  `modification_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (47,'Sky_Anakin','$2y$10$qxdsa2eipOC8EmW8dn2hh.fRCLkqN/nyK8ju9CJR0omqAbsEDiyRW','anakinskywalker@jedi.jedi',1,1,'2017-12-04 22:23:28','2017-12-04 22:23:28'),(48,'kenobi-wan','$2y$10$THmWuVrj.2Mt4A.oeBQsg.gkL3JXnuRRbitc5KMtlNma1SVBneG9O','kenobi@master.jedi',2,1,'2017-12-04 22:24:30','2017-12-04 22:24:30'),(49,'padme','$2y$10$H3EBW0I5eXJ/gO4YZ400sedDOkF4rVKeU6siSbX7blEq7JMywTAFm','padme_amidala@naboo.nab',1,1,'2017-12-04 22:26:23','2017-12-04 22:26:23'),(50,'ahsoka','$2y$10$MMAJZ7bveLU9e3LNRyxv9uA7E8Jr.Oj7SuF2YnFONUjN0LPB1vA4.','ahsokatano@padawan.jedi',0,1,'2017-12-04 22:27:10','2017-12-04 22:27:10'),(51,'palpatine','$2y$10$kb6u8Ax9YeiOM/W9dXXX7e1ajnhcr0YwixRz6E4PY.006Wr.A4Dve','palpatine@senator.cor',2,1,'2017-12-04 22:28:48','2017-12-04 22:28:48'),(52,'jarjar','$2y$10$R.uWWJy713MAdC8ljUR7Zugtj4wfZpV/ZEv8RQQiwz5IWZQF7DGby','jarjarbinks@killme.nab',0,1,'2017-12-04 22:29:11','2017-12-04 22:29:11'),(53,'quigon','$2y$10$V8gJU76vK7UqgZ.CxE3BL.VyT4nl94IClAAY4jd.9LKGykdvrXPAG','quigonjin@master.jedi',1,1,'2017-12-04 22:29:46','2017-12-04 22:29:46'),(54,'yoda','$2y$10$38Y4hTV279D6.NlnKanWqesDr56.7ITyTjmiir0IwkZc5sm0cKY06','yoda@master.jedi',2,1,'2017-12-04 22:30:21','2017-12-04 22:30:21'),(55,'Cody','$2y$10$4bw0BwiRrYQ7fKWIubcB8OxqngJPOagyG.24JZUSg0R.M/yV2QpH.','cody@clone.army',0,1,'2017-12-04 22:30:56','2017-12-04 22:30:56'),(56,'Rex','$2y$10$LyZ0JiptaMNrm7mJNDhqMuGxPkNYs55qNsyp3aN.6h4FlyBcIdBGy','rex@clone.army',0,1,'2017-12-04 22:31:12','2017-12-04 22:31:12'),(57,'DarkVador','$2y$10$u8rrkLIB0I0YfJ2id/idHOClAKGXoe.HzSyVLIcRuy.mhy1Kr84Dm','darky@empire.emp',1,1,'2017-12-04 22:31:52','2017-12-04 22:31:52'),(58,'Sidious','$2y$10$HZ9d7Ar4RVkx9mMI6WtW9uuhFWSeSgCuG6577bZMIKBgoiJ6/aDRy','darksidious@empire.emp',2,1,'2017-12-04 22:32:46','2017-12-04 22:32:46'),(59,'Dooku','$2y$10$WAQ36DlTjChPrtflkB12w.y/onCU74Xf2/cO5CyvDTLmiRzsJkZEK','countdooku@separatist.cis',0,1,'2017-12-04 22:34:12','2017-12-04 22:34:12'),(60,'grievous','$2y$10$LviO9Frqco5tbSAYx9ppt.39V7dDvOEiv5PxZpzgx94Qkjs3jNHWm','generalgrievous@separatist.cis',1,1,'2017-12-04 22:34:53','2017-12-04 22:34:53'),(61,'darkmaul','$2y$10$NrIbGlD.OO381c1FQTzJSehtmL1QKxcpbPa40Q3OuxTMJBS1YwkgW','darkmaul@sith.sith',0,1,'2017-12-04 22:35:26','2017-12-04 22:35:26'),(62,'Leia','$2y$10$jY9CvkCzM53hZDnyJS58k.04zoAnw7q7zXxLDFv/sBPAuMU0YffXW','princessleia@alderaan.ald',1,1,'2017-12-04 22:36:37','2017-12-04 22:36:37'),(63,'Luke','$2y$10$1XXoqstm3V8ghb579/h70uLKRvHSSdjX1WtV/x2B01Y9SftsdlgRi','luke.skywalker@tatooine.tat',0,1,'2017-12-04 22:37:07','2017-12-04 22:37:07');
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

-- Dump completed on 2017-12-16 18:06:45
