-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2021 at 12:46 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `IDJawaban` int(11) NOT NULL,
  `PilihanJawaban` text NOT NULL,
  `JawabanTepat` varchar(20) NOT NULL,
  `IDSoalan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`IDJawaban`, `PilihanJawaban`, `JawabanTepat`, `IDSoalan`) VALUES
(5, 'kedaulatan', '0', 3),
(6, 'rakyat', '1', 3),
(7, 'kerajaan', '0', 3),
(8, 'agama', '0', 3),
(9, 'Dewa Vishnu', '0', 4),
(10, 'Dewa Siva', '1', 4),
(11, 'Dewa Brahma', '0', 4),
(12, 'Dewa Rama', '0', 4),
(21, 'Sabah dan Sarawak', '0', 7),
(22, 'Siam', '0', 7),
(23, 'Pantai Timur Sumatera', '1', 7),
(24, 'Jawa Timur', '0', 7),
(25, 'perkahwinan', '0', 8),
(26, 'persahabatan', '0', 8),
(27, 'perdagangan', '0', 8),
(28, 'peperangan', '1', 8),
(29, 'Pembesar Empat Lipatan', '1', 9),
(30, 'Pembesar Lapan Lipatan', '0', 9),
(31, 'Pembesar Enam Belas Lipatan', '0', 9),
(32, 'Pembesar Tiga Puluh Dua Lipatan', '0', 9),
(33, 'Belanda', '0', 10),
(34, 'Perancis', '0', 10),
(35, 'British', '1', 10),
(36, 'Sepanyol', '0', 10),
(37, 'Raja James II', '0', 11),
(38, 'Raja William of Orange', '0', 11),
(39, 'Raja Louis XVI', '1', 11),
(40, 'Jean Jacques Rousseau', '0', 11),
(41, 'Menjadi negara republik', '1', 12),
(42, 'Sistem Raja Berperlembagaan diamalkan', '0', 12),
(43, 'Menjadi negara yang berpegang dengan fahaman komunis', '0', 12),
(44, 'Negara berpecah kepada dua', '0', 12),
(45, 'Dahagi', '0', 13),
(46, 'Satyagraha', '1', 13),
(47, 'Bushido', '0', 13),
(48, 'Tiga Prinsip Rakyat', '0', 13),
(49, 'Sri Lanka', '0', 14),
(50, 'Bangladesh', '0', 14),
(51, 'Nepal', '0', 14),
(52, 'Pakistan', '1', 14);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `IDPengguna` varchar(12) NOT NULL,
  `KataLaluan` varchar(10) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Jantina` varchar(10) NOT NULL,
  `Status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`IDPengguna`, `KataLaluan`, `Nama`, `Jantina`, `Status`) VALUES
('040111070092', '12345', 'Liew Yee Ching', 'Perempuan', 'Pelajar'),
('050213075580', '67894', 'Rayden Yap', 'Lelaki', 'Pelajar'),
('061123071148', '75315', 'Sofia', 'Perempuan', 'Pelajar'),
('741021075502', '01688', 'Tan Seok Cheng', 'Perempuan', 'Guru');

-- --------------------------------------------------------

--
-- Table structure for table `rekod`
--

CREATE TABLE `rekod` (
  `IDRekod` int(11) NOT NULL,
  `Tarikh` date NOT NULL,
  `TempohMasa` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Skor` varchar(5) NOT NULL,
  `Markah` varchar(5) NOT NULL,
  `Gred` varchar(5) NOT NULL,
  `IDPengguna` varchar(12) NOT NULL,
  `IDTopik` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekod`
--

INSERT INTO `rekod` (`IDRekod`, `Tarikh`, `TempohMasa`, `Skor`, `Markah`, `Gred`, `IDPengguna`, `IDTopik`) VALUES
(1, '2021-08-03', '2021-08-03 14:20:50', '2', '100', 'A', '040111070092', 1),
(2, '2021-08-04', '2021-08-03 17:14:48', '2', '100', 'A', '040111070092', 1),
(7, '2021-08-11', '2021-08-11 02:30:58', '3', '60', 'B', '061123071148', 2),
(8, '2021-08-11', '2021-08-11 02:32:05', '5', '100', 'A', '050213075580', 1),
(9, '2021-08-11', '2021-08-11 02:32:11', '0', '0', 'D', '050213075580', 1),
(10, '2021-08-11', '2021-08-11 02:33:31', '3', '60', 'B', '061123071148', 1);

-- --------------------------------------------------------

--
-- Table structure for table `soalan`
--

CREATE TABLE `soalan` (
  `IDSoalan` int(11) NOT NULL,
  `NoSoalan` int(11) NOT NULL,
  `SoalanKuiz` text NOT NULL,
  `IDTopik` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soalan`
