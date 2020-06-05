-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 30, 2020 lúc 04:57 AM
-- Phiên bản máy phục vụ: 10.1.40-MariaDB
-- Phiên bản PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pico_vnpt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attribute`
--

CREATE TABLE `attribute` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attribute`
--

INSERT INTO `attribute` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Kích thước MH', '2019-12-30 08:46:12', '2019-12-30 08:46:12'),
(2, 'Hãng', '2019-12-30 08:46:12', '2019-12-30 08:46:12'),
(3, 'Kiểu máy', '2020-01-02 01:27:45', '2020-01-02 01:27:45'),
(4, 'Loại máy', '2020-01-05 20:32:06', '2020-01-05 20:32:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) DEFAULT '0' COMMENT '0 là danh mục cha, 1 là dm con',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1' COMMENT '0 là ẩn, 1 là hiển thị'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `parent`, `updated_at`, `created_at`, `status`) VALUES
(1, 'Điện lạnh', 'dien-lanh', 0, '2019-12-27 09:41:19', '2019-12-27 09:41:19', 1),
(2, 'Điện tử', 'dien-tu', 0, '2019-12-27 09:41:19', '2019-12-27 09:41:19', 1),
(3, 'Điều hòa', 'dieu-hoa', 1, '2019-12-27 09:42:33', '2019-12-27 09:42:33', 1),
(4, 'Ti vi', 'ti-vi', 2, '2019-12-27 09:42:33', '2019-12-27 09:42:33', 1),
(5, 'Điện thoại', 'dien-thoai', 4, '2020-01-13 02:14:01', '2020-01-13 02:14:01', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `password`, `address`, `updated_at`, `created_at`) VALUES
(1, 'Thanh Nga', 'donga403@gmail.com', '0973305763', '$2y$10$V/T4KEjyskhpPRguQG5WP.wR55eoAJzirhgeOLhX7ihf9jI06lKDW', 'Hà Nội', '2020-01-12 08:18:25', '2020-01-12 08:18:25'),
(2, 'Ngọc Hân', 'ngochan@gmail.com', '0973305763', '$2y$10$yFV5f7w47bnw8uwaAjTa6.8bRN1LYY.xOfRLVcvrPAiyN87Cii2qW', 'Hà nội', '2020-02-20 03:14:03', '2020-02-20 03:14:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT '0',
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT '0 là mới, chưa duyệt, 1 là đã duyệt, 2 đã giao hàng, 3 hủy',
  `total_price` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name`, `address`, `phone`, `status`, `total_price`, `updated_at`, `created_at`) VALUES
(2, 1, 'Thanh Nga', 'Hà Nam', 973305763, 1, 4300000, '2020-01-12 19:05:29', '2020-01-12 09:38:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'Số lượng mua',
  `price` int(11) NOT NULL COMMENT 'Giá tại thời điểm đặt hàng',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `quantity`, `price`, `updated_at`, `created_at`) VALUES
(2, 25, 1, 4300000, '2020-01-12 09:38:13', '2020-01-12 09:38:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image_list` text COLLATE utf8_unicode_ci COMMENT 'Lưu chuỗi json gồm các ảnh khác vào đay',
  `price` int(10) UNSIGNED NOT NULL,
  `info` text COLLATE utf8_unicode_ci,
  `sale_price` int(10) UNSIGNED DEFAULT '0',
  `category_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0 là ẩn, 1 là hiển thị',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `product_code`, `name`, `slug`, `image`, `image_list`, `price`, `info`, `sale_price`, `category_id`, `status`, `updated_at`, `created_at`) VALUES
(20, 'MP01', 'Điều hòa 2 chiều LG 2018', 'dieu-hoa-2-chieu-lg', 'http://localhost:8080/pico_vnpt/uploads/dieuhoa3.jpg', '[\"http://localhost:8080/pico_vnpt/uploads/dieuhoa2.jpg\",\"http://localhost:8080/pico_vnpt/uploads/dieuhoa1.jpg\"]', 5600000, 'tt', 5500000, 1, 1, '2020-01-10 03:06:53', '2020-01-05 08:46:32'),
(21, 'MP02', 'Điều Hòa 1 Chiều LG V10APHN 9.000BTU Inverter', 'dieu-hoa-1-chieu-lg-v10aphn-9000btu-inverter', 'http://localhost:8080/pico_vnpt/uploads/dieuhoa1.jpg', '[\"http://localhost:8080/pico_vnpt/uploads/dieuhoa13.png\",\"http://localhost:8080/pico_vnpt/uploads/dieuhoa11.png\",\"http://localhost:8080/pico_vnpt/uploads/diehoa12.png\"]', 5700000, 'tt', 5600000, 1, 1, '2020-01-05 20:39:52', '2020-01-05 20:39:52'),
(22, 'MP03', 'Điều Hòa LG V13APHN 12.000BTU 1 Chiều Inverter', 'dieu-hoa-lg-v13aphn-12000btu-1-chieu-inverter', 'http://localhost:8080/pico_vnpt/uploads/dieuhoa2.jpg', '[\"http://localhost:8080/pico_vnpt/uploads/dieuhoa32.png\",\"http://localhost:8080/pico_vnpt/uploads/dieuhoa31.png\",\"http://localhost:8080/pico_vnpt/uploads/dieuhoa11.png\"]', 6700000, 'tt', 6500000, 3, 1, '2020-01-05 20:42:11', '2020-01-05 20:42:11'),
(23, 'MP04', 'Tivi Led Samsung UA55RU7200KXXV 55 Inch 4K-Ultra HD', 'tivi-led-samsung-ua55ru7200kxxv-55-inch-4k-ultra-hd', 'http://localhost:8080/pico_vnpt/uploads/tivi1.jpg', '[\"http://localhost:8080/pico_vnpt/uploads/tivi13.png\",\"http://localhost:8080/pico_vnpt/uploads/tivi12.png\",\"http://localhost:8080/pico_vnpt/uploads/tivi11.png\"]', 7800000, 'tt', 7500000, 4, 1, '2020-01-05 20:44:21', '2020-01-05 20:44:21'),
(24, 'MP05', 'Tivi Led Sony KD-65X9500G 65 Inch 4K-Ultra HD', 'tivi-led-sony-kd-65x9500g-65-inch-4k-ultra-hd', 'http://localhost:8080/pico_vnpt/uploads/tivi1%20(1).jpg', '[\"http://localhost:8080/pico_vnpt/uploads/tivi23.png\",\"http://localhost:8080/pico_vnpt/uploads/tivi22.png\",\"http://localhost:8080/pico_vnpt/uploads/tivi21.png\"]', 6400000, 'tt', 6300000, 4, 1, '2020-01-05 20:46:46', '2020-01-05 20:46:46'),
(25, 'MP06', 'Tivi Led Samsung 35 Inch 4K-Ultra HD', 'tivi-led-samsung-35-inch-4k-ultra-hd', 'http://localhost:8080/PICO/uploads/tivi12.png', '[\"http://localhost:8080/PICO/uploads/tivi12.png\",\"http://localhost:8080/PICO/uploads/tivi1.jpg\",\"http://localhost:8080/PICO/uploads/tivi1%20(1).jpg\"]', 4800000, 'tt', 4300000, 4, 1, '2020-01-10 03:22:22', '2020-01-10 03:22:22'),
(26, 'MP08', 'Samsung Galaxy Note 8 Đen', 'samsung-galaxy-note-8-den', 'http://localhost:8080/PICO/uploads/dienthoai1.jpg', '[\"http://localhost:8080/PICO/uploads/dienthoai31.jpg\",\"http://localhost:8080/PICO/uploads/dienthoai12.jpg\",\"http://localhost:8080/PICO/uploads/dienthoai11.jpg\"]', 4500000, '<p>H&atilde;y tưởng tượng những điều bạn c&oacute; thể l&agrave;m tr&ecirc;n m&agrave;n h&igrave;nh v&ocirc; cực lớn đến 6,3 inch của Samsung Galaxy Note 8</p>', 4200000, 5, 1, '2020-01-12 19:18:12', '2020-01-12 19:18:12'),
(27, 'MP09', 'Điện thoại di động Samsung Galaxy S8 - Màu Đen', 'dien-thoai-di-dong-samsung-galaxy-s8-mau-den', 'http://localhost:8080/PICO/uploads/dienthoai3.jpg', '[\"http://localhost:8080/PICO/uploads/dienthoai32.jpg\",\"http://localhost:8080/PICO/uploads/dienthoai31.jpg\",\"http://localhost:8080/PICO/uploads/dienthoai3.jpg\"]', 7600000, '<p>camera ch&iacute;nh c&oacute; độ ph&acirc;n giải 12MP, c&ocirc;ng nghệ DualPixel lu&ocirc;n bắt trọn mọi chi tiết r&otilde; n&eacute;t d&ugrave; bạn chụp đ&ecirc;m hay ng&agrave;y.</p>', 7400000, 5, 1, '2020-01-12 19:24:41', '2020-01-12 19:24:41'),
(28, 'MP9', 'Galaxy S8 Plus Vàng', 'galaxy-s8-plus-vang', 'http://localhost:8080/PICO/uploads/dienthoai3.jpg', '[\"http://localhost:8080/PICO/uploads/dienthoai32.jpg\",\"http://localhost:8080/PICO/uploads/dienthoai31.jpg\",\"http://localhost:8080/PICO/uploads/dienthoai31%20(1).jpg\"]', 7800000, '<p>viền 6.2 inch độ ph&acirc;n giải 2K+, cong tr&agrave;n hai cạnh bao phủ ho&agrave;n to&agrave;n bề mặt điện thoại, tạo n&ecirc;n sự mượt m&agrave; trải d&agrave;i bất tận</p>', 7700000, 5, 1, '2020-01-12 19:31:00', '2020-01-12 19:31:00'),
(29, 'MP10', 'Galaxy J7 Plus Đen', 'galaxy-j7-plus-den', 'http://localhost:8080/PICO/uploads/dienthoai4.jpg', '[\"http://localhost:8080/PICO/uploads/dienthoai41.jpg\",\"http://localhost:8080/PICO/uploads/dienthoai4.jpg\",\"http://localhost:8080/PICO/uploads/dienthoai4%20(1).jpg\"]', 6500000, '<p>k&iacute;nh trước cong 2.5D tinh tế tạo n&ecirc;n sự thanh lịch v&agrave; s&agrave;nh điệu.</p>', 6300000, 5, 1, '2020-01-12 19:38:17', '2020-01-12 19:38:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` tinyint(1) DEFAULT '0' COMMENT '0 là quản trị, 1 là ctv',
  `remember_token` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `address`, `level`, `remember_token`, `updated_at`, `created_at`) VALUES
