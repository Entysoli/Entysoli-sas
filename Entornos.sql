-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-04-2020 a las 03:51:02
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `entornos`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Actualizar_Persona` (IN `id` BIGINT(20), IN `nombre` VARCHAR(50), IN `apellido` VARCHAR(50), IN `direccion` VARCHAR(50), IN `telefono` VARCHAR(15), IN `correo` VARCHAR(50), IN `celular` INT(15))  NO SQL
UPDATE persona
SET Nombre = nombre, Apellido = apellido,Correo=correo, Direccion=direccion,Telefono=telefono,Celular=celular
WHERE idPersona = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Consultar_Persona` (IN `Id` INT)  NO SQL
SELECT*FROM persona WHERE idPersona=Id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Eliminar_Persona` (IN `id` BIGINT(20))  NO SQL
DELETE FROM propietario

WHERE idPersona = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Registrar_Rol` (IN `id` BIGINT(20), IN `rol` VARCHAR(30), IN `idPersona` BIGINT(20))  NO SQL
INSERT into rol VALUES(id,Nombre,idPersona)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Regitrar_Persona` (IN `idpersona` BIGINT(20), IN `Nombre` VARCHAR(50), IN `Apellido` VARCHAR(50), IN `Correo` VARCHAR(50), IN `Direccion` VARCHAR(50), IN `Telefono` VARCHAR(15), IN `Celular` VARCHAR(15), IN `Rol` VARCHAR(30))  NO SQL
INSERT into persona VALUES(idpersona,Nombre,Apellido,Correo,Direccion,Telefono,Celular,Rol)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adminconjunto`
--

