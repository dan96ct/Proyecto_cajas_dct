CREATE DATABASE  IF NOT EXISTS `bd_alumno_dct` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `bd_alumno_dct`;
-- MySQL dump 10.16  Distrib 10.1.28-MariaDB, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: bd_alumno_dct
-- ------------------------------------------------------
-- Server version	10.1.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `caja`
--

DROP TABLE IF EXISTS `caja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(45) NOT NULL,
  `altura` double NOT NULL,
  `anchura` double NOT NULL,
  `profundidad` double NOT NULL,
  `material` varchar(45) NOT NULL,
  `contenido` varchar(45) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caja`
--

LOCK TABLES `caja` WRITE;
/*!40000 ALTER TABLE `caja` DISABLE KEYS */;
INSERT INTO `caja` VALUES (64,'#000000',50.4,50.4,80.1,'Madera','Tornillos','80P'),(65,'#000000',51.5,50.5,50.85,'Metal','Tornillos','P70'),(66,'#000000',51.5,50.5,50.85,'Madera','Tuercas','N20');
/*!40000 ALTER TABLE `caja` ENABLE KEYS */;
UNLOCK TABLES;
ALTER DATABASE `bd_alumno_dct` CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `bd_alumno_dct`.`caja_BEFORE_DELETE` BEFORE DELETE ON `caja` FOR EACH ROW
BEGIN
INSERT INTO cajasVendidas
VALUES (null, old.color, old.altura,old.anchura,old.profundidad,old.material,old.contenido,old.codigo);

UPDATE `estanteria` SET `lejasOcupadas`=`lejasOcupadas`-1 WHERE `id`=(select idEstanteria from ocupacion where idCaja = old.id);

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
ALTER DATABASE `bd_alumno_dct` CHARACTER SET utf8 COLLATE utf8_spanish_ci ;

--
-- Table structure for table `cajasvendidas`
--

DROP TABLE IF EXISTS `cajasvendidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cajasvendidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(45) NOT NULL,
  `altura` double NOT NULL,
  `anchura` double NOT NULL,
  `profundidad` double NOT NULL,
  `material` varchar(45) NOT NULL,
  `contenido` varchar(45) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cajasvendidas`
--

LOCK TABLES `cajasvendidas` WRITE;
/*!40000 ALTER TABLE `cajasvendidas` DISABLE KEYS */;
/*!40000 ALTER TABLE `cajasvendidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estanteria`
--

DROP TABLE IF EXISTS `estanteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estanteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `material` varchar(45) NOT NULL,
  `nLejas` varchar(45) NOT NULL,
  `pasillo` varchar(45) NOT NULL,
  `numero` varchar(45) NOT NULL,
  `lejasOcupadas` int(11) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`numero`,`pasillo`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estanteria`
--

LOCK TABLES `estanteria` WRITE;
/*!40000 ALTER TABLE `estanteria` DISABLE KEYS */;
INSERT INTO `estanteria` VALUES (19,'Madera','4','A','1',1,'A50'),(20,'Aluminio','5','A','2',2,'A40');
/*!40000 ALTER TABLE `estanteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ocupacion`
--

DROP TABLE IF EXISTS `ocupacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ocupacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCaja` int(11) NOT NULL,
  `idEstanteria` int(11) NOT NULL,
  `lejaOcupada` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_idx` (`idCaja`),
  KEY `id_idx1` (`idEstanteria`),
  CONSTRAINT `id` FOREIGN KEY (`idCaja`) REFERENCES `caja` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `id_estanteria` FOREIGN KEY (`idEstanteria`) REFERENCES `estanteria` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ocupacion`
--

LOCK TABLES `ocupacion` WRITE;
/*!40000 ALTER TABLE `ocupacion` DISABLE KEYS */;
INSERT INTO `ocupacion` VALUES (64,64,19,1),(65,65,20,1),(66,66,20,2);
/*!40000 ALTER TABLE `ocupacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `contraseña` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bd_alumno_dct'
--

--
-- Dumping routines for database 'bd_alumno_dct'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-26 19:34:35
