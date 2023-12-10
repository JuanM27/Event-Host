-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 04-12-2023 a las 17:46:54
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
-- Estructura de tabla para la tabla `aplica`
--

CREATE TABLE `aplica` (
  `idAzafata` int NOT NULL,
  `idEvento` int NOT NULL,
  `contratada` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `aplica`
--

INSERT INTO `aplica` (`idAzafata`, `idEvento`, `contratada`) VALUES
(1, 2, 0),
(2, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `azafata`
--

CREATE TABLE `azafata` (
  `idAzafata` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fotos` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `experiencia` varchar(255) DEFAULT NULL,
  `estudios` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `idiomas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `contrasena` varchar(255) NOT NULL,
  `zonaTrabajo` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `disponibilidad` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `azafata`
--

INSERT INTO `azafata` (`idAzafata`, `nombre`, `apellidos`, `email`, `telefono`, `fotos`, `experiencia`, `estudios`, `idiomas`, `contrasena`, `zonaTrabajo`, `descripcion`, `disponibilidad`) VALUES
(1, 'Sara ', 'López Calles', 'sara@lopez.com', '610311925', 'imagenes/azafata1.1.jpg', 'Feria de gastronomía en IFEMA (Madrid) | 27/08/2022-28/08/2022, Congreso de oncología en Hotel Meliá (Madrid) | 17/07/2022-18/07/2022, Feria de Tecnología (Madrid) | 15/06/2022-16/06/2022\n', 'Grado en Bellas Artes y turismo, Curso en eventos y protocolo', 'Inglés y Español', '4733a44073c81970cccbca6e1ede188b', 'Madrid', 'Soy una azafata de eventos con dos años de experiencia, especializada en eventos de congresos internacionales en el puesto de acreditaciones y sala.', 'Viernes, sábados y domingos. Preferible turno de mañana.'),
(2, 'Julian', 'Muñoz Garcia', 'julian@gmail.com', '610311528', 'imagenes/fotoJulian.jpeg', 'Feria de gastronomía en IFEMA (Madrid) | 27/08/2022-28/08/2022, Congreso de oncología en Hotel Meliá (Madrid) | 17/07/2022-18/07/2022, Feria de Tecnología (Madrid) | 15/06/2022-16/06/2022\r\n', 'Grado en ingeniería eléctrica, Curso de azafata de eventos y congresos', 'Íngles, Español y Alemán', '60659cfda992013e610f285c46692d28', 'Cualquier zona de España', 'Soy una azafato de eventos con dos años de experiencia, especializado en eventos de congresos internacionales en el puesto de acreditaciones y sala.', 'Todos los días de la semana. Preferible turno de mañana y tarde.'),
(3, 'Lorena', 'González Romero', 'lorena@gmail.com', '610311558', 'imagenes/fotoLorena.jpeg', 'Feria de gastronomía en IFEMA (Madrid) | 27/08/2022-28/08/2022, Congreso de oncología en Hotel Meliá (Madrid) | 17/07/2022-18/07/2022, Feria de Tecnología (Madrid) | 15/06/2022-16/06/2022\r\n', 'Grado en ciencias políticas, Curso de azafata de eventos y congresos', 'Íngles, Español, Alemán y Francés', '0d2dcd6fcb7eeeaec7a317efbd01da0e', 'Cualquier zona de España', 'Soy una azafata de eventos con tres años de experiencia, especializada en eventos de congresos internacionales en el puesto de acreditaciones y sala.', 'Todos los días de la semana. Preferible turno de mañana y tarde.'),
(4, 'Jose Manuel', 'Carazo Puga', 'jose@gmail.com', NULL, '', NULL, NULL, NULL, '70483b6e100c9cebbffcdc62dea07eda', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `IdEmpresa` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `paginaWeb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `eventosPasados` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telefono` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `redesSociales` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `contrasena` varchar(255) NOT NULL,
  `zonasTrabajo` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`IdEmpresa`, `nombre`, `paginaWeb`, `eventosPasados`, `telefono`, `email`, `redesSociales`, `contrasena`, `zonasTrabajo`, `foto`) VALUES
(1, 'Ankara', 'ankaraEventos.com', 'IFEMA Feria de Gastronomía (Madrid) | 27/01/2023, IFEMA Ferie Agrícola (Madrid) | 10/02/2023, IFEMA Congreso de Tecnología (Madrid) | 20/02/2023', '610311928', 'ankara@eventos.com', 'ankara@instagram.com', '9221413dd904c157938b397753a8b4bb', 'Madrid', 'imagenes/logoAnkara.jpg');

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
(4, 'Congreso Nacional de Cirugía estética', 'Blue Events', '10/01/2024', 'Av. del zeus, 5, 28042 Madrid', 1, 'Se buscan 4 azafatos/as de evententos sin experiencia para los días 28 y 29 de noviembre desde las 16:00h hasta las 22:00h ambos días.', 'Palazio de los deportes, Madrid (España)', 'Español y nivel medio de inglés', 'traje de chaqueta y pañuelo rojo', 4),
(50, 'Congreso de odontología', 'Green Events', '30/12/2023', 'Av. del Afrodita, 5, 28042 Madrid', 1, 'Se buscan 4 azafatos/as de eventos sin experiencia para los días 28 y 29 de noviembre desde las 16:00h hasta las 22:00h ambos días.', 'Palazio de los deportes, Madrid (España)', 'Inglés y Español', 'traje de chaqueta y pañuelo rojo', 4),
(58, 'Feria de Ferrari', 'Golden Events', '30/12/2023', 'Av. del Afrodita, 5, 28042 Madrid', 1, 'Se buscan 4 azafatos/as de evententos sin experiencia para los días 28 y 29 de noviembre desde las 16:00h hasta las 22:00h ambos días.\r\n\r\n', 'Palazio de los deportes, Madrid (España)', 'Inglés y Español', 'traje de chaqueta y pañuelo rojo', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aplica`
--
ALTER TABLE `aplica`
  ADD PRIMARY KEY (`idAzafata`,`idEvento`),
  ADD KEY `idEvento` (`idEvento`);

--
-- Indices de la tabla `azafata`
--
ALTER TABLE `azafata`
  ADD PRIMARY KEY (`idAzafata`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`IdEmpresa`);

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
-- AUTO_INCREMENT de la tabla `azafata`
--
ALTER TABLE `azafata`
  MODIFY `idAzafata` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `IdEmpresa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `idEvento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aplica`
--
ALTER TABLE `aplica`
  ADD CONSTRAINT `aplica_ibfk_1` FOREIGN KEY (`idAzafata`) REFERENCES `azafata` (`idAzafata`) ON DELETE CASCADE,
  ADD CONSTRAINT `aplica_ibfk_2` FOREIGN KEY (`idEvento`) REFERENCES `evento` (`idEvento`) ON DELETE CASCADE;

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`IdEmpresa`) REFERENCES `empresa` (`IdEmpresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
