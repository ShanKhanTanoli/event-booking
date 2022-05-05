-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2022 at 05:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gift_card_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_details`
--

CREATE TABLE `business_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_details`
--

INSERT INTO `business_details` (`id`, `user_id`, `business_name`, `business_logo`, `business_email`, `business_phone`, `business_address`, `currency_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-05 07:32:48', '2022-05-05 07:32:48'),
(2, 2, 'Gift Card', NULL, 'business@email.com', '+00000000000', 'This is the Address', 1, '2022-05-05 07:32:48', '2022-05-05 07:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `business_stores`
--

CREATE TABLE `business_stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_cards` tinyint(1) DEFAULT NULL,
  `display_store_name` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_stores`
--

INSERT INTO `business_stores` (`id`, `user_id`, `store_name`, `store_description`, `slug`, `display_cards`, `display_store_name`, `created_at`, `updated_at`) VALUES
(1, 2, 'Store2', 'Store Description', 'PWO7XC2BHRORDXILQVZX', 1, 1, '2022-05-05 07:32:48', '2022-05-05 07:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `client_vouchers`
--

CREATE TABLE `client_vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voucher_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comission_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_vouchers`
--

INSERT INTO `client_vouchers` (`id`, `stripe_id`, `voucher_id`, `user_id`, `price`, `currency`, `comission_percentage`, `final_amount`, `created_at`, `updated_at`) VALUES
(1, 'ch_3Kw5t7RYVF7b7SlI1uKMMqMu', 1, 4, '100', 'usd', '10', '90', '2022-05-05 09:42:44', '2022-05-05 09:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `description`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'usd', 'usd', 'tWe5EBUXxB', '2022-05-05 07:32:48', '2022-05-05 07:32:48'),
(2, 'euro', 'euro', 'Nw2Eav5A9A', '2022-05-05 07:32:48', '2022-05-05 07:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_12_000000_create_voucher_tables', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_11_24_201631_create_stripe_configurations_table', 1),
(7, '2022_04_13_041510_create_currencies_table', 1),
(8, '2022_04_17_185829_create_settings_table', 1),
(9, '2022_04_22_231511_create_business_details_table', 1),
(10, '2022_05_01_133005_create_business_stores_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `redeemers`
--

CREATE TABLE `redeemers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voucher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redeemer_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redeemer_id` bigint(20) UNSIGNED NOT NULL,
  `metadata` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comission_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `company_name`, `company_logo`, `company_email`, `company_phone`, `company_address`, `comission_percentage`, `created_at`, `updated_at`) VALUES
(1, 'Gift Card', NULL, 'company@email.com', '+00000000000', 'This is the Address', '10', '2022-05-05 07:32:48', '2022-05-05 07:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `stripe_configurations`
--

CREATE TABLE `stripe_configurations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `public_key` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secret_key` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_mode` enum('test','live') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stripe_configurations`
--

INSERT INTO `stripe_configurations` (`id`, `public_key`, `secret_key`, `payment_mode`, `created_at`, `updated_at`) VALUES
(1, 'pk_test_yKF28OfsGchVLbr4FmAH8x61002zuh3083', 'sk_test_sQJFDUoOy3WAqtUupBH9V5aM00zebNYJaP', 'test', '2022-05-05 07:32:48', '2022-05-05 07:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `avatar`, `name`, `user_name`, `email`, `email_verified_at`, `number`, `password`, `role`, `role_id`, `slug`, `account_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', 'admin', 'admin@email.com', NULL, '752570668379', '$2y$10$bycX2FrJwZ/438CkqeZOc.00omahDZsRN.GrjrZxy8oVO8mg5ayTu', 'admin', '1', 'AXJE9VT7YFCSQA4VN27E', NULL, NULL, '2022-05-05 07:32:47', '2022-05-05 07:32:47'),
(2, NULL, 'business1', 'business1', 'business1@email.com', NULL, '861336495121', '$2y$10$ldprjVFzZLove3ruaHl4/eekwb5Q2tqjLOCWhafcjCTvyuA4KwTo.', 'business', '2', 'ATKNS1LJPI2G6FPPJVIS', 'acct_1KVjQIRYVF7b7SlI', NULL, '2022-05-05 07:32:47', '2022-05-05 07:32:47'),
(3, NULL, 'business2', 'business2', 'business2@email.com', NULL, '321170302139', '$2y$10$XLTj1H.ZH3rkhsHfEUVqNO6LOLvGlJkRPSF7ZN8zfLo90TFBzh.ca', 'business', '2', 'VM9RKKAOWNOFYJLTPQEO', NULL, NULL, '2022-05-05 07:32:47', '2022-05-05 07:32:47'),
(4, NULL, 'client1', 'client1', 'client1@email.com', NULL, '415237507463', '$2y$10$oLOAu5MUhXSPUxYxQrFDxua7PBs462kHiJjNlxTTAPLQ1Is3nSQmq', 'client', '3', 'XZVLQRXJEEQMGH0CNBPT', NULL, NULL, '2022-05-05 07:32:47', '2022-05-05 07:32:47'),
(5, NULL, 'client2', 'client2', 'client2@email.com', NULL, '101025860629', '$2y$10$7QNtH0gcRUZH4OHWFgg.s.57tMxLfGYa67lkyXnZQqAAS7UK/DkLG', 'client', '3', 'KIWZEJGD5RMGOJFEQH6E', NULL, NULL, '2022-05-05 07:32:47', '2022-05-05 07:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metadata` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starts_at` datetime DEFAULT NULL,
  `redeemed_at` datetime DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  `price` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `recharge` double DEFAULT NULL,
  `sold` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `code`, `metadata`, `starts_at`, `redeemed_at`, `expires_at`, `price`, `balance`, `user_id`, `recharge`, `sold`, `created_at`, `updated_at`) VALUES
(1, '6623-5944-4139-9912', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, 1, '2022-05-05 09:22:22', '2022-05-05 09:42:44'),
(3, '3926-3153-4986-3788', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(4, '4007-5490-7304-8461', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(5, '6054-2211-8493-6911', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(6, '6924-4878-6648-4537', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(7, '4284-1308-3370-1113', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(8, '0569-9975-7131-5406', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(9, '1109-8219-4660-7511', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(10, '5019-9816-1589-6255', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(11, '6153-9039-2567-2274', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(12, '3864-5656-3010-9037', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(13, '9442-4774-1433-4818', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(14, '0836-5333-5435-9669', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(15, '5934-9545-8490-6584', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(16, '5718-2456-8272-3463', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(17, '4734-1558-7831-0511', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(18, '6960-8736-8051-6247', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(19, '2208-3478-5275-7457', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(20, '5740-0992-5463-5360', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(21, '7037-6717-7535-2020', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(22, '0983-0630-8648-3368', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(23, '5092-6457-9797-9381', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(24, '4451-9615-2508-7273', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(25, '1575-5204-8780-6837', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(26, '0187-3935-9132-4948', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(27, '2865-2226-2012-4086', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(28, '7834-1677-1229-9984', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(29, '3250-5886-4507-6734', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22'),
(30, '7251-9055-6731-9380', NULL, NULL, NULL, '2022-08-05 23:59:59', 100, 100, 2, 0, NULL, '2022-05-05 09:22:22', '2022-05-05 09:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `voucher_entity`
--

CREATE TABLE `voucher_entity` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voucher_id` bigint(20) UNSIGNED NOT NULL,
  `entity_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entity_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voucher_recharge`
--

CREATE TABLE `voucher_recharge` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voucher_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_details`
--
ALTER TABLE `business_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_details_user_id_foreign` (`user_id`),
  ADD KEY `business_details_currency_id_foreign` (`currency_id`);

--
-- Indexes for table `business_stores`
--
ALTER TABLE `business_stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `business_stores_store_name_unique` (`store_name`),
  ADD UNIQUE KEY `business_stores_slug_unique` (`slug`),
  ADD KEY `business_stores_user_id_foreign` (`user_id`);

--
-- Indexes for table `client_vouchers`
--
ALTER TABLE `client_vouchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_vouchers_voucher_id_foreign` (`voucher_id`),
  ADD KEY `client_vouchers_user_id_foreign` (`user_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `currencies_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `redeemers`
--
ALTER TABLE `redeemers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `redeemers_voucher_id_foreign` (`voucher_id`),
  ADD KEY `redeemers_redeemer_type_redeemer_id_index` (`redeemer_type`,`redeemer_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stripe_configurations`
--
ALTER TABLE `stripe_configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_user_name_unique` (`user_name`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_number_unique` (`number`),
  ADD UNIQUE KEY `users_slug_unique` (`slug`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vouchers_code_unique` (`code`),
  ADD KEY `vouchers_user_id_foreign` (`user_id`),
  ADD KEY `vouchers_starts_at_index` (`starts_at`),
  ADD KEY `vouchers_redeemed_at_index` (`redeemed_at`),
  ADD KEY `vouchers_expires_at_index` (`expires_at`);

--
-- Indexes for table `voucher_entity`
--
ALTER TABLE `voucher_entity`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `entity` (`voucher_id`,`entity_type`,`entity_id`),
  ADD KEY `voucher_entity_entity_type_entity_id_index` (`entity_type`,`entity_id`);

--
-- Indexes for table `voucher_recharge`
--
ALTER TABLE `voucher_recharge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voucher_recharge_voucher_id_foreign` (`voucher_id`),
  ADD KEY `voucher_recharge_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_details`
--
ALTER TABLE `business_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `business_stores`
--
ALTER TABLE `business_stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client_vouchers`
--
ALTER TABLE `client_vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `redeemers`
--
ALTER TABLE `redeemers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stripe_configurations`
--
ALTER TABLE `stripe_configurations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `voucher_entity`
--
ALTER TABLE `voucher_entity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voucher_recharge`
--
ALTER TABLE `voucher_recharge`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business_details`
--
ALTER TABLE `business_details`
  ADD CONSTRAINT `business_details_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `business_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `business_stores`
--
ALTER TABLE `business_stores`
  ADD CONSTRAINT `business_stores_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client_vouchers`
--
ALTER TABLE `client_vouchers`
  ADD CONSTRAINT `client_vouchers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `client_vouchers_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `redeemers`
--
ALTER TABLE `redeemers`
  ADD CONSTRAINT `redeemers_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD CONSTRAINT `vouchers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `voucher_entity`
--
ALTER TABLE `voucher_entity`
  ADD CONSTRAINT `voucher_entity_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `voucher_recharge`
--
ALTER TABLE `voucher_recharge`
  ADD CONSTRAINT `voucher_recharge_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `voucher_recharge_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
