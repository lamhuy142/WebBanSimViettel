-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th3 02, 2024 lúc 02:29 AM
-- Phiên bản máy phục vụ: 8.2.0
-- Phiên bản PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `trangtin`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet`
--

DROP TABLE IF EXISTS `baiviet`;
CREATE TABLE IF NOT EXISTS `baiviet` (
  `MaBV` int NOT NULL AUTO_INCREMENT,
  `TieuDe` varchar(255) NOT NULL,
  `TomTat` text NOT NULL,
  `NoiDung` text NOT NULL,
  `urlHinhAnh` varchar(255) NOT NULL,
  `NgayDang` date NOT NULL,
  `SoLanXem` int NOT NULL,
  `TuKhoa` varchar(255) NOT NULL,
  `TrangThaiBV` tinyint NOT NULL,
  `MaLT` int NOT NULL,
  PRIMARY KEY (`MaBV`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhchon`
--

DROP TABLE IF EXISTS `binhchon`;
CREATE TABLE IF NOT EXISTS `binhchon` (
  `MaBC` int NOT NULL AUTO_INCREMENT,
  `MaND` int NOT NULL,
  `DanhGia` float NOT NULL,
  PRIMARY KEY (`MaBC`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

DROP TABLE IF EXISTS `binhluan`;
CREATE TABLE IF NOT EXISTS `binhluan` (
  `MaBL` int NOT NULL AUTO_INCREMENT,
  `NoiDung` text NOT NULL,
  `Ngay` date NOT NULL,
  `MaBV` int NOT NULL,
  `MaND` int NOT NULL,
  PRIMARY KEY (`MaBL`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsudoc`
--

DROP TABLE IF EXISTS `lichsudoc`;
CREATE TABLE IF NOT EXISTS `lichsudoc` (
  `MaLS` int NOT NULL AUTO_INCREMENT,
  `MaND` int NOT NULL,
  `MaBV` int NOT NULL,
  `ThoiGianDoc` datetime NOT NULL,
  PRIMARY KEY (`MaLS`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiphanhoi`
--

DROP TABLE IF EXISTS `loaiphanhoi`;
CREATE TABLE IF NOT EXISTS `loaiphanhoi` (
  `MaLPH` int NOT NULL AUTO_INCREMENT,
  `TenLPH` varchar(255) NOT NULL,
  PRIMARY KEY (`MaLPH`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitin`
--

DROP TABLE IF EXISTS `loaitin`;
CREATE TABLE IF NOT EXISTS `loaitin` (
  `MaLT` int NOT NULL AUTO_INCREMENT,
  `TenLT` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `TrangThaiLT` tinyint NOT NULL,
  `MaTL` int NOT NULL,
  PRIMARY KEY (`MaLT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

DROP TABLE IF EXISTS `nguoidung`;
CREATE TABLE IF NOT EXISTS `nguoidung` (
  `MaND` int NOT NULL AUTO_INCREMENT,
  `HoTen` varchar(255) NOT NULL,
  `TenDN` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` tinyint NOT NULL,
  `QuyenND` tinyint NOT NULL,
  `NgayDK` date NOT NULL,
  `TrangThai` tinyint NOT NULL,
  PRIMARY KEY (`MaND`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanhoi`
--

DROP TABLE IF EXISTS `phanhoi`;
CREATE TABLE IF NOT EXISTS `phanhoi` (
  `MaPH` int NOT NULL AUTO_INCREMENT,
  `MaND` int NOT NULL,
  `MaLPH` int NOT NULL,
  PRIMARY KEY (`MaPH`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quangcao`
--

DROP TABLE IF EXISTS `quangcao`;
CREATE TABLE IF NOT EXISTS `quangcao` (
  `MaQC` int NOT NULL AUTO_INCREMENT,
  `MoTaQC` varchar(255) NOT NULL,
  `URL` varchar(255) NOT NULL,
  `UrlHinhAnh` varchar(255) NOT NULL,
  PRIMARY KEY (`MaQC`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

DROP TABLE IF EXISTS `theloai`;
CREATE TABLE IF NOT EXISTS `theloai` (
  `MaTL` int NOT NULL AUTO_INCREMENT,
  `TenTL` varchar(255) NOT NULL,
  `TrangThai` tinyint NOT NULL,
  PRIMARY KEY (`MaTL`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
