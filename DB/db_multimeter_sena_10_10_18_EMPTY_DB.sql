-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-10-2018 a las 18:06:06
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

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
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `ADMIN_ID` int(11) NOT NULL,
  `ADMIN_NICKNAME` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ADMIN_NAME` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ADMIN_LASTNAME` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ADMIN_MAIL` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ADMIN_PASS` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`ADMIN_ID`, `ADMIN_NICKNAME`, `ADMIN_NAME`, `ADMIN_LASTNAME`, `ADMIN_MAIL`, `ADMIN_PASS`) VALUES
(1, 'brahian', 'Administrador', 'Ceet', 'slbrahian@misena.edu.co', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `function`
--

CREATE TABLE `function` (
  `FUNCTION_ID` int(11) NOT NULL,
  `FUNCTION_NAME` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `function`
--

INSERT INTO `function` (`FUNCTION_ID`, `FUNCTION_NAME`) VALUES
(1, 'Voltaje AC'),
(2, 'Voltaje DC'),
(3, 'Corriente AC'),
(4, 'Corriente DC'),
(5, 'Frecuencia'),
(6, 'Resistencia Electrica'),
(7, 'Verificacion de Diodos'),
(8, 'Verificacion de Transitores'),
(9, 'Capacitancia'),
(10, 'Temperatura'),
(11, 'Continuidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `function_has_reference`
--

CREATE TABLE `function_has_reference` (
  `FUNCTION_FUNCTION_ID` int(11) NOT NULL,
  `REFERENCE_REFERENCE_ID` int(11) NOT NULL,
  `FUNCTION_PRECISION` varchar(45) DEFAULT NULL
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
(1, 'Fluke'),
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
  `REFERENCE_DESCRIPTION` varchar(500) DEFAULT NULL,
  `REFERENCE_IMG` varchar(300) DEFAULT NULL,
  `REFERENCE_FILE_URL` varchar(500) DEFAULT NULL,
  `REFERENCE_PURCHASE_URL` varchar(500) DEFAULT NULL,
  `REFERENCE_PRICE` varchar(45) DEFAULT NULL,
  `maker_MAKER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADMIN_ID`);

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
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `ADMIN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `function`
--
ALTER TABLE `function`
  MODIFY `FUNCTION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `maker`
--
ALTER TABLE `maker`
  MODIFY `MAKER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
