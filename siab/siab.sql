-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2019 at 01:26 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siab`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(10) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `absen` char(2) NOT NULL,
  `id_guru` int(5) NOT NULL,
  `id_siswa` int(5) NOT NULL,
  `id_hari` int(3) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `id_kelas`, `absen`, `id_guru`, `id_siswa`, `id_hari`, `tanggal`, `waktu`) VALUES
(1, 4, 'h', 6, 1, 6, '0000-00-00', '03:09:28'),
(2, 4, 'a', 6, 2, 6, '0000-00-00', '03:09:28'),
(3, 4, 'i', 6, 5, 6, '0000-00-00', '03:09:28'),
(4, 4, 'h', 6, 1, 6, '2019-08-03', '03:10:06'),
(5, 4, 'a', 6, 2, 6, '2019-08-03', '03:10:06'),
(6, 4, 'i', 6, 5, 6, '2019-08-03', '03:10:06'),
(7, 4, 'h', 6, 1, 6, '2019-08-03', '03:27:41'),
(8, 4, 'a', 6, 2, 6, '2019-08-03', '03:27:41'),
(9, 4, 'i', 6, 5, 6, '2019-08-03', '03:27:41'),
(10, 4, 'i', 6, 1, 6, '2019-08-03', '03:31:09'),
(11, 4, 'h', 6, 2, 6, '2019-08-03', '03:31:09'),
(12, 4, 'h', 6, 5, 6, '2019-08-03', '03:31:09');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(3) NOT NULL,
  `nama_guru` varchar(40) NOT NULL,
  `id_mapel` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `id_mapel`) VALUES
(5, 'Mualif Lihawa', 5),
(6, 'Ariyadin', 6);

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id_hari` int(1) NOT NULL,
  `hari` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id_hari`, `hari`) VALUES
(6, 'senin'),
(7, 'selasa'),
(8, 'rabu'),
(9, 'kamis'),
(10, 'jumat');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(4) NOT NULL,
  `id_hari` int(4) NOT NULL,
  `id_kelas` int(4) NOT NULL,
  `id_guru` int(4) NOT NULL,
  `id_jam_jadwal` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_hari`, `id_kelas`, `id_guru`, `id_jam_jadwal`) VALUES
(2, 10, 5, 6, 4),
(3, 7, 7, 5, 3),
(5, 6, 4, 6, 2),
(6, 7, 4, 6, 3),
(7, 6, 4, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jam_jadwal`
--

CREATE TABLE `jam_jadwal` (
  `id_jam_jadwal` int(3) NOT NULL,
  `jam` varchar(15) NOT NULL,
  `jam_ke` int(2) NOT NULL,
  `id_hari` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam_jadwal`
--

INSERT INTO `jam_jadwal` (`id_jam_jadwal`, `jam`, `jam_ke`, `id_hari`) VALUES
(1, '01:00-02:00', 1, 6),
(2, '02:01-03:00', 2, 6),
(3, '01:00-02:01', 1, 7),
(4, '05:30-06:30', 1, 10),
(6, '04:07-09:11', 1, 8),
(7, '09:07-09:11', 1, 8),
(8, '08:10-03:03', 1, 9),
(9, '08:06-12:07', 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(2) NOT NULL,
  `kelas` varchar(2) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `nama_kelas`) VALUES
(4, '7', 'A'),
(5, '8', 'B'),
(6, '7', 'B'),
(7, '9', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(2) NOT NULL,
  `nama_mapel` varchar(40) NOT NULL,
  `waktu` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `waktu`) VALUES
(5, 'Matematika', 5),
(6, 'Bahasa Indonesia', 4);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(5) NOT NULL,
  `id_kelas` int(2) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `nama_siswa` varchar(40) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_kelas`, `nisn`, `nama_siswa`, `jenis_kelamin`) VALUES
(1, 4, '001', 'Mu\'alif lihawa', 'l'),
(2, 4, '002', 'Yosua santy', 'p'),
(4, 5, '004', 'Danang Kita', 'p'),
(5, 4, '005', 'mei mei', 'l');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_hari` (`id_hari`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_hari` (`id_hari`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_jam_jadwal` (`id_jam_jadwal`);

--
-- Indexes for table `jam_jadwal`
--
ALTER TABLE `jam_jadwal`
  ADD PRIMARY KEY (`id_jam_jadwal`),
  ADD KEY `id_hari` (`id_hari`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hari` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jam_jadwal`
--
ALTER TABLE `jam_jadwal`
  MODIFY `id_jam_jadwal` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `absensi_ibfk_2` FOREIGN KEY (`id_hari`) REFERENCES `hari` (`id_hari`),
  ADD CONSTRAINT `absensi_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_hari`) REFERENCES `hari` (`id_hari`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `jadwal_ibfk_4` FOREIGN KEY (`id_jam_jadwal`) REFERENCES `jam_jadwal` (`id_jam_jadwal`);

--
-- Constraints for table `jam_jadwal`
--
ALTER TABLE `jam_jadwal`
  ADD CONSTRAINT `jam_jadwal_ibfk_1` FOREIGN KEY (`id_hari`) REFERENCES `hari` (`id_hari`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
