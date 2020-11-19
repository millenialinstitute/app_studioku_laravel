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
-- Database: `app_milenial_institute`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_settings`
--

CREATE TABLE `app_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `app_settings`
--

INSERT INTO `app_settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'version', 'v1.34', NULL, '2020-09-11 02:21:26'),
(2, 'copyright', 'Millenial Institute', NULL, '2020-09-11 02:21:36'),
(3, 'customer', 'Admin Millenial', '2020-09-11 02:08:58', '2020-09-11 02:12:24'),
(4, 'account', '092919299290302992', '2020-09-11 02:08:58', '2020-09-11 02:12:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `by_deal_payments`
--

CREATE TABLE `by_deal_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `cost_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `by_package_payments`
--

CREATE TABLE `by_package_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `cost_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `by_package_payments`
--

INSERT INTO `by_package_payments` (`id`, `payment_id`, `cost_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-09-06 09:37:21', '2020-09-06 09:37:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `by_student_payments`
--

CREATE TABLE `by_student_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `cost_id` bigint(20) UNSIGNED NOT NULL,
  `total_student` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` bigint(20) UNSIGNED NOT NULL,
  `to` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `class_grades`
--

CREATE TABLE `class_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partner_school_id` bigint(20) UNSIGNED NOT NULL,
  `grade` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `class_grades`
--

