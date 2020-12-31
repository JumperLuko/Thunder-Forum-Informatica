SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';







CREATE TABLE `thund`.`category_post` (
  `idcategory_post` INT(11) NOT NULL AUTO_INCREMENT,
  `category` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idcategory_post`))

DEFAULT CHARACTER SET = utf8 
DEFAULT COLLATE utf8_general_ci;



CREATE TABLE `thund`.`category_user` (
  `idcategory_user` INT(11) NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`idcategory_user`))

DEFAULT CHARACTER SET = utf8 
DEFAULT COLLATE utf8_general_ci;



CREATE TABLE `thund`.`class_user` (
  `id_class_user` INT(11) NOT NULL AUTO_INCREMENT,
  `class` VARCHAR(20) NOT NULL,
  `level` INT(3) NOT NULL,
  `score` INT(6) NOT NULL,
  PRIMARY KEY (`id_class_user`))

DEFAULT CHARACTER SET = utf8 
DEFAULT COLLATE utf8_general_ci;


CREATE TABLE `thund`.`user` (
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
    REFERENCES `thund`.`class_user` (`id_class_user`),
  CONSTRAINT `fk_user_category`
    FOREIGN KEY (`user_id_category_user`)
    REFERENCES `thund`.`category_user` (`idcategory_user`))

DEFAULT CHARACTER SET = utf8 
DEFAULT COLLATE utf8_general_ci;



CREATE TABLE `thund`.`post` (
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
    REFERENCES `thund`.`user` (`id_user`),
  CONSTRAINT `fk_post_1`
    FOREIGN KEY (`post_id_category_post`)
    REFERENCES `thund`.`category_post` (`idcategory_post`))

DEFAULT CHARACTER SET = utf8 
DEFAULT COLLATE utf8_general_ci;



CREATE TABLE `thund`.`comment` (
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
    REFERENCES `thund`.`post` (`id_post`),
  CONSTRAINT `fk_comment_1`
    FOREIGN KEY (`comment_id_user`)
    REFERENCES `thund`.`user` (`id_user`))

DEFAULT CHARACTER SET = utf8 
DEFAULT COLLATE utf8_general_ci;


CREATE TABLE `thund`.`tutorial` (
  `id_tutorial` INT(11) NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(1000) NOT NULL,
  `archive` VARCHAR(200) NOT NULL,
  `tutorial_id_user` INT(11) NOT NULL,
  `status` CHAR(1) NOT NULL,
  PRIMARY KEY (`id_tutorial`),
  INDEX `tutorial_id_user_idx` (`tutorial_id_user` ASC),
  CONSTRAINT `tutorial_id_user`
    FOREIGN KEY (`tutorial_id_user`)
    REFERENCES `thund`.`user` (`id_user`))

DEFAULT CHARACTER SET = utf8 
DEFAULT COLLATE utf8_general_ci;



CREATE TABLE `thund`.`denouncement` (
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
    REFERENCES `thund`.`user` (`id_user`),
  CONSTRAINT `fk_denouncement_1`
    FOREIGN KEY (`denouncement_id_post`)
    REFERENCES `thund`.`post` (`id_post`),
  CONSTRAINT `fk_denouncement_2`
    FOREIGN KEY (`denouncement_id_comment`)
    REFERENCES `thund`.`comment` (`id_comment`),
  CONSTRAINT `fk_denouncement_3`
    FOREIGN KEY (`denouncement_id_tutorial`)
    REFERENCES `thund`.`tutorial` (`id_tutorial`))

DEFAULT CHARACTER SET = utf8 
DEFAULT COLLATE utf8_general_ci;



CREATE TABLE `thund`.`follow` (
  `id_follow` INT(11) NOT NULL AUTO_INCREMENT,
  `follow_user` INT(11) NOT NULL,
  `followed_user` INT(11) NOT NULL,
  PRIMARY KEY (`id_follow`),
  INDEX `followed_user_idx` (`followed_user` ASC),
  INDEX `follow_user_idx` (`follow_user` ASC),
  CONSTRAINT `followed_user`
    FOREIGN KEY (`followed_user`)
    REFERENCES `thund`.`user` (`id_user`),
  CONSTRAINT `follow_user`
    FOREIGN KEY (`follow_user`)
    REFERENCES `thund`.`user` (`id_user`))

DEFAULT CHARACTER SET = utf8 
DEFAULT COLLATE utf8_general_ci;



CREATE TABLE `thund`.`valuation` (
  `id_valuation` INT(20) NOT NULL AUTO_INCREMENT,
  `value` INT(1) NOT NULL,
  `valuation_id_comment` INT(11) NOT NULL,
  PRIMARY KEY (`id_valuation`),
  INDEX `valuation_id_comment_idx` (`valuation_id_comment` ASC),
  CONSTRAINT `valuation_id_comment`
    FOREIGN KEY (`valuation_id_comment`)
    REFERENCES `thund`.`comment` (`id_comment`))

DEFAULT CHARACTER SET = utf8 
DEFAULT COLLATE utf8_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;




CREATE TABLE `category_post` (
  `idcategory_post` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`idcategory_post`)
) DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;
