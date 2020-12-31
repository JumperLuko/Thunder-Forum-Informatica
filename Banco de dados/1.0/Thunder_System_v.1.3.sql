CREATE DATABASE  IF NOT EXISTS `thunder` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `thunder`;
-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: thunder_system
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
-- Table structure for table `category_post`
--

DROP TABLE IF EXISTS `category_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_post` (
  `id_category_post` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`id_category_post`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_post`
--

LOCK TABLES `category_post` WRITE;
/*!40000 ALTER TABLE `category_post` DISABLE KEYS */;
/*!40000 ALTER TABLE `category_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_user`
--

DROP TABLE IF EXISTS `category_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_user` (
  `id_category_user` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id_category_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_user`
--

LOCK TABLES `category_user` WRITE;
/*!40000 ALTER TABLE `category_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `category_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class_user`
--

DROP TABLE IF EXISTS `class_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class_user` (
  `id_class_user` int(11) NOT NULL,
  `class` varchar(20) NOT NULL,
  `level` int(3) NOT NULL,
  `score` int(6) NOT NULL,
  `class_id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_class_user`),
  KEY `class_id_user_idx` (`class_id_user`),
  CONSTRAINT `class_id_user` FOREIGN KEY (`class_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class_user`
--

LOCK TABLES `class_user` WRITE;
/*!40000 ALTER TABLE `class_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `class_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `comment_id_user` int(11) NOT NULL,
  `comment_id_post` int(11) DEFAULT NULL,
  `comment_id_tutorial` int(11) DEFAULT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `comment_id_user_idx` (`comment_id_user`),
  KEY `comment_id_post_idx` (`comment_id_post`),
  KEY `comment_id_tutorial_idx` (`comment_id_tutorial`),
  CONSTRAINT `comment_id_post` FOREIGN KEY (`comment_id_post`) REFERENCES `post` (`id_post`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `comment_id_tutorial` FOREIGN KEY (`comment_id_tutorial`) REFERENCES `tutorial` (`id_tutorial`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `comment_id_user` FOREIGN KEY (`comment_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `denouncement`
--

DROP TABLE IF EXISTS `denouncement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `denouncement` (
  `id_denouncement` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `denouncement_id_post` int(11) DEFAULT NULL,
  `denouncement_id_comment` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_denouncement`),
  KEY `denouncement_id_post_idx` (`denouncement_id_post`),
  KEY `fk_denouncement_id_comment_idx` (`denouncement_id_comment`),
  CONSTRAINT `denouncement_id_post` FOREIGN KEY (`denouncement_id_post`) REFERENCES `post` (`id_post`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_denouncement_id_comment` FOREIGN KEY (`denouncement_id_comment`) REFERENCES `comment` (`id_comment`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `denouncement`
--

LOCK TABLES `denouncement` WRITE;
/*!40000 ALTER TABLE `denouncement` DISABLE KEYS */;
/*!40000 ALTER TABLE `denouncement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `follow`
--

DROP TABLE IF EXISTS `follow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `follow` (
  `id_follow` int(11) NOT NULL,
  `follow_user` int(11) NOT NULL,
  `followed_user` int(11) NOT NULL,
  PRIMARY KEY (`idfollow`),
  KEY `followed_user_idx` (`followed_user`),
  KEY `follow_user_idx` (`follow_user`),
  CONSTRAINT `followed_user` FOREIGN KEY (`followed_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `follow_user` FOREIGN KEY (`follow_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `follow`
--

LOCK TABLES `follow` WRITE;
/*!40000 ALTER TABLE `follow` DISABLE KEYS */;
/*!40000 ALTER TABLE `follow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `date` date NOT NULL,
  `content` varchar(1000) NOT NULL,
  `post_id_user` int(11) NOT NULL,
  `post_id_category_post` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `post_id_user_idx` (`post_id_user`),
  KEY `fk_post_id_category_post_idx` (`post_id_category_post`),
  CONSTRAINT `fk_post_id_category_post` FOREIGN KEY (`post_id_category_post`) REFERENCES `category_post` (`id_category_post`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `post_id_user` FOREIGN KEY (`post_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutorial`
--

DROP TABLE IF EXISTS `tutorial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tutorial` (
  `id_tutorial` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `archive` varchar(200) NOT NULL,
  `tutorial_id_user` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id_tutorial`),
  KEY `tutorial_id_user_idx` (`tutorial_id_user`),
  CONSTRAINT `tutorial_id_user` FOREIGN KEY (`tutorial_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutorial`
--

LOCK TABLES `tutorial` WRITE;
/*!40000 ALTER TABLE `tutorial` DISABLE KEYS */;
/*!40000 ALTER TABLE `tutorial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `nickname` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `gender` char(1) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `user_id_category_user` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `fk_user_category_idx` (`user_id_category_user`),
  CONSTRAINT `fk_user_category` FOREIGN KEY (`user_id_category_user`) REFERENCES `category_user` (`id_category_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valuation`
--

DROP TABLE IF EXISTS `valuation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `valuation` (
  `id_valuation` int(20) NOT NULL,
  `value` int(1) NOT NULL,
  `valuation_id_comment` int(20) NOT NULL,
  PRIMARY KEY (`id_valuation`),
  KEY `valuation_id_comment_idx` (`valuation_id_comment`),
  CONSTRAINT `valuation_id_comment` FOREIGN KEY (`valuation_id_comment`) REFERENCES `comment` (`id_comment`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valuation`
--

LOCK TABLES `valuation` WRITE;
/*!40000 ALTER TABLE `valuation` DISABLE KEYS */;
/*!40000 ALTER TABLE `valuation` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-09 11:17:30
