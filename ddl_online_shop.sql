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

-- membuang struktur untuk table lets_go.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id_user` int(11) DEFAULT NULL,
  `id_jd` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  KEY `FK_cart_jadwal` (`id_jd`),
  KEY `FK_cart_user` (`id_user`),
  CONSTRAINT `FK_cart_jadwal` FOREIGN KEY (`id_jd`) REFERENCES `jadwal` (`id_jd`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_cart_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel lets_go.cart: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

-- membuang struktur untuk table lets_go.detailtransaksi
CREATE TABLE IF NOT EXISTS `detailtransaksi` (
  `id_trans` int(11) DEFAULT NULL,
  `id_jd` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  KEY `FK_detailTransaksi_headtransaksi` (`id_trans`),
  KEY `FK_detailtransaksi_jadwal` (`id_jd`),
  CONSTRAINT `FK_detailTransaksi_headtransaksi` FOREIGN KEY (`id_trans`) REFERENCES `headtransaksi` (`id_trans`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_detailtransaksi_jadwal` FOREIGN KEY (`id_jd`) REFERENCES `jadwal` (`id_jd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel lets_go.detailtransaksi: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `detailtransaksi` DISABLE KEYS */;
INSERT INTO `detailtransaksi` (`id_trans`, `id_jd`, `price`, `qty`, `subtotal`) VALUES
	(16, 53, 90000, 2, 180000),
	(17, 73, 410000, 1, 410000),
	(18, 63, 330000, 3, 990000),
	(18, 62, 285000, 4, 1140000);
/*!40000 ALTER TABLE `detailtransaksi` ENABLE KEYS */;

-- membuang struktur untuk table lets_go.headtransaksi
CREATE TABLE IF NOT EXISTS `headtransaksi` (
  `id_trans` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(5) DEFAULT NULL,
  `grandtotal` int(11) DEFAULT NULL,
  `bukti` text,
  `status` enum('Pending','Proses','Complet') DEFAULT 'Pending',
  PRIMARY KEY (`id_trans`),
  KEY `FK_headtransaksi_user` (`id_user`),
  CONSTRAINT `FK_headtransaksi_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel lets_go.headtransaksi: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `headtransaksi` DISABLE KEYS */;
INSERT INTO `headtransaksi` (`id_trans`, `tanggal`, `id_user`, `grandtotal`, `bukti`, `status`) VALUES
	(16, '0000-00-00 00:00:00', 21, 180000, NULL, 'Complet'),
	(17, '2019-05-20 11:07:39', 20, 410000, '20052019145450edit.png', 'Complet'),
	(18, '2019-05-21 11:00:32', 16, 2130000, '21052019060104delete.png', 'Complet');
/*!40000 ALTER TABLE `headtransaksi` ENABLE KEYS */;

-- membuang struktur untuk table lets_go.iklan
CREATE TABLE IF NOT EXISTS `iklan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel lets_go.iklan: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `iklan` DISABLE KEYS */;
INSERT INTO `iklan` (`id`, `nama`, `deskripsi`, `img`) VALUES
	(2, 'Ciputra Water Park', '\r\nMemberikan fasilitas potongan harga/diskon kepada pelanggan lets_go (Persero) yang membeli tiket masuk wahana Ciputra Water Park, dengan syarat dan ketentuan sbb :\r\n\r\n    Diskon diberikan untuk pelanggan yang melakukan perjalanan kereta api.\r\n    Promo diskon 50% dari harga tiket masuk publish rate khusus untuk Weekdays (Selasa â€“ Jumâ€™at) dan diskon 30% dari harga tiket masuk publish rate khusus untuk Weekends (Sabtu)\r\n    Promo diskon ini tidak berlaku pada saat tanggal merah, libur panjang/long weekends, high seasons liburan sekolah, high seasons idul fitri, high season Natal dan Tahun Baru.\r\n    Promo diskon tidak dapat digabungkan dengan promo lain.\r\n    Masa berlaku promo sampai dengan tanggal 13 Juli 2019', '18052019191500promo-1.png'),
	(3, 'Boksa Bakso Madiun', '\r\n    Apabila pelanggan dapat menunjukkan riwayat pembelian tiket kereta api di lets_go maka akan mendapatkan diskon sebesar 10% untuk pembelian semua menu di Boksa Bakso\r\n    Tiket /boarding pass berlaku mulai hari keberangkatan yang tertera pada tiket sampai dengan 30 hari setelah keberangkatan.\r\n    Kerjasama ini berlaku sampai dengan 31 Desember 2019\r\n', '18052019190859promo-2.jpg');
/*!40000 ALTER TABLE `iklan` ENABLE KEYS */;

-- membuang struktur untuk table lets_go.jadwal
CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jd` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kr` varchar(255) DEFAULT NULL,
  `asal` int(11) DEFAULT NULL,
  `tujuan` int(11) DEFAULT NULL,
  `tgl_berangkat` datetime DEFAULT NULL,
  `tgl_tiba` datetime DEFAULT NULL,
  `kelas` enum('eksekutif','bisnis','ekonomi') DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `kursi` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_jd`),
  KEY `FK_jadwal_stasiun` (`asal`),
  KEY `FK_jadwal_stasiun_2` (`tujuan`),
  CONSTRAINT `FK_jadwal_stasiun` FOREIGN KEY (`asal`) REFERENCES `stasiun` (`id_st`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_jadwal_stasiun_2` FOREIGN KEY (`tujuan`) REFERENCES `stasiun` (`id_st`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel lets_go.jadwal: ~53 rows (lebih kurang)
/*!40000 ALTER TABLE `jadwal` DISABLE KEYS */;
INSERT INTO `jadwal` (`id_jd`, `nama_kr`, `asal`, `tujuan`, `tgl_berangkat`, `tgl_tiba`, `kelas`, `harga`, `kursi`) VALUES
	(53, 'Argo Parahyangan', 11, 12, '2019-05-30 05:05:00', '2019-05-30 08:39:00', 'ekonomi', 90000, 248),
	(54, 'Argo Parahyangan', 11, 12, '2019-05-29 07:00:00', '2019-05-29 11:07:00', 'eksekutif', 140000, 250),
	(55, 'Argo Parahyangan', 11, 12, '2019-05-28 20:00:06', '2019-05-28 23:14:32', 'ekonomi', 90000, 250),
	(56, 'Taksata', 11, 13, '2019-05-29 08:00:03', '2019-05-29 16:25:33', 'eksekutif', 260000, 250),
	(57, 'Argo Dwipangga', 11, 13, '2019-05-28 20:45:00', '2019-05-30 04:15:09', 'bisnis', 300000, 250),
	(58, 'Argro Bromo Anggrek', 11, 14, '2019-05-27 10:00:00', '2019-05-27 18:30:22', 'eksekutif', 375000, 250),
	(59, 'Sembari', 11, 14, '2019-05-28 19:15:00', '2019-05-29 05:43:00', 'eksekutif', 485000, 250),
	(60, 'Bima', 11, 15, '2019-05-27 16:30:00', '2019-05-28 08:15:00', 'eksekutif', 500000, 250),
	(61, 'Gajayana', 11, 15, '2019-05-29 17:00:00', '2019-05-30 09:01:27', 'eksekutif', 535000, 250),
	(62, 'Argo Sindoro', 11, 16, '2019-05-26 16:00:49', '2019-05-26 22:01:52', 'eksekutif', 285000, 246),
	(63, 'Bangunkarta', 11, 16, '2019-05-26 15:00:12', '2019-05-26 21:02:34', 'eksekutif', 330000, 247),
	(64, 'Argo Parahyangan', 12, 11, '2019-05-28 05:06:54', '2019-05-28 08:07:16', 'ekonomi', 80000, 250),
	(65, 'Argo Parahyangan', 12, 11, '2019-05-28 16:08:56', '2019-05-28 19:27:07', 'eksekutif', 135000, 250),
	(66, 'Mutiara Selatan', 12, 13, '2019-05-28 15:45:10', '2019-05-29 00:00:41', 'bisnis', 140000, 250),
	(67, 'Turangga', 12, 13, '2019-05-28 19:15:49', '2019-05-29 01:16:05', 'eksekutif', 280000, 250),
	(68, 'Mutiara Selatan', 12, 14, '2019-05-27 17:02:34', '2019-05-28 06:24:12', 'bisnis', 265000, 250),
	(69, 'Pasundan', 12, 14, '2019-05-27 05:35:41', '2019-05-27 21:42:05', 'ekonomi', 94000, 250),
	(70, 'Ciremai', 12, 16, '2019-05-27 06:15:30', '2019-05-27 13:45:18', 'bisnis', 180000, 250),
	(71, 'Harina', 12, 16, '2019-05-28 21:25:13', '2019-05-29 05:56:28', 'eksekutif', 150000, 250),
	(72, 'Jayabaya', 17, 15, '2019-05-28 00:45:38', '2019-05-29 02:42:15', 'ekonomi', 35000, 250),
	(73, 'Agro Bromo ANggrek', 14, 11, '2019-05-28 08:34:37', '2019-05-28 17:34:53', 'eksekutif', 410000, 249),
	(74, 'Sembrani', 14, 11, '2019-05-28 17:50:11', '2019-05-29 04:14:56', 'eksekutif', 450000, 250),
	(75, 'Ranggajati', 17, 13, '2019-05-28 09:14:58', '2019-05-28 14:31:27', 'eksekutif', 210000, 210),
	(76, 'Sancaka', 17, 13, '2019-05-28 17:25:34', '2019-05-28 21:46:39', 'ekonomi', 110000, 250),
	(77, 'Harina', 14, 12, '2019-05-28 16:30:56', '2019-05-29 04:11:13', 'eksekutif', 185000, 250),
	(78, 'Wijayakusuma', 17, 18, '2019-05-28 00:30:47', '2019-05-28 07:02:05', 'ekonomi', 155000, 250),
	(79, 'Probowangi', 17, 18, '2019-05-28 04:25:28', '2019-05-28 11:40:46', 'ekonomi', 100000, 250),
	(80, 'Lodaya', 13, 19, '2019-05-28 15:20:31', '2019-05-28 10:47:53', 'bisnis', 140000, 250),
	(81, 'Malioboro Ekspres', 13, 19, '2019-05-28 20:45:11', '2019-05-28 21:37:14', 'eksekutif', 135000, 250),
	(82, 'Argo Lawu	', 13, 11, '2019-05-28 08:57:11', '2019-05-28 15:42:49', 'eksekutif', 260000, 250),
	(83, 'Bima', 13, 11, '2019-05-28 22:05:45', '2019-05-29 05:43:55', 'eksekutif', 740000, 250),
	(84, 'Turangga', 13, 12, '2019-05-28 21:30:18', '2019-05-29 04:15:34', 'eksekutif', 380000, 250),
	(85, 'Malabar', 13, 12, '2019-05-28 23:30:19', '2019-05-29 07:48:31', 'bisnis', 190000, 250),
	(86, 'Gaya Baru Malam Selatan', 20, 17, '2019-05-28 19:30:06', '2019-05-29 01:35:18', 'ekonomi', 98000, 250),
	(87, 'Sri Tanjung', 20, 17, '2019-05-28 07:00:04', '2019-05-28 13:27:20', 'ekonomi', 88000, 250),
	(88, 'Malioboro Ekspres', 13, 15, '2019-05-28 07:45:23', '2019-05-28 15:43:44', 'eksekutif', 175000, 250),
	(89, 'Malabar', 13, 15, '2019-05-28 00:05:26', '2019-05-28 07:05:41', 'bisnis', 140000, 250),
	(90, 'Mutiara Selatan', 13, 15, '2019-05-28 01:38:00', '2019-05-28 09:38:00', 'eksekutif', 210000, 250),
	(91, 'Bangunkarta', 16, 11, '2019-05-28 22:39:08', '2019-05-29 04:51:19', 'eksekutif', 355000, 250),
	(92, 'Argo Muria', 16, 11, '2019-05-28 16:00:05', '2019-05-28 22:08:15', 'eksekutif', 265000, 250),
	(93, 'Brantas', 16, 21, '2019-05-28 00:45:36', '2019-05-29 04:47:45', 'ekonomi', 80000, 250),
	(94, 'Matarmaja	', 16, 21, '2019-05-28 22:32:27', '2019-05-29 00:44:37', 'ekonomi', 103000, 250),
	(95, 'Kertajaya', 16, 14, '2019-05-28 21:08:26', '2019-05-29 01:40:39', 'ekonomi', 135000, 250),
	(96, 'Maharani', 16, 14, '2019-05-28 11:39:29', '2019-05-28 16:27:42', 'ekonomi', 49000, 250),
	(97, 'Ciremai', 16, 12, '2019-05-28 17:35:14', '2019-05-29 01:11:25', 'bisnis', 180000, 250),
	(98, 'Harina', 16, 12, '2019-05-28 20:47:09', '2019-05-19 04:11:19', 'eksekutif', 295000, 250),
	(99, 'Kamandaka', 23, 22, '2019-05-28 05:11:33', '2019-05-28 07:33:47', 'ekonomi', 60000, 250),
	(100, 'Majapahit', 15, 24, '2019-05-28 18:37:07', '2019-05-29 10:08:17', 'ekonomi', 220000, 250),
	(101, 'Malabar', 15, 13, '2019-05-28 16:00:20', '2019-05-28 23:23:28', 'eksekutif', 140000, 250),
	(102, 'Gajayana', 15, 13, '2019-05-28 13:30:45', '2019-05-28 20:22:56', 'eksekutif', 3500000, 250),
	(103, 'Malabar', 25, 26, '2019-05-28 16:00:06', '2019-05-29 07:34:15', 'bisnis', 185000, 250),
	(104, 'Mutiara Selatan', 25, 26, '2019-05-28 16:30:55', '2019-05-29 08:21:07', 'bisnis', 275000, 250),
	(106, 'Tawang Alun	', 15, 18, '2019-05-28 16:05:20', '2019-05-28 23:50:31', 'ekonomi', 62000, 250);
/*!40000 ALTER TABLE `jadwal` ENABLE KEYS */;

-- membuang struktur untuk table lets_go.penumpang
CREATE TABLE IF NOT EXISTS `penumpang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_trans` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `no_identitas` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_penumpang_headtransaksi` (`id_trans`),
  CONSTRAINT `FK_penumpang_headtransaksi` FOREIGN KEY (`id_trans`) REFERENCES `headtransaksi` (`id_trans`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel lets_go.penumpang: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `penumpang` DISABLE KEYS */;
INSERT INTO `penumpang` (`id`, `id_trans`, `nama`, `no_identitas`) VALUES
	(38, 16, 'tri ardiansyah', '1831710143'),
	(39, 16, 'yuki m.', '1831710093'),
	(40, 17, 'gopla yudhistira', '1831710093'),
	(41, 18, 'yuki kato', '12012000'),
	(42, 18, 'shephul', '11012000'),
	(43, 18, 'salmaaa', '20022000');
/*!40000 ALTER TABLE `penumpang` ENABLE KEYS */;

-- membuang struktur untuk table lets_go.stasiun
CREATE TABLE IF NOT EXISTS `stasiun` (
  `id_st` int(11) NOT NULL AUTO_INCREMENT,
  `stasiun` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_st`),
  KEY `stasiun` (`stasiun`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel lets_go.stasiun: ~16 rows (lebih kurang)
/*!40000 ALTER TABLE `stasiun` DISABLE KEYS */;
INSERT INTO `stasiun` (`id_st`, `stasiun`) VALUES
	(12, 'Bandung'),
	(26, 'Bandung Kiaracondong'),
	(18, 'Banyuwangi Baru'),
	(11, 'Gambir'),
	(20, 'Lempuyangan'),
	(15, 'Malang'),
	(25, 'Malang Kotabaru'),
	(24, 'Pasar Senen'),
	(14, 'Pasar Turi'),
	(23, 'Semarang Poncol'),
	(16, 'Semarang Tawang'),
	(19, 'Solo Balapan'),
	(21, 'Solo Jebres'),
	(17, 'Surabaya Gubeng'),
	(22, 'Tegal'),
	(13, 'Yogyakarta');
/*!40000 ALTER TABLE `stasiun` ENABLE KEYS */;

-- membuang struktur untuk table lets_go.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `gender` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `kontak` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `pass` varchar(35) DEFAULT NULL,
  `level` enum('user','admin') DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel lets_go.user: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `full_name`, `username`, `gender`, `kontak`, `email`, `pass`, `level`) VALUES
	(16, 'yuki kato', 'yuki', 'Perempuan', '764387463', 'yuki@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
	(18, 'Naufal Yudhistira', 'Gopla', 'Laki-Laki', '086325223575', 'gopla@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
	(19, 'Tommy Sugiarto', 'tommy', 'Laki-Laki', '089523461253', 'tommy@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
	(20, 'wisnu syaputra', 'wisnu', 'Laki-Laki', '085213531286', 'wisnu12@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
	(21, 'Tri Ardiansyah', 'tria', 'Laki-Laki', '087523436532', 'tria@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
	(22, 'hakam assidiq', 'hakam', 'Laki-Laki', '089263523176', 'hakam@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 'admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
