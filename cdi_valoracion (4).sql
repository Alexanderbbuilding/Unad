-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2015 a las 16:42:27
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cdi_valoracion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
  `idCargo` int(11) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idCargo`, `Descripcion`) VALUES
(1, 'Directora'),
(2, 'Psicologo'),
(75, 'profesora'),
(76, ''),
(77, 'independiente'),
(78, 'nivel 3'),
(79, 'nivel 3'),
(80, 'ejemplo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `idFuncionario` int(11) NOT NULL,
  `Usuario` varchar(50) DEFAULT NULL,
  `Clave` varchar(255) DEFAULT NULL,
  `Fecha_Registro` date DEFAULT NULL,
  `idPersona` int(11) NOT NULL,
  `idCargo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `funcionario`
--

INSERT INTO `funcionario` (`idFuncionario`, `Usuario`, `Clave`, `Fecha_Registro`, `idPersona`, `idCargo`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2015-11-10', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE IF NOT EXISTS `institucion` (
  `idInstitucion` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Ciudad` varchar(100) DEFAULT NULL,
  `Telefono` varchar(50) DEFAULT NULL,
  `Nit` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`idInstitucion`, `Nombre`, `Direccion`, `Ciudad`, `Telefono`, `Nit`) VALUES
(4, 'CDI Morada del sol', 'xxxxxxxxxxxx', 'sogamoso', '3114555555', '8710007711727');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE IF NOT EXISTS `niveles` (
  `idNiveles` int(11) NOT NULL,
  `Descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`idNiveles`, `Descripcion`) VALUES
