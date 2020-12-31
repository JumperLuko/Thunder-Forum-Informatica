CREATE DATABASE  IF NOT EXISTS `thunder` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `thunder`;
-- MySQL dump 10.13  Distrib 5.6.25, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: thunder
-- ------------------------------------------------------
-- Server version	5.6.25-0ubuntu0.15.04.1

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
  `idcategory_post` int(11) NOT NULL,
  `category` varchar(45) NOT NULL,
  `category_post_id_post` int(20) NOT NULL,
  PRIMARY KEY (`idcategory_post`),
  KEY `category_post_id_post_idx` (`category_post_id_post`),
  CONSTRAINT `category_post_id_post` FOREIGN KEY (`category_post_id_post`) REFERENCES `post` (`idpost`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  `idcategory_user` int(11) NOT NULL,
  `type` varchar(6) NOT NULL,
  `category_id_user` int(11) NOT NULL,
  PRIMARY KEY (`idcategory_user`),
  KEY `category_id_user_idx` (`category_id_user`),
  CONSTRAINT `category_id_user` FOREIGN KEY (`category_id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  `idclass_user` int(11) NOT NULL,
  `class` varchar(45) NOT NULL,
  `level` int(3) NOT NULL,
  `score` int(6) NOT NULL,
  `class_id_user` int(11) NOT NULL,
  PRIMARY KEY (`idclass_user`),
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
  `id_comment` int(20) NOT NULL,
  `content` varchar(45) NOT NULL,
  `comment_id_user` int(11) NOT NULL,
  `comment_id_post` int(20) DEFAULT NULL,
  `comment_id_tutorial` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `comment_id_user_idx` (`comment_id_user`),
  KEY `comment_id_post_idx` (`comment_id_post`),
  KEY `comment_id_tutorial_idx` (`comment_id_tutorial`),
  CONSTRAINT `comment_id_post` FOREIGN KEY (`comment_id_post`) REFERENCES `post` (`idpost`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
  `id_denouncement` int(20) NOT NULL,
  `content` varchar(255) NOT NULL,
  `denouncement_id_post` int(20) NOT NULL,
  PRIMARY KEY (`id_denouncement`),
  KEY `denouncement_id_post_idx` (`denouncement_id_post`),
  CONSTRAINT `denouncement_id_post` FOREIGN KEY (`denouncement_id_post`) REFERENCES `post` (`idpost`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  `idfollow` int(20) NOT NULL,
  `follow_user` int(11) NOT NULL,
  `followed_user` int(11) NOT NULL,
  PRIMARY KEY (`idfollow`),
  KEY `followed_user_idx` (`followed_user`),
  KEY `follow_user_idx` (`follow_user`),
  CONSTRAINT `follow_user` FOREIGN KEY (`follow_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `followed_user` FOREIGN KEY (`followed_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  `idpost` int(20) NOT NULL,
  `date` date NOT NULL,
  `content` varchar(2555) NOT NULL,
  `post_id_user` int(11) NOT NULL,
  PRIMARY KEY (`idpost`),
  KEY `post_id_user_idx` (`post_id_user`),
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
  `id_tutorial` int(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `archive` varchar(255) NOT NULL,
  `tutorial_id_user` int(11) NOT NULL,
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
  `name` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` int(1) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
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

-- Dump completed on 2015-08-15 17:55:26
