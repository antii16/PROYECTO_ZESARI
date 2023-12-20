-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-12-2023 a las 23:35:28
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectozesari`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apuntado`
--

CREATE TABLE `apuntado` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `apuntado`
--

INSERT INTO `apuntado` (`id`, `id_cliente`, `id_horario`) VALUES
(5, 15, 1970),
(6, 15, 2030),
(7, 15, 2061),
(8, 15, 2136),
(9, 15, 2166),
(10, 15, 2255),
(11, 15, 2285),
(19, 35, 1886),
(20, 35, 1880),
(23, 15, 2303),
(24, 35, 1905),
(25, 35, 1906),
(26, 35, 1982),
(27, 35, 1904),
(28, 35, 1952),
(30, 16, 1981),
(31, 16, 1980),
(32, 16, 2030),
(33, 16, 1884),
(34, 23, 1981),
(35, 23, 1981),
(36, 23, 1980),
(37, 23, 1980),
(38, 23, 2030),
(39, 16, 2031),
(40, 16, 1883),
(41, 24, 1981),
(43, 38, 2287);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `fecha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_usuario_empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `blogs`
--

INSERT INTO `blogs` (`id`, `titulo`, `descripcion`, `texto`, `fecha`, `imagen`, `id_usuario_empleado`) VALUES
(6, 'Joseph Hubertus Pilates', '¿Quién fue Joseph Hubertus Pilates?', '<p>Joseph Pilates cre&oacute; un m&eacute;todo de entrenamiento f&iacute;sico-mental al que llam&oacute; Controlog&iacute;a (control de la mente sobre el cuerpo). Hoy en d&iacute;a se conoce como &quot;M&eacute;todo Pilates&quot; o simplemente &quot;Pilates&quot;. Naci&oacute; en 1880 en M&ouml;nchengladbach, Alemania De Padre Griego (atleta) y madre alemana (neur&oacute;pata). Su apellido original era Pilatu, Joseph lo cambi&oacute; para semejanza con &quot;Poncio Pilato, el asesino de Jesucristo&quot;. De ni&ntilde;o Joseph padec&iacute;a de varias enfermedades (raquitismo, asma y fiebre reum&aacute;tica). Esto le llev&oacute; a interesarse al cuerpo humano, anatom&iacute;a, estudio de los movimiento de los animales, filosof&iacute;as orientales y los m&eacute;todos de entrenamiento de los antiguos griegos y romanos. Practic&oacute; lucha, culturismo, thai chi, yoga, meditaci&oacute;n zen y gimnasia. Super&oacute; sus enfermedades y consigui&oacute; &eacute;xito como deportista, boxeador y gimnasta.</p><p>En 1912 se mud&oacute; en Inglaterra, trabaj&oacute; como instructor de defensa personal y en un circo realizando un n&uacute;mero como &quot;estatua griega viviente&quot;. En Lancaster, a comienzo de la Primera Guerra Mundial, debido a su nacionalidad alemana, fue internado en un campo de concentraci&oacute;n. Tras la guerra regres&oacute; a Alemania donde, realizando varias actividades (entrenamiento danzadores, rehabilitaci&oacute;n de veteranos de guerra) empez&oacute; a desarrollar su m&eacute;todo tambi&eacute;n con m&aacute;quinas. Empez&oacute; a tener &eacute;xito en el campo de la rehabilitaci&oacute;n de los enfermos que gracias a su tratamientos recuperaban de forma r&aacute;pida y fuerte. Fue invitado a entrenar el ej&eacute;rcito alem&aacute;n pero, por cuestiones pol&iacute;ticas, no acepto y decidi&oacute; exiliarse en Estados Unidos. En el barco hac&iacute;a New York conoci&oacute; Clara, la que ser&aacute; su esposa.</p><p>En 1926 abrieron en Manhattan (New York), a esquina a la calle 56, en el n&uacute;mero 939 de la Octava Avenida, un estudio para ense&ntilde;ar su m&eacute;todo. Desarroll&oacute; sus aparados (el cadillac y el reformer, la silla Wunda o el barril). Se hizo popular entre famosos e importantes core&oacute;grafos y bailarines. Su m&eacute;todo y beneficios ya empezaban a conocerse y difundirse a nivel mundial. Escribi&oacute; varios libros y manuales sobre su m&eacute;todo.</p><p>En el 1965 un incendio arras&oacute; su estudio. Joseph Pilates falleci&oacute; en New York en octubre de 1967, a los 87 a&ntilde;os de edad. Su esposa se encarg&oacute; del estudio hasta su fallecimiento en el 1977.</p>', '2023-06-11', 'pilates.jpg', 10),
(8, 'Dolor de espalda', 'Cómo aliviar el dolor de espalda con Pilates', '<p>Seg&uacute;n el estudio EPISER de la Sociedad Espa&ntilde;ola de Reumatolog&iacute;a (SER), aproximadamente,&nbsp;<strong>el 80% de la poblaci&oacute;n va a sufrir dolor de espalda&nbsp;</strong>en alg&uacute;n momento de su vida.&nbsp;</p><p>Seg&uacute;n datos del Sistema Nacional de Salud publicados en 2019,&nbsp;<strong>la lumbalgia es el segundo problema de salud cr&oacute;nico en Espa&ntilde;a y afecta a casi el 18% de la poblaci&oacute;n</strong>. Adem&aacute;s, es considerada la principal causa de baja laboral e incapacidad en el mundo.</p><p>Varios investigadores de la Universidad de Castilla-La Mancha (UCLM) han publicado un estudio que analizaba qu&eacute; ejercicio es el mejor para aliviar el dolor y las restricciones de movimiento que provoca la lumbalgia</p><p>Despu&eacute;s de revisar a m&aacute;s de 9.000 pacientes, los investigadores aseguran que, en realidad,&nbsp;<strong>pr&aacute;cticamente cualquier ejercicio f&iacute;sico ayuda a disminuir el dolor y la discapacidad de la lumbalgia.&nbsp;</strong></p><p>Pero lo cierto es que existen ejercicios m&aacute;s efectivos que otros para aliviar los s<strong>&iacute;ntomas dolor de espalda y cansancio</strong></p><p><em>&iquest;Y sabes cu&aacute;l es la m&aacute;s eficaz para reducir el dolor?</em></p><p><strong>PILATES</strong></p><p><em>&iquest;Y para reducir las restricciones de movilidad o discapacidad asociadas al dolor lumbar?</em></p><p>Tambi&eacute;n, PILATES, seguido de los ejercicios de fuerza y de core.&nbsp;</p><p><strong>Pilates es el mejor tratamiento para el dolor de espalda baja y practicarlo puede ayudarte a aliviar ese dolor de espalda que no desaparece.</strong></p>', '2023-06-10', 'dolorEspalda.jpg', 10),
(11, 'Las múltiple ventajas de una postura correcta', 'La postura es la clave de la alineación de músculos y articulaciones, y a su vez, de un cuerpo sano.', '<p>Adem&aacute;s de parecer mas alto y delgado, y de que las prendas de vestir te sienten mucho mejor, la postura es la clave de la alineaci&oacute;n de m&uacute;sculos y articulaciones, y a su vez, de un cuerpo sano.</p><p>Cuando nos encorvamos, adem&aacute;s de perder nuestro equilibrio natural, aglomeramos los &oacute;rganos internos, una causa habitual de la mala digesti&oacute;n, que puede ocasionar problemas como el aumento de peso.</p><p>Estos son algunos consejos esenciales para mantener una columna vertebral sana y fuerte:</p><ul><li>Realizar actividad f&iacute;sica diaria.</li><li>Tener una buena postura corporal.</li><li>Mantener un peso corporal saludable.</li><li>Tener una alimentaci&oacute;n saludable.</li><li>Evitar cargar pesos excesivos.</li><li>Dormir en posturas saludables.</li><li>Disminuir los niveles de estr&eacute;s.</li><li>Usar un calzado c&oacute;modo y adecuado.</li><li>Realizar adaptaciones ergon&oacute;micas en el lugar de trabajo.</li></ul>', '2023-12-14', '20230816_201922.jpg', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `titulo`, `descripcion`, `imagen`) VALUES
(12, 'Pilates Mat', '                        Método de entrenamiento que trabaja el cuerpo de forma equilibrada, corrige posturas inadecuadas y mejora el estado físico.                        ', 'categoriaMat.jpg'),
(13, 'Pilates Studio', ' Práctica ideada para fortalecer todo el cuerpo con el uso de aparatos diseñados específicamente por el creador de la misma disciplina.', 'categoriaStudio.jpg'),
(14, 'Entrenamiento Personalizado', 'Entrenamiento de pilates personalizado. El pilates es ideal para ponerse en forma, pero también es un método para prevenir lesiones y ayudar a recuperarse.', 'categoriaEP.jpg'),
(16, 'Pilates Iniciación', 'Clases necesarias para aquellos que nunca hayan hecho pilates antes. \r\nEsto se realiza porque que, cuando el alumno inicie en los grupos, pueda llevar el ritmo de la clase con la terminología propia de dicha clase. \r\nSin embargo, esto es algo que se puede hablar con el profesor directamente. \r\n', 'categoriaIP.jpg'),
(18, 'Quiromasaje', '                El quiromasaje es una técnica o bien, mejor dicho, un conjunto de técnicas las que son empleadas por un terapeuta con el propósito de manipular los tejidos grasos, musculares y la piel de un paciente con el propósito de calmar sus dolores.\r\n\r\nPodemos decir que es un género de masoterapia, pero considerablemente más avanzada y concreta y que a veces este género de tratamiento es complementado con sesiones de acupuntura e inclusive aromaterapia con el propósito de curar al paciente de la forma rápida posible.\r\n\r\nLas técnicas usadas en la quiroterapia son el resultado de la combinación de diferentes estilos de masajes como el masaje sueco o bien el turco al que se le agregan una serie de manipulaciones concretas dando como resultado un tratamiento considerablemente más efectivo.                ', 'categoriaQuiro.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `precio` float(10,0) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `id_usuario_profesor` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id`, `titulo`, `precio`, `cantidad`, `id_usuario_profesor`, `id_categoria`) VALUES
(6, '4 sesiones (IP)', 115, 4, 11, 16),
(7, '4 sesiones en pareja (IP)', 180, 4, 10, 16),
(8, '1 clase a la semana (GS)', 60, 4, 10, 13),
(9, '2 clases a la semana (GS)', 90, 8, 10, 13),
(10, '3 clases a la semana (GS)', 105, 12, 10, 13),
(11, '1 clase a la semana (GM)', 40, 4, 10, 12),
(12, '2 clases a la semana (GM)', 55, 8, 10, 12),
(13, '3 clases a la semana (GM)', 75, 12, 10, 12),
(14, '8 clases (EP)', 270, 8, 10, 14),
(15, '10 clases (EP)', 320, 10, 10, 14),
(16, '12 clases (EP)', 375, 12, 10, 14),
(17, '15 clases (EP)', 450, 15, 10, 14),
(18, '24 clases (EP)', 690, 24, 10, 14),
(19, '4 sesiones (Q)', 90, 4, 10, 18),
(20, '8 sesiones (Q)', 170, 8, 10, 18),
(21, '10 sesiones (Q)', 205, 10, 10, 18),
(22, '20 sesiones (Q)', 105, 20, 10, 18),
(23, 'Clase suelta (GS)', 22, 1, 10, 13),
(24, 'Clase suelta (GM)', 20, 1, 10, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `aforo_disponible` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id`, `aforo_disponible`, `fecha`, `id_categoria`) VALUES
(1880, 2, '2023-12-01 08:00:00', 13),
(1881, 0, '2023-12-01 09:00:00', 18),
(1882, 0, '2023-12-01 10:00:00', 18),
(1883, 0, '2023-12-01 11:00:00', 14),
(1884, 0, '2023-12-01 12:00:00', 14),
(1885, 1, '2023-12-01 13:00:00', 14),
(1886, 1, '2023-12-01 14:00:00', 12),
(1887, 5, '2023-12-01 15:00:00', 12),
(1888, 4, '2023-12-01 16:00:00', 16),
(1889, 5, '2023-12-01 17:00:00', 12),
(1890, 5, '2023-12-01 18:00:00', 12),
(1891, 5, '2023-12-01 19:00:00', 12),
(1892, 5, '2023-12-01 20:00:00', 12),
(1893, 5, '2023-12-01 21:00:00', 12),
(1895, 5, '2023-12-02 08:00:00', 12),
(1896, 5, '2023-12-02 09:00:00', 12),
(1897, 5, '2023-12-02 10:00:00', 12),
(1898, 5, '2023-12-02 11:00:00', 12),
(1899, 5, '2023-12-02 12:00:00', 12),
(1900, 5, '2023-12-02 13:00:00', 12),
(1901, 5, '2023-12-02 14:00:00', 12),
(1902, 5, '2023-12-02 15:00:00', 12),
(1903, 5, '2023-12-02 16:00:00', 12),
(1904, 4, '2023-12-02 17:00:00', 12),
(1905, 4, '2023-12-02 18:00:00', 12),
(1906, 4, '2023-12-02 19:00:00', 12),
(1907, 5, '2023-12-02 20:00:00', 12),
(1908, 5, '2023-12-02 21:00:00', 12),
(1909, 5, '2023-12-02 22:00:00', 12),
(1910, 5, '2023-12-03 08:00:00', 12),
(1911, 5, '2023-12-03 09:00:00', 12),
(1912, 5, '2023-12-03 10:00:00', 12),
(1913, 5, '2023-12-03 11:00:00', 12),
(1914, 5, '2023-12-03 12:00:00', 12),
(1915, 5, '2023-12-03 13:00:00', 12),
(1916, 5, '2023-12-03 14:00:00', 12),
(1917, 5, '2023-12-03 15:00:00', 12),
(1918, 5, '2023-12-03 16:00:00', 12),
(1919, 5, '2023-12-03 17:00:00', 12),
(1920, 5, '2023-12-03 18:00:00', 12),
(1921, 5, '2023-12-03 19:00:00', 12),
(1922, 5, '2023-12-03 20:00:00', 12),
(1923, 5, '2023-12-03 21:00:00', 12),
(1924, 5, '2023-12-03 22:00:00', 12),
(1925, 5, '2023-12-04 08:00:00', 12),
(1926, 3, '2023-12-04 09:00:00', 13),
(1927, 6, '2023-12-04 10:00:00', 13),
(1928, 6, '2023-12-04 11:00:00', 13),
(1929, 1, '2023-12-04 12:00:00', 18),
(1930, 5, '2023-12-04 13:00:00', 12),
(1931, 5, '2023-12-04 14:00:00', 12),
(1932, 5, '2023-12-04 15:00:00', 12),
(1933, 5, '2023-12-04 16:00:00', 12),
(1934, 5, '2023-12-04 17:00:00', 12),
(1935, 6, '2023-12-04 18:00:00', 13),
(1936, 6, '2023-12-04 19:00:00', 13),
(1937, 6, '2023-12-04 20:00:00', 13),
(1938, 6, '2023-12-04 21:00:00', 13),
(1939, 5, '2023-12-04 22:00:00', 12),
(1940, 6, '2023-12-05 08:00:00', 13),
(1941, 6, '2023-12-05 09:00:00', 13),
(1942, 5, '2023-12-05 10:00:00', 12),
(1943, 6, '2023-12-05 11:00:00', 13),
(1944, 1, '2023-12-05 12:00:00', 14),
(1945, 5, '2023-12-05 13:00:00', 12),
(1946, 5, '2023-12-05 14:00:00', 12),
(1947, 5, '2023-12-05 15:00:00', 12),
(1948, 5, '2023-12-05 16:00:00', 12),
(1949, 5, '2023-12-05 17:00:00', 12),
(1950, 6, '2023-12-05 18:00:00', 13),
(1951, 6, '2023-12-05 19:00:00', 13),
(1952, 5, '2023-12-05 20:00:00', 13),
(1953, 1, '2023-12-05 21:00:00', 14),
(1954, 5, '2023-12-05 22:00:00', 12),
(1955, 5, '2023-12-06 08:00:00', 12),
(1956, 5, '2023-12-06 09:00:00', 12),
(1957, 5, '2023-12-06 10:00:00', 12),
(1958, 5, '2023-12-06 11:00:00', 12),
(1959, 5, '2023-12-06 12:00:00', 12),
(1960, 5, '2023-12-06 13:00:00', 12),
(1961, 5, '2023-12-06 14:00:00', 12),
(1962, 5, '2023-12-06 15:00:00', 12),
(1963, 5, '2023-12-06 16:00:00', 12),
(1964, 5, '2023-12-06 17:00:00', 12),
(1965, 5, '2023-12-06 18:00:00', 12),
(1966, 5, '2023-12-06 19:00:00', 12),
(1967, 5, '2023-12-06 20:00:00', 12),
(1968, 5, '2023-12-06 21:00:00', 12),
(1969, 5, '2023-12-06 22:00:00', 12),
(1970, 5, '2023-12-07 08:00:00', 13),
(1971, 6, '2023-12-07 09:00:00', 13),
(1972, 5, '2023-12-07 10:00:00', 12),
(1973, 6, '2023-12-07 11:00:00', 13),
(1974, 5, '2023-12-07 12:00:00', 12),
(1975, 5, '2023-12-07 13:00:00', 12),
(1976, 5, '2023-12-07 14:00:00', 12),
(1977, 5, '2023-12-07 15:00:00', 12),
(1978, 5, '2023-12-07 16:00:00', 12),
(1979, 5, '2023-12-07 17:00:00', 12),
(1980, 3, '2023-12-07 18:00:00', 13),
(1981, 2, '2023-12-07 19:00:00', 13),
(1982, 5, '2023-12-07 20:00:00', 13),
(1983, 5, '2023-12-07 21:00:00', 12),
(1984, 5, '2023-12-07 22:00:00', 12),
(1985, 5, '2023-12-08 08:00:00', 12),
(1986, 5, '2023-12-08 09:00:00', 12),
(1987, 5, '2023-12-08 10:00:00', 12),
(1988, 5, '2023-12-08 11:00:00', 12),
(1989, 5, '2023-12-08 12:00:00', 12),
(1990, 5, '2023-12-08 13:00:00', 12),
(1991, 5, '2023-12-08 14:00:00', 12),
(1992, 5, '2023-12-08 15:00:00', 12),
(1993, 5, '2023-12-08 16:00:00', 12),
(1994, 5, '2023-12-08 17:00:00', 12),
(1995, 5, '2023-12-08 18:00:00', 12),
(1996, 5, '2023-12-08 19:00:00', 12),
(1997, 5, '2023-12-08 20:00:00', 12),
(1998, 5, '2023-12-08 21:00:00', 12),
(1999, 5, '2023-12-08 22:00:00', 12),
(2000, 5, '2023-12-09 08:00:00', 12),
(2001, 5, '2023-12-09 09:00:00', 12),
(2002, 5, '2023-12-09 10:00:00', 12),
(2003, 5, '2023-12-09 11:00:00', 12),
(2004, 5, '2023-12-09 12:00:00', 12),
(2005, 5, '2023-12-09 13:00:00', 12),
(2006, 5, '2023-12-09 14:00:00', 12),
(2007, 5, '2023-12-09 15:00:00', 12),
(2008, 5, '2023-12-09 16:00:00', 12),
(2009, 5, '2023-12-09 17:00:00', 12),
(2010, 5, '2023-12-09 18:00:00', 12),
(2011, 5, '2023-12-09 19:00:00', 12),
(2012, 5, '2023-12-09 20:00:00', 12),
(2013, 5, '2023-12-09 21:00:00', 12),
(2014, 5, '2023-12-09 22:00:00', 12),
(2015, 5, '2023-12-10 08:00:00', 12),
(2016, 5, '2023-12-10 09:00:00', 12),
(2017, 5, '2023-12-10 10:00:00', 12),
(2018, 5, '2023-12-10 11:00:00', 12),
(2019, 5, '2023-12-10 12:00:00', 12),
(2020, 5, '2023-12-10 13:00:00', 12),
(2021, 5, '2023-12-10 14:00:00', 12),
(2022, 5, '2023-12-10 15:00:00', 12),
(2023, 5, '2023-12-10 16:00:00', 12),
(2024, 5, '2023-12-10 17:00:00', 12),
(2025, 5, '2023-12-10 18:00:00', 12),
(2026, 5, '2023-12-10 19:00:00', 12),
(2027, 5, '2023-12-10 20:00:00', 12),
(2028, 5, '2023-12-10 21:00:00', 12),
(2029, 5, '2023-12-10 22:00:00', 12),
(2030, 3, '2023-12-11 08:00:00', 13),
(2031, 5, '2023-12-11 09:00:00', 13),
(2032, 6, '2023-12-11 10:00:00', 13),
(2033, 6, '2023-12-11 11:00:00', 13),
(2034, 5, '2023-12-11 12:00:00', 12),
(2035, 5, '2023-12-11 13:00:00', 12),
(2036, 5, '2023-12-11 14:00:00', 12),
(2037, 5, '2023-12-11 15:00:00', 12),
(2038, 5, '2023-12-11 16:00:00', 12),
(2039, 5, '2023-12-11 17:00:00', 12),
(2040, 6, '2023-12-11 18:00:00', 13),
(2041, 6, '2023-12-11 19:00:00', 13),
(2042, 6, '2023-12-11 20:00:00', 13),
(2043, 6, '2023-12-11 21:00:00', 13),
(2044, 5, '2023-12-11 22:00:00', 12),
(2045, 5, '2023-12-12 08:00:00', 12),
(2046, 6, '2023-12-12 09:00:00', 13),
(2047, 5, '2023-12-12 10:00:00', 12),
(2048, 6, '2023-12-12 11:00:00', 13),
(2049, 5, '2023-12-12 12:00:00', 12),
(2050, 5, '2023-12-12 13:00:00', 12),
(2051, 5, '2023-12-12 14:00:00', 12),
(2052, 5, '2023-12-12 15:00:00', 12),
(2053, 5, '2023-12-12 16:00:00', 12),
(2054, 5, '2023-12-12 17:00:00', 12),
(2055, 6, '2023-12-12 18:00:00', 13),
(2056, 6, '2023-12-12 19:00:00', 13),
(2057, 6, '2023-12-12 20:00:00', 13),
(2058, 5, '2023-12-12 21:00:00', 12),
(2059, 5, '2023-12-12 22:00:00', 12),
(2060, 5, '2023-12-13 08:00:00', 12),
(2061, 5, '2023-12-13 09:00:00', 13),
(2062, 6, '2023-12-13 10:00:00', 13),
(2063, 6, '2023-12-13 11:00:00', 13),
(2064, 5, '2023-12-13 12:00:00', 12),
(2065, 5, '2023-12-13 13:00:00', 12),
(2066, 5, '2023-12-13 14:00:00', 12),
(2067, 5, '2023-12-13 15:00:00', 12),
(2068, 5, '2023-12-13 16:00:00', 12),
(2069, 6, '2023-12-13 17:00:00', 12),
(2070, 6, '2023-12-13 18:00:00', 13),
(2071, 6, '2023-12-13 19:00:00', 13),
(2072, 6, '2023-12-13 20:00:00', 13),
(2073, 6, '2023-12-13 21:00:00', 13),
(2074, 5, '2023-12-13 22:00:00', 12),
(2075, 6, '2023-12-14 08:00:00', 13),
(2076, 6, '2023-12-14 09:00:00', 13),
(2077, 5, '2023-12-14 10:00:00', 12),
(2078, 6, '2023-12-14 11:00:00', 13),
(2079, 5, '2023-12-14 12:00:00', 12),
(2080, 5, '2023-12-14 13:00:00', 12),
(2081, 5, '2023-12-14 14:00:00', 12),
(2082, 5, '2023-12-14 15:00:00', 12),
(2083, 5, '2023-12-14 16:00:00', 12),
(2084, 6, '2023-12-14 17:00:00', 13),
(2085, 6, '2023-12-14 18:00:00', 13),
(2086, 6, '2023-12-14 19:00:00', 13),
(2087, 6, '2023-12-14 20:00:00', 13),
(2088, 5, '2023-12-14 21:00:00', 12),
(2089, 5, '2023-12-14 22:00:00', 12),
(2090, 5, '2023-12-15 08:00:00', 12),
(2091, 5, '2023-12-15 09:00:00', 12),
(2092, 5, '2023-12-15 10:00:00', 12),
(2093, 5, '2023-12-15 11:00:00', 12),
(2094, 5, '2023-12-15 12:00:00', 12),
(2095, 5, '2023-12-15 13:00:00', 12),
(2096, 5, '2023-12-15 14:00:00', 12),
(2097, 5, '2023-12-15 15:00:00', 12),
(2098, 5, '2023-12-15 16:00:00', 12),
(2099, 5, '2023-12-15 17:00:00', 12),
(2100, 5, '2023-12-15 18:00:00', 12),
(2101, 5, '2023-12-15 19:00:00', 12),
(2102, 5, '2023-12-15 20:00:00', 12),
(2103, 5, '2023-12-15 21:00:00', 12),
(2104, 5, '2023-12-15 22:00:00', 12),
(2105, 5, '2023-12-16 08:00:00', 12),
(2106, 5, '2023-12-16 09:00:00', 12),
(2107, 5, '2023-12-16 10:00:00', 12),
(2108, 5, '2023-12-16 11:00:00', 12),
(2109, 5, '2023-12-16 12:00:00', 12),
(2110, 5, '2023-12-16 13:00:00', 12),
(2111, 5, '2023-12-16 14:00:00', 12),
(2112, 5, '2023-12-16 15:00:00', 12),
(2113, 5, '2023-12-16 16:00:00', 12),
(2114, 5, '2023-12-16 17:00:00', 12),
(2115, 5, '2023-12-16 18:00:00', 12),
(2116, 5, '2023-12-16 19:00:00', 12),
(2117, 5, '2023-12-16 20:00:00', 12),
(2118, 5, '2023-12-16 21:00:00', 12),
(2119, 5, '2023-12-16 22:00:00', 12),
(2120, 5, '2023-12-17 08:00:00', 12),
(2121, 5, '2023-12-17 09:00:00', 12),
(2122, 5, '2023-12-17 10:00:00', 12),
(2123, 5, '2023-12-17 11:00:00', 12),
(2124, 5, '2023-12-17 12:00:00', 12),
(2125, 5, '2023-12-17 13:00:00', 12),
(2126, 5, '2023-12-17 14:00:00', 12),
(2127, 5, '2023-12-17 15:00:00', 12),
(2128, 5, '2023-12-17 16:00:00', 12),
(2129, 5, '2023-12-17 17:00:00', 12),
(2130, 5, '2023-12-17 18:00:00', 12),
(2131, 5, '2023-12-17 19:00:00', 12),
(2132, 5, '2023-12-17 20:00:00', 12),
(2133, 5, '2023-12-17 21:00:00', 12),
(2134, 5, '2023-12-17 22:00:00', 12),
(2135, 5, '2023-12-18 08:00:00', 12),
(2136, 5, '2023-12-18 09:00:00', 13),
(2137, 6, '2023-12-18 10:00:00', 13),
(2138, 6, '2023-12-18 11:00:00', 13),
(2139, 5, '2023-12-18 12:00:00', 12),
(2140, 5, '2023-12-18 13:00:00', 12),
(2141, 5, '2023-12-18 14:00:00', 12),
(2142, 5, '2023-12-18 15:00:00', 12),
(2143, 5, '2023-12-18 16:00:00', 12),
(2144, 5, '2023-12-18 17:00:00', 12),
(2145, 6, '2023-12-18 18:00:00', 13),
(2146, 6, '2023-12-18 19:00:00', 13),
(2147, 6, '2023-12-18 20:00:00', 13),
(2148, 6, '2023-12-18 21:00:00', 13),
(2149, 5, '2023-12-18 22:00:00', 12),
(2150, 6, '2023-12-19 08:00:00', 13),
(2151, 6, '2023-12-19 09:00:00', 13),
(2152, 5, '2023-12-19 10:00:00', 12),
(2153, 6, '2023-12-19 11:00:00', 13),
(2154, 5, '2023-12-19 12:00:00', 12),
(2155, 5, '2023-12-19 13:00:00', 12),
(2156, 5, '2023-12-19 14:00:00', 12),
(2157, 5, '2023-12-19 15:00:00', 12),
(2158, 5, '2023-12-19 16:00:00', 12),
(2159, 5, '2023-12-19 17:00:00', 12),
(2160, 6, '2023-12-19 18:00:00', 13),
(2161, 6, '2023-12-19 19:00:00', 13),
(2162, 6, '2023-12-19 20:00:00', 13),
(2163, 5, '2023-12-19 21:00:00', 12),
(2164, 5, '2023-12-19 22:00:00', 12),
(2165, 5, '2023-12-20 08:00:00', 12),
(2166, 5, '2023-12-20 09:00:00', 13),
(2167, 6, '2023-12-20 10:00:00', 13),
(2168, 6, '2023-12-20 11:00:00', 13),
(2169, 5, '2023-12-20 12:00:00', 12),
(2170, 5, '2023-12-20 13:00:00', 12),
(2171, 5, '2023-12-20 14:00:00', 12),
(2172, 5, '2023-12-20 15:00:00', 12),
(2173, 5, '2023-12-20 16:00:00', 12),
(2174, 5, '2023-12-20 17:00:00', 12),
(2175, 6, '2023-12-20 18:00:00', 13),
(2176, 6, '2023-12-20 19:00:00', 13),
(2177, 6, '2023-12-20 20:00:00', 13),
(2178, 6, '2023-12-20 21:00:00', 13),
(2179, 5, '2023-12-20 22:00:00', 12),
(2180, 6, '2023-12-21 08:00:00', 13),
(2181, 6, '2023-12-21 09:00:00', 13),
(2182, 5, '2023-12-21 10:00:00', 12),
(2183, 6, '2023-12-21 11:00:00', 13),
(2184, 5, '2023-12-21 12:00:00', 12),
(2185, 5, '2023-12-21 13:00:00', 12),
(2186, 5, '2023-12-21 14:00:00', 12),
(2187, 5, '2023-12-21 15:00:00', 12),
(2188, 5, '2023-12-21 16:00:00', 12),
(2189, 5, '2023-12-21 17:00:00', 12),
(2190, 6, '2023-12-21 18:00:00', 13),
(2191, 6, '2023-12-21 19:00:00', 13),
(2192, 6, '2023-12-21 20:00:00', 13),
(2193, 5, '2023-12-21 21:00:00', 12),
(2194, 5, '2023-12-21 22:00:00', 12),
(2195, 5, '2023-12-22 08:00:00', 12),
(2196, 6, '2023-12-22 09:00:00', 13),
(2197, 6, '2023-12-22 10:00:00', 13),
(2198, 5, '2023-12-22 11:00:00', 12),
(2199, 5, '2023-12-22 12:00:00', 12),
(2200, 5, '2023-12-22 13:00:00', 12),
(2201, 5, '2023-12-22 14:00:00', 12),
(2202, 5, '2023-12-22 15:00:00', 12),
(2203, 5, '2023-12-22 16:00:00', 12),
(2204, 5, '2023-12-22 17:00:00', 12),
(2205, 5, '2023-12-22 18:00:00', 12),
(2206, 5, '2023-12-22 19:00:00', 12),
(2207, 5, '2023-12-22 20:00:00', 12),
(2208, 5, '2023-12-22 21:00:00', 12),
(2209, 5, '2023-12-22 22:00:00', 12),
(2210, 5, '2023-12-23 08:00:00', 12),
(2211, 5, '2023-12-23 09:00:00', 12),
(2212, 5, '2023-12-23 10:00:00', 12),
(2213, 5, '2023-12-23 11:00:00', 12),
(2214, 5, '2023-12-23 12:00:00', 12),
(2215, 5, '2023-12-23 13:00:00', 12),
(2216, 5, '2023-12-23 14:00:00', 12),
(2217, 5, '2023-12-23 15:00:00', 12),
(2218, 5, '2023-12-23 16:00:00', 12),
(2219, 5, '2023-12-23 17:00:00', 12),
(2220, 5, '2023-12-23 18:00:00', 12),
(2221, 5, '2023-12-23 19:00:00', 12),
(2222, 5, '2023-12-23 20:00:00', 12),
(2223, 5, '2023-12-23 21:00:00', 12),
(2224, 5, '2023-12-23 22:00:00', 12),
(2225, 5, '2023-12-24 08:00:00', 12),
(2226, 5, '2023-12-24 09:00:00', 12),
(2227, 5, '2023-12-24 10:00:00', 12),
(2228, 5, '2023-12-24 11:00:00', 12),
(2229, 5, '2023-12-24 12:00:00', 12),
(2230, 5, '2023-12-24 13:00:00', 12),
(2231, 5, '2023-12-24 14:00:00', 12),
(2232, 5, '2023-12-24 15:00:00', 12),
(2233, 5, '2023-12-24 16:00:00', 12),
(2234, 5, '2023-12-24 17:00:00', 12),
(2235, 5, '2023-12-24 18:00:00', 12),
(2236, 5, '2023-12-24 19:00:00', 12),
(2237, 5, '2023-12-24 20:00:00', 12),
(2238, 5, '2023-12-24 21:00:00', 12),
(2239, 5, '2023-12-24 22:00:00', 12),
(2240, 5, '2023-12-25 08:00:00', 12),
(2241, 5, '2023-12-25 09:00:00', 12),
(2242, 5, '2023-12-25 10:00:00', 12),
(2243, 5, '2023-12-25 11:00:00', 12),
(2244, 5, '2023-12-25 12:00:00', 12),
(2245, 5, '2023-12-25 13:00:00', 12),
(2246, 5, '2023-12-25 14:00:00', 12),
(2247, 5, '2023-12-25 15:00:00', 12),
(2248, 5, '2023-12-25 16:00:00', 12),
(2249, 5, '2023-12-25 17:00:00', 12),
(2250, 5, '2023-12-25 18:00:00', 12),
(2251, 5, '2023-12-25 19:00:00', 12),
(2252, 5, '2023-12-25 20:00:00', 12),
(2253, 5, '2023-12-25 21:00:00', 12),
(2254, 5, '2023-12-25 22:00:00', 12),
(2255, 5, '2023-12-26 08:00:00', 13),
(2256, 6, '2023-12-26 09:00:00', 13),
(2257, 5, '2023-12-26 10:00:00', 12),
(2258, 6, '2023-12-26 11:00:00', 13),
(2259, 5, '2023-12-26 12:00:00', 12),
(2260, 5, '2023-12-26 13:00:00', 12),
(2261, 5, '2023-12-26 14:00:00', 12),
(2262, 5, '2023-12-26 15:00:00', 12),
(2263, 5, '2023-12-26 16:00:00', 12),
(2264, 5, '2023-12-26 17:00:00', 12),
(2265, 6, '2023-12-26 18:00:00', 13),
(2266, 6, '2023-12-26 19:00:00', 13),
(2267, 6, '2023-12-26 20:00:00', 13),
(2268, 5, '2023-12-26 21:00:00', 12),
(2269, 5, '2023-12-26 22:00:00', 12),
(2270, 5, '2023-12-27 08:00:00', 12),
(2271, 6, '2023-12-27 09:00:00', 13),
(2272, 6, '2023-12-27 10:00:00', 13),
(2273, 6, '2023-12-27 11:00:00', 13),
(2274, 5, '2023-12-27 12:00:00', 12),
(2275, 5, '2023-12-27 13:00:00', 12),
(2276, 5, '2023-12-27 14:00:00', 12),
(2277, 5, '2023-12-27 15:00:00', 12),
(2278, 5, '2023-12-27 16:00:00', 12),
(2279, 5, '2023-12-27 17:00:00', 12),
(2280, 6, '2023-12-27 18:00:00', 13),
(2281, 6, '2023-12-27 19:00:00', 13),
(2282, 6, '2023-12-27 20:00:00', 13),
(2283, 6, '2023-12-27 21:00:00', 13),
(2284, 5, '2023-12-27 22:00:00', 12),
(2285, 5, '2023-12-28 08:00:00', 13),
(2286, 6, '2023-12-28 09:00:00', 13),
(2287, 3, '2023-12-28 10:00:00', 16),
(2288, 6, '2023-12-28 11:00:00', 13),
(2289, 5, '2023-12-28 12:00:00', 12),
(2290, 5, '2023-12-28 13:00:00', 12),
(2291, 5, '2023-12-28 14:00:00', 12),
(2292, 5, '2023-12-28 15:00:00', 12),
(2293, 5, '2023-12-28 16:00:00', 12),
(2294, 6, '2023-12-28 17:00:00', 13),
(2295, 6, '2023-12-28 18:00:00', 13),
(2296, 6, '2023-12-28 19:00:00', 13),
(2297, 6, '2023-12-28 20:00:00', 13),
(2298, 5, '2023-12-28 21:00:00', 12),
(2299, 5, '2023-12-28 22:00:00', 12),
(2300, 5, '2023-12-29 08:00:00', 12),
(2301, 6, '2023-12-29 09:00:00', 13),
(2302, 6, '2023-12-29 10:00:00', 13),
(2303, 0, '2023-12-29 11:00:00', 18),
(2304, 5, '2023-12-29 12:00:00', 12),
(2305, 5, '2023-12-29 13:00:00', 12),
(2306, 5, '2023-12-29 14:00:00', 12),
(2307, 5, '2023-12-29 15:00:00', 12),
(2308, 5, '2023-12-29 16:00:00', 12),
(2309, 5, '2023-12-29 17:00:00', 12),
(2310, 5, '2023-12-29 18:00:00', 12),
(2311, 5, '2023-12-29 19:00:00', 12),
(2312, 5, '2023-12-29 20:00:00', 12),
(2313, 5, '2023-12-29 21:00:00', 12),
(2314, 5, '2023-12-29 22:00:00', 12),
(2315, 5, '2023-12-30 08:00:00', 12),
(2316, 5, '2023-12-30 09:00:00', 12),
(2317, 5, '2023-12-30 10:00:00', 12),
(2318, 5, '2023-12-30 11:00:00', 12),
(2319, 5, '2023-12-30 12:00:00', 12),
(2320, 5, '2023-12-30 13:00:00', 12),
(2321, 5, '2023-12-30 14:00:00', 12),
(2322, 5, '2023-12-30 15:00:00', 12),
(2323, 5, '2023-12-30 16:00:00', 12),
(2324, 5, '2023-12-30 17:00:00', 12),
(2325, 5, '2023-12-30 18:00:00', 12),
(2326, 5, '2023-12-30 19:00:00', 12),
(2327, 5, '2023-12-30 20:00:00', 12),
(2328, 5, '2023-12-30 21:00:00', 12),
(2329, 5, '2023-12-30 22:00:00', 12),
(2330, 5, '2023-12-31 08:00:00', 12),
(2331, 5, '2023-12-31 09:00:00', 12),
(2332, 5, '2023-12-31 10:00:00', 12),
(2333, 5, '2023-12-31 11:00:00', 12),
(2334, 5, '2023-12-31 12:00:00', 12),
(2335, 5, '2023-12-31 13:00:00', 12),
(2336, 5, '2023-12-31 14:00:00', 12),
(2337, 5, '2023-12-31 15:00:00', 12),
(2338, 5, '2023-12-31 16:00:00', 12),
(2339, 5, '2023-12-31 17:00:00', 12),
(2340, 5, '2023-12-31 18:00:00', 12),
(2341, 5, '2023-12-31 19:00:00', 12),
(2342, 5, '2023-12-31 20:00:00', 12),
(2343, 5, '2023-12-31 21:00:00', 12),
(2344, 5, '2023-12-31 22:00:00', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidad` float(100,2) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_empleado_anota` int(11) DEFAULT NULL,
  `id_clase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `fecha`, `tipo`, `estado`, `cantidad`, `id_cliente`, `id_empleado_anota`, `id_clase`) VALUES
