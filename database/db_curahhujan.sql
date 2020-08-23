/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 5.7.24 : Database - db_curahhujan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_curahhujan` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_curahhujan`;

/*Data for the table `curah_hujan` */

insert  into `curah_hujan`(`id_curah`,`stasiun_curah`,`tahun_curah`,`jumlah_curah`) values 
(1,1,2005,51.2),
(2,1,2006,70),
(3,1,2007,83.667),
(4,1,2008,144.467),
(5,1,2009,118.667),
(6,1,2010,171),
(7,1,2011,80),
(8,1,2012,137.667),
(9,1,2013,85.533),
(10,1,2014,62.533),
(13,2,2005,60),
(14,2,2006,86),
(15,2,2007,63),
(16,2,2008,75),
(17,2,2009,100),
(18,2,2010,378),
(19,2,2011,78),
(20,2,2012,231),
(21,2,2013,92),
(22,2,2014,60);

/*Data for the table `stasiun` */

insert  into `stasiun`(`id_stasiun`,`nama_stasiun`) values 
(1,'Stasiun 1'),
(2,'Tanjung Pati');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
