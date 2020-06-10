-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2020 at 03:14 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baza`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `passport` blob,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bursary_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `rec_amount` decimal(12,2) DEFAULT NULL,
  `recommendation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `awarded` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque` int(10) UNSIGNED DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `ward_id` int(11) DEFAULT NULL,
  `serial` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middleName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `box` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `county` int(11) DEFAULT NULL,
  `approved` int(11) DEFAULT NULL,
  `subcounty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sublocation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kcpeMarks` decimal(8,2) DEFAULT NULL,
  `indexNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resultslip` blob,
  `kcpeYear` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `repeatQuiz` text COLLATE utf8mb4_unicode_ci,
  `kcpeQuiz` text COLLATE utf8mb4_unicode_ci,
  `secSchoolName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classification` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `passport`, `name`, `email`, `id_no`, `reg_no`, `bursary_type`, `application_year`, `dob`, `amount`, `rec_amount`, `recommendation`, `gender`, `status`, `awarded`, `tel`, `cheque`, `year`, `ward_id`, `serial`, `firstName`, `middleName`, `lastName`, `parentName`, `box`, `alt_tel`, `county`, `approved`, `subcounty`, `location`, `sublocation`, `kcpeMarks`, `indexNo`, `resultslip`, `kcpeYear`, `repeatQuiz`, `kcpeQuiz`, `secSchoolName`, `classification`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL, NULL, NULL, NULL, 'scholarship', '2020', '2020-06-10', NULL, NULL, 'high', 'female', 1, 0, '0704 539108', NULL, 2020, 1, '21591684013', 'Angela', 'mercy', 'mac', 'mac', '30100-5253', '0704 539108', 1, 3, 'awendo', 'moi', 'moi', '405.00', '34566888', NULL, '320', 'no', 'no', 'Matu', 'National', '2020-06-09 06:26:53', '2020-06-09 11:28:09'),
(2, 6, NULL, NULL, NULL, NULL, NULL, 'scholarship', '2020', '2020-06-10', NULL, NULL, 'partially', 'female', 1, 0, '0715 511302', NULL, 2020, 1, '61591703232', 'nancy', 'martin', 'moriss', 'monica', '300001', '0704 539108', 1, NULL, 'ohio', 'mart', 'mart', '409.00', '4503932', NULL, '2021', 'mas', 'mac', 'Mantogo', 'National', '2020-06-09 11:47:12', '2020-06-09 12:23:14'),
(5, 2, NULL, NULL, 'angela@gmail.com', '303034', '132232', 'County', '2020', '2020-06-11', NULL, NULL, 'Yes', 'male', 1, 0, '0704 539108', NULL, 2020, 1, '21591781658', 'Angela', 'Mode', 'Mad', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-10 09:34:18', '2020-06-10 11:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE `budgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `county` int(11) NOT NULL,
  `ward_id` int(11) NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  `remaining` decimal(20,2) NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `county` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`id`, `year`, `county`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, '2020', 1, 1, 1, '2020-06-09 06:08:48', '2020-06-09 06:08:48'),
