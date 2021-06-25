-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2020 at 09:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flossprint`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_depan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tlp` char(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `nama_depan`, `nama_belakang`, `nama_lengkap`, `email`, `email_verified_at`, `password`, `tgl_lahir`, `tlp`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'safna', 'prasetiono', 'safna prasetiono', 'safnaprasetiono71@gmail.com', NULL, '$2y$10$6FsYDPiVJMgs6bngIet3.uENTpMTyMF3fTIvfqb1LL251vn7NALwS', NULL, NULL, 'MainAdminUploadFrist.png', NULL, '2020-07-20 04:10:28', '2020-07-20 04:10:28');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id_bank` bigint(20) UNSIGNED NOT NULL,
  `nama_bank` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_rekening` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id_bank`, `nama_bank`, `deskripsi`, `nomor_rekening`, `created_at`, `updated_at`) VALUES
(1, 'BRI', 'Bank Rakyat Indonesia', '323001003855503', '2020-07-20 09:16:07', '2020-07-20 09:16:07'),
(2, 'BCA', 'Bank Central Asia', '323001003855798', '2020-07-20 09:54:22', '2020-08-06 08:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fotoproduks`
--

CREATE TABLE `fotoproduks` (
  `id_fotoproduk` bigint(20) UNSIGNED NOT NULL,
  `namafoto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fotoproduks`
--

INSERT INTO `fotoproduks` (`id_fotoproduk`, `namafoto`, `ukuran`, `lokasi`, `id_produk`) VALUES
(1, '84D5D74AC458newbalance-samping', '939251', '325C7FA85AF084D5D74AC458newbalance-samping.png', 1),
(2, '84D5D74AC458newbalance-zoom', '296425', '325C7FA85AF084D5D74AC458newbalance-zoom.png', 1),
(5, '736B2B990019adidas-samping', '264105', 'B0147A02C106736B2B990019adidas-samping.png', 3),
(13, '736B2B990019adidas-zoom', '946826', '40CA38B0CC9A736B2B990019adidas-zoom.png', 3),
(14, '853E1F6F4724nort-face-belakang', '560516', 'F333090050FB853E1F6F4724nort-face-belakang.png', 8),
(15, '853E1F6F4724nort-face-samping', '507186', 'F333090050FB853E1F6F4724nort-face-samping.png', 8),
(16, '0277BB13B24Fadidas-acm-samping', '538935', 'CB9D30C0007B0277BB13B24Fadidas-acm-samping.png', 9),
(17, '0277BB13B24Fadidas-acm-zoom', '160726', 'CB9D30C0007B0277BB13B24Fadidas-acm-zoom.png', 9),
(18, 'star_wars_2', '446957', '17693B046D65star_wars_2.png', 10),
(19, 'star_wars_3', '714969', '17693B046D65star_wars_3.png', 10),
(20, 'adidas_pink_2', '1273545', '19AA45CE8214adidas_pink_2.png', 11),
(21, 'adidas_pink_3', '1441220', '19AA45CE8214adidas_pink_3.png', 11),
(22, 'adidas_pink_4', '620244', '19AA45CE8214adidas_pink_4.png', 11),
(23, 'adidas_merah_2', '770924', '94B190A9B352adidas_merah_2.png', 12),
(24, 'adidas_merah_3', '289808', '94B190A9B352adidas_merah_3.png', 12),
(25, 'adidas_merah_4', '516889', '94B190A9B352adidas_merah_4.png', 12);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_04_29_155916_create_admins_table', 1),
(4, '2020_07_07_165755_ulasanproduk', 1),
(5, '2020_07_20_075907_create_banks_table', 1),
(6, '2020_07_20_083154_create_produks_table', 1),
(7, '2020_07_20_083421_create_fotoproduks_table', 1),
(8, '2020_07_20_085340_create_pembelians_table', 1),
(9, '2020_07_20_085423_create_pembelianproduks_table', 1),
(10, '2020_07_20_104003_create_pengiriman_table', 1),
(11, '2020_07_22_152006_create_pembayarans_table', 2),
(13, '2020_08_04_183009_create_pembelianproduksablons_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id_pembayaran` bigint(20) UNSIGNED NOT NULL,
  `penyetor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayarans`
--

INSERT INTO `pembayarans` (`id_pembayaran`, `penyetor`, `bank`, `harga`, `tanggal`, `jam`, `bukti`, `id_pembelian`) VALUES
(3, 'safna prasetiono', 'BCA', 448, '2020-07-22', '06:24:34', '2020072218243420190731124349Pembayaran_BCA.jpg', 8),
(4, 'safna prasetiono', 'BCA', 668000, '2020-07-22', '06:39:51', '2020072218395120190731124349Pembayaran_BCA.jpg', 6),
(6, 'safna prasetiono', 'MANDIRI', 537600, '2020-08-05', '05:39:09', '2020080517390920190731124349Pembayaran_BCA.jpg', 31),
(7, 'safna prasetiono', 'MANDIRI', 230400, '2020-08-05', '08:05:33', '2020080520053320190731142853tarik_tunai.jpg', 31);

-- --------------------------------------------------------

--
-- Table structure for table `pembelianproduks`
--

CREATE TABLE `pembelianproduks` (
  `id_pembelian_produk` bigint(20) UNSIGNED NOT NULL,
  `id_produk` int(11) NOT NULL,
  `namaproduk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenisproduk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuranproduk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `panjang` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `beratproduk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hargaproduk` int(11) NOT NULL,
  `totalharga` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelianproduks`
--

INSERT INTO `pembelianproduks` (`id_pembelian_produk`, `id_produk`, `namaproduk`, `jenisproduk`, `ukuranproduk`, `panjang`, `lebar`, `beratproduk`, `jumlah`, `hargaproduk`, `totalharga`, `id_pembelian`) VALUES
(1, 0, 'New balce track top black sweter', 'default', 'L', 0, 0, 600, 2, 230000, 460000, 5),
(2, 0, 'Start Wars sweater new track-top product', 'default', 'L', 0, 0, 300, 2, 200000, 400000, 6),
(3, 0, 'adidas acm 1899 track-top white jacket', 'default', 'L', 0, 0, 300, 1, 250000, 250000, 6),
(4, 1, 'New balce track top black sweter', 'sweter', 'L', 71, 60, 300, 1, 230000, 230000, 8),
(5, 10, 'Start Wars sweater new track-top product', 'sweter', 'L', 70, 60, 300, 1, 200000, 200000, 8),
(6, 1, 'New balce track top black sweter', 'sweter', 'L', 71, 60, 300, 1, 230000, 230000, 9),
(7, 11, 'adidas pink new track-top', 'jaket', 'S', 65, 54, 300, 1, 300000, 300000, 30);

-- --------------------------------------------------------

--
-- Table structure for table `pembelianproduksablons`
--

CREATE TABLE `pembelianproduksablons` (
  `id_pembelian_sablon` bigint(20) UNSIGNED NOT NULL,
  `jenisproduk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warnapakaian` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipesablon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ukuran` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `panjang` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `totalharga` int(11) NOT NULL,
  `foto_depan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_belakang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelianproduksablons`
--

INSERT INTO `pembelianproduksablons` (`id_pembelian_sablon`, `jenisproduk`, `warnapakaian`, `tipesablon`, `jumlah`, `ukuran`, `panjang`, `lebar`, `berat`, `harga`, `totalharga`, `foto_depan`, `foto_belakang`, `id_pembelian`) VALUES
(2, 'pakaian', '', 'berwarna', 8, 'L', 50, 59, 520, 75000, 600000, '20200804190436fotodepan.png', '20200804190436fotobelakang.png', 29),
(3, 'pakaian', 'sesuai desain', 'berwarna', 10, 'L', 50, 59, 650, 75000, 750000, '20200805160529fotodepan.png', '20200805160529fotobelakang.png', 31);

-- --------------------------------------------------------

--
-- Table structure for table `pembelians`
--

CREATE TABLE `pembelians` (
  `id_pembelian` bigint(20) UNSIGNED NOT NULL,
  `tipe` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelians`
--

INSERT INTO `pembelians` (`id_pembelian`, `tipe`, `harga`, `tanggal`, `status`, `id_user`, `id_bank`) VALUES
(5, 'belanja-produk', 478000, '2020-07-21', 'pending', 1, 1),
(6, 'belanja-produk', 668000, '2020-07-21', 'sudah-bayar', 1, 2),
(7, 'belanja-produk', 448000, '2020-07-22', 'pending', 1, 2),
(8, 'belanja-produk', 448000, '2020-07-22', 'dikirim', 1, 2),
(9, 'belanja-produk', 248000, '2020-07-30', 'pending', 1, 2),
(29, 'pemesanan-sablon', 618000, '2020-08-04', 'pending', 1, 2),
(30, 'belanja-produk', 318000, '2020-08-04', 'pending', 1, 2),
(31, 'pemesanan-sablon', 768000, '2020-08-05', 'dikirim', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` bigint(20) UNSIGNED NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodepos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expedisi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `layanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `resi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `provinsi`, `kota`, `alamat`, `kodepos`, `expedisi`, `layanan`, `harga`, `resi`, `id_pembelian`) VALUES
(1, 'Jawa Barat', 'Depok', 'Jln. Margonda Raya 100 Rt.09 / Rw.17 No.02', '16416', 'jne', 'YES / Yakin Esok Sampai', 18000, '', 5),
(2, 'Jawa Barat', 'Depok', 'Jln. Margonda Raya 100 Rt.09 / Rw.17 No.02', '16416', 'jne', 'YES / Yakin Esok Sampai', 18000, '', 6),
(3, 'Jawa Barat', 'Depok', 'Jln. Margonda Raya 100 Rt.09 / Rw.17 No.02', '16416', 'jne', 'YES / Yakin Esok Sampai', 18000, '0881289970316', 8),
(4, 'DKI Jakarta', 'Jakarta Pusat', 'Jln. Cempaka Putih Barat Rt.09 / Rw.17 No.02', '10540', 'jne', 'CTCYES / JNE City Courier', 18000, '', 9),
(8, 'DKI Jakarta', 'Jakarta Pusat', 'Jln. Cempaka Putih Barat Rt.09 / Rw.17 No.02', '10540', 'jne', 'CTCYES / JNE City Courier', 18000, NULL, 15),
(9, 'DKI Jakarta', 'Jakarta Pusat', 'Jln. Cempaka Putih Barat Rt.09 / Rw.17 No.02', '10540', 'jne', 'CTCYES / JNE City Courier', 18000, NULL, 16),
(10, 'DKI Jakarta', 'Jakarta Pusat', 'Jln. Cempaka Putih Barat Rt.09 / Rw.17 No.02', '10540', 'jne', 'CTCYES / JNE City Courier', 18000, NULL, 29),
(11, 'DKI Jakarta', 'Jakarta Pusat', 'Jln. Cempaka Putih Barat Rt.09 / Rw.17 No.02', '10540', 'jne', 'CTCYES / JNE City Courier', 18000, NULL, 30),
(12, 'DKI Jakarta', 'Jakarta Pusat', 'Jln. Cempaka Putih Barat Rt.09 / Rw.17 No.02', '10540', 'jne', 'CTCYES / JNE City Courier', 18000, '234567898765433', 31);

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `namaproduk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `terjual` int(11) DEFAULT NULL,
  `jenis` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `panjang` int(11) DEFAULT NULL,
  `lebar` int(11) DEFAULT NULL,
  `berat` int(11) NOT NULL,
  `samplefoto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id_produk`, `namaproduk`, `harga`, `stok`, `terjual`, `jenis`, `ukuran`, `panjang`, `lebar`, `berat`, `samplefoto`, `tanggal`, `deskripsi`) VALUES
(1, 'New balce track top black sweter', 230000, 0, 4, 'sweter', 'L', 71, 60, 300, '325C7FA85AF084D5D74AC458newbalance-depan.png', '2020-07-20', '<p>New balce track top black sweter, ready stok siap kirim se-indonesia&nbsp;produk baru ukuran tersedia hanya pada deskripsi singkat di atas. cek harga kebali karna sewaktu - waktu harga dapat berubah. pastikan anda berbelanja dengan aman dan tepat pada produk pilihan anda.</p>\r\n\r\n<p><strong>plus :</strong></p>\r\n\r\n<ul>\r\n	<li>harga murah</li>\r\n	<li>kualitas asli produk</li>\r\n	<li>siap kirim.</li>\r\n</ul>\r\n\r\n<p><strong>Minus :</strong></p>\r\n\r\n<ul>\r\n	<li>Hanya satu jenis produk</li>\r\n</ul>\r\n\r\n<p>Jika ingin membeli cek stok produk terlebih dahulu pastika produk tersedia, jika ingin bertanya tentak produk tanya pada kontak yang tersedia. kunjungin peroduk lainnya untuk mengetahui info produk terbaru&nbsp;<a href=\"http://127.0.0.1:8000/produk\">lihat semua produk</a>.</p>'),
(3, 'adidas gray with black in back track-top sweaters', 300000, 2, 0, 'sweter', 'M', 68, 57, 300, '30BEFBF9DAB0736B2B990019adidas-depan.png', '2020-07-20', '<p>Adidas gray with black in back track-top sweaters, ready stok siap kirim se-indonesia&nbsp;produk baru ukuran tersedia hanya pada deskripsi singkat di atas. cek harga kebali karna sewaktu - waktu harga dapat berubah. pastikan anda berbelanja dengan aman dan tepat pada produk pilihan anda.</p>\r\n\r\n<p><strong>plus :</strong></p>\r\n\r\n<ul>\r\n	<li>harga murah</li>\r\n	<li>kualitas asli produk</li>\r\n	<li>siap kirim.</li>\r\n</ul>\r\n\r\n<p><strong>Minus :</strong></p>\r\n\r\n<ul>\r\n	<li>Hanya satu jenis produk</li>\r\n</ul>\r\n\r\n<p>Jika ingin membeli cek stok produk terlebih dahulu pastika produk tersedia, jika ingin bertanya tentak produk tanya pada kontak yang tersedia. kunjungin peroduk lainnya untuk mengetahui info produk terbaru&nbsp;<a href=\"http://127.0.0.1:8000/produk\">lihat semua produk</a>.</p>'),
(8, 'Nort face new track-top black jacket', 240000, 4, 0, 'jaket', 'L', 70, 59, 300, 'F333090050FB853E1F6F4724nort-face-depan.png', '2020-07-20', '<p>Nort face new track-top black jacket, ready stok siap kirim se-indonesia&nbsp;produk baru ukuran tersedia hanya pada deskripsi singkat di atas. cek harga kebali karna sewaktu - waktu harga dapat berubah. pastikan anda berbelanja dengan aman dan tepat pada produk pilihan anda.</p>\r\n\r\n<p><strong>plus :</strong></p>\r\n\r\n<ul>\r\n	<li>harga murah</li>\r\n	<li>kualitas asli produk</li>\r\n	<li>siap kirim.</li>\r\n</ul>\r\n\r\n<p><strong>Minus :</strong></p>\r\n\r\n<ul>\r\n	<li>Hanya satu jenis produk</li>\r\n</ul>\r\n\r\n<p>Jika ingin membeli cek stok produk terlebih dahulu pastika produk tersedia, jika ingin bertanya tentak produk tanya pada kontak yang tersedia. kunjungin peroduk lainnya untuk mengetahui info produk terbaru&nbsp;<a href=\"http://127.0.0.1:8000/produk\">lihat semua produk</a>.</p>'),
(9, 'adidas acm 1899 track-top white jacket', 250000, 1, 1, 'jaket', 'L', 71, 60, 300, 'CB9D30C0007B0277BB13B24Fadidas-acm-depan.png', '2020-07-20', '<p>adidas acm 1899 track-top white jacket, ready stok siap kirim se-indonesia&nbsp;produk baru ukuran tersedia hanya pada deskripsi singkat di atas. cek harga kebali karna sewaktu - waktu harga dapat berubah. pastikan anda berbelanja dengan aman dan tepat pada produk pilihan anda.</p>\r\n\r\n<p><strong>plus :</strong></p>\r\n\r\n<ul>\r\n	<li>harga murah</li>\r\n	<li>kualitas asli produk</li>\r\n	<li>siap kirim.</li>\r\n</ul>\r\n\r\n<p><strong>Minus :</strong></p>\r\n\r\n<ul>\r\n	<li>Hanya satu jenis produk</li>\r\n</ul>\r\n\r\n<p>Jika ingin membeli cek stok produk terlebih dahulu pastika produk tersedia, jika ingin bertanya tentak produk tanya pada kontak yang tersedia. kunjungin peroduk lainnya untuk mengetahui info produk terbaru&nbsp;<a href=\"http://127.0.0.1:8000/produk\">lihat semua produk</a>.</p>'),
(10, 'Start Wars sweater new track-top product', 200000, 2, 3, 'sweter', 'L', 70, 60, 300, '17693B046D65star_wars_1.png', '2020-07-20', '<p>Start Wars sweater new track-top product&nbsp;, ready stok siap kirim se-indonesia&nbsp;produk baru ukuran tersedia hanya pada deskripsi singkat di atas. cek harga kebali karna sewaktu - waktu harga dapat berubah. pastikan anda berbelanja dengan aman dan tepat pada produk pilihan anda.</p>\r\n\r\n<p><strong>plus :</strong></p>\r\n\r\n<ul>\r\n	<li>harga murah</li>\r\n	<li>kualitas asli produk</li>\r\n	<li>siap kirim.</li>\r\n</ul>\r\n\r\n<p><strong>Minus :</strong></p>\r\n\r\n<ul>\r\n	<li>Hanya satu jenis produk</li>\r\n</ul>\r\n\r\n<p>Jika ingin membeli cek stok produk terlebih dahulu pastika produk tersedia, jika ingin bertanya tentak produk tanya pada kontak yang tersedia. kunjungin peroduk lainnya untuk mengetahui info produk terbaru&nbsp;<a href=\"http://127.0.0.1:8000/produk\">lihat semua produk</a>.</p>'),
(11, 'adidas pink new track-top', 300000, 1, 1, 'jaket', 'S', 65, 54, 300, '19AA45CE8214adidas_pink_1.png', '2020-07-20', '<p>adidas pink new track-top</p>\r\n\r\n<p>, ready stok siap kirim se-indonesia&nbsp;produk baru ukuran tersedia hanya pada deskripsi singkat di atas. cek harga kebali karna sewaktu - waktu harga dapat berubah. pastikan anda berbelanja dengan aman dan tepat pada produk pilihan anda.</p>\r\n\r\n<p><strong>plus :</strong></p>\r\n\r\n<ul>\r\n	<li>harga murah</li>\r\n	<li>kualitas asli produk</li>\r\n	<li>siap kirim.</li>\r\n</ul>\r\n\r\n<p><strong>Minus :</strong></p>\r\n\r\n<ul>\r\n	<li>Hanya satu jenis produk</li>\r\n</ul>\r\n\r\n<p>Jika ingin membeli cek stok produk terlebih dahulu pastika produk tersedia, jika ingin bertanya tentak produk tanya pada kontak yang tersedia. kunjungin peroduk lainnya untuk mengetahui info produk terbaru&nbsp;<a href=\"http://127.0.0.1:8000/produk\">lihat semua produk</a>.</p>'),
(12, 'adidas training red jacket new track-top', 360000, 3, 0, 'jaket', 'L', 73, 60, 300, '94B190A9B352adidas_merah_1.png', '2020-07-20', '<p>adidas training red jacket new track-top, ready stok siap kirim se-indonesia&nbsp;produk baru ukuran tersedia hanya pada deskripsi singkat di atas. cek harga kebali karna sewaktu - waktu harga dapat berubah. pastikan anda berbelanja dengan aman dan tepat pada produk pilihan anda.</p>\r\n\r\n<p><strong>plus :</strong></p>\r\n\r\n<ul>\r\n	<li>harga murah</li>\r\n	<li>kualitas asli produk</li>\r\n	<li>siap kirim.</li>\r\n</ul>\r\n\r\n<p><strong>Minus :</strong></p>\r\n\r\n<ul>\r\n	<li>Hanya satu jenis produk</li>\r\n</ul>\r\n\r\n<p>Jika ingin membeli cek stok produk terlebih dahulu pastika produk tersedia, jika ingin bertanya tentak produk tanya pada kontak yang tersedia. kunjungin peroduk lainnya untuk mengetahui info produk terbaru&nbsp;<a href=\"http://127.0.0.1:8000/produk\">lihat semua produk</a>.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `ulasanproduk`
--

CREATE TABLE `ulasanproduk` (
  `idulasan` bigint(20) UNSIGNED NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `balasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date DEFAULT NULL,
  `idproduk` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `notif` char(12) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_depan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_belakang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tlp` char(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vkey` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_depan`, `nama_belakang`, `nama_lengkap`, `email`, `email_verified_at`, `password`, `foto`, `tlp`, `tgl_lahir`, `alamat`, `vkey`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'safna', 'prasetiono', 'safna prasetiono', 'safnaprasetiono71@gmail.com', NULL, '$2y$10$8KHwsyfsXU58oJQqGJ/pKebGXuNt0prltbXYIxBIsEisJi0FftC5O', '1IMG_20190829_014327.jpg', '087778335325', '1997-06-13', 'Jln. Cempaka Putih Barat Rt.09 / Rw.17 No.02', 'DECD90', 1, NULL, '2020-07-20 08:08:22', '2020-07-30 01:25:37');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pembelians`
-- (See below for the actual view)
--
CREATE TABLE `view_pembelians` (
`id_pembelian` bigint(20) unsigned
,`harga` int(11)
,`tanggal` date
,`status` varchar(255)
,`id_user` int(11)
,`id_bank` int(11)
,`id` bigint(20) unsigned
,`nama_depan` varchar(255)
,`nama_belakang` varchar(255)
,`nama_lengkap` varchar(255)
,`email` varchar(255)
,`email_verified_at` timestamp
,`password` varchar(255)
,`foto` varchar(255)
,`tlp` char(12)
,`tgl_lahir` date
,`alamat` text
,`vkey` varchar(6)
,`active` tinyint(1)
,`remember_token` varchar(100)
,`created_at` timestamp
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pembelian_pengiriman`
-- (See below for the actual view)
--
CREATE TABLE `view_pembelian_pengiriman` (
`id_pembelian` bigint(20) unsigned
,`tipe` varchar(100)
,`harga` int(11)
,`tanggal` date
,`status` varchar(255)
,`expedisi` varchar(50)
,`layanan` varchar(255)
,`resi` varchar(255)
,`id_user` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pembelian_users`
-- (See below for the actual view)
--
CREATE TABLE `view_pembelian_users` (
`id_pembelian` bigint(20) unsigned
,`tipe` varchar(100)
,`tanggal` date
,`harga` int(11)
,`status` varchar(255)
,`id` bigint(20) unsigned
,`nama_lengkap` varchar(255)
,`email` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `view_pembelians`
--
DROP TABLE IF EXISTS `view_pembelians`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pembelians`  AS  select `pembelians`.`id_pembelian` AS `id_pembelian`,`pembelians`.`harga` AS `harga`,`pembelians`.`tanggal` AS `tanggal`,`pembelians`.`status` AS `status`,`pembelians`.`id_user` AS `id_user`,`pembelians`.`id_bank` AS `id_bank`,`users`.`id` AS `id`,`users`.`nama_depan` AS `nama_depan`,`users`.`nama_belakang` AS `nama_belakang`,`users`.`nama_lengkap` AS `nama_lengkap`,`users`.`email` AS `email`,`users`.`email_verified_at` AS `email_verified_at`,`users`.`password` AS `password`,`users`.`foto` AS `foto`,`users`.`tlp` AS `tlp`,`users`.`tgl_lahir` AS `tgl_lahir`,`users`.`alamat` AS `alamat`,`users`.`vkey` AS `vkey`,`users`.`active` AS `active`,`users`.`remember_token` AS `remember_token`,`users`.`created_at` AS `created_at`,`users`.`updated_at` AS `updated_at` from (`pembelians` join `users` on(`pembelians`.`id_user` = `users`.`id`)) where `pembelians`.`id_user` = `users`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `view_pembelian_pengiriman`
--
DROP TABLE IF EXISTS `view_pembelian_pengiriman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pembelian_pengiriman`  AS  select `pembelians`.`id_pembelian` AS `id_pembelian`,`pembelians`.`tipe` AS `tipe`,`pembelians`.`harga` AS `harga`,`pembelians`.`tanggal` AS `tanggal`,`pembelians`.`status` AS `status`,`pengiriman`.`expedisi` AS `expedisi`,`pengiriman`.`layanan` AS `layanan`,`pengiriman`.`resi` AS `resi`,`pembelians`.`id_user` AS `id_user` from ((`pembelians` join `pengiriman` on(`pembelians`.`id_pembelian` = `pengiriman`.`id_pembelian`)) join `users`) where `pembelians`.`id_user` = `users`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `view_pembelian_users`
--
DROP TABLE IF EXISTS `view_pembelian_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pembelian_users`  AS  select `pembelians`.`id_pembelian` AS `id_pembelian`,`pembelians`.`tipe` AS `tipe`,`pembelians`.`tanggal` AS `tanggal`,`pembelians`.`harga` AS `harga`,`pembelians`.`status` AS `status`,`users`.`id` AS `id`,`users`.`nama_lengkap` AS `nama_lengkap`,`users`.`email` AS `email` from (`pembelians` join `users` on(`pembelians`.`id_user` = `users`.`id`)) where `pembelians`.`id_user` = `users`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fotoproduks`
--
ALTER TABLE `fotoproduks`
  ADD PRIMARY KEY (`id_fotoproduk`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelianproduks`
--
ALTER TABLE `pembelianproduks`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `pembelianproduksablons`
--
ALTER TABLE `pembelianproduksablons`
  ADD PRIMARY KEY (`id_pembelian_sablon`);

--
-- Indexes for table `pembelians`
--
ALTER TABLE `pembelians`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `ulasanproduk`
--
ALTER TABLE `ulasanproduk`
  ADD PRIMARY KEY (`idulasan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id_bank` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fotoproduks`
--
ALTER TABLE `fotoproduks`
  MODIFY `id_fotoproduk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id_pembayaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembelianproduks`
--
ALTER TABLE `pembelianproduks`
  MODIFY `id_pembelian_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembelianproduksablons`
--
ALTER TABLE `pembelianproduksablons`
  MODIFY `id_pembelian_sablon` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembelians`
--
ALTER TABLE `pembelians`
  MODIFY `id_pembelian` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ulasanproduk`
--
ALTER TABLE `ulasanproduk`
  MODIFY `idulasan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
