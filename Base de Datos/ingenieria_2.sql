-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-07-2014 a las 01:18:59
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ingenieria 2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `dni` int(11) NOT NULL,
  `nombre_usuario` varchar(30) NOT NULL,
  `clave` varchar(30) NOT NULL,
  `telefono` int(10) NOT NULL,
  `fecha_nac` date NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `calle` varchar(30) NOT NULL,
  `numero_casa` int(11) NOT NULL,
  `depto` int(11) NOT NULL,
  `piso` int(11) NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`dni`, `nombre_usuario`, `clave`, `telefono`, `fecha_nac`, `apellido`, `nombre`, `calle`, `numero_casa`, `depto`, `piso`) VALUES
(23456789, 'andres', 'clave2', 4532796, '2014-06-10', 'perez', 'andres', '54', 345, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `id_autor` int(12) NOT NULL AUTO_INCREMENT,
  `nombre_autor` varchar(30) NOT NULL,
  `apellido_autor` varchar(30) NOT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `nombre_autor`, `apellido_autor`) VALUES
(1, 'Carmen', 'Valldejuli'),
(2, 'Kristen', 'Feola'),
(3, 'Mirta G.', 'Carabajal'),
(4, 'Petro c.', 'De Gandulfo'),
(5, 'Christian', 'Bayle'),
(6, 'Toni', 'Rodriguez'),
(7, 'Cecilia', 'Fassardi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `nombre_categoria` varchar(30) NOT NULL,
  PRIMARY KEY (`nombre_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`nombre_categoria`) VALUES
('Criolla'),
('Cupcakes'),
('Guia'),
('Jugos'),
('Recetas'),
('Rusticas'),
('Viandas'),
('Zumos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `dni` int(11) NOT NULL,
  `nombre_usuario` varchar(30) NOT NULL,
  `clave` varchar(30) NOT NULL,
  `telefono` int(15) NOT NULL,
  `fecha_nac` date NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `provincia` varchar(20) NOT NULL,
  `localidad` varchar(20) NOT NULL,
  `calle` varchar(30) NOT NULL,
  `numero_casa` int(11) NOT NULL,
  `depto` int(11) NOT NULL,
  `piso` int(11) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `dni`, `nombre_usuario`, `clave`, `telefono`, `fecha_nac`, `apellido`, `nombre`, `provincia`, `localidad`, `calle`, `numero_casa`, `depto`, `piso`) VALUES
(1, 17456980, 'perezpepe', 'pepe', 2147483647, '1984-12-24', 'Perez', 'Pepe', 'Buenos Aires', 'La Plata', '76', 234, 0, 0),
(2, 23907283, 'ItalyForce', 'ITALYFORCE', 2147483647, '1989-12-12', 'pascual', 'andres', 'buenos aires', 'la plata', 'calle 55', 234, 2, 3),
(3, 22222222, 'qqqqqqq', 'qqqqqqq', 2147483647, '1995-12-12', 'sobrado', 'ariel', 'assaas', 'sasasasa', 'sasasa', 222, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE IF NOT EXISTS `editorial` (
  `id_editorial` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Edi` varchar(30) NOT NULL,
  PRIMARY KEY (`id_editorial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id_editorial`, `Nombre_Edi`) VALUES
(1, 'De Bolsillo'),
(2, 'Emece'),
(3, 'Santillana'),
(4, 'Puerto de Palos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE IF NOT EXISTS `libro` (
  `ISBN` varchar(11) NOT NULL,
  `stock_minimo` int(11) NOT NULL,
  `stock_actual` int(11) NOT NULL,
  `precio` double NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `idioma` varchar(30) NOT NULL,
  `paginas` int(11) NOT NULL,
  `fecha_publi` date NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_editorial` int(11) NOT NULL,
  `oferta` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ISBN`,`id_autor`,`id_editorial`),
  KEY `id_autor` (`id_autor`),
  KEY `id_editorial` (`id_editorial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`ISBN`, `stock_minimo`, `stock_actual`, `precio`, `titulo`, `idioma`, `paginas`, `fecha_publi`, `id_autor`, `id_editorial`, `oferta`) VALUES
('1478523698', 4, 15, 47.8, 'Cupcakes veganos', 'Español', 55, '2011-01-02', 6, 1, 1),
('1903479542', 6, 13, 79.84, 'El libro de las viandas mas practicas', 'Espanol', 87, '2012-01-01', 7, 4, 0),
('2255748', 2, 3, 500, ' de Daniel', 'Español', 68, '2014-07-11', 1, 1, 0),
('274694293', 5, 10, 58.99, 'Todo sobre la cocina Criolla', 'EspaÃ±ol', 87, '1983-03-31', 1, 4, 0),
('290148481', 10, 57, 87.45, 'Las mejores recetas en 10 minutos', 'Espanol', 70, '2012-07-24', 3, 2, 0),
('330294293', 5, 10, 58.99, 'Cocina local', 'EspaÃ±ol', 87, '1983-03-31', 1, 4, 0),
('3698523257', 4, 15, 47.8, 'Cupcakes', 'EspaÃ±ol', 55, '2011-01-02', 6, 1, 0),
('431044777', 3, 23, 152.21, 'Cocina popular', 'Espanol', 154, '2006-06-06', 4, 1, 1),
('563287655', 6, 12, 99.99, 'La dieta de los zumos', 'EspaÃ±ol', 54, '1999-03-05', 5, 3, 0),
('587956789', 2, 7, 69, 'La guia optima de Pedro', 'Espanol', 68, '2001-08-25', 2, 4, 0),
('743887655', 6, 12, 99.99, 'La dieta de los 1000 zumos', 'EspaÃ±ol', 54, '1999-03-05', 5, 3, 1),
('763256789', 2, 7, 69, 'La guia para los primeros pasos', 'Espanol', 68, '2001-08-25', 2, 4, 0),
('7724523257', 4, 15, 47.8, 'Cupcakes para todos', 'EspaÃ±ol', 55, '2011-01-02', 6, 1, 0),
('8521479632', 6, 13, 79.84, 'El libro de las viandas para peque&ntilde;os', 'Español', 87, '2012-01-01', 7, 4, 0),
('878987655', 6, 12, 99.99, 'La dieta de los zumos', 'Español', 54, '1999-03-05', 5, 3, 0),
('879548481', 10, 57, 87.45, 'Las mejores recetas de rico y abundante', 'Español', 70, '2012-07-24', 3, 2, 0),
('882894293', 5, 10, 58.99, 'Cocina criolla', 'Español', 87, '1983-03-31', 1, 4, 0),
('888444777', 3, 23, 152.21, 'Cocina con calor de hogar - rustica', 'Español', 154, '2006-06-06', 4, 1, 0),
('897348481', 10, 57, 87.45, 'Las mejores recetas de rico y facil', 'Espanol', 70, '2012-07-24', 3, 2, 0),
('921444777', 3, 23, 152.21, 'Cocina para los rusticos', 'Espanol', 154, '2006-06-06', 4, 1, 0),
('9502479542', 6, 13, 79.84, 'El libro de las viandas', 'Espanol', 87, '2012-01-01', 7, 4, 0),
('asda', 0, 0, 0, '', '', 0, '0000-00-00', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_categoria`
--

CREATE TABLE IF NOT EXISTS `libro_categoria` (
  `ISBN` varchar(11) NOT NULL,
  `nombre_categoria` varchar(30) NOT NULL,
  PRIMARY KEY (`ISBN`,`nombre_categoria`),
  KEY `nombre_categoria` (`nombre_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libro_categoria`
--

INSERT INTO `libro_categoria` (`ISBN`, `nombre_categoria`) VALUES
('274694293', 'Criolla'),
('882894293', 'Criolla'),
('1478523698', 'Cupcakes'),
('3698523257', 'Cupcakes'),
('7724523257', 'Cupcakes'),
('587956789', 'Guia'),
('763256789', 'Guia'),
('563287655', 'Jugos'),
('743887655', 'Jugos'),
('878987655', 'Jugos'),
('290148481', 'Recetas'),
('879548481', 'Recetas'),
('897348481', 'Recetas'),
('330294293', 'Rusticas'),
('431044777', 'Rusticas'),
('888444777', 'Rusticas'),
('921444777', 'Rusticas'),
('1903479542', 'Viandas'),
('8521479632', 'Viandas'),
('9502479542', 'Viandas'),
('563287655', 'Zumos'),
('878987655', 'Zumos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `id_reserva` (`id_reserva`),
  KEY `id_reserva_2` (`id_reserva`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_venta` date NOT NULL,
  `estado` varchar(30) NOT NULL,
  `cant_venta` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `fecha_venta`, `estado`, `cant_venta`, `precio`, `id_cliente`, `ISBN`) VALUES
(2, '0000-00-00', 'Procesando', 3, 143, 0, 1478523698),
(24, '2014-07-17', 'Entregado', 4, 191, 1, 1478523698),
(25, '2014-07-17', 'Procesando', 4, 191, 1, 1478523698),
(26, '2014-07-17', 'Procesando', 7, 483, 1, 123456789);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libro_ibfk_2` FOREIGN KEY (`id_editorial`) REFERENCES `editorial` (`id_editorial`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `libro_categoria`
--
ALTER TABLE `libro_categoria`
  ADD CONSTRAINT `libro_categoria_ibfk_1` FOREIGN KEY (`nombre_categoria`) REFERENCES `categoria` (`nombre_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libro_categoria_ibfk_2` FOREIGN KEY (`ISBN`) REFERENCES `libro` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
