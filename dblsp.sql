-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 22 Bulan Mei 2024 pada 13.03
-- Versi server: 10.4.27-MariaDB-log
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblsp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `address3` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phone`, `address1`, `address2`, `address3`, `created_at`, `updated_at`) VALUES
(1, 'rahma', 'rahma@gmail.com', '$2y$12$1tkWXdsX13MgpUzWHmAt.ONOGLzRZz9s9.zt7bfKEFonYCfMbyluO', '0987650876', 'jl.seoul', 'jl.melon', 'jl.anggur', '2024-05-20 01:40:38', '2024-05-20 01:40:38'),
(3, 'nana', 'nana@gmail.com', '$2y$12$TZwNeJvSiqlppnqw1P0okumr2Dc8WAsJvjqy871NUukgElEqZ99w2', '089679747864', 'seoul', 'rtyu', 'ffgfd', '2024-05-21 05:41:48', '2024-05-21 05:41:48'),
(6, 'jisung', 'jsng@gmail.com', '$2y$12$8EYDbDijXN8BvJt4QvHzaeuFcBBZWZvLpJH46O/fS4s06d3aby9bK', '08967974', 'seoul', 'rtyu', 'ffgfd', '2024-05-21 05:50:01', '2024-05-21 05:50:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `deliveries`
--

CREATE TABLE `deliveries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_date` datetime NOT NULL,
  `tracking_code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_discount_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `percentage` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `discount_categories`
--

CREATE TABLE `discount_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_28_072236_create_product_categories_table', 1),
(6, '2024_03_28_072257_create_discount_categories_table', 1),
(7, '2024_03_28_072310_create_products_table', 1),
(8, '2024_03_28_072429_create_discounts_table', 1),
(9, '2024_03_28_072551_create_customers_table', 1),
(10, '2024_03_28_072853_create_orders_table', 1),
(11, '2024_03_28_072906_create_order_details_table', 1),
(12, '2024_03_28_072925_create_payments_table', 1),
(13, '2024_03_28_072942_create_deliveries_table', 1),
(14, '2024_03_28_073003_create_product_reviews_table', 1),
(15, '2024_03_28_073024_create_wishlists_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `order_date` datetime NOT NULL,
  `total_amount` bigint(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `payment_date` datetime NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_category_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `stok_quantity` int(11) NOT NULL,
  `image1_url` varchar(255) NOT NULL,
  `image2_url` varchar(255) DEFAULT NULL,
  `image3_url` varchar(255) DEFAULT NULL,
  `image4_url` varchar(255) DEFAULT NULL,
  `image5_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `product_category_id`, `product_name`, `description`, `price`, `stok_quantity`, `image1_url`, `image2_url`, `image3_url`, `image4_url`, `image5_url`, `created_at`, `updated_at`) VALUES
