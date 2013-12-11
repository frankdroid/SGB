-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 02-12-2013 a las 07:34:20
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `phpmyadmin`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pma_designer_coords`
-- 

USE phpmyadmin;

CREATE TABLE `pma_designer_coords` (
  `db_name` varchar(64) collate utf8_bin NOT NULL default '',
  `table_name` varchar(64) collate utf8_bin NOT NULL default '',
  `x` int(11) default NULL,
  `y` int(11) default NULL,
  `v` tinyint(4) default NULL,
  `h` tinyint(4) default NULL,
  PRIMARY KEY  (`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for Designer';

-- 
-- Volcar la base de datos para la tabla `pma_designer_coords`
-- 

INSERT INTO `pma_designer_coords` VALUES (0x736762, 0x6175746269626c696f6772616669636f73, 394, 519, 1, 1);
INSERT INTO `pma_designer_coords` VALUES (0x736762, 0x6175746f7265736c6962726f, 635, 414, 1, 1);
INSERT INTO `pma_designer_coords` VALUES (0x736762, 0x6269626c696f6772616669636f73, 34, 517, 1, 1);
INSERT INTO `pma_designer_coords` VALUES (0x736762, 0x656a656d706c61726573, 417, 75, 1, 1);
INSERT INTO `pma_designer_coords` VALUES (0x736762, 0x6c6962726f73, 203, 48, 1, 1);
INSERT INTO `pma_designer_coords` VALUES (0x736762, 0x706f6c697469636173707265, 636, 623, 1, 1);
INSERT INTO `pma_designer_coords` VALUES (0x736762, 0x7072657374616d6f, 512, 37, 1, 1);
INSERT INTO `pma_designer_coords` VALUES (0x736762, 0x736f6c69636974616e746573, 719, 60, 1, 1);
INSERT INTO `pma_designer_coords` VALUES (0x736762, 0x73757370656e73696f6e, 549, 322, 1, 1);
INSERT INTO `pma_designer_coords` VALUES (0x736762, 0x75736572, 30, 41, 1, 1);
INSERT INTO `pma_designer_coords` VALUES (0x736762, 0x7573756172696f73, 395, 354, 1, 1);
INSERT INTO `pma_designer_coords` VALUES (0x736762, 0x61756469746f726961, 604, 476, 1, 1);
INSERT INTO `pma_designer_coords` VALUES (0x736762, 0x6175746f726573, 49, 204, 1, 1);
INSERT INTO `pma_designer_coords` VALUES (0x736762, 0x646574616c6c655f617564, 430, 396, 1, 1);
INSERT INTO `pma_designer_coords` VALUES (0x736762, 0x7072657374616d6f73, 779, 62, 1, 1);
INSERT INTO `pma_designer_coords` VALUES (0x736762, 0x63617465676f72696173, 20, 64, 1, 1);
INSERT INTO `pma_designer_coords` VALUES (0x736762, 0x6465745f7072657374616d6f73, 607, 222, 1, 1);
INSERT INTO `pma_designer_coords` VALUES (0x736762, 0x6465745f7072657374616d6f73746d70, 607, 307, 1, 1);
INSERT INTO `pma_designer_coords` VALUES (0x736762, 0x6d69656d62726f73, 974, 108, 1, 1);
INSERT INTO `pma_designer_coords` VALUES (0x736762, 0x7072657374616d6f73746d70, 783, 262, 1, 1);
