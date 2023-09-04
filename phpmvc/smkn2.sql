-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 04 Sep 2023 pada 11.02
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smkn2`
--
CREATE DATABASE IF NOT EXISTS `smkn2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `smkn2`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `idBlog` int(20) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `idGuru` int(20) NOT NULL,
  `nmGuru` varchar(60) NOT NULL,
  `idJurusan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`idGuru`, `nmGuru`, `idJurusan`) VALUES
(1, 'Drs. ENDRO SUPRIYONO', 2),
(2, 'Drs. DJOKO TRIHANTOKO, M.MPd', 7),
(4, 'LENY NURWAHYUNI AZIZAH, S.Pd', 3),
(5, 'EVI RETNANINGSIH, S.Pd', 5),
(6, 'Drs. ASBANDI', 6),
(7, 'HERY WAHYU DWIANTORO, S.T', 4),
(9, 'IVANS ZUWANTA, S.Kom', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `idJurusan` int(20) NOT NULL,
  `nmJurusan` varchar(255) NOT NULL,
  `DetailJurusan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`idJurusan`, `nmJurusan`, `DetailJurusan`) VALUES
(1, 'Rekayasa Perangkat Lunak', 'Rekayasa Perangkat Lunak adalah satu bidang profesi yang mendalami cara-cara pengembangan perangkat lunak termasuk pembuatan, pemeliharaan, manajemen organisasi pengembangan perangkat lunak dan manajemen kualitas.'),
(2, 'Desain Pemodelan dan Informasi Bangunan', 'Arsitektur (Desain Pemodelan dan Informasi Bangunan) adalah jurusan yang mempelajari tentang perencanaan bangunan, pelaksanaan pembuatan gedung, dan perbaikan gedung.'),
(3, 'Teknik Pemanasan,Tata Udara dan Pendinginan', 'Teknik Pemanasan, Tata Udara dan Pendinginan adalah suatu konsentrasi keahlian teknik Ketenagalistrikan yang menerapkan sistem pengajaran yang mengarah ke bidang pemasangan, perawatan dan perbaikan AC dan mesin pendingin serta pemanas ruangan baik skala domestik maupun skala industri.'),
(4, 'Teknik Pengelasan', 'Pengelasan (welding) adalah salah satu teknik penyambungan logam dengan cara mencairkan sebagian logam induk dan logam pengisi dengan atau tanpa tekanan dan dengan atau tanpa logam penambah dan menghasilkan sambungan yang kontinu.'),
(5, 'Kuliner/Tata Boga', 'Tata boga adalah salah satu disiplin ilmu pengelolaan masakan yang mempelajari teknik penyajian makanan dan minuman dengan memperhatikan estetika, kualitas rasa dan keutuhan nutrisi. Bidang ini mencakup bagaimana makanan dan minuman disiapkan menjadi sebuah hidangan regional dan nasional.'),
(6, 'Akuntansi', 'Akuntansi mengajarkan konsep dan teknik untuk mengukur, menganalisis, dan melaporkan keuangan sebuah perusahaan atau organisasi. Dalam artikel ini, akan dibahas secara lebih detail tentang apa itu akuntansi, apa yang dipelajari di jurusan akuntansi, serta peluang karir di bidang akuntansi.'),
(7, 'Teknik Konstruksi dan Perumahan', 'Konstruksi dan perumahan merupakan kegiatan yang berhubungan dengan pembangunan perumahan, mulai dari perencanaan, pelaksanaan, dan evaluasi kegiatan konstruksi. Dua unsur tersebut merupakan satu kesatuan dalam menciptakan hunian yang nyaman bagi penghuninya.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `idSiswa` int(8) NOT NULL,
  `nmSiswa` varchar(60) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jenis_kelamin` char(10) DEFAULT NULL,
  `idJurusan` int(10) DEFAULT NULL,
  `hpSiswa` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`idSiswa`, `nmSiswa`, `alamat`, `jenis_kelamin`, `idJurusan`, `hpSiswa`) VALUES
(5, 'Reza Arab Utara', 'kecamatan mekah', 'laki-laki', 1, 814357946),
(6, 'Wildan Gerigi 5', 'kecamatan wano', 'laki-laki', 3, 826783847),
(7, 'Remas Sogyo mogyo', 'kecamatan land of dawn', 'perempuan', 4, 8563579),
(10, 'Rusdi The Manslayer', 'ngawi', 'laki-laki', 1, NULL),
(11, 'Farhan Mie Goreng', 'kecataman ngawi selatan', 'laki-laki', 5, NULL),
(12, 'Bambang Blade of Despair', 'kecamatan land of dawn', 'laki-laki', 5, NULL),
(14, 'Jhon China', 'tiongkok', 'laki-laki', 2, NULL),
(15, 'Budi Batu Alam Abad 21', 'kecamatan wano', 'laki-laki', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`idBlog`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`idGuru`),
  ADD KEY `idJurusan` (`idJurusan`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`idJurusan`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idSiswa`),
  ADD KEY `FK_kelas` (`idJurusan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `idBlog` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `idGuru` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `idJurusan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idSiswa` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`idJurusan`) REFERENCES `jurusan` (`idJurusan`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `FK_kelas` FOREIGN KEY (`idJurusan`) REFERENCES `jurusan` (`idJurusan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
