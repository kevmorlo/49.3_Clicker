-- MySQL Script generated by MySQL Workbench
-- Wed Oct 11 08:39:13 2023
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
  `mdp` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `49.3_clicker`.`parties`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `49.3_clicker`.`parties` (
  `id` INT(11) NOT NULL,
  `nom` VARCHAR(30) NOT NULL,
  `score` INT(11) NOT NULL,
  `argent` INT(11) NOT NULL,
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


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
