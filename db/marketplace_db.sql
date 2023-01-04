-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 04, 2023 at 05:17 PM
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
-- Database: `marketplace_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `checked` tinyint(1) DEFAULT 0,
  `total_price` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(855) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `image`, `stock`) VALUES
(1, 'Meja Gaming Meja Komputer GG Gemink FLOTH FL120 - Merah', 'READY STOCK !!\r\nProduk Dijamin Baru 100%\r\n=====================\r\nMain game tidak lengkap kalau tidak ada mejanya, jangan lupakan pendukung penting dalam bermain game yaitu meja gaming. Meja Gaming FLOTH FL120 hadir dengan desain sederhana dan harga terjangkau, yang dilengkapi kaki meja metal, dengan edging PVC elegan dengan pilihan warna merah, abu-abu dan biru. Spesifikasi : - Ukuran : 120 x 60 cm - Kaki Metal 5x2.5cm - Edging PVC - High Quality Chipboard - 2x Groumet', 500000, 'assets/image/meja.png', 7),
(2, 'Baterai Lithium Sony Battery CR2032 CR 2032 CMOS Jam Komputer Laptop', '*Harga persatuan\r\n\r\nBrand: Sony\r\nModel: CR2032\r\nDiameter: 20mm\r\nThickness: 32mm\r\nVoltage: 3V\r\n\r\nCATATAN PENTING\r\n* BARANG BARU\r\n* PRODUK INI TIDAK BERGARANSI\r\n* SERTAKAN VIDEO UNBOXING DARI AWAL TERIMA BARANG SAAT MELAKUKAN KOMPLAIN, TANPA VIDEO UNBOXING KAMI TIDAK AKAN MENERIMA KEKURANGAN / KERUSAKAN\r\n* MEMBELI = SETUJU', 1700, 'assets/image/batre.png', 218),
(3, 'Mouse Geming Wireless USB Tanpa Kabel Nirkabel Bisa Di Cas Ces Charge', 'SPESIFIKASI\r\nBrand : Divipard\r\nWarna : Hitam\r\nKoneksivitas : Wireless 2.4GHz\r\nCocok digunakan : PC & Laptop\r\nModel : Q3\r\nJarak koneksi : 10m\r\nDPI : 1200-1600-2400-3200\r\n\r\nKEUNGGULAN\r\n- Silent (tidak mengeluarkan suara)\r\n- Mouse charging\r\n- Pengisian cepat\r\n- Memiliki fungsi hemat daya\r\n- 7 warna LED RGB\r\n\r\nDIMENSI\r\nDimensi produk : 14 x 9 x 4 cm\r\nDimensi packaging : 15.5 x 10 x 5.5 cm\r\n\r\nKELENGKAPAN\r\n1 x Mouse Q3\r\n1 x Kabel charge micro', 101000, 'assets/image/mouse.jpg', 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
