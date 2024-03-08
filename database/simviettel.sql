-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th3 08, 2024 lúc 02:58 PM
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
-- Cơ sở dữ liệu: `simviettel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banggia`
--

DROP TABLE IF EXISTS `banggia`;
CREATE TABLE IF NOT EXISTS `banggia` (
  `MaSP` int NOT NULL,
  `GiaGoc` double NOT NULL,
  `GiaBan` double NOT NULL,
  `GiaKM` double NOT NULL,
  `MaKM` int NOT NULL,
  KEY `gc_bg` (`MaSP`),
  KEY `km_bg` (`MaKM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietgiohang`
--

DROP TABLE IF EXISTS `chitietgiohang`;
CREATE TABLE IF NOT EXISTS `chitietgiohang` (
  `MaCT` int NOT NULL AUTO_INCREMENT,
  `MaG` int NOT NULL,
  `MaS` int NOT NULL,
  `SL` int NOT NULL,
  `TongGia` double NOT NULL,
  PRIMARY KEY (`MaCT`),
  KEY `g_ct` (`MaG`),
  KEY `s_ctg` (`MaS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

DROP TABLE IF EXISTS `danhgia`;
CREATE TABLE IF NOT EXISTS `danhgia` (
  `MaDG` int NOT NULL AUTO_INCREMENT,
  `MaND` int NOT NULL,
  `NoiDung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `urlHinhAnh` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`MaDG`),
  KEY `nd_dg` (`MaND`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `MaDH` int NOT NULL AUTO_INCREMENT,
  `NguoiDung_id` int NOT NULL,
  `Ngay` date NOT NULL,
  `TongTien` float NOT NULL,
  `GhiChu` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `TrangThai` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`MaDH`),
  KEY `nd_dh` (`NguoiDung_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang_ct`
--

DROP TABLE IF EXISTS `donhang_ct`;
CREATE TABLE IF NOT EXISTS `donhang_ct` (
  `MaDH_ct` int NOT NULL AUTO_INCREMENT,
  `MaDH` int NOT NULL,
  `MaSim` int NOT NULL,
  `SoLuong` int NOT NULL,
  `ThanhTien` float NOT NULL,
  PRIMARY KEY (`MaDH_ct`),
  KEY `dh_ct` (`MaDH`),
  KEY `s_ct` (`MaSim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

DROP TABLE IF EXISTS `giohang`;
CREATE TABLE IF NOT EXISTS `giohang` (
  `MaG` int NOT NULL AUTO_INCREMENT,
  `MaND` int NOT NULL,
  PRIMARY KEY (`MaG`),
  KEY `nd_g` (`MaND`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `goicuoc`
--

DROP TABLE IF EXISTS `goicuoc`;
CREATE TABLE IF NOT EXISTS `goicuoc` (
  `MaGC` int NOT NULL AUTO_INCREMENT,
  `Ten` varchar(255) NOT NULL,
  `MoTa` text NOT NULL,
  `DungLuong` varchar(255) NOT NULL,
  `ThoiGianHieuLuc` varchar(255) NOT NULL,
  PRIMARY KEY (`MaGC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

DROP TABLE IF EXISTS `khuyenmai`;
CREATE TABLE IF NOT EXISTS `khuyenmai` (
  `MaKM` int NOT NULL AUTO_INCREMENT,
  `TenKM` varchar(255) NOT NULL,
  `MoTa` text NOT NULL,
  `GiaTriKM` float NOT NULL,
  `NgayBD` date NOT NULL,
  `NgayKT` date NOT NULL,
  PRIMARY KEY (`MaKM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmaigc`
--

DROP TABLE IF EXISTS `khuyenmaigc`;
CREATE TABLE IF NOT EXISTS `khuyenmaigc` (
  `MaKMC` int NOT NULL AUTO_INCREMENT,
  `MaGC` int NOT NULL,
  `MaKM` int NOT NULL,
  PRIMARY KEY (`MaKMC`),
  KEY `gc_kmc` (`MaGC`),
  KEY `km_kmc` (`MaKM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmaisim`
--

DROP TABLE IF EXISTS `khuyenmaisim`;
CREATE TABLE IF NOT EXISTS `khuyenmaisim` (
  `MaKMS` int NOT NULL AUTO_INCREMENT,
  `MaS` int NOT NULL,
  `MaKM` int NOT NULL,
  PRIMARY KEY (`MaKMS`),
  KEY `s_kms` (`MaS`),
  KEY `km_kms` (`MaKM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiphanhoi`
--

DROP TABLE IF EXISTS `loaiphanhoi`;
CREATE TABLE IF NOT EXISTS `loaiphanhoi` (
  `MaLPH` int NOT NULL AUTO_INCREMENT,
  `TenLPH` varchar(50) NOT NULL,
  PRIMARY KEY (`MaLPH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisim`
--

DROP TABLE IF EXISTS `loaisim`;
CREATE TABLE IF NOT EXISTS `loaisim` (
  `LoaiSim_id` int NOT NULL AUTO_INCREMENT,
  `TenSim` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`LoaiSim_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

DROP TABLE IF EXISTS `nguoidung`;
CREATE TABLE IF NOT EXISTS `nguoidung` (
  `MaNguoiDung` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `SoDienThoai` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `MatKhau` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `HoTen` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `MaQ` int NOT NULL,
  `TrangThai` tinyint NOT NULL,
  `HinhAnh` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `DiaChi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`MaNguoiDung`),
  KEY `q_nd` (`MaQ`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanhoi`
--

DROP TABLE IF EXISTS `phanhoi`;
CREATE TABLE IF NOT EXISTS `phanhoi` (
  `MaND` int NOT NULL,
  `MaLPH` int NOT NULL,
  KEY `nd_ph` (`MaND`),
  KEY `lph_ph` (`MaLPH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quangcao`
--

DROP TABLE IF EXISTS `quangcao`;
CREATE TABLE IF NOT EXISTS `quangcao` (
  `MaQC` int NOT NULL AUTO_INCREMENT,
  `urlHinhAnh` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`MaQC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

DROP TABLE IF EXISTS `quyen`;
CREATE TABLE IF NOT EXISTS `quyen` (
  `MaQuyen` int NOT NULL AUTO_INCREMENT,
  `TenQuyen` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`MaQuyen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sim`
--

DROP TABLE IF EXISTS `sim`;
CREATE TABLE IF NOT EXISTS `sim` (
  `MaSim` int NOT NULL AUTO_INCREMENT,
  `TenSim` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `LoaiSim_id` int NOT NULL,
  `MoTa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `HinhAnh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `LuotMua` int NOT NULL,
  `SoLuongTon` int NOT NULL,
  PRIMARY KEY (`MaSim`),
  KEY `ls_s` (`LoaiSim_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `banggia`
--
ALTER TABLE `banggia`
  ADD CONSTRAINT `gc_bg` FOREIGN KEY (`MaSP`) REFERENCES `goicuoc` (`MaGC`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `km_bg` FOREIGN KEY (`MaKM`) REFERENCES `khuyenmai` (`MaKM`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `s_bg` FOREIGN KEY (`MaSP`) REFERENCES `sim` (`MaSim`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD CONSTRAINT `g_ct` FOREIGN KEY (`MaG`) REFERENCES `giohang` (`MaG`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `s_ctg` FOREIGN KEY (`MaS`) REFERENCES `sim` (`MaSim`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `nd_dg` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaNguoiDung`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `nd_dh` FOREIGN KEY (`NguoiDung_id`) REFERENCES `nguoidung` (`MaNguoiDung`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `donhang_ct`
--
ALTER TABLE `donhang_ct`
  ADD CONSTRAINT `dh_ct` FOREIGN KEY (`MaDH`) REFERENCES `donhang` (`MaDH`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `s_ct` FOREIGN KEY (`MaSim`) REFERENCES `sim` (`MaSim`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `nd_g` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaNguoiDung`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `khuyenmaigc`
--
ALTER TABLE `khuyenmaigc`
  ADD CONSTRAINT `gc_kmc` FOREIGN KEY (`MaGC`) REFERENCES `goicuoc` (`MaGC`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `km_kmc` FOREIGN KEY (`MaKM`) REFERENCES `khuyenmai` (`MaKM`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `khuyenmaisim`
--
ALTER TABLE `khuyenmaisim`
  ADD CONSTRAINT `km_kms` FOREIGN KEY (`MaKM`) REFERENCES `khuyenmai` (`MaKM`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `s_kms` FOREIGN KEY (`MaS`) REFERENCES `sim` (`MaSim`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `q_nd` FOREIGN KEY (`MaQ`) REFERENCES `quyen` (`MaQuyen`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  ADD CONSTRAINT `lph_ph` FOREIGN KEY (`MaLPH`) REFERENCES `loaiphanhoi` (`MaLPH`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `nd_ph` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaNguoiDung`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `sim`
--
ALTER TABLE `sim`
  ADD CONSTRAINT `ls_s` FOREIGN KEY (`LoaiSim_id`) REFERENCES `loaisim` (`LoaiSim_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
