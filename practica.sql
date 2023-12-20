-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2023 a las 21:47:40
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_cliente`
--

CREATE TABLE `datos_cliente` (
  `datos_cliente_id` int(11) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Nombre_cliente` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_cliente`
--

INSERT INTO `datos_cliente` (`datos_cliente_id`, `Direccion`, `Nombre_cliente`) VALUES
(1, 'porvenir 1771', 'Vicente Mardones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_produccion`
--

CREATE TABLE `datos_produccion` (
  `datos-produccion_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `folio` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `nombre_pedido` varchar(50) NOT NULL,
  `op` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_produccion`
--

INSERT INTO `datos_produccion` (`datos-produccion_id`, `fecha`, `folio`, `item`, `nombre_pedido`, `op`) VALUES
(1, '2023-12-13', 44570, 25, 'puertas mantova', 45650);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `User_id` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Usuario` varchar(40) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Tipo_usuario` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`User_id`, `Nombre`, `Usuario`, `Password`, `Tipo_usuario`) VALUES
(1, 'Marcelo Mardones', 'Marcelosky', 'clave1234', 'admin'),
(2, 'Cristobal Mardones', 'Sleepy', 'clave4321', 'user'),
(3, 'Cristobal Mardones', '123', '123', 'user');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquina`
--

CREATE TABLE `maquina` (
  `maquina_id` int(11) NOT NULL,
  `nombre_maquina` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maquina`
--

