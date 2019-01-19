-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jan 2019 pada 16.08
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pintaar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `total_price`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 3, 0, 1, '2019-01-15 20:01:36', '2019-01-15 20:01:36'),
(2, 6, 0, 1, '2019-01-16 22:13:28', '2019-01-16 22:13:28'),
(3, 7, 0, 1, '2019-01-17 01:54:19', '2019-01-17 01:54:19'),
(4, 8, 0, 1, '2019-01-17 02:35:31', '2019-01-17 02:35:31'),
(5, 3, 0, 1, '2019-01-17 02:50:51', '2019-01-17 02:50:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart_course`
--

CREATE TABLE `cart_course` (
  `id` int(10) UNSIGNED NOT NULL,
  `cart_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cart_course`
--

INSERT INTO `cart_course` (`id`, `cart_id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2019-01-15 20:01:36', '2019-01-15 20:01:36'),
(2, 2, 2, '2019-01-16 22:13:28', '2019-01-16 22:13:28'),
(3, 3, 2, '2019-01-17 01:54:19', '2019-01-17 01:54:19'),
(4, 4, 2, '2019-01-17 02:35:31', '2019-01-17 02:35:31'),
(5, 5, 3, '2019-01-17 02:50:51', '2019-01-17 02:50:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_course` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tutor` int(11) NOT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `courses`
--

INSERT INTO `courses` (`id`, `nama_course`, `harga`, `foto`, `deskripsi`, `id_tutor`, `video`, `kategori`, `created_at`, `updated_at`) VALUES
(2, 'Belajar Cepat HTML dari NOL', 0, 'BELAJAR HTML.png', 'Anda ingin menjadi PROGRAMMER BERGAJI TINGGI? Atau ingin belajar MEMBUAT WEBSITE? Berarti anda harus BELAJAR HTML sekarang juga! \r\n\r\nHTML merupakan salah satu bahasa utama pada sebuah sebuah website. HTML berperan untuk menjadi wadah konten-konten yang ada di website, seperti teks, gambar, video, daftar, tabel, dan lain-lain. Kelas ini akan mengenalkan dasar-dasar HTML dan cara membuat website sederhana dengan HTML.\r\n\r\nOrang yang bisa mempunyai skill HTML sangat berguna untuk menunjang industri/karir pemrograman. Dimana, pemrograman adalah salah satu karir yang saat ini sangat trend di Indonesia. Orang-orang yang memiliki skill ini, biasanya industri berani membayar cukup tinggi untuk dapat memaksimalkan bisnis mereka.\r\n\r\nKamu akan diajarkan oleh seorang praktisi web development, yakni Andi Irsandi. Andi Irsandi adalah founder website Pena Sang Mahasiswa (https://www.penasangmahasiswa.top/). Beliau sering mengajarkan tentang pemograman dengan mudah. Terbukti beliau sudah memiliki murid ratusan di bidang ini.\r\n\r\nBagaimana tertarik? Jika iya, berarti anda harus membeli kelas ini sekarang juga! MASIH GRATIS SAMPAI WAKTU BEBERAPA HARI BERIKUT NYA SAJA!', 1, '', 1, '2019-01-15 19:29:28', '2019-01-19 07:02:06'),
(3, 'Membuat Aplikasi Android dengan React Native dan Expo', 0, 'react-native.png', 'Anda ingin menjadi PROGRAMMER BERGAJI TINGGI? Atau ingin belajar MEMBUAT APLIKASI MOBILE dan WEBSITE? Berarti anda harus BELAJAR REACT NATIVE sekarang juga! \r\n\r\nReact native adalah salah satu library javascript yang sangat terkenal saat ini. Dengan React Native, kamu bisa membuat aplikasi mobile dengan mudah dan cepat. Bahkan dengan belajar bahasa ini saja, kamu sekaligus bisa membuat website secara langsung. Ini berarti kamu bisa mendapatkan 2 hal dalam belajar 1 hal saja. \r\n\r\nReact native sudah dipakai oleh banyak perusahaan seperti Facebook, Instagram, Skype dan perusahaan besar lainnya. Sehingga, sudah pasti menjadi ilmu yang sangat berguna untuk membantu karir kamu. \r\n\r\nDidalam kelas ini, kamu akan diajarkan oleh praktisi-praktisi ternama di perusahaan Yuk Coding. Yuk Coding adalah perusahaan yang sering mengajarkan pemograman dengan mudah, praktis dan sederhana. Terbukti, sudah ribuan murid yang telah puas belajar dengan kami.\r\n\r\nBagaimana tertarik untuk belajar kami? Jika iya, berarti anda harus membeli kelas ini sekarang juga! MASIH GRATIS SAMPAI WAKTU BEBERAPA HARI BERIKUT NYA SAJA!', 2, '', 1, '2019-01-15 23:12:58', '2019-01-15 23:12:58'),
(4, 'Belajar HTML 5 dengan Mudah dan Cepat', 0, 'html-nol.jpg', 'Anda ingin menjadi PROGRAMMER BERGAJI TINGGI? Atau ingin belajar MEMBUAT WEBSITE? Berarti anda harus BELAJAR HTML sekarang juga! \r\n\r\nHTML adalah salah satu pemrograman hampir wajib diketahui oleh seorang programmer. HTML atau Hypertext Markup Language adalah sebuah bahasa markah yang digunakan untuk membuat sebuah halaman web. \r\n\r\nOrang yang bisa mempunyai skill HTML sangat berguna untuk menunjang industri/karir pemrograman. Dimana, pemrograman adalah salah satu karir yang saat ini sangat trend di Indonesia. Orang-orang yang memiliki skill ini, biasanya industri berani membayar cukup tinggi untuk dapat memaksimalkan bisnis mereka.\r\n\r\nDi dalam kelas ini, kalian akan diajarkan bagaimana menggunakan HTML dalam dengan mudah oleh Aden Rahmandi. Beliau adalah seseorang cukup berpengalaman dalam dunia pemrograman. Beliau sudah terbukti beliau sudah mengajarkan ribuan orang tentang pemograman\r\n\r\nSecara singkat, kalian akan diajarkan secara bertahap apa itu html, persiapan untuk memulai, dasar-dasar html dan lain sebagainya.\r\n\r\nBagaimana tertarik? Jika iya, berarti anda harus membeli kelas ini sekarang juga! MASIH GRATIS SAMPAI WAKTU BEBERAPA HARI BERIKUT NYA SAJA!', 3, '', 1, '2019-01-15 23:41:21', '2019-01-15 23:41:21'),
(5, 'Memasak Cemilan untuk Buka Bisnis Sendiri', 0, '', 'Siapa yang suka cemilan?\r\nTentunya semua hampir semua orang suka cemilan. Selain dengan rasanya yang enak, cemilan mudah dan cepat dibuat. Bahkan, cemilan yang enak dan unik bisa dijual dengan sangat menguntungkan jika dipasarkan dengan benar.\r\n\r\nTetapi, terkadang kita sering kesulitan membuat cemilan yang enak. Hal ini dikarenakan, kita sulit menemukan resep cemilan yang enak. Bahkan, sulit untuk mencari pengajar yang tepat untuk mengajari kita. \r\n\r\nOleh karena itu, kelas ini dibuat untuk membantu anda belajar membuat cemilan. Di kelas ini, kita akan belajar membuat cemilan-cemilan sederhana, tetapi unik, berkelas, dan disukai banyak orang. Kelas ini, disiapkan oleh organisasi Resep Makanan Simple, yang telah terbukti, mengajarkan jutaan orang terhadap masakan yang enak dan unik!. \r\n\r\nAyo ambil kelas ini sekarang selagi masih gratis!', 4, '', 2, '2019-01-19 07:21:38', '2019-01-19 07:21:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_topik`
--

CREATE TABLE `file_topik` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_topik` int(11) NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar_topiks`
--

CREATE TABLE `komentar_topiks` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_topik` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `komentar` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_user_tonton_topik`
--

CREATE TABLE `log_user_tonton_topik` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_topik` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `log_user_tonton_topik`
--

INSERT INTO `log_user_tonton_topik` (`id`, `id_user`, `id_topik`, `created_at`, `updated_at`) VALUES
(1, 3, 4, '2019-01-15 20:04:07', '2019-01-15 20:04:07'),
(2, 3, 5, '2019-01-15 20:04:22', '2019-01-15 20:04:22'),
(3, 3, 6, '2019-01-15 20:04:36', '2019-01-15 20:04:36'),
(4, 3, 7, '2019-01-15 20:04:43', '2019-01-15 20:04:43'),
(5, 3, 8, '2019-01-15 20:06:12', '2019-01-15 20:06:12'),
(6, 3, 9, '2019-01-15 20:07:15', '2019-01-15 20:07:15'),
(7, 3, 10, '2019-01-15 20:07:40', '2019-01-15 20:07:40'),
(8, 3, 11, '2019-01-15 20:07:43', '2019-01-15 20:07:43'),
(9, 3, 12, '2019-01-15 20:07:45', '2019-01-15 20:07:45'),
(10, 3, 13, '2019-01-15 20:07:47', '2019-01-15 20:07:47'),
(11, 3, 18, '2019-01-15 20:45:01', '2019-01-15 20:45:01'),
(12, 3, 19, '2019-01-15 20:45:06', '2019-01-15 20:45:06'),
(13, 3, 20, '2019-01-15 20:45:14', '2019-01-15 20:45:14'),
(14, 3, 21, '2019-01-15 20:45:21', '2019-01-15 20:45:21'),
(15, 3, 14, '2019-01-15 23:06:08', '2019-01-15 23:06:08'),
(16, 3, 15, '2019-01-15 23:06:11', '2019-01-15 23:06:11'),
(17, 3, 16, '2019-01-15 23:06:15', '2019-01-15 23:06:15'),
(18, 3, 17, '2019-01-15 23:06:23', '2019-01-15 23:06:23'),
(19, 4, 23, '2019-01-15 23:34:31', '2019-01-15 23:34:31'),
(20, 4, 24, '2019-01-15 23:35:24', '2019-01-15 23:35:24'),
(21, 4, 25, '2019-01-15 23:35:40', '2019-01-15 23:35:40'),
(22, 4, 26, '2019-01-15 23:35:45', '2019-01-15 23:35:45'),
(23, 4, 27, '2019-01-15 23:35:52', '2019-01-15 23:35:52'),
(24, 4, 28, '2019-01-15 23:35:55', '2019-01-15 23:35:55'),
(25, 4, 29, '2019-01-15 23:36:00', '2019-01-15 23:36:00'),
(26, 4, 30, '2019-01-15 23:36:12', '2019-01-15 23:36:12'),
(27, 4, 31, '2019-01-15 23:36:14', '2019-01-15 23:36:14'),
(28, 5, 33, '2019-01-16 00:10:51', '2019-01-16 00:10:51'),
(29, 5, 34, '2019-01-16 00:11:36', '2019-01-16 00:11:36'),
(30, 5, 35, '2019-01-16 00:11:40', '2019-01-16 00:11:40'),
(31, 5, 36, '2019-01-16 00:11:50', '2019-01-16 00:11:50'),
(32, 5, 37, '2019-01-16 00:11:52', '2019-01-16 00:11:52'),
(33, 5, 38, '2019-01-16 00:11:57', '2019-01-16 00:11:57'),
(34, 5, 39, '2019-01-16 00:12:00', '2019-01-16 00:12:00'),
(35, 5, 40, '2019-01-16 00:12:06', '2019-01-16 00:12:06'),
(36, 5, 41, '2019-01-16 00:12:10', '2019-01-16 00:12:10'),
(37, 5, 42, '2019-01-16 00:12:13', '2019-01-16 00:12:13'),
(38, 5, 43, '2019-01-16 00:12:17', '2019-01-16 00:12:17'),
(39, 5, 44, '2019-01-16 00:12:22', '2019-01-16 00:12:22'),
(40, 5, 45, '2019-01-16 00:12:24', '2019-01-16 00:12:24'),
(41, 5, 46, '2019-01-16 00:12:29', '2019-01-16 00:12:29'),
(42, 5, 47, '2019-01-16 00:12:32', '2019-01-16 00:12:32'),
(43, 6, 5, '2019-01-16 22:13:46', '2019-01-16 22:13:46'),
(44, 6, 21, '2019-01-16 22:14:04', '2019-01-16 22:14:04'),
(45, 6, 15, '2019-01-16 22:18:01', '2019-01-16 22:18:01'),
(46, 6, 19, '2019-01-16 22:18:29', '2019-01-16 22:18:29'),
(47, 3, 3, '2019-01-17 01:41:08', '2019-01-17 01:41:08'),
(48, 7, 4, '2019-01-17 01:54:34', '2019-01-17 01:54:34'),
(49, 7, 7, '2019-01-17 01:54:42', '2019-01-17 01:54:42'),
(50, 7, 19, '2019-01-17 01:55:52', '2019-01-17 01:55:52'),
(51, 7, 20, '2019-01-17 01:56:46', '2019-01-17 01:56:46'),
(52, 7, 3, '2019-01-17 01:57:09', '2019-01-17 01:57:09'),
(53, 7, 5, '2019-01-17 01:57:18', '2019-01-17 01:57:18'),
(54, 7, 6, '2019-01-17 01:57:21', '2019-01-17 01:57:21'),
(55, 8, 4, '2019-01-17 02:36:29', '2019-01-17 02:36:29'),
(56, 8, 5, '2019-01-17 02:36:37', '2019-01-17 02:36:37'),
(57, 3, 22, '2019-01-17 02:51:26', '2019-01-17 02:51:26'),
(58, 3, 23, '2019-01-17 02:51:47', '2019-01-17 02:51:47'),
(59, 3, 24, '2019-01-17 02:53:29', '2019-01-17 02:53:29'),
(60, 3, 25, '2019-01-17 02:53:33', '2019-01-17 02:53:33'),
(61, 3, 26, '2019-01-17 02:54:19', '2019-01-17 02:54:19'),
(62, 3, 27, '2019-01-17 02:54:23', '2019-01-17 02:54:23'),
(63, 3, 28, '2019-01-17 02:55:09', '2019-01-17 02:55:09'),
(64, 3, 29, '2019-01-17 02:55:17', '2019-01-17 02:55:17'),
(65, 3, 30, '2019-01-17 02:56:26', '2019-01-17 02:56:26'),
(66, 3, 31, '2019-01-17 02:56:30', '2019-01-17 02:56:30'),
(67, 1, 3, '2019-01-19 06:23:14', '2019-01-19 06:23:14'),
(68, 1, 4, '2019-01-19 06:23:30', '2019-01-19 06:23:30'),
(69, 1, 5, '2019-01-19 06:23:40', '2019-01-19 06:23:40'),
(70, 1, 6, '2019-01-19 06:23:46', '2019-01-19 06:23:46'),
(71, 1, 7, '2019-01-19 06:24:02', '2019-01-19 06:24:02'),
(72, 1, 8, '2019-01-19 06:24:18', '2019-01-19 06:24:18'),
(73, 1, 9, '2019-01-19 06:24:28', '2019-01-19 06:24:28'),
(74, 1, 10, '2019-01-19 06:24:39', '2019-01-19 06:24:39'),
(75, 9, 48, '2019-01-19 07:28:04', '2019-01-19 07:28:04'),
(76, 9, 49, '2019-01-19 07:28:07', '2019-01-19 07:28:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(206, '2014_10_12_000000_create_users_table', 1),
(207, '2014_10_12_100000_create_password_resets_table', 1),
(208, '2018_09_02_161650_create_roles_table', 1),
(209, '2018_09_02_161712_create_murids_table', 1),
(210, '2018_09_02_161828_create_tutors_table', 1),
(211, '2018_09_02_161847_create_prestasi_tutors_table', 1),
(212, '2018_09_02_161906_create_prestasi_murid_tutors_table', 1),
(213, '2018_09_02_161946_create_pembelian_courses_table', 1),
(214, '2018_09_02_162117_create_status_pembayarans_table', 1),
(215, '2018_09_02_162140_create_courses_table', 1),
(216, '2018_09_03_002335_create_review_courses', 1),
(217, '2018_09_07_002131_create_komentar_topiks_table', 1),
(218, '2018_09_07_002426_creates_topiks_table', 1),
(219, '2018_09_07_002526_creates_pertanyaan_topiks_table', 1),
(220, '2018_09_11_085849_create_cart_table', 1),
(221, '2018_09_11_091207_create_cart_course_table', 1),
(222, '2018_09_15_085041_create_rating_course', 1),
(223, '2018_09_15_085303_create_log_user_nonton_topik', 1),
(224, '2018_09_20_020006_create_komentar_reply_topiks_table', 1),
(225, '2018_10_25_100600_create_notification_table', 1),
(226, '2018_12_08_160601_create_file_topik_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `murids`
--

CREATE TABLE `murids` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `asal_sekolah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `murids`
--

INSERT INTO `murids` (`id`, `id_user`, `asal_sekolah`, `created_at`, `updated_at`) VALUES
(1, 3, '', '2019-01-15 20:00:38', '2019-01-15 20:00:38'),
(2, 6, '', '2019-01-16 22:13:01', '2019-01-16 22:13:01'),
(3, 7, '', '2019-01-17 01:54:03', '2019-01-17 01:54:03'),
(4, 8, '', '2019-01-17 02:34:39', '2019-01-17 02:34:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `id_destination` int(11) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(1, 'haha@haha.id', '$2y$10$wDE3.7NhpGtCAzAFs4NG9u0ufKiGQgcaPx6dZyswRgOQfsOXjwAuG', '2019-01-16 22:57:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_courses`
--

CREATE TABLE `pembelian_courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart_id` int(11) NOT NULL,
  `status_pembayaran` int(11) NOT NULL,
  `metode_pembayaran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_pembayaran` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu_valid_pembelian` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembelian_courses`
--

INSERT INTO `pembelian_courses` (`id`, `id_user`, `no_order`, `cart_id`, `status_pembayaran`, `metode_pembayaran`, `bukti_pembayaran`, `waktu_valid_pembelian`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, 1, 3, '0', NULL, NULL, '2019-01-15 20:01:36', '2019-01-15 20:01:36'),
(2, 6, NULL, 2, 3, '0', NULL, NULL, '2019-01-16 22:13:28', '2019-01-16 22:13:28'),
(3, 7, NULL, 3, 3, '0', NULL, NULL, '2019-01-17 01:54:19', '2019-01-17 01:54:19'),
(4, 8, NULL, 4, 3, '0', NULL, NULL, '2019-01-17 02:35:31', '2019-01-17 02:35:31'),
(5, 3, NULL, 5, 3, '0', NULL, NULL, '2019-01-17 02:50:51', '2019-01-17 02:50:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan_topiks`
--

CREATE TABLE `pertanyaan_topiks` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_topik` int(11) NOT NULL,
  `pertanyaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_pertanyaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban` int(11) NOT NULL,
  `opsi_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opsi_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opsi_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opsi_4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pertanyaan_topiks`
--

INSERT INTO `pertanyaan_topiks` (`id`, `id_topik`, `pertanyaan`, `judul_pertanyaan`, `jawaban`, `opsi_1`, `opsi_2`, `opsi_3`, `opsi_4`, `gambar`, `created_at`, `updated_at`) VALUES
(3, 13, 'File HTML harus dibuka dengan <html> dan ditutup </html>?', 'Pertanyaan 1', 1, 'Benar', 'Salah', NULL, NULL, NULL, '2019-01-15 19:56:33', '2019-01-15 19:56:33'),
(4, 13, 'Struktur dasar HTML adalah', 'Pertanyaan 2', 2, 'Head, body, dan foot', 'Head dan body', 'Head, body, hand, dan foot', NULL, NULL, '2019-01-15 19:57:40', '2019-01-15 19:57:40'),
(5, 13, 'Tag untuk membuat link diberi simbol dengan huruf?', 'Pertanyaan 3', 4, 'e', 'u', 'i', 'a', NULL, '2019-01-15 19:58:40', '2019-01-15 19:58:40'),
(6, 13, 'Komponen apa yang tidak ada di HTML?', 'Pertanyaan 4', 3, 'Link', 'Tabel', 'Formula', 'List', NULL, '2019-01-15 20:00:04', '2019-01-15 20:00:04'),
(7, 19, 'Tag yang biasa digunakan bersama tag form, kecuali', 'Pertanyaan 1', 4, 'Input', 'Select', 'Textarea', 'Table', NULL, '2019-01-15 20:34:36', '2019-01-15 20:34:36'),
(8, 19, 'Apa tujuan membuat komentar pada HTML', 'Pertanyaan 2', 3, 'Mengkritik kerjaan programmer', 'Mengingatkan programmer untuk melakukan sesuatu', 'Membuat penjelasan tentang kode yang dibuat agar mudah dimengerti', NULL, NULL, '2019-01-15 20:35:36', '2019-01-15 20:35:36'),
(9, 19, 'Apa fungsi tag iframe', 'Pertanyaan 3', 1, 'Menampilkan halaman web lain', 'Membuat bingkai web', 'Membungkus elemen web agar lebih bagus', NULL, NULL, '2019-01-15 20:36:28', '2019-01-15 20:36:28'),
(10, 29, 'Bahasa apa yang digunakan framework react native?', 'Pertanyaan 1', 2, 'Java', 'Javascript', 'Python', 'C++', NULL, '2019-01-15 23:27:09', '2019-01-15 23:27:09'),
(11, 29, 'React native dapat digunakan untuk membuat website', 'Pertanyaan 2', 2, 'Benar', 'Salah', NULL, NULL, NULL, '2019-01-15 23:27:42', '2019-01-15 23:27:42'),
(12, 35, 'Apa kepanjangan dari HTML?', 'Pertanyaan 1', 1, 'HyperText Markup Language', 'High Text Manual Language', 'Hyper Text Minor Language', NULL, NULL, '2019-01-15 23:48:02', '2019-01-15 23:48:02'),
(13, 39, 'Tag apa yang dapat memuat file dalam html?', 'Pertanyaan 1', 1, '<link>', '<body>', '<a>', '<b>', NULL, '2019-01-15 23:51:46', '2019-01-15 23:51:46'),
(14, 43, 'Tag apa yang dapat memuat link dalam html?', 'Pertanyaan 1', 3, '<link>', '<body>', '<a>', '<b>', NULL, '2019-01-15 23:54:12', '2019-01-15 23:54:12'),
(15, 47, 'Apa kegunaan Tag <ol>?', 'Pertanyaan 1', 2, 'Unordered List', 'Ordered List', 'Strong Text', 'Bold Text', NULL, '2019-01-15 23:57:32', '2019-01-15 23:57:32'),
(16, 54, 'Dibawah ini mana yang bukan bahan untuk membuat pudot?', 'Pertanyaan 1', 3, 'Gula', 'Pop Ice', 'Beng Beng', 'Susu Kental Manis', NULL, '2019-01-19 07:47:09', '2019-01-19 07:47:09'),
(17, 58, 'Dibawah ini mana yang bukan bahan untuk membuat Keripik Lumpia?', 'Pertanyaan 1', 2, 'Air', 'Susu', 'Lumpia', 'Terigu', NULL, '2019-01-19 07:54:21', '2019-01-19 07:54:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi_murid_tutors`
--

CREATE TABLE `prestasi_murid_tutors` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_tutor` int(11) NOT NULL,
  `nama_murid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi_tutors`
--

CREATE TABLE `prestasi_tutors` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_tutor` int(11) NOT NULL,
  `prestasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating_courses`
--

CREATE TABLE `rating_courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `jumlah_rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reply_komentar_topiks`
--

CREATE TABLE `reply_komentar_topiks` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_komentar_topik` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `komentar` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `review_courses`
--

CREATE TABLE `review_courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_course` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pembayarans`
--

CREATE TABLE `status_pembayarans` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `status_pembayarans`
--

INSERT INTO `status_pembayarans` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Belum Bayar', NULL, NULL),
(2, 'Belum Disetujui', NULL, NULL),
(3, 'Disetujui', NULL, NULL),
(4, 'Jumlah Transfer Kurang', NULL, NULL),
(5, 'Pembayaran Invalid', NULL, NULL),
(6, 'Langganan Kadaluarsa', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `topiks`
--

CREATE TABLE `topiks` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_course` int(11) NOT NULL,
  `video` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_topik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjelasan` longtext COLLATE utf8mb4_unicode_ci,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `topiks`
--

INSERT INTO `topiks` (`id`, `id_course`, `video`, `judul_topik`, `penjelasan`, `parent_id`, `created_at`, `updated_at`) VALUES
(3, 2, '', '1. Persiapan', 'Pada bagian ini, kamu dipersilahkan untuk bergabung ke grup Facebook untuk memudahkan kita berdiskusi mengenai materi kelas ini. Kita juga akan mempersiapkan tools yang diperlukan untuk belajar di kelas ini.', NULL, '2019-01-15 19:33:40', '2019-01-15 19:33:40'),
(4, 2, '', 'Gabung Grup Facebook', '<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" style=\"border-collapse:collapse;\"><tr style=\"\"><td height=\"28\" style=\"line-height:28px;\">&nbsp;</td></tr><tr><td style=\"\"><table border=\"0\" width=\"280\" cellspacing=\"0\" cellpadding=\"0\" style=\"border-collapse:separate;background-color:#ffffff;border:1px solid #dddfe2;border-radius:3px;font-family:Helvetica, Arial, sans-serif;margin:0px auto;\"><tr style=\"padding-bottom: 8px;\"><td style=\"\"><img class=\"img\" src=\"https://scontent.fcgk8-2.fna.fbcdn.net/v/t1.0-0/q84/p526x296/49791375_2431145366930778_1638725122313420800_n.jpg?_nc_cat=109&amp;_nc_eui2=AeEBinqsoEX2tpXXHMo90Q5BFbPo2y-oUFyi4rAScbb3W9HqchgXgdNUVbDOVN1I-HITzdPYkOcitrkOMdTX2pcSX6sh8BScZaT1oVXo_Z6JWA&amp;_nc_ht=scontent.fcgk8-2.fna&amp;oh=72e818cf50a01937c8595dbc54d58f67&amp;oe=5CC2804A\" width=\"280\" height=\"146\" alt=\"\" /></td></tr><tr><td style=\"font-size:14px;font-weight:bold;padding:8px 8px 0px 8px;text-align:center;\">Pengembangan Website untuk Pemula</td></tr><tr><td style=\"color:#90949c;font-size:12px;font-weight:normal;text-align:center;\">Tertutup group · 1 anggota</td></tr><tr><td style=\"padding:8px 12px 12px 12px;\"><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border-collapse:collapse;width:100%;\"><tr><td style=\"background-color:#4267b2;border-radius:3px;text-align:center;\"><a style=\"color:#3b5998;text-decoration:none;cursor:pointer;width:100%;\" href=\"https://web.facebook.com/plugins/group/join/popup/?group_id=625353957894400&amp;source=email_campaign_plugin\" target=\"_blank\" rel=\"noopener\"><table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\" style=\"border-collapse:collapse;\"><tr><td style=\"border-bottom:3px solid #4267b2;border-top:3px solid #4267b2;color:#FFF;font-family:Helvetica, Arial, sans-serif;font-size:12px;font-weight:bold;\">Gabung dengan Grup</td></tr></table></a></td></tr></table></td></tr><tr><td style=\"border-top:1px solid #dddfe2;font-size:12px;padding:8px 12px;\">Grup ini digunakan untuk diskusi seputar pengembangan website untuk pemula.</td></tr></table></td></tr><tr style=\"\"><td height=\"28\" style=\"line-height:28px;\">&nbsp;</td></tr></table>', 3, '2019-01-15 19:35:02', '2019-01-15 19:35:02'),
(5, 2, '', 'Tools yang Dibutuhkan', 'Kamu membutuhkan text editor seperti sublime -> https://www.sublimetext.com/\r\natau notepad++  -> https://notepad-plus-plus.org/ \r\n\r\nKamu juga membutuhkan browser seperti chrome, mozilla firefox, dan lain-lain.', 3, '2019-01-15 19:37:32', '2019-01-15 19:37:32'),
(6, 2, '', '2. Komponen Dasar HTML', 'Pada bagian ini, kita akan mengenal struktur dan komponen dasar dari bahasa HTML.', NULL, '2019-01-15 19:38:39', '2019-01-15 19:38:39'),
(7, 2, '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/8iA6JwL6sSo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Struktur Dasar HTML', NULL, 6, '2019-01-15 19:39:42', '2019-01-15 19:39:42'),
(8, 2, '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/dzNR-n8nHCA\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Tag HTML Utama dan Atributnya', NULL, 6, '2019-01-15 19:42:40', '2019-01-15 19:42:40'),
(9, 2, '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/IAPZ8zZwEvU\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Membuat Daftar (List)', 'Coba berikan contoh di kolom komentar, biasanya list ini dipakai untuk apa saja?', 6, '2019-01-15 19:43:02', '2019-01-15 19:44:08'),
(10, 2, '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/rwvnlamCPKg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Membuat Link atau Hyperlink', NULL, 6, '2019-01-15 19:45:06', '2019-01-15 19:45:06'),
(11, 2, '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/UHY20ULz6_0\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Memasukkan Gambar', NULL, 6, '2019-01-15 19:45:21', '2019-01-15 19:45:21'),
(12, 2, '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/TJp_d0YBfHk\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Membuat Tabel', 'Jika kamu ingin membuat sebuah website, tabel akan kamu gunakan untuk apa di website kamu?', 6, '2019-01-15 19:45:54', '2019-01-15 19:46:54'),
(13, 2, '', 'Kuis', NULL, 6, '2019-01-15 19:47:29', '2019-01-15 19:47:29'),
(14, 2, '', '3. Komponen HTML Lanjutan', 'Pada bagian ini, kamu akan belajar tag-tag HTML lain yang tentunya semakin menarik dan menyenangkan. Lanjut belajar!', NULL, '2019-01-15 20:31:12', '2019-01-15 20:31:12'),
(15, 2, '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/cxGzYOVk3pI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Membuat Formulir (Form)', NULL, 14, '2019-01-15 20:31:57', '2019-01-15 20:31:57'),
(16, 2, '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/agIBjYfotW0\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Menambahkan Komentar pada Kode HTML', 'Komentar yang dimaksud bukan komentar pada post facebook, blog, youtube, dan lain-lain. Komentar disini digunakan untuk memudahkan programmer dalam mengetahui kode HTML ini fungsinya apa. Komentar disini tidak akan ditampilkan di browser, dan hanya bisa dilihat di sumber kode.', 14, '2019-01-15 20:32:17', '2019-01-15 20:32:17'),
(17, 2, '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/GIpN1Cj-rPQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Membuat Teks Berjalan (Marquee)', NULL, 14, '2019-01-15 20:32:57', '2019-01-15 20:32:57'),
(18, 2, '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/leIzKQNvarg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Menggunakan iframe', NULL, 14, '2019-01-15 20:33:06', '2019-01-15 20:33:06'),
(19, 2, '', 'Kuis', NULL, 14, '2019-01-15 20:33:40', '2019-01-15 20:33:40'),
(20, 2, '', '4. Membuat Website dengan HTML', 'Ini merupakan bagian terakhir. Kita akan melihat sebuah website yang lebih kompleks dan dibuat menggunakan HTML.', NULL, '2019-01-15 20:38:06', '2019-01-15 20:39:06'),
(21, 2, '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/mS2F8Ld1Aww\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Contoh sebuah Website', 'Sumber kode dapat di akses di link berikut. Silahkan dipelajari sendiri.\r\n\r\nhttps://drive.google.com/drive/folders/13pzMe10jRs5JxeuC4hdc_lG8PCZfHeg-', 20, '2019-01-15 20:38:44', '2019-01-15 20:38:44'),
(22, 3, '', '1. Persiapan', 'Pada bagian ini, kamu dipersilahkan untuk bergabung grup Facebook agar memudahkan kita diskusi seputar materi kelas ini. Disini, kamu juga harus mempersiapkan tools sebelum mengikuti kelas ini.', NULL, '2019-01-15 23:18:24', '2019-01-15 23:18:44'),
(23, 3, '', 'Gabung Grup Facebook', '<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" style=\"border-collapse:collapse;\"><tr style=\"\"><td height=\"28\" style=\"line-height:28px;\">&nbsp;</td></tr><tr><td style=\"\"><table border=\"0\" width=\"280\" cellspacing=\"0\" cellpadding=\"0\" style=\"border-collapse:separate;background-color:#ffffff;border:1px solid #dddfe2;border-radius:3px;font-family:Helvetica, Arial, sans-serif;margin:0px auto;\"><tr><td style=\"font-size:14px;font-weight:bold;padding:8px 8px 0px 8px;text-align:center;\">Pengembangan Aplikasi Android untuk Pemula</td></tr><tr><td style=\"color:#90949c;font-size:12px;font-weight:normal;text-align:center;\">Tertutup group · 1 anggota</td></tr><tr><td style=\"padding:8px 12px 12px 12px;\"><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border-collapse:collapse;width:100%;\"><tr><td style=\"background-color:#4267b2;border-radius:3px;text-align:center;\"><a style=\"color:#3b5998;text-decoration:none;cursor:pointer;width:100%;\" href=\"https://www.facebook.com/plugins/group/join/popup/?group_id=511854189303867&amp;source=email_campaign_plugin\" target=\"_blank\" rel=\"noopener\"><table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\" style=\"border-collapse:collapse;\"><tr><td style=\"border-bottom:3px solid #4267b2;border-top:3px solid #4267b2;color:#FFF;font-family:Helvetica, Arial, sans-serif;font-size:12px;font-weight:bold;\">Gabung dengan Grup</td></tr></table></a></td></tr></table></td></tr></table></td></tr><tr style=\"\"><td height=\"28\" style=\"line-height:28px;\">&nbsp;</td></tr></table>', 22, '2019-01-15 23:19:27', '2019-01-15 23:19:27'),
(24, 3, '', 'Software yang Harus di Install', '<strong>Mac OS</strong>\r\n<br/>\r\nInstall node.js, Install watchman dan Install JDK (Java development Kit)\r\n<br/>\r\n<br/>\r\n<strong>Windows</strong>\r\n<br/>\r\nInstall node.js, Install python2, dan Install JDK (Java development Kit)\r\n<br/>\r\n<br/>\r\n<strong>Linux</strong>\r\n<br/>\r\nInstall node.js, dan Install JDK (Java development Kit)', 22, '2019-01-15 23:23:04', '2019-01-15 23:23:04'),
(25, 3, '', '2. Pengenalan React Native dan Expo', 'Pada bagian ini, kita akan mengenal framework react native dan expo. Kita juga akan memulai instalasi react native dan expo.', NULL, '2019-01-15 23:25:06', '2019-01-15 23:28:15'),
(26, 3, '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/tsu3s1skmsI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Mengenal Framework React Native', NULL, 25, '2019-01-15 23:25:22', '2019-01-15 23:25:22'),
(27, 3, '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/_Hd4c8er064\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Mengenal dan Instalasi Expo', NULL, 25, '2019-01-15 23:25:51', '2019-01-15 23:25:51'),
(28, 3, '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/cGqLcOVRlOw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Instalasi React Native dan Membuat Proyek Baru', NULL, 25, '2019-01-15 23:26:09', '2019-01-15 23:26:09'),
(29, 3, '', 'Kuis', NULL, 25, '2019-01-15 23:26:20', '2019-01-15 23:26:20'),
(30, 3, '', '3. Mulai Membuat Aplikasi', 'Pada bagian ini, kita akan memulai membuat aplikasi sederhana.', NULL, '2019-01-15 23:29:06', '2019-01-15 23:29:06'),
(31, 3, '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/gNGTPQl7Vhw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Membuat Konten Sederhana', 'Ayo dicoba, jika ada pertanyaan lain bisa disampaikan di kolom komentar ya!', 30, '2019-01-15 23:29:45', '2019-01-15 23:29:45'),
(32, 4, '', '1. Persiapan dan Perkenalan HTML', 'Pada bagian ini, kita akan mengenal bahasa HTML. Kita juga akan mempersiapkan tools yang dibutuhkan untuk mengikuti kelas ini.', NULL, '2019-01-15 23:43:36', '2019-01-15 23:43:36'),
(33, 4, '<iframe width=\"640\" height=\"480\" src=\"https://www.youtube.com/embed/SjEj2UY2udo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Persiapan: Instalasi Notepad++ dan XAMPP', 'Di dalam video ini kita akan mempelajari bagaimana menginstall Notepad++ dan XAMPP sebelum mengerti HTML lebih jauh. Notepad++ adalah text editor yang nantinya berguna untuk menuliskan code yang kita tulis, sedangkan XAMPP secara singkat, adalah web server yang bisa dijalankan secara lokal. \r\n<br/>\r\nUntuk mengunduh notepad++ bisa dari : https://notepad-plus-plus.org/download/v7.6.2.html\r\n<br/>\r\nUntuk mengunduh xampp bisa dari: https://www.apachefriends.org/download.html', 32, '2019-01-15 23:44:49', '2019-01-15 23:44:49'),
(34, 4, '<iframe width=\"640\" height=\"480\" src=\"https://www.youtube.com/embed/_kfsuvjjHzU\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Apa itu HTML?', NULL, 32, '2019-01-15 23:45:18', '2019-01-15 23:45:18'),
(35, 4, '', 'Kuis', NULL, 32, '2019-01-15 23:45:31', '2019-01-15 23:45:31'),
(36, 4, '', '2. Pemahaman Dasar HTML', 'Pada bagian ini, kita akan belajar hal dasar yang harus dikuasai pada HTML. Kita juga akan mengenal bahasa CSS, yaitu bahasa yang akan membuat tampilan lebih baik.', NULL, '2019-01-15 23:49:49', '2019-01-15 23:49:49'),
(37, 4, '<iframe width=\"640\" height=\"480\" src=\"https://www.youtube.com/embed/TFBScMVOAHw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Struktur dasar HTML', NULL, 36, '2019-01-15 23:50:09', '2019-01-15 23:50:09'),
(38, 4, '<iframe width=\"640\" height=\"480\" src=\"https://www.youtube.com/embed/PCwNufJoKKk\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Dasar-Dasar CSS dan Link File pada HTML', NULL, 36, '2019-01-15 23:50:24', '2019-01-15 23:50:24'),
(39, 4, '', 'Kuis', NULL, 36, '2019-01-15 23:50:57', '2019-01-15 23:50:57'),
(40, 4, '', '3. Tag-Tag Dasar HTML', 'Pada bagian ini, kita akan mengenal tag-tag dasar HTML.', NULL, '2019-01-15 23:52:23', '2019-01-15 23:52:23'),
(41, 4, '<iframe width=\"640\" height=\"480\" src=\"https://www.youtube.com/embed/3NO8upmz_xk\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Tag-tag Dasar HTML Bagian 1', NULL, 40, '2019-01-15 23:52:54', '2019-01-15 23:52:54'),
(42, 4, '<iframe width=\"640\" height=\"480\" src=\"https://www.youtube.com/embed/mLHW5NhFS1Y\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Tag-Tag Dasar HTML Bagian 2', NULL, 40, '2019-01-15 23:53:21', '2019-01-15 23:53:21'),
(43, 4, '', 'Kuis', NULL, 40, '2019-01-15 23:53:45', '2019-01-15 23:53:45'),
(44, 4, '', '4. Tag HTML Lanjutan: Text Formatting dan HTML List Element', 'Pada bagian ini, kita akan mengenal tag-tag lain HTML yang lebih menarik.', NULL, '2019-01-15 23:55:35', '2019-01-15 23:59:22'),
(45, 4, '<iframe width=\"640\" height=\"480\" src=\"https://www.youtube.com/embed/qysNr-IqQFY\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Text Formatting', 'Text formatting adalah bagian dari html yang dapat mengubah text html menjadi lebih dinamis sesuai kebutuhan dan keinginan kita.', 44, '2019-01-15 23:56:02', '2019-01-15 23:56:02'),
(46, 4, '<iframe width=\"640\" height=\"480\" src=\"https://www.youtube.com/embed/5DxcepOuLmA\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'HTML List Element', NULL, 44, '2019-01-15 23:56:33', '2019-01-15 23:56:33'),
(47, 4, '', 'Kuis', NULL, 44, '2019-01-15 23:56:39', '2019-01-15 23:56:39'),
(48, 5, '', '1. Pendahuluan', 'Saya sudah membuat grup Facebook agar meudahkan kita tanya jawab seputar masakan disini. Ayo ke halaman berikutnya untuk gabung grupnya.', NULL, '2019-01-19 07:22:37', '2019-01-19 07:36:12'),
(49, 5, '', 'Gabung Grup Facebook', '<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" style=\"border-collapse:collapse;\"><tr style=\"\"><td height=\"28\" style=\"line-height:28px;\">&nbsp;</td></tr><tr><td style=\"\"><table border=\"0\" width=\"280\" cellspacing=\"0\" cellpadding=\"0\" style=\"border-collapse:separate;background-color:#ffffff;border:1px solid #dddfe2;border-radius:3px;font-family:Helvetica, Arial, sans-serif;margin:0px auto;\"><tr style=\"padding-bottom: 8px;\"><td style=\"\"><img class=\"img\" src=\"https://scontent.fcgk9-2.fna.fbcdn.net/v/t1.0-0/p526x296/50151318_2446344622077519_5894993551795683328_n.jpg?_nc_cat=103&amp;_nc_eui2=AeEL-mo7ADcLd9YRwJWC9PrnLSruyvcAu08r7_DXBBxBkwz29jhcXzDpniK3GbtDjkaOvKGuvKSx0Zw4yDqeTlWs1A_HjoRta61745vzTM3vPw&amp;_nc_ht=scontent.fcgk9-2.fna&amp;oh=fcfe4f072e2832306d44da30e60f3081&amp;oe=5D00737E\" width=\"280\" height=\"146\" alt=\"\" /></td></tr><tr><td style=\"font-size:14px;font-weight:bold;padding:8px 8px 0px 8px;text-align:center;\">Memasak untuk Memulai Bisnis</td></tr><tr><td style=\"color:#90949c;font-size:12px;font-weight:normal;text-align:center;\">Tertutup group · 2 anggota</td></tr><tr><td style=\"padding:8px 12px 12px 12px;\"><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border-collapse:collapse;width:100%;\"><tr><td style=\"background-color:#4267b2;border-radius:3px;text-align:center;\"><a style=\"color:#3b5998;text-decoration:none;cursor:pointer;width:100%;\" href=\"https://web.facebook.com/plugins/group/join/popup/?group_id=941889699339880&amp;source=email_campaign_plugin\" target=\"_blank\" rel=\"noopener\"><table border=\"0\" cellspacing=\"0\" cellpadding=\"3\" align=\"center\" style=\"border-collapse:collapse;\"><tr><td style=\"border-bottom:3px solid #4267b2;border-top:3px solid #4267b2;color:#FFF;font-family:Helvetica, Arial, sans-serif;font-size:12px;font-weight:bold;\">Gabung dengan Grup</td></tr></table></a></td></tr></table></td></tr></table></td></tr><tr style=\"\"><td height=\"28\" style=\"line-height:28px;\">&nbsp;</td></tr></table>', 48, '2019-01-19 07:27:46', '2019-01-19 07:27:46'),
(50, 5, '', '2. Cemilan Minuman Unik dan Menguntungkan', 'Pada bagian ini, kita akan belajar cara memasak minuman-minuman yang unik, mantap dan menguntungkan untuk bisnis.', NULL, '2019-01-19 07:32:43', '2019-01-19 07:36:32'),
(51, 5, '<iframe width=\"640\" height=\"480\" src=\"https://www.youtube.com/embed/83RtOjpLDzE\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Membuat Chat Time Versi Indonesia', 'Berikut adalah bahan-bahan untuk membuat Chat Time:\r\n<br>\r\n<ul>\r\n<li>2 kantong teh celup</li>\r\n<li>air hangat 100ml</li>\r\n<li>susu kental manis</li>\r\n</ul>', 50, '2019-01-19 07:39:03', '2019-01-19 07:39:03'),
(52, 5, '<iframe width=\"640\" height=\"480\" src=\"https://www.youtube.com/embed/9IFcYosAet0\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Membuat Smoothies Beng Beng', '<p>Berikut adalah bahan-bahan untuk membuat Smoothies Beng Beng:</p>\r\n<ul>\r\n<li>beng2 smoothies</li>\r\n<li>1 Bks Susu Cair seperti resep cake oreo hanya 2 bahan</li>\r\n</ul>', 50, '2019-01-19 07:42:07', '2019-01-19 07:42:07'),
(53, 5, '<iframe width=\"640\" height=\"480\" src=\"https://www.youtube.com/embed/VgGN7aUHixE\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Membuat Pudot Super Enak', '<p>Berikut adalah bahan-bahan untuk membuat Pudot:</p>\r\n<ul>\r\n<li>Nutrijel Plan Tanpa Rasa</li>\r\n<li>Susu kental Manis</li>\r\n<li>Gula</li>\r\n<li>Pop Ice/pewarna makanan</li>\r\n</ul>', 50, '2019-01-19 07:45:34', '2019-01-19 07:45:34'),
(54, 5, '', 'Kuis', NULL, 50, '2019-01-19 07:46:08', '2019-01-19 07:46:08'),
(55, 5, '', '3. Cemilan Makanan Unik dan Menguntungkan', 'Pada bagian ini, kita akan belajar cara masak cemilan yang enak dan menguntungkan.', NULL, '2019-01-19 07:49:23', '2019-01-19 07:49:23'),
(56, 5, '<iframe width=\"640\" height=\"480\" src=\"https://www.youtube.com/embed/BwaifXYEj8A\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Membuat Cemilan Keripik Lumpia Gurih', '<p>Berikut adalah bahan-bahan untuk membuat Keripik Lumpia:</p>\r\n<ul>\r\n<li>Kulit Lumpia</li>\r\n<li>Air Matang</li>\r\n<li>Sumpit</li>\r\n<li>Gunting</li>\r\n<li>Terigu</li>\r\n</ul>', 55, '2019-01-19 07:50:35', '2019-01-19 07:50:35'),
(57, 5, '<iframe width=\"640\" height=\"480\" src=\"https://www.youtube.com/embed/049xxxJ5qwM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Membuat Salad Buah dengan 2 Bahan Saja', '<p>Berikut adalah bahan-bahan untuk membuat Salad Buah:</p>\r\n<ul>\r\n<li>Mayones</li>\r\n<li>Susu Kental Manis</li>\r\n</ul>', 55, '2019-01-19 07:52:24', '2019-01-19 07:52:24'),
(58, 5, '', 'Kuis', NULL, 55, '2019-01-19 07:52:43', '2019-01-19 07:52:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tutors`
--

CREATE TABLE `tutors` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `mata_pelajaran` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_profil` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lama_mengajar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `story` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tutors`
--

INSERT INTO `tutors` (`id`, `id_user`, `mata_pelajaran`, `video_profil`, `lama_mengajar`, `pendidikan`, `story`, `created_at`, `updated_at`) VALUES
(1, 1, '', '', '', '', '', NULL, NULL),
(2, 4, NULL, NULL, NULL, NULL, NULL, '2019-01-15 23:10:31', '2019-01-15 23:10:31'),
(3, 5, NULL, NULL, NULL, NULL, NULL, '2019-01-15 23:11:08', '2019-01-15 23:11:08'),
(4, 9, NULL, NULL, NULL, NULL, NULL, '2019-01-19 07:16:17', '2019-01-19 07:16:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_role` int(11) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `alamat`, `foto`, `id_role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Andi Irsandi', 'andi.irsandi765@gmail.com', '', '', 2, '$2y$10$g8rC0tjDxhCQ1wQozBvYMudjDoWj.8yX5l68huDv5uevyBFqhdUuO', 'NGhmbB2qjtqOuxwRbmE6NNAa9F3xigoKXzpETTmEjG8NfdrxCXFSPUUujTSW', NULL, NULL),
(2, 'admin', 'admin@admin.id', '', '', 3, '$2y$10$xDI54QrTo8cncvOTdR4hquj2Hxg/i2zELT2tV2Wo2ggBK6aUbdR6.', 'GCVQHNSGfB9bmtXVHNNLCa2mOKukjlEv5vCIVr8oOLdbBqVFsqfk9yfT1fed', NULL, NULL),
(3, 'haha', 'haha@haha.id', '-', '', 1, '$2y$10$/CsW0TA1aN4WkhaBZ95Ciu67nZ6bBUEfbGwnFVR0SZxgO6ia7jtzi', 'gG7VT0x61cvyzSqpfzGlutenCu26I8Hncu65BImbvKVQ8v7YNbjud64y4siv', '2019-01-15 20:00:37', '2019-01-16 22:56:56'),
(4, 'YukCoding', 'dev@yukcoding.id', NULL, '', 2, '$2y$10$WZOsT8/bl/fFfX1rTivRfO6OPuXj5Fh829SW7STbs50N1eVV.pySG', 'dH2MEO5TQ3oTDteM8LoqXmJwMTxoqeeaKzjaICThFv0KVCCd3RMdj5mJE0gN', '2019-01-15 23:10:30', '2019-01-15 23:10:30'),
(5, 'Aden Rahmandi', 'rahmandiproject@gmail.com', NULL, '', 2, '$2y$10$K/czL3yOSAzXO1LUpiCcAOXqsqHEMUo.Clr8lqK.11.WpyTkJ64yW', 'uB3bYBf47h480d2TLBSQeuB14CGv4GafNhHIGP55ka7WH7zhVqb1aNDjIPig', '2019-01-15 23:11:08', '2019-01-15 23:11:08'),
(6, 'Rahmah', 'amafadilahsh@gmail.com', '-', '', 1, '$2y$10$AmA0PzSfVIZ9nflP0xPRwOQwJCQDN3mqFFeKKD64UjmrreawNgGN6', 'pLyeQyPzPejJ9dlPpifGFrY7HxLAm2zQTyRvt4RPqlj2ju0VIg2RtpF62ehv', '2019-01-16 22:13:01', '2019-01-16 22:13:01'),
(7, 'regi', 'hanasofya@gmail.com', '-', '', 1, '$2y$10$tQHIgaJEcAZF1U7yVffrQu0fhph36qMbmX8kg/FWjoFv26Ovry3fW', 'CUFVhT98qQncQhSZmkG1tbCMT0tZQqTtvblNdGxh0Rxv6YmDP8GlZWl6Vil3', '2019-01-17 01:54:03', '2019-01-17 01:54:03'),
(8, 'Atika', 'atikakurniaput@gmail.com', '-', '', 1, '$2y$10$BHLMeCR3Tvu7jF2gOURPyeoZesUksdbtsu2B73DW2/2GZxFOMgVSC', 'N0gX0eQgWJJFXwau32TES0SMVWC2AhXYbOXZLcZ7LNlPeos6X26nRNoc2wLg', '2019-01-17 02:34:39', '2019-01-17 02:34:39'),
(9, 'Resep Masakan Simple', 'resepmasakan@gmail.com', NULL, '', 2, '$2y$10$j3c7BOkHLbQ5rKiH5NbyOOWXf6hLC4xN2SXg0TnhZDh3Cyh5rSUoq', 'X8eyCP5pdtyN7mWgOOIvKIgpJ3hcfGW0P1e9AUdLSFKD9wamFSR5cg3oYUtT', '2019-01-19 07:16:17', '2019-01-19 07:16:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cart_course`
--
ALTER TABLE `cart_course`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `file_topik`
--
ALTER TABLE `file_topik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komentar_topiks`
--
ALTER TABLE `komentar_topiks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_user_tonton_topik`
--
ALTER TABLE `log_user_tonton_topik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `murids`
--
ALTER TABLE `murids`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian_courses`
--
ALTER TABLE `pembelian_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pertanyaan_topiks`
--
ALTER TABLE `pertanyaan_topiks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `prestasi_murid_tutors`
--
ALTER TABLE `prestasi_murid_tutors`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `prestasi_tutors`
--
ALTER TABLE `prestasi_tutors`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rating_courses`
--
ALTER TABLE `rating_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reply_komentar_topiks`
--
ALTER TABLE `reply_komentar_topiks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `review_courses`
--
ALTER TABLE `review_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_pembayarans`
--
ALTER TABLE `status_pembayarans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `topiks`
--
ALTER TABLE `topiks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `cart_course`
--
ALTER TABLE `cart_course`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `file_topik`
--
ALTER TABLE `file_topik`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `komentar_topiks`
--
ALTER TABLE `komentar_topiks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `log_user_tonton_topik`
--
ALTER TABLE `log_user_tonton_topik`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT untuk tabel `murids`
--
ALTER TABLE `murids`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembelian_courses`
--
ALTER TABLE `pembelian_courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan_topiks`
--
ALTER TABLE `pertanyaan_topiks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `prestasi_murid_tutors`
--
ALTER TABLE `prestasi_murid_tutors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prestasi_tutors`
--
ALTER TABLE `prestasi_tutors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rating_courses`
--
ALTER TABLE `rating_courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reply_komentar_topiks`
--
ALTER TABLE `reply_komentar_topiks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `review_courses`
--
ALTER TABLE `review_courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `status_pembayarans`
--
ALTER TABLE `status_pembayarans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `topiks`
--
ALTER TABLE `topiks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
