SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `CDI_VALORACION` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `CDI_VALORACION` ;

-- -----------------------------------------------------
-- Table `CDI_VALORACION`.`Cargo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CDI_VALORACION`.`Cargo` (
  `idCargo` INT NOT NULL AUTO_INCREMENT ,
  `Descripcion` VARCHAR(100) NULL ,
  PRIMARY KEY (`idCargo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CDI_VALORACION`.`Tipo_Documento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CDI_VALORACION`.`Tipo_Documento` (
  `idTipo_Documento` INT NOT NULL AUTO_INCREMENT ,
  `Descripcion` VARCHAR(100) NULL ,
  PRIMARY KEY (`idTipo_Documento`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CDI_VALORACION`.`Persona`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CDI_VALORACION`.`Persona` (
  `idPersona` INT NOT NULL AUTO_INCREMENT ,
  `Nombres` VARCHAR(100) NULL ,
  `Apellidos` VARCHAR(100) NULL ,
  `fecha_nacimiento` DATE NULL ,
  `genero` VARCHAR(2) NULL ,
  `peso_nacimiento` DOUBLE NULL ,
  `talla` DOUBLE NULL ,
  `idTipo_Documento` INT NOT NULL ,
  PRIMARY KEY (`idPersona`, `idTipo_Documento`) ,
  INDEX `fk_Persona_Tipo_Documento_idx` (`idTipo_Documento` ASC) ,
  CONSTRAINT `fk_Persona_Tipo_Documento`
    FOREIGN KEY (`idTipo_Documento` )
    REFERENCES `CDI_VALORACION`.`Tipo_Documento` (`idTipo_Documento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CDI_VALORACION`.`Funcionario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CDI_VALORACION`.`Funcionario` (
  `idFuncionario` INT NOT NULL AUTO_INCREMENT ,
  `Usuario` VARCHAR(50) NULL ,
  `Clave` VARCHAR(255) NULL ,
  `Fecha_Registro` DATE NULL ,
  `idPersona` INT NOT NULL ,
  `idCargo` INT NOT NULL ,
  PRIMARY KEY (`idFuncionario`, `idPersona`, `idCargo`) ,
  INDEX `fk_Funcionario_Persona1_idx` (`idPersona` ASC) ,
  INDEX `fk_Funcionario_Cargo1_idx` (`idCargo` ASC) ,
  CONSTRAINT `fk_Funcionario_Persona1`
    FOREIGN KEY (`idPersona` )
    REFERENCES `CDI_VALORACION`.`Persona` (`idPersona` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Funcionario_Cargo1`
    FOREIGN KEY (`idCargo` )
    REFERENCES `CDI_VALORACION`.`Cargo` (`idCargo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CDI_VALORACION`.`Tipo_Resultado`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CDI_VALORACION`.`Tipo_Resultado` (
  `idTipo_Resultado` INT NOT NULL AUTO_INCREMENT ,
  `Descripcion` VARCHAR(45) NULL ,
  PRIMARY KEY (`idTipo_Resultado`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CDI_VALORACION`.`Institucion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CDI_VALORACION`.`Institucion` (
  `idInstitucion` INT NOT NULL AUTO_INCREMENT ,
  `Nombre` VARCHAR(255) NULL ,
  `Direccion` VARCHAR(255) NULL ,
  `Ciudad` VARCHAR(100) NULL ,
  `Telefono` VARCHAR(50) NULL ,
  `Nit` VARCHAR(50) NULL ,
  PRIMARY KEY (`idInstitucion`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CDI_VALORACION`.`Valoracion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CDI_VALORACION`.`Valoracion` (
  `idValoracion` INT NOT NULL AUTO_INCREMENT ,
  `Fecha_Ingreso` DATE NULL ,
  `Peso_Actual` DOUBLE NULL ,
  `Talla_Actual` DOUBLE NULL ,
  `Observaciones` VARCHAR(255) NULL ,
  `Fecha_Registro` DATE NULL ,
  `Numero_Toma` VARCHAR(50) NULL ,
  `idInstitucion` INT NOT NULL ,
  `idTipo_Resultado` INT NOT NULL ,
  `idPersona` INT NOT NULL ,
  `idTipo_Documento` INT NOT NULL ,
  `idFuncionario` INT NOT NULL ,
  PRIMARY KEY (`idValoracion`, `idInstitucion`, `idTipo_Resultado`, `idPersona`, `idTipo_Documento`, `idFuncionario`) ,
  INDEX `fk_Valoracion_Institucion1_idx` (`idInstitucion` ASC) ,
  INDEX `fk_Valoracion_Tipo_Resultado1_idx` (`idTipo_Resultado` ASC) ,
  INDEX `fk_Valoracion_Persona1_idx` (`idPersona` ASC, `idTipo_Documento` ASC, `idFuncionario` ASC) ,
  CONSTRAINT `fk_Valoracion_Institucion1`
    FOREIGN KEY (`idInstitucion` )
    REFERENCES `CDI_VALORACION`.`Institucion` (`idInstitucion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Valoracion_Tipo_Resultado1`
    FOREIGN KEY (`idTipo_Resultado` )
    REFERENCES `CDI_VALORACION`.`Tipo_Resultado` (`idTipo_Resultado` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Valoracion_Persona1`
    FOREIGN KEY (`idPersona` , `idTipo_Documento` )
    REFERENCES `CDI_VALORACION`.`Persona` (`idPersona` , `idTipo_Documento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
