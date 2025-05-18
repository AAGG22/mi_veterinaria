-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2025 a las 07:11:32
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mi_veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amo-mascota`
--

CREATE TABLE `amo-mascota` (
  `id_amo` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='estado: 0 (activa) 1 (masc. vendida) 2 (masc. fallecida)';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amos`
--

CREATE TABLE `amos` (
  `id` int(11) NOT NULL,
  `nom_ape` varchar(50) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono` int(11) NOT NULL,
  `f_alta` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `nro_registro` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `especie` varchar(15) NOT NULL,
  `raza` varchar(20) NOT NULL,
  `edad` varchar(20) NOT NULL,
  `f_alta` varchar(10) NOT NULL,
  `f_def` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`nro_registro`, `nombre`, `especie`, `raza`, `edad`, `f_alta`, `f_def`) VALUES
(1, 'Chiki', 'Gato', 'Calico', '3', '2025-05-12', ''),
(3, 'Berry', 'Tortuga', 'Tortuga', '98 años', '2025-05-13', ''),
(4, 'Michu', 'Gato', 'Siames red point', '5 años y 4 meses', '2025-05-13', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vet-mascota`
--

CREATE TABLE `vet-mascota` (
  `id_veterinario` int(11) NOT NULL,
  `id_mascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinarios`
--

CREATE TABLE `veterinarios` (
  `id` int(11) NOT NULL,
  `nom_ape` varchar(50) NOT NULL,
  `especialidad` varchar(20) NOT NULL,
  `telefono` int(11) NOT NULL,
  `f_ingreso` varchar(10) NOT NULL,
  `f_egreso` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amos`
--
ALTER TABLE `amos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`nro_registro`);

--
-- Indices de la tabla `veterinarios`
--
ALTER TABLE `veterinarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `amos`
--
ALTER TABLE `amos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `nro_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `veterinarios`
--
ALTER TABLE `veterinarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
