-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 17, 2024 at 12:41 PM
-- Server version: 10.6.15-MariaDB-cll-lve
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracers2_tracer_study_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_apicustom`
--

CREATE TABLE `cms_apicustom` (
  `id` int(10) UNSIGNED NOT NULL,
  `permalink` varchar(255) DEFAULT NULL,
  `tabel` varchar(255) DEFAULT NULL,
  `aksi` varchar(255) DEFAULT NULL,
  `kolom` varchar(255) DEFAULT NULL,
  `orderby` varchar(255) DEFAULT NULL,
  `sub_query_1` varchar(255) DEFAULT NULL,
  `sql_where` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `parameter` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `method_type` varchar(25) DEFAULT NULL,
  `parameters` longtext DEFAULT NULL,
  `responses` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_apikey`
--

CREATE TABLE `cms_apikey` (
  `id` int(10) UNSIGNED NOT NULL,
  `screetkey` varchar(255) DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_dashboard`
--

CREATE TABLE `cms_dashboard` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_email_queues`
--

CREATE TABLE `cms_email_queues` (
  `id` int(10) UNSIGNED NOT NULL,
  `send_at` datetime DEFAULT NULL,
  `email_recipient` varchar(255) DEFAULT NULL,
  `email_from_email` varchar(255) DEFAULT NULL,
  `email_from_name` varchar(255) DEFAULT NULL,
  `email_cc_email` varchar(255) DEFAULT NULL,
  `email_subject` varchar(255) DEFAULT NULL,
  `email_content` text DEFAULT NULL,
  `email_attachments` text DEFAULT NULL,
  `is_sent` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_email_templates`
--

CREATE TABLE `cms_email_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `from_name` varchar(255) DEFAULT NULL,
  `from_email` varchar(255) DEFAULT NULL,
  `cc_email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_email_templates`
--

INSERT INTO `cms_email_templates` (`id`, `name`, `slug`, `subject`, `content`, `description`, `from_name`, `from_email`, `cc_email`, `created_at`, `updated_at`) VALUES
(1, 'Email Template Forgot Password Backend', 'forgot_password_backend', NULL, '<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>', '[password]', 'System', 'system@crudbooster.com', NULL, '2023-09-09 11:02:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_logs`
--

CREATE TABLE `cms_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ipaddress` varchar(50) DEFAULT NULL,
  `useragent` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `id_cms_users` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_logs`
--

INSERT INTO `cms_logs` (`id`, `ipaddress`, `useragent`, `url`, `description`, `details`, `id_cms_users`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/login', 'admin@crudbooster.com login with IP Address 127.0.0.1', '', 1, '2023-09-09 11:04:02', NULL),
(2, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/level_studies/add-save', 'Add New Data S1 at Jenjang Pendidikan', '', 1, '2023-09-09 12:11:12', NULL),
(3, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/level_studies/add-save', 'Add New Data D3 at Jenjang Pendidikan', '', 1, '2023-09-09 12:11:14', NULL),
(4, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/program_studies/add-save', 'Add New Data Teknik Informatika at Program Pendidikan', '', 1, '2023-09-09 12:11:47', NULL),
(5, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/program_studies/add-save', 'Add New Data Kesehatan Masyarakat at Program Pendidikan', '', 1, '2023-09-09 12:12:06', NULL),
(6, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/tags/add-save', 'Add New Data UI/UX at TAG', '', 1, '2023-09-09 12:13:21', NULL),
(7, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/companies/add-save', 'Add New Data PT Mencari cinta sejati at Perusahaan', '', 1, '2023-09-09 12:16:18', NULL),
(8, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/tags_companies/add-save', 'Add New Data  at TAG Company', '', 1, '2023-09-09 12:24:07', NULL),
(9, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/tags_companies/add-save', 'Add New Data  at TAG Company', '', 1, '2023-09-09 12:34:19', NULL),
(10, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/tags_companies/add-save', 'Add New Data  at TAG Company', '', 1, '2023-09-09 12:34:32', NULL),
(11, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/students/add-save', 'Add New Data Bagas Aditya at Mahasiswa', '', 1, '2023-09-09 12:41:17', NULL),
(12, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/students/edit-save/1', 'Update data Bagas Aditya at Mahasiswa', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>ipk</td><td>3</td><td>3.53</td></tr></tbody></table>', 1, '2023-09-09 12:41:29', NULL),
(13, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/jobs/add-save', 'Add New Data Staff Admin at Pekerjaan', '', 1, '2023-09-09 12:57:43', NULL),
(14, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/menu_management/edit-save/1', 'Update data Jenjang Pendidikan at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>icon</td><td>fa fa-glass</td><td>fa fa-th-list</td></tr></tbody></table>', 1, '2023-09-09 13:01:09', NULL),
(15, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/menu_management/edit-save/2', 'Update data Program Pendidikan at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>icon</td><td>fa fa-glass</td><td>fa fa-th</td></tr><tr><td>sorting</td><td>2</td><td></td></tr></tbody></table>', 1, '2023-09-09 13:01:17', NULL),
(16, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/menu_management/edit-save/3', 'Update data Mahasiswa at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>icon</td><td>fa fa-music</td><td>fa fa-user-md</td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2023-09-09 13:01:28', NULL),
(17, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/menu_management/edit-save/4', 'Update data Perusahaan at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>icon</td><td>fa fa-glass</td><td>fa fa-home</td></tr><tr><td>sorting</td><td>4</td><td></td></tr></tbody></table>', 1, '2023-09-09 13:01:40', NULL),
(18, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/menu_management/edit-save/5', 'Update data TAG at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>icon</td><td>fa fa-glass</td><td>fa fa-flag</td></tr><tr><td>sorting</td><td>5</td><td></td></tr></tbody></table>', 1, '2023-09-09 13:01:57', NULL),
(19, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/menu_management/edit-save/6', 'Update data Pekerjaan at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>icon</td><td>fa fa-glass</td><td>fa fa-bookmark</td></tr><tr><td>sorting</td><td>6</td><td></td></tr></tbody></table>', 1, '2023-09-09 13:02:14', NULL),
(20, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/tags/add-save', 'Add New Data Web at TAG', '', 1, '2023-09-09 13:02:52', NULL),
(21, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/tags/add-save', 'Add New Data Mobile at TAG', '', 1, '2023-09-09 13:02:54', NULL),
(22, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/tags_companies/add-save', 'Add New Data  at TAG Company', '', 1, '2023-09-09 13:03:02', NULL),
(23, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/companies/add-save', 'Add New Data PT Indo Karya at Perusahaan', '', 1, '2023-09-09 13:07:16', NULL),
(24, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/companies/delete/2', 'Delete data PT Indo Karya at Perusahaan', '', 1, '2023-09-09 13:07:37', NULL),
(25, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/students/edit-save/1', 'Update data Bagas Aditya at Mahasiswa', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>approved_job_apply_id</td><td></td><td></td></tr></tbody></table>', 1, '2023-09-09 13:10:20', NULL),
(26, '158.140.166.176', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://tracerstudy.id/admin/login', 'admin@crudbooster.com login with IP Address 158.140.166.176', '', 1, '2023-09-09 13:17:00', NULL),
(27, '158.140.166.176', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://tracerstudy.id/admin/users/add-save', 'Add New Data Nurul Annisa at Users Management', '', 1, '2023-09-09 13:18:43', NULL),
(28, '158.140.166.176', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://tracerstudy.id/admin/logout', 'admin@crudbooster.com logout', '', 1, '2023-09-09 13:19:54', NULL),
(29, '158.140.166.176', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://tracerstudy.id/admin/login', 'nurul.annisa@gmail.com login with IP Address 158.140.166.176', '', 2, '2023-09-09 13:20:03', NULL),
(30, '158.140.166.176', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://tracerstudy.id/admin/login', 'nurul.annisa@gmail.com login with IP Address 158.140.166.176', '', 2, '2023-09-09 13:20:47', NULL),
(31, '158.140.166.176', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://tracerstudy.id/admin/companies/delete-image', 'Delete the image of PT Mencari cinta sejati at Perusahaan', '', 2, '2023-09-09 13:22:46', NULL),
(32, '158.140.166.176', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://tracerstudy.id/admin/companies/edit-save/1', 'Update data PT Mencari cinta sejati at Perusahaan', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>logo</td><td></td><td>uploads/2/2023-09/images.jpg</td></tr></tbody></table>', 2, '2023-09-09 13:22:55', NULL),
(33, '45.126.187.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'https://tracerstudy.id/admin/login', 'nurul.annisa@gmail.com login with IP Address 45.126.187.9', '', 2, '2023-09-10 01:18:27', NULL),
(34, '103.246.107.8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'http://tracerstudy.id/admin/login', 'nurul.annisa@gmail.com login with IP Address 103.246.107.8', '', 2, '2023-09-13 00:05:35', NULL),
(35, '103.246.107.8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'http://tracerstudy.id/admin/logout', 'nurul.annisa@gmail.com logout', '', 2, '2023-09-13 02:00:46', NULL),
(36, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/login', 'admin@crudbooster.com login with IP Address 127.0.0.1', '', 1, '2023-09-13 10:14:13', NULL),
(37, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/program_studies/add-save', 'Add New Data 111 at Program Pendidikan', '', 1, '2023-09-13 10:18:14', NULL),
(38, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/module_generator/delete/20', 'Delete data TAG Jobs at Module Generator', '', 1, '2023-09-13 10:22:31', NULL),
(39, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/jobs/add-save', 'Add New Data AAA at Pekerjaan', '', 1, '2023-09-13 10:28:27', NULL),
(40, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/tags_jobs/add-save', 'Add New Data  at TAG Jobs', '', 1, '2023-09-13 10:29:19', NULL),
(41, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/jobs/add-save', 'Add New Data HHH at Pekerjaan', '', 1, '2023-09-13 10:29:41', NULL),
(42, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/universities/add-save', 'Add New Data UDINUS at Universitas', '', 1, '2023-09-13 10:39:59', NULL),
(43, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/students/edit-save/1', 'Update data Bagas Aditya at Mahasiswa', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>approved_job_apply_id</td><td></td><td></td></tr><tr><td>university_id</td><td></td><td>1</td></tr></tbody></table>', 1, '2023-09-13 10:41:55', NULL),
(44, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/job_categories/add-save', 'Add New Data IT & Software at Kategori Pekerjaan', '', 1, '2023-09-13 11:07:06', NULL),
(45, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/job_categories/add-save', 'Add New Data Teknologi at Kategori Pekerjaan', '', 1, '2023-09-13 11:07:17', NULL),
(46, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/job_categories/add-save', 'Add New Data Pemerintahan at Kategori Pekerjaan', '', 1, '2023-09-13 11:07:27', NULL),
(47, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/job_categories/add-save', 'Add New Data Accounting / Keuangan at Kategori Pekerjaan', '', 1, '2023-09-13 11:07:38', NULL),
(48, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/jobs/edit-save/3', 'Update data HHH at Pekerjaan', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>job_category_id</td><td></td><td>4</td></tr></tbody></table>', 1, '2023-09-13 11:07:51', NULL),
(49, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/jobs/edit-save/2', 'Update data AAA at Pekerjaan', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>job_category_id</td><td></td><td>3</td></tr></tbody></table>', 1, '2023-09-13 11:07:56', NULL),
(50, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/jobs/edit-save/1', 'Update data Staff Admin at Pekerjaan', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>program_study_id</td><td>0</td><td>2</td></tr><tr><td>job_category_id</td><td></td><td>2</td></tr></tbody></table>', 1, '2023-09-13 11:08:09', NULL),
(51, '158.140.166.176', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'https://tracerstudy.id/admin/login', 'admin@crudbooster.com login with IP Address 158.140.166.176', '', 1, '2023-09-13 11:11:20', NULL),
(52, '45.126.187.3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'http://tracerstudy.id/admin/login', 'nurul.annisa@gmail.com login with IP Address 45.126.187.3', '', 2, '2023-09-13 20:11:57', NULL),
(53, '45.126.187.3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'http://tracerstudy.id/admin/program_studies/edit-save/1', 'Update data Teknik Informatika at Program Pendidikan', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>faculty</td><td>FIK</td><td>Fakultas Ilmu Komputer</td></tr></tbody></table>', 2, '2023-09-13 20:12:51', NULL),
(54, '125.162.203.223', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'http://tracerstudy.id/admin/login', 'nurul.annisa@gmail.com login with IP Address 125.162.203.223', '', 2, '2023-09-13 23:17:11', NULL),
(55, '125.162.203.223', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36 Edg/116.0.1938.76', 'http://tracerstudy.id/admin/login', 'nurul.annisa@gmail.com login with IP Address 125.162.203.223', '', 2, '2023-09-13 23:19:08', NULL),
(56, '125.162.203.223', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36 Edg/116.0.1938.76', 'http://tracerstudy.id/admin/logout', 'nurul.annisa@gmail.com logout', '', 2, '2023-09-13 23:23:05', NULL),
(57, '125.162.203.223', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36 Edg/116.0.1938.76', 'http://tracerstudy.id/admin/login', 'nurul.annisa@gmail.com login with IP Address 125.162.203.223', '', 2, '2023-09-13 23:28:11', NULL),
(58, '125.162.203.223', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36 Edg/116.0.1938.76', 'http://tracerstudy.id/admin/logout', 'nurul.annisa@gmail.com logout', '', 2, '2023-09-13 23:50:17', NULL),
(59, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/companies/delete-image', 'Delete the image of PT Mencari cinta sejati at Perusahaan', '', 1, '2023-09-24 06:23:38', NULL),
(60, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/companies/edit-save/1', 'Update data PT Mencari cinta sejati at Perusahaan', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>logo</td><td></td><td>uploads/1/2023-09/img_10.png</td></tr></tbody></table>', 1, '2023-09-24 06:23:44', NULL),
(61, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/jobs/delete/3', 'Delete data HHH at Pekerjaan', '', 1, '2023-09-24 06:39:47', NULL),
(62, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/jobs/delete/2', 'Delete data AAA at Pekerjaan', '', 1, '2023-09-24 06:39:51', NULL),
(63, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/companies/add-save', 'Add New Data Nirmala Satya Development at Perusahaan', '', 1, '2023-09-24 06:43:14', NULL),
(64, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/jobs/add-save', 'Add New Data Design Graphic Internship at Pekerjaan', '', 1, '2023-09-24 06:45:16', NULL),
(65, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/jobs/edit-save/1', 'Update data Staff Admin at Pekerjaan', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody></tbody></table>', 1, '2023-09-24 07:44:50', NULL),
(66, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/students/add-save', 'Add New Data Mas Ditya at Mahasiswa', '', 1, '2023-09-24 10:38:23', NULL),
(67, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/students/add-save', 'Add New Data Mas Ditya at Mahasiswa', '', 1, '2023-09-24 10:42:14', NULL),
(68, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/login', '111202113265@mhs.dinus.ac.id login with IP Address 127.0.0.1', '', 7, '2023-09-24 10:42:54', NULL),
(69, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/job_applies/add-save', 'Add New Data  at Lamaran Kerja', '', 1, '2023-09-24 11:06:23', NULL),
(70, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/login', 'admin@crudbooster.com login with IP Address 127.0.0.1', '', 1, '2023-09-24 23:19:32', NULL),
(71, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/login', '111202113265@mhs.dinus.ac.id login with IP Address 127.0.0.1', '', 7, '2023-09-25 01:59:57', NULL),
(72, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/tags_students/delete/8', 'Delete data 8 at Tag Mahasiswa', '', 1, '2023-09-25 02:30:19', NULL),
(73, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/tags_students/add-save', 'Add New Data  at Tag Mahasiswa', '', 1, '2023-09-25 02:36:05', NULL),
(74, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/tags_students/delete/7', 'Delete data 7 at Tag Mahasiswa', '', 1, '2023-09-25 02:36:26', NULL),
(75, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/tags_students/add-save', 'Add New Data  at Tag Mahasiswa', '', 1, '2023-09-25 02:36:31', NULL),
(76, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/tags_students/add-save', 'Add New Data  at Tag Mahasiswa', '', 1, '2023-09-25 02:37:22', NULL),
(77, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/login', 'admin@crudbooster.com login with IP Address 127.0.0.1', '', 1, '2023-09-25 11:32:02', NULL),
(78, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/login', '111202113265@mhs.dinus.ac.id login with IP Address 127.0.0.1', '', 7, '2023-09-25 11:33:10', NULL),
(79, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/users', 'Try view the data :name at Users Management', '', 7, '2023-09-25 11:33:54', NULL),
(80, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/users/edit-save/7', 'Update data Mas Ditya at Users Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>photo</td><td></td><td>uploads/1/2023-09/images.jpg</td></tr><tr><td>password</td><td>$2y$10$Sa1GA9dDC9W9Py3MbWpjauxmCz2KEme7neWPK0HQ6Bpbt5kzHqrPe</td><td></td></tr><tr><td>status</td><td></td><td></td></tr><tr><td>company_id</td><td></td><td></td></tr><tr><td>university_id</td><td></td><td></td></tr></tbody></table>', 1, '2023-09-25 11:45:37', NULL),
(81, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/logout', '111202113265@mhs.dinus.ac.id logout', '', 7, '2023-09-25 11:49:12', NULL),
(82, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/login', '111202113265@mhs.dinus.ac.id login with IP Address 127.0.0.1', '', 7, '2023-09-25 11:49:25', NULL),
(83, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/menu_management/edit-save/9', 'Update data Lamaran Kerja at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>sorting</td><td>9</td><td></td></tr></tbody></table>', 1, '2023-09-25 11:49:55', NULL),
(84, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/menu_management/edit-save/3', 'Update data Mahasiswa at Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>sorting</td><td>5</td><td></td></tr></tbody></table>', 1, '2023-09-25 11:50:12', NULL),
(85, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/users/detail/1', 'Mencoba melihat data Super Admin pada Users Management', '', 7, '2023-09-25 19:24:49', NULL),
(86, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/users/detail/1', 'Mencoba melihat data Super Admin pada Users Management', '', 7, '2023-09-25 19:31:49', NULL),
(87, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/jobs/edit-save/4', 'Memperbaharui data Design Graphic Internship pada Pekerjaan', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>responsibility</td><td><p><br></p><div class=\"jbs-content mb-3\">								\r\n								<ul class=\"simple-list\"><ol><li>Semester akhir dari jurusan DKV atau sejenisnya</li><li>Familiar dengan aplikasi design (adobe family)</li><li>kreatif</li><li>mengikuti trend media sosial</li></ol></ul>\r\n							</div><p><br></p></td><td><ol><li>Semester akhir dari jurusan DKV atau sejenisnya</li><li>Familiar dengan aplikasi design (adobe family)</li><li>kreatif</li><li>mengikuti trend media sosial<br></li></ol></td></tr></tbody></table>', 1, '2023-09-25 20:08:34', NULL),
(88, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/jobs/edit-save/1', 'Memperbaharui data Staff Admin pada Pekerjaan', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>description</td><td><p>sad<br></p></td><td><p>Sebagai Desainer Produk, Anda akan bekerja dalam Tim Pengiriman Produk yang menyatu dengan bakat UX, teknik, produk, dan data. Anda akan membantu tim merancang antarmuka cantik yang memecahkan tantangan bisnis bagi klien kami. Kami bekerja dengan sejumlah bank Tier 1 dalam membangun aplikasi berbasis web untuk alur kerja pengelolaan AML, KYC, dan Daftar Sanksi. Peran ini sangat ideal jika Anda ingin mengalihkan karir Anda ke arena FinTech atau Big Data.</p></td></tr></tbody></table>', 1, '2023-09-25 20:09:42', NULL),
(89, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/students/add-save', 'Tambah data baru NABILLA NUR EKA FITRIANI pada Mahasiswa', '', 1, '2023-09-25 20:15:12', NULL),
(90, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/logout', 'admin@crudbooster.com keluar', '', 1, '2023-09-25 20:15:29', NULL),
(91, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/login', '111202113256@mhs.dinus.ac.id login dengan IP Address 127.0.0.1', '', 8, '2023-09-25 20:15:34', NULL),
(92, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/logout', '111202113265@mhs.dinus.ac.id keluar', '', 7, '2023-09-25 20:27:09', NULL),
(93, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/117.0', 'http://127.0.0.1:8000/admin/login', 'admin@crudbooster.com login dengan IP Address 127.0.0.1', '', 1, '2023-09-25 20:27:12', NULL),
(94, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/login', 'admin@crudbooster.com login dengan IP Address 127.0.0.1', '', 1, '2023-10-10 07:27:20', NULL),
(95, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/menu_management/edit-save/10', 'Memperbaharui data Dashboard pada Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>parent_id</td><td>0</td><td></td></tr><tr><td>is_dashboard</td><td>0</td><td>1</td></tr></tbody></table>', 1, '2023-10-10 07:31:41', NULL),
(96, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/students/edit-save/4', 'Memperbaharui data Mas Ditya pada Mahasiswa', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>approved_job_apply_id</td><td></td><td></td></tr></tbody></table>', 1, '2023-10-10 07:53:40', NULL),
(97, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/students/edit-save/4', 'Memperbaharui data Mas Ditya pada Mahasiswa', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>approved_job_apply_id</td><td></td><td></td></tr></tbody></table>', 1, '2023-10-10 07:54:31', NULL),
(98, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/login', 'admin@crudbooster.com login dengan IP Address 127.0.0.1', '', 1, '2023-10-10 07:58:25', NULL),
(99, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/students/edit-save/4', 'Memperbaharui data Mas Ditya pada Mahasiswa', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>approved_job_apply_id</td><td></td><td></td></tr></tbody></table>', 1, '2023-10-10 07:59:18', NULL),
(100, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/logout', 'admin@crudbooster.com keluar', '', 1, '2023-10-10 07:59:30', NULL),
(101, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/students/edit-save/4', 'Memperbaharui data Mas Ditya pada Mahasiswa', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>approved_job_apply_id</td><td></td><td></td></tr></tbody></table>', 1, '2023-10-10 08:01:59', NULL),
(102, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/students/edit-save/4', 'Memperbaharui data Mas Ditya pada Mahasiswa', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>approved_job_apply_id</td><td></td><td></td></tr></tbody></table>', 1, '2023-10-10 08:02:08', NULL),
(103, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/login', '111202113265@mhs.dinus.ac.id login dengan IP Address 127.0.0.1', '', 7, '2023-10-10 08:02:13', NULL),
(104, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/login', 'admin@crudbooster.com login dengan IP Address 127.0.0.1', '', 1, '2023-10-10 17:57:31', NULL),
(105, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/login', '111202113265@mhs.dinus.ac.id login dengan IP Address 127.0.0.1', '', 7, '2023-10-10 17:58:14', NULL),
(106, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/companies/edit-save/3', 'Memperbaharui data Nirmala Satya Development pada Perusahaan', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody></tbody></table>', 1, '2023-10-10 19:38:33', NULL),
(107, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/companies/edit-save/1', 'Memperbaharui data PT Mencari cinta sejati pada Perusahaan', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody></tbody></table>', 1, '2023-10-10 19:39:29', NULL),
(108, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/companies/edit-save/3', 'Memperbaharui data Nirmala Satya Development pada Perusahaan', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody></tbody></table>', 1, '2023-10-10 19:40:03', NULL),
(109, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/companies/edit-save/1', 'Memperbaharui data PT Mencari cinta sejati pada Perusahaan', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody></tbody></table>', 1, '2023-10-10 19:40:11', NULL),
(110, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/logout', 'admin@crudbooster.com keluar', '', 1, '2023-10-10 19:41:35', NULL),
(111, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/login', 'cinta@gmail.com login dengan IP Address 127.0.0.1', '', 13, '2023-10-10 19:41:46', NULL),
(112, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/job_applies', 'Mencoba melihat data :name pada Lamaran Kerja', '', 13, '2023-10-10 19:41:47', NULL),
(113, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/job_applies', 'Mencoba melihat data :name pada Lamaran Kerja', '', 13, '2023-10-10 19:41:49', NULL),
(114, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/job_applies', 'Mencoba melihat data :name pada Lamaran Kerja', '', 13, '2023-10-10 19:41:50', NULL),
(115, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/job_applies', 'Mencoba melihat data :name pada Lamaran Kerja', '', 13, '2023-10-10 19:41:50', NULL),
(116, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/job_applies', 'Mencoba melihat data :name pada Lamaran Kerja', '', 13, '2023-10-10 19:41:51', NULL),
(117, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/job_applies', 'Mencoba melihat data :name pada Lamaran Kerja', '', 13, '2023-10-10 19:41:51', NULL),
(118, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/job_applies', 'Mencoba melihat data :name pada Lamaran Kerja', '', 13, '2023-10-10 19:41:51', NULL),
(119, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/job_applies', 'Mencoba melihat data :name pada Lamaran Kerja', '', 13, '2023-10-10 19:41:52', NULL),
(120, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/login', 'admin@crudbooster.com login dengan IP Address 127.0.0.1', '', 1, '2023-10-10 19:42:07', NULL),
(121, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/job_applies', 'Mencoba melihat data :name pada Lamaran Kerja', '', 13, '2023-10-10 19:42:51', NULL),
(122, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/job_applies', 'Mencoba melihat data :name pada Lamaran Kerja', '', 13, '2023-10-10 19:43:34', NULL),
(123, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/job_applies', 'Mencoba melihat data :name pada Lamaran Kerja', '', 13, '2023-10-10 19:43:37', NULL),
(124, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/job_applies', 'Mencoba melihat data :name pada Lamaran Kerja', '', 13, '2023-10-10 19:44:24', NULL),
(125, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/job_applies', 'Mencoba melihat data :name pada Lamaran Kerja', '', 13, '2023-10-10 19:44:24', NULL),
(126, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/job_applies', 'Mencoba melihat data :name pada Lamaran Kerja', '', 13, '2023-10-10 19:44:25', NULL),
(127, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/job_applies', 'Mencoba melihat data :name pada Lamaran Kerja', '', 13, '2023-10-10 19:44:25', NULL),
(128, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/job_applies', 'Mencoba melihat data :name pada Lamaran Kerja', '', 13, '2023-10-10 19:44:26', NULL),
(129, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/login', 'cinta@gmail.com login dengan IP Address 127.0.0.1', '', 13, '2023-10-10 19:44:44', NULL),
(130, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/logout', '111202113265@mhs.dinus.ac.id keluar', '', 7, '2023-10-10 19:47:46', NULL),
(131, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/login', '111202113265@mhs.dinus.ac.id login dengan IP Address 127.0.0.1', '', 7, '2023-10-10 19:47:53', NULL),
(132, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/menu_management/add-save', 'Tambah data baru TAG Mahasiswa pada Menu Management', '', 1, '2023-10-10 19:48:30', NULL),
(133, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/menu_management/add-save', 'Tambah data baru TAG Perusahaan pada Menu Management', '', 1, '2023-10-10 19:54:14', NULL),
(134, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/menu_management/edit-save/6', 'Memperbaharui data Pekerjaan pada Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>sorting</td><td>10</td><td></td></tr></tbody></table>', 1, '2023-10-10 19:55:48', NULL),
(135, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/jobs/add-save', 'Tambah data baru tes pekerjaan pada Pekerjaan', '', 1, '2023-10-10 21:24:55', NULL),
(136, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/universities/edit-save/1', 'Memperbaharui data UDINUS pada Universitas', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody></tbody></table>', 1, '2023-10-10 21:52:13', NULL),
(137, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/universities/edit-save/1', 'Memperbaharui data UDINUS pada Universitas', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody></tbody></table>', 1, '2023-10-10 21:52:24', NULL),
(138, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/login', 'dinus@gmail.com login dengan IP Address 127.0.0.1', '', 14, '2023-10-10 21:53:29', NULL),
(139, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/logout', 'dinus@gmail.com keluar', '', 14, '2023-10-10 21:53:58', NULL),
(140, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/login', 'dinus@gmail.com login dengan IP Address 127.0.0.1', '', 14, '2023-10-10 21:54:02', NULL),
(141, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/job_applies', 'Mencoba melihat data :name pada Lamaran Kerja', '', 14, '2023-10-10 21:54:07', NULL),
(142, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/job_applies', 'Mencoba melihat data :name pada Lamaran Kerja', '', 14, '2023-10-10 21:54:09', NULL),
(143, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/menu_management/edit-save/9', 'Memperbaharui data Lamaran Kerja pada Menu Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>sorting</td><td>12</td><td></td></tr></tbody></table>', 1, '2023-10-10 21:54:27', NULL),
(144, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'http://127.0.0.1:8000/admin/universities/add-save', 'Tambah data baru tes univ pada Universitas', '', 1, '2023-10-10 22:01:38', NULL),
(145, '103.246.107.8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'https://tracerstudy.id/admin/login', '111202113256@mhs.dinus.ac.id login dengan IP Address 103.246.107.8', '', 8, '2023-10-13 04:22:21', NULL),
(146, '103.246.107.8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'https://tracerstudy.id/admin/login', 'nurul.annisa@gmail.com login dengan IP Address 103.246.107.8', '', 2, '2023-10-13 04:22:41', NULL),
(147, '103.246.107.8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'https://tracerstudy.id/admin/login', 'nurul.annisa@gmail.com login dengan IP Address 103.246.107.8', '', 2, '2023-10-13 04:26:30', NULL),
(148, '103.162.237.163', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/118.0', 'https://tracerstudy.id/admin/login', 'admin@crudbooster.com login dengan IP Address 103.162.237.163', '', 1, '2023-10-13 07:24:05', NULL),
(149, '103.246.107.8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'https://tracerstudy.id/admin/login', 'nurul.annisa@gmail.com login dengan IP Address 103.246.107.8', '', 2, '2023-10-13 07:28:17', NULL),
(150, '125.165.234.37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'http://tracerstudy.id/admin/login', 'nurul.annisa@gmail.com login dengan IP Address 125.165.234.37', '', 2, '2023-10-13 11:24:12', NULL),
(151, '125.165.234.37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'http://tracerstudy.id/admin/logout', 'nurul.annisa@gmail.com keluar', '', 2, '2023-10-13 11:24:40', NULL),
(152, '125.165.234.37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'http://tracerstudy.id/admin/login', 'nirmala@gmail.com login dengan IP Address 125.165.234.37', '', 12, '2023-10-13 11:24:55', NULL),
(153, '125.165.234.37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'http://tracerstudy.id/admin/logout', 'nirmala@gmail.com keluar', '', 12, '2023-10-13 11:25:21', NULL),
(154, '125.165.234.37', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'http://tracerstudy.id/admin/login', '111202113256@mhs.dinus.ac.id login dengan IP Address 125.165.234.37', '', 8, '2023-10-13 11:25:37', NULL),
(155, '114.10.21.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'http://tracerstudy.id/admin/logout', '111202113256@mhs.dinus.ac.id keluar', '', 8, '2023-10-13 13:36:33', NULL),
(156, '114.10.21.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'http://tracerstudy.id/admin/login', 'nirmala@gmail.com login dengan IP Address 114.10.21.69', '', 12, '2023-10-13 13:37:11', NULL),
(157, '114.10.21.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'http://tracerstudy.id/admin/logout', 'nirmala@gmail.com keluar', '', 12, '2023-10-13 13:37:55', NULL),
(158, '114.10.21.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'http://tracerstudy.id/admin/logout', ' keluar', '', NULL, '2023-10-13 13:37:55', NULL),
(159, '114.10.21.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'http://tracerstudy.id/admin/login', 'nirmala@gmail.com login dengan IP Address 114.10.21.69', '', 12, '2023-10-13 13:38:14', NULL),
(160, '114.10.21.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'http://tracerstudy.id/admin/login', 'nurul.annisa@gmail.com login dengan IP Address 114.10.21.69', '', 2, '2023-10-13 13:49:20', NULL),
(161, '114.10.21.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'https://tracerstudy.id/admin/login', 'nirmala@gmail.com login dengan IP Address 114.10.21.69', '', 12, '2023-10-13 14:43:51', NULL),
(162, '114.10.21.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'https://tracerstudy.id/admin/logout', 'nirmala@gmail.com keluar', '', 12, '2023-10-13 14:46:12', NULL),
(163, '114.10.21.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'https://tracerstudy.id/admin/login', '111202113256@mhs.dinus.ac.id login dengan IP Address 114.10.21.69', '', 8, '2023-10-13 14:48:08', NULL),
(164, '114.10.21.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'https://tracerstudy.id/admin/login', '111202113256@mhs.dinus.ac.id login dengan IP Address 114.10.21.69', '', 8, '2023-10-13 14:49:03', NULL),
(165, '114.10.21.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'https://tracerstudy.id/admin/logout', '111202113256@mhs.dinus.ac.id keluar', '', 8, '2023-10-13 14:50:23', NULL),
(166, '114.10.21.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'https://tracerstudy.id/admin/login', 'nirmala@gmail.com login dengan IP Address 114.10.21.69', '', 12, '2023-10-13 14:50:33', NULL),
(167, '114.10.21.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'https://tracerstudy.id/admin/logout', 'nirmala@gmail.com keluar', '', 12, '2023-10-13 14:51:18', NULL),
(168, '114.10.21.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'https://tracerstudy.id/admin/login', '111202113256@mhs.dinus.ac.id login dengan IP Address 114.10.21.69', '', 8, '2023-10-13 14:51:25', NULL),
(169, '114.10.21.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'https://tracerstudy.id/admin/logout', '111202113256@mhs.dinus.ac.id keluar', '', 8, '2023-10-13 14:52:16', NULL),
(170, '180.244.112.124', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Mobile Safari/537.36', 'https://tracerstudy.id/admin/login', '111202113256@mhs.dinus.ac.id login dengan IP Address 180.244.112.124', '', 8, '2023-10-14 11:30:32', NULL),
(171, '103.246.107.8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'https://tracerstudy.id/admin/login', 'dinus@gmail.com login dengan IP Address 103.246.107.8', '', 14, '2023-10-19 08:18:53', NULL),
(172, '103.246.107.8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'https://tracerstudy.id/admin/logout', 'dinus@gmail.com keluar', '', 14, '2023-10-19 09:09:15', NULL);
INSERT INTO `cms_logs` (`id`, `ipaddress`, `useragent`, `url`, `description`, `details`, `id_cms_users`, `created_at`, `updated_at`) VALUES
(173, '112.215.171.64', 'Mozilla/5.0 (Linux; Android 11; RMX3268) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Mobile Safari/537.36', 'http://tracerstudy.id/admin/login', 'dinus@gmail.com login dengan IP Address 112.215.171.64', '', 14, '2023-10-19 09:36:57', NULL),
(174, '112.215.171.64', 'Mozilla/5.0 (Linux; Android 11; RMX3268) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Mobile Safari/537.36', 'http://tracerstudy.id/admin/students/delete/1', 'Menghapus data Bagas Aditya pada Mahasiswa', '', 14, '2023-10-19 09:38:42', NULL),
(175, '112.215.171.64', 'Mozilla/5.0 (Linux; Android 11; RMX3268) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Mobile Safari/537.36', 'http://tracerstudy.id/admin/students/delete/4', 'Menghapus data Mas Ditya pada Mahasiswa', '', 14, '2023-10-19 09:38:50', NULL),
(176, '112.215.171.64', 'Mozilla/5.0 (Linux; Android 11; RMX3268) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Mobile Safari/537.36', 'http://tracerstudy.id/admin/students/delete/8', 'Menghapus data Aditya HA pada Mahasiswa', '', 14, '2023-10-19 09:38:55', NULL),
(177, '112.215.171.64', 'Mozilla/5.0 (Linux; Android 11; RMX3268) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Mobile Safari/537.36', 'http://tracerstudy.id/admin/students/delete/5', 'Menghapus data NABILLA NUR EKA FITRIANI pada Mahasiswa', '', 14, '2023-10-19 09:39:03', NULL),
(178, '158.140.170.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:122.0) Gecko/20100101 Firefox/122.0', 'http://tracerstudy.id/admin/login', 'admin@crudbooster.com login dengan IP Address 158.140.170.116', '', 1, '2024-02-12 22:10:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_menus`
--

CREATE TABLE `cms_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'url',
  `path` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_dashboard` tinyint(1) NOT NULL DEFAULT 0,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_menus`
--

INSERT INTO `cms_menus` (`id`, `name`, `type`, `path`, `color`, `icon`, `parent_id`, `is_active`, `is_dashboard`, `id_cms_privileges`, `sorting`, `created_at`, `updated_at`) VALUES
(1, 'Jenjang Pendidikan', 'Route', 'AdminLevelStudiesControllerGetIndex', 'normal', 'fa fa-th-list', 0, 1, 0, 1, 2, '2023-09-09 11:56:47', '2023-09-09 13:01:09'),
(2, 'Program Pendidikan', 'Route', 'AdminProgramStudiesControllerGetIndex', 'normal', 'fa fa-th', 0, 1, 0, 1, 3, '2023-09-09 11:57:19', '2023-09-09 13:01:17'),
(3, 'Mahasiswa', 'Route', 'AdminStudentsControllerGetIndex', 'normal', 'fa fa-user-md', 0, 1, 0, 1, 10, '2023-09-09 11:58:14', '2023-09-25 11:50:12'),
(4, 'Perusahaan', 'Route', 'AdminCompaniesControllerGetIndex', 'normal', 'fa fa-home', 0, 1, 0, 1, 5, '2023-09-09 11:59:37', '2023-09-09 13:01:40'),
(5, 'TAG', 'Route', 'AdminTagsControllerGetIndex', 'normal', 'fa fa-flag', 0, 1, 0, 1, 7, '2023-09-09 12:00:34', '2023-09-09 13:01:57'),
(6, 'Pekerjaan', 'Route', 'AdminJobsControllerGetIndex', 'normal', 'fa fa-bookmark', 0, 1, 0, 1, 11, '2023-09-09 12:52:11', '2023-10-10 19:55:48'),
(7, 'Universitas', 'Route', 'AdminUniversitiesControllerGetIndex', NULL, 'fa fa-glass', 0, 1, 0, 1, 4, '2023-09-13 10:38:19', NULL),
(8, 'Kategori Pekerjaan', 'Route', 'AdminJobCategoriesControllerGetIndex', NULL, 'fa fa-glass', 0, 1, 0, 1, 6, '2023-09-13 11:05:28', NULL),
(9, 'Lamaran Kerja', 'Route', 'AdminJobAppliesControllerGetIndex', 'normal', 'fa fa-glass', 0, 1, 0, 1, 12, '2023-09-24 10:53:36', '2023-10-10 21:54:27'),
(10, 'Dashboard', 'Route', 'AdminDashboard1ControllerGetIndex', 'normal', 'fa fa-glass', 0, 1, 1, 1, 1, '2023-10-10 07:31:19', '2023-10-10 07:31:41'),
(11, 'TAG Mahasiswa', 'Module', 'tags_students', 'normal', 'fa fa-music', 0, 1, 0, 1, 9, '2023-10-10 19:48:30', NULL),
(12, 'TAG Perusahaan', 'Module', 'tags_companies', 'normal', 'fa fa-music', 0, 1, 0, 1, 8, '2023-10-10 19:54:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_menus_privileges`
--

CREATE TABLE `cms_menus_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_menus` int(11) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_menus_privileges`
--

INSERT INTO `cms_menus_privileges` (`id`, `id_cms_menus`, `id_cms_privileges`) VALUES
(7, 1, 1),
(8, 2, 1),
(10, 4, 1),
(11, 5, 1),
(13, 7, 1),
(14, 8, 1),
(20, 3, 3),
(21, 3, 1),
(22, 3, 2),
(24, 10, 1),
(25, 11, 4),
(26, 12, 3),
(27, 6, 3),
(28, 6, 1),
(29, 9, 4),
(30, 9, 3),
(31, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_moduls`
--

CREATE TABLE `cms_moduls` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `table_name` varchar(255) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `is_protected` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_moduls`
--

INSERT INTO `cms_moduls` (`id`, `name`, `icon`, `path`, `table_name`, `controller`, `is_protected`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Notifications', 'fa fa-cog', 'notifications', 'cms_notifications', 'NotificationsController', 1, 1, '2023-09-09 11:02:34', NULL, NULL),
(2, 'Privileges', 'fa fa-cog', 'privileges', 'cms_privileges', 'PrivilegesController', 1, 1, '2023-09-09 11:02:34', NULL, NULL),
(3, 'Privileges Roles', 'fa fa-cog', 'privileges_roles', 'cms_privileges_roles', 'PrivilegesRolesController', 1, 1, '2023-09-09 11:02:34', NULL, NULL),
(4, 'Users Management', 'fa fa-users', 'users', 'cms_users', 'AdminCmsUsersController', 0, 1, '2023-09-09 11:02:34', NULL, NULL),
(5, 'Settings', 'fa fa-cog', 'settings', 'cms_settings', 'SettingsController', 1, 1, '2023-09-09 11:02:34', NULL, NULL),
(6, 'Module Generator', 'fa fa-database', 'module_generator', 'cms_moduls', 'ModulsController', 1, 1, '2023-09-09 11:02:34', NULL, NULL),
(7, 'Menu Management', 'fa fa-bars', 'menu_management', 'cms_menus', 'MenusController', 1, 1, '2023-09-09 11:02:34', NULL, NULL),
(8, 'Email Templates', 'fa fa-envelope-o', 'email_templates', 'cms_email_templates', 'EmailTemplatesController', 1, 1, '2023-09-09 11:02:34', NULL, NULL),
(9, 'Statistic Builder', 'fa fa-dashboard', 'statistic_builder', 'cms_statistics', 'StatisticBuilderController', 1, 1, '2023-09-09 11:02:34', NULL, NULL),
(10, 'API Generator', 'fa fa-cloud-download', 'api_generator', '', 'ApiCustomController', 1, 1, '2023-09-09 11:02:34', NULL, NULL),
(11, 'Log User Access', 'fa fa-flag-o', 'logs', 'cms_logs', 'LogsController', 1, 1, '2023-09-09 11:02:34', NULL, NULL),
(12, 'Jenjang Pendidikan', 'fa fa-glass', 'level_studies', 'level_studies', 'AdminLevelStudiesController', 0, 0, '2023-09-09 11:56:47', NULL, NULL),
(13, 'Program Pendidikan', 'fa fa-glass', 'program_studies', 'program_studies', 'AdminProgramStudiesController', 0, 0, '2023-09-09 11:57:19', NULL, NULL),
(14, 'Mahasiswa', 'fa fa-music', 'students', 'students', 'AdminStudentsController', 0, 0, '2023-09-09 11:58:13', NULL, NULL),
(15, 'Perusahaan', 'fa fa-glass', 'companies', 'companies', 'AdminCompaniesController', 0, 0, '2023-09-09 11:59:37', NULL, NULL),
(16, 'TAG', 'fa fa-glass', 'tags', 'tags', 'AdminTagsController', 0, 0, '2023-09-09 12:00:34', NULL, NULL),
(17, 'TAG Company', 'fa fa-glass', 'tags_companies', 'tags_companies', 'AdminTagsCompaniesController', 0, 0, '2023-09-09 12:23:34', NULL, NULL),
(18, 'Pekerjaan', 'fa fa-glass', 'jobs', 'jobs', 'AdminJobsController', 0, 0, '2023-09-09 12:52:11', NULL, NULL),
(19, 'Tag Mahasiswa', 'fa fa-glass', 'tags_students', 'tags_students', 'AdminTagsStudentsController', 0, 0, '2023-09-09 13:08:30', NULL, NULL),
(20, 'TAG Jobs', 'fa fa-glass', 'tags_jobs', 'tags_jobs', 'AdminTagsJobsController', 0, 0, '2023-09-13 10:22:17', NULL, '2023-09-13 10:22:31'),
(21, 'TAG Jobs', 'fa fa-glass', 'tags_jobs', 'tags_jobs', 'AdminTagsJobsController', 0, 0, '2023-09-13 10:23:45', NULL, NULL),
(22, 'Universitas', 'fa fa-glass', 'universities', 'universities', 'AdminUniversitiesController', 0, 0, '2023-09-13 10:38:19', NULL, NULL),
(23, 'Kategori Pekerjaan', 'fa fa-glass', 'job_categories', 'job_categories', 'AdminJobCategoriesController', 0, 0, '2023-09-13 11:05:28', NULL, NULL),
(24, 'Lamaran Kerja', 'fa fa-glass', 'job_applies', 'job_applies', 'AdminJobAppliesController', 0, 0, '2023-09-24 10:53:36', NULL, NULL),
(25, 'Dashboard', 'fa fa-glass', 'dashboard', 'companies', 'AdminDashboard1Controller', 0, 0, '2023-10-10 07:31:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_notifications`
--

CREATE TABLE `cms_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_users` int(11) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_notifications`
--

INSERT INTO `cms_notifications` (`id`, `id_cms_users`, `content`, `url`, `is_read`, `created_at`, `updated_at`) VALUES
(22, 7, 'Anda telah diberhentikan dari pekerjaan, sekarang anda dapat mengirimkan lamaran pada postingan yang tersedia.', 'http://127.0.0.1:8000/', 1, '2023-09-25 19:51:36', NULL),
(23, 8, 'Selamat, anda diundang interview oleh Nirmala Satya Development pada 19 Oct 2023.', 'https://tracerstudy.id/admin/job_applies/detail/5', 0, '2023-10-13 14:51:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_privileges`
--

CREATE TABLE `cms_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_superadmin` tinyint(1) DEFAULT NULL,
  `theme_color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_privileges`
--

INSERT INTO `cms_privileges` (`id`, `name`, `is_superadmin`, `theme_color`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrator', 1, 'skin-red', '2023-09-09 11:02:34', NULL),
(2, 'Universitas', 0, 'skin-blue', NULL, NULL),
(3, 'Perusahaan', 0, 'skin-green', NULL, NULL),
(4, 'Mahasiswa', 0, 'skin-blue', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_privileges_roles`
--

CREATE TABLE `cms_privileges_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `is_visible` tinyint(1) DEFAULT NULL,
  `is_create` tinyint(1) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `is_edit` tinyint(1) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `id_cms_moduls` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_privileges_roles`
--

INSERT INTO `cms_privileges_roles` (`id`, `is_visible`, `is_create`, `is_read`, `is_edit`, `is_delete`, `id_cms_privileges`, `id_cms_moduls`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 0, 0, 1, 1, '2023-09-09 11:02:34', NULL),
(2, 1, 1, 1, 1, 1, 1, 2, '2023-09-09 11:02:34', NULL),
(3, 0, 1, 1, 1, 1, 1, 3, '2023-09-09 11:02:34', NULL),
(4, 1, 1, 1, 1, 1, 1, 4, '2023-09-09 11:02:34', NULL),
(5, 1, 1, 1, 1, 1, 1, 5, '2023-09-09 11:02:34', NULL),
(6, 1, 1, 1, 1, 1, 1, 6, '2023-09-09 11:02:34', NULL),
(7, 1, 1, 1, 1, 1, 1, 7, '2023-09-09 11:02:34', NULL),
(8, 1, 1, 1, 1, 1, 1, 8, '2023-09-09 11:02:34', NULL),
(9, 1, 1, 1, 1, 1, 1, 9, '2023-09-09 11:02:34', NULL),
(10, 1, 1, 1, 1, 1, 1, 10, '2023-09-09 11:02:34', NULL),
(11, 1, 0, 1, 0, 1, 1, 11, '2023-09-09 11:02:34', NULL),
(12, 1, 1, 1, 1, 1, 1, 12, NULL, NULL),
(13, 1, 1, 1, 1, 1, 1, 13, NULL, NULL),
(14, 1, 1, 1, 1, 1, 1, 14, NULL, NULL),
(15, 1, 1, 1, 1, 1, 1, 15, NULL, NULL),
(16, 1, 1, 1, 1, 1, 1, 16, NULL, NULL),
(17, 1, 1, 1, 1, 1, 1, 17, NULL, NULL),
(18, 1, 1, 1, 1, 1, 1, 18, NULL, NULL),
(19, 1, 1, 1, 1, 1, 1, 19, NULL, NULL),
(20, 1, 1, 1, 1, 1, 1, 20, NULL, NULL),
(21, 1, 1, 1, 1, 1, 1, 21, NULL, NULL),
(22, 1, 1, 1, 1, 1, 1, 22, NULL, NULL),
(27, 1, 1, 1, 1, 1, 1, 23, NULL, NULL),
(29, 1, 1, 1, 1, 1, 1, 24, NULL, NULL),
(34, 1, 1, 1, 1, 1, 1, 25, NULL, NULL),
(41, 1, 1, 1, 1, 1, 3, 24, NULL, NULL),
(42, 1, 0, 0, 0, 0, 3, 14, NULL, NULL),
(43, 1, 1, 1, 1, 1, 3, 18, NULL, NULL),
(44, 1, 1, 1, 1, 1, 3, 17, NULL, NULL),
(45, 1, 1, 1, 1, 1, 3, 21, NULL, NULL),
(46, 1, 0, 0, 0, 0, 3, 19, NULL, NULL),
(47, 1, 1, 1, 1, 1, 4, 24, NULL, NULL),
(48, 1, 1, 1, 1, 1, 4, 14, NULL, NULL),
(49, 1, 1, 1, 1, 1, 4, 19, NULL, NULL),
(50, 1, 1, 1, 1, 1, 2, 14, NULL, NULL),
(51, 1, 1, 1, 1, 1, 2, 19, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_settings`
--

CREATE TABLE `cms_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `content_input_type` varchar(255) DEFAULT NULL,
  `dataenum` varchar(255) DEFAULT NULL,
  `helper` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_setting` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_settings`
--

INSERT INTO `cms_settings` (`id`, `name`, `content`, `content_input_type`, `dataenum`, `helper`, `created_at`, `updated_at`, `group_setting`, `label`) VALUES
(1, 'login_background_color', NULL, 'text', NULL, 'Input hexacode', '2023-09-09 11:02:34', NULL, 'Login Register Style', 'Login Background Color'),
(2, 'login_font_color', NULL, 'text', NULL, 'Input hexacode', '2023-09-09 11:02:34', NULL, 'Login Register Style', 'Login Font Color'),
(3, 'login_background_image', NULL, 'upload_image', NULL, NULL, '2023-09-09 11:02:34', NULL, 'Login Register Style', 'Login Background Image'),
(4, 'email_sender', 'support@crudbooster.com', 'text', NULL, NULL, '2023-09-09 11:02:34', NULL, 'Email Setting', 'Email Sender'),
(5, 'smtp_driver', 'mail', 'select', 'smtp,mail,sendmail', NULL, '2023-09-09 11:02:34', NULL, 'Email Setting', 'Mail Driver'),
(6, 'smtp_host', '', 'text', NULL, NULL, '2023-09-09 11:02:34', NULL, 'Email Setting', 'SMTP Host'),
(7, 'smtp_port', '25', 'text', NULL, 'default 25', '2023-09-09 11:02:34', NULL, 'Email Setting', 'SMTP Port'),
(8, 'smtp_username', '', 'text', NULL, NULL, '2023-09-09 11:02:34', NULL, 'Email Setting', 'SMTP Username'),
(9, 'smtp_password', '', 'text', NULL, NULL, '2023-09-09 11:02:34', NULL, 'Email Setting', 'SMTP Password'),
(10, 'appname', 'Tracer Study', 'text', NULL, NULL, '2023-09-09 11:02:34', NULL, 'Application Setting', 'Application Name'),
(11, 'default_paper_size', 'Legal', 'text', NULL, 'Paper size, ex : A4, Legal, etc', '2023-09-09 11:02:34', NULL, 'Application Setting', 'Default Paper Print Size'),
(12, 'logo', 'uploads/2023-09/25434c07f46401817a57538298c2b481.png', 'upload_image', NULL, NULL, '2023-09-09 11:02:34', NULL, 'Application Setting', 'Logo'),
(13, 'favicon', 'uploads/2023-09/543860a468ef1884025039fc831528ad.png', 'upload_image', NULL, NULL, '2023-09-09 11:02:34', NULL, 'Application Setting', 'Favicon'),
(14, 'api_debug_mode', 'true', 'select', 'true,false', NULL, '2023-09-09 11:02:34', NULL, 'Application Setting', 'API Debug Mode'),
(15, 'google_api_key', NULL, 'text', NULL, NULL, '2023-09-09 11:02:34', NULL, 'Application Setting', 'Google API Key'),
(16, 'google_fcm_key', NULL, 'text', NULL, NULL, '2023-09-09 11:02:34', NULL, 'Application Setting', 'Google FCM Key');

-- --------------------------------------------------------

--
-- Table structure for table `cms_statistics`
--

CREATE TABLE `cms_statistics` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_statistic_components`
--

CREATE TABLE `cms_statistic_components` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_statistics` int(11) DEFAULT NULL,
  `componentID` varchar(255) DEFAULT NULL,
  `component_name` varchar(255) DEFAULT NULL,
  `area_name` varchar(55) DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `config` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_users`
--

CREATE TABLE `cms_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL COMMENT 'User/User company/User student => null, company, student',
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_users`
--

INSERT INTO `cms_users` (`id`, `name`, `photo`, `email`, `password`, `id_cms_privileges`, `created_at`, `updated_at`, `status`, `type`, `company_id`, `student_id`, `university_id`) VALUES
(1, 'Super Admin', NULL, 'admin@crudbooster.com', '$2y$10$uh6L8xpyJA/bGMyZV9M/mu5AekmKwrMs7SGPqDmRJaedmAL0UBqwe', 1, '2023-09-09 11:02:34', NULL, 'Active', NULL, NULL, NULL, NULL),
(2, 'Nurul Annisa', 'uploads/1/2023-09/372249045_1508204340016544_2099313708171571733_n.jpg', 'nurul.annisa@gmail.com', '$2y$10$ZDbd3qyBPIJqTfPUCrvP..TrbvkJ8HUSa0bS6PlXmb88eQCZ/fSba', 1, '2023-09-09 13:18:43', NULL, 'Active', NULL, NULL, NULL, NULL),
(7, 'Mas Ditya', 'uploads/1/2023-09/images.jpg', '111202113265@mhs.dinus.ac.id', '$2y$10$o.pexyR88xIc6AnnNzqJqeOQ8R/JLkAxyhlmViih15Mw4jpcfh9MK', 4, '2023-09-24 10:42:14', '2023-09-25 11:45:37', 'Active', 'student', NULL, 4, NULL),
(8, 'NABILLA NUR EKA FITRIANI', NULL, '111202113256@mhs.dinus.ac.id', '$2y$10$ATNVG2KjESpE9Xfcqj6mmebsokKoO2yn/igy1lCw/Wdf0ja/7Vr.C', 4, '2023-09-25 20:15:12', NULL, 'Active', 'student', NULL, 5, NULL),
(11, 'Aditya HA', NULL, '111@mhs.dinus.ac.id', '$2y$10$SbbnqxZYpvP/AXfe.FLq2.6L/amKLgHYGBNZS6PXZ46N9BqghaK7a', 4, '2023-10-10 19:21:54', NULL, NULL, 'student', NULL, 8, NULL),
(12, 'Nirmala Satya Development', NULL, 'nirmala@gmail.com', '$2y$10$rdyULH54GmIlLsnXN0Ickedy.J6byTmxSWJFFabrCCXmdImTpYMgW', 3, '2023-10-10 19:38:33', NULL, NULL, 'company', 3, NULL, NULL),
(13, 'PT Mencari cinta sejati', NULL, 'cinta@gmail.com', '$2y$10$0yX2MJ.iYOJd7nR.ViL5oOkrFLMsLNCggtFieQvn3dnSdidswg3c6', 3, '2023-10-10 19:39:28', NULL, NULL, 'company', 1, NULL, NULL),
(14, 'UDINUS', NULL, 'dinus@gmail.com', '$2y$10$0yX2MJ.iYOJd7nR.ViL5oOkrFLMsLNCggtFieQvn3dnSdidswg3c6', 2, '2023-10-10 21:52:24', NULL, NULL, 'university', NULL, NULL, 1),
(15, 'tes univ', NULL, 'univtes@gmail.com', '$2y$10$QPks4akLd0KQb5QTNwZSXewQuruK8GcJsOz4Bv1eXDF/tVQ69TzS2', 2, '2023-10-10 22:01:38', NULL, NULL, 'university', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bussiness_field` varchar(255) NOT NULL COMMENT 'Bidang Usaha',
  `location` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `logo`, `name`, `bussiness_field`, `location`, `about`, `created_at`, `updated_at`, `email`) VALUES
(1, 'uploads/1/2023-09/img_10.png', 'PT Mencari cinta sejati', 'Software House', 'Semarang', '<p>Visi :</p><ol><li>&nbsp;&nbsp;&nbsp; menjadikan indonesia lebih maju</li></ol><p>Misi :</p><ol><li>&nbsp;&nbsp;&nbsp;&nbsp;Cari Uang<br></li></ol>', '2023-09-09 12:16:18', '2023-10-10 19:40:11', 'cinta@gmail.com'),
(3, 'uploads/1/2023-09/74834a9d_c46e_4fec_9b9a_0271ce55a49c.png', 'Nirmala Satya Development', 'Komputer', 'Kota Adm. Jakarta Utara (DKI Jakarta)', '<p>Nirmala Satya Development (NS Development) adalah Sistem manajemen \r\ntalenta yang terintegrasi, Proses penyajian data cepat dan akurat, \r\nMenghemat biaya, Mempersingkat waktu dalam proses rekrutmen dibandingkan\r\n dengan metode konvensional.<br></p>', '2023-09-24 06:43:14', '2023-10-10 19:40:03', 'nirmala@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `program_study_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `sallary` varchar(255) NOT NULL,
  `placement` varchar(255) NOT NULL COMMENT 'penempatan',
  `description` text NOT NULL,
  `responsibility` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `job_category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `company_id`, `program_study_id`, `title`, `experience`, `job_type`, `position`, `sallary`, `placement`, `description`, `responsibility`, `created_at`, `updated_at`, `job_category_id`) VALUES
(1, 1, 2, 'Staff Admin', 'Fresh Graduate', 'Full Time', 'Staff', '3', 'Semarang', '<p>Sebagai Desainer Produk, Anda akan bekerja dalam Tim Pengiriman Produk yang menyatu dengan bakat UX, teknik, produk, dan data. Anda akan membantu tim merancang antarmuka cantik yang memecahkan tantangan bisnis bagi klien kami. Kami bekerja dengan sejumlah bank Tier 1 dalam membangun aplikasi berbasis web untuk alur kerja pengelolaan AML, KYC, dan Daftar Sanksi. Peran ini sangat ideal jika Anda ingin mengalihkan karir Anda ke arena FinTech atau Big Data.</p>', '<p>asd<br></p>', '2023-09-09 12:57:43', '2023-09-25 20:09:42', 2),
(4, 3, 1, 'Design Graphic Internship', 'Fresh Graduate', 'Full Time', 'Internship', '3.5', 'Jakarta', '<ol><li><span><span><span>Membuat design untuk sosial media secara kreatif </span></span></span></li><li><span><span><span>Menyiapkan segala material untuk diubah menjadi visual</span></span></span></li><li><span><span><span>&nbsp;Membuat desain grafis dan grafis motion </span></span></span></li><li><span><span><span>&nbsp;Melakukan quality check terhadap materi konten sebelum diberikan ke social media spesialis untuk dipublikasikan </span></span></span></li></ol><p></p><p><br></p>', '<ol><li>Semester akhir dari jurusan DKV atau sejenisnya</li><li>Familiar dengan aplikasi design (adobe family)</li><li>kreatif</li><li>mengikuti trend media sosial<br></li></ol>', '2023-09-24 06:45:16', '2023-09-25 20:08:34', 2),
(5, 3, 1, 'tes pekerjaan', 'Minimal 1 tahun', 'Sementara', 'staff', '1', 'smg', '<p>asd<br></p>', '<p>asd<br></p>', '2023-10-10 21:17:35', NULL, 1),
(6, 3, 1, 'tes pekerjaan', 'Minimal 1 tahun', 'Sementara', 'staff', '1', 'smg', '<p>asd<br></p>', '<p>asd<br></p>', '2023-10-10 21:17:50', NULL, 1),
(7, 3, 1, 'tes pekerjaan', 'Minimal 1 tahun', 'Sementara', 'staff', '1', 'smg', '<p>asd<br></p>', '<p>asd<br></p>', '2023-10-10 21:18:17', NULL, 1),
(8, 3, 1, 'tes pekerjaan', 'Minimal 1 tahun', 'Sementara', 'staff', '1', 'smg', '<p>asd<br></p>', '<p>asd<br></p>', '2023-10-10 21:18:25', NULL, 1),
(9, 3, 1, 'tes pekerjaan', 'Minimal 1 tahun', 'Sementara', 'staff', '1', 'smg', '<p>asd<br></p>', '<p>asd<br></p>', '2023-10-10 21:24:30', NULL, 1),
(10, 3, 1, 'tes pekerjaan', 'Minimal 1 tahun', 'Sementara', 'staff', '1', 'smg', '<p>asd<br></p>', '<p>asd<br></p>', '2023-10-10 21:24:55', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_applies`
--

CREATE TABLE `job_applies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `resume_file` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL DEFAULT 'waiting_verification' COMMENT 'Menunggu Verifikasi => Wawancara/Interview => Selesai',
  `status` varchar(255) NOT NULL DEFAULT 'pending' COMMENT 'Pending => Rejected/Ditolak => Aprroved/Diterima',
  `interview_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon_class` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `icon_class`, `name`, `created_at`, `updated_at`) VALUES
(1, 'uim-layers-alt', 'IT & Software', '2023-09-13 11:07:06', NULL),
(2, 'uim-airplay', 'Teknologi', '2023-09-13 11:07:17', NULL),
(3, 'uim-bag', 'Pemerintahan', '2023-09-13 11:07:27', NULL),
(4, 'uim-user-md', 'Accounting / Keuangan', '2023-09-13 11:07:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `level_studies`
--

CREATE TABLE `level_studies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level_studies`
--

INSERT INTO `level_studies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'S1', '2023-09-09 12:11:12', NULL),
(2, 'D3', '2023-09-09 12:11:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_08_07_145904_add_table_cms_apicustom', 1),
(4, '2016_08_07_150834_add_table_cms_dashboard', 1),
(5, '2016_08_07_151210_add_table_cms_logs', 1),
(6, '2016_08_07_151211_add_details_cms_logs', 1),
(7, '2016_08_07_152014_add_table_cms_privileges', 1),
(8, '2016_08_07_152214_add_table_cms_privileges_roles', 1),
(9, '2016_08_07_152320_add_table_cms_settings', 1),
(10, '2016_08_07_152421_add_table_cms_users', 1),
(11, '2016_08_07_154624_add_table_cms_menus_privileges', 1),
(12, '2016_08_07_154624_add_table_cms_moduls', 1),
(13, '2016_08_17_225409_add_status_cms_users', 1),
(14, '2016_08_20_125418_add_table_cms_notifications', 1),
(15, '2016_09_04_033706_add_table_cms_email_queues', 1),
(16, '2016_09_16_035347_add_group_setting', 1),
(17, '2016_09_16_045425_add_label_setting', 1),
(18, '2016_09_17_104728_create_nullable_cms_apicustom', 1),
(19, '2016_10_01_141740_add_method_type_apicustom', 1),
(20, '2016_10_01_141846_add_parameters_apicustom', 1),
(21, '2016_10_01_141934_add_responses_apicustom', 1),
(22, '2016_10_01_144826_add_table_apikey', 1),
(23, '2016_11_14_141657_create_cms_menus', 1),
(24, '2016_11_15_132350_create_cms_email_templates', 1),
(25, '2016_11_15_190410_create_cms_statistics', 1),
(26, '2016_11_17_102740_create_cms_statistic_components', 1),
(27, '2017_06_06_164501_add_deleted_at_cms_moduls', 1),
(28, '2019_08_19_000000_create_failed_jobs_table', 1),
(29, '2023_09_09_180003_create_program_studies_table', 2),
(30, '2023_09_09_180017_create_level_studies_table', 2),
(31, '2023_09_09_181532_create_students_table', 3),
(32, '2023_09_09_181743_create_companies_table', 3),
(33, '2023_09_09_182129_add_field_to_cms_users_table', 3),
(34, '2023_09_09_182432_create_tags_table', 3),
(35, '2023_09_09_183257_create_tags_students_table', 3),
(36, '2023_09_09_183307_create_tags_companies_table', 3),
(37, '2023_09_09_194555_create_jobs_table', 4),
(38, '2023_09_09_194607_create_job_applies_table', 4),
(39, '2023_09_13_171655_change_field_on_program_studies_table', 5),
(41, '2023_09_13_172008_change_field_on_jobs_table', 7),
(42, '2023_09_13_171922_create_tags_jobs_table', 8),
(43, '2023_09_13_172737_change_field_v1_on_jobs_table', 9),
(44, '2023_09_13_173347_create_universities_table', 10),
(45, '2023_09_13_173723_add_field_university_id_on_students_table', 11),
(46, '2023_09_13_180146_create_job_categories_table', 12),
(47, '2023_09_13_180432_add_job_category_id_on_jobs_table', 12),
(48, '2023_09_25_115744_add_field_job_id_on_job_applies', 13),
(49, '2023_09_25_183808_add_field_university_id_on_cms_users', 14),
(50, '2023_10_11_023319_add_email_field_on_companies_table', 15),
(51, '2023_10_11_023320_create_whatsapp_logs_table', 16),
(52, '2023_10_11_041355_add_phone_field_on_students_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_studies`
--

CREATE TABLE `program_studies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_studies`
--

INSERT INTO `program_studies` (`id`, `faculty`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Fakultas Ilmu Komputer', 'Teknik Informatika', '2023-09-09 12:11:47', '2023-09-13 20:12:51'),
(2, 'FKES', 'Kesehatan Masyarakat', '2023-09-09 12:12:06', NULL),
(3, 'TES', '111', '2023-09-13 10:18:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_study_id` bigint(20) UNSIGNED NOT NULL,
  `level_study_id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ipk` double NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `personal_email` varchar(255) DEFAULT NULL,
  `approved_job_apply_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `university_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'UI/UX', '2023-09-09 12:13:21', NULL),
(2, 'Web', '2023-09-09 13:02:52', NULL),
(3, 'Mobile', '2023-09-09 13:02:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags_companies`
--

CREATE TABLE `tags_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tags_id` bigint(20) UNSIGNED NOT NULL,
  `companies_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags_companies`
--

INSERT INTO `tags_companies` (`id`, `tags_id`, `companies_id`, `created_at`, `updated_at`) VALUES
(16, 1, 3, NULL, NULL),
(17, 3, 1, NULL, NULL),
(18, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags_jobs`
--

CREATE TABLE `tags_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tags_id` bigint(20) UNSIGNED NOT NULL,
  `jobs_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags_jobs`
--

INSERT INTO `tags_jobs` (`id`, `tags_id`, `jobs_id`, `created_at`, `updated_at`) VALUES
(11, 1, 4, NULL, NULL),
(12, 3, 1, NULL, NULL),
(13, 1, 1, NULL, NULL),
(14, 2, 1, NULL, NULL),
(15, 3, 5, NULL, NULL),
(16, 1, 5, NULL, NULL),
(17, 3, 6, NULL, NULL),
(18, 1, 6, NULL, NULL),
(19, 3, 7, NULL, NULL),
(20, 1, 7, NULL, NULL),
(21, 3, 8, NULL, NULL),
(22, 1, 8, NULL, NULL),
(23, 3, 9, NULL, NULL),
(24, 1, 9, NULL, NULL),
(25, 3, 10, NULL, NULL),
(26, 1, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags_students`
--

CREATE TABLE `tags_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tags_id` bigint(20) UNSIGNED NOT NULL,
  `students_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `logo`, `name`, `phone_number`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'uploads/1/2023-09/images.jpg', 'UDINUS', '089506373551', 'dinus@gmail.com', 'tes', '2023-09-13 10:39:59', '2023-10-10 21:52:24'),
(2, 'uploads/1/2023-10/desain_tanpa_judul.jpg', 'tes univ', '0895063735512', 'univtes@gmail.com', 'disana', '2023-10-10 22:01:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `whatsapp_logs`
--

CREATE TABLE `whatsapp_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT 'Pemberitahuan',
  `message` text NOT NULL,
  `status` enum('unproccessed','need_resend','success_send','failed_send') NOT NULL DEFAULT 'unproccessed',
  `failed_reason` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `whatsapp_logs`
--

INSERT INTO `whatsapp_logs` (`id`, `phone_number`, `title`, `message`, `status`, `failed_reason`, `created_at`, `updated_at`) VALUES
(1, '6289506373551', 'Pemberitahuan', 'adjiwajising', 'success_send', NULL, NULL, '2023-10-10 21:12:40'),
(2, '6289506373551', 'Pemberitahuan', 'Hai, Bagas Aditya\nPekerjaan baru (tes pekerjaan) telah ditambahkan, cek segera dan kirim resume kamu di http://127.0.0.1:8000/job/detail/10', 'success_send', 'cURL error 7: Failed to connect to 103.189.234.216 port 5001 after 1009 ms: Couldn\'t connect to server (see https://curl.haxx.se/libcurl/c/libcurl-errors.html) for http://103.189.234.216:5001/send-message', NULL, '2023-10-13 01:29:42'),
(3, '6289506373551', 'Pemberitahuan', 'DEBUG ON \n\n📣[INFO LOWONGAN KERJA]📢\nSelamat Pagi Mas Ditya,\n\nDibutuhkan Jadi Pacar Sementara\n\nUntuk Lebih Jelaskan Silahkan langsung Klik Link Pendaftaran dibawah ini\n\nhttps://tracerstudy.id/job/detail/11\n\nBest Regards,\nNURUL ANISA SRI WINARSIH\nPembina Pekan Kreatif Mahasiswa\nUniversitas Dian Nuswantoro\nJl. Imam Bonjol No.207, Pendrikan Kidul\nSemarang - Indonesia\n(WA), +62 811-2611-994\nWeb   : https://tracerstudy.id\nEmail : tracerstudy.dev@gmail.com\n\nWaktu: 13/10/2023 08:27:13 AM', 'success_send', 'cURL error 7: Failed to connect to 103.189.234.216 port 5001 after 1052 ms: Couldn\'t connect to server (see https://curl.haxx.se/libcurl/c/libcurl-errors.html) for http://103.189.234.216:5001/send-message', NULL, '2023-10-13 01:35:37'),
(4, '6289506373551', 'Pemberitahuan', 'Hai, NABILLA NUR EKA FITRIANI\nPekerjaan baru (tes pekerjaan) telah ditambahkan, cek segera dan kirim resume kamu di http://127.0.0.1:8000/job/detail/10', 'success_send', 'cURL error 7: Failed to connect to 103.189.234.216 port 5001 after 1061 ms: Couldn\'t connect to server (see https://curl.haxx.se/libcurl/c/libcurl-errors.html) for http://103.189.234.216:5001/send-message', NULL, '2023-10-13 01:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_apikey`
--
ALTER TABLE `cms_apikey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_logs`
--
ALTER TABLE `cms_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_menus`
--
ALTER TABLE `cms_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_menus_privileges`
--
ALTER TABLE `cms_menus_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_moduls`
--
ALTER TABLE `cms_moduls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_notifications`
--
ALTER TABLE `cms_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_privileges`
--
ALTER TABLE `cms_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_settings`
--
ALTER TABLE `cms_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_statistics`
--
ALTER TABLE `cms_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_users`
--
ALTER TABLE `cms_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cms_users_university_id_foreign` (`university_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_company_id_foreign` (`company_id`);

--
-- Indexes for table `job_applies`
--
ALTER TABLE `job_applies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applies_company_id_foreign` (`company_id`),
  ADD KEY `job_applies_student_id_foreign` (`student_id`),
  ADD KEY `job_applies_job_id_foreign` (`job_id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_studies`
--
ALTER TABLE `level_studies`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `program_studies`
--
ALTER TABLE `program_studies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_program_study_id_foreign` (`program_study_id`),
  ADD KEY `students_level_study_id_foreign` (`level_study_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags_companies`
--
ALTER TABLE `tags_companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tags_companies_tag_id_foreign` (`tags_id`),
  ADD KEY `tags_companies_company_id_foreign` (`companies_id`);

--
-- Indexes for table `tags_jobs`
--
ALTER TABLE `tags_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tags_jobs_tags_id_foreign` (`tags_id`),
  ADD KEY `tags_jobs_jobs_id_foreign` (`jobs_id`);

--
-- Indexes for table `tags_students`
--
ALTER TABLE `tags_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tags_students_tag_id_foreign` (`tags_id`),
  ADD KEY `tags_students_student_id_foreign` (`students_id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `whatsapp_logs`
--
ALTER TABLE `whatsapp_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_apikey`
--
ALTER TABLE `cms_apikey`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_logs`
--
ALTER TABLE `cms_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `cms_menus`
--
ALTER TABLE `cms_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cms_menus_privileges`
--
ALTER TABLE `cms_menus_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `cms_moduls`
--
ALTER TABLE `cms_moduls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `cms_notifications`
--
ALTER TABLE `cms_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cms_privileges`
--
ALTER TABLE `cms_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `cms_settings`
--
ALTER TABLE `cms_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cms_statistics`
--
ALTER TABLE `cms_statistics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `job_applies`
--
ALTER TABLE `job_applies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `level_studies`
--
ALTER TABLE `level_studies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `program_studies`
--
ALTER TABLE `program_studies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags_companies`
--
ALTER TABLE `tags_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tags_jobs`
--
ALTER TABLE `tags_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tags_students`
--
ALTER TABLE `tags_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `whatsapp_logs`
--
ALTER TABLE `whatsapp_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cms_users`
--
ALTER TABLE `cms_users`
  ADD CONSTRAINT `cms_users_university_id_foreign` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_applies`
--
ALTER TABLE `job_applies`
  ADD CONSTRAINT `job_applies_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_applies_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_applies_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_level_study_id_foreign` FOREIGN KEY (`level_study_id`) REFERENCES `level_studies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_program_study_id_foreign` FOREIGN KEY (`program_study_id`) REFERENCES `program_studies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tags_companies`
--
ALTER TABLE `tags_companies`
  ADD CONSTRAINT `tags_companies_company_id_foreign` FOREIGN KEY (`companies_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tags_companies_tag_id_foreign` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tags_jobs`
--
ALTER TABLE `tags_jobs`
  ADD CONSTRAINT `tags_jobs_jobs_id_foreign` FOREIGN KEY (`jobs_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tags_jobs_tags_id_foreign` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tags_students`
--
ALTER TABLE `tags_students`
  ADD CONSTRAINT `tags_students_student_id_foreign` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tags_students_tag_id_foreign` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
