-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2016 a las 00:40:37
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carnetizacionso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE IF NOT EXISTS `docentes` (
  `id_docente` int(11) NOT NULL,
  `nombres_docente` varchar(100) DEFAULT NULL,
  `apellidos_docente` varchar(100) DEFAULT NULL,
  `naci_docente` date DEFAULT NULL,
  `sexo_docente` enum('masculinio','Femenino') DEFAULT NULL,
  `direccion` text,
  `nomb_docente` varchar(45) DEFAULT NULL,
  `hash_docente` varchar(255) DEFAULT NULL,
  `type_user` enum('docente','root') NOT NULL DEFAULT 'docente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id_docente`, `nombres_docente`, `apellidos_docente`, `naci_docente`, `sexo_docente`, `direccion`, `nomb_docente`, `hash_docente`, `type_user`) VALUES
(23781625, 'root', 'root', '2016-11-26', 'masculinio', ' ', 'root', '$2y$09$V9WuDBR.utyeFRjArdekauBUE.2wjt1P3F4yA840P4v6A/O6nFayy', 'root');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE IF NOT EXISTS `estudiante` (
  `id_estu` int(11) NOT NULL,
  `cedula_estu` int(11) DEFAULT NULL,
  `nombres_estu` varchar(50) DEFAULT NULL,
  `apellidos_estu` varchar(50) DEFAULT NULL,
  `nacimiento_estu` date DEFAULT NULL,
  `sexo_estu` enum('masculinio','Femenino') DEFAULT NULL,
  `enfermedad_estu` varchar(250) DEFAULT NULL,
  `discapacidad_estu` varchar(1250) DEFAULT NULL,
  `ingreso_estu` date DEFAULT NULL,
  `id_repre` int(11) NOT NULL,
  `id_foto` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `turno_estu` enum('Mañana','Tarde') DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `id_foto` int(11) NOT NULL,
  `bin_foto` longblob,
  `mime_type` varchar(45) DEFAULT NULL,
  `update_foto` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representante`
--

CREATE TABLE IF NOT EXISTS `representante` (
  `id_repre` int(11) NOT NULL,
  `nombres_repre` varchar(100) DEFAULT NULL,
  `apellidos_repre` varchar(100) DEFAULT NULL,
  `telefono_repre` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE IF NOT EXISTS `seccion` (
  `id_seccion` int(11) NOT NULL,
  `grado_seccion` enum('Primero','Segundo','Tercero','Cuarto','Quinto','Sesto') DEFAULT NULL,
  `char_seccion` varchar(1) DEFAULT NULL,
  `id_docente` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id_docente`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id_estu`),
  ADD UNIQUE KEY `cedula_estu_UNIQUE` (`cedula_estu`),
  ADD KEY `fk_estudiante_reprecentante_idx` (`id_repre`),
  ADD KEY `fk_estudiante_fotos1_idx` (`id_foto`),
  ADD KEY `fk_estudiante_seccion1_idx` (`id_seccion`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indices de la tabla `representante`
--
ALTER TABLE `representante`
  ADD PRIMARY KEY (`id_repre`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`id_seccion`),
  ADD KEY `fk_seccion_docentes1_idx` (`id_docente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id_estu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `id_seccion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_estudiante_fotos1` FOREIGN KEY (`id_foto`) REFERENCES `fotos` (`id_foto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estudiante_reprecentante` FOREIGN KEY (`id_repre`) REFERENCES `representante` (`id_repre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estudiante_seccion1` FOREIGN KEY (`id_seccion`) REFERENCES `seccion` (`id_seccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD CONSTRAINT `fk_seccion_docentes1` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id_docente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
