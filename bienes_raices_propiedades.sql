-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: bienes_raices
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `propiedades`
--

DROP TABLE IF EXISTS `propiedades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `propiedades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vendedorId` int DEFAULT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `descripcion` longtext,
  `habitaciones` int DEFAULT NULL,
  `wc` int DEFAULT NULL,
  `estacionamiento` int DEFAULT NULL,
  `creado` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_propiedades_vendedores` (`vendedorId`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propiedades`
--

LOCK TABLES `propiedades` WRITE;
/*!40000 ALTER TABLE `propiedades` DISABLE KEYS */;
INSERT INTO `propiedades` VALUES (20,1,'Casa en el lago',7500000.00,'5141d1be6ddbede2ecaeba0d8a4475ee.jpg','Casa en el lago con excelente vista, acabados de lujo a un excelente precio.',3,4,4,'2024-01-15'),(21,1,'Casa terminados de lujo',20000000.00,'5de53fe7da46b17c81e52ce29132cbe4.jpg','Casa con acabados de lujo en locación privilegiada de la ciudad.',7,6,6,'2024-01-15'),(22,2,'Casa con alberca',30000000.00,'07337c201d6388fc97c8b8273ed7766a.jpg','Casa con alberca, con excelentes vistas y acabados de lujo a excelente precio.',8,9,5,'2024-01-15'),(23,1,'Casa en el bosque',15000000.00,'0c329095fb260248510619b4d2dfb474.jpg','Increíble casa en el bosque con interacción directa con  la naturaleza, cerca de la ciudad.',4,4,2,'2024-01-15'),(32,2,'Hermosa casa en la playa - Oferta',5000000.00,'93562c9a0b41410eceb85b2f4ab6dfac.jpg','Hermosa casa en la playaHermosa casa en la playaHermosa casa en la playaHermosa casa en la playaHermosa casa en la playaHermosa casa en la playa',4,1,3,'2024-02-01'),(37,1,'Test - Actualizado',5500000.00,'d1438630918c6aa2a9929d3c292fc28c.jpg','TestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTest - Actualizado',3,2,1,'2024-02-02'),(45,1,'Test',123.00,'f1ea267f48d0395056586812c47b6a70.jpg','qe qe qe qe qe qe qe qe qe qe qe qe qe qe qe qe qe qe qe qe qe qe qe qe qe qe qe qe qe qe qe qe qe qe qe qe ',1,2,3,'2024-03-28');
/*!40000 ALTER TABLE `propiedades` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-29 17:03:17
