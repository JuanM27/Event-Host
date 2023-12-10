-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 10-12-2023 a las 16:11:41
-- Versión del servidor: 8.2.0
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eventHost`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `idEvento` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `organizacion` varchar(255) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `IdEmpresa` int NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `localizacion` varchar(255) DEFAULT NULL,
  `idiomas` varchar(255) DEFAULT NULL,
  `vestimenta` varchar(255) DEFAULT NULL,
  `numeroAzafatas` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`idEvento`, `nombre`, `organizacion`, `fecha`, `direccion`, `IdEmpresa`, `descripcion`, `localizacion`, `idiomas`, `vestimenta`, `numeroAzafatas`) VALUES
(2, 'Feria de coches y motos', 'Green Events', '28/12/2023', 'Av. del Partenón, 5, 28042 Madrid', 1, 'Se buscan 4 azafatos/as de evententos sin experiencia para los días 28 y 29 de noviembre desde las 16:00h hasta las 22:00h ambos días.', 'Palazio de los deportes, Madrid (España)', 'Español y nivel medio de inglés', 'traje de chaqueta y pañuelo rojo', 4),
(3, 'Congreso Nacional de Cirugía maxilofacial', 'Red Events', '30/12/2023', 'Av. del Partenón, 5, 28042 Madrid', 1, 'Se buscan 4 azafatos/as de eventos sin experiencia para los días 28 y 29 de noviembre desde las 16:00h hasta las 22:00h ambos días.', 'Palazio de los deportes, Madrid (España)', 'Español y nivel medio de inglés', 'traje de chaqueta y pañuelo rojo', 4),
(50, 'Congreso de odontología', 'Green Events', '30/12/2023', 'Av. del Afrodita, 5, 28042 Madrid', 1, 'Se buscan 4 azafatos/as de eventos sin experiencia para los días 28 y 29 de noviembre desde las 16:00h hasta las 22:00h ambos días.', 'Palazio de los deportes, Madrid (España)', 'Inglés y Español', 'traje de chaqueta y pañuelo rojo', 4),
(58, 'Feria de Ferrari', 'Golden Events', '30/12/2023', 'Av. del Afrodita, 5, 28042 Madrid', 1, 'Se buscan 4 azafatos/as de evententos sin experiencia para los días 28 y 29 de noviembre desde las 16:00h hasta las 22:00h ambos días.\r\n\r\n', 'Palazio de los deportes, Madrid (España)', 'Inglés y Español', 'traje de chaqueta y pañuelo rojo', 4),
(59, 'Congreso de Tractores y motos', 'Green Events', '30/12/2023', 'Av. del Afrodita, 5, 28042 Madrid', 1, 'Se buscan 4 azafatos/as de evententos sin experiencia para los días 28 y 29 de noviembre desde las 16:00h hasta las 22:00h ambos días.', 'Palazio de los deportes, Madrid (España)', 'Inglés y Español', 'traje de chaqueta y pañuelo rojo', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idEvento`),
  ADD KEY `IdEmpresa` (`IdEmpresa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `idEvento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`IdEmpresa`) REFERENCES `empresa` (`IdEmpresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
