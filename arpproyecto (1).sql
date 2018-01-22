-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-01-2018 a las 05:34:13
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
-- Base de datos: `arpproyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cercas`
--

CREATE TABLE `cercas` (
  `id` int(11) NOT NULL,
  `id_cerca` varchar(11) COLLATE utf8_bin NOT NULL,
  `gps1` varchar(11) COLLATE utf8_bin NOT NULL,
  `gps2` varchar(11) COLLATE utf8_bin NOT NULL,
  `gps3` varchar(11) COLLATE utf8_bin NOT NULL,
  `gps4` varchar(11) COLLATE utf8_bin NOT NULL,
  `gps5` varchar(11) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cercas`
--

INSERT INTO `cercas` (`id`, `id_cerca`, `gps1`, `gps2`, `gps3`, `gps4`, `gps5`) VALUES
(12, '2', '1', '2', '3', '0', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `id_cercas`
--

CREATE TABLE `id_cercas` (
  `id` int(11) NOT NULL,
  `user` varchar(10) COLLATE utf8_bin NOT NULL,
  `lat1` float(10,6) NOT NULL,
  `lng1` float(10,6) NOT NULL,
  `lat2` float(10,6) NOT NULL,
  `lng2` float(10,6) NOT NULL,
  `lat3` float(10,6) NOT NULL,
  `lng3` float(10,6) NOT NULL,
  `lat4` float(10,6) NOT NULL,
  `lng4` float(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `id_cercas`
--

INSERT INTO `id_cercas` (`id`, `user`, `lat1`, `lng1`, `lat2`, `lng2`, `lat3`, `lng3`, `lat4`, `lng4`) VALUES
(2, '0924995426', -2.138338, -79.912155, -2.138338, -79.905975, -2.147987, -79.905975, -2.147987, -79.912155);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_bin NOT NULL,
  `address` varchar(80) COLLATE utf8_bin NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) COLLATE utf8_bin NOT NULL,
  `user` varchar(30) COLLATE utf8_bin NOT NULL,
  `idgps` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`, `user`, `idgps`) VALUES
(1, 'Love.Fish', '580 Darling Street, Rozelle, NSW', -33.861034, 151.171936, 'restaurant', '', ''),
(2, 'Young Henrys', '76 Wilford Street, Newtown, NSW', -33.898113, 151.174469, 'bar', '', ''),
(3, 'Hunter Gatherer', 'Greenwood Plaza, 36 Blue St, North Sydney NSW', -33.840282, 151.207474, 'bar', '', ''),
(4, 'The Potting Shed', '7A, 2 Huntley Street, Alexandria, NSW', -33.910751, 151.194168, 'bar', '', ''),
(5, 'Nomad', '16 Foster Street, Surry Hills, NSW', -33.879917, 151.210449, 'bar', '', ''),
(6, 'Three Blue Ducks', '43 Macpherson Street, Bronte, NSW', -33.906357, 151.263763, 'restaurant', '', ''),
(7, 'Single Origin Roasters', '60-64 Reservoir Street, Surry Hills, NSW', -33.881123, 151.209656, 'restaurant', '', ''),
(8, 'Red Lantern', '60 Riley Street, Darlinghurst, NSW', -33.874737, 151.215530, 'restaurant', '', ''),
(9, 'prueba espol', 'espol campus', -2.145597, -79.966148, 'restaurant', '0924995426', '1'),
(10, 'test1', '', -2.138338, -79.912155, '', '', ''),
(11, 'test2', '', -2.138338, -79.905975, '', '', ''),
(12, 'test3', '', -2.147987, -79.905975, '', '', ''),
(13, 'test4', '', -2.147987, -79.912155, '', '', ''),
(14, 'test5', '', -2.139000, -79.910004, '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cercas`
--
ALTER TABLE `cercas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `id_cercas`
--
ALTER TABLE `id_cercas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cercas`
--
ALTER TABLE `cercas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `id_cercas`
--
ALTER TABLE `id_cercas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
