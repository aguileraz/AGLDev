SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

USE `aglbase` ;

-- -----------------------------------------------------
-- Table `aglbase`.`aglbase_users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aglbase`.`aglbase_users` ;

CREATE TABLE IF NOT EXISTS `aglbase`.`aglbase_users` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `salt` VARCHAR(255) NOT NULL,
    `active` TINYINT(1) NULL,
    `activation_key` VARCHAR(255) NOT NULL,
    `updated_at` DATETIME NOT NULL,
    `created_at` DATETIME NOT NULL,
    PRIMARY KEY (`id`)
)  ENGINE=InnoDB;

CREATE UNIQUE INDEX `id_UNIQUE` ON `aglbase`.`aglbase_users` (`id` ASC);


-- -----------------------------------------------------
-- Table `aglbase`.`aglbase_roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aglbase`.`aglbase_roles` ;

CREATE TABLE IF NOT EXISTS `aglbase`.`aglbase_roles` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `parent_id` INT NULL,
    `nome` VARCHAR(45) NOT NULL,
    `is_admin` TINYINT(1) NULL,
    `created_at` DATETIME NOT NULL,
    `updated_at` DATETIME NOT NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `fk_aglbase_roles_aglbase_roles` FOREIGN KEY (`parent_id`)
        REFERENCES `aglbase`.`aglbase_roles` (`id`)
        ON DELETE NO ACTION ON UPDATE NO ACTION
)  ENGINE=InnoDB;

CREATE INDEX `fk_aglbase_roles_aglbase_roles_idx` ON `aglbase`.`aglbase_roles` (`parent_id` ASC);


-- -----------------------------------------------------
-- Table `aglbase`.`aglbase_resources`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aglbase`.`aglbase_resources` ;

CREATE TABLE IF NOT EXISTS `aglbase`.`aglbase_resources` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(45) NOT NULL,
    `created_at` DATETIME NOT NULL,
    `updated_at` DATETIME NOT NULL,
    PRIMARY KEY (`id`)
)  ENGINE=InnoDB;


-- -----------------------------------------------------
-- Table `aglbase`.`aglbase_privileges`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aglbase`.`aglbase_privileges` ;

CREATE TABLE IF NOT EXISTS `aglbase`.`aglbase_privileges` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `role_id` INT NOT NULL,
    `resource_id` INT NOT NULL,
    `nome` VARCHAR(45) NOT NULL COMMENT '			',
    `created_at` DATETIME NOT NULL,
    `updated_at` DATETIME NOT NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `fk_aglbase_privileges_aglbase_roles1` FOREIGN KEY (`role_id`)
        REFERENCES `aglbase`.`aglbase_roles` (`id`)
        ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `fk_aglbase_privileges_aglbase_resouces1` FOREIGN KEY (`resource_id`)
        REFERENCES `aglbase`.`aglbase_resources` (`id`)
        ON DELETE NO ACTION ON UPDATE NO ACTION
)  ENGINE=InnoDB;

CREATE INDEX `fk_aglbase_privileges_aglbase_roles1_idx` ON `aglbase`.`aglbase_privileges` (`role_id` ASC);

CREATE INDEX `fk_aglbase_privileges_aglbase_resouces1_idx` ON `aglbase`.`aglbase_privileges` (`resource_id` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;