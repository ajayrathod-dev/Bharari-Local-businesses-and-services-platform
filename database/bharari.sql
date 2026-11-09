-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: bharari
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
-- Table structure for table `add_qty_log`
--

DROP TABLE IF EXISTS `add_qty_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `add_qty_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) DEFAULT NULL,
  `main_cat` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `cost_per_unit` decimal(10,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `by` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `add_qty_log`
--

LOCK TABLES `add_qty_log` WRITE;
/*!40000 ALTER TABLE `add_qty_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `add_qty_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `unit_rate` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','1234',0);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner`
--

LOCK TABLES `banner` WRITE;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` VALUES (1,'42202526051017490871.png','42202526051017916263.png','42202526051017679137.png','2025-10-17 12:12:26'),(2,'38202552011103125070.png','38202552011103550462.png','38202552011103854783.png','2025-11-03 08:08:52'),(3,'07202536051103848987.png','07202536051103764698.png','07202536051103168389.png','2025-11-03 11:37:36'),(4,'1820250406110314501.jpg','18202504061103128565.png','18202504061103410633.png','2025-11-03 12:48:04'),(5,'50202540061213221731.jpg','50202540061213516197.png','50202540061213209921.jpg','2025-12-13 13:20:40');
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `business_gallery`
--

DROP TABLE IF EXISTS `business_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `business_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `caption` text DEFAULT NULL,
  `uploaded_by` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business_gallery`
--

LOCK TABLES `business_gallery` WRITE;
/*!40000 ALTER TABLE `business_gallery` DISABLE KEYS */;
INSERT INTO `business_gallery` VALUES (7,1,'25202558071119_664787.jpg','Test','8788897048','2025-11-19 13:55:58');
/*!40000 ALTER TABLE `business_gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `main_cat` varchar(255) NOT NULL,
  `sub_cat` varchar(200) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `vender_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT NULL,
  `prod_id` int(255) NOT NULL DEFAULT 0,
  `unit` varchar(255) DEFAULT NULL,
  `weight_per_kg` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (1,'Lipstick','women special','8788897020','','78','0','9607170795','0','hkjh','Incart','2025-10-28 11:14:29','33202530041028989215.png',1,'2','piece');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_type` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (3,'Fruits and vegetables ','Goods','55202537021018279350.jpeg','2025-10-18 09:12:04'),(4,'Grocery ','Goods','50202540021018253079.jpeg','2025-10-18 09:20:40'),(5,'Electronics ','Goods','15202538061207471036.jpg','2025-10-18 09:30:49'),(6,'Furniture ','Goods','17202548061207701137.jpg','2025-10-18 09:33:20'),(7,'Stationery store ','Goods','12202527031018404718.jpeg','2025-10-18 09:42:27'),(9,'Medicines ','Goods','28202517031018832425.jpeg','2025-10-18 09:58:17'),(11,'Beauty parlours ','Services','32202516031018275096.jpeg','2025-10-18 10:02:16'),(12,'Salons ','Services','35202547031018387828.jpeg','2025-10-18 10:05:47'),(13,'Electrician ','Services','39202547031018871803.jpeg','2025-10-18 10:09:47'),(14,'Plumber ','Services','28202514021201231173.jpeg','2025-10-18 10:11:28'),(15,'Dairy products ','Goods','19202506061207651334.jpg','2025-10-18 10:18:04'),(16,'Automobile ','Goods','14202548041018954878.jpeg','2025-10-18 10:44:48'),(17,'Automobile accessories ','Goods','17202551041018413675.jpeg','2025-10-18 10:47:51'),(18,'Agriculture ','Goods','55202512081018480061.jpeg','2025-10-18 15:25:12'),(19,'Clothing & fashion ','Goods','01202526091018747777.jpeg','2025-10-18 15:31:26'),(20,'Footwear ','Goods','04202519091018885476.jpeg','2025-10-18 15:34:19'),(21,'Jewellery ','Goods','11202502091018985561.jpeg','2025-10-18 15:41:02'),(22,'Bags & luggage ','Goods','14202536091018708416.jpeg','2025-10-18 15:44:36'),(23,'Sports ','Goods','18202540091018249203.jpeg','2025-10-18 15:48:40'),(24,'Watches ','Goods','22202503091018964910.jpeg','2025-10-18 15:52:03'),(25,'Eyewear ','Goods','24202536091018240539.jpeg','2025-10-18 15:54:36'),(26,'Gifts shop ','Goods','26202556091018607094.jpeg','2025-10-18 15:56:56'),(27,'Books & school supplies ','Goods','32202513091018497576.jpeg','2025-10-18 16:02:13'),(28,'Construction & real estate ','Services','42202512091018584563.jpeg','2025-10-18 16:12:12'),(29,'Building material','Goods','2220254910101892305.jpeg','2025-10-18 16:15:25'),(30,'Contractors','Services','1320252710101854908.jpeg','2025-10-18 16:43:27'),(31,'Builder ','Services','21202549101018109509.jpeg','2025-10-18 16:51:49'),(32,'Plumbing materials ','Goods','30202538101018823498.jpeg','2025-10-18 17:00:38'),(33,'Electrical materials ','Goods','32202530101018763844.jpeg','2025-10-18 17:02:30'),(34,'Paints ','Goods','3720250110101875486.jpeg','2025-10-18 17:07:01'),(35,'Floor tiles ','Goods','42202513101018727637.jpeg','2025-10-18 17:12:13'),(36,'Function hall ','Services','01202515111018314949.jpeg','2025-10-18 17:31:15'),(37,'Cake shop ','Goods','05202550111018750770.jpeg','2025-10-18 17:35:50'),(38,'Bakery','Goods','07202555111018862799.jpeg','2025-10-18 17:37:55'),(39,'Caterers ','Services','12202549111018203992.jpeg','2025-10-18 17:42:49'),(40,'All decorators ','Services','19202535111018403366.jpeg','2025-10-18 17:49:35'),(41,'Wedding & event organizers','Services','25202500111018328741.jpeg','2025-10-18 17:55:00'),(42,'Laundry services ','Services','29202507111018506232.jpeg','2025-10-18 17:59:07'),(43,'Tuition & classes ','Services','41202558111018615649.jpeg','2025-10-18 18:11:58'),(44,'Internet service provider ','Services','50202502111018976106.jpeg','2025-10-18 18:20:02'),(45,'Car on rent ','Services','59202500111018126850.jpeg','2025-10-18 18:29:00'),(46,'All electronic items repair & services ','Services','07202559121019488693.jpeg','2025-10-18 18:37:59'),(48,'CCTV ','Goods','58202550101019843041.jpeg','2025-10-19 05:28:50'),(50,'Training & institutes ','Services','04202555111019976493.jpeg','2025-10-19 05:34:55'),(51,'Tours & Travels ','Services','09202524111019200129.jpeg','2025-10-19 05:39:24'),(52,'Hotels ','Services','17202516111019535371.jpeg','2025-10-19 05:47:16'),(56,'Restaurant ','Goods','34202559121019857689.jpeg','2025-10-19 07:04:59'),(57,'Gym & Fitness ','Services','47202517121019762830.jpeg','2025-10-19 07:17:17'),(58,'Yoga classes ','Services','50202507121019177429.jpeg','2025-10-19 07:20:07'),(59,'Pet and pet care','Services','58202528121019675178.jpeg','2025-10-19 07:28:28'),(60,'Borewells ','Services','20202500011019971034.jpeg','2025-10-19 07:50:00'),(62,'Motor driving school ','Services','27202556011019165859.jpeg','2025-10-19 07:57:56'),(63,'Car & bike repair service ','Services','34202555011019326356.jpeg','2025-10-19 08:04:55'),(65,'Carpenter ','Services','38202513011019657783.jpeg','2025-10-19 08:08:13'),(66,'Flex printing ','Services','44202556011019180594.jpeg','2025-10-19 08:14:56'),(67,'Photographer ','Services','22202522061019958591.jpeg','2025-10-19 11:09:45'),(68,'Transporter ','Services','28202522061019983035.jpeg','2025-10-19 12:58:22'),(69,'Water suppliers ','Goods','31202517061019474661.jpeg','2025-10-19 13:01:17'),(70,'Energy & solar product ','Goods','41202529061019489557.jpeg','2025-10-19 13:11:29'),(71,'Hardware & tools ','Goods','46202543061019650350.jpeg','2025-10-19 13:16:43'),(73,'Doctors ','Services','28202531091019709993.jpeg','2025-10-19 15:58:31'),(74,'Lawyers ','Services','32202523091019534151.jpeg','2025-10-19 16:02:23'),(75,'Chartered Accountant ','Services','34202548091019897093.jpeg','2025-10-19 16:04:48'),(76,'Valuers ','Services','37202517091019436929.jpeg','2025-10-19 16:07:17'),(78,'Architects ','Services','43202545081020622157.jpeg','2025-10-20 15:13:45'),(80,'Interior decorators ','Services','4520251708102057282.jpeg','2025-10-20 15:15:17'),(81,'Nutrition & healthcare ','Goods','59202542021021353045.jpeg','2025-10-21 09:29:42'),(82,'Beauty & personal care ','Goods','47202551051021548223.jpeg','2025-10-21 12:17:51'),(83,'Home decor ','Goods','52202520051021428991.jpeg','2025-10-21 12:22:20'),(84,'Mobile shop ','Goods','07202524061022735002.jpeg','2025-10-22 12:37:24'),(85,'Mobile repairing ','Services','1520255406102299430.jpeg','2025-10-22 12:45:54'),(86,'Coffee shop ','Goods','4520251208102259176.jpeg','2025-10-22 15:15:12'),(87,'womens clothing & fashion','Goods','28202515121026377113.jpg','2025-10-26 06:58:15'),(88,'Handmade crafts,jewelry &gifts','Goods','5220253412102683277.jpg','2025-10-26 07:22:34'),(89,'womens tailor','Services','18202531011026392224.jpg','2025-10-26 07:48:31'),(90,'mens tailor ','Services','22202531011026390468.jpg','2025-10-26 07:52:31'),(92,'Candle making ','Goods','312025421111011187.jpeg','2025-11-01 06:01:42'),(93,'Granite & marble ','Goods','33202534111101991484.jpeg','2025-11-01 06:03:34'),(94,'Homemade food & products ','Goods','34202549111101615974.jpeg','2025-11-01 06:04:49'),(96,'Homemade masale ','Goods','36202516111101859326.jpeg','2025-11-01 06:06:16'),(97,'Home appliances','Goods','38202531111101406858.jpeg','2025-11-01 06:08:31'),(98,'Doors & windows','Goods','422025241111011452.jpeg','2025-11-01 06:12:24'),(99,'Ice cream shop','Goods','46202524111101137908.jpeg','2025-11-01 06:16:24'),(100,'Used car dealer','Goods','4820253011110151890.jpeg','2025-11-01 06:18:30'),(101,'Band & Dj','Services','54202544111101939011.jpeg','2025-11-01 06:24:44'),(102,'Nursury & plants','Goods','58202514111101816778.jpeg','2025-11-01 06:28:14'),(103,'Printing','Services','35202529051231308787.jpg','2025-11-01 06:30:02'),(104,'Courier services','Services','32202505051231249853.jpg','2025-11-01 06:32:11'),(105,'Dance classes','Services','03202542121101758357.jpeg','2025-11-01 06:33:42'),(106,'Baby care Products ','Goods','05202538121101227391.jpeg','2025-11-01 06:35:38'),(107,'Kids wear shop','Goods','06202522121101381622.jpeg','2025-11-01 06:36:22'),(108,'Pet & pet supplies','Goods','07202504121101316804.jpeg','2025-11-01 06:37:04'),(109,'Flower shop ','Goods','2320254912110680146.jpg','2025-11-06 06:53:49'),(110,'Cycle shop ','Goods','33202553121106815268.jpg','2025-11-06 07:03:53'),(111,'Cleaning services ','Services','37202509121106335128.jpg','2025-11-06 07:07:09'),(112,'Cosmetic shop ','Goods','42202558121106422096.jpg','2025-11-06 07:12:58'),(113,'Dry fruit shop ','Goods','53202517121106930128.jpg','2025-11-06 07:23:17'),(114,'Garages ','Services','25202530021201942815.jpeg','2025-11-06 07:31:31'),(115,'Vitbhatti ','Goods','11202546011106864994.jpeg','2025-11-06 07:41:46'),(117,'Womans Special ','Goods','38202540011117722750.jpeg','2025-11-17 08:08:40'),(118,'Other','Goods','39202530011117361751.jpeg','2025-11-17 08:09:30');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `credit`
--

DROP TABLE IF EXISTS `credit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `credit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `by` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(255) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credit`
--

LOCK TABLES `credit` WRITE;
/*!40000 ALTER TABLE `credit` DISABLE KEYS */;
/*!40000 ALTER TABLE `credit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery`
--

DROP TABLE IF EXISTS `delivery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delivery` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `by` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery`
--

LOCK TABLES `delivery` WRITE;
/*!40000 ALTER TABLE `delivery` DISABLE KEYS */;
/*!40000 ALTER TABLE `delivery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feedback` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ods`
--

DROP TABLE IF EXISTS `ods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ods` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `ots` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ods`
--

LOCK TABLES `ods` WRITE;
/*!40000 ALTER TABLE `ods` DISABLE KEYS */;
INSERT INTO `ods` VALUES (1,748924,'admin','68f0d805a9446','verified','2025-10-16 11:33:25'),(2,529964,'admin','68f1f18a2c15b','verified','2025-10-17 07:34:34'),(3,667710,'admin','68f21cbe1363c','verified','2025-10-17 10:38:54'),(4,670873,'admin','68f23104e0421','verified','2025-10-17 12:05:24'),(5,436843,'admin','68f246140d321','verified','2025-10-17 13:35:16'),(6,240036,'Admin','68f660e0e839d','verified','2025-10-20 16:18:40'),(7,639915,'admin','68fcaa7a18593','verified','2025-10-25 10:46:18'),(8,117617,'admin','68fcaf4d6b8c3','verified','2025-10-25 11:06:53'),(9,431203,'admin','68fcaf5421bbc','verified','2025-10-25 11:07:00'),(10,477123,'admin','68fcaf704648c','verified','2025-10-25 11:07:28'),(11,954444,'admin','68fcb10c19124','verified','2025-10-25 11:14:20'),(12,610825,'admin','68fdc446cc1a6','verified','2025-10-26 06:48:38'),(13,147865,'admin','68fdfbebb7343','verified','2025-10-26 10:46:03'),(14,281087,'admin','68ff509814370','verified','2025-10-27 10:59:36'),(15,677525,'admin','68ff54e1784a4','verified','2025-10-27 11:17:53'),(16,458792,'admin','69007e5b94fff','verified','2025-10-28 08:27:07'),(17,651830,'admin','6900990f78b6d','verified','2025-10-28 10:21:03'),(18,796591,'admin','6900a86d6a53a','verified','2025-10-28 11:26:37'),(19,724953,'8788897020','69018aaf191a4','verified','2025-10-29 03:31:59'),(20,473958,'8788897020','69018b2086d50','verified','2025-10-29 03:33:52'),(21,170375,'8788897020','69022b438e643','verified','2025-10-29 14:57:07'),(22,830723,'8329412005','69024113a6050','verified','2025-10-29 16:30:11'),(23,320811,'8329412005','690243aa79ace','verified','2025-10-29 16:41:14'),(24,439371,'8329412005','69024b20f2acb','verified','2025-10-29 17:13:04'),(25,438175,'8329412005','6902f04148ae7','verified','2025-10-30 04:57:37'),(26,333256,'8329412005','690309291db06','verified','2025-10-30 06:43:53'),(27,543693,'admin','690313e48d98c','verified','2025-10-30 07:29:40'),(28,379374,'admin','69032ccff3ee4','verified','2025-10-30 09:15:59'),(29,802101,'admin','69035485053c5','verified','2025-10-30 12:05:25'),(30,450709,'admin','69035e1446490','verified','2025-10-30 12:46:12'),(31,981149,'admin','691ad50f830cd','verified','2025-11-17 07:55:59');
/*!40000 ALTER TABLE `ods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offer`
--

DROP TABLE IF EXISTS `offer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `offer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `main_cat` varchar(255) NOT NULL,
  `sub_cat` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offer`
--

LOCK TABLES `offer` WRITE;
/*!40000 ALTER TABLE `offer` DISABLE KEYS */;
/*!40000 ALTER TABLE `offer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_place`
--

DROP TABLE IF EXISTS `order_place`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_place` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `pay_status` varchar(255) NOT NULL,
  `or_condition` varchar(255) NOT NULL,
  `pay_id` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `audio_tx` int(10) NOT NULL DEFAULT 1,
  `sub_cat` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_place`
--

LOCK TABLES `order_place` WRITE;
/*!40000 ALTER TABLE `order_place` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_place` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `otp`
--

DROP TABLE IF EXISTS `otp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `otp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `otp` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `otp`
--

LOCK TABLES `otp` WRITE;
/*!40000 ALTER TABLE `otp` DISABLE KEYS */;
INSERT INTO `otp` VALUES (1,'1649','8788897048','68f0d1e9c75ac','verified','2025-10-16 11:07:21'),(2,'2884','8788897048','68f1f27e03e4e','verified','2025-10-17 07:38:38'),(3,'8938','8888371837','68f1f4122edfd','verified','2025-10-17 07:45:22'),(4,'4000','8888371837','68f1f45558903','verified','2025-10-17 07:46:29'),(5,'1268','8788897048','68f20942c5bf1','verified','2025-10-17 09:15:46'),(6,'1383','8788897048','68f20adbf188f','verified','2025-10-17 09:22:35'),(7,'1403','8329412005','68f23337ec618','verified','2025-10-17 12:14:47'),(8,'6792','8329412005','68f3e0d3a877e','verified','2025-10-18 18:47:47'),(9,'2858','8329412005','68f5c5e692800','verified','2025-10-20 05:17:26'),(10,'3217','8329412005','68f75b1ae80c0','verified','2025-10-21 10:06:18'),(11,'9932','8329412005','68fcaddfe0c1a','verified','2025-10-25 11:00:47'),(12,'7200','8329412005','68fcade0d4dbb','verified','2025-10-25 11:00:48'),(13,'6302','9607170795','68ff57003dcb7','unverified','2025-10-27 11:26:56'),(14,'3766','9607170795','68ff9666e7807','unverified','2025-10-27 15:57:26'),(15,'3440','9607170795','690059cb5a9dd','unverified','2025-10-28 05:51:07'),(16,'9149','9607170795','6900664c71975','unverified','2025-10-28 06:44:28'),(17,'7459','9607170795','69007934673ce','unverified','2025-10-28 08:05:08'),(18,'3188','9607170795','69007ab000105','unverified','2025-10-28 08:11:28'),(19,'4448','9607170795','69007be2a3e12','unverified','2025-10-28 08:16:34'),(20,'2937','9607170795','6900820d44420','unverified','2025-10-28 08:42:53'),(21,'2177','9607170795','69009aa423299','unverified','2025-10-28 10:27:48'),(22,'7296','8788897048','6900a7ce4b6a0','verified','2025-10-28 11:23:58'),(23,'2120','8788897048','6900aa6fb8041','verified','2025-10-28 11:35:11'),(24,'9136','8788897048','6900ae25e630a','verified','2025-10-28 11:51:01'),(25,'3343','9607170795','6900b31e8e6ef','unverified','2025-10-28 12:12:14'),(26,'5863','9607170795','6901d4d0c3ed5','unverified','2025-10-29 08:48:16'),(27,'9343','9607170795','6901d50a15c14','unverified','2025-10-29 08:49:14'),(28,'7013','9607170795','6901d6eaa501d','unverified','2025-10-29 08:57:14'),(29,'3707','9607170795','6901d82b361fd','unverified','2025-10-29 09:02:35'),(30,'2939','9607170795','6901d9767e184','unverified','2025-10-29 09:08:06'),(31,'1834','9607170795','6901d9774d1f5','unverified','2025-10-29 09:08:07'),(32,'6606','9607170795','6901d97801ac0','unverified','2025-10-29 09:08:08'),(33,'9782','9607170795','6901d978afb6f','unverified','2025-10-29 09:08:08'),(34,'9696','9607170795','6901d9796b17b','unverified','2025-10-29 09:08:09'),(35,'3684','9607170795','6901e0ac6b827','unverified','2025-10-29 09:38:52'),(36,'6604','8788897048','690205c5b41a5','verified','2025-10-29 12:17:09'),(37,'8728','9607170795','6902067a6f760','unverified','2025-10-29 12:20:10'),(38,'4337','8788897048','690206e21d2f7','verified','2025-10-29 12:21:54'),(39,'7486','9607170795','69020b3264f3c','unverified','2025-10-29 12:40:18'),(40,'5667','8788897048','690213cf4fc1d','verified','2025-10-29 13:17:03'),(41,'8053','9607170795','69021688c23fe','unverified','2025-10-29 13:28:40'),(42,'7868','9607170795','6902316965110','unverified','2025-10-29 15:23:21'),(43,'7470','9607170795','69023209da0b5','unverified','2025-10-29 15:26:01'),(44,'1246','9607170795','690233cc28bd0','verified','2025-10-29 15:33:32'),(45,'7597','9607170795','6902347c80f3e','verified','2025-10-29 15:36:28'),(46,'5935','8329412005','69023e82d9a4a','verified','2025-10-29 16:19:14'),(47,'3069','8329412005','69023f84bc88d','verified','2025-10-29 16:23:32'),(48,'8461','9607170795','6903010d380f2','verified','2025-10-30 06:09:17'),(49,'4645','9607170795','69032ee448316','verified','2025-10-30 09:24:52'),(50,'9543','9607170795','69032f4375443','verified','2025-10-30 09:26:27'),(51,'8466','9518361465','69033cb09b9d6','verified','2025-10-30 10:23:44'),(52,'8164','9529361465','69033d1eadae6','verified','2025-10-30 10:25:34'),(53,'1896','9607170795','6903538a75b9d','verified','2025-10-30 12:01:14'),(54,'3966','9607170795','690370853edde','verified','2025-10-30 14:04:53'),(55,'2826','9607170795','69046c054ef3b','verified','2025-10-31 07:57:57'),(56,'7674','8329412005','69089500803a9','verified','2025-11-03 11:41:52'),(57,'8905','9607170795','6919bce575346','verified','2025-11-16 12:00:37'),(58,'6460','9607170795','6919bda0b5069','verified','2025-11-16 12:03:44'),(59,'2817','9607170795','6919c7800b8d5','verified','2025-11-16 12:45:52'),(60,'5976','9607170795','6919c9818e145','verified','2025-11-16 12:54:25'),(61,'8326','9607170795','6919d1e11c516','verified','2025-11-16 13:30:09'),(62,'1875','9607170795','6919fc72ca208','verified','2025-11-16 16:31:46'),(63,'1775','9607170795','6919fe1a312a5','verified','2025-11-16 16:38:50'),(64,'8049','9607170795','691ac47a7ac14','verified','2025-11-17 06:45:14'),(65,'8142','8329412005','691acfa3c1d42','verified','2025-11-17 07:32:51'),(66,'2620','8329412005','691acfa4a9c7a','verified','2025-11-17 07:32:52'),(67,'4495','9529361465','691ad00c699f4','verified','2025-11-17 07:34:36'),(68,'1273','9607170795','691ad01c8e4f1','verified','2025-11-17 07:34:52'),(69,'7874','8329412005','691adc6944e9a','verified','2025-11-17 08:27:21'),(70,'5196','8329412005','691adce04a9e0','verified','2025-11-17 08:29:20'),(71,'3323','8329412005','691adce0e5a04','verified','2025-11-17 08:29:20'),(72,'4513','9529361465','691ae7a814a0b','verified','2025-11-17 09:15:20'),(73,'4312','9529361465','691aea468524e','verified','2025-11-17 09:26:30'),(74,'1525','9607170795','691af28e2ca02','verified','2025-11-17 10:01:50'),(75,'9251','9607170795','691b01875633e','verified','2025-11-17 11:05:43'),(76,'4855','9607170795','691b4ea3a7ba3','verified','2025-11-17 16:34:43'),(77,'5077','9607170795','691b5074305da','verified','2025-11-17 16:42:28'),(78,'9250','9607170795','691b5298c2482','verified','2025-11-17 16:51:36'),(79,'8507','8788897048','691dcb3baf963','verified','2025-11-19 13:50:51'),(80,'8097','3330039977','691f075d829ca','verified','2025-11-20 12:19:41'),(81,'8248','3330039977','691f077a8924f','verified','2025-11-20 12:20:10'),(82,'8635','6504992804','691f07a395265','verified','2025-11-20 12:20:51'),(83,'8824','6504992804','691f07be41b1a','verified','2025-11-20 12:21:18'),(84,'3425','6504992804','691f07be62d95','verified','2025-11-20 12:21:18'),(85,'4299','6504992804','691f07cb2812d','verified','2025-11-20 12:21:31'),(86,'9995','6504992804','6922fd2213698','verified','2025-11-23 12:25:06'),(87,'7319','8876940277','6922fd68a621b','verified','2025-11-23 12:26:16'),(88,'8635','6504992804','6922fd7e70428','verified','2025-11-23 12:26:38'),(89,'4648','6504992804','6922fdadb2f2c','verified','2025-11-23 12:27:25'),(90,'8401','9607170795','69241d086d670','verified','2025-11-24 08:53:28'),(91,'2389','8329412005','6928119f70ce2','verified','2025-11-27 08:53:51'),(92,'6297','8329412005','692811b274853','verified','2025-11-27 08:54:10');
/*!40000 ALTER TABLE `otp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) DEFAULT NULL,
  `main_cat` varchar(255) DEFAULT NULL,
  `sub_cat` varchar(255) DEFAULT NULL,
  `short_desc` varchar(255) DEFAULT NULL,
  `long_desc` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `weight_per_kg` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT '0',
  `shop_name` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `stars` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT '0',
  `mrp` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `gst` int(19) NOT NULL DEFAULT 0,
  `barcode` varchar(9999) DEFAULT NULL,
  `price_inc_1` decimal(10,2) NOT NULL DEFAULT 0.00,
  `price_inc_2` decimal(10,2) DEFAULT 0.00,
  `price_inc_3` decimal(10,2) NOT NULL DEFAULT 0.00,
  `price_inc_4` decimal(10,2) NOT NULL DEFAULT 0.00,
  `price_inc_5` decimal(10,2) NOT NULL DEFAULT 0.00,
  `static_val1` decimal(10,2) NOT NULL DEFAULT 0.00,
  `static_val2` decimal(10,2) NOT NULL DEFAULT 0.00,
  `static_val3` decimal(10,2) NOT NULL DEFAULT 0.00,
  `static_val4` decimal(10,2) NOT NULL DEFAULT 0.00,
  `static_val5` decimal(10,2) NOT NULL DEFAULT 0.00,
  `by` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_cat`
--

DROP TABLE IF EXISTS `sub_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `main_cat` varchar(255) DEFAULT NULL,
  `sub_cat` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `mobile_no` varchar(200) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `location` varchar(225) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(200) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(200) DEFAULT 'Pending',
  `by` varchar(200) NOT NULL,
  `bus_owner` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_cat`
--

LOCK TABLES `sub_cat` WRITE;
/*!40000 ALTER TABLE `sub_cat` DISABLE KEYS */;
INSERT INTO `sub_cat` VALUES (1,'furniture','sun glasses','39202545051017786042.png','2025-10-17 12:09:45','8788897048','Mathurai Nagar','','18.1848301','76.0402664','1234','Rejected','','xutr'),(2,'women special','mali lipstick','07202519041028139362.jpg','2025-10-28 10:37:19','8788897020','mali galli','','18.4549376','73.9049472','123456','Rejected','','Niranjan Mali'),(3,'women special','jknjkh','18202539091029488705.jpg','2025-10-29 15:48:39','978987989','hjj','0','18.196966','76.046333','123','Pending','978987989',''),(4,'women special','bag','20202534091029263534.jpg','2025-10-29 15:50:34','9789879890','abc ','0','18.19696339776952','76.04631329739777','1234','Pending','9789879890',''),(5,'women special','bag','24202501091029886489.jpg','2025-10-29 15:54:01','9789879890','abc ','0','18.19696339776952','76.04631329739777','1234','Pending','9789879890',''),(6,'women special','jknjkh','24202524091029925715.jpg','2025-10-29 15:54:24','978987989','xyz','0','18.197019967507977','76.04634739715695','123','Pending','978987989','jhvjhvhj'),(7,'mens tailor','Testing','27202507091029126036.jpg','2025-10-29 15:57:08','878889455','Teatsy','0','','','1234','Rejected','878889455','Niranjan Mali'),(8,'women special','jknjkh','37202535091029605998.jpg','2025-10-29 16:07:35','978987989','xyz','0','18.197019967507977','76.04634739715695','123','Rejected','978987989','jhvjhvhj'),(9,'mens tailor','Tailour ','58202549091029517217.jpeg','2025-10-29 16:28:49','8329412005 ','Dharashiv ','0','18.201627459882307','76.03823557326434','123456789','Rejected','8329412005 ','Gaikwad '),(10,'women special','Womenâ€™s ','18202510101029134508.jpeg','2025-10-29 16:48:10','8329412005','Smata nagar ','0','18.201068515753136','76.03844438210015','12345678910','Rejected','8329412005','BGgggg '),(11,'Beauty parlours','sai beauty parlor','28202504121030658320.jpeg','2025-10-30 06:58:04','1234567890','dharashiv','0','18.196956338613102','76.04630435742818','123456','Rejected','1234567890',''),(12,'Beauty parlours','Mali Parlor','14202522051117_557094.jpg','2025-10-30 07:27:01','9607170795','Sevalal Colony','0','17.6635','75.9429','123456','Rejected','9607170795','Niranjan mali'),(13,'women special','Hardware ','10202512031030637011.jpeg','2025-10-30 09:40:12','8329412005','Central building ','0','18.197080519817554','76.04617736983789','12345678910','Rejected','8329412005','Ggggg'),(14,'mens tailor','Royal Tailor','25202541071030540925.png','2025-10-30 13:55:41','9607170795','Sevalal Colony','0','18.19699662330623','76.0463300189702','123456','Pending','9607170795','kapase'),(15,'womens tailor','dkfkfjlf','33202525011031306982.jpeg','2025-10-31 08:03:25','3216549654','jhfoedfjfedf','0','18.196954847583644','76.04633039776952','123456','Pending','3216549654','Ajay Rathod'),(16,'Beauty & personal care','Beauty products ','39202558011031129154.jpeg','2025-10-31 08:09:58','8329412005 ','Nagar ','0','18.201107592565606','76.03787806128088','1234','Approved','8329412005 ','Saiiiiiiiii'),(17,'Furniture','test2','5720251602111762397.jpeg','2025-11-17 09:27:16','09607170795','behind terna college , sevalal colony','0','17.2818432','74.1801984','pass@1234','Approved','09607170795','09529361465'),(18,'Woman\'s Special','Masala udyog ','58202554021117924098.jpeg','2025-11-17 09:28:54','8329412005','Anand nagar ','0','18.19695883064295','76.04611564170975','12345','Approved','8329412005','Mahiii '),(19,'Womans Special','Masala udyog ','16202519051117_907458.jpeg','2025-11-17 09:39:30','8329412005 ','Anand nagar tuljapur ','0','18.196955991350215','76.04611189151647','12345','Approved','8329412005 ','Mahiiieee'),(20,'Womans Special ','papad udyog ','40202508061117588838.jpg','2025-11-17 13:10:08','8329412005','bank colaney','0','','','12345','Approved','8329412005','parii '),(21,'Fruits and vegetables ','Test','23202536071119368630.jpg','2025-11-19 13:53:36','1234567890','12345','0','','','1234','Pending','1234567890','Test'),(22,'Fruits and vegetables ','Test','24202528071119770507.jpg','2025-11-19 13:54:28','1234567890','12345','0','','','1234','Pending','1234567890','Test');
/*!40000 ALTER TABLE `sub_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_tokens`
--

DROP TABLE IF EXISTS `user_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_tokens`
--

LOCK TABLES `user_tokens` WRITE;
/*!40000 ALTER TABLE `user_tokens` DISABLE KEYS */;
INSERT INTO `user_tokens` VALUES (1,1,'d5fTIt9iQLiAFTmi2KSglv:APA91bHjKGLG7lseeLnujqkmzJv86CrMWT6j3S9i0oalAUTFDuir1BxQN5I_pvyPNwkEPcVXoT1KcXWtDNay0vNqzQ_FW-D003lwcU81WNpTZrLKUHJcc44');
/*!40000 ALTER TABLE `user_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `floor` varchar(255) NOT NULL,
  `tower` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `credit_limit` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'8788897048','Niranjan Mali','-','-','-','-','-','','2025-10-16 11:07:21',NULL),(2,'8329412005','Gaikwad','-dharashiv','-dharashiv ','-dharashiv ','-maharashtra ','-','','2025-10-17 12:14:47',NULL),(3,'9607170795','n','Dharashiv','Dharashiv','Dharashiv','Maharashtra','413501','Dharashiv','2025-10-27 11:26:56',NULL),(4,'9529361465','Pruthviraj Kapase','Dharashiv','Dharashiv','Dharashiv','Maharashtra','413501','Dharashiv','2025-10-29 08:03:46',NULL),(5,'9518361465','-','-','-','-','-','-','','2025-10-30 10:23:44',NULL),(6,'3330039977','-','-','-','-','-','-','','2025-11-20 12:19:41',NULL),(7,'6504992804','-','-','-','-','-','-','','2025-11-20 12:20:51',NULL),(8,'8876940277','-','-','-','-','-','-','','2025-11-23 12:26:16',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'bharari'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-09-09 21:21:34
