-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-03-2023 a las 12:25:13
-- Versión del servidor: 8.0.32-0ubuntu0.22.04.2
-- Versión de PHP: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_recetas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaboradores`
--

CREATE TABLE `colaboradores` (
  `cuenta` varchar(50) NOT NULL,
  `saldo` decimal(12,2) DEFAULT NULL,
  `idusuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `colaboradores`
--

INSERT INTO `colaboradores` (`cuenta`, `saldo`, `idusuario`) VALUES
('colaborador', '200.00', 6),
('colaborador2', '500.00', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE `config` (
  `id` varchar(45) NOT NULL,
  `tiempoinactividad` int DEFAULT NULL,
  `beneficios` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`id`, `tiempoinactividad`, `beneficios`) VALUES
('1', 60, '10000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `perfil` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`perfil`) VALUES
('Admin'),
('Collaborator'),
('User');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `id` int NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `ingredientes` mediumtext,
  `elaboracion` mediumtext,
  `etiquetas` varchar(250) DEFAULT NULL,
  `publica` tinyint DEFAULT NULL,
  `imagen` varchar(250) DEFAULT NULL,
  `idColaborador` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`id`, `titulo`, `ingredientes`, `elaboracion`, `etiquetas`, `publica`, `imagen`, `idColaborador`) VALUES
(2, 'receta2222', 'receta', 'receta', 'receta', 1, 'prueba.jpeg', 6),
(3, 'receta22', 'receta', 'receta', 'receta', 1, 'prueba.jpeg', 6),
(4, 'sdf', 'sdf', 'sdf', 'df', 1, 'beach.jpg', 6),
(5, 'fhgf', 'fgh', 'fhgf', 'fghgfh', 1, 'beach.jpg', 6),
(12, 'tyu', 'tyu', 'tyu', 'tyutyu', 1, 'pool_leak.jpg', 6),
(14, 'hghj', 'df', 'sdf', 'dsf', 1, 'the_grid.jpg', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_usuarios_perfiles`
--

CREATE TABLE `r_usuarios_perfiles` (
  `Perfiles_perfil` varchar(15) NOT NULL,
  `usuarios_id` int NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `r_usuarios_perfiles`
--

INSERT INTO `r_usuarios_perfiles` (`Perfiles_perfil`, `usuarios_id`, `id`) VALUES
('User', 1, 1),
('User', 2, 2),
('User', 3, 3),
('Admin', 4, 4),
('Admin', 5, 5),
('Collaborator', 6, 6),
('Collaborator', 7, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_usuarios_recetas_favoritas`
--

CREATE TABLE `r_usuarios_recetas_favoritas` (
  `id` int NOT NULL,
  `usuarios_id` int NOT NULL,
  `recetas_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `r_usuarios_recetas_favoritas`
--

INSERT INTO `r_usuarios_recetas_favoritas` (`id`, `usuarios_id`, `recetas_id`) VALUES
(1, 1, 2),
(2, 1, 12),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_usuarios_recetas_votacion`
--

CREATE TABLE `r_usuarios_recetas_votacion` (
  `id` int NOT NULL,
  `usuarios_id` int NOT NULL,
  `recetas_id` int NOT NULL,
  `puntuacion` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `usuario` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `estado` enum('Activo','Bloqueado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `estado`) VALUES
(1, 'Usuario1', 'usuario1', 'usuario1', 'Activo'),
(2, 'Usuario2', 'usuario2', 'usuario2', 'Activo'),
(3, 'Usuario3', 'usuario3', 'usuario3', 'Activo'),
(4, 'Usuario administrador 1', 'admin1', 'admin1', 'Activo'),
(5, 'Usuario administrador 2', 'admin2', 'admin2', 'Activo'),
(6, 'Usuario colaborador 1', 'colaborador1', 'colaborador1', 'Activo'),
(7, 'Usuario colaborador 2', 'colaborador2', 'colaborador2', 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indices de la tabla `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`perfil`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_recetas_colaboradores1_idx` (`idColaborador`);

--
-- Indices de la tabla `r_usuarios_perfiles`
--
ALTER TABLE `r_usuarios_perfiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Perfiles_has_usuarios_usuarios1_idx` (`usuarios_id`),
  ADD KEY `fk_Perfiles_has_usuarios_Perfiles1_idx` (`Perfiles_perfil`);

--
-- Indices de la tabla `r_usuarios_recetas_favoritas`
--
ALTER TABLE `r_usuarios_recetas_favoritas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuarios_has_recetas_recetas3_idx` (`recetas_id`),
  ADD KEY `fk_usuarios_has_recetas_usuarios2_idx` (`usuarios_id`);

--
-- Indices de la tabla `r_usuarios_recetas_votacion`
--
ALTER TABLE `r_usuarios_recetas_votacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuarios_has_recetas_recetas2_idx` (`recetas_id`),
  ADD KEY `fk_usuarios_has_recetas_usuarios1_idx` (`usuarios_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_UNIQUE` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `r_usuarios_recetas_favoritas`
--
ALTER TABLE `r_usuarios_recetas_favoritas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD CONSTRAINT `fk_colaboradores_usuarios1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD CONSTRAINT `fk_recetas_colaboradores1` FOREIGN KEY (`idColaborador`) REFERENCES `colaboradores` (`idusuario`);

--
-- Filtros para la tabla `r_usuarios_perfiles`
--
ALTER TABLE `r_usuarios_perfiles`
  ADD CONSTRAINT `fk_Perfiles_has_usuarios_Perfiles1` FOREIGN KEY (`Perfiles_perfil`) REFERENCES `perfiles` (`perfil`),
  ADD CONSTRAINT `fk_Perfiles_has_usuarios_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `r_usuarios_recetas_favoritas`
--
ALTER TABLE `r_usuarios_recetas_favoritas`
  ADD CONSTRAINT `fk_usuarios_has_recetas_recetas3` FOREIGN KEY (`recetas_id`) REFERENCES `recetas` (`id`),
  ADD CONSTRAINT `fk_usuarios_has_recetas_usuarios2` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `r_usuarios_recetas_votacion`
--
ALTER TABLE `r_usuarios_recetas_votacion`
  ADD CONSTRAINT `fk_usuarios_has_recetas_recetas2` FOREIGN KEY (`recetas_id`) REFERENCES `recetas` (`id`),
  ADD CONSTRAINT `fk_usuarios_has_recetas_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
