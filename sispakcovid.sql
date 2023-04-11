-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jul 2022 pada 08.54
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sispakcovid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `basispengetahuan`
--

CREATE TABLE `basispengetahuan` (
  `id_basis` varchar(4) NOT NULL,
  `id_status` varchar(4) NOT NULL,
  `id_gejala` varchar(5) NOT NULL,
  `nilai_cf` float(11,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `basispengetahuan`
--

INSERT INTO `basispengetahuan` (`id_basis`, `id_status`, `id_gejala`, `nilai_cf`) VALUES
('A001', 'S001', 'GJ001', 0.8),
('A002', 'S001', 'GJ002', 0.8),
('A003', 'S001', 'GJ003', 0.8),
('A004', 'S001', 'GJ004', 0.8),
('A005', 'S001', 'GJ005', 0.2),
('A006', 'S001', 'GJ007', 0.2),
('A007', 'S001', 'GJ008', 0.2),
('A008', 'S001', 'GJ009', 0.2),
('A009', 'S001', 'GJ010', 0.2),
('A010', 'S001', 'GJ011', 0.8),
('A011', 'S001', 'GJ012', 0.2),
('A012', 'S001', 'GJ013', 0.2),
('A013', 'S001', 'GJ014', 0.2),
('A014', 'S001', 'GJ015', 0.6),
('A015', 'S001', 'GJ016', 0.2),
('A016', 'S001', 'GJ019', 0.8),
('A017', 'S002', 'GJ001', 0.8),
('A018', 'S002', 'GJ002', 0.8),
('A019', 'S002', 'GJ003', 0.8),
('A020', 'S002', 'GJ004', 0.8),
('A021', 'S002', 'GJ005', 0.2),
('A022', 'S002', 'GJ006', 1.0),
('A023', 'S002', 'GJ007', 0.2),
('A024', 'S002', 'GJ008', 0.2),
('A025', 'S002', 'GJ009', 0.2),
('A026', 'S002', 'GJ010', 0.2),
('A027', 'S002', 'GJ011', 0.8),
('A028', 'S002', 'GJ012', 0.2),
('A029', 'S002', 'GJ013', 0.2),
('A030', 'S002', 'GJ014', 0.2),
('A031', 'S002', 'GJ015', 0.6),
('A032', 'S002', 'GJ016', 0.2),
('A033', 'S002', 'GJ017', 1.0),
('A034', 'S002', 'GJ018', 1.0),
('A035', 'S002', 'GJ019', 0.8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` varchar(5) NOT NULL,
  `nama_gejala` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nama_gejala`) VALUES
('GJ001', 'Batuk'),
('GJ002', 'Pilek'),
('GJ003', 'Demam'),
('GJ004', 'Sakit tenggorokan'),
('GJ005', 'Menggigil'),
('GJ006', 'Sesak napas'),
('GJ007', 'Mual muntah'),
('GJ008', 'Pusing'),
('GJ009', 'Sakit kepala'),
('GJ010', 'Lemas'),
('GJ011', 'Nyeri otot'),
('GJ012', 'Diare'),
('GJ013', 'Kelelahan'),
('GJ014', 'Nafsu makan berkurang'),
('GJ015', 'Nyeri tulang'),
('GJ016', 'Hidung tersumbat (kongesti nasal)'),
('GJ017', 'Hilang penciuman (anosmia)'),
('GJ018', 'Hilang pengecap (ageusia)'),
('GJ019', 'Kontak erat dengan pengidap covid-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisi`
--

CREATE TABLE `kondisi` (
  `id_kondisi` int(11) NOT NULL,
  `kondisin` varchar(128) NOT NULL,
  `nilaik` float(11,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kondisi`
--

INSERT INTO `kondisi` (`id_kondisi`, `kondisin`, `nilaik`) VALUES
(1, 'Sangat yakin', 1.0),
(2, 'Yakin', 0.8),
(3, 'Cukup Yakin', 0.6),
(4, 'Sedikit yakin', 0.4),
(5, 'Kurang yakin', 0.2),
(6, 'Tidak yakin', 0.0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekammedis`
--

CREATE TABLE `rekammedis` (
  `id_rm` int(11) NOT NULL,
  `tgl` varchar(50) NOT NULL,
  `caristatus` text NOT NULL,
  `carigejala` text NOT NULL,
  `id_status` varchar(128) NOT NULL,
  `cfhasil` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekammedis`
--

INSERT INTO `rekammedis` (`id_rm`, `tgl`, `caristatus`, `carigejala`, `id_status`, `cfhasil`, `id_user`) VALUES
(214, '2022-05-20 10:15:06', 'a:2:{s:4:\"S001\";s:6:\"0.9741\";s:4:\"S002\";s:6:\"0.9741\";}', 'a:3:{s:4:\"GJ001\";s:3:\"1.0\";s:4:\"GJ002\";s:3:\"0.8\";s:4:\"GJ004\";s:3:\"0.8\";}', 'S001', '0.9741', 7),
(215, '2022-05-20 12:05:45', 'a:2:{s:4:\"S002\";s:6:\"0.9772\";s:4:\"S001\";s:6:\"0.8860\";}', 'a:4:{s:4:\"GJ001\";s:3:\"0.8\";s:4:\"GJ002\";s:3:\"0.8\";s:4:\"GJ006\";s:3:\"0.8\";s:4:\"GJ007\";s:3:\"0.6\";}', 'S002', '0.9772', 8),
(216, '2022-05-20 14:27:03', 'a:2:{s:4:\"S002\";s:6:\"1.0000\";s:4:\"S001\";s:6:\"0.9533\";}', 'a:4:{s:4:\"GJ001\";s:3:\"0.8\";s:4:\"GJ002\";s:3:\"0.8\";s:4:\"GJ004\";s:3:\"0.8\";s:4:\"GJ006\";s:3:\"1.0\";}', 'S002', '1.0000', 9),
(217, '2022-05-20 14:45:11', 'a:2:{s:4:\"S001\";s:6:\"0.9856\";s:4:\"S002\";s:6:\"0.9856\";}', 'a:3:{s:4:\"GJ001\";s:3:\"1.0\";s:4:\"GJ002\";s:3:\"0.8\";s:4:\"GJ004\";s:3:\"1.0\";}', 'S001', '0.9856', 10),
(218, '2022-05-20 16:17:26', 'a:2:{s:4:\"S001\";s:6:\"0.9280\";s:4:\"S002\";s:6:\"0.9280\";}', 'a:2:{s:4:\"GJ002\";s:3:\"0.8\";s:4:\"GJ003\";s:3:\"1.0\";}', 'S001', '0.9280', 11),
(219, '2022-05-21 07:30:37', 'a:2:{s:4:\"S001\";s:6:\"0.9856\";s:4:\"S002\";s:6:\"0.9856\";}', 'a:3:{s:4:\"GJ001\";s:3:\"1.0\";s:4:\"GJ002\";s:3:\"0.8\";s:4:\"GJ004\";s:3:\"1.0\";}', 'S001', '0.9856', 12),
(220, '2022-05-21 09:23:26', 'a:2:{s:4:\"S001\";s:6:\"0.9741\";s:4:\"S002\";s:6:\"0.9741\";}', 'a:3:{s:4:\"GJ001\";s:3:\"0.8\";s:4:\"GJ002\";s:3:\"0.8\";s:4:\"GJ004\";s:3:\"1.0\";}', 'S001', '0.9741', 13),
(221, '2022-05-21 13:03:43', 'a:2:{s:4:\"S001\";s:6:\"0.9856\";s:4:\"S002\";s:6:\"0.9856\";}', 'a:3:{s:4:\"GJ001\";s:3:\"1.0\";s:4:\"GJ002\";s:3:\"1.0\";s:4:\"GJ003\";s:3:\"0.8\";}', 'S001', '0.9856', 14),
(222, '2022-05-21 14:15:40', 'a:2:{s:4:\"S001\";s:6:\"0.9741\";s:4:\"S002\";s:6:\"0.9741\";}', 'a:3:{s:4:\"GJ001\";s:3:\"0.8\";s:4:\"GJ002\";s:3:\"1.0\";s:4:\"GJ003\";s:3:\"0.8\";}', 'S001', '0.9741', 15),
(223, '2022-05-21 14:34:21', 'a:2:{s:4:\"S001\";s:6:\"0.9600\";s:4:\"S002\";s:6:\"0.9600\";}', 'a:2:{s:4:\"GJ001\";s:3:\"1.0\";s:4:\"GJ002\";s:3:\"1.0\";}', 'S001', '0.9600', 16),
(224, '2022-05-21 17:36:47', 'a:2:{s:4:\"S001\";s:6:\"0.9741\";s:4:\"S002\";s:6:\"0.9741\";}', 'a:3:{s:4:\"GJ001\";s:3:\"0.8\";s:4:\"GJ002\";s:3:\"0.8\";s:4:\"GJ004\";s:3:\"1.0\";}', 'S001', '0.9741', 17),
(225, '2022-05-21 20:37:43', 'a:2:{s:4:\"S001\";s:6:\"0.9920\";s:4:\"S002\";s:6:\"0.9920\";}', 'a:3:{s:4:\"GJ001\";s:3:\"1.0\";s:4:\"GJ002\";s:3:\"1.0\";s:4:\"GJ003\";s:3:\"1.0\";}', 'S001', '0.9920', 18),
(226, '2022-05-22 08:38:06', 'a:2:{s:4:\"S001\";s:6:\"0.9280\";s:4:\"S002\";s:6:\"0.9280\";}', 'a:2:{s:4:\"GJ001\";s:3:\"0.8\";s:4:\"GJ003\";s:3:\"1.0\";}', 'S001', '0.9280', 19),
(227, '2022-05-22 09:10:17', 'a:2:{s:4:\"S001\";s:6:\"0.9792\";s:4:\"S002\";s:6:\"0.9792\";}', 'a:3:{s:4:\"GJ001\";s:3:\"1.0\";s:4:\"GJ002\";s:3:\"0.6\";s:4:\"GJ004\";s:3:\"1.0\";}', 'S001', '0.9792', 20),
(228, '2022-05-22 09:40:12', 'a:2:{s:4:\"S001\";s:6:\"0.9600\";s:4:\"S002\";s:6:\"0.9600\";}', 'a:2:{s:4:\"GJ001\";s:3:\"1.0\";s:4:\"GJ004\";s:3:\"1.0\";}', 'S001', '0.9600', 21),
(229, '2022-05-22 09:50:48', 'a:2:{s:4:\"S001\";s:6:\"0.9280\";s:4:\"S002\";s:6:\"0.9280\";}', 'a:2:{s:4:\"GJ001\";s:3:\"1.0\";s:4:\"GJ004\";s:3:\"0.8\";}', 'S001', '0.9280', 22),
(230, '2022-05-22 11:20:27', 'a:2:{s:4:\"S001\";s:6:\"0.9280\";s:4:\"S002\";s:6:\"0.9280\";}', 'a:2:{s:4:\"GJ001\";s:3:\"0.8\";s:4:\"GJ002\";s:3:\"1.0\";}', 'S001', '0.9280', 23),
(231, '2022-05-22 12:42:02', 'a:2:{s:4:\"S001\";s:6:\"0.9856\";s:4:\"S002\";s:6:\"0.9856\";}', 'a:3:{s:4:\"GJ001\";s:3:\"1.0\";s:4:\"GJ002\";s:3:\"1.0\";s:4:\"GJ003\";s:3:\"0.8\";}', 'S001', '0.9856', 24),
(232, '2022-05-22 12:43:54', 'a:2:{s:4:\"S002\";s:6:\"1.0000\";s:4:\"S001\";s:6:\"0.9949\";}', 'a:9:{s:4:\"GJ001\";s:3:\"0.8\";s:4:\"GJ002\";s:3:\"0.8\";s:4:\"GJ003\";s:3:\"0.8\";s:4:\"GJ005\";s:3:\"0.6\";s:4:\"GJ006\";s:3:\"1.0\";s:4:\"GJ009\";s:3:\"0.8\";s:4:\"GJ010\";s:3:\"0.8\";s:4:\"GJ011\";s:3:\"1.0\";s:4:\"GJ012\";s:3:\"0.6\";}', 'S002', '1.0000', 25),
(233, '2022-05-22 13:15:29', 'a:2:{s:4:\"S002\";s:6:\"1.0000\";s:4:\"S001\";s:6:\"0.8400\";}', 'a:3:{s:4:\"GJ004\";s:3:\"1.0\";s:4:\"GJ006\";s:3:\"1.0\";s:4:\"GJ010\";s:3:\"1.0\";}', 'S002', '1.0000', 26),
(234, '2022-05-23 10:46:24', 'a:2:{s:4:\"S002\";s:6:\"1.0000\";s:4:\"S001\";s:6:\"0.6832\";}', 'a:3:{s:4:\"GJ001\";s:3:\"0.8\";s:4:\"GJ006\";s:3:\"1.0\";s:4:\"GJ007\";s:3:\"0.6\";}', 'S002', '1.0000', 27),
(235, '2022-05-23 11:47:11', 'a:2:{s:4:\"S001\";s:6:\"0.3280\";s:4:\"S002\";s:6:\"0.3280\";}', 'a:2:{s:4:\"GJ007\";s:3:\"0.8\";s:4:\"GJ009\";s:3:\"1.0\";}', 'S001', '0.3280', 28),
(236, '2022-05-29 12:20:55', 'a:2:{s:4:\"S002\";s:6:\"1.0000\";s:4:\"S001\";s:6:\"0.9042\";}', 'a:5:{s:4:\"GJ001\";s:3:\"0.8\";s:4:\"GJ003\";s:3:\"0.8\";s:4:\"GJ006\";s:3:\"1.0\";s:4:\"GJ007\";s:3:\"0.8\";s:4:\"GJ010\";s:3:\"0.6\";}', 'S002', '1.0000', 29),
(237, '2022-05-23 12:48:52', 'a:2:{s:4:\"S002\";s:6:\"0.9704\";s:4:\"S001\";s:6:\"0.8522\";}', 'a:4:{s:4:\"GJ001\";s:3:\"1.0\";s:4:\"GJ006\";s:3:\"0.8\";s:4:\"GJ009\";s:3:\"0.8\";s:4:\"GJ010\";s:3:\"0.6\";}', 'S002', '0.9704', 30),
(238, '2022-05-23 14:19:39', 'a:2:{s:4:\"S002\";s:6:\"1.0000\";s:4:\"S001\";s:6:\"0.9626\";}', 'a:4:{s:4:\"GJ001\";s:3:\"0.8\";s:4:\"GJ002\";s:3:\"0.6\";s:4:\"GJ003\";s:3:\"1.0\";s:4:\"GJ017\";s:3:\"1.0\";}', 'S002', '1.0000', 31),
(239, '2022-05-24 06:07:04', 'a:2:{s:4:\"S002\";s:6:\"1.0000\";s:4:\"S001\";s:6:\"0.9856\";}', 'a:5:{s:4:\"GJ001\";s:3:\"1.0\";s:4:\"GJ002\";s:3:\"0.8\";s:4:\"GJ003\";s:3:\"1.0\";s:4:\"GJ017\";s:3:\"1.0\";s:4:\"GJ018\";s:3:\"1.0\";}', 'S002', '1.0000', 32),
(240, '2022-05-24 06:45:57', 'a:2:{s:4:\"S002\";s:6:\"1.0000\";s:4:\"S001\";s:6:\"0.9948\";}', 'a:6:{s:4:\"GJ001\";s:3:\"0.8\";s:4:\"GJ002\";s:3:\"0.8\";s:4:\"GJ003\";s:3:\"1.0\";s:4:\"GJ006\";s:3:\"1.0\";s:4:\"GJ018\";s:3:\"1.0\";s:4:\"GJ019\";s:3:\"1.0\";}', 'S002', '1.0000', 33),
(241, '2022-05-24 06:52:53', 'a:2:{s:4:\"S002\";s:6:\"1.0000\";s:4:\"S001\";s:6:\"0.9865\";}', 'a:5:{s:4:\"GJ002\";s:3:\"0.6\";s:4:\"GJ003\";s:3:\"0.8\";s:4:\"GJ004\";s:3:\"0.8\";s:4:\"GJ017\";s:3:\"1.0\";s:4:\"GJ019\";s:3:\"1.0\";}', 'S002', '1.0000', 34),
(242, '2022-05-24 07:14:32', 'a:2:{s:4:\"S001\";s:6:\"0.8911\";s:4:\"S002\";s:6:\"0.8911\";}', 'a:3:{s:4:\"GJ001\";s:3:\"0.8\";s:4:\"GJ003\";s:3:\"0.8\";s:4:\"GJ010\";s:3:\"0.8\";}', 'S001', '0.8911', 35),
(243, '2022-05-24 07:34:25', 'a:2:{s:4:\"S001\";s:6:\"0.9979\";s:4:\"S002\";s:6:\"0.9979\";}', 'a:5:{s:4:\"GJ001\";s:3:\"1.0\";s:4:\"GJ002\";s:3:\"0.8\";s:4:\"GJ003\";s:3:\"0.8\";s:4:\"GJ004\";s:3:\"1.0\";s:4:\"GJ015\";s:3:\"1.0\";}', 'S001', '0.9979', 36),
(244, '2022-05-24 07:55:00', 'a:2:{s:4:\"S002\";s:6:\"1.0000\";s:4:\"S001\";s:6:\"0.9280\";}', 'a:3:{s:4:\"GJ001\";s:3:\"1.0\";s:4:\"GJ003\";s:3:\"0.8\";s:4:\"GJ017\";s:3:\"1.0\";}', 'S002', '1.0000', 37),
(245, '', 'a:2:{s:4:\"S002\";s:6:\"1.0000\";s:4:\"S001\";s:6:\"0.6400\";}', 'a:3:{s:4:\"G003\";s:3:\"0.8\";s:4:\"G017\";s:3:\"1.0\";s:4:\"G018\";s:3:\"1.0\";}', 'S002', '1.0000', 38),
(246, '2022-05-26 10:56:44', 'a:1:{s:4:\"S002\";s:6:\"1.0000\";}', 'a:1:{s:4:\"G017\";s:3:\"1.0\";}', 'S002', '1.0000', 39),
(247, '2022-05-26 12:26:34', 'a:2:{s:4:\"S002\";s:6:\"1.0000\";s:4:\"S001\";s:6:\"0.9280\";}', 'a:4:{s:4:\"G002\";s:3:\"1.0\";s:4:\"G003\";s:3:\"0.8\";s:4:\"G017\";s:3:\"1.0\";s:4:\"G018\";s:3:\"1.0\";}', 'S002', '1.0000', 40),
(248, '2022-05-26 13:57:57', 'a:2:{s:4:\"S001\";s:6:\"0.9920\";s:4:\"S002\";s:6:\"0.9920\";}', 'a:3:{s:4:\"G002\";s:3:\"1.0\";s:4:\"G003\";s:3:\"1.0\";s:4:\"G004\";s:3:\"1.0\";}', 'S001', '0.9920', 41),
(249, '2022-05-26 15:15:43', 'a:1:{s:4:\"S002\";s:6:\"1.0000\";}', 'a:2:{s:4:\"G017\";s:3:\"1.0\";s:4:\"G018\";s:3:\"1.0\";}', 'S002', '1.0000', 42),
(250, '2022-05-26 15:59:15', 'a:2:{s:4:\"S002\";s:6:\"1.0000\";s:4:\"S001\";s:6:\"0.9280\";}', 'a:4:{s:4:\"G002\";s:3:\"0.8\";s:4:\"G004\";s:3:\"1.0\";s:4:\"G017\";s:3:\"1.0\";s:4:\"G018\";s:3:\"1.0\";}', 'S002', '1.0000', 43),
(251, '2022-05-26 15:59:48', 'a:2:{s:4:\"S001\";s:6:\"0.9395\";s:4:\"S002\";s:6:\"0.9395\";}', 'a:3:{s:4:\"G003\";s:3:\"0.8\";s:4:\"G004\";s:3:\"1.0\";s:4:\"G010\";s:3:\"0.8\";}', 'S001', '0.9395', 44),
(252, '2022-05-26 15:00:46', 'a:2:{s:4:\"S001\";s:6:\"0.9395\";s:4:\"S002\";s:6:\"0.9395\";}', 'a:3:{s:4:\"G003\";s:3:\"0.8\";s:4:\"G004\";s:3:\"1.0\";s:4:\"G010\";s:3:\"0.8\";}', 'S001', '0.9395', 45),
(253, '2022-05-26 18:01:31', 'a:2:{s:4:\"S002\";s:6:\"1.0000\";s:4:\"S001\";s:6:\"0.9395\";}', 'a:5:{s:4:\"G003\";s:3:\"0.8\";s:4:\"G004\";s:3:\"1.0\";s:4:\"G010\";s:3:\"0.8\";s:4:\"G017\";s:3:\"1.0\";s:4:\"G018\";s:3:\"1.0\";}', 'S002', '1.0000', 46),
(254, '2022-05-26 18:30:08', 'a:2:{s:4:\"S001\";s:6:\"0.9600\";s:4:\"S002\";s:6:\"0.9600\";}', 'a:2:{s:4:\"G004\";s:3:\"1.0\";s:4:\"G019\";s:3:\"1.0\";}', 'S001', '0.9600', 47),
(255, '2022-05-27 14:02:32', 'a:2:{s:4:\"S001\";s:6:\"0.9280\";s:4:\"S002\";s:6:\"0.9280\";}', 'a:2:{s:4:\"G001\";s:3:\"1.0\";s:4:\"G004\";s:3:\"0.8\";}', 'S001', '0.9280', 48),
(256, '2022-05-27 14:03:31', 'a:2:{s:4:\"S002\";s:6:\"1.0000\";s:4:\"S001\";s:6:\"0.9782\";}', 'a:7:{s:4:\"G002\";s:3:\"0.8\";s:4:\"G003\";s:3:\"0.8\";s:4:\"G006\";s:3:\"1.0\";s:4:\"G008\";s:3:\"0.8\";s:4:\"G017\";s:3:\"1.0\";s:4:\"G018\";s:3:\"1.0\";s:4:\"G019\";s:3:\"1.0\";}', 'S002', '1.0000', 49),
(257, '2022-05-27 16:15:18', 'a:2:{s:4:\"S002\";s:6:\"1.0000\";s:4:\"S001\";s:6:\"0.9280\";}', 'a:3:{s:4:\"G003\";s:3:\"0.8\";s:4:\"G017\";s:3:\"1.0\";s:4:\"G019\";s:3:\"1.0\";}', 'S002', '1.0000', 50),
(258, '2022-05-27 16:30:10', 'a:2:{s:4:\"S002\";s:6:\"1.0000\";s:4:\"S001\";s:6:\"0.9948\";}', 'a:5:{s:4:\"G002\";s:3:\"0.8\";s:4:\"G003\";s:3:\"0.8\";s:4:\"G004\";s:3:\"1.0\";s:4:\"G017\";s:3:\"1.0\";s:4:\"G019\";s:3:\"1.0\";}', 'S002', '1.0000', 51),
(259, '2022-05-27 17:09:13', 'a:2:{s:4:\"S002\";s:6:\"1.0000\";s:4:\"S001\";s:6:\"0.9922\";}', 'a:7:{s:4:\"G001\";s:3:\"0.8\";s:4:\"G002\";s:3:\"0.8\";s:4:\"G003\";s:3:\"1.0\";s:4:\"G004\";s:3:\"0.8\";s:4:\"G010\";s:3:\"0.8\";s:4:\"G017\";s:3:\"1.0\";s:4:\"G018\";s:3:\"1.0\";}', 'S002', '1.0000', 52),
(260, '2022-05-28 18:11:15', 'a:2:{s:4:\"S002\";s:6:\"1.0000\";s:4:\"S001\";s:6:\"0.9922\";}', 'a:6:{s:4:\"G001\";s:3:\"0.8\";s:4:\"G002\";s:3:\"1.0\";s:4:\"G003\";s:3:\"0.8\";s:4:\"G004\";s:3:\"0.8\";s:4:\"G006\";s:3:\"1.0\";s:4:\"G013\";s:3:\"0.8\";}', 'S002', '1.0000', 53),
(261, '2022-05-28 18:20:22', 'a:2:{s:4:\"S002\";s:6:\"1.0000\";s:4:\"S001\";s:6:\"0.9782\";}', 'a:7:{s:4:\"G001\";s:3:\"1.0\";s:4:\"G003\";s:3:\"0.8\";s:4:\"G004\";s:3:\"0.8\";s:4:\"G006\";s:3:\"1.0\";s:4:\"G008\";s:3:\"0.8\";s:4:\"G017\";s:3:\"1.0\";s:4:\"G018\";s:3:\"1.0\";}', 'S002', '1.0000', 54),
(262, '2022-05-28 19:13:42', 'a:2:{s:4:\"S002\";s:6:\"1.0000\";s:4:\"S001\";s:6:\"0.9865\";}', 'a:7:{s:4:\"G001\";s:3:\"0.8\";s:4:\"G002\";s:3:\"0.6\";s:4:\"G004\";s:3:\"0.8\";s:4:\"G006\";s:3:\"1.0\";s:4:\"G017\";s:3:\"0.8\";s:4:\"G018\";s:3:\"0.8\";s:4:\"G019\";s:3:\"1.0\";}', 'S002', '1.0000', 55),
(263, '2022-05-29 21:14:06', 'a:2:{s:4:\"S002\";s:6:\"0.9920\";s:4:\"S001\";s:6:\"0.8000\";}', 'a:3:{s:4:\"G002\";s:3:\"1.0\";s:4:\"G017\";s:3:\"0.8\";s:4:\"G018\";s:3:\"0.8\";}', 'S002', '0.9920', 56),
(264, '2022-05-29 21:15:01', 'a:2:{s:4:\"S002\";s:6:\"0.9999\";s:4:\"S001\";s:6:\"0.9985\";}', 'a:7:{s:4:\"G001\";s:3:\"1.0\";s:4:\"G002\";s:3:\"0.8\";s:4:\"G003\";s:3:\"0.6\";s:4:\"G004\";s:3:\"1.0\";s:4:\"G017\";s:3:\"0.8\";s:4:\"G018\";s:3:\"0.8\";s:4:\"G019\";s:3:\"1.0\";}', 'S002', '0.9999', 57),
(265, '2022-05-29 21:15:41', 'a:2:{s:4:\"S001\";s:6:\"0.8353\";s:4:\"S002\";s:6:\"0.8353\";}', 'a:3:{s:4:\"G002\";s:3:\"0.6\";s:4:\"G005\";s:3:\"0.6\";s:4:\"G019\";s:3:\"0.8\";}', 'S001', '0.8353', 58),
(266, '2022-05-29 21:16:31', 'a:2:{s:4:\"S002\";s:6:\"1.0000\";s:4:\"S001\";s:6:\"0.9994\";}', 'a:7:{s:4:\"G001\";s:3:\"0.8\";s:4:\"G002\";s:3:\"1.0\";s:4:\"G003\";s:3:\"1.0\";s:4:\"G004\";s:3:\"1.0\";s:4:\"G011\";s:3:\"1.0\";s:4:\"G017\";s:3:\"0.8\";s:4:\"G018\";s:3:\"0.8\";}', 'S002', '1.0000', 59),
(271, '2022-06-30 10:04:42', 'a:2:{s:4:\"S001\";s:6:\"0.8320\";s:4:\"S002\";s:6:\"0.8320\";}', 'a:0:{}', 'S001', '0.8320', 7),
(272, '2022-07-25 10:17:56', 'a:2:{s:4:\"S001\";s:6:\"0.9741\";s:4:\"S002\";s:6:\"0.9741\";}', 'a:3:{s:5:\"GJ001\";s:3:\"0.8\";s:5:\"GJ002\";s:3:\"1.0\";s:5:\"GJ003\";s:3:\"0.8\";}', 'S001', '0.9741', 7),
(273, '2022-07-26 13:32:03', 'a:2:{s:4:\"S001\";s:6:\"0.9741\";s:4:\"S002\";s:6:\"0.9741\";}', 'a:3:{s:5:\"GJ001\";s:3:\"1.0\";s:5:\"GJ002\";s:3:\"0.8\";s:5:\"GJ004\";s:3:\"0.8\";}', 'S001', '0.9741', 7),
(275, '2022-07-26 13:46:12', 'a:2:{s:4:\"S002\";s:6:\"0.9772\";s:4:\"S001\";s:6:\"0.8860\";}', 'a:4:{s:5:\"GJ001\";s:3:\"0.8\";s:5:\"GJ002\";s:3:\"0.8\";s:5:\"GJ006\";s:3:\"0.8\";s:5:\"GJ007\";s:3:\"0.6\";}', 'S002', '0.9772', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` varchar(4) NOT NULL,
  `nama_status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
('S001', 'Orang dalam pengawasan (ODP)'),
('S002', 'Pasien dalam pantauan (PDP)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'Jessi Ropa', 'babyotteraku2546@gmail.com', 'default.jpg', '$2y$10$9fxOg5XhWEjItSrwDchkP.xN3XXKUI.87ambimae0/dak53G/IRAe', 1, 1, 1648356229),
(7, 'Wada Maayu', 'kristinjessi9700@gmail.com', 'default.jpg', '$2y$10$2SPwROVjmLdHCKQcl95LuOteCBcq/rhDjTjWRbSH7t5HwH8sSWtoO', 2, 1, 1648487881),
(8, 'Kaki Haruka', 'jess.typograph@gmail.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1650813727),
(9, 'Andira', 'andira@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(10, 'Agnia', 'agnia@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(11, 'Amelia', 'amelia@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(12, 'Cantika', 'cantika@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(13, 'Alex', 'alex@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(14, 'Kilvin', 'kilvin@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(15, 'Marthin', 'marthin@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(16, 'Dhiki', 'dhiki@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(17, 'Rizky', 'rizky@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(18, 'Anjali', 'anjali@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(19, 'Deliana', 'deliana@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(20, 'Aksa', 'aksa@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(21, 'Alvaro', 'alvaro@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(22, 'Baim', 'baim@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(23, 'Brian', 'brian@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(24, 'Carles', 'carles@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(25, 'Doni', 'doni@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(26, 'Yuni', 'yuni@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(27, 'Novri', 'novri@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(28, 'Maret', 'maret@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(29, 'Apriani', 'apriani@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(30, 'Vania', 'vania@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(31, 'Linda', 'linda@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(32, 'Maya', 'maya@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(33, 'Dita', 'dita@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(34, 'Agnes', 'agnes@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(35, 'Putra', 'putra@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(36, 'Agung', 'agung@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(37, 'Erik', 'erik@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(38, 'Hendra', 'hendra@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(39, 'Jois', 'jois@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(40, 'Dani', 'dani@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(41, 'Efendi', 'efendi@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(42, 'Nanda', 'nanda@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(43, 'Bunga', 'bunga@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(44, 'Yasmin', 'yasmin@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(45, 'Minami', 'minami@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(46, 'Victor', 'victor@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(47, 'Bento', 'bento@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(48, 'Karin', 'karin@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(49, 'Tesa', 'tesa@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(50, 'Farel', 'farel@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(51, 'Martha', 'martha@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(52, 'Juliana', 'juliana@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(53, 'Natasya', 'natasya@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(54, 'Yoan', 'yoan@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(55, 'Dewi', 'dewi@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(56, 'Emil', 'emil@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(57, 'Yoda', 'yoda@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(58, 'Zella', 'zella@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(59, 'Marvel', 'marvel@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(60, 'Candra', 'candra@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229),
(61, 'Lisa', 'lisa@email.com', 'default.jpg', '$2y$10$oKiJ2HuI7nJC3spvtsfG/OOVB6IR2uqngsZmTECte4G5kIHfSdVq.', 2, 1, 1648356229);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(5, 2, 2),
(7, 1, 3),
(9, 1, 8),
(12, 1, 10),
(13, 1, 7),
(14, 2, 3),
(16, 1, 12),
(17, 2, 9),
(18, 2, 7),
(19, 1, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'General'),
(7, 'User'),
(8, 'Menu'),
(9, 'Konsultasi'),
(12, 'Data'),
(13, 'Pasien');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `judul`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(6, 8, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(7, 8, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(10, 8, 'Role', 'menu/role', 'fas fa-fw fa-user-tie', 1),
(11, 9, 'Konsultasi', 'konsultasi', 'fas fa-fw fa-user-md', 1),
(12, 9, 'Riwayat Konsultasi', 'konsultasi/riwayat', 'fas fa-fw fa-history', 1),
(13, 2, 'Dashboard', 'general', 'fas fa-fw fa-fw fa-tachometer-alt', 1),
(14, 12, 'Status Pasien', 'data', 'fas fa-fw fa-check-circle', 1),
(15, 12, 'Gejala', 'data/gejala', 'fas fa-fw fa-file-medical-alt', 1),
(21, 12, 'Basis Pengetahuan', 'data/basispengetahuan', 'fas fa-fw fa-clipboard-list', 1),
(22, 7, 'Profil Saya', 'user/profil', 'fas fa-fw fa-user', 1),
(23, 7, 'Edit Profil', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(24, 7, 'Ganti Kata Sandi', 'user/gantipassword', 'fas fa-fw fa-key', 1),
(25, 13, 'Riwayat Konsultasi Pasien', 'pasien', 'fas fa-fw fa-history', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `basispengetahuan`
--
ALTER TABLE `basispengetahuan`
  ADD PRIMARY KEY (`id_basis`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indeks untuk tabel `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indeks untuk tabel `rekammedis`
--
ALTER TABLE `rekammedis`
  ADD PRIMARY KEY (`id_rm`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `rekammedis`
--
ALTER TABLE `rekammedis`
  MODIFY `id_rm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
