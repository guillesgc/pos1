-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-04-2018 a las 14:30:28
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pos1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE IF NOT EXISTS `agenda` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `glosa` text COLLATE utf8_spanish_ci NOT NULL,
  `tipo_agenda` int(11) NOT NULL,
  `boletin` int(11) NOT NULL,
  `fecha_evento` date NOT NULL,
  `activo` int(11) NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `glosa`, `tipo_agenda`, `boletin`, `fecha_evento`, `activo`, `hora`) VALUES
(1, 'sepultacion de los restos de miguel de servantes en fraccion jardin AA-70', 1, 195457, '2018-03-26', 1, '14:30:00'),
(3, 'SEPULTACION DE LOS RESTOS DE MI AMIGO T/A 35-3-3', 1, 195874, '2018-03-26', 2, '08:45:00'),
(5, 'retiro t/a 23-6-2', 2, 195887, '2018-05-26', 1, '10:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(1, 'BÓVEDAS NICHO', '2018-03-17 16:29:27'),
(2, 'DERECHOS DE INSTALACIONES', '2018-03-17 16:29:34'),
(3, 'INHUMACIONES ', '2018-02-25 21:13:51'),
(4, 'RENOVACIONES', '2018-02-25 21:14:04'),
(5, 'PEAJES', '2018-02-25 21:14:13'),
(6, 'EXHUMACIONES Y TRASLADOS', '2018-02-25 21:14:24'),
(7, 'OTROS', '2018-02-25 21:14:38'),
(8, 'DERECHOS DE CONSTRUCCION', '2018-02-25 21:14:51'),
(9, 'DESCUENTO PERSONAL', '2018-02-25 21:15:02'),
(10, 'VENTAS TERRENO', '2018-02-25 21:15:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cementerios`
--

DROP TABLE IF EXISTS `cementerios`;
CREATE TABLE IF NOT EXISTS `cementerios` (
  `id_cementerio` int(11) NOT NULL,
  `cementerio` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_cementerio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cementerios`
--

INSERT INTO `cementerios` (`id_cementerio`, `cementerio`) VALUES
(1, 'Cementerio 1'),
(2, 'Cementerio 2'),
(3, 'Cementerio 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `compras` int(11) NOT NULL,
  `ultima_compra` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `compras`, `ultima_compra`, `fecha`) VALUES
(3, 'Juan Villegas', 2147483647, 'juan@hotmail.com', '(300) 341-2345', 'Calle 23 # 45 - 56', '1980-11-02', 9, '2018-02-20 16:16:43', '2018-02-20 21:16:43'),
(4, 'Pedro Pérez', 2147483647, 'pedro@gmail.com', '(399) 876-5432', 'Calle 34 N33 -56', '1970-08-07', 2, '2017-12-26 19:27:42', '2018-02-26 01:53:41'),
(5, 'Miguel Murillo', 325235235, 'miguel@hotmail.com', '(254) 545-3446', 'calle 34 # 34 - 23', '1976-03-04', 22, '2017-12-26 19:27:13', '2018-02-26 01:53:44'),
(6, 'Margarita Londoño', 34565432, 'margarita@hotmail.com', '(344) 345-6678', 'Calle 45 # 34 - 56', '1976-11-30', 7, '2017-12-26 19:26:51', '2018-02-26 01:53:48'),
(7, 'Julian Ramirez', 786786545, 'julian@hotmail.com', '(675) 674-5453', 'Carrera 45 # 54 - 56', '1980-04-05', 14, '2017-12-26 17:26:28', '2017-12-26 22:26:28'),
(8, 'Stella Jaramillo', 65756735, 'stella@gmail.com', '(435) 346-3463', 'Carrera 34 # 45- 56', '1956-06-05', 9, '2017-12-26 17:25:55', '2017-12-26 22:25:55'),
(9, 'Eduardo López', 2147483647, 'eduardo@gmail.com', '(534) 634-6565', 'Carrera 67 # 45sur', '1978-03-04', 27, '2018-03-27 15:10:25', '2018-03-27 20:10:25'),
(10, 'Ximena Restrepo', 436346346, 'ximena@gmail.com', '(543) 463-4634', 'calle 45 # 23 - 45', '1956-03-04', 20, '2018-02-20 16:17:59', '2018-02-20 21:17:59'),
(11, 'David Guzman', 43634643, 'david@hotmail.com', '(354) 574-5634', 'carrera 45 # 45 ', '1967-05-04', 85, '2018-03-27 14:13:59', '2018-03-27 19:13:59'),
(12, 'Gonzalo Pérez', 436346346, 'gonzalo@yahoo.com', '(235) 346-3464', 'Carrera 34 # 56 - 34', '1967-08-09', 26, '2018-03-27 15:12:25', '2018-03-27 20:12:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creditos`
--

DROP TABLE IF EXISTS `creditos`;
CREATE TABLE IF NOT EXISTS `creditos` (
  `id_credito` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `fecha_pago` date NOT NULL,
  `detalle` text COLLATE utf8_spanish_ci NOT NULL,
  `pie` int(11) NOT NULL,
  `numcuotas` int(11) NOT NULL,
  `boletin` int(11) NOT NULL,
  `valor_credito` int(11) NOT NULL,
  `valor_cuota` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_credito`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `creditos`
--

INSERT INTO `creditos` (`id_credito`, `id_cliente`, `fecha_pago`, `detalle`, `pie`, `numcuotas`, `boletin`, `valor_credito`, `valor_cuota`, `estado`) VALUES
(1, 11, '2019-01-01', 'tienes que pagar', 10000, 5, 1000, 100000, 1000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuartel_cuerpos`
--

DROP TABLE IF EXISTS `cuartel_cuerpos`;
CREATE TABLE IF NOT EXISTS `cuartel_cuerpos` (
  `id_cuartel_cuerpo` int(11) NOT NULL,
  `tipo_sep` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `id_sociedad` int(11) NOT NULL,
  `id_cementerio` int(11) NOT NULL,
  PRIMARY KEY (`id_cuartel_cuerpo`),
  KEY `FK_tipo_sepultura` (`tipo_sep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cuartel_cuerpos`
--

INSERT INTO `cuartel_cuerpos` (`tipo_sep`, `nombre`, `id_sociedad`, `id_cementerio`) VALUES
(2, 'PASEO JOVITA', 0, 3),
(1, 'J-A', 0, 3),
(1, 'J-B', 0, 3),
(1, 'N-N', 0, 3),
(1, 'BF-1', 0, 3),
(1, 'BF-2', 0, 3),
(1, 'BF-3', 0, 3),
(1, 'BF-4', 0, 3),
(1, 'BF-5', 0, 3),
(1, 'CASCADA SUR', 0, 3),
(1, 'LAS CAMELIAS', 0, 3),
(1, 'N-O', 0, 3),
(1, 'CTEL 4º-A', 0, 3),
(1, 'CTEL 4º-B', 0, 3),
(1, 'LAS TERRAZAS', 0, 3),
(1, 'LA PERGOLA', 0, 3),
(1, 'N-M', 0, 3),
(1, 'N-Ñ', 0, 3),
(1, 'H-A', 0, 3),
(1, 'H-B', 0, 3),
(1, 'H-C', 0, 3),
(1, 'H-D', 0, 3),
(1, 'H-E', 0, 3),
(1, 'H-F', 0, 3),
(1, 'H-G', 0, 3),
(1, 'N-A', 0, 3),
(1, 'N-B', 0, 3),
(1, 'N-C', 0, 3),
(1, 'N-D', 0, 3),
(1, 'N-E', 0, 3),
(1, 'N-F', 0, 3),
(1, 'N-H', 0, 3),
(1, 'N-G', 0, 3),
(1, 'CASCADA ORIENTE', 0, 3),
(1, 'VISTA AL MAR', 0, 3),
(1, 'H-H', 0, 3),
(1, 'EL ALBA', 0, 3),
(1, 'CASCADA NORTE', 0, 3),
(1, 'N-I', 0, 3),
(1, 'N-J', 0, 3),
(1, 'N-K', 0, 3),
(1, 'N-L', 0, 3),
(1, 'KL-A', 0, 3),
(1, 'KL-B', 0, 3),
(1, 'KL-C', 0, 3),
(1, 'KL-D', 0, 3),
(1, 'KL-I', 0, 3),
(1, 'KL-K', 0, 3),
(1, 'KL-L', 0, 3),
(1, 'KL-M', 0, 3),
(1, 'KL-E', 0, 3),
(1, 'KL-H', 0, 3),
(1, 'KL-F', 0, 3),
(1, 'KL-J', 0, 3),
(1, 'M-A', 0, 3),
(1, 'M-B', 0, 3),
(1, 'M-C', 0, 3),
(1, 'M-E', 0, 3),
(1, '1º MURALLA', 0, 3),
(1, 'CTEL 2º', 0, 3),
(1, 'CTEL 2º MAR', 0, 3),
(1, 'CTEL 3º', 0, 3),
(1, 'CTEL 5º', 0, 3),
(1, 'CTEL 8º-A', 0, 3),
(1, 'CTEL 8º-B', 0, 3),
(1, 'CTEL 6º', 0, 3),
(2, 'LAS CASCADA', 0, 3),
(2, 'CTEL 2º', 0, 3),
(2, 'LAS CAMELIAS', 0, 3),
(2, 'CTEL E LAS ROSAS', 0, 3),
(2, 'DE LA FUENTE', 0, 3),
(2, '1º-B', 0, 3),
(2, 'CTEL 8º', 0, 3),
(2, 'VISTA AL MAR', 0, 3),
(2, 'CTEL A', 0, 3),
(2, 'CTEL B', 0, 3),
(2, 'CTEL C', 0, 3),
(2, 'CTEL D', 0, 3),
(2, 'EL ALBA', 0, 3),
(2, 'EL MIRADOR', 0, 3),
(2, 'CTEL 1º', 0, 3),
(2, 'CTEL 4º', 0, 3),
(2, 'CTEL 5º', 0, 3),
(2, 'CTEL ENTRADA', 0, 3),
(2, 'CTEL ALEMAN', 0, 3),
(5, 'J-A', 0, 3),
(5, 'J-B', 0, 3),
(5, 'N-N', 0, 3),
(5, 'N-O', 0, 3),
(5, 'CTEL 4º-A', 0, 3),
(5, 'CTEL 4º-B', 0, 3),
(5, 'N-M', 0, 3),
(5, 'N-Ñ', 0, 3),
(5, 'H-A', 0, 3),
(5, 'H-B', 0, 3),
(5, 'H-C', 0, 3),
(5, 'H-D', 0, 3),
(5, 'H-E', 0, 3),
(5, 'H-F', 0, 3),
(5, 'H-G', 0, 3),
(5, 'N-A', 0, 3),
(5, 'N-B', 0, 3),
(5, 'N-C', 0, 3),
(5, 'N-D', 0, 3),
(5, 'N-E', 0, 3),
(5, 'N-F', 0, 3),
(5, 'N-H', 0, 3),
(5, 'N-G', 0, 3),
(5, 'H-H', 0, 3),
(5, 'N-I', 0, 3),
(5, 'N-J', 0, 3),
(5, 'N-K', 0, 3),
(5, 'N-L', 0, 3),
(5, 'KL-A', 0, 3),
(5, 'KL-B', 0, 3),
(5, 'KL-C', 0, 3),
(5, 'KL-D', 0, 3),
(5, 'KL-I', 0, 3),
(5, 'KL-K', 0, 3),
(5, 'KL-L', 0, 3),
(5, 'KL-E', 0, 3),
(5, 'KL-H', 0, 3),
(5, 'KL-F', 0, 3),
(5, 'KL-J', 0, 3),
(5, 'M-A', 0, 3),
(5, 'M-B', 0, 3),
(5, 'M-C', 0, 3),
(5, 'M-D', 0, 3),
(5, 'M-E', 0, 3),
(5, '1º MURALLA', 0, 3),
(5, 'CTEL 2º MAR', 0, 3),
(5, 'CTEL 2º', 0, 3),
(5, 'CTEL 3º', 0, 3),
(5, 'CTEL 5º', 0, 3),
(5, 'M-1', 0, 3),
(5, 'M-2', 0, 3),
(5, 'M-3', 0, 3),
(5, 'M-4', 0, 3),
(5, 'M-5', 0, 3),
(5, 'M-6', 0, 3),
(5, 'CTEL 8º-A', 0, 3),
(5, 'CTEL 8º-B', 0, 3),
(5, 'CTEL 6º', 0, 3),
(6, 'J-A', 0, 3),
(6, 'J-B', 0, 3),
(6, 'N-N', 0, 3),
(6, 'LA CASCADA SUR', 0, 3),
(6, 'N-O', 0, 3),
(6, 'CTEL 4º-A', 0, 3),
(6, 'CTEL 4º-B', 0, 3),
(6, 'LA PERGOLA', 0, 3),
(6, 'N-M', 0, 3),
(6, 'N-Ñ', 0, 3),
(6, 'H-A (O-B)', 0, 3),
(6, 'H-A (O-A)', 0, 3),
(6, 'H-A (P-A)', 0, 3),
(6, 'H-A (P-B)', 0, 3),
(6, 'H-A (O-M)', 0, 3),
(6, 'H-A (P-M)', 0, 3),
(6, 'H-A (O-M)', 0, 3),
(6, 'H-B (P-A)', 0, 3),
(6, 'H-B (P-B)', 0, 3),
(6, 'H-B (P-M)', 0, 3),
(6, 'H-B (O-B)', 0, 3),
(6, 'H-B (O-A)', 0, 3),
(6, 'H-C (O-B)', 0, 3),
(6, 'H-C (O-A)', 0, 3),
(6, 'H-C (P-M)', 0, 3),
(6, 'H-C (O-M)', 0, 3),
(6, 'H-C (P-B)', 0, 3),
(6, 'H-C (P-A)', 0, 3),
(6, 'H-E', 0, 3),
(6, 'H-F', 0, 3),
(6, 'H-G', 0, 3),
(6, 'N-E', 0, 3),
(6, 'N-F', 0, 3),
(6, 'MAITENES A', 0, 3),
(6, 'MAITENES B', 0, 3),
(6, 'CONJUNTO FARO 1', 0, 3),
(6, 'CONJUNTO FARO 2', 0, 3),
(6, 'CONJUNTO FARO 3', 0, 3),
(6, 'VISTA AL MAR', 0, 3),
(6, 'N-G', 0, 3),
(6, 'M-E', 0, 3),
(6, 'M7-A', 0, 3),
(6, 'M7-B', 0, 3),
(6, 'M7-C', 0, 3),
(6, 'M7-D', 0, 3),
(6, 'M7-E', 0, 3),
(6, 'M7-F', 0, 3),
(6, 'M7-G', 0, 3),
(6, 'M7-H', 0, 3),
(6, 'M7-I', 0, 3),
(6, 'M7-J', 0, 3),
(6, 'M7-K', 0, 3),
(6, 'M7-L', 0, 3),
(6, 'M7-LL', 0, 3),
(6, 'M7-M', 0, 3),
(6, 'M7-N', 0, 3),
(6, 'M7-O', 0, 3),
(6, 'M7-P', 0, 3),
(6, 'M7-Q', 0, 3),
(6, 'M7-R', 0, 3),
(6, 'M7-S', 0, 3),
(6, 'M7-T', 0, 3),
(6, 'M7-U', 0, 3),
(6, 'M7-V', 0, 3),
(6, 'M7-W', 0, 3),
(6, 'M7-X', 0, 3),
(6, 'M7-Y', 0, 3),
(6, 'M7-Z', 0, 3),
(6, 'KL', 0, 3),
(6, 'CTEL 1º', 0, 3),
(6, 'N-A', 0, 3),
(6, 'N-B', 0, 3),
(6, 'N-C', 0, 3),
(6, 'N-D', 0, 3),
(6, 'N-H', 0, 3),
(6, 'N-I', 0, 3),
(6, 'H-H', 0, 3),
(6, 'M-F', 0, 3),
(6, 'CASCADA ORIENTE', 0, 3),
(6, 'M7 NORTE', 0, 3),
(6, 'EL ALBA', 0, 3),
(6, 'CASCADA NORTE', 0, 3),
(6, 'N-J', 0, 3),
(6, 'N-K', 0, 3),
(6, 'N-L', 0, 3),
(6, 'M-A', 0, 3),
(6, 'M-B', 0, 3),
(6, 'M-C', 0, 3),
(6, 'M-D', 0, 3),
(6, 'KL-G', 0, 3),
(6, 'KL-H', 0, 3),
(6, 'KL-I', 0, 3),
(6, 'KL-J', 0, 3),
(6, 'KL-L', 0, 3),
(6, 'KL-K', 0, 3),
(6, 'KL-M', 0, 3),
(4, 'A', 0, 3),
(4, 'B', 0, 3),
(4, 'C', 0, 3),
(4, 'D', 0, 3),
(4, 'E', 0, 3),
(4, 'F', 0, 3),
(4, 'G', 0, 3),
(4, 'H', 0, 3),
(4, 'I', 0, 3),
(4, 'J', 0, 3),
(4, 'K', 0, 3),
(4, 'L', 0, 3),
(4, 'M', 0, 3),
(4, 'N', 0, 3),
(4, 'Ñ', 0, 3),
(4, 'O', 0, 3),
(4, 'P', 0, 3),
(4, 'Q', 0, 3),
(4, 'R', 0, 3),
(4, 'S', 0, 3),
(4, 'T', 0, 3),
(4, 'U', 0, 3),
(4, 'V', 0, 3),
(4, 'W', 0, 3),
(4, 'X', 0, 3),
(4, 'Y', 0, 3),
(4, 'Z', 0, 3),
(1, 'MAITENES A', 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `difuntos`
--

DROP TABLE IF EXISTS `difuntos`;
CREATE TABLE IF NOT EXISTS `difuntos` (
  `id_difunto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `apellido_paterno` text COLLATE utf8_spanish_ci NOT NULL,
  `apellido_materno` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_defuncion` date NOT NULL,
  `fecha_sepultacion` date NOT NULL,
  `causa_muerte` text COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` int(11) NOT NULL,
  `inscripcion` int(11) NOT NULL,
  `circunscripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `id_sepultura` int(11) NOT NULL,
  `id_boletin` int(11) NOT NULL,
  `rut` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_difunto`),
  KEY `FK_id_sepultura` (`id_sepultura`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `difuntos`
--

INSERT INTO `difuntos` (`id_difunto`, `nombre`, `apellido_paterno`, `apellido_materno`, `fecha_defuncion`, `fecha_sepultacion`, `causa_muerte`, `edad`, `sexo`, `inscripcion`, `circunscripcion`, `id_sepultura`, `id_boletin`, `rut`) VALUES
(4, 'Guillermo', 'Guerrero', 'Cabrera', '2018-01-01', '2018-01-02', 'otra cosa', 45, 1, 101, 'Viña del Mar', 1, 19213, '173537883'),
(5, 'Eric', 'Goldberg', 'Villaroel', '2018-01-01', '2018-01-02', 'infarto', 7, 1, 5, 'Viña del Mar', 1, 6, '14627833-7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`) VALUES
(1, 'DISPONIBLE'),
(2, 'VENCIDO'),
(3, 'PERPETUO'),
(4, 'TEMPORAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` float NOT NULL,
  `descripcion` int(11) NOT NULL,
  `servicio` int(11) NOT NULL,
  `id_centro_costo` int(11) NOT NULL,
  PRIMARY KEY (`id_item`),
  KEY `FK_centro_costo` (`id_centro_costo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id_item`, `nombre`, `stock`, `precio`, `descripcion`, `servicio`, `id_centro_costo`) VALUES
(1, 'arriendo 10 años adulto hta 4ta corrida', 0, 9.64, 0, 0, 1),
(2, 'boveda nicho familiar (4 personas)', 0, 87.73, 0, 0, 1),
(3, 'sepultacion boveda nicho hta 3ra generacion', 0, 1.36, 0, 0, 3),
(4, 'arriendo 10 años adulto sobre 4ta corrida', 0, 5.39, 0, 0, 1),
(5, 'subarriendo nicho reduccion', 0, 2.18, 0, 0, 1),
(6, 'nicho adulto perpetuo', 0, 16.78, 0, 0, 1),
(7, 'emboquillado nicho  reduccion', 0, 0.14, 0, 0, 7),
(8, 'emboquillado nicho adulto y bovedas', 0, 0.14, 0, 0, 7),
(9, 'emboquillado lateral sepultura de familia', 0, 0.38, 0, 0, 7),
(10, 'tapa cemento nicho reduccion', 0, 0.14, 0, 0, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meses`
--

DROP TABLE IF EXISTS `meses`;
CREATE TABLE IF NOT EXISTS `meses` (
  `id_mes` int(11) NOT NULL AUTO_INCREMENT,
  `mes` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_mes`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `meses`
--

INSERT INTO `meses` (`id_mes`, `mes`) VALUES
(1, 'ENERO'),
(2, 'FEBRERO'),
(3, 'MARZO'),
(4, 'ABRIL'),
(5, 'MAYO'),
(6, 'JUNIO'),
(7, 'JULIO'),
(8, 'AGOSTO'),
(9, 'SEPTIEMBRE'),
(10, 'OCTUBRE'),
(11, 'NOVIEMBRE'),
(12, 'DICIEMBRE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`) VALUES
(1, 1, '101', 'Aspiradora Industrial ', 'vistas/img/productos/101/105.png', 13, 1000, 1200, 2, '2017-12-24 01:11:04'),
(2, 1, '102', 'Plato Flotante para Allanadora', 'vistas/img/productos/102/940.jpg', -1, 4500, 6300, 5, '2018-03-27 20:12:25'),
(3, 1, '103', 'Compresor de Aire para pintura', 'vistas/img/productos/103/763.jpg', -1, 3000, 4200, 5, '2018-03-27 20:10:24'),
(4, 1, '104', 'Cortadora de Adobe sin Disco ', 'vistas/img/productos/104/957.jpg', 19, 4000, 5600, 1, '2018-02-26 01:53:48'),
(5, 1, '105', 'Cortadora de Piso sin Disco ', 'vistas/img/productos/105/630.jpg', -1, 1540, 2156, 6, '2018-03-27 20:10:24'),
(6, 1, '106', 'Disco Punta Diamante ', 'vistas/img/productos/106/635.jpg', -1, 1100, 1540, 7, '2018-03-27 20:10:24'),
(7, 1, '107', 'Extractor de Aire ', 'vistas/img/productos/107/848.jpg', 14, 1540, 2156, 6, '2018-02-26 01:53:41'),
(8, 1, '108', 'Guadañadora ', 'vistas/img/productos/108/163.jpg', 14, 1540, 2156, 6, '2018-02-26 01:53:36'),
(9, 1, '109', 'Hidrolavadora Eléctrica ', 'vistas/img/productos/109/769.jpg', 16, 2600, 3640, 4, '2018-02-26 01:53:36'),
(10, 1, '110', 'Hidrolavadora Gasolina', 'vistas/img/productos/110/582.jpg', 18, 2210, 3094, 2, '2017-12-26 15:05:09'),
(11, 1, '111', 'Motobomba a Gasolina', 'vistas/img/productos/default/anonymous.png', 20, 2860, 4004, 0, '2017-12-21 21:56:28'),
(12, 1, '112', 'Motobomba El?ctrica', 'vistas/img/productos/default/anonymous.png', 20, 2400, 3360, 0, '2017-12-21 21:56:28'),
(13, 1, '113', 'Sierra Circular ', 'vistas/img/productos/default/anonymous.png', 20, 1100, 1540, 0, '2017-12-21 21:56:28'),
(14, 1, '114', 'Disco de tugsteno para Sierra circular', 'vistas/img/productos/default/anonymous.png', 20, 4500, 6300, 0, '2017-12-21 21:56:28'),
(15, 1, '115', 'Soldador Electrico ', 'vistas/img/productos/default/anonymous.png', 20, 1980, 2772, 0, '2017-12-21 21:56:28'),
(16, 1, '116', 'Careta para Soldador', 'vistas/img/productos/default/anonymous.png', 20, 4200, 5880, 0, '2017-12-21 21:56:28'),
(17, 1, '117', 'Torre de iluminacion ', 'vistas/img/productos/default/anonymous.png', 20, 1800, 2520, 0, '2017-12-21 21:56:28'),
(18, 2, '201', 'Martillo Demoledor de Piso 110V', 'vistas/img/productos/default/anonymous.png', 20, 5600, 7840, 0, '2017-12-21 21:56:28'),
(19, 2, '202', 'Muela o cincel martillo demoledor piso', 'vistas/img/productos/default/anonymous.png', 20, 9600, 13440, 0, '2017-12-21 21:56:28'),
(20, 2, '203', 'Taladro Demoledor de muro 110V', 'vistas/img/productos/default/anonymous.png', 20, 3850, 5390, 0, '2017-12-21 21:56:28'),
(21, 2, '204', 'Muela o cincel martillo demoledor muro', 'vistas/img/productos/default/anonymous.png', 20, 9600, 13440, 0, '2017-12-21 21:56:28'),
(22, 2, '205', 'Taladro Percutor de 1/2 Madera y Metal', 'vistas/img/productos/default/anonymous.png', 20, 8000, 11200, 0, '2017-12-21 22:28:24'),
(23, 2, '206', 'Taladro Percutor SDS Plus 110V', 'vistas/img/productos/default/anonymous.png', 20, 3900, 5460, 0, '2017-12-21 21:56:28'),
(24, 2, '207', 'Taladro Percutor SDS Max 110V (Mineria)', 'vistas/img/productos/default/anonymous.png', 20, 4600, 6440, 0, '2017-12-21 21:56:28'),
(25, 3, '301', 'Andamio colgante', 'vistas/img/productos/default/anonymous.png', 20, 1440, 2016, 0, '2017-12-21 21:56:28'),
(26, 3, '302', 'Distanciador andamio colgante', 'vistas/img/productos/default/anonymous.png', 20, 1600, 2240, 0, '2017-12-21 21:56:28'),
(27, 3, '303', 'Marco andamio modular ', 'vistas/img/productos/default/anonymous.png', 20, 900, 1260, 0, '2017-12-21 21:56:28'),
(28, 3, '304', 'Marco andamio tijera', 'vistas/img/productos/default/anonymous.png', 20, 100, 140, 0, '2017-12-21 21:56:28'),
(29, 3, '305', 'Tijera para andamio', 'vistas/img/productos/default/anonymous.png', 20, 162, 226, 0, '2017-12-21 21:56:28'),
(30, 3, '306', 'Escalera interna para andamio', 'vistas/img/productos/default/anonymous.png', 20, 270, 378, 0, '2017-12-21 21:56:28'),
(31, 3, '307', 'Pasamanos de seguridad', 'vistas/img/productos/default/anonymous.png', 20, 75, 105, 0, '2017-12-21 21:56:28'),
(32, 3, '308', 'Rueda giratoria para andamio', 'vistas/img/productos/default/anonymous.png', 20, 168, 235, 0, '2017-12-21 21:56:28'),
(33, 3, '309', 'Arnes de seguridad', 'vistas/img/productos/default/anonymous.png', 20, 1750, 2450, 0, '2017-12-21 21:56:28'),
(34, 3, '310', 'Eslinga para arnes', 'vistas/img/productos/default/anonymous.png', 20, 175, 245, 0, '2017-12-21 21:56:28'),
(35, 3, '311', 'Plataforma Met?lica', 'vistas/img/productos/default/anonymous.png', 20, 420, 588, 0, '2017-12-21 21:56:28'),
(36, 4, '401', 'Planta Electrica Diesel 6 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3500, 4900, 0, '2017-12-21 21:56:28'),
(37, 4, '402', 'Planta Electrica Diesel 10 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3550, 4970, 0, '2017-12-21 21:56:28'),
(38, 4, '403', 'Planta Electrica Diesel 20 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3600, 5040, 0, '2017-12-21 21:56:28'),
(39, 4, '404', 'Planta Electrica Diesel 30 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3650, 5110, 0, '2017-12-21 21:56:28'),
(40, 4, '405', 'Planta Electrica Diesel 60 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3700, 5180, 0, '2017-12-21 21:56:28'),
(41, 4, '406', 'Planta Electrica Diesel 75 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3750, 5250, 0, '2017-12-21 21:56:28'),
(42, 4, '407', 'Planta Electrica Diesel 100 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3800, 5320, 0, '2017-12-21 21:56:28'),
(43, 4, '408', 'Planta Electrica Diesel 120 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3850, 5390, 0, '2017-12-21 21:56:28'),
(44, 5, '501', 'Escalera de Tijera Aluminio ', 'vistas/img/productos/default/anonymous.png', 20, 350, 490, 0, '2017-12-21 21:56:28'),
(45, 5, '502', 'Extension Electrica ', 'vistas/img/productos/default/anonymous.png', 20, 370, 518, 0, '2017-12-21 21:56:28'),
(46, 5, '503', 'Gato tensor', 'vistas/img/productos/default/anonymous.png', 20, 380, 532, 0, '2017-12-21 21:56:28'),
(47, 5, '504', 'Lamina Cubre Brecha ', 'vistas/img/productos/default/anonymous.png', 20, 380, 532, 0, '2017-12-21 21:56:28'),
(48, 5, '505', 'Llave de Tubo', 'vistas/img/productos/default/anonymous.png', 20, 480, 672, 0, '2017-12-21 21:56:28'),
(49, 5, '506', 'Manila por Metro', 'vistas/img/productos/default/anonymous.png', 20, 600, 840, 0, '2017-12-21 21:56:28'),
(50, 5, '507', 'Polea 2 canales', 'vistas/img/productos/default/anonymous.png', 20, 900, 1260, 0, '2017-12-21 21:56:28'),
(51, 5, '508', 'Tensor', 'vistas/img/productos/508/500.jpg', 19, 100, 140, 1, '2017-12-26 22:26:51'),
(52, 5, '509', 'Bascula ', 'vistas/img/productos/509/878.jpg', 12, 130, 182, 8, '2017-12-26 22:26:51'),
(53, 5, '510', 'Bomba Hidrostatica', 'vistas/img/productos/510/870.jpg', 8, 770, 1078, 12, '2017-12-26 22:26:51'),
(54, 5, '511', 'Chapeta', 'vistas/img/productos/511/239.jpg', 16, 660, 924, 4, '2017-12-26 22:27:42'),
(55, 5, '512', 'Cilindro muestra de concreto', 'vistas/img/productos/512/266.jpg', 15, 400, 560, 5, '2018-02-20 21:17:59'),
(56, 5, '513', 'Cizalla de Palanca', 'vistas/img/productos/513/445.jpg', 2, 450, 630, 18, '2018-02-20 21:17:59'),
(57, 5, '514', 'Cizalla de Tijera', 'vistas/img/productos/514/249.jpg', 20, 580, 812, 13, '2017-12-27 04:29:22'),
(58, 5, '515', 'Coche llanta neumatica', 'vistas/img/productos/515/174.jpg', 17, 420, 588, 3, '2017-12-27 00:30:12'),
(59, 5, '516', 'Cono slump', 'vistas/img/productos/516/228.jpg', 14, 140, 196, 6, '2018-02-20 21:16:43'),
(60, 5, '517', 'Cortadora de Baldosin', 'vistas/img/productos/517/746.jpg', 14, 930, 1302, 8, '2018-02-25 21:49:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sepulturas`
--

DROP TABLE IF EXISTS `sepulturas`;
CREATE TABLE IF NOT EXISTS `sepulturas` (
  `id_sepultura` int(11) NOT NULL AUTO_INCREMENT,
  `orden` int(11) NOT NULL,
  `numero_sepultura` text COLLATE utf8_spanish_ci NOT NULL,
  `id_cuartel_cuerpo` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `activo` int(11) NOT NULL,
  `id_cementerio` int(11) NOT NULL,
  `corrida` int(11) NOT NULL,
  `piso` int(11) NOT NULL,
  PRIMARY KEY (`id_sepultura`),
  KEY `FK_cuartel_cuerpo` (`id_cuartel_cuerpo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sepulturas`
--

INSERT INTO `sepulturas` (`id_sepultura`, `orden`, `numero_sepultura`, `id_cuartel_cuerpo`, `estado`, `capacidad`, `activo`, `id_cementerio`, `corrida`, `piso`) VALUES
(1, 101, '101', 1, 3, 4, 1, 3, 1, 1),
(2, 102, '102', 18, 2, 4, 1, 3, 1, 1),
(3, 12, '103', 2, 1, 4, 1, 3, 10, 2),
(4, 4, '104', 3, 1, 1, 1, 3, 2, 1),
(5, 8, '105', 4, 1, 2, 1, 3, 1, 1),
(6, 2, '106', 5, 1, 3, 1, 3, 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_sepultura`
--

DROP TABLE IF EXISTS `tipo_sepultura`;
CREATE TABLE IF NOT EXISTS `tipo_sepultura` (
  `id_tipo_sepultura` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `familiar` int(11) NOT NULL,
  `id_centro_costo` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  PRIMARY KEY (`id_tipo_sepultura`),
  KEY `FK_ccosto` (`id_centro_costo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_sepultura`
--

INSERT INTO `tipo_sepultura` (`id_tipo_sepultura`, `nombre`, `familiar`, `id_centro_costo`, `precio`) VALUES
(1, 'BOVEDA NICHO', 1, 1, 0),
(2, 'SEPULTURA DE FAMILIA', 1, 1, 0),
(3, 'PARQUE PLAYA ANCHA', 1, 1, 0),
(4, 'PARQUE EL CONSUELO', 1, 1, 0),
(5, 'NICHO ADULTO', 2, 1, 0),
(6, 'NICHO REDUCCION', 2, 1, 0),
(7, 'TIERRA', 2, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'Administrador', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', 'vistas/img/usuarios/admin/191.jpg', 1, '2018-04-17 07:20:43', '2018-04-17 12:20:43'),
(60, 'Cristina Guerra', 'cguerra', '$2a$07$asxx54ahjppf45sd87a5au39vGJnQWiQys1oVPKiO3nTGpwMpyyZK', 'Especial', '', 1, '2018-02-25 20:42:33', '2018-02-26 01:42:33'),
(61, 'Veronica Paiva', 'vpaiva', '$2a$07$asxx54ahjppf45sd87a5auOX4847hAR9mA3KoPqGWa.nKLtInOib6', 'Especial', '', 1, '2018-02-25 21:06:35', '2018-02-26 02:06:35'),
(62, 'Carlos Pardo', 'cpardo', '$2a$07$asxx54ahjppf45sd87a5auYxkBp/9Hjq9zWF1lUYP1gd4aTASs25i', 'Vendedor', '', 1, '0000-00-00 00:00:00', '2018-02-26 01:39:40'),
(63, 'Patricio Olguin', 'polguin', '$2a$07$asxx54ahjppf45sd87a5auxFCSz19S1OzYqTdQ0kjjas5S3m.YYM6', 'Vendedor', '', 1, '2018-03-24 17:59:23', '2018-03-24 22:59:23'),
(64, 'Cristian Zuñiga', 'czuniga', '$2a$07$asxx54ahjppf45sd87a5auAfXyI4niZj1aiI124CVfH.FCk7YTloO', 'Vendedor', '', 1, '0000-00-00 00:00:00', '2018-02-26 01:40:08'),
(65, 'Eric Goldberg', 'egoldberg', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', '', 1, '2018-02-25 20:42:58', '2018-02-26 01:42:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `utm`
--

DROP TABLE IF EXISTS `utm`;
CREATE TABLE IF NOT EXISTS `utm` (
  `idutm` int(11) NOT NULL AUTO_INCREMENT,
  `mes` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `anno` int(11) NOT NULL,
  PRIMARY KEY (`idutm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `utm`
--

INSERT INTO `utm` (`idutm`, `mes`, `valor`, `anno`) VALUES
(1, 3, 47301, 2018),
(2, 4, 47301, 2018);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text COLLATE utf8_spanish_ci NOT NULL,
  `glosa` text COLLATE utf8_spanish_ci NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `codigo`, `id_cliente`, `id_vendedor`, `productos`, `glosa`, `impuesto`, `neto`, `total`, `metodo_pago`, `fecha`) VALUES
(17, 10001, 3, 1, '[{\"id\":\"1\",\"descripcion\":\"Aspiradora Industrial \",\"cantidad\":\"2\",\"stock\":\"13\",\"precio\":\"1200\",\"total\":\"2400\"},{\"id\":\"2\",\"descripcion\":\"Plato Flotante para Allanadora\",\"cantidad\":\"2\",\"stock\":\"7\",\"precio\":\"6300\",\"total\":\"12600\"},{\"id\":\"3\",\"descripcion\":\"Compresor de Aire para pintura\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"4200\",\"total\":\"4200\"}]', '', 3648, 19200, 22848, 'Efectivo', '2018-02-02 01:11:04'),
(22, 10006, 10, 1, '[{\"id\":\"3\",\"descripcion\":\"Compresor de Aire para pintura\",\"cantidad\":\"1\",\"stock\":\"8\",\"precio\":\"4200\",\"total\":\"4200\"},{\"id\":\"4\",\"descripcion\":\"Cortadora de Adobe sin Disco \",\"cantidad\":\"1\",\"stock\":\"16\",\"precio\":\"5600\",\"total\":\"5600\"},{\"id\":\"5\",\"descripcion\":\"Cortadora de Piso sin Disco \",\"cantidad\":\"3\",\"stock\":\"13\",\"precio\":\"2156\",\"total\":\"6468\"},{\"id\":\"6\",\"descripcion\":\"Disco Punta Diamante \",\"cantidad\":\"1\",\"stock\":\"18\",\"precio\":\"1540\",\"total\":\"1540\"}]', '', 3383.52, 17808, 21191.5, 'Efectivo', '2018-01-26 15:03:22'),
(23, 10007, 9, 1, '[{\"id\":\"6\",\"descripcion\":\"Disco Punta Diamante \",\"cantidad\":\"1\",\"stock\":\"17\",\"precio\":\"1540\",\"total\":\"1540\"},{\"id\":\"7\",\"descripcion\":\"Extractor de Aire \",\"cantidad\":\"1\",\"stock\":\"17\",\"precio\":\"2156\",\"total\":\"2156\"},{\"id\":\"8\",\"descripcion\":\"Guadañadora \",\"cantidad\":\"6\",\"stock\":\"13\",\"precio\":\"2156\",\"total\":\"12936\"},{\"id\":\"9\",\"descripcion\":\"Hidrolavadora Eléctrica \",\"cantidad\":\"1\",\"stock\":\"18\",\"precio\":\"3640\",\"total\":\"3640\"}]', '', 3851.68, 20272, 24123.7, 'TC-357547467346', '2017-11-30 15:03:53'),
(24, 10008, 12, 1, '[{\"id\":\"2\",\"descripcion\":\"Plato Flotante para Allanadora\",\"cantidad\":\"1\",\"stock\":\"6\",\"precio\":\"6300\",\"total\":\"6300\"},{\"id\":\"7\",\"descripcion\":\"Extractor de Aire \",\"cantidad\":\"5\",\"stock\":\"12\",\"precio\":\"2156\",\"total\":\"10780\"},{\"id\":\"6\",\"descripcion\":\"Disco Punta Diamante \",\"cantidad\":\"1\",\"stock\":\"16\",\"precio\":\"1540\",\"total\":\"1540\"},{\"id\":\"9\",\"descripcion\":\"Hidrolavadora Eléctrica \",\"cantidad\":\"1\",\"stock\":\"17\",\"precio\":\"3640\",\"total\":\"3640\"}]', '', 4229.4, 22260, 26489.4, 'TD-35745575', '2017-12-25 15:04:11'),
(25, 10009, 11, 1, '[{\"id\":\"10\",\"descripcion\":\"Hidrolavadora Gasolina\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"3094\",\"total\":\"3094\"},{\"id\":\"9\",\"descripcion\":\"Hidrolavadora Eléctrica \",\"cantidad\":\"1\",\"stock\":\"16\",\"precio\":\"3640\",\"total\":\"3640\"},{\"id\":\"6\",\"descripcion\":\"Disco Punta Diamante \",\"cantidad\":\"1\",\"stock\":\"15\",\"precio\":\"1540\",\"total\":\"1540\"}]', '', 1572.06, 8274, 9846.06, 'TD-5745745745', '2017-08-15 15:04:38'),
(26, 10010, 8, 1, '[{\"id\":\"9\",\"descripcion\":\"Hidrolavadora Eléctrica \",\"cantidad\":\"1\",\"stock\":\"15\",\"precio\":\"3640\",\"total\":\"3640\"},{\"id\":\"10\",\"descripcion\":\"Hidrolavadora Gasolina\",\"cantidad\":\"1\",\"stock\":\"18\",\"precio\":\"3094\",\"total\":\"3094\"}]', '', 1279.46, 6734, 8013.46, 'Efectivo', '2017-12-07 15:05:09'),
(27, 10011, 7, 1, '[{\"id\":\"60\",\"descripcion\":\"Cortadora de Baldosin\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"1302\",\"total\":\"1302\"},{\"id\":\"59\",\"descripcion\":\"Cono slump\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"196\",\"total\":\"196\"},{\"id\":\"58\",\"descripcion\":\"Coche llanta neumatica\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"588\",\"total\":\"588\"},{\"id\":\"57\",\"descripcion\":\"Cizalla de Tijera\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"812\",\"total\":\"812\"}]', '', 550.62, 2898, 3448.62, 'Efectivo', '2017-12-25 22:23:38'),
(28, 10012, 12, 57, '[{\"id\":\"59\",\"descripcion\":\"Cono slump\",\"cantidad\":\"1\",\"stock\":\"18\",\"precio\":\"196\",\"total\":\"196\"},{\"id\":\"58\",\"descripcion\":\"Coche llanta neumatica\",\"cantidad\":\"1\",\"stock\":\"18\",\"precio\":\"588\",\"total\":\"588\"},{\"id\":\"54\",\"descripcion\":\"Chapeta\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"924\",\"total\":\"924\"},{\"id\":\"53\",\"descripcion\":\"Bomba Hidrostatica\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"1078\",\"total\":\"1078\"}]', '', 529.34, 2786, 3315.34, 'TC-3545235235', '2017-12-25 22:24:24'),
(29, 10013, 11, 57, '[{\"id\":\"54\",\"descripcion\":\"Chapeta\",\"cantidad\":\"1\",\"stock\":\"18\",\"precio\":\"924\",\"total\":\"924\"},{\"id\":\"59\",\"descripcion\":\"Cono slump\",\"cantidad\":\"1\",\"stock\":\"17\",\"precio\":\"196\",\"total\":\"196\"},{\"id\":\"60\",\"descripcion\":\"Cortadora de Baldosin\",\"cantidad\":\"5\",\"stock\":\"14\",\"precio\":\"1302\",\"total\":\"6510\"}]', '', 1449.7, 7630, 9079.7, 'TC-425235235235', '2017-12-26 22:24:50'),
(30, 10014, 10, 57, '[{\"id\":\"59\",\"descripcion\":\"Cono slump\",\"cantidad\":\"1\",\"stock\":\"16\",\"precio\":\"196\",\"total\":\"196\"},{\"id\":\"54\",\"descripcion\":\"Chapeta\",\"cantidad\":\"1\",\"stock\":\"17\",\"precio\":\"924\",\"total\":\"924\"},{\"id\":\"53\",\"descripcion\":\"Bomba Hidrostatica\",\"cantidad\":\"10\",\"stock\":\"9\",\"precio\":\"1078\",\"total\":\"10780\"}]', '', 2261, 11900, 14161, 'Efectivo', '2017-12-26 22:25:09'),
(31, 10015, 9, 57, '[{\"id\":\"57\",\"descripcion\":\"Cizalla de Tijera\",\"cantidad\":\"3\",\"stock\":\"16\",\"precio\":\"812\",\"total\":\"2436\"}]', '', 462.84, 2436, 2898.84, 'Efectivo', '2017-12-26 22:25:33'),
(32, 10016, 8, 57, '[{\"id\":\"58\",\"descripcion\":\"Coche llanta neumatica\",\"cantidad\":\"1\",\"stock\":\"17\",\"precio\":\"588\",\"total\":\"588\"},{\"id\":\"57\",\"descripcion\":\"Cizalla de Tijera\",\"cantidad\":\"5\",\"stock\":\"11\",\"precio\":\"812\",\"total\":\"4060\"},{\"id\":\"56\",\"descripcion\":\"Cizalla de Palanca\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"630\",\"total\":\"630\"}]', '', 1002.82, 5278, 6280.82, 'TD-4523523523', '2017-12-26 22:25:55'),
(33, 10017, 7, 57, '[{\"id\":\"57\",\"descripcion\":\"Cizalla de Tijera\",\"cantidad\":\"4\",\"stock\":\"7\",\"precio\":\"812\",\"total\":\"3248\"},{\"id\":\"52\",\"descripcion\":\"Bascula \",\"cantidad\":\"3\",\"stock\":\"17\",\"precio\":\"182\",\"total\":\"546\"},{\"id\":\"55\",\"descripcion\":\"Cilindro muestra de concreto\",\"cantidad\":\"2\",\"stock\":\"18\",\"precio\":\"560\",\"total\":\"1120\"},{\"id\":\"56\",\"descripcion\":\"Cizalla de Palanca\",\"cantidad\":\"1\",\"stock\":\"18\",\"precio\":\"630\",\"total\":\"630\"}]', '', 1053.36, 5544, 6597.36, 'Efectivo', '2017-12-26 22:26:28'),
(34, 10018, 6, 57, '[{\"id\":\"51\",\"descripcion\":\"Tensor\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"140\",\"total\":\"140\"},{\"id\":\"52\",\"descripcion\":\"Bascula \",\"cantidad\":\"5\",\"stock\":\"12\",\"precio\":\"182\",\"total\":\"910\"},{\"id\":\"53\",\"descripcion\":\"Bomba Hidrostatica\",\"cantidad\":\"1\",\"stock\":\"8\",\"precio\":\"1078\",\"total\":\"1078\"}]', '', 404.32, 2128, 2532.32, 'Efectivo', '2017-12-26 22:26:51'),
(35, 10019, 5, 57, '[{\"id\":\"56\",\"descripcion\":\"Cizalla de Palanca\",\"cantidad\":\"15\",\"stock\":\"3\",\"precio\":\"630\",\"total\":\"9450\"},{\"id\":\"55\",\"descripcion\":\"Cilindro muestra de concreto\",\"cantidad\":\"1\",\"stock\":\"17\",\"precio\":\"560\",\"total\":\"560\"}]', '', 1901.9, 10010, 11911.9, 'Efectivo', '2017-12-26 22:27:13'),
(36, 10020, 4, 57, '[{\"id\":\"55\",\"descripcion\":\"Cilindro muestra de concreto\",\"cantidad\":\"1\",\"stock\":\"16\",\"precio\":\"560\",\"total\":\"560\"},{\"id\":\"54\",\"descripcion\":\"Chapeta\",\"cantidad\":\"1\",\"stock\":\"16\",\"precio\":\"924\",\"total\":\"924\"}]', '', 281.96, 1484, 1765.96, 'TC-46346346346', '2017-12-26 22:27:42'),
(37, 10021, 3, 1, '[{\"id\":\"60\",\"descripcion\":\"Cortadora de Baldosin\",\"cantidad\":\"1\",\"stock\":\"13\",\"precio\":\"1302\",\"total\":\"1302\"},{\"id\":\"59\",\"descripcion\":\"Cono slump\",\"cantidad\":\"1\",\"stock\":\"15\",\"precio\":\"196\",\"total\":\"196\"}]', '', 149.8, 1498, 1647.8, 'Efectivo', '2018-02-06 22:47:02'),
(38, 10022, 3, 1, '[{\"id\":\"60\",\"descripcion\":\"Cortadora de Baldosin\",\"cantidad\":\"1\",\"stock\":\"12\",\"precio\":\"1302\",\"total\":\"1302\"},{\"id\":\"59\",\"descripcion\":\"Cono slump\",\"cantidad\":\"1\",\"stock\":\"14\",\"precio\":\"196\",\"total\":\"196\"}]', '', 0, 1498, 1498, 'TC-12344444', '2018-02-20 21:16:43'),
(39, 10023, 10, 1, '[{\"id\":\"56\",\"descripcion\":\"Cizalla de Palanca\",\"cantidad\":\"1\",\"stock\":\"2\",\"precio\":\"630\",\"total\":\"630\"},{\"id\":\"55\",\"descripcion\":\"Cilindro muestra de concreto\",\"cantidad\":\"1\",\"stock\":\"15\",\"precio\":\"560\",\"total\":\"560\"}]', '', 0, 1190, 1190, 'TD-12121', '2018-02-20 21:17:59'),
(40, 10024, 12, 1, '[{\"id\":\"2\",\"descripcion\":\"boveda nicho familiar (4 personas)\",\"cantidad\":\"1\",\"stock\":\"-1\",\"precio\":\"87.73\",\"total\":\"87.73\"}]', '1', 0.8773, 87.73, 88.6073, 'Efectivo', '2018-03-27 20:12:25');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuartel_cuerpos`
--
ALTER TABLE `cuartel_cuerpos`
  ADD CONSTRAINT `FK_tipo_sepultura` FOREIGN KEY (`tipo_sep`) REFERENCES `tipo_sepultura` (`id_tipo_sepultura`);

--
-- Filtros para la tabla `difuntos`
--
ALTER TABLE `difuntos`
  ADD CONSTRAINT `FK_id_sepultura` FOREIGN KEY (`id_sepultura`) REFERENCES `sepulturas` (`id_sepultura`);

--
-- Filtros para la tabla `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `FK_centro_costo` FOREIGN KEY (`id_centro_costo`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `sepulturas`
--
ALTER TABLE `sepulturas`
  ADD CONSTRAINT `FK_cuartel_cuerpo` FOREIGN KEY (`id_cuartel_cuerpo`) REFERENCES `cuartel_cuerpos` (`id_cuartel_cuerpo`);

--
-- Filtros para la tabla `tipo_sepultura`
--
ALTER TABLE `tipo_sepultura`
  ADD CONSTRAINT `FK_ccosto` FOREIGN KEY (`id_centro_costo`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
