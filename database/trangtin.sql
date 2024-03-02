-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th3 02, 2024 lúc 03:40 AM
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
  `MaND` int NOT NULL,
  PRIMARY KEY (`MaBV`),
  KEY `lt_bv` (`MaLT`),
  KEY `nd_bv` (`MaND`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhchon`
--

DROP TABLE IF EXISTS `binhchon`;
CREATE TABLE IF NOT EXISTS `binhchon` (
  `MaBC` int NOT NULL AUTO_INCREMENT,
  `MaND` int NOT NULL,
  `DanhGia` float NOT NULL,
  PRIMARY KEY (`MaBC`),
  KEY `nd_bc` (`MaND`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  PRIMARY KEY (`MaBL`),
  KEY `nd_bl` (`MaND`),
  KEY `bv_bl` (`MaBV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsudoc`
--

DROP TABLE IF EXISTS `lichsudoc`;
CREATE TABLE IF NOT EXISTS `lichsudoc` (
  `MaND` int NOT NULL,
  `MaBV` int NOT NULL,
  `ThoiGianDoc` datetime NOT NULL,
  KEY `nd_ls` (`MaND`),
  KEY `bv_ls` (`MaBV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsuthich`
--

DROP TABLE IF EXISTS `lichsuthich`;
CREATE TABLE IF NOT EXISTS `lichsuthich` (
  `MaND` int NOT NULL,
  `MaBV` int NOT NULL,
  `NgayThich` date NOT NULL,
  KEY `nd_lst` (`MaND`),
  KEY `bv_lst` (`MaBV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiphanhoi`
--

DROP TABLE IF EXISTS `loaiphanhoi`;
CREATE TABLE IF NOT EXISTS `loaiphanhoi` (
  `MaLPH` int NOT NULL AUTO_INCREMENT,
  `TenLPH` varchar(255) NOT NULL,
  PRIMARY KEY (`MaLPH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  PRIMARY KEY (`MaLT`),
  KEY `tl_lt` (`MaTL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanhoi`
--

DROP TABLE IF EXISTS `phanhoi`;
CREATE TABLE IF NOT EXISTS `phanhoi` (
  `MaPH` int NOT NULL AUTO_INCREMENT,
  `MaND` int NOT NULL,
  `MaLPH` int NOT NULL,
  PRIMARY KEY (`MaPH`),
  KEY `nd_ph` (`MaND`),
  KEY `lph_ph` (`MaLPH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sothichnguoidung`
--

DROP TABLE IF EXISTS `sothichnguoidung`;
CREATE TABLE IF NOT EXISTS `sothichnguoidung` (
  `MaND` int NOT NULL,
  `MaLT` int NOT NULL,
  KEY `nd_st` (`MaND`),
  KEY `lt_st` (`MaLT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtingoiy`
--

DROP TABLE IF EXISTS `thongtingoiy`;
CREATE TABLE IF NOT EXISTS `thongtingoiy` (
  `MaND` int NOT NULL,
  `MaBV` int NOT NULL,
  `DiemSo` double NOT NULL,
  KEY `nd_gy` (`MaND`),
  KEY `bv_gy` (`MaBV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD CONSTRAINT `lt_bv` FOREIGN KEY (`MaLT`) REFERENCES `loaitin` (`MaLT`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `nd_bv` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `binhchon`
--
ALTER TABLE `binhchon`
  ADD CONSTRAINT `nd_bc` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `bv_bl` FOREIGN KEY (`MaBV`) REFERENCES `baiviet` (`MaBV`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `nd_bl` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `lichsudoc`
--
ALTER TABLE `lichsudoc`
  ADD CONSTRAINT `bv_ls` FOREIGN KEY (`MaBV`) REFERENCES `baiviet` (`MaBV`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `nd_ls` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `lichsuthich`
--
ALTER TABLE `lichsuthich`
  ADD CONSTRAINT `bv_lst` FOREIGN KEY (`MaBV`) REFERENCES `baiviet` (`MaBV`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `nd_lst` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  ADD CONSTRAINT `tl_lt` FOREIGN KEY (`MaTL`) REFERENCES `theloai` (`MaTL`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  ADD CONSTRAINT `lph_ph` FOREIGN KEY (`MaLPH`) REFERENCES `loaiphanhoi` (`MaLPH`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `nd_ph` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `sothichnguoidung`
--
ALTER TABLE `sothichnguoidung`
  ADD CONSTRAINT `lt_st` FOREIGN KEY (`MaLT`) REFERENCES `loaitin` (`MaLT`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `nd_st` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `thongtingoiy`
--
ALTER TABLE `thongtingoiy`
  ADD CONSTRAINT `bv_gy` FOREIGN KEY (`MaBV`) REFERENCES `baiviet` (`MaBV`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `nd_gy` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
