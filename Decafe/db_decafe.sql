-- --------------------------------------------------------
-- Host:                         127.0.0.1
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

-- Dumping structure for table db_decafe.tb_daftar_menu
CREATE TABLE `tb_daftar_menu` (
  `id` int(11) NOT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `nama_menu` varchar(200) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `kategori` int(11) DEFAULT NULL,
  `harga` varchar(50) DEFAULT NULL,
  `stok` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_decafe.tb_daftar_menu: ~6 rows (approximately)
INSERT INTO `tb_daftar_menu` (`id`, `foto`, `nama_menu`, `keterangan`, `kategori`, `harga`, `stok`) VALUES
	(2, '1.png', 'Mie Aceh', 'Asli Aceh', 1, '20000', '50'),
	(3, '2.png', 'Burger', 'Keju dengan daging tambahan', 3, '10000', '51'),
	(4, '3.png', 'Kari Kambing', 'kambing dari gunung himalaya', 3, '5000', '77'),
	(5, '4.png', 'Kopi Sanger', 'kopi dari gayo', 2, '15000', '10'),
	(6, '5.png', 'Es Timun Serut', 'timun baru panen', 3, '7000', '15'),
	(8, '94287-12.png', 'jus mangga', 'mangga asam', 3, '2000', '4');

-- Dumping structure for table db_decafe.tb_kategori_menu
CREATE TABLE  `tb_kategori_menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis_menu` int DEFAULT NULL,
  `kategori_menu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_decafe.tb_kategori_menu: ~0 rows (approximately)
INSERT INTO `tb_kategori_menu` (`id`, `jenis_menu`, `kategori_menu`) VALUES
	(1, 1, 'Nasi'),
	(2, 1, 'Snack'),
	(3, 2, 'Jus'),
	(4, 2, 'Kopi');

-- Dumping structure for table db_decafe.tb_user
CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_decafe.tb_user: ~6 rows (approximately)
INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`, `nohp`, `alamat`) VALUES
	(2, 'Owner', 'admin@admin.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '123456789011', NULL),
	(3, 'Abc2', 'abc2@abc.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '123456789011', NULL),
	(4, 'Abc3', 'abc3@abc.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '123456789011', 'yuuu'),
	(5, 'markaz', 'virtual@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '98151551', 'gatau'),
	(6, 'kamu', 'dia@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '0982772', 'didepan'),
	(7, 'yyyy', 'eror@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '82928722', 'hmmm');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
