-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2017 a las 16:21:54
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

CREATE TABLE IF NOT EXISTS `clients` (
  `NIF` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cognom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vehicles_matricula` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C82E743B416931` (`NIF`),
  KEY `IDX_C82E7451572B15` (`vehicles_matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`NIF`, `nom`, `cognom`, `vehicles_matricula`, `id`, `foto`) VALUES
('000000T', 'josep', 'pocu', NULL, 1, 'http://vignette2.wikia.nocookie.net/transformice/images/b/b4/Moda-masculina-lentes-cara-hombre-carametria-caramorfoligia-consultoria-de-imagen.png/revision/latest?cb=20150427152527&path-prefix=es'),
('111111T', 'Bernabé', 'Moc', NULL, 2, 'http://www.cara.org.au/file/resize/r308x337/71_cara-girl.jpg'),
('2222222t', 'Oriol', 'Tonto', NULL, 3, 'https://www.google.es/search?q=cara+hombre+ara%C3%B1a&tbm=isch&imgil=HmcCoTrHc1tUWM%253A%253BgGYHCosIDcsArM%253Bhttp%25253A%25252F%25252Fwww.imagui.com%25252Fa%25252Fimagen-cara-hombre-arana-Tpeaoqg5X&source=iu&pf=m&fir=HmcCoTrHc1tUWM%253A%252CgGYHCosIDcs'),
('3333333T', 'Maria', 'Mocos', NULL, 4, 'http://www.cara.org.au/file/resize/r308x337/71_cara-girl.jpg'),
('34123413B', 'Rubert', 'Navarro', NULL, 5, 'http://www.doctoragarciamilla.com/wp-content/uploads/2014/05/Rostro-hombre.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicles`
--

CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marca` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipusCombustible` int(11) NOT NULL,
  `clients_nif` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1FCE69FA15DF1885` (`matricula`),
  KEY `IDX_1FCE69FA35203326` (`clients_nif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `FK_C82E7451572B15` FOREIGN KEY (`vehicles_matricula`) REFERENCES `vehicles` (`matricula`);

--
-- Filtros para la tabla `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `FK_1FCE69FA35203326` FOREIGN KEY (`clients_nif`) REFERENCES `clients` (`NIF`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
