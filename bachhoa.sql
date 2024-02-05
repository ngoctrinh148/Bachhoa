-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 05, 2024 lúc 01:59 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bachhoa`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address`
--
-- Error reading structure for table bachhoa.address: #1932 - Table &#039;bachhoa.address&#039; doesn&#039;t exist in engine
-- Error reading data for table bachhoa.address: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `bachhoa`.`address`&#039; at line 1

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `prod_id` varchar(191) NOT NULL,
  `prod_qty` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`, `updated_at`) VALUES
(14, '5', '1', '1', '2024-01-04 07:20:31', '2024-01-04 07:20:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `popular`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Thịt, Cá, Trứng', 'thit-ca-trung', 0, 1, '1705476339.png', '2024-01-17 00:25:39', '2024-01-17 00:38:39'),
(2, 'Rau, Củ, Quả', 'rau-cu-qua', 0, 1, '1705476383.jpg', '2024-01-17 00:26:23', '2024-01-17 00:26:23'),
(3, 'Dầu Ăn, Gia Vị', 'dau-an-gia-vi', 0, 0, '1705476416.jpg', '2024-01-17 00:26:56', '2024-01-18 22:57:11'),
(4, 'Thực Phẩm Lạnh', 'thuc-pham-lanh', 0, 0, '1705476463.jpg', '2024-01-17 00:27:43', '2024-01-17 00:38:50'),
(5, 'Mỳ, Miến, Cháo, Phở', 'my-mien-chao-pho', 0, 0, '1705476558.jpg', '2024-01-17 00:29:18', '2024-01-17 00:29:18'),
(6, 'Gạo, Bột, Đồ Khô', 'gao-bot-do-kho', 0, 0, '1705476595.jpg', '2024-01-17 00:29:55', '2024-01-17 00:29:55'),
(7, 'Bia, Nước Giải Khát', 'bia-nuoc-giai-khat', 0, 1, '1705476629.jpg', '2024-01-17 00:30:29', '2024-01-17 00:30:29'),
(8, 'Sữa Các Loại', 'sua-cac-loai', 0, 0, '1705476672.jpg', '2024-01-17 00:31:12', '2024-01-17 00:31:12'),
(9, 'Bánh Kẹo Các Loại', 'banh-keo-cac-loai', 0, 1, '1705476740.jpg', '2024-01-17 00:32:20', '2024-01-17 00:32:20'),
(10, 'Chăm Sóc Cá Nhân', 'cham-soc-ca-nhan', 0, 0, '1705476786.jpg', '2024-01-17 00:33:06', '2024-01-17 00:33:06'),
(11, 'Vệ Sinh Nhà Cửa', 've-sinh-nha-cua', 0, 1, '1705476983.jpg', '2024-01-17 00:36:23', '2024-01-17 00:36:23'),
(12, 'Mẹ & Bé', 'me-&-be', 0, 0, '1705477480.png', '2024-01-17 00:44:40', '2024-01-17 00:44:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `details`
--

CREATE TABLE `details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `id_user` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `details`
--

