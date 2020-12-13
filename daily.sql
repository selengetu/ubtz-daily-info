-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: daily
-- ------------------------------------------------------
-- Server version	5.7.31

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
-- Table structure for table `daily_info`
--

DROP TABLE IF EXISTS `daily_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `daily_info` (
  `info_id` int(11) NOT NULL AUTO_INCREMENT,
  `executor_id` int(11) DEFAULT NULL,
  `self_room` int(11) DEFAULT NULL,
  `self_plot` int(11) DEFAULT NULL,
  `ex_room` int(11) DEFAULT NULL,
  `ex_plot` int(11) DEFAULT NULL,
  `ex_train` int(11) DEFAULT NULL,
  `ex_container` int(11) DEFAULT NULL,
  `loc_z` int(11) DEFAULT NULL,
  `loc_a` int(11) DEFAULT NULL,
  `loc_s` int(11) DEFAULT NULL,
  `pas_vag` int(11) DEFAULT NULL,
  `pas_teesh` int(11) DEFAULT NULL,
  `company_car` int(11) DEFAULT NULL,
  `autobus` int(11) DEFAULT NULL,
  `food_car` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `added_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daily_info`
--

LOCK TABLES `daily_info` WRITE;
/*!40000 ALTER TABLE `daily_info` DISABLE KEYS */;
INSERT INTO `daily_info` VALUES (3,31,1,NULL,1,1,1,0,5,6,6,2,2,35,67,8,'2020-12-12',NULL),(4,52,12,14,12,12,11,12,13,13,11,14,12,13,12,17,'2020-12-12',NULL),(6,31,1,2,3,1,1,1,2,2,1,1,3,3,1,1,'2020-12-05',NULL),(7,14,1,2,1,2,1,2,1,3,4,7,6,8,9,2,'2020-12-05',NULL),(8,31,1,1,1,1,1,1,1,1,1,1,1,1,1,1,'2020-12-16',NULL),(9,30,1,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-12-12',NULL),(10,85,1,1,1,1,1,1,1,1,4,NULL,NULL,NULL,NULL,NULL,'2020-12-05',NULL),(11,52,1,2,3,4,NULL,3,1,3,6,NULL,2,NULL,NULL,NULL,'2020-12-12',NULL),(12,35,2,2,3,3,4,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,33,'2020-12-19',3);
/*!40000 ALTER TABLE `daily_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `executor`
--

DROP TABLE IF EXISTS `executor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `executor` (
  `executor_id` int(11) NOT NULL,
  `executor_name` varchar(100) DEFAULT NULL,
  `executor_abbr` varchar(45) DEFAULT NULL,
  `executor_par` int(11) DEFAULT NULL,
  `ex_report_no` int(11) DEFAULT NULL,
  `executor_type` int(11) DEFAULT NULL,
  `report_no` int(11) DEFAULT NULL,
  PRIMARY KEY (`executor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `executor`
--

