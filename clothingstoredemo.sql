-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 17, 2024 lúc 09:51 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `clothingstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `soft_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `soft_delete`) VALUES
(43, 6, 1),
(44, 6, 1),
(45, 18, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_details`
--

CREATE TABLE `cart_details` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart_details`
--

INSERT INTO `cart_details` (`id`, `cart_id`, `product_id`, `quantity`) VALUES
(93, 43, 27, 1),
(94, 43, 31, 1),
(95, 43, 42, 2),
(96, 44, 31, 1),
(97, 44, 41, 2),
(98, 45, 34, 1),
(99, 45, 39, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Men'),
(2, 'Women'),
(4, 'Accessory');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `galery`
--

CREATE TABLE `galery` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_code` varchar(100) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `order_code`, `fullname`, `email`, `phone_number`, `address`, `notes`, `order_date`, `status_id`, `total_money`, `user_id`) VALUES
(81, 'DH-9481', 'Ronaldo', 'ronaldoooo@gmail.com', '0344321111', 'Potugal', 'Siuuuuuuu', '2024-10-16 19:05:22', 5, 400, 6),
(82, 'DH-4389', 'Messi', 'Messi@gmail.com', '0344321111', 'Argentina', '196$', '2024-10-17 00:00:00', 1, 196, 6),
(83, 'DH-4054', 'HaHa', 'haha@gmail.com', '0344327577', 'Ha Noi', 'giao ko nhanh là bùng', '2024-10-17 09:48:46', 3, 231, 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL,
  `cart_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `quantity`, `total_money`, `cart_id`) VALUES
(65, 81, 27, 50, 1, 50, 43),
(66, 81, 31, 60, 1, 60, 43),
(67, 81, 42, 120, 2, 240, 43),
(68, 82, 31, 60, 1, 60, 44),
(69, 82, 41, 43, 2, 86, 44),
(70, 83, 34, 160, 1, 160, 45),
(71, 83, 39, 7, 3, 21, 45);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(350) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `price`, `discount`, `thumbnail`, `description`, `created_at`, `updated_at`) VALUES
(27, 1, 'Illusion Short Black', 68, 50, './uploads/17290973094360002.BLK_2_2048x.webp', 'From streets to the beach, St.Goliath is here with the ultimate hybrid short for the new season, the Illusion Short in Navy.', '2024-10-14 00:00:00', '2024-10-14 00:00:00'),
(28, 1, 'Icon Tee Charcoal', 88, 88, './uploads/17290973314048006.CHAR_2_600x.webp', 'This elevated basic tee is designed for the modern man, combining comfort and sophistication. Made for everyday wear, this tee is a versatile addition to any wardrobe. Upgrade your look with our Icon Tee, the perfect blend of luxury and comfort.', '2024-10-14 00:00:00', '2024-10-14 00:00:00'),
(29, 1, 'Overlay Tee Charcoal', 122, 105, './uploads/17290973884346013.WBLK_2_2048x.webp', 'Elevate your streetwear game with the Overlay Tee. With its striking back print and premium cotton construction, this tee is designed to make a statement while providing all-day comfort.', '2024-10-14 00:00:00', '2024-10-14 00:00:00'),
(30, 1, 'Wild Eagle Tee Washed Black', 66, 56, './uploads/17290974014048062.COAL_600x.webp', 'The Wild Eagle Tee features a unique back print design. The stylish print make this a must-have for any fashion-forward wardrobe. Embrace the latest trend and elevate your look with this fun tee.', '2024-10-14 00:00:00', '2024-10-14 00:00:00'),
(31, 1, 'Net Tee Washed Black', 60, 60, './uploads/17290974234048059.WBLK_1_33ac1bdd-0ea8-4dfb-a848-3a811552e857_2048x.webp', 'Elevate your street style with St Goliaths Net Tee, a perfect blend of retro charm and modern comfort. Inspired by the golden age of basketball, this tee features a classic, distressed graphic that pays homage to the game\'s rich history.', '2024-10-14 00:00:00', '2024-10-14 00:00:00'),
(32, 2, 'Charlie High Rise Wide Leg Jean Washed Black', 150, 150, './uploads/172909743864D0008.WBLK_2_600x.webp', 'The High Rise Wide Leg denim jeans feature classic five pocket styling, heritage blue wash, high waisted and a wide leg fit. They will be your go-to jean this season, easily dressed up or down.', '2024-10-14 00:00:00', '2024-10-14 00:00:00'),
(33, 2, 'Aae Rib Flare Pants Black', 135, 120, './uploads/172909744964X5062.BLK_2_600x.webp', 'AA EVE Rib Flares features a trending flare fit with baby lock finish in a luxe rib fabrication. Pair back with a oversized tee and sneakers.', '2024-10-14 00:00:00', '2024-10-14 00:00:00'),
(34, 2, 'Dale Denim Shacket Light Blue', 200, 160, './uploads/1729097464All-About-Eve-Dale-Shacket-Light-Blue-Edge-Clothing_600x.webp', 'The Dale Shacket is just the piece to complete any outfit. Crafted from cotton rigid denim, featuring a long fit and front chest pockets.', '2024-10-14 00:00:00', '2024-10-14 00:00:00'),
(35, 2, 'Dale Shacket Vintage White', 99, 95, './uploads/1729097477All-About-Eve-Dale-Shacket-Vintage-White-Edge-Clothing-2_600x.webp', 'The Dale Shacket is just the piece to complete any outfit. Crafted from cotton rigid denim, featuring a long fit and front chest pockets.', '2024-10-14 00:00:00', '2024-10-14 00:00:00'),
(36, 2, 'Emma Cord Shacket Vintage White', 120, 120, './uploads/1729097490All-About-Eve-Emma-Cord-Shacket-Vintage-White-Edge-Clothing-2_600x.webp', 'Introducing our Emma Cord Shacket – the perfect fusion of rugged charm and contemporary style. This versatile garment combines the classic appeal of a shirt with the robust functionality of a jacket, making it a must-have addition to your wardrobe.', '2024-10-14 00:00:00', '2024-10-14 00:00:00'),
(37, 4, 'Ny Yankees Cap Vintage Navy', 50, 50, './uploads/1729097508B-RGW17GWSNL.NAVY_1_600x.webp', 'Our Clean Up Strapback cap features the NY Yankees retro alternate logo, embroidered team logo on back, and a relaxed adjustable strap closure at the back. Be sure to cop your piece of New York history today only at Edge.', '2024-10-14 00:00:00', '2024-10-14 00:00:00'),
(38, 4, 'Silent No Show Sock 3 Pack White, Grey & Black', 10, 10, './uploads/172909752340A0000.MULT_1_600x.webp', 'Add the No Show Sock to your wardrobe today. These super soft and comfy socks will get you through any day. Comes in a 3 pack', '2024-10-14 00:00:00', '2024-10-14 00:00:00'),
(39, 4, 'Sexwax Car Freshener Pineapple', 7, 7, './uploads/1729097539Sex-Wax-Sexwax-Car-Freshener-Pineapple-Edge-Clothing_2048x.webp', 'Bring the smell of Mr. Zog\'s Sexwax into your car, office or home with Sexwax Air Fresheners.', '2024-10-14 00:00:00', '2024-10-14 00:00:00'),
(40, 4, 'Grafitti Crew Sock 3 Pack Black', 23, 23, './uploads/1729097593ST791021.BLK_1_600x.webp', 'Men\'s Graffiti Crew Sock in a 3 Pack features Stussy\'\'s graffiti jacquard logo on both sides of the leg, solid top band on the heel and toe. Comes in a 3 pack of black.', '2024-10-14 00:00:00', '2024-10-14 00:00:00'),
(41, 4, 'Harri Belt Black', 50, 43, './uploads/172909757864A0271.BLK__2_2048x.webp', 'Elevate your ensemble with the Harri Belt, a sleek accessory that seamlessly combines style and functionality. In classic black, this belt features a refined silver clasp that adds a touch of modern elegance. Its versatile design makes it the perfect finishing touch for any outfit, from casual jeans to tailored trousers. ', '2024-10-14 00:00:00', '2024-10-14 00:00:00'),
(42, 4, 'Shebang Black', 120, 120, './uploads/1729097559Le-Specs-Shebang-Black-Edge-Clothing_600x.webp', 'Offering relaxed noughties vibes, our SHEBANG oval sunglasses are effortless and perfect for everyday wear. Designed with wide temples and a slightly angled profile, this unisex style features luxurious three-dimensional hardware on both temples. Finished in classic black with dark lenses for an everyday look.  Made using BPA free polymer plastic which is lightweight, durable and impact resistant. Fitted with shatterproof and scratch resistant polycarbonate lenses.', '2024-10-14 00:00:00', '2024-10-14 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Client');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status_orders`
--

CREATE TABLE `status_orders` (
  `id` int(11) NOT NULL,
  `status_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `status_orders`
