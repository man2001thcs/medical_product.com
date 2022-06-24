-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 24, 2022 lúc 12:33 PM
-- Phiên bản máy phục vụ: 8.0.29
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `medical`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `buy_log`
--

CREATE TABLE `buy_log` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `id_medicine` int DEFAULT NULL,
  `id_tool` int DEFAULT NULL,
  `medicine_name` varchar(50) DEFAULT NULL,
  `id_type` int DEFAULT NULL,
  `day` date DEFAULT NULL,
  `number` int DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `total_M` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `is_admin` tinyint DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `user`
--


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_buy_log`
--

CREATE TABLE `wp_buy_log` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `medicine_id` int DEFAULT NULL,
  `tool_id` int DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `number` smallint DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `total_price` bigint UNSIGNED DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `wp_buy_log`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_manufacturer`
--

CREATE TABLE `wp_manufacturer` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(12) CHARACTER SET utf8mb3 COLLATE utf8_general_ci DEFAULT NULL,
  `specialization` varchar(50) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `wp_manufacturer`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_medicine`
--

CREATE TABLE `wp_medicine` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `HSD` int NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci,
  `manual` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `manufacturer_id` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `wp_medicine`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_medicine_type_m`
--

CREATE TABLE `wp_medicine_type_m` (
  `id` int NOT NULL,
  `type_name` varchar(50) DEFAULT NULL,
  `support` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_medicine_type_s`
--

CREATE TABLE `wp_medicine_type_s` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_general_ci DEFAULT NULL,
  `support` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `wp_medicine_type_s`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_tool`
--

CREATE TABLE `wp_tool` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `day_created` date DEFAULT NULL,
  `price` int DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci,
  `manufacturer_id` tinyint DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `wp_tool`
--



-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_status` int NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `wp_users`
--

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `buy_log`
--
ALTER TABLE `buy_log`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wp_buy_log`
--
ALTER TABLE `wp_buy_log`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wp_manufacturer`
--
ALTER TABLE `wp_manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wp_medicine`
--
ALTER TABLE `wp_medicine`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wp_medicine_type_m`
--
ALTER TABLE `wp_medicine_type_m`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wp_medicine_type_s`
--
ALTER TABLE `wp_medicine_type_s`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wp_tool`
--
ALTER TABLE `wp_tool`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `buy_log`
--
ALTER TABLE `buy_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `wp_buy_log`
--
ALTER TABLE `wp_buy_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `wp_manufacturer`
--
ALTER TABLE `wp_manufacturer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `wp_medicine`
--
ALTER TABLE `wp_medicine`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `wp_medicine_type_m`
--
ALTER TABLE `wp_medicine_type_m`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wp_medicine_type_s`
--
ALTER TABLE `wp_medicine_type_s`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `wp_tool`
--
ALTER TABLE `wp_tool`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
