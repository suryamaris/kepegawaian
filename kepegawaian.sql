-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 06:14 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kepegawaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tanggal` varchar(128) NOT NULL,
  `masuk` varchar(128) NOT NULL,
  `keluar` varchar(128) NOT NULL,
  `keterangan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `nama`, `tanggal`, `masuk`, `keluar`, `keterangan`) VALUES
(2, 'rangga aditya', '12 June 2021', '17:26', '18:02', ''),
(3, 'david putra', '13 June 2021', '09:44', '10:46', ''),
(5, 'heri ardi', '13 June 2021', '10:57', '10:57', ''),
(6, 'yudi kana', '13 June 2021', '11:04', '11:04', ''),
(7, 'Andre putra', '13 June 2021', '11:06', '11:06', ''),
(8, 'Martin Doubt', '13 June 2021', '16:25', '16:26', ''),
(9, 'Surya Maris', '14 June 2021', '07:07', '07:07', ''),
(11, 'david putra', '14 June 2021', 'Cuti', 'Cuti', 'sakit Selama 1 Hari'),
(12, 'david putra', '14 June 2021', 'Cuti', 'Cuti', 'sakit Selama 1 Hari'),
(13, 'david putra', '14 June 2021', 'Cuti', 'Cuti', 'sakit Selama 1 Hari'),
(14, 'david putra', '14 June 2021', 'Cuti', 'Cuti', 'sakit Selama 1 Hari'),
(16, 'paulus satria', '14 June 2021', 'Cuti', 'Cuti', 'Liburan Selama5 Hari'),
(17, 'Surya Maris', '15 June 2021', '04:43', '04:56', ''),
(18, 'Surya Maris', '15 June 2021', '04:43', '04:56', ''),
(19, 'yudi kana', '15 June 2021', '04:45', '04:56', ''),
(20, 'Surya Maris', '16 June 2021', 'Izin', 'Izin', 'Liburan Selama 1 Hari');

-- --------------------------------------------------------

--
-- Table structure for table `perizinan`
--

CREATE TABLE `perizinan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` varchar(128) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `alasan` varchar(256) NOT NULL,
  `hari` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perizinan`
--

INSERT INTO `perizinan` (`id`, `nama`, `tanggal`, `jenis`, `alasan`, `hari`) VALUES
(3, 'david putra', '14 June 2021', 'Izin', 'sakit', 1),
(4, 'david putra', '14 June 2021', 'Izin', 'sakit', 1),
(5, 'david putra', '14 June 2021', 'Izin', 'sakit', 1),
(6, 'david putra', '14 June 2021', 'Izin', 'sakit', 1),
(8, 'paulus satria', '14 June 2021', 'Cuti', 'Liburan', 5),
(9, 'Surya Maris', '16 June 2021', 'Izin', 'Liburan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `jabatan1` varchar(50) NOT NULL,
  `jabatan2` varchar(50) NOT NULL,
  `bagian1` varchar(128) NOT NULL,
  `bagian2` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`id`, `tanggal`, `nama`, `jenis`, `jabatan1`, `jabatan2`, `bagian1`, `bagian2`) VALUES
(1, '15 June 2021', 'david putra', 'Peringatan', '', '', '', ''),
(2, '15 June 2021', 'david putra', 'Promosi', 'Pegawai', 'Manager', 'Pemasaran', 'Produksi'),
(3, '16 June 2021', 'david putra', '', 'Pegawai', '', 'Pemasaran', ''),
(4, '16 June 2021', 'david putra', '', 'Pegawai', '', 'Pemasaran', ''),
(5, '16 June 2021', 'david putra', 'Promosi', 'Pegawai', 'Manager', 'Pemasaran', 'Produksi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `cuti` int(4) NOT NULL,
  `izin` int(4) NOT NULL,
  `bagian` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `jabatan`, `agama`, `alamat`, `hp`, `cuti`, `izin`, `bagian`) VALUES
(5, 'Surya admin', 'iklc.surya@gmail.com', 'default.jpg', '$2y$10$F2t2c8.N6QRDV1z97/hhGeJwLaNHitwhGMqEDzGDohN5.aS02BSQe', 1, 1, 1623318871, 'Asisten', '', '', '', 0, 0, ''),
(6, 'rangga aditya', 'percobaan1@gmail.com', 'default.jpg', '$2y$10$Bsa4zd4yELegYrAiMatZY.aRCR3TeiFvsT4QK3mjIksb/Xi4kjq0S', 2, 1, 1623411023, '', '', '', '', 0, 0, ''),
(7, 'david putra', 'percobaan2@gmail.com', 'default.jpg', '$2y$10$Dd83iy.3XjvmfNs0BoUbxuZZoXUNu0xcvM1a7OMAR5V.97kRSTSiq', 2, 1, 1623411057, 'Manager', '', '', '', 0, 0, 'Produksi'),
(8, 'paulus satria', 'percobaan3@gmail.com', 'default.jpg', '$2y$10$z.4GPtmGCLJE0TTae9.CweiDTmp.xdA9DAOZFT7A5M3TG6ItfmCAK', 2, 1, 1623411077, '', '', '', '', 0, 0, ''),
(9, 'heri ardi', 'percobaan4@gmail.com', 'default.jpg', '$2y$10$vkZeJBtDZGKnDDBKM7XcP.N36AHlganEpvVDoCJfZ3iXUOTZf/xUG', 2, 1, 1623411106, '', '', '', '', 0, 0, ''),
(10, 'yudi kana', 'percobaan5@gmail.com', 'default.jpg', '$2y$10$e2DyopA/OcrhJIpw59zV.O9jsWIveLqfFukfyBnMn6kv.XUAtyBri', 2, 1, 1623411132, '', '', '', '', 0, 0, ''),
(11, 'Andre putra', 'percobaan6@gmail.com', 'default.jpg', '$2y$10$kPYgBmAaquP2VJTmSdw/Xu6LJf4n/1nkDE4cZpe0mBWMd15pnKVxW', 2, 1, 1623411149, 'Pegawai', 'Islam', 'Jalan buntu', '0898928211', 0, 0, ''),
(12, 'Jefri lau', 'percobaan7@gmail.com', 'default.jpg', '$2y$10$7BkUeupsaP6CVY5kbDpsA...xbV/8LKTR3kdN0dnv59y3HoAFYaF.', 2, 1, 1623411232, '', '', '', '', 0, 0, ''),
(13, 'henry wibowo', 'percobaan8@gmail.com', 'default.jpg', '$2y$10$gXtsbzMIGwmAwtF/JfNtWeBtW4YJS6TBDXKfFrU.dLj40d8hEUOUa', 2, 1, 1623412545, '', '', '', '', 0, 0, ''),
(14, 'Martin Doubt', 'percobaan9@gmail.com', 'default.jpg', '$2y$10$IBWy01sM4B6hbGXJgsmbmeEppubOVFqJBOG8L81C.DTarN/QOg6.6', 2, 1, 1623412586, '', '', '', '', 0, 0, ''),
(15, 'Septian Hendrianto', 'percobaan10@gmail.com', 'default.jpg', '$2y$10$FJUQa2yBrjR9ELs18PPtBOJKWRqv.ln/ztikQqq88W.EWkaaRVnHq', 2, 1, 1623412608, '', '', '', '', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'HRD'),
(2, 'Pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'hrd'),
(2, 'pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 1, 'Absensi', 'absensi', 'fas fa-fw fa-tasks', 1),
(4, 1, 'Status', 'status', 'fas fa-fw fa-sitemap', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perizinan`
--
ALTER TABLE `perizinan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `perizinan`
--
ALTER TABLE `perizinan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
