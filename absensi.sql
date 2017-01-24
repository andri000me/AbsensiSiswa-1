-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2016 at 03:41 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `hadir`
--

CREATE TABLE `hadir` (
  `id_absen` int(11) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `keterangan` enum('hadir','izin','alfa','sakit','dispen') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hadir`
--

INSERT INTO `hadir` (`id_absen`, `tanggal`, `id_mapel`, `nisn`, `keterangan`) VALUES
(110, '1 November, 2016', 11, '109109', ''),
(111, '1 November, 2016', 11, '109110', ''),
(112, '2 November, 2016', 11, '109109', ''),
(113, '2 November, 2016', 11, '109110', 'izin'),
(114, '', 10, '101515963', ''),
(115, '12 December, 2016', 12, '101515963', ''),
(116, '31 December, 2016', 10, '101515963', ''),
(117, '31 December, 2016', 10, '101515964', ''),
(118, '6 November, 2016', 9, '101515963', ''),
(119, '6 November, 2016', 9, '101515964', 'izin');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `nama_pengirim`, `kelas`, `isi`, `tanggal`, `nama_siswa`) VALUES
(22, 'PIKET', 'X RPL 2', 'telat', '9 November, 2016', 'test'),
(23, 'PIKET', 'X RPL 1', 'kjsdlajks', '18 November, 2016', 'kasjdajskl'),
(24, 'dsa;dsla', 'X RPL 2', 'sakit', '9 November, 2016', 'jdsajdsakjkljasd'),
(25, 'dsa;dsla', 'X RPL 2', '', '', ''),
(26, 'PIKET', 'XI RPL 1', 'telat', '9 November, 2016', 'Ricky Rizky'),
(27, 'Adhi', 'XI RPL 1', 'sakitt', '1 November, 2016', 'Dhafa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_ad` varchar(60) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_ad`, `username`, `password`) VALUES
(1, 'Rifqi Subagja', 'croize', 'croize');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_pel` varchar(50) NOT NULL,
  `kelas` enum('X','XI','XII','XIII') NOT NULL,
  `jurusan` enum('RPL','TKJ','AK') NOT NULL,
  `guru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `nama_pel`, `kelas`, `jurusan`, `guru`) VALUES
(9, 'OOP', 'XI', 'RPL', 'pa adhi'),
(10, 'FISIKA', 'XI', 'RPL', 'Bu hadi'),
(11, 'tes 1', 'X', 'RPL', 'tes 1'),
(12, 'Webprog', 'XI', 'RPL', 'Adhi Ismail');

-- --------------------------------------------------------

--
-- Table structure for table `tb_piket`
--

CREATE TABLE `tb_piket` (
  `id_piket` int(11) NOT NULL,
  `nama_piket` varchar(50) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_piket`
--

INSERT INTO `tb_piket` (`id_piket`, `nama_piket`, `username`, `password`) VALUES
(1, 'bu desta', 'desta', 'desta'),
(2, 'pa taufik', 'taufik', 'taufik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nisn` varchar(20) NOT NULL,
  `nama_sis` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nisn`, `nama_sis`, `alamat`, `no_telp`, `jk`, `foto`, `kelas`) VALUES
('10151522', 'yoris', 'dlajsdkjasl', '2739131', 'L', '', 'XI RPL 2'),
('101515963', 'Ricky Rizky', 'Setia Budi', '02398312', 'L', '', 'XI RPL 1'),
('101515964', 'Rifqi Subagja', 'margacinta', '089218931', 'L', '', 'XI RPL 1'),
('1030', 'Yuini', 'margahayu', '0893109829', 'P', '', 'X AK 1'),
('109109', 'SAHA', 'jdkljdklsja', '39123812', 'P', '', 'X RPL 2'),
('109110', 'Tes 2', 'asdklajsl', '123812830', 'L', '', 'X RPL 2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `level` enum('FFUKZ','VFXNV','WKUXQ','MMPUBPZDV') NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `kelas_mapel` enum('X','XI','XII','XIII') NOT NULL,
  `jurusan` enum('RPL','TKJ','AK') NOT NULL,
  `nama_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`, `kelas`, `kelas_mapel`, `jurusan`, `nama_user`) VALUES
(1, 'xirpl1', 'xirpl1', 'VFXNV', 'XI RPL 1', 'XI', 'RPL', 'Jajang'),
(3, 'wali', 'wali', 'MMPUBPZDV', 'XI RPL 1', 'XI', 'RPL', 'Adhi'),
(4, 'admin', 'admin', 'FFUKZ', '', '', '', 'Admin'),
(5, 'piket', 'piket', 'WKUXQ', '', '', '', 'PIKET'),
(6, 'xirpl2', 'xirpl2', 'VFXNV', 'XI RPL 2', 'XI', 'RPL', 'Prayogi'),
(7, 'xrpl2', 'xrpl2', 'VFXNV', 'X RPL 2', 'X', 'RPL', 'Tiara'),
(8, 'wali1', 'wali1', 'MMPUBPZDV', 'X RPL 2', 'X', 'RPL', 'dsa;dsla'),
(9, 'xak1', 'xka1', 'VFXNV', 'X AK 1', 'X', 'AK', 'jangkun'),
(10, 'xtkj1', 'xtkj1', 'VFXNV', 'X TKJ 1', 'X', 'TKJ', 'Devani');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wakil`
--

CREATE TABLE `tb_wakil` (
  `id_wakil` int(11) NOT NULL,
  `nama_wakil` varchar(50) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `jurusan` enum('tkj','ak','rpl') NOT NULL,
  `kelas_mapel` enum('X','XI','XII','XIII') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_wakil`
--

INSERT INTO `tb_wakil` (`id_wakil`, `nama_wakil`, `kelas`, `username`, `password`, `jurusan`, `kelas_mapel`) VALUES
(8, 'jajang', 'XI RPL 1', 'xirpl1', 'xirpl1', 'rpl', 'XI'),
(9, 'ucu', 'XI TKJ 2', 'xitkj2', 'xitkj2', 'tkj', 'XI'),
(10, 'yono', 'XI AK 2', 'xiak2', 'xiak2', 'ak', 'XI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_walikelas`
--

CREATE TABLE `tb_walikelas` (
  `id_wali` int(11) NOT NULL,
  `nama_wali` varchar(50) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_walikelas`
--

INSERT INTO `tb_walikelas` (`id_wali`, `nama_wali`, `kelas`, `username`, `password`) VALUES
(1, 'Adhi Ismail Hassan', 'XI RPL 1', 'walixirpl1', 'walixirpl1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hadir`
--
ALTER TABLE `hadir`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tb_piket`
--
ALTER TABLE `tb_piket`
  ADD PRIMARY KEY (`id_piket`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_wakil`
--
ALTER TABLE `tb_wakil`
  ADD PRIMARY KEY (`id_wakil`);

--
-- Indexes for table `tb_walikelas`
--
ALTER TABLE `tb_walikelas`
  ADD PRIMARY KEY (`id_wali`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hadir`
--
ALTER TABLE `hadir`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_piket`
--
ALTER TABLE `tb_piket`
  MODIFY `id_piket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_wakil`
--
ALTER TABLE `tb_wakil`
  MODIFY `id_wakil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_walikelas`
--
ALTER TABLE `tb_walikelas`
  MODIFY `id_wali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
