-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 01, 2026 at 02:05 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int NOT NULL,
  `kode_barang` varchar(10) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `harga` int DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `supplier_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `harga`, `stok`, `supplier_id`) VALUES
(1, 'BRG001', 'Minyak Goreng 2L', 35000, 50, 1),
(2, 'BRG002', 'Gula Pasir 1kg', 14000, 100, 2),
(3, 'BRG003', 'Beras Premium 5kg', 65000, 40, 3),
(4, 'BRG004', 'Telur Ayam 1kg', 28000, 60, 4),
(5, 'BRG005', 'Tepung Terigu 1kg', 12000, 80, 5),
(6, 'BRG006', 'Kecap Manis 600ml', 20000, 45, 6),
(7, 'BRG007', 'Saus Tomat 340ml', 15000, 30, 7),
(8, 'BRG008', 'Sabun Mandi Batang', 4500, 150, 8),
(9, 'BRG009', 'Pasta Gigi 190g', 11000, 90, 9),
(10, 'BRG010', 'Deterjen Bubuk 800g', 19500, 75, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jenis_kelamin`, `telp`, `alamat`) VALUES
('P001', 'Ahmad Dani', 'L', '081234567890', 'Bangkalan'),
('P002', 'Siti Aminah', 'P', '081345678901', 'Surabaya'),
('P003', 'Budi Santoso', 'L', '081567890123', 'Malang'),
('P004', 'Dewi Lestari', 'P', '081789012345', 'Madura'),
('P005', 'Eko Prasetyo', 'L', '081901234567', 'Sidoarjo'),
('P006', 'Fitri Handayani', 'P', '082112345678', 'Gresik'),
('P007', 'Gilang Ramadhan', 'L', '082334567890', 'Jakarta'),
('P008', 'Hesti Wulandari', 'P', '082556789012', 'Bandung'),
('P009', 'Irfan Hakim', 'L', '082778901234', 'Yogyakarta'),
('P010', 'Joko Anwar', 'L', '082990123456', 'Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int NOT NULL,
  `waktu_bayar` datetime DEFAULT NULL,
  `total` int DEFAULT NULL,
  `metode` enum('TUNAI','TRANSFER','EDC') DEFAULT NULL,
  `transaksi_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `waktu_bayar`, `total`, `metode`, `transaksi_id`) VALUES
(1, '2026-10-01 10:30:00', 70000, 'TUNAI', 1),
(2, '2026-10-02 11:15:00', 42000, 'TRANSFER', 2),
(3, '2026-10-03 14:20:00', 130000, 'EDC', 3),
(4, '2026-10-04 09:10:00', 56000, 'TUNAI', 4),
(5, '2026-10-05 15:45:00', 24000, 'TRANSFER', 5),
(6, '2026-10-06 16:00:00', 40000, 'TUNAI', 6),
(7, '2026-10-07 12:30:00', 30000, 'EDC', 7),
(8, '2026-10-08 13:05:00', 18000, 'TUNAI', 8),
(9, '2026-10-09 10:50:00', 22000, 'TRANSFER', 9),
(10, '2026-10-10 17:25:00', 39000, 'TUNAI', 10);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `telp`, `alamat`) VALUES
(1, 'PT. Maju Bersama', '08123456', 'Surabaya'),
(2, 'PT. Senang Sekali', '081515563', 'Bangkalan'),
(3, 'PT. Segar Segar', '0845454663', 'Surabaya'),
(4, 'PT. Berkah Jaya', '0811223344', 'Jakarta'),
(5, 'PT. Sumber Makmur', '0856789012', 'Malang'),
(6, 'PT. Cipta Karya', '0819876543', 'Sidoarjo'),
(7, 'PT. Abadi Sentosa', '0822334455', 'Bandung'),
(8, 'PT. Mitra Mandiri', '0833445566', 'Yogyakarta'),
(9, 'PT. Nusantara Sakti', '0855667788', 'Semarang'),
(10, 'PT. Sejahtera Bersama', '0877889900', 'Gresik');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int NOT NULL,
  `waktu_transaksi` date DEFAULT NULL,
  `keterangan` text,
  `total` int DEFAULT NULL,
  `pelanggan_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu_transaksi`, `keterangan`, `total`, `pelanggan_id`) VALUES
(1, '2026-10-01', 'Belanja bulanan tahap 1', 70000, 'P001'),
(2, '2026-10-02', 'Pembelian kebutuhan pokok', 42000, 'P002'),
(3, '2026-10-03', 'Belanja grosir sembako', 130000, 'P003'),
(4, '2026-10-04', 'Beli stok dapur', 56000, 'P004'),
(5, '2026-10-05', 'Keperluan harian', 24000, 'P005'),
(6, '2026-10-06', 'Belanja mingguan', 40000, 'P006'),
(7, '2026-10-07', 'Pembelian bahan kue', 30000, 'P007'),
(8, '2026-10-08', 'Belanja perlengkapan mandi', 18000, 'P008'),
(9, '2026-10-09', 'Pembersih rumah', 22000, 'P009'),
(10, '2026-10-10', 'Belanja harian lengkap', 39000, 'P010');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `transaksi_id` int NOT NULL,
  `barang_id` int NOT NULL,
  `harga` int DEFAULT NULL,
  `qty` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`transaksi_id`, `barang_id`, `harga`, `qty`) VALUES
(1, 1, 35000, 2),
(2, 2, 14000, 3),
(3, 3, 65000, 2),
(4, 4, 28000, 2),
(5, 5, 12000, 2),
(6, 6, 20000, 2),
(7, 7, 15000, 2),
(8, 8, 4500, 4),
(9, 9, 11000, 2),
(10, 10, 19500, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` tinyint NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `hp`, `level`) VALUES
(1, 'admin1', 'admin123', 'Super Admin', 'Bangkalan', '081234567811', 1),
(2, 'kasir1', 'kasir123', 'Rina Kasir', 'Surabaya', '081234567822', 2),
(3, 'kasir2', 'kasir123', 'Joko Kasir', 'Surabaya', '081234567833', 2),
(4, 'gudang1', 'gudang123', 'Andi Gudang', 'Madura', '081234567844', 3),
(5, 'owner', 'owner123', 'Bapak Pemilik', 'Jakarta', '081234567855', 1),
(6, 'staff1', 'staff123', 'Siti Staff', 'Malang', '081234567866', 3),
(7, 'kasir3', 'kasir123', 'Dewi Kasir', 'Sidoarjo', '081234567877', 2),
(8, 'gudang2', 'gudang123', 'Doni Gudang', 'Gresik', '081234567888', 3),
(9, 'kasir4', 'kasir123', 'Ani Kasir', 'Bandung', '081234567899', 2),
(10, 'admin2', 'admin123', 'Admin Backup', 'Yogyakarta', '081234567800', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`transaksi_id`,`barang_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`);

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`),
  ADD CONSTRAINT `transaksi_detail_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
