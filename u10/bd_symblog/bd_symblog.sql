-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-03-2023 a las 12:26:13
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
-- Base de datos: `bd_symblog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `author` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `blog` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `image` varchar(64) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `tags` longtext COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`id`, `title`, `author`, `blog`, `image`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'A day with Symfony2', 'dsyph3r', 'Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.', 'beach.jpg', 'symfony2, php, paradise, symblog', '2023-02-19 12:13:37', '2023-02-19 12:13:37'),
(2, 'The pool on the roof must have a leak', 'Zero Cool', 'Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Na. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis.', 'pool_leak.jpg', 'pool, leaky, hacked, movie, hacking, symblog', '2011-07-23 06:12:33', '2011-07-23 06:12:33'),
(3, 'Misdirection. What the eyes see and the ears hear, the mind believes', 'Gabriel', 'Lorem ipsumvehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.', 'misdirection.jpg', 'misdirection, magic, movie, hacking, symblog', '2011-07-16 16:14:06', '2011-07-16 16:14:06'),
(4, 'The grid - A digital frontier', 'Kevin Flynn', 'Lorem commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra.', 'the_grid.jpg', 'grid, daftpunk, movie, symblog', '2011-06-02 18:54:12', '2011-06-02 18:54:12'),
(5, 'You\'re either a one or a zero. Alive or dead', 'Gary Winston', 'Lorem ipsum dolor sit amet, consectetur adipiscing elittibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.', 'one_or_zero.jpg', 'binary, one, zero, alive, dead, !trusting, movie, symblog', '2011-04-25 15:34:18', '2011-04-25 15:34:18'),
(6, 'A day with Symfony2', 'dsyph3r', 'Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.', 'beach.jpg', 'symfony2, php, paradise, symblog', '2023-02-19 12:13:38', '2023-02-19 12:13:38'),
(7, 'The pool on the roof must have a leak', 'Zero Cool', 'Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Na. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis.', 'pool_leak.jpg', 'pool, leaky, hacked, movie, hacking, symblog', '2011-07-23 06:12:33', '2011-07-23 06:12:33'),
(8, 'Misdirection. What the eyes see and the ears hear, the mind believes', 'Gabriel', 'Lorem ipsumvehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.', 'misdirection.jpg', 'misdirection, magic, movie, hacking, symblog', '2011-07-16 16:14:06', '2011-07-16 16:14:06'),
(9, 'The grid - A digital frontier', 'Kevin Flynn', 'Lorem commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra.', 'the_grid.jpg', 'grid, daftpunk, movie, symblog', '2011-06-02 18:54:12', '2011-06-02 18:54:12'),
(10, 'You\'re either a one or a zero. Alive or dead', 'Gary Winston', 'Lorem ipsum dolor sit amet, consectetur adipiscing elittibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.', 'one_or_zero.jpg', 'binary, one, zero, alive, dead, !trusting, movie, symblog', '2011-04-25 15:34:18', '2011-04-25 15:34:18'),
(11, 'Titulo', 'Autor', 'Blog', 'Imagen', 'Tags', '2023-02-20 09:06:02', '2023-02-20 09:06:02'),
(12, 'Titulo', 'Autor', 'Blog', 'Imagen', 'Tags', '2023-02-20 09:06:03', '2023-02-20 09:06:03'),
(13, 'Titulo1', 'Autor1', 'Blog1', 'Imagen1', 'Tags1', '2023-02-20 09:06:47', '2023-02-20 09:06:47'),
(14, 'Titulo1', 'Autor1', 'Blog1', 'Imagen1', 'Tags1', '2023-02-20 09:06:47', '2023-02-20 09:06:47'),
(15, 'Titulo2', 'Autor2', 'Blog2', 'Imagen2', 'Tags2', '2023-02-20 09:08:06', '2023-02-20 09:08:06'),
(16, 'Titulo2', 'Autor2', 'Blog2', 'Imagen2', 'Tags2', '2023-02-20 09:08:07', '2023-02-20 09:08:07'),
(17, '', NULL, '', NULL, NULL, '2023-02-20 09:10:15', '2023-02-20 09:10:05'),
(18, 'Titulo2', 'Autor2', 'Blog2', 'Imagen2', 'Tags2', '2023-02-20 09:10:33', '2023-02-20 09:10:33'),
(19, 'Titulo2', 'Autor2', 'Blog2', 'Imagen2', 'Tags2', '2023-02-20 09:10:34', '2023-02-20 09:10:34'),
(20, 'Titulo3', 'Autor2', 'Blog2', 'Imagen2', 'Tags2', '2023-02-20 09:13:22', '2023-02-20 09:13:22'),
(21, 'Titulo3', 'Autor2', 'Blog2', 'Imagen2', 'Tags2', '2023-02-20 09:13:23', '2023-02-20 09:13:23'),
(22, 'Titulo3', 'Autor2', 'Blog2', 'Imagen2', 'Tags2', '2023-02-20 09:14:30', '2023-02-20 09:14:30'),
(23, 'Titulo3', 'Autor2', 'Blog2', 'Imagen2', 'Tags2', '2023-02-20 09:14:30', '2023-02-20 09:14:30'),
(24, 'Titulo3', 'Autor2', 'Blog2', 'Imagen2', 'Tags2', '2023-02-20 09:15:23', '2023-02-20 09:15:23'),
(25, 'Titulo4', 'Autor2', 'Blog2', 'Imagen2', 'Tags2', '2023-02-20 09:15:37', '2023-02-20 09:15:37'),
(26, 'prueba', 'prueba', 'prueba', 'prueba', 'prueba', '2023-02-20 09:18:54', '2023-02-20 09:18:54'),
(27, 'prueba', 'prueba', 'prueba', 'prueba', 'prueba', '2023-02-20 09:24:04', '2023-02-20 09:24:04'),
(28, 'prueba', 'prueba', 'prueba', 'prueba', 'prueba', '2023-02-20 09:24:59', '2023-02-20 09:24:59'),
(29, 'prueba', 'prueba', 'prueba', 'prueba', 'prueba', '2023-02-20 09:28:21', '2023-02-20 09:28:21'),
(30, 'dfgfd', 'dfgd', 'fdgdfg', '63f9edc2e7380prueba.jpeg', 'dfg', '2023-02-25 11:15:14', '2023-02-25 11:15:14'),
(31, 'nuevoBlog', 'maria', 'dfsdfsdf', '640ede3caaf54one_or_zero.jpg', 'symblog', '2023-03-13 08:26:36', '2023-03-13 08:26:36'),
(32, 'nuevoBlog', 'maria', 'dfsdfsdf', '640ede733fcc4one_or_zero.jpg', 'symblog', '2023-03-13 08:27:31', '2023-03-13 08:27:31'),
(33, 'blogNuevo', 'maria', 'sdfsdfsdf', '640edf70c5c35the_grid.jpg', 'symblog', '2023-03-13 08:31:44', '2023-03-13 08:31:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `blog_id` int DEFAULT NULL,
  `user` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `comment` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `comment`
--

INSERT INTO `comment` (`id`, `blog_id`, `user`, `comment`, `approved`, `created_at`, `updated_at`) VALUES
(1, 1, 'symfony', 'To make a long story short. You can\'t go wrong by choosing Symfony! And no one has ever been fired for using Symfony.', 1, '2023-02-19 12:18:36', '2023-02-19 12:18:36'),
(2, 1, 'David', 'To make a long story short. Choosing a framework must not be taken lightly; it is a long-term commitment. Make sure that you make the right selection!', 1, '2023-02-19 12:18:36', '2023-02-19 12:18:36'),
(3, 2, 'Dade', 'Anything else, mom? You want me to mow the lawn? Oops! I forgot, New York, No grass.', 1, '2023-02-19 12:18:36', '2023-02-19 12:18:36'),
(4, 2, 'Kate', 'Are you challenging me? ', 1, '2023-02-19 12:18:36', '2023-02-19 12:18:36'),
(5, 2, 'Dade', 'Name your stakes.', 1, '2023-02-19 12:18:36', '2023-02-19 12:18:36'),
(6, 2, 'Kate', 'If I win, you become my slave.', 1, '2023-02-19 12:18:36', '2023-02-19 12:18:36'),
(7, 2, 'Dade', 'Your SLAVE?', 1, '2023-02-19 12:18:36', '2023-02-19 12:18:36'),
(8, 2, 'Kate', 'You wish! You\'ll do shitwork, scan, crack copyrights...', 1, '2023-02-19 12:18:36', '2023-02-19 12:18:36'),
(9, 2, 'Dade', 'And if I win?', 1, '2023-02-19 12:18:36', '2023-02-19 12:18:36'),
(10, 2, 'Kate', 'Make it my first-born!', 1, '2023-02-19 12:18:36', '2023-02-19 12:18:36'),
(11, 2, 'Dade', 'Make it our first-date!', 1, '2023-02-19 12:18:36', '2023-02-19 12:18:36'),
(12, 2, 'Kate', 'I don\'t DO dates. But I don\'t lose either, so you\'re on!', 1, '2023-02-19 12:18:36', '2023-02-19 12:18:36'),
(13, 3, 'Stanley', 'It\'s not gonna end like this.', 1, '2023-02-19 12:18:36', '2023-02-19 12:18:36'),
(14, 3, 'Gabriel', 'Oh, come on, Stan. Not everything ends the way you think it should. Besides, audiences love happy endings.', 1, '2023-02-19 12:18:36', '2023-02-19 12:18:36'),
(15, 5, 'Mile', 'Doesn\'t Bill Gates have something like that?', 1, '2023-02-19 12:18:36', '2023-02-19 12:18:36'),
(16, 5, 'Gary', 'Bill Who?', 1, '2023-02-19 12:18:36', '2023-02-19 12:18:36'),
(17, 1, 'symfony', 'To make a long story short. You can\'t go wrong by choosing Symfony! And no one has ever been fired for using Symfony.', 1, '2023-02-19 12:18:37', '2023-02-19 12:18:37'),
(18, 1, 'David', 'To make a long story short. Choosing a framework must not be taken lightly; it is a long-term commitment. Make sure that you make the right selection!', 1, '2023-02-19 12:18:37', '2023-02-19 12:18:37'),
(19, 2, 'Dade', 'Anything else, mom? You want me to mow the lawn? Oops! I forgot, New York, No grass.', 1, '2023-02-19 12:18:37', '2023-02-19 12:18:37'),
(20, 2, 'Kate', 'Are you challenging me? ', 1, '2023-02-19 12:18:37', '2023-02-19 12:18:37'),
(21, 2, 'Dade', 'Name your stakes.', 1, '2023-02-19 12:18:37', '2023-02-19 12:18:37'),
(22, 2, 'Kate', 'If I win, you become my slave.', 1, '2023-02-19 12:18:37', '2023-02-19 12:18:37'),
(23, 2, 'Dade', 'Your SLAVE?', 1, '2023-02-19 12:18:37', '2023-02-19 12:18:37'),
(24, 2, 'Kate', 'You wish! You\'ll do shitwork, scan, crack copyrights...', 1, '2023-02-19 12:18:37', '2023-02-19 12:18:37'),
(25, 2, 'Dade', 'And if I win?', 1, '2023-02-19 12:18:37', '2023-02-19 12:18:37'),
(26, 2, 'Kate', 'Make it my first-born!', 1, '2023-02-19 12:18:37', '2023-02-19 12:18:37'),
(27, 2, 'Dade', 'Make it our first-date!', 1, '2023-02-19 12:18:37', '2023-02-19 12:18:37'),
(28, 2, 'Kate', 'I don\'t DO dates. But I don\'t lose either, so you\'re on!', 1, '2023-02-19 12:18:37', '2023-02-19 12:18:37'),
(29, 3, 'Stanley', 'It\'s not gonna end like this.', 1, '2023-02-19 12:18:37', '2023-02-19 12:18:37'),
(30, 3, 'Gabriel', 'Oh, come on, Stan. Not everything ends the way you think it should. Besides, audiences love happy endings.', 1, '2023-02-19 12:18:37', '2023-02-19 12:18:37'),
(31, 5, 'Mile', 'Doesn\'t Bill Gates have something like that?', 1, '2023-02-19 12:18:37', '2023-02-19 12:18:37'),
(32, 5, 'Gary', 'Bill Who?', 1, '2023-02-19 12:18:37', '2023-02-19 12:18:37'),
(43, 1, 'Anonimus', 'comentaar', 1, '2023-03-13 07:53:02', '2023-03-13 07:53:02'),
(44, 33, 'Anonimus', 'comentario nuevo', 1, '2023-03-13 08:32:02', '2023-03-13 08:32:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nombre` varchar(256) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `user` varchar(128) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `perfil` varchar(25) COLLATE utf8mb3_spanish2_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `user`, `email`, `password`, `perfil`, `created_at`, `updated_at`) VALUES
(3, 'maria14998', 'maria14998', 'maria14998@gmail.com', '1234', 'user', '2023-02-25 22:49:43', '2023-02-25 22:49:43'),
(4, 'admin', 'admin', 'admin@gmail.com', 'admin', 'admin', '2023-02-25 23:11:13', '2023-02-25 23:11:13'),
(5, 'prueba', 'prueba', 'prueba', 'prueba', 'user', '2023-03-02 12:55:56', '2023-03-02 12:55:56'),
(6, 'admin', 'admin', 'admin', '$2y$10$lAMJxvHpFJDGRMozMD8QTe2FoTOGhfhKilknLsRGZ41v5XJ9lIpmW', 'admin', '2023-03-03 13:34:09', '2023-03-03 13:34:09'),
(7, 'prueba', 'prueba', 'prueba@gmail.com', '12345', 'user', '2023-03-13 08:30:06', '2023-03-13 08:30:06');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9474526CDAE07E97` (`blog_id`);

--
-- Indices de la tabla `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526CDAE07E97` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
