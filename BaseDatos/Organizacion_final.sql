-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema OrganizacionTp
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema OrganizacionTp
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `OrganizacionTp` ;
USE `OrganizacionTp` ;

-- -----------------------------------------------------
-- Table `OrganizacionTp`.`ciudad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OrganizacionTp`.`ciudad` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ciudad` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OrganizacionTp`.`genero`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OrganizacionTp`.`genero` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `genero` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OrganizacionTp`.`lineaProducto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OrganizacionTp`.`lineaProducto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `linea_producto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OrganizacionTp`.`sucursal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OrganizacionTp`.`sucursal` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sucursal` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OrganizacionTp`.`tipoCliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OrganizacionTp`.`tipoCliente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo_cliente` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OrganizacionTp`.`tipoPago`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OrganizacionTp`.`tipoPago` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo_pago` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OrganizacionTp`.`ventas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OrganizacionTp`.`ventas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nro_factura` VARCHAR(45) NOT NULL,
  `sucursal_id` INT NOT NULL,
  `ciudad_id` INT NOT NULL,
  `tipoCliente_id` INT NOT NULL,
  `genero_id` INT NOT NULL,
  `lineaProducto_id` INT NOT NULL,
  `precio_unitario` DECIMAL(10,2) NOT NULL,
  `cantidad` INT NOT NULL,
  `impuesto_5` DECIMAL(10,2) NOT NULL,
  `total` DECIMAL(10,2) NOT NULL,
  `fecha` DATE NOT NULL,
  `tiempo` TIME NOT NULL,
  `tipoPago_id` INT NOT NULL,
  `cogs` DECIMAL(10,2) NOT NULL,
  `por_margen_bruto` DECIMAL(10,2) NOT NULL,
  `ingreso_burto` DECIMAL(10,2) NOT NULL,
  `clasificacion` INT NOT NULL,
  PRIMARY KEY (`id`, `nro_factura`),
  INDEX `fk_ventas_sucursal_idx` (`sucursal_id` ASC) VISIBLE,
  INDEX `fk_ventas_ciudad1_idx` (`ciudad_id` ASC) VISIBLE,
  INDEX `fk_ventas_tipoCliente1_idx` (`tipoCliente_id` ASC) VISIBLE,
  INDEX `fk_ventas_genero1_idx` (`genero_id` ASC) VISIBLE,
  INDEX `fk_ventas_lineaProducto1_idx` (`lineaProducto_id` ASC) VISIBLE,
  INDEX `fk_ventas_tipoPago1_idx` (`tipoPago_id` ASC) VISIBLE,
  CONSTRAINT `fk_ventas_sucursal`
    FOREIGN KEY (`sucursal_id`)
    REFERENCES `OrganizacionTp`.`sucursal` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ventas_ciudad1`
    FOREIGN KEY (`ciudad_id`)
    REFERENCES `OrganizacionTp`.`ciudad` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ventas_tipoCliente1`
    FOREIGN KEY (`tipoCliente_id`)
    REFERENCES `OrganizacionTp`.`tipoCliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ventas_genero1`
    FOREIGN KEY (`genero_id`)
    REFERENCES `OrganizacionTp`.`genero` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ventas_lineaProducto1`
    FOREIGN KEY (`lineaProducto_id`)
    REFERENCES `OrganizacionTp`.`lineaProducto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ventas_tipoPago1`
    FOREIGN KEY (`tipoPago_id`)
    REFERENCES `OrganizacionTp`.`tipoPago` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OrganizacionTp`.`tabla`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OrganizacionTp`.`tabla` (
  `fecha` DATETIME NULL,
  `hora` TIME NULL)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
