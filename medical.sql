-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 30, 2022 lúc 10:13 AM
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

INSERT INTO `user` (`id`, `email`, `password`, `fullname`, `address`, `is_admin`, `created`, `modified`) VALUES
(3, 'dochu4@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Chu Thanh Do', 'Long Bien, Ha Noi, Viet Nam', 1, '2022-05-20 03:11:26', '2022-05-20 03:11:26'),
(11, 'dochu8@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Chu Do', 'Long Bien, Ha Noi, Viet Nam', NULL, '2022-05-22 17:27:16', '2022-05-22 17:27:16'),
(14, 'dochu2@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Chu Do', 'Long Bien, Ha Noi, Viet Nam', NULL, '2022-06-07 17:01:33', '2022-06-07 17:01:33');

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

INSERT INTO `wp_buy_log` (`id`, `user_id`, `medicine_id`, `tool_id`, `price`, `number`, `created`, `total_price`, `code`) VALUES
(1, 11, 31, 0, '120033', 1, '2022-06-09 10:03:28', 120033, ''),
(2, 11, 31, 0, '120033', 2, '2022-06-09 10:03:28', 240066, ''),
(3, 11, 1, 0, '450000', 1, '2022-06-22 11:19:46', 450000, ''),
(4, 11, 1, 0, '450000', 1, '2022-06-22 13:22:44', 450000, ''),
(5, 11, 1, 0, '450000', 1, '2022-06-22 13:25:10', 450000, ''),
(6, 11, 1, 0, '450000', 1, '2022-06-23 07:33:59', 450000, ''),
(7, 11, 1, 0, '450000', 1, '2022-06-29 10:26:13', 450000, ''),
(8, 11, 0, 4, '123123', 1, '2022-06-30 08:10:18', 123123, '');

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

INSERT INTO `wp_manufacturer` (`id`, `name`, `address`, `phone`, `specialization`, `created`, `modified`) VALUES
(4, 'Chu Do', 'Long Bien, Ha Noi, Viet Nam', '0354324599', '123', '2022-05-14 15:37:14', '2022-05-14 15:37:14'),
(5, 'Chu Do', 'Long Bien, Ha Noi, Viet Nam', '0354324599', '123', '2022-05-21 16:12:38', '2022-05-21 16:12:38'),
(6, '12321', 'Long Bien, Ha Noi, Viet Nam', '0354324599', '123', '2022-05-21 16:12:42', '2022-05-21 16:12:42');

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

INSERT INTO `wp_medicine` (`id`, `name`, `price`, `type`, `HSD`, `description`, `manual`, `created`, `modified`, `manufacturer_id`) VALUES
(1, 'Humasis COVID-19 Ag Home Test Kit', 450000, '22', 18, 'Hộp 5 test, gồm:\r\n\r\nKhay thử, đựng riêng trong túi: 5 khay\r\nỐng nghiệm dùng 1 lần chứa dung dịch đệm chiết mẫu: 5 ống\r\nNắp lọc: 5 cái\r\nTăm bông tiệt trùng để lấy mẫu xét nghiệm: 5 cái\r\n\r\nHoạt chất\r\n• Kháng thể đơn dòng kháng SARS-CoV-2Nucleocapsid\r\n• Kháng thể đơn dòng đặc hiệu với RBD SpikeProtein của SARS-CoV-2\r\n• Kháng thể dê kháng IgG chuột\r\n\r\n', 'Khuyến cáo trước khi dùng\r\n- Đọc kĩ hướng dẫn sử dụng và thực hiện đúng theo từng bước ở phần hướng dẫn chi tiết\r\n- Rửa tay thật kĩ trước khi sử dụng bộ xét nghiệm\r\n- Nếu bộ xét nghiệm được giữ lạnh, để ở nhiệt độ phòng 30 phút trước khi sử dụng\r\n- Nếu người sử dụng từ 3-14 tuổi, phải có sự giám sát của người giám hộ.\r\n\r\nLấy mẫu\r\n1) Sử dụng tăm bông được cung cấp trong bộ xét nghiệm để lấy mẫu dịch ngoáy mũi.\r\n2) Đưa tăm bông vào lỗ mũi trái đến khoảng 2cm và chà mạnh vào thành mũi theo chuyển động tròn 5 lần hoặc ít nhất 15 giây. Tiến hành làm tương tự cho lỗ mũi bên phải với cùng một cây tăm bông.\r\n*Sau khi lấy mẫu, nên xét nghiệm ngay để có kết quả chính xác nhất.', '2022-06-30 08:40:54', '2022-06-30 08:40:54', 4),
(2, 'Astrazeneca', 120033, '17', 12, '123', '123', '2022-06-30 08:43:09', '2022-06-30 08:43:09', 5),
(3, 'Astrazeneca', 120033, '17', 12, '123', '123', '2022-06-16 10:12:21', '2022-06-16 10:12:21', 5),
(4, 'Astrazeneca', 120033, '22', 12, '123', '132', '2022-06-16 10:16:19', '2022-06-16 10:16:19', 5),
(8, 'Humasis COVID-19 Ag Home Test Kit', 450000, '22', 13, '123', '123', '2022-06-17 05:22:45', '2022-06-17 05:22:45', 4),
(9, 'blue dose', 123123213, '22', 13, 'ádasd', 'ádasd', '2022-06-29 16:32:03', '2022-06-29 16:32:03', 5);

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