INSERT INTO `maquina` (`maquina_id`, `nombre_maquina`) VALUES
(1, 'tupí'),
(2, 'escuadradora simple'),
(3, 'perforadora'),
(4, 'escopladora'),
(5, 'espigadora'),
(6, 'router'),
(7, 'estampadora'),
(8, 'snack'),
(9, 'lijadora de canto'),
(10, 'lijadora oscilante'),
(11, 'lijadora plancha'),
(12, 'lijadora orbital'),
(13, 'prensas'),
(14, 'CnC'),
(15, 'Manual');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquina_proceso_fk`
--

CREATE TABLE `maquina_proceso_fk` (
  `maquina_procesos_fk_id` int(11) NOT NULL,
  `maquina_id` int(11) NOT NULL,
  `procesos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maquina_proceso_fk`
--

INSERT INTO `maquina_proceso_fk` (`maquina_procesos_fk_id`, `maquina_id`, `procesos_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5),
(6, 3, 6),
(7, 4, 7),
(8, 5, 8),
(9, 6, 9),
(10, 7, 10),
(11, 8, 11),
(12, 9, 12),
(13, 10, 13),
(14, 11, 14),
(15, 12, 15),
(16, 13, 16),
(17, 14, 17),
(18, 15, 18),
(19, 15, 19),
(20, 15, 20),
(21, 15, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operadores`
--

CREATE TABLE `operadores` (
  `operadores_id` int(11) NOT NULL,
  `codigo_operador` int(11) NOT NULL,
  `nombre_operador` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `operadores`
--

INSERT INTO `operadores` (`operadores_id`, `codigo_operador`, `nombre_operador`) VALUES
(1, 2498, 'Marcelo Mardones'),
(2, 2499, 'Cristobal Mardones'),
(3, 2500, 'Vicente Mardones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesos`
--

CREATE TABLE `procesos` (
  `procesos_id` int(11) NOT NULL,
  `nombre_proceso` varchar(80) NOT NULL,
  `max_operadores` int(2) DEFAULT NULL,
  `pzs_hra` float DEFAULT NULL,
  `medidor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `procesos`
--

INSERT INTO `procesos` (`procesos_id`, `nombre_proceso`, `max_operadores`, `pzs_hra`, `medidor`) VALUES
(1, 'rodon canto', 2, 180, 'ml/hra'),
(2, 'rodon punta', 2, 140, 'ml/hra'),
(3, 'ranurado', 2, 180, 'ml/hra'),
(4, 'corte con cargador', 2, 90, 'ml/hra'),
(5, 'corte sin cargador', 1, 80, 'op/hra'),
(6, 'perforacion', 1, 20, 'op/hra'),
(7, 'escoplado', 1, 120, 'op/hra'),
(8, 'espigado', 1, 120, 'op/hra'),
(9, 'rodon', 1, 150, 'pza/hra'),
(10, 'estampado', 1, 180, 'op/hra'),
(11, 'corte tarugo', 1, 25, 'kgr/hra'),
(12, 'lijado de canto', 2, 540, 'ml/hra'),
(13, 'lijado en oscilante', 1, 240, 'pza/hra'),
(14, 'lijado en plancha', 1, 80, 'pza/hra'),
(15, 'lijado tabla de picar ', 1, 15, 'pza/hra'),
(16, 'prensado puerta', 3, 12, 'pza/hra'),
(17, 'perforado batiente', 1, 80, 'pza/hra'),
(18, 'aceitado tabla picar', 1, 140, 'pza/hra'),
(19, 'lijado susquehanna recuperacion', 1, 60, 'pza/hra'),
(20, 'lijado marco L', 1, 14, 'pza/hra'),
(21, 'ensamblado bancas', 1, 6, 'pza/hra'),
(62, 'marcelo', 1, 1, 'op/hra'),
(63, 'marcelo', 1, 1, 'op/hra'),
(64, 'prueba de eliminacion5', 1, 1, 'kgr/hra'),
(65, 'prueba de eliminacion', 1, 1, 'ml/hra'),
(66, 'marcelo', 1, 1, 'op/hra'),
(67, 'marcelo', 1, 1, 'kgr/hra'),
(68, 'marcelo', 1, 1, 'op/hra'),
(69, 'marcelo', 1, 1, 'op/hra'),
(70, 'prueba de eliminacion5', 1, 1, 'ml/hra'),
(71, 'marcelo', 1, 1, 'op/hra'),
(72, 'qwe', 1, 1, 'op/hra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_maquina_fk`
--

CREATE TABLE `proceso_maquina_fk` (
  `proceso_maquina_fk_id` int(11) NOT NULL,
  `procesos_id` int(11) NOT NULL,
  `maquina_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proceso_maquina_fk`
--

INSERT INTO `proceso_maquina_fk` (`proceso_maquina_fk_id`, `procesos_id`, `maquina_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 2),
(5, 5, 2),
(6, 6, 3),
(7, 7, 4),
(8, 8, 5),
(9, 9, 6),
(10, 10, 7),
(11, 11, 8),
(12, 12, 9),
(13, 13, 10),
(14, 14, 11),
(15, 15, 12),
(16, 16, 13),
(17, 17, 14),
(18, 18, 15),
(19, 19, 15),
(20, 20, 15),
(21, 21, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccion`
--

CREATE TABLE `produccion` (
  `produccion_id` int(11) NOT NULL,
  `nombre_proceso` varchar(50) NOT NULL,
  `maquina` varchar(40) NOT NULL,
  `folio` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cod_proceso` int(11) NOT NULL,
  `cantidad_pzs` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `produccion`
--

INSERT INTO `produccion` (`produccion_id`, `nombre_proceso`, `maquina`, `folio`, `fecha`, `cod_proceso`, `cantidad_pzs`, `total`) VALUES
(1, 'ensamblado bancas', '15', 363636, '2023-12-14', 21, 1050, 44),
(2, 'lijado marco L', '15', 9848, '2023-12-18', 20, 8000, 788),
(3, 'espigado', '5', 9989898, '2023-12-18', 8, 500, 422);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccion_linea`
--

CREATE TABLE `produccion_linea` (
  `produccion_linea_id` int(11) NOT NULL,
  `produccion_id` int(11) DEFAULT NULL,
  `codigo_operario` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `produccion_linea`
--

INSERT INTO `produccion_linea` (`produccion_linea_id`, `produccion_id`, `codigo_operario`, `total`) VALUES
(1, 1, 2498, 42),
(2, 2, 2498, 788),
(3, 3, 2498, 42);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_cliente`
--
ALTER TABLE `datos_cliente`
  ADD PRIMARY KEY (`datos_cliente_id`);

--
-- Indices de la tabla `datos_produccion`
--
ALTER TABLE `datos_produccion`
  ADD PRIMARY KEY (`datos-produccion_id`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `login_un` (`Usuario`);

--
-- Indices de la tabla `maquina`
--
ALTER TABLE `maquina`
  ADD PRIMARY KEY (`maquina_id`);

--
-- Indices de la tabla `maquina_proceso_fk`
--
ALTER TABLE `maquina_proceso_fk`
  ADD PRIMARY KEY (`maquina_procesos_fk_id`);

--
-- Indices de la tabla `operadores`
--
ALTER TABLE `operadores`
  ADD PRIMARY KEY (`operadores_id`);

--
-- Indices de la tabla `procesos`
--
ALTER TABLE `procesos`
  ADD PRIMARY KEY (`procesos_id`);

--
-- Indices de la tabla `proceso_maquina_fk`
--
ALTER TABLE `proceso_maquina_fk`
  ADD PRIMARY KEY (`proceso_maquina_fk_id`);

--
-- Indices de la tabla `produccion`
--
ALTER TABLE `produccion`
  ADD PRIMARY KEY (`produccion_id`);

--
-- Indices de la tabla `produccion_linea`
--
ALTER TABLE `produccion_linea`
  ADD PRIMARY KEY (`produccion_linea_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos_cliente`
--
ALTER TABLE `datos_cliente`
  MODIFY `datos_cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `datos_produccion`
--
ALTER TABLE `datos_produccion`
  MODIFY `datos-produccion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `maquina`
--
ALTER TABLE `maquina`
  MODIFY `maquina_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `maquina_proceso_fk`
--
ALTER TABLE `maquina_proceso_fk`
  MODIFY `maquina_procesos_fk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `operadores`
--
ALTER TABLE `operadores`
  MODIFY `operadores_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `procesos`
--
ALTER TABLE `procesos`
  MODIFY `procesos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `proceso_maquina_fk`
--
ALTER TABLE `proceso_maquina_fk`
  MODIFY `proceso_maquina_fk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `produccion`
--
ALTER TABLE `produccion`
  MODIFY `produccion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `produccion_linea`
--
ALTER TABLE `produccion_linea`
  MODIFY `produccion_linea_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
