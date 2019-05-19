-- MySQL dump 10.17  Distrib 10.3.13-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: savanoryste
-- ------------------------------------------------------
-- Server version	10.3.13-MariaDB-1:10.3.13+maria~bionic

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
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organisation_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3BAE0AA79E6B1585` (`organisation_id`),
  CONSTRAINT `FK_3BAE0AA79E6B1585` FOREIGN KEY (`organisation_id`) REFERENCES `organisation` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (1,1,'Aut iusto ut dignissimos voluptatem consequatur.','2019-04-08 00:00:00','2019-04-08 00:00:00','Qui sit quam quisquam sit vitae aut et. Laborum libero vitae in neque unde dolor. Vitae voluptatem fugiat ut dolores voluptatem ea voluptate. Sapiente eligendi temporibus quam quis.'),(2,2,'Pariatur sit non et explicabo vitae perspiciatis.','2019-03-30 00:00:00','2019-04-01 00:00:00','Deserunt aut delectus non consequatur dolorem eveniet voluptatem accusamus. Consectetur iste rerum qui aut quo eum et. Laudantium omnis perspiciatis laudantium molestiae reiciendis molestiae sunt voluptates.'),(3,3,'Veniam porro necessitatibus molestias sint numquam.','2019-04-01 00:00:00','2019-03-30 00:00:00','Excepturi at sunt modi et consectetur necessitatibus. Et natus omnis corrupti a praesentium vero accusantium. Eum ad dolores praesentium.'),(4,4,'Architecto iste hic occaecati officiis consequatur earum.','2019-04-15 00:00:00','2019-03-29 00:00:00','Provident alias aut quia asperiores saepe quas necessitatibus. Perferendis necessitatibus cupiditate distinctio vitae. Sed aliquid architecto odio ea ut. Eveniet vel velit quas cumque quisquam qui.'),(5,5,'Fugiat animi nisi molestiae deleniti et earum non molestiae.','2019-04-19 00:00:00','2019-04-22 00:00:00','Suscipit praesentium consequuntur non fuga porro et et culpa. Ut saepe aliquid molestiae dolor facilis ratione distinctio. Asperiores illum voluptatem ut et temporibus ut.'),(6,6,'Itaque perferendis numquam et rem magni ut.','2019-03-24 00:00:00','2019-03-28 00:00:00','Eum error voluptates dolores asperiores et a. Architecto ratione dolorum sapiente est omnis. Sunt rem voluptas ut quia nobis rerum aut. Praesentium provident odit non modi facilis. Ullam id dignissimos mollitia nesciunt autem a voluptatibus.'),(7,7,'Quis ut odit illo voluptates molestiae et id fugiat.','2019-04-23 00:00:00','2019-03-31 00:00:00','Rem qui iure dolorum vel natus est. Consequatur tenetur quod repellat dolor ea atque. Quia rerum enim ea deleniti temporibus. Asperiores eum non nihil.'),(8,8,'Eos repellendus odit quae.','2019-03-25 00:00:00','2019-03-29 00:00:00','Amet est harum sit laboriosam iste est. Suscipit consectetur voluptatem a voluptates. Velit officiis voluptatem temporibus velit vel aspernatur. Libero fugit incidunt repellendus libero facilis est eos. Dolores sed velit et.'),(9,9,'Qui rem perferendis adipisci non dolorum.','2019-04-16 00:00:00','2019-04-22 00:00:00','Deleniti cumque ducimus sint delectus molestias. Commodi aut necessitatibus ipsa pariatur. Illum adipisci possimus aut sit saepe. Culpa dolore iure id ratione quaerat quis.'),(10,10,'Tempora assumenda aut repellat omnis nostrum et voluptatem.','2019-04-13 00:00:00','2019-04-10 00:00:00','Quos impedit nemo excepturi molestias aliquam. Officiis eaque est eius est nobis ullam ex aut. Nam in ea corporis impedit saepe. Et et eum dicta et ea non.'),(11,11,'Expedita esse similique tempore dolorem.','2019-04-18 00:00:00','2019-04-18 00:00:00','Unde quam eaque voluptates perferendis ex occaecati mollitia. Quaerat magnam quam vitae aut perspiciatis officia aperiam. Dolorem aliquid natus voluptatibus quidem ut.'),(12,12,'Id similique id quos aliquam vitae accusantium.','2019-04-04 00:00:00','2019-04-23 00:00:00','Quibusdam vero inventore doloremque unde qui distinctio. Sed recusandae omnis officiis facilis qui autem. Recusandae cumque nihil dolor et veritatis inventore commodi. Voluptas harum aut et.'),(13,13,'Fugit aut aut quia laborum adipisci.','2019-04-19 00:00:00','2019-04-20 00:00:00','Ut dicta aut atque ut quae dolores fugiat. Vero sapiente autem similique neque vel quaerat sed. Nostrum ut qui quaerat est molestiae commodi tenetur.'),(14,14,'Laborum et eius consectetur distinctio dolor necessitatibus voluptatem.','2019-03-30 00:00:00','2019-04-11 00:00:00','Praesentium rerum debitis recusandae. Perspiciatis dolorem quis magnam quod magnam qui. Ullam odit pariatur illo autem qui. Adipisci et aliquid esse sunt accusamus voluptatem est.'),(15,15,'Dolor aut adipisci porro quia velit.','2019-04-03 00:00:00','2019-04-01 00:00:00','In hic cupiditate velit deleniti quia sed laboriosam. Et voluptatem doloribus quia voluptatem consequatur sequi. Culpa consequatur quia quibusdam. Neque tempora eius sint ratione.'),(16,16,'Est ut voluptates deserunt quia consequatur nostrum dignissimos eveniet.','2019-04-07 00:00:00','2019-04-04 00:00:00','Impedit cupiditate non porro voluptatem quos sequi earum. Illum eum aut quia aliquid. Facere nostrum vero voluptatem ipsam unde.'),(17,17,'Ipsam provident velit rerum ad rerum.','2019-04-20 00:00:00','2019-04-22 00:00:00','Earum nihil quaerat rem eum. Ut excepturi necessitatibus saepe molestias rem aut. Aperiam numquam nesciunt non reprehenderit impedit quia doloribus. Perspiciatis nihil sit accusantium mollitia reiciendis dignissimos suscipit.'),(18,18,'Sunt ipsam culpa aut similique autem incidunt.','2019-04-01 00:00:00','2019-04-03 00:00:00','Et quisquam laborum aut reiciendis commodi est saepe. Enim nam nobis aut maxime sequi maiores ut. Minus pariatur aut eius architecto ex non. Molestiae perferendis quibusdam sequi et officiis et.'),(19,19,'Beatae aut occaecati possimus et dolore sequi repellat.','2019-04-19 00:00:00','2019-04-13 00:00:00','Adipisci pariatur aut ea id velit error maxime aut. Quia laudantium hic et alias.'),(20,20,'Laboriosam est consequuntur exercitationem harum facilis.','2019-03-31 00:00:00','2019-04-24 00:00:00','Exercitationem qui repellendus sed excepturi. Est laborum voluptas qui ratione et suscipit dolore. Similique et amet atque sint qui debitis illo eum. Odit magni ea hic possimus.'),(21,21,'Impedit dolorum aut aut magni.','2019-04-15 00:00:00','2019-04-09 00:00:00','Eius quia voluptas non. Aspernatur neque voluptas sit nisi numquam reprehenderit. Quasi dolores similique quia similique ea assumenda. Qui recusandae voluptas vero ea vel saepe expedita.'),(22,22,'Molestias assumenda dolorum ratione non delectus ut labore voluptates.','2019-04-22 00:00:00','2019-03-31 00:00:00','Quibusdam consequatur repudiandae hic qui quidem. Soluta fugiat aut rem. Cumque cupiditate rerum itaque consequuntur sed deleniti dolorem.'),(23,23,'Officia culpa et impedit nulla.','2019-04-23 00:00:00','2019-04-14 00:00:00','Odit animi harum delectus aliquid aliquam adipisci ut occaecati. Quia in ut ut. Aut architecto eos et.'),(24,24,'Vero et fugiat ut nemo sunt eum cumque.','2019-04-08 00:00:00','2019-04-09 00:00:00','Doloribus molestiae exercitationem voluptatem sit. Asperiores qui non voluptatem consequatur eum exercitationem deserunt voluptas. Impedit voluptatibus voluptas expedita. Quidem sint tempora asperiores voluptas dolore est dolor sed. Et earum animi eum nesciunt.'),(25,25,'Magni enim eum illum magnam non et ex quia.','2019-04-13 00:00:00','2019-04-19 00:00:00','Perspiciatis est ut nostrum voluptatem ut. Sed aut in provident quia. Tenetur excepturi nisi expedita fugit alias itaque ad modi. Autem eius dolores recusandae voluptatem amet veritatis rem.'),(26,26,'Corrupti molestiae rerum quas.','2019-04-20 00:00:00','2019-04-10 00:00:00','Et voluptas corporis adipisci minus omnis. Laboriosam et amet dolorum ut amet. Iusto rerum ipsa voluptatem expedita ducimus et et. Autem nemo nihil reiciendis hic harum. Ut enim ea aut sapiente et.'),(27,27,'Distinctio velit at vel facere eius nam omnis.','2019-03-31 00:00:00','2019-04-17 00:00:00','Distinctio impedit delectus voluptas excepturi dolor tempora ab. Voluptate cupiditate magnam et sit. Porro voluptates consequatur veniam voluptas optio ipsum laudantium consequatur. Sunt consequuntur amet molestiae ex quae non minima.'),(28,28,'Aut officiis beatae possimus est reiciendis autem aut.','2019-03-26 00:00:00','2019-04-14 00:00:00','Nisi ex non recusandae aspernatur explicabo. Maxime impedit fugiat totam aut repudiandae omnis. Debitis est quos officiis.'),(29,29,'Molestiae enim officia commodi dicta vel.','2019-04-07 00:00:00','2019-04-20 00:00:00','Est voluptates fugiat et consequatur. Similique nihil laudantium omnis dolore et nam in. Labore molestiae eius sint eveniet. Rem eum iste dolorem deleniti quibusdam.'),(30,30,'Ipsum porro ut rem quam quibusdam ducimus culpa.','2019-04-04 00:00:00','2019-04-03 00:00:00','Est nisi dignissimos ad dolorem eius odio minima enim. Culpa sint ut aperiam est assumenda. Eius rerum ullam ea nisi odit eum. Velit at dolorum necessitatibus autem dolor pariatur incidunt.'),(31,31,'Veniam vero maxime vel voluptate nam.','2019-04-17 00:00:00','2019-04-02 00:00:00','Perspiciatis odit veritatis possimus rerum sunt. Et molestias voluptatem dolores nihil possimus. Et asperiores in sapiente minus dolor eum qui.'),(32,32,'Expedita possimus delectus aut vel eius.','2019-04-15 00:00:00','2019-03-24 00:00:00','Facilis quam perspiciatis ipsam laboriosam et eius. Ex est natus aut rem. Id quaerat perferendis harum quia animi.'),(33,33,'Non et ullam ut voluptatem consectetur vel.','2019-04-18 00:00:00','2019-04-13 00:00:00','Facere placeat officia temporibus quibusdam dolorem dignissimos minus. Alias a iste quaerat autem. Cum sed animi cumque porro ab ratione. Inventore dolore eveniet quia aperiam placeat nam ut.'),(34,34,'Et ut cum vel incidunt.','2019-04-13 00:00:00','2019-04-04 00:00:00','Omnis quia quibusdam eveniet aliquid quas libero. Rerum in excepturi sequi amet eos.'),(35,35,'Quod velit error deserunt ipsam nulla enim fugiat.','2019-04-21 00:00:00','2019-04-24 00:00:00','Exercitationem ut aliquam eum ut aut nesciunt. Sapiente autem distinctio voluptatem nihil. Quasi illo ut delectus sit illum itaque. Itaque quam sint quam qui fugiat nulla excepturi.'),(36,36,'Repudiandae suscipit sint dicta aliquam deserunt.','2019-04-04 00:00:00','2019-04-11 00:00:00','Nisi culpa et voluptatem ut facilis et eos sed. Voluptate eos voluptatibus omnis id. Dolorem in minima numquam ullam suscipit debitis. Et repellat voluptas tenetur sit.'),(37,37,'Dolorem molestiae aut nihil omnis et ut.','2019-04-22 00:00:00','2019-04-05 00:00:00','Et vero tempora nulla omnis. Fugiat id est ea. Suscipit eaque et enim deleniti nisi non. Laudantium et sit sit sint.'),(38,38,'Ipsum fuga numquam repellendus qui qui.','2019-03-31 00:00:00','2019-04-07 00:00:00','Voluptatem eveniet molestiae illum. Asperiores praesentium commodi doloremque cumque omnis. Et ut fugit non molestiae quia in.'),(39,39,'Sit molestiae ipsa ullam et.','2019-03-27 00:00:00','2019-03-25 00:00:00','Aut et ut sint error nihil animi ipsum. Magni sint consequatur dolores adipisci magnam dolorem. Est illum dolores dolorem. Vero aspernatur rerum sapiente est vitae.'),(40,40,'Repellendus quo voluptatum eos id in et quisquam.','2019-03-28 00:00:00','2019-04-04 00:00:00','Saepe adipisci culpa eaque libero omnis. Dolor numquam et ut quae. Aliquam minus consequatur et id possimus eveniet. Tenetur dignissimos eos minima officia sunt.'),(41,41,'Quaerat ex unde eos voluptas aut occaecati.','2019-04-19 00:00:00','2019-03-31 00:00:00','Dolore cum ratione aut sed enim totam. Architecto itaque harum nulla libero sed est et. Suscipit nulla dolores corrupti rem asperiores nobis dicta.'),(42,42,'Nihil perferendis dolorum vel numquam beatae ex.','2019-04-16 00:00:00','2019-04-15 00:00:00','Dicta rerum blanditiis laudantium illo deserunt. Earum beatae accusamus maiores nostrum ut. At consequatur dolorum eligendi dolores quidem ab. Repudiandae voluptas illum et eos.'),(43,43,'Perspiciatis dolorem est eligendi quidem similique ducimus.','2019-04-22 00:00:00','2019-03-31 00:00:00','Aut porro consequuntur est voluptates laboriosam. Non cumque maxime nihil eum error non amet. Quibusdam sed illo ab eum. Qui incidunt earum rerum dignissimos dolor eligendi unde.'),(44,44,'Numquam dolorum sed voluptate sit.','2019-04-16 00:00:00','2019-04-21 00:00:00','Consequatur consequatur recusandae commodi veniam voluptatem. Dolor velit qui harum explicabo.'),(45,45,'Aut ad voluptatem est tempora molestias sunt.','2019-04-07 00:00:00','2019-03-24 00:00:00','Omnis accusamus rerum et itaque dolor nobis ea. Mollitia laborum in esse aliquid. Debitis sunt nobis est.'),(46,46,'Iusto alias consequatur eveniet repellat ex.','2019-03-27 00:00:00','2019-03-28 00:00:00','Nisi minus nostrum ab eum fugit. Deserunt alias consectetur perspiciatis et quis error. Autem placeat rerum quisquam quia quidem nesciunt impedit. Voluptate sed occaecati quis qui.'),(47,47,'Est totam nihil vero dolorum reprehenderit quae saepe repellat.','2019-04-08 00:00:00','2019-04-12 00:00:00','Provident optio commodi in. In autem et delectus sequi ad dolor.'),(48,48,'Vel ut saepe iure sunt.','2019-03-30 00:00:00','2019-04-20 00:00:00','Cumque doloremque hic itaque cumque qui blanditiis minus sed. Minus quisquam dolorem ut rerum. In maiores ut rerum dignissimos quis eveniet omnis consequuntur.'),(49,49,'Quisquam quia exercitationem adipisci voluptatem quaerat consequatur.','2019-04-22 00:00:00','2019-04-07 00:00:00','Eos aut officia beatae voluptatem. Vero assumenda aut sit quia dolores quia animi sed. Ea accusantium ab quos reprehenderit qui dolor.'),(50,50,'Et fugit quis sint.','2019-04-23 00:00:00','2019-04-15 00:00:00','Omnis esse esse necessitatibus hic dolor minima. Quidem quidem tenetur itaque laudantium dolorum.'),(52,NULL,'Darom 2019','2019-05-17 00:00:00','2019-05-21 00:00:00','asdasdasd');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invite`
