-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bdVentas2023
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `bdVentas2023` ;

-- -----------------------------------------------------
-- Schema bdVentas2023
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bdVentas2023` DEFAULT CHARACTER SET utf8 ;
USE `bdVentas2023` ;

-- -----------------------------------------------------
-- Table `bdVentas2023`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdVentas2023`.`clientes` (
  `idclientes` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(60) NULL,
  `ruc` VARCHAR(11) NULL,
  `direccion` VARCHAR(80) NULL,
  PRIMARY KEY (`idclientes`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdVentas2023`.`empleados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdVentas2023`.`empleados` (
  `idempleados` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(50) NULL,
  `apellidos` VARCHAR(50) NULL,
  `fecha_nacimiento` DATE NULL,
  `dni` VARCHAR(9) NULL,
  `fecha_alta` DATE NULL,
  `tipo` INT NULL,
  `login` VARCHAR(50) NULL,
  `password` VARCHAR(50) NULL,
  PRIMARY KEY (`idempleados`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdVentas2023`.`marcas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdVentas2023`.`marcas` (
  `idmarcas` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idmarcas`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdVentas2023`.`productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdVentas2023`.`productos` (
  `idproductos` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) NULL,
  `descripcion` VARCHAR(255) NULL,
  `precio_unitario` DECIMAL(19,7) NULL,
  `stock` INT NULL,
  `imagen` VARCHAR(45) NULL,
  `idmarcas` INT NOT NULL,
  PRIMARY KEY (`idproductos`),
  INDEX `fk_productos_marcas1_idx` (`idmarcas` ASC) ,
  CONSTRAINT `fk_productos_marcas1`
    FOREIGN KEY (`idmarcas`)
    REFERENCES `bdVentas2023`.`marcas` (`idmarcas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdVentas2023`.`empresas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdVentas2023`.`empresas` (
  `idempresas` INT NOT NULL,
  `nombre` VARCHAR(50) NULL,
  `ruc` VARCHAR(11) NULL,
  `direccion` VARCHAR(80) NULL,
  PRIMARY KEY (`idempresas`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdVentas2023`.`facturas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdVentas2023`.`facturas` (
  `idfacturas` INT NOT NULL AUTO_INCREMENT,
  `numero` VARCHAR(20) NULL,
  `fecha` DATETIME NULL,
  `subtotal` DECIMAL(19,7) NULL,
  `igv` DECIMAL(19,7) NULL,
  `total` DECIMAL(19,7) NULL,
  `idclientes` INT NOT NULL,
  `idempleados` INT NOT NULL,
  `idempresas` INT NOT NULL,
  PRIMARY KEY (`idfacturas`),
  INDEX `fk_facturas_clientes_idx` (`idclientes` ASC) ,
  INDEX `fk_facturas_empleados1_idx` (`idempleados` ASC) ,
  INDEX `fk_facturas_empresas1_idx` (`idempresas` ASC) ,
  CONSTRAINT `fk_facturas_clientes`
    FOREIGN KEY (`idclientes`)
    REFERENCES `bdVentas2023`.`clientes` (`idclientes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_facturas_empleados1`
    FOREIGN KEY (`idempleados`)
    REFERENCES `bdVentas2023`.`empleados` (`idempleados`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_facturas_empresas1`
    FOREIGN KEY (`idempresas`)
    REFERENCES `bdVentas2023`.`empresas` (`idempresas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdVentas2023`.`detalles_boletas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdVentas2023`.`detalles_boletas` (
  `iddetalles_boletas` INT NOT NULL,
  `cantidad` INT NULL,
  `precio_venta` DECIMAL(19,7) NULL,
  `descripcion` VARCHAR(800) NULL,
  `idfacturas` INT NOT NULL,
  `idproductos` INT NOT NULL,
  PRIMARY KEY (`iddetalles_boletas`),
  INDEX `fk_detalles_boletas_facturas1_idx` (`idfacturas` ASC) ,
  INDEX `fk_detalles_boletas_productos1_idx` (`idproductos` ASC) ,
  CONSTRAINT `fk_detalles_boletas_facturas1`
    FOREIGN KEY (`idfacturas`)
    REFERENCES `bdVentas2023`.`facturas` (`idfacturas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalles_boletas_productos1`
    FOREIGN KEY (`idproductos`)
    REFERENCES `bdVentas2023`.`productos` (`idproductos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `bdVentas2023`.`empleados`
-- -----------------------------------------------------id 
START TRANSACTION;
USE `bdVentas2023`;
INSERT INTO `bdVentas2023`.`empleados` (`idempleados`, `nombres`, `apellidos`, `fecha_nacimiento`, `dni`, `fecha_alta`, `tipo`, `login`, `password`) VALUES (1, 'Walter', 'Coayla', '30/05/1973', '0124578', '01/05/2023', NULL, 'pase@hotmail.com', '12345');

COMMIT;


-- -----------------------------------------------------
-- Data for table `bdVentas2023`.`empresas`
-- -----------------------------------------------------
START TRANSACTION;
USE `bdVentas2023`;
INSERT INTO `bdVentas2023`.`empresas` (`idempresas`, `nombre`, `ruc`, `direccion`) VALUES (1, 'ABC IMPORTS S.A', '2012457852', 'AV. BALTA S/N');

COMMIT;

