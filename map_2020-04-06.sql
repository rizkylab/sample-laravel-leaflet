# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.25)
# Database: map
# Generation Time: 2020-04-05 17:33:19 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table map
# ------------------------------------------------------------

DROP TABLE IF EXISTS `map`;

CREATE TABLE `map` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` enum('Terminal','Kantor','Pelabuhan','Bandara','Angkot') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `map` WRITE;
/*!40000 ALTER TABLE `map` DISABLE KEYS */;

INSERT INTO `map` (`id`, `nama`, `alamat`, `latitude`, `longitude`, `link`, `kategori`)
VALUES
	(1,'Dishub Prov Bengkulu','Jl. Kapt. P. Tandean No.32, Jemb. Kecil, Kec. Singaran Pati, Kota Bengkulu, Bengkulu 38225','-3.8157474','102.2904071',NULL,'Kantor'),
	(2,'Dinas Perhubungan BU','Jl. Kolonel Alamsyah SH, Kali, Arga Makmur, Kabupaten Bengkulu Utara, Bengkulu 38611','-3.4479424','102.1540052',NULL,'Kantor'),
	(3,'Pelabuhan Bintuhan','Linau, Maje, Kaur Regency, Bengkulu 38963','-4.8427756','103.4111369',NULL,'Pelabuhan'),
	(4,'Dinas Perhubungan Kab. Kaur','Jl. Lintas Bar., Ps. Sauh, Kaur Sel., Kabupaten Kaur, Bengkulu 38963','-4.7915598','103.3434377',NULL,'Kantor'),
	(5,'Dinas Perhubungan Seluma','Talang Saling, Seluma, Seluma Regency, Bengkulu 38878','-4.081188','102.5504164',NULL,'Kantor'),
	(6,'Dinas Perhubungan Kota Bengkulu','Beringin Raya, Muara Bangka Hulu, Bengkulu City, Bengkulu 38121','-3.7576759','102.2610789',NULL,'Kantor'),
	(9,'Dinas Perhubungan Bengkulu Tengah','Surabaya, Sungai Serut, Bengkulu City, Bengkulu 38119','-3.7836075','102.3288029',NULL,'Kantor'),
	(14,'Bandara Fatmawati Soekarno Putri','Jalan Raya Padang kemiling, Pekan Sabtu, Selebar, Pekan Sabtu, Kec. Selebar, Kota Bengkulu, Bengkulu 38877','-3.8607114','102.3393172',NULL,'Bandara'),
	(19,'Terminal Gunung Ayu','Jl. Jenderal Ahmad Yani, Gn. Ayu, Kota Manna, Kabupaten Bengkulu Selatan, Bengkulu 38511','-4.4437962','102.9228206',NULL,'Terminal'),
	(25,'Terminal Simpang Nangka','Jalan Raya Simpang Nangka, Curup, Simpang Nangka, Selupu Rejang, Kabupaten Rejang Lebong, Bengkulu','-3.4551222','102.5790198',NULL,'Terminal'),
	(30,'Pelabuhan Pulau Baai','Pulau Baai, Jl. Yos Sudarso No.9, Tlk. Sepang, Kp. Melayu, Kota Bengkulu, Bengkulu 38216','-3.9315826','102.292667',NULL,'Pelabuhan'),
	(31,'UPPKB Padang Ulak Tanding','Padang Ulak Tanding','-3.3356644','102.8230112','-','Kantor');

/*!40000 ALTER TABLE `map` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
