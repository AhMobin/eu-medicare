-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 12:54 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `phone`, `email`, `password`, `admin_photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Profile', '01620322147', 'admin@mail.com', '$2y$10$zAzNhiJnh6ymOX2oiwAZtuxqHHQI47akRPS96AYxMhznKTsv7htYa', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialize_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `appoint_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `problem_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `specialize_id`, `doctor_id`, `appoint_date`, `problem_desc`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 4, '2020-01-26', 'discuss about some problems', 2, '2020-01-25 23:35:00', NULL),
(2, '2', 1, 4, '2020-01-26', 'general problem', 2, '2020-01-26 01:00:00', NULL),
(3, '4', 3, 3, '2020-01-28', 'Muscle problem', 1, NULL, NULL),
(4, '7', 4, 5, '2020-01-28', 'Internal Problem', 2, '2020-01-25 11:56:38', NULL),
(5, '3', 1, 4, '2020-01-31', 'Tonsil problem', 0, '2020-01-26 09:07:25', NULL),
(6, '4', 2, 2, '2020-01-29', 'Frustration depression', 0, '2020-01-26 12:52:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blood_donors`
--

CREATE TABLE `blood_donors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `donor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donor_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donor_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(5) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_donors`
--

INSERT INTO `blood_donors` (`id`, `donor_id`, `donor_name`, `donor_phone`, `donor_email`, `blood_group`, `status`, `created_at`, `updated_at`) VALUES
(1, '161400014', 'Abu Horaira Mobin', '01620327185', 'ahmobin1515@gmail.com', 'a+', 0, '2020-01-25 09:25:40', '2020-01-25 09:25:40'),
(2, '161400022', 'Kudrate E Elahi', '0164569871', 'kudrat@mail.com', 'b-', 1, '2020-01-25 09:26:02', '2020-01-25 09:26:02'),
(3, '161400001', 'Hussain Imam Shanto', '01234654789', 'shanto@mail.com', 'ab+', 0, '2020-01-25 09:26:55', '2020-01-25 09:26:55'),
(4, '161400011', 'Syed Anas', '01236547896', 'anas@mail.com', 'a-', 0, '2020-01-25 09:27:22', '2020-01-25 09:27:22'),
(5, '161400017', 'Rasif Ismam', '01236547896', 'rasif@mail.com', 'ab-', 1, '2020-01-25 12:03:05', '2020-01-25 12:03:05'),
(6, '161400006', 'Kaniz Afrin', '01236547896', 'kaniz@mail.com', 'a-', 0, '2020-02-03 10:07:04', '2020-02-03 10:07:04');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialize_id` int(11) NOT NULL,
  `consult_days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consult_start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consult_end` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `full_name`, `phone`, `email`, `password`, `specialize_id`, `consult_days`, `consult_start`, `consult_end`, `doctor_photo`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Main Doctor', '012365479', 'doctor@mail.com', '$2y$10$zAzNhiJnh6ymOX2oiwAZtuxqHHQI47akRPS96AYxMhznKTsv7htYa', 1, 'sun, mon', '11:00', '13:00', NULL, 1, NULL, NULL, NULL),
