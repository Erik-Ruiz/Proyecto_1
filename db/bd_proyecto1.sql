-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2022 a las 19:45:08
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_proyecto1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_camarero`
--

CREATE TABLE `tbl_camarero` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `contraseña` varchar(30) NOT NULL,
  `correo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_camarero`
--

INSERT INTO `tbl_camarero` (`id`, `nombre`, `contraseña`, `correo`) VALUES
(2, 'Erik', '8cb2237d0679ca88db6464eac60da9', 'erik@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mantenimiento`
--

CREATE TABLE `tbl_mantenimiento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `contraseña` varchar(30) NOT NULL,
  `correo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_mantenimiento`
--

INSERT INTO `tbl_mantenimiento` (`id`, `nombre`, `contraseña`, `correo`) VALUES
(1, 'Jordi', '12345', 'jordi@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mesa`
--

CREATE TABLE `tbl_mesa` (
  `id` int(11) NOT NULL,
  `nombre_mesa` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `id_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_mesa`
--

INSERT INTO `tbl_mesa` (`id`, `nombre_mesa`, `estado`, `id_sala`) VALUES
(2, 'Mesa1', 'Bien', 1),
(3, 'Mesa2', 'Bien', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sala`
--

CREATE TABLE `tbl_sala` (
  `id` int(11) NOT NULL,
  `sala` varchar(30) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `id_camareros` int(11) NOT NULL,
  `id_mantenimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_sala`
--

INSERT INTO `tbl_sala` (`id`, `sala`, `estado`, `id_camareros`, `id_mantenimiento`) VALUES
(1, 'Terraza1', 'Bien', 2, 1),
(2, 'Sala1', 'Bien', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_silla`
--

CREATE TABLE `tbl_silla` (
  `id` int(11) NOT NULL,
  `nombre_silla` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `id_mesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_silla`
--

INSERT INTO `tbl_silla` (`id`, `nombre_silla`, `estado`, `id_mesa`) VALUES
(5, 'Silla1', 'Bien', 2),
(6, 'Silla2', 'Bien', 2),
(7, 'Silla3', 'Bien', 2),
(8, 'Silla4', 'Bien', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_camarero`
--
ALTER TABLE `tbl_camarero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_mantenimiento`
--
ALTER TABLE `tbl_mantenimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_mesa`
--
ALTER TABLE `tbl_mesa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sala` (`id_sala`);

--
-- Indices de la tabla `tbl_sala`
--
ALTER TABLE `tbl_sala`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_camareros` (`id_camareros`),
  ADD KEY `id_mantenimiento` (`id_mantenimiento`);

--
-- Indices de la tabla `tbl_silla`
--
ALTER TABLE `tbl_silla`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mesa` (`id_mesa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_camarero`
--
ALTER TABLE `tbl_camarero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_mantenimiento`
--
ALTER TABLE `tbl_mantenimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_mesa`
--
ALTER TABLE `tbl_mesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_sala`
--
ALTER TABLE `tbl_sala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_silla`
--
ALTER TABLE `tbl_silla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_mesa`
--
ALTER TABLE `tbl_mesa`
  ADD CONSTRAINT `tbl_mesa_ibfk_1` FOREIGN KEY (`id_sala`) REFERENCES `tbl_sala` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_sala`
--
ALTER TABLE `tbl_sala`
  ADD CONSTRAINT `tbl_sala_ibfk_1` FOREIGN KEY (`id_camareros`) REFERENCES `tbl_camarero` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_sala_ibfk_2` FOREIGN KEY (`id_mantenimiento`) REFERENCES `tbl_mantenimiento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_silla`
--
ALTER TABLE `tbl_silla`
  ADD CONSTRAINT `tbl_silla_ibfk_1` FOREIGN KEY (`id_mesa`) REFERENCES `tbl_mesa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
