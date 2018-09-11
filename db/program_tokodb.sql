-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2014 at 03:46 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `program_tokodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kd_barang` char(5) NOT NULL,
  `nm_barang` varchar(100) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `stok` int(10) NOT NULL,
  `kd_kategori` char(3) NOT NULL,
  PRIMARY KEY (`kd_barang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `nm_barang`, `satuan`, `keterangan`, `harga_beli`, `harga_jual`, `stok`, `kd_kategori`) VALUES
('B0001', 'Flashdisk Kingston 2gb DT3', 'Unit', 'Flasdisk', 82000, 90000, 13, 'K01'),
('B0002', 'Flashdisk Kingston 4gb DT3', 'Unit', 'Flasdisk', 98000, 110000, 19, 'K01'),
('B0003', 'Flashdisk Kingston 8gb DT3', 'Unit', 'Flasdisk', 139000, 145000, 20, 'K01'),
('B0004', 'Flashdisk Vision Slim 4Gb', 'Unit', 'Flasdisk', 83000, 95000, 8, 'K01'),
('B0005', 'HITACHI 500 GB 7200 Rpm SATA', 'Unit', 'Hardisk', 660000, 720000, 4, 'K02'),
('B0006', 'HITACHI 1TB 7200 Rpm SATA', 'Unit', 'Hardisk', 1235000, 1325000, 5, 'K02'),
('B0007', 'Keyboard Classic K100 PS2 + Mouse', 'Unit', 'Keyboard Lengkap', 120000, 135000, 10, 'K08'),
('B0008', 'Keyboard + Mouse Wireless FC8033', 'Unit', 'Keyboard lengkap', 150000, 170000, 10, 'K08'),
('B0009', 'Keyboard ITECH Standar PS/2', 'Unit', 'Keyboard lengkap', 42000, 55000, 10, 'K08'),
('B0010', 'Keyboard ITECH USB', 'Unit', 'Keyboard lengkap', 51000, 60000, 10, 'K08'),
('B0011', 'Keyboard Numerik Flexible USB', 'Unit', 'Keyboard lengkap', 58000, 70000, 10, 'K08'),
('B0012', 'i-rock KR-6170', 'Unit', 'Keyboard lengkap', 184000, 200000, 10, 'K08'),
('B0013', 'i-rock KR-6310', 'Unit', 'Keyboard lengkap', 180000, 194000, 10, 'K08'),
('B0014', 'i-rock KR-6431', 'Unit', 'Keyboard lengkap', 186000, 200000, 10, 'K08'),
('B0015', 'Keyboard MTECH Standar USB', 'Unit', 'Keyboard lengkap', 52000, 62000, 10, 'K08');

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE IF NOT EXISTS `kasir` (
  `kd_kasir` char(3) NOT NULL,
  `nm_kasir` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`kd_kasir`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`kd_kasir`, `nm_kasir`, `username`, `password`) VALUES
('K01', 'Bunafit Nugroho', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
('K02', 'Septi Suhesti Oye', 'septi', 'd58d8a16aa666d48fbcc30bd3217fb17');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kd_kategori` char(3) NOT NULL,
  `nm_kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_kategori`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kd_kategori`, `nm_kategori`) VALUES
('K01', 'Flash Disk'),
('K02', 'Hardisk'),
('K03', 'Monitor'),
('K04', 'Cashing'),
('K05', 'Motherboard'),
('K06', 'RAM'),
('K07', 'VGA'),
('K08', 'Keyboard'),
('K09', 'Mouse'),
('K10', 'Printer');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `no_pembelian` char(7) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kd_supplier` char(4) NOT NULL,
  PRIMARY KEY (`no_pembelian`),
  KEY `kd_supplier` (`kd_supplier`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`no_pembelian`, `tgl_pembelian`, `keterangan`, `kd_supplier`) VALUES
('BL00001', '2014-09-18', 'Belanja', 'S002'),
('BL00002', '2014-09-18', 'Belanja Stok', 'S001'),
('BL00003', '2014-09-18', 'Belanja Stok Keyboard', 'S003'),
('BL00004', '2014-10-03', 'Belanja Stok', 'S001'),
('BL00005', '2014-10-08', 'belanja stok', 'S001');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_item`
--

CREATE TABLE IF NOT EXISTS `pembelian_item` (
  `no_pembelian` char(7) NOT NULL,
  `kd_barang` char(5) NOT NULL,
  `harga` int(12) NOT NULL,
  `jumlah` int(3) NOT NULL,
  KEY `no_pembelian` (`no_pembelian`,`kd_barang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_item`
--

INSERT INTO `pembelian_item` (`no_pembelian`, `kd_barang`, `harga`, `jumlah`) VALUES
('BL00001', 'B0001', 82000, 10),
('BL00001', 'B0002', 98000, 10),
('BL00001', 'B0003', 139000, 10),
('BL00001', 'B0004', 83000, 10),
('BL00002', 'B0005', 660000, 5),
('BL00002', 'B0006', 1235000, 5),
('BL00003', 'B0007', 120000, 10),
('BL00003', 'B0008', 150000, 10),
('BL00003', 'B0009', 42000, 10),
('BL00003', 'B0010', 51000, 10),
('BL00003', 'B0011', 58000, 10),
('BL00003', 'B0012', 184000, 10),
('BL00003', 'B0013', 180000, 10),
('BL00003', 'B0014', 186000, 10),
('BL00003', 'B0015', 51000, 10),
('BL00004', 'B0002', 98000, 5),
('BL00004', 'B0001', 82000, 5),
('BL00005', 'B0002', 98000, 5),
('BL00005', 'B0003', 139000, 5),
('BL00005', 'B0003', 139000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `no_penjualan` char(7) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `pelanggan` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `uang_bayar` int(12) NOT NULL,
  PRIMARY KEY (`no_penjualan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`no_penjualan`, `tgl_penjualan`, `pelanggan`, `keterangan`, `uang_bayar`) VALUES
