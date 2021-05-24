/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.14-MariaDB : Database - belanja
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`belanja` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `belanja`;

/*Table structure for table `keranjang` */

DROP TABLE IF EXISTS `keranjang`;

CREATE TABLE `keranjang` (
  `id_cart` int(20) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah_beli` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `id_user` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cart`),
  KEY `id_produk` (`id_produk`),
  CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

/*Data for the table `keranjang` */

insert  into `keranjang`(`id_cart`,`id_produk`,`jumlah_beli`,`total_harga`,`id_user`) values 
(41,47,1,20000,'USR003'),
(42,45,1,15000,'USR003');

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(200) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `deskripsi` varchar(1000) DEFAULT NULL,
  `harga` int(25) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4;

/*Data for the table `produk` */

insert  into `produk`(`id_produk`,`nama_produk`,`jenis`,`deskripsi`,`harga`,`gambar`) values 
(1,'Jagung Susu Keju','dessert','Jagung spesial dengan susu dan keju yang melimpah',10000,'keju_susu.jpg'),
(2,'Jagung Susu Keju Balado','dessert','Jagung istimewa perbaduan keju dan balado yang gurih',12000,'keju_balado.jpg'),
(40,'Pizza','makanan','Pizza dengan toping yang beragam',150000,'02.jpg'),
(41,'Meatball','makanan','olahan daging giling pilihan',35000,'05.jpg'),
(45,'Orange Juice','minuman','Jus Jeruk Segar dari kebun sendiri',15000,'tab-item-02.png'),
(46,'Fruit Juice','minuman','Beragam Jus yang terbuat dari buah-buah segar angsung dari kebun sendiri',21000,'juice.jpg'),
(47,'gado-gado','makanan','Makanan khas Indonesia dengan sayur-sayuran disiram dengan saus kacang',20000,'gado.jpg'),
(48,'Choipan','dessert','Cemilan khas Pontianak dengan isi bengkuang',25000,'08.jpg'),
(49,'Strawberry Tea','minuman','Teh dari buah strawberry pilihan yang berkualitas',20000,'about-thumb-03.jpg'),
(50,'Pasta','makanan','Pasta ala Italia yang dimodifikasi dengan citarasa lokal',30000,'04.jpg'),
(53,'Salad Sayur','makanan','Beragam sayuran segar yang disajikan dengan perpaduan seimbang',30000,'plate3.png'),
(55,'Pancake','dessert','Makanan penutup yang lezat untuk kamu yang manis',21000,'menu-item-02.jpg'),
(57,'Premium Egg','makanan','telur mata  sapi premium',15000,'tab-item-04.png');

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `no_transaksi` int(20) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah_beli` int(25) DEFAULT NULL,
  `tanggal_beli` date DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `kode` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `id_user` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`no_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4;

/*Data for the table `transaksi` */