(22, '2023-12-01', 'efectivo', 'pagado', 90.00, 15, 10, 9),
(24, '2023-12-16', 'efectivo', 'pagado', 90.00, 16, 10, 9),
(25, '2023-12-18', 'efectivo', 'pagado', 270.00, 16, 10, 14),
(26, '2023-12-18', 'efectivo', 'pagado', 90.00, 15, 10, 19),
(27, '2023-12-18', 'efectivo', 'pagado', 40.00, 35, 10, 11),
(28, '2023-12-18', 'tarjeta', 'pagado', 60.00, 35, 10, 8),
(29, '2023-12-19', 'efectivo', 'pagado', 115.00, 33, 10, 6),
(30, '2023-12-19', 'efectivo', 'pagado', 22.00, 33, 10, 23),
(31, '2023-12-19', 'efectivo', 'pagado', 105.00, 23, 10, 10),
(32, '2023-12-19', 'tarjeta', 'pagado', 60.00, 24, 10, 8),
(33, '2023-12-19', 'tarjeta', 'pagado', 115.00, 38, 10, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `lugar_nacimiento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patologias` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `rol` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profesion` varchar(255) DEFAULT NULL,
  `experiencia` varchar(255) DEFAULT NULL,
  `resumen` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `password`, `fecha_nacimiento`, `lugar_nacimiento`, `direccion`, `telefono`, `telefono2`, `sexo`, `patologias`, `imagen`, `rol`, `profesion`, `experiencia`, `resumen`) VALUES
(10, 'Marisa', 'Alvarez', 'marisa@gmail.com', '$2y$04$fF9rIJWSBMYQgTwODzBvkud2Sx13wSuSeneDa484axaxghcBpfxL2', '1971-04-07', 'Mendoza, Argentina', 'C/ María Goyri nº30', '888999000', '123666999', 'femenino', '        Ninguna', 'marisa.jpg', 'admin', 'Directora y Monitora: Clases de Máquina, Suelo, Entrenamiento personal y Quiromasaje.', '+10 años', '\r\nMarisa cuenta con una sólida formación en el ámbito de la educación física y el método Pilates, respaldada por títulos y certificaciones obtenidos a lo largo de los años. Además de su título como Profesora Nacional de Educación Física, ha completado diversas certificaciones en Pilates, incluyendo XTENSAL Pilates Comprehensive, Método Pilates Mat, y especializaciones en Pilates para embarazadas, entre otros. También ha participado en eventos internacionales y seminarios sobre Pilates y temas relacionados, demostrando un compromiso continuo con su desarrollo profesional. Además, ha adquirido habilidades en quiromasaje, quiromasaje deportivo, y otras técnicas manuales. Recientemente, ha obtenido certificaciones en análisis y precisión muscular-articular, así como en presoterapia. Su amplio espectro de conocimientos y habilidades la posiciona como una profesional altamente capacitada en el ámbito de la educación física y el bienestar integral.'),
(11, 'Luis', 'García', 'luis@gmail.com', '$2y$04$mjIPw5UNK.JVsmHAQeQ7duHiL1VgTUobcFT.iPKTB587iBZ8mi.V6', '0000-00-00', '', '', '', '', 'masculino', '', 'luis.jpg', 'empleado', 'Monitor de Zésari: Clases de máquina, Suelo y Entreno Personal.', '5 años', 'Luis ha completado una amplia variedad de cursos de formación en el Método Pilates y disciplinas relacionadas. En abril de 2020, obtuvo certificaciones en Pilates HIIT y Pilates Evidence de la Escuela de Formación de Rafael Humanes. En enero de 2020, completó el Curso Pilates L3 bajo la tutela de David Ortega Benítez. Durante el período 2018-2019, se especializó en diversas áreas del Método Pilates, como Suspensión, Aéreo, Corrector de Espina, Silla y Barril en el Club Deportivo Bubishi en Granada, España. Además, en 2018, adquirió habilidades en Quiromasaje en el Centro Dávila. Su formación también incluye certificaciones en Reformer, Cadillac y MAT dentro del Método Pilates, todas realizadas en el Club Deportivo Bubishi en Granada.'),
(15, 'Antonella', 'Racconto', 'alvareznella45@gmail.com', '$2y$04$2JwLkes2aum1kIZ15dIh7.Ed3p3TxfpZ12R/bpHhpwRQcd73K0MUu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cliente', NULL, NULL, NULL),
(16, 'Amalia', 'Torres Rojas', 'amalia@gmail.com', '$2y$04$A39ijcRxQs.AVQv/RgTcP.EiUgfGGvt3tD3mdw.N/8GnkM5NlEbGG', '0000-00-00', '', '', '', '', 'masculino', '', NULL, 'cliente', '', '', NULL),
(23, 'Amador', 'Osuna Moline', 'amador@gmail.com', '$2y$04$YHK8hubeNiUeu6xjcVsQDusGcPXslNaFkdMsJwlg0u.8LmN1y24f2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cliente', NULL, NULL, NULL),
(24, 'Alicia', 'Predragosa Pulido', 'alicia@gmail.com', '$2y$04$GEXdzmaYyd2N2x7WjSHYI.G6L4CG1x9UwG4kPZcWi9Rv37s8cEV8K', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cliente', NULL, NULL, NULL),
(25, 'Yolanda', 'Cano Alonso', 'yolanda@gmail.com', '$2y$04$lBsF4dbZ33kGjDdg11AT2e64mnmPoz6fpUAISYrodTuMs50XyYHoG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yolanda.jpg', 'empleado', 'Monitora: Clases de máquina y Suelo.', '2 años', 'Yolanda ha continuado su formación en el año 2023 con certificaciones en Pilates, específicamente en Pilates Studio Xtensal y en el Pilates Instituto Internacional de Ciencias Deportivas. Además, obtuvo la certificación como Instructora de Yoga en 2022 a través de la Escuela Internacional de Yoga. Previamente, en 2020, completó la formación como Técnica en Anatomía Patológica y Citodiagnóstico en Campus Formación. Esta combinación de certificaciones sugiere una amplia gama de habilidades en los campos de Pilates, yoga y anatomía patológica.'),
(26, 'Marta', 'Fernández Garrido', 'marta@gmail.com', '$2y$04$0B2GoDsEjgH//rtTM1L8sOJK4PhG.ntbZvaulWM7gGk0/NpW3.XaG', '0000-00-00', 'fdfdf', 'dfdfa', 'afafaf', 'fafadfa', 'femenino', '', 'marta.jpg', 'empleado', 'Recepcionista', '8 años', 'Marta es una recepcionista altamente capacitada con un historial probado en brindar una atención al cliente excepcional. \r\n'),
(31, 'Pepe', 'García', 'pepote@gmail.com', '$2y$04$JFTMxMCnYFg1WFwsPCv.iew4Ku/TWD0ZnXksy.Pf.ZW.I5wKkwGh2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cliente', NULL, NULL, NULL),
(32, 'Lola', 'Lopez', 'loli@gmail.com', '$2y$04$661vKemEp.UKKJslFkkbTOdzxBjhP/QXw0DksorWORhkpjxVyDjiW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cliente', NULL, NULL, NULL),
(33, 'Alejandro', 'Perez', 'alejandro@gmail.com', '$2y$04$RzUx/PObMS.CXRxQwuPmSOZuFBOcTYUweS2EyUNAoz4v2Zdw1eoCa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cliente', NULL, NULL, NULL),
(35, 'Pedro', 'Pascual', 'pedro@gmail.com', '$2y$04$WRHytzWbCrLA9sFeYyOcgOqrKhypJH8iLaBhhdY2OjgOWHiWyW/ti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cliente', NULL, NULL, NULL),
(36, 'Joseph', 'Rudolph', 'joseph@gmail.com', '$2y$04$8cS1wQJrxz4UYgMuboAu8O1Y.VT2eP9HzSmPgU7wZ0zPxiWGphUfm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cliente', NULL, NULL, NULL),
(37, 'Admin', 'Admin', 'admin@gmail.com', '$2y$04$B8GbHNQGzBXRGfrv9TsQKO2kbXxUs2BJQtgL/Ep0gBbLurc4zjYmO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', NULL, NULL, NULL),
(38, 'Loco', 'Loco', 'loco@gmail.com', '$2y$04$9tDH1kPnm/SEFLotSHAi.ebtYpWCDmhqLvfaKeBlYh19o/MeQWKOS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cliente', NULL, NULL, NULL),
(40, 'Lucas', 'Loaoos', 'lucas@gmail.com', '$2y$04$nfvs3R6U9aWDqThVwJ4OCO9Eea3svw0wcxK8OEeWqKfWCY9pE8dSu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cliente', NULL, NULL, NULL),
(41, 'Pedro', 'Admin', 'ania@gmail.com', '$2y$04$KvYlt1RJMTT2Cj1ho1w67u9sKQ4XcdsclIuxABjJYe/LDPr16ZOxq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cliente', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apuntado`
--
ALTER TABLE `apuntado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_apuntado_cliente` (`id_cliente`),
  ADD KEY `fk_apuntado_horario` (`id_horario`);

--
-- Indices de la tabla `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_blog` (`id_usuario_empleado`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clases_profesor` (`id_usuario_profesor`),
  ADD KEY `fk_clases_categoria` (`id_categoria`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoria_horario` (`id_categoria`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pagos_clientes` (`id_cliente`),
  ADD KEY `fk_pagos_empleados` (`id_empleado_anota`),
  ADD KEY `fk_pagos_clases` (`id_clase`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apuntado`
--
ALTER TABLE `apuntado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3647;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `apuntado`
--
ALTER TABLE `apuntado`
  ADD CONSTRAINT `fk_apuntado_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_apuntado_horario` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id`);

--
-- Filtros para la tabla `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `fk_usuario_blog` FOREIGN KEY (`id_usuario_empleado`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `fk_clases_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `fk_clases_profesor` FOREIGN KEY (`id_usuario_profesor`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `fk_categoria_horario` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `fk_pagos_clases` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id`),
  ADD CONSTRAINT `fk_pagos_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_pagos_empleados` FOREIGN KEY (`id_empleado_anota`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
