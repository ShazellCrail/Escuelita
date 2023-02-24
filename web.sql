-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2021 a las 01:35:16
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

create database web;
use web;

CREATE TABLE `actividad` (
  `id` int(9) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `trabajo` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(1) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Profesor'),
(3, 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregable`
--

CREATE TABLE `entregable` (
  `id` int(9) NOT NULL,
  `actividad` int(9) NOT NULL,
  `calificacion` int(5) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `usuario` int(9) NOT NULL,
  `ejercicio` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id` int(9) NOT NULL,
  `pregunta` varchar(500) NOT NULL,
  `respuesta` varchar(500) NOT NULL,
  `trabajo` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo`
--

CREATE TABLE `trabajo` (
  `id` int(9) NOT NULL,
  `descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(9) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `fecha_nac` date NOT NULL,
  `correo` varchar(40) NOT NULL,
  `contrasenia` varchar(20) NOT NULL,
  `rol` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `fecha_nac`, `correo`, `contrasenia`, `rol`) VALUES
(1, 'Brenda', 'Crail', '1997-05-22', 'brenda@hotmail.com', '123', 1),
(2, 'Bren', 'Castillo', '1980-07-17', 'bren@hotmail.com', '123', 2),
(3, 'Guadalupe', 'Mora', '1988-03-08', 'guadalupe@hotmail.com', '123', 3),
(4, 'Sonia', 'Schmidt', '2010-05-09', 'sonia@hotmail.com', '123', 3),
(5, 'Shazell', 'Castro', '2000-03-25', 'shazell@hotmail.com', '123', 3),
(6, 'Camila', 'Cabello', '1990-08-20', 'camila@hotmail.com', '123', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trabajo` (`trabajo`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entregable`
--
ALTER TABLE `entregable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actividad` (`actividad`,`usuario`,`ejercicio`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `ejercicio` (`ejercicio`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trabajo` (`trabajo`);

--
-- Indices de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `entregable`
--
ALTER TABLE `entregable`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`trabajo`) REFERENCES `trabajo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entregable`
--
ALTER TABLE `entregable`
  ADD CONSTRAINT `entregable_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entregable_ibfk_2` FOREIGN KEY (`actividad`) REFERENCES `actividad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entregable_ibfk_3` FOREIGN KEY (`ejercicio`) REFERENCES `trabajo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (`trabajo`) REFERENCES `trabajo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `cargo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

create table Cuestionario(
	idCuestionario int primary key auto_increment,
    Profesor int references usuario.id,
    Titulo text not null);

create table Preguntas(
	id int primary key auto_increment,
    Pregunta text not null,
    Respuesta text not null,
    idCuetionario int references Cuestionario.idCuestionario);
    
create table Respuestas(
	id int primary key auto_increment,
    idPregunta int references Preguntas.id,
    idUsuario int references usuario.id,
    Respuesta text);
    
insert into Respuestas values (null, 1,3,'No me la se');
    
insert into Preguntas values (1, 'Hola como estas','Muy mal',1);