insert  into `transaksi`(`no_transaksi`,`id_produk`,`jumlah_beli`,`tanggal_beli`,`total_bayar`,`kode`,`status`,`id_user`) values 
(30,41,2,'2021-05-24',70000,'TRX001','selesai','USR001'),
(31,40,1,'2021-05-24',150000,'TRX001','selesai','USR001'),
(32,40,1,'2021-05-24',150000,'TRX002','selesai','USR002'),
(33,46,2,'2021-05-24',42000,'TRX002','selesai','USR002'),
(34,48,1,'2021-05-24',25000,'TRX002','selesai','USR002'),
(35,41,1,'2021-05-24',35000,'TRX002','selesai','USR002'),
(36,2,2,'2021-05-24',24000,'TRX002','selesai','USR002'),
(37,40,1,'2021-05-24',150000,'TRX003','menunggu pembayaran','USR001'),
(38,46,2,'2021-05-24',42000,'TRX003','menunggu pembayaran','USR001'),
(39,48,1,'2021-05-24',25000,'TRX003','menunggu pembayaran','USR001'),
(40,40,1,'2021-05-24',150000,'TRX003','menunggu pembayaran','USR001'),
(47,41,1,'2021-05-24',35000,'TRX004','menunggu pembayaran','USR003'),
(48,46,1,'2021-05-24',21000,'TRX004','menunggu pembayaran','USR003'),
(49,47,1,'2021-05-24',20000,'TRX005','menunggu pembayaran','USR001'),
(50,45,1,'2021-05-24',15000,'TRX005','menunggu pembayaran','USR001'),
(51,47,2,'2021-05-24',40000,'TRX005','menunggu pembayaran','USR001'),
(52,40,1,'2021-05-24',150000,'TRX005','menunggu pembayaran','USR001'),
(53,41,1,'2021-05-24',35000,'TRX005','menunggu pembayaran','USR001'),
(54,47,1,'2021-05-24',20000,'TRX006','menunggu pembayaran','USR001'),
(55,45,1,'2021-05-24',15000,'TRX006','menunggu pembayaran','USR001'),
(56,41,1,'2021-05-24',35000,'TRX006','menunggu pembayaran','USR001'),
(57,57,1,'2021-05-24',15000,'TRX006','menunggu pembayaran','USR001'),
(58,46,1,'2021-05-24',21000,'TRX006','menunggu pembayaran','USR001');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nomor_hp` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`id_user`,`username`,`password`,`nama_lengkap`,`nomor_hp`,`email`) values 
('USR001','silvia','123','silvia siladevi',8221882392,'silvia.spt123@gmail.com'),
('USR002','Tino','456','tino mendes',8635271,'tino.slg@gmail.com'),
('USR003','shawn22','shawn123','shawn mendes',82216390102,'shawn.gmail@com');

/* Trigger structure for table `transaksi` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `kosongkanCart` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `kosongkanCart` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
	delete from keranjang where id_user = new.id_user;
    END */$$


DELIMITER ;

/* Function  structure for function  `total_bayar` */

/*!50003 DROP FUNCTION IF EXISTS `total_bayar` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `total_bayar`(id_usera varchar (50)) RETURNS varchar(200) CHARSET utf8mb4
BEGIN
        DECLARE totbay INT(20);
	SELECT
	    SUM(keranjang.`total_harga`) into totbay
	FROM
	    keranjang
	WHERE id_user = id_usera ;
	RETURN CONCAT('Rp ',totbay,',00');
    END */$$
DELIMITER ;

/* Function  structure for function  `total_pemasukan` */

/*!50003 DROP FUNCTION IF EXISTS `total_pemasukan` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `total_pemasukan`() RETURNS varchar(200) CHARSET utf8mb4
BEGIN
	DECLARE totpem INT(20);
	SELECT
	    SUM(total_bayar) INTO totpem
	FROM
	    transaksi;
	RETURN CONCAT('Rp ',totpem,',00');
    END */$$
DELIMITER ;

/* Procedure structure for procedure `insert_cart` */

/*!50003 DROP PROCEDURE IF EXISTS  `insert_cart` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_cart`(id_produka INT, jumlah_beli int, id_usera VARCHAR(50))
BEGIN
	DECLARE tothar INT;
	SET tothar = ((SELECT harga FROM produk where id_produk = id_produka)*jumlah_beli);
		INSERT INTO keranjang(id_produk, jumlah_beli, total_harga, id_user) VALUES(id_produka, jumlah_beli, tothar, id_usera);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `insert_produk` */

/*!50003 DROP PROCEDURE IF EXISTS  `insert_produk` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_produk`( nama_produk VARCHAR(100),jenis VARCHAR(100), deskripsi Varchar(1000), harga InT, gambar VARCHAR (200))
BEGIN
		INSERT INTO produk VALUES('', nama_produk, jenis, deskripsi, harga, gambar);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `insert_transaksi` */

/*!50003 DROP PROCEDURE IF EXISTS  `insert_transaksi` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_transaksi`(id_produka int,jumlah_beli int,kode Varchar(50), id_usera VARCHAR(50))
BEGIN
	DECLARE totbay INT;
	declare tgl date;
	SET totbay = (SELECT p.harga*jumlah_beli FROM produk AS p WHERE p.id_produk = id_produka); 
	set tgl = (select curdate());
	Insert into transaksi (id_produk, jumlah_beli, tanggal_beli, total_bayar,kode,status, id_user) values (id_produka, jumlah_beli, tgl, totbay,kode,'menunggu pembayaran', id_usera);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `insert_user` */

/*!50003 DROP PROCEDURE IF EXISTS  `insert_user` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_user`(id_user varchar(20), username varchar(20), pass Varchar(20), nama_lengkap varchar(100), nomor_hp bigint, email varchar (50))
BEGIN
	insert into user values( id_user, username , pass, nama_lengkap, nomor_hp, email);
	END */$$
DELIMITER ;

/* Procedure structure for procedure `TopMenuu` */

/*!50003 DROP PROCEDURE IF EXISTS  `TopMenuu` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `TopMenuu`()
BEGIN
	DECLARE jumlahTerbanyak INT;
	SELECT MAX(pp.jumlah_penjualan) FROM penjualanProduk AS pp INTO jumlahTerbanyak;
	SELECT pp.`nama_produk`, pp.`jumlah_penjualan` AS jumlah
	FROM penjualanProduk AS pp
	WHERE pp.`jumlah_penjualan` = jumlahTerbanyak
	GROUP BY pp.id_produk;

	END */$$
DELIMITER ;

/* Procedure structure for procedure `update_cartView` */

/*!50003 DROP PROCEDURE IF EXISTS  `update_cartView` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `update_cartView`(id_carta INT, jumlah_belia INT)
BEGIN
        DECLARE tothar INT;
	SET tothar = ((SELECT harga FROM produk as p inner join keranjang as k on k.id_cart = id_carta WHERE p.id_produk = k.id_produk)*jumlah_belia);
	
	UPDATE keranjang
	SET  jumlah_beli = jumlah_belia, total_harga= tothar
	WHERE id_cart = id_carta;
	
	END */$$
