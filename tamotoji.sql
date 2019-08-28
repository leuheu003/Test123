-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 26, 2018 lúc 06:27 AM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hoang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalogue`
--

CREATE TABLE `catalogue` (
  `cId` int(10) UNSIGNED NOT NULL,
  `cName` varchar(50) DEFAULT NULL,
  `cDescription` varchar(200) DEFAULT NULL,
  `lastModifiedBy` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `catalogue`
--

INSERT INTO `catalogue` (`cId`, `cName`, `cDescription`, `lastModifiedBy`) VALUES
(2, 'Bags', '', 3),
(3, 'Leather', '', 3),
(4, 'Pants', '', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `item`
--

CREATE TABLE `item` (
  `iId` varchar(10) NOT NULL,
  `iName` varchar(50) DEFAULT NULL,
  `iDescription` varchar(300) DEFAULT NULL,
  `iPrice` int(10) UNSIGNED DEFAULT NULL,
  `iStatus` varchar(20) DEFAULT NULL,
  `iSize` varchar(20) DEFAULT NULL,
  `iImage` varchar(300) DEFAULT NULL,
  `catalogueId` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `item`
--

INSERT INTO `item` (`iId`, `iName`, `iDescription`, `iPrice`, `iStatus`, `iSize`, `iImage`, `catalogueId`) VALUES
('1A4753 ', 'MONOGRAM TRACKPANTS ', 'Featuring a distinctively sporty fit, these super lightweight trackpants feature an iconic Jacquard Monogram design, in keeping with the season\'s focus.', 1140, 'new', 'S, M, L, XL', '1A4753 .jxr', 4),
('1A47SV ', 'TRAVEL JOGGING PANTS ', 'Tailored from a comfortable technical jersey, these iconic travel jogging pants feature a metallic LV Circle medallion on the back pocket as a discrete branded signature.', 1010, 'new', 'S, M, L, XL', '1A47SV .jxr', 4),
('1A4JMA ', 'METALLIC PONY BLOUSON ', 'One of the collect0ion\'s standout pieces, this Metallic Pony Blouson is inspired by this season\'s titanium theme. ', 9950, 'new', 'S, M, L, XL', '1A4JMA .jxr', 3),
('1A4JMJ ', 'LANDSCAPE FUR COAT', 'This extraordinary Landscape Fur Coat combines patchwork and digital printing to transform the season\'s signature motif into a unique piece of craftsmanship.', 56000, 'new', 'S, M, L, XL', '1A4JMJ .jxr', 3),
('1A4JOY ', 'TAILORED SHORTS ', 'In keeping with the collection\'s eclectic spirit, these Tailored Shorts are inspired by flank-man attire from the American rodeo. Adorned with flatlock stitching, they are cut from a rich Monogram tweed.', 995, 'new', 'S, M, L, XL', '1A4JOY .jxr', 4),
('1A4JQX', 'DOUBLE LAYER SHORTS ', 'One of the collection\'s emblematic silhouettes, these Double Layer Shorts epitomize the season\'s globetrotting vibe, combining an American rodeo influence with the signature Kenyan landscape print.', 1580, 'new', 'S, M, L, XL', '1A4JQX.jxr', 4),
('1A4JUF ', 'Monogram Glaze Jacket ', 'Featuring a cut inspired by the classic denim jacket, this Monogram Glaze Jacket\'s motif is one of the collection\'s standout signatures. Its slightly rigid calf leather boasts a mirror-coated.', 8500, 'new', 'S, M, L, XL', '1A4JUF .jxr', 3),
('1A4T1N ', 'LV Satellite Patch Coach Jacket ', 'With its slightly loose fit, this LV Satellite Patch Coach Jacket captures the season&rsquo;s space age take on classic casual. Cut from a thick and slightly grained lambskin, it is embellished with iconic embossed and debossed LV Satellite patches.', 5450, 'new', 'S, M, L, XL', '1A4T1N .jxr', 3),
('M33412 ', 'Porte-Documents Voyage PM ', 'The Porte-Documents Voyage PM looks effortlessly stylish in masculine Taiga leather. With smooth leather trimmings and a spacious interior, it combines luxury and practicality.', 2170, 'new', 'M', 'M33412 .jxr', 2),
('N41029 ', 'District MM ', 'A stylish and easy-to-wear messenger bag, the new District PM is the ideal companion for everyday life. With its elegant details, lightweight and surprisingly spacious interior, it\'s the perfect combination of functionality and elegance', 1630, 'new', 'MM', 'N41029 .jxr', 2),
('N41478 ', 'Porte-Documents Voyage PM ', 'The Porte-Documents Voyage PM looks effortlessly stylish in masculine Damier Graphite canvas. With smooth leather trimmings and a spacious interior, it combines luxury and practicality.', 1350, 'new', 'PM', 'N41478 .jxr', 2),
('N44055 ', 'Avenue Sling Bag ', 'The LV Alps theme brings the natural beauty of the mountains to the Avenue Sling Bag for Winter 2018. Fashioned from Damier Graphite canvas, it&rsquo;s decorated with printed, tufted, and embroidered patches featuring classic House signatures over iconic Alpine scenes.', 1810, 'new', 'M', 'N44055 .jxr', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `uId` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`uId`, `username`, `password`, `status`) VALUES
(1, 'admin', '93dd646db7ac1de0ea652af8c4c22820', '1'),
(2, 'nguyentrungduc', '93dd646db7ac1de0ea652af8c4c22820', '1'),
(3, 'hoangpin', 'a4f2384c99e92150c4d1855c728834ed', '1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `catalogue`
--
ALTER TABLE `catalogue`
  ADD PRIMARY KEY (`cId`),
  ADD KEY `lastModifiedBy` (`lastModifiedBy`),
  ADD KEY `cName` (`cName`(7));

--
-- Chỉ mục cho bảng `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`iId`),
  ADD KEY `iName` (`iName`(10)),
  ADD KEY `catalogueId` (`catalogueId`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uId`),
  ADD KEY `username` (`username`(10));

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `cId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `uId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `catalogue`
--
ALTER TABLE `catalogue`
  ADD CONSTRAINT `catalogue_ibfk_1` FOREIGN KEY (`lastModifiedBy`) REFERENCES `user` (`uId`);

--
-- Các ràng buộc cho bảng `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`catalogueId`) REFERENCES `catalogue` (`cId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
