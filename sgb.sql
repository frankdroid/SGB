-- phpMyAdmin SQL Dump
-- version 4.0.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-12-2013 a las 09:37:12
-- Versión del servidor: 5.6.14-log
-- Versión de PHP: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sgb`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Revision_Morosos`()
BEGIN


UPDATE miembros as m
  JOIN prestamos as p
  on m.id_miembro = p.id_miembro AND p.fec_dev < CURDATE()
  SET m.estado = 'MOROSO';

INSERT INTO auditoria SET
    modificado = DATE( NOW( ) ),
    id_usuario = 3,
    descripcion = 'Modificación',
    nombre_tabla = 'Miembros';

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE IF NOT EXISTS `auditoria` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `modificado` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `nombre_tabla` varchar(20) NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`id_log`, `modificado`, `id_usuario`, `descripcion`, `nombre_tabla`) VALUES
(1, '2013-12-04', 1, 'Modificación', 'Miembros'),
(2, '2013-12-04', 1, 'Modificación', 'Miembros'),
(3, '2013-12-04', 1, 'Modificación', 'Miembros'),
(4, '2013-12-04', 1, 'Modificación', 'Miembros'),
(5, '2013-12-04', 1, 'Inserción', 'Prestamos'),
(6, '2013-12-04', 1, 'Modificación', 'Miembros'),
(7, '2013-12-04', 1, 'Modificación', 'Miembros'),
(8, '2013-12-04', 1, 'Inserción', 'Prestamos'),
(9, '2013-12-04', 1, 'Eliminación', 'Autores'),
(10, '2013-12-04', 1, 'Inserción', 'Autores'),
(11, '2013-12-04', 1, 'Eliminación', 'Autores'),
(12, '2013-12-04', 1, 'Inserción', 'Autores'),
(13, '2013-12-04', 1, 'Eliminación', 'Autores'),
(14, '2013-12-04', 1, 'Inserción', 'Autores'),
(15, '2013-12-04', 1, 'Eliminación', 'Autores'),
(16, '2013-12-04', 1, 'Inserción', 'Autores'),
(17, '2013-12-04', 1, 'Inserción', 'Prestamos'),
(18, '2013-12-04', 3, 'Modificación', 'Miembros'),
(19, '2013-12-04', 1, 'Devolución', 'Prestamos'),
(20, '2013-12-04', 1, 'Eliminación', 'Autores'),
(21, '2013-12-04', 1, 'Inserción', 'Autores'),
(22, '2013-12-04', 1, 'Inserción', 'Prestamos'),
(23, '2013-12-04', 1, 'Inserción', 'Prestamos'),
(24, '2013-12-04', 1, 'Cierre de sesion', 'Usuarios'),
(25, '2013-12-04', 1, 'Inicio de sesion', 'Usuarios'),
(26, '2013-12-04', 1, 'Modificación', 'Libros'),
(27, '2013-12-04', 1, 'Modificación', 'Libros'),
(28, '2013-12-04', 1, 'Modificación', 'Libros'),
(29, '2013-12-04', 1, 'Modificación', 'Libros'),
(30, '2013-12-04', 1, 'Modificación', 'Libros'),
(31, '2013-12-04', 1, 'Modificación', 'Libros'),
(32, '2013-12-04', 1, 'Modificación', 'Libros'),
(33, '2013-12-04', 1, 'Modificación', 'Libros'),
(34, '2013-12-04', 1, 'Modificación', 'Libros'),
(35, '2013-12-04', 1, 'Modificación', 'Libros'),
(36, '2013-12-04', 1, 'Modificación', 'Libros'),
(37, '2013-12-04', 1, 'Modificación', 'Libros'),
(38, '2013-12-04', 1, 'Modificación', 'Libros'),
(39, '2013-12-04', 1, 'Modificación', 'Libros'),
(40, '2013-12-04', 1, 'Modificación', 'Libros'),
(41, '2013-12-04', 1, 'Modificación', 'Libros'),
(42, '2013-12-04', 1, 'Modificación', 'Libros'),
(43, '2013-12-04', 1, 'Modificación', 'Libros'),
(44, '2013-12-04', 1, 'Modificación', 'Libros'),
(45, '2013-12-04', 1, 'Modificación', 'Libros'),
(46, '2013-12-04', 1, 'Modificación', 'Libros'),
(47, '2013-12-04', 1, 'Modificación', 'Libros'),
(48, '2013-12-04', 1, 'Modificación', 'Libros'),
(49, '2013-12-04', 1, 'Modificación', 'Libros'),
(50, '2013-12-04', 1, 'Modificación', 'Libros'),
(51, '2013-12-04', 1, 'Modificación', 'Libros'),
(52, '2013-12-04', 1, 'Cierre de sesion', 'Usuarios'),
(53, '2013-12-04', 1, 'Inicio de sesion', 'Usuarios'),
(54, '2013-12-04', 1, 'Modificación', 'Libros'),
(55, '2013-12-04', 1, 'Inserción', 'Autores'),
(56, '2013-12-04', 1, 'Modificación', 'Libros'),
(57, '2013-12-04', 1, 'Inserción', 'Libros'),
(58, '2013-12-04', 1, 'Inserción', 'Autores'),
(59, '2013-12-04', 1, 'Inserción', 'Ejemplares'),
(60, '2013-12-04', 1, 'Modificación', 'Ejemplares'),
(61, '2013-12-04', 1, 'Inserción', 'Prestamos'),
(62, '2013-12-04', 1, 'Modificación', 'Prestamos'),
(63, '2013-12-04', 3, 'Modificación', 'Miembros'),
(64, '2013-12-04', 1, 'Modificación', 'Prestamos'),
(65, '2013-12-04', 3, 'Modificación', 'Miembros'),
(66, '2013-12-04', 1, 'Modificación', 'Prestamos'),
(67, '2013-12-04', 1, 'Respaldo', 'Base de Datos'),
(68, '2013-12-04', 1, 'Optimización', 'Base de Datos'),
(69, '2013-12-04', 1, 'Cierre de sesion', 'Usuarios'),
(70, '2013-12-04', 20, 'Inicio de sesion', 'Usuarios'),
(71, '2013-12-11', 3, 'Modificación', 'Miembros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE IF NOT EXISTS `autores` (
  `id_autor` int(11) NOT NULL AUTO_INCREMENT,
  `id_libro` int(11) NOT NULL,
  `apellidos` text NOT NULL,
  `nombres` text NOT NULL,
  `tipoautor` text NOT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id_autor`, `id_libro`, `apellidos`, `nombres`, `tipoautor`) VALUES
(24, 4, 'Bas', 'Ruten', 'Primario'),
(23, 4, 'Reyes', 'Manny', 'Primario'),
(22, 3, 'Verdum', 'Fabrizio', 'Primario'),
(21, 3, 'Coelho', 'Paulo ', 'Primario'),
(28, 2, 'JUAREZ', 'PEPE', 'Primario'),
(29, 2, 'LOPEZ', 'JOSE', 'Primario'),
(39, 7, 'PARRA', 'PAUL', 'Primario'),
(38, 48, 'ISAACSON', 'WALTER', 'Primario'),
(40, 7, 'MORA', 'MARIA', 'Primario'),
(41, 49, 'URBINA', 'YOVANNY', 'Primario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `codigo` varchar(3) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`codigo`, `descripcion`) VALUES
('000', 'Ciencia de los Computadores, Información y Obras Gen.'),
('100', 'Filosofía y Psicología'),
('200', 'Religión, Teología'),
('300', 'Ciencias Sociales'),
('400', 'Lenguas'),
('500', 'Ciencias Básicas'),
('600', 'Tecnología y Ciencias Aplicadas'),
('700', 'Artes y recreación'),
('800', 'Literatura'),
('900', 'Historia y Geografía');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_prestamos`
--

CREATE TABLE IF NOT EXISTS `det_prestamos` (
  `id_det` int(11) NOT NULL AUTO_INCREMENT,
  `id_prestamo` int(11) NOT NULL,
  `id_ejemplar` int(11) NOT NULL,
  PRIMARY KEY (`id_det`),
  KEY `id_prestamo` (`id_prestamo`,`id_ejemplar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `det_prestamos`
--

INSERT INTO `det_prestamos` (`id_det`, `id_prestamo`, `id_ejemplar`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 5),
(4, 4, 3),
(5, 4, 17),
(6, 5, 16),
(7, 6, 18),
(8, 6, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_prestamostmp`
--

CREATE TABLE IF NOT EXISTS `det_prestamostmp` (
  `id_det` int(11) NOT NULL AUTO_INCREMENT,
  `id_prestamotmp` int(11) NOT NULL,
  `id_ejemplar` int(11) NOT NULL,
  PRIMARY KEY (`id_det`),
  KEY `id_ejemplar` (`id_ejemplar`),
  KEY `id_prestamotmp` (`id_prestamotmp`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplares`
--

CREATE TABLE IF NOT EXISTS `ejemplares` (
  `id_ejemplar` int(11) NOT NULL AUTO_INCREMENT,
  `id_libro` int(11) NOT NULL,
  `cota` text NOT NULL,
  `condicion` varchar(6) NOT NULL DEFAULT 'ÓPTIMO',
  `prestamo` text NOT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'DISPONIBLE',
  `creado` date NOT NULL,
  `modificado` date NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  `creado_por` int(11) NOT NULL,
  `modificado_por` int(11) NOT NULL,
  PRIMARY KEY (`id_ejemplar`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `ejemplares`
--

INSERT INTO `ejemplares` (`id_ejemplar`, `id_libro`, `cota`, `condicion`, `prestamo`, `estado`, `creado`, `modificado`, `eliminado`, `creado_por`, `modificado_por`) VALUES
(1, 3, '1234567', 'ÓPTIMO', 'EXTERNO', 'OCUPADO', '2013-11-20', '0000-00-00', 0, 1, 1),
(2, 3, '7654321', 'ÓPTIMO', 'EXTERNO', 'OCUPADO', '2013-11-20', '0000-00-00', 0, 1, 2),
(3, 5, 'PHM-1234', 'ÓPTIMO', 'INTERNO', 'OCUPADO', '2013-11-20', '0000-00-00', 0, 0, 0),
(16, 7, 'CAM-001', 'ÓPTIMO', 'INTERNO', 'OCUPADO', '2013-11-20', '0000-00-00', 0, 0, 0),
(4, 1, 'TEL-2345', 'ÓPTIMO', 'INTERNO', 'DISPONIBLE', '2013-11-22', '0000-00-00', 0, 0, 0),
(5, 6, 'MAS-002', 'DAÑADO', 'INTERNO', 'OCUPADO', '2013-11-21', '0000-00-00', 0, 0, 0),
(17, 7, 'CAM-002', 'ÓPTIMO', 'INTERNO', 'OCUPADO', '2013-11-20', '0000-00-00', 0, 0, 0),
(18, 49, 'SOM0012', 'ÓPTIMO', 'INTERNO', 'OCUPADO', '2013-12-04', '2013-12-04', 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE IF NOT EXISTS `libros` (
  `id_libro` int(11) NOT NULL AUTO_INCREMENT,
  `cota` varchar(10) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `editorial` varchar(30) NOT NULL,
  `ciudad_edit` varchar(50) NOT NULL,
  `pais_edit` varchar(30) NOT NULL,
  `edicion` varchar(20) NOT NULL,
  `fec_edic` year(4) NOT NULL,
  `resumen` text NOT NULL,
  `num_pags` int(11) NOT NULL,
  `url` varchar(50) NOT NULL,
  `isbn` varchar(17) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `categoria` varchar(3) DEFAULT NULL,
  `pdf` varchar(255) NOT NULL,
  `epub` varchar(255) NOT NULL,
  `creado` date NOT NULL,
  `modificado` date NOT NULL,
  `creado_por` int(11) NOT NULL,
  `modificado_por` int(11) NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_libro`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `cota`, `titulo`, `editorial`, `ciudad_edit`, `pais_edit`, `edicion`, `fec_edic`, `resumen`, `num_pags`, `url`, `isbn`, `tipo`, `categoria`, `pdf`, `epub`, `creado`, `modificado`, `creado_por`, `modificado_por`, `eliminado`) VALUES
(1, 'L001.644.0', 'TELEINFORMATICA', 'McGraw', 'VALENCIA', 'VENEZUELA', '14', 2000, 'No tiene	      		      		      		      ', 14, 'no existe', '343-454-423-454-3', 'IMPRESO', '000', 'pdfs/Teleinformatica.pdf', '', '0000-00-00', '2013-12-04', 0, 1, 0),
(2, 'L005.43-AI', 'Introduccion a los Sistemas de Informacion', 'Parson', '', 'VENEZUELA', '20', 2000, 'no se', 56, 'NO SE', '978-2569-023', 'DIGITAL', '000', '', '', '0000-00-00', '0000-00-00', 0, 0, 0),
(3, 'L001.63-AI', 'Informática Basica', 'CASTELLANA', 'Caracas', 'Venezuela', '2', 2013, 'Este es el resumen\r\n\r\nSegunda linea\r\n\r\ntercera linea     		      		      		      		      		      		      		      		      		      		      		      		      		      		      		      		      		      		      		      		      		      		      		      		      ', 50, 'N/Aplica', '9784-256915', 'IMPRESO', '', '', '', '0000-00-00', '2013-12-04', 0, 1, 0),
(4, 'L001.642-A', 'Metodologia de la Programacion', 'Pearson', '', 'VENEZUELA', 'PRIMERA', 2000, 'no se', 50, 'N/A', '979-46989-565', 'IMPRESO', '000', '', '', '0000-00-00', '0000-00-00', 0, 0, 0),
(5, 'PHP-MYSQL0', 'PHP y MySQL', 'CASTELO AND', 'VAL', 'COLOMBIA', 'SEGUNDA', 2000, 'Texto de resumen	      		      		      		      		      		      		      ', 456, 'N/A', '564-567-464-756-7', 'IMPRESO', '000', 'pdfs/PHP y MySQL.pdf', '', '0000-00-00', '2013-12-04', 0, 1, 0),
(6, 'MAS-001-13', 'MAS ALLA DEL CIELO', 'MCGRAWHILL', 'BARCELONA', 'ESPAÑA', 'PRIMERA', 2013, 'ESTE ES EL RESUMEN                            ', 370, '', '3489-238928', 'DIGITAL', '000', '', '', '0000-00-00', '0000-00-00', 0, 0, 0),
(7, 'CAM-001', 'LOS INFORMATICOS', 'VALLEVERDE', 'BARCELONA', 'ESPAÑA', 'PRIMERA', 2013, 'Es de Zombies y mas      		      		      ', 456, 'No hay', '564-565-656-566-5', 'IMPRESO', '000', 'pdfs/infografia.pdf', '', '0000-00-00', '2013-12-04', 1, 1, 0),
(48, 'JOB001', 'STEVE JOBS', 'MANILA', 'SAN DIEGO', 'EEUU', 'PRIMERA', 2010, 'Texto de prueba 2	      		      		      		      		      		      		      		      		      		      		      		      		      		      		      		      ', 665, 'No hay', '787-785-778-576-9', 'IMPRESO', '000', '', 'epubs/Steve Jobs.epub', '2013-12-04', '2013-12-04', 1, 1, 0),
(49, 'SOM001', 'SOMBRAS DE GREY', 'MACGRAW', 'CARACAS', 'VENEZUELA', 'PRIMERA', 2005, '', 233, '', '343-433-334-433-4', 'IMPRESO', '', '', '', '2013-12-04', '2013-12-04', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros`
--

CREATE TABLE IF NOT EXISTS `miembros` (
  `id_miembro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `nacion` text NOT NULL,
  `cedula` text NOT NULL,
  `fec_nac` date NOT NULL,
  `telf` text NOT NULL,
  `sexo` text NOT NULL,
  `profesion` text NOT NULL,
  `ciudad` text NOT NULL,
  `email` text NOT NULL,
  `direccion` text NOT NULL,
  `creado` date NOT NULL,
  `modificado` date NOT NULL,
  `tipo` text NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'SOLVENTE',
  `dependencia` text NOT NULL,
  `obs` text NOT NULL,
  `motivo_susp` text NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  `creado_por` int(11) NOT NULL,
  `modificado_por` int(11) NOT NULL,
  `deudor` varchar(2) NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`id_miembro`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `miembros`
--

INSERT INTO `miembros` (`id_miembro`, `nombre`, `nacion`, `cedula`, `fec_nac`, `telf`, `sexo`, `profesion`, `ciudad`, `email`, `direccion`, `creado`, `modificado`, `tipo`, `estado`, `dependencia`, `obs`, `motivo_susp`, `eliminado`, `creado_por`, `modificado_por`, `deudor`) VALUES
(1, 'LUIS ALBERTO', 'VENEZOLANO', '15480328', '0000-00-00', '0424-3476158', 'M', 'ESTUDIANTE', 'CALABOZO', 'LUIS2APG@GMAIL.CO', 'CAJA DE AGUA', '2015-10-14', '0000-00-00', 'ESTUDIANTE', 'SOLVENTE', 'NINGUNA', 'NINGUNA, NO HAY', '', 0, 0, 0, 'NO'),
(2, 'GREGORY JOSE', 'VENEZOLANO', '15100664', '0000-00-00', '0424-3476158', 'M', 'TSU EN INFORMATICA', 'CALANOZO', 'luis2apg@gmail.com', 'CAJA DE AGUA', '2013-12-02', '0000-00-00', 'PROFESOR', 'MOROSO', 'ADMINISTRACION', 'NINGUNA', '', 0, 0, 0, 'SI'),
(3, 'LUIS ALBERTO', 'as', '15480325', '0000-00-00', '0424-3476158', 'M', 'caja', 'caja', 'luis@albert.com', 'baja', '2013-12-02', '0000-00-00', 'ADMINISTRATIVO', 'MOROSO', 'asa', 'asas', '', 0, 0, 0, 'SI'),
(4, 'HAYDE DOMINGA', 'venezolana', '7268892', '0000-00-00', '0424-3451222', 'M', 'est', 'CALABOZO', 'hayde@dominga.com', 'CAJA DE AGUA', '2013-12-02', '2013-12-02', 'ESTUDIANTE', 'MOROSO', 'NINGUNA', 'aa', '', 0, 1, 2, 'SI'),
(5, 'RAMON RODRIGUEZ', 'VENEZOLANO', '15480326', '0000-00-00', '0424-3476158', 'M', 'ESTUDIANTE', 'CALABOZO', 'RAMON@RODRIGUEZ.COM', 'CAJA DE GUA', '2013-12-02', '2013-12-04', 'ESTUDIANTE', 'MOROSO', 'NINGUNA', 'NINGUNA', '', 0, 2, 1, 'SI'),
(6, 'LUIS MARIA', 'VENEZOLANO', '15480330', '0000-00-00', '0424-3476185', 'M', 'NINGUNA', 'CALABOZO', 'LUIS@MARIALUIS.COM', 'CAJA DE AGUA', '2013-12-02', '2013-12-04', 'ESTUDIANTE', 'MOROSO', 'NINGUNA', 'NINGUNA', '', 0, 0, 1, 'NO'),
(7, 'FRANK ALBARRACIN', 'VENEZOLANO', '17449681', '1985-12-06', '0426-4016023', 'M', 'ESTUDIANTE', 'Caracas', 'molina.frank@gmail.com', 'Bello Monte', '2013-12-02', '0000-00-00', 'ESTUDIANTE', 'SOLVENTE', '', 'N/A', '', 0, 1, 1, 'NO'),
(8, 'CARLOS PEREZ', 'VENEZOLANO', '22323333', '1969-12-25', '0412-2343245', 'M', 'ADMINISTRADOR', 'VALENCIA', 'CARLOS@PEREZ.COM', 'CARICUAO II', '2013-12-02', '2013-12-04', 'ESTUDIANTE', 'SUSPENDIDO', '', '', '', 0, 0, 1, 'NO'),
(9, 'CARLOS MENDEZ', 'VENEZOLANO', '14234321', '1990-11-09', '0212-4566767', 'M', 'ESTUDIANTE', '', 'defiendeccs@gmail.com', 'LOS ANDES, MERIDA', '2013-12-01', '2013-12-02', 'ESTUDIANTE', 'MOROSO', '', '', '', 0, 0, 0, 'SI'),
(10, 'DANIEL PERAZA', 'VENEZOLANO', '15379257', '1981-10-16', '0424-2434276', 'M', 'informatica', 'CARACAS', 'DANIEL.PERAZA14@GMAIL.COM', 'urb. bosques de camoruco', '2013-11-28', '2013-12-04', 'PROFESOR', 'SOLVENTE', '', 'ninguna', '', 0, 0, 1, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE IF NOT EXISTS `prestamos` (
  `id_prestamo` int(11) NOT NULL AUTO_INCREMENT,
  `id_miembro` int(11) NOT NULL,
  `fec_dev` date NOT NULL,
  `estado` varchar(7) NOT NULL DEFAULT 'ABIERTO',
  `creado` date NOT NULL,
  `modificado` date NOT NULL,
  `creado_por` int(11) NOT NULL,
  `modificado_por` int(11) NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_prestamo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id_prestamo`, `id_miembro`, `fec_dev`, `estado`, `creado`, `modificado`, `creado_por`, `modificado_por`, `eliminado`) VALUES
(1, 5, '2013-12-06', 'ABIERTO', '2013-12-04', '0000-00-00', 1, 1, 0),
(2, 3, '2013-12-03', 'ABIERTO', '2013-12-04', '2013-12-04', 1, 1, 0),
(3, 6, '2013-12-03', 'CERRADO', '2013-12-01', '2013-12-04', 1, 1, 0),
(4, 4, '2013-09-01', 'ABIERTO', '2013-11-06', '2013-12-04', 1, 1, 0),
(5, 2, '2013-11-04', 'ABIERTO', '2013-12-04', '2013-12-04', 1, 1, 0),
(6, 9, '2013-12-03', 'ABIERTO', '2013-12-04', '2013-12-04', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamostmp`
--

CREATE TABLE IF NOT EXISTS `prestamostmp` (
  `id_prestamotmp` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_prestamotmp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `prestamostmp`
--

INSERT INTO `prestamostmp` (`id_prestamotmp`, `fecha`) VALUES
(1, '2013-12-04'),
(2, '2013-12-04'),
(3, '2013-12-04'),
(4, '2013-12-04'),
(5, '2013-12-04'),
(6, '2013-12-04'),
(7, '2013-12-04'),
(8, '2013-12-04'),
(9, '2013-12-04'),
(10, '2013-12-04'),
(11, '2013-12-04'),
(12, '2013-12-04'),
(13, '2013-12-04'),
(14, '2013-12-04'),
(15, '2013-12-04'),
(16, '2013-12-04'),
(17, '2013-12-04'),
(18, '2013-12-04'),
(19, '2013-12-04'),
(20, '2013-12-04'),
(21, '2013-12-04'),
(22, '2013-12-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respaldos`
--

CREATE TABLE IF NOT EXISTS `respaldos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `creado` date NOT NULL,
  `ruta` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `respaldos`
--

INSERT INTO `respaldos` (`id`, `id_usuario`, `creado`, `ruta`) VALUES
(1, 1, '2013-12-04', 'backup/db-backup-04-12-2013-08-51-49.sql');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmprep_anual`
--

CREATE TABLE IF NOT EXISTS `tmprep_anual` (
  `ene` int(11) NOT NULL,
  `feb` int(11) NOT NULL,
  `mar` int(11) NOT NULL,
  `abr` int(11) NOT NULL,
  `may` int(11) NOT NULL,
  `jun` int(11) NOT NULL,
  `jul` int(11) NOT NULL,
  `ago` int(11) NOT NULL,
  `sep` int(11) NOT NULL,
  `oct` int(11) NOT NULL,
  `nov` int(11) NOT NULL,
  `dic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tmprep_anual`
--

INSERT INTO `tmprep_anual` (`ene`, `feb`, `mar`, `abr`, `may`, `jun`, `jul`, `ago`, `sep`, `oct`, `nov`, `dic`) VALUES
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `clave` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `creado` date NOT NULL,
  `modificado` date NOT NULL,
  `ult_sesion` date NOT NULL,
  `creado_por` int(11) NOT NULL,
  `modificado_por` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  FULLTEXT KEY `clave` (`clave`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `nombre`, `clave`, `email`, `creado`, `modificado`, `ult_sesion`, `creado_por`, `modificado_por`) VALUES
(1, 'FMOLINA', 'FRANK ALBARRACIN', '2b71a2f949bca95ceac0d5028033f41172c0bb00', 'MOLINA.FRANK@GMAIL.COM', '2013-12-01', '0000-00-00', '2013-12-04', 0, 0),
(2, 'DPERAZA', 'DANIEL PERAZA', 'dbec2b7252d0642326bb871a34cf3756054bd896', 'DANIEL.PERAZA14@GMAIL.COM', '2013-12-01', '0000-00-00', '2013-12-01', 0, 0),
(5, 'PBLANCO', 'PABLO BLANCO', '8cb2237d0679ca88db6464eac60da96345513964', 'BLOPA15@GMAIL.COM', '2013-12-02', '0000-00-00', '2013-12-01', 0, 0),
(6, 'CMENESES', 'CARMELO', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'CARMELO@GMAIL.COM', '2013-11-29', '0000-00-00', '2013-12-01', 0, 0),
(13, 'ZMONSALVE', 'ZULEIMA MONSALVE', '3f5e8ccf6133bd4f821a2906777da2235c71e5b2', 'ZMONSALVE2@GMAIL.COM', '2013-11-30', '0000-00-00', '2013-12-01', 0, 0),
(3, 'ADMIN', 'ADMINISTRADOR', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'ADMIN@IUTOMS.EDU.VE', '2013-10-16', '0000-00-00', '2013-12-03', 0, 0),
(16, 'MMORA', 'MARIA MORA', 'eca4be13054c967144e0335e7dc9bdc66ce4b26b', 'MARIA@MORA.COM', '2013-12-01', '0000-00-00', '0000-00-00', 0, 0),
(20, 'DPERAZA', 'DANIEL PERAZA', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'DANIEL.PERAZA14@GMAIL.COM', '2013-12-01', '0000-00-00', '2013-12-04', 0, 0);

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `Revision de Morosos` ON SCHEDULE EVERY 1 DAY STARTS '2013-12-01 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO CALL Revision_Morosos()$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