INSERT INTO `wp_medicine_type_s` (`id`, `name`, `support`, `created`, `modified`) VALUES
(13, 'as', 'as', '2022-05-12 15:06:37', '2022-05-12 15:06:37'),
(17, 'asd', 'sad', '2022-05-12 15:40:03', '2022-05-12 15:40:03'),
(18, 'a', 'asd', '2022-05-12 15:41:53', '2022-05-12 15:41:53'),
(19, 'asd', 'asd', '2022-05-12 15:52:02', '2022-05-12 15:52:02'),
(20, 'asasdasd', 'asd', '2022-05-12 15:52:08', '2022-05-12 15:52:08'),
(21, '11', 'sadaf', '2022-05-13 04:28:06', '2022-05-13 04:28:06'),
(22, 'Bộ test thử nghiệm covid', 'Miệng, Mũi', '2022-06-16 07:30:21', '2022-06-16 07:30:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wp_tool`
--

CREATE TABLE `wp_tool` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci,
  `manual` text,
  `described` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci,
  `HSD` int DEFAULT NULL,
  `manufacturer_id` tinyint DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `wp_tool`
--

INSERT INTO `wp_tool` (`id`, `name`, `price`, `description`, `manual`, `described`, `HSD`, `manufacturer_id`, `created`, `modified`) VALUES
(4, 'Gậy y tế bb', 123123, 'Not\r\n', 'nope baby', '', 36, 5, '2022-06-30 08:51:09', '2022-06-30 08:51:09'),
(5, 'Gậy y tế', 123123, '4546556464654', NULL, '', NULL, 4, '2022-06-01 05:16:51', '2022-06-01 05:16:51'),
(6, 'Máy Xông Khí Dung Microlife Neb200', 1050000, 'Phụ kiện máy bao gồm: 2 mask (người lớn và trẻ em), 1 cốc đựng thuốc, 1 càng xông họng, 1 càng xông mũi, 3 miếng lọc khí, dây dẫn khí, sách hướng dẫn sử dụng, phiếu bảo hành sản phẩm.', 'Nên làm sạch tất cả các thành phần của thiết bị trong lần lắp đặt đầu tiên:\r\n\r\nLắp ráp bộ phận máy phun sương. Đảm bảo rằng tất cả các bộ phận đã hoàn thành.\r\nĐổ đầy dung dịch hít vào máy phun sương theo hướng dẫn của bác sĩ. Đảm bảo rằng bạn không vượt quá mức tối đa.\r\nKết nối máy phun sương qua ống dẫn khí với máy nén và cắm cáp vào ổ điện (230V 50Hz AC).\r\nĐể bắt đầu điều trị, đặt nút ON/OFF ở vị trí «l».\r\nỐng xông miệng giúp đưa thuốc đến phổi tốt hơn.\r\n\r\nLựa chọn giữa mặt nạ dành cho người lớn hoặc trẻ em phù hợp, để vừa đủ bao trùm cả mũi và miệng.\r\n\r\nSử dụng các phụ kiện, kể cả ống xông mũi theo chỉ định của bác sĩ.\r\n\r\nTrong suốt quá trình xông, ngồi ở tư thế thoải mái với phần trên cơ thể thẳng đứng, không ngồi dựa lưng vào ghế để đề phòng việc dồn ép khí quản của bạn và làm giảm hiệu quả điều trị. Không nằm khi xông. Dừng quá trình xông nếu bạn cảm thấy có gì không ổn.\r\n\r\nSau khi hoàn thành giai đoạn hít thở mà bác sĩ khuyến nghị, chuyển công tắc ON/OFF sang vị trí «O» để tắt thiết bị và rút phích cắm khỏi ổ cắm.\r\n\r\nXả dung dịch còn lại khỏi máy phun sương và làm sạch thiết bị như mô tả trong phần “Làm sạch và Khử trùng”.\r\n\r\nĐối tượng sử dụng\r\n\r\nSản phẩm dùng cho bệnh nhân viêm mũi, viêm xoang, các bệnh nhân gặp phải vấn đề về đường hô hấp.', 'Máy xông khí dung Microlife NEB200 có các cải tiến về mặt công nghệ giúp người sử dụng dễ dàng hơn trong quá trình phòng và điều trị bệnh liên quan đến đường hô hấp. Sản phẩm được thiết kế nhỏ gọn, chất liệu cao cấp, dễ dàng vận hành và sử dụng, NEB200 đang dần trở thành giải pháp tối ưu trong quá trình phòng và điều trị bệnh.', NULL, 4, '2022-06-30 09:53:19', '2022-06-30 09:53:19');

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

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin_medical', '$P$BL/kmRgTUMpEFAzWewZvvnV7z/1yAU/', 'admin_medical', 'dochu8@gmail.com', 'http://localhost/medicaltest.com', '2022-05-14 13:25:14', '', 0, 'admin_medical');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `wp_manufacturer`
--
ALTER TABLE `wp_manufacturer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `wp_medicine`
--
ALTER TABLE `wp_medicine`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
