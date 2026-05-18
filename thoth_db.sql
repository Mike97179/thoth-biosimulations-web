-- MySQL dump 10.13  Distrib 8.0.45, for Win64 (x86_64)
--
-- Host: localhost    Database: thoth_db
-- ------------------------------------------------------
-- Server version	8.0.45

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
-- Table structure for table `careers`
--

DROP TABLE IF EXISTS `careers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `careers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `department` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `requirements` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `careers`
--

LOCK TABLES `careers` WRITE;
/*!40000 ALTER TABLE `careers` DISABLE KEYS */;
INSERT INTO `careers` VALUES (1,'Senior Computational Chemist','Computational Chemistry','Full-time','Edmonton, Alberta','Lead the development of new molecular simulation methods and validate computational results against experimental data.','PhD in Computational Chemistry or Biochemistry, 5+ years experience with molecular simulation software.',1),(2,'Machine Learning Engineer','AI Research','Full-time','Remote / Edmonton','Design and implement generative models for molecular design at the intersection of deep learning and computational chemistry.','MSc or PhD in Machine Learning or related field, experience with PyTorch or TensorFlow.',1),(3,'Bioinformatics Research Intern','Bioinformatics','Internship','Remote','Support genomics and transcriptomics analysis pipelines for target identification in oncology programs.','Currently enrolled in BSc or MSc in Bioinformatics or related field.',1);
/*!40000 ALTER TABLE `careers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faqs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `numOrder` int unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` VALUES (1,'What is computational drug discovery?','Computational drug discovery uses algorithms and molecular simulations to identify and optimize drug candidates before laboratory experiments, reducing time and cost.',1,1),(2,'How does the Thoth platform work?','Our platform integrates graph neural networks, molecular dynamics simulations, and ADMET predictors to evaluate candidate compounds rapidly.',2,1),(3,'Do you offer academic partnerships?','Yes. We actively collaborate with academic institutions and research hospitals under both fee-for-service and co-development models.',3,1);
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(50) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Thoth Bio at AACR Annual Meeting 2026','Our team will present new findings on AI-generated kinase inhibitors at the upcoming AACR conference in San Diego.','Our team will present new findings on AI-generated kinase inhibitors at the upcoming AACR Annual Meeting in San Diego. This conference brings together leading cancer researchers from around the world.','news_01.webp','Conference',1,'2026-02-19'),(2,'Thoth Bio Publishes Breakthrough in Multi-Objective Molecular Optimization','Our latest research demonstrates a novel approach to simultaneously optimizing drug efficacy, selectivity, and ADMET properties.','We are proud to announce the publication of our latest research paper in the Journal of Chemical Information and Modeling. This work introduces a novel multi-objective optimization framework.','news_02.webp','Publication',1,'2026-03-14');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partners`
--

DROP TABLE IF EXISTS `partners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `partners` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `logo` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `numOrder` int unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partners`
--

LOCK TABLES `partners` WRITE;
/*!40000 ALTER TABLE `partners` DISABLE KEYS */;
INSERT INTO `partners` VALUES (1,'Alberta Innovates','Leading provincial agency supporting innovation and research in Alberta.','AI.webp','https://albertainnovates.ca',1,1),(2,'Genome Alberta','Genomics research organization advancing precision medicine in Canada.','GA.webp','https://genomealberta.ca',2,1),(3,'Health Innovation Hub','Accelerating health innovation through partnerships and investment.','HIH_logo.webp','https://hih.ca',3,1),(4,'Technology Access Program','Supporting SMEs with access to research facilities and expertise.','TAP.webp','https://nrc.canada.ca',4,1),(5,'Scale-up Canada','Helping Canadian companies scale their innovations globally.','Sclae-up-Canada.webp','https://scaleupcanada.ca',5,1);
/*!40000 ALTER TABLE `partners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `team` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `bio` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `founder` tinyint(1) NOT NULL DEFAULT '0',
  `numOrder` int unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (1,'Dr. Khaled Barakat','Founder & CEO','Computational chemist with 15+ years of experience in AI-driven drug discovery. Founded Thoth BioSimulations to bridge the gap between artificial intelligence and molecular design.','KB.webp','https://www.linkedin.com/in/khaled-barakat-21916140/',1,1,1),(2,'Dr. Sarah Kim','Lead Computational Chemist','Expert in molecular dynamics and free energy calculations for drug binding.','sarah_kim.webp','https://linkedin.com/in/sarah-kim',0,2,1),(3,'Dr. Marco Rossi','Bioinformatics Lead','Specialist in multi-omics data integration and target identification pipelines.','marco_rossi.webp','https://linkedin.com/in/marco-rossi',0,3,1);
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tickets` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `organization` varchar(100) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `message` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'new',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_ticket_user` (`user_id`),
  CONSTRAINT `fk_ticket_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (1,NULL,'Dr. Sarah Johnson','sarah.johnson@pharmalab.com','PharmaCorp Labs','Drug Discovery','Estamos interesados en integrar Thoth BioSimulations en nuestro pipeline de descubrimiento. ¿Cuál es el costo de la licencia empresarial?','new','2026-05-17 14:00:44'),(2,NULL,'Prof. Michael Chen','m.chen@university.edu','University Research Group','Academic','Excelente herramienta para nuestro grupo de investigación. Nos gustaría discutir un acuerdo académico.','read','2026-05-17 14:00:44'),(3,NULL,'Emma Rodriguez','emma@biotech.io','Biotech IO','Technical Support','¿Hay soporte técnico disponible para usuarios empresariales? Necesitamos asistencia en tiempo real.','replied','2026-05-17 14:00:44');
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tools`
--

DROP TABLE IF EXISTS `tools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tools` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(50) NOT NULL,
  `category` varchar(100) NOT NULL,
  `numOrder` int unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tools`
--

LOCK TABLES `tools` WRITE;
/*!40000 ALTER TABLE `tools` DISABLE KEYS */;
INSERT INTO `tools` VALUES (1,'Molecular Modeling','Physics-based molecular dynamics simulations, energy minimization, and conformational analysis for understanding molecular behavior and interactions at atomic resolution.','atom','Molecular Modeling',1,1),(2,'AI-Based Drug Design','Generative deep learning models that design novel molecular scaffolds optimized for target affinity, selectivity, and drug-likeness properties.','brain','Drug Design',2,1),(3,'Protein Structure Prediction','AI-powered prediction of three-dimensional protein structures from amino acid sequences, enabling structure-based drug design campaigns.','layers','Protein Prediction',3,1),(4,'Bioinformatics Pipelines','Automated workflows for genomic analysis, transcriptomics, and multi-omics data integration for target identification and validation.','dna','Bioinformatics',4,1),(5,'Binding Affinity Prediction','Machine learning models trained on experimental data to predict ligand-protein binding affinities and selectivity profiles with high accuracy.','activity','Binding Affinity',5,1),(6,'Chemical Space Explorer','High-dimensional analysis and visualization of chemical libraries, enabling efficient navigation of vast molecular design spaces.','database','Molecular Modeling',6,1);
/*!40000 ALTER TABLE `tools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Thoth','Admin','admin@thothbio.com','$2y$12$kTIx/mTcBHTK2zdZt9UHo.d3S8SADVFfztXX0t4SJs6XFsU83oysi','admin',1,NULL,'2026-05-17 13:56:47');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-05-17 10:40:12
