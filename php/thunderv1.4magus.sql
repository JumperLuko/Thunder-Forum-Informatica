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
CREATE SCHEMA IF NOT EXISTS `thunder` DEFAULT CHARACTER SET latin1 ;
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
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `thunder`.`category_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `thunder`.`category_user` ;

CREATE TABLE IF NOT EXISTS `thunder`.`category_user` (
  `idcategory_user` INT(11) NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`idcategory_user`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


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
DEFAULT CHARACTER SET = latin1;


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
DEFAULT CHARACTER SET = latin1;


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
DEFAULT CHARACTER SET = latin1;


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
DEFAULT CHARACTER SET = latin1;


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
DEFAULT CHARACTER SET = latin1;


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
DEFAULT CHARACTER SET = latin1;


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
DEFAULT CHARACTER SET = latin1;


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
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
