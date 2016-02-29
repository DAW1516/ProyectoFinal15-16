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
-- Table structure for table `ausencias`
--

DROP TABLE IF EXISTS `ausencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ausencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ausencias`
--

LOCK TABLES `ausencias` WRITE;
/*!40000 ALTER TABLE `ausencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `ausencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `centros`
--

DROP TABLE IF EXISTS `centros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `centros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `localizacion` varchar(250) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `empresafk_idx` (`idEmpresa`),
  CONSTRAINT `centro_empresa_FK` FOREIGN KEY (`idEmpresa`) REFERENCES `empresas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centros`
--

LOCK TABLES `centros` WRITE;
/*!40000 ALTER TABLE `centros` DISABLE KEYS */;
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
  CONSTRAINT `ca_ausencia_FK` FOREIGN KEY (`idAusencia`) REFERENCES `ausencias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ca_horaciosconvenios_FK` FOREIGN KEY (`idHorasConvenio`) REFERENCES `horasconvenios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
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
  `horaInicio` datetime NOT NULL,
  `horaFin` datetime NOT NULL,
  `idTipofranja` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_franjas_tipos1_idx` (`idTipofranja`),
  CONSTRAINT `fk_franjas_tipos1` FOREIGN KEY (`idTipofranja`) REFERENCES `tiposfranjas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `franjas`
--

LOCK TABLES `franjas` WRITE;
/*!40000 ALTER TABLE `franjas` DISABLE KEYS */;
/*!40000 ALTER TABLE `franjas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horarioPartes`
--

DROP TABLE IF EXISTS `horariopartes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horarioPartes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entrada` datetime NOT NULL,
  `salida` varchar(45) NOT NULL,
  `idPartesProduccion` int(11) NOT NULL,
  PRIMARY KEY (`id`,`idPartesProduccion`),
  KEY `fk_horarioPartes_partesproduccion1_idx` (`idPartesProduccion`),
  CONSTRAINT `fk_horarioPartes_partesproduccion1` FOREIGN KEY (`idPartesProduccion`) REFERENCES `partesproduccion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horarioPartes`
--

LOCK TABLES `horarioPartes` WRITE;
/*!40000 ALTER TABLE `horarioPartes` DISABLE KEYS */;
/*!40000 ALTER TABLE `horarioPartes` ENABLE KEYS */;
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
  CONSTRAINT `hf_franja_FK` FOREIGN KEY (`idFranja`) REFERENCES `franjas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  `numeroSemana` int(11) NOT NULL,
  `dniTrabajador` varchar(9) NOT NULL,
  `idHorario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ht_trabjadores_FK_idx` (`dniTrabajador`),
  KEY `ht_horario_FK_idx` (`idHorario`),
  CONSTRAINT `ht_trabjadores_FK` FOREIGN KEY (`dniTrabajador`) REFERENCES `trabajadores` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ht_horario_FK` FOREIGN KEY (`idHorario`) REFERENCES `horarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
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
  CONSTRAINT `hc_centro_FK` FOREIGN KEY (`idCentro`) REFERENCES `centros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horasconvenios`
--

LOCK TABLES `horasconvenios` WRITE;
/*!40000 ALTER TABLE `horasconvenios` DISABLE KEYS */;
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
  `password` varchar(255) NOT NULL,
  `dniTrabajador` varchar(9) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `trabajadorFK_idx` (`dniTrabajador`),
  CONSTRAINT `login_trabajador_FK` FOREIGN KEY (`dniTrabajador`) REFERENCES `trabajadores` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
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
  `nota` varchar(250) NOT NULL,
  `dniTrabajador` varchar(9) NOT NULL,
  `idEstado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `trabajadorfk_idx` (`dniTrabajador`),
  KEY `pl_estado_fk_idx` (`idEstado`),
  CONSTRAINT `pl_trabajador_FK` FOREIGN KEY (`dniTrabajador`) REFERENCES `trabajadores` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pl_estado_fk` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parteslogistica`
--

LOCK TABLES `parteslogistica` WRITE;
/*!40000 ALTER TABLE `parteslogistica` DISABLE KEYS */;
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
  `fecha` datetime NOT NULL,
  `idEstado` int(11) NOT NULL,
  `dniTrabajador` varchar(9) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Partesproduccion_trabajadores_FK_idx` (`dniTrabajador`),
  KEY `pp_estado_FK_idx` (`idEstado`),
  CONSTRAINT `pp_trabajadores_FK` FOREIGN KEY (`dniTrabajador`) REFERENCES `trabajadores` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pp_estado_FK` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partesproduccion`
