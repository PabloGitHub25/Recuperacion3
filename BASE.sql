-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2024 a las 00:10:41
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
-- Base de datos: `gestiontareas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idAdmin` int(11) NOT NULL,
  `nombreAdmin` varchar(100) NOT NULL,
  `emailAdmin` varchar(30) NOT NULL,
  `contraseñaAdmin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idAdmin`, `nombreAdmin`, `emailAdmin`, `contraseñaAdmin`) VALUES
(1, 'Pablo', 'pablo@gmail.com', '1234'),
(2, 'Erick', 'erick@gmail.com', '1234'),
(3, 'Sebastian', 'sebastian@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `idTarea` int(11) NOT NULL,
  `nombreTarea` varchar(100) NOT NULL,
  `tipoTarea` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`idTarea`, `nombreTarea`, `tipoTarea`, `descripcion`) VALUES
(1, 'Asistencia', 'Educación', 'Asistir a la escuela regularmente y esforzarse por aprender y alcanzar buenos resultados académicos'),
(2, 'Exploración educativa', 'Educación', 'Explorar opciones educativas futuras, como la universidad, la formación profesional o la educación técnica.'),
(3, 'Desarollo de habilidades', 'Educación', 'Desarrollar habilidades de estudio efectivas y aprender a gestionar el tiempo de manera eficiente.'),
(4, 'Autoaceptación y confianza.', 'Desarrollo Personal', 'Fomentar la autoconciencia y la autoestima positiva.'),
(5, 'Solución de problemas y elecciones.', 'Desarrollo Personal', 'Desarrollar habilidades de resolución de problemas y toma de decisiones.'),
(6, 'Manejo emocional y estrés.', 'Desarrollo Personal', 'Aprender a manejar el estrés y las emociones de manera saludable.'),
(7, 'Apoyo doméstico', 'Responsabilidades Domésticas', 'Ayudar en las tareas del hogar, como limpiar, cocinar, lavar los platos y hacer la colada.'),
(8, 'Vínculos positivos', 'Relaciones Sociales', 'Cultivar relaciones saludables con amigos, familiares y compañeros.'),
(9, 'Comunicación constructiva', 'Relaciones Sociales', 'Aprender a comunicarse de manera efectiva y a resolver conflictos de manera constructiva.'),
(10, 'Participación social y comunitaria', 'Relaciones Sociales', 'Participar en actividades sociales y comunitarias que fomenten el desarrollo de habilidades sociales y la construcción de redes de apoyo.'),
(11, 'Participación social y comunitaria', 'Salud y Bienestar', 'Adoptar hábitos saludables de alimentación, ejercicio y sueño.'),
(12, 'Autocuidado', 'Salud y Bienestar', 'Aprender sobre la importancia del autocuidado y la salud mental.'),
(13, 'Ayuda y apoyo', 'Salud y Bienestar', 'Buscar ayuda y apoyo cuando sea necesario para abordar problemas de salud física o mental.'),
(14, 'Exploración de intereses profesionales', 'Desarrollo Personal', 'Explorar intereses profesionales y opciones de carrera.'),
(15, 'Obtención de experiencia laboral', 'Desarrollo Personal', 'Obtener experiencia laboral a través de pasantías, voluntariado o empleo a tiempo parcial.'),
(16, 'Desarrollo de habilidades profesionales', 'Desarrollo Personal', 'Desarrollar habilidades profesionales, como redacción de currículums, habilidades de entrevista y trabajo en equipo.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUser` int(11) NOT NULL,
  `nombreUser` varchar(100) NOT NULL,
  `emailUser` varchar(30) NOT NULL,
  `contraseñaUser` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUser`, `nombreUser`, `emailUser`, `contraseñaUser`) VALUES
(1, 'PabloUser', 'user@gmail.com', '1234'),
(2, 'Lorena', 'lore@gmail.com', '$2y$10$Gy9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_tarea`
--

CREATE TABLE `usuario_tarea` (
  `idUser` int(11) NOT NULL,
  `idTarea` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'Pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_tarea`
--

INSERT INTO `usuario_tarea` (`idUser`, `idTarea`, `estado`) VALUES
(1, 3, 'Completado'),
(1, 5, 'Pendiente'),
(1, 8, 'Pendiente'),
(1, 10, 'Pendiente'),
(1, 11, 'Pendiente'),
(1, 14, 'Pendiente'),
(1, 15, 'Pendiente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`idTarea`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUser`);

--
-- Indices de la tabla `usuario_tarea`
--
ALTER TABLE `usuario_tarea`
  ADD PRIMARY KEY (`idUser`,`idTarea`),
  ADD KEY `idTarea` (`idTarea`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `idTarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario_tarea`
--
ALTER TABLE `usuario_tarea`
  ADD CONSTRAINT `usuario_tarea_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`idUser`),
  ADD CONSTRAINT `usuario_tarea_ibfk_2` FOREIGN KEY (`idTarea`) REFERENCES `tareas` (`idTarea`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
