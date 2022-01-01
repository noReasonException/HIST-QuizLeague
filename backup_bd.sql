-- MySQL dump 10.13  Distrib 5.7.11, for Linux (x86_64)
--
-- Host: localhost    Database: quiz
-- ------------------------------------------------------
-- Server version	5.7.11-0ubuntu6

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
-- Current Database: `quiz`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `quiz` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `quiz`;

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `answer_mainbody` longtext,
  PRIMARY KEY (`answer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (1,'Correct'),(2,'False');
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appversion`
--

DROP TABLE IF EXISTS `appversion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appversion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `versionNumber` varchar(10) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `description` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appversion`
--

LOCK TABLES `appversion` WRITE;
/*!40000 ALTER TABLE `appversion` DISABLE KEYS */;
/*!40000 ALTER TABLE `appversion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `backendmachineversion`
--

DROP TABLE IF EXISTS `backendmachineversion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `backendmachineversion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `versionNumber` varchar(10) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `description` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `backendmachineversion`
--

LOCK TABLES `backendmachineversion` WRITE;
/*!40000 ALTER TABLE `backendmachineversion` DISABLE KEYS */;
/*!40000 ALTER TABLE `backendmachineversion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chapters`
--

DROP TABLE IF EXISTS `chapters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chapters` (
  `chapter_id` int(11) NOT NULL AUTO_INCREMENT,
  `chapter_name` varchar(64) DEFAULT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`chapter_id`),
  KEY `lesson_id` (`lesson_id`),
  CONSTRAINT `chapters_ibfk_1` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`lesson_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chapters`
--

LOCK TABLES `chapters` WRITE;
/*!40000 ALTER TABLE `chapters` DISABLE KEYS */;
INSERT INTO `chapters` VALUES (1,'proetimasia_bafis',1),(2,'proetimasia_nuxiwn',1),(3,'epilogh_xrwmatos',1);
/*!40000 ALTER TABLE `chapters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(64) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1164 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (586,''),(587,'ΒΟΝΙΤΣΑΣ '),(588,'ΠΑΡΑΒΟΛΑΣ '),(589,'ΠΑΝΑΙΤΩΛΙΟΥ '),(590,'ΑΙΤΩΛΙΚΟΥ '),(591,'ΑΜΦΙΛΟΧΙΑΣ '),(592,'ΑΣΤΑΚΟΥ '),(593,'ΒΟΝΙΤΣΗΣ '),(594,'ΓΑΒΑΛΟΥΣ '),(595,'ΘΕΡΜΟΥ '),(596,'ΚΑΤΟΥΝΗΣ '),(597,'ΝΕΟΧΩΡΙΟΥ  ΑΙΤ/ΝΙΑΣ '),(598,'ΜΥΤΙΚΑ '),(599,'ΕΥΗΝΟΧΩΡΙΟΥ '),(600,'ΜΑΤΑΡΑΓΚΑΣ '),(601,'ΕΜΠΕΣΟΥ  ΑΙΤ/ΝΙΑΣ '),(602,'ΝΑΥΠΛΙΟΥ '),(603,'ΝΑΥΠΛΙΟΥ  ΕΣΠΕΡΙΝΟ '),(604,'ΑΓΙΑΣ  ΤΡΙΑΔΟΣ '),(605,'ΚΡΑΝΙΔΙΟΥ '),(606,'ΕΡΜΙΟΝΗΣ '),(607,'ΑΣΚΛΗΠΙΕΙΟΥ '),(608,'ΑΣΤΡΟΥΣ '),(609,'ΛΕΩΝΙΔΙΟΥ '),(610,'ΜΕΓΑΛΟΠΟΛΗΣ '),(611,'ΤΕΓΕΑΣ '),(612,'ΑΣΤΡΟΥΣ  ΑΡΚΑΔΙΑΣ '),(613,'ΚΑΣΤΡΙΟΥ '),(614,'ΛΕΒΙΔΙΟΥ '),(615,'ΜΕΓΑΛΟΥΠΟΛΕΩΣ '),(616,'ΤΡΟΠΑΙΩΝ '),(617,'ΤΡΙΠΟΛΗΣ  ΕΣΠΕΡΙΝΟ '),(618,'Π  Λ  ΑΡΤΑΣ '),(619,'ΑΓΝΑΝΤΩΝ '),(620,'ΒΟΥΡΓΑΡΕΛΙΟΥ '),(621,'ΑΝΩ  ΚΑΛΕΝΤΙΝΗΣ '),(622,'ΚΟΜΠΟΤΙΟΥ  ΑΡΤΑΣ '),(623,'ΝΕΟΧΩΡΙΟΥ  ΑΡΤΑΣ '),(624,'ΑΝΕΖΑΣ  ΑΡΤΑΣ '),(625,'ΠΑΝΑΓΙΑΣ  ΔΙΑΣΕΛΟΥ  ΑΡΤ '),(626,'ΠΣΠΑ  ΠΕΙΡΑΜ.  ΣΧΟΛΕΙΟ  ΑΘΗΝΑΣ '),(627,'ΑΓ  ΣΤΕΦΑΝΟΥ '),(628,'ΕΝ  ΛΥΚ  ΑΓ.ΔΗΜΗΤΡΙΟΥ  ΕΣΠ '),(629,'ΑΘΗΝΩΝ '),(630,'ΑΝΑΒΡΥΤΩΝ '),(631,'ΤΕΛ  ΚΑΛΥΒΙΩΝ '),(632,'ΣΚΑΛΑΣ  ΩΡΩΠΟΥ '),(633,'ΕΙΔΙΚΗΣ  ΑΓΩΓΗΣ '),(634,'ΕΙΔ  ΑΓΩΓΗΣ '),(635,'ΑΡΓΥΡ/ΚΗΣ  ΕΙΔ  ΑΓ '),(636,'ΠΕΙΡΑΙΑ  (ΔΛΕΝ) '),(637,'ΠΕΙΡΑΜΑΤΙΚΟ  ΣΧΟΛ  ΠΑΝ/ΜΙΟΥ  ΑΘΗΝΑΣ '),(638,'ΒΑΡΒΑΚΕΙΟ  ΠΕΙΡΑΜΑΤΙΚΟ '),(639,'ΑΝΑΒΡΥΤΩΝ  ΠΕΙΡΑΜΑΤΙΚΟ '),(640,'ΕΥΑΓ.ΣΧΟΛ.ΠΕΙΡΑΜΑΤΙΚΟ '),(641,'ΠΕΙΡΑΜ  ΛΥΚ  ΑΓ  ΑΝΑΡΓΥΡΩΝ '),(642,'ΕΙΔ.ΑΝΑΠΗΡΩΝ  ΑΓ.ΑΝΑΡΓ '),(643,'ΑΘΗΝΑΣ '),(644,'ΑΙΓΑΛΕΩ  ΕΣΠ '),(645,'ΜΕΛΙΣΣΙΩΝ '),(646,'ΑΜΑΡΟΥΣΙΟΥ '),(647,'ΠΕΝΤΕΛΗΣ '),(648,'ΚΑΡΕΑ '),(649,'ΙΛΙΟΥ  ΜΟΥΣΙΚΟ '),(650,'ΑΓ.ΑΝΑΡΓΥΡΩΝ  ΕΣΠ '),(651,'ΠΕΡΙΣΤΕΡΙΟΥ  ΕΣΠΕΡΙΝΟΝ '),(652,'Ν.ΧΑΛΚΗΔΟΝΑΣ '),(653,'ΝΕΑΣ  ΕΡΥΘΡΑΙΑΣ '),(654,'ΛΥΚΟΒΡΥΣΗΣ '),(655,'ΕΙΔ.  ΚΩΦΩΝ  Κ  ΒΑΡΗΚΟΩΝ '),(656,'Ν.ΙΩΝΙΑΣ  ΕΣΠΕΡΙΝΟΝ '),(657,'ΜΕΤΑΜΟΡΦΩΣΕΩΣ '),(658,'ΦΙΛΟΘΕΗΣ '),(659,'ΠΑΛΑΙΟΥ  ΨΥΧΙΚΟΥ '),(660,'Π  Λ  ΣΙΒΙΤΑΝΕΙΔΙΟΥ '),(661,'ΚΑΛΛΙΘΕΑΣ  ΕΣΠΕΡΙΝΟΝ '),(662,'ΒΟΥΛΙΑΓΜΕΝΗΣ '),(663,'ΙΩΝΙΔΕΙΟΥ  ΠΕΙΡΑΜΑΤΙΚΟ '),(664,'ΖΑΝΝΕΙΟ  ΠΕΙΡΑΜΑΤΙΚΟ '),(665,'ΚΑΛΛΙΠΟΛΕΩΣ  ΠΕΙΡΑΙΩΣ '),(666,'ΠΕΙΡΑΙΩΣ  Α  ΕΣΠΕΡΙΝΟΝ '),(667,'ΚΑΣΤΕΛΑΣ '),(668,'ΑΓΙΟΥ  ΙΩΑΝΝΟΥ  ΡΕΝΤΗ '),(669,'ΠΕΙΡΑΙΩΣ  ΡΑΛΛΕΙΟΝ  ΘΗΛ '),(670,'ΠΕΙΡΑΙΑ '),(671,'ΠΕΡΑΜΑΤΟΣ '),(672,'ΝΙΚΑΙΑΣ  ΕΣΠΕΡΙΝΟΝ '),(673,'ΚΑΜΙΝΙΩΝ '),(674,'ΕΙΔ  ΑΝΑΠ  ΙΛΙΟΥ '),(675,'ΚΟΡΩΠΙΟΥ '),(676,'ΠΑΙΑΝΙΑΣ '),(677,'ΑΡΤΕΜΙΔΑΣ '),(678,'ΣΠΑΤΩΝ '),(679,'ΠΑΛΛΗΝΗΣ  ΑΤΤΙΚΗΣ '),(680,'ΒΑΡΗΣ  ΑΤΤΙΚΗΣ '),(681,'ΓΕΡΑΚΑ '),(682,'ΜΑΡΚΟΠΟΥΛΟΥ '),(683,'ΑΝΟΙΞΗΣ '),(684,'ΔΡΟΣΙΑΣ '),(685,'ΑΓΙΟΥ  ΣΤΕΦΑΝΟΥ  ΑΤΤΙΚΗ '),(686,'ΔΙΟΝΥΣΟΥ '),(687,'ΜΑΡΑΘΩΝΟΣ '),(688,'ΚΑΠΑΝΔΡΙΤΙΟΥ '),(689,'ΤΑΞ  ΛΥΚ  ΚΑΛΑΜΟΥ '),(690,'ΝΕΑΣ  ΜΑΚΡΗΣ  ΑΤΤΙΚΗΣ '),(691,'ΚΕΡΑΤΕΑΣ '),(692,'ΑΝΑΒΥΣΣΟΥ '),(693,'ΚΑΛΥΒΙΩΝ  ΘΟΡΙΚΟΥ '),(694,'ΓΛΥΚΩΝ  ΝΕΡΩΝ '),(695,'ΛΑΥΡΙΟΥ '),(696,'ΘΡΑΚΟΜΑΚΕΔΟΝΩΝ '),(697,'ΛΥΚ  ΑΧΑΡΝΩΝ  ΕΣΠΕΡ. '),(698,'ΠΑΛΛΗΝΗΣ '),(699,'ΡΑΦΗΝΑΣ '),(700,'Τ.Λ.Γ  ΑΡΤΕΜΙΔΑΣ  ΛΟΥΤΣΑΣ '),(701,'ΣΚΑΛΑΣ  ΩΡΟΠΟΥ  ΑΤΤΙΚΗΣ '),(702,'ΑΣΠΡΟΠΥΡΓΟΥ  ΑΤΤΙΚΗΣ '),(703,'ΖΕΦΥΡΙΟΥ '),(704,'ΝΕΑΣ  ΠΕΡΑΜΟΥ '),(705,'ΕΡΥΘΡΩΝ  ΑΤΤΙΚΗΣ '),(706,'ΜΑΝΔΡΑΣ  ΑΤΤΙΚΗΣ '),(707,'ΜΑΓΟΥΛΑΣ '),(708,'ΑΥΛΩΝΟΣ '),(709,'ΓΑΛΑΤΑ  ΠΟΡΟΥ '),(710,'ΚΑΛΑΒΡΥΤΩΝ '),(711,'ΕΠΛ  ΑΙΓΙΟΥ '),(712,'ΠΑΤΡΑΣ  ΚΩΦ  ΒΑΡΥΚ '),(713,'ΠΑΤΡΩΝ  ΕΣΠ '),(714,'ΠΑΤΡΩΝ  ΠΕΙΡΑΜΑΤΙΚΟ '),(715,'ΠΑΤΡΩΝ  ΠΕΙΡΑΜ.ΠΑΝΕΠΙΣ '),(716,'ΠΑΤΡΩΝ  ΚΛΑΣΣΙΚΟ '),(717,'ΕΠΛ  ΠΑΤΡΑΣ '),(718,'ΠΑΤΡΩΝ  ΜΟΥΣΙΚΟ '),(719,'ΚΑΣΤΡΙΤΣΙΟΥ '),(720,'ΔΕΜΕΝΙΚΩΝ '),(721,'ΠΑΤΡΩΝ  ΕΣΠΕΡΙΝΟΝ '),(722,'ΠΑΡΑΛΙΑΣ  ΠΑΤΡΑΣ '),(723,'ΚΑΜΑΡΩΝ  ΑΧΑΙΑΣ '),(724,'ΚΑΤΩ  ΑΧΑΙΑΣ '),(725,'ΕΡΥΜΑΝΘΕΙΑΣ '),(726,'ΛΑΠΠΑ  ΑΧΑΙΑΣ '),(727,'ΛΟΥΣΙΚΩΝ  ΑΧΑΙΑΣ '),(728,'ΑΚΡΑΤΑΣ '),(729,'ΔΙΑΚΟΠΤΟΥ '),(730,'ΔΑΦΝΗΣ  ΚΑΛΑΒΡΥΤΩΝ '),(731,'ΚΑΤΩ  ΚΛΕΙΤΟΡΙΑΣ '),(732,'ΒΡΑΧΝΕΙΚΩΝ  ΠΑΤΡΩΝ '),(733,'ΡΙΟΥ '),(734,'ΑΡΑΧΩΒΗΣ '),(735,'ΒΑΓΙΩΝ '),(736,'ΘΕΣΠΙΩΝ '),(737,'ΔΙΣΤΟΜΟΥ  ΜΠΑΡΛΕΙΟΝ '),(738,'ΣΧΗΜΑΤΑΡΙΟΥ '),(739,'ΟΙΝΟΦΥΤΩΝ  ΘΗΒΩΝ '),(740,'ΑΛΙΑΡΤΟΥ '),(741,'ΔΑΥΛΕΙΑΣ '),(742,'ΑΣΠΡΩΝ  ΣΠΙΤΙΩΝ '),(743,'ΔΕΣΚΑΤΗΣ '),(744,'ΚΑΡΠΕΡΟΥ  ΓΡΕΒΕΝΩΝ '),(745,'901010 '),(746,'940040 '),(747,'940050 '),(748,'940060 '),(749,'940065 '),(750,'ΚΑΤΩ  ΝΕΥΡΟΚΟΠΙΟΥ '),(751,'950040 '),(752,'951009 '),(753,'951010 '),(754,'951020 '),(755,'951030 '),(756,'951040 '),(757,'ΔΟΞΑΤΟΥ  ΔΡΑΜΑΣ '),(758,'951065 '),(759,'ΔΡΑΜΑΣ  ΜΟΥΣΙΚΟ '),(760,'952010 '),(761,'953010 '),(762,'954010 '),(763,'ΠΡΟΣΟΤΣΑΝΗΣ '),(764,'956010 '),(765,'ΚΑΛΑΜΠΑΚΙΟΥ  ΔΡΑΜΑΣ '),(766,'957010 '),(767,'990030 '),(768,'990040 '),(769,'ΠΑΤΜΟΥ '),(770,'ΛΕΡΟΥ '),(771,'ΕΠΛ  ΡΟΔΟΥ '),(772,'ΡΟΔΟΥ  ΕΣΠΕΡΙΝΟΝ '),(773,'ΣΟΡΩΝΗΣ '),(774,'ΚΡΕΜΑΣΤΗΣ  ΡΟΔΟΥ '),(775,'ΑΦΑΝΤΟΥ  ΡΟΔΟΥ '),(776,'ΙΑΛΥΣΟΥ  ΡΟΔΟΥ '),(777,'ΑΡΧΑΓΓΕΛΟΥ '),(778,'Τ.ΛΥΚ.ΓΥΜ  ΧΑΛΚΗΣ '),(779,'ΑΝΤΙΜΑΧΕΙΑΣ '),(780,'ΔΙΔΥΜΟΤΕΙΧΟΥ '),(781,'ΔΙΚΑΙΩΝ  ΟΡΕΣΤΙΑΔΟΣ '),(782,'ΣΑΜΟΘΡΑΚΗΣ '),(783,'ΣΟΥΦΛΙΟΥ '),(784,'ΦΕΡΩΝ '),(785,'ΝΕΑΣ  ΒΥΣΣΗΣ '),(786,'ΧΑΛΚΙΔΑΣ  ΕΣΠΕΡΙΝΟΝ '),(787,'ΚΑΝΗΘΟΥ  ΕΥΒΟΙΑΣ '),(788,'ΒΑΣΙΛΙΚΟΥ  ΕΥΒΟΙΑΣ '),(789,'ΨΑΧΝΩΝ  ΕΥΒΟΙΑΣ '),(790,'ΝΕΑΣ  ΑΡΤΑΚΗΣ '),(791,'ΒΑΘΕΟΣ  ΑΥΛΙΔΟΣ '),(792,'ΑΛΙΒΕΡΙΟΥ '),(793,'ΙΣΤΙΑΙΑΣ '),(794,'ΚΑΡΥΣΤΟΥ '),(795,'ΑΥΛΩΝΑΡΙΟΥ '),(796,'ΑΜΑΡΥΝΘΟΥ  ΕΥΒΟΙΑΣ '),(797,'ΚΥΜΗΣ '),(798,'ΚΟΝΙΣΤΡΩΝ  ΕΥΒΟΙΑΣ '),(799,'ΛΙΜΝΗΣ  ΕΥΒΟΙΑΣ '),(800,'ΛΟΥΤΡΩΝ  ΑΙΔΗΨΟΥ '),(801,'ΜΑΝΤΟΥΔΙΟΥ  ΕΥΒΟΙΑΣ '),(802,'ΣΚΥΡΟΥ '),(803,'ΚΑΡΠΕΝΗΣΙΟΥ '),(804,'ΖΑΚΥΝΘΟΥ '),(805,'Π  Λ  ΖΑΚΥΝΘΟΥ '),(806,'ΖΑΚΥΝΘΟΥ  ΜΟΥΣΙΚ '),(807,'ΚΑΤΑΣΤΑΡΙΟΥ  ΖΑΚΥΝΘΟΥ '),(808,'Τ.Λ  ΓΥΜ.  ΒΟΛΙΜΩΝ  ΖΑΚΥΝΘΟΥ '),(809,'ΓΑΣΤΟΥΝΗΣ '),(810,'ΑΝΔΡΙΤΣΑΙΝΗΣ '),(811,'ΠΕΛΟΠΙΟΥ '),(812,'ΖΑΧΑΡΩΣ '),(813,'ΚΡΕΣΤΕΝΩΝ '),(814,'ΛΕΧΑΙΝΩΝ '),(815,'ΑΝΔΡΑΒΙΔΑΣ '),(816,'ΒΑΡΘΟΛΟΜΙΟΥ '),(817,'ΛΑΛΑ  ΗΛΕΙΑΣ '),(818,'ΝΕΑΣ  ΦΙΓΑΛΕΙΑΣ '),(819,'ΣΙΜΟΠΟΥΛΟΥ '),(820,'ΒΑΣΙΛΑΚΙΟΥ '),(821,'ΒΑΡΔΑΣ '),(822,'ΚΑΡΑΤΟΥΛΑ '),(823,'ΜΕΛΙΚΗΣ '),(824,'ΜΑΚΡΟΧΩΡΙΟΥ  ΒΕΡΟΙΑΣ '),(825,'ΕΠΙΣΚΟΠΗΣ '),(826,'ΑΓ  ΜΥΡΩΝΑ '),(827,'ΑΡΚΑΛΟΧΩΡΙΟΥ '),(828,'ΑΡΧΑΝΩΝ  ΗΡΑΚΛΕΙΟΥ '),(829,'ΒΙΑΝΝΟΥ '),(830,'ΚΑΣΤΕΛΛΙΟΥ  ΠΕΔΙΑΔΟΣ '),(831,'ΜΟΙΡΩΝ '),(832,'ΠΟΜΠΙΑΣ '),(833,'ΧΑΡΑΚΑ '),(834,'ΑΓΙΑΣ  ΒΑΡΒΑΡΑΣ '),(835,'ΚΡΟΥΣΩΝΟΣ '),(836,'ΜΕΛΕΣΩΝ '),(837,'ΜΟΧΟΥ '),(838,'ΤΥΜΠΑΚΙΟΥ '),(839,'ΓΟΥΒΩΝ '),(840,'ΑΣΗΜΙΟΥ '),(841,'ΜΑΛΙΩΝ  ΠΕΔΙΑΔΑΣ '),(842,'ΑΓ  ΔΕΚΑ '),(843,'Ν.ΑΛΙΚΑΡΝΑΣΣΟΥ '),(844,'ΓΑΖΙΟΥ  ΗΡΑΚΛΕΙΟ '),(845,'ΗΡΑΚΛΕΙΟΥ  ΕΣΠΕΡΙΝΟ '),(846,'ΠΑΡΑΜΥΘΙΑΣ '),(847,'ΦΙΛΙΑΤΩΝ '),(848,'ΜΑΡΓΑΡΙΤΙΟΥ '),(849,'ΝΕΑΠΟΛΗΣ '),(850,'ΑΓ  ΑΘΑΝΑΣΙΟΥ '),(851,'ΧΑΛΑΣΤΡΑΣ '),(852,'ΒΑΣΙΛΙΚΩΝ '),(853,'ΘΕΣ/ΝΙΚΗΣ '),(854,'Λ  ΚΑΛΑΜΑΡΙΑΣ '),(855,'ΘΕΣ/ΝΙΚΗΣ  Β  ΕΣΠΕΡΙΝΟΝ '),(856,'ΝΕΑΠΟΛΗΣ  ΘΕΣ/ΝΙΚΗΣ '),(857,'ΘΕΣ/ΝΙΚΗΣ  Α  ΕΣΠΕΡΙΝΟΝ '),(858,'ΤΡΙΑΝΔΡΙΑΣ '),(859,'Ν.  ΕΠΙΒΑΤΩΝ '),(860,'ΠΑΝΟΡΑΜΑΤΟΣ  ΘΕΣ/ΚΗΣ '),(861,'ΑΓΙΟΥ  ΑΘΑΝΑΣΙΟΥ '),(862,'ΔΙΑΒΑΤΩΝ '),(863,'ΘΕΣΣ/ΝΙΚΗΣ '),(864,'ΑΜΠΕΛΟΚΗΠΩΝ  ΕΣΠΕΡΙΝ '),(865,'ΜΕΤΕΩΡΩΝ  ΘΕΣ/ΚΗΣ '),(866,'ΑΣΒΕΣΤΟΧΩΡΙΟΥ '),(867,'ΖΑΓΚΛΙΒΕΡΙΟΥ '),(868,'ΛΑΓΚΑΔΑ '),(869,'ΛΑΓΚΑΔΙΚΙΩΝ '),(870,'ΠΑΡΑΛ.ΣΤΑΥΡΟΥ '),(871,'ΕΠΑΝΟΜΗΣ '),(872,'ΚΟΥΦΑΛΙΩΝ '),(873,'ΝΕΑΣ  ΧΑΛΚΗΔΟΝΑΣ '),(874,'ΑΔΕΝΔΡΟΥ '),(875,'ΣΟΧΟΥ '),(876,'ΔΡΥΜΟΥ '),(877,'ΝΕΑΣ  ΜΑΔΥΤΟΥ '),(878,'ΝΕΑΣ  ΜΕΣΗΜΒΡΙΑΣ '),(879,'ΠΡΟΧΩΜΑΤΟΣ '),(880,'ΝΕΑΣ  ΜΗΧΑΝΙΩΝΑΣ '),(881,'ΧΑΛΑΣΤΡΑΣ  ΘΕΣ/ΝΙΚΗΣ '),(882,'ΣΙΝΔΟΥ '),(883,'ΚΥΜΙΝΩΝ '),(884,'ΩΡΑΙΟΚΑΣΤΡΟΥ  ΘΕΣ/ΚΗΣ '),(885,'ΝΕΑΠΟΛΕΩΣ '),(886,'ΚΟΝΙΤΣΑΣ '),(887,'ΙΩΑΝΝΙΝΩΝ  ΚΛΑΣΣΙΚΟ '),(888,'ΙΩΑΝΝΙΝΩΝ  ΖΩΣΙΜΑΙΑ  ΣΧ '),(889,'ΑΝΑΤΟΛΗΣ  ΙΩΑΝΝΙΝΩΝ '),(890,'ΔΕΡΒΙΖΙΑΝΩΝ '),(891,'ΔΟΛΙΑΝΩΝ '),(892,'ΚΟΝΙΤΣΗΣ '),(893,'ΜΕΤΣΟΒΟΥ '),(894,'ΖΙΤΣΗΣ '),(895,'ΠΩΓΩΝΙΑΝΗΣ '),(896,'ΚΑΤΣΙΚΑ  ΙΩΑΝΝΙΝΩΝ '),(897,'ΕΛΕΟΥΣΑΣ '),(898,'ΙΩΑΝΝΙΝΩΝ '),(899,'ΙΩΑΝΝΙΝΩΝ  ΕΣΠΕΡΙΝΟ '),(900,'ΕΛΕΥΘΕΡΟΥΠΟΛΕΩΣ  ΚΑΒΑΛ '),(901,'ΧΡΥΣΟΥΠΟΛΕΩΣ '),(902,'ΛΙΜΕΝΟΣ  ΘΑΣΟΥ '),(903,'ΠΟΔΟΧΩΡΙΟΥ  ΚΑΒΑΛΑΣ '),(904,'ΝΙΚΗΣΙΑΝΗΣ '),(905,'ΚΡΗΝΙΔΩΝ '),(906,'ΛΙΜΕΝΑΡΙΩΝ  ΘΑΣΟΥ '),(907,'Ν.ΠΕΡΑΜΟΥ '),(908,'ΚΑΡΔΙΤΣΗΣ  ΕΣΠΕΡΙΝΟΝ '),(909,'ΠΑΛΑΜΑ '),(910,'ΜΟΥΖΑΚΙΟΥ '),(911,'ΣΟΦΑΔΩΝ '),(912,'ΦΑΝΑΡΙΟΥ '),(913,'ΚΑΡΔΙΤΣΑΣ  ΕΣΠ '),(914,'ΛΕΟΝΤΑΡΙΟΥ '),(915,'ΜΗΤΡΟΠΟΛΗΣ '),(916,'ΠΡΟΑΣΤΙΟΥ '),(917,'ΚΕΔΡΟΥ  ΚΑΡΔΙΤΣΑΣ '),(918,'ΑΡΓΟΥΣ  ΟΡΕΣΤΙΚΟΥ '),(919,'ΚΑΣΤΟΡΙΑΣ  ΕΣΠΕΡΙΝ '),(920,'ΝΕΣΤΟΡΙΟΥ '),(921,'ΜΕΣΟΠΟΤΑΜΙΑΣ '),(922,'ΚΕΡΚΥΡΑΣ  ΜΟΥΣΙΚ '),(923,'ΛΕΥΚΙΜΜΗΣ '),(924,'ΑΓΡΟΥ '),(925,'ΚΑΣΤΕΛΛΑΝΩΝ  ΚΕΡΚΥΡΑΣ '),(926,'ΣΚΡΙΠΕΡΟΥ '),(927,'ΚΑΤΩ  ΚΟΡΑΚΙΑΝΩΝ '),(928,'ΚΕΡΑΜΕΙΩΝ '),(929,'ΛΗΞΟΥΡΙΟΥ '),(930,'ΣΑΜΗΣ '),(931,'ΙΘΑΚΗΣ '),(932,'ΓΟΥΜΕΝΙΣΣΗΣ '),(933,'ΧΕΡΣΟΥ  ΚΙΛΚΙΣ '),(934,'ΜΟΥΡΙΩΝ  ΚΙΛΚΙΣ '),(935,'ΠΟΛΥΚΑΣΤΡΟΥ  ΚΙΛΚΙΣ '),(936,'ΕΥΡΩΠΟΥ  ΚΙΛΚΙΣ '),(937,'ΚΟΖΑΝΗΣ '),(938,'ΕΡΑΤΥΡΑΣ '),(939,'ΝΕΑΠΟΛΕΩΣ  ΚΟΖΑΝΗΣ '),(940,'ΣΕΡΒΙΩΝ '),(941,'ΣΙΑΤΙΣΤΗΣ '),(942,'ΤΣΟΤΥΛΙΟΥ '),(943,'ΒΕΛΒΕΝΤΟΥ '),(944,'ΒΕΛΟΥ '),(945,'ΓΚΟΥΡΑΣ '),(946,'ΔΕΡΒΕΝΙΟΥ '),(947,'ΚΙΑΤΟΥ '),(948,'ΞΥΛΟΚΑΣΤΡΟΥ '),(949,'ΛΟΥΤΡΑΚΙΟΥ '),(950,'ΝΕΜΕΑΣ '),(951,'ΧΙΛΙΟΜΟΔΙΟΥ '),(952,'ΑΓΙΩΝ  ΘΕΟΔΩΡΩΝ '),(953,'ΕΠΛ  ΣΥΡΟΥ '),(954,'ΣΥΡΟΥ '),(955,'ΑΝΔΡΟΥ  ΕΜΠΕΙΡΙΚΕΙΟ '),(956,'ΘΗΡΑΣ '),(957,'ΜΗΛΟΥ '),(958,'ΝΑΞΟΥ '),(959,'ΤΡΑΓΑΙΑΣ  ΝΑΞΟΥ '),(960,'ΤΑΞ  ΛΥΚ.ΓΥΜ  ΔΟΝΟΥΣΑ '),(961,'ΤΑΞ  ΛΥΚ.ΓΥΜ  ΚΟΥΦΟΝΗΣΙΩΝ '),(962,'ΠΑΡΟΥ '),(963,'ΝΑΟΥΣΑΣ  ΠΑΡΟΥ '),(964,'ΤΗΝΟΥ '),(965,'ΜΥΚΟΝΟΥ '),(966,'ΙΟΥ '),(967,'ΦΙΛΟΤΙΟΥ  ΝΑΞΟΥ '),(968,'ΕΛΟΥΣ '),(969,'ΕΣΠΕΡΙΝΟ  ΣΠΑΡΤΗΣ '),(970,'ΑΡΕΟΠΟΛΕΩΣ '),(971,'ΒΛΑΧΙΩΤΗ '),(972,'ΓΥΘΕΙΟΥ '),(973,'ΚΑΣΤΟΡΕΙΟΥ '),(974,'ΚΡΟΚΕΩΝ '),(975,'ΣΚΑΛΑΣ '),(976,'ΜΟΛΑΩΝ '),(977,'ΝΕΑΠΟΛΕΩΣ  ΛΑΚΩΝΙΑΣ '),(978,'ΞΗΡΟΚΑΜΠΙΟΥ '),(979,'ΓΕΡΑΚΙΟΥ '),(980,'ΜΟΝΕΜΒΑΣΙΑΣ '),(981,'ΛΑΡΙΣΑΣ '),(982,'ΛΑΡΙΣΑΣ  ΜΟΥΣΙΚ '),(983,'ΝΙΚΑΙΑΣ  ΛΑΡΙΣΗΣ '),(984,'ΑΓΙΑΣ '),(985,'ΓΟΝΝΩΝ '),(986,'ΤΣΑΡΙΤΣΑΝΗΣ '),(987,'ΣΥΚΟΥΡΙΟΥ '),(988,'ΑΜΠΕΛΩΝΟΣ '),(989,'ΤΥΡΝΑΒΟΥ '),(990,'ΛΙΒΑΔΙΟΥ  ΛΑΡΙΣΑΣ '),(991,'ΠΥΡΓΕΤΟΥ  ΛΑΡΙΣΑΣ '),(992,'ΓΙΑΝΝΟΥΛΗΣ '),(993,'ΚΡΑΝΕΑΣ  ΕΛΑΣΣΟΝΟΣ '),(994,'ΠΛΑΤΥΚΑΜΠΟΥ  ΛΑΡΙΣΑΣ '),(995,'ΚΑΛΛΙΘΕΑΣ  ΛΑΡΙΣΑΣ '),(996,'ΑΓΙΟΥ  ΝΙΚΟΛΑΟΥ  ΚΛΑΣ. '),(997,'ΑΓΙΟΥ  ΝΙΚΟΛΑΟΥ '),(998,'ΝΕΑΠΟΛΕΩΣ  ΛΑΣΗΘΙΟΥ '),(999,'ΣΗΤΕΙΑΣ '),(1000,'ΤΖΕΡΜΙΑΔΩΝ '),(1001,'ΑΓΙΑΣΟΥ '),(1002,'ΜΥΤΙΛΗΝΗΣ '),(1003,'ΜΥΡΙΝΑΣ '),(1004,'ΚΑΛΛΟΝΗΣ '),(1005,'ΜΥΡΙΝΗΣ '),(1006,'ΜΑΝΤΑΜΑΔΟΥ  ΛΕΣΒΟΥ '),(1007,'ΚΑΛΟΝΗΣ '),(1008,'ΓΕΡΑΣ '),(1009,'ΠΛΩΜΑΡΙΟΥ '),(1010,'ΠΟΛΙΧΝΙΤΟΥ '),(1011,'ΑΝΤΙΣΣΗΣ '),(1012,'ΠΑΜΦΙΛΩΝ  ΛΕΣΒΟΥ '),(1013,'ΠΕΤΡΑΣ  ΛΕΣΒΟΥ '),(1014,'ΜΟΥΔΡΟΥ '),(1015,'ΤΑΞ.ΛΥΚ.ΓΥΜ  ΑΓΡΑΣ '),(1016,'ΜΥΤΙΛΗΝΗΣ  ΕΣΠΕΡ '),(1017,'ΑΓ  ΕΥΣΤΡΑΤΙΟΥ '),(1018,'ΚΑΡΥΑΣ  ΛΕΥΚΑΔΟΣ '),(1019,'ΝΥΔΡΙΟΥ '),(1020,'ΒΕΛΕΣΤΙΝΟΥ '),(1021,'ΣΚΟΠΕΛΟΥ '),(1022,'ΒΟΛΟΥ  ΕΣΠΕΡΙΝΟΝ '),(1023,'Ν.ΙΩΝΙΑΣ  ΒΟΛΟΥ  ΓΕΝΙΚΟ '),(1024,'ΑΓΡΙΑΣ '),(1025,'ΑΛΜΥΡΟΥ '),(1026,'ΖΑΓΟΡΑΣ '),(1027,'ΤΣΑΓΚΑΡΑΔΑΣ '),(1028,'ΑΡΓΑΛΑΣΤΗΣ '),(1029,'ΣΚΙΑΘΟΥ '),(1030,'ΚΑΝΑΛΙΩΝ '),(1031,'ΝΕΑΣ  ΑΓΧΙΑΛΟΥ '),(1032,'ΚΑΛΑΜΑΤΑΣ  ΕΣΠΕΡΙΝΟΝ '),(1033,'ΚΑΛΑΜΑΤΑΣ  ΜΟΥΣΙΚΟ '),(1034,'ΜΕΣΣΗΝΗΣ '),(1035,'ΘΟΥΡΙΑΣ '),(1036,'ΑΝΔΡΟΥΣΗΣ '),(1037,'ΑΡΙΣΤΟΜΕΝΟΥΣ '),(1038,'ΑΡΦΑΡΩΝ '),(1039,'ΓΑΡΓΑΛΙΑΝΩΝ '),(1040,'ΧΩΡΑΣ  ΤΡΙΦΥΛΙΑΣ '),(1041,'ΜΕΛΙΓΑΛΑ '),(1042,'ΔΙΑΒΟΛΙΤΣΙΟΥ '),(1043,'ΔΩΡΙΟΥ '),(1044,'ΚΟΠΑΝΑΚΙΟΥ '),(1045,'ΚΟΡΩΝΗΣ '),(1046,'ΚΥΠΑΡΙΣΣΙΑΣ '),(1047,'ΠΥΛΟΥ '),(1048,'ΜΕΘΩΝΗΣ '),(1049,'ΠΕΤΑΛΙΔΙΟΥ '),(1050,'ΦΙΛΙΑΤΡΩΝ '),(1051,'ΚΑΡΔΑΜΥΛΗΣ '),(1052,'ΣΤΑΥΡΟΥΠΟΛΕΩΣ '),(1053,'ΑΒΔΗΡΩΝ  ΞΑΝΘΗΣ '),(1054,'ΕΧΙΝΟΥ  ΞΑΝΘΗΣ  ΙΕΡΑΣΠ '),(1055,'ΓΛΑΥΚΗΣ '),(1056,'ΕΠΛ  ΑΡΙΔΑΙΑΣ '),(1057,'ΕΠΛ  ΓΙΑΝΝΙΤΣΩΝ '),(1058,'ΚΡΥΑΣ  ΒΡΥΣΗΣ '),(1059,'ΕΔΕΣΣΑΣ '),(1060,'ΕΞΑΠΛΑΤΑΝΟΥ '),(1061,'ΣΚΥΔΡΑΣ '),(1062,'ΚΑΛΗΣ '),(1063,'ΚΑΤΕΡΙΝΗΣ  ΕΣΠΕΡΙΝΟ '),(1064,'ΑΙΓΙΝΙΟΥ '),(1065,'ΚΟΛΥΝΔΡΟΥ '),(1066,'ΛΙΤΟΧΩΡΟΥ '),(1067,'ΚΟΝΤΑΡΙΩΤΙΣΣΑΣ '),(1068,'Λ  ΦΙΛΙΠΠΙΑΔΑΣ '),(1069,'Λ  ΚΑΝΑΛΑΚΙΟΥ '),(1070,'ΠΡΕΒΕΖΑΣ '),(1071,'ΚΑΝΑΛΑΚΙΟΥ '),(1072,'ΕΠΛ  ΠΡΕΒΕΖΑΣ '),(1073,'ΘΕΣΠΡΩΤΙΚΟΥ '),(1074,'ΠΑΡΓΑΣ '),(1075,'ΛΟΥΡΟΥ '),(1076,'ΑΝΩΓΕΙΩΝ '),(1077,'ΠΕΡΑΜΑΤΟΣ  ΜΥΛΟΠΟΤΑΜΟΥ '),(1078,'ΣΠΗΛΙΟΥ '),(1079,'ΦΟΥΡΦΟΥΡΑ '),(1080,'ΣΑΠΠΩΝ '),(1081,'ΙΑΣΜΟΥ  ΚΟΜΟΤΗΝΗΣ '),(1082,'ΞΥΛΑΓΑΝΗΣ '),(1083,'ΚΑΡΛΟΒΑΣΙΟΥ '),(1084,'ΣΑΜΟΥ '),(1085,'ΙΚΑΡΙΑΣ '),(1086,'ΑΓΙΟΥ  ΚΗΡΥΚΟΥ '),(1087,'ΕΥΔΗΛΟΥ  ΙΚΑΡΙΑΣ '),(1088,'ΜΑΡΑΘΟΚΑΜΠΟΥ '),(1089,'ΤΕΕ  ΗΡΑΚΛΕΙΑΣ '),(1090,'ΑΛΙΣΤΡΑΤΗΣ '),(1091,'ΗΡΑΚΛΕΙΑΣ '),(1092,'ΚΑΤΩ  ΠΟΡΟΙΩΝ '),(1093,'ΝΕΑΣ  ΖΙΧΝΗΣ '),(1094,'ΝΙΓΡΙΤΗΣ '),(1095,'ΤΕΡΠΝΗΣ  ΣΕΡΡΩΝ '),(1096,'ΠΡΩΤΗΣ  ΣΕΡΡΩΝ '),(1097,'ΡΟΔΟΛΙΒΟΥΣ '),(1098,'ΣΙΔΗΡΟΚΑΣΤΡΟΥ  ΣΕΡΡΩΝ '),(1099,'ΒΥΡΩΝΕΙΑΣ '),(1100,'ΠΡΟΒΑΤΑ '),(1101,'ΣΤΡΥΜΟΝΙΚΟΥ '),(1102,'ΜΑΥΡΟΘΑΛΑΣΣΗΣ '),(1103,'ΠΕΝΤΑΠΟΛΕΩΣ '),(1104,'ΝΕΟΥ  ΣΚΟΠΟΥ  ΣΕΡΡΩΝ '),(1105,'ΣΚΟΥΤΑΡΕΩΣ '),(1106,'ΤΡΙΚΑΛΩΝ  ΕΣΠΕΡΙΝΟΝ '),(1107,'ΚΑΛΑΜΠΑΚΑΣ '),(1108,'ΠΥΛΗΣ '),(1109,'ΟΙΧΑΛΙΑΣ-ΝΕΟΧΩΡΙΟΥ '),(1110,'ΒΑΛΤΙΝΟΥ  ΤΡΙΚΑΛΩΝ '),(1111,'ΛΑΜΙΑΣ  ΕΣΠΕΡΙΝΟΝ '),(1112,'ΣΤΥΛΙΔΟΣ '),(1113,'ΑΜΦΙΚΛΕΙΑΣ '),(1114,'ΑΤΑΛΑΝΤΗΣ '),(1115,'ΔΟΜΟΚΟΥ '),(1116,'ΜΑΚΡΑΚΩΜΗΣ '),(1117,'ΜΩΛΟΥ '),(1118,'ΣΠΕΡΧΕΙΑΔΟΣ '),(1119,'ΥΠΑΤΗΣ '),(1120,'ΑΓΙΟΥ  ΓΕΩΡΓΙΟΥ  ΤΥΜΦΡΗ '),(1121,'ΕΛΑΤΕΙΑΣ '),(1122,'ΜΑΡΤΙΝΟΥ '),(1123,'ΜΑΛΕΣΙΝΑΣ '),(1124,'ΛΑΡΥΜΝΑΣ  ΛΟΚΡΙΔΟΣ '),(1125,'ΠΕΛΑΣΓΙΑΣ '),(1126,'ΚΑΤΩ  ΤΙΘΟΡΕΑΣ '),(1127,'ΛΙΒΑΝΑΤΩΝ '),(1128,'ΚΑΜΕΝΩΝ  ΒΟΥΡΛΩΝ '),(1129,'ΦΛΩΡΙΝΑΣ '),(1130,'ΑΜΥΝΤΑΙΟΥ '),(1131,'ΑΜΦΙΣΣΑΣ '),(1132,'ΙΤΕΑΣ '),(1133,'ΓΑΛΑΞΕΙΔΙΟΥ '),(1134,'ΕΥΠΑΛΙΟΥ '),(1135,'ΛΙΔΟΡΙΚΙΟΥ '),(1136,'ΓΡΑΒΙΑΣ '),(1137,'ΑΓΙΟΥ  ΝΙΚΟΛΑΟΥ  ΧΑΛΚΙΔ '),(1138,'ΑΡΝΑΙΑΣ '),(1139,'ΚΑΣΣΑΝΔΡΑΣ '),(1140,'ΝΕΑΣ  ΚΑΛΛΙΚΡΑΤΕΙΑΣ '),(1141,'ΝΕΩΝ  ΜΟΥΔΑΝΙΩΝ '),(1142,'ΙΕΡΙΣΣΟΥ '),(1143,'ΣΥΚΙΑΣ '),(1144,'ΝΕΑΣ  ΤΡΙΓΛΙΑΣ '),(1145,'ΒΑΜΟΥ  ΧΑΝΙΩΝ '),(1146,'ΚΙΣΣΑΜΟΥ '),(1147,'ΠΑΛΑΙΟΧΩΡΑΣ '),(1148,'ΒΟΥΚΟΛΙΩΝ '),(1149,'ΚΟΛΥΜΒΑΡΙΟΥ '),(1150,'ΧΩΡΑΣ  ΣΦΑΚΙΩΝ  Α,Β '),(1151,'ΑΛΙΚΙΑΝΟΥ '),(1152,'ΣΟΥΔΑΣ  ΧΑΝΙΩΝ '),(1153,'ΒΟΛΙΣΣΟΥ  ΧΙΟΥ '),(1154,'ΨΑΡΩΝ '),(1155,'ΚΑΛΑΜΩΤΗΣ '),(1156,'ΚΑΡΔΑΜΥΛΩΝ '),(1157,'ΚΑΛΛΙΜΑΣΙΑΣ '),(1158,'ΚΑΜΠΟΥ '),(1159,'ΑΜΠΕΛΑΚΙΩΝ  ΣΑΛΑΜΙΝ '),(1160,'ΑΙΓΙΝΗΣ '),(1161,'ΚΥΘΗΡΩΝ '),(1162,'ΥΔΡΑΣ '),(1163,'ΣΠΕΤΣΩΝ ');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `directions`
--

DROP TABLE IF EXISTS `directions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `directions` (
  `direction_id` int(11) NOT NULL AUTO_INCREMENT,
  `direction_name` varchar(64) DEFAULT NULL,
  `schooltype_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`direction_id`),
  KEY `schooltype_id` (`schooltype_id`),
  CONSTRAINT `directions_ibfk_1` FOREIGN KEY (`schooltype_id`) REFERENCES `schooltypes` (`schooltype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `directions`
--

LOCK TABLES `directions` WRITE;
/*!40000 ALTER TABLE `directions` DISABLE KEYS */;
INSERT INTO `directions` VALUES (1,'ais8itiki',8);
/*!40000 ALTER TABLE `directions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `errors`
--

DROP TABLE IF EXISTS `errors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `errors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(3) DEFAULT NULL,
  `error_message` longtext,
  `file` varchar(64) DEFAULT NULL,
  `description` longtext,
  `event_datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `client_ip` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=327 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `errors`
--

LOCK TABLES `errors` WRITE;
/*!40000 ALTER TABLE `errors` DISABLE KEYS */;
INSERT INTO `errors` VALUES (224,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:02','94.64.50.139'),(225,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:08','94.64.50.139'),(226,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:08','94.64.50.139'),(227,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:08','94.64.50.139'),(228,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:09','94.64.50.139'),(229,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:14','94.64.50.139'),(230,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:15','94.64.50.139'),(231,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:15','94.64.50.139'),(232,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:15','94.64.50.139'),(233,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:16','94.64.50.139'),(234,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:16','94.64.50.139'),(235,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:16','94.64.50.139'),(236,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:16','94.64.50.139'),(237,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:16','94.64.50.139'),(238,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:16','94.64.50.139'),(239,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:16','94.64.50.139'),(240,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:16','94.64.50.139'),(241,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:16','94.64.50.139'),(242,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:16','94.64.50.139'),(243,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:16','94.64.50.139'),(244,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:16','94.64.50.139'),(245,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:16','94.64.50.139'),(246,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:16','94.64.50.139'),(247,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:16','94.64.50.139'),(248,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:16','94.64.50.139'),(249,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:17','94.64.50.139'),(250,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:17','94.64.50.139'),(251,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:17','94.64.50.139'),(252,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:17','94.64.50.139'),(253,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:17','94.64.50.139'),(254,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:17','94.64.50.139'),(255,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:17','94.64.50.139'),(256,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:19','94.64.50.139'),(257,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:20','94.64.50.139'),(258,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:20','94.64.50.139'),(259,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:20','94.64.50.139'),(260,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:20','94.64.50.139'),(261,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:20','94.64.50.139'),(262,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:20','94.64.50.139'),(263,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:20','94.64.50.139'),(264,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:21','94.64.50.139'),(265,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:21','94.64.50.139'),(266,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:21','94.64.50.139'),(267,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:21','94.64.50.139'),(268,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:21','94.64.50.139'),(269,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:21','94.64.50.139'),(270,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:21','94.64.50.139'),(271,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:21','94.64.50.139'),(272,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:21','94.64.50.139'),(273,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:21','94.64.50.139'),(274,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:21','94.64.50.139'),(275,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:21','94.64.50.139'),(276,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:21','94.64.50.139'),(277,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:21','94.64.50.139'),(278,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:21','94.64.50.139'),(279,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:21','94.64.50.139'),(280,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:21','94.64.50.139'),(281,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:22','94.64.50.139'),(282,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:22','94.64.50.139'),(283,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:22','94.64.50.139'),(284,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:22','94.64.50.139'),(285,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:22','94.64.50.139'),(286,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:23','94.64.50.139'),(287,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:23','94.64.50.139'),(288,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:23','94.64.50.139'),(289,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:23','94.64.50.139'),(290,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:23','94.64.50.139'),(291,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:23','94.64.50.139'),(292,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:23','94.64.50.139'),(293,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:23','94.64.50.139'),(294,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:23','94.64.50.139'),(295,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:23','94.64.50.139'),(296,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:23','94.64.50.139'),(297,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:23','94.64.50.139'),(298,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:23','94.64.50.139'),(299,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:23','94.64.50.139'),(300,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:23','94.64.50.139'),(301,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:23','94.64.50.139'),(302,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:23','94.64.50.139'),(303,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:23','94.64.50.139'),(304,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:23','94.64.50.139'),(305,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:23','94.64.50.139'),(306,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:23','94.64.50.139'),(307,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:23','94.64.50.139'),(308,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:24','94.64.50.139'),(309,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:24','94.64.50.139'),(310,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:24','94.64.50.139'),(311,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:24','94.64.50.139'),(312,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:51:24','94.64.50.139'),(313,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:52:00','94.64.50.139'),(314,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:52:00','94.64.50.139'),(315,'901','BlockedUsersRequest -> Blocked User Request reject','blockedipscheck.php','Blocked Ip request kicked out','2016-09-03 23:52:01','94.64.50.139'),(316,'200','Authentication Error -> Attemt to log -> wrong username','login.php','Wrong Username : babis3002','2016-09-10 20:36:22','79.107.185.181'),(317,'200','Authentication Error -> Attemt to log -> wrong username','login.php','Wrong Username : babis3002','2016-09-19 22:19:36','46.190.28.17'),(318,'201','Authentication Error -> Attemt to log -> wrong password','login.php','Wrong Password : 0a5c2ec4bae152a5dea9e1d50359c3e5 Un_encrupted password given : polo1998 On Username : babis3001','2016-09-20 21:34:01','46.190.28.17'),(319,'205','Authentication Error -> Attemt to register with in use username','register.php','[warn]User attemt to register with already in use username: babis3001','2016-09-20 21:34:41','46.190.28.17'),(320,'200','Authentication Error -> Attemt to log -> wrong username','login.php','Wrong Username : babis3002','2016-09-20 21:50:50','46.190.28.17'),(321,'200','Authentication Error -> Attemt to log -> wrong username','login.php','Wrong Username : b xcncvvgf','2016-09-20 22:18:27','46.190.28.17'),(322,'205','Authentication Error -> Attemt to register with in use username','register.php','[warn]User attemt to register with already in use username: babah','2016-09-20 23:33:12','46.190.28.17'),(323,'201','Authentication Error -> Attemt to log -> wrong password','login.php','Wrong Password : 0a5c2ec4bae152a5dea9e1d50359c3e5 Un_encrupted password given : polo1998 On Username : babis3001','2016-09-21 00:05:29','46.190.28.17'),(324,'201','Authentication Error -> Attemt to log -> wrong password','login.php','Wrong Password : f8e7a12bc1f555f3c99b369e33f8ec45 Un_encrupted password given : 12345678 On Username : babis3002','2016-09-21 00:06:26','46.190.28.17'),(325,'205','Authentication Error -> Attemt to register with in use username','register.php','[warn]User attemt to register with already in use username: babis3001','2016-09-21 02:25:26','46.190.28.17'),(326,'901','BlockedUsersRequest -> Blocked User Request reject','blockeduserscheck.php','Blocked user :babis3003 kicked out','2016-09-21 02:35:53','46.190.28.17');
/*!40000 ALTER TABLE `errors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lessons`
--

DROP TABLE IF EXISTS `lessons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lessons` (
  `lesson_id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_name` varchar(64) DEFAULT NULL,
  `direction_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`lesson_id`),
  KEY `direction_id` (`direction_id`),
  CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`direction_id`) REFERENCES `directions` (`direction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lessons`
--

LOCK TABLES `lessons` WRITE;
/*!40000 ALTER TABLE `lessons` DISABLE KEYS */;
INSERT INTO `lessons` VALUES (1,'bapsimo_nuxiwn',1),(2,'bapsimo_malliwn',1);
/*!40000 ALTER TABLE `lessons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question_level`
--

DROP TABLE IF EXISTS `question_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question_level` (
  `question_level_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_level_name` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`question_level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question_level`
--

LOCK TABLES `question_level` WRITE;
/*!40000 ALTER TABLE `question_level` DISABLE KEYS */;
INSERT INTO `question_level` VALUES (1,'Easy!');
/*!40000 ALTER TABLE `question_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question_type`
--

DROP TABLE IF EXISTS `question_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question_type` (
  `question_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_type_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`question_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question_type`
--

LOCK TABLES `question_type` WRITE;
/*!40000 ALTER TABLE `question_type` DISABLE KEYS */;
INSERT INTO `question_type` VALUES (1,'SL'),(2,'MUL_CH'),(3,'MATCH');
/*!40000 ALTER TABLE `question_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_chapter_id` int(11) DEFAULT NULL,
  `question_mainbody` longtext,
  `question_type_id` int(11) DEFAULT NULL,
  `question_level_id` int(11) DEFAULT NULL,
  `isConfirmed` tinyint(1) DEFAULT '0',
  `teacher_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`question_id`),
  KEY `sub_chapter_id` (`sub_chapter_id`),
  KEY `question_type_id` (`question_type_id`),
  KEY `question_level_id` (`question_level_id`),
  KEY `teacher_id` (`teacher_id`),
  CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`sub_chapter_id`) REFERENCES `sub_chapters` (`sub_chapter_id`),
  CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`question_type_id`) REFERENCES `question_type` (`question_type_id`),
  CONSTRAINT `questions_ibfk_3` FOREIGN KEY (`question_level_id`) REFERENCES `question_level` (`question_level_id`),
  CONSTRAINT `questions_ibfk_4` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,3,'i am cool?',1,1,1,1),(2,3,'fssadfads',1,1,1,1),(3,3,'DGFESRVTRT',1,1,1,1),(4,3,'hey bro!',1,1,1,1),(5,3,'',1,1,1,1),(6,3,'',1,1,1,1),(7,3,'',1,1,1,1),(8,3,'235d6345t',1,1,1,1),(9,3,'feawfwef',1,1,1,1),(10,3,'feawfwef',1,1,1,1),(11,3,'feawfwef',1,1,1,1),(12,3,'feawfwef',1,1,1,1),(13,3,'frcrqwve',1,1,1,1),(14,3,'frcrqwve',1,1,1,1),(15,3,'frcrqwve',1,1,1,1),(16,3,'frcrqwve',1,1,1,1),(17,3,'frcrqwve',1,1,1,1),(18,3,'frcrqwve',1,1,1,1),(19,3,'frcrqwve',1,1,1,1),(20,3,'frcrqwve',1,1,1,1),(21,3,'frcrqwve',1,1,1,1),(22,3,'frcrqwve',1,1,1,1),(23,3,'frcrqwve',1,1,1,1),(24,3,'frcrqwve',1,1,1,1),(25,3,'frcrqwve',1,1,1,1),(26,3,'frcrqwve',1,1,1,1),(27,3,'frcrqwve',1,1,1,1),(28,3,'frcrqwve',1,1,1,1),(29,3,'frcrqwve',1,1,1,1),(30,3,'frcrqwve',1,1,1,1),(31,3,'frcrqwve',1,1,1,1),(32,3,'frcrqwve',1,1,1,1),(33,3,'frcrqwve',1,1,1,1),(34,3,'frcrqwve',1,1,1,1),(35,3,'frcrqwve',1,1,1,1),(36,3,'frcrqwve',1,1,1,1),(37,3,'frcrqwve',1,1,1,1),(38,3,'frcrqwve',1,1,1,1),(39,3,'sfsvccawawqwer',1,1,1,1),(40,3,'',1,1,1,1),(48,3,'fdewsfdwfd',1,1,1,1),(49,3,'fgmd.lktjg.lrkt r',1,1,1,1),(50,3,'bjmyjj,m',1,1,1,1),(51,3,'fgaea',1,1,1,1),(52,3,'yygygjhg,kukkh,hkkhgiyg,yj',1,1,1,1),(53,3,'4d4d4d',1,1,1,1),(54,3,'i6uyeptiuy[9etugw[preugw[0e',1,1,1,1),(55,3,'uw;ietug;woerut;wprutwpri',1,1,1,1),(56,3,'lfjliadfjilsjgafsjp',1,1,1,1),(57,3,'dtydtyttyhdtgr',1,1,1,1),(58,3,'rtyrtthee',1,1,1,1),(59,3,'lmmk;kmlmkk',1,1,1,1),(60,3,'uhyyggufttfuugurffyfttgg',1,1,1,1),(61,3,'jerybeyh ehy',1,1,0,1),(62,3,'',1,1,0,1),(63,3,'',1,1,0,1),(64,3,'',1,1,0,1),(65,3,'',1,1,0,1),(66,3,'',1,1,0,1),(67,3,'',1,1,0,1),(68,3,'',1,1,0,1),(69,3,'',1,1,0,1),(70,3,'',1,1,0,1),(71,3,'',1,1,0,1),(72,3,'',1,1,0,1),(73,3,'',1,1,0,1),(74,3,'',1,1,0,1),(75,3,'',1,1,0,1),(76,3,'d d d d d d d d d d d d d d d d dd dd ',1,1,0,1),(77,3,'f f f f    ff f  f f f   f f f f  ff ',1,1,0,1),(78,3,'gg g  g      g g g g g g g  g  gg g gg gg g g  g g g',1,1,0,1),(79,3,'c f ffffffff  f f f f ff f f fff ff',1,1,0,1);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions_union_answers`
--

DROP TABLE IF EXISTS `questions_union_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions_union_answers` (
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `isCorrect` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`question_id`,`answer_id`),
  KEY `answer_id` (`answer_id`),
  CONSTRAINT `questions_union_answers_ibfk_1` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`answer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions_union_answers`
--

LOCK TABLES `questions_union_answers` WRITE;
/*!40000 ALTER TABLE `questions_union_answers` DISABLE KEYS */;
INSERT INTO `questions_union_answers` VALUES (5,1,1),(5,2,1),(79,1,1);
/*!40000 ALTER TABLE `questions_union_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schools` (
  `school_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL,
  `schooltype_id` int(11) NOT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`school_id`),
  KEY `city_id` (`city_id`),
  KEY `school_name` (`school_name`),
  KEY `schooltype_id` (`schooltype_id`),
  CONSTRAINT `schools_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`city_id`),
  CONSTRAINT `schools_ibfk_2` FOREIGN KEY (`schooltype_id`) REFERENCES `schooltypes` (`schooltype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1202 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schools`
--

LOCK TABLES `schools` WRITE;
/*!40000 ALTER TABLE `schools` DISABLE KEYS */;
INSERT INTO `schools` VALUES (605,586,7,'\r\n'),(606,587,8,'Τ Ε Ε  ΒΟΝΙΤΣΑΣ\r\n'),(607,588,9,'ΛΥΚΕΙΟ ΠΑΡΑΒΟΛΑΣ\r\n'),(608,589,9,'ΛΥΚΕΙΟ ΠΑΝΑΙΤΩΛΙΟΥ\r\n'),(609,590,9,'ΛΥΚΕΙΟ ΑΙΤΩΛΙΚΟΥ\r\n'),(610,591,9,'ΛΥΚΕΙΟ ΑΜΦΙΛΟΧΙΑΣ\r\n'),(611,592,9,'ΛΥΚΕΙΟ ΑΣΤΑΚΟΥ\r\n'),(612,593,9,'ΛΥΚΕΙΟ ΒΟΝΙΤΣΗΣ\r\n'),(613,594,9,'ΛΥΚΕΙΟ ΓΑΒΑΛΟΥΣ\r\n'),(614,595,9,'ΛΥΚΕΙΟ ΘΕΡΜΟΥ\r\n'),(615,596,9,'ΛΥΚΕΙΟ ΚΑΤΟΥΝΗΣ\r\n'),(616,597,9,'ΛΥΚΕΙΟ ΝΕΟΧΩΡΙΟΥ ΑΙΤ/ΝΙΑΣ\r\n'),(617,598,9,'ΛΥΚΕΙΟ ΜΥΤΙΚΑ\r\n'),(618,599,9,'ΛΥΚΕΙΟ ΕΥΗΝΟΧΩΡΙΟΥ\r\n'),(619,600,9,'ΛΥΚΕΙΟ ΜΑΤΑΡΑΓΚΑΣ\r\n'),(620,601,9,'ΛΥΚΕΙΟ ΕΜΠΕΣΟΥ ΑΙΤ/ΝΙΑΣ\r\n'),(621,602,8,'Τ Ε Σ  ΝΑΥΠΛΙΟΥ\r\n'),(622,603,9,'ΛΥΚΕΙΟ ΝΑΥΠΛΙΟΥ ΕΣΠΕΡΙΝΟ\r\n'),(623,604,9,'ΛΥΚΕΙΟ ΑΓΙΑΣ ΤΡΙΑΔΟΣ\r\n'),(624,605,9,'ΛΥΚΕΙΟ ΚΡΑΝΙΔΙΟΥ\r\n'),(625,606,9,'ΛΥΚΕΙΟ ΕΡΜΙΟΝΗΣ\r\n'),(626,607,9,'ΛΥΚΕΙΟ ΑΣΚΛΗΠΙΕΙΟΥ\r\n'),(627,608,8,'Τ Ε Ε   ΑΣΤΡΟΥΣ\r\n'),(628,609,7,'Τ Ε Ε   ΛΕΩΝΙΔΙΟΥ\r\n'),(629,610,8,'Τ Ε Ε  ΜΕΓΑΛΟΠΟΛΗΣ\r\n'),(630,609,9,'ΛΥΚΕΙΟ ΛΕΩΝΙΔΙΟΥ\r\n'),(631,611,9,'ΛΥΚΕΙΟ ΤΕΓΕΑΣ\r\n'),(632,612,9,'ΛΥΚΕΙΟ ΑΣΤΡΟΥΣ ΑΡΚΑΔΙΑΣ\r\n'),(633,613,9,'ΛΥΚΕΙΟ ΚΑΣΤΡΙΟΥ\r\n'),(634,614,9,'ΛΥΚΕΙΟ ΛΕΒΙΔΙΟΥ\r\n'),(635,609,9,'ΛΥΚΕΙΟ ΛΕΩΝΙΔΙΟΥ\r\n'),(636,615,9,'ΛΥΚΕΙΟ ΜΕΓΑΛΟΥΠΟΛΕΩΣ\r\n'),(637,616,9,'ΛΥΚΕΙΟ ΤΡΟΠΑΙΩΝ\r\n'),(638,617,9,'ΛΥΚΕΙΟ ΤΡΙΠΟΛΗΣ ΕΣΠΕΡΙΝΟ\r\n'),(639,618,8,'Ε Π Λ  ΑΡΤΑΣ\r\n'),(640,619,9,'ΛΥΚΕΙΟ ΑΓΝΑΝΤΩΝ\r\n'),(641,620,9,'ΛΥΚΕΙΟ ΒΟΥΡΓΑΡΕΛΙΟΥ\r\n'),(642,621,9,'ΛΥΚΕΙΟ ΑΝΩ ΚΑΛΕΝΤΙΝΗΣ\r\n'),(643,622,9,'ΛΥΚΕΙΟ ΚΟΜΠΟΤΙΟΥ ΑΡΤΑΣ\r\n'),(644,623,9,'ΛΥΚΕΙΟ ΝΕΟΧΩΡΙΟΥ ΑΡΤΑΣ\r\n'),(645,624,9,'ΛΥΚΕΙΟ ΑΝΕΖΑΣ ΑΡΤΑΣ\r\n'),(646,625,9,'ΛΥΚΕΙΟ ΠΑΝΑΓΙΑΣ ΔΙΑΣΕΛΟΥ ΑΡΤ\r\n'),(647,626,8,'ΠΣΠΑ ΠΕΙΡΑΜ. ΣΧΟΛΕΙΟ ΑΘΗΝΑΣ\r\n'),(648,627,8,'Τ Ε Ε  ΑΓ ΣΤΕΦΑΝΟΥ\r\n'),(649,628,8,'ΕΝ ΛΥΚ ΑΓ.ΔΗΜΗΤΡΙΟΥ ΕΣΠ\r\n'),(650,629,7,'9Ο  Τ Ε Ε  ΑΘΗΝΩΝ\r\n'),(651,630,7,'Τ Ε Ε  ΑΝΑΒΡΥΤΩΝ\r\n'),(652,631,7,'ΤΕΛ ΚΑΛΥΒΙΩΝ\r\n'),(653,632,9,'ΛΥΚΕΙΟ  ΣΚΑΛΑΣ ΩΡΩΠΟΥ\r\n'),(654,633,8,'Τ Ε Σ ΕΙΔΙΚΗΣ ΑΓΩΓΗΣ\r\n'),(655,634,8,'Τ Ε Σ  ΕΙΔ ΑΓΩΓΗΣ\r\n'),(656,635,8,'Τ Ε Σ ΑΡΓΥΡ/ΚΗΣ ΕΙΔ ΑΓ\r\n'),(657,636,7,'9Ο  Τ Ε Ε  ΠΕΙΡΑΙΑ (ΔΛΕΝ)\r\n'),(658,637,8,'ΠΕΙΡΑΜΑΤΙΚΟ  ΣΧΟΛ ΠΑΝ/ΜΙΟΥ ΑΘΗΝΑΣ\r\n'),(659,638,9,'ΛΥΚΕΙΟ ΒΑΡΒΑΚΕΙΟ ΠΕΙΡΑΜΑΤΙΚΟ\r\n'),(660,639,9,'ΛΥΚΕΙΟ ΑΝΑΒΡΥΤΩΝ ΠΕΙΡΑΜΑΤΙΚΟ\r\n'),(661,640,9,'ΛΥΚΕΙΟ ΕΥΑΓ.ΣΧΟΛ.ΠΕΙΡΑΜΑΤΙΚΟ\r\n'),(662,641,10,'ΠΕΙΡΑΜ ΛΥΚ ΑΓ ΑΝΑΡΓΥΡΩΝ\r\n'),(663,642,9,'ΛΥΚΕΙΟ ΕΙΔ.ΑΝΑΠΗΡΩΝ ΑΓ.ΑΝΑΡΓ\r\n'),(664,643,9,'9ΟΝ ΛΥΚΕΙΟ ΑΘΗΝΑΣ\r\n'),(665,644,9,'ΛΥΚΕΙΟ ΑΙΓΑΛΕΩ ΕΣΠ\r\n'),(666,645,9,'ΛΥΚΕΙΟ ΜΕΛΙΣΣΙΩΝ\r\n'),(667,646,9,'9Ο ΛΥΚΕΙΟ ΑΜΑΡΟΥΣΙΟΥ\r\n'),(668,647,9,'ΛΥΚΕΙΟ ΠΕΝΤΕΛΗΣ\r\n'),(669,648,9,'ΛΥΚΕΙΟ ΚΑΡΕΑ\r\n'),(670,649,9,'ΛΥΚΕΙΟ ΙΛΙΟΥ ΜΟΥΣΙΚΟ\r\n'),(671,650,9,'ΛΥΚΕΙΟ ΑΓ.ΑΝΑΡΓΥΡΩΝ  ΕΣΠ\r\n'),(672,651,9,'ΛΥΚΕΙΟ ΠΕΡΙΣΤΕΡΙΟΥ ΕΣΠΕΡΙΝΟΝ\r\n'),(673,652,9,'ΛΥΚΕΙΟ Ν.ΧΑΛΚΗΔΟΝΑΣ\r\n'),(674,653,9,'ΛΥΚΕΙΟ ΝΕΑΣ ΕΡΥΘΡΑΙΑΣ\r\n'),(675,654,9,'ΛΥΚΕΙΟ ΛΥΚΟΒΡΥΣΗΣ\r\n'),(676,655,9,'ΛΥΚΕΙΟ ΕΙΔ. ΚΩΦΩΝ Κ ΒΑΡΗΚΟΩΝ\r\n'),(677,656,9,'ΛΥΚΕΙΟ Ν.ΙΩΝΙΑΣ ΕΣΠΕΡΙΝΟΝ\r\n'),(678,657,9,'ΛΥΚΕΙΟ ΜΕΤΑΜΟΡΦΩΣΕΩΣ\r\n'),(679,658,9,'ΛΥΚΕΙΟ ΦΙΛΟΘΕΗΣ\r\n'),(680,659,9,'ΛΥΚΕΙΟ ΠΑΛΑΙΟΥ ΨΥΧΙΚΟΥ\r\n'),(681,660,8,'Ε Π Λ ΣΙΒΙΤΑΝΕΙΔΙΟΥ\r\n'),(682,661,9,'ΛΥΚΕΙΟ ΚΑΛΛΙΘΕΑΣ ΕΣΠΕΡΙΝΟΝ\r\n'),(683,662,9,'ΛΥΚΕΙΟ ΒΟΥΛΙΑΓΜΕΝΗΣ\r\n'),(684,663,9,'ΛΥΚΕΙΟ ΙΩΝΙΔΕΙΟΥ ΠΕΙΡΑΜΑΤΙΚΟ\r\n'),(685,664,9,'ΛΥΚΕΙΟ ΖΑΝΝΕΙΟ ΠΕΙΡΑΜΑΤΙΚΟ\r\n'),(686,665,9,'ΛΥΚΕΙΟ ΚΑΛΛΙΠΟΛΕΩΣ ΠΕΙΡΑΙΩΣ\r\n'),(687,666,9,'ΛΥΚΕΙΟ ΠΕΙΡΑΙΩΣ Α ΕΣΠΕΡΙΝΟΝ\r\n'),(688,667,9,'ΛΥΚΕΙΟ ΚΑΣΤΕΛΑΣ\r\n'),(689,668,9,'ΛΥΚΕΙΟ ΑΓΙΟΥ ΙΩΑΝΝΟΥ ΡΕΝΤΗ\r\n'),(690,669,9,'ΛΥΚΕΙΟ ΠΕΙΡΑΙΩΣ ΡΑΛΛΕΙΟΝ ΘΗΛ\r\n'),(691,670,9,'9ΟΝ ΛΥΚΕΙΟ ΠΕΙΡΑΙΑ\r\n'),(692,671,9,'ΛΥΚΕΙΟ ΠΕΡΑΜΑΤΟΣ\r\n'),(693,672,9,'ΛΥΚΕΙΟ ΝΙΚΑΙΑΣ ΕΣΠΕΡΙΝΟΝ\r\n'),(694,673,9,'ΛΥΚΕΙΟ ΚΑΜΙΝΙΩΝ\r\n'),(695,674,9,'ΛΥΚΕΙΟ ΕΙΔ ΑΝΑΠ ΙΛΙΟΥ\r\n'),(696,675,9,'ΛΥΚΕΙΟ ΚΟΡΩΠΙΟΥ\r\n'),(697,676,9,'ΛΥΚΕΙΟ ΠΑΙΑΝΙΑΣ\r\n'),(698,677,9,'ΛΥΚΕΙΟ ΑΡΤΕΜΙΔΑΣ\r\n'),(699,678,9,'ΛΥΚΕΙΟ ΣΠΑΤΩΝ\r\n'),(700,679,9,'ΛΥΚΕΙΟ ΠΑΛΛΗΝΗΣ ΑΤΤΙΚΗΣ\r\n'),(701,680,9,'ΛΥΚΕΙΟ ΒΑΡΗΣ ΑΤΤΙΚΗΣ\r\n'),(702,681,9,'ΛΥΚΕΙΟ ΓΕΡΑΚΑ\r\n'),(703,682,9,'ΛΥΚΕΙΟ ΜΑΡΚΟΠΟΥΛΟΥ\r\n'),(704,683,9,'ΛΥΚΕΙΟ  ΑΝΟΙΞΗΣ\r\n'),(705,684,9,'ΛΥΚΕΙΟ ΔΡΟΣΙΑΣ\r\n'),(706,685,9,'ΛΥΚΕΙΟ ΑΓΙΟΥ ΣΤΕΦΑΝΟΥ ΑΤΤΙΚΗ\r\n'),(707,686,9,'ΛΥΚΕΙΟ ΔΙΟΝΥΣΟΥ\r\n'),(708,687,9,'ΛΥΚΕΙΟ ΜΑΡΑΘΩΝΟΣ\r\n'),(709,688,9,'ΛΥΚΕΙΟ ΚΑΠΑΝΔΡΙΤΙΟΥ\r\n'),(710,689,7,'ΤΑΞ ΛΥΚ     ΚΑΛΑΜΟΥ\r\n'),(711,690,9,'ΛΥΚΕΙΟ ΝΕΑΣ ΜΑΚΡΗΣ ΑΤΤΙΚΗΣ\r\n'),(712,691,9,'ΛΥΚΕΙΟ ΚΕΡΑΤΕΑΣ\r\n'),(713,692,9,'ΛΥΚΕΙΟ  ΑΝΑΒΥΣΣΟΥ\r\n'),(714,693,9,'ΛΥΚΕΙΟ  ΚΑΛΥΒΙΩΝ ΘΟΡΙΚΟΥ\r\n'),(715,694,9,'ΛΥΚΕΙΟ ΓΛΥΚΩΝ ΝΕΡΩΝ\r\n'),(716,695,9,'ΛΥΚΕΙΟ ΛΑΥΡΙΟΥ\r\n'),(717,696,9,'ΛΥΚΕΙΟ ΘΡΑΚΟΜΑΚΕΔΟΝΩΝ\r\n'),(718,697,8,'ΛΥΚ  ΑΧΑΡΝΩΝ ΕΣΠΕΡ.\r\n'),(719,698,9,'ΠΕΙΡΑΜ ΜΟΥΣ ΛΥΚΕΙΟ ΠΑΛΛΗΝΗΣ\r\n'),(720,699,9,'ΛΥΚΕΙΟ ΡΑΦΗΝΑΣ\r\n'),(721,700,8,'Τ.Λ.Γ  ΑΡΤΕΜΙΔΑΣ ΛΟΥΤΣΑΣ\r\n'),(722,701,9,'ΛΥΚΕΙΟ ΣΚΑΛΑΣ ΩΡΟΠΟΥ ΑΤΤΙΚΗΣ\r\n'),(723,702,9,'ΛΥΚΕΙΟ ΑΣΠΡΟΠΥΡΓΟΥ ΑΤΤΙΚΗΣ\r\n'),(724,703,9,'ΛΥΚΕΙΟ ΖΕΦΥΡΙΟΥ\r\n'),(725,704,9,'ΛΥΚΕΙΟ ΝΕΑΣ ΠΕΡΑΜΟΥ\r\n'),(726,705,9,'ΛΥΚΕΙΟ ΕΡΥΘΡΩΝ ΑΤΤΙΚΗΣ\r\n'),(727,706,9,'ΛΥΚΕΙΟ ΜΑΝΔΡΑΣ ΑΤΤΙΚΗΣ\r\n'),(728,707,9,'ΛΥΚΕΙΟ ΜΑΓΟΥΛΑΣ\r\n'),(729,708,9,'ΛΥΚΕΙΟ ΑΥΛΩΝΟΣ\r\n'),(730,709,9,'ΛΥΚΕΙΟ ΓΑΛΑΤΑ ΠΟΡΟΥ\r\n'),(731,710,7,'Τ Ε Ε  ΚΑΛΑΒΡΥΤΩΝ\r\n'),(732,711,7,'ΕΠΛ   ΑΙΓΙΟΥ\r\n'),(733,712,8,'Τ Ε Σ  ΠΑΤΡΑΣ ΚΩΦ ΒΑΡΥΚ\r\n'),(734,713,8,'9Ο  Τ Ε Ε  ΠΑΤΡΩΝ ΕΣΠ\r\n'),(735,714,9,'ΛΥΚΕΙΟ ΠΑΤΡΩΝ ΠΕΙΡΑΜΑΤΙΚΟ\r\n'),(736,715,9,'ΛΥΚΕΙΟ ΠΑΤΡΩΝ ΠΕΙΡΑΜ.ΠΑΝΕΠΙΣ\r\n'),(737,716,9,'ΛΥΚΕΙΟ   ΠΑΤΡΩΝ ΚΛΑΣΣΙΚΟ\r\n'),(738,717,8,'ΕΠΛ   ΠΑΤΡΑΣ\r\n'),(739,718,9,'ΛΥΚΕΙΟ ΠΑΤΡΩΝ ΜΟΥΣΙΚΟ\r\n'),(740,719,9,'ΛΥΚΕΙΟ ΚΑΣΤΡΙΤΣΙΟΥ\r\n'),(741,720,9,'ΛΥΚΕΙΟ ΔΕΜΕΝΙΚΩΝ\r\n'),(742,721,9,'ΛΥΚΕΙΟ ΠΑΤΡΩΝ ΕΣΠΕΡΙΝΟΝ\r\n'),(743,722,9,'ΛΥΚΕΙΟ ΠΑΡΑΛΙΑΣ ΠΑΤΡΑΣ\r\n'),(744,723,9,'ΛΥΚΕΙΟ ΚΑΜΑΡΩΝ ΑΧΑΙΑΣ\r\n'),(745,710,9,'ΛΥΚΕΙΟ ΚΑΛΑΒΡΥΤΩΝ\r\n'),(746,724,9,'ΛΥΚΕΙΟ ΚΑΤΩ ΑΧΑΙΑΣ\r\n'),(747,725,9,'ΛΥΚΕΙΟ ΕΡΥΜΑΝΘΕΙΑΣ\r\n'),(748,726,9,'ΛΥΚΕΙΟ ΛΑΠΠΑ ΑΧΑΙΑΣ\r\n'),(749,727,9,'ΛΥΚΕΙΟ ΛΟΥΣΙΚΩΝ ΑΧΑΙΑΣ\r\n'),(750,728,9,'ΛΥΚΕΙΟ ΑΚΡΑΤΑΣ\r\n'),(751,729,9,'ΛΥΚΕΙΟ ΔΙΑΚΟΠΤΟΥ\r\n'),(752,730,9,'ΛΥΚΕΙΟ ΔΑΦΝΗΣ ΚΑΛΑΒΡΥΤΩΝ\r\n'),(753,731,9,'ΛΥΚΕΙΟ ΚΑΤΩ ΚΛΕΙΤΟΡΙΑΣ\r\n'),(754,732,9,'ΛΥΚΕΙΟ ΒΡΑΧΝΕΙΚΩΝ ΠΑΤΡΩΝ\r\n'),(755,733,9,'ΛΥΚΕΙΟ ΡΙΟΥ\r\n'),(756,719,9,'ΛΥΚΕΙΟ ΚΑΣΤΡΙΤΣΙΟΥ\r\n'),(757,734,9,'ΛΥΚΕΙΟ ΑΡΑΧΩΒΗΣ\r\n'),(758,735,9,'ΛΥΚΕΙΟ ΒΑΓΙΩΝ\r\n'),(759,736,9,'ΛΥΚΕΙΟ ΘΕΣΠΙΩΝ\r\n'),(760,737,9,'ΛΥΚΕΙΟ ΔΙΣΤΟΜΟΥ ΜΠΑΡΛΕΙΟΝ\r\n'),(761,738,9,'ΛΥΚΕΙΟ ΣΧΗΜΑΤΑΡΙΟΥ\r\n'),(762,739,9,'ΛΥΚΕΙΟ ΟΙΝΟΦΥΤΩΝ ΘΗΒΩΝ\r\n'),(763,740,9,'ΛΥΚΕΙΟ ΑΛΙΑΡΤΟΥ\r\n'),(764,741,9,'ΛΥΚΕΙΟ ΔΑΥΛΕΙΑΣ\r\n'),(765,742,9,'ΛΥΚΕΙΟ ΑΣΠΡΩΝ ΣΠΙΤΙΩΝ\r\n'),(766,743,9,'ΛΥΚΕΙΟ ΔΕΣΚΑΤΗΣ\r\n'),(767,744,9,'ΛΥΚΕΙΟ  ΚΑΡΠΕΡΟΥ ΓΡΕΒΕΝΩΝ\r\n'),(768,745,7,'901010\r\n'),(769,746,7,'940040\r\n'),(770,747,7,'940050\r\n'),(771,748,7,'940060\r\n'),(772,749,7,'940065\r\n'),(773,750,7,'Τ Ε Ε  ΚΑΤΩ ΝΕΥΡΟΚΟΠΙΟΥ\r\n'),(774,751,7,'950040\r\n'),(775,752,7,'951009\r\n'),(776,753,7,'951010\r\n'),(777,754,7,'951020\r\n'),(778,755,7,'951030\r\n'),(779,756,7,'951040\r\n'),(780,757,9,'ΛΥΚΕΙΟ ΔΟΞΑΤΟΥ ΔΡΑΜΑΣ\r\n'),(781,758,7,'951065\r\n'),(782,759,9,'ΛΥΚΕΙΟ ΔΡΑΜΑΣ ΜΟΥΣΙΚΟ\r\n'),(783,760,7,'952010\r\n'),(784,761,7,'953010\r\n'),(785,750,9,'ΛΥΚΕΙΟ ΚΑΤΩ ΝΕΥΡΟΚΟΠΙΟΥ\r\n'),(786,762,7,'954010\r\n'),(787,763,9,'ΛΥΚΕΙΟ ΠΡΟΣΟΤΣΑΝΗΣ\r\n'),(788,764,7,'956010\r\n'),(789,765,9,'ΛΥΚΕΙΟ ΚΑΛΑΜΠΑΚΙΟΥ ΔΡΑΜΑΣ\r\n'),(790,766,7,'957010\r\n'),(791,767,7,'990030\r\n'),(792,768,7,'990040\r\n'),(793,769,7,'Τ Ε Ε  ΠΑΤΜΟΥ\r\n'),(794,770,8,'Τ Ε Σ  ΛΕΡΟΥ\r\n'),(795,771,7,'ΕΠΛ   ΡΟΔΟΥ\r\n'),(796,772,9,'ΛΥΚΕΙΟ ΡΟΔΟΥ ΕΣΠΕΡΙΝΟΝ\r\n'),(797,773,9,'ΛΥΚΕΙΟ ΣΟΡΩΝΗΣ\r\n'),(798,774,9,'ΛΥΚΕΙΟ ΚΡΕΜΑΣΤΗΣ ΡΟΔΟΥ\r\n'),(799,775,9,'ΛΥΚΕΙΟ ΑΦΑΝΤΟΥ ΡΟΔΟΥ\r\n'),(800,776,9,'ΛΥΚΕΙΟ ΙΑΛΥΣΟΥ ΡΟΔΟΥ\r\n'),(801,777,9,'ΛΥΚΕΙΟ ΑΡΧΑΓΓΕΛΟΥ\r\n'),(802,778,8,'Τ.ΛΥΚ.ΓΥΜ   ΧΑΛΚΗΣ\r\n'),(803,770,9,'ΛΥΚΕΙΟ ΛΕΡΟΥ\r\n'),(804,769,9,'ΛΥΚΕΙΟ ΠΑΤΜΟΥ\r\n'),(805,779,9,'ΛΥΚΕΙΟ ΑΝΤΙΜΑΧΕΙΑΣ\r\n'),(806,780,9,'ΛΥΚΕΙΟ ΔΙΔΥΜΟΤΕΙΧΟΥ\r\n'),(807,781,9,'ΛΥΚΕΙΟ ΔΙΚΑΙΩΝ ΟΡΕΣΤΙΑΔΟΣ\r\n'),(808,782,9,'ΛΥΚΕΙΟ ΣΑΜΟΘΡΑΚΗΣ\r\n'),(809,783,9,'ΛΥΚΕΙΟ ΣΟΥΦΛΙΟΥ\r\n'),(810,784,9,'ΛΥΚΕΙΟ ΦΕΡΩΝ\r\n'),(811,785,9,'ΛΥΚΕΙΟ ΝΕΑΣ ΒΥΣΣΗΣ\r\n'),(812,786,9,'ΛΥΚΕΙΟ ΧΑΛΚΙΔΑΣ ΕΣΠΕΡΙΝΟΝ\r\n'),(813,787,9,'ΛΥΚΕΙΟ ΚΑΝΗΘΟΥ ΕΥΒΟΙΑΣ\r\n'),(814,788,9,'ΛΥΚΕΙΟ ΒΑΣΙΛΙΚΟΥ ΕΥΒΟΙΑΣ\r\n'),(815,789,9,'ΛΥΚΕΙΟ ΨΑΧΝΩΝ ΕΥΒΟΙΑΣ\r\n'),(816,790,9,'ΛΥΚΕΙΟ ΝΕΑΣ ΑΡΤΑΚΗΣ\r\n'),(817,791,9,'ΛΥΚΕΙΟ ΒΑΘΕΟΣ ΑΥΛΙΔΟΣ\r\n'),(818,792,9,'ΛΥΚΕΙΟ ΑΛΙΒΕΡΙΟΥ\r\n'),(819,793,9,'ΛΥΚΕΙΟ ΙΣΤΙΑΙΑΣ\r\n'),(820,794,9,'ΛΥΚΕΙΟ ΚΑΡΥΣΤΟΥ\r\n'),(821,795,9,'ΛΥΚΕΙΟ ΑΥΛΩΝΑΡΙΟΥ\r\n'),(822,796,9,'ΛΥΚΕΙΟ ΑΜΑΡΥΝΘΟΥ ΕΥΒΟΙΑΣ\r\n'),(823,797,9,'ΛΥΚΕΙΟ ΚΥΜΗΣ\r\n'),(824,798,9,'ΛΥΚΕΙΟ ΚΟΝΙΣΤΡΩΝ ΕΥΒΟΙΑΣ\r\n'),(825,799,9,'ΛΥΚΕΙΟ ΛΙΜΝΗΣ ΕΥΒΟΙΑΣ\r\n'),(826,800,9,'ΛΥΚΕΙΟ ΛΟΥΤΡΩΝ ΑΙΔΗΨΟΥ\r\n'),(827,801,9,'ΛΥΚΕΙΟ ΜΑΝΤΟΥΔΙΟΥ ΕΥΒΟΙΑΣ\r\n'),(828,802,9,'ΛΥΚΕΙΟ ΣΚΥΡΟΥ\r\n'),(829,803,8,'Τ Ε Ε  ΚΑΡΠΕΝΗΣΙΟΥ\r\n'),(830,803,9,'ΛΥΚΕΙΟ ΚΑΡΠΕΝΗΣΙΟΥ\r\n'),(831,804,8,'Τ Ε Σ  ΖΑΚΥΝΘΟΥ\r\n'),(832,805,7,'Ε Π Λ  ΖΑΚΥΝΘΟΥ\r\n'),(833,806,9,'ΛΥΚΕΙΟ ΖΑΚΥΝΘΟΥ ΜΟΥΣΙΚ\r\n'),(834,807,9,'ΛΥΚΕΙΟ ΚΑΤΑΣΤΑΡΙΟΥ ΖΑΚΥΝΘΟΥ\r\n'),(835,808,7,'Τ.Λ  ΓΥΜ.   ΒΟΛΙΜΩΝ ΖΑΚΥΝΘΟΥ\r\n'),(836,809,9,'ΛΥΚΕΙΟ ΓΑΣΤΟΥΝΗΣ\r\n'),(837,810,9,'ΛΥΚΕΙΟ ΑΝΔΡΙΤΣΑΙΝΗΣ\r\n'),(838,811,9,'ΛΥΚΕΙΟ ΠΕΛΟΠΙΟΥ\r\n'),(839,812,9,'ΛΥΚΕΙΟ ΖΑΧΑΡΩΣ\r\n'),(840,813,9,'ΛΥΚΕΙΟ ΚΡΕΣΤΕΝΩΝ\r\n'),(841,814,9,'ΛΥΚΕΙΟ ΛΕΧΑΙΝΩΝ\r\n'),(842,815,9,'ΛΥΚΕΙΟ ΑΝΔΡΑΒΙΔΑΣ\r\n'),(843,816,9,'ΛΥΚΕΙΟ ΒΑΡΘΟΛΟΜΙΟΥ\r\n'),(844,817,9,'ΛΥΚΕΙΟ ΛΑΛΑ ΗΛΕΙΑΣ\r\n'),(845,818,9,'ΛΥΚΕΙΟ ΝΕΑΣ ΦΙΓΑΛΕΙΑΣ\r\n'),(846,819,9,'ΛΥΚΕΙΟ ΣΙΜΟΠΟΥΛΟΥ\r\n'),(847,820,9,'ΛΥΚΕΙΟ ΒΑΣΙΛΑΚΙΟΥ\r\n'),(848,821,9,'ΛΥΚΕΙΟ ΒΑΡΔΑΣ\r\n'),(849,822,9,'ΛΥΚΕΙΟ ΚΑΡΑΤΟΥΛΑ\r\n'),(850,823,9,'ΛΥΚΕΙΟ ΜΕΛΙΚΗΣ\r\n'),(851,824,9,'ΛΥΚΕΙΟ ΜΑΚΡΟΧΩΡΙΟΥ ΒΕΡΟΙΑΣ\r\n'),(852,825,9,'ΛΥΚΕΙΟ ΕΠΙΣΚΟΠΗΣ\r\n'),(853,826,9,'ΛΥΚΕΙΟ ΑΓ ΜΥΡΩΝΑ\r\n'),(854,827,9,'ΛΥΚΕΙΟ ΑΡΚΑΛΟΧΩΡΙΟΥ\r\n'),(855,828,9,'ΛΥΚΕΙΟ ΑΡΧΑΝΩΝ ΗΡΑΚΛΕΙΟΥ\r\n'),(856,829,9,'ΛΥΚΕΙΟ ΒΙΑΝΝΟΥ\r\n'),(857,830,9,'ΛΥΚΕΙΟ ΚΑΣΤΕΛΛΙΟΥ ΠΕΔΙΑΔΟΣ\r\n'),(858,831,9,'ΛΥΚΕΙΟ ΜΟΙΡΩΝ\r\n'),(859,832,9,'ΛΥΚΕΙΟ ΠΟΜΠΙΑΣ\r\n'),(860,833,9,'ΛΥΚΕΙΟ ΧΑΡΑΚΑ\r\n'),(861,834,9,'ΛΥΚΕΙΟ ΑΓΙΑΣ ΒΑΡΒΑΡΑΣ\r\n'),(862,835,9,'ΛΥΚΕΙΟ ΚΡΟΥΣΩΝΟΣ\r\n'),(863,836,9,'ΛΥΚΕΙΟ ΜΕΛΕΣΩΝ\r\n'),(864,837,9,'ΛΥΚΕΙΟ ΜΟΧΟΥ\r\n'),(865,838,9,'ΛΥΚΕΙΟ ΤΥΜΠΑΚΙΟΥ\r\n'),(866,839,9,'ΛΥΚΕΙΟ ΓΟΥΒΩΝ\r\n'),(867,840,9,'ΛΥΚΕΙΟ ΑΣΗΜΙΟΥ\r\n'),(868,841,9,'ΛΥΚΕΙΟ ΜΑΛΙΩΝ ΠΕΔΙΑΔΑΣ\r\n'),(869,842,9,'ΛΥΚΕΙΟ ΑΓ ΔΕΚΑ\r\n'),(870,843,9,'ΛΥΚΕΙΟ Ν.ΑΛΙΚΑΡΝΑΣΣΟΥ\r\n'),(871,844,9,'ΛΥΚΕΙΟ  ΓΑΖΙΟΥ ΗΡΑΚΛΕΙΟ\r\n'),(872,845,9,'ΛΥΚΕΙΟ  ΗΡΑΚΛΕΙΟΥ ΕΣΠΕΡΙΝΟ\r\n'),(873,846,9,'ΛΥΚΕΙΟ ΠΑΡΑΜΥΘΙΑΣ\r\n'),(874,847,9,'ΛΥΚΕΙΟ ΦΙΛΙΑΤΩΝ\r\n'),(875,848,9,'ΛΥΚΕΙΟ ΜΑΡΓΑΡΙΤΙΟΥ\r\n'),(876,849,8,'Τ Ε Ε  ΝΕΑΠΟΛΗΣ\r\n'),(877,850,8,'Τ Ε Ε ΑΓ ΑΘΑΝΑΣΙΟΥ\r\n'),(878,851,8,'Τ Ε Ε  ΧΑΛΑΣΤΡΑΣ\r\n'),(879,852,8,'Τ Ε Ε  ΒΑΣΙΛΙΚΩΝ\r\n'),(880,853,8,'9Ο  Τ Ε Ε  ΘΕΣ/ΝΙΚΗΣ\r\n'),(881,854,8,'Τ Ε Λ  ΚΑΛΑΜΑΡΙΑΣ\r\n'),(882,855,9,'ΛΥΚΕΙΟ ΘΕΣ/ΝΙΚΗΣ Β ΕΣΠΕΡΙΝΟΝ\r\n'),(883,853,9,'9ΟΝ ΛΥΚΕΙΟ ΘΕΣ/ΝΙΚΗΣ\r\n'),(884,856,9,'ΛΥΚΕΙΟ ΝΕΑΠΟΛΗΣ ΘΕΣ/ΝΙΚΗΣ\r\n'),(885,857,9,'ΛΥΚΕΙΟ ΘΕΣ/ΝΙΚΗΣ Α ΕΣΠΕΡΙΝΟΝ\r\n'),(886,858,9,'ΛΥΚΕΙΟ ΤΡΙΑΝΔΡΙΑΣ\r\n'),(887,859,9,'ΕΝΙΑΙΟ ΛΥΚΕΙΟ Ν. ΕΠΙΒΑΤΩΝ\r\n'),(888,860,9,'ΛΥΚΕΙΟ ΠΑΝΟΡΑΜΑΤΟΣ ΘΕΣ/ΚΗΣ\r\n'),(889,861,9,'ΛΥΚΕΙΟ ΑΓΙΟΥ ΑΘΑΝΑΣΙΟΥ\r\n'),(890,862,9,'ΛΥΚΕΙΟ ΔΙΑΒΑΤΩΝ\r\n'),(891,863,9,'ΔΙΑΠΟΛΙΤΙΣΜΙΚΟ ΛΥΚΕΙΟ ΘΕΣΣ/ΝΙΚΗΣ\r\n'),(892,864,9,'ΛΥΚΕΙΟ ΑΜΠΕΛΟΚΗΠΩΝ ΕΣΠΕΡΙΝ\r\n'),(893,865,9,'ΛΥΚΕΙΟ ΜΕΤΕΩΡΩΝ ΘΕΣ/ΚΗΣ\r\n'),(894,852,9,'ΛΥΚΕΙΟ ΒΑΣΙΛΙΚΩΝ\r\n'),(895,866,9,'ΛΥΚΕΙΟ ΑΣΒΕΣΤΟΧΩΡΙΟΥ\r\n'),(896,867,9,'ΛΥΚΕΙΟ ΖΑΓΚΛΙΒΕΡΙΟΥ\r\n'),(897,868,9,'ΛΥΚΕΙΟ ΛΑΓΚΑΔΑ\r\n'),(898,869,9,'ΛΥΚΕΙΟ ΛΑΓΚΑΔΙΚΙΩΝ\r\n'),(899,870,9,'ΛΥΚΕΙΟ  ΠΑΡΑΛ.ΣΤΑΥΡΟΥ\r\n'),(900,871,9,'ΛΥΚΕΙΟ ΕΠΑΝΟΜΗΣ\r\n'),(901,872,9,'ΛΥΚΕΙΟ ΚΟΥΦΑΛΙΩΝ\r\n'),(902,873,9,'ΛΥΚΕΙΟ ΝΕΑΣ ΧΑΛΚΗΔΟΝΑΣ\r\n'),(903,874,9,'ΛΥΚΕΙΟ  ΑΔΕΝΔΡΟΥ\r\n'),(904,875,9,'ΛΥΚΕΙΟ ΣΟΧΟΥ\r\n'),(905,876,9,'ΛΥΚΕΙΟ ΔΡΥΜΟΥ\r\n'),(906,877,9,'ΛΥΚΕΙΟ ΝΕΑΣ ΜΑΔΥΤΟΥ\r\n'),(907,878,9,'ΛΥΚΕΙΟ ΝΕΑΣ ΜΕΣΗΜΒΡΙΑΣ\r\n'),(908,879,9,'ΛΥΚΕΙΟ ΠΡΟΧΩΜΑΤΟΣ\r\n'),(909,880,9,'ΛΥΚΕΙΟ ΝΕΑΣ ΜΗΧΑΝΙΩΝΑΣ\r\n'),(910,881,9,'ΛΥΚΕΙΟ ΧΑΛΑΣΤΡΑΣ ΘΕΣ/ΝΙΚΗΣ\r\n'),(911,882,9,'ΛΥΚΕΙΟ ΣΙΝΔΟΥ\r\n'),(912,883,9,'ΛΥΚΕΙΟ ΚΥΜΙΝΩΝ\r\n'),(913,884,9,'ΛΥΚΕΙΟ ΩΡΑΙΟΚΑΣΤΡΟΥ ΘΕΣ/ΚΗΣ\r\n'),(914,885,9,'ΕΚΚ/ΚΟ  ΛΥΚΕΙΟ ΝΕΑΠΟΛΕΩΣ\r\n'),(915,886,8,'Τ Ε Ε  ΚΟΝΙΤΣΑΣ\r\n'),(916,887,9,'ΛΥΚΕΙΟ ΙΩΑΝΝΙΝΩΝ ΚΛΑΣΣΙΚΟ\r\n'),(917,888,9,'ΛΥΚΕΙΟ ΙΩΑΝΝΙΝΩΝ ΖΩΣΙΜΑΙΑ ΣΧ\r\n'),(918,889,9,'ΛΥΚΕΙΟ ΑΝΑΤΟΛΗΣ ΙΩΑΝΝΙΝΩΝ\r\n'),(919,890,9,'ΛΥΚΕΙΟ ΔΕΡΒΙΖΙΑΝΩΝ\r\n'),(920,891,9,'ΛΥΚΕΙΟ ΔΟΛΙΑΝΩΝ\r\n'),(921,892,9,'ΛΥΚΕΙΟ ΚΟΝΙΤΣΗΣ\r\n'),(922,893,9,'ΛΥΚΕΙΟ ΜΕΤΣΟΒΟΥ\r\n'),(923,894,9,'ΛΥΚΕΙΟ ΖΙΤΣΗΣ\r\n'),(924,895,9,'ΛΥΚΕΙΟ ΠΩΓΩΝΙΑΝΗΣ\r\n'),(925,896,9,'ΛΥΚΕΙΟ ΚΑΤΣΙΚΑ ΙΩΑΝΝΙΝΩΝ\r\n'),(926,897,9,'ΛΥΚΕΙΟ ΕΛΕΟΥΣΑΣ\r\n'),(927,898,9,'9Ο  ΛΥΚΕΙΟ ΙΩΑΝΝΙΝΩΝ\r\n'),(928,899,9,'ΛΥΚΕΙΟ   ΙΩΑΝΝΙΝΩΝ ΕΣΠΕΡΙΝΟ\r\n'),(929,900,9,'ΛΥΚΕΙΟ ΕΛΕΥΘΕΡΟΥΠΟΛΕΩΣ ΚΑΒΑΛ\r\n'),(930,901,9,'ΛΥΚΕΙΟ ΧΡΥΣΟΥΠΟΛΕΩΣ\r\n'),(931,902,9,'ΛΥΚΕΙΟ ΛΙΜΕΝΟΣ ΘΑΣΟΥ\r\n'),(932,903,9,'ΛΥΚΕΙΟ ΠΟΔΟΧΩΡΙΟΥ ΚΑΒΑΛΑΣ\r\n'),(933,904,9,'ΛΥΚΕΙΟ ΝΙΚΗΣΙΑΝΗΣ\r\n'),(934,905,9,'ΛΥΚΕΙΟ ΚΡΗΝΙΔΩΝ\r\n'),(935,906,9,'ΛΥΚΕΙΟ ΛΙΜΕΝΑΡΙΩΝ ΘΑΣΟΥ\r\n'),(936,907,9,'ΛΥΚΕΙΟ Ν.ΠΕΡΑΜΟΥ\r\n'),(937,908,9,'ΛΥΚΕΙΟ ΚΑΡΔΙΤΣΗΣ ΕΣΠΕΡΙΝΟΝ\r\n'),(938,909,9,'ΛΥΚΕΙΟ ΠΑΛΑΜΑ\r\n'),(939,910,9,'ΛΥΚΕΙΟ ΜΟΥΖΑΚΙΟΥ\r\n'),(940,911,9,'ΛΥΚΕΙΟ ΣΟΦΑΔΩΝ\r\n'),(941,600,9,'ΛΥΚΕΙΟ ΜΑΤΑΡΑΓΚΑΣ\r\n'),(942,912,9,'ΛΥΚΕΙΟ ΦΑΝΑΡΙΟΥ\r\n'),(943,913,8,'Τ Ε Σ  ΚΑΡΔΙΤΣΑΣ ΕΣΠ\r\n'),(944,707,9,'ΛΥΚΕΙΟ ΜΑΓΟΥΛΑΣ\r\n'),(945,914,9,'ΛΥΚΕΙΟ ΛΕΟΝΤΑΡΙΟΥ\r\n'),(946,915,9,'ΛΥΚΕΙΟ ΜΗΤΡΟΠΟΛΗΣ\r\n'),(947,916,9,'ΛΥΚΕΙΟ ΠΡΟΑΣΤΙΟΥ\r\n'),(948,917,9,'ΛΥΚΕΙΟ ΚΕΔΡΟΥ ΚΑΡΔΙΤΣΑΣ\r\n'),(949,918,9,'ΛΥΚΕΙΟ ΑΡΓΟΥΣ ΟΡΕΣΤΙΚΟΥ\r\n'),(950,919,9,'ΛΥΚΕΙΟ ΚΑΣΤΟΡΙΑΣ ΕΣΠΕΡΙΝ\r\n'),(951,920,9,'ΛΥΚΕΙΟ ΝΕΣΤΟΡΙΟΥ\r\n'),(952,921,9,'ΛΥΚΕΙΟ  ΜΕΣΟΠΟΤΑΜΙΑΣ\r\n'),(953,922,9,'ΛΥΚΕΙΟ ΚΕΡΚΥΡΑΣ ΜΟΥΣΙΚ\r\n'),(954,923,9,'ΛΥΚΕΙΟ ΛΕΥΚΙΜΜΗΣ\r\n'),(955,924,9,'ΛΥΚΕΙΟ ΑΓΡΟΥ\r\n'),(956,925,9,'ΛΥΚΕΙΟ ΚΑΣΤΕΛΛΑΝΩΝ ΚΕΡΚΥΡΑΣ\r\n'),(957,926,9,'ΛΥΚΕΙΟ ΣΚΡΙΠΕΡΟΥ\r\n'),(958,927,9,'ΛΥΚΕΙΟ  ΚΑΤΩ ΚΟΡΑΚΙΑΝΩΝ\r\n'),(959,928,9,'ΛΥΚΕΙΟ ΚΕΡΑΜΕΙΩΝ\r\n'),(960,929,9,'ΛΥΚΕΙΟ ΛΗΞΟΥΡΙΟΥ\r\n'),(961,930,9,'ΛΥΚΕΙΟ ΣΑΜΗΣ\r\n'),(962,931,9,'ΛΥΚΕΙΟ ΙΘΑΚΗΣ\r\n'),(963,932,9,'ΛΥΚΕΙΟ ΓΟΥΜΕΝΙΣΣΗΣ\r\n'),(964,933,9,'ΛΥΚΕΙΟ ΧΕΡΣΟΥ ΚΙΛΚΙΣ\r\n'),(965,934,9,'ΛΥΚΕΙΟ ΜΟΥΡΙΩΝ ΚΙΛΚΙΣ\r\n'),(966,935,9,'ΛΥΚΕΙΟ ΠΟΛΥΚΑΣΤΡΟΥ ΚΙΛΚΙΣ\r\n'),(967,936,9,'ΛΥΚΕΙΟ ΕΥΡΩΠΟΥ ΚΙΛΚΙΣ\r\n'),(968,937,9,'ΕΣΠ ΛΥΚΕΙΟ ΚΟΖΑΝΗΣ\r\n'),(969,938,9,'ΛΥΚΕΙΟ ΕΡΑΤΥΡΑΣ\r\n'),(970,939,9,'ΛΥΚΕΙΟ ΝΕΑΠΟΛΕΩΣ ΚΟΖΑΝΗΣ\r\n'),(971,940,9,'ΛΥΚΕΙΟ ΣΕΡΒΙΩΝ\r\n'),(972,941,9,'ΛΥΚΕΙΟ ΣΙΑΤΙΣΤΗΣ\r\n'),(973,942,9,'ΛΥΚΕΙΟ ΤΣΟΤΥΛΙΟΥ\r\n'),(974,943,9,'ΛΥΚΕΙΟ ΒΕΛΒΕΝΤΟΥ\r\n'),(975,944,9,'ΛΥΚΕΙΟ ΒΕΛΟΥ\r\n'),(976,945,9,'ΛΥΚΕΙΟ ΓΚΟΥΡΑΣ\r\n'),(977,946,9,'ΛΥΚΕΙΟ ΔΕΡΒΕΝΙΟΥ\r\n'),(978,947,9,'ΛΥΚΕΙΟ ΚΙΑΤΟΥ\r\n'),(979,948,9,'ΛΥΚΕΙΟ ΞΥΛΟΚΑΣΤΡΟΥ\r\n'),(980,949,9,'ΛΥΚΕΙΟ ΛΟΥΤΡΑΚΙΟΥ\r\n'),(981,950,9,'ΛΥΚΕΙΟ ΝΕΜΕΑΣ\r\n'),(982,951,9,'ΛΥΚΕΙΟ ΧΙΛΙΟΜΟΔΙΟΥ\r\n'),(983,952,9,'ΛΥΚΕΙΟ ΑΓΙΩΝ ΘΕΟΔΩΡΩΝ\r\n'),(984,953,8,'ΕΠΛ     ΣΥΡΟΥ\r\n'),(985,954,9,'ΛΥΚΕΙΟ ΣΥΡΟΥ\r\n'),(986,955,9,'ΛΥΚΕΙΟ ΑΝΔΡΟΥ ΕΜΠΕΙΡΙΚΕΙΟ\r\n'),(987,956,9,'ΛΥΚΕΙΟ ΘΗΡΑΣ\r\n'),(988,957,9,'ΛΥΚΕΙΟ ΜΗΛΟΥ\r\n'),(989,958,9,'ΛΥΚΕΙΟ ΝΑΞΟΥ\r\n'),(990,959,9,'ΛΥΚΕΙΟ ΤΡΑΓΑΙΑΣ ΝΑΞΟΥ\r\n'),(991,960,8,'ΤΑΞ ΛΥΚ.ΓΥΜ ΔΟΝΟΥΣΑ\r\n'),(992,961,8,'ΤΑΞ ΛΥΚ.ΓΥΜ ΚΟΥΦΟΝΗΣΙΩΝ\r\n'),(993,962,9,'ΛΥΚΕΙΟ ΠΑΡΟΥ\r\n'),(994,963,9,'ΛΥΚΕΙΟ ΝΑΟΥΣΑΣ ΠΑΡΟΥ\r\n'),(995,964,9,'ΛΥΚΕΙΟ ΤΗΝΟΥ\r\n'),(996,965,9,'ΛΥΚΕΙΟ ΜΥΚΟΝΟΥ\r\n'),(997,966,9,'ΛΥΚΕΙΟ ΙΟΥ\r\n'),(998,967,9,'ΛΥΚΕΙΟ ΦΙΛΟΤΙΟΥ ΝΑΞΟΥ\r\n'),(999,968,9,'ΛΥΚΕΙΟ ΕΛΟΥΣ\r\n'),(1000,969,9,'ΛΥΚΕΙΟ ΕΣΠΕΡΙΝΟ ΣΠΑΡΤΗΣ\r\n'),(1001,970,9,'ΛΥΚΕΙΟ ΑΡΕΟΠΟΛΕΩΣ\r\n'),(1002,971,9,'ΛΥΚΕΙΟ ΒΛΑΧΙΩΤΗ\r\n'),(1003,972,9,'ΛΥΚΕΙΟ ΓΥΘΕΙΟΥ\r\n'),(1004,973,9,'ΛΥΚΕΙΟ ΚΑΣΤΟΡΕΙΟΥ\r\n'),(1005,974,9,'ΛΥΚΕΙΟ ΚΡΟΚΕΩΝ\r\n'),(1006,975,9,'ΛΥΚΕΙΟ ΣΚΑΛΑΣ\r\n'),(1007,976,9,'ΛΥΚΕΙΟ ΜΟΛΑΩΝ\r\n'),(1008,977,9,'ΛΥΚΕΙΟ ΝΕΑΠΟΛΕΩΣ ΛΑΚΩΝΙΑΣ\r\n'),(1009,978,9,'ΛΥΚΕΙΟ ΞΗΡΟΚΑΜΠΙΟΥ\r\n'),(1010,979,9,'ΛΥΚΕΙΟ ΓΕΡΑΚΙΟΥ\r\n'),(1011,980,9,'ΛΥΚΕΙΟ ΜΟΝΕΜΒΑΣΙΑΣ\r\n'),(1012,981,9,'9ΟΝ ΛΥΚΕΙΟ ΛΑΡΙΣΑΣ\r\n'),(1013,982,9,'ΛΥΚΕΙΟ ΛΑΡΙΣΑΣ ΜΟΥΣΙΚ\r\n'),(1014,983,9,'ΛΥΚΕΙΟ ΝΙΚΑΙΑΣ ΛΑΡΙΣΗΣ\r\n'),(1015,984,9,'ΛΥΚΕΙΟ ΑΓΙΑΣ\r\n'),(1016,985,9,'ΛΥΚΕΙΟ ΓΟΝΝΩΝ\r\n'),(1017,986,9,'ΛΥΚΕΙΟ ΤΣΑΡΙΤΣΑΝΗΣ\r\n'),(1018,987,9,'ΛΥΚΕΙΟ ΣΥΚΟΥΡΙΟΥ\r\n'),(1019,988,9,'ΛΥΚΕΙΟ ΑΜΠΕΛΩΝΟΣ\r\n'),(1020,989,9,'ΛΥΚΕΙΟ ΤΥΡΝΑΒΟΥ\r\n'),(1021,990,9,'ΛΥΚΕΙΟ ΛΙΒΑΔΙΟΥ ΛΑΡΙΣΑΣ\r\n'),(1022,991,9,'ΛΥΚΕΙΟ ΠΥΡΓΕΤΟΥ ΛΑΡΙΣΑΣ\r\n'),(1023,992,9,'ΛΥΚΕΙΟ ΓΙΑΝΝΟΥΛΗΣ\r\n'),(1024,993,9,'ΛΥΚΕΙΟ ΚΡΑΝΕΑΣ ΕΛΑΣΣΟΝΟΣ\r\n'),(1025,994,9,'ΛΥΚΕΙΟ ΠΛΑΤΥΚΑΜΠΟΥ ΛΑΡΙΣΑΣ\r\n'),(1026,995,9,'ΛΥΚΕΙΟ  ΚΑΛΛΙΘΕΑΣ ΛΑΡΙΣΑΣ\r\n'),(1027,996,9,'ΛΥΚΕΙΟ ΑΓΙΟΥ ΝΙΚΟΛΑΟΥ ΚΛΑΣ.\r\n'),(1028,997,9,'ΛΥΚΕΙΟ ΑΓΙΟΥ ΝΙΚΟΛΑΟΥ\r\n'),(1029,998,9,'ΛΥΚΕΙΟ ΝΕΑΠΟΛΕΩΣ ΛΑΣΗΘΙΟΥ\r\n'),(1030,999,9,'ΛΥΚΕΙΟ ΣΗΤΕΙΑΣ\r\n'),(1031,1000,9,'ΛΥΚΕΙΟ ΤΖΕΡΜΙΑΔΩΝ\r\n'),(1032,1001,8,'Τ Ε Ε  ΑΓΙΑΣΟΥ\r\n'),(1033,1002,8,'ΕΣΠ Τ Ε Ε  ΜΥΤΙΛΗΝΗΣ\r\n'),(1034,1003,9,'ΛΥΚΕΙΟ ΜΥΡΙΝΑΣ\r\n'),(1035,1004,9,'ΛΥΚΕΙΟ ΚΑΛΛΟΝΗΣ\r\n'),(1036,1005,9,'ΛΥΚΕΙΟ ΜΥΡΙΝΗΣ\r\n'),(1037,1006,9,'ΛΥΚΕΙΟ ΜΑΝΤΑΜΑΔΟΥ ΛΕΣΒΟΥ\r\n'),(1038,1007,9,'ΛΥΚΕΙΟ ΚΑΛΟΝΗΣ\r\n'),(1039,1008,9,'ΛΥΚΕΙΟ ΓΕΡΑΣ\r\n'),(1040,1009,9,'ΛΥΚΕΙΟ ΠΛΩΜΑΡΙΟΥ\r\n'),(1041,1010,9,'ΛΥΚΕΙΟ ΠΟΛΙΧΝΙΤΟΥ\r\n'),(1042,1011,9,'ΛΥΚΕΙΟ ΑΝΤΙΣΣΗΣ\r\n'),(1043,1012,9,'ΛΥΚΕΙΟ ΠΑΜΦΙΛΩΝ ΛΕΣΒΟΥ\r\n'),(1044,1013,9,'ΛΥΚΕΙΟ ΠΕΤΡΑΣ ΛΕΣΒΟΥ\r\n'),(1045,1001,9,'ΛΥΚΕΙΟ ΑΓΙΑΣΟΥ\r\n'),(1046,1014,9,'ΕΝΙΑΙΟ ΛΥΚΕΙΟ ΜΟΥΔΡΟΥ\r\n'),(1047,1015,8,'ΤΑΞ.ΛΥΚ.ΓΥΜ ΑΓΡΑΣ\r\n'),(1048,1016,9,'ΛΥΚΕΙΟ ΜΥΤΙΛΗΝΗΣ ΕΣΠΕΡ\r\n'),(1049,1017,9,'ΛΥΚΕΙΟ  ΑΓ ΕΥΣΤΡΑΤΙΟΥ\r\n'),(1050,1018,9,'ΛΥΚΕΙΟ ΚΑΡΥΑΣ ΛΕΥΚΑΔΟΣ\r\n'),(1051,1019,9,'ΛΥΚΕΙΟ ΝΥΔΡΙΟΥ\r\n'),(1052,1020,8,'Τ Ε Ε  ΒΕΛΕΣΤΙΝΟΥ\r\n'),(1053,1021,8,'Τ Ε Ε  ΣΚΟΠΕΛΟΥ\r\n'),(1054,1022,9,'ΛΥΚΕΙΟ ΒΟΛΟΥ ΕΣΠΕΡΙΝΟΝ\r\n'),(1055,1023,9,'ΛΥΚΕΙΟ Ν.ΙΩΝΙΑΣ ΒΟΛΟΥ ΓΕΝΙΚΟ\r\n'),(1056,1024,9,'ΛΥΚΕΙΟ ΑΓΡΙΑΣ\r\n'),(1057,1025,9,'ΛΥΚΕΙΟ ΑΛΜΥΡΟΥ\r\n'),(1058,1020,9,'ΛΥΚΕΙΟ ΒΕΛΕΣΤΙΝΟΥ\r\n'),(1059,1026,9,'ΛΥΚΕΙΟ ΖΑΓΟΡΑΣ\r\n'),(1060,1027,9,'ΛΥΚΕΙΟ ΤΣΑΓΚΑΡΑΔΑΣ\r\n'),(1061,1028,9,'ΛΥΚΕΙΟ ΑΡΓΑΛΑΣΤΗΣ\r\n'),(1062,1029,9,'ΛΥΚΕΙΟ ΣΚΙΑΘΟΥ\r\n'),(1063,1021,9,'ΛΥΚΕΙΟ ΣΚΟΠΕΛΟΥ\r\n'),(1064,1030,9,'ΛΥΚΕΙΟ ΚΑΝΑΛΙΩΝ\r\n'),(1065,1031,9,'ΛΥΚΕΙΟ ΝΕΑΣ ΑΓΧΙΑΛΟΥ\r\n'),(1066,1032,9,'ΛΥΚΕΙΟ ΚΑΛΑΜΑΤΑΣ ΕΣΠΕΡΙΝΟΝ\r\n'),(1067,1033,9,'ΛΥΚΕΙΟ ΚΑΛΑΜΑΤΑΣ ΜΟΥΣΙΚΟ\r\n'),(1068,1034,9,'ΛΥΚΕΙΟ ΜΕΣΣΗΝΗΣ\r\n'),(1069,1035,9,'ΛΥΚΕΙΟ ΘΟΥΡΙΑΣ\r\n'),(1070,1036,9,'ΛΥΚΕΙΟ ΑΝΔΡΟΥΣΗΣ\r\n'),(1071,1037,9,'ΛΥΚΕΙΟ ΑΡΙΣΤΟΜΕΝΟΥΣ\r\n'),(1072,1038,9,'ΛΥΚΕΙΟ ΑΡΦΑΡΩΝ\r\n'),(1073,1039,9,'ΛΥΚΕΙΟ ΓΑΡΓΑΛΙΑΝΩΝ\r\n'),(1074,1040,9,'ΛΥΚΕΙΟ ΧΩΡΑΣ ΤΡΙΦΥΛΙΑΣ\r\n'),(1075,1041,9,'ΛΥΚΕΙΟ ΜΕΛΙΓΑΛΑ\r\n'),(1076,1042,9,'ΛΥΚΕΙΟ ΔΙΑΒΟΛΙΤΣΙΟΥ\r\n'),(1077,1043,9,'ΛΥΚΕΙΟ ΔΩΡΙΟΥ\r\n'),(1078,1044,9,'ΛΥΚΕΙΟ ΚΟΠΑΝΑΚΙΟΥ\r\n'),(1079,1045,9,'ΛΥΚΕΙΟ ΚΟΡΩΝΗΣ\r\n'),(1080,1046,9,'ΛΥΚΕΙΟ ΚΥΠΑΡΙΣΣΙΑΣ\r\n'),(1081,1047,9,'ΛΥΚΕΙΟ ΠΥΛΟΥ\r\n'),(1082,1048,9,'ΛΥΚΕΙΟ ΜΕΘΩΝΗΣ\r\n'),(1083,1049,9,'ΛΥΚΕΙΟ ΠΕΤΑΛΙΔΙΟΥ\r\n'),(1084,1050,9,'ΛΥΚΕΙΟ ΦΙΛΙΑΤΡΩΝ\r\n'),(1085,1051,9,'ΛΥΚΕΙΟ ΚΑΡΔΑΜΥΛΗΣ\r\n'),(1086,1052,9,'ΛΥΚΕΙΟ ΣΤΑΥΡΟΥΠΟΛΕΩΣ\r\n'),(1087,1053,9,'ΛΥΚΕΙΟ ΑΒΔΗΡΩΝ ΞΑΝΘΗΣ\r\n'),(1088,1054,9,'ΛΥΚΕΙΟ ΕΧΙΝΟΥ ΞΑΝΘΗΣ ΙΕΡΑΣΠ\r\n'),(1089,1055,9,'ΛΥΚΕΙΟ ΓΛΑΥΚΗΣ\r\n'),(1090,1056,8,'ΕΠΛ   ΑΡΙΔΑΙΑΣ\r\n'),(1091,1057,8,'ΕΠΛ  ΓΙΑΝΝΙΤΣΩΝ\r\n'),(1092,1058,9,'ΛΥΚΕΙΟ ΚΡΥΑΣ ΒΡΥΣΗΣ\r\n'),(1093,1059,9,'ΓΕΝ ΛΥΚΕΙΟ ΕΔΕΣΣΑΣ\r\n'),(1094,1060,9,'ΛΥΚΕΙΟ ΕΞΑΠΛΑΤΑΝΟΥ\r\n'),(1095,1061,9,'ΛΥΚΕΙΟ ΣΚΥΔΡΑΣ\r\n'),(1096,1062,9,'ΛΥΚΕΙΟ ΚΑΛΗΣ\r\n'),(1097,1063,9,'ΛΥΚΕΙΟ ΚΑΤΕΡΙΝΗΣ ΕΣΠΕΡΙΝΟ\r\n'),(1098,1064,9,'ΛΥΚΕΙΟ ΑΙΓΙΝΙΟΥ\r\n'),(1099,1065,9,'ΛΥΚΕΙΟ ΚΟΛΥΝΔΡΟΥ\r\n'),(1100,1066,9,'ΛΥΚΕΙΟ ΛΙΤΟΧΩΡΟΥ\r\n'),(1101,1067,9,'ΛΥΚΕΙΟ ΚΟΝΤΑΡΙΩΤΙΣΣΑΣ\r\n'),(1102,1068,8,'Τ Ε Λ  ΦΙΛΙΠΠΙΑΔΑΣ\r\n'),(1103,1069,7,'Τ Ε Λ  ΚΑΝΑΛΑΚΙΟΥ\r\n'),(1104,1070,8,'Τ Ε Σ  ΠΡΕΒΕΖΑΣ\r\n'),(1105,1071,8,'Τ Ε Σ  ΚΑΝΑΛΑΚΙΟΥ\r\n'),(1106,1072,8,'ΕΠΛ ΠΡΕΒΕΖΑΣ\r\n'),(1107,1073,9,'ΛΥΚΕΙΟ ΘΕΣΠΡΩΤΙΚΟΥ\r\n'),(1108,1074,9,'ΛΥΚΕΙΟ ΠΑΡΓΑΣ\r\n'),(1109,1075,9,'ΛΥΚΕΙΟ ΛΟΥΡΟΥ\r\n'),(1110,1071,9,'ΛΥΚΕΙΟ ΚΑΝΑΛΑΚΙΟΥ\r\n'),(1111,1076,9,'ΛΥΚΕΙΟ ΑΝΩΓΕΙΩΝ\r\n'),(1112,1077,9,'ΛΥΚΕΙΟ ΠΕΡΑΜΑΤΟΣ ΜΥΛΟΠΟΤΑΜΟΥ\r\n'),(1113,1078,9,'ΛΥΚΕΙΟ ΣΠΗΛΙΟΥ\r\n'),(1114,1079,9,'ΛΥΚΕΙΟ ΦΟΥΡΦΟΥΡΑ\r\n'),(1115,1080,9,'ΛΥΚΕΙΟ ΣΑΠΠΩΝ\r\n'),(1116,1081,9,'ΛΥΚΕΙΟ ΙΑΣΜΟΥ ΚΟΜΟΤΗΝΗΣ\r\n'),(1117,1082,9,'ΛΥΚΕΙΟ ΞΥΛΑΓΑΝΗΣ\r\n'),(1118,1083,8,'Τ Ε Ε  ΚΑΡΛΟΒΑΣΙΟΥ\r\n'),(1119,1084,8,'Τ Ε Ε  ΣΑΜΟΥ\r\n'),(1120,1085,8,'Τ Ε Ε  ΙΚΑΡΙΑΣ\r\n'),(1121,1084,9,'ΛΥΚΕΙΟ ΣΑΜΟΥ\r\n'),(1122,1086,9,'ΛΥΚΕΙΟ ΑΓΙΟΥ ΚΗΡΥΚΟΥ\r\n'),(1123,1083,9,'ΛΥΚΕΙΟ ΚΑΡΛΟΒΑΣΙΟΥ\r\n'),(1124,1087,9,'ΛΥΚΕΙΟ ΕΥΔΗΛΟΥ ΙΚΑΡΙΑΣ\r\n'),(1125,1088,9,'ΛΥΚΕΙΟ ΜΑΡΑΘΟΚΑΜΠΟΥ\r\n'),(1126,1089,8,'ΤΕΕ ΗΡΑΚΛΕΙΑΣ\r\n'),(1127,1090,9,'ΛΥΚΕΙΟ ΑΛΙΣΤΡΑΤΗΣ\r\n'),(1128,1091,9,'ΛΥΚΕΙΟ ΗΡΑΚΛΕΙΑΣ\r\n'),(1129,1092,9,'ΛΥΚΕΙΟ ΚΑΤΩ ΠΟΡΟΙΩΝ\r\n'),(1130,1093,9,'ΛΥΚΕΙΟ ΝΕΑΣ ΖΙΧΝΗΣ\r\n'),(1131,1094,9,'ΛΥΚΕΙΟ ΝΙΓΡΙΤΗΣ\r\n'),(1132,1095,9,'ΛΥΚΕΙΟ ΤΕΡΠΝΗΣ ΣΕΡΡΩΝ\r\n'),(1133,1096,9,'ΛΥΚΕΙΟ ΠΡΩΤΗΣ ΣΕΡΡΩΝ\r\n'),(1134,1097,9,'ΛΥΚΕΙΟ ΡΟΔΟΛΙΒΟΥΣ\r\n'),(1135,1098,9,'ΛΥΚΕΙΟ ΣΙΔΗΡΟΚΑΣΤΡΟΥ ΣΕΡΡΩΝ\r\n'),(1136,1099,9,'ΛΥΚΕΙΟ ΒΥΡΩΝΕΙΑΣ\r\n'),(1137,1100,9,'ΛΥΚΕΙΟ ΠΡΟΒΑΤΑ\r\n'),(1138,1101,9,'ΛΥΚΕΙΟ ΣΤΡΥΜΟΝΙΚΟΥ\r\n'),(1139,1102,9,'ΛΥΚΕΙΟ ΜΑΥΡΟΘΑΛΑΣΣΗΣ\r\n'),(1140,1103,9,'ΛΥΚΕΙΟ ΠΕΝΤΑΠΟΛΕΩΣ\r\n'),(1141,1104,9,'ΛΥΚΕΙΟ ΝΕΟΥ ΣΚΟΠΟΥ ΣΕΡΡΩΝ\r\n'),(1142,1105,9,'ΛΥΚΕΙΟ ΣΚΟΥΤΑΡΕΩΣ\r\n'),(1143,1106,9,'ΛΥΚΕΙΟ ΤΡΙΚΑΛΩΝ ΕΣΠΕΡΙΝΟΝ\r\n'),(1144,1107,9,'ΛΥΚΕΙΟ ΚΑΛΑΜΠΑΚΑΣ\r\n'),(1145,1108,9,'ΛΥΚΕΙΟ ΠΥΛΗΣ\r\n'),(1146,1109,9,'ΛΥΚΕΙΟ ΟΙΧΑΛΙΑΣ-ΝΕΟΧΩΡΙΟΥ\r\n'),(1147,1110,9,'ΛΥΚΕΙΟ ΒΑΛΤΙΝΟΥ ΤΡΙΚΑΛΩΝ\r\n'),(1148,1111,9,'ΛΥΚΕΙΟ ΛΑΜΙΑΣ ΕΣΠΕΡΙΝΟΝ\r\n'),(1149,1112,9,'ΛΥΚΕΙΟ ΣΤΥΛΙΔΟΣ\r\n'),(1150,1113,9,'ΛΥΚΕΙΟ ΑΜΦΙΚΛΕΙΑΣ\r\n'),(1151,1114,9,'ΛΥΚΕΙΟ ΑΤΑΛΑΝΤΗΣ\r\n'),(1152,1115,9,'ΛΥΚΕΙΟ ΔΟΜΟΚΟΥ\r\n'),(1153,1116,9,'ΛΥΚΕΙΟ ΜΑΚΡΑΚΩΜΗΣ\r\n'),(1154,1117,9,'ΛΥΚΕΙΟ ΜΩΛΟΥ\r\n'),(1155,1118,9,'ΛΥΚΕΙΟ ΣΠΕΡΧΕΙΑΔΟΣ\r\n'),(1156,1119,9,'ΛΥΚΕΙΟ ΥΠΑΤΗΣ\r\n'),(1157,1120,9,'ΛΥΚΕΙΟ ΑΓΙΟΥ ΓΕΩΡΓΙΟΥ ΤΥΜΦΡΗ\r\n'),(1158,1121,9,'ΛΥΚΕΙΟ ΕΛΑΤΕΙΑΣ\r\n'),(1159,1122,9,'ΛΥΚΕΙΟ ΜΑΡΤΙΝΟΥ\r\n'),(1160,1123,9,'ΛΥΚΕΙΟ ΜΑΛΕΣΙΝΑΣ\r\n'),(1161,1124,9,'ΛΥΚΕΙΟ ΛΑΡΥΜΝΑΣ ΛΟΚΡΙΔΟΣ\r\n'),(1162,1125,9,'ΛΥΚΕΙΟ ΠΕΛΑΣΓΙΑΣ\r\n'),(1163,1126,9,'ΛΥΚΕΙΟ ΚΑΤΩ ΤΙΘΟΡΕΑΣ\r\n'),(1164,1127,9,'ΛΥΚΕΙΟ ΛΙΒΑΝΑΤΩΝ\r\n'),(1165,1128,9,'ΛΥΚΕΙΟ ΚΑΜΕΝΩΝ ΒΟΥΡΛΩΝ\r\n'),(1166,1128,9,'ΛΥΚΕΙΟ ΚΑΜΕΝΩΝ ΒΟΥΡΛΩΝ\r\n'),(1167,1129,9,'ΛΥΚΕΙΟ ΦΛΩΡΙΝΑΣ\r\n'),(1168,1130,9,'ΛΥΚΕΙΟ ΑΜΥΝΤΑΙΟΥ\r\n'),(1169,1131,9,'ΛΥΚΕΙΟ ΑΜΦΙΣΣΑΣ\r\n'),(1170,1132,9,'ΛΥΚΕΙΟ ΙΤΕΑΣ\r\n'),(1171,1133,9,'ΛΥΚΕΙΟ ΓΑΛΑΞΕΙΔΙΟΥ\r\n'),(1172,1134,9,'ΛΥΚΕΙΟ ΕΥΠΑΛΙΟΥ\r\n'),(1173,1135,9,'ΛΥΚΕΙΟ ΛΙΔΟΡΙΚΙΟΥ\r\n'),(1174,1136,9,'ΛΥΚΕΙΟ ΓΡΑΒΙΑΣ\r\n'),(1175,1137,9,'ΛΥΚΕΙΟ ΑΓΙΟΥ ΝΙΚΟΛΑΟΥ ΧΑΛΚΙΔ\r\n'),(1176,1138,9,'ΛΥΚΕΙΟ ΑΡΝΑΙΑΣ\r\n'),(1177,1139,9,'ΛΥΚΕΙΟ ΚΑΣΣΑΝΔΡΑΣ\r\n'),(1178,1140,9,'ΛΥΚΕΙΟ ΝΕΑΣ ΚΑΛΛΙΚΡΑΤΕΙΑΣ\r\n'),(1179,1141,9,'ΛΥΚΕΙΟ ΝΕΩΝ ΜΟΥΔΑΝΙΩΝ\r\n'),(1180,1142,9,'ΛΥΚΕΙΟ ΙΕΡΙΣΣΟΥ\r\n'),(1181,1143,9,'ΛΥΚΕΙΟ ΣΥΚΙΑΣ\r\n'),(1182,1144,9,'ΛΥΚΕΙΟ ΝΕΑΣ ΤΡΙΓΛΙΑΣ\r\n'),(1183,1145,9,'ΛΥΚΕΙΟ ΒΑΜΟΥ ΧΑΝΙΩΝ\r\n'),(1184,1146,9,'ΛΥΚΕΙΟ ΚΙΣΣΑΜΟΥ\r\n'),(1185,1147,9,'ΛΥΚΕΙΟ ΠΑΛΑΙΟΧΩΡΑΣ\r\n'),(1186,1148,9,'ΛΥΚΕΙΟ ΒΟΥΚΟΛΙΩΝ\r\n'),(1187,1149,9,'ΛΥΚΕΙΟ ΚΟΛΥΜΒΑΡΙΟΥ\r\n'),(1188,1150,9,'ΛΥΚΕΙΟ ΧΩΡΑΣ ΣΦΑΚΙΩΝ Α,Β\r\n'),(1189,1151,9,'ΛΥΚΕΙΟ ΑΛΙΚΙΑΝΟΥ\r\n'),(1190,1152,9,'ΛΥΚΕΙΟ ΣΟΥΔΑΣ ΧΑΝΙΩΝ\r\n'),(1191,1153,9,'ΛΥΚΕΙΟ ΒΟΛΙΣΣΟΥ ΧΙΟΥ\r\n'),(1192,1154,9,'ΛΥΚΕΙΟ ΨΑΡΩΝ\r\n'),(1193,1155,9,'ΛΥΚΕΙΟ ΚΑΛΑΜΩΤΗΣ\r\n'),(1194,1156,9,'ΛΥΚΕΙΟ ΚΑΡΔΑΜΥΛΩΝ\r\n'),(1195,1157,9,'ΛΥΚΕΙΟ ΚΑΛΛΙΜΑΣΙΑΣ\r\n'),(1196,1158,9,'ΛΥΚΕΙΟ ΚΑΜΠΟΥ\r\n'),(1197,1159,9,'ΛΥΚΕΙΟ ΑΜΠΕΛΑΚΙΩΝ ΣΑΛΑΜΙΝ\r\n'),(1198,1160,9,'ΛΥΚΕΙΟ ΑΙΓΙΝΗΣ\r\n'),(1199,1161,9,'ΛΥΚΕΙΟ ΚΥΘΗΡΩΝ\r\n'),(1200,1162,9,'ΛΥΚΕΙΟ ΥΔΡΑΣ\r\n'),(1201,1163,9,'ΛΥΚΕΙΟ ΣΠΕΤΣΩΝ\r\n');
/*!40000 ALTER TABLE `schools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schooltypes`
--

DROP TABLE IF EXISTS `schooltypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schooltypes` (
  `schooltype_id` int(11) NOT NULL AUTO_INCREMENT,
  `schooltype_name` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`schooltype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schooltypes`
--

LOCK TABLES `schooltypes` WRITE;
/*!40000 ALTER TABLE `schooltypes` DISABLE KEYS */;
INSERT INTO `schooltypes` VALUES (7,'Αλλη κατηγορία'),(8,'ΕΠΑΛ'),(9,'ΛΥΚΕΙΟ'),(10,'Πειραματικό ');
/*!40000 ALTER TABLE `schooltypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statistics`
--

DROP TABLE IF EXISTS `statistics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statistics` (
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  KEY `question_id` (`question_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `statistics_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`),
  CONSTRAINT `statistics_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statistics`
--

LOCK TABLES `statistics` WRITE;
/*!40000 ALTER TABLE `statistics` DISABLE KEYS */;
INSERT INTO `statistics` VALUES (1,49,1);
/*!40000 ALTER TABLE `statistics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_chapters`
--

DROP TABLE IF EXISTS `sub_chapters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_chapters` (
  `sub_chapter_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_chapter_name` varchar(64) DEFAULT NULL,
  `chapter_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sub_chapter_id`),
  KEY `chapter_id` (`chapter_id`),
  CONSTRAINT `sub_chapters_ibfk_1` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`chapter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_chapters`
--

LOCK TABLES `sub_chapters` WRITE;
/*!40000 ALTER TABLE `sub_chapters` DISABLE KEYS */;
INSERT INTO `sub_chapters` VALUES (3,'bariemai',3);
/*!40000 ALTER TABLE `sub_chapters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachers` (
  `firstname` varchar(64) DEFAULT NULL,
  `lastname` varchar(64) DEFAULT NULL,
  `age` tinyint(1) DEFAULT NULL,
  `username` varchar(64) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `salt` varchar(32) DEFAULT NULL,
  `isconfirmed` tinyint(1) DEFAULT '0',
  `firstlogin` datetime DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(64) DEFAULT NULL,
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `sendemail` tinyint(1) DEFAULT '0',
  `attemttosendemail` int(11) DEFAULT '0',
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` VALUES ('stefan','stefan',19,'stefan','649956690cba5fc3832856de18db8509','16100632016368023455',1,'2016-12-05 00:01:46','stefan1998xd@gmail.com',1,1,30);
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_levels`
--

DROP TABLE IF EXISTS `user_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_levels` (
  `user_level_id` int(11) NOT NULL,
  `user_level_name` varchar(32) NOT NULL,
  PRIMARY KEY (`user_level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_levels`
--

LOCK TABLES `user_levels` WRITE;
/*!40000 ALTER TABLE `user_levels` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) DEFAULT NULL,
  `lastname` varchar(32) DEFAULT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `salt` varchar(32) DEFAULT NULL,
  `isBlocked` tinyint(1) DEFAULT '0',
  `points` int(11) DEFAULT '0',
  `direction_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `direction_id` (`direction_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`direction_id`) REFERENCES `directions` (`direction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (46,'STEF','STEF',19,'stef','9695da374e86bf72f75a58a58e16fcfc','stef','2257c01ebe19297',0,0,1),(47,'babis','babis',1,'babis3001','33c4522d392d4caa783ed51ac866f7c7','mpampis_mpillinis@hotmail.com','3057e03c1184967',0,0,1),(48,'νανα','βαβανα',19,'babis3002','af521409fef8d05cd3d9afb0b1350e69','lopikolo1@hotmail.com','2257e19b009f6fa',0,0,1),(49,'SE','SE',10,'se','0b468a8b34225fb126b34b44a5ca5152','se','2657e19b0a9a8de',0,0,NULL),(50,'ηαηα','ηαηα',16,'babah','ea329106a3ce92843aac85b881f54906','bahahaha@.','3257e19c3090dab',0,0,NULL),(51,'βαβ','ηαηα',94,'babahnn','29e4f48c956e641188ddb37acda621f7','bana@.','3257e19d0cd0447',0,0,NULL),(52,'ηαηαη','βαβαβ',19,'bababa','0a9ca0c1669bb71f50be6a83cf377a02','nanja@.','3257e19fc238e85',0,0,NULL),(53,'ναναν','βααββ',91,'babababab','7e14861aea07dc66884d03565334d2b0','ahaj@.','3157e1a1f47d43c',0,0,NULL),(54,'ηαηαη','ηαηαηα',16,'babab','601d7155482842570694dc07e14e8167','najaj@.','2457e1a3531b9bd',0,0,NULL),(55,'βαβαβ','βαβαβ',16,'bababan','727c83087e9036cf73ab66f0ad1d3e3f','lopjkolakka@.','3057e1a4e77d444',0,0,NULL),(56,'βαβαβαβ','ωαωαβαβ',16,'babis3003','09a9e10209c3bef1a5a175b84a4bb698','janajs@.','3157e1c56a27cfa',0,0,1),(57,'ξαξαξ','ξαξαξα',16,'babis29','6698ea382f68e06f319dc497cd5ba661','lakak@.','3057e2742d7fb36',0,0,NULL),(58,'μπαμοβα','μαμαν',16,'kosmas','7a6f2c6d11e099b373131a8f87c64ab4','najajaaa@.','2557ebbc8389792',0,0,NULL),(59,'βαβαβ','ξαξαξ',16,'bababab','a455cbea69a9e2128394e6696e8b821f','najajaa@.','3057ebc048d2b4c',0,0,NULL),(60,'βαβαβ','βαβαβ',16,'kosmas3001','7c5c9525f7a020ca7e9c411c18d5813e','najajaha.@','2457ec23c10f63d',0,0,NULL),(61,'ξαξαβα','αβαναβ',19,'kosmas28','66625e38c0b9a8e8c54c30668d51f623','lopiajanaj@.','2957ec2442ed92d',0,0,NULL),(62,'ηαηαθ','βαηαη',16,'babjshaha','853ea8ad50779fbb99293f2ee11448a1','ahahahah@.','2857ec26dea1e00',0,0,NULL),(63,'γψψ','φδχσ',16,'hvgddd','58244c1b717413c34eb051b8fcb2688f','12345678@.','2357ec27856267e',0,0,NULL),(64,'φυξβφφ','γφφφ',16,'bgddfcff','61f4822f7534771aaba746a7514dd081','fssguy@.','2457ec27eeb086b',0,0,NULL),(65,'νανανα','βαβαβα',16,'babababaab','b0d820dcf452e9a791cd787e1c52436a','ajajahah@.','2657ec2870403ae',0,0,NULL),(66,'νανανα','ηαηαηαη',19,'bababababab','f33f3012a40662f9a81049d6552fd909','ajajajaj@.','2957ec2ac642acb',0,0,NULL),(67,'ξαξανα','ναναναν',16,'bababababaqj','f7c875d363396751659421a34301b806','nanajan@.','2757ec2bcb7fb5a',0,0,NULL),(68,'ASDASD','asdasdsasd',12,'babis300','70ef1593a08eb3abfc915b3e3788fdce','adsda@','2957ec2c3169b8a',0,0,1),(69,'βαβαβα','ηαηαηα',66,'babis3004','dce51897645f79f77e6ef5b2fa0e1def','jajaja@.','2557f6ac90aba70',0,0,1),(70,'στεφφ','στεεφ',18,'stefstef','c3883215a8ba2e33d4370f1705735761','st@v.v','2957fb440a22f56',0,0,1),(71,'μπαμπης','μπιλλινη',16,'babis3005','505d19b277b67cc4f3b0b32b66355dcc','jajaj@.','3157ff5cf72c113',0,0,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_union_teachers`
--

DROP TABLE IF EXISTS `users_union_teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_union_teachers` (
  `user_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`teacher_id`,`lesson_id`),
  KEY `teacher_id` (`teacher_id`),
  KEY `lesson_id` (`lesson_id`),
  CONSTRAINT `users_union_teachers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `users_union_teachers_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`),
  CONSTRAINT `users_union_teachers_ibfk_3` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`lesson_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_union_teachers`
--

LOCK TABLES `users_union_teachers` WRITE;
/*!40000 ALTER TABLE `users_union_teachers` DISABLE KEYS */;
INSERT INTO `users_union_teachers` VALUES (46,1,1),(49,1,1),(50,1,1),(51,1,1),(51,1,2);
/*!40000 ALTER TABLE `users_union_teachers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-02  6:15:19
