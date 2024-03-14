-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th3 14, 2024 lúc 01:13 AM
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
  `MaND` int NOT NULL,
  `Ngay` date NOT NULL,
  `TongTien` double NOT NULL,
  `GhiChu` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`MaDH`),
  KEY `nd_dh` (`MaND`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MaDH`, `MaND`, `Ngay`, `TongTien`, `GhiChu`) VALUES
(1, 2, '2024-03-12', 50000, 'kjsdhaksdhkas');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang_ct`
--

DROP TABLE IF EXISTS `donhang_ct`;
CREATE TABLE IF NOT EXISTS `donhang_ct` (
  `MaDH_CT` int NOT NULL AUTO_INCREMENT,
  `MaDH` int NOT NULL,
  `MaLS` int NOT NULL,
  `DonGia` double NOT NULL,
  `SoLuong` int NOT NULL,
  `ThanhTien` float NOT NULL,
  `ThoiGianDatHang` datetime NOT NULL,
  `ThoiGianGiaoHang` datetime NOT NULL,
  `TrangThai` int NOT NULL,
  PRIMARY KEY (`MaDH_CT`),
  KEY `dh_ct` (`MaDH`),
  KEY `ls_ct` (`MaLS`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang_ct`
--

INSERT INTO `donhang_ct` (`MaDH_CT`, `MaDH`, `MaLS`, `DonGia`, `SoLuong`, `ThanhTien`, `ThoiGianDatHang`, `ThoiGianGiaoHang`, `TrangThai`) VALUES
(1, 1, 1, 50000, 1, 50000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang_ct`
--

DROP TABLE IF EXISTS `giohang_ct`;
CREATE TABLE IF NOT EXISTS `giohang_ct` (
  `MaGH` int NOT NULL AUTO_INCREMENT,
  `MaND` int NOT NULL,
  `MaLS` int NOT NULL,
  `SL` int NOT NULL,
  `DonGia` double NOT NULL,
  `TongGia` double NOT NULL,
  PRIMARY KEY (`MaGH`),
  KEY `ls_ctg` (`MaLS`),
  KEY `nd_gh` (`MaND`)
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
  `Gia` double NOT NULL,
  PRIMARY KEY (`MaGC`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `goicuoc`
--

INSERT INTO `goicuoc` (`MaGC`, `Ten`, `MoTa`, `DungLuong`, `ThoiGianHieuLuc`, `Gia`) VALUES
(1, 'âsdasd', '<p>sakjdhasidja <strong>kjshjasdhas</strong></p><ol><li><strong>ksdhksfd</strong></li><li><strong>sdkjhkfs</strong></li><li><strong>sdkfkf</strong></li></ol>', '221', '2024-03-14', 0),
(13, 'UWIEHQWE', '', '20', '2024-03-07', 0),
(14, 'UWIEHQWE', '<p>HAHGIUHWU <strong>IHSIDUHD </strong><i><strong>HKAJSDHASKD&nbsp;</strong></i></p><ol><li><i><strong>JKHKJ</strong></i><ol><li><i><strong>KJHOSD</strong></i><ol><li><i><strong>JHSIDJFK</strong></i></li></ol></li></ol></li></ol>', '20', '2024-03-07', 0);

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
  `DonVi` varchar(50) NOT NULL,
  `NgayBD` date NOT NULL,
  `NgayKT` date NOT NULL,
  PRIMARY KEY (`MaKM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai_gc`
--

DROP TABLE IF EXISTS `khuyenmai_gc`;
CREATE TABLE IF NOT EXISTS `khuyenmai_gc` (
  `MaKMC` int NOT NULL AUTO_INCREMENT,
  `MaGC` int NOT NULL,
  `MaKM` int NOT NULL,
  PRIMARY KEY (`MaKMC`),
  KEY `km_kmc` (`MaKM`),
  KEY `gc_km` (`MaGC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai_sim`
--

DROP TABLE IF EXISTS `khuyenmai_sim`;
CREATE TABLE IF NOT EXISTS `khuyenmai_sim` (
  `MaKMS` int NOT NULL AUTO_INCREMENT,
  `MaS` int NOT NULL,
  `MaKM` int NOT NULL,
  PRIMARY KEY (`MaKMS`),
  KEY `km_kms` (`MaKM`),
  KEY `s_kms` (`MaS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaigoicuoc`
--

DROP TABLE IF EXISTS `loaigoicuoc`;
CREATE TABLE IF NOT EXISTS `loaigoicuoc` (
  `MaLGC` int NOT NULL AUTO_INCREMENT,
  `TenLGC` varchar(255) NOT NULL,
  PRIMARY KEY (`MaLGC`)
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
  `MaLS` int NOT NULL AUTO_INCREMENT,
  `TenLS` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `SoLuong` int NOT NULL,
  `LuotMua` int NOT NULL,
  PRIMARY KEY (`MaLS`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisim`
--

INSERT INTO `loaisim` (`MaLS`, `TenLS`, `SoLuong`, `LuotMua`) VALUES
(1, 'Sim trả trước', 100, 0),
(2, 'Sim trả sau', 100, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

DROP TABLE IF EXISTS `nguoidung`;
CREATE TABLE IF NOT EXISTS `nguoidung` (
  `MaND` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Sdt` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `MatKhau` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `HoTen` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `MaQ` int NOT NULL,
  `TrangThai` tinyint NOT NULL,
  `HinhAnh` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `DiaChi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`MaND`),
  KEY `q_nd` (`MaQ`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`MaND`, `Email`, `Sdt`, `MatKhau`, `HoTen`, `MaQ`, `TrangThai`, `HinhAnh`, `DiaChi`) VALUES
(1, 'admin@gmail.com', '0123123123', '21232f297a57a5a743894a0e4a801fc3 ', 'Quản Trị Viên', 1, 1, 'user.jpg', 'An Giang'),
(2, 'kh01@gmail.com', '0123456789', 'b9bc4dd06b7d2d49cb9fb3d8d9fba6c1 ', 'Lê Thị Lẹ', 2, 1, 'user1.jpg', 'Châu Thành, An Giang');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quangcao`
--

DROP TABLE IF EXISTS `quangcao`;
CREATE TABLE IF NOT EXISTS `quangcao` (
  `MaQC` int NOT NULL AUTO_INCREMENT,
  `HinhAnh` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`MaQC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

DROP TABLE IF EXISTS `quyen`;
CREATE TABLE IF NOT EXISTS `quyen` (
  `MaQ` int NOT NULL AUTO_INCREMENT,
  `TenQ` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`MaQ`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`MaQ`, `TenQ`) VALUES
(1, 'Quản Trị Viên'),
(2, 'Khách Hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sim`
--

DROP TABLE IF EXISTS `sim`;
CREATE TABLE IF NOT EXISTS `sim` (
  `MaSim` int NOT NULL AUTO_INCREMENT,
  `SoSim` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `MaLS` int NOT NULL,
  `MoTa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `HinhAnh` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `GiaGoc` double NOT NULL,
  `GiaBan` double NOT NULL,
  `TinhTrang` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`MaSim`),
  KEY `ls_s` (`MaLS`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sim`
--

INSERT INTO `sim` (`MaSim`, `SoSim`, `MaLS`, `MoTa`, `HinhAnh`, `GiaGoc`, `GiaBan`, `TinhTrang`) VALUES
(1, '037 288 9054', 1, '', '', 50000, 50000, 1),
(11, '1234567890', 1, '<p>ZhLKzjLKJsLKAS <strong>KJSLKAJSLKJAS JAJSHASJLKA kạhlkasjdlkasdjaslkdjas </strong><i><strong>jashdkjasdjashkjdashkd</strong></i></p><blockquote><ul><li><i><strong>jkhjkh</strong></i></li></ul></blockquote><ul><li><i><strong>kjhkj</strong></i><ul><li><h2>kjhkl</h2></li></ul></li></ul>', 'sim01.jpg', 50000, 5000, 1),
(13, '1234567890', 1, '<p>kjhiWUOEHAWIEU <strong>IUKAHSOIAUDAO I</strong><i><strong>HALKSJDHASKLDJ</strong></i></p><ul><li><i><strong>KJHOI</strong></i><ul><li><i><strong>HUIOJ</strong></i><ul><li><i><strong>HJOIJOI</strong></i></li></ul></li></ul></li></ul>', 'sim01.jpg', 2000, 2000, 1);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `nd_dg` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `nd_dh` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `donhang_ct`
--
ALTER TABLE `donhang_ct`
  ADD CONSTRAINT `dh_ct` FOREIGN KEY (`MaDH`) REFERENCES `donhang` (`MaDH`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ls_ct` FOREIGN KEY (`MaLS`) REFERENCES `loaisim` (`MaLS`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `giohang_ct`
--
ALTER TABLE `giohang_ct`
  ADD CONSTRAINT `ls_ctg` FOREIGN KEY (`MaLS`) REFERENCES `loaisim` (`MaLS`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `nd_gh` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `khuyenmai_gc`
--
ALTER TABLE `khuyenmai_gc`
  ADD CONSTRAINT `gc_km` FOREIGN KEY (`MaGC`) REFERENCES `goicuoc` (`MaGC`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `km_kmc` FOREIGN KEY (`MaKM`) REFERENCES `khuyenmai` (`MaKM`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `khuyenmai_sim`
--
ALTER TABLE `khuyenmai_sim`
  ADD CONSTRAINT `km_kms` FOREIGN KEY (`MaKM`) REFERENCES `khuyenmai` (`MaKM`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `s_kms` FOREIGN KEY (`MaS`) REFERENCES `sim` (`MaSim`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `q_nd` FOREIGN KEY (`MaQ`) REFERENCES `quyen` (`MaQ`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  ADD CONSTRAINT `lph_ph` FOREIGN KEY (`MaLPH`) REFERENCES `loaiphanhoi` (`MaLPH`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `nd_ph` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `sim`
--
ALTER TABLE `sim`
  ADD CONSTRAINT `ls_s` FOREIGN KEY (`MaLS`) REFERENCES `loaisim` (`MaLS`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
