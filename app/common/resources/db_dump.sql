-- MySQL dump 10.13  Distrib 8.0.33, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: ECF_C7
-- ------------------------------------------------------
-- Server version	8.0.33-0ubuntu0.20.04.2

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
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `application` (
  `id` int NOT NULL,
  `libelle` varchar(25) NOT NULL,
  `id_client` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_application` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application`
--

LOCK TABLES `application` WRITE;
/*!40000 ALTER TABLE `application` DISABLE KEYS */;
/*!40000 ALTER TABLE `application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chef_de_projet`
--

DROP TABLE IF EXISTS `chef_de_projet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chef_de_projet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `boost_production` int DEFAULT NULL,
  `id_collaborateur` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_chefdeprojet` (`id`),
  CONSTRAINT `chef_de_projet_collaborateur_id_chefdeprojet_fk` FOREIGN KEY (`id`) REFERENCES `collaborateur` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chef_de_projet`
--

LOCK TABLES `chef_de_projet` WRITE;
/*!40000 ALTER TABLE `chef_de_projet` DISABLE KEYS */;
INSERT INTO `chef_de_projet` VALUES (1,10,1),(2,5,2),(3,15,3),(4,8,4),(5,12,5);
/*!40000 ALTER TABLE `chef_de_projet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `id_client` int NOT NULL AUTO_INCREMENT,
  `raison_sociale` varchar(25) NOT NULL,
  `ridet` varchar(10) NOT NULL,
  `ss2i` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_client`),
  UNIQUE KEY `id` (`id_client`),
  UNIQUE KEY `raison_sociale` (`raison_sociale`),
  UNIQUE KEY `ridet` (`ridet`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'Client A','1234567890',1),(2,'Client B','9876543210',0),(3,'Client C','5555555555',1),(4,'Client D','9999999999',0),(5,'Client E','7777777777',1);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collaborateur`
--

DROP TABLE IF EXISTS `collaborateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `collaborateur` (
  `id` int NOT NULL,
  `prenom` varchar(75) NOT NULL,
  `nom` varchar(75) DEFAULT NULL,
  `niveau_competence` enum('1','2','3') NOT NULL,
  `prime_embauche` int NOT NULL,
  PRIMARY KEY (`prenom`),
  UNIQUE KEY `prenom_nom` (`prenom`),
  UNIQUE KEY `id_chefdeprojet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collaborateur`
--

LOCK TABLES `collaborateur` WRITE;
/*!40000 ALTER TABLE `collaborateur` DISABLE KEYS */;
INSERT INTO `collaborateur` VALUES (2,'Alice','MARTIN','2',800),(1,'Jean','DUPONT','1',500),(3,'Paul','LEFEVRE','3',1200),(4,'Sophie','LECLERC','2',750),(5,'Thomas','DUBOIS','1',550);
/*!40000 ALTER TABLE `collaborateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `composant`
--

DROP TABLE IF EXISTS `composant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `composant` (
  `id` int NOT NULL,
  `id_module` int DEFAULT NULL,
  `libelle` varchar(25) NOT NULL,
  `charge` int NOT NULL,
  `progression` int DEFAULT NULL,
  `type` enum('1','2','3') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_competence` (`id`),
  KEY `composant_module_id_fk` (`id_module`),
  CONSTRAINT `composant_module_id_fk` FOREIGN KEY (`id_module`) REFERENCES `module` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `composant`
--

LOCK TABLES `composant` WRITE;
/*!40000 ALTER TABLE `composant` DISABLE KEYS */;
/*!40000 ALTER TABLE `composant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `composition_equipe`
--

DROP TABLE IF EXISTS `composition_equipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `composition_equipe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_equipe` int DEFAULT NULL,
  `id_developpeur` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `composition_equipe_developpeur_id_fk` (`id_developpeur`),
  KEY `composition_equipe_equipe_id_fk` (`id_equipe`),
  CONSTRAINT `composition_equipe_developpeur_id_fk` FOREIGN KEY (`id_developpeur`) REFERENCES `developpeur` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `composition_equipe_equipe_id_fk` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `composition_equipe`
--

LOCK TABLES `composition_equipe` WRITE;
/*!40000 ALTER TABLE `composition_equipe` DISABLE KEYS */;
/*!40000 ALTER TABLE `composition_equipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `developpeur`
--

DROP TABLE IF EXISTS `developpeur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `developpeur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_collaborateur` int DEFAULT NULL,
  `indice_production` int NOT NULL,
  `competence` enum('1','2','3') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_developpeur` (`id`),
  KEY `developpeur_collaborateur_id_fk` (`id_collaborateur`),
  CONSTRAINT `developpeur_collaborateur_id_fk` FOREIGN KEY (`id_collaborateur`) REFERENCES `collaborateur` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `developpeur`
--

LOCK TABLES `developpeur` WRITE;
/*!40000 ALTER TABLE `developpeur` DISABLE KEYS */;
INSERT INTO `developpeur` VALUES (1,1,80,'2'),(2,2,95,'3'),(3,3,70,'1'),(4,4,85,'2'),(5,5,60,'1');
/*!40000 ALTER TABLE `developpeur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_chefdeprojet` int NOT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `equipe_chef_de_projet_id_fk` (`id_chefdeprojet`),
  CONSTRAINT `equipe_chef_de_projet_id_fk` FOREIGN KEY (`id_chefdeprojet`) REFERENCES `chef_de_projet` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipe`
--

LOCK TABLES `equipe` WRITE;
/*!40000 ALTER TABLE `equipe` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `module` (
  `id` int NOT NULL,
  `id_application` int DEFAULT NULL,
  `libelle` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_module` (`id`),
  KEY `module_application_id_fk` (`id_application`),
  CONSTRAINT `module_application_id_fk` FOREIGN KEY (`id_application`) REFERENCES `application` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module`
--

LOCK TABLES `module` WRITE;
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
/*!40000 ALTER TABLE `module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projet`
--

DROP TABLE IF EXISTS `projet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_client` int NOT NULL,
  `id_developpeur` int DEFAULT NULL,
  `id_chefdeprojet` int DEFAULT NULL,
  `type` enum('1','2','3') NOT NULL,
  `id_application` int DEFAULT NULL,
  `id_module` int DEFAULT NULL,
  `id_composant` int DEFAULT NULL,
  `prix` int NOT NULL,
  `statut` enum('0','1','2','3','4') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projet`
--

LOCK TABLES `projet` WRITE;
/*!40000 ALTER TABLE `projet` DISABLE KEYS */;
INSERT INTO `projet` VALUES (1,1,NULL,NULL,'1',NULL,NULL,NULL,1000,'0'),(2,2,NULL,NULL,'2',NULL,NULL,NULL,3000,'0'),(3,3,NULL,NULL,'3',NULL,NULL,NULL,5000,'0');
/*!40000 ALTER TABLE `projet` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-13 17:19:46
