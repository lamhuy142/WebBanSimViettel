-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th4 26, 2024 lúc 05:51 AM
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
  `MaKM` int NOT NULL,
  `NoiDung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `NgayDG` date NOT NULL,
  PRIMARY KEY (`MaDG`),
  KEY `nd_dg` (`MaND`),
  KEY `km_dg` (`MaKM`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`MaDG`, `MaND`, `MaKM`, `NoiDung`, `NgayDG`) VALUES
(56, 35, 31, 'xin chào', '2024-04-05'),
(57, 35, 31, 'hihihihi', '2024-04-08'),
(58, 37, 31, 'ahhiiii', '2024-04-09'),
(59, 38, 31, 'ok', '2024-04-10'),
(60, 38, 37, 'jljlj;lkl;l;', '2024-04-15');

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
  `GhiChu` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `TrangThai` int NOT NULL,
  PRIMARY KEY (`MaDH`),
  KEY `nd_dh` (`MaND`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MaDH`, `MaND`, `NgayDatHang`, `NgayGiaoHang`, `TongTien`, `GhiChu`, `TrangThai`) VALUES
(46, 35, '2024-04-07 00:00:00', '0000-00-00 00:00:00', 10000, NULL, 3),
(47, 35, '2024-04-08 00:00:00', '2024-04-08 21:50:29', 10000, NULL, 2),
(48, 35, '2024-04-08 00:00:00', '2024-04-08 21:53:07', 10000, NULL, 2),
(49, 37, '2024-04-09 00:00:00', '0000-00-00 00:00:00', 10000, NULL, 3),
(56, 37, '2024-04-10 00:00:00', '0000-00-00 00:00:00', 10000, NULL, 3),
(57, 38, '2024-04-11 00:00:00', '2024-04-14 21:52:35', 5000, NULL, 2),
(58, 38, '2024-04-12 00:00:00', '2024-04-12 23:35:09', 285000, NULL, 2),
(59, 38, '2024-04-14 00:00:00', '2024-04-14 21:51:27', 100000, NULL, 2),
(60, 37, '2024-04-17 00:00:00', '2024-04-20 22:38:32', 100000, NULL, 2),
(61, 37, '2024-04-17 00:00:00', '0000-00-00 00:00:00', 100000, NULL, 0),
(62, 37, '2024-04-17 00:00:00', '0000-00-00 00:00:00', 100000, NULL, 0),
(63, 37, '2024-04-17 00:00:00', '0000-00-00 00:00:00', 100000, NULL, 0),
(64, 37, '2024-04-17 00:00:00', '0000-00-00 00:00:00', 100000, NULL, 0),
(65, 37, '2024-04-17 00:00:00', '0000-00-00 00:00:00', 100000, NULL, 0),
(66, 37, '2024-04-17 00:00:00', '0000-00-00 00:00:00', 100000, NULL, 0),
(67, 37, '2024-04-17 00:00:00', '0000-00-00 00:00:00', 100000, NULL, 0),
(68, 37, '2024-04-17 00:00:00', '0000-00-00 00:00:00', 100000, NULL, 0),
(69, 37, '2024-04-17 00:00:00', '0000-00-00 00:00:00', 100000, NULL, 0),
(70, 37, '2024-04-17 00:00:00', '0000-00-00 00:00:00', 100000, NULL, 0),
(71, 37, '2024-04-17 00:00:00', '0000-00-00 00:00:00', 100000, NULL, 3),
(73, 33, '2024-03-20 00:31:51', '2024-04-01 00:31:51', 50000, 'lksajsa', 1),
(74, 37, '2024-04-20 00:00:00', '0000-00-00 00:00:00', 13000, NULL, 3),
(75, 37, '2024-04-20 00:00:00', '0000-00-00 00:00:00', 8000, NULL, 0),
(76, 37, '2024-04-20 00:00:00', '0000-00-00 00:00:00', 8000, NULL, 0),
(77, 37, '2024-04-22 00:00:00', '2024-04-22 21:13:16', 55000, NULL, 2),
(78, 37, '2024-04-23 00:00:00', '0000-00-00 00:00:00', 8000, NULL, 0),
(79, 37, '2024-04-23 00:00:00', '0000-00-00 00:00:00', 55000, NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang_ct`
--

DROP TABLE IF EXISTS `donhang_ct`;
CREATE TABLE IF NOT EXISTS `donhang_ct` (
  `MaDH_CT` int NOT NULL AUTO_INCREMENT,
  `MaDH` int NOT NULL,
  `MaS` int NOT NULL,
  `DonGia` double NOT NULL,
  `SoLuong` int NOT NULL,
  `ThanhTien` float NOT NULL,
  PRIMARY KEY (`MaDH_CT`),
  KEY `dh_ct` (`MaDH`),
  KEY `ls_ct` (`MaS`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang_ct`
--

INSERT INTO `donhang_ct` (`MaDH_CT`, `MaDH`, `MaS`, `DonGia`, `SoLuong`, `ThanhTien`) VALUES
(46, 46, 20, 5000, 1, 5000),
(47, 46, 20, 5000, 1, 5000),
(48, 47, 19, 5000, 1, 5000),
(49, 47, 19, 5000, 1, 5000),
(50, 48, 17, 5000, 1, 5000),
(51, 48, 17, 5000, 1, 5000),
(52, 49, 20, 5000, 1, 5000),
(53, 49, 20, 5000, 1, 5000),
(58, 56, 19, 5000, 1, 5000),
(59, 56, 17, 5000, 1, 5000),
(60, 57, 19, 5000, 1, 5000),
(61, 58, 39, 50000, 1, 50000),
(62, 58, 41, 40000, 1, 40000),
(63, 58, 42, 50000, 1, 50000),
(64, 58, 33, 5000, 1, 5000),
(65, 58, 40, 50000, 1, 50000),
(66, 58, 41, 40000, 1, 40000),
(67, 58, 41, 40000, 1, 40000),
(68, 58, 33, 5000, 1, 5000),
(69, 58, 33, 5000, 1, 5000),
(70, 59, 38, 50000, 1, 50000),
(71, 59, 37, 50000, 1, 50000),
(72, 60, 56, 50000, 1, 50000),
(73, 60, 52, 50000, 1, 50000),
(74, 71, 36, 50000, 1, 50000),
(75, 71, 35, 50000, 1, 50000),
(76, 74, 25, 5000, 1, 5000),
(77, 74, 41, 8000, 1, 8000),
(78, 75, 51, 8000, 1, 8000),
(79, 76, 43, 8000, 1, 8000),
(80, 77, 58, 50000, 1, 50000),
(81, 77, 20, 5000, 1, 5000),
(82, 78, 57, 8000, 1, 8000),
(83, 79, 32, 5000, 1, 5000),
(84, 79, 28, 50000, 1, 50000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang_ct`
--

DROP TABLE IF EXISTS `giohang_ct`;
CREATE TABLE IF NOT EXISTS `giohang_ct` (
  `MaGH` int NOT NULL AUTO_INCREMENT,
  `MaND` int NOT NULL,
  `MaS` int NOT NULL,
  `SL` int NOT NULL,
  `DonGia` double NOT NULL,
  PRIMARY KEY (`MaGH`),
  KEY `nd_gh` (`MaND`),
  KEY `s_gh` (`MaS`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang_ct`
--

INSERT INTO `giohang_ct` (`MaGH`, `MaND`, `MaS`, `SL`, `DonGia`) VALUES
(109, 37, 53, 1, 8000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `goicuoc`
--

DROP TABLE IF EXISTS `goicuoc`;
CREATE TABLE IF NOT EXISTS `goicuoc` (
  `MaGC` int NOT NULL AUTO_INCREMENT,
  `MaLGC` int NOT NULL,
  `Ten` varchar(255) NOT NULL,
  `MoTa` text NOT NULL,
  `Gia` double NOT NULL,
  `GiaTriKM` int NOT NULL,
  `ThoiHan` varchar(50) NOT NULL,
  `TrangThai` tinyint(1) NOT NULL,
  PRIMARY KEY (`MaGC`),
  KEY `lgc_gc` (`MaLGC`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `goicuoc`
--

INSERT INTO `goicuoc` (`MaGC`, `MaLGC`, `Ten`, `MoTa`, `Gia`, `GiaTriKM`, `ThoiHan`, `TrangThai`) VALUES
(23, 1, 'YT1', '<p><strong>Giá cước</strong>: 3.000đ/ngày&nbsp;</p><p><i>Ưu đãi:&nbsp;</i></p><p>- Truy cập không giới hạn lưu lượng ứng dụng YouTube đến 24h.</p><p>- Gói cước gia hạn hàng ngày.</p><p><i>Đăng ký:</i> Soạn YT1 gửi 191 hoặc bấm gọi *098*1057#</p><p><i>Hủy gia hạn:</i> Soạn HUY YT1 gửi 191</p><p><i>Hủy gói: </i>Soạn HUYDATA YT1 gửi 191</p>', 3000, 50, '1 ngày', 1),
(25, 2, 'MP15K', '<p><strong>Ưu đãi Giá cước: </strong>15.000đ/3 ngày&nbsp;</p><p><i>Ưu đãi:</i>&nbsp;</p><p>- Miễn phí 10 phút/cuộc gọi nội mạng sử dụng trong 3 ngày kể từ ngày đăng ký thành công.&nbsp;</p><p>- Gói cước gia hạn khi hết chu kỳ.</p><p><i>Đăng ký:</i> Bấm Đăng ký hoặc soạn <i>MP15K gửi 109</i>, bấm gọi *098*798#</p><p><i>Hủy gia hạn</i>: Soạn HUYFT gửi 109</p>', 15000, 0, '3 ngày kể từ ngày đăng ký', 1),
(26, 1, 'T1', '<p><strong>Giá cước:</strong> 3.000đ/ngày&nbsp;</p><p><strong>Ưu đãi:&nbsp;</strong></p><p>- Truy cập không giới hạn lưu lượng ứng dụng TikTok đến 24h.</p><p>- Gói cước gia hạn hàng ngày.</p><p><i>Đăng ký</i>: Soạn <strong>T1</strong> gửi <strong>191</strong> hoặc bấm gọi *098*1007#</p><p><i>Hủy gia hạn</i>: Soạn <strong>HUY</strong> <strong>T1</strong> gửi <strong>191</strong></p><p><i>Hủy gói</i>: Soạn <strong>HUYDATA</strong> <strong>T1</strong> gửi <strong>191</strong></p>', 3000, 0, '1 ngày', 1),
(27, 1, 'V35B', '<p><strong>Giá cước:</strong> 35.000đ/15 ngày&nbsp;</p><p><strong>Ưu đãi:</strong></p><p>- 500MB/ngày</p><p>- Miễn phí 10 phút đầu tiên của tất cả các cuộc gọi nội mạng</p><p>Gói cước gia hạn sau 15 ngày</p><p>Soạn <strong>V35B</strong> gửi <strong>191</strong> hoặc bấm gọi *098*1048#</p><p><i>Hủy gia hạn: </i>Soạn <strong>HUY</strong> <strong>V35B</strong> gửi <strong>191</strong></p><p><i>Hủy gói:</i> <strong>HUYDATA</strong> <strong>V35B</strong> gửi <strong>191</strong></p>', 35000, 20, '15 ngày', 1),
(28, 1, '1N', '<p><strong>Giá cước:</strong> 10.000đ/ngày&nbsp;</p><p><strong>Ưu đãi:&nbsp;</strong></p><p>- 5GB.</p><p>- Miễn phí nhắn tin nội mạng.</p><p>- Miễn phí 10 phút/cuộc gọi nội mạng, 5 phút gọi ngoại mạng.</p><p>- Miễn phí xem truyền hình trên ứng dụng TV360</p><p>- Ưu đãi sử dụng đến 24h</p><p>- Gói cước gia hạn hàng ngày</p><p>Soạn <strong>1N</strong> gửi <strong>191</strong> hoặc bấm gọi *098*974#</p><p><i>Hủy gia hạn:</i> Soạn <strong>HUY</strong> <strong>1N</strong> gửi <strong>191</strong></p><p><i>Hủy gói:</i> <strong>HUYDATA</strong> <strong>1N</strong> gửi <strong>191</strong></p>', 10000, 15, '1 ngày', 1),
(29, 1, 'ST15K', '<p><strong>Giá cước:</strong> 15.000đ/3 ngày.</p><p><strong>Ưu đãi:</strong></p><p>- Có ngay 3GB lưu lượng tốc độ cao sử dụng trong 3 ngày kể từ ngày đăng ký thành công. Hết lưu lượng truy cập theo gói Mobile Internet đang sử dụng (nếu có).</p><p>- Gói cước gia hạn khi hết chu kỳ, lưu lượng còn lại sẽ được bảo lưu khi gia hạn thành công.</p><p><strong>Đăng ký:</strong> Bấm Đăng ký hoặc soạn ST15K gửi 191, bấm gọi *098*3# hoặc *098*1533#</p><p><strong>Tặng gói cước:</strong> Bấm \"Tặng gói\" / Soạn TANG &lt;dấu cách&gt; ST15K &lt;dấu cách&gt; Số thuê bao B gửi 191. Gói được tặng không gia hạn tự động.</p><p><strong>Hủy gia hạn</strong>: Bấm \"Hủy\" / Soạn <strong>HUY ST15K </strong>gửi <strong>191</strong></p><p><strong>Hủy gói cước:</strong> Soạn <strong>HUYDATA ST15K </strong>gửi <strong>191 </strong>(<i>Xác nhận Y gửi 191</i>)</p>', 15000, 15, '3 ngày', 1),
(30, 1, 'ST5K', '<p><strong>Giá cước:</strong> 5.000đ/ngày.</p><p><strong>Ưu đãi:</strong></p><p>- 500MB tốc độ cao sử dụng đến 24h cùng ngày đăng ký, hết lưu lượng truy cập theo gói Mobile Internet đang sử dụng (nếu có).</p><p>- <i><strong>MUA 2 TẶNG 1</strong></i>: Cứ mỗi 2 lần đăng ký trong ngày sẽ được tặng thêm 500MB sử dụng đến 24h.</p><p>- Gói cước gia hạn hàng ngày, lưu lượng còn lại sẽ được bảo lưu khi gia hạn thành công.</p><p>&nbsp;</p><p><strong>Đăng ký</strong>: Bấm \"Đăng ký\" / Soạn <strong>ST5K </strong>gửi <strong>191 </strong>/ Bấm gọi *098*14#</p><p><strong>Tặng gói cước</strong>: Bấm \"Tặng gói\" / Soạn TANG &lt;dấu cách&gt; ST5K &lt;dấu cách&gt; Số thuê bao B gửi 191. Gói được tặng không gia hạn tự động.</p><p><strong>Hủy gia hạn</strong>: Bấm \"Hủy\" / Soạn <strong>HUY ST5K </strong>gửi <strong>191</strong></p><p><strong>Hủy gói cước</strong>: <strong>HUYDATA ST5K </strong>gửi <strong>191 </strong><i>(Xác nhận Y gửi 191).</i></p>', 5000, 15, '1 ngày', 1),
(31, 1, 'SD90', '<p><strong>Giá cước:&nbsp;</strong></p><p>-TB trả trước 90.000đ/30 ngày.</p><p>-TB trả sau 90.000đ/tháng.</p><p><strong>Ưu đãi:</strong> 45GB (1,5GB/ngày).</p><p>Gói cước gia hạn sau 30 ngày với thuê bao trả trước hoặc khi hết tháng với thuê bao trả sau.</p><p><i>Đăng ký: </i>Soạn <strong>SD90 </strong>gửi <strong>191 </strong>hoặc *098*8823#.</p><p><i>Hủy gia hạn: </i>Soạn <strong>HUY </strong>gửi <strong>191</strong>.</p><p><i>Hủy gói cước:</i> Soạn <strong>HUYDATA </strong>gửi <strong>191</strong>.</p>', 90000, 10, '30 ngày', 1),
(32, 2, '6MP30X', '<p><strong>6MP30X:</strong> 180.000đ/180 ngày&nbsp;</p><p><strong>Ưu đãi:&nbsp;</strong></p><p>- Mỗi chu kỳ 30 ngày được miễn phí 10 phút đầu tiên của tất cả các cuộc gọi nội mạng, tối đa 500 phút. Từ phút thứ 11 của các cuộc gọi hoặc khi hết 500 phút, cước gọi nội mạng tính theo gói cước Quý khách đang sử dụng - Gói cước gia hạn sau 180 ngày.&nbsp;</p><p><i><strong>Đăng ký (từ 0h - 23h):</strong></i> Bấm Đăng ký hoặc soạn <strong>6MP30X</strong> gửi <strong>109</strong>.&nbsp;</p><p><i><strong>Hủy gia hạn (từ 7h - 23h):</strong></i> Soạn <strong>HUYFT</strong> gửi <strong>109</strong>&nbsp;</p><p><i><strong>Hủy gói cước (từ 0h - 23h):</strong></i> Soạn <strong>HUY</strong> <strong>6MP30X</strong> gửi <strong>109</strong></p>', 180000, 10, '180 ngày', 1),
(33, 2, '12MP30X', '<p><strong>12MP30X: </strong>360.000đ/360 ngày&nbsp;</p><p><strong>Ưu đãi:</strong></p><p>&nbsp;- Mỗi chu kỳ 30 ngày được miễn phí 10 phút đầu tiên của tất cả các cuộc gọi nội mạng, tối đa 500 phút.&nbsp;</p><p>Từ phút thứ 11 của các cuộc gọi hoặc khi hết 500 phút, cước gọi nội mạng tính theo gói cước Quý khách đang sử dụng - Gói cước gia hạn sau 360 ngày.&nbsp;</p><p><i><strong>Đăng ký (từ 0h - 23h): </strong></i>Bấm Đăng ký hoặc soạn <strong>12MP30X</strong> gửi <strong>109</strong>.&nbsp;</p><p><i><strong>Hủy gia hạn (từ 7h - 23h):</strong></i> Soạn <strong>HUYFT</strong> gửi <strong>109</strong>&nbsp;</p><p><i><strong>Hủy gói cước (từ 0h - 23h): </strong></i>Soạn <strong>HUY</strong> <strong>12MP30X</strong> gửi <strong>109</strong></p>', 40000, 15, '360 ngày', 1),
(34, 2, '3MP30X', '<p><strong>3MP30X:</strong> 90.000đ/90 ngày&nbsp;</p><p><strong>Ưu đãi:&nbsp;</strong></p><p>- Mỗi chu kỳ 30 ngày được miễn phí 10 phút đầu tiên của tất cả các cuộc gọi nội mạng, tối đa 500 phút.&nbsp;</p><p>Từ phút thứ 11 của các cuộc gọi hoặc khi hết 500 phút, cước gọi nội mạng tính theo gói cước Quý khách đang sử dụng - Gói cước gia hạn sau 90 ngày.&nbsp;</p><p><i><strong>Đăng ký (từ 0h - 23h): </strong></i>Bấm Đăng ký hoặc soạn <strong>3MP30X</strong> gửi <strong>109</strong>.&nbsp;</p><p><i><strong>Hủy gia hạn (từ 7h - 23h):</strong></i> Soạn <strong>HUYFT</strong> gửi <strong>109</strong>&nbsp;</p><p><i><strong>Hủy gói cước (từ 0h - 23h):</strong></i> Soạn <strong>HUY</strong> <strong>3MP30X</strong> gửi <strong>109</strong></p>', 90000, 15, '90 ngày', 1),
(35, 2, 'MP50S', '<p><strong>MP50S</strong>: 50.000d/30 ngày miễn phí 10 phút/cuộc gọi nội mạng tối đa 400 phút và 20 phút gọi ngoại mạng, gia hạn sau 30 ngày.&nbsp;</p><p><i><strong>Đăng kí:</strong></i> bấm Đăng ký, soạn <strong>MP50S </strong>gửi <strong>109</strong>, bấm gọi *098*24#&nbsp;</p><p><i><strong>Hủy: </strong></i>Soạn <strong>HUYFT </strong>gửi <strong>109</strong></p>', 50000, 10, '30 ngày', 1),
(36, 1, '3N', '<p>Giá cước: 30.000đ/3 ngày&nbsp;</p><p>Ưu đãi:&nbsp;</p><p>- 15GB (5GB/ngày).</p><p>- Miễn phí nhắn tin nội mạng.</p><p>- Miễn phí 10 phút/cuộc gọi nội mạng, 15 phút gọi ngoại mạng.</p><p>- Miễn phí xem truyền hình trên ứng dụng TV360</p><p>- Gói cước gia hạn sau 3 ngày</p><p>Soạn 3N gửi 191 hoặc bấm gọi *098*989#</p><p>Hủy gia hạn: Soạn HUY 3N gửi 191</p><p>Hủy gói: HUYDATA 3N gửi 191</p>', 30, 20, '3', 1),
(37, 1, 'ST30K', '<p><strong>Giá cước:</strong> 30.000đ/7 ngày</p><p><strong>Ưu đãi:</strong></p><p>- Có ngay 7GB lưu lượng tốc độ cao sử dụng trong 7 ngày kể từ ngày đăng ký thành công. Hết lưu lượng truy cập theo gói Mobile Internet đang sử dụng (nếu có).</p><p>- Gói cước gia hạn khi hết chu kỳ, lưu lượng còn lại sẽ được bảo lưu khi gia hạn thành công.</p><p><strong>Đăng ký:</strong> Bấm \"Đăng ký\" / Soạn ST30K gửi 191 / Bấm gọi *098*7#hoặc *098*3077#</p><p><strong>Tặng gói cước:</strong> Bấm \"Tặng gói\" / Soạn TANG &lt;dấu cách&gt; ST30K &lt;dấu cách&gt; Số thuê bao B gửi 191. Gói được tặng không gia hạn tự động.</p><p><strong>Hủy gia hạn</strong>: Bấm \"Hủy\" / Soạn HUY ST30K gửi 191</p><p><strong>Hủy gói cước</strong>: Soạn HUYDATA ST30K gửi 191 (Xác nhận Y gửi 191)</p>', 30, 7, '7', 1),
(38, 1, 'SD90', '<p><strong>Ưu đãi</strong></p><p>Giá cước:.</p><p>-TB trả trước 90.000đ/30 ngày.</p><p>-TB trả sau 90.000đ/tháng.</p><p>Ưu đãi: 45GB (1,5GB/ngày).</p><p>Gói cước gia hạn sau 30 ngày với thuê bao trả trước hoặc khi hết tháng với thuê bao trả sau.</p><p>Đăng ký: Soạn SD90 gửi 191 hoặc *098*8823#.</p><p>Hủy gia hạn: Soạn HUY gửi 191.</p><p>Hủy gói cước: Soạn HUYDATA gửi 191.</p>', 90, 30, '30', 1),
(39, 1, 'SD120', '<p><strong>Ưu đãi</strong></p><p>Giá cước:.</p><p>- TB trả trước: 120.000đ/30 ngày.</p><p>- TB trả sau: 120.000đ/tháng.</p><p>Ưu đãi: 2GB/ngày.</p><p>Gói cước gia hạn sau 30 ngày với thuê bao trả trước hoặc khi hết tháng với thuê bao trả sau.</p><p>Đăng ký: Soạn SD120 gửi 191.</p><p>Hủy gia hạn: Soạn HUY gửi 191.</p><p>Hủy gói cước: Soạn HUYDATA gửi 191.</p>', 120, 30, '30', 1),
(40, 1, 'T7', '<p><strong>Ưu đãi</strong></p><p>Giá cước: 10.000đ/7 ngày&nbsp;</p><p>Ưu đãi:&nbsp;</p><p>- Truy cập không giới hạn lưu lượng ứng dụng TikTok.</p><p>- Gói cước gia hạn sau 7 ngày.</p><p>Đăng ký: Soạn T7 gửi 191 hoặc bấm gọi *098*1008#</p><p>Hủy gia hạn: Soạn HUY T7 gửi 191</p><p>Hủy gói: Soạn HUYDATA T7 gửi 191</p>', 10, 7, '7', 1),
(41, 1, 'YT7', '<p>Giá cước: 10.000đ/7 ngày&nbsp;</p><p>Ưu đãi:&nbsp;</p><p>- Truy cập không giới hạn lưu lượng ứng dụng YouTube.</p><p>- Gói cước gia hạn sau 7 ngày.</p><p>Đăng ký: Soạn YT7 gửi 191 hoặc bấm gọi *098*1058#</p><p>Hủy gia hạn: Soạn HUY YT7 gửi 191</p><p>Hủy gói: Soạn HUYDATA YT7 gửi 191</p>', 10, 7, '7', 1),
(42, 1, 'ST5KM', '<p><strong>Ưu đãi:</strong></p><p>- 1GB tốc độ cao sử dụng đến 24h cùng ngày đăng ký, hết lưu lượng truy cập theo gói Mobile Internet đang sử dụng (nếu có). Gói cước KHÔNG gia hạn hàng ngày.</p><p>- Hủy gói cước: HUYDATA ST5KM gửi 191; Xác nhận Y gửi 191 (Không được bảo lưu data khi hủy gói).</p>', 5000, 1, '1', 1),
(43, 1, 'FB7', '<p>Giá cước: 10.000đ/7 ngày&nbsp;</p><p>Ưu đãi:&nbsp;</p><p>- Truy cập không giới hạn lưu lượng ứng dụng Facebook và nhắn tin qua Messenger.</p><p>- Gói cước gia hạn sau 7 ngày.</p><p>Đăng ký: Soạn FB7 gửi 191 hoặc bấm gọi 098*370#</p><p>Hủy gia hạn: Soạn HUY FB7 gửi 191</p><p>Hủy gói: Soạn HUYDATA FB7 gửi 191</p>', 10, 7, '7', 1),
(44, 1, 'ST120K', '<p>Giá cước: 120.000đ/30 ngày đối với Thuê bao trả trước hoặc chu kỳ tháng đối với thuê bao trả sau.&nbsp;</p><p>(Đối với thuê bao trả sau: Đăng ký từ ngày 21 đến cuối tháng sẽ giảm 50% phí gói và có 2GB/ngày)</p><p>Ưu đãi:</p><p>- 60GB (2GB data tốc độ cao/ngày), hết 2GB/ngày ngừng truy cập.</p><p>- Miễn phí lưu trữ 25GB dữ liệu trên LifeBox</p><p>- Miễn phí xem phim trên ứng dụng TV360</p><p>- Ưu đãi sử dụng trong 30 ngày (trả trước), hết tháng (trả sau). Gói cước tự động gia hạn khi hết chu kỳ (Không bảo lưu data khi gia hạn thành công).</p>', 120, 30, '30', 1),
(45, 1, '6SD150', '<p>Giá cước: 900.000đ/180 ngày.</p><p>Ưu đãi: 540GB (3GB/ngày).</p><p>Gói cước gia hạn sau 180 ngày.</p><p>Đăng ký: Soạn 6SD150 gửi 191 hoặc *098*8830#.</p><p>Hủy gia hạn: Soạn HUY gửi 191.</p><p>Hủy gói cước: Soạn HUYDATA gửi 191.</p>', 900, 180, '180', 1),
(46, 2, 'MP15K', '<p>Giá cước: 15.000đ/3 ngày Ưu đãi: - Miễn phí 10 phút/cuộc gọi nội mạng sử dụng trong 3 ngày kể từ ngày đăng ký thành công. - Gói cước gia hạn khi hết chu kỳ. Đăng ký: Bấm Đăng ký hoặc soạn MP15K gửi 109, bấm gọi *098*798# Hủy gia hạn: Soạn HUYFT gửi 109</p>', 15000, 3, '3 ', 1),
(47, 2, 'S10', '<p><strong>Ưu đãi:</strong></p><p>- 500 tin nhắn nội mạng, sử dụng trong vòng 30 ngày kể từ ngày đăng ký</p><p>- Gói cước gia hạn tự động khi hết chu kỳ.</p><p><strong>Kiểm tra lưu lượng</strong>: Soạn KTS10 gửi 170</p><p><strong>Lấy hướng dẫn</strong>: Soạn HDS10 gửi 170</p><p><strong>Đăng ký:</strong> Bấm \"Đăng ký\" / Soạn S10 gửi 170 / Bấm *098# và làm theo hướng dẫn</p><p><strong>Hủy gia hạn:</strong> Bấm \"Hủy\" hoặc soạn tin HUYSMS gửi 170</p><p><strong>Hủy dịch vụ</strong>: Soạn HUY S10 gửi 170</p>', 10000, 30, '30', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

DROP TABLE IF EXISTS `khuyenmai`;
CREATE TABLE IF NOT EXISTS `khuyenmai` (
  `MaKM` int NOT NULL AUTO_INCREMENT,
  `MaLS` int NOT NULL,
  `TenKM` varchar(255) NOT NULL,
  `MoTa` text NOT NULL,
  `HinhAnh` varchar(225) NOT NULL,
  `GiaTriKM` int NOT NULL,
  `LoaiKM` int NOT NULL,
  `NgayBD` date NOT NULL,
  `NgayKT` date NOT NULL,
  `MaND` int NOT NULL,
  `NgayTao` date NOT NULL,
  `TrangThai` int NOT NULL,
  PRIMARY KEY (`MaKM`),
  KEY `ls_km` (`MaLS`),
  KEY `lkm_km` (`LoaiKM`),
  KEY `nd_km` (`MaND`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`MaKM`, `MaLS`, `TenKM`, `MoTa`, `HinhAnh`, `GiaTriKM`, `LoaiKM`, `NgayBD`, `NgayKT`, `MaND`, `NgayTao`, `TrangThai`) VALUES
(31, 3, 'Tổng đài âm nhạc 1221', '<p><strong>Chi tiết</strong></p><p>Tổng đài âm nhạc 1221 là kênh âm nhạc giải trí tổng hợp: Nghe nhạc số, tải nhạc chờ, gửi tặng một ca khúc hoặc bản nhạc kèm lời nhắn ghi âm từ thuê bao Viettel tới các thuê bao khác (Viettel, di động Mobifone, di động Vinaphone) hoặc giải trí cùng những câu chuyện cười đặc sắc và cập nhật tin tức mới hàng ngày.</p><p>- Để đăng ký&nbsp;</p><p>+ Gói ngày, soạn tin XN1 gửi 1221 (2.000đ/ngày, gia hạn theo ngày)</p><p>+ Gói tuần, soạn tin XN5 gửi 1221 (5.000đ/tuần, gia hạn theo tuần)</p><p>+ Gói 30 ngày, soạn tin XN15 gửi 1221 (15.000đ/30 ngày, gia hạn sau 30 ngày)</p><p>Trường hợp tài khoản của khách hàng tại thời điểm trừ cước không đủ cước theo giá gói, trừ cước 2 lần trong chu kì (mỗi lần 50%).&nbsp;</p><p>Chi tiết gọi 198 (miễn phí)</p>', 'km5.png', 20, 1, '2024-04-03', '2024-04-12', 38, '2024-04-02', 1),
(32, 3, 'Trò chơi trúng thưởng', '<p><strong>Chi tiết&nbsp;</strong></p><p><strong>Trò chơi trúng thưởng</strong>&nbsp;(Lucky Topup - Nạp thẻ may mắn) là dịch vụ cung cấp hệ thống câu hỏi liên quan tới kiến thức văn hóa, xã hội… cho khách hàng trả lời hàng ngày để tích điểm có cơ hội trúng thưởng 1 triệu đồng mỗi ngày.</p><p>Để sử dụng dịch vụ, soạn&nbsp;<strong>XN</strong>&nbsp;gửi&nbsp;<strong>9268</strong></p><p>Cước phí gói ngày: 2.000đ/ngày, gia hạn theo ngày</p><p>Trường hợp tài khoản của khách hàng tại thời điểm trừ cước không đủ cước theo giá gói, trừ cước 2 lần trong chu kì (mỗi lần 50%).</p><p>Chi tiết thể lệ http://xoso888.com.vn</p><p>Chi tiết gọi 198 (miễn phí)</p>', 'km2.jpg', 15, 4, '2024-04-12', '2024-04-21', 38, '2024-04-11', 1),
(33, 2, 'Thông tin Tài chính', '<p><strong>Chi tiết</strong></p><p>Dịch vụ thông tin Tài chính là chùm dịch vụ SMS giúp bạn tra cứu thông tin thị trường tài chính như Tỷ giá ngoại tệ, thông tin thị trường chứng khoán, thông tin giá vàng trong nước và quốc tế cập nhật từng ngày.</p><p>- Đăng ký:</p><p>+ Nhận tin giá Vàng (trong nước): Soạn VANG gửi 5055</p><p>+ Thông tin thị trường: Soạn TG gửi 5055</p><p>- Cước dịch vụ:</p><p>+ Nhận tin giá Vàng (trong nước): 2.000 đồng/2SMS/ngày, gia hạn theo ngày</p><p>+ Thông tin thị trường: 2.000 đồng/3SMS/ngày, gia hạn theo ngày</p><p>Trường hợp tài khoản của khách hàng tại thời điểm trừ cước không đủ cước theo giá gói, trừ cước 2 lần trong chu kì (mỗi lần 50%).</p><p>Chi tiết liên hệ: 198 (miễn phí).</p>', 'khuyenmai3.jpg', 20, 1, '2024-04-14', '2024-04-28', 38, '2024-04-11', 0),
(34, 3, 'Manwa - Truyện tranh', '<p><strong>Chi tiết</strong></p><p><strong>Manwa</strong>&nbsp;là dịch vụ đọc truyện tranh bản quyền số 1 Việt Nam trên di động. Dịch vụ cung cấp kho truyện tranh phong phú, hấp dẫn, đa dạng gồm các truyện tranh có bản quyền trong nước và quốc tế. Khách hàng có thể truy cập và đọc truyện mọi lúc, mọi nơi trên điện thoại di động (trên wap và app dịch vụ).</p><p><strong>- Đăng ký</strong></p><p>+ Gói data Ngày: Soạn&nbsp;<strong>DKB</strong>&nbsp;gửi&nbsp;<strong>5282</strong></p><p>+ Gói data Tuần: Soạn&nbsp;<strong>DKB7</strong>&nbsp;gửi&nbsp;<strong>5282</strong></p><p>+ Gói data Tháng: Soạn&nbsp;<strong>DKB30</strong>&nbsp;gửi&nbsp;<strong>5282</strong></p><p><strong>- Giá cước:</strong></p><p>+ Gói data ngày: 3.000đ/ngày, gia hạn theo ngày</p><p>+ Gói data tuần: 15.000đ/tuần, gia hạn theo tuần</p><p>+ Gói data tháng: 50.000đ/tháng, gia hạn theo tháng</p><p>Trường hợp tài khoản của khách hàng tại thời điểm trừ cước không đủ cước theo giá gói, trừ cước 2 lần trong chu kì (mỗi lần 50%).</p><p>Điều kiện sử dụng: Đăng ký thành công dịch vụ Mobile internet.</p><p>Trường hợp tải ứng dụng: Thiết bị sử dụng hệ điều hành Android 4.4 trở lên và iOS 9.0 trở lên có hỗ trợ xem video.</p><p>- Chi tiết gọi 198 (miễn phí).</p>', 'km11.png', 30, 1, '2024-04-11', '2024-04-21', 38, '2024-04-11', 0),
(35, 2, 'MyClip - Mạng xã hội Video', '<p><strong>Chi tiết</strong></p><p>Myclip là MXH video với hàng triệu video giải trí đặc sắc, đa dạng thể loại hài, nhạc, phim, thể thao...</p><p>Người dùng có thể thoải mái xem video giải trí, xem livestream, tương tác, hát karaoke (tính năng chỉ có trên app), download/upload video yêu thích và chia sẻ với cộng đồng.</p><p>Tải app Myclip để sử dụng mượt hơn tại:&nbsp;<a href=\"http://myclip.vn/app\">http://myclip.vn/app</a></p><p>Hãy trải nghiệm chất lượng dịch vụ tốt nhất với ưu đãi Không giới hạn DATA 3G/4G 100% tốc độ cao Viettel</p><p>- Gói data ngày: Soạn tin: DK gửi 9062 (3.000đ/ngày, gia hạn theo ngày)</p><p>- Gói data tuần: Soạn tin: DK7 gửi 9062 (10.000đ/tuần, gia hạn theo tuần)</p><p>- Gói data tháng: Soạn tin: DK30 gửi 9062 (35.000đ/30 ngày, gia hạn sau 30 ngày).</p><p>Trường hợp tài khoản của khách hàng tại thời điểm trừ cước không đủ cước theo giá gói, trừ cước 2 lần trong chu kì (mỗi lần 50%).</p><p>Chi tiết liên hệ: 198 (miễn phí).</p>', 'km12.png', 20, 1, '2024-04-11', '2024-04-28', 38, '2024-04-11', 0),
(36, 3, 'Thanh toán trên Google Play bằng tài khoản di động', '<p><strong>Chi tiết</strong></p><p>Dịch vụ thanh toán trên Google Play cho phép thuê bao di động Viettel mua/ thanh toán các ứng dụng trên Google Play bằng cách sử dụng tài khoản gốc di động (với thuê bao trả trước) hoặc tài khoản IPAY (với thuê bao trả sau).</p><p><strong>1. Điều kiện:&nbsp;</strong>Thuê bao trả trước và trả sau mạng Viettel sử dụng điện thoại hệ điều hành Android.</p><p><strong>2. Hạn mức tiêu dùng:</strong></p><p>- Thank toán bằng tài khoản IPAY: Tối đa 5.000.000 VNĐ/thuê bao/tháng.</p><p>- Thanh toán bằng tài khoản gốc di động: tối đa 3.000.000 VNĐ/thuê bao/giao dịch và hạn mức tối đa 5.000.000 VNĐ/thuê bao/tháng.</p><p><strong>3. Cước phí dịch vụ:&nbsp;</strong></p><p>- Giá cước được hiển thị cho từng ứng dụng trên Google Play. Dịch vụ thu thêm 10% thuế và phí khi thanh toán qua tài khoản di động.</p><p><strong>4. Hướng dẫn sử dụng:</strong></p><p>Để sử dụng được Dịch vụ, Quý khách hàng cần thực hiện cài đặt trên Google Play, xác thực số thuê bao thực hiện qua SMS. Sau đó người dùng có thể thực hiện mua/tải ứng dụng trên internet di động hoặc dùng qua mạng wifi.</p><p>- B1: Vào ứng dụng Google Play, chọn biểu tượng Avatar của Quý khách -&gt; Chọn Thanh toán và gói thuê bao.</p><p>- B2: Chọn phương thức thanh toán -&gt; Thêm phương thức thanh toán của Viettel Telecom -&gt; Hệ thống hiển thị thông báo \"bật thanh toán Viettel Telecom\".</p><p>Google Play sẽ gửi tin nhắn vào số điện thoại để xác nhận rằng Quý khách đã thêm phương thức thanh toán thành công.</p><p>- B3: Khi giao diện hiển thị xác nhận chi tiết thanh toán của Viettel Telecom -&gt; Lưu.</p><p>- B4: Vào ứng dụng để mua và thanh toán.&nbsp;</p><p><i>Chi tiết về dịch vụ Quý khách vui lòng gọi 198 (miễn phí).</i></p>', 'khuyenmai5.jpg', 20, 4, '2024-04-14', '2024-04-28', 38, '2024-04-11', 0),
(37, 1, 'Dịch vụ Ứng ngày', '<p><strong>Chi tiết</strong></p><p>Dịch vụ Ứng ngày là dịch vụ cho phép khách hàng chủ động đổi tiền sang ngày sử dụng hoặc tặng ngày sử dụng cho thuê bao khác thuộc đối tượng thuê bao Economy.</p><p><strong>- Đăng ký:</strong></p><p>&nbsp; &nbsp; &nbsp; &nbsp;+ Ứng tự động, soạn&nbsp;<strong>DK</strong>&nbsp;gửi&nbsp;<strong>5225</strong></p><p>&nbsp; &nbsp; &nbsp; &nbsp;+ Hủy ứng tự động, soạn&nbsp;<strong>HUY</strong>&nbsp;gửi&nbsp;<strong>5225</strong></p><p>&nbsp; &nbsp; &nbsp; &nbsp;+ Mua ngày sử dụng, soạn:&nbsp;<strong>N Số_ngày_mua</strong>&nbsp;gửi&nbsp;<strong>5225</strong></p><p><strong>Ví dụ</strong>: để mua 2 ngày sử dụng, soạn:<strong>&nbsp;N2&nbsp;</strong>gửi<strong>&nbsp;5225</strong></p><p>&nbsp; &nbsp; &nbsp; &nbsp;+ Tặng ngày sử dụng, soạn:&nbsp;<strong>N Số_ngày_mua STB_nhận</strong>&nbsp;gửi&nbsp;<strong>5225</strong></p><p><strong>Ví dụ:&nbsp;</strong>để tặng 10 ngày sử dụng cho thuê bao 0983xxx xxx, soạn:&nbsp;<strong>N 10 0983xxx xxx</strong>&nbsp;gửi&nbsp;<strong>5225</strong></p><p>&nbsp; &nbsp; &nbsp; + Mua ngày sử dụng cho tài khoản khuyến mại, soạn:&nbsp;<strong>K Số_Ngày_Mua</strong>&nbsp;gửi&nbsp;<strong>5225</strong></p><p><strong>Ví dụ:&nbsp;</strong>Để mua 2 ngày sử dụng cho TKKM, soạn:&nbsp;<strong>K 2</strong>&nbsp;gửi&nbsp;<strong>5225</strong></p><p><strong>- Cước dịch vụ:</strong></p><p>&nbsp; &nbsp; &nbsp;+ Cước đổi ngày: 1.000đ/ngày</p><p>&nbsp; &nbsp; &nbsp;+ Cước gửi đầu số: Miễn phí.</p><p>&nbsp; &nbsp; &nbsp;+ Cước ứng tự động: 3.000đ/3 ngày sử dụng</p><p>Lưu ý: Trường hợp khách hàng không đủ tiền để gia hạn 3 ngày sử dụng: hệ thống thực hiện gia hạn 2 ngày hoặc 1 ngày (Tùy theo số tiền còn lại trong tài khoản gốc của khách hàng).</p>', 'km14.png', 20, 1, '2024-04-14', '2024-04-28', 38, '2024-04-10', 0),
(38, 2, 'Thoại Quốc tế giá rẻ', '<p><strong>Chi tiết</strong></p><p>Dịch vụ gọi quốc tế giá rẻ giúp khách hàng tiết kiệm lên đến 82% so với giá cước gọi quốc tế thông thường khi gọi tới số thuê bao cố định, di động trên toàn thế giới. Để xem thông tin chi tiết và đăng ký các gói cước phù hợp vui lòng&nbsp;<strong>bấm *133# và làm theo hướng dẫn.</strong></p><p>- Cước phí:</p><ul><li>&nbsp; &nbsp;<strong>IFT10: 10.000đ/ngày</strong>&nbsp;<strong>được miễn phí 10 phút gọi&nbsp;</strong>tới Ấn Độ, Canada, Hàn Quốc, Hồng Kông, Malaysia, Mỹ, Singapore, Trung Quốc.</li><li>&nbsp; &nbsp;I<strong>FT20: 20.000đ/ngày</strong>&nbsp;<strong>được miễn phí 8 phút gọi&nbsp;</strong>tới&nbsp;France (Pháp), Indonesia, Norway (Na Uy), Japan (Nhật), Australia (Úc),Taiwan (Đài loan) và Saudi Arabia (Ả rập Xê út)</li><li>&nbsp; &nbsp;<strong>QT199: 199.000đ/tháng được miễn phí 250 phút gọi</strong>&nbsp;tới Canada, Hàn Quốc, Hồng Kông, Mỹ, Singapore, Trung Quốc và mạng cố định tại Đài Loan.</li><li>&nbsp; &nbsp;&nbsp;<strong>QT1: 10.000đ/ngày được miễn phí 20 phút gọi tới 10 nước</strong>&nbsp;Asean (Lào, Campuchia, Myanmar, Đông Timor, Thái Lan, Indonesia, Malaysia, Singapore, Brunei, Philippines) và Trung Quốc, Hàn Quốc, Nhật Bản, Mỹ, Úc</li><li>&nbsp; &nbsp;<strong>QT30:&nbsp; 100.000đ/tháng được miễn phí 200 phút gọi tới 10 nước</strong>&nbsp;Asean (Lào, Campuchia, Myanmar, Đông Timor, Thái Lan, Indonesia, Malaysia, Singapore, Brunei, Philippines) và Trung Quốc, Hàn Quốc, Nhật Bản, Mỹ, Úc</li><li>&nbsp; &nbsp;<strong>TQ10K: phí đăng ký 0đ. Cước phí tối đa 10.000đ/cuộc</strong>&nbsp;tới Trung Quốc. Cuộc gọi tự ngắt khi chạm ngưỡng 20 phút/cuộc</li></ul><p>- Hướng dẫn quay số: [00] + [Mã quốc gia] + [Mã vùng] + [Số điện thoại]</p>', 'km8.png', 20, 1, '2024-04-14', '2024-04-28', 38, '2024-04-11', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaigoicuoc`
--

DROP TABLE IF EXISTS `loaigoicuoc`;
CREATE TABLE IF NOT EXISTS `loaigoicuoc` (
  `MaLGC` int NOT NULL AUTO_INCREMENT,
  `TenLGC` varchar(255) NOT NULL,
  `TrangThai` int NOT NULL,
  PRIMARY KEY (`MaLGC`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `loaigoicuoc`
--

INSERT INTO `loaigoicuoc` (`MaLGC`, `TenLGC`, `TrangThai`) VALUES
(1, 'Gói Cước Data', 1),
(2, 'Gói Thoại SMS', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaikhuyenmai`
--

DROP TABLE IF EXISTS `loaikhuyenmai`;
CREATE TABLE IF NOT EXISTS `loaikhuyenmai` (
  `MaLKM` int NOT NULL AUTO_INCREMENT,
  `TenLKM` varchar(50) NOT NULL,
  `DonViKM` varchar(20) NOT NULL,
  `TrangThai` tinyint(1) NOT NULL,
  PRIMARY KEY (`MaLKM`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `loaikhuyenmai`
--

INSERT INTO `loaikhuyenmai` (`MaLKM`, `TenLKM`, `DonViKM`, `TrangThai`) VALUES
(1, 'Giảm giá', '%', 1),
(2, 'ABC', '%', 0),
(3, 'ASSD', 'GB', 0),
(4, 'Data', 'GB', 1),
(6, 'ahaa', '%', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisim`
--

DROP TABLE IF EXISTS `loaisim`;
CREATE TABLE IF NOT EXISTS `loaisim` (
  `MaLS` int NOT NULL AUTO_INCREMENT,
  `TenLS` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `MaGC` int NOT NULL,
  `GiaGoc` double NOT NULL,
  `GiaBan` double NOT NULL,
  `LuotMua` int NOT NULL,
  `TrangThai` tinyint(1) NOT NULL,
  PRIMARY KEY (`MaLS`),
  KEY `gc_ls` (`MaGC`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisim`
--

INSERT INTO `loaisim` (`MaLS`, `TenLS`, `MaGC`, `GiaGoc`, `GiaBan`, `LuotMua`, `TrangThai`) VALUES
(1, 'Sim Số Đẹp', 23, 50000, 5000, 3, 1),
(2, 'Sim Thường', 23, 50000, 50000, 4, 1),
(3, 'Sim Data', 23, 50000, 40000, 4, 1),
(21, 'Sim Data', 47, 50000, 50000, 0, 0),
(22, 'ádads', 46, 10000, 10000, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

DROP TABLE IF EXISTS `nguoidung`;
CREATE TABLE IF NOT EXISTS `nguoidung` (
  `MaND` int NOT NULL AUTO_INCREMENT,
  `TenDangNhap` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `HoTen` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Sdt` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `MatKhau` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `MaQ` int NOT NULL,
  `TrangThai` tinyint NOT NULL,
  `HinhAnh` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `DiaChi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`MaND`),
  KEY `q_nd` (`MaQ`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`MaND`, `TenDangNhap`, `HoTen`, `Sdt`, `MatKhau`, `MaQ`, `TrangThai`, `HinhAnh`, `DiaChi`) VALUES
(33, 'admin', 'Admin', '0147852369', '6ad4664ba23eac71b5ef5e826ea0c6cd', 1, 1, 'user2.jpg', 'An Giang'),
(35, 'kh01', 'Lê Thị Lẹ', '1231231230', 'be7cbc242abe36c45b24d2759e928583', 2, 1, '1.jpg', 'Châu Thành, An Giang'),
(37, 'kh', 'Nguyễn Văn A', '0147852369', 'fa46ec0b4924e8c2194a53ef61b94039', 2, 1, '1.jpg', 'An Giang'),
(38, 'ad', 'Lâm Tường Huy', '0147852369', '523af537946b79c4f8369ed39ba78605', 1, 1, 'testimonial-1.jpg', 'Chợ Mới, An Giang'),
(39, 'pntn', 'Nguyễn Trường Nhân', '0257895461', 'deff3c14ea5fb443c140c91e3dfc761c', 1, 1, '1.jpg', 'Long Xuyên, An Giang'),
(40, 'ltmp', 'Lê Thị Mỹ Phụng', '0123321123', 'bb248e988aae701da0e0e8bfa16ae3d5', 2, 1, 'user_md.png', 'Chợ Mới, An Giang'),
(41, 'kh001', 'Lê Thị Mỹ Hạnh', '0000001112', '39c62f0677b32c7be648f8c500bfd9f2', 2, 1, 'user_md.png', 'Mỹ Hòa Hưng, An Giang'),
(42, 'kh002', 'Đào Hoa Nữ', '0159875364', '9e303b169ec3a66692916ca2fafcd120', 2, 1, 'user_md.png', 'An Giang'),
(45, 'kh003', 'Đào Hoa Nữ', '0121212121', 'ef93e2322e03aacbd1ff345383f6d181', 2, 1, 'user_md.png', 'null'),
(46, 'nv1', 'Nhân Viên 1', '0111222111', 'b81fbabe373a8a0a80df5da5602e702e', 3, 1, 'testimonial-2.jpg', 'Chợ Mới, An Giang'),
(47, 'nvn', 'Nguyễn Văn Nhân', '0111111111', '3bb8c28ccff4138ef47d3c895849ca3c', 3, 1, 'km2.jpg', 'An Giang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanhoi`
--

DROP TABLE IF EXISTS `phanhoi`;
CREATE TABLE IF NOT EXISTS `phanhoi` (
  `MaPH` int NOT NULL AUTO_INCREMENT,
  `MaND` int NOT NULL,
  `TenPH` tinyint(1) NOT NULL,
  PRIMARY KEY (`MaPH`),
  KEY `nd_ph` (`MaND`)
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
  `TrangThai` tinyint(1) NOT NULL,
  PRIMARY KEY (`MaQC`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quangcao`
--

INSERT INTO `quangcao` (`MaQC`, `HinhAnh`, `Url`, `TrangThai`) VALUES
(1, 'slide2.png', '#', 1),
(2, 'slide1.png', 'j', 1),
(3, 'side9.png', '#', 1),
(4, 'side1.png', '#', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

DROP TABLE IF EXISTS `quyen`;
CREATE TABLE IF NOT EXISTS `quyen` (
  `MaQ` int NOT NULL AUTO_INCREMENT,
  `TenQ` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`MaQ`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`MaQ`, `TenQ`) VALUES
(1, 'Quản Trị Viên'),
(2, 'Khách Hàng'),
(3, 'Nhân Viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sim`
--

DROP TABLE IF EXISTS `sim`;
CREATE TABLE IF NOT EXISTS `sim` (
  `MaSim` int NOT NULL AUTO_INCREMENT,
  `SoSim` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `MaLS` int NOT NULL,
  `TinhTrang` tinyint(1) NOT NULL DEFAULT '1',
  `LoaiThueBao` tinyint(1) NOT NULL,
  PRIMARY KEY (`MaSim`),
  KEY `ls_s` (`MaLS`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sim`
--

INSERT INTO `sim` (`MaSim`, `SoSim`, `MaLS`, `TinhTrang`, `LoaiThueBao`) VALUES
(17, '0123456789', 1, 0, 1),
(19, '0159263478', 1, 0, 1),
(20, '0123654789', 1, 0, 0),
(25, '0327104851', 1, 0, 0),
(26, '0384480754', 1, 1, 0),
(27, '0355109842', 2, 1, 0),
(28, '0336325643', 2, 0, 1),
(29, '0869255634', 1, 1, 1),
(30, '0394324756', 1, 1, 1),
(31, '0398072912', 1, 1, 1),
(32, '0358641276', 1, 0, 1),
(33, '0338415129', 1, 0, 1),
(34, '0334700953', 2, 1, 1),
(35, '0357951071', 2, 0, 1),
(36, '0376337521', 2, 0, 1),
(37, '0359649730', 2, 0, 1),
(38, '0342502361', 2, 0, 1),
(39, '0367559641', 2, 0, 1),
(40, '0999999897', 2, 0, 1),
(41, '0367559641', 3, 0, 0),
(42, '0367559641', 2, 0, 1),
(43, '0111122454444', 3, 0, 1),
(45, '0327104851', 3, 1, 1),
(51, '0327104851', 3, 0, 1),
(52, '0144989898989', 2, 0, 1),
(53, '01478522369', 3, 1, 1),
(56, '0111111111', 2, 0, 1),
(57, '0121212121', 3, 0, 1),
(58, '02121211212', 2, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `traloidanhgia`
--

DROP TABLE IF EXISTS `traloidanhgia`;
CREATE TABLE IF NOT EXISTS `traloidanhgia` (
  `MaTL` int NOT NULL AUTO_INCREMENT,
  `TraLoi` text NOT NULL,
  `MaDG` int NOT NULL,
  `MaND` int NOT NULL,
  `NgayTL` date NOT NULL,
  PRIMARY KEY (`MaTL`),
  KEY `nd_tl` (`MaND`),
  KEY `dg_tl` (`MaDG`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `traloidanhgia`
--

INSERT INTO `traloidanhgia` (`MaTL`, `TraLoi`, `MaDG`, `MaND`, `NgayTL`) VALUES
(31, '<p>Bạn cần hỗ trợ gì ạ???</p>', 60, 38, '2024-04-22');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_nd` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `km_dg` FOREIGN KEY (`MaKM`) REFERENCES `khuyenmai` (`MaKM`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `nd_dh` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `donhang_ct`
--
ALTER TABLE `donhang_ct`
  ADD CONSTRAINT `donhangct_dh` FOREIGN KEY (`MaDH`) REFERENCES `donhang` (`MaDH`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `s_dh` FOREIGN KEY (`MaS`) REFERENCES `sim` (`MaSim`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `giohang_ct`
--
ALTER TABLE `giohang_ct`
  ADD CONSTRAINT `giohangct_nd` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `s_gh` FOREIGN KEY (`MaS`) REFERENCES `sim` (`MaSim`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `goicuoc`
--
ALTER TABLE `goicuoc`
  ADD CONSTRAINT `lgc_gc` FOREIGN KEY (`MaLGC`) REFERENCES `loaigoicuoc` (`MaLGC`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD CONSTRAINT `lkm_km` FOREIGN KEY (`LoaiKM`) REFERENCES `loaikhuyenmai` (`MaLKM`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ls_km` FOREIGN KEY (`MaLS`) REFERENCES `loaisim` (`MaLS`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `nd_km` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `loaisim`
--
ALTER TABLE `loaisim`
  ADD CONSTRAINT `gc_ls` FOREIGN KEY (`MaGC`) REFERENCES `goicuoc` (`MaGC`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `q_nd` FOREIGN KEY (`MaQ`) REFERENCES `quyen` (`MaQ`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `phanhoi`
--
ALTER TABLE `phanhoi`
  ADD CONSTRAINT `nd_ph` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `sim`
--
ALTER TABLE `sim`
  ADD CONSTRAINT `ls_s` FOREIGN KEY (`MaLS`) REFERENCES `loaisim` (`MaLS`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `traloidanhgia`
--
ALTER TABLE `traloidanhgia`
  ADD CONSTRAINT `dg_tl` FOREIGN KEY (`MaDG`) REFERENCES `danhgia` (`MaDG`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `nd_tl` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