CREATE TABLE `adminconjunto` (
  `Cedula` bigint(15) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `idConjunto` bigint(20) NOT NULL,
  `idPersona` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `adminconjunto`
--

INSERT INTO `adminconjunto` (`Cedula`, `Nombre`, `Correo`, `Telefono`, `idConjunto`, `idPersona`) VALUES
(12345, 'sergio', 'ser@gnm.com', '62636455', 1, 1),
(1001112289, 'sergio', 'ser@gnm.com', '3115898312', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartamento`
--

CREATE TABLE `apartamento` (
  `idApartamento` bigint(20) NOT NULL,
  `idConjunto` bigint(20) NOT NULL,
  `idBloque` bigint(20) NOT NULL,
  `idPropietario` bigint(20) DEFAULT NULL,
  `idPersona` bigint(20) NOT NULL,
  `Estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloque`
--

CREATE TABLE `bloque` (
  `idBloque` bigint(20) NOT NULL,
  `idConjunto` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bloque`
--

INSERT INTO `bloque` (`idBloque`, `idConjunto`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conjunto`
--

CREATE TABLE `conjunto` (
  `idConjunto` bigint(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Direccion` varchar(20) NOT NULL,
  `Estado` varchar(10) NOT NULL,
  `idPersona` bigint(20) NOT NULL,
  `NumBloques` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `conjunto`
--

INSERT INTO `conjunto` (`idConjunto`, `Nombre`, `Telefono`, `Direccion`, `Estado`, `idPersona`, `NumBloques`) VALUES
(1, 'San carlos', '12345678', 'calle 9', 'Activo', 1, 7),
(2, 'maderos', '3114556677', 'calle 11', 'Activo', 1, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratistas`
--

CREATE TABLE `contratistas` (
  `cedula` bigint(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Tipo` enum('Jardinero','Aseador','Todero','') NOT NULL,
  `idProveedor` bigint(20) NOT NULL,
  `Disponibilidad` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contratistas`
--

INSERT INTO `contratistas` (`cedula`, `Nombre`, `Apellido`, `Direccion`, `Telefono`, `Correo`, `Tipo`, `idProveedor`, `Disponibilidad`) VALUES
(1001112289, 'pedro', 'fernandez', 'asdasd', '12345678', 'mm@gmail.com', 'Jardinero', 123456798, 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidente`
--

CREATE TABLE `incidente` (
  `idIncidente` bigint(20) NOT NULL,
  `TipoIncidente` varchar(30) NOT NULL,
  `Asunto` varchar(50) NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Evidencia` longblob NOT NULL,
  `idConjunto` bigint(20) NOT NULL,
  `idApartamento` bigint(20) NOT NULL,
  `idPropietario` bigint(20) NOT NULL,
  `fechaReporte` date NOT NULL,
  `fechaLimite` date NOT NULL,
  `Estado` varchar(15) NOT NULL,
  `Id_Contratista` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idPersona` bigint(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Celular` varchar(15) NOT NULL,
  `idUsuario` bigint(20) DEFAULT NULL,
  `idProveedor` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `Cedula` bigint(10) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `idCon` bigint(20) NOT NULL,
  `idPersona` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idProveedor` bigint(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `Nombre`, `Apellido`, `Direccion`, `Telefono`, `Correo`) VALUES
(1, 'Jose', 'vivas', 'calle1 #1-1', '3102345678', 'servel450@gmail.com'),
(123456798, 'Alberto', 'Lleras', 'carrera 19a', '234123567', 'asuma@gmail.com'),
(1001223893, 'pedro', 'sanchez', 'carrera 5', '3115766992', 'servel@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` bigint(20) NOT NULL,
  `nombreRol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombreRol`) VALUES
(1, 'Gerente'),
(2, 'Propietario'),
(3, 'Aseador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Cedula` bigint(20) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Rol` enum('Gerente','Propietario','Jardinero','Aseador','Todero') NOT NULL,
  `Correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Cedula`, `Nombre`, `Apellido`, `Rol`, `Correo`) VALUES
(1, 'claudia', 'camelo', 'Gerente', 'ccpa1999@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adminconjunto`
--
ALTER TABLE `adminconjunto`
  ADD PRIMARY KEY (`Cedula`),
  ADD KEY `idConjunto` (`idConjunto`),
  ADD KEY `idPersona` (`idPersona`);

--
-- Indices de la tabla `apartamento`
--
ALTER TABLE `apartamento`
  ADD PRIMARY KEY (`idApartamento`) USING BTREE,
  ADD KEY `idPropietario` (`idPropietario`) USING BTREE,
  ADD KEY `idBloque` (`idBloque`) USING BTREE,
  ADD KEY `idConjunto` (`idConjunto`) USING BTREE,
  ADD KEY `idPersona` (`idPersona`) USING BTREE;

--
-- Indices de la tabla `bloque`
--
ALTER TABLE `bloque`
  ADD KEY `idConjunto` (`idConjunto`) USING BTREE,
  ADD KEY `idBloque` (`idBloque`);

--
-- Indices de la tabla `conjunto`
--
ALTER TABLE `conjunto`
  ADD PRIMARY KEY (`idConjunto`) USING BTREE,
  ADD KEY `idPersona` (`idPersona`);

--
-- Indices de la tabla `contratistas`
--
ALTER TABLE `contratistas`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `Tipo` (`Tipo`),
  ADD KEY `idProveedor` (`idProveedor`);

--
-- Indices de la tabla `incidente`
--
ALTER TABLE `incidente`
  ADD PRIMARY KEY (`idIncidente`),
  ADD KEY `idPersona` (`idPropietario`) USING BTREE,
  ADD KEY `idApartamento` (`idApartamento`) USING BTREE,
  ADD KEY `idConjunto` (`idConjunto`),
  ADD KEY `Id_Contratista` (`Id_Contratista`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idPersona`) USING BTREE,
  ADD KEY `IdRol` (`idUsuario`) USING BTREE,
  ADD KEY `idProveedor` (`idProveedor`) USING BTREE;

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`Cedula`) USING BTREE,
  ADD KEY `idCon` (`idCon`) USING BTREE,
  ADD KEY `idPersona` (`idPersona`) USING BTREE;

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`) USING BTREE;

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conjunto`
--
ALTER TABLE `conjunto`
  MODIFY `idConjunto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10001112290;

--
-- AUTO_INCREMENT de la tabla `incidente`
--
ALTER TABLE `incidente`
  MODIFY `idIncidente` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idProveedor` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001223894;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adminconjunto`
--
ALTER TABLE `adminconjunto`
  ADD CONSTRAINT `adminconjunto_ibfk_1` FOREIGN KEY (`idConjunto`) REFERENCES `conjunto` (`idConjunto`),
  ADD CONSTRAINT `adminconjunto_ibfk_2` FOREIGN KEY (`idPersona`) REFERENCES `usuarios` (`Cedula`);

--
-- Filtros para la tabla `apartamento`
--
ALTER TABLE `apartamento`
  ADD CONSTRAINT `apartamento_ibfk_4` FOREIGN KEY (`idConjunto`) REFERENCES `conjunto` (`idConjunto`),
  ADD CONSTRAINT `apartamento_ibfk_5` FOREIGN KEY (`idPropietario`) REFERENCES `propietario` (`Cedula`),
  ADD CONSTRAINT `apartamento_ibfk_6` FOREIGN KEY (`idBloque`) REFERENCES `bloque` (`idBloque`),
  ADD CONSTRAINT `apartamento_ibfk_7` FOREIGN KEY (`idPersona`) REFERENCES `usuarios` (`Cedula`);

--
-- Filtros para la tabla `bloque`
--
ALTER TABLE `bloque`
  ADD CONSTRAINT `bloque_ibfk_1` FOREIGN KEY (`idConjunto`) REFERENCES `conjunto` (`idConjunto`);

--
-- Filtros para la tabla `conjunto`
--
ALTER TABLE `conjunto`
  ADD CONSTRAINT `conjunto_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `usuarios` (`Cedula`);

--
-- Filtros para la tabla `contratistas`
--
ALTER TABLE `contratistas`
  ADD CONSTRAINT `contratistas_ibfk_2` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`);

--
-- Filtros para la tabla `incidente`
--
ALTER TABLE `incidente`
  ADD CONSTRAINT `incidente_ibfk_1` FOREIGN KEY (`Id_Contratista`) REFERENCES `contratistas` (`cedula`),
  ADD CONSTRAINT `incidente_ibfk_2` FOREIGN KEY (`idApartamento`) REFERENCES `apartamento` (`idApartamento`),
  ADD CONSTRAINT `incidente_ibfk_3` FOREIGN KEY (`idConjunto`) REFERENCES `conjunto` (`idConjunto`),
  ADD CONSTRAINT `incidente_ibfk_4` FOREIGN KEY (`idPropietario`) REFERENCES `propietario` (`Cedula`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`);

--
-- Filtros para la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD CONSTRAINT `propietario_ibfk_4` FOREIGN KEY (`idCon`) REFERENCES `conjunto` (`idConjunto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