(2, '2020', 1, 2, 1, '2020-06-09 11:36:13', '2020-06-09 11:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Migori', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `evidence`
--

CREATE TABLE `evidence` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `inheritance` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `whyApply` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `finSupport` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialNeeds` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `OtherSpecialNeeds` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `familyConflict` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `familyHouse` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `otherDisabilities` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `siblingsInfo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hear` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hearDetails` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL,
  `applicationId` bigint(20) UNSIGNED NOT NULL,
  `year` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evidence`
--

INSERT INTO `evidence` (`id`, `user_id`, `inheritance`, `whyApply`, `finSupport`, `specialNeeds`, `OtherSpecialNeeds`, `familyConflict`, `familyHouse`, `otherDisabilities`, `siblingsInfo`, `hear`, `hearDetails`, `status`, `applicationId`, `year`, `created_at`, `updated_at`) VALUES
(1, 2, 'mac', 'MAC', 'MAC', 'MAC', 'MAC', 'MAC', 'MAC', 'MAC', 'MAC', 'School - teacher, principal or Ward Representative', 'UIO', 0, 1, 2020, '2020-06-09 06:26:54', '2020-06-09 06:26:54'),
(2, 6, 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'School - teacher, principal or Ward Representative', 'pastor', 0, 2, 2020, '2020-06-09 11:47:13', '2020-06-09 11:47:13');

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relationship` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `living` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income` decimal(20,2) DEFAULT NULL,
  `cert` blob,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `applicationId` bigint(20) UNSIGNED DEFAULT NULL,
  `who` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middleName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idNumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `box` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `G_relationship` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `county` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcounty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sublocation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`id`, `user_id`, `name`, `relationship`, `living`, `occupation`, `income`, `cert`, `tel`, `year`, `status`, `applicationId`, `who`, `firstName`, `middleName`, `lastName`, `idNumber`, `alt_tel`, `box`, `G_relationship`, `county`, `ward`, `subcounty`, `location`, `sublocation`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL, 'Alive', 'mac', NULL, NULL, '0704 539108', 2020, 0, 1, 'Father', 'mac', 'mac', 'mac', '2345678', '0704 539108', '30100-5253', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-09 06:26:53', '2020-06-09 06:26:53'),
(2, 2, NULL, NULL, 'Alive', 'mac', NULL, NULL, '0704 539108', 2020, 0, 1, 'Mother', 'mac', 'mac', 'mac', '3010075', '0704 539108', '3098765', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-09 06:26:53', '2020-06-09 06:26:53'),
(3, 2, NULL, NULL, NULL, 'mac', NULL, NULL, '0704 539108', 2020, 0, 1, 'Guardian', 'mac', 'mac', 'mac', '30989005', '0704 539108', '30100', 'mac', 'Baringo', 'mac', 'mac', 'mac', 'mac', '2020-06-09 06:26:54', '2020-06-09 06:26:54'),
(13, 2, 'Mad', 'Father', 'Alive', 'opia', '1255657.00', NULL, '0704 539108', 2020, 0, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-10 09:34:18', '2020-06-10 09:34:18'),
(14, 2, 'Poas', 'Mother', 'Alive', 'poa', '123545.00', NULL, '0704 539108', 2020, 0, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-10 09:34:18', '2020-06-10 09:34:18'),
(15, 2, 'otieno', 'Guardian', 'Alive', 'poa', '1200.00', NULL, '0704 539108', 2020, 0, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-10 09:34:18', '2020-06-10 09:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicationId` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kind` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `year` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `applicationId`, `path`, `type`, `kind`, `status`, `year`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/1591684016IMG-20200607-WA0000.jpg', 'scholarship', 'Result Slip', 0, 2020, '2020-06-09 06:26:56', '2020-06-09 06:26:56'),
(2, 1, 'uploads/1591684016carlos-muza-hpjSkU2UYSU-unsplash.jpg', 'scholarship', 'Mother’s ID/Death Cert', 0, 2020, '2020-06-09 06:26:56', '2020-06-09 06:26:56'),
(3, 1, 'uploads/1591684016IMG-20200607-WA0000.jpg', 'scholarship', 'Father’s ID/Death Cert', 0, 2020, '2020-06-09 06:26:56', '2020-06-09 06:26:56'),
(4, 1, 'uploads/1591684016receipt (8).pdf', 'scholarship', 'Other', 0, 2020, '2020-06-09 06:26:56', '2020-06-09 06:26:56'),
(5, 2, 'uploads/1591703235IMG-20200607-WA0000.jpg', 'scholarship', 'Result Slip', 0, 2020, '2020-06-09 11:47:15', '2020-06-09 11:47:15'),
(6, 2, 'uploads/1591703235carlos-muza-hpjSkU2UYSU-unsplash.jpg', 'scholarship', 'Mother’s ID/Death Cert', 0, 2020, '2020-06-09 11:47:15', '2020-06-09 11:47:15'),
(7, 2, 'uploads/1591703235carlos-muza-hpjSkU2UYSU-unsplash.jpg', 'scholarship', 'Father’s ID/Death Cert', 0, 2020, '2020-06-09 11:47:15', '2020-06-09 11:47:15'),
(8, 2, 'uploads/1591703236IMG-20200607-WA0000.jpg', 'scholarship', 'Other', 0, 2020, '2020-06-09 11:47:16', '2020-06-09 11:47:16'),
(9, 5, 'uploads/1591781658groceries.jpg', 'county', 'Recommendation letter', 0, 2020, '2020-06-10 09:34:18', '2020-06-10 09:34:18'),
(10, 5, 'uploads/1591781659kids.jpg', 'county', 'Passport photo', 0, 2020, '2020-06-10 09:34:19', '2020-06-10 09:34:19'),
(11, 5, 'uploads/1591781659groceries.jpg', 'county', 'Mother’s ID/Death Cert', 0, 2020, '2020-06-10 09:34:19', '2020-06-10 09:34:19'),
(12, 5, 'uploads/1591781659mac22.jpg', 'county', 'Guardian’s ID/Death Cert', 0, 2020, '2020-06-10 09:34:19', '2020-06-10 09:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `geographical`
--

CREATE TABLE `geographical` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicationId` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `County` int(11) NOT NULL,
  `Ward` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `Division` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sublocation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year(4) NOT NULL,
  `Village` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `polling` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `geographical`
--

INSERT INTO `geographical` (`id`, `applicationId`, `user_id`, `County`, `Ward`, `status`, `Division`, `Location`, `Sublocation`, `year`, `Village`, `polling`, `created_at`, `updated_at`) VALUES
(3, 5, 2, 1, 1, 0, 'awendo', 'awendo', 'awendo', 2020, 'awendo', 'awendo', '2020-06-10 09:34:18', '2020-06-10 09:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE `institution` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicationId` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yearofstudy` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `fees` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year(4) NOT NULL,
  `amount_paid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_branch` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`id`, `applicationId`, `user_id`, `name`, `branch`, `class`, `yearofstudy`, `status`, `fees`, `year`, `amount_paid`, `balance`, `bank`, `account`, `bank_branch`, `created_at`, `updated_at`) VALUES
(1, 5, 2, 'Masai mara', 'Narok', 'comps', '2', 0, '123003', 2020, '12355', '110648', 'KCB', '11324356', 'main', '2020-06-10 09:34:18', '2020-06-10 09:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_09_090308_create_counties_table', 1),
(9, '2019_08_09_090400_create_wards_table', 1),
(10, '2019_08_09_090534_create_applications_table', 1),
(11, '2019_08_09_090642_create_geographical_table', 1),
(12, '2019_08_09_090700_create_family_table', 1),
(13, '2019_08_09_090735_create_institution_table', 1),
(14, '2019_08_10_175519_add_ward_to_users', 1),
(15, '2019_08_11_110605_create_morefamily_table', 1),
(16, '2019_08_13_100511_create_notifications_table', 1),
(17, '2019_08_14_091216_create_configurations_table', 1),
(18, '2019_09_10_092753_add_county_to_users', 1),
(19, '2019_09_23_104221_create_budgets_table', 1),
(20, '2019_09_26_053005_add_county_to_budgets', 1),
(21, '2019_09_30_114438_add_application_id_to_morefamily', 1),
(22, '2019_09_30_114614_add_application_id_to_geographical', 1),
(23, '2019_09_30_114628_add_application_id_to_institution', 1),
(24, '2019_11_16_091607_add_county_to_configurations_table', 1),
(25, '2019_11_16_104413_add_type_to_configurations_table', 1),
(26, '2019_11_16_130357_create_evidence_table', 1),
(27, '2019_11_16_131606_create_more_evidence_table', 1),
(28, '2019_11_16_151030_create_siblings_table', 1),
(29, '2019_11_17_052826_create_files_table', 1),
(30, '2019_11_17_065741_add_polling_to_geographical_table', 1),
(31, '2019_11_17_074034_add_polling_to_institution_table', 1),
(32, '2019_11_17_135019_add_approved_to_applications', 1),
(33, '2019_11_21_183257_add_type_to_files', 1),
(34, '2019_12_01_075931_add_cheque_to_applications', 1),
(35, '2020_02_20_122038_add__application_year_to_applications', 1),
(36, '2020_02_21_103415_add_kind_to_files', 1),
(37, '2020_06_05_104629_add_columns_to_users', 1),
(38, '2020_06_06_111902_add_awarded_to_applications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `morefamily`
--

CREATE TABLE `morefamily` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicationId` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `totalSiblings` int(11) NOT NULL,
  `schoolSiblings` int(11) NOT NULL,
  `workingSiblings` int(11) NOT NULL,
  `pFees` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pFeesRelationship` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `morefamily`
--

INSERT INTO `morefamily` (`id`, `applicationId`, `user_id`, `totalSiblings`, `schoolSiblings`, `workingSiblings`, `pFees`, `pFeesRelationship`, `status`, `year`, `created_at`, `updated_at`) VALUES
(3, 5, 2, 2, 2, 0, 'poad', 'Father', 0, 2020, '2020-06-10 09:34:18', '2020-06-10 09:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `more_evidence`
--

CREATE TABLE `more_evidence` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `age` int(11) NOT NULL,
  `disability` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ailment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `abandon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `employment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `business` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `land` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `assets` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `who` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `applicationId` bigint(20) UNSIGNED NOT NULL,
  `year` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `more_evidence`
--

INSERT INTO `more_evidence` (`id`, `user_id`, `age`, `disability`, `ailment`, `abandon`, `employment`, `business`, `land`, `assets`, `who`, `status`, `applicationId`, `year`, `created_at`, `updated_at`) VALUES
(1, 2, 23, 'MAC', 'MAC', 'MAC', 'MAC', 'MAC', 'MAC', 'MAC', 'Father/Male Guardian', 0, 1, 2020, '2020-06-09 06:26:54', '2020-06-09 06:26:54'),
(2, 2, 34, 'MAC', 'MAC', 'MAC', 'MAC', 'MAC', 'MAC', 'MAC', 'Mother/Female Guardian', 0, 1, 2020, '2020-06-09 06:26:54', '2020-06-09 06:26:54'),
(3, 6, 23, 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'Father/Male Guardian', 0, 2, 2020, '2020-06-09 11:47:13', '2020-06-09 11:47:13'),
(4, 6, 23, 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'Mother/Female Guardian', 0, 2, 2020, '2020-06-09 11:47:13', '2020-06-09 11:47:13');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siblings`
--

CREATE TABLE `siblings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(10) UNSIGNED NOT NULL,
  `schoolOrEmployer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classOrSalary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `others` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `applicationId` bigint(20) UNSIGNED NOT NULL,
  `year` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siblings`
--

INSERT INTO `siblings` (`id`, `user_id`, `name`, `age`, `schoolOrEmployer`, `classOrSalary`, `others`, `status`, `applicationId`, `year`, `created_at`, `updated_at`) VALUES
(1, 2, 'mac', 23, 'MAC', 'MAC', 'MAC', 0, 1, 2020, '2020-06-09 06:26:54', '2020-06-09 06:26:54'),
(2, 6, 'martin', 23, 'pos', 'form 2', 'no', 0, 2, 2020, '2020-06-09 11:47:13', '2020-06-09 11:47:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `county` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ward` int(11) DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ID_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `role`, `email`, `email_verified_at`, `password`, `county`, `remember_token`, `created_at`, `updated_at`, `ward`, `phone`, `ID_number`, `place`) VALUES
(2, 'Angela', 'mac', 'student', 'angela@gmail.com', '2020-06-08 21:00:00', '$2y$10$PNB.YCyBB.uReZkMSmDkTub/8FJDxEhXmy97dXCVttSgizv7dyMju', NULL, NULL, '2020-06-09 05:53:12', '2020-06-09 05:53:12', NULL, '0715511302', '5600789', 'mtwapa'),
(3, 'martin', NULL, 'official', 'martin@gmail.com', '2020-06-09 05:56:57', '$2y$10$t6C3CbvqC36t0HHcndlHtOVZI3bCLqPuRayUzSgEp8N.vsluw9IdG', 1, NULL, '2020-06-09 05:56:57', '2020-06-09 05:56:57', NULL, NULL, NULL, NULL),
(4, 'subofficial', NULL, 'sub-official', 'subof@gmail.com', '2020-06-09 06:04:15', '$2y$10$sJ1T0fG9a/3/6hPr4vwjBeEzmJw.MFcaE4JcAMdWeI.78haQuSyqq', 1, NULL, '2020-06-09 06:04:15', '2020-06-09 06:04:15', NULL, NULL, NULL, NULL),
(5, 'awendo', NULL, 'sub-admin', 'awendo@gmail.com', '2020-06-09 06:38:08', '$2y$10$IE32lpurQHQDgeNE8BBRTOWdnTrM7QP8JUM1XNAL1K8hEP8Vvnjam', 1, NULL, '2020-06-09 06:38:08', '2020-06-09 06:38:08', 1, NULL, NULL, NULL),
(6, 'nancy', 'chemtai', 'student', 'nancy@gmail.com', '2020-06-01 21:00:00', '$2y$10$t.IWPQVbwJED/a98X8kXWua4nCi3C.oG7Fb6/7jYgXonCBOecCOzW', NULL, NULL, '2020-06-09 11:31:52', '2020-06-09 11:31:52', NULL, '0715511302', '4800973', 'Mamba'),
(7, 'shem', 'nduati', 'student', 'nduatishem@gmail.com', NULL, '$2y$10$pPb/DwGh40TvEJDf6fv4xeuVs0UP71PXd3sOgPSIeMziMm8KtBal6', NULL, NULL, '2020-06-09 17:37:06', '2020-06-09 17:37:06', NULL, '0700655435', '30989005', 'poa');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `county_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `county_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'awendo', '2020-06-09 05:56:03', '2020-06-09 05:56:03'),
(2, 1, 'suna east', '2020-06-09 05:56:13', '2020-06-09 05:56:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applications_user_id_foreign` (`user_id`);

--
-- Indexes for table `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `budgets_ward_id_index` (`ward_id`);

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counties`
--
ALTER TABLE `counties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evidence`
--
ALTER TABLE `evidence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evidence_applicationid_foreign` (`applicationId`),
  ADD KEY `evidence_user_id_foreign` (`user_id`);

--
-- Indexes for table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`id`),
  ADD KEY `family_applicationid_foreign` (`applicationId`),
  ADD KEY `family_user_id_index` (`user_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_applicationid_foreign` (`applicationId`);

--
-- Indexes for table `geographical`
--
ALTER TABLE `geographical`
  ADD PRIMARY KEY (`id`),
  ADD KEY `geographical_user_id_foreign` (`user_id`),
  ADD KEY `geographical_ward_foreign` (`Ward`),
  ADD KEY `geographical_applicationid_foreign` (`applicationId`);

--
-- Indexes for table `institution`
--
ALTER TABLE `institution`
  ADD PRIMARY KEY (`id`),
  ADD KEY `institution_user_id_foreign` (`user_id`),
  ADD KEY `institution_applicationid_foreign` (`applicationId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `morefamily`
--
ALTER TABLE `morefamily`
  ADD PRIMARY KEY (`id`),
  ADD KEY `morefamily_user_id_foreign` (`user_id`),
  ADD KEY `morefamily_applicationid_foreign` (`applicationId`);

--
-- Indexes for table `more_evidence`
--
ALTER TABLE `more_evidence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `more_evidence_applicationid_foreign` (`applicationId`),
  ADD KEY `more_evidence_user_id_index` (`user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `siblings`
--
ALTER TABLE `siblings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siblings_applicationid_foreign` (`applicationId`),
  ADD KEY `siblings_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wards_county_id_foreign` (`county_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `budgets`
--
ALTER TABLE `budgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `counties`
--
ALTER TABLE `counties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `evidence`
--
ALTER TABLE `evidence`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `family`
--
ALTER TABLE `family`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `geographical`
--
ALTER TABLE `geographical`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `institution`
--
ALTER TABLE `institution`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `morefamily`
--
ALTER TABLE `morefamily`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `more_evidence`
--
ALTER TABLE `more_evidence`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siblings`
--
ALTER TABLE `siblings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `evidence`
--
ALTER TABLE `evidence`
  ADD CONSTRAINT `evidence_applicationid_foreign` FOREIGN KEY (`applicationId`) REFERENCES `applications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evidence_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `family`
--
ALTER TABLE `family`
  ADD CONSTRAINT `family_applicationid_foreign` FOREIGN KEY (`applicationId`) REFERENCES `applications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `family_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_applicationid_foreign` FOREIGN KEY (`applicationId`) REFERENCES `applications` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `geographical`
--
ALTER TABLE `geographical`
  ADD CONSTRAINT `geographical_applicationid_foreign` FOREIGN KEY (`applicationId`) REFERENCES `applications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `geographical_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `geographical_ward_foreign` FOREIGN KEY (`Ward`) REFERENCES `wards` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `institution`
--
ALTER TABLE `institution`
  ADD CONSTRAINT `institution_applicationid_foreign` FOREIGN KEY (`applicationId`) REFERENCES `applications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `institution_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `morefamily`
--
ALTER TABLE `morefamily`
  ADD CONSTRAINT `morefamily_applicationid_foreign` FOREIGN KEY (`applicationId`) REFERENCES `applications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `morefamily_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `more_evidence`
--
ALTER TABLE `more_evidence`
  ADD CONSTRAINT `more_evidence_applicationid_foreign` FOREIGN KEY (`applicationId`) REFERENCES `applications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `more_evidence_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siblings`
--
ALTER TABLE `siblings`
  ADD CONSTRAINT `siblings_applicationid_foreign` FOREIGN KEY (`applicationId`) REFERENCES `applications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siblings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wards`
--
ALTER TABLE `wards`
  ADD CONSTRAINT `wards_county_id_foreign` FOREIGN KEY (`county_id`) REFERENCES `counties` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
