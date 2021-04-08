-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 04:55 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_agama`
--

CREATE TABLE `tb_agama` (
  `id_agama` int(2) NOT NULL,
  `agama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_agama`
--

INSERT INTO `tb_agama` (`id_agama`, `agama`) VALUES
(1, 'Islam'),
(3, 'Katolik'),
(4, 'Kristen'),
(5, 'Konghucu'),
(6, 'Budha'),
(7, 'Hindu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_banner`
--

CREATE TABLE `tb_banner` (
  `id_benner` int(11) NOT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `benner` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_banner`
--

INSERT INTO `tb_banner` (`id_benner`, `ket`, `benner`) VALUES
(3, 'Banner 3', '1616558514_49171746ac82d85f9f6c.jpg'),
(4, 'Banner 4', 'banner4.jpg'),
(6, 'Banner 1', '1616558166_bb3a9e19be32e835cff5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berkas`
--

CREATE TABLE `tb_berkas` (
  `id_berkas` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_lampiran` int(11) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `berkas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berkas`
--

INSERT INTO `tb_berkas` (`id_berkas`, `id_siswa`, `id_lampiran`, `ket`, `berkas`) VALUES
(6, 1, 4, 'sffcafaihujlo', '1617418751_c8237d32133b614962ac.pdf'),
(7, 1, 1, 'ascxgrb ewqwa', '1617418854_128d5484603a91ddb6e6.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jalur_msk`
--

CREATE TABLE `tb_jalur_msk` (
  `id_jalur_msk` int(11) NOT NULL,
  `jalur_msk` varchar(100) DEFAULT NULL,
  `kuota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jalur_msk`
--

INSERT INTO `tb_jalur_msk` (`id_jalur_msk`, `jalur_msk`, `kuota`) VALUES
(1, 'Zonasi', 50),
(2, 'Prestasi', 40),
(3, 'Afirmasi', 30),
(4, 'Perpindahan', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(2) NOT NULL,
  `jurusan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `jurusan`) VALUES
(0, 'Tidak Ada'),
(1, 'TKJ (Tehnik Komputer dan Jaringan'),
(3, 'MM (Multi Media)');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lampiran`
--

CREATE TABLE `tb_lampiran` (
  `id_lampiran` int(11) NOT NULL,
  `lampiran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lampiran`
--

INSERT INTO `tb_lampiran` (`id_lampiran`, `lampiran`) VALUES
(1, 'SKHUN'),
(2, 'Kartu Keluarga'),
(4, 'Sertifikat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pekerjaan`
--

CREATE TABLE `tb_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `pekerjaan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pekerjaan`
--

INSERT INTO `tb_pekerjaan` (`id_pekerjaan`, `pekerjaan`) VALUES
(2, 'Swasta'),
(3, 'Buruh'),
(4, 'TNI'),
(5, 'Tentara'),
(7, 'Ibu Rumah Tangga');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendidikan`
--

CREATE TABLE `tb_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `pendidikan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pendidikan`
--

INSERT INTO `tb_pendidikan` (`id_pendidikan`, `pendidikan`) VALUES
(1, 'Tidak Tamat SD'),
(2, 'SD'),
(3, 'SMP'),
(4, 'SMA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penghasilan`
--

CREATE TABLE `tb_penghasilan` (
  `id_penghasilan` int(11) NOT NULL,
  `penghasilan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penghasilan`
--

INSERT INTO `tb_penghasilan` (`id_penghasilan`, `penghasilan`) VALUES
(1, 'Rp. 50.000 s/d Rp. 300.000'),
(3, 'Rp. 100.000 s/d Rp. 200.000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_setting`
--

CREATE TABLE `tb_setting` (
  `id` int(2) NOT NULL,
  `n_sekolah` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `desa` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `telp` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `web` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `beranda` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_setting`
--

INSERT INTO `tb_setting` (`id`, `n_sekolah`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `telp`, `email`, `web`, `deskripsi`, `logo`, `beranda`) VALUES
(1, 'SMK Darunnajah 1 Gentur', 'Kp. cipining Rt. 004 Rw. 005', 'Batujajar', 'Cigudeg', 'Bogor', 'Jawa barat', '085798741533', 'darunnajah2cipining@gmail.com', 'www.darunnaja2cipining.com', 'Sekola Islamic Daerah Cigudeg Bogor', '1616242955_8861af76d32d25f8c5ed.jpg', '<div style=\"text-align: center;\"><b style=\"font-size: 1rem;\">Ini Adalah Beranda</b></div>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `no_pendaftaran` varchar(12) DEFAULT NULL,
  `tgl_pendaftaran` date DEFAULT NULL,
  `thn` year(4) DEFAULT NULL,
  `id_jurusan` int(2) DEFAULT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `n_lengkap` varchar(200) DEFAULT NULL,
  `n_panggilan` varchar(100) DEFAULT NULL,
  `t_lhr` varchar(255) DEFAULT NULL,
  `tgl_lhr` date DEFAULT NULL,
  `jk` varchar(10) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_jalur_msk` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `id_agama` int(11) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `tinggi_bdn` varchar(10) DEFAULT NULL,
  `brt_bdn` varchar(10) DEFAULT NULL,
  `jml_saudara` varchar(10) DEFAULT NULL,
  `anak_ke` varchar(10) DEFAULT NULL,
  `nik_ayah` varchar(100) DEFAULT NULL,
  `n_ayah` varchar(100) DEFAULT NULL,
  `p_ayah` varchar(200) DEFAULT NULL,
  `pend_ayah` varchar(100) DEFAULT NULL,
  `peng_ayah` varchar(100) DEFAULT NULL,
  `telp_ayah` varchar(20) DEFAULT NULL,
  `nik_ibu` varchar(200) DEFAULT NULL,
  `n_ibu` varchar(255) DEFAULT NULL,
  `p_ibu` varchar(255) DEFAULT NULL,
  `pend_ibu` varchar(255) DEFAULT NULL,
  `peng_ibu` varchar(200) DEFAULT NULL,
  `telp_ibu` varchar(50) DEFAULT NULL,
  `prov` varchar(200) DEFAULT NULL,
  `kab` varchar(200) DEFAULT NULL,
  `kec` varchar(200) DEFAULT NULL,
  `desa` varchar(200) DEFAULT NULL,
  `n_sek` varchar(200) DEFAULT NULL,
  `thn_lulus` varchar(200) DEFAULT NULL,
  `ijazah` varchar(200) DEFAULT NULL,
  `skhun` varchar(200) DEFAULT NULL,
  `stat_pendaftaran` int(1) DEFAULT 0,
  `stat_ppdb` int(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `no_pendaftaran`, `tgl_pendaftaran`, `thn`, `id_jurusan`, `nisn`, `n_lengkap`, `n_panggilan`, `t_lhr`, `tgl_lhr`, `jk`, `password`, `id_jalur_msk`, `foto`, `nik`, `id_agama`, `telp`, `tinggi_bdn`, `brt_bdn`, `jml_saudara`, `anak_ke`, `nik_ayah`, `n_ayah`, `p_ayah`, `pend_ayah`, `peng_ayah`, `telp_ayah`, `nik_ibu`, `n_ibu`, `p_ibu`, `pend_ibu`, `peng_ibu`, `telp_ibu`, `prov`, `kab`, `kec`, `desa`, `n_sek`, `thn_lulus`, `ijazah`, `skhun`, `stat_pendaftaran`, `stat_ppdb`) VALUES
(1, '202103210001', '2021-03-22', 2021, NULL, '12345', 'Yola Yosanta', 'Yola', 'Bogor', '1997-10-02', 'P', '827ccb0eea8a706c4c34a16891f84e7b', 2, '1616808963_c9f8afe035bb56ee9cdf.png', '123456789', 1, '085881431888', '140', '45', '1', '1', '320123654789', 'Rizwan', 'TNI', 'SMA', 'Rp. 50.000 s/d Rp. 300.000', '08574129678', '3201789455117', 'Yola Yosanta', 'Tentara', 'SMA', 'Rp. 100.000 s/d Rp. 200.000', '085797455', 'Jawa Barat', 'Bogor', 'Cigudeg', 'Rengasjajar', 'SDN Lebakwangi 01', '2013', '14254', '124567', 1, 1),
(2, '202103210002', '2021-03-22', 2021, NULL, '123456', 'Olivia', 'Olivia', 'Bogor', '2000-05-05', 'P', 'e10adc3949ba59abbe56e057f20f883e', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1),
(3, '202103220001', '2021-03-22', NULL, NULL, '1234567', 'Diana', 'Dian', 'Bogor', '1994-06-03', 'P', 'fcea920f7412b5da7be0cf42b8c93759', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(6, '202103220001', '2021-03-22', NULL, NULL, '12345678', 'Bonar', 'Ranob', 'Bogor', '1990-01-01', 'L', '25d55ad283aa400af464c76d713c07ad', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(7, '202104030001', '2021-04-03', NULL, NULL, '54321', 'Bonar', 'Ranob', 'Bogor', '1990-01-01', 'L', '01cfcd4f6b8770febfb40cb906715822', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(8, '202104050001', '2021-04-05', 2021, 3, '456789', 'Rampog', 'Madog', 'Bogor', '1990-02-03', 'L', 'e35cf7b66449df565f93c607d5a81d09', 1, NULL, '32012145485748854', 3, '085693797084', '130', '60', '10', '1', '320121524164', 'Rampog', 'Buruh', 'Tidak Tamat SD', 'Rp. 50.000 s/d Rp. 300.000', '08574129678', '3201789455117', 'Sanariayah', 'Ibu Rumah Tangga', 'Tidak Tamat SD', 'Rp. 50.000 s/d Rp. 300.000', '08314548544155', 'Jawa Barat', 'Bogor', 'Cigudeg', 'Rengasjajar', 'SDN Lebakwangi 02', '2012', '1425484', '12455679', 1, 2),
(9, '202104060001', '2021-04-06', 2021, 0, '987654', 'Sardonit', 'Donit', 'Bogor', '1995-07-10', 'L', '6c44e5cd17f0019c64b042e4a745412a', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ta`
--

CREATE TABLE `tb_ta` (
  `id_ta` int(11) NOT NULL,
  `thn` year(4) DEFAULT NULL,
  `ta` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ta`
--

INSERT INTO `tb_ta` (`id_ta`, `thn`, `ta`, `status`) VALUES
(1, 2019, '2019/2020', 1),
(2, 2020, '2020/2021', 0),
(4, 2021, '2021/2022', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `n_user` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `n_user`, `email`, `password`, `foto`) VALUES
(1, 'Yola', 'yolasayang@gmail.com', '1234', '1615723518_7ae1fabe15f7ac2c8919.jpg'),
(2, 'Olivia', 'oliv@gmail.com', '12345', '1615723535_efb6951343e11c0ac213.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_agama`
--
ALTER TABLE `tb_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `tb_banner`
--
ALTER TABLE `tb_banner`
  ADD PRIMARY KEY (`id_benner`);

--
-- Indexes for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `tb_jalur_msk`
--
ALTER TABLE `tb_jalur_msk`
  ADD PRIMARY KEY (`id_jalur_msk`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tb_lampiran`
--
ALTER TABLE `tb_lampiran`
  ADD PRIMARY KEY (`id_lampiran`);

--
-- Indexes for table `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `tb_penghasilan`
--
ALTER TABLE `tb_penghasilan`
  ADD PRIMARY KEY (`id_penghasilan`);

--
-- Indexes for table `tb_setting`
--
ALTER TABLE `tb_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tb_ta`
--
ALTER TABLE `tb_ta`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_agama`
--
ALTER TABLE `tb_agama`
  MODIFY `id_agama` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_banner`
--
ALTER TABLE `tb_banner`
  MODIFY `id_benner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_jalur_msk`
--
ALTER TABLE `tb_jalur_msk`
  MODIFY `id_jalur_msk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_lampiran`
--
ALTER TABLE `tb_lampiran`
  MODIFY `id_lampiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_penghasilan`
--
ALTER TABLE `tb_penghasilan`
  MODIFY `id_penghasilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_setting`
--
ALTER TABLE `tb_setting`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_ta`
--
ALTER TABLE `tb_ta`
  MODIFY `id_ta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
