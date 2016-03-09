CREATE DATABASE  IF NOT EXISTS `himevico` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `himevico`;
-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: localhost    Database: himevico
-- ------------------------------------------------------
-- Server version	5.5.43-0ubuntu0.14.04.1

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
-- Table structure for table `ausencia`
--

DROP TABLE IF EXISTS `ausencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ausencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ausencia`
--

LOCK TABLES `ausencia` WRITE;
/*!40000 ALTER TABLE `ausencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `ausencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `centros`
--

DROP TABLE IF EXISTS `centros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `centros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEmpresa` int(11) DEFAULT NULL,
  `nombre` varchar(45) NOT NULL,
  `localizacion` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `empresafk_idx` (`idEmpresa`),
  CONSTRAINT `centro_empresa_FK` FOREIGN KEY (`idEmpresa`) REFERENCES `empresas` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centros`
--

LOCK TABLES `centros` WRITE;
/*!40000 ALTER TABLE `centros` DISABLE KEYS */;
INSERT INTO `centros` VALUES (1,1,'Arriaga','C/Falsa');
/*!40000 ALTER TABLE `centros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conveniosausencias`
--

DROP TABLE IF EXISTS `conveniosausencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conveniosausencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `idAusencia` int(11) NOT NULL,
  `idHorasConvenio` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `horasConvenio_fk_idx` (`idHorasConvenio`),
  KEY `fk_ausencia_idx` (`idAusencia`),
  CONSTRAINT `ca_ausencia_FK` FOREIGN KEY (`idAusencia`) REFERENCES `ausencia` (`id`),
  CONSTRAINT `ca_horaciosconvenios_FK` FOREIGN KEY (`idHorasConvenio`) REFERENCES `horasconvenios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conveniosausencias`
--

LOCK TABLES `conveniosausencias` WRITE;
/*!40000 ALTER TABLE `conveniosausencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `conveniosausencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `nif` varchar(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (1,'arriaga','123456');
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (1,'Abierto'),(2,'Cerrado'),(3,'Validado'),(4,'Finalizado');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `festivo`
--

DROP TABLE IF EXISTS `festivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `festivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `motivo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `festivo`
--

LOCK TABLES `festivo` WRITE;
/*!40000 ALTER TABLE `festivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `festivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `franjas`
--

DROP TABLE IF EXISTS `franjas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `franjas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL,
  `idTipo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_franjas_tipos1_idx` (`idTipo`),
  CONSTRAINT `fk_franjas_tipos1` FOREIGN KEY (`idTipo`) REFERENCES `tipos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `franjas`
--

LOCK TABLES `franjas` WRITE;
/*!40000 ALTER TABLE `franjas` DISABLE KEYS */;
INSERT INTO `franjas` VALUES (1,'00:00:00','01:00:00',3),(2,'01:00:00','02:00:00',3),(3,'02:00:00','03:00:00',3),(4,'03:00:00','04:00:00',3),(5,'04:00:00','05:00:00',3),(6,'05:00:00','06:00:00',3),(7,'06:00:00','07:00:00',1),(8,'07:00:00','08:00:00',1),(9,'08:00:00','09:00:00',1),(10,'09:00:00','10:00:00',1),(11,'10:00:00','11:00:00',1),(12,'11:00:00','12:00:00',1),(13,'12:00:00','13:00:00',1),(14,'13:00:00','14:00:00',1),(15,'14:00:00','15:00:00',2),(16,'15:00:00','16:00:00',2),(17,'16:00:00','17:00:00',2),(18,'17:00:00','18:00:00',2),(19,'18:00:00','19:00:00',2),(20,'19:00:00','20:00:00',2),(21,'20:00:00','21:00:00',2),(22,'21:00:00','22:00:00',2),(23,'22:00:00','23:00:00',3),(24,'23:00:00','00:00:00',3);
/*!40000 ALTER TABLE `franjas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horariopartes`
--

DROP TABLE IF EXISTS `horariopartes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horariopartes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entrada` time NOT NULL,
  `salida` time NOT NULL,
  `idPartesProduccion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_horarioPartes_partesproduccion1_idx` (`idPartesProduccion`),
  CONSTRAINT `horariopartes_parteproduccion_fk` FOREIGN KEY (`idPartesProduccion`) REFERENCES `partesproduccion` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horariopartes`
--

LOCK TABLES `horariopartes` WRITE;
/*!40000 ALTER TABLE `horariopartes` DISABLE KEYS */;
INSERT INTO `horariopartes` VALUES (1,'07:00:00','07:00:00',1),(2,'07:00:00','07:00:00',NULL);
/*!40000 ALTER TABLE `horariopartes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horarios`
--

DROP TABLE IF EXISTS `horarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horarios`
--

LOCK TABLES `horarios` WRITE;
/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horariosfranja`
--

DROP TABLE IF EXISTS `horariosfranja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horariosfranja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idHorario` int(11) NOT NULL,
  `idFranja` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hf_franja_fk_idx` (`idFranja`),
  KEY `hf_horario_FK_idx` (`idHorario`),
  CONSTRAINT `hf_franja_FK` FOREIGN KEY (`idFranja`) REFERENCES `franjas` (`id`),
  CONSTRAINT `hf_horario_FK` FOREIGN KEY (`idHorario`) REFERENCES `horarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horariosfranja`
--

LOCK TABLES `horariosfranja` WRITE;
/*!40000 ALTER TABLE `horariosfranja` DISABLE KEYS */;
/*!40000 ALTER TABLE `horariosfranja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horariotrabajadores`
--

DROP TABLE IF EXISTS `horariotrabajadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horariotrabajadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dniTrabajador` varchar(9) NOT NULL,
  `idHorario` int(11) NOT NULL,
  `numeroSemana` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ht_trabjadores_FK_idx` (`dniTrabajador`),
  KEY `ht_horario_FK_idx` (`idHorario`),
  CONSTRAINT `ht_horario_FK` FOREIGN KEY (`idHorario`) REFERENCES `horarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ht_trabjadores_FK` FOREIGN KEY (`dniTrabajador`) REFERENCES `trabajadores` (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horariotrabajadores`
--

LOCK TABLES `horariotrabajadores` WRITE;
/*!40000 ALTER TABLE `horariotrabajadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `horariotrabajadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horasconvenios`
--

DROP TABLE IF EXISTS `horasconvenios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horasconvenios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `horasAnual` int(11) NOT NULL,
  `denominacion` varchar(45) NOT NULL,
  `idCentro` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fkcentro_idx` (`idCentro`),
  CONSTRAINT `hc_centro_FK` FOREIGN KEY (`idCentro`) REFERENCES `centros` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horasconvenios`
--

LOCK TABLES `horasconvenios` WRITE;
/*!40000 ALTER TABLE `horasconvenios` DISABLE KEYS */;
INSERT INTO `horasconvenios` VALUES (1,50,'xxx',1);
/*!40000 ALTER TABLE `horasconvenios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dniTrabajador` varchar(9) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `trabajadorFK_idx` (`dniTrabajador`),
  CONSTRAINT `login_trabajador_FK` FOREIGN KEY (`dniTrabajador`) REFERENCES `trabajadores` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (2,'22222222A','ab56b4d92b40713acc5af89985d4b786'),(9,'99999999a','202cb962ac59075b964b07152d234b70'),(10,'33333333A','202cb962ac59075b964b07152d234b70'),(11,'72827654V','84cbad5316fbe0eb4a2d6ade26773ed7');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parteslogistica`
--

DROP TABLE IF EXISTS `parteslogistica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parteslogistica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dniTrabajador` varchar(9) DEFAULT NULL,
  `idEstado` int(11) DEFAULT NULL,
  `nota` varchar(250) DEFAULT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `trabajadorfk_idx` (`dniTrabajador`),
  KEY `pl_estado_fk_idx` (`idEstado`),
  CONSTRAINT `pl_estado_fk` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `pl_trabajador_FK` FOREIGN KEY (`dniTrabajador`) REFERENCES `trabajadores` (`dni`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parteslogistica`
--

LOCK TABLES `parteslogistica` WRITE;
/*!40000 ALTER TABLE `parteslogistica` DISABLE KEYS */;
INSERT INTO `parteslogistica` VALUES (4,'99999999a',4,'Jon es un friky','2016-03-03'),(5,'99999999a',4,'Hola alain','2016-03-04');
/*!40000 ALTER TABLE `parteslogistica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partesproduccion`
--

DROP TABLE IF EXISTS `partesproduccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partesproduccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `incidencia` varchar(255) DEFAULT NULL,
  `autopista` double DEFAULT NULL,
  `dieta` double DEFAULT NULL,
  `otroGasto` double DEFAULT NULL,
  `idEstado` int(11) DEFAULT NULL,
  `dniTrabajador` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Partesproduccion_trabajadores_FK_idx` (`dniTrabajador`),
  KEY `pp_estado_FK_idx` (`idEstado`),
  CONSTRAINT `pp_estado_FK` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `pp_trabajadores_FK` FOREIGN KEY (`dniTrabajador`) REFERENCES `trabajadores` (`dni`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partesproduccion`
--

LOCK TABLES `partesproduccion` WRITE;
/*!40000 ALTER TABLE `partesproduccion` DISABLE KEYS */;
INSERT INTO `partesproduccion` VALUES (1,'2016-03-05','',0,0,0,4,'33333333A');
/*!40000 ALTER TABLE `partesproduccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partesproducciontareas`
--

DROP TABLE IF EXISTS `partesproducciontareas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partesproducciontareas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTareas` int(11) NOT NULL,
  `idParteProduccion` int(11) NOT NULL,
  `numeroHoras` double DEFAULT NULL,
  `paqueteEntrada` int(11) DEFAULT NULL,
  `paqueteSalida` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ppt_pp_FK_idx` (`idParteProduccion`),
  KEY `ppt_tareas_FK` (`idTareas`),
  CONSTRAINT `ppt_pp_FK` FOREIGN KEY (`idParteProduccion`) REFERENCES `partesproduccion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ppt_tareas_FK` FOREIGN KEY (`idTareas`) REFERENCES `tareas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partesproducciontareas`
--

LOCK TABLES `partesproducciontareas` WRITE;
/*!40000 ALTER TABLE `partesproducciontareas` DISABLE KEYS */;
INSERT INTO `partesproducciontareas` VALUES (1,5,1,2,0,0),(2,2,1,4,0,0);
/*!40000 ALTER TABLE `partesproducciontareas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  `idHorasConvenio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `perfiles__idx` (`idHorasConvenio`),
  CONSTRAINT `perfiles_horasconvenio_FK` FOREIGN KEY (`idHorasConvenio`) REFERENCES `horasconvenios` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfiles`
--

LOCK TABLES `perfiles` WRITE;
/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
INSERT INTO `perfiles` VALUES (1,'Gerencia',1),(2,'Administracion',1),(3,'Produccion',1),(4,'Logistica',1);
/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tareas`
--

DROP TABLE IF EXISTS `tareas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tareas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  `idTipoTarea` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tareas_tipostareas_FK_idx` (`idTipoTarea`),
  CONSTRAINT `tareas_tipostareas_FK` FOREIGN KEY (`idTipoTarea`) REFERENCES `tipostarea` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tareas`
--

LOCK TABLES `tareas` WRITE;
/*!40000 ALTER TABLE `tareas` DISABLE KEYS */;
INSERT INTO `tareas` VALUES (1,'Organizacion Planta',1),(2,'Cizalla',1),(3,'Prensa',1),(4,'Carga/Descarga de Camiones',1),(5,'Grua Portante/Iman',1),(6,'Soplete',1),(7,'Liebherr',2),(8,'Poclain-1188',2),(9,'Liebherr A 904 C IND',2),(10,'Cizalla',3),(11,'Prensa',3),(12,'Liebherr',3),(13,'Poclain-1188',3),(14,'Limpieza de planta',3),(15,'Limpieza de focos',3);
/*!40000 ALTER TABLE `tareas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tcalendario`
--

DROP TABLE IF EXISTS `tcalendario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tcalendario` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `evento` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21944 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tcalendario`
--

LOCK TABLES `tcalendario` WRITE;
/*!40000 ALTER TABLE `tcalendario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tcalendario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos`
--

DROP TABLE IF EXISTS `tipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `precio` double NOT NULL,
  `tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos`
--

LOCK TABLES `tipos` WRITE;
/*!40000 ALTER TABLE `tipos` DISABLE KEYS */;
INSERT INTO `tipos` VALUES (1,15,'mañana'),(2,20,'tarde'),(3,30,'noche'),(4,20,'mediodia');
/*!40000 ALTER TABLE `tipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipostarea`
--

DROP TABLE IF EXISTS `tipostarea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipostarea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipostarea`
--

LOCK TABLES `tipostarea` WRITE;
/*!40000 ALTER TABLE `tipostarea` DISABLE KEYS */;
INSERT INTO `tipostarea` VALUES (1,'Medios de Produccion'),(2,'Maquinaria'),(3,'Mantenimiento/Avería/Incidencia');
/*!40000 ALTER TABLE `tipostarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabajadores`
--

DROP TABLE IF EXISTS `trabajadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trabajadores` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido1` varchar(45) NOT NULL,
  `apellido2` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `idCentro` int(11) NOT NULL,
  `idPerfil` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT 'Vista/Fotos/Default/foto.jpg',
  PRIMARY KEY (`dni`),
  KEY `centrofk_idx` (`idCentro`),
  KEY `perfilfk_idx` (`idPerfil`),
  CONSTRAINT `trabajador_centro_FK` FOREIGN KEY (`idCentro`) REFERENCES `centros` (`id`),
  CONSTRAINT `trabajador_perfil_FK` FOREIGN KEY (`idPerfil`) REFERENCES `perfiles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajadores`
--

LOCK TABLES `trabajadores` WRITE;
/*!40000 ALTER TABLE `trabajadores` DISABLE KEYS */;
INSERT INTO `trabajadores` VALUES ('22222222A','Pepe','ape1','ape2','123412341',1,2,'Vista/Fotos/Default/foto.jpg'),('33333333A','Mikel','ddvv','sdss','929281812',1,3,'Vista/Fotos/Default/foto.jpg'),('72827654V','Jon','Sanchez','Chica','6086491630',1,1,'Vista/Fotos/72827654V/IMAGEN-DE-PERFIL-FACEBOOK-619x346.jpg'),('99999999a','Josu','sdad','adsad','222111444',1,4,'Vista/Fotos/Default/foto.jpg');
/*!40000 ALTER TABLE `trabajadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabajadoresausencias`
--

DROP TABLE IF EXISTS `trabajadoresausencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trabajadoresausencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dniTrabajador` varchar(9) NOT NULL,
  `idAusencia` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `horaInicio` datetime NOT NULL,
  `horaFin` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ausencia_fk_idx` (`idAusencia`),
  KEY `trabajador_FK_idx` (`dniTrabajador`),
  CONSTRAINT `ta_ausencia_FK` FOREIGN KEY (`idAusencia`) REFERENCES `ausencia` (`id`),
  CONSTRAINT `ta_trabajador_FK` FOREIGN KEY (`dniTrabajador`) REFERENCES `trabajadores` (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajadoresausencias`
--

LOCK TABLES `trabajadoresausencias` WRITE;
/*!40000 ALTER TABLE `trabajadoresausencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `trabajadoresausencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculos`
--

DROP TABLE IF EXISTS `vehiculos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(45) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `idCentro` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `centrofk_idx` (`idCentro`),
  CONSTRAINT `vehiculo_centro_FK` FOREIGN KEY (`idCentro`) REFERENCES `centros` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculos`
--

LOCK TABLES `vehiculos` WRITE;
/*!40000 ALTER TABLE `vehiculos` DISABLE KEYS */;
INSERT INTO `vehiculos` VALUES (1,'111111','seat',1);
/*!40000 ALTER TABLE `vehiculos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `viajes`
--

DROP TABLE IF EXISTS `viajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `viajes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL,
  `idVehiculo` int(11) DEFAULT NULL,
  `idParte` int(11) NOT NULL,
  `albaran` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parteLogistikafk_idx` (`idParte`),
  KEY `vehiculofk_idx` (`idVehiculo`),
  CONSTRAINT `viajes_pl_FK` FOREIGN KEY (`idParte`) REFERENCES `parteslogistica` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `viajes_vehiculo_FK` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculos` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `viajes`
--

LOCK TABLES `viajes` WRITE;
/*!40000 ALTER TABLE `viajes` DISABLE KEYS */;
INSERT INTO `viajes` VALUES (2,'09:00:00','10:00:00',1,4,'235345'),(3,'07:00:00','08:00:00',1,5,'11');
/*!40000 ALTER TABLE `viajes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-09  9:22:41
