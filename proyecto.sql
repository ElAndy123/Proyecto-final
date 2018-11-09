-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2018 a las 12:54:36
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE IF NOT EXISTS `habitaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `habitacion` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `suspendida` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id`, `habitacion`, `suspendida`) VALUES
(1, 'Caléndula', 0),
(2, 'Arrayán', 0),
(3, 'Chilco', 0),
(4, 'Llanten', 0),
(5, 'Abedul', 0),
(6, 'Tomillo', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE IF NOT EXISTS `reservas` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nombre_pasajero` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `e-mail` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono_celular` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `camas` int(1) NOT NULL,
  `fecha_llegada` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `hora_llegada` text COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `nombre_pasajero`, `e-mail`, `telefono_celular`, `id_habitacion`, `camas`, `fecha_llegada`, `fecha_salida`, `hora_llegada`) VALUES
(9, 'Andres', 'andres@gamil.com', '2944726312', 1, 2, '2018-10-16', '2018-10-18', '10:15 AM'),
(16, 'Pedro', 'pedro@gmail.com', '3248273453', 2, 1, '2018-11-16', '2018-11-29', '5:00 PM'),
(19, 'martin', 'martin@gmail.com', '2944787288', 4, 1, '2018-11-15', '2018-11-22', '1:00 PM'),
(21, 'Roberto', 'Roberto@gmail.com', '2944876178', 5, 1, '2018-11-21', '2018-11-29', '3:00 PM'),
(23, 'moni', 'moni@gmail.com', '2944789187', 6, 1, '2018-11-08', '2018-11-10', '7:15 AM'),
(27, 'Juan', 'Juan@gmail.com', '2944821028', 0, 1, '2018-11-20', '2018-11-23', '10:00 AM'),
(28, 'Juan', 'Juan@gmail.com', '2944821028', 0, 1, '2018-11-20', '2018-11-23', '10:00 AM'),
(29, 'asd', 'asd@asd.com', '123', 0, 2, '2018-11-20', '2018-11-23', '7:45 AM'),
(30, 'asd', 'asd@asd.com', '123', 0, 2, '2018-11-20', '2018-11-23', '7:45 AM'),
(31, 'asd', '', '', 0, 0, '0000-00-00', '0000-00-00', ''),
(32, 'asd', 'asd@asd.com', '123', 0, 1, '2018-11-20', '2018-11-23', '7:30 AM'),
(33, 'asd', 'asd@asd.com', '123', 0, 1, '2018-11-20', '2018-11-23', '7:30 AM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `clave` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
