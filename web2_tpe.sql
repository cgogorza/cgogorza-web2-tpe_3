-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2023 a las 19:49:52
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
-- Base de datos: `web2_tpe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `inscripcion_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `objetivo` varchar(100) NOT NULL,
  `materia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`inscripcion_id`, `nombre`, `email`, `objetivo`, `materia_id`) VALUES
(12, 'Franco Leali', 'franleali@gmail.com', 'Final', 2),
(13, 'Marina Blasón', 'marublason@gmail.com', 'TPE', 1),
(14, 'Claudia', 'claudiagogorza65@gmail.com', 'TPE', 1),
(15, 'Marcelo', 'cheloetal@gmail.com', 'Final', 2),
(16, 'Fabri Leali', 'fabrileali@gmail.com', 'Final', 2),
(20, 'claudia', 'claudiagogorza65@gmail.com', 'tpe', 2),
(21, 'Marcelo', 'cheloetal@gmail.com', 'Final', 3),
(23, 'Marina Blasón', 'marublason@gmail.com', 'Final', 2),
(24, 'Fabri Leali', 'fabrileali@gmail.com', 'Final', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `materia_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `profesor` varchar(100) NOT NULL,
  `horario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`materia_id`, `nombre`, `profesor`, `horario`) VALUES
(1, 'Web2', 'Franco', 'noche'),
(2, 'Programación 2', 'Marcelo', 'tarde'),
(3, 'Tecnología de la Información en las Organizaciones', 'Florencia', 'noche'),
(4, 'Inglés 2', 'María', 'mañana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `email`, `password`) VALUES
(1, 'web@admin.com', '$2y$10$b.PgSbBFmyjfT0arAQVHVeBfGFNGf2AG0iIBKNUPxABlU33g.Hg0e');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`inscripcion_id`),
  ADD KEY `materia_id` (`materia_id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`materia_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `inscripcion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `materia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `inscripciones_ibfk_1` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`materia_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
