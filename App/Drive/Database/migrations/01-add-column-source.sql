-- MySQL Workbench Synchronization
-- Generated: 2017-03-31 16:37
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: nerine

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

ALTER TABLE `melisaDrive`.`driUnits` 
ADD COLUMN `source` VARCHAR(255) NOT NULL AFTER `totalFiles`;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
