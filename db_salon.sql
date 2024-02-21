-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 09:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_salon`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_absensi`
--

CREATE TABLE `data_absensi` (
  `id_absensi` int(11) NOT NULL,
  `bulan` varchar(200) NOT NULL,
  `nik` varchar(80) NOT NULL,
  `nama_karyawan` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `hadir` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `alfa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_absensi`
--

INSERT INTO `data_absensi` (`id_absensi`, `bulan`, `nik`, `nama_karyawan`, `jenis_kelamin`, `nama_jabatan`, `hadir`, `sakit`, `alfa`) VALUES
(1, '042023', '11220152', 'Reza', 'Laki-laki', 'Admin', 20, 1, 1),
(2, '042023', '11211234', 'Nabila', 'perempuan', 'Admin', 19, 2, 2),
(3, '012020', '11211234', 'Nabila', 'perempuan', 'Admin', 20, 1, 1),
(4, '012020', '11220152', 'Reza', 'Laki-laki', 'Admin', 21, 0, 1),
(5, '042023', '112238974', 'Ade Kusna', 'Laki-laki', 'IT', 19, 2, 1),
(6, '052023', '112238974', 'Ade Kusna', 'Laki-laki', 'IT', 20, 2, 2),
(12, '052023', '11211234', 'Nabila', 'perempuan', 'Admin', 20, 2, 2),
(13, '052023', '11220152', 'Reza', 'Laki-laki', 'Admin', 19, 1, 3),
(17, '012020', '112238974', 'Ade Kusna', 'Laki-laki', 'Therapist', 20, 2, 1),
(18, '102023', '12210667', 'Ade Kusna Eka S', 'Laki-laki', 'Therapist', 18, 1, 1),
(19, '102023', '12210226', 'Lutviyani', 'perempuan', 'Therapist', 19, 1, 0),
(20, '102023', '12210714', 'Putri Nabila', 'perempuan', 'Therapist', 17, 2, 1),
(21, '102023', '12210236', 'Reza', 'Laki-laki', 'Admin', 18, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_izin`
--

CREATE TABLE `data_izin` (
  `id_izin` int(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `ket` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_izin`
--

INSERT INTO `data_izin` (`id_izin`, `nama_karyawan`, `tanggal`, `ket`, `status`) VALUES
(9, 'Ade Kusna', '2023-05-23', 'urusan keluarga', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_jabatan`
--

CREATE TABLE `data_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `gaji_pokok` varchar(200) NOT NULL,
  `uang_makan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_jabatan`
--

INSERT INTO `data_jabatan` (`id_jabatan`, `nama_jabatan`, `gaji_pokok`, `uang_makan`) VALUES
(1, 'Admin', '1200000', '400000'),
(4, 'Therapist', '1200000', '400000');

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama_karyawan` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(400) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `username`, `password`, `tgl_lahir`, `alamat`, `jenis_kelamin`, `nama_jabatan`, `photo`, `hak_akses`) VALUES
(1, '12210236', 'Reza', 'reza', '202cb962ac59075b964b07152d234b70', '2003-01-06', 'karawang', 'Laki-laki', 'Admin', 'reza.png', 1),
(12, '12210667', 'Ade Kusna Eka S', 'ade', '202cb962ac59075b964b07152d234b70', '1999-06-15', 'Telukjambe', 'Laki-laki', 'Therapist', 'WhatsApp_Image_2023-06-06_at_21_47_25.jpeg', 2),
(13, '12210226', 'Lutviyani', 'lutviyani', '202cb962ac59075b964b07152d234b70', '2002-11-18', 'Karawang', 'perempuan', 'Therapist', 'WhatsApp_Image_2023-06-06_at_21_45_54.jpeg', 2),
(14, '12210714', 'Putri Nabila', 'putri', '202cb962ac59075b964b07152d234b70', '2002-06-17', 'Karangpawitan', 'perempuan', 'Therapist', 'WhatsApp_Image_2023-06-06_at_21_46_06.jpeg', 2),
(15, '12200976', 'Dini Dian A', 'dini', '202cb962ac59075b964b07152d234b70', '2001-06-12', 'Johar', 'perempuan', 'Therapist', 'WhatsApp_Image_2023-06-06_at_21_46_05.jpeg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_member`
--

CREATE TABLE `data_member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `hak_akses` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_member`
--

INSERT INTO `data_member` (`id_member`, `nama`, `email`, `password`, `no_hp`, `alamat`, `hak_akses`, `is_active`) VALUES
(21, 'Reza Aditya Pratama', 'aditp8741@gmail.com', '$2y$10$MQENQ1bjHHZjoQJB41hC4.zudb3JGLoyGC0LxNNDv8e0Wlif9tjlG', '08975836988', 'Klari', 3, 1),
(25, 'adit', 'rezaditpratama12@gmail.com', '$2y$10$usbG7Pxiq8aR/4abUy3Rlu3UhMlE4jTNgoVA07FFO9hOjOdEZv5ty', '081567856435', 'klari', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_treatment`
--

CREATE TABLE `data_treatment` (
  `id_treatment` int(11) NOT NULL,
  `nama_treatment` varchar(200) NOT NULL,
  `harga` varchar(200) NOT NULL,
  `tipe` varchar(120) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `deskripsi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_treatment`
--

INSERT INTO `data_treatment` (`id_treatment`, `nama_treatment`, `harga`, `tipe`, `photo`, `deskripsi`) VALUES
(5, 'Full Body Massage', '350000', 'Marthatilaar', 'fullbody.jfif', 'Full body massage adalah pijat tubuh yang tidak asing bagi dewavers. Teknik pemijatan tradisional dilakukan secara turun temurun diberbagai negara. Ternyata treatment full body massage punya banyak manfaat bagi tubuh, serta pikiran menjadi segar kembali.'),
(6, 'Full Body Massage', '325000', 'Angelina', 'fullbody2.jfif', 'Full body massage adalah pijat tubuh yang tidak asing bagi dewavers. Teknik pemijatan tradisional dilakukan secara turun temurun diberbagai negara. Ternyata treatment full body massage punya banyak manfaat bagi tubuh, serta pikiran menjadi segar kembali.'),
(7, 'Creambath Long Hair', '195000', 'Loreal', 'creambath.jfif', 'Creambath adalah salah satu proses perawatan rambut yang sudah dikenal sejak lama oleh banyak orang. Proses utamanya adalah mengoleskan krim pada kulit kepala dan rambut secara merata lalu mendiamkannya selama beberapa saat.'),
(8, 'Creambath Long Hair', '170000', 'Angelina', 'creambath2.jfif', 'Creambath adalah salah satu proses perawatan rambut yang sudah dikenal sejak lama oleh banyak orang. Proses utamanya adalah mengoleskan krim pada kulit kepala dan rambut secara merata lalu mendiamkannya selama beberapa saat.'),
(9, 'Creambath Short Hair', '125000', 'Loreal', 'bathshort.jpg', 'Creambath adalah salah satu proses perawatan rambut yang sudah dikenal sejak lama oleh banyak orang. Proses utamanya adalah mengoleskan krim pada kulit kepala dan rambut secara merata lalu mendiamkannya selama beberapa saat.'),
(10, 'Creambath Short Hair', '100000', 'Angelina', 'bathshort2.jpg', 'Creambath adalah salah satu proses perawatan rambut yang sudah dikenal sejak lama oleh banyak orang. Proses utamanya adalah mengoleskan krim pada kulit kepala dan rambut secara merata lalu mendiamkannya selama beberapa saat.'),
(11, 'Manicure', '135000', '', 'manicure.jpg', 'Manicure adalah serangkaian perawatan yang bertujuan untuk membersihkan dan mempercantik kuku jari tangan dan kulit di sekitarnya'),
(12, 'Pedicure', '175000', '', 'pedicure.jfif', 'pedicure adalah perawatan terhadap kuku jari kaki.'),
(13, 'Nail Art', '35000', '', 'nail.jpg', 'Nail Art adalah seni dalam menghias kuku sehingga kuku terlihat lebih manis dan cantik. Aplikasi nail art dapat menambah rasa percaya diri dan menambah keindahan kuku dengan perpaduan berbagai warna.'),
(14, 'Body Mask', '257000', 'Marthatilaar', 'bodymask.jpg', 'Masker tubuh atau body mask sangat berbeda dengan lulur. Masker tubuh memberi nutrisi bagi kulit dan tubuh yang berfungsi sebagai pemutih (whitenting) dan pelembap kulit kering.'),
(15, 'Body Mask', '240000', 'Angelina', 'bodymask2.jpg', 'Masker tubuh atau body mask sangat berbeda dengan lulur. Masker tubuh memberi nutrisi bagi kulit dan tubuh yang berfungsi sebagai pemutih (whitenting) dan pelembap kulit kering.'),
(16, 'Catok Curly', '35000', '', 'curly.jpg', 'Curling iron adalah salah satu hair tools yang dapat mempermudah Anda dalam menata rambut. Beberapa orang mungkin menyebutnya pengeriting rambut, catok curl, atau catok curling. Bagaimanapun Anda menyebut alat ini, fungsinya adalah untuk menciptakan gaya rambut bergelombang dan keriting.'),
(17, 'Catok Blow', '25000', '', 'blow.jpg', 'Blow rambut merupakan salah satu teknik menata rambut agar terlihat rapi dan bervolume.');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesan`
--

CREATE TABLE `detail_pesan` (
  `id_detail` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `id_treatment` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `nama_treatment` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pesan`
--

INSERT INTO `detail_pesan` (`id_detail`, `id_pesan`, `id_treatment`, `id_member`, `nama_treatment`, `harga`) VALUES
(1, 1, 7, 21, 'Creambath Long Hair', '195000'),
(2, 1, 5, 21, 'Full Body Massage', '350000'),
(3, 2, 14, 25, 'Body Mask', '257000'),
(4, 3, 6, 25, 'Full Body Massage', '325000'),
(5, 4, 6, 21, 'Full Body Massage', '325000'),
(6, 5, 11, 21, 'Manicure', '135000');

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `keterangan`, `hak_akses`) VALUES
(1, 'Admin', 1),
(2, 'Karyawan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `nama_karyawan`, `hari`, `tanggal`, `status`) VALUES
(24, 'Ade Kusna Eka S', 'Rabu', '2023-12-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `id_treatment` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `komentar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_detail`, `id_treatment`, `nilai`, `komentar`) VALUES
(9, 38, 10, 5, 'mantapppp'),
(10, 39, 11, 5, 'kerennnnn'),
(11, 1, 7, 5, 'MANTULL MANTAP BETULLLL');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `tipe_pesan` varchar(20) NOT NULL,
  `jam` time NOT NULL,
  `bukti_bayar` varchar(59) NOT NULL,
  `status` int(11) NOT NULL,
  `total_bayar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `nama`, `tanggal`, `tipe_pesan`, `jam`, `bukti_bayar`, `status`, `total_bayar`) VALUES
(1, 'Reza Aditya Pratama', '2023-11-04', 'Homecare', '10:00:00', 'WhatsApp_Image_2023-08-28_at_13_46_14-removebg-preview.png', 0, '545000'),
(2, 'adit', '2023-11-14', 'Homecare', '10:00:00', 'erro.PNG', 0, '257000'),
(3, 'adit', '2024-01-10', 'Homecare', '10:00:00', 'lsp.PNG', 0, '325000'),
(4, 'Reza Aditya Pratama', '2024-01-16', 'Homecare', '09:00:00', 'WhatsApp_Image_2024-01-14_at_17_01_29.jpeg', 0, '325000'),
(5, 'Reza Aditya Pratama', '2024-01-23', 'Homecare', '09:00:00', 'Formulir_Beneficial_Owner_(BO)_(1).pdf', 0, '135000');

-- --------------------------------------------------------

--
-- Table structure for table `setting_gaji`
--

CREATE TABLE `setting_gaji` (
  `id` int(11) NOT NULL,
  `setting_gaji` varchar(400) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting_gaji`
--

INSERT INTO `setting_gaji` (`id`, `setting_gaji`, `nominal`) VALUES
(1, 'alfa', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `token_member`
--

CREATE TABLE `token_member` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `token_member`
--

INSERT INTO `token_member` (`id`, `email`, `token`, `date_created`) VALUES
(6, 'aditp8741@gmail.com', 'Y8iDITtPI98=', 1695563532),
(8, 'aditp8741@gmail.com', 'Pn/FT5+zLxc=', 1697544224),
(9, 'reza@gmail.com', '4p5lcScA5SM=', 1698207557),
(12, 'aditp8741@gmail.com', 'roxInHd4wAo=', 1702212930);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_absensi`
--
ALTER TABLE `data_absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `nik` (`nik`),
  ADD KEY `nama_jabatan` (`nama_jabatan`);

--
-- Indexes for table `data_izin`
--
ALTER TABLE `data_izin`
  ADD PRIMARY KEY (`id_izin`);

--
-- Indexes for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `data_member`
--
ALTER TABLE `data_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `data_treatment`
--
ALTER TABLE `data_treatment`
  ADD PRIMARY KEY (`id_treatment`);

--
-- Indexes for table `detail_pesan`
--
ALTER TABLE `detail_pesan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_pesan` (`id_pesan`) USING BTREE;

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `setting_gaji`
--
ALTER TABLE `setting_gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token_member`
--
ALTER TABLE `token_member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_absensi`
--
ALTER TABLE `data_absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `data_izin`
--
ALTER TABLE `data_izin`
  MODIFY `id_izin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `data_member`
--
ALTER TABLE `data_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `data_treatment`
--
ALTER TABLE `data_treatment`
  MODIFY `id_treatment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `detail_pesan`
--
ALTER TABLE `detail_pesan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setting_gaji`
--
ALTER TABLE `setting_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `token_member`
--
ALTER TABLE `token_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesan`
--
ALTER TABLE `detail_pesan`
  ADD CONSTRAINT `detail_pesan_ibfk_1` FOREIGN KEY (`id_pesan`) REFERENCES `pesan` (`id_pesan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
