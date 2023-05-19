-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 19, 2023 lúc 01:56 PM
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
-- Cơ sở dữ liệu: `hyper`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chapter`
--

CREATE TABLE `chapter` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `name` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chapter`
--

INSERT INTO `chapter` (`id`, `id_post`, `name`) VALUES
(13, 25, 1),
(14, 25, 2),
(15, 25, 3),
(16, 25, 4),
(17, 25, 5),
(18, 25, 6),
(19, 25, 7),
(20, 25, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `comment` text NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `id_user`, `id_post`, `comment`, `time`) VALUES
(1, 14, 25, 'good', '2023-05-18 17:07:57'),
(2, 14, 25, 'good', '2023-05-18 17:09:41'),
(3, 14, 25, 'good', '2023-05-18 17:14:27'),
(4, 14, 25, 'good', '2023-05-18 17:17:43'),
(5, 14, 25, 'good', '2023-05-18 17:18:29'),
(6, 14, 25, 'good', '2023-05-18 17:18:49'),
(7, 14, 25, 'good', '2023-05-18 17:19:17'),
(8, 14, 25, 'good', '2023-05-18 17:19:48'),
(9, 14, 25, 'good', '2023-05-18 17:20:16'),
(10, 14, 25, 'good', '2023-05-18 17:20:48'),
(11, 14, 25, 'good', '2023-05-18 17:21:06'),
(12, 14, 25, 'good', '2023-05-18 17:21:34'),
(13, 14, 25, 'good', '2023-05-18 17:21:57'),
(14, 14, 25, 'good', '2023-05-18 17:22:12'),
(15, 14, 25, 'good', '2023-05-18 17:23:48'),
(16, 14, 25, 'good', '2023-05-18 17:27:07'),
(17, 14, 25, 'good', '2023-05-18 17:28:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `favorite`
--

INSERT INTO `favorite` (`id`, `id_post`, `id_user`) VALUES
(96, 26, 15),
(97, 25, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `follow`
--

CREATE TABLE `follow` (
  `id_follow` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `follow`
--

INSERT INTO `follow` (`id_follow`, `id_user`, `id_post`) VALUES
(1, 14, 25),
(4, 15, 26);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `picture_chapter`
--

CREATE TABLE `picture_chapter` (
  `id` int(11) NOT NULL,
  `id_chap` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `picture_chapter`
--

INSERT INTO `picture_chapter` (`id`, `id_chap`, `image`) VALUES
(35, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-3.jpg'),
(36, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-4.jpg'),
(37, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-5.jpg'),
(38, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-6.jpg'),
(39, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-7.jpg'),
(40, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-8.jpg'),
(41, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-9.jpg'),
(42, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-10.jpg'),
(43, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-11.jpg'),
(44, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-12.jpg'),
(45, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-13.jpg'),
(46, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-14.jpg'),
(47, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-15.jpg'),
(48, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-16.jpg'),
(49, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-17.jpg'),
(50, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-18.jpg'),
(51, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-19.jpg'),
(52, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-20.jpg'),
(53, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-21.jpg'),
(54, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-22.jpg'),
(55, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-23.jpg'),
(56, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-24.jpg'),
(57, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-25.jpg'),
(58, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-26.jpg'),
(59, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-27.jpg'),
(60, 13, 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug-1-28.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `avatar_post` text NOT NULL,
  `name_post` varchar(50) NOT NULL,
  `author_post` varchar(30) NOT NULL,
  `content_post` text NOT NULL,
  `name_tag` varchar(20) NOT NULL,
  `view` int(20) NOT NULL,
  `time_update` date DEFAULT NULL,
  `like_post` int(11) NOT NULL,
  `comment_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id_post`, `avatar_post`, `name_post`, `author_post`, `content_post`, `name_tag`, `view`, `time_update`, `like_post`, `comment_post`) VALUES
(25, 'cheat-kusushi-no-slow-life-isekai-ni-tsukurou-drugstore_1546326532.jpg', 'Cheat Kusushi No Slow Life Isekai Ni Tsukurou Drug', '', '', 'Manga', 92, '2023-05-17', 0, 0),
(26, 'flying-witch_1447076009.jpg', 'Flying Witch', '', '', 'nhat', 0, NULL, 0, 0),
(27, 'bac-thay-thuan-hoa_1604461416.jpg', 'Bậc Thầy Thuần Hóa', '', '', 'han', 0, NULL, 0, 0),
(28, 'toi-tro-thanh-mot-nong-dan_1666322864.jpg', 'Tôi Trở Thành Một Nông Dân', '', '', 'han', 0, NULL, 0, 0),
(29, 'toi-tro-thanh-mot-nguoi-cha_1660123632.jpg', 'Tôi Trở Thành Một Người Cha', '', '', 'han', 0, NULL, 0, 0),
(30, 'di-toc-trung-sinh_1575854208.jpg', 'Dị Tộc Trùng Sinh', '', '', 'trung', 0, NULL, 0, 0),
(31, 'linh-khu_1675844919.jpg', 'Linh Khư', '', '', 'trung', 0, NULL, 0, 0),
(32, 'yen-vu-lau_1679197440.jpg', 'Yên Vũ Lâu', '', '', 'trung', 0, NULL, 0, 0),
(33, 'ta-u-thien-su_1679413390.jpg', 'Tạ U Thiên Sư', '', '', 'trung', 0, NULL, 0, 0),
(34, 'nha-hang-tho-san-quai-vat_1667640607.jpg', 'Nhà Hàng Thợ Săn Quái Vật', '', '', 'han', 0, NULL, 0, 0),
(35, 'yaiteru-futari.jpg', 'Yaiteru Futari', '', '', 'nhat', 0, NULL, 0, 0),
(36, 'isekai-de-slow-life-wo-anhbia.jpg', 'Isekai De Slow Life Wo', '', '', 'nhat', 0, NULL, 0, 0),
(39, 'mashle-magic-and-muscles_1580393483.jpg', 'Mashle Magic And Muscles', '', '', 'Manga', 0, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(30) NOT NULL,
  `avatar` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `permission` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `avatar`, `email`, `password`, `permission`) VALUES
(12, 'Diluc', 'diluc.jpg', 'diluc@gmail.com', 'diluc', 'admin'),
(13, 'Yae Miko', 'yae.jpg', 'yae@gmail.com', 'yae', 'admin'),
(14, 'Eula Lawrency', 'eula-1.jpg', 'eula@gmail.com', 'eula', 'user'),
(15, 'Nahihi', 'nahihi.png', 'nahida@gmail.com', 'nahida', 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id_follow`);

--
-- Chỉ mục cho bảng `picture_chapter`
--
ALTER TABLE `picture_chapter`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT cho bảng `follow`
--
ALTER TABLE `follow`
  MODIFY `id_follow` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `picture_chapter`
--
ALTER TABLE `picture_chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
