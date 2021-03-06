-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2018 a las 22:44:29
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

--
-- Volcado de datos para la tabla `function_has_reference`
--

INSERT INTO `function_has_reference` (`FUNCTION_FUNCTION_ID`, `REFERENCE_REFERENCE_ID`, `FUNCTION_PRECISION`) VALUES
(1, 1, '0.05'),
(1, 2, '0.1'),
(1, 3, '0.06'),
(1, 4, '0.06'),
(1, 5, '0.5'),
(1, 6, '0.5'),
(1, 7, '0.8'),
(2, 1, '0.7'),
(2, 2, '0.5'),
(2, 3, '1'),
(2, 4, '1'),
(2, 5, '1.2'),
(2, 6, '0.7'),
(2, 7, '0.5'),
(3, 1, '0.2'),
(3, 2, '0.4'),
(3, 3, '0.7'),
(3, 4, '1'),
(3, 5, '1.8'),
(3, 6, '1'),
(3, 7, '2'),
(4, 1, '1.0'),
(4, 2, '1.2'),
(4, 3, '1'),
(4, 4, '1.5'),
(4, 5, '2.0'),
(4, 6, '1.2'),
(4, 7, '1'),
(5, 1, '0.005'),
(5, 2, '0.005'),
(5, 3, '0.1'),
(5, 4, '0.5'),
(5, 5, '0.1'),
(5, 6, '0.1'),
(5, 7, '0.5'),
(6, 1, '0.2'),
(6, 2, '0.4'),
(6, 3, '0.3'),
(6, 4, '0.3'),
(6, 5, '1'),
(6, 6, '0.8'),
(6, 7, '0.8'),
(7, 1, ''),
(7, 2, ''),
(7, 7, ''),
(9, 1, ''),
(9, 2, '1'),
(9, 3, '3.5'),
(9, 4, '3.5'),
(9, 5, '4'),
(9, 6, '4'),
(9, 7, '2.5'),
(10, 3, '1'),
(10, 6, '1.5'),
(10, 7, '1.2');

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
(15, 'TECHMAN'),
(16, 'ss');

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
-- Volcado de datos para la tabla `reference`
--

