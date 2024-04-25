-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: house_renting_secvice
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `u_email` varchar(255) NOT NULL,
  PRIMARY KEY (`u_email`),
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`u_email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `charges`
--

DROP TABLE IF EXISTS `charges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `charges` (
  `flat_id` int(11) NOT NULL,
  `rent1` int(11) DEFAULT NULL,
  `service` int(11) DEFAULT NULL,
  `gas2` int(11) DEFAULT NULL,
  `water2` int(11) DEFAULT NULL,
  `parking2` int(11) DEFAULT NULL,
  `llreg_email` varchar(255) NOT NULL,
  PRIMARY KEY (`flat_id`),
  KEY `llreg_email` (`llreg_email`),
  CONSTRAINT `charges_ibfk_1` FOREIGN KEY (`flat_id`) REFERENCES `flat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `charges_ibfk_2` FOREIGN KEY (`llreg_email`) REFERENCES `flat` (`llreg_email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `charges`
--

LOCK TABLES `charges` WRITE;
/*!40000 ALTER TABLE `charges` DISABLE KEYS */;
INSERT INTO `charges` VALUES (1,10000,0,0,0,0,'xy@gmail.com');
/*!40000 ALTER TABLE `charges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facility`
--

DROP TABLE IF EXISTS `facility`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facility` (
  `flat_id` int(11) NOT NULL,
  `no_of_bedrooms` int(11) NOT NULL,
  `drawing` varchar(255) NOT NULL,
  `dinning` varchar(255) NOT NULL,
  `combined` varchar(255) DEFAULT NULL,
  `gas1` varchar(255) NOT NULL,
  `lift` varchar(255) NOT NULL,
  `parking1` varchar(255) NOT NULL,
  `llreg_email` varchar(255) NOT NULL,
  PRIMARY KEY (`flat_id`),
  KEY `llreg_email` (`llreg_email`),
  CONSTRAINT `facility_ibfk_1` FOREIGN KEY (`flat_id`) REFERENCES `flat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `facility_ibfk_2` FOREIGN KEY (`llreg_email`) REFERENCES `flat` (`llreg_email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facility`
--

LOCK TABLES `facility` WRITE;
/*!40000 ALTER TABLE `facility` DISABLE KEYS */;
INSERT INTO `facility` VALUES (1,2,'yes','yes','yes','yes','no','no','xy@gmail.com');
/*!40000 ALTER TABLE `facility` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flat`
--

DROP TABLE IF EXISTS `flat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `available_status` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `floor_no` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `llreg_email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `llreg_email` (`llreg_email`),
  CONSTRAINT `flat_ibfk_1` FOREIGN KEY (`llreg_email`) REFERENCES `landlord` (`reg_email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flat`
--

LOCK TABLES `flat` WRITE;
/*!40000 ALTER TABLE `flat` DISABLE KEYS */;
INSERT INTO `flat` VALUES (1,'yes','Badda',1,100,'xy@gmail.com');
/*!40000 ALTER TABLE `flat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `landlord`
--

DROP TABLE IF EXISTS `landlord`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `landlord` (
  `reg_email` varchar(255) NOT NULL,
  PRIMARY KEY (`reg_email`),
  CONSTRAINT `landlord_ibfk_1` FOREIGN KEY (`reg_email`) REFERENCES `regular_user` (`u_email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `landlord`
--

LOCK TABLES `landlord` WRITE;
/*!40000 ALTER TABLE `landlord` DISABLE KEYS */;
INSERT INTO `landlord` VALUES ('xy@gmail.com');
/*!40000 ALTER TABLE `landlord` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reg_user_phone_no`
--

DROP TABLE IF EXISTS `reg_user_phone_no`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reg_user_phone_no` (
  `reg_email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  PRIMARY KEY (`reg_email`,`phone_no`),
  CONSTRAINT `reg_user_phone_no_ibfk_1` FOREIGN KEY (`reg_email`) REFERENCES `regular_user` (`u_email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reg_user_phone_no`
--

LOCK TABLES `reg_user_phone_no` WRITE;
/*!40000 ALTER TABLE `reg_user_phone_no` DISABLE KEYS */;
INSERT INTO `reg_user_phone_no` VALUES ('ab@gmail.com','01612429392'),('ab@gmail.com','01812423090'),('saibnabil@gmail.com','01712423096'),('xy@gmail.com','01912423092');
/*!40000 ALTER TABLE `reg_user_phone_no` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regular_user`
--

DROP TABLE IF EXISTS `regular_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regular_user` (
  `u_email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  PRIMARY KEY (`u_email`),
  CONSTRAINT `regular_user_ibfk_1` FOREIGN KEY (`u_email`) REFERENCES `user` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regular_user`
--

LOCK TABLES `regular_user` WRITE;
/*!40000 ALTER TABLE `regular_user` DISABLE KEYS */;
INSERT INTO `regular_user` VALUES ('ab@gmail.com','ab',13,'female'),('saibnabil@gmail.com','SaibNabil',22,'male'),('xy@gmail.com','xy',30,'male');
/*!40000 ALTER TABLE `regular_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room` (
  `f_id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `rent2` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `washroom` varchar(255) NOT NULL,
  `balcony` varchar(255) NOT NULL,
  `llreg_email` varchar(255) NOT NULL,
  `washroom_type` varchar(255) NOT NULL,
  PRIMARY KEY (`f_id`,`room_no`),
  KEY `llreg_email` (`llreg_email`),
  CONSTRAINT `room_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `flat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `room_ibfk_2` FOREIGN KEY (`llreg_email`) REFERENCES `flat` (`llreg_email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` VALUES (1,1,'Bedroom',NULL,NULL,'yes','yes','xy@gmail.com','High'),(1,2,'Drawing & Dinning',NULL,NULL,'yes','no','xy@gmail.com','High');
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('ab@gmail.com','$2y$10$20eZc9C4ggDoX6pczG9n7uCCXPDXLVqDpz1L/aw8NVARbhmq8.HMi','$2y$10$T7ZBRbTU/OaGCmI02Gqs7OcfAlLUiF4nPLqcCaHIJYJ8BfZsziL7q','ff7c0edf0e9311949789b1a8bfa1b4'),('saibnabil@gmail.com','$2y$10$17GpQbpV8TaFyA5WOj4w9.SG/IIX7wvlm5/GRe5aV7hi6gTwDSKn6','$2y$10$.CLlth/lzAAd6Yw5JvFK9.yO18GfeRloJ7PxtjmVZcl0tcT1lhMGe','fae01d2cb6fd32d9e66060c22f46eb'),('xy@gmail.com','$2y$10$/Tevs2b14EB.DupCOgi.YOsTVNE89Xy6K3CAavS9oI7QvbM2NmUfS','$2y$10$ET0KFLaxewqqXpBDjecpgej/HUd7ANYp6tlcCDRiEzXqsfceJSt0i','40e32a431d4264233e6441338e45a4');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-25 12:36:12