LOCK TABLES `executor` WRITE;
/*!40000 ALTER TABLE `executor` DISABLE KEYS */;
INSERT INTO `executor` VALUES (2,'Авто тээвэр үйлчилгээний төв','Автобааз',2,1,3,19),(3,'Аж ахуйн хэлтэс','НХО',3,1,1,8),(5,'Ачих Буулгах Тээвэр Экспедицийн Механикжсан Анги','АБТЭМА',78,13,2,3),(6,'Аялал жуулчлалын төв','АЖТ',6,1,3,24),(8,'Багануур өртөө','БН ДС',78,2,2,3),(9,'Барилга ашиглалт үйлчилгээний 1-р анги','НГЧ-1',12,1,2,7),(10,'Барилга ашиглалт үйлчилгээний 2-р анги','НГЧ-2',12,2,2,7),(11,'Барилга ашиглалт үйлчилгээний 3-р анги','НГЧ-3',12,3,2,7),(12,'Барилга орон сууцны алба','НГС',12,1,1,7),(13,'Барилга угсралтын анги','БУА',12,4,2,7),(14,'Баянбуурал','БНБ',14,1,3,21),(15,'Баянтүмэн тасаг','НОД',15,1,3,12),(16,'Бизнес үйлчилгээний Рейлком төв','РК',29,5,2,6),(18,'Вагон ашиглалтын депо','ВЧД-3',19,2,2,4),(19,'Вагоны аж ахуйн алба','В',19,1,1,4),(23,'Ганзам пресс төв','ГЗ пресс',23,1,3,20),(24,'Дархан татах хэсэг','ТЧ-1',51,2,2,2),(25,'Дархан худалдааны төв','ДРХ ХТ',181,2,2,10),(27,'Дархан өртөө','ДРХ ДС',78,3,2,3),(28,'Дотоод аудитын алба','НВА',28,3,2,99),(29,'Дохиолол холбоо, мэдээлэл эрчим хүчний алба','Ш',29,1,1,6),(30,'Дохиолол холбооны 1-р анги','ШЧ-1',29,2,2,6),(31,'Дохиолол холбооны 2-р анги','ШЧ-2',29,3,2,6),(32,'Дохиолол холбооны 3-р анги','ШЧ-3',29,4,2,6),(34,'Зам засварын машинт станц','ПДМС',40,7,2,1),(35,'Замын 1-р анги','ПЧ-1',40,2,2,1),(36,'Замын 2-р анги','ПЧ-2',40,3,2,1),(37,'Замын 3-р анги','ПЧ-3',40,4,2,1),(38,'Замын 4-р анги','ПЧ-4',40,5,2,1),(39,'Замын 6-р анги','ПЧ-6',40,6,2,1),(40,'Замын аж ахуйн алба','П',40,1,1,1),(41,'Замын даргын ажлын алба','НУ',41,2,2,99),(44,'Замын-Үүд шилжүүлэн ачих анги','ЗҮМЧ',78,4,2,3),(45,'Замын-Үүд өртөө','ЗҮ ДС',78,5,2,3),(47,'Захиргаа, удирдлагын алба','НАУ',47,4,2,99),(48,'Зорчигч тээврийн алба','Л',48,1,1,5),(49,'Зорчигч тээврийн төв','ЛПЦ',48,2,2,5),(51,'Зүтгүүрийн аж ахуйн алба','Т',51,1,1,2),(52,'Зүүнхараа дахь ачааны вагон засварын депо','ВЧД-1',19,2,2,4),(54,'Зүүнхараа өртөө','ЗХ ДС',78,6,2,3),(55,'НЧ','НЧ',55,1,3,22),(56,'Кейтринг төв','НОК',56,1,3,11),(58,'Мод боловсруулах үйлдвэр','ДОК',40,10,2,1),(60,'Мэргэжлийн сургалт үйлдвэрлэлийн төв','МСҮТ',60,1,3,26),(61,'Олон улсын тээвэр зуучлалын төв','ТЗТ',61,1,3,25),(63,'Сайншанд татах хэсэг','ТЧ-3',51,4,2,2),(64,'Сайншанд худалдааны төв','СШ ХТ',181,4,2,10),(66,'Сайншанд өртөө','СШ ДС',78,7,2,3),(68,'Соёл урлаг, спортын төв','СУСТ',68,1,3,23),(72,'Сүхбаатар өртөө','СБ ДС',78,8,2,3),(73,'Тасалбар худалдаалах төв','ТХТ',48,3,2,5),(74,'НБТ','НБТ',74,1,3,13),(76,'Толгойт өртөө','ТЛГ ДС',78,9,2,3),(77,'Төмөр замын дээд сургууль','ТЗДС',77,1,3,15),(78,'Тээвэр зохион байгуулалтын алба','Д',78,1,1,3),(80,'Төв засварын газар','ЦРМ',80,1,3,9),(81,'Төв эмнэлэг','ЦБ',81,1,3,16),(82,'Төлөвлөгөө эдийн засгийн алба','НН',82,5,2,99),(83,'Төмөр бетон дэрний үйлдвэр','ТБДҮ',40,9,2,1),(84,'УБТЗ-ын Барилга Үйлдвэрлэлийн Нэгдэл','БҮН',12,5,2,7),(85,'Улаанбаатар дахь вагон депо','ВЧД-2',48,4,2,5),(86,'Улаанбаатар татах хэсэг','ТЧ-2',51,3,2,2),(87,'Улаанбаатар худалдааны төв','УБ ХТ',181,3,2,10),(89,'Улаанбаатар өртөө','УБ ДС',78,10,2,3),(91,'Худалдан авалт борлуулалтын алба','НХ',91,1,1,28),(95,'Хүүхдийн байгууллагын хэлтэс','Дет.учр',95,1,3,17),(98,'Цэрэгжүүлсэн хамгаалалтын алба','ВОХР',98,1,3,14),(100,'Чойр өртөө','ЧР ДС',78,11,2,3),(101,'Чулуун завод','РПЗ',40,8,2,1),(103,'Эрдэнэт өртөө','ЭРД ДС',78,12,2,3),(104,'Эрчим хүч ус хангамжийн 1-р анги','ЭЧВОД-1',182,2,2,27),(105,'Эрчим хүч ус хангамжийн 2-р анги','ЭЧВОД-2',182,3,2,27),(181,'Худалдааны хэлтэс','Дорторг',181,1,1,10),(182,'Эрчим хүч ус хангамжийн төв','ЭВ',182,1,1,27);
/*!40000 ALTER TABLE `executor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$2y$10$Jslxe.B.JDTPUPdbaJXinu3Mruym8iCVyOodEA8V7BYAup.Kk//5m',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `executor_id` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_delete` int(11) DEFAULT '0',
  `is_admin` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Selenge1','selengetu@gmail.com','$2y$10$Jslxe.B.JDTPUPdbaJXinu3Mruym8iCVyOodEA8V7BYAup.Kk//5m','b5FW123w49f7vmpuOQZfgKWTkTTYbxMqlyifdVvqTQ2xarnH54VnmZDJuX4O','2020-12-11 01:56:08','2020-12-12 23:06:27','55',0,'1'),(2,'Ijilbold','ijlee@ubtz.mn','$2y$10$XjfCx11nvHK2BhtrSbucheF2kYvAHcRRsDqeJwz9YdjWTDx3eFLWO','fESGu1hhawWKkRPLW2oAdSUu8jWU8HVeRO0sbxOMDPSiyZiwHbKySlKl3YpU','2020-12-11 23:21:55','2020-12-12 23:01:32','55',0,'1'),(5,'DSP','dsp@ubtz.mn','$2y$10$XjfCx11nvHK2BhtrSbucheF2kYvAHcRRsDqeJwz9YdjWTDx3eFLWO','VswbrxLkfrV6ILGcseLNIXaC9TBs2LlYlLRVDXJYZGCDGPzjcbhgwYtBnz1F','2020-12-12 22:57:33','2020-12-12 22:57:33','55',0,'1'),(6,'test','test@ubtz.mn','$2y$10$Jslxe.B.JDTPUPdbaJXinu3Mruym8iCVyOodEA8V7BYAup.Kk//5m',NULL,'2020-12-12 23:07:32','2020-12-12 23:07:32','40',0,'0');
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

-- Dump completed on 2020-12-13 15:08:47
