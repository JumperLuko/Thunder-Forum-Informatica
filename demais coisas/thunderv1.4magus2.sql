SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema thunder
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `thunder` ;
CREATE SCHEMA IF NOT EXISTS `thunder` DEFAULT CHARACTER SET utf8_unicode_ci ;
USE `thunder` ;

-- -----------------------------------------------------
-- Table `thunder`.`category_post`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `thunder`.`category_post` ;

CREATE TABLE IF NOT EXISTS `thunder`.`category_post` (
  `idcategory_post` INT(11) NOT NULL AUTO_INCREMENT,
  `category` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idcategory_post`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `thunder`.`category_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `thunder`.`category_user` ;

CREATE TABLE IF NOT EXISTS `thunder`.`category_user` (
  `idcategory_user` INT(11) NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`idcategory_user`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `thunder`.`class_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `thunder`.`class_user` ;

CREATE TABLE IF NOT EXISTS `thunder`.`class_user` (
  `id_class_user` INT(11) NOT NULL AUTO_INCREMENT,
  `class` VARCHAR(20) NOT NULL,
  `level` INT(3) NOT NULL,
  `score` INT(6) NOT NULL,
  PRIMARY KEY (`id_class_user`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `thunder`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `thunder`.`user` ;

CREATE TABLE IF NOT EXISTS `thunder`.`user` (
  `id_user` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(1000) NOT NULL,
  `nickname` VARCHAR(1000) NOT NULL,
  `email` VARCHAR(1000) NOT NULL,
  `gender` CHAR(1) NOT NULL,
  `password` VARCHAR(1000) NOT NULL,
  `user_id_category_user` INT(11) NOT NULL,
  `user_id_class_user` INT(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  INDEX `fk_user_category_idx` (`user_id_category_user` ASC),
  INDEX `fk_user_1_idx` (`user_id_class_user` ASC),
  CONSTRAINT `fk_user_1`
    FOREIGN KEY (`user_id_class_user`)
    REFERENCES `thunder`.`class_user` (`id_class_user`),
  CONSTRAINT `fk_user_category`
    FOREIGN KEY (`user_id_category_user`)
    REFERENCES `thunder`.`category_user` (`idcategory_user`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `thunder`.`post`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `thunder`.`post` ;

CREATE TABLE IF NOT EXISTS `thunder`.`post` (
  `id_post` INT(11) NOT NULL AUTO_INCREMENT,
  `date` DATE NOT NULL,
  `content` VARCHAR(2000) NOT NULL,
  `status` CHAR(1) NOT NULL,
  `post_id_category_post` INT(11) NOT NULL,
  `post_id_user` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_post`),
  INDEX `fk_post_1_idx` (`post_id_category_post` ASC),
  INDEX `fk_post_2_idx` (`post_id_user` ASC),
  CONSTRAINT `fk_post_2`
    FOREIGN KEY (`post_id_user`)
    REFERENCES `thunder`.`user` (`id_user`),
  CONSTRAINT `fk_post_1`
    FOREIGN KEY (`post_id_category_post`)
    REFERENCES `thunder`.`category_post` (`idcategory_post`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `thunder`.`comment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `thunder`.`comment` ;

CREATE TABLE IF NOT EXISTS `thunder`.`comment` (
  `id_comment` INT(11) NOT NULL AUTO_INCREMENT,
  `content` VARCHAR(2000) NOT NULL,
  `status` CHAR(1) NOT NULL,
  `comment_id_user` INT(11) NOT NULL,
  `comment_id_post` INT(11) NOT NULL,
  PRIMARY KEY (`id_comment`),
  INDEX `fk_comment_1_idx` (`comment_id_user` ASC),
  INDEX `fk_comment_2_idx` (`comment_id_post` ASC),
  CONSTRAINT `fk_comment_2`
    FOREIGN KEY (`comment_id_post`)
    REFERENCES `thunder`.`post` (`id_post`),
  CONSTRAINT `fk_comment_1`
    FOREIGN KEY (`comment_id_user`)
    REFERENCES `thunder`.`user` (`id_user`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `thunder`.`tutorial`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `thunder`.`tutorial` ;

CREATE TABLE IF NOT EXISTS `thunder`.`tutorial` (
  `id_tutorial` INT(11) NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(1000) NOT NULL,
  `archive` VARCHAR(200) NOT NULL,
  `tutorial_id_user` INT(11) NOT NULL,
  `status` CHAR(1) NOT NULL,
  PRIMARY KEY (`id_tutorial`),
  INDEX `tutorial_id_user_idx` (`tutorial_id_user` ASC),
  CONSTRAINT `tutorial_id_user`
    FOREIGN KEY (`tutorial_id_user`)
    REFERENCES `thunder`.`user` (`id_user`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `thunder`.`denouncement`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `thunder`.`denouncement` ;

CREATE TABLE IF NOT EXISTS `thunder`.`denouncement` (
  `id_denouncement` INT(11) NOT NULL AUTO_INCREMENT,
  `content` VARCHAR(1000) NOT NULL,
  `denouncement_id_post` INT(11) NULL DEFAULT NULL,
  `denouncement_id_comment` INT(11) NULL DEFAULT NULL,
  `denouncement_id_tutorial` INT(11) NULL DEFAULT NULL,
  `denouncement_id_user` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_denouncement`),
  INDEX `fk_denouncement_1_idx` (`denouncement_id_post` ASC),
  INDEX `fk_denouncement_2_idx` (`denouncement_id_comment` ASC),
  INDEX `fk_denouncement_3_idx` (`denouncement_id_tutorial` ASC),
  INDEX `fk_denouncement_4_idx` (`denouncement_id_user` ASC),
  CONSTRAINT `fk_denouncement_4`
    FOREIGN KEY (`denouncement_id_user`)
    REFERENCES `thunder`.`user` (`id_user`),
  CONSTRAINT `fk_denouncement_1`
    FOREIGN KEY (`denouncement_id_post`)
    REFERENCES `thunder`.`post` (`id_post`),
  CONSTRAINT `fk_denouncement_2`
    FOREIGN KEY (`denouncement_id_comment`)
    REFERENCES `thunder`.`comment` (`id_comment`),
  CONSTRAINT `fk_denouncement_3`
    FOREIGN KEY (`denouncement_id_tutorial`)
    REFERENCES `thunder`.`tutorial` (`id_tutorial`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `thunder`.`follow`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `thunder`.`follow` ;

CREATE TABLE IF NOT EXISTS `thunder`.`follow` (
  `id_follow` INT(11) NOT NULL AUTO_INCREMENT,
  `follow_user` INT(11) NOT NULL,
  `followed_user` INT(11) NOT NULL,
  PRIMARY KEY (`id_follow`),
  INDEX `followed_user_idx` (`followed_user` ASC),
  INDEX `follow_user_idx` (`follow_user` ASC),
  CONSTRAINT `followed_user`
    FOREIGN KEY (`followed_user`)
    REFERENCES `thunder`.`user` (`id_user`),
  CONSTRAINT `follow_user`
    FOREIGN KEY (`follow_user`)
    REFERENCES `thunder`.`user` (`id_user`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `thunder`.`valuation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `thunder`.`valuation` ;

CREATE TABLE IF NOT EXISTS `thunder`.`valuation` (
  `id_valuation` INT(20) NOT NULL AUTO_INCREMENT,
  `value` INT(1) NOT NULL,
  `valuation_id_comment` INT(11) NOT NULL,
  PRIMARY KEY (`id_valuation`),
  INDEX `valuation_id_comment_idx` (`valuation_id_comment` ASC),
  CONSTRAINT `valuation_id_comment`
    FOREIGN KEY (`valuation_id_comment`)
    REFERENCES `thunder`.`comment` (`id_comment`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

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
-- Dumping data for table `class_user`
--

INSERT INTO `class_user` (`id_class_user`, `class`, `level`, `score`) VALUES
(0, 'pedra', 0, 0),
(1, 'Lapis-lazuli', 1, 1000),
(2, 'jade', 2, 2000),
(10, 'diamante', 10, 10000);

-- --------------------------------------------------------

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
-- (11, '2015-12-03 08:52:24', 'Quais as equações que o processador calcula?', '0', 3, 1),
-- (12, '2015-12-03 08:53:26', 'Quais as equações que o processador calcula?', '0', 1, 1),
-- (13, '2015-12-03 08:53:36', 'Vou passar na bamca?', '0', 1, 1),
-- (14, '2015-12-03 10:41:46', 'Oxi porra', '0', 1, 1),
(14, '2015-12-03 10:41:58', '-aÃ£-dia', '0', 1, 1);

-- --------------------------------------------------------

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
-- Dumping data for table `denouncement`
--

INSERT INTO `denouncement` (`id_denouncement`, `content`, `denouncement_id_post`, `denouncement_id_comment`, `denouncement_id_tutorial`, `denouncement_id_user`) VALUES
(1, 'ju', 1, NULL, NULL, 0),
(2, 'ju', 1, NULL, NULL, 0),
(3, 'Vou passar na bamca?', 2, NULL, NULL, 0),
(4, 'Vou passar na bamca?', NULL, 1, NULL, 0),
(5, 'Post desnecessário', 1, NULL, NULL, 13);

-- --------------------------------------------------------
