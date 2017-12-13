-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-08-2017 a las 09:34:01
-- Versión del servidor: 5.5.48-cll
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `josmachu_frutas-y-verduras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE IF NOT EXISTS `administradores` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `telefono` varchar(9) NOT NULL DEFAULT '',
  `nacionalidad` varchar(30) NOT NULL DEFAULT '',
  `direccion` varchar(100) NOT NULL DEFAULT '',
  `numero` varchar(8) NOT NULL DEFAULT '',
  `comuna` varchar(50) NOT NULL DEFAULT '',
  `usuario` varchar(30) NOT NULL DEFAULT '',
  `contrasena` varchar(30) NOT NULL DEFAULT '',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `email`, `telefono`, `nacionalidad`, `direccion`, `numero`, `comuna`, `usuario`, `contrasena`, `fecha`) VALUES
(1, 'admin', 'admin@admin.cl', '123456789', 'Chile', 'tangananica', '12345', 'San Bernardo', 'admin', 'admin', '2017-06-29 00:10:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `telefono` varchar(9) NOT NULL,
  `nacionalidad` varchar(30) NOT NULL DEFAULT '',
  `direccion` varchar(100) NOT NULL DEFAULT '',
  `numero` varchar(8) NOT NULL DEFAULT '',
  `comuna` varchar(100) NOT NULL DEFAULT '',
  `usuario` varchar(30) NOT NULL DEFAULT '',
  `contrasena` varchar(20) NOT NULL DEFAULT '',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `email`, `telefono`, `nacionalidad`, `direccion`, `numero`, `comuna`, `usuario`, `contrasena`, `fecha`) VALUES
(7, 'prueba de usuario', 'email@email.com', '123456789', 'Argentina', 'callecita bonita', '12345678', 'san ramon', 'nuevousuario', 'nuevousuario', '2017-07-04 02:22:07'),
(8, 'juanito', 'juanito@juanito.cl', '234567890', 'Brasil', 'Alfonso Calderon, 15175', '15175', 'San Bernardo', 'juanito123', 'juanito123', '2017-07-04 02:29:02'),
(10, 'Pedro Picapiedra', 'pedropiedra@piedrotas.cl', '123456789', 'Colombia', 'Pedrito de las piedras', '123456', 'Petronilo', 'pedropicadiedra', 'pedropicadiedra', '2017-07-04 02:35:12'),
(11, 'Andres Jara', 'andres.cwq@gmail.com', '+56952079', 'Chile', 'Larrains', '7941', 'La REina', 'ajara', '12345678', '2017-07-06 16:39:16'),
(12, 'Aileen Sanchez', 'aileen.sanchez@abcdin.cl', '228984081', 'Chile', 'Estado 57', '57', 'Santiago centro', 'Aileen.sanchez', 'Contacto2018', '2017-07-09 23:48:01'),
(13, 'Jose Machuca', 'josemachucasazo@gmail.com', '950915306', 'Chile', 'Alfonso Calderon', '15175', 'San Bernardo', 'JOXE8989', 'JOXE8989', '2017-07-09 23:59:53'),
(14, 'luis felipe', 'luisfel@luisfel.cl', '000000000', 'Chile', 'lusfelilandia', '666', 'providencia', 'luisfel', 'luisfel1', '2017-07-14 00:35:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(100) NOT NULL DEFAULT '',
  `codigo` varchar(14) NOT NULL DEFAULT '',
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `precio` float NOT NULL DEFAULT '0',
  `cantidad` int(5) NOT NULL DEFAULT '0',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `cliente`, `codigo`, `nombre`, `precio`, `cantidad`, `fecha`) VALUES
(35, '', 'huev24234234', 'Quinoa', 180, 1, '2017-07-02 23:01:59'),
(36, '', 'huev24234234', 'Quinoa', 180, 1, '2017-07-02 23:03:40'),
(37, '', 'camr239847', 'CamarÃ³n Nacional', 4500, 1, '2017-07-02 23:04:11'),
(38, '', 'camr239847', 'CamarÃ³n Nacional', 4500, 1, '2017-07-02 23:04:23'),
(39, '', 'huev24234234', 'Quinoa', 180, 6, '2017-07-02 23:05:27'),
(41, '', 'huev24234234', 'Quinoa', 180, 1, '2017-07-02 23:42:08'),
(42, '', 'huev24234234', 'Quinoa', 180, 5, '2017-07-02 23:42:36'),
(43, '', 'Pulpa4321', 'Pulpa de Limon Guallarauco', 5100, 1, '2017-07-03 00:17:09'),
(45, '9', 'huev24234234', 'Quinoa', 180, 17, '2017-07-04 02:36:50'),
(46, '', 'huev24234234', 'Quinoa', 180, 1, '2017-07-04 14:38:52'),
(47, '', 'huev24234234', 'Quinoa', 180, 1, '2017-07-04 14:39:49'),
(48, '', 'huev24234234', 'Quinoa', 180, 1, '2017-07-04 14:41:25'),
(49, '', 'huev24234234', 'Quinoa', 180, 1, '2017-07-04 14:45:29'),
(50, '', 'huev24234234', 'Quinoa', 180, 1, '2017-07-04 14:46:56'),
(51, '', 'huev24234234', 'Quinoa', 180, 1, '2017-07-04 14:49:52'),
(54, '', 'huev24234234', 'Quinoa', 180, 1, '2017-07-04 14:57:27'),
(55, '', 'pulpa123', 'Pulpa de Maracuya Guallarauco	', 6240, 1, '2017-07-04 14:57:36'),
(56, '', 'huev24234234', 'Quinoa', 180, 1, '2017-07-04 15:06:41'),
(57, '', 'huev24234234', 'Quinoa', 180, 1, '2017-07-04 15:06:58'),
(58, '1', 'PES006', 'Merluza Filete', 3500, 1, '2017-07-06 14:24:22'),
(59, '11', 'COC023', 'Semilla de Sesamo', 2300, 2, '2017-07-07 20:03:57'),
(60, '', 'COC003', 'Huevos Jumbo', 3500, 1, '2017-07-06 23:11:18'),
(61, '', 'COC008', 'Aceitunas verdes', 1800, 1, '2017-07-06 23:44:54'),
(62, '', 'COC019', 'Pistachos', 3500, 1, '2017-07-07 13:39:33'),
(65, '', 'COC007', 'Aceituna Morada', 900, 1, '2017-07-07 16:00:27'),
(66, '', 'COC003', 'Huevos Jumbo', 3500, 1, '2017-07-09 16:50:03'),
(67, '7', 'FRU024', 'Limones', 750, 19, '2017-07-09 16:52:24'),
(68, '7', 'FRU005', 'Pulpa de Limon Guallarauco', 5100, 17, '2017-07-09 16:53:15'),
(69, '', 'COC001', 'Quinoa', 1800, 1, '2017-07-10 03:05:05'),
(70, '', 'COC003', 'Huevos Jumbo', 3500, 1, '2017-07-10 03:06:20'),
(71, '', 'COC003', 'Huevos Jumbo', 3500, 1, '2017-07-10 03:06:32'),
(72, '', 'COC002', 'Semilla Linaza', 1300, 1, '2017-07-10 03:08:41'),
(73, '', 'FRU034', 'Pi_a Extra', 1990, 1, '2017-07-10 07:32:01'),
(74, '', 'COC002', 'Semilla Linaza', 1300, 1, '2017-07-13 02:07:33'),
(75, '14', 'FRU008', 'Peras de Agua', 990, 12, '2017-07-14 00:38:40'),
(76, '14', 'PES013', 'Choclo en Grano', 1050, 12, '2017-07-14 00:38:32'),
(77, '', 'COC002', 'Semilla Linaza', 1300, 1, '2017-07-14 00:39:22'),
(78, '', 'COC002', 'Semilla Linaza', 1300, 1, '2017-07-14 00:41:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `codigo` char(12) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `frase_promocional` mediumtext NOT NULL,
  `unidad` set('Unid','Pote','Paquete','Mata','Malla','Litro','Kilo','Cabeza','Bandeja de 20 und','Bandeja 250 gr','Bandeja 200 gr','Bandeja 100 gr','Bandeja','900 gr','875 gr','850 gr','6 Unid','500 gr','50 Unid','400 gr','370 cc','3 Unid','250 gr','200 gr','2 Kilo','2 Kg','100 gr','1/4 Kilo','1/2 Litro','1/2 Kilo Jumbo','1/2 Kilo') NOT NULL,
  `precio` float NOT NULL,
  `disponibilidad` enum('1','0') NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `promocion` enum('Si','No') NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=212 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `codigo`, `categoria`, `frase_promocional`, `unidad`, `precio`, `disponibilidad`, `descripcion`, `promocion`, `fecha`) VALUES
(2, 'Melon Tuna', 'FRU029', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Unid', 1300, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(3, 'Pi_a Extra', 'FRU034', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Unid', 1990, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(4, 'Sandia', 'FRU045', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Unid', 1900, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(5, 'Huevos Jumbo', 'COC004', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', 'Unid', 180, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(6, 'Cream Cheese', 'COC042', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', 'Unid', 1890, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(7, 'Provoleta Parrillera', 'COC043', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', 'Unid', 2300, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(8, 'Queso Edam', 'COC044', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', 'Unid', 2300, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(9, 'Queso con Oregano', 'COC045', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', 'Unid', 2500, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(10, 'Queso Con Pimienta', 'COC046', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', 'Unid', 2600, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(11, 'Queso con Aji', 'COC047', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', 'Unid', 1990, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(12, 'Reggianito', 'COC048', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', 'Unid', 2000, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(13, 'Queso de Cabra con Oregano', 'COC050', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', 'Unid', 3300, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(14, 'Chucrut', 'COC051', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', 'Unid', 350, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(15, 'Salsa Americana', 'COC052', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', 'Unid', 350, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(16, 'Queso Gruyere', 'COC054', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', 'Unid', 3500, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(17, 'Huevos de Campo', 'COC060', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', 'Unid', 250, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(18, 'Zapallos Italianos', 'VER001', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 350, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(19, 'Pepino Ensalada', 'VER004', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 400, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(20, 'Lechuga Hidroponica', 'VER005', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 600, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(21, 'Choclo Pastelero', 'VER006', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 590, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(22, 'Pimenton Amarillo', 'VER007', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 800, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(23, 'Achicoria', 'VER012', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 700, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(24, 'Berenjena', 'VER018', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 500, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(25, 'Berenjena', 'VER019', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 500, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(26, 'Brocoli', 'VER021', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 990, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(27, 'Cebollas', 'VER022', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 200, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(28, 'Coliflor', 'VER026', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 990, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(29, 'Costina', 'VER032', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 990, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(30, 'Lechuga Costina', 'VER033', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 990, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(31, 'Lechuga Escarola', 'VER034', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 990, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(32, 'Lechuga Espa_ola', 'VER035', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 700, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(33, 'Lechuga Francesa', 'VER036', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 700, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(34, 'Lechuga Milanesa', 'VER037', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 600, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(35, 'Pimiento Rojo', 'VER040', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(36, 'Pimiento Verde', 'VER041', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(37, 'Repollo Verde', 'VER045', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 990, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(38, 'Repollo Morado', 'VER046', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 990, '1', 'Esto es una descripcion de un producto', 'No', '0000-00-00 00:00:00'),
(39, 'Pepino Alaska', 'VER047', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 750, '1', 'Esto es una descripcion de un producto', 'No', '0000-00-00 00:00:00'),
(40, 'Choclo Americano', 'VER049', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 500, '1', 'Esto es una descripcion de un producto', 'No', '0000-00-00 00:00:00'),
(41, 'Puerros', 'VER052', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 500, '1', 'Esto es una descripcion de un producto', 'No', '0000-00-00 00:00:00'),
(42, 'Alcachofas 2x1000', 'VER053', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 1000, '1', 'Esto es una descripcion de un producto', 'No', '0000-00-00 00:00:00'),
(43, 'Alcachofas', 'VER054', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 600, '1', 'Esto es una descripcion de un producto', 'No', '0000-00-00 00:00:00'),
(44, 'Ajo Malla 4x1000', 'VER055', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 600, '1', 'Esto es una descripcion de un producto', 'No', '0000-00-00 00:00:00'),
(45, 'Lechuga Salanova', 'VER056', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Unid', 1200, '1', 'Esto es una descripcion de un producto', 'No', '0000-00-00 00:00:00'),
(46, 'Betarraga', 'VER020', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Paquete', 890, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(47, 'Cebollines', 'VER023', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Paquete', 700, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(48, 'ciboulette', 'VER024', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Paquete', 300, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(49, 'Cilandro', 'VER025', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Paquete', 300, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(50, 'Perejil', 'VER039', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Paquete', 300, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(51, 'Zanahorias', 'VER043', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Paquete', 990, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(52, 'Verdura Surtida', 'VER048', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Paquete', 500, '1', 'Esto es una descripcion de un producto', 'No', '0000-00-00 00:00:00'),
(53, 'Rabanitos', 'VER050', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Paquete', 750, '1', 'Esto es una descripcion de un producto', 'No', '0000-00-00 00:00:00'),
(54, 'Pera winter nelly', 'FRU002', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 990, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(55, 'Pulpa de Maracuya Guallarauco', 'FRU003', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 6240, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(56, 'Pulpa de Guayaba Guallarauco', 'FRU004', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 4180, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(57, 'Pulpa de Limon Guallarauco', 'FRU005', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 5100, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(58, 'Pulpa de Melon Tuna Guallarauco', 'FRU006', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 2480, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(59, 'Platanos', 'FRU007', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 890, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(60, 'Peras de Agua', 'FRU008', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 990, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(61, 'Ciruela', 'FRU009', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 990, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(62, 'Manzanas Verdes', 'FRU010', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 990, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(63, 'Pepino Fruta', 'FRU011', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 1200, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(64, 'Manzanas fuji', 'FRU012', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 990, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(65, 'Mancaquis', 'FRU014', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 1500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(66, 'Cerezas', 'FRU015', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 1000, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(67, 'Chirimoya', 'FRU016', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 1500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(68, 'Damascos', 'FRU017', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 1000, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(69, 'Duraznos conservero', 'FRU018', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 890, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(70, 'Duraznos Prisco', 'FRU019', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 890, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(71, 'Frutillas', 'FRU021', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 2800, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(72, 'Granadas', 'FRU022', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 1200, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(73, 'Higos secos', 'FRU023', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 1500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(74, 'Limones', 'FRU024', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 750, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(75, 'Lucuma fuerda de temporada', 'FRU025', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 3000, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(76, 'Mandarinas', 'FRU026', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 1490, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(77, 'Manzanas Rojas', 'FRU027', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 990, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(78, 'Naranja Chilena', 'FRU030', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 990, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(79, 'Palta Hass', 'FRU031', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 3500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(80, 'Kiwi', 'FRU032', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 990, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(81, 'Papaya', 'FRU033', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 1500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(82, 'Pomelos', 'FRU035', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 750, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(83, 'Tunas', 'FRU036', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 2500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(84, 'Uvas sin pepas', 'FRU037', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 1990, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(85, 'Uva negra', 'FRU038', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 1500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(86, 'Uva Rosada pastilla', 'FRU039', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 1500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(87, 'Nisperos', 'FRU040', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 770, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(88, 'Durazno Platano', 'FRU041', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 990, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(89, 'Durazno Pelado', 'FRU042', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 1000, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(90, 'Clementinas', 'FRU043', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 1490, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(91, 'Naranja Pomelo', 'FRU044', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 990, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(92, 'Pulpa de Chirimoya Guallarauco', 'FRU046', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 5780, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(93, 'Pulpa de Mango Guallarauco', 'FRU047', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 4950, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(94, 'Pulpa de Papaya Guallarauco', 'FRU048', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 3790, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(95, 'Pulpa de Pi_a Guallarauco', 'FRU049', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 4230, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(96, 'Pulpa de Frutilla Guallarauco', 'FRU050', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 3540, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(97, 'Pulpa de Frambuesa Guallarauco', 'FRU051', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 4690, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(98, 'Durazno peludo', 'FRU052', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 990, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(99, 'Pl_tano Verde (de cocina)', 'FRU053', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 1200, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(100, 'Naranja oferta 2kg por 1000', 'FRU054', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 1000, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(101, 'Palta Ester', 'FRU055', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 3500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(102, 'Filete de Salmon', 'PES009', 'Pescados y Congelados', 'Esto es una frase Promocional de un Producto', 'Kilo', 12500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(103, 'Choclo en Grano', 'PES016', 'Pescados y Congelados', 'Esto es una frase Promocional de un Producto', 'Kilo', 1850, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(104, 'Papas Fritas', 'PES018', 'Pescados y Congelados', 'Esto es una frase Promocional de un Producto', 'Kilo', 1850, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(105, 'Papas Duqueza', 'PES019', 'Pescados y Congelados', 'Esto es una frase Promocional de un Producto', 'Kilo', 2250, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(106, 'Esparragos', 'PES020', 'Pescados y Congelados', 'Esto es una frase Promocional de un Producto', 'Kilo', 4000, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(107, 'Jardinera', 'PES022', 'Pescados y Congelados', 'Esto es una frase Promocional de un Producto', 'Kilo', 1750, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(108, 'Robalo Filete', 'PES023', 'Pescados y Congelados', 'Esto es una frase Promocional de un Producto', 'Kilo', 9000, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(109, 'Miel', 'COC015', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', 'Kilo', 4500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(110, 'Limon de Pica', 'COC055', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', 'Kilo', 3000, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(111, 'Zapallo Camote', 'VER002', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Kilo', 1200, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(112, 'Tomate', 'VER003', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Kilo', 1590, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(113, 'Esparragos', 'VER029', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Kilo', 1000, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(114, 'Espinaca', 'VER030', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Kilo', 1000, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(115, 'Habas 2 X 1500', 'VER031', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Kilo', 1500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(116, 'Papas', 'VER038', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Kilo', 500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(117, 'Porotos Granados', 'VER044', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Kilo', 990, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(118, 'Porotos Verdes', 'VER051', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Kilo', 2000, '1', 'Esto es una descripcion de un producto', 'No', '0000-00-00 00:00:00'),
(119, 'Bruselas', 'VER058', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Kilo', 1500, '1', 'Esto es una descripcion de un producto', 'No', '0000-00-00 00:00:00'),
(120, 'Rucula', 'VER008', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Bandeja 200 gr', 990, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(121, 'Tomate Cherry Oferta', 'VER010', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Bandeja 200 gr', 990, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(122, 'Aj_ Rocoto Peruano', 'VER014', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Bandeja 200 gr', 1300, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(123, 'Albahaca', 'VER016', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Bandeja 200 gr', 990, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(124, 'Diente de dragon', 'VER027', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Bandeja 200 gr', 800, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(125, 'Dulce Catalina Higos negros en Alm_bar', 'COC063', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '900 gr', 7000, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(126, 'Dulce Catalina Peras en Alm_bar', 'COC065', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '900 gr', 7000, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(127, 'Choclo en Grano', 'PES013', 'Pescados y Congelados', 'Esto es una frase Promocional de un Producto', '500 gr', 1050, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(128, 'Huesillo con Carozo', 'COC028', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '500 gr', 3500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(129, 'Huesillo Descarozado', 'COC029', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '500 gr', 5500, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(130, 'Jardinera', 'PES015', 'Pescados y Congelados', 'Esto es una frase Promocional de un Producto', '400 gr', 1050, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(131, 'Ciruela Secas con Carozo', 'COC030', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '400 gr', 2500, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(132, 'Ciruela Secas sin carozo', 'COC031', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '400 gr', 3000, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(133, 'Casta_as de Caju', 'COC009', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '250 gr', 3990, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(134, 'Nueces', 'COC017', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '250 gr', 3200, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(135, 'Almendras', 'COC018', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '250 gr', 3700, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(136, 'Pistachos', 'COC019', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '250 gr', 3500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(137, 'Man_ Tostado', 'COC020', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '250 gr', 1500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(138, 'Man_ salado', 'COC021', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '250 gr', 1500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(139, 'Higos secos', 'COC022', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '250 gr', 1500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(140, 'Semilla de Sesamo', 'COC023', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '250 gr', 2300, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(141, 'Semilla de Quinoa', 'COC024', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '250 gr', 3700, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(142, 'Man_ Confitado', 'COC025', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '250 gr', 1700, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(143, 'Man_ con Merken', 'COC027', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '250 gr', 1500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(144, 'Pasas Rubias', 'COC032', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '250 gr', 1500, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(145, 'Mantequilla Kumey 1/4', 'COC037', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '250 gr', 1200, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(146, 'Almendra Confitada', 'COC056', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '250 gr', 3500, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(147, 'Pi_a Confitada', 'COC057', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '250 gr', 2300, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(148, 'Kiwi Confitado', 'COC058', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '250 gr', 2500, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(149, 'Semilla de Chia', 'COC059', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '250 gr', 1700, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(150, 'Mix Natural', 'COC066', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '250 gr', 2200, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(151, 'Man_ con Especies', 'COC026', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '200 gr', 1700, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(152, 'Aj_ en Salsa', 'VER013', 'Verduras', 'Esto es una frase Promocional de un Producto', '200 gr', 400, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(153, 'Carbon', 'COC010', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '2 Kilo', 2200, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(154, 'Aceituna Morada', 'COC007', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '1/4 Kilo', 900, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(155, 'Aceituna', 'COC012', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '1/4 Kilo', 900, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(156, 'Queso de Cabra', 'COC033', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '1/4 Kilo', 2000, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(157, 'Queso las Parcelas de Valdivia', 'COC035', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '1/4 Kilo', 1750, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(158, 'Harina Tostada', 'LEG002', 'Legumbres', 'Esto es una frase Promocional de un Producto', '1/2 Kilo', 500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(159, 'Lentejas', 'LEG003', 'Legumbres', 'Esto es una frase Promocional de un Producto', '1/2 Kilo', 1000, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(160, 'Poroto Burro', 'LEG004', 'Legumbres', 'Esto es una frase Promocional de un Producto', '1/2 Kilo', 1500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(161, 'Mote', 'LEG005', 'Legumbres', 'Esto es una frase Promocional de un Producto', '1/2 Kilo', 600, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(162, 'Poroto negro', 'LEG006', 'Legumbres', 'Esto es una frase Promocional de un Producto', '1/2 Kilo', 1000, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(163, 'Poroto Payares', 'LEG007', 'Legumbres', 'Esto es una frase Promocional de un Producto', '1/2 Kilo', 1000, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(164, 'Camar_n Nacional', 'PES001', 'Pescados y Congelados', 'Esto es una frase Promocional de un Producto', '1/2 Kilo', 4500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(165, 'Paila Marina', 'PES002', 'Pescados y Congelados', 'Esto es una frase Promocional de un Producto', '1/2 Kilo', 3500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(166, 'Surtido de Mariscos', 'PES003', 'Pescados y Congelados', 'Esto es una frase Promocional de un Producto', '1/2 Kilo', 1450, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(167, 'Choritos Carne', 'PES004', 'Pescados y Congelados', 'Esto es una frase Promocional de un Producto', '1/2 Kilo', 1450, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(168, 'Reineta Filete', 'PES005', 'Pescados y Congelados', 'Esto es una frase Promocional de un Producto', '1/2 Kilo', 3500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(169, 'Merluza Filete', 'PES006', 'Pescados y Congelados', 'Esto es una frase Promocional de un Producto', '1/2 Kilo', 3500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(170, 'Peskaditos Apanados', 'PES007', 'Pescados y Congelados', 'Esto es una frase Promocional de un Producto', '1/2 Kilo', 3900, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(171, 'Hamburguesa Apanada', 'PES008', 'Pescados y Congelados', 'Esto es una frase Promocional de un Producto', '1/2 Kilo', 2500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(172, 'Congrio', 'PES011', 'Pescados y Congelados', 'Esto es una frase Promocional de un Producto', '1/2 Kilo', 7000, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(173, 'Carne de Jaiva', 'PES021', 'Pescados y Congelados', 'Esto es una frase Promocional de un Producto', '1/2 Kilo', 4500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(174, 'Aceitunas verdes', 'COC008', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '1/2 Kilo', 1800, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(175, 'Aceituna', 'COC013', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '1/2 Kilo', 1800, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(176, 'Miel', 'COC014', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '1/2 Kilo', 2500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(177, 'Queso de Cabra', 'COC034', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '1/2 Kilo', 2000, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(178, 'Queso las Parcelas de Valdivia', 'COC036', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '1/2 Kilo', 3500, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(179, 'Queso Fresco', 'COC039', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '1/2 Kilo', 2200, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(180, 'Camotes PERUANO', 'VER028', 'Verduras', 'Esto es una frase Promocional de un Producto', '1/2 Kilo', 1000, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(181, 'Melones Calame_o', 'FRU028', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Unid', 1200, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(182, 'Frambuesas', 'FRU020', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Pote', 1500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(183, 'Acelga', 'VER011', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Paquete', 1500, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(184, 'Apio', 'VER017', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Mata', 1200, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(185, 'Cebolla morada malla', 'VER057', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Malla', 990, '1', 'Esto es una descripcion de un producto', 'No', '0000-00-00 00:00:00'),
(186, 'Aceite de oliva', 'COC038', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', 'Litro', 3990, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(187, 'Mango', 'FRU001', 'Frutas', 'Esto es una frase Promocional de un Producto', 'Kilo', 4000, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(188, 'Ajos', 'VER042', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Cabeza', 350, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(189, 'Huevos Jumbo', 'COC003', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', 'Bandeja de 20 und', 3500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(190, 'Tomate deshidratado', 'COC011', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', 'Bandeja 250 gr', 2500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(191, 'Champi_ones', 'COC040', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', 'Bandeja 200 gr', 1250, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(192, 'Menta', 'VER009', 'Verduras', 'Esto es una frase Promocional de un Producto', 'Bandeja 100 gr', 990, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(193, 'Huevos de codorniz', 'COC053', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', 'Bandeja', 1990, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(194, 'Dulce Catalina Higos Blancos en Alm_bar', 'COC062', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '900 gr', 7000, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(195, 'Dulce Catalina Cerezas en Almibar', 'COC061', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '875 gr', 7000, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(196, 'Dulce Catalina Higos trozados en Alm_bar', 'COC064', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '850 gr', 7000, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(197, 'Brevas', 'FRU013', 'Frutas', 'Esto es una frase Promocional de un Producto', '6 Unid', 990, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(198, 'Arvejitas', 'PES012', 'Pescados y Congelados', 'Esto es una frase Promocional de un Producto', '500 gr', 1050, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(199, 'Empanaditas de Queso', 'COC041', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '50 Unid', 3800, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(200, 'Habas', 'PES014', 'Pescados y Congelados', 'Esto es una frase Promocional de un Producto', '400 gr', 1050, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(201, 'Aceite de oliva', 'COC005', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '370 cc', 2990, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(202, 'Aj_ Verde', 'VER015', 'Verduras', 'Esto es una frase Promocional de un Producto', '3 Unid', 100, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(203, 'Semilla Linaza', 'COC002', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '250 gr', 1300, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(204, 'jengibre', 'COC016', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '200 gr', 1000, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(205, 'Jardinera', 'PES017', 'Pescados y Congelados', 'Esto es una frase Promocional de un Producto', '2 Kilo', 3250, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(206, 'Porotos Granados', 'PES024', 'Pescados y Congelados', 'Esto es una frase Promocional de un Producto', '2 Kg', 4000, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(207, 'Queso Azul', 'COC049', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '100 gr', 1900, '0', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(208, 'Quinoa', 'COC001', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '1/4 Kilo', 1800, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(209, 'Aceite de Oliva', 'COC006', 'Coctel y Tostaduria', 'Esto es una frase Promocional de un Producto', '1/2 Litro', 2700, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(210, 'Camar_n Nacional', 'PES010', 'Pescados y Congelados', 'Esto es una frase Promocional de un Producto', '1/2 Kilo Jumbo', 4500, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00'),
(211, 'Garbanzo', 'LEG001', 'Legumbres', 'Esto es una frase Promocional de un Producto', '1/2 Kilo', 1000, '1', 'Esto es una descripcion de un producto', 'Si', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
