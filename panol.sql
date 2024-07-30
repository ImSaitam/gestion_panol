-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2024 a las 00:32:47
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `panol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE `aulas` (
  `id_aulas` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `piso` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`id_aulas`, `nombre`, `piso`) VALUES
(1, 'salon 1', 'PB'),
(2, 'salon 2', 'PB'),
(3, 'salon 11', 'P1'),
(4, 'salon 12', 'P1'),
(5, 'salon 13', 'P1'),
(6, 'salon 14', 'P1'),
(7, 'salon 15', 'P1'),
(8, 'salon 16', 'P1'),
(9, 'salon 17', 'P1'),
(10, 'salon 18', 'P1'),
(11, 'salon 19', 'P1'),
(12, 'taller ciclo basico', 'PB'),
(13, 'taller 2', 'PB'),
(14, 'taller 3', 'PB'),
(15, 'laboratorio de automatismos', 'PB'),
(16, 'taller de lenguajes tecnologicos', 'PB'),
(17, 'laboratorio 1', 'P2'),
(18, 'laboratorio 2', 'P2'),
(19, 'laboratorio 3', 'P2'),
(20, 'laboratorio diseño electronico', 'P2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `descripcion`, `cantidad`) VALUES
(1, 'martillo', 'sin descripción', 2),
(2, 'escofina', 'sin descripción', 10),
(3, 'clavos', 'sin descripción', 400),
(4, 'destornillador', 'sin descripción', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(100) NOT NULL,
  `curso` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `curso`) VALUES
(1, '1° 1°'),
(2, '1° 2°'),
(3, '1° 3°'),
(4, '1° 4°'),
(5, '1° 5°'),
(6, '1° 6°'),
(7, '2° 1°'),
(8, '2° 2°'),
(9, '2° 3°'),
(10, '2° 4°'),
(11, '2° 5°'),
(12, '2° 6°'),
(13, '3° 1°'),
(14, '3° 2°'),
(15, '3° 3°'),
(16, '3° 4°'),
(17, '4° 1°'),
(18, '4° 2°'),
(19, '4° 3°'),
(20, '4° 4°'),
(21, '5° 1°'),
(22, '5° 2°'),
(23, '5° 3°'),
(24, '6° 1°'),
(25, '6° 2°'),
(26, '6° 3°'),
(27, '7° 1°'),
(28, '7° 2°');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramientaxunidad`
--

CREATE TABLE `herramientaxunidad` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `observacion` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `estado` enum('pendiente','en curso','entregado','cancelado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `herramientaxunidad`
--

INSERT INTO `herramientaxunidad` (`id`, `id_categoria`, `observacion`, `foto`, `estado`) VALUES
(1, 1, 'Observación 1', 'foto1.jpg', 'pendiente'),
(2, 2, 'Observación 2', 'foto2.jpg', 'en curso'),
(3, 3, 'Observación 3', 'foto3.jpg', 'entregado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `usuario_solicitante` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL,
  `estado` enum('pendiente','en curso','entregado','') NOT NULL,
  `observaciones` varchar(200) NOT NULL,
  `pedido` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`pedido`)),
  `fk_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `fecha_pedido`, `usuario_solicitante`, `id_aula`, `estado`, `observaciones`, `pedido`, `fk_curso`) VALUES
(1, '2024-06-10', 1, 1, 'pendiente', 'Observación 1', '{\"herramientas\": [1,2]}', 1),
(3, '2024-06-10', 1, 3, 'entregado', 'Observación 3', '{\"herramientas\": [2,3]}', 3),
(12, '2024-06-10', 2, 3, 'pendiente', '', '{\"herramientas\":[4],\"cantidad\":[2]}', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_herramienta` int(11) NOT NULL,
  `observaciones` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion_herramienta`
--

CREATE TABLE `ubicacion_herramienta` (
  `id` int(11) NOT NULL,
  `ubicacion` enum('armario','pared','','') NOT NULL,
  `estante` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ubicacion_herramienta`
--

INSERT INTO `ubicacion_herramienta` (`id`, `ubicacion`, `estante`) VALUES
(1, 'armario', 'A1'),
(2, 'pared', 'P2'),
(3, '', 'B3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_completo` varchar(150) NOT NULL,
  `username` varchar(70) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `cargo` enum('panolero','encargado_panol','admin','') NOT NULL,
  `horario` varchar(20) NOT NULL,
  `fotoperfil` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_completo`, `username`, `correo`, `contrasena`, `cargo`, `horario`, `fotoperfil`) VALUES
(1, 'Matias DS', 'matiasds', 'matias@desanto.com', '$2y$10$EScRVeUuJZQPsiC2aX7hN.1acMyW8.M0JCPoSOg5qEti5B2iieX5W', 'panolero', '7:50 a 11:55', ''),
(2, 'Peponcio Varela', 'a', 'a', '$2y$10$uwyu9WZMEM8ZllIDqiQoqeZfbfV3l68/m/etLKgyb4h01akH5AGfK', 'panolero', '7:50 a 11:55', ''),
(3, 'Pañolero fantasma', 'b', 'a@gmail', '$2y$10$97stRXXQLEfDOGFNK3HK2uCXHYsetlqmysFto5Ksg5.OhEBOV9UIC', 'panolero', '00:00 a 00:00', ''),
(4, 'luciano', 'luciano', 'luciano.barbinii@gmail.com', '$2y$10$7ikIwuuyOEutaCiHm/tve..IrNGZfbwWswrUOWj9EEtAlCY2ah.di', 'panolero', '7:50 a 11:55', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id_aulas`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `herramientaxunidad`
--
ALTER TABLE `herramientaxunidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `usuario_solicitante` (`usuario_solicitante`),
  ADD KEY `id_aula` (`id_aula`),
  ADD KEY `fk_pedidos_curso` (`fk_curso`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`,`id_pedido`,`id_herramienta`),
  ADD KEY `id_herramienta` (`id_herramienta`);

--
-- Indices de la tabla `ubicacion_herramienta`
--
ALTER TABLE `ubicacion_herramienta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id_aulas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `herramientaxunidad`
--
ALTER TABLE `herramientaxunidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ubicacion_herramienta`
--
ALTER TABLE `ubicacion_herramienta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `herramientaxunidad`
--
ALTER TABLE `herramientaxunidad`
  ADD CONSTRAINT `fk_herramientaxunidad_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedidos_aula` FOREIGN KEY (`id_aula`) REFERENCES `aulas` (`id_aulas`),
  ADD CONSTRAINT `fk_pedidos_curso` FOREIGN KEY (`fk_curso`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `fk_pedidos_usuario` FOREIGN KEY (`usuario_solicitante`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `fk_reportes_herramienta` FOREIGN KEY (`id_herramienta`) REFERENCES `herramientaxunidad` (`id`),
  ADD CONSTRAINT `fk_reportes_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
