-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_sicukar
CREATE DATABASE IF NOT EXISTS `db_sicukar` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_sicukar`;

-- Dumping structure for table db_sicukar.mst_user
CREATE TABLE IF NOT EXISTS `mst_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) DEFAULT NULL,
  `psw` varchar(20) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `waktu` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sicukar.mst_user: ~2 rows (approximately)
/*!40000 ALTER TABLE `mst_user` DISABLE KEYS */;
REPLACE INTO `mst_user` (`id`, `user`, `psw`, `nik`, `nama`, `level`, `waktu`) VALUES
	(6, 'agus@gmail.com', '12345', '7022', 'Agus Salim', 'admin', '2020-04-26 14:56:45'),
	(9, 'john@gmail.com', '12345', '7022', 'John Saputra Nugroho', 'karyawan', '2020-04-26 16:42:19');
/*!40000 ALTER TABLE `mst_user` ENABLE KEYS */;

-- Dumping structure for table db_sicukar.tbl_cuti
CREATE TABLE IF NOT EXISTS `tbl_cuti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL DEFAULT '0',
  `nik` varchar(50) NOT NULL DEFAULT '0',
  `nama` varchar(50) NOT NULL DEFAULT '0',
  `tgl_cuti` date DEFAULT NULL,
  `jenis_cuti` varchar(50) NOT NULL DEFAULT '0',
  `jumlah_cuti` varchar(50) NOT NULL DEFAULT '0',
  `keperluan` varchar(100) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL DEFAULT '0',
  `tgl_masuk` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sicukar.tbl_cuti: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_cuti` DISABLE KEYS */;
REPLACE INTO `tbl_cuti` (`id`, `user`, `nik`, `nama`, `tgl_cuti`, `jenis_cuti`, `jumlah_cuti`, `keperluan`, `status`, `tgl_masuk`) VALUES
	(17, 'john@gmail.com', '7022', 'John Saputra Nugroho', '2020-04-27', 'Cuti Tahunan', '1 Hari', 'Menengok sahabat di rumah sakit', 'Approved', '2020-04-28'),
	(18, 'john@gmail.com', '7022', 'John Saputra Nugroho', '2020-06-30', 'Cuti Tahunan', '1 Hari', 'Berlibur', 'Reject', '2020-07-01');
/*!40000 ALTER TABLE `tbl_cuti` ENABLE KEYS */;

-- Dumping structure for table db_sicukar.tbl_departement
CREATE TABLE IF NOT EXISTS `tbl_departement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sicukar.tbl_departement: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_departement` DISABLE KEYS */;
REPLACE INTO `tbl_departement` (`id`, `dept`) VALUES
	(1, 'IT'),
	(2, 'MARKETING'),
	(4, 'PPIC'),
	(8, 'PRODUKSI');
/*!40000 ALTER TABLE `tbl_departement` ENABLE KEYS */;

-- Dumping structure for table db_sicukar.tbl_jabatan
CREATE TABLE IF NOT EXISTS `tbl_jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sicukar.tbl_jabatan: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_jabatan` DISABLE KEYS */;
REPLACE INTO `tbl_jabatan` (`id`, `jabatan`) VALUES
	(1, 'Operator'),
	(2, 'Supervisor'),
	(9, 'Manager');
/*!40000 ALTER TABLE `tbl_jabatan` ENABLE KEYS */;

-- Dumping structure for table db_sicukar.tbl_jenis_cuti
CREATE TABLE IF NOT EXISTS `tbl_jenis_cuti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sicukar.tbl_jenis_cuti: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_jenis_cuti` DISABLE KEYS */;
REPLACE INTO `tbl_jenis_cuti` (`id`, `jenis`) VALUES
	(2, 'Cuti Tahunan'),
	(8, 'Cuti Khusus');
/*!40000 ALTER TABLE `tbl_jenis_cuti` ENABLE KEYS */;

-- Dumping structure for table db_sicukar.tbl_karyawan
CREATE TABLE IF NOT EXISTS `tbl_karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `masuk_kerja` date DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `departement` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `sisa_cuti` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sicukar.tbl_karyawan: ~6 rows (approximately)
/*!40000 ALTER TABLE `tbl_karyawan` DISABLE KEYS */;
REPLACE INTO `tbl_karyawan` (`id`, `nik`, `nama`, `masuk_kerja`, `jenis_kelamin`, `email`, `jabatan`, `departement`, `alamat`, `telp`, `sisa_cuti`) VALUES
	(4, '7022', 'John Saputra Nugroho', '2020-01-02', 'laki-laki', 'john@gmail.com', 'Operator', 'IT', 'Jl. Pramuka 48 Surabaya', '08134567890', 12),
	(5, '7023', 'Agus Salim', '2020-01-02', 'laki-laki', 'agus@gmail.com', 'Supervisor', 'IT', 'Jl. Ranu Grati 5', '08776245369', 12),
	(6, '1254', 'Rahmad Verdianto', '2020-01-02', 'laki-laki', 'rahmad@gmail.com', 'Manager', 'IT', 'Jl. Teluk Mindanau 67B', '08987524379', 12),
	(7, '3467', 'Arthur Julio Risa', '2020-01-02', 'laki-laki', 'arthur@gmail.com', 'Manager', 'IT', 'Desa Kemungkur Talangan RT. 03 Rw. 12', '08134567890', 12),
	(8, '4589', 'Bintang Anugrah Pratama', '2020-01-02', 'laki-laki', 'bintang@gmail.com', 'Operator', 'IT', 'Jl. Agung Subroto 67', '085334264224', 12),
	(9, '1267', 'Selvi Ananda Putri', '2020-01-02', 'wanita', 'putri@gmail.com', 'Operator', 'IT', 'Ruko Plaza 45 Surabaya', '081356132490', 12);
/*!40000 ALTER TABLE `tbl_karyawan` ENABLE KEYS */;

-- Dumping structure for table db_sicukar.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_sicukar.user: ~0 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