('JL00001', '2014-09-18', 'Pelanggan', '', 100000),
('JL00002', '2014-09-18', 'Fitria Prasetiawati', 'Belanja', 150000),
('JL00003', '2014-10-06', 'Fitria Prasetiawati', 'Penjualan Ritel', 800000),
('JL00004', '2014-10-08', 'Pelanggan', '', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_item`
--

CREATE TABLE IF NOT EXISTS `penjualan_item` (
  `no_penjualan` char(7) NOT NULL,
  `kd_barang` char(5) NOT NULL,
  `harga` int(12) NOT NULL,
  `jumlah` int(4) NOT NULL,
  KEY `nomor_penjualan_tamu` (`no_penjualan`,`kd_barang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_item`
--

INSERT INTO `penjualan_item` (`no_penjualan`, `kd_barang`, `harga`, `jumlah`) VALUES
('JL00001', 'B0001', 90000, 1),
('JL00002', 'B0002', 110000, 1),
('JL00003', 'B0005', 700000, 1),
('JL00003', 'B0001', 90000, 1),
('JL00004', 'B0004', 95000, 1),
('JL00004', 'B0004', 95000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `kd_supplier` char(4) NOT NULL,
  `nm_supplier` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  PRIMARY KEY (`kd_supplier`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kd_supplier`, `nm_supplier`, `alamat`, `no_telepon`) VALUES
('S001', 'PT. ASTRINDO INDONESIA', 'Jl. Pleret, Blok O, Yogyakarta', '0274-561881'),
('S002', 'CV. PUTRA JAYA TEMON', 'Jl. Wates, Km 123, Yogyakarta', '0274-561881'),
('S003', 'PT. ASUS INDONESIA', 'Jl. Magelang, 111, Yogyakarta', '08191111123'),
('S004', 'CV. MITRA GAMA KOMPUTER', 'Jl. Janti, Karang Jambe, Yogyakarta', '0815311112222');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_pembelian`
--

CREATE TABLE IF NOT EXISTS `tmp_pembelian` (
  `kd_barang` char(5) NOT NULL,
  `harga` int(12) NOT NULL,
  `jumlah` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_penjualan`
--

CREATE TABLE IF NOT EXISTS `tmp_penjualan` (
  `kd_barang` char(5) NOT NULL,
  `harga` int(12) NOT NULL,
  `jumlah` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