(1, 'Nguyễn Quang Minh', 'admin@gmail.com', '0356653301', '$2y$10$YmYWRpVFNj6IzoP1L0hlQuTUJ/zvaLp9sAlHTUQh9E1ZeA8tza3oG', 'Hà Nội', 0, NULL, '2020-01-06 07:08:59', '2020-01-06 07:08:59'),
(2, 'Trần Mỹ Duyên', 'duyen@gmail.com', '0356653344', '$2y$10$8vk3NSAK1wU89xDWPb.huekKHQ6DOFVtccpwCm7ON/yKPLgEb32HC', 'Hà Nam', 1, NULL, '2020-01-06 07:08:59', '2020-01-06 07:08:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `values`
--

CREATE TABLE `values` (
  `id` int(11) NOT NULL,
  `value` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `attr_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `values`
--

INSERT INTO `values` (`id`, `value`, `attr_id`, `updated_at`, `created_at`) VALUES
(1, '10 - 20 inch', 1, '2019-12-30 08:46:12', '2019-12-30 08:46:12'),
(2, '20 - 30 inch', 1, '2019-12-30 08:46:12', '2019-12-30 08:46:12'),
(3, '30 - 40 inch', 1, '2019-12-30 08:46:12', '2019-12-30 08:46:12'),
(4, 'Sam Sung', 2, '2019-12-30 08:46:12', '2019-12-30 08:46:12'),
(5, 'LG', 2, '2019-12-30 08:46:12', '2019-12-30 08:46:12'),
(6, 'Sony', 2, '2019-12-30 08:46:12', '2019-12-30 08:46:12'),
(7, 'Hitachi', 2, '2020-01-02 02:17:44', '2020-01-02 02:17:44'),
(9, '2 chiều', 4, '2020-01-05 20:33:22', '2020-01-05 20:33:22'),
(10, '1 chiều', 4, '2020-01-05 20:33:29', '2020-01-05 20:33:29'),
(11, 'tủ đứng', 3, '2020-01-05 20:33:58', '2020-01-05 20:33:58'),
(12, 'Treo tường', 3, '2020-01-05 20:34:10', '2020-01-05 20:34:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `values_product`
--

CREATE TABLE `values_product` (
  `value_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `values_product`
--

INSERT INTO `values_product` (`value_id`, `product_id`, `updated_at`, `created_at`) VALUES
(4, 21, '2020-01-06 03:39:52', '2020-01-06 03:39:52'),
(6, 21, '2020-01-06 03:39:52', '2020-01-06 03:39:52'),
(9, 21, '2020-01-06 03:39:52', '2020-01-06 03:39:52'),
(6, 22, '2020-01-06 03:42:11', '2020-01-06 03:42:11'),
(10, 22, '2020-01-06 03:42:11', '2020-01-06 03:42:11'),
(1, 23, '2020-01-06 03:44:21', '2020-01-06 03:44:21'),
(2, 23, '2020-01-06 03:44:21', '2020-01-06 03:44:21'),
(3, 23, '2020-01-06 03:44:21', '2020-01-06 03:44:21'),
(4, 23, '2020-01-06 03:44:21', '2020-01-06 03:44:21'),
(1, 24, '2020-01-06 03:46:46', '2020-01-06 03:46:46'),
(2, 24, '2020-01-06 03:46:46', '2020-01-06 03:46:46'),
(3, 24, '2020-01-06 03:46:46', '2020-01-06 03:46:46'),
(6, 24, '2020-01-06 03:46:46', '2020-01-06 03:46:46'),
(1, 25, '2020-01-10 10:22:22', '2020-01-10 10:22:22'),
(2, 25, '2020-01-10 10:22:22', '2020-01-10 10:22:22'),
(4, 25, '2020-01-10 10:22:22', '2020-01-10 10:22:22'),
(9, 20, '2020-01-11 16:38:26', '2020-01-11 16:38:26'),
(5, 20, '2020-01-12 08:20:34', '2020-01-12 08:20:34'),
(4, 26, '2020-01-13 02:18:12', '2020-01-13 02:18:12'),
(4, 27, '2020-01-13 02:24:41', '2020-01-13 02:24:41'),
(4, 28, '2020-01-13 02:31:00', '2020-01-13 02:31:00'),
(4, 29, '2020-01-13 02:38:17', '2020-01-13 02:38:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `variant`
--

CREATE TABLE `variant` (
  `id` int(11) NOT NULL,
  `price` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `variant`
--

INSERT INTO `variant` (`id`, `price`, `product_id`, `updated_at`, `created_at`) VALUES
(26, 5700000, 20, '2020-01-05 08:46:56', '2020-01-05 08:46:32'),
(27, 5600000, 20, '2020-01-05 08:46:56', '2020-01-05 08:46:32'),
(28, 5700000, 21, '2020-01-05 20:40:17', '2020-01-05 20:39:52'),
(29, 5600000, 21, '2020-01-05 20:40:17', '2020-01-05 20:39:52'),
(30, 6700000, 22, '2020-01-05 20:42:22', '2020-01-05 20:42:11'),
(31, 7600000, 23, '2020-01-05 20:44:39', '2020-01-05 20:44:21'),
(32, 7500000, 23, '2020-01-05 20:44:39', '2020-01-05 20:44:21'),
(33, 7500000, 23, '2020-01-05 20:44:39', '2020-01-05 20:44:21'),
(34, 7700000, 24, '2020-01-12 01:50:08', '2020-01-05 20:46:46'),
(35, 7200000, 24, '2020-01-05 20:47:03', '2020-01-05 20:46:46'),
(36, 7500000, 24, '2020-01-05 20:47:03', '2020-01-05 20:46:46'),
(37, 0, 25, '2020-01-10 03:22:22', '2020-01-10 03:22:22'),
(38, 0, 25, '2020-01-10 03:22:22', '2020-01-10 03:22:22'),
(39, 0, 20, '2020-01-12 01:20:34', '2020-01-12 01:20:34'),
(40, 0, 26, '2020-01-12 19:18:12', '2020-01-12 19:18:12'),
(41, 0, 27, '2020-01-12 19:24:41', '2020-01-12 19:24:41'),
(42, 0, 28, '2020-01-12 19:31:00', '2020-01-12 19:31:00'),
(43, 5600000, 29, '2020-01-12 19:38:35', '2020-01-12 19:38:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `variant_values`
--

CREATE TABLE `variant_values` (
  `variant_id` int(11) NOT NULL,
  `value_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `variant_values`
--

INSERT INTO `variant_values` (`variant_id`, `value_id`, `updated_at`, `created_at`) VALUES
(26, 4, '2020-01-05 15:46:32', '2020-01-05 15:46:32'),
(27, 5, '2020-01-05 15:46:32', '2020-01-05 15:46:32'),
(28, 4, '2020-01-06 03:39:52', '2020-01-06 03:39:52'),
(28, 9, '2020-01-06 03:39:52', '2020-01-06 03:39:52'),
(29, 6, '2020-01-06 03:39:52', '2020-01-06 03:39:52'),
(29, 9, '2020-01-06 03:39:52', '2020-01-06 03:39:52'),
(30, 6, '2020-01-06 03:42:11', '2020-01-06 03:42:11'),
(30, 10, '2020-01-06 03:42:11', '2020-01-06 03:42:11'),
(31, 1, '2020-01-06 03:44:21', '2020-01-06 03:44:21'),
(31, 4, '2020-01-06 03:44:21', '2020-01-06 03:44:21'),
(32, 2, '2020-01-06 03:44:21', '2020-01-06 03:44:21'),
(32, 4, '2020-01-06 03:44:21', '2020-01-06 03:44:21'),
(33, 3, '2020-01-06 03:44:21', '2020-01-06 03:44:21'),
(33, 4, '2020-01-06 03:44:21', '2020-01-06 03:44:21'),
(34, 1, '2020-01-06 03:46:46', '2020-01-06 03:46:46'),
(34, 6, '2020-01-06 03:46:46', '2020-01-06 03:46:46'),
(35, 2, '2020-01-06 03:46:46', '2020-01-06 03:46:46'),
(35, 6, '2020-01-06 03:46:46', '2020-01-06 03:46:46'),
(36, 3, '2020-01-06 03:46:46', '2020-01-06 03:46:46'),
(36, 6, '2020-01-06 03:46:46', '2020-01-06 03:46:46'),
(37, 1, '2020-01-10 10:22:22', '2020-01-10 10:22:22'),
(37, 4, '2020-01-10 10:22:22', '2020-01-10 10:22:22'),
(38, 2, '2020-01-10 10:22:22', '2020-01-10 10:22:22'),
(38, 4, '2020-01-10 10:22:22', '2020-01-10 10:22:22'),
(39, 6, '2020-01-12 08:20:34', '2020-01-12 08:20:34'),
(39, 9, '2020-01-12 08:20:34', '2020-01-12 08:20:34'),
(40, 4, '2020-01-13 02:18:12', '2020-01-13 02:18:12'),
(41, 4, '2020-01-13 02:24:41', '2020-01-13 02:24:41'),
(42, 4, '2020-01-13 02:31:00', '2020-01-13 02:31:00'),
(43, 4, '2020-01-13 02:38:17', '2020-01-13 02:38:17');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `values`
--
ALTER TABLE `values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attr_id` (`attr_id`);

--
-- Chỉ mục cho bảng `values_product`
--
ALTER TABLE `values_product`
  ADD KEY `value_id` (`value_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `variant`
--
ALTER TABLE `variant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `variant_values`
--
ALTER TABLE `variant_values`
  ADD KEY `variant_id` (`variant_id`),
  ADD KEY `value_id` (`value_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `attribute`
--
ALTER TABLE `attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `values`
--
ALTER TABLE `values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `variant`
--
ALTER TABLE `variant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `values`
--
ALTER TABLE `values`
  ADD CONSTRAINT `values_ibfk_1` FOREIGN KEY (`attr_id`) REFERENCES `attribute` (`id`);

--
-- Các ràng buộc cho bảng `values_product`
--
ALTER TABLE `values_product`
  ADD CONSTRAINT `values_product_ibfk_1` FOREIGN KEY (`value_id`) REFERENCES `values` (`id`),
  ADD CONSTRAINT `values_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `variant`
--
ALTER TABLE `variant`
  ADD CONSTRAINT `variant_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `variant_values`
--
ALTER TABLE `variant_values`
  ADD CONSTRAINT `variant_values_ibfk_1` FOREIGN KEY (`variant_id`) REFERENCES `variant` (`id`),
  ADD CONSTRAINT `variant_values_ibfk_2` FOREIGN KEY (`value_id`) REFERENCES `values` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
