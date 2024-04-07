-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-04-2024 a las 00:45:50
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `evaluacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avaluo`
--

CREATE TABLE `avaluo` (
  `avaluo_codg` int(11) NOT NULL,
  `avaluo_valor` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `avaluo`
--

INSERT INTO `avaluo` (`avaluo_codg`, `avaluo_valor`) VALUES
(1, 15600000),
(2, 19150000),
(3, 25230000),
(4, 85800000),
(5, 185000000),
(6, 2530000),
(7, 5500000),
(8, 16500000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cilindraje`
--

CREATE TABLE `cilindraje` (
  `cilindraje_codg` int(11) NOT NULL,
  `cilindraje_potencia` varchar(30) NOT NULL,
  `tipo_vehiculo_codg` int(11) NOT NULL,
  `avaluo_codg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cilindraje`
--

INSERT INTO `cilindraje` (`cilindraje_codg`, `cilindraje_potencia`, `tipo_vehiculo_codg`, `avaluo_codg`) VALUES
(1, '100', 1, 6),
(2, '125', 1, 6),
(3, '150', 1, 6),
(4, '175', 1, 7),
(5, '200', 1, 7),
(6, '225', 1, 7),
(7, '250', 1, 7),
(8, '275', 1, 8),
(9, '300', 1, 8),
(10, ' mas de 300', 1, 8),
(11, '1000', 2, 1),
(12, '1500', 2, 1),
(13, '2000', 2, 1),
(14, '2500', 2, 2),
(15, '3000', 2, 2),
(16, '3500', 2, 2),
(17, '4000', 2, 2),
(18, '4500', 2, 3),
(19, 'mas de 4500', 2, 3),
(20, '2500', 3, 4),
(21, '3000', 3, 4),
(22, '3500', 3, 4),
(23, '4000', 3, 4),
(24, '4500', 3, 4),
(25, '5000', 3, 5),
(26, '5500', 3, 5),
(27, 'mas de 6000', 3, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `color_codg` int(11) NOT NULL,
  `color_nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`color_codg`, `color_nom`) VALUES
(1, 'azul'),
(2, 'amarillo'),
(3, 'verde'),
(4, 'negro'),
(5, 'rosado'),
(6, 'morado'),
(7, 'naranja'),
(8, 'plateado'),
(9, 'blanco'),
(10, 'gris'),
(11, 'rojo'),
(12, 'multicolor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dueño`
--

CREATE TABLE `dueño` (
  `dueño_vehiculo_id` int(11) NOT NULL,
  `dueño_vehiculo_nom` varchar(30) NOT NULL,
  `correo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dueño`
--

INSERT INTO `dueño` (`dueño_vehiculo_id`, `dueño_vehiculo_nom`, `correo`) VALUES
(1234, 'eduardo', 'pepito@gmail.com'),
(23456, 'diana', 'dianis@gmail.com'),
(56789, 'roberto', 'robertooo@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `estado_codg` int(11) NOT NULL,
  `estado_nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`estado_codg`, `estado_nom`) VALUES
(1, 'pendiente'),
(2, 'pagado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidacion`
--

CREATE TABLE `liquidacion` (
  `liquidacion_codg` int(11) NOT NULL,
  `liquidacion_fecha` year(4) NOT NULL,
  `vehiculo_placa` varchar(11) NOT NULL,
  `fecha_pago` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `avaluo_codg` int(11) NOT NULL,
  `impuesto_total` int(30) NOT NULL,
  `estado_codg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `liquidacion`
--

INSERT INTO `liquidacion` (`liquidacion_codg`, `liquidacion_fecha`, `vehiculo_placa`, `fecha_pago`, `avaluo_codg`, `impuesto_total`, `estado_codg`) VALUES
(100, '2003', 'EWI594', '2024-04-07 07:36:38', 7, 426200, 2),
(108, '2005', 'EWI594', '2024-04-07 16:50:36', 7, 426200, 2),
(109, '2004', 'KRU435', '2024-04-07 16:54:22', 2, 798700, 2),
(110, '2006', 'KHD302', '2024-04-07 16:52:57', 4, 2984500, 1),
(111, '2006', 'KRU435', '2024-04-07 16:54:34', 2, 798700, 2),
(112, '2002', 'EWI594', '2024-04-07 16:53:46', 7, 426200, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `marca_codg` int(11) NOT NULL,
  `marca_nom` varchar(30) NOT NULL,
  `tipo_vehiculo_codg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`marca_codg`, `marca_nom`, `tipo_vehiculo_codg`) VALUES
(1, 'hyundai', 2),
(2, 'toyota', 2),
(3, 'mercedez', 2),
(4, 'renault', 2),
(5, 'porsche', 2),
(6, 'mustang', 2),
(7, 'ducatti', 1),
(8, 'yamaha', 1),
(9, 'kawasaki', 1),
(10, 'hyundai', 3),
(11, 'toyota', 3),
(12, 'renault', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `modelo_codg` int(11) NOT NULL,
  `modelo_año` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`modelo_codg`, `modelo_año`) VALUES
(1, 2000),
(2, 2001),
(3, 2002),
(4, 2003),
(5, 2004),
(7, 2005),
(8, 2006),
(9, 2007),
(10, 2008),
(11, 2009),
(12, 2010),
(13, 2011),
(14, 2012),
(15, 2013),
(16, 2014),
(17, 2015),
(18, 2016),
(19, 2017),
(20, 2018),
(21, 2019),
(22, 2020),
(23, 2021),
(24, 2022),
(25, 2023),
(26, 2024);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicio`
--

CREATE TABLE `tipo_servicio` (
  `servicio_codg` int(11) NOT NULL,
  `servicio_nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_servicio`
--

INSERT INTO `tipo_servicio` (`servicio_codg`, `servicio_nom`) VALUES
(1, 'publico'),
(2, 'particular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vehiculo`
--

CREATE TABLE `tipo_vehiculo` (
  `tipo_vehiculo_codg` int(11) NOT NULL,
  `tipo_vehiculo_nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_vehiculo`
--

INSERT INTO `tipo_vehiculo` (`tipo_vehiculo_codg`, `tipo_vehiculo_nom`) VALUES
(1, 'moto'),
(2, 'carro'),
(3, 'camion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `vehiculo_placa` varchar(11) NOT NULL,
  `dueño_vehiculo_id` int(11) NOT NULL,
  `tipo_vehiculo_codg` int(11) NOT NULL,
  `color_codg` int(11) NOT NULL,
  `modelo_codg` int(11) NOT NULL,
  `cilindraje_codg` int(11) NOT NULL,
  `servicio_codg` int(11) NOT NULL,
  `marca_codg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`vehiculo_placa`, `dueño_vehiculo_id`, `tipo_vehiculo_codg`, `color_codg`, `modelo_codg`, `cilindraje_codg`, `servicio_codg`, `marca_codg`) VALUES
('EWI594', 1234, 1, 9, 9, 5, 2, 7),
('KHD302', 56789, 3, 12, 15, 24, 1, 12),
('KRU435', 23456, 2, 2, 17, 14, 1, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `avaluo`
--
ALTER TABLE `avaluo`
  ADD PRIMARY KEY (`avaluo_codg`);

--
-- Indices de la tabla `cilindraje`
--
ALTER TABLE `cilindraje`
  ADD PRIMARY KEY (`cilindraje_codg`),
  ADD KEY `tipo_vehiculo_codg` (`tipo_vehiculo_codg`),
  ADD KEY `avaluo_codg` (`avaluo_codg`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_codg`);

--
-- Indices de la tabla `dueño`
--
ALTER TABLE `dueño`
  ADD PRIMARY KEY (`dueño_vehiculo_id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`estado_codg`);

--
-- Indices de la tabla `liquidacion`
--
ALTER TABLE `liquidacion`
  ADD PRIMARY KEY (`liquidacion_codg`),
  ADD KEY `avaluo_codg` (`avaluo_codg`),
  ADD KEY `estado_codg` (`estado_codg`),
  ADD KEY `vehiculo_placa` (`vehiculo_placa`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`marca_codg`),
  ADD KEY `tipo_vehiculo_codg` (`tipo_vehiculo_codg`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`modelo_codg`);

--
-- Indices de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  ADD PRIMARY KEY (`servicio_codg`);

--
-- Indices de la tabla `tipo_vehiculo`
--
ALTER TABLE `tipo_vehiculo`
  ADD PRIMARY KEY (`tipo_vehiculo_codg`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`vehiculo_placa`),
  ADD KEY `dueño_vehiculo_id` (`dueño_vehiculo_id`),
  ADD KEY `color_codg` (`color_codg`),
  ADD KEY `cilindraje_codg` (`cilindraje_codg`),
  ADD KEY `marca_codg` (`marca_codg`),
  ADD KEY `modelo_codg` (`modelo_codg`),
  ADD KEY `servicio_codg` (`servicio_codg`),
  ADD KEY `tipo_vehiculo_codg` (`tipo_vehiculo_codg`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `avaluo`
--
ALTER TABLE `avaluo`
  MODIFY `avaluo_codg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cilindraje`
--
ALTER TABLE `cilindraje`
  MODIFY `cilindraje_codg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `color_codg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `estado_codg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `liquidacion`
--
ALTER TABLE `liquidacion`
  MODIFY `liquidacion_codg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `marca_codg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `modelo_codg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  MODIFY `servicio_codg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_vehiculo`
--
ALTER TABLE `tipo_vehiculo`
  MODIFY `tipo_vehiculo_codg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cilindraje`
--
ALTER TABLE `cilindraje`
  ADD CONSTRAINT `cilindraje_ibfk_1` FOREIGN KEY (`tipo_vehiculo_codg`) REFERENCES `tipo_vehiculo` (`tipo_vehiculo_codg`),
  ADD CONSTRAINT `cilindraje_ibfk_2` FOREIGN KEY (`avaluo_codg`) REFERENCES `avaluo` (`avaluo_codg`);

--
-- Filtros para la tabla `liquidacion`
--
ALTER TABLE `liquidacion`
  ADD CONSTRAINT `liquidacion_ibfk_1` FOREIGN KEY (`avaluo_codg`) REFERENCES `avaluo` (`avaluo_codg`),
  ADD CONSTRAINT `liquidacion_ibfk_2` FOREIGN KEY (`estado_codg`) REFERENCES `estados` (`estado_codg`),
  ADD CONSTRAINT `liquidacion_ibfk_3` FOREIGN KEY (`vehiculo_placa`) REFERENCES `vehiculo` (`vehiculo_placa`);

--
-- Filtros para la tabla `marca`
--
ALTER TABLE `marca`
  ADD CONSTRAINT `marca_ibfk_1` FOREIGN KEY (`tipo_vehiculo_codg`) REFERENCES `tipo_vehiculo` (`tipo_vehiculo_codg`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`dueño_vehiculo_id`) REFERENCES `dueño` (`dueño_vehiculo_id`),
  ADD CONSTRAINT `vehiculo_ibfk_2` FOREIGN KEY (`color_codg`) REFERENCES `color` (`color_codg`),
  ADD CONSTRAINT `vehiculo_ibfk_3` FOREIGN KEY (`cilindraje_codg`) REFERENCES `cilindraje` (`cilindraje_codg`),
  ADD CONSTRAINT `vehiculo_ibfk_4` FOREIGN KEY (`marca_codg`) REFERENCES `marca` (`marca_codg`),
  ADD CONSTRAINT `vehiculo_ibfk_5` FOREIGN KEY (`modelo_codg`) REFERENCES `modelo` (`modelo_codg`),
  ADD CONSTRAINT `vehiculo_ibfk_6` FOREIGN KEY (`servicio_codg`) REFERENCES `tipo_servicio` (`servicio_codg`),
  ADD CONSTRAINT `vehiculo_ibfk_7` FOREIGN KEY (`tipo_vehiculo_codg`) REFERENCES `tipo_vehiculo` (`tipo_vehiculo_codg`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
