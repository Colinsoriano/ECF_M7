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
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_application` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `chefDeProjet`
--

DROP TABLE IF EXISTS `chefDeProjet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chefDeProjet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `boost_production` int DEFAULT NULL,
  `id_collaborateur` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_chefdeprojet` (`id`),
  KEY `chef_de_projet_collaborateur_id_chefdeprojet_fk` (`id_collaborateur`),
  CONSTRAINT `chef_de_projet_collaborateur_id_chefdeprojet_fk` FOREIGN KEY (`id_collaborateur`) REFERENCES `collaborateur` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  CONSTRAINT `equipe_chef_de_projet_id_fk` FOREIGN KEY (`id_chefdeprojet`) REFERENCES `chefDeProjet` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `nom` varchar(25) NOT NULL,
  `type` enum('1','2','3') NOT NULL,
  `id_application` int DEFAULT NULL,
  `id_module` int DEFAULT NULL,
  `id_composant` int DEFAULT NULL,
  `prix` int NOT NULL,
  `statut` enum('0','1','2','3','4') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `projet_application_id_fk` (`id_application`),
  KEY `projet_chefDeProjet_id_fk` (`id_chefdeprojet`),
  KEY `projet_client_id_client_fk` (`id_client`),
  KEY `projet_composant_id_fk` (`id_composant`),
  KEY `projet_developpeur_id_fk` (`id_developpeur`),
  KEY `projet_module_id_fk` (`id_module`),
  CONSTRAINT `projet_application_id_fk` FOREIGN KEY (`id_application`) REFERENCES `application` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `projet_chefDeProjet_id_fk` FOREIGN KEY (`id_chefdeprojet`) REFERENCES `chefDeProjet` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `projet_client_id_client_fk` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON UPDATE CASCADE,
  CONSTRAINT `projet_composant_id_fk` FOREIGN KEY (`id_composant`) REFERENCES `composant` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `projet_developpeur_id_fk` FOREIGN KEY (`id_developpeur`) REFERENCES `developpeur` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `projet_module_id_fk` FOREIGN KEY (`id_module`) REFERENCES `module` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-03 16:15:28
