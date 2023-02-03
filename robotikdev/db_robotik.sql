-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 04:11 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_robotik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `password`, `foto`) VALUES
(12, 'Maulidya Khairun Nisa&#039;', 'admin4', '123', ''),
(13, 'Aulia Nur Safira', 'admin5', '123', ''),
(33, 'Rifky Nurrahman', 'admin1', '202cb962ac59075b964b07152d234b70', 'team-3.jpg'),
(53, 'Febri Haryadi', 'admin7', '202cb962ac59075b964b07152d234b70', 'testimonials-5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_agt` int(10) NOT NULL,
  `nama_agt` varchar(50) DEFAULT NULL,
  `kelas_agt` varchar(10) NOT NULL,
  `foto_agt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_agt`, `nama_agt`, `kelas_agt`, `foto_agt`) VALUES
(0, 'Fajar Permana ', 'XI RPL 1', ''),
(4, 'Denok Wahyuni', 'XI RPL 1', ''),
(5, 'Fadlan Buwono', 'X1 RPL 1', ''),
(6, 'Ahmad valentino', 'XI RPL 1', ''),
(7, 'Muhammad Feriansyah', 'XI RPL 1', ''),
(8, 'Muhammad Arif', 'XI RPL 2', ''),
(9, 'Ramadhan Wahyu', 'XI TKJ 2', ''),
(10, 'Silvester Ananda', 'XI TKJ 2', ''),
(11, 'Muhammad Zalfa', 'XI TKJ 2', ''),
(12, 'Daffa Wahyu', 'XI TKJ 2', ''),
(13, 'Rizky Fathurrahman', 'XI TKJ 2', ''),
(14, 'Patick Dhimas', 'XI TKJ 2', ''),
(15, 'Alifia Yumna', 'XI AKL 4', ''),
(16, 'Dwi Marliana', 'XI AKL 4', ''),
(17, 'Indri Purwandari', 'XI BDP 2', ''),
(18, 'Nazril Suandana ', 'XII RPL 1', ''),
(19, 'Ramaditya Joya', 'XII RPL 1', ''),
(20, 'Adi Bayu', 'XI MM 1', ''),
(21, 'Brian Kurnia', 'XI MM 1', ''),
(22, 'Jauza Dhiyah', 'XI MM 1', ''),
(23, 'Maulidya Khairun', 'XI MM 1', ''),
(24, 'Muhammad Ivan', 'XI MM 1', ''),
(25, 'Budi Santosa', 'XII TKJ 1', ''),
(26, 'Aulia Nur Safira', 'XII PS', ''),
(27, 'Efi Pujiastuti', 'XII AKL 4', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id` int(3) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id`, `judul`, `keterangan`, `tanggal`, `foto`, `kategori`) VALUES
(2, 'alhamdulillah', 'pegada al coarzk', '2022-10-27', 'testimonials-2.jpg', 'ss'),
(3, 'dhdhd', 'dhdh', '2022-10-27', 'testimonials-4.jpg', 'dhdh'),
(4, 'bismillah', '', '2022-10-26', 'testimonials-5.jpg', 's');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gallery`
--

CREATE TABLE `tb_gallery` (
  `id` int(10) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `keterangan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gallery`
--

INSERT INTO `tb_gallery` (`id`, `foto`, `keterangan`) VALUES
(8, 'robo-1.jpg', 'juara robotik'),
(9, 'robo-2.jpg', 'juara robotik'),
(10, 'robo-3.jpg', 'juara robotik'),
(11, 'robo-4.jpg', 'kompetisi robotik'),
(12, 'robo-5.jpg', 'kegiatan robotik'),
(13, 'robo-6.jpg', 'juara robotik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id` int(10) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `jam` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id`, `hari`, `jam`) VALUES
(1, 'Sabtu', '09:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembimbing`
--