INSERT INTO `class_grades` (`id`, `partner_school_id`, `grade`, `created_at`, `updated_at`) VALUES
(1, 1, 10, NULL, NULL),
(2, 1, 11, NULL, NULL),
(3, 1, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `contract_payments`
--

CREATE TABLE `contract_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner_school_id` bigint(20) UNSIGNED NOT NULL,
  `payment_type` enum('bystudent','package','deal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `total_payment` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `final_date` date NOT NULL,
  `status` enum('process','delay','failed','success') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `contract_payments`
--

INSERT INTO `contract_payments` (`id`, `invoice_number`, `partner_school_id`, `payment_type`, `discount`, `tax`, `total_payment`, `start_date`, `final_date`, `status`, `invoice_date`, `created_at`, `updated_at`) VALUES
(1, '#INV20090610', 1, 'package', 0, 500000, 5500000, '2020-09-06', '2020-10-07', NULL, '2020-09-10', '2020-09-06 09:37:21', '2020-09-06 09:37:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cost_by_deals`
--

CREATE TABLE `cost_by_deals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage` bigint(20) NOT NULL,
  `document` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `embed` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `video` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `max_users` bigint(20) NOT NULL,
  `cost` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cost_by_packages`
--

CREATE TABLE `cost_by_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage` bigint(20) NOT NULL,
  `max_users` int(11) NOT NULL,
  `document` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `embed` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `video` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `cost` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cost_by_packages`
--

INSERT INTO `cost_by_packages` (`id`, `name`, `storage`, `max_users`, `document`, `embed`, `video`, `cost`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Gold', 20000000, 1000, 'true', 'true', 'false', 5000000, 'lorem ipsum', '2020-09-06 09:36:43', '2020-09-06 09:36:43'),
(2, 'ea', 30000000, 300, 'false', 'true', 'false', 3000000, 'Autem ipsum ea est eos quibusdam.', '2020-09-27 18:49:34', '2020-09-27 18:49:34'),
(3, 'omnis', 97000000, 400, 'false', 'false', 'true', 3000000, 'Voluptatem eum et explicabo et.', '2020-09-27 18:49:35', '2020-09-27 18:49:35'),
(4, 'animi', 100000000, 1100, 'false', 'true', 'true', 3000000, 'Exercitationem dolores ullam aut sapiente aut.', '2020-09-27 18:49:35', '2020-09-27 18:49:35'),
(5, 'in', 64000000, 600, 'true', 'false', 'true', 5000000, 'Et perferendis illum et sit libero dolorum.', '2020-09-27 18:49:35', '2020-09-27 18:49:35'),
(6, 'nihil', 83000000, 600, 'false', 'false', 'false', 1000000, 'Ea autem ab enim fugiat.', '2020-09-27 18:49:35', '2020-09-27 18:49:35'),
(7, 'beatae', 25000000, 1000, 'true', 'false', 'true', 2000000, 'Animi in vitae unde.', '2020-09-27 18:49:35', '2020-09-27 18:49:35'),
(8, 'deleniti', 66000000, 200, 'false', 'false', 'false', 1000000, 'Fugit ut ipsum dignissimos nihil sequi corporis.', '2020-09-27 18:49:35', '2020-09-27 18:49:35'),
(9, 'maxime', 9000000, 200, 'true', 'true', 'true', 4000000, 'Aut quis repellendus et voluptates maxime.', '2020-09-27 18:49:35', '2020-09-27 18:49:35'),
(10, 'aut', 31000000, 1900, 'false', 'false', 'false', 2000000, 'Libero tempora quod quia ut.', '2020-09-27 18:49:35', '2020-09-27 18:49:35'),
(11, 'deleniti', 95000000, 1500, 'false', 'true', 'true', 4000000, 'Est dicta est omnis et minus ex voluptates.', '2020-09-27 18:49:35', '2020-09-27 18:49:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cost_by_students`
--

CREATE TABLE `cost_by_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage` bigint(20) NOT NULL,
  `document` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `embed` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `video` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `cost` int(11) NOT NULL,
  `active` enum('active','nonactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partner_school_id` bigint(20) UNSIGNED NOT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `courses`
--

INSERT INTO `courses` (`id`, `partner_school_id`, `course`, `created_at`, `updated_at`) VALUES
(1, 1, 'Teknik Kendaraan Ringan', '2020-09-06 00:02:21', NULL),
(2, 1, 'Teknik Sepeda Motor', '2020-09-06 00:02:21', NULL),
(3, 1, 'Multimedia', '2020-09-06 00:02:21', NULL),
(4, 1, 'Animasi', '2020-09-06 00:02:21', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_parents`
--

CREATE TABLE `data_parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `partner_school_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'parent.jpg',
  `hp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_parents`
--

INSERT INTO `data_parents` (`id`, `user_id`, `partner_school_id`, `student_id`, `gender`, `img`, `hp`, `created_at`, `updated_at`) VALUES
(1, 9, 1, 1, 'male', 'parent.jpg', '08329193892983', '2020-09-06 00:02:29', NULL),
(2, 10, 1, 2, 'female', 'parent2.jpg', '08329193892983', '2020-09-06 00:02:29', NULL),
(3, 11, 1, 3, 'male', 'parent.jpg', '08329193892983', '2020-09-06 00:02:29', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_school_admins`
--

CREATE TABLE `data_school_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `partner_school_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_students`
--

CREATE TABLE `data_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `partner_school_id` bigint(20) UNSIGNED NOT NULL,
  `list_class_id` bigint(20) UNSIGNED NOT NULL,
  `valid_school` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_students`
--

INSERT INTO `data_students` (`id`, `user_id`, `partner_school_id`, `list_class_id`, `valid_school`, `gender`, `nis`, `img`, `hp`, `about_me`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 1, '1', 'male', '20382', 'student.jpg', '082718293729', NULL, NULL, NULL),
(2, 7, 1, 5, '1', 'male', '20382', 'student.jpg', '082718293729', NULL, NULL, NULL),
(3, 8, 1, 9, '1', 'male', '20382', 'student.jpg', '082718293729', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_teachers`
--

CREATE TABLE `data_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `partner_school_id` bigint(20) UNSIGNED NOT NULL,
  `valid_school` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_teachers`
--

INSERT INTO `data_teachers` (`id`, `user_id`, `partner_school_id`, `valid_school`, `admin`, `gender`, `img`, `nip`, `hp`, `about_me`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '1', '1', 'male', 'teacher.jpg', '0289391829482', '08321827829943', NULL, '2020-09-06 00:02:20', '2020-09-06 09:43:57'),
(2, 4, 1, '1', '0', 'male', 'teacher.jpg', '0289391829482', '08321827829943', NULL, '2020-09-06 00:02:20', NULL),
(3, 5, 1, '1', '0', 'male', 'teacher.jpg', '0289391829482', '08321827829943', NULL, '2020-09-06 00:02:20', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `duties`
--

CREATE TABLE `duties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_teacher_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `deadline` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `duty_classes`
--

CREATE TABLE `duty_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `duty_id` bigint(20) UNSIGNED NOT NULL,
  `list_class_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `duty_files`
--

CREATE TABLE `duty_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `duty_id` bigint(20) UNSIGNED NOT NULL,
  `type_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `duty_messages`
--

CREATE TABLE `duty_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `duty_id` bigint(20) UNSIGNED NOT NULL,
  `data_student_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `duty_students`
--

CREATE TABLE `duty_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `duty_id` bigint(20) UNSIGNED NOT NULL,
  `data_student_id` bigint(20) UNSIGNED NOT NULL,
  `list_class_id` bigint(20) UNSIGNED NOT NULL,
  `read_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `response_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `duty_subjects`
--

CREATE TABLE `duty_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `duty_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `duty_submissions`
--

CREATE TABLE `duty_submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `duty_id` bigint(20) UNSIGNED NOT NULL,
  `data_student_id` bigint(20) UNSIGNED NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(11) DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `duty_teacher_messages`
--

CREATE TABLE `duty_teacher_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `duty_id` bigint(20) UNSIGNED NOT NULL,
  `data_teacher_id` bigint(20) UNSIGNED NOT NULL,
  `data_student_id` bigint(20) UNSIGNED NOT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_teacher_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('option','essay','mix') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('public','private') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public',
  `start_time` timestamp NULL DEFAULT NULL,
  `finish_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `duration` int(10) UNSIGNED NOT NULL,
  `total_questions` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `exams`
--

INSERT INTO `exams` (`id`, `data_teacher_id`, `title`, `type`, `status`, `start_time`, `finish_time`, `duration`, `total_questions`, `created_at`, `updated_at`) VALUES
(14, 1, 'PAS 2020/2021', 'essay', 'public', '2020-09-20 12:39:00', '2020-09-20 14:39:00', 120, 2, '2020-09-20 12:38:22', '2020-09-20 12:38:22'),
(17, 1, 'Remidi Indo', 'essay', 'public', '2020-09-21 03:37:00', '2020-09-21 09:37:00', 360, 4, '2020-09-21 03:37:29', '2020-09-21 03:37:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `exam_answers`
--

CREATE TABLE `exam_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `exam_answers`
--

INSERT INTO `exam_answers` (`id`, `question_id`, `answer`, `correct`, `created_at`, `updated_at`) VALUES
(61, 32, 'lorem', 'true', '2020-09-20 12:38:22', '2020-09-20 12:38:22'),
(62, 33, 'ipsum', 'true', '2020-09-20 12:38:22', '2020-09-20 12:38:22'),
(64, 35, 'aldskfj', 'true', '2020-09-21 03:37:29', '2020-09-21 03:37:29'),
(65, 36, 'asdlfkj', 'true', '2020-09-21 03:37:29', '2020-09-21 03:37:29'),
(66, 37, 'asdfasdf', 'true', '2020-09-21 03:37:29', '2020-09-21 03:37:29'),
(67, 38, 'asdfasdfadsf', 'true', '2020-09-21 03:37:29', '2020-09-21 03:37:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `exam_classes`
--

CREATE TABLE `exam_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `list_class_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `exam_classes`
--

INSERT INTO `exam_classes` (`id`, `exam_id`, `list_class_id`, `created_at`, `updated_at`) VALUES
(13, 14, 1, '2020-09-20 12:38:22', '2020-09-20 12:38:22'),
(16, 17, 1, '2020-09-21 03:37:29', '2020-09-21 03:37:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `exam_questions`
--

CREATE TABLE `exam_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('option','essay') COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `exam_questions`
--

INSERT INTO `exam_questions` (`id`, `exam_id`, `type`, `number`, `question`, `score`, `created_at`, `updated_at`) VALUES
(32, 14, 'essay', 1, 'lorem ipsume dolor st ae', 50, '2020-09-20 12:38:22', '2020-09-20 12:38:22'),
(33, 14, 'essay', 2, 'lorem ipsume dolor st ae', 50, '2020-09-20 12:38:22', '2020-09-20 12:38:22'),
(35, 17, 'essay', 1, 'asdflkjasdf', 25, '2020-09-21 03:37:29', '2020-09-21 03:37:29'),
(36, 17, 'essay', 2, 'laksdjflk', 25, '2020-09-21 03:37:29', '2020-09-21 03:37:29'),
(37, 17, 'essay', 3, 'klajsdflkjasldkfjlaksdf', 25, '2020-09-21 03:37:29', '2020-09-21 03:37:29'),
(38, 17, 'essay', 4, 'lkajsdflkjalsdkflasdf', 25, '2020-09-21 03:37:29', '2020-09-21 03:37:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `exam_results`
--

CREATE TABLE `exam_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `data_student_id` bigint(20) UNSIGNED NOT NULL,
  `score` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `exam_results`
--

INSERT INTO `exam_results` (`id`, `exam_id`, `data_student_id`, `score`, `created_at`, `updated_at`) VALUES
(4, 17, 1, 0, '2020-09-21 06:16:09', '2020-09-21 06:16:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `exam_res_ans`
--

CREATE TABLE `exam_res_ans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `result_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('option','essay') COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `essay` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `exam_res_ans`
--

INSERT INTO `exam_res_ans` (`id`, `result_id`, `question_id`, `type`, `answer_id`, `essay`, `score`, `created_at`, `updated_at`) VALUES
(8, 4, 35, 'essay', NULL, 'jawaban nomer 1', 0, '2020-09-21 06:16:09', '2020-09-21 06:16:09'),
(9, 4, 36, 'essay', NULL, 'jawaban nomer 2', 0, '2020-09-21 06:16:10', '2020-09-21 06:16:10'),
(10, 4, 37, 'essay', NULL, 'jawaban nomer 3', 0, '2020-09-21 06:16:10', '2020-09-21 06:16:10'),
(11, 4, 38, 'essay', NULL, 'jawaban nomer 4', 0, '2020-09-21 06:16:10', '2020-09-21 06:16:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `exam_students`
--

CREATE TABLE `exam_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `data_student_id` bigint(20) UNSIGNED NOT NULL,
  `list_class_id` bigint(20) UNSIGNED NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `response_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `exam_students`
--

INSERT INTO `exam_students` (`id`, `exam_id`, `data_student_id`, `list_class_id`, `read_at`, `response_at`, `created_at`, `updated_at`) VALUES
(13, 14, 1, 1, '2020-09-20 12:39:58', NULL, '2020-09-20 12:38:22', '2020-09-20 12:39:58'),
(16, 17, 1, 1, '2020-09-21 03:37:38', NULL, '2020-09-21 03:37:29', '2020-09-21 03:37:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `exam_subjects`
--

CREATE TABLE `exam_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `exam_subjects`
--

INSERT INTO `exam_subjects` (`id`, `exam_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(13, 14, 1, '2020-09-20 12:38:22', '2020-09-20 12:38:22'),
(16, 17, 1, '2020-09-21 03:37:29', '2020-09-21 03:37:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lesson_schedules`
--

CREATE TABLE `lesson_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partner_school_id` bigint(20) UNSIGNED NOT NULL,
  `list_class_id` bigint(20) UNSIGNED NOT NULL,
  `day` enum('senin','selasa','rabu','kamis','jumat','sabtu','minggu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'superadmin', NULL, NULL),
(2, 'school', NULL, NULL),
(3, 'schooladmin', NULL, NULL),
(4, 'teacher', NULL, NULL),
(5, 'student', NULL, NULL),
(6, 'parent', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_classes`
--

CREATE TABLE `list_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partner_school_id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `list_classes`
--

INSERT INTO `list_classes` (`id`, `partner_school_id`, `grade_id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2020-09-06 00:02:23', NULL),
(2, 1, 1, 2, '2020-09-06 00:02:23', NULL),
(3, 1, 1, 3, '2020-09-06 00:02:23', NULL),
(4, 1, 1, 4, '2020-09-06 00:02:23', NULL),
(5, 1, 2, 1, '2020-09-06 00:02:23', NULL),
(6, 1, 2, 2, '2020-09-06 00:02:23', NULL),
(7, 1, 2, 3, '2020-09-06 00:02:23', NULL),
(8, 1, 2, 4, '2020-09-06 00:02:23', NULL),
(9, 1, 3, 1, '2020-09-06 00:02:23', NULL),
(10, 1, 3, 2, '2020-09-06 00:02:23', NULL),
(11, 1, 3, 3, '2020-09-06 00:02:23', NULL),
(12, 1, 3, 4, '2020-09-06 00:02:23', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_subjects`
--

CREATE TABLE `list_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partner_school_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acronym` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `list_subjects`
--

INSERT INTO `list_subjects` (`id`, `partner_school_id`, `subject`, `acronym`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bahasa Indonesia', 'B.Indo', '2020-09-06 00:02:25', NULL),
(2, 1, 'Bahasa Inggris', 'B.Ing', '2020-09-06 00:02:25', NULL),
(3, 1, 'Matematika', 'MTK', '2020-09-06 00:02:25', NULL);

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
(1, '2020_06_20_000001_create_level_users_table', 1),
(2, '2020_06_20_000001_create_users_table', 1),
(3, '2020_06_20_000002_create_password_resets_table', 1),
(4, '2020_06_20_000003_create_partner_schools_table', 1),
(5, '2020_06_20_000004_create_class_grades_table', 1),
(6, '2020_06_20_000004_create_courses_table', 1),
(7, '2020_06_20_000004_create_list_classes_table', 1),
(8, '2020_06_20_000004_create_list_subjects_table', 1),
(9, '2020_06_20_000004_create_subjects_table', 1),
(10, '2020_06_20_000005_create_data_school_admins_table', 1),
(11, '2020_06_20_000005_create_data_students_table', 1),
(12, '2020_06_20_000005_create_data_teachers_table', 1),
(13, '2020_06_20_000005_create_super_admins_table', 1),
(14, '2020_06_20_000006_create_data_parents_table', 1),
(15, '2020_06_20_000006_create_partner_school_statistics_table', 1),
(16, '2020_06_20_000006_create_student_schedules_table', 1),
(17, '2020_06_20_000006_create_teacher_schedules_table', 1),
(18, '2020_06_20_000007_create_partner_school_statistic_data_table', 1),
(19, '2020_06_20_000007_create_student_absents_table', 1),
(20, '2020_06_20_000007_create_teacher_absents_table', 1),
(21, '2020_06_20_000007_create_teacher_classes_table', 1),
(22, '2020_06_20_000007_create_teacher_subjects_table', 1),
(23, '2020_06_20_000008_create_lesson_schedules_table', 1),
(24, '2020_06_20_000009_create_duties_table', 1),
(25, '2020_06_20_000009_create_duty_classes_table', 1),
(26, '2020_06_20_000009_create_duty_students_table', 1),
(27, '2020_06_20_000009_create_theories_table', 1),
(28, '2020_06_20_000010_create_duty_files_table', 1),
(29, '2020_06_20_000010_create_duty_messages_table', 1),
(30, '2020_06_20_000010_create_duty_submissions_table', 1),
(31, '2020_06_20_000010_create_duty_teacher_messages_table', 1),
(32, '2020_06_20_000010_create_theory_classes_table', 1),
(33, '2020_06_20_000010_create_theory_files_table', 1),
(34, '2020_06_20_000010_create_theory_students_table', 1),
(35, '2020_06_20_000011_create_validation_duty_submission_by_teachers_table', 1),
(36, '2020_07_10_103938_create_jobs_table', 1),
(37, '2020_07_10_103945_create_notifications_table', 1),
(38, '2020_07_11_092034_create_theory_messages_table', 1),
(39, '2020_07_11_092141_create_theory_teacher_messages_table', 1),
(40, '2020_07_15_121217_create_contract_payments_table', 1),
(41, '2020_07_23_103310_create_student_storages_table', 1),
(42, '2020_07_23_110725_create_teacher_storages_table', 1),
(43, '2020_07_23_110750_create_school_storages_table', 1),
(44, '2020_07_23_110812_create_total_storages_table', 1),
(45, '2020_07_24_000111_create_cost_by_students_table', 1),
(46, '2020_07_24_000222_create_cost_by_packages_table', 1),
(47, '2020_07_24_111111_create_by_student_payments_table', 1),
(48, '2020_07_24_222222_create_by_package_payments_table', 1),
(49, '2020_07_28_073307_create_proof_of_payments_table', 1),
(50, '2020_07_29_105932_create_chat_messages_table', 1),
(51, '2020_08_02_152804_create_request_partners_table', 1),
(52, '2020_08_02_154148_create_request_packages_table', 1),
(53, '2020_08_02_154236_create_request_students_table', 1),
(54, '2020_08_05_093036_create_cost_by_deals_table', 1),
(55, '2020_08_05_103044_create_by_deal_payments_table', 1),
(56, '2020_08_06_133711_create_statistic_absents_table', 1),
(57, '2020_08_17_213015_create_theory_subjects_table', 1),
(58, '2020_08_19_141936_create_duty_subjects_table', 1),
(59, '2020_08_26_141117_create_app_settings_table', 1),
(60, '2020_09_04_212832_create_tryouts_table', 1),
(61, '2020_09_04_213143_create_tryout_subjects_table', 1),
(62, '2020_09_04_213151_create_tryout_classes_table', 1),
(63, '2020_09_04_213158_create_tryout_questions_table', 1),
(64, '2020_09_04_213205_create_tryout_answers_table', 1),
(65, '2020_09_04_213212_create_tryout_students_table', 1),
(66, '2020_09_04_213220_create_tryout_results_table', 1),
(67, '2020_09_04_213227_create_tryout_res_ans_table', 1),
(68, '2020_09_10_092924_create_exams_table', 2),
(69, '2020_09_10_092934_create_exam_subjects_table', 2),
(70, '2020_09_10_092941_create_exam_classes_table', 2),
(71, '2020_09_10_092947_create_exam_questions_table', 3),
(72, '2020_09_10_092955_create_exam_answers_table', 3),
(73, '2020_09_10_093002_create_exam_students_table', 3),
(74, '2020_09_10_093009_create_exam_results_table', 3),
(75, '2020_09_10_093016_create_exam_res_ans_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0e232515-6c32-4195-b17e-0957b6f9d3a5', 'App\\Notifications\\NotifNewTheory', 'App\\User', 6, '{\"title\":\"Jalur Pemrograman\",\"subject\":\"Matematika\",\"url\":\"\\/student\\/theory\\/6\"}', '2020-09-21 08:19:03', '2020-09-21 07:13:30', '2020-09-21 08:19:03'),
('235041ba-0ebb-4433-9815-0cae1870eea6', 'App\\Notifications\\NotifNewTheory', 'App\\User', 6, '{\"title\":\"Pendidikan\",\"subject\":\"Bahasa Indonesia\",\"url\":\"\\/student\\/theory\\/3\"}', '2020-09-09 02:36:07', '2020-09-08 07:44:39', '2020-09-09 02:36:07'),
('3b8fe859-2f97-44f3-aba4-e91304b7664d', 'App\\Notifications\\NotifNewTheory', 'App\\User', 6, '{\"title\":\"Asking For Opinion\",\"subject\":\"Bahasa Indonesia\",\"url\":\"\\/student\\/theory\\/5\"}', '2020-09-09 02:36:07', '2020-09-08 07:54:23', '2020-09-09 02:36:07'),
('3d9a415d-b35d-4446-9377-26fe0a03a87d', 'App\\Notifications\\NotifNewTheory', 'App\\User', 6, '{\"title\":\"Materi Pertama\",\"subject\":\"Bahasa Indonesia\",\"url\":\"\\/student\\/theory\\/1\"}', '2020-09-08 04:00:47', '2020-09-08 02:27:17', '2020-09-08 04:00:47'),
('ad7d6ba9-653a-47d2-9ed4-efea01081cc2', 'App\\Notifications\\NotifProofPayment', 'App\\User', 1, '{\"title\":\"Konfirmasi Pembayaran\",\"subject\":\"SMP\\/SMK\\/SMA di Indonesia\",\"url\":\"superadmin\\/payment\\/list\\/1\"}', '2020-09-10 08:51:05', '2020-09-06 09:38:53', '2020-09-10 08:51:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `partner_schools`
--

CREATE TABLE `partner_schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'school.png',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `headmaster` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `partner_schools`
--

INSERT INTO `partner_schools` (`id`, `user_id`, `name`, `logo`, `address`, `headmaster`, `phone`, `hp`, `active`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'SMP/SMK/SMA di Indonesia', 'school.png', 'alamat sekolah', 'nama kepala sekolah', '0291 0293812', '028929012', 1, 1, '2020-09-06 00:02:18', '2020-09-06 09:40:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `partner_school_statistics`
--

CREATE TABLE `partner_school_statistics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `value` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `partner_school_statistic_data`
--

CREATE TABLE `partner_school_statistic_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partner_school_id` bigint(20) UNSIGNED NOT NULL,
  `statistic_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Struktur dari tabel `proof_of_payments`
--

CREATE TABLE `proof_of_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partner_school_id` bigint(20) UNSIGNED NOT NULL,
  `contract_id` bigint(20) UNSIGNED NOT NULL,
  `proof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('process','delay','failed','success') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `proof_of_payments`
--

INSERT INTO `proof_of_payments` (`id`, `partner_school_id`, `contract_id`, `proof`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-09-06_1__pEukcReAv1uGvBIRJx8l.JPG', 'success', '2020-09-06 09:38:53', '2020-09-06 09:40:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_packages`
--

CREATE TABLE `request_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `cost_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_partners`
--

CREATE TABLE `request_partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `headmaster` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` enum('bystudent','package') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'package',
  `account` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `contract` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_students`
--

CREATE TABLE `request_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `cost_id` bigint(20) UNSIGNED NOT NULL,
  `total_student` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `school_storages`
--

CREATE TABLE `school_storages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `partner_school_id` bigint(20) UNSIGNED NOT NULL,
  `size_storage` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `school_storages`
--

INSERT INTO `school_storages` (`id`, `day`, `month`, `year`, `partner_school_id`, `size_storage`, `created_at`, `updated_at`) VALUES
(1, 8, 9, 20, 1, 5462, NULL, '2020-09-08 07:54:18'),
(2, 21, 9, 20, 1, 0, NULL, '2020-09-21 07:13:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statistic_absents`
--

CREATE TABLE `statistic_absents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `partner_school_id` bigint(20) UNSIGNED NOT NULL,
  `absent_teacher` int(11) NOT NULL,
  `absent_student` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `statistic_absents`
--

INSERT INTO `statistic_absents` (`id`, `day`, `month`, `year`, `partner_school_id`, `absent_teacher`, `absent_student`, `created_at`, `updated_at`) VALUES
(1, 8, 9, 2020, 1, 33, 0, '2020-09-08 02:25:00', '2020-09-08 02:25:05'),
(2, 9, 9, 2020, 1, 33, 0, '2020-09-09 01:24:41', '2020-09-09 01:24:41'),
(3, 10, 9, 2020, 1, 33, 0, '2020-09-10 01:01:34', '2020-09-10 01:01:34'),
(4, 11, 9, 2020, 1, 33, 0, '2020-09-11 01:04:13', '2020-09-11 01:04:13'),
(5, 16, 9, 2020, 1, 33, 0, '2020-09-16 02:44:12', '2020-09-16 02:44:12'),
(6, 19, 9, 2020, 1, 33, 0, '2020-09-19 00:58:33', '2020-09-19 00:58:33'),
(7, 20, 9, 2020, 1, 33, 0, '2020-09-20 09:52:13', '2020-09-20 09:52:13'),
(8, 21, 9, 2020, 1, 33, 0, '2020-09-21 01:08:57', '2020-09-21 01:08:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `student_absents`
--

CREATE TABLE `student_absents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_schedule_id` bigint(20) UNSIGNED NOT NULL,
  `data_student_id` bigint(20) UNSIGNED NOT NULL,
  `absent` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `student_schedules`
--

CREATE TABLE `student_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partner_school_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `student_storages`
--

CREATE TABLE `student_storages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `data_student_id` bigint(20) UNSIGNED NOT NULL,
  `size_storage` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partner_school_id` bigint(20) UNSIGNED NOT NULL,
  `list_class_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `subjects`
--

INSERT INTO `subjects` (`id`, `partner_school_id`, `list_class_id`, `subject`, `subject_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Bahasa Indonesia', 1, NULL, NULL),
(2, 1, 1, 'Bahasa Inggris', 2, NULL, NULL),
(3, 1, 1, 'Matematika', 3, NULL, NULL),
(4, 1, 5, 'Bahasa Indonesia', 1, NULL, NULL),
(5, 1, 5, 'Bahasa Inggris', 2, NULL, NULL),
(6, 1, 5, 'Matematika', 3, NULL, NULL),
(7, 1, 9, 'Bahasa Indonesia', 1, NULL, NULL),
(8, 1, 9, 'Bahasa Inggris', 2, NULL, NULL),
(9, 1, 9, 'Matematika', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `super_admins`
--

CREATE TABLE `super_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `hp` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'superadmin.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `super_admins`
--

INSERT INTO `super_admins` (`id`, `user_id`, `hp`, `img`, `created_at`, `updated_at`) VALUES
(1, 1, '083108785440', 'superadmin.jpg', '2020-09-06 00:02:16', '2020-09-06 00:02:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teacher_absents`
--

CREATE TABLE `teacher_absents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_schedule_id` bigint(20) UNSIGNED NOT NULL,
  `data_teacher_id` bigint(20) UNSIGNED NOT NULL,
  `absent` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `teacher_absents`
--

INSERT INTO `teacher_absents` (`id`, `teacher_schedule_id`, `data_teacher_id`, `absent`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, '2020-09-08 02:24:59'),
(2, 1, 2, NULL, NULL, NULL),
(3, 1, 3, NULL, NULL, NULL),
(4, 2, 1, 1, NULL, '2020-09-09 01:24:41'),
(5, 2, 2, NULL, NULL, NULL),
(6, 2, 3, NULL, NULL, NULL),
(7, 3, 1, 1, NULL, '2020-09-10 01:01:34'),
(8, 3, 2, NULL, NULL, NULL),
(9, 3, 3, NULL, NULL, NULL),
(10, 4, 1, 1, NULL, '2020-09-11 01:04:13'),
(11, 4, 2, NULL, NULL, NULL),
(12, 4, 3, NULL, NULL, NULL),
(13, 5, 1, NULL, NULL, NULL),
(14, 5, 2, NULL, NULL, NULL),
(15, 5, 3, NULL, NULL, NULL),
(16, 6, 1, NULL, NULL, NULL),
(17, 6, 2, NULL, NULL, NULL),
(18, 6, 3, NULL, NULL, NULL),
(19, 7, 1, NULL, NULL, NULL),
(20, 7, 2, NULL, NULL, NULL),
(21, 7, 3, NULL, NULL, NULL),
(22, 8, 1, NULL, NULL, NULL),
(23, 8, 2, NULL, NULL, NULL),
(24, 8, 3, NULL, NULL, NULL),
(25, 9, 1, 1, NULL, '2020-09-16 02:44:12'),
(26, 9, 2, NULL, NULL, NULL),
(27, 9, 3, NULL, NULL, NULL),
(28, 10, 1, NULL, NULL, NULL),
(29, 10, 2, NULL, NULL, NULL),
(30, 10, 3, NULL, NULL, NULL),
(31, 11, 1, NULL, NULL, NULL),
(32, 11, 2, NULL, NULL, NULL),
(33, 11, 3, NULL, NULL, NULL),
(34, 12, 1, 1, NULL, '2020-09-19 00:58:33'),
(35, 12, 2, NULL, NULL, NULL),
(36, 12, 3, NULL, NULL, NULL),
(37, 13, 1, 1, NULL, '2020-09-20 09:52:13'),
(38, 13, 2, NULL, NULL, NULL),
(39, 13, 3, NULL, NULL, NULL),
(40, 14, 1, 1, NULL, '2020-09-21 01:08:56'),
(41, 14, 2, NULL, NULL, NULL),
(42, 14, 3, NULL, NULL, NULL),
(43, 15, 1, NULL, NULL, NULL),
(44, 15, 2, NULL, NULL, NULL),
(45, 15, 3, NULL, NULL, NULL),
(46, 16, 1, NULL, NULL, NULL),
(47, 16, 2, NULL, NULL, NULL),
(48, 16, 3, NULL, NULL, NULL),
(49, 17, 1, NULL, NULL, NULL),
(50, 17, 2, NULL, NULL, NULL),
(51, 17, 3, NULL, NULL, NULL),
(52, 18, 1, NULL, NULL, NULL),
(53, 18, 2, NULL, NULL, NULL),
(54, 18, 3, NULL, NULL, NULL),
(55, 19, 1, NULL, NULL, NULL),
(56, 19, 2, NULL, NULL, NULL),
(57, 19, 3, NULL, NULL, NULL),
(58, 20, 1, NULL, NULL, NULL),
(59, 20, 2, NULL, NULL, NULL),
(60, 20, 3, NULL, NULL, NULL),
(61, 21, 1, NULL, NULL, NULL),
(62, 21, 2, NULL, NULL, NULL),
(63, 21, 3, NULL, NULL, NULL),
(64, 22, 1, NULL, NULL, NULL),
(65, 22, 2, NULL, NULL, NULL),
(66, 22, 3, NULL, NULL, NULL),
(67, 23, 1, NULL, NULL, NULL),
(68, 23, 2, NULL, NULL, NULL),
(69, 23, 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `teacher_classes`
--

CREATE TABLE `teacher_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_teacher_id` bigint(20) UNSIGNED NOT NULL,
  `list_class_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `teacher_classes`
--

INSERT INTO `teacher_classes` (`id`, `data_teacher_id`, `list_class_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 5, NULL, NULL),
(3, 3, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `teacher_schedules`
--

CREATE TABLE `teacher_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partner_school_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `teacher_schedules`
--

INSERT INTO `teacher_schedules` (`id`, `partner_school_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-09-08', NULL, NULL),
(2, 1, '2020-09-09', NULL, NULL),
(3, 1, '2020-09-10', NULL, NULL),
(4, 1, '2020-09-11', NULL, NULL),
(5, 1, '2020-09-12', NULL, NULL),
(6, 1, '2020-09-13', NULL, NULL),
(7, 1, '2020-09-14', NULL, NULL),
(8, 1, '2020-09-15', NULL, NULL),
(9, 1, '2020-09-16', NULL, NULL),
(10, 1, '2020-09-17', NULL, NULL),
(11, 1, '2020-09-18', NULL, NULL),
(12, 1, '2020-09-19', NULL, NULL),
(13, 1, '2020-09-20', NULL, NULL),
(14, 1, '2020-09-21', NULL, NULL),
(15, 1, '2020-09-22', NULL, NULL),
(16, 1, '2020-09-23', NULL, NULL),
(17, 1, '2020-09-24', NULL, NULL),
(18, 1, '2020-09-25', NULL, NULL),
(19, 1, '2020-09-26', NULL, NULL),
(20, 1, '2020-09-27', NULL, NULL),
(21, 1, '2020-09-28', NULL, NULL),
(22, 1, '2020-09-29', NULL, NULL),
(23, 1, '2020-09-30', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `teacher_storages`
--

CREATE TABLE `teacher_storages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `data_teacher_id` bigint(20) UNSIGNED NOT NULL,
  `size_storage` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `teacher_storages`
--

INSERT INTO `teacher_storages` (`id`, `day`, `month`, `year`, `data_teacher_id`, `size_storage`, `created_at`, `updated_at`) VALUES
(1, 8, 9, 20, 1, 5462, NULL, '2020-09-08 07:54:18'),
(2, 21, 9, 20, 1, 0, NULL, '2020-09-21 07:13:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teacher_subjects`
--

CREATE TABLE `teacher_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_teacher_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `teacher_subjects`
--

INSERT INTO `teacher_subjects` (`id`, `data_teacher_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(4, 2, 2, NULL, NULL),
(5, 2, 5, NULL, NULL),
(6, 2, 8, NULL, NULL),
(7, 3, 3, NULL, NULL),
(8, 3, 6, NULL, NULL),
(9, 3, 9, NULL, NULL),
(10, 1, 2, '2020-09-06 09:43:50', '2020-09-06 09:43:50'),
(11, 1, 3, '2020-09-06 09:43:50', '2020-09-06 09:43:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `theories`
--

CREATE TABLE `theories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_teacher_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `status` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `theories`
--

INSERT INTO `theories` (`id`, `data_teacher_id`, `title`, `description`, `thumbnail`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Materi Pertama', '<p>lorem ipsum dolor sit amet</p>', 'default.jpg', '1', '2020-09-08 02:27:09', '2020-09-08 02:27:09'),
(5, 1, 'Asking For Opinion', '<p>lorem ipsum dolor sit amet</p>', 'default.jpg', '1', '2020-09-08 07:54:18', '2020-09-08 07:54:18'),
(6, 1, 'Jalur Pemrograman', 'lorem ipsum dolro sit amet', 'default.jpg', '1', '2020-09-21 07:13:24', '2020-09-21 07:13:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `theory_classes`
--

CREATE TABLE `theory_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `theory_id` bigint(20) UNSIGNED NOT NULL,
  `list_class_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `theory_classes`
--

INSERT INTO `theory_classes` (`id`, `theory_id`, `list_class_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(3, 5, 1, NULL, NULL),
(4, 6, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `theory_files`
--

CREATE TABLE `theory_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `theory_id` bigint(20) UNSIGNED NOT NULL,
  `type_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `theory_files`
--

INSERT INTO `theory_files` (`id`, `theory_id`, `type_file`, `file`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'document', 'Document_2020-09-08___HqMLi0owrJFqgrKG9LIek2wb3HqZtodmRMs3MnNmRQtfP9FGo5.txt', 'aktivator.txt', NULL, NULL),
(3, 5, 'embed', 'https://www.youtube.com/watch?v=X2EGHJwFadg', NULL, NULL, NULL),
(4, 6, 'embed', 'https://www.youtube.com/watch?v=hxSddfuYQ1k', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `theory_messages`
--

CREATE TABLE `theory_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `theory_id` bigint(20) UNSIGNED NOT NULL,
  `data_student_id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `theory_students`
--

CREATE TABLE `theory_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `theory_id` bigint(20) UNSIGNED NOT NULL,
  `data_student_id` bigint(20) UNSIGNED NOT NULL,
  `list_class_id` bigint(20) UNSIGNED NOT NULL,
  `read_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `theory_students`
--

INSERT INTO `theory_students` (`id`, `theory_id`, `data_student_id`, `list_class_id`, `read_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2020-09-21 15:08:51', NULL, '2020-09-21 08:08:51'),
(3, 5, 1, 1, '2020-09-21 15:07:29', NULL, '2020-09-21 08:07:29'),
(4, 6, 1, 1, '2020-09-21 15:07:34', NULL, '2020-09-21 08:07:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `theory_subjects`
--

CREATE TABLE `theory_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `theory_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `theory_subjects`
--

INSERT INTO `theory_subjects` (`id`, `theory_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(3, 5, 1, NULL, NULL),
(4, 6, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `theory_teacher_messages`
--

CREATE TABLE `theory_teacher_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `theory_id` bigint(20) UNSIGNED NOT NULL,
  `data_teacher_id` bigint(20) UNSIGNED NOT NULL,
  `data_student_id` bigint(20) UNSIGNED NOT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `total_storages`
--

CREATE TABLE `total_storages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `size_storage` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `total_storages`
--

INSERT INTO `total_storages` (`id`, `day`, `month`, `year`, `size_storage`, `created_at`, `updated_at`) VALUES
(1, 8, 9, 20, 5462, NULL, '2020-09-08 07:54:18'),
(2, 21, 9, 20, 0, NULL, '2020-09-21 07:13:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tryouts`
--

CREATE TABLE `tryouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_teacher_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('option','essay','mix') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `duration` int(10) UNSIGNED NOT NULL,
  `total_questions` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tryouts`
--

INSERT INTO `tryouts` (`id`, `data_teacher_id`, `title`, `type`, `deadline`, `duration`, `total_questions`, `created_at`, `updated_at`) VALUES
(3, 1, 'Tenses', 'essay', '2020-09-10 03:11:20', 40, 4, '2020-09-09 03:11:20', '2020-09-09 03:11:20'),
(4, 1, 'Cerpen', 'essay', '2020-09-10 06:00:51', 30, 3, '2020-09-09 06:00:51', '2020-09-09 06:00:51'),
(5, 1, 'Lamaran Kerja', 'mix', '2020-09-10 14:44:36', 40, 2, '2020-09-09 14:44:36', '2020-09-09 14:44:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tryout_answers`
--

CREATE TABLE `tryout_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tryout_answers`
--

INSERT INTO `tryout_answers` (`id`, `question_id`, `answer`, `correct`, `created_at`, `updated_at`) VALUES
(62, 13, 'Went', 'true', '2020-09-09 03:11:20', '2020-09-09 03:11:20'),
(63, 14, 'Lived', 'true', '2020-09-09 03:11:20', '2020-09-09 03:11:20'),
(64, 15, 'Swam', 'true', '2020-09-09 03:11:20', '2020-09-09 03:11:20'),
(65, 16, 'Came', 'true', '2020-09-09 03:11:20', '2020-09-09 03:11:20'),
(66, 17, 'lorem', 'true', '2020-09-09 06:00:52', '2020-09-09 06:00:52'),
(67, 18, 'ipsum', 'true', '2020-09-09 06:00:52', '2020-09-09 06:00:52'),
(68, 19, 'dolor', 'true', '2020-09-09 06:00:52', '2020-09-09 06:00:52'),
(69, 20, 'lorem', 'true', '2020-09-09 14:44:36', '2020-09-09 14:44:36'),
(70, 20, 'ipsum', 'false', '2020-09-09 14:44:36', '2020-09-09 14:44:36'),
(71, 20, 'dolor', 'false', '2020-09-09 14:44:36', '2020-09-09 14:44:36'),
(72, 21, 'where counter', 'true', '2020-09-09 14:44:36', '2020-09-09 14:44:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tryout_classes`
--

CREATE TABLE `tryout_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tryout_id` bigint(20) UNSIGNED NOT NULL,
  `list_class_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tryout_classes`
--

INSERT INTO `tryout_classes` (`id`, `tryout_id`, `list_class_id`, `created_at`, `updated_at`) VALUES
(3, 3, 1, '2020-09-09 03:11:20', '2020-09-09 03:11:20'),
(4, 4, 1, '2020-09-09 06:00:52', '2020-09-09 06:00:52'),
(5, 5, 1, '2020-09-09 14:44:37', '2020-09-09 14:44:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tryout_questions`
--

CREATE TABLE `tryout_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tryout_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('option','essay') COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tryout_questions`
--

INSERT INTO `tryout_questions` (`id`, `tryout_id`, `type`, `number`, `question`, `score`, `created_at`, `updated_at`) VALUES
(13, 3, 'essay', 1, 'The crocodile … hungry', 30, '2020-09-09 03:11:20', '2020-09-09 03:11:20'),
(14, 3, 'essay', 2, 'He … the gold in the box', 30, '2020-09-09 03:11:20', '2020-09-09 03:11:20'),
(15, 3, 'essay', 3, 'My father … to his office this morning', 20, '2020-09-09 03:11:20', '2020-09-09 03:11:20'),
(16, 3, 'essay', 4, 'The queen … in the jungle', 20, '2020-09-09 03:11:20', '2020-09-09 03:11:20'),
(17, 4, 'essay', 1, 'lorem ipsum dolor st amet', 30, '2020-09-09 06:00:52', '2020-09-09 06:00:52'),
(18, 4, 'essay', 2, 'lorem ipsume', 30, '2020-09-09 06:00:52', '2020-09-09 06:00:52'),
(19, 4, 'essay', 3, 'lorem ipsum dolor', 40, '2020-09-09 06:00:52', '2020-09-09 06:00:52'),
(20, 5, 'option', 1, 'lorem sip edolo t asl', 40, '2020-09-09 14:44:36', '2020-09-09 14:44:36'),
(21, 5, 'essay', 2, 'llasdkf asdlkjlasdf asdlfkasdf', 60, '2020-09-09 14:44:36', '2020-09-09 14:44:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tryout_results`
--

CREATE TABLE `tryout_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tryout_id` bigint(20) UNSIGNED NOT NULL,
  `data_student_id` bigint(20) UNSIGNED NOT NULL,
  `score` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tryout_results`
--

INSERT INTO `tryout_results` (`id`, `tryout_id`, `data_student_id`, `score`, `created_at`, `updated_at`) VALUES
(14, 3, 1, 44, '2020-09-09 04:29:36', '2020-09-09 07:51:59'),
(17, 4, 1, 95, '2020-09-09 06:11:37', '2020-09-09 14:34:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tryout_res_ans`
--

CREATE TABLE `tryout_res_ans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `result_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('option','essay') COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `essay` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tryout_res_ans`
--

INSERT INTO `tryout_res_ans` (`id`, `result_id`, `question_id`, `type`, `answer_id`, `essay`, `score`, `created_at`, `updated_at`) VALUES
(25, 14, 13, 'essay', NULL, 'sleep', 12, '2020-09-09 04:29:36', '2020-09-09 07:51:59'),
(26, 14, 14, 'essay', NULL, 'sleep', 12, '2020-09-09 04:29:36', '2020-09-09 07:51:59'),
(27, 14, 15, 'essay', NULL, 'sleep', 10, '2020-09-09 04:29:36', '2020-09-09 07:51:59'),
(28, 14, 16, 'essay', NULL, 'sleep', 10, '2020-09-09 04:29:36', '2020-09-09 07:51:59'),
(35, 17, 17, 'essay', NULL, 'lorem', 30, '2020-09-09 06:11:37', '2020-09-09 14:34:37'),
(36, 17, 18, 'essay', NULL, 'ipsume', 25, '2020-09-09 06:11:37', '2020-09-09 14:34:37'),
(37, 17, 19, 'essay', NULL, 'dolor', 40, '2020-09-09 06:11:37', '2020-09-09 14:34:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tryout_students`
--

CREATE TABLE `tryout_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tryout_id` bigint(20) UNSIGNED NOT NULL,
  `data_student_id` bigint(20) UNSIGNED NOT NULL,
  `list_class_id` bigint(20) UNSIGNED NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `response_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tryout_students`
--

INSERT INTO `tryout_students` (`id`, `tryout_id`, `data_student_id`, `list_class_id`, `read_at`, `response_at`, `created_at`, `updated_at`) VALUES
(3, 3, 1, 1, '2020-09-09 03:12:44', NULL, '2020-09-09 03:11:20', '2020-09-09 03:12:44'),
(4, 4, 1, 1, '2020-09-09 06:03:15', NULL, '2020-09-09 06:00:52', '2020-09-09 06:03:15'),
(5, 5, 1, 1, '2020-09-09 14:46:25', NULL, '2020-09-09 14:44:37', '2020-09-09 14:46:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tryout_subjects`
--

CREATE TABLE `tryout_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tryout_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tryout_subjects`
--

INSERT INTO `tryout_subjects` (`id`, `tryout_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(3, 3, 2, '2020-09-09 03:11:20', '2020-09-09 03:11:20'),
(4, 4, 1, '2020-09-09 06:00:52', '2020-09-09 06:00:52'),
(5, 5, 1, '2020-09-09 14:44:37', '2020-09-09 14:44:37');

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
  `level_user_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level_user_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'superadmin@gmail.com', '2020-09-06 00:02:16', '$2y$10$EQxlkOVocp49U5lt.3VxTO7ruFGoRKW/z8PXOiX1/rmAcY42uaBa6', 1, NULL, '2020-09-06 00:02:16', '2020-09-06 00:02:16'),
(2, 'SMP/SMK/SMA di Indonesia', 'sekolah@gmail.com', '2020-09-06 00:02:18', '$2y$10$CdxZDiK2DJRQKOnmzvc8Ee31MLA.fqL1pm7OUbAOIWToW/iNosb06', 2, NULL, '2020-09-06 00:02:18', '2020-09-06 00:02:18'),
(3, 'Ahmad Jaelani S.Pd', 'guru1@gmail.com', '2020-09-06 00:02:20', '$2y$10$Yttr1GWbYIKne53N9G1xJOz5cEn6ZZviMgBBiMS4or.9whRNbY5vC', 4, NULL, '2020-09-06 00:02:14', NULL),
(4, 'Wildan Nurohman S.Pd', 'guru2@gmail.com', '2020-09-06 00:02:20', '$2y$10$F0WeyGl4weOLSEjxZBKVYuicG.LvrNteCvZ1YZ9j7/.FpudnfAmri', 4, NULL, '2020-09-06 00:02:14', NULL),
(5, 'Dini Mulia S.Pd', 'guru3@gmail.com', '2020-09-06 00:02:20', '$2y$10$63gpvZfFZjTyWysswBTCkOYlR4xJYlsdyioATXZvjmdyCLldmCL9W', 4, NULL, '2020-09-06 00:02:14', NULL),
(6, 'siswa', 'siswa10@gmail.com', '2020-09-06 00:02:27', '$2y$10$las1csjFcU.ReHe/lmKxi.5OBCHnUJcHzSRkpcRw0D3xzhqxRbv4e', 5, NULL, '2020-09-06 00:02:14', NULL),
(7, 'siswa', 'siswa11@gmail.com', '2020-09-06 00:02:27', '$2y$10$LpiG4MeVlfAJdwO/WQkptuQBuBB1ksr4ahJgh0hwXpXPeCeYfucwq', 5, NULL, '2020-09-06 00:02:14', NULL),
(8, 'siswa', 'siswa12@gmail.com', '2020-09-06 00:02:27', '$2y$10$5WHExjg8UKTr7oTUyMgFSu1OLnJbD1yGlJJFblSNvlx4MXXl7nkTO', 5, NULL, '2020-09-06 00:02:14', NULL),
(9, 'Sudiro P', 'orangtua1@gmail.com', '2020-09-06 00:02:29', '$2y$10$hlkcTqs2tzJzb/5UPp6ha.IeiRLTJ7xu.qZ9t651a191gRp9v.5v6', 6, NULL, '2020-09-06 00:02:29', NULL),
(10, 'Sukanto', 'orangtua2@gmail.com', '2020-09-06 00:02:29', '$2y$10$..UUaBeZQYPq3m/83zh/nOM4PYEwIhST8wLMvE3Kkx6.Q73v.cAGu', 6, NULL, '2020-09-06 00:02:29', NULL),
(11, 'Orang Tua', 'orangtua3@gmail.com', '2020-09-06 00:02:29', '$2y$10$8IrMQorvVCfEa9RI2QW8p.T5kUQ2yIUxhM5fN.VNO/vNs3STmYCK2', 6, NULL, '2020-09-06 00:02:29', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `validation_duty_submission_by_teachers`
--

CREATE TABLE `validation_duty_submission_by_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `submission_id` bigint(20) UNSIGNED NOT NULL,
  `data_teacher_id` bigint(20) UNSIGNED NOT NULL,
  `validation` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `by_deal_payments`
--
ALTER TABLE `by_deal_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `by_deal_payments_payment_id_foreign` (`payment_id`),
  ADD KEY `by_deal_payments_cost_id_foreign` (`cost_id`);

--
-- Indeks untuk tabel `by_package_payments`
--
ALTER TABLE `by_package_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `by_package_payments_payment_id_foreign` (`payment_id`),
  ADD KEY `by_package_payments_cost_id_foreign` (`cost_id`);

--
-- Indeks untuk tabel `by_student_payments`
--
ALTER TABLE `by_student_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `by_student_payments_payment_id_foreign` (`payment_id`),
  ADD KEY `by_student_payments_cost_id_foreign` (`cost_id`);

--
-- Indeks untuk tabel `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `class_grades`
--
ALTER TABLE `class_grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_grades_partner_school_id_foreign` (`partner_school_id`);

--
-- Indeks untuk tabel `contract_payments`
--
ALTER TABLE `contract_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_payments_partner_school_id_foreign` (`partner_school_id`);

--
-- Indeks untuk tabel `cost_by_deals`
--
ALTER TABLE `cost_by_deals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cost_by_packages`
--
ALTER TABLE `cost_by_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cost_by_students`
--
ALTER TABLE `cost_by_students`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_partner_school_id_foreign` (`partner_school_id`);

--
-- Indeks untuk tabel `data_parents`
--
ALTER TABLE `data_parents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_parents_user_id_foreign` (`user_id`),
  ADD KEY `data_parents_partner_school_id_foreign` (`partner_school_id`),
  ADD KEY `data_parents_student_id_foreign` (`student_id`);

--
-- Indeks untuk tabel `data_school_admins`
--
ALTER TABLE `data_school_admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_school_admins_user_id_foreign` (`user_id`),
  ADD KEY `data_school_admins_partner_school_id_foreign` (`partner_school_id`);

--
-- Indeks untuk tabel `data_students`
--
ALTER TABLE `data_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_students_user_id_foreign` (`user_id`),
  ADD KEY `data_students_partner_school_id_foreign` (`partner_school_id`),
  ADD KEY `data_students_list_class_id_foreign` (`list_class_id`);

--
-- Indeks untuk tabel `data_teachers`
--
ALTER TABLE `data_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_teachers_user_id_foreign` (`user_id`),
  ADD KEY `data_teachers_partner_school_id_foreign` (`partner_school_id`);

--
-- Indeks untuk tabel `duties`
--
ALTER TABLE `duties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `duties_data_teacher_id_foreign` (`data_teacher_id`);

--
-- Indeks untuk tabel `duty_classes`
--
ALTER TABLE `duty_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `duty_classes_duty_id_foreign` (`duty_id`),
  ADD KEY `duty_classes_list_class_id_foreign` (`list_class_id`);

--
-- Indeks untuk tabel `duty_files`
--
ALTER TABLE `duty_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `duty_files_duty_id_foreign` (`duty_id`);

--
-- Indeks untuk tabel `duty_messages`
--
ALTER TABLE `duty_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `duty_messages_duty_id_foreign` (`duty_id`),
  ADD KEY `duty_messages_data_student_id_foreign` (`data_student_id`);

--
-- Indeks untuk tabel `duty_students`
--
ALTER TABLE `duty_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `duty_students_duty_id_foreign` (`duty_id`),
  ADD KEY `duty_students_data_student_id_foreign` (`data_student_id`),
  ADD KEY `duty_students_list_class_id_foreign` (`list_class_id`);

--
-- Indeks untuk tabel `duty_subjects`
--
ALTER TABLE `duty_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `duty_subjects_duty_id_foreign` (`duty_id`),
  ADD KEY `duty_subjects_subject_id_foreign` (`subject_id`);

--
-- Indeks untuk tabel `duty_submissions`
--
ALTER TABLE `duty_submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `duty_submissions_duty_id_foreign` (`duty_id`),
  ADD KEY `duty_submissions_data_student_id_foreign` (`data_student_id`);

--
-- Indeks untuk tabel `duty_teacher_messages`
--
ALTER TABLE `duty_teacher_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `duty_teacher_messages_duty_id_foreign` (`duty_id`),
  ADD KEY `duty_teacher_messages_data_teacher_id_foreign` (`data_teacher_id`),
  ADD KEY `duty_teacher_messages_data_student_id_foreign` (`data_student_id`);

--
-- Indeks untuk tabel `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exams_data_teacher_id_foreign` (`data_teacher_id`);

--
-- Indeks untuk tabel `exam_answers`
--
ALTER TABLE `exam_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_answers_question_id_foreign` (`question_id`);

--
-- Indeks untuk tabel `exam_classes`
--
ALTER TABLE `exam_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_classes_exam_id_foreign` (`exam_id`),
  ADD KEY `exam_classes_list_class_id_foreign` (`list_class_id`);

--
-- Indeks untuk tabel `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_questions_exam_id_foreign` (`exam_id`);

--
-- Indeks untuk tabel `exam_results`
--
ALTER TABLE `exam_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_results_exam_id_foreign` (`exam_id`),
  ADD KEY `exam_results_data_student_id_foreign` (`data_student_id`);

--
-- Indeks untuk tabel `exam_res_ans`
--
ALTER TABLE `exam_res_ans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_res_ans_result_id_foreign` (`result_id`),
  ADD KEY `exam_res_ans_question_id_foreign` (`question_id`);

--
-- Indeks untuk tabel `exam_students`
--
ALTER TABLE `exam_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_students_exam_id_foreign` (`exam_id`),
  ADD KEY `exam_students_data_student_id_foreign` (`data_student_id`),
  ADD KEY `exam_students_list_class_id_foreign` (`list_class_id`);

--
-- Indeks untuk tabel `exam_subjects`
--
ALTER TABLE `exam_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_subjects_exam_id_foreign` (`exam_id`),
  ADD KEY `exam_subjects_subject_id_foreign` (`subject_id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `lesson_schedules`
--
ALTER TABLE `lesson_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_schedules_partner_school_id_foreign` (`partner_school_id`),
  ADD KEY `lesson_schedules_list_class_id_foreign` (`list_class_id`),
  ADD KEY `lesson_schedules_subject_id_foreign` (`subject_id`);

--
-- Indeks untuk tabel `level_users`
--
ALTER TABLE `level_users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `list_classes`
--
ALTER TABLE `list_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `list_classes_partner_school_id_foreign` (`partner_school_id`),
  ADD KEY `list_classes_grade_id_foreign` (`grade_id`),
  ADD KEY `list_classes_course_id_foreign` (`course_id`);

--
-- Indeks untuk tabel `list_subjects`
--
ALTER TABLE `list_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `list_subjects_partner_school_id_foreign` (`partner_school_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indeks untuk tabel `partner_schools`
--
ALTER TABLE `partner_schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partner_schools_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `partner_school_statistics`
--
ALTER TABLE `partner_school_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `partner_school_statistic_data`
--
ALTER TABLE `partner_school_statistic_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partner_school_statistic_data_partner_school_id_foreign` (`partner_school_id`),
  ADD KEY `partner_school_statistic_data_statistic_id_foreign` (`statistic_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `proof_of_payments`
--
ALTER TABLE `proof_of_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proof_of_payments_partner_school_id_foreign` (`partner_school_id`),
  ADD KEY `proof_of_payments_contract_id_foreign` (`contract_id`);

--
-- Indeks untuk tabel `request_packages`
--
ALTER TABLE `request_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_packages_request_id_foreign` (`request_id`),
  ADD KEY `request_packages_cost_id_foreign` (`cost_id`);

--
-- Indeks untuk tabel `request_partners`
--
ALTER TABLE `request_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `request_students`
--
ALTER TABLE `request_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_students_request_id_foreign` (`request_id`),
  ADD KEY `request_students_cost_id_foreign` (`cost_id`);

--
-- Indeks untuk tabel `school_storages`
--
ALTER TABLE `school_storages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_storages_partner_school_id_foreign` (`partner_school_id`);

--
-- Indeks untuk tabel `statistic_absents`
--
ALTER TABLE `statistic_absents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statistic_absents_partner_school_id_foreign` (`partner_school_id`);

--
-- Indeks untuk tabel `student_absents`
--
ALTER TABLE `student_absents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_absents_student_schedule_id_foreign` (`student_schedule_id`),
  ADD KEY `student_absents_data_student_id_foreign` (`data_student_id`);

--
-- Indeks untuk tabel `student_schedules`
--
ALTER TABLE `student_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_schedules_partner_school_id_foreign` (`partner_school_id`);

--
-- Indeks untuk tabel `student_storages`
--
ALTER TABLE `student_storages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_storages_data_student_id_foreign` (`data_student_id`);

--
-- Indeks untuk tabel `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_partner_school_id_foreign` (`partner_school_id`),
  ADD KEY `subjects_list_class_id_foreign` (`list_class_id`),
  ADD KEY `subjects_subject_id_foreign` (`subject_id`);

--
-- Indeks untuk tabel `super_admins`
--
ALTER TABLE `super_admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `super_admins_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `teacher_absents`
--
ALTER TABLE `teacher_absents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_absents_teacher_schedule_id_foreign` (`teacher_schedule_id`),
  ADD KEY `teacher_absents_data_teacher_id_foreign` (`data_teacher_id`);

--
-- Indeks untuk tabel `teacher_classes`
--
ALTER TABLE `teacher_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_classes_data_teacher_id_foreign` (`data_teacher_id`),
  ADD KEY `teacher_classes_list_class_id_foreign` (`list_class_id`);

--
-- Indeks untuk tabel `teacher_schedules`
--
ALTER TABLE `teacher_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_schedules_partner_school_id_foreign` (`partner_school_id`);

--
-- Indeks untuk tabel `teacher_storages`
--
ALTER TABLE `teacher_storages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_storages_data_teacher_id_foreign` (`data_teacher_id`);

--
-- Indeks untuk tabel `teacher_subjects`
--
ALTER TABLE `teacher_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_subjects_data_teacher_id_foreign` (`data_teacher_id`),
  ADD KEY `teacher_subjects_subject_id_foreign` (`subject_id`);

--
-- Indeks untuk tabel `theories`
--
ALTER TABLE `theories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theories_data_teacher_id_index` (`data_teacher_id`);

--
-- Indeks untuk tabel `theory_classes`
--
ALTER TABLE `theory_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theory_classes_theory_id_foreign` (`theory_id`),
  ADD KEY `theory_classes_list_class_id_foreign` (`list_class_id`);

--
-- Indeks untuk tabel `theory_files`
--
ALTER TABLE `theory_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theory_files_theory_id_foreign` (`theory_id`);

--
-- Indeks untuk tabel `theory_messages`
--
ALTER TABLE `theory_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theory_messages_theory_id_foreign` (`theory_id`),
  ADD KEY `theory_messages_data_student_id_foreign` (`data_student_id`);

--
-- Indeks untuk tabel `theory_students`
--
ALTER TABLE `theory_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theory_students_theory_id_foreign` (`theory_id`),
  ADD KEY `theory_students_data_student_id_foreign` (`data_student_id`),
  ADD KEY `theory_students_list_class_id_foreign` (`list_class_id`);

--
-- Indeks untuk tabel `theory_subjects`
--
ALTER TABLE `theory_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theory_subjects_theory_id_foreign` (`theory_id`),
  ADD KEY `theory_subjects_subject_id_foreign` (`subject_id`);

--
-- Indeks untuk tabel `theory_teacher_messages`
--
ALTER TABLE `theory_teacher_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theory_teacher_messages_theory_id_foreign` (`theory_id`),
  ADD KEY `theory_teacher_messages_data_teacher_id_foreign` (`data_teacher_id`),
  ADD KEY `theory_teacher_messages_data_student_id_foreign` (`data_student_id`);

--
-- Indeks untuk tabel `total_storages`
--
ALTER TABLE `total_storages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tryouts`
--
ALTER TABLE `tryouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tryouts_data_teacher_id_foreign` (`data_teacher_id`);

--
-- Indeks untuk tabel `tryout_answers`
--
ALTER TABLE `tryout_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tryout_answers_question_id_foreign` (`question_id`);

--
-- Indeks untuk tabel `tryout_classes`
--
ALTER TABLE `tryout_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tryout_classes_tryout_id_foreign` (`tryout_id`),
  ADD KEY `tryout_classes_list_class_id_foreign` (`list_class_id`);

--
-- Indeks untuk tabel `tryout_questions`
--
ALTER TABLE `tryout_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tryout_questions_tryout_id_foreign` (`tryout_id`);

--
-- Indeks untuk tabel `tryout_results`
--
ALTER TABLE `tryout_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tryout_results_tryout_id_foreign` (`tryout_id`),
  ADD KEY `tryout_results_data_student_id_foreign` (`data_student_id`);

--
-- Indeks untuk tabel `tryout_res_ans`
--
ALTER TABLE `tryout_res_ans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tryout_res_ans_result_id_foreign` (`result_id`),
  ADD KEY `tryout_res_ans_question_id_foreign` (`question_id`);

--
-- Indeks untuk tabel `tryout_students`
--
ALTER TABLE `tryout_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tryout_students_tryout_id_foreign` (`tryout_id`),
  ADD KEY `tryout_students_data_student_id_foreign` (`data_student_id`),
  ADD KEY `tryout_students_list_class_id_foreign` (`list_class_id`);

--
-- Indeks untuk tabel `tryout_subjects`
--
ALTER TABLE `tryout_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tryout_subjects_tryout_id_foreign` (`tryout_id`),
  ADD KEY `tryout_subjects_subject_id_foreign` (`subject_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_level_user_id_index` (`level_user_id`);

--
-- Indeks untuk tabel `validation_duty_submission_by_teachers`
--
ALTER TABLE `validation_duty_submission_by_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `validation_duty_submission_by_teachers_submission_id_foreign` (`submission_id`),
  ADD KEY `validation_duty_submission_by_teachers_data_teacher_id_foreign` (`data_teacher_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `by_deal_payments`
--
ALTER TABLE `by_deal_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `by_package_payments`
--
ALTER TABLE `by_package_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `by_student_payments`
--
ALTER TABLE `by_student_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `class_grades`
--
ALTER TABLE `class_grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `contract_payments`
--
ALTER TABLE `contract_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `cost_by_deals`
--
ALTER TABLE `cost_by_deals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cost_by_packages`
--
ALTER TABLE `cost_by_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `cost_by_students`
--
ALTER TABLE `cost_by_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_parents`
--
ALTER TABLE `data_parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_school_admins`
--
ALTER TABLE `data_school_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_students`
--
ALTER TABLE `data_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_teachers`
--
ALTER TABLE `data_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `duties`
--
ALTER TABLE `duties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `duty_classes`
--
ALTER TABLE `duty_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `duty_files`
--
ALTER TABLE `duty_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `duty_messages`
--
ALTER TABLE `duty_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `duty_students`
--
ALTER TABLE `duty_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `duty_subjects`
--
ALTER TABLE `duty_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `duty_submissions`
--
ALTER TABLE `duty_submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `duty_teacher_messages`
--
ALTER TABLE `duty_teacher_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `exam_answers`
--
ALTER TABLE `exam_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `exam_classes`
--
ALTER TABLE `exam_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `exam_questions`
--
ALTER TABLE `exam_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `exam_results`
--
ALTER TABLE `exam_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `exam_res_ans`
--
ALTER TABLE `exam_res_ans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `exam_students`
--
ALTER TABLE `exam_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `exam_subjects`
--
ALTER TABLE `exam_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lesson_schedules`
--
ALTER TABLE `lesson_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `level_users`
--
ALTER TABLE `level_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `list_classes`
--
ALTER TABLE `list_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `list_subjects`
--
ALTER TABLE `list_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `partner_schools`
--
ALTER TABLE `partner_schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `partner_school_statistics`
--
ALTER TABLE `partner_school_statistics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `partner_school_statistic_data`
--
ALTER TABLE `partner_school_statistic_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `proof_of_payments`
--
ALTER TABLE `proof_of_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `request_packages`
--
ALTER TABLE `request_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `request_partners`
--
ALTER TABLE `request_partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `request_students`
--
ALTER TABLE `request_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `school_storages`
--
ALTER TABLE `school_storages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `statistic_absents`
--
ALTER TABLE `statistic_absents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `student_absents`
--
ALTER TABLE `student_absents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `student_schedules`
--
ALTER TABLE `student_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `student_storages`
--
ALTER TABLE `student_storages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `super_admins`
--
ALTER TABLE `super_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `teacher_absents`
--
ALTER TABLE `teacher_absents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `teacher_classes`
--
ALTER TABLE `teacher_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `teacher_schedules`
--
ALTER TABLE `teacher_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `teacher_storages`
--
ALTER TABLE `teacher_storages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `teacher_subjects`
--
ALTER TABLE `teacher_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `theories`
--
ALTER TABLE `theories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `theory_classes`
--
ALTER TABLE `theory_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `theory_files`
--
ALTER TABLE `theory_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `theory_messages`
--
ALTER TABLE `theory_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `theory_students`
--
ALTER TABLE `theory_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `theory_subjects`
--
ALTER TABLE `theory_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `theory_teacher_messages`
--
ALTER TABLE `theory_teacher_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `total_storages`
--
ALTER TABLE `total_storages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tryouts`
--
ALTER TABLE `tryouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tryout_answers`
--
ALTER TABLE `tryout_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `tryout_classes`
--
ALTER TABLE `tryout_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tryout_questions`
--
ALTER TABLE `tryout_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tryout_results`
--
ALTER TABLE `tryout_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tryout_res_ans`
--
ALTER TABLE `tryout_res_ans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `tryout_students`
--
ALTER TABLE `tryout_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tryout_subjects`
--
ALTER TABLE `tryout_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `validation_duty_submission_by_teachers`
--
ALTER TABLE `validation_duty_submission_by_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `by_deal_payments`
--
ALTER TABLE `by_deal_payments`
  ADD CONSTRAINT `by_deal_payments_cost_id_foreign` FOREIGN KEY (`cost_id`) REFERENCES `cost_by_deals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `by_deal_payments_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `contract_payments` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `by_package_payments`
--
ALTER TABLE `by_package_payments`
  ADD CONSTRAINT `by_package_payments_cost_id_foreign` FOREIGN KEY (`cost_id`) REFERENCES `cost_by_packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `by_package_payments_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `contract_payments` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `by_student_payments`
--
ALTER TABLE `by_student_payments`
  ADD CONSTRAINT `by_student_payments_cost_id_foreign` FOREIGN KEY (`cost_id`) REFERENCES `cost_by_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `by_student_payments_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `contract_payments` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `class_grades`
--
ALTER TABLE `class_grades`
  ADD CONSTRAINT `class_grades_partner_school_id_foreign` FOREIGN KEY (`partner_school_id`) REFERENCES `partner_schools` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `contract_payments`
--
ALTER TABLE `contract_payments`
  ADD CONSTRAINT `contract_payments_partner_school_id_foreign` FOREIGN KEY (`partner_school_id`) REFERENCES `partner_schools` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_partner_school_id_foreign` FOREIGN KEY (`partner_school_id`) REFERENCES `partner_schools` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_parents`
--
ALTER TABLE `data_parents`
  ADD CONSTRAINT `data_parents_partner_school_id_foreign` FOREIGN KEY (`partner_school_id`) REFERENCES `partner_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_parents_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `data_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_parents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_school_admins`
--
ALTER TABLE `data_school_admins`
  ADD CONSTRAINT `data_school_admins_partner_school_id_foreign` FOREIGN KEY (`partner_school_id`) REFERENCES `partner_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_school_admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_students`
--
ALTER TABLE `data_students`
  ADD CONSTRAINT `data_students_list_class_id_foreign` FOREIGN KEY (`list_class_id`) REFERENCES `list_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_students_partner_school_id_foreign` FOREIGN KEY (`partner_school_id`) REFERENCES `partner_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_teachers`
--
ALTER TABLE `data_teachers`
  ADD CONSTRAINT `data_teachers_partner_school_id_foreign` FOREIGN KEY (`partner_school_id`) REFERENCES `partner_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `duties`
--
ALTER TABLE `duties`
  ADD CONSTRAINT `duties_data_teacher_id_foreign` FOREIGN KEY (`data_teacher_id`) REFERENCES `data_teachers` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `duty_classes`
--
ALTER TABLE `duty_classes`
  ADD CONSTRAINT `duty_classes_duty_id_foreign` FOREIGN KEY (`duty_id`) REFERENCES `duties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `duty_classes_list_class_id_foreign` FOREIGN KEY (`list_class_id`) REFERENCES `list_classes` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `duty_files`
--
ALTER TABLE `duty_files`
  ADD CONSTRAINT `duty_files_duty_id_foreign` FOREIGN KEY (`duty_id`) REFERENCES `duties` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `duty_messages`
--
ALTER TABLE `duty_messages`
  ADD CONSTRAINT `duty_messages_data_student_id_foreign` FOREIGN KEY (`data_student_id`) REFERENCES `data_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `duty_messages_duty_id_foreign` FOREIGN KEY (`duty_id`) REFERENCES `duties` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `duty_students`
--
ALTER TABLE `duty_students`
  ADD CONSTRAINT `duty_students_data_student_id_foreign` FOREIGN KEY (`data_student_id`) REFERENCES `data_students` (`id`),
  ADD CONSTRAINT `duty_students_duty_id_foreign` FOREIGN KEY (`duty_id`) REFERENCES `duties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `duty_students_list_class_id_foreign` FOREIGN KEY (`list_class_id`) REFERENCES `list_classes` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `duty_subjects`
--
ALTER TABLE `duty_subjects`
  ADD CONSTRAINT `duty_subjects_duty_id_foreign` FOREIGN KEY (`duty_id`) REFERENCES `duties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `duty_subjects_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `duty_submissions`
--
ALTER TABLE `duty_submissions`
  ADD CONSTRAINT `duty_submissions_data_student_id_foreign` FOREIGN KEY (`data_student_id`) REFERENCES `data_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `duty_submissions_duty_id_foreign` FOREIGN KEY (`duty_id`) REFERENCES `duties` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `duty_teacher_messages`
--
ALTER TABLE `duty_teacher_messages`
  ADD CONSTRAINT `duty_teacher_messages_data_student_id_foreign` FOREIGN KEY (`data_student_id`) REFERENCES `data_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `duty_teacher_messages_data_teacher_id_foreign` FOREIGN KEY (`data_teacher_id`) REFERENCES `data_teachers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `duty_teacher_messages_duty_id_foreign` FOREIGN KEY (`duty_id`) REFERENCES `duties` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_data_teacher_id_foreign` FOREIGN KEY (`data_teacher_id`) REFERENCES `data_teachers` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `exam_answers`
--
ALTER TABLE `exam_answers`
  ADD CONSTRAINT `exam_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `exam_questions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `exam_classes`
--
ALTER TABLE `exam_classes`
  ADD CONSTRAINT `exam_classes_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_classes_list_class_id_foreign` FOREIGN KEY (`list_class_id`) REFERENCES `list_classes` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD CONSTRAINT `exam_questions_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `exam_results`
--
ALTER TABLE `exam_results`
  ADD CONSTRAINT `exam_results_data_student_id_foreign` FOREIGN KEY (`data_student_id`) REFERENCES `data_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_results_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `exam_res_ans`
--
ALTER TABLE `exam_res_ans`
  ADD CONSTRAINT `exam_res_ans_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `exam_questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_res_ans_result_id_foreign` FOREIGN KEY (`result_id`) REFERENCES `exam_results` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `exam_students`
--
ALTER TABLE `exam_students`
  ADD CONSTRAINT `exam_students_data_student_id_foreign` FOREIGN KEY (`data_student_id`) REFERENCES `data_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_students_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_students_list_class_id_foreign` FOREIGN KEY (`list_class_id`) REFERENCES `list_classes` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `exam_subjects`
--
ALTER TABLE `exam_subjects`
  ADD CONSTRAINT `exam_subjects_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_subjects_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lesson_schedules`
--
ALTER TABLE `lesson_schedules`
  ADD CONSTRAINT `lesson_schedules_list_class_id_foreign` FOREIGN KEY (`list_class_id`) REFERENCES `list_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_schedules_partner_school_id_foreign` FOREIGN KEY (`partner_school_id`) REFERENCES `partner_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_schedules_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `list_classes`
--
ALTER TABLE `list_classes`
  ADD CONSTRAINT `list_classes_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `list_classes_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `class_grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `list_classes_partner_school_id_foreign` FOREIGN KEY (`partner_school_id`) REFERENCES `partner_schools` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `list_subjects`
--
ALTER TABLE `list_subjects`
  ADD CONSTRAINT `list_subjects_partner_school_id_foreign` FOREIGN KEY (`partner_school_id`) REFERENCES `partner_schools` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `partner_schools`
--
ALTER TABLE `partner_schools`
  ADD CONSTRAINT `partner_schools_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `partner_school_statistic_data`
--
ALTER TABLE `partner_school_statistic_data`
  ADD CONSTRAINT `partner_school_statistic_data_partner_school_id_foreign` FOREIGN KEY (`partner_school_id`) REFERENCES `partner_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `partner_school_statistic_data_statistic_id_foreign` FOREIGN KEY (`statistic_id`) REFERENCES `partner_school_statistics` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `proof_of_payments`
--
ALTER TABLE `proof_of_payments`
  ADD CONSTRAINT `proof_of_payments_contract_id_foreign` FOREIGN KEY (`contract_id`) REFERENCES `contract_payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proof_of_payments_partner_school_id_foreign` FOREIGN KEY (`partner_school_id`) REFERENCES `partner_schools` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `request_packages`
--
ALTER TABLE `request_packages`
  ADD CONSTRAINT `request_packages_cost_id_foreign` FOREIGN KEY (`cost_id`) REFERENCES `cost_by_packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `request_packages_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `request_partners` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `request_students`
--
ALTER TABLE `request_students`
  ADD CONSTRAINT `request_students_cost_id_foreign` FOREIGN KEY (`cost_id`) REFERENCES `cost_by_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `request_students_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `request_partners` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `school_storages`
--
ALTER TABLE `school_storages`
  ADD CONSTRAINT `school_storages_partner_school_id_foreign` FOREIGN KEY (`partner_school_id`) REFERENCES `partner_schools` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `statistic_absents`
--
ALTER TABLE `statistic_absents`
  ADD CONSTRAINT `statistic_absents_partner_school_id_foreign` FOREIGN KEY (`partner_school_id`) REFERENCES `partner_schools` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `student_absents`
--
ALTER TABLE `student_absents`
  ADD CONSTRAINT `student_absents_data_student_id_foreign` FOREIGN KEY (`data_student_id`) REFERENCES `data_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_absents_student_schedule_id_foreign` FOREIGN KEY (`student_schedule_id`) REFERENCES `student_schedules` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `student_schedules`
--
ALTER TABLE `student_schedules`
  ADD CONSTRAINT `student_schedules_partner_school_id_foreign` FOREIGN KEY (`partner_school_id`) REFERENCES `partner_schools` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `student_storages`
--
ALTER TABLE `student_storages`
  ADD CONSTRAINT `student_storages_data_student_id_foreign` FOREIGN KEY (`data_student_id`) REFERENCES `data_students` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_list_class_id_foreign` FOREIGN KEY (`list_class_id`) REFERENCES `list_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subjects_partner_school_id_foreign` FOREIGN KEY (`partner_school_id`) REFERENCES `partner_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subjects_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `list_subjects` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `super_admins`
--
ALTER TABLE `super_admins`
  ADD CONSTRAINT `super_admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `teacher_absents`
--
ALTER TABLE `teacher_absents`
  ADD CONSTRAINT `teacher_absents_data_teacher_id_foreign` FOREIGN KEY (`data_teacher_id`) REFERENCES `data_teachers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_absents_teacher_schedule_id_foreign` FOREIGN KEY (`teacher_schedule_id`) REFERENCES `teacher_schedules` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `teacher_classes`
--
ALTER TABLE `teacher_classes`
  ADD CONSTRAINT `teacher_classes_data_teacher_id_foreign` FOREIGN KEY (`data_teacher_id`) REFERENCES `data_teachers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_classes_list_class_id_foreign` FOREIGN KEY (`list_class_id`) REFERENCES `list_classes` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `teacher_schedules`
--
ALTER TABLE `teacher_schedules`
  ADD CONSTRAINT `teacher_schedules_partner_school_id_foreign` FOREIGN KEY (`partner_school_id`) REFERENCES `partner_schools` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `teacher_storages`
--
ALTER TABLE `teacher_storages`
  ADD CONSTRAINT `teacher_storages_data_teacher_id_foreign` FOREIGN KEY (`data_teacher_id`) REFERENCES `data_teachers` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `teacher_subjects`
--
ALTER TABLE `teacher_subjects`
  ADD CONSTRAINT `teacher_subjects_data_teacher_id_foreign` FOREIGN KEY (`data_teacher_id`) REFERENCES `data_teachers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_subjects_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `theories`
--
ALTER TABLE `theories`
  ADD CONSTRAINT `theories_data_teacher_id_foreign` FOREIGN KEY (`data_teacher_id`) REFERENCES `data_teachers` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `theory_classes`
--
ALTER TABLE `theory_classes`
  ADD CONSTRAINT `theory_classes_list_class_id_foreign` FOREIGN KEY (`list_class_id`) REFERENCES `list_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `theory_classes_theory_id_foreign` FOREIGN KEY (`theory_id`) REFERENCES `theories` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `theory_files`
--
ALTER TABLE `theory_files`
  ADD CONSTRAINT `theory_files_theory_id_foreign` FOREIGN KEY (`theory_id`) REFERENCES `theories` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `theory_messages`
--
ALTER TABLE `theory_messages`
  ADD CONSTRAINT `theory_messages_data_student_id_foreign` FOREIGN KEY (`data_student_id`) REFERENCES `data_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `theory_messages_theory_id_foreign` FOREIGN KEY (`theory_id`) REFERENCES `theories` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `theory_students`
--
ALTER TABLE `theory_students`
  ADD CONSTRAINT `theory_students_data_student_id_foreign` FOREIGN KEY (`data_student_id`) REFERENCES `data_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `theory_students_list_class_id_foreign` FOREIGN KEY (`list_class_id`) REFERENCES `list_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `theory_students_theory_id_foreign` FOREIGN KEY (`theory_id`) REFERENCES `theories` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `theory_subjects`
--
ALTER TABLE `theory_subjects`
  ADD CONSTRAINT `theory_subjects_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `theory_subjects_theory_id_foreign` FOREIGN KEY (`theory_id`) REFERENCES `theories` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `theory_teacher_messages`
--
ALTER TABLE `theory_teacher_messages`
  ADD CONSTRAINT `theory_teacher_messages_data_student_id_foreign` FOREIGN KEY (`data_student_id`) REFERENCES `data_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `theory_teacher_messages_data_teacher_id_foreign` FOREIGN KEY (`data_teacher_id`) REFERENCES `data_teachers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `theory_teacher_messages_theory_id_foreign` FOREIGN KEY (`theory_id`) REFERENCES `theories` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tryouts`
--
ALTER TABLE `tryouts`
  ADD CONSTRAINT `tryouts_data_teacher_id_foreign` FOREIGN KEY (`data_teacher_id`) REFERENCES `data_teachers` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tryout_answers`
--
ALTER TABLE `tryout_answers`
  ADD CONSTRAINT `tryout_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `tryout_questions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tryout_classes`
--
ALTER TABLE `tryout_classes`
  ADD CONSTRAINT `tryout_classes_list_class_id_foreign` FOREIGN KEY (`list_class_id`) REFERENCES `list_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tryout_classes_tryout_id_foreign` FOREIGN KEY (`tryout_id`) REFERENCES `tryouts` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tryout_questions`
--
ALTER TABLE `tryout_questions`
  ADD CONSTRAINT `tryout_questions_tryout_id_foreign` FOREIGN KEY (`tryout_id`) REFERENCES `tryouts` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tryout_results`
--
ALTER TABLE `tryout_results`
  ADD CONSTRAINT `tryout_results_data_student_id_foreign` FOREIGN KEY (`data_student_id`) REFERENCES `data_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tryout_results_tryout_id_foreign` FOREIGN KEY (`tryout_id`) REFERENCES `tryouts` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tryout_res_ans`
--
ALTER TABLE `tryout_res_ans`
  ADD CONSTRAINT `tryout_res_ans_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `tryout_questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tryout_res_ans_result_id_foreign` FOREIGN KEY (`result_id`) REFERENCES `tryout_results` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tryout_students`
--
ALTER TABLE `tryout_students`
  ADD CONSTRAINT `tryout_students_data_student_id_foreign` FOREIGN KEY (`data_student_id`) REFERENCES `data_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tryout_students_list_class_id_foreign` FOREIGN KEY (`list_class_id`) REFERENCES `list_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tryout_students_tryout_id_foreign` FOREIGN KEY (`tryout_id`) REFERENCES `tryouts` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tryout_subjects`
--
ALTER TABLE `tryout_subjects`
  ADD CONSTRAINT `tryout_subjects_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tryout_subjects_tryout_id_foreign` FOREIGN KEY (`tryout_id`) REFERENCES `tryouts` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_level_user_id_foreign` FOREIGN KEY (`level_user_id`) REFERENCES `level_users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `validation_duty_submission_by_teachers`
--
ALTER TABLE `validation_duty_submission_by_teachers`
  ADD CONSTRAINT `validation_duty_submission_by_teachers_data_teacher_id_foreign` FOREIGN KEY (`data_teacher_id`) REFERENCES `data_teachers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `validation_duty_submission_by_teachers_submission_id_foreign` FOREIGN KEY (`submission_id`) REFERENCES `duty_submissions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
