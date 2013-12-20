-- phpMyAdmin SQL Dump
-- version 4.0.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-12-2013 a las 09:37:26
-- Versión del servidor: 5.6.14-log
-- Versión de PHP: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `phpmyadmin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma_bookmark`
--

CREATE TABLE IF NOT EXISTS `pma_bookmark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma_column_info`
--

CREATE TABLE IF NOT EXISTS `pma_column_info` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin' AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `pma_column_info`
--

INSERT INTO `pma_column_info` (`id`, `db_name`, `table_name`, `column_name`, `comment`, `mimetype`, `transformation`, `transformation_options`) VALUES
(21, 'sgb', 'miembros', 'deudor', '', '', '_', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma_designer_coords`
--

CREATE TABLE IF NOT EXISTS `pma_designer_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `v` tinyint(4) DEFAULT NULL,
  `h` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for Designer';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma_history`
--

CREATE TABLE IF NOT EXISTS `pma_history` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`db`,`table`,`timevalue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma_pdf_pages`
--

CREATE TABLE IF NOT EXISTS `pma_pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`page_nr`),
  KEY `db_name` (`db_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma_relation`
--

CREATE TABLE IF NOT EXISTS `pma_relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  KEY `foreign_field` (`foreign_db`,`foreign_table`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma_table_coords`
--

CREATE TABLE IF NOT EXISTS `pma_table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float unsigned NOT NULL DEFAULT '0',
  `y` float unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma_table_info`
--

CREATE TABLE IF NOT EXISTS `pma_table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`db_name`,`table_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma_tracking`
--

CREATE TABLE IF NOT EXISTS `pma_tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) unsigned NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`db_name`,`table_name`,`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `pma_tracking`
--

INSERT INTO `pma_tracking` (`db_name`, `table_name`, `version`, `date_created`, `date_updated`, `schema_snapshot`, `schema_sql`, `data_sql`, `tracking`, `tracking_active`) VALUES
('sgb', 'tmprep_anual', 1, '2013-12-02 11:48:45', '2013-12-04 11:38:27', 'a:2:{s:7:"COLUMNS";a:12:{i:0;a:8:{s:5:"Field";s:3:"ene";s:4:"Type";s:7:"int(11)";s:9:"Collation";N;s:4:"Null";s:2:"NO";s:3:"Key";s:0:"";s:7:"Default";N;s:5:"Extra";s:0:"";s:7:"Comment";s:0:"";}i:1;a:8:{s:5:"Field";s:3:"feb";s:4:"Type";s:7:"int(11)";s:9:"Collation";N;s:4:"Null";s:2:"NO";s:3:"Key";s:0:"";s:7:"Default";N;s:5:"Extra";s:0:"";s:7:"Comment";s:0:"";}i:2;a:8:{s:5:"Field";s:3:"mar";s:4:"Type";s:7:"int(11)";s:9:"Collation";N;s:4:"Null";s:2:"NO";s:3:"Key";s:0:"";s:7:"Default";N;s:5:"Extra";s:0:"";s:7:"Comment";s:0:"";}i:3;a:8:{s:5:"Field";s:3:"abr";s:4:"Type";s:7:"int(11)";s:9:"Collation";N;s:4:"Null";s:2:"NO";s:3:"Key";s:0:"";s:7:"Default";N;s:5:"Extra";s:0:"";s:7:"Comment";s:0:"";}i:4;a:8:{s:5:"Field";s:3:"may";s:4:"Type";s:7:"int(11)";s:9:"Collation";N;s:4:"Null";s:2:"NO";s:3:"Key";s:0:"";s:7:"Default";N;s:5:"Extra";s:0:"";s:7:"Comment";s:0:"";}i:5;a:8:{s:5:"Field";s:3:"jun";s:4:"Type";s:7:"int(11)";s:9:"Collation";N;s:4:"Null";s:2:"NO";s:3:"Key";s:0:"";s:7:"Default";N;s:5:"Extra";s:0:"";s:7:"Comment";s:0:"";}i:6;a:8:{s:5:"Field";s:3:"jul";s:4:"Type";s:7:"int(11)";s:9:"Collation";N;s:4:"Null";s:2:"NO";s:3:"Key";s:0:"";s:7:"Default";N;s:5:"Extra";s:0:"";s:7:"Comment";s:0:"";}i:7;a:8:{s:5:"Field";s:3:"ago";s:4:"Type";s:7:"int(11)";s:9:"Collation";N;s:4:"Null";s:2:"NO";s:3:"Key";s:0:"";s:7:"Default";N;s:5:"Extra";s:0:"";s:7:"Comment";s:0:"";}i:8;a:8:{s:5:"Field";s:3:"sep";s:4:"Type";s:7:"int(11)";s:9:"Collation";N;s:4:"Null";s:2:"NO";s:3:"Key";s:0:"";s:7:"Default";N;s:5:"Extra";s:0:"";s:7:"Comment";s:0:"";}i:9;a:8:{s:5:"Field";s:3:"oct";s:4:"Type";s:7:"int(11)";s:9:"Collation";N;s:4:"Null";s:2:"NO";s:3:"Key";s:0:"";s:7:"Default";N;s:5:"Extra";s:0:"";s:7:"Comment";s:0:"";}i:10;a:8:{s:5:"Field";s:3:"nov";s:4:"Type";s:7:"int(11)";s:9:"Collation";N;s:4:"Null";s:2:"NO";s:3:"Key";s:0:"";s:7:"Default";N;s:5:"Extra";s:0:"";s:7:"Comment";s:0:"";}i:11;a:8:{s:5:"Field";s:3:"dic";s:4:"Type";s:7:"int(11)";s:9:"Collation";N;s:4:"Null";s:2:"NO";s:3:"Key";s:0:"";s:7:"Default";N;s:5:"Extra";s:0:"";s:7:"Comment";s:0:"";}}s:7:"INDEXES";a:0:{}}', '# log 2013-12-02 11:48:45 root\nDROP TABLE IF EXISTS `tmprep_anual`;\n# log 2013-12-02 11:48:45 root\n\nCREATE TABLE `tmprep_anual` (\n  `ene` int(11) NOT NULL,\n  `feb` int(11) NOT NULL,\n  `mar` int(11) NOT NULL,\n  `abr` int(11) NOT NULL,\n  `may` int(11) NOT NULL,\n  `jun` int(11) NOT NULL,\n  `jul` int(11) NOT NULL,\n  `ago` int(11) NOT NULL,\n  `sep` int(11) NOT NULL,\n  `oct` int(11) NOT NULL,\n  `nov` int(11) NOT NULL,\n  `dic` int(11) NOT NULL\n) ENGINE=InnoDB DEFAULT CHARSET=latin1;\n', '\n\n# log 2013-12-02 11:51:26 root\nDELETE FROM tmprep_anual;\n\n# log 2013-12-02 11:52:41 root\nDELETE FROM tmprep_anual;\n\n# log 2013-12-02 12:04:56 root\nDELETE FROM tmprep_anual;\n\n# log 2013-12-02 12:05:14 root\nDELETE FROM tmprep_anual;\n\n# log 2013-12-02 12:06:54 root\nDELETE FROM tmprep_anual;\n\n# log 2013-12-04 11:38:27 root\nTRUNCATE `tmprep_anual`;\n', 'UPDATE,REPLACE,INSERT,DELETE,TRUNCATE,CREATE DATABASE,ALTER DATABASE,DROP DATABASE,CREATE TABLE,ALTER TABLE,RENAME TABLE,DROP TABLE,CREATE INDEX,DROP INDEX,CREATE VIEW,ALTER VIEW,DROP VIEW', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma_userconfig`
--

CREATE TABLE IF NOT EXISTS `pma_userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Volcado de datos para la tabla `pma_userconfig`
--

INSERT INTO `pma_userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2013-11-25 04:01:43', '{"lang":"es"}');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
