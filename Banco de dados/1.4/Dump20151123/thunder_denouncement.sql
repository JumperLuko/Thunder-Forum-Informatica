CREATE DATABASE  IF NOT EXISTS `thunder` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `thunder`;
-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: thunder
-- ------------------------------------------------------
-- Server version	5.5.44-0ubuntu0.14.04.1

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
-- Table structure for table `denouncement`
--

DROP TABLE IF EXISTS `denouncement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `denouncement` (
  `id_denouncement` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `denouncement_id_post` int(11) DEFAULT NULL,
  `denouncement_id_comment` int(11) DEFAULT NULL,
  `denouncement_id_tutorial` int(11) DEFAULT NULL,
  `denouncement_id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_denouncement`),
  KEY `fk_denouncement_1_idx` (`denouncement_id_post`),
  KEY `fk_denouncement_2_idx` (`denouncement_id_comment`),
  KEY `fk_denouncement_3_idx` (`denouncement_id_tutorial`),
  KEY `fk_denouncement_4_idx` (`denouncement_id_user`),
  CONSTRAINT `fk_denouncement_4` FOREIGN KEY (`denouncement_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_denouncement_1` FOREIGN KEY (`denouncement_id_post`) REFERENCES `post` (`id_post`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_denouncement_2` FOREIGN KEY (`denouncement_id_comment`) REFERENCES `comment` (`id_comment`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_denouncement_3` FOREIGN KEY (`denouncement_id_tutorial`) REFERENCES `tutorial` (`id_tutorial`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `denouncement`
--

LOCK TABLES `denouncement` WRITE;
/*!40000 ALTER TABLE `denouncement` DISABLE KEYS */;
/*!40000 ALTER TABLE `denouncement` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-23 11:57:31