DELIMITER ;

/* Procedure structure for procedure `update_produk` */

/*!50003 DROP PROCEDURE IF EXISTS  `update_produk` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `update_produk`(id_produka INT, nama_produk VARCHAR(50),jenis varchar(100), deskripsi varchar(1000), harga int, gambar varchar(100))
Begin
	uPDATE produk
	SET  nama_produk = nama_produk, jenis = jenis, deskripsi = deskripsi, harga = harga, gambar = gambar
	WHERE id_produk = id_produka;
	END */$$
DELIMITER ;

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

/*!50001 DROP VIEW IF EXISTS `cart` */;
/*!50001 DROP TABLE IF EXISTS `cart` */;

/*!50001 CREATE TABLE  `cart`(
 `id_cart` int(20) ,
 `id_user` varchar(50) ,
 `nama_produk` varchar(200) ,
 `gambar` varchar(100) ,
 `jumlah_beli` int(11) ,
 `total_harga` int(11) 
)*/;

/*Table structure for table `penjualanproduk` */

DROP TABLE IF EXISTS `penjualanproduk`;

/*!50001 DROP VIEW IF EXISTS `penjualanproduk` */;
/*!50001 DROP TABLE IF EXISTS `penjualanproduk` */;

/*!50001 CREATE TABLE  `penjualanproduk`(
 `id_produk` int(11) ,
 `nama_produk` varchar(200) ,
 `jumlah_penjualan` decimal(46,0) 
)*/;

/*Table structure for table `pernota` */

DROP TABLE IF EXISTS `pernota`;

/*!50001 DROP VIEW IF EXISTS `pernota` */;
/*!50001 DROP TABLE IF EXISTS `pernota` */;

/*!50001 CREATE TABLE  `pernota`(
 `id_user` varchar(100) ,
 `kode` varchar(50) ,
 `tanggal` date ,
 `total` decimal(32,0) ,
 `status` varchar(50) 
)*/;

/*Table structure for table `transaksiadmin` */

DROP TABLE IF EXISTS `transaksiadmin`;

/*!50001 DROP VIEW IF EXISTS `transaksiadmin` */;
/*!50001 DROP TABLE IF EXISTS `transaksiadmin` */;

/*!50001 CREATE TABLE  `transaksiadmin`(
 `id_user` varchar(100) ,
 `kode` varchar(50) ,
 `id_produk` int(11) ,
 `nama_produk` varchar(200) ,
 `jumlah_beli` int(25) ,
 `tanggal_beli` date ,
 `total_bayar` int(11) ,
 `status` varchar(50) 
)*/;

/*View structure for view cart */

/*!50001 DROP TABLE IF EXISTS `cart` */;
/*!50001 DROP VIEW IF EXISTS `cart` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cart` AS (select `keranjang`.`id_cart` AS `id_cart`,`keranjang`.`id_user` AS `id_user`,`produk`.`nama_produk` AS `nama_produk`,`produk`.`gambar` AS `gambar`,`keranjang`.`jumlah_beli` AS `jumlah_beli`,`keranjang`.`total_harga` AS `total_harga` from (`produk` join `keranjang`) where `produk`.`id_produk` = `keranjang`.`id_produk`) */;

/*View structure for view penjualanproduk */

/*!50001 DROP TABLE IF EXISTS `penjualanproduk` */;
/*!50001 DROP VIEW IF EXISTS `penjualanproduk` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `penjualanproduk` AS (select `t`.`id_produk` AS `id_produk`,`p`.`nama_produk` AS `nama_produk`,sum(`t`.`jumlah_beli`) AS `jumlah_penjualan` from (`transaksi` `t` join `produk` `p` on(`t`.`id_produk` = `p`.`id_produk`)) group by `t`.`id_produk`) */;

/*View structure for view pernota */

/*!50001 DROP TABLE IF EXISTS `pernota` */;
/*!50001 DROP VIEW IF EXISTS `pernota` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pernota` AS (select `transaksi`.`id_user` AS `id_user`,`transaksi`.`kode` AS `kode`,`transaksi`.`tanggal_beli` AS `tanggal`,sum(`transaksi`.`total_bayar`) AS `total`,`transaksi`.`status` AS `status` from `transaksi` group by `transaksi`.`kode`) */;

/*View structure for view transaksiadmin */

/*!50001 DROP TABLE IF EXISTS `transaksiadmin` */;
/*!50001 DROP VIEW IF EXISTS `transaksiadmin` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `transaksiadmin` AS (select `t`.`id_user` AS `id_user`,`t`.`kode` AS `kode`,`t`.`id_produk` AS `id_produk`,`p`.`nama_produk` AS `nama_produk`,`t`.`jumlah_beli` AS `jumlah_beli`,`t`.`tanggal_beli` AS `tanggal_beli`,`t`.`total_bayar` AS `total_bayar`,`t`.`status` AS `status` from (`transaksi` `t` join `produk` `p`) where `t`.`id_produk` = `p`.`id_produk`) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
