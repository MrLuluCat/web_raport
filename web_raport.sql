-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 04:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_raport`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang_studi`
--

CREATE TABLE `bidang_studi` (
  `id_bidang_studi` int(11) NOT NULL,
  `nama_bidang_studi` varchar(100) DEFAULT NULL,
  `id_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id_catatan` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_wali_kelas` int(11) NOT NULL,
  `catatan_wali_kelas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id_grade` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_bidang_studi` int(11) DEFAULT NULL,
  `kuis_1` decimal(4,2) DEFAULT NULL,
  `kuis_2` decimal(4,2) DEFAULT NULL,
  `kuis_3` decimal(4,2) DEFAULT NULL,
  `kuis_4` decimal(4,2) DEFAULT NULL,
  `tugas_1` decimal(4,2) DEFAULT NULL,
  `tugas_2` decimal(4,2) DEFAULT NULL,
  `tugas_3` decimal(4,2) DEFAULT NULL,
  `tugas_4` decimal(4,2) DEFAULT NULL,
  `ulangan_harian_1` decimal(4,2) DEFAULT NULL,
  `ulangan_harian_remedial_1` decimal(4,2) DEFAULT NULL,
  `ulangan_harian_2` decimal(4,2) DEFAULT NULL,
  `ulangan_harian_remedial_2` decimal(4,2) DEFAULT NULL,
  `pr_1` decimal(4,2) DEFAULT NULL,
  `pr_2` decimal(4,2) DEFAULT NULL,
  `nilai_uts` decimal(4,2) DEFAULT NULL,
  `remedial_uts` decimal(4,2) DEFAULT NULL,
  `nilai_uas` decimal(4,2) DEFAULT NULL,
  `remedial_uas` decimal(4,2) DEFAULT NULL,
  `nilai_raport` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `nama_guru` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nomor_telepon` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `tingkat_kelas` enum('7','8','9') DEFAULT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `tingkat_kelas`, `nama_kelas`) VALUES
(1, '7', 'Hasyim Ashari'),
(4, '7', 'Ahmad Dahlan'),
(5, '7', 'Wahid Hasyim'),
(6, '8', 'Pattimura');

-- --------------------------------------------------------

--
-- Table structure for table `ketidakhadiran`
--

CREATE TABLE `ketidakhadiran` (
  `id_ketidakhadiran` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `sakit` int(11) DEFAULT NULL,
  `izin` int(11) DEFAULT NULL,
  `alpha` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `raport`
--

CREATE TABLE `raport` (
  `id_raport` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tahun_pengajaran` varchar(10) DEFAULT NULL,
  `semester` varchar(20) DEFAULT NULL,
  `id_grade` int(11) DEFAULT NULL,
  `id_ketidakhadiran` int(11) DEFAULT NULL,
  `id_wali_kelas` int(11) DEFAULT NULL,
  `id_catatan` int(11) DEFAULT NULL,
  `tempat_terbit` varchar(100) DEFAULT NULL,
  `tanggal_terbit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `NISN` varchar(20) DEFAULT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nomor_telepon` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `NISN`, `nama_siswa`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `nomor_telepon`, `email`) VALUES
(1, '2111500209', 'billie', 'Laki-laki', '2002-04-18', 'Puri Kartika 2 Indah permai', '081288085618', 'billie11@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'admin'),
(2, '2111500209', '706604c72ef7d12063459a00a780214de63e1f4a11d5714201215359eb5b02f5', 'siswa'),
(5, '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `id_wali_kelas` int(11) NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang_studi`
--
ALTER TABLE `bidang_studi`
  ADD PRIMARY KEY (`id_bidang_studi`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_catatan`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `catatan_ibfk_2` (`id_wali_kelas`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id_grade`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_bidang_studi` (`id_bidang_studi`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `ketidakhadiran`
--
ALTER TABLE `ketidakhadiran`
  ADD PRIMARY KEY (`id_ketidakhadiran`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `raport`
--
ALTER TABLE `raport`
  ADD PRIMARY KEY (`id_raport`),
  ADD KEY `fk_raport_siswa` (`id_siswa`),
  ADD KEY `fk_raport_kelas` (`id_kelas`),
  ADD KEY `fk_raport_grade` (`id_grade`),
  ADD KEY `fk_raport_ketidakhadiran` (`id_ketidakhadiran`),
  ADD KEY `fk_raport_wali_kelas` (`id_wali_kelas`),
  ADD KEY `fk_raport_catatan` (`id_catatan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`id_wali_kelas`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang_studi`
--
ALTER TABLE `bidang_studi`
  MODIFY `id_bidang_studi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id_grade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ketidakhadiran`
--
ALTER TABLE `ketidakhadiran`
  MODIFY `id_ketidakhadiran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `id_wali_kelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bidang_studi`
--
ALTER TABLE `bidang_studi`
  ADD CONSTRAINT `id_guru` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`);

--
-- Constraints for table `catatan`
--
ALTER TABLE `catatan`
  ADD CONSTRAINT `catatan_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `catatan_ibfk_2` FOREIGN KEY (`id_wali_kelas`) REFERENCES `wali_kelas` (`id_wali_kelas`);

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `grade_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `grade_ibfk_3` FOREIGN KEY (`id_bidang_studi`) REFERENCES `bidang_studi` (`id_bidang_studi`);

--
-- Constraints for table `ketidakhadiran`
--
ALTER TABLE `ketidakhadiran`
  ADD CONSTRAINT `ketidakhadiran_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `raport`
--
ALTER TABLE `raport`
  ADD CONSTRAINT `fk_raport_catatan` FOREIGN KEY (`id_catatan`) REFERENCES `catatan` (`id_catatan`),
  ADD CONSTRAINT `fk_raport_grade` FOREIGN KEY (`id_grade`) REFERENCES `grade` (`id_grade`),
  ADD CONSTRAINT `fk_raport_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `fk_raport_ketidakhadiran` FOREIGN KEY (`id_ketidakhadiran`) REFERENCES `ketidakhadiran` (`id_ketidakhadiran`),
  ADD CONSTRAINT `fk_raport_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `fk_raport_wali_kelas` FOREIGN KEY (`id_wali_kelas`) REFERENCES `wali_kelas` (`id_wali_kelas`);

--
-- Constraints for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD CONSTRAINT `wali_kelas_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`),
  ADD CONSTRAINT `wali_kelas_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