INSERT INTO `details` (`id`, `product_id`, `prod_qty`, `id_user`, `created_at`, `updated_at`) VALUES
(4, 3, 5, '1', '2024-01-21 08:38:05', '2024-01-21 08:38:05'),
(5, 9, 10, '1', '2024-01-21 08:38:23', '2024-01-21 08:38:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `className` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_11_11_161517_create_categories_table', 1),
(7, '2023_11_13_133911_create_products_table', 1),
(8, '2023_11_14_181617_create_carts_table', 1),
(9, '2023_11_21_142233_create_orders_table', 1),
(10, '2023_11_21_145221_create_order_items_table', 1),
(12, '2023_12_05_131602_create_wishlist_table', 1),
(13, '2023_12_06_131531_create_rating_table', 1),
(14, '2023_12_09_022355_create_reviews_table', 1),
(15, '2024_01_21_084516_create_details_table', 2),
(16, '2024_01_21_130101_create_table_event', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address1` varchar(191) NOT NULL,
  `ward` varchar(191) NOT NULL,
  `district` varchar(191) NOT NULL,
  `city` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `reason` varchar(191) DEFAULT NULL,
  `message` varchar(191) DEFAULT NULL,
  `total_price` varchar(191) NOT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `address1`, `ward`, `district`, `city`, `status`, `reason`, `message`, `total_price`, `tracking_no`, `created_at`, `updated_at`) VALUES
(1, 2, 'ngoctrinh', 'ngoctrinh14223@gmail.com', '0905709480', '143 Nguyễn Lương Bằng', 'Hòa Khánh Bắc', 'Liên Chiểu', 'Đà Nẵng', 3, NULL, NULL, '186200', 'nt7852', '2024-01-17 09:21:56', '2024-01-17 09:39:34'),
(2, 2, 'ngoctrinh', 'ngoctrinh14223@gmail.com', '0905709480', '143 Nguyễn Lương Bằng', 'Hòa Khánh Bắc', 'Liên Chiểu', 'Đà Nẵng', 1, NULL, NULL, '93100', 'nt8760', '2024-01-17 09:47:06', '2024-01-21 01:16:10'),
(3, 2, 'ngoctrinh', 'ngoctrinh14223@gmail.com', '0905709480', '143 Nguyễn Lương Bằng', 'Hòa Khánh Bắc', 'Liên Chiểu', 'Đà Nẵng', 0, NULL, NULL, '160840', 'nt1429', '2024-01-21 08:09:28', '2024-01-21 08:09:28'),
(4, 6, 'Lê Thanh Tâm', 'thanhtam11@gmail.com', '0905709480', 'Kiệt 3', 'Hòa Khương', 'Hòa Vang', 'Đã', 0, NULL, NULL, '612000', 'nt3356', '2024-01-21 08:48:20', '2024-01-21 09:45:55'),
(5, 2, 'ngoctrinh', 'ngoctrinh14223@gmail.com', '0905709480', '143 Nguyễn Lương Bằng', 'Hòa Khánh Bắc', 'Liên Chiểu', 'Đà Nẵng', 2, 'Mua Nhầm', NULL, '102000', 'nt9927', '2024-01-21 09:33:27', '2024-01-21 09:43:11'),
(6, 7, 'Công Anh', 'conganh212@gmail.com', '0905709480', '1453 Nguyễn Lương Bằng', 'Hòa Hiệp Bắc', 'Liên Chiểu', 'Đà Nẵng', 1, NULL, NULL, '59520', 'nt2603', '2024-01-21 13:17:45', '2024-01-21 13:47:38'),
(7, 7, 'Công Anh', 'conganh212@gmail.com', '0905709480', '1453 Nguyễn Lương Bằng', 'Hòa Hiệp Bắc', 'Liên Chiểu', 'Đà Nẵng', 2, 'Mua Nhầm', NULL, '119040', 'nt3468', '2024-01-21 14:57:00', '2024-01-21 15:06:32'),
(8, 1, 'bachhoaxanh', 'ngoctrinh14823@gmail.com', '0905709480', '143 Nguyễn Lương Bằng', 'asd', 'asdas', 'Đà Nẵng', 2, NULL, NULL, '59520', 'nt5320', '2024-01-21 15:23:38', '2024-01-21 15:25:59'),
(9, 8, 'bachhoaxanh', 'conhan@gmail.com', '0905709480', '143 Nguyễn Lương Bằng', 'asd', 'asdas', 'Đà Nẵng', 3, NULL, NULL, '138900', 'nt5725', '2024-01-21 23:52:51', '2024-01-21 23:58:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) NOT NULL,
  `prod_id` varchar(191) NOT NULL,
  `qty` varchar(191) NOT NULL,
  `price` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '2', '93100', '2024-01-17 09:21:56', '2024-01-17 09:21:56'),
(2, '2', '1', '1', '93100', '2024-01-17 09:47:06', '2024-01-17 09:47:06'),
(3, '3', '2', '2', '59520', '2024-01-21 08:09:28', '2024-01-21 08:09:28'),
(4, '3', '12', '2', '20900', '2024-01-21 08:09:28', '2024-01-21 08:09:28'),
(5, '4', '44', '2', '306000', '2024-01-21 08:48:20', '2024-01-21 08:48:20'),
(6, '5', '5', '3', '34000', '2024-01-21 09:33:27', '2024-01-21 09:33:27'),
(7, '6', '2', '1', '59520', '2024-01-21 13:17:45', '2024-01-21 13:17:45'),
(8, '7', '2', '2', '59520', '2024-01-21 14:57:00', '2024-01-21 14:57:00'),
(9, '8', '2', '1', '59520', '2024-01-21 15:23:38', '2024-01-21 15:23:38'),
(10, '9', '10', '3', '14000', '2024-01-21 23:52:51', '2024-01-21 23:52:51'),
(11, '9', '7', '2', '48450', '2024-01-21 23:52:51', '2024-01-21 23:52:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('ngoctrinh14823@gmail.com', '$2y$12$1k75p/8SmP7RWVtwAveXeOgHt/SC5BYpxfGJDV5GXj8xVXER3wIM.', '2023-12-17 11:10:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_id` bigint(20) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` longtext NOT NULL,
  `original_price` varchar(191) NOT NULL,
  `image` varchar(191) NOT NULL,
  `qty` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `trending` tinyint(4) NOT NULL DEFAULT 0,
  `discount` tinyint(191) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `cate_id`, `name`, `slug`, `description`, `original_price`, `image`, `qty`, `status`, `trending`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, 'Thịt Ba Rọi', 'thit-ba-roi', 'Ba rọi heo của thương hiệu CP đạt các tiêu chuẩn về an toàn toàn thực phẩm, đảm bảo chất lượng, độ tươi ngon. Thịt heo mềm, vân nạc, mỡ rõ ràng nên rất phù hợp làm nguyên liệu để nấu thịt kho hột vịt. Thịt heo ba rọi có thể dùng điện thoại quét mã QR trên tem sản phẩm để kiểm tra nguồn gốc.</br>\r\n<b>Cách sơ chế ba rọi heo</b></br>\r\nThịt ba rọi heo được đóng khay tiện lợi, sạch sẽ, bạn chỉ cần mang về, rửa sạch lại với nước muối loãng. Sau đó thái thành miếng vừa ăn và chế biến thành các món ăn yêu thích.</br>\r\n<b>Các món ăn ngon từ ba rọi heo</b></br>\r\nBạn có thể chế biến ba rọi heo thành nhiều món ăn ngon như ba rọi kho măng, ba rọi chiên sả, ba rọi kho dừa, ba rọi chiên sả ớt, ba rọi chiên muối,... </br>\r\n<b>Cách bảo quản và sử dụng ba rọi heo tươi ngon</b></br>\r\nThịt ba rọi tươi CP khi mua về có thể bảo quản ngăn mát từ 0 - 4 độ C, tối đa từ 3 - 5 ngày, bảo quản trong ngăn đông được tối đa 2 - 3 tháng mà vẫn đảm bảo thịt tươi ngon, không làm giảm đi nhiều về chất lượng. Khi ăn chỉ cần lấy ra, rã đông (nếu bảo quản ngăn đông), rửa sạch và mang đi chế biến', '98000', '1705477983.jpg', '20', 0, 0, 5, '2024-01-17 00:53:03', '2024-01-21 08:35:39'),
(2, 1, 'Thịt Xông Khói', 'thit-xong-khoi', 'Là loại sản phẩm cao cấp đến từ thương hiệu thịt nguội Le Gourmet quen thuộc. Ba rọi xông khói xắt lát Le Gourmet gói 200g được chế biến từ thịt heo ba rọi tươi ngon. Thịt nguội là lựa chọn hàng đầu khi không có quá nhiều thời gian chế biến cho bữa ăn gia đình.</br>\r\n<b>Thành phần dinh dưỡng trong sản phẩm</b></br>\r\nBa rọi xông khói xắt lát Le Gourmet gói 200g là 1 trong những sản phẩm rất nổi bật của hãng, được làm từ thịt heo tươi sạch, đạt chuẩn công công nghệ hiện đại bật nhất, kết hợp với các loại gia vị thơm ngon cho món ăn chứa các chất dinh dưỡng tốt cho cơ thể như: chất đạm, chất béo, vitamin, carbohydrate, khoáng chất thiết yếu, năng lượng,... cực tốt cho sức khỏe.</br>\r\n<b>Tác dụng của sản phẩm với sức khỏe</b></br>\r\nBa rọi xông khói xắt lát Le Gourmet gói 200g sản phẩm dinh dưỡng từ thịt heo nguyên chất, sạch chất lượng, tác dụng như loại thực phẩm dinh dưỡng, chế biến các món ăn ngon khó cưỡng, nhanh chóng, tiết kiệm nhiều thời gian, cung cấp đầy đủ các chất dinh dưỡng cho cơ thể.', '64000', '1705642615.png', '19', 0, 1, 7, '2024-01-18 22:36:55', '2024-01-21 15:23:38'),
(3, 1, 'Thịt Cốt Lết Heo', 'thit-cot-let-heo', 'Thịt ngon', '73000', '1705643054.jpg', '25', 0, 0, 0, '2024-01-18 22:44:14', '2024-01-21 08:38:05'),
(4, 1, 'Bít Tết Bò Úc', 'bit-tet-bo-uc', 'Ngon', '120000', '1705643111.jpg', '20', 0, 1, 10, '2024-01-18 22:45:11', '2024-01-18 22:45:11'),
(6, 1, 'Cánh Gà CP', 'canh-ga-cp', 'ngon', '44000', '1705643213.jpg', '20', 0, 0, 5, '2024-01-18 22:46:53', '2024-01-18 22:46:53'),
(7, 1, 'Đùi Gà CP', 'dui-ga-cp', 'ngon', '51000', '1705643294.jpg', '18', 0, 1, 5, '2024-01-18 22:48:14', '2024-01-21 23:52:51'),
(8, 1, 'Thịt Ba Chỉ', 'thit-ba-chi', 'ngon', '144000', '1705643388.jpg', '20', 0, 1, 8, '2024-01-18 22:49:48', '2024-01-18 22:49:48'),
(9, 2, 'Bắp Cải Tím', 'bap-cai-tim', 'ngon', '25000', '1705643443.jpg', '30', 0, 1, 5, '2024-01-18 22:50:43', '2024-01-21 08:38:23'),
(10, 2, 'Bắp Mỹ', 'bap-my', 'ngon', '14000', '1705643484.jpg', '17', 0, 0, 0, '2024-01-18 22:51:24', '2024-01-21 23:52:51'),
(11, 2, 'Cà Chua CP', 'ca-chua-cp', 'ngon', '18000', '1705643521.jpg', '20', 0, 0, 0, '2024-01-18 22:52:01', '2024-01-18 22:52:01'),
(12, 2, 'Cải Bẹ Xanh CP', 'cai-be-xanh-cp', 'ngon', '22000', '1705643586.jpg', '18', 0, 1, 5, '2024-01-18 22:53:06', '2024-01-21 08:09:28'),
(13, 2, 'Cải Thìa CP', 'cai-thia-cp', 'ngon', '26000', '1705643631.jpg', '20', 0, 1, 8, '2024-01-18 22:53:51', '2024-01-18 22:53:51'),
(14, 2, 'Khoai Lang Đà Lạt', 'khoai-lang-da-lat', 'ngon', '28000', '1705643705.jpg', '20', 0, 1, 10, '2024-01-18 22:55:05', '2024-01-18 22:55:05'),
(15, 2, 'Rau Húng', 'rau-hung', 'ngon', '14000', '1705643743.jpg', '20', 0, 0, 0, '2024-01-18 22:55:43', '2024-01-18 22:55:43'),
(16, 2, 'Rau Xà Lách', 'rau-xa-lach', 'ngon', '18000', '1705643791.jpg', '20', 0, 0, 10, '2024-01-18 22:56:31', '2024-01-18 22:56:31'),
(17, 3, 'Dầu Neptune', 'dau-neptune', 'ngon', '33000', '1705643892.jpg', '20', 0, 1, 10, '2024-01-18 22:58:12', '2024-01-18 22:58:12'),
(18, 3, 'Dầu Cooking Oil', 'dau-cooking-oil', 'ngon', '18000', '1705643934.jpg', '20', 0, 0, 0, '2024-01-18 22:58:54', '2024-01-18 22:58:54'),
(19, 3, 'Bột Ngọt Ajinamoto', 'bot-ngot-ajinamoto', 'ngon', '21000', '1705644027.jpg', '20', 0, 0, 0, '2024-01-18 23:00:27', '2024-01-18 23:00:27'),
(20, 3, 'Hạt nêm Aji-ngon', 'hat-nem-aji-ngon', 'ngon', '28000', '1705644072.jpg', '20', 0, 1, 10, '2024-01-18 23:01:12', '2024-01-18 23:01:12'),
(22, 3, 'Tương Ớt ChinSu', 'tuong-ot-chinsu', 'ngon', '16000', '1705644409.jpg', '20', 0, 1, 10, '2024-01-18 23:06:49', '2024-01-18 23:06:49'),
(23, 3, 'Nước Mắn Maggie', 'nuoc-mam-maggie', 'ngon', '20000', '1705644476.jpg', '20', 0, 1, 5, '2024-01-18 23:07:56', '2024-01-18 23:07:56'),
(24, 3, 'Nước Mắm Nam Ngư', 'nuoc-mam-nam-ngu', 'ngon', '18000', '1705644531.jpg', '20', 0, 1, 10, '2024-01-18 23:08:51', '2024-01-18 23:08:51'),
(25, 4, 'Kem Dâu', 'kem-dau', 'ngon', '30000', '1705644630.jpg', '20', 0, 1, 10, '2024-01-18 23:10:30', '2024-01-18 23:10:30'),
(26, 4, 'Kem Socola', 'kem-so-co-la', 'ngon', '30000', '1705644664.jpg', '20', 0, 1, 10, '2024-01-18 23:11:04', '2024-01-18 23:11:04'),
(27, 5, 'Cháo Yến Việt', 'chao-yen-viet', 'ngon', '160000', '1705644736.jpg', '20', 0, 0, 0, '2024-01-18 23:12:16', '2024-01-18 23:12:16'),
(28, 5, 'Miến Dong Libra', 'mien-dong-libra', 'ngon', '20000', '1705644799.jpg', '20', 0, 0, 0, '2024-01-18 23:13:19', '2024-01-18 23:13:19'),
(29, 5, 'Miến Dong Susan', 'mien-dong-susan', 'ngon', '22000', '1705644845.jpg', '20', 0, 0, 0, '2024-01-18 23:14:05', '2024-01-18 23:14:05'),
(30, 5, 'Mỳ Gấu Đỏ', 'my-gau-do', 'ngon', '150000', '1705644899.jpg', '20', 0, 0, 0, '2024-01-18 23:14:59', '2024-01-18 23:14:59'),
(31, 5, 'Mỳ Hảo Hảo', 'my-hao-hao', 'ngon', '220000', '1705644957.jpg', '20', 0, 1, 10, '2024-01-18 23:15:57', '2024-01-18 23:15:57'),
(32, 5, 'Mỳ Ly Modern', 'my-ly-modern', 'ngon', '240000', '1705645010.jpg', '20', 0, 1, 10, '2024-01-18 23:16:50', '2024-01-18 23:16:50'),
(33, 5, 'Mỳ Ly Modern', 'my-ly-modern', 'ngon', '240000', '1705645011.jpg', '20', 0, 1, 10, '2024-01-18 23:16:51', '2024-01-18 23:16:51'),
(34, 5, 'Phở Cung Đình', 'pho-cung-dinh', 'ngon', '280000', '1705645068.jpg', '20', 0, 1, 10, '2024-01-18 23:17:48', '2024-01-18 23:17:48'),
(35, 5, 'Phở Vifon', 'pho-vifon', 'ngon', '25000', '1705645109.jpg', '20', 0, 1, 10, '2024-01-18 23:18:29', '2024-01-18 23:18:29'),
(36, 3, 'Sốt Mayonese', 'sot-mayonese', 'ngon', '16000', '1705645160.jpg', '20', 0, 0, 0, '2024-01-18 23:19:21', '2024-01-18 23:19:21'),
(37, 6, 'Bột Bánh Xèo Mikko', 'bot-banh-xeo-mikko', 'ngon', '22000', '1705645319.jpg', '20', 0, 0, 0, '2024-01-18 23:20:21', '2024-01-18 23:21:59'),
(38, 6, 'Bột Chiên Giòn', 'bot-chien-gion-mezan', 'ngon', '24000', '1705645286.jpg', '20', 0, 0, 0, '2024-01-18 23:21:26', '2024-01-18 23:22:24'),
(39, 6, 'Bột Rau Câu', 'bot-rau-cau', 'ngon', '12000', '1705645403.jpg', '20', 0, 0, 0, '2024-01-18 23:23:23', '2024-01-18 23:23:23'),
(40, 6, 'Cá Nục Hộp', 'ca-nuc-hop', 'ngon', '19000', '1705645464.jpg', '20', 0, 0, 0, '2024-01-18 23:24:24', '2024-01-18 23:24:24'),
(41, 6, 'Cá Ngừ Hộp', 'ca-ngu-hop', 'ngon', '22000', '1705645514.jpg', '20', 0, 0, 0, '2024-01-18 23:25:14', '2024-01-18 23:25:14'),
(42, 6, 'Gạo Cỏ Mây', 'gao-co-may', 'ngon', '195000', '1705645573.jpg', '20', 0, 1, 10, '2024-01-18 23:26:13', '2024-01-18 23:26:13'),
(43, 6, 'Gạo Thơm ST25', 'gao-thom-st25', 'ngon', '210000', '1705645657.jpg', '20', 0, 1, 10, '2024-01-18 23:27:37', '2024-01-18 23:27:37'),
(44, 7, 'Bia Sài Gòn', 'bia-sai-gon', 'Ngon', '340000', '1705827638.jpg', '18', 0, 1, 10, '2024-01-21 02:00:38', '2024-01-21 08:48:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `prod_id` varchar(191) NOT NULL,
  `stars_rated` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rating`
--

INSERT INTO `rating` (`id`, `user_id`, `prod_id`, `stars_rated`, `created_at`, `updated_at`) VALUES
(7, '2', '1', '4', '2024-01-21 08:21:10', '2024-01-21 08:21:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `prod_id` varchar(191) NOT NULL,
  `user_review` varchar(191) NOT NULL,
  `suggestion` varchar(191) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `prod_id`, `user_review`, `suggestion`, `created_at`, `updated_at`) VALUES
(5, '2', '1', 'Thịt ngon', '1', '2024-01-21 08:21:10', '2024-01-21 08:21:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `phone` varchar(191) DEFAULT NULL,
  `address1` varchar(191) DEFAULT NULL,
  `ward` varchar(191) DEFAULT NULL,
  `district` varchar(191) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_as`, `phone`, `address1`, `ward`, `district`, `city`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'ngoctrinh14823@gmail.com', NULL, '$2y$12$0GGomrzjOeb9qdRQ5fu39e6X3FbySLzRRLv/Iu0cw8DlWbcDnwhmq', 2, '0905709480', '143 Nguyễn Lương Bằng', 'asd', 'asdas', 'Đà Nẵng', NULL, '2023-12-14 05:57:43', '2024-01-21 15:23:38'),
(2, 'ngoctrinh', 'ngoctrinh14223@gmail.com', NULL, '$2y$12$Dk3/ykIWIBRuVuliXdSOdeQeqThDclmabHfsvkApZerhg3Va8v5NK', 0, '0905709480', '143 Nguyễn Lương Bằng', 'Hòa Khánh Bắc', 'Liên Chiểu', 'Đà Nẵng', NULL, '2023-12-14 06:16:27', '2024-01-21 11:45:24'),
(3, 'ngocle196', 'ngocle11@gmail.com', NULL, '$2y$12$DjOmpEARzOWAj7kVZdsC3e7qeo1SEhsSGWzrbWuDKVr7uOMBVI.8G', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-14 06:23:26', '2024-01-04 07:17:11'),
(6, 'Thanh Tâm', 'thanhtam11@gmail.com', NULL, '$2y$12$dmSlc59fB8wQ5E3/vP9d7OgNzliNfl9iGHi8W6YsGu36hScHEdmP.', 0, '0905709480', 'Kiệt 3', 'Hòa Khương', 'Hòa Vang', 'Đã', NULL, '2024-01-21 08:32:35', '2024-01-21 08:48:20'),
(7, 'Công Anh', 'conganh212@gmail.com', NULL, '$2y$12$ig4c2H7vfwknCiUY4YM.g.CZjfDxGbzdjauqiB/6satfzJ.8tuxtq', 0, '0905709480', '1453 Nguyễn Lương Bằng', 'Hòa Hiệp Bắc', 'Liên Chiểu', 'Đà Nẵng', NULL, '2024-01-21 12:08:11', '2024-01-21 13:17:45'),
(8, 'Cô Nhân', 'conhan@gmail.com', NULL, '$2y$12$UTIq5WB.h/VG6XcZWRNBQe45hpX3N9aGeybUfzG.qn4cSjjyjANjC', 1, '0905709480', '143 Nguyễn Lương Bằng', 'asd', 'asdas', 'Đà Nẵng', NULL, '2024-01-21 23:47:56', '2024-01-21 23:55:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `prod_id` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `prod_id`, `created_at`, `updated_at`) VALUES
(6, '7', '2', '2024-01-21 12:45:29', '2024-01-21 12:45:29');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `details_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `details`
--
ALTER TABLE `details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
