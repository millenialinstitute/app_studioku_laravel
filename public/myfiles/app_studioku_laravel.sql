-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Okt 2020 pada 13.51
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_studioku_laravel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'logo', '2020-10-27 20:39:15', '2020-10-27 20:39:15'),
(3, 'icon', '2020-10-27 20:44:39', '2020-10-27 20:44:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contributors`
--

CREATE TABLE `contributors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('waiting','confirmed','reject') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `contributors`
--

INSERT INTO `contributors` (`id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 'waiting', '2020-10-27 18:51:49', '2020-10-27 18:51:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contributor_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `cost` int(11) NOT NULL,
  `status` enum('waiting','reject','accept') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`id`, `contributor_id`, `title`, `image`, `category_id`, `cost`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'Background Anime', 'iMz_2020-10-28_06-23-42_V96lUWmgbuJUxPErEg82hXMjqXwcpM.jpg', 3, 500000, 'waiting', '2020-10-27 23:23:42', '2020-10-27 23:23:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_files`
--

CREATE TABLE `item_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `extension` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('preview','file') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `item_files`
--

INSERT INTO `item_files` (`id`, `item_id`, `name`, `size`, `extension`, `type`, `created_at`, `updated_at`) VALUES
(3, 2, 'iMz_2020-10-28_06-23-42_V96lUWmgbuJUxPErEg82hXMjqXwcpM.jpg', 551094, 'jpg', 'preview', '2020-10-27 23:23:42', '2020-10-27 23:23:42'),
(4, 2, 'iMz_2020-10-28_06-23-42_V96lUWmgbuJUxPErEg82hXMjqXwcpM.xd', 1841787, 'xd', 'file', '2020-10-27 23:23:43', '2020-10-27 23:23:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_tags`
--

CREATE TABLE `item_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `item_tags`
--

INSERT INTO `item_tags` (`id`, `item_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(2, 2, 2, '2020-10-27 23:23:42', '2020-10-27 23:23:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_users`
--

CREATE TABLE `level_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `level_users`
--

INSERT INTO `level_users` (`id`, `level_user`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-10-22 19:12:37', '2020-10-22 19:12:37'),
(2, 'contributor', '2020-10-22 19:13:54', '2020-10-22 19:13:54'),
(3, 'member', '2020-10-22 19:14:14', '2020-10-22 19:14:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `members`
--

INSERT INTO `members` (`id`, `user_id`, `address`, `bio`, `facebook`, `instagram`, `twitter`, `created_at`, `updated_at`) VALUES
(3, 7, NULL, NULL, NULL, NULL, NULL, '2020-10-26 18:35:09', '2020-10-26 18:35:09'),
(4, 8, NULL, NULL, NULL, NULL, NULL, '2020-10-26 18:35:51', '2020-10-26 18:35:51'),
(5, 9, NULL, NULL, NULL, NULL, NULL, '2020-10-26 18:36:12', '2020-10-26 18:36:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2020_10_22_073811_create_level_users_table', 1),
(7, '2020_10_22_073812_create_users_table', 1),
(8, '2020_10_22_073821_create_contributors_table', 1),
(9, '2020_10_22_074239_create_members_table', 1),
(10, '2020_10_23_011809_create_categories_table', 1),
(11, '2020_10_23_012005_create_tags_table', 1),
(12, '2020_10_23_012034_create_items_table', 1),
(13, '2020_10_23_012102_create_item_tags_table', 1),
(14, '2020_10_28_024834_create_item_files_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'logo', '2020-10-27 21:49:21', '2020-10-27 21:49:21'),
(2, 'anime', '2020-10-27 23:23:42', '2020-10-27 23:23:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.jpg',
  `level_user_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `level_user_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Admin', 'admin@gmail.com', NULL, '$2y$10$6P7b.PHgQEiFzglCuenwCujAi.8gFPa/xJXxAYjm410y1mfGPZTAq', 'user.jpg', 1, NULL, '2020-10-26 18:35:09', '2020-10-26 18:35:09'),
(8, 'Contributor', 'contributor@gmail.com', NULL, '$2y$10$2dSWZUj2xqHzQpLBb2UkY.RkP/nQQtLUNJTzqgAQHDasMwZq89sB.', 'user.jpg', 2, NULL, '2020-10-26 18:35:51', '2020-10-27 18:51:49'),
(9, 'Member', 'member@gmail.com', NULL, '$2y$10$xJPCb2cKGUuN5rBT4vP7juXO89ey1/NbIju7x9F04mAZSZvu.Qtj2', 'user.jpg', 3, NULL, '2020-10-26 18:36:12', '2020-10-26 18:36:12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contributors`
--
ALTER TABLE `contributors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contributors_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_contributor_id_foreign` (`contributor_id`),
  ADD KEY `items_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `item_files`
--
ALTER TABLE `item_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_files_item_id_foreign` (`item_id`);

--
-- Indeks untuk tabel `item_tags`
--
ALTER TABLE `item_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_tags_item_id_foreign` (`item_id`),
  ADD KEY `item_tags_tag_id_foreign` (`tag_id`);

--
-- Indeks untuk tabel `level_users`
--
ALTER TABLE `level_users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_level_user_id_foreign` (`level_user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `contributors`
--
ALTER TABLE `contributors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `item_files`
--
ALTER TABLE `item_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `item_tags`
--
ALTER TABLE `item_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `level_users`
--
ALTER TABLE `level_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `contributors`
--
ALTER TABLE `contributors`
  ADD CONSTRAINT `contributors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `items_contributor_id_foreign` FOREIGN KEY (`contributor_id`) REFERENCES `contributors` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `item_files`
--
ALTER TABLE `item_files`
  ADD CONSTRAINT `item_files_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `item_tags`
--
ALTER TABLE `item_tags`
  ADD CONSTRAINT `item_tags_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_level_user_id_foreign` FOREIGN KEY (`level_user_id`) REFERENCES `level_users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
