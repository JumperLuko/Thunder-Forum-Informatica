-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2015 at 01:56 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thunder`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_post`
--

CREATE TABLE IF NOT EXISTS `category_post` (
  `idcategory_post` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`idcategory_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category_post`
--

INSERT INTO `category_post` (`idcategory_post`, `category`) VALUES
(1, 'Dúvidas do site'),
(2, 'Dúvidas simples'),
(3, 'Dúvidas Complexas');

-- --------------------------------------------------------

--
-- Table structure for table `category_user`
--

CREATE TABLE IF NOT EXISTS `category_user` (
  `idcategory_user` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`idcategory_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `category_user`
--

INSERT INTO `category_user` (`idcategory_user`, `type`) VALUES
(0, 'admin'),
(1, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `class_user`
--

CREATE TABLE IF NOT EXISTS `class_user` (
  `id_class_user` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(20) NOT NULL,
  `level` int(3) NOT NULL,
  `score` int(6) NOT NULL,
  PRIMARY KEY (`id_class_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `class_user`
--

INSERT INTO `class_user` (`id_class_user`, `class`, `level`, `score`) VALUES
(0, 'pedra', 0, 0),
(1, 'Lapis-lazuli', 1, 1000),
(2, 'jade', 2, 2000),
(10, 'diamante', 10, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(2000) NOT NULL,
  `status` char(1) NOT NULL,
  `comment_id_user` int(11) NOT NULL,
  `comment_id_post` int(11) NOT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `fk_comment_1_idx` (`comment_id_user`),
  KEY `fk_comment_2_idx` (`comment_id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `content`, `status`, `comment_id_user`, `comment_id_post`) VALUES
(1, 'Isso realmente é dúvidoso', '0', 2, 1),
(2, 'Como que anta têm dúvida, se o mesmo criou uma quest?', '0', 3, 1),
(3, 'Hue hue hue hue', '1', 4, 1),
(4, 'Preparado para ter um post deletado?', '0', 0, 1),
(5, 'a', '0', 1, 1),
(6, 'SOu zueiro', '0', 1, 1),
(7, 'mandando', '0', 1, 1),
(8, 'qualquer coisa aee...', '0', 1, 1),
(9, 'bla bla bla...', '0', 1, 2),
(10, 'Enviar quest 3', '0', 1, 3),
(11, 'Olá', '0', 1, 3),
(12, 'Oxi', '0', 1, 3),
(13, 'ola, ser user3', '0', 1, 3),
(14, 'escrever', '0', 1, 3),
(15, 'Vou banir todos', '0', 0, 3),
(16, 'olá, vaxio....', '0', 0, 4),
(17, 'O que importa é que tenha ubuntu\r\n', '0', 11, 1),
(18, 'sou dono disso', '0', 1, 2),
(19, 'kd o admin?', '0', 1, 2),
(20, 'puts', '0', 1, 2),
(21, 'bugou\r\n', '0', 1, 2),
(22, 'lallala\r\n', '0', 1, 2),
(23, 'thiago seu chato\r\n', '0', 1, 1),
(24, 'Post desnecssario pessoas', '0', 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `denouncement`
--

CREATE TABLE IF NOT EXISTS `denouncement` (
  `id_denouncement` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(1000) NOT NULL,
  `denouncement_id_post` int(11) DEFAULT NULL,
  `denouncement_id_comment` int(11) DEFAULT NULL,
  `denouncement_id_tutorial` int(11) DEFAULT NULL,
  `denouncement_id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_denouncement`),
  KEY `fk_denouncement_1_idx` (`denouncement_id_post`),
  KEY `fk_denouncement_2_idx` (`denouncement_id_comment`),
  KEY `fk_denouncement_3_idx` (`denouncement_id_tutorial`),
  KEY `fk_denouncement_4_idx` (`denouncement_id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `denouncement`
--

INSERT INTO `denouncement` (`id_denouncement`, `content`, `denouncement_id_post`, `denouncement_id_comment`, `denouncement_id_tutorial`, `denouncement_id_user`) VALUES
(1, 'ju', 1, NULL, NULL, 0),
(2, 'ju', 1, NULL, NULL, 0),
(3, 'Vou passar na bamca?', 2, NULL, NULL, 0),
(4, 'Vou passar na bamca?', NULL, 1, NULL, 0),
(5, 'Post desnecessário', 1, NULL, NULL, 13);

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `id_follow` int(11) NOT NULL AUTO_INCREMENT,
  `follow_user` int(11) NOT NULL,
  `followed_user` int(11) NOT NULL,
  PRIMARY KEY (`id_follow`),
  KEY `followed_user_idx` (`followed_user`),
  KEY `follow_user_idx` (`follow_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `content` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `post_id_category_post` int(11) NOT NULL,
  `post_id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_post`),
  KEY `fk_post_1_idx` (`post_id_category_post`),
  KEY `fk_post_2_idx` (`post_id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `date`, `content`, `status`, `post_id_category_post`, `post_id_user`) VALUES
(1, '2015-11-29 00:00:00', 'Como eu faço quests?', '0', 1, 1),
(2, '2015-11-21 00:00:00', 'Este site é novo', '0', 1, 6),
(3, '2015-10-12 00:00:00', 'Gostaram do site?', '0', 1, 9),
(4, '2015-04-01 00:00:00', 'Estou com problemas de não saber como ligar o mouse USB', '1', 2, 1),
(5, '2015-11-30 13:00:27', 'Por que os computadores da escola esquentam tanto?', '0', 1, 0),
(6, '2015-11-30 13:01:31', 'Por que os computadores da escola esquentam tanto?', '0', 3, 0),
(7, '2015-11-30 13:02:54', 'oxi gente', '0', 3, 0),
(8, '2015-11-30 13:03:28', 'Vou passar na bamca?', '0', 3, 0),
(9, '2015-11-30 14:43:34', 'Estou com duvidas em informatica', '0', 2, 0),
(10, '2015-12-02 13:24:41', 'Quais as equações que o processador calcula?', '0', 3, 1),
(11, '2015-12-03 08:52:24', 'Quais as equações que o processador calcula?', '0', 3, 1),
(12, '2015-12-03 08:53:26', 'Quais as equações que o processador calcula?', '0', 1, 1),
(13, '2015-12-03 08:53:36', 'Vou passar na bamca?', '0', 1, 1),
(14, '2015-12-03 10:41:46', 'Oxi porra', '0', 1, 1),
(15, '2015-12-03 10:41:58', '-aÃ£-dia', '0', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE IF NOT EXISTS `tutorial` (
  `id_tutorial` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(1000) NOT NULL,
  `archive` varchar(200) NOT NULL,
  `tutorial_id_user` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id_tutorial`),
  KEY `tutorial_id_user_idx` (`tutorial_id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id_category_user` int(11) NOT NULL,
  `user_id_class_user` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `fk_user_category_idx` (`user_id_category_user`),
  KEY `fk_user_1_idx` (`user_id_class_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `nickname`, `email`, `gender`, `password`, `user_id_category_user`, `user_id_class_user`) VALUES
(0, 'admin', 'admin', 'admin@email.com', 'm', 'admin', 0, 10),
(1, 'user1', 'user1', 'user1@email.com', 'm', 'user1', 1, 0),
(2, 'User2', 'User2', 'user2@email.com', 'f', 'user2', 1, 0),
(3, 'User3', 'User3', 'user3@email.com', 'm', 'user3', 1, 0),
(4, 'User4', 'User4', 'user4@email.com', 'f', 'user4', 1, 0),
(5, 'User5', 'User5', 'user5@email.com', 'm', 'user5', 1, 0),
(6, 'User6', 'User6', 'user6@email.com', 'f', 'user6', 1, 0),
(7, 'User7', 'User7', 'user7@email.com', 'm', 'user7', 1, 0),
(8, 'User8', 'User8', 'user8@email.com', 'f', 'user8', 1, 0),
(9, 'User9', 'User9', 'user9@email.com', 'm', 'user9', 1, 0),
(10, 'User10', 'User10', 'user10@email.com', 'f', 'user10', 1, 0),
(11, 'Marco Andre Ubuntu', 'Marcubuntu', 'marco@ubuntu.com', 'M', 'ubuntu', 1, 0),
(12, '', '', '', '', '', 1, 0),
(13, 'Usuario leigo', 'Usuario_leigo', 'Usuario_leigo@email.com', 'm', 'senha', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `valuation`
--

CREATE TABLE IF NOT EXISTS `valuation` (
  `id_valuation` int(20) NOT NULL AUTO_INCREMENT,
  `value` int(1) NOT NULL,
  `valuation_id_comment` int(11) NOT NULL,
  PRIMARY KEY (`id_valuation`),
  KEY `valuation_id_comment_idx` (`valuation_id_comment`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_1` FOREIGN KEY (`comment_id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `fk_comment_2` FOREIGN KEY (`comment_id_post`) REFERENCES `post` (`id_post`);

--
-- Constraints for table `denouncement`
--
ALTER TABLE `denouncement`
  ADD CONSTRAINT `fk_denouncement_1` FOREIGN KEY (`denouncement_id_post`) REFERENCES `post` (`id_post`),
  ADD CONSTRAINT `fk_denouncement_2` FOREIGN KEY (`denouncement_id_comment`) REFERENCES `comment` (`id_comment`),
  ADD CONSTRAINT `fk_denouncement_3` FOREIGN KEY (`denouncement_id_tutorial`) REFERENCES `tutorial` (`id_tutorial`),
  ADD CONSTRAINT `fk_denouncement_4` FOREIGN KEY (`denouncement_id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `followed_user` FOREIGN KEY (`followed_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `follow_user` FOREIGN KEY (`follow_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_1` FOREIGN KEY (`post_id_category_post`) REFERENCES `category_post` (`idcategory_post`),
  ADD CONSTRAINT `fk_post_2` FOREIGN KEY (`post_id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD CONSTRAINT `tutorial_id_user` FOREIGN KEY (`tutorial_id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_1` FOREIGN KEY (`user_id_class_user`) REFERENCES `class_user` (`id_class_user`),
  ADD CONSTRAINT `fk_user_category` FOREIGN KEY (`user_id_category_user`) REFERENCES `category_user` (`idcategory_user`);

--
-- Constraints for table `valuation`
--
ALTER TABLE `valuation`
  ADD CONSTRAINT `valuation_id_comment` FOREIGN KEY (`valuation_id_comment`) REFERENCES `comment` (`id_comment`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