CREATE TABLE `tb_pembimbing` (
  `id` int(10) NOT NULL,
  `id_admin` int(10) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `status` varchar(25) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembimbing`
--

INSERT INTO `tb_pembimbing` (`id`, `id_admin`, `nama`, `status`, `foto`) VALUES
(33, 33, 'Rifky Nurrahman', 'Pembimbing', 'team-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengurus`
--

CREATE TABLE `tb_pengurus` (
  `id` int(10) NOT NULL,
  `id_admin` int(10) DEFAULT NULL,
  `nama` varchar(225) NOT NULL,
  `status` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_prestasi`
--

CREATE TABLE `tb_prestasi` (
  `id` int(10) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `keterangan` varchar(700) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_prestasi`
--

INSERT INTO `tb_prestasi` (`id`, `judul`, `keterangan`, `foto`) VALUES
(2, 'Juara 2 & 3 KRPY 2015', 'Tim Robotika SMK Negeri 1 Bantul memperoleh juara 2 dan 3 pada Kontes Robot Pintar Yogykarta (KRPY) yang diadakan di taman pintar pada tahun 2015', NULL),
(3, 'Juara 2 & 3 Nasional 2015', 'Pada tahun 2015 Tim Robotika SMK Negeri 1 Bantul mendapatkan juara 2 dan 3 pada kejuaraan Robotika tingkat Nasional', NULL),
(4, 'Juara 2 KRPY 2016', 'Pada tahun 2016 Tim Robotika SMK Negeri 1 Bantul memperoleh juara 2 pada Kontes Robot Pintar Yogykarta (KRPY) yang diadakan di taman pintar pada tahun 2016', NULL),
(5, 'Juara 2 Nasional 2016', 'Pada tahun 2016 Tim Robotika SMK Negeri 1 Bantul mendapatkan juara 2 pada kejuaraan Robotika tingkat Nasional', NULL),
(6, 'Juara 3 Elektro Fair Robot Sumo UNY 2017', 'Tim Robotika SMK Negeri 1 Bantul mendapatkan juara 3 pada ajang Elektro Fair Robot Sumo yang diadakan di Universitas Negeri Yogykarta (UNY) pada tahun 2017', NULL),
(7, 'Design Inovasi Robot Terbaik 2017', 'Tim Robotika SMK Negeri 1 Bantul mendapatkan penghargaan untuk Desain Inovasi Robot Terbaik pada tahun 2017', NULL),
(8, 'Juara 3 KRPY 2017', 'Tim Robotika SMK Negeri 1 Bantul memperoleh juara 3 pada Kontes Robot Pintar Yogykarta (KRPY) yang diadakan di taman pintar pada tahun 2017', NULL),
(9, 'Juara 2 KRPY 2018', 'Tim Robotika SMK Negeri 1 Bantul memperoleh juara 2 pada Kontes Robot Pintar Yogykarta (KRPY) yang diadakan di taman pintar pada tahun 2018', NULL),
(10, 'Juara 1 Lomba Roket Air 2019', 'Tim Robotika SMK Negeri 1 Bantul memperoleh juara 1 pada Lomba Roket Air BTF-TECHNO CAM pada 2019', NULL),
(11, 'Peserta Klinik Sains se-DIY 2019', 'Tim Robotika SMK Negeri 1 Bantul turut berpartisipasi dalam Klinik Sains se-DIY pada tahun 2019', NULL),
(12, 'Juara terbaik 6 Kontes Roket Air Yogyakarta 2019', 'Tim Robotika SMK Negeri 1 Bantul menjadi juara terbaik 6 pada Kontes Roket Air Yogyakarta tahun 2019', NULL),
(13, 'Juara 3 KRPY 2019', 'Tim Robotika SMK Negeri 1 Bantul memperoleh juara 3 pada Kontes Robot Pintar Yogykarta (KRPY) yang diadakan di taman pintar pada tahun 2019', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_agt`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pembimbing`
--
ALTER TABLE `tb_pembimbing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `tb_pengurus`
--
ALTER TABLE `tb_pengurus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_agt` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pembimbing`
--
ALTER TABLE `tb_pembimbing`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_pengurus`
--
ALTER TABLE `tb_pengurus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pembimbing`
--
ALTER TABLE `tb_pembimbing`
  ADD CONSTRAINT `tb_pembimbing_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`) ON DELETE CASCADE;

--
-- Constraints for table `tb_pengurus`
--
ALTER TABLE `tb_pengurus`
  ADD CONSTRAINT `tb_pengurus_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
