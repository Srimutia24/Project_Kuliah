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

-- Dumping structure for table db_decafe.tb_bayar
CREATE TABLE IF NOT EXISTS `tb_bayar` (
  `id_bayar` bigint NOT NULL,
  `nominal_uang` bigint DEFAULT NULL,
  `total_bayar` bigint DEFAULT NULL,
  `waktu_bayar` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bayar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_decafe.tb_bayar: ~3 rows (approximately)
INSERT INTO `tb_bayar` (`id_bayar`, `nominal_uang`, `total_bayar`, `waktu_bayar`) VALUES
	(2311132045359, 50000, 42000, '2023-11-14 04:33:02'),
	(2311132048954, 100000, 65000, '2023-11-13 19:19:54'),
	(2311140126448, 14000, 14000, '2023-11-13 19:17:21'),
	(2311140244748, 50000, 30000, '2023-11-13 19:45:51');

-- Dumping structure for table db_decafe.tb_daftar_menu
CREATE TABLE IF NOT EXISTS `tb_daftar_menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `foto` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_menu` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kategori` int DEFAULT NULL,
  `harga` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stok` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_tb_daftar_menu_tb_kategori_menu` (`kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_decafe.tb_daftar_menu: ~5 rows (approximately)
INSERT INTO `tb_daftar_menu` (`id`, `foto`, `nama_menu`, `keterangan`, `kategori`, `harga`, `stok`) VALUES
	(1, '69687-10.png', 'Teh Hangat', 'teh baru dipetik', 4, '5000', '23'),
	(2, '69377-13.png', 'Jus Jeruk', 'jeruk bali', 3, '8000', '5'),
	(7, '60162-5.png', 'Es Timun', 'sensasi dingin perpaduan dengan sirup melon ', 3, '12000', '30'),
	(8, '74561-1.png', 'Mie Aceh', 'Pakai daging dan telur', 5, '14000', '45'),
	(9, '35611-2.png', 'Burger', 'Daging sapi ', 8, '15000', '15');

-- Dumping structure for table db_decafe.tb_kategori_menu
CREATE TABLE IF NOT EXISTS `tb_kategori_menu` (
  `id_kat_menu` int NOT NULL AUTO_INCREMENT,
  `jenis_menu` int DEFAULT NULL,
  `kategori_menu` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_kat_menu`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_decafe.tb_kategori_menu: ~5 rows (approximately)
INSERT INTO `tb_kategori_menu` (`id_kat_menu`, `jenis_menu`, `kategori_menu`) VALUES
	(3, 2, 'Jus'),
	(4, 2, 'Kopi'),
	(5, 1, 'Mie'),
	(7, 1, 'Nasi '),
	(8, 1, 'Snack');

-- Dumping structure for table db_decafe.tb_list_order
CREATE TABLE IF NOT EXISTS `tb_list_order` (
  `id_list_order` int NOT NULL AUTO_INCREMENT,
  `menu` int DEFAULT NULL,
  `kode_order` bigint DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `catatan` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id_list_order`),
  KEY `menu` (`menu`),
  KEY `order` (`kode_order`) USING BTREE,
  CONSTRAINT `FK_tb_list_order_tb_daftar_menu` FOREIGN KEY (`menu`) REFERENCES `tb_daftar_menu` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_list_order_tb_order` FOREIGN KEY (`kode_order`) REFERENCES `tb_order` (`id_order`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_decafe.tb_list_order: ~6 rows (approximately)
INSERT INTO `tb_list_order` (`id_list_order`, `menu`, `kode_order`, `jumlah`, `catatan`, `status`) VALUES
	(1, 8, 2311132048954, 3, 'wvwe,m', 2),
	(3, 8, 2311132045359, 3, 'pake telur busuk', 2),
	(4, 2, 2311132048954, 1, 'tidak pake gula', 2),
	(5, 9, 2311132048954, 1, 'ga pake timun', 2),
	(7, 8, 2311140126448, 1, 'pedas', 2),
	(8, 9, 2311140244748, 2, 'saus tomat', 1);

-- Dumping structure for table db_decafe.tb_order
CREATE TABLE IF NOT EXISTS `tb_order` (
  `id_order` bigint NOT NULL DEFAULT '0',
  `pelanggan` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meja` int DEFAULT NULL,
  `pelayan` int DEFAULT NULL,
  `waktu_order` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_order`) USING BTREE,
  KEY `pelayan` (`pelayan`),
  CONSTRAINT `FK_tb_order_tb_user` FOREIGN KEY (`pelayan`) REFERENCES `tb_user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_decafe.tb_order: ~4 rows (approximately)
INSERT INTO `tb_order` (`id_order`, `pelanggan`, `meja`, `pelayan`, `waktu_order`) VALUES
	(2311132045359, 'anjay', 4, 2, '2023-11-14 04:32:16'),
	(2311132048954, 'sri', 3, 2, '2023-11-13 14:58:33'),
	(2311140126448, 'pipit', 1, 2, '2023-11-13 18:26:21'),
	(2311140244748, 'kiiii', 6, 2, '2023-11-13 19:45:01');

-- Dumping structure for table db_decafe.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `level` int DEFAULT NULL,
  `nohp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_decafe.tb_user: ~6 rows (approximately)
INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`, `nohp`, `alamat`) VALUES
	(2, 'srimutia', 'admin@admin.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '123456789011', ''),
	(3, 'Abc2', 'abc2@abc.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '123456789011', NULL),
	(4, 'Abc3', 'abc3@abc.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '123456789011', 'yuuu'),
	(5, 'markaz', 'virtual@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '98151551', 'gatau'),
	(6, 'kamu', 'dia@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '0982772', 'didepan'),
	(7, 'yyyy', 'eror@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '82928722', 'hmmm'),
	(21, 'aswiati', 'aswiati@aswiati.com', '5f4dcc3b5aa765d61d8327deb882cf99', 4, '', 'bsbcjBDJ');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
