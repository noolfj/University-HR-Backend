/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 8.0.30 : Database - university_hr
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`university_hr` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `university_hr`;

/*Table structure for table `degrees` */

DROP TABLE IF EXISTS `degrees`;

CREATE TABLE `degrees` (
  `Degree_Id` int NOT NULL,
  `Degree_Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Degree_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Data for the table `degrees` */

insert  into `degrees`(`Degree_Id`,`Degree_Name`) values 
(1,'Бакалавриат'),
(2,'Магистратура'),
(3,'Доктор философии'),
(4,'Кандидат физико-математических наук'),
(5,'Кандидат физико-математических наук, доцент'),
(6,'Кандидат технических наук'),
(7,'Кандидат технических наук, доцент'),
(8,'Доктор экономических наук, профессор'),
(9,'Кандидат экономических наук'),
(10,'Кандидат экономических наук, доцент'),
(11,'Кандидат химических наук'),
(12,'Кандидат химических наук, доцент'),
(13,'Кандидат филологических наук'),
(14,'Степень ассоциата'),
(15,'Без степени');

/*Table structure for table `departments` */

DROP TABLE IF EXISTS `departments`;

CREATE TABLE `departments` (
  `Department_Id` int NOT NULL,
  `Department_Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Department_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Data for the table `departments` */

insert  into `departments`(`Department_Id`,`Department_Name`) values 
(1,'Электроснабжение и автоматика'),
(2,'Программирование и информационные  системы'),
(3,'Инженерная экономика и менеджмент'),
(4,' Физики и химии'),
(5,'Автомобили и управление на транспорте'),
(6,'Строительства'),
(7,'Государственный язык и обществоведение'),
(8,'Финансы и кредит'),
(9,'Высшая математика и информатика'),
(10,'Дизайна и архитектуры'),
(11,'Пищевая продукция и агротехнология'),
(12,'Кафедры Языков');

/*Table structure for table `employee_leave` */

DROP TABLE IF EXISTS `employee_leave`;

CREATE TABLE `employee_leave` (
  `leave_id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `comments` varchar(1000) DEFAULT NULL,
  `Username` varchar(30) DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `pdf_file` blob,
  PRIMARY KEY (`leave_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Data for the table `employee_leave` */

/*Table structure for table `employees` */

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `Employee_Id` int NOT NULL AUTO_INCREMENT,
  `Full_Name` varchar(255) DEFAULT NULL,
  `Date_of_Birth` date DEFAULT NULL,
  `Place_of_Birth` varchar(255) DEFAULT NULL,
  `Position_Id` int DEFAULT NULL,
  `Degree_Id` int DEFAULT NULL,
  `Faculty_Id` int DEFAULT NULL,
  `Department_Id` int DEFAULT NULL,
  `User_Role_Id` int DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone_Number` varchar(20) DEFAULT NULL,
  `Employee_Number` varchar(20) DEFAULT NULL,
  `Date_Added` date DEFAULT NULL,
  `Path_Photo` varchar(255) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Employee_Id`),
  KEY `Degree_Id` (`Degree_Id`),
  KEY `Faculty_Id` (`Faculty_Id`),
  KEY `Department_Id` (`Department_Id`),
  KEY `User_Role_Id` (`User_Role_Id`),
  KEY `employees_ibfk_1` (`Position_Id`),
  CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`Position_Id`) REFERENCES `positions` (`Position_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`Degree_Id`) REFERENCES `degrees` (`Degree_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `employees_ibfk_3` FOREIGN KEY (`Faculty_Id`) REFERENCES `faculties` (`Faculty_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `employees_ibfk_4` FOREIGN KEY (`Department_Id`) REFERENCES `departments` (`Department_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `employees_ibfk_5` FOREIGN KEY (`User_Role_Id`) REFERENCES `user_roles` (`User_Role_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb3;

/*Data for the table `employees` */

insert  into `employees`(`Employee_Id`,`Full_Name`,`Date_of_Birth`,`Place_of_Birth`,`Position_Id`,`Degree_Id`,`Faculty_Id`,`Department_Id`,`User_Role_Id`,`Email`,`Phone_Number`,`Employee_Number`,`Date_Added`,`Path_Photo`,`Username`,`Password`) values 
(1,'Максудов Хуршед Темурович','1958-09-20','Исфара',1,5,1,2,5,'jane.smith@example.com','987-654-3210','EMP002','2023-01-02','663cd88bf02598.65872519.png','Maksudov','Maksudov'),
(2,'Худойбердиев Хуршед Атохонович','1980-04-10','Исфара',2,5,1,2,2,'khudoyberdiev@gmail.com','111-222-3333','EMP003','2023-01-03','663c7fba8b7588.46532569.png','Khudoyberdiev','Khudoyberdiev'),
(3,'Ашурова Шабнам Нуруллоевна','2024-04-26','asda',4,15,1,2,2,'sdasd@gasd.com','12312','1231','2024-04-26','663c803e9e5b85.90505652.png','Ashurova','Ashurova'),
(4,'Назаров Абдусамад Абдурахмонович','2024-04-26','12312',4,15,1,2,2,'21eqwew@sdas.fdg','12312','12312','2024-04-26','663c80530c1ff6.67552740.png','Nazarov','Nazarov'),
(5,'Левандовский Богдан Игоревич ','2024-04-26','sda',1,2,1,1,2,'asdas@sda.com','12312','12312','2024-04-26',NULL,'Levandovski','Levandovski'),
(6,'Солиев Одилходжа Махмудходжаевич','1977-04-01','Исфара',4,6,4,4,2,' osoliev@gmail.com','+992928373035','EMP004','2023-01-04','663c8154d97381.33705858.jpg','Soliev','Soliev'),
(7,'Довудов Гулшан Мирбахоевич','1981-12-27','Исфара',2,1,1,2,2,'sada@gasd.csa','23123','12312','2024-04-26','663ca2541175f2.53483956.png','Dovudov','Dovudov'),
(8,'Усмонова Мохина Рустамовна','1981-08-24','Хучанд',6,1,1,1,4,'sada@gasd.csa','23123','12312','2024-04-26',NULL,'Usmonova','Usmonova'),
(9,'Косимов Абдунаби Абдурауфович','2024-04-26','ТЕмст',2,1,1,2,2,'sada@gasd.csa','23123','12312','2024-04-26',NULL,'etse','ауыуаы'),
(10,'Фозилова Мохирахон Музаффаровна','2024-04-26','wasd',1,3,3,1,2,'asasd@sdad.asd','123123','12312','2024-04-26',NULL,'qqqq','qqqq'),
(11,'Хакимова Ольга Ренатовна ','2024-04-26','ывф',4,3,2,1,2,'asda@sdas.com','12312','2312','2024-04-26',NULL,'12wad','asd'),
(12,'Зульфикорова Парвина Эгамовна','2024-04-26','ывф',4,3,2,1,2,'asda@sdas.com','12312','2312','2024-04-26',NULL,'12wad','asd'),
(13,'Фарзонаи Эрач','2024-04-26','sda',2,1,1,1,2,'asdas@sda.com','12312','12312','2024-04-26',NULL,'edsfsdfdsf','sdfsdf'),
(14,'Каюмова Дилафруз Дониёровна','2024-04-26','sda',2,1,1,1,2,'asdas@sda.com','12312','12312','2024-04-26',NULL,'edsfsdfdsf','sdfsdf'),
(15,'Каландаров Ҳусейнчон Умарович','2024-04-26','sda',2,1,1,1,2,'asdas@sda.com','12312','12312','2024-04-26',NULL,'edsfsdfdsf','asdas'),
(16,'Рахимов Охунбобо Сайфиддинович','2024-04-26','asdas',4,1,4,2,2,'ASdas@sca.cs','12312','12312','2024-04-26',NULL,'2321','12312'),
(17,'Хочиев Анвар Абдуллоевич','2024-04-26','asdas',4,1,4,2,2,'ASdas@sca.cs','12312','12312','2024-04-26',NULL,'2321','12312'),
(18,'Чураев Дадахон Собирчонович ','2024-04-26','asdas',4,1,4,2,2,'ASdas@sca.cs','12312','12312','2024-04-26',NULL,'2321','32323'),
(19,'Исломов Илесходжа Икромходжаевич','2024-04-26','asdas',4,1,4,2,2,'ASdas@sca.cs','12312','12312','2024-04-26',NULL,'2321','32323'),
(20,'Тошхуҷаева Мухайё Исломовна','2024-04-26','asdas',4,1,4,2,2,'ASdas@sca.cs','12312','12312','2024-04-26',NULL,'2321','32323'),
(21,'Комилова Махбуба Ёдгоровна ','2024-04-26','asdas',4,1,4,2,1,'ASdas@sca.cs','12312','12312','2024-04-26',NULL,'2321','32323'),
(22,'Мирхоликова Дилафруз Сайдуллоевна ','2024-04-26','asdas',4,1,4,2,1,'ASdas@sca.cs','12312','12312','2024-04-26',NULL,'2321','32323'),
(23,'Дадобоев Шахбоз Толибчонович','2024-04-26','asdas',4,1,4,2,1,'ASdas@sca.cs','12312','12312','2024-04-26',NULL,'2321','32323'),
(24,'Акилов Ахмадчон Ашурович ','2024-04-26','asdas',4,1,4,2,1,'ASdas@sca.cs','12312','12312','2024-04-26',NULL,'2321','32323'),
(25,'Болтуев Бахромчон Мухамадович','2024-04-26','asdas',4,1,4,2,1,'ASdas@sca.cs','12312','12312','2024-04-26',NULL,'2321','32323'),
(26,'Исмоилов Исмоилчон Илхомович','2024-04-26','asdas',4,1,4,2,1,'ASdas@sca.cs','12312','12312','2024-04-26',NULL,'2321','32323'),
(27,'Вохидов Аюбчон Чумаевич','2024-04-26','asdas',4,1,4,2,1,'ASdas@sca.cs','12312','12312','2024-04-26',NULL,'2321','32323'),
(28,'Каримов Ибодкул Рахимкулович','2024-04-26','asdas',4,1,4,2,1,'ASdas@sca.cs','12312','12312','2024-04-26',NULL,'2321','32323'),
(29,'Муминова Шохзодахон Назири ','2024-04-26','asdas',4,1,4,2,1,'ASdas@sca.cs','12312','12312','2024-04-26',NULL,'2321','32323'),
(30,'Авезов Азизулло Хабибович','2024-04-26','asdas',4,1,4,2,1,'ASdas@sca.cs','12312','12312','2024-04-26',NULL,'2321','32323'),
(31,'Авезова Махбуба Мухамедовна','2024-04-26','3123',1,5,1,2,1,'adas@gmial.com','123','1232','2024-04-26',NULL,'sd','asd'),
(32,'Назаров Абдушукур Абдурахимович','2024-04-26','3123',1,5,1,2,1,'adas@gmial.com','123','1232','2024-04-26',NULL,'sd','asd'),
(33,'Ахмедов Усмончон Хомидчонович','2024-04-26','3123',1,5,1,2,1,'adas@gmial.com','123','1232','2024-04-26',NULL,'sd','asd'),
(34,'Султонова Манзура Музафаровна','2024-04-26','3123',1,5,1,2,1,'adas@gmial.com','123','1232','2024-04-26',NULL,'sd','asd'),
(35,'Баходурова Сулхия Азизходжаевна ','2024-04-27','111',1,1,1,2,3,'111@gas.dsfds','121212','12121','2024-04-26',NULL,'121','12'),
(36,'Хомидов Ином Мухиддинович','2024-04-27','111',1,1,1,2,3,'111@gas.dsfds','121212','12121','2024-04-26',NULL,'121','12'),
(37,'Акрамова Заррина Башировн','2024-04-27','111',1,1,1,2,3,'111@gas.dsfds','121212','12121','2024-04-26',NULL,'121','12'),
(38,'Аминчонова Мухиба Мухамаднасимовна ','2024-04-27','111',1,1,1,2,3,'111@gas.dsfds','121212','12121','2024-04-26',NULL,'121','12'),
(39,'Ишанова Сарвар Сафиюллаевна','2024-04-27','111',1,1,1,2,3,'111@gas.dsfds','121212','12121','2024-04-26',NULL,'121','12'),
(40,'Абдуллоева Хабиба Рузибоевна','2024-04-27','111',1,1,1,2,3,'111@gas.dsfds','121212','12121','2024-04-26',NULL,'121','12'),
(41,'Косимова Малика Хамидходжаевна','2024-04-08','asdas',1,1,1,1,4,'asdas@asada.coms','2123','12312','2024-04-26',NULL,'asa','sadas'),
(42,'Саидхочаева Дилафрузхон Муталибовна','2024-04-08','asdas',1,1,1,1,4,'asdas@asada.coms','2123','12312','2024-04-26',NULL,'asa','sadas'),
(43,'Набиева Хусничон Наимовна','2024-04-08','asdas',1,1,1,1,4,'asdas@asada.coms','2123','12312','2024-04-26',NULL,'asa','sadas'),
(44,'Қосимова Манзура Абдусаломовна','2024-04-08','asdas',1,1,1,1,4,'asdas@asada.coms','2123','12312','2024-04-26',NULL,'asa','sadas'),
(45,'Турсунова Матлуба Ибрагимовна ','2024-04-26','wewqaeq',2,2,2,1,1,'sdas@gasd.scm','23123','12312','2024-04-26',NULL,'asd','asdasd'),
(46,'Мазбудов Субхон Сухробович','2024-04-26','wewqaeq',2,2,2,1,1,'sdas@gasd.scm','23123','12312','2024-04-26',NULL,'asd','asdasd'),
(47,'Ахати Фирдавс','2024-04-26','wewqaeq',2,2,2,1,1,'sdas@gasd.scm','23123','12312','2024-04-26',NULL,'asd','asdasd'),
(48,'Бойматова Дилрабо Комилчоновна','2024-04-26','wewqaeq',2,2,2,1,1,'sdas@gasd.scm','23123','12312','2024-04-26',NULL,'asd','asdas'),
(49,'Юсупова Махбуба Зафаровн','2024-04-26','wewqaeq',2,2,2,1,1,'sdas@gasd.scm','23123','12312','2024-04-26',NULL,'asd','asdas'),
(50,'Дмитриева Диана Владимировна ','2024-04-26','wewqaeq',2,2,2,1,1,'sdas@gasd.scm','23123','12312','2024-04-26',NULL,'asd','asdas'),
(51,'Каюмова Азиза Абдувалиевна','2024-04-26','wewqaeq',2,2,2,1,1,'sdas@gasd.scm','23123','12312','2024-04-26',NULL,'asd','asdas'),
(52,'Рахимов Сохибназар Шарифович','2024-05-03','123123123',4,2,1,5,2,'123123@asfas.dsfg','123','123','2024-04-26',NULL,'123','12'),
(53,'Чалилов Файзулло ','2024-05-03','123123123',4,2,1,5,2,'123123@asfas.dsfg','123','123','2024-04-26',NULL,'123','12'),
(54,'Рахимова Алия Рахимовна','2024-04-26','777',4,1,1,4,4,'777777@gmqas.drfg','7777','777','2024-04-26',NULL,'777','777'),
(55,'Тошходжаев Насим Азимович ','2024-04-26','545445',2,1,3,1,2,'5454@gmasf.dfgd','54545','5454','2024-04-26',NULL,'45','454'),
(56,'Хофизов Хофиз Раджабович','2024-04-26','3',5,2,1,5,1,'453@gs.fd','23','342','2024-04-26',NULL,'234','23'),
(57,'Бобочонов Хуршеджон Аминчонович','2024-04-26','2222222222',2,4,2,2,3,'222222222@gas.gff','222','222','2024-04-26',NULL,'2','2'),
(58,'Бобочонов Чурабой Чумабоевич','2024-04-26','2222222222',2,4,2,2,3,'222222222@gas.gff','222','222','2024-04-26',NULL,'2','2'),
(73,'Admin','2024-05-11','2',1,1,1,1,1,'Admin@gmail.com','1111111','1','2024-05-11',NULL,'Admin','Admin'),
(74,'Director','1990-05-10','-',1,7,4,1,5,'direcotr@gmail.com',' +992 (992) 98787674','12345','2024-05-10',NULL,'Director','Director');

/*Table structure for table `employees_plans` */

DROP TABLE IF EXISTS `employees_plans`;

CREATE TABLE `employees_plans` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Employee_Id` int NOT NULL,
  `Plan_Id` int NOT NULL,
  `selected_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `Employee_Id` (`Employee_Id`),
  KEY `Plan_Id` (`Plan_Id`),
  CONSTRAINT `employees_plans_ibfk_1` FOREIGN KEY (`Employee_Id`) REFERENCES `employees` (`Employee_Id`),
  CONSTRAINT `employees_plans_ibfk_2` FOREIGN KEY (`Plan_Id`) REFERENCES `plans` (`Plan_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Data for the table `employees_plans` */

/*Table structure for table `faculties` */

DROP TABLE IF EXISTS `faculties`;

CREATE TABLE `faculties` (
  `Faculty_Id` int NOT NULL,
  `Faculty_Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Faculty_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Data for the table `faculties` */

insert  into `faculties`(`Faculty_Id`,`Faculty_Name`) values 
(1,'Факультет информатики и энергетики'),
(2,'Факультет строительство и транспорта'),
(3,'Инженерно - экономический факультет'),
(4,'Инженерно - технологический факультет');

/*Table structure for table `plans` */

DROP TABLE IF EXISTS `plans`;

CREATE TABLE `plans` (
  `Plan_Id` int NOT NULL AUTO_INCREMENT,
  `Plan_Name` varchar(255) DEFAULT NULL,
  `Comment` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `Plan_Credit` double DEFAULT NULL,
  PRIMARY KEY (`Plan_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

/*Data for the table `plans` */

insert  into `plans`(`Plan_Id`,`Plan_Name`,`Comment`,`Plan_Credit`) values 
(1,'Аъзои гурӯхи кории Шӯрои олимони донишгоҳ','20 соат барои 1 комиссия (фармоиши ректор)',0.833),
(2,'Аъзои Шӯрои методии донишгоҳ','30 соат (фармоиши ректор)',1.25),
(3,'Аъзои Шӯрои методии факултет ва гурӯхҳои кории факултет','20 соат барои 1 комиссия (фармоиши ректор)',0.833),
(4,'Аъзои Шӯрои олимони донишгоҳ','40 соат (фармоиши ректор)',1.667),
(5,'Аъзои Шӯрои олимони факултет','50 соат барои 1 фан',1.25),
(6,'Барномаи таълимии фан, ки аз ҷониби Вазорати маъориф ва илми ҶТ тасдиқ мешавад','60 соат барои 1 курс (сертификат)',2.083),
(7,'Гузаштан аз курси такмили ихтисос ва бозомӯзӣ','60 соат барои 1 курс (сертификат)',2.5),
(8,'Иштирок ба дарсҳои хамдигар','3 соат барои 1 дарс (тибқи ҷадвали кафедравӣ) Ду соат барои иштирок, як соат барои таҳлил ва пешниҳоди хулоса',0.125),
(9,'Иштирок дар ташкил ва гузаронидани олимпиадаҳои фаннии хонандагон ва донишҷӯён','20 соат барои 1 фан (фармоиши ректор)',0.833),
(10,'Коркарди курсҳои электронии таълимӣ барои таҳсилоти фосилавӣ','50 соат барои 1 фан (тавсияи ШТМ ДПДТТХ)',2.083);

/*Table structure for table `positions` */

DROP TABLE IF EXISTS `positions`;

CREATE TABLE `positions` (
  `Position_Id` int NOT NULL,
  `Position_Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Position_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Data for the table `positions` */

insert  into `positions`(`Position_Id`,`Position_Name`) values 
(1,'Директор'),
(2,'Заведующий кафедрой'),
(3,'Преподователь'),
(4,'Старшый преподователь'),
(5,'Ассистент'),
(6,'Начальник отдела кадров');

/*Table structure for table `ratings` */

DROP TABLE IF EXISTS `ratings`;

CREATE TABLE `ratings` (
  `Rating_Id` int NOT NULL,
  `Employee_Id` int DEFAULT NULL,
  `Credit_Done` int DEFAULT NULL,
  `Credit_Full` int DEFAULT NULL,
  `Rating` decimal(3,2) DEFAULT NULL,
  PRIMARY KEY (`Rating_Id`),
  KEY `Employee_Id` (`Employee_Id`),
  CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`Employee_Id`) REFERENCES `employees` (`Employee_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Data for the table `ratings` */

/*Table structure for table `requests` */

DROP TABLE IF EXISTS `requests`;

CREATE TABLE `requests` (
  `Employee_Id` int DEFAULT NULL,
  `Full_Name` varchar(255) DEFAULT NULL,
  `Reason` varchar(255) DEFAULT NULL,
  `Start_Date` date DEFAULT NULL,
  `End_Date` date DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Data for the table `requests` */

/*Table structure for table `tasks_completed` */

DROP TABLE IF EXISTS `tasks_completed`;

CREATE TABLE `tasks_completed` (
  `Task_Id` int NOT NULL AUTO_INCREMENT,
  `Employee_Id` int NOT NULL,
  `Plan_Id` int NOT NULL,
  `File_Path` varchar(255) DEFAULT NULL,
  `COMMENT` text,
  `Completion_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Task_Id`),
  KEY `Employee_Id` (`Employee_Id`),
  KEY `Plan_Id` (`Plan_Id`),
  CONSTRAINT `tasks_completed_ibfk_1` FOREIGN KEY (`Employee_Id`) REFERENCES `employees` (`Employee_Id`),
  CONSTRAINT `tasks_completed_ibfk_2` FOREIGN KEY (`Plan_Id`) REFERENCES `plans` (`Plan_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Data for the table `tasks_completed` */



-- CREATE TABLE emp_rating (
--     emp_rat_id INT AUTO_INCREMENT PRIMARY KEY,
--     nazv VARCHAR(255),
--     comm VARCHAR(255),
--     ball varchar(255)
-- );

DROP TABLE IF EXISTS `emp_rating_vazorat`;

CREATE TABLE `emp_rating_vazorat` (
  `rating_Id` int NOT NULL AUTO_INCREMENT,
  `Employee_Id` int NOT NULL,
`omusgor1_1` decimal(3,1),
`omusgor1_2` decimal(3,1),
`omusgor1_3` decimal(3,1),
`omusgor1_4` decimal(3,1),
`omusgor1_5` decimal(3,1),
`omusgor1_6` decimal(3,1),
`omusgor1_7` decimal(3,1),
`omusgor1_8` decimal(3,1),
`omusgor2_1` decimal(3,1),
`omusgor2_2` decimal(3,1),
`omusgor2_3` decimal(3,1),
`omusgor2_4` decimal(3,1),
`omusgor2_5` decimal(3,1),
`omusgor2_6` decimal(3,1),
`omusgor3_1` decimal(3,1),
`omusgor3_2` decimal(3,1),
`omusgor3_3` decimal(3,1),
`omusgor3_4` decimal(3,1),
`omusgor3_5` decimal(3,1),
`omusgor3_6` decimal(3,1),
`omusgor3_7` decimal(3,1),
`omusgor3_8` decimal(3,1),
`omusgor3_9` decimal(3,1),
`omusgor3_10` decimal(3,1),
`omusgor3_11` decimal(3,1),
`omusgor4_1` decimal(3,1),
`omusgor4_2` decimal(3,1),
`omusgor4_3` decimal(3,1),
`omusgor4_4` decimal(3,1),
`omusgor4_5` decimal(3,1),
`omusgor4_6` decimal(3,1),
`omusgor4_7` decimal(3,1),
`omusgor5_1` decimal(3,1),
`omusgor5_2` decimal(3,1),
`omusgor5_3` decimal(3,1),
`omusgor5_4` decimal(3,1),
`omusgor5_5` decimal(3,1),
`omusgor5_6` decimal(3,1),
`omusgor5_7` decimal(3,1),
`omusgor5_8` decimal(3,1),
`omusgor5_9` decimal(3,1),
`omusgor5_10` decimal(3,1),
`omusgor5_11` decimal(3,1),

  PRIMARY KEY (`rating_Id`),
  KEY `Employee_Id` (`Employee_Id`),
  CONSTRAINT `emp_rating_vazorat_ibfk_1` FOREIGN KEY (`Employee_Id`) REFERENCES `employees` (`Employee_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

  -- `emp_rat_id` int NOT NULL,
-- KEY `emp_rat_id` (`emp_rat_id`),
  -- CONSTRAINT `emp_rating_vazorat_ibfk_2` FOREIGN KEY (`emp_rat_id`) REFERENCES `emp_rating` (`emp_rat_id`)

DROP TABLE IF EXISTS `training`;

CREATE TABLE `training` (
  `Training_Id` int NOT NULL,
  `Employee_Id` int DEFAULT NULL,
  PRIMARY KEY (`Training_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Data for the table `training` */

insert  into `training`(`Training_Id`,`Employee_Id`) values 
(1,1),
(2,2),
(3,3),
(4,4),
(5,5);

/*Table structure for table `user_roles` */

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `User_Role_Id` int NOT NULL,
  `User_Type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`User_Role_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Data for the table `user_roles` */

insert  into `user_roles`(`User_Role_Id`,`User_Type`) values 
(1,'Админ'),
(2,'Сотрудник'),
(3,'Менеджер отдел кадров'),
(4,'Начальник отдела кадров'),
(5,'Директор');

/*Table structure for table `vacancies` */

DROP TABLE IF EXISTS `vacancies`;

CREATE TABLE `vacancies` (
  `Vacancy_Id` int NOT NULL AUTO_INCREMENT,
  `Vacancy_Title` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Requirements` text NOT NULL,
  `Salary` decimal(10,2) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Created_At` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Vacancy_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

/*Data for the table `vacancies` */

insert  into `vacancies`(`Vacancy_Id`,`Vacancy_Title`,`Description`,`Requirements`,`Salary`,`Location`,`Created_At`) values 
(1,'Backend разработчик','Мы ищем опытного Backend разработчика для создания и поддержки серверной части веб-приложений.','Опыт работы с языками программирования: PHP, Python, Java, etc.\r\nЗнание SQL и опыт работы с базами данных (MySQL, PostgreSQL, MongoDB).\r\nПонимание принципов архитектуры веб-приложений.\r\nУмение работать в команде и готовность обучаться новым технологиям.',5000.00,'Худжанд','2024-05-10 07:47:50'),
(2,'Frontend разработчик','Мы ищем опытного Frontend разработчика для создания интерфейсов пользовательских веб-приложений.','Знание HTML, CSS и JavaScript.\r\nОпыт работы с фреймворками и библиотеками, такими как React, Vue.js или Angular.\r\nУмение работать с макетами и прототипами интерфейсов.\r\nПонимание основ UX/UI дизайна.',4500.00,'Худжанд','2024-05-10 07:50:05'),
(3,'Администратор Базы Данных','Мы ищем опытного администратора баз данных для обеспечения надежности, производительности и безопасности баз данных.','Знание SQL и опыт работы с реляционными и NoSQL базами данных (MySQL, PostgreSQL, MongoDB, etc.).\r\nОпыт администрирования баз данных и оптимизации их производительности.\r\nНавыки резервного копирования, восстановления и обеспечения безопасности данных.\r\nУмение разрабатывать и поддерживать процедуры мониторинга и отчетности.',5500.00,'Худжанд','2024-05-10 07:51:01');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
