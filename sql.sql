/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.1.16-MariaDB : Database - kadai-sembako-db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `barangs` */

DROP TABLE IF EXISTS `barangs`;

CREATE TABLE `barangs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kategori_id` int(10) unsigned NOT NULL,
  `satuan_id` int(10) unsigned NOT NULL,
  `nm_barang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `keterangan` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `barangs` */

insert  into `barangs`(`id`,`kategori_id`,`satuan_id`,`nm_barang`,`harga`,`qty`,`keterangan`,`created_at`,`updated_at`) values (1,1,5,'Fanta 110ml',7500,1,'Minuman dingin bersoda yang sangat nikmat dinikmati bersama teman atau keluarga.','2016-12-22 06:10:26','2016-12-23 14:24:38'),(2,7,4,'Kangkung Organik',1500,15,'Sayuran organik tanpa pestisida.','2016-12-22 06:12:13','2016-12-23 14:24:38');

/*Table structure for table `detail_transaksis` */

DROP TABLE IF EXISTS `detail_transaksis`;

CREATE TABLE `detail_transaksis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transaksi_id` int(10) unsigned NOT NULL,
  `barang_id` int(10) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `detail_transaksis` */

insert  into `detail_transaksis`(`id`,`transaksi_id`,`barang_id`,`qty`,`harga`,`subtotal`,`created_at`,`updated_at`) values (1,2,1,5,7500,37500,'2016-12-23 09:33:34','2016-12-23 09:33:34'),(2,2,2,10,1500,15000,'2016-12-23 09:33:34','2016-12-23 09:33:34'),(3,3,1,1,7500,7500,'2016-12-23 15:12:40','2016-12-23 15:12:40');

/*Table structure for table `kategoris` */

DROP TABLE IF EXISTS `kategoris`;

CREATE TABLE `kategoris` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_kategori` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `kategoris` */

insert  into `kategoris`(`id`,`nm_kategori`,`created_at`,`updated_at`) values (1,'Minuman Dingin','2016-12-20 07:19:47','2016-12-20 07:19:47'),(2,'Makanan Ringan','2016-12-20 07:20:29','2016-12-20 07:20:29'),(4,'Sembako','2016-12-20 07:21:37','2016-12-20 07:21:37'),(5,'Bumbu Dapur','2016-12-20 14:54:38','2016-12-20 14:54:38'),(7,'Sayur','2016-12-20 15:43:16','2016-12-20 15:43:16'),(8,'Buah','2016-12-20 15:43:20','2016-12-20 15:43:20');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (37,'2014_10_12_000000_create_users_table',1),(38,'2014_10_12_100000_create_password_resets_table',1),(39,'2016_11_29_181304_create_barangs_table',1),(40,'2016_11_29_181357_create_kategoris_table',1),(41,'2016_11_29_181411_create_satuans_table',1),(42,'2016_11_29_181430_create_transaksis_table',1),(43,'2016_11_29_181447_create_detail_transaksis_table',1),(44,'2016_12_01_083336_create_roles_table',1),(45,'2016_12_01_083418_create_role_users_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `role_user` */

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`id`,`user_id`,`role_id`,`created_at`,`updated_at`) values (1,1,1,'2016-12-01 12:44:51','2016-12-01 12:44:51'),(2,2,2,'2016-12-01 12:44:51','2016-12-01 12:44:51'),(3,4,2,'2016-12-23 15:11:40','2016-12-23 15:11:40'),(4,5,2,'2016-12-23 17:31:21','2016-12-23 17:31:21');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`nama`,`created_at`,`updated_at`) values (1,'Admin','2016-12-01 12:44:50','2016-12-01 12:44:50'),(2,'Pelanggan','2016-12-01 12:44:50','2016-12-01 12:44:50');

/*Table structure for table `satuans` */

DROP TABLE IF EXISTS `satuans`;

CREATE TABLE `satuans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_satuan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `satuans` */

insert  into `satuans`(`id`,`nm_satuan`,`created_at`,`updated_at`) values (1,'Buah','2016-12-20 15:06:33','2016-12-20 15:06:33'),(3,'Kotak','2016-12-20 15:06:49','2016-12-20 15:06:49'),(4,'Ikat','2016-12-20 15:11:29','2016-12-20 15:11:29'),(5,'Kaleng','2016-12-22 06:09:10','2016-12-22 06:09:10');

/*Table structure for table `transaksis` */

DROP TABLE IF EXISTS `transaksis`;

CREATE TABLE `transaksis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `metode` enum('Cash On Delivery','Transfer Rekening') COLLATE utf8_unicode_ci NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `transaksis` */

insert  into `transaksis`(`id`,`user_id`,`tgl`,`metode`,`total_bayar`,`status`,`created_at`,`updated_at`) values (2,2,'2016-12-23','Cash On Delivery',57500,1,'2016-12-23 09:33:34','2016-12-23 14:24:38'),(3,4,'2016-12-23','Cash On Delivery',12500,0,'2016-12-23 15:12:40','2016-12-23 15:12:40');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tmp_lahir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jekel` enum('Pria','Wanita') COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`email`,`password`,`nama`,`tmp_lahir`,`tgl_lahir`,`jekel`,`alamat`,`telepon`,`status`,`remember_token`,`created_at`,`updated_at`) values (1,'admin@kadai-sembako.id','$2y$10$bcB1F7JyeLznI394xFPQrOyFTrCeDlN7Uw5hB7iReKedMJZB1Hql.','Adi Raka Siwi','Padang','1994-04-29','Pria','Komp. Filano Mandiri BLOK A1/1 Tabing','081268280648',1,'hrq0n93VTswnWSbcPdabAa3oki70bDHF6mPY6u5aYQfaTknpyVc6cFIeEV8G','2016-12-01 12:44:51','2016-12-23 15:08:09'),(2,'pelanggan@kadai-sembako.id','$2y$10$/mKZ7zphZgW.8UVQZSWeV.w2LrPIrKXk1tvJf9yrkj4S.0pcY7ytC','Rendra Syafputra','Padang','1994-04-29','Pria','Balai Baru','081268280648',1,'9ZjexogOudMnfV9Tetqkyr67ln8r3kKTcvJbJoNc5Rtdm8okt1VMy910hy0T','2016-12-01 12:44:51','2016-12-23 15:08:48'),(4,'adiraka8@gmail.com','$2y$10$m3Rt6B/fuFn7qw6IaecDWO.nkmr4m3qJjq15Kv1DbeRIJnIWdbK/C','Adi Raka Siwi','Padang','1994-04-29','Pria','Padang','081268280648',1,'suOWbYgKgVLZMcrsoGeQEmpsY2gxsd7bxnmK75nGZ8VGzqXW7zzBkM0wvcoM','2016-12-23 15:11:40','2016-12-23 15:12:54'),(5,'bujanggilo@gmail.com','$2y$10$GYAMbqKqQ3RY.tmvskbBjePdu1cf.gVbyGA35CCVYqr3IHdFeN/jS','Bujang Gilo','Padang','1992-04-29','Pria','Padang','081112344321',1,NULL,'2016-12-23 17:31:20','2016-12-23 17:31:20');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
