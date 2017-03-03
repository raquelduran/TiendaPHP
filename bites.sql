-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2017 a las 22:42:30
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bites`
--
CREATE DATABASE IF NOT EXISTS `bites` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bites`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `Id` int(11) NOT NULL,
  `numeroventa` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`Id`, `numeroventa`, `nombre`, `imagen`, `precio`, `cantidad`, `subtotal`) VALUES
(1, 1, 'Tarta hueso', 'tarta-hueso.jpg', '4.00', 1, '4.00'),
(2, 1, 'Galletas de carne', 'galletas-carne.jpeg', '1.50', 1, '1.50'),
(3, 2, 'Bocaditos de higado', 'bocaditos-higado.jpg', '0.90', 1, '0.90');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(5) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text,
  `imagenes` text,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `imagenes`, `precio`) VALUES
(8, 'Albondigas de pavo', 'Albondigas de pavo', 'albondigas-pavo.jpeg', '1.30'),
(9, 'Bocaditos de frutas', 'Bocaditos de frutas', 'bocaditos-frutas.jpg', '1.60'),
(10, 'Bocaditos de higado', 'Bocaditos de higado', 'bocaditos-higado.jpg', '0.90'),
(11, 'Galletas de carne', 'Galletas de carne', 'galletas-carne.jpeg', '1.50'),
(12, 'Galletas de cordero', 'Galletas de cordero', 'galletas-cordero.jpg', '2.00'),
(13, 'Galletas de espinacas', 'Galletas de espinacas', 'galletas-espinaca.jpg', '1.45'),
(14, 'Galletas de verduras', 'Galletas de verduras', 'galletas-verduras.jpg', '1.75'),
(15, 'Helado de fresa', 'Helado de fresa', 'helado-fresa.jpg', '0.80'),
(16, 'Helado de pollo', 'Helado de pollo', 'helado-pollo.jpg', '1.55'),
(17, 'Tarta grande', 'Tarta para compartir', 'tarta-compartir.jpg', '5.00'),
(18, 'Tarta para gatos', 'Tarta para gatos', 'tarta-gato.jpg', '3.00'),
(19, 'Tarta huella', 'Tarta en forma de huella', 'tarta-huella.jpg', '3.00'),
(20, 'Tarta hueso', 'Tarta en forma de hueso', 'tarta-hueso.jpg', '4.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Nombre`, `Apellido`, `Usuario`, `Password`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(4, 'Raquel', 'Fernandez', 'Raquel', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