(1, 'Salacuna'),
(2, 'Caminadores'),
(3, 'Parbulos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `idPersona` int(11) NOT NULL,
  `Nombres` varchar(100) DEFAULT NULL,
  `Apellidos` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `genero` varchar(2) DEFAULT NULL,
  `peso_nacimiento` double DEFAULT NULL,
  `talla` double DEFAULT NULL,
  `idTipo_Documento` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idPersona`, `Nombres`, `Apellidos`, `fecha_nacimiento`, `genero`, `peso_nacimiento`, `talla`, `idTipo_Documento`) VALUES
(1, 'alexander', 'gomez', '2015-05-08', 'M', 89, 98, 1),
(2, 'camila', 'martinez', '2014-05-07', 'F', 3.1, 4.2, 2),
(3, 'Patricia', 'gomez', '2015-05-08', 'F', 6, 89, 2),
(4, 'Andres', 'Lopez', '2011-04-07', 'M', 2000, 45, 2);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `reporte_f`
--
CREATE TABLE IF NOT EXISTS `reporte_f` (
`Nombre` varchar(201)
,`Fecha_Ingreso` date
,`Peso_Actual` double
,`Talla_Actual` double
,`Observaciones` varchar(255)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `reporte_m`
--
CREATE TABLE IF NOT EXISTS `reporte_m` (
`Nombre` varchar(201)
,`Fecha_Ingreso` date
,`Peso_Actual` double
,`Talla_Actual` double
,`Observaciones` varchar(255)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE IF NOT EXISTS `tipo_documento` (
  `idTipo_Documento` int(11) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`idTipo_Documento`, `Descripcion`) VALUES
(1, 'CC'),
(2, 'Registro de Nacimiento'),
(3, 'Tarjeta de Identidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_resultado`
--

CREATE TABLE IF NOT EXISTS `tipo_resultado` (
  `idTipo_Resultado` int(11) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_resultado`
--

INSERT INTO `tipo_resultado` (`idTipo_Resultado`, `Descripcion`) VALUES
(1, 'Correcto'),
(2, 'resultado de preuba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE IF NOT EXISTS `valoracion` (
  `idValoracion` int(11) NOT NULL,
  `Fecha_Ingreso` date DEFAULT NULL,
  `Peso_Actual` double DEFAULT NULL,
  `Talla_Actual` double DEFAULT NULL,
  `Observaciones` varchar(255) DEFAULT NULL,
  `Fecha_Registro` date DEFAULT NULL,
  `Numero_Toma` varchar(50) DEFAULT NULL,
  `idInstitucion` int(11) NOT NULL,
  `idTipo_Resultado` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL,
  `idFuncionario` int(11) NOT NULL,
  `idNiveles` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`idValoracion`, `Fecha_Ingreso`, `Peso_Actual`, `Talla_Actual`, `Observaciones`, `Fecha_Registro`, `Numero_Toma`, `idInstitucion`, `idTipo_Resultado`, `idPersona`, `idFuncionario`, `idNiveles`) VALUES
(3, '2015-11-10', 15, 15, 'niguna', '2015-11-10', '1', 4, 1, 2, 1, 1),
(4, '2015-11-11', 65, 45, 'Ninguna', '2015-11-11', '2', 4, 1, 3, 1, 3),
(6, '2015-12-02', 45, 60, 'Normal', '2015-12-02', '1', 4, 2, 4, 1, 2);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vvaloracion`
--
CREATE TABLE IF NOT EXISTS `vvaloracion` (
`idValoracion` int(11)
,`Numero_toma` varchar(50)
,`nin` varchar(201)
,`Fecha_Registro` date
,`Peso_Actual` double
,`Talla_Actual` double
,`Nombre` varchar(255)
,`tipo_res` varchar(45)
,`funcionario` varchar(201)
,`nivel` varchar(255)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `reporte_f`
--
DROP TABLE IF EXISTS `reporte_f`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reporte_f` AS select distinct concat(`p`.`Nombres`,' ',`p`.`Apellidos`) AS `Nombre`,`va`.`Fecha_Ingreso` AS `Fecha_Ingreso`,`va`.`Peso_Actual` AS `Peso_Actual`,`va`.`Talla_Actual` AS `Talla_Actual`,`va`.`Observaciones` AS `Observaciones` from (`valoracion` `va` join `persona` `p`) where ((`va`.`idPersona` = `p`.`idPersona`) and (`p`.`genero` = 'f'));

-- --------------------------------------------------------

--
-- Estructura para la vista `reporte_m`
--
DROP TABLE IF EXISTS `reporte_m`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reporte_m` AS select distinct concat(`p`.`Nombres`,' ',`p`.`Apellidos`) AS `Nombre`,`va`.`Fecha_Ingreso` AS `Fecha_Ingreso`,`va`.`Peso_Actual` AS `Peso_Actual`,`va`.`Talla_Actual` AS `Talla_Actual`,`va`.`Observaciones` AS `Observaciones` from (`valoracion` `va` join `persona` `p`) where ((`va`.`idPersona` = `p`.`idPersona`) and (`p`.`genero` = 'M'));

-- --------------------------------------------------------

--
-- Estructura para la vista `vvaloracion`
--
DROP TABLE IF EXISTS `vvaloracion`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vvaloracion` AS select distinct `v`.`idValoracion` AS `idValoracion`,`v`.`Numero_Toma` AS `Numero_toma`,concat(`p`.`Nombres`,' ',`p`.`Apellidos`) AS `nin`,`v`.`Fecha_Registro` AS `Fecha_Registro`,`v`.`Peso_Actual` AS `Peso_Actual`,`v`.`Talla_Actual` AS `Talla_Actual`,`i`.`Nombre` AS `Nombre`,`tr`.`Descripcion` AS `tipo_res`,(select concat(`p`.`Nombres`,' ',`p`.`Apellidos`) from (`persona` `p` join `funcionario` `f`) where ((`f`.`idPersona` = `p`.`idPersona`) and (`v`.`idFuncionario` = `f`.`idFuncionario`))) AS `funcionario`,`n`.`Descripcion` AS `nivel` from ((((`valoracion` `v` join `persona` `p`) join `tipo_resultado` `tr`) join `niveles` `n`) join `institucion` `i`) where ((`v`.`idPersona` = `p`.`idPersona`) and (`v`.`idNiveles` = `n`.`idNiveles`) and (`v`.`idTipo_Resultado` = `tr`.`idTipo_Resultado`) and (`v`.`idInstitucion` = `i`.`idInstitucion`));

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idCargo`);

--
-- Indices de la tabla `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idFuncionario`,`idPersona`,`idCargo`),
  ADD KEY `fk_Funcionario_Persona1_idx` (`idPersona`),
  ADD KEY `fk_Funcionario_Cargo1_idx` (`idCargo`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`idInstitucion`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`idNiveles`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idPersona`,`idTipo_Documento`),
  ADD KEY `fk_Persona_Tipo_Documento_idx` (`idTipo_Documento`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`idTipo_Documento`);

--
-- Indices de la tabla `tipo_resultado`
--
ALTER TABLE `tipo_resultado`
  ADD PRIMARY KEY (`idTipo_Resultado`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`idValoracion`,`idInstitucion`,`idTipo_Resultado`,`idPersona`,`idFuncionario`),
  ADD KEY `fk_Valoracion_Institucion1_idx` (`idInstitucion`),
  ADD KEY `fk_Valoracion_Tipo_Resultado1_idx` (`idTipo_Resultado`),
  ADD KEY `fk_Valoracion_Persona1_idx` (`idPersona`,`idFuncionario`),
  ADD KEY `idFuncionario` (`idFuncionario`),
  ADD KEY `idNiveles` (`idNiveles`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT de la tabla `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `institucion`
--
ALTER TABLE `institucion`
  MODIFY `idInstitucion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `idNiveles` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `idTipo_Documento` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipo_resultado`
--
ALTER TABLE `tipo_resultado`
  MODIFY `idTipo_Resultado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  MODIFY `idValoracion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
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
  ADD CONSTRAINT `fk_Valoracion_Persona1` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Valoracion_Tipo_Resultado1` FOREIGN KEY (`idTipo_Resultado`) REFERENCES `tipo_resultado` (`idTipo_Resultado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `valoracion_ibfk_1` FOREIGN KEY (`idFuncionario`) REFERENCES `funcionario` (`idFuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `valoracion_ibfk_2` FOREIGN KEY (`idNiveles`) REFERENCES `niveles` (`idNiveles`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
