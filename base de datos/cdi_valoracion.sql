-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 16-11-2015 a las 15:17:15
-- Versión del servidor: 5.0.45
-- Versión de PHP: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `cdi_valoracion`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cargo`
-- 

CREATE TABLE `cargo` (
  `idCargo` int(11) NOT NULL auto_increment,
  `Descripcion` varchar(100) default NULL,
  PRIMARY KEY  (`idCargo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `cargo`
-- 

INSERT INTO `cargo` (`idCargo`, `Descripcion`) VALUES 
(1, 'qwertyuio');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `funcionario`
-- 

CREATE TABLE `funcionario` (
  `idFuncionario` int(11) NOT NULL auto_increment,
  `Usuario` varchar(50) default NULL,
  `Clave` varchar(255) default NULL,
  `Fecha_Registro` date default NULL,
  `idPersona` int(11) NOT NULL,
  `idCargo` int(11) NOT NULL,
  PRIMARY KEY  (`idFuncionario`,`idPersona`,`idCargo`),
  KEY `fk_Funcionario_Persona1_idx` (`idPersona`),
  KEY `fk_Funcionario_Cargo1_idx` (`idCargo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `funcionario`
-- 

INSERT INTO `funcionario` (`idFuncionario`, `Usuario`, `Clave`, `Fecha_Registro`, `idPersona`, `idCargo`) VALUES 
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2015-11-10', 1, 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `institucion`
-- 

CREATE TABLE `institucion` (
  `idInstitucion` int(11) NOT NULL auto_increment,
  `Nombre` varchar(255) default NULL,
  `Direccion` varchar(255) default NULL,
  `Ciudad` varchar(100) default NULL,
  `Telefono` varchar(50) default NULL,
  `Nit` varchar(50) default NULL,
  PRIMARY KEY  (`idInstitucion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `institucion`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `persona`
-- 

CREATE TABLE `persona` (
  `idPersona` int(11) NOT NULL auto_increment,
  `Nombres` varchar(100) default NULL,
  `Apellidos` varchar(100) default NULL,
  `fecha_nacimiento` date default NULL,
  `genero` varchar(2) default NULL,
  `peso_nacimiento` double default NULL,
  `talla` double default NULL,
  `idTipo_Documento` int(11) NOT NULL,
  PRIMARY KEY  (`idPersona`,`idTipo_Documento`),
  KEY `fk_Persona_Tipo_Documento_idx` (`idTipo_Documento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `persona`
-- 

INSERT INTO `persona` (`idPersona`, `Nombres`, `Apellidos`, `fecha_nacimiento`, `genero`, `peso_nacimiento`, `talla`, `idTipo_Documento`) VALUES 
(1, 'sasasasa', 'alal', '2015-11-04', 'm', 1.6, 57.5, 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tipo_documento`
-- 

CREATE TABLE `tipo_documento` (
  `idTipo_Documento` int(11) NOT NULL auto_increment,
  `Descripcion` varchar(100) default NULL,
  PRIMARY KEY  (`idTipo_Documento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `tipo_documento`
-- 

INSERT INTO `tipo_documento` (`idTipo_Documento`, `Descripcion`) VALUES 
(1, 'cc');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tipo_resultado`
-- 

CREATE TABLE `tipo_resultado` (
  `idTipo_Resultado` int(11) NOT NULL auto_increment,
  `Descripcion` varchar(45) default NULL,
  PRIMARY KEY  (`idTipo_Resultado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `tipo_resultado`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `valoracion`
-- 

CREATE TABLE `valoracion` (
  `idValoracion` int(11) NOT NULL auto_increment,
  `Fecha_Ingreso` date default NULL,
  `Peso_Actual` double default NULL,
  `Talla_Actual` double default NULL,
  `Observaciones` varchar(255) default NULL,
  `Fecha_Registro` date default NULL,
  `Numero_Toma` varchar(50) default NULL,
  `idInstitucion` int(11) NOT NULL,
  `idTipo_Resultado` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL,
  `idTipo_Documento` int(11) NOT NULL,
  `idFuncionario` int(11) NOT NULL,
  PRIMARY KEY  (`idValoracion`,`idInstitucion`,`idTipo_Resultado`,`idPersona`,`idTipo_Documento`,`idFuncionario`),
  KEY `fk_Valoracion_Institucion1_idx` (`idInstitucion`),
  KEY `fk_Valoracion_Tipo_Resultado1_idx` (`idTipo_Resultado`),
  KEY `fk_Valoracion_Persona1_idx` (`idPersona`,`idTipo_Documento`,`idFuncionario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `valoracion`
-- 


-- 
-- Filtros para las tablas descargadas (dump)
-- 

-- 
-- Filtros para la tabla `funcionario`
-- 
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_Funcionario_Cargo1` FOREIGN KEY (`idCargo`) REFERENCES `cargo` (`idCargo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Funcionario_Persona1` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Filtros para la tabla `persona`
-- 
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_Persona_Tipo_Documento` FOREIGN KEY (`idTipo_Documento`) REFERENCES `tipo_documento` (`idTipo_Documento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Filtros para la tabla `valoracion`
-- 
ALTER TABLE `valoracion`
  ADD CONSTRAINT `fk_Valoracion_Institucion1` FOREIGN KEY (`idInstitucion`) REFERENCES `institucion` (`idInstitucion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Valoracion_Persona1` FOREIGN KEY (`idPersona`, `idTipo_Documento`) REFERENCES `persona` (`idPersona`, `idTipo_Documento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Valoracion_Tipo_Resultado1` FOREIGN KEY (`idTipo_Resultado`) REFERENCES `tipo_resultado` (`idTipo_Resultado`) ON DELETE NO ACTION ON UPDATE NO ACTION;
