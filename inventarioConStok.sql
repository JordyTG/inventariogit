-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-07-2018 a las 17:50:50
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `IDADMINISTRADOR` int(11) NOT NULL,
  `CEDULA` varchar(10) NOT NULL,
  `NOMBREADMINISTRADOR` varchar(100) NOT NULL,
  `FECHANACIMIENTO` date NOT NULL,
  `CIUDADNACIMIENTO` varchar(50) NOT NULL,
  `DIRECCION` varchar(100) NOT NULL,
  `TELEFONO` varchar(10) NOT NULL,
  `ESTADO` char(1) NOT NULL DEFAULT 'A',
  `ROL` char(1) NOT NULL DEFAULT 'A',
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`IDADMINISTRADOR`, `CEDULA`, `NOMBREADMINISTRADOR`, `FECHANACIMIENTO`, `CIUDADNACIMIENTO`, `DIRECCION`, `TELEFONO`, `ESTADO`, `ROL`, `EMAIL`, `PASSWORD`) VALUES
(1, '1003756937', 'Jordy', '1994-09-19', 'Arenillas', 'Priorato', '0983697528', 'A', 'A', 'admin@gmail.com', 'admin.1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ajusteproducto`
--

CREATE TABLE `ajusteproducto` (
  `IDAJUSTE` int(11) NOT NULL,
  `IDPRODUCTO` int(11) DEFAULT NULL,
  `NUMEROAJUSTE` varchar(15) NOT NULL,
  `CABECERA` varchar(100) NOT NULL,
  `FECHAAJUSTE` date NOT NULL,
  `DETALLE` int(11) NOT NULL,
  `CANTIDAD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodeguero`
--

CREATE TABLE `bodeguero` (
  `IDBODEGUERO` int(11) NOT NULL,
  `CEDULA` varchar(10) NOT NULL,
  `NOMBREBODEGUERO` varchar(100) NOT NULL,
  `FECHANACIMIENTO` date NOT NULL,
  `CIUDADNACIMIENTO` varchar(50) NOT NULL,
  `DIRECCION` varchar(100) NOT NULL,
  `TELEFONO` varchar(10) NOT NULL,
  `ESTADO` char(1) NOT NULL DEFAULT 'A',
  `ROL` char(1) NOT NULL DEFAULT 'B',
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bodeguero`
--

INSERT INTO `bodeguero` (`IDBODEGUERO`, `CEDULA`, `NOMBREBODEGUERO`, `FECHANACIMIENTO`, `CIUDADNACIMIENTO`, `DIRECCION`, `TELEFONO`, `ESTADO`, `ROL`, `EMAIL`, `PASSWORD`) VALUES
(1, '1004683593', 'Sebastian Velasco', '1995-05-18', 'Ibarra', 'Otavalo', '0983949094', 'A', 'B', 'jsvelascoa@utn.edu.ec', 'sebas.1234');
INSERT INTO `bodeguero` (`IDBODEGUERO`, `CEDULA`, `NOMBREADMINISTRADOR`, `FECHANACIMIENTO`, `CIUDADNACIMIENTO`, `DIRECCION`, `TELEFONO`, `ESTADO`, `ROL`, `EMAIL`, `PASSWORD`) VALUES
(2, '1003756937', 'Jordy', '1994-09-19', 'Arenillas', 'Priorato', '0983697528', 'A', 'A', 'admin@gmail.com', 'admin.1234');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `IDPRODUCTO` int(11) NOT NULL,
  `CODIGO` varchar(8) NOT NULL,
  `NOMBREPRODUCTO` varchar(100) NOT NULL,
  `DESCRIPCION` varchar(200) NOT NULL,
  `IVA` char(1) NOT NULL DEFAULT 'S',
  `COSTO` float(8,2) NOT NULL,
  `PVP` float(8,2) NOT NULL,
  `ESTADO` char(1) NOT NULL DEFAULT 'A',
  `STOCK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IDPRODUCTO`, `CODIGO`, `NOMBREPRODUCTO`, `DESCRIPCION`, `IVA`, `COSTO`, `PVP`, `ESTADO`, `STOCK`) VALUES
(1, 'PRO01', 'DORITOS', 'SNAKS', 'S', 0.30, 0.50, 'A', 100),
(2, 'PRO02', 'PLATANITOS', 'SNAKS', 'S', 0.35, 0.55, 'A', 100),
(3, 'PRO03', 'RUFFLES', 'SNAKS', 'S', 0.25, 0.45, 'A', 100),
(4, 'PRO04', 'MANICHO', 'CHOCOLATE', 'S', 1.00, 1.50, 'A', 100),
(5, 'PRO05', 'ARROZ 1LB', 'ALIMENTO', 'N', 0.25, 0.50, 'A', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IDUSUARIO` int(11) NOT NULL,
  `CEDULAUSUARIO` varchar(10) DEFAULT NULL,
  `NOMBREUSUARIO` varchar(100) DEFAULT NULL,
  `FECHANACIMIENTO` date DEFAULT NULL,
  `CIUDADNACIMIENTO` varchar(50) DEFAULT NULL,
  `DIRECCION` varchar(100) DEFAULT NULL,
  `TELEFONO` varchar(10) DEFAULT NULL,
  `ESTADO` char(1) DEFAULT NULL,
  `ROL` char(1) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`IDADMINISTRADOR`);

--
-- Indices de la tabla `ajusteproducto`
--
ALTER TABLE `ajusteproducto`
  ADD PRIMARY KEY (`IDAJUSTE`),
  ADD KEY `FK_REFERENCE_1` (`IDPRODUCTO`);

--
-- Indices de la tabla `bodeguero`
--
ALTER TABLE `bodeguero`
  ADD PRIMARY KEY (`IDBODEGUERO`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IDPRODUCTO`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IDUSUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `IDADMINISTRADOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ajusteproducto`
--
ALTER TABLE `ajusteproducto`
  MODIFY `IDAJUSTE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bodeguero`
--
ALTER TABLE `bodeguero`
  MODIFY `IDBODEGUERO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IDPRODUCTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IDUSUARIO` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ajusteproducto`
--
ALTER TABLE `ajusteproducto`
  ADD CONSTRAINT `FK_REFERENCE_1` FOREIGN KEY (`IDPRODUCTO`) REFERENCES `producto` (`IDPRODUCTO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
