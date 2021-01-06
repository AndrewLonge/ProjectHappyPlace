SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';
​
-- -----------------------------------------------------
-- Schema happyplace
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `happyplace` ;
​
-- -----------------------------------------------------
-- Schema happyplace
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `happyplace` DEFAULT CHARACTER SET utf8 ;
USE `happyplace` ;
​
-- -----------------------------------------------------
-- Table `happyplace`.`places`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `happyplace`.`places` ;
​
CREATE TABLE IF NOT EXISTS `happyplace`.`places` (
  `id` INT UNSIGNED NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `latitude` VARCHAR(255) NULL,
  `longitude` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC))
ENGINE = InnoDB;
​
​
-- -----------------------------------------------------
-- Table `happyplace`.`markers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `happyplace`.`markers` ;
​
CREATE TABLE IF NOT EXISTS `happyplace`.`markers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `icon` VARCHAR(255) NULL,
  `color` VARCHAR(255) NULL DEFAULT '#FFFFFF',
  `description` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `icon_UNIQUE` (`icon` ASC))
ENGINE = InnoDB;
​
​
-- -----------------------------------------------------
-- Table `happyplace`.`apprentices`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `happyplace`.`apprentices` ;
​
CREATE TABLE IF NOT EXISTS `happyplace`.`apprentices` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `prename` VARCHAR(45) NULL,
  `lastname` VARCHAR(45) NULL,
  `place_id` INT UNSIGNED NOT NULL,
  `markers_id` INT NOT NULL,
  PRIMARY KEY (`id`, `place_id`, `markers_id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_apprentices_place_idx` (`place_id` ASC),
  INDEX `fk_apprentices_markers1_idx` (`markers_id` ASC),
  CONSTRAINT `fk_apprentices_place`
    FOREIGN KEY (`place_id`)
    REFERENCES `happyplace`.`places` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_apprentices_markers1`
    FOREIGN KEY (`markers_id`)
    REFERENCES `happyplace`.`markers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
​
​
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;