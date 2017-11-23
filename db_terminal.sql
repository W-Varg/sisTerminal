-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2017 a las 02:00:16
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_terminal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletos_pasajero`
--

CREATE TABLE `boletos_pasajero` (
  `id_boleto` int(11) NOT NULL,
  `id_viaje` int(11) NOT NULL,
  `asiento` int(11) NOT NULL,
  `nombrePasajero` varchar(70) COLLATE utf8_bin NOT NULL,
  `estado` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT 'reservado',
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `boletos_pasajero`
--

INSERT INTO `boletos_pasajero` (`id_boleto`, `id_viaje`, `asiento`, `nombrePasajero`, `estado`, `fecha`) VALUES
(1, 9, 5, 'antonio jose de sucer', '2', '2017-11-21 19:20:43'),
(2, 8, 4, 'santos perez', '1', '2017-11-21 19:22:51'),
(3, 8, 6, 'santigo torrez', '1', '2017-11-21 19:22:51'),
(4, 8, 15, 'Miguel Angel', '2', '2017-11-21 19:25:45'),
(5, 8, 16, 'Miguel Angel', '2', '2017-11-21 19:25:45'),
(6, 9, 20, 'antonia', '1', '2017-11-21 21:00:57'),
(8, 10, 45, 'jose', '2', '2017-11-22 08:38:03'),
(9, 9, 4, 'albertchoqeu', '2', '2017-11-22 09:24:13'),
(10, 9, 4, 'albertchoqeu', '2', '2017-11-22 09:24:46'),
(11, 9, 4, 'albertchoqeu', '2', '2017-11-22 09:25:14'),
(12, 9, 8, 'antonio miguel', '2', '2017-11-22 09:37:36'),
(13, 9, 8, 'antonio miguel', '2', '2017-11-22 09:42:54'),
(14, 9, 8, 'antonio miguel', '2', '2017-11-22 09:44:07'),
(15, 9, 8, 'antonio miguel', '2', '2017-11-22 09:46:20'),
(16, 9, 8, 'antonio miguel', '2', '2017-11-22 09:46:40'),
(17, 9, 5, 'antonio miguel', '2', '2017-11-22 09:47:43'),
(18, 9, 9, 'antonio miguel', '2', '2017-11-22 09:48:33'),
(19, 8, 23, 'cesar sazruei', '2', '2017-11-22 09:54:00'),
(20, 8, 25, 'cesar sazruei', '2', '2017-11-22 09:54:41'),
(21, 8, 25, 'cesar sazruei', '2', '2017-11-22 09:55:05');

--
-- Disparadores `boletos_pasajero`
--
DELIMITER $$
CREATE TRIGGER `generar_autof_echa` BEFORE INSERT ON `boletos_pasajero` FOR EACH ROW set new.`fecha` = now()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `buses`
--

CREATE TABLE `buses` (
  `id` int(11) NOT NULL,
  `placa` varchar(10) COLLATE utf8_bin NOT NULL,
  `tipoBus` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT 'Normal',
  `plazas` int(2) NOT NULL,
  `estado` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT 'disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `buses`
--

INSERT INTO `buses` (`id`, `placa`, `tipoBus`, `plazas`, `estado`) VALUES
(1, '123-abc', 'Normal', 45, 'disponible'),
(2, '123-abb', 'semicama', 40, 'No disponible'),
(3, '123-acc', 'BusCama', 30, 'disponible'),
(4, '123-aaa', 'BusCama', 30, 'No disponible'),
(5, '321-abc', 'Normal', 45, 'disponible'),
(6, '123-bdb', 'Normal', 45, 'disponible'),
(7, '123-ttt', 'Normal', 46, 'disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductores`
--

CREATE TABLE `conductores` (
  `id_conductor` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `telefono` int(10) DEFAULT NULL,
  `salario` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `conductores`
--

INSERT INTO `conductores` (`id_conductor`, `nombre`, `telefono`, `salario`) VALUES
(2, 'Santos', 78945632, 3200),
(6, 'Antonio', 78000632, 4000),
(7, 'Javier Salinas', 78912341, 2500),
(8, 'Juan Carlos Salinas', 78945123, 3500.25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dpto_terminal`
--

CREATE TABLE `dpto_terminal` (
  `id_destino` int(11) NOT NULL,
  `NombreDestino` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `dpto_terminal`
--

INSERT INTO `dpto_terminal` (`id_destino`, `NombreDestino`) VALUES
(1, 'Santa Cruz - Terminal Bimodal'),
(2, 'La Paz - Terminal La Paz'),
(5, 'Cochabamba - Terminal Cbba'),
(6, ' Sucre - Terminal de Buses Sucre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_bin NOT NULL,
  `password` varchar(30) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(30) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(30) COLLATE utf8_bin NOT NULL,
  `tipousuario` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_viaje`
--

CREATE TABLE `ventas_viaje` (
  `viaje_ruta` int(11) NOT NULL,
  `pasajero` int(11) NOT NULL,
  `fecha_viaje` datetime NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje_ruta`
--

CREATE TABLE `viaje_ruta` (
  `id_viajeRuta` int(11) NOT NULL,
  `bus` int(11) NOT NULL,
  `conductor` int(11) NOT NULL,
  `fecha_viaje` date NOT NULL,
  `origen` int(11) NOT NULL,
  `hora_salida` time NOT NULL,
  `hora_llegada` time NOT NULL,
  `precio_pasaje` int(11) NOT NULL,
  `carril_salida` int(11) NOT NULL,
  `destino_terminal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `viaje_ruta`
--

INSERT INTO `viaje_ruta` (`id_viajeRuta`, `bus`, `conductor`, `fecha_viaje`, `origen`, `hora_salida`, `hora_llegada`, `precio_pasaje`, `carril_salida`, `destino_terminal`) VALUES
(8, 6, 6, '2017-11-24', 1, '18:00:00', '08:00:00', 150, 2, 5),
(9, 7, 6, '2017-11-24', 6, '18:00:00', '09:00:00', 80, 1, 2),
(10, 3, 6, '2017-11-23', 1, '17:00:00', '06:00:00', 70, 10, 5),
(11, 3, 7, '2017-11-23', 6, '17:50:00', '06:00:00', 50, 5, 1),
(12, 5, 7, '2017-11-10', 6, '20:00:00', '07:00:00', 50, 10, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boletos_pasajero`
--
ALTER TABLE `boletos_pasajero`
  ADD PRIMARY KEY (`id_boleto`);

--
-- Indices de la tabla `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `conductores`
--
ALTER TABLE `conductores`
  ADD PRIMARY KEY (`id_conductor`);

--
-- Indices de la tabla `dpto_terminal`
--
ALTER TABLE `dpto_terminal`
  ADD PRIMARY KEY (`id_destino`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `viaje_ruta`
--
ALTER TABLE `viaje_ruta`
  ADD PRIMARY KEY (`id_viajeRuta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boletos_pasajero`
--
ALTER TABLE `boletos_pasajero`
  MODIFY `id_boleto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `conductores`
--
ALTER TABLE `conductores`
  MODIFY `id_conductor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `dpto_terminal`
--
ALTER TABLE `dpto_terminal`
  MODIFY `id_destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `viaje_ruta`
--
ALTER TABLE `viaje_ruta`
  MODIFY `id_viajeRuta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
