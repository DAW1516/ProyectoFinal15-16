CREATE DATABASE  IF NOT EXISTS `himevico` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `himevico`;
-- MySQL dump 10.13  Distrib 5.6.19, for osx10.7 (i386)
--
-- Host: 127.0.0.1    Database: himevico
-- ------------------------------------------------------
-- Server version	5.5.40

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
-- Table structure for table `centros`
--

DROP TABLE IF EXISTS `centros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `centros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEmpresa` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `localizacion` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `empresafk_idx` (`idEmpresa`),
  CONSTRAINT `centro_empresa_FK` FOREIGN KEY (`idEmpresa`) REFERENCES `empresas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  CONSTRAINT `ca_ausencia_FK` FOREIGN KEY (`idAusencia`) REFERENCES `ausencia` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `ca_horaciosconvenios_FK` FOREIGN KEY (`idHorasConvenio`) REFERENCES `horasconvenios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Table structure for table `franjas`
--

DROP TABLE IF EXISTS `franjas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `franjas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `horaInicio` datetime NOT NULL,
  `horaFin` datetime NOT NULL,
  `idTipo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_franjas_tipos1_idx` (`idTipo`),
  CONSTRAINT `fk_franjas_tipos1` FOREIGN KEY (`idTipo`) REFERENCES `tipos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `horariopartes`
--

DROP TABLE IF EXISTS `horariopartes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horariopartes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entrada` datetime NOT NULL,
  `salida` datetime NOT NULL,
  `idPartesProduccion` int(11) NOT NULL,
  PRIMARY KEY (`id`,`idPartesProduccion`),
  KEY `fk_horarioPartes_partesproduccion1_idx` (`idPartesProduccion`),
  CONSTRAINT `fk_horarioPartes_partesproduccion1` FOREIGN KEY (`idPartesProduccion`) REFERENCES `partesproduccion` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  CONSTRAINT `hf_franja_FK` FOREIGN KEY (`idFranja`) REFERENCES `franjas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `hf_horario_FK` FOREIGN KEY (`idHorario`) REFERENCES `horarios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  CONSTRAINT `ht_horario_FK` FOREIGN KEY (`idHorario`) REFERENCES `horarios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `ht_trabjadores_FK` FOREIGN KEY (`dniTrabajador`) REFERENCES `trabajadores` (`dni`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  CONSTRAINT `hc_centro_FK` FOREIGN KEY (`idCentro`) REFERENCES `centros` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  CONSTRAINT `login_trabajador_FK` FOREIGN KEY (`dniTrabajador`) REFERENCES `trabajadores` (`dni`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `parteslogistica`
--

DROP TABLE IF EXISTS `parteslogistica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parteslogistica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dniTrabajador` varchar(9) NOT NULL,
  `idEstado` int(11) NOT NULL,
  `nota` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `trabajadorfk_idx` (`dniTrabajador`),
  KEY `pl_estado_fk_idx` (`idEstado`),
  CONSTRAINT `pl_estado_fk` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pl_trabajador_FK` FOREIGN KEY (`dniTrabajador`) REFERENCES `trabajadores` (`dni`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `partesproduccion`
--

DROP TABLE IF EXISTS `partesproduccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partesproduccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `incidencia` VARCHAR(255) NULL,
  `autopista` DOUBLE DEFAULT NULL,
  `dieta` DOUBLE DEFAULT NULL,
  `otroGasto` DOUBLE DEFAULT NULL,
  `idEstado` int(11) NOT NULL,
  `dniTrabajador` varchar(9) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Partesproduccion_trabajadores_FK_idx` (`dniTrabajador`),
  KEY `pp_estado_FK_idx` (`idEstado`),
  CONSTRAINT `pp_estado_FK` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pp_trabajadores_FK` FOREIGN KEY (`dniTrabajador`) REFERENCES `trabajadores` (`dni`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  CONSTRAINT `ppt_pp_FK` FOREIGN KEY (`idParteProduccion`) REFERENCES `partesproduccion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ppt_tareas_FK` FOREIGN KEY (`idTareas`) REFERENCES `tareas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  CONSTRAINT `perfiles_horasconvenio_FK` FOREIGN KEY (`idHorasConvenio`) REFERENCES `horasconvenios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  CONSTRAINT `tareas_tipostareas_FK` FOREIGN KEY (`idTipoTarea`) REFERENCES `tipostarea` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`dni`),
  KEY `centrofk_idx` (`idCentro`),
  KEY `perfilfk_idx` (`idPerfil`),
  CONSTRAINT `trabajador_centro_FK` FOREIGN KEY (`idCentro`) REFERENCES `centros` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `trabajador_perfil_FK` FOREIGN KEY (`idPerfil`) REFERENCES `perfiles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  CONSTRAINT `ta_ausencia_FK` FOREIGN KEY (`idAusencia`) REFERENCES `ausencia` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `ta_trabajador_FK` FOREIGN KEY (`dniTrabajador`) REFERENCES `trabajadores` (`dni`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  CONSTRAINT `vehiculo_centro_FK` FOREIGN KEY (`idCentro`) REFERENCES `centros` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `idVehiculo` int(11) NOT NULL,
  `idParte` int(11) NOT NULL,
  `albaran` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parteLogistikafk_idx` (`idParte`),
  KEY `vehiculofk_idx` (`idVehiculo`),
  CONSTRAINT `viajes_pl_FK` FOREIGN KEY (`idParte`) REFERENCES `parteslogistica` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `viajes_vehiculo_FK` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculos` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping events for database 'himevico'
--

--
-- Dumping routines for database 'himevico'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-01  9:08:28