--

LOCK TABLES `partesproduccion` WRITE;
/*!40000 ALTER TABLE `partesproduccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `partesproduccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partesproducciontareas`
--

DROP TABLE IF EXISTS `partesproducciontareas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partesproducciontareas` (
  `idTarea` int(11) NOT NULL,
  `idParteProduccion` int(11) NOT NULL,
  `numeroHoras` double DEFAULT NULL,
  `paqueteEntrada` int(11) DEFAULT NULL,
  `paqueteSalida` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTarea`,`idParteProduccion`),
  KEY `ppt_pp_FK_idx` (`idParteProduccion`),
  CONSTRAINT `ppt_pp_FK` FOREIGN KEY (`idParteProduccion`) REFERENCES `partesproduccion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ppt_tareas_FK` FOREIGN KEY (`idTarea`) REFERENCES `tareas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partesproducciontareas`
--

LOCK TABLES `partesproducciontareas` WRITE;
/*!40000 ALTER TABLE `partesproducciontareas` DISABLE KEYS */;
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
  `idHorasConvenio` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `perfiles__idx` (`idHorasConvenio`),
  CONSTRAINT `perfiles_horasconvenio_FK` FOREIGN KEY (`idHorasConvenio`) REFERENCES `horasconvenios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfiles`
--

LOCK TABLES `perfiles` WRITE;
/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
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
  `idTipotarea` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tareas_tipostareas_FK_idx` (`idTipotarea`),
  CONSTRAINT `tareas_tipostareas_FK` FOREIGN KEY (`idTipotarea`) REFERENCES `tipostareas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tareas`
--

LOCK TABLES `tareas` WRITE;
/*!40000 ALTER TABLE `tareas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tareas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiposfranjas`
--

DROP TABLE IF EXISTS `tiposfranjas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiposfranjas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `precio` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiposfranjas`
--

LOCK TABLES `tiposfranjas` WRITE;
/*!40000 ALTER TABLE `tiposfranjas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tiposfranjas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipostareas`
--

DROP TABLE IF EXISTS `tipostareas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipostareas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipostareas`
--

LOCK TABLES `tipostareas` WRITE;
/*!40000 ALTER TABLE `tipostareas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipostareas` ENABLE KEYS */;
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
  PRIMARY KEY (`dni`),
  KEY `centrofk_idx` (`idCentro`),
  KEY `perfilfk_idx` (`idPerfil`),
  CONSTRAINT `trabajador_centro_FK` FOREIGN KEY (`idCentro`) REFERENCES `centros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `trabajador_perfil_FK` FOREIGN KEY (`idPerfil`) REFERENCES `perfiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajadores`
--

LOCK TABLES `trabajadores` WRITE;
/*!40000 ALTER TABLE `trabajadores` DISABLE KEYS */;
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
  `fecha` datetime NOT NULL,
  `horaInicio` datetime NOT NULL,
  `horaFin` datetime NOT NULL,
  `dniTrabajador` varchar(9) NOT NULL,
  `idAusencia` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ausencia_fk_idx` (`idAusencia`),
  KEY `trabajador_FK_idx` (`dniTrabajador`),
  CONSTRAINT `ta_ausencia_FK` FOREIGN KEY (`idAusencia`) REFERENCES `ausencias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ta_trabajador_FK` FOREIGN KEY (`dniTrabajador`) REFERENCES `trabajadores` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE
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
  CONSTRAINT `vehiculo_centro_FK` FOREIGN KEY (`idCentro`) REFERENCES `centros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculos`
--

LOCK TABLES `vehiculos` WRITE;
/*!40000 ALTER TABLE `vehiculos` DISABLE KEYS */;
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
  `horaInicio` datetime NOT NULL,
  `horaFin` datetime NOT NULL,
  `origen` varchar(45) NOT NULL,
  `destino` varchar(45) NOT NULL,
  `kilometrosInicial` double NOT NULL,
  `kilometrosFinal` double NOT NULL,
  `albaran` varchar(45) NOT NULL,
  `idPartelogistica` int(11) NOT NULL,
  `idVehiculo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parteLogistikafk_idx` (`idPartelogistica`),
  KEY `vehiculofk_idx` (`idVehiculo`),
  CONSTRAINT `viajes_pl_FK` FOREIGN KEY (`idPartelogistica`) REFERENCES `parteslogistica` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `viajes_vehiculo_FK` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `viajes`
--

LOCK TABLES `viajes` WRITE;
/*!40000 ALTER TABLE `viajes` DISABLE KEYS */;
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

-- Dump completed on 2016-02-29  9:46:49
