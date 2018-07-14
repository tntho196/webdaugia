-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2018 at 11:58 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daugia2.0`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `Ten` varchar(50) NOT NULL,
  `MatKhau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `Ten`, `MatKhau`) VALUES
('admin03', 'trungbinh', 'trungtrung'),
('taimenu', 'tài', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `ctdaugia`
--

CREATE TABLE `ctdaugia` (
  `MaCT` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `MaThanhVien` int(11) NOT NULL,
  `GiaMuonDau` float NOT NULL,
  `thoigian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctdaugia`
--

INSERT INTO `ctdaugia` (`MaCT`, `MaSP`, `MaThanhVien`, `GiaMuonDau`, `thoigian`) VALUES
(217, 23, 61, 4150000, '2018-07-06 17:01:19'),
(221, 23, 48, 4290000, '2018-07-07 04:32:27'),
(223, 23, 48, 4380000, '2018-07-07 10:21:31'),
(226, 39, 58, 2000000, '2018-07-08 17:51:10'),
(227, 39, 52, 2100000, '2018-07-08 17:51:10'),
(229, 39, 52, 2100000, '2018-07-08 17:51:26'),
(230, 23, 57, 4390000, '2018-07-09 14:02:11'),
(231, 23, 57, 4400000, '2018-07-09 14:02:37'),
(232, 39, 67, 5000000, '2018-07-09 17:19:38'),
(233, 27, 48, 4010000, '2018-07-10 06:01:01'),
(234, 39, 67, 6000000, '2018-07-10 15:11:48'),
(235, 34, 59, 5100000, '2018-07-10 17:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE `loaisp` (
  `id` int(11) NOT NULL,
  `TenLoaiSP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`id`, `TenLoaiSP`) VALUES
(3, 'Thời Trang'),
(4, 'Giải trí '),
(5, 'Điện tử'),
(6, 'Khác');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `GiaKhoiDiem` double NOT NULL,
  `NguoiBan` int(11) NOT NULL,
  `ThongTinSP` text NOT NULL,
  `Trangthai` tinyint(4) NOT NULL DEFAULT '0',
  `MaLoai` int(11) NOT NULL,
  `ThoiHan` date DEFAULT NULL,
  `Anh` text NOT NULL,
  `NguoichienThang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `GiaKhoiDiem`, `NguoiBan`, `ThongTinSP`, `Trangthai`, `MaLoai`, `ThoiHan`, `Anh`, `NguoichienThang`) VALUES
(23, 'LapTop Dell N4030', 4000000, 46, '                                                                Máy dell N4030 Hàng nhập khẩu\r\n                                                                                    ', 1, 5, '2018-07-27', 'Dell-Inspiron-14-N4030-185.jpg', 57),
(24, 'Laptop Asus S510UA i5 8250U', 1600000, 46, 'laptop  Laptop Asus S510UA i5 8250U \r\nhàng nhập khẩu cấu hình mạnh mẻ                       \r\n                            ', 0, 5, '2018-07-29', 'as.jpg', 0),
(25, 'Sạc dự phòng ', 600000, 47, ' Sạc  dự phòng 5000amh                               \r\n                            ', 1, 5, '2018-07-12', 'pin-sac-du-phong-10000mah-esaver-la-y325s-km-1020x680.png', 0),
(26, 'Ipad pro 10.5 inch', 6000000, 46, '                                                                                                i pad pro cấu hình cao thiết kế sang trọng                               \r\n                                                        sdfsdfsdfs              sdfsdfsd\r\nfsdfsdnfjsdlfsdf\r\nsdfsdfsdf                                          ', 0, 5, '2018-08-03', 'ipad-pro-105-inch-wifi-cellular-64gb-2017-111-400x400.jpg', 0),
(27, 'Iphone 8 Red 64gb', 4000000, 46, 'iphone 8 thiết kế sang trọng cấu hình mạnh mẽ                               \r\n                            ', 1, 5, '2018-07-27', 'iphone-8-red-do-1-400x460.png', 48),
(28, 'LapTop Dell N4041', 4000000, 46, '                                                                ngon\r\n                                                        ', 0, 5, '2018-07-28', '32815604_2015323298728896_2219485914269220864_n.jpg', 0),
(29, 'LapTop Dell N4041', 5000000, 60, 'máy Ngon                                \r\n                            ', 0, 5, '2018-07-27', 'Dell-Inspiron-14-N4030-185.jpg', 0),
(30, 'Sạc dự phòng ', 300000, 46, 'Sạc tốt                                \r\n                            ', 0, 5, '2018-07-26', 'pin-sac-du-phong-10000mah-esaver-la-y325s-km-1020x680.png', 0),
(34, 'Set quà tặng dịp lễ Bộ 20 màu son lì siêu nhẹ môi ', 5000000, 48, '<p><strong>Hàng cao cấp</strong></p><p style=\"margin-left: 20px;\">                                  Sản phẩm cực chất</p>', 1, 3, '2018-07-20', 'faa6fee96f5d2f51fa29eb19d9e3a262.jpg', 59),
(37, 'Thang bể bơi 58335', 15000000, 48, '            Thang bể bơi 58335                    \r\n                            ', 0, 4, '2018-07-27', 'Capture.JPG', 0),
(38, 'Máy Lọc Nước Kankaru', 1200000, 46, '                                Máy Lọc Nước cao cấp\r\n                            ', 0, 6, '2018-07-28', 'maylocnuoc.jpg', 0),
(39, 'Giày tây cao cấp', 1500000, 48, ' Giày tây xịn                             \r\n                            ', 0, 3, '2018-07-27', 'n1-5225-1437623200.jpg', 0),
(41, 'LapTop Dell N4030', 400000000, 48, '<p>lorem</p>', 1, 5, '2018-07-06', 'maylocnuoc.jpg', 0),
(43, 'máy Tính casio fx570', 500000, 57, '', 1, 5, NULL, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE `thanhvien` (
  `MaThanhVien` int(11) NOT NULL,
  `TenDangNhap` varchar(50) NOT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `Ho` varchar(50) NOT NULL,
  `Ten` varchar(50) NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` tinyint(4) NOT NULL,
  `Diachi` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `SDT` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thanhvien`
--

INSERT INTO `thanhvien` (`MaThanhVien`, `TenDangNhap`, `MatKhau`, `Ho`, `Ten`, `NgaySinh`, `GioiTinh`, `Diachi`, `Email`, `SDT`) VALUES
(46, 'ngocttran12', '123444', 'trần', 'Ngọc', '2018-06-06', 0, 'phú yên', 'ngoctran@gmail.com', '0198443124'),
(47, 'hungtran123', 'hung12212', 'Trần', 'Hùng', '1996-07-18', 1, '15/1 Hưng Đạo - Đặng Tất- Nha Trang -Khánh Hòa', 'hun.12.tran@gmail.com', '0982342574'),
(48, 'minh', 'khong012', 'Nguyễn', 'Hoàng Minh', '1997-07-19', 1, '54 Tô HiếnThành - Nha Trang -Khánh Hòa', 'minh1@gmail.com', '09765434512'),
(49, 'ngoquyen12', 'quyenbadao', 'Ngô', 'Quyền', '1990-07-08', 1, '32 Bạch Đằng -Nha Trang -Khánh Hòa', 'ngongoquyen@gmail.com', '01677234124'),
(50, 'Tinhtam12', 'tinhtam12', 'Phan', 'Tịnh Tâm', '1999-07-30', 0, '1/4 Hùng Vương - Tuy Hòa -Phú Yên', 'tinhtam12@gmail.com', '09077654321'),
(51, 'trinhtrinh12', '12trinhtrinh1', 'Trần', 'Trinh Trinh', '2018-07-07', 0, '15/1 hưng đạo', 'trinhtrinh@gmail.com', '01668752334'),
(52, 'trunglele', 'trugnngoc123', 'trần', 'Trung Trung', '2018-07-17', 1, '32 Nhà thờ Nha Trang Khánh Hòa', 'trungtran@gmail.com', '098765673422'),
(53, 'tuanpham2', 'tuan212', 'Phạm', 'Tuấn', '2018-07-13', 1, '24 Nguyễn Đình Chiểu - Nha Trang Khánh Hòa', 'tuantuan@gmail.com', '09086666312'),
(54, 'samle', 'samle111', 'lê', 'Thị Hồng Sâm', '1994-11-01', 0, '15/1 Hưng Đạo -Nha Trang -Khánh Hòa', 'samle@gmail.com', '01669195451'),
(55, 'trangphungphung', 'trangtrang', 'Phùng ', 'Thị Kim Trang', '1994-05-13', 0, '15/1 Hưng Đạo -Nha Trang -Khánh Hòa', 'trangtrang@gmail.com', '01658810444'),
(56, 'thanhhopchau', 'hopkute', 'Châu ', 'Thành Hợp', '1994-06-25', 0, '15/1 Hưng Đạo -Nha Trang -Khánh Hòa', 'thanhhop@gmail.com', '0976579542'),
(57, 'thaibao', '111', 'trần', 'Ngọc  Thái Bão', '2018-07-21', 1, '15/1 hòn chồng  -Nha Trang -Khánh Hòa', 'tahnibao234@gmail.com', '0987651234'),
(58, 'nungocpham', '122121', 'Phạm ', 'Thị  Ngọc Nữ', '1994-06-10', 0, '15/1 Hưng Đạo -Nha Trang -Khánh Hòa', 'nungocpham@gmail.com', '0965932820'),
(59, 'nguyen', '123456', 'trần', 'Ngọc  nguyên', '2018-07-21', 1, '15/1 hòn chồng  -Nha Trang -Khánh Hòa', 'nguyen@gmail.com', '0987656789'),
(60, 'pipik', '123456', 'trần', 'Ngọc minh', '2018-07-04', 0, 'nha trang', 'tran@gmail.com', '01668754341'),
(61, 'giangnguyenw', '121212', 'Nguyễn', 'Trường ginag', '1983-07-29', 1, '15/1 Hưng Đạo -Nha Trang -Khánh Hòa', '111@gmail.com', '01668754341'),
(66, 'admindđqưq', 'dsdsd', 'trầnd', 'Ngọc', '2018-07-06', 0, 'nha trang', 'tntn@gmail.com', 'sdsd'),
(67, 'tiennguyen', 'tien12', 'Nguyễn', 'Minh Tiến', '2018-07-06', 1, '15/1 hưng đạo', 'tientiennguyen@gmail.com', '01668754341');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `ctdaugia`
--
ALTER TABLE `ctdaugia`
  ADD PRIMARY KEY (`MaCT`),
  ADD KEY `MaSP` (`MaSP`),
  ADD KEY `MaThanhVien` (`MaThanhVien`);

--
-- Indexes for table `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `MaLoai` (`MaLoai`),
  ADD KEY `NguoiBan` (`NguoiBan`);

--
-- Indexes for table `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`MaThanhVien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ctdaugia`
--
ALTER TABLE `ctdaugia`
  MODIFY `MaCT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT for table `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `MaThanhVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ctdaugia`
--
ALTER TABLE `ctdaugia`
  ADD CONSTRAINT `KhoaNgai_ThanhVien` FOREIGN KEY (`MaThanhVien`) REFERENCES `thanhvien` (`MaThanhVien`),
  ADD CONSTRAINT `khoangaisp` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`) ON DELETE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `khoangoai_maloai` FOREIGN KEY (`MaLoai`) REFERENCES `loaisp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `khoangoai_thanhvien` FOREIGN KEY (`NguoiBan`) REFERENCES `thanhvien` (`MaThanhVien`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
