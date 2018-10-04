-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.31-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para libreria_arkix
DROP DATABASE IF EXISTS `libreria_arkix`;
CREATE DATABASE IF NOT EXISTS `libreria_arkix` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `libreria_arkix`;

-- Volcando estructura para tabla libreria_arkix.autores
DROP TABLE IF EXISTS `autores`;
CREATE TABLE IF NOT EXISTS `autores` (
  `id_autor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `anio_nacimiento` date DEFAULT NULL,
  `anio_fallecido` date DEFAULT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla libreria_arkix.clientes
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion_envio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla libreria_arkix.libros
DROP TABLE IF EXISTS `libros`;
CREATE TABLE IF NOT EXISTS `libros` (
  `id_libro` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `editor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `edicion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `costo` double NOT NULL,
  `precio_sugerido` double NOT NULL,
  `valoracion` enum('Extraordinario','Excelente','Bueno','Dañado') COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_valoracion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` enum('Inventario','Vendido') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Inventario',
  PRIMARY KEY (`id_libro`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla libreria_arkix.libro_autor
DROP TABLE IF EXISTS `libro_autor`;
CREATE TABLE IF NOT EXISTS `libro_autor` (
  `id_lib_aut` int(11) NOT NULL AUTO_INCREMENT,
  `libro_id` int(11) NOT NULL DEFAULT '0',
  `autor_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_lib_aut`),
  KEY `FK_autor` (`autor_id`),
  KEY `FK_libro` (`libro_id`),
  CONSTRAINT `FK_autor` FOREIGN KEY (`autor_id`) REFERENCES `autores` (`id_autor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_libro` FOREIGN KEY (`libro_id`) REFERENCES `libros` (`id_libro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla libreria_arkix.ventas
DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `libro_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `valor` double NOT NULL,
  `vendedor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `FK_clienteventa` (`cliente_id`),
  KEY `FK_libroventa` (`libro_id`),
  CONSTRAINT `FK_clienteventa` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_libroventa` FOREIGN KEY (`libro_id`) REFERENCES `libros` (`id_libro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
