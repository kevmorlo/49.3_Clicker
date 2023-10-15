-- MySQL Script generated by MySQL Workbench
-- Thu Oct 12 23:37:22 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema 49.3_clicker
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `49.3_clicker` ;

-- -----------------------------------------------------
-- Schema 49.3_clicker
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `49.3_clicker` DEFAULT CHARACTER SET utf8 ;
USE `49.3_clicker` ;

-- -----------------------------------------------------
-- Table `49.3_clicker`.`utilisateurs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `49.3_clicker`.`utilisateurs` (
  `id` INT(11) NOT NULL,
  `nom` VARCHAR(30) NOT NULL,
  `email` VARCHAR(55) NULL,
  `mdp` VARCHAR(45) NOT NULL,
  `cree_a` TIMESTAMP(5) NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `maj` TIMESTAMP(5) NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `49.3_clicker`.`parties`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `49.3_clicker`.`parties` (
  `id` INT(11) NOT NULL,
  `score` INT(11) NULL,
  `argent` INT(11) NULL,
  `multiplicateurs` INT(2) NULL,
  `autoclickers` INT(2) NULL,
  `cree_a` TIMESTAMP(5) NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `maj` TIMESTAMP(5) NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `49.3_clicker`.`parties_utilisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `49.3_clicker`.`parties_utilisateur` (
  `utilisateurs_id` INT(11) NOT NULL,
  `parties_id` INT(11) NOT NULL,
  PRIMARY KEY (`utilisateurs_id`, `parties_id`),
  INDEX `fk_utilisateurs_has_parties_parties1_idx` (`parties_id` ASC) VISIBLE,
  INDEX `fk_utilisateurs_has_parties_utilisateurs_idx` (`utilisateurs_id` ASC) VISIBLE,
  CONSTRAINT `fk_utilisateurs_has_parties_utilisateurs`
    FOREIGN KEY (`utilisateurs_id`)
    REFERENCES `49.3_clicker`.`utilisateurs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_utilisateurs_has_parties_parties1`
    FOREIGN KEY (`parties_id`)
    REFERENCES `49.3_clicker`.`parties` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `49.3_clicker`.`bonus`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `49.3_clicker`.`bonus` (
  `id` INT(11) NOT NULL,
  `nom` VARCHAR(30) NOT NULL,
  `description` TEXT(1000) NOT NULL,
  `cree_a` TIMESTAMP(5) NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `maj` TIMESTAMP(5) NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `49.3_clicker`.`bonus_partie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `49.3_clicker`.`bonus_partie` (
  `parties_id` INT(11) NOT NULL,
  `bonus_id` INT(11) NOT NULL,
  PRIMARY KEY (`parties_id`, `bonus_id`),
  INDEX `fk_parties_has_bonus_bonus1_idx` (`bonus_id` ASC) VISIBLE,
  INDEX `fk_parties_has_bonus_parties1_idx` (`parties_id` ASC) VISIBLE,
  CONSTRAINT `fk_parties_has_bonus_parties1`
    FOREIGN KEY (`parties_id`)
    REFERENCES `49.3_clicker`.`parties` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_parties_has_bonus_bonus1`
    FOREIGN KEY (`bonus_id`)
    REFERENCES `49.3_clicker`.`bonus` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
