CREATE DATABASE  IF NOT EXISTS `dbkermesse` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dbkermesse`;
-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: dbkermesse
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `rol_opciones`
--

DROP TABLE IF EXISTS `rol_opciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol_opciones` (
  `id_rol_opciones` int NOT NULL AUTO_INCREMENT,
  `id_rol` int NOT NULL,
  `id_opciones` int NOT NULL,
  PRIMARY KEY (`id_rol_opciones`),
  KEY `fk_rol_opciones_tbl_rol_idx` (`id_rol`),
  KEY `fk_rol_opciones_tbl_opciones1_idx` (`id_opciones`),
  CONSTRAINT `fk_rol_opciones_tbl_opciones1` FOREIGN KEY (`id_opciones`) REFERENCES `tbl_opciones` (`id_opciones`),
  CONSTRAINT `fk_rol_opciones_tbl_rol` FOREIGN KEY (`id_rol`) REFERENCES `tbl_rol` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol_opciones`
--

LOCK TABLES `rol_opciones` WRITE;
/*!40000 ALTER TABLE `rol_opciones` DISABLE KEYS */;
INSERT INTO `rol_opciones` VALUES (1,1,1),(2,1,2),(3,1,3);
/*!40000 ALTER TABLE `rol_opciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol_usuario`
--

DROP TABLE IF EXISTS `rol_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol_usuario` (
  `id_rol_usuario` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `id_rol` int NOT NULL,
  PRIMARY KEY (`id_rol_usuario`),
  KEY `fk_rol_usuario_tbl_usuario1_idx` (`id_usuario`),
  KEY `fk_rol_usuario_tbl_rol1_idx` (`id_rol`),
  CONSTRAINT `fk_rol_usuario_tbl_rol1` FOREIGN KEY (`id_rol`) REFERENCES `tbl_rol` (`id_rol`),
  CONSTRAINT `fk_rol_usuario_tbl_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol_usuario`
--

LOCK TABLES `rol_usuario` WRITE;
/*!40000 ALTER TABLE `rol_usuario` DISABLE KEYS */;
INSERT INTO `rol_usuario` VALUES (1,1,1);
/*!40000 ALTER TABLE `rol_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasacambio_det`
--

DROP TABLE IF EXISTS `tasacambio_det`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tasacambio_det` (
  `id_tasaCambio_det` int NOT NULL AUTO_INCREMENT,
  `id_tasaCambio` int NOT NULL,
  `fecha` date NOT NULL,
  `tipoCambio` decimal(18,4) NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_tasaCambio_det`),
  KEY `fk_tasaCambio_det_1_idx` (`id_tasaCambio`),
  CONSTRAINT `fk_tasaCambio_det_1` FOREIGN KEY (`id_tasaCambio`) REFERENCES `tbl_tasacambio` (`id_tasaCambio`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasacambio_det`
--

LOCK TABLES `tasacambio_det` WRITE;
/*!40000 ALTER TABLE `tasacambio_det` DISABLE KEYS */;
INSERT INTO `tasacambio_det` VALUES (1,1,'2020-11-01',34.6847,1),(2,1,'2020-11-10',34.7099,1),(3,1,'2020-11-22',34.7436,1),(4,1,'2020-11-30',34.7661,1),(5,2,'2020-11-14',35.0658,1),(6,2,'2020-11-28',35.2566,1),(7,3,'2020-11-18',38.9398,1),(8,3,'2020-11-30',39.0025,1),(9,4,'2020-11-01',42.5892,1),(10,4,'2020-11-14',42.7592,1);
/*!40000 ALTER TABLE `tasacambio_det` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_arqueocaja`
--

DROP TABLE IF EXISTS `tbl_arqueocaja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_arqueocaja` (
  `id_ArqueoCaja` int NOT NULL AUTO_INCREMENT,
  `idKermesse` int NOT NULL,
  `fechaArqueo` date NOT NULL,
  `granTotal` decimal(18,2) DEFAULT NULL,
  `usuario_creacion` int NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `usuario_eliminacion` int DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_ArqueoCaja`),
  UNIQUE KEY `id_ArqueoCaja_UNIQUE` (`id_ArqueoCaja`),
  KEY `fk_tbl_ArqueoCaja_1_idx` (`idKermesse`),
  KEY `fk_tbl_ArqueoCaja_2_idx` (`usuario_creacion`),
  KEY `fk_tbl_ArqueoCaja_3_idx` (`usuario_modificacion`),
  KEY `fk_tbl_ArqueoCaja_4_idx` (`usuario_eliminacion`),
  CONSTRAINT `fk_tbl_ArqueoCaja_1` FOREIGN KEY (`idKermesse`) REFERENCES `tbl_kermesse` (`id_kermesse`),
  CONSTRAINT `fk_tbl_ArqueoCaja_2` FOREIGN KEY (`usuario_creacion`) REFERENCES `tbl_usuario` (`id_usuario`),
  CONSTRAINT `fk_tbl_ArqueoCaja_3` FOREIGN KEY (`usuario_modificacion`) REFERENCES `tbl_usuario` (`id_usuario`),
  CONSTRAINT `fk_tbl_ArqueoCaja_4` FOREIGN KEY (`usuario_eliminacion`) REFERENCES `tbl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_arqueocaja`
--

LOCK TABLES `tbl_arqueocaja` WRITE;
/*!40000 ALTER TABLE `tbl_arqueocaja` DISABLE KEYS */;
INSERT INTO `tbl_arqueocaja` VALUES (1,1,'2020-11-23',45808.50,1,'2020-11-22 00:00:00',NULL,NULL,NULL,NULL,1),(2,4,'2020-11-30',24120.00,1,'2020-11-29 00:00:00',NULL,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `tbl_arqueocaja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_arqueocaja_det`
--

DROP TABLE IF EXISTS `tbl_arqueocaja_det`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_arqueocaja_det` (
  `idArqueoCaja_Det` int NOT NULL AUTO_INCREMENT,
  `idArqueoCaja` int NOT NULL,
  `idMoneda` int NOT NULL,
  `idDenominacion` int NOT NULL,
  `cantidad` decimal(18,2) NOT NULL,
  `subtotal` decimal(18,2) NOT NULL,
  PRIMARY KEY (`idArqueoCaja_Det`),
  UNIQUE KEY `idArqueoCaja_Det_UNIQUE` (`idArqueoCaja_Det`),
  KEY `fk_tbl_ArqueoCaja_Det_1_idx` (`idMoneda`),
  KEY `fk_tbl_ArqueoCaja_Det_2_idx` (`idArqueoCaja`),
  KEY `fk_tbl_ArqueoCaja_Det_3_idx` (`idDenominacion`),
  CONSTRAINT `fk_tbl_ArqueoCaja_Det_1` FOREIGN KEY (`idMoneda`) REFERENCES `tbl_moneda` (`id_moneda`),
  CONSTRAINT `fk_tbl_ArqueoCaja_Det_2` FOREIGN KEY (`idArqueoCaja`) REFERENCES `tbl_arqueocaja` (`id_ArqueoCaja`),
  CONSTRAINT `fk_tbl_ArqueoCaja_Det_3` FOREIGN KEY (`idDenominacion`) REFERENCES `tbl_denominacion` (`id_Denominacion`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_arqueocaja_det`
--

LOCK TABLES `tbl_arqueocaja_det` WRITE;
/*!40000 ALTER TABLE `tbl_arqueocaja_det` DISABLE KEYS */;
INSERT INTO `tbl_arqueocaja_det` VALUES (1,1,1,2,404.00,404.00),(2,1,1,3,123.00,615.00),(3,1,1,4,120.00,1200.00),(4,1,1,5,85.00,1700.00),(5,1,1,6,50.00,2500.00),(6,1,1,7,120.00,12000.00),(7,1,1,8,5.00,1000.00),(8,1,1,9,50.00,25000.00),(9,1,2,13,2.00,1389.50),(10,2,1,2,505.00,505.00),(11,2,1,3,123.00,615.00),(12,2,2,15,6.00,21000.00),(13,2,1,8,10.00,2000.00);
/*!40000 ALTER TABLE `tbl_arqueocaja_det` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_categoria_gastos`
--

DROP TABLE IF EXISTS `tbl_categoria_gastos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_categoria_gastos` (
  `id_categoria_gastos` int NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(45) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_categoria_gastos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_categoria_gastos`
--

LOCK TABLES `tbl_categoria_gastos` WRITE;
/*!40000 ALTER TABLE `tbl_categoria_gastos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_categoria_gastos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_categoria_producto`
--

DROP TABLE IF EXISTS `tbl_categoria_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_categoria_producto` (
  `id_categoria_producto` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_categoria_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_categoria_producto`
--

LOCK TABLES `tbl_categoria_producto` WRITE;
/*!40000 ALTER TABLE `tbl_categoria_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_categoria_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_comunidad`
--

DROP TABLE IF EXISTS `tbl_comunidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_comunidad` (
  `id_comunidad` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `responsable` varchar(45) NOT NULL,
  `desc_contribucion` varchar(100) NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_comunidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_comunidad`
--

LOCK TABLES `tbl_comunidad` WRITE;
/*!40000 ALTER TABLE `tbl_comunidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_comunidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_control_bonos`
--

DROP TABLE IF EXISTS `tbl_control_bonos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_control_bonos` (
  `id_bono` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `valor` float NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_bono`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_control_bonos`
--

LOCK TABLES `tbl_control_bonos` WRITE;
/*!40000 ALTER TABLE `tbl_control_bonos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_control_bonos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_denominacion`
--

DROP TABLE IF EXISTS `tbl_denominacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_denominacion` (
  `id_Denominacion` int NOT NULL AUTO_INCREMENT,
  `idMoneda` int NOT NULL,
  `valor` decimal(18,2) NOT NULL,
  `valor_letras` varchar(100) NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_Denominacion`),
  UNIQUE KEY `id_Denominacion_UNIQUE` (`id_Denominacion`),
  KEY `fk_tbl_Denominacion_1_idx` (`idMoneda`),
  CONSTRAINT `fk_tbl_Denominacion_1` FOREIGN KEY (`idMoneda`) REFERENCES `tbl_moneda` (`id_moneda`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_denominacion`
--

LOCK TABLES `tbl_denominacion` WRITE;
/*!40000 ALTER TABLE `tbl_denominacion` DISABLE KEYS */;
INSERT INTO `tbl_denominacion` VALUES (1,3,0.50,'CINCUENTA CENTAVOS DE CÓRDOBA',2),(2,1,1.00,'UN CÓRDOBA',1),(3,1,5.00,'CINCO CÓRDOBAS',1),(4,1,10.00,'DIEZ CÓRDOBAS',1),(5,1,20.00,'VEINTE CÓRDOBAS',1),(6,1,50.00,'CINCUENTA CÓRDOBAS',1),(7,1,100.00,'CIEN CÓRDOBAS',1),(8,1,200.00,'DOSCIENTOS CÓRDOBAS',1),(9,1,500.00,'QUINIENTOS CÓRDOBAS',1),(10,2,1.00,'UN DÓLAR',1),(11,2,5.00,'CINCO DÓLARES',1),(12,2,10.00,'DIEZ DÓLARES',1),(13,2,20.00,'VEINTE DÓLARES',1),(14,2,50.00,'CINCUENTA DÓLARES',1),(15,2,100.00,'CIEN DÓLARES',1),(16,3,5.00,'CINCO EUROS',1),(17,3,10.00,'DIEZ EUROS',1),(18,3,20.00,'VEINTE EUROS',1),(19,3,50.00,'CINCUENTA EUROS',1),(20,3,100.00,'CIEN EUROS',1),(21,3,200.00,'DOSCIENTOS EUROS',1),(22,3,500.00,'QUINIENTOS EUROS',1),(30,3,500.00,'QUINIENTOS EUROS',1),(34,2,2.00,'1',3);
/*!40000 ALTER TABLE `tbl_denominacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_gastos`
--

DROP TABLE IF EXISTS `tbl_gastos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_gastos` (
  `id_registro_gastos` int NOT NULL AUTO_INCREMENT,
  `idKermesse` int NOT NULL,
  `idCatGastos` int NOT NULL,
  `fechaGasto` date NOT NULL,
  `concepto` varchar(70) NOT NULL,
  `monto` float NOT NULL,
  `usuario_creacion` int NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `usuario_eliminacion` int DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_registro_gastos`),
  KEY `fk_tbl_gastos_1_idx` (`idCatGastos`),
  KEY `fk_tbl_gastos_2_idx` (`idKermesse`),
  KEY `fk_tbl_gastos_3_idx` (`usuario_creacion`),
  KEY `fk_tbl_gastos_4_idx` (`usuario_modificacion`),
  KEY `fk_tbl_gastos_5_idx` (`usuario_eliminacion`),
  CONSTRAINT `fk_tbl_gastos_1` FOREIGN KEY (`idCatGastos`) REFERENCES `tbl_categoria_gastos` (`id_categoria_gastos`),
  CONSTRAINT `fk_tbl_gastos_2` FOREIGN KEY (`idKermesse`) REFERENCES `tbl_kermesse` (`id_kermesse`),
  CONSTRAINT `fk_tbl_gastos_3` FOREIGN KEY (`usuario_creacion`) REFERENCES `tbl_usuario` (`id_usuario`),
  CONSTRAINT `fk_tbl_gastos_4` FOREIGN KEY (`usuario_modificacion`) REFERENCES `tbl_usuario` (`id_usuario`),
  CONSTRAINT `fk_tbl_gastos_5` FOREIGN KEY (`usuario_eliminacion`) REFERENCES `tbl_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_gastos`
--

LOCK TABLES `tbl_gastos` WRITE;
/*!40000 ALTER TABLE `tbl_gastos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_gastos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ingreso_comunidad`
--

DROP TABLE IF EXISTS `tbl_ingreso_comunidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_ingreso_comunidad` (
  `id_ingreso_comunidad` int NOT NULL AUTO_INCREMENT,
  `id_kermesse` int NOT NULL,
  `id_comunidad` int NOT NULL,
  `id_producto` int NOT NULL,
  `cant_productos` int NOT NULL,
  `total_bonos` int NOT NULL,
  `usuario_creacion` int NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `usuario_eliminacion` int DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_ingreso_comunidad`),
  KEY `fk_tbl_ingreso_comunidad_tbl_productos1_idx` (`id_producto`),
  KEY `fk_tbl_ingreso_comunidad_1_idx` (`id_kermesse`),
  KEY `fk_tbl_ingreso_comunidad_2_idx` (`id_comunidad`),
  KEY `fk_tbl_ingreso_comunidad_3_idx` (`usuario_creacion`),
  KEY `fk_tbl_ingreso_comunidad_5_idx` (`usuario_modificacion`),
  KEY `fk_tbl_ingreso_comunidad_6_idx` (`usuario_eliminacion`),
  CONSTRAINT `fk_tbl_ingreso_comunidad_1` FOREIGN KEY (`id_kermesse`) REFERENCES `tbl_kermesse` (`id_kermesse`),
  CONSTRAINT `fk_tbl_ingreso_comunidad_2` FOREIGN KEY (`id_comunidad`) REFERENCES `tbl_comunidad` (`id_comunidad`),
  CONSTRAINT `fk_tbl_ingreso_comunidad_3` FOREIGN KEY (`usuario_creacion`) REFERENCES `tbl_usuario` (`id_usuario`),
  CONSTRAINT `fk_tbl_ingreso_comunidad_4` FOREIGN KEY (`usuario_creacion`) REFERENCES `tbl_usuario` (`id_usuario`),
  CONSTRAINT `fk_tbl_ingreso_comunidad_5` FOREIGN KEY (`usuario_modificacion`) REFERENCES `tbl_usuario` (`id_usuario`),
  CONSTRAINT `fk_tbl_ingreso_comunidad_6` FOREIGN KEY (`usuario_eliminacion`) REFERENCES `tbl_usuario` (`id_usuario`),
  CONSTRAINT `fk_tbl_ingreso_comunidad_tbl_productos1` FOREIGN KEY (`id_producto`) REFERENCES `tbl_productos` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ingreso_comunidad`
--

LOCK TABLES `tbl_ingreso_comunidad` WRITE;
/*!40000 ALTER TABLE `tbl_ingreso_comunidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_ingreso_comunidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ingreso_comunidad_det`
--

DROP TABLE IF EXISTS `tbl_ingreso_comunidad_det`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_ingreso_comunidad_det` (
  `id_ingreso_comunidad_det` int NOT NULL AUTO_INCREMENT,
  `id_ingreso_comunidad` int NOT NULL,
  `id_bono` int NOT NULL,
  `denominacion` varchar(45) NOT NULL,
  `cantidad` int NOT NULL,
  `subtotal_bono` float NOT NULL,
  PRIMARY KEY (`id_ingreso_comunidad_det`),
  KEY `fk_ingreso_comunidad_detalle_tbl_bono1_idx` (`id_bono`),
  KEY `fk_tbl_ingreso_comunidad_det_1_idx` (`id_ingreso_comunidad`),
  CONSTRAINT `fk_ingreso_comunidad_detalle_tbl_bono1` FOREIGN KEY (`id_bono`) REFERENCES `tbl_control_bonos` (`id_bono`),
  CONSTRAINT `fk_tbl_ingreso_comunidad_det_1` FOREIGN KEY (`id_ingreso_comunidad`) REFERENCES `tbl_ingreso_comunidad` (`id_ingreso_comunidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ingreso_comunidad_det`
--

LOCK TABLES `tbl_ingreso_comunidad_det` WRITE;
/*!40000 ALTER TABLE `tbl_ingreso_comunidad_det` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_ingreso_comunidad_det` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_kermesse`
--

DROP TABLE IF EXISTS `tbl_kermesse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_kermesse` (
  `id_kermesse` int NOT NULL AUTO_INCREMENT,
  `idParroquia` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fInicio` date NOT NULL,
  `fFinal` date NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estado` int NOT NULL,
  `usuario_creacion` int NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_modificacion` int DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `usuario_eliminacion` int DEFAULT NULL,
  `fecha_eliminacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_kermesse`),
  KEY `fk_tbl_kermesse_1_idx` (`usuario_creacion`),
  KEY `fk_tbl_kermesse_2_idx` (`idParroquia`),
  KEY `fk_tbl_kermesse_3_idx` (`usuario_modificacion`),
  KEY `fk_tbl_kermesse_4_idx` (`usuario_eliminacion`),
  CONSTRAINT `fk_tbl_kermesse_1` FOREIGN KEY (`usuario_creacion`) REFERENCES `tbl_usuario` (`id_usuario`),
  CONSTRAINT `fk_tbl_kermesse_2` FOREIGN KEY (`idParroquia`) REFERENCES `tbl_parroquia` (`idParroquia`),
  CONSTRAINT `fk_tbl_kermesse_3` FOREIGN KEY (`usuario_modificacion`) REFERENCES `tbl_usuario` (`id_usuario`),
  CONSTRAINT `fk_tbl_kermesse_4` FOREIGN KEY (`usuario_eliminacion`) REFERENCES `tbl_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_kermesse`
--

LOCK TABLES `tbl_kermesse` WRITE;
/*!40000 ALTER TABLE `tbl_kermesse` DISABLE KEYS */;
INSERT INTO `tbl_kermesse` VALUES (1,1,'Día de las Madres','2020-11-22','2020-11-22','Celebración del día de las madres',1,1,'2020-11-21 00:00:00',NULL,NULL,NULL,NULL),(2,1,'Alegre el evento','2020-01-15','2020-01-18','Llevando alegría a los eventos',1,1,'2020-01-15 10:10:10',1,'2020-01-15 10:10:10',1,'2020-01-15 10:10:10'),(3,2,'Eventos infantiles','2020-02-15','2020-02-18','Destinada a niños',1,1,'2020-02-15 10:10:10',1,'2020-02-15 10:10:10',1,'2020-02-15 10:10:10'),(4,3,'Ayudando al prójimo','2020-03-15','2020-03-18','En ayuda de afectados',1,1,'2020-03-15 10:10:10',1,'2020-03-15 10:10:10',1,'2020-03-15 10:10:10');
/*!40000 ALTER TABLE `tbl_kermesse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lista_precio`
--

DROP TABLE IF EXISTS `tbl_lista_precio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_lista_precio` (
  `id_lista_precio` int NOT NULL AUTO_INCREMENT,
  `id_kermesse` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_lista_precio`),
  KEY `fk_tbl_lista_precio_1_idx` (`id_kermesse`),
  CONSTRAINT `fk_tbl_lista_precio_1` FOREIGN KEY (`id_kermesse`) REFERENCES `tbl_kermesse` (`id_kermesse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lista_precio`
--

LOCK TABLES `tbl_lista_precio` WRITE;
/*!40000 ALTER TABLE `tbl_lista_precio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_lista_precio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_listaprecio_det`
--

DROP TABLE IF EXISTS `tbl_listaprecio_det`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_listaprecio_det` (
  `id_listaprecio_det` int NOT NULL AUTO_INCREMENT,
  `id_lista_precio` int NOT NULL,
  `id_producto` int NOT NULL,
  `precio_venta` float NOT NULL,
  PRIMARY KEY (`id_listaprecio_det`),
  KEY `fk_tbl_ListaPrecio_detalle_tbl_lista_precio1_idx` (`id_lista_precio`),
  KEY `fk_tbl_ListaPrecio_detalle_tbl_productos1_idx` (`id_producto`),
  CONSTRAINT `fk_tbl_ListaPrecio_detalle_tbl_lista_precio1` FOREIGN KEY (`id_lista_precio`) REFERENCES `tbl_lista_precio` (`id_lista_precio`),
  CONSTRAINT `fk_tbl_ListaPrecio_detalle_tbl_productos1` FOREIGN KEY (`id_producto`) REFERENCES `tbl_productos` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_listaprecio_det`
--

LOCK TABLES `tbl_listaprecio_det` WRITE;
/*!40000 ALTER TABLE `tbl_listaprecio_det` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_listaprecio_det` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_moneda`
--

DROP TABLE IF EXISTS `tbl_moneda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_moneda` (
  `id_moneda` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `simbolo` varchar(45) NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_moneda`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_moneda`
--

LOCK TABLES `tbl_moneda` WRITE;
/*!40000 ALTER TABLE `tbl_moneda` DISABLE KEYS */;
INSERT INTO `tbl_moneda` VALUES (1,'Córdoba','C$',1),(2,'Dólar','$',1),(3,'Euro','€',1),(9,'Lempiras','L',1),(18,'Colón','₡',1),(36,'1','1',3),(37,'Example','E',1),(38,'Example1','E1',3);
/*!40000 ALTER TABLE `tbl_moneda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_opciones`
--

DROP TABLE IF EXISTS `tbl_opciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_opciones` (
  `id_opciones` int NOT NULL AUTO_INCREMENT,
  `opcion_descripcion` varchar(70) NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_opciones`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_opciones`
--

LOCK TABLES `tbl_opciones` WRITE;
/*!40000 ALTER TABLE `tbl_opciones` DISABLE KEYS */;
INSERT INTO `tbl_opciones` VALUES (1,'TblEmpleados.php',1),(2,'NewEmpleado.php',1),(3,'EditEmpleado.php',1);
/*!40000 ALTER TABLE `tbl_opciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_parroquia`
--

DROP TABLE IF EXISTS `tbl_parroquia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_parroquia` (
  `idParroquia` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `parroco` varchar(100) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `sitio_web` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idParroquia`),
  UNIQUE KEY `idParroquia_UNIQUE` (`idParroquia`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_parroquia`
--

LOCK TABLES `tbl_parroquia` WRITE;
/*!40000 ALTER TABLE `tbl_parroquia` DISABLE KEYS */;
INSERT INTO `tbl_parroquia` VALUES (1,'Corazón de Jesús María Las Palmas','Barrio Monseñor Lezcano','2268-2439','José Mendoza','logo.png','www.corazondejesus.com'),(2,'Parroquia Santa Odalys','De los semaforos del nuevo Diario una cuadra al Sur','22093421','Odalio','En todo amar y servir','ParroquiaOdalys.com'),(3,'Parroquia No puede ser','De la angustia 3 cuadras a la depresión','911','Chemsito','Yo mañana','NoPuedeSer.com');
/*!40000 ALTER TABLE `tbl_parroquia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_productos`
--

DROP TABLE IF EXISTS `tbl_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_productos` (
  `id_producto` int NOT NULL AUTO_INCREMENT,
  `id_comunidad` int NOT NULL,
  `id_cat_producto` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `cantidad` int DEFAULT NULL,
  `preciov_sugerido` float NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `fk_tbl_productos_tbl_categoria_producto1_idx` (`id_cat_producto`),
  KEY `fk_tbl_productos_1_idx` (`id_comunidad`),
  CONSTRAINT `fk_tbl_productos_1` FOREIGN KEY (`id_comunidad`) REFERENCES `tbl_comunidad` (`id_comunidad`),
  CONSTRAINT `fk_tbl_productos_tbl_categoria_producto1` FOREIGN KEY (`id_cat_producto`) REFERENCES `tbl_categoria_producto` (`id_categoria_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_productos`
--

LOCK TABLES `tbl_productos` WRITE;
/*!40000 ALTER TABLE `tbl_productos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_rol`
--

DROP TABLE IF EXISTS `tbl_rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_rol` (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `rol_descripcion` varchar(70) NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_rol`
--

LOCK TABLES `tbl_rol` WRITE;
/*!40000 ALTER TABLE `tbl_rol` DISABLE KEYS */;
INSERT INTO `tbl_rol` VALUES (1,'Administrador',1),(2,'Visitante',1);
/*!40000 ALTER TABLE `tbl_rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tasacambio`
--

DROP TABLE IF EXISTS `tbl_tasacambio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_tasacambio` (
  `id_tasaCambio` int NOT NULL AUTO_INCREMENT,
  `id_monedaO` int NOT NULL,
  `id_monedaC` int NOT NULL,
  `mes` varchar(15) NOT NULL,
  `anio` int NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_tasaCambio`),
  KEY `fk_tbl_tasaCambio_1_idx` (`id_monedaO`),
  KEY `fk_tbl_tasaCambio_2_idx` (`id_monedaC`),
  CONSTRAINT `fk_tbl_tasaCambio_1` FOREIGN KEY (`id_monedaO`) REFERENCES `tbl_moneda` (`id_moneda`),
  CONSTRAINT `fk_tbl_tasaCambio_2` FOREIGN KEY (`id_monedaC`) REFERENCES `tbl_moneda` (`id_moneda`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tasacambio`
--

LOCK TABLES `tbl_tasacambio` WRITE;
/*!40000 ALTER TABLE `tbl_tasacambio` DISABLE KEYS */;
INSERT INTO `tbl_tasacambio` VALUES (1,2,1,'Noviembre',2020,1),(2,1,2,'Noviembre',2020,1),(3,3,1,'Noviembre',2020,1),(4,1,3,'Noviembre',2020,1);
/*!40000 ALTER TABLE `tbl_tasacambio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(40) NOT NULL,
  `pwd` varchar(45) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuario`
--

LOCK TABLES `tbl_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_usuario` DISABLE KEYS */;
INSERT INTO `tbl_usuario` VALUES (1,'elsnergo','123','Elsner','González','elsnergo@gmail.com',1);
/*!40000 ALTER TABLE `tbl_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vw_arqueocaja`
--

DROP TABLE IF EXISTS `vw_arqueocaja`;
/*!50001 DROP VIEW IF EXISTS `vw_arqueocaja`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_arqueocaja` AS SELECT 
 1 AS `id_ArqueoCaja`,
 1 AS `nombre`,
 1 AS `fechaArqueo`,
 1 AS `granTotal`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_arqueocajadet`
--

DROP TABLE IF EXISTS `vw_arqueocajadet`;
/*!50001 DROP VIEW IF EXISTS `vw_arqueocajadet`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_arqueocajadet` AS SELECT 
 1 AS `id_ArqueoCaja`,
 1 AS `nombre`,
 1 AS `valor`,
 1 AS `cantidad`,
 1 AS `subtotal`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_denominacion`
--

DROP TABLE IF EXISTS `vw_denominacion`;
/*!50001 DROP VIEW IF EXISTS `vw_denominacion`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_denominacion` AS SELECT 
 1 AS `id_Denominacion`,
 1 AS `nombre`,
 1 AS `valor`,
 1 AS `valor_letras`,
 1 AS `equivalente`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_rol_opciones`
--

DROP TABLE IF EXISTS `vw_rol_opciones`;
/*!50001 DROP VIEW IF EXISTS `vw_rol_opciones`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_rol_opciones` AS SELECT 
 1 AS `id_rol`,
 1 AS `rol_descripcion`,
 1 AS `id_opciones`,
 1 AS `opcion_descripcion`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_rol_usuario`
--

DROP TABLE IF EXISTS `vw_rol_usuario`;
/*!50001 DROP VIEW IF EXISTS `vw_rol_usuario`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_rol_usuario` AS SELECT 
 1 AS `id_rol`,
 1 AS `rol_descripcion`,
 1 AS `id_usuario`,
 1 AS `usuario`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_tasacambio`
--

DROP TABLE IF EXISTS `vw_tasacambio`;
/*!50001 DROP VIEW IF EXISTS `vw_tasacambio`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_tasacambio` AS SELECT 
 1 AS `id_tasaCambio`,
 1 AS `original`,
 1 AS `cambio`,
 1 AS `mes`,
 1 AS `anio`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_tasacambiodet`
--

DROP TABLE IF EXISTS `vw_tasacambiodet`;
/*!50001 DROP VIEW IF EXISTS `vw_tasacambiodet`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_tasacambiodet` AS SELECT 
 1 AS `id_tasaCambio`,
 1 AS `tasa`,
 1 AS `fecha`,
 1 AS `tipoCambio`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vw_arqueocaja`
--

/*!50001 DROP VIEW IF EXISTS `vw_arqueocaja`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_arqueocaja` AS select `tbl_arqueocaja`.`id_ArqueoCaja` AS `id_ArqueoCaja`,`tbl_kermesse`.`nombre` AS `nombre`,`tbl_arqueocaja`.`fechaArqueo` AS `fechaArqueo`,format(`tbl_arqueocaja`.`granTotal`,2) AS `granTotal` from (`tbl_arqueocaja` join `tbl_kermesse` on((`tbl_arqueocaja`.`idKermesse` = `tbl_kermesse`.`id_kermesse`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_arqueocajadet`
--

/*!50001 DROP VIEW IF EXISTS `vw_arqueocajadet`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_arqueocajadet` AS select `tbl_arqueocaja`.`id_ArqueoCaja` AS `id_ArqueoCaja`,`tbl_moneda`.`nombre` AS `nombre`,concat((select `tbl_moneda`.`simbolo` from `tbl_moneda` where (`tbl_moneda`.`id_moneda` = `tbl_denominacion`.`idMoneda`)),' ',`tbl_denominacion`.`valor`) AS `valor`,`tbl_arqueocaja_det`.`cantidad` AS `cantidad`,concat('C$ ',convert(format(`tbl_arqueocaja_det`.`subtotal`,2) using utf8mb4)) AS `subtotal` from (((`tbl_arqueocaja_det` join `tbl_arqueocaja` on((`tbl_arqueocaja_det`.`idArqueoCaja` = `tbl_arqueocaja`.`id_ArqueoCaja`))) join `tbl_moneda` on((`tbl_arqueocaja_det`.`idMoneda` = `tbl_moneda`.`id_moneda`))) join `tbl_denominacion` on((`tbl_arqueocaja_det`.`idDenominacion` = `tbl_denominacion`.`id_Denominacion`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_denominacion`
--

/*!50001 DROP VIEW IF EXISTS `vw_denominacion`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_denominacion` AS select `tbl_denominacion`.`id_Denominacion` AS `id_Denominacion`,`tbl_moneda`.`nombre` AS `nombre`,`tbl_denominacion`.`valor` AS `valor`,`tbl_denominacion`.`valor_letras` AS `valor_letras`,concat(`tbl_moneda`.`simbolo`,' ',`tbl_denominacion`.`valor`) AS `equivalente` from (`tbl_denominacion` join `tbl_moneda` on((`tbl_moneda`.`id_moneda` = `tbl_denominacion`.`idMoneda`))) where (`tbl_denominacion`.`estado` <> 3) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_rol_opciones`
--

/*!50001 DROP VIEW IF EXISTS `vw_rol_opciones`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_rol_opciones` AS select `rop`.`id_rol` AS `id_rol`,`tr`.`rol_descripcion` AS `rol_descripcion`,`rop`.`id_opciones` AS `id_opciones`,`tp`.`opcion_descripcion` AS `opcion_descripcion` from ((`rol_opciones` `rop` join `tbl_rol` `tr` on((`rop`.`id_rol` = `tr`.`id_rol`))) join `tbl_opciones` `tp` on((`rop`.`id_opciones` = `tp`.`id_opciones`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_rol_usuario`
--

/*!50001 DROP VIEW IF EXISTS `vw_rol_usuario`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_rol_usuario` AS select `ru`.`id_rol` AS `id_rol`,`tro`.`rol_descripcion` AS `rol_descripcion`,`ru`.`id_usuario` AS `id_usuario`,`tus`.`usuario` AS `usuario` from ((`rol_usuario` `ru` join `tbl_rol` `tro` on((`ru`.`id_rol` = `tro`.`id_rol`))) join `tbl_usuario` `tus` on((`ru`.`id_usuario` = `tus`.`id_usuario`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_tasacambio`
--

/*!50001 DROP VIEW IF EXISTS `vw_tasacambio`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_tasacambio` AS select `tbl_tasacambio`.`id_tasaCambio` AS `id_tasaCambio`,(select `tbl_moneda`.`nombre` from `tbl_moneda` where (`tbl_moneda`.`id_moneda` = `tbl_tasacambio`.`id_monedaO`)) AS `original`,(select `tbl_moneda`.`nombre` from `tbl_moneda` where (`tbl_moneda`.`id_moneda` = `tbl_tasacambio`.`id_monedaC`)) AS `cambio`,`tbl_tasacambio`.`mes` AS `mes`,`tbl_tasacambio`.`anio` AS `anio` from `tbl_tasacambio` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_tasacambiodet`
--

/*!50001 DROP VIEW IF EXISTS `vw_tasacambiodet`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_tasacambiodet` AS select `tbl_tasacambio`.`id_tasaCambio` AS `id_tasaCambio`,(select concat((select `tbl_moneda`.`nombre` from `tbl_moneda` where (`tbl_moneda`.`id_moneda` = `tbl_tasacambio`.`id_monedaO`)),' a ',(select `tbl_moneda`.`nombre` from `tbl_moneda` where (`tbl_moneda`.`id_moneda` = `tbl_tasacambio`.`id_monedaC`)),'    (',(select `tbl_moneda`.`simbolo` from `tbl_moneda` where (`tbl_moneda`.`id_moneda` = `tbl_tasacambio`.`id_monedaO`)),' -> ',(select `tbl_moneda`.`simbolo` from `tbl_moneda` where (`tbl_moneda`.`id_moneda` = `tbl_tasacambio`.`id_monedaC`)),')')) AS `tasa`,`tasacambio_det`.`fecha` AS `fecha`,concat('C$ ',`tasacambio_det`.`tipoCambio`) AS `tipoCambio` from (`tasacambio_det` join `tbl_tasacambio` on((`tasacambio_det`.`id_tasaCambio` = `tbl_tasacambio`.`id_tasaCambio`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-03 12:49:39
