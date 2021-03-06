-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2017 a las 03:21:53
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taller_reparacions`
--
CREATE DATABASE IF NOT EXISTS `taller_reparacions` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `taller_reparacions`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `NIF` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cognom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C82E743B416931` (`NIF`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`NIF`, `nom`, `cognom`, `id`, `foto`) VALUES
('3333333T', 'Maria', 'Garcia', 4, 'http://www.italymagazine.com/sites/default/files/story/mona_lisa_0.jpg'),
('34123413B', 'Rubert', 'Navarro', 5, 'http://inyourfaceny.org/wp-content/uploads/2016/09/NaughtonJamesNew-500x500.jpg'),
('12346664t', 'David', 'Gigi', 12, 'http://www.menshairstylestoday.com/wp-content/uploads/2016/10/Oval-Face-Brush-Back.jpg'),
('12334532', 'Marc', 'Zukk', 15, 'https://sherights.files.wordpress.com/2014/04/gurbaksh-500x500.jpeg'),
('44444444S', 'Josep', 'Pocu', 18, 'https://media.kairos.com/team/Neil_Pitts.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `realitzades`
--

DROP TABLE IF EXISTS `realitzades`;
CREATE TABLE IF NOT EXISTS `realitzades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dataEntrada` date NOT NULL,
  `dataSortida` date NOT NULL,
  `horesDedicades` int(11) NOT NULL,
  `vehicle_matricula` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codi_reparacio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nif_client` (`codi_reparacio`),
  KEY `vehicle_matricula` (`vehicle_matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `realitzades`
--

INSERT INTO `realitzades` (`id`, `dataEntrada`, `dataSortida`, `horesDedicades`, `vehicle_matricula`, `codi_reparacio`) VALUES
(1, '2017-02-07', '2017-02-08', 32, '1234 NNN', '111111');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparacions`
--

DROP TABLE IF EXISTS `reparacions`;
CREATE TABLE IF NOT EXISTS `reparacions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_47FFB4417EA37CB3` (`codi`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reparacions`
--

INSERT INTO `reparacions` (`id`, `codi`, `descripcio`) VALUES
(8, '111111', 'Capa de pintura i rodes inflades'),
(16, '222222', 'Arreglar frenos'),
(17, '333333', 'Arreglar motor'),
(18, '4444444', 'Netejar filtre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

DROP TABLE IF EXISTS `usuaris`;
CREATE TABLE IF NOT EXISTS `usuaris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_3664EC126C6E55B5` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuaris`
--

INSERT INTO `usuaris` (`id`, `nom`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'josep', 'josep'),
(4, 'bernabe', 'bernabe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marca` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipusCombustible` int(11) NOT NULL,
  `clients_nif` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1FCE69FA15DF1885` (`matricula`),
  UNIQUE KEY `UNIQ_1FCE69FA35203326` (`clients_nif`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vehicles`
--

INSERT INTO `vehicles` (`id`, `matricula`, `marca`, `model`, `tipusCombustible`, `clients_nif`) VALUES
(1, '1234', 'Ford', 'Mondeo', 1, NULL),
(4, '5476 BBB', 'Ford', 'Focus', 1, NULL),
(5, '1234 NNN', 'Seat', 'Ibiza', 1, NULL),
(6, '5656 BBB', 'Seat', 'León', 1, NULL),
(8, '6969 JCD', 'Seat', 'Ibiza', 2, NULL),
(9, '4341 BBB', 'Seat', 'León', 3, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `realitzades`
--
ALTER TABLE `realitzades`
  ADD CONSTRAINT `realitzades_codi_reparacio` FOREIGN KEY (`codi_reparacio`) REFERENCES `reparacions` (`codi`) ON UPDATE CASCADE,
  ADD CONSTRAINT `realitzades_ibfk_1` FOREIGN KEY (`vehicle_matricula`) REFERENCES `vehicles` (`matricula`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `FK_1FCE69FA35203326` FOREIGN KEY (`clients_nif`) REFERENCES `clients` (`NIF`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
