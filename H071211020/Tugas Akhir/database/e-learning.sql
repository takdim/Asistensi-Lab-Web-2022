-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2020 at 11:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensis`
--

CREATE TABLE `absensis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pertemuan_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensis`
--

INSERT INTO `absensis` (`id`, `uuid`, `user_id`, `pertemuan_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dad4af7a-2285-4859-9f8b-d26ee9900848', 2, 1, 1, '2020-07-09 05:52:23', '2020-07-09 05:58:37'),
(2, '44524922-04df-49b1-90c9-a2a79b1367e5', 4, 3, 0, '2020-07-11 19:57:38', '2020-07-11 19:57:38'),
(3, '4052a916-8ac1-4fd8-a5a7-d939bd12b77e', 2, 4, 1, '2020-07-15 04:57:31', '2020-07-15 05:03:42'),
(4, 'd688ea43-b1dd-4eeb-9295-4d6820b59b2a', 2, 7, 1, '2020-07-15 05:01:01', '2020-07-15 05:05:43'),
(5, '42dad036-ce26-4e1e-957f-dd207ecde81b', 9, 4, 1, '2020-07-15 05:06:58', '2020-07-15 07:24:27'),
(6, '9bec13c8-07f6-4516-9fe5-107597053fd6', 8, 7, 1, '2020-07-15 05:24:59', '2020-07-15 07:27:48'),
(7, 'd2a98c57-8cda-4f89-af48-63256dd6e67b', 9, 7, 1, '2020-07-15 07:16:54', '2020-07-15 07:27:56'),
(8, 'cf2926a9-a4a5-4872-a77d-f2bc6dfdbc34', 10, 4, 1, '2020-07-15 07:17:57', '2020-07-15 07:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `instrukturs`
--

CREATE TABLE `instrukturs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instrukturs`
--

INSERT INTO `instrukturs` (`id`, `uuid`, `user_id`, `tempat_lahir`, `tanggal_lahir`, `email`, `created_at`, `updated_at`) VALUES
(1, '7432e293-a2a9-4aeb-a183-8434de33219d', 3, 'Pasuruan', '1998-03-05', 'nadilamegaysyafitri@gmail.com', '2020-07-09 05:11:43', '2020-07-09 05:11:43'),
(2, 'c5df3765-589f-4fe0-a727-5ae32ba25258', 7, 'Pasuruan', '1998-03-05', 'nadilamegaysyafitri@gmail.com', '2020-07-14 16:56:26', '2020-07-14 16:56:26'),
(3, '3958bac4-90e7-4ec7-93c1-359ca5a0578f', 11, 'pasuruan', '1998-07-07', 'megalucu@gmail.com', '2020-07-14 17:14:34', '2020-07-14 17:14:34'),
(4, '0cdaebfd-40be-4019-87fb-735c93ae6832', 12, 'Pasuruan', '1998-07-20', 'nadilamegaysyafitri@gmail.com', '2020-07-14 17:15:21', '2020-07-14 17:15:21'),
(5, '0ac8d3df-f977-4333-b6d4-8f2d29080f7d', 13, 'Pasuruan', '1998-07-28', 'nadilamegaysyafitri@gmail.com', '2020-07-14 17:16:06', '2020-07-14 17:16:06');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_siswas`
--

CREATE TABLE `jawaban_siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tes_siswa_id` bigint(20) UNSIGNED NOT NULL,
  `soal_id` bigint(20) UNSIGNED NOT NULL,
  `jawaban` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bs` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jawaban_siswas`
--

INSERT INTO `jawaban_siswas` (`id`, `uuid`, `tes_siswa_id`, `soal_id`, `jawaban`, `bs`, `created_at`, `updated_at`) VALUES
(1, '516b62b6-6da3-46b0-90e4-9589ce147771', 1, 5, 'a', 1, '2020-07-09 05:57:17', '2020-07-09 05:57:17'),
(2, '5d0863cf-f545-44f9-90d5-d40529d25619', 1, 10, 'a', 1, '2020-07-09 05:57:18', '2020-07-09 05:57:18'),
(3, '068e4ce4-ad38-4878-8e3a-510337d5bd3b', 1, 6, 'a', 1, '2020-07-09 05:57:18', '2020-07-09 05:57:18'),
(4, 'c0de26f4-484b-465b-b73e-2d37f9465a09', 1, 8, 'a', 1, '2020-07-09 05:57:18', '2020-07-09 05:57:18'),
(5, 'f206bd17-1b35-44b1-adc3-de14dd208f1b', 1, 9, 'a', 1, '2020-07-09 05:57:18', '2020-07-09 05:57:18'),
(6, '3145edf3-b871-4bd2-b839-c30862a4da7d', 1, 2, 'a', 1, '2020-07-09 05:57:18', '2020-07-09 05:57:18'),
(7, '7f029bd4-0fd2-4867-9af8-ffd71def8b33', 1, 4, 'a', 1, '2020-07-09 05:57:18', '2020-07-09 05:57:18'),
(8, '774bb2bc-4a75-4b04-8019-db38e0df429a', 1, 3, 'a', 1, '2020-07-09 05:57:18', '2020-07-09 05:57:18'),
(9, 'b2206a71-099e-4070-a5f6-c72bc4430717', 1, 1, 'a', 1, '2020-07-09 05:57:18', '2020-07-09 05:57:18'),
(10, '75d4b75e-fd83-4021-a987-5ecdbb778e53', 1, 7, 'b', 0, '2020-07-09 05:57:18', '2020-07-09 05:57:18'),
(11, 'c91ec785-ba13-45f9-8421-eabb0ea170bb', 2, 5, 'b', 0, '2020-07-11 19:54:36', '2020-07-11 19:54:36'),
(12, 'a937c5c4-1272-4301-835d-51b1ad99ba80', 2, 8, 'a', 1, '2020-07-11 19:54:36', '2020-07-11 19:54:36'),
(13, '4dc00c70-74b8-4d2b-a8d6-6dafc18d6258', 2, 1, 'd', 0, '2020-07-11 19:54:37', '2020-07-11 19:54:37'),
(14, 'f103dde1-00b6-4a18-9279-e05d41725de7', 2, 6, 'b', 0, '2020-07-11 19:54:37', '2020-07-11 19:54:37'),
(15, '856054aa-2f36-4b56-a047-817d2e3b2860', 2, 10, 'a', 1, '2020-07-11 19:54:37', '2020-07-11 19:54:37'),
(16, 'e31de29d-c20d-4e9b-90db-2cc4e719f5c9', 2, 9, 'c', 0, '2020-07-11 19:54:37', '2020-07-11 19:54:37'),
(17, 'de6dc137-ed22-46c3-93c2-e30f0d28887b', 2, 2, 'c', 0, '2020-07-11 19:54:37', '2020-07-11 19:54:37'),
(18, 'bfd2ef41-eefc-4099-846b-e395f09052e6', 2, 3, 'd', 0, '2020-07-11 19:54:37', '2020-07-11 19:54:37'),
(19, '687d8165-3585-4fbd-8bd1-8c835a24d01a', 2, 7, 'c', 0, '2020-07-11 19:54:37', '2020-07-11 19:54:37'),
(20, 'd7e52d24-dd7a-48e0-8c5f-9af50d8f047b', 2, 4, 'b', 0, '2020-07-11 19:54:37', '2020-07-11 19:54:37'),
(21, '6acd6fdb-12a4-4385-b4ba-e4347e56ff5e', 4, 5, 'a', 1, '2020-07-15 05:23:14', '2020-07-15 05:23:14'),
(22, '62fe5056-05f9-4913-931f-967d7956436b', 4, 6, 'a', 1, '2020-07-15 05:23:15', '2020-07-15 05:23:15'),
(23, '02fab6fe-4af1-46a5-8fbb-22116a95eb27', 4, 8, 'a', 1, '2020-07-15 05:23:15', '2020-07-15 05:23:15'),
(24, 'f2dacca8-e4c7-4801-b2be-192873ffdf78', 4, 3, 'a', 1, '2020-07-15 05:23:15', '2020-07-15 05:23:15'),
(25, '893a7dc4-0817-4477-bfaa-6e775887311c', 4, 10, 'a', 1, '2020-07-15 05:23:15', '2020-07-15 05:23:15'),
(26, '0cc834e6-b2e2-4153-97a5-b76b65e09b3a', 4, 9, 'a', 1, '2020-07-15 05:23:15', '2020-07-15 05:23:15'),
(27, '34c33f1c-ca4d-4892-b824-7b6210d2cf26', 4, 4, 'a', 1, '2020-07-15 05:23:15', '2020-07-15 05:23:15'),
(28, '4909ab57-c8da-49e6-afbc-80afa9b59bca', 4, 1, 'a', 1, '2020-07-15 05:23:15', '2020-07-15 05:23:15'),
(29, 'a3755068-c715-4ffc-a534-2848dbe6cbc2', 4, 7, 'a', 1, '2020-07-15 05:23:15', '2020-07-15 05:23:15'),
(30, 'e265a435-898d-4b76-baa9-35082249619e', 4, 2, 'a', 1, '2020-07-15 05:23:15', '2020-07-15 05:23:15'),
(31, 'f9416204-c525-41d7-94d3-6c2f15eca860', 6, 9, 'a', 1, '2020-07-15 05:26:10', '2020-07-15 05:26:10'),
(32, '72c4a47f-70ef-4d67-8aa1-d5a252e206de', 6, 10, 'a', 1, '2020-07-15 05:26:11', '2020-07-15 05:26:11'),
(33, '991373ad-b07c-4ba6-9408-4e421d84158d', 6, 1, 'a', 1, '2020-07-15 05:26:11', '2020-07-15 05:26:11'),
(34, '52625eda-55a8-4441-a6fb-fc4a8f2ed3f8', 6, 7, 'a', 1, '2020-07-15 05:26:11', '2020-07-15 05:26:11'),
(35, '4773f3cb-089a-4242-9a7c-a09369e13832', 6, 3, 'a', 1, '2020-07-15 05:26:11', '2020-07-15 05:26:11'),
(36, '3a686ecb-7c77-49ab-ac55-093fda44cb87', 6, 4, 'a', 1, '2020-07-15 05:26:11', '2020-07-15 05:26:11'),
(37, '42fa8546-cb06-4fc5-8d5d-bb3ced593be5', 6, 2, 'a', 1, '2020-07-15 05:26:11', '2020-07-15 05:26:11'),
(38, '5206c917-c2f6-45b5-a1f5-d4bec4445ce7', 6, 5, 'a', 1, '2020-07-15 05:26:11', '2020-07-15 05:26:11'),
(39, '2cd0e56e-491b-4c60-bc52-2f90df027665', 6, 8, 'a', 1, '2020-07-15 05:26:11', '2020-07-15 05:26:11'),
(40, '95b3fad1-999c-4efb-9985-ff2950b3526d', 6, 6, 'a', 1, '2020-07-15 05:26:11', '2020-07-15 05:26:11'),
(41, '03f843db-80eb-4efe-b55e-a4ea35068c22', 8, 6, 'a', 1, '2020-07-15 07:19:05', '2020-07-15 07:19:05'),
(42, '404510ae-8a28-44b0-80c4-b99d47b132f8', 8, 7, 'a', 1, '2020-07-15 07:19:05', '2020-07-15 07:19:05'),
(43, '0fd2676f-03a2-4719-bbda-41960d3c3a79', 8, 4, 'b', 0, '2020-07-15 07:19:05', '2020-07-15 07:19:05'),
(44, 'f75ae065-b399-400b-bdf2-33723ce3ae07', 8, 8, 'd', 0, '2020-07-15 07:19:05', '2020-07-15 07:19:05'),
(45, 'e9f2af43-9c40-46d3-a638-c85103555b63', 8, 3, 'b', 0, '2020-07-15 07:19:05', '2020-07-15 07:19:05'),
(46, 'ff44d445-0d17-4ff7-b0bc-a90040dc1b09', 8, 5, 'd', 0, '2020-07-15 07:19:05', '2020-07-15 07:19:05'),
(47, 'b85fa14c-7995-4866-88dc-fa1e612bc7a5', 8, 10, 'c', 0, '2020-07-15 07:19:05', '2020-07-15 07:19:05'),
(48, '8d7be6a4-9d3c-46d2-b0e8-525287eb9b8d', 8, 2, 'd', 0, '2020-07-15 07:19:05', '2020-07-15 07:19:05'),
(49, '1a211f70-fd0f-48be-8208-2c31d7557857', 8, 9, 'c', 0, '2020-07-15 07:19:05', '2020-07-15 07:19:05'),
(50, 'd29f7c72-c4b9-4acc-80b0-f59a6523011f', 8, 1, 'c', 0, '2020-07-15 07:19:05', '2020-07-15 07:19:05'),
(51, 'e3c94bca-430c-40d7-b219-09da14084095', 10, 9, 'a', 1, '2020-07-16 07:56:24', '2020-07-16 07:56:24'),
(52, '6f2be14d-232d-4132-8377-f0690dcda797', 10, 5, 'a', 1, '2020-07-16 07:56:24', '2020-07-16 07:56:24'),
(53, 'de43bd4d-0dbd-4e93-aeb0-0c60fe22fcc7', 10, 6, 'a', 1, '2020-07-16 07:56:24', '2020-07-16 07:56:24'),
(54, 'a369095a-fd0d-468b-a312-77c0bead7427', 10, 3, 'a', 1, '2020-07-16 07:56:24', '2020-07-16 07:56:24'),
(55, 'e19397fc-4ca3-40d3-8301-9f3ed271b205', 10, 2, 'a', 1, '2020-07-16 07:56:25', '2020-07-16 07:56:25'),
(56, 'ec789a9d-7aac-4d9f-ac29-052a031e4baa', 10, 7, 'a', 1, '2020-07-16 07:56:25', '2020-07-16 07:56:25'),
(57, 'd7c22631-1521-4c1d-9862-dc73ae27c188', 10, 1, 'a', 1, '2020-07-16 07:56:25', '2020-07-16 07:56:25'),
(58, '723971c9-38d2-4a9d-ab02-6613a62e4a04', 10, 10, 'b', 0, '2020-07-16 07:56:25', '2020-07-16 07:56:25'),
(59, '0ddddb70-6169-497e-a20c-d0f556f07e1e', 10, 8, 'a', 1, '2020-07-16 07:56:25', '2020-07-16 07:56:25'),
(60, 'fd936f69-f34d-46b0-b0c0-43f9ccf33b55', 10, 4, 'a', 1, '2020-07-16 07:56:25', '2020-07-16 07:56:25'),
(61, 'df6b8e37-17b7-4a1f-a46e-12d9c0c64b9f', 11, 17, 'a', 1, '2020-07-16 08:22:53', '2020-07-16 08:22:53'),
(62, 'ede93b38-3805-47ba-9c2c-862a91b6562f', 11, 11, 'a', 1, '2020-07-16 08:22:53', '2020-07-16 08:22:53'),
(63, '8a805122-3502-4dfb-8326-0b0cf06e4638', 11, 18, 'a', 1, '2020-07-16 08:22:53', '2020-07-16 08:22:53'),
(64, '45d579fa-e795-423a-a366-eef3e628435f', 11, 12, 'a', 1, '2020-07-16 08:22:53', '2020-07-16 08:22:53'),
(65, '66eaa6fd-b4a5-4929-bb2c-373d4be591d4', 11, 13, 'a', 1, '2020-07-16 08:22:54', '2020-07-16 08:22:54'),
(66, 'e2b14e0f-c7a2-4c79-bbe8-eefcafcf343e', 11, 20, 'a', 1, '2020-07-16 08:22:54', '2020-07-16 08:22:54'),
(67, '5df0ea49-bdc8-4985-867c-9fcb6ce6303e', 11, 19, 'a', 1, '2020-07-16 08:22:54', '2020-07-16 08:22:54'),
(68, 'fc347ea2-eff8-4458-b345-2e1450b04d7c', 11, 15, 'a', 1, '2020-07-16 08:22:54', '2020-07-16 08:22:54'),
(69, '3770eb3c-4dd2-4199-92a7-f81a73fa855d', 11, 14, 'a', 1, '2020-07-16 08:22:54', '2020-07-16 08:22:54'),
(70, '1cb7ca8c-7de2-40c6-b084-63f1920db5f0', 11, 16, 'b', 0, '2020-07-16 08:22:54', '2020-07-16 08:22:54'),
(71, 'e899a075-e5a5-4ab5-b98e-f8a080cae7db', 12, 18, 'a', 1, '2020-07-16 08:29:56', '2020-07-16 08:29:56'),
(72, 'b46de056-0ec2-4516-b4e1-c2db909d5165', 12, 12, 'a', 1, '2020-07-16 08:29:56', '2020-07-16 08:29:56'),
(73, 'b0885517-bb01-47dc-b9f8-590d3f4cd7e0', 12, 11, 'a', 1, '2020-07-16 08:29:56', '2020-07-16 08:29:56'),
(74, '5d430a7c-6a4a-4be6-9e95-10c791ce4ea6', 12, 17, 'a', 1, '2020-07-16 08:29:56', '2020-07-16 08:29:56'),
(75, '129137b0-9c1d-4063-a28e-272783c1b906', 12, 20, 'a', 1, '2020-07-16 08:29:56', '2020-07-16 08:29:56'),
(76, '6727670f-70bf-4211-b36b-1930084791ce', 12, 16, 'b', 0, '2020-07-16 08:29:56', '2020-07-16 08:29:56'),
(77, 'cebef587-52a7-4f55-9652-f1ef68947a81', 12, 15, 'c', 0, '2020-07-16 08:29:56', '2020-07-16 08:29:56'),
(78, 'e746b6b1-80c5-4616-a34f-6fafef6826f2', 12, 19, 'd', 0, '2020-07-16 08:29:57', '2020-07-16 08:29:57'),
(79, '7ee7918f-b45c-467f-804e-30dbc64361ab', 12, 14, 'b', 0, '2020-07-16 08:29:57', '2020-07-16 08:29:57'),
(80, '52f4cf24-62af-4311-9f0c-1f44fd48e473', 12, 13, 'a', 1, '2020-07-16 08:29:57', '2020-07-16 08:29:57'),
(81, 'ebe4bd17-3645-4aa6-a49b-206e2db3b69f', 14, 5, 'a', 1, '2020-07-16 08:31:26', '2020-07-16 08:31:26'),
(82, 'd3cf07e0-0389-44df-96b7-2873ccb25c93', 14, 10, 'b', 0, '2020-07-16 08:31:26', '2020-07-16 08:31:26'),
(83, '9687f143-9dd8-4893-b511-5c6daed1c67b', 14, 2, 'a', 1, '2020-07-16 08:31:27', '2020-07-16 08:31:27'),
(84, '7798551a-0b93-44a0-8d3f-9c04396077db', 14, 1, 'a', 1, '2020-07-16 08:31:27', '2020-07-16 08:31:27'),
(85, '038a36a3-b145-4380-a52f-7fe866ddfbab', 14, 3, 'd', 0, '2020-07-16 08:31:27', '2020-07-16 08:31:27'),
(86, 'cf890af0-e67b-4529-b4ee-b238f7366824', 14, 8, 'd', 0, '2020-07-16 08:31:27', '2020-07-16 08:31:27'),
(87, '4bb170a5-ca12-40d6-b54c-35275dc6a038', 14, 4, 'a', 1, '2020-07-16 08:31:27', '2020-07-16 08:31:27'),
(88, '79f9c59d-eed5-4b14-a45f-c559b05c910f', 14, 6, 'a', 1, '2020-07-16 08:31:27', '2020-07-16 08:31:27'),
(89, '61f5f359-fffa-4bb7-8a2f-ca1d140e5c92', 14, 7, 'a', 1, '2020-07-16 08:31:27', '2020-07-16 08:31:27'),
(90, '8f3f656d-afdd-4dad-9f0c-fefba8c8d6d7', 14, 9, 'b', 0, '2020-07-16 08:31:27', '2020-07-16 08:31:27'),
(91, '4aa44f03-08ac-4682-b99d-261d889d7b1d', 15, 17, 'a', 1, '2020-07-16 08:53:22', '2020-07-16 08:53:22'),
(92, '3fbed89f-e9f6-4080-a0f6-175c4a9ac53c', 15, 12, 'a', 1, '2020-07-16 08:53:23', '2020-07-16 08:53:23'),
(93, '0ee6acac-a35c-4f3c-953b-272b265e1d1b', 15, 15, 'b', 0, '2020-07-16 08:53:23', '2020-07-16 08:53:23'),
(94, '4dd3336d-daa0-4e52-8ea2-8da2d075de81', 15, 14, 'a', 1, '2020-07-16 08:53:23', '2020-07-16 08:53:23'),
(95, '862215db-bad5-4e3b-9e06-a5b2a540f7fe', 15, 18, 'a', 1, '2020-07-16 08:53:23', '2020-07-16 08:53:23'),
(96, '08435eec-8f18-42df-a434-259f75d8bb32', 15, 11, 'a', 1, '2020-07-16 08:53:23', '2020-07-16 08:53:23'),
(97, 'c3a8e3e8-2a42-4d8a-860d-a888bb2e1794', 15, 16, 'a', 1, '2020-07-16 08:53:23', '2020-07-16 08:53:23'),
(98, '726d1380-a89a-4eed-aefc-396470e6a939', 15, 13, 'a', 1, '2020-07-16 08:53:23', '2020-07-16 08:53:23'),
(99, '4a85e470-c7e6-41b5-b358-0ec253a62b4c', 15, 20, 'a', 1, '2020-07-16 08:53:23', '2020-07-16 08:53:23'),
(100, '97e2c567-b558-4121-a2ca-56bd8ff45b98', 15, 19, 'a', 1, '2020-07-16 08:53:23', '2020-07-16 08:53:23'),
(101, 'f2ae75c3-a72e-45bb-8552-0f824b99a9f9', 16, 1, 'a', 1, '2020-07-16 08:54:03', '2020-07-16 08:54:03'),
(102, '0f8441c7-af42-494a-8312-a2791ca4ea5b', 16, 6, 'a', 1, '2020-07-16 08:54:03', '2020-07-16 08:54:03'),
(103, '0bc69f3f-b6cf-4fed-ad11-dd2473e28368', 16, 4, 'a', 1, '2020-07-16 08:54:03', '2020-07-16 08:54:03'),
(104, '73a185c1-d798-4baf-87c1-bd50b7aa143a', 16, 9, 'a', 1, '2020-07-16 08:54:03', '2020-07-16 08:54:03'),
(105, 'f3eea998-7d6e-48ee-a12f-2e8b3c183824', 16, 7, 'a', 1, '2020-07-16 08:54:03', '2020-07-16 08:54:03'),
(106, '220b3e7c-707a-4a35-8b36-fc39d9cd3b85', 16, 3, 'a', 1, '2020-07-16 08:54:03', '2020-07-16 08:54:03'),
(107, 'b3a7bc9f-c7ec-4970-b705-7a3bd3e55933', 16, 10, 'a', 1, '2020-07-16 08:54:03', '2020-07-16 08:54:03'),
(108, '0d4eb976-a29e-4689-9c33-5f0b65b754ba', 16, 8, 'd', 0, '2020-07-16 08:54:03', '2020-07-16 08:54:03'),
(109, '68ed2334-571a-4272-8e63-bd40de07458b', 16, 2, 'c', 0, '2020-07-16 08:54:03', '2020-07-16 08:54:03'),
(110, '482eb793-a4c0-4c48-bc17-76d21753900f', 16, 5, 'd', 0, '2020-07-16 08:54:03', '2020-07-16 08:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kelas` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `uuid`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(1, '44f242ba-1ebd-4464-a7f2-6e94b9a3695a', 'Mekanik Alat Berat', '2020-07-09 05:08:20', '2020-07-09 05:08:20'),
(2, 'a514bacb-d7ed-4ce2-a6a3-0e5f5f62875f', 'Operator Alat Berat', '2020-07-14 16:54:39', '2020-07-14 16:54:39'),
(3, 'b0b78515-1939-4ad1-a159-4d98154f57ad', 'Study Alat Berat', '2020-07-14 16:55:03', '2020-07-14 16:55:03');

-- --------------------------------------------------------

--
-- Table structure for table `komentars`
--

CREATE TABLE `komentars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pertemuan_id` bigint(20) UNSIGNED NOT NULL,
  `komentar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komentars`
--

INSERT INTO `komentars` (`id`, `uuid`, `user_id`, `pertemuan_id`, `komentar`, `created_at`, `updated_at`) VALUES
(1, 'c811e552-537b-4ebf-a576-2a5ce36c9f4a', 2, 1, 'tes', '2020-07-09 05:56:38', '2020-07-09 05:56:38'),
(2, '1db91939-0eb9-491b-8c57-c1633908b7fd', 3, 1, 'hi', '2020-07-09 05:58:58', '2020-07-09 05:58:58'),
(3, '3dd74c31-a0a5-4792-840f-e7f5ff9457d7', 4, 3, 'tes komen', '2020-07-11 19:58:03', '2020-07-11 19:58:03'),
(4, 'b46d3fa4-9019-45b6-b8ef-1c1d897ff497', 14, 2, 'hi', '2020-07-18 18:08:31', '2020-07-18 18:08:31'),
(5, 'a2efb9ed-8d19-42cd-92f4-7657422dbd5c', 14, 4, 'hai semua', '2020-07-18 22:02:11', '2020-07-18 22:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `mapels`
--

CREATE TABLE `mapels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruktur_id` bigint(20) UNSIGNED NOT NULL,
  `mapel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapels`
--

INSERT INTO `mapels` (`id`, `uuid`, `instruktur_id`, `mapel`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'c9b48b85-cace-4fef-9466-6445a5a7d279', 1, 'Alat-alat berat', '-', '2020-07-09 05:12:14', '2020-07-09 05:12:14'),
(2, 'ea90372d-7343-43a1-8c3c-4555f4568c60', 2, 'Advance Alat Berat', '-', '2020-07-14 16:57:29', '2020-07-14 16:57:29'),
(3, '99e57ff2-29c6-42b5-bf02-f1e0de835599', 2, 'Basic Alat Berat', '-', '2020-07-14 17:20:16', '2020-07-14 17:20:16'),
(4, 'bc919e5f-eaae-41c6-89d5-ae1ceb851f8a', 3, 'Struktur Alat Berat', '-', '2020-07-14 17:20:50', '2020-07-14 17:20:50');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_01_021443_create_periodes_table', 1),
(5, '2020_06_02_052003_create_instrukturs_table', 1),
(6, '2020_06_02_090800_create_kelas_table', 1),
(7, '2020_06_02_094100_create_siswas_table', 1),
(8, '2020_06_03_001450_create_mapels_table', 1),
(9, '2020_06_03_002914_create_pertemuans_table', 1),
(10, '2020_06_03_010849_create_moduls_table', 1),
(11, '2020_06_03_014745_create_tugas_table', 1),
(12, '2020_06_06_040501_create_soals_table', 1),
(13, '2020_06_06_045544_create_tes_table', 1),
(14, '2020_06_06_080913_create_tes_siswas_table', 1),
(15, '2020_06_06_082156_create_jawaban_siswas_table', 1),
(16, '2020_06_08_062326_create_tugas_siswas_table', 1),
(17, '2020_06_20_122803_create_komentars_table', 1),
(18, '2020_06_27_110438_create_absensis_table', 1),
(19, '2020_06_27_154101_create_nilai_siswas_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `moduls`
--

CREATE TABLE `moduls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertemuan_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `moduls`
--

INSERT INTO `moduls` (`id`, `uuid`, `pertemuan_id`, `judul`, `file`, `created_at`, `updated_at`) VALUES
(1, 'a13f63a0-34a9-4939-b704-1fee3825011f', 1, 'Modul Basic Alat Berat', '1.pdf', '2020-07-09 05:54:12', '2020-07-09 05:54:12'),
(2, 'e1505c54-7a04-4010-80ed-e2dc33001170', 2, 'Basic Alat Berat 2', '2.pdf', '2020-07-09 05:55:01', '2020-07-09 05:55:01'),
(3, 'a024838f-66c6-4a35-a671-394401eae392', 3, 'Judul Modul', '3.pdf', '2020-07-11 19:56:06', '2020-07-11 19:56:06'),
(4, 'b7634971-136b-4127-8309-8bd082242bce', 4, 'Basic Advance Alat Berat', '4.pdf', '2020-07-14 21:32:45', '2020-07-14 21:32:45'),
(5, '01d594c1-c748-451f-86c1-acd58dc60eff', 7, 'Modul Struktur Alat Berat', '5.pdf', '2020-07-14 22:36:04', '2020-07-14 22:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_siswas`
--

CREATE TABLE `nilai_siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `absensi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tugas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tes` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_akhir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_siswas`
--

INSERT INTO `nilai_siswas` (`id`, `uuid`, `user_id`, `absensi`, `tugas`, `tes`, `nilai_akhir`, `created_at`, `updated_at`) VALUES
(1, '0393e361-f68a-42cb-923f-649738329d62', 2, '50', '90', '90', '82.00', '2020-07-09 06:05:19', '2020-07-09 06:05:19'),
(2, '5fbf6fa7-bb85-446a-9766-b564830553f5', 4, '0', '50', '20', '28.00', '2020-07-11 20:03:14', '2020-07-11 20:03:14');

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
-- Table structure for table `periodes`
--

CREATE TABLE `periodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kepsek` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periodes`
--

INSERT INTO `periodes` (`id`, `kepsek`, `uuid`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 'NADILA MEGA SYAFITRI', 'ce401817-cb77-4f49-a07d-0ece7b2d37ec', '2020-07-01', '2020-07-09 05:07:51', '2020-07-09 05:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `pertemuans`
--

CREATE TABLE `pertemuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `pertemuan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertemuans`
--

INSERT INTO `pertemuans` (`id`, `uuid`, `mapel_id`, `pertemuan`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 'e9f8f3d3-c3fb-4af3-adcb-cdfd78231b2e', 1, 'Pertemuan ke 1', '2020-07-19', '2020-07-09 05:51:04', '2020-07-18 16:44:10'),
(2, '86f113cd-3e1e-406f-8add-058e298d63f0', 1, 'pertemuan ke 2', '2020-07-10', '2020-07-09 05:51:18', '2020-07-09 05:51:18'),
(3, '5edebc6f-7887-4d5b-a1e6-6d9dd10d62fc', 1, 'Pertemuan ke 3', '2020-07-12', '2020-07-11 19:55:34', '2020-07-11 19:55:34'),
(4, 'a5ac55f9-c55a-4d8b-85e2-75027bf50f51', 2, 'Pertemuan ke 1', '2020-07-15', '2020-07-14 21:29:18', '2020-07-14 21:29:18'),
(5, '34f6d63f-a5f1-4b32-b14f-fff35c901a93', 2, 'pertemuan ke 2', '2020-07-16', '2020-07-14 21:29:34', '2020-07-14 21:29:34'),
(6, '81f66d5d-9525-4e2e-8b93-dde8687b1371', 2, 'Pertemuan ke 3', '2020-07-17', '2020-07-14 21:31:21', '2020-07-14 21:31:21'),
(7, '9eebc657-7582-4dbc-b931-263492d4c1b0', 4, 'Pertemuan ke 1', '2020-07-15', '2020-07-14 21:48:13', '2020-07-14 21:49:03'),
(8, 'fcd98c0c-86ca-4ae0-bd62-c7436c808f81', 4, 'pertemuan ke 2', '2020-07-16', '2020-07-14 21:48:46', '2020-07-14 21:48:46'),
(9, '8b40cfae-71f9-4a0c-b065-82bcc3b89da2', 4, 'Pertemuan ke 3', '2020-07-17', '2020-07-14 21:49:16', '2020-07-14 21:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` tinyint(4) NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `user_id`, `kelas_id`, `uuid`, `jk`, `tempat_lahir`, `tanggal_lahir`, `email`, `asal`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '4e789203-9640-4596-9631-8e0a03f4b99f', 2, 'Pasuruan', '1998-03-05', 'nadilamegaysyafitri@gmail.com', 'Banjarbaru', '2020-07-09 05:09:50', '2020-07-09 05:09:50'),
(2, 4, 1, 'e6a9dfd9-8923-43f2-8ba0-1cc096c38388', 2, 'Pasuruan', '1998-03-05', 'nadilamegaysyafitri@gmail.com', 'Banjarbaru', '2020-07-11 19:52:57', '2020-07-11 19:52:57'),
(3, 8, 2, '9d51748f-d125-4048-84a1-e1ed95e503e8', 1, 'Pasuruan', '1998-05-03', 'nadilamegaysyafitri@gmail.com', 'Banjarbaru', '2020-07-14 16:58:47', '2020-07-14 16:58:47'),
(4, 9, 3, '5308f350-ddd8-460b-a6cb-281493b6e049', 1, 'Banjarbaru', '1998-05-03', 'nadilamegaysyafitri@gmail.com', 'Banjarbaru', '2020-07-14 17:03:05', '2020-07-14 17:03:05'),
(5, 10, 2, '0a63f946-8d86-4d1d-8204-ca5ca50457df', 2, 'Pasuruan', '1998-05-03', 'nadilamegaysyafitri@gmail.com', 'Banjarbaru', '2020-07-14 17:04:10', '2020-07-14 17:04:10'),
(6, 15, 1, 'bacfcac1-4e32-4c91-b941-53a4eeb16da7', 1, 'Pasuruan', '2020-06-29', 'dewi@gmail.com', 'SMK', '2020-07-18 16:13:26', '2020-07-18 16:13:26');

-- --------------------------------------------------------

--
-- Table structure for table `soals`
--

CREATE TABLE `soals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `kode_soal` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soals`
--

INSERT INTO `soals` (`id`, `uuid`, `mapel_id`, `kode_soal`, `soal`, `a`, `b`, `c`, `d`, `jawaban`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
(1, '4beb7f90-bfde-4e43-890f-df072a6a2ffd', 1, 'A1', 'soal ke 1', '1', '2', '3', '4', 'a', '1.png', 1, '2020-07-09 05:13:03', '2020-07-09 05:13:04'),
(2, '87c0d17d-add9-4e03-bda1-592be49889dd', 1, 'A1', 'soal ke 2', '2', '3', '4', '5', 'a', '2.jpg', 1, '2020-07-09 05:13:31', '2020-07-09 05:13:32'),
(3, '136a7ecf-09cc-4b7a-b930-f3efd5da1e10', 1, 'A1', 'soal ke 3', '3', '2', '1', '4', 'a', '3.jpg', 1, '2020-07-09 05:16:28', '2020-07-09 05:16:28'),
(4, '5c1cc20d-6eb0-41ac-9353-476dae8be9a7', 1, 'A1', 'soal ke 4', '4', '1', '2', '3', 'a', '4.jpg', 1, '2020-07-09 05:19:26', '2020-07-09 05:19:26'),
(5, '17f6862f-4b86-4f36-85da-740700a0dd72', 1, 'A1', 'soal ke 5', '5', '4', '3', '2', 'a', '5.png', 1, '2020-07-09 05:22:06', '2020-07-09 05:22:06'),
(6, '893a4043-11d6-4de8-821b-4640b027f63b', 1, 'A1', 'soal ke 6', '6', '1', '2', '3', 'a', NULL, 1, '2020-07-09 05:35:50', '2020-07-09 05:35:50'),
(7, 'afdb9ef6-6178-4e22-ad78-f79c758792f2', 1, 'A1', 'soal ke 7', '7', '1', '2', '4', 'a', NULL, 1, '2020-07-09 05:36:16', '2020-07-09 05:36:16'),
(8, 'e803d718-3164-4049-bc26-322a1b552edc', 1, 'A1', 'soal ke 8', '8', '1', '2', '3', 'a', NULL, 1, '2020-07-09 05:36:53', '2020-07-09 05:36:53'),
(9, 'd64a3a14-aee3-4811-844f-e94c3c9c7f73', 1, 'A1', 'soal ke 9', '9', '1', '2', '3', 'a', NULL, 1, '2020-07-09 05:37:16', '2020-07-09 05:37:16'),
(10, 'b68fdd5e-76eb-4414-85ab-4f950c69cd79', 1, 'A1', 'soal ke 10', '10', '1', '2', '3', 'a', '10.jpg', 1, '2020-07-09 05:37:42', '2020-07-14 17:23:35'),
(11, '68f97ff8-8503-4848-a3da-3d1f6435bb77', 4, 'A2', 'soal ke 1', '1', '2', '3', '4', 'a', NULL, 1, '2020-07-16 07:29:14', '2020-07-16 07:29:14'),
(12, '8d4c0448-fd4a-4340-b678-f8882a9def85', 4, 'A2', 'soal ke 2', '1', '3', '4', '2', 'a', NULL, 1, '2020-07-16 07:29:52', '2020-07-16 07:29:52'),
(13, 'cfe99fd7-9db4-4922-ba2c-16069bf048f9', 4, 'A2', 'soal ke 3', '3', '4', '5', '6', 'a', NULL, 1, '2020-07-16 07:30:35', '2020-07-16 07:30:35'),
(14, '23aa0a40-4960-4038-839f-dce054ae44a1', 4, 'A2', 'soal ke 4', '4', '2', '9', '7', 'a', NULL, 1, '2020-07-16 07:31:01', '2020-07-16 07:31:30'),
(15, 'e86da662-f87b-496d-a80a-e57015f18fa3', 4, 'A2', 'soal ke 5', '5', '4', '3', '2', 'a', NULL, 1, '2020-07-16 07:31:55', '2020-07-16 07:31:55'),
(16, 'b27c7a30-36d0-4965-95f2-94a3b269c394', 4, 'A2', 'soal ke 6', '6', '5', '4', '9', 'a', '16.jpg', 1, '2020-07-16 07:32:33', '2020-07-16 07:32:33'),
(17, '267b9bed-68df-40c9-bc23-fc77cfaf2500', 4, 'A2', 'Soal ke 7', '7', '6', '5', '9', 'a', '17.png', 1, '2020-07-16 07:35:42', '2020-07-16 07:35:42'),
(18, '3f8d4385-b9ad-4311-bcd4-c30782d5ca60', 4, 'A2', 'Soal ke 8', '8', '6', '5', '0', 'a', '18.jpg', 1, '2020-07-16 07:36:50', '2020-07-16 07:36:50'),
(19, '40ed1899-dfa5-4deb-9349-3e2bbc186605', 4, 'A2', 'Soal ke 9', '9', '8', '7', '6', 'a', '19.jpg', 1, '2020-07-16 07:37:21', '2020-07-16 07:37:21'),
(20, '8970a5f5-8e96-4471-9867-aa12d18cd744', 4, 'A2', 'Soal ke 10', '10', '9', '8', '7', 'a', '20.jpg', 1, '2020-07-16 07:37:55', '2020-07-16 07:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `tes`
--

CREATE TABLE `tes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `periode_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_ujian` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tes`
--

INSERT INTO `tes` (`id`, `uuid`, `mapel_id`, `periode_id`, `tanggal_ujian`, `status`, `created_at`, `updated_at`) VALUES
(1, '32ff5c66-959f-41b0-b501-e5e64a181716', 1, 1, '2020-07-19', 0, '2020-07-09 05:38:27', '2020-07-19 05:23:00'),
(4, '48e66a68-e7a0-4887-847c-54b8b5bd16a7', 4, 1, '2020-07-20', 0, '2020-07-14 17:27:09', '2020-07-19 05:23:37');

-- --------------------------------------------------------

--
-- Table structure for table `tes_siswas`
--

CREATE TABLE `tes_siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `tes_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tes_siswas`
--

INSERT INTO `tes_siswas` (`id`, `uuid`, `siswa_id`, `tes_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, '2221de71-972e-4e82-9e5c-f1d1959bbf61', 1, 1, '90', '2020-07-09 05:56:56', '2020-07-09 05:57:18'),
(2, 'd0cffb75-e7e1-44ad-b214-15e1303660a6', 2, 1, '20', '2020-07-11 19:54:06', '2020-07-11 19:54:37'),
(4, '86a34bfb-c135-4420-b349-173bbee3babe', 4, 1, '100', '2020-07-15 05:22:45', '2020-07-15 05:23:15'),
(6, 'e6c6440f-3877-4d09-b9e8-12754804b391', 3, 1, '100', '2020-07-15 05:25:44', '2020-07-15 05:26:11'),
(8, 'b6b895ee-6b32-4cf5-8ab5-a31cb7e6e87a', 5, 1, '20', '2020-07-15 07:18:43', '2020-07-15 07:19:06'),
(11, 'd0f542f6-b06c-4061-976c-27af080e4d38', 4, 4, '90', '2020-07-16 08:17:29', '2020-07-16 08:22:54'),
(12, '0dd48725-3a19-440f-a4fa-44b5cb5bd920', 5, 4, '60', '2020-07-16 08:29:25', '2020-07-16 08:29:57'),
(15, '5e907fd8-b10c-411c-8f3c-19ea9d2fd72f', 3, 4, '90', '2020-07-16 08:48:21', '2020-07-16 08:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertemuan_id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `batas_waktu` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `uuid`, `pertemuan_id`, `deskripsi`, `batas_waktu`, `created_at`, `updated_at`) VALUES
(1, 'ea6c500f-452c-436a-b727-07116e8303eb', 1, 'Buatlah Struktur Alat Berat', '2020-07-11', '2020-07-09 05:54:28', '2020-07-09 05:54:28'),
(2, 'bcf84ae6-1371-4aaf-9b6c-da4648094942', 2, 'Tugas Mengenal Macam-macam Alat Berat', '2020-07-17', '2020-07-09 05:55:20', '2020-07-09 05:55:20'),
(3, 'ca1c157c-36e8-4737-8e24-1212cf3e6432', 3, 'Tugas Membuat soal', '2020-07-15', '2020-07-11 19:56:45', '2020-07-11 19:56:45'),
(4, '14d084c3-d9dd-43f2-b5a6-8499dd7680de', 4, 'Buatlah Struktur Alat Berat', '2020-07-22', '2020-07-14 21:41:48', '2020-07-14 21:41:48'),
(5, '0e6fd447-4601-4cd3-8583-57a8d5f48736', 7, 'Buatlah Struktur Alat Berat', '2020-07-23', '2020-07-14 22:36:49', '2020-07-14 22:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_siswas`
--

CREATE TABLE `tugas_siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `tugas_id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tugas_siswas`
--

INSERT INTO `tugas_siswas` (`id`, `uuid`, `siswa_id`, `tugas_id`, `file`, `nilai`, `created_at`, `updated_at`) VALUES
(1, '255f05c3-1649-4e90-94ec-74fb4cebad51', 1, 1, '1.pdf', 90, '2020-07-09 05:56:28', '2020-07-09 05:58:21'),
(2, 'c94ad9d8-f020-4456-a115-30e74f86d3b6', 2, 3, '2.pdf', 50, '2020-07-11 19:57:52', '2020-07-11 19:58:58'),
(3, '84c7e4c4-2a70-4911-9401-bebf5d036bd9', 1, 4, '3.pdf', 88, '2020-07-15 04:57:49', '2020-07-15 07:25:37'),
(4, '3ef387d1-1642-475c-b105-38cc5936ac10', 1, 5, '4.pdf', 90, '2020-07-15 05:01:15', '2020-07-15 05:04:46'),
(5, '4f22e010-ad00-4bc6-aa84-17f2b195a51c', 4, 4, '5.pdf', 0, '2020-07-15 05:07:12', '2020-07-15 05:07:13'),
(6, '3d9a746f-fcbf-4d39-8406-db9a171bde87', 4, 5, '6.pdf', 77, '2020-07-15 05:19:51', '2020-07-19 02:36:01'),
(7, '1db4f7ba-8049-4658-af82-588840c2280d', 3, 4, '7.pdf', 0, '2020-07-15 05:24:36', '2020-07-15 05:24:36'),
(8, '671f8783-f0f1-4c9f-8f7e-9177f9982122', 3, 5, '8.pdf', 88, '2020-07-15 05:25:17', '2020-07-19 02:35:47'),
(9, '785c9e2f-7ba7-4863-96b5-c6673046ab59', 5, 4, '9.pdf', 0, '2020-07-15 07:18:09', '2020-07-15 07:18:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nrp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1,
  `foto` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'default.jpg',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `nrp`, `role`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin123', '$2y$10$DjujV0TPpjE3i2KWlTaetOK/gaz9/e8Td/1U4XwGF.fyovih71SPO', '123', 2, '1.jpeg', NULL, '2020-07-09 04:49:00', '2020-07-14 17:17:55'),
(2, 'Mega Syafitri', 'siswa123', '$2y$10$vY7MRgQXazl/iKAbBWtn5.koskqmVxEdD.zWNAJ9dJJjQ8lIFZHIO', '11', 1, '2.jpeg', NULL, '2020-07-09 05:09:50', '2020-07-15 01:07:03'),
(3, 'syafitri', 'instruktur123', '$2y$10$K5vrryLgReq55jAmh2FnD.Lp1v3BUSs0TUYx2k1.AiINAvJRvzFeC', '1111', 3, '3.jpeg', NULL, '2020-07-09 05:11:42', '2020-07-09 05:11:43'),
(4, 'Nadila', 'nadila123', '$2y$10$TdUb6FwfWOFLij/bnrKM0urQ/BqS6gdbUUD99G7iG3LFexyEyqjJ2', '123', 1, 'default.jpg', NULL, '2020-07-11 19:52:53', '2020-07-11 19:52:53'),
(7, 'Guru 1', 'guru1', '$2y$10$vJGMG28zgMbT9eIR2KtSZ.Y35izda.FnivBcipHb9FOWxCEPbnG1y', '1212', 3, '7.jpeg', NULL, '2020-07-14 16:56:26', '2020-07-14 16:56:26'),
(8, 'Siswa 1', 'siswa1', '$2y$10$8cOBU56MpW9It4kr9VJoa.8ngfhPfOE1Llhp53/0MpWvUGUZSOanW', '131', 1, '8.jpeg', NULL, '2020-07-14 16:58:46', '2020-07-14 16:58:47'),
(9, 'siswa 2', 'siswa2', '$2y$10$I4UuYUT9jWuIkWzWY.8J7urd.d0bz0WL.s7eEAMCf.Z.eXvJoi7ZO', '1414', 1, '9.jpeg', NULL, '2020-07-14 17:03:05', '2020-07-14 17:03:05'),
(10, 'siswa 3', 'siswa3', '$2y$10$nseKGNyidsFSIjTZE3jTd.QMEQdUJXHQ1P54Vsi19JUxgj6E5IMJu', '191', 1, '10.jpeg', NULL, '2020-07-14 17:04:10', '2020-07-14 17:04:10'),
(11, 'Guru 2', 'guru2', '$2y$10$.8Sp6UV0aEd.AI3acRcCG.BlIzoonPSb/lmvtRl03wO0FfbxnSClW', '1991', 3, '11.jpeg', NULL, '2020-07-14 17:14:34', '2020-07-14 17:14:34'),
(12, 'guru 3', 'guru3', '$2y$10$8IcdXPygZrx/k14HK4jgDOgMlpv7uAb.TUCJnlYhyNHAYKKjVzUVy', '181', 3, '12.jpeg', NULL, '2020-07-14 17:15:21', '2020-07-14 17:15:21'),
(13, 'Guru 4', 'guru4', '$2y$10$IasPQWPCoLhmKeIjftVmPeWqwLVy.RPZlKWUh4Edgkf0KIiUktxmy', '1811', 3, '13.jpeg', NULL, '2020-07-14 17:16:06', '2020-07-14 17:16:06'),
(14, 'admin mega', 'adminmega', '$2y$10$wwK5N25ol5nRow0vLDmT1u6FPSLykgCn/IDDYKPZhRwo9xZ9B4q2O', '5355', 2, 'default.jpg', NULL, '2020-07-14 17:17:36', '2020-07-14 17:17:36'),
(15, 'teswwwwwwwww', 'tes', '$2y$10$7hIcDqps4e.Z4xNM.Bp1bO7TAz11YL47MU1oWbhs5qYoH2aZlIVJ2', '111111', 1, 'default.jpg', NULL, '2020-07-18 16:13:26', '2020-07-18 16:14:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensis`
--
ALTER TABLE `absensis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensis_user_id_foreign` (`user_id`),
  ADD KEY `absensis_pertemuan_id_foreign` (`pertemuan_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instrukturs`
--
ALTER TABLE `instrukturs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban_siswas`
--
ALTER TABLE `jawaban_siswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentars`
--
ALTER TABLE `komentars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapels`
--
ALTER TABLE `mapels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mapels_instruktur_id_foreign` (`instruktur_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moduls`
--
ALTER TABLE `moduls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `moduls_pertemuan_id_foreign` (`pertemuan_id`);

--
-- Indexes for table `nilai_siswas`
--
ALTER TABLE `nilai_siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_siswas_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `periodes`
--
ALTER TABLE `periodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertemuans`
--
ALTER TABLE `pertemuans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pertemuans_mapel_id_foreign` (`mapel_id`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswas_user_id_foreign` (`user_id`),
  ADD KEY `siswas_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `soals`
--
ALTER TABLE `soals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tes`
--
ALTER TABLE `tes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tes_siswas`
--
ALTER TABLE `tes_siswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tugas_pertemuan_id_foreign` (`pertemuan_id`);

--
-- Indexes for table `tugas_siswas`
--
ALTER TABLE `tugas_siswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensis`
--
ALTER TABLE `absensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instrukturs`
--
ALTER TABLE `instrukturs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jawaban_siswas`
--
ALTER TABLE `jawaban_siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `komentars`
--
ALTER TABLE `komentars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mapels`
--
ALTER TABLE `mapels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `moduls`
--
ALTER TABLE `moduls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai_siswas`
--
ALTER TABLE `nilai_siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `periodes`
--
ALTER TABLE `periodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pertemuans`
--
ALTER TABLE `pertemuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `soals`
--
ALTER TABLE `soals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tes`
--
ALTER TABLE `tes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tes_siswas`
--
ALTER TABLE `tes_siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tugas_siswas`
--
ALTER TABLE `tugas_siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensis`
--
ALTER TABLE `absensis`
  ADD CONSTRAINT `absensis_pertemuan_id_foreign` FOREIGN KEY (`pertemuan_id`) REFERENCES `pertemuans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `absensis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mapels`
--
ALTER TABLE `mapels`
  ADD CONSTRAINT `mapels_instruktur_id_foreign` FOREIGN KEY (`instruktur_id`) REFERENCES `instrukturs` (`id`);

--
-- Constraints for table `moduls`
--
ALTER TABLE `moduls`
  ADD CONSTRAINT `moduls_pertemuan_id_foreign` FOREIGN KEY (`pertemuan_id`) REFERENCES `pertemuans` (`id`);

--
-- Constraints for table `nilai_siswas`
--
ALTER TABLE `nilai_siswas`
  ADD CONSTRAINT `nilai_siswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pertemuans`
--
ALTER TABLE `pertemuans`
  ADD CONSTRAINT `pertemuans_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`);

--
-- Constraints for table `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `siswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_pertemuan_id_foreign` FOREIGN KEY (`pertemuan_id`) REFERENCES `pertemuans` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
