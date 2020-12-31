SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema thund
-- -----------------------------------------------------
-->DROP SCHEMA IF EXISTS `thund` ;
-->CREATE SCHEMA IF NOT EXISTS `thund` DEFAULT CHARACTER SET latin1 ;
-->USE `thund` ;

-- -----------------------------------------------------
-- Table `thund`.`category_post`
-- -----------------------------------------------------
-->DROP TABLE IF EXISTS `thund`.`category_post` ;

CREATE TABLE IF NOT EXISTS `thund`.`category_post` (
  `idcategory_post` INT(11) NOT NULL,
  `category` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idcategory_post`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `thund`.`category_user`
-- -----------------------------------------------------
-->DROP TABLE IF EXISTS `thund`.`category_user` ;

CREATE TABLE IF NOT EXISTS `thund`.`category_user` (
  `idcategory_user` INT(11) NOT NULL,
  `type` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`idcategory_user`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `thund`.`class_user`
-- -----------------------------------------------------
-->DROP TABLE IF EXISTS `thund`.`class_user` ;

CREATE TABLE IF NOT EXISTS `thund`.`class_user` (
  `id_class_user` INT(11) NOT NULL,
  `class` VARCHAR(20) NOT NULL,
  `level` INT(3) NOT NULL,
  `score` INT(6) NOT NULL,
  PRIMARY KEY (`id_class_user`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `thund`.`user`
-- -----------------------------------------------------
-->DROP TABLE IF EXISTS `thund`.`user` ;

CREATE TABLE IF NOT EXISTS `thund`.`user` (
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
    REFERENCES `thund`.`class_user` (`id_class_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_category`
    FOREIGN KEY (`user_id_category_user`)
    REFERENCES `thund`.`category_user` (`idcategory_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `thund`.`post`
-- -----------------------------------------------------
-->DROP TABLE IF EXISTS `thund`.`post` ;

CREATE TABLE IF NOT EXISTS `thund`.`post` (
  `id_post` INT(11) NOT NULL,
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
    REFERENCES `thund`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_post_1`
    FOREIGN KEY (`post_id_category_post`)
    REFERENCES `thund`.`category_post` (`idcategory_post`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `thund`.`comment`
-- -----------------------------------------------------
-->DROP TABLE IF EXISTS `thund`.`comment` ;

CREATE TABLE IF NOT EXISTS `thund`.`comment` (
  `id_comment` INT(11) NOT NULL,
  `content` VARCHAR(2000) NOT NULL,
  `status` CHAR(1) NOT NULL,
  `comment_id_user` INT(11) NOT NULL,
  `comment_id_post` INT(11) NOT NULL,
  PRIMARY KEY (`id_comment`),
  INDEX `fk_comment_1_idx` (`comment_id_user` ASC),
  INDEX `fk_comment_2_idx` (`comment_id_post` ASC),
  CONSTRAINT `fk_comment_2`
    FOREIGN KEY (`comment_id_post`)
    REFERENCES `thund`.`post` (`id_post`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comment_1`
    FOREIGN KEY (`comment_id_user`)
    REFERENCES `thund`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `thund`.`tutorial`
-- -----------------------------------------------------
-->DROP TABLE IF EXISTS `thund`.`tutorial` ;

CREATE TABLE IF NOT EXISTS `thund`.`tutorial` (
  `id_tutorial` INT(11) NOT NULL,
  `description` VARCHAR(1000) NOT NULL,
  `archive` VARCHAR(200) NOT NULL,
  `tutorial_id_user` INT(11) NOT NULL,
  `status` CHAR(1) NOT NULL,
  PRIMARY KEY (`id_tutorial`),
  INDEX `tutorial_id_user_idx` (`tutorial_id_user` ASC),
  CONSTRAINT `tutorial_id_user`
    FOREIGN KEY (`tutorial_id_user`)
    REFERENCES `thund`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `thund`.`denouncement`
-- -----------------------------------------------------
-->DROP TABLE IF EXISTS `thund`.`denouncement` ;

CREATE TABLE IF NOT EXISTS `thund`.`denouncement` (
  `id_denouncement` INT(11) NOT NULL,
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
    REFERENCES `thund`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_denouncement_1`
    FOREIGN KEY (`denouncement_id_post`)
    REFERENCES `thund`.`post` (`id_post`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_denouncement_2`
    FOREIGN KEY (`denouncement_id_comment`)
    REFERENCES `thund`.`comment` (`id_comment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_denouncement_3`
    FOREIGN KEY (`denouncement_id_tutorial`)
    REFERENCES `thund`.`tutorial` (`id_tutorial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `thund`.`follow`
-- -----------------------------------------------------
-->DROP TABLE IF EXISTS `thund`.`follow` ;

CREATE TABLE IF NOT EXISTS `thund`.`follow` (
  `id_follow` INT(11) NOT NULL,
  `follow_user` INT(11) NOT NULL,
  `followed_user` INT(11) NOT NULL,
  PRIMARY KEY (`id_follow`),
  INDEX `followed_user_idx` (`followed_user` ASC),
  INDEX `follow_user_idx` (`follow_user` ASC),
  CONSTRAINT `followed_user`
    FOREIGN KEY (`followed_user`)
    REFERENCES `thund`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `follow_user`
    FOREIGN KEY (`follow_user`)
    REFERENCES `thund`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `thund`.`valuation`
-- -----------------------------------------------------
-->DROP TABLE IF EXISTS `thund`.`valuation` ;

CREATE TABLE IF NOT EXISTS `thund`.`valuation` (
  `id_valuation` INT(20) NOT NULL,
  `value` INT(1) NOT NULL,
  `valuation_id_comment` INT(11) NOT NULL,
  PRIMARY KEY (`id_valuation`),
  INDEX `valuation_id_comment_idx` (`valuation_id_comment` ASC),
  CONSTRAINT `valuation_id_comment`
    FOREIGN KEY (`valuation_id_comment`)
    REFERENCES `thund`.`comment` (`id_comment`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