--

DROP TABLE IF EXISTS `invite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `organisation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invite`
--

LOCK TABLES `invite` WRITE;
/*!40000 ALTER TABLE `invite` DISABLE KEYS */;
INSERT INTO `invite` VALUES (1,2,2,2),(3,1,1,1);
/*!40000 ALTER TABLE `invite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `volunteer_id` int(11) DEFAULT NULL,
  `job_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FBD8E0F88EFAB6B1` (`volunteer_id`),
  KEY `IDX_FBD8E0F85FA33B08` (`job_type_id`),
  CONSTRAINT `FK_FBD8E0F85FA33B08` FOREIGN KEY (`job_type_id`) REFERENCES `job_type` (`id`),
  CONSTRAINT `FK_FBD8E0F88EFAB6B1` FOREIGN KEY (`volunteer_id`) REFERENCES `volunteer` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job`
--

LOCK TABLES `job` WRITE;
/*!40000 ALTER TABLE `job` DISABLE KEYS */;
INSERT INTO `job` VALUES (51,1,1),(52,1,2),(53,2,1);
/*!40000 ALTER TABLE `job` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_type`
--

DROP TABLE IF EXISTS `job_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_type`
--

LOCK TABLES `job_type` WRITE;
/*!40000 ALTER TABLE `job_type` DISABLE KEYS */;
INSERT INTO `job_type` VALUES (1,'Socialinė'),(2,'Menas ir kultūra'),(3,'Ekologinė'),(4,'Žiniasklaida ir komunikacija'),(5,'IT technologijos'),(6,'Sporto'),(7,'Gybūnų globa'),(8,'Sveikatos'),(9,'Švietimo'),(10,'Prevencinė');
/*!40000 ALTER TABLE `job_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20190424114809','2019-04-24 11:48:32'),('20190506062008','2019-05-11 05:28:30'),('20190506124049','2019-05-11 05:28:31'),('20190507074401','2019-05-11 05:28:31'),('20190509131115','2019-05-11 05:47:50'),('20190510140111','2019-05-11 05:47:53'),('20190510171310','2019-05-11 05:47:53'),('20190510171531','2019-05-11 05:47:53'),('20190517070920','2019-05-17 07:09:55'),('20190517074009','2019-05-17 07:41:02'),('20190517080132','2019-05-17 08:04:41'),('20190517132834','2019-05-17 13:30:02'),('20190517140121','2019-05-17 14:03:34'),('20190518103050','2019-05-18 10:32:03'),('20190518130603','2019-05-18 13:06:47');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organisation`
--

DROP TABLE IF EXISTS `organisation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organisation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'OrganisationPic.jpeg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organisation`
--

LOCK TABLES `organisation` WRITE;
/*!40000 ALTER TABLE `organisation` DISABLE KEYS */;
INSERT INTO `organisation` VALUES (1,'Johnston, Schuster and Murazik','everette.dubuque@stark.biz',869515605,'7537 Johathan Points\nManteland, IN 64790','OrganisationPic.jpeg'),(2,'Hintz PLC','xmiller@crona.info',869789027,'891 Rubie Drive Suite 118\nPort Evans, DE 57553-4629','OrganisationPic.jpeg'),(3,'Marvin-Anderson','rcronin@boehm.com',869878519,'66565 Keebler Mews Apt. 323\nNorth Jedediahton, KY 12141-5753','OrganisationPic.jpeg'),(4,'Friesen, Pagac and Cummerata','yoshiko.green@kub.com',869097731,'11908 Goyette Port\nCrooksburgh, AK 39524-0596','OrganisationPic.jpeg'),(5,'Smith PLC','olson.afton@leffler.org',866357106,'6804 Ola Pass Apt. 562\nDerickshire, WY 62346','OrganisationPic.jpeg'),(6,'Kunde Inc','elta66@simonis.com',861530587,'80483 Russel Corner\nEast Gabe, OK 19112','OrganisationPic.jpeg'),(7,'Altenwerth-Greenholt','jayda84@jacobs.com',868075136,'69578 Miller Drive Apt. 073\nNew Nolamouth, RI 82155-8446','OrganisationPic.jpeg'),(8,'Schmitt, Hane and Gutmann','linwood35@abshire.info',869305008,'528 Kihn Shores\nRosellaborough, NE 81397-3903','OrganisationPic.jpeg'),(9,'Breitenberg-Larson','cpadberg@wehner.com',867157015,'39863 Berge Route\nVickieland, IN 03165','OrganisationPic.jpeg'),(10,'Hessel and Sons','anderson.beatrice@olson.com',866402035,'56268 Joany Forge\nPort Charliechester, WY 62364-6558','OrganisationPic.jpeg'),(11,'Hansen, Pfannerstill and Jacobs','jkuphal@rath.com',861900307,'75728 Adrian Mountain\nEast Herman, OR 79984-3103','OrganisationPic.jpeg'),(12,'Walker-Thompson','dach.brendon@abbott.com',865088310,'561 Durgan Haven Apt. 273\nLake Petra, AL 15949-2058','OrganisationPic.jpeg'),(13,'Hickle, Considine and Dibbert','giovanny74@wuckert.info',867187085,'12963 Chance Station Suite 365\nLouveniastad, CO 02542','OrganisationPic.jpeg'),(14,'Thompson, Koepp and Predovic','hackett.jaydon@tremblay.net',866416897,'56410 Lockman Grove Apt. 759\nLegrosborough, WV 40806-0627','OrganisationPic.jpeg'),(15,'Robel, Runte and Lubowitz','sigmund43@williamson.com',869465718,'9334 Gulgowski Springs\nNew Santamouth, WY 88211','OrganisationPic.jpeg'),(16,'Schmitt Ltd','gleichner.kris@douglas.com',863839129,'988 Oma Trail Apt. 503\nNew Zitabury, DC 19445-0656','OrganisationPic.jpeg'),(17,'Conn, Keebler and Hudson','ucronin@paucek.com',867387260,'8988 Luciano Wall\nEast Monteburgh, IN 94171','OrganisationPic.jpeg'),(18,'Gorczany LLC','vivien.ankunding@bins.com',861202753,'1420 Ziemann Mews Apt. 351\nLake Lilianabury, ND 27780','OrganisationPic.jpeg'),(19,'Kiehn PLC','serena51@schmeler.com',867247705,'882 Hand Via\nLehnermouth, PA 47736','OrganisationPic.jpeg'),(20,'Bahringer-Corkery','schultz.bryon@hayes.com',868679459,'937 Tyreek Park\nEast Kariville, TN 72983-6761','OrganisationPic.jpeg'),(21,'Sauer PLC','parker.otho@grimes.com',861561285,'1023 Trycia Center\nSouth Jacynthestad, NY 01568','OrganisationPic.jpeg'),(22,'Turner, Ankunding and Crona','joanny.lindgren@auer.com',867600019,'628 Adams Turnpike\nOrnmouth, TX 14670','OrganisationPic.jpeg'),(23,'Gerlach Ltd','von.august@becker.com',869943588,'3364 Yost Shoals Suite 676\nRodrigostad, IL 34691','OrganisationPic.jpeg'),(24,'Larkin-Cole','imaggio@grady.com',862982271,'770 Domenic Junctions Suite 604\nLake Yvetteshire, NV 91124-0097','OrganisationPic.jpeg'),(25,'Weber Inc','conn.garret@ferry.com',867632111,'7480 Skiles Underpass Apt. 657\nArelyville, IA 25529','OrganisationPic.jpeg'),(26,'Bosco-Langosh','flossie56@kunde.org',864694385,'509 Rohan Creek Apt. 389\nCelestinoton, NJ 61805-7289','OrganisationPic.jpeg'),(27,'Koch-Konopelski','madison.hirthe@windler.biz',867445859,'608 Schimmel Roads Apt. 287\nKovacekside, AR 46690-8680','OrganisationPic.jpeg'),(28,'Parisian LLC','sauer.hosea@rath.com',869294989,'205 Koelpin Plaza\nSipesmouth, IA 84848','OrganisationPic.jpeg'),(29,'Walsh and Sons','zcruickshank@mueller.com',869341104,'2877 Paucek Well Suite 968\nEast Nikkoview, MO 18036','OrganisationPic.jpeg'),(30,'Rosenbaum-Bahringer','daren27@marvin.com',863938462,'2427 Dorothea Cape\nEast Meta, NV 95304-4342','OrganisationPic.jpeg'),(31,'Harris PLC','luettgen.princess@bins.com',866490429,'711 Gislason Harbor Suite 285\nWest Kristopher, LA 93965','OrganisationPic.jpeg'),(32,'Hauck, Von and Hauck','madonna.schmidt@crona.info',869007823,'470 O\'Reilly Run\nDamarishaven, IA 61317-6930','OrganisationPic.jpeg'),(33,'Hammes, Welch and Schmidt','gerhold.alene@franecki.net',861514051,'459 Crystel Junctions Suite 482\nWest Kaylah, DC 76489','OrganisationPic.jpeg'),(34,'Emmerich Ltd','gilbert.spencer@adams.com',864100597,'50056 Schumm Rest\nBlockview, FL 25214','OrganisationPic.jpeg'),(35,'Altenwerth Inc','okey70@harris.com',869972853,'60042 Hartmann Shoals Apt. 773\nVinniestad, NV 11275','OrganisationPic.jpeg'),(36,'Dooley, Cassin and Runte','kurtis69@witting.com',866324211,'915 Brook Brooks\nNew Maximillia, MD 33827-6180','OrganisationPic.jpeg'),(37,'Spencer, Borer and Hauck','bwisozk@heaney.info',868337705,'10409 Evan Knoll Apt. 715\nRubyeton, MT 73769','OrganisationPic.jpeg'),(38,'Anderson, Littel and Little','waylon78@marks.info',867011607,'16802 Grace Parkways\nNorth Neva, CO 48410-9439','OrganisationPic.jpeg'),(39,'Prosacco Inc','wbeatty@rau.com',867496607,'927 Dietrich Rapid\nWest Roslynport, CO 17666-5591','OrganisationPic.jpeg'),(40,'Wilderman Ltd','kassulke.beau@howe.org',861830889,'293 Mayert Centers\nNew Margaritafurt, NE 40495-5568','OrganisationPic.jpeg'),(41,'Yost, Krajcik and Nienow','gina.durgan@friesen.com',862153376,'9185 Mallory Tunnel\nLake Florida, CA 91532-9921','OrganisationPic.jpeg'),(42,'Buckridge-Krajcik','dane39@reichert.com',864628302,'9347 Schaefer Harbor Suite 820\nPort Samara, DC 09873-3709','OrganisationPic.jpeg'),(43,'Lubowitz-Kunze','allie.hills@schoen.com',865691461,'8374 Kessler Roads\nLabadieland, MA 10678','OrganisationPic.jpeg'),(44,'Emmerich LLC','fernando52@cummings.info',865344520,'453 Johathan Mill\nBartolettibury, OK 29421-0666','OrganisationPic.jpeg'),(45,'Okuneva-Corkery','satterfield.mabel@bashirian.com',866570176,'89663 Ledner Landing Suite 019\nSchuppeborough, TX 77998','OrganisationPic.jpeg'),(46,'Morissette, Roob and Conn','gusikowski.yolanda@hirthe.net',864996244,'42262 Pollich Manor\nEmersonburgh, MO 91676','OrganisationPic.jpeg'),(47,'Ferry, Greenholt and Hickle','elizabeth.klein@shanahan.biz',868441114,'893 Boehm Lodge\nSouth Lilyanport, NE 43318-8904','OrganisationPic.jpeg'),(48,'Lueilwitz-Herzog','bbruen@abshire.com',868961573,'642 Sawayn Drive Apt. 042\nElainachester, UT 52809','OrganisationPic.jpeg'),(49,'Luettgen, Skiles and Schuppe','wchamplin@hessel.info',863992172,'3971 Nienow Islands Suite 837\nOlinville, AR 08651','OrganisationPic.jpeg'),(50,'Goldner-Abbott','brain72@boyle.com',863163475,'1308 Maia Trail Suite 184\nTremaynemouth, WV 37525','OrganisationPic.jpeg'),(51,'','',0,'','OrganisationPic.jpeg'),(52,'test123','info@paperseal.com',2932042,'verkiu 56','OrganisationPic.jpeg'),(53,'asd','info@paperseal.com',2932042,'verkiu 56','OrganisationPic.jpeg'),(54,'nx','info@paperseal.com',2932042,'verkiu 56','OrganisationPic.jpeg'),(55,'TEST1','info@paperseal.com',2932042,'verkiu 100','test.jpg'),(56,'TEST1sdsd','info@paperseal.com',2932042,'verkiu 100','test.jpg'),(57,'','',0,'','OrganisationPic.jpeg'),(58,'TEST1sdsd','info@paperseal.com',2932042,'verkiu 100','test.jpg');
/*!40000 ALTER TABLE `organisation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `volunteer_id` int(11) NOT NULL,
  `review_body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_rating` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_794381C68EFAB6B1` (`volunteer_id`),
  CONSTRAINT `FK_794381C68EFAB6B1` FOREIGN KEY (`volunteer_id`) REFERENCES `volunteer` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` VALUES (1,1,'Totam maiores itaque qui. Ab atque adipisci in. Iure ad neque rerum quo et cupiditate amet.',7),(2,2,'Vel necessitatibus dolorum sint mollitia velit ad. Voluptatem aut qui ut labore molestias.',2),(3,3,'Ut atque quasi laborum magni. Perferendis voluptas corrupti aut.',1),(4,4,'Est qui voluptatem ad suscipit. Facere est vel amet vel minima officia.',10),(5,5,'Nostrum officia qui asperiores sit. Deserunt pariatur beatae in omnis ut velit aut.',4),(6,6,'Aut dolorem velit qui est qui. Deserunt delectus cum et iusto.',2),(7,7,'Fugiat est consequatur iusto vel vero. Optio architecto itaque voluptatem est totam amet.',8),(8,8,'Inventore fuga non dolor velit. Sapiente ipsum qui aliquam nulla. Ut impedit eaque odit aut ea.',2),(9,9,'Ut facilis eveniet est aut. Ipsum velit quaerat reiciendis quos. Aut modi distinctio maiores.',7),(10,10,'Modi est aut fugit nemo. Atque ut fuga minus dignissimos qui asperiores quasi.',8),(11,11,'Qui facere officiis eos aut nobis. Facere delectus non id aliquam ut.',3),(12,12,'Harum architecto nostrum consequatur repellat. Nihil in sint commodi voluptate qui sed id.',2),(13,13,'Hic aut quae soluta reprehenderit. Quo aut unde magni aut quis sint quia aspernatur.',5),(14,14,'Voluptatem debitis sit quam et repellendus. Rem earum ut expedita.',1),(15,15,'Quis vel sed neque quia. Qui et enim inventore nulla nobis. Quia dolor dolorem rerum ex.',7),(16,16,'Sunt est quidem aut. Maiores nostrum sint delectus autem a.',8),(17,17,'Ex molestiae error expedita facilis. Earum tempora ipsum beatae atque. Quos culpa iusto quia velit.',4),(18,18,'Similique enim culpa cumque vel provident neque. Doloribus mollitia est sit explicabo voluptatem.',9),(19,19,'Ipsam optio numquam voluptatibus. Fugit quod optio nobis.',5),(20,20,'Autem harum sit enim velit et. Magni aut fugiat distinctio autem molestiae dolores.',1),(21,21,'Laborum sint aut accusantium non consequuntur excepturi. Dolor et aliquid eum eius fuga.',8),(22,22,'Quod doloremque omnis a sed magnam. Tempora possimus quis aliquid. Sunt rem et aperiam.',9),(23,23,'Odio quisquam vitae non qui. Rerum sit repellendus assumenda quas enim omnis.',4),(24,24,'Nesciunt quidem rerum ut ea. Quam sunt quae ex ut qui delectus perspiciatis.',8),(25,25,'Soluta ipsa aut sit culpa quo dignissimos quis. In et delectus saepe perferendis id qui.',6),(26,26,'Soluta et ullam aspernatur cupiditate aut odio quia. Eum commodi fugit quibusdam aperiam.',10),(27,27,'Tenetur alias quas nobis est provident. Illo voluptas cumque quos accusamus distinctio.',9),(28,28,'Eos molestiae voluptas sit consectetur dolores. Aspernatur est exercitationem molestias placeat.',8),(29,29,'Reiciendis expedita minus omnis facere ut velit omnis. Eum eius placeat non.',5),(30,30,'Dolores maxime minima eius nostrum. Et sed velit et earum eveniet numquam.',10),(31,31,'Quia ut nihil voluptates non quasi. Rem sequi quas dolorum ea.',5),(32,32,'Qui est vitae et. Quibusdam sed natus temporibus earum qui officiis.',4),(33,33,'Fugiat quo eum architecto deserunt sunt. Sed atque velit eos et distinctio. Et voluptas est in.',2),(34,34,'Sed sunt sint veritatis. Doloribus explicabo voluptates itaque iusto et.',10),(35,35,'Est et autem aut aut. Magnam sequi sapiente quidem facere.',9),(36,36,'Consequatur non deleniti maxime nobis fugit. Voluptatum commodi necessitatibus sint dolor.',10),(37,37,'Animi magnam maxime autem non. Aut est adipisci recusandae fuga est.',1),(38,38,'Sunt minima eveniet excepturi sed aliquam aliquid nesciunt sint. Exercitationem animi minima et.',4),(39,39,'Aut voluptas dolor sunt atque aliquam sit. Est non voluptates ut ut dignissimos quo.',10),(40,40,'Architecto excepturi saepe laborum expedita in. Quibusdam et suscipit assumenda iure.',4),(41,41,'Ut eos dolorem ipsum et labore quis. Nisi placeat iure nihil sint.',10),(42,42,'Et eum fugiat alias aut iste. Perferendis doloribus consequuntur et odio.',1),(43,43,'Ut voluptate rerum velit aut omnis. Qui molestiae qui quisquam ipsum velit.',6),(44,44,'Aut ipsam enim quam architecto. Assumenda nulla saepe consectetur.',9),(45,45,'Eos repellat sed impedit a corrupti sed molestias est. Asperiores in fuga nulla perferendis.',2),(46,46,'Fuga nobis ut aut aspernatur. Asperiores tempore sit ducimus et quasi veniam sed ea.',8),(47,47,'Est eius excepturi non occaecati laudantium. Soluta exercitationem molestias minus qui.',2),(48,48,'Autem cum quae sed vel repellat. Qui corporis ipsum ea ab dolore recusandae ea.',7),(49,49,'Corporis ut optio animi. Quis ducimus debitis quas ipsum adipisci repellendus voluptate magnam.',8),(50,50,'Aliquam quia aut laborum. Et et ut voluptas quo. Velit esse sunt eos.',3);
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (9,'Dovydas','[\"ROLE_VOLUNTEER\"]','$argon2i$v=19$m=1024,t=2,p=2$U3U0dWZkTjFNbTJJUlNlaA$j+7pq0RPQjOKSWUvYRqNABDNLoxWYDAXRiMox+Xi8a8',57),(10,'Deivis','[\"ROLE_ORGANISATION\"]','$argon2i$v=19$m=1024,t=2,p=2$cmNBZm9IU1llZlgwWm4uMw$kkpVndqm7JS7mUr0xILmE3CST1wj2fcVzjhV+70+Bpg',57),(11,'Papa','[\"ROLE_VOLUNTEER\"]','$argon2i$v=19$m=1024,t=2,p=2$dWpTWFFCd1g4Qkl1ODFCVg$ecxLOEfinS+61XuJbcus+2AWApLQrGBIcXZ6NbJ2p+8',58),(12,'Youtube','[\"ROLE_ORGANISATION\"]','$argon2i$v=19$m=1024,t=2,p=2$djA2cHlOaGZOZmp6ZnFVMg$cXHt/7NgXW/3xA97hkCGuu034vhY8psMmRws2JF8M1Q',58),(13,'Volunteer123','[\"ROLE_VOLUNTEER\"]','$argon2i$v=19$m=1024,t=2,p=2$RUtGS0Nkb0Q5ZVMzWG9sbQ$fMWDkvuge5qFu1BK7w16EfqsoaXEfsIsS/CIvN5Scuk',59);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `volunteer`
--

DROP TABLE IF EXISTS `volunteer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `volunteer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'VolunteerPic.jpeg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `volunteer`
--

LOCK TABLES `volunteer` WRITE;
/*!40000 ALTER TABLE `volunteer` DISABLE KEYS */;
INSERT INTO `volunteer` VALUES (1,'Dovydas','Radzys',2932042,'radzysdovydas2@gmail.com','Vilnius','Lithuania','test','VolunteerPic.jpeg'),(2,'Stone','Willms',861013653,'windler.dejuan@yahoo.com','Clemmieborough','Zimbabwe','Easy Out going','VolunteerPic.jpeg'),(3,'Erich','Sauer',867927233,'ludie22@rolfson.info','Charlottefurt','United Arab Emirates','Hard Working','VolunteerPic.jpeg'),(4,'Thurman','Wiegand',862115442,'mortiz@kshlerin.org','West Michaelmouth','Macao','Experienced','VolunteerPic.jpeg'),(5,'Madilyn','Larson',862276534,'ofelia37@bashirian.com','Christellefort','Tajikistan','Always on Time','VolunteerPic.jpeg'),(6,'Virginia','Ziemann',861408256,'reinger.ethyl@yahoo.com','Altheafort','Slovenia','Polite','VolunteerPic.jpeg'),(7,'Cindy','Tillman',864884908,'qosinski@denesik.com','West Nelda','Czech Republic','Experienced','VolunteerPic.jpeg'),(8,'Jerrold','Crist',863619832,'kirk.lakin@hotmail.com','Halvorsonmouth','Finland','Easy Out going','VolunteerPic.jpeg'),(9,'Dariana','Lindgren',862509048,'brooklyn.sauer@gusikowski.com','South Nona','Saudi Arabia','Experienced','VolunteerPic.jpeg'),(10,'Amina','Glover',863410181,'ronny.hoeger@marks.com','Lake Brian','Equatorial Guinea','Polite','VolunteerPic.jpeg'),(11,'Terence','Bins',863439460,'luigi.bailey@marvin.com','Legroston','Bangladesh','Polite','VolunteerPic.jpeg'),(12,'Jedediah','Mraz',864476803,'mayert.sterling@gmail.com','North Aglaeland','South Africa','Have been volunteering for the past year','VolunteerPic.jpeg'),(13,'Dorcas','Bartoletti',865331070,'connelly.betty@yahoo.com','Lake Ted','Dominica','Polite','VolunteerPic.jpeg'),(14,'Nathanael','Hodkiewicz',867161899,'amina19@prosacco.net','Jakubowskimouth','Yemen','Always on Time','VolunteerPic.jpeg'),(15,'Tess','Koelpin',862023931,'bethel02@yahoo.com','Vivientown','Austria','Experienced','VolunteerPic.jpeg'),(16,'Everett','Rohan',866789850,'lesly94@hotmail.com','North Ethatown','Denmark','Easy Out going','VolunteerPic.jpeg'),(17,'Harley','Haag',863932185,'ronny38@renner.com','South Ines','Maldives','Polite','VolunteerPic.jpeg'),(18,'Veronica','Feeney',862143467,'ritchie.brice@hotmail.com','Anikaton','Tuvalu','Hard Working','VolunteerPic.jpeg'),(19,'Ladarius','Barton',867868870,'letha52@mcdermott.biz','Port Demarioview','Panama','Easy Out going','VolunteerPic.jpeg'),(20,'Josie','Lebsack',867615391,'botsford.shakira@hotmail.com','Richardport','Benin','Hard Working','VolunteerPic.jpeg'),(21,'Hershel','Franecki',869158919,'shields.samir@hotmail.com','East Deondre','Norfolk Island','Have been volunteering for the past year','VolunteerPic.jpeg'),(22,'Antonietta','Hilpert',863032488,'rempel.judson@harris.com','Port Marilyneberg','Jamaica','Experienced','VolunteerPic.jpeg'),(23,'Shad','Satterfield',866767296,'karina23@murazik.com','West Kathryn','Taiwan','Easy Out going','VolunteerPic.jpeg'),(24,'Cindy','Hamill',867312148,'gleichner.ila@hotmail.com','Langburgh','Turkey','Hard Working','VolunteerPic.jpeg'),(25,'Patsy','Bins',865997084,'hbauch@gmail.com','South Arelyberg','Belize','Always on Time','VolunteerPic.jpeg'),(26,'Rosella','Schulist',869657882,'rico54@kris.com','New Lonny','Brazil','Willing to put in extra effort','VolunteerPic.jpeg'),(27,'Hugh','Crona',866227649,'kianna.cassin@mertz.biz','Mariloumouth','Netherlands Antilles','Always on Time','VolunteerPic.jpeg'),(28,'Maryse','Hackett',868602344,'araynor@beahan.com','Bechtelarland','Kazakhstan','Hard Working','VolunteerPic.jpeg'),(29,'Gay','Waters',867906760,'rblock@hill.com','Port Cartertown','Japan','Easy Out going','VolunteerPic.jpeg'),(30,'Sandra','Hayes',862466914,'ywillms@jacobson.org','North Ellie','Argentina','Hard Working','VolunteerPic.jpeg'),(31,'Gerald','Ratke',862846290,'garrick.friesen@yost.net','Gottliebberg','Kenya','Always on Time','VolunteerPic.jpeg'),(32,'Jovany','Cassin',865200588,'kbergstrom@yahoo.com','Robynton','Switzerland','Hard Working','VolunteerPic.jpeg'),(33,'Davonte','Howell',862416068,'rachel.green@yahoo.com','Kleinport','Tunisia','Hard Working','VolunteerPic.jpeg'),(34,'Boyd','Jaskolski',861987516,'breana.gerhold@sauer.com','Kaileyport','Vietnam','Willing to put in extra effort','VolunteerPic.jpeg'),(35,'Mallie','Mueller',864208073,'vabernathy@gmail.com','Port Shaina','Suriname','Hard Working','VolunteerPic.jpeg'),(36,'Werner','Bahringer',861237152,'kassandra.effertz@block.net','West Berry','Fiji','Easy Out going','VolunteerPic.jpeg'),(37,'Candelario','Batz',862617332,'kiehn.frederique@gmail.com','Cassinland','Finland','Hard Working','VolunteerPic.jpeg'),(38,'Janie','Hermann',866024781,'akeem08@monahan.com','East Leora','United Arab Emirates','Polite','VolunteerPic.jpeg'),(39,'Mallie','O\'Keefe',869285688,'edietrich@zulauf.biz','Port Alexzander','United Kingdom','Have been volunteering for the past year','VolunteerPic.jpeg'),(40,'Quinten','Jacobson',865386667,'tbailey@kuhic.com','Ritchieberg','Turkey','Have been volunteering for the past year','VolunteerPic.jpeg'),(41,'Trace','Deckow',869762529,'rdavis@yahoo.com','Buckridgefurt','Italy','Easy Out going','VolunteerPic.jpeg'),(42,'Jordy','Haag',862940267,'waelchi.cornell@gmail.com','Raeganbury','Liberia','Polite','VolunteerPic.jpeg'),(43,'Eusebio','Schroeder',865542413,'rashawn93@hotmail.com','Camrynmouth','Greece','Have been volunteering for the past year','VolunteerPic.jpeg'),(44,'Oliver','Schaefer',865978589,'langosh.jessy@gmail.com','Kubmouth','Azerbaijan','Always on Time','VolunteerPic.jpeg'),(45,'Shea','Volkman',866923878,'brau@yahoo.com','Prestonhaven','United Kingdom','Hard Working','VolunteerPic.jpeg'),(46,'Lew','Torphy',865963657,'xhartmann@yahoo.com','South Stanfordville','Northern Mariana Islands','Hard Working','VolunteerPic.jpeg'),(47,'Jocelyn','Prohaska',864456560,'brielle.price@daugherty.com','West Oliverland','Ireland','Easy Out going','VolunteerPic.jpeg'),(48,'Allison','Runolfsdottir',861776880,'schroeder.madonna@yahoo.com','Leschshire','Panama','Have been volunteering for the past year','VolunteerPic.jpeg'),(49,'Joe','Schmitt',864039998,'iframi@batz.biz','South Joesph','Cambodia','Willing to put in extra effort','VolunteerPic.jpeg'),(50,'Nelda','Turner',862895483,'kkovacek@will.info','Heidenreichville','Bahrain','Easy Out going','VolunteerPic.jpeg'),(57,'Dovydas2','Radzys',2932042,'radzysdovydas2@gmail.com','Vilnius','Lithuania','test','VolunteerPic.jpeg'),(58,'','',0,'','','','','VolunteerPic.jpeg'),(59,'Dovydas2','Radzys',2932042,'radzysdovydas2@gmail.com','Vilnius','Lithuania','test','VolunteerPic.jpeg');
/*!40000 ALTER TABLE `volunteer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `volunteer_event`
--

DROP TABLE IF EXISTS `volunteer_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `volunteer_event` (
  `volunteer_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`volunteer_id`,`event_id`),
  KEY `IDX_9C0D7558EFAB6B1` (`volunteer_id`),
  KEY `IDX_9C0D75571F7E88B` (`event_id`),
  CONSTRAINT `FK_9C0D75571F7E88B` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_9C0D7558EFAB6B1` FOREIGN KEY (`volunteer_id`) REFERENCES `volunteer` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `volunteer_event`
--

LOCK TABLES `volunteer_event` WRITE;
/*!40000 ALTER TABLE `volunteer_event` DISABLE KEYS */;
INSERT INTO `volunteer_event` VALUES (1,1),(2,1),(7,3),(9,3),(11,2),(14,2);
/*!40000 ALTER TABLE `volunteer_event` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-19 14:00:16
