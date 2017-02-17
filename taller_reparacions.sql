-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2017 a las 15:58:21
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `NIF` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cognom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`NIF`, `nom`, `cognom`, `id`, `foto`) VALUES
('000000T', 'josep456', 'pocu23456', 1, 'http://vignette2.wikia.nocookie.net/transformice/images/b/b4/Moda-masculina-lentes-cara-hombre-carametria-caramorfoligia-consultoria-de-imagen.png/revision/latest?cb=20150427152527&path-prefix=es'),
('111111T', 'Bernabé', 'Moc', 2, 'http://www.cara.org.au/file/resize/r308x337/71_cara-girl.jpg'),
('3333333T', 'Maria', 'Mocos', 4, 'http://www.cara.org.au/file/resize/r308x337/71_cara-girl.jpg'),
('34123413B', 'Rubert', 'Navarro', 5, 'http://www.doctoragarciamilla.com/wp-content/uploads/2014/05/Rostro-hombre.jpg'),
('222222', 'Ford', 'Mondeo', 9, 'https://s-media-cache-ak0.pinimg.com/564x/d9/20/be/d920beb65bf3d8aa02df63371f122815.jpg'),
('123', 'Josep', 'Pocu', 10, 'https://s-media-cache-ak0.pinimg.com/564x/d9/20/be/d920beb65bf3d8aa02df63371f122815.jpg'),
('1234', 'David', 'Gigi EASY', 12, 'https://s-media-cache-ak0.pinimg.com/564x/d9/20/be/d920beb65bf3d8aa02df63371f122815.jpg'),
('6666666', '6666666', '6666666', 13, 'https://s-media-cache-ak0.pinimg.com/564x/d9/20/be/d920beb65bf3d8aa02df63371f122815.jpg'),
('1123421342', '123412341243', '213412341234', 14, 'http://www.cara.org.au/file/resize/r308x337/71_cara-girl.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `realitzades`
--

CREATE TABLE `realitzades` (
  `id` int(11) NOT NULL,
  `dataEntrada` date NOT NULL,
  `dataSortida` date NOT NULL,
  `horesDedicades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparacions`
--

CREATE TABLE `reparacions` (
  `id` int(11) NOT NULL,
  `codi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcio` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `matricula` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marca` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipusCombustible` int(11) NOT NULL,
  `clients_nif` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vehicles`
--

INSERT INTO `vehicles` (`id`, `matricula`, `marca`, `model`, `tipusCombustible`, `clients_nif`) VALUES
(1, '1234', 'Ford', 'Mondeo', 12, NULL),
(3, '222222', 'Ford', 'Caca Bernabé', 21, NULL),
(4, '5476 BBB', 'Ford', 'Focus', 1, NULL),
(5, '1234 NNN', 'Seat', 'Ibiza', 1, NULL),
(6, '5656 BBB', 'Seat', 'León', 1, NULL),
(7, '12431342', '123421342134', '12341234', 1234, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_C82E743B416931` (`NIF`);

--
-- Indices de la tabla `realitzades`
--
ALTER TABLE `realitzades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reparacions`
--
ALTER TABLE `reparacions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_47FFB4417EA37CB3` (`codi`);

--
-- Indices de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1FCE69FA15DF1885` (`matricula`),
  ADD UNIQUE KEY `UNIQ_1FCE69FA35203326` (`clients_nif`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `realitzades`
--
ALTER TABLE `realitzades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reparacions`
--
ALTER TABLE `reparacions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `FK_1FCE69FA35203326` FOREIGN KEY (`clients_nif`) REFERENCES `clients` (`NIF`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