--

INSERT INTO `soalan` (`IDSoalan`, `NoSoalan`, `SoalanKuiz`, `IDTopik`) VALUES
(3, 1, '  Ciri-ciri negara bangsa Alam Melayu terdiri daripada raja, undang-undang, wilayah pengaruh dan ______________\r\n(Buku teks m/s 4)', 1),
(4, 2, 'Raja Champa dikaitkan dengan _______________\r\n(Buku teks m/s 4)', 1),
(7, 3, 'Wilayah pengaruh Kesultanan Melayu Melaka merangkumi\r\nSemenanjung Tanah Melayu dan ________________\r\n(Buku teks m/s 7)', 1),
(8, 4, 'Wilayah taklukan adalah wilayah yang diperoleh melalui ______________.\r\n(Buku teks m/s 7)', 1),
(9, 5, 'Sistem pentadbiran Kesultanan Melayu Melaka dikenali sebagai\r\n(Buku teks m/s 8)', 1),
(10, 1, 'Revolusi Amerika 1776 merupakan penentangan orang Amerika menentang penjajahan ________________\r\n(Buku teks m/s 25)', 2),
(11, 2, 'Revolusi Perancis 1789 adalah penentangan terhadap pemerintahan autokratik\r\n(Buku teks m/s 25)', 2),
(12, 3, 'Apakah kesan Revolusi Perancis kepada negara Perancis?\r\n(Buku teks m/s 25)', 2),
(13, 4, 'Apakah pegangan yang digunakan oleh Mahatma Gandhi untukk menggerakkan nasionalisme di India?\r\n(Buku teks m/s 26)', 2),
(14, 5, 'Rancangan pembahagian India merupakan pembahagian India kepada dua buah negara iaitu India dan ______________\r\n(Buku teks m/s 26)', 2);

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

CREATE TABLE `topik` (
  `IDTopik` int(11) NOT NULL,
  `TopikKuiz` varchar(30) NOT NULL,
  `IDPengguna` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topik`
--

INSERT INTO `topik` (`IDTopik`, `TopikKuiz`, `IDPengguna`) VALUES
(1, 'Warisan Negara Bangsa', '741021075502'),
(2, 'Kebangkitan Nasionalisme', '741021075502');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`IDJawaban`),
  ADD KEY `IDSoalan` (`IDSoalan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`IDPengguna`);

--
-- Indexes for table `rekod`
--
ALTER TABLE `rekod`
  ADD PRIMARY KEY (`IDRekod`),
  ADD KEY `IDPengguna` (`IDPengguna`,`IDTopik`),
  ADD KEY `rekod_ibfk_2` (`IDTopik`);

--
-- Indexes for table `soalan`
--
ALTER TABLE `soalan`
  ADD PRIMARY KEY (`IDSoalan`),
  ADD KEY `IDTopik` (`IDTopik`);

--
-- Indexes for table `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`IDTopik`),
  ADD KEY `IDPengguna` (`IDPengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `IDJawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `rekod`
--
ALTER TABLE `rekod`
  MODIFY `IDRekod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `soalan`
--
ALTER TABLE `soalan`
  MODIFY `IDSoalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `topik`
--
ALTER TABLE `topik`
  MODIFY `IDTopik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`IDSoalan`) REFERENCES `soalan` (`IDSoalan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekod`
--
ALTER TABLE `rekod`
  ADD CONSTRAINT `rekod_ibfk_1` FOREIGN KEY (`IDPengguna`) REFERENCES `pengguna` (`IDPengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rekod_ibfk_2` FOREIGN KEY (`IDTopik`) REFERENCES `topik` (`IDTopik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soalan`
--
ALTER TABLE `soalan`
  ADD CONSTRAINT `soalan_ibfk_1` FOREIGN KEY (`IDTopik`) REFERENCES `topik` (`IDTopik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
