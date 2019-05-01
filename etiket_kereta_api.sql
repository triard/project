-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.1.37-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win32
-- HeidiSQL Versi:               10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- membuang struktur untuk table lets_go.jadwal
CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jd` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kr` varchar(255) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `tgl_berangkat` datetime NOT NULL,
  `tgl_tiba` datetime NOT NULL,
  `kelas` enum('eksekutif','bisnis','ekonomi') NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('ADA','HABIS') NOT NULL,
  PRIMARY KEY (`id_jd`),
  KEY `FK_jadwal_stasiun` (`asal`),
  KEY `FK_jadwal_stasiun_2` (`tujuan`),
  CONSTRAINT `FK_jadwal_stasiun` FOREIGN KEY (`asal`) REFERENCES `stasiun` (`stasiun`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_jadwal_stasiun_2` FOREIGN KEY (`tujuan`) REFERENCES `stasiun` (`stasiun`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel lets_go.jadwal: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `jadwal` DISABLE KEYS */;
INSERT INTO `jadwal` (`id_jd`, `nama_kr`, `asal`, `tujuan`, `tgl_berangkat`, `tgl_tiba`, `kelas`, `harga`, `status`) VALUES
	(30, 'ardika', 'bojonegoro', 'pasar senin', '2019-05-02 01:20:00', '2019-04-30 18:20:00', 'eksekutif', 200, ''),
	(32, 'sicepat', 'bojonegoro', 'pasar senin', '2019-04-29 18:38:00', '2019-04-30 09:42:00', 'eksekutif', 0, ''),
	(33, 'sdhsadha', 'bojonegoro', 'pasar senin', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'bisnis', 0, 'ADA'),
	(34, 'saafa', 'bojonegoro', 'pasar senin', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'eksekutif', 0, ''),
	(38, 'penataran', 'bojonegoro', 'malang baru', '2019-04-30 11:09:00', '2019-04-30 22:09:00', 'bisnis', 699, 'ADA'),
	(39, 'djoefk', 'malang baru', 'malang baru', '2019-04-30 09:56:00', '2019-04-30 09:03:00', 'eksekutif', 4, 'HABIS');
/*!40000 ALTER TABLE `jadwal` ENABLE KEYS */;

-- membuang struktur untuk table lets_go.penumpang
CREATE TABLE IF NOT EXISTS `penumpang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `no_identitas` varchar(50) NOT NULL,
  `gender` enum('Laki-Laki','Perempuan') NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel lets_go.penumpang: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `penumpang` DISABLE KEYS */;
/*!40000 ALTER TABLE `penumpang` ENABLE KEYS */;

-- membuang struktur untuk table lets_go.stasiun
CREATE TABLE IF NOT EXISTS `stasiun` (
  `id_st` int(11) NOT NULL AUTO_INCREMENT,
  `stasiun` varchar(255) NOT NULL,
  PRIMARY KEY (`id_st`),
  KEY `stasiun` (`stasiun`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel lets_go.stasiun: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `stasiun` DISABLE KEYS */;
INSERT INTO `stasiun` (`id_st`, `stasiun`) VALUES
	(4, 'bojonegoro'),
	(6, 'jember'),
	(7, 'malang baru'),
	(2, 'pasar senin');
/*!40000 ALTER TABLE `stasiun` ENABLE KEYS */;

-- membuang struktur untuk table lets_go.tiket
CREATE TABLE IF NOT EXISTS `tiket` (
  `id_tiket` int(11) NOT NULL AUTO_INCREMENT,
  `id_penumpang` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  PRIMARY KEY (`id_tiket`),
  KEY `FK_tiket_penumpang` (`id_penumpang`),
  KEY `FK_tiket_jadwal` (`id_jadwal`),
  CONSTRAINT `FK_tiket_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jd`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tiket_penumpang` FOREIGN KEY (`id_penumpang`) REFERENCES `penumpang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel lets_go.tiket: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `tiket` DISABLE KEYS */;
/*!40000 ALTER TABLE `tiket` ENABLE KEYS */;

-- membuang struktur untuk table lets_go.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `id_penumpang` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_transaksi_penumpang` (`id_penumpang`),
  CONSTRAINT `FK_transaksi_penumpang` FOREIGN KEY (`id_penumpang`) REFERENCES `penumpang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel lets_go.transaksi: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;

-- membuang struktur untuk table lets_go.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `gender` enum('Laki-Laki','Perempuan') NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pass` varchar(35) NOT NULL,
  `level` enum('admin','user') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel lets_go.user: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `full_name`, `username`, `gender`, `kontak`, `email`, `pass`, `level`) VALUES
	(13, 'busdnadsndnd', 'uchdncfrefedef', 'Laki-Laki', '843985958', 'gopla@gmail.com', 'goblok', 'user');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
