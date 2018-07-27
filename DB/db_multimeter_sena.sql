-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-07-2018 a las 18:12:22
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_multimeter_sena`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `function`
--

CREATE TABLE `function` (
  `FUNCTION_ID` int(11) NOT NULL,
  `FUNCTION_NAME` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `function_has_reference`
--

CREATE TABLE `function_has_reference` (
  `FUNCTION_FUNCTION_ID` int(11) NOT NULL,
  `REFERENCE_REFERENCE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maker`
--

CREATE TABLE `maker` (
  `MAKER_ID` int(11) NOT NULL,
  `MAKER_NAME` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `maker`
--

INSERT INTO `maker` (`MAKER_ID`, `MAKER_NAME`) VALUES
(1, 'Fluke '),
(2, 'extech'),
(3, 'UNI-T'),
(4, 'proster'),
(5, 'proskit'),
(6, 'fixkit'),
(7, 'etekcity'),
(8, 'amprobe'),
(9, 'tacklife'),
(10, 'MASTECH'),
(11, 'INNOVA'),
(12, 'DR. METER'),
(13, 'TRIPLETT'),
(14, 'REDFISH INSTRUMENTS'),
(15, 'TECHMAN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reference`
--

CREATE TABLE `reference` (
  `REFERENCE_ID` int(11) NOT NULL,
  `REFERENCE_NAME` varchar(45) DEFAULT NULL,
  `REFERENCE_DESCRIPTION` varchar(500) NOT NULL,
  `REFERENCE_IMG` varchar(45) DEFAULT NULL,
  `REFERENCE_FILE` varchar(500) DEFAULT NULL,
  `maker_MAKER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `function`
--
ALTER TABLE `function`
  ADD PRIMARY KEY (`FUNCTION_ID`);

--
-- Indices de la tabla `function_has_reference`
--
ALTER TABLE `function_has_reference`
  ADD PRIMARY KEY (`FUNCTION_FUNCTION_ID`,`REFERENCE_REFERENCE_ID`),
  ADD KEY `fk_function_has_reference_reference1_idx` (`REFERENCE_REFERENCE_ID`),
  ADD KEY `fk_function_has_reference_function1_idx` (`FUNCTION_FUNCTION_ID`);

--
-- Indices de la tabla `maker`
--
ALTER TABLE `maker`
  ADD PRIMARY KEY (`MAKER_ID`);

--
-- Indices de la tabla `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`REFERENCE_ID`),
  ADD KEY `fk_reference_maker_idx` (`maker_MAKER_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `function`
--
ALTER TABLE `function`
  MODIFY `FUNCTION_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `maker`
--
ALTER TABLE `maker`
  MODIFY `MAKER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `reference`
--
ALTER TABLE `reference`
  MODIFY `REFERENCE_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `function_has_reference`
--
ALTER TABLE `function_has_reference`
  ADD CONSTRAINT `fk_function_has_reference_function1` FOREIGN KEY (`FUNCTION_FUNCTION_ID`) REFERENCES `function` (`FUNCTION_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_function_has_reference_reference1` FOREIGN KEY (`REFERENCE_REFERENCE_ID`) REFERENCES `reference` (`REFERENCE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reference`
--
ALTER TABLE `reference`
  ADD CONSTRAINT `fk_reference_maker` FOREIGN KEY (`maker_MAKER_ID`) REFERENCES `maker` (`MAKER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
