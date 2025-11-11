CREATE DATABASE  IF NOT EXISTS `cooperativa` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cooperativa`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: cooperativa
-- ------------------------------------------------------
-- Server version	8.1.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cajas`
--

DROP TABLE IF EXISTS `cajas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cajas` (
  `caja_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado` enum('Abierta','Cerrada') COLLATE utf8mb4_general_ci DEFAULT 'Abierta',
  `saldo_inicial` decimal(10,2) DEFAULT '0.00',
  `saldo_actual` decimal(10,2) DEFAULT '0.00',
  `fecha_apertura` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_cierre` datetime DEFAULT NULL,
  PRIMARY KEY (`caja_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cajas`
--

LOCK TABLES `cajas` WRITE;
/*!40000 ALTER TABLE `cajas` DISABLE KEYS */;
INSERT INTO `cajas` VALUES (1,'Caja Principal','Caja central de la cooperativa','Abierta',10000.00,16000.00,'2025-11-09 11:23:46',NULL),(2,'Caja Sucursal Norte','Caja auxiliar','Abierta',5000.00,11000.00,'2025-11-09 11:23:46',NULL);
/*!40000 ALTER TABLE `cajas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias_productos`
--

DROP TABLE IF EXISTS `categorias_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias_productos` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cat_nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `cat_descripcion` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias_productos`
--

LOCK TABLES `categorias_productos` WRITE;
/*!40000 ALTER TABLE `categorias_productos` DISABLE KEYS */;
INSERT INTO `categorias_productos` VALUES (1,'Especias','Productos molidos y fraccionados'),(2,'Semillas','Productos a granel'),(3,'Otros','Artículos varios');
/*!40000 ALTER TABLE `categorias_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `cli_id` int NOT NULL AUTO_INCREMENT,
  `cli_nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `cli_apellido` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `cli_email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cli_telefono` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_direccion` int DEFAULT NULL,
  `fecha_actualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cli_id`),
  KEY `id_direccion` (`id_direccion`),
  CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Lucas','Fernández','lucasf@gmail.com','3875000001',1,'2025-11-09 14:23:46'),(2,'Marta','Vega','mveg@gmail.com','3875000002',2,'2025-11-09 14:23:46'),(3,'Nicolás','Paz','npaz@gmail.com','3875000003',3,'2025-11-09 14:23:46'),(4,'Carla','Sosa','carlas@gmail.com','3875000004',4,'2025-11-09 14:23:46'),(5,'Luis','Domínguez','ldominguez@gmail.com','3875000005',5,'2025-11-09 14:23:46');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_molienda`
--

DROP TABLE IF EXISTS `detalle_molienda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_molienda` (
  `id_detalle_molienda` int NOT NULL AUTO_INCREMENT,
  `id_molienda` int NOT NULL,
  `pro_id` int DEFAULT NULL,
  `cantidad_producto` decimal(10,2) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `total_x_producto` decimal(10,2) GENERATED ALWAYS AS ((`cantidad_producto` * `precio_unitario`)) STORED,
  PRIMARY KEY (`id_detalle_molienda`),
  KEY `id_molienda` (`id_molienda`),
  KEY `pro_id` (`pro_id`),
  CONSTRAINT `detalle_molienda_ibfk_1` FOREIGN KEY (`id_molienda`) REFERENCES `moliendas` (`id_molienda`) ON DELETE CASCADE,
  CONSTRAINT `detalle_molienda_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `productos` (`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_molienda`
--

LOCK TABLES `detalle_molienda` WRITE;
/*!40000 ALTER TABLE `detalle_molienda` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_molienda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_ventas`
--

DROP TABLE IF EXISTS `detalle_ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_ventas` (
  `id_detalle_venta` int NOT NULL AUTO_INCREMENT,
  `id_ventas` int NOT NULL,
  `pro_id` int NOT NULL,
  `cantidad_producto` decimal(10,2) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `total_x_producto` decimal(10,2) GENERATED ALWAYS AS ((`cantidad_producto` * `precio_unitario`)) STORED,
  PRIMARY KEY (`id_detalle_venta`),
  KEY `id_ventas` (`id_ventas`),
  KEY `pro_id` (`pro_id`),
  CONSTRAINT `detalle_ventas_ibfk_1` FOREIGN KEY (`id_ventas`) REFERENCES `ventas` (`id_ventas`) ON DELETE CASCADE,
  CONSTRAINT `detalle_ventas_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `productos` (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_ventas`
--

LOCK TABLES `detalle_ventas` WRITE;
/*!40000 ALTER TABLE `detalle_ventas` DISABLE KEYS */;
INSERT INTO `detalle_ventas` (`id_detalle_venta`, `id_ventas`, `pro_id`, `cantidad_producto`, `precio_unitario`) VALUES (1,2,1,10.00,600.00),(2,8,1,10.00,600.00);
/*!40000 ALTER TABLE `detalle_ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direcciones`
--

DROP TABLE IF EXISTS `direcciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `direcciones` (
  `id_direccion` int NOT NULL AUTO_INCREMENT,
  `calle` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `localidad` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `cp` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `provincia` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_actualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_direccion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direcciones`
--

LOCK TABLES `direcciones` WRITE;
/*!40000 ALTER TABLE `direcciones` DISABLE KEYS */;
INSERT INTO `direcciones` VALUES (1,'San Martín 100','Salta','4400','Salta','Argentina','2025-11-09 14:23:46'),(2,'Mitre 200','Cerrillos','4403','Salta','Argentina','2025-11-09 14:23:46'),(3,'Belgrano 500','Metán','4440','Salta','Argentina','2025-11-09 14:23:46'),(4,'Sarmiento 50','Orán','4530','Salta','Argentina','2025-11-09 14:23:46'),(5,'Rivadavia 300','Tartagal','4560','Salta','Argentina','2025-11-09 14:23:46');
/*!40000 ALTER TABLE `direcciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moliendas`
--

DROP TABLE IF EXISTS `moliendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `moliendas` (
  `id_molienda` int NOT NULL AUTO_INCREMENT,
  `fecha_molienda` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `total_molienda` decimal(10,2) DEFAULT '0.00',
  `cli_id` int DEFAULT NULL,
  `usu_id` int DEFAULT NULL,
  PRIMARY KEY (`id_molienda`),
  KEY `cli_id` (`cli_id`),
  KEY `usu_id` (`usu_id`),
  CONSTRAINT `moliendas_ibfk_1` FOREIGN KEY (`cli_id`) REFERENCES `clientes` (`cli_id`),
  CONSTRAINT `moliendas_ibfk_2` FOREIGN KEY (`usu_id`) REFERENCES `usuarios` (`usu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moliendas`
--

LOCK TABLES `moliendas` WRITE;
/*!40000 ALTER TABLE `moliendas` DISABLE KEYS */;
/*!40000 ALTER TABLE `moliendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimientos_caja`
--

DROP TABLE IF EXISTS `movimientos_caja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movimientos_caja` (
  `movimiento_id` int NOT NULL AUTO_INCREMENT,
  `caja_id` int DEFAULT NULL,
  `usu_id` int DEFAULT NULL,
  `tipo_movimiento` enum('Ingreso','Egreso') COLLATE utf8mb4_general_ci NOT NULL,
  `origen` enum('Venta','Retiro','Deposito','Ajuste') COLLATE utf8mb4_general_ci NOT NULL,
  `concepto` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `monto` decimal(10,2) NOT NULL,
  `referencia` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha_movimiento` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `saldo_post` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`movimiento_id`),
  KEY `caja_id` (`caja_id`),
  KEY `usu_id` (`usu_id`),
  CONSTRAINT `movimientos_caja_ibfk_1` FOREIGN KEY (`caja_id`) REFERENCES `cajas` (`caja_id`),
  CONSTRAINT `movimientos_caja_ibfk_2` FOREIGN KEY (`usu_id`) REFERENCES `usuarios` (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimientos_caja`
--

LOCK TABLES `movimientos_caja` WRITE;
/*!40000 ALTER TABLE `movimientos_caja` DISABLE KEYS */;
INSERT INTO `movimientos_caja` VALUES (1,1,2,'Ingreso','Venta','Venta manual registrada',6000.00,'Venta-2','2025-11-11 19:30:30',NULL),(2,1,2,'Ingreso','Venta','Venta manual registrada',0.00,'Venta-3','2025-11-11 19:31:38',NULL),(3,1,2,'Ingreso','Venta','Venta manual registrada',0.00,'Venta-4','2025-11-11 19:33:29',NULL),(4,1,2,'Ingreso','Venta','Venta manual registrada',0.00,'Venta-5','2025-11-11 19:38:22',NULL),(5,1,1,'Ingreso','Venta','Venta manual registrada',0.00,'Venta-6','2025-11-11 19:38:44',NULL),(6,1,3,'Ingreso','Venta','Venta manual registrada',0.00,'Venta-7','2025-11-11 19:40:08',NULL),(7,2,2,'Ingreso','Venta','Venta manual registrada',6000.00,'Venta-8','2025-11-11 19:41:20',NULL),(8,1,1,'Ingreso','Venta','Venta manual registrada',0.00,'Venta-9','2025-11-11 19:41:55',NULL),(9,1,1,'Ingreso','Venta','Venta manual registrada',0.00,'Venta-10','2025-11-11 19:44:27',NULL),(10,2,2,'Ingreso','Venta','Venta manual registrada',0.00,'Venta-11','2025-11-11 19:44:44',NULL),(11,2,2,'Ingreso','Venta','Venta manual registrada',0.00,'Venta-12','2025-11-11 19:59:49',NULL),(12,2,2,'Ingreso','Venta','Venta manual registrada',0.00,'Venta-13','2025-11-11 20:01:07',NULL),(13,2,2,'Ingreso','Venta','Venta manual registrada',0.00,'Venta-14','2025-11-11 20:01:58',NULL),(14,2,2,'Ingreso','Venta','Venta manual registrada',0.00,'Venta-15','2025-11-11 20:03:57',NULL),(15,2,2,'Ingreso','Venta','Venta manual registrada',0.00,'Venta-16','2025-11-11 20:04:20',NULL),(16,2,2,'Ingreso','Venta','Venta manual registrada',0.00,'Venta-17','2025-11-11 20:04:42',NULL),(17,2,2,'Ingreso','Venta','Venta manual registrada',0.00,'Venta-18','2025-11-11 20:06:37',NULL),(18,2,2,'Ingreso','Venta','Venta manual registrada',0.00,'Venta-19','2025-11-11 20:08:04',NULL),(19,2,2,'Ingreso','Venta','Venta manual registrada',0.00,'Venta-20','2025-11-11 20:12:39',NULL),(20,2,2,'Ingreso','Venta','Venta manual registrada',0.00,'Venta-21','2025-11-11 20:37:37',NULL),(21,2,2,'Ingreso','Venta','Venta manual registrada',0.00,'Venta-22','2025-11-11 20:40:56',NULL),(22,2,2,'Ingreso','Venta','Venta manual registrada',0.00,'Venta-23','2025-11-11 20:41:06',NULL),(23,2,2,'Ingreso','Venta','Venta manual registrada',0.00,'Venta-24','2025-11-11 20:45:38',NULL);
/*!40000 ALTER TABLE `movimientos_caja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `pro_id` int NOT NULL AUTO_INCREMENT,
  `usu_id` int NOT NULL,
  `cat_id` int DEFAULT NULL,
  `pro_nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pro_descripcion` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pro_precio` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pro_stock` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pro_fechaElaboracion` date DEFAULT NULL,
  `pro_fechaVencimiento` date DEFAULT NULL,
  `pro_lote` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha_actualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pro_id`),
  KEY `usu_id` (`usu_id`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`usu_id`) REFERENCES `usuarios` (`usu_id`),
  CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `categorias_productos` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,1,1,'Pimiento','Pimiento molido rojo',600.00,80.00,NULL,NULL,NULL,'2025-11-09 14:23:46'),(2,2,1,'Comino','Comino molido fino',800.00,50.00,NULL,NULL,NULL,'2025-11-09 14:23:46'),(3,2,1,'Orégano','Hojas secas fraccionadas',300.00,80.00,NULL,NULL,NULL,'2025-11-09 14:23:46'),(4,1,1,'Ajonjolí','Semillas de sésamo',500.00,60.00,NULL,NULL,NULL,'2025-11-09 14:23:46'),(5,1,1,'Bolsas','Bolsas plásticas 1kg',100.00,200.00,NULL,NULL,NULL,'2025-11-09 14:23:46'),(6,3,2,'Maiz','Maiz en grano',250.00,1000.00,NULL,NULL,NULL,'2025-11-11 19:44:21');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarioroles`
--

DROP TABLE IF EXISTS `usuarioroles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarioroles` (
  `usu_rol_id` int NOT NULL AUTO_INCREMENT,
  `usu_rol_nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`usu_rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarioroles`
--

LOCK TABLES `usuarioroles` WRITE;
/*!40000 ALTER TABLE `usuarioroles` DISABLE KEYS */;
INSERT INTO `usuarioroles` VALUES (1,'Administrador'),(2,'Vendedor'),(3,'Socio');
/*!40000 ALTER TABLE `usuarioroles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `usu_id` int NOT NULL AUTO_INCREMENT,
  `usu_rol_id` int DEFAULT NULL,
  `usu_apellido` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `usu_nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `usu_dni` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `usu_telefono` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `usu_login` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `usu_password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_direccion` int DEFAULT NULL,
  `fecha_actualizacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`usu_id`),
  UNIQUE KEY `usu_login` (`usu_login`),
  KEY `usu_rol_id` (`usu_rol_id`),
  KEY `id_direccion` (`id_direccion`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`usu_rol_id`) REFERENCES `usuarioroles` (`usu_rol_id`),
  CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_direccion`) REFERENCES `direcciones` (`id_direccion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,2,'Pérez','Juan','12345678','3874000001','admin1','admin1',1,'2025-11-09 14:23:46'),(2,2,'Gómez','María','22345678','3874000002','admin2','admin2',2,'2025-11-09 14:23:46'),(3,2,'López','Carlos','32345678','3874000003','admin3','admin3',3,'2025-11-09 14:23:46'),(4,1,'Ruiz','Ana','42345678','3874000004','usu1','usu1',4,'2025-11-09 14:23:46'),(5,3,'Diaz','Sofía','52345678','3874000005','usu2','usu2',5,'2025-11-09 14:23:46');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_cajas`
--

DROP TABLE IF EXISTS `usuarios_cajas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios_cajas` (
  `usuario_caja_id` int NOT NULL AUTO_INCREMENT,
  `usu_id` int DEFAULT NULL,
  `caja_id` int DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`usuario_caja_id`),
  KEY `usu_id` (`usu_id`),
  KEY `caja_id` (`caja_id`),
  CONSTRAINT `usuarios_cajas_ibfk_1` FOREIGN KEY (`usu_id`) REFERENCES `usuarios` (`usu_id`),
  CONSTRAINT `usuarios_cajas_ibfk_2` FOREIGN KEY (`caja_id`) REFERENCES `cajas` (`caja_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_cajas`
--

LOCK TABLES `usuarios_cajas` WRITE;
/*!40000 ALTER TABLE `usuarios_cajas` DISABLE KEYS */;
INSERT INTO `usuarios_cajas` VALUES (1,1,1,1),(2,2,1,1),(3,3,2,1),(4,4,2,1),(5,5,1,1);
/*!40000 ALTER TABLE `usuarios_cajas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `id_ventas` int NOT NULL AUTO_INCREMENT,
  `fecha_venta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `total_venta` decimal(10,2) DEFAULT '0.00',
  `cli_id` int DEFAULT NULL,
  `usu_id` int DEFAULT NULL,
  `caja_id` int DEFAULT NULL,
  `cli_nombre_temp` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cli_apellido_temp` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cli_direccion_temp` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_ventas`),
  KEY `cli_id` (`cli_id`),
  KEY `usu_id` (`usu_id`),
  CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`cli_id`) REFERENCES `clientes` (`cli_id`),
  CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`usu_id`) REFERENCES `usuarios` (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (1,'2025-11-11 19:30:16',0.00,1,2,1,NULL,NULL,NULL),(2,'2025-11-11 19:30:30',6000.00,1,2,1,NULL,NULL,NULL),(3,'2025-11-11 19:31:38',0.00,2,2,1,NULL,NULL,NULL),(4,'2025-11-11 19:33:29',0.00,2,2,1,NULL,NULL,NULL),(5,'2025-11-11 19:38:22',0.00,1,2,1,NULL,NULL,NULL),(6,'2025-11-11 19:38:44',0.00,2,1,1,NULL,NULL,NULL),(7,'2025-11-11 19:40:08',0.00,2,3,1,NULL,NULL,NULL),(8,'2025-11-11 19:41:20',6000.00,3,2,2,NULL,NULL,NULL),(9,'2025-11-11 19:41:55',0.00,1,1,1,NULL,NULL,NULL),(10,'2025-11-11 19:44:27',0.00,1,1,1,NULL,NULL,NULL),(11,'2025-11-11 19:44:44',0.00,2,2,2,NULL,NULL,NULL),(12,'2025-11-11 19:59:49',0.00,2,2,2,NULL,NULL,NULL),(13,'2025-11-11 20:01:07',0.00,2,2,2,NULL,NULL,NULL),(14,'2025-11-11 20:01:58',0.00,2,2,2,NULL,NULL,NULL),(15,'2025-11-11 20:03:57',0.00,2,2,2,NULL,NULL,NULL),(16,'2025-11-11 20:04:20',0.00,2,2,2,NULL,NULL,NULL),(17,'2025-11-11 20:04:42',0.00,2,2,2,NULL,NULL,NULL),(18,'2025-11-11 20:06:37',0.00,2,2,2,NULL,NULL,NULL),(19,'2025-11-11 20:08:04',0.00,2,2,2,NULL,NULL,NULL),(20,'2025-11-11 20:12:39',0.00,2,2,2,NULL,NULL,NULL),(21,'2025-11-11 20:37:37',0.00,2,2,2,NULL,NULL,NULL),(22,'2025-11-11 20:40:56',0.00,2,2,2,NULL,NULL,NULL),(23,'2025-11-11 20:41:06',0.00,2,2,2,NULL,NULL,NULL),(24,'2025-11-11 20:45:38',0.00,2,2,2,NULL,NULL,NULL);
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-11 19:32:30