--

INSERT INTO `status_orders` (`id`, `status_name`) VALUES
(1, 'Đã Xử Lý'),
(2, 'Chưa Xử Lý'),
(3, 'Đang Giao'),
(4, 'Đã Giao'),
(5, 'Hủy Bỏ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `phone_number`, `address`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(6, 'Ha Van Tu ', 'abc@gmail.com', '0344321111', 'SS', '$2y$10$MZ0gPjYhsXkOyn.LzGexm.unmFgD//mXAhkwub4I57hBjRUmHiNke', 2, NULL, NULL),
(8, 'Nguyễn Văn A', 'tuhvph20024@fpt.edu.vn', '0012030321', 'HN ', '$2y$10$1hsktqTv4PZBxglUn0BrFuzjc6UrHdAqg60Bf2obx1IWm6ltGbL1G', 2, NULL, NULL),
(14, 'Tu Admin ', 'admin@gmail.com', '0344327577', 'SS', '$2y$10$T8UO0I8NKIky.aem8dyRweO.TW0SCdaQZSMuMaYZ/OByfA9sFUX5W', 1, NULL, NULL),
(15, 'admin2', 'abcd@gmail.com', '123456', 'ABC', '$2y$10$8h2gZNE1P/CthVAbD8XNgOt2ywCBN0beHw/ebZuEc3hYgBRg6YTgi', 1, NULL, NULL),
(17, 'Antony', 'client@gmail.com', '0012030321', 'ABC', '$2y$10$LoGtSFH/EcWxcQJU4Yhr.OH01qRTSZZaW87IU1DTm0psbECmdzuhO', 2, NULL, NULL),
(18, 'HaHa', 'haha@gmail.com', '0344327577', 'Ha Noi', '$2y$10$cBtcvHPZETJKxlnD41vHguGaJK/t3KxCAoA7oZPwT05ib.IvW2A6i', 2, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `galery`
--
ALTER TABLE `galery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_status` (`status_id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `status_orders`
--
ALTER TABLE `status_orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `galery`
--
ALTER TABLE `galery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `status_orders`
--
ALTER TABLE `status_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `cart_details_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `cart_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `galery`
--
ALTER TABLE `galery`
  ADD CONSTRAINT `galery_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`status_id`) REFERENCES `status_orders` (`id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
