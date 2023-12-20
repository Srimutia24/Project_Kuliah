-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_mcbooker
CREATE DATABASE IF NOT EXISTS `db_mcbooker` /*!40100 DEFAULT CHARACTER SET utf8mb4  */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_mcbooker`;

-- Dumping structure for table db_mcbooker.tb_daftarmc
CREATE TABLE IF NOT EXISTS `tb_daftarmc` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_mc` varchar(60) CHARACTER SET utf8mb4  DEFAULT NULL,
  `foto` varchar(200) CHARACTER SET utf8mb4  DEFAULT NULL,
  `profil` varchar(800)  DEFAULT NULL,
  `layanan` varchar(200)  DEFAULT NULL,
  `harga` varchar(50)  DEFAULT NULL,
  `tersedia` varchar(400) CHARACTER SET utf8mb4  DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 ;

-- Dumping data for table db_mcbooker.tb_daftarmc: ~2 rows (approximately)
INSERT INTO `tb_daftarmc` (`id`, `nama_mc`, `foto`, `profil`, `layanan`, `harga`, `tersedia`) VALUES
	(2, 'Munawwarah', 'mc1.jpeg', 'Seorang mahasiswa yang berbakat di bidang public speaking', 'pernikahan,ulang tahun,acara formal', '50000', '1 - 5 desember 2023'),
	(4, 'rehan', '69241-mc2.jpeg', 'orang alim baik hati tidak pernah berbohong', 'peusijuk', '40000', 'only monday'),
	(6, 'minibob', '91027-Funko Pop! Movies_ Minions 2 - Pajama Bob, Size_ST, Yellow.png', 'ahli ribut', 'kontes menyanyi', '100', 'kapan saja'),
	(7, 'Sri Mutia', '49460-WhatsApp Image 2022-11-15 at 07.59.46.jpeg', 'Anak baik budi ga pernah cakap kotor', 'apapun yang kamu mau', '90000', '');

-- Dumping structure for table db_mcbooker.tb_katacara
CREATE TABLE IF NOT EXISTS `tb_katacara` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis_acara` int DEFAULT NULL,
  `kategori_acara` varchar(50)  DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ;

-- Dumping data for table db_mcbooker.tb_katacara: ~2 rows (approximately)
INSERT INTO `tb_katacara` (`id`, `jenis_acara`, `kategori_acara`) VALUES
	(2, 2, 'game'),
	(3, 1, 'sunatan'),
	(4, 1, 'maulid');

-- Dumping structure for table db_mcbooker.tb_list_order
CREATE TABLE IF NOT EXISTS `tb_list_order` (
  `id_list_order` int NOT NULL AUTO_INCREMENT,
  `daftarmc` int DEFAULT NULL,
  `kode_order` bigint DEFAULT NULL,
  `jumlahdp` int DEFAULT NULL,
  `catatan` varchar(200)  DEFAULT NULL,
  `kat_acara` varchar(50)  DEFAULT NULL,
  PRIMARY KEY (`id_list_order`),
  KEY `daftarmc` (`daftarmc`),
  KEY `order` (`kode_order`) USING BTREE,
  CONSTRAINT `FK_tb_list_order_tb_daftarmc` FOREIGN KEY (`daftarmc`) REFERENCES `tb_daftarmc` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_list_order_tb_order` FOREIGN KEY (`kode_order`) REFERENCES `tb_order` (`id_order`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 ;

-- Dumping data for table db_mcbooker.tb_list_order: ~0 rows (approximately)
INSERT INTO `tb_list_order` (`id_list_order`, `daftarmc`, `kode_order`, `jumlahdp`, `catatan`, `kat_acara`) VALUES
	(6, 4, 2312182246766, 1222, 'telat datang', 'pesta'),
	(7, 6, 2312180935285, 12000, 'berlima', 'sunatan');

-- Dumping structure for table db_mcbooker.tb_order
CREATE TABLE IF NOT EXISTS `tb_order` (
  `id_order` bigint NOT NULL DEFAULT '0',
  `pelanggan` varchar(100)  DEFAULT NULL,
  `namamc` int DEFAULT NULL,
  `status` varchar(50)  DEFAULT NULL,
  `waktu_order` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `waktu_acara` varchar(50) CHARACTER SET utf8mb4  DEFAULT NULL,
  `alamat` varchar(200) CHARACTER SET utf8mb4  DEFAULT NULL,
  PRIMARY KEY (`id_order`),
  KEY `namamc` (`namamc`),
  CONSTRAINT `FK_tb_order_tb_daftarmc` FOREIGN KEY (`namamc`) REFERENCES `tb_daftarmc` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- Dumping data for table db_mcbooker.tb_order: ~2 rows (approximately)
INSERT INTO `tb_order` (`id_order`, `pelanggan`, `namamc`, `status`, `waktu_order`, `waktu_acara`, `alamat`) VALUES
	(2312180935285, 'nia', 2, NULL, '2023-12-19 05:56:55', '2023-12-21', 'Kpjl'),
	(2312182246766, 'muna', 2, NULL, '2023-12-19 05:53:39', '2023-12-19', 'kampungjawa');

-- Dumping structure for table db_mcbooker.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200)  DEFAULT NULL,
  `username` varchar(200)  DEFAULT NULL,
  `password` varchar(200)  DEFAULT NULL,
  `level` int DEFAULT NULL,
  `nohp` varchar(20)  DEFAULT NULL,
  `alamat` varchar(500)  DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 ;

-- Dumping data for table db_mcbooker.tb_user: ~4 rows (approximately)
INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`, `nohp`, `alamat`) VALUES
	(1, 'Syahira', 'admin@admin.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '0831214769712', 'Blang Pulo'),
	(4, 'Srimutia', 'abc1@abc.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '083121476971', 'Lhokseumawe'),
	(5, 'Agus', 'user@user.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '089072626626', 'Lhokseumawe'),
	(6, 'caca', 'caca@caca.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '08425413131', 'kodim');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
