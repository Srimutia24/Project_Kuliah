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
CREATE DATABASE IF NOT EXISTS `db_mcbooker` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_mcbooker`;

-- Dumping structure for table db_mcbooker.tb_daftarmc
CREATE TABLE IF NOT EXISTS `tb_daftarmc` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_mc` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foto` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `profil` varchar(800) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `layanan` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `harga` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tersedia` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_mcbooker.tb_daftarmc: ~2 rows (approximately)
INSERT INTO `tb_daftarmc` (`id`, `nama_mc`, `foto`, `profil`, `layanan`, `harga`, `tersedia`) VALUES
	(2, 'Munawwarah', 'mc1.jpeg', 'Seorang mahasiswa yang berbakat di bidang public speaking', 'pernikahan,ulang tahun,acara formal', '50000', '1 - 5 desember 2023'),
	(4, 'rehan', '69241-mc2.jpeg', 'orang alim baik hati tidak pernah berbohong', 'peusijuk', '40000', 'only monday');

-- Dumping structure for table db_mcbooker.tb_katacara
CREATE TABLE IF NOT EXISTS `tb_katacara` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis_acara` int DEFAULT NULL,
  `kategori_acara` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_mcbooker.tb_katacara: ~3 rows (approximately)
INSERT INTO `tb_katacara` (`id`, `jenis_acara`, `kategori_acara`) VALUES
	(2, 2, 'game'),
	(3, 1, 'sunatan'),
	(4, 1, 'maulid');

-- Dumping structure for table db_mcbooker.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `level` int DEFAULT NULL,
  `nohp` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
