-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 19, 2023 lúc 04:58 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duanmau1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(9) NOT NULL,
  `madh` varchar(20) NOT NULL,
  `iduser` int(6) NOT NULL,
  `nguoidat_ten` varchar(50) NOT NULL,
  `nguoidat_email` varchar(50) NOT NULL,
  `nguoidat_tel` varchar(20) NOT NULL,
  `nguoidat_diachi` varchar(100) NOT NULL,
  `nguoinhan_ten` varchar(50) DEFAULT NULL,
  `nguoinhan_diachi` varchar(100) DEFAULT NULL,
  `nguoinhan_tel` varchar(20) DEFAULT NULL,
  `total` int(9) NOT NULL,
  `ship` int(6) NOT NULL DEFAULT 0,
  `voucher` int(6) NOT NULL DEFAULT 0,
  `tongthanhtoan` int(9) NOT NULL,
  `pttt` tinyint(1) NOT NULL COMMENT '0: COD; 1: ck; 2: ví điện tử'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `madh`, `iduser`, `nguoidat_ten`, `nguoidat_email`, `nguoidat_tel`, `nguoidat_diachi`, `nguoinhan_ten`, `nguoinhan_diachi`, `nguoinhan_tel`, `total`, `ship`, `voucher`, `tongthanhtoan`, `pttt`) VALUES
(1, 'sdfsfds', 1, 'fsdfdsfds', 'fsdfdsf', 'fsdfdsfds', 'fsdfdsf', 'fsdfdsf', 'fsdfdsf', 'fsdfds', 323, 333, 333, 5435, 3),
(2, 'Zhop141020233661', 2, 'HO TB 2', 'hotb2@fe.edu.vn', '0918326706', 'Quận 8 TPHCM', '', '', '', 400, 0, 0, 400, 1),
(3, 'Zhop141020232082', 6, '', 'quan@gmail.com', '', '', '', '', '', 800, 0, 0, 800, 1),
(4, 'Zhop141020237190', 6, '', 'quan@gmail.com', '013464988', 'Tòa T, CVPM QT', '', '', '', 1000, 0, 0, 1000, 1),
(5, 'Zhop141020238874', 6, '', 'quan@gmail.com', '013464988', 'Tòa T, CVPM QT', '', '', '', 1400, 0, 0, 1400, 1),
(6, 'Zhop141020234206', 6, '', 'quan@gmail.com', '013464988', 'Tòa T, CVPM QT', '', '', '', 1400, 0, 0, 1400, 1),
(7, 'Zhop141020231202', 6, '', 'quan@gmail.com', '013464988', 'Tòa T, CVPM QT', '', '', '', 300, 0, 0, 300, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(6) NOT NULL,
  `id_pro` int(6) NOT NULL,
  `id_user` int(6) NOT NULL,
  `noidung` text NOT NULL,
  `ngaybl` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `id_pro`, `id_user`, `noidung`, `ngaybl`) VALUES
(1, 0, 1, 'hahahaha', '13:30:53 14/10/2023'),
(2, 0, 1, 'hahahaha', '13:30:53 14/10/2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(6) NOT NULL,
  `id_pro` int(6) NOT NULL,
  `price` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(200) NOT NULL,
  `soluong` int(3) NOT NULL,
  `thanhtien` int(6) NOT NULL,
  `id_bill` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `id_pro`, `price`, `name`, `img`, `soluong`, `thanhtien`, `id_bill`) VALUES
(1, 2, 2, '2', '2', 2, 2, 2),
(2, 0, 100, 'Sản phẩm 1', 'sp1.webp', 1, 10000, 6),
(3, 0, 200, 'Sản phẩm 2', 'sp2.webp', 1, 40000, 6),
(4, 0, 200, 'Sản phẩm 2', 'sp2.webp', 1, 40000, 6),
(5, 0, 300, 'Sản phẩm 3', 'sp3.webp', 1, 90000, 6),
(6, 0, 200, 'Sản phẩm 2', 'sp2.webp', 1, 40000, 6),
(7, 0, 400, 'Sản phẩm 4', 'sp4.webp', 1, 160000, 6),
(8, 0, 200, 'Sản phẩm 2', 'sp2.webp', 1, 40000, 7),
(9, 0, 100, 'Sản phẩm 1', 'sp1.webp', 1, 10000, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `home` tinyint(1) NOT NULL DEFAULT 0,
  `stt` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`, `home`, `stt`) VALUES
(1, 'Trà', 1, 1),
(2, 'Sữa', 0, 0),
(3, 'Cà phê', 1, 2),
(4, 'nước ngọt', 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(200) NOT NULL,
  `price` int(6) NOT NULL,
  `view` int(9) NOT NULL DEFAULT 0,
  `mota` text NOT NULL,
  `bestseller` tinyint(1) NOT NULL DEFAULT 0,
  `id_dm` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `img`, `price`, `view`, `mota`, `bestseller`, `id_dm`) VALUES
(1, 'Sản phẩm 1', '../image/product-img-1.png', 100, 66, 'Trà ngon\r\n', 1, 1),
(2, 'Sản phẩm 2', '../image/product-img-2.png', 200, 235, 'sữa ngon', 1, 2),
(4, 'Sản phẩm 4', '../image/product-img-4.png', 400, 44, 'nước ngọt ngon', 1, 4),
(6, 'Sản phẩm 3', '../image/product-img-3.png', 300, 33, 'cà phê ngon', 0, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ten` varchar(50) DEFAULT NULL,
  `diachi` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `dienthoai` varchar(20) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `ten`, `diachi`, `email`, `dienthoai`, `role`) VALUES
(1, 'admin', '11111', NULL, 'QTSC 9, CVPM QUang Trung', 'Danh357@gmail.com', '0967400391', 1),
(2, 'danh', '456', 'đỗ', 'Quận 8 TPHCM', 'danh123@gmail.com', '0967400391', 0),
(6, 'quang', '', NULL, '', '', '', 0),
(65, 'danhdeptrai', 'b59c67bf196a4758191e42f76670ceba', NULL, '1131', 'docongdanh357@gmail.com', '111', 0),
(66, 'Đỗ Danh', 'b59c67bf196a4758191e42f76670ceba', NULL, 'hà thị khiêm 111', 'docongdanh357@gmail.com', '0967400391', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill_user` (`iduser`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sanpham_dm` (`id_dm`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_bill_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sanpham_dm` FOREIGN KEY (`id_dm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
