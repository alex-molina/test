-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 14-02-2012 a las 07:26:27
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `adsis`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `ciudad`
-- 

CREATE TABLE `ciudad` (
  `id` int(5) NOT NULL auto_increment,
  `nombre` varchar(155) NOT NULL,
  `id_estado` int(5) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- 
-- Volcar la base de datos para la tabla `ciudad`
-- 

INSERT INTO `ciudad` VALUES (1, 'ciudad1', 1);
INSERT INTO `ciudad` VALUES (2, 'ciudad2', 1);
INSERT INTO `ciudad` VALUES (3, 'ciudad3', 2);
INSERT INTO `ciudad` VALUES (4, 'ciudad4', 2);
INSERT INTO `ciudad` VALUES (5, 'ciudad5', 3);
INSERT INTO `ciudad` VALUES (6, 'ciudad6', 3);
INSERT INTO `ciudad` VALUES (7, 'ciudad7', 4);
INSERT INTO `ciudad` VALUES (8, 'ciudad8', 4);
INSERT INTO `ciudad` VALUES (9, 'ciudad9', 5);
INSERT INTO `ciudad` VALUES (10, 'ciudad10', 5);
INSERT INTO `ciudad` VALUES (11, 'ciudad11', 6);
INSERT INTO `ciudad` VALUES (12, 'ciudad12', 7);
INSERT INTO `ciudad` VALUES (13, 'ciudad13', 8);
INSERT INTO `ciudad` VALUES (14, 'ciudad14', 8);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cliente`
-- 

CREATE TABLE `cliente` (
  `id` tinyint(7) NOT NULL auto_increment,
  `nombres` varchar(50) NOT NULL,
  `pais` varchar(155) NOT NULL,
  `estado` varchar(155) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `sexo` char(1) NOT NULL,
  `fecha_nacimiento` datetime NOT NULL,
  `avatar` varchar(155) NOT NULL default 'img/tux.jpg',
  `tipo_id` varchar(50) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

-- 
-- Volcar la base de datos para la tabla `cliente`
-- 

INSERT INTO `cliente` VALUES (1, 'isau', '', '', 'quezalte', 'M', '2012-02-01 00:00:00', 'img/tux.jpg', 'usuario');
INSERT INTO `cliente` VALUES (2, 'vip', '', '', 'quezalte', 'F', '1982-10-25 00:00:00', 'img/tux.jpg', 'usuario');
INSERT INTO `cliente` VALUES (5, 'gg', 'hh', 'ii', 'g', 'M', '1983-02-15 00:00:00', 'img/IMG_0330.jpg', 'cliente');
INSERT INTO `cliente` VALUES (6, 'alex', 'el salvador', 'quezalte', 'quezalte', 'M', '2012-02-01 00:00:00', 'img/header.jpg', 'cliente');
INSERT INTO `cliente` VALUES (29, 'hhh', 'pais1', 'estado1', '1', 'M', '2012-02-13 00:00:00', 'img/btnSalir.png', 'ggg');
INSERT INTO `cliente` VALUES (41, 'SAMUEL ISAAC', 'pais1', 'estado1', 'ciudad2', 'M', '1983-02-02 00:00:00', 'img/tux.jpg', 'avvv');
INSERT INTO `cliente` VALUES (43, 'bbbbbb', 'pais2', 'estado3', 'ciudad5', 'M', '2012-02-14 00:00:00', 'img/tux.jpg', 'yy');
INSERT INTO `cliente` VALUES (44, 'ed', 'pais2', 'estado4', 'ciudad7', 'M', '2012-02-14 00:00:00', 'img/kimono.jpg', 'er');
INSERT INTO `cliente` VALUES (40, 'ddd', 'pais1', 'estado1', 'ciudad1', 'F', '2012-02-13 00:00:00', 'img/icono_encender_apagar.jpg', 'ddd');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `estado`
-- 

CREATE TABLE `estado` (
  `id` int(5) NOT NULL auto_increment,
  `nombre` varchar(155) NOT NULL,
  `id_pais` int(5) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- Volcar la base de datos para la tabla `estado`
-- 

INSERT INTO `estado` VALUES (1, 'estado1', 1);
INSERT INTO `estado` VALUES (2, 'estado2', 1);
INSERT INTO `estado` VALUES (3, 'estado3', 2);
INSERT INTO `estado` VALUES (4, 'estado4', 2);
INSERT INTO `estado` VALUES (5, 'estado5', 3);
INSERT INTO `estado` VALUES (6, 'estado6', 3);
INSERT INTO `estado` VALUES (7, 'estado7', 4);
INSERT INTO `estado` VALUES (8, 'estado8', 4);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pais`
-- 

CREATE TABLE `pais` (
  `id` int(5) NOT NULL auto_increment,
  `nombre` varchar(155) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `pais`
-- 

INSERT INTO `pais` VALUES (1, 'pais1');
INSERT INTO `pais` VALUES (2, 'pais2');
INSERT INTO `pais` VALUES (3, 'pais3');
INSERT INTO `pais` VALUES (4, 'pais4');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `user`
-- 

CREATE TABLE `user` (
  `id` int(5) NOT NULL auto_increment,
  `username` varchar(16) NOT NULL,
  `passwd` char(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `user`
-- 

INSERT INTO `user` VALUES (1, 'admin', 'password', 'admin@sis.com');
INSERT INTO `user` VALUES (2, 'alex', '12345', 'alex@adsis.com');
