-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 04-12-2013 a las 06:47:24
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `sgb`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `auditoria`
-- 

CREATE TABLE `auditoria` (
  `id_log` int(11) NOT NULL auto_increment,
  `modificado` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `nombre_tabla` varchar(20) NOT NULL,
  PRIMARY KEY  (`id_log`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=113 ;

-- 
-- Volcar la base de datos para la tabla `auditoria`
-- 

INSERT INTO `auditoria` VALUES (1, '2013-12-01', 1, 'Cierre de sesion', 'Usuarios');
INSERT INTO `auditoria` VALUES (2, '2013-12-01', 1, 'Inicio de sesion', 'Usuarios');
INSERT INTO `auditoria` VALUES (3, '2013-12-01', 1, 'Cierre de sesion', 'Usuarios');
INSERT INTO `auditoria` VALUES (4, '2013-12-01', 1, 'Inicio de sesion', 'Usuarios');
INSERT INTO `auditoria` VALUES (5, '2013-12-01', 1, 'Cierre de sesion', 'Usuarios');
INSERT INTO `auditoria` VALUES (6, '2013-12-01', 1, 'Inicio de sesion', 'Usuarios');
INSERT INTO `auditoria` VALUES (7, '2013-12-01', 1, 'Inicio de sesion', 'Usuarios');
INSERT INTO `auditoria` VALUES (8, '2013-12-01', 1, 'Inicio de sesion', 'Usuarios');
INSERT INTO `auditoria` VALUES (9, '2013-12-01', 1, 'Inicio de sesion', 'Usuarios');
INSERT INTO `auditoria` VALUES (10, '2013-12-02', 0, 'Eliminación', 'Miembros');
INSERT INTO `auditoria` VALUES (11, '2013-12-02', 0, 'Eliminación', 'Miembros');
INSERT INTO `auditoria` VALUES (12, '2013-12-02', 0, 'Eliminación', 'Miembros');
INSERT INTO `auditoria` VALUES (13, '2013-12-02', 1, 'Modificación', 'Libros');
INSERT INTO `auditoria` VALUES (14, '2013-12-02', 1, 'Modificación', 'Libros');
INSERT INTO `auditoria` VALUES (15, '2013-12-02', 1, 'Modificación', 'Libros');
INSERT INTO `auditoria` VALUES (16, '2013-12-02', 1, 'Modificación', 'Libros');
INSERT INTO `auditoria` VALUES (17, '2013-12-02', 1, 'Modificación', 'Libros');
INSERT INTO `auditoria` VALUES (18, '2013-12-02', 1, 'Modificación', 'Libros');
INSERT INTO `auditoria` VALUES (19, '2013-12-02', 1, 'Modificación', 'Libros');
INSERT INTO `auditoria` VALUES (20, '2013-12-02', 1, 'Modificación', 'Libros');
INSERT INTO `auditoria` VALUES (21, '2013-12-02', 1, 'Inicio de sesion', 'Usuarios');
INSERT INTO `auditoria` VALUES (22, '2013-12-02', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (23, '2013-12-02', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (24, '2013-12-02', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (25, '2013-12-03', 1, 'Modificación', 'Prestamos');
INSERT INTO `auditoria` VALUES (26, '2013-12-03', 1, 'Modificación', 'Prestamos');
INSERT INTO `auditoria` VALUES (27, '2013-12-03', 1, 'Modificación', 'Prestamos');
INSERT INTO `auditoria` VALUES (28, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (29, '2013-12-03', 1, 'Inicio de sesion', 'Usuarios');
INSERT INTO `auditoria` VALUES (30, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (31, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (32, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (33, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (34, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (35, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (36, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (37, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (38, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (39, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (40, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (41, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (42, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (43, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (44, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (45, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (46, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (47, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (48, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (49, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (50, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (51, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (52, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (53, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (54, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (55, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (56, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (57, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (58, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (59, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (60, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (61, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (62, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (63, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (64, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (65, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (66, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (67, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (68, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (69, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (70, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (71, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (72, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (73, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (74, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (75, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (76, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (77, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (78, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (79, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (80, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (81, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (82, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (83, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (84, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (85, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (86, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (87, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (88, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (89, '2013-12-03', 0, 'Eliminación', 'Prestamos');
INSERT INTO `auditoria` VALUES (90, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (91, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (92, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (93, '2013-12-03', 0, 'Modificación', 'Prestamos');
INSERT INTO `auditoria` VALUES (94, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (95, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (96, '2013-12-03', 1, 'Modificación', 'Prestamos');
INSERT INTO `auditoria` VALUES (97, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (98, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (99, '2013-12-03', 1, 'Inserción', 'Prestamos');
INSERT INTO `auditoria` VALUES (100, '2013-12-03', 1, 'Modificacion', 'Prestamos');
INSERT INTO `auditoria` VALUES (101, '2013-12-04', 1, 'Inicio de sesion', 'Usuarios');
INSERT INTO `auditoria` VALUES (102, '2013-12-04', 1, 'Respaldo', 'Base de Datos');
INSERT INTO `auditoria` VALUES (103, '2013-12-04', 1, 'Respaldo', 'Base de Datos');
INSERT INTO `auditoria` VALUES (104, '2013-12-04', 1, 'Respaldo', 'Base de Datos');
INSERT INTO `auditoria` VALUES (105, '2013-12-04', 1, 'Respaldo', 'Base de Datos');
INSERT INTO `auditoria` VALUES (106, '2013-12-04', 1, 'Optimización', 'Base de Datos');
INSERT INTO `auditoria` VALUES (107, '2013-12-04', 1, 'Inserción', 'Libros');
INSERT INTO `auditoria` VALUES (108, '2013-12-04', 1, 'Modificación', 'Libros');
INSERT INTO `auditoria` VALUES (109, '2013-12-04', 1, 'Modificación', 'Libros');
INSERT INTO `auditoria` VALUES (110, '2013-12-04', 1, 'Modificación', 'Libros');
INSERT INTO `auditoria` VALUES (111, '2013-12-04', 1, 'Modificación', 'Libros');
INSERT INTO `auditoria` VALUES (112, '2013-12-04', 1, 'Modificación', 'Libros');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `autores`
-- 

CREATE TABLE `autores` (
  `id_autor` int(11) NOT NULL auto_increment,
  `id_libro` int(11) NOT NULL,
  `apellidos` text NOT NULL,
  `nombres` text NOT NULL,
  `tipoautor` text NOT NULL,
  PRIMARY KEY  (`id_autor`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

-- 
-- Volcar la base de datos para la tabla `autores`
-- 

INSERT INTO `autores` VALUES (24, 4, 'Bas', 'Ruten', 'Primario');
INSERT INTO `autores` VALUES (23, 4, 'Reyes', 'Manny', 'Primario');
INSERT INTO `autores` VALUES (22, 3, 'Verdum', 'Fabrizio', 'Primario');
INSERT INTO `autores` VALUES (21, 3, 'Coelho', 'Paulo ', 'Primario');
INSERT INTO `autores` VALUES (28, 2, 'JUAREZ', 'PEPE', 'Primario');
INSERT INTO `autores` VALUES (29, 2, 'LOPEZ', 'JOSE', 'Primario');
INSERT INTO `autores` VALUES (33, 7, 'RIVAS', 'MARIA', 'Primario');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `categorias`
-- 

CREATE TABLE `categorias` (
  `codigo` varchar(3) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `categorias`
-- 

INSERT INTO `categorias` VALUES ('000', 'Ciencia de los Computadores, Información y Obras Gen.');
INSERT INTO `categorias` VALUES ('100', 'Filosofía y Psicología');
INSERT INTO `categorias` VALUES ('200', 'Religión, Teología');
INSERT INTO `categorias` VALUES ('300', 'Ciencias Sociales');
INSERT INTO `categorias` VALUES ('400', 'Lenguas');
INSERT INTO `categorias` VALUES ('500', 'Ciencias Básicas');
INSERT INTO `categorias` VALUES ('600', 'Tecnología y Ciencias Aplicadas');
INSERT INTO `categorias` VALUES ('700', 'Artes y recreación');
INSERT INTO `categorias` VALUES ('800', 'Literatura');
INSERT INTO `categorias` VALUES ('900', 'Historia y Geografía');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `det_prestamos`
-- 

CREATE TABLE `det_prestamos` (
  `id_det` int(11) NOT NULL auto_increment,
  `id_prestamo` int(11) NOT NULL,
  `id_ejemplar` int(11) NOT NULL,
  PRIMARY KEY  (`id_det`),
  KEY `id_prestamo` (`id_prestamo`,`id_ejemplar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

-- 
-- Volcar la base de datos para la tabla `det_prestamos`
-- 

INSERT INTO `det_prestamos` VALUES (1, 1, 1);
INSERT INTO `det_prestamos` VALUES (2, 1, 2);
INSERT INTO `det_prestamos` VALUES (6, 2, 16);
INSERT INTO `det_prestamos` VALUES (4, 3, 5);
INSERT INTO `det_prestamos` VALUES (5, 4, 3);
INSERT INTO `det_prestamos` VALUES (7, 2, 17);
INSERT INTO `det_prestamos` VALUES (13, 6, 2);
INSERT INTO `det_prestamos` VALUES (12, 6, 1);
INSERT INTO `det_prestamos` VALUES (14, 34, 16);
INSERT INTO `det_prestamos` VALUES (15, 35, 17);
INSERT INTO `det_prestamos` VALUES (16, 36, 1);
INSERT INTO `det_prestamos` VALUES (17, 37, 1);
INSERT INTO `det_prestamos` VALUES (18, 38, 1);
INSERT INTO `det_prestamos` VALUES (19, 39, 4);
INSERT INTO `det_prestamos` VALUES (20, 40, 2);
INSERT INTO `det_prestamos` VALUES (21, 41, 16);
INSERT INTO `det_prestamos` VALUES (22, 42, 16);
INSERT INTO `det_prestamos` VALUES (23, 43, 16);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `det_prestamostmp`
-- 

CREATE TABLE `det_prestamostmp` (
  `id_det` int(11) NOT NULL auto_increment,
  `id_prestamotmp` int(11) NOT NULL,
  `id_ejemplar` int(11) NOT NULL,
  PRIMARY KEY  (`id_det`),
  KEY `id_ejemplar` (`id_ejemplar`),
  KEY `id_prestamotmp` (`id_prestamotmp`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=112 ;

-- 
-- Volcar la base de datos para la tabla `det_prestamostmp`
-- 

INSERT INTO `det_prestamostmp` VALUES (111, 205, 16);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `ejemplares`
-- 

CREATE TABLE `ejemplares` (
  `id_ejemplar` int(11) NOT NULL auto_increment,
  `id_libro` int(11) NOT NULL,
  `cota` text NOT NULL,
  `condicion` varchar(6) NOT NULL default 'ÓPTIMO',
  `prestamo` text NOT NULL,
  `estado` varchar(20) NOT NULL default 'DISPONIBLE',
  `creado` date NOT NULL,
  `modificado` date NOT NULL,
  `eliminado` tinyint(1) NOT NULL default '0',
  `creado_por` int(11) NOT NULL,
  `modificado_por` int(11) NOT NULL,
  PRIMARY KEY  (`id_ejemplar`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- 
-- Volcar la base de datos para la tabla `ejemplares`
-- 

INSERT INTO `ejemplares` VALUES (1, 3, '1234567', 'ÓPTIMO', 'EXTERNO', 'DISPONIBLE', '0000-00-00', '0000-00-00', 0, 1, 1);
INSERT INTO `ejemplares` VALUES (2, 3, '7654321', 'ÓPTIMO', 'EXTERNO', 'DISPONIBLE', '0000-00-00', '0000-00-00', 0, 1, 2);
INSERT INTO `ejemplares` VALUES (3, 5, 'PHM-1234', 'ÓPTIMO', 'INTERNO', 'OCUPADO', '0000-00-00', '0000-00-00', 0, 0, 0);
INSERT INTO `ejemplares` VALUES (16, 7, 'CAM-001', 'ÓPTIMO', 'INTERNO', 'DISPONIBLE', '0000-00-00', '0000-00-00', 0, 0, 0);
INSERT INTO `ejemplares` VALUES (4, 1, 'TEL-2345', 'ÓPTIMO', 'INTERNO', 'DISPONIBLE', '0000-00-00', '0000-00-00', 0, 0, 0);
INSERT INTO `ejemplares` VALUES (5, 6, 'MAS-002', 'DAÑADO', 'INTERNO', 'DISPONIBLE', '0000-00-00', '0000-00-00', 0, 0, 0);
INSERT INTO `ejemplares` VALUES (17, 7, 'CAM-002', 'ÓPTIMO', 'INTERNO', 'DISPONIBLE', '0000-00-00', '0000-00-00', 0, 0, 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `libros`
-- 

CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL auto_increment,
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
  `categoria` varchar(3) default NULL,
  `pdf` varchar(255) NOT NULL,
  `epub` varchar(255) NOT NULL,
  `creado` date NOT NULL,
  `modificado` date NOT NULL,
  `creado_por` int(11) NOT NULL,
  `modificado_por` int(11) NOT NULL,
  `eliminado` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id_libro`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

-- 
-- Volcar la base de datos para la tabla `libros`
-- 

INSERT INTO `libros` VALUES (1, 'L001.644.0', 'TELEINFORMATICA', 'McGraw', '', 'VENEZUELA', '14', 2000, 'NO SE', 14, 'NO SE', '978-46569-233', 'IMPRESO', '600', '', '', '0000-00-00', '0000-00-00', 0, 0, 0);
INSERT INTO `libros` VALUES (2, 'L005.43-AI', 'Introduccion a los Sistemas de Informacion', 'Parson', '', 'VENEZUELA', '20', 2000, 'no se', 56, 'NO SE', '978-2569-023', 'DIGITAL', '000', '', '', '0000-00-00', '0000-00-00', 0, 0, 0);
INSERT INTO `libros` VALUES (3, 'L001.63-AI', 'Informatica Basica', 'CASTELLANA', 'Caracas', 'Venezuela', '2', 2013, 'Este es el resumen\r\n\r\nSegunda linea\r\n\r\ntercera linea     		      		      		      		      		      		      		      		      		      		      		      		      		      		      		      		      		      		      		      		      		      		      		      ', 50, 'N/A', '9784-256915', 'IMPRESO', '000', 'DossierDefiendeCCS.pdf', '', '0000-00-00', '0000-00-00', 0, 0, 0);
INSERT INTO `libros` VALUES (4, 'L001.642-A', 'Metodologia de la Programacion', 'Pearson', '', 'VENEZUELA', 'PRIMERA', 2000, 'no se', 50, 'N/A', '979-46989-565', 'IMPRESO', '000', '', '', '0000-00-00', '0000-00-00', 0, 0, 0);
INSERT INTO `libros` VALUES (5, 'PHP-MYSQL0', 'PHP y MySQL', 'CASTELO AND', 'VAL', 'COLOMBIA', 'SEGUNDA', 2000, '		      		      		      		      ', 456, 'N/A', '564-567-464-756-7', 'IMPRESO', '500', 'pdfs/infografia.docx', '', '0000-00-00', '2013-12-02', 0, 1, 0);
INSERT INTO `libros` VALUES (6, 'MAS-001-13', 'MAS ALLA DEL CIELO', 'MCGRAWHILL', 'BARCELONA', 'ESPAÑA', 'PRIMERA', 2013, 'ESTE ES EL RESUMEN                            ', 370, '', '3489-238928', 'DIGITAL', '000', '', '', '0000-00-00', '0000-00-00', 0, 0, 0);
INSERT INTO `libros` VALUES (7, 'CAM-001', 'LOS CAMINANTES', 'VALLEVERDE', 'BARCELONA', 'ESPAÑA', 'PRIMERA', 2013, 'Es de Zombies y mas      		      ', 456, 'No hay', '564-565-656-566-5', 'IMPRESO', '000', 'pdfs/infografia.pdf', '', '0000-00-00', '2013-12-02', 1, 1, 0);
INSERT INTO `libros` VALUES (48, 'JOB001', 'STEVE JOBS', 'MANILA', 'SAN DIEGO', 'EEUU', 'PRIMERA', 2010, '		      		      		      		      		      ', 665, 'No hay', '787-785-778-576-9', 'IMPRESO', '', 'pdfs/', 'epubs/Steve Jobs.epub', '2013-12-04', '2013-12-04', 1, 1, 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `miembros`
-- 

CREATE TABLE `miembros` (
  `id_miembro` int(11) NOT NULL auto_increment,
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
  `estado` varchar(10) NOT NULL default 'SOLVENTE',
  `dependencia` text NOT NULL,
  `obs` text NOT NULL,
  `motivo_susp` text NOT NULL,
  `eliminado` tinyint(1) NOT NULL default '0',
  `creado_por` int(11) NOT NULL,
  `modificado_por` int(11) NOT NULL,
  PRIMARY KEY  (`id_miembro`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- 
-- Volcar la base de datos para la tabla `miembros`
-- 

INSERT INTO `miembros` VALUES (1, 'LUIS ALBERTO', 'VENEZOLANO', '15480328', '0000-00-00', '0424-3476158', 'M', 'ESTUDIANTE', 'CALABOZO', 'LUIS2APG@GMAIL.CO', 'CAJA DE AGUA', '2015-10-14', '0000-00-00', 'ESTUDIANTE', 'MOROSO', 'NINGUNA', 'NINGUNA, NO HAY', '', 0, 0, 0);
INSERT INTO `miembros` VALUES (2, 'GREGORY JOSE', 'VENEZOLANO', '15100664', '0000-00-00', '0424-3476158', 'M', 'TSU EN INFORMATICA', 'CALANOZO', 'luis2apg@gmail.com', 'CAJA DE AGUA', '0000-00-00', '0000-00-00', 'PROFESOR', 'MOROSO', 'ADMINISTRACION', 'NINGUNA', '', 0, 0, 0);
INSERT INTO `miembros` VALUES (3, 'LUIS ALBERTO', 'as', '15480325', '0000-00-00', '0424-3476158', 'M', 'caja', 'caja', 'luis@albert.com', 'baja', '0000-00-00', '0000-00-00', 'ADMINISTRATIVO', 'SOLVENTE', 'asa', 'asas', '', 0, 0, 0);
INSERT INTO `miembros` VALUES (4, 'HAYDE DOMINGA', 'venezolana', '7268892', '0000-00-00', '0424-3451222', 'M', 'est', 'CALABOZO', 'hayde@dominga.com', 'CAJA DE AGUA', '0000-00-00', '2013-12-02', 'ESTUDIANTE', 'SOLVENTE', 'NINGUNA', 'aa', '', 0, 1, 2);
INSERT INTO `miembros` VALUES (5, 'RAMON', 'VENENZOLANO', '15480326', '0000-00-00', '(0424) 347-61-58', 'F', 'ESTUDIANTE', 'CALABOZO', 'luis2apg@gmailcom', 'CAJA DE GUA', '0000-00-00', '0000-00-00', 'ALUMNO', 'SOLVENTE', 'NINGUNA', 'NINGUNA', '', 0, 0, 0);
INSERT INTO `miembros` VALUES (6, 'LUIS MARIA', 'VENEZOLANO', '15480330', '0000-00-00', '(0424) 347-61-58', 'M', 'NINGUNA', 'CALABOZO', 'luis2apg@gmailcom', 'CAJA DE AGUA', '0000-00-00', '0000-00-00', 'ALUMNO', 'MOROSO', 'NINGUNA', 'NINGUNA', '', 0, 0, 0);
INSERT INTO `miembros` VALUES (7, 'FRANK ALBARRACIN', 'VENEZOLANO', '17449681', '1985-12-06', '0426-4016023', 'M', 'ESTUDIANTE', 'Caracas', 'molina.frank@gmail.com', 'Bello Monte', '0000-00-00', '0000-00-00', 'ESTUDIANTE', 'SOLVENTE', '', 'N/A', '', 0, 0, 0);
INSERT INTO `miembros` VALUES (8, 'CARLOS PEREZ', 'VENEZOLANO', '22323333', '0000-00-00', '0412-2343245', 'M', 'ADMINISTRADOR', 'VALENCIA', 'CARLOS@PEREZ.COM', 'CARICUAO II', '0000-00-00', '0000-00-00', 'ESTUDIANTE', 'SUSPENDIDO', '', '', '', 0, 0, 0);
INSERT INTO `miembros` VALUES (9, 'CARLOS MENDEZ', 'VENEZOLANO', '14234321', '1990-11-09', '0212-4566767', 'M', 'ESTUDIANTE', '', 'defiendeccs@gmail.com', 'LOS ANDES, MERIDA', '0000-00-00', '2013-12-02', 'ESTUDIANTE', 'MOROSO', '', '', '', 0, 0, 0);
INSERT INTO `miembros` VALUES (10, 'daniel antonio peraza', 'VENEZOLANO', '15379257', '0000-00-00', '0424-2434276', 'M', 'informatica', 'CARACAS', 'daniel.peraza14@gmail.com', 'urb. bosques de camoruco', '0000-00-00', '0000-00-00', 'PROFESOR', 'SOLVENTE', '', 'ninguna', '', 0, 0, 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `prestamos`
-- 

CREATE TABLE `prestamos` (
  `id_prestamo` int(11) NOT NULL auto_increment,
  `id_miembro` int(11) NOT NULL,
  `fec_dev` date NOT NULL,
  `estado` varchar(7) NOT NULL default 'ABIERTO',
  `creado` date NOT NULL,
  `modificado` date NOT NULL,
  `creado_por` int(11) NOT NULL,
  `modificado_por` int(11) NOT NULL,
  `eliminado` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id_prestamo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

-- 
-- Volcar la base de datos para la tabla `prestamos`
-- 

INSERT INTO `prestamos` VALUES (1, 1, '2013-12-01', 'CERRADO', '2013-11-30', '0000-00-00', 1, 2, 0);
INSERT INTO `prestamos` VALUES (2, 2, '2013-12-01', 'CERRADO', '2013-10-01', '2013-12-02', 2, 1, 0);
INSERT INTO `prestamos` VALUES (3, 6, '2013-11-30', 'CERRADO', '2013-10-01', '2013-12-02', 0, 1, 0);
INSERT INTO `prestamos` VALUES (4, 7, '2013-12-28', 'CERRADO', '2013-12-01', '0000-00-00', 0, 0, 0);
INSERT INTO `prestamos` VALUES (5, 5, '2013-12-05', 'ABIERTO', '2013-12-02', '2013-12-02', 1, 0, 1);
INSERT INTO `prestamos` VALUES (6, 5, '2013-12-05', 'CERRADO', '2013-12-02', '2013-12-03', 1, 1, 0);
INSERT INTO `prestamos` VALUES (7, 4, '2013-12-25', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (8, 10, '2013-12-19', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (9, 4, '2013-12-04', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (10, 4, '2013-12-04', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (11, 4, '2013-12-05', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (12, 4, '2013-12-04', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (13, 4, '2013-12-04', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (14, 10, '2013-12-05', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (15, 10, '2013-12-06', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (16, 4, '2013-12-05', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (17, 4, '2013-12-19', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (18, 10, '2013-12-05', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (19, 4, '2013-12-05', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (20, 4, '2013-12-05', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (21, 4, '2013-12-03', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (22, 10, '2013-12-06', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (23, 10, '2013-12-05', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (24, 4, '2013-12-04', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (25, 4, '2013-12-04', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (26, 10, '2013-12-05', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (27, 4, '2013-12-04', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (28, 10, '2013-12-05', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (29, 4, '2013-12-06', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (30, 4, '2013-12-05', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (31, 10, '2013-12-05', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (32, 10, '2013-12-06', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (33, 4, '2013-12-05', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (34, 10, '2013-12-06', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (35, 10, '2013-12-04', 'ABIERTO', '2013-12-03', '2013-12-03', 1, 0, 1);
INSERT INTO `prestamos` VALUES (36, 4, '2013-12-05', 'CERRADO', '2013-12-03', '0000-00-00', 1, 1, 0);
INSERT INTO `prestamos` VALUES (37, 10, '2013-12-06', 'CERRADO', '2013-12-03', '0000-00-00', 1, 1, 0);
INSERT INTO `prestamos` VALUES (38, 4, '2013-12-05', 'CERRADO', '2013-12-03', '0000-00-00', 1, 1, 0);
INSERT INTO `prestamos` VALUES (39, 5, '2013-12-06', 'CERRADO', '2013-12-03', '0000-00-00', 1, 1, 0);
INSERT INTO `prestamos` VALUES (40, 5, '2013-12-05', 'CERRADO', '2013-12-03', '2013-12-03', 1, 1, 0);
INSERT INTO `prestamos` VALUES (41, 10, '2013-12-09', 'CERRADO', '2013-12-03', '0000-00-00', 1, 1, 0);
INSERT INTO `prestamos` VALUES (42, 3, '2013-12-12', 'CERRADO', '2013-12-03', '0000-00-00', 1, 1, 0);
INSERT INTO `prestamos` VALUES (43, 5, '2013-12-06', 'CERRADO', '2013-12-03', '0000-00-00', 1, 1, 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `prestamostmp`
-- 

CREATE TABLE `prestamostmp` (
  `id_prestamotmp` int(11) NOT NULL auto_increment,
  `fecha` date NOT NULL,
  PRIMARY KEY  (`id_prestamotmp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=206 ;

-- 
-- Volcar la base de datos para la tabla `prestamostmp`
-- 

INSERT INTO `prestamostmp` VALUES (1, '2013-11-30');
INSERT INTO `prestamostmp` VALUES (2, '2013-11-30');
INSERT INTO `prestamostmp` VALUES (3, '2013-11-30');
INSERT INTO `prestamostmp` VALUES (4, '2013-11-30');
INSERT INTO `prestamostmp` VALUES (5, '2013-11-30');
INSERT INTO `prestamostmp` VALUES (6, '2013-11-30');
INSERT INTO `prestamostmp` VALUES (7, '2013-11-30');
INSERT INTO `prestamostmp` VALUES (8, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (9, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (10, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (11, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (12, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (13, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (14, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (15, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (16, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (17, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (18, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (19, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (20, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (21, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (22, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (23, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (24, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (25, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (26, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (27, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (28, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (29, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (30, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (31, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (32, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (33, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (34, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (35, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (36, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (37, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (38, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (39, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (40, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (41, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (42, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (43, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (44, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (45, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (46, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (47, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (48, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (49, '2013-12-01');
INSERT INTO `prestamostmp` VALUES (50, '2013-12-02');
INSERT INTO `prestamostmp` VALUES (51, '2013-12-02');
INSERT INTO `prestamostmp` VALUES (52, '2013-12-02');
INSERT INTO `prestamostmp` VALUES (53, '2013-12-02');
INSERT INTO `prestamostmp` VALUES (54, '2013-12-02');
INSERT INTO `prestamostmp` VALUES (55, '2013-12-02');
INSERT INTO `prestamostmp` VALUES (56, '2013-12-02');
INSERT INTO `prestamostmp` VALUES (57, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (58, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (59, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (60, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (61, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (62, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (63, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (64, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (65, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (66, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (67, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (68, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (69, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (70, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (71, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (72, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (73, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (74, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (75, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (76, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (77, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (78, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (79, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (80, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (81, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (82, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (83, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (84, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (85, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (86, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (87, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (88, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (89, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (90, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (91, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (92, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (93, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (94, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (95, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (96, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (97, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (98, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (99, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (100, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (101, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (102, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (103, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (104, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (105, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (106, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (107, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (108, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (109, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (110, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (111, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (112, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (113, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (114, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (115, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (116, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (117, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (118, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (119, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (120, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (121, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (122, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (123, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (124, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (125, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (126, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (127, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (128, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (129, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (130, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (131, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (132, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (133, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (134, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (135, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (136, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (137, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (138, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (139, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (140, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (141, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (142, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (143, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (144, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (145, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (146, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (147, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (148, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (149, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (150, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (151, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (152, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (153, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (154, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (155, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (156, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (157, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (158, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (159, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (160, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (161, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (162, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (163, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (164, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (165, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (166, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (167, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (168, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (169, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (170, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (171, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (172, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (173, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (174, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (175, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (176, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (177, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (178, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (179, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (180, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (181, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (182, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (183, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (184, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (185, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (186, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (187, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (188, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (189, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (190, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (191, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (192, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (193, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (194, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (195, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (196, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (197, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (198, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (199, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (200, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (201, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (202, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (203, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (204, '2013-12-03');
INSERT INTO `prestamostmp` VALUES (205, '2013-12-03');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `respaldos`
-- 

CREATE TABLE `respaldos` (
  `id` int(11) NOT NULL auto_increment,
  `id_usuario` int(11) NOT NULL,
  `creado` date NOT NULL,
  `ruta` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- 
-- Volcar la base de datos para la tabla `respaldos`
-- 

INSERT INTO `respaldos` VALUES (1, 1, '2013-12-02', 'backup/db-backup-02-12-2013-05-24-14.sql');
INSERT INTO `respaldos` VALUES (2, 1, '2013-12-02', 'backup/db-backup-02-12-2013-05-35-06.sql');
INSERT INTO `respaldos` VALUES (3, 1, '2013-12-02', 'backup/db-backup-02-12-2013-06-38-52.sql');
INSERT INTO `respaldos` VALUES (4, 1, '2013-12-02', 'backup/db-backup-02-12-2013-07-03-52.sql');
INSERT INTO `respaldos` VALUES (5, 1, '2013-12-02', 'backup/db-backup-02-12-2013-07-07-57.sql');
INSERT INTO `respaldos` VALUES (6, 1, '2013-12-04', 'backup/db-backup-04-12-2013-05-19-53.sql');
INSERT INTO `respaldos` VALUES (7, 1, '2013-12-04', 'backup/db-backup-04-12-2013-05-21-15.sql');
INSERT INTO `respaldos` VALUES (8, 1, '2013-12-04', 'backup/db-backup-04-12-2013-05-27-45.sql');
INSERT INTO `respaldos` VALUES (9, 1, '2013-12-04', 'backup/db-backup-04-12-2013-05-28-03.sql');
INSERT INTO `respaldos` VALUES (10, 1, '2013-12-04', 'backup/db-backup-04-12-2013-05-31-19.sql');
INSERT INTO `respaldos` VALUES (11, 1, '2013-12-04', 'backup/db-backup-04-12-2013-05-31-26.sql');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tmprep_anual`
-- 

CREATE TABLE `tmprep_anual` (
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
-- Volcar la base de datos para la tabla `tmprep_anual`
-- 

INSERT INTO `tmprep_anual` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `tmprep_anual` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0);
INSERT INTO `tmprep_anual` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0);
INSERT INTO `tmprep_anual` VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 33);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios`
-- 

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL auto_increment,
  `usuario` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `clave` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `creado` date NOT NULL,
  `modificado` date NOT NULL,
  `ult_sesion` date NOT NULL,
  `creado_por` int(11) NOT NULL,
  `modificado_por` int(11) NOT NULL,
  PRIMARY KEY  (`id_usuario`),
  FULLTEXT KEY `clave` (`clave`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

-- 
-- Volcar la base de datos para la tabla `usuarios`
-- 

INSERT INTO `usuarios` VALUES (1, 'FMOLINA', 'FRANK ALBARRACIN', 'fba9513c7719bf1f2ec1b0fefbd7440858ce08a5', 'MOLINA.FRANK@GMAIL.COM', '0000-00-00', '0000-00-00', '2013-12-04', 0, 0);
INSERT INTO `usuarios` VALUES (2, 'DPERAZA', 'DANIEL PERAZA', 'dbec2b7252d0642326bb871a34cf3756054bd896', 'DANIEL.PERAZA14@GMAIL.COM', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0);
INSERT INTO `usuarios` VALUES (5, 'PBLANCO', 'PABLO BLANCO', '8cb2237d0679ca88db6464eac60da96345513964', 'BLOPA15@GMAIL.COM', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0);
INSERT INTO `usuarios` VALUES (6, 'CMENESES', 'CARMELO', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'CARMELO@GMAIL.COM', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0);
INSERT INTO `usuarios` VALUES (13, 'ZMONSALVE', 'ZULEIMA MONSALVE', '3f5e8ccf6133bd4f821a2906777da2235c71e5b2', 'ZMONSALVE2@GMAIL.COM', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0);
INSERT INTO `usuarios` VALUES (3, 'ADMIN', 'ADMINISTRADOR', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'ADMIN@IUTOMS.EDU.VE', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0);
INSERT INTO `usuarios` VALUES (16, 'MMORA', 'MARIA MORA', 'eca4be13054c967144e0335e7dc9bdc66ce4b26b', 'MARIA@MORA.COM', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0);