(2, 'Nowshin Nahar', '01977677899', 'nowshin@easternuni.edu.bd', '$2y$10$zAzNhiJnh6ymOX2oiwAZtuxqHHQI47akRPS96AYxMhznKTsv7htYa', 2, 'wed', '11:00', '16:00', NULL, 1, NULL, NULL, NULL),
(3, 'Dr Mohammad Nurul Ashraf', '01712649947', 'doctor@easternuni.edu.bd', '$2y$10$zAzNhiJnh6ymOX2oiwAZtuxqHHQI47akRPS96AYxMhznKTsv7htYa', 3, 'tue', '10:00', '02:00', NULL, 1, NULL, NULL, NULL),
(4, 'Dr. Ziaul Karim', '01236547895', 'ziaul@mail.com', '$2y$10$CrO43QyhrabeisEdge8J8.dzyNISEPEh4Dmqn20gzaLwhBK.hn.rm', 1, 'fri', '10:00', '13:00', NULL, 1, NULL, NULL, NULL),
(5, 'Dr. Nasrin Zulfikar', '0123547841', 'nasrin@mail.com', '$2y$10$.L/LDk/XoHwC0wQ4r7u6de2HOx4SMzI3ZxU9iScQMfMqD9pctAdk2', 4, 'mon,tues', '11:00', '15:00', NULL, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emergency_bloods`
--

CREATE TABLE `emergency_bloods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `req_blood_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `req_from_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emergency_bloods`
--

INSERT INTO `emergency_bloods` (`id`, `req_blood_group`, `req_from_number`, `patient_location`, `status`, `created_at`, `updated_at`) VALUES
(1, 'a+', '01620327185', 'Dhaka', 0, NULL, NULL);

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
-- Table structure for table `initial_tests`
--

CREATE TABLE `initial_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appoint_id` int(11) NOT NULL,
  `body_temperature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_pressure` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_suger` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wbc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rbc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hgb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `others` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `initial_tests`
--

INSERT INTO `initial_tests` (`id`, `appoint_id`, `body_temperature`, `blood_pressure`, `blood_suger`, `weight`, `wbc`, `rbc`, `hgb`, `others`, `created_at`, `updated_at`) VALUES
(1, 1, '98', '120/140', '108', '54', '304 (H)', '1.6 (L)', '3.1 (L)', 'none', NULL, NULL),
(2, 2, '99', '140/95', '108', '90', NULL, NULL, NULL, 'None', NULL, NULL),
(3, 4, '99', '110/70', '108', '70', '304 (H)', '1.6 (L)', '3.1 (L)', 'none', NULL, NULL);

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
(4, '2020_01_08_161829_create_admins_table', 2),
(5, '2020_01_08_163122_create_doctors_table', 2),
(6, '2020_01_13_212554_create_specializes_table', 3),
(7, '2020_01_14_142843_create_specialized_doctors_table', 4),
(8, '2020_01_14_173920_create_appointments_table', 5),
(9, '2020_01_17_144900_create_initial_tests_table', 6),
(10, '2020_01_17_145035_create_problem_descriptions_table', 6),
(11, '2020_01_17_145105_create_treatments_table', 6),
(12, '2020_01_24_080344_create_problem_descs_table', 7),
(13, '2020_01_24_080527_create_initial_tests_table', 7),
(14, '2020_01_24_080556_create_treatments_table', 7),
(15, '2020_01_25_110620_create_blood_donors_table', 8),
(16, '2020_01_25_111106_create_newsletters_table', 8),
(17, '2020_02_03_153609_create_emergency_bloods_table', 9),
(18, '2020_02_03_162548_create_emergency_bloods_table', 10),
(19, '2020_02_23_091704_create_notifications_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscribers_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
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
-- Table structure for table `problem_descs`
--

CREATE TABLE `problem_descs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appoint_id` int(11) NOT NULL,
  `problem` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `problem_descs`
--

INSERT INTO `problem_descs` (`id`, `appoint_id`, `problem`, `created_at`, `updated_at`) VALUES
(1, 1, 'discussion over', NULL, NULL),
(2, 2, 'high blood pressure - hypertension', NULL, NULL),
(3, 4, 'problem', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specializes`
--

CREATE TABLE `specializes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `specialize_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specializes`
--

INSERT INTO `specializes` (`id`, `specialize_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Medicine', 1, NULL, NULL),
(2, 'Psychology', 1, NULL, NULL),
(3, 'Physiotherapy', 1, NULL, NULL),
(4, 'Gynecology', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

CREATE TABLE `treatments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appoint_id` int(11) NOT NULL,
  `new_test_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdc_name_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdc_dose_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdc_dur_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdc_name_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdc_dose_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdc_dur_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdc_name_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdc_dose_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdc_dur_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdc_name_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdc_dose_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdc_dur_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdc_name_five` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdc_dose_five` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdc_dur_five` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_mdc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `treatments`
--

INSERT INTO `treatments` (`id`, `appoint_id`, `new_test_name`, `mdc_name_one`, `mdc_dose_one`, `mdc_dur_one`, `mdc_name_two`, `mdc_dose_two`, `mdc_dur_two`, `mdc_name_three`, `mdc_dose_three`, `mdc_dur_three`, `mdc_name_four`, `mdc_dose_four`, `mdc_dur_four`, `mdc_name_five`, `mdc_dose_five`, `mdc_dur_five`, `extra_mdc`, `created_at`, `updated_at`) VALUES
(1, 1, 'urine test', 'md 1', '3time', '3days', 'md 2', '2times', '5days', 'md 3', '3times', '5days', 'md 4', 'when pain', '7days', 'md 5', '6times', '5days', 'take care', NULL, NULL),
(2, 2, NULL, 'Revotril 0.5', 'before dinner - 1tbl', '10days with 1day gap', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'daily physical exercise', NULL, NULL),
(3, 4, NULL, 'md 1', '3time', '7days', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'appoint me after dose will be finished', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institute_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(19) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `institute_id`, `name`, `phone`, `email`, `email_verified_at`, `gender`, `password`, `blood_group`, `user_photo`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '161400014', 'Abu Horaira Mobin', '01620327185', 'ahmobin1515@gmail.com', NULL, 'male', '$2y$10$zAzNhiJnh6ymOX2oiwAZtuxqHHQI47akRPS96AYxMhznKTsv7htYa', 'A+', NULL, 1, NULL, NULL, NULL),
(2, '161400001', 'Hussain Imam Shanto', '01517092758', 'hussain.imambd@gmail.com', NULL, 'male', '$2y$10$QaoLuzScxd6p2pnbe/cP7etVCEYxA5KJZpUVbfEoP2/fCgWqYX8g.', 'A-', NULL, 1, NULL, '2020-01-09 20:43:58', '2020-01-09 20:43:58'),
(3, '161400011', 'Syed M R Anas', '01300586874', 'anas@mail.com', NULL, 'male', '$2y$10$ieiRPx07pnUmxGgesNY1sOeFk7PRClX.4OXkElWe3pHY41g.4.ejy', 'B+', NULL, 1, NULL, '2020-01-13 07:55:27', '2020-01-13 07:55:27'),
(4, '161400022', 'Kudrat-E-Elahi Chawdhury', '01954844212', 'mridul@mail.com', NULL, 'male', '$2y$10$.1sUvPVpCTVtnnr1PL9YAOCfkZM5GMpYoyzg6XbqlHZqpryYJ3Tzy', 'B-', NULL, 1, NULL, '2020-01-13 08:01:53', '2020-01-13 08:01:53'),
(5, '161400017', 'Rasif Ismam', '01688386763', 'rasif@mail.com', NULL, 'male', '$2y$10$aquFs7MyHarBea1kphbY3uPXiqYJGCzzOpGGCFILAJ87j2YwLfDEq', 'AB+', NULL, 0, NULL, '2020-01-17 01:50:56', '2020-01-17 01:50:56'),
(6, '161400026', 'Afsana Munni', '01700762678', 'munni@mail.com', NULL, NULL, '$2y$10$VofzmoJK6UKYG0AQWMdEPeUWGXeqW4fTh.I/e9m.j6ZgZ.nceyn4W', NULL, NULL, 0, NULL, '2020-01-17 02:08:08', '2020-01-17 02:08:08'),
(7, '161400020', 'Mubasshira Megh', '0123654789', 'megh@mail.com', NULL, NULL, '$2y$10$dJ66A/fhRBJ60URp3QAZcePRX2rUWIaYcijm5xz0BfK.x751FrR5i', NULL, NULL, 1, NULL, '2020-01-25 05:54:53', '2020-01-25 05:54:53'),
(8, '161400006', 'Kaniz Afrin', '01625288868', 'sathi@mail.com', NULL, NULL, '$2y$10$p4flLf/2zYeUm70vYOmo7.ItP6e92k0lN.03jOPQCMtXOHNuaJRLC', NULL, NULL, 0, NULL, '2020-01-30 02:49:15', '2020-01-30 02:49:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_donors`
--
ALTER TABLE `blood_donors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_email_unique` (`email`);

--
-- Indexes for table `emergency_bloods`
--
ALTER TABLE `emergency_bloods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `initial_tests`
--
ALTER TABLE `initial_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `problem_descs`
--
ALTER TABLE `problem_descs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specializes`
--
ALTER TABLE `specializes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `institute_id` (`institute_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blood_donors`
--
ALTER TABLE `blood_donors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `emergency_bloods`
--
ALTER TABLE `emergency_bloods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `initial_tests`
--
ALTER TABLE `initial_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `problem_descs`
--
ALTER TABLE `problem_descs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `specializes`
--
ALTER TABLE `specializes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `treatments`
--
ALTER TABLE `treatments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
