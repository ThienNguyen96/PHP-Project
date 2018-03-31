-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 31, 2018 lúc 10:11 AM
-- Phiên bản máy phục vụ: 10.1.25-MariaDB
-- Phiên bản PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pizza`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `MaLoaiSP` int(11) NOT NULL,
  `TenLoai` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`MaLoaiSP`, `TenLoai`, `MoTa`) VALUES
(1, 'Pizza', '                        	Đây là mô tả về loại sản phẩm Pizza                        '),
(2, 'Cocacola', 'Đây là mô tả về loại sản phẩm Cocacola'),
(7, 'Pessi', 'Đây là mô tả về loại sản phẩm Pessi'),
(8, '7up', 'Đây là mô tả về sản phẩm seven up'),
(11, 'Mirinda', '                        	                        	                        	\r\n       đây là mô tả về mirinda                                                               ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` int(11) NOT NULL,
  `TenSanPham` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Anh` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `DonGia` decimal(10,0) NOT NULL,
  `ThongTin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaLoaiSP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSanPham`, `SoLuong`, `Anh`, `DonGia`, `ThongTin`, `MaLoaiSP`) VALUES
(1, 'Pizza Hut Loại 1', 20, 'pi1.jpg', '500000', '										Thông Tin Về Pizza Loại 1									', 1),
(2, 'Pizza Hut 2', 10, 'pi2.jpg', '34000', 'Thông Tin Về Pizza Hut 2', 1),
(5, 'Pizza Hut Loại 3', 40, 'pi3.jpg', '50000', 'Thông Tin Về Pizza Loại 3', 1),
(6, 'Pizza Hut 4', 120, 'pi4.jpg', '34000', 'Thông Tin Về Pizza Hut 4', 1),
(7, 'Pizza Hut Loại 5', 60, 'pi5.jpg', '12000', '																				Thông Tin Về Pizza Loại 5																		', 1),
(8, 'Pizza Hut 6', 10, 'pi6.jpg', '30000', 'Thông Tin Về Pizza Hut 6', 1),
(9, 'Pizza Hut Loại 7', 20, 'pi7.jpg', '120000', 'Thông Tin Về Pizza Loại 7', 1),
(10, 'Pizza Hut 8', 15, 'pi8.jpg', '34000', 'Thông Tin Về Pizza Hut 8', 1),
(11, 'Pessi 1', 12, 'ps1.jpg', '12000', 'Thông Tin Pessi 1', 7),
(12, 'Pessi 1', 32, 'ps1.jpg', '12000', 'Thông Tin Pessi 1', 7),
(13, 'Pessi 2', 40, 'ps2.jpg', '10000', 'Thông Tin Pessi 2', 7),
(14, 'Pessi 3', 60, 'ps3.jpg', '8000', 'Thông Tin Pessi 3', 7),
(15, 'Pessi 4', 86, 'ps4.png', '15000', 'Thông Tin Pessi 4', 7),
(16, 'Pessi 5', 50, 'ps5.jpg', '20000', '																																																																																																																																		Thông Tin Pessi 5																																																																																																																					', 7),
(17, 'CoCaIn', 10, 'cc1.jpg', '20000', 'Đây  Là Mô Tả Về CoCain', 2),
(18, 'CoCaCoLa Loại To', 20, 'cc2.jpg', '20000', 'Đây là mô tả về cocacola loại to ', 2),
(19, 'MiRinDa Loại Lùn', 50, 'mrd2.jpg', '20000', 'Đây là mô tả về mirinda', 11),
(20, 'MiRinDa Loại 3', 20, 'mrd3.jpg', '30000', 'Đây là mô tả về mirinda loại 3', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `TenTaiKhoan` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MatKhau` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PhanQuyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `TenTaiKhoan`, `MatKhau`, `PhanQuyen`) VALUES
(1, 'admin', 'root', 1),
(36, 'NguyenM', '1234', 0),
(43, 'Messi', '12345', 0),
(44, 'Hai', 'root', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`MaLoaiSP`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `sanpham_loaisp` (`MaLoaiSP`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `MaLoaiSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_loaisp` FOREIGN KEY (`MaLoaiSP`) REFERENCES `loaisp` (`MaLoaiSP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
