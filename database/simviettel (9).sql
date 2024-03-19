-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th3 18, 2024 lúc 07:15 AM
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
  `NgayDatHang` datetime NOT NULL,
  `NgayGiaoHang` datetime NOT NULL,
  `TongTien` double NOT NULL,
  `GhiChu` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `TrangThai` int NOT NULL,
  PRIMARY KEY (`MaDH`),
  KEY `nd_dh` (`MaND`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MaDH`, `MaND`, `NgayDatHang`, `NgayGiaoHang`, `TongTien`, `GhiChu`, `TrangThai`) VALUES
(1, 2, '2024-03-12 00:00:00', '0000-00-00 00:00:00', 50000, 'kjsdhaksdhkas', 3),
(2, 2, '2024-03-14 02:13:06', '2024-03-14 02:32:16', 20000, 'álldjsald', 2),
(3, 2, '2024-03-14 02:13:21', '2024-03-16 03:55:04', 50000, 'káhlkasd', 2),
(4, 2, '2024-03-14 02:13:21', '2024-03-16 04:01:24', 6000, 'jkasdjas', 2);

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
  PRIMARY KEY (`MaDH_CT`),
  KEY `dh_ct` (`MaDH`),
  KEY `ls_ct` (`MaLS`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang_ct`
--

INSERT INTO `donhang_ct` (`MaDH_CT`, `MaDH`, `MaLS`, `DonGia`, `SoLuong`, `ThanhTien`) VALUES
(1, 1, 1, 50000, 1, 50000),
(2, 2, 1, 50000, 1, 5000);

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `goicuoc`
--

INSERT INTO `goicuoc` (`MaGC`, `Ten`, `MoTa`, `DungLuong`, `ThoiGianHieuLuc`, `Gia`) VALUES
(1, 'âsdasd', '<p>sakjdhasidja <strong>kjshjasdhas</strong></p><ol><li><strong>ksdhksfd</strong></li><li><strong>sdkjhkfs</strong></li><li><strong>sdkfkf</strong></li></ol>', '221', '50 ngày', 0),
(14, 'UWIEHQWE', '<p>HAHGIUHWU <strong>IHSIDUHD </strong><i><strong>HKAJSDHASKD&nbsp;</strong></i></p><ol><li><i><strong>JKHKJ</strong></i><ol><li><i><strong>KJHOSD</strong></i><ol><li><i><strong>JHSIDJFK</strong></i></li></ol></li></ol></li></ol>', '20', '2024-03-07', 0),
(15, 'kjhaskjd', '<p>klkkjnlkdsasmdl;kkádlasd</p><ul><li>lskjsdfsd<ul><li>sjdflksjdfsd</li></ul></li></ul>', '5', '30 ngày', 5000),
(19, 'hdasjk', '<p>áhdjkasdsadlk</p><ul><li>ksjlskdj</li><li>kạdhskdj<ul><li>kạdlskdj</li></ul></li></ul>', '5', '30 ngày', 50000),
(20, 'hdasjk', '<p>áhdjkasdsadlk</p><ul><li>ksjlskdj</li><li>kạdhskdj<ul><li>kạdlskdj</li></ul></li></ul>', '5', '30 ngày', 50000),
(21, 'hdasjk', '<p>áhdjkasdsadlk</p><ul><li>ksjlskdj</li><li>kạdhskdj<ul><li>kạdlskdj</li></ul></li></ul>', '5', '30 ngày', 50000),
(22, 'hdasjk', '<p>áhdjkasdsadlk</p><ul><li>ksjlskdj</li><li>kạdhskdj<ul><li>kạdlskdj</li></ul></li></ul>', '5', '30 ngày', 50000);

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
  `LoaiKM` int NOT NULL,
  `NgayBD` date NOT NULL,
  `NgayKT` date NOT NULL,
  PRIMARY KEY (`MaKM`),
  KEY `lgg_km` (`LoaiKM`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`MaKM`, `TenKM`, `MoTa`, `GiaTriKM`, `LoaiKM`, `NgayBD`, `NgayKT`) VALUES
(1, 'ABC', 'ABC', 10, 1, '2024-03-01', '2024-03-09'),
(2, 'iuihsjksd', 'kjashjkasd', 10, 1, '2024-03-17', '2024-03-18'),
(3, 'kjhkjh', '<p>j,ahslkasdj <strong>lijsdljaslidjasld&nbsp;</strong></p><ul><li><strong>kjhkj</strong></li><li><strong>kjhkj</strong><ul><li><strong>kjljljl</strong></li></ul></li></ul>', 10, 1, '2024-03-27', '2024-03-30');

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
-- Cấu trúc bảng cho bảng `loaikhuyenmai`
--

DROP TABLE IF EXISTS `loaikhuyenmai`;
CREATE TABLE IF NOT EXISTS `loaikhuyenmai` (
  `MaLKM` int NOT NULL AUTO_INCREMENT,
  `TenLKM` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`MaLKM`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `loaikhuyenmai`
--

INSERT INTO `loaikhuyenmai` (`MaLKM`, `TenLKM`) VALUES
(1, 'Phần trăm'),
(2, 'Số tiền cố định');

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
  `TenDangNhap` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Sdt` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `MatKhau` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `HoTen` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `MaQ` int NOT NULL,
  `TrangThai` tinyint NOT NULL,
  `HinhAnh` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `DiaChi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`MaND`),
  UNIQUE KEY `TenDangNhap` (`TenDangNhap`),
  UNIQUE KEY `Sdt` (`Sdt`),
  KEY `q_nd` (`MaQ`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`MaND`, `TenDangNhap`, `Sdt`, `MatKhau`, `HoTen`, `MaQ`, `TrangThai`, `HinhAnh`, `DiaChi`) VALUES
(1, 'admin@gmai', '0123123123', '21232f297a57a5a743894a0e4a801fc3 ', 'Quản Trị Viên', 1, 1, 'user.jpg', 'An Giang'),
(2, 'kh01@gmail', '0123456789', 'b9bc4dd06b7d2d49cb9fb3d8d9fba6c1 ', 'Lê Thị Lẹ', 2, 0, 'user1.jpg', 'Châu Thành, An Giang'),
(19, 'nva@gmail.', '0111111111', '282ff72866bf811d13d34bae45dc6f18', 'Nguyễn Văn A', 2, 1, 'user3.jpg', 'An Giang'),
(21, 'kjshajshd', '0147258369', '21232f297a57a5a743894a0e4a801fc3', 'jsdhdskdh', 2, 1, 'user1.jpg', 'kjhkajsh'),
(23, 'ạhaksd', '01259875', '289b8aeeec8ee3c9793bd37f933fe99c', 'kjdshfkjsdf', 1, 1, 'user2.jpg', 'áhajk'),
(25, 'lksjlkasdj', '015987456', '26ab2b3ad6adab019a6810f41741261c', ',ksjkdkasdj', 1, 1, 'user2.jpg', 'kjashdkas'),
(27, 'kjhjkh', '0145632178', '26ab2b3ad6adab019a6810f41741261c', 'jhajkash', 2, 1, 'user3.jpg', 'kjshdajk'),
(29, 'kjh', '4564564566', 'a001c2a27ca61a4bf76c1b3c1d2e9cc3', 'hjjhkj', 2, 1, 'user2.jpg', 'kjhjk');

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
  `MoTa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `HinhAnh` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `TrangThai` tinyint(1) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sim`
--

INSERT INTO `sim` (`MaSim`, `SoSim`, `MaLS`, `MoTa`, `HinhAnh`, `GiaGoc`, `GiaBan`, `TinhTrang`) VALUES
(1, '037 288 9054', 2, '', '', 50000, 50000, 1),
(11, '1234567890', 1, '<p>ZhLKzjLKJsLKAS <strong>KJSLKAJSLKJAS JAJSHASJLKA kạhlkasjdlkasdjaslkdjas </strong><i><strong>jashdkjasdjashkjdashkd</strong></i></p><blockquote><ul><li><i><strong>jkhjkh</strong></i></li></ul></blockquote><ul><li><i><strong>kjhkj</strong></i><ul><li><h2>kjhkl</h2></li></ul></li></ul>', 'sim01.jpg', 50000, 5000, 1),
(13, '1234567890', 1, '<p>kjhiWUOEHAWIEU <strong>IUKAHSOIAUDAO I</strong><i><strong>HALKSJDHASKLDJ</strong></i></p><ul><li><i><strong>KJHOI</strong></i><ul><li><i><strong>HUIOJ</strong></i><ul><li><i><strong>HJOIJOI</strong></i></li></ul></li></ul></li></ul>', 'sim01.jpg', 2000, 2000, 1),
(14, '037 742 9630', 1, 'Sim Viettel 4G', 'sim01.jpg', 70000, 50000, 1),
(15, '034 699 2675', 1, 'Sim Viettel 4G miễn phí 10 phút/cuộc gọi nội mạng, 50 phút gọi ngoại mạng, 45GB (1.5GB/ngày), chu kỳ 30 ngày', 'sim01.jpg', 70000, 50000, 1),
(16, '039 802 3264', 1, 'Sim Viettel 4G-V120B-Miễn phí 10 phút/cuộc gọi nội mạng, 50 phút gọi ngoại mạng, 45GB (1.5GB/ngày), chu kỳ 30 ngày.', 'sim01.jpg', 70000, 50000, 1),
(17, '039 288 1720', 1, 'Sim Viettel 4G-V90B-Miễn phí 10 phút/cuộc gọi nội mạng, 30 phút gọi ngoại mạng, 30GB (1GB/ngày), chu kỳ 30 ngày.', 'sim01.jpg', 70000, 50000, 1),
(18, '038 537 1740', 1, 'Sim Viettel 4G-V90B-Miễn phí 10 phút/cuộc gọi nội mạng, 30 phút gọi ngoại mạng, 30GB (1GB/ngày), chu kỳ 30 ngày.', 'sim01.jpg', 70000, 50000, 1),
(19, '039 775 1724', 1, 'Sim viettel-4G-Miễn phí 10 phút/cuộc gọi nội mạng, 80 phút gọi ngoại mạng, 60GB (2GB/ngày), chu kỳ 30 ngày.', 'sim01.jpg', 70000, 50000, 1),
(20, '037 696 0007', 2, 'Sim Viettel-T100-Miễn phí 1.000 phút gọi nội mạng và 50 phút gọi ngoại mạng.\r\n\r\nThời gian hưởng khuyến mại: 12 tháng', 'sim01.jpg', 100000, 70000, 1),
(21, '037 696 0007', 2, 'Sim Viettel-T100-Miễn phí 1.000 phút gọi nội mạng và 50 phút gọi ngoại mạng.\r\n\r\nThời gian hưởng khuyến mại: 12 tháng', 'sim01.jpg', 100000, 70000, 1),
(22, '097 193 1771', 2, 'Sim Viettel-B100N-Miễn phí 1.000 phút gọi nội mạng, 10 phút gọi ngoại mạng và 3GB tốc độ cao truy cập internet (hết 3GB ngừng truy cập).\r\n\r\nThời gian hưởng khuyến mại: 12 tháng', 'sim01.jpg', 100000, 70000, 1),
(23, '086 933 3657', 2, 'Sim Viettel-T150B-Miễn phí 1.000 phút gọi nội mạng, 100 phút gọi ngoại mạng, 100 SMS nội mạng và 12GB tốc độ cao truy cập internet (hết 8GB ngừng truy cập)', 'sim01.jpg', 100000, 70000, 1),
(24, '036 694 4679', 2, 'Sim ViettelT160B-Miễn phí 20 phút đầu tiên/cuộc gọi nội mạng, 60 phút thoại ngoại mạng, 60 SMS nội mạng, 3GB tốc độ cao/ngày (hết 3GB ngừng truy cập).', 'sim01.jpg', 100000, 70000, 1),
(25, '039 677 5266', 2, 'Sim Viettel-B200T-Miễn phí 30 phút đầu tiên/ cuộc gọi nội mạng, 150 phút gọi ngoại mạng, 150 SMS nội mạng và 20GB tốc độ cao truy cập internet (hết 20GB ngừng truy cập).', 'sim01.jpg', 100000, 70000, 1),
(26, '097 193 1771', 2, 'Sim Viettel-V200T-Miễn phí 20 phút đầu tiên/cuộc gọi nội mạng, 100 phút thoại ngoại mạng, 100 SMS trong nước, 4GB tốc độ cao/ngày (hết 4GB ngừng truy cập).', 'sim01.jpg', 100000, 70000, 1),
(27, '086 522 2942', 2, 'Sim Viettel-B250T-Miễn phí 60 phút đầu tiên/cuộc gọi nội mạng, 200 phút gọi ngoại mạng, 200 SMS trong nước và 25GB tốc độ cao truy cập internet (hết 25GB ngừng truy cập).', 'sim01.jpg', 100000, 70000, 1),
(28, '097 193 1771', 2, 'Sim Viettel-V300T-Miễn phí 60 phút đầu tiên/cuộc gọi nội mạng, 200 phút thoại ngoại mạng, 200 SMS trong nước, 6GB tốc độ cao/ngày (hết 6GB ngừng truy cập).', 'sim01.jpg', 100000, 70000, 1),
(29, '039 677 5266', 2, 'Sim Viettel-B300T-Miễn phí 60 phút đầu tiên/cuộc gọi nội mạng, 250 phút gọi ngoại mạng, 250 SMS trong nước và 30GB tốc độ cao truy cập internet (hết 30GB ngừng truy cập)', 'sim01.jpg', 100000, 70000, 1),
(30, '097 193 1771', 2, 'Sim Viettel-V200T-Miễn phí 20 phút đầu tiên/cuộc gọi nội mạng, 100 phút thoại ngoại mạng, 100 SMS trong nước, 4GB tốc độ cao/ngày (hết 4GB ngừng truy cập).', 'sim01.jpg', 100000, 70000, 1),
(31, '038 606 1669', 2, 'Sim Viettel-V300T-Miễn phí 60 phút đầu tiên/cuộc gọi nội mạng, 200 phút thoại ngoại mạng, 200 SMS trong nước, 6GB tốc độ cao/ngày (hết 6GB ngừng truy cập).', 'sim01.jpg', 100000, 70000, 1),
(32, '032 736 7586', 2, 'Sim Viettel V200T-Miễn phí 20 phút đầu tiên/cuộc gọi nội mạng, 100 phút thoại ngoại mạng, 100 SMS trong nước, 4GB tốc độ cao/ngày (hết 4GB ngừng truy cập).', 'sim01.jpg', 100000, 80000, 1);

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
-- Các ràng buộc cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD CONSTRAINT `lgg_km` FOREIGN KEY (`LoaiKM`) REFERENCES `loaikhuyenmai` (`MaLKM`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `khuyenmai_gc`
--
ALTER TABLE `khuyenmai_gc`
  ADD CONSTRAINT `gc_km` FOREIGN KEY (`MaGC`) REFERENCES `goicuoc` (`MaGC`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `km_kmc` FOREIGN KEY (`MaKM`) REFERENCES `khuyenmai` (`MaKM`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `q_nd` FOREIGN KEY (`MaQ`) REFERENCES `quyen` (`MaQ`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;