INSERT INTO `reference` (`REFERENCE_ID`, `REFERENCE_NAME`, `REFERENCE_DESCRIPTION`, `REFERENCE_IMG`, `REFERENCE_FILE_URL`, `REFERENCE_PURCHASE_URL`, `REFERENCE_PRICE`, `maker_MAKER_ID`) VALUES
(1, 'Fluke 87V', 'Cuando la productividad es un factor de primer orden y necesita solucionar los problemas con rapidez, el modelo Fluke 87V proporciona la precisión y las capacidades de resolución de problemas que necesita. Diseñado específicamente para gestionar señales complejas, el multímetro industrial 87V permite ganar productividad acabando con las conjeturas en la solución de problemas de los sistemas motores ', 'a6fede5f6dc0ef778f54f47cf1ed27b05c6f6e05Captura de pantalla (53).png', 'https://dam-assets.fluke.com/s3fs-public/80v_____umspa0200.pdf?Y9ZQg60UBvC.heFrNQxsjdXvo9JmmAkw', 'https://articulo.mercadolibre.com.co/MCO-476117836-fluke-83-5-industrial-digital-multimeter-_JM', '1835308', 1),
(2, 'Fluke 83V', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio voluptate porro laudantium animi quam quos, accusamus commodi ea culpa inventore, beatae voluptatibus reiciendis mollitia accusantium velit tenetur exercitationem quod facere. Libero inventore sit beatae voluptatem tempora numquam! Voluptate assumenda ducimus blanditiis nisi possimus commodi dignissimos, laudantium atque non suscipit earum nostrum tempore labore minus consequuntur quasi? Iure ipsa fugit dicta aperiam, illo animi nat', '4f443e826a927da724688a76e34c571f575f970aFluke83V.PNG', 'https://www.google.com.co/search?q=traductor&rlz=1C1CHBD_esCO783CO783&oq=trad&aqs=chrome.0.69i59j69i65l3j69i57j0.1969j1j7&sourceid=chrome&ie=UTF-8', 'https://listado.mercadolibre.com.co/multimetro-fluke-83-v-%C3%98', '1987451', 1),
(3, 'Extech', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio voluptate porro laudantium animi quam quos, accusamus commodi ea culpa inventore, beatae voluptatibus reiciendis mollitia accusantium velit tenetur exercitationem quod facere. Libero inventore sit beatae voluptatem tempora numquam! Voluptate assumenda ducimus blanditiis nisi possimus commodi dignissimos, laudantium atque non suscipit earum nostrum tempore labore minus consequuntur quasi? Iure ipsa fugit dicta aperiam, illo sssssssss', '4f443e826a927da724688a76e34c571f575f970aEX570.PNG', 'https://www.google.com.co/search?q=traductor&rlz=1C1CHBD_esCO783CO783&oq=trad&aqs=chrome.0.69i59j69i65l3j69i57j0.1969j1j7&sourceid=chrome&ie=UTF-8', 'https://listado.mercadolibre.com.co/multimetro-fluke-83-v-%C3%98', '2000000', 2),
(4, 'Fluke 87V', 'Cuando la productividad es un factor de primer orden y necesita solucionar los problemas con rapidez, el modelo Fluke 87V proporciona la precisión y las capacidades de resolución de problemas que necesita. Diseñado específicamente para gestionar señales complejas, el multímetro industrial 87V permite ganar productividad acabando con las conjeturas en la solución de problemas de los sistemas motores incluso en ubicaciones ruidosas, de mucha energía y ', '4f443e826a927da724688a76e34c571f575f970aEX540.png', 'https://www.google.ca/', 'Brahian Link', '120000', 1),
(5, 'Fluke 87V', 'Cuando la productividad es un factor de primer orden y necesita solucionar los problemas con rapidez, el modelo Fluke 87V proporciona la precisión y las capacidades de resolución de problemas que necesita. Diseñado específicamente para gestionar señales complejas, el multímetro industrial 87V permite ganar productividad acabando con las conjeturas en la solución de problemas de los sistemas motores incluso en ubicaciones ruidosas, de mucha energía y ', '4f443e826a927da724688a76e34c571f575f970aUT125C.PNG', 'https://www.google.ca/', 'Brahian Link', '120000', 1),
(6, 'Fluke 87V', 'Cuando la productividad es un factor de primer orden y necesita solucionar los problemas con rapidez, el modelo Fluke 87V proporciona la precisión y las capacidades de resolución de problemas que necesita. Diseñado específicamente para gestionar señales complejas, el multímetro industrial 87V permite ganar productividad acabando con las conjeturas en la solución de problemas de los sistemas motores incluso en ubicaciones ruidosas, de mucha energía y ', '4f443e826a927da724688a76e34c571f575f970aUT133A.jpg', 'https://www.google.ca/', 'Brahian Link', '120000', 1),
(7, 'Fluke 87V', 'Cuando la productividad es un factor de primer orden y necesita solucionar los problemas con rapidez, el modelo Fluke 87V proporciona la precisión y las capacidades de resolución de problemas que necesita. Diseñado específicamente para gestionar señales complejas, el multímetro industrial 87V permite ganar productividad acabando con las conjeturas en la solución de problemas de los sistemas motores incluso en ubicaciones ruidosas, de mucha energía y ', '4f443e826a927da724688a76e34c571f575f970aProsterVC99.PNG', 'https://www.google.ca/', 'Brahian Link', '120000', 1);

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
  MODIFY `FUNCTION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `maker`
--
ALTER TABLE `maker`
  MODIFY `MAKER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `reference`
--
ALTER TABLE `reference`
  MODIFY `REFERENCE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
