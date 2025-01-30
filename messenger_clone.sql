-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 08, 2025 at 09:47 AM
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
-- Database: `messenger_clone`
--

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `nomor_wa`, `email`, `kata_sandi`, `tanggal_lahir`, `jenis_kelamin`, `tanggal_daftar`, `foto_profil`) VALUES
(3, 'Arindan Aditiya', '+6285221978481', 'indangaming003@gmail.com', '$2y$10$FhGYXoOIZfNIG8dD/h20ueBkNfBIGjs2OgWcT7kcRPGUXd/b2pjFe', '16 Desember 2005', 'laki-laki', '2024-10-22 04:15:02', 'imageUploaded/profile.jpg'),
(4, 'usman  alay', '+6283898670934', 'alay@gmail.com', '$2y$10$E2eGVecqmL07FAPD3MLPm.OlAxknGdyE1GAf0i.g.egkwT/332nFu', '1 Januari 2000', 'laki-laki', '2024-10-31 16:52:56', 'imageUploaded/profile.jpg'),
(5, 'laravel 56', '097979797979', 'indanaditiya@gmail.com', '$2y$10$PTnVjdDQojwqz.O0jXtpXuizVRZe5AWX7JfOGQPXSmSqYtpl/mZqK', '1 Januari 2000', 'laki-laki', '2024-11-04 15:31:05', 'imageUploaded/profile.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
