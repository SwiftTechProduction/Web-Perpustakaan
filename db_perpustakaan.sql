-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2016 at 04:10 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `kode_buku` int(10) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `stok_buku` int(10) NOT NULL,
  `kode_kategori` int(10) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul_buku`, `pengarang`, `penerbit`, `stok_buku`, `kode_kategori`, `tahun`) VALUES
(1, 'Pascal', 'Ineke', 'UKSW', 10, 1, 2002),
(2, 'C', 'Yeremia', 'UKSW', 10, 1, 2000),
(3, 'Java', 'Christine', 'UKSW', 10, 1, 2000),
(4, 'C#', 'Vyor', 'UKSW', 10, 1, 2000),
(5, 'PHP', 'Ramos', 'UKSW', 10, 1, 2000),
(6, 'Fisika', 'Dwi', 'UKSW', 10, 2, 2000),
(7, 'Kimia', 'Dwi', 'UKSW', 10, 2, 2000),
(8, 'Biologi', 'Dwi', 'UKSW', 10, 2, 2000),
(9, 'Astronomi', 'Dwi', 'UKSW', 10, 2, 2000),
(10, 'Biokimia', 'Dwi', 'UKSW', 10, 2, 2000),
(11, 'Sosiologi', 'Prapti', 'UKSW', 10, 3, 2000),
(12, 'Geografi', 'Prapti', 'UKSW', 10, 3, 2000),
(13, 'Ekonomi', 'Prapti', 'UKSW', 10, 3, 2000),
(14, 'Sejarah', 'Prapti', 'UKSW', 10, 3, 2000),
(15, 'Akutansi', 'Prapti', 'UKSW', 10, 3, 2000),
(16, 'Bahasa Indonesia', 'Bambang', 'UKSW', 10, 4, 2000),
(17, 'Bahasa Inggis', 'Bambang', 'UKSW', 10, 4, 2000),
(18, 'Bahasa Jawa', 'Bambang', 'UKSW', 10, 4, 2000),
(19, 'Bahasa Jepang', 'Bambang', 'UKSW', 10, 4, 2000),
(21, 'Bahasa Perancis', 'Bambang', 'UKSW', 10, 4, 2000),
(22, 'Bungau', 'Tangkai', 'Daun', 10, 2, 1999);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` int(10) NOT NULL,
  `kategori_buku` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `kategori_buku`) VALUES
(1, 'Pemrograman'),
(2, 'Ilmu Alam'),
(3, 'Ilmu Sosial'),
(4, 'Bahasa');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `kode_buku` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `kode_peminjaman` int(10) NOT NULL,
  `kode_buku` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `kode_transaksi` int(10) NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`kode_peminjaman`, `kode_buku`, `qty`, `kode_transaksi`, `tgl_kembali`) VALUES
(23, 8, 0, 1, '2016-11-27'),
(24, 1, 0, 1, '2016-11-27'),
(25, 14, 0, 1, '2016-11-27'),
(26, 21, 0, 1, '2016-11-27'),
(27, 2, 0, 1, '2016-11-27'),
(28, 18, 0, 2, '2016-11-27'),
(29, 2, 0, 2, '2016-11-27'),
(30, 7, 0, 2, '2016-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` int(10) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `jumlah_buku` int(10) NOT NULL,
  `denda` int(10) NOT NULL,
  `status` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `tanggal_pinjam`, `tanggal_kembali`, `jumlah_buku`, `denda`, `status`, `username`) VALUES
(1, '2016-11-27', '2016-12-07', 0, 0, 'Sudah Selesai', 'yoko'),
(2, '2016-11-27', '2016-12-07', 0, 0, 'Sudah Selesai', 'bimby');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `status`) VALUES
('angga', 'fti', 'admin'),
('bimby', 'yyy', 'user'),
('yoko', 'uuu', 'user'),
('yusdi', 'yyy', 'pegawai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`),
  ADD KEY `kode_kategori` (`kode_kategori`),
  ADD KEY `kode_kategori_2` (`kode_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`kode_peminjaman`),
  ADD KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `kode_buku` (`kode_buku`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `kode_buku` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kode_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `kode_peminjaman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kode_kategori`) REFERENCES `kategori` (`kode_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`kode_transaksi`) REFERENCES `transaksi` (`kode_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`kode_buku`) REFERENCES `buku` (`kode_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
