/*
SQLyog Ultimate v11.5 (64 bit)
MySQL - 10.4.6-MariaDB : Database - cipuskesmas
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `berkas` */

DROP TABLE IF EXISTS `berkas`;

CREATE TABLE `berkas` (
  `norm` varchar(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jk` varchar(2) DEFAULT NULL,
  `ttl` date DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `rak` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`norm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `berkas` */

insert  into `berkas`(`norm`,`nama`,`jk`,`ttl`,`alamat`,`rak`,`status`) values ('001','Petruk','L','2020-07-27','Ajung','','Dipinjam'),('002','Hasna','P','2020-07-26','Patrang','c',''),('003','Mujib','L','2020-07-26','Penangan','',''),('401','testing','L','2020-10-28','jember','C','Dipinjam'),('501','tesss','P','2020-10-12','lampung','','Dipinjam');

/*Table structure for table `pengembalian` */

DROP TABLE IF EXISTS `pengembalian`;

CREATE TABLE `pengembalian` (
  `id_transaksi` varchar(12) DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `telat` varchar(2) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pengembalian` */

insert  into `pengembalian`(`id_transaksi`,`tgl_pengembalian`,`telat`,`id_petugas`) values ('20200802001','2020-08-02','N',8),('20200802002','2020-08-02','N',8),('20200802003','2020-08-02','N',8),('20200802004','2020-08-02','N',8),('20200802004','2020-08-02','N',8),('20200802004','2020-08-02','N',8),('20200802004','2020-08-02','N',8),('20200802005','2020-08-02','N',8),('20200802006','2020-08-02','N',8),('20200802007','2020-08-02','Y',8),('20200802008','2020-08-02','Y',8),('20200802008','2020-08-02','Y',8),('20200802008','2020-08-02','Y',8),('20200802008','2020-08-02','Y',8),('20200802008','2020-08-02','Y',8),('20200802009','2020-08-02','N',8),('20200802010','2020-08-02','Y',8),('20200802011','2020-08-02','Y',8),('20200802012','2020-08-02','Y',8),('20200802013','2020-08-02','Y',8),('20200802013','2020-08-02','Y',8),('20200802013','2020-08-02','Y',8),('20200914014','2020-09-14','N',8),('20201031015','2020-10-31','N',8);

/*Table structure for table `petugas` */

DROP TABLE IF EXISTS `petugas`;

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `petugas` */

insert  into `petugas`(`id_petugas`,`username`,`full_name`,`password`,`role`) values (8,'admin','Admin Perpus','$2y$05$0RfFGKdD.I9/9SRZd9../.kIQg7pwgDxhICT0t1aPZh29Ia2oRA3u','admin'),(9,'abc','Fendy','$2y$05$mdep.SuT1FcurTIkLRdWFOIm7hR.48lB3lm41arhaUBDH180KTBVy','petugas'),(10,'hasna','hasna febrilya','$2y$05$myXoWHg3CZNtEn/2e5YLR.XYjmqW6S/BzL6AMvPyD33P40iDmew5e','kepala');

/*Table structure for table `poli` */

DROP TABLE IF EXISTS `poli`;

CREATE TABLE `poli` (
  `id_unit` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `poli` */

insert  into `poli`(`id_unit`,`nama`,`unit`) values (1,'Fendy','Poli THT'),(2,'dd','Poli THT');

/*Table structure for table `tmp` */

DROP TABLE IF EXISTS `tmp`;

CREATE TABLE `tmp` (
  `norm` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tmp` */

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(12) DEFAULT NULL,
  `id_unit` varchar(10) DEFAULT NULL,
  `norm` varchar(5) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `transaksi` */

insert  into `transaksi`(`id_transaksi`,`id_unit`,`norm`,`tanggal_pinjam`,`tanggal_kembali`,`status`,`id_petugas`) values ('20200802001','1','003','2020-08-02','2020-08-09','Y',8),('20200802002','1','002','2020-08-02','2020-08-09','Y',8),('20200802003','1','001','2020-08-02','2020-08-09','Y',8),('20200802004','1','001','2020-08-02','2020-08-09','Y',8),('20200802005','1','001','2020-08-02','2020-08-09','Y',8),('20200802006','1','001','2020-08-02','2020-08-09','Y',8),('20200802007','1','002','2020-08-02','2020-08-09','Y',8),('20200802008','1','002','2020-08-02','2020-08-09','Y',8),('20200802009','1','001','2020-08-02','2020-08-09','Y',8),('20200802010','1','003','2020-08-02','2020-08-09','Y',8),('20200802011','1','001','2020-08-02','2020-08-09','Y',8),('20200802012','1','001','2020-08-02','2020-08-09','Y',8),('20200802013','1','001','2020-08-02','2020-08-09','Y',8),('20200914014','1','001','2020-09-14','2020-09-21','Y',8),('20201031015','1','501','2020-10-31','2020-11-07','Y',8),('20201101016','1','401','2020-11-01','2020-11-08','N',8),('20210121017','1','001','2021-01-21','2021-01-28','N',8),('20210121018','1','001','2021-01-21','2021-01-28','N',8),('20210121019','1','001','2021-01-21','2021-01-28','N',8);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
