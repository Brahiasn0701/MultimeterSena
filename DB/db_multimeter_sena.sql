-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2018 a las 18:36:00
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
(1, 'Voltaje'),
(2, 'Temperatura'),
(3, 'Resistencia'),
(4, 'Amperios');

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
  `REFERENCE_DESCRIPTION` varchar(500) DEFAULT NULL,
  `REFERENCE_IMG` varchar(45) DEFAULT NULL,
  `REFERENCE_FILE_URL` varchar(500) DEFAULT NULL,
  `maker_MAKER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reference`
--

INSERT INTO `reference` (`REFERENCE_ID`, `REFERENCE_NAME`, `REFERENCE_DESCRIPTION`, `REFERENCE_IMG`, `REFERENCE_FILE_URL`, `maker_MAKER_ID`) VALUES
(1, 'Fluke 87V', 'Su innovadora tecnología, que permite realizar medidas precisas de voltaje y frecuencia en variadores de velocidad y otros equipos con gran cantidad de ruido eléctrico\r\nTermómetro integrado que permite realizar medidas de temperatura sin necesidad de instrumentos adicionales.\r\nCorrea con imán (opcional) que facilita la medida y su visualización en pantalla mientras se tienen las manos libres para realizar otras tareas.', '15c2be7481bfa4ce32f60141dd742328ec627ac8FLUKE', 'https://dam-assets.fluke.com/s3fs-public/3272127_6116_ENG_E_W.PDF?_ga=2.189517547.1188630880.1533845211-1011161060.1532481121', 1),
(2, 'Fluke 3000 Serie FC', 'El multímetro inalámbrico Fluke 3000 de la serie FC con la aplicación Fluke Connect® cuenta con los elementos fundamentales para una cómoda solución de problemas de pruebas y mediciones.\r\n\r\nMediciones de voltaje de CA y CC hasta 1000 V\r\nCorriente de CA y CC con una resolución de 0.01 mA\r\nMediciones de frecuencia y capacitancia, prueba de diodos, resistencia y continuidad\r\nRegistro de mínimos y máximos\r\nCAT III 1000 V, Cat IV 600 V; IP54', '15c2be7481bfa4ce32f60141dd742328ec627ac8FLUKE', 'https://dam-assets.fluke.com/s3fs-public/3272127_6116_ENG_E_W.PDF?_ga=2.230981983.1188630880.1533845211-1011161060.1532481121', 1),
(3, 'EX570', 'Termómetro de infrarrojos sin contacto incorporado con puntero láser\r\nCAT III de 1000 V, CAT IV de 600 V de RMS (media cuadrática) verdadera calculada con 0,06% de precisión básica DCV\r\nEnvase de doble molde impermeable de alta resistencia\r\nPantalla LCD retroiluminada grande de 40.000 conteos con gráfico de barra de 40 segmentos\r\nMemoria de almacenamiento para tres mediciones\r\nMediciones de temperatura de contacto con termopar tipo K\r\nLas características incluyen: RETENCIÓN, RELATIVO y RETENCIÓN', '15c2be7481bfa4ce32f60141dd742328ec627ac8EX570', 'http://translate.extech.com/instruments/resources/manuals/EX570_UM-es.pdf', 2),
(4, 'EX540', 'Mediciones de RMS (media cuadrática) verdadera para mediciones precisas de voltaje y corriente de CA\r\nVoltaje y corriente de CA/CC, resistencia, capacitancia, frecuencia (eléctrica/electrónica), temperatura, ciclo de trabajo, diodo/continuidad\r\nMolde dual para resistencia al agua (IP67), clasificación de seguridad CAT IV de 600 V para aplicaciones industriales\r\nModo de adquisición de datos para transmisión de datos en tiempo real directamente a su PC\r\nProtección de entrada de 1000 V en todas las', '15c2be7481bfa4ce32f60141dd742328ec627ac8EX540', 'http://translate.extech.com/instruments/resources/manuals/EX540_UM-es.pdf', 2),
(5, 'UT191', 'Multímetros profesionales de la serie UT191 diseñados para usuarios industriales. Esta serie de multímetros con certificación CE / GS / cTUVus cumple con CAT III 600V y tiene clasificación IP65, adecuada para uso en ambientes húmedos y polvorientos. La nueva memoria de funciones del UT191 conserva la última configuración de modo la próxima vez que se enciende, mejorando la eficiencia para los usuarios. UT191T admite mediciones de temperatura precisas y precisas', '15c2be7481bfa4ce32f60141dd742328ec627ac8UT191', 'https://drive.google.com/file/d/1phHZpDRGR_uJBRxeIX37oMiB3gIC1MLH/view', 3),
(6, 'UT191E', 'Multímetros profesionales de la serie UT191 diseñados para usuarios industriales. Esta serie de multímetros con certificación CE / GS / cTUVus cumple con CAT III 600V y tiene clasificación IP65, adecuada para uso en ambientes húmedos y polvorientos. La nueva memoria de funciones del UT191 conserva la última configuración de modo la próxima vez que se enciende, mejorando la eficiencia para los usuarios.', '15c2be7481bfa4ce32f60141dd742328ec627ac8UT191', 'https://drive.google.com/file/d/1phHZpDRGR_uJBRxeIX37oMiB3gIC1MLH/view', 3),
(7, 'Vici VC99 6999', '110% A estrenar VC99, funda de nuevo tipo, diseño aerodinámico.\r\nLa gran pantalla LCD deja clara la lectura. Fuerte rendimiento antimagnético y anti-jamming.\r\nProbador automático universal con protección completa de funciones. Pantalla de símbolo de unidad, muy fácil de leer.\r\nValor relativo, medición de frecuencia / ciclo de trabajo, retención de datos.', '15c2be7481bfa4ce32f60141dd742328ec627ac8VICI ', '', 4),
(8, 'MT-1705', '3 1/2 True RMS Multimeter con recuentos de 1999, prueba y mide con precisión diferentes parámetros dentro de un circuito eléctrico para una amplia variedad de aplicaciones eléctricas y electrónicas.', '15c2be7481bfa4ce32f60141dd742328ec627ac8MT-17', '', 5),
(9, 'MT-1210', 'Con una luz de fondo para facilitar la lectura en situaciones de poca luz\r\nPanel de visualización grande y fácil de leer\r\nPantalla: 3 1/2 dígitos\r\nExcelente relación calidad-precio\r\nInterfaz fácil de usar es ideal para estudiantes, mercado de bricolaje.', '15c2be7481bfa4ce32f60141dd742328ec627ac8MT-12', '', 5),
(10, 'MSR-C600', 'Los medidores de abrazadera, también llamados medidores de abrazadera, son generalmente utilizados por los ingenieros eléctricos para medir las propiedades de la corriente eléctrica sin tocar o desconectar físicamente el conductor. Este medidor de pinza digital Etekcity es un multímetro de rango automático que tiene dos mordazas que pueden cerrarse alrededor de un conductor eléctrico de hasta 26 mm de diámetro para medir la corriente CA de hasta 400 amp sin interrumpir el circuito. Se incluye un', '15c2be7481bfa4ce32f60141dd742328ec627ac8MSR-C', 'https://images-na.ssl-images-amazon.com/images/I/A1gny3Vp0sL.pdf', 7),
(11, 'MSR-R500', 'El multímetro digital Etekcity MSR-R500 es una herramienta práctica para electricistas, aficionados y uso doméstico general. Es fácil de operar y presenta muchas funciones diferentes para medir la corriente, el voltaje y la resistencia, así como la continuidad, el transistor y las pruebas de diodos. Se puede usar para diagnosticar, ensamblar y reparar circuitos y cableado. Otras características incluyen un indicador de batería baja, zumbador de continuidad y protección de sobrecarga. ', '15c2be7481bfa4ce32f60141dd742328ec627ac8MSR-R', 'https://images-na.ssl-images-amazon.com/images/I/A13ytybWBBL.pdf', 7),
(12, '15XP-B', 'El 15XP-B es la elección correcta para ingenieros de electrónica, técnicos y servicio de campo\r\nVisualización de rango automático para mediciones más rápidas Prueba lógica TTL para circuitos digitales Soporte inclinable integrado para facilitar el uso en el banco Prueba de diodo para la resolución de problemas de nivel de componente La retención de datos congela la pantalla para \"mantener\" la lectura de la medición 600V AC / 600V DC-la más alta clasificación de voltaje en este tamaño de medidor\r', '15c2be7481bfa4ce32f60141dd742328ec627ac815XP-', 'http://content.amprobe.com/manualsA/5XP-A_15XP-A_35XP-A_Compact-Digital-Multimeters_Manual.pdf', 8),
(13, '34XR-A', 'Autorango; pantalla: LCD de 3-3 / 4 dígitos, 3999 cuenta con un gráfico de barra analógica de 41 segmentos Velocidad de actualización de pantalla: 2 / seg, nominal Temperatura de funcionamiento: 0 ° C a 45 ° C a <70% HR Multímetro digital True-RMS con temperatura y luz de fondo Indicación de exceso de rango Apagado automático para ahorrar batería Min / max, retención de datos y bloqueo de rango Puerta separada para facilitar el acceso de la batería y el fusible Funda Magne-Grip ™ con correa colg', '15c2be7481bfa4ce32f60141dd742328ec627ac834XR-', 'http://content.amprobe.com/manualsA/34XR-A_Professional-Digital-Multimeter_Manual.pdf', 8),
(14, 'DM03', 'Función de retención de valor máximo Protección de sobrecarga y prueba de continuidad Indicación de batería baja y apagado automático Autonivelación: mida la tensión, corriente, frecuencia, resistencia, continuidad, diodo y etc. de CA / CC. Pantalla LCD de dígitos\r\nMedidor constante y lecturas precisas', '15c2be7481bfa4ce32f60141dd742328ec627ac8DM03.', '', 9),
(15, 'MS8301D', 'Display 6000 Counts\r\nAuto range\r\nAuto Power Off\r\nDual Display\r\nContinuity Buzzer\r\nData Hold\r\nMAX/MIN\r\nDisplay Backlight\r\nLow Battery Display\r\nNon-Contact Voltage Detector', '15c2be7481bfa4ce32f60141dd742328ec627ac8MS830', 'https://manualzz.com/doc/45213214/r-00-05-2083-ms8301d-ms8303d.cdr', 10),
(16, 'MS8238H', 'Display 4000 Counts                        \r\nAuto & Manual Ranging                        \r\nAuto Power Off                        \r\nTrue RMS  For AC Voltage & AC Current                        \r\nContinuity Buzzer <50Ω                        \r\nDiode Open Voltage 3.2V                        \r\nData Hold                        \r\nLow Battery Display                        \r\nNon-Contact Voltage Detector                        \r\nBattery Tester 1.5V/9V                        \r\nWireless APP connection', '15c2be7481bfa4ce32f60141dd742328ec627ac8MS823', '', 10),
(17, '3300 DMM', 'Su comprobador eléctrico personal y casero. Utilice este comprobador versátil y asequible para solucionar de manera segura y precisa una variedad de problemas eléctricos en el hogar y el automóvil. Los 10 circuitos de MegOhm previenen daños a la electrónica automotriz sensible. Incluye una banda para la muñeca, soportes y sujetadores de cables para liberar las manos y realizar pruebas. Los usos del hogar incluyen: enchufes, fusibles, cableado, baterías de uso general, pasatiempos electrónicos y ', '15c2be7481bfa4ce32f60141dd742328ec627ac83300 ', 'https://csr.innova.com/Content/Manual/Innova/110711_3300_93-0187_RevA_S_Final_downloadable.pdf?r=0.2618540185044499', 11),
(18, '33220 DMM', 'Las básculas Auto-Ranging ™ eliminan la necesidad de marcar en el rango correcto cuando se realizan mediciones electrónicas.\r\nImpedancia de entrada de 10 MegOhm para un uso seguro en el automóvil. Los usos automotrices incluyen: circuitos automotrices, interruptores, cableado, baterías de vehículos y sistemas de carga, componentes eléctricos y más. Los usos del hogar incluyen: enchufes, fusibles, cableado, baterías de uso general, pasatiempos electrónicos y más. Gran pantalla digital. Función de', '15c2be7481bfa4ce32f60141dd742328ec627ac83320 ', 'https://csr.innova.com/Content/Manual/Innova/100912_3320_93-0041_RevB_Manual_S_Version_Final_downloadable.pdf?r=0.04579039665054902', 11),
(19, 'MS88', 'Mida con precisión la tensión, la corriente, la frecuencia, la resistencia, la capacitancia, el diodo de CA / CC\r\nLecturas con la gran pantalla LCD retroiluminada. función de retención de datos, integrada en el soporte para mayor comodidad\r\nBatería de 9V incluye un par de cables de prueba. La función de apagado automático ayuda a conservar la vida útil de la batería\r\nGarantía de devolución de dinero de 30 días, garantía de reemplazo de 12 meses y soporte de por vida ', '15c2be7481bfa4ce32f60141dd742328ec627ac8MS88.', '', 12),
(20, 'MS8268', 'Rango automático y manual con medición relativa (todos los rangos, excepto la frecuencia)\r\nApagado automático (podría estar deshabilitado) & Pantalla LED retroiluminada LED azul\r\nAC / DC 1000V / 10A 200KHz 200uF 40Mohm Medición de la longitud relativa Verificación de diodo hFE Continuidad\r\nLED / Sonido Advertencia cuando se utilizan conectores banana incorrectos en relación con la configuración del interruptor de función\r\nTodo el rango fusionado (reiniciable) con 1 año de garantía', '15c2be7481bfa4ce32f60141dd742328ec627ac8MS826', 'https://panda-bg.com/datasheet/646-340035-Multimeter-MS8268.pdf', 12),
(21, 'BBT858L', 'Pantalla de 3 1/2 dígitos grandes\r\nCATII 600V calificación\r\nZumbador de continuidad\r\nDuración de la batería de 150-200 horas Perfecto para uso electrónico y eléctrico Respaldado y reforzado para uso en el campo Botón de retención de datos para capturar el voltaje máximo Sondas de silicona blandas para seguridad y confiabilidad Tipo termopar tipo K para medir con precisión las temperaturas del flujo de aire\r\nCubierta protectora desmontable con soporte trasero Batería de 9 voltios (incluida) 1 año', '15c2be7481bfa4ce32f60141dd742328ec627ac8BBT85', 'https://www.allaboutcircuits.com/test-measurement/multimeters/byte-brothers-bbt858l/manual/', 13),
(22, '1101-B', 'Mida la temperatura de recintos, superficies, cámaras impelentes, refrigerante, intercambiadores de calor, disipadores de calor, etc.\r\nMida el voltaje de la batería en sistemas de seguridad, UPS, vehículos, herramientas portátiles, etc. Mida la resistencia de los altavoces, EOL, cableado, sensores, etc.', '15c2be7481bfa4ce32f60141dd742328ec627ac81101-', 'https://www.triplett.com/wp-content/uploads/2012/11/1101-B-Manual-84-884.pdf', 13),
(23, 'iDVM 510', 'El nuevo iDVM 510 proporciona integración con dispositivos móviles iOS y Android: lea mediciones a distancia, registre datos en el medidor o en su dispositivo móvil, muestre datos en una variedad de formatos y comparta datos a través de correo electrónico, un servicio en la nube (como Dropbox ), o servidor web ad-hoc. ¡El mejor multímetro y registrador de datos por el precio - NUNCA!', '15c2be7481bfa4ce32f60141dd742328ec627ac8IDVM-', 'https://redfishinstruments.com/wp-content/uploads/2017/09/RF_Manual_iDVM510_1117.pdf', 14),
(24, 'iDVM 333', 'Mordazas del transformador que detectan la corriente alterna que fluye a través de un conductor\r\nSensibilidad seleccionable entre 1mV / A y 10mV / A\r\nProtector de mano para proteger su mano por seguridad\r\nGatillo grande y fácil de operar abre las mandíbulas del transformado', '15c2be7481bfa4ce32f60141dd742328ec627ac8iDVM ', 'https://redfishinstruments.com/wp-content/uploads/2017/09/iDVM333_MANUAL.pdf', 14);

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
  MODIFY `FUNCTION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `maker`
--
ALTER TABLE `maker`
  MODIFY `MAKER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `reference`
--
ALTER TABLE `reference`
  MODIFY `REFERENCE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
