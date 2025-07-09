-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2025 at 04:23 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_basisdata_tiara`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `format_jadwal` (`hari` VARCHAR(10), `jam` TIME) RETURNS VARCHAR(50) CHARSET utf8mb4 RETURN CONCAT(hari, ', jam ', TIME_FORMAT(jam, '%H:%i'))$$

CREATE DEFINER=`root`@`localhost` FUNCTION `hitung_umur` (`tgl` DATE) RETURNS INT(11) RETURN TIMESTAMPDIFF(YEAR, tgl, CURDATE())$$

CREATE DEFINER=`root`@`localhost` FUNCTION `inisial_dosen` (`nama` VARCHAR(100)) RETURNS VARCHAR(5) CHARSET utf8mb4 RETURN UPPER(LEFT(nama, 3))$$

CREATE DEFINER=`root`@`localhost` FUNCTION `jenis_kelamin_lengkap` (`jk` CHAR(1)) RETURNS VARCHAR(10) CHARSET utf8mb4 RETURN IF(jk = 'L', 'Laki-laki', 'Perempuan')$$

CREATE DEFINER=`root`@`localhost` FUNCTION `label_mahasiswa` (`nama` VARCHAR(100), `nim` VARCHAR(10)) RETURNS VARCHAR(150) CHARSET utf8mb4 RETURN CONCAT(nama, ' [NIM: ', nim, ']')$$

CREATE DEFINER=`root`@`localhost` FUNCTION `lama_studi` (`semester` INT) RETURNS VARCHAR(30) CHARSET utf8mb4 RETURN CONCAT(semester * 6, ' bulan')$$

CREATE DEFINER=`root`@`localhost` FUNCTION `nama_kota` (`nama` VARCHAR(100), `kota` VARCHAR(50)) RETURNS VARCHAR(150) CHARSET utf8mb4 RETURN CONCAT(nama, ' dari ', kota)$$

CREATE DEFINER=`root`@`localhost` FUNCTION `nilai_angka` (`nilai` CHAR(2)) RETURNS INT(11) RETURN CASE 
 WHEN nilai = 'A' THEN 4 
 WHEN nilai = 'B' THEN 3 
 WHEN nilai = 'C' THEN 2 
 WHEN nilai = 'D' THEN 1 
 ELSE 0 
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `status_lulus` (`nilai` CHAR(2)) RETURNS VARCHAR(20) CHARSET utf8mb4 RETURN IF(nilai IN ('A', 'B', 'C'), 'Lulus', 'Tidak Lulus')$$

CREATE DEFINER=`root`@`localhost` FUNCTION `total_sks` (`nim_input` VARCHAR(10)) RETURNS INT(11) RETURN ( 
 SELECT SUM(mk.sks) 
 FROM KRSMahasiswa k 
 JOIN Matakuliah mk ON k.kd_mk = mk.kd_mk 
 WHERE k.nim = nim_input 
)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `kd_ds` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`kd_ds`, `nama`) VALUES
('DS001', 'Nofal Arianto'),
('DS002', 'Ario Talib'),
('DS003', 'Ayu Rahmadina'),
('DS004', 'Ratna Kumala'),
('DS005', 'Vika Prasetyo');

-- --------------------------------------------------------

--
-- Table structure for table `jadwalmengajar`
--

CREATE TABLE `jadwalmengajar` (
  `kd_mk` varchar(10) DEFAULT NULL,
  `kd_ds` varchar(10) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `ruang` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwalmengajar`
--

INSERT INTO `jadwalmengajar` (`kd_mk`, `kd_ds`, `hari`, `jam`, `ruang`) VALUES
('MK001', 'DS002', 'Senin', '10:00:00', '102'),
('MK002', 'DS002', 'Senin', '13:00:00', 'Lab. 01'),
('MK003', 'DS001', 'Selasa', '08:00:00', '201'),
('MK004', 'DS001', 'Rabu', '10:00:00', 'Lab. 02'),
('MK005', 'DS003', 'Selasa', '10:00:00', 'Lab. 01'),
('MK006', 'DS004', 'Kamis', '09:00:00', 'Lab. 03'),
('MK007', 'DS005', 'Rabu', '08:00:00', '102'),
('MK008', 'DS005', 'Kamis', '13:00:00', '201');

-- --------------------------------------------------------

--
-- Table structure for table `krsmahasiswa`
--

CREATE TABLE `krsmahasiswa` (
  `nim` varchar(10) DEFAULT NULL,
  `kd_mk` varchar(10) DEFAULT NULL,
  `kd_ds` varchar(10) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `nilai` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `krsmahasiswa`
--

INSERT INTO `krsmahasiswa` (`nim`, `kd_mk`, `kd_ds`, `semester`, `nilai`) VALUES
('1823456', 'MK001', 'DS002', 3, NULL),
('1823456', 'MK002', 'DS002', 1, NULL),
('1823456', 'MK003', 'DS001', 3, NULL),
('1823456', 'MK004', 'DS001', 3, NULL),
('1823456', 'MK007', 'DS005', 3, NULL),
('1823456', 'MK008', 'DS005', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jk` varchar(15) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jalan` varchar(100) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `kodepos` varchar(10) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `kd_ds` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jk`, `tgl_lahir`, `jalan`, `kota`, `kodepos`, `no_hp`, `kd_ds`) VALUES
('1812345', 'Ari Santoso', 'Laki-laki', '1999-10-11', NULL, 'Bekasi', NULL, NULL, 'DS002'),
('1823456', 'Dina Marlina', 'Perempuan', '1998-11-20', NULL, 'Jakarta', NULL, NULL, NULL),
('1834567', 'Rahmat Hidayat', 'Laki-laki', '1999-05-10', NULL, 'Bekasi', NULL, NULL, NULL),
('1845678', 'Jaka Sampurna', 'Laki-laki', '2000-10-19', NULL, 'Cikarang', NULL, NULL, NULL),
('1856789', 'Tia Lestari', 'Perempuan', '1999-02-15', NULL, 'Karawang', NULL, NULL, NULL),
('1867890', 'Anton Sinaga', 'Laki-laki', '1998-06-22', NULL, 'Bekasi', NULL, NULL, NULL),
('1912345', 'Listia Nastiti', 'Perempuan', '2001-10-23', NULL, 'Jakarta', NULL, NULL, NULL),
('1923456', 'Amira Jarisa', 'Perempuan', '2001-01-24', NULL, 'Karawang', NULL, NULL, 'DS004'),
('1934567', 'Laksana Mardito', 'Laki-laki', '1999-04-14', NULL, 'Cikarang', NULL, NULL, NULL),
('1945678', 'Jura Marsina', 'Perempuan', '2000-05-10', NULL, 'Cikarang', NULL, NULL, NULL),
('1956789', 'Dadi Martani', 'Laki-laki', '2001-08-29', NULL, 'Bekasi', NULL, NULL, 'DS005'),
('1967890', 'Bayu Laksono', 'Laki-laki', '1999-07-22', NULL, 'Cikarang', NULL, NULL, 'DS004');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kd_mk` varchar(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kd_mk`, `nama`, `sks`) VALUES
('MK001', 'Algoritma Dan Pemrogaman', 3),
('MK002', 'Praktikum Algoritma Dan Pemrograman', 1),
('MK003', 'Teknologi Basis Data', 3),
('MK004', 'Praktikum Teknologi Basis Data', 1),
('MK005', 'Pemrograman Dasar', 3),
('MK006', 'Pemrograman Berorientasi Objek', 3),
('MK007', 'Struktur Data', 3),
('MK008', 'Arsitektur Komputer', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`kd_ds`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kd_mk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