(11, 14, 'Kentang', 'Kentang pilihan di toko kami memiliki tampilan menggiurkan dengan bentuk seragam dan kulit yang menggoda. Dagingnya padat dan lembut, siap untuk diolah menjadi berbagai hidangan lezat. Aroma segar dan rasa yang memikat akan membuat setiap gigitan menjadi nikmat', 14000, 30, 'Photos/BnmPFRu62D4CzYWMUKDslYa0BjVH4Gq44taWZVB2.jpg', NULL, NULL, NULL, NULL, '2024-05-22 00:23:41', '2024-05-22 00:23:41'),
(12, 14, 'Kangkung', 'Kangkung di toko kami mempunyai kualitas yang sangat bagus, kami pastikan selalu segar dan diambil dari pertanian yang berkualitas tinggi', 12000, 12, 'Photos/Z2xL9CVNHaLlJgqrRTMdICMbcfza3RUzBRYmznbb.jpg', NULL, NULL, NULL, NULL, '2024-05-22 00:28:19', '2024-05-22 00:28:19'),
(13, 13, 'Strawberry', 'Buah strawberry kami sangat manis, dipetik dari pertanian yang berkualitas dan harga terjangkau', 30000, 20, 'Photos/Ji3y5xpZGNtMHrveWLj3fO6KvV9TThQ5GV5MxlL6.jpg', NULL, NULL, NULL, NULL, '2024-05-22 00:30:15', '2024-05-22 00:30:15'),
(14, 14, 'Wortel', '## Wortel Segar di Toko Kami  Dapatkan wortel segar, kaya vitamin A, serat, dan antioksidan di toko kami. Ideal untuk dikonsumsi mentah, dimasak, atau dijadikan jus. Kunjungi kami dan nikmati sayuran berkualitas untuk gaya hidup sehat!', 15000, 20, 'Photos/J6Skd65f7V3pYKrYuNzCIJKqMLBm85JRGE5SpwKz.jpg', NULL, NULL, NULL, NULL, '2024-05-22 02:09:31', '2024-05-22 02:09:31'),
(15, 14, 'Brokoli', 'Temukan brokoli segar dan kaya nutrisi di toko kami! Brokoli merupakan sayuran hijau yang kaya vitamin C, serat, dan antioksidan. Ideal untuk meningkatkan sistem kekebalan tubuh, mendukung kesehatan tulang, dan menjaga pencernaan.', 20000, 20, 'Photos/jiQ49E7uJ6s1mMqWLws1ujbqVUrKAkFM3Fxv67QQ.jpg', NULL, NULL, NULL, NULL, '2024-05-22 02:11:57', '2024-05-22 02:11:57'),
(16, 14, 'Paprika', 'Paprika kami dipilih secara teliti untuk memastikan kesegaran dan kualitasnya. Kami menyediakan paprika merah, kuning, dan hijau dengan rasa yang manis dan tekstur yang renyah.', 30000, 15, 'Photos/AE3mGFDaD4TU6qpZn1gzLqIQeu7vSWtTLa3CEhsB.jpg', NULL, NULL, NULL, NULL, '2024-05-22 02:14:25', '2024-05-22 02:14:25'),
(17, 13, 'Alpukat', 'Alpukat kami dipilih dengan cermat untuk memastikan kematangan yang sempurna dan rasa yang lezat. Kami menyediakan alpukat dengan tekstur lembut dan creamy yang siap untuk dinikmati.', 35000, 30, 'Photos/O3iOxprJXW4iefrGUh5guO6TxtlBxKySFoy36TJZ.jpg', NULL, NULL, NULL, NULL, '2024-05-22 02:15:32', '2024-05-22 02:15:32'),
(18, 14, 'Bawang Putih', 'Bawang putih kami dipilih dengan teliti untuk memastikan kesegaran dan rasa yang optimal. Kami menyediakan bawang putih dengan tekstur yang kokoh dan aroma yang kuat.', 20000, 20, 'Photos/LkswsvkJ7yb4aNh0Le6JtccVSUODDVcadcLL15sq.jpg', NULL, NULL, NULL, NULL, '2024-05-22 02:16:30', '2024-05-22 02:16:30'),
(19, 14, 'Bawang Bombay', 'Bawang bombai kami dipilih secara hati-hati untuk memastikan kesegaran dan kualitas terbaik. Kami menyediakan bawang bombai dengan kulit yang kencang dan daging yang renyah.', 18000, 20, 'Photos/NuPDyu8YSY0gJ4FWTJYGcZLUw1t0sRv5bXeCLeLj.jpg', NULL, NULL, NULL, NULL, '2024-05-22 02:18:04', '2024-05-22 02:18:04'),
(20, 14, 'Daun Bawang', 'Daun bawang kami dipetik dengan teliti untuk memastikan kesegaran dan kelembutan yang optimal. Kami menyediakan daun bawang dengan tangkai yang segar dan daun yang hijau cerah.', 12000, 20, 'Photos/CYQy5IRkN2LpQtbH3zNsvUA1HykRUFCKmgTsRKfx.jpg', NULL, NULL, NULL, NULL, '2024-05-22 02:20:58', '2024-05-22 02:20:58'),
(21, 12, 'Kacang Hijau', 'Kacang hijau kami dipilih secara teliti untuk memastikan kesegaran dan kematangan yang sempurna. Kami menyediakan kacang hijau dengan biji yang utuh dan warna yang cerah.', 10000, 10, 'Photos/8PIFZTqNUzuNUzTG6y8lJe4EgdX0jYl2Cf6YoFqd.jpg', NULL, NULL, NULL, NULL, '2024-05-22 02:23:12', '2024-05-22 02:23:12'),
(22, 13, 'Jeruk', 'Jeruk kami dipilih dengan teliti untuk memastikan kesegaran dan kualitas terbaik. Kami menyediakan jeruk dengan kulit yang kencang dan daging yang juicy.', 25000, 20, 'Photos/3zifjb2tgfADBD7fW5jwDw0DtQ1mt9qviqanpySm.jpg', NULL, NULL, NULL, NULL, '2024-05-22 02:26:27', '2024-05-22 02:26:27'),
(23, 13, 'Kiwi', 'Kiwi kami dipilih secara hati-hati untuk memastikan kematangan yang sempurna dan rasa yang optimal. Kami menyediakan kiwi dengan kulit yang halus dan daging yang juicy.', 30000, 15, 'Photos/oikdkhBItx1hxaFm8St2ztZh7rt2Fd2Pnvi9YvBz.jpg', NULL, NULL, NULL, NULL, '2024-05-22 02:28:16', '2024-05-22 02:28:16'),
(24, 14, 'Kol', 'Kol kami dipilih dengan teliti untuk memastikan kesegaran dan kualitas terbaik. Kami menyediakan kol dengan kepala yang padat dan daun yang segar.', 12000, 15, 'Photos/cXz1Zv2zKykROMc7qAyh6w1vTC0wvD6ju2mbFgMl.jpg', NULL, NULL, NULL, NULL, '2024-05-22 02:29:38', '2024-05-22 02:29:38'),
(25, 13, 'Mangga', 'Mangga kami dipilih secara hati-hati untuk memastikan kematangan yang sempurna dan rasa yang lezat. Kami menyediakan mangga dengan tekstur yang juicy dan aroma yang harum.', 20000, 20, 'Photos/npLXqZkIwlWUJ3Dhzn0e8lg298rdSKi0QBX9FFxr.jpg', NULL, NULL, NULL, NULL, '2024-05-22 02:30:53', '2024-05-22 02:30:53'),
(26, 12, 'Kacang Tanah', 'Kacang tanah kami dipilih dengan teliti untuk memastikan kesegaran dan kualitas terbaik. Kami menyediakan kacang tanah dengan biji yang utuh dan kulit yang renyah.', 18000, 18, 'Photos/9C4OPqnPdzRAcWZ3arGeum9jzlnGnDMh0ruquOv0.jpg', NULL, NULL, NULL, NULL, '2024-05-22 02:32:19', '2024-05-22 02:32:19'),
(27, 12, 'Kacang Mete', 'Kacang mete kami dipilih secara hati-hati untuk memastikan kesegaran dan kualitas terbaik. Kami menyediakan kacang mete dengan biji yang utuh dan kulit yang renyah.', 35000, 16, 'Photos/azIB5arcf9Wm2dXaw6pKegOQaZH6OwTwjNSg6oef.jpg', NULL, NULL, NULL, NULL, '2024-05-22 02:34:22', '2024-05-22 02:34:22'),
(28, 13, 'Manggis', 'Manggis kami dipilih secara hati-hati untuk memastikan kesegaran dan kualitas terbaik. Kami menyediakan manggis dengan kulit yang tebal dan daging yang juicy.', 35000, 25, 'Photos/U5n8UgmIIKhpsNLEB7BO2WXEA7Yo2oxBOGJQvKAe.jpg', NULL, NULL, NULL, NULL, '2024-05-22 02:36:56', '2024-05-22 02:36:56'),
(29, 13, 'Nanas', 'Nanas kami dipilih dengan hati-hati untuk memastikan kematangan yang sempurna dan rasa yang lezat. Kami menyediakan nanas dengan kulit yang tebal dan daging yang juicy.', 30000, 180, 'Photos/rlocC94tmJF0dgXMQy4MXT90uSVSLtPwsGMKr7nj.jpg', NULL, NULL, NULL, NULL, '2024-05-22 02:39:44', '2024-05-22 02:39:44'),
(30, 14, 'Pakcoy', 'Pakcoy kami dipilih dengan teliti untuk memastikan kesegaran dan kualitas terbaik. Kami menyediakan pakcoy dengan daun yang segar dan batang yang renyah.', 25000, 20, 'Photos/NGNGUn1ZrKGaSk8nwKETQoN0BD1Baqsy6EpUDXlK.jpg', NULL, NULL, NULL, NULL, '2024-05-22 02:40:53', '2024-05-22 02:40:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(12, 'Dried', '2024-05-22 00:11:39', '2024-05-22 00:13:34'),
(13, 'Fruits', '2024-05-22 00:11:51', '2024-05-22 00:12:55'),
(14, 'Vegetables', '2024-05-22 00:12:38', '2024-05-22 00:12:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `roles` enum('admin','owner') NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `roles`, `aktif`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'winda', 'wndrachma@gmail.com', NULL, '$2y$12$suf17Kg88cQNItrGyQTZFuVjehslCa3fX5boX8dTomI8ibdqz9Wb.', '', 0, NULL, '2024-05-20 01:41:49', '2024-05-20 01:41:49');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vwproduct`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vwproduct` (
`id` bigint(20) unsigned
,`product_category_id` bigint(20) unsigned
,`category_name` varchar(255)
,`product_name` varchar(100)
,`description` text
,`price` int(11)
,`stok_quantity` int(11)
,`image1_url` varchar(255)
,`image2_url` varchar(255)
,`image3_url` varchar(255)
,`image4_url` varchar(255)
,`image5_url` varchar(255)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur untuk view `vwproduct`
--
DROP TABLE IF EXISTS `vwproduct`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwproduct`  AS SELECT `p`.`id` AS `id`, `p`.`product_category_id` AS `product_category_id`, `c`.`category_name` AS `category_name`, `p`.`product_name` AS `product_name`, `p`.`description` AS `description`, `p`.`price` AS `price`, `p`.`stok_quantity` AS `stok_quantity`, `p`.`image1_url` AS `image1_url`, `p`.`image2_url` AS `image2_url`, `p`.`image3_url` AS `image3_url`, `p`.`image4_url` AS `image4_url`, `p`.`image5_url` AS `image5_url` FROM (`products` `p` join `product_categories` `c`) WHERE `p`.`product_category_id` = `c`.`id``id`  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`);

--
-- Indeks untuk tabel `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `deliveries_order_id_unique` (`order_id`);

--
-- Indeks untuk tabel `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discounts_category_discount_id_foreign` (`category_discount_id`),
  ADD KEY `discounts_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `discount_categories`
--
ALTER TABLE `discount_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `discount_categories_category_name_unique` (`category_name`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Indeks untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_product_name_unique` (`product_name`),
  ADD KEY `products_product_category_id_foreign` (`product_category_id`);

--
-- Indeks untuk tabel `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_categories_category_name_unique` (`category_name`);

--
-- Indeks untuk tabel `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_reviews_customer_id_unique` (`customer_id`),
  ADD UNIQUE KEY `product_reviews_product_id_unique` (`product_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wishlists_customer_id_unique` (`customer_id`),
  ADD UNIQUE KEY `wishlists_product_id_unique` (`product_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `discount_categories`
--
ALTER TABLE `discount_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `deliveries`
--
ALTER TABLE `deliveries`
  ADD CONSTRAINT `deliveries_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `discounts`
--
ALTER TABLE `discounts`
  ADD CONSTRAINT `discounts_category_discount_id_foreign` FOREIGN KEY (`category_discount_id`) REFERENCES `discount_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `discounts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
