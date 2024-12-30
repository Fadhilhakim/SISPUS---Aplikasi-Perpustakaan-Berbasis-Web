CREATE DATABASE IF NOT EXISTS `db_perpustakaan` /*!40100 DEFAULT CHARACTER SET armscii8 COLLATE armscii8_bin */;
USE `db_perpustakaan`;

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE armscii8_bin NOT NULL,
  `password` varchar(255) COLLATE armscii8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT IGNORE INTO `admins` (`id`, `username`, `password`, `created_at`) VALUES
	(7, 'admin', '$2y$10$3tD4k23xecO1VdNm9eyE4OoNh7.A.IUyh.xnw7D1us8VRzhp.IVK6', '2024-12-20 23:13:35'),
	(8, 'Fadhil Hakim', '$2y$10$nGZ2hYap3TKiQ8JBLJ2.8O2OTuqZm7xYA78w.eUbD1FSTVWAG1cp6', '2024-12-24 02:15:34'),
	(9, 'testing', '$2y$10$.k1KTHKQhwvyDAF3bBke2Oq1Q27OcATDO3O1tRh1KoJ01O6wglmA6', '2024-12-24 02:19:24');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `agama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(2) COLLATE armscii8_bin NOT NULL,
  `nama` varchar(100) COLLATE armscii8_bin NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `kode` (`kode`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

/*!40000 ALTER TABLE `agama` DISABLE KEYS */;
INSERT IGNORE INTO `agama` (`id`, `kode`, `nama`) VALUES
	(1, 'IS', 'Islam'),
	(2, 'KP', 'Kristen Protestan'),
	(3, 'KK', 'Kristen Katolik'),
	(4, 'HD', 'Hindu'),
	(5, 'BD', 'Buddha'),
	(6, 'KH', 'Konghucu'),
	(7, 'KT', 'Kepercayaan terhadap Tuhan Yang Maha Esa'),
	(8, 'AL', 'Agama Lainnya');
/*!40000 ALTER TABLE `agama` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `program_studi` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `kode_jurusan` varchar(4) COLLATE armscii8_bin NOT NULL,
  `nama` varchar(100) COLLATE armscii8_bin NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `kode_jurusan` (`kode_jurusan`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

/*!40000 ALTER TABLE `program_studi` DISABLE KEYS */;
INSERT IGNORE INTO `program_studi` (`id`, `kode_jurusan`, `nama`) VALUES
	(1, 'SI', 'Sistem Informasi'),
	(2, 'TI', 'Teknik Informatika'),
	(3, 'MI', 'Manajemen Informatika'),
	(4, 'RPL', 'Rekayasa Perangkat Lunak'),
	(5, 'BD', 'Bisnis Digital'),
	(6, 'KW', 'Kewirausahaan');
/*!40000 ALTER TABLE `program_studi` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `propinsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) COLLATE armscii8_bin NOT NULL,
  `nama` varchar(100) COLLATE armscii8_bin NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `kode` (`kode`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

/*!40000 ALTER TABLE `propinsi` DISABLE KEYS */;
INSERT IGNORE INTO `propinsi` (`id`, `kode`, `nama`) VALUES
	(1, 'ACEH', 'Aceh'),
	(2, 'SUMUT', 'Sumatera Utara'),
	(3, 'SUMBAR', 'Sumatera Barat'),
	(4, 'RIAU', 'Riau'),
	(5, 'JAMBI', 'Jambi'),
	(6, 'SUMSEL', 'Sumatera Selatan'),
	(7, 'BENGKULU', 'Bengkulu'),
	(8, 'LAMPUNG', 'Lampung'),
	(9, 'DKI', 'Jakarta'),
	(10, 'JABAR', 'Jawa Barat'),
	(11, 'JATENG', 'Jawa Tengah'),
	(12, 'JATIM', 'Jawa Timur'),
	(13, 'DIY', 'Yogyakarta'),
	(14, 'BALI', 'Bali'),
	(15, 'NTB', 'Nusa Tenggara Barat'),
	(16, 'NTT', 'Nusa Tenggara Timur'),
	(17, 'KALTARA', 'Kalimantan Utara'),
	(18, 'KALBAR', 'Kalimantan Barat'),
	(19, 'KALSEL', 'Kalimantan Selatan'),
	(20, 'KALTENG', 'Kalimantan Tengah'),
	(21, 'SULUT', 'Sulawesi Utara'),
	(22, 'SULTENG', 'Sulawesi Tengah'),
	(23, 'SULSEL', 'Sulawesi Selatan'),
	(24, 'SULTRA', 'Sulawesi Tenggara'),
	(25, 'GORONTALO', 'Gorontalo'),
	(26, 'MALUKU', 'Maluku'),
	(27, 'MALUT', 'Maluku Utara'),
	(28, 'PAPUA', 'Papua'),
	(29, 'PAPBAR', 'Papua Barat');
/*!40000 ALTER TABLE `propinsi` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `kategori_buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) COLLATE armscii8_bin NOT NULL,
  `nama` varchar(100) COLLATE armscii8_bin NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `kode` (`kode`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

/*!40000 ALTER TABLE `kategori_buku` DISABLE KEYS */;
INSERT IGNORE INTO `kategori_buku` (`id`, `kode`, `nama`) VALUES
	(1, 'K001', 'Fiksi'),
	(2, 'K002', 'Non-Fiksi'),
	(3, 'K003', 'Sains'),
	(4, 'K004', 'Sejarah'),
	(5, 'K005', 'Komik'),
	(6, 'K006', 'Literatur'),
	(7, 'K007', 'Pendidikan'),
	(8, 'K008', 'Teknologi'),
	(9, 'K009', 'Bisnis'),
	(10, 'K010', 'Filosofi');
/*!40000 ALTER TABLE `kategori_buku` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `biodata_mahasiswa` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nim` varchar(20) COLLATE armscii8_bin DEFAULT NULL,
  `nama` varchar(100) COLLATE armscii8_bin DEFAULT NULL,
  `kode_program_studi` varchar(4) COLLATE armscii8_bin DEFAULT 'TI',
  `kode_agama` varchar(2) COLLATE armscii8_bin DEFAULT 'IS',
  `tempat_lahir` varchar(100) COLLATE armscii8_bin DEFAULT '-',
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') COLLATE armscii8_bin DEFAULT 'L',
  `alamat` varchar(100) COLLATE armscii8_bin DEFAULT 'MAKASSAR',
  `kota` varchar(100) COLLATE armscii8_bin DEFAULT 'MAKASSAR',
  `kode_propinsi` varchar(10) COLLATE armscii8_bin DEFAULT 'SULSEL',
  `kode_pos` varchar(50) COLLATE armscii8_bin DEFAULT '0000',
  `telpon` varchar(40) COLLATE armscii8_bin DEFAULT '0',
  `handphone` varchar(40) COLLATE armscii8_bin DEFAULT '-',
  `hobi` varchar(100) COLLATE armscii8_bin DEFAULT '-',
  `wali` varchar(100) COLLATE armscii8_bin DEFAULT '-',
  `alamat_wali` varchar(100) COLLATE armscii8_bin DEFAULT '-',
  `telpon_wali` varchar(100) COLLATE armscii8_bin DEFAULT '-',
  `tahun_masuk` varchar(4) COLLATE armscii8_bin DEFAULT '0000',
  `last_update` datetime DEFAULT CURRENT_TIMESTAMP,
  `userid` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `nim` (`nim`) USING BTREE,
  KEY `kode_propinsi` (`kode_propinsi`) USING BTREE,
  KEY `kode_agama` (`kode_agama`) USING BTREE,
  KEY `kode_program_studi` (`kode_program_studi`) USING BTREE,
  CONSTRAINT `FK_biodata_mahasiswa_agama` FOREIGN KEY (`kode_agama`) REFERENCES `agama` (`kode`),
  CONSTRAINT `FK_biodata_mahasiswa_program_studi` FOREIGN KEY (`kode_program_studi`) REFERENCES `program_studi` (`kode_jurusan`),
  CONSTRAINT `FK_biodata_mahasiswa_propinsi` FOREIGN KEY (`kode_propinsi`) REFERENCES `propinsi` (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

/*!40000 ALTER TABLE `biodata_mahasiswa` DISABLE KEYS */;
INSERT IGNORE INTO `biodata_mahasiswa` (`id`, `nim`, `nama`, `kode_program_studi`, `kode_agama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `kota`, `kode_propinsi`, `kode_pos`, `telpon`, `handphone`, `hobi`, `wali`, `alamat_wali`, `telpon_wali`, `tahun_masuk`, `last_update`, `userid`) VALUES
	(4, '2023001', 'Andi Saputra Saja', 'TI', 'IS', 'Makassar', '2001-01-15', 'L', 'Jl. Raya No. 1', 'Makassar', 'SULSEL', '90222', '0411-123456', '08123456789', 'Berenang', 'Bapak Saputra', 'Jl. Wali No. 2', '0411-987654', '2024', '2024-12-17 14:07:52', 'admin'),
	(5, '2023002', 'Siti Aminah', 'MI', 'IS', 'Makassar', '2002-02-20', 'P', 'Jl. Kebangsaan No. 3', 'Makassar', 'SULSEL', '90223', '0411-654321', '08234567890', 'Membaca', 'Ibu Aminah', 'Jl. Wali No. 4', '0411-123456', '2023', '2024-12-17 14:07:52', 'admin'),
	(6, '2023003', 'Budi Santoso', 'RPL', 'KP', 'Makassar', '2001-03-10', 'L', 'Jl. Merdeka No. 5', 'Makassar', 'SULSEL', '90224', '0411-789012', '08345678901', 'Bermain Game', 'Bapak Santoso', 'Jl. Wali No. 6', '0411-654321', '2023', '2024-12-17 14:07:52', 'budi.s'),
	(7, '2023004', 'Dewi Lestari', 'MI', 'IS', 'Makassar', '2000-04-25', 'P', 'Jl. Cinta No. 7', 'Makassar', 'SULSEL', '90225', '0411-345678', '08456789012', 'Menari', 'Ibu Lestari', 'Jl. Wali No. 8', '0411-789012', '2023', '2024-12-17 14:07:52', 'dewi.l'),
	(8, '2023005', 'Rudi Hartono', 'BD', 'IS', 'Makassar', '2001-05-30', 'L', 'Jl. Sejahtera No. 9', 'Makassar', 'SULSEL', '90226', '0411-456789', '08567890123', 'Olahraga', 'Bapak Hartono', 'Jl. Wali No. 10', '0411-345678', '2023', '2024-12-17 14:07:52', 'rudi.h'),
	(9, '2023006', 'Nina Sari', 'KW', 'KK', 'Makassar', '2002-06-15', 'P', 'Jl. Bahagia No. 11', 'Makassar', 'SULSEL', '90227', '0411-567890', '08678901234', 'Memasak', 'Ibu Sari', 'Jl. Wali No. 12', '0411-456789', '2023', '2024-12-17 14:07:52', 'nina.s'),
	(10, '2023007', 'Fajar Pratama', 'TI', 'IS', 'Makassar', '2001-07-05', 'L', 'Jl. Anggrek No. 13', 'Makassar', 'SULSEL', '90228', '0411-123456', '08123456780', 'Bersepeda', 'Bapak Pratama', 'Jl. Wali No. 14', '0411-987655', '2023', '2024-12-17 14:09:31', 'fajar.p'),
	(11, '2023008', 'Lina Sari', 'MI', 'IS', 'Makassar', '2002-08-12', 'P', 'Jl. Melati No. 15', 'Makassar', 'SULSEL', '90229', '0411-654321', '08234567891', 'Menulis', 'Ibu Sari', 'Jl. Wali No. 16', '0411-123457', '2023', '2024-12-17 14:09:31', 'lina.s'),
	(12, '2023009', 'Rizky Aditya', 'RPL', 'KP', 'Makassar', '2001-09-20', 'L', 'Jl. Kenanga No. 17', 'Makassar', 'SULSEL', '90230', '0411-789012', '08345678902', 'Fotografi', 'Bapak Aditya', 'Jl. Wali No. 18', '0411-654322', '2023', '2024-12-17 14:09:31', 'rizky.a'),
	(13, '2023010', 'Sari Indah', 'BD', 'IS', 'Makassar', '2000-10-30', 'P', 'Jl. Cendana No. 19', 'Makassar', 'SULSEL', '90231', '0411-345678', '08456789013', 'Menggambar', 'Ibu Indah', 'Jl. Wali No. 20', '0411-789013', '2023', '2024-12-17 14:09:31', 'sari.i'),
	(14, '2023011', 'Dani Kurniawan', 'KW', 'KK', 'Makassar', '2002-11-15', 'L', 'Jl. Flamboyan No. 21', 'Makassar', 'SULSEL', '90232', '0411-456789', '08567890124', 'Bermain Musik', 'Bapak Kurniawan', 'Jl. Wali No. 22', '0411-345679', '2023', '2024-12-17 14:09:31', 'dani.k'),
	(15, '2023012', 'Tina Melati', 'SI', 'IS', 'Makassar', '2001-12-25', 'P', 'Jl. Mawar No. 23', 'Makassar', 'SULSEL', '90233', '0411-567890', '08678901235', 'Yoga', 'Ibu Melati', 'Jl. Wali No. 24', '0411-456790', '2023', '2024-12-17 14:09:31', 'tina.m'),
	(16, '2023013', 'Ayu Lestari', 'TI', 'IS', 'Makassar', '2002-01-10', 'P', 'Jl. Bunga No. 25', 'Makassar', 'SULSEL', '90234', '0411-678901', '08789012346', 'Berkebun', 'Ibu Lestari', 'Jl. Wali No. 26', '0411-567891', '2023', '2024-12-17 14:10:53', 'ayu.l'),
	(17, '2023014', 'Fahmi Rizal', 'RPL', 'KP', 'Makassar', '2001-02-14', 'L', 'Jl. Cempaka No. 27', 'Makassar', 'SULSEL', '90235', '0411-789123', '08890123457', 'Bermain Sepak Bola', 'Bapak Rizal', 'Jl. Wali No. 28', '0411-678902', '2023', '2024-12-17 14:10:53', 'fahmi.r'),
	(18, '2023015', 'Nadia Putri', 'MI', 'IS', 'Makassar', '2000-03-18', 'P', 'Jl. Angsana No. 29', 'Makassar', 'SULSEL', '90236', '0411-890234', '08901234568', 'Menari', 'Ibu Putri', 'Jl. Wali No. 30', '0411-789123', '2023', '2024-12-17 14:10:53', 'nadia.p'),
	(19, '2023016', 'Rian Saputra', 'BD', 'IS', 'Makassar', '2002-04-22', 'L', 'Jl. Jati No. 31', 'Makassar', 'SULSEL', '90237', '0411-901345', '09012345679', 'Bermain Game', 'Bapak Saputra', 'Jl. Wali No. 32', '0411-890234', '2023', '2024-12-17 14:10:53', 'rian.s'),
	(20, '2023017', 'Siti Nurhaliza', 'KW', 'KK', 'Makassar', '2001-05-26', 'P', 'Jl. Kamboja No. 33', 'Makassar', 'SULSEL', '90238', '0411-012456', '09123456780', 'Mendengarkan Musik', 'Ibu Nurhaliza', 'Jl. Wali No. 34', '0411-901345', '2023', '2024-12-17 14:10:53', 'siti.n'),
	(21, '2023018', 'Dimas Prabowo', 'SI', 'IS', 'Makassar', '2000-06-30', 'L', 'Jl. Palem No. 35', 'Makassar', 'SULSEL', '90239', '0411-123567', '09234567891', 'Bersepeda', 'Bapak Prabowo', 'Jl. Wali No. 36', '0411-012456', '2023', '2024-12-17 14:10:53', 'dimas.p'),
	(22, '2023019', 'Rina Amelia', 'TI', 'IS', 'Makassar', '2002-07-05', 'P', 'Jl. Srikaya No. 37', 'Makassar', 'SULSEL', '90240', '0411-234678', '09345678902', 'Berkebun', 'Ibu Amelia', 'Jl. Wali No. 38', '0411-123678', '2023', '2024-12-17 14:15:50', 'rina.a'),
	(23, '2023020', 'Agus Setiawan', 'RPL', 'KP', 'Makassar', '2001-08-10', 'L', 'Jl. Durian No. 39', 'Makassar', 'SULSEL', '90241', '0411-345789', '09456789013', 'Bermain Musik', 'Bapak Setiawan', 'Jl. Wali No. 40', '0411-234789', '2023', '2024-12-17 14:15:50', 'agus.s'),
	(34, '0000001', 'tset', 'KW', 'HD', 'Gowa', '2001-02-23', 'P', 'Bontonompo selatan', 'KABUPATEN GOWA', 'SULSEL', '92161', '081342952931', '081342952931', 'makan', 'test', 'Bontonompo selatan', '081342952931', '2019', '2024-12-22 15:01:18', 'admin'),
	(35, '2020200', 'Fadhil Hakim', 'TI', 'IS', 'Gowa', '2006-07-31', 'L', 'Bontonompo selatan', 'KABUPATEN GOWA', 'SULSEL', '92161', '081342952931', '081342952931', 'makan', 'Aku', 'Bontonompo selatan', '081342952931', '2023', '2024-12-22 15:02:28', 'admin');
/*!40000 ALTER TABLE `biodata_mahasiswa` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `anggota_perpustakaan` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(12) COLLATE armscii8_bin NOT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `last_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` varchar(20) COLLATE armscii8_bin DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `nomor` (`nomor`) USING BTREE,
  CONSTRAINT `FK_anggota_perpustakaan_biodata_mahasiswa` FOREIGN KEY (`nomor`) REFERENCES `biodata_mahasiswa` (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

/*!40000 ALTER TABLE `anggota_perpustakaan` DISABLE KEYS */;
INSERT IGNORE INTO `anggota_perpustakaan` (`id`, `nomor`, `tanggal_masuk`, `last_update`, `userid`) VALUES
	(6, '2023016', '2024-12-22', '2024-12-23 00:12:18', 'admin'),
	(9, '2023019', '2024-12-22', '2024-12-23 00:13:16', 'admin'),
	(11, '2020200', '2024-12-22', '2024-12-23 00:16:57', 'admin'),
	(12, '0000001', '2024-12-22', '2024-12-23 00:17:11', 'admin'),
	(13, '2023005', '2024-12-22', '2024-12-23 00:17:16', 'admin'),
	(14, '2023002', '2024-12-22', '2024-12-23 00:17:20', 'admin'),
	(15, '2023001', '2024-12-22', '2024-12-23 00:17:28', 'admin'),
	(16, '2023003', '2024-12-22', '2024-12-23 00:17:33', 'admin'),
	(17, '2023017', '2024-12-22', '2024-12-23 00:43:13', 'admin');
/*!40000 ALTER TABLE `anggota_perpustakaan` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `buku` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) COLLATE armscii8_bin NOT NULL,
  `kode_kategori` varchar(10) COLLATE armscii8_bin DEFAULT 'K001',
  `judul` varchar(200) COLLATE armscii8_bin NOT NULL,
  `jumlah` int(11) NOT NULL,
  `stock` int(100) NOT NULL,
  `pengarang` varchar(100) COLLATE armscii8_bin NOT NULL,
  `penerbit` varchar(100) COLLATE armscii8_bin NOT NULL,
  `tahun_terbit` varchar(4) COLLATE armscii8_bin NOT NULL,
  `tahun_pengadaaan` varchar(4) COLLATE armscii8_bin NOT NULL,
  `sumber` varchar(100) COLLATE armscii8_bin NOT NULL,
  `rak` varchar(20) COLLATE armscii8_bin NOT NULL,
  `ISBN` varchar(50) COLLATE armscii8_bin NOT NULL,
  `foto_buku` varchar(255) COLLATE armscii8_bin DEFAULT 'https://png.pngtree.com/png-clipart/20200826/original/pngtree-matte-book-mockup-psd-png-image_5479091.jpg',
  `last_update` datetime DEFAULT CURRENT_TIMESTAMP,
  `userid` varchar(20) COLLATE armscii8_bin DEFAULT 'admin',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `kode` (`kode`) USING BTREE,
  KEY `kode_kategori` (`kode_kategori`) USING BTREE,
  CONSTRAINT `FK_buku_kategori_buku` FOREIGN KEY (`kode_kategori`) REFERENCES `kategori_buku` (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

/*!40000 ALTER TABLE `buku` DISABLE KEYS */;
INSERT IGNORE INTO `buku` (`id`, `kode`, `kode_kategori`, `judul`, `jumlah`, `stock`, `pengarang`, `penerbit`, `tahun_terbit`, `tahun_pengadaaan`, `sumber`, `rak`, `ISBN`, `foto_buku`, `last_update`, `userid`) VALUES
	(52, 'B002', 'K002', 'Understanding Non-Fiction', 20, 19, 'Jane Smith', 'Non-Fiction Publishers', '2019', '2021', 'Donation', 'B2', '978-1-23-456789-1', 'https://u7.uidownload.com/vector/575/420/vector-slightly-open-book-hardcover-mockup-psd.png', '2024-12-21 21:47:14', 'admin'),
	(53, 'B003', 'K003', 'The Science of the Universe', 100, 98, 'Albert Einstein', 'Science Books', '2021', '2023', 'Purchase', 'C3', '978-0-12-345678-9', 'https://printondemand.co.id/wp-content/uploads/2018/04/mockup-buku-13.jpg', '2024-12-21 21:47:14', 'admin'),
	(54, 'B004', 'K004', 'History of Ancient Civilizations', 5, 5, 'Mary Johnson', 'History Press', '2018', '2023', 'Donation', 'D4', '978-0-14-062341-7', 'https://i.pinimg.com/564x/d3/b2/f5/d3b2f5e8af6383d21ce27c355cbfd685.jpg', '2024-12-21 21:47:14', 'admin'),
	(55, 'B005', 'K005', 'The Adventures of Spiderman', 90, 90, 'Stan Lee', 'Marvel Comics', '2022', '2023', 'Purchase', 'E5', '978-0-06-251476-3', 'https://mir-s3-cdn-cf.behance.net/projects/404/98e87e129280821.Y3JvcCwxODc1LDE0NjcsNjAsMA.jpg', '2024-12-21 21:47:14', 'admin'),
	(56, 'B006', 'K006', 'Literary Masterpieces', 20, 20, 'William Shakespeare', 'Literature House', '2020', '2023', 'Purchase', 'F6', '978-0-19-953556-9', 'https://u7.uidownload.com/vector/575/420/vector-slightly-open-book-hardcover-mockup-psd.png', '2024-12-21 21:47:14', 'admin'),
	(61, 'B007', 'K001', 'test', 100, 99, 'saya', 'saya', '2021', '2024', 'saya', 'A1', '23238', 'https://printondemand.co.id/wp-content/uploads/2018/04/mockup-buku-13.jpg', '2024-12-22 21:15:01', 'admin'),
	(62, 'B008', 'K001', 'etstsesygd', 12, 12, 'test', 'test', '2021', '2024', 'saya', 'A1', '21232874', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUESFecY53ysK3UZk_V4yjf6V8n9DgYKbcWQ&s', '2024-12-22 21:16:41', 'admin'),
	(63, 'B009', 'K001', 'Advanced PHP', 200, 200, 'Jane Smith', 'Code Publisher', '2022', '2024', 'Donasi', 'A1', '978-1-23-456789-0', 'https://img.freepik.com/premium-psd/black-book-cover-that-says-book-mockup_630294-120.jpg?w=360', '2024-12-22 21:21:07', 'admin');
/*!40000 ALTER TABLE `buku` ENABLE KEYS */;

CREATE TABLE `peminjaman_buku` (
	`id` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`nomor_anggota` VARCHAR(20) NOT NULL COLLATE 'armscii8_bin',
	`kode_buku` VARCHAR(20) NOT NULL COLLATE 'armscii8_bin',
	`tanggal_peminjaman` DATE NOT NULL,
	`tanggal_pengembalian` DATE NULL DEFAULT NULL,
	`denda` VARCHAR(50) NULL DEFAULT NULL COLLATE 'armscii8_bin',
	`last_update` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
	`userid` VARCHAR(20) NULL DEFAULT NULL COLLATE 'armscii8_bin',
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `kode_buku` (`kode_buku`) USING BTREE,
	INDEX `nomor_anggota` (`nomor_anggota`) USING BTREE,
	CONSTRAINT `FK_peminjaman_buku_anggota_perpustakaan` FOREIGN KEY (`nomor_anggota`) REFERENCES `db_perpustakaan`.`anggota_perpustakaan` (`nomor`) ON UPDATE RESTRICT ON DELETE RESTRICT,
	CONSTRAINT `FK_peminjaman_buku_buku` FOREIGN KEY (`kode_buku`) REFERENCES `db_perpustakaan`.`buku` (`kode`) ON UPDATE RESTRICT ON DELETE RESTRICT
)
COLLATE='armscii8_bin'
ENGINE=InnoDB;



/*!40000 ALTER TABLE `peminjaman_buku` DISABLE KEYS */;
INSERT IGNORE INTO `peminjaman_buku` (`id`, `nomor_anggota`, `kode_buku`, `tanggal_peminjaman`, `tanggal_pengembalian`, `denda`, `last_update`, `userid`) VALUES
	(1, '2023016', 'B009', '2024-12-02', '2024-12-23', 'Rp. 4.500,-', '2024-12-24 02:24:24', 'testing'),
	(2, '2023019', 'B004', '2024-12-13', '2024-12-23', 'Rp. 0,-', '2024-12-24 02:25:10', 'testing'),
	(3, '2023005', 'B002', '2024-12-13', '2024-12-23', 'Rp. 0,-', '2024-12-24 02:25:23', 'testing'),
	(4, '2020200', 'B002', '2024-12-09', '2024-12-23', 'Rp. 1.000,-', '2024-12-24 02:25:57', 'testing'),
	(5, '2023017', 'B006', '2024-12-04', '2024-12-23', 'Rp. 3.500,-', '2024-12-24 02:26:15', 'testing'),
	(6, '2023003', 'B003', '2024-12-23', '2024-12-23', 'Rp. 0,-', '2024-12-24 02:26:25', 'testing'),
	(7, '2023017', 'B005', '2024-12-12', '2024-12-23', 'Rp. 0,-', '2024-12-24 02:26:47', 'testing'),
	(8, '0000001', 'B007', '2023-07-23', NULL, NULL, '2024-12-24 02:29:03', 'testing'),
	(9, '0000001', 'B002', '2024-12-23', NULL, NULL, '2024-12-24 02:29:16', 'testing'),
	(10, '0000001', 'B003', '2024-12-23', NULL, NULL, '2024-12-24 02:29:29', 'testing'),
	(11, '2023005', 'B003', '2024-12-23', NULL, NULL, '2024-12-24 03:06:18', 'Fadhil Hakim');
/*!40000 ALTER TABLE `peminjaman_buku` ENABLE KEYS */;

