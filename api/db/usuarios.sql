-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2024 a las 18:28:13
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usuarios`
--
CREATE DATABASE IF NOT EXISTS usuarios;

USE usuarios;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `accion` varchar(45) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`id`, `usuario`, `accion`, `fecha`) VALUES
(1, 'Ale132402', 'Creacion de Usuario', '2024-04-28 16:38:05'),
(2, 'Ale132402', 'Cierre de sesión', '2024-04-28 16:38:16'),
(3, 'Carlos132402', 'Creacion de Usuario', '2024-04-28 16:52:49'),
(4, 'Carlos132402', 'Cierre de sesión', '2024-04-28 16:53:13'),
(5, 'Ale132402', 'Inicio de Sesión', '2024-04-28 16:53:23'),
(6, 'Ale132402', 'Inicio de Sesión', '2024-04-29 17:21:11'),
(7, 'Ale132402', 'Creacion de Capacitacion', '2024-04-29 17:22:21'),
(8, 'Ale132402', 'Cierre de sesión', '2024-04-29 17:22:29'),
(9, 'Carlos132402', 'Inicio de Sesión', '2024-04-29 17:23:07'),
(10, 'Ale132402', 'Inicio de Sesión', '2024-04-29 22:25:40'),
(11, 'Ale132402', 'Inscripcion a Capacitacion Carlos132402', '2024-04-29 22:26:29'),
(12, 'Ale132402', 'Cerrada Por Inactividad', '2024-04-29 22:28:48'),
(13, 'Ale132402', 'Inicio de Sesión', '2024-06-05 23:52:06'),
(14, 'Ale132402', 'Cerrada Por Inactividad', '2024-06-05 23:53:31'),
(15, 'Ale132402', 'Inicio de Sesión', '2024-06-06 04:43:09'),
(16, 'Ale132402', 'Cerrada Por Inactividad', '2024-06-06 04:44:49'),
(17, 'Ang132402', 'Creacion de Usuario', '2024-06-06 05:01:26'),
(18, 'Ang132402', 'Cerrada Por Inactividad', '2024-06-06 05:02:45'),
(19, 'Ale132402', 'Inicio de Sesión', '2024-06-06 05:05:18'),
(20, 'Ale132402', 'Cerrada Por Inactividad', '2024-06-06 05:07:40'),
(21, 'Ale132402', 'Inicio de Sesión', '2024-06-06 05:09:11'),
(22, 'Ale132402', 'Cerrada Por Inactividad', '2024-06-06 05:11:42'),
(23, 'Ale132402', 'Inicio de Sesión', '2024-06-06 14:26:29'),
(24, 'Ale132402', 'Inicio de Sesión', '2024-06-06 14:26:35'),
(25, 'Ale132402', 'Inicio de Sesión', '2024-06-06 14:26:46'),
(26, 'Ale132402', 'Inicio de Sesión', '2024-06-06 14:27:34'),
(27, 'Ale132402', 'Cerrada Por Inactividad', '2024-06-06 14:28:37'),
(28, 'Ale132402', 'Inicio de Sesión', '2024-06-06 14:51:33'),
(29, 'Ale132402', 'Cerrada Por Inactividad', '2024-06-06 14:52:34'),
(30, 'Ale132402', 'Inicio de Sesión', '2024-06-06 14:58:01'),
(31, 'Ale132402', 'Cerrada Por Inactividad', '2024-06-06 15:03:44'),
(32, 'Ale132402', 'Inicio de Sesión', '2024-06-06 15:03:51'),
(33, 'Ale132402', 'Cerrada Por Inactividad', '2024-06-06 15:13:31'),
(34, 'Ale132402', 'Inicio de Sesión', '2024-06-06 15:13:40'),
(35, 'Ale132402', 'Cerrada Por Inactividad', '2024-06-06 15:15:09'),
(36, 'Ale132402', 'Inicio de Sesión', '2024-06-06 15:23:29'),
(37, 'Ale132402', 'Cerrada Por Inactividad', '2024-06-06 15:26:16'),
(38, 'Ale132402', 'Inicio de Sesión', '2024-06-06 15:26:23'),
(39, 'Ale132402', 'Cerrada Por Inactividad', '2024-06-06 15:28:34'),
(40, 'Ale132402', 'Inicio de Sesión', '2024-06-06 15:30:36'),
(41, 'Ale132402', 'Cerrada Por Inactividad', '2024-06-06 15:32:45'),
(42, 'Ale132402', 'Inicio de Sesión', '2024-06-06 15:32:54'),
(43, 'Ale132402', 'Cierre de sesión', '2024-06-06 15:33:07'),
(44, 'Carlos132402', 'Inicio de Sesión', '2024-06-06 15:33:46'),
(45, 'Carlos132402', 'Cierre de sesión', '2024-06-06 15:33:51'),
(46, 'Ale132402', 'Inicio de Sesión', '2024-06-06 15:38:09'),
(47, 'Ale132402', 'Cierre de sesión', '2024-06-06 15:38:18'),
(48, 'Ale132402', 'Inicio de Sesión', '2024-06-06 15:38:50'),
(49, 'Ale132402', 'Cierre de sesión', '2024-06-06 15:38:51'),
(50, 'Ale132402', 'Inicio de Sesión', '2024-06-06 15:39:47'),
(51, 'Ale132402', 'Cierre de sesión', '2024-06-06 15:39:50'),
(52, 'Ale132402', 'Inicio de Sesión', '2024-06-06 15:43:31'),
(53, 'Ale132402', 'Cierre de sesión', '2024-06-06 15:47:44'),
(54, 'Ale132402', 'Inicio de Sesión', '2024-06-06 16:06:57'),
(55, 'Ale132402', 'Cierre de sesión', '2024-06-06 16:07:00'),
(56, 'Ale132402', 'Inicio de Sesión', '2024-06-06 16:07:14'),
(57, 'Ale132402', 'Inicio de Sesión', '2024-06-06 16:08:46'),
(58, 'Ale132402', 'Inicio de Sesión', '2024-06-06 16:17:20'),
(59, 'Ale132402', 'Cierre de sesión', '2024-06-06 16:29:09'),
(60, 'Ale132402', 'Creacion de Usuario', '2024-06-06 16:38:00'),
(61, 'Ale132402', 'Inicio de Sesión', '2024-06-06 16:42:36'),
(62, 'Ale132402', 'Cierre de sesión', '2024-06-06 16:42:48'),
(63, 'Ang132402', 'Creacion de Usuario', '2024-06-06 16:43:12'),
(64, 'Ang132402', 'Cierre de sesión', '2024-06-06 16:43:36'),
(65, 'Ang132402', 'Creacion de Usuario', '2024-06-06 16:44:15'),
(66, 'Ang132402', 'Cierre de sesión', '2024-06-06 16:44:27'),
(67, 'Ang132402', 'Creacion de Usuario', '2024-06-06 16:45:03'),
(68, 'Ang132402', 'Cerrada Por Inactividad', '2024-06-06 16:48:26'),
(69, 'Ale132402', 'Inicio de Sesión', '2024-06-06 16:48:34'),
(70, 'Ang132402', 'Creacion de Usuario', '2024-06-06 16:48:55'),
(71, '', 'Cerrada Por Inactividad', '2024-06-06 16:51:38'),
(72, 'Ale132402', 'Inicio de Sesión', '2024-06-06 16:51:46'),
(73, 'Ale132402', 'Inicio de Sesión', '2024-06-06 16:52:37'),
(74, 'Ale132402', 'Inicio de Sesión', '2024-06-06 16:53:00'),
(75, 'Ang132402', 'Creacion de Usuario', '2024-06-06 16:53:49'),
(76, 'Ale132402', 'Cerrada Por Inactividad', '2024-06-06 16:55:41'),
(77, 'Ale132402', 'Inicio de Sesión', '2024-06-06 17:02:45'),
(78, 'Ale132402', 'Cierre de sesión', '2024-06-06 17:05:10'),
(79, 'Ale132402', 'Inicio de Sesión', '2024-06-06 17:05:16'),
(80, 'Ale132402', 'Inicio de Sesión', '2024-06-06 17:08:25'),
(81, 'Ale132402', 'Inicio de Sesión', '2024-06-06 17:56:45'),
(82, 'Ale132402', 'Cierre de sesión', '2024-06-06 17:59:16'),
(83, 'Ale132402', 'Inicio de Sesión', '2024-06-06 18:02:46'),
(84, 'Ang132402', 'Creacion de Usuario', '2024-06-06 18:07:16'),
(85, 'Ang', 'Creacion de Usuario', '2024-06-06 18:08:22'),
(86, 'Ale132402', 'Cerrada Por Inactividad', '2024-06-06 18:09:24'),
(87, 'Ale132402', 'Inicio de Sesión', '2024-06-06 18:10:28'),
(88, 'Ale132402', 'Cerrada Por Inactividad', '2024-06-06 18:11:43'),
(89, 'Ang132402', 'Creacion de Usuario', '2024-06-06 18:13:30'),
(90, 'Ang132402', 'Cierre de sesión', '2024-06-06 18:13:42'),
(91, 'Ale132402', 'Inicio de Sesión', '2024-06-06 18:20:29'),
(92, 'Ang132402', 'Creacion de Usuario', '2024-06-06 18:20:52'),
(93, 'Ale132402', 'Cerrada Por Inactividad', '2024-06-06 18:22:52'),
(94, 'Ale132402', 'Inicio de Sesión', '2024-06-06 18:27:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombre`) VALUES
(1, 'usuario'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `password2` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `rol` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password2`, `nombre`, `apellido`, `correo`, `telefono`, `rol`, `estado`) VALUES
(1, 'Ale132402', 'MTMyNDAy', 'Alejandro', 'Casanova', 'jorjecasanova@gmail.com', '3046405009', 2, 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_Rol_idx` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_Rol` FOREIGN KEY (`rol`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
