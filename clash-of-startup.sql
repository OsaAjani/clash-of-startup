-- MySQL dump 10.13  Distrib 5.6.28, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: clash_of_startup
-- ------------------------------------------------------
-- Server version	5.6.28-0ubuntu0.15.04.1

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
-- Table structure for table `matchs`
--

DROP TABLE IF EXISTS `matchs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matchs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `startup_id_one` int(11) NOT NULL,
  `startup_id_two` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `startup_id_one` (`startup_id_one`),
  KEY `startup_id_two` (`startup_id_two`),
  CONSTRAINT `matchs_ibfk_1` FOREIGN KEY (`startup_id_one`) REFERENCES `startups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `matchs_ibfk_2` FOREIGN KEY (`startup_id_two`) REFERENCES `startups` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matchs`
--

LOCK TABLES `matchs` WRITE;
/*!40000 ALTER TABLE `matchs` DISABLE KEYS */;
INSERT INTO `matchs` VALUES (3,1,3),(4,2,3),(6,1,2),(9,2,3),(11,2,5),(12,2,3),(13,3,5),(17,1,5),(18,2,5),(19,2,5),(20,3,5),(23,2,5),(24,2,3),(25,1,3),(28,2,5),(31,3,5),(33,1,5),(34,2,5),(36,2,5),(38,1,2),(39,1,2),(41,2,5),(42,2,5),(44,1,3),(45,1,2),(49,2,5);
/*!40000 ALTER TABLE `matchs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `startups`
--

DROP TABLE IF EXISTS `startups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `startups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `randomid` varchar(32) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `randomid` (`randomid`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `startups`
--

LOCK TABLES `startups` WRITE;
/*!40000 ALTER TABLE `startups` DISABLE KEYS */;
INSERT INTO `startups` VALUES (1,'56b7c025c2c9e','LogBerry','Création d\'un boîtier de log pour les PME ne disposant pas de service informatique'),(2,'56b7c064560e1','ASSINIE LA VIE','Création d\'un dispensaire médical pour femmes enceintes en Côte d\'Ivoire'),(3,'56b7c064561be','D.I.P','Création d\'un système de gestion centralisé de tous les objets et protocoles domotiques'),(5,'56b7c0645617a','InCouch','Création d\'une plateforme de streaming gratuite via un client lourd pour la diffusion de vieux films tombés dans le domaine publique.'),(54,'56bc9a638e3e1','Sois créatif avec Bibou',''),(55,'56bc9a63d8484','Pluchovor',''),(56,'56bc9a6427afb','Shoes Choices',''),(57,'56bc9a645a172','Tori',''),(58,'56bc9a6550669','PhotoFashion',''),(59,'56bc9a6658250','Nails Cover',''),(60,'56bc9a66bd8c7','Les Illusions Architecturales',''),(61,'56bc9a6774bbd','WiTime',''),(62,'56bc9a67b4d49','Product & Go',''),(63,'56bc9a67ee22c','Création d’un jeu de société',''),(64,'56bc9a6861f37','Native Project, Marque vestimentaire',''),(65,'56bc9a68a555b','L’ANIMATION EN DIMENSION 2.5',''),(66,'56bc9a69346be','Vide ton Frigo',''),(67,'56bc9a69db6e6','A vos concours (Mini Maousse)',''),(68,'56bc9a6beee80','POP UP STORE, magasin éphémère, concept store.',''),(69,'56bc9a6c8b636','SOS SPA','');
/*!40000 ALTER TABLE `startups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `votes`
--

DROP TABLE IF EXISTS `votes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(39) NOT NULL,
  `at` datetime NOT NULL,
  `startup_id` int(11) NOT NULL,
  `desire` int(11) NOT NULL,
  `profitability` int(11) NOT NULL,
  `feasibility` int(11) NOT NULL,
  `budget` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `startup_id` (`startup_id`),
  CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`startup_id`) REFERENCES `startups` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votes`
--

LOCK TABLES `votes` WRITE;
/*!40000 ALTER TABLE `votes` DISABLE KEYS */;
INSERT INTO `votes` VALUES (1,'127.0.0.1','2016-02-08 03:07:58',3,4,2,3,10),(2,'127.0.0.1','2016-02-08 03:08:29',1,1,4,5,25),(3,'127.0.0.1','2016-02-08 03:08:43',2,4,1,4,25),(4,'127.0.0.1','2016-02-08 03:47:35',2,5,2,4,50),(5,'127.0.0.1','2016-02-08 03:47:59',2,5,1,3,5),(6,'127.0.0.1','2016-02-08 03:48:16',2,4,2,2,75),(7,'127.0.0.1','2016-02-08 03:48:34',3,4,5,1,10),(9,'127.0.0.1','2016-02-08 15:21:24',3,4,4,1,10),(11,'127.0.0.1','2016-02-08 15:22:00',1,2,4,5,25),(12,'127.0.0.1','2016-02-10 22:29:58',2,3,1,2,25),(14,'127.0.0.1','2016-02-11 09:12:19',3,3,1,3,50),(16,'127.0.0.1','2016-02-11 09:36:58',1,1,1,1,0);
/*!40000 ALTER TABLE `votes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-11 15:30:32
