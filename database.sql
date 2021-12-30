-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: veiculos_cindapa
-- ------------------------------------------------------
-- Server version	8.0.27-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_characteristics`
--

DROP TABLE IF EXISTS `vehicle_characteristics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicle_characteristics` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `vehicle_id` int unsigned NOT NULL,
  `characteristic` enum('sport','classic','economic','turbo','city','distant_travels') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `_idx` (`vehicle_id`),
  CONSTRAINT `` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_characteristics`
--

LOCK TABLES `vehicle_characteristics` WRITE;
/*!40000 ALTER TABLE `vehicle_characteristics` DISABLE KEYS */;
INSERT INTO `vehicle_characteristics` VALUES (102,1,'economic'),(103,1,'city'),(104,3,'sport'),(105,3,'turbo'),(106,3,'distant_travels'),(107,4,'sport'),(108,4,'city'),(111,9,'sport'),(112,9,'turbo'),(113,9,'city'),(114,11,'sport'),(115,11,'city'),(116,10,'economic'),(117,10,'city'),(118,12,'economic'),(119,12,'city'),(120,13,'economic'),(121,13,'city'),(122,14,'economic'),(123,14,'city'),(124,15,'turbo'),(125,15,'distant_travels'),(126,16,'classic'),(127,16,'city');
/*!40000 ALTER TABLE `vehicle_characteristics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `chassis_number` varchar(17) NOT NULL,
  `brand` varchar(32) NOT NULL,
  `model` varchar(32) NOT NULL,
  `year` year NOT NULL,
  `plate` varchar(7) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chassis_number_UNIQUE` (`chassis_number`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicles`
--

LOCK TABLES `vehicles` WRITE;
/*!40000 ALTER TABLE `vehicles` DISABLE KEYS */;
INSERT INTO `vehicles` VALUES (1,'34k32io4h4j2gui43','Fiat','Ciao',2012,'AAB3W75'),(3,'i24h2489h2482jk24','Audi','R8',2022,'AKJ2K25'),(4,'53jh53jh35jh35jkh','Honda','Civic',2012,'LFW2581'),(9,'42jg42jg24jg24jg2','Audi','R8',2013,'AKT2052'),(10,'j43h63jh63jkh63jk','Honda','Civic',2012,'FKT2562'),(11,'5kh52gfh255k252at','Ford','K',2012,'FKC5K24'),(12,'5j3g2552poj52h52i','Fiat','Ciao',2017,'FJW2P24'),(13,'5kh5hjk53hjk35hj3','Volkswagen','Gol',2015,'FOW5925'),(14,'3kh35jh53jh35jk35','Fiat','Palio',2014,'OTW4253'),(15,'hf543jjkl53hbj53k','Ford','Onix',2018,'ORR2052'),(16,'khkj2hjk2h42jkh24','Volkswagen','Gol',2010,'KJF2526');
/*!40000 ALTER TABLE `vehicles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-30 12:40:43
