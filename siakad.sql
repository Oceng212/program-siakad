-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2021 at 06:20 AM
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
(2, 'x mipa 2', 'mamat'),
(3, 'x ips 1', 'ajun maulana'),
(4, 'x ips 2', 'layla lestari');

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
('1245324', 'anin suharto', 'Waka Kesiswaan', 'Matematika'),
('1272818', 'raihan ', 'Guru', 'Penjasorkes'),
('128324', 'ajun maulana', 'Guru', 'Bahasa Indonesia'),
('129733', 'anggi lestari', 'Guru', 'Bahasa Indonesia'),
('143245', 'martia sari', 'Waka Humas', 'Seni Budaya'),
('143256', 'suranto', 'Guru', 'Seni Budaya'),
('154323', 'layla lestari', 'Guru', 'Fisika'),
('162890', 'abed nego', 'Guru', 'Fisika'),
('173827', 'tohiri', 'Guru', 'Kimia'),
('182839', 'ajiz firdaus', 'Guru', 'Kimia'),
('187656', 'imam', 'Guru', 'Biologi'),
('1923133', 'deden pratama', 'Guru', 'Biologi'),
('198273', 'deni wahyono', 'Guru', 'Agama'),
('1987582', 'amanda permata', 'Guru', 'Agama'),
('213454', 'yazid alhudri', 'Guru', 'Ekonomi'),
('234356', 'rizky maulana', 'Guru', 'Ekonomi'),
('235467', 'amalia rizky', 'Waka Sarana dan Prasarana', 'Bahasa Inggris'),
('245367', 'jundan firdaus', 'Guru', 'Sosiologi'),
('2463245', 'dewi andini', 'Guru', 'Sosiologi'),
('251637', 'mamat', 'Guru', 'Sejarah'),
('276356', 'agung firmansyah', 'Guru', 'Sejarah'),
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
(122134, 'Bagus Aditya Saputra', 'x mipa 1'),
(123423, 'Diky Ramadanu', 'x mipa 1'),
(124324, 'Aullia Ditha Syahrani', 'x mipa 1'),
(124543, 'Dimas Ikhsan Mubarok', 'x mipa 1'),
(125467, 'Arifah Nurjihan', 'x mipa 1'),
(125678, 'Riski Wijaya', 'x mipa 1'),
(126756, 'Anis Khoirun Nailah', 'x mipa 1'),
(126789, 'Anita Nur Hidayah', 'x mipa 1'),
(127646, 'Adinda Fitri Kinanti', 'x mipa 1'),
(127656, 'Dinul Muawanah', 'x mipa 1'),
(127846, 'Deni Dwilazimah', 'x mipa 1'),
(132134, 'Fatkur Rizki', 'x mipa 1'),
(132567, 'Fauza Zaenal Arifin', 'x mipa 1'),
(134323, 'Agel Triyono', 'x mipa 2'),
(134324, 'Farah Naili Azki', 'x mipa 1'),
(134543, 'Gesit Setyantoro', 'x mipa 1'),
(135654, 'Restu Ikhtiyarti', 'x mipa 1'),
(137898, 'Farel Praditya Wijaya', 'x mipa 1'),
(143234, 'Guntur Eka Pratama', 'x mipa 1'),
(143240, 'Miftahul Karomah', 'x mipa 2'),
(143241, 'Isman Fauzi', 'x mipa 2'),
(143243, 'Fatin Nafingatun Hasanah', 'x mipa 2'),
(143245, 'Ganang Aji Nugroho', 'x mipa 1'),
(143246, 'Fani Indra Setiawan', 'x mipa 2'),
(143247, 'Jessica Maharani', 'x mipa 1'),
(143249, 'Galang Juni Kurniawan', 'x mipa 2'),
(143253, 'Java Dwi Pangga Satriya', 'x mipa 2'),
(143255, 'Bowo Putra Rahwanto', 'x mipa 2'),
(143256, 'Muhammad Ilham Wulan Romadlon', 'x ips 2'),
(145342, 'Salsabila Mayasti', 'x mipa 1'),
(152253, 'Arini Kamaliya', 'x mipa 2'),
(152254, 'Widia Marianda', 'x mipa 1'),
(154267, 'Zacky Mahendra', 'x mipa 1'),
(154324, 'Ikbal Prastyo Pambudi', 'x mipa 1'),
(156543, 'Zico Raffi Akhmad', 'x mipa 1'),
(191000, 'Alfi Karomah', 'x mipa 2'),
(191003, 'Layla Eka Rahma Putri', 'x ips 1'),
(191005, 'Maylinda Dwi Anjani', 'x ips 1'),
(214543, 'Ega Ayu Fernanda', 'x ips 1'),
(214548, 'Raghan Rizky Febriansyah', 'x ips 1'),
(231233, 'Reva Arta Herdita', 'x ips 1'),
(231234, 'Muharram Nur Alfauzi', 'x mipa 1'),
(231432, 'Rizal Febriyan', 'x mipa 1'),
(231453, 'Irfan Romadhon', 'x mipa 1'),
(234321, 'Putri Restina Aulia', 'x mipa 1'),
(234543, 'Reza Abi Wijaksana', 'x mipa 1'),
(235463, 'Muhamad Firdaus Asahlan', 'x ips 1'),
(235465, 'Hanum Ramadhani', 'x ips 1'),
(312462, 'Silmi Nelilmuna', 'x ips 1'),
(312463, 'Thotok Agung Saputro', 'x ips 2'),
(312466, 'Rio Fitra Oktavian', 'x ips 2'),
(312469, 'Sugeng Riyadi', 'x ips 2'),
(990990, 'Maman Abdurrahman', 'x mipa 2'),
(1212132, 'kahfi', 'x ips 2'),
(1234243, 'andre faturrohman', 'x mipa 1'),
(1245323, 'Nabilatul Chasanah', 'x ips 2'),
(1245435, 'Aditya Firmansyah', 'x ips 2'),
(1267890, 'Aji Prasetyo', 'x ips 2'),
(1272812, 'Flabiyan Hafist Shabibi', 'x ips 2'),
(1324543, 'Annisa Rismanindya Utami', 'x ips 2'),
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
  `semester` varchar(50) NOT NULL,
  `nilai_harian` int(11) NOT NULL,
  `UTS` int(11) NOT NULL,
  `UAS` int(11) NOT NULL,
  `nilai_absen` int(11) NOT NULL,
  `nilai_sikap` int(11) NOT NULL,
  `keterampilan` int(11) NOT NULL,
  `pengetahuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`id`, `mapel`, `NISN`, `nama`, `kelas`, `semester`, `nilai_harian`, `UTS`, `UAS`, `nilai_absen`, `nilai_sikap`, `keterampilan`, `pengetahuan`) VALUES
(8, 'Bahasa Inggris', 124543, 'Dimas Ikhsan Mubarok', 'x mipa 1', 'ganjil', 80, 90, 78, 78, 80, 80, 82);

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
(16, 'x mipa 1', 'Senin', '8:30-9:15', 'Bahasa Indonesia', 'ajun maulana'),
(17, 'x mipa 1', 'Senin', '9:15-10:00', 'Bahasa Indonesia', 'ajun maulana'),
(18, 'x mipa 1', 'Senin', '11:00-11:45', 'Seni Budaya', 'suranto'),
(20, 'x mipa 1', 'Senin', '12:30-13:15', 'Biologi', 'deden pratama'),
(21, 'x mipa 1', 'Senin', '13:15-14:00', 'Biologi', 'deden pratama'),
(22, 'x mipa 1', 'Senin', '14:00-14:45', 'Biologi', 'deden pratama'),
(24, 'x mipa 1', 'Selasa', '8:30-9:15', 'Penjasorkes', 'Indra Rusmana'),
(25, 'x mipa 1', 'Selasa', '9:15-10:00', 'Matematika', 'osha chandra'),
(26, 'x mipa 1', 'Selasa', '11:00-11:45', 'Matematika', 'osha chandra'),
(28, 'x mipa 1', 'Selasa', '12:30-13:15', 'Matematika', 'osha chandra'),
(29, 'x mipa 1', 'Selasa', '13:15-14:00', 'Fisika', 'abed nego'),
(31, 'x mipa 1', 'Selasa', '14:00-14:45', 'Bahasa Indonesia', 'ajun maulana'),
(32, 'x mipa 1', 'Selasa', '14:45-15:30', 'Bahasa Indonesia', 'ajun maulana'),
(33, 'x mipa 1', 'Rabu', '7:00-7:45', 'Kimia', 'ajiz firdaus'),
(34, 'x mipa 1', 'Rabu', '7:45-8:30', 'Kimia', 'ajiz firdaus'),
(35, 'x mipa 1', 'Rabu', '8:30-9:15', 'Kimia', 'ajiz firdaus'),
(36, 'x mipa 1', 'Rabu', '9:15-10:00', 'Matematika', 'osha chandra'),
(37, 'x mipa 1', 'Rabu', '11:00-11:45', 'Matematika', 'osha chandra'),
(38, 'x mipa 1', 'Rabu', '12:30-13:15', 'Seni Budaya', 'suranto'),
(39, 'x mipa 1', 'Rabu', '13:15-14:00', 'Seni Budaya', 'suranto'),
(40, 'x mipa 1', 'Rabu', '14:00-14:45', 'Bahasa Inggris', 'Ahmad Sabeni'),
(41, 'x mipa 1', 'Rabu', '14:45-15:30', 'Bahasa Inggris', 'amalia rizky'),
(43, 'x mipa 1', 'Kamis', '7:00-7:45', 'Biologi', 'deden pratama'),
(44, 'x mipa 1', 'Kamis', '7:45-8:30', 'Biologi', 'deden pratama'),
(45, 'x mipa 1', 'Kamis', '8:30-9:15', 'Agama', 'amanda permata'),
(46, 'x mipa 1', 'Kamis', '9:15-10:00', 'Agama', 'amanda permata'),
(47, 'x mipa 1', 'Kamis', '11:00-11:45', 'Biologi', 'deden pratama'),
(49, 'x mipa 1', 'Kamis', '12:30-13:15', 'Bahasa Indonesia', 'ajun maulana'),
(50, 'x mipa 1', 'Kamis', '13:15-14:00', 'Bahasa Indonesia', 'ajun maulana'),
(51, 'x mipa 1', 'Kamis', '14:00-14:45', 'Seni Budaya', 'suranto'),
(52, 'x mipa 1', 'Kamis', '14:45-15:30', 'Seni Budaya', 'suranto'),
(53, 'x mipa 1', 'Jumat', '7:00-7:45', 'Agama', 'amanda permata'),
(54, 'x mipa 1', 'Jumat', '7:45-8:30', 'Agama', 'amanda permata'),
(55, 'x mipa 1', 'Jumat', '8:30-9:15', 'Agama', 'amanda permata'),
(56, 'x mipa 1', 'Jumat', '9:15-10:00', 'Agama', 'amanda permata'),
(57, 'x mipa 2', 'Senin', '7:00-7:45', 'Kimia', 'tohiri'),
(58, 'x mipa 2', 'Senin', '7:45-8:30', 'Kimia', 'tohiri'),
(59, 'x mipa 2', 'Senin', '8:30-9:15', 'Matematika', 'anin suharto'),
(60, 'x mipa 2', 'Senin', '9:15-10:00', 'Matematika', 'anin suharto'),
(61, 'x mipa 2', 'Senin', '11:00-11:45', 'Bahasa Indonesia', 'anggi lestari'),
(62, 'x mipa 2', 'Senin', '12:30-13:15', 'Bahasa Indonesia', 'anggi lestari'),
(63, 'x mipa 2', 'Senin', '13:15-14:00', 'Seni Budaya', 'martia sari'),
(64, 'x mipa 2', 'Senin', '14:00-14:45', 'Seni Budaya', 'martia sari'),
(65, 'x mipa 2', 'Senin', '14:45-15:30', 'Seni Budaya', 'martia sari'),
(66, 'x mipa 2', 'Selasa', '7:00-7:45', 'Bahasa Inggris', 'amalia rizky'),
(67, 'x mipa 2', 'Selasa', '7:45-8:30', 'Bahasa Inggris', 'amalia rizky'),
(68, 'x mipa 2', 'Selasa', '8:30-9:15', 'Biologi', 'imam'),
(69, 'x mipa 2', 'Selasa', '9:15-10:00', 'Biologi', 'imam'),
(70, 'x mipa 2', 'Selasa', '11:00-11:45', 'Bahasa Indonesia', 'anggi lestari'),
(71, 'x mipa 2', 'Selasa', '12:30-13:15', 'Bahasa Indonesia', 'anggi lestari'),
(73, 'x mipa 2', 'Selasa', '13:15-14:00', 'Fisika', 'layla lestari'),
(74, 'x mipa 2', 'Selasa', '14:00-14:45', 'Fisika', 'layla lestari'),
(75, 'x mipa 2', 'Selasa', '14:45-15:30', 'Fisika', 'layla lestari'),
(76, 'x mipa 2', 'Rabu', '7:00-7:45', 'Agama', 'deni wahyono'),
(77, 'x mipa 2', 'Rabu', '7:45-8:30', 'Agama', 'deni wahyono'),
(78, 'x mipa 2', 'Rabu', '8:30-9:15', 'Seni Budaya', 'martia sari'),
(79, 'x mipa 2', 'Rabu', '9:15-10:00', 'Seni Budaya', 'martia sari'),
(80, 'x mipa 2', 'Rabu', '11:00-11:45', 'Matematika', 'anin suharto'),
(81, 'x mipa 2', 'Rabu', '12:30-13:15', 'Matematika', 'anin suharto'),
(82, 'x mipa 2', 'Rabu', '13:15-14:00', 'Bahasa Indonesia', 'anggi lestari'),
(83, 'x mipa 2', 'Rabu', '14:00-14:45', 'Bahasa Indonesia', 'anggi lestari'),
(84, 'x mipa 2', 'Rabu', '14:45-15:30', 'Bahasa Indonesia', 'anggi lestari'),
(85, 'x mipa 2', 'Kamis', '7:00-7:45', 'Penjasorkes', 'raihan '),
(86, 'x mipa 2', 'Kamis', '7:45-8:30', 'Penjasorkes', 'raihan '),
(87, 'x mipa 2', 'Kamis', '8:30-9:15', 'Penjasorkes', 'raihan '),
(88, 'x mipa 2', 'Kamis', '9:15-10:00', 'Biologi', 'imam'),
(89, 'x mipa 2', 'Kamis', '11:00-11:45', 'Biologi', 'imam'),
(90, 'x mipa 2', 'Kamis', '12:30-13:15', 'Fisika', 'layla lestari'),
(91, 'x mipa 2', 'Kamis', '13:15-14:00', 'Fisika', 'layla lestari'),
(92, 'x mipa 2', 'Kamis', '14:00-14:45', 'Seni Budaya', 'martia sari'),
(93, 'x mipa 2', 'Kamis', '14:45-15:30', 'Seni Budaya', 'martia sari'),
(94, 'x mipa 2', 'Jumat', '7:00-7:45', 'Agama', 'deni wahyono'),
(95, 'x mipa 2', 'Jumat', '7:45-8:30', 'Agama', 'deni wahyono'),
(96, 'x mipa 2', 'Jumat', '8:30-9:15', 'Agama', 'deni wahyono'),
(97, 'x mipa 2', 'Jumat', '9:15-10:00', 'Bahasa Indonesia', 'anggi lestari'),
(98, 'x ips 1', 'Senin', '7:00-7:45', 'Sejarah', 'agung firmansyah'),
(99, 'x ips 1', 'Senin', '7:45-8:30', 'Sejarah', 'agung firmansyah'),
(100, 'x ips 1', 'Senin', '8:30-9:15', 'Sejarah', 'agung firmansyah'),
(102, 'x ips 1', 'Senin', '9:15-10:00', 'Matematika', 'osha chandra'),
(103, 'x ips 1', 'Senin', '11:00-11:45', 'Matematika', 'osha chandra'),
(104, 'x ips 1', 'Senin', '12:30-13:15', 'Ekonomi', 'yazid alhudri'),
(105, 'x ips 1', 'Senin', '13:15-14:00', 'Ekonomi', 'yazid alhudri'),
(106, 'x ips 1', 'Senin', '14:00-14:45', 'Seni Budaya', 'suranto'),
(107, 'x ips 1', 'Senin', '14:45-15:30', 'Seni Budaya', 'suranto'),
(108, 'x ips 1', 'Selasa', '7:00-7:45', 'Sosiologi', 'jundan firdaus'),
(109, 'x ips 1', 'Selasa', '7:45-8:30', 'Sosiologi', 'jundan firdaus'),
(110, 'x ips 1', 'Selasa', '8:30-9:15', 'Agama', 'amanda permata'),
(111, 'x ips 1', 'Selasa', '9:15-10:00', 'Agama', 'amanda permata'),
(112, 'x ips 1', 'Selasa', '11:00-11:45', 'Bahasa Inggris', 'amalia rizky'),
(113, 'x ips 1', 'Selasa', '12:30-13:15', 'Bahasa Inggris', 'amalia rizky'),
(114, 'x ips 1', 'Selasa', '13:15-14:00', 'Sejarah', 'agung firmansyah'),
(115, 'x ips 1', 'Selasa', '14:00-14:45', 'Sejarah', 'agung firmansyah'),
(116, 'x ips 1', 'Senin', '14:45-15:30', 'Sejarah', 'agung firmansyah'),
(118, 'x ips 1', 'Rabu', '7:00-7:45', 'Bahasa Indonesia', 'anin suharto'),
(119, 'x ips 1', 'Rabu', '7:45-8:30', 'Bahasa Indonesia', 'anin suharto'),
(120, 'x ips 1', 'Rabu', '8:30-9:15', 'Bahasa Inggris', 'amalia rizky'),
(121, 'x ips 1', 'Rabu', '9:15-10:00', 'Bahasa Inggris', 'amalia rizky'),
(122, 'x ips 1', 'Rabu', '11:00-11:45', 'Penjasorkes', 'Indra Rusmana'),
(123, 'x ips 1', 'Rabu', '12:30-13:15', 'Seni Budaya', 'yazid alhudri'),
(124, 'x ips 1', 'Rabu', '13:15-14:00', 'Ekonomi', 'yazid alhudri'),
(125, 'x ips 1', 'Rabu', '14:00-14:45', 'Seni Budaya', 'martia sari'),
(126, 'x ips 1', 'Rabu', '14:45-15:30', 'Seni Budaya', 'martia sari'),
(127, 'x ips 1', 'Kamis', '7:00-7:45', 'Penjasorkes', 'Indra Rusmana'),
(128, 'x ips 1', 'Kamis', '7:45-8:30', 'Penjasorkes', 'Indra Rusmana'),
(129, 'x ips 1', 'Kamis', '8:30-9:15', 'Penjasorkes', 'Indra Rusmana'),
(130, 'x ips 1', 'Kamis', '9:15-10:00', 'Sosiologi', 'jundan firdaus'),
(131, 'x ips 1', 'Kamis', '11:00-11:45', 'Sosiologi', 'jundan firdaus'),
(132, 'x ips 1', 'Kamis', '13:15-14:00', 'Matematika', 'osha chandra'),
(133, 'x ips 1', 'Kamis', '12:30-13:15', 'Matematika', 'osha chandra'),
(134, 'x ips 1', 'Kamis', '14:00-14:45', 'Bahasa Indonesia', 'anggi lestari'),
(135, 'x ips 1', 'Kamis', '14:45-15:30', 'Bahasa Indonesia', 'anggi lestari'),
(136, 'x ips 1', 'Jumat', '7:00-7:45', 'Sejarah', 'agung firmansyah'),
(137, 'x ips 1', 'Jumat', '7:45-8:30', 'Sejarah', 'agung firmansyah'),
(138, 'x ips 1', 'Jumat', '8:30-9:15', 'Agama', 'amanda permata'),
(139, 'x ips 1', 'Jumat', '9:15-10:00', 'Agama', 'amanda permata'),
(140, 'x ips 2', 'Senin', '7:00-7:45', 'Bahasa Inggris', 'Ahmad Sabeni'),
(141, 'x ips 2', 'Senin', '7:45-8:30', 'Bahasa Inggris', 'Ahmad Sabeni'),
(142, 'x ips 2', 'Senin', '8:30-9:15', 'Bahasa Inggris', 'Ahmad Sabeni'),
(143, 'x ips 2', 'Senin', '9:15-10:00', 'Ekonomi', 'rizky maulana'),
(144, 'x ips 2', 'Senin', '11:00-11:45', 'Ekonomi', 'rizky maulana'),
(145, 'x ips 2', 'Senin', '12:30-13:15', 'Matematika', 'anin suharto'),
(146, 'x ips 2', 'Senin', '13:15-14:00', 'Matematika', 'anin suharto'),
(147, 'x ips 2', 'Senin', '14:00-14:45', 'Seni Budaya', 'suranto'),
(148, 'x ips 2', 'Senin', '14:45-15:30', 'Seni Budaya', 'suranto'),
(149, 'x ips 2', 'Selasa', '7:00-7:45', 'Bahasa Indonesia', 'ajun maulana'),
(150, 'x ips 2', 'Selasa', '7:45-8:30', 'Bahasa Indonesia', 'ajun maulana'),
(151, 'x ips 2', 'Selasa', '8:30-9:15', 'Sejarah', 'mamat'),
(152, 'x ips 2', 'Selasa', '9:15-10:00', 'Sejarah', 'mamat'),
(153, 'x ips 2', 'Selasa', '11:00-11:45', 'Ekonomi', 'rizky maulana'),
(154, 'x ips 2', 'Selasa', '12:30-13:15', 'Ekonomi', 'rizky maulana'),
(156, 'x ips 2', 'Selasa', '13:15-14:00', 'Bahasa Inggris', 'Ahmad Sabeni'),
(157, 'x ips 2', 'Selasa', '14:00-14:45', 'Bahasa Inggris', 'Ahmad Sabeni'),
(158, 'x ips 2', 'Selasa', '14:45-15:30', 'Bahasa Inggris', 'Ahmad Sabeni'),
(159, 'x ips 2', 'Rabu', '7:00-7:45', 'Sosiologi', 'dewi andini'),
(160, 'x ips 2', 'Rabu', '7:45-8:30', 'Sosiologi', 'dewi andini'),
(161, 'x ips 2', 'Rabu', '8:30-9:15', 'Sosiologi', 'dewi andini'),
(162, 'x ips 2', 'Rabu', '9:15-10:00', 'Matematika', 'anin suharto'),
(163, 'x ips 2', 'Rabu', '11:00-11:45', 'Matematika', 'anin suharto'),
(164, 'x ips 2', 'Rabu', '12:30-13:15', 'Ekonomi', 'rizky maulana'),
(165, 'x ips 2', 'Rabu', '13:15-14:00', 'Ekonomi', 'rizky maulana'),
(166, 'x ips 2', 'Rabu', '14:00-14:45', 'Seni Budaya', 'suranto'),
(167, 'x ips 2', 'Rabu', '14:45-15:30', 'Seni Budaya', 'suranto'),
(168, 'x ips 2', 'Kamis', '7:00-7:45', 'Penjasorkes', 'raihan '),
(169, 'x ips 2', 'Kamis', '7:45-8:30', 'Penjasorkes', 'raihan '),
(170, 'x ips 2', 'Kamis', '8:30-9:15', 'Penjasorkes', 'raihan '),
(171, 'x ips 2', 'Kamis', '9:15-10:00', 'Bahasa Indonesia', 'ajun maulana'),
(172, 'x ips 2', 'Kamis', '11:00-11:45', 'Bahasa Indonesia', 'ajun maulana'),
(173, 'x ips 2', 'Kamis', '13:15-14:00', 'Bahasa Inggris', 'Ahmad Sabeni'),
(175, 'x ips 2', 'Kamis', '14:00-14:45', 'Matematika', 'anin suharto'),
(176, 'x ips 2', 'Kamis', '14:45-15:30', 'Matematika', 'anin suharto'),
(177, 'x ips 2', 'Jumat', '7:00-7:45', 'Sejarah', 'mamat'),
(178, 'x ips 2', 'Jumat', '7:45-8:30', 'Sejarah', 'mamat'),
(179, 'x ips 2', 'Jumat', '8:30-9:15', 'Agama', 'amanda permata'),
(180, 'x ips 2', 'Jumat', '9:15-10:00', 'Agama', 'amanda permata'),
(181, 'x mipa 1', 'Senin', '14:45-15:30', 'Agama', 'amanda permata');

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
(128324, 'ajun maulana', 'riau', '1997-05-12', 'pria', 'Islam', 'rangkasbitung', '08124543456', 'ajun@gmaill.com'),
(129733, 'anggi lestari', 'rangkasbitung', '1997-03-06', 'wanita', 'Islam', 'rangkasbitung', '0877756453452', 'anggi@gmail.com'),
(143245, 'martia sari', 'rangkasbitung', '2000-02-21', 'wanita', 'Islam', 'rangkasbitung', '083867567645', 'sari@gmail.com'),
(143256, 'suranto', 'warunggunung', '1999-05-31', 'pria', 'Islam', 'warunggunung', '08956785435', 'suranto@gmail.com'),
(154323, 'layla lestari', 'pandeglang', '1999-02-02', 'wanita', 'Islam', 'rangkasbitung', '0895467564', 'layla@gmail.com'),
(162890, 'abed nego', 'jakarta', '2000-04-23', 'pria', 'Kristen Protestan', 'rangkasbitung', '08587896752', 'abed@gmail.com'),
(173827, 'tohiri', 'surabaya', '2000-04-12', 'pria', 'Islam', 'rangkasbitung', '087774567865', 'tohiri@gmail.com'),
(182839, 'ajiz firdaus', 'rangkasbitung', '2000-10-14', 'pria', 'Islam', 'rangkasbitung', '08956109876', 'ajiz@gmail.com'),
(187656, 'imam', 'sukabumi', '1998-02-04', 'pria', 'Islam', 'rangkasbitung', '0895678765', 'imam@gmail.com'),
(198273, 'deni wahyono', 'jakarta', '1998-06-04', 'pria', 'Kristen Protestan', 'warunggunung', '083898786701', 'deni@gmail.com'),
(213454, 'yazid alhudri', 'rangkasbitung', '1999-06-13', 'pria', 'Islam', 'mandala', '0812785676', 'yazid@gmail.com'),
(234356, 'rizky maulana', 'rangkasbitung', '1998-02-04', 'pria', 'Islam', 'rangkasbitung', '08777564565', 'rizky@gmail.com'),
(235467, 'amalia rizky', 'cirebon', '1996-01-13', 'wanita', 'Islam', 'kp. pabuaran kec warunggunung', '08965475678', 'amalia_badai@gmail.com'),
(245367, 'jundan firdaus', 'citeras', '1999-02-12', 'pria', 'Islam', 'warunggunung', '08657865345', 'jundan@gmail.com'),
(251637, 'mamat', 'aceh', '1990-07-04', 'pria', 'Islam', 'rangkasbitung', '0895676543', 'mamat@gmail.com'),
(276356, 'agung firmansyah', 'cilegon', '1999-03-12', 'pria', 'Islam', 'cibadak', '08123432345', 'agung@gmail.com'),
(1212121, 'osha chandra', 'wargun', '1987-06-23', 'pria', 'Islam', 'wargun jaya', '0983704847', 'wargun@gmail.com'),
(1245324, 'anin suharto', 'pandeglang', '1998-02-12', 'wanita', 'Islam', 'pandeglang', '089758546423', 'anin_wow@gmail.com'),
(1272818, 'raihan ', 'rangkasbitung', '1997-01-12', 'pria', 'Islam', 'warunggunung', '08961729172', 'raihan_kece@gmail.com'),
(1923133, 'deden pratama', 'pandeglang', '2000-05-04', 'pria', 'Islam', 'pandeglang', '087774567654', 'deden@gmail.com'),
(1987582, 'amanda permata', 'tanggerang', '1997-05-12', 'wanita', 'Islam', 'warunggunung', '081278656784', 'amalia@gmail.com'),
(2463245, 'dewi andini', 'walantaka', '1999-08-07', 'wanita', 'Islam', 'rangkasbitung', '085243668697', 'dewi21_@gmail.com'),
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
(122134, 'Bagus Aditya Saputra', 'jakarta', '2005-07-05', 'pria', 'Islam', 'pandeglang', '08976545687', 'Bagus@gmail.com'),
(123423, 'Diky Ramadanu', 'warunggunung', '2004-02-08', 'pria', 'Islam', 'mandala', '0845643256', 'Diky@gmail.com'),
(124324, 'Aullia Ditha Syahrani', 'cirebon', '2004-08-06', 'wanita', 'Islam', 'aweh', '08586352417', 'Aullia@gmail.com'),
(125467, 'Arifah Nurjihan', 'tanggerang', '2004-06-04', 'wanita', 'Islam', 'rangkasbitung', '08777856453', 'Arifah@gmail.com'),
(125678, 'Riski Wijaya', 'tanggerang', '2004-07-08', 'pria', 'Islam', 'mandala', '0896172917243', 'Riski@gmail.com'),
(126756, 'Anis Khoirun Nailah', 'palembang', '2004-05-12', 'wanita', 'Islam', 'mandala', '08956748365', 'Anis@gmail.com'),
(126789, 'Anita Nur Hidayah', 'rangkasbitung', '2004-05-02', 'wanita', 'Islam', 'warunggunung', '089675643323', 'Anita@gmail.com'),
(127646, 'Adinda Fitri Kinanti', 'mojokerto', '2004-03-23', 'wanita', 'Islam', 'rangkasbitung', '0895746378', 'adinda@gmail.com'),
(127656, 'Dinul Muawanah', 'pandeglang', '2004-12-08', 'wanita', 'Islam', 'warunggunung', '083898786702', 'Dinul@gmail.com'),
(127846, 'Deni Dwilazimah', 'walantaka', '2004-07-05', 'pria', 'Islam', 'rangkasbitung', '08967758473', 'Deni@gmail.com'),
(132134, 'Fatkur Rizki', 'pandeglang', '2004-02-12', 'pria', 'Islam', 'aweh', '083898786705', 'Fatkur@gmail.com'),
(132567, 'Fauza Zaenal Arifin', 'cirebon', '2004-02-09', 'pria', 'Islam', 'rangkasbitung', '087774567655', 'Fauza@gmail.com'),
(134323, 'Agel Triyono', 'citeras', '2004-04-03', 'pria', 'Islam', 'rangkasbitung', '089617291721', 'Agel@gmail.com'),
(134324, 'Farah Naili Azki', 'tanggerang', '2004-12-04', 'wanita', 'Islam', 'rangkasbitung', '08967423456', 'Farah@gmail.com'),
(134543, 'Gesit Setyantoro', 'surabaya', '2004-08-09', 'pria', 'Islam', 'warunggunung', '089758546425', 'Gesit@gmail.com'),
(135654, 'Restu Ikhtiyarti', 'cirebon', '2004-06-08', 'wanita', 'Islam', 'warunggunung', '089617291723', 'Restu@gmail.com'),
(137898, 'Farel Praditya Wijaya', 'warunggunung', '2004-03-09', 'pria', 'Kristen Katholik', 'rangkasbitung', '083898786704', 'Farel@gmail.com'),
(143234, 'Guntur Eka Pratama', 'pandeglang', '2004-06-04', 'pria', 'Kristen Protestan', 'rangkasbitung', '089758546422', 'Guntur@gmail.com'),
(143240, 'Miftahul Karomah', 'tanggerang', '2004-02-04', 'wanita', 'Islam', 'rangkasbitung', '089617291778', 'Miftahul@gmail.com'),
(143241, 'Isman Fauzi', 'tanggerang', '2004-03-06', 'pria', 'Islam', 'mandala', '089617291732', 'Isman@gmail.com'),
(143243, 'Fatin Nafingatun Hasanah', 'jakarta', '2004-05-09', 'wanita', 'Islam', 'cibadak', '089758546434', 'Fatin@gmail.com'),
(143245, 'Ganang Aji Nugroho', 'mojokerto', '2004-07-05', 'pria', 'Hindu', 'aweh', '081278656789', 'Ganang@gmail.com'),
(143246, 'Fani Indra Setiawan', 'pandeglang', '2004-07-06', 'wanita', 'Islam', 'aweh', '089617291720', 'Fani@gmail.com'),
(143247, 'Jessica Maharani', 'pandeglang', '2004-04-05', 'wanita', 'Kristen Katholik', 'rangkasbitung', '089617291724', 'Jessica@gmail.com'),
(143249, 'Galang Juni Kurniawan', 'pandeglang', '2004-08-09', 'pria', 'Islam', 'cibadak', '089617291729', 'Galang@gmail.com'),
(143253, 'Java Dwi Pangga Satriya', 'cirebon', '2004-05-15', 'pria', 'Islam', 'mandala', '089617291721', 'Java@gmail.com'),
(143255, 'Bowo Putra Rahwanto', 'rangkasbitung', '2004-02-01', 'pria', 'Islam', 'cibadak', '089758546429', 'Bowo@gmail.com'),
(143256, 'Rizqi Faddilah', 'rangkasbitung', '2004-03-02', 'pria', 'Islam', 'warunggunung', '089617291724', 'RizqiFaddilah@gmail.com'),
(145342, 'Salsabila Mayasti', 'rangkasbitung', '2004-06-07', 'wanita', 'Islam', 'warunggunung', '089758546425', 'Salsabila@gmail.com'),
(152253, 'Arini Kamaliya', 'pandeglang', '2004-06-05', 'wanita', 'Islam', 'cibadak', '089758546421', 'Arini@gmail.com'),
(152254, 'Widia Marianda', 'pandeglang', '2004-04-08', 'wanita', 'Islam', 'rangkasbitung', '089617291727', 'Widia@gmail.com'),
(154267, 'Zacky Mahendra', 'warunggunung', '2004-04-06', 'pria', 'Islam', 'rangkasbitung', '089758546422', 'Zacky@gmail.com'),
(154324, 'Ikbal Prastyo Pambudi', 'cirebon', '2004-02-07', 'pria', 'Budha', 'rangkasbitung', '089758546428', 'Ikbal@gmail.com'),
(156543, 'Zico Raffi Akhmad', 'warunggunung', '2004-09-09', 'pria', 'Islam', 'warunggunung', '089617291727', 'Zico@gmail.com'),
(191000, 'Alfi Karomah', 'tanggerang', '2004-03-02', 'pria', 'Islam', 'warunggunung', '089758546421', 'Alfi@gmail.com'),
(191003, 'Layla Eka Rahma Putri', 'jakarta', '2004-12-06', 'wanita', 'Islam', 'rangkasbitung', '089758546412', 'Layla@gmail.com'),
(191005, 'Maylinda Dwi Anjani', 'tanggerang', '2004-03-04', 'wanita', 'Islam', 'mandala', '0896172917212', 'Maylinda@gmail.com'),
(214543, 'Ega Ayu Fernanda', 'tanggerang', '2005-02-01', 'wanita', 'Islam', 'citeras', '089758546424', 'Ega@gmail.com'),
(214548, 'Raghan Rizky Febriansyah', 'pandeglang', '2004-04-03', 'pria', 'Islam', 'cibadak', '089617291722', 'Raghan@gmail.com'),
(231233, 'Reva Arta Herdita', 'warunggunung', '2004-03-04', 'pria', 'Islam', 'warunggunung', '089617291712', 'Reva@gmail.com'),
(231234, 'Muharram Nur Alfauzi', 'rangkasbitung', '2004-02-06', 'pria', 'Islam', 'aweh', '089617291723', 'Muharram@gmail.com'),
(231432, 'Rizal Febriyan', 'cirebon', '2004-11-08', 'pria', 'Islam', 'rangkasbitung', '089758546425', 'Rizal@gmail.com'),
(231453, 'Irfan Romadhon', 'purbalingga', '2004-06-05', 'pria', 'Islam', 'pandeglang', '089758546421', 'Irfan@gmail.com'),
(234321, 'Putri Restina Aulia', 'rangkasbitung', '2004-02-06', 'wanita', 'Islam', 'pandeglang', '089617291720', 'Putri@gmail.com'),
(234543, 'Reza Abi Wijaksana', 'cirebon', '2004-03-02', 'pria', 'Islam', 'aweh', '089758546423', 'Reza@gmail.com'),
(235463, 'Naufal Maulana Iqbal', 'cirebon', '2004-03-09', 'pria', 'Islam', 'cibadak', '089617291712', 'NaufalMaulanaIqbal@gmail.com'),
(235465, 'Hanum Ramadhani', 'rangkasbitung', '2004-08-09', 'wanita', 'Islam', 'warunggunung', '089758546423', 'Hanum@gmail.com'),
(312462, 'Silmi Nelilmuna', 'cirebon', '2004-03-07', 'wanita', 'Islam', 'cibadak', '089617291723', 'Silmi@gmail.com'),
(312463, 'Thotok Agung Saputro', 'warunggunung', '2004-03-04', 'pria', 'Islam', 'pandeglang', '089758546412', 'Thotok@gmail.com'),
(312466, 'Rio Fitra Oktavian', 'tanggerang', '2004-02-05', 'pria', 'Islam', 'pandeglang', '089758546423', 'Rio@gmail.com'),
(312469, 'Sugeng Riyadi', 'rangkasbitung', '2004-05-04', 'pria', 'Islam', 'pandeglang', '0896172917212', 'Sugeng@gmail.com'),
(990990, 'Maman Abdurrahman', 'Magelang', '2004-09-08', 'pria', 'Budha', 'Sepang', '0998379922', 'maman252@gmail.com'),
(1234243, 'andre faturrohman', 'serang', '1999-12-12', 'pria', 'Kristen Katholik', 'secang', '123433443', 'andres@gmail.com'),
(1245323, 'Nabilatul Chasanah', 'warunggunung', '2004-05-06', 'wanita', 'Islam', 'pandeglang', '089617291756', 'NabilatulChasanah@gmail.com'),
(1245435, 'Aditya Firmansyah', 'pandeglang', '2004-04-02', 'pria', 'Islam', 'citeras', '089617291728', 'Aditya@gmail.com'),
(1267890, 'Aji Prasetyo', 'cirebon', '2004-02-01', 'pria', 'Islam', 'mandala', '089617291721', 'Aji@gmail.com'),
(1272812, 'Naya Fatimah Az Zahra', 'warunggunung', '2003-09-07', 'pria', 'Islam', 'mandala', '0896172917801', 'Naya@gmail.com'),
(1324543, 'Annisa Rismanindya Utami', 'jakarta', '2004-02-01', 'wanita', 'Islam', 'rangkasbitung', '089758546423', 'Annisa@gmail.com'),
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
(10, 1212132, 'kahpi', '0000000', 'siswa'),
(11, 1272818, 'raihan', '123', 'guru'),
(12, 1245324, 'anin', '123', 'guru'),
(13, 235467, 'amalia', '123', 'guru'),
(14, 1987582, 'amanda', '123', 'guru'),
(15, 2463245, 'dewi', '123', 'guru'),
(16, 1923133, 'deden', '123', 'guru'),
(17, 198273, 'deni', '123', 'guru'),
(18, 129733, 'anggi', '123', 'guru'),
(19, 182839, 'ajiz', '123', 'guru'),
(20, 213454, 'yazid', '123', 'guru'),
(21, 143245, 'martia', '123', 'guru'),
(22, 154323, 'layla', '123', 'guru'),
(23, 234356, 'rizky', '123', 'guru'),
(24, 128324, 'ajun', '123', 'guru'),
(25, 251637, 'mamat', '123', 'guru'),
(26, 173827, 'tohiri', '123', 'guru'),
(27, 187656, 'imam', '123', 'guru'),
(28, 162890, 'abed', '123', 'guru'),
(29, 245367, 'jundan', '123', 'guru'),
(30, 276356, 'agung', '123', 'guru'),
(31, 143256, 'suranto', '123', 'guru'),
(32, 127646, 'Adinda', '123', 'siswa'),
(33, 126756, 'Anis', '123', 'siswa'),
(34, 126789, 'Anita', '123', 'siswa'),
(35, 125467, 'Arifah', '123', 'siswa'),
(36, 124324, 'Aullia', '123', 'siswa'),
(37, 122134, 'Bagus', '123', 'siswa'),
(38, 127846, 'Deni', '123', 'siswa'),
(39, 123423, 'Diky', '123', 'siswa'),
(40, 124543, 'Dimas', '123', 'siswa'),
(41, 127656, 'Dinul', '123', 'siswa'),
(42, 134324, 'Farah', '123', 'siswa'),
(43, 137898, 'Farel', '123', 'siswa'),
(44, 132134, 'Fatkur', '123', 'siswa'),
(45, 132567, 'Fauza', '123', 'siswa'),
(46, 143245, 'Ganang', '123', 'siswa'),
(47, 134543, 'Gesit', '123', 'siswa'),
(48, 143234, 'Guntur', '123', 'siswa'),
(49, 154324, 'Ikbal', '123', 'siswa'),
(50, 231453, 'Irfan', '123', 'siswa'),
(51, 143247, 'Jessica', '123', 'siswa'),
(52, 143256, 'Muhammad', '123', 'siswa'),
(53, 231234, 'Muharram', '123', 'siswa'),
(54, 143256, 'Naila', '123', 'siswa'),
(55, 234321, 'Putri', '123', 'siswa'),
(56, 135654, 'Restu', '123', 'siswa'),
(57, 234543, 'Reza', '123', 'siswa'),
(58, 125678, 'Riski', '123', 'siswa'),
(59, 231432, 'Rizal', '123', 'siswa'),
(60, 145342, 'Salsabila', '123', 'siswa'),
(61, 152254, 'Widia', '123', 'siswa'),
(62, 154267, 'Zacky', '123', 'siswa'),
(63, 156543, 'Zico', '123', 'siswa'),
(64, 1245435, 'Aditya', '111', 'siswa'),
(65, 134323, 'Agel', '111', 'siswa'),
(66, 1267890, 'Aji ', '111', 'siswa'),
(67, 191000, 'Alfi', '111', 'siswa'),
(68, 1324543, 'Annisa', '111', 'siswa'),
(69, 152253, 'Arini', '111', 'siswa'),
(70, 143255, 'Bowo', '111', 'siswa'),
(71, 214543, 'Ega', '111', 'siswa'),
(72, 143246, 'Fani', '111', 'siswa'),
(73, 143243, 'Fatin', '111', 'siswa'),
(74, 1272812, 'Flabiyan', '111', 'siswa'),
(75, 143249, 'Galang', '111', 'siswa'),
(76, 235465, 'Hanum Ramadhani', '111', 'siswa'),
(77, 143241, 'Isman', '111', 'siswa'),
(78, 143253, 'Java', '111', 'siswa'),
(79, 191002, 'Laurenza', '11', 'siswa'),
(80, 191003, 'Layla', '111', 'siswa'),
(81, 191005, 'Maylinda', '111', 'siswa'),
(82, 143240, 'Miftahul', '111', 'siswa'),
(83, 235463, 'Firdaus', '111', 'siswa'),
(84, 143256, 'Rizqi', '111', 'siswa'),
(85, 1245323, 'Nabilatul', '111', 'siswa'),
(86, 235463, 'Naufal', '111', 'siswa'),
(87, 1272812, 'Naya', '111', 'siswa'),
(88, 214548, 'Raghan', '111', 'siswa'),
(89, 231233, 'Reva', '111', 'siswa'),
(90, 312466, 'Rio', '111', 'siswa'),
(91, 312462, 'Silmi', '111', 'siswa'),
(92, 312469, 'Sugeng', '111', 'siswa'),
(93, 312463, 'Thotok', '111', 'siswa');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
