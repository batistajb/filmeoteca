-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Mar-2019 às 12:11
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prova`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `favorites`
--

CREATE TABLE `favorites` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cont` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `favorites`
--

INSERT INTO `favorites` (`user_id`, `movie_id`, `created_at`, `updated_at`, `cont`) VALUES
(15, 1, '2019-03-04 14:00:28', '2019-03-04 14:00:28', 1),
(15, 7, '2019-03-04 14:05:27', '2019-03-04 14:05:27', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_26_185834_contacts_table', 1),
(4, '2019_02_26_185926_addresses_table', 1),
(5, '2019_02_26_185952_movies_table', 1),
(6, '2019_02_26_190116_favorites_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `movies`
--

INSERT INTO `movies` (`id`, `title`, `year`, `director`, `created_at`, `updated_at`, `image`) VALUES
(1, 'A era do gelo', '6', 'Jb', '2019-03-01 21:40:16', '2019-03-02 07:57:53', '-a-era-do-gelo2.jpeg'),
(7, 'Twitter data shapes and nodes.', '4', 'Jb', '2019-03-01 22:48:20', '2019-03-01 22:48:20', 'Imagem não cadastrada'),
(10, 'Twitter data shapes and nodes.', '5', 'Jb', '2019-03-01 23:22:20', '2019-03-01 23:22:20', 'Imagem não cadastrada'),
(11, 'Twitter data shapes and nodes.', '5', 'Jb', '2019-03-01 23:32:37', '2019-03-01 23:32:37', 'Imagem não cadastrada'),
(12, 'Twitter data shapes and nodes.', '9', 'Jb', '2019-03-02 00:02:16', '2019-03-02 00:02:16', 'Imagem não cadastrada'),
(13, 'Twitter data shapes and nodes.', '1', 'Jb', '2019-03-02 00:07:35', '2019-03-02 00:07:35', 'Imagem não cadastrada'),
(14, 'Twitter data shapes and nodes.', '2', 'Jb', '2019-03-02 00:08:17', '2019-03-02 00:08:17', 'Imagem não cadastrada'),
(15, 'Twitter data shapes and nodes.', '1', 'Jb', '2019-03-02 00:09:04', '2019-03-02 00:09:04', 'Imagem não cadastrada'),
(16, 'Twitter data shapes and nodes.', '-1', 'Jb', '2019-03-02 00:17:56', '2019-03-02 00:17:56', 'Imagem não cadastrada'),
(17, 'Twitter data shapes and nodes.', '-1', 'Jb', '2019-03-02 00:18:24', '2019-03-02 00:18:24', 'Imagem não cadastrada'),
(18, 'Twitter data shapes and nodes.', '-1', 'Jb', '2019-03-02 00:19:08', '2019-03-02 00:19:08', 'Imagem não cadastrada'),
(19, 'Twitter data shapes and nodes.', '-1', 'Jb', '2019-03-02 00:19:15', '2019-03-02 00:19:15', 'Imagem não cadastrada'),
(20, 'Twitter data shapes and nodes.', '-1', 'Jb', '2019-03-02 00:20:42', '2019-03-02 00:20:42', 'Imagem não cadastrada'),
(21, 'Twitter data shapes and nodes.', '-1', 'Jb', '2019-03-02 00:20:48', '2019-03-02 00:20:48', 'Imagem não cadastrada'),
(22, 'Twitter data shapes and nodes.', '-1', 'Jb', '2019-03-02 00:21:09', '2019-03-02 00:21:09', 'Imagem não cadastrada'),
(23, 'Twitter data shapes and nodes.', '-1', 'Jb', '2019-03-02 00:24:03', '2019-03-02 00:24:03', 'Imagem não cadastrada'),
(24, 'Twitter data shapes and nodes.', '-1', 'Jb', '2019-03-02 00:24:50', '2019-03-02 00:24:50', 'Imagem não cadastrada'),
(25, 'Twitter data shapes and nodes.', '-1', 'Jb', '2019-03-02 00:25:08', '2019-03-02 00:25:08', 'Imagem não cadastrada'),
(26, 'Twitter data shapes and nodes.', '-1', 'Jb', '2019-03-02 00:25:21', '2019-03-02 00:25:21', 'Imagem não cadastrada'),
(27, 'Twitter data shapes and nodes.', '3', 'Jb', '2019-03-04 04:21:04', '2019-03-04 04:21:04', 'Imagem não cadastrada'),
(30, 'A era do gelo 2', '2019', 'Jb', '2019-03-04 12:41:35', '2019-03-04 12:41:35', '-a-era-do-gelo2.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rule` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `name`, `cpf`, `rg`, `title`, `rule`, `remember_token`, `created_at`, `updated_at`) VALUES
(15, 'admin@admin.com', NULL, '$2y$10$aM3htKp7U8NmodlHyToiy.osbpis73mQDWi2K190t36KGHg7P7r3a', 'Admin User', '111.111.111-11', 'mg-11.1111', 'Admin User', 'admin', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_user_id_foreign` (`user_id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD KEY `favorites_user_id_foreign` (`user_id`),
  ADD KEY `favorites_movie_id_foreign` (`movie_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_rg_unique` (`rg`),
  ADD UNIQUE KEY `users_cpf_unique` (`cpf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
