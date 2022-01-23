-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 04:01 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_co-inter`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(50) NOT NULL,
  `id_user` int(50) NOT NULL,
  `nama_pemosting` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_user`, `nama_pemosting`, `judul`, `tanggal`, `gambar`, `deskripsi`) VALUES
(1, 15, 'Agus', 'Tips mengonsumsi nanas muda saat tahun baru', '2022-01-29', 'img/nasgor.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
(2, 15, 'Agus', 'Surat Kecil Untuk Bapak', '2022-01-20', 'img/boba.png', 'Boba enak sekali uwaw adidaw mantap jiwa nihonn mantapu menante ga enak. enakan kopi kapal api.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_forum`
--

CREATE TABLE `tb_forum` (
  `id_forum` int(30) NOT NULL,
  `id_user` int(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `topik` varchar(100) NOT NULL,
  `deksripi` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_forum`
--

INSERT INTO `tb_forum` (`id_forum`, `id_user`, `nama_user`, `topik`, `deksripi`, `tanggal`) VALUES
(1, 15, 'Agus', 'Jaga ronda', 'Agus jarang jaga ronda, kerjaanya maraton one piece', '2022-01-04'),
(2, 15, 'Jamal', 'Nobar', 'Gasken Nobar bersama bapak jamal dan bayu', '2022-01-05'),
(3, 15, 'Jamal', 'Nobar D Academy', 'Lorem ipsum dolor sit atmet', '2022-01-20'),
(4, 15, 'Jamal', 'Nobar take me out\r\n', 'mantap take me out biro jodoh', '2022-01-25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id_forum` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_komentar`
--

INSERT INTO `tb_komentar` (`id_forum`, `id_user`, `komentar`, `tanggal`) VALUES
(2, 15, 'Hahahaha nais', '2022-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(100) NOT NULL,
  `role` int(10) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `role`, `nik`, `nama`, `email`, `image`, `password`) VALUES
(15, 0, '12345', 'Agus', 'koala007@gmail.com', 'Happy Spring 2 1.png', '12345'),
(16, 1, '12345678', 'fathaya', 'fathayaa@gmail.com', '', '12345'),
(36, 0, '13021', 'ahmad', 'ahmad@gmail.com', 'boba.png', '112');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `fk_user` (`id_user`);

--
-- Indexes for table `tb_forum`
--
ALTER TABLE `tb_forum`
  ADD PRIMARY KEY (`id_forum`),
  ADD KEY `fk_forum` (`id_user`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD KEY `fk_user_komentar` (`id_user`),
  ADD KEY `fk_forum_komentar` (`id_forum`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_forum`
--
ALTER TABLE `tb_forum`
  MODIFY `id_forum` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`);

--
-- Constraints for table `tb_forum`
--
ALTER TABLE `tb_forum`
  ADD CONSTRAINT `fk_forum` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`);

--
-- Constraints for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD CONSTRAINT `fk_forum_komentar` FOREIGN KEY (`id_forum`) REFERENCES `tb_forum` (`id_forum`),
  ADD CONSTRAINT `fk_user_komentar` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
