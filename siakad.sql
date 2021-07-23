-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2021 at 09:43 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kelas`
--

CREATE TABLE `data_kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `walikelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kelas`
--

INSERT INTO `data_kelas` (`id`, `kelas`, `walikelas`) VALUES
(1, 'x mipa 1', 'Ahmad Sabeni'),
(2, 'x mipa 2', '-'),
(3, 'x ips 1', '-'),
(4, 'x ips 2', '-');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_guru`
--

CREATE TABLE `jabatan_guru` (
  `NIP` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan_guru`
--

INSERT INTO `jabatan_guru` (`NIP`, `nama`, `jabatan`, `mapel`) VALUES
('112345', 'Indra Rusmana', 'Waka Kurikulum', 'Penjasorkes'),
('1212121', 'osha chandra', 'Guru', 'Matematika'),
('9103849', 'Ahmad Sabeni', 'Guru', 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `NISN` int(40) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`NISN`, `nama`, `kelas`) VALUES
(990990, 'Maman Abdurrahman', 'x mipa 2'),
(1212132, 'kahfi', 'x ips 2'),
(1234243, 'andre faturrohman', '-'),
(11219047, 'Dicky Alamsyah', 'x mipa 1'),
(11221100, 'Taiga Dwi Anjani', 'x mipa 1');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `id` int(11) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `NISN` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `nilai_harian` int(11) NOT NULL,
  `UTS` int(11) NOT NULL,
  `UAS` int(11) NOT NULL,
  `nilai_absen` int(11) NOT NULL,
  `nilai_sikap` int(11) NOT NULL,
  `nilai_praktek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`id`, `mapel`, `NISN`, `nama`, `kelas`, `nilai_harian`, `UTS`, `UAS`, `nilai_absen`, `nilai_sikap`, `nilai_praktek`) VALUES
(3, 'Bahasa Inggris', 11221100, 'Taiga Dwi Anjani', 'x mipa 1', 80, 80, 80, 88, 80, 80),
(4, 'Penjasorkes', 11219047, 'Dicky Alamsyah', 'x mipa 1', 90, 90, 80, 75, 90, 90);

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `id` int(11) NOT NULL,
  `kelas` varchar(40) NOT NULL,
  `hari` varchar(30) NOT NULL,
  `jam` varchar(50) NOT NULL,
  `mapel` varchar(100) NOT NULL,
  `pengajar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`id`, `kelas`, `hari`, `jam`, `mapel`, `pengajar`) VALUES
(2, 'x mipa 1', 'Senin', '7:00-7:45', 'Bahasa Inggris', 'Ahmad Sabeni'),
(6, 'x mipa 1', 'Selasa', '7:45-8:30', 'Penjasorkes', 'Indra Rusmana'),
(7, 'x mipa 1', 'Senin', '7:45-8:30', 'Penjasorkes', 'Indra Rusmana'),
(8, 'x mipa 1', 'Selasa', '7:00-7:45', 'Penjasorkes', 'Indra Rusmana'),
(9, 'x mipa 1', 'Rabu', '7:00-7:45', 'Bahasa Inggris', 'Indra Rusmana');

-- --------------------------------------------------------

--
-- Table structure for table `profil_guru`
--

CREATE TABLE `profil_guru` (
  `NIP` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profil_guru`
--

INSERT INTO `profil_guru` (`NIP`, `nama`, `tempat`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `telp`, `email`) VALUES
(112345, 'Indra Rusmana', 'Ponorogo', '2004-01-03', 'pria', 'Islam', 'Taman Puri Asri', '0897797889', 'Indra_Tadika@gmail.com'),
(1212121, 'osha chandra', 'wargun', '1987-06-23', 'pria', 'Islam', 'wargun jaya', '0983704847', 'wargun@gmail.com'),
(9103849, 'Ahmad Sabeni', 'Mojokerto', '1980-05-08', 'pria', 'Islam', 'Secang Pinggir', '0889883678', 'Sabeni_gantenk@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `profil_siswa`
--

CREATE TABLE `profil_siswa` (
  `NISN` int(10) NOT NULL,
  `nama` text NOT NULL,
  `tempat` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(40) NOT NULL,
  `agama` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profil_siswa`
--

INSERT INTO `profil_siswa` (`NISN`, `nama`, `tempat`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `telp`, `email`) VALUES
(990990, 'Maman Abdurrahman', 'Magelang', '2004-09-08', 'pria', 'Budha', 'Sepang', '0998379922', 'maman252@gmail.com'),
(1234243, 'andre faturrohman', 'serang', '1999-12-12', 'pria', 'Kristen Katholik', 'secang', '123433443', 'andres@gmail.com'),
(11219047, 'Dicky Alamsyah', 'Serang', '2000-11-01', 'pria', 'Islam', 'Griya Permata Asri', '08888758445', 'ocengkencod212@gmail.com'),
(11221100, 'Taiga Dwi Anjani', 'Bandung', '2004-06-11', 'wanita', 'Kristen Katholik', 'Taman city', '089909990', 'taiga1977@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nomor_induk` int(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nomor_induk`, `username`, `password`, `status`) VALUES
(1, 1088956, 'admin', '123', 'admin'),
(2, 11219047, 'Dicky', 'dicky123', 'siswa'),
(3, 9103849, 'ahmad', 'ahmad123', 'guru'),
(4, 11221100, 'taiga', '11111', 'siswa'),
(5, 990990, 'maman', 'maman1212', 'siswa'),
(6, 112345, 'indra', '0000', 'guru'),
(8, 1212121, 'osha', '111', 'guru'),
(9, 1234243, 'andre', '3434', 'siswa'),
(10, 1212132, 'kahpi', '0000000', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kelas`
--
ALTER TABLE `data_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan_guru`
--
ALTER TABLE `jabatan_guru`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`NISN`);

--
-- Indexes for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_guru`
--
ALTER TABLE `profil_guru`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `profil_siswa`
--
ALTER TABLE `profil_siswa`
  ADD PRIMARY KEY (`NISN`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kelas`
--
ALTER TABLE `data_